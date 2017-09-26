<?php
/**
 * Plugin Name: Custom Login Page 143213
 * Version: 1.0alpha
 * Author: Daisuke-sama
 * License: GPL2+
 * Text Domain: clp1_3
 */


/*
 * Adding custom scripts.
 */
add_action( 'login_enqueue_scripts', 'clp1_3_login_styles' );
function clp1_3_login_styles() {
	wp_enqueue_style( 'clp1_3-custom-stylesheet', plugin_dir_url( __FILE__ ) . 'css/login-styles.css' );
}

/*
 * Changing an error message.
 */
add_filter( 'login_errors', 'clp1_3_error_message' );
function clp1_3_error_message() {
	return 'Well, that wasn\'t it';
}

/*
 * Disabling notification message.
 */
add_filter( 'login_messages', '__return_null' );

/*
 * Stop shaking of the login form when error are happening.
 */
add_action( 'login_head', 'clp1_3_remove_login_shakes' );
function clp1_3_remove_login_shakes() {
	remove_action( 'login_head', 'wp_shake_js', 12 );
}

add_action('init', 'remqm');
function remqm() {
	global $QueryMonitor;
	remove_action( 'plugins_loaded', [ $QueryMonitor, 'action_plugins_loaded']);
}