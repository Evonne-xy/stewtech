<?php
/**
 * Resources
 *
 * @package OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die();

/**
 * Registers common assets
 */
function opinionstage_common_load_resources() {
	opinionstage_register_css_asset( 'menu-page', 'menu-page.css' );
	opinionstage_register_css_asset( 'icon-font', 'icon-font.css' );
	opinionstage_register_javascript_asset( 'menu-page', 'menu-page.js', array( 'jquery' ) );

	wp_localize_script(
		opinionstage_asset_name( 'menu-page' ),
		'OPINIONSTAGE',
		array(
			'myItemsNonce'      => wp_create_nonce( 'opinionstage-load-my-items' ),
		)
	);

	opinionstage_enqueue_css_asset( 'menu-page' );
	opinionstage_enqueue_css_asset( 'icon-font' );
	opinionstage_enqueue_js_asset( 'menu-page' );
}

function opinionstage_common_load_header() {

}
function opinionstage_common_load_footer() {

}
