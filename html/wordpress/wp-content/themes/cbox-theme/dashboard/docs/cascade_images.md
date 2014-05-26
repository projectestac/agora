## Cascading Assets: Images

Cascading images allow you to override image files in any theme in the stack without
having to touch any templates.

<ul class="infinity-docs-menu"></ul>

### Configuration

Your parent theme has this image root:

	image_root = "assets/images"

Your child theme has this image root:

	image_root = "content/img"

Your grandchild theme has this image root:

	image_root = "_inc/images"

If your parent theme contains an image under it's image root at:

	wp-content/themes/parent-theme/assets/images/banners/blue.jpg

you would have code in your parent theme's template similar to this:

	<img src="<?php infinity_image_url('banners/blue.jpg') ?>">

### Cascading

Now, you wish to override this in your **child** theme and your **grandparent** theme is the
one which is activated. Normally you would have to duplicate the template only to tweak the
image path. Not anymore! Upload a custom blue.jpg here:

	wp-content/themes/child-theme/content/img/banners/blue.jpg

Infinity will traverse the scheme looking for blue.jpg in this manner:

	wp-content/themes/grandchild-theme/_inc/images/banners/blue.jpg  < missing
	wp-content/themes/child-theme/content/img/banners/blue.jpg       < found and displayed
	wp-content/themes/parent-theme/assets/images/banners/blue.jpg    < ignored

> In case you missed it, the only thing that was done was to override the image. The
template is still being pulled from the parent theme.

### Performance

It is very possible that image cascading could lead to a significant jump in the
work your server must do to display images, all depending on the specifics of your setup.

Image cascading was originally created to facilitate simpler image management on the dashboard
side of things, but we did not see a reason to keep this powerful feature hidden.

Be smart, use at your own risk, YMMV!

### Helper Functions

To take advantage of cascading images you must use these special functions
to locate the correct image paths and urls. These functions *return* not *echo* values.

> **Important:** The $path argument is the **RELATIVE** path to the image\_root setting
of the highest level theme that calls the image in its template(s). That means
**no leading slash!**

#### infinity\_image\_path

Returns absolute filesystem path to image file.

	(string) infinity_image_path( string $path )

> _$path_ : Relative path to theme's image\_root setting.

#### infinity\_image\_url

Returns absolute URL to image file.

	(string) infinity_image_url( string $path )

> _$path_ : Relative path to theme's image\_root setting.