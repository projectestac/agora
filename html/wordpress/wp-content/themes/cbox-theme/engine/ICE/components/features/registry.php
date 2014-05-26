<?php
/**
 * ICE API: features registry
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-components
 * @subpackage features
 * @since 1.0
 */

ICE_Loader::load( 'base/registry', 'components/features/factory' );

/**
 * Make keeping track of features easy
 *
 * @package ICE-components
 * @subpackage features
 */
abstract class ICE_Feature_Registry extends ICE_Registry
{
	/**
	 */
	protected function load_config_section( $section_name, $section_array )
	{
		// not a feature option by default
		$feature_option = null;

		// sub option syntax?
		if ( strpos( $section_name, self::SUB_OPTION_DELIM ) ) {
			// yes, split at special delim
			$parts = explode( self::SUB_OPTION_DELIM, $section_name );
			// feature is the first part
			$feature = $parts[0];
			// name is the second part
			$feature_option = $parts[1];
		} else {
			// feature name is section name
			$feature = $section_name;
		}

		// does theme support this feature?
		if ( current_theme_supports( $feature ) ) {
			// yes, options component enabled?
			if ( ( $feature_option ) && $this->policy()->options() instanceof ICE_Policy ) {
				// inject feature atts into config array
				$section_array[ 'feature' ] = $feature;
				// is it a sub option?
				if ( $this->policy()->options()->registry()->load_feature_option( $feature_option, $section_array ) ) {
					// yes, skip standard loading
					return true;
				}
			} else {
				// load like a regular feature
				return parent::load_config_section( $section_name, $section_array );
			}
		}

		// feature config *not* loaded
		return false;
	}
}
