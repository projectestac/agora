<?php 

/*********************************************************************************/
/*	Template for Aside Post format */
/*********************************************************************************/

?>

<article <?php post_class('clearfix') ?> id="post-<?php the_ID(); ?>" role="article">

	<header>

		<?php get_exray_entry_meta('full'); ?>

	</header>
	
	<div class="aside-container">

		<?php the_content(); ?>
		
	</div>

</article> 	
<!-- End article -->
<hr class="content-separator" />	