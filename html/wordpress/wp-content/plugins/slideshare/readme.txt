=== SlideShare for WordPress by Yoast ===
Contributors: joostdevalk
Donate link: http://yoast.com/donate/
Tags: slideshare, powerpoint, keynote, ppt, presentation, slide shows, presentations
Requires at least: 2.9
Tested up to: 3.2.1
stable tag: 1.8.1

Easily embed SlideShare presentations into your WordPress posts by using the SlideShare WordPress.com embed code.

== Description ==

Easily embed SlideShare presentations or documents into your WordPress posts by copying the WordPress.com embed code, and change the default width with one simple setting. Once installed, simply go to any SlideShare presentation, click on Embed -> Customize and copy / paste the WordPress.com embed code. You can also just paste the URL of a presentation on it's own line in a post.

More info:

* [SlideShare WordPress plugin](http://yoast.com/wordpress/slideshare/).
* Check out the other [Wordpress plugins](http://yoast.com/wordpress/) by the same author.

== Changelog ==

= 1.8.1 =

* Fixed bug in dashboard widget.
* Improved plugin backend.
* Improved i18n support.
* Added donation box (hint ;) ).

= 1.8 =

* Support oEmbed for SlideShare.
* Use new iframe embed method over object tag.
* Better calculation of height related to width.
* [Separation of frontend and backend code](http://yoast.com/wp-best-practice/separate-frontend-admin-code/) for better performance.

= 1.7.2 =

* Fixed localization.

= 1.7.1 =

* Added .pot file and made entire plugin ready for localization.

= 1.7 =

* Added proper settings for default presentation width, and automatic inheritance of presentation width from theme, if the theme sets it properly.
* Switched to register_setting API.

= 1.6.4 =

* Apparently I'm a moron and I forgot to add a form tag to the plugin settings page, making it impossible to update the settings.

= 1.6.3 =

* Upgraded backend class.

= 1.6.2 =

* Added missing CSS for Backend Class.

= 1.6.1 =

* Removed redundant admin_menu action per [this suggestion](http://wordpress.org/support/topic/291922).
* Upgraded backend class to 0.1.1.

= 1.6 =

* Switched to new Yoast Plugin Backend, no functionality changes, just a nicer admin page.

= 1.5.1 =

* Fixed some bugs.

= 1.5 =

* Updated for the new embed code possibilities, as described [here](http://blog.slideshare.net/2009/04/16/now-embed-your-slideshare-docs-on-wordpresscom/).

= 1.4 =

* Added settings link on plugins page and Ozh admin menu icon.

= 1.3 =

* Fixes for WordPress 2.6.
 
= 1.1 =

* Fixed plugin to use the Shortcode API, thereby decreasing code size.
* Fixed minimum version requirement.

= 1.0.1 =

* Updated interface to 2.5 standards.

= 1.0 =

* Initial commit.

== Frequently Asked Questions ==

= How do I embed a presentation? =

Follow the steps outlined on the first screenshot on the [Screenshots page](http://wordpress.org/extend/plugins/slideshare/screenshots/), or go to the [SlideShare for WordPress page](http://yoast.com/wordpress/slideshare/).

== Screenshots ==

1. Example of how to embed a SlideShare presentation.
1. Configuration page.

== Installation ==

Installation is easy:

Through backend:

* Search for 'slideshare'.
* Install and activate the plugin.
* Start embedding SlideShare presentations!

Through FTP:

* Download the plugin.
* Unzip the plugin file.
* Upload the `slideshare` folder to the plugins directory of your blog.
* Enable the plugin in your admin panel.
* Start embedding SlideShare presentations!

If you want to change the default width:

* Go to the options panel under Options.
* Choose the width you want the presentations to have.
* Press "Update Settings".
* You're done.

== Upgrade Notice ==

= 1.8.1 = 
Fixes error on Dashboard as well as some internationalization issues.