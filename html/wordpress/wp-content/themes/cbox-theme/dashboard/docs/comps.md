## Components: Overview

Our main focus when developing Infinity, was to make it *really* easy to work with, not only
for developers, but also for theme designers. If you're familiar with WordPress theme development
then you know how much time is spent on implementing, maintaining and extending your theme
features and options in the WordPress backend. We have spent a lot of time making this
process as painless as possible.

This means that you can add advanced functionality to your theme by simply adding a few lines in
a configuration file. The configuration syntax is powerful and easy to learn. There is no longer
a need to write dozens of lines of PHP code to handle the same simple tasks over and over again.

<ul class="infinity-docs-menu"></ul>

### Base Components

Infinity currently has six base components available.

* **Features** - Easily add/create pre-packaged functionality for your theme.
* **Options** - Extremely powerful theme options architecture.
* **Screens** - Customize and extend the Infinity control panel with little effort.
* **Sections** - Use sections to easily group your components up by category.
* **Shortcodes** - Create custom shortcodes without writing any PHP.
* **Widgets** - Easily add complex functionality to any control panel screen.

### Configuration Files

Infinity components are defined and customized using configuration files which tell
Infinity what components you want to provide with your theme.

Each component has its own configuration file in the `my-theme/config` directory.

	engine/config/features.ini
	engine/config/options.ini
	engine/config/screens.ini
	engine/config/sections.ini
	engine/config/shortcodes.ini
	engine/config/widgets.ini

> Never edit the configuration files that ship with Infinity. Edit the files in your
child theme!

None of the configuration files are required, and are silently ignored if they are missing.

Child themes inherit *All* of the options from *EVERY* ancestor theme, allowing you to
create a highly extensible theme hierarchy. In addition, most of the component directives can
be overridden for fine grained control over the look and functionality of your theme.

### Component Extensions

Infinity's component architecture is highly advanced and based on types. Each component has
several extensions or "types". For instance the options component has the types "text"
"checkbox" "radio" etc, all of which extend the base options component, which further extends
the "root" base component.

When you configure a component you are *extending* or *re-using* the types. In the case of the
"text" option type you can create dozens of unique text input fields without duplicating the
basic "text" functionality.

A more powerful example is the widgets component "posts-list" type. You can create dozens of
sortable post lists, each listing a different post type, without writing any PHP code.

If you are at least an intermediate level PHP developer, you can create your own extensions
for any base component, or even extend existing extensions to customize them to your needs!

> More documentation on this will be added soon, until then, you can use existing component
extensions as a model for development.

### Helper Functions

Some components have helper functions which are used to edit, manipulate and/or display
its underlying functionality and data.

It is important that you use these functions to display components or get their data as they
do many special things behind the scenes, like handling default values and checking user
capabilities among other things.

Check out the documentation for each component for complete details on their custom functions.