=== Plugin Name ===
Contributors: wordpressdotorg, Otto42, Workshopshed, SergeyBiryukov, rmccue
Donate link: 
Tags: importer, blogger
Requires at least: 3.0
Tested up to: 3.81
Stable tag: 0.7
License: GPLv2 or later

Imports posts, images, comments, and categories (blogger tags) from a Blogger blog then migrates authors to WordPress users.

== Description ==

The Blogger Importer imports your blog data from a Google Blogger site into a WordPress.org installation.

= Items imported =

* Categories
* Posts (published, scheduled and draft)
* Comments (not spam)
* Images

= Items not imported =

* Pages
* Widgets/Widget Data
* Templates/Theme
* Comment and author Avatars

== Installation ==

1. Upload the `blogger-importer` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

= Prerequisites =

The importer connects your server to the blogger server to copy across the posts. For this to work you need to have connectivity from the server to the internet and also have at least one of the remote access protocols enabled, e.g. curl, streams or fsockopen. You can use the Core Control plugin to test if these are working correctly. The importer connects to Google over a secure connection so OpenSSL needs to be enabled on your server. 
The importer uses the SimplePie classes to read and process the data from blogger so you will need the php-xml module installed on your webserver.

= How to use =

1. Blogger Importer is available from the WordPress Tools->Import screen.
1. Press Authorise
1. If you are not already logged into Google you will be asked to login
1. You will be asked to grant WordPress access to your Blogger information, to continue press Grant Access
1. You will be presented with a list of all your blogs
1. Select the appropriate blog and press the import button
1. Wait whilst the posts, comments and images are imported
1. Press the Set Authors button
1. Select the appropriate mapping for the authors
1. Review categories, posts and comments

You can now remove the importer plugin if you no longer need to use it.

== Frequently Asked Questions ==

= How do I re-import? =

Press the clear account information button, then re-connect to blogger and re-import, the importer is designed not to re-import the same posts. If you need to do a full re-import then delete the posts and then empty the trash before re-importing.

= Once I've imported the posts do I need to keep the plugin? =

No, you can remove the plugin once you've completed your migration.

= How do I know which posts were imported? = 

Each of the posts loaded is tagged with a meta tags indicating where the posts were loaded from. The permalink will be set to the visible URL if the post was published or the internal ID if it was still a draft or scheduled post

* blogger_author
* blogger_blog
* blogger_permalink

= After importing there are a lot of categories =

Blogger does not distinguish between tags and categories so you will likely want to review what was imported and then use the categories to tags converter

= What about pages? =

This importer does not handle blogger pages, you will need to manually transfer them.

= What about images? =

This version of the importer imports these too, but you can disable this via a setting in the blogger-importer.php file. Tracking images of size 1x1 are not processed. If you with to specifically exclude other images you could code something for the image_filter function.

= What size are the images? =

The importer will attempt to download the a large version of the file if one is available. This is controlled by the setting "LARGE_IMAGE_SIZE" and defaults to a width of 1024. The display size of the images is the "medium" size of images as defined on Wordpress. You can change this in advance if you want to show a different size. 

= How do I know what images are skipped? =

If you hover over the progress bar for images it will tell you how many images are skipped. To see the filenames of these images you will need to enable Wordpress debugging to log to file. See http://codex.wordpress.org/Debugging_in_WordPress

= What about future posts? =

The scheduled posts will be transferred and will be published as specified. However, Blogger and WordPress handle drafts differently, WordPress does not support dates on draft posts so you will need to use a plugin if you wish to plan your writing schedule.

= Are the permalinks the same? =

No, WordPress and Blogger handle the permalinks differently. However, it is possible to use the redirection plugin or your .htaccess file to map the old URLs across to the new URLs.

= My posts and comments moved across but some things are stripped out =

The importer uses the SimplePie classes to process the data, these in turn use a Simplepie_Sanitize class to remove potentially malicious code from the source data.

= The dashboard is reporting that there are 0 comments in blogger =

This can occur if your blogger blog is set to private.

= The comments don't have avatars =

This is a know limitation of the data that is provided from Blogger. The Wordpress system uses Gravatar to provide the images for the comment avatars. This relies the email of the person making the comment. Blogger does not provide the email address in the data feed so Wordpress does not display the correct images. You can manually update or script change to the comment email addresses to work around this issue.

= How do I diagnose communication issues? =

If you've got issues with the blogger importer talking to Google then you can use the Core Control plugin to first check that your communication is working with the HTTP Module and if that is all ok then check the HTTP Logging Module to see if any of the remote calls to Google are returning errors. Also the OAuth Playground is a good way to test your access to the blogger data. http://googlecodesamples.com/oauth_playground/

= I'm getting timeouts connecting to Google =

Try the core control plugin as mentioned above. Also you try changing the constant REMOTE_TIMEOUT in the blogger-importer.php file to be a larger number of seconds.

= Why does it keep stopping? = 

The importer uses JQuery to process it's form so problems with it not refreshing or stalling could be due to an incompatibility with another plugin, disable any other plugins and see if the problem persists.

= It does not seem to be processing the images =

Check you've not run out of disk space on your server. Because Wordpress stores the files in multiple resolutions one image might take up as much as 250kb spread across 5 files of different sizes.

= How do I make the images bigger or smaller? =

The importer will attempt to download a large version of images but it displays them on the blog at the medium size. If you go into your settings->media options then you can display a different size "medium" image by default. You can't make this bigger than the file that has been downloaded which is where the next setting comes in.  

The default size for the large images is 1024, you can change this to an even larger size by changing the following line in the blogger-import.php file. 

const LARGE_IMAGE_SIZE = '1024';

The file downloaded won't be bigger than the origional file so if it was only 800x600 to start with then it won't be any bigger than that.

= I've run out of disk space processing the images = 

The importer is designed to download the high resolution images where they are available. You can either disable the downloading of images or you can change the constant LARGE_IMAGE_SIZE string in the blogger-importer.php file to swap the links with a smaller image. 

== Screenshots ==

1. Import in progress
2. Custom Fields added to Posts, Attachements and Comments

== Reference ==

* https://developers.google.com/blogger/docs/1.0/developers_guide_php
* https://developers.google.com/gdata/articles/oauth
* http://www.simplepie.org/

The following were referenced for implementing the images and links

* http://wordpress.org/extend/plugins/remote-images-grabber
* http://notions.okuda.ca/wordpress-plugins/blogger-image-import/
* http://wordpress.org/extend/plugins/cache-images/ 
* http://wordpress.org/extend/plugins/tumblr-importer/
* http://core.trac.wordpress.org/ticket/14525
* http://wpengineer.com/1735/easier-better-solutions-to-get-pictures-on-your-posts/
* http://www.velvetblues.com/web-development-blog/wordpress-plugin-update-urls/
* http://wordpress.stackexchange.com/questions//media-sideload-image-file-name
* http://wp.tutsplus.com/tutorials/plugins/a-guide-to-the-wordpress-http-api-the-basics/

== Known Issues ==

* Some users have reported that their IFrames are stripped out of the post content.
* Requests for better performance of larger transfers and tranfers of images
* Drop the check for OpenSSL and Blogger_OAuthSignatureMethod_RSA_SHA1 is not used by any other code in the plugin and can probably just be removed.
* Review of behavior when it re-imports, partiularly are the counts correct
* Review using get_posts or get_comments with the appropriate parameters to get the counts and exists instead of using SQL
* Incorrect notice, PHP Notice: The data could not be converted to UTF-8. You MUST have either the iconv or mbstring extension installed. This occurs even when Iconv is installed, could be related to Blogger reporting 0 comments
* When the importer is running it's not possible to stop it using the stop button

== Changelog ==

= 0.7 =
* Fixed issue with drafts not being imported in the right state 
* Added extra error handling for get_oauth_link to stop blank tokens being sent to the form
* Restructured code to keep similar steps in single function and to allow testing of components to be done
* Re-incorporated the "congrats" function and provided a sensible list of what to do next
* Add a geo_public flag to posts with geotags 
* Dropped _normalize_tag after confirming that it's handled by SimplePie
* Added image handling http://core.trac.wordpress.org/ticket/4010
* Added setting author on images
* Added error handling in get_oauth_link() as suggested by daniel_henrique ref http://core.trac.wordpress.org/ticket/21163
* Added a check for OpenSSL as suggested by digitalsensus
* Fixed issue with SimplePie santizer not getting set in Wordpress 3.5
* Added filter for the congrats function 'blogger_importer_congrats' so other plugins can add in new options
* Converted manual HTML table to WP_LIST_TABLE
* Moved inline Javascript to separate file to aid debugging and testing
* Wrapped data sent to Javascript in I18n functions.
* Fixed timeout error in the Javascript, timeouts were not being used.
* Supress post revisions when importing so that DB does not grow
* Added processing of internal links
* Added uninstall.php to remove options on uninstall
* Added a timeout value to all of the wp_remote_get calls as people have reported timeout issues
* Added a setting to control the large images downloaded from blogger.
* Stopped logging all the post and comment IDs in arrays and storing in option this improved the importing of very large blogs
* Fixed issue with comment_author_IP notice
* Code restructuring to use classes for blog objects
* Changed AJAX calls to use technique described here http://codex.wordpress.org/AJAX_in_Plugins#Ajax_on_the_Administration_Side
* Added AdminURL to the greet function rather than hardcoded path
* Defaulted to turn off post pingbacks
* Fix to stop it counting pingbacks, issue reported by realdoublebee
* Retrofitted Security enhancement from 0.6, nonce added to form buttons on main screen
* Security enhancement, nonce added to form button on authors screen
* Updated POT file
* Greek Translation from Stergatou Eleni http://buddypress.org/community/members/lenasterg/

= 0.6 =
* Security enhancement, nonce added to form button on main screen

= 0.5 =
* Merged in fix by SergeyBiryukov http://core.trac.wordpress.org/ticket/16012
* Merged in rmccue change to get_total_results to also use SimplePie from http://core.trac.wordpress.org/attachment/ticket/7652/7652-blogger.diff
* Reviewed in rmccue's changes in http://core.trac.wordpress.org/attachment/ticket/7652/7652-separate.diff issues with date handling functions so skipped those
* Moved SimplePie functions in  new class WP_SimplePie_Blog_Item incorporating get_draft_status and get_updated and convert date
* Tested comments from source blog GMT-8, destination London (currently GMT-1), comment dates transferred correctly.
* Fixed typo in oauth_get
* Added screen_icon() to all pages
* Added GeoTags as per spec on http://codex.wordpress.org/Geodata 
* Change by Otto42, rmccue to use Simplepie XML processing rather than Atomparser, http://core.trac.wordpress.org/ticket/14525 ref: http://core.trac.wordpress.org/attachment/ticket/7652/7652-blogger.diff
  this also fixes http://core.trac.wordpress.org/ticket/15560 
* Change by Otto42 to use OAuth rather than AuthSub authentication, should make authentication more reliable
* Fix by Andy from Workshopshed to load comments and nested comments correctly
* Fix by Andy from Workshopshed to correctly pass the blogger start-index and max-results parameters to oAuth functions and to process more than one batch http://core.trac.wordpress.org/ticket/19096
* Fix by Andy from Workshopshed error about incorrect enqueuing of scripts also changed styles to work the same
* Change by Andy from Workshopshed testing in debug mode and wrapped ajax return into a function to suppress debug messages
* Fix by Andy from Workshopshed notices for undefined variables.
* Change by Andy from Workshopshed Added tooltip to results table to show numbers of posts and comments skipped (duplicates / missing key)
* Fix by Andy from Workshopshed incorrectly checking for duplicates based on only the date and username, this gave false positives when large numbers of comments, particularly anonymous ones.

= 0.4 =
* Fix for tracking images being added by Blogger to non-authenticated feeds http://core.trac.wordpress.org/ticket/17623

= 0.3 =
* Bugfix for 403 Invalid AuthSub Token http://core.trac.wordpress.org/ticket/14629

= 0.1 =
* Initial release

== Upgrade Notice ==

= 0.7 =

Added support for images and links. Improvements in error handling when connecting to Google. Some bug fixes, see change log. User interface refresh
