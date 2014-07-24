<table>
	<?php $groups = array(); ?>
	<?php if(count($settings) > 0): ?>
	<?php foreach($settings as $key => $value): ?>

	<?php if( !isset($value, $value['type'], $value['default'], $value['description']) || !is_array($value)) continue; ?>

	<?php if(!empty($value['group']) && !isset($groups[$value['group']])): $groups[$value['group']] = true; ?>
	<tr>
		<td colspan="3" style="border-bottom: 1px solid #e5e5e5; text-align: center;">
			<span style="display: inline-block; position: relative; top: 14px; padding: 0 12px; background: #fff;">
				<?php echo $value['group']; ?> <?php _e('settings', 'slideshow-plugin'); ?>
			</span>
		</td>
	</tr>
	<tr>
		<td colspan="3"></td>
	</tr>
	<?php endif; ?>
	<tr
		<?php echo !empty($value['group'])? 'class="group-' . strtolower(str_replace(' ', '-', $value['group'])) . '"': ''; ?>
		<?php echo !empty($value['dependsOn'])? 'style="display:none;"': ''; ?>
	>
		<td><?php echo $value['description']; ?></td>
		<td><?php echo SlideshowPluginSlideshowSettingsHandler::getInputField(SlideshowPluginSlideshowSettingsHandler::$settingsKey, htmlspecialchars($key), $value); ?></td>
		<td><?php _e('Default', 'slideshow-plugin'); ?>: &#39;<?php echo (isset($value['options']))? $value['options'][$value['default']]: $value['default']; ?>&#39;</td>
	</tr>

	<?php endforeach; ?>
	<?php endif; ?>
</table>