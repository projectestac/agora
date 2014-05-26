(function($)
{
	// all instances share dialog vars to there is
	// only ever one instance of each at a time
	var _muDialog,
		_zoomDialog;

	// the plugin!
	$.fn.icextOptionUploader = function (method)
	{
		var $base = this,
			settings = {
				ibarSelector: '',
				imageSelector: '',
				inputSelector: '',
				defImage: { value: null, url: '' },
				noImage: { value: null, url: '' },
				muOptions: {
					autoOpen: false,
					modal: true,
					height: 600,
					width: 700,
					minHeight: 600,
					minWidth: 700
				},
				zoomOptions: {
					autoOpen: false,
					modal: true,
					height: 600,
					width: 800
				}
			};

		var _btnLibrary,
			_btnTrash,
			_btnUpload,
			_btnZoom,
			_chkDisable,
			_controls,
			_image,
			_input,
			_notifyOnce;

		var initControls = function()
		{
			// select elements
			_controls = $( settings.ibarSelector, $base );
			_btnUpload = _controls.children().eq(0);
			_btnLibrary = _controls.children().eq(1);
			_btnZoom = _controls.children().eq(2);
			_btnTrash = _controls.children().eq(3);
			_chkDisable = $( 'div.ice-do-disable input', $base );
			_image = $( settings.imageSelector, $base );
			_input = $( settings.inputSelector, $base );

			// init upload button
			_btnUpload.button({
				icons: {
					primary: "ui-icon-circle-arrow-n"
				}
			}).click(function(e){
				methods.muOpen( 'type' );
				e.preventDefault();
			}).show();

			// init library button
			_btnLibrary.button({
				icons: {
					primary: "ui-icon-folder-open"
				}
			}).click(function(e){
				methods.muOpen( 'library' );
				e.preventDefault();
			}).show();

			// init zoom button
			_btnZoom.button({
				icons: {
					primary: "ui-icon-zoomin"
				}
			}).click(function(e){
				methods.zoomOpen();
				e.preventDefault();
			}).show();

			// init rem button
			_btnTrash.button({
				icons: {
					primary: "ui-icon-trash"
				}
			}).click(function(e){
				updateImage( settings.defImage.value );
				e.preventDefault();
			});

			// init disabled checked status
			if ( settings.noImage.value == _input.val() ) {
				// check it
				_chkDisable.attr( 'checked', 'checked' );
				// set no image graphic
				_image.attr( 'src', settings.noImage.url );
			}
			
			// init disable click event
			_chkDisable.click( function() {
				// was it checked?
				if ( 'checked' == $(this).attr( 'checked' ) ) {
					// maybe save previous value
					if ( _input.val() !== settings.noImage.value ) {
						_input.data( 'last', _input.val() );
					}
					// set no image value
					updateImage( settings.noImage.value );
				} else {
					// get last value
					var lastVal = _input.data( 'last' );
					// revert to previous value
					if ( lastVal ) {
						updateImage( lastVal );
					} else {
						updateImage( null );
					}
				}
			});
			
			// display trash on load?
			toggleTrash();
		}

		var toggleTrash = function()
		{
			// get current attach id
			var attachId = parseInt( _input.val() );

			// is attach id a "non trashable" value?
			if ( isNaN( attachId ) || settings.noImage.value == attachId ) {
				// yes, fade it out
				_btnTrash.fadeOut( 500 );
			} else {
				// no, fade it in
				_btnTrash.fadeIn( 500 );
			}
		};

		var updateImage = function( attachId )
		{
			_input.val( attachId );

			if ( settings.noImage.value === attachId ) {

				// set no image graphic
				_image.fadeOut(500, function(){
					$(this).attr( 'src', settings.noImage.url )
						.fadeIn(500, function(){
							notifySave();
						});
				});

			} else if ( !attachId || settings.defImage.value === attachId ) {

				// use def url if configured
				_image.fadeOut(500, function(){
					if ( settings.defImage.url ) {
						_image.attr( 'src', settings.defImage.url )
							.fadeIn(500, function(){
								notifySave();
							});
					} else {
						_image.attr( 'src', '' );
						notifySave();
					}
				});

			} else {

				_image.fadeTo( 500, 0.3, function(){

					$.ajax({
						type: 'POST',
						url: iceEasyGlobalL10n.ajax_url,
						data: {
							'action': 'ice_options_uploader_media_url',
							'attachment_id': attachId,
							'attachment_size': 'full'
						},
						success: function(rs){
							var r = iceEasyAjax.splitResponse(rs);
							// TODO error handling
							_image
								.attr( 'src', r[1] )
								.fadeTo( 500, 1, function(){
									_chkDisable.removeAttr( 'checked' );
									notifySave();
								});
						}
					});

				});

			}

			// toggle the trash
			toggleTrash();
		};

		var notifySave = function()
		{
			if ( !_notifyOnce ) {
				alert( 'You must save this setting if you want any changes to become permanent.' );
				_notifyOnce = true;
			}
		};

		var methods = {

			init: function( options )
			{
				// merge options
				$.extend( true, settings, options );

				// kill existing mu dialog
				if ( _muDialog ) {
					_muDialog.dialog('destroy').remove();
				}

				// kill existing zoom dialog
				if ( _zoomDialog ) {
					_zoomDialog.dialog('destroy').remove();
				}

				// init controls
				initControls();
			},

			muOpen: function( tab )
			{
				_muDialog = $('<div class="icextOptionUploadWin"><iframe></iframe></div>').appendTo('body');
				_muDialog.dialog( settings.muOptions );
				_muDialog.dialog({
					close: function(){
						var iframe = $( 'iframe', this ),
							iframeWin = iframe.prop( 'contentWindow' ) || iframe.prop( 'contentDocument' );
						updateImage( iframeWin.icextOptionUploadAttachmentId );
						iframe.attr( 'src', '' );
						_muDialog.dialog('destroy').remove();
					}
				});
				_muDialog.dialog('open');
				$( 'iframe', _muDialog )
					.attr( 'src', 'media-upload.php?post_id=0&icext_option_upload=1&tab=' + tab );
			},

			zoomOpen: function()
			{
				_zoomDialog = $('<div></div>').appendTo('body');
				_zoomDialog.dialog( settings.zoomOptions );
				_zoomDialog.dialog({
					close: function(){
						_zoomDialog.dialog('destroy').remove();
					}
				});

				_image.clone().appendTo( _zoomDialog );
				
				_zoomDialog.dialog('open');
			}
		}
		
		if ( methods[method] ) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || ! method) {
			return methods.init.apply(this, arguments);
		} else {
			return $.error('Method ' +  method + ' does not exist on jQuery.icextOptionUploader');
		}
	}

}(jQuery));
