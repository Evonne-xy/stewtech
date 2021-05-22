<?php
defined( 'ABSPATH' ) || die();

add_action( 'media_buttons', 'opinionstage_content_popup_add_editor_button' );
add_action( 'admin_enqueue_scripts', 'opinionstage_content_popup_js' );
add_action( 'admin_enqueue_scripts', 'opinionstage_enqueue_widgets_page_js' );
add_action( 'admin_footer', 'opinionstage_content_popup_html' );

/**
 * Include content popup button
 */
function opinionstage_content_popup_add_editor_button() {
	require plugin_dir_path( __FILE__ ) . 'content-popup-button.php';
}

/**
 * Include content popup JS
 */
function opinionstage_content_popup_js( $hook_suffix ) {

	if( ! in_array( $hook_suffix, array( 'post.php', 'widgets.php' ) )) {
		return;
	}

	// asset loader hotfix TODO: improve this loader machanism.
		opinionstage_register_javascript_asset(
			'content-popup',
			'content-popup.js',
			array( 'jquery' )
		);

		opinionstage_enqueue_js_asset( 'content-popup' );
}

function opinionstage_enqueue_widgets_page_js( $hook_suffix ){
    if( 'widgets.php' !== $hook_suffix ) {
        return;
    }
    
    opinionstage_register_javascript_asset(
        'widgets-page',
        'widgets-page.js',
        array( 'jquery', opinionstage_asset_name('content-popup') )
    );

    opinionstage_enqueue_js_asset( 'widgets-page' );
}

/**
 * Include content popup HTML
 */
function opinionstage_content_popup_html() {
	require_once OPINIONSTAGE_PLUGIN_DIR . 'admin/content-popup-template.html.php';
}
