<?php
/*
Plugin Name: Zip Code Service Area Plugin
Plugin URI:  https://github.com/Mizner/
Description:
Version:     0.0.1
Author:     Michael Mizner <michaelmizner@gmail.com>
Author URI:  https://github.com/Mizner
License:     MIT
License URI: https://opensource.org/licenses/MIT
*/


defined( "ABSPATH" ) or die( "No script kiddies please!" );

/*
 * BACK END
 */

register_activation_hook( __FILE__, 'service_areas_create_db' );
function service_areas_create_db() {
	require_once "inc/create_table.php";
}

add_action( "admin_enqueue_scripts", "service_areas_enqueue_scripts" );
function service_areas_enqueue_scripts() {
	$screen            = get_current_screen();
	$screen_identifier = $screen->base;
	if ( 'toplevel_page_service_area' == $screen_identifier ) {
		// Load Scripts
		wp_enqueue_script( 'jquery' );
		wp_enqueue_style( "service_areas_css", plugins_url( "./dist/zcsa.min.css", __FILE__ ));
		wp_enqueue_script( "service_areas_js", plugins_url( "./dist/zcsa.min.js", __FILE__ ), null, null, true );
		wp_localize_script( "service_areas_js", "SERVICE_AREA", [
			"security" => wp_create_nonce( "service_area_ajax_nonce" ),
			"success"  => "success!",
			"error"    => "error!"
		] );
	}
}

// Ajax
require_once( "inc/ajax_post.php" );

// Admin Menu & Page
require_once( "inc/dashboard.php" );


/*
 * FRONT END
 */
require_once( "inc/front-end-zip-match-form.php" );


add_action( "wp_enqueue_scripts", "zcsa_front_end_scripts" );
function zcsa_front_end_scripts() {
	if ( is_page( "service-request-page" ) ) {
		wp_enqueue_style( "service_areas_css_front", plugins_url( "./dist/zcsafront.min.css", __FILE__ ) );
		wp_enqueue_script( "service_areas_js_front", plugins_url( "./dist/zcsafront.min.js", __FILE__ ), null, null, true );

		// Get CSV of supported Zip Codes (pass into localize_script)
		$upload_dir       = wp_upload_dir();
		$upload_file      = $upload_dir["baseurl"] . "/serviceareas.csv";
		$service_area_csv = file_get_contents( $upload_file );
		wp_localize_script( "service_areas_js_front", "SERVICE_AREA_ZIPS", [
			"zips" => $service_area_csv,
		] );
	}

}
