<?php
/**
 * Footer Content
 * hook in the content for footer.php
 *
 * @package Reactor
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

/**
 * Breadcrumbs
 * in footer.php
 * 
 * @since 1.0.0
 */
if ( current_theme_supports('reactor-breadcrumbs') ) { 
	function reactor_do_breadcrumbs() { 
		if ( reactor_option('breadcrumbs', 1) ) { ?>
			<div id="breadcrumbs">
				<div class="row">
					<div class="<?php reactor_columns( 12 ); ?>">
						<?php reactor_breadcrumbs(); ?>
					</div><!-- .columns -->
				</div><!-- .row -->
			</div><!-- #breadcrumbs -->
	<?php }
	}
	//add_action('reactor_footer_before', 'reactor_do_breadcrumbs', 1);
}

/**
 * Footer widgets
 * in footer.php
 * 
 * @since 1.0.0
 */
function reactor_do_footer_widgets() { ?>
	<div class="row">
		<div class="<?php reactor_columns( 12 ); ?>">
			<div class="inner-footer">
				<?php get_sidebar('footer'); ?>       
				</div><!-- .inner-footer -->
			</div><!-- .columns -->
	</div><!-- .row -->
<?php 
}
add_action('reactor_footer_inside', 'reactor_do_footer_widgets', 1);

/**
 * Footer links and site info
 * in footer.php
 * 
 * @since 1.0.0
 */
function reactor_do_footer_content() { ?>
	<div class="site-info">
		<div class="row">
        
			<div class="<?php reactor_columns( 6 ); ?>">
			<?php if ( function_exists('reactor_footer_links') ) : ?>
				<nav class="footer-links" role="navigation">
					<?php reactor_footer_links(); ?>
				</nav><!-- #footer-links -->
			<?php endif; ?>
			</div><!--.columns -->
                    
			<div class="<?php reactor_columns( 6 ); ?>">
				<div id="colophon">

				                                                
				  <p> <a target="_blank" href="http://www.xtec.cat/web/guest/avis">Avís legal</a> |                                 

				<span class="copyright">&copy;<?php echo date_i18n('Y'); ?>  Generalitat de Catalunya | </span>
				<span class="site-source">Fet amb <a href=http://wordpress.org/>WordPress</a></span></p>
					
				</div><!-- #colophon -->
			</div><!-- .columns -->
            
		</div><!-- .row -->
	</div><!-- #site-info -->
<?php 
}
add_action('reactor_footer_inside', 'reactor_do_footer_content', 2);
?>
