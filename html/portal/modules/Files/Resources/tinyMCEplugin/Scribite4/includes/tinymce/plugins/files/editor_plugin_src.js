/**
 * editor_plugin_src.js
 *
 * Files plugin for tinymce - Scribite 4
 * developed by Joan Guillén i Pelegay
 * https://github.com/zikula-modules/Files
 *
 * requires Files module (v 1.0.2+), licensed under GPL
 *
 * Distributed under the same terms as Scribite itself.
 */

(function () {
    // Load plugin specific language pack

    tinymce.create('tinymce.plugins.FilesPlugin', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function (ed, url) {
            ed.addCommand('mceFiles', function () {
                ed.windowManager.open({
                    file : Zikula.Config.baseURL + Zikula.Config.entrypoint + '?module=Files&type=external&func=getFiles&editor=TinyMCE',
                    width : 600,
                    height : 600,
                    inline : 1,
                    scrollbars : true,
                    resizable : true
                }, {
                    plugin_url : url, // Plugin absolute URL
                    some_custom_arg : tinymce // Custom argument
                });
            });

            // Register mufiles button
            ed.addButton('files', {
                title : 'files.desc',
                cmd : 'mceFiles',
                image : url + '/imgs/files.gif'
            });

            // Add a node change handler, selects the button in the UI when a image is selected
            ed.onNodeChange.add(function (ed, cm, n) {
                cm.setActive('files', n.nodeName === 'IMG');
            });
        },

        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use in order to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function (n, cm) {
            return null;
        },

        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function () {
            return {
                longname : 'Files for tinymce',
                author : 'Joan Guillén i Pelegay',
                authorurl : '',
                infourl : '',
                version : '1.0.0'
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add('files', tinymce.plugins.FilesPlugin);
}());
