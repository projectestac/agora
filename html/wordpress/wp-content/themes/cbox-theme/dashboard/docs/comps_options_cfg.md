## Options Component: Configuration

Infinity options are the most powerful feature of Infinity, allowing you to build
custom themes extremely quickly and efficiently.

With Infinity you can add every possible theme option you can probably imagine by
simply adding a few lines in the options.ini configuration file.

<ul class="infinity-docs-menu"></ul>

### Configuration Example

If you would like to add a file uploader to your theme to let people upload
an image of their storefront, you simply add this to your options.ini file:

	[mytheme_storefront_image]
	type = "upload"
	section = "media"
	title = "Storefront Photo"
	description = "Upload a picture of your storefront which will show on the main page."

Your users can now upload an image using our highly advanced uploader
tool, and use the built in WordPress editor to crop and edit their image.

### Output Example

Now you can add the following markup to your theme template to ouput
the uploaded image:

	<img src="<?php echo infinity_option_image_url( 'mytheme_storefront_image' ) ?>">

That's all there is to it!

### Directives

You configure options with the directives below, in addition to the
[base component directives](infinity://admin:doc/comps_base_cfg).

#### type (required)

This is where you configure what type of option you want to display.

	type = "text"

The available option types are:

* Basic
	* __text__ - Text input
	* __textarea__ Text area input
	* __select__ - Select box
	* __radio__ - Radio buttons
	* __checkbox__ - Check boxes
	* __css__ - Custom CSS textarea
* Dynamic
	* __category__ - Select one category
	* __categories__ - Select multiple categories
	* __page__ - Select one page
	* __pages__ - Select multiple pages
	* __post__ - Select one post
	* __posts__ - Select multiple posts
	* __tag__ - Select one tag
	* __tags__ - Select multiple tags
* Position
	* __position/left-right__ - Left/Right radios
	* __position/left-center-right__ - Left/Center/Right radios
	* __position/top-bottom__ - Top/Bottom radios
* Toggle
	* __toggle/on__ - "On" checkbox
	* __toggle/off__ - "Off" checkbox
	* __toggle/on-off__ - On/Off radios
	* __toggle/yes__ - "Yes" checkbox
	* __toggle/no__ - "No" checkbox
	* __toggle/yes-no__ - Yes/No radios
	* __toggle/enable__ - "Enable" checkbox
	* __toggle/disable__ - "Disable" checkbox
	* __toggle/enable-disable__ - Enable/Disable radios
* jQuery UI
	* __ui/slider__ - Slider with range support
* Advanced
	* __upload__ - Media uploader
	* __colorpicker__ - Color picker

> To learn more about what can be done with the different option types,
  check out the configuration examples in `infinity/engine/config/options.examples.ini`

Child theme can override type: **No**

#### section (required)

This tells Infinity in which section of the theme options you want to put the option.
You can create your own sections to divide the theme options, and Infinity handles the
layout automagically. This allows you to provide your users with a well organized and easy
to configure theme.

	section = "media"

> *Important* Every option must be assigned to at least one section.

Child theme can override section: **Yes**

#### field\_id

You can assign a CSS id to the option field in case you need to provide advanced functionality.

	field_id = "my-css-id"

> Since radio and checkbox groups cannot all have the same CSS id, the entire group of
inputs will be wrapped with a div where the id equals the `field_id`.

Child theme can override field\_id: **Yes**

#### field\_class

You can assign an extra CSS class to the option field for customized styling of the input.

	field_class = "my-css-class"

Child theme can override field\_class: **Yes**

#### field\_options

Basic multi-select field types, which include `checkbox`, `radio` and `select` support this option.

You can provide static options, as seen in the following two examples.

	field_options[] = "1=On"
	field_options[] = "0=Off"

	field_options[] = "red=Red"
	field_options[] = "green=Green"
	field_options[] = "blue=Blue"
	field_options[] = "sunny=Sunny Yellow"

Alternatively, you can provide a callback function to populate the available options.

	field_options = "my_theme_color_options"

The callback must return a one dimensional array where the array keys are the option values,
and the corresponding value for the keys are the description.

	function my_theme_color_options() {
		return array(
			'red' => 'Red',
			'green' => 'Green',
			'blue' => 'Blue',
			'sunny' => 'Sunny Yellow',
		);
	}

Child theme can override field\_options: **Yes**

#### default\_value

You can provide a default value for the option here. This will be returned by calls to
`infinity_option_get()` if the option has not been set by the site administrator.

	default_value = "blue"

Child theme can override default\_value: **Yes**

#### parent

Providing the name of another option will cause this "dependant option" to always
be displayed when the parent option is displayed.

	parent = "option-name"

> This option will not be displayed in the theme options menu.

Child theme can override parent: **Yes**

#### required\_feature

Providing the name of a theme feature will invoke a call to `current_theme_supports()`
to determine if the component should be visible.

	required_feature = "a-feature-name"

Child theme can override required\_feature: **No**

#### documentation

Documentation can be provided for any option by creating a doc page in the configuration
docs folder:

	wp-content/themes/child_theme/engine/documents/options/mytheme_option.md

Sub-directories are also allowed:

	wp-content/themes/child_theme/engine/documents/foo/bar/mytheme_option.md

There are three valid formats for doc pages.

* **Markdown**

	The doc page must end with the `.md` extension and contain valid Markdown markup. This is the
	preferred method for themes that will be extended so that non-classed element styles can be
	applied.

	For help with Markdown, see
	[Basic Usage](http://daringfireball.net/projects/markdown/basics) and the
	[Syntax Reference](http://daringfireball.net/projects/markdown/syntax)

	> Custom Infinity `<a>` and `<img>` tags support is under development

* **Textile**

	The doc page must end with the `.text` or `.textile` extensions and contain valid Textile
	markup.

	For help with Textile, see the [Syntax Reference](http://textile.thresholdstate.com/)

	> Custom Infinity `<a>` and `<img>` tags support is under development.

* **HTML**

	The doc page must end with the `.html` extension and contain valid HTML markup *with all tags
	properly closed*.

	> Please keep in mind that anyone extending your theme will have to spend
	additional time on styling of the options panel if your markup implements special formatting
	which relies on custom CSS ids or classes. **The use of ids and classes is strongly discouraged.**

There are three documentation modes:

* **Disabled** (default)

	`documentation = off`

	This disables documentation for the option.

* **Automatic**

	`documentation = on`

	In this case the doc page should have the exact same name as the option, and be placed
	in a subdirectory of your `engine/documents` folder called `options`. For example:

	`my-theme/engine/documents/options/option_name.md`

* **Manual**

	`documentation = "mytheme_option"`

	In this case the doc page should be named `mytheme_option.text`,
	`mytheme_option.md` or `mytheme_option.html`.

	Sub-directory:

	`documentation = "foo/bar/mytheme_option"`

	Create the directories `engine/documents/foo/bar` and place your doc page in the `foo` directory.

	> Infinity makes heavy use of the manual mode due to the fact that you can re-use the same
	page doc for as many options as you wish. This allows you to build up and pull from a library
	of reusable documentation.

The output of the doc page will be shown in the Documentation tab of the option. If documentation
for the option is disabled, or no doc page can be found in the theme hierarchy, no documentation
tab will be displayed.

If you are extending a theme and wish to provide different documentation than the parent's author
has provided, you simply create the same doc page in your theme, and your documentation will override
the parent file. In this case you are not limited to using the same format. If the parent theme
has a file named `mytheme_option.html`, you can create a file called `mytheme_option.md` and
your Markdown file will override the HTML file.

Child theme can override documentation setting: **Yes**<br />
Child theme can override documentation pages: **Yes**