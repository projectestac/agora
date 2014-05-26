## Features Component: Configuration

The features component is used to create "packages" of functionality (theme support)
which can be re-used across many themes or even many times *within the same theme*.

<ul class="infinity-docs-menu"></ul>

### Sample Configuration

To define a feature, you add something like this to your features.ini file.

	[support]
	type = "cpanel"
	title = "Tech Support"
	template = "includes/tpls/support.php"
	icon_primary = "ui-icon-help"
	toolbar = Yes
	priority = 25

Now you have a "Tech Support" feature with a toolbar button and a menu priority of 25.

### Sample Sub-Option Configuration

Some features are very advanced and take advantage of the options component in order to store
data they need. For this reason the features component has a special configuration syntax
for sub-options.

A sub-option is configured exactly like an option would be configured in options.ini,
except that it is prefixed with a feature name to which it belongs.

For example, here is the sub-option of the custom-css feature which is the textarea
where the custom css markup is entered in the options panel.

	[infinity-custom-css.markup]
	type = "css"
	section = "custom_styling"
	title = "Custom CSS"
	description = "Enter custom CSS markup to fine tune the look of your site"

This configuration block creates a new option called "infinity-custom-css_markup"

> The "." is replaced with am underscore ("_") because jQuery does not support periods in HTML element ids.

Sub-options can be overriden by theme ancestors in their features.ini just like you would
normally do, as long as you maintain the feature name prefix *exactly*.

### Directives

You configure features with the directives below, in addition to the
[base component directives](infinity://admin:doc/comps_base_cfg).

#### type (required)

This is where you configure what type of feature you want to display.

	type = "default"

The available feature types are:

* __default__				- An generic feature which acts as a simple container
* __bp/support__			- Enables BuddyPress support
* __gravatar__				- Add a gravatar just about anywhere and give users the power to
							control the output.
* __header-logo__			- Attach an uploader option to any css selector to allow users to manage
							the image file and positioning in the output.