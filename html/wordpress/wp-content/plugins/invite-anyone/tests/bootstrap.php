<?php

if ( ! defined( 'BP_TESTS_DIR' ) ) {
	define( 'BP_TESTS_DIR', dirname( __FILE__ ) . '/../../buddypress/tests/phpunit' );
}

if ( file_exists( BP_TESTS_DIR . '/bootstrap.php' ) ) :

	require_once getenv( 'WP_DEVELOP_DIR' ) . '/tests/phpunit/includes/functions.php';

	function _bootstrap_invite_anyone() {
		// Make sure BP is installed and loaded first
		require BP_TESTS_DIR . '/includes/loader.php';

		// Then load Invite Anyone
		require dirname( __FILE__ ) . '/../invite-anyone.php';
	}
	tests_add_filter( 'muplugins_loaded', '_bootstrap_invite_anyone' );

	require getenv( 'WP_DEVELOP_DIR' ) . '/tests/phpunit/includes/bootstrap.php';

	// Load the BP test files
	require BP_TESTS_DIR . '/includes/testcase.php';

endif;
