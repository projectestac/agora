<?php
/**
 * The template for displaying post content
 *
 * @package Reactor
 * @subpackage Post-Formats
 * @since 1.0.0
 */
 
 global $layout;
 global $card_bgcolor;
 global $amplada;
 
 switch ($layout) {
 	case 1: 	$amplada="large-12";            break;
 	case 66: 	$amplada="large-8";		break;
 	case 2: 	$amplada="large-6";		break;
 	case 33:	$amplada="large-4";		break;
 	case 3:		$amplada="large-4";		break;
 	case 4:		$amplada="large-3";		break;
 	default:	$amplada="large-6";		 
 }
 
?>

<?php if ($amplada!="large-12") { ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class("$amplada targeta $card_bgcolor"); ?>>
		<div class="entry-body">
		<header class="entry-header">
			 <?php reactor_post_header(); ?>
		</header>
		<div class="entry-summary">
			  <?php (get_post_meta( get_the_ID(), '_bloc_html', true )!="on")? the_excerpt(): the_content(); ?>
		</div>
		<footer class="entry-footer">
			<?php  reactor_post_footer();?>
		</footer>
		</div><!-- .entry-body -->
	</article><!-- #post -->

<?php } else { // Targeta 1  ?> 
	
	<article id="post-<?php the_ID(); ?>" <?php post_class("$amplada targeta $card_bgcolor"); ?>>
		<div class="entry-body row">
                    <div class="entry-summary large-12 columns">
                          <?php reactor_do_standard_header_titles(); ?>
                          <?php reactor_do_meta_autor_date(); ?>
                              <?php (get_post_meta( get_the_ID(), '_bloc_html', true )!="on")? the_excerpt(): the_content(); ?>
                              <?php  add_action('reactor_post_after', 'reactor_do_post_comments', 2);?>
                              <footer class="entry-footer">
                                    <?php 
                                    add_action('reactor_post_footer', 'reactor_do_post_footer_meta', 1);
                                    reactor_post_footer(); 
                                    ?>
                            </footer>
                    </div>
		<header class="entry-header large-3 columns">
                    <?php reactor_do_standard_thumbnail(); ?>
		</header>		
		</div><!-- .entry-body -->
	</article><!-- #post -->	

<?php } ?>