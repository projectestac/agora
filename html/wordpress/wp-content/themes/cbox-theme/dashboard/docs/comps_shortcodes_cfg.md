## Shortcodes Component: Configuration

The shortcodes component is used to easily create and maintain WordPress shortcodes.
The use of types allows you to create multiple shortcodes with the same underlying
functionality but having different names and  configurations.
It also allows you to maintain backwards compatibility with older shortcodes, or even
shortcodes from other themes without duplication of code.

> You can also share shortcode types with other developers without getting stuck
> with each other's naming conventions!

<ul class="infinity-docs-menu"></ul>

### Sample Configuration

To define a shortcode, you add something like this to your shortcodes.ini file.

	[members]
	type = "access"
	title = "Members Only"
	attributes[] = "capability=read"

Now you have a members only shortcode named "members" which only displays content to
registered users with the "read" capability.

### The Power of Types

Using the power of types you can create a similar shortcode to the one above for premium members.
If you have premium members which are allowed to access private posts, you might create a
shortcode like this.

	[members_premium]
	type = "access"
	title = "Premium Members Only"
	attributes[] = "capability=read_private_posts"

Now you have a premium members only shortcode named "members\_premium" which only displays
content to registered users with the "read\_private\_posts" capability.

### Directives

You configure shortcodes with the directives below, in addition to the
[base component directives](infinity://admin:doc/comps_base_cfg).

#### type (required)

This is where you configure what type of shortcode you want to display.

	type = "access"

The available shortcode types are:

* __access__ - A basic content protector
* __visitor__ - Show content only to non-authenticated users

> Eventually there will be dozens of built-in shortcodes.

#### attributes

Each shortcode type can have anywhere from zero to possibly greater than ten attributes that
it supports. Using this directive you can override the default attribute settings defined
by the shortcode type.

Here is what the attributes for a fancy link shortcode might look like.

	attributes[] = "url=http://google.com"
	attributes[] = "color=green"
	attributes[] = "icon=assets/img/google.gif"

> In case you haven't had enough coffee yet, the above is not a working example.