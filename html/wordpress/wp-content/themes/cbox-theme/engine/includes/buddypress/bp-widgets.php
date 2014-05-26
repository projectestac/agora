<?php

class CBox_BP_Blogs_Recent_Posts_Widget extends WP_Widget {
	function __construct() {
		if ( ! bp_is_active( 'blogs' ) ) {
			return;
		}
		parent::WP_Widget( false, $name = __( 'Recent Networkwide Blog Posts', 'cbox-theme' ) );
	}

	function widget($args, $instance) {
		global $bp;

		extract( $args );

		$link_title = ! empty( $instance['link_title'] );

		echo $before_widget;
		echo $before_title;

		if ( $link_title ) {
			$dir_link = trailingslashit( bp_get_root_domain() ) . trailingslashit( bp_get_blogs_root_slug() );
			$title = '<a href="' . $dir_link . '">' . $instance['title'] . '</a>';
		} else {
			$title = $instance['title'];
		}
		echo $title;
		echo $after_title;

		if ( empty( $instance['max_posts'] ) || !$instance['max_posts'] )
			$instance['max_posts'] = 10;

		// Load more items that we need, because many will be filtered out by privacy
		$real_max = $instance['max_posts'] * 10;
		$counter = 0;

		if ( bp_has_activities( 'action=new_blog_post&max=' . $real_max . '&per_page=' . $real_max ) ) : ?>

			<ul id="blog-post-list" class="activity-list item-list">

				<?php while ( bp_activities() ) : bp_the_activity(); ?>

					<?php if ( $counter >= $instance['max_posts'] ) break ?>

					<li>
						<div class="activity-content" style="margin: 0">
							<div class="activity-avatar">
								<?php bp_activity_avatar() ?>
							</div>

							<div class="activity-header">
								<?php bp_activity_action() ?>
							</div>

							<?php if ( bp_get_activity_content_body() ) : ?>

									<?php bp_activity_content_body() ?>

							<?php endif; ?>

						</div>
					</li>

					<?php $counter++ ?>

				<?php endwhile; ?>

			</ul>

		<p class="cac-more-link"><a href="<?php bp_blogs_directory_permalink(); ?>">More Blogs</a></p>

		<?php else : ?>
			<div id="message" class="info">
				<p><?php _e( 'Sorry, there were no blog posts found. Why not write one?', 'buddypress' ) ?></p>
			</div>
		<?php endif; ?>

		<?php echo $after_widget; ?>
	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['max_posts']  = strip_tags( $new_instance['max_posts'] );
		$instance['title']      = strip_tags( $new_instance['title'] );
		$instance['link_title'] = empty( $new_instance['link_title'] ) ? '0' : '1';

		return $instance;
	}

	function form( $instance ) {
		$instance   = wp_parse_args( (array) $instance, array(
			'max_posts'  => 10,
			'title'      => __( 'Recent Blog Posts', 'cbox-theme' ),
			'link_title' => true,
		) );
		$max_posts  = strip_tags( $instance['max_posts'] );
		$title      = strip_tags( $instance['title'] );
		$link_title = (bool) $instance['link_title'];

		?>

		<p><label for="<?php echo $this->get_field_id( 'title' ) ?>"><?php _e('Title: ', 'cbox-theme'); ?> <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" style="width: 90%" /></label></p>

		<p><label for="<?php echo $this->get_field_name( 'link_title' ) ?>"><input type="checkbox" name="<?php echo $this->get_field_name( 'link_title' ) ?>" value="1" <?php checked( $link_title ) ?> /> <?php _e( 'Link widget title to Blogs directory', 'cbox-theme' ) ?></label></p>

		<p><label for="<?php echo $this->get_field_id( 'max_posts' ) ?>"><?php _e('Max posts to show:', 'buddypress'); ?> <input class="widefat" id="<?php echo $this->get_field_id( 'max_posts' ); ?>" name="<?php echo $this->get_field_name( 'max_posts' ); ?>" type="text" value="<?php echo esc_attr( $max_posts ); ?>" style="width: 30%" /></label></p>

	<?php
	}
}
