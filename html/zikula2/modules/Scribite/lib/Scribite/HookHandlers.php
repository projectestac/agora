<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
class Scribite_HookHandlers extends Zikula_Hook_AbstractHandler
{

    /**
     * Zikula_View instance
     *
     * @var Zikula_View
     */
    private $view;

    /**
     * Post constructor hook.
     *
     * @return void
     */
    public function setup()
    {
        $this->view = Zikula_View::getInstance("Scribite", Zikula_View::CACHE_DISABLED);
    }

    /**
     * Display a html snippet with buttons for inserting Scribites into a textarea
     *
     * @param Zikula_Hook $hook
     *
     * @return void
     */
    public function uiEdit(Zikula_DisplayHook $hook)
    {
        // get the module name
        $module = $hook->getCaller();

        // Security check if user has COMMENT permission for scribite
        if (!SecurityUtil::checkPermission('Scribite::', "$module::", ACCESS_COMMENT)) {
            return;
        }

        // load the editor
        $scribiteheader = $this->loader(array(
            'modulename' => $module));

        // add the scripts to page header
        if ($scribiteheader) {
            PageUtil::AddVar('header', $scribiteheader);
        }

        $response = new Zikula_Response_DisplayHook(Scribite_Version::PROVIDER_UIAREANAME, $this->view, 'hook/scribite.tpl');
        $hook->setResponse($response);
    }

    /**
     * Initialise Scribite for requested areas.
     *
     * @param array $args Module name: 'modulename'.
     *
     * @return string
     */
    private function loader($args)
    {
        // Argument checks
        $module = (isset($args['modulename'])) ? $args['modulename'] : ModUtil::getName();
        
        $overrides = ModUtil::getVar('Scribite', 'overrides');
        $editor = (isset($overrides[$module]['editor'])) ? $overrides[$module]['editor'] : ModUtil::getVar('Scribite', 'DefaultEditor');

        // check for modules providing helpers and load them into the page
        $event = new Zikula_Event('module.scribite.editorhelpers', new Scribite_EditorHelper(), array('editor' => $editor));
        $helpers = EventUtil::getManager()->notify($event)->getSubject()->getHelpers();
        foreach ($helpers as $helper) {
            if (ModUtil::available($helper['module'])) {
                PageUtil::AddVar($helper['type'], $helper['path']);            
            }
        }
        
        // check for allowed html
        $AllowableHTML = System::getVar('AllowableHTML');
        $disallowedhtml = array();
        while (list($key, $access) = each($AllowableHTML)) {
            if ($access == 0) {
                $disallowedhtml[] = DataUtil::formatForDisplay($key);
            }
        }

        // fetch additonal editor specific parameters.
        $classname = 'ModulePlugin_Scribite_' . $editor . '_Util';
        $additionalEditorParameters = array();
        if (method_exists($classname, 'addParameters')) {
            $additionalEditorParameters = $classname::addParameters();
        }
        // fetch external editor plugins
        $additionalExternalEditorPlugins = array();
        if (method_exists($classname, 'addExternalPlugins')) {
            $additionalExternalEditorPlugins = $classname::addExternalPlugins();
        }

        // assign disabled textareas to template as a javascript array
        $javascript = "var disabledTextareas=[";
        if (isset($overrides[$module])) {
            foreach (array_keys($overrides[$module]) as $area) {
                if ($area == 'editor') continue;
                if ((isset($overrides[$module][$area]['disabled'])) && ($overrides[$module][$area]['disabled'] == "true")) {
                    $javascript .= "'" . $area . "',";
                }
            }
        }
        $javascript = rtrim($javascript, ",");
        $javascript .= "];";
        PageUtil::addVar("footer", "<script type='text/javascript'>$javascript</script>");
        
        // assign override parameters to javascript object
        $javascript = "";
        $paramOverrides = false;
        if (isset($overrides[$module])) {
            foreach ($overrides[$module] as $area => $config) {
                if ($area == 'editor') continue;
                if (!empty($config['params'])) {
                    $paramOverrides = true;
                    $javascript .= "var paramOverrides_$area = {";
                    foreach ($config['params'] as $param => $value) {
                        $javascript .= "\n    $param: '$value',";
                    }
                    
                    $javascript .= "\n}";
                }
            }
        }
        PageUtil::addVar("footer", "<script type='text/javascript'>\n$javascript\n</script>");
        
        // insert notify function
        PageUtil::addVar('javascript', 'modules/Scribite/javascript/function-insertnotifyinput.js');

        $view = Zikula_View_Plugin::getPluginInstance("Scribite", $editor, Zikula_View::CACHE_DISABLED);

        // assign to template in Scribite 'namespace'
        $templateVars = array('editorVars' => ModUtil::getVar("moduleplugin.scribite." . strtolower($editor)),
            'modname' => $module,
            'disallowedhtml' => $disallowedhtml,
            'paramOverrides' => $paramOverrides);
        if (!empty($additionalEditorParameters)) {
            $templateVars['editorParameters'] = $additionalEditorParameters;
        }
        if (!empty($additionalExternalEditorPlugins)) {
            $templateVars['addExtEdPlugins'] = $additionalExternalEditorPlugins;
        }
        $view->assign('Scribite', $templateVars);

        return $view->fetch("editorheader.tpl");
    }

}