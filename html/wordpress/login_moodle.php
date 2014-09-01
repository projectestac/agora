<?php
require( dirname(__FILE__) . '/wp-load.php' );
if (is_user_logged_in()) {
	header('Location: '.site_url());
} else {
	global $WORDPRESS_SOCIAL_LOGIN_PROVIDERS_CONFIG;

	$authenticate_base_url = site_url('wp-login.php', 'login_post') . (strpos(site_url('wp-login.php', 'login_post'), '?') ? '&' : '?') . "action=wordpress_social_authenticate&";

	// overwrite endpoint_url if need'd
	if (get_option('wsl_settings_hide_wp_login') == 1) {
		$authenticate_base_url = WORDPRESS_SOCIAL_LOGIN_PLUGIN_URL . "/services/authenticate.php?";
	}
	// display provider icons
	foreach ($WORDPRESS_SOCIAL_LOGIN_PROVIDERS_CONFIG as $item) {
		if (@ $item["provider_id"] != 'Moodle' && @ $item["provider_name"] != 'Moodle') {
			continue;
		}
		$provider_id     = @ $item["provider_id"];
		$provider_name   = @ $item["provider_name"];

		$authenticate_url = $authenticate_base_url . "provider=" . $provider_id . "&redirect_to=" . site_url('wp-login.php');
		header('Location: '.$authenticate_url);
	}
}
