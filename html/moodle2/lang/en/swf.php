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
 * Strings for component 'swf', language 'en', branch 'MOODLE_25_STABLE'
 *
 * @package   swf
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowfullscreen'] = 'Allow Full Screen';
$string['allownetworking'] = 'Allow Networking';
$string['allowscriptaccess'] = 'Allow Script Access';
$string['apikey'] = 'API Key';
$string['attempts'] = 'Attempts';
$string['average'] = 'Average';
$string['bgcolor'] = 'Flash Background Color';
$string['broken1'] = 'There is a problem';
$string['broken2'] = 'This application has not displayed correctly for one or more of the following reasons:';
$string['broken3'] = 'The application requires Flash Player';
$string['broken31'] = 'to be installed in your browser,';
$string['broken4'] = 'the application requires Javascript to be enabled in your browser,';
$string['broken5'] = 'or the URL to this application is incorrect.';
$string['broken6'] = 'Which version of Flash do I have installed?';
$string['broken7'] = 'Click on the Flash Player logo below to check your browser\'s Flash Player version:';
$string['broken8'] = 'Find my Flash Player version';
$string['configxml'] = 'Config XML File';
$string['configxml_help'] = 'Some apps can load files to configure their appearance and behaviour.';
$string['content_dir'] = 'Multimedia Content Directory';
$string['content_dir_explain'] = 'A directory that must be set up in Site Administration > Plugins > Repositories > Manage repositories.
    Enable File system and add a directory, e.g. /moodledata/repository/swfcontent/.
    This will allow uploading files through Moodle\'s file manager, as well as FTP.
    These files can then be accessed by Flash apps through /moodle/mod/swf/file.php with the respective paths and filenames passed in through FlashVars, SMIL, and/or XML.
    This provides native support for XML driven multimedia learning interactions.
    The SWF Activity Module automatically searches for .xml and .smil files in /moodledata/repository/swfcontent/*/xml/*.xml and *.smil and lists them in swf/mod_form.php.';
$string['disablegradehistory'] = 'Notice: Grade history has been disabled. Only final grades will be updated from now on.';
$string['download'] = 'Download video/audio';
$string['downloadrightclick'] = 'Right click to download video/audio';
$string['duration'] = 'Duration';
$string['durationhistory'] = 'Duration History';
$string['exiturl'] = 'Exit URL';
$string['exiturl_help'] = 'Some Flash apps may use this setting to navigate to a new page when the activity has been completed/finished or to open a new browser page for further information, e.g. a help page.';
$string['feedback'] = 'Feedback';
$string['fileurl'] = 'File Manager';
$string['fileurl_help'] = 'Pass in a file from Moodle\'s file manager.

Please note that if you pass in a file from a File system repository, it will be copied to Moodle\'s main file storage area. Edits to the file in File system must be updated by deleting the copy in the file manager and redeploying it, i.e.

* Edit file in File system (on your computer, then upload via FTP),
* Delete copy of file in File manager,
* Select edited file in File system again.';
$string['finalgrade'] = 'Final Grade';
$string['friday'] = 'Fri';
$string['grade'] = 'Grade';
$string['grade_accessed'] = 'Grade(s) successfully accessed.';
$string['gradebook'] = 'Grades';
$string['gradebook_title'] = 'Go to grade book';
$string['gradeedit1'] = 'Save and return to course';
$string['gradeedit2'] = 'Go to Course administration > Grades > Grader report';
$string['gradeedit3'] = 'Turn editing on';
$string['gradeedit4'] = 'Edit swf grade item (in "Controls" table row)';
$string['gradeedit5'] = 'Click "Show more..." to see all options';
$string['gradeedit6'] = 'You can edit grade settings in this way at any time.';
$string['gradeeditintro'] = 'Pass grade set to 0 by default';
$string['gradehistory'] = 'Grade History';
$string['grade_no_item'] = 'Grade item does not exist.';
$string['grade_no_permission'] = 'You do not have permission to access grades.';
$string['grade_saved'] = 'Your grade has been sent to the grade book.';
$string['header_swf'] = 'Learning Content';
$string['heatmap'] = 'SWF Activity Heatmap';
$string['height'] = 'Height';
$string['img_no_permission'] = 'You do not have permission to save images.';
$string['img_not_saved'] = 'There was a problem. Your image was not saved.';
$string['img_not_writeable'] = 'is not writeable.';
$string['img_saved'] = 'Your image was successfully saved.';
$string['installed_apps_dir'] = 'Installed Apps Directory';
$string['installed_apps_dir_explain'] = 'A standard directory where Flash apps are stored.
    The SWF Activity Module searches this directory for any Flash files and lists them in swf/mod_form.php.
    If your Moodle installation is in a subdirectory or a subdomain, you will need to edit this: e.g. for http://example.com/moodle/ (or http://moodle.example.com/ where the subdomain is in /moodle/) change /home/sites/example.com/mod/swf/swfs/ to /home/sites/example.com/moodle/mod/swf/swfs/';
$string['modulename'] = 'SWF';
$string['modulename_help'] = '<a href="http://code.google.com/p/swf-activity-module/" target="_blank">The SWF Activity Module</a> deploys Flash learning applications in Moodle. 3rd party Flash apps can be installed and it supports XML, SMIL and other external data and media driven learning applications. See the <a href="http://code.google.com/p/swf-activity-module/" target="_blank">SWF Activity Module</a> project site for details.

Developed by Matt Bury <a href="http://matbury.com/" target="_blank">matbury.com</a>';
$string['modulenameplural'] = 'SWFs';
$string['monday'] = 'Mon';
$string['namepair'] = 'Name';
$string['namepair_help'] = 'Useful examples of name value pairs...

Provide word lists for Word search MILA:

* Learning App: swfs/smil_word_search.swf
* Name: words
* Value: dog,cat,chicken,horse,beaver,platypus,kangaroo,mouse,etc.

Enable learners to input paragraphs into C-Test MILA:

* Learning App: swfs/smil_c_test.swf
* Name: input
* Value: true

Set higher difficulty level for Quick typing MILA:

* Learning App: swfs/smil_quick_typing.swf
* Name: difficulty
* Value: 0.8

For StrobeMediaPlayback:

* Learning App: swfs/StrobeMediaPlayback.swf
* Name: src
* Value: http://download.ted.com/talks/PaoloCardini_2012G-480p.mp4

* Learning App: swfs/StrobeMediaPlayback.swf
* Plugin: Strobe YouTube
* Name: src
* Value: https://www.youtube.com/watch?v=ttYapXJRFF4

* Learning App: swfs/StrobeMediaPlayback.swf
* Plugin: Strobe SMIL
* Name: src
* Value: http://mediapm.edgesuite.net/osmf/content/test/smil/elephants_dream.smil

JW Player:

* Learning App: swfs/player.swf
* Name: file
* Value: http://download.ted.com/talks/PaoloCardini_2012G-480p.mp4';
$string['nofile'] = 'None';
$string['nograde'] = 'No Grade';
$string['nohtml5'] = 'Your browser does not support the <code>video</code> element.';
$string['noswfs'] = 'There are no SWF activities';
$string['notpassed'] = 'Not Passed';
$string['pagecolor'] = 'Page Background Color';
$string['passed'] = 'Passed';
$string['plugin'] = 'Plugin';
$string['pluginadministration'] = 'SWF Administration';
$string['plugin_help'] = 'swfs/StrobeMediaPlayback.swf supports the following plugins...

* Strobe SMIL
* Strobe YouTube';
$string['pluginname'] = 'SWF';
$string['report'] = 'SWF Activity Report';
$string['salign'] = 'Stage Align';
$string['saturday'] = 'Sat';
$string['saved_files_dir'] = 'Saved Files Directory';
$string['saved_files_dir_explain'] = 'A subdirectory of the Multimedia Content Directory where users\' saved files are stored.';
$string['scale'] = 'Stage Scale Mode';
$string['seamlesstabbing'] = 'Seamless Tabbing';
$string['selectfile'] = 'Select...';
$string['sortby'] = 'Sort by';
$string['sortedby'] = 'Sorted by';
$string['sunday'] = 'Sun';
$string['swf'] = 'SWF';
$string['swf:addinstance'] = 'Add SWF';
$string['swffile'] = 'App';
$string['swffile_help'] = 'Choose a Flash app from the drop down list. Adjust the Flash Player settings to control how the app is displayed. New apps must be installed by a system administrator with server access. Do not install standalone learning applications here. Upload them as learning content files and use the swfs/preloader.swf app to load them.

To play a video:

* Learning App: swfs/StrobeMediaPlayback.swf
* Name: file
* Value: http://download.ted.com/talks/PaoloCardini_2012G-480p.mp4

To display and standalone Flash app:

* Learning App: swfs/preloader.swf
* Content URL/File: upload, select, or paste a link to the Flash app
* or name value pair:
* Name: xmlurl
* Value: http://example.com/learning/games/mygame.swf';
$string['swf:grade'] = 'Grade SWF';
$string['swfhelp'] = 'Help';
$string['swfhelp_title'] = 'Moodle docs for this page (Opens new window)';
$string['swf:submit'] = 'Submit SWF';
$string['swf:view'] = 'View SWF';
$string['thursday'] = 'Thur';
$string['time'] = 'Time';
$string['timecreated'] = 'Created';
$string['total'] = 'Total';
$string['tuesday'] = 'Tues';
$string['uploadedfile'] = 'Use File Manager File';
$string['urledit'] = 'SWF Content File';
$string['usermodified'] = 'Modified by';
$string['valuepair'] = 'Value';
$string['version'] = 'Version';
$string['viewreport'] = 'View activity report for';
$string['wednesday'] = 'Wed';
$string['width'] = 'Width';
$string['xmlurl'] = 'Content';
$string['xmlurl_help'] = 'This setting enables a URL for the content file to be specified, rather than choosing a file via the file picker.';
