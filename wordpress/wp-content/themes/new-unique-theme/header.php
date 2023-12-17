<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">
    <link rel="script" href="/wordpress/wp-content/themes/new-unique-theme/assets/css/script.js">
    <?php wp_head(); ?>

</head>

<header>
    <div id="truc-head">
          <svg id="logomenu" xmlns="http://www.w3.org/2000/svg" width="343" height="80" viewBox="0 0 343 80" fill="none">
                <path d="M112.689 52.3802V62.9417C111.116 63.3766 109.092 63.5896 106.626 63.5896C101.52 63.5896 98.0789 62.4536 96.3123 60.1815C94.5458 57.9095 93.6626 54.5724 93.6626 50.188V40.5228C93.6626 38.0289 92.9909 36.1118 91.6384 34.7539C90.2951 33.4048 87.6545 32.7214 83.7259 32.7214C81.2509 32.7214 79.1623 33.0765 77.451 33.7776C75.7397 34.4787 74.4056 35.7035 73.4487 37.4342V62.9417H60.8162V22.3196H68.4804L72.6943 29.0648H72.9427C75.2429 24.1391 80.1008 21.6717 87.5165 21.6717C100.039 21.6717 106.295 26.8194 106.295 37.1058V48.2354C106.295 49.8063 106.507 50.9157 106.93 51.5636C107.353 52.2115 108.319 52.5399 109.837 52.5399C110.619 52.5399 111.576 52.4867 112.699 52.3802H112.689Z" fill="#F2F2F2"/>
                <path d="M0.00920064 33.2096V22.648C1.58251 22.2131 3.60665 22.0001 6.07242 22.0001C11.1788 22.0001 14.6198 23.1362 16.3863 25.4082C18.1529 27.6803 19.0361 31.0174 19.0361 35.4018V45.0669C19.0361 47.5609 19.7078 49.478 21.0603 50.8359C22.4036 52.1849 25.0442 52.8683 28.9728 52.8683C31.4478 52.8683 33.5363 52.5133 35.2477 51.8121C36.959 51.111 38.2931 49.8862 39.2499 48.1555V22.648H51.8824V63.2701H44.2183L40.0044 56.5249H39.756C37.4558 61.4507 32.5979 63.918 25.1822 63.918C12.6601 63.918 6.40365 58.7704 6.40365 48.4839V37.3543C6.40365 35.7834 6.19203 34.674 5.7688 34.0261C5.34557 33.3782 4.37951 33.0498 2.8614 33.0498C2.07935 33.0498 1.12248 33.1031 0 33.2096H0.00920064Z" fill="#F2F2F2"/>
                <path d="M219.61 22.3196V80H206.978V64.7257L208.073 55.8681L207.566 55.7883C206.665 58.3887 205.082 60.3413 202.81 61.6371C200.537 62.9329 197.657 63.5896 194.18 63.5896C189.294 63.5896 185.071 62.6932 181.51 60.9093C177.94 59.1254 175.208 56.658 173.303 53.5162C171.39 50.3744 170.442 46.8242 170.442 42.8747C170.442 38.9253 171.491 35.0911 173.598 31.8694C175.705 28.6477 178.557 26.1449 182.145 24.3521C185.733 22.5681 189.699 21.6717 194.023 21.6717C198.117 21.6717 201.2 22.364 203.242 23.7397C205.294 25.1242 206.738 26.8371 207.576 28.8962H208.082L211.955 22.3196H219.619H219.61ZM202.644 51.5281C204.355 50.8536 205.8 49.8862 206.978 48.6437V35.6414C205.8 34.7184 204.3 33.9995 202.469 33.4847C200.648 32.97 198.669 32.7126 196.535 32.7126C192.376 32.7126 189.092 33.6356 186.681 35.4728C184.27 37.3188 183.056 39.7507 183.056 42.786C183.056 45.5995 184.261 47.9337 186.681 49.7708C189.092 51.6169 192.496 52.531 196.875 52.531C199.01 52.531 200.933 52.1938 202.644 51.5193V51.5281Z" fill="#F2F2F2"/>
                <path d="M285.68 52.3802V62.9417C284.162 63.3766 282.23 63.5896 279.865 63.5896C276.047 63.5896 273.185 62.8175 271.272 61.2732C269.358 59.7289 268.098 57.7941 267.481 55.4688H266.975C266.248 57.8562 264.767 59.7999 262.559 61.3176C260.341 62.8352 257.324 63.5896 253.505 63.5896C247.332 63.5896 242.529 62.072 239.106 59.0366C235.684 56.0013 233.972 51.7234 233.972 46.203V33.3693H227.569V22.3196H246.605V44.4989C246.605 46.1231 246.844 47.5076 247.322 48.6437C247.801 49.7797 248.813 50.7116 250.359 51.4483C251.904 52.176 254.214 52.5488 257.305 52.5488C261.685 52.5488 264.887 51.3063 266.901 48.8123V22.3285H279.534V48.2443C279.534 49.6555 279.773 50.7205 280.252 51.4571C280.73 52.1849 281.751 52.5577 283.325 52.5577C284.107 52.5577 284.898 52.5044 285.68 52.3979V52.3802Z" fill="#F2F2F2"/>
                <path d="M343 46.9396H303.502C304.339 49.1052 306.087 50.6672 308.718 51.608C311.359 52.5577 315.177 53.0281 320.173 53.0281C326.963 53.0281 333.477 52.3535 339.715 50.9956V61.3974C337.746 61.9388 335.051 62.4447 331.628 62.8974C328.205 63.3589 324.249 63.5896 319.75 63.5896C313.015 63.5896 307.421 62.6666 302.986 60.8294C298.552 58.9922 295.295 56.4983 293.215 53.3564C291.136 50.2146 290.096 46.6379 290.096 42.6351C290.096 38.1975 291.274 34.3989 293.629 31.2659C295.985 28.1241 299.26 25.7455 303.437 24.1213C307.624 22.4971 312.435 21.6806 317.882 21.6806C325.684 21.6806 331.821 23.358 336.284 26.7129C340.746 30.0677 342.982 34.9136 342.982 41.2506V46.9396H343ZM330.533 38.6501C330.533 36.5911 329.447 35.0113 327.294 33.9019C325.132 32.7924 322.004 32.2333 317.901 32.2333C309.924 32.2333 305.103 34.3722 303.419 38.6501H330.533Z" fill="#F2F2F2"/>
                <path d="M139.371 27.5738V27.6004L139.086 27.5028C139.178 27.5294 139.279 27.556 139.371 27.5827V27.5738Z" fill="#F2F2F2"/>
                <path d="M175.649 16.7282L167.663 29.0116C165.556 32.5883 160.919 34.4787 156.797 33.4137C156.457 33.3427 156.107 33.2273 155.776 33.112L151.259 31.6032L150.292 34.2746C150.191 40.2654 151.884 44.3214 154.092 50.8181C155.482 54.6611 155.472 54.7144 158.61 62.7465H147.035C144.597 57.5278 142.803 53.7292 141.616 48.9366C127.733 56.8622 115.1 50.0282 110.205 41.4458C115.661 44.6853 124.153 47.0994 129.49 44.1617C133.096 42.3955 135.82 37.4431 137.651 32.3398L139.362 27.6004V27.5738C139.279 27.5472 139.178 27.5294 139.086 27.4939L138.81 27.4052L136.188 26.5265L133.455 25.6035L130.161 30.0766C127.024 34.3367 120.906 35.3308 116.489 32.3043L125.377 20.2339C126.555 18.6453 128.147 17.5092 129.913 16.8613C131.054 16.4531 132.351 16.2134 133.667 16.2134C134.725 16.2134 135.801 16.3643 136.804 16.7016L148.673 20.6955L151.295 21.5741L159.162 24.2189H159.19L162.125 19.7014C164.995 15.2815 171.058 13.9325 175.64 16.7105L175.649 16.7282Z" fill="#F2F2F2"/>
                <path d="M156.797 15.6632C158.868 14.9088 160.284 13.3467 161.066 10.977C161.849 8.60734 161.609 6.54827 160.376 4.77322C159.134 3.00704 157.027 1.66688 154.037 0.752724C151.047 -0.161428 148.508 -0.241306 146.419 0.504217C144.321 1.24974 142.886 2.81179 142.113 5.17261C141.331 7.5423 141.598 9.61912 142.886 11.3942C144.183 13.1781 146.29 14.5183 149.225 15.4147C152.215 16.3288 154.736 16.4087 156.807 15.6543L156.797 15.6632Z" fill="#F2F2F2"/>
            </svg>
        <div id="listmenu">
            <ol id="listmenuol">
                <li class="menuli">Messages</li>
                <li class="menuli">Langue</li>
                <li class="menuli">Menu</li>

            </ol>
        </div>
    </div>
</header>

<body <?php body_class(); ?>>
    
    <?php wp_body_open(); ?>