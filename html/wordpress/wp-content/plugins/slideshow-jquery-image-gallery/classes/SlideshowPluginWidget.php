<?php
/**
 * Class SlideshowPluginWidget allows showing one of your slideshows in your widget area.
 *
 * @since 1.2.0
 * @author: Stefan Boonstra
 */
class SlideshowPluginWidget extends WP_Widget
{
	/** @var string $widgetName */
	static $widgetName = 'Slideshow';

	/**
	 * Initializes the widget
	 *
	 * @since 1.2.0
	 */
	function SlideshowPluginWidget()
	{
		// Settings
		$options = array(
			'classname'   => 'SlideshowWidget',
			'description' => __('Enables you to show your slideshows in the widget area of your website.', 'slideshow-plugin')
		);

		// Create the widget.
		$this->WP_Widget(
			'slideshowWidget',
			__('Slideshow Widget', 'slideshow-plugin'),
			$options
		);
	}

	/**
	 * The widget as shown to the user.
	 *
	 * @since 1.2.0
	 * @param mixed array $args
	 * @param mixed array $instance
	 */
	function widget($args, $instance)
	{
		// Get slideshowId
		$slideshowId = '';
		if (isset($instance['slideshowId']))
		{
			$slideshowId = $instance['slideshowId'];
		}

		// Get title
		$title = '';
		if (isset($instance['title']))
		{
			$title = $instance['title'];
		}

		// Prepare slideshow for output to website.
		$output = SlideshowPlugin::prepare($slideshowId);

		$beforeWidget = $afterWidget = $beforeTitle = $afterTitle = '';
		if (isset($args['before_widget']))
		{
			$beforeWidget = $args['before_widget'];
		}

		if (isset($args['after_widget']))
		{
			$afterWidget = $args['after_widget'];
		}

		if (isset($args['before_title']))
		{
			$beforeTitle = $args['before_title'];
		}

		if (isset($args['after_title']))
		{
			$afterTitle = $args['after_title'];
		}

		// Output widget
		echo $beforeWidget . (!empty($title) ? $beforeTitle . $title . $afterTitle : '') . $output . $afterWidget;
	}

	/**
	 * The form shown on the admins widget page. Here settings can be changed.
	 *
	 * @since 1.2.0
	 * @param mixed array $instance
	 * @return string
	 */
	function form($instance)
	{
		// Defaults
		$defaults = array(
			'title'       => __(self::$widgetName, 'slideshow-plugin'),
			'slideshowId' => -1
		);

		// Merge database settings with defaults
		$instance = wp_parse_args((array) $instance, $defaults);

		// Get slideshows
		$slideshows = get_posts(array(
			'numberposts' => -1,
			'offset'      => 0,
			'post_type'   => SlideshowPluginPostType::$postType
		));

		// Include form
		include(SlideshowPluginMain::getPluginPath() . '/views/' . __CLASS__ . '/form.php');
	}

	/**
	 * Updates widget's settings.
	 *
	 * @since 1.2.0
	 * @param mixed array $newInstance
	 * @param mixed array $instance
	 * @return mixed array $instance
	 */
	function update($newInstance, $instance)
	{
		// Update title
		if (isset($newInstance['title']))
		{
			$instance['title'] = $newInstance['title'];
		}

		// Update slideshowId
		if (isset($newInstance['slideshowId']) &&
			!empty($newInstance['slideshowId']))
		{
			$instance['slideshowId'] = $newInstance['slideshowId'];
		}

		// Save
		return $instance;
	}

	/**
	 * Registers this widget (should be called upon widget_init action hook)
	 *
	 * @since 1.2.0
	 */
	static function registerWidget()
	{
		register_widget(__CLASS__);
	}
}