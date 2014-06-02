<?php get_header(); ?>

<!-- Main Content -->
<div class="container" id="main-container">
	
	<div class="row">
		
	 	<?php get_exray_primary_sidebar(); ?>

		 <?php get_exray_content_html_opening(); ?>
		 
			<?php Exray::load_breadcrumb(); ?>
				
			<div class="content" role="main">
					
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>				
				<article <?php post_class('clearfix'); ?>  id="post-<?php the_ID(); ?>" role="article">
					
					<header>				
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php get_exray_entry_meta('full'); ?>
					</header>

					<div class="entry-content">	
				
						<?php the_content(); ?>
							
					</div>
													  
						<?php if(has_tag()) : ?>

							<footer class="entry-meta cb" id="tag-container" role="contentinfo">

			                    <ul class="tags">
			                        <li><span class="icon tags">,</span></li>
			                        <?php the_tags() ?> 

		                        </ul>

							</footer> 

						<?php else: ?>

							<hr class="content-separator">	

						<?php endif; ?>
						<!-- end meta (category & tag) -->	
						
						<!-- Pagination For Multipaged Post -->
						<?php get_exray_post_pagination(); ?>
									
					</article> 	
					<!-- End article -->
					<div class="article-author clearfix">
							
						<figure class="clearfix">
							<?php echo get_avatar(get_the_author_meta('email'), '64', get_the_author_meta('display_name')); ?> 
						</figure>
						
						<div class="author-detail clearfix">
							<h5>Posted by <?php the_author_posts_link(); ?></h5>
							 <?php the_author_meta('description'); ?>
						</div> 
				
					</div>
					<!-- End article-author -->

				<?php endwhile; else : ?>
				<!-- If no post found -->
				<article>
					<h1><?php _e('No post were found!', 'exray-framework'); ?></h1>
				</article>

				<?php endif ?>
				<!-- Pagination for older / newer post -->
				<?php get_exray_pagination(); ?>

				<!-- End nav-below -->	
					
					<div class="comment-area" id="comments">
						
						<?php comments_template('', true); ?>

					</div>
					<!-- End comment-area -->
			</div> 
			<!-- end content -->
		</div> 
		<!-- end span6 main -->

		<?php get_exray_secondary_sidebar(); ?> 

	</div>
	<!-- ENd Row -->
</div>
<!-- End main-cotainer -->

<?php get_footer();?>