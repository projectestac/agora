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
 * Strings for component 'theme_lernstar', language 'en', branch 'MOODLE_25_STABLE'
 *
 * @package   theme_lernstar
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['choosereadme'] = '<div class="clearfix">
<div class="well">
<h2>Lernstar</h2>
<p><img class=img-polaroid src="lernstar/pix/screenshot.jpg" /></p>
</div>
<div class="well">
<h3>About</h3>
<p>Lernstar is a modified Moodle bootstrap theme which inherits styles and renderers from its parent theme.</p>
</p>
<h3>Report a bug:</h3>
<p><a href="http://tracker.moodle.org">http://tracker.moodle.org</a></p>
<h3>More information</h3>
<p><a href="lernstar/README.txt">How to copy and customise this theme.</a></p>
</div></div>';
$string['configtitle'] = 'Lernstar';
$string['customcss'] = 'Custom CSS';
$string['customcssdesc'] = 'Whatever CSS rules you add to this textarea will be reflected in every page, making for easier customization of this theme.';
$string['devmode'] = 'Keep checked';
$string['devmodedesc'] = 'This enables the use of flavours.
		If you uncheck this, you have to rewrite the line starting with $THEME->sheets config.php like that:
		$THEME->sheets = array("styles","custom");
		Make sure the style/styles.css file is writeable by your webserver (chmod 777)
		before doing that. Otherwise changes will be lost after disabling this option.';
$string['facebooklink'] = 'Link to your facebook page (optional)';
$string['facebooklinkdesc'] = 'The link should look like this: http://www.facebook.com/yourpage';
$string['flavour'] = 'Choose a flavour for the theme';
$string['flavourdesc'] = 'Main color flavour for the theme. Purge the caches at /admin/purgecaches.php after changing the color in order to see the new color.';
$string['footer'] = 'Footer text and links';
$string['footerdesc'] = 'Put here your footer text and links like this: first text, http://firstlink.com; second text, http://secondlink.com;';
$string['footnote'] = 'Footnote';
$string['footnotedesc'] = 'Whatever you add to this textarea will be displayed in the footer throughout your Moodle site.';
$string['googlepluslink'] = 'Link to your google+ page (optional)';
$string['googlepluslinkdesc'] = 'The link should look like this: https://plus.google.com/+youracount/posts';
$string['invert'] = 'Invert navbar';
$string['invertdesc'] = 'Swaps text and background for the navbar at the top of the page between black and white.';
$string['logo'] = 'Logo';
$string['logodesc'] = 'Please upload your custom logo here if you want to add it to the header.<br>
If the height of your logo is more than 75px add the following CSS rule to the Custom CSS box below.<br>
a.logo {height: 100px;} or whatever height in pixels the logo is.';
$string['pluginname'] = 'Lernstar';
$string['region-side-post'] = 'Right';
$string['region-side-pre'] = 'Left';
$string['twitterlink'] = 'Link to your twitter account (optional)';
$string['twitterlinkdesc'] = 'The link should look like this: https://www.twitter.com/youraccount';
$string['youtubelink'] = 'Link to your YouTube channel (optional)';
$string['youtubelinkdesc'] = 'The link should look like this: http://www.youtube.com/yourchannel';
