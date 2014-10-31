=== Google Analyticator ===
Contributors: VideoUserManuals
Tags: stats, statistics, google, analytics, google analytics, tracking, widget
Requires at least: 3.2
Tested up to: 3.8
Stable tag: 6.4.7.3

Adds the necessary JavaScript code to enable Google Analytics. Includes widgets for Analytics data display.

== Description ==

Google Analyticator is back! Google Analyticator adds the necessary JavaScript code to enable Google Analytics logging on any WordPress blog. This eliminates the need to edit your template code to begin logging. Google Analyticator also includes several widgets for displaying Analytics data in the admin and on your blog.

For a video explaining the simple installation process, please [visit the new home of Google Analyticator](http://www.videousermanuals.com/google-analyticator/?utm_campaign=analyticator&utm_medium=plugin&utm_source=description).

= Features =

Google Analyticator Has the Following Features:

- Supports Universal (analytics.js) and traditional analytics (ga.js)
- Includes an admin dashboard widget that displays a graph of the last 30 days of visitors, a summary of site usage, the top pages, the top referrers, and the top searches
- Includes a widget that can be used to display visitor stat information on the front-end
- Supports outbound link tracking of all links on the page, including links not managed by WordPress
- Supports download link tracking
- Supports event tracking with outbound links / downloads instead of the old pageview tracking method
- Support site speed tracking
- Allows hiding of Administrator visits without affecting Google Analytics' site overlay feature
- Supports any advanced tracking code Google provides
- Installs easily - unlike other plugins, the user doesn't even have to know their Analytics UID
- Provides complete control over options; disable any feature if needed
- Supports localization - get the settings page in your language of choice
- Ability to hide Google UID dropdown
- Added Polish Translation

For more information, visit the [Google Analyticator plugin page](http://www.videousermanuals.com/google-analyticator/?utm_campaign=analyticator&utm_medium=plugin&utm_source=description).

If you have a great idea on how to improve the plugin, we would love to hear from you at the [Google Analyticator Feature Request page](http://www.videousermanuals.com/google-analyticator/feature-request/?utm_campaign=analyticator&utm_medium=plugin&utm_source=description)

A big thank you from the whole community to [Ronald](http://ronaldheft.com/) for all the hard work he put into this plugin.

== Installation ==

Please visit the new home of [Google Analyticator](http://www.videousermanuals.com/google-analyticator/?utm_campaign=analyticator&utm_medium=plugin&utm_source=description) for installation information.

If you are updating, you will need to Authenticate your site again, so it will work with the new Google API

== Frequently Asked Questions ==

If you receive an error after authenticating, refresh the page, and it will work properly. This is a known issue, and we are working with Google to resolve it.

For any support issues, please use the official WordPress support forums.

== Screenshots ==

1. An example of the admin dashboard widget displaying stats pulled from Google Analytics.
2. The top half of the settings page.
3. The configuration options for the front-end widget.
4. An example of a front-end widget configuration.
5. An example of a front-end widget configuration.
6. An example of a front-end widget configuration.


== Changelog ==

= 6.4.7.3 =
* Bug fix: Test data left in place of Domain name / UID dropdown

= 6.4.7.2 =
* Ability to hide Google UID dropdown
* Bug fix: rename stats_init to ganalyticator_stats_init
* Bug fix: Moved analyticsSnippet from line 1110 to line 1111
* Bug fix: added condition for empty href reported by @Jesin A http://wordpress.org/support/topic/bug-external-trackingjs-interferes-with-some-themes?replies=1
* Added Polish Translation from @mleczakm http://wordpress.org/support/topic/localization-translation

= 6.4.7 =
* Add missing Google PHP API classes

= 6.4.6 =
* Introduce Demographics and Interests support
* Enhanced Link attribution support
* added Universal Tracking (analytics.js) option
* Fixed sidebar Ad background for wp 3.8
* Used Custom Dimensions as replacement of Custom Variables for analytics.js

= 6.4.5 =
* Introduce Remarketing support
* Introduce Option to remove tracking on wp-login.
* Add link to Analytics training and option to remove.

= 6.4.4.3 =
* Bug fix: Duplicate data sometimes showing
* Bug fix: Flotr jQuery library clash with WooCommerce.

= 6.4.4.2 =
* Updated graph to not show current day as stats are incomplete.

= 6.4.4.1 =
* Update caused random Google error. Removed problem code.

= 6.4.4 =
* Added point tooltip. 
* removed jquery.sparkline.min.js
* added jquery.flot.min.js
* added 30 days, 60 days and yesterday selection
* removed line google-analytics-summary-widget.php line 222
* Use un-minified JS if script debug on. Props simonwheatley

= 6.4.3 =
* Fixes over strict validation on one field where not required causing PHP Errors. Thanks for head start jeremyclarke. 

= 6.4.2 =
* Fixes potential XSS security issue in admin - RECOMMENDED UPDATE. 

= 6.4.1 =
* Re-wrote caching on admin dashboard panel. Caches results for 6 hours, and speeds up display significantly using WordPress caching. 
* Added prevention on URI Class (Google) clashing. 

= 6.4 =
* Added better caching of dashboard widget.
* Added better error handling with Google API calls. Prevents breaking widget section if an error is found. 
* Updated Google API files to latest version (0.6.0)
* Added filter to prevent IDs being passed to google with 'ga:' appended twice (legacy user bug)
* Removed SiteSpeed option - done automatically with Google Analytics now.
* Changed some config options with Google API to try help any prev users with re-auth issues. 

= 6.3.4 =
* Missing admin_url() causing issues with sub-directory installs.
* Legacy code removed causing API errors with old ga_profileid variable conflicting.
* Added Google App ID To tracking ID as supplied by Google Analytics team. This is just for Google's own reporting. We do not get access to any of your data.
* Added support for users who wont want to authenticate with Google, but just use tracking code

= 6.3.3 =
* Using the admin_url() function for internal links. Should help people with WP installed in a sub directory.
* Added all vars to reset function to delete / deauthorize from Google.

= 6.3.2 =
* Based on user issues. Improved error handling from Google APIs (some more to go)
* Removed Javascript box on activation due to user issues
* Protected URITemplateParser class from being re-declared
* Added Reset option on plugin screen to allow re-authentication

= 6.3.1 =
* Small bug on upgrades patched

= 6.3 =
* Updated to authenticate with the new Google API

= 6.2 =
* Adds a new option for site speed tracking (enabled by default).
* Replaces deprecated tracking code _setVar with _setCustomVar.
* Improves the account select dropdown by organizing the accounts. Props bluntly.
* Prevents post preview pages from being tracked and skewing stats.

= 6.1.3 =
* Fixes a Javascript error on the WordPress login page.
* Improves profile id logic to hopefully fix dashboard errors for the people that experience them.
* Fixes PHP warnings on the dashboard widget with really old Analytics accounts.

= 6.1.2 =
* Fixes deprecated warnings when wp_debug is enabled.
* Fixes tracking code issues when trying to disabled certain user roles.
* Improves plugin security.

= 6.1.1 =
* Due to many questions about tracking code placement, [an FAQ article](http://forums.ronaldheft.com/viewtopic.php?f=5&t=967) has been written to address these placement questions. If you have any questions, this is a recommended read.
* Corrects issues related to selecting user roles to exclude from tracking / seeing the dashboard widget.
* Cleans up the display of user role names for WordPress versions below WordPress 3.0.
* Updates the included jQuary Sparkline library to 1.5.1, thus adding support for viewing the dashboard graph in all versions of Internet Explorer.
* Adds two hooks, google_analyticator_extra_js_before and google_analyticator_extra_js_after, enabling other WordPress plugins to insert additional tracking code.

= 6.1 =
* Prepares Google Analyticator for WordPress 3.0 compatibility.
* Updates the async tracking snippet to the latest version provided by Google. This new update solves issues with IE7 and IE6, and fixes all problems related to the snippet being placed in the <head> section of a page. You can rest easy knowing that async tracking in the <head> is completely compatible with IE now.
* Adds an html comment to the page header when tracking code is hidden due to the user admin level. This should make is less confusing for new Google Analyticator users, wondering if their tracking code is visible to the world.
* Adds a setting to specify a specific profile ID. This will help users with multiple Analytics profiles, by allowing them to specify which profile to use with the dashboard widget.
* Revamps the disable tracking settings. Now uses user roles and provides more fine grain control. If you use something other than the default, be sure to visit the settings page to ensure your settings are correct.
* Adds a new setting providing fine grain control over who can see the dashboard widget.
* Fixes the disappearing UID box bug when not authenticated.

= 6.0.2 =
* Updates the async tracking snippet to the latest version provided by Google.
* Improves the error message when failing to authenticate with Google, pointing users to a FAQ article to resolve their issues.

= 6.0.1 =
* Adds a missing closing quote on setVar - admin. If you use this option, update ASAP to prevent Javascript from breaking.

= 6.0 =
* Switches current tracking script (ga.js) to the new awesome async tracking script. In laymen's terms: updates to the latest tracking code, the tracking script will load faster, and tracking will be more reliable. If you use custom tracking code, be sure to migrate that code to the new async tracking methods.
* Removes settings made obsolete due to the new async tracking (footer tracking and http/https).
* Fixes the (not set) pages in the Top Pages section of the dashboard widget. Pages containing the title (not set) will be combined with the correct page and corresponding title. Note that I am still trying to get this bug fixed in the Google Analytics API; this is just a hold over until the bug is fixed.
* Adds a link to Google Analytics on the dashboard widget for quick access to view full stat reports.
* Fixes a Javascript error that prevented the dashboard widget from collapsing.
* Corrects a uid undefined error message that appeared if error reporting was set too high.
* Updates the included jQuery sparklines plugin to the latest version, 1.4.3.
* Adds an experimental function to retrieve page visitors stats for theme developers. This function is not final and only provided for advanced users who know what they're doing. Future versions will improve on the code already in place. Find the get_analytics_visits_by_page in google-analyticator.php to learn how to use. Use at your own risk.
* Fixes several security flaws identified during a recent security audit of Google Analyticator.
* Removes references to Spiral Web Consulting. Google Analyticator is now being developed exclusively by Ronald Heft.

= 5.3.2 =
* Prepares Google Analyticator for WordPress 2.9 compatibility.

= 5.3.1 =
* Corrects a fatal error on the settings page under WordPress 2.7.

= 5.3 =
* Converts API data call to AJAX to reduce the memory needed on page loads.
* Removes memory_limit alterations, since the default amount should be enough now.
* Disables the summary dashboard widget for non-admins, as defined by the admin level setting on Google Analyticator's settings page.

= 5.2.1 =
* Corrects a potential html sanitation vulnerability with text retrieved from the Google Analytics API.

= 5.2 =
* Adds support for deauthorizing with Google Analytics.
* Increases checks on the memory limit and now prevents the memory intensive functionality from running if there is insufficient memory.
* Adds authentication compatibility modes for users having issues with cURL and PHP Streams.
* Improves detection of Google Accounts that are not linked to Analytics accounts.
* Improves detection of accounts without stats.
* Cleans up the authentication URL, preventing the malformed URL error that Google would sometimes display.
* Removes hosted Google accounts from Google's authentication page.
* Adds an error message to the settings page if Google authentication fails.

= 5.1 =
* Fixes the broken/frozen error on the Dashboard introduced in Google Analyticator 5.0.
* Fixes an Internal Server Error received on the settings page under IIS servers.
* Adds an option to completely disable the included widgets.
* Removes the outbound and download prefixes from the Javascript if event tracking is enabled.
* Fixes a bug where the settings page always thought the Google account was authenticated.
* Prevents the Google API from even attempting to connect to Google's servers if the account is not authenticated.
* Increases the checks on returned Google API data to prevent unexpected states.
* Adds missing localized string to settings title.
* Removes the Google authentication and widgets from WordPress 2.7 due to compatibility issues. Users wishing to authenticate and use the widgets should upgrade to WordPress 2.8.
* Prevents PHP warnings from displaying on the dashboard summary widget when an Analytics account is new and does not have a history of data.

= 5.0 =
* Adds a new admin dashboard widget that displays a graph of the last 30 days of visitors, a summary of site usage, the top pages, the top referrers, and the top searches.
* Changes the Google authentication method to AuthSub. This removes the Google username / password requirement. **Users who had previously entered their username / password in the settings page will need to revisit the settings page and authenticate for the widget to continue to function.**
* Adds support for automatically retrieving an Analytics account's UID if Google Analyticator is authenticated with Google.
* Updates the Google Analytics API class to use the WordPress HTTP API, thus removing cURL as a core requirement for the widget.
* Updates the UID setting help to remove old urchin.js references and provide additional help for finding a UID.
* Prepares all strings for localization. 

= 4.3.4 =
* Fixes a bug that was breaking the save button on the settings page in IE.
* Prevents the widget from grabbing Analytics data earlier January 1, 2005.
* Fixes an incorrect default state for the event tracking option.
* Adds the date range used for widget data in an HTML comment to prevent misrepresented stats.

= 4.3.3 =
* Corrects XHTML validator errors present in the stat widget.
* Removes some stray code.

= 4.3.2 =
* Adds support for WordPress' new changelog readme.txt standard. Version information is now available from within the plugin updater.
* Enhances the links on the plugin page. Adds a settings, FAQ, and support link.

= 4.3.1 =
* Fixes a bug that broke the widget page when a username was not entered in settings.

= 4.3 =
* Adds support for event tracking of outbound links and downloads. This is the new, recommended way to track outbound links and downloads with Analytics. Event tracking is enabled by default, so users wishing to keep using the old method should disable this option immediately. See our FAQ for more information.
* Prevents files that are stored on external servers from being tracked as both a download and an external link.
* Corrects a file extension case sensitivity issue that prevented certain download links from being tracked.
* Includes a minified version of the outbound/download tracking javascript instead of the full code.
* Fixes a text size inconstancy on the settings page.

= 4.2.3 =
* Improves error reporting with API authentication.

= 4.2.2 =
* Fixes a bug in IE8 that would not allow the widget to display in the admin properly.

= 4.2.1 =
* Fixes an issue where stable versions of WordPress 2.8 were not using the new widget API.
* Changes SimplePie include to use WordPress' version if possible, since SimplePie is included in WordPress 2.8.
* Adds version number to the Google Analyticator comment.

= 4.2 =
* Adds support for the WordPress 2.8 widget API.
* Removes Google Analyticator comment in the header that if footer tracking is enabled.

= 4.1.1 =
* Adds support for tracking code in the footer with Adsense integration.
* Corrects the widget image location for users with WordPress installed in a sub-directory.
* Prevents Google API calls when widget information is not configured.
* Supports WordPress 2.8.

= 4.1 =
* Fixes a bug that was causing the Stats Widget to display "0" in every instance.
* Adds functionality to allow a custom timeframe to be configured for the visitors widget.
* Adds a function to enable use of the widget for users not using WordPress widgets.
* Adds an option to output the code needed to link Analytics and Adsense accounts.

= 4.0.1 =
* Disables stat widget if cURL does not exist.

= 4.0 =
* Adds Google Analytics API support.
* Adds a widget that will use your Google Analytics stats to display a visitor counter on your front-end.
* Adds functionality to make widget highly customizable in regards to color and text.

= 3.0.3 =
* Fixes a Javascript error on pages that have links without href tags.

= 3.0.2 =
* Improves display of external/download links in Google Analytics (strips http/https from url).
* Fixes a PHP warning message being displayed on pages with error reporting enabled.

= 3.01 =
* Adds an option to disable admin tracking by either removing the tracking code or setting a variable.
* Removes the external tracking code from back-end admin pages that was causing conflicts with other plugins.

= 3.0 =
* Google Analyticator is now supported by Spiral Web Consulting.
* Corrects bugs preventing both external and download link tracking from working.
* Adds settings to configure the external and download link tracking prefixes.
* Changes the way disabling admin tracking works. Now uses a line of code instead of removing the tracking code altogether. This will allow features like the site overlay to work.

= 2.40 =
* Replaces the PHP-based external tracking solution with a jQuery-based one.

= 2.3 =
* Updates the Analytics script to match a change by Google. This should resolve the undefined _gat errors.

= 2.24 =
* Fixes comment author issues once and for all.
* Fixes a SVN merge issue that prevented people from getting the last update.

= 2.23 =
* Reverting last version as it caused issues.

= 2.22 =
* Improves comment author regex causing some issues in WordPress 2.7. Thanks to jdub.

= 2.21 =
* Adds WordPress 2.7 support.

= 2.2 =
* Adds an option to specify the GA script location instead of relying on Google’s auto detect code. This may resolve the _gat is undefined errors.

= 2.14 =
* Stops the external link tracking code from appearing in feeds, breaking feed validation.
* Adds compatibility for a very rare few users who could not save options.

= 2.13 =
* Stops the external link tracking code from appearing in feeds, breaking feed validation.

= 2.12 =
* Applies the new administrator level selection to outbound tracking (I forgot to that in the last release).
* Fixes a potential plugin conflict.

= 2.11 =
* Adds an option to change what Google Analyticator considers a WordPress administrator.

= 2.1 =
* Fixes a bug preventing options from being saved under WordPress 2.5.
* Updates option page to comply with WordPress 2.5 user interface changes.
* Note: Users of WordPress 2.3 may wish to stay on 2.02 as the UI will look ‘weird’ under 2.3.

= 2.02 =
* Corrects potential XHTML validation issues with external link tracking.

= 2.01 =
* Corrects XHTML validation issues with ga.js.

= 2.0 =
* Adds support for the latest version of Google Analytics’ tracking code (ga.js).
* Reverts external link/download tracking method back to writing the tracking code in the HTML source, due to the previous Javascript library no longer being support. Users of previous Google Analyticator versions may safely delete ga_external-links.js.
* Slightly modified the way extra code is handled. There are now two sections (before tracker initialization and after tracker initialization) to handle ga.js’ extra functions. Refer to Google Analytics’ support documentation for use of these sections.

= 1.54 =
* Corrects problem where certain installation of WordPress do not have the user level value.

= 1.53 =
* Finally fixes the “Are you sure?” bug some users experience.

= 1.52 =
* Addresses compatibility issue with other JavaScript plugins.

= 1.5 =
* Now using JavaScript solution for keeping track of external links instead of the current URL rewrite method. JavaScript library is courtesy of Terenzani.it.
* Note: Google Analyticator is now in a folder. If upgrading from a version less than 1.5, delete google-analyticator.php from your /wp-content/plugins/ folder before proceeding.

= 1.42 =
* Fixes a bug where outbound link tracking would be disabled if the tracking code was in the footer.

= 1.41 =
* Added an option to insert the tracking code in the footer instead of the header.

= 1.4 =
* Adds support for download tracking.

= 1.31 =
* Fixes a small bug with backslashes in the additional tracking code box.

= 1.3 =
* WordPress 2.0 beta is now supported.
* Missing options page bug is finally fixed.

= 1.2 =
* Added support for outbound links.

= 1.12 =
* Fixing missing option button page bug.

= 1.11 =
* Fixed a bug where options page would sometimes not display.

= 1.1 =
* Added an option to disable administrator logging.
* Added an option to add any additional tracking code that Google has.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 6.1.1 =

Bug fix release. If you're having trouble accessing the settings page or use Internet Explorer, this is a recommended update.

= 6.1 =

Recommended update. Highlights include WordPress 3.0 support, updated async tracking code, dashboard stats by Analytics profile, more control over who gets tracked, and more control over who can see the dashboard widget. Settings have changed, so revisit the settings to verify.