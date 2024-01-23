<?php
/*
Plugin Name: Omipress Floating Button
Description: Adds three sticky buttons to your website.
Version: 1.0
Author: Prabin Jha
*/

// Enqueue styles and scripts
function omipressfb_enqueue_scripts() {
    wp_enqueue_style('omipressfb-style', plugin_dir_url(__FILE__) . 'assets/css/style.css');
    wp_enqueue_script('omipressfb-script', plugin_dir_url(__FILE__) . 'assets/js/script.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'omipressfb_enqueue_scripts');



include_once( plugin_dir_path( __FILE__ ) . 'inc/buttons.php' );

include_once( plugin_dir_path( __FILE__ ) . 'inc/button-setting.php' );

