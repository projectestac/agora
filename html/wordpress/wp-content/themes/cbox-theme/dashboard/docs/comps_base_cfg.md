## Components: Configuration

Each component's configuration file tells Infinity what components you want to provide with
your theme. You "create" components in the configuration files by providing a unique name
and setting directives for each name.

<ul class="infinity-docs-menu"></ul>

### Component Syntax

Defining a component is very simple. Each component configuration block begins with a unique
name that you use to display/manipulate the component in your WordPress theme.

The component name goes inside square brackets, and the directives for that component come
immediately after it. Component names can only contain the characters a-z, 0-9, and hyphen.

	[component-name]
	type = "valid-type"				; Required
	title = "A Title"				; Required
	description = "A Description"	; Optional

> Some components have many additional required and/or optional directives available.

### Sample Component

If you would like to add a text box to your theme options to let people type
a short biography about their business, you simply add this to your options.ini file:

	[mytheme_business_bio]
	type = "textarea"
	section = "general"
	title = "Business Bio"
	description = "Type a short bio for your business which will show on the main page."

That's all there is to it! Your users can now type their bio and save it from the theme options
panel.

Now you can add the following markup to your theme template to ouput the bio text:

	<img src="<?php echo infinity_option_get( 'mytheme_business_bio' ) ?>">

That's all there is to it! Infinity handles all the hard stuff behind the scenes so you
can focus on making your theme awesome, instead of making it work.

### Base Directives

The following is a list of all directives which can be used to configure *ANY* component.

#### type (required)

This is where you configure what type of component you want to display.

	type = "valid-type"

> Each base component has its own valid types available. See each base component's documentation
for complete details.

Child theme can override: **No**

#### title (required)

Use a descriptive name to tell the user what this component does.

	title = "Welcome Text"

Child theme can override: **Yes**

#### description

A more detailed description of what the component does inside your theme.

	description = "Edit the welcome text on your home page"

Child theme can override: **Yes**

#### id

Infinity automagically assigns an id to component HTML elements. If you wish to
assign a custom id to a configured component, setting this directive will tell
infinity to use your id instead.

	id = "my-special-id"

Child theme can override: **Yes**

#### class

You can assign an additional CSS class to any component to customize the looks using CSS.
This is a powerful feature which allows you to completely customize the look and feel of
your components to make them fit your theme's or client's needs.

	class = "my-css-class"

Child theme can override: **Yes**

#### capabilities

A comma separated list of WordPress capabilities that the user must have in order to edit
this specific component.

	capabilities = "edit_posts"

Child theme can override: **No**<br />
Child theme can add/append: **Yes**

#### template

Set this to the relative path from your theme's folder to an alternate PHP template file
to use when rendering the current component.

	template = "path/to/template.php"

> Make sure you know what you are doing! You should base your custom template on the original
> to ensure maximum compatibility.

A child theme can override the file by creating a file with the identical path and name, or by
simply overriding the value in the config with a different file path.

Child theme can override: **Yes**

#### style

Set this to the relative path from your theme's folder to a file containing CSS markup
and its contents will be injected into the component's dynamic css file. See the Dynamic
Stylesheets section of [Automatic Style Enqueueing](infinity://admin:doc/config_style) for
more details.

	style = "path/to/custom.css"

> The paths of any relative `url('path/to/my.png')` values will be automatically resolved
  to point to the correct location relative to the dynamic CSS file.

A child theme can override the file by creating a file with the identical path and name, or by
simply overriding the value in the config with a different file path.

Child theme can override: **Yes**

#### script

Set this to the relative path from your theme's folder to a file containing javascript code
and its contents will be injected into the component's dynamic js file. See the Dynamic Scripts
section of [Automatic Script Enqueueing](infinity://admin:doc/config_script) for more details.

	script = "path/to/custom.js"

A child theme can override the file by creating a file with the identical path and name, or by
simply overriding the value in the config with a different file path.

Child theme can override: **Yes**

#### ignore

Toggle this setting "on" to prevent a component defined in the theme ancestry from being
loaded by Infinity.

	ignore = Yes

Child theme can override: **Yes**