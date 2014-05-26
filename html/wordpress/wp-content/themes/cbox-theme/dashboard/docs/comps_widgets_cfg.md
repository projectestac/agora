## Widgets Component: Configuration

The widgets component is used to create "packages" of re-usable functionality
for use in Infinity control panel screens.

> In the future this may be expanded to the blog side of the site.

<ul class="infinity-docs-menu"></ul>

### Sample Configuration

To define a widget, you add something like this to your widgets.ini file.

	[pages-list]
	type = "posts-list"
	title = "Edit Blog Pages"
	description = "Edit your blog pages and modify the order"
	post_type = "page"

Now you have a "Pages List" widget named "pages-list" which will display all of the
posts with the type of "page".

### Directives

You configure widgets with the directives below, in addition to the
[base component directives](infinity://admin:doc/comps_base_cfg).

#### type (required)

This is where you configure what type of widget you want to display.

	type = "default"

The available widget types are:

* __default__ -		An empty widget
* __posts-list__ -	Create a sortable list of any post type

> Eventually there will be dozens of widget types.