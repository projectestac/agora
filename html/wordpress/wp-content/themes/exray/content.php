<?php 

/*********************************************************************************/
/*	Template for Standard Post */
/*********************************************************************************/
global $exray_general_options;
?>

<article <?php post_class('clearfix') ?> id="post-<?php the_ID(); ?>" role="article">

	<header>

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<?php get_exray_entry_meta('full'); ?>
	
	</header>

	<?php if(has_post_thumbnail()) : ?>
	
	<aside class="post_image">
		<figure class="article-preview-image">

			<a href="<?php the_permalink(); ?>">
				<?php Exray::load_post_thumbnail();	?>
			</a>
		
		</figure>		
	</aside>
		
	<?php endif ?> 
	<!-- End post_image -->

<div class="entry-content">
	<!-- Show content in full post with readmore on in Exceprt based from theme options -->
	<?php if ($exray_general_options['content_options']  == 'default' ) : ?>
		<?php the_excerpt(); ?>
	<?php else: ?>
		<?php the_content("Readmore.."); ?>
	<?php endif;?>
</div>

</article> 	
<!-- End article -->
<hr class="content-separator" />	