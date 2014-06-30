/*global tinymce:true */

tinymce.PluginManager.add('wptadv', function( editor ) {

	editor.on( 'init', function() {
		editor.formatter.register({
			valigntop: [{selector: 'td,th', styles: {'verticalAlign': 'top'}}],
			valignmiddle: [{selector: 'td,th', styles: {'verticalAlign': 'middle'}}],
			valignbottom: [{selector: 'td,th', styles: {'verticalAlign': 'bottom'}}]
		});

		if ( ! editor.settings.wpautop && editor.settings.tadv_noautop ) {
			editor.on( 'SaveContent', function( event ) {
				var regex = [
					new RegExp('https?://(www\.)?youtube\.com/watch.*', 'i'),
					new RegExp('http://youtu.be/*'),
					new RegExp('http://blip.tv/*'),
					new RegExp('https?://(www\.)?vimeo\.com/.*', 'i'),
					new RegExp('https?://(www\.)?dailymotion\.com/.*', 'i'),
					new RegExp('http://dai.ly/*'),
					new RegExp('https?://(www\.)?flickr\.com/.*', 'i'),
					new RegExp('http://flic.kr/*'),
					new RegExp('https?://(.+\.)?smugmug\.com/.*', 'i'),
					new RegExp('https?://(www\.)?hulu\.com/watch/.*', 'i'),
					new RegExp('https?://(www\.)?viddler\.com/.*', 'i'),
					new RegExp('http://qik.com/*'),
					new RegExp('http://revision3.com/*'),
					new RegExp('http://i*.photobucket.com/albums/*'),
					new RegExp('http://gi*.photobucket.com/groups/*'),
					new RegExp('https?://(www\.)?scribd\.com/.*', 'i'),
					new RegExp('http://wordpress.tv/*'),
					new RegExp('https?://(.+\.)?polldaddy\.com/.*', 'i'),
					new RegExp('https?://(www\.)?funnyordie\.com/videos/.*', 'i'),
					new RegExp('https?://(www\.)?twitter\.com/.+?/status(es)?/.*', 'i'),
					new RegExp('https?://(www\.)?soundcloud\.com/.*', 'i'),
					new RegExp('https?://(www\.)?slideshare\.net/*', 'i'),
					new RegExp('http://instagr(\.am|am\.com)/p/.*', 'i'),
					new RegExp('https?://(www\.)?rdio\.com/.*', 'i'),
					new RegExp('https?://rd\.io/x/.*', 'i'),
					new RegExp('https?://(open|play)\.spotify\.com/.*', 'i')
				];

				event.content = event.content.replace( /<p>(https?:\/\/[^<> "]+?)<\/p>/ig, function( all, match ) {
					for( var i in regex ) {
						if ( regex[i].test( match ) ) {
							return '\n' + match + '\n';
						}
					}
					return all;
				})
				.replace( /caption\]\[caption/g, 'caption] [caption' )
				.replace( /<(object|audio|video)[\s\S]+?<\/\1>/g, function( match ) {
					return match.replace( /[\r\n]+/g, ' ' );
				}).replace( /<pre[^>]*>[\s\S]+?<\/pre>/g, function( match ) {
					match = match.replace( /<br ?\/?>(\r\n|\n)?/g, '\n' );
					return match.replace( /<\/?p( [^>]*)?>(\r\n|\n)?/g, '\n' );
				});
			});
		}
	});
});
