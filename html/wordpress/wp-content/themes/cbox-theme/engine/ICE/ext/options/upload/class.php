<?php
/**
 * ICE API: option extensions, uploader class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

ICE_Loader::load( 'utils/ajax' );

/**
 * Uploader option
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Upload
	extends ICE_Option_Image
{
	/**
	 * Will be set to true when init_once has already been called
	 *
	 * @var boolean
	 */
	private static $once = false;

	/**
	 */
	protected function init()
	{
		// always run parent first
		parent::init();

		// run init once
		$this->init_once();

		// upload files is required
		$this->add_capabilities( 'upload_files' );
	}

	/**
	 * Actions to run one time
	 */
	protected function init_once()
	{
		// check once var
		if ( false == self::$once ) {
			// set once to true
			self::$once = true;
			// rare case of needing to exec actions outside of our admin page
			add_action( 'media_upload_tabs', array( $this, 'media_upload_tabs' ), 99 );
			add_action( 'admin_enqueue_scripts', array( $this, 'media_upload_script' ) );
		}
	}

	/**
	 */
	public function init_styles()
	{
		parent::init_styles();

		if ( is_admin() ) {
			// slurp admin styles
			$this->style()
				->section( 'admin' )
				->cache( 'template', 'template.css' );
		}
	}

	/**
	 */
	public function init_scripts()
	{
		parent::init_scripts();

		if ( is_admin() ) {
			// slurp admin script
			$this->script()
				->section( 'admin' )
				->cache( 'template', 'template.js' );
		}
	}

	/**
	 */
	public function init_ajax()
	{
		parent::init_ajax();

		add_action( 'wp_ajax_ice_options_uploader_media_url', array( $this, 'ajax_media_url' ) );
	}

	/**
	 * Returns true if special admin actions should be triggered
	 *
	 * @return boolean
	 */
	protected function do_admin_action()
	{
		return (
			isset( $_REQUEST['icext_option_upload'] ) &&
			1 == $_REQUEST['icext_option_upload']
		);
	}

	/**
	 * Filter media upload tabs
	 *
	 * @param array $tabs
	 * @return array
	 */
	public function media_upload_tabs( $tabs )
	{
		// do this action?
		if ( $this->do_admin_action() ) {
			// remove url and gallery tabs
			unset( $tabs['type_url'], $tabs['gallery'] );
		}

		return $tabs;
	}

	/**
	 * Enqueue special media uploader script
	 */
	public function media_upload_script()
	{
		// do this action?
		if ( $this->do_admin_action() ) {
			// yep, enqueue it
			wp_enqueue_script(
				'icext-option-upload-mu',
				$this->locate_file_url( 'media-upload.js' ),
				array( 'jquery' ),
				ICE_VERSION
			);
		}
	}

	/**
	 * Get the url for a media attachment for an AJAX request
	 */
	public function ajax_media_url()
	{
		if ( isset( $_POST['attachment_id'] ) && is_numeric( $_POST['attachment_id'] ) ) {
			// determine size to retrieve
			$size = ( isset( $_POST['attachment_size'] ) ) ? $_POST['attachment_size'] : 'full';
			// try to get the attachment info
			$src = wp_get_attachment_image_src( $_POST['attachment_id'], $size );
			// check it out
			if ( is_array($src) ) {
				ICE_Ajax::response( true, $src[0], $src[1], $src[2] );
			} else {
				ICE_Ajax::response( false, __('Failed to lookup attachment URL', infinity_text_domain) );
			}
		} else {
			ICE_Ajax::response( 0, __('No attachment ID received', infinity_text_domain) );
		}
	}

	/**
	 */
	public function get_template_vars()
	{
		list( $url, $width, $height ) = $this->get_image_src('full');

		return array(
			'attach_url' => $url,
			'attach_width' => $width,
			'attach_height' => $height,
			'default_value' => $this->default_value,
			'default_url' => $this->get_default_image_url(),
			'edit_url' =>
				sprintf(
					'media.php?attachment_id=%d&action=edit',
					$this->get()
				)
		);
	}
}
