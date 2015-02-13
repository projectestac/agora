<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
class ModulePlugin_Scribite_CKEditor_EditorPlugin
{
    /**
     * This class is used as the subject of the event 'moduleplugin.ckeditor.externalplugins'
     * Any module that needs to add *external* editor plugins can use
     * a PersistentModuleHandler to automatically load their plugin
     * every time the CKEditor editor is loaded.
     * 
     * @see http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.resourceManager.html#addExternal
     * @see http://ckeditor.com/comment/47922#comment-47922
     * 
     * <samp>
     * in SimpleMedia_Installer::install()
     * EventUtil::registerPersistentModuleHandler('SimpleMedia', 'moduleplugin.ckeditor.externalplugins', array('SimpleMedia_Handler', 'getExternalCKEditorEditorPlugins'));
     * 
     * in SimpleMedia_Handlers::getExternalCKEditorEditorPlugins(Zikula_Event $event)
     * $event->getSubject()->add(array('name' => 'simplemedia',
     *              'path' => 'modules/SimpleMedia/docs/scribite/plugins/CKEditor/vendor/ckeditor/plugins/simplemedia/',
     *              'file' => 'editor_plugin.js',
     *              'img' => 'ed_simplemedia.gif'));
     * </samp> 
     * 
     * A module can add as many plugins as desired
     */

    /**
     * stack of plugins
     * @var array
     */
    private $plugins;

    /**
     * constructor 
     */
    public function __construct()
    {
        $this->plugins = array();
    }

    /**
     * add a plugin to the stack
     * @param array $plugin
     * $helper must have array keys [name, path, file] set
     */
    public function add(array $plugin)
    {
        if (isset($plugin['name']) && isset($plugin['path']) && isset($plugin['file']) && isset($plugin['img'])) {
            $plugin['path'] = rtrim($plugin['path'], '/') . '/'; // ensure there is a trailing slash
            $this->plugins[] = $plugin;
        }
    }

    /**
     * get the helper stack
     * @return array
     */
    public function getPlugins()
    {
        return $this->plugins;
    }

}