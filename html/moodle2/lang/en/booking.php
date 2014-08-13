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
 * Strings for component 'booking', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   booking
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcategory'] = 'Edit categories';
$string['addeditbooking'] = 'Edit booking';
$string['additionalfields'] = 'Additional fields';
$string['addmorebookings'] = 'Add more bookings';
$string['addnewbookingoption'] = 'Add a new booking option';
$string['addnewcategory'] = 'Add new category';
$string['addteachers'] = 'Add teachers';
$string['addtocalendar'] = 'Add to calendar';
$string['addtogroup'] = 'Automatically enrol users in group';
$string['addtogroup_help'] = 'Automatically enrol users in group - group will be created automatically with name "Bookin name - Option name"';
$string['agreetobookingpolicy'] = 'I have read and agree to the following booking policies';
$string['allbookingoptions'] = 'Download users for all booking options';
$string['allmailssend'] = 'All emails to users have been sent sucesfully!';
$string['allowdelete'] = 'Allow users to cancel their booking themselves';
$string['allowupdate'] = 'Allow booking to be updated';
$string['answered'] = 'Answered';
$string['associatedcourse'] = 'Associated course';
$string['attachedfiles'] = 'Attached files';
$string['attachical'] = 'Attach ical events';
$string['attachicaldesc'] = 'Email notifications will include an attached ical event, if this is enabled';
$string['autoenrol'] = 'Automatically enrol users';
$string['autoenrol_help'] = 'If selected, users will be enroled onto the relevant course as soon as they make the booking and unenroled from that course as soon as the booking is cancelled.';
$string['availability'] = 'Still available';
$string['available'] = 'Places available';
$string['booked'] = 'Booked';
$string['bookedpast'] = 'Booked (course finished)';
$string['bookedtext'] = 'Booking confirmation';
$string['bookedtext_help'] = 'Leave this blank to use the site default text. You can use any of the following placeholders in the text:
<ul>
<li>{status}</li>
<li>{participant}</li>
<li>{title}</li>
<li>{duration}</li>
<li>{starttime}</li>
<li>{endtime}</li>
<li>{startdate}</li>
<li>{enddate}</li>
<li>{courselink}</li>
<li>{bookinglink}</li>
</ul>';
$string['bookedusers'] = 'Booked users';
$string['booking'] = 'Booking';
$string['booking:addinstance'] = 'Add new booking';
$string['bookingattachment'] = 'Attachment';
$string['bookingcategory'] = 'Category';
$string['booking:choose'] = 'Book';
$string['bookingclose'] = 'Until';
$string['bookingdeleted'] = 'Your booking was cancelled';
$string['booking:deleteresponses'] = 'Delete responses';
$string['booking:downloadresponses'] = 'Download responses';
$string['bookingduration'] = 'Duration';
$string['bookingfull'] = 'There are no available places';
$string['bookingmanagererror'] = 'The username entered is not valid. Either it does not exist or there are more then one users with this username (example: if you have mnet and local authentication enabled)';
$string['bookingmeanwhilefull'] = 'Meanwhile someone took already the last place';
$string['bookingname'] = 'Booking name';
$string['bookingopen'] = 'Open';
$string['bookingorganizatorname'] = 'Organizer name';
$string['bookingpoints'] = 'Course points';
$string['bookingpolicy'] = 'Booking policy';
$string['bookingpollurl'] = 'Poll url';
$string['booking:readresponses'] = 'Read responses';
$string['bookingsaved'] = 'Your booking was successfully saved. You can now proceed to book other courses.';
$string['booking:sendpollurl'] = 'Send poll url';
$string['booking:subscribeusers'] = 'Make bookings for other users';
$string['bookingtags'] = 'Tags';
$string['bookingtext'] = 'Booking text';
$string['booking:updatebooking'] = 'Manage booking options';
$string['booknow'] = 'Book now';
$string['bookotherusers'] = 'Book other users';
$string['cancelbooking'] = 'Cancel booking';
$string['categories'] = 'Categories';
$string['category'] = 'Category';
$string['categoryname'] = 'Category name';
$string['choosecourse'] = 'Choose a course';
$string['closed'] = 'Booking closed';
$string['confirmationmessage'] = 'Your booking has been registered


Booking status: {$a->status}
Participant:   {$a->participant}
Course:   {$a->title}
Date: {$a->startdate} {$a->starttime} - {$a->enddate} {$a->endtime}
To view all your booked courses click on the following link: {$a->bookinglink}
The associated course can be found here: {$a->courselink}';
$string['confirmationmessagesettings'] = 'Confirmation email settings';
$string['confirmationmessagewaitinglist'] = 'Hello {$a->participant},

Your booking request has been registered

Booking status: {$a->status}
Participant:   {$a->participant}
Course:   {$a->title}
Date: {$a->startdate} {$a->starttime} - {$a->enddate} {$a->endtime}
To view all your booked courses click on the following link: {$a->bookinglink}';
$string['confirmationsubject'] = 'Booking confirmation for {$a->title}';
$string['confirmationsubjectbookingmanager'] = 'New booking for {$a->title} by {$a->participant}';
$string['confirmationsubjectwaitinglist'] = 'Booking status for {$a->title}';
$string['confirmationsubjectwaitinglistmanager'] = 'Booking status for {$a->title}';
$string['confirmbookingoffollowing'] = 'Please confirm the booking of following course';
$string['confirmdeletebookingoption'] = 'Do you really want to delete this booking option?';
$string['coursedate'] = 'Date';
$string['courseendtime'] = 'End time of the course';
$string['coursestarttime'] = 'Start time of the course';
$string['createdby'] = 'Booking module created by edulabs.org';
$string['days'] = '{$a} days';
$string['daystonotify'] = 'How many days before start of event to notify participaints?';
$string['defaultbookingoption'] = 'Default booking options';
$string['deletebooking'] = 'Do you really want to unsubscribe from following course? <br /><br /> <b>{$a} </b>';
$string['deletebookingoption'] = 'Delete this booking option';
$string['deletecategory'] = 'Delete';
$string['deletedbookingmessage'] = 'Booking for following course deleted: {$a->title}

User: {$a->participant}
Title: {$a->title}
Date: {$a->startdate} {$a->starttime} - {$a->enddate} {$a->endtime}
Course: {$a->courselink}
Booking link: {$a->bookinglink}';
$string['deletedbookingsubject'] = 'Deleted booking: {$a->title} by {$a->participant}';
$string['deletedbookingusermessage'] = 'Hello {$a->participant},

Your booking for {$a->title} ({$a->startdate} {$a->starttime}) has been cancelled.';
$string['deletedbookingusersubject'] = 'Booking for {$a->title} cancelled';
$string['deletedtext'] = 'Cancelled booking message';
$string['deletedtext_help'] = 'Leave this blank to use the site default text. You can use any of the following placeholders in the text:
<ul>
<li>{status}</li>
<li>{participant}</li>
<li>{title}</li>
<li>{duration}</li>
<li>{starttime}</li>
<li>{endtime}</li>
<li>{startdate}</li>
<li>{enddate}</li>
<li>{courselink}</li>
<li>{bookinglink}</li>
<li>{pollurl}</li>
</ul>';
$string['deletesubcategory'] = 'Please, first delete all subcategories of this category!';
$string['deleteuserfrombooking'] = 'Do you really want to delete the users from the booking?';
$string['donotselectcourse'] = 'No course selected';
$string['download'] = 'Download';
$string['downloadallresponses'] = 'Download all responses for all booking options';
$string['downloadusersforthisoptionods'] = 'Download users as .ods';
$string['downloadusersforthisoptionxls'] = 'Download users as .xls';
$string['editcategory'] = 'Edit';
$string['endtimenotset'] = 'End date not set';
$string['entervalidurl'] = 'Please, enter a valid URL!';
$string['error:failedtosendconfirmation'] = 'The following user did not receive a confirmation mail

Booking status: {$a->status}
Participant:   {$a->participant}
Course:   {$a->title}
Date: {$a->startdate} {$a->starttime} - {$a->enddate} {$a->endtime}
Link: {$a->bookinglink}
Associated course: {$a->courselink}';
$string['eventduration'] = 'Event duration';
$string['eventpoints'] = 'Points';
$string['existingsubscribers'] = 'Existing subscribers';
$string['expired'] = 'Sorry, this activity closed on {$a} and is no longer available';
$string['fillinatleastoneoption'] = 'You need to provide at least two possible answers.';
$string['forcourse'] = 'for course';
$string['full'] = 'Full';
$string['groupname'] = 'Group name';
$string['havetologin'] = 'You have to log in before you can submit your booking';
$string['hours'] = '{$a} hours';
$string['limit'] = 'Limit';
$string['limitanswers'] = 'Limit the number of participants';
$string['mailconfirmationsent'] = 'You will shortly receive a confirmation e-mail';
$string['managebooking'] = 'Manage';
$string['maxoverbooking'] = 'Max. number of places on waiting list';
$string['maxparticipantsnumber'] = 'Max. number of participants';
$string['maxperuser'] = 'Max current bookings per user';
$string['maxperuser_help'] = 'The maximum number of bookings an individual user can make in this activity at once. After an event end time has passed, it is no longer counted against this limit.';
$string['maxperuserwarning'] = 'You currently have {$a->count}/{$a->limit} maximum bookings';
$string['messagesend'] = 'You message was sucesfully send.';
$string['messagesubject'] = 'Subject';
$string['messagetext'] = 'Message';
$string['minutes'] = '{$a} minutes';
$string['modulename'] = 'Booking';
$string['modulenameplural'] = 'Bookings';
$string['mustchooseone'] = 'You must choose an option before saving.  Nothing was saved.';
$string['mustfilloutuserinfobeforebooking'] = 'Befor proceeding to the booking form, please fill in some personal booking information';
$string['nobookingselected'] = 'No booking option selected';
$string['noguestchoose'] = 'Sorry, guests are not allowed to enter data';
$string['noresultsviewable'] = 'The results are not currently viewable.';
$string['norighttobook'] = 'Booking is not possible for your user role. Please contact the site administrator to give you the appropriate rights or sign in.';
$string['nosubscribers'] = 'There are no teachers assigned!';
$string['notbooked'] = 'Not yet booked';
$string['notificationsubject'] = 'Upcoming course...';
$string['notopenyet'] = 'Sorry, this activity is not available until {$a}';
$string['onwaitinglist'] = 'You are on the waiting list';
$string['organizatorname'] = 'Organizator name';
$string['placesavailable'] = 'Places available';
$string['pluginadministration'] = 'Booking administration';
$string['pluginname'] = 'Booking';
$string['pollurl'] = 'Poll url';
$string['pollurltext'] = 'Send poll url';
$string['pollurltext_help'] = 'Leave this blank to use the site default text. You can use any of the following placeholders in the text:
<ul>
<li>{status}</li>
<li>{participant}</li>
<li>{title}</li>
<li>{duration}</li>
<li>{starttime}</li>
<li>{endtime}</li>
<li>{startdate}</li>
<li>{enddate}</li>
<li>{courselink}</li>
<li>{bookinglink}</li>
<li>{pollurl}</li>
</ul>';
$string['pollurltextmessage'] = 'Please, take the survey

Survey url {pollurl}';
$string['pollurltextsubject'] = 'Please, take the survey';
$string['potentialsubscribers'] = 'Potential subscribers';
$string['removeresponses'] = 'Remove all responses';
$string['responses'] = 'Responses';
$string['responsesto'] = 'Responses to {$a}';
$string['rootcategory'] = 'Root';
$string['searchtag'] = 'Search tags';
$string['select'] = 'Selection';
$string['selectcategory'] = 'Select category';
$string['sendconfirmmail'] = 'Send confirmation email';
$string['sendconfirmmailtobookingmanger'] = 'Send confirmation email to booking manager';
$string['sendcustommessage'] = 'Send custom message';
$string['sendmailtobooker'] = 'Book other users page: Send mail to user who books instead to users who are booked';
$string['sendmailtobooker_help'] = 'Activate this option in order to send booking confirmation mails to
  the user who books other users instead to users, who have been added to a booking option.
  This is only relevant for bookings made on the page "book other users".';
$string['showallbookings'] = 'Show booking overview for all bookings';
$string['showmybookings'] = 'Show only my bookings';
$string['spaceleft'] = 'space available';
$string['spacesleft'] = 'spaces available';
$string['startendtimeknown'] = 'Start and end time of course are known';
$string['starttimenotset'] = 'Start date not set';
$string['statuschangebookedmessage'] = 'Hello {$a->participant},

Your booking status has changed. You are now registered in {$a->title}.

Booking status: {$a->status}
Participant:   {$a->participant}
Course:   {$a->title}
Date: {$a->startdate} {$a->starttime} - {$a->enddate} {$a->endtime}
To view all your booked courses click on the following link: {$a->bookinglink}
The associated course can be found here: {$a->courselink}';
$string['statuschangebookedsubject'] = 'Booking status changed for {$a->title}';
$string['statuschangetext'] = 'Status change message';
$string['statuschangetext_help'] = 'Leave this blank to use the site default text. You can use any of the following placeholders in the text:
<ul>
<li>{status}</li>
<li>{participant}</li>
<li>{title}</li>
<li>{duration}</li>
<li>{starttime}</li>
<li>{endtime}</li>
<li>{startdate}</li>
<li>{enddate}</li>
<li>{courselink}</li>
<li>{bookinglink}</li>
<li>{pollurl}</li>
</ul>';
$string['submitandaddnew'] = 'Save and add new';
$string['subscribersto'] = 'Teachers for  \'{$a}';
$string['subscribetocourse'] = 'Enrol users in the course';
$string['subscribeuser'] = 'Do you really want to enrol the users in the following course';
$string['sucesfulldeleted'] = 'Category was sucesfully deleted!';
$string['taken'] = 'Taken';
$string['teachers'] = 'Teachers:';
$string['timerestrict'] = 'Restrict answering to this time period';
$string['unlimited'] = 'Unlimited';
$string['updatebooking'] = 'Edit this booking option';
$string['usedinbooking'] = 'You can\'t delete this category, because you\'re using it in booking!';
$string['userdownload'] = 'Download users';
$string['usernameofbookingmanager'] = 'Username of the booking manager';
$string['usernameofbookingmanager_help'] = 'Username of the user who will be displayed in the "From" field of the confirmation notifications.
  If the option "Send confirmation email to booking manager" is enabled, this is the user who receives a copy of the confirmation notifications.';
$string['viewallresponses'] = 'Manage {$a} responses';
$string['waitinglist'] = 'On waiting list';
$string['waitinglisttaken'] = 'On the waiting list';
$string['waitinglistusers'] = 'Users on waiting list';
$string['waitingplacesavailable'] = 'Waiting list places available';
$string['waitingtext'] = 'Waiting list confirmation';
$string['waitingtext_help'] = 'Leave this blank to use the site default text. You can use any of the following placeholders in the text:
<ul>
<li>{status}</li>
<li>{participant}</li>
<li>{title}</li>
<li>{duration}</li>
<li>{starttime}</li>
<li>{endtime}</li>
<li>{startdate}</li>
<li>{enddate}</li>
<li>{courselink}</li>
<li>{bookinglink}</li>
<li>{pollurl}</li>
</ul>';
$string['waitspaceavailable'] = 'Places on waiting list available';
$string['withselected'] = 'With selected users:';
$string['yourselection'] = 'Your selection';
