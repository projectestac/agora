// SimpleMedia plugin for Xinha
// developed by Axel Guckelsberger (Guite)
//
// requires SimpleMedia module (http://guite.de), licensed under GPL
//
// Distributed under the same terms as xinha itself.
// This notice MUST stay intact for use (see license.txt).

function SimpleMedia(editor) {
    this.editor = editor;
    var cfg = editor.config;
    var self = this;

    cfg.registerButton({
        id       : 'SimpleMedia',
        tooltip  : 'Insert SimpleMedia file',
        image    : _editor_url + 'plugins/SimpleMedia/img/ed_SimpleMedia.gif',
        textMode : false,
        action   : function(editor) {
            url = Zikula.Config.baseURL + 'index.php'/*Zikula.Config.entrypoint*/ + '?module=SimpleMedia&type=external&func=findItem&editor=xinha';
            SimpleMediaFindItemXinha(editor, url);
        }
    })
    cfg.addToolbarElement('SimpleMedia', 'insertimage', 1);
}
SimpleMedia._pluginInfo = {
    name          : 'SimpleMedia for xinha',
    version       : '1.0',
    developer     : 'Axel Guckelsberger',
    developer_url : 'http://guite.de/',
    sponsor       : 'Guite',
    sponsor_url   : 'http://guite.de/',
    license       : 'htmlArea'
};

