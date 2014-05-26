/*
 * jUIcy Title Box
 *
 * Depends:
 *	jquery.ui.core.js
 *	jquery.ui.widget.js
 */
(function( $ ) {

$.widget( "juicy.titlebox", {

	options: {
		autoOpen: true,
		collapsible: false,
		content: null,
		title: null
	},

	_create: function()
	{
		var self = this,
			o = this.options;

		this.element.addClass( 'juicy-titlebox' );

		this.eHeader =
			$('<div class="ui-widget-header ui-corner-top"></div>')
				.append( '<span>' + o.title + '</span>' )
				.appendTo( this.element );

		this.eBody =
			$('<div class="ui-widget-content ui-corner-bottom"></div>')
				.append( $(o.content) )
				.appendTo( this.element );

		// handle collapsing
		if ( o.collapsible ) {
			var initIcon = ( o.autoOpen ) ? 'ui-icon-triangle-1-n' : 'ui-icon-triangle-1-s';

			this.eHeader
				.append( '<div class="ui-icon ' + initIcon + '"></div>' )
				.click( function() {
					var self = $(this),
						icon = $('.ui-icon', this);
					$(this)
						.next()
						.slideToggle( 'fast', function(){
							self.toggleClass( 'ui-corner-top ui-corner-all' );
							icon.toggleClass( 'ui-icon-triangle-1-n ui-icon-triangle-1-s' );
						});
				});

			if ( o.autoOpen != true ) {
				this.eHeader.click();
			}
		}
	},

	_setOption: function( key, value )
	{
		$.Widget.prototype._setOption.apply( this, arguments );

		switch( key ) {
			case 'title':
				$('> span', this.eHeader).text(value);
				break;
			case 'content':
				this.eBody.empty().append($(value));
				break;
			case 'collapsible':
				if ( value == false ) {
					this.eBody.hide();
				}
				break;
		}
	},

	destroy: function()
	{
		this.element
			.removeClass( 'juicy-titlebox' );

		$.Widget.prototype.destroy.call( this );
	}

});

}( jQuery ) );