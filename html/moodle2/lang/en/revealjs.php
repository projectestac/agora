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
 * Strings for component 'revealjs', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   revealjs
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['appearance'] = 'Appearance';
$string['autoslide'] = 'Auto Slide';
$string['autoslide_help'] = 'Automatically move on to the next slide on a timer. Only one time can be set for all slides.';
$string['backgroundtransition'] = 'Background Transition';
$string['backgroundtransition_help'] = 'Transition style for full page backgrounds';
$string['center'] = 'Center';
$string['center_help'] = 'Vertically center the text, images, and media on each slide.';
$string['choosefile'] = 'Choose a file...';
$string['configdisplayoptions'] = 'Select all options that should be available, existing settings are not modified. Hold CTRL key to select multiple fields.';
$string['content'] = 'Presentation content';
$string['contentdir'] = 'Presentation Directory';
$string['contentdirexplain'] = 'The directory where presentations and media files are stored.';
$string['content_error'] = '404 Error: File not found. Presentation settings and/or path to file not set correctly.';
$string['contentheader'] = 'Presentation';
$string['controls'] = 'Controls';
$string['controls_help'] = 'Show navigation controls at the bottom right of the screen.';
$string['createrevealjs'] = 'Create a new Presentation resource';
$string['data_dir'] = 'Files Directory';
$string['data_dir_error'] = 'Please check: A possible error occured while attempting to move /moodle/mod/swf/swf/ directory and all its contents to:';
$string['data_dir_exists'] = 'Files Directory is located at:';
$string['data_dir_explain'] = 'Directory were presentations and media files are located.';
$string['data_dir_moved'] = 'FIRST INSTALL Files Directory has been successfully moved:';
$string['data_structure'] = 'Directory Structure';
$string['data_structure_explain'] = 'How the files are organised and where the Presentation module will search for presentations.';
$string['data_url'] = 'URL';
$string['data_url_explain'] = 'URL to Files Directory (Proxy)';
$string['displayoptions'] = 'Available display options';
$string['displayselect'] = 'Display';
$string['displayselectexplain'] = 'Select display type.';
$string['history'] = 'Browser History';
$string['history_help'] = 'Makes the page URLs correspond to individual slides and records them in the user\'s browser history. This allows users to copy and paste links to specific slides within a presentation.';
$string['keyboard'] = 'Keyboard Shortcuts';
$string['keyboard_help'] = 'Enable keyboard shortcuts for navigation:

* up, down, left, right cursor keys,
* f = fullscreen,
* s = show notes';
$string['legacyfiles'] = 'Migration of old course file';
$string['legacyfilesactive'] = 'Active';
$string['legacyfilesdone'] = 'Finished';
$string['looped'] = 'Loop';
$string['margin'] = 'Margin';
$string['margin_help'] = 'Factor of the display size that should remain empty around the content: 0.1 = 10%';
$string['maxscale'] = 'Max Scale';
$string['maxscale_help'] = 'The maximum scale a presentation can scale up to: 1.0 = full size';
$string['minscale'] = 'Min Scale';
$string['minscale_help'] = 'The minimum scale a presentation can scale down to: 0.5 = half size';
$string['modulename'] = 'Presentation';
$string['modulename_help'] = 'The Presentation module enables a teacher to create a web presentation resource. A presentation can display text, images, sound, video, web links and embedded code, such as Google maps. It is intended as a web friendly alternative to PowerPoint and PDF slide shows.

It uses the Reveal.js library (See: https://github.com/hakimel/reveal.js).

Advantages of using the Presentation module rather than the file module include the resource being more accessible (for example to users of mobile devices) and easier to update.

For large amounts of content, it\'s recommended that a book is used rather than a Presentation.

A presentation may be used

* To present a series of slides and subslides with embedded multimedia
* To embed several videos or sound files together with some explanatory text';
$string['modulename_link'] = 'mod/revealjs/view';
$string['modulenameplural'] = 'Presentations';
$string['mousewheel'] = 'Mouse Wheel';
$string['mousewheel_help'] = 'Users can use their mouse wheel to navigate forward and back through the presentations.';
$string['neverseen'] = 'Never seen';
$string['optionsheader'] = 'Display options';
$string['overview'] = 'Overview';
$string['overview_help'] = 'Enable slide overview mode.';
$string['pluginadministration'] = 'Presentation module administration';
$string['pluginname'] = 'Presentation';
$string['popupheight'] = 'Pop-up height (in pixels)';
$string['popupheightexplain'] = 'Specifies default height of popup windows.';
$string['popupwidth'] = 'Pop-up width (in pixels)';
$string['popupwidthexplain'] = 'Specifies default width of popup windows.';
$string['presentation'] = 'Presentation';
$string['presentation_help'] = 'The presentation HTML fragment with the <code>section</code> parts containing the slides.';
$string['printheading'] = 'Display presentation name';
$string['printheadingexplain'] = 'Display presentation name above content?';
$string['printintro'] = 'Display presentation description';
$string['printintroexplain'] = 'Display presentation description above content?';
$string['progress'] = 'Progress Bar';
$string['progress_help'] = 'Shows a thin progress bar at the bottom of the screen.';
$string['revealjs:addinstance'] = 'Add a new Presentation resource';
$string['revealjs-mod-revealjs-x'] = 'Any Presentation module Presentation';
$string['revealjs:view'] = 'View presentation content';
$string['rtl'] = 'RTL';
$string['rtl_help'] = 'Set this to true if your presentation is in a right to left script, e.g. Arabic.';
$string['theme'] = 'Theme';
$string['theme_help'] = 'The appearance of the text font, colors, and styling for the content of the slides.';
$string['touch'] = 'Touchscreen';
$string['touch_help'] = 'Enable user input for touchscreens.';
$string['transition'] = 'Transition';
$string['transition_help'] = 'Transition style: Some transitions prevent video and audio playback controls from responding and prevent SVG animations from playing.';
$string['transitionspeed'] = 'Transition Speed';
$string['transitionspeed_help'] = 'Transition Speed';
