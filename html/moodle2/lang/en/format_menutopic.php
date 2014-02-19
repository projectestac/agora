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
 * Strings for component 'format_menutopic', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   format_menutopic
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actionadd_sheet_daughter_sheetedit'] = 'Add as daughter sheet';
$string['actionadd_sheet_sister_sheetedit'] = 'Add as sister sheet';
$string['actiondeleteconfirm_sheet_sheetedit'] = 'If you delete the sheet will delete all child sheets. Are you really sure want to continue?';
$string['actiondelete_sheet_sheetedit'] = 'Delete';
$string['actiondown_sheet_sheetedit'] = 'Move down';
$string['actionleft_sheet_sheetedit'] = 'Move left';
$string['actionright_sheet_sheetedit'] = 'Move right';
$string['actionsave_sheet_sheetedit'] = 'Change sheet data';
$string['actions_sheet_sheetedit'] = 'Actions on the sheet';
$string['actionup_sheet_sheetedit'] = 'Move up';
$string['config_editmenu'] = 'Configurate';
$string['config_editmenu_title'] = 'Menu configuration';
$string['config_template_topic_title'] = 'Configurate -Title of the section as a template-';
$string['csscode'] = 'CSS code';
$string['cssdefault'] = 'Include default CSS styles';
$string['cssdefault_help'] = 'Defines if CSS styles are included by default to the menu. Disable this option can be useful to include customised styles by the option <b>"(CSS) styles template"</b>';
$string['csstemplate'] = 'About: CSS styles';
$string['csstemplate_editmenu'] = 'Styles templates (CSS)';
$string['csstemplate_editmenu_title'] = 'CSS styles';
$string['csstemplate_help'] = 'Allows to include customized CSS styles which you can define a customized graphic appearance for the menu
<p>A simple exercise of using the styles template will be:</p>
<div style=" white-space:nowrap; font-size: 12px; border: 1px solid #666; padding: 5px; background-color: #CCC">
#id_menu_box { margin-bottom: 10px; }
</div>
<p>With the previous code, the menu is separated 10px from the bottom, according to the position defined for the menu.</p>
<p><strong>Note:</strong>
<ul>
	<li>The identifier (id) of the layer (div) that the menu contains is <strong>id_menu_box</strong>. This data can be useful to manipulate the menu styles without to affect other components of the page.</li>
    <li>It is possible that to make changes in the styles, they cannot visualize immediately in the course. If so, it must refresh the page. In many browsers, you can do it pressing the key combination Ctrl+F5.</li>
</ul></p>';
$string['currentsection'] = 'This topic';
$string['displaynavigation'] = 'Display navigation';
$string['displaynavigation_help'] = 'Indicates whether to display navigation between sections and the position where the show.';
$string['displaynousedmod'] = 'Show resources not included in template';
$string['displaynousedmod_help'] = 'About: Show resources not included in template';
$string['editmenu'] = 'Edit menu';
$string['end_editmenu'] = 'End Edit Menu';
$string['error_jsontree'] = 'Error in data structure returned as tree composition';
$string['hidefromothers'] = 'Hide topic';
$string['htmlcode'] = 'HTML';
$string['htmltemplate_editmenu'] = 'HTML template';
$string['htmltemplate_editmenu_title'] = 'HTML';
$string['icons_templatetopic'] = 'Show icons in resources names';
$string['icons_templatetopic_help'] = 'About: Show icons in resources names';
$string['jscode'] = 'Code';
$string['jsdefault'] = 'Include default JavaScript';
$string['jsdefault_help'] = 'Defines if the Javascript functions that generate the menu are included. Disables the default javascript can be useful if you want to give another appearance to the menu using Javascript code that can be
included in the <b>"Javascript template"</b>.';
$string['jstemplate'] = 'JavaScript code';
$string['jstemplate_editmenu'] = 'Javascript template';
$string['jstemplate_editmenu_title'] = 'JavaScript code';
$string['jstemplate_help'] = 'Allows to define the JavaScript code that will work over the menu or the page. It can be useful to define additional behaviors for the menu
or even a menu structure different from the default.
<p><b>Notes:</b>
<ul>
	<li>The name <b>id_menu_box</b> corresponds to the div identifier that contains the menu in HTML created as nest lists, usually with the tags HTML: ul y li.</li>
    <li>It is possible that to make changes in the JavaScript, they cannot visualize immediately in the course. If so, it must refresh the page. In many browsers, you can do it pressing the key combination Ctrl+F5.</li>
</ul></p>';
$string['linkinparent'] = 'Make links in submenu fields root';
$string['linkinparent_help'] = '<p>Defines the behavior of the menu options that act as roots or fathers of a submenu.</p>
<p>If it is stablished in <b>Yes</b>, the menu item acts as a link to click on it and open the URL
that is defined in the <b>"Menu tree"</b>. If it is stablished in <b>Not</b>, the menu item deploys the son links to click
on it</p>';
$string['menuposition'] = 'Menu position';
$string['menuposition_help'] = '<p>Defines the position where the menu will appear in the course. The possible options are:
<ul>
	<li><b>Do not show:</b> menu is not generated</li>
	<li><b>Left:</b> menu is generated vertically in the column of the left blocks, if exist.</li>
	<li><b>Middle:</b> menu is generated horizontally as a bar in the middle part of the course, over the section</li>
	<li><b>Right:</b> menu is generated vertically in the column of the right blocks, if exist.</li>
</ul></p>';
$string['menuposition_hide'] = 'Do not show';
$string['menuposition_left'] = 'Left';
$string['menuposition_middle'] = 'Middle';
$string['menuposition_right'] = 'Right';
$string['name_sheet_sheetedit'] = 'Sheet name';
$string['navigationposition_both'] = 'Top and bottom';
$string['navigationposition_bottom'] = 'Bottom';
$string['navigationposition_nothing'] = 'Nothing';
$string['navigationposition_top'] = 'Top';
$string['next_topic'] = 'Next';
$string['nodesnavigation'] = 'Navigation nodes';
$string['nodesnavigation_help'] = '<p>Section numbers, separated by commas. <b>Example:</b> 1,2,8,10,3</p>. If empty, default navigation is used.
<p>The section numbers cannot be repeated because they will show navigation from the first match found.</p>';
$string['notsaved'] = 'Information could not be saved';
$string['page-course-view-topics'] = 'Any course main page in menutopic format';
$string['page-course-view-topics-x'] = 'Any course page in menutopic format';
$string['pluginname'] = 'Menutopic format';
$string['previous_topic'] = 'Previous';
$string['savecorrect'] = 'Information was succesfully saved';
$string['sectionname'] = 'Topic';
$string['separator_navigation'] = '-';
$string['showfromothers'] = 'Show topic';
$string['targetblank_sheet_sheetedit'] = 'New window';
$string['targetself_sheet_sheetedit'] = 'Same window';
$string['target_sheet_sheetedit'] = 'Link target';
$string['template_namemenutopic'] = 'Topic {$a}';
$string['templatetopic'] = 'Activate Title of the section as a template';
$string['templatetopic_help'] = 'About: Activate Title of the topic as a template';
$string['title_panel_sheetedit'] = 'Edit tree sheet';
$string['topic_sheet_sheetedit'] = 'Target section';
$string['tree_editmenu'] = 'Menu tree';
$string['tree_editmenu_title'] = 'Configurate subject tree';
$string['tree_struct'] = 'Tree structure';
$string['tree_struct_help'] = '<p>The basis of the menu is a tree structure where each branch or tree sheet can be associated to a URL. The URL can be external or directly linked to a course section. When you sign the first time to set the section tree, the platform suggests a lineal structure, without branches, with a quantity of sheets equal to the number of course sections.</p>
<p>To change the properties of a sheet, click on its name, and it will appear a window where you can: realize some actions to move the sheets, delete the selected sheet, create a new sheet or update the sheet data.</p>
<p>Among the options that you can do on the sheet are:</p>
<ul>
    <li><strong>Move a sheet to left:</strong> is done by selecting the arrow pointing left. Converts to the sheet in sister of the sheet that contains it (parent sheet). It is only available if the sheet is daughter of another sheet, never if it is in the main branch.</li>
    <li><strong>Move a sheet to right:</strong> is done by selecting the arrow pointing right. Converts to the sheet in daughter of the previous sheet. It is not available for the first sheet of the main branch.</li>
    <li><strong>Up a sheet:</strong> is done by selecting the arrow pointing up. Changes the order of a sheet putting it before its brother inmediately previous. It is not available for the first sheet of a branch.</li>
    <li><strong>Down a sheet:</strong> is done by selecting the arrow pointing down. Changes the order of a sheet putting it after its brother inmediately next. It is not available for the last sheet of a branch.</li>
    <li><strong>Delete a sheet:</strong> is done by selecting the X. Deletes the selected sheet and all sheets that it contains.</li>
</ul>
<p>The option <strong>&quot;Add as a new sheet&quot;</strong>creates a copy of the selected sheet and it adds it as its daughter. Daughter sheets are not copied, only the selected.</p>
<p>The option <strong>&quot;Change sheet data&quot; </strong>updates the select values to the properties of the selected sheet. The properties that can be modified are:</p>
<ul>
    <li><strong>Sheet name:</strong> the tag that appears for this sheet in the menu.</li>
    <li><strong>Target section:</strong> If the sheet is used for a course section, this option indicates what section will be the selected. If a section is selected, an external URL could not be selected to which direct the link of the option in the menu.</li>
    <li><strong>URL:</strong> indicates a URL to which will do reference the menu option. It is only can be especified if a target section was not selected.</li>
    <li><strong>Link target:</strong> Indicates if you want to open the link, the section or the external URL, in a new window or in the same window. If an option is not selected, the link will open in the same window.</li>
</ul>
<p>The changes realized in the menu are stored only to select the option <strong>&quot;Save changes&quot;</strong> at the bottom of the page.</p>';
$string['url_sheet_sheetedit'] = 'URL';
