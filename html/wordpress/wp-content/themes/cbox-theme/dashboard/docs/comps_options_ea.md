## Options Component: Edit Anywhere

Infinity handles all of the dirty work for maintaining the options panel. However, there may be
times when you wish to make it possible to edit an option from a different screen. You can easily
embed option fields for editing on any Infinity control panel screen by using some simple template
tags.

<ul class="infinity-docs-menu"></ul>

### Rendering Logic

Embedding options using PHP follows this logic.

1. Opening form tag.
1. Call render begin function for option A.
1. Call any number of element renderering functions.
1. Call render end function.
1. Call render begin function for option B.
1. Call any number of element renderering functions.
1. Call render end function.
1. Closing form tag.

Here is a basic example which would embed an option field into a screen template.

	<form>
		<?php
			infinity_option_render_begin( 'infinity_header_logo' );
			infinity_option_render_label();
			infinity_option_render_field();
			infinity_option_render_buttons();
			infinity_option_render_end();
		?>
	</form>

### Rendering Functions

#### infinity\_option\_render\_begin

Prints opening option block element and flash message element.

	(void) infinity_option_render_begin( string $option_name )

> _$option\_name_ : Name of option as configured in options.ini

#### infinity\_option\_render\_end

Prints closing option block element.

	(void) infinity_option_render_end()

#### infinity\_option\_render\_title

Prints option title as plain text

	(void) infinity_option_render_title()

#### infinity\_option\_render\_description

Prints option description as plain text

	(void) infinity_option_render_description()

#### infinity\_option\_render\_label

Prints option title wrapper in a label tag

	(void) infinity_option_render_label()

#### infinity\_option\_render\_field

Prints option form field and related elements

	(void) infinity_option_render_field()

#### infinity\_option\_render\_buttons

Prints one or both option save buttons

	(void) infinity_option_render_buttons()

#### infinity\_option\_render\_save_all

Prints option save all button

	(void) infinity_option_render_save_all()

#### infinity\_option\_render\_save_one

Prints option save one button

	(void) infinity_option_render_save_one()