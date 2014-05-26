## Configuration: Features

You can use the power of the Infinity config file to make managing features extremely easy.

### Adding Theme Support

In functions.php

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );

In infinity.ini

	[feature]
	post-thumbnails = on
	automatic-feed-links = on

Using either method has the same result.

### Removing Theme Support

If you wanted to remove theme support in a child theme that was set in an ancestor theme,
you would have:

In functions.php

	remove_theme_support( 'automatic-feed-links' );

In infinity.ini

	[feature]
	automatic-feed-links = off

Using either method has the same result.

### Infinity Built-In Features

Infinity has a few built-in features that you can use to quickly add functionality
to your theme. We've done this, because we think that certain customization features are
essential for any theme.

Unlike the standard solutions WordPress provides for custom headers and custom backgrounds,
we've integrated this functionality directly into the theme options panel, so your users do
not have to switch between different pages in the dashboard.

#### infinity-bp-support

This feature enables BuddyPress support. If BuddyPress is not active it is silently ignored.

#### infinity-custom-css

This feature enables a custom CSS option in the theme options panel.

> All of the values of registered options with the `type` of "css/custom" are merged
and sent to the browser by enqueueing a special export script. This is done automatically,
there are no additional steps to take.

#### infinity-base-styles

This feature enables the base Infinity wireframe stylesheet required for the base templates.

#### infinity-design-styles

This feature enables the Infinity design stylesheet which makes Infinity look nice out of the box.

#### infinity-header-layout

This feature adds several options for customizing the look and feel of the site header.

#### infinity-header-logo

This feature adds a file upload option in the theme options panel for a custom logo.
Some additional options for logo position and padding are also added.

#### infinity-main-menu-layout

This feature adds several options for customizing the look and feel of the site header.

#### infinity-body-layout

This feature adds several options for customizing the look and feel of the site body.

#### infinity-post-gravatar

This feature enables a Gravatar for post authors using their registered e-mail address.