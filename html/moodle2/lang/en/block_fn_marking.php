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
 * Strings for component 'block_fn_marking', language 'en', branch 'MOODLE_25_STABLE'
 *
 * @package   block_fn_marking
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['blocksettings'] = 'Configuring a FN Marking block';
$string['blocktitle'] = 'FN-Marking Manager';
$string['cfgdisplaytitle'] = 'Display title';
$string['config_days'] = 'Set the number of student not logged in x days';
$string['config_days_help'] = '<p>This setting allows to set  </p>
<p>the number of days that student have not logged in course.</p>';
$string['config_percent'] = 'Set the percent of marks';
$string['config_percent_help'] = '<p>This setting allows to set  </p>
<p>the percent of marks and after setting the percent you will see the number of student marks below x percent.</p>';
$string['config_showgradeslink'] = 'Show grade link';
$string['config_showgradeslink_help'] = '<p>This setting allows whether to show </p>
<p> or hide the grade link in block.</p>';
$string['config_showmarked'] = 'Show marked activities';
$string['config_showmarked_help'] = '<p>This setting allows whether to show .</p>
<p> or hide the marked activities in block.</p>';
$string['config_shownotloggedinuser'] = 'Show not logged in user';
$string['config_shownotloggedinuser_help'] = '<p>This setting allows whether to show </p>
<p> or hide the number of student not loggedin in previous week.</p>';
$string['config_showreportlink'] = 'Show report link';
$string['config_showreportlink_help'] = '<p>This setting allows whether to show </p>
<p> or hide the report link in block.</p>';
$string['config_showsaved'] = 'Show draft activities';
$string['config_showsaved_help'] = '<p>This setting allows whether to show .</p>
<p> or hide the student draft activities in block.</p>';
$string['config_showstudentmarkslessthanfiftypercent'] = 'Show student marks less than 50%';
$string['config_showstudentmarkslessthanfiftypercent_help'] = '<p>This setting allows whether to show </p>
<p> or hide the number of student marks less that 50%.</p>';
$string['config_showstudentnotsubmittedassignment'] = 'Show student not submitted assignment';
$string['config_showstudentnotsubmittedassignment_help'] = '<p>This setting allows whether to show </p>
<p> or hide the number of student not submitted assignment last week .</p>';
$string['config_showunmarked'] = 'Show unmarked activities';
$string['config_showunmarked_help'] = '<p>This setting allows whether to show .</p>
<p> or hide the unmarked activities in block.</p>';
$string['config_title'] = 'Instance title';
$string['config_title_help'] = '<p>This setting allows the block title to be changed.</p>
<p>If the block header is hidden, the title will not appear.</p>';
$string['config_unsubmitted'] = 'Show unsubmitted activities';
$string['config_unsubmitted_help'] = '<p>This setting allows whether to show </p>
<p> or hide the not submitted activities in block.</p>';
$string['descconfig'] = '<p>Activate this option to hide all blocks when viewing the Marking Manager interface
and provide a less cluttered look. Note that before activating this option, you will need to add this code
to <b><em>yourmoodlesite/theme/base/config.php</em>.</b></p>
<p></p>
<pre><code style="font-size:12px; color:#FF7600;">
// Hide left and right block columns when viewing the Marking Manager
\'markingmanager\' => array(
      \'file\' => \'general.php\',
      \'regions\' => array(),
      \'options\' => array(\'noblocks\'=>true),
),
</code></pre>
After you add the above code, your file should look like the image <a href="http://moodlefn.com/docs/marking_manager_no_blocks.png">shown here</a>.';
$string['displaytitle'] = 'Activities Submitted';
$string['fn_marking:addinstance'] = 'Add instance';
$string['fn_marking:viewblock'] = 'View block';
$string['fn_marking:viewreadonly'] = 'View readonly';
$string['grade'] = '<b>Grade: </b>';
$string['gradeslink'] = 'Grades';
$string['gradingstudentprogress'] = 'Showing {$a->index} of {$a->count}';
$string['headertitle'] = 'FN Marking Manager';
$string['labelnoblocks'] = 'Hide all blocks';
$string['marked'] = 'Graded';
$string['moodlegradebook'] = 'Open Moodle Gradebook';
$string['notloggedin'] = 'have not logged in for at least';
$string['notsubmittedany'] = 'have not submitted any activities for';
$string['overallfailinggrade'] = 'have an overall grade less than';
$string['pluginname'] = 'FN Marking Manager';
$string['reportslink'] = 'Reports';
$string['saved'] = 'Draft';
$string['setblocktitle'] = 'Set block title';
$string['setnumberofdays'] = 'Set number of days';
$string['setpercentmarks'] = 'Set percent of marks';
$string['show'] = 'Show';
$string['showgradeslink'] = 'Grades Link';
$string['showmarked'] = 'Marked Activities';
$string['shownotloggedinuser'] = 'Show not logged in user';
$string['showreportslink'] = 'Reports Link';
$string['showsaved'] = 'Show draft activities';
$string['showstudentmarkslessthanfiftypercent'] = 'Show no of student marks less than 50 percent';
$string['showstudentnotsubmittedassignment'] = 'Show no of student not submitted assignment';
$string['showtopmessage'] = 'Show message above interface';
$string['showunmarked'] = 'Requires Grading';
$string['showunsubmitted'] = 'Unsubmitted Activities';
$string['simplegradebook'] = 'Gradebook';
$string['sort'] = 'Sort';
$string['title:failingwithgradelessthanxpercent'] = 'The following students have an overall grade less than';
$string['title:markslessthanxpercent'] = 'The Following Students Have Not Submitted Any Activities For';
$string['title:notlogin'] = 'The Following Students Have Not Logged in For';
$string['title:notsubmittedanyactivity'] = 'The Following Students Have Not Submitted Any Activities For';
$string['title:saved'] = 'The Following Students Have Draft Activities';
$string['topmessage'] = 'Message to show';
$string['ttmarking'] = 'Marking Interface';
$string['unmarked'] = 'Requires Grading';
$string['unsubmitted'] = 'Not Submitted';
$string['view'] = 'View';
