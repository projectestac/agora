<?php
/**
 * Infinity Theme: 404 template
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */

	infinity_get_header();
?>
	<div id="content" role="main" class="<?php do_action( 'content_class' ); ?>">
		<?php
			do_action( 'open_404' );
		?>
		<article id="post-0" class="post error404 not-found">
			<header>
			<h1 class="entry-title">
				<?php _e( 'Darn it.. Nothing found', infinity_text_domain ); ?>
			</h1>
			</header>
			<div class="entry-content">
				<p>
						<?php
							_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', infinity_text_domain );
						?>
					</p>
					<?php
						infinity_get_search_form();
					?>
					
					<div id="search-recent-posts" class="eight columns">

					<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>	
					
					</div>		
					
					<div id="search-categories-widget" class="eight columns">

						<h2 class="widgettitle">
						<?php _e( 'Most Used Categories', infinity_text_domain ); ?>
						</h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>	
					<div style="clear: both;"></div>
					<?php
					/* translators: %1$s: smilie */
					$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', infinity_text_domain ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', array('count' => 0 , 'dropdown' => 1 ), array( 'after_title' => '</h2>'.$archive_content ) );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
			</div>
		</article>
		<?php
			do_action( 'close_404' );
		?>
	</div>
	<?php
		infinity_get_sidebar();
	?>
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>
<?php
	infinity_get_footer();
?>
