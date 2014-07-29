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
 * Strings for component 'block_live_services', language 'en', branch 'MOODLE_21_STABLE'
 *
 * @package   block_live_services
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alertsCancelButtonText'] = 'Cancel';
$string['alertsCannotIdentifyUserError'] = 'Cannot identify user. Please log out and log in again with your Live ID.';
$string['alertsCloseButtonText'] = 'Close';
$string['alertsErrorMessage'] = 'There was an error connecting to the Windows Live Alerts Service. Possible causes are a network interruption or improper configuration. Please contact your administrator.';
$string['alertsIconAltText'] = 'alerts';
$string['alertsManageText'] = '<a href="javascript:void(0);" onclick="[[alertsManageUrl]]">Manage</a> your Windows Live Alerts.';
$string['alertsMessage'] = 'Message';
$string['alertsNotSubscribed'] = 'You are not receiving alerts for this course. <a href=\'[[url]]\'>Subscribe</a>';
$string['alertsNotSubscribedMessage'] = 'You are not currently registered for Windows Live Alerts. Would you like to register for Windows Live Alerts and begin receiving alerts for <strong>[[groupDescription]]</strong>?';
$string['alertsSendAlertMessage'] = 'Send a message to students who subscribed to <strong>[[groupDescription]]</strong> course alerts.';
$string['alertsSendAnAlertLinkText'] = 'Send an alert';
$string['alertsSendAnAlertText'] = 'to members of this course.';
$string['alertsSendButtonText'] = 'Send';
$string['alertsSubject'] = 'Subject';
$string['alertsSubscribeButtonText'] = 'Subscribe';
$string['alertsSubscribeConfirmation1'] = 'You are now registered with Windows Live Alerts and you will receive alerts for <strong>[[groupDescription]]</strong>.';
$string['alertsSubscribeConfirmation2'] = 'You are now registered to receive alerts for <strong>[[groupDescription]]</strong>.';
$string['alertsSubscribed'] = 'You receive alerts for this course. <a href=\'[[url]]\'>Unsubscribe</a>';
$string['alertsSubscribedNoCoursesMessage'] = 'You have registered for Windows Live Alerts, but you do not currently have any alert subscriptions.<br/><br/> Subscribing to alerts for this course will enable you to receive notifications and updates about class events. Alerts can be sent to Windows Live Messenger, your mobile device, and/or your Windows Live email account. <br/><br/>Click Subscribe to begin receiving alerts for <strong>[[groupDescription]]</strong>.';
$string['alertsSubscribedOtherCoursesMessage'] = 'You have registered for Windows Live Alerts, but you do not have a subscription for <strong>[[groupDescription]]</strong>. Would you like to begin receiving alerts for this course?';
$string['alertsSubscribeHeader'] = 'Subscribe to Windows Live Alerts';
$string['alertsUnsubscribeAllButtonText'] = 'Unsubscribe All';
$string['alertsUnsubscribeAllConfirmation'] = 'You have been removed from the alerts groups for all courses.';
$string['alertsUnsubscribeButtonText'] = 'Unsubscribe';
$string['alertsUnsubscribeConfirmation'] = 'You have been removed from the alerts group for the <strong>[[groupDescription]]</strong> course.';
$string['alertsUnsubscribeInstructions'] = '<p>You currently receive alerts for <strong>[[groupDescription]]</strong>. Click Unsubscribe to stop receiving alerts for this course.  If you do not want to receive alerts for any of your courses, click Unsubscribe All.</p>
<p>If you change your mind and want to receive alerts again, click Subscribe in the Windows Live Services block.</p>';
$string['alertsUntitled'] = 'Untitled Alert';
$string['attachmentsText'] = 'This email has attachments. Open your <a target=\'_blank\' class=\'actionLink\' href=\'[[url]]\' onclick=\'javascript:parentGrayOut(false,null);hideOverlay();\'>inbox</a> to view them.';
$string['block_live_services_help'] = 'Live Services Help...';
$string['blockname'] = 'Microsoft&reg;&nbsp;Live Services';
$string['calendarAllDayEvent'] = 'All Day Event';
$string['calendarAllDayEventMessage'] = 'This is an All Day Event';
$string['calendarCancel'] = 'Cancel';
$string['calendarCreateLink'] = 'New Event';
$string['calendarEndDate'] = 'End Date';
$string['calendarEndTime'] = 'End Time';
$string['calendarFetchFailure'] = 'system unavailable';
$string['calendarIconAltText'] = 'View';
$string['calendarLiveCalendar'] = 'Windows Live Calendar';
$string['calendarManyEvents'] = 'upcoming events';
$string['calendarNoEvents'] = 'no upcoming events';
$string['calendarNotEnoughOptions'] = 'Not enough options?';
$string['calendarOneEvent'] = '1 upcoming event';
$string['calendarQuickItem'] = 'New Event';
$string['calendarSelect'] = 'Select';
$string['calendarSend'] = 'Send';
$string['calendarStartDate'] = 'Start Date';
$string['calendarStartTime'] = 'Start Time';
$string['calendarToday'] = 'Today';
$string['calendarUntitled'] = 'Untitled Event';
$string['calendarViewLink'] = 'View';
$string['configuationErrorMissingAppId'] = 'The Microsoft Live Services Plug-in for Moodle block has not been properly configured. The application ID or key has not been set. Please contact your system administrator.';
$string['emailAddAttachment'] = 'Add Attachment (select one or more)';
$string['emailAddAttachmentCourseNotSelected'] = 'File attachments are only available in course view';
$string['emailAddAttachmentNoAttachmentsAvailable'] = 'There are no resources available to attach for this course';
$string['emailAttachments'] = 'Attach file';
$string['emailAttachmentsDone'] = 'Done';
$string['emailBody'] = 'Messsage';
$string['emailCancel'] = 'Cancel';
$string['emailExchangeNotSetUp'] = 'The Exchange server has not been setup or is not configured properly at this time. Please contact your system administrator';
$string['emailFetchFailure'] = 'system unavailable';
$string['emailFrom'] = 'From';
$string['emailIconAltText'] = 'Inbox';
$string['emailLiveIdMissingCookie'] = 'The system was unable to access your Live ID. Please log out and log in again with your Live ID.';
$string['emailLoadingContacts'] = 'loading contacts...';
$string['emailManyMessages'] = 'new messages';
$string['emailMessage'] = 'Message';
$string['emailNoMessages'] = 'no new messages';
$string['emailOneMessage'] = '1 new message';
$string['emailOriginalMessage'] = 'Original Message';
$string['emailQuickMessage'] = 'New E-mail';
$string['emailSend'] = 'Send';
$string['emailSendLink'] = 'New E-mail';
$string['emailSent'] = 'Sent';
$string['emailSubject'] = 'Subject';
$string['emailTo'] = 'To';
$string['emailToTooltip'] = 'Separate multiple names with semicolons';
$string['emailUnreadMessage'] = 'New message [[m]] of [[n]]';
$string['emailUntitled'] = 'Untitled Message';
$string['emailViewLink'] = 'Inbox';
$string['emailWindowsLiveMail'] = 'Windows Live Hotmail&reg;';
$string['enablebingsearch'] = 'Enable Bing Search';
$string['faqFooter'] = 'Microsoft&reg;, bing&trade;, Hotmail&reg;, MSN&reg; and Windows Live&trade;&nbsp;are trademarks of the Microsoft group of companies.  All other trademarks are property of their respective owners.<br/><br/>&copy;&nbsp;2009 Microsoft Corporation.  All rights reserved. This documentation is licensed under the Creative Commons Attribution License. To view a copy of this license, (a) visit <a href="http://creativecommons.org/licenses/by/3.0/legalcode" target="_blank">http://creativecommons.org/licenses/by/3.0/legalcode</a>; or, (b) send a letter to Creative Commons, 171 2nd Street, Suite 300, San Francisco, California, 94105, USA.';
$string['faqMoodleA1'] = 'The Microsoft Live Services Plug-in for Moodle gives you the option to sign in to your Moodle using your Windows Live ID. In addition, when you\'re signed in to your Moodle you can also quickly access some popular Windows Live services such as Windows Live Mail, Calendar, and Messenger.';
$string['faqMoodleA2'] = 'The first time you sign in to your Moodle using your Windows Live ID you\'ll need to give the site access to view your Windows Live Messenger contacts list, so that Windows Live can send your settings through your Moodle.';
$string['faqMoodleA3'] = 'You can use your current e-mail address or sign up for a free Windows Live e-mail address. The choice is yours. Keep in mind that some features are only available for certain e-mail accounts. For example, e-mail access is limited to Hotmail, MSN&reg;, and Live addresses.';
$string['faqMoodleA4'] = 'This may have been done for you already by your Moodle administrator. If not, you can link your Moodle and Windows Live ID accounts together with the following steps:
<br/><br/><strong>Note:</strong> If you don\'t already have a Windows Live ID, you\'ll need to sign up for one before continuing.
<br/>To link your Moodle and Windows Live ID accounts together:
<ol>
<li>Log into Moodle.</li>
<li>Click your name in the upper-right corner to view your account.</li>
<li>Click <strong>Edit Profile.</strong></li>
<li>Click <strong>Show Advanced.</strong></li>
<li>In the <strong>MSN ID</strong> field, enter your Windows Live ID.</li>
<li>Click <strong>Update Profile.</strong></li>
</ol>';
$string['faqMoodleA5'] = 'If you can\'t sign into Moodle with your Windows Live ID, try the following:<br/>
<ul>
<li>Make sure that your whole e-mail address (before and after the @ sign) is entered in the <strong>Email address</strong> field. </li>
<li>Make sure that you entered your password correctly. Passwords are case sensitive. If you\'ve forgotten your password, try to reset it. </li>
<li>If you haven\'t used your Hotmail or MSN e-mail address for a long time, it may be deactivated. If your account was deactivated, <a href="http://login.live.com/login.srf?wa=wsignin1.0&rpsnv=10&ct=1244735143&rver=5.5.4177.0&wp=MBI&wreply=http://mail.live.com/default.aspx&lc=1033&id=64855&mkt=en-US" target="_blank">visit the Hotmail registration Web site</a> to open a new account. </li>
<li>Your user name may become unavailable if it doesn\'t include msn or hotmail domain after the @ sign, and you haven\'t used the account for more than a year. To sign up for new credentials, visit the Windows Live ID Web site. </li>
<li>Make sure that you have configured your browser to allow cookies. If your browser doesn\'t allow cookies, you can\'t sign in with your Windows Live ID. </li>
<li>See if there is an error message telling you that the network is temporarily out of service.</li>
</ul>';
$string['faqMoodleQ1'] = 'How is my Windows Live ID used in Moodle?';
$string['faqMoodleQ2'] = 'Why do I have to allow Windows Live access to my Moodle site?';
$string['faqMoodleQ3'] = 'Do I have to create a new e-mail address or can I use my current e-mail address?';
$string['faqMoodleQ4'] = 'How do I link my Moodle account to my Windows Live ID?';
$string['faqMoodleQ5'] = 'What should I do if I can\'t sign in?';
$string['faqPageHeader'] = 'Frequently Asked Questions: Using Windows Live&trade;&nbsp;Services in Moodle';
$string['faqPageIntro'] = 'Find answers to frequently asked questions about setting up your Windows Live&trade;&nbsp;ID, using your Windows Live ID to sign in to Moodle, and using Windows Live services.';
$string['faqWLIDA1'] = 'Windows Live ID gives you access to Microsoft&reg;&nbsp;services including Windows Live Hotmail&reg;, Windows Live Calendar, Windows Live Messenger, and bing&trade;&nbsp;search. You can create your Windows Live ID (e-mail and password) once, then use it to sign in to those services and others such as your Moodle site.
To learn more about Windows Live ID, see <a target="_blank" href="https://accountservices.passport.net/ppnetworkhome.srf?vv=650&lc=1033">Simplify your sign in.</a>';
$string['faqWLIDA2'] = 'You can sign up for a Windows Live ID from the Moodle login site or <a target="blank" href="https://signup.live.com/signup.aspx?rollrs=12&lic=1">go online and create an account.</a>';
$string['faqWLIDA3'] = 'To help protect your personal information, it\'s recommended that you change your password frequently.
<br/>To change your password:
<ol>
<li>Sign in to your account summary page with your Windows Live ID.</li>
<li>Under <strong>Password reset information</strong>, click <strong>Change</strong> next to <strong>Password</strong>.</li>
<li>Verify that the e-mail address in the <strong>Windows Live ID</strong> field is correct, and then type your old password in the <strong>Old password</strong> box.</li>
<li>Enter and confirm a new password.</li>
<li>To set your password to expire every 72 days, click the <strong>Make my password expire every 72 days</strong> check box, and then click <strong>Save</strong>.</li>
</ol>
Note:  Some services require you to change your password every 72 days. If you use one of these services, automatic password expiration may be set already and can\'t be changed.';
$string['faqWLIDA4'] = 'First follow these steps:
<ol>
<li>In the sign in area, click <strong>Forgot your password?</strong></li>
<li>In the <strong>E-mail address</strong> field, enter the address you used to create your Windows Live ID.</li>
<li>Enter the characters that you see in the <strong>Picture</strong> field, and then click <strong>Continue</strong>.</li>
</ol>
Then, you have two options to identify or reset your password. You can send yourself a message or answer your secret question.
To send yourself a message:
<ul>
<li>Click <strong>Send yourself a password reset e-mail message.</strong> </li>
<li>If you added an alternate e-mail to your credentials, click <strong>Send an e-mail message to my alternate e-mail address</strong>, and then click <strong>Send Message</strong>. Or, if you use the Save my e-mail address and password option when you sign in, click the option to send an e-mail message to your usual e-mail address, then click Send Message. You\'ll be able to access your e-mail, because your password was automatically saved.</li>
<li>Open your alternate e-mail account, and follow the instructions in the password reset e-mail message.</li>
</ul>
To answer your secret question:
<ul>
<li>Click <strong>Provide account information and answer your secret question.</strong></li>
<li>From the <strong>Country/Region</strong> menu, select the name of your country or region, enter your ZIP code or postal code if prompted to do so. Then, in the <strong>Secret Answer</strong> area, enter your answer to the question in the Question area. </li>
<li>Click <strong>Continue.</strong></li>
<li>Enter and confirm a new password, and then click <strong>Continue</strong>.</li>
<li>Click <strong>Done</strong></li>
</ul>';
$string['faqWLIDQ1'] = 'What is a Windows Live ID?';
$string['faqWLIDQ2'] = 'How do I get a Windows Live ID?';
$string['faqWLIDQ3'] = 'How do I change my Windows Live ID password?';
$string['faqWLIDQ4'] = 'What should I do if I forget my Windows Live ID password?';
$string['faqWLSA1'] = 'The Microsoft Live Services Plug-in for Moodle provides access to Windows Live Mail, Calendar, Messenger, Alerts, and Bing search.<br/><br/>
Note: If Windows Live services are not available from your Moodle site, then your Moodle administrator may not have installed this option.';
$string['faqWLSA10'] = 'Teachers within a Moodle course can send alerts to the students enrolled in that course.';
$string['faqWLSA11'] = 'If you have subscribed to Windows Live Alerts, and you <strong>subscribe for alerts for a particular course</strong>, you can receive alerts sent by the teacher of that course.';
$string['faqWLSA12'] = 'No, at this time Windows Live Alerts can only be sent to all subscribers in the same course.';
$string['faqWLSA13'] = 'If the Moodle administrator changes the short name used for the course, existing alert subscriptions for that course will stop working. To continue receiving alerts for the course, you\'ll need to subscribe to the course alerts again.';
$string['faqWLSA2'] = 'If you signed up for a Windows Live ID using an e-mail address that isn\'t from Hotmail, Live, or MSN, you cannot access e-mail within Moodle.';
$string['faqWLSA3'] = 'Yes, even if you don\'t have full access to your e-mail, you will still be able to maintain a contacts list using your Windows Live ID.';
$string['faqWLSA4'] = 'Yes, the Windows Live Calendar is available to all Windows Live ID accounts.';
$string['faqWLSA5'] = 'To learn more about setting up and maintaining your calendar, open <a target="_blank" href="http://help.live.com/help.aspx?project=Calendar&market=en-WW&querytype=&query=&tmt=main&domain=calendar.live.com">Windows Live Calendar Help.</a>';
$string['faqWLSA6'] = 'Make sure you\'ve added your classmates to your contacts list for Windows Live Messenger. You and your classmates may have to update your Windows Live Messenger Web settings to allow people to see your presence before you can see and chat with each other.';
$string['faqWLSA7'] = 'To turn presence on:<br/>
<ol>
<li>Open <a href="http://settings.messenger.live.com/applications/websettings.aspx?wa=wsignin1.0" target="_blank">Windows Live Messenger Web Settings.</a></li>
<li>If you aren\'t already signed in, you\'ll need to sign in with your Windows Live ID.</li>
<li>Click <strong>Allow anyone on the web to see my presence and send me messages.</strong></li>
<li>Click <strong>Save.</strong></li>
</ol>';
$string['faqWLSA8'] = 'In order to appear online to your classmates, make sure:
<ul>
<li>You have Windows Live Messenger running and you are signed in. (If Windows Live Messenger is not available to you, then your Moodle administrator may not have installed this option.)</li>
<li>Your classmates have added you to their contacts list and you have accepted their invitation.</li>
<li>You have updated your settings to allow people to see your presence.</li>
</ul>
See <a target="_blank" href="http://help.live.com/help.aspx?mkt=en-us&project=WL_Messengerv9&querytype=keyword&query=nogol">Windows Live Messenger Help</a> for more information.';
$string['faqWLSA9'] = 'An alert is a message that is broadcast to a group of teachers and students. Alerts can be delivered to your e-mail, Windows Live Messenger, and mobile device. When you subscribe to Windows Live Alerts, you can set your preferred delivery methods.';
$string['faqWLSQ1'] = 'What Windows Live services can I use from my Moodle?';
$string['faqWLSQ10'] = 'Who can send a Windows Live Alert?';
$string['faqWLSQ11'] = 'Who can receive a Windows Live Alert?';
$string['faqWLSQ12'] = 'Can I send a Windows Live Alert to an individual student?';
$string['faqWLSQ13'] = 'Why did my course alerts suddenly stop working?';
$string['faqWLSQ2'] = 'Why can\'t I access my e-mail?';
$string['faqWLSQ3'] = 'If I can\'t access my e-mail, can I maintain a contacts list?';
$string['faqWLSQ4'] = 'Is Windows Live Calendar available to everyone with a Windows Live ID?';
$string['faqWLSQ5'] = 'Where can I learn more about using the Windows Live Calendar?';
$string['faqWLSQ6'] = 'Why can\'t I send instant messages to my classmates?';
$string['faqWLSQ7'] = 'How do I turn on my presence in Windows Live Messenger?';
$string['faqWLSQ8'] = 'Why do I appear to be offline when my Windows Live Messenger presence is enabled?';
$string['faqWLSQ9'] = 'What is a Windows Live Alert?';
$string['identityHelpLink'] = 'FAQ';
$string['identityHomeLink'] = 'Windows Live&trade;';
$string['identityLogoAltText'] = 'Windows Live logo';
$string['identityNotSignedIn'] = 'You are not signed into<br />Windows Live&trade;';
$string['identityPrivacyLink'] = 'Privacy';
$string['identitySignInButtonText'] = 'Sign in';
$string['identitySignInParagraph'] = '<a href=\'[[url]]\'>Sign in</a> with your <strong>Microsoft Live ID.</strong>';
$string['identitySignInText'] = 'with your <br/>Windows Live ID';
$string['live_services'] = 'Live Services Help';
$string['live_services_help'] = '<!--
    <style type="text/css">

        div#faq
        {
            margin:18px;
        }
        h1
        {
            font-size:1.3em;
        }

        h2
        {
            font-size:1.1em;
        }
        h3
        {
            font-size:1.0em;
        }
        a.questionLink
        {
            display:block;
            margin:10px 4px;
        }

</style>  -->

    <h1>Frequently Asked Questions: Using Windows Live&trade;&nbsp;Services in Moodle</h1>
    <hr/>
    <p>Find answers to frequently asked questions about setting up your Windows Live&trade;&nbsp;ID, using your Windows Live ID to sign in to Moodle, and using Windows Live services.</p>

    <h2>Windows Live ID</h2>
    <a href="#WLID1" class="questionLink">What is a Windows Live ID?</a>
    <a href="#WLID2" class="questionLink">How do I get a Windows Live ID?</a>
    <a href="#WLID3" class="questionLink">How do I change my Windows Live ID password?</a>
    <a href="#WLID4" class="questionLink">What should I do if I forget my Windows Live ID password?</a>
    <h2>Moodle</h2>

    <a href="#Moodle1" class="questionLink">How is my Windows Live ID used in Moodle?</a>
    <a href="#Moodle2" class="questionLink">Why do I have to allow Windows Live access to my Moodle site?</a>
    <a href="#Moodle3" class="questionLink">Do I have to create a new e-mail address or can I use my current e-mail address?</a>
    <a href="#Moodle4" class="questionLink">How do I link my Moodle account to my Windows Live ID? </a>
    <a href="#Moodle5" class="questionLink">What should I do if I can\'t sign in? </a>
    <h2>Windows Live Services</h2>

    <a href="#WLS1" class="questionLink">What Windows Live services can I use from my Moodle?</a>
    <a href="#WLS2" class="questionLink">Why can\'t I access my e-mail?</a>
    <a href="#WLS3" class="questionLink">If I can\'t access my e-mail, can I maintain a contacts list? </a>
    <a href="#WLS4" class="questionLink">Is Windows Live Calendar available to everyone with a Windows Live ID?</a>
    <a href="#WLS5" class="questionLink">Where can I learn more about using the Windows Live Calendar?</a>
    <a href="#WLS6" class="questionLink">Why can\'t I send instant messages to my classmates? </a>

    <a href="#WLS7" class="questionLink">How do I turn on my presence in Windows Live Messenger?</a>
    <a href="#WLS8" class="questionLink">Why do I appear to be offline when my Windows Live Messenger presence is enabled?</a>
    <a href="#WLS9" class="questionLink">What is a Windows Live Alert?</a>
    <a href="#WLS10" class="questionLink">Who can send a Windows Live Alert?</a>
    <a href="#WLS11" class="questionLink">Who can receive a Windows Live Alert?</a>
    <a href="#WLS12" class="questionLink">Can I send a Windows Live Alert to an individual student?</a>

    <a href="#WLS13" class="questionLink">Why did my course alerts suddenly stop working?</a>
    <h2>Windows Live ID</h2>
    <h3 id="WLID1">What is a Windows Live ID?</h3>
    <p>Windows Live ID gives you access to Microsoft&reg;&nbsp;services including Windows Live Hotmail&reg;, Windows Live Calendar, Windows Live Messenger, and bing&trade;&nbsp;search. You can create your Windows Live ID (e-mail and password) once, then use it to sign in to those services and others such as your Moodle site.
To learn more about Windows Live ID, see <a target="_blank" href="https://accountservices.passport.net/ppnetworkhome.srf?vv=650&lc=1033">Simplify your sign in.</a></p>
    <h3 id="WLID2">How do I get a Windows Live ID?</h3>

    <p>You can sign up for a Windows Live ID from the Moodle login site or <a target="blank" href="https://signup.live.com/signup.aspx?rollrs=12&lic=1">go online and create an account.</a></p>
    <h3 id="WLID3">How do I change my Windows Live ID password?</h3>
    <p>To help protect your personal information, it\'s recommended that you change your password frequently.
<br/>To change your password:
<ol>
<li>Sign in to your account summary page with your Windows Live ID.</li>
<li>Under <strong>Password reset information</strong>, click <strong>Change</strong> next to <strong>Password</strong>.</li>

<li>Verify that the e-mail address in the <strong>Windows Live ID</strong> field is correct, and then type your old password in the <strong>Old password</strong> box.</li>
<li>Enter and confirm a new password.</li>
<li>To set your password to expire every 72 days, click the <strong>Make my password expire every 72 days</strong> check box, and then click <strong>Save</strong>.</li>

</ol>
Note:  Some services require you to change your password every 72 days. If you use one of these services, automatic password expiration may be set already and can\'t be changed.</p>
    <h3 id="WLID4">What should I do if I forget my Windows Live ID password?</h3>
    <p>First follow these steps:
<ol>
<li>In the sign in area, click <strong>Forgot your password?</strong></li>
<li>In the <strong>E-mail address</strong> field, enter the address you used to create your Windows Live ID.</li>

<li>Enter the characters that you see in the <strong>Picture</strong> field, and then click <strong>Continue</strong>.</li>
</ol>
Then, you have two options to identify or reset your password. You can send yourself a message or answer your secret question.
To send yourself a message:
<ul>
<li>Click <strong>Send yourself a password reset e-mail message.</strong> </li>
<li>If you added an alternate e-mail to your credentials, click <strong>Send an e-mail message to my alternate e-mail address</strong>, and then click <strong>Send Message</strong>. Or, if you use the Save my e-mail address and password option when you sign in, click the option to send an e-mail message to your usual e-mail address, then click Send Message. You\'ll be able to access your e-mail, because your password was automatically saved.</li>

<li>Open your alternate e-mail account, and follow the instructions in the password reset e-mail message.</li>
</ul>
To answer your secret question:
<ul>
<li>Click <strong>Provide account information and answer your secret question.</strong></li>
<li>From the <strong>Country/Region</strong> menu, select the name of your country or region, enter your ZIP code or postal code if prompted to do so. Then, in the <strong>Secret Answer</strong> area, enter your answer to the question in the Question area. </li>
<li>Click <strong>Continue.</strong></li>

<li>Enter and confirm a new password, and then click <strong>Continue</strong>.</li>
<li>Click <strong>Done</strong></li>
</ul>
</p>
    <h2>Moodle</h2>
    <h3 id="Moodle1">How is my Windows Live ID used in Moodle?</h3>
    <p>The Microsoft Live Services Plug-in for Moodle gives you the option to sign in to your Moodle using your Windows Live ID. In addition, when you\'re signed in to your Moodle you can also quickly access some popular Windows Live services such as Windows Live Mail, Calendar, and Messenger.</p>

    <h3 id="Moodle2">Why do I have to allow Windows Live access to my Moodle site?</h3>
    <p>The first time you sign in to your Moodle using your Windows Live ID you\'ll need to give the site access to view your Windows Live Messenger contacts list, so that Windows Live can send your settings through your Moodle. </p>
    <h3 id="Moodle3">Do I have to create a new e-mail address or can I use my current e-mail address?</h3>
    <p>You can use your current e-mail address or sign up for a free Windows Live e-mail address. The choice is yours. Keep in mind that some features are only available for certain e-mail accounts. For example, e-mail access is limited to Hotmail, MSN&reg;, and Live addresses. </p>
    <h3 id="Moodle4">How do I link my Moodle account to my Windows Live ID? </h3>
    <p>This may have been done for you already by your Moodle administrator. If not, you can link your Moodle and Windows Live ID accounts together with the following steps:

<br/><br/><strong>Note:</strong> If you don\'t already have a Windows Live ID, you\'ll need to sign up for one before continuing.
<br/>To link your Moodle and Windows Live ID accounts together:
<ol>
<li>Log into Moodle.</li>
<li>Click your name in the upper-right corner to view your account.</li>
<li>Click <strong>Edit Profile.</strong></li>
<li>Click <strong>Show Advanced.</strong></li>
<li>In the <strong>MSN ID</strong> field, enter your Windows Live ID.</li>

<li>Click <strong>Update Profile.</strong></li>
</ol>
</p>
    <h3 id="Moodle5">What should I do if I can\'t sign in? </h3>
    <p>If you can\'t sign into Moodle with your Windows Live ID, try the following:<br/>
<ul>
<li>Make sure that your whole e-mail address (before and after the @ sign) is entered in the <strong>Email address</strong> field. </li>

<li>Make sure that you entered your password correctly. Passwords are case sensitive. If you\'ve forgotten your password, try to reset it. </li>
<li>If you haven\'t used your Hotmail or MSN e-mail address for a long time, it may be deactivated. If your account was deactivated, <a href="http://login.live.com/login.srf?wa=wsignin1.0&rpsnv=10&ct=1244735143&rver=5.5.4177.0&wp=MBI&wreply=http://mail.live.com/default.aspx&lc=1033&id=64855&mkt=en-US" target="_blank">visit the Hotmail registration Web site</a> to open a new account. </li>
<li>Your user name may become unavailable if it doesn\'t include msn or hotmail domain after the @ sign, and you haven\'t used the account for more than a year. To sign up for new credentials, visit the Windows Live ID Web site. </li>
<li>Make sure that you have configured your browser to allow cookies. If your browser doesn\'t allow cookies, you can\'t sign in with your Windows Live ID. </li>
<li>See if there is an error message telling you that the network is temporarily out of service.</li>
</ul>
 </p>
   <h2>Windows Live Services</h2>

    <h3 id="WLS1">What Windows Live services can I use from my Moodle?</h3>
    <p>The Microsoft Live Services Plug-in for Moodle provides access to Windows Live Mail, Calendar, Messenger, Alerts, and Bing search.<br/><br/>
Note: If Windows Live services are not available from your Moodle site, then your Moodle administrator may not have installed this option. </p>
    <h3 id="WLS2">Why can\'t I access my e-mail?</h3>
    <p>If you signed up for a Windows Live ID using an e-mail address that isn\'t from Hotmail, Live, or MSN, you cannot access e-mail within Moodle. </p>
    <h3 id="WLS3">If I can\'t access my e-mail, can I maintain a contacts list? </h3>

    <p>Yes, even if you don\'t have full access to your e-mail, you will still be able to maintain a contacts list using your Windows Live ID.</p>
    <h3 id="WLS4">Is Windows Live Calendar available to everyone with a Windows Live ID?</h3>
    <p>Yes, the Windows Live Calendar is available to all Windows Live ID accounts.</p>
    <h3 id="WLS5">Where can I learn more about using the Windows Live Calendar?</h3>
    <p>To learn more about setting up and maintaining your calendar, open <a target="_blank" href="http://help.live.com/help.aspx?project=Calendar&market=en-WW&querytype=&query=&tmt=main&domain=calendar.live.com">Windows Live Calendar Help.</a></p>
    <h3 id="WLS6">Why can\'t I send instant messages to my classmates? </h3>

    <p>Make sure you\'ve added your classmates to your contacts list for Windows Live Messenger. You and your classmates may have to update your Windows Live Messenger Web settings to allow people to see your presence before you can see and chat with each other.</p>
    <h3 id="WLS7">How do I turn on my presence in Windows Live Messenger?</h3>
    <p>To turn presence on:<br/>
<ol>
<li>Open <a href="http://settings.messenger.live.com/applications/websettings.aspx?wa=wsignin1.0" target="_blank">Windows Live Messenger Web Settings.</a></li>
<li>If you aren\'t already signed in, you\'ll need to sign in with your Windows Live ID.</li>
<li>Click <strong>Allow anyone on the web to see my presence and send me messages.</strong></li>

<li>Click <strong>Save.</strong></li>
</ol></p>
    <h3 id="WLS8">Why do I appear to be offline when my Windows Live Messenger presence is enabled?</h3>
    <p>In order to appear online to your classmates, make sure:
<ul>
<li>You have Windows Live Messenger running and you are signed in. (If Windows Live Messenger is not available to you, then your Moodle administrator may not have installed this option.)</li>
<li>Your classmates have added you to their contacts list and you have accepted their invitation.</li>
<li>You have updated your settings to allow people to see your presence.</li>
</ul>

See <a target="_blank" href="http://help.live.com/help.aspx?mkt=en-us&project=WL_Messengerv9&querytype=keyword&query=nogol">Windows Live Messenger Help</a> for more information.
</p>
    <h3 id="WLS9">What is a Windows Live Alert?</h3>
    <p>An alert is a message that is broadcast to a group of teachers and students. Alerts can be delivered to your e-mail, Windows Live Messenger, and mobile device. When you subscribe to Windows Live Alerts, you can set your preferred delivery methods.</p>
    <h3 id="WLS10">Who can send a Windows Live Alert?</h3>
    <p>Teachers within a Moodle course can send alerts to the students enrolled in that course.</p>

    <h3 id="WLS11">Who can receive a Windows Live Alert?</h3>
    <p>If you have subscribed to Windows Live Alerts, and you <strong>subscribe for alerts for a particular course</strong>, you can receive alerts sent by the teacher of that course.</p>
    <h3 id="WLS12">Can I send a Windows Live Alert to an individual student?</h3>
    <p>No, at this time Windows Live Alerts can only be sent to all subscribers in the same course.</p>
    <h3 id="WLS13">Why did my course alerts suddenly stop working?</h3>

    <p>If the Moodle administrator changes the short name used for the course, existing alert subscriptions for that course will stop working. To continue receiving alerts for the course, you\'ll need to subscribe to the course alerts again.</p>
    <hr>
    <p style="font-size:0.8em;color:#333333">Microsoft&reg;, bing&trade;, Hotmail&reg;, MSN&reg; and Windows Live&trade;&nbsp;are trademarks of the Microsoft group of companies.  All other trademarks are property of their respective owners.<br/><br/>&copy;&nbsp;2009 Microsoft Corporation.  All rights reserved. This documentation is licensed under the Creative Commons Attribution License. To view a copy of this license, (a) visit <a href="http://creativecommons.org/licenses/by/3.0/legalcode" target="_blank">http://creativecommons.org/licenses/by/3.0/legalcode</a>; or, (b) send a letter to Creative Commons, 171 2nd Street, Suite 300, San Francisco, California, 94105, USA.</p>';
$string['messengerClassmates'] = 'Classmates';
$string['messengerHeader'] = 'Your Windows Live Messenger contacts';
$string['messengerIconAltText'] = 'messenger';
$string['messengerNoClassmatesInContacts'] = 'no classmates are in your contacts list';
$string['messengerNoStudentsInContacts'] = 'no students are in your contacts list';
$string['messengerNoTeachersInContacts'] = 'no teachers are in your contacts list';
$string['messengerPresenceLink'] = 'enable presence';
$string['messengerStudents'] = 'Students';
$string['messengerTeachersHeader'] = 'Teachers';
$string['outlookurlstr'] = 'Outlook URL';
$string['owaText'] = 'Open your <a target=\'_blank\' href=\'[[url]]\' class=\'actionLink\' onclick=\'javascript:parentGrayOut(false,null);hideOverlay();\'>inbox</a> in a new browser window';
$string['passwordstr'] = 'Password';
$string['placeholderstr'] = 'Place Holder String';
$string['pluginname'] = 'Microsoft&reg;&nbsp;Live Services';
$string['popupQuickEventTitle'] = 'Quick Calendar Event';
$string['popupQuickMessageTitle'] = 'Quick E-mail Message';
$string['popupSendAlertTitle'] = 'Send Alert';
$string['privacy'] = 'Privacy';
$string['privacyPolicyText'] = '<p>
        If you obtain Microsoft Live Services through a school account, your school may maintain the privacy policy applicable to your use of those Microsoft Live Services.  Contact your school to learn more about privacy and Microsoft Live Services.
      </p>
      <p>If you do not obtain Microsoft Live Services through a school account, your use of the Microsoft Live Services you obtain directly from Microsoft is subject to the Microsoft privacy statement(s) for those services.  Most Microsoft Live Services are subject to the [[privacyUrl]]  To learn more, visit the Web pages for the Microsoft Live Services you use.</p>
      <p>Microsoft is not responsible for the privacy policies or practices of third parties (including schools) or third-party software (including Moodle).</p>';
$string['privacyPolicyTitle'] = 'Microsoft&reg;&nbsp;Live Services Privacy Policy';
$string['privacyUrlText'] = 'Microsoft Online Privacy Statement.';
$string['profile_str'] = 'Profile';
$string['searchBingAltText'] = 'Search the web with bing. Type your query or select words on the page';
$string['searchHeader'] = 'Search the web';
$string['searchPowersetAltText'] = 'Search the web with Powerset. Type your query or select words on the page';
$string['serviceaccount'] = 'Service Account';
$string['showcalendar'] = 'Show Calendar';
$string['showemail'] = 'Show Email';
$string['showmessenger'] = 'Show Messenger';
$string['showsearch'] = 'Show Search';
$string['useoutlooklive'] = 'Use Outlook Live';
$string['warningauthmismatch'] = 'Warning: Windows Live ID does not match the authenticated user account.';
