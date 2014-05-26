<?php
/**
 * Infinity Theme: footer template
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */
?>

		<?php
			do_action( 'close_main_wrap' );
		?>
		</div>
		<div class="footer-wrap row <?php do_action( 'footer_wrap_class' ); ?>">
		<?php
			do_action( 'open_footer_wrap' );
		?>
		<!-- begin footer -->
		<footer id="footer" role="contentinfo">
			<?php
				do_action( 'open_footer' );
				infinity_get_template_part( 'templates/parts/footer-widgets' );
			?>
			<div id="powered-by">
				<div id="footer-info" class="column ten">
				<?php
					// Load Footer Menu only if it's enabled
					if ( current_theme_supports( 'infinity-footer-menu-setup' ) ) :
						infinity_get_template_part( 'templates/parts/footer-menu', 'footer' );
					endif;
				?>
				</div>
				<div id="copyright-info" class="column six">	
					<?php echo infinity_option_get( 'infinity-core-options.footer-text' ); ?>
				</div>
			</div>
			<?php
				do_action( 'close_footer' );
			?>
		</footer>
		<?php
			do_action( 'close_footer_wrap' );
		?>
		</div><!-- close container -->
	</div>
<?php
	do_action( 'close_body' );
	wp_footer();
?>

</body>
</html>