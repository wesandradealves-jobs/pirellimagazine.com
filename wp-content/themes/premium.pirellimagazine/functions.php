<?php 
    function styles() {
        // enqueue parent styles
        wp_enqueue_style('pirellimagazine', get_template_directory_uri() .'/style.css');
    }
    add_action('wp_enqueue_scripts', 'styles');