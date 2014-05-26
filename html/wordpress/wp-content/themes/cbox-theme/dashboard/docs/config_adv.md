## Configuration: Advanced Directives

Infinity has some additional configuration directives which are available for special cases.

### Directives

#### image\_root

The root image directory, relative to your theme root.

If your image directory is:

	wp-content/themes/my-theme/content/img

Then your image root setting would be:

	image_root = "content/img"

> If you do not set this, it is assumed that the image root is **"assets/images"**

#### style\_root

The root stylesheets directory, relative to your theme root.

If your stylesheets directory is:

	wp-content/themes/my-theme/content/css

Then your style root setting would be:

	style_root = "content/css"

> If you do not set this, it is assumed that the style root is **"assets/css"**

#### script\_root

The root javascripts directory, relative to your theme root.

If your scripts directory is:

	wp-content/themes/my-theme/content/js

Then your script root setting would be:

	script_root = "content/js"

> If you do not set this, it is assumed that the script root is **"assets/js"**

#### ui\_stylesheet

The ui\_stylesheet is where you define an alternate jQuery UI theme stylesheet if you wish
to use a theme other than the default which is defined internally.

	ui_stylesheet = "path/to/ui-custom.css"

#### options\_save\_single

The default is to always show two save buttons for each option on the theme options panel.
Set this to `off` if you only want to show the "Save All" button.

	options_save_single = off
