## Configuration: Automatic Script Enqueuing

Infinity allows you to enqueue your theme's scripts entirely using configuration
directives without writing any PHP code. The WordPress function `wp_enqueue_scripts()`
is called to enqueue the scripts where the configuration calls for it.

<ul class="infinity-docs-menu"></ul>

### Directives

> *Important:* Scripts will NEVER be enqueued, UNLESS an action or condition is set (see below)

#### [script]

The script section is where you define your scripts. A script is a handle (name) of the script
and the script file's relative path *from your theme's root directory.* Full length URLs to
scripts are also supported if they begin with `http`.

The format is:

	handle = "path/to/script.js"

Here is an example:

	[script]
	sliders = "js/vendors/sliders.js"
	ajax = "js/ajax.js"
	custom = "js/custom.js"
	gmaps = http://maps.google.com/maps/api/js

#### [script\_depends]

The script dependancies section lets you define other scripts that one of your
scripts requires to be loaded before it.

The format is:

	handle = "comma,separated,script,handles"

You should use the *exact* same handle names that you defined in the `[scripts]` section.
If your list of requuired handles contains a script handle which is not defined by you, it
will still be passed to `wp_enqueue_scripts()` as a dependancy assuming that is has already been
registered in WordPress.

Here is an example:

	[script_depends]
	custom = "gmaps,ajax"

In the above example, the `gmaps` and `ajax` scripts would be enqueued before
the `custom` script.

#### [script\_actions]

The script actions section lets you fine tune when scripts are enqueued by assigning one
or more script handles to an action.

The format is:

	action = "comma,separated,script,handles"

You should use the *exact* same handle names that you defined in the `[scripts]` section.

Here is an example:

	[script_actions]
	wp = "sliders,custom"

The above code would result in the following three scripts being enqueued.

	http://mysite.com/wp-content/themes/my-theme/js/vendors/sliders.js
	http://mysite.com/wp-content/themes/my-theme/js/custom.js

In the above example, the `sliders` and `custom` scripts would only be enqueued if and when
the `wp` action is called by WordPress. It is up to you to use actions that are called in time
for `wp_enqueue_scripts()` to work properly.

#### [script\_conditions]

The script conditions section lets fine tune when scripts are enqueued by assigning one
or more script handles to a condition (callback function) which evaluates to true.

The basic format is:

	callback_name = "comma,separated,script,handles"

The format to pass any number of arguments to the callback is:

	callback_name:arg1,arg2,arg3 = "comma,separated,script,handles"

You should use the *exact* same handle names that you defined in the `[scripts]` section.

Here is an example:

	[script_conditions]
	is_front_page = "sliders"

In the above example, the `sliders` script would only be enqueued if the `is_front_page()`
function returns true.

### Cross-Referencing Handles

There may be a situation where you want to add a dependency or condition to one of your
scripts, but the script which your script depends on is defined by the `parent_theme`,
or maybe even further up the scheme stack.

In this case you simply refer to the handle using this syntax:

	theme-name:handle

Here is an example:

	[script_depends]
	custom-slider = "my-base-theme:slider"

### Internal Script Handles

Infinity defines many internal script handles which can be used for incredibly precise control
over the order in which scripts are enqueued. These internal script handles are defined by the
internal theme **@** (just the atmark).

All internal script handles begin with the characters **@:** (atmark-colon) and can be used
just like script handles that are defined manually. See the cross-referencing section above to
understand the significance of the prefix.

#### Dynamic Scripts

The following internal handles refer to scripts that are generated and saved to a cache
file every time a configuration ini file is modified, or a theme option is saved.

The theme and admin dashboard each have their own cache file which is located under the applicable
uploads folder depending on whether you are running a standard or network install of WordPress.

Standard Location:

	wp-content/uploads/files/exports/dynamic.js
	wp-content/uploads/files/exports/dynamic-admin.js

Network Location:

	wp-content/blogs.dir/[site_id]/files/exports/dynamic.js
	wp-content/blogs.dir/[site_id]/files/exports/dynamic-admin.js