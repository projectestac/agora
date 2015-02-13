<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
class ModulePlugin_Scribite_TinyMce_EditorPlugin
{
    /**
     * This class is used as the subject of the event 'moduleplugin.tinymce.externalplugins'
     * Any module that needs to add *external* editor plugins can use
     * a PersistentModuleHandler to automatically load their plugin
     * every time the TinyMCE editor is loaded.
     * 
     * @see http://www.tinymce.com/wiki.php/Configuration:plugins
     * 
     * <samp>
     * in SimpleMedia_Installer::install()
     * EventUtil::registerPersistentModuleHandler('SimpleMedia', 'moduleplugin.tinymce.externalplugins', array('SimpleMedia_Handlers', 'getExternalTinyMceEditorPlugins'));
     * 
     * in SimpleMedia_Handlers::getExternalTinyMceEditorPlugins(Zikula_Event $event)
     * $event->getSubject()->add(array('name' => 'simplemedia',
     *              'path' => 'modules/SimpleMedia/docs/scribite/plugins/TinyMCE/vendor/tinymce/plugins/simplemedia/editor_plugin.js'));
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
     * $helper must have array keys [name, path] set
     */
    public function add(array $plugin)
    {
        if (isset($plugin['name']) && isset($plugin['path'])) {
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