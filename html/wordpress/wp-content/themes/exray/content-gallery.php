<?php 

/*********************************************************************************/
/*	Template for Gallery Post format */
/*********************************************************************************/
?>

<article <?php post_class('clearfix') ?> id="post-<?php the_ID(); ?>" role="article">

	<header>
		
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<?php get_exray_entry_meta('full'); ?>
	</header>
	
	<?php
	//Generate Post Thumbnail from Gallery post format.
		$gallery_atts = array(
			'post_parent' => $post->ID,
			'post_mime_type' => 'image'
		);

		$gallery_images = get_children($gallery_atts);
		
		if(!empty($gallery_images)){
			$gallery_count = count($gallery_images);
			$first_image = array_shift($gallery_images);
			$display_first_image = wp_get_attachment_image($first_image->ID);
	?>

		<aside class="post_image">
			<figure class="article-preview-image">

				<a href="<?php the_permalink(); ?>"><?php echo $display_first_image; ?></a>

			</figure>		
		</aside>

		<p><strong>
			<?php printf(_n('This gallery contains %s photo.', 'This gallery contains %s photos.', 
				$gallery_count, 'exray-framework'), $gallery_count); ?>
		</strong></p>

	<?php }

	?>

</article> 	
<!-- End article -->
<hr class="content-separator" />	