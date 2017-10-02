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
	if ( apply_filters( 'apsc_load_styles', true ) ) {
		wp_enqueue_style( 'apsc-styles', plugin_dir_url( __FILE__ ) . 'apsc-styles.css' );
	}
}

// Uncomment the following line to keep internal stylesheets from loading.
// add_filter('apsc_load_styles', '__return_false');


add_action( 'widgets_init', 'apsc_register_sidebar' );
/**
 * Registers a sidebar area on a single page.
 */
function apsc_register_sidebar() {
	register_sidebar( [
		'name'          => __( 'Post Special Content', 'apsc' ),
		'id'            => 'apsc-sidebar',
		'description'   => __( 'Widget in this area will be displayed in a single post.', 'apsc' ),
		'before_widget' => '<div class="widget apsc-sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle apsc-title">',
		'after_title'   => '</h2>'
	] );
}


add_filter( 'the_content', 'apsc_display_sidebar' );
/**
 * Display sidebar on a single page only.
 *
 * @param $content
 */
function apsc_display_sidebar( $content ) {}

if ( is_single() && is_active_sidebar( 'apsc-sidebar' ) && is_main_query() ) {
	dynamic_sidebar( 'apsc-sidebar' );
}

return $content;
