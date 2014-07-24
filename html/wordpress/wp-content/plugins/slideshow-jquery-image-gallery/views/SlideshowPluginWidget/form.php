<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'slideshow-plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo htmlspecialchars($instance['title']); ?>" style="width:100%" />
</p>

<p>
	<label for="<?php echo $this->get_field_id('slideshowId'); ?>"><?php _e('Slideshow', 'slideshow-plugin'); ?></label>
	<select class="widefat" id="<?php echo $this->get_field_id('slideshowId'); ?>" name="<?php echo $this->get_field_name('slideshowId'); ?>" value="<?php echo (is_numeric($instance['slideshowId']))? $instance['slideshowId'] : ''; ?>" style="width:100%">
		<option value="-1" <?php selected($instance['slideshowId'], -1); ?>><?php _e('Random Slideshow', 'slideshow-plugin'); ?></option>
		<?php if(count($slideshows) > 0): ?>
		<?php foreach($slideshows as $slideshow): ?>
			<option value="<?php echo $slideshow->ID ?>" <?php selected($instance['slideshowId'], $slideshow->ID); ?>><?php echo !empty($slideshow->post_title) ? $slideshow->post_title : __('Untitled slideshow', 'slideshow-plugin'); ?></option>
		<?php endforeach; ?>
		<?php endif; ?>
	</select>
</p>