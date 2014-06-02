<?php 
/***************************************************************/
/* Register Sidebars*/
/***************************************************************/
add_action('widgets_init', 'exray_widget_init');
function exray_widget_init(){
	register_sidebar(
		array(
			'name' => __( 'Header widget', 'exray-framework' ),
			'id' => 'header-widget',
			'description' => __('The header widget area', 'exray-framework'),
			'before_widget' => '<aside id="header-widget" class="right-header-widget fr top-widget" role="complementary">',
			'after_widget' => '</aside> <!--end header-widget-->',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name' => __( 'Below Header', 'exray-framework' ),
			'id' => 'below-header',
			'description' => __('Below header widget area', 'exray-framework'),
			'before_widget' => '<aside class="widget-below-header">',
			'after_widget' => '</aside> <!--end header-widget-->',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name' => __( 'Primary', 'exray-framework' ),
			'id' => 'primary',
			'description' => __('The left sidebar area', 'exray-framework'),
			'before_widget' => '<aside class="sidebar-widget clearfix">',
			'after_widget' => '</aside> <!--end sidebar-widget-->',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name' => __( 'Primary', 'exray-framework' ),
			'id' => 'primary',
			'description' => __('The left sidebar area', 'exray-framework'),
			'before_widget' => '<aside class="sidebar-widget clearfix">',
			'after_widget' => '</aside> <!--end sidebar-widget-->',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(array(
			'name' => __( 'Secondary', 'exray-framework' ),
			'id' => 'secondary',
			'description' => __('The right sidebar area', 'exray-framework'),
			'before_widget' => '<aside class="sidebar-widget">',
			'after_widget' => '</aside> <!--end sidebar-widget-->',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
	));

	register_sidebar(array(
			'name' => __('First Footer','exray-framework'),
			'id' => 'first-footer',
			'description' => __('The first footer from left','exray-framework'),
			'before_widget' => '<div class="span3"> <aside class="footer-widget" role="complementary">',
			'after_widget' => '</aside> </div> <!-- End span 3 Footer -->',
			'before_title' => '<h4 class="widget-title" role="heading">',
			'after_title' => '</h4>',

	));

	register_sidebar(array(
			'name' => __('Second Footer','exray-framework'),
			'id' => 'second-footer',
			'description' => __('The second footer from left','exray-framework'),
			'before_widget' => '<div class="span3"> <aside class="footer-widget" role="complementary">',
			'after_widget' => '</aside> </div> <!-- End span 3 Footer -->',
			'before_title' => '<h4 class="widget-title" role="heading">',
			'after_title' => '</h4>',

	));

	register_sidebar(array(
			'name' => __('Third Footer','exray-framework'),
			'id' => 'third-footer',
			'description' => __('The third footer from left','exray-framework'),
			'before_widget' => '<div class="span3"> <aside class="footer-widget" role="complementary">',
			'after_widget' => '</aside> </div> <!-- End span 3 Footer -->',
			'before_title' => '<h4 class="widget-title" role="heading">',
			'after_title' => '</h4>',

	));

	register_sidebar(array(
			'name' => __('Fourth Footer','exray-framework'),
			'id' => 'fourth-footer',
			'description' => __('The fourth footer from left','exray-framework'),
			'before_widget' => '<div class="span3"> <aside class="footer-widget" role="complementary">',
			'after_widget' => '</aside> </div> <!-- End span 3 Footer -->',
			'before_title' => '<h4 class="widget-title" role="heading">',
			'after_title' => '</h4>',

	));
}

/***************************************************************/
/* Display Comments*/
/***************************************************************/

function exray_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;

	if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback' ) : ?>
	
			<li class="pingback" id="<?php comment_ID(); ?>">
				<article <?php comment_class('clearfix'); ?>>
					<header>
						 <h5><?php _e('Pingback:', 'exray-framework'); ?></h5>
						<p><?php edit_comment_link(); ?></p>
					</header>
					<p><?php comment_author_link(); ?></p>
				</article>
			</li>
			
    <?php endif; ?>

	<?php if (get_comment_type() == 'comment') : ?>

		<li id="comment-<?php comment_ID(); ?>">

			<article <?php comment_class('comment-content clearfix'); ?>>

				<header>
					<h5><?php comment_author_link(); ?></h5>
					<p>
						<span>on <?php comment_date();?> at <?php comment_time(); ?> - </span>
						<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
						<?php if( current_user_can('edit_comment') ) { 
							echo '- '; edit_comment_link(__('Edit comment', 'exray-framework'), '', ''); 
						} ?>
					</p>

				</header>
				
				<figure class="comment-avatar">
					<?php 
					// Make Avatar size on Threaded comment children smaller than it's parent.
					$avatar_size= 64; 
					if($comment->comment_parent != 0){
						$avatar_size = 50;
					}

					echo get_avatar($comment, $avatar_size);

					?>
				</figure>
				
				<?php if($comment->comment_approved == '0'): ?>

					<p class="awaiting-moderation"><?php _e('Your comment is awaiting moderation','exray-framework'); ?></p>

				<?php endif; ?>

				<?php comment_text(); ?>
			
			</article>

	<?php endif; 

}

/***************************************************************/
/* Custom comment Form */
/***************************************************************/

function exray_custom_comment_form($defaults){
	
	$defaults['comment_notes_before'] = ''; 
	$defaults['comment_notes_after'] = '';
    $defaults['id_form'] = 'comment_form';
    $defaults['comment_field'] = '<p><textarea name="comment" id="comment" cols="30" rows="10"> </textarea></p> ';
  	

	return $defaults;
}

add_filter('comment_form_defaults', 'exray_custom_comment_form');

/***************************************************************/
/* Post/page Entry meta */
/***************************************************************/
function get_exray_entry_meta($length){ 
	global $post, $posts;
?>
	<?php if ($length == 'full') :?>

	<div class="entry-meta">	
		<p class="article-meta-extra">
			<span class="icon left-meta-icon">P</span>
			<a href="<?php the_permalink(); ?>" title="<?php echo get_the_time(); ?>" rel="bookmark">
				<time datetime="<?php echo get_the_date('c'); ?>" pubdate><?php echo get_the_date() ?></time>
			</a>  , <?php _e("by", "exray-framework") ?>
			<?php the_author_posts_link(); ?>	

			<ul class="categories">
				<li><span class="icon categories">K</span></li>
				<?php the_category(',&nbsp;'); ?>	                    
			</ul>

			<?php 

			global $post, $posts;		 
			// Display the comment link if comment are allowed and Post not password protected
			if (comments_open() && !post_password_required()){
				echo Exray::span('icon comment', 'c'); 
				comments_popup_link('No comment', '1 comment', '% comments','article-meta-comment');
			}

			if(current_user_can('edit_post', $post->ID)){
         		edit_post_link(__('Edit', 'exray-framework'), '&nbsp;<p><span class="icon">S</span>&nbsp;', '</p>', '');
         	}
         	
			?>
		</p>
	</div> 
	<!-- End entry-meta -->
	<?php else :?>
	
	<div class="entry-meta">								
		<p class="article-meta-extra">										
             <?php
               if(current_user_can('edit_post', $post->ID)){
             		edit_post_link(__('Edit', 'exray-framework'), '<p><span class="icon left-meta-icon">S</span>&nbsp;', '</p>', '');
             	}
             ?>		
		</p>
	</div> 
	<!-- End entry-meta -->

	<?php endif; ?>
	
<?php 
} 

/***************************************************************/
/* Pagination for older/newer post */
/***************************************************************/
function get_exray_pagination(){
?>
	<nav class="pagination clearfix"  id="nav-below" role="navigation">

		<p class="article-nav-prev"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'exray-framework' ) . '</span> %title' ); ?></p>
		<p class="article-nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'exray-framework' ) . '</span>' ); ?></p>

	</nav>
<?php
}

/***************************************************************/
/* Pagination for multi paged page/post */
/***************************************************************/
function get_exray_post_pagination(){
?>
	<div class="post-pagination">
		<!-- Pagination For Multipaged Post -->
		<?php $args = array(
			'before'=>'<nav class="post-pagination menu">'.'<span class="post-pagination title">'.__('Pages: ', 'exray-framework').'</span>',
			'after'=>'</nav>',
			'pagelink'=>'<span class="post-pagination current-page">%</span>'  
		);?>

		<?php wp_link_pages($args); ?>
	</div>

<?php 
}


/***************************************************************/
/* Exray sidebar opening tag  	*/
/***************************************************************/
function get_exray_primary_sidebar(){
	global $exray_general_options; 
	$layout_options = $exray_general_options['layout_options']; 
?>
<?php 
if($layout_options == 'sidebar_content' || $layout_options == 'default') : ?>

    <div id="primary" class="widget-area span3 main-sidebar" role="complementary">

        <?php get_sidebar('sidebar'); ?>

    </div>  
    <!-- end span3 secondary left-sidebar -->   
 <?php endif; ?>

<?php 
}

function get_exray_content_html_opening(){
	global $exray_general_options; 
	$layout_options = $exray_general_options['layout_options'];
?>
   <?php if($layout_options == 'content_sidebar' || $layout_options == 'sidebar_content') : ?>

 	<div class="span9 article-container-adaptive" id="main">
    
    <?php elseif($layout_options == 'full_content') : ?>

         <div class="span12 article-container-adaptive" id="main">

    <?php else : ?>

    	<div class="span6 article-container-adaptive" id="main">
    
    <?php endif; 
}

function get_exray_secondary_sidebar(){
	global $exray_general_options; 
	$layout_options = $exray_general_options['layout_options']; 
?>
 	<?php if($layout_options  == 'content_sidebar'  || $layout_options == 'default') : ?>

        <div id="secondary" class="widget-area span3 main-sidebar" role="complementary">						

            <?php get_sidebar('secondary'); ?>

        </div> 
        <!-- end span3 secondary right-sidebar -->
 	<?php endif; 
}