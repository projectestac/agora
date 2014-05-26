<?php
/**
 * Infinity Theme: comments formatting
 *
 * @todo clean this up
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @package Infinity
 * @subpackage base
 * @since 1.0
 */

// Fist full of comments
if ( !function_exists( 'custom_comment' ) ) {
	/**
	 * Render a custom comment
	 *
	 * @package Infinity
	 * @subpackage misc
	 * @param string $comment
	 * @param array $args
	 * @param integer $depth
	 */
	function custom_comment( $comment, $args, $depth )
	{
		$GLOBALS['comment'] = $comment;

		// print the comment ?>
		<li <?php comment_class(); ?>>
			<a name="comment-<?php comment_ID() ?>"></a>
			<div id="li-comment-<?php comment_ID() ?>" class="comment-container">
				<?php if( get_comment_type() == "comment" ): ?>
					<div class="avatar"><?php echo get_avatar( $comment, 35 ); ?></div>
				<?php endif; ?>
				<div class="comment-head">
					<span class="name"><?php the_commenter_link() ?></span>
					<span class="date"><?php echo get_comment_date(get_option( 'date_format' )) ?> <?php _e('at', infinity_text_domain); ?> <?php echo get_comment_time(get_option( 'time_format' )); ?></span>
					<span class="perma"><a href="<?php echo get_comment_link(); ?>" title="<?php _e('Direct link to this comment', infinity_text_domain); ?>">#</a></span>
					<span class="edit"><?php edit_comment_link(__('Edit', infinity_text_domain), '', ''); ?></span>
				</div><!-- /.comment-head -->
				<div class="comment-entry"  id="comment-<?php comment_ID(); ?>">
					<?php comment_text() ?>
					<?php if ($comment->comment_approved == '0'): ?>
						<p class='unapproved'><?php _e('Your comment is awaiting moderation.', infinity_text_domain); ?></p>
					<?php endif; ?>
					<div class="reply">
						<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</div><!-- /.reply -->
				</div><!-- /comment-entry -->
			</div><!-- /.comment-container -->
	<?php
	}
}

// PINGBACK / TRACKBACK OUTPUT
if ( !function_exists( 'list_pings' ) ) {
	/**
	 * @package Infinity
	 * @subpackage misc
	 * @param type $comment
	 * @param type $args
	 * @param type $depth
	 */
	function list_pings($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;

		// print the ping ?>
		<li id="comment-<?php comment_ID(); ?>">
			<span class="author"><?php comment_author_link(); ?></span> -
			<span class="date"><?php echo get_comment_date(get_option( 'date_format' )) ?></span>
			<span class="pingcontent"><?php comment_text() ?></span>
	<?php
	}
}
		
if ( !function_exists( 'the_commenter_link' ) ) {
	/**
	 * @package Infinity
	 * @subpackage misc
	 */
	function the_commenter_link()
	{
		$commenter = get_comment_author_link();
		
		if ( ereg( ']* class=[^>]+>', $commenter ) ) {
			$commenter = ereg_replace( '(]* class=[\'"]?)', '\\1url ' , $commenter );
		} else {
			$commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
		}

		print $commenter ;
	}
}
