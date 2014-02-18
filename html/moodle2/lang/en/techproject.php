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
 * Strings for component 'techproject', language 'en', branch 'MOODLE_23_STABLE'
 *
 * @package   techproject
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = 'Abandoned';
$string['abandoneddesc'] = 'Task is over whatever completion level it has. Results are not used.';
$string['abstract'] = 'Abstract';
$string['accepted'] = 'Accepted';
$string['access'] = 'Access';
$string['adddeliv'] = 'Add root deliverable';
$string['addmilestone'] = 'Add root milestone';
$string['addrequ'] = 'Add root requirement';
$string['addroottask'] = 'Add root task';
$string['addspec'] = 'Add root specification';
$string['addsubdeliv'] = 'Add sub deliverable';
$string['addsubrequ'] = 'Add sub requirement';
$string['addsubspec'] = 'Add sub specification';
$string['addsubtask'] = 'Add sub task';
$string['addtask'] = 'Add a task';
$string['addvalue'] = 'Add a qualifier value';
$string['administrating'] = 'Administrating';
$string['administratingdesc'] = 'Administration and data management';
$string['allowdeletewhenassigned'] = 'Allow delete when assigned';
$string['allowdeletewhenassigned_help'] = '<p>If this option is enabled, assigned entities can be deleted without explicitely being previously unassigned. Relevant
assignations will be deleted.</p>

<p>If this option is disabled, the data management will be constrainted, but better expliciting relationships.</p>';
$string['allownotifications'] = 'Allow notifications';
$string['allownotifications_help'] = '<p>When enabled, participants are notified by mail when data that are relevant for them is changed.</p>';
$string['alsoapplyroot'] = 'Apply also root node';
$string['analysing'] = 'Analysis';
$string['analysingdesc'] = 'Solution (system) analysis and modelling tasks';
$string['applytemplateselected'] = 'Apply selected template';
$string['april'] = 'April';
$string['asap'] = 'ASAP';
$string['asapdesc'] = 'As soon as possible...';
$string['assessment'] = 'Assessment';
$string['assessments'] = 'Assessments';
$string['assessmentstart'] = 'Start of assessments';
$string['assessmentstartevent'] = 'Assessment start event';
$string['assessmentstart_help'] = 'Date from which the project assessment starts';
$string['assigneddeliverables'] = 'Assigned deliverables';
$string['assignedspecs'] = 'Assigned specifications:';
$string['assignedtaskendsafter'] = 'An assigned task ends after deadline';
$string['assignedtasks'] = 'Assigned tasks';
$string['assignedto'] = 'Assigned to';
$string['assignedwork'] = 'Work assigned:';
$string['assignee'] = 'Assignee';
$string['assigneeunloaded'] = 'This contributor has no scheduled work';
$string['august'] = 'August';
$string['autograde'] = 'Autograde';
$string['autogradingenabled'] = 'Enable autograding';
$string['autogradingenabled_help'] = '<p>This option activates an internal automated grading calculation based on the compilation of entered information units. This grade
is essentially based on the exhaustiveness of the association and meta-information feeds from part of the students. More covered the
project plan is, higher will be the grade.</p>

<p>The autograde is calculated on a three index basis :</p>

<ul>
<li>The first index is the "association rate". Ideally, any requirement should have a path linking to at least one deliverable.
Moreover, any deliverable should have at least one path back to requirements. This index counts the amount of final entities, and
the amount of unlinked (orphans) entities. If the latter is null, this index should give the maximum grade.</li>

<li>The next index is the completion index, based on the propagated task completion indexes up to requirements.</li>

<li>The last index works on the task balancing between members. Three quarters of the index is given by the rate of assigned tasks
over total task definition. The remainder is given by the balancing of expected costs. A well balance work distribution will give the
highest score. A more unbalanced distribution will give less.</li>
</ul>

<p>The three crieria are then meaned with equal weights.</p>

<p>Step 2 : The teacher might redefine the calculus formula.</p>';
$string['autogradingweight'] = 'Weight for the automated grading';
$string['autogradingweight_help'] = '<p>The autograde will be mixed with the other grades using this weight factor. You may enter non integer numeric values here.</p>';
$string['backtosessions'] = 'Back to session summary';
$string['baddefaultqualifierseterror'] = 'Error : qualifier set is not compatible for restauration';
$string['beta'] = 'Beta';
$string['betadesc'] = 'Beta testing unit. Use without guarantee';
$string['blocked'] = 'Blocked';
$string['blockeddesc'] = 'No way to go further, we must override some external issues first.';
$string['bounditems'] = 'Bindings to {$a}';
$string['buggy'] = 'Buggy';
$string['byassignee'] = 'By assignee';
$string['bypriority'] = 'By priority';
$string['byworktype'] = 'By worktype';
$string['calculate'] = 'Calculate';
$string['cancel'] = 'Cancel';
$string['cannotevaluate'] = 'Actual settings or project content do not provide any evaluable element nor possibility.';
$string['cannotevaluatenocriteria'] = 'Cannot evaluate. No criteria defined.<br/> Please define some criteria first';
$string['cannotselfcopy'] = 'A project canot be copied on itself';
$string['canwait'] = 'Can wait';
$string['canwaitdesc'] = 'This can wait a bit';
$string['chargedispersion'] = 'Work charge dispersion';
$string['choosewhat'] = 'Choose action...';
$string['clearall'] = 'Clear all';
$string['clearallmilestones'] = 'Clear all milestones';
$string['clearcustomcsssheet'] = 'Delete custom CSS';
$string['clearcustomxslsheet'] = 'Delete the XSL filter';
$string['cleargrades'] = 'Clear all grades for this group';
$string['clearwarning'] = 'BEWARE : clearing data is an irreversible process<br/>All corresponding cross entity assignation will be deleted.<br/>Do you want to continue ?';
$string['close'] = 'Close session';
$string['code'] = 'Code';
$string['coding'] = 'Programing';
$string['codingdesc'] = 'Programing activities';
$string['compatiblequalifiersfound'] = 'Compatible qualifier set was found';
$string['compile'] = 'Compile all propagated values';
$string['complete'] = 'Complete';
$string['completedesc'] = 'All done. All\'s OK';
$string['completionrate'] = 'Work completion rate';
$string['complexity'] = 'Complexity';
$string['complexity_help'] = '';
$string['configuring'] = 'Configurating';
$string['configuringdesc'] = 'Configuration and setup';
$string['confirmdeletecriteria'] = 'Confirm deleting criteria';
$string['continue'] = 'Continue';
$string['copyadvice'] = 'Beware : copying a project tyo other groups will<br/>erase all previous data for those groups.<br/> The copy process cannot be rollbacked.<br/>Continue anyway ?';
$string['copyconfirm'] = 'Confirm project copy';
$string['copying'] = 'Copying';
$string['copyselected'] = 'Copy selected items';
$string['copysetup'] = 'Preparing copy operation';
$string['copyvalidationsession'] = 'Duplicate validation session';
$string['copywhat'] = 'Choose elements to be copied';
$string['costelapsed_help'] = '<p>This qualifier will allow calculating the quality of the project estimation. By indicating AFTER WORK IS DONE the real time cost of
a task, the project manager will calculate an "over" or "under" estimating trend of the project designers.</p>';
$string['costplanned'] = 'Planned cost';
$string['costplanned_help'] = '<p>This qualifier allows giving a foreseeing estimation of time cost of the current task. This cost should be entered in current
time units (Hours, Half-days, Days). If task division is accurate enough, a pretty good estimation of overal cost may be
calculated.</p>';
$string['costrate'] = 'Cost rate';
$string['costunit'] = 'Cost unit';
$string['covered'] = 'Covered';
$string['covering'] = 'Covering';
$string['created'] = 'Created';
$string['createddesc'] = 'Created but possibly incomplete package.';
$string['createvalidationsession'] = 'Create validation session';
$string['createvalidationsessionfollowup'] = 'Create new follow up session';
$string['criteria'] = 'Criteria';
$string['criteriadeleteadvice'] = 'Beware, removing a project erases all associated grades for all active groups within the project';
$string['criterion'] = 'Criterion';
$string['criterion_help'] = '<p>A <b>criterion</b> is a keyword for identifying the grading element. It should be entered as a single textual token, without
any spaces.</p>';
$string['crossentitiesmappings'] = 'Cross-entity mappings';
$string['cssloaded'] = 'CSS loaded';
$string['currentgroup'] = 'Workgroup :';
$string['currentphase'] = 'Current phase:';
$string['cvscontrol'] = 'CVS Control';
$string['datedued'] = 'Date dued';
$string['days'] = 'Days';
$string['deadline'] = 'Deadline';
$string['deadlineenable'] = 'Enable deadline';
$string['december'] = 'December';
$string['default'] = 'Default';
$string['delayed'] = 'Delayed';
$string['delayeddesc'] = 'We voluntarily decided to wait a while before working back on it.';
$string['delete'] = 'Delete';
$string['deletecriteria'] = 'Delete this criterion and all associated grades.';
$string['deletemilestone'] = 'Delete a milestone';
$string['deleteselected'] = 'Delete selected items';
$string['deletetask'] = 'Delete a task';
$string['deliverable'] = 'Deliverable';
$string['deliverables'] = 'Deliverables';
$string['deliverablesrate'] = 'Deliverable covering rate';
$string['deliverableswithbindings'] = 'Deliverables with bindings';
$string['delivered'] = 'Delivered';
$string['delivlinks'] = 'Associated deliverables';
$string['deliv_status'] = 'Deliverable status';
$string['deliv_status_help'] = '<p>This qualifier determines the status of a deliverable object. Here are default values for a standard software package typical deliverable:</p>

<p>Default values are:</p>

<ul>
<li><b>CREATED</b>: The deliverable object is created as envelope but empty or being filled.</li>

<li><b>BETA</b> : The deliverable is in beta, not reliable for production but available for open field tests.</li>

<li><b>FIX</b> : The deliverable has parts being actually fixed. It is a maintenance status. The pack should not be used.</li>

<li><b>OBSOLETE</b> : The deliverable content is kept for archive but contains obsolete material.</li>

<li><b>TEST</b> : The deliverable is passing the test procedures.</li>

<li><b>PACKAGING</b> : The deliverable object is being completed with accessory content such as documentation, sample data, demonstrators and tutorials.</li>

<li><b>REVIEW</b> : The deliverable content is being examined by reviewers.</li>

<li><b>STABLE</b> : The deliverable is stable and is available for delivery.</li>

</ul>';
$string['delivtitle'] = 'Deliverable title';
$string['deliv_to_miles_help'] = '<p>A deliverable can be assigned a milestone such as a task can.
Assigned deliverables implies submissions (step 2) will have to be
done before milesone is over.</p>';
$string['demomode'] = 'Demo mode (guest can edit)';
$string['demomodeclosedproject'] = 'Demo mode (Closed project. No editing)';
$string['demomode_help'] = '<p>This specific demonstration mode is activated by the module
configuration, when guest editing is allowed.</p>

<p>Guest will only be able to write in the "all users" workplace,
and will only view eventual explicit grouped workspaces.</p>

<p>Guests will be affected as students are by the edition rules
setup in module configuration for each entity.</p>';
$string['department'] = 'Department';
$string['description'] = 'Description';
$string['detail'] = 'Detail';
$string['difficult'] = 'Difficult';
$string['difficultdesc'] = 'Will be a difficult part to make or get';
$string['disableedit'] = 'Disable editing';
$string['documenting'] = 'Documentation';
$string['documentingdesc'] = 'Writing documentations.';
$string['domains'] = 'Qualifiers';
$string['done'] = 'Done';
$string['done_help'] = '<p>This qualifier tells what amount of a task has been completed,
(0 up to 100 scale). Completion indicators are propagated through
the whole data model to perform completion synthesis wherever it is
possible.</p>';
$string['down'] = 'Lower';
$string['editcriteria'] = 'Edit this criterion.';
$string['editheading'] = 'Edit heading';
$string['emptyproject'] = 'Empty project';
$string['enablecvs'] = 'Enable CVS control';
$string['enablecvs_help'] = '<p>When enabled, teacher will have access to the remote CVS control
panel.</p>

<p>The remote CVS controlling feature (step 2) allows Moodle to
pilot repository management within a CVS remote server. The project
manager will allow repository creation and deletion so each
workspace can be associated to its own project resource
repository.</p>';
$string['enableedit'] = 'Enable editing';
$string['endofproject'] = 'Project has ended';
$string['entities'] = 'Main entities';
$string['environment'] = 'Environment';
$string['errordeliverable'] = 'Error in deliverables';
$string['errorfatalaction'] = 'Fatal Error: Unknown Action: {$a}';
$string['errormilestone'] = 'Error in milestones';
$string['errornovalidatingentity'] = 'No entity enabled that can open to validations';
$string['errorrequirement'] = 'Error in requirements';
$string['errorspecification'] = 'Error in specifications';
$string['errortask'] = 'Error in tasks';
$string['essential'] = 'Essential';
$string['essentialdesc'] = 'Simply essential';
$string['evaluatingfor'] = 'Evaluating for:';
$string['evaluatingforusers'] = 'Evaluation for students';
$string['evident'] = 'Evident';
$string['evidentdesc'] = 'Trivial feature. Done in a second.';
$string['exportallforcurrentgroup'] = 'Export the entire project for the current group in pure XML';
$string['exportheadingtoXML'] = 'Export project description in XML';
$string['exports'] = 'Export features';
$string['features'] = 'Features';
$string['february'] = 'February';
$string['fix'] = 'Fixing';
$string['fixdesc'] = 'Be carefull, this resource may contain known errors';
$string['fixingforeignkeys'] = 'Recalculating foreign keys';
$string['freecriteria_help'] = '<p>This criteria set applies globally to the overall work. The
project can be assessed against a set of quantifiable measurements.
The criteria set, when used, is published for all students in the
project summary.</p>';
$string['freecriteriaset'] = 'Criteria set for global evaluation';
$string['from'] = 'From:';
$string['fromtasks'] = 'From tasks';
$string['fullfillselected'] = 'Full complete selection';
$string['gantt'] = 'Gantt';
$string['ganttchart'] = 'Gantt Diagram';
$string['gettheprojectfulldocument'] = 'Get the full project document';
$string['givedetail'] = 'See detailed copy report';
$string['giveonefinalgrade'] = 'Give a single final grade';
$string['giveonefinalgrade_help'] = '<p>When enabled, the project module will calculate a single grade per user for the user\'s notebook in Moodle. The grade is calculated
conforming to the criteria set definiton. the same grade is distributed over all participants in the same group (step 1).</p>

<p>Step 2: An additional grade per user can be added to the grade set.</p>';
$string['giveurl'] = 'Give a remote url to downloadable resource';
$string['globalevaluators'] = 'Global evaluators';
$string['goodie'] = 'Goodie';
$string['goodiedesc'] = 'It seems it will be a goodie';
$string['grade'] = 'Grade';
$string['grades'] = 'Grades';
$string['grading'] = 'Grading';
$string['groupapplytemplate'] = 'Template application to the group';
$string['groupcopy'] = 'Group operation : copy';
$string['groupcopymovewarning'] = 'Warning : copying elements between entity trees only copies anstract and description. Other qualifying values are lost.';
$string['groupdeleteitems'] = 'Group operation : delete';
$string['grouped'] = 'Groups (students workspace)';
$string['groupexport'] = 'Group export to XML';
$string['groupfullfill'] = 'Fullfill completion for the group';
$string['groupless'] = 'Out of group (default workspace)';
$string['groupmove'] = 'Group operation : moving';
$string['groupname'] = 'Groupname';
$string['groupoperations'] = 'Group operations';
$string['groupxmlexport'] = 'Group operation : XML exporting';
$string['guestsallowed'] = 'Allow guests to see';
$string['guestsallowed_help'] = '<p>When this option is enabled, guests can browse within the project workspaces. Guests are allowed to see the "default
workspace" whatever is defined for group mode. Other situations are summarized below :</p>

<ul>
<li>NO GROUPS<br>
<br>
When option is enabled, guest can browse within the default workspace with or without editing capabilities (see <a href=
"help.php?module=techproject&amp;file=guestscanuse.html&amp;forcelang=fr_utf8"> </a>).</li>

<li>VISIBLE GROUPS<br>
<br>
When option is enabled, guest can browse in all workspaces, and may have editing capabilities on default workspace (see <a href=
"help.php?module=techproject&amp;file=guestscanuse.html&amp;forcelang=fr_utf8">
</a>).</li>

<li>SEPARATE GROUPS<br>
<br>
When option is enabled, guest can browse only in default workspace, and cannot have any editing capabilities.</li>
</ul>

<p>In all cases, when the option is disabled, the guest is driven  back to course view.</p>';
$string['guestscanuse'] = 'Allow guests to use (demo)';
$string['guestscanuse_help'] = '<p>You can let a guest edit some data on the default workspace (out of group). This is reserved for demos and needs groups to be
disabled or to be visible.</p>

<p>Guests are constrainted just as students by the "entity by entity" enablers in the module configuration.</p>';
$string['guestspermissions'] = 'Permissions for guests';
$string['halfdays'] = 'Half days';
$string['hard'] = 'Hard';
$string['harddesc'] = 'Complex, may break many things elsewhere.';
$string['haveassignedtasks'] = 'Has {$a} task(s) assigned';
$string['haveownedtasks'] = 'Owns {$a} task(s)';
$string['haveuncompletedtasks'] = 'Has {$a} tasks(s) to complete';
$string['headings'] = 'Headings elements';
$string['heavy'] = 'Complex';
$string['heavydesc'] = 'Will need a heavy work';
$string['heavyness'] = 'Feasibility';
$string['heavyness_help'] = '<p>The heavyness is the estimation of the difficulty to provide the requirement to the customer.</p>
<p>This measurement is different of the complexity, that will provide factual information over the feature once
the analysis is performed. The heavyness may not know exactly what solution is available that could fullfill the requirement,
but will exprime the skill of estimation based on experience.</p>';
$string['high'] = 'High';
$string['highdesc'] = 'High';
$string['horizontalscale'] = 'Horizontal scale factor';
$string['hours'] = 'Hours';
$string['hurryup'] = 'You may being spending more time than allowed';
$string['implicit'] = 'MIGHT';
$string['implicitdesc'] = 'Not explicitely mentionned, but obvious.';
$string['import'] = 'Import';
$string['importdata'] = 'Import data';
$string['importdata_help'] = '<p>This feature will allow importing a complete entity tree from a CSV file.</p>

<p>The first line of the file must give column names. A semi-column ";" is required. The content must be encoded in UTF-8.</p>

<h4>Mandatory elements</h4>

<p>The CSV file has to provide mandatory information:</p>
<ul>
<li><b>"id" :</b> record identifier. An arbitrary identification, whatever the format, pursuant it is an unique code.</li>
<li><b>"parent" :</b> identifies a look backwards dependancy using the primary identifiers. The file thus must be ordered following the branch developement. Values for parent can be:
<ul>
<li>0 : Root level entry</li>
<li>A primary identifier ("id" column) : parent reference.</li>
</ul>
<li><b>"description" :</b> Textual description of entity. If no abstract is given, the description will be shorten to serve as abstract.</li>
</ul>

<h4>Common optional elements</h4>

<p>An additional column is common to all four entities.</p>
<ul>
	<li><b>"abstract" :</b> Defines a caption for the entity</li>
</ul>

<h4>Specific optional elements</h4>

<p>Some specific information may be added in entities (qualifiers).</p>';
$string['imports'] = 'Import features';
$string['importsexports'] = 'Import/export';
$string['impossible'] = 'Impossible';
$string['impossibledesc'] = 'Really not possible, even we would wish it be';
$string['installing'] = 'Install/deployment';
$string['installingdesc'] = 'Install/deployment';
$string['introformat'] = 'Format';
$string['introtechproject'] = 'Description';
$string['invaliddates'] = 'Invalid Dates';
$string['invalidobject'] = 'Invalid Object';
$string['investigating'] = 'Investigation';
$string['investigatingdesc'] = 'Investigating, getting information and foreseeing solution options';
$string['investigation'] = 'Investigation';
$string['itemcriteriaset'] = 'Criteria set for graduable items';
$string['itemcriteriaset_help'] = '<p>This criteria set applies to individual assessable elements (i.e. one grade per assessable element). All assessable elements
will share the same criteria set definition.</p>

<p>In step 1, only dated milestones are assessable. Step 2 will allow defining assessability for any entity unit.</p>';
$string['itemevaluators'] = 'Item scope evaluators';
$string['january'] = 'January';
$string['july'] = 'July';
$string['june'] = 'June';
$string['label'] = 'Label';
$string['label_help'] = '<p>The label defines the visible text in the GUI when criteria is displayed for users.</p>';
$string['leaves'] = 'Grading Leaves';
$string['leaves_help'] = '<p>"Effective" entities are those that are not splitted into subbentites (leaves). They are "terminal" elements of the project,
i.e., elements that designate an "effective" work to perfom.</p>

<p>As an example, if a task A is splitted into two tasks B and C performing B and C will realize A. The real work which has to be
done is the work defined by B and C. Here we conclude those tasks are "effective".</p>

<p>This definition can be generalized to the entire entity set managed by the project manager: Final requirements can also be
qualified as "effective", thus being those on which the final delivery checkup will concentrate its sight.</p>';
$string['left'] = 'Raise one level';
$string['light'] = 'High';
$string['lightdesc'] = 'High';
$string['load'] = 'Project Import/Export';
$string['loadcustomcsssheet'] = 'Load custom CSS';
$string['loadcustomxslsheet'] = 'Load the XSL filter';
$string['makedocument'] = 'Produire le document';
$string['mandatory'] = 'Mandatory';
$string['mandatorydesc'] = 'We cannot imagine the project without.';
$string['march'] = 'March';
$string['markasdoneselected'] = 'Mark as done (100%)';
$string['markastemplate'] = 'Mark as template';
$string['mastertasks'] = 'Master tasks';
$string['may'] = 'May';
$string['mean'] = 'Mean';
$string['mediatizing'] = 'Mediatizing';
$string['mediatizingdesc'] = 'Illustrating and mediatizing contents';
$string['medium'] = 'Medium';
$string['mediumdesc'] = 'Not a lot of work, but needs putting hands back in the mud';
$string['milestone'] = 'Milestone';
$string['milestonedeadline_help'] = '<p>A milestone can be given a deadline.</p>

<p>If this deadline is enabled, the dated milestone becomes an "official" phase of the activity module, and the assessment
strategy may use them for calculating late indicators.</p>

<p>Deadline cannot be set before project starts, nor overcome the project\'s end. Project end is considered as a built in phase, in
addition of any dated milestone.</p>

<p>The list ordering in the GUI being an ergonomic facility, consistency of deadline sequence is not verified when moving
milestones up and down. Step 2 will reinforce signalling about such inconsistencies.</p>';
$string['milestones'] = 'Milestones';
$string['milestonetitle'] = 'Milestone name';
$string['missing'] = 'Missing';
$string['modulename'] = 'Technical Project';
$string['modulenameplural'] = 'Technical Projects';
$string['moveselected'] = 'Move selected items';
$string['must'] = 'MUST';
$string['mustdesc'] = 'It must imperatively be there. No way !!';
$string['mygroupsadvice'] = 'My groups';
$string['nc'] = 'N.C.';
$string['needsmoreinfo'] = 'Needs more info';
$string['needsmoreinfodesc'] = 'Needs more information to evaluate';
$string['needswork'] = 'To develop';
$string['needsworkdesc'] = 'Needs work to provide';
$string['newvalueformfor'] = 'New value for {$a}';
$string['next'] = 'Next';
$string['noassignee'] = 'No assignee';
$string['nodelivassigned'] = 'No deliverable assigned.';
$string['nodeliverables'] = 'No deliverable';
$string['nogroup'] = 'Out of group (default)';
$string['nomilestone'] = 'No assigned milestone';
$string['nomilestones'] = 'No milestone';
$string['none'] = 'None';
$string['nonedesc'] = 'None';
$string['noonetoassess'] = 'No students here in this group. No assessment to distribute.';
$string['norequassigned'] = 'No requirement assigned.';
$string['norequirements'] = 'No requirement';
$string['noscale'] = 'No scale (numeric grading)';
$string['nospecassigned'] = 'No specification assigned.';
$string['nospecifications'] = 'No specification';
$string['notaskassigned'] = 'No task assigned';
$string['notasks'] = 'No task';
$string['notaskunassigned'] = 'No task unassigned';
$string['notevaluated'] = 'Not evaluated';
$string['notifynewdeliv'] = 'New project deliverable';
$string['notifynewmile'] = 'New project milestone';
$string['notifynewrequ'] = 'New project requirement';
$string['notifynewspec'] = 'New project specification';
$string['notifynewtask'] = 'New task entered';
$string['notifyreleasedtask'] = 'Task unassigned';
$string['notimplementedyet'] = 'Not available in this release';
$string['notingroup'] = 'The settings of this module do not allow an ungrouped student to use the project material. Please contact your teacher for group assignation.';
$string['notprioritary'] = 'Not prioritary';
$string['notprioritarydesc'] = 'Can be done after other works, but will help';
$string['notsubmittedyet'] = 'Not submitted yet.';
$string['novalidationsession'] = 'No validation session';
$string['novaluesindomain'] = 'No values apply in this domain. Global shared values apply as a default. If you add a value here, all the shared values will be overriden.';
$string['november'] = 'November';
$string['obsolete'] = 'Obsolete';
$string['obsoletedesc'] = 'This package or resource is or may be obsolete';
$string['october'] = 'October';
$string['of'] = 'of';
$string['optional'] = 'Optional';
$string['optionaldesc'] = 'there is other way to do it, but less practical or efficient.';
$string['organisation'] = 'Organisation';
$string['oruploadfile'] = 'or upload some file';
$string['other'] = 'Other';
$string['otherdesc'] = 'Other task type';
$string['outofreason'] = 'Out of reason';
$string['outofreasondesc'] = 'Its feasible but pragmatically out of reason';
$string['over'] = 'over';
$string['overdone'] = 'Overlap';
$string['overoverdone'] = 'Overlapped...';
$string['owner'] = 'Owner';
$string['packaging'] = 'Packaging';
$string['packagingdesc'] = 'Packaging, finalizing graphic apparence, final docs, installers, deployement tools, making packages for delivering and downloads.';
$string['parent'] = 'Parent';
$string['perth'] = 'Perth graph';
$string['phase'] = 'Phase';
$string['phaseend'] = 'Project is about to end';
$string['phaseover'] = 'Project is closed';
$string['phasestart'] = 'Project has not kicked off';
$string['planned'] = 'Planned';
$string['planneddesc'] = 'Task is not started but registered';
$string['pluginadministration'] = 'Project parameters';
$string['pluginname'] = 'Technical project';
$string['plus'] = 'EXTRA';
$string['plusdesc'] = 'Well, something that was\'nt expected at all, but so nice !!';
$string['preparingrestore'] = 'Preparing restore';
$string['previous'] = 'Previous';
$string['prioritary'] = 'Prioritary';
$string['prioritarydesc'] = 'Prioritary, after urgent work has been done.';
$string['priority'] = 'Priority';
$string['priority_help'] = '<p>This qualifier allows setting a priority for a specification. Priority will have influence on the tasks items that have been
assigned to these specifications. Priority and szeverity are distinct qualifiers, in that a low severity specification (thus
important in the final delivery) may have hight priority, because involved in a set of urgent realizations.</p>';
$string['project'] = 'Project';
$string['projectchangeddeliverable'] = 'Changes in deliverables';
$string['projectchangedmilestone'] = 'Changes in milestones';
$string['projectchangedrequ'] = 'Changes in requirements';
$string['projectchangedspec'] = 'Changed in specifictaions';
$string['projectchangedtask'] = 'Changes in tasklist';
$string['projectcopy'] = 'Project copy & clear';
$string['projectelements'] = 'Project elements';
$string['projectend'] = 'Project end';
$string['projectendevent'] = 'Project {$a} ends';
$string['projectis'] = 'Project is:';
$string['projectisover'] = 'Project is over. You cannot edit any more !!';
$string['projectproject'] = 'Projects activity';
$string['projectscope'] = 'Local qualifiers for the project';
$string['projectstart'] = 'Project start';
$string['projectstartevent'] = 'Project {$a} starts';
$string['projecttitle'] = 'Project title';
$string['qualifiers'] = 'Qualifiers';
$string['quoted'] = 'Estimated cost';
$string['quoted_help'] = '';
$string['quoting'] = 'Quoting/Evaluating';
$string['quotingdesc'] = 'Quoting / Evaluating';
$string['rationale'] = 'Rationale';
$string['realwork'] = 'Effective work:';
$string['recalculate'] = 'Recalculate all indicators';
$string['redirectingtoview'] = 'Redirecting to view';
$string['refused'] = 'Refused';
$string['regression'] = 'Regression';
$string['requirement'] = 'Requirement';
$string['requirements'] = 'Requirements';
$string['requirementsrate'] = 'Requirements covering rate';
$string['requirementswithbindings'] = 'Requirements with bindings';
$string['requirementtitle'] = 'Requirement title';
$string['requlinks'] = 'Associated requirements';
$string['resetproject'] = 'Deleting project data';
$string['resetting_courseproject'] = 'Deleting course level projet data';
$string['resetting_criteria'] = 'Deleting criteria for assessment and grades';
$string['resetting_grades'] = 'Deleting all assessment data';
$string['resetting_groupprojects'] = 'Deleting all group level data and all assessments';
$string['restoringandfixingfiles'] = 'Restoring and fixing file system';
$string['restoringcriteria'] = 'Restauring criteria';
$string['restoringdefaultprojectdata'] = 'Restoring default project data';
$string['restoringqualifiers'] = 'Restoring local qualifiers';
$string['restoringuserprojectdata'] = 'Restoring user project data';
$string['reviewing'] = 'Reviewing';
$string['reviewingdesc'] = 'Reviewing code, resources, or docs. Harmonizing.';
$string['right'] = 'Lower one level';
$string['risk'] = 'Risk factor';
$string['save'] = 'Save';
$string['savechanges'] = 'Save changes';
$string['scale'] = 'Scale';
$string['scheduled'] = 'Scheduled';
$string['scheduleddesc'] = 'Task has been scheduled for a known date, but is not started';
$string['seecapabilitysettings'] = 'See roles and capabilities settings';
$string['seedetail'] = 'See detail';
$string['selectall'] = 'Select all';
$string['selectanobjectfirst'] = 'Select an object first';
$string['september'] = 'September';
$string['severity'] = 'Severity';
$string['severity_help'] = '<p>This qualifier qualifies severity of a specification, i.e., the importance it will have in the final delivery.</p>

<p>A severe specification will produce some deliverables that are highly expected. Such features are central objectives of the
project itself. Severity is usually linked to the strength given to relevant requirements. But in some cases, severity could be a
technical recommandation, out of care of the final customer.</p>

<p>Less severe specifications will continue to be negotiable, although lack of them will always pull the final delivery to lower
quality.</p>';
$string['sharedscope'] = 'Global qualifers (shared as default)';
$string['should'] = 'SHOULD';
$string['shoulddesc'] = 'We would very like you have it, but it\'s still negociable';
$string['showdetails'] = 'Show details';
$string['simple'] = 'Simple';
$string['simpledesc'] = 'A little work, but easy to do';
$string['singularentries'] = 'Effective entries';
$string['slavetasks'] = 'Slave tasks';
$string['sortbydate'] = 'Sort by date';
$string['specification'] = 'Specification';
$string['specifications'] = 'Specifications';
$string['specificationswithbindings'] = 'Specifications with bindings';
$string['specifying'] = 'Specifications';
$string['specifyingdesc'] = 'Writing specifications.';
$string['speclinks'] = 'Associated specs';
$string['spectitle'] = 'Specification title';
$string['spectoreq'] = 'Assigned requirements';
$string['spec_to_req'] = 'Specification to requirements assignations';
$string['spec_to_req_help'] = '<p>This selector maps current specification to relevant requirements, according to the following semantic.</p>

<p><i>"Specification X is a description of the functional and/or technical solution that accomplishes the requirement Y"</i></p>

<p>Here the selection is multiple : An undetailed specification can realize a whole set of requirements. E.g., specifying existance of
an authentication unit could induce following accomplishments :</p>

<ol>
<li>user inditity requirement.</li>

<li>login/password authnetication.</li>

<li>roles abstraction definition.</li>
</ol>

<p>Conversely, a set of detailed specification could be needed to describe a less detailed requirement.</p>';
$string['spec_to_reqs'] = 'Specification to requirements assignation';
$string['spec_to_reqs_help'] = '';
$string['spent'] = 'Cost spent';
$string['stable'] = 'Stable';
$string['stabledesc'] = 'Stable package, production enabled';
$string['started'] = 'Started';
$string['starteddesc'] = 'We are working on the beast';
$string['status'] = 'Status';
$string['status_help'] = '<p>This qualifier tells in which state the task is. Task life cicle will occur changing from state to state. In step 1, task status
changing is free.</p>

<p>The default status set can be changed altering database, or setting a new value set for that project instance.</p>

<p>Default values are :</p>

<ul>
<li><b>PLANNED:</b> task is scheduled (with or without dates).</li>

<li><b>STARTED:</b> task is on work.</li>

<li><b>BLOCKED:</b> something externally blocks our work. We wait
for issue resolution.</li>

<li><b>DELAYED:</b> we decided to suspend our work for this
task.</li>

<li><b>COMPLETE:</b> task is complete. No more work to do.</li>
<li><b>ABANDONED:</b> task is over. No more work to do and result is not significant.</li>
</ul>

<p>Step 2 may add some formal "workflow" feature for managing task life cycle control.</p>';
$string['strengh_help'] = '<p>This qualifier allows defining some "strength" of a requirement, i.e., some measurement of the importance the customer attached to
this requirement.</p>

<p>Strong requirements will be no negociable parts of the project. They are usually central topics for which the project is
launched.</p>

<p>Lighter requirements might be subject to adaptation or even negociation, if staff or skills appear being unsufficiant after
project started.</p>';
$string['strength'] = 'Strength';
$string['strength_help'] = '<p>Strength is the measurement of the importance of the requirement for the customer.</p>';
$string['studentscanchange'] = 'Students can change...';
$string['sublinks'] = 'Dependencies';
$string['summary'] = 'Summary';
$string['summaryforproject'] = 'Summary for project:';
$string['task'] = 'Task';
$string['taskalone'] = 'Standalone task';
$string['taskcircularitypost'] = 'could not be registered : circularity constraint.';
$string['taskcircularitypre'] = 'The dependency for task';
$string['taskdependency'] = 'Depends on';
$string['taskdependency_help'] = '<p>Allows mapping task dependencies.</p>

<p>In a complex project, a task is likely to depend on previous works being achieved, because what has been produced by the latter
is involved in the former.</p>

<p>the trask tree implicitely defines subtasks as mastering a supertask, i.e., a supertask can be completed only after all
subtasks do. This defines an implicit dependency mapping that will needs no special work. Thus the dependency mapping list will only
show tasks that are not in the same hierarchy subtree.</p>

<p>The project manager is featured with a circularity detection function, who will avoid circular dependencies to be mapped. In
case circularity or interdependency has a sense (in real life), designers will have to choose a predominant direction for
dependency.</p>

<p>Cicularity avoidness will also forbid a subtask being dependent of any of its superstaks.</p>';
$string['task_dependencys'] = 'cross-tasks dependencies';
$string['taskend'] = 'Slave task';
$string['taskenddate'] = 'Task end date';
$string['taskenddate_help'] = '<p>A deadline can be set for a task. This deadline MUST be consistant with task start date against task estimated duration
:</p>

<ul>
<li>If start date is defined, deadline cannot occur before the start date summed with expected duration.</li>

<li>If start date is not enabled, it will nevertheless be calculated automatically as deadline minus the expected duration (0
as default for duration).</li>

<li>If the task is assigned to a dated milestone, deadline cannot overcome milestone deadline.</li>

<li>Deadline cannot overcome project end date.</li>
</ul>';
$string['taskendenable'] = 'Task end enable';
$string['taskfinishesaftermilestone'] = 'Task finishes after milestone ends';
$string['taskfinishesbeforeitstarts'] = 'Task finishes before project starts';
$string['taskfinishestoolate'] = 'Task finishes after project ends';
$string['tasklinks'] = 'Associated tasks';
$string['taskmiddle'] = 'Middleway task';
$string['tasks'] = 'Tasks';
$string['taskstart'] = 'Master task';
$string['taskstartdate'] = 'Task start date';
$string['taskstartdate_help'] = '<p>A task can be assigned a start date. This date will be used for Gantt workmap generation (step 2) and feasibility checks (step 2
either).</p>

<p>In step 1, the start date will have some checks performed :</p>

<ul>
<li>Task cannot start after the milestone deadline minus expected duration, if the current task is assigned to a dated
milestone.</li>

<li>Task cannot start after project ends (minus expected duration).</li>

<li>Task cannot start before project starts.</li>
</ul>';
$string['taskstartenable'] = 'Task start enable';
$string['taskstartsaftermilestone'] = 'Task cannot be executed in this milestone';
$string['taskstatus'] = 'Task state';
$string['taskswithbindings'] = 'Tasks with bindings';
$string['tasktitle'] = 'Task title';
$string['tasktodeliv'] = 'Deliverable to tasks mappigns';
$string['task_to_deliv'] = 'Deliverable to tasks assignations';
$string['task_to_deliv_help'] = '<p>Tasks are performed in order to produce some concrete parts of the project\'s goal. These identified products are so called
"deliverables".</p>

<p>This selector allows designating the deliverables the current task is responsible of.</p>

<p>By mapping such entities, you will allow some indicators being propagated through the project data model, allowing, as an example,
to display the completion rate of some deliverables based on task completion analysis.</p>';
$string['task_to_delivs'] = 'assignation of deliverables to tasks';
$string['task_to_miles'] = 'Task to milestone mapping';
$string['task_to_miles_help'] = '<p>A task can be assigned a milestone. When mapped to a milestone, some constraints on deadlines are added. The task is known as
having to be completed BEFORE the milestone is over.</p>

<p>Step 2 implementation will add more accurate controls and consistency checks on the schedule.</p>';
$string['tasktoolate'] = 'Task starts after project ends';
$string['tasktooshort'] = 'Task is too short. Planned duration does not fit within start and end range.';
$string['tasktoosoon'] = 'Task starts before project starts';
$string['tasktospec'] = 'Assigned specifications';
$string['task_to_spec'] = 'Tasks to specifications assignations';
$string['task_to_spec_help'] = '<p>Task can be designated as realizing some subset of specifications. A single task may realize multiple specifications,
if defined as a rather general task (e.g. : "make that software component" is a quite undetailed task definition that can realize
an entire set of detailed specifications for that module). Conversely, a set of tasks may be implied in the realization of a
single specification entry.</p>

<p>This selector allows mapping the current task to multiple specification entries.</p>

<p>By mapping such entities, you will allow some indicators being propagated through the project data model, allowing, as an example,
to display the completion rate of some specifications based on task completion analysis.</p>';
$string['task_to_specs'] = 'assignations of tasks to specifications';
$string['task_to_task'] = 'Task interdependencies';
$string['teachergrade'] = 'Teacher grade';
$string['teacherstools'] = 'Teacher\'s tools';
$string['teacherusescriteria'] = 'Teacher uses criteria';
$string['teacherusescriteria_help'] = '<p>When this option is enabled, assessing the project will use a
teacher defined criteria set.</p>

<p>Teachers will setup the criteria with a relevant panel in the "teacher\'s tools" section.</p>

<p>Criteria can be modified event after assessments started. Deleting a criterion will delete previous grades for this criterion for all assessed workspaces.</p>';
$string['techproject'] = 'Technical project';
$string['techproject:addinstance'] = 'Add a project';
$string['techproject:beassignedtasks'] = 'Be assigned tasks';
$string['techproject:canattachfiles'] = 'Can attach files';
$string['techproject:canbeevaluated'] = 'Be evaluated';
$string['techproject:changedelivs'] = 'Edit deliverables';
$string['techproject:changemiles'] = 'Define milestones';
$string['techproject:changenotownedtasks'] = 'Change not owned tasks (within group)';
$string['techproject:changerequs'] = 'Edit specifications';
$string['techproject:changespecs'] = 'Edit project requirements';
$string['techproject:changetasks'] = 'Edit and change tasks';
$string['techproject:configure'] = 'Configure the project environment';
$string['techproject:gradeproject'] = 'Define assessment and evaluate the project';
$string['techproject_help'] = 'Technical project';
$string['techproject:manage'] = 'Manage the project environment';
$string['techproject:managecriteria'] = 'Manage evaluation criteria';
$string['techproject:manageremoterepository'] = 'Manage remote repository (CVS)';
$string['techproject:managevalidations'] = 'Manage validation sessions';
$string['techproject:posttodelivs'] = 'Post to deliverables';
$string['techproject:validate'] = 'Validate';
$string['techproject:viewpreproductionentities'] = 'View preproduction entities';
$string['techproject:viewprojectcontrols'] = 'View project control screens';
$string['testing'] = 'Testing';
$string['testingdesc'] = 'Package is finished but still being tested.';
$string['thedelivs'] = 'The deliverables';
$string['themiles'] = 'The milestones';
$string['therequs'] = 'The requirements';
$string['thespecs'] = 'The specifications';
$string['thetasks'] = 'The tasks';
$string['timetocomplete'] = 'Time to complete';
$string['timeunit'] = 'Time unit';
$string['title'] = 'Project\'s name';
$string['to'] = 'to';
$string['todo'] = 'todo';
$string['toenhance'] = 'To enhance';
$string['totalcost'] = 'Total time spent';
$string['totaldeliv'] = 'Deliverables (all)';
$string['totalplanned'] = 'Total time planned';
$string['totalquote'] = 'Total quote';
$string['totalrequ'] = 'Requirements (all)';
$string['totalspec'] = 'Specifications (all)';
$string['totaltask'] = 'Tasks (all)';
$string['totaltime'] = 'Total time spent';
$string['tuning'] = 'Tuning/Setup';
$string['tuningdesc'] = 'Tuning and configuration operations';
$string['unassigned'] = 'Unassigned';
$string['unassigneddesc'] = 'Unspecified deliverable';
$string['unassignedtasks'] = 'Unassigned tasks';
$string['uncovered'] = 'Uncovered';
$string['ungroupedsees'] = 'Ungrouped student\'s access';
$string['ungroupedsees_help'] = '<p>If this capability is enabled, and visibility is somehow liberam (no groups or visible groups)
ungroup members (non teachers) can view the defaut project content and change data
if they own the relevant capabilities.</p>
<p>If enabled, and visibility policy is rather liberal, ungrouped students should be able to
watch the project content, but would not be allowed to change anything in it.
<p>If enabled and groups are separated, unegrouped users are given an error message.</p>';
$string['unqualified'] = 'N.C.';
$string['unscheduledtasks'] = 'Unscheduled tasks';
$string['unselectall'] = 'Unselect all';
$string['unset'] = 'unset';
$string['unspecifiedtasks'] = 'Unspecified tasks';
$string['unspecifiedtasks_help'] = '<p>Priority is given to the specification, whuch stands for a more pregannt project component to do before others. Tasks that have no assignation to
any specification cannot resolve their priority. They remain within an "unassigned set".';
$string['untracked'] = 'Untracked';
$string['untypedtasks'] = 'Untyped tasks';
$string['up'] = 'Raise';
$string['update'] = 'update';
$string['updatedeliv'] = 'Update a deliverable';
$string['updategrades'] = 'Save the grades';
$string['updatemilestone'] = 'Change a milestone';
$string['updaterequ'] = 'Change a requirement';
$string['updatespec'] = 'Change a specification';
$string['updatetask'] = 'Change a task';
$string['updatevalidation'] = 'Update validation session';
$string['uploadfile'] = 'Upload a file';
$string['upto'] = 'To:';
$string['urgent'] = 'Urgent';
$string['urgentdesc'] = 'Urgent';
$string['url'] = 'Url';
$string['used'] = 'Time used';
$string['useful'] = 'Useful';
$string['usefuldesc'] = 'Could do other way, but it is a great and appreciated feature';
$string['useriskcorrection'] = 'Use risk correction';
$string['useriskcorrection_help'] = 'Use risk correction';
$string['validations'] = 'Validations';
$string['verycomplex'] = 'Very Complex';
$string['verycomplexdesc'] = 'Needs breaking major parts of the architecture. Costful.';
$string['viewalltasks'] = 'View all tasks';
$string['viewonlyleaves'] = 'View only effective tasks';
$string['viewonlymasters'] = 'View only master tasks';
$string['views'] = 'Views';
$string['wecanhave'] = 'Exists, we can have';
$string['wecanhavedesc'] = 'We already have something alike, or can purchase easily';
$string['wehave'] = 'Available';
$string['wehavedesc'] = 'We already have similar thing';
$string['weight'] = 'Weight';
$string['weight_help'] = '<p>The criterion weight allows balancing influence of eacb criteria in the set. The balancing is performed using "barycentric" mean : the sum of all weights will determine the 100% factor on the max
grade.</p>';
$string['what'] = 'What ?';
$string['will'] = 'WILL';
$string['willdesc'] = 'We expect seriously it will be there.';
$string['wished'] = 'MAY';
$string['wisheddesc'] = 'Not strictely necessary, but it would be nice you could have it';
$string['withchosennodes'] = 'with selected nodes...';
$string['worktype'] = 'Worktype';
$string['worktype_help'] = '<p>This qualifier tells what kind of work is to be done. Knowing what skills are usefull for a particular task may be of great help
for assigning works to participants.</p>

<p>Standard values are suited for a pragmatic software development project, but any other scale may be defined for a particular
instance.</p>

<p>Default values :</p>

<ul>
<li><b>PRE</b> Preview : Information seeking, documents
reading...</li>

<li><b>ANA</b> Analysis : System design, solution modelling</li>

<li><b>SPK</b> Specifications : Specifications authoring</li>

<li><b>COD</b> Code writing.</li>

<li><b>REV</b> Review : Code review, cleanup, harmonization</li>

<li><b>PAK</b> Packaging : Application packaging, installers,
deployement</li>

<li><b>DOC</b> Documenting : Documentations writing</li>
</ul>';
$string['writing'] = 'Writing';
$string['writingdesc'] = 'Writing contents';
$string['xmlexport'] = 'XML Export';
$string['xmlexportselected'] = 'Export selected items to XML...';
$string['xslloaded'] = 'Loaded XSL';
