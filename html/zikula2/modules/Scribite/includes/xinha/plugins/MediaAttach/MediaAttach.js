// MediaAttach plugin for Xinha
// developed by Axel Guckelsberger (Guite)
//
// requires MediaAttach module (http://guite.de), licensed under GPL
// imagefile taken from pagesetter/Guppy
//
// Distributed under the same terms as xinha itself.
// This notice MUST stay intact for use (see license.txt).

function MediaAttach(editor) {
    this.editor = editor;
    var cfg = editor.config;
    var self = this;

    cfg.registerButton({
        id       : "MediaAttach",
        tooltip  : "insert MediaAttach file",
        image    : _editor_url+"plugins/MediaAttach/img/ed_MediaAttach.gif",
        textMode : false,
        action   : function(editor) {
                    url = Zikula.Config.baseURL + 'index.php'/*Zikula.Config.entrypoint*/ + "?module=MediaAttach&type=external&func=finditem";
		MediaAttachFindItemXinha(editor, url);
        }
    })
    cfg.addToolbarElement("MediaAttach", "insertimage", 1);
}
MediaAttach._pluginInfo = {
    name          : "MediaAttach for xinha",
    version       : "1.2",
    developer     : "Axel Guckelsberger",
    developer_url : "http://guite.de/",
    sponsor       : "Guite",
    sponsor_url   : "http://guite.de/",
    license       : "htmlArea"
};

