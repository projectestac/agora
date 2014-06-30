=== Exray ===
Contributors: Septian Ahmad Fujianto
Tags: gray, white, light, one-column, two-columns, three-columns, responsive-layout, left-sidebar, right-sidebar, custom-menu, custom-colors, flexible-header, full-width-template, post-formats, sticky-post, theme-options, threaded-comments, editor-style, translation-ready
Requires at least: 3.6
Tested up to: 3.9.1
Stable tag: 1.4.3
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Description: A simple, clean and responsive theme build with HTML5 and Twitter Bootstrap. Designed to be starting point for your Website with unlimited possibility for customization, with Theme Customizer and Theme Options ready, you won't get any trouble modifying most part of the theme. By using flat design concept, your content will standout and catch your reader eyes.      

Exray WordPress theme, Copyright (C) 2013 Septian Ahmad Fujianto 
Exray WordPress theme is licensed under the GPL v3 or later.

== Description ==

A simple, clean and responsive theme build with HTML5 and Twitter Bootstrap. 
Designed to be starting point for your Website with unlimited possibility for customization, with Theme Customizer and Theme Options ready, you won't get any trouble modifying most part of the theme.
Some part of theme have auto color adjusment, it will adjust colors by calculating your input color and generate contrast color to make your content easier to read.You can always use Custom css on Theme Option if you willing to dirty your hands and don't like auto adjusted colors.
Using flat design concept, your content will standout catch your reader eyes.  

== Installation ==

Manual installation:

1. Upload the `exray` folder to the `/wp-content/themes/` directory

Installation using "Add New Theme"

1. From your Admin UI (Dashboard), use the menu to select Themes -> Add New
2. Search for 'exray'
3. Click the 'Install' button to open the theme's repository listing
4. Click the 'Install' button

Activiation and Use

1. Activate the Theme through the 'Themes' menu in WordPress
2. See Appearance -> Theme Options to change theme specific options
3. See Appearance -> Themes -> Under description of current theme choose Customize to customize theme visual design.

== License ==

All the theme files, scripts and images are licensed under GNU General Public License version 3.
The exceptions to this license are as follows:
* Bootstrap - http://getbootstrap.com/2.3.2/ copyrighted by Mark Otto and Jacob Thornton is licensed under Apache License v2.0.
* Glyphicons Free - http://glyphicons.com/ copyrighted by glyphicons licensed under CC BY 3.0
* The script fitvids.js - http://fitvidsjs.com/ copyrighted by Chris Coyier and Paravel is licensed under WTFPL.
* Web symbols font - http://www.justbenicestudio.com copyrighted by Just be nice studio is licensed under SIL Open Font License 1.1
* Oswald font - http://code.newtypography.co.uk/ copyrighted by Vernon Adams is licensed under SIL Open Font License 1.1


== Theme Notes ==

=== Theme Options ===

Modify backend functionality from theme options. On general options tab, you can hide top and main menu by selecting menu you want to hide. You can also hide go to top link by checking the options. If you want to change the site wide layout, you can choose four diffrent side wide layout options. If you are looking for more customization for theme look and feel, you can put your custom css on Custom css tab textarea.

=== Theme Customizer ===

Most of theme functionality and design can be customized from theme customizer. See appearance -> Themes -> Under description of current theme choose Customize, in order to access it. In theme customizer, you can upload your website logo, top ad banner and change your theme colors.  

=== Post Thumbnail Functionality ===

Post Thumbnails appear only in post lists, not on single posts.
You can easily set it by choosing "Set as Featured Image" when uploading an image or edit your post to add it.

=== Post Formats ===

Posts with the aside, status & quote post formats will displayed with no title;
the quote post format will only display the post's first <blockquote> tag.
Posts with the link post format will link out to the first <a> tag in the post.

=== Widgets Areas ===

You can easily add widget on 6 customizable widgetized area, consisting left and right sidebar, fist, second, third and fourth footer.  

== Frequently Asked Questions ==

= Layout broken, sidebar missing ? =

The old theme option might cause it. Go to Theme Options, on General Options tab, press Save Changes button.

= Why custom css not working? =

You probably made mistake on your custom css code. For example, when trying to change main menu color, usually you will use this css code, 
.main-menu-container a{ color: red; } , It's not working, because the coreect way to do it is, .main-menu-container .main-menu-navigation ul li a{ color: red; }. Please check theme css / html class structure to make sure your custom css working properly.

= How do I add thumbnails to posts? =

When editing a post, open the upload tool, select the image you wish to set as thumbnail
and select "Use as Featured Image". Note that thumbnails appear only in blog post lists.
To display then in single posts you need to insert them manually.

= How to easily generate post thumbnail for older post? =

You can use Easy Add Thumbnail (http://wordpress.org/extend/plugins/easy-add-thumbnail/) to do that.

= How do I contact you? =

You can shoot me email at septianahmad[at]naisinpo[dot]com.

== Screenshots ==

1. Standard Theme Screenshot

== Changelog ==

= 1.4.3 =
* Bug fix on logo upload / not showing correctly.
* Bug fix on Top Ad / Header Widget.
* Compatible with WordPress 3.9 video and audio playlist.
* New theme tags, Responsive Layout.

= 1.4.2 =
* New widgetized area, Header widget and Below header.
* New widget Banner image.
* Minor bug fix.

= 1.4.1 =
* Fix broken layout on Internet Explorer 8 and 9.

= 1.4 =
* Fix content option not working correctly.
* Fix bug on Custom CSS output for special characters.
* Add editor style CSS.
* Add HTML5 semantic markup theme support for comment and search form.
* Fix css bug for no breaking title.

= 1.3 =
* Fix broken layout on Internet Explorer 9.
* Add new option to show content in excerpt or fullpost.

= 1.2.3 =
* Fix license for Bootstrap.

= 1.2.2 =
* Fix theme license.
* Fix css bug.
* Add attachment.php

= 1.2.1 =
* Minor issues fix.

= 1.2 =
* Remove contact page, Ad widget to follow WordPresss theme guidelines.
* Add hide menu options.
* Add hide go to top options.
* Add new layout options.
* Fix some code error on Exray class.

= 1.1 =
* Add reCaptcha widget on contact form for spam prevention.
* Major code refactor.
* CSS bug fix.
* Add shortcode support for link button and embed youtube video.

= 1.0 =
* Initial Release.