<?php
/**
 * Infinity Theme: template tags
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage base
 * @since 1.0
 */

/**
 * Print a basic title
 *
 * @package Infinity
 * @subpackage base
 */

/**
 * Print the <title> tag based on what is being viewed.
 */
function infinity_base_title()
{
	global $page, $paged;
 
	wp_title( '|', true, 'right' );
 
	// Add the blog name.
	bloginfo( 'name' );
 
	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
 
	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', infinity_text_domain ), max( $paged, $page ) );
}

/**
 * Show author box (if on an author page)
 *
 * @package Infinity
 * @subpackage base
 */
function infinity_base_author_box()
{
	if ( is_author() ):
		// queue the first post, that way we know who the author is when we
		// try to get their name, URL, description, avatar, etc.
		if ( have_posts() ):
			the_post();

			// if a user has filled out their description, show a bio on their entries.
			if ( get_the_author_meta( 'description' ) ):
				infinity_get_template_part( 'templates/parts/author-box' );
			endif;

			// reset the loop so we don't break later queries
			rewind_posts();
		endif;
	endif;
}

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function infinity_posted_on()
{
	printf( __( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>', infinity_text_domain ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', infinity_text_domain ), get_the_author() ) ),
		get_the_author()
	);
}

//
// Custom Conditionals
//

/**
 * Returns true if not in admin dir
 *
 * @package Infinity
 * @subpackage conditionals
 * @return boolean
 */
function is_not_admin()
{
    return ( !is_admin() );
}
