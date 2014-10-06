=== Google Calendar Events ===
Contributors: pderksen, nickyoung87, rosshanney
Tags: google calendar, google, calendar, events, gcal
Requires at least: 3.7.4
Tested up to: 4.0
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Parses Google Calendar feeds and displays the events as a calendar grid or list on a page, post or widget.

== Description ==

Parses Google Calendar feeds and displays the events as a calendar grid or list on a page, post or widget.

= Features =

* Parses Google Calendar feeds to extract events
* Displays events as a list or within a calendar grid
* Events from multiple Google Calendar feeds can be shown in a single list / grid
* Lists and grids can be displayed in posts, pages or within a widget
* Options to change the number of events retrieved, date / time format, cache duration etc
* Complete customisation of the event information displayed
* Calendar grids can have the ability to change the month displayed

[Plugin Documentation & Getting Started](http://wpdocs.philderksen.com/google-calendar-events/?utm_source=wordpress_org&utm_medium=link&utm_campaign=gce_lite)

###Feature Requests and Updates###

* [Public roadmap/feature requests](https://trello.com/b/ZQSzsarY)
* [Get notified when new features are released](http://eepurl.com/0_VsT)
* [Follow this project on Github](https://github.com/pderksen/WP-Google-Calendar-Events)

This plugin was originally created by [Ross Hanney](http://www.rhanney.co.uk), a web developer based in the UK specialising in WordPress and PHP.

Spanish translation provided by Eduardo Larequi of [educacion.navarra.es/web/pnte/](http://www.educacion.navarra.es/web/pnte/).

== Installation ==

There are three ways to install this plugin.

= 1. Admin Search =
1. In your Admin, go to menu Plugins > Add.
1. Search for `Google Calendar`.
1. Find the plugin that's labeled `Google Calendar Events`.
1. Look for the author name `Phil Derksen` on the plugin.
1. Click to install.
1. Activate the plugin.
1. A new menu item `GCal Events` will appear in the main menu.

= 2. Download & Upload =
1. Download the plugin (a zip file) on the right column of this page.
1. In your Admin, go to menu Plugins > Add.
1. Select the tab "Upload".
1. Upload the .zip file you just downloaded.
1. Activate the plugin.
1. A new menu item `GCal Events` will appear in the main menu.

= 3. FTP Upload =
1. Download the plugin (.zip file) on the right column of this page.
1. Unzip the zip file contents.
1. Upload the `google-calendar-events` folder to the `/wp-content/plugins/` directory of your site.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. A new menu item `GCal Events` will appear in the main menu.

== Frequently Asked Questions ==

[Plugin Documentation & Getting Started](http://wpdocs.philderksen.com/google-calendar-events/?utm_source=wordpress_org&utm_medium=link&utm_campaign=gce_lite)

== Screenshots ==

1. Grid display in full page with tooltip
1. Grid display in widget
1. List display in widget
1. Simple display options
1. Calendar feed settings
1. Calendar widget settings
1. Event display builder editor

== Changelog ==

= 2.0.3.1 =

* Fixed bug where retrieve from/until dates were accidentally removed.

= 2.0.3 =

* Fixed bug where calendar feed caches weren't getting cleared properly.
* Fixed feed settings metabox content wrapping issue.

= 2.0.2 =

* Added Spanish translation (thanks to Eduardo Larequi of [educacion.navarra.es/web/pnte/](http://www.educacion.navarra.es/web/pnte/)).
* Fixed timezone issues by forcing calendar feeds to use the timezone selected in the site's General Settings. Feed-specific timezone setting removed.
* Fixed a bug with recurring events display.
* Fixed an upgrade bug with multiple day events.

= 2.0.1 =

* Fixed display errors with certain event builder shortcodes.
* Added language folder.

= 2.0.0 =

* Plugin rewritten from scratch.
* Now using custom post types for storing and customizing Google calendar feeds.
* Introduced the shortcode `[gcal]` (old shortcode still supported).

= 0.7.3.1 =

* Include missing file: upgrade-notice.php.

= 0.7.3 =

* Added warning about upcoming version 2.0 release.
* Added option to save settings upon uninstall.
* Tested with WordPress 4.0.

= 0.7.2 =

* Fixed a bug causing the "More details" Google Calendar information to be displayed in the wrong timezone
* Fixed a bug that prevented setting the cache duration to 0 from working correctly
* Fixed an issue that prevented Ajax from working with FORCE_SSL_ADMIN enabled
* Now uses [wp_enqueue_scripts](http://wpdevel.wordpress.com/2011/12/12/use-wp_enqueue_scripts-not-wp_print_styles-to-enqueue-scripts-and-styles-for-the-frontend/)

= 0.7.1 =

* Fixed bug causing AJAX enabled calendar grids to not function correctly
* Fixed bug causing all-day events from outside required date range to be displayed
* Fixed bug causing tooltip date title heading setting to be ignored
* Added further data sanitisation on output
* Feeds with no events will now be cached to prevent HTTP requests on every page load

= 0.7 =

* Fixed bug causing event dates / times to be displayed in the wrong timezone
* Changed the [link-path] Event Display Builder shortcode to [url]
* Fixed an Opera specific CSS issue causing page lists to be hidden
* Lists can now be displayed in descending or ascending order
* Added [event-id] and [cal-id] Event Display Builder shortcodes
* Added an offset parameter for date / time based Event Display Builder shortcodes
* Added an autolink parameter for enabling / disabling automatic linking of URLs
* Added gce-day-past or gce-day-future classes to calendar grid cells
* Cleaned up CSS

= 0.6 =

* Drastically reduced memory usage
* Improved feed data caching system
* Improved error reporting
* General performance and efficiency improvements
* Added a few more shortcodes to the event display builder
* Other [miscellaneous changes / additions and bug fixes](http://www.rhanney.co.uk/2011/04/29/google-calendar-events-0-6)

= 0.5 =

* Added [event display builder](http://www.rhanney.co.uk/plugins/google-calendar-events/event-display-builder) feature, which vastly improves the customization possibilities of the plugin. This feature encompasses many of the most requested features, such as:
    - All-day events can be handled differently than 'normal' events
    - Start and end times / dates can be displayed on the same line (as can any other event information)
    - HTML (and Markdown) entered in Google Calendar fields can be properly parsed
* Start and end times for retrieval of events are now much more flexible
* A custom error message for non-admin users can now be specified
* No longer loads SimplePie when it is not required

= 0.4.1 =

* Fix / workaround for the long-running timezone bug. Please take a look at [this](http://www.rhanney.co.uk/2011/01/16/google-calendar-events-0-4-1) for more information.
* Added additional 'Maximum no. events to display' option to widget / shortcode (mainly to address a further issue caused by the above fix)
* i18n related bug fix
* Added support for widget_title filter (courtesy of [James](http://lunasea-studios.com))
* Added Hungarian (hu_HU) translation ([danieltakacs](http://ek.klog.hu))
* Now using minified version of jQuery qTip script

= 0.4 =

* More control over how start and end dates / times are displayed
* Events can now be limited to a specified timeframe (number of days)
* Events on the same day in lists can now be shown under a single date title
* JavaScript can now be added to the footer rather than the header, via an option
* The 'Loading...' text can now be customized
* Description text can now be limited to a specified number of words
* Multi-day events can be shown on each day that they span ([sort of](http://www.rhanney.co.uk/2010/08/19/google-calendar-events-0-4#multiday))
* Bug fixes
* i18n / l10n fixes

= 0.3.1 =

* l10n / i18n fixes. Dates should now be localized correctly and should maintain localization after an AJAX request
* MU / Multi-site issues. Issues preventing adding of feeds have been addressed

= 0.3 =

* Now allows events from multiple Google Calendar feeds to be displayed on a single calendar grid / list
* Internationalization support added

= 0.2.1 =

* Added option to allow 'More details' links to open in new window / tab.
* Added option to choose a specific timezone for each feed
* Line breaks in an event description will now be preserved
* Fixed a bug casing the title to not be displayed on lists
* Other minor bug fixes

= 0.2 =

* Added customization options for how information is displayed.
* Can now display: start time, end time and date, location, description and event link.
* Tooltips now using qTip jQuery plugin.

= 0.1.4 =

* More bug fixes.

= 0.1.3 =

* Several bug fixes, including fixing JavaScript problems that prevented tooltips appearing.

= 0.1.2 =

* Bug fixes.

= 0.1.1 =

* Fix to prevent conflicts with other plugins.
* Changes to readme.txt.

= 0.1 =

* Initial release.

== Upgrade Notice ==

= 2.0.0 = 

This is a major upgrade to a new code base and structure. PLEASE make sure you backup your site before upgrading.
