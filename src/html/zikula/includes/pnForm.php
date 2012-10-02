<?php
/**
 * Base classes for pnForm system
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package pnForm
 * @subpackage Base
 */

/**
 * User interaction handler for pnForm system
 *
 * This class is the main entry point for using the pnForm system. It is expected to be used in Zikula's
 * user files, such as "pnuser.php", like this:
 * <code>
 * function modname_user_new($args)
 * {
 *   // Create instance of pnFormRender class
 *   $render = FormUtil::newpnForm('howtopnforms');
 *
 *   // Execute form using supplied template and event handler
 *   return $render->pnFormExecute('modname_user_new.html', new modname_user_newHandler());
 * }
 * </code>
 * See tutorials elsewhere for general introduction to pnForm.
 *
 * @package pnForm
 * @subpackage Base
 */
class pnFormRender extends pnRender
{
    /**
     * Variable saving all required state information
     * @internal
     */
    var $pnFormState;

    /**
     * List of included files required to recreate plugins (Smarty function.xxx.php files)
     * @internal
     */
    var $pnFormIncludes;

    /**
     * List of instantiated plugins
     * @internal
     */
    var $pnFormPlugins;

    /**
     * Stack with all instantiated blocks (push when starting block, pop when ending block)
     * @internal
     */
    var $pnFormBlockStack;

    /**
     * List of validators on page
     * @internal
     */
    var $pnFormValidators;

    /**
     * Flag indicating if validation has been done or not
     * @internal
     */
    var $pnFormValidationChecked;

    /**
     * Indicates whether page is valid or not
     * @internal
     */
    var $_pnFormIsValid;

    /**
     * Current ID count - used to assign automatic ID's to all items
     * @internal
     */
    var $pnFormIdCount;

    /**
     * Reference to the main user code event handler
     * @internal
     */
    var $pnFormEventHandler;

    /**
     * Error message has been set
     * @internal
     */
    var $pnFormErrorMsgSet;

    /**
     * Set to true if pnFormRedirect was called. Means no HTML output should be returned.
     * @internal
     */
    var $pnFormRedirected;

    /**
     * Constructor
     *
     * Use FormUtil::newpnForm() instead of instantiating pnFormRender directly.
     * @internal
     */
    function pnFormRender($module)
    {
        // Construct and make normal Smarty use possible
        $this->pnRender($module, false);
        array_push($this->plugins_dir, "system/pnForm/plugins");

        // Setup
        $this->pnFormIdCount = 1;
        $this->pnFormErrorMsgSet = false;
        $this->pnFormPlugins = array();
        $this->pnFormBlockStack = array();
        $this->pnFormRedirected = false;

        $this->pnFormValidators = array();
        $this->pnFormValidationChecked = false;
        $this->_pnFormIsValid = null;

        $this->pnFormInitializeState();
        $this->pnFormInitializeIncludes();
    }

    /** Main event loop handler
     *
     * This is the function to call instead of the normal $render->fetch(...)
     * @param bool $template Name of template file
     * @param pnFormHandler $eventHandler Instance of object that inherits from pnFormHandler
     * @return mixed False on errors, true on redirects, and otherwise it returns the HTML output for the page.
     */
    function pnFormExecute($template, &$eventHandler)
    {
        // Save handler for later use
        $this->pnFormEventHandler = &$eventHandler;

        if ($this->pnFormIsPostBack()) {
            if (!SecurityUtil::confirmAuthKey())
                return LogUtil::registerAuthidError(); {
            }

            $this->pnFormDecodeIncludes();
            $this->pnFormDecodeState();
            $this->pnFormDecodeEventHandler();

            if ($eventHandler->initialize($this) === false) {
                return $this->pnFormGetErrorMsg();
            }

            // (no create event)
            $this->pnFormInitializePlugins(); // initialize event
            $this->pnFormDecodePlugins(); // decode event
            $this->pnFormDecodePostBackEvent(); // Execute optional postback after plugins have read their values
        } else {
            if ($eventHandler->initialize($this) === false)
                return $this->pnFormGetErrorMsg();
        }

        // render event (calls registerPlugin)
        $output = $this->fetch($template);

        if ($this->pnFormHasError()) {
            return $this->pnFormGetErrorMsg();
        }

        // Check redirection at this point, ignore any generated HTML if redirected is required.
        // We cannot skip HTML generation entirely in case of pnRedirect since there might be
        // some relevant code to execute in the plugins.
        if ($this->pnFormRedirected) {
            return true;
        }

        return $output;
    }

    /**
     * Register a plugin
     *
     * This method registers a plugin used in a template. Plugins must beregistered to be used in pnForm
     * (unlike Smarty plugins). The register call must be done inside the Smarty plugin function in a
     * Smarty plugin file. Use like this:
     * <code>
     * // In file "function.myplugin.php"
     *
     * // pnForm plugin class
     * class MyPlugin extends pnFormPlugin
     * { ... }
     *
     * // Smarty plugin function
     * function smarty_function_myplugin($params, &$render)
     * {
     *   return $render->pnFormRegisterPlugin('MyPlugin', $params);
     * }
     * </code>
     * Registering a plugin ensures it is included in the plugin hierarchy of the current page, so that it's
     * various event handlers can be called by the framework.
     *
     * Do not use this function for registering Smarty blocks (the $isBlock parameter is for internal use).
     * Use pnFormRegisterBlock instead.
     *
     * See also all the function.pnformXXX.php plugins for examples.
     *
     * @param string $pluginName Full class name of the plugin to register.
     * @param array &$params Parameters passed from the Smarty plugin function
     * @param bool $isBlock Indicates whether the plugin is a Smarty block or a Smarty function (internal)
     * @return string Returns what the render() method of the plugin returns
     */
    function pnFormRegisterPlugin($pluginName, &$params, $isBlock = false)
    {
        // Make sure we have a suitable ID for the plugin
        $id = $this->pnFormGetPluginId($params);

        $stackCount = count($this->pnFormBlockStack);

        // A volatile block is a block that cannot be restored through view state
        // This is the case for pnForm plugins inside <!--[if]--> and <!--[foreach]--> tags.
        // So create new plugins for these blocks instead of relying on the existing plugins.


        if (!$this->pnFormIsPostBack() || $stackCount > 0 && $this->pnFormBlockStack[$stackCount - 1]->volatile) {
            $plugin = & new $pluginName($this, $params);

            // Make sure to store ID and render reference in plugin
            $plugin->id = $id;

            if ($stackCount > 0) {
                $plugin->parentPlugin = &$this->pnFormBlockStack[$stackCount - 1];
                $this->pnFormBlockStack[$stackCount - 1]->registerPlugin($this, $plugin);
            } else {
                // Store plugin for later reference
                $this->pnFormPlugins[] = &$plugin;
            }

            // Copy parameters to member variables and attribute set
            $plugin->readParameters($this, $params);
            $plugin->create($this, $params);
            $plugin->load($this, $params);

            // Remember which file this plugin came from in order to be able to restore it.
            $pluginPath = str_replace($_SERVER['DOCUMENT_ROOT'].pnGetBaseURI().DIRECTORY_SEPARATOR, '' , $plugin->getFilename());
            $this->pnFormIncludes[$pluginPath] = 1;

        } else {
            // Fetch plugin instance by ID
            // It has already got it's initialize and decode event at this point
            $plugin = & $this->pnFormGetPluginById($id);

            // Kill existing plugins beneath a volatile block
            if (isset($plugin->volatile) && $plugin->volatile) {
                $plugin->plugins = null;
            }
        }

        $plugin->dataBound($this, $params);

        if ($isBlock) {
            $this->pnFormBlockStack[] = &$plugin;
        }

        // Ask plugin to render itself
        $output = '';
        if ($isBlock) {
            if ($plugin->visible) {
                $output = $plugin->renderBegin($this);
            }
        } else {
            if ($plugin->visible) {
                $output = $plugin->render($this);
            }
        }

        return $output;
    }

    /**
     * Regiser a block plugin
     *
     * Use this like {@link pnFormRegisterPlugin} but for Smarty blocks instead of Smarty plugins.
     * <code>
     * // In file "block.myblock.php"
     *
     * // pnForm plugin class (also used for blocks)
     * class MyBlock extends pnFormPlugin
     * { ... }
     *
     * // Smarty block function
     * function smarty_block_myblock($params, $content, &$render)
     * {
     *   return return $render->pnFormRegisterBlock('MyBlock', $params, $content);
     * }
     * </code>
     * @param string $pluginName Full class name of the plugin to register.
     * @param array &$params Parameters passed from the Smarty block function
     * @param string &$content Content passed from the Smarty block function
     */
    function pnFormRegisterBlock($pluginName, &$params, &$content)
    {
        if (!$content) {
            return $this->pnFormRegisterBlockBegin($pluginName, $params);
        } else {
            return $this->pnFormRegisterBlockEnd($pluginName, $params, $content);
        }
    }

    /**
     * pnFormRegisterBlockBegin
     * @internal
     */
    function pnFormRegisterBlockBegin($pluginName, &$params)
    {
        $output = $this->pnFormRegisterPlugin($pluginName, $params, true);
        $plugin = &$this->pnFormBlockStack[count($this->pnFormBlockStack) - 1];
        $plugin->blockBeginOutput = $output;
    }

    /**
     * pnFormRegisterBlockEnd
     * @internal
     */
    function pnFormRegisterBlockEnd($pluginName, &$params, $content)
    {
        $plugin = &$this->pnFormBlockStack[count($this->pnFormBlockStack) - 1];
        array_pop($this->pnFormBlockStack);

        if ($plugin->visible) {
            $output = $plugin->blockBeginOutput . $plugin->renderContent($this, $content) . $plugin->renderEnd($this);
        }

        $plugin->blockBeginOutput = null;

        return $output;
    }

    /**
     * pnFormGetPluginId
     * @internal
     */
    function pnFormGetPluginId(&$params)
    {
        if (!isset($params['id'])) {
            return 'plg' . ($this->pnFormIdCount++);
        }

        return $params['id'];
    }

    function &pnFormGetPluginById($id)
    {
        $lim = count($this->pnFormPlugins);
        for ($i = 0; $i < $lim; ++$i) {
            $plugin = & $this->pnFormGetPluginById_rec($this->pnFormPlugins[$i], $id);
            if ($plugin != null) {
                return $plugin;
            }
        }

        $null = null;
        return $null;
    }

    function &pnFormGetPluginById_rec(&$plugin, $id)
    {
        if ($plugin->id == $id) {
            return $plugin;
        }

        $lim = count($plugin->plugins);
        for ($i = 0; $i < $lim; ++$i) {
            $subPlugin = & $this->pnFormGetPluginById_rec($plugin->plugins[$i], $id);
            if ($subPlugin != null) {
                return $subPlugin;
            }
        }

        $null = null;
        return $null;
    }

    function pnFormIsPostBack()
    {
        return isset($_POST['__pnFormSTATE']);
    }

    function pnFormDie($msg)
    {
        echo ($msg);
        pnShutDown(0);
    }

    function pnFormTranslateForDisplay($txt, $doEncode = true)
    {
        $txt = (strlen($txt) > 0 && $txt[0] == '_' && defined($txt) ? constant($txt) : $txt);
        if ($doEncode) {
            $txt = DataUtil::formatForDisplay($txt);
        }
        return $txt;
    }

    /* --- Validation --- */

    function pnFormAddValidator(&$validator)
    {
        $this->pnFormValidators[] = &$validator;
    }

    function pnFormIsValid()
    {
        if (!$this->pnFormValidationChecked) {
            $this->pnFormValidate();
        }

        return $this->_pnFormIsValid;
    }

    function &pnFormGetValidators()
    {
        return $this->pnFormValidators;
    }

    function pnFormValidate()
    {
        $this->_pnFormIsValid = true;

        $lim = count($this->pnFormValidators);
        for ($i = 0; $i < $lim; ++$i) {
            $this->pnFormValidators[$i]->validate($this);
            $this->_pnFormIsValid = $this->_pnFormIsValid && $this->pnFormValidators[$i]->isValid;
        }

        $this->pnFormValidationChecked = true;
    }

    function pnFormClearValidation()
    {
        $this->_pnFormIsValid = true;

        $lim = count($this->pnFormValidators);
        for ($i = 0; $i < $lim; ++$i) {
            $this->pnFormValidators[$i]->clearValidation($this);
        }
    }

    /* --- Public state management --- */

    function pnFormSetState($region, $varName, &$varValue)
    {
        if (!isset($this->pnFormState[$region])) {
            $this->pnFormState[$region] = array();
        }

        $this->pnFormState[$region][$varName] = &$varValue;
    }

    function &pnFormGetState($region, $varName)
    {
        return $this->pnFormState[$region][$varName];
    }

    /* --- Error handling --- */

    /**
     * Register an error
     *
     * Example:
     * <code>
     * function handleCommand(...)
     * {
     *   if (... it did not work ...)
     *     return $render->pnFormRegisterError('Operation X failed due to Y');
     * }
     * </code>
     */
    function pnFormSetErrorMsg($msg)
    {
        LogUtil::registerError($msg);
        $this->pnFormErrorMsgSet = true;
        return false;
    }

    function pnFormGetErrorMsg()
    {
        if ($this->pnFormErrorMsgSet) {
            include_once 'system/pnRender/plugins/function.pngetstatusmsg.php';
            $args = array();
            return smarty_function_pngetstatusmsg($args, $this);
        } else
            return '';
    }

    function pnFormHasError()
    {
        return $this->pnFormErrorMsgSet;
    }

    /**
     * Register that we have used LogUtil::registerError() to set an error.
     *
     * Example:
     * <code>
     * function initialize(&$render)
     * {
     *   if (... not has access ...)
     *     return $render->pnFormRegisterError(LogUtil::registerPermissionError());
     * }
     * </code>
     */
    function pnFormRegisterError($dummy)
    {
        $this->pnFormErrorMsgSet = true;
        return false;
    }

    /* --- Redirection --- */

    function pnFormRedirect($url)
    {
        pnRedirect($url);
        $this->pnFormRedirected = true;
    }

    /* --- Event handling --- */

    /**
     * Get postback reference
     *
     * Call this method to get a piece of code that will generate a postback event. The returned JavaScript code can
     * be called at any time to generate the postback. The plugin that receives the postback must implement
     * a function "raisePostBackEvent(&$render, $eventArgument)" that will handle the event.
     *
     * Example (taken from the {@link pnFormContextMenuItem} plugin):
     * <code>
     * function render(&$render)
     * {
     *   $click = $render->pnFormGetPostBackEventReference($this, $this->commandName);
     *   $url = 'javascript:' . $click;
     *   $title = $render->pnFormTranslateForDisplay($this->title);
     *   $html = "<li><a href=\"$url\">$title</a></li>";
     *
     *   return $html;
     * }
     *
     * function raisePostBackEvent(&$render, $eventArgument)
     * {
     *   $args = array('commandName' => $eventArgument, 'commandArgument' => null);
     *   $render->pnFormRaiseEvent($this->onCommand == null ? 'handleCommand' : $this->onCommand, $args);
     * }
     * </code>
     *
     * @param plugin object Reference to the plugin that should receive the postback event
     * @param commandName string Command name to pass to the event handler
     */
    function pnFormGetPostBackEventReference(&$plugin, $commandName)
    {
        return "pnFormDoPostBack('$plugin->id', '$commandName');";
    }

    /// Raise event in the main user event handler
    /// This method raises an event in the main user event handler. It is usually called from a plugin to signal
    /// that something in that plugin needs attention.
    function pnFormRaiseEvent($eventHandlerName, $args)
    {
        $handlerClass = & $this->pnFormEventHandler;

        if (method_exists($handlerClass, $eventHandlerName)) {
            if ($handlerClass->$eventHandlerName($this, $args) === false) {
                return false;
            }
        }

        return true;
    }

    /* --- Private --- */

    /* --- Include list --- */

    function pnFormInitializeIncludes()
    {
        $this->pnFormIncludes = array();
    }

    function pnFormGetIncludesText()
    {
        $bytes = serialize($this->pnFormIncludes);
        $bytes = SecurityUtil::signData($bytes);
        $base64 = base64_encode($bytes);

        return $base64;
    }

    function pnFormGetIncludesHTML()
    {
        $base64 = $this->pnFormGetIncludesText();

        return "<input type=\"hidden\" name=\"__pnFormINCLUDES\" value=\"$base64\"/>";
    }

    function pnFormDecodeIncludes()
    {
        $base64 = $_POST['__pnFormINCLUDES'];
        $bytes = base64_decode($base64);
        $bytes = SecurityUtil::checkSignedData($bytes);
        if (!$bytes) {
            return; // error handler required - drak
        }

        $this->pnFormIncludes = unserialize($bytes);

        foreach ($this->pnFormIncludes as $includeFilename => $dummy) {
            require_once $includeFilename;
        }
    }

    /* --- Authentication key --- */

    function pnFormGetAuthKeyHTML()
    {
        $key = SecurityUtil::generateAuthKey();
        $html = "<input type=\"hidden\" name=\"authid\" value=\"$key\" id=\"pnFormAuthid\"/>";
        return $html;
    }

    /* --- State management --- */

    function pnFormInitializeState()
    {
        $this->pnFormState = array();
    }

    function pnFormGetStateText()
    {
        $this->pnFormSetState('pnFormRender', 'eventHandler', $this->pnFormEventHandler);

        $pluginState = $this->pnFormGetPluginState();
        $this->pnFormSetState('pnFormRender', 'plugins', $pluginState);

        $bytes = serialize($this->pnFormState);
        $bytes = SecurityUtil::signData($bytes);
        $base64 = base64_encode($bytes);

        return $base64;
    }

    function pnFormGetPluginState()
    {
        //$this->dumpPlugins("Encode state", $this->pnFormPlugins);
        $state = $this->pnFormGetPluginState_rec($this->pnFormPlugins);
        return $state;
    }

    function pnFormGetPluginState_rec(&$plugins)
    {
        $state = array();

        $lim = count($plugins);
        for ($i = 0; $i < $lim; ++$i) {
            $plugin = & $plugins[$i];

            // Handle sub-plugins special and clear stuff not to be serialized
            $plugin->parentPlugin = null;
            $subPlugins = $plugin->plugins;
            $plugin->plugins = null;

            $varInfo = get_class_vars(get_class($plugin));

            $pluginState = array();
            foreach ($varInfo as $name => $value) {
                $pluginState[] = $plugin->$name;
            }

            $state[] = array(get_class($plugin), $pluginState, $this->pnFormGetPluginState_rec($subPlugins));

            $plugin->plugins = & $subPlugins;
        }

        return $state;
    }

    function pnFormGetStateHTML()
    {
        $base64 = $this->pnFormGetStateText();

        return "<input type=\"hidden\" name=\"__pnFormSTATE\" value=\"$base64\"/>";
    }

    function pnFormDecodeState()
    {
        $base64 = $_POST['__pnFormSTATE'];
        $bytes = base64_decode($base64);
        $bytes = SecurityUtil::checkSignedData($bytes);
        if (!$bytes) {
            return; // FIXME: error handler required - drak
        }

        $this->pnFormState = unserialize($bytes);
        $this->pnFormPlugins = & $this->pnFormDecodePluginState();

    //$this->dumpPlugins("Decoded state", $this->pnFormPlugins);
    }

    function &pnFormDecodePluginState()
    {
        $state = $this->pnFormGetState('pnFormRender', 'plugins');
        $decodedState = $this->pnFormDecodePluginState_rec($state);
        return $decodedState;
    }

    function &pnFormDecodePluginState_rec(&$state)
    {
        $plugins = array();

        foreach ($state as $pluginInfo)
        {
            $pluginType = $pluginInfo[0];
            $pluginState = &$pluginInfo[1];
            $subState = &$pluginInfo[2];

            $dummy = array();
            $plugin = & new $pluginType($this, $dummy);

            $vars = array_keys(get_class_vars(get_class($plugin)));

            $varCount = count($vars);
            if ($varCount != count($pluginState)) {
                return pn_exit("Cannot restore pnForm plugin of type '$pluginType' since stored and actual number of member vars differ");
            }

            for ($i = 0; $i < $varCount; ++$i) {
                $var = $vars[$i];
                $plugin->$var = $pluginState[$i];
            }

            $plugin->plugins = $this->pnFormDecodePluginState_rec($subState);
            $plugins[] = &$plugin;

            $lim = count($plugin->plugins);
            for ($i = 0; $i < $lim; ++$i) {
                $plugin->plugins[$i]->parentPlugin = &$plugins[count($plugins) - 1];
            }
        }

        return $plugins;
    }

    function pnFormDecodeEventHandler()
    {
        $storedHandler = & $this->pnFormGetState('pnFormRender', 'eventHandler');
        $currentHandler = & $this->pnFormEventHandler;

        // Copy saved data into event handler (this is where form handler variables are restored)
        $varInfo = get_class_vars(get_class($storedHandler));

        foreach ($varInfo as $name => $value) {
            $currentHandler->$name = $storedHandler->$name;
        }
    }

    /* --- plugin event generators --- */

    function pnFormInitializePlugins()
    {
        $this->pnFormInitializePlugins_rec($this->pnFormPlugins);

        return true;
    }

    function pnFormInitializePlugins_rec(&$plugins)
    {
        $lim = count($plugins);
        for ($i = 0; $i < $lim; ++$i) {
            $this->pnFormInitializePlugins_rec($plugins[$i]->plugins);
            $plugins[$i]->initialize($this);
        }
    }

    function pnFormDecodePlugins()
    {
        $this->pnFormDecodePlugins_rec($this->pnFormPlugins);

        return true;
    }

    function pnFormDecodePlugins_rec(&$plugins)
    {
        for ($i = 0, $lim = count($plugins); $i < $lim; ++$i) {
            $this->pnFormDecodePlugins_rec($plugins[$i]->plugins);
            $plugins[$i]->decode($this);
        }
    }

    function pnFormDecodePostBackEvent()
    {
        $eventTarget = FormUtil::getPassedValue('pnFormEventTarget', null, 'POST');
        $eventArgument = FormUtil::getPassedValue('pnFormEventArgument', null, 'POST');

        if ($eventTarget != '') {
            $targetPlugin = & $this->pnFormGetPluginById($eventTarget);
            if ($targetPlugin != null) {
                $targetPlugin->raisePostBackEvent($this, $eventArgument);
            }
        }

        $this->pnFormDecodePostBackEvent_rec($this->pnFormPlugins);
    }

    function pnFormDecodePostBackEvent_rec(&$plugins)
    {
        for ($i = 0, $lim = count($plugins); $i < $lim; ++$i) {
            $this->pnFormDecodePostBackEvent_rec($plugins[$i]->plugins);
            $plugins[$i]->decodePostBackEvent($this);
        }
    }

    function pnFormPostRender()
    {
        $this->pnFormPostRender_rec($this->pnFormPlugins);

        return true;
    }

    function pnFormPostRender_rec(&$plugins)
    {
        $lim = count($plugins);
        for ($i = 0; $i < $lim; ++$i) {
            $this->pnFormPostRender_rec($plugins[$i]->plugins);
            $plugins[$i]->postRender($this);
        }
    }

    /* --- Reading and settings submitted values --- */

    /**
     * Read all values from form
     *
     * Use this function to read the values send by the browser on postback. The return
     * value is an associative array of input names mapping to the posted values.
     * For instance the data:
     *
     * <code>
     * array('title'    => 'The posted title',
     *       'text'     => 'The posted text',
     *       'servings' => 4)
     * </code>
     *
     * Most input plugins supports grouping of posted data. These inputs allows you to
     * write something similar to what you do on the pnformtextinput plugin:
     *
     * <code>
     *   <!--[pnformtextinput id="title" group="A"]--><br/>
     *   <!--[pnformtextinput id="text" textMode=multiline group="A"]-->
     *   <!--[pnformintinput id="servings"]--><br/>
     * </code>
     *
     * Grouped data is combined into associative arrays with all the values in the group.
     * The above example would give the data set:
     *
     * <code>
     * array('A' => array('title'    => 'The posted title',
     *                    'text'     => 'The posted text'),
     *       'servings' => 4)
     * </code>
     *
     */
    function pnFormGetValues()
    {
        $result = array();

        $this->pnFormGetValues_rec($this->pnFormPlugins, $result);

        return $result;
    }

    function pnFormGetValues_rec(&$plugins, &$result)
    {
        $lim = count($plugins);
        for ($i = 0, $cou = $lim; $i < $cou; ++$i)
        {
            $plugin = &$plugins[$i];

            $this->pnFormGetValues_rec($plugin->plugins, $result);

            if (method_exists($plugin, 'saveValue')) {
                $plugin->saveValue($this, $result);
            }
        }
    }

    function pnFormSetValues(&$values, $group = null)
    {
        $empty = null;
        return $this->pnFormSetValues2($values, $group, $empty);
    }

    function pnFormSetValues2(&$values, $group = null, &$plugins)
    {
        if ($plugins == null) {
            $this->pnFormSetValues_rec($values, $group, $this->pnFormPlugins);
        } else {
            $this->pnFormSetValues_rec($values, $group, $plugins);
        }

        return true;
    }

    function pnFormSetValues_rec(&$values, $group, &$plugins)
    {
        $lim = count($plugins);
        for ($i = 0, $cou = $lim; $i < $cou; ++$i)
        {
            $plugin = &$plugins[$i];

            $this->pnFormSetValues_rec($values, $group, $plugin->plugins);

            if (method_exists($plugin, 'loadValue')) {
                $plugin->loadValue($this, $values);
            }
        }
    }

    function dumpPlugins($msg, &$plugins)
    {
        echo "<pre style=\"background-color: #CFC; text-align: left;\">\n";
        echo "** $msg **\n";
        $this->dumpPlugins_rec($this->pnFormPlugins);
        echo "</pre>";
    }

    function dumpPlugins_rec(&$plugins)
    {
        $lim = count($plugins);
        for ($i = 0, $cou = $lim; $i < $cou; ++$i)
        {
            $p = &$plugins[$i];
            echo "\n(\n{$p->id}: {$p->parentPlugin}";
            $this->dumpPlugins_rec($p->plugins);
            echo "\n)\n";
        }
    }
}

/**
 * Base form handler class
 *
 * This is the base class to inherit from when creating your own form handlers.
 *
 * Member variables in a form handler object is persisted accross different page requests. This means
 * a member variable $this->X can be set on one request and on the next request it will still contain
 * the same value.
 *
 * A form handler will be notified of various events that happens during it's life-cycle.
 * When a specific event occurs then the corresponding event handler (class method) will be executed. Handlers
 * are named exactly like their events - this is how the framework knows which methods to call.
 *
 * The list of events is:
 *
 * - <b>initialize</b>: this event fires before any of the events for the plugins and can be used to setup
 *   the form handler. The event handler typically takes care of reading URL variables, access control
 *   and reading of data from the database.
 *
 * - <b>handleCommand</b>: this event is fired by various plugins on the page. Typically it is done by the
 *   pnFormButton plugin to signal that the user activated a button.
 *
 * @package pnForm
 * @subpackage Base
 */
class pnFormHandler
{
    /**
     * Initialize form handler
     *
     * Typical use:
     * <code>
     * function initialize(&$render)
     * {
     *   if (!HasAccess) // your access check here
     *      return $render->pnFormSetErrorMsg('No access');
     *
     *   $id = FormUtil::getPassedValue('id');
     *
     *  $data = pnModAPIFunc('MyModule', 'user', 'get',
     *                       array('id' => $id));
     *   if (count($data) == 0)
     *     return $render->pnFormSetErrorMsg('Unknown data');
     *
     *   $render->assign($data);
     *
     *   return true;
     * }
     * </code>
     *
     * @return bool False in case of initialization errors, otherwise true. If false is returned then the
     * framework assumes that {@link pnFormRender::pnFormSetErrorMsg()} has been called with a suitable
     * error message.
     */
    function initialize(&$render)
    {
    }

    /**
     * Command event handler
     *
     * This event handler is called when a command is issued by the user. Commands are typically something
     * that originates from a {@link pnFormButton} plugin. The passed args contains different properties
     * depending on the command source, but you should at least find a <var>$args['commandName']</var>
     * value indicating the name of the command. The command name is normally specified by the plugin
     * that initiated the command.
     * @see pnFormButton
     * @see pnFormImageButton
     */
    function handleCommand(&$render, &$args)
    {
    }
}

/**
 * Base plugin class
 *
 * This is the base class to inherit from when creating new plugins for the pnForm framework.
 * Every pnForm plugin is normally created in a Smarty plugin function file and registered in
 * the pnForm framewith with the use of {@link pnFormRender::pnFormRegisterPlugin()}.
 *
 * Member variables in a plugin object is persisted accross different page requests. This means
 * a member variable $this->X can be set on one request and on the next request it will still contain
 * the same value. This probably removes 99% of the use of hidden HTML variables in your web forms.
 * A member variable <i>must</i> be declared in order to be persisted:
 * <code>
 * class MyPlugin inherits pnFormPlugin
 * {
 *    var $X;
 * }
 * </code>
 *
 * Member variables in a plugin will be assigned automatically from Smarty parameters when the variable
 * and parameter names match. So assume you have a plugin like this:
 * <code>
 * class MyPlugin inherits pnFormPlugin
 * {
 *    var $X;
 * }
 * </code>
 *
 * Then X will be set to 1234 through this template declaration:
 *
 * <code>
 * <!--[MyPlugin X="1234"]-->
 * </code>
 *
 * A registered plugin will be notified of various events that happens during it's life-cycle.
 * When a specific event occurs then the corresponding event handler (class method) will be executed. Handlers
 * are named exactly like their events - this is how the framework knows which methods to call.
 *
 * The list of events is:
 * - <b>create</b>: Similar to a constructor since it is called directly after the plugin has been created.
 *   In this event handler you should set the various member variables your plugin requires. You can access
 *   Smarty parameters through the $params object. The automatic setting of member variables from Smarty
 *   parameters happens <i>before</i> the create event.
 *   This event is only fired the first time the plugin is instantiated,
 *   but not when restored from saved state.
 *
 * - <b>load</b>: Called immediately after the create event. So the plugin is assumed to be fully initialized when the load event
 *   is fired. During the load event the plugin is expected to load values from the render object.
 *
 *   A typical load event handler will just call the loadValue
 *   handler and pass it the values of the render object (to improve reuse). The loadValue method will then take care of the rest.
 *   This is also the place where validators should be added to the list of validators.
 *   Example:
 *   <code>
 *   function load(&$render, &$params)
 *   {
 *     $this->loadValue($render, $render->get_template_vars());
 *     $render->pnFormAddValidator($this);
 *   }
 *   </code>
 *   This event is only fired the first time the plugin is instantiated,
 *   but not when restored from saved state.
 *
 * - <b>initialize</b>: this event is the opposite of the create/load event pair. It fires when a plugin
 *   has been restored from a postback (and before then decode event).
 *
 * - <b>decode</b>: this event is fired on postback in order to let the plugin decode the HTTP POST values
 *   sent by the browser. It is left to the plugin to decide where to store the decode data.
 *
 * - <b>dataBound</b>: this event is fired when plugin is loaded and ready - both on postback and the
 *   initial page display.
 *
 * - <b>render</b>: this event is fired when the plugin is required to render itself based on the data
 *   it got through the previous events. This function is only called on Smarty function plugins.
 *   The event handler is supposed to return the rendered output.
 *
 * - <b>renderBegin</b>: this event is for Smarty block plugins only. It is fired in order to allow
 *   the plugin to render something before the plugins contained within it.
 *
 * - <b>renderContent</b>: this event is for Smarty block plugins only. It is fired in order to allow
 *   the plugin to modify content renderes by the plugins contained within it.
 *
 * - <b>renderEnd</b>: this event is for Smarty block plugins only. It is fired in order to allow
 *   the plugin to render something after the plugins contained within it.
 *
 * - <b>postRender</b>: this event is fired after all rendering is done <i>for all plugins on the page</i>.
 *   In this event handler you can use {@link pnFormRender::pnFormGetPluginById()} to fetch other plugins
 *   and read/modify their data.
 *
 * Most events on one plugin happens before the next plugin is loaded (except the postRender event). So for two
 * plugins A and B you would get the event sequence (assuming B is placed after A in the Smarty template):
 * - A::create
 * - A::load
 * - ...
 * - A:render
 * - B::create
 * - B::load
 * - ...
 * - B:render
 * - A::postRender
 * - B::postRender
 *
 *
 * @package pnForm
 * @subpackage Base
 */
class pnFormPlugin
{
    /**
     * Plugin identifier
     *
     * This contains the identifier for the plugin. You can use this ID in {@link pnFormRender::pnFormGetPluginById()}
     * as well as in JavaScript where it should be set on the HTML elements (this does although depend on the plugin
     * implementation).
     *
     * Do <i>not</i> change this variable!
     *
     * @var string
     */
    var $id;

    /**
     * Specifies whether or not a plugin should be rendered
     *
     * @var bool
     */
    var $visible;

    /**
     * Reference to parent plugin if used inside a block
     *
     * @var &pnFormHandler
     */
    var $parentPlugin;

    /**
     * HTML attributes
     *
     * Associative array of attributes to add to the plugin. For instance:
     * array('title' => 'A tooltip title', onclick => 'doSomething()')
     *
     * @var array
     */
    var $attributes;

    /**
     * Name of function to call in form event handler when plugin is loaded
     *
     * If you need to notify the form event handler when the plugin has been loaded then
     * specify the name of this handler here. The prototype of the function must be:
     * function MyOnLoadHandler(&$render, &$plugin, $params) where $render is the form render,
     * $plugin is this plugin, and $params are the Smarty parameters passed to the plugin.
     *
     * The data bound handler is called both on postback and first page render.
     *
     * Example:
     * <code>
     * class MyPlugin extends pnFormPlugin
     * {
     *   function MyPlugin()
     *   {
     *      $this->onDataBound = 'MyLoadHandler';
     *   }
     * }
     *
     * class MyFormHandler extends pnFormHandler
     * {
     *   function MyLoadHandler(&$render, &$plugin, $params)
     *   {
     *     // Do stuff here
     *   }
     * }
     * </code>
     *
     * The name "dataBound" was chosen to avoid clashes with the "load" event.
     */
    var $onDataBound;

    /**
     * Reference to sub-plugins
     *
     * This variable contains an array of references to sub-plugins when this plugin is
     * a block plugin containing other plugins.
     * @var array
     */
    var $plugins;

    /**
     * Temporary storage of the output from renderBegin in blocks
     * @internal
     */
    var $blockBeginOutput;

    /**
     * Volatile indicator (disables state management in sub-plugins)
     * @internal
     * @var bool
     */
    var $volatile;

    /**
     * Constructor
     */
    function pnFormPlugin(&$render, &$params)
    {
        $this->plugins = array();
        $this->attributes = array();
        $this->visible = true;
    }

    /**
     * Read Smarty plugin parameters
     *
     * This is the function that takes care of reading smarty parameters and storing them in the member variables
     * or attributes (all unknown parameters go into the "attribues" array).
     * You can override this for special situations.
     * @return void
     */
    function readParameters(&$render, &$params)
    {
        $varInfo = get_class_vars(get_class($this));

        // Iterate through all params: place known params in member variables and the rest in the attributes set
        foreach ($params as $name => $value)
        {
            if (array_key_exists($name, $varInfo)) {
                $this->$name = $value;
            } else {
                $this->attributes[$name] = $value;
            }
        }
    }

    /**
     * Create event handler
     *
     * This fires once, immediately <i>after</i> member variables have been populated from Smarty parameters
     * (in {@link readParameters()}. Default action is to do nothing.
     *
     * @see pnFormRenderer::pnFormRegisterPlugin()
     *
     * @param pnFormRender &$render Reference to pnForm render object
     * @param array &$params Parameters passed from the Smarty plugin function
     * @return void
     */
    function create(&$render, &$params)
    {
    }

    /**
     * Load event handler
     *
     * This fires once, immediately <i>after</i> the create event. Default action is to do nothing.
     *
     * @see pnFormRenderer::pnFormRegisterPlugin()
     *
     * @param pnFormRender &$render Reference to pnForm render object
     * @param array &$params Parameters passed from the Smarty plugin function
     * @return void
     */
    function load(&$render, &$params)
    {
    }

    /**
     * Initialize event handler
     *
     * Default action is to do nothing. Typically used to add self as validator.
     *
     * @see pnFormPlugin
     * @param pnFormRender &$render Reference to pnForm render object
     * @return void
     */
    function initialize(&$render)
    {
    }

    /**
     * Decode event handler
     *
     * Default action is to do nothing
     *
     * @see pnFormPlugin
     * @param pnFormRender &$render Reference to pnForm render object
     * @param array &$params Parameters passed from the Smarty plugin function
     * @return void
     */
    function decode(&$render)
    {
    }

    /**
     * Decode event handler for actions that generate a postback event
     *
     * Default action is to do nothing. Usefull for buttons that should generate events
     * after the plugins have decoded their normal values.
     *
     * @param pnFormRender &$render Reference to pnForm render object
     * @param array &$params Parameters passed from the Smarty plugin function
     * @return void
     */
    function decodePostBackEvent(&$render)
    {
    }

    /**
     * DataBound event handler
     *
     * Default action is to call onDataBound handler in form event handler.
     *
     * @see pnFormPlugin
     * @param pnFormRender &$render Reference to pnForm render object
     * @param array &$params Parameters passed from the Smarty plugin function
     * @return void
     */
    function dataBound(&$render, &$params)
    {
        if ($this->onDataBound != null) {
            $dataBoundHandlerName = $this->onDataBound;
            $render->pnFormEventHandler->$dataBoundHandlerName($render, $this, $params);
        }
    }

    function renderAttributes(&$render)
    {
        $attr = '';
        foreach ($this->attributes as $name => $value) {
            $attr .= " $name=\"$value\"";
        }

        return $attr;
    }

    /**
     * Render event handler
     *
     * Default action is to return an empty string.
     *
     * @see pnFormPlugin
     * @param pnFormRender &$render Reference to pnForm render object
     * @param array &$params Parameters passed from the Smarty plugin function
     * @return string The rendered output
     */
    function render(&$render)
    {
        return '';
    }

    /**
     * RenderBegin event handler
     *
     * Default action is to return an empty string.
     *
     * @see pnFormPlugin
     * @param pnFormRender &$render Reference to pnForm render object
     * @return string The rendered output
     */
    function renderBegin(&$render)
    {
        return '';
    }

    /**
     * RenderContent event handler
     *
     * Default action is to return the content unmodified.
     *
     * @see pnFormPlugin
     * @param pnFormRender &$render Reference to pnForm render object
     *
     * @return string The (optionally) modified content
     */
    function renderContent(&$render, $content)
    {
        return $content;
    }

    /**
     * RenderEnd event handler
     *
     * Default action is to return an empty string.
     *
     * @see pnFormPlugin
     * @param pnFormRender &$render Reference to pnForm render object
     * @return string The rendered output
     */
    function renderEnd(&$render)
    {
        return '';
    }

    /**
     * PostRender event handler
     *
     * Default action is to do nothing.
     *
     * @see pnFormPlugin
     * @param pnFormRender &$render Reference to pnForm render object
     * @return void
     */
    function postRender(&$render)
    {
    }

    function registerPlugin(&$render, &$plugin)
    {
        $this->plugins[] = &$plugin;
    }

    /**
     * Utility function to generate HTML for ID attribute
     *
     * Generate id="..." for use in the plugin's render methods.
     *
     * This function ignores automatically created IDs (those named "plgNNN") and will
     * return an empty string for these.
     *
     * @return string
     */
    function getIdHtml($id = null)
    {
        if ($id == null) {
            $id = $this->id;
        }

        if (preg_match('/^plg[0-9]+$/', $id)) {
            return '';
        }

        return " id=\"$id\"";
    }
}

/**
 * Base plugin class for plugins that uses CSS styling
 *
 * This plugin adds attributes like "color", "back_groundcolor" and "font_weight" to plugins that extends it.
 * The extending plugin must call {@link pnFormPlugin::renderAttributes()} to use the added CSS features.
 * See also {@link pnFormTextInput} for an example implementation.
 *
 * The support CSS styles are listed in the $styleElements array. Please use this as a reference. Underscores
 * are converted to hyphens in the resulting output to match the correct CSS styles. When you need to use unsupported
 * CSS styles then just write them directly in the style parameter of the plugin:
 * <code>
 * <!--[pnformtextinput id="title" maxLength="100" width="30em" style="border-left: 1px solid red;"]-->
 * </code>
 *
 * You can also add styling in the code by adding key/value pairs to $styleAttributes. Example:
 * <code>
 * $this->styleAttributes['border-right'] = '1px solid green';
 * </code>
 *
 * @package pnForm
 * @subpackage Base
 */
class pnFormStyledPlugin extends pnFormPlugin
{
    /**
     * Styles added programatically
     *
     * @var array
     */
    var $styleAttributes = array();

    function renderAttributes(&$render)
    {
        static $styleElements = array('width', 'height', 'color', 'background_color', 'border', 'padding', 'margin', 'float', 'display', 'position', 'visibility', 'overflow', 'clip', 'font', 'font_family', 'font_style', 'font_weight', 'font_size');

        $attr = '';
        $style = '';
        foreach ($this->attributes as $name => $value)
        {
            if ($name == 'style') {
                $style = $value;
            } else if (in_array($name, $styleElements)) {
                $this->styleAttributes[$name] = $value;
            } else {
                $attr .= " $name=\"$value\"";
            }
        }

        $style = trim($style);
        if (count($this->styleAttributes) > 0 && strlen($style) > 0 && $style[strlen($style) - 1] != ';') {
            $style .= ';';
        }

        foreach ($this->styleAttributes as $name => $value) {
            $style .= str_replace('_', '-', $name) . ":$value;";
        }

        if (!empty($style)) {
            $attr .= " style=\"$style\"";
        }

        return $attr;
    }
}
