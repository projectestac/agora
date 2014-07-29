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
 * Strings for component 'newsletter', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   newsletter
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['account_already_confirmed'] = 'Your account has already been enabled.
To proceed to the newsletter, click {$a->newsletterlink}.';
$string['account_confirmed'] = 'Welcome to {$a->sitename}, {$a->fullname}!

Your account {$a->username} has been enabled.
To edit your account details, click {$a->editlink}.
To proceed to the newsletter, click {$a->newsletterlink}.';
$string['allow_guest_user_subscriptions_desc'] = 'Enable to allow guest users to subscribe to newsletters on this site. This will necessitate their creating user accounts.';
$string['allow_guest_user_subscriptions_label'] = 'Allow guest user subscription';
$string['already_published'] = 'This issue has been published.';
$string['attachments'] = 'Attachments';
$string['attachments_help'] = 'Upload files you want to deliver with this issue as attachments.';
$string['config_activation_timeout_desc'] = 'Select how many days the activation links sent by e-mail will be valid for.';
$string['config_activation_timeout_label'] = 'Expiration time of activation links';
$string['config_debug_desc'] = 'Check this box to enable debug output for the newsletter cron job.';
$string['config_debug_label'] = 'Cron DEBUG mode';
$string['config_send_notifications_desc'] = 'Check this box to enable sending subscription-related notifications to subscribers.';
$string['config_send_notifications_label'] = 'Send notifications';
$string['create_new_issue'] = 'Create new issue';
$string['default_stylesheet'] = 'Default stylesheet';
$string['delete_all_subscriptions'] = 'Delete all subscriptions';
$string['delete_issue'] = 'Delete this issue';
$string['delete_issue_question'] = 'Are you sure you want to delete this issue?';
$string['delete_subscription_question'] = 'Are you sure you want to delete this subscription?';
$string['edit_issue'] = 'Edit this issue';
$string['edit_issue_title'] = 'Edit newsletter issue';
$string['edit_subscription_title'] = 'Edit subscription';
$string['entries_per_page'] = 'Entries per page';
$string['header_actions'] = 'Actions';
$string['header_content'] = 'Issue content';
$string['header_email'] = 'E-Mail';
$string['header_health'] = 'Status';
$string['header_name'] = 'Name';
$string['header_publish'] = 'Publishing options';
$string['health_0'] = 'Active';
$string['health_1'] = 'Problematic';
$string['health_2'] = 'Blacklisted';
$string['health_4'] = 'Unsubscribed';
$string['issue_htmlcontent'] = 'HTML content';
$string['issue_stylesheet'] = 'Stylesheet file for HTML content';
$string['issue_title'] = 'Issue title';
$string['issue_title_help'] = 'Type in the title of this issue. Required.';
$string['manage_subscriptions'] = 'Manage subscriptions';
$string['mode_group_by_month'] = 'Group issues by month';
$string['mode_group_by_week'] = 'Group issues by week';
$string['mode_group_by_year'] = 'Group issues by year';
$string['modulename'] = 'Newsletter';
$string['modulename_help'] = 'The newsletter module allows publishing of e-mail newsletters.';
$string['modulenameplural'] = 'Newsletters';
$string['newsletter'] = 'Newsletter';
$string['newsletterintro'] = 'Description';
$string['newslettername'] = 'Name';
$string['newslettername_help'] = 'This is the content of the help tooltip associated with the newsletter field. Markdown syntax is supported.';
$string['new_user_subscribe_message'] = 'Hello {$a->fullname},

You have requested to be subscribed to
\'{$a->newslettername}\' newsletter at \'{$a->sitename}\'
using this email address. A new account has been made for you:

Username: {$a->username}
Password: {$a->password}

You can change the account details after confirmation.
To confirm your new account, please go to this web address:

{$a->link}

In most mail programs, this should appear as a blue link
which you can just click on.  If that doesn\'t work,
then cut and paste the address into the address
line at the top of your web browser window.

If you need help, please contact the site administrator,
{$a->admin}';
$string['no_issues'] = 'This newsletter has no issues yet.';
$string['page_first'] = 'First';
$string['page_last'] = 'Last';
$string['page_next'] = 'Next';
$string['page_previous'] = 'Previous';
$string['pluginadministration'] = 'Newsletter administration';
$string['pluginname'] = 'Newsletter';
$string['publish_in'] = 'To be published in {$a->days} days, {$a->hours} hrs, {$a->minutes} min, {$a->seconds} sec.';
$string['publishon'] = 'Publish on';
$string['stylesheets'] = 'Upload newsletter stylesheets';
$string['stylesheets_help'] = 'Upload CSS files which will serve as stylesheets for this newsletter\'s issues. You may upload more than one, and you can selected them when creating a new issue. This field is optional, as the module comes with at least one out-of-the-box stylesheet file.';
$string['sub_mode_forced'] = 'Forced';
$string['sub_mode_opt_in'] = 'Opt in';
$string['sub_mode_opt_out'] = 'Opt out';
$string['subscribe'] = 'Subscribe';
$string['subscribe_question'] = 'Would you like to subscribe to newsletter "{$a->name}" using the e-mail address "{$a->email}"?';
$string['subscription_mode'] = 'Subscription mode';
$string['subscription_mode_help'] = 'Select whether the enrolled users are subscribed to this newsletter automatically (opt out) or have to subscribe manually (opt in). WARNING! Opt out will automatically subscribe all enrolled users!';
$string['unsubscribe'] = 'Unsubscribe';
$string['unsubscribe_link'] = '<hr /><p><a href="{$a->link}">{$a->text}</a></p>';
$string['unsubscribe_link_text'] = 'Click here to unsubscribe';
$string['unsubscribe_question'] = 'Would you like to unsubscribe your e-mail address "{$a->email}" from newsletter "{$a->name}"?';
