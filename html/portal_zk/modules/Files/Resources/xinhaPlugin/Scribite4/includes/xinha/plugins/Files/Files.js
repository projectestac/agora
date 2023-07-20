// Files plugin for Xinha - Scribite 4
// developed by Albert Perez Monfort and Joan Guillén i Pelegay
// https://github.com/zikula-modules/Files
//
// requires Files module (v 1.0.2+), licensed under GPL
//
// Distributed under the same terms as Scribite itself.

function Files(editor) {
    this.editor = editor;
    var cfg = editor.config;
    var self = this;
    cfg.registerButton({
        id       : "files",
        tooltip  : this._lc("Insert files and images"),
        image    : _editor_url+"plugins/Files/img/files.gif",
        textMode : false,
        action   : function(editor) {
                    self.FilesXinhaPlugin(editor);
        }
    })
    cfg.addToolbarElement("files", "insertimage", 1);
}
Files._pluginInfo = {
    name          : "Files for Xinha",
    version       : "1.0.x",
    developer     : "Albert Perez Monfort and Joan Guillén i Pelegay",
    developer_url : "https://github.com/zikula-modules/Files",
    sponsor       : "",
    sponsor_url   : "",
    license       : "GPL"
};
Files.prototype._lc = function(string) {
    return Xinha._lc(string, 'Files');
};
Files.prototype.FilesXinhaPlugin = function(editor) {
	maURL = Zikula.Config.baseURL + Zikula.Config.entrypoint + "?module=Files&type=external&func=getFiles&editor=Xinha";
    outparam = {
		content : editor.getSelectedHTML()
	};
    editor._popupDialog(maURL ,
        function(val){
            value = val[1];
            opt = val[0];
            fileName = value.substr(value.lastIndexOf('/')+1,value.length);
            if (opt == 'insertImg') {
                editor.insertHTML('<img src="'+ value + '" alt="' + fileName + '" title="' + fileName + '"/>');
            }else if (opt == 'insertLink') {
				if (outparam.content == '') {
					editor.insertHTML('<a href="' + value + '" alt="' + fileName + '" title="' + fileName + '">' + fileName + '</a>');
				} else {
                	editor.insertHTML('<a href="' + value + '" alt="' + fileName + '" title="' + fileName + '">' + outparam.content + '</a>');
				}
            }else if (opt == 'copyURL') {
                editor.insertHTML(Zikula.Config.baseURL+value);
            }else if (opt == 'gotoURL') {
                window.open(Zikula.Config.baseURL+value);
             }
            
        });
};
