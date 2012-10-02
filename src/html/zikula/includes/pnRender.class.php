<?php
/**
 * $Id: pnRender.class.php 28073 2010-01-08 08:30:11Z drak $
 *
 * * pnRender *
 *
 * Zikula wrapper class for Smarty
 *
 * * License *
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License (GPL)
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * @author      Zikula development team
 * @version     .7/.8
 * @link        http://www.post-nuke.net              Zikula home page
 * @link        http://smarty.php.net                 Smarty home page
 * @license     http://www.gnu.org/copyleft/gpl.html  GNU General Public License
 * @package     Zikula_Core
 * @subpackage  pnAPI
 */

// keeping track if Smarty is loaded somewhere else!
if (!class_exists('Smarty')) {
    /**
     * The directory of Smarty
     */
    define('SMARTY_DIR', 'includes/classes/Smarty/');
    Loader::requireOnce(SMARTY_DIR . 'Smarty.class.php');
}

/**
 * Our class
 *
 * @package     Zikula_Core
 * @subpackage  pnAPI
 */
class pnRender extends Smarty
{
    /**
     * The module in  which the current template will be located
     */
    var $module;

    /**
     * The primary module for this page
     */
    var $toplevelmodule;

    /**
     * The full module info for wich the object is for
     */
    var $modinfo;

    /**
     * The current theme used by the site/user
     */
    var $theme;

    /**
     * The full theme info for the theme used by the site/user
     */
    var $themeinfo;

    /**
     * The current language used by the site/user
     */
    var $language;

    /**
     * The base URL of the site
     */
    var $baseurl;

    /**
     * The base URI of the site
     */
    var $baseuri;

    /**
     * The cache ID of the object
     */
    var $cache_id;

    /**
     * Set if Xanthia is an active module and templates stored in database
     */
    var $userdb;

    /**
     * true if admins wants to expose the template folder, needs admin rights for pnRender too
     */
    var $expose_template;

    // Gettext domain of the calling module
    var $renderDomain;

    /**
     * The class constructor.
     *
     * @param   string   $module   The module for which this object is for
     * @param   bool     $caching  (optional) Value for the caching class var -
     *                              default is void (i.e. use admin configured value
     */
    function pnRender($module = '', $caching = null)
    {
        // first, get a native Smarty object
        $this->Smarty();

        // set the error reporting level
        $this->error_reporting = isset($GLOBALS['PNConfig']['Debug']['error_reporting']) ? $GLOBALS['PNConfig']['Debug']['error_reporting'] : E_ALL;

        // Initialize the module property with the name of
        // the topmost module. For Hooks, Blocks, API Functions and others
        // you need to set this property to the name of the respective module!
        $this->toplevelmodule = pnModGetName();
        if (!$module) {
            $module = $this->toplevelmodule;
        }
        $this->module = array($module => pnModGetInfo(pnModGetIDFromName($module)));

        // initialise other PN environment vars
        $this->language = ZLanguage::getLanguageCode();
        $this->baseurl = pnGetBaseURL();
        $this->baseuri = pnGetBaseURI();

        // begin holder tag (be nice to others)
        $this->left_delimiter = '<!--[';
        // end holder tag
        $this->right_delimiter = ']-->';

        //---- Plugins handling -----------------------------------------------
        // add plugin paths
        $this->themeinfo = ThemeUtil::getInfo(ThemeUtil::getIDFromName(pnUserGetTheme()));
        $this->theme = $theme = $this->themeinfo['directory'];

        //$this->modinfo = $modinfo = pnModGetInfo(pnModGetIDFromName($module));
        $modpath = ($this->module[$module]['type'] == 3) ? 'system' : 'modules';
        // plugin paths are ordered so that we find the vast majority of plugins with as few path
        // searches as possible
        $pluginpaths = array('system/pnRender/plugins', 'system/Theme/plugins', 'config/plugins', "themes/$theme/templates/modules/$module/plugins", "themes/$theme/plugins",
                "$modpath/" . $this->module[$module]['directory'] . "/pntemplates/plugins");
        foreach ($pluginpaths as $pluginpath) {
            if (file_exists($pluginpath)) {
                array_push($this->plugins_dir, $pluginpath);
            }
        }

        // check if the recent 'type' parameter in the URL is admin and if yes,
        // include (modules|system)/Admin/pntemplates/plugins to the plugins_dir array
        $type = FormUtil::getPassedValue('type', null, 'GETPOST');
        if ($type === 'admin') {
            array_push($this->plugins_dir, 'system/Admin/pntemplates/plugins');
            $this->load_filter('output', 'admintitle');
        }

        /* // add the plugin directory for all available modules
        // TODO evaluate performance issues
        $modules = pnModGetAllMods();
        foreach ($modules as $module) {
            if ($module['type'] == 3) {
                array_push($this->plugins_dir, "system/$module[directory]/pntemplates/plugins");
            } else {
                array_push($this->plugins_dir, "modules/$module[directory]/pntemplates/plugins");
            }
        }
        */

        //---- Cache handling -------------------------------------------------
        // use HTML cache system?
        if (isset($caching) && is_bool($caching)) {
            $this->caching = $caching;
        } else {
            $this->caching = pnModGetVar('pnRender', 'cache');
        }
        $this->cache_lifetime = pnModGetVar('pnRender', 'lifetime');

        // HTML cache directory
        $this->cache_dir = CacheUtil::getLocalDir() . '/pnRender_cache';

        //---- Compilation handling -------------------------------------------
        // check for updated templates?
        $this->compile_check = pnModGetVar('pnRender', 'compile_check');

        // force compile template always?
        $this->force_compile = pnModGetVar('pnRender', 'force_compile');

        // don't use subdirectories when creating compiled/cached templates
        // this works better in a hosted environment
        $this->use_sub_dirs = false;

        // cache directory (compiled templates)
        $this->compile_dir = CacheUtil::getLocalDir() . '/pnRender_compiled';

        // compile id
        $this->compile_id = $this->toplevelmodule . '|' . $theme . '|' . Zlanguage::getLanguageCode();

        // initialize the cache ID
        $this->cache_id = '';

        // expose templates
        $this->expose_template = (pnModGetVar('pnRender', 'expose_template') == true) ? true : false;

        $this->register_block('nocache', 'pnRender_block_nocache', false);

        // register resource type 'pn'
        // this defines the way templates are searched during
        // <!--[ include file='my_template.html' ]-->
        // this enables us to store selected module templates in the
        // theme while others can be kept in the module itself.
        $this->register_resource('pn', array('pn_get_template',
                                             'pn_get_timestamp',
                                             'pn_get_secure',
                                             'pn_get_trusted'));

        // set 'pn' as default resource type
        $this->default_resource_type = 'pn';

        // For ajax requests we use the short urls filter to 'fix' relative paths
        if (($GLOBALS['loadstages'] & PN_CORE_AJAX) && pnConfigGetVar('shorturls')) {
            $this->load_filter('output', 'shorturls');
        }

        // register gettext prefilter
        $this->register_prefilter('z_filter_gettext_params');

        // Assign some useful theme settings
        // firstly all theme variables
        $this->assign(ThemeUtil::getVar());
        // secondly the base paths
        $this->assign('baseurl', $this->baseurl);
        $this->assign('baseuri', $this->baseuri);

        // lastly the theme paths
        $this->assign('themepath', $this->baseurl . 'themes/' . $theme);
        $this->assign('stylepath', $this->baseurl . 'themes/' . $theme . '/style');
        $this->assign('scriptpath', $this->baseurl . 'themes/' . $theme . '/javascript');
        $this->assign('imagepath', $this->baseurl . 'themes/' . $theme . '/images');
        $this->assign('imagelangpath', $this->baseurl . 'themes/' . $theme . '/images/' . $this->language);

        // for {gt} template plugin to detect gettext domain
        if ($this->module[$module]['i18n']) {
            $this->renderDomain = ZLanguage::getModuleDomain($this->module[$module]['name']);
        }

        // make render object available to modifiers
        // supress the output since this pass by reference is required
        $this->assign_by_ref('renderObject', $this);
    }

    /**
     * setup the current instance of the pnRender class and return it back to the module
     */
    function &getInstance($module = null, $caching = null, $cache_id = null, $add_core_data = false)
    {
        /**
         * static variable to hold the instance of this object when called in a singleton pattern
         */
        static $instance;
        if (!isset($instance)) {
            $instance = new pnRender($module, $caching);
        }
        if (!is_null($caching)) {
            $instance->caching = $caching;
        }
        if (!is_null($cache_id)) {
            $instance->cache_id = $cache_id;
        }
        if ($module === null) {
            $module = $instance->toplevelmodule;
        }
        if (!array_key_exists($module, $instance->module)) {
            $instance->module[$module] = pnModGetInfo(pnModGetIDFromName($module));
            //$instance->modinfo = pnModGetInfo(pnModGetIDFromName($module));
            $instance->_add_plugins_dir($module);
        }
        if ($add_core_data) {
            $instance->add_core_data();
        }

        // for {gt} template plugin to detect gettext domain
        if ($instance->module[$module]['i18n']) {
            $instance->renderDomain = ZLanguage::getModuleDomain($instance->module[$module]['name']);
        }

        // load the usemodules configuration if exists
        $modpath = ($instance->module[$module]['type'] == 3) ? 'system' : 'modules';
        $usepath = "$modpath/" . $instance->module[$module]['directory'] . '/pntemplates/config';
        $usemod_confs = array();
        $usemod_confs[] = "$usepath/usemodules.txt";
        $usemod_confs[] = "$usepath/usemodules"; // backward compat for < 1.2
        // load the config file
        foreach ($usemod_confs as $usemod_conf) {
	        if (is_readable($usemod_conf) && is_file($usemod_conf)) {
	            $additionalmodules = file($usemod_conf);
	            if (is_array($additionalmodules)) {
	                foreach ($additionalmodules as $addmod) {
	                    $instance->_add_plugins_dir(trim($addmod));
	                }
	            }
	        }
        }

        return $instance;
    }

    /**
     * Checks whether requested template exists.
     *
     * @param string $template
     */
    function template_exists($template)
    {
        return (bool) $this->get_template_path($template);
    }

    /**
     * Checks which path to use for required template
     *
     * @param string $template
     */
    function get_template_path($template)
    {
        static $cache = array();

        if (isset($cache[$template])) {
            return $cache[$template];
        }

        // the current module
        $pnmodgetname = pnModGetName();

        foreach ($this->module as $module => $modinfo) {
            // prepare the values for OS
            $os_pnmodgetname = DataUtil::formatForOS($pnmodgetname);
            $os_module = DataUtil::formatForOS($module);
            $os_modpath = DataUtil::formatForOS($modinfo['directory']);
            $os_theme = DataUtil::formatForOS($this->theme);

            // Define the locations in which we will look for templates
            // (in this order)
            // Note: Paths 1, 3, 5 and 7 - This allows for the hook or block functions
            // (such as ratings and comments) to use different templates depending
            // on the top level module. e.g. the comments dialog can be different
            // for news  and polls...
            // They are only evaluated when the calling module is not the current one.
            //
            // 1. The top level module directory in the requested module folder
            // in the theme directory.
            $themehookpath = "themes/$os_theme/templates/modules/$os_module/$os_pnmodgetname";
            // 2. The module directory in the current theme.
            $themepath = "themes/$os_theme/templates/modules/$os_module";
            // 3. The global template directory for the current top level module
            $globalhookpath = "config/templates/$os_module/$os_pnmodgetname";
            // 4. The global template directory
            $globalpath = "config/templates/$os_module";
            // 5. The top level module directory in the requested module folder
            // in the modules sub folder.
            $modhookpath = "modules/$os_module/pntemplates/$os_pnmodgetname";
            // 6. The module directory in the modules sub folder.
            $modpath = "modules/$os_module/pntemplates";
            // 7. The top level module directory in the requested module folder
            // in the system sub folder.
            $syshookpath = "system/$os_module/pntemplates/$os_pnmodgetname";
            // 8. The module directory in the system sub folder.
            $syspath = "system/$os_module/pntemplates";

            $ostemplate = DataUtil::formatForOS($template); //.'.htm';


            // check the module for which we're looking for a template is the
            // same as the top level mods. This limits the places to look for
            // templates.
            if ($module == $pnmodgetname) {
                $search_path = array($themepath, $globalpath, $modpath, $syspath);
            } else {
                $search_path = array($themehookpath, $themepath, $globalhookpath, $globalpath, $modhookpath, $modpath, $syshookpath, $syspath);
            }

            foreach ($search_path as $path) {
                if (file_exists("$path/$ostemplate") && is_readable("$path/$ostemplate")) {
                    $cache[$template] = $path;
                    return $path;
                }
            }
        }

        // when we arrive here, no path was found
        return false;
    }

    /**
     * executes & returns the template results
     *
     * This returns the template output instead of displaying it.
     * Supply a valid template name.
     * As an optional second parameter, you can pass a cache id.
     * As an optional third parameter, you can pass a compile id.
     *
     * @param   string   $template    the name of the template
     * @param   string   $cache_id    (optional) the cache ID
     * @param   string   $compile_id  (optional) the compile ID
     * @param   boolean  $display
     * @param   boolean  $reset (optional) reset singleton defaults
     * @return  string   the template output
     */
    function fetch($template, $cache_id = null, $compile_id = null, $display = false, $reset = true)
    {
        $this->_setup_template($template);

        if (!is_null($cache_id)) {
            $cache_id = $this->baseurl . '|' . $this->toplevelmodule . '|' . $cache_id;
        } else {
            $cache_id = $this->baseurl . '|' . $this->toplevelmodule . '|' . $this->cache_id;
        }

        $output = parent::fetch($template, $cache_id, $compile_id, $display);

        if ($this->expose_template == true) {
            $template = DataUtil::formatForDisplay($template);
            $output = "\n<!-- Start " . $this->template_dir . "/$template -->\n" . $output . "\n<!-- End " . $this->template_dir . "/$template -->\n";
        }

        // now we've got our output from this module reset our instance
        if ($reset) {
            //             $this->module = $this->toplevelmodule;
        }

        return $output;
    }

    /**
     * executes & displays the template results
     *
     * This displays the template.
     * Supply a valid template name.
     * As an optional second parameter, you can pass a cache id.
     * As an optional third parameter, you can pass a compile id.
     *
     * @param   string   $template    the name of the template
     * @param   string   $cache_id    (optional) the cache ID
     * @param   string   $compile_id  (optional) the compile ID
     * @return  void
     */
    function display($template, $cache_id = null, $compile_id = null)
    {
        echo $this->fetch($template, $cache_id, $compile_id);
    }

    /**
     * finds out if a template is already cached
     *
     * This returns true if there is a valid cache for this template.
     * Right now, we are just passing it to the original Smarty function.
     * We might introduce a function to decide if the cache is in need
     * to be refreshed...
     *
     * @param   string   $template    the name of the template
     * @param   string   $cache_id    (optional) the cache ID
     * @return  boolean
     */
    function is_cached($template, $cache_id = null, $compile_id = null)
    {
        // insert the condition to check the cache here!
        // if (functioncheckdb($this -> module)) {
        //        return parent :: clear_cache($template, $this -> cache_id);
        //}
        $this->_setup_template($template);

        if ($cache_id) {
            $cache_id = $this->baseurl . '|' . $this->toplevelmodule . '|' . $cache_id;
        } else {
            $cache_id = $this->baseurl . '|' . $this->toplevelmodule . '|' . $this->cache_id;
        }

        if (!isset($compile_id)) {
            $compile_id = $this->compile_id;
        }

        return parent::is_cached($template, $cache_id, $compile_id);
    }

    /**
     * clears the cache for a specific template
     *
     * This returns true if there is a valid cache for this template.
     * Right now, we are just passing it to the original Smarty function.
     * We might introduce a function to decide if the cache is in need
     * to be refreshed...
     *
     * @param   string   $template    the name of the template
     * @param   string   $cache_id    (optional) the cache ID
     * @param   string   $compile_id  (optional) the compile ID
     * @param   string   $expire      (optional) minimum age in sec. the cache file must be before it will get cleared.
     * @return  boolean
     */
    function clear_cache($template = null, $cache_id = null, $compile_id = null, $expire = null)
    {
        if ($cache_id) {
            $cache_id = $this->baseurl . '|' . $this->toplevelmodule . '|' . $cache_id;
        } else {
            $cache_id = $this->baseurl . '|' . $this->toplevelmodule . '|' . $this->cache_id;
        }

        return parent::clear_cache($template, $cache_id, $compile_id, $expire);
    }

    /**
     * clear the entire contents of cache (all templates)
     *
     * Smarty's original clear_all_cache function calls the subclasse's
     * clear_cache function. As we always prepend the module name, this
     * doesn't work here...
     *
     * @param string $exp_time expire time
     * @return boolean results of {@link smarty_core_rm_auto()}
     */
    function clear_all_cache($exp_time = null)
    {
        $res = parent::clear_cache(null, null, null, $exp_time);
        // recreate index.html file
        fclose(fopen($this->cache_dir . '/index.html', 'w'));
        return $res;
    }

    /**
     * set up paths for the template
     *
     * This function sets the template and the config path according
     * to where the template is found (Theme or Module directory)
     *
     * @param   string   $template   the template name
     * @access  private
     */
    function _setup_template($template)
    {
        // default directory for templates
        $this->template_dir = $this->get_template_path($template);
        //echo $this->template_dir . '<br>';
        $this->config_dir = $this->template_dir . '/config';
    }

    /**
     * add a plugins dir to _plugin_dir array
     *
     * This function takes  module name and adds two path two the plugins_dir array
     * when existing
     *
     * @param   string   $module    well known module name
     * @access  private
     */
    function _add_plugins_dir($module)
    {
        if (empty($module)) {
            return;
        }

        $modinfo = pnModGetInfo(pnModGetIDFromName($module));
        if (!$modinfo) {
            return;
        }

        $modpath = ($modinfo['type'] == 3) ? 'system' : 'modules';
        $mod_plugs = "$modpath/$modinfo[directory]/pntemplates/plugins";

        if (file_exists($mod_plugs)) {
            array_push($this->plugins_dir, $mod_plugs);
        }
    }

    /**
     * add core data to the template
     *
     * This function adds some basic data to the template depending on the
     * current user and the PN settings.
     *
     * @param   list of module names. all mod vars of these modules will be included too
     *          The mod vars of the current module will always be included
     * @return  boolean true if ok, otherwise false
     * @access  public
     */
    function add_core_data()
    {
        $pncore = array();
        $pncore['version_num'] = PN_VERSION_NUM;
        $pncore['version_id'] = PN_VERSION_ID;
        $pncore['version_sub'] = PN_VERSION_SUB;
        $pncore['logged_in'] = pnUserLoggedIn();
        $pncore['language'] = $this->language;
        $pncore['themeinfo'] = $this->themeinfo;

        // add userdata
        $pncore['user'] = pnUserGetVars(SessionUtil::getVar('uid'));

        // add modvars of current modules
        foreach ($this->module as $module => $dummy) {
            $pncore[$module] = pnModGetVar($module);
        }

        // add mod vars of all modules supplied as parameter
        $modulenames = func_get_args();
        foreach ($modulenames as $modulename) {
            // if the modulename is empty do nothing
            if (!empty($modulename) && !is_array($modulename) && !array_key_exists($modulename, $this->module)) {
                // check if user wants to have /PNConfig
                if ($modulename == PN_CONFIG_MODULE) {
                    $pnconfig = pnModGetVar(PN_CONFIG_MODULE);
                    foreach ($pnconfig as $key => $value) {
                        // gather all config vars
                        $pncore['pnconfig'][$key] = $value;
                    }
                } else {
                    $pncore[$modulename] = pnModGetVar($modulename);
                }
            }
        }

        // Module vars
        $this->assign('pncore', $pncore);
        return true;
    }
}

/**
 * Smarty block function to prevent template parts from being cached
 *
 * @param $param
 * @param $content
 * @param $smarty
 * @return string
 **/
function pnRender_block_nocache($param, $content, &$smarty)
{
    return $content;
}

/**
 * Smarty resource function to determine correct path for template inclusion
 *
 * For more information about parameters see http://smarty.php.net/manual/en/template.resources.php
 *
 * @access  private
 */
function pn_get_template($tpl_name, &$tpl_source, &$smarty)
{
    // determine the template path and store the template source
    // in $tpl_source


    // get path, checks also if tpl_name file_exists and is_readable
    $tpl_path = $smarty->get_template_path($tpl_name);

    if ($tpl_path !== false) {
        $tpl_source = file_get_contents(DataUtil::formatForOS($tpl_path . '/' . $tpl_name));
        if ($tpl_source !== false) {
            return true;
        }
    }

    return LogUtil::registerError(__f('Error! The template [%1$s] is not available in the [%2$s] module.', array($tpl_name, $smarty->toplevelmodule)));
}

function pn_get_timestamp($tpl_name, &$tpl_timestamp, &$smarty)
{
    // get the timestamp of the last change of the $tpl_name file


    // get path, checks also if tpl_name file_exists and is_readable
    $tpl_path = $smarty->get_template_path($tpl_name);

    if ($tpl_path !== false) {
        $tpl_timestamp = filemtime(DataUtil::formatForOS($tpl_path . '/' . $tpl_name));
        if ($tpl_timestamp !== false) {
            return true;
        }
    }

    return false;
}

function pn_get_secure($tpl_name, &$smarty)
{
    // assume all templates are secure
    return true;
}

function pn_get_trusted($tpl_name, &$smarty)
{
    // not used for templates
    return;
}

function z_filter_gettext_params($tpl_source, &$smarty)
{
    $tpl_source = (preg_replace_callback('#<!--\[(.*?)\]-->#', create_function('$m', 'return z_filter_gettext_params_callback($m);'), $tpl_source));
    $tpl_source = (preg_replace_callback('#%%%(("|\')(.*)("|\'))%%%#', create_function('$m', 'return "<!--[gt text=" . $m[1] ."]-->";'), $tpl_source));
    return $tpl_source;
}

function z_filter_gettext_params_callback($m)
{
    $m[1] = preg_replace('#__([a-zA-Z0-9]+=".*?(?<!\\\)")#', '$1|gt:$renderObject', $m[1]);
    $m[1] = preg_replace('#__([a-zA-Z0-9]+=\'.*?(?<!\\\)\')#', '$1|gt:$renderObject', $m[1]);
    return '<!--[' . $m[1] . ']-->';
}
