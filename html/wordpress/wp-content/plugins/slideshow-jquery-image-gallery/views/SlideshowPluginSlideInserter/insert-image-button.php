<?php if (function_exists('wp_enqueue_media')): ?>
	<input type="button" class="button slideshow-insert-image-slide" value="<?php _e('Image slide', 'slideshow-plugin'); ?>" />
<?php else: ?>
	<input type="button" id="slideshow-insert-image-slide" class="button" value="<?php _e('Image slide', 'slideshow-plugin'); ?>" />
<?php endif; ?>