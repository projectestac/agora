// pagesetter plugin for Xinha
// developed by sven schomacker (hilope)
//
// uses some code from pagesetter/Guppy by Jorn Lind-Nielsen (http://www.elfisk.dk)
// requires pagesetter module, see url above, licensed under GPL
// imagefile taken from pagesetter/Guppy
//
// Distributed under the same terms as xinha itself.
// This notice MUST stay intact for use (see license.txt).

function Pagesetter(editor) {
	this.editor = editor;
	var cfg = editor.config;
	var self = this;
	cfg.registerButton({
		id       : "pagesetter",
		tooltip  : "insert pagesetter publication link",
		image    : _editor_url+"plugins/Pagesetter/img/ed_pagesetter.gif",
		textMode : false,
		action   : function(editor) {
			url = document.location.pnbaseURL + document.location.entrypoint + "?module=pagesetter&func=pubfind&url=relative&html=a&targetID=" + editor;
			pagesetterFindPubHtmlArea30(editor, url);
			}
	})
	cfg.addToolbarElement("pagesetter", "insertimage", 1);
}
Pagesetter._pluginInfo = {
	name          : "Pagesetter for xinha",
	version       : "2.0",
	developer     : "sven schomacker",
	developer_url : "http://www.schomedia.com/",
	sponsor       : "hilope.de",
	sponsor_url   : "http://www.hilope.de/",
	license       : "htmlArea"
};

