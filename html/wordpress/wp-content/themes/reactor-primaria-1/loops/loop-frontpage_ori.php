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

$f1=$_GET["f1"];
$f2=$_GET["f2"];
$base=$_GET["base"];

$aLayout=array();

foreach ( array($f1,$f2) as $fila ) {

        switch ($fila) {
                case 1: array_push($aLayout,1);
                 break;
                case 2: array_push($aLayout,2,2);
                 break;
                case 3: array_push($aLayout,3,3,3);
                 break;
                case 5: array_push($aLayout,5);
                 break;
                case 33: array_push($aLayout,3,66);
                 break;
                case 66: array_push($aLayout,66,3);
                 break;
        }
}

for ($i=0;$i<=8;$i++){
        array_push($aLayout,$base);
}

$aLayout=array_reverse($aLayout);

?>




<?php // get the options
$post_category = reactor_option('frontpage_post_category', '');
if ( -1 == $post_category ) { $post_category = ''; } // fix customizer -1
$number_posts = reactor_option('frontpage_number_posts', 3);
$post_columns = reactor_option('frontpage_post_columns', 3);
$page_links = reactor_option('frontpage_page_links', 0); ?>

					<?php // start the loop
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                    $args = array( 
						'post_type'           => 'post',
						'cat'                 => $post_category,
						'posts_per_page'      => $number_posts,
						'ignore_sticky_posts' => 1,
						'paged'               => $paged );
					
					global $frontpage_query;
                    $frontpage_query = new WP_Query( $args ); ?>
                          
		    <?php if ( $frontpage_query->have_posts() ) : ?>
                    
                    	<?php reactor_loop_before(); ?>
                    
                            <?php while ( $frontpage_query->have_posts() ) : $frontpage_query->the_post(); global $more; $more = 0; ?>
                            	<?php $layout=array_pop($aLayout); ?>

  		                <?php reactor_post_before(); ?>
                                                                    
                                <?php // display frontpage post format
					get_template_part('post-formats/format', "resum-".$layout); ?>
                                    
                                <?php reactor_post_after(); ?>

                            <?php endwhile; // end of the loop ?>
                            
                        
                    <?php reactor_loop_after(); ?>    
                            
                    <?php // if no posts are found
			else : reactor_loop_else(); ?>

                    <?php endif; // end have_posts() check ?>


