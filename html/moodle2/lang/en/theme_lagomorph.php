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
 * Strings for component 'theme_lagomorph', language 'en', branch 'MOODLE_21_STABLE'
 *
 * @package   theme_lagomorph
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bgcolour1'] = 'Background Colour 1';
$string['bgcolour1desc'] = 'Background Colour 1 - by default this is a dark shade: It is used as the base colour for the main background gradient and for the hover background on the menu buttons.';
$string['bgcolour2'] = 'Background Colour 2';
$string['bgcolour2desc'] = 'Background Colour 2 - by default this is a mid shade: It is used as the base colour for the block header gradient, the background on the menu buttons and some of the text-shadows.';
$string['bgcolour3'] = 'Background Colour 3';
$string['bgcolour3desc'] = 'Background Colour 3 - by default this is a light shade: It is used as the "shade to" colour for the gradients and some of the text and box shadows.';
$string['choosereadme'] = '<p><span style=\'font-size: x-large;\'><strong>Lagomorph Theme</strong></span></p><p>This theme has been devloped to provide a basis for a single theme across a wide variety of screen sizes, from full desktop down to mobile phone, although the prime focus is intended to be on flexibility onto mobile devices, such as android tablets/iPad etc.</p>
<p>To achieve this the theme relies considerably on css3 and so <em><strong>IS NOT SUITABLE</strong></em> for older browsers, especially \'older\' IE variations. MS filters have been used to replicate some standard css3 features as near as possible to attempt to give a similar user experience, although some have not proved practical (e.g. there is no gradient on the block headers in IE as I have been unable to make the gradient filter allow for the rounded corners)</p>
<p><strong>Points to note:</strong></p>
<p><strong>1</strong>. The page layout uses \'@media screen\' calls and is based on Daniel Wahl\'s work on the ReBase theme. This allows the page to automatically adjust between 3 column (for larger screen widths), 2 columns (left/main) for smaller screens and a single column where the side-blocks appear under the main content on the smallest screens. The profile block is also adapted according to screen size - showing the profile pic on large screens, but only the username on smaller screens</p>
<p><strong>2</strong>. The main menu for the theme is a single menu bar (ie no dropdowns), populated from a text file which can be loaded via the theme\'s settings page. This menu automatically adjusts to become a dropdown select style menu on smaller screens, and resizes to make it usable by touch control on very small screens. The standard moodle2 custommenu can also be added from an option on the theme\'s settings page, although this is currently set not to be shown on small screens, particularly as the hover style drop downs used are not suitable for touch control.</p>
<p><strong>3</strong>. To reduce the download times and html calls on mobile devices, css gradients/shadows/rounded corners/etc. and very few graphics have been used to create the theme. Those that are included (main picture top right, and block header icons) on larger screens are removed on the smallest layouts. this is based on the assumption that full screen use is more likely to be wired/wireless ethernet based, while smaller devices become more likely to rely on mobile broadband services</p>
<p><strong>4</strong>. I new icon set has been applied, based on the fugue icon set by Yusuke Kamiyamane. The fugue icon set is released under a Creative Commons Attribution 3.0 licence. This has been done to try to improve the general look and feel and has no bearing on the theme\'s usefulness in a mobile environment! :) Where these icons have been used to decorate block headers, they are removed on smaller screen sizes where the site may be being accessed over mobile broadband services in order to reduce page download times.</p>
<p><strong>5</strong>. As a design idea that arose during discussions for Shaun Daubney\'s new Aardvark2.1 theme, I have included new block areas, 2 above the main content and 2 below in the center column. This allows greater flexibility in the arrangement of the page and also allows the option for important blocks to be positioned above the main content even when the site is reduced to a single column on the smallest screens.</p>
<p></p>';
$string['colourchoicedesc'] = '<p><b>Lagomorph Colour Settings</b></p>
<p>Lagomorph uses a limited colour set to create the gradients, backgrounds and shadows used in the theme. In the default these are a dark, mid and light colour for the gradients, buttons, etc; an off-white for the content background and an off-black for the header titles. Main content text, links, etc. are the default standard colours.</p>';
$string['colourchoiceinfo'] = '';
$string['headerinfo'] = '';
$string['headerinfodesc'] = '<b>Lagomorph menu settings</b>';
$string['imageinfo'] = '<b>Page image</b>';
$string['imageinfodesc'] = 'Enter the URL for an image saved in an accessible location. This could be a site logo, but consider that this is not shown on smaller screens.';
$string['menuchoice'] = 'Choose Menu layout';
$string['menuchoicedesc'] = 'Choose either <br />1. the Moodle2 standard CustomMenu only - this gives a full dropdown menu, but is hidden on the smallest screens<br />2. a single menu bar which converts to a select tool for small screens<br />3. Both menus';
$string['menuurl'] = 'URL for menu text file';
$string['menuurldesc'] = 'A horizontal menu can be set out from a text file stored, for example, in the Main Menu block on the front page. Any other location is suitable, provided that the location is accessible to all without any log in.<br />The menu should be set out as in the example here:<i><br />Google|http://www.google.co.uk;<br />BBC|http://www.bbc.co.uk;<br />BBC Sport|http://www.bbc.co.uk/sport;<br />Moodle|http://moodle.org<br /></i>Note:<br />1. each line is ended with a semi-colon, <b>except the last</b><br />2. The menu is restricted to a single line (ie. no dropdown) because of the restriction of converting the menu to a dropdown for mobile screens.';
$string['offblackcolour'] = 'Off-Black Colour';
$string['offblackdesc'] = 'Off-Black Colour: By default this colour is used for the header text.';
$string['offwhitecolour'] = 'Off-White Colour';
$string['offwhitedesc'] = 'Off-White Colour: By default this colour is used for the content background in the side blocks. It is also used as the text colour on the menu buttons.';
$string['pgimage'] = 'URL for page image';
$string['pgimage_title'] = 'Page image';
$string['pluginname'] = 'Lagomorph';
$string['settingurl'] = 'URL for settings text file';
$string['settingurldesc'] = 'Many of the CSS settings can be stored in a text file. This can be uploaded to the site (for example the Main Menu block on the front page) and the url entered here.<br/>Note:<br/>1. Care should be taken with url settings stored in this way as resources stored on the moodle site will have a different url if moved to another site.<br/>2. Settings stored in this text file will overwrite the default settings in the theme, but will themselves be overwritten by any values entered on the settings page itself.<br/>3. This only works for css settings, other settings such as the menu text file location will not be read from this text file.';
