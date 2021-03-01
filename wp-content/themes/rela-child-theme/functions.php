<?php
/**
 * The template includes necessary functions for theme.
 *
 * @package rela
 * @since 1.0
 */


if (! function_exists('rela_child_styles')) {
	function rela_child_styles(){

		// register style
		wp_enqueue_style('rela-child-css', get_stylesheet_directory_uri() . '/style.css');
		wp_enqueue_style('gravity-form-styles', get_stylesheet_directory_uri() . '/css/gravity.css');
        wp_enqueue_script('global-scripts', get_stylesheet_directory_uri() . '/js/global-scripts.js', array('jquery'), '', true);

        if (is_page([6969,6980, 159, 6971, 6748, 6973])) {
            wp_enqueue_style('service-styles', get_stylesheet_directory_uri() . '/css/service-styles.css');
        }

	}
}
add_action( 'wp_enqueue_scripts', 'rela_child_styles');