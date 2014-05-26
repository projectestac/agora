<?php
/**
 * Infinity Theme: comments template
 *
 * comments template
 *
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */
 
 // Do not delete these lines
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) { die ( __( 'Please do not load this page directly. Thanks!', infinity_text_domain ) ); }

 // Password is required so don't display comments.
if ( post_password_required() ) { ?><p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', infinity_text_domain) ?></p><?php return; }

/**
 * Comment Output.
 *
 * This is where our comments display is generated.
 */
 
 $comments_by_type = &separate_comments( $comments );
 
 // You can start editing here -- including this comment!
 
?>
<div id="comments">
<?php
 
 if ( have_comments() ) {
 
 	if ( ! empty($comments_by_type['comment']) ) { ?>
 	<h3 id="comments-title"><?php printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), infinity_text_domain ), number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' ); ?></h3>
 	<ol class="commentlist">
		<?php
			/* Loop through and list the comments. Tell wp_list_comments()
			 * to use custom_comment() to format the comments.
			 * If you want to overload this in a child theme then you can
			 * define custom_comment() and that will be used instead.
			 * See custom_comment() in /includes/theme-comments.php for more.
			 */
			wp_list_comments( array( 'callback' => 'custom_comment', 'type' => 'comment', 'avatar_size' => 40 ) );
		?>
	</ol>
 	<?php
 	// Comment pagination.
 	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
	<div class="navigation">
		<div class="nav-previous fl"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', infinity_text_domain ) ); ?></div>
		<div class="nav-next fr"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', infinity_text_domain ) ); ?></div>
		<div class="fix"></div><!--/.fix-->
	</div><!-- .navigation -->
<?php } // End IF Statement

if ( ! empty($comments_by_type['pings']) ) { ?>
 	<h3 id="comments-title"><?php  _e('Trackbacks/Pingbacks', infinity_text_domain); ?></h3>
 	<ol class="commentlist">
		<?php
			/* Loop through and list the pings. Tell wp_list_comments()
			 * to use list_pings() to format the pings.
			 * If you want to overload this in a child theme then you can
			 * define list_pings() and that will be used instead.
			 * See list_pings() in /includes/theme-comments.php for more.
			 */
			wp_list_comments( array( 'callback' => 'list_pings', 'type' => 'pings' ) );
		?>
	</ol>
<?php }

	} // End have_comments() IF Statement
 
 } else {

 
 } // End IF Statement
 
?>
</div><!--/#comments-->

<?php
	//This is where the comment form is generated.
	comment_form();
?>