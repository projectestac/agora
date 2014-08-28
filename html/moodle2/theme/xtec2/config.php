<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Moodle's Clean theme, an example of how to make a Bootstrap theme
 *
 * DO NOT MODIFY THIS THEME!
 * COPY IT FIRST, THEN RENAME THE COPY AND MODIFY IT INSTEAD.
 *
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 *
 * @package   theme_xtec2
 * @copyright 2013 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$THEME->name = 'xtec2';

/////////////////////////////////
// The only thing you need to change in this file when copying it to
// create a new theme is the name above. You also need to change the name
// in version.php and lang/en/theme_xtec2.php as well.
//////////////////////////////////
//
$THEME->doctype = 'html5';
$THEME->parents = array('bootstrapbase');
$THEME->sheets = array('custom', 'font-awesome.min');
$THEME->supportscssoptimisation = false;
$THEME->yuicssmodules = array();

$THEME->editor_sheets = array();

$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->csspostprocess = 'theme_xtec2_process_css';

$THEME->blockrtlmanipulations = array(
    'side-pre' => 'side-post',
    'side-post' => 'side-pre'
);

$block_layout = get_config('theme_xtec2','block_layout');
switch($block_layout){
    case 'none':
        $regions_one = array();
        $regions_both = array();
        $default_region = '';
        break;
    case 'right':
        $regions_one = array('side-post');
        $regions_both = array('side-post');
        $default_region = 'side-post';
        break;
    case 'both':
        $regions_one = array('side-pre');
        $regions_both = array('side-pre', 'side-post');
        $default_region = 'side-pre';
        break;
    case 'left':
    default:
        $regions_one = array('side-pre');
        $regions_both = array('side-pre');
        $default_region= 'side-pre';
        break;
}


$THEME->layouts = array(
    // Most backwards compatible layout without the blocks - this is the layout used by default.
    'base' => array(
        'file' => 'general.php',
        'regions' => array(),
    ),
    // Standard layout with blocks, this is recommended for most pages with general information.
    'standard' => array(
        'file' => 'general.php',
        'regions' => $regions_both,
        'defaultregion' => $default_region,
    ),
    // Main course page.
    'course' => array(
        'file' => 'general.php',
        'regions' => $regions_both,
        'defaultregion' => $default_region,
        'options' => array('langmenu'=>true),
    ),
    'coursecategory' => array(
        'file' => 'general.php',
        'regions' => $regions_both,
        'defaultregion' => $default_region,
    ),
    // part of course, typical for modules - default page layout if $cm specified in require_login().
    'incourse' => array(
        'file' => 'general.php',
        'regions' => $regions_both,
        'defaultregion' => $default_region,
    ),
    // The site home page.
    'frontpage' => array(
        'file' => 'general.php',
        'regions' => $regions_both,
        'defaultregion' => $default_region,
        'options' => array('nonavbar'=>true),
    ),
    // Server administration scripts.
    'admin' => array(
        'file' => 'general.php',
        'regions' => $regions_one,
        'defaultregion' => $default_region,
    ),
    // My dashboard page.
    'mydashboard' => array(
        'file' => 'general.php',
        'regions' => $regions_both,
        'defaultregion' => $default_region,
        'options' => array('langmenu'=>true),
    ),
    // My public page.
    'mypublic' => array(
        'file' => 'general.php',
        'regions' => $regions_both,
        'defaultregion' => $default_region,
    ),
    'login' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('langmenu'=>true),
    ),

    // Pages that appear in pop-up windows - no navigation, no blocks, no header.
    'popup' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'nonavbar'=>true),
    ),
    // No blocks and minimal footer - used for legacy frame layouts only!
    'frametop' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'nocoursefooter'=>true),
    ),
    // Embeded pages, like iframe/object embeded in moodleform - it needs as much space as possible.
    'embedded' => array(
        'file' => 'embedded.php',
        'regions' => array()
    ),
    // Used during upgrade and install, and for the 'This site is undergoing maintenance' message.
    // This must not have any blocks, links, or API calls that would lead to database or cache interaction.
    // Please be extremely careful if you are modifying this layout.
    'maintenance' => array(
        'file' => 'maintenance.php',
        'regions' => array(),
    ),
    // Should display the content and basic headers only.
    'print' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'nonavbar'=>false),
    ),
    // The pagelayout used when a redirection is occuring.
    'redirect' => array(
        'file' => 'embedded.php',
        'regions' => array(),
    ),
    // The pagelayout used for reports.
    'report' => array(
        'file' => 'general.php',
        'regions' => $regions_one,
        'defaultregion' => $default_region,
    ),
    // The pagelayout used for safebrowser and securewindow.
    'secure' => array(
        'file' => 'secure.php',
        'regions' => $regions_both,
        'defaultregion' => $default_region
    ),
);

$THEME->javascripts_footer = array('xtec2_footer');

