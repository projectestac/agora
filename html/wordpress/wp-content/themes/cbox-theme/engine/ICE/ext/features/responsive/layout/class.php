<?php
/**
 * ICE API: feature extensions, responsive layout feature class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2012 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage features
 * @since 1.0
 */

ICE_Loader::load( 'components/features/component' );

/**
 * Responsive layout feature
 *
 * @package ICE-extensions
 * @subpackage features
 */
class ICE_Ext_Feature_Responsive_Layout
	extends ICE_Feature
{
	/**
	 */
	protected function init()
	{
		// run parent init method
		parent::init();

		// add actions
		add_action( 'open_head', array( $this, 'viewport_meta' ) );
		add_action( 'wp_head', array( $this, 'render' ) );
	}

	/**
	 * Render viewport meta tag
	 */
	public function viewport_meta()
	{
		// render meta tag ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><?php
	}

}
