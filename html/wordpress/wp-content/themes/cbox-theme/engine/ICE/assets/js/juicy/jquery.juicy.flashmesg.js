/*
 * jUIcy Flash Message
 *
 * Depends:
 *	jquery.ui.core.js
 *	jquery.ui.widget.js
 */
(function( $ ) {

$.widget( "juicy.flashmesg", {

	eDismiss: null,
	eIcon: null,
	eMessage: null,
	ePara: null,
	eWrap: null,
	
	options: {
		dismiss: false,
		dismissDuration: 'fast',
		dismissText: 'Ok',
		icon: 'ui-icon-info',
		messageText: null,
		state: 'ui-state-default',
		set: null
	},

	_create: function()
	{
		var self = this,
			o = this.options;

		this.element.addClass( 'ui-widget juicy-flashmesg' );

		this.eWrap =
			$( '<div class="ui-widget-content ui-corner-all"></div>' )
				.addClass( o.state )
				.appendTo( this.element );

		this.ePara =
			$( '<p></p>' )
				.appendTo( this.eWrap );

		if ( o.messageText ) {
			this._message( o.messageText );
		}

		if ( o.icon ) {
			this._icon( o.icon );
		}

		if ( o.dismiss && o.dismissText ) {
			this._dismiss( o.dismissText );
		}

		if ( o.set ) {
			this[o.set]( o.messageText );
		}
	},

	_setOption: function( key, value )
	{
		switch( key ) {
			case 'dismiss':
				if ( value == false && this.eDismiss ) {
					this.eDismiss.remove();
				}
				break;
			case 'icon':
				if ( this.eIcon ) {
					this.eIcon.removeClass( this.options.icon );
				}
				break;
			case 'state':
				this.eWrap.removeClass( this.options.state );
				break;
		}

		$.Widget.prototype._setOption.apply( this, arguments );

		if ( value ) {
			switch( key ) {
				case 'dismiss':
					this._dismiss( this.options.dismissText );
					break;
				case 'dismissText':
					this._dismiss( value );
					break;
				case 'icon':
					this._icon( value );
					break;
				case 'messageText':
					this._message( value );
					break;
				case 'state':
					this.eWrap.addClass( value );
					break;
			}
		}
	},

	destroy: function()
	{
		this.element
			.removeClass( 'ui-widget juicy-flashmesg' )
			.empty();

		$.Widget.prototype.destroy.call( this );
	},

	_dismiss: function( text )
	{
		var self = this,
			o = this.options;

		if ( this.eDismiss ) {
			this.eDismiss.text( text );
		} else {
			this.eDismiss =
				$( '<button></button>' )
					.text( text )
					.button()
					.click( function( e ) {
						self.element.fadeOut( o.dismissDuration, function(){
							self.element.empty();
						});
						e.preventDefault();
					});
			this.ePara.append( this.eDismiss );
		}
	},

	_icon: function( icon )
	{
		if ( this.eIcon == null ) {
			this.eIcon =
				$( '<span class="ui-icon"></span>' ).prependTo( this.ePara );
		}

		this.eIcon.addClass( icon );
	},
	
	_message: function( msg )
	{
		if ( !this.eMessage ) {
			this.eMessage = $( '<span></span>' ).appendTo( this.ePara );
		}
		
		this.eMessage.html( msg );
	},

	set: function( state, icon, msg )
	{
		this.option( 'state', state );
		this.option( 'icon', icon );
		this.option( 'messageText', msg );
	},

	reset: function()
	{
		this.element.empty();
	},

	notice: function( msg )
	{
		this.set( 'ui-state-highlight', 'ui-icon-info', msg );
	},

	error: function( msg )
	{
		this.set( 'ui-state-error', 'ui-icon-alert', msg );
	},

	loading: function( msg )
	{
		this.set( 'ui-state-default', 'juicy-icon-ajax-loader', msg );
	}

});

}( jQuery ) );