## Template Tags

Infinity requires the use of some custom template tags in order
for the infinite child theme template inheritance to work properly. If you wish to have a
theme hierarchy which is **three or more** themes deep, **including** Infinity, you must use these
special functions **instead of** the standard core functions in WordPress.

*If you are only inheriting options, and not templates, this does not apply to you.*

<ul class="infinity-docs-menu"></ul>

### Custom Functions

The arguments for these custom functions are identical to the
function which they are replacing.

> Don't worry! These functions are just basic wrappers that allow us to work some magic.

#### Locate Template

	// use
	infinity_locate_template()
	// instead of
	locate_template()

#### Load Template

	// use
	infinity_load_template()
	// instead of
	load_template()

#### Get Header

	// use
	infinity_get_header()
	// instead of
	get_header()

#### Get Footer

	// use
	infinity_get_footer()
	// instead of
	get_footer()

#### Get Sidebar

	// use
	infinity_get_sidebar()
	// instead of
	get_sidebar()

#### Get Search Form

	// use
	infinity_get_search_form()
	// instead of
	get_search_form()

#### Get Template Part

	// use
	infinity_get_template_part()
	// instead of
	get_template_part()

#### Comments Template

	// use
	infinity_comments_template()
	// instead of
	comments_template()

### Missing Anything?

> If you come across a function that should have a wrapper which is missing from this list,
please contact us ASAP.