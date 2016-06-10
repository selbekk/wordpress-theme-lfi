<?php

function include_theme_resources() {
    wp_enqueue_style('styles.css', get_template_directory_uri() .'/resources/styles.css');
    wp_enqueue_script('bundle.js', get_template_directory_uri() .'/resources/bundle.js');
}
add_action('wp_enqueue_scripts', 'include_theme_resources');
?>
