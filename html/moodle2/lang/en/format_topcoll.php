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
 * Strings for component 'format_topcoll', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   format_topcoll
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['arrow'] = 'Arrow';
$string['center'] = 'Centre';
$string['colourrule'] = 'Please enter a valid RGB colour, six hexadecimal digits.';
$string['columnhorizontal'] = 'Horizontal';
$string['columnvertical'] = 'Vertical';
$string['ctreset'] = 'Collapsed Topics reset options';
$string['ctreset_help'] = 'Reset to Collapsed Topics defaults.';
$string['currentsection'] = 'This section';
$string['defaultcoursedisplay'] = 'Course display default';
$string['defaultcoursedisplay_desc'] = 'Either show all the sections on a single page or section zero and the chosen section on page.';
$string['defaultlayoutcolumnorientation'] = 'Default column orientation';
$string['defaultlayoutcolumnorientation_desc'] = 'The default column orientation: Vertical or Horizontal.';
$string['defaultlayoutcolumns'] = 'Default number of columns';
$string['defaultlayoutcolumns_desc'] = 'Number of columns between one and four.';
$string['defaultlayoutelement'] = 'Default layout configuration';
$string['defaultlayoutelement_desc'] = 'The layout setting can be one of:

\'Default\' with everything displayed.

No \'Topic x\' / \'Week x\' / \'Day x\'.

No section number.

No \'Topic x\' / \'Week x\' / \'Day x\' and no section number.

No \'Toggle\' word.

No \'Toggle\' word and no \'Topic x\' / \'Week x\' / \'Day x\'.

No \'Toggle\' word, no \'Topic x\' / \'Week x\' / \'Day x\' and no section number.';
$string['defaultlayoutstructure'] = 'Default structure configuration';
$string['defaultlayoutstructure_desc'] = 'The structure setting can be one of:

Topic

Week

Latest Week First

Current Topic First

Day';
$string['defaulttgbgcolour'] = 'Default toggle background colour';
$string['defaulttgbgcolour_desc'] = 'Toggle background colour in hexidecimal RGB.';
$string['defaulttgbghvrcolour'] = 'Default toggle background hover colour';
$string['defaulttgbghvrcolour_desc'] = 'Toggle background hover colour in hexidecimal RGB.';
$string['defaulttgfgcolour'] = 'Default toggle foreground colour';
$string['defaulttgfgcolour_desc'] = 'Toggle foreground colour in hexidecimal RGB.';
$string['defaulttogglealignment'] = 'Default toggle text alignment';
$string['defaulttogglealignment_desc'] = '\'Left\', \'Centre\' or \'Right\'.';
$string['defaulttoggleallhover'] = 'Default toggle all icon hovers';
$string['defaulttoggleallhover_desc'] = '\'No\' or \'Yes\'.';
$string['defaulttoggleiconset'] = 'Default toggle icon set';
$string['defaulttoggleiconset_desc'] = '\'Arrow\' => Arrow icon set.

\'Point\' => Point icon set.

\'Power\' => Power icon set.';
$string['defaulttogglepersistence'] = 'Toggle persistence';
$string['defaulttogglepersistence_desc'] = '\'On\' or \'Off\'.  You may wish to turn off for an AJAX performance increase but user toggle selections will not be recalled on page refresh or revisit.

Note: If turning persistence off remove any rows containing \'topcoll_toggle_x\' in the \'name\' field
      of the \'user_preferences\' table in the database.  Where the \'x\' in \'topcoll_toggle_x\' will be
      a course id.';
$string['defaultuserpreference'] = 'What to do with the toggles when the user first accesses the course';
$string['defaultuserpreference_desc'] = 'States what to do with the toggles when the user first accesses the course.';
$string['formatsettings'] = 'Format reset settings';
$string['formatsettingsinformation'] = '<br />To reset the settings of the course format to the defaults, click on the icon to the right.';
$string['formattopcoll'] = 'Collapsed Topics';
$string['four'] = 'Four';
$string['hidefromothers'] = 'Hide section';
$string['left'] = 'Left';
$string['maincoursepage'] = 'Main course page';
$string['markedthissection'] = 'This section is highlighted as the current section';
$string['markthissection'] = 'Highlight this section as the current section';
$string['nametopcoll'] = 'Collapsed Topics';
$string['numbersections'] = 'Number of sections';
$string['off'] = 'Off';
$string['on'] = 'On';
$string['one'] = 'One';
$string['page-course-view-topcoll'] = 'Any course main page in the collapsed topics format';
$string['page-course-view-topcoll-x'] = 'Any course page in the collapsed topics format';
$string['pluginname'] = 'Collapsed Topics';
$string['point'] = 'Point';
$string['power'] = 'Power';
$string['resetallcolour'] = 'Reset colours for all Collapsed Topics courses';
$string['resetallcolour_help'] = 'Resets the colours to the default values for all courses so it will be the same as a course the first time it is in the Collapsed Topics format.';
$string['resetalllayout'] = 'Reset layouts for all Collapsed Topics courses';
$string['resetalllayout_help'] = 'Resets the layout to the default values for all courses so it will be the same as a course the first time it is in the Collapsed Topics format.';
$string['resetalltogglealignment'] = 'Reset toggle alignments for all Collapsed Topics courses';
$string['resetalltogglealignment_help'] = 'Resets the toggle alignment to the default values for all courses so it will be the same as a course the first time it is in the Collapsed Topics format.';
$string['resetalltoggleiconset'] = 'Reset the toggle icon set for all Collapsed Topics courses';
$string['resetalltoggleiconset_help'] = 'Resets the toggle icon set and toggle all hover to the default values for all courses so it will be the same as a course the first time it is in the Collapsed Topics format.';
$string['resetcolour'] = 'Reset colour';
$string['resetcolour_help'] = 'Resets the colours to the default values so it will be the same as a course the first time it is in the Collapsed Topics format.';
$string['resetlayout'] = 'Reset layout';
$string['resetlayout_help'] = 'Resets the layout to the default values so it will be the same as a course the first time it is in the Collapsed Topics format.';
$string['resettogglealignment'] = 'Reset toggle alignment';
$string['resettogglealignment_help'] = 'Resets the toggle alignment to the default values so it will be the same as a course the first time it is in the Collapsed Topics format.';
$string['resettoggleiconset'] = 'Reset the toggle icon set';
$string['resettoggleiconset_help'] = 'Resets the toggle icon set and toggle all hover to the default values so it will be the same as a course the first time it is in the Collapsed Topics format.';
$string['right'] = 'Right';
$string['section0name'] = 'General';
$string['sectionname'] = 'Section';
$string['setcolour'] = 'Set colour';
$string['setcolour_help'] = 'Contains the settings to do with the colour of the format within the course.';
$string['setlayout'] = 'Set layout';
$string['setlayoutcolumnorientation'] = 'Set column orientation';
$string['setlayoutcolumnorientation_help'] = 'Vertical - Sections go top to bottom.

Horizontal - Sections go left to right.';
$string['setlayoutcolumns'] = 'Set columns';
$string['setlayoutcolumns_help'] = 'How many columns to use.';
$string['setlayout_default'] = 'Default';
$string['setlayoutelements'] = 'Set elements';
$string['setlayoutelements_help'] = 'How much information about the toggles / sections you wish to be displayed.';
$string['setlayout_help'] = 'Contains the settings to do with the layout of the format within the course.';
$string['setlayout_no_section_no'] = 'No section number';
$string['setlayout_no_toggle_section_x'] = 'No toggle section x';
$string['setlayout_no_toggle_section_x_section_no'] = 'No toggle section x and section number';
$string['setlayout_no_toggle_word'] = 'No toggle word';
$string['setlayout_no_toggle_word_toggle_section_x'] = 'No toggle word and toggle section x';
$string['setlayout_no_toggle_word_toggle_section_x_section_no'] = 'No toggle word, toggle section x and section number';
$string['setlayoutstructure'] = 'Set structure';
$string['setlayoutstructurecurrenttopicfirst'] = 'Current Topic First';
$string['setlayoutstructureday'] = 'Day';
$string['setlayoutstructure_help'] = 'The layout structure of the course.  You can choose between:

\'Topics\' - where each section is presented as a topic in section number order.

\'Weeks\' - where each section is presented as a week in ascending week order from the start date of the course.

\'Current Week First\' - which is the same as weeks but the current week is shown at the top and preceding weeks in decending order are displayed below except in editing mode where the structure is the same as \'Weeks\'.

\'Current Topic First\' - which is the same as \'Topics\' except that the current topic is shown at the top if it has been set.

\'Day\' - where each section is presented as a day in ascending day order from the start date of the course.';
$string['setlayoutstructurelatweekfirst'] = 'Current Week First';
$string['setlayoutstructuretopic'] = 'Topic';
$string['setlayoutstructureweek'] = 'Week';
$string['settogglealignment'] = 'Set the toggle text alignment';
$string['settogglealignment_help'] = 'Sets the alignment of the text in the toggle.';
$string['settoggleallhover'] = 'Set toggle all icon hover';
$string['settoggleallhover_help'] = 'Sets if the toggle all icons will change when the mouse moves over them.';
$string['settogglebackgroundcolour'] = 'Toggle background';
$string['settogglebackgroundcolour_help'] = 'Sets the background colour of the toggle.';
$string['settogglebackgroundhovercolour'] = 'Toggle background hover';
$string['settogglebackgroundhovercolour_help'] = 'Sets the background colour of the toggle when the mouse moves over it.';
$string['settoggleforegroundcolour'] = 'Toggle foreground';
$string['settoggleforegroundcolour_help'] = 'Sets the colour of the text on the toggle.';
$string['settoggleiconset'] = 'Set icon set';
$string['settoggleiconset_help'] = 'Sets the icon set of the toggle.';
$string['showfromothers'] = 'Show section';
$string['three'] = 'Three';
$string['topcollall'] = 'sections.';
$string['topcoll:changecolour'] = 'Change or reset the colour';
$string['topcoll:changelayout'] = 'Change or reset the layout';
$string['topcoll:changetogglealignment'] = 'Change or reset the toggle alignment';
$string['topcoll:changetoggleiconset'] = 'Change or reset the toggle icon set';
$string['topcollclosed'] = 'Close all';
$string['topcollopened'] = 'Open all';
$string['topcollsidewidth'] = '28px';
$string['topcolltoggle'] = 'Toggle';
$string['two'] = 'Two';
