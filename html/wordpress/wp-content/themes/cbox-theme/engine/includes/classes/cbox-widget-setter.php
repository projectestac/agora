<?php

/**
 * Utility class for dealing with sidebar widgets
 */
class CBox_Widget_Setter {
	public static function set_widget( $args ) {
		$r = wp_parse_args( $args, array(
			'id_base' => '',
			'sidebar_id' => '',
			'settings' => array(),
		) );

		$id_base    = $r['id_base'];
		$sidebar_id = $r['sidebar_id'];
		$settings   = (array) $r['settings'];

		// Don't try to set a widget if it hasn't been registered
		if ( ! self::widget_exists( $id_base ) ) {
			return new WP_Error( 'widget_does_not_exist', 'Widget does not exist' );
		}

		global $wp_registered_sidebars;
		if ( ! isset( $wp_registered_sidebars[ $sidebar_id ] ) ) {
			return new WP_Error( 'sidebar_does_not_exist', 'Sidebar does not exist' );
		}

		$sidebars = wp_get_sidebars_widgets();
		$sidebar = (array) $sidebars[ $sidebar_id ];

		// Multi-widgets can only be detected by looking at their settings
		$option_name  = 'widget_' . $id_base;

		// Don't let it get pulled from the cache
		wp_cache_delete( $option_name, 'options' );
		$all_settings = get_option( $option_name );

		if ( is_array( $all_settings ) ) {
			$skeys = array_keys( $all_settings );

			// Find the highest numeric key
			rsort( $skeys );

			foreach ( $skeys as $k ) {
				if ( is_numeric( $k ) ) {
					$multi_number = $k + 1;
					break;
				}
			}

			if ( ! isset( $multi_number ) ) {
				$multi_number = 1;
			}

			$all_settings[ $multi_number ] = $settings;
			//$all_settings = array( $multi_number => $settings );
		} else {
			$multi_number = 1;
			$all_settings = array( $multi_number => $settings );
		}

		$widget_id = $id_base . '-' . $multi_number;
		$sidebar[] = $widget_id;

		// Because of the way WP_Widget::update_callback() works, gotta fake the $_POST
		$_POST['widget-' . $id_base] = $all_settings;

		global $wp_registered_widget_updates, $wp_registered_widget_controls;
		foreach ( (array) $wp_registered_widget_updates as $name => $control ) {

			if ( $name == $id_base ) {
				if ( !is_callable( $control['callback'] ) )
					continue;

				ob_start();
					call_user_func_array( $control['callback'], $control['params'] );
				ob_end_clean();
				break;
			}
		}

		$sidebars[ $sidebar_id ] = $sidebar;
		wp_set_sidebars_widgets( $sidebars );

		update_option( $option_name, $all_settings );
	}

	/**
	 * Checks to see whether a sidebar is already populated
	 */
	public static function is_sidebar_populated( $sidebar_id ) {
		$sidebars = wp_get_sidebars_widgets();
		return ! empty( $sidebars[ $sidebar_id ] );
	}

	/**
	 * Moves all active widgets from a given sidebar into the inactive array
	 */
	public static function clear_sidebar( $sidebar_id, $delete_to = 'inactive' ) {
		$sidebars = wp_get_sidebars_widgets();
		if ( ! isset( $sidebars[ $sidebar_id ] ) ) {
			return new WP_Error( 'sidebar_does_not_exist', 'Sidebar does not exist' );
		}

		if ( 'inactive' == $delete_to ) {
			$sidebars['wp_inactive_widgets'] = array_unique( array_merge( $sidebars['wp_inactive_widgets'], $sidebars[ $sidebar_id ] ) );
		}

		$sidebars[ $sidebar_id ] = array();
		wp_set_sidebars_widgets( $sidebars );
	}

	/**
	 * Check to see whether a widget has been registered
	 *
	 * @param string $id_base
	 * @return bool
	 */
	public static function widget_exists( $id_base ) {
		global $wp_widget_factory;

		foreach ( $wp_widget_factory->widgets as $w ) {
			if ( $id_base == $w->id_base ) {
				return true;
			}
		}

		return false;
	}
}
