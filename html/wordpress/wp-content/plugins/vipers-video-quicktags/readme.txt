=== Viper's Video Quicktags ===
Contributors: Viper007Bond
Tags: video, quicktags, wysiwyg, tinymce, youtube, google video, dailymotion, vimeo, veoh, viddler, metacafe, blip.tv, flickr, ifilm, myspace, flv, quicktime
Requires at least: 2.8
Tested up to: 3.9
Stable tag: trunk

Allows easy and XHTML valid posting of videos from various websites such as YouTube, DailyMotion, Vimeo, and more.

== Description ==

Tired of copying and pasting the embed HTML from sites like YouTube? Then this plugin is for you.

Just simply click one of the [new buttons](http://wordpress.org/extend/plugins/vipers-video-quicktags/screenshots/) that this plugin adds to the write screen (rich editor included) and then paste the URL that the video is located at into the prompt box -- easy as that. You can fully configure how the videos are displayed (width, height, colors, alignment on the page) and much more. Your site will even stay (X)HTML valid unlike with the code provided by most video sites.

Currently supports these video sites:

* [YouTube](http://www.youtube.com/) (including playlists)
* [Google Video](http://video.google.com/)
* [DailyMotion](http://www.dailymotion.com/)
* [Vimeo](http://www.vimeo.com/)
* [Veoh](http://www.veoh.com/)
* [Viddler](http://www.viddler.com/)
* [Metacafe](http://www.metacafe.com/)
* [Blip.tv](http://blip.tv/)
* [VideoPress aka WordPress.com Video](http://videopress.com/) **NEW!**
* [Flickr](http://www.flickr.com/) videos
* [Spike.com/IFILM](http://www.spike.com/)
* [MySpaceTV](http://vids.myspace.com/)

As well as these file types:

* Flash Video Files (FLV)
* QuickTime (MOV, etc.)
* Generic video files (AVI, MPEG, WMV, etc.)

You can also use the `[flash]` shortcode to Flash-based video from **any** website (see Help section after installing for details).

If your favorite video site is not supported, please see [the FAQ](http://wordpress.org/extend/plugins/vipers-video-quicktags/faq/) for details on how to get me to include it.

== Installation ==

###Updgrading From A Previous Version###

To upgrade from a previous version of this plugin, delete the entire folder and files from the previous version of the plugin and then follow the installation instructions below.

###Installing The Plugin###

Extract all files from the ZIP file, **making sure to keep the file structure intact**, and then upload it to `/wp-content/plugins/`. This should result in multiple subfolders and files.

Then just visit your admin area and activate the plugin.

**See Also:** ["Installing Plugins" article on the WP Codex](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

###Installing For [WordPress MU](http://mu.wordpress.org/)###

Install as stated above to `plugins`, but place `vipers-video-quicktags.php` in the `mu-plugins` folder. Just that file, nothing else.

###Plugin Configuration###

To configure this plugin, visit it's settings page. It can be found under the "Settings" tab in your admin area, titled "Video Quicktags".

== Frequently Asked Questions ==

= The videos won't show up. Only a YouTube image or a link to the video does. =

Your theme lacks the `<?php wp_head(); ?>` hook. Please add it right before `</head>` in your theme's `header.php` file.

= I have the plugin running, but I have some questions about how to use it. =

A help section is now included with this plugin. Please visit your admin area -> Settings -> Video Quicktags -> Help.

= Why doesn't this plugin support such-and-such site? =

There are few possible reasons for this:

* I may have never heard of the site and simply linking it to me on [my WordPress plugin forums](http://www.viper007bond.com/wordpress-plugins/forums/viewforum.php?id=23) may make me include it in a future release.
* The URL at which the video can be viewed has nothing in common with the embed URL. This means my plugin can't do anything with the URL you give it. Support for fetching the emded URL from the website may be added in a future version though, we'll see.
* I have deemed the site not popular enough to warrant being added to my plugin. I don't wish to bloat my plugin with tiny little sites that only one or two people will use.

= Does this plugin support other languages? =

Yes, it does. Included in the `localization` folder is the translation template you can use to translate the plugin. See the [WordPress Codex](http://codex.wordpress.org/Translating_WordPress) for details. When you're done translating it, please [send me](http://www.viper007bond.com/contact/) the translation file so I can include it with the plugin.

= Where can I get additional support for this plugin? =

This is a free plugin and as such, you aren't guaranteed support. However I do my best to answer support questions. Just post on the [WordPress.org support forums](http://wordpress.org/tags/vipers-video-quicktags).

== Screenshots ==

1. TinyMCE, the plugin's buttons, and the plugin's dialog window.
2. YouTube configuration page.
2. DailyMotion configuration page with Farbtastic color picker showing.

== Changelog ==

= v6.5.2 =

* **Editor:** Don't try to load the jQuery Dialog images that were removed in v6.5.0 in favor of WordPress core's styling.

= v6.5.1 =

* **Editor:** Actually hide buttons in TinyMCE that have been disabled rather than showing all of them.
* **General:** Code improvements around having the plugin in a different location.

= v6.5.0 =

* **General:** WordPress 3.9 compatibility.
* **Editor:** Switch to native dialog box styling and drop the variable height functionality. It was too complicated to be worth it.
* **General:** Remove the donate button. I meant to remove this years ago but kept forgetting. I'm lucky enough to work for Automattic and no longer need to the rare donation that this button brings.

= v6.4.5 =

* **Security:** Better sanitization and validation of shortcode attributes to prevent low-access users from doing naughty things. Props Jacek. PS: This plugin badly needs a rewrite from scratch.
* **General:** Only output SWFObject JavaScript if it's actually needed.

= v6.4.4 =

* **General:** Updates to support new version of jQuery UI that is included in WordPress 3.5. Fixes dialog box not opening.

= v6.4.3 =

* **Quicktime:** Control the background color via a new parameter (`bgcolor`) per request.
* **Quicktime:** Rewrite of the Quicktime parameter functionality. Also a new filter for other plugins to be able to control these parameters.

= July 23rd, 2012 (no version bump) ==

* **Localization:** Updated Italian translation thanks to Gianni Diurno.

= v6.4.2 =

* **General:** Support SSL (`https://`) video URLs. Props [Tyrel Kelsey](http://ninnypants.com/) for the bug report.

= v6.4.1 =

* **FLV:** Don't disable the checkbox so that it can be unchecked to hide the message.
* **FLV:** Only show the admin notice to administrators. It's unlikely anyone else can do anything about it.

= v6.4.0 =

The "I should have done this a long time ago but have been neglecting this plugin" release.

* **FLV:** Don't bundle JW FLV Player with this plugin. It isn't GPL compatible. You'll now need to install it on your own. See [this blog post](http://v007.me/9a4) for details.
* **YouTube:** youtu.be short URL support.
* **General:** Move SWFObject calls to the footer so `<!--nextpage-->` doesn't break this plugin.
* **Localization:** Added Romanian translation thanks to Web Hosting Geeks.

= v6.3.4 =

* **DailyMotion:** Fix incorrect fallback URL. A slash was missing. Props [Sutherland Boswell](http://sutherlandboswell.com/) for [findind the bug]((http://wordpress.org/support/topic/plugin-video-thumbnails-thumnail-not-found-for-dailymotion-videos).

= v6.3.3 =

* **General:** A couple CSS tweaks and Javascript improvements thanks to Andrew Ozz (azaozz).

= v6.3.2 =

* **YouTube:** Fix for YouTube playlists. See [forum thread](http://wordpress.org/support/topic/plugin-vipers-video-quicktags-youtube-playlists-do-not-work) for details.
* **General:** Fix buttons in HTML editor for WordPress 3.3.

= October 13th, 2011 (no version bump) ==

* **Localization:** Added Norwegian translation thanks to [Kristoffer Risanger](http://kristofferr.com/).

= v6.3.1 =

* **General:** Remove usage of deprecated functions. Thanks ninnypants for reminding me.

= v6.3.0 =

* **Vimeo:** Implement their new `iframe`-based embed since they seem to have broken my previous embed method.

= v6.2.19 =

* **General:** Remove potentially buggy SWFObject registration.

= v6.2.18 =

* **VideoPress:** If the [official VideoPress plugin](http://wordpress.org/extend/plugins/video/) is installed, don't take over it's shortcode.

= v6.2.17 =

* **TinyMCE:** Re-enable the third button row as not everyone was having issues with it. Default to the first row though.

= v6.2.16 =

* Default to less buttons being enabled by default due to not being able to put them on their own line anymore.

= v6.2.15 =

* **TinyMCE:** Trying to inject the buttons onto the third button line completely breaks TinyMCE. Only allow them to be added to the first or second line, and even then they may not show up even then. I have no idea why (I hate TinyMCE) and I frankly don't care at this point (they're going away in v7.0).

= v6.2.14 =

* **FLV:** Fix automatic images and make them work better.

= v6.2.13 =

* **FLV:** Make MP3's stream properly by not setting the image value to the MP3. Props [tranified](http://wordpress.org/support/topic/327598).

= v6.2.12 =

* **VideoPress:** Width/height parameter improvements.

= v6.2.11 =

* **FLV:** Allow periods in Flashvar names. See [http://wordpress.org/support/topic/316159](http://wordpress.org/support/topic/316159).

= v6.2.10 =

* **General:** Change default feed link text. Always wrap in paragraph tags regardless. Props [andrewpaulbiss](http://wordpress.org/support/topic/314764).
* **General:** Fiddle with how settings are created.

= v6.2.9 =

* **General:** SWFObject issue was likely WordPress version related. I'm tired of dealing with older versions of WordPress anyway, not to mention they're insecure. Make VVQ only support WordPress 2.8+. It's for their own good.

= v6.2.8 =

* **General:** Revert SWFObject enqueue hack as it's failing for some users.

= v6.2.7 =

* **General:** Update SWFObject to version 2.2.
* **General:** Update JW Player to version 4.5.
* **Localization:** Added Chinese translation thanks to [Dreamcolor](http://dreamcolor.net/).
* **Localization:** Added Spanish translation thanks to [Omi](http://equipajedemano.info/).

= v6.2.6 =

* **General:** Fixed an issue with pingback sending failing. The remote XML-RPC would check the referring site (your site) for the ping-to URL and due to an apostrophe in an HTML comment, it'd fail. Very, very weird. Thanks to Robert Windisch of [Inpsyde](http://inpsyde.com/)!

= v6.2.5 =

* **Localization:** Added Hungarian translation thanks to [jamesb](http://filmhirek.com/).

= v6.2.4 =

* **VideoPress:** Rebrand everything in the plugin to VideoPress rather than like WordPress.com video.

= v6.2.3 =

* **Localization:** Added Belorussian translation thanks to Fat Cow.

= v6.2.2 =

* **Localization:** Added Brazilian Portuguese translation thanks to Ricardo Martins.
* **General:** Change `wmode` from `opaque` to `transparent` to allow transparency in FLV skins as well as other embeds.
* **General:** Enable `allowscriptaccess` so Javascript can interact with the embeds.
* **FLV:** Fix an upgrade bug with custom colors.

= v6.2.1 =

* **General:** Fix broken image URLs. Props marian.

= v6.2.0 =

* **WordPress.com Video:** Added support for [WordPress.com Video shortcodes](http://support.wordpress.com/videos/).
* **FLV:** Reorder Flashvar building to properly allow overriding.
* **FLV:** New skins.
* **General:** Pass the non-defaulted attributes (i.e. those directly passed to the shortcode function) to the `vvq_shortcodeatts` filter.

= v6.1.25 =

* **General:** Fix bug introduced in v6.1.24 that made it impossible to post multiple videos in one post.

= v6.1.24 =

* **General:** Improvements to avoid object ID collisions.
* **Dailymotion:** Update preview video as old one was removed.

= v6.1.23 =

* **YouTube:** Add the ability to enable "HD" by default. This does not affect the "HQ" button as I don't know of a way to enable that by default. Also remember that not all videos support HD (few do actually, most only support nothing or HQ).
* **YouTube:** Changed the default preview video to one that supports HD.
* **General:** Remove many bundled jQuery UI libraries, Farbtastic, and other items that are now bundled with WordPress.
* **General:** Code improvements and bugfixes.

= v6.1.22 =

* **General:** Wrap the default feed placeholder text in paragraph tags (the vast majority of people place videos on their own line).

= v6.1.21 =

* **General:** Use a predictable ID for the placeholders and videos rather than a randomly generated one.
* **General:** PHP notice fixes.

= v6.1.20 =

* **Localization:** Added Danish transation thanks to Georg.
* **Localization:** Updated Italian translation thanks to Gianni Diurno.

= v6.1.19 =

* **Quicktime:** Added "scale=aspect" setting as apparently it's best to have.

= v6.1.18 =

* **YouTube:** Added support for the URL format used in the YouTube RSS feed: http://youtube.com/?v=XXXXXXXXXX

= v6.1.17 =

* **YouTube:** Removed all quality related features/options. YouTube now natively supports a high quality toggle in it's embed allowing the user to toggle (if the video supports it). Haven't found a way to make high quality the default yet though.

= v6.1.16 =

* **YouTube:** Add option to disable the video title and ratings display.
* **Veoh:** Add support for the new URL format.
* **General:** Additional styling updates for WordPress 2.7.

= v6.1.15 =

* **FLV:** Support (and detect) RTMP streams. Props axelseaa.
* **General:** Tweak the redirect that occurs after saving the settings.

= v6.1.14 =

* **Google Video:** Show the fullscreen button by default, add option to disable it.

= v6.1.13 =

* **YouTube:** Remove the new search box by default. Option to enable it is on the settings page.

= v6.1.12 =

* **General:** Fix a PHP parse error that slipped into 6.1.11. Whoops!

= v6.1.11 =

* **General:** Don't hijack the `kml_flashembed` shortcode if it's already being processed by other plugin.

= v6.1.10 =

* **General:** Icon for WordPress 2.7.
* **General:** Translation and notice bugfixes from Laurent Duretz.
* **Localization:** French translation thanks to Laurent Duretz.
* **Localization:** Dutch translation thanks to Sypie.

= v6.1.9 =

* **YouTube:** Add support for YouTube's new experimental HD-ish video.
* **General:** Don't right-position the PayPal button as it covers up the "Help" tab in WordPress 2.7.

= v6.1.8 =

* **Metacafe:** Update regex to match new URL format. Props penalty.

= v6.1.7 =

* **General:** CSS tweak for WordPress 2.7. Probably will need more updating, but I'll wait for 2.7 to be done first.
* **YouTube:** Remove MP4 option from settings page (you can't seek properly with it it seems), plus it's meant for the iPhone.

= v6.1.6 =

* **YouTube:** Default to low quality videos (what YouTube's standard embed code does). The high quality video "hack" can result in "This video is not available" on certain videos.

= v6.1.5 =

* **Veoh:** Support for a default image in the `[flv]` shortcode when using a `.mp4` video file.

= v6.1.4 =

* **Veoh:** Fix broken embeds.

= v6.1.3 =

* **General:** Actually remove the `wp_head()` check (I failed to do it properly in 6.1.2).
* **General:** Don't show the binary FTP warning for WordPress 2.7 (the bug should be fixed).

= v6.1.2 =

* **General:** Remove `wp_head()` warning for admins. Doesn't work in themes like K2. Plugin's FAQ should cover this.
* **General:** Add a filter to the shortcode attributes. This means plugins/themes can adjust things like the width automatically.
* **Localization:** Russian translation thanks to [Dennis Bri](http://handynotes.ru/)
* **General:** Properly hide some images in the admin that are there for pre-loading.

= v6.1.1 =

* **Vimeo:** Fixed embeds. Vimeo apparently doesn't like having `&amp;`s in it's embed URLs, so I've switched to using Flashvars.
* **Viddler:** Decode TinyMCE's `&` to `&amp;` conversions which were breaking the embeds.
* **Flash:** Decode TinyMCE's `&` to `&amp;` conversions which were breaking the embeds.

= v6.1.0 =

* **YouTube:** Can now choose between high quality FLV and high quality MP4 formats.
* **FLV:** Bundled skins.
* **FLV:** Improvements on how custom colors are set.
* **TinyMCE:** Can now choose what line number to display the buttons on.
* **TinyMCE:** Automatic browser cache breaking when the plugin is (de)activated or the line number is changed.
* **General:** SWFObject calls moved to bottom of posts rather than theme footer.
* **General:** Admin notice warning about automatic plugin upgrade breaking SWF files, etc. (ASCII vs. binary).
* **General:** Ability to set custom feed text via settings page.
* **General:** Image pre-cache URL fix.
* **General:** Settings page improvements for users without Javascript.
* **General:** More Localization and translators added to credits page.
* **General:** Redid admin warning message for users without the head hook.
* **Flash:** Aliased "kml_flashembed" shortcode and "movie" parameter now used if it's there. This is to support Anarchy Media Player.
* Other various bug fixes.

= v6.0.3 =

* Undo formatting applied by `wptexturize()` to the URLs of videos. Props to [nukerojo](http://freddiemercury.com.ar/) for reporting.

= v6.0.2 =

* Fix Write -> Page (forgot to hook in)
* Remove FLV notice from WPMU.
* Add help item about the red in YouTube (hovering over icons).

= v6.0.1 =

* Fixed a PHP error.

= v6.0.0 =

Complete recode literally from scratch (all new code):

* Support for new video sites.
* Settings page greatly expanded.
* Video configuration abilities greatly expanded (colors, etc.)
* YouTube playlists
* And so very, very much more.

= v5.4.4 =

* Add the Quicktime and generic video buttons back to TinyMCE for users who prefer them over the native TinyMCE embedder.

= v5.4.3 =

* More code changes to try and fix hard-to-reproduce bugs under WordPress 2.5. Thanks to everyone that helped me debug including [Maciek](http://ibex.pl).

= v5.4.2 =

* Some code to hopefully fix some seemingly random bugs under WordPress 2.5.
* Other minor code improvements.

= v5.4.1 =

* Video alignment wasn't working due to the switch to SWFObject. This has been fixed. Props to [zerocrash](http://www.zerocrash.dk/) for the bug report.

= v5.4.0 =

This is a hotfix version to address WordPress 2.5 plus some bugfixes and such. A minor recode of this plugin is planned to improve it, mainly the video file support.

* Updated to support WordPress 2.5 and it's TinyMCE 3 (required a whole new TinyMCE plugin to be written).
* Switched from UFO to SWFObject for the embedding of Flash video (YouTube, etc.) since UFO is deprecated.
* Update of FLV player SWF file.
* Removed Stage6 due to site shutdown. BBCode usage now displays an error message.

= v5.3.1 =

* Replace BBCode with the video in the excerpt.

= v5.3.0 =

* Manjor and multiple Stage6 improvements. Props Randy A. for pointing out that it wasn't working in some cases.
* The regex can now be filtered via `vvq_searchpatterns`. This means plugins can add in new BBCodes without having to edit the plugin. See plugin source for format.
* Other minor improvements.

= v5.2.3 =

* When a custom width is entered into the prompt, use math to suggest a matching height value.

= v5.2.2 =

* Support for the `http://www.youtube.com/w/?v=JzqumbhfxRo` URL format for YouTube due to popular request.

= v5.2.1 =

* Support for new Vimeo URL format (no `/clip:XXX`). Thanks to texasellis.

= v5.2.0 =

* [Stage6](http://stage6.divx.com/) support.
* Regex fix for Metacafe.

= v5.1.6 =

* The default height for YouTube videos has changed, so plugin updated to match.

= v5.1.5 =

* Plugin now parses the code inside text widges, i.e. you can embed videos in your sidebar!

= v5.1.4 =

* Missed a regex expression for the international YouTube handling, whoops!

= v5.1.3 =

* YouTube.com regional support (uk.youtube.com, etc.)
* WPMU support hopefully
* Support for v2.x (old!) style placeholders
* Updated FLV player file to latest version
* Another attempt at stopping autoplaying self-hosted videos
* Other minor fixes

= v5.1.2 =

* Spelling mistake ("video" instead of "vimeo") made the Vimeo button in the rich editor never be hidden. Thanks to [giuseppe](http://www.soveratonews.com/) for [pointing it out](http://www.viper007bond.com/wordpress-plugins/forums/viewtopic.php?id=527).

= v5.1.1 =

* Buttons weren't working in the rich editor due to a stupid mistake on my part (I forgot to replace some debug code with the correct code). Fixed with thanks to [nhdriver4](http://onovia.com/) for [pointing it out](http://www.viper007bond.com/wordpress-plugins/forums/viewtopic.php?id=526).

= v5.1.0 =

* Renamed the plugin file and Javascript file to match the plugin's folder name.
* Forgot to code in FLV file BBCode->HTML (whoops!). Thanks to [Jack](http://jackcorto.dyndns.org/) for pointing this out.
* Due to using the wrong variable on my part, you were unable to change the default width and height of videos. Now fixed and the boxes on the options page actually work.
* Quicktime and generic video files are now inserted via Javascript in order to get around the annoying IE click-to-activate thing.
* Default width/heights for non-Flash files can now be set. Plugin will now not prompt you for width/height by default for those. Admin area Javascript completely recoded as a result.
* You can now opt to have the plugin always prompt you for a width and height. Option configuration via the options page.
* Added support for [Vimeo](http://www.vimeo.com/)
* Fixed the layering issue with Flash for things like Lightbox. Thanks to [timjohns](http://timdotnet.net/wiggumdaily/) for pointing out that I forgot to handle this. I can't figure out a way to fix it for non-Flash videos though. :(
* Fixed buttons in TinyMCE in Internet Explorer. Issue was caused by tiny Javascript issue. Man I **HATE** that browser!
* Due to WP 2.0.x being old and crappy, it'd add `<br />`'s inside `<script>` tags. Worked around it by adding the Javascript after `wpautop()` runs.
* Fixed title text for buttons in TinyMCE.
* Updated Flash Video Player (FLV player) to v3.7.
* Other various bug fixes that I can't remember.

= v5.0.0 =

* Complete recode once again featuring UFO for Flash objects and lots of other stuff. Basically v4.0.0 without all the bugs.

= v4.0.0 =

* Once again, completely recoded from the ground up. Too many changes to even begin to list.

= v3.0.0 =

* Completely recoded again. This time added a bunch more buttons and switched to regex replacement rather than the stupid method I was using before (woo hoo!).

= v2.0.0 =

* Plugin completely recoded in order to make buttons for the WYSIWYG editor.

= v1.0.1 =

* Transparency mode parameter set on the Flash. This makes it so that other items (such as menus or positioned items) appear in front of the videos rather than behind them.

= v1.0.0 =

* Inital release.

== Upgrade Notice ==

= 6.4.5 =
**Security:** Better sanitization and validation of shortcode attributes to prevent low-access users from doing naughty things. Props Jacek.