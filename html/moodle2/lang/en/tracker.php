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
 * Strings for component 'tracker', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   tracker
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandonned'] = 'Abandonned';
$string['action'] = 'Action';
$string['activeplural'] = 'Actives';
$string['addacomment'] = 'Add a comment';
$string['addanoption'] = 'Add an option';
$string['addaquerytomemo'] = 'Add this search query to "my queries"';
$string['addawatcher'] = 'Add a watcher';
$string['addtothetracker'] = 'Add to this tracker';
$string['administration'] = 'Administration';
$string['administrators'] = 'Administrators';
$string['allownotifications_help'] = 'When enabled some state changes may result in sending notifications to users when user is watching an issue. Users can configure which event will notify them.';
$string['alltracks'] = 'Watch my work in all trackers';
$string['AND'] = 'AND';
$string['any'] = 'All';
$string['askraise'] = 'Ask resolvers to raise priority';
$string['assignedto'] = 'Assigned to';
$string['assignee'] = 'Assignee';
$string['attributes'] = 'Attributes';
$string['browse'] = 'Browse';
$string['browser'] = 'Browser';
$string['build'] = 'Version';
$string['by'] = '<i>assigned by</i>';
$string['cascade'] = 'Send upper level';
$string['cascadedticket'] = 'Transferred from:';
$string['cced'] = 'Cced';
$string['ccs'] = 'Ccs';
$string['checkbox'] = 'Checkbox';
$string['checkboxhoriz'] = 'Checkbox horizontal';
$string['chooselocal'] = 'Choose a local tracker as parent';
$string['chooseremote'] = 'Choose a remote host';
$string['chooseremoteparent'] = 'Choose a remote instance';
$string['choosetarget'] = 'Choose target';
$string['clearsearch'] = 'Clear search criteria';
$string['comment'] = 'Comment';
$string['comments'] = 'Comments';
$string['component'] = 'Component';
$string['count'] = 'Count';
$string['countbyassignee'] = 'By assignee';
$string['countbymonth'] = 'By monthly creation report';
$string['countbyreporter'] = 'By reporter';
$string['countbystate'] = 'Report by status';
$string['createdinmonth'] = 'Created in current month';
$string['createnewelement'] = 'Create a new element';
$string['currentbinding'] = 'Current cascade';
$string['database'] = 'Database';
$string['datereported'] = 'Report date';
$string['defaultassignee'] = 'Default assignee';
$string['defaultassignee_help'] = 'You might require incoming tickets are preassigned to one of the available resolvers.';
$string['deleteattachedfile'] = 'Delete attachement';
$string['dependancies'] = 'Dependencies';
$string['dependson'] = 'Depends on';
$string['descriptionisempty'] = 'Description is empty';
$string['distribute'] = 'Move the ticket to another tracker';
$string['doaddelementcheckbox'] = 'Add a checkbox element';
$string['doaddelementcheckboxhoriz'] = 'Add a checkbox element';
$string['doaddelementdropdown'] = 'Add a dropdown element';
$string['doaddelementfile'] = 'Add an attachment file element';
$string['doaddelementradio'] = 'Add a radio element';
$string['doaddelementradiohoriz'] = 'Add a radio element';
$string['doaddelementtext'] = 'Add a text field';
$string['doaddelementtextarea'] = 'Add a text area';
$string['doupdateelementcheckbox'] = 'Update a checkbox element';
$string['doupdateelementcheckboxhoriz'] = 'Update a checkbox element';
$string['doupdateelementdropdown'] = 'Update a dropdown element';
$string['doupdateelementfile'] = 'Update a attachment file element';
$string['doupdateelementradio'] = 'Update a radio button element';
$string['doupdateelementradiohoriz'] = 'Update a radio button element';
$string['doupdateelementtext'] = 'Update a text field';
$string['doupdateelementtextarea'] = 'Update a text area';
$string['dropdown'] = 'Dropdown';
$string['editoptions'] = 'Update options';
$string['editproperties'] = 'Update properties';
$string['editquery'] = 'Change a stored query';
$string['editwatch'] = 'Change a cc registering';
$string['elements'] = 'Available elements';
$string['elements_help'] = 'Issue submission form can be customized by adding form elements. The "summary", "description", et "reportedby" fields are as default, but any additional qualifier can be added to the issue description.

Elements that can be added are "form elements" i.e. standard form widgets that can represent any qualifier or open description, such as radio buttons, checkboxes, dropdown, textfields or textareas.

Elements are set using the following properties:

### A name

This name is the element identifier, technically speaking. It must be a token using alphanumeric chars and the _ character, without spaces or non printable chars. The name will not appear on the user interface.

### Description

The description is used when the element has to be identified on the user interface.

### Options

Some elements have a finite list of option values.

Options are added after the element is created.

Fieldtexts and textareas do not have any options.';
$string['elementsused'] = 'Used elements';
$string['elucidationratio'] = 'Elucidation ratio';
$string['emailoptions'] = 'Mail options';
$string['emergency'] = 'Urgent query';
$string['emptydefinition'] = 'Target tracker has no definition.';
$string['enablecomemnts_help'] = 'When enabled some roles will be able to comment issues.';
$string['enablecomments'] = 'Allow comments';
$string['enablecomments_help'] = 'When this option is enabled, readers of issue records can add comments in the tracker.';
$string['erroraddissueattribute'] = 'Could not submit issue(s) attribute(s). Case {$a}';
$string['erroralreadyinuse'] = 'Element already in use';
$string['errorannotdeletecarboncopies'] = 'Cannot delete carbon copies for user : {$a}';
$string['errorannotdeletequeryid'] = 'Cannot delete query id: {$a]';
$string['errorbadlistformat'] = 'Only numbers (or a list of numbers seperated by a comma (",") allowed in the issue number field';
$string['errorcannotaddelementtouse'] = 'Cannot add element to list of elements to use for this tracker';
$string['errorcannotclearelementsforissue'] = 'Could not clear elements for issue {$a}';
$string['errorcannotcreateelementoption'] = 'Could not create element option';
$string['errorcannotdeletearboncopyforuser'] = 'Cannot delete carbon copy {$a->issue} for user : {$a->userid}';
$string['errorcannotdeletecc'] = 'Cannot delete carbon copy';
$string['errorcannotdeleteelement'] = 'Cannot delete element from list of elements to use for this tracker';
$string['errorcannotdeleteelementtouse'] = 'Cannot delete element from list of elements to use for this tracker';
$string['errorcannotdeleteolddependancy'] = 'Could not delete old dependancies';
$string['errorcannotdeleteoption'] = 'Error trying to delete element option';
$string['errorcannoteditwatch'] = 'Cannot edit this watch';
$string['errorcannothideelement'] = 'Cannot hide element from form for this tracker';
$string['errorcannotlogoldownership'] = 'Could not log old ownership';
$string['errorcannotsaveprefs'] = 'Could not insert preference record';
$string['errorcannotsetparent'] = 'Cannot set parent in this tracker';
$string['errorcannotshowelement'] = 'Cannot show element in form for this tracker';
$string['errorcannotsubmitticket'] = 'Error registering new ticket';
$string['errorcannotujpdateoptionbecauseused'] = 'Cannot update the element option because it is currently being used as a attribute for an issue';
$string['errorcannotunbindparent'] = 'Cannot unbind parent of this tracker';
$string['errorcannotupdateelement'] = 'Could not update element';
$string['errorcannotupdateissuecascade'] = 'Could not update issue for cascade';
$string['errorcannotupdateprefs'] = 'Could not update preference record';
$string['errorcannotupdatetrackerissue'] = 'Could not update tracker issue';
$string['errorcannotupdatewatcher'] = 'Could not update watcher';
$string['errorcannotviewelementoption'] = 'Cannot view element options';
$string['errorcannotwritecomment'] = 'Error writing comment';
$string['errorcannotwritedependancy'] = 'Could not write dependancy record';
$string['errorcanotaddelementtouse'] = 'Cannot add element to list of elements to use for this tracker';
$string['errorcookie'] = 'Failed to set cookie: {$a} .';
$string['errorcoursemisconfigured'] = 'Course is misconfigured';
$string['errorcoursemodid'] = 'Course Module ID was incorrect';
$string['errordbupdate'] = 'Could not update element';
$string['errorelementdoesnotexist'] = 'Element does not exist';
$string['errorelementinuse'] = 'Element already in use';
$string['errorfindingaction'] = 'Error:  Cannot find action: {$a}';
$string['errorinvalidtrackerelementid'] = 'Invalid element. Cannot edit element id';
$string['errormoduleincorrect'] = 'Course module is incorrect';
$string['errornoaccessallissues'] = 'You do not have access to view all issues.';
$string['errornoaccessissue'] = 'You do not have access to view this issue.';
$string['errornoeditissue'] = 'You do not have access to edit this issue.';
$string['errorrecordissue'] = 'Could not submit issue';
$string['errorremote'] = 'Remote error: {$a}';
$string['errorremotesendingcascade'] = 'Error on sending cascade :<br/> {$a}';
$string['errorunabletosabequery'] = 'Unable to save query as query';
$string['errorunabletosavequeryid'] = 'Unable to update query id {$a}';
$string['errorupdateelement'] = 'Could not update element';
$string['evolution'] = 'Trends';
$string['evolutionbymonth'] = 'Issue state evolution';
$string['file'] = 'Attached file';
$string['follow'] = 'Follow';
$string['generaltrend'] = 'Trend';
$string['hassolution'] = 'A solution is published for this issue';
$string['hideccs'] = 'Hide watchers';
$string['hidecomments'] = 'Hide comments';
$string['hidedependancies'] = 'Hide dependancies';
$string['hidehistory'] = 'Hide history';
$string['history'] = 'Assignees';
$string['iamadeveloper'] = 'I can work on tickets';
$string['iamnotadeveloper'] = 'I cannot work on tickets';
$string['icanmanage'] = 'I can manage ticket content';
$string['icannotmanage'] = 'I cannot manage ticket content';
$string['icannotreport'] = 'I cannot report';
$string['icannotresolve'] = 'I cannot assign nor close tickets';
$string['icanreport'] = 'I can report';
$string['icanresolve'] = 'I can assign and close tickets';
$string['id'] = 'Identifier';
$string['IN'] = 'IN';
$string['intest'] = 'Testing';
$string['intro'] = 'Description';
$string['inworkinmonth'] = 'Still in work';
$string['issueid'] = 'Ticket';
$string['issuename'] = 'Ticket label';
$string['issuenumber'] = 'Ticket';
$string['issues'] = 'ticket records';
$string['issuestoassign'] = 'Tickets to assign: {$a}';
$string['issuestowatch'] = 'Tickets to watch: {$a}';
$string['knownelements'] = 'Known tracker form elements';
$string['listissues'] = 'List view';
$string['local'] = 'Local';
$string['lowerpriority'] = 'Lower priority';
$string['lowertobottom'] = 'Lower to basement';
$string['manageelements'] = 'Manage elements';
$string['managenetwork'] = 'Cascade and network setup';
$string['manager'] = 'Manager';
$string['me'] = 'My profile';
$string['message_bugtracker'] = 'Thanks for your contribution and helping making this service more reliable.';
$string['message_taskspread'] = 'You just defined a task. Don\'t foget assigning it to some recepient in the nxt screns to distribute it.';
$string['message_ticketting'] = 'We have registered your query. I has been assigned to {$a}.';
$string['message_ticketting_preassigned'] = 'We have registered your query. It will be assigned and handled as soon as possible.';
$string['mode_bugtracker'] = 'Team bug tracker';
$string['mode_customized'] = 'Customized tracker';
$string['mode_taskspread'] = 'Task distributor';
$string['mode_ticketting'] = 'User support ticketting';
$string['mods_help'] = 'This module provides an amdinistrator or technical operator a way to collect locally issues on a Moodle implementation. It may be used mainly as an overall system tool for Moodle administration and support to end users, but also can be used as any other module for student projects. It can be instanciated several times within a course space.
The issue description form is fully customisable. The tracker administrator can add as many description he needs by adding form elements. The integrated search engine do ajust itself to this customization.';
$string['modulename'] = 'User support - Tracker';
$string['modulename_help'] = 'The Tracker activity allows tracking tickets for help, bug report, or also trackable activities in a course.

The activity allows creating the tracking form with attributes elements from a list of configurable elements. Some elements can be shared at site
level to be reused in other trackers.

the ticket (or task) can be assigned for work to another user.

The tracked ticket is a statefull ticket that sends state change notifications to any follower that has enabled notifications. A user can choose which state changes he tracks usually.

Tickets can be chained in dependancy, so it may be easy to follow a cause/consequence ticket sequence.

History of changes are tracked for each ticket.

Ticket tracker can be cascaded locally or through MNET allowing a ticket manager to send a ticket to a remote (higher level) ticket collector.

Trackers can now be chained so that ticket can be moved between trackers.';
$string['modulenameplural'] = 'User support - trackers';
$string['month'] = 'Month';
$string['myassignees'] = 'Resolver I assigned';
$string['myissues'] = 'Tickets I resolve';
$string['mypreferences'] = 'My preferences';
$string['myprofile'] = 'My profile';
$string['myqueries'] = 'My queries';
$string['mytasks'] = 'My tickets';
$string['mytickets'] = 'My tickets';
$string['mywatches'] = 'My watches';
$string['mywork'] = 'My work';
$string['name'] = 'Name';
$string['namecannotbeblank'] = 'Name cannot be empty';
$string['newissue'] = 'New ticket';
$string['noassignedtickets'] = 'No assigned tickets';
$string['noassignees'] = 'No assignee';
$string['nochange'] = 'Leave unchanged';
$string['nocomments'] = 'No comments';
$string['nodata'] = 'No data to show.';
$string['nodevelopers'] = 'No developpers';
$string['noelements'] = 'No element';
$string['noelementscreated'] = 'No element created';
$string['nofile'] = 'No uploaded file';
$string['nofileloaded'] = 'No file loaded here.';
$string['noissuesreported'] = 'No ticket here';
$string['noissuesresolved'] = 'No resolved ticket';
$string['nolocalcandidate'] = 'No local candidate for cascading';
$string['nomnet'] = 'Moodle network seems disabled';
$string['nooptions'] = 'No option';
$string['noqueryssaved'] = 'No stored query';
$string['noremotehosts'] = 'No network host available';
$string['noremotetrackers'] = 'No remote tracker available';
$string['noreporters'] = 'No reporters, there are probably no issues entered here.';
$string['noresolvers'] = 'No resolvers';
$string['noresolvingissue'] = 'No ticket assigned';
$string['notickets'] = 'No owned tickets.';
$string['noticketsorassignation'] = 'No tickets or assignations';
$string['notifications'] = 'Notifications';
$string['notifications_help'] = 'This parameter enables or disables mail notifications from the Tracker. If enabled, some events or state changes within the tracker will trigger mail messages to the concerned users.';
$string['notrackeradmins'] = 'No admins';
$string['nowatches'] = 'No watches';
$string['numberofissues'] = 'Ticket count';
$string['observers'] = 'Observers';
$string['open'] = 'Open';
$string['option'] = 'Option';
$string['optionisused'] = 'This options id already in use for this element.';
$string['options'] = 'Options';
$string['options_help'] = '### A name
The name identifies the option value. It should be a token using alphanumeric chars and _ without spaces or non printable chars.

### Description

The description is the viewable counterpart of the option code.

### Option ordering

You may define the order in which the options appear in the lists.

Textfield and textarea elements do not have any options.';
$string['order'] = 'Order';
$string['pages'] = 'Pages';
$string['pluginadministration'] = 'Tracker administration';
$string['pluginname'] = 'Ticket Tracker/User support';
$string['posted'] = 'Posted';
$string['potentialresolvers'] = 'Potential resolvers';
$string['preferences'] = 'Preferences';
$string['prefsnote'] = 'Preferences setups which default notifications you may receive when creating a new entry or when you register a watch for an existing issue';
$string['print'] = 'Print';
$string['priority'] = 'Attributed Priority';
$string['priorityid'] = 'Priority';
$string['profile'] = 'User settings';
$string['published'] = 'Published';
$string['queries'] = 'Queries';
$string['query'] = 'Query';
$string['queryname'] = 'Query label';
$string['radio'] = 'Radio buttons';
$string['radiohoriz'] = 'Horizontal radio buttons';
$string['raisepriority'] = 'Raise priority';
$string['raiserequestcaption'] = 'Priority raising request for a ticket';
$string['raiserequesttitle'] = 'Ask for raising priority';
$string['raisetotop'] = 'Raise to ceiling';
$string['reason'] = 'Reason';
$string['register'] = 'Watch this ticket';
$string['reportanissue'] = 'Post a ticket';
$string['reportedby'] = 'Reported by';
$string['reporter'] = 'Reporter';
$string['reports'] = 'Reports';
$string['resolution'] = 'Solution';
$string['resolved'] = 'Resolved';
$string['resolvedplural'] = 'Resolved';
$string['resolvedplural2'] = 'Resolved';
$string['resolver'] = 'My issues';
$string['resolvers'] = 'Resolvers';
$string['resolving'] = 'Resolving';
$string['runninginmonth'] = 'Running in current month';
$string['saveasquery'] = 'Save a query';
$string['savequery'] = 'Save the query';
$string['search'] = 'Search';
$string['searchbyid'] = 'Search by ID';
$string['searchcriteria'] = 'Search criteria';
$string['searchresults'] = 'Search results';
$string['searchwiththat'] = 'Launch this query again';
$string['selectparent'] = 'Parent selection';
$string['sendrequest'] = 'Send request';
$string['setoncomment'] = 'Send me the coments';
$string['setwhenopens'] = 'Don\'t advise me when opens';
$string['setwhenpublished'] = 'Don\'t advise me when solution is published';
$string['setwhenresolves'] = 'Don\'t advise me when resolves';
$string['setwhentesting'] = 'Don\'t advise me when a solution is tested';
$string['setwhenthrown'] = 'Don\'t advise me when is abandonned';
$string['setwhenwaits'] = 'Don\'t advise me when waits';
$string['setwhenworks'] = 'Don\'t advise me when on work';
$string['sharethiselement'] = 'Turn this element sitewide';
$string['sharing'] = 'Sharing';
$string['showccs'] = 'Show watchers';
$string['showcomments'] = 'Show comments';
$string['showdependancies'] = 'Show dependancies';
$string['showhistory'] = 'Show history';
$string['site'] = 'Site';
$string['solution'] = 'Solution';
$string['sortorder'] = 'Order';
$string['standalone'] = 'Standalone tracker (top level support).';
$string['statehistory'] = 'States';
$string['stateprofile'] = 'Ticket states';
$string['status'] = 'Status';
$string['strictworkflow'] = 'Strict workflow';
$string['strictworkflow_help'] = 'When enabled, each specific internal role in tracker (reporter, developer, resolvers, manager) will only have access to his accessible states against his role.';
$string['submission'] = 'A new ticket is reported in tracker [{$a}]';
$string['submitbug'] = 'Submit the ticket';
$string['subtrackers'] = 'Subtrackers';
$string['summary'] = 'Summary';
$string['sum_opened'] = 'Opened';
$string['sum_posted'] = 'Waiting';
$string['sum_reported'] = 'Reported';
$string['sum_resolved'] = 'Solved';
$string['supportmode'] = 'Support mode';
$string['supportmode_help'] = 'Support mode applies some predefined settings and role overides on the tracker to achieved a preset behaviour.

* Bug report: Reporters have access to the whole ticket list for reading the issues in a collaborative way. All states are enabled for a complete
tecnhical operation workflow, including operations on preprod test systems.

* User support/Ticketting: Reporters usually have only access to the tickets they have posted and cannot access to the ticket browsing mode. Some states
have been disabled, that are more commonly used for technical operations.

* Task distribution: Reporters can have or not access to the whole distributed ticket list. Workers can only have access to the tickets they are asigned to
through the "My work" screen. They will NOT have access to the browse function. some intermediate states have beed disabled for a simpler marking of task states.

* Customized: When customized, the activity editor can choose states and overrides to apply to the tracker. This is the most flexible setting, but needs a correct knowledge of Moodle roles and setting management.';
$string['testing'] = 'Being tested';
$string['text'] = 'Textfield';
$string['textarea'] = 'Textarea';
$string['thanksdefault'] = 'Thanks to contributing to the constant enhancement of this service.';
$string['thanksmessage'] = 'Thanks message.';
$string['ticketprefix'] = 'Ticket prefix';
$string['ticketprefix_help'] = 'This parameter allows defining a fixed prefix thatt will be prepended to the issue numerical identifier. This should allow better identification of a issue entry in documents, forum posts...';
$string['tickets'] = 'Tickets';
$string['tracker:addinstance'] = 'Add a tracker';
$string['tracker:canbecced'] = 'Can be choosen for cc';
$string['tracker:comment'] = 'Comment issues';
$string['tracker:configure'] = 'Configure tracker options';
$string['tracker:configurenetwork'] = 'Configure network features';
$string['tracker_description'] = '<p>When publishing this service, you allow trackers from {$a} to cascade the support tickets to a local tracker.</p>
<ul><li><i>Depends on</i>: You have to suscribe {$a} to this service.</li></ul>
<p>Suscribing to this service allows local trackers to send support tickets to some tracker in {$a}.</p>
<ul><li><i>Depends on</i>: You have to publish this service on {$a}.</li></ul>';
$string['tracker:develop'] = 'Be choosen to resolve tickets';
$string['trackerelements'] = 'Tracker\'s definition';
$string['trackereventchanged'] = 'Issue state change in tracker [{$a]}';
$string['trackerhost'] = 'Parent host for tracker';
$string['tracker-levelaccess'] = 'My capabilities in this tracker';
$string['tracker:manage'] = 'Manage issues';
$string['tracker:managepriority'] = 'Manage priority of entries';
$string['tracker:managewatches'] = 'Manage watches on ticket';
$string['trackername'] = 'Tracker name';
$string['tracker_name'] = 'Tracker module services';
$string['tracker:report'] = 'Report tickets';
$string['tracker:resolve'] = 'Resolve tickets';
$string['tracker:seeissues'] = 'See issue content';
$string['tracker_service_name'] = 'Tracker module services';
$string['tracker:shareelements'] = 'Share elements at site level';
$string['tracker:viewallissues'] = 'See all tickets';
$string['tracker:viewpriority'] = 'View priority of my owned tickets';
$string['tracker:viewreports'] = 'View issue work reports';
$string['transfer'] = 'Transfered';
$string['transfered'] = 'Transfered';
$string['transferservice'] = 'Support ticket cascading';
$string['turneditingoff'] = 'Turn editing off';
$string['turneditingon'] = 'Turn editing on';
$string['type'] = 'Type';
$string['unassigned'] = 'Unassigned';
$string['unbind'] = 'Unbind cascade';
$string['unmatchingelements'] = 'Both tracker definition do not match. This may result in unexpected behaviour when cascading support tickets.';
$string['unregisterall'] = 'Unregister from all';
$string['unsetoncomment'] = 'Advise me when posting comments';
$string['unsetwhenopens'] = 'Advise me when opens';
$string['unsetwhenpublished'] = 'Advise me when solution is published';
$string['unsetwhenresolves'] = 'Advise me when resolves';
$string['unsetwhentesting'] = 'Advise me when a solution is tested';
$string['unsetwhenthrown'] = 'Advise me when is thrown';
$string['unsetwhenwaits'] = 'Advise me when waits';
$string['unsetwhenworks'] = 'Advise me when got working';
$string['urgentquery_help'] = 'Checking this checkbox will send a signal to developpers or tickets managers so your issue can be considered more quickly.

Please consider although that there is no automated process using directly this variable. The acceptation of the emergency will be depending on how urgent support administrators have considered your demand.';
$string['urgentraiserequestcaption'] = 'A user has requested an urgent priority demand';
$string['urgentsignal'] = 'URGENT QUERY';
$string['validated'] = 'Validated';
$string['view'] = 'Views';
$string['vieworiginal'] = 'See original';
$string['voter'] = 'Vote';
$string['waiting'] = 'Waiting';
$string['watches'] = 'Watches';
$string['youneedanaccount'] = 'You need an authorized account here to report a ticket';
