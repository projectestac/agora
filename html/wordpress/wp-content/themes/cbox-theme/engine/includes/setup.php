<?php
/**
 * Infinity Theme: WordPress setup
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2013 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage base
 * @since 1.0
 */

/**
 * Include custom functionality
 */
require_once INFINITY_INC_PATH . '/base.php';
require_once INFINITY_INC_PATH . '/menus.php';
require_once INFINITY_INC_PATH . '/sidebars.php';
require_once INFINITY_INC_PATH . '/comments.php';
require_once INFINITY_INC_PATH . '/templatetags.php';
require_once INFINITY_INC_PATH . '/walkers.php';
require_once INFINITY_INC_PATH . '/options.php';

////////////////////////////////////////////////////
//
// IMPORTANT:
//
// 1. If you are working on a fork, add additional
//    requires BELOW this comment.
//
// 2. Please DO NOT put any functions or logic in
//    this file. Its for requires ONLY!
//
////////////////////////////////////////////////////

//
// CBOX Theme functionality
//

/**
 * Setup
 */
require_once INFINITY_INC_PATH . '/setup-cbox.php';

/**
 * SideBars
 */
require_once INFINITY_INC_PATH . '/sidebars-cbox.php';

/**
 * BuddyPress
 */
require_once INFINITY_INC_PATH . '/buddypress-cbox.php';
