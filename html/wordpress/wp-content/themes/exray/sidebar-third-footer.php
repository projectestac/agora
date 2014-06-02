<?php 
	if(is_active_sidebar('third-footer') ) : ?>
	
	<?php dynamic_sidebar( 'third-footer' );  else: ?>

	<div class="span3">
		<aside class="footer-widget" role="complementary">
			<?php the_widget('WP_Widget_Recent_Posts', '', array('before_title' => '<h4>', 'after_title' => '</h4>') ); ?>  
		</aside>
	</div>

<?php endif ?>	