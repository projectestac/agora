<?php
/**
 * Add new Post Thumbnail size for slider
 */
function cbox_thumb_sizes() {
	if ( current_theme_supports( 'post-thumbnails' ) ) {
		add_image_size( 'slider-image', 635, 344, true );
	}
}
add_action( 'after_setup_theme', 'cbox_thumb_sizes', 20 );

/**
 * Register custom "Features" post type
 */
function cbox_theme_feature_setup()
{
	$slider_type = (int) infinity_option_get( 'cbox_flex_slider' );

	// Don't register post type if slider is not in post type mode
	if ( $slider_type != 1 ) {
		return;
	}

	$labels = array(
		'name'               => _x( 'Featured Slider', 'post type general name', 'infinity' ),
		'singular_name'      => _x( 'Featured Slide', 'post type singular name', 'infinity' ),
		'all_items'          => _x( 'All Slides', 'infinity' ),
		'add_new'            => _x( 'Add Slide', 'infobox', 'infinity' ),
		'add_new_item'       => __( 'Add Slide', 'infinity' ),
		'edit_item'          => __( 'Edit Slide', 'infinity' ),
		'new_item'           => __( 'New Slide', 'infinity' ),
		'search_items'       => __( 'Search slides', 'infinity' ),
		'not_found'          => __( 'No slides found', 'infinity' ),
		'not_found_in_trash' => __( 'No slides found in trash', 'infinity' ),
		'parent_item_colon'  => ''
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => infinity_image_url( 'slides-icon.png' ),
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'features', $args );
}
add_action( 'after_setup_theme', 'cbox_theme_feature_setup', 20 );

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( $meta_boxes = array() ) {

	// Check which slider option is set
	$slider_type = (int) infinity_option_get( 'cbox_flex_slider' );

	// Show meta boxes only on Features post type
	if ( $slider_type == 1 ) {
		$cbox_slider_type = 'features';
	}
	// Or show them on all posts when a Featured Category is used for the slider
	if ( $slider_type == 2 ) {
		$cbox_slider_type = 'post';
		add_action( 'admin_footer', 'cbox_featured_post_admin_footer' );
	}

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cbox_';

	$meta_boxes[] = array(
		'id'         => 'cbox_slider_options',
		'title'      => __( 'Slide Options', 'cbox-theme' ),
		'pages'      => array( $cbox_slider_type ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => __( 'Slide Caption', 'cbox-theme' ),
				'desc' => __( 'Write down the text you would like to display in the slider. You can leave this empty if you want to show an excerpt of the post you have written above.', 'cbox-theme' ),
				'id'   => $prefix . 'slider_excerpt',
				'type' => 'wysiwyg',
					'options' => array(
					    'media_buttons' => false, // show insert/upload button(s)
					),
			),
			array(
				'name'    => __( 'Hide Caption?', 'cbox-theme' ),
				'desc'    => __( 'Do you want to completely hide the caption for this slide? This will only display your slide image', 'cbox-theme' ),
				'id'      => $prefix . 'hide_caption',
				'type'    => 'radio_inline',
				'std' => 'no',
				'options' => array(
					array( 'name' => 'Yes', 'value' => 'yes', ),
					array( 'name' => 'No', 'value' => 'no', ),
				),
			),
			array(
				'name' => __( 'Custom URL', 'cbox-theme' ),
				'desc' => __( 'The full URL you would like the slide to point to. Example: http://www.google.com.  Leave this blank to use the regular slider post permalink.', 'cbox-theme' ),
				'id'   => $prefix . 'custom_url',
				'type' => 'text',
			),
		),
	);

	// Add other metaboxes as needed
	$meta_boxes[] = array(
			'id'         => 'cbox_video_options',
			'title'      => __( 'Video Options', 'cbox-theme' ),
			'pages'      => array( $cbox_slider_type ), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name'    => __( 'Embed a Video?', 'cbox-theme' ),
					'desc'    => __( 'Do you want to display a video inside your slide? Note: The video will replace your caption text and slide image.', 'cbox-theme' ),
					'id'      => $prefix . 'enable_custom_video',
					'type'    => 'radio_inline',
					'std' => 'no',
					'options' => array(
						array( 'name' => 'Yes', 'value' => 'yes', ),
						array( 'name' => 'No', 'value' => 'no', ),
					),
				),
				array(
					'name' => __( 'Video URL', 'cbox-theme' ),
					'desc' => __( 'Enter a Youtube or Vimeo URL. example: http://www.youtube.com/watch?v=iMuFYnvSsZg', 'cbox-theme' ),
					'id'   => $prefix . 'video_url',
					'type' => 'oembed',
				),
			)
	);

	return $meta_boxes;
}

/**
 * Fetch slide image to show on the Site Features index
 */
function cbox_get_featured_slide( $post_ID ) {
	$post_thumbnail_id = get_post_thumbnail_id($post_ID);

	if ($post_thumbnail_id){
		$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'width=200&height=110&crop=1&crop_from_position=center,left');
		return $post_thumbnail_img[0];
	}
}

/**
 * Add new column to the Site Features index
 */
function cbox_site_features_column( $defaults ) {
	$defaults['featured_image'] = __( 'Slide Image', 'cbox-theme' );
	return $defaults;
}

/**
 * Renames the 'Featured Image' metabox for the 'features' post type.
 *
 * To rename the metabox, we actually have to remove the 'Featured Image'
 * metabox and replace it with a custom one with the same functionality.
 *
 * @since 1.0.6
 */
function cbox_rename_featured_image_metabox() {
	remove_meta_box( 'postimagediv', 'features', 'side' );
	add_meta_box( 'postimagediv', __( 'Slide Image' ), 'post_thumbnail_meta_box', 'features', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'cbox_rename_featured_image_metabox' );

/**
 * Show the slide image in the new column
 */
function cbox_site_features_column_content( $column_name, $post_ID ) {
	if ($column_name == 'featured_image') {
		$post_featured_image = cbox_get_featured_slide($post_ID);
		if ( $post_featured_image ){
			echo '<img src="' . $post_featured_image . '" />';
		}
	}
}
add_filter('manage_features_posts_columns', 'cbox_site_features_column', 10);
add_action('manage_features_posts_custom_column', 'cbox_site_features_column_content', 10, 2);

/**
 * Enqueues Slider JS at the bottom of the homepage
 */
function cbox_theme_flex_slider_script()
{
	if ( is_page_template('templates/homepage-template.php') ) {
		// render script tag ?>
		<script type="text/javascript">
			jQuery(document).ready(function(){

				jQuery('.slides').bxSlider({
					adaptiveHeight: true,
					auto: true,
	  				autoHover: true,
					mode: 'fade',
					video: true,
	  				useCSS: false,
	  				controls: false,
	  				pause : <?php echo infinity_option_get( 'cbox_flex_slider_time' ); ?>000,
	  				speed: <?php echo infinity_option_get( 'cbox_flex_slider_transition' ); ?>
				});

			});
		</script><?php
	}
}
add_action( 'close_body', 'cbox_theme_flex_slider_script' );

/**
 * Add inline JS to toggle "Slide Options" metabox on a "Post" admin page.
 *
 * When the slider's featured category is checked in the "Post" admin page,
 * this javascript will either show or hide the "Slide Options" and "Video
 * Options" metaboxes.
 *
 * This is only used if the slider is set to use a post category.
 *
 * @since 1.0.7
 */
function cbox_featured_post_admin_footer() {
	switch ( $GLOBALS['hook_suffix'] ) {
		case 'post-new.php' :
		case 'post.php' :

		$cat_id = infinity_option_get( 'cbox_flex_slider_category' );
	?>

<script type="text/javascript">
//<![CDATA[
	jQuery(function($) {
		function cbox_toggle_metaboxes() {
			$('#cbox_slider_options, #cbox_video_options').hide();

			$('#categorychecklist input[type="checkbox"]').each(function(i,e){
				var id = $(this).attr('id').match(/-([0-9]*)$/i);
				id = (id && id[1]) ? parseInt(id[1]) : null ;

				if ($.inArray(id, [<?php echo $cat_id; ?>]) > -1 && $(this).is(':checked')) {
					$('#cbox_slider_options, #cbox_video_options').show();
				}
			});
		}

		$('#taxonomy-category').on( 'click', '#categorychecklist input[type="checkbox"]', cbox_toggle_metaboxes );

		cbox_toggle_metaboxes();
	});
//]]>
</script>

	<?php
			break;
	}
}
