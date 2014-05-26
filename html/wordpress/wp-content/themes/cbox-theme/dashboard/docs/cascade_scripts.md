## Cascading Assets: Scripts

Cascading scripts allow you to override script files in any theme in the stack without
having to create a complicated enqueueing strategy. This allows you to **replace**
javascript code defined higher up the stack with custom code for your child theme.

> This feature is for advanced development required when there is some reason to not use
the automatic script enqueueing available through the Infinity configuration.

<ul class="infinity-docs-menu"></ul>

### Configuration

Your parent theme has this script root:

	script_root = "assets/scripts"

Your child theme has this script root:

	script_root = "content/js"

Your grandchild theme has this script root:

	script_root = "_inc/scripts"

If your parent theme contains an script under it's script root at:

	wp-content/themes/parent-theme/assets/scripts/media/lightbox.js

you would have code in your parent theme's functions.php similar to this:

	<?php
		wp_enqueue_script( 'my-colors', infinity_script_url('media/lightbox.js') );
	?>

### Cascading

Now, you wish to override this in your **child** theme and your **grandparent** theme is the
one which is activated. Normally you would have to enqueue an additional script and define
additional functions, then edit the templates to call them, or even worse, add code to **reverse**
functionality made my other scripts. Instead, upload a custom lightbox.js here:

	wp-content/themes/child-theme/content/js/media/lightbox.js

Infinity will traverse the scheme looking for lightbox.js in this manner:

	wp-content/themes/grandchild-theme/_inc/scripts/media/lightbox.js  < missing
	wp-content/themes/child-theme/content/js/media/lightbox.js         < found and enqueued
	wp-content/themes/parent-theme/assets/scripts/media/lightbox.js    < ignored

### Helper Functions

To take advantage of cascading scripts you must use these special functions
to locate the correct script paths and urls. These functions *return* not *echo* values.

> **Important:** The $path argument is the **RELATIVE** path to the script\_root setting
of the highest level theme that calls the script in its template(s). That means
**no leading slash!**

#### infinity\_script\_path

Returns absolute filesystem path to script file.

	(string) infinity_script_path( string $path )

> _$path_ : Relative path to theme's script\_root setting.

#### infinity\_script\_url

Returns absolute URL to script file.

	(string) infinity_script_url( string $path )

> _$path_ : Relative path to theme's script\_root setting.