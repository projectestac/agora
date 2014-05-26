
(function($){

var response = null;

$.widget( 'infinity.cpaneltabs', $.juicy.browsertabs, {

	options: {
		ajaxOptions: {
			data: { 'action': 'infinity_tabs_content' },
			beforeSend: function ( xhr, settings ) {
				response = null;
			},
			dataFilter: function ( data, type ) {
				response = iceEasyAjax.splitResponseStd( data );
				return response.content;
			}
		},
		cache: true,
		cookie: {name: 'cpanel_current_tab', expires: 7},
		cookieScroll: {name: 'cpanel_scroll', expires: 7},
		cookieTabs: {name: 'cpanel_open_tabs', expires: 7},
		sortable: true,
		// events
		load: function( event, ui ) {
			if ( response ) {
				if ( response.code >= 1 ) {
					initOptionsPanel( ui.panel );
					initDocuments( ui.panel );
				} else {
					// set up flash message
					$('<div></div>')
						.prependTo( ui.panel )
						.flashmesg({
							dismiss: true,
							set: 'error',
							messageText: response.message
						})
						.fadeIn();
					return;
				}
			}
		}
	}
});

})(jQuery)

// init all options
function initOptions(panel)
{
	var $ = jQuery;

	// call ice helper
	$(panel).iceEasyOptions( 'init', 'infinity_options_update' );

	// create tabs
	$('div.infinity-cpanel-options-single', panel).each(function(){
		$(this).tabs().css('float', 'left');
	});
}

// init options panel
function initOptionsPanel(panel)
{
	var $ = jQuery,
		useCookies = ( typeof $.cookie !== "undefined" );

	// full options panel?
	if ( !$('div#infinity-cpanel-options', panel).length ) {
		// no, just init options and quit
		initOptions(panel);
		return;
	}

	// the option form
	var form = $('div#infinity-cpanel-options form', panel).empty(),
	// the menu(s)
		menu = $('div.infinity-cpanel-options-menu', panel),
	// last option loaded
		last = null;

	// try for last option cookie
	if ( useCookies ) {
		last = $.cookie('infinity_cpanel_option_loaded');
	}
	
	// setup accordion menu
	menu.accordion({
		autoHeight: false,
		collapsible: true,
		clearStyle: true,
		icons: {
			header: 'ui-icon-folder-collapsed',
			headerSelected: 'ui-icon-folder-open'
		},
		change: function(event, ui) {
			if ( useCookies ) {
				var states = [];
				menu.each(function(){
					var state = [
						$(this).attr('id'),
						$(this).accordion('option', 'active')
					];
					states.push(state.join(','));
				});
				$.cookie('infinity_cpanel_option_menu_states', states.join('|'), {expires: 7});
			}
		}
	});

	// show all options for section
	$('a.infinity-cpanel-options-menu-showall', panel).button().click(function(){
		return false;
	});

	// cpanel options page menu item clicks
	$('div.infinity-cpanel-options-menu a.infinity-cpanel-options-menu-show', panel).bind('click',
		function(){
			loadOption($(this).attr('id'), panel);
			return false;
		}
	);

	// bind reset handler
	$('div.infinity-cpanel-options-single', panel).live( 'iceEasyOptionsPost', function( e, state, name, reset ){
		if ( reset ) {
			initOptionsPanel( panel );
		}
	});

	// populate form if empty
	if (form.children().length < 1 && last) {
		// init vars
		var om_states = null;
		// get states from cookie
		if ( useCookies) {
			om_states = $.cookie('infinity_cpanel_option_menu_states');
		}
		// get the cookie?
		if (om_states != null) {
			// split at pipe
			om_states = om_states.split('|');
			// activate menus that were open
			if (om_states.length) {
				var om_state_idx, om_state_cur, om_state_menu, om_state_act, om_state_new;
				for (om_state_idx in om_states) {
					om_state_cur = om_states[om_state_idx].split(',');
					om_state_menu = $('#' + om_state_cur[0]);
					om_state_act = om_state_menu.accordion('option', 'active');
					om_state_new = ('false' == om_state_cur[1]) ? false : Number(om_state_cur[1]);
					if (om_state_act !== om_state_new) {
						om_state_menu.accordion('activate', om_state_new);
					}
				}
			}
		}
		// load last option
		loadOption(last, panel);
	}

	// load option screen
	function loadOption(id, panel)
	{
		// what to load?
		var load = id.split('___');

		// message element
		var message =
			$('div#infinity-cpanel-options-flash', panel)
				.iceEasyFlash('loading', 'Loading option editor.')
				.fadeIn();
		// empty the form
		form.empty();
		// send request for option screen
		$.post(
			iceEasyGlobalL10n.ajax_url,
			{
				'action': 'infinity_options_screen',
				'load_section': load[1],
				'load_option': (load[3]) ? load[3] : ''
			},
			function(r) {
				var sr = iceEasyAjax.splitResponseStd(r);
				if (sr.code >= 1) {
					// maybe save as last option screen
					if ( useCookies ) {
						$.cookie('infinity_cpanel_option_loaded', id, {expires: 7});
					}
					// inject options markup
					form.html(sr.content);
					// init docs and options
					initDocuments(panel);
					initOptions(panel);
					// remove message
					message.fadeOut().empty();
				} else {
					// error
					message.fadeOut(300, function(){
						message.iceEasyFlash('error', sr.message).fadeIn();
					})
				}
			}
		);
	}
}
