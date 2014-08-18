<?php
/**
 * The loop for displaying posts on the category
 *
 * @package Reactor
 * @subpackage loops
 * @since 1.0.0
 * jmeler
 */
?>

<?php

/*jmeler*/

$cat_id=get_query_var('cat');
$cat_meta = get_option( "category_$cat_id");

$aLayout=array();

$number_posts = reactor_option('frontpage_number_posts', 8);


if (!isset($cat_meta ['articles_fila']) || $cat_meta ['articles_fila']<1 || $cat_meta ['articles_fila']>4) {
	$num_articles=2;
} else {
	$num_articles=$cat_meta ['articles_fila'];
}	

for ($i=0;$i<=$number_posts;$i++){
	array_push($aLayout, $num_articles);
}

$aLayout=array_reverse($aLayout);

/*
if ($posts_fila1==33 || $posts_fila1==66)
	$posts_fila1=2; 

if ($posts_fila2==33 || $posts_fila2==66)
	$posts_fila2=2; 

$post_start= $posts_fila1 + $posts_fila2;
*/

?>

<?php // get the options

$post_category = reactor_option('frontpage_post_category', '');
if ( -1 == $post_category ) { $post_category = ''; } // fix customizer -1

?>
            
<?php reactor_loop_before(); ?>
<div id="graella" class="js-masonry">
		<div class=tarjeta style="width:1px"></div>
     <?php while ( have_posts() ) : the_post(); ?>
     
    	<?php $layout=array_pop($aLayout); ?>

        <?php reactor_post_before(); ?>

	<!-- jmeler flexible grid (by masonry) -->
	
		<?php // display frontpage post format
		get_template_part('post-formats/format', "resum-".$layout); ?>
	

        <?php reactor_post_after(); ?>

    <?php endwhile; // end of the loop ?>
</div>
<?php reactor_loop_after(); ?>

                    

