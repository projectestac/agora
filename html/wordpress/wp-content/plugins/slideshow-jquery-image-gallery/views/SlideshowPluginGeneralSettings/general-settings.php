<?php

// Path to the General Settings' views folder
$generalSettingsViewsPath = SlideshowPluginMain::getPluginPath() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'SlideshowPluginGeneralSettings' . DIRECTORY_SEPARATOR;

?>

<div class="wrap">
	<form method="post" action="options.php">
		<?php settings_fields(SlideshowPluginGeneralSettings::$settingsGroup); ?>

		<div class="icon32" style="background: url('<?php echo SlideshowPluginMain::getPluginUrl() . '/images/SlideshowPluginPostType/adminIcon32.png'; ?>');"></div>
		<h2 class="nav-tab-wrapper">
			<a href="#general-settings-tab" class="nav-tab nav-tab-active"><?php _e('General Settings', 'slideshow-plugin'); ?></a>
			<a href="#default-slideshow-settings-tab" class="nav-tab"><?php _e('Default Slideshow Settings', 'slideshow-plugin'); ?></a>
			<a href="#custom-styles-tab" class="nav-tab"><?php _e('Custom Styles', 'slideshow-plugin'); ?></a>

			<?php submit_button(null, 'primary', null, false, 'style="float: right;"'); ?>
		</h2>

		<?php

		// General Settings
		include $generalSettingsViewsPath . 'general-settings-tab.php';

		// Default slideshow settings
		include $generalSettingsViewsPath . 'default-slideshow-settings-tab.php';

		// Custom styles
		include $generalSettingsViewsPath . 'custom-styles-tab.php';

		?>

		<p>
			<?php submit_button(null, 'primary', null, false); ?>
		</p>
	</form>
</div>