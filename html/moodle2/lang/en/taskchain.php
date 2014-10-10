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
 * Strings for component 'taskchain', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   taskchain
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = 'Abandoned';
$string['activitycloses'] = 'TaskChain activity closes';
$string['activitygrade'] = 'Activity grade';
$string['activityname'] = 'Activity name';
$string['activityopens'] = 'TaskChain activity opens';
$string['added'] = 'Added';
$string['addtaskchain_help'] = '**No**
Only one task will be added to the course

**Yes**
If the source file is a **task file**, it is treated as the start of a chain of tasks and all tasks in the chain will be added to the course with identical settings. Each task in the chain must have a link to the next file in the chain.

If the source file is a **folder**, all recognizable tasks in the folder will be added to the course to form a chain of tasks with identical settings.

If the source file is a **chain file**, such as a Hot Potatoes masher file or index.html, tasks listed in the chain file will be added to the course as a chain of tasks with identical settings.';
$string['addtasks'] = 'Add (more) tasks';
$string['addtype'] = 'Files to be added';
$string['addtypeauto'] = 'Detect automatically';
$string['addtypechainfile'] = 'Add all files listed in selected file';
$string['addtypechainfolder'] = 'Add all files in selected folder';
$string['addtypechainfolders'] = 'Add all files in all folders';
$string['addtype_help'] = 'Which files should be added as tasks?

**Detect automatically**
: If a file is selected, then it is treated either as a **task file** at the start of a chain of tasks, or as **chain file** that contains a list files to be added. If no file is selected, all recognizeable files in the folder are added as tasks.

**Add selected file only**
: Only the selected source file will be added to this activity as a task.

**Add chain starting at selected file**
: The selected source file is assumed to be a **task file** at the start of a chain of tasks. All tasks in the chain will be added to this activity. Each task must have a link to the next task in the chain.

**Add all files listed in selected file**
: The selected source file is assumed to be **chain file**, such as a Hot Potatoes masher file or index.html. Any tasks listed in the selected file will be added to this activity.

**Add all files in selected folder**
: All recognizable task files in the source folder will be added to this activity.

**Add all files in all folders**
: All recognizable task files in the source folder and all its subfolders will be added to this activity.';
$string['addtypetaskchain'] = 'Add chain starting at selected file';
$string['addtypetaskfile'] = 'Add selected file only';
$string['afterattempt'] = 'After attempt';
$string['afterclose'] = 'After close';
$string['aftertaskid'] = 'After task';
$string['aftertaskid_help'] = 'After task';
$string['allowfreeaccess'] = 'Allow free access';
$string['allowfreeaccess_help'] = 'This setting specifies whether or not students are given free access to the tasks in this TaskChain.

Once students have free access, they can access any task in the TaskChain, regardless of the tasks\' pre-conditions and post-conditions.

**No**
: The students will not be given free access to tasks in the TaskChain. In other words, access to the tasks will always be controlled by the tasks\' pre-conditions and post-conditions.

**Yes: Grades**
: The students will be given free access to the tasks in the TaskChain, once they have achieved the required grade

**Yes: Attempts**
: The students will be given free access to the tasks in the TaskChain, once they have completed the required number of attempts.';
$string['allowpaste'] = 'Allow paste';
$string['allowpaste_help'] = 'If this setting is enabled, students will be allowed to copy, paste and drag text into text input boxes.';
$string['allowresume'] = 'Allow resume';
$string['allowresume_help'] = 'This setting specifies whether or not students can resume an attempt.

**No**
: Attempts cannot be resumed.

**Yes**
: Students will be given the choice to either resume any previous attempts that are still in progress, or start a new attempt.

**Force**
: If there is a previous attempt that is still in progress, students will be forced to resume that attempt. Otherwise, they can start a new attempt.';
$string['allowreview'] = 'Allow review';
$string['allowreview_help'] = 'If enabled, students may review their task attempts after the task is closed.';
$string['answers'] = 'Answers';
$string['answersshort'] = 'A';
$string['anyattempts'] = 'Any attempts';
$string['anygroup'] = 'Any group';
$string['applydefaults'] = 'Apply selected default values';
$string['assessmenthdr'] = 'Assessment';
$string['assessment_help'] = 'The assessment settings for TaskChain chains and tasks define the following:

<ul>
<li>how the task attempts are combined to form a single task score</li>
<li>the contribution of the task score toward the grade for a single chain attempt</li>
<li>how the chain attempt grades are combined to get a single chain grade</li>
</ul>

**Task attempt scores**
The task attempt scores are normalized using the following calculation:

<table border="0"><tbody><tr>
<td align="center" valign="middle">
<tt>(attempt score - minimum score)</tt>
<tt>------------------------------</tt><br >
<tt>maximum score</tt>
</td>
<td align="center" valign="middle"><big><big> &nbsp; X &nbsp; </big></big></td>
<td align="center" valign="middle">
<tt>score limit</tt>
<tt>-----------</tt><br >
<tt>100</tt>
</td>
</tr></tbody></table>

**Task score**
Depending on the task\'s scoring method setting, the score for the task is set to the first, last, highest or average of the normalized task attempt scores.

The task scores are then weighted using the following calculation:

<table border="0"><tbody><tr>
<td align="center" valign="middle">
<tt>task score</tt>
</td>
<td align="center" valign="middle"><big><big> &nbsp; X &nbsp; </big></big></td>
<td align="center" valign="middle">
<tt>score weighting</tt>
<tt>--------------</tt><br >
<tt>100</tt>
</td>
</tr></tbody></table>

**Chain attempt grade**
The chain attempt grade is set to the total, highest or last of the weighted task scores, depending on the chain\'s attempt grade method setting.

**Chain grade**
The grade for the chain is set to the first, last, highest or average chain attempt grade, depending on the chain\'s grade method setting.

Finally, the grade is weighted according to the following calculation:

<table border="0"><tbody><tr>
<td align="center" valign="middle">
<tt>chain grade</tt>
</td>
<td align="center" valign="middle"><big><big> &nbsp; X &nbsp; </big></big></td>
<td align="center" valign="middle">
<tt>grade weighting</tt>
<tt>-----------</tt><br >
<tt>100</tt>
</td>
</tr></tbody></table>';
$string['attemptcount'] = 'Attempt count';
$string['attemptcount_help'] = 'If enabled, this setting specifies the maximum or minimum number of attempts which must satisfy the score and duration conditions.

**>=** (greater than or equal to)
The minimum number of attempts which must satisfy the score and duration conditions.

**<=** (less than or equal to)
The maximum number of attempts which must satisfy the score and duration conditions.';
$string['attemptdelay'] = 'Attempt delay';
$string['attemptdelay_help'] = 'If enabled, this setting specifies the minimum or maximum delay since the attempts which satisfy the score and count conditions.

**>=** (greater than or equal to)
The minimum delay since the attempts which satisfy the score and count conditions.

**<=** (less than or equal to)
The maximum delay since attempts which satisfy the score and count conditions.';
$string['attemptduration'] = 'Attempt duration';
$string['attemptduration_help'] = 'If enabled, this setting specifies the minimum or maximum duration for the attempts which satisfy the score and count conditions.

**>=** (greater than or equal to)
The minimum duration of attempts which must satisfy the score and count conditions.

**<=** (less than or equal to)
The maximum duration of attempts which must satisfy the score and count conditions.';
$string['attemptgrade'] = 'Attempt grade';
$string['attemptgrademethod'] = 'Attempt grading method';
$string['attemptgrademethod_help'] = 'This setting defines how the grade for a single attempt at this TaskChain activity is calculated.

**Total**
: The attempt grade will be set to the sum of the weighted task scores.

**Highest**
: The attempt grade will be set to highest weighted task score.

**Last**
: The attempt grade will be set to the weighted score of the most recently attempted task.

**Last (completed)**
: The attempt grade will be set to the weighted score of the most recently attempted task whose status is "completed". Other task scores will be ignored.

**Last (timed out)**
: The attempt grade will be set to the weighted score of the most recently attempted task whose status is "completed" or "timed out". Other task scores will be ignored.

**Last (abandoned)**
: The attempt grade will be set to the weighted score of the most recently attempted task whose status is "completed" or "timed out" or "abandoned". Tasks whose status is "in progress" will be ignored.';
$string['attemptlimit'] = 'Attempt limit';
$string['attemptlimit_help'] = 'The maximum number of attempts a student may have at this TaskChain activity';
$string['attemptnumber'] = 'Attempt number';
$string['attempts'] = 'Attempts';
$string['attemptsallowed'] = 'Attempts allowed';
$string['attemptscore'] = 'Attempt score';
$string['attemptshdr'] = 'Attempt restrictions';
$string['attemptsunlimited'] = 'Unlimited attempts';
$string['attempttasknow'] = 'Attempt task now';
$string['attempttype'] = 'Attempt type';
$string['attempttype_help'] = 'This setting specifies the type of attempts to be considered by the attempt count condition.

**Any attempts**
Any attempts will be considered.

**Most recent attempts**
Only the most recent attempts will be considered.

**Consecutive attempts**
Any block of consecutive attempts will be considered.';
$string['average'] = 'Average';
$string['averagegrade'] = 'Average grade';
$string['averagescore'] = 'Average score';
$string['bodystyles'] = 'Body styles';
$string['bodystylesbackground'] = 'Background color and image';
$string['bodystylescolor'] = 'Text color';
$string['bodystylesfont'] = 'Font size and family';
$string['bodystylesmargin'] = 'Left and right margin';
$string['cacherecords'] = 'TaskChain cache records';
$string['cannotread'] = 'Cannot read file (or file is empty!): {$a}';
$string['canrestartchain'] = 'Your results so far will be saved but if you want to redo this activity again later, you will have to start from the beginning.';
$string['canrestarttask'] = 'Your results so far will be saved and you can redo "{$a}" later';
$string['canresumetask'] = 'Your results so far will be saved and you can resume "{$a}" later.';
$string['chain'] = 'TaskChain activity';
$string['chainattempt'] = 'Chain attempt';
$string['chainattemptnotinprogress'] = 'Chain attempt not in progress';
$string['chainclosed'] = 'Sorry, this activity closed on {$a}';
$string['chaingrade'] = 'Chain grade';
$string['chainname_help'] = 'The name of this TaskChain activity that will be displayed on the course page';
$string['chainnotavailable'] = 'Sorry this activity is not available to you until {$a}.';
$string['chainrequirepasswordmessage'] = 'To attempt this activity, you need to know the password.';
$string['checks'] = 'Checks';
$string['checksomeboxes'] = 'Please check some boxes';
$string['classreports'] = 'Class reports';
$string['clearcache'] = 'Clear TaskChain cache';
$string['cleardetails'] = 'Clear TaskChain details';
$string['clearedcache'] = 'The TaskChain cache has been cleared';
$string['cleareddetails'] = 'The TaskChain details have been cleared';
$string['clickreporting'] = 'Enable click reporting';
$string['clickreporting_help'] = 'If enabled, a separate record is kept each time a "hint", "clue" or "check" button is clicked. This allows the teacher to see a very detailed report showing the state of the task at each click. Otherwise, only one record per attempt at a task is kept.';
$string['clues'] = 'Clues';
$string['cnumber'] = 'Chain attempt';
$string['columnlistid'] = 'Show columns';
$string['columnlistid_help'] = 'This menu allows you to select which set of columns are shown on this page';
$string['columnlistschain'] = 'All chain column lists';
$string['columnlistschains'] = 'Column lists for editing chains';
$string['columnlistsingle'] = 'Column list ($a)';
$string['columnliststask'] = 'All task column lists';
$string['columnliststasks'] = 'Column lists for editing tasks';
$string['completed'] = 'Completed';
$string['conditions'] = 'Conditions';
$string['conditionscore'] = 'Condition score';
$string['conditionscore_help'] = 'If enabled, this setting specifies the maximum or minimum score at which this condition is satisfied.

**>=** (greater than or equal to)
The minimum score at which this condition is satisfied

**<=** (less than or equal to)
The maximum score at which this condition is satisfied';
$string['conditiontaskid'] = 'Condition task';
$string['conditiontaskid_help'] = 'This setting specifies the task to which this pre-condition refers.

**Previous task**
This condition refers to the previous task in this chain,
according to sort order.

**Specific task**
The teacher may also select a specific task to which this pre-condition refers.
To avoid confusion caused by tasks with identical names,
the task sort numbers are appended to the task names.';
$string['configbodystyles'] = 'By default, Moodle theme styles will override TaskChain activity styles. However, for any styles selected here, the TaskChain activity styles, including any styles defined in task source files such as Hot Potatoes files, will be given priority over the Moodle theme styles.';
$string['configenablecache'] = 'Maintaining a cache of TaskChain tasks can dramatically speed up the delivery of tasks to the students.';
$string['configenablecron'] = 'Specify the hours in your time zone at which the TaskChain cron script may run';
$string['configenablemymoodle'] = 'This settings controls whether TaskChains are listed on the MyMoodle page or not';
$string['configenableobfuscate'] = 'Obfuscating the javascript code to insert media players makes it more difficult to determine the media file name and guess what the file contains.';
$string['configenableswf'] = 'Allow embedding of SWF files in TaskChain activities. If enabled, this setting overrides filter_mediaplugin_enable_swf.';
$string['configfile'] = 'Configuration file';
$string['configfile_help'] = 'If specified, the configuration file will be used when the browser content is generated from the source file.

The exact function of the configuration file depends on the output format, but generally the settings in the configuration will override those in the source file.

By using the same configuration file for several tasks, the tasks can be made to share the same messages, color scheme, layout or behaviors.

For **Hot Potatoes** tasks, the configuration file is a &quot;.cfg&quot; file. For **Qedoc** tasks, this setting is not used.';
$string['configfilenotfound'] = 'Config file not found: {$a}';
$string['configframeheight'] = 'When a task is displayed within a frame, this value is the height (in pixels) of the top frame which contains the Moodle navigation bar.';
$string['configlocation'] = 'Configuration file location';
$string['configlocation_help'] = 'The location of the configuration file.';
$string['configlockframe'] = 'If this setting is enabled, then the navigation frame, if used, will be locked so that it is not scrollable, not resizeable and has no border';
$string['configmaxeventlength'] = 'If a TaskChain has both an open and a close time specified, and the difference between the two times is greater than the number of days specified here, then two separate calendar events will be added to the course calendar. For shorter durations, or when just one time is specified, only one calendar event will be added. If neither time is specified, no calendar event will be added.';
$string['configstoredetails'] = 'If this setting is enabled, then the raw XML details of attempts at TaskChain tasks will be stored in the taskchain_details table. This allows task attempts to be regraded in the future to reflect changes in the TaskChain task scoring system. However, enabling this option on a busy site will cause the taskchain_details table to grow very quickly.';
$string['confirmdeleteallpostconditions'] = 'Are you sure you want to delete ALL post-conditions?';
$string['confirmdeleteallpreconditions'] = 'Are you sure you want to delete ALL pre-conditions?';
$string['confirmdeleteattempts'] = 'Are you sure you want to delete the selected attempts?';
$string['confirmdeletechainscolumnlist'] = 'Are you sure you want to delete this chain column list';
$string['confirmdeletechainscolumnlists'] = 'Are you sure you want to delete ALL chain column lists';
$string['confirmdeletepostcondition'] = 'Are you sure you want to delete this post-condition?';
$string['confirmdeleteprecondition'] = 'Are you sure you want to delete this pre-condition?';
$string['confirmdeletetask'] = 'Are you sure you want to delete this task?';
$string['confirmdeletetaskscolumnlist'] = 'Are you sure you want to delete this task column list';
$string['confirmdeletetaskscolumnlists'] = 'Are you sure you want to delete ALL task column lists';
$string['confirmregradeattempts'] = 'Are you sure you want to regrade the selected attempts?';
$string['confirmstop'] = 'Are you sure you want to navigate away from this page?';
$string['consecutiveattempts'] = 'Consecutive attempts';
$string['correct'] = 'Correct';
$string['couldnotinsertsubmissionform'] = 'Could not insert submission form';
$string['delay'] = 'Delay';
$string['delay1'] = 'Delay 1';
$string['delay1_help'] = 'The minimum delay between the first and second attempts.';
$string['delay1summary'] = 'Time delay between first and second attempt';
$string['delay2'] = 'Delay 2';
$string['delay2_help'] = 'The minimum delay between attempts after the second attempt.';
$string['delay2summary'] = 'Time delay between later attempts';
$string['delay3'] = 'Delay 3';
$string['delay3afterok'] = 'Wait till student clicks OK';
$string['delay3disable'] = 'Do not continue automatically';
$string['delay3_help'] = 'The setting specifies the delay between finishing the task and returning control of the display to Moodle.

**Use specific time (in seconds)**
: control will be returned to Moodle after the specified number of seconds.

**Use settings in source/template file**
: control will be returned to Moodle after the number of seconds specified in the source file or the template files for this output format.

**Wait till student clicks OK**
: control will be returned to Moodle after the student clicks the OK button on the completion message in the task.

**Do not continue automatically**
: control will not be returned to Moodle after the task is finished. The student will be free to navigate away from the task page.

Note, the task results are always returned to Moodle immediately the task is completed or abandoned, regardless of this setting.';
$string['delay3specific'] = 'Use specific time (in seconds)';
$string['delay3summary'] = 'Time delay at the end of the task';
$string['delay3template'] = 'Use settings in source/template file';
$string['deleteallattempts'] = 'Delete all attempts';
$string['deleteallcolumnlistschain'] = 'Delete ALL chain column lists';
$string['deleteallcolumnliststask'] = 'Delete ALL task column lists';
$string['deleteallpostconditions'] = 'Delete ALL post-conditions';
$string['deleteallpreconditions'] = 'Delete ALL pre-conditions';
$string['deleteattempts'] = 'Delete attempts';
$string['deletecolumnlistchain'] = 'Delete chain column list: $a';
$string['deletecolumnlisttask'] = 'Delete task column list: $a';
$string['deletepostcondition'] = 'Delete a post-condition';
$string['deleteprecondition'] = 'Delete a pre-condition';
$string['deletetasks'] = 'Delete selected tasks';
$string['detailsrecords'] = 'TaskChain details records';
$string['d_index'] = 'Discrimination index';
$string['discarddetails'] = 'Discard details';
$string['discarddetails_help'] = 'If this setting is set to "Yes", the XML details of each attempt at this task will be discarded, otherwise the XML details will be stored in the database for possible future reference';
$string['duration'] = 'Duration';
$string['duringattempt'] = 'During attempt';
$string['editchains'] = 'Edit chains';
$string['editcolumnlistschain'] = 'Edit columns for TaskChain Chains';
$string['editcolumnliststask'] = 'Edit columns for TaskChain Tasks';
$string['edittasks'] = 'Edit tasks';
$string['enablecache'] = 'Enable TaskChain cache';
$string['enablecron'] = 'Enable TaskChain cron';
$string['enablemymoodle'] = 'Show TaskChains on MyMoodle';
$string['enableobfuscate'] = 'Enable obfuscation of media player code';
$string['enableswf'] = 'Allow embedding of SWF files in TaskChain activities';
$string['endofchain'] = 'End of chain';
$string['entry_attempts'] = 'Attempts';
$string['entrycm'] = 'Previous activity';
$string['entrycmcourse'] = 'Previous activity in this course';
$string['entrycm_help'] = 'This setting specifies a Moodle activity and a minimum grade for that activity which must be achieved before this TaskChain activity can be attempted.

The teacher can select a specific activity,
or one of the following general purpose settings:

* Previous activity in this course
* Previous activity in this section
* Previous graded activity in this course
* Previous graded activity in this section
* Previous TaskChain in this course
* Previous TaskChain in this section';
$string['entrycmsection'] = 'Previous activity in this course section';
$string['entrycompletionwarning'] = 'Before you start this activity, you must look at {$a}.';
$string['entry_dates'] = 'Dates';
$string['entrygrade'] = 'Previous activity grade';
$string['entrygradedcourse'] = 'Previous graded activity in this course';
$string['entrygradedsection'] = 'Previous graded activity in this course section';
$string['entrygradewarning'] = 'You cannot start this activity until you score {$a->entrygrade}% on {$a->entryactivity}. Currently, your grade for that activity is {$a->usergrade}%';
$string['entry_grading'] = 'Grading';
$string['entryoptions'] = 'Entry page options';
$string['entryoptions_help'] = 'These check boxes enable and disable the display of items on the TaskChain\'s entry page.

**Chain name as title**
: if checked, the chain name will be displayed as the title of the entry page.

**Grading**
: if checked, the TaskChain\'s grading information will be displayed on the entry page.

**Dates**
: if checked, the TaskChain\'s open and close dates will be displayed on the entry page.

**Attempts**
: if checked, a table showing details of a user\'s previous attempts at this TaskChain will be displayed on the entry page. Attempts that may be resumed will have a resume button displayed in the rightmost column.';
$string['entrypage'] = 'Show entry page';
$string['entrypagehdr'] = 'Entry page';
$string['entrypage_help'] = 'Should the students be shown an initial page before starting the TaskChain activity?

**Yes**
: the students will be shown an entry page before starting the TaskChain. The contents of the entry page are determined by the TaskChain\'s entry page options.

**No**
: the students will not be shown an entry page, and will start the TaskChain immediately.

An entry page is always shown to the teacher, in order to provide access to the reports and edit tasks page';
$string['entrytaskchaincourse'] = 'Previous TaskChain in this course';
$string['entrytaskchainsection'] = 'Previous TaskChain in this course section';
$string['entrytext'] = 'Entry page text';
$string['entry_title'] = 'Chain name as title';
$string['error_formhelperclassnotfound'] = 'Taskchain form helper class not found: {$a}';
$string['error_formhelperfilenotfound'] = 'Taskchain form helper file not found: {$a}';
$string['error_getprivateproperty'] = 'Cannot access private property, {$a->property}, of {$a->class} object directly. Use {$a->method} instead.';
$string['error_getunknownproperty'] = 'Cannot access unknown property, {$a->property}, of {$a->class} object.';
$string['error_insertrecord'] = 'Could not insert record in database table: {$a}';
$string['error_missingclass'] = 'Object class could not be found: {$a}';
$string['error_nocolumns'] = 'Please select some columns';
$string['error_nocourseid'] = 'No course id';
$string['error_nodatabaseinfo'] = 'No database info available';
$string['error_noinputparameters'] = 'No input parameters';
$string['error_norecordsfound'] = 'No records found';
$string['error_recordclassnotfound'] = 'Taskchain record class not found: {$a}';
$string['error_setprivateproperty'] = 'Cannot modify private property, {$a->property}, of {$a->class} object directly. Use {$a->method} instead.';
$string['error_setpropertydirectly'] = 'Cannot modify {$a->property} property of {$a->class} object directly. Use {$a->method} instead.';
$string['error_setunknownproperty'] = 'Cannot modify unknown property, {$a->property}, of {$a->class} object.';
$string['error_unrecognizedpageid'] = 'TaskChain pageid not recognized: {$a}';
$string['error_updaterecord'] = 'Could not update record in database table: {$a}';
$string['exit_areyouok'] = 'Hello, are you still there?';
$string['exit_attemptscore'] = 'Your score for that attempt was {$a}';
$string['exitcm'] = 'Next activity';
$string['exitcmcourse'] = 'Next activity in this course';
$string['exitcm_help'] = 'This setting specifies a Moodle activity to be done after this TaskChain activity is completed. The optional grade is the minimum grade for this TaskChain that is required for the next activity to be shown.

The teacher can select a specific activity, or a one of the following general purpose settings:

* Next activity in this course
* Next activity in this section
* Next graded activity in this course
* Next graded activity in this section
* Next TaskChain in this course
* Next TaskChain in this section

If other exit page options are disabled and the student has achieved the required grade on this TaskChain activity, the next activity will be shown straight away. Otherwise, the student will be shown a link to the next activity, which they can click when they are ready.';
$string['exitcmsection'] = 'Next activity in this course section';
$string['exit_course'] = 'Course';
$string['exit_course_text'] = 'Return to the main course page';
$string['exit_encouragement'] = 'Encouragement';
$string['exit_excellent'] = 'Excellent!';
$string['exit_feedback'] = 'Exit page feedback';
$string['exit_feedback_help'] = 'These options enable and disable the display of feedback items on a TaskChain\'s exit page.

**Chain name as title**
: if checked, the chain name will be displayed as the title of the exit page.

**Encouragement**
: if checked, some encouragement will displayed on the exit page. The encouragement depends on the TaskChain grade:
: **> 90%**: Excellent!
: **> 60%**: Well done
: **> 0%**: Good try
: **= 0%**: Are you OK?

**Chain attempt grade**
: if checked, the grade for the chain attempt that has just been completed will be displayed on the exit page.

**Chain grade**
: if checked the TaskChain grade will be displayed on the exit page.

In addition, if the chain grading method is highest a message to tell the user if the most recent attempt was equal to or better than their previous will be displayed.';
$string['exit_goodtry'] = 'Good try!';
$string['exitgrade'] = 'Next activity grade';
$string['exitgradedcourse'] = 'Next graded activity in this course';
$string['exitgradedsection'] = 'Next graded activity in this course section';
$string['exit_grades'] = 'Grades';
$string['exit_grades_text'] = 'Look at your grades so far for this course';
$string['exit_index'] = 'Index';
$string['exit_index_text'] = 'Go to the index of activities';
$string['exit_links'] = 'Exit page links';
$string['exit_links_help'] = 'These options enable and disable the display of certain navigation links on a TaskChain\'s exit page.

**Retry**
: if multiple attempts are allowed at this TaskChain and the student still has some attempts left, a link to allow the student to retry the TaskChain will be displayed

**Index**
: if checked, a link to the TaskChain index page will be displayed.

**Course**
: if checked, a link to the Moodle course page will be displayed.

**Grades**
: if checked, a link to the Moodle gradebook will be displayed.';
$string['exit_next'] = 'Next';
$string['exit_next_text'] = 'Try the next activity';
$string['exit_nograde'] = 'You have successfully completed this activity!';
$string['exitoptions'] = 'Exit options';
$string['exitpage'] = 'Show exit page';
$string['exitpagehdr'] = 'Exit page';
$string['exitpage_help'] = 'Should a exit page displayed after the TaskChain task has been completed?

**Yes**
: the students will be shown an exit page when the TaskChain is completed. The contents of the exit page are determined by the settings for the TaskChain\'s exit page feedback and links.

**No**
: the students will not be shown an exit page. Instead, they will either go immediately to the next activity or return to the Moodle course page.';
$string['exit_retry'] = 'Retry';
$string['exit_retry_text'] = 'Retry this activity';
$string['exittaskchaincourse'] = 'Next TaskChain in this course';
$string['exit_taskchaingrade'] = 'Your grade for this activity is {$a}';
$string['exit_taskchaingrade_average'] = 'Your average grade so far for this activity is {$a}';
$string['exit_taskchaingrade_highest'] = 'Your highest grade so far for this activity is {$a}';
$string['exit_taskchaingrade_highest_equal'] = 'You equalled your previous best for this activity!';
$string['exit_taskchaingrade_highest_previous'] = 'Your previous highest grade for this activity was {$a}';
$string['exit_taskchaingrade_highest_zero'] = 'You have not scored higher than {$a} for this activity yet';
$string['exittaskchainsection'] = 'Next TaskChain in this course section';
$string['exittext'] = 'Exit page text';
$string['exit_welldone'] = 'Well done!';
$string['exit_whatnext_0'] = 'What would you like to do next?';
$string['exit_whatnext_1'] = 'Choose your destiny ...';
$string['exit_whatnext_default'] = 'Please choose one of the following:';
$string['feedback'] = 'Feedback';
$string['feedbackdiscuss'] = 'Discuss this task in a forum';
$string['feedbackformmail'] = 'Feedback form';
$string['feedbackmoodleforum'] = 'Moodle forum';
$string['feedbackmoodlemessaging'] = 'Moodle messaging';
$string['feedbacknone'] = 'None';
$string['feedbacksendmessage'] = 'Send a message to your instructor';
$string['feedbackshort'] = 'F';
$string['feedbackwebpage'] = 'Web page';
$string['filename'] = 'File name';
$string['filetype'] = 'File type';
$string['filteredchains'] = 'TaskChains matching the following filters:';
$string['filteredtasks'] = 'Tasks matching the following filters:';
$string['firstattempt'] = 'First attempt';
$string['fixboms'] = 'Fix BOMs';
$string['forceplugins'] = 'Force media plugins';
$string['forceplugins_help'] = 'If enabled, Moodle-compatible media players will play files such as avi, mpeg, mpg, mp3, mov and wmv. Otherwise, Moodle will not change the settings of any media players in the task.';
$string['frameheight'] = 'Frame height';
$string['giveup'] = 'Give Up';
$string['grade'] = 'Grade';
$string['gradeignore'] = 'Ignore voids';
$string['gradeignore_help'] = 'This setting specifies whether void attempts, i.e. abandoned attempts with a grade of 0%, are ignored or included when students\' grades for this TaskChain are calculated.

**Yes**
: Void attempts are *ignored* during the calculation of grades for this TaskChain activity.

**No**
: Void attempts are *not ignored*, that is to say they are *included* in the calculation of grades for this TaskChain activity.

Void attempts occur when a student starts a TaskChain activity, but then does not attempt to answer an questions in any tasks, before leaving. Such attempts can have a significant impact on the grade when the grading method is Average, First or Last. In such situations, the teacher may decide that it is better to ignore the void attempts when the grade is calculated.';
$string['gradelimit'] = 'Grade limit';
$string['gradelimit_help'] = 'The grades for chain attempts are scaled to fit in the range 0 to grade limit.

The maximum grade for a TaskChain activity in the Moodle gradebook is calculated as follows:

: maximum grade x (grade weighting / 100)';
$string['grademethod'] = 'Grading method';
$string['grademethod_help'] = 'This setting defines how the TaskChain activity grade is calculated from the attempt grades.

**Highest score**
: the activity grade will be set to the highest grade for an attempt at this TaskChain activity.

**Average scsore**
: the grade will be set to the average grade for attempts at this TaskChain activity.

**First attempt**
: the grade will be set to the grade of the first attempt at this TaskChain activity.

**Last attempt**
: the grade will be set to the grade of the most recent attempt at this TaskChain activity.';
$string['gradeweighting'] = 'Grade weighting';
$string['gradeweighting_help'] = 'Grades for this TaskChain activity will be scaled to this number in the Moodle gradebook.';
$string['groupid'] = 'Group';
$string['groupid_help'] = 'The Moodle user group to which this condition applies';
$string['guestsno'] = 'Sorry, guests cannot see or attempt TaskChain activities';
$string['highestgrade'] = 'Highest grade';
$string['highestscore'] = 'Highest score';
$string['highesttaskscore'] = 'Highest task score';
$string['hints'] = 'Hints';
$string['ignored'] = 'Ignored';
$string['incorrecttask'] = 'Incorrectly answered task';
$string['inprogress'] = 'In progress';
$string['isgreaterthan'] = 'is greater than';
$string['islessthan'] = 'is less than';
$string['lastaccess'] = 'Last access';
$string['lastattempt'] = 'Last attempt';
$string['lasttaskabandoned'] = 'Score of last abandoned task';
$string['lasttaskattempted'] = 'Score of last attempted task';
$string['lasttaskcompleted'] = 'Score of last completed task';
$string['lasttasktimedout'] = 'Score of last timed out task';
$string['lockframe'] = 'Lock frame';
$string['maxeventlength'] = 'Maximum number of days for a single calendar event';
$string['maximum'] = '&lt;=';
$string['mediafilter_moodle'] = 'Moodle\'s standard media filters';
$string['mediafilter_taskchain'] = 'TaskChain media filter';
$string['menuofalltasks'] = 'Menu of all tasks';
$string['menuofalltasksone'] = 'Menu of all tasks (one link)';
$string['menuofnexttasks'] = 'Menu of next tasks';
$string['menuofnexttasksone'] = 'Menu of next tasks (one link)';
$string['migratingfiles'] = 'Migrating Hot Potatoes task files';
$string['minimum'] = '&gt;=';
$string['missingsourcetype'] = 'TaskChain record is missing sourcetype';
$string['mods_help'] = '<img src="http://localhost/24/mod/taskchain/icon.gif" alt="" /> **TaskChain**

The TaskChain module allows teachers to distribute interactive learning materials via Moodle and view details of the students\' responses.
The materials are created on the teacher\'s computer using authoring software such as
<a href="http://web.uvic.ca/hrd/halfbaked/" target="_blank">Hot Potatoes</a> and
<a href="http://www.qedoc.org/" target="_blank">Qedoc</a>, and then uploaded to the Moodle course.

After students have attempted the tasks, a number of reports are available which show how individual questions were answered and some statistical trends in the scores.';
$string['modulename'] = 'TaskChain';
$string['modulename_help'] = 'The TaskChain module allows teachers to distribute interactive learning materials to their students via Moodle and view reports on the students\' responses and results. .

A single TaskChain activity consists of an optional entry page, a chain of tasks and an optional exit page. Each task may be a static web page or an interactive web page which offers students text, audio and visual prompts and records their responses. The tasks are created on the teacher\'s computer using authoring software and then uploaded to Moodle.

The teacher can define learning paths through a chain by adding pre-conditions and post-conditions to the tasks. A task cannot be attempted until all the pre-conditions have been satisfied. After the task is finished, the post-conditions define what is displayed next to the student.

A TaskChain activity can contain tasks created with the following authoring software:

* Hot Potatoes (version 6)
* Qedoc
* Xerte
* iSpring
* any HTML editor';
$string['modulename_link'] = 'mod/taskchain/view';
$string['modulenameplural'] = 'TaskChains';
$string['movetasks'] = 'Move selected tasks';
$string['myattempts'] = 'My attempts';
$string['name'] = 'Name';
$string['nameadd'] = 'Name';
$string['nameadd_help'] = 'The name can be specfic text entered by the teacher or it can be automatically generated.

**Get from source file**
The name will be extracted from the source file.

**Use source file name**
The source file name will be used as the name.

**Use source file path**
The source file path will be used as the name.
Any slashes in the file path will be replaced by spaces.

**Specific text**
The specific text entered by the teacher will be used as the name.';
$string['name_help'] = 'The specific text that is displayed to the students';
$string['navigation'] = 'Navigation';
$string['navigation_embed'] = 'Embedded web page';
$string['navigation_frame'] = 'Moodle navigation frame';
$string['navigation_give_up'] = 'A single &quot;Give Up&quot; button';
$string['navigation_help'] = 'This setting specifies the navigation used in the task:

**Moodle navigation bar**
: the Moodle navigation bar will be displayed in the same window as the task at the top of the page

**Moodle navigation frame**
: the Moodle navigation bar will be displayed in a separate frame at the top of the task

**Embedded web page**
: the Moodle navigation bar will be displayed in with the Hot Potatoes task embedded within the window

**Original navigation aids**
: the task will be displayed with the navigation buttons, if any, defined in the task

**A single "Give Up" button**
: the task will be displayed with a single "Give Up" button at the top of the page

**None**
: the task will be displayed without any navigation aids, so when all questions have been answered correctly, depending on the "Show next task?" setting, Moodle will either return to the course page or display the next task';
$string['navigation_moodle'] = 'Standard Moodle navigation bars (top and side)';
$string['navigation_none'] = 'None';
$string['navigation_original'] = 'Original navigation aids';
$string['navigation_topbar'] = 'Top Moodle navigation bar only (no side bars)';
$string['next1task'] = 'Next task';
$string['next2task'] = 'Skip next task';
$string['next3task'] = 'Skip 2 tasks';
$string['next4task'] = 'Skip 3 tasks';
$string['next5task'] = 'Skip 4 tasks';
$string['nexttaskid'] = 'Next task';
$string['nexttaskid_help'] = 'This setting specifies the task that is to be shown if the post-condition is satisfied.

**Same task**
Show the task that has just been completed

**Next task**
Show the next task in this chain, according to sort order

**Skip task**
Show the task after the next task, according to the sort order.

**Previous task**
Show the previous task in this chain, according to sort order.

**Unseen task**
Show a task from this chain that the current user has not seen yet.

**Unanswered task**
Show a task from this chain that the current user has not seen,
or has seen but not yet made responses to any of the questions in the task.

**Incorrectly answered task**
Show a task which has not yet been answered correctly,
i.e. a task for which the score is not 100%.

**Random task**
Show a random task from this chain.
The task may already have been attempted.

**Menu of next tasks**
Show a menu of tasks from this chain that, according to the pre-conditions and other access restrictions for the tasks, are available to the student

**Menu of all tasks**
Show a menu of all tasks from this chain.
Tasks are available to students will have links to the start of the task.
Tasks that are not available will have no such link.

**End of chain**
The end of the chain has been reached. The status of the chain to will be set to completed and, depending on the chain\'s exit page settings, the student will be shown either the exit page, the next Moodle activity, or the Moodle course page.

**Specific task**
The teacher may also select a specific task as the next task.
To avoid confusion caused by tasks with identical names,
the task sort numbers are appended to the task names.';
$string['noactivity'] = 'No activity';
$string['nograde'] = 'No grade';
$string['nolastchainattempt'] = 'Previous chain attempt record not found';
$string['nolasttaskattempt'] = 'Previous task attempt record not found';
$string['nomorechainattempts'] = 'Sorry, you have no more attempts left at this activity';
$string['nomoretaskattempts'] = 'Sorry, you have no more attempts left at this task';
$string['noresponses'] = 'No information about individual questions and responses was found.';
$string['noreview'] = 'Sorry, you are not allowed to view details of this task attempt.';
$string['noreviewafterclose'] = 'Sorry, this task has closed. You are no longer allowed to view details of this task attempt.';
$string['noreviewbeforeclose'] = 'Sorry, you are not allowed to view details this task attempt until {$a}';
$string['noscore'] = 'No score';
$string['nosourcefilesettings'] = 'TaskChain record is missing source file information';
$string['notaskchains'] = 'No TaskChains found';
$string['notasksforyou'] = 'Sorry, there are no tasks for you to do right now.';
$string['notasksinchain'] = 'There are no tasks in this TaskChain chain';
$string['notavailable'] = 'Sorry, this activity is not currently available to you.';
$string['notendswith'] = 'doesn\'t end with';
$string['notisempty'] = 'isn\'t empty';
$string['notisequalto'] = 'isn\'t equal to';
$string['notstartswith'] = 'doesn\'t start with';
$string['or'] = 'or';
$string['orless'] = '{$a} (or less)';
$string['ormore'] = '{$a} (or more)';
$string['outputformat'] = 'Output format';
$string['outputformat_best'] = 'Best';
$string['outputformat_help'] = 'The output format specifies how the content will be presented to the student.

The output formats that are available depend on the type of the source file. Some types of source file have just one output format, while other types of source file have several output formats.

The "best" setting will display the content using the optimal output format for the student\'s browser.';
$string['outputformat_hp_6_jcloze_html'] = 'JCloze (v6) from html';
$string['outputformat_hp_6_jcloze_xml_anctscan'] = 'ANCT-Scan from HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_anctscan_autoadvance'] = 'ANCT-Scan from HP6 JCloze xml (Auto-advance)';
$string['outputformat_hp_6_jcloze_xml_dropdown'] = 'DropDown from HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_findit_a'] = 'FindIt (a) from HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_findit_b'] = 'FindIt (b) from HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_jgloss'] = 'JGloss from HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_v6'] = 'JCloze (v6) from HP6 xml';
$string['outputformat_hp_6_jcloze_xml_v6_autoadvance'] = 'JCloze (v6) from HP6 xml (Auto-advance)';
$string['outputformat_hp_6_jcross_xml_v6'] = 'JCross (v6) from xml';
$string['outputformat_hp_6_jmatch_html'] = 'JMatch (v6) from html';
$string['outputformat_hp_6_jmatch_xml_flashcard'] = 'JMatch (flashcard) from xml';
$string['outputformat_hp_6_jmatch_xml_jmemori'] = 'JMemori from xml';
$string['outputformat_hp_6_jmatch_xml_sort'] = 'JMatch Sort from xml';
$string['outputformat_hp_6_jmatch_xml_v6'] = 'JMatch (v6) from xml';
$string['outputformat_hp_6_jmatch_xml_v6_plus'] = 'JMatch (v6+) from xml';
$string['outputformat_hp_6_jmatch_xml_v6_plus_duplicates'] = 'JMatch (v6+) from xml (allow duplicates)';
$string['outputformat_hp_6_jmix_html'] = 'JQuiz (v6) from html';
$string['outputformat_hp_6_jmix_xml_v6'] = 'JMix (v6) from xml';
$string['outputformat_hp_6_jmix_xml_v6_plus'] = 'JMix (v6+) from xml';
$string['outputformat_hp_6_jmix_xml_v6_plus_deluxe'] = 'JMix (v6+ with prefix, suffix and distractors) from xml';
$string['outputformat_hp_6_jmix_xml_v6_plus_keypress'] = 'JMix (v6+ with key press) from xml';
$string['outputformat_hp_6_jquiz_xml_v6'] = 'JQuiz (v6) from xml';
$string['outputformat_hp_6_jquiz_xml_v6_autoadvance'] = 'JQuiz (v6) from xml (Auto-advance)';
$string['outputformat_hp_6_jquiz_xml_v6_exam'] = 'JQuiz (v6) from xml (Exam)';
$string['outputformat_hp_6_jquiz_xml_v6_intro'] = 'JQuiz (v6) from xml (Intro)';
$string['outputformat_hp_6_rhubarb_html'] = 'Rhubarb (v6) from html';
$string['outputformat_hp_6_rhubarb_xml'] = 'Rhubarb (v6) from xml';
$string['outputformat_hp_6_sequitur_html'] = 'Sequitur (v6) from html';
$string['outputformat_hp_6_sequitur_html_incremental'] = 'Sequitur (v6) from html, incremental scoring';
$string['outputformat_hp_6_sequitur_xml'] = 'Sequitur (v6) from xml';
$string['outputformat_hp_6_sequitur_xml_incremental'] = 'Sequitur (v6) from xml, incremental scoring';
$string['outputformat_html_ispring'] = 'iSpring HTML file';
$string['outputformat_html_xerte'] = 'Xerte HTML file';
$string['outputformat_html_xhtml'] = 'Standard HTML file';
$string['outputformat_qedoc'] = 'Qedoc file';
$string['passworderror'] = 'The password entered was incorrect';
$string['penalties'] = 'Penalties';
$string['percent'] = 'Percent';
$string['pluginadministration'] = 'TaskChain administration';
$string['pluginname'] = 'TaskChain module';
$string['postcondition'] = 'Post-condition';
$string['postconditions'] = 'Post-conditions';
$string['postconditions_help'] = 'After finishing the task, the action of the *first* matching post-condition in this list will be taken.';
$string['precondition'] = 'Pre-condition';
$string['preconditions'] = 'Pre-conditions';
$string['preconditions_help'] = 'This task may only be taken if *all* the pre-conditions in this list are satisfied.';
$string['pressoktocontinue'] = 'Press OK to continue, or Cancel to stay on the current page.';
$string['preview'] = 'Preview';
$string['previewchainnow'] = 'Preview TaskChain activity now';
$string['previewtasknow'] = 'Preview task now';
$string['previoustask'] = 'Previous task';
$string['questionshort'] = 'Q-{$a}';
$string['randomtask'] = 'Random task';
$string['reattempttask'] = 'Re-attempt task';
$string['recentattempts'] = 'Most recent attempts';
$string['removegradeitem_help'] = 'Should the grade item for this activity be removed?

**No**
: the grade item for this activity in the Moodle gradebook will not be removed

**Yes**
: If the maximum grade for this TaskChain is set to &quot;No grade&quot; or the grade weighting is set to &quot;No weighting&quot;, then the grade item for this activity will be removed from the Moodle gradebook';
$string['reordertasks'] = 'Reorder tasks';
$string['requirepassword'] = 'Require password';
$string['requirepassword_help'] = 'If a password is specified, a student must enter it in order to attempt the quiz.';
$string['requiresubnet'] = 'Require network address';
$string['requiresubnet_help'] = 'Quiz access may be restricted to particular subnets on the LAN or Internet by specifying a comma-separated list of partial or full IP address numbers. This can be useful for an invigilated (proctored) quiz, to ensure that only people in a certain location can access the quiz.';
$string['responses'] = 'Responses';
$string['responsesshort'] = 'R';
$string['resume'] = 'Resume';
$string['reviewafterattempt'] = 'Allow review after attempt';
$string['reviewafterclose'] = 'Allow review after HotPot closes';
$string['reviewduringattempt'] = 'Allow review during attempt';
$string['reviewoptions'] = 'Review options';
$string['sametask'] = 'Same task';
$string['score'] = 'Score';
$string['scoreignore'] = 'Ignore voids';
$string['scoreignore_help'] = 'This setting specifies whether void attempts, i.e. abandoned attempts with a score of 0%, are ignored or included when students\' scores for this task are calculated.

**Yes**
Void attempts are *ignored* during the calculation of scores for this task.

**No**
Void attempts are *not ignored*, that is to say they are *included*
in the calculation of scores for this task.

Void attempts occur when a student starts a task but then does not attempt to answer an questions before leaving the task. Such attempts can have a significant impact on the score when the scoring method is Average, First or Last. In such situations, the teacher may decide that it is better to ignore void attempts when the score is calculated.';
$string['scorelimit'] = 'Score limit';
$string['scorelimit_help'] = 'This setting specifies the highest possible score for this task.
All task attempts are assumed to be percentages and will be adjusted so that no task attempt score is greater than the task\'s score limit.';
$string['scoremethod'] = 'Scoring method';
$string['scoremethod_help'] = 'This setting defines how the task score is calculated from the task attempts.

**Highest**
The task score will be set to the highest score for an attempt at this task.

**Average**
The task score will be set to the average score for attempts at this task.

**First**
The task score will be set to the score of the first attempt at this task.

**Last**
The task score will be set to the score of the most recent attempt at this task.';
$string['scores'] = 'Scores';
$string['scoresshort'] = 'S';
$string['scoreweighting'] = 'Score weighting';
$string['scoreweighting_help'] = 'The score weighting is the contribution of the score for this task toward the chain grade attempt.

If several tasks require equal weighting, then they should be given the same equal weighting category.';
$string['securityhdr'] = 'Security restrictions';
$string['selectattempts'] = 'Select attempts';
$string['selectedchains'] = 'Selected TaskChains in this course';
$string['selectedtasks'] = 'Selected tasks in this TaskChain';
$string['showdescription'] = 'Display description';
$string['showdescription_help'] = 'If this setting is enabled, the entry text given below will appear on the course page as the description for this activity.';
$string['showerrormessage'] = 'TaskChain error: {$a}';
$string['showpopup'] = 'Window';
$string['showpopup_help'] = '**Same window**
The TaskChain activity will be shown in the same window as the Moodle course page.

**New window**
The TaskChain activity will be shown in a popup window.
Several features of the popup window can be enabled or disabled with check boxes.
The required width and height of the popup window are specified as a number of pixels.';
$string['singlefieldhdr'] = 'Single field';
$string['sortdirection'] = 'Sort direction';
$string['sortdirection_help'] = 'The direction in which you wish to sort these records';
$string['sortfield'] = 'Sort field';
$string['sortfield_help'] = 'The field on which you wish to sort these records';
$string['sortincrement'] = 'Sort increment';
$string['sortincrement_help'] = 'When the tasks are reordered, the sort numbers will be incremented by the amount specified here';
$string['sortorder'] = 'Sort order';
$string['sortorder_help'] = 'The order of this task within this chain';
$string['sourcefile'] = 'Source file';
$string['sourcefile_help'] = 'This setting specifies the file containing the content that will be shown to the students.

Usually the source file will have been created outside of Moodle, and then uploaded to the files area of a Moodle course.
It may be an html file, or it may be another kind of file that has been created with authoring software such as Hot Potatoes or Qedoc.

The source file may be specified as a folder and file path in the Moodle course files area, or it may be a url beginning with http:// or https://

For Qedoc materials, the source file must be the url of a Qedoc module that has been uploaded to the Qedoc server.

* e.g. http://www.qedoc.net/library/ABCDE_123.zip
* For information about uploading Qedoc modules see: [Qedoc documentation: Uploading_modules](http://www.qedoc.org/en/index.php?title=Uploading_modules)';
$string['sourcefilenotfound'] = 'Source file not found (or empty): {$a}';
$string['sourcelocation'] = 'Source file location';
$string['sourcelocation_help'] = 'The location of the source file.';
$string['sourcetype'] = 'Source file type';
$string['sourcetype_help'] = 'The type of this source file';
$string['startchainattempt'] = 'Start new chain attempt';
$string['startofchain'] = 'Start of chain';
$string['starttaskattempt'] = 'Start new task attempt';
$string['status'] = 'Status';
$string['stopbutton'] = 'Show stop button';
$string['stopbutton_help'] = 'If this setting is enabled, a stop button will be inserted into the task.

If a student clicks the stop button, the results so far will be returned to Moodle and the status of the task attempt will be set to abandoned.

The text that is displayed on the stop button can be one of the preset phrases from Moodle\'s language packs, formatted as component_stringname (e.g. portfolio_returntowhereyouwere), or the teacher can specify their own, specific text for the button.';
$string['stopbuttonlangpack'] = 'From language pack';
$string['stopbuttonspecific'] = 'Use specific text';
$string['stoptext'] = 'Stop button text';
$string['storedetails'] = 'Store the raw XML details of TaskChain task attempts';
$string['studentfeedback'] = 'Student feedback';
$string['studentfeedback_help'] = 'If enabled, a link to a pop-up feedback window will be displayed whenever the student clicks on the "Check" button. The feedback window allows students to discuss this task with their teacher and classmates in one of the following ways:

**Web page**
: requires URL of the web page, for example http://myserver.com/feedbackform.html

**Feedback form**
: requires URL of the form script, for example http://myserver.com/cgi-bin/formmail.pl

**Moodle forum**
: the forum index for the course will be displayed

**Moodle messaging**
: the Moodle instant messaging window will be displayed. If the course has several teachers, the student will be prompted to select a teacher before the messaging window appears.';
$string['studentfeedbackurl'] = 'Student feedback URL';
$string['submits'] = 'Submissions';
$string['subplugintype_taskchainattempt'] = 'Output format';
$string['subplugintype_taskchainattempt_plural'] = 'Output formats';
$string['subplugintype_taskchainreport'] = 'Report';
$string['subplugintype_taskchainreport_plural'] = 'Reports';
$string['subplugintype_taskchainsource'] = 'Source file';
$string['subplugintype_taskchainsource_plural'] = 'Source files';
$string['task'] = 'Task';
$string['taskaction_help'] = 'These options specify what action will be taken when the "Go" button is clicked.

**Reorder tasks**
: The tasks will be reordered according to the new sort numbers.

**Add (more) tasks**
: A new web page will be displayed from where you can add one or more new tasks to this TaskChain activity.

**Move tasks**
: The selected tasks will be moved to a different place in this TaskChain activity, or to another TaskChain activity.

**Apply selected default values**
: The selected default values will be applied to the selected tasks.

**Delete tasks**
: The selected tasks will be deleted from the TaskChain activity.';
$string['taskattempt'] = 'Task attempt';
$string['taskattemptnotinprogress'] = 'Task attempt not in progress';
$string['taskchain:addinstance'] = 'Add a new TaskChain activity';
$string['taskchain:attempt'] = 'Attempt a TaskChain activity and submit results';
$string['taskchain:deleteallattempts'] = 'Delete any user\'s attempts at a TaskChain activity';
$string['taskchain:deletemyattempts'] = 'Delete your own attempts at a TaskChain activity';
$string['taskchain:ignoretimelimits'] = 'Ignores time limits on a TaskChain activity';
$string['taskchain:manage'] = 'Change the settings of a TaskChain activity';
$string['taskchainname'] = 'TaskChain name';
$string['taskchain:preview'] = 'Preview a TaskChain activity';
$string['taskchain:regrade'] = 'Regrade a TaskChain activity';
$string['taskchain:reviewallattempts'] = 'View any user\'s attempts at a TaskChain activity';
$string['taskchain:reviewmyattempts'] = 'View your own attempts at a TaskChain activity';
$string['taskchain:view'] = 'View the entry page of a TaskChain activity';
$string['taskclosed'] = 'Sorry, this task closed on {$a}';
$string['taskname'] = 'Task name';
$string['tasknameadd_help'] = 'The task names can be derived from specfic text entered by the teacher or they can be automatically generated.

**Get from source file**
The task names will be extracted from the source files.

**Use source file name**
The source file names will be used as the task names.

**Use source file path**
The source file path of each task will be used as the name for that task.
Any slashes in the file path will be replaced by spaces.

**Specific text**
A unique name for each task will be created by appending the task sort number to the specific text entered by the teacher.';
$string['taskname_help'] = 'help text for Task name';
$string['tasknames'] = 'Task names';
$string['tasknames_help'] = 'The task names can be derived from specfic text entered by the teacher or they can be automatically generated.

**Get from source file**
: The task names will be extracted from the source files.

**Use source file name**
: The source file names will be used as the task names.

**Use source file path**
: The source file path of each task will be used as the name for that task. Any slashes in the file path will be replaced by spaces.

**Specific text**
: A unique name for each task will be created by appending the task sort number to the specific text entered by the teacher.';
$string['tasknotavailable'] = 'Sorry this task is not available to you until {$a}.';
$string['taskposition'] = 'Task position';
$string['taskrequirepasswordmessage'] = 'To attempt this task, you need to know the password.';
$string['tasks'] = 'Tasks';
$string['taskscore'] = 'Task score';
$string['tasktype'] = 'Task type';
$string['textsourcefile'] = 'Get from source file';
$string['textsourcefilename'] = 'Use source file name';
$string['textsourcefilepath'] = 'Use source file path';
$string['textsourcespecific'] = 'Specific text';
$string['textsourcetask'] = 'Get from task';
$string['timeclose'] = 'Available until';
$string['timedout'] = 'Timed out';
$string['timehdr'] = 'Time restrictions';
$string['timelimit'] = 'Time limit';
$string['timelimitexpired'] = 'The time limit for this attempt has expired';
$string['timelimit_help'] = 'This setting specifies the maximum duration of a single attempt.

**Use settings in source/template file**
: the time limit will be taken from the source file or the template files for this output format

**Use specific time**
: the time limit specified on the TaskChain task settings page will be used as the time limit for an attempt at this task. This setting overrides time limits in the source file, configuration file, or template files for this output format.

**Disable**
: no time limit will be set for attempts at this task.

Note that if an attempt is resumed, the timer continues from where the attempt was previously paused.';
$string['timelimitspecific'] = 'Use specific time';
$string['timelimitsummary'] = 'Time limit for one attempt';
$string['timelimittemplate'] = 'Use settings in source/template file';
$string['timeopen'] = 'Available from';
$string['timeopenclose'] = 'Open and close times';
$string['timeopenclose_help'] = 'You can specify times when the task is accessible for people to make attempts. Before the opening time, and after the closing time, the task will be unavailable.';
$string['title'] = 'Title';
$string['titleappendsortorder'] = 'Append sort order';
$string['title_help'] = 'This setting specifies the title to be displayed on the web page.

**TaskChain activity name**
: the name of this TaskChain activity will be displayed as the web page title.

**Get from source file**
: the title, if any, defined in the source file will be used as the web page title.

**Use source file name**
: the source file name, excluding any folder names, will be used as the web page title.

**Use source file path**
: the source file path, including any folder names, will be used as the web page title.';
$string['titleprependchainname'] = 'Prepend chain name';
$string['tnumber'] = 'Task attempt';
$string['totaltaskscores'] = 'Total of task scores';
$string['unansweredtask'] = 'Unanswered task';
$string['unseentask'] = 'Unseen task';
$string['updated'] = 'Updated';
$string['updatinggrades'] = 'Updating TaskChain grades';
$string['usefilters'] = 'Use filters';
$string['usefilters_help'] = 'If this setting is enabled, the content will be passed through the Moodle filters before being sent to the browser.';
$string['useglossary'] = 'Use glossary';
$string['useglossary_help'] = 'If this setting is enabled, the content will be passed through Moodle\'s Glossary Auto-linking filter before being sent to the browser.

Note that this setting overrides the site administration setting to enable or disable the Glossary Auto-linking filter.';
$string['usemediafilter'] = 'Use media filter';
$string['usemediafilter_help'] = 'This setting specifies the media filter to be used.

**None**
: the content will not be passed through any media filters.

**Moodle\'s standard media filters**
: the content will be passed through Moodle\'s standard media filters. These filters search for links to common types of sound and movie file, and convert those links to suitable media players.

**TaskChain media filter**
: the content will be passed through filters which detect links, images, sounds and movies to be specified using a square bracket notation.

The square-bracket notation has the following syntax:
<code>[url player width height options]</code>

**url**
: the relative or absolute url of the media file

**player** (optional)
: the name of the player to be inserted. The default value for this setting is "moodle". The standard version of the TaskChain module also offers the following players:
: **dew**: an mp3 player
: **dyer**: mp3 player by Bernard Dyer
: **hbs**: mp3 player from Half-Baked Software
: **image**: insert an image into the web page
: **link**: insert a link to another web page

**width** (optional)
: the required width of the player

**height** (optional)
: the required height of the player. If omitted this value will be set to the same as the width setting.

**options** (optional)
: a comma-separated list options to be passed to the player. Each option can be a simple on/off switch, or a name value pair.
: *name*
: *name=value*
: *name="some value with spaces"*';
$string['utilitiesindex'] = 'TaskChain Utilities index';
$string['viewreports'] = 'View reports for {$a} user(s)';
$string['views'] = 'Views';
$string['weighting'] = 'Weighting';
$string['weightingequal'] = 'Equal weighting';
$string['weightingnone'] = 'No weighting';
$string['window'] = 'Window';
$string['windowdirectories'] = 'Show the directory links';
$string['windowheight'] = 'Default window height (in pixels)';
$string['window_help'] = 'Show the activity in the main Moodle window, or in a popup window.

**Same window**
: The TaskChain activity will be shown in the same window as the Moodle course page.

**New window**
: The TaskChain activity will be shown in a popup window. Several features of the popup window can be enabled or disabled with check boxes. The required width and height of the popup window are specified as a number of pixels.';
$string['windowlocation'] = 'Show the location bar';
$string['windowmenubar'] = 'Show the menu bar';
$string['windowmoodlebutton'] = 'Show button to close window';
$string['windowmoodlefooter'] = 'Show Moodle page footer';
$string['windowmoodleheader'] = 'Show Moodle page header';
$string['windowmoodlenavbar'] = 'Show Moodle navigation bar';
$string['windownew'] = 'New window';
$string['windowresizable'] = 'Allow the window to be resized';
$string['windowsame'] = 'Same window';
$string['windowscrollbars'] = 'Allow the window to be scrolled';
$string['windowstatus'] = 'Show the status bar';
$string['windowtoolbar'] = 'Show the toolbar';
$string['windowwidth'] = 'Default window width (in pixels)';
$string['wrong'] = 'Wrong';
$string['youneedtoenrol'] = 'You need to enrol in this course before you can attempt this TaskChain activity';
$string['zeroduration'] = 'No duration';
$string['zerograde'] = 'Zero grade';
$string['zeroscore'] = 'Zero score';
