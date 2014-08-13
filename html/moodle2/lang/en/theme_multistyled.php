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
 * Strings for component 'theme_multistyled', language 'en', branch 'MOODLE_21_STABLE'
 *
 * @package   theme_multistyled
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bgheadings'] = 'Headings Background colour';
$string['bgheadingsdesc'] = 'By default this is a bold colour, used for the header section background colour as well as the block and section headings.';
$string['bgmain'] = 'Main Content background';
$string['bgmaindesc'] = 'By default this is white - it is used for the main content region and the content of the sidebar blocks';
$string['bgsidebar'] = 'Sidebar Background Colour';
$string['bgsidebardesc'] = 'By default this is a paler shade of the headings background colour and is used for the background to the sideblock columns.';
$string['bodywidth'] = 'The theme is primarily designed as a fluid, full width scheme ie Body width = 100%. This can be adjusted using this setting if, for example a fixed 960px width is required. In this case some css styling may need to be applied to the html{} using the customcss box below - by default the html{} adopts the main content background colour.';
$string['bodywidth_title'] = 'Page body width';
$string['choosereadme'] = '<h4>Multistyled</h4><h2>A ltr/rtl theme with multiple layout options</h2> - This theme uses multilayout and base themes as parents. Base is part of the Moodle core, but you will need to ensure you have multilayout installed as well (The multilayout theme should have been included in the zip file that this theme was downloaded in and may have been installed to your server at the same time). The theme has been designed to work in browsers from <strong>IE7+ and including FF, Chrome and Safari</strong> - it has also been developed to work with <strong>rtl language layouts</strong>.<br/><br/>The theme allows any one of <strong>5 different layouts</strong> (3column - holygrail/blogstyle, 2 column - left or right sidebars, 1column full width) to be applied either site wide through the setting spage or by duplicating the main general_layout.php file and setting the chosen layout in the code there - these new files can then be referenced from the config.php for different page types as needed. The layouts also have additional block regions above and below the main content region for even greater flexibility.<br/><br/>The settings page for multistyled also gives a selection of <strong>pre-set colour schemes and styles</strong> (such as rounded corners) which can be applied to the theme - alternatively the theme can be styled in detail using the custom css box.';
$string['colourchoicedesc'] = '<p><b>Multistyled Colour Settings</b></p>
<p>Multistyled uses a limited colour set to create the style used in the theme. In the default these are a bold colour for the header (and heading) backgrounds, a pale colour for the sidebars and white for the main content. The main text colour is black, with headings in white. Other colours are lt as the default Moodle settings.<br/>These basic theme colour options can be altered using the settings below - while the theme can be styled in more detail using the custom css box at the bottom of this page.</p>';
$string['colourchoiceinfo'] = '';
$string['customcss'] = 'Custom CSS';
$string['customcssdesc'] = 'Any CSS you enter here will be added to every page allowing you to completely customise this theme.';
$string['headertxt'] = 'Heading Text Colour';
$string['headertxtdesc'] = 'By default white, this colour is used for the text font in the header and block/ection headings';
$string['imageinfo'] = '<b>Page image</b>';
$string['imageinfodesc'] = 'Enter the URL for an image saved in an accessible location. This could be a site logo, but consider that this is not shown on smaller screens.';
$string['layout'] = 'Select site-wide layout';
$string['layoutdesc'] = 'You can select from any of 5 layout options built into the theme.<ul><li>3 column HolyGrail layout - a main centre column with left and right sidebars</li><li>3 column BlogStyle layout - a main column with two sidebars to the right (left if viewed in rtl language)</li><li>2 column layout with sidebar to the right</li><li>2 column layout with sidebar to the left</li><li>1 column full width layout where the normal sidebar contents are displayed below the main content</li></ul>for more detail about the layouts themselves and about the width and padding elements below please check out <a href="http://matthewjamestaylor.com/blog/perfect-stacked-columns.htm">http://matthewjamestaylor.com/blog/perfect-stacked-columns.htm</a>';
$string['maintxt'] = 'Main Text Colour';
$string['maintxtdesc'] = 'The default colour for general text on the site - black';
$string['pgimage'] = 'URL for the site logo image';
$string['pgimage_title'] = 'Site Logo';
$string['pluginname'] = 'MultiStyled';
$string['region-side-post'] = 'Right';
$string['region-side-pre'] = 'Left';
