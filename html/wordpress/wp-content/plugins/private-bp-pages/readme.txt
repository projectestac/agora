=== Private BP Pages ===
Contributors: bphelp
Tags: buddypress, bbpress, privacy
Requires at least: 3.2.1 
Tested up to: 3.9
Stable tag: 1.3 
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin will make all BuddyPress/bbPress pages private while 
leaving your WordPress posts/pages public. 

== Description ==

This plugin will make all BuddyPress/bbPress pages private while 
leaving your WordPress post/pages public. Blocks BP RSS feeds to 
logged out visitors. This plugin requires BuddyPress to be installed 
and has not been tested with multisite. <b>Please make sure you read the
F.A.Q before installing and activating this plugin.</b>

Please keep in mind if you have the time to download and install this 
plugin and find it useful then you should at least provide a short 
<a href="http://wordpress.org/support/view/plugin-reviews/private-bp-pages">
review</a>. Otherwise future plugin development may be discontinued. 

== Installation ==

Install via the WordPress plugin installer and activate, or do a manual upload.
Go to Dashboard/Settings/Private BP Pages to define your redirect slug.

== Screenshots ==

1. Private BP Pages settings page

== Frequently Asked Questions ==

Q: I do not have bbPress installed so how can I use this plugin as I get a 
white screen with an error on activation?

A: In line 8 of private-bp-pages.php simply comment out this part:<br /> 
|| bbp_is_single_forum() || bbp_is_single_topic()

== Notes ==
None 

== Changelog ==

= 1.3 =
Added translation files for localization

= 1.2.5 =
Fixed potential redeclare function call if using one of my other plugins

= 1.2 =
Fixed depreciated bp_is_page() call

= 1.0 =
First release

== Upgrade Notice ==

= 1.3 =
Added translation files for localization

= 1.2.5 =
Fixed potential redeclare function call if using one of my other plugins

= 1.2 =
Fixed depreciated bp_is_page() call

= 1.0 =
First release
