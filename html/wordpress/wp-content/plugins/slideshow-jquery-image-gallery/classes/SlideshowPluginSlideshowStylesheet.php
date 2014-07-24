<?php
/**
 * SlideshowPluginSlideshowStylesheet handles the loading of the slideshow's stylesheets.
 *
 * @since 2.2.8
 * @author Stefan Boonstra
 */
class SlideshowPluginSlideshowStylesheet
{
	/** @var bool $allStylesheetsRegistered */
	public static $allStylesheetsRegistered = false;

	/**
	 * Initializes the SlideshowPluginSlideshowStylesheet class
	 *
	 * @since 2.2.12
	 */
	public static function init()
	{
		add_action('wp_enqueue_scripts', array(__CLASS__, 'enqueueFrontendStylesheets'));
	}

	/**
	 * Enqueue stylesheet
	 */
	public static function enqueueFrontendStylesheets()
	{
		if (SlideshowPluginGeneralSettings::getStylesheetLocation() === 'head')
		{
			// Register functional stylesheet
			wp_enqueue_style(
				'slideshow-jquery-image-gallery-stylesheet_functional',
				SlideshowPluginMain::getPluginUrl() . '/style/SlideshowPlugin/functional.css',
				array(),
				SlideshowPluginMain::$version
			);

			// Get default and custom stylesheets
			$stylesheets        = SlideshowPluginGeneralSettings::getStylesheets(true, true);
			$defaultStylesheets = $stylesheets['default'];
			$customStylesheets  = $stylesheets['custom'];

			// Clean the '.css' extension from the default stylesheets
			foreach ($defaultStylesheets as $defaultStylesheetKey => $defaultStylesheetValue)
			{
				$newDefaultStylesheetKey = str_replace('.css', '', $defaultStylesheetKey);

				$defaultStylesheets[$newDefaultStylesheetKey] = $defaultStylesheetValue;

				if ($defaultStylesheetKey !== $newDefaultStylesheetKey)
				{
					unset($defaultStylesheets[$defaultStylesheetKey]);
				}
			}

			// Enqueue stylesheets
			foreach (array_merge($defaultStylesheets, $customStylesheets) as $stylesheetKey => $stylesheetValue)
			{
				wp_enqueue_style(
					'slideshow-jquery-image-gallery-ajax-stylesheet_' . $stylesheetKey,
					admin_url('admin-ajax.php?action=slideshow_jquery_image_gallery_load_stylesheet&style=' . $stylesheetKey),
					array(),
					$stylesheetValue['version']
				);
			}

			self::$allStylesheetsRegistered = true;
		}
	}

	/**
	 * Enqueues a stylesheet based on the stylesheet's name. This can either be a default stylesheet or a custom one.
	 * If the name parameter is left unset, the default stylesheet will be used.
	 *
	 * Returns the name and version number of the stylesheet that's been enqueued, as this can be different from the
	 * name passed. This can be this case if a stylesheet does not exist and a default stylesheet is enqueued.
	 *
	 * @param string $name (optional, defaults to null)
	 * @return array [$name, $version]
	 */
	public static function enqueueStylesheet($name = null)
	{
		if (isset($name))
		{
			// Try to get the custom style's version
			$customStyle        = get_option($name, false);
			$customStyleVersion = false;

			if ($customStyle)
			{
				$customStyleVersion = get_option($name . '_version', false);
			}

			// Style name and version
			if ($customStyle && $customStyleVersion)
			{
				$version = $customStyleVersion;
			}
			else
			{
				$name    = str_replace('.css', '', $name);
				$version = SlideshowPluginMain::$version;
			}
		}
		else
		{
			$name    = 'style-light';
			$version = SlideshowPluginMain::$version;
		}

		// Enqueue stylesheet
		wp_enqueue_style(
			'slideshow-jquery-image-gallery-ajax-stylesheet_' . $name,
			admin_url('admin-ajax.php?action=slideshow_jquery_image_gallery_load_stylesheet&style=' . $name),
			array(),
			$version
		);

		return array($name, $version);
	}

	/**
	 * Called through WordPress' admin-ajax.php script, registered in the SlideshowPluginAJAX class. This function
	 * must not be called on itself.
	 *
	 * Uses the loadStylesheet function to load the stylesheet passed in the URL data. If no stylesheet name is set, all
	 * stylesheets will be loaded.
	 *
	 * Headers are set to allow file caching.
	 *
	 * @since 2.2.11
	 */
	public static function loadStylesheetByAJAX()
	{
		$styleName = filter_input(INPUT_GET, 'style', FILTER_SANITIZE_SPECIAL_CHARS);

		// If no style name is set, all stylesheets will be loaded.
		if (isset($styleName) &&
			!empty($styleName) &&
			strlen($styleName) > 0)
		{
			$stylesheet = self::getStylesheet($styleName);
		}
		else
		{
			return;
		}

		// Exit if headers have already been sent
		if (headers_sent())
		{
			return;
		}

		// Set header to CSS. Cache for a year (as WordPress does)
		header('Content-Type: text/css; charset=UTF-8');
		header('Expires: ' . gmdate("D, d M Y H:i:s", time() + 31556926) . ' GMT');
		header('Pragma: cache');
		header("Cache-Control: public, max-age=31556926");

		echo $stylesheet;

		die;
	}

	/**
	 * Gets the stylesheet with the parsed style name, then returns it.
	 *
	 * @since 2.2.8
	 * @param string $styleName
	 * @return string $stylesheet
	 */
	public static function getStylesheet($styleName)
	{
		// Get custom stylesheet, of the default stylesheet if the custom stylesheet does not exist
		$stylesheet = get_option($styleName, '');

		if (strlen($stylesheet) <= 0)
		{
			$stylesheetFile = SlideshowPluginMain::getPluginPath() . DIRECTORY_SEPARATOR . 'style' . DIRECTORY_SEPARATOR . 'SlideshowPlugin' . DIRECTORY_SEPARATOR . $styleName . '.css';

			if (!file_exists($stylesheetFile))
			{
				$stylesheetFile = SlideshowPluginMain::getPluginPath() . DIRECTORY_SEPARATOR . 'style' . DIRECTORY_SEPARATOR . 'SlideshowPlugin' . DIRECTORY_SEPARATOR . 'style-light.css';
			}

			// Get contents of stylesheet
			ob_start();
			include($stylesheetFile);
			$stylesheet .= ob_get_clean();
		}

		// Replace the URL placeholders with actual URLs and add a unique identifier to separate stylesheets
		$stylesheet = str_replace('%plugin-url%', SlideshowPluginMain::getPluginUrl(), $stylesheet);
		$stylesheet = str_replace('%site-url%', get_bloginfo('url'), $stylesheet);
		$stylesheet = str_replace('%stylesheet-url%', get_stylesheet_directory_uri(), $stylesheet);
		$stylesheet = str_replace('%template-url%', get_template_directory_uri(), $stylesheet);
		$stylesheet = str_replace('.slideshow_container', '.slideshow_container_' . $styleName, $stylesheet);

		return $stylesheet;
	}
}