<?php
/**
 * Ajax Functions
 *
 * @package   OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die();

add_action( 'wp_ajax_osa_message_delete', 'opinionstage_message_delete' );
add_action( 'wp_ajax_opinionstage_ajax_load_my_items', 'opinionstage_load_my_items' );


/**
 * Delete message
 */
function opinionstage_message_delete() {
	if ( isset( $_POST['delete_options_oswp'] ) && true === $_POST['delete_options_oswp'] ) {
		delete_option( 'oswp_message_title' );
		delete_option( 'oswp_message_content' );
		update_option( 'oswp_message_activity_time', time() );
	}
	wp_die( '1' );
}

/**
 * Load My items
 */
function opinionstage_load_my_items() {
	check_ajax_referer( 'opinionstage-load-my-items', 'security' );

	$args_clean   = array();
	$allowed_args = array( 'type', 'per_page', 'page', 'title_like' );
	foreach ( $_GET as $key => $val ) {
		if ( in_array( $key, $allowed_args, true ) ) {
			$args_clean[ $key ] = $val;
		}
	}

	$access_token = opinionstage_user_access_token();

	$url = add_query_arg( $args_clean, OPINIONSTAGE_CONTENT_POPUP_CLIENT_WIDGETS_API );

	$response = wp_remote_get(
		$url,
		array(
			'headers' => array(
				'Accept'              => 'application/vnd.api+json',
				'Content-Type'        => 'application/vnd.api+json',
				'OSWP-Plugin-Version' => OPINIONSTAGE_WIDGET_VERSION,
				'OSWP-Client-Token'   => $access_token,
			),
		)
	);

	if ( 200 === wp_remote_retrieve_response_code( $response ) ) {
		$res_arr = json_decode( wp_remote_retrieve_body( $response ), true );

		$html = '';
		if ( isset( $res_arr['data'] ) && ! empty( $res_arr['data'] ) ) {
			ob_start();
			foreach ( $res_arr['data'] as $item ) {
				include plugin_dir_path( dirname( __FILE__ ) ) . 'admin/template-parts/my-items-tbody-element.php';
			}
			$html = ob_get_clean();
		}

		wp_send_json(
			array(
				'success'  => true,
				'nextPage' => $res_arr['meta']['nextPage'],
				'html'     => $html,
			)
		);
	}

	opinionstage_error_log( "API response error($url): " . wp_remote_retrieve_response_code( $response ) );
	wp_send_json_error();
}
