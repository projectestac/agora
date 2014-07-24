<?php

// Default settings
$defaultSettings      = SlideshowPluginSlideshowSettingsHandler::getDefaultSettings(true);
$defaultStyleSettings = SlideshowPluginSlideshowSettingsHandler::getDefaultStyleSettings(true);

?>

<div class="default-slideshow-settings-tab" style="display: none; float: none;">
	<p>
		<strong><?php _e('Note', 'slideshow-plugin'); ?>:</strong>
	</p>

	<p style="width: 500px;">
		<?php

		echo sprintf(__(
			'The settings set on this page apply only to newly created slideshows and therefore do not alter any existing ones. To adapt a slideshow\'s settings, %sclick here.%s', 'slideshow-plugin'),
			'<a href="' . get_admin_url(null, 'edit.php?post_type=' . SlideshowPluginPostType::$postType) . '">',
			'</a>'
		);

		?>
	</p>
</div>

<div class="default-slideshow-settings-tab feature-filter" style="display: none;">

	<h4><?php _e('Default Slideshow Settings', 'slideshow-plugin'); ?></h4>

	<table>

		<?php $groups = array(); ?>
		<?php foreach($defaultSettings as $defaultSettingKey => $defaultSettingValue): ?>

		<?php if(!empty($defaultSettingValue['group']) && !isset($groups[$defaultSettingValue['group']])): $groups[$defaultSettingValue['group']] = true; ?>

		<tr>
			<td colspan="3" style="border-bottom: 1px solid #dfdfdf; text-align: center;">
				<span style="display: inline-block; position: relative; top: 14px; padding: 0 12px; background: #fff;">
					<?php echo $defaultSettingValue['group']; ?> <?php _e('settings', 'slideshow-plugin'); ?>
				</span>
			</td>
		</tr>
		<tr>
			<td colspan="3"></td>
		</tr>

		<?php endif; ?>

		<tr>
			<td>
				<?php echo $defaultSettingValue['description']; ?>
			</td>
			<td>
				<?php

				echo SlideshowPluginSlideshowSettingsHandler::getInputField(
					SlideshowPluginGeneralSettings::$defaultSettings,
					$defaultSettingKey,
					$defaultSettingValue,
					/* hideDependentValues = */ false
				);

				?>
			</td>
		</tr>

		<?php endforeach; ?>
		<?php unset($groups); ?>

	</table>
</div>

<div class="default-slideshow-settings-tab feature-filter" style="display: none;">

	<h4><?php _e('Default Slideshow Stylesheet', 'slideshow-plugin'); ?></h4>

	<table>

		<?php foreach($defaultStyleSettings as $defaultStyleSettingKey => $defaultStyleSettingValue): ?>

		<tr>
			<td>
				<?php echo $defaultStyleSettingValue['description']; ?>
			</td>
			<td>
				<?php

				echo SlideshowPluginSlideshowSettingsHandler::getInputField(
					SlideshowPluginGeneralSettings::$defaultStyleSettings,
					$defaultStyleSettingKey,
					$defaultStyleSettingValue,
					/* hideDependentValues = */ false
				);

				?>
			</td>
		</tr>

		<?php endforeach; ?>

	</table>
</div>

<div style="clear: both;"></div>