## Configuration: Automatic Style Enqueuing

Infinity allows you to enqueue your theme's stylesheets entirely using configuration
directives without writing any PHP code. The WordPress function `wp_enqueue_styles()`
is called to enqueue the styles where the configuration calls for it.

<ul class="infinity-docs-menu"></ul>

### Directives

> *Important:* Styles will NEVER be enqueued, UNLESS an action or condition is set (see below)

#### [style]

The style section is where you define your styles. A style is a handle (name) of the stylesheet
and the stylesheet's relative path *from your theme's root directory.* Full length URLs to
stylesheets are also supported if they begin with `http://`.

The format is:

	handle = "path/to/file.css"

Here is an example:

	[style]
	colors = "css/colors.css"
	sliders = "css/vendors/slider.css"
	page-sidebar = "css/pagesidebars.css"
	gfonts = "http://fonts.googleapis.com/css?family=Droid+Sans:regular"

#### [style\_depends]

The style dependancies section lets you define other stylesheets that one of your
stylesheets requires to be loaded before it.

The format is:

	handle = "comma,separated,style,handles"

You should use the *exact* same handle names that you defined in the `[styles]` section.
If your list of required handles contains a handle which is not defined by you, it will
still be passed to `wp_enqueue_styles()` as a dependancy assuming that is has already
been registered in WordPress.

Here is an example:

	[style_depends]
	sliders = "colors,gfonts"

In the above example, the `colors` and `gfonts` stylesheets would be enqueued before
the `sliders` stylesheet.

#### [style\_actions]

The style actions section lets you fine tune when styles are enqueued by assigning one
or more style handles to an action.

The format is:

	action = "comma,separated,style,handles"

You should use the *exact* same handle names that you defined in the `[styles]` section.

Here is an example:

	[style_actions]
	wp = "colors,sliders"

The above code would result in the following three stylesheets being enqueued.

	http://mysite.com/wp-content/themes/my-theme/css/colors.css
	http://mysite.com/wp-content/themes/my-theme/css/vendors/slider.css

In the above example, the `colors` and `sliders` stylesheets would only be enqueued if and when
the `wp` action is called by WordPress. It is up to you to use actions that are called in time
for `wp_enqueue_styles()` to work properly.

#### [style\_conditions]

The style conditions section lets you fine tune when styles are enqueued by assigning one
or more style handles to a condition (callback function) which evaluates to true.

The basic format is:

	callback_name = "comma,separated,style,handles"

The format to pass any number of arguments to the callback is:

	callback_name:arg1,arg2,arg3 = "comma,separated,style,handles"

You should use the *exact* same handle names that you defined in the `[styles]` section.

Here is an example:

	[style_conditions]
	is_front_page = "sliders"
	is_page = "page-sidebar"

In the above example, the `sliders` stylesheet would only be enqueued if the `is_front_page()`
function returns true, and the page-sidebar stylesheet would only be enqueued if the `is_page()`
function returns true.

### Cross-Referencing Handles

There may be a situation where you want to add a dependency or condition to one of your
stylesheets, but the stylesheet which your stylesheet depends on is defined by the `parent_theme`,
or maybe even further up the scheme stack.

In this case you simply refer to the handle using this syntax:

	theme-name:handle

Here is an example:

	[style_depends]
	really-fancy = "my-base-theme:layout"

### Internal Style Handles

Infinity defines many internal style handles which can be used for incredibly precise control
over the order in which stylesheets are enqueued. These internal style handles are defined by the
internal theme **@** (just the atmark).

All internal styles begin with the characters **@:** (atmark-colon) and can be used just like
style handles that are defined manually. See the cross-referencing section above to understand
the significance of the prefix.

#### Static Stylesheets

The following internal handles refer to static stylesheets that ship with Infinity.

* __@:ui__

	This handle is assigned to the current jQuery UI stylesheet, even if you override the UI
	stylesheet using the advanced directive `ui_stylesheet`.

* __@:style__

	This handle is assigned to the theme's main stylesheet that is located in the theme's folder.

		themes/my-theme/style.css

#### Dynamic Stylesheets

The following internal handles refer to stylesheets that are generated and saved to a cache
file every time a configuration ini file is modified, or a theme option is saved.

The theme and admin dashboard each have their own cache file which is located under the applicable
uploads folder depending on whether you are running a standard or network install of WordPress.

Standard Location:

	wp-content/uploads/files/exports/dynamic.css
	wp-content/uploads/files/exports/dynamic-admin.css

Network Location:

	wp-content/blogs.dir/[site_id]/files/exports/dynamic.css
	wp-content/blogs.dir/[site_id]/files/exports/dynamic-admin.css
