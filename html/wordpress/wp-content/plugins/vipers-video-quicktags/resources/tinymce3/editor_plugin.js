(function() {
	tinymce.create('tinymce.plugins.VipersVideoQuicktags', {
		/**
		 * Initializes the plugin, this will be executed after the plugin has been created.
		 * This call is done before the editor instance has finished it's initialization so use the onInit event
		 * of the editor instance to intercept that event.
		 *
		 * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		 * @param {string} url Absolute URL to where the plugin is located.
		 */
		init : function(ed, url) {
			if ( typeof VVQButtonClick == 'undefined' ) return;

			if ( VVQButtons.youtube ) {
				ed.addButton('vvqYouTube', {
					title  : VVQData['youtube'].title,
					image  : url + '/../../buttons/youtube.png',
					onclick: function () {
						VVQButtonClick('youtube');
					}
				});
			}

			if ( VVQButtons.googlevideo ) {
				ed.addButton('vvqGoogleVideo', {
					title  : VVQData['googlevideo'].title,
					image  : url + '/../../buttons/googlevideo.png',
					onclick: function () {
						VVQButtonClick('googlevideo');
					}
				});
			}

			if ( VVQButtons.dailymotion ) {
				ed.addButton('vvqDailyMotion', {
					title  : VVQData['dailymotion'].title,
					image  : url + '/../../buttons/dailymotion.png',
					onclick: function () {
						VVQButtonClick('dailymotion');
					}
				});
			}

			if ( VVQButtons.vimeo ) {
				ed.addButton('vvqVimeo', {
					title  : VVQData['vimeo'].title,
					image  : url + '/../../buttons/vimeo.png',
					onclick: function () {
						VVQButtonClick('vimeo');
					}
				});
			}

			if ( VVQButtons.veoh ) {
				ed.addButton('vvqVeoh', {
					title  : VVQData['veoh'].title,
					image  : url + '/../../buttons/veoh.png',
					onclick: function () {
						VVQButtonClick('veoh');
					}
				});
			}

			if ( VVQButtons.viddler ) {
				ed.addButton('vvqViddler', {
					title  : VVQData['viddler'].title,
					image  : url + '/../../buttons/viddler.png',
					onclick: function () {
						VVQButtonClick('viddler');
					}
				});
			}

			if ( VVQButtons.metacafe ) {
				ed.addButton('vvqMetacafe', {
					title  : VVQData['metacafe'].title,
					image  : url + '/../../buttons/metacafe.png',
					onclick: function () {
						VVQButtonClick('metacafe');
					}
				});
			}

			if ( VVQButtons.bliptv ) {
				ed.addButton('vvqBlipTV', {
					title  : VVQData['bliptv'].title,
					image  : url + '/../../buttons/bliptv.png',
					onclick: function () {
						VVQButtonClick('bliptv');
					}
				});
			}

			if ( VVQButtons.flickrvideo ) {
				ed.addButton('vvqFlickrVideo', {
					title  : VVQData['flickrvideo'].title,
					image  : url + '/../../buttons/flickrvideo.png',
					onclick: function () {
						VVQButtonClick('flickrvideo');
					}
				});
			}

			if ( VVQButtons.spike ) {
				ed.addButton('vvqSpike', {
					title  : VVQData['spike'].title,
					image  : url + '/../../buttons/spike.png',
					onclick: function () {
						VVQButtonClick('spike');
					}
				});
			}

			if ( VVQButtons.myspace ) {
				ed.addButton('vvqMySpace', {
					title  : VVQData['myspace'].title,
					image  : url + '/../../buttons/myspace.png',
					onclick: function () {
						VVQButtonClick('myspace');
					}
				});
			}

			if ( VVQButtons.flv ) {
				ed.addButton('vvqFLV', {
					title  : VVQData['flv'].title,
					image  : url + '/../../buttons/flv.png',
					onclick: function () {
						VVQButtonClick('flv');
					}
				});
			}

			if ( VVQButtons.quicktime ) {
				ed.addButton('vvqQuicktime', {
					title  : VVQData['quicktime'].title,
					image  : url + '/../../buttons/quicktime.png',
					onclick: function () {
						VVQButtonClick('quicktime');
					}
				});
			}

			if ( VVQButtons.videofile ) {
				ed.addButton('vvqVideoFile', {
					title  : VVQData['videofile'].title,
					image  : url + '/../../buttons/videofile.png',
					onclick: function () {
						VVQButtonClick('videofile');
					}
				});
			}
		},

		/**
		 * Creates control instances based in the incomming name. This method is normally not
		 * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
		 * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
		 * method can be used to create those.
		 *
		 * @param {String} n Name of the control to create.
		 * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
		 * @return {tinymce.ui.Control} New control instance or null if no control was created.
		 */
		createControl : function(n, cm) {
			return null;
		},

		/**
		 * Returns information about the plugin as a name/value array.
		 * The current keys are longname, author, authorurl, infourl and version.
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
		getInfo : function() {
			return {
				longname : "Viper's Video Quicktags",
				author : 'Viper007Bond',
				authorurl : 'http://www.viper007bond.com/',
				infourl : 'http://www.viper007bond.com/wordpress-plugins/vipers-video-quicktags/',
				version : "6.0"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('vipersvideoquicktags', tinymce.plugins.VipersVideoQuicktags);
})();