=== bbPress Enable TinyMCE Visual Tab ===
Contributors: jaredatch
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=AD8KTWTTDX9JL
Tags: bbpress
Requires at least: 3.5.0
Tested up to: 3.5.1
Stable tag: trunk
 
Activates the visual tab for the bbPress TinyMCE editor and provides a few other options.

== Description ==

bbPress 2.3.0 disabled the TinyMCE "visual tab" by default. When activated, this plugin brings it back.

Additionally, this plugin also:

* Adds option to enable the full default TinyMCE mode (bbPress defaults to "teeny" mode).
* Adds option to enable the Media Upload button.

There are a few things to note about the additional options that are avilable. **Please read below.**

Enabling the full default TinyMCE editor mode will display all the buttons, similar to the editor inside the WordPress admin. Depending on your configuration some of these buttons may not be compatible with TinyMCE. For example the "Insert More Tag" button will not do anything when used with bbPress. If you have a plugin installed that adds 3rd party buttons to the editor, this option should not be enabled as these buttons will likely not be compatible with bbPress. 

Enabling the media upload button, "Add Media", will only enable this button for users who have the ability to upload files. By default this is authors and greater. This means this button will _not_ show for normal forum users. This is simply to give administrators the ability to easily upload and insert images into bbPress. If you want forum participants to be able to upload images you should use a seperate plugin such as GD bbPress Attachments.

Lastly, if you run a forum where users will be posting code snippets, this plugin should not be used.

== Installation ==

1. Upload `bbpress-tinymce-visual-tab` to your `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure optional settings on the Setting > Forums page

== Frequently Asked Questions ==

= I'm still having problems with the fancy editor =

The bbPress fancy editor works well, but has it's own set of quirks, which is why as of 2.3 it is disabled by default. If you are having a specific issue you can open a support ticket for this plugin or try posting on the bbpress.org support forums for further help.

== Screenshots ==

1. The bbPress editor with the plugin activated and media upload enabled.
2. Additional editor options added to the forum settings page. 

== Changelog ==

= 1.0.1 =
* Fixed issue that prevented settings from showing

= 1.0.0 =
* Initial launch