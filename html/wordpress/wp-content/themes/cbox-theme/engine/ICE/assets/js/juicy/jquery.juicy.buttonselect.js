/*
 * jUIcy Button Select
 *
 * Depends:
 *	jquery.ui.core.js
 *	jquery.ui.widget.js
 *	jquery.ui.button.js
 */
(function( $ ) {

$.widget( "juicy.buttonselect", {

	options: {
		name: '',
		items: {},
		wrapTemplate: '',
		click: null
	},

	_create: function()
	{
		this.element.addClass( 'juicy-buttonselect' );
		this._appendInputs();
	},

	_setOption: function( key, value )
	{
		$.Widget.prototype._setOption.apply( this, arguments );

		switch( key ) {
			case 'name':
			case 'items':
			case 'wrapTemplate':
				this.refresh();
				break;
		}
	},

	destroy: function()
	{
		this.element
			.removeClass( 'juicy-buttonselect juicy-buttonselect-single' )
			.empty();

		$.Widget.prototype.destroy.call( this );
	},

	/**
	 * settings = {
	 *	type: radio|checkbox
	 *	id: id attribute
	 *	name: name attribute
	 *	value: value attribute
	 *	labelText: label text
	 *	wrap: element to wrap around input
	 *	checked: boolean
	 * }
	 */
	_newInput: function( target, settings )
	{
		var	realTarget,
			input =
				$('<input />')
					.attr( 'type', settings.type )
					.attr( 'id', settings.id )
					.attr( 'name', settings.name )
					.attr( 'value', settings.value ),
			label =
				$('<label></label>')
					.attr( 'for', settings.id )
					.html( settings.labelText );

		if ( settings.checked ) {
			input.attr( 'checked', 'checked' );
		}

		if ( settings.wrap.length ) {
			realTarget = $( settings.wrap ).appendTo( target );
		} else {
			realTarget = target;
		}

		realTarget.append( input, label );

		return input;
	},

	_appendInputs: function()
	{
		var self = this,
			o = this.options,
			checked = true;

		this.element.addClass( 'juicy-buttonselect-single' );

		$.each( o.items, function( key, val ){
			self._newInput(
				self.element,
				{
					type: 'radio',
					id: o.name + '-' + key,
					name: o.name,
					value: key,
					labelText: val,
					wrap: o.wrapTemplate,
					checked: checked
				}
			)
			.button()
			.click( function(){
				self._updButtons();
				o.click();
			});

			checked = false;
		});
		
		self._updButtons();
	},

	_getButtonIcon: function( input )
	{
		if ( input.is(':checked') ) {
			return 'ui-icon-bullet';
		} else {
			return 'ui-icon-radio-off';
		}
	},

	_updButtons: function()
	{
		var self = this;

		$( 'input', this.element )
			.each( function() {
				var input = $(this),
					icon = self._getButtonIcon( input );
				input
					.button( 'refresh' )
					.button( 'option', 'icons', {primary: icon} );
			});
	},

	refresh: function()
	{
		this.element.empty();
		this._appendInputs();
	},

	selectedValue: function( newValue )
	{
		if ( arguments.length ) {
			$( 'input', this.element )
				.each( function(){
					$(this).removeAttr( 'checked' );
					if ( $(this).val() == newValue ) {
						$(this).attr( 'checked', 'checked' );
					}
				});
			this._updButtons();
			return null;
		} else {
			return $( 'input:checked', this.element ).val();
		}
	}

});

$.widget( "juicy.buttonselectmulti", $.juicy.buttonselect, {

	destroy: function()
	{
		this.element.removeClass( 'juicy-buttonselectmulti' );

		$.juicy.buttonselect.destroy.call( this );
	},

	_appendInputs: function()
	{
		var self = this,
			o = this.options;

		this.element.addClass( 'juicy-buttonselectmulti' );

		$.each( o.items, function( key, val ){
			self._newInput(
				self.element,
				{
					type: 'checkbox',
					id: o.name + '-' + key,
					name: o.name,
					value: key,
					labelText: val,
					wrap: o.wrapTemplate,
					checked: true
				}
			)
			.button()
			.click( function() {
				self._updButtons();
				o.click();
			});
		});

		self._updButtons();
	},

	_getButtonIcon: function( input )
	{
		if ( input.is(':checked') ) {
			return 'ui-icon-circle-check';
		} else {
			return 'ui-icon-circle-plus';
		}
	},

	selectedValue: function( newValue )
	{
		if ( arguments.length ) {
			$( 'input', this.element )
				.each( function(){
					$(this).removeAttr( 'checked' );
					if ( $.inArray( $(this).val(), newValue ) != -1 ) {
						$(this).attr( 'checked', 'checked' );
					}
				});
			this._updButtons();
			return null;
		} else {
			var value = [];
			$( 'input:checked', this.element )
				.each( function(){
					value.push( $(this).val() );
				});
			return value;
		}
	}

});

}( jQuery ) );