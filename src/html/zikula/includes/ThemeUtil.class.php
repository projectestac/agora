<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnTheme.php 20730 2006-12-09 15:37:53Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Core
 * @subpackage ThemeUtil
 */

/**
 *  Theme filters
 */
define('PNTHEME_FILTER_ALL', 0);
define('PNTHEME_FILTER_USER', 1);
define('PNTHEME_FILTER_SYSTEM', 2);
define('PNTHEME_FILTER_ADMIN', 3);

/**
 *  Theme states
 */
define('PNTHEME_STATE_ALL', 0);
define('PNTHEME_STATE_ACTIVE', 1);
define('PNTHEME_STATE_INACTIVE', 2);

/**
 *  Theme types
 */
define('PNTHEME_TYPE_ALL', 0);
define('PNTHEME_TYPE_LEGACY', 1);
define('PNTHEME_TYPE_XANTHIA2', 2);
define('PNTHEME_TYPE_XANTHIA3', 3);
define('PNTHEME_TYPE_AUTOTHEME', 4);

/**
 * ThemeUtil
 *
 * @package Zikula_Core
 * @subpackage ThemeUtil
 */
class ThemeUtil
{
    /**
     * Load a theme
     *
     * include theme.php for the requested theme
     *
     * @return bool true if successful, false otherwiese
     */
    function load($theme)
    {
        static $loaded = 0;

        if ($loaded) {
            return true;
        }
        // Lots of nasty globals for back-compatability with older themes
        global $bgcolor1;
        global $bgcolor2;
        global $bgcolor3;
        global $bgcolor4;
        global $bgcolor5;
        global $sepcolor;
        global $textcolor1;
        global $textcolor2;
        global $postnuke_theme;
        global $thename;

        // get the theme info
        $themeinfo = ThemeUtil::getInfo(ThemeUtil::getIDFromName($theme));

        // note - don't use dbutil here since we require the vars in theme.php to be globals
        if ($themeinfo['type'] != 3) {
            $file = "themes/$themeinfo[directory]/theme.php";
            $result = false;
            if (!(file_exists($file) && Loader::includeOnce($file))) {
                return false;
            }
        } else {
            // initialise the engine
            $GLOBALS['theme_engine'] = new Theme($themeinfo['name'], true);
            // we're a xanthia theme
            $GLOBALS['xanthia_theme'] = true;

            // create some dummy functions - TODO fix this code deciding what to do with it
            function opentable()
            {
                echo $GLOBALS['theme_engine']->themetable(true, 1);
            }
            function closetable()
            {
                echo $GLOBALS['theme_engine']->themetable(false, 1);
            }
            function opentable2()
            {
                echo $GLOBALS['theme_engine']->themetable(true, 2);
            }
            function closetable2()
            {
                echo $GLOBALS['theme_engine']->themetable(false, 2);
            }
        }

        // now lets load the themes language file
        ThemeUtil::loadLanguage();

        // end of modification
        $loaded = 1;
        return true;
    }

    /**
     * return a theme variable
     *
     * @return mixed theme variable value
     */
    function getVar($name = null, $default = null)
    {
        static $themevars;

        if (!isset($themevars) && isset($GLOBALS['theme_engine']) && is_object($GLOBALS['theme_engine'])) {
            // initialise the holding array
            $themevars = array();

            // get the theme info
            $theme = pnUserGetTheme();
            $themeinfo = ThemeUtil::getInfo(ThemeUtil::getIDFromName($theme));

            // note - don't use dbutil here since we require the vars in theme.php to be globals
            if ($themeinfo['type'] == 3) {
                // load the config vars direct from the theme engine object
                $themevars = $GLOBALS['theme_engine']->get_config_vars();
            }

            // load the legacy globals
            $globalthemevars = array('bgcolor1', 'bgcolor2', 'bgcolor3', 'bgcolor4', 'bgcolor5', 'sepcolor', 'textcolor1', 'textcolor2');
            foreach ($globalthemevars as $globalthemevar) {
                if (isset($GLOBALS[$globalthemevar])) {
                    $themevars[$globalthemevar] == $GLOBALS[$globalthemevar];
                }
            }
        }

        // if no variable name is present then return all theme vars
        if (!isset($name)) {
            return $themevars;
        }

        // if a name is present and the variable exists return its value
        if (isset($themevars[$name])) {
            return $themevars[$name];
        }

        // not found the var so return the default
        return $default;
    }

    /**
     * getAllThemes
     *
     * list all available themes
     *
     * possible values of filter are
     * PNTHEME_FILTER_ALL - get all themes (default)
     * PNTHEME_FILTER_USER - get user themes
     * PNTHEME_FILTER_SYSTEM - get system themes
     * PNTHEME_FILTER_ADMIN - get admin themes
     *
     * @param filter - filter list of returned themes by type
     * @return array of available themes
     **/
    function getAllThemes($filter = PNTHEME_FILTER_ALL, $state = PNTHEME_STATE_ACTIVE, $type = PNTHEME_TYPE_ALL)
    {
        static $themesarray = array();

        $key = md5((string) $filter . (string) $state . (string) $type);

        if (empty($themesarray[$key])) {
            $pntable = pnDBGetTables();
            $themescolumn = $pntable['themes_column'];
            $whereargs = array();
            if ($state != PNTHEME_STATE_ALL) {
                $whereargs[] = "$themescolumn[state] = '" . DataUtil::formatForStore($state) . "'";
            }
            if ($type != PNTHEME_TYPE_ALL) {
                $whereargs[] = "$themescolumn[type] = '" . (int) DataUtil::formatForStore($type) . "'";
            }
            if ($filter == PNTHEME_FILTER_USER) {
                $whereargs[] = "$themescolumn[user] = '1'";
            }
            if ($filter == PNTHEME_FILTER_SYSTEM) {
                $whereargs[] = "$themescolumn[system] = '1'";
            }
            if ($filter == PNTHEME_FILTER_ADMIN) {
                $whereargs[] = "$themescolumn[admin] = '1'";
            }

            $where = implode($whereargs, ' AND ');
            $orderBy = "ORDER BY $themescolumn[name]";
            // define the permission filter to apply
            $permFilter = array(
                array('realm' => 0, 'component_left' => 'Theme', 'instance_left' => 'name', 'level' => ACCESS_READ));
            $themesarray[$key] = DBUtil::selectObjectArray('themes', $where, $orderBy, 0, -1, 'directory', $permFilter);
            if (!$themesarray[$key]) {
                return false;
            }
        }

        return $themesarray[$key];
    }

    /**
     * load the language file for a theme
     *
     * @deprecated required only for legacy language defines
     * @author Patrick Kellum
     * @return void
     */
    function loadLanguage($script = 'global', $theme = null)
    {
        $currentlang = ZLanguage::getLanguageCodeLegacy();
        $language = ZLanguage::lookupLegacyCode(pnConfigGetVar('language_i18n'));
        if ($theme == null) {
            $theme = pnUserGetTheme();
        }

        // get the theme info
        $themeinfo = ThemeUtil::getInfo(ThemeUtil::getIDFromName($theme));

        $_theme = DataUtil::formatForOS($themeinfo['directory']);
        $_cLang = DataUtil::formatForOS($currentlang);
        $_lang = DataUtil::formatForOS($language);
        $_script = DataUtil::formatForOS($script);

        $files = array();
        $files[] = 'themes/' . $_theme . '/lang/' . $_cLang . '/' . $_script . '.php';
        $files[] = 'themes/' . $_theme . '/lang/' . $_lang . '/' . $_script . '.php';
        Loader::loadOneFile($files);

        return;
    }

    /**
     * getIDFromName
     *
     * get themeID given its name
     *
     * @author Mark West
     * @link http://www.markwest.me.uk
     * @param 'theme' the name of the theme
     * @return int theme ID
     */
    function getIDFromName($theme)
    {
        // define input, all numbers and booleans to strings
        $theme = (isset($theme) ? strtolower((string) $theme) : '');

        // validate
        if (!pnVarValidate($theme, 'theme')) {
            return false;
        }

        static $themeid;

        if (!is_array($themeid) || !isset($themeid[$theme])) {
            $themes = ThemeUtil::getThemesTable();

            if ($themes === false) {
                return;
            }

            foreach ($themes as $themeinfo) {
                $tName = strtolower($themeinfo['name']);
                $themeid[$tName] = $themeinfo['id'];
                if (isset($themeinfo['displayname']) && $themeinfo['displayname']) {
                    $tdName = strtolower($themeinfo['displayname']);
                    $themeid[$tdName] = $themeinfo['id'];
                }
            }

            if (!isset($themeid[$theme])) {
                $themeid[$theme] = false;
                return false;
            }
        }

        if (isset($themeid[$theme])) {
            return $themeid[$theme];
        }

        return false;
    }

    /**
     * getInfo
     *
     * Returns information about a theme.
     *
     * @author Mark West
     * @param string $themeid Id of the theme
     * @return array the theme information
     **/
    function getInfo($themeid)
    {
        if ($themeid == 0 || !is_numeric($themeid)) {
            return false;
        }

        static $themeinfo;

        if (!is_array($themeinfo) || !isset($themeinfo[$themeid])) {
            $themeinfo = ThemeUtil::getThemesTable();

            if (!$themeinfo) {
                return;
            }

            if (!isset($themeinfo[$themeid])) {
                $themeinfo[$themeid] = false;
                return $themeinfo[$themeid];
            }
        }

        return $themeinfo[$themeid];
    }

    /**
     * gets the themes table
     *
     * small wrapper function to avoid duplicate sql
     * @access private
     * @return array modules table
     */
    function getThemesTable()
    {
        static $themestable;
        if (!isset($themestable) || defined('_PNINSTALLVER')) {
            $array = DBUtil::selectObjectArray('themes', '', '', -1, -1, 'id');
            foreach ($array as $theme) {
                $theme['i18n'] = (is_dir("themes/$theme[name]/locale") ? 1 : 0);
                $themestable[$theme['id']] = $theme;
            }
        }

        return $themestable;
    }

    /**
     * get the modules stylesheet from several possible sources
     *
     *@access public
     *@param string $modname    the modules name (optional, defaults to top level module)
     *@param string $stylesheet the stylesheet file (optional)
     *@return string path of the stylesheet file, relative to PN root folder
     */
    function getModuleStylesheet($modname = '', $stylesheet = '')
    {
        // default for the module
        if (empty($modname)) {
            $modname = pnModGetName();
        }

        // default for the style sheet
        if (empty($stylesheet)) {
            $stylesheet = pnModGetVar($modname, 'modulestylesheet');
            if (empty($stylesheet)) {
                $stylesheet = 'style.css';
            }
        }

        $osstylesheet = DataUtil::formatForOS($stylesheet);
        $osmodname = DataUtil::formatForOS($modname);

        // config directory
        $configstyledir = 'config/styles';
        $configpath = "$configstyledir/$osmodname";

        // theme directory
        $theme = DataUtil::formatForOS(pnUserGetTheme());
        $themepath = "themes/$theme/style/$osmodname";

        // module directory
        $modinfo = pnModGetInfo(pnModGetIDFromName($modname));
        $osmoddir = DataUtil::formatForOS($modinfo['directory']);
        $modpath = "modules/$osmoddir/pnstyle";
        $syspath = "system/$osmoddir/pnstyle";

        // search for the style sheet
        $csssrc = '';
        foreach (array($configpath, $themepath, $modpath, $syspath) as $path) {
            if (file_exists("$path/$osstylesheet") && is_readable("$path/$osstylesheet")) {
                $csssrc = "$path/$osstylesheet";
                break;
            }
        }
        return $csssrc;
    }
}
