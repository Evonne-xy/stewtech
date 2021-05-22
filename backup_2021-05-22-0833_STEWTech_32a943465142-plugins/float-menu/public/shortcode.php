<?php
/**
 * Shortcode
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

namespace float_menu_free;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

extract( shortcode_atts( array( 'id' => "" ), $atts ) );
global $wpdb;
$table  = $wpdb->prefix . 'wow_' . $this->plugin['prefix'];
$sSQL   = $wpdb->prepare( "select * from $table WHERE id = %d", $id );
$result = $wpdb->get_results( $sSQL );

if ( count( $result ) > 0 ) {

	foreach ( $result as $key => $val ) {

		$param = unserialize( $val->param );

		ob_start();
		include( 'partials/public.php' );
		ob_end_clean();


		$slug    = $this->plugin['slug'];
		$version = $this->plugin['version'];

		if ( empty( $param['disable_fontawesome'] ) ) {
			$url_icons = $this->plugin['url'] . 'assets/vendors/fontawesome/css/fontawesome-all.min.css';
			wp_enqueue_style( $slug . '-fontawesome', $url_icons, null, '5.11.2' );
		}

		$url_style = $this->plugin['url'] . 'assets/css/style.min.css';
		wp_enqueue_style( $slug, $url_style, null, $version );

		$inline_style = self::style( $param, $id );
		wp_add_inline_style( $slug, $inline_style );

		$url_velocity = $this->plugin['url'] . 'assets/js/velocity.min.js';
		wp_enqueue_script( 'velocity', $url_velocity, array( 'jquery' ), $version );

		$url_script = $this->plugin['url'] . 'assets/js/floatMenu.min.js';
		wp_enqueue_script( $slug, $url_script, array( 'jquery' ), $version );

		$inline_script = self::script( $param, $id );
		wp_add_inline_script( $slug, $inline_script );

	}
}

return;