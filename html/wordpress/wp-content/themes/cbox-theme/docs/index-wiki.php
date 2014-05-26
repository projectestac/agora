<?php
/**
 * Customized BP Docs Wiki homepage template.
 *
 * Basically copies page.php and adds some code to display the wiki widget
 * sidebars.
 */

infinity_get_header();
?>
	<div id="content" role="main" class="<?php do_action( 'content_class' ); ?>">
		<?php
			do_action( 'open_content' );
			do_action( 'open_page' );
		?>

		<div class="wiki-home">
			<div class="wiki-home-sidebar" id="wiki-top">
				<?php dynamic_sidebar( 'wiki-top' ) ?>
			</div>

			<div id="wiki-bottom">
				<div class="wiki-home-sidebar" id="wiki-bottom-left">
					<?php dynamic_sidebar( 'wiki-bottom-left' ) ?>
				</div>

				<div class="wiki-home-sidebar" id="wiki-bottom-right">
					<?php dynamic_sidebar( 'wiki-bottom-right' ) ?>
				</div>
			</div>


			<?php bp_get_template_part( 'docs/docs-loop' ); ?>
		</div><!-- .wiki-home -->

		<?php
			do_action( 'close_page' );
			do_action( 'close_content' );
		?>
	</div>

<?php
get_sidebar( 'bpdw' );

// load infinity's footer
infinity_get_footer();