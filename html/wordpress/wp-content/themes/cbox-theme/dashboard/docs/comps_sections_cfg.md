## Sections Component: Configuration

> Currently only the options component supports sectioning!

The sections component is used to create category-like containers to which you can assign
other components. Sections can be infinitely nested to build up a menu-like tree.

<ul class="infinity-docs-menu"></ul>

### Sample Configuration

To define a section, you add something like this to your sections.ini file.

	[typography]
	title = "Typography"

Now you have a new section to which typography options can be assigned.

> Sections do not require a type to be defined since in most case the value is "default".

### Directives

You configure sections with the directives below, in addition to the
[base component directives](infinity://admin:doc/comps_base_cfg).

#### type (required)

This is where you configure what type of section you want to display.

	type = "default"

The available section types are:

* __default__ - The only type currently defined

#### parent

Sections can be nested to build up a tree. In order to configure a section to belong to a parent
section, you simply add the "parent" directive and set its value to another section that has
already been defined:

	parent = "layout"

> Any section which has children sections assigned to it (acting as a parent) cannot have
components assigned to it. If you try to assign components to a parent section, a fatal error
will occur.