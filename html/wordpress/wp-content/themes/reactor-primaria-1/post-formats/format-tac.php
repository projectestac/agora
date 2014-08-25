<?php
/**
 * The template for displaying post content
 *
 * @package Reactor
 * @subpackage Post-Formats
 * @since 1.0.0
 */
 global $tipus_targeta;
 global $layout;
 
 switch ($layout) {
 	case 1: 	$amplada="large-12"; 	break;
 	case 66: 	$amplada="large-8";		break;
 	case 2: 	$amplada="large-6";		break;
 	case 33:	$amplada="large-4";		break;
 	case 3:		$amplada="large-4";		break;
 	case 4:		$amplada="large-3";		break;
 	default:	$amplada="large-6";		 
 }
 
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class("$amplada $tipus_targeta"); ?>>
        <div class="entry-body">
    
        <?php if ( get_post_meta( get_the_ID(), '_amaga_titol', true )!="on") { ?>
			<header class="entry-header">
           	<?php reactor_post_header(); ?>
           </header><!-- .entry-header -->
 		<?php } ?> 
 		<?php if ( get_post_meta( get_the_ID(), '_bloc_html', true )!="on") { ?>  
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
        <?php } else { ?>
       		 <div class="entry-summary">
                <?php the_content(); ?>
            </div><!-- .entry-summary -->
        <?php } ?>   
        <?php if ( get_post_meta( get_the_ID(), '_amaga_metadata', true )!="on") { ?>
            <footer class="entry-footer">
            	<?php reactor_post_footer(); ?>
            </footer><!-- .entry-footer -->
        <?php } ?>  
                 
        </div><!-- .entry-body -->
	</article><!-- #post -->

