<?php 
/***************************************************************/
/* Define Constant */
/***************************************************************/
define( 'HOME_URI', home_url() );
define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_IMAGES', THEME_URI . '/images' );
define( 'THEME_CSS', THEME_URI . '/css' );
define( 'THEME_JS', THEME_URI . '/js' );

/***************************************************************/
/* Exray class */
/***************************************************************/
require 'classes/exray.php';

/***************************************************************/
/* Theme template / parts */
/***************************************************************/
require ('functions/exray-theme-template.php');
require ('functions/exray-theme-customizer.php');
require ('functions/exray-theme-stylesheet.php');
require ('functions/exray-theme-options.php');
require('functions/exray-theme-banner.php');

/* Global Variable */
$exray_general_options = get_option('exray_theme_general_options');
$exray = new Exray;

$exray->set_max_content_width(542);
$exray->get_max_content_width();
$exray->set_aside_symbol(true);

/***************************************************************/
/* Add Post Thumbnail and Post Format Theme Support*/
/***************************************************************/
add_action( 'after_setup_theme', 'exray_setup' );

function exray_setup(){
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
	add_theme_support('post-formats', array('link', 'quote', 'gallery', 'aside'));
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails', array('post'));
	set_post_thumbnail_size( 150, 150, true);	// Post Thumbnail default size 	
	load_theme_textdomain( 'exray-framework', THEME_URI. '/languages' );
	
	register_nav_menus(
		array(
		  'top-menu' => __( 'Top Menu', 'exray-framework' ),
		  'main-menu' => __( 'Main Menu', 'exray-framework' )
		)
	);
}

/***************************************************************/
/* Enqueu scripts and stylesheet */
/***************************************************************/
add_action('wp_enqueue_scripts', 'exray_scripts_styles');

function exray_scripts_styles(){
	wp_enqueue_style( 'style.css', get_stylesheet_uri(),'', false, 'all' );
	wp_enqueue_script( 'custom_scripts', THEME_JS . '/scripts.js', array('jquery'), false, true );
}

/***************************************************************/
/* Creates a more specific title element text  */
/***************************************************************/
function exray_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'exray-framework' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'exray_wp_title', 10, 2 );

/***************************************************************/
/* add ie conditional html5 shim to header  */
/***************************************************************/
add_action('wp_head', 'add_ie_html5_shim');

function add_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo '<![endif]-->';
}