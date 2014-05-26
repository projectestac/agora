/*
 * jUIcy Font Filter
 *
 * Depends:
 *	jquery.ui.core.js
 *	jquery.ui.widget.js
 *	jquery.ui.button.js
 *	jquery.juicy.titlebox.js
 */
(function( $ ) {

var inputName = 0,
	fontMeta = null,
	fontSlants = {
		n: 'Normal',
		i: 'Italic'
	},
	fontServices = {
		google: 'Google',
		typekit: 'TypeKit'
	},
	fontVariants = {
		n: {
			'n1': 'Ultra-Light',
			'n2': 'Light',
			'n3': 'Book',
			'n4': 'Normal',
			'n5': 'Medium',
			'n6': 'Semi-Bold',
			'n7': 'Bold',
			'n8': 'Extra-Bold',
			'n9': 'Ultra-Bold'
		},
		i: {
			'i1': 'Ultra-Light Italic',
			'i2': 'Light Italic',
			'i3': 'Book Italic',
			'i4': 'Normal Italic',
			'i5': 'Medium Italic',
			'i6': 'Semi-Bold Italic',
			'i7': 'Bold Italic',
			'i8': 'Extra-Bold Italic',
			'i9': 'Ultra-Bold Italic'
		}
	},
	fontSubsets = {
		'latin': 'Latin',
		'latin-ext': 'Latin Ext',
		'cyrillic': 'Cyrillic',
		'cyrillic-ext': 'Cyrillic Ext',
		'greek': 'Greek',
		'greek-ext': 'Greek Ext',
		'khmer': 'Khmer',
		'khmer-ext': 'Khmer Ext',
		'vietnamese': 'Vietnamese',
		'vietnamese-ext': 'Vietnamese Ext'
	};

$.widget( "juicy.fontfilter", {

	options: {
		jsonUrl: null,
		collapsible: true,
		slantText: 'Slant',
		variantText: 'Variant',
		subsetText: 'Subset',
		serviceText: 'Service',
		slants: fontSlants,
		variants: fontVariants,
		subsets: fontSubsets,
		services: fontServices,
		match: null
	},

	_filters: {
		subsets: {},
		variants: {},
		services: {}
	},

	_create: function()
	{
		var self = this,
			o = this.options;

		++inputName;
		this._bindMatch();
		this._initFontMeta();

		this.element
			.addClass('juicy-fontfilter ui-widget ui-widget-content ui-corner-all');

		this.eSlantSel = $('<div></div>')
			.buttonselect({
				name: 'juicy-fontfilter-slant-' + inputName,
				items: this.options.slants,
				click: function(){
					self._matchAll();
				}
			});

		this.eVariantRange =
			$('<div class="juicy-fontfilter-variant"></div>')
				.appendTo( this.element )
				.slider({
					range: true,
					min: 1,
					max: 9,
					values: [ 3, 7 ],
					stop: function(){
						self._matchAll();
					}
				});
		
		// filter inputs
		this._initFilters();

		this.eSubsetSel = $('<div></div>')
			.buttonselect({
				name: 'juicy-fontfilter-subset-' + inputName,
				items: this._filters.subsets,
				wrapTemplate: '<div></div>',
				click: function(){
					self._matchAll();
				}
			});

		this.eServiceSel = $('<div></div>')
			.buttonselectmulti({
				name: 'juicy-fontfilter-service-' + inputName,
				items: this._filters.services,
				wrapTemplate: '<div></div>',
				click: function(){
					self._matchAll();
				}
			});

		// add opts to DOM
		this.eSlant =
			$('<div></div>')
				.appendTo( this.element )
				.titlebox({
					title: o.slantText,
					content: this.eSlantSel,
					collapsible: o.collapsible
				});
		this.eVariant =
			$('<div></div>')
				.appendTo( this.element )
				.titlebox({
					title: o.variantText,
					content: this.eVariantRange,
					collapsible: o.collapsible
				});
		this.eSubset =
			$('<div></div>')
				.appendTo( this.element )
				.titlebox({
					title: o.subsetText,
					content: this.eSubsetSel,
					collapsible: o.collapsible
				});
		this.eService =
			$('<div></div>')
				.appendTo( this.element )
				.titlebox({
					title: o.serviceText,
					content: this.eServiceSel,
					collapsible: o.collapsible
				});

		this._matchAll();
	},

	_setOption: function( key, value )
	{
		$.Widget.prototype._setOption.apply( this, arguments );

		switch( key ) {
			case 'slantText':
				$('.ui-widget-header > span:first-child', this.eSlant).text(value);
				break;
			case 'variantText':
				$('.ui-widget-header > span:first-child', this.eVariant).text(value);
				break;
			case 'subsetText':
				$('.ui-widget-header > span:first-child', this.eSubset).text(value);
				break;
			case 'serviceText':
				$('.ui-widget-header > span:first-child', this.eService).text(value);
				break;
			case 'match':
				this._bindMatch();
				break;
		}
	},

	destroy: function() {
		$.Widget.prototype.destroy.call( this );
	},

	_bindMatch: function()
	{
		this.element.bind( 'match', this.options.match );
	},

	_initFontMeta: function()
	{
		if (!fontMeta) {
			$.ajax({
				async: false,
				url: this.options.jsonUrl,
				dataType: 'json',
				success: function(json)
				{
					// save result
					fontMeta = json;
				}
			});
		}
	},

	_initFilters: function()
	{
		var self = this,
			slant = $('input:checked', this.eSlantSel).val(),
			min = this.eVariantRange.slider('option', 'min'),
			max = this.eVariantRange.slider('option', 'max');

		this._filters.variants = {};
		this._filters.subsets = {};
		this._filters.services = {};

		for ( var x = min; x <= max; x++ ) {
			var i = slant + x;
			this._filters.variants[i] = this.options.variants[slant][x];
		}
		
		$.each( fontMeta, function( fk, font ){
			// check service
			if ( !(font.service in self._filters.services) ) {
				self._filters.services[font.service] = self.options.services[font.service];
			}
			// loop subsets
			$.each( font.subsets, function( sk ) {
				if ( !(sk in self._filters.subsets) ) {
					self._filters.subsets[sk] = self.options.subsets[sk];
				}
			});
		});

		// @todo remove this debug line
//		self._filters.services['typekit'] = self.options.services['typekit']
	},

	_matchOne: function( needle, keystack )
	{
		var match = false;

		if ( typeof needle == "object" ) {
			$.each( needle, function( key ) {
				if ( key in keystack ) {
					match = true;
					return false;
				}
				return true;
			});
		} else {
			if ( needle in keystack ) {
				match = true;
			}
		}

		return match;
	},
	
	_matchAll: function()
	{
		var self = this,
			slant = $('input:checked', this.eSlantSel).val(),
			range = this.eVariantRange.slider('values'),
			subset = $('input:checked', this.eSubsetSel).val(),
			filters = {
				subsets: {},
				variants: {},
				services: {}
			},
			matches = [];

		// selected subsets
		filters.subsets[subset] =  this.options.subsets[subset];
		
		// selected variants
		for ( var x = range[0]; x <= range[1]; x++ ) {
			var vk = slant + x;
			filters.variants[vk] =  this.options.variants[slant][vk];
		}

		// selected services
		$('input:checked', this.eServiceSel).each(function(){
			var sk = $(this).val();
			filters.services[sk] =  self.options.services[sk];
		});

		$.each( fontMeta, function( fk, font ){
			// match against all filters
			if (
				self._matchOne( font.subsets, filters.subsets ) == true &&
				self._matchOne( font.variants, filters.variants ) == true &&
				self._matchOne( font.service, filters.services ) == true
			) {
				// its a match
				matches.push( font );
			}
		});

		// trigger match event
		this.element.trigger( 'match', [matches,filters] );
	}

});

}( jQuery ) );