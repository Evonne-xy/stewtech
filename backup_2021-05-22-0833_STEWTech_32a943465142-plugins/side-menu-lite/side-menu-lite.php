<?php
/**
 * Plugin Name:       Side Menu Lite
 * Plugin URI:        https://wordpress.org/plugins/side-menu-lite/
 * Description:       Provide any extra content and functionality with the attention-grabbing side menu!
 * Version:           2.1.1
 * Author:            Wow-Company
 * Author URI:        https://wow-estore.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       side-menu
 */

namespace side_menu;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! class_exists( 'Wow_Plugin' ) ) {

	final class Wow_Plugin {

		private static $instance;

		const PREF = 'side_menu_pro';

		public static function instance() {

			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Wow_Plugin ) ) {

				$info = array(
					'plugin' => array(
						'name'      => esc_attr__( 'Side Menu Lite', 'side-menu' ), // Plugin name
						'menu'      => esc_attr__( 'Side Menu Lite', 'side-menu' ), // Plugin name in menu
						'author'    => 'Wow-Company', // Author
						'prefix'    => self::PREF, // Prefix for database
						'text'      => 'side-menu',    // Text domain for translate files
						'version'   => '2.1.1', // Current version of the plugin
						'file'      => __FILE__, // Main file of the plugin
						'slug'      => dirname( plugin_basename( __FILE__ ) ), // Name of the plugin folder
						'url'       => plugin_dir_url( __FILE__ ), // filesystem directory path for the plugin
						'dir'       => plugin_dir_path( __FILE__ ), // URL directory path for the plugin
						'shortcode' => 'Side-Menu',
					),
					'url'    => array(
						'author'   => 'https://wow-estore.com/',
						'home'     => 'https://wordpress.org/plugins/side-menu-lite/',
						'support'  => 'https://wordpress.org/support/plugin/side-menu-lite/',
						'pro'      => 'https://wow-estore.com/item/floating-button-pro/',
						'facebook' => 'https://www.facebook.com/wowaffect/',
					),
					'rating' => array(
						'website'  => 'WordPress.org', // Name site for rating plugin
						'url'      => 'https://wordpress.org/support/plugin/side-menu-lite/reviews/#new-post',
						'wp_url'   => 'https://wordpress.org/support/plugin/side-menu-lite/reviews/#new-post',
						'wp_home'  => 'https://wordpress.org/plugins/side-menu-lite/',
						'wp_title' => 'Side Menu Lite – add sticky fixed buttons',
					),
				);

				self::$instance = new Wow_Plugin;

				register_activation_hook( __FILE__, array( self::$instance, 'plugin_activate' ) );
				add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );

				self::$instance->includes();
				self::$instance->admin  = new Wow_Plugin_Admin( $info );
				self::$instance->public = new Wow_Plugin_Public( $info );
			}

			return self::$instance;
		}

		public function __clone() {
			// Cloning instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'side-menu' ), '1.0' );
		}

		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'side-menu' ), '1.0' );
		}


		private function includes() {
			if ( ! class_exists( 'Wow_Company' ) ) {
				require_once plugin_dir_path( __FILE__ ) . 'includes/class-wow-company.php';
			}
			require_once plugin_dir_path( __FILE__ ) . 'includes/class-js-packer.php';
			require_once plugin_dir_path( __FILE__ ) . 'includes/class-db.php';
			require_once plugin_dir_path( __FILE__ ) . 'admin/class-admin.php';
			require_once plugin_dir_path( __FILE__ ) . 'public/class-public.php';
		}

		public function plugin_activate() {
			require_once plugin_dir_path( __FILE__ ) . 'includes/plugin-activation.php';
		}


		public function load_textdomain() {
			load_plugin_textdomain( 'side-menu', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}

	}
}
function wow_plugin_run() {
	return Wow_Plugin::instance();
}

// Get Running.
wow_plugin_run();