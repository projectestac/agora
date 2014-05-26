/**
 * Copyright (C) 2011 Bowe Frankema
 *
 * Contact Information:
 *     bowe@presscrew.com
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
jQuery(document).ready(function($)
{
	// Superfish Settings:
	// http://users.tpg.com.au/j_birch/plugins/superfish/

	// main navigation setup (superfish)
	if( $.fn.superfish ) {
		$('.base-menu ul.sf-menu,.bp-user-nav').superfish({
			delay: 400,
			animation: {opacity:'show', height:'show'},
			speed: 'fast',
			autoArrows: false,
			dropShadows: false,
			onShow: function() {
				$(this).css('overflow','visible');
			}
		});
	}

	// buttons
	$('.comment-reply-link').addClass('button');

	// add a new grid class for register page
	$('.register #content').addClass('column sixteen');

	// initial sidebar height
	infinity_sidebar_height();

	// bump sidebar height after any ajax requests
	$( '#sidebar' )
		.bind( 'ajaxStop', function(){
			infinity_sidebar_height();
		});
});

// make the sidebar and content area the same size
function infinity_sidebar_height()
{
	var height = jQuery('.main-wrap').height();
	jQuery('#sidebar').css( 'min-height', height );
}