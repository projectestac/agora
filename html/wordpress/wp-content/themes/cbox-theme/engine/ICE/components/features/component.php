<?php
/**
 * ICE API: feature class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-components
 * @subpackage features
 * @since 1.0
 */

ICE_Loader::load( 'base/component', 'dom/styleable' );

/**
 * Make a feature easy
 *
 * @package ICE-components
 * @subpackage features
 */
abstract class ICE_Feature
	extends ICE_Component
{
	/**
	 * Sub options toggle
	 *
	 * @var boolean
	 */
	protected $suboptions = false;

	/**
	 * @internal
	 */
	public function init_registered()
	{
		// call parent
		parent::init_registered();

		// suboptions toggled on?
		if ( true === $this->suboptions ) {
			// look for an options configuration file
			// TODO this should be loading ALL options files in stack
			$options_file = $this->locate_file( 'options.ini' );
			// find one?
			if ( $options_file ) {
				// load using options registry
				$this->policy()
					->options()
					->registry()
					->load_feature_options_file( $this, $options_file );
			}
		}
	}

	/**
	 * Check if theme supports this feature
	 *
	 * @return boolean
	 */
	public function supported()
	{
		if ( !current_theme_supports( $this->property( 'name' ) ) ) {
			return false;
		}

		return parent::supported();
	}
	
}
