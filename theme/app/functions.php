<?php

// Features
add_theme_support( 'post-thumbnails' );

// Add excerpts to apges
function add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'add_excerpts_to_pages' );


// Register menus
function register_menus() {
    register_nav_menus(
        array(
            'header-menu' => 'Header menu',
            'footer-menu' => 'Footer services menu'
        )
    );
}
add_action('init', 'register_menus');

// Add scripts
function include_theme_resources() {
    wp_enqueue_style('styles.css', get_template_directory_uri() .'/resources/styles.css');
    wp_enqueue_script('bundle.js', get_template_directory_uri() .'/resources/bundle.js');
}
add_action('wp_enqueue_scripts', 'include_theme_resources');
?>
