<?php

/*
  Plugin Name: laos-font
  Plugin URI: https://web.facebook.com/piti.laos
  Description: ປລັກອິນປຽນຟອນພາສາລາວ (WordPress) 
  https://web.facebook.com/piti.laos
  Author: Piti PHANTHASOMBATH
  Version: 1.0
  Author URI: https://web.facebook.com/piti.laos
 */

add_action('wp_enqueue_scripts', 'laos_font_scripts');

function laos_font_scripts() {
    wp_register_style('custom-style', plugins_url('/laos-font-style.css', __FILE__), array(), '20120208', 'all');
    wp_register_style('custom-style', get_template_directory_uri() . '/laos-font-style.css', array(), '20120208', 'all');
    wp_enqueue_style('custom-style');
}
?>
