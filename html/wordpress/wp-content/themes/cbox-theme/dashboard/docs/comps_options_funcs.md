## Options Component: Helper Functions

The following helper functions are available for the options component.

<ul class="infinity-docs-menu"></ul>

### infinity\_option\_get

Get the value of an option.

	(mixed) infinity_option_get( string $option_name )

> _$option\_name_ : Name of option as configured in options.ini

### infinity\_option\_fetch

Fetch a registered option object from the registry

	(mixed) infinity_option_fetch( string $option_name )

> _$option\_name_ : Name of option as configured in options.ini

### infinity\_option\_image\_src

Get an option image src array.

Use this to retrieve the meta information for an image when the option value is an attachment id.

	(mixed) infinity_option_image_src( string $option_name, string $size = 'thumbnail' )

> _$option\_name_ : Name of option as configured in options.ini  
> _$size_ : Either a string (`thumbnail`, `medium`, `large` or `full`), or a two item array
> representing width and height in pixels, e.g. array(32,32). The size of media icons
> are never affected.

### infinity\_option\_image\_url

Get an option image url.

Use this to retrieve the URL to an image when the option value is an attachment id.

	(mixed) infinity_option_image_url( string $option_name, string $size = 'thumbnail' )

> _$option\_name_ : Name of option as configured in options.ini  
> _$size_ : Either a string (`thumbnail`, `medium`, `large` or `full`), or a two item array
> representing width and height in pixels, e.g. array(32,32). The size of media icons
> are never affected.
