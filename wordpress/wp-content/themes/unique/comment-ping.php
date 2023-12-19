<li <?php hybrid_comment_attributes(); ?>>

	<?php echo apply_atomic_shortcode( 'comment_meta', '<div class="comment-meta">[comment-author] [comment-published] [comment-permalink before="| "] [comment-edit-link before="| "] [comment-reply-link before="| "]</div>' ); ?>

<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>