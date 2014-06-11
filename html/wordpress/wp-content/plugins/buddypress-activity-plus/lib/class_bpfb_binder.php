<?php
/**
 * Main handler class.
 * Responsible for the overall functionality.
 */
class BpfbBinder {

	/**
	 * Main entry method.
	 *
	 * @access public
	 * @static
	 */
	function serve () {
		$me = new BpfbBinder;
		$me->add_hooks();
	}

	/**
	 * Image moving and resizing routine.
	 *
	 * Relies on WP built-in image resizing.
	 *
	 * @param array Image paths to move from temp directory
	 * @return mixed Array of new image paths, or (bool)false on failure.
	 * @access private
	 */
	function move_images ($imgs) {
		if (!$imgs) return false;
		if (!is_array($imgs)) $imgs = array($imgs);

		global $bp;
		$ret = array();

		list($thumb_w,$thumb_h) = Bpfb_Data::get_thumbnail_size();
		
		$processed = 0;
		foreach ($imgs as $img) {
			$processed++;
			if (BPFB_IMAGE_LIMIT && $processed > BPFB_IMAGE_LIMIT) break; // Do not even bother to process more.
			if (preg_match('!^https?:\/\/!i', $img)) { // Just add remote images
				$ret[] = $img;
				continue;
			}
			
			$pfx = $bp->loggedin_user->id . '_' . preg_replace('/[^0-9]/', '-', microtime());
			$tmp_img = realpath(BPFB_TEMP_IMAGE_DIR . $img);
			$new_img = BPFB_BASE_IMAGE_DIR . "{$pfx}_{$img}";
			if (@rename($tmp_img, $new_img)) {
				if (function_exists('wp_get_image_editor')) { // New way of resizing the image
					$image = wp_get_image_editor($new_img);
					if (!is_wp_error($image)) {
						$thumb_filename  = $image->generate_filename('bpfbt');
						$image->resize($thumb_w, $thumb_h, false);
						
						// Alright, now let's rotate if we can
						if (function_exists('exif_read_data')) {
							$exif = exif_read_data($new_img); // Okay, we now have the data
							if (!empty($exif['Orientation']) && 3 === (int)$exif['Orientation']) $image->rotate(180);
							else if (!empty($exif['Orientation']) && 6 === (int)$exif['Orientation']) $image->rotate(-90);
							else if (!empty($exif['Orientation']) && 8 === (int)$exif['Orientation']) $image->rotate(90);
						}

						$image->save($thumb_filename);
					}
				} else { // Old school fallback
					image_resize($new_img, $thumb_w, $thumb_h, false, 'bpfbt');
				}
				$ret[] = pathinfo($new_img, PATHINFO_BASENAME);
			}
			else return false;
		}

		return $ret;
	}

	/**
	 * Remote page retrieving routine.
	 *
	 * @param string Remote URL
	 * @return mixed Remote page as string, or (bool)false on failure
	 * @access private
	 */
	function get_page_contents ($url) {
		$response = wp_remote_get($url);
		if (is_wp_error($response)) return false;
		return $response['body'];
	}

	/**
	 * Introduces `plugins_url()` and other significant URLs as root variables (global).
	 */
	function js_plugin_url () {
		$data = apply_filters(
			'bpfb_js_data_object',
			array(
				'root_url' => BPFB_PLUGIN_URL,
				'temp_img_url' => BPFB_TEMP_IMAGE_URL,
				'base_img_url' => BPFB_BASE_IMAGE_URL,
				'theme' => Bpfb_Data::get('theme', 'default'),
				'alignment' => Bpfb_Data::get('alignment', 'left'),
			)
		);
		printf('<script type="text/javascript">var _bpfb_data=%s;</script>', json_encode($data));
		if ('default' != $data['theme'] && !current_theme_supports('bpfb_toolbar_icons')) {
			$url = BPFB_PLUGIN_URL;
			echo <<<EOFontIconCSS
<style type="text/css">
@font-face {
	font-family: 'bpfb';
	src:url('{$url}/css/external/font/bpfb.eot');
	src:url('{$url}/css/external/font/bpfb.eot?#iefix') format('embedded-opentype'),
		url('{$url}/css/external/font/bpfb.woff') format('woff'),
		url('{$url}/css/external/font/bpfb.ttf') format('truetype'),
		url('{$url}/css/external/font/bpfb.svg#icomoon') format('svg');
	font-weight: normal;
	font-style: normal;
}
</style>
EOFontIconCSS;
		}
	}

	/**
	 * Loads needed scripts and l10n strings for JS.
	 */
	function js_load_scripts () {
		wp_enqueue_script('jquery');
		wp_enqueue_script('thickbox');
		if (!current_theme_supports('bpfb_file_uploader')) {
			wp_enqueue_script('file_uploader', BPFB_PLUGIN_URL . '/js/external/fileuploader.js', array('jquery'));
		}
		wp_enqueue_script('bpfb_interface_script', BPFB_PLUGIN_URL . '/js/bpfb_interface.js', array('jquery'));
		wp_localize_script('bpfb_interface_script', 'l10nBpfb', array(
			'add_photos' => __('Add photos', 'bpfb'),
			'add_remote_image' => __('Add image URL', 'bpfb'),
			'add_another_remote_image' => __('Add another image URL', 'bpfb'),
			'add_videos' => __('Add videos', 'bpfb'),
			'add_video' => __('Add video', 'bpfb'),
			'add_links' => __('Add links', 'bpfb'),
			'add_link' => __('Add link', 'bpfb'),
			'add' => __('Add', 'bpfb'),
			'cancel' => __('Cancel', 'bpfb'),
			'preview' => __('Preview', 'bpfb'),
			'drop_files' => __('Drop files here to upload', 'bpfb'),
			'upload_file' => __('Upload a file', 'bpfb'),
			'choose_thumbnail' => __('Choose thumbnail', 'bpfb'),
			'no_thumbnail' => __('No thumbnail', 'bpfb'),
			'paste_video_url' => __('Paste video URL here', 'bpfb'),
			'paste_link_url' => __('Paste link here', 'bpfb'),
			'images_limit_exceeded' => sprintf(__("You tried to add too many images, only %d will be posted.", 'bpfb'), BPFB_IMAGE_LIMIT),
			// Variables
			'_max_images' => BPFB_IMAGE_LIMIT,
		));
	}

	/**
	 * Loads required styles.
	 */
	function css_load_styles () {
		wp_enqueue_style('thickbox');
		wp_enqueue_style('file_uploader_style', BPFB_PLUGIN_URL . '/css/external/fileuploader.css');
		if (!current_theme_supports('bpfb_interface_style')) {
			wp_enqueue_style('bpfb_interface_style', BPFB_PLUGIN_URL . '/css/bpfb_interface.css');
		}
		if (!current_theme_supports('bpfb_toolbar_icons')) {
			wp_enqueue_style('bpfb_toolbar_icons', BPFB_PLUGIN_URL . '/css/bpfb_toolbar.css');
		}
	}

	/**
	 * Handles video preview requests.
	 */
	function ajax_preview_video () {
		$url = $_POST['data'];
		$url = preg_match('/^https?:\/\//i', $url) ? $url : BPFB_PROTOCOL . $url;
		$warning = __('There has been an error processing your request', 'bpfb');
		$response = $url ? __('Processing...', 'bpfb') : $warning;
		$ret = wp_oembed_get($url);
		echo ($ret ? $ret : $warning);
		exit();
	}

	/**
	 * Handles link preview requests.
	 */
	function ajax_preview_link () {
		$url = $_POST['data'];
		$scheme = parse_url($url, PHP_URL_SCHEME);
		if (!$scheme || !preg_match('/^https?$/', $scheme)) {
			$url = "http://{$url}";
		}

		$warning = __('There has been an error processing your request', 'bpfb');
		$response = $url ? __('Processing...', 'bpfb') : $warning;
		$images = array();
		$title = $warning;
		$text = $warning;

		$page = $this->get_page_contents($url);
		if (!function_exists('str_get_html')) require_once(BPFB_PLUGIN_BASE_DIR . '/lib/external/simple_html_dom.php');
		$html = str_get_html($page);
		$str = $html->find('text');

		if ($str) {
			$image_els = $html->find('img');
			foreach ($image_els as $el) {
				if ($el->width > 100 && $el->height > 1) // Disregard spacers
					$images[] = $el->src;
			}
			$og_image = $html->find('meta[property=og:image]', 0);
			if ($og_image) array_unshift($images, $og_image->content);

			$title = $html->find('title', 0);
			$title = $title ? $title->plaintext: $url;

			$meta_description = $html->find('meta[name=description]', 0);
			$og_description = $html->find('meta[property=og:description]', 0);
			$first_paragraph = $html->find('p', 0);
			if ($og_description && $og_description->content) $text = $og_description->content;
			else if ($meta_description && $meta_description->content) $text = $meta_description->content;
			else if ($first_paragraph && $first_paragraph->plaintext) $text = $first_paragraph->plaintext;
			else $text = $title;
			
			$images = array_filter($images);
		} else {
			$url = '';
		}

		header('Content-type: application/json');
		echo json_encode(array(
			"url" => $url,
			"images" => $images,
			"title" => $title,
			"text" => $text,
		));
		exit();
	}

	/**
	 * Handles image preview requests.
	 * Relies on ./lib/external/file_uploader.php for images upload handling.
	 * Stores images in the temporary storage.
	 */
	function ajax_preview_photo () {
		$dir = BPFB_PLUGIN_BASE_DIR . '/img/';
		if (!class_exists('qqFileUploader')) require_once(BPFB_PLUGIN_BASE_DIR . '/lib/external/file_uploader.php');
		$uploader = new qqFileUploader(array('jpg', 'jpeg', 'png', 'gif'));
		$result = $uploader->handleUpload(BPFB_TEMP_IMAGE_DIR);
		//header('Content-type: application/json'); // For some reason, IE doesn't like this. Skip.
		echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		exit();
	}

	/**
	 * Handles remote images preview
	 */
	function ajax_preview_remote_image () {
		header('Content-type: application/json');
		echo json_encode($_POST['data']);
		exit();
	}

	/**
	 * Clears up the temporary images storage.
	 */
	function ajax_remove_temp_images () {
		header('Content-type: application/json');
		parse_str($_POST['data'], $data);
		$data = is_array($data) ? $data : array('bpfb_photos'=>array());
		foreach ($data['bpfb_photos'] as $file) {
			@unlink (BPFB_TEMP_IMAGE_DIR . $file);
		}
		echo json_encode(array('status'=>'ok'));
		exit();
	}

	/**
	 * This is where we actually save the activity update.
	 */
	function ajax_update_activity_contents () {
		$bpfb_code = $activity = '';
		$aid = 0;
		$codec = new BpfbCodec;
		if (@$_POST['data']['bpfb_video_url']) {
			$bpfb_code = $codec->create_video_tag($_POST['data']['bpfb_video_url']);
		}
		if (@$_POST['data']['bpfb_link_url']) {
			$bpfb_code = $codec->create_link_tag(
				$_POST['data']['bpfb_link_url'],
				$_POST['data']['bpfb_link_title'],
				$_POST['data']['bpfb_link_body'],
				$_POST['data']['bpfb_link_image']
			);
		}
		if (@$_POST['data']['bpfb_photos']) {
			$images = $this->move_images($_POST['data']['bpfb_photos']);
			$bpfb_code = $codec->create_images_tag($images);
		}

		$bpfb_code = apply_filters('bpfb_code_before_save', $bpfb_code);

		// All done creating tags. Now, save the code
		$gid = (int)@$_POST['group_id'];
		if ($bpfb_code) {
			$content = @$_POST['content'] . "\n" . $bpfb_code;
			$content = apply_filters('bp_activity_post_update_content', $content);
			$aid = $gid ?
				groups_post_update(array('content' => $content, 'group_id' => $gid))
				:
				bp_activity_post_update(array('content' => $content))
			;
			global $blog_id;
			bp_activity_update_meta($aid, 'bpfb_blog_id', $blog_id);
		}
		if ($aid) {
			ob_start();
			if ( bp_has_activities ( 'include=' . $aid ) ) {
				while ( bp_activities() ) {
					bp_the_activity();
					if (function_exists('bp_locate_template')) bp_locate_template( array( 'activity/entry.php' ), true );
					else locate_template( array( 'activity/entry.php' ), true );
				}
			}
			$activity = ob_get_clean();
		}
		header('Content-type: application/json');
		echo json_encode(array(
			'code' => $bpfb_code,
			'id' => $aid,
			'activity' => $activity,
		));
		exit();
	}

	function _add_js_css_hooks () {
		global $bp;

		if (
			// Load the scripts on Activity pages
			(defined('BP_ACTIVITY_SLUG') && bp_is_activity_component())
			||
			// Load the scripts when Activity page is the Home page
			(defined('BP_ACTIVITY_SLUG') && 'page' == get_option('show_on_front') && is_front_page() && BP_ACTIVITY_SLUG == get_option('page_on_front'))
			||
			// Load the script on Group home page
			(defined('BP_GROUPS_SLUG') && bp_is_groups_component() && 'home' == $bp->current_action)
		) {
			// Step1: Load JS/CSS requirements
			add_action('wp_enqueue_scripts', array($this, 'js_load_scripts'));
			add_action('wp_print_scripts', array($this, 'js_plugin_url'));
			add_action('wp_print_styles', array($this, 'css_load_styles'));

			do_action('bpfb_add_cssjs_hooks');
		}
	}

	/**
	 * This is where the plugin registers itself.
	 */
	function add_hooks () {
		
		add_action('init', array($this, '_add_js_css_hooks'));

		// Step2: Add AJAX request handlers
		add_action('wp_ajax_bpfb_preview_video', array($this, 'ajax_preview_video'));
		add_action('wp_ajax_bpfb_preview_link', array($this, 'ajax_preview_link'));
		add_action('wp_ajax_bpfb_preview_photo', array($this, 'ajax_preview_photo'));
		add_action('wp_ajax_bpfb_preview_remote_image', array($this, 'ajax_preview_remote_image'));
		add_action('wp_ajax_bpfb_remove_temp_images', array($this, 'ajax_remove_temp_images'));
		add_action('wp_ajax_bpfb_update_activity_contents', array($this, 'ajax_update_activity_contents'));

		do_action('bpfb_add_ajax_hooks');
		
		// Step 3: Register and process shortcodes
		BpfbCodec::register();
	}
}