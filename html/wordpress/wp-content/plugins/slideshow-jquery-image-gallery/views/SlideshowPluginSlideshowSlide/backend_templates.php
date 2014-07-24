<div class="text-slide-template" style="display: none;">
	<div class="widefat sortable-slides-list-item postbox">

		<div class="handlediv" title="<?php _e('Click to toggle'); ?>"><br></div>

		<div class="hndle">
			<div class="slide-icon text-slide-icon"></div>
			<div class="slide-title">
				<?php _e('Text slide', 'slideshow-plugin'); ?>
			</div>
			<div class="clear"></div>
		</div>

		<div class="inside">

			<div class="slideshow-group">

				<div class="slideshow-left slideshow-label"><?php _e('Title', 'slideshow-plugin'); ?></div>
				<div class="slideshow-right">
					<select class="titleElementTagID">
						<?php foreach (SlideshowPluginSlideInserter::getElementTags() as $elementTagID => $elementTag): ?>
							<option value="<?php echo $elementTagID; ?>"><?php echo $elementTag; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="clear"></div>
				<input type="text" class="title" style="width: 100%;" />

			</div>

			<div class="slideshow-group">

				<div class="slideshow-left slideshow-label"><?php _e('Description', 'slideshow-plugin'); ?></div>
				<div class="slideshow-right">
					<select class="descriptionElementTagID">
						<?php foreach (SlideshowPluginSlideInserter::getElementTags() as $elementTagID => $elementTag): ?>
							<option value="<?php echo $elementTagID; ?>"><?php echo $elementTag; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div clear="clear"></div>
				<textarea class="description" cols="" rows="7" style="width: 100%;"></textarea>

			</div>

			<div class="slideshow-group">

				<div class="slideshow-label"><?php _e('Text color', 'slideshow-plugin'); ?></div>
				<input type="text" class="textColor" value="000000" />

				<div class="slideshow-label"><?php _e('Background color', 'slideshow-plugin'); ?></div>
				<input type="text" class="color" value="FFFFFF" />
				<div style="font-style: italic;"><?php _e('(Leave empty for a transparent background)', 'slideshow-plugin'); ?></div>

			</div>

			<div class="slideshow-group">

				<div class="slideshow-label"><?php _e('URL', 'slideshow-plugin'); ?></div>
				<input type="text" class="url" value="" style="width: 100%;" />

				<div class="slideshow-label slideshow-left"><?php _e('Open URL in', 'slideshow-plugin'); ?></div>
				<select class="urlTarget slideshow-right">
					<option value="_self"><?php _e('Same window', 'slideshow-plugin'); ?></option>
					<option value="_blank"><?php _e('New window', 'slideshow-plugin'); ?></option>
				</select>
				<div class="clear"></div>

				<div class="slideshow-label slideshow-left"><?php _e('Don\'t let search engines follow link', 'slideshow-plugin'); ?></div>
	            <input type="checkbox" class="noFollow slideshow-right" />
				<div class="clear"></div>

	        </div>

			<div class="slideshow-group slideshow-delete-slide">
				<span><?php _e('Delete slide', 'slideshow-plugin'); ?></span>
			</div>

			<input type="hidden" class="type" value="text" />

		</div>

	</div>
</div>

<div class="video-slide-template" style="display: none;">
	<div class="widefat sortable-slides-list-item postbox">

		<div class="handlediv" title="<?php _e('Click to toggle'); ?>"><br></div>

		<div class="hndle">
			<div class="slide-icon video-slide-icon"></div>
			<div class="slide-title">
				<?php _e('Video slide', 'slideshow-plugin'); ?>
			</div>
			<div class="clear"></div>
		</div>

		<div class="inside">

			<div class="slideshow-group">

				<div class="slideshow-label"><?php _e('Youtube Video ID', 'slideshow-plugin'); ?></div>
				<input type="text" class="videoId" style="width: 100%;" />

			</div>

			<div class="slideshow-group">

				<div class="slideshow-label"><?php _e('Show related videos', 'slideshow-plugin'); ?></div>
				<label><input type="radio" class="showRelatedVideos" value="true"><?php _e('Yes', 'slideshow-plugin'); ?></label>
				<label><input type="radio" class="showRelatedVideos" value="false" checked="checked""><?php _e('No', 'slideshow-plugin'); ?></label>

			</div>

			<div class="slideshow-group slideshow-delete-slide">
				<span><?php _e('Delete slide', 'slideshow-plugin'); ?></span>
			</div>

			<input type="hidden" class="type" value="video" />

		</div>

	</div>
</div>

<div class="image-slide-template" style="display: none;">
	<div class="widefat sortable-slides-list-item postbox">

		<div class="handlediv" title="<?php _e('Click to toggle'); ?>"><br></div>

		<div class="hndle">
			<div class="slide-icon image-slide-icon"></div>
			<div class="slide-title">
				<?php _e('Image slide', 'slideshow-plugin'); ?>
			</div>
			<div class="clear"></div>
		</div>

		<div class="inside">

			<div class="slideshow-group">

				<img width="80" height="60" src="" class="attachment attachment-80x60" alt="" title="" style="float: none; margin: 0; padding: 0;" />

			</div>

			<div class="slideshow-group">

				<div class="slideshow-left slideshow-label"><?php _e('Title', 'slideshow-plugin'); ?></div>
				<div class="slideshow-right">
					<select class="titleElementTagID">
						<?php foreach (SlideshowPluginSlideInserter::getElementTags() as $elementTagID => $elementTag): ?>
							<option value="<?php echo $elementTagID; ?>"><?php echo $elementTag; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="clear"></div>
				<input type="text" class="title" style="width: 100%;" />

			</div>

			<div class="slideshow-group">

				<div class="slideshow-left slideshow-label"><?php _e('Description', 'slideshow-plugin'); ?></div>
				<div class="slideshow-right">
					<select class="descriptionElementTagID">
						<?php foreach (SlideshowPluginSlideInserter::getElementTags() as $elementTagID => $elementTag): ?>
							<option value="<?php echo $elementTagID; ?>"><?php echo $elementTag; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="clear"></div>
				<textarea class="description" rows="3" cols="" style="width: 100%;"></textarea><br />

			</div>

			<div class="slideshow-group">

				<div class="slideshow-label"><?php _e('URL', 'slideshow-plugin'); ?></div>
				<input type="text" class="url" value="" style="width: 100%;" /><br />

				<div class="slideshow-label slideshow-left"><?php _e('Open URL in', 'slideshow-plugin'); ?></div>
				<select class="urlTarget slideshow-right">
					<option value="_self"><?php _e('Same window', 'slideshow-plugin'); ?></option>
					<option value="_blank"><?php _e('New window', 'slideshow-plugin'); ?></option>
				</select>
				<div class="clear"></div>

				<div class="slideshow-label slideshow-left"><?php _e('Don\'t let search engines follow link', 'slideshow-plugin'); ?></div>
	            <input type="checkbox" class="noFollow slideshow-right" />

	        </div>

			<div class="slideshow-group">

				<div class="slideshow-label"><?php _e('Alternative text', 'slideshow-plugin'); ?></div>
				<input type="text" class="alternativeText" style="width: 100%;" />

			</div>

			<div class="slideshow-group slideshow-delete-slide">
				<span><?php _e('Delete slide', 'slideshow-plugin'); ?></span>
			</div>

			<input type="hidden" class="type" value="attachment" />
			<input type="hidden" class="postId" value="" />

		</div>

	</div>
</div>