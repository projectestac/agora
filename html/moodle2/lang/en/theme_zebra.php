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
 * Strings for component 'theme_zebra', language 'en', branch 'MOODLE_25_STABLE'
 *
 * @package   theme_zebra
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['backgroundurl'] = 'Background URL';
$string['backgroundurldesc'] = '<p>Input the URL to your body background image.</p><p>This can be used in Moodle Output format (relative to theme), full path, or relative path.</p>';
$string['bodybgcolor'] = 'Body background color';
$string['bodybgcolordesc'] = '<p>Main background color of the page.</p><p>This is applied to the <code>&lt;html&gt;</code> tag.</p>';
$string['branding'] = 'Hide footer logos';
$string['brandingdesc'] = '<p>Hide the branded logos in the footer.</p><p>These links are to sites that either sponsored or contributed directly to development of this theme.  Full credits can be found in the readme when selecting this theme.</p>';
$string['calcourse'] = 'Calendar course events';
$string['calcoursedesc'] = '<p>Sets the color used to represent course events in the calendar.</p>';
$string['calglobal'] = 'Calendar global events';
$string['calglobaldesc'] = '<p>Sets the color used to represent global events in the calendar.</p>';
$string['calgroup'] = 'Calendar group events';
$string['calgroupdesc'] = '<p>Sets the color used to represent group events in the calendar.</p>';
$string['callink'] = 'Calendar link';
$string['callinkdesc'] = '<p>Show the date with a link to the calendar at the end of the custom menu.</p>';
$string['caluser'] = 'Calendar user events';
$string['caluserdesc'] = '<p>Sets the color used to represent user events in the calendar.</p>';
$string['calweekend'] = 'Calendar weekend color';
$string['calweekenddesc'] = '<p>Sets the font color used for weekends on the calendar.</p>';
$string['cfmaxversion'] = 'Maximum IE version';
$string['cfmaxversiondesc'] = '<p>Note: <a href="#admin-usecf"><code>usecf</code></a> must be enabled for this to work.</p><p>This is the maximum version of Internet Explorer to prompt users to install Chrome Frame.  Versions above this will not be prompted.</p>';
$string['choosereadme'] = '<div class="clearfix">
	<h2>Zebra</h2>
        <hr>
		<h3>About</h3>
		<p>Zebra is a mobile-first, responsive theme that uses CSS3 to reflow the layout for the best experience on every device.</p>
        <p>Zebra also provides extensive customization via its settings page, including colors, logos, responsive settings, and custom CSS and JavaScript options.</p>
		<h3>Parents</h3>
		<p>This theme is built on Base but uses a custom page layout and dock.  This, and all other themes included in the Moodle core, are licensed under the <a href="http://www.gnu.org/licenses/gpl.html">GNU General Public License</a>.</p>
		<p>The underlying page layout (<a href="http://iyware.com/antioch">antioch</a>), designed independently of Moodle 2.0 by Danny Wahl @<a href="http://iyware.com">iyWare</a>, and capable of being used standalone, is also licensed under the GNU General Public License v3.</p>
		<h3>Other Components</h3>
		<p>This theme utilizes other open source libraries and the rights of those libraries belong to their authors.  More information can be found on the <a href="../admin/settings.php?section=themesettingzebra">Zebra Theme Settings</a> page.</p>
		<h3>Theme Discussion Forum:</h3>
		<p><a href="https://moodle.org/mod/forum/discuss.php?d=217191">https://moodle.org/mod/forum/discuss.php?d=217191</a></p>
		<h3>Theme Plugin URL:</h3>
        <p><a href="https://moodle.org/plugins/view.php?plugin=theme_zebra">http://moodle.org/plugins/view.php?plugin=theme_zebra</a></p>
        <h3>Theme Credits</h3>
		<p><a href="http://iyware.com">Danny Wahl</a></p>
        <h3>Don\'t forget to customize your settings!</h3>
        <a href="../admin/settings.php?section=themesettingzebra">Zebra Theme Settings</a>
	</div>
</div>';
$string['colorscheme'] = 'Color scheme';
$string['colorschemedesc'] = '<p>Gradients and highlights.</p><p>Note: Safari 4 does not accept a fixed height gradient so it will always display as "none".</p>';
$string['colorsinfo'] = 'General colors settings';
$string['colorsinfodesc'] = '<p>Change the settings for the colors of the page.</p><p>You can use any valid color type like <code>red</code>, <code>#FF0000</code>, <code>rgb(0, 255, 255)</code>, or <code>rgba(0, 255, 255, 1.0)</code>.</p>';
$string['columnbgcolor'] = 'Columns background color';
$string['columnbgcolordesc'] = '<p>Column(s) background color.</p><p>This is applied to different elements depending on the current view (please see pagelayout.css for more details) but generally this is the region-pre and region-post (a.k.a. block areas).</p>';
$string['columninfo'] = 'Layout Settings';
$string['columninfodesc'] = '<p>Change the settings for the layout of the page.  To test your settings simply resize your browser window or rotate the orientation of your phone/tablet.</p><figure style="float: left;"><img src="../theme/image.php?theme=zebra&image=core/one_column&component=theme"/><figcaption><ul><li>top: <code>region-main</code></li><li>middle: <code>region-pre</code></li><li>bottom: <code>region-post</code></li></ul></figcaption></figure><figure style="float: left;"><img src="../theme/image.php?theme=zebra&image=core/two_columns&component=theme"/><figcaption><ul><li>top left: <code>region-pre</code></li><li>bottom left: <code>region-post</code></li><li>right: <code>region-main</code></li></ul></figcaption></figure><figure style="float: left;"><img src="../theme/image.php?theme=zebra&image=core/three_columns&component=theme"/><figcaption><ul><li>left: <code>region-pre</code></li><li>center: <code>region-main</code></li><li>right: <code>region-post</code></li></ul></figcaption></figure><br style="clear: left;" />';
$string['colwidth'] = 'Column width';
$string['colwidthdesc'] = '<p>Width of columns.  This is <code>region-pre</code> and <code>region-post</code>.</p>';
$string['compatinfo'] = 'Browser compatibility settings';
$string['compatinfodesc'] = '<p>Various settings to attempt to improve browser compatibility with this theme for a more consistent user experience.</p>';
$string['contentbgcolor'] = 'Page background color';
$string['contentbgcolordesc'] = '<p>Content background color.</p><p>This is applied to different elements depending on the current view (please see pagelayout.css for more details) but generally this is the content of the page.  This is also applied to the custommenu links color.</p>';
$string['criticalfontcolor'] = 'Critical font color';
$string['criticalfontcolordesc'] = '<p>Sets the font color used for things that generate a critical notice.  Generally this is <code>.statuscritical</code>, <code>.red</code>, and <code>.notifyproblem</code>.</p>';
$string['customcss'] = 'Custom CSS';
$string['customcssdesc'] = '<p>Input any custom CSS here.</p><p>CSS input here is the very last thing called on the page and should not be overwritten by any other rules.  If your rules are not displaying please try the following:<ol><li>check your syntax</li><li>add <code>!important</code> to your rule</li><li>manually append the rule to extra.css</li></ol></p>';
$string['customjs'] = 'Custom JavaScript';
$string['customjsdesc'] = '<p>Input any custom JavaScript here.</p><p>JS input here is called inline in the page footer.  Any text input here will be wrapped in <code>script</code> tags.</p>';
$string['dateformat'] = 'Date format';
$string['dateformatdesc'] = '<p>Note: This requires <a href="#admin-callink"><code>callink</code></a> to be enabled.</p><p>Set a format for displaying the date in the custom menu.  For more information on the date() function please see the php.net docs <a href="http://php.net/manual/en/function.date.php" title="PHP: date - Manual">here</a>.</p>';
$string['donate'] = 'Donate with PayPal';
$string['donatedesc'] = '<p style="text-align:center;">If you think this theme and its features are worth a few bucks then please donate toward its continued development.<br/><br/><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=danny%40iywahl%2ecom&lc=US&item_name=iyWare&item_number=Zebra%202%20&currency_code=USD" style="background: url(data:image/png;base64,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) no-repeat scroll 8px 4px #234B6F; padding: 8px 22px 12px 54px; color:#fff; border-radius:4px;box-shadow:1px 1px 1px rgba(0, 0, 0, 0.2), 0 1px 0 rgba(255, 255, 255, 0.2) inset;text-align:center;text-shadow:0 1px 1px rgba(0, 0, 0, 0.3);text-decoration:none;">Donate</a></p>';
$string['fontcolor'] = 'Font color';
$string['fontcolordesc'] = '<p>Primary font and label color.</p><p>This is applied to all labels and fonts that do not have a specific class that overrides the color like <code>.warning</code> or <code>.notifysuccess</code>.  This is also applied to the background color of the "date" on the custommenu.</p>';
$string['footerbgcolor'] = 'Footer background color';
$string['footerbgcolordesc'] = '<p>Footer background color.</p><p>Using <code>transparent</code> will cause the footer to display the value of <code>contentbgcolor</code> not <code>bodybgcolor</code>.  This should be set to the same value as <code>bodybgcolor</code> for a transparent effect.</p>';
$string['headeralt'] = 'Alternate text';
$string['headeraltdesc'] = '<p>Text to use instead of the Site Name.</p><p>Hint: Use a space (<code>&amp;nbsp;</code>) to display nothing.</p>';
$string['headerbgcolor'] = 'Header background color';
$string['headerbgcolordesc'] = '<p>Header background color.</p>';
$string['headerinfo'] = 'Header settings';
$string['headerinfodesc'] = '<p>Change the settings for the header region.</p>';
$string['homeicon'] = 'Show home icon';
$string['homeicondesc'] = '<p>Show the home icon at the beginning of the custom menu.</p>';
$string['hovercolor'] = 'Hover color';
$string['hovercolordesc'] = '<p>Hovering color.</p><p>This is applied to all links (in and out of the page content) and the custommenu.</p>';
$string['linkcolor'] = 'Links color';
$string['linkcolordesc'] = '<p>Links and menu color.</p><p>This is applied to all links (in and out of page content) except the custommenu and the custommenu background with the exception of the "date".</p>';
$string['logourl'] = 'Logo URL';
$string['logourldesc'] = '<p>Input the URL to your logo.  Leave blank for no image.</p><p>This can be used in one of three protocol types:<ul><li><p>Moodle Output (relative to theme):</p><p><code>logo/companylogo</code></p></li><li><p>Full path:</p><p><code>http://domain.com/theme/image.php?theme=zebra&image=logo&rev=1&component=theme</code><br /><code>http://domain.com/path/to/image.jpg</code></p></li><li><p>Relative Path:</p><p><code>/path/to/file/companylogo.png</code></p></li></ul></p>';
$string['menucolorscheme'] = 'Menu color scheme';
$string['menucolorschemedesc'] = '<p>Gradient of menu.</p>';
$string['menuhome'] = 'Home';
$string['menumyhome'] = 'My Home';
$string['menutoday'] = 'Today\'s date';
$string['miscinfo'] = 'Misc. settings';
$string['miscinfodesc'] = '<p>Change the settings for miscellaneous things.</p>';
$string['moodlecolorsinfo'] = 'Moodle colors settings';
$string['moodlecolorsinfodesc'] = '<p>Change specific colors that are defined in the Moodle core and are outside of the general colors defined above.  These include things like <code>.notifysuccess</code> and calendar event type colors.  These probably do not need to be adjusted unless you have a specific conflict with the general color settings above.</p>';
$string['notes'] = 'Theme notes';
$string['notesdesc'] = '<p>To apply any settings simply press "Save Changes" at the bottom of this page.</p><p>If you do not have Theme Designer Mode enabled you may need to visit the <a href="purgecaches.php">Purge All Caches</a> admin page to force the refresh.</p>';
$string['okfontcolor'] = 'OK/Good font color';
$string['okfontcolordesc'] = '<p>Sets the font color used for things that worked like saving settings, etc...  Specific examples are <code>.green</code> and <code>.notifysuccess</code>.</p>';
$string['pagemaxwidth'] = 'Page max width';
$string['pagemaxwidthdesc'] = '<p>Max width for page content.</p>';
$string['pluginname'] = 'Zebra';
$string['region-side-post'] = 'Right';
$string['region-side-pre'] = 'Left';
$string['schemedark'] = 'Dark';
$string['schemeinfo'] = 'Color scheme settings';
$string['schemeinfodesc'] = '<p>Change the settings for the color scheme of the page.</p>';
$string['schemelight'] = 'Light';
$string['schemenone'] = 'None';
$string['seriousfontcolor'] = 'Serious font color';
$string['seriousfontcolordesc'] = '<p>Sets the font color used for things that generate a serious notice.  Generally this is <code>.statusserious</code>.</p>';
$string['simplelogin'] = 'Use a basic login form';
$string['simplelogindesc'] = '<p>Enabling this option will simply the login page layout by not displaying the header, footer, navbar, lang menu, or custommenu.  This option can be use for sites that require authentication before access to those items is granted.</p>';
$string['threecolmin'] = 'Three column min width';
$string['threecolmindesc'] = '<p>Min width for three column layout.  Display order is:</p>';
$string['twocolmin'] = 'Two column min width';
$string['twocolmindesc'] = '<p>Min width for two column layout.</p>';
$string['useautohide'] = 'Include Autohide CSS';
$string['useautohidedesc'] = '<p>Include the Autohide rules for users in Edit Mode.</p><p>Read more about this feature <a href="http://moodle.org/mod/forum/discuss.php?d=197470">here</a> or <a href="http://www.moodlenews.com/2012/a-moodle-administrators-dream-come-true-autohide-for-moodle-2-2/">here</a>.</p>';
$string['usecf'] = 'Prompt users to install Google Chrome Frame';
$string['usecfdesc'] = '<p>Google <a href="http://code.google.com/chrome/chromeframe/">Chrome Frame</a> is an Internet Explorer plugin that installs the Chromium Rendering engine on older browsers and enables them to use modern web technologies.</p>';
$string['userespond'] = 'Include respond.js in footer';
$string['useresponddesc'] = '<p><a href="https://github.com/scottjehl/Respond#readme">Respond.js</a> will attempt to parse the <code>@media</code> queries in the CSS and serve the proper one to browsers that do not natively support them (like IE8 and below).</p>';
$string['userpic'] = 'Show user picture';
$string['userpicdesc'] = '<p>Show the user\'s profile picture in the header</p>';
$string['warningfontcolor'] = 'Warning font color';
$string['warningfontcolordesc'] = '<p>Sets the font color used for things that generate a warning.  Generally this is <code>.statuswarning</code>.</p>';
