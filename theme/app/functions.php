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
            'rewrite' => array(
                'slug' => 'sitater',
                'with_front' => false,
            )
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
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
            'rewrite' => array(
                'slug' => 'behandlere',
                'with_front' => false,
            )
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
    ));

    $customizer->add_control(
        new WP_Customize_Media_Control( $customizer, 'front_page_image', array(
          'label' => 'Featured image',
          'section' => 'front_page',
          'mime_type' => 'image',
        ))
    );

    // Front page heading
    $customizer->add_setting('front_page_heading', array(
        'type' => 'theme_mod',
    ));

    $customizer->add_control('front_page_heading', array(
        'label' => 'Top heading',
        'section' => 'front_page',
        'type' => 'text'
    ));

    // Front page lead
    $customizer->add_setting('front_page_lead', array(
        'type' => 'theme_mod',
    ));

    $customizer->add_control('front_page_lead', array(
        'label' => 'Top lead introduction',
        'section' => 'front_page',
        'type' => 'textarea'
    ));

    // Front page free text section title
    $customizer->add_setting('front_page_freetext_title', array(
        'type' => 'theme_mod',
    ));

    $customizer->add_control('front_page_freetext_title', array(
        'label' => 'Freetext title',
        'section' => 'front_page',
        'type' => 'text'
    ));

    // Front page free text section text
    $customizer->add_setting('front_page_freetext_text', array(
        'type' => 'theme_mod',
    ));

    $customizer->add_control('front_page_freetext_text', array(
        'label' => 'Freetext body',
        'section' => 'front_page',
        'type' => 'textarea'
    ));

    // Front page free text section CTA button label
    $customizer->add_setting('front_page_freetext_cta_text', array(
        'type' => 'theme_mod',
    ));

    $customizer->add_control('front_page_freetext_cta_text', array(
        'label' => 'Freetext CTA button text',
        'section' => 'front_page',
        'type' => 'text'
    ));

    // Front page free text section CTA button link
    $customizer->add_setting('front_page_freetext_cta_target', array(
        'type' => 'theme_mod',
    ));

    $customizer->add_control('front_page_freetext_cta_target', array(
        'label' => 'Freetext CTA button link',
        'section' => 'front_page',
        'type' => 'dropdown-pages'
    ));

    // General section

    $customizer->add_section('general', array(
        'title' => 'General',
        'description' => 'General settings',
        'capability' => 'edit_theme_options'
    ));

    // General company name
    $customizer->add_setting('general_company_name', array(
        'type' => 'theme_mod',
    ));

    $customizer->add_control('general_company_name', array(
        'label' => 'Company name',
        'section' => 'general',
        'type' => 'text'
    ));

    // General about text
    $customizer->add_setting('general_company_about', array(
        'type' => 'theme_mod',
    ));

    $customizer->add_control('general_company_about', array(
        'label' => 'About the company',
        'section' => 'footer',
        'type' => 'textarea'
    ));

    // General opening hours
    $customizer->add_setting('general_company_opening_hours', array(
        'type' => 'theme_mod',
    ));

    $customizer->add_control('general_company_opening_hours', array(
        'label' => 'Opening hours',
        'section' => 'general',
        'type' => 'textarea'
    ));

    // General booking base URL
    $customizer->add_setting('general_booking_base_url', array(
        'type' => 'theme_mod',
    ));

    $customizer->add_control('general_booking_base_url', array(
        'label' => 'Booking base URL',
        'section' => 'general',
        'type' => 'url'
    ));

    // General booking URL
    $customizer->add_setting('general_booking_url', array(
        'type' => 'theme_mod',
    ));

    $customizer->add_control('general_booking_url', array(
        'label' => 'Booking URL',
        'section' => 'general',
        'type' => 'url'
    ));

    // Contact section

    $customizer->add_section('contact', array(
        'title' => 'Contact details',
        'description' => 'Contact details settings',
        'capability' => 'edit_theme_options'
    ));

    // Contact phone number
    $customizer->add_setting('contact_phone_number', array(
        'type' => 'theme_mod',
    ));

    $customizer->add_control('contact_phone_number', array(
        'label' => 'Phone number',
        'section' => 'contact',
        'type' => 'tel'
    ));

    // Contact email
    $customizer->add_setting('contact_email', array(
        'type' => 'theme_mod',
    ));

    $customizer->add_control('contact_email', array(
        'label' => 'E-mail',
        'section' => 'contact',
        'type' => 'email'
    ));

    // Contact phone number
    $customizer->add_setting('contact_address', array(
        'type' => 'theme_mod',
    ));

    $customizer->add_control('contact_address', array(
        'label' => 'Address',
        'section' => 'contact',
        'type' => 'textarea'
    ));
}
add_action('customize_register', 'setup_theme_customizations');

// Add advanced custom fields
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_prisinformasjon',
		'title' => 'Prisinformasjon',
		'fields' => array (
			array (
				'key' => 'field_57bb6e692da33',
				'label' => 'Pris: Tittel',
				'name' => 'price-title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57bb6ed62da34',
				'label' => 'Pris: Innledning',
				'name' => 'price-lead',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_57bb6f2f2da35',
				'label' => 'Pris: Innhold',
				'name' => 'price-content',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '11',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_treningsveiledning',
		'title' => 'Treningsveiledning',
		'fields' => array (
			array (
				'key' => 'field_57bc956e117f2',
				'label' => 'Treningsveiledning: Tittel',
				'name' => 'personal-trainer-title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57bc9585117f3',
				'label' => 'Treningsveiledning: Introduksjon',
				'name' => 'personal-trainer-lead',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_57bc959a117f4',
				'label' => 'Treningsveiledning: Innhold',
				'name' => 'personal-trainer-content',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '11',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_call-to-actions',
		'title' => 'Call to actions',
		'fields' => array (
			array (
				'key' => 'field_57bc9d4a6e665',
				'label' => 'Call to action: Tittel',
				'name' => 'call-to-action-title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57bc9d696e666',
				'label' => 'Call to action: Lead',
				'name' => 'call-to-action-lead',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_57bc9d846e667',
				'label' => 'Call to action: Innhold',
				'name' => 'call-to-action-content',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_57bc9d9d6e668',
				'label' => 'Call to action: Knappetekst',
				'name' => 'call-to-action-button-text',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57bc9dba6e669',
				'label' => 'Call to action: Link',
				'name' => 'call-to-action-link',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'post',
					1 => 'page',
					2 => 'testimonial',
					3 => 'employee',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
}


?>
