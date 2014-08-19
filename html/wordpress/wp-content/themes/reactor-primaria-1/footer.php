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

<!--jmeler mateixa alçada -->
<script>

jQuery(document).ready(function() {
  jQuery(window).load(function() {
    targetes_fila1 = jQuery('.fila1 > .tarjeta-fixe > .entry-body');
    maxHeight = Math.max.apply(
    Math, targetes_fila1.map(function() {
      return jQuery(this).height();
    }).get());
    targetes_fila1.height(maxHeight);
  });
  
  jQuery(window).load(function() {
    targetes_fila2 = jQuery('.fila2 > .tarjeta-fixe > .entry-body');
    maxHeight = Math.max.apply(
    Math, targetes_fila2.map(function() {
      return jQuery(this).height();
    }).get());
    targetes_fila2.height(maxHeight);
  });
  
});

</script>

<script src="wp-content/themes/reactor-primaria-1/masonry.pkgd.min.js"></script>
<script>
var container = document.querySelector('#graella');
var msnry = new Masonry( container, {
  // options
  columnWidth: 60,
  itemSelector: '.tarjeta',
});
</script>

</body>
</html>
