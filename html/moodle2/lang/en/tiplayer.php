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
 * Strings for component 'tiplayer', language 'en', branch 'MOODLE_23_STABLE'
 *
 * @package   tiplayer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['click_to_download'] = 'Click {$a} link to download the file.';
$string['click_to_open2'] = 'Click {$a} link to view the file.';
$string['config_display_options'] = 'Select all options that should be available, existing settings are not modified. Hold CTRL key to select multiple fields.';
$string['config_frame_size'] = 'When a web page or an uploaded file is displayed within a frame, this value is the height (in pixels) of the top frame (which contains the navigation).';
$string['config_parameter_settings'] = 'This sets the default value for the Parameter settings pane in the form when adding some new TI-Players. After the first time, this becomes an individual user preference.';
$string['config_popup'] = 'When adding a new TI-Player which is able to be shown in a popup window, should this option be enabled by default?';
$string['config_popup_directories'] = 'Should popup windows show directory links by default?';
$string['config_popup_height'] = 'What height should be the default height for new popup windows?';
$string['config_popup_location'] = 'Should popup windows show the location bar by default?';
$string['config_popup_menu_bar'] = 'Should popup windows show the menu bar by default?';
$string['config_popup_resizable'] = 'Should popup windows be resizable by default?';
$string['config_popup_scroll_bars'] = 'Should popup windows be scrollable by default?';
$string['config_popup_status'] = 'Should popup windows show the status bar by default?';
$string['config_popup_toolbar'] = 'Should popup windows show the tool bar by default?';
$string['config_popup_width'] = 'What width should be the default width for new popup windows?';
$string['content_header'] = 'Content';
$string['display_options'] = 'Available display options';
$string['display_select'] = 'Display';
$string['display_select_explain'] = 'Choose display type, unfortunately not all types are suitable for all files.';
$string['display_select_help'] = 'This setting, together with the file type and whether the browser allows embedding, determines how the file is displayed. Options may include:

* Automatic - The best display option for the file type is selected automatically
* Embed - The file is displayed within the page below the navigation bar together with the file description and any blocks
* Open - Only the file is displayed in the browser window
* In frame - The file is displayed within a frame below the the navigation bar and file description
* New window - The file is displayed in a new browser window with menus and an address bar';
$string['display_select_link'] = 'mod/tiplayer/mod';
$string['dnd_upload_tiplayer'] = 'Create file TI-Player';
$string['encrypted_code'] = 'Encrypted code';
$string['err_file_extension'] = '{$a} is not  TI-Player File.';
$string['file_not_found'] = 'File ({$a}) not found, sorry.';
$string['filter_files'] = 'Use filters on file content';
$string['filter_files_explain'] = 'Select type of file content filtering, please note this may cause problems for some Flash and Java applets. Please make sure that all text files are in UTF-8 encoding.';
$string['filter_name'] = 'Resource names auto-linking';
$string['force_download'] = 'Force download';
$string['frame_size'] = 'Frame height';
$string['legacy_files'] = 'Migration of old course file';
$string['legacy_files_active'] = 'Active';
$string['legacy_files_done'] = 'Finished';
$string['modulename'] = 'TI-Player';
$string['modulename_help'] = 'The TI-Player module enables a teacher to provide a file as a course TI-Player. Where possible, the file will be displayed within the course interface; otherwise students will be prompted to download it.

Note that students need to have the appropriate software on their computers in order to open the file.

A file may be used

* To share presentations given in class
* To include a mini website as a course TI-Player
* To provide draft files of certain software programs (eg Photoshop .psd) so students can edit and submit them for assessment';
$string['modulename_link'] = 'mod/tiplayer/view';
$string['modulenameplural'] = 'TI-Players';
$string['never_seen'] = 'Never seen';
$string['not_migrated'] = 'This legacy TI-Player type ({$a}) was not yet migrated, sorry.';
$string['options_header'] = 'Options';
$string['page-mod-tiplayer-x'] = 'Any TI-Player module page';
$string['pluginadministration'] = 'TI-Player module administration';
$string['pluginname'] = 'TI-Player';
$string['popup_height'] = 'Popup height (in pixels)';
$string['popup_height_explain'] = 'Specifies default height of popup windows.';
$string['popup_tiplayer'] = 'This TI-Player should appear in a popup window.';
$string['popup_tiplayer_link'] = 'If it didn\'t, click here: {$a}';
$string['popup_width'] = 'Popup width (in pixels)';
$string['popup_width_explain'] = 'Specifies default width of popup windows.';
$string['print_heading'] = 'Display TI-Player name';
$string['print_heading_explain'] = 'Display TI-Player name above content? Some display types may not display TI-Player name even if enabled.';
$string['print_intro'] = 'Display TI-Player description';
$string['print_intro_explain'] = 'Display TI-Player description below content? Some display types may not display description even if enabled.';
$string['select_main_file'] = 'Please select the main file by clicking the icon next to file name.';
$string['show_size'] = 'Show size';
$string['show_size_desc'] = 'Display file size on course page?';
$string['show_size_help'] = 'Displays the file size, such as \'3.1 MB\', beside links to the file.

If there are multiple files in this TI-Player, the total size of all files is displayed.';
$string['show_type'] = 'Show type';
$string['show_type_desc'] = 'Display file type (e.g. \'Word document\') on course page?';
$string['show_type_help'] = 'Displays the type of the file, such as \'Word document\', beside links to the file.

If there are multiple files in this TI-Player, the start file type is displayed.

If the file type is not known to the system, it will not display.';
$string['tiplayer:addinstance'] = 'Add a new TI-Player';
$string['tiplayer_content'] = 'Files and subfolders';
$string['tiplayer_details_size_type'] = '{$a->size} {$a->type}';
$string['tiplayer_display_auto'] = 'Automatic';
$string['tiplayer_display_download'] = 'Force download';
$string['tiplayer_display_embed'] = 'Embed';
$string['tiplayer_display_frame'] = 'In frame';
$string['tiplayer_display_new'] = 'New window';
$string['tiplayer_display_open'] = 'Open';
$string['tiplayer_display_popup'] = 'In pop-up';
$string['tiplayer:export_tiplayer'] = 'Export TI-Player';
$string['tiplayer:view'] = 'View TI-Player';
$string['url_ti_player'] = 'TI Player';
$string['url_ti_player_explain'] = 'URL field for the server player';
