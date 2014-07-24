<?php

$title = $description = $textColor = $color = $url = $target = '';

$titleElementTagID = $descriptionElementTagID = SlideshowPluginSlideInserter::getElementTag();

$noFollow = false;

if (isset($properties['title']))
{
	$title = SlideshowPluginSecurity::htmlspecialchars_allow_exceptions($properties['title']);
}

if (isset($properties['titleElementTagID']))
{
	$titleElementTag = $properties['titleElementTagID'];
}

if (isset($properties['description']))
{
	$description = SlideshowPluginSecurity::htmlspecialchars_allow_exceptions($properties['description']);
}

if (isset($properties['descriptionElementTagID']))
{
	$descriptionElementTag = $properties['descriptionElementTagID'];
}

if (isset($properties['textColor']))
{
	$textColor = $properties['textColor'];
}

if (isset($properties['color']))
{
	$color = $properties['color'];
}

if (isset($properties['url']))
{
	$url = $properties['url'];
}

if (isset($properties['urlTarget']))
{
	$target = $properties['urlTarget'];
}

if (isset($properties['noFollow']))
{
    $noFollow = true;
}

?>

<div class="widefat sortable-slides-list-item postbox">

	<div class="handlediv" title="<?php _e('Click to toggle'); ?>"><br></div>

	<div class="hndle">
		<div class="slide-icon text-slide-icon"></div>
		<div class="slide-title">
			<?php if (strlen($title) > 0) : ?>

				<?php echo $title; ?>

			<?php else : ?>

				<?php _e('Text slide', 'slideshow-plugin'); ?>

			<?php endif; ?>
		</div>
		<div class="clear"></div>
	</div>

	<div class="inside">

		<div class="slideshow-group">

			<div class="slideshow-left slideshow-label"><?php _e('Title', 'slideshow-plugin'); ?></div>
			<div class="slideshow-right">
				<select name="<?php echo $name; ?>[titleElementTagID]">
					<?php foreach (SlideshowPluginSlideInserter::getElementTags() as $elementTagID => $elementTag): ?>
						<option value="<?php echo $elementTagID; ?>" <?php selected($titleElementTagID, $elementTagID); ?>><?php echo $elementTag; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="clear"></div>
			<input type="text" name="<?php echo $name; ?>[title]" value="<?php echo $title; ?>" style="width: 100%;" /><br />

		</div>

		<div class="slideshow-group">

			<div class="slideshow-left slideshow-label"><?php _e('Description', 'slideshow-plugin'); ?></div>
			<div class="slideshow-right">
				<select name="<?php echo $name; ?>[descriptionElementTagID]">
					<?php foreach (SlideshowPluginSlideInserter::getElementTags() as $elementTagID => $elementTag): ?>
						<option value="<?php echo $elementTagID; ?>" <?php selected($descriptionElementTagID, $elementTagID); ?>><?php echo $elementTag; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div clear="clear"></div>
			<textarea name="<?php echo $name; ?>[description]" rows="7" cols="" style="width: 100%;"><?php echo $description; ?></textarea><br />

		</div>

		<div class="slideshow-group">

			<div class="slideshow-label"><?php _e('Text color', 'slideshow-plugin'); ?></div>
			<input type="text" name="<?php echo $name; ?>[textColor]" value="<?php echo $textColor; ?>" class="wp-color-picker-field" />

			<div class="slideshow-label"><?php _e('Background color', 'slideshow-plugin'); ?></div>
			<input type="text" name="<?php echo $name; ?>[color]" value="<?php echo $color; ?>" class="wp-color-picker-field" />
			<div style="font-style: italic;"><?php _e('(Leave empty for a transparent background)', 'slideshow-plugin'); ?></div>

		</div>

		<div class="slideshow-group">

			<div class="slideshow-label"><?php _e('URL', 'slideshow-plugin'); ?></div>
			<input type="text" name="<?php echo $name; ?>[url]" value="<?php echo $url; ?>" style="width: 100%;" />

			<div class="slideshow-label slideshow-left"><?php _e('Open URL in', 'slideshow-plugin'); ?></div>
			<select name="<?php echo $name; ?>[urlTarget]" class="slideshow-right">
				<option value="_self" <?php selected('_self', $target); ?>><?php _e('Same window', 'slideshow-plugin'); ?></option>
				<option value="_blank" <?php selected('_blank', $target); ?>><?php _e('New window', 'slideshow-plugin'); ?></option>
			</select>
			<div class="clear"></div>

			<div class="slideshow-label slideshow-left"><?php _e('Don\'t let search engines follow link', 'slideshow-plugin'); ?></div>
			<input type="checkbox" name="<?php echo $name; ?>[noFollow]" value="" <?php checked($noFollow); ?> class="slideshow-right" />
			<div class="clear"></div>

		</div>

		<div class="slideshow-group slideshow-delete-slide">
			<span><?php _e('Delete slide', 'slideshow-plugin'); ?></span>
		</div>

		<input type="hidden" name="<?php echo $name; ?>[type]" value="text" />

	</div>

</div>