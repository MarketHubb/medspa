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


	}
}
add_action( 'wp_enqueue_scripts', 'rela_child_styles');