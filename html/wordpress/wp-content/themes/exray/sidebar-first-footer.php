<?php 
	if(is_active_sidebar('first-footer') ) : ?>

	<?php dynamic_sidebar( 'first-footer' );  else: ?>
	
	<div class="span3">
		<aside class="footer-widget" role="complementary">
			<?php the_widget( 'WP_Widget_Tag_Cloud', '', array('before_title' => '<h4>', 'after_title' => '</h4>')); ?> 
		</aside>
	</div>

<?php endif ?>	