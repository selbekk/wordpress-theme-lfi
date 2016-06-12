<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?>
</head>
<body>
    <div class="site-container" id="top">
        <header class="site-header">
            <div class="wrapper site-header-inner">
                <svg class="site-header-logo" viewBox="0 0 526 263">
                	<path d="M-1-1C 40.49-1 81.99-1 123.47-1 123.47 39.82 123.47 80.65 123.47 121.46 145.7 113.08 168.09 103.64 195.75 101.39 195.41 116.11 195.08 130.83 194.74 145.56 172.41 147.45 156.46 157.35 139.53 164.63 117.82 173.96 96.35 180.95 78.3 193.74 51.87 216.82 25.43 239.91-1 263-1 175.01-1 86.99-1-1ZM 208.8-1C 275.04-1 341.31-1 407.55-1 407.55 12.38 407.55 25.77 407.55 39.15 382.46 39.15 357.36 39.15 332.26 39.15 332.26 42.5 332.26 45.84 332.26 49.19 357.36 49.19 382.46 49.19 407.55 49.19 407.55 64.58 407.55 79.97 407.55 95.37 383.13 92.69 358.7 90.01 334.27 87.33 334.51 106.23 336.21 125.84 332.26 141.54 291.11 142.88 249.95 144.22 208.8 145.56 208.8 96.71 208.8 47.85 208.8-1ZM 418.59-1C 454.39-1 490.2-1 526-1 526 80.97 526 162.96 526 244.93 504.59 228.87 483.17 212.81 461.76 196.75 447.37 188.38 432.98 180.02 418.59 171.65 418.59 114.11 418.59 56.55 418.59-1Z"/>
                </svg>

                <nav class="site-header-menu js-menu">
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'header-menu',
                            'container' => ''
                        )
                    ); ?>
                </nav>
                <div class="site-header-menu-trigger js-menu-trigger">
                    <span></span>
                </div>
            </div>
        </header>
        <main class="site-content">
