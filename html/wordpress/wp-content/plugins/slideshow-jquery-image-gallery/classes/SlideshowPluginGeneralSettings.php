<?php
/**
 * SlideshowPluginGeneralSettings provides a sub menu page for the slideshow post type. The general settings page is
 * the page that holds most of the slideshow's overall settings, such as user capabilities and slideshow defaults.
 *
 * @since 2.1.22
 * @author Stefan Boonstra
 */
class SlideshowPluginGeneralSettings
{
	/** @var bool $isCurrentPage Flag that represents whether or not the general settings page is the current page */
	static $isCurrentPage = false;

	/** @var string $settingsGroup Settings group */
	static $settingsGroup = 'slideshow-jquery-image-gallery-general-settings';

	/** @var string $stylesheetLocation General settings */
	static $stylesheetLocation = 'slideshow-jquery-image-gallery-stylesheet-location';

	/** @var array $capabilities User capability settings */
	static $capabilities = array(
		'addSlideshows'    => 'slideshow-jquery-image-gallery-add-slideshows',
		'editSlideshows'   => 'slideshow-jquery-image-gallery-edit-slideshows',
		'deleteSlideshows' => 'slideshow-jquery-image-gallery-delete-slideshows'
	);

	/** @var string $defaultSettings */
	static $defaultSettings = 'slideshow-jquery-image-gallery-default-settings';
	/** @var string $defaultStyleSettings */
	static $defaultStyleSettings = 'slideshow-jquery-image-gallery-default-style-settings';

	/** @var string $customStyles List of pointers to custom style options */
	static $customStyles = 'slideshow-jquery-image-gallery-custom-styles';

	/**
	 * Initializes the slideshow post type's general settings.
	 *
	 * @since 2.1.22
	 */
	static function init()
	{
		// Only initialize in admin
		if (!is_admin())
		{
			return;
		}

		if (isset($_GET['post_type']) &&
			$_GET['post_type'] == 'slideshow' &&
			isset($_GET['page']) &&
			$_GET['page'] == 'general_settings')
		{
			self::$isCurrentPage = true;
		}

		// Register settings
		add_action('admin_init', array(__CLASS__, 'registerSettings'));

		// Add sub menu
		add_action('admin_menu', array(__CLASS__, 'addSubMenuPage'));

		// Localize
		add_action('admin_enqueue_scripts', array(__CLASS__, 'localizeScript'), 11);
	}

	/**
	 * Adds a sub menu page to the slideshow post type menu.
	 *
	 * @since 2.1.22
	 */
	static function addSubMenuPage()
	{
		// Return if the slideshow post type does not exist
		if(!post_type_exists(SlideshowPluginPostType::$postType))
		{
			return;
		}

		// Add sub menu
		add_submenu_page(
			'edit.php?post_type=' . SlideshowPluginPostType::$postType,
			__('General Settings', 'slideshow-plugin'),
			__('General Settings', 'slideshow-plugin'),
			'manage_options',
			'general_settings',
			array(__CLASS__, 'generalSettings')
		);
	}

	/**
	 * Shows the general settings page.
	 *
	 * @since 2.1.22
	 */
	static function generalSettings()
	{
		// Include general settings page
		include SlideshowPluginMain::getPluginPath() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . __CLASS__ . DIRECTORY_SEPARATOR . 'general-settings.php';
	}

	/**
	 * Registers required settings into the WordPress settings API.
	 * Only performed when actually on the general settings page.
	 *
	 * @since 2.1.22
	 */
	static function registerSettings()
	{
		// Register settings only when the user is going through the options.php page
		$urlParts = explode('/', $_SERVER['PHP_SELF']);

		if (array_pop($urlParts) != 'options.php')
		{
			return;
		}

		// Register general settings
		register_setting(self::$settingsGroup, self::$stylesheetLocation);

		// Register user capability settings, saving capabilities only has to be called once.
		register_setting(self::$settingsGroup, self::$capabilities['addSlideshows']);
		register_setting(self::$settingsGroup, self::$capabilities['editSlideshows']);
		register_setting(self::$settingsGroup, self::$capabilities['deleteSlideshows'], array(__CLASS__, 'saveCapabilities'));

		// Register default slideshow settings
		register_setting(self::$settingsGroup, self::$defaultSettings);
		register_setting(self::$settingsGroup, self::$defaultStyleSettings);

		// Register custom style settings
		register_setting(self::$settingsGroup, self::$customStyles, array(__CLASS__, 'saveCustomStyles'));
	}

	/**
	 * Localizes the general settings script. Needs to be called on the 'admin_enqueue_scripts' hook.
	 */
	static function localizeScript()
	{
		if (!self::$isCurrentPage)
		{
			return;
		}

		// Localize general settings script
		wp_localize_script(
			'slideshow-jquery-image-gallery-backend-script',
			'slideshow_jquery_image_gallery_backend_script_generalSettings',
			array(
				'data'         => array('customStylesKey' => self::$customStyles),
				'localization' => array(
					'newCustomizationPrefix' => __('New', 'slideshow-plugin'),
					'confirmDeleteMessage'   => __('Are you sure you want to delete this custom style?', 'slideshow-plugin')
				)
			)
		);
	}

	/**
	 * Returns the stylesheet location, or 'footer' when no stylesheet position has been defined yet.
	 *
	 * @since 2.2.12
	 * @return string $stylesheetLocation
	 */
	public static function getStylesheetLocation()
	{
		return get_option(SlideshowPluginGeneralSettings::$stylesheetLocation, 'footer');
	}

	/**
	 * Returns an array of stylesheets with its keys and respective names.
	 *
	 * Gets the version number for each stylesheet when $withVersion is set to true.
	 *
	 * When the $separateDefaultFromCustom boolean is set to true, the default stylesheets will be returned separately
	 * from the custom stylesheets.
	 *
	 * The data returned with both parameters set to 'false' will look like the following:
	 *
	 * [$stylesheetKey => $stylesheetName]
	 *
	 * With both parameters set to 'true' the returned data will be formed like this:
	 *
	 * [
	 *  default => [$stylesheetKey => [name => $stylesheetName, version => $versionNumber]],
	 *  custom => [$stylesheetKey => [name => $stylesheetName, version => $versionNumber]]
	 * ]
	 *
	 * @since 2.1.23
	 * @param boolean $withVersion (optional, defaults to false)
	 * @param boolean $separateDefaultFromCustom (optional, defaults to false)
	 * @return array $stylesheets
	 */
	static function getStylesheets($withVersion = false, $separateDefaultFromCustom = false)
	{
		// Default styles
		$defaultStyles = array(
			'style-light.css' => __('Light', 'slideshow-plugin'),
			'style-dark.css'  => __('Dark', 'slideshow-plugin')
		);

		// Loop through default stylesheets
		$stylesheetsFilePath = SlideshowPluginMain::getPluginPath() . DIRECTORY_SEPARATOR . 'style' . DIRECTORY_SEPARATOR . 'SlideshowPlugin';

		foreach ($defaultStyles as $fileName => $name)
		{
			// Check if stylesheet exists on server, don't offer it when it does not exist.
			if (!file_exists($stylesheetsFilePath . DIRECTORY_SEPARATOR . $fileName))
			{
				unset($defaultStyles[$fileName]);

				continue;
			}

			// Add version if $withVersion is true
			if($withVersion)
			{
				$defaultStyles[$fileName] = array('name' => $name, 'version' => SlideshowPluginMain::$version);
			}
		}

		// Get custom styles
		$customStyles = get_option(SlideshowPluginGeneralSettings::$customStyles, array());

		// Add version to the custom styles if $withVersion is true
		if ($withVersion)
		{
			foreach ($customStyles as $customStylesKey => $customStylesName)
			{
				$customStylesVersion = get_option($customStylesKey . '_version', false);

				if (!$customStylesVersion)
				{
					$customStylesVersion = time();
				}

				$customStyles[$customStylesKey] = array('name' => $customStylesName, 'version' => $customStylesVersion);
			}
		}

		// Return
		if ($separateDefaultFromCustom)
		{
			return array(
				'default' => $defaultStyles,
				'custom' => $customStyles
			);
		}

		return array_merge(
			$defaultStyles,
			$customStyles
		);
	}

	/**
	 * Saves capabilities, called by a callback from a registered capability setting
	 *
	 * @since 2.1.23
	 * @param String $capability
	 * @return String $capability
	 */
	static function saveCapabilities($capability)
	{
		// Verify nonce
		$nonce = isset($_POST['_wpnonce']) ? $_POST['_wpnonce'] : '';

		if (!wp_verify_nonce($nonce, self::$settingsGroup . '-options'))
		{
			return $capability;
		}

		// Roles
		global $wp_roles;

		// Loop through available user roles
		foreach ($wp_roles->roles as $roleSlug => $roleValues)
		{
			// Continue when the capabilities are either not set or are no array
			if (!is_array($roleValues) ||
				!isset($roleValues['capabilities']) ||
				!is_array($roleValues['capabilities']))
			{
				continue;
			}

			// Get role
			$role = get_role($roleSlug);

			// Continue when role is not set
			if ($role == null)
			{
				continue;
			}

			// Loop through available capabilities
			foreach (self::$capabilities as $capabilitySlug)
			{
				// If $roleSlug is present in $_POST's capability, add the capability to the role, otherwise remove the capability from the role.
				if ((isset($_POST[$capabilitySlug]) && is_array($_POST[$capabilitySlug]) && array_key_exists($roleSlug, $_POST[$capabilitySlug])) ||
					$roleSlug == 'administrator')
				{
					$role->add_cap($capabilitySlug);
				}
				else
				{
					$role->remove_cap($capabilitySlug);
				}
			}
		}

		return $capability;
	}

	/**
	 * Saves custom styles, called by a callback from a registered custom styles setting
	 *
	 * @since 2.1.23
	 * @param array $customStyles
	 * @return array $newCustomStyles
	 */
	static function saveCustomStyles($customStyles)
	{
		// Verify nonce
		$nonce = isset($_POST['_wpnonce']) ? $_POST['_wpnonce'] : '';

		if (!wp_verify_nonce($nonce, self::$settingsGroup . '-options'))
		{
			return $customStyles;
		}

		// Remove custom styles that have been deleted
		$oldCustomStyles = get_option(self::$customStyles, array());

		if (is_array($oldCustomStyles))
		{
			foreach ($oldCustomStyles as $oldCustomStyleKey => $oldCustomStyleValue)
			{
				// Delete option from database if it no longer exists
				if (!array_key_exists($oldCustomStyleKey, $customStyles))
				{
					delete_option($oldCustomStyleKey);
				}
			}
		}

		// Loop through new custom styles
		$newCustomStyles = array();

		if (is_array($customStyles))
		{
			foreach ($customStyles as $customStyleKey => $customStyleValue)
			{
				// Put custom style key and name into the $newCustomStyle array
				$newCustomStyles[$customStyleKey] = isset($customStyleValue['title']) ? $customStyleValue['title'] : __('Untitled', 'slideshow-plugin');

				// Get style
				$newStyle = isset($customStyleValue['style']) ? $customStyleValue['style'] : '';

				// Create or update new custom style
				$oldStyle = get_option($customStyleKey, false);

				if ($oldStyle)
				{
					// Check if style has changed
					if ($oldStyle !== $newStyle)
					{
						update_option($customStyleKey, $newStyle);
						update_option($customStyleKey . '_version', time());
					}
				}
				else
				{
					// The custom style itself shouldn't be auto-loaded, it's never used within WordPress
					add_option($customStyleKey, $newStyle, '', 'no');
					add_option($customStyleKey . '_version', time());
				}
			}
		}

		// Return
		return $newCustomStyles;
	}
}