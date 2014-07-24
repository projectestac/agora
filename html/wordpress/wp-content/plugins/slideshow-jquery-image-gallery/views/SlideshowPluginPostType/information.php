<p><?php _e('To use this slideshow in your website either add this piece of shortcode to your posts or pages', 'slideshow-plugin'); ?>:</p>
<p><i><?php echo $shortCode; ?></i></p>

<?php if(current_user_can('edit_themes')): ?>
<p><?php _e('Or add this piece of code to where ever in your website you want to place the slideshow', 'slideshow-plugin'); ?>:</p>
<p><i><?php echo $snippet; ?></i></p>
<?php endif; ?>

<p><?php echo sprintf(__('Or go to the %swidgets page%s and show the slideshow as a widget.', 'slideshow-plugin'), '<a href="' . get_admin_url(null, 'widgets.php') . '" target="_blank">', '</a>'); ?></p>