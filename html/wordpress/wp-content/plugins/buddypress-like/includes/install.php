<?php

/**
 * bp_like_install()
 *
 * Installs or upgrades the database content
 *
 */
function bp_like_install() {

		$default_text_strings = array(
			'like' => array(
				'default'	=> __('Like', 'buddypress-like'), 
				'custom'	=> __('Like', 'buddypress-like')
			),
			'unlike' => array(
				'default'	=> __('Unlike', 'buddypress-like'),
				'custom'	=> __('Unlike', 'buddypress-like')
			),
			'like_this_item' => array(
				'default'	=> __('Like this item', 'buddypress-like'),
				'custom'	=> __('Like this item', 'buddypress-like')
			),
			'unlike_this_item' => array(
				'default'	=> __('Unlike this item', 'buddypress-like'),
				'custom'	=> __('Unlike this item', 'buddypress-like')
			),
			'view_likes' => array(
				'default'	=> __('View likes', 'buddypress-like'),
				'custom'	=> __('View likes', 'buddypress-like')
			),
			'hide_likes' => array(
				'default'	=> __('Hide likes', 'buddypress-like'),
				'custom'	=> __('Hide likes', 'buddypress-like')
			),
			'show_activity_likes' => array(
				'default'	=> __('Show Activity Likes', 'buddypress-like'),
				'custom'	=> __('Show Activity Likes', 'buddypress-like')
			),
			'show_blogpost_likes' => array(
				'default'	=> __('Show Blog Post Likes', 'buddypress-like'),
				'custom'	=> __('Show Blog Post Likes', 'buddypress-like')
			),
			'must_be_logged_in' => array(
				'default'	=> __('Sorry, you must be logged in to like that.', 'buddypress-like'),
				'custom'	=> __('Sorry, you must be logged in to like that.', 'buddypress-like')),
			'record_activity_likes_own' => array(
				'default'	=> __('%user% likes their own <a href="%permalink%">activity</a>', 'buddypress-like'),
				'custom'	=> __('%user% likes their own <a href="%permalink%">activity</a>', 'buddypress-like')
			),
			'record_activity_likes_an' => array(
				'default'	=> __('%user% likes an <a href="%permalink%">activity</a>', 'buddypress-like'),
				'custom'	=> __('%user% likes an <a href="%permalink%">activity</a>', 'buddypress-like')
			),
			'record_activity_likes_users' => array(
				'default'	=> __('%user% likes %author%\'s <a href="%permalink%">activity</a>', 'buddypress-like'),
				'custom'	=> __('%user% likes %author%\'s <a href="%permalink%">activity</a>', 'buddypress-like')
			),
			'record_activity_likes_own_blogpost' => array(
				'default'	=> __('%user% likes their own blog post, <a href="%permalink%">%title%</a>', 'buddypress-like'),
				'custom'	=> __('%user% likes their own blog post, <a href="%permalink%">%title%</a>', 'buddypress-like')
			),
			'record_activity_likes_a_blogpost' => array(
				'default'	=> __('%user% likes a blog post, <a href="%permalink%">%title%</a>', 'buddypress-like'),
				'custom'	=> __('%user% likes an blog post, <a href="%permalink%">%title%</a>', 'buddypress-like')
			),
			'record_activity_likes_users_blogpost' => array(
				'default'	=> __('%user% likes %author%\'s blog post, <a href="%permalink%">%title%</a>', 'buddypress-like'),
				'custom'	=> __('%user% likes %author%\'s blog post, <a href="%permalink%">%title%</a>', 'buddypress-like')
			),
			'get_likes_no_likes' => array(
				'default'	=> __('Nobody likes this yet.', 'buddypress-like'),
				'custom'	=> __('Nobody likes this yet.', 'buddypress-like')
			),
			'get_likes_only_liker' => array(
				'default'	=> __('You are the only person who likes this so far.', 'buddypress-like'),
				'custom'	=> __('You are the only person who likes this so far.', 'buddypress-like')
			),
			'get_likes_you_and_singular' => array(
				'default'	=> __('You and %count% other person like this.', 'buddypress-like'),
				'custom'	=> __('You and %count% other person like this.', 'buddypress-like')
			),
			'get_likes_you_and_plural' => array(
				'default'	=> __('You and %count% other people like this', 'buddypress-like'),
				'custom'	=> __('You and %count% other people like this', 'buddypress-like')
			),
			'get_likes_count_people_singular' => array(
				'default'	=> __('%count% person likes this.', 'buddypress-like'),
				'custom'	=> __('%count% person likes this.', 'buddypress-like')
			),
			'get_likes_count_people_plural' => array(
				'default'	=> __('%count% people like this.', 'buddypress-like'),
				'custom'	=> __('%count% people like this.', 'buddypress-like')
			),
			'get_likes_and_people_singular' => array(
				'default'	=> __('and %count% other person like this.', 'buddypress-like'),
				'custom'	=> __('and %count% other person like this.', 'buddypress-like')
			),
			'get_likes_and_people_plural' => array(
				'default'	=> __('and %count% other people like this.', 'buddypress-like'),
				'custom'	=> __('and %count% other people like this.', 'buddypress-like')
			),
			'get_likes_likes_this' => array(
				'default'	=> __('likes this.', 'buddypress-like'),
				'custom'	=> __('likes this.', 'buddypress-like')
			),
			'get_likes_like_this' => array(
				'default'	=> __('like this.', 'buddypress-like'),
				'custom'	=> __('like this.', 'buddypress-like')
			),
			'get_likes_no_friends_you_and_singular' => array(
				'default'	=> __('None of your friends like this yet, but you and %count% other person does.', 'buddypress-like'),
				'custom'	=> __('None of your friends like this yet, but you and %count% other person does.', 'buddypress-like')
			),
			'get_likes_no_friends_you_and_plural' => array(
				'default'	=> __('None of your friends like this yet, but you and %count% other people do.', 'buddypress-like'),
				'custom'	=> __('None of your friends like this yet, but you and %count% other people do.', 'buddypress-like')
			),
			'get_likes_no_friends_singular' => array(
				'default'	=> __('None of your friends like this yet, but %count% other person does.', 'buddypress-like'),
				'custom'	=> __('None of your friends like this yet, but %count% other person does.', 'buddypress-like')
			),
			'get_likes_no_friends_plural' => array(
				'default'	=> __('None of your friends like this yet, but %count% other people do.', 'buddypress-like'),
				'custom'	=> __('None of your friends like this yet, but %count% other people do.', 'buddypress-like')
			)
		);

	$current_settings = get_site_option('bp_like_settings');

	if ( $current_settings['post_to_activity_stream'] )
		$post_to_activity_stream = $current_settings['post_to_activity_stream'];
	else
		$post_to_activity_stream = 1;

	if ( $current_settings['show_excerpt'] )
		$show_excerpt = $current_settings['show_excerpt'];
	else
		$show_excerpt = 0;

	if ( $current_settings['excerpt_length'] )
		$excerpt_length = $current_settings['excerpt_length'];
	else
		$excerpt_length = 140;

	if ( $current_settings['likers_visibility'] )
		$likers_visibility = $current_settings['likers_visibility'];
	else
		$likers_visibility = 'show_all';

	if ( $current_settings['name_or_avatar'] )
		$name_or_avatar = $current_settings['name_or_avatar'];
	else
		$name_or_avatar = 'name';

	if ( $current_settings['text_strings'] ) :
		
		$current_text_strings = $current_settings['text_strings'];
		
		/* Go through each string and update the default to the current default, keep the custom settings */
		foreach( $default_text_strings as $string_name => $string_contents ) :
		
			$default = $default_text_strings[$string_name]['default'];
			$custom = $current_settings['text_strings'][$string_name]['custom'];
			
			if ( empty( $custom ) )
				$custom = $default;
			
			$text_strings[$string_name] = array('default' => $default, 'custom' => $custom);
		
		endforeach;
	
	else :
		$text_strings = $default_text_strings;
	endif;

	$settings = array(
		'likers_visibility' 		=> $likers_visibility,
		'post_to_activity_stream' 	=> $post_to_activity_stream,
		'show_excerpt'				=> $show_excerpt,
		'excerpt_length'			=> $excerpt_length,
		'text_strings'				=> $text_strings,
		'name_or_avatar'			=> $name_or_avatar
	);

	update_site_option( 'bp_like_db_version', BP_LIKE_DB_VERSION );
	update_site_option( 'bp_like_settings', $settings );

	add_action( 'admin_notices', 'bp_like_updated_notice' );
}