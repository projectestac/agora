<?php
/**
 * The loop for displaying posts on the category
 *
 * @package Reactor
 * @subpackage loops
 * @since 1.0.0
 */
?>

<?php

global $card_colors;
$card_colors=array("card_bgcolor1","card_bgcolor2","card_bgcolor3");
global $card_bgcolor;
global $layout;
global $aLayout;
global $posts_per_fila;
global $categoria;

$categoria=$cat_id=get_query_var('cat');
$cat_meta = get_option( "category_$cat_id");

if (!isset($cat_meta ['articles_fila']) || $cat_meta ['articles_fila']<1 || $cat_meta ['articles_fila']>4) {
	$posts_per_fila=2;
} else {
	$posts_per_fila=$cat_meta ['articles_fila'];
}	

$aLayout=array();

//Omplim el layout de la resta de files
$aLayout=array_fill(0, 10, $posts_per_fila);

$args = array( 
     'post_type'           => 'post',
     'posts_per_page'      => 20,
);

$query = new WP_Query( $args ); 
        
if ( $query->have_posts() ) : 
    $num_fila=1; // Fila inicial 
    $loop_posts=0; 
    $nova_fila=true;      
    reactor_loop_before();  
    $col=0;

    while ( $query->have_posts() ) : 	
        $col++;
        $pos_color=((($num_fila+1)%3)+$col)%3;
        
        $card_bgcolor=$card_colors[$pos_color];

        if ($nova_fila){
                echo "<div class='row fila".$num_fila."'>";
                $nova_fila=false;
        }
     
        $query->the_post();  
        $layout=array_pop($aLayout); 
        reactor_post_before();
        get_template_part('post-formats/format', "tac"); 
        reactor_post_after(); 
        $loop_posts++;

        $nova_fila=($loop_posts>=$posts_per_fila)?true:false;

        if ($nova_fila) {
           echo "</div>";
           $loop_posts=0;
           $num_fila++;
           $col=0;
        }	
        //echo "f:".$num_fila."-col:".$col;        
               
      endwhile; 
      //Si no hem acabat la fila, tanquem la graella
      
      if ($col!=0 and $col<$posts_per_fila)
           echo "</div>";
      

      reactor_loop_after(); 

    else : 
        reactor_loop_else(); 
    endif; 

 
    
?>
    
