<?php
/*
  Plugin Name: Agora
  Plugin URI:
  Description: Group of Agora functions
  Version: 3.0
  Author: Pau Ferrer Ocaña
  Author URI:
 */


function agora_init() {
    // Localization
    // load_plugin_textdomain('agora', false, basename(dirname(__FILE__)) . '/languages/');
}
// Initialization of the plugin
add_action('init', 'agora_init');