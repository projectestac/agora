## Cascading Assets: Stylesheets

Cascading stylesheets allow you to override stylesheet files in any theme in the stack without
having to create a complicated enqueueing strategy. This allows you to **replace**
CSS rules and declarations defined higher up the stack with custom CSS for your child theme.

> This feature is for advanced development required when there is some reason to not use
the automatic style enqueueing available through the Infinity configuration.

<ul class="infinity-docs-menu"></ul>

### Configuration

Your parent theme has this style root:

	style_root = "assets/styles"

Your child theme has this style root:

	style_root = "content/css"

Your grandchild theme has this style root:

	style_root = "_inc/styles"

If your parent theme contains an style under it's style root at:

	wp-content/themes/parent-theme/assets/styles/colors/bright.css

you would have code in your parent theme's functions.php similar to this:

	<?php
		wp_enqueue_style( 'my-colors', infinity_style_url('colors/bright.css') );
	?>

### Cascading

Now, you wish to override this in your **child** theme and your **grandparent** theme is the
one which is activated. Normally you would have to enqueue and additional stylesheet and
override many of the values, or possibly adding dozens of new classes.
Instead, upload a custom bright.css here:

	wp-content/themes/child-theme/content/css/colors/bright.css

Infinity will traverse the scheme looking for bright.css in this manner:

	wp-content/themes/grandchild-theme/_inc/styles/colors/bright.css  < missing
	wp-content/themes/child-theme/content/css/colors/bright.css       < found and enqueued
	wp-content/themes/parent-theme/assets/styles/colors/bright.css    < ignored

### Helper Functions

To take advantage of cascading styles you must use these special functions
to locate the correct style paths and urls. These functions *return* not *echo* values.

> **Important:** The $path argument is the **RELATIVE** path to the style\_root setting
of the highest level theme that calls the style in its template(s). That means
**no leading slash!**

#### infinity\_style\_path

Returns absolute filesystem path to style file.

	(string) infinity_style_path( string $path )

> _$path_ : Relative path to theme's style\_root setting.

#### infinity\_style\_url

Returns absolute URL to style file.

	(string) infinity_style_url( string $path )

> _$path_ : Relative path to theme's style\_root setting.