=== Raw HTML ===
Contributors: whiteshadow
Tags: posts, formatting, javascript, html, css, code, disable
Requires at least: 2.8
Tested up to: 3.9
Stable tag: 1.4.12

Lets you use raw HTML or any other code in your posts. You can also disable smart quotes and other automatic formatting on a per-post basis.

== Description ==

Lets you disable automatic formatting like smart quotes and automatic paragraph creation, and use raw HTML/JS/CSS code in your posts without WordPress messing it up.

**Features**

With this plugin, you can wrap any part of your post in [raw]...[/raw] tags to prevent WordPress from converting newlines to HTML paragraphs, replacing apostrophes with typographic quotes and so on. This is very useful if you need to add a CSS block or JavaScript to your post.

RawHTML will also add new checkboxes to the "Edit Post" screen that let you disable certain WP filters on a per-post basis. This way you can: 

* Disable wptexturize (the function that creates smart quotes and other typographic characters).
* Disable automatic paragraph creation.
* Disable image smilies. 
* Disable convert_chars (the function that converts ampersands to HTML entities and "fixes" some Unicode characters).

The free version only supports editing posts in the Text tab (called "HTML" in older WordPress versions). [Get the Pro version](http://rawhtmlpro.com/?utm_source=wordpress.org&utm_medium=readme_link&utm_campaign=RawHTML%20free) if you want to be able to switch between Text and the Visual editor without WordPress messing up your content.

**Usage**

To prevent a part of your post or page from being filtered by WordPress, switch to the Text/HTML editor and wrap it in `[raw]...[/raw]` or `<!--raw-->...<!--/raw-->` tags. These two versions work exactly the same, except that the latter won't be visible to your visitors even if you deactivate Raw HTML.

*Example :*

`[raw]
This 

is 

a "test"!
[/raw]`

In this case, the tags will prevent WordPress from inserting paragraph breaks between "This", "is" and "a "test"", as well as ensure that the double quotes arround "test" are not converted to typographic (curly) quotes.

To avoid problems, only edit posts that contain your custom code in Text/HTML mode. If you'd like to be able to also use the Visual editor, [get the Pro version](http://rawhtmlpro.com/?utm_source=wordpress.org&utm_medium=readme_link&utm_campaign=RawHTML%20free). It will make the code betwen [raw] tags appear as a read-only placeholder when viewed in Visual mode, ensuring WordPress doesn't change it.

**Notes**

Some features of Raw HTML will only work for users who have the "unfiltered_html" capability. In a normal WordPress install that includes the Editor and Administrator roles. In a Multisite install, only the Super Admin has this capability by default.

== Installation ==

To install the plugin follow these steps :

1. Download the raw-html.zip file to your local machine.
1. Go to 'Plugins -> Add New -> Upload'.
1. Upload the zip file using the provided form.
1. Activate the plugin through the 'Plugins' menu in WordPress

Alternatively, you can search for "Raw HTML" in 'Plugins -> Add New -> Search' and install it from there, or unzip raw-html.zip and upload the `raw-html` directory to your `/wp-content/plugins` directory.

== Frequently Asked Questions ==

= What's the difference between the free version and the Pro version? =

If you're using the free version, switching from Text/HTML to the Visual editor can still mess up your code. The [Pro version](http://rawhtmlpro.com/?utm_source=wordpress.org&utm_medium=readme_link&utm_campaign=RawHTML%20free) fixes this. 

The way it works is that it replaces `[raw]...[/raw]` code with read-only placeholders when viewed via the Visual editor, and restores the original code when you switch to HTML or when the post is displayed your readers. This allows you to switch between HTML and Visual modes without worrying your content will get mangled by WP.

= How can I set some of the "Disable xyz" tweaks to be "On" by default? =

Open to the post editor and click the "Screen Options" button in the top-right part of the page. A settings panel will appear. Locate the "Raw HTML defaults" section and tick the appropriate checkboxes. Any changes you make to these settings will only affect new and edited posts.


== Changelog ==

= 1.4.12 =
* Tested with the release version of WP 3.9.

= 1.4.11 =
* Tested up to WP 3.9-alpha.
* Fixed a minor conflict with plugins/themes that run custom queries and then manually apply "the_content" filter to post content.

= 1.4.10 =
* Fixed a rare bug where all [raw]...[/raw] blocks in a post would be replaced with the content of the first block.

= 1.4.9 =
* Fixed a new conflict with WP-Syntax 1.0. 
* Tested with WP 3.5.1 and WP 3.6-beta1.

= 1.4.8 =
* Fixed a conflict with WP-Syntax.
* Fixed: Prevent WordPress from wrapping each [raw]...[/raw] block in a paragraph. Doesn't affect inline [raw] blocks.
* Tested with WP 3.5-beta2.

= 1.4.7 =
* Tested with WP 3.4.1
* Fixed the Author URI (was 404).
* Updated the plugin description. Now it also includes short usage instructions.
* Fixed the link to the Pro version (new site).

= 1.4.6 =
* Tested on WP 3.4 (final release).

= 1.4.5 =
* Tested on WP 3.4-alpha
* Store per-post disable_* flags in a single post meta key instead of one key per flag.

= 1.4.4 =
* Fixed a minor conflict with the "Really simple Facebook Twitter share buttons" plugin. 

= 1.4.3 =
* Changed the name to just "Raw HTML".
* Fixed incompatibility with SyntaxHighlighter Evolved.
* Tested on WordPress 3.3 (beta).

= 1.4.2 =
* Tested on WordPress 3.2.1
* Improved the checkbox layout in the plugin's post editor widget (extra whitespace).

= 1.4.1 =
* Tested on the latest Beta version of WordPress (3.2-beta2).
* Prefer `<!--raw-->...<!--/raw-->` over `<!--start_raw-->...<!--/end_raw-->`. The old syntax will continue to work, but you're encouraged to use either [raw] or `<!--raw-->` in the future as they're more internally consistent (and shorter).

= 1.4 =
* To decrease UI clutter, post-level settings now use hidden custom fields.

= 1.3 =
* Added a new panel to the "Screen Options" box that lest you auto-enable specific RawHTML settings (e.g. "Disable automatic paragraphs") for all new or updated posts.

= 1.2.5 =
* Fixed a conflict with the Intypo plugin
* Fixed example code formatting in readme.txt

= 1.2.4 =
* Added an autogenerated changelog.

= 1.2.3 =
* Fix a problem where very long posts would be displayed as blank. This was caused by a regexp input size limitation/bug in newer versions of PHP.

= 1.2.2 =
* Fix a glitch when one [RAW]/RAW block is immediately followed by another (cause : greedy regexp).

= 1.2.1 =
* Change filter priorities *again* to make it compatible with Exec-PHP (hopefully).

= 1.2 =
* Improved compatibility with other plugins (e.g. cforms II).
* Gave the "maybe\_" filters a higher priority to prevent conflicts with some plugins that want to insert untexturized HTML.

= 1.1 =
* New feature : disable wptexturize() and other filters on a per-post level.
* "Official" WP 2.7 compatibility.
* Fixed some readme.txt text

= 1.0.5 =
* Fix : regexp failing for very long posts, leading to blank pages.

= 1.0.4 =
* A tiny bugfix - changed one regexp to make quicktags perform as expected.

= 1.0.3 =
* WP 2.5.1 compatibility

= 1.0.2 =
* *There are no release notes for this version*

