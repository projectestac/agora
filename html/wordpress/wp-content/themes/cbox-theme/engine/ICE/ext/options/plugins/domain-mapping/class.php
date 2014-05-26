<?php
/**
 * ICE API: option extensions, domain mapping plugin class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

ICE_Loader::load_ext( 'options/text' );

/**
 * Domain mapping plugin option
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Plugins_Domain_Mapping
	extends ICE_Ext_Option_Text
{
	/**
	 */
	protected function init()
	{
		// is the plugin active?
		if ( $this->plugin_active() ) {

			// yes, ok to init
			parent::init();

			// init directives
			$this->title = __( 'Custom Domain', infinity_text_domain );
			$this->description = __( 'Enter the custom domain name you wish to map to your site.', infinity_text_domain );
			
		} else {
			// not active
			throw new Exception( 'The domain mapping plugin has not been enabled' );
		}
	}

	/**
	 */
	protected function get_option()
	{
		global $wpdb;

		// the statement
		$statement =
			$wpdb->prepare("
				SELECT
					`domain`
				FROM
					`{$wpdb->dmtable}`
				WHERE
					`blog_id` = %d",
				get_current_blog_id()
			);

		return $wpdb->get_var( $statement );
	}

	/**
	 */
	protected function update_option( $value )
	{
		global $wpdb;

		// is the domain valid?
		if ( $this->validate_domain( $value ) ) {
			// is a domain set already?
			if ( $this->get_option() ) {
				// yes, update statement
				$statement =
					$wpdb->prepare("
						UPDATE
							`{$wpdb->dmtable}`
						SET
							`domain` = %s,
							`active` = 1
						WHERE
							`blog_id` = %d",
						$value,
						get_current_blog_id()
					);
			} else {
				// no, insert statement
				$statement =
					$wpdb->prepare("
						INSERT INTO
							`{$wpdb->dmtable}` ( `blog_id`, `domain`, `active` )
						VALUES
							( %d, %s, 1 )",
						get_current_blog_id(),
						$value
					);
			}

			// execute query and return results
			return $wpdb->query( $statement );
		}

		// something went wrong
		return false;
	}

	/**
	 */
	public function delete_option()
	{
		global $wpdb;

		// the statement
		$statement =
			$wpdb->prepare("
				DELETE FROM
					`{$wpdb->dmtable}`
				WHERE
					`blog_id` = %d",
				get_current_blog_id()
			);

		// execute query and return result
		return $wpdb->query( $statement );
	}

	/**
	 * Returns true if the domain mapping plugin is active
	 * 
	 * @return boolean 
	 */
	protected function plugin_active()
	{
		return function_exists( 'dm_sunrise_warning' );
	}

	/**
	 * Validate domain to ensure it is of the correct format
	 *
	 * @param string $domain
	 * @return boolean
	 */
	protected function validate_domain( $domain )
	{
		return ( preg_match( '/^[a-z0-9](-?[a-z0-9]+)*\.[a-z]{2,4}$/i', $domain ) );
	}
}
