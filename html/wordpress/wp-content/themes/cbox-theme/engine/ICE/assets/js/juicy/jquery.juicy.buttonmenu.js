/*
 * jUIcy Button Menu
 *
 * Depends:
 *	jquery.ui.core.js
 *	jquery.ui.widget.js
 *	jquery.ui.menu.js
 */
(function( $ ) {

$.widget( "juicy.buttonmenu", $.ui.menu, {

	options: {
		autoOpen: false,
		button: null
	},

	_create: function()
	{
		// call parent constructor
		$.ui.menu.prototype._create.call( this );

		var self = this,
			o = this.options,
			subMenus;

		this.element
			.addClass( 'juicy-buttonmenu' )

		// handle auto open option
		if ( o.autoOpen == false ) {
			this.element.hide();
		}

		// handle button
		if ( o.button ) {
			this._button( o.button );
			o.button = null;
		}

		// locate submenus
		subMenus = this.element
			.children( 'li' )
			.children( 'ul' );

		// init sub menus
		subMenus
			.buttonmenu( o )
			.hide();

		// bind anchor clicks
		this.element
			.children( 'li' )
			.find( '> a' )
			.click(function( e ) {
				// look for sub menu
				var menu = $(this).siblings( '.ui-menu' ).first();
				// hide other menus
				subMenus.not( menu ).hide();
				// any sub menus?
				if ( menu.length ) {
					// is it a re-click?
					if ( menu.is( ':visible' ) ) {
						menu.hide();
					} else {
						// display me
						menu.show()
							.css({'top': 0, 'left': 0})
							.position({
								my: "left top",
								at: "right top",
								offset: "5 -5",
								collision: "fit none",
								of: this
							});
					}
					e.stopPropagation();
				}
				e.preventDefault();
			});
	},

	_setOption: function( key, value )
	{
		$.Widget.prototype._setOption.apply( this, arguments );

		switch( key ) {
			case 'autoOpen':
				break;
			case 'button':
				this._button( value );
				break;
		}
	},

	destroy: function()
	{
		this.element
			.removeClass( 'juicy-buttonmenu' );

		$.Widget.prototype.destroy.call( this );
	},

	_button: function( button )
	{
		var self = this;

		button.click( function( e ) {
			self.show();
			e.preventDefault();
		});
	},

	show: function()
	{
		var self = this;

		// show me
		this.element.show( 'fast', function() {
			// hide me on doc click
			$(document).one( 'click', function() {
				self.element.hide();
			});
			// trigger show event
			self._trigger( 'show', null, {item: self.element} );
		});
	}

});

}( jQuery ) );