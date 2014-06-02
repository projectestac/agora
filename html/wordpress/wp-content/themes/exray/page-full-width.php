<?php
/*
    Template Name: Full Width Page
*/
?>
<?php get_header(); ?>

	<!-- Main Content -->
		<div class="container" id="main-container">
			
			<div class="row">
			
				<div class="span12 article-container-adaptive">

					<?php Exray::load_breadcrumb(); ?>

					<div class="content" role="main">
							
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>				
						<article class="post clearfix" id="post-1" role="article">
							
							<header>
								
								<h1 class="entry-title"><?php the_title(); ?></h1>
								<?php get_exray_entry_meta('half'); ?>

							</header>

							<div class="entry-content">	
								<!-- Experimental -->
								<?php if(has_post_thumbnail()) : ?>

									<aside class="post_image">
										<figure class="article-preview-image">

											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

										</figure>		
									</aside>

								<?php else: ?>
									<!-- <hr class="content-separator"> -->
								<?php endif ?> 
								<!-- End post_image Experimental -->

								<?php the_content(); ?>
							</div>
							
							<!-- Pagination For Multipaged Post -->							  	
							<?php get_exray_post_pagination(); ?>
											
							</article> 	
							<!-- End article -->
							
						<?php endwhile; else : ?>
						<!-- If no post found -->
						<article>
							<h1><?php _e('No post were found!', 'exray-framework'); ?></h1>
						</article>

						<?php endif ?>

							<!-- End article-author -->
							<div class="comment-area" id="comments">
								
								<?php comments_template('', true); ?>

							</div>
							<!-- End comment-area -->
					</div> 
					<!-- end content -->
				</div> 
				<!-- end span12 primary -->

			</div>
			<!-- ENd Row -->
		</div>
		<!-- End main-cotainer -->
<?php get_footer();?>