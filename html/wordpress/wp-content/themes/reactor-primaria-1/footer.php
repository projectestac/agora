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

<?php if (!wp_is_mobile()){ ?>

<script type="text/javascript">
    //http://www.feedthebot.com/pagespeed/defer-loading-javascript.html
    function downloadJSAtOnload() {
        var element = document.createElement("script");
        element.src = "<?php echo get_stylesheet_directory_uri().'/'?>equalize-cards.js";
        document.body.appendChild(element);
    }
    
    if (window.addEventListener)
    window.addEventListener("load", downloadJSAtOnload, false);
    else if (window.attachEvent)
    window.attachEvent("onload", downloadJSAtOnload);
    else window.onload = downloadJSAtOnload;

</script>

<?php } ?>

</body>
</html>
