<?php
/**
 * Infinity Theme: base
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2013 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage base
 * @since 1.1
 */

/**
 * Include dashboard if applicable
 */
if ( is_admin() ) {
	// load admin functionality
	require_once INFINITY_ADMIN_PATH . '/loader.php';
}

// add post formats
function infinity_base_post_formats()
{
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'audio',
			'chat',
			'gallery',
			'image',
			'link',
			'quote',
			'status',
			'video'
		)
	);
}
add_action( 'after_setup_theme', 'infinity_base_post_formats' );


/**
 * Set the content width based on the theme's design and stylesheet.
 * Used to set the width of images and content. Should be equal to the
 * width the theme is designed for, generally via the style.css stylesheet.
 */
function infinity_base_set_content_width()
{
	global $content_width;

	if ( false === isset( $content_width ) ) {
		$content_width = 760;
		add_theme_support( 'automatic-feed-links' );
	}
}
add_action( 'after_setup_theme', 'infinity_base_set_content_width' );

/**
 * Add special "admin bar is showing" body class
 */
function infinity_base_admin_bar_class( $classes )
{
	if ( is_admin_bar_showing() ) {
		// *append* class to the array
		$classes[] = 'admin-bar-showing';
	}

	// return it!
	return $classes;
}
add_filter( 'body_class', 'infinity_base_admin_bar_class' );

/**
 * Setup post thumbnail sizes
 *
 * @package Infinity
 * @subpackage base
 */
function infinity_base_post_thumb_sizes()
{
	if (
		current_theme_supports( 'infinity-post-thumbnails' ) &&
		current_theme_supports( 'post-thumbnails' )
	) {
		set_post_thumbnail_size( 35, 35, true );
		add_image_size( 'post-image', 674, 140, true );
		add_image_size( 'slider-full', 980, 360, true );
		add_image_size( 'thumbnail-large', 600, 200, true );
		add_image_size( 'thumbnail-post', 210, 160, true );
	}
}
add_action( 'after_setup_theme', 'infinity_base_post_thumb_sizes' );

/**
 * Enqueue Comment Script
 *
 * @package Infinity
 * @subpackage base
 */
function infinity_enqueue_comments_reply()
{
	if( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'comment_form_before', 'infinity_enqueue_comments_reply' );

/**
 * Register menus
 *
 * @package Infinity
 * @subpackage base
 */
function infinity_base_register_menus()
{
	if ( current_theme_supports( 'infinity-top-menu-setup' ) ) {
		register_nav_menu( 'over-menu', __( 'Above Header', infinity_text_domain ) );
	}
	if ( current_theme_supports( 'infinity-main-menu-setup' ) ) {
		register_nav_menu( 'main-menu', __( 'Inside Header', infinity_text_domain ) );
	}
	if ( current_theme_supports( 'infinity-sub-menu-setup' ) ) {
		register_nav_menu( 'sub-menu', __( 'Below Header', infinity_text_domain ) );
	}
	if ( current_theme_supports( 'infinity-footer-menu-setup' ) ) {
		register_nav_menu( 'footer-menu', __( 'Inside Footer', infinity_text_domain ) );
	}
}
add_action( 'after_setup_theme', 'infinity_base_register_menus' );

/**
 * Display a nav menu using a custom walker
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @package Infinity
 * @subpackage base
 * @see wp_nav_menu()
 * @param string $theme_location Theme location, 'theme_location' arg passed to wp_nav_menu()\
 */
function infinity_base_nav_menu( $theme_location )
{
	wp_nav_menu( array(
		'theme_location' => $theme_location,
		'menu_class' => 'sf-menu',
		'container' => '',
		'fallback_cb' => 'infinity_base_page_menu',
		'walker' => new Infinity_Base_Walker_Nav_Menu()
	));
}

/**
 * Display a page menu using a custom page walker
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @package Infinity
 * @subpackage base
 * @see wp_list_pages()
 */
function infinity_base_page_menu()
{
	// open the list ?>
	<ul class="sf-menu"><?php
		wp_list_pages(array(
			'title_li' => null,
			'walker' => new Infinity_Base_Walker_Page_Menu()
		));
	// close list?>
	</ul><?php
}

/**
 * Render a single superfish list item
 *
 * @param array $args
 * @param boolean $output
 * @return void|string
 */
function infinity_base_superfish_list_item( $args, $output = true )
{
	// default values
	$defaults = array(
		'id' => null,
		'title' => null,
		'close_item' => true,
		'li_id' => null,
		'li_classes' => array(),
		'a_id' => null,
		'a_classes' => array(),
		'a_target' => null,
		'a_rel' => null,
		'a_href' => null,
		'a_before' => null,
		'a_after' => null,
		'a_open' => null,
		'a_close' => null
	);

	// parse and extract
	$r = wp_parse_args( $args, $defaults );
	extract( $r );

	// handle empty list id
	if ( empty( $li_id ) ) {
		$li_id = 'menu-item-' . $id;
	}

	// list attributes
	$attr_li[] = sprintf( 'id="%s"', esc_attr( $li_id ) );

	if ( count( $li_classes ) ) {
		$attr_li[] = sprintf( 'class="%s"', esc_attr( implode( ' ', $li_classes ) ) );
	}

	// anchor attributes
	$attr_anchor = array();

	if ( $a_id ) {
		$attr_anchor[] = sprintf( 'id="%s"', esc_attr( $a_id ) );
	}
	if ( count( $a_classes ) ) {
		$attr_anchor[] = sprintf( 'class="%s"', esc_attr( implode( ' ', $a_classes ) ) );
	}
	if ( $a_href ) {
		$attr_anchor[] = sprintf( 'href="%s"', esc_attr( $a_href ) );
	}
	if ( $a_title ) {
		$attr_anchor[] = sprintf( 'title="%s"', esc_attr( $a_title ) );
	}
	if ( $a_target ) {
		$attr_anchor[] = sprintf( 'target="%s"', esc_attr( $a_target ) );
	}
	if ( $a_rel ) {
		$attr_anchor[] = sprintf( 'rel="%s"', esc_attr( $a_rel ) );
	}

	// turn on output buffering if we are returning a string
	if ( !$output ) {
		ob_start();
	}

	// render the list item ?>
	<li <?php print implode( ' ', $attr_li ) ?>>
		<?php print $a_before ?>
		<a <?php print implode( ' ', $attr_anchor ) ?>>
			<?php print $a_open ?>
			<span><?php print esc_html( $title ) ?></span>
			<?php print $a_close ?>
		</a>
		<?php print $a_after ?>
	<?php if ( $close_item ): ?>
	</li>
	<?php endif; ?>

	<?php
	if ( !$output ) {
		return ob_get_clean();
	}
 }

/**
 * Render custom pagination links
 *
 * @package Infinity
 * @subpackage base
 * @todo write a paginator from scratch, this is mental
 */
function infinity_base_paginate()
{
   global $wp_query, $wp_rewrite;

   // is pagination feature enabled?
   if ( false == current_theme_supports( 'infinity-pagination' ) ) {
	   // not enabled, abort
	   return;
   }

   $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

   $pagination = array(
	   'base' => @add_query_arg('page','%#%'),
	   'format' => '',
	   'total' => $wp_query->max_num_pages,
	   'current' => $current,
	   'show_all' => false,
	   'end_size' => 3,
	   'mid_size' => 5,
	   'type' => 'list'
   );

   if ( $wp_rewrite->using_permalinks() ) {
	   $pagination['base'] =
		   user_trailingslashit(
			   trailingslashit(
				   remove_query_arg( 's', get_pagenum_link( 1 ) )
			   ) . 'page/%#%/', 'paged'
		   );
   }

   if ( !empty( $wp_query->query_vars['s'] ) ) {
	   $pagination['add_args'] = array(
		   's' => urlencode( get_query_var( 's' ) )
	   );
   }

   print paginate_links( $pagination );
}

/**
 * Add Breadcrumb functionality for WordPress SEO
 *
 * @package Infinity
 * @subpackage base
 * @todo move this to a feature extension, no direct plugin support
 */
function infinity_base_yoast_breadcrumbs()
{
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
	}
}
add_action( 'open_content', 'infinity_base_yoast_breadcrumbs' );

/**
 * Clean up image output and turn it into nice HTML5 Fig captions
 *
 * @package Infinity
 * @subpackage base
 */
function infinity_base_cleaner_caption( $output, $attr, $content )
{
	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() )
		return $output;

	//Set up the default arguments.
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	);

	// Merge the defaults with user input.
	$attr = shortcode_atts( $defaults, $attr );

	// If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags.
	if ( 1 > $attr['width'] || empty( $attr['caption'] ) ) {
		return $content;
	}

	// allow filtering of content since we are overriding caption template
	$content = apply_filters( 'infinity_base_cleaner_caption_content', $content );

	// Set up the attributes for the caption <div>.
	$attributes .= ' class="figure ' . esc_attr( $attr['align'] ) . '" style="width:'. esc_attr( $attr['width'] ) . 'px"';

	// Open the caption <div>
	$output = '<figure' . $attributes .'>';

	// Allow shortcodes for the content the caption was created for.
	$output .= do_shortcode( $content );

	// Append the caption text.
	$output .= '<figcaption class="wp-caption">' . $attr['caption'] . '</figcaption>';

	// Close the caption </div>
	$output .= '</figure>';

	// Return the formatted, clean caption.
	return $output;
}
add_filter( 'img_caption_shortcode', 'infinity_base_cleaner_caption', 10, 3 );


/**
 * Remove hard coded width/height attr from caption images
 *
 * @param string $content
 * @return string
 */
function infinity_base_cleaner_caption_content( $content )
{
	return preg_replace( '/\s+(width|height)="[^"]*"/', '', $content );
}
add_filter( 'infinity_base_cleaner_caption_content', 'infinity_base_cleaner_caption_content' );

/**
 * Clean the output of attributes of images in editor. Courtesy of SitePoint. http://www.sitepoint.com/wordpress-change-img-tag-html/
 *
 * @package Infinity
 * @subpackage base
 */
function infinity_base_get_image_tag_class( $class, $id, $align, $size )
{
	$align = 'align' . esc_attr( $align );
	return $align;
}
add_filter( 'get_image_tag_class', 'infinity_base_get_image_tag_class', 0, 4 );
