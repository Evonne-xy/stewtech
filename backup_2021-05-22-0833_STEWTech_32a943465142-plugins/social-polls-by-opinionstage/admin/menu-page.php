<?php
/**
 * Registers admin pages
 *
 * @package OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die();
require_once plugin_dir_path( __FILE__ ) . '../includes/opinionstage-client-session.php';
add_action( 'admin_menu', 'opinionstage_register_menu_page' );

/**
 * Registers admin pages
 */
function opinionstage_register_menu_page() {
	if ( function_exists( 'add_menu_page' ) ) {
		$os_client_logged_in = opinionstage_user_logged_in();
		if ( $os_client_logged_in ) {
			add_menu_page(
				__( 'Opinion Stage', 'social-polls-by-opinionstage' ),
				__( 'Opinion Stage', 'social-polls-by-opinionstage' ),
				'edit_posts',
				OPINIONSTAGE_MENU_SLUG,
				'opinionstage_load_template',
				plugins_url( 'admin/images/os-icon.png', plugin_dir_path( __FILE__ ) ),
				'25.234323221'
			);
			add_submenu_page( OPINIONSTAGE_MENU_SLUG, 'View My Items', 'My Items', 'edit_posts', OPINIONSTAGE_MENU_SLUG );
			add_submenu_page( OPINIONSTAGE_MENU_SLUG, 'Get Help', 'Get Help', 'edit_posts', OPINIONSTAGE_HELP_RESOURCE_SLUG, 'opinionstage_load_template' );
		} else {
			add_menu_page(
				__( 'Opinion Stage', 'social-polls-by-opinionstage' ),
				__( 'Opinion Stage', 'social-polls-by-opinionstage' ),
				'edit_posts',
				OPINIONSTAGE_GETTING_STARTED_SLUG,
				'opinionstage_load_template',
				plugins_url( 'admin/images/os-icon.png', plugin_dir_path( __FILE__ ) ),
				'25.234323221'
			);
			add_submenu_page( OPINIONSTAGE_GETTING_STARTED_SLUG, 'Getting Started', 'Getting Started', 'edit_posts', OPINIONSTAGE_GETTING_STARTED_SLUG, 'opinionstage_load_template' );
			add_submenu_page( OPINIONSTAGE_GETTING_STARTED_SLUG, 'Create...', 'Create...', 'edit_posts', OPINIONSTAGE_MENU_SLUG, 'opinionstage_load_template' );
		}
	}
}

/**
 * Loads admin pages
 */
function opinionstage_load_template() {
	$OSAPL = OpinionStageAdminPageLoader::getInstance();
	$OSAPL->OSAPL_LoadTemplateFile();
}
