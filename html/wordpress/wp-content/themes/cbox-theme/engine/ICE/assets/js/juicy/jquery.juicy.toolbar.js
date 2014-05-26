/*
 * jUIcy Toolbar
 *
 * Depends:
 *	jquery.ui.core.js
 *	jquery.ui.widget.js
 *	jquery.ui.button.js
 */
(function( $ ) {

$.widget( "juicy.toolbar", {

//	options: {
//		foo: null
//	},

	_create: function()
	{
		var self = this,
			o = this.options;

		this.element.addClass( 'juicy-toolbar ui-widget-header' );

		this.element
			.children( 'a, input[type=radio], input[type=checkbox]' )
			.each( function () {
				self._makeButton( this );
			});
	},

//	_setOption: function( key, value )
//	{
//		$.Widget.prototype._setOption.apply( this, arguments );
//
//		switch( key ) {
//			case 'foo':
//				// do stuff
//				break;
//		}
//	},

	destroy: function()
	{
		this.element
			.removeClass( 'juicy-toolbar ui-widget-header' )
			.empty();

		$.Widget.prototype.destroy.call( this );
	},

	_makeButton: function( button )
	{
		var $button = $( button );

		if ( !$button.hasClass( 'ui-button' ) ) {
			$button.button();
		}
	},

	addButton: function( button )
	{
		this._makeButton( button );
		this.element.append( button );
	}

});

}( jQuery ) );