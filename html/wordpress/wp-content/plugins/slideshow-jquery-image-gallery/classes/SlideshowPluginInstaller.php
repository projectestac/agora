<?php
/**
 * SlideshowPluginInstaller takes care of setting up slideshow setting values and transferring to newer version without
 * losing any settings.
 *
 * @since 2.1.20
 * @author Stefan Boonstra
 */
class SlideshowPluginInstaller
{
	/** @var string $versionKey Version option key */
	private static $versionKey = 'slideshow-jquery-image-gallery-plugin-version';

	/**
	 * Determines whether or not to perform an update to the plugin.
	 * Checks are only performed when on admin pages as not to slow down the website.
	 *
	 * @since 2.1.20
	 */
	static function init()
	{
		// Only check versions in admin
		if (!is_admin())
		{
			return;
		}

		// Transfer if no version number is set, or the new version number is greater than the current one saved in the database
		$currentVersion = get_option(self::$versionKey, null);

		if ($currentVersion == null ||
			self::firstVersionGreaterThanSecond(SlideshowPluginMain::$version, $currentVersion))
		{
			self::update($currentVersion);
		}

		// New installation
		if ($currentVersion == null)
		{
			// Set up capabilities
			self::setCapabilities();
		}
	}

	/**
	 * Updates user to correct version
	 *
	 * @since 2.1.20
	 * @param string $currentVersion
	 */
	private static function update($currentVersion)
	{
		// Version numbers are registered after version 2.1.20
		if($currentVersion == null)
		{
			self::updateV1toV2();
			self::updateV2toV2_1_20();
		}

		// Update to version 2.1.22
		if (self::firstVersionGreaterThanSecond('2.1.22', $currentVersion) ||
			$currentVersion == null)
		{
			self::setCapabilities();
		}

		// Update to version 2.1.23
		if (self::firstVersionGreaterThanSecond('2.1.23', $currentVersion) ||
			$currentVersion == null)
		{
			self::updateV2_1_20_to_V2_2_1_23();
		}

		// Update to version 2.2.0
		if (self::firstVersionGreaterThanSecond('2.2.0', $currentVersion) ||
			$currentVersion == null)
		{
			self::updateV2_1_23_to_V_2_2_0();
		}

		// Update to version 2.2.8
		if (self::firstVersionGreaterThanSecond('2.2.8', $currentVersion) ||
			$currentVersion == null)
		{
			self::updateV2_2_0_to_V_2_2_8();
		}

		// Update to version 2.2.12
		if (self::firstVersionGreaterThanSecond('2.2.12', $currentVersion) ||
			$currentVersion == null)
		{
			self::updateV2_2_8_to_V_2_2_12();
		}

		// Update to version 2.2.16
		if (self::firstVersionGreaterThanSecond('2.2.16', $currentVersion) ||
			$currentVersion == null)
		{
			self::updateV2_2_12_to_V_2_2_16();
		}

		// Update to version 2.2.17
		if (self::firstVersionGreaterThanSecond('2.2.17', $currentVersion) ||
			$currentVersion == null)
		{
			self::updateV2_2_16_to_V_2_2_17();
		}

		// Update to version 2.2.20
		if (self::firstVersionGreaterThanSecond('2.2.20', $currentVersion) ||
			$currentVersion == null)
		{
			self::updateV2_2_17_to_V_2_2_20();
		}

		// Set new version
		update_option(self::$versionKey, SlideshowPluginMain::$version);
	}

	/**
	 * Version 2.2.17 to 2.2.20
	 *
	 * Version 2.2.20 allows users to choose what kind of element displays the title and description of a slide. This
	 * replaces all default header (h2) and paragraph (p) elements with a default div element. This method will update
	 * all custom stylesheets with the new selectors.
	 *
	 * @since 2.2.20
	 */
	private static function updateV2_2_17_to_V_2_2_20()
	{
		// Check if this has already been done
		if (get_option('slideshow-jquery-image-gallery-updated-from-v2-2-17-to-v2-2-20') !== false)
		{
			return;
		}

		$additionalCSS =
"
.slideshow_container .slideshow_slide_text p,
.slideshow_container .slideshow_slide_text h1,
.slideshow_container .slideshow_slide_text h2,
.slideshow_container .slideshow_slide_text h3,
.slideshow_container .slideshow_slide_text h4,
.slideshow_container .slideshow_slide_text h5,
.slideshow_container .slideshow_slide_text h6 { text-align: center; }

.slideshow_container .slideshow_description_box div,
.slideshow_container .slideshow_description_box div a,
.slideshow_container .slideshow_description_box p,
.slideshow_container .slideshow_description_box p a,
.slideshow_container .slideshow_description_box h1,
.slideshow_container .slideshow_description_box h1 a,
.slideshow_container .slideshow_description_box h2,
.slideshow_container .slideshow_description_box h2 a,
.slideshow_container .slideshow_description_box h3,
.slideshow_container .slideshow_description_box h3 a,
.slideshow_container .slideshow_description_box h4,
.slideshow_container .slideshow_description_box h4 a,
.slideshow_container .slideshow_description_box h5,
.slideshow_container .slideshow_description_box h5 a,
.slideshow_container .slideshow_description_box h6,
.slideshow_container .slideshow_description_box h6 a {
	text-align: center;
	color: #fff;
}
";
		$customStylesOptionsKey = 'slideshow-jquery-image-gallery-custom-styles';

		// Get all custom stylesheet keys
		$customStyles = get_option($customStylesOptionsKey, array());

		if (is_array($customStyles))
		{
			foreach ($customStyles as $customStyleKey => $customStyleValue)
			{
				// Get custom style from custom style key
				$customStyle = get_option($customStyleKey, null);

				if (!isset($customStyle))
				{
					continue;
				}

				$customStyle = str_replace('.slideshow_description', '.slideshow_description_box', $customStyle);

				$customStyle = str_replace('.slideshow_slide_text h2', '.slideshow_slide_text div.slideshow_title', $customStyle);
				$customStyle = str_replace('.slideshow_slide_text p', '.slideshow_slide_text div.slideshow_description', $customStyle);

				$customStyle = str_replace('.slideshow_description_box h2', '.slideshow_description_box div.slideshow_title', $customStyle);
				$customStyle = str_replace('.slideshow_description_box p', '.slideshow_description_box div.slideshow_description', $customStyle);

				$customStyle .= $additionalCSS;

				// Save
				update_option($customStyleKey, $customStyle);
			}
		}

		add_option('slideshow-jquery-image-gallery-updated-from-v2-2-17-to-v2-2-20', 'updated', '', false);
	}

	/**
	 * Version 2.2.16 to 2.2.17
	 *
	 * The 'Zoom to fit' option has been renamed 'Crop to fit'.
	 *
	 * @since 2.2.16
	 */
	private static function updateV2_2_16_to_V_2_2_17()
	{
		// Check if this has already been done
		if (get_option('slideshow-jquery-image-gallery-updated-from-v2-2-16-to-v2-2-17') !== false)
		{
			return;
		}

		// Get slideshows
		$slideshows = get_posts(array(
			'numberposts' => -1,
			'offset'      => 0,
			'post_type'   => 'slideshow'
		));

		// Loop through slideshows
		if (is_array($slideshows) &&
			count($slideshows) > 0)
		{
			foreach ($slideshows as $slideshow)
			{
				// Get settings
				$settings = maybe_unserialize(get_post_meta(
					$slideshow->ID,
					'settings',
					true
				));

				if (isset($settings['imageBehaviour']) &&
					$settings['imageBehaviour'] === 'zoom')
				{
					$settings['imageBehaviour'] = 'crop';
				}

				if (isset($settings['stretchImages']))
				{
					unset($settings['stretchImages']);
				}

				// Update post meta
				update_post_meta(
					$slideshow->ID,
					'settings',
					$settings
				);
			}
		}

		add_option('slideshow-jquery-image-gallery-updated-from-v2-2-16-to-v2-2-17', 'updated', '', false);
	}

	/**
	 * Version 2.2.12 to 2.2.16
	 *
	 * The 'Fit image into slide' setting has been replaced with the 'Image behaviour' setting.
	 *
	 * @since 2.2.16
	 */
	private static function updateV2_2_12_to_V_2_2_16()
	{
		// Check if this has already been done
		if (get_option('slideshow-jquery-image-gallery-updated-from-v2-2-12-to-v2-2-16') !== false)
		{
			return;
		}

		// Get slideshows
		$slideshows = get_posts(array(
			'numberposts' => -1,
			'offset'      => 0,
			'post_type'   => 'slideshow'
		));

		// Loop through slideshows
		if (is_array($slideshows) &&
			count($slideshows) > 0)
		{
			foreach ($slideshows as $slideshow)
			{
				// Get settings
				$settings = maybe_unserialize(get_post_meta(
					$slideshow->ID,
					'settings',
					true
				));

				if (isset($settings['stretchImages']))
				{
					if ($settings['stretchImages'] === 'true')
					{
						$settings['imageBehaviour'] = 'stretch';
					}
					else
					{
						$settings['imageBehaviour'] = 'natural';
					}

					unset($settings['stretchImages']);
				}
				else
				{
					$settings['imageBehaviour'] = 'natural';
				}

				// Update post meta
				update_post_meta(
					$slideshow->ID,
					'settings',
					$settings
				);
			}
		}

		add_option('slideshow-jquery-image-gallery-updated-from-v2-2-12-to-v2-2-16', 'updated', '', false);
	}

	/**
	 * Version 2.2.8 to 2.2.12
	 *
	 * Version 2.2.12 introduces a loading icon to entertain those nice folks while waiting for the first slide to load.
	 * This function puts the CSS for the loading icon into the custom stylesheets.
	 *
	 * @since 2.2.12
	 */
	private static function updateV2_2_8_to_V_2_2_12()
	{
		// Check if this has already been done
		if (get_option('slideshow-jquery-image-gallery-updated-from-v2-2-8-to-v2-2-12') !== false)
		{
			return;
		}

		$customStylesOptionsKey = 'slideshow-jquery-image-gallery-custom-styles';

		// Get all custom stylesheet keys
		$customStyles = get_option($customStylesOptionsKey, array());

		if (is_array($customStyles))
		{
			foreach ($customStyles as $customStyleKey => $customStyleValue)
			{
				// Get custom style from custom style key
				$customStyle = get_option($customStyleKey, null);

				if (!isset($customStyle))
				{
					continue;
				}

				$customStyle .= PHP_EOL . PHP_EOL . '.slideshow_container .slideshow_loading_icon {' . PHP_EOL .
					"\t" . 'position: absolute;' . PHP_EOL .
					"\t" . 'top: 50%;' . PHP_EOL .
					"\t" . 'left: 50%;' . PHP_EOL .
					"\t" . 'width: 32px;' . PHP_EOL .
					"\t" . 'height: 32px;' . PHP_EOL .
					"\t" . 'margin: -16px 0 0 -16px;' . PHP_EOL .
					"\t" . 'background: url(\'%plugin-url%/images/SlideshowPlugin/loading-icon-128x128.gif\') no-repeat;' . PHP_EOL .
					"\t" . 'background-size: 32px 32px;' . PHP_EOL .
				'}';

				// Save
				update_option($customStyleKey, $customStyle);
			}
		}

		add_option('slideshow-jquery-image-gallery-updated-from-v2-2-8-to-v2-2-12', 'updated', '', false);
	}

	/**
	 * Version 2.2.0 to 2.2.8
	 *
	 * In order to output valid HTML, the anchor elements have been moved inside the header and paragraph elements,
	 * rather than wrapping around them. This requires an 'a' to be added to the description classes for the header
	 * and paragraph, which is done here.
	 *
	 * @since 2.2.8
	 */
	private static function updateV2_2_0_to_V_2_2_8()
	{
		// Check if this has already been done
		if (get_option('slideshow-jquery-image-gallery-updated-from-v2-2-0-to-v2-2-8') !== false)
		{
			return;
		}

		$customStylesOptionsKey = 'slideshow-jquery-image-gallery-custom-styles';

		// Get all custom stylesheet keys
		$customStyles = get_option($customStylesOptionsKey, array());
		if (is_array($customStyles))
		{
			foreach ($customStyles as $customStyleKey => $customStyleValue)
			{
				// Get custom style from custom style key
				$customStyle = get_option($customStyleKey, null);

				if (!isset($customStyle))
				{
					continue;
				}

				$h2Class = '.slideshow_container .slideshow_description h2';
				$pClass  = '.slideshow_container .slideshow_description p';

				// Don't add to custom styles that already have this rule
				if (stripos($customStyle, $h2Class . ' a') !== false ||
					stripos($customStyle, $pClass . ' a') !== false)
				{
					continue;
				}

				// Add anchor classes
				$h2Position  = stripos($customStyle, $h2Class) + strlen($h2Class);
				$customStyle = substr($customStyle, 0, $h2Position) . ' a ' . substr($customStyle, $h2Position);

				$pPosition   = stripos($customStyle, $pClass) + strlen($pClass);
				$customStyle = substr($customStyle, 0, $pPosition) . ' a ' . substr($customStyle, $pPosition);

				// Save
				update_option($customStyleKey, $customStyle);
			}
		}

		add_option('slideshow-jquery-image-gallery-updated-from-v2-2-0-to-v2-2-8', 'updated', '', false);
	}

	/**
	 * Version 2.2.0 comes with redesigned stylesheets, which makes the old ones obsolete. Set the style settings for
	 * each slideshow to 'Light', if it's a custom style.
	 *
	 * @since 2.2.0
	 */
	private static function updateV2_1_23_to_V_2_2_0()
	{
		// Check if this has already been done
		if (get_option('slideshow-jquery-image-gallery-updated-from-v2-1-23-to-v2-2-0') !== false)
		{
			return;
		}

		// Get slideshows
		$slideshows = get_posts(array(
			'numberposts' => -1,
			'offset'      => 0,
			'post_type'   => 'slideshow'
		));

		// Loop through slideshows
		if (is_array($slideshows) &&
			count($slideshows) > 0)
		{
			foreach ($slideshows as $slideshow)
			{
				// Get settings
				$styleSettings = maybe_unserialize(get_post_meta(
					$slideshow->ID,
					'styleSettings',
					true
				));

				if (!is_array($styleSettings) || count($styleSettings) <= 0)
				{
					continue;
				}

				// Only set style to the default light style if the style is currently a custom one
				if (isset($styleSettings['style']) &&
					$styleSettings['style'] != 'light' &&
					$styleSettings['style'] != 'dark')
				{
					$styleSettings['style'] = 'light';
				}

				// Delete 'custom' key from array
				unset($styleSettings['custom']);

				// Update post meta
				update_post_meta(
					$slideshow->ID,
					'styleSettings',
					$styleSettings
				);
			}
		}

		add_option('slideshow-jquery-image-gallery-updated-from-v2-1-23-to-v2-2-0', 'updated', '', false);
	}

	/**
	 * Version 2.1.23 introduces shared custom styles. Styles customized by a user need to be converted to a custom
	 * style on the General Settings page.
	 *
	 * @since 2.1.23
	 */
	private static function updateV2_1_20_to_V2_2_1_23()
	{
		// Check if this has already been done
		if (get_option('slideshow-jquery-image-gallery-updated-from-v2-1-20-to-v2-1-23') !== false)
		{
			return;
		}

		// Get slideshows
		$slideshows = get_posts(array(
			'numberposts' => -1,
			'offset'      => 0,
			'post_type'   => 'slideshow'
		));

		// Loop through slideshows
		if (is_array($slideshows) &&
			count($slideshows) > 0)
		{
			foreach ($slideshows as $slideshow)
			{
				// Get settings
				$styleSettings = maybe_unserialize(get_post_meta(
					$slideshow->ID,
					'styleSettings',
					true
				));

				if (!is_array($styleSettings) ||
					count($styleSettings) <= 0)
				{
					continue;
				}

				// Only save custom style when it's the current setting
				if (isset($styleSettings['style']) &&
					$styleSettings['style'] == 'custom' &&
					isset($styleSettings['custom']) &&
					!empty($styleSettings['custom']))
				{
					// Custom style key
					$stylesKey      = 'slideshow-jquery-image-gallery-custom-styles';
					$customStyleKey = $stylesKey . '_' . $slideshow->ID;

					// Add stylesheet to database, continue to next post when failed.
					if (!add_option($customStyleKey, $styleSettings['custom'], '', 'no'))
					{
						continue;
					}

					// Get list of stylesheets to link the new stylesheet to.
					$styleSheets = get_option($stylesKey, array());

					// Stylesheets must be an array
					if (!is_array($styleSheets) ||
						count($styleSheets) <= 0)
					{
						$styleSheets = array();
					}

					// Link new stylesheet to stylesheets array
					$styleSheets[$customStyleKey] = $slideshow->post_title . ' (ID: ' . $slideshow->ID . ')';

					// Update stylesheets array
					update_option($stylesKey, $styleSheets);

					// Set style setting to the custom style's key
					$styleSettings['style'] = $customStyleKey;
				}

				// Delete 'custom' key from array
				unset($styleSettings['custom']);

				// Update post meta
				update_post_meta(
					$slideshow->ID,
					'styleSettings',
					$styleSettings
				);
			}
		}

		add_option('slideshow-jquery-image-gallery-updated-from-v2-1-20-to-v2-1-23', 'updated', '', false);
	}

	/**
	 * Sets capabilities for the default users that have access to creating, updating and deleting slideshows.
	 *
	 * @since 2.1.22
	 */
	private static function setCapabilities()
	{
		// Check if update has already been done
		if (get_option('slideshow-jquery-image-gallery-updated-from-v2-1-20-to-v2-1-22') !== false)
		{
			return;
		}

		// Capabilities
		$addSlideshows   = 'slideshow-jquery-image-gallery-add-slideshows';
		$editSlideshows  = 'slideshow-jquery-image-gallery-edit-slideshows';
		$deleteSlideshow = 'slideshow-jquery-image-gallery-delete-slideshows';

		// Add capabilities to roles
		$roles = array('administrator', 'editor', 'author');

		foreach ($roles as $roleName)
		{
			// Get role
			$role = get_role($roleName);

			// Continue on non-existent role
			if ($role == null)
			{
				continue;
			}

			// Add capability to role
			$role->add_cap($addSlideshows);
			$role->add_cap($editSlideshows);
			$role->add_cap($deleteSlideshow);
		}

		// Register as updated
		add_option('slideshow-jquery-image-gallery-updated-from-v2-1-20-to-v2-1-22', 'updated', '', false);
	}

	/**
	 * Updates v2 to the 2.1.20 settings storage system,
	 * which uses three post-meta values instead of one.
	 *
	 * @since 2.1.20
	 */
	private static function updateV2toV2_1_20()
	{
		// Check if this has already been done
		if (get_option('slideshow-plugin-updated-from-v2-to-v2-1-20') !== false)
		{
			return;
		}

		// Get slideshows
		$slideshows = get_posts(array(
			'numberposts' => -1,
			'offset'      => 0,
			'post_type'   => 'slideshow'
		));

		// Loop through slideshows
		if (is_array($slideshows) &&
			count($slideshows) > 0)
		{
			foreach ($slideshows as $slideshow)
			{
				// Get settings
				$settings = maybe_unserialize(get_post_meta(
					$slideshow->ID,
					'settings',
					true
				));

				if (!is_array($settings) ||
					count($settings) <= 0)
				{
					continue;
				}

				// Old prefixes
				$settingsPrefix = 'setting_';
				$stylePrefix    = 'style_';
				$slidePrefix    = 'slide_';

				// Meta keys
				$settingsKey      = 'settings';
				$styleSettingsKey = 'styleSettings';
				$slidesKey        = 'slides';

				// Extract key => value into new arrays
				$newSettings   = array();
				$styleSettings = array();
				$slides        = array();

				foreach ($settings as $key => $value)
				{
					if ($settingsPrefix == substr($key, 0, strlen($settingsPrefix)))
					{
						$newSettings[substr($key, strlen($settingsPrefix))] = $value;
					}
					elseif ($stylePrefix == substr($key, 0, strlen($stylePrefix)))
					{
						$styleSettings[substr($key, strlen($stylePrefix))] = $value;
					}
					elseif ($slidePrefix == substr($key, 0, strlen($slidePrefix)))
					{
						$slides[substr($key, strlen($slidePrefix))] = $value;
					}
				}

				// Slides are prefixed with another prefix, their order ID. All settings of one slide should go into an
				// array referenced by their order ID. Create order lookup array below, then order slides accordingly
				$slidesOrderLookup = array();

				foreach ($slides as $key => $value)
				{
					$key = explode('_', $key);

					if ($key[1] == 'order')
					{
						$slidesOrderLookup[$value] = $key[0];
					}
				}

				// Order slides with order lookup array
				$orderedSlides = array();

				foreach ($slides as $key => $value)
				{
					$key = explode('_', $key);

					foreach ($slidesOrderLookup as $order => $id)
					{
						if ($key[0] == $id)
						{
							// Create array if slot is empty
							if (!isset($orderedSlides[$order]) ||
								!is_array($orderedSlides[$order]))
							{
								$orderedSlides[$order] = array();
							}

							// Add slide value to array
							$orderedSlides[$order][$key[1]] = $value;

							// Slide ID found and value placed in correct order slot, break to next $value
							break;
						}
					}
				}

				// Update post meta
				update_post_meta($slideshow->ID, $settingsKey, $newSettings);
				update_post_meta($slideshow->ID, $styleSettingsKey, $styleSettings);
				update_post_meta($slideshow->ID, $slidesKey, $orderedSlides);
			}
		}

		add_option('slideshow-plugin-updated-from-v2-to-v2-1-20', 'updated', '', false);
	}

	/**
	 * Updates v1 slides to the V2 slide format
	 * Slides are no longer attachments, convert attachments to post-meta.
	 *
	 * @since 2.0.1
	 */
	private static function updateV1toV2()
	{
		// Check if this has already been done
		if (get_option('slideshow-plugin-updated-from-v1-x-x-to-v2-0-1') !== false)
		{
			return;
		}

		// Get posts
		$posts = get_posts(array(
			'numberposts' => -1,
			'offset'      => 0,
			'post_type'   => 'slideshow'
		));

		// Loop through posts
		foreach ($posts as $post)
		{
			// Stores highest slide id.
			$highestSlideId = -1;

			// Defaults
			$defaultData = $data = array(
				'style_style' => 'light',
				'style_custom' => '',
				'setting_animation' => 'slide',
				'setting_slideSpeed' => '1',
				'setting_descriptionSpeed' => '0.4',
				'setting_intervalSpeed' => '5',
				'setting_play' => 'true',
				'setting_loop' => 'true',
				'setting_slidesPerView' => '1',
				'setting_width' => '0',
				'setting_height' => '200',
				'setting_descriptionHeight' => '50',
				'setting_stretchImages' => 'true',
				'setting_controllable' => 'true',
				'setting_controlPanel' => 'false',
				'setting_showDescription' => 'true',
				'setting_hideDescription' => 'true'
			);

			$yes = __('Yes', 'slideshow-plugin');
			$no = __('No', 'slideshow-plugin');
			$data = array( // $data : array([prefix_settingName] => array([inputType], [value], [default], [description], array([options]), array([dependsOn], [onValue]), 'group' => [groupName]))
				'style_style' => array('select', '', $defaultData['style_style'], __('The style used for this slideshow', 'slideshow-plugin'), array('light' => __('Light', 'slideshow-plugin'), 'dark' => __('Dark', 'slideshow-plugin'), 'custom' => __('Custom', 'slideshow-plugin'))),
				'style_custom' => array('textarea', '', $defaultData['style_custom'], __('Custom style editor', 'slideshow-plugin'), null, array('style_style', 'custom')),
				'setting_animation' => array('select', '', $defaultData['setting_animation'], __('Animation used for transition between slides', 'slideshow-plugin'), array('slide' => __('Slide', 'slideshow-plugin'), 'fade' => __('Fade', 'slideshow-plugin')), 'group' => __('Animation', 'slideshow-plugin')),
				'setting_slideSpeed' => array('text', '', $defaultData['setting_slideSpeed'], __('Number of seconds the slide takes to slide in', 'slideshow-plugin'), 'group' => __('Animation', 'slideshow-plugin')),
				'setting_descriptionSpeed' => array('text', '', $defaultData['setting_descriptionSpeed'], __('Number of seconds the description takes to slide in', 'slideshow-plugin'), 'group' => __('Animation', 'slideshow-plugin')),
				'setting_intervalSpeed' => array('text', '', $defaultData['setting_intervalSpeed'], __('Seconds between changing slides', 'slideshow-plugin'), 'group' => __('Animation', 'slideshow-plugin')),
				'setting_slidesPerView' => array('text', '', $defaultData['setting_slidesPerView'], __('Number of slides to fit into one slide', 'slideshow-plugin'), 'group' => __('Display', 'slideshow-plugin')),
				'setting_width' => array('text', '', $defaultData['setting_width'], __('Width of the slideshow, set to parent&#39;s width on 0', 'slideshow-plugin'), 'group' => __('Display', 'slideshow-plugin')),
				'setting_height' => array('text', '', $defaultData['setting_height'], __('Height of the slideshow', 'slideshow-plugin'), 'group' => __('Display', 'slideshow-plugin')),
				'setting_descriptionHeight' => array('text', '', $defaultData['setting_descriptionHeight'], __('Height of the description boxes', 'slideshow-plugin'), 'group' => __('Display', 'slideshow-plugin')),
				'setting_stretchImages' => array('radio', '', $defaultData['setting_stretchImages'], __('Fit image into slide (stretching it)', 'slideshow-plugin'), array('true' => $yes, 'false' => $no), 'group' => __('Display', 'slideshow-plugin')),
				'setting_showDescription' => array('radio', '', $defaultData['setting_showDescription'], __('Show title and description', 'slideshow-plugin'), array('true' => $yes, 'false' => $no), 'group' => __('Display', 'slideshow-plugin')),
				'setting_hideDescription' => array('radio', '', $defaultData['setting_hideDescription'], __('Hide description box, it will pop up when a mouse hovers over the slide', 'slideshow-plugin'), array('true' => $yes, 'false' => $no), array('setting_showDescription', 'true'), 'group' => __('Display', 'slideshow-plugin')),
				'setting_play' => array('radio', '', $defaultData['setting_play'], __('Automatically slide to the next slide', 'slideshow-plugin'), array('true' => $yes, 'false' => $no), 'group' => __('Control', 'slideshow-plugin')),
				'setting_loop' => array('radio', '', $defaultData['setting_loop'], __('Return to the beginning of the slideshow after last slide', 'slideshow-plugin'), array('true' => $yes, 'false' => $no), 'group' => __('Control', 'slideshow-plugin')),
				'setting_controllable' => array('radio', '', $defaultData['setting_controllable'], __('Activate buttons (so the user can scroll through the slides)', 'slideshow-plugin'), array('true' => $yes, 'false' => $no), 'group' => __('Control', 'slideshow-plugin')),
				'setting_controlPanel' => array('radio', '', $defaultData['setting_controlPanel'], __('Show control panel (play and pause button)', 'slideshow-plugin'), array('true' => $yes, 'false' => $no), 'group' => __('Control', 'slideshow-plugin')),
			);

			// Get settings
			$currentSettings = get_post_meta(
				$post->ID,
				'settings',
				true
			);

			// Fill data with settings
			foreach ($data as $key => $value)
			{
				if (isset($currentSettings[$key]))
				{
					$data[$key][1] = $currentSettings[$key];

					unset($currentSettings[$key]);
				}
			}

			// Load settings that are not there by default into data (slides in particular)
			foreach ($currentSettings as $key => $value)
			{
				if (!isset($data[$key]))
				{
					$data[$key] = $value;
				}
			}

			// Settings
			$settings = $data;

			// Filter slides
			$prefix = 'slide_';

			foreach ($settings as $key => $value)
			{
				if ($prefix != substr($key, 0, strlen($prefix)))
				{
					unset($settings[$key]);
				}
			}

			// Convert slide settings to array([slide-key] => array([setting-name] => [value]));
			$slidesPreOrder = array();

			foreach ($settings as $key => $value)
			{
				$key = explode('_', $key);

				if (is_numeric($key[1]))
				{
					$slidesPreOrder[$key[1]][$key[2]] = $value;
				}
			}

			// Save slide keys from the $slidePreOrder array in the array itself for later use
			foreach ($slidesPreOrder as $key => $value)
			{
				// Save highest slide id
				if($key > $highestSlideId)
				{
					$highestSlideId = $key;
				}
			}

			// Get old data
			$oldData = get_post_meta($post->ID, 'settings', true);

			if(!is_array(($oldData)))
			{
				$oldData = array();
			}

			// Get attachments
			$attachments = get_posts(array(
				'numberposts' => -1,
				'offset'      => 0,
				'post_type'   => 'attachment',
				'post_parent' => $post->ID
			));

			// Get data from attachments
			$newData = array();

			foreach ($attachments as $attachment)
			{
				$highestSlideId++;
				$newData['slide_' . $highestSlideId . '_postId'] = $attachment->ID;
				$newData['slide_' . $highestSlideId . '_type'] = 'attachment';
			}

			// Save settings
			update_post_meta(
				$post->ID,
				'settings',
				array_merge(
					$defaultData,
					$oldData,
					$newData
				)
			);
		}

		add_option('slideshow-plugin-updated-from-v1-x-x-to-v2-0-1', 'updated', '', false);
	}

	/**
	 * Checks if the version input first is greater than the version input second.
	 *
	 * Version numbers are noted as such: x.x.x
	 *
	 * @since 2.1.22
	 * @param String $firstVersion
	 * @param String $secondVersion
	 * @return boolean $firstGreaterThanSecond
	 */
	private static function firstVersionGreaterThanSecond($firstVersion, $secondVersion)
	{
		// Return false if $firstVersion is not set
		if (empty($firstVersion) ||
			!is_string($firstVersion))
		{
			return false;
		}

		// Return true if $secondVersion is not set
		if (empty($secondVersion) ||
			!is_string($secondVersion))
		{
			return true;
		}

		// Separate main, sub and bug-fix version number from one another.
		$firstVersion  = explode('.', $firstVersion);
		$secondVersion = explode('.', $secondVersion);

		// Compare version numbers per piece
		for ($i = 0; $i < count($firstVersion); $i++)
		{
			if (isset($firstVersion[$i], $secondVersion[$i]))
			{
				if ($firstVersion[$i] > $secondVersion[$i])
				{
					return true;
				}
				elseif ($firstVersion[$i] < $secondVersion[$i])
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}

		// Return false by default
		return false;
	}
}