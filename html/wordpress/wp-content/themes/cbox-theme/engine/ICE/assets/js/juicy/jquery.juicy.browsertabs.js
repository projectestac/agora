/*
 * jUIcy Browser Tabs
 *
 * Depends:
 *	jquery.ui.core.js
 *	jquery.ui.widget.js
 *	jquery.ui.tabs.js
 */
(function( $ ) {

// split tabs version at dots
var vSplit = $.ui.tabs.version.split('.');

$.widget( 'juicy.browsertabs', $.ui.tabs, {

	eRefresh: null,
	eScroll: null,
	selectedIndex: 0,
	options: {
		availableTabs: {start: 'Start'},
		closeable: true,
		closeableIcon: 'ui-icon-close',
		cookieScroll: null,
		cookieTabs: null,
		defaultAnchor: null,
		refreshButton: null,
		scrollButton: null,
		sortable: false,
		toolbar: null,
		// events
		scroll: null
	},
	useCookies: ( typeof $.cookie !== "undefined" ),
	lte_1_8: ( vSplit[0] <= 1 && vSplit[1] <= 8 ),

	_create: function()
	{
		// cache selected tab for use on init
		if ( this.options.cookie ) {
			if ( this.useCookies ) {
				this.selectedIndex = this._cookie();
			} else {
				this.options.cookie = null;
			}
		}

		if ( isNaN( this.selectedIndex ) || this.selectedIndex < 0 ) {
			this.selectedIndex = 0;
		}

		// call parent constructor
		$.ui.tabs.prototype._create.call( this );

		// now handle extended creation steps
		var self = this,
			o = this.options;
		
		// add my class
		this.element.addClass( 'juicy-browsertabs' );
		
		// handle refresh button
		if ( o.refreshButton ) {
			this._refreshButton( o.refreshButton );
		}

		// handle scroll button
		if ( o.scrollButton ) {
			this._scrollButton( o.scrollButton );
		}

		// handle sortable nav
		if ( o.sortable ) {
			this._sortable( o.sortable );
		}

		// handle toolbar
		if ( o.toolbar ) {
			this._toolbar( o.toolbar );
		}

		// bind events
		this.element
			.bind( this.widgetName + 'select', function( event, ui ) {
				// update refresh
				if ( self.eRefresh ) {
					var href = $.data( ui.tab, 'load.tabs' ),
						target = self._identTab( $( ui.tab ) );
					self._refreshTouch( href, target );
				}
			})
			.bind( this.widgetName + 'select', function( event, ui ) {
				// init scroll
				self._initScroll( ui.panel );
			})
			.bind( this.widgetName + 'remove', function( event, ui ){
				self._cookieTabs( 'update' );
			});

		// load saved tabs
		if ( o.disable != true ) {
			this._initTabs();
		}
	},

	_setOption: function( key, value )
	{
		$.ui.tabs.prototype._setOption.apply( this, arguments );

		switch ( key ) {
			case 'disable':
				if ( value == false && !this.anchors.length ) {
					this._initTabs();
				}
		}

		if ( value ) {
			switch( key ) {
				case 'refreshButton':
					this._refreshButton( value );
					break;
				case 'scrollButton':
					this._scrollButton( value );
					break;
				case 'sortable':
					this._sortable( value );
					break;
				case 'toolbar':
					this._toolbar( value );
					break;
			}
		}
	},

	destroy: function()
	{
		this.element
			.removeClass( 'juicy-browsertabs' );

		$.Widget.prototype.destroy.call( this );
	},

	_refreshButton: function( button )
	{
		var self = this,
			o = this.options;

		this.eRefresh = $( button );
		
		this.eRefresh
			.click( function( e ) {
				e.preventDefault();
				$( self.panels[ o.selected ] ).empty();
				self.loadTab( this, true );
			});
	},

	_refreshTouch: function( href, target )
	{
		if ( this.eRefresh ) {
			this.eRefresh
				.attr( 'href', href )
				.attr( 'target', target );
		}
	},

	_scrollButton: function( button )
	{
		var self = this;

		this.eScroll = $( button );

		this.eScroll
			.click( function( event ) {
				var checked = $( event.target ).attr( 'checked' );
				self.toggleScroll( ( checked == 'checked' ) );
			});
	},
	
	_sortable: function ( setting )
	{
		var options = {
			cursor: 'move',
			containment: 'parent'
		};

		if ( typeof setting == 'boolean' ) {
			if ( setting == false ) {
				options = 'destroy';
			}
		} else {
			$.extend( options, setting );
		}

		this.element
			.find( '> .ui-tabs-nav' )
			.sortable( options );
	},

	_toolbar: function( toolbar )
	{
		var self = this;

		toolbar
			.find( 'a' )
			.click( function( e ) {
				var $a = $( this );
				if ( $a.attr( 'href' ) && self._identTab( $(this) ) ) {
					self.loadTab( this, true );
					e.preventDefault();
				}
			});
	},

	_getTabKey: function( string )
	{
		return string.replace( this.options.idPrefix, '' );
	},

	_identTab: function ( anchor )
	{
		var o = this.options,
			$a = $( anchor ),
			target = $a.attr( 'target' ),
			hash = $a.prop( 'hash' );

		if ( !target ) {
			target = $( this.panels[ o.selected ] ).attr( 'id' );
		}

		if ( (target) && this._getTabKey( target ) in o.availableTabs ) {
			return target;
		} else {
			return false;
		}
	},

	_catchAnchor: function( anchor )
	{
		var $a = $( anchor );

		if ( $a.attr( 'href' ) ) {
			if ( this._identTab( $a ) ) {
				this.loadTab( $a, true );
			} else {
				window.open( $a.attr('href'), $a.attr('target') );
			}
		}
	},

	loadTab: function ( anchor, selected )
	{
		var o = this.options,
			$a = $( anchor ),
			href = $a.attr( 'href' ),
			target = $a.attr( 'target' ),
			index;

		if ( arguments.length < 2 ) {
			selected = -1;
		}
		
		if ( target ) {
			index = this._getIndex( target );
		} else {
			index = this.options.selected;
		}

		if ( index in this.anchors ) {
			// panel exists
			this.select( index );
			this.url( index, href );
			this.load( index );
		} else {
			// the title
			var title = o.availableTabs[ this._getTabKey( target ) ];
			// find a title?
			if ( title && title.length ) {
				// create new panel
				this.add( '#' + target, title );
				// get index for new tab
				index = this._getIndex( target );
				// update url
				this.url( index, href + '#' + target );
				// select and load it?
				if ( selected === true || ( selected >= 0 && selected == index ) ) {
					this.select( index );
					if ( this.lte_1_8 ) this.load( index );
				}
				// save open taps
				this._cookieTabs( 'update' );
			} else {
				// not good
				alert('A tab for ' + target + 'does not exist');
			}
		}

		this._initScroll( this.panels[ index ] );
		this._refreshTouch( href, target );

		return this;
	},

	// manage current scroll setting cookie
	// valid commands: boolean or 'get' or 'clear'
	_cookieScroll: function ( command )
	{
		if ( this.options.cookieScroll == null || this.useCookies == false ) {
			return false;
		}

		var self = this,
			o = this.options;

		switch ( command ) {
			case true:
			case false:
				// update cookie
				$.cookie( o.cookieScroll.name, Number( command ), o.cookieScroll );
				return true;

			case 'get':
				// grab and parse cookie
				return parseInt( $.cookie( o.cookieScroll.name ) );

			case 'clear':
				// clear cookie
				$.cookie( o.cookieScroll.name, '', {expires: -1} );
				return true;
		}

		return false;
	},

	// manage currently open tabs in a cookie
	// valid commands: 'get', 'update', 'clear'
	_cookieTabs: function ( command )
	{
		if ( this.options.cookieTabs == null || this.useCookies == false ) {
			return false;
		}
		
		var self = this,
			o = this.options;

		switch ( command ) {
			case 'get':
				// grab and parse cookie
				var cookie = $.cookie( o.cookieTabs.name ),
					tabsRaw = ( cookie ) ? cookie.split( ',' ) : [],
					tabs = [];
				// loop all tabs and decode
				$.each( tabsRaw, function( key, val ) {
					var parts = val.split(':');
					tabs.push({
						target: parts[0],
						url: decodeURIComponent( parts[1] )
					});
				});
				return tabs;

			case 'update':
				var loopUrl, tabsSave = [];
				// loop all tabs and encode
				$.each( this.anchors, function( key, val ) {
					// how we get the URL depends on UI version
					if ( self.lte_1_8 ) {
						loopUrl = $.data( val, 'load.tabs' );
					} else {
						loopUrl = $( val ).attr( 'href' ).replace( /#.*$/, '' );
					}
					// push on to tabs to save array
					tabsSave.push(
						$( val ).prop( 'hash' ).substring(1) + ':' +
						encodeURIComponent( loopUrl )
					);
				});
				// update cookie
				$.cookie( o.cookieTabs.name, tabsSave.join( ',' ), o.cookieTabs );
				return true;

			case 'clear':
				// clear cookie
				$.cookie( o.cookieTabs.name, '', {expires: -1} );
				return true;
		}
		
		return false;
	},

	_initScroll: function ( panel )
	{
		this.toggleScroll( this._cookieScroll( 'get' ), panel );
	},
	
	_initTabs: function ()
	{
		var self = this,
			o = this.options,
			tabs = this._cookieTabs( 'get' );

		if ( tabs.length ) {
			$.each( tabs, function( key, val ) {
				var anchor = $('<a></a>')
					.attr( 'target', val.target )
					.attr( 'href', val.url );
				self.loadTab( anchor, self.selectedIndex );
			});
		} else if ( o.defaultAnchor ) {
			this.loadTab( $( o.defaultAnchor ), true );
		}
	},

	add: function( url, label, index )
	{
		$.ui.tabs.prototype.add.apply( this, arguments );

		if ( index === undefined ) {
			index = this.anchors.length - 1;
		}

		var self = this,
			o = this.options,
			anchor = $( this.anchors[index] ),
			panel = $( this.panels[index] );

		// bind close tab click
		if ( o.closeable == true ) {
			var closer =
				$( '<span class="ui-icon ' + o.closeableIcon + '"></span>' )
					.click( function() {
						self.remove( index );
						return false;
					});
			anchor.after( closer );
		}

		// bind child anchor click
		$( 'a', panel )
			.live( 'click', function( e ) {
				e.preventDefault();
				self._catchAnchor( this );
			});

		return this;
	},

	toggleScroll: function ( toggle, panel )
	{
		var index,
			o = this.options,
			$panel = $( panel );

		if ( !$panel.length ) {
			$panel = this.element.find('.ui-tabs-panel:visible');
		}

		$panel.toggleClass( 'juicy-scroll', toggle );

		index = this._getIndex( $panel.attr( 'id' ) );

		if ( toggle ) {
			// calc heights
			var tp_ot = $panel.offset().top,
				tp_hc = ( $(window).height() - tp_ot );
			// update height
			$panel
				.css( {'height': tp_hc } )
				.addClass( 'juicy-scroll' );
		} else {
			// kill height
			$panel
				.height( 'auto' )
				.removeClass( 'juicy-scroll' );
		}

		// update button
		if ( this.eScroll ) {
			if ( toggle ) {
				this.eScroll.attr( 'checked', 'checked' );
			} else {
				this.eScroll.removeAttr( 'checked' );
			}
			this.eScroll.button( 'refresh' );
		}

		this._cookieScroll( toggle );
		
		this._trigger( 'scroll', null, this._ui( this.anchors[ index ], this.panels[ index ] ) );
	}

});

}( jQuery ) );