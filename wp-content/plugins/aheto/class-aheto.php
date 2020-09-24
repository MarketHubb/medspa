<?php
/**
 * Aheto
 *
 * @package      Aheto
 * @copyright    Copyright (C) 2018, UPQODE
 * @link         https://upqode.com
 *
 * @wordpress-plugin
 * Plugin Name:       Aheto
 * Version:           1.0.9.2.1
 * Plugin URI:        https://aheto.co
 * Description:       Beautifully designed templates for popular WordPress page builders from UPQODE
 * Author:            UPQODE
 * Author URI:        https://upqode.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       aheto
 * Domain Path:       /i18n/languages
 */

defined( 'ABSPATH' ) || exit;

define( 'AHETO_FILE', __FILE__ );
defined( 'AHETO_URL' ) or define( 'AHETO_URL', plugins_url( 'aheto' ) );

add_action('admin_bar_menu', 'register_admin_bar_link', 99);


/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_aheto() {

	if ( ! class_exists( 'Appsero\Client' ) ) {
		require_once __DIR__ . '/vendor/appsero/client/src/Client.php';
	}

	$client = new Appsero\Client( '67d54f16-4a47-4afa-8a33-e658bb83fd16', 'Aheto', __FILE__ );

	// Active insights
	$client->insights()->init();

	// Active automatic updater
	$client->updater();

}

appsero_init_tracker_aheto();

/*
 * Uncomment when need not manually process of deactivating layouts
add_action( 'save_post', 'action_function_name', 10, 2 );
/**
 * Function saving layouts info in db
 *
 * @param $post_ID
 * @param $post
function action_function_name( $post_ID, $post ) {
	$a = str_replace('\"', '"' , $_POST['actions']);
	$data = json_decode( $a );
	$layouts = [];
	$current_options  =  get_option('aheto-layouts');
	foreach ($data->save_builder->data->elements as $element ) {
		$elements = $element->elements[0]->elements[0];
		$widget_type = $elements->widgetType;
		$pos = strpos( $widget_type, 'aheto_' );
		if ( $pos !== false ) {
			$layout =  $elements->settings->template;
			$layout = ( empty( $layout ) ) ? 'layout1' : $layout;
			$current_options[$widget_type]['relations'][$post_ID] = $layout;
			$array_values = array_values($current_options[$widget_type]['relations']);
			$uniques = array_unique($array_values);
			$current_options[$widget_type]['uniques'] = $uniques;
		}
	}
	update_option( 'aheto-layouts', $current_options, '', 'yes' );
}
*/

/**
 * PSR-4 Autoload.
 */
function aheto_autoload() {
	// Composer ClassLoader.
	$loader = include dirname( __FILE__ ) . '/vendor/autoload.php';


	// Get aheto option.
	$options = get_option( 'aheto-general-settings' );

	// Set builder.
	$builder = isset( $options['builder'] ) && !empty($options['builder']) ? $options['builder'] : 'elementor';

	// Kinda Dependency Injection :).
	$loader->addClassMap([
		'Aheto\\Shortcode' => dirname( __FILE__ ) . '/includes/builders/' . $builder . '/abstract-shortcode.php',
	]);
}


/**
 * Register admin bar link for plugin
 */
function register_admin_bar_link() {

	global $wp_admin_bar;

	$wp_admin_bar->add_node( array(
		'id'    => 'aheto-setting-up',
		'title' => __( '<img src="' . aheto()->plugin_icon() .'" style="width:auto;height:16px;position:relative;top:3px;"> ' . aheto()->plugin_name(), 'aheto' ),
		'href'  => admin_url( 'admin.php?page=aheto-setting-up' ),
	));

//	$wp_admin_bar->add_menu(array('parent' => 'aheto-setting-up', 'title' => __('Homepage'), 'id' => 'aheto-home', 'href' => '/', 'meta' => array('target' => '_blank')));

}



/**
 * Main instance of Aheto.
 *
 * Returns the main instance of Aheto to prevent the need to use globals.
 *
 * @return Aheto
 */
function aheto() {
	return \Aheto\Aheto::instance();
}

// Kick it off.
aheto_autoload();
add_action( 'plugins_loaded', 'aheto', 11 );
