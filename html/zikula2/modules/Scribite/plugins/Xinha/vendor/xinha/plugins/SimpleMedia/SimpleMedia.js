// SimpleMedia plugin for Xinha
// developed by Axel Guckelsberger
//
// requires SimpleMedia module (http://zikula.de)
//
// Distributed under the same terms as xinha itself.
// This notice MUST stay intact for use (see license.txt).

'use strict';

function SimpleMedia(editor) {
    var cfg, self;

    this.editor = editor;
    cfg = editor.config;
    self = this;

    cfg.registerButton({
        id       : 'SimpleMedia',
        tooltip  : 'Insert SimpleMedia object',
        image    : _editor_url + 'plugins/SimpleMedia/img/ed_simplemedia.gif',
        textMode : false,
        action   : function (editor) {
            var url = Zikula.Config.baseURL + 'index.php'/*Zikula.Config.entrypoint*/ + '?module=SimpleMedia&type=external&func=finder&editor=xinha';
            SimpleMediaFinderXinha(editor, url);
        }
    });
    cfg.addToolbarElement('SimpleMedia', 'insertimage', 1);
}

SimpleMedia._pluginInfo = {
    name          : 'SimpleMedia for xinha',
    version       : '2.0.0',
    developer     : 'Axel Guckelsberger',
    developer_url : 'http://zikula.de',
    sponsor       : 'ModuleStudio 0.5.5',
    sponsor_url   : 'http://modulestudio.de',
    license       : 'htmlArea'
};
