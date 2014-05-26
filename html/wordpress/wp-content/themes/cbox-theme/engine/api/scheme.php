<?php
/**
 * Infinity Theme: scheme initilization file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity-api
 * @since 1.0
 */

ICE_Loader::load( 'schemes' );

/**
 * Initialize and load the scheme for the active theme
 *
 * @package Infinity-api
 * @return boolean
 */
function infinity_scheme_init()
{
	// initialize the scheme
	ICE_Scheme::instance()
		->set_config_file( INFINITY_SLUG )
		->set_config_dir( INFINITY_ENGINE_DIR . '/config' )
		->set_docs_dir( INFINITY_ENGINE_DIR . '/documents' )
		->set_exts_dir( INFINITY_ENGINE_DIR . '/extensions' )
		->init( INFINITY_NAME );

	// initialize policies (the order is important here)
	Infinity_Sections_Policy::instance();
	Infinity_Options_Policy::instance();
	Infinity_Features_Policy::instance();
	Infinity_Screens_Policy::instance();
	Infinity_Widgets_Policy::instance();
	Infinity_Shortcodes_Policy::instance();

	do_action( 'infinity_scheme_init' );

	return true;
}

/**
 * Finalize scheme for the active theme
 *
 * @package Infinity-api
 * @return boolean
 */
function infinity_scheme_finalize()
{
	// finalize registries
	Infinity_Sections_Policy::instance()->registry()->finalize();
	Infinity_Options_Policy::instance()->registry()->finalize();
	Infinity_Features_Policy::instance()->registry()->finalize();
	Infinity_Screens_Policy::instance()->registry()->finalize();
	Infinity_Widgets_Policy::instance()->registry()->finalize();
	Infinity_Shortcodes_Policy::instance()->registry()->finalize();

	return true;
}

/**
 * Get a scheme directive value
 *
 * @package Infinity-api
 * @param string $name
 * @return mixed
 */
function infinity_scheme_directive( $name )
{
	return ICE_Scheme::instance()->directives()->get($name)->get_value();
}

/**
 * Check if a file exists anywhere in the scheme and return the absolute path
 *
 * @package Infinity-api
 * @param string $filename
 * @return string
 */
function infinity_locate_file( $filename )
{
	return ICE_Scheme::instance()->locate_file( $filename );
}

/**
 * Check if template exists anywhere in the scheme
 *
 * @package Infinity-api
 * @param string|array $template_name
 * @param boolean $load Auto load template if set to true
 * @return string
 */
function infinity_locate_template( $template_name, $load = false )
{
	return ICE_Scheme::instance()->locate_template( $template_name, $load );
}

/**
 * Load a template
 *
 * @package Infinity-api
 * @param string|array $template_name
 * @return string
 */
function infinity_load_template( $template_name )
{
	return infinity_locate_template( $template_name, true );
}

/**
 * Return absolute path to first image matching path in the scheme stack
 *
 * @package Infinity-api
 * @param string $path Image file path RELATIVE to your image_root setting
 */
function infinity_image_path( $path )
{
	// locate image in scheme stack
	return ICE_Scheme::instance()->locate_image( $path );
}

/**
 * Return URL to first image matching path in the scheme stack
 *
 * @package Infinity-api
 * @param string $path Image file path RELATIVE to your image_root setting
 */
function infinity_image_url( $path )
{
	// locate image in scheme stack
	$image_path = infinity_image_path( $path );
	// convert path to url
	return ($image_path) ? ICE_Files::theme_file_to_url($image_path) : null;
}

/**
 * Return absolute path to first style matching path in the scheme stack
 *
 * @package Infinity-api
 * @param string $path Stylesheet file path RELATIVE to your style_root setting
 */
function infinity_style_path( $path )
{
	// locate style in scheme stack
	return ICE_Scheme::instance()->locate_style( $path );
}

/**
 * Return URL to first style matching path in the scheme stack
 *
 * @package Infinity-api
 * @param string $path Stylesheet file path RELATIVE to your style_root setting
 */
function infinity_style_url( $path )
{
	// locate style in scheme stack
	$style_path = infinity_style_path( $path );
	// convert path to url
	return ($style_path) ? ICE_Files::theme_file_to_url($style_path) : null;
}

/**
 * Return absolute path to first script matching path in the scheme stack
 *
 * @package Infinity-api
 * @param string $path Script file path RELATIVE to your script_root setting
 */
function infinity_script_path( $path )
{
	// locate script in scheme stack
	return ICE_Scheme::instance()->locate_script( $path );
}

/**
 * Return URL to first script matching path in the scheme stack
 *
 * @package Infinity-api
 * @param string $path Script file path RELATIVE to your script_root setting
 */
function infinity_script_url( $path )
{
	// locate script in scheme stack
	$script_path = infinity_script_path( $path );
	// convert path to url
	return ($script_path) ? ICE_Files::theme_file_to_url($script_path) : null;
}

/**
 * Load a header from the scheme stack
 *
 * @package Infinity-api
 * @param string $name
 * @return boolean
 */
function infinity_get_header( $name = null )
{
	return ICE_Scheme::instance()->get_header( $name );
}

/**
 * Load a footer from the scheme stack
 *
 * @package Infinity-api
 * @param string $name
 * @return boolean
 */
function infinity_get_footer( $name = null )
{
	return ICE_Scheme::instance()->get_footer( $name );
}

/**
 * Load a sidebar from the scheme stack
 *
 * @package Infinity-api
 * @param string $name
 * @return boolean
 */
function infinity_get_sidebar( $name = null )
{
	return ICE_Scheme::instance()->get_sidebar( $name );
}

/**
 * Load the search form from the scheme stack
 *
 * @package Infinity-api
 * @param string $echo
 * @return boolean
 */
function infinity_get_search_form( $echo = true )
{
	return ICE_Scheme::instance()->get_search_form( $echo );
}

/**
 * Load a template part from the scheme stack
 *
 * @package Infinity-api
 * @param string $slug The slug name for the generic template.
 * @param string $name The name of the specialised template.
 * @return boolean
 */
function infinity_get_template_part( $slug, $name = null )
{
	return ICE_Scheme::instance()->get_template_part( $slug, $name );
}

/**
 * Load comments template from the scheme stack (wrapper)
 *
 * @package Infinity-api
 * @param string $file Optional, default '/comments.php'. The file to load
 * @param bool $separate_comments Optional, whether to separate the comments by comment type. Default is false.
 */
function infinity_comments_template( $file = null, $separate_comments = false )
{
	if ( $file === null ) {
		$file = '/comments.php';
	}

	// this is just a wrapper to avoid confusion
	return comments_template( $file, $separate_comments );
}
