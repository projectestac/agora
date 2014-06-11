<?php

class Bpfb_Data_Container {
	
	private $_data;

	public function __construct () {
		$data = get_option('bpfb', array());
		$this->_data = wp_parse_args($data, array(
			'oembed_width' => 450,
			'image_limit' => 5,
			'links_target' => false,
		));
	}

	public function get ($option, $fallback=false) {
		$define = 'BPFB_' . strtoupper($option);
		if (defined($define)) return constant($define);
		return $this->_get($option, $fallback);
	}

	public function get_strict ($option, $fallback=false) {
		return $this->_get($option, $fallback);
	}

	public function get_thumbnail_size ($strict=false) {
		$thumb_w = empty($this->_data['thumbnail_size_width']) || !(int)$this->_data['thumbnail_size_width']
			? get_option('thumbnail_size_w', 100)
			: (int)$this->_data['thumbnail_size_width']
		;
		$thumb_w = $thumb_w ? $thumb_w : 100;
		$thumb_h = empty($this->_data['thumbnail_size_height']) || !(int)$this->_data['thumbnail_size_height']
			? get_option('thumbnail_size_h', 100)
			: (int)$this->_data['thumbnail_size_height']
		;
		$thumb_h = $thumb_h ? $thumb_h : 100;

		// Override thumbnail image size in wp-config.php
		if (!$strict && defined('BPFB_THUMBNAIL_IMAGE_SIZE')) {
			list($tw,$th) = explode('x', BPFB_THUMBNAIL_IMAGE_SIZE);
			$thumb_w = (int)$tw ? (int)$tw : $thumb_w;
			$thumb_h = (int)$th ? (int)$th : $thumb_h;
		}

		return array($thumb_w, $thumb_h);
	}

	private function _get ($option, $fallback=false) {
		if (isset($this->_data[$option])) return $this->_data[$option];
		return $fallback;
	}
}

class Bpfb_Data {

	private static $_instance;

	private function __construct() {}
	private function __clone() {}

	public function get ($option, $fallback=false) {
		if (!self::$_instance) self::_spawn_instance();
		return self::$_instance->get($option, $fallback);
	}

	public function get_strict ($option, $fallback=false) {
		if (!self::$_instance) self::_spawn_instance();
		return self::$_instance->get_strict($option, $fallback);	
	}

	public function get_thumbnail_size ($strict=false) {
		if (!self::$_instance) self::_spawn_instance();
		return self::$_instance->get_thumbnail_size($strict);
	}

	private static function _spawn_instance () {
		if (self::$_instance) return false;
		self::$_instance = new Bpfb_Data_Container;
	}
}