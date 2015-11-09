/**
 * plugin.min_src.js
 *
 * Files plugin for tinymce - Scribite 5
 * developed by Joan Guillén i Pelegay
 * https://github.com/zikula-modules/Files
 *
 * requires Files module (v 1.0.2+), licensed under GPL
 *
 * Distributed under the same terms as Scribite itself.
 */
tinymce.PluginManager.add('files', function(editor) {
	function OpenFilesDialog() {
		editor.windowManager.open({
			title: 'Files module',
			url: Zikula.Config.baseURL + Zikula.Config.entrypoint + '?module=Files&type=external&func=getFiles&editor=TinyMCE',
			width: 600,
			height: 600,
		});
	}
	// Add a button that opens a window
	editor.addButton('files', {
		tooltip: 'Files plugin',
		icon: 'paperclip',
		onclick: OpenFilesDialog
	});


	// Adds a menu item to the tools menu
	editor.addMenuItem('files', {
		text: 'Files plugin',
		icon: 'paperclip',
		context: 'insert',
		onclick: OpenFilesDialog
	});
});
