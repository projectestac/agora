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
global $card_bgcolor;
global $layout;
global $posts_per_fila1;
global $posts_per_fila2;
global $posts_per_filan;

$card_colors=array("card_bgcolor1","card_bgcolor2","card_bgcolor3");
$rows=array(1=>$posts_per_fila1,2=>$posts_per_fila2,3=>$posts_per_filan);
$aLayout=array( 1=>array(),2=>array(),3=>array());

foreach ($rows as $row=>$posts_per_fila ) {			 	
    switch ($posts_per_fila) {
        case 1: array_push($aLayout[$row],1);
         break;
        case 2: array_push($aLayout[$row],2,2);
         break;
        case 3: array_push($aLayout[$row],3,3,3);
         break;
        case 4: array_push($aLayout[$row],4,4,4,4);
         break;
        case 33: array_push($aLayout[$row],3,66);
         break;
        case 66: array_push($aLayout[$row],66,3);
         break;
        default: array_push($aLayout[$row],2,2);
    }
}

$row=1;
while (have_posts()):
    echo '<div class="row">';
    $fila=($row>3)?3:$row;
    foreach ($aLayout[$fila] as $idcard=>$layout_fila){
            $pos_color=((($row+1)%3)+$idcard)%3;
            $card_bgcolor=$card_colors[$pos_color];
            $layout=$layout_fila;
            the_post(); 
            //check if really there are a post
            if (get_the_ID()){
                reactor_post_before();
                get_template_part('post-formats/format', "tac");
                reactor_post_after();
            } else{
                break;
            }
    }
    $row++;
    echo "</div>";  	
endwhile;  	
