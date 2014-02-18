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
 * Strings for component 'block_publishflow', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   block_publishflow
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesscategory'] = 'Authorized Platforms';
$string['activities'] = 'Activity(ies)';
$string['allowfreecategoryselection'] = 'Free selection of target category';
$string['allowfreecategoryselectiondesc'] = 'If enabled, the user can choose the final remote category (visible or not) the deployed course will be in, otherwise the preset default category wil be choosen as setup in the remote configuration.';
$string['alreadypublished'] = 'This course is already published. You may hide it and update it from a new backup.';
$string['autobackup'] = 'Automatic Backup';
$string['backsettings'] = 'Back to the settings page';
$string['backtocourse'] = 'Browse back to course';
$string['badkey'] = 'The key given for deployment is not the expected one.';
$string['badresponse'] = ': client failed to answer';
$string['blockname'] = 'Course Publication';
$string['catalog'] = 'Catalog';
$string['catupdate'] = 'Update Catalog';
$string['cdprivate'] = 'Private sessions.';
$string['cdpublicread'] = 'Public sessions. User unchecked.';
$string['cdpublicwrite'] = 'Public sessions . User identity checked.';
$string['choosecat'] = 'Category:';
$string['choosecatdefault'] = 'Default category';
$string['choosetarget'] = 'Target:';
$string['clientfailure'] = ':  The client failed to answer, it might be offline or it doesn\'t have the required service enabled.';
$string['close'] = 'Close';
$string['closedcategory'] = 'Closing Category';
$string['closedcategory_desc'] = 'Category for archived course sessions';
$string['closehelper'] = 'We strongly recomend you making <b>a complete backup of the course</b> (including user files and data) and store a copy on your own. Take care that the "Generate a package" process DO NOT perform a complete backup, but only the content of the course for transfering the course structure to other nodes in the network.';
$string['closeprivate'] = 'Private closure';
$string['closeprivatehelper'] = 'When being closed in "private mode", only administrators and trainers can see the course content. Other users won\'t have any more access. Trainees will still remain enrolled within the session, so opening back the course is straight away possible, using the course settings.';
$string['closeprotected'] = 'Protected closure';
$string['closeprotectedhelper'] = 'When being closed in "protected mode", all trainees are assigned a "disabled" role, and will still have read access to the produced material.';
$string['closepublic'] = 'Public closure';
$string['closepublichelper'] = 'When being closed in "public mode", any authenticated user will be allowed to browse the content of the course and all productions.';
$string['closing'] = 'Closing session';
$string['collection'] = 'Collection';
$string['combined'] = 'Combined Type (factory + catalog)';
$string['combinedname'] = 'Factory and Catalog';
$string['completed'] = 'has concluded. It has been assigned the following Unique Identifier : {$a}';
$string['configenableretrofit'] = 'If this option is enabled, course can be retrofitted to one of the known course factory node(s) in the network.';
$string['configmoodlenodetype'] = 'Configure Moodle Node Type';
$string['configsubmitto'] = 'Submit config to';
$string['confirmupgrade'] = 'Are you sure you want to upgrade your catalog?';
$string['contributors'] = 'Contributors';
$string['cost'] = 'Cost for use';
$string['courseclosed'] = 'Course closed.';
$string['coursecontrol'] = 'Course control:';
$string['coursedeliveryislocal'] = 'Files won\'t be distributed by network transfers but through the local file system. This option only works for moodles sharing the same storage area.';
$string['coursefordelivery'] = 'Receiving Course';
$string['coursefordelivery_desc'] = 'Course for receiving course archive downloads';
$string['courseopen'] = 'The course is now open.';
$string['createdfields'] = 'Number of fields successfully created:';
$string['datecreated'] = 'Creation date';
$string['defaultplatform'] = 'Local';
$string['defaultrole'] = 'Default role in incoming courses';
$string['defaultrole_desc'] = 'This role is automatically assigned to the deployer in published, deployed or retrofitted courses. Beware that this setting acts over courses that are pushed in in this Moodle. To set up a role on a remote platform where to push out course volumes, you\'ll need to setup this setting on the remote platform.';
$string['deploy'] = 'Deploy';
$string['deploycategory'] = 'Default Category';
$string['deploycategory_desc'] = 'Course category for default deployment of courses';
$string['deployfortest'] = 'Deploy for testing:';
$string['deployfortest_help'] = '<h2>Learning Path Deployment</h2>
<h3>Deployment for testing</h3>

<p>A course can be straightely deployed from a Factory to a Learning Area for test purpose.</p>

<p>The deployment will automatically target the default deployment category defined in global settings.</p>';
$string['deployfreeuse'] = 'Deploy';
$string['deploying'] = 'Deploying a course';
$string['deployment'] = 'Course deployment';
$string['deploymentkey'] = 'Deployment key';
$string['deploymentkeydesc'] = 'If a key is setup here, the user qill have to give that key to deploy. Leave blank to disable.';
$string['deployname'] = 'Course Deployment';
$string['deploysuccess'] = 'Deployment succeeded.';
$string['disabledstudentdesc'] = 'Disabled students are based on Student role but will (should) not any more allowed to change any content in a course';
$string['disabledstudentrole'] = 'Disabled students';
$string['dobackup'] = 'Do a backup';
$string['doclose'] = 'Close the course';
$string['doopen'] = 'Open the course';
$string['dosynch'] = 'Resynch my hosts';
$string['enableretrofit'] = 'Enable retrofeed of courses';
$string['enterkey'] = 'Key to deploy:';
$string['erroradvice'] = 'Errors in you platform catalog ({$a} error(s)). Please run this script before using course factories';
$string['errorbadblockid'] = 'Bad block ID';
$string['errorencountered'] = 'has encountered an error:';
$string['errormonitoring'] = 'It appears you have:';
$string['errornotpublished'] = 'course is not published, please publish first.';
$string['errorunpublished'] = 'Course has no publishable backup, please make one first.';
$string['factory'] = 'Factory';
$string['factoryprefix'] = 'Factory prefix';
$string['factoryprefix_desc'] = 'Prefix of the factory platform';
$string['failed'] = 'Operation failed';
$string['failedfields'] = 'Number of failures:';
$string['fieldname'] = 'Access to platform';
$string['finish'] = 'Finish';
$string['helpsynch'] = 'Synchronising platform';
$string['ignoredfields'] = 'Number of hosts ignored:';
$string['indexing'] = 'Indexation';
$string['indexingof'] = 'Referencing a course';
$string['islocal'] = 'Local Data Storage';
$string['jumptothecourse'] = 'Jump to the new course instance';
$string['lastmodified'] = 'Last modified';
$string['learningarea'] = 'Learning Area';
$string['leavehere'] = 'Leave in his own category';
$string['mainhostprefix'] = 'Main host prefix';
$string['mainhostprefix_desc'] = 'Prefix of the main hosting platform';
$string['mainuseradvice'] = 'Being a main scope defined user, you do not own any target to deploy to.';
$string['managename'] = 'Retrofit and course management';
$string['managepublishedfiles'] = 'Manage Published Files';
$string['moodlenodetype'] = 'Moodle Node Type';
$string['netupdate'] = 'Publishing Network Data Update';
$string['networkrefreshautomation'] = 'Automated Network Refreshment';
$string['networktransferadvice'] = 'Beware: delivering a complete path package through the network may spend some amount of time. Although most common cases have been addressed with actual settings, the transfer of some particularily big files may fail. Contact your system administrator.';
$string['noassignation'] = 'No assignation';
$string['noautomatednetworkrefreshment'] = 'Disabled';
$string['nocatalog'] = 'No catalog found in network environment. Please review the block central settings.';
$string['nodeploytargets'] = 'We found no deployment target for your profile definition';
$string['noexistingtargets'] = 'No existing targets';
$string['nofactory'] = 'No factory. System configuration is not correct for retrofit action.';
$string['normalmoodle'] = 'Standard Moodle';
$string['notargets_help'] = '<h2>No deployment targets</h2>

<p>The course deployment system did not find any candidate for installing a working session in. The following situations may be addressed:</p>
<ul>
<li>You no deployment capability on any of the available training platforms.</li>
<li>Some technical issues do avoid physically connecting to the training nodes you are responsible of.</li>
<li>This course cannot be deployed because of being badly referenced.</li>
<ul>
<p>In any case, contact your tech support.</p>';
$string['notification'] = 'Open with trainees notification';
$string['notpublishedyet'] = 'Not yet published.';
$string['OKmonitoring'] = 'Network information is up to date. You do not need launching this script.';
$string['oneday'] = 'Once a day';
$string['onemonth'] = 'Once a month';
$string['oneweek'] = 'Once a week';
$string['open'] = 'Open the course';
$string['opening'] = 'Opening courses';
$string['opennotifyhelper'] = 'Using this opening mode, you will give access to the training session workspace and send an opening notification to all registered users in the course.';
$string['openwithoutnotifyhelper'] = 'Using this opening mode, you <b>silently</b> open the course session for the users. No mail will be sent.';
$string['perform'] = 'Perform the upgrade';
$string['platformlastupdate'] = 'Last Update Perfomed On';
$string['platformname'] = 'Platform Name';
$string['platformstatus'] = 'Platform Type';
$string['pluginname'] = 'Course Publishing Workflow';
$string['publicsessions'] = 'Allow Public Sessions';
$string['publicsessions_desc'] = 'If enabled, servers can provide you session lists without checking identity of the user';
$string['publish'] = 'Publish';
$string['publishconfirm'] = 'Visibility in master course catalog is immediate. Continue ?';
$string['publishedhidden'] = 'This course is in the master course catalog, but set to hidden. You may make it visible again.';
$string['publishflow'] = 'Platform Catalog Renewal';
$string['publishflow:addinstance'] = 'Add the Publication block to the course';
$string['publishflowbackups'] = 'Publishflow Backups';
$string['publishflowbackupsadvice'] = 'Please note that deleting files from this area will cause possible malfunction in this course deployment.';
$string['publishflow:deploy'] = 'Deploy a course onto a training node';
$string['publishflow:deployeverywhere'] = 'Deploy everywhere';
$string['publishflow_description'] = 'This service binds all functions dedicated to MNET publishing of courses. You need subscribe and publish both sides for course transfers to be enabled.';
$string['publishflow:manage'] = 'Manage the training session';
$string['publishflow:managelpoffer'] = 'Manage the local offer on training nodes';
$string['publishflow:managepublishedfiles'] = 'Can manage published archives';
$string['publishflow_name'] = 'Publishflow Services';
$string['publishflow:publish'] = 'Publish courses in main catalog';
$string['publishflow:retrofit'] = 'Can retrofit the course into a Factory';
$string['publishing'] = 'Publication';
$string['publishname'] = 'Course Publishing';
$string['publishsuccess'] = 'Publishing succeeded.';
$string['publishtooltip'] = 'Publish in the master course catalog';
$string['reference'] = 'Reference';
$string['reopen'] = 'Open again';
$string['republish'] = 'Update';
$string['republishconfirm'] = 'You will replace the actually published course with the new content. Continue ?';
$string['republishtooltip'] = 'Force update';
$string['retrofeedname'] = 'Retrofeed to factory';
$string['retrofit'] = 'Retrofeed in the factory';
$string['retrofit_help'] = '<h2>Course publishflow</h2>
<h3>Retrofeeding courses to factory</h3>

<p>Retrofeeding will copy this course to the designated factory instance in the network</p>

<p>When launching the retrofeeding operation, you will copy the structure and content of this course
as per the last backup stored in the publishing file area of the course.</p>

<p>The backup used for retrofeeding IGNORES any user related information and data
of the course, the activities, resources and blocks being reproduced with the same settings than the original.</p>

<p>The retrofed unit will be available in a predefined category.</p>';
$string['retrofiting'] = 'Retrofeed:';
$string['retrofitsuccess'] = 'Retrofeed finished.';
$string['retrofitting'] = 'Retrofeeding the path to the factory';
$string['runningcategory'] = 'Active Category';
$string['runningcategory_desc'] = 'Category for active sessions';
$string['sessionopening'] = 'Opening the courses';
$string['setup'] = 'Setup';
$string['single_full'] = 'Synchronise platforms types and categories';
$string['single_short'] = 'Synchronise platforms';
$string['step'] = 'Step';
$string['submitname'] = 'Submit name';
$string['submittodesc'] = 'Submit down';
$string['synchonizingnetworkconfig'] = 'Acquiring the network structure';
$string['synchplatforms'] = '<p>If a new Moodle host has been recently added to your network, you may resync the purpose of this node within the publishing network, and update its category structure local cache.</p>';
$string['testdeploy'] = 'Test deployement';
$string['unavailable'] = 'No backup available. You must backup without user data before transfering.';
$string['unpublish'] = 'Unpublish';
$string['unpublishable'] = 'Not publishable';
$string['unpublishconfirm'] = 'The effect in master course catalog is immediate. Continue ?';
$string['unpublishtooltip'] = 'Hide the course in the master course catalog';
$string['unregistered'] = 'This path has not received official agreement. It cannot be published nor deployed.';
$string['updateok'] = 'has been successfully upgraded';
$string['URL'] = 'Url';
$string['warningadvice'] = 'Warnings in your platform catalog ({$a} warning(s)). Please consider running this script soon.';
$string['warningload'] = 'WARNING: The operation you are about to launch may consume heavy load. DO NOT trigger it unless you have thought it through!';
$string['withoutnotification'] = 'Open without notifying the users';
