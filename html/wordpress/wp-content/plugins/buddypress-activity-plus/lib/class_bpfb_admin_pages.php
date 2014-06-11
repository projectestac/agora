<?php

class Bpfb_Admin {

	private $_page_hook;
	private $_capability;

	private function __construct () {
		$this->_capability = bp_core_do_network_admin()
			? 'manage_network_options'
			: 'manage_options'
		;
	}

	public static function serve () {
		$me = new self;
		$me->_add_hooks();
	}

	private function _add_hooks () {
		add_action(bp_core_admin_hook(), array($this, 'add_menu_page'));
		add_action('admin_enqueue_scripts', array($this, 'enqueue_dependencies'));
	}

	public function add_menu_page () {
		$hook = bp_core_do_network_admin()
			? 'settings.php'
			: 'options-general.php'
		;
		$this->_page_hook = add_submenu_page(
			$hook,
			__('BuddyPress Activity Plus', 'bpfb'),
			__('Activity Plus', 'bpfb'),
			$this->_capability,
			'bpfb-settings',
			array($this, 'settings_page')
		);

		$this->_save_settings();
	}

	public function enqueue_dependencies ($hook) {
		if ($hook !== $this->_page_hook) return false;
		wp_enqueue_style('bpfb-admin', BPFB_PLUGIN_URL . '/css/admin.css');
	}

	private function _save_settings () {
		if (empty($_POST['bpfb'])) return false;
		if (!current_user_can($this->_capability)) return false;
		if (!check_ajax_referer($this->_page_hook)) return false;

		$raw = stripslashes_deep($_POST['bpfb']);
		list($thumb_w,$thumb_h) = Bpfb_Data::get_thumbnail_size(true);
		$raw['thumbnail_size_height'] = !empty($raw['thumbnail_size_height']) && (int)$raw['thumbnail_size_height']
			? (int)$raw['thumbnail_size_height']
			: $thumb_h
		;
		$raw['thumbnail_size_width'] = !empty($raw['thumbnail_size_width']) && (int)$raw['thumbnail_size_width']
			? (int)$raw['thumbnail_size_width']
			: $thumb_w
		;
		$raw['oembed_width'] = !empty($raw['oembed_width']) && (int)$raw['oembed_width']
			? (int)$raw['oembed_width']
			: Bpfb_Data::get('oembed_width')
		;
		$raw['theme'] = !empty($raw['theme'])
			? sanitize_html_class($raw['theme'])
			: ''
		;
		
		update_option('bpfb', $raw);
		wp_safe_redirect(add_query_arg(array('updated' => true)));
	}

	public function settings_page () {
		$theme = Bpfb_Data::get('theme');
		list($thumb_w,$thumb_h) = Bpfb_Data::get_thumbnail_size();
		$oembed_width = Bpfb_Data::get('oembed_width', 450);
		$alignment = Bpfb_Data::get('alignment', 'left');
		?>
<div class="wrap bpfb">
	<?php screen_icon('buddypress'); ?>
	<h2><?php echo get_admin_page_title(); ?></h2>
	<form action="" method="POST">
		
		<fieldset class="appearance section">
			<legend><?php _e('Appearance', 'bpfb'); ?></legend>

			<?php if (current_theme_supports('bpfb_interface_style') || current_theme_supports('bpfb_toolbar_icons')) { ?>
			<div class="updated below-h2">
				<p><?php _e('Your BuddyPress theme incorporates Activity Plus style overrides. Respecting the selection you make in the &quot;Appearance&quot; section is entirely up to your theme.', 'bpfb'); ?></p>
			</div>
			<?php } ?>

			<fieldset class="theme option">
				<legend><?php _e('Theme', 'bpfb'); ?></legend>
				<label for="bpfb-theme-default">
					<img src="<?php echo BPFB_PLUGIN_URL; ?>/img/system/theme-legacy.png" />
					<input type="radio" id="bpfb-theme-default" name="bpfb[theme]" value="" <?php checked($theme, ''); ?> />
					<?php _e('Default (legacy)', 'bpfb'); ?>
				</label>
				<label for="bpfb-theme-new">
					<img src="<?php echo BPFB_PLUGIN_URL; ?>/img/system/theme-new.png" />
					<input type="radio" id="bpfb-theme-new" name="bpfb[theme]" value="new" <?php checked($theme, 'new'); ?> />
					<?php _e('New', 'bpfb'); ?>
				</label>
				<label for="bpfb-theme-round">
					<img src="<?php echo BPFB_PLUGIN_URL; ?>/img/system/theme-round.png" />
					<input type="radio" id="bpfb-theme-round" name="bpfb[theme]" value="round" <?php checked($theme, 'round'); ?> />
					<?php _e('Round', 'bpfb'); ?>
				</label>
			</fieldset>
			<fieldset class="alignment option">
				<legend><?php _e('Alignment', 'bpfb'); ?></legend>
				<label for="bpfb-theme-alignment-left">
					<input type="radio" id="bpfb-theme-alignment-left" name="bpfb[alignment]" value="left" <?php checked($alignment, 'left'); ?> />
					<?php _e('Left', 'bpfb'); ?>
				</label>
				<label for="bpfb-theme-alignment-right">
					<input type="radio" id="bpfb-theme-alignment-right" name="bpfb[alignment]" value="right" <?php checked($alignment, 'right'); ?> />
					<?php _e('Right', 'bpfb'); ?>
				</label>
			</fieldset>
		</fieldset>

		
		<fieldset class="functional section">
			<legend><?php _e('Functional', 'bpfb'); ?></legend>
			
			<fieldset class="oembed option">
				<legend><?php _e('oEmbed', 'bpfb'); ?></legend>
				<?php if (defined('BPFB_THUMBNAIL_IMAGE_SIZE')) { ?>
					<div class="updated below-h2">
						<p><?php printf(__('Your oEmbed dimensions will be dictated by the <code>BPFB_OEMBED_WIDTH</code> define value (%s). Remove this define to enable this option.', 'bpfb'), BPFB_OEMBED_WIDTH); ?></p>
					</div>
				<?php } ?>
				<label for="bpfb-oembed-width">
					<?php _e('Width', 'bpfb') ?>
					<input type="text" id="bpfb-oembed-width" name="bpfb[oembed_width]" size="4" value="<?php echo (int)$oembed_width; ?>" <?php echo (defined('BPFB_OEMBED_WIDTH') ? 'disabled="disabled"' : ''); ?> /> px
				</label>
			</fieldset>
			<fieldset class="thumbnail option">
				<legend><?php _e('Image thumbnails', 'bpfb'); ?></legend>
				<?php if (defined('BPFB_THUMBNAIL_IMAGE_SIZE')) { ?>
					<div class="updated below-h2">
						<p><?php printf(__('Your thumbnail dimensions will be dictated by the <code>BPFB_THUMBNAIL_IMAGE_SIZE</code> define value (%s). Remove this define to enable these options.', 'bpfb'), BPFB_THUMBNAIL_IMAGE_SIZE); ?></p>
					</div>
				<?php } ?>
				<label for="bpfb-thumbnail_size-width">
					<?php _e('Width', 'bpfb') ?>
					<input type="text" id="bpfb-thumbnail_size-width" name="bpfb[thumbnail_size_width]" size="4" value="<?php echo (int)$thumb_w; ?>" <?php echo (defined('BPFB_THUMBNAIL_IMAGE_SIZE') ? 'disabled="disabled"' : ''); ?> /> px
				</label>
				<label for="bpfb-thumbnail_size-height">
					<?php _e('Height', 'bpfb') ?>
					<input type="text" id="bpfb-thumbnail_size-height" name="bpfb[thumbnail_size_height]" size="4" value="<?php echo (int)$thumb_h; ?>" <?php echo (defined('BPFB_THUMBNAIL_IMAGE_SIZE') ? 'disabled="disabled"' : ''); ?> /> px
				</label>
			</fieldset>
		</fieldset>

		<p>
			<?php wp_nonce_field($this->_page_hook); ?>
			<button class="button button-primary"><?php _e('Save'); ?></button>
		</p>
	</form>
</div>
		<?php
	}
}