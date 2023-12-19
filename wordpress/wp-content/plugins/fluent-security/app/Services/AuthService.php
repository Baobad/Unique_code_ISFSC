<?php

namespace FluentAuth\App\Services;

use FluentAuth\App\Helpers\Arr;
use FluentAuth\App\Helpers\Helper;

class AuthService
{
    public static function doUserAuth($userData, $provider = '')
    {
        if (get_current_user_id()) {
            return new \WP_Error('already_logged_in', 'You are already logged in. Please refresh the page');
        }

        if (empty($userData['email']) || !is_email($userData['email'])) {
            return new \WP_Error('invalid_email', 'Valid Email address is required');
        }

        Helper::setLoginMedia($provider);

        $email = $userData['email'];

        $userExist = get_user_by('email', $email);

        if ($userExist) {
            self::maybeUpdateUser($userExist, $userData);
            return self::makeLogin($userExist, $provider);
        }

        // let's create the user here
        $createUserData = [
            'email'    => $userData['email'],
            'password' => wp_generate_password(8),
            'username' => sanitize_user($userData['email'])
        ];

        if (!empty($userData['username'])) {
            if (username_exists($userData['username'])) {
                $createUserData['username'] = sanitize_user($userData['username']);
            }
        }

        $defaultRole = get_option('default_role');
        if (!$defaultRole || $defaultRole === 'administrator') {
            $defaultRole = 'subscriber';
        }

        $setRole = apply_filters('fluent_auth/user_role', $defaultRole);

        $userId = self::registerNewUser($createUserData['username'], $createUserData['email'], $createUserData['password'], [
            'role'        => $setRole,
            'first_name'  => Arr::get($userData, 'first_name'),
            'last_name'   => Arr::get($userData, 'last_name'),
            'user_url'    => Arr::get($userData, 'user_url'),
            'full_name'   => Arr::get($userData, 'full_name'),
            'description' => Arr::get($userData, 'description'),
        ]);

        if (is_wp_error($userId)) {
            return $userId;
        }

        $user = get_user_by('ID', $userId);

        return self::makeLogin($user, $provider);
    }

    private static function maybeUpdateUser($user, $userData)
    {
        $updateData = [];

        if (!empty($userData['user_url']) && !$user->user_url) {
            $updateData['user_url'] = $userData['user_url'];
        }

        if (!empty($userData['description']) && !$user->description) {
            $updateData['description'] = $userData['description'];
        }

        if (!$user->first_name || !$user->last_name) {
            if (!empty($userData['full_name'])) {
                // extract the names
                $fullNameArray = explode(' ', $userData['full_name']);
                $updateData['first_name'] = array_shift($fullNameArray);
                if ($fullNameArray) {
                    $updateData['last_name'] = implode(' ', $fullNameArray);
                } else {
                    $updateData['last_name'] = '';
                }
            }

            if (!empty($userData['first_name'])) {
                $updateData['first_name'] = $userData['first_name'];
            }

            if (!empty($userData['last_name'])) {
                $updateData['last_name'] = $userData['last_name'];
            }
        }

        if (!empty($userData)) {
            $updateData['ID'] = $user->ID;
            wp_update_user($updateData);
        }
    }

    public static function makeLogin($user, $provider = '')
    {
        $canLogin = apply_filters('fluent_auth/can_user_login', false, $user, $provider);

        if ($provider && is_wp_error($canLogin)) {
            return $canLogin;
        }

        wp_clear_auth_cookie();
        wp_set_current_user($user->ID, $user->user_login);
        wp_set_auth_cookie($user->ID, true, is_ssl());

        $user = get_user_by('ID', $user->ID);

        if ($user) {
            do_action('wp_login', $user->user_login, $user);
        }

        return $user;
    }

    public static function setStateToken()
    {
        $state = md5(wp_generate_uuid4());
        setcookie('fs_auth_state', $state, time() + 3600, COOKIEPATH, COOKIE_DOMAIN, is_ssl());  /* expire in 1 hour */
        return $state;
    }

    public static function getStateToken()
    {
        return Arr::get($_COOKIE, 'fs_auth_state');
    }

    /**
     * Handles registering a new user.
     *
     * @param string $user_login User's username for logging in
     * @param string $user_email User's email address to send password and add
     * @return int|\WP_Error Either user's ID or error on failure.
     * @since 2.5.0
     *
     */
    public static function registerNewUser($user_login, $user_email, $user_pass = '', $extraData = [])
    {
        $errors = new \WP_Error();

        $sanitized_user_login = sanitize_user($user_login);

        $user_email = apply_filters('user_registration_email', $user_email);

        // Check the username.
        if ('' === $sanitized_user_login) {
            $errors->add('empty_username', __('<strong>Error</strong>: Please enter a username.', 'fluent-security'));
        } elseif (!validate_username($user_login)) {
            $errors->add('invalid_username', __('<strong>Error</strong>: This username is invalid because it uses illegal characters. Please enter a valid username.', 'fluent-security'));
            $sanitized_user_login = '';
        } elseif (username_exists($sanitized_user_login)) {
            $errors->add('username_exists', __('<strong>Error</strong>: This username is already registered. Please choose another one.', 'fluent-security'));
        } else {
            /** This filter is documented in wp-includes/user.php */
            $illegal_user_logins = (array)apply_filters('illegal_user_logins', array());
            if (in_array(strtolower($sanitized_user_login), array_map('strtolower', $illegal_user_logins), true)) {
                $errors->add('invalid_username', __('<strong>Error</strong>: Sorry, that username is not allowed.', 'fluent-security'));
            }
        }

        // Check the email address.
        if ('' === $user_email) {
            $errors->add('empty_email', __('<strong>Error</strong>: Please type your email address.', 'fluent-security'));
        } elseif (!is_email($user_email)) {
            $errors->add('invalid_email', __('<strong>Error</strong>: The email address is not correct.', 'fluent-security'));
            $user_email = '';
        } elseif (email_exists($user_email)) {
            $errors->add(
                'email_exists',
                __('<strong>Error:</strong> This email address is already registered. Please login or try reset password', 'fluent-security')
            );
        }

        do_action('register_post', $sanitized_user_login, $user_email, $errors);

        $errors = apply_filters('registration_errors', $errors, $sanitized_user_login, $user_email);

        if ($errors->has_errors()) {
            return $errors;
        }

        if (!$user_pass) {
            $user_pass = wp_generate_password(8, false);
        }

        $data = [
            'user_login' => wp_slash($sanitized_user_login),
            'user_email' => wp_slash($user_email),
            'user_pass'  => $user_pass
        ];

        if (!empty($extraData['first_name'])) {
            $data['first_name'] = sanitize_text_field($extraData['first_name']);
        }

        if (!empty($extraData['last_name'])) {
            $data['last_name'] = sanitize_text_field($extraData['last_name']);
        }

        if (!empty($extraData['full_name']) && empty($extraData['first_name']) && empty($extraData['last_name'])) {
            $extraData['full_name'] = sanitize_text_field($extraData['full_name']);
            // extract the names
            $fullNameArray = explode(' ', $extraData['full_name']);
            $data['first_name'] = array_shift($fullNameArray);
            if ($fullNameArray) {
                $data['last_name'] = implode(' ', $fullNameArray);
            } else {
                $data['last_name'] = '';
            }
        }

        if (!empty($extraData['description'])) {
            $data['description'] = sanitize_textarea_field($extraData['description']);
        }

        if (!empty($extraData['user_url']) && filter_var($extraData['user_url'], FILTER_VALIDATE_URL)) {
            $data['user_url'] = sanitize_url($extraData['user_url']);
        }

        if (!empty($extraData['role'])) {
            $data['role'] = $extraData['role'];
        }

        $user_id = wp_insert_user($data);

        if (!$user_id || is_wp_error($user_id)) {
            $errors->add('registerfail', __('<strong>Error</strong>: Could not register you. Please contact the site admin!', 'fluent-security')
            );
            return $errors;
        }

        if (!empty($_COOKIE['wp_lang'])) {
            $wp_lang = sanitize_text_field($_COOKIE['wp_lang']);
            if (in_array($wp_lang, get_available_languages(), true)) {
                update_user_meta($user_id, 'locale', $wp_lang); // Set user locale if defined on registration.
            }
        }

        do_action('register_new_user', $user_id);

        return $user_id;
    }
}
