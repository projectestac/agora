<?php

/***************************************************************/
/* Prevent direct loading of this file for security */
/***************************************************************/

if(!empty($_SERVER['SCRIPT-FILENAME']) && basename($_SERVER['SCRIPT-FILENAME']) == 'comments.php' ){
	die(__('You can not access this file directly', 'exray-framework')); 
} 

/***************************************************************/
/* Check if Post Password protected or Not*/
/***************************************************************/

if(post_password_required()) : ?>
	<p>
		<?php _e('This post is Password protected, enter Password to view the Comments', 'exray-framework'); ?>
		<?php return; ?>
	</p>
<?php endif;

if(have_comments()): ?>

<!-- Show comment -->

	<h3>
		<?php comments_number( __('No comments to this article', 'exray-framework'), 
		__('One comment to this article', 'exray-framework'), __('% comments to this article', 'exray-framework') ) ?>
	</h3>

	<ol class="commentslist">
		<?php wp_list_comments('callback=exray_comments'); ?>
	</ol>

	<?php if(get_comment_pages_count() > 1 && get_option('page_comments')) : ?>

		<div class="comments-nav-section clearfix">
										
			<p class="fl"><?php previous_comments_link( __('&larr; Older Comments', 'exray-framework')); ?></p>
			<p class="fr"><?php next_comments_link(__('Newer Comments &rarr;', 'exray-framework' )); ?></p>

		</div>

	<?php endif; ?>

<?php elseif(!comments_open() && !is_page() && post_type_supports( get_post_type(), 'comments' )) : ?>
	
	<p><?php _e('Comments are closed','exray-framework'); ?></p>

<?php endif;

 comment_form();
?>