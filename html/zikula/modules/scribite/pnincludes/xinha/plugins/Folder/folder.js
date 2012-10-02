// folder plugin for Xinha
// developed by sven schomacker (hilope)
//
// uses some code from pagesetter/Guppy by Jorn Lind-Nielsen (http://www.elfisk.dk)
// requires folder module, see url above, licensed under GPL
// imagefile taken from pagesetter/Guppy
//
// Distributed under the same terms as xinha itself.
// This notice MUST stay intact for use (see license.txt).

function Folder(editor) {
	this.editor = editor;
	var cfg = editor.config;
	var self = this;
	cfg.registerButton({
		id       : "Folder",
		tooltip  : "Insert item from content folder",
		image    : _editor_url+"plugins/Folder/img/ed_folder.gif",
		textMode : false,
		action   : function(editor) {
                                  folderOpenSelectorForHTMLArea3(textareaID,'html',editor);
		                            }
	})
	cfg.addToolbarElement("Folder", "insertimage", 1);
}
Folder._pluginInfo = {
	name          : "Folder for xinha",
	version       : "1.0",
	developer     : "sven schomacker",
	developer_url : "http://www.schomedia.com/",
	sponsor       : "hilope.de",
	sponsor_url   : "http://www.hilope.de/",
	license       : "htmlArea"
};

