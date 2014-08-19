<?php
/**
 * The loop for displaying posts on the front page template
 *
 * @package Reactor
 * @subpackage loops
 * @since 1.0.0
 */
?>

<?php

/*jmeler*/

$posts_fila1 = reactor_option('frontpage_post_columns_fila_1', 2);

if ($posts_fila1==33 || $posts_fila1==66)
	$posts_fila1=2; 

$post_start=$posts_fila1;

$posts_fila2 = reactor_option('frontpage_post_columns_fila_2', 2);

$aLayout=array();

switch ($posts_fila2) {
        case 1: array_push($aLayout,1);
         break;
        case 2: array_push($aLayout,2,2);
         break;
        case 3: array_push($aLayout,3,3,3);
         break;
        case 4: array_push($aLayout,4,4,4,4);
         break;
        case 33: array_push($aLayout,3,66);
         break;
        case 66: array_push($aLayout,66,3);
         break;
}

$aLayout=array_reverse($aLayout);

if ($posts_fila2==33 || $posts_fila2==66)
	$posts_fila2=2; 
?>

<?php // get the options
$post_category = reactor_option('frontpage_post_category', '');
if ( -1 == $post_category ) { $post_category = ''; } // fix customizer -1

$post_columns = reactor_option('frontpage_post_columns', 3);
$page_links = reactor_option('frontpage_page_links', 0); 

?>


		<?php // start the loop
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		global $frontpage_query;
         
        ?>
                         
		    <?php if ( $frontpage_query->have_posts() ) : ?>
                    
                    	<?php reactor_loop_before(); ?>
                            
                            <?php 
                            $i=1;
                            while ( $frontpage_query->have_posts() ) : $frontpage_query->the_post(); global $more; $more = 0; ?>
								
								<?php 
								if ($i>$post_start) {
                            		$layout=array_pop($aLayout); ?>
                            	<?php reactor_post_before(); ?>

                                <?php // display frontpage post format
									get_template_part('post-formats/format', "resum-fixe-".$layout); 
								}
                            	$i++;
								?>
								<?php reactor_post_after(); ?>

                            <?php endwhile; // end of the loop ?>

                    <?php reactor_loop_after(); ?>
		   <?php echo "<div style='clear:both'></div>"; ?>

                    <?php // if no posts are found
			else : reactor_loop_else(); ?>

                    <?php endif; // end have_posts() check ?>



