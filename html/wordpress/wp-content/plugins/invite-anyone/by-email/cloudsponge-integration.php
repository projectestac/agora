<?php

class Cloudsponge_Integration {
	var $enabled;
	var $key;

	/**
	 * PHP 5 Constructor
	 *
	 * @package Invite Anyone
	 * @since 0.8
	 */
	function __construct() {

		if ( empty( $options ) )
			$options = get_option( 'invite_anyone' );

		$this->enabled = !empty( $options['cloudsponge_enabled'] ) ? $options['cloudsponge_enabled'] : false;
		$this->key     = !empty( $options['cloudsponge_key'] ) ? $options['cloudsponge_key'] : false;

		if ( $this->enabled && $this->key ) {
			define( 'INVITE_ANYONE_CS_ENABLED', true );
			add_action( 'invite_anyone_after_addresses', array( $this, 'import_markup' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_script' ) );
		}
	}

	/**
	 * Registers and loads CS JS.
	 *
	 * For now, this is overly generous to account for the fact that people can have the IA
	 * widget installed on any page. In the future I'll try to clean it up a bit.
	 *
	 * @package Invite Anyone
	 * @since 0.8.8
	 */
	function enqueue_script() {
		wp_enqueue_script( 'ia_cloudsponge_address_books', 'https://api.cloudsponge.com/address_books.js', array(), false, true );
		wp_enqueue_script( 'ia_cloudsponge', WP_PLUGIN_URL . '/invite-anyone/by-email/cloudsponge-js.js', array( 'ia_cloudsponge_address_books' ), false, true );

		// The domain key must be printed as a javascript object so it's accessible to the
		// script
		$strings = array( 'domain_key' => $this->key );

		if ( $locale = apply_filters( 'ia_cloudsponge_locale', '' ) ) {
			$strings['locale'] = $locale;
		}

		if ( $stylesheet = apply_filters( 'ia_cloudsponge_stylesheet', '' ) ) {
			$strings['stylesheet'] = $stylesheet;
		}

		wp_localize_script( 'ia_cloudsponge', 'ia_cloudsponge', $strings );
	}

	/**
	 * Inserts the Cloudsponge markup into the Send Invites front end page
	 *
	 * @package Invite Anyone
	 * @since 0.8
	 *
	 * @param array $options Invite Anyone settings. Check em so we can bail if necessary
	 */
	function import_markup( $options = false ) {
		?>

<input type="hidden" id="cloudsponge-emails" name="cloudsponge-emails" value="" />

<?php _e( 'You can also add email addresses <a class="cs_import">from your Address Book</a>.', 'bp-invite-anyone' ) ?>

		<?php
	}
}
$cloudsponge_integration = new Cloudsponge_Integration;
