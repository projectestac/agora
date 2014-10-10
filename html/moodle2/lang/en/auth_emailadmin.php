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
 * Strings for component 'auth_emailadmin', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_emailadmin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_emailadminconfirmation'] = 'Hi Moodle Admin,

A new account has been requested at \'{$a->sitename}\' with  the following data:

{$a->userdata}

To confirm the new account, please go to this web address:

{$a->link}

In most mail programs, this should appear as a blue link which you can just click on.  If that doesn\'t work, then cut and paste the address into the address line at the top of your web browser window.

You can also confirm accounts from within Moodle by going to
Site Administration -> Users';
$string['auth_emailadminconfirmationsubject'] = '{$a}: account confirmation';
$string['auth_emailadminconfirmsent'] = '<p>
Your account has been registered and is pending confirmation by the administrator. You should expect to either receive a confirmation or to be contacted for further clarification.</p>';
$string['auth_emailadmindescription'] = '<p>Email-based self-registration with Admin confirmation enables a user to create their own account via a \'Create new account\' button on the login page. The site admins then receives an email containing a secure link to a page where they can confirm the account. Future logins just check the username and password against the stored values in the Moodle database.</p><p>Note: In addition to enabling the plugin, email-based self-registration with admin confirmation must also be selected from the self registration drop-down menu on the \'Manage authentication\' page.</p>';
$string['auth_emailadminnoemail'] = 'Tried to send you an email but failed!';
$string['auth_emailadminrecaptcha'] = 'Adds a visual/audio confirmation form element to the signup page for email self-registering users. This protects your site against spammers and contributes to a worthwhile cause. See http://www.google.com/recaptcha/learnmore for more details. <br /><em>PHP cURL extension is required.</em>';
$string['auth_emailadminrecaptcha_key'] = 'Enable reCAPTCHA element';
$string['auth_emailadminsettings'] = 'Settings';
$string['auth_emailadminuserconfirmation'] = 'Hello {$a->firstname},

Welcome to (My Organization)! Your account has been approved. If you have not already done so, please tell us how you discovered (My Organization).

For student accounts, please let us know the project you would like to participate in and we will create your teacher account. The information for creating student accounts is  at http://www.my.org/student-accounts <a href=http://www.my.org/student-accounts>here</a>.

The first name needs to be the students "first name" and "first initial of the last name." The students last name will be the school name. Passwords need to be at least 8 characters long.

We\'re delighted you have joined us and hope to see you and your students participating in some of our projects. You are now a member of a rapidly growing community of educators and students using (My Organization) to share  projects, work and knowledge. If you ever need help don\'t hesitate to write to us at myorg@gmail.com <a href=mailto:myorg@gmail.com>here</a>. We\'ll try to address any questions, comments or concerns you may have regarding the (My Organization) with Google  Resources, Services and Tools. Check out our web pages at  http://www.my.org <a href=http://www.my.org/>here</a>

* * *

What is (My Organization)?

(My Organization) is an easy-to-use, Internet-based collaborative environment that enables educators to develop and manage Web-based curricular projects, share information, and work together on an international level. (My Organization) provides a variety of  Google tools and gadgets including integrated messaging, conferencing, and calendars, to support collaboration among teachers and students within (My Organization).

(My Organization) welcomes your projects and is looking forward to sharing a rich variety of projects and activities with your  participating students. When you login, list of popular categories appears. Click on one of the categories to browse the projects specified by it.  As you browse through these projects (click on the titles), they may help you generate an idea or two for you to use in developing a project of your own in (My Organization) or they may help you to identify projects in which
you may like to collaborate with other teachers and their students.

* * *

Because (My Organization) is project driven and run by volunteers, we would like you to consider creating a project in (My Organization) or volunteering to help with one. If you decide you would like to create a project or volunteer to help or support other projects,  please email us at myorg@gmail.com <a href=mailto:myorg@gmail.com>here</a>. (My Organization) leaders and volunteers are here to support your needs.

Remember,  online support for all (My Organization) participants is provided by (My Organization) volunteers. Please take what you learn from us and help other teachers learn too! We look forward to working with you and seeing your new projects!


Thank you,

My Name, Director


--
(My Organization) Team
<a href=http://www.my.org/>http://www.my.org</a>
<a href=mailto:myorg@gmail.com>myorg@gmail.com</a>
<a href=tel:123%20555%205555>123 555 5555</a>';
$string['pluginname'] = 'Email-based self-registration with admin confirmation';
