/**
 * Copyright (C) 2010-2011 Marshall Sorenson
 *
 * Contact Information:
 *     marshall@presscrew.com
 *     http://infinity.presscrew.com/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

/* flash messaging helper */
(function($){

	var methods = {
		find: function()
		{
			return $('.ice-flash', this);
		},
		set: function(state, icon, msg)
		{
			return this.each(function(){
				// maintain chain
				var $this = $(this);
				// create msg
				$(this).html(
					'<div class="ui-widget ice-flash">' +
					'<div class="ui-state-' + state + ' ui-corner-all">' +
					'<p><span class="ui-icon ui-icon-' + icon + '"></span>' + msg + '</p>' +
					'</div></div>'
				);
				// add dismiss button
				if (state != 'default') {
					$(this).find('p').append('<button>Dismiss</button>');
					$(this).find('button').button().click(function(){
						$this.fadeOut(300, function(){
							$this.empty();
						});
						return false;
					});
				}
			});
		},
		reset: function()
		{
			return this.each(function(){
				$(this).empty();
			});
		},
		alert: function(msg)
		{
			return this.each(function(){
				$(this).iceEasyFlash('set', 'highlight', 'info', msg);
			});
		},
		error: function(msg)
		{
			return this.each(function(){
				$(this).iceEasyFlash('set', 'error', 'alert', msg);
			});
		},
		loading: function(msg)
		{
			return this.each(function(){
				$(this).iceEasyFlash('set', 'default', 'ajax-loader', msg);
			});
		}
	}

	$.fn.iceEasyFlash = function (method)
	{
		if ( methods[method] ) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || ! method) {
			return methods.init.apply(this, arguments);
		} else {
			return $.error('Method ' +  method + ' does not exist on jQuery.iceEasyFlash');
		}
	}
})(jQuery);

/* options helper */
(function($){

	var methods = {

		init: function(action)
		{
			return this.each(function(){
				$('div.ice-options-block', this).iceEasyOptions('initBlock', action);
			});
		},
		
		initBlock: function(action)
		{
			// maintain chain
			return this.each(function(){

				var $option = $(this),
					$form = $option.closest('form');

				// save all button
				$('a.ice-options-save-all', $option)
					.button({icons: {primary: "ui-icon-arrowthick-2-n-s"}});
					
				// save one button
				$('a.ice-options-save-one', $option)
					.button({icons: {primary: "ui-icon-arrowthick-1-e"}});

				// reset one button
				$('a.ice-options-reset-one', $option)
					.button({icons: {primary: "ui-icon-arrowreturnthick-1-w"}});
				
				// save buttons click
				$('a.ice-options-save', $option).click( function( e ){

					// get option from href
					var opt_name = $(this).prop('hash').substr(1),
						opt_reset = $(this).hasClass( 'ice-options-reset-one' );

					if ( opt_reset ) {
						var r = confirm( 'You will lose any unsaved changes to *other* options on this screen, continue?' );
						if ( r == false ) {
							e.preventDefault();
							e.stopImmediatePropagation();
							return;
						}
					}

					// form data
					var data =
						'action=' + action +
						'&option_names=' + opt_name +
						'&option_reset=' + new Number( opt_reset ) +
						'&' + $form.serialize()

					// message element
					var message = $('div.ice-options-mesg', $option);

					// set loading message
					message.iceEasyFlash('loading', 'Saving changes.');

					// show loading message and exec post
					message.fadeIn(300, function(){
						// send request for option save
						$.post(
							iceEasyGlobalL10n.ajax_url,
							data,
							function(r) {
								var sr = iceEasyAjax.splitResponseStd(r);
									// flash them ;)
									message.fadeOut(300, function() {
										var state = (sr.code >= 1) ? 'alert' : 'error';
										$option.trigger( 'iceEasyOptionsPost', [ state, opt_name, opt_reset ] );
										var msg = $(this).iceEasyFlash(state, sr.message).fadeIn();
										if ( 'alert' == state ) {
											msg.fadeOut(3000);
										}
									});
							});
					});

					e.preventDefault();
					e.stopPropagation();
				});
			});
		}
	}

	$.fn.iceEasyOptions = function (method)
	{
		if ( methods[method] ) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || ! method) {
			return methods.init.apply(this, arguments);
		} else {
			return $.error('Method ' +  method + ' does not exist on jQuery.iceEasyOptions');
		}
	}
})(jQuery);

/* AJAX helpers */
iceEasyAjax = {
	splitResponse: function (str)
	{
		return str.split('[[[s]]]');
	},
	splitResponseStd: function (str)
	{
		var sr = this.splitResponse(str);
		return {
			code: sr[0],
			message: sr[1],
			content: sr[2]
		}
	},
	splitDash: function(str, pos)
	{
		var split = str.split('-');

		if (split.length) {
			if (isNaN(pos)) {
				return split;
			} else if (pos < 0) {
				pos = pos + split.length;
			}
			if (pos in split) {
				return split[pos];
			}
		}

		return null;
	},
	queryParam: function(p, s)
	{
		var i, q = s.split('?').pop().split('#').shift().split('&');

		for (i in q) {
			var pv = q[i].split('=');
			if (pv[0] == p) {
				return pv[1];
			}
		}

		return null;
	}
};
