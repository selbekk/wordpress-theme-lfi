<?php

// Add excerpts to pages
function add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'add_excerpts_to_pages' );

// Add testimonial post type
function register_testimonial_post_type() {
    register_post_type( 'testimonial',
        array(
            'labels' => array(
                'name' => 'Testimonials',
                'singular_name' => 'Testimonial',
                'add_new' => 'Add new',
                'add_new_item' => 'Add new testimonial',
                'edit_item' => 'Edit testimonial',
                'view_item' => 'View testimonial',
                'search_items' => 'Search testimonials',
                'not_found' => 'Testimonial not found',
                'not_found_in_trash' => 'Testimonial not found in trash',
                'all_items' => 'All testimonials',
                'archives' => 'Testimonials archive'
            ),
            'description' => 'A customer testimonial describing how their experience was',
            'public' => true,
            'menu_position' => 20,
            'menu_icon' => 'dashicons-thumbs-up',
            'supports' => array( 'title', 'editor' ),
        )
    );
}
add_action('init', 'register_testimonial_post_type');

// Add employee post type
function register_employee_post_type() {
    register_post_type( 'employee',
        array(
            'labels' => array(
                'name' => 'Employees',
                'singular_name' => 'Employee',
                'add_new' => 'Add new',
                'add_new_item' => 'Add new employee',
                'edit_item' => 'Edit employee details',
                'view_item' => 'View employee',
                'search_items' => 'Search employees',
                'not_found' => 'Employee not found',
                'not_found_in_trash' => 'Employee not found in trash',
                'all_items' => 'All employees',
                'archives' => 'Employees archive'
            ),
            'description' => 'An LFI employee',
            'public' => true,
            'menu_position' => 20,
            'menu_icon' => 'dashicons-groups',
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        )
    );
}
add_action('init', 'register_employee_post_type');

// Add thumbnail supports
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'employee' ) );

// Register menus
function register_menus() {
    register_nav_menus(
        array(
            'header-menu' => 'Header menu',
            'front-page-entrances-menu' => 'Front page entrances menu',
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

// Theme customization
function setup_theme_customizations($customizer) {
    // Front page section
    $customizer->add_section('front_page', array(
        'title' => 'Front page',
        'description' => 'Choices to customize the front page',
        'capability' => 'edit_theme_options'
    ));

    // Front page image
    $customizer->add_setting('front_page_image', array(
        'type' => 'theme_mod',
        'transport' => 'postMessage'
    ));

    $customizer->add_control(
        new WP_Customize_Media_Control( $customizer, 'front_page_image', array(
          'label' => 'Featured Home Page Image',
          'section' => 'front_page',
          'mime_type' => 'image',
        ))
    );

    $customizer->add_setting('front_page_heading', array(
        'type' => 'theme_mod',
        'transport' => 'postMessage'
    ));

    $customizer->add_control('front_page_heading', array(
        'label' => 'Front page main heading',
        'section' => 'front_page',
        'type' => 'text'
    ));

    $customizer->add_setting('front_page_lead', array(
        'type' => 'theme_mod',
        'transport' => 'postMessage'
    ));

    $customizer->add_control('front_page_lead', array(
        'label' => 'Front page lead introduction',
        'section' => 'front_page',
        'type' => 'textarea'
    ));

    $customizer->add_setting('front_page_freetext_title', array(
        'type' => 'theme_mod',
        'transport' => 'postMessage'
    ));

    $customizer->add_control('front_page_freetext_title', array(
        'label' => 'Front page freetext title',
        'section' => 'front_page',
        'type' => 'text'
    ));

    $customizer->add_setting('front_page_freetext_text', array(
        'type' => 'theme_mod',
        'transport' => 'postMessage'
    ));

    $customizer->add_control('front_page_freetext_text', array(
        'label' => 'Front page freetext body',
        'section' => 'front_page',
        'type' => 'textarea'
    ));
}
add_action('customize_register', 'setup_theme_customizations');


?>
