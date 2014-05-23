<?php

/*
  Plugin Name: BuddyPress Like
  Plugin URI: http://darrenmeehan.me/
  Description: Adds the ability for users to like content throughout your BuddyPress site.
  Author: Darren Meehan
  Version: 0.1.7
  Author URI: http://darrenmeehan.me
  Text Domain: buddypress-like

  Credit: The original plugin was built by Alex Hempton-Smith who did a great job. I hope he's in good
  health and enjoying life.
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/* Only load code that needs BuddyPress to run once BP is loaded and initialized. */

function bplike_init() {
    require_once( 'includes/bplike.php' );
}

add_action( 'bp_include' , 'bplike_init' );
