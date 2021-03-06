<?php

namespace WP_Defender\Traits;

trait Plugin {

	/**
	 * Get all installed plugins.
	 *
	 * @return array
	 */
	public function get_plugins() {
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		// WordPress caches this internally.
		return get_plugins();
	}
}
