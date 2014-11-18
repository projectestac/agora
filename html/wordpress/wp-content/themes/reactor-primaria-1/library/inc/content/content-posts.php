<?php
/**
 * Post Content
 * hook in the content for post formats
 *
 * @package Reactor
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

/**
 * Construim l'article 
 */
 
add_action('reactor_post_header', 'reactor_do_standard_header_titles', 1);
add_action('reactor_post_header', 'reactor_do_meta_autor_date', 2);
add_action('reactor_post_header', 'reactor_do_standard_thumbnail', 3);
//add_action('reactor_post_footer', 'reactor_do_meta_autor_date', 1);
add_action('reactor_post_footer', 'reactor_do_post_footer_meta', 1);
//add_action('reactor_post_footer', 'reactor_do_post_footer_comments_link', 3);
//add_action('reactor_post_after', 'reactor_do_nav_single', 1);
add_action('reactor_post_after', 'reactor_do_post_comments', 1);



/**
 * Post Tumblog Icons
 * in all formats when tumblog icons are enabled
 * 
 * @since 1.0.0
 */
function reactor_do_tumblog_icons() {
    if ( reactor_option('tumblog_icons', false) && ( is_home() || is_archive() ) && current_theme_supports('reactor-tumblog-icons') ) {
            $output = reactor_tumblog_icon();
            echo $output;
    }
}
//add_action('reactor_post_header', 'reactor_do_tumblog_icons', 1);

/**
 * Post featured tag
 * in format-standard
 * 
 * @since 1.0.0
 */
/* 
function reactor_do_standard_format_sticky() { 
	if ( is_sticky() ) { ?>
		<div class="entry-featured">
			<span class="label secondary"><?php echo apply_filters('reactor_featured_post_title', __('Featured Post', 'reactor')); ?></span>
		</div>
<?php }
}

//jmeler No sticky label
//add_action('reactor_post_header', 'reactor_do_standard_format_sticky', 2);
*/

/**
 * Post header
 * in format-standard
 * 
 * @since 1.0.0
 */
 
function reactor_do_standard_header_titles() {
	
    if (!is_single() && get_post_meta(get_the_ID(), '_amaga_titol', true) == "on") {
        edit_post_link(__('Edit', 'reactor'), '<div class="edit-link"><span>', '</span></div>');
        return;
    }
   
    if (is_single()) { ?>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
<?php } else { ?>
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('%s', 'reactor'), the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php } 
    
    edit_post_link(__('Edit', 'reactor'), '<div class="edit-link"><span>', '</span></div>');
}

//add_action('reactor_post_header', 'reactor_do_standard_header_titles', 3);

function reactor_do_meta_autor_date() {
    if (is_single() || (get_post_meta( get_the_ID(), '_amaga_metadata', true )!="on")) {    
        echo '<span class="entry-author">'.get_the_author().'&nbsp;&nbsp;</span>';
        echo '<span class="entry-date">'.get_the_date('d/m/y' ).'&nbsp;&nbsp;</span>';
    }
}

//add_action('reactor_post_header', 'reactor_do_meta_autor_date', 4);

/**
 * Post thumbnail
 * in format-standard
 * 
 * @since 1.0.0
 */
function reactor_do_standard_thumbnail() { 
	
    if (get_post_meta( get_the_ID(), '_bloc_html', true )=="on")
            return;
    
    if ( has_post_thumbnail() && !is_single() ) { 
        $thumb_src=wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
        <div class="entry-thumbnail" style="background-image:url(<?php echo $thumb_src ?>)">
        </div>
    <?php }
}

//add_action('reactor_post_header', 'reactor_do_standard_thumbnail', 4);
            
/**
 * Post footer title 
 * in format-audio, format-gallery, format-image, format-video
 * 
 * @since 1.0.0
 */
/* 
function reactor_do_post_footer_title() {

    $format = ( get_post_format() ) ? get_post_format() : 'standard'; 

    switch ( $format ) { 
		case 'audio' : 
		case 'gallery' :
		case 'image' :
		case 'video' : ?>
        
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __('%s', 'reactor'), the_title_attribute('echo=0') ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h2>
               
		<?php break; 
	}
}
//add_action('reactor_post_footer', 'reactor_do_post_footer_title', 3);
*/

/**
 * Post footer meta
 * in all formats
 * 
 * @since 1.0.0
 */
function reactor_do_post_footer_meta() {
    
        if (!is_single() && get_post_meta( get_the_ID(), '_amaga_metadata', true )=="on") {   
		return;
	}
	
	$categories = get_the_category();
	$output = '<span class="entry-categories">';
	
	if($categories){
            foreach($categories as $category) {
                    $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.", ";
            }
            echo trim($output, ", ");
            echo "</span>";
            $string_tags=trim(get_the_tag_list("",", "),",");

            if (strlen($string_tags)) 
                    echo ' <span class="entry-tags">'.$string_tags.'</span>';

            echo ' <a href="'.get_comments_link().'"><span class="entry-comments">'.get_comments_number().'</span></a>';

	}
	
}

//add_action('reactor_post_footer', 'reactor_do_post_footer_meta', 2);

/**
 * Post footer comments link 
 * in all formats
 * 
 * @since 1.0.0
 */
function reactor_do_post_footer_comments_link() {
	
	if ( is_page_template('page-templates/front-page.php') ) {
		$comments_link = reactor_option('frontpage_comment_link', 1);
	}
	elseif ( is_page_template('page-templates/news-page.php') ) {
		$comments_link = reactor_option('newspage_comment_link', 1);
	} else {
		$comments_link = reactor_option('comment_link', 1);
	}
	
	if ( comments_open() && $comments_link ) { ?>
		<div class="comments-link">
			<i class="icon social foundicon-chat" title="Comments"></i>
			<?php comments_popup_link('<span class="leave-comment">' . __('Leave a Comment', 'reactor') . '</span>', __('1 Comment', 'reactor'), __('% Comments', 'reactor') ); ?>
		</div><!-- .comments-link -->
    <?php }
}
//add_action('reactor_post_footer', 'reactor_do_post_footer_comments_link', 3);

/**
 * Post footer edit 
 * in single.php
 * 
 * @since 1.0.0
 */
 /*
function reactor_do_post_edit() {
	//if ( is_single() ) {
		edit_post_link( __('Edit', 'reactor'), '<div class="edit-link"><span>', '</span></div>');
	//}
}
add_action('reactor_post_footer', 'reactor_do_post_edit', 4);
*/

/**
 * Single post nav 
 * in single.php
 * 
 * @since 1.0.0
 */
function reactor_do_nav_single() {
    if ( is_single() ) { 
    $exclude = ( reactor_option('frontpage_exclude_cat', 1) ) ? reactor_option('frontpage_post_category', '') : ''; ?>
        <nav class="nav-single">
            <span class="nav-previous alignleft">
            <?php previous_post_link('%link', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', 'reactor') . '</span> %title', false, $exclude); ?>
            </span>
            <span class="nav-next alignright">
            <?php next_post_link('%link', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link', 'reactor') . '</span>', false, $exclude); ?>
            </span>
        </nav><!-- .nav-single -->
<?php }
}

//add_action('reactor_post_after', 'reactor_do_nav_single', 1);

/**
 * Comments 
 * in single.php
 * 
 * @since 1.0.0
 */
function reactor_do_post_comments() {      
	// If comments are open or we have at least one comment, load up the comment template
	if ( is_single() && ( comments_open() || '0' != get_comments_number() ) ) {
		comments_template('', true);
	}
}
//add_action('reactor_post_after', 'reactor_do_post_comments', 2);

/**
 * No posts format
 * loop else in page templates
 * 
 * @since 1.0.0
 */
function reactor_do_loop_else() {
	get_template_part('post-formats/format', 'none');
}
add_action('reactor_loop_else', 'reactor_do_loop_else', 1);

?>