<?php
/**
 * Template Name: Archive Template
 *
 * A archive template that displays the latest posts.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package Infinity
 * @subpackage templates
 */
infinity_get_header(); ?>

	<div id="content" role="main" class="<?php do_action( 'content_class' ); ?>">

		<?php do_action( 'before_content' ) ?>	
		<?php do_action( 'before_page' ) ?>

		<div class="page-<?php the_ID(); ?>" <?php post_class(); ?>>	
		<?php
			if ( have_posts() ):
				while ( have_posts() ):
					the_post();
					do_action( 'open_loop' );
		?>
		<header>
		<h1 class="page-title">
			<?php
				the_title();
			?>
		</h1>
		</header>
		<!-- show page thumb -->
		<?php
		infinity_get_template_part( 'templates/parts/post-meta-top');	
		?>				
		<!-- the post -->
		<div class="post" id="post-<?php the_ID(); ?>">
			<?php
				do_action( 'open_loop_page' );
			?>
			<div class="entry">
				<?php
					the_content( __( '<p class="serif">Read the rest of this page &rarr;</p>', infinity_text_domain ) );
				?>	
				<?php
					infinity_get_search_form();
				?>	
			<div id="archives" class="grid_24">						
				<div id="archives-recent" class="grid_16 alpha">
								<h4><?php _e('Last 30 Posts', 'infinity_text_domain') ?></h4>
													
								<ul>
									<?php $archive_30 = get_posts('numberposts=10');
									foreach($archive_30 as $post) : ?>
										<li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
									<?php endforeach; ?>
								</ul>	
				</div>
				<div id="archives-month" class="grid_8 omega">				
								
								<h4><?php _e('Archives by Month:', 'infinity_text_domain') ?></h4>
								
								<ul>
									<?php wp_get_archives('type=monthly'); ?>
								</ul>
		
				</div>			
			</div>	
			<div id="archives-subject" class="grid_24">
				
							<h4><?php _e('Archives by Subject:', 'infinity_text_domain') ?></h4>
							
							<ul>
						 		<?php wp_list_categories( 'title_li=' ); ?>
							</ul>
							
			</div>
		</div>
			<?php
				do_action( 'close_loop_page' );
			?>
	</div>
<?php
		do_action( 'close_loop' );
		endwhile;
	endif;
?>
					
		</div><!-- .page -->

		<?php do_action( 'after_content' ) ?>	
		<?php do_action( 'after_page' ) ?>
		
	</div><!-- #content -->

<?php
infinity_get_sidebar();
infinity_get_footer();
?>

