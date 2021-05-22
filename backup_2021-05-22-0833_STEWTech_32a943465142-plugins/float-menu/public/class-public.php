<?php
/**
 * Public Class
 *
 * @package     Wow_Plugin
 * @subpackage  Public
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

namespace float_menu_free;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Wow_Plugin_Public {

	/**
	 * Setup to admin panel of the plugin
	 *
	 * @param array $info general information about the plugin
	 *
	 * @since 1.0
	 */
	public function __construct( $info ) {
		$this->plugin = $info['plugin'];
		$this->url    = $info['url'];
		$this->rating = $info['rating'];


		add_shortcode( $this->plugin['shortcode'], array( $this, 'shortcode' ) );
		// Display on the site
		add_action( 'wp_footer', array( $this, 'display' ) );
	}

	static function sub_menu_array( $var ) {
		return ( ! empty( $var ) );
	}

	/**
	 * Display a shortcode
	 *
	 * @param $atts
	 *
	 * @return false|string
	 */
	public function shortcode( $atts ) {

		ob_start();
		require plugin_dir_path( __FILE__ ) . 'shortcode.php';
		ob_end_clean();

		if ( isset ( $menu ) ) {
			return $menu;
		} else {
			return false;
		}

	}

	/**
	 * Display the Item on the specific pages, not via the Shortcode
	 */
	public function display() {
		require plugin_dir_path( __FILE__ ) . 'display.php';
	}

	/**
	 * Create Inline style for elements
	 */
	public function style( $param, $id ) {
		$css = '';
		require 'generator-style.php';

		return $css;

	}

	/**
	 * Create Inline script for elements
	 */
	public function script( $param, $id ) {
		$js = '';
		require 'generator-script.php';

		return $js;

	}

}