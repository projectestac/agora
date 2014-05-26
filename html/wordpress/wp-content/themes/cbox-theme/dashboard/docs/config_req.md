## Configuration: Required Directives

Infinity has directives that MUST be set for Infinity to work properly.

> Infinity sets these in its own infinity.ini, so you don't always have to set them
in your child theme, but it is highly recommended that you do anyways.

### Directives

Currently there is only one, but more may be added in the future.

#### parent\_theme

The parent theme must be either "infinity" or an ancestor of infinity.

	parent_theme = "my-base-theme"

> If you do not set this, it is assumed that the parent theme is **"infinity"**