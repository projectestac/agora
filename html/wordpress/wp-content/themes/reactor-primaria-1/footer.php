<?php
/**
 * The template for displaying the footer
 *
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */
?>
       
        <?php reactor_footer_before(); ?>
        
        <footer id="footer" class="site-footer" role="contentinfo">
        
        	<?php reactor_footer_inside(); ?>
  
        </footer><!-- #footer -->
        
        <?php reactor_footer_after(); ?>

    </div><!-- #main -->
</div><!-- #page -->

<?php wp_footer(); reactor_foot(); ?>

<!-- Include the plug-in -->

<?php 

//From loop-frontpage

if ( is_front_page() ){
	global $number_posts;
	global $posts_per_fila1;
	global $posts_per_fila2;
	global $posts_per_filan;
	$num_rows_n = round( ($number_posts - ($posts_per_fila1 + $posts_per_fila2)) / $posts_per_filan, 0, PHP_ROUND_HALF_UP ) ;
	$num_rows=$num_rows_n+2;
}

if ( is_category() or is_tag() ){
	global $posts_per_fila;
	$num_rows=round( 10/$posts_per_fila, 0, PHP_ROUND_HALF_UP);
}


?>

<script>

jQuery(document).ready(function() {
	
	//Targeta mes alta determina l'alcada de la fila		
	for (i=0;i<=<?php echo $num_rows; ?>;i++){
	 	targetes_fila = jQuery('.fila'+i.toString()+'> .targeta > .entry-body');
    	maxHeight = Math.max.apply(
    	Math, targetes_fila.map(function() {
      	return jQuery(this).height();
    	}).get());
    	targetes_fila.height(maxHeight);
	}
	
	//Perque quedin alineats, coloquem el footer partint de la base de la targeta, no del contingut	
 	targetes = jQuery('.targeta > .entry-body >.entry-footer');
	targetes.css('position', 'absolute');
	targetes.css('bottom', '1em');
  	 
});

</script>

</body>
</html>
