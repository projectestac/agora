<?php get_header(); ?>

<!-- Main Content -->
<div class="container" id="main-container">
	
	<div class="row">

        <?php get_exray_primary_sidebar(); ?>

        <?php get_exray_content_html_opening(); ?>
			
			<?php Exray::load_breadcrumb(); ?>

			<div class="content" role="main">
				<?php if(have_posts()) : ?>

						<div class="top-content">
							
							<h5><?php single_cat_title( __('More from: ', 'exray-framework'), true ); ?></h5>
							<hr class="content-separator">
						</div> 

					<?php while(have_posts()) : the_post(); ?>			
						<!-- The Loop of Post -->
						<?php get_template_part('content', get_post_format()); ?>
						
						<!-- If post format content, show post format content items -->
						
					<?php endwhile; else :  ?>
						<!-- If no Post Found -->
						<h1><?php _e("No post were Found", "exray-framework") ?></h1>

					<?php endif; ?>
				<!-- Pagination for older/newer post -->
				<?php get_exray_pagination(); ?>	
				<!-- End nav-below -->	
			</div> 
			<!-- end content -->
		</div> 
		<!-- end span6 main -->	
			
		<div id="primary" class="widget-area span3 main-sidebar" role="complementary">

			<?php get_sidebar('sidebar'); ?>

		</div>  
		<!-- end span3 primary left-sidebar -->	

        <?php get_exray_secondary_sidebar(); ?>  
        
	</div> 
	<!--End row -->
	
</div>	
<!-- End Container  -->
<!-- End Main Content -->

<?php get_footer(); ?>