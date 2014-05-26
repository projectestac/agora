## Screens Component: Configuration

The screens component is used to create "pages" of content which can then be added to
the Infinity control panel. Screens are automatically added to the drop down menu and
can be nested to build up a cascading menu. You can even add icons and control the
order in which they are shown/listed using only configuration directives.

<ul class="infinity-docs-menu"></ul>

### Sample Configuration

To define a screen, you add something like this to your screens.ini file.

	[support]
	type = "cpanel"
	title = "Tech Support"
	template = "includes/tpls/support.php"
	icon_primary = "ui-icon-help"
	toolbar = Yes
	priority = 25

Now you have a "Tech Support" screen with a toolbar button and a menu priority of 25.

### Directives

You configure screens with the directives below, in addition to the
[base component directives](infinity://admin:doc/comps_base_cfg).

#### type (required)

This is where you configure what type of screen you want to display.

	type = "cpanel"

The available screen types are:

* __cpanel__ - The only type currently defined

#### parent

Screens can be nested to build up a tree. In order to configure a screen to belong to a parent
screen, you simply add the "parent" directive and set its value to another screen that has
already been defined.

	parent = "docs"

> A screen which is acting as a parent cannot be directly accessed from the dropdown menu.

#### template

Every screen that is not acting as a parent requires a template from which to load it's content.

	template = "path/to/file.php"

#### icon_primary

Screens have built in support for the jQuery UI button widget. All of the toolbar and menu
buttons are created with the button widget. You can set the primary icon (to the left of
the button text) to an CSS class name which is either a built-in jQuery UI icon or a compatible
icon that you have created yourself.

	icon_primary = "ui-icon-document"

#### icon_secondary

Identical to primary icon (above) except the icon is positioned to the right of the button text.

	icon_secondary = "ui-icon-triangle-1-e"

#### toolbar

Toggle this setting on to enable a shortcut button on the control panel toolbar.

	toolbar = Yes

#### priority

Set this to a number greater than zero to control the order in which screen buttons/links appear
in the toolbar and/or menu.

	priority = 15
