<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
class Scribite_EditorHelper
{
    /**
     * This class is used as the subject of the event 'module.scribite.editorhelpers'
     * Any module that needs to add page vars (javascript, css, etc) can use
     * a PersistentModuleHandler to automatically load their helper
     * every time a Scribite editor is loaded.
     * 
     * <samp>
     * in SimpleMedia_Installer::install()
     * EventUtil::registerPersistentModuleHandler('SimpleMedia', 'module.scribite.editorhelpers', array('SimpleMedia_Handlers', 'getHelpers'));
     * 
     * in SimpleMedia_Handlers::getHelpers(Zikula_Event $event)
     * $editor = $event->getArg('editor'); // could use for logic choices on what to add.
     * $event->getSubject()->add(array('module' => 'SimpleMedia',
     *              'type' => 'javascript',
     *              'path' => 'modules/SimpleMedia/javascript/findItem.js'));
     * </samp> 
     * 
     * A module can add as many helpers as required (any standard PageVar)
     */

    /**
     * stack of helpers
     * @var array
     */
    private $helpers;

    /**
     * constructor 
     */
    public function __construct()
    {
        $this->helpers = array();
    }

    /**
     * add a helper to the stack
     * @param array $helper
     * $helper must have array keys [module, type, path] set
     */
    public function add(array $helper)
    {
        if (isset($helper['module']) && isset($helper['type']) && isset($helper['path'])) {
            $this->helpers[] = $helper;
        }
    }

    /**
     * get the helper stack
     * @return array
     */
    public function getHelpers()
    {
        return $this->helpers;
    }

}