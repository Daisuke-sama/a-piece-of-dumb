<?php
/**
 * Plugin Name: A Post Special Content
 * Description: Adding a widget area to a single post.
 * Version: 1.0.0alpha
 * Author: Daisuke Tsukihade-sama
 * Text Domain: apsc
 * License: GPL-2.0+
 */


// If the plugin is called directly then die.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}


add_action( 'wp_enqueue_scripts', 'apsc_add_styles' );
/**
 * Includes styles to the page.
 */
function apsc_add_styles() {
	wp_enqueue_style( 'apsc-styles', plugin_dir_url( __FILE__ ) . 'apsc-styles.css' );
}