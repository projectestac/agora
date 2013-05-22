// Files plugin for Xinha
// developed by Albert Perez Monfort
//
// requires Files module, licensed under GPL
//
// Distributed under the same terms as xinha itself.
// This notice MUST stay intact for use (see license.txt).

function Files(editor) {
    this.editor = editor;
    var cfg = editor.config;
    var self = this;
    cfg.registerButton({
        id       : "files",
        tooltip  : "insert user file",
        image    : _editor_url+"plugins/Files/img/files.gif",
        textMode : false,
        action   : function(editor) {
                    url = Zikula.Config.baseURL + 'index.php'/*Zikula.Config.entrypoint*/ + "?module=Files&type=external&func=getFiles";
                    FilesFindItemXinha(editor, url);
        }
    })
    cfg.addToolbarElement("files", "insertimage", 1);
}
Files._pluginInfo = {
    name          : "Files for xinha",
    version       : "1.0",
    developer     : "Albert Perez Monfort",
    developer_url : "",
    sponsor       : "",
    sponsor_url   : "",
    license       : "htmlArea"
};