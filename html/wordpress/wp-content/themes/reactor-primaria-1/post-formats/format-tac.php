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
<article id="post-<?php the_ID(); ?>" <?php post_class("$amplada targeta $card_bgcolor"); ?>>
<div class="entry-body">

<?php     
      if ( get_post_meta( get_the_ID(), '_amaga_titol', true )!="on") { 
       echo '<header class="entry-header">';
       reactor_post_header();
       echo "</header><!-- .entry-header -->";
      }
      if ( get_post_meta( get_the_ID(), '_bloc_html', true )!="on") {  
        echo '<div class="entry-summary">';
        the_excerpt(); 
        echo "</div><!-- .entry-summary -->";
     } else { 
        echo '<div class="entry-summary">';
        the_content();
        echo '</div><!-- .entry-summary -->';
    }    
    if ( get_post_meta( get_the_ID(), '_amaga_metadata', true )!="on") { 
        echo '<footer class="entry-footer">';
        reactor_post_footer(); 
        echo '</footer><!-- .entry-footer -->';
    } 
    
?>  

</div><!-- .entry-body -->
</article><!-- #post -->

