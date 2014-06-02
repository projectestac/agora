<?php 

/*********************************************************************************/
/*	Template for Link Post format */
/*********************************************************************************/
?>

<article <?php post_class('clearfix') ?> id="post-<?php the_ID(); ?>" role="article">

	<header>

		<?php get_exray_entry_meta('full'); ?>
	</header>
	
	<div class="url-container">

		<p><?php the_title(); ?></p>
		<span><?php the_content(); ?></span>
		
	</div>

</article> 	
<!-- End article -->
<hr class="content-separator" />	