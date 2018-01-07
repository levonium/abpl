<?php
/*
Plugin Name: WP Admin Bar Page Link
Author: Levon Avetyan
Version: 1.0
Description: Adds a page link to WordPress admin menu bar
Plugin URI: https://github.com/levonium/abpl
Text Domain: abpl
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

class AdminBarPageLink {

	public function __construct() {
		add_action( 'admin_bar_menu', array( $this, 'abpl_add_link' ), 100 );
	}

	public function abpl_add_link( $admin_bar ) {

		// change the page title.
		$title = __( 'Hello there!', 'abpl' ); 

		// change the page URL.
		$url = admin_url();

		$admin_bar->add_menu( 
			array(
				'id'        => 'abpl',
				'title'     => $title,
				'href'      => $url,
				'meta'      => array(
					'title' => $title,
				),
			)
		);
	}
}

if ( is_admin() ) {
	$abpl = new AdminBarPageLink();
}
