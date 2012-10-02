<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnTheme.php 27233 2009-10-27 20:07:15Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Core
 * @subpackage pnAPI
*/


/**
 * Load a theme
 *
 * include theme.php for the requested theme
 *
 * @return bool true if successful, false otherwiese
 */
function pnThemeLoad($theme)
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnThemeLoad()', 'ThemeUtil::load()')), 'STRICT');

    return ThemeUtil::load($theme);
}

/**
 * return a theme variable
 *
 * @return mixed theme variable value
 */
function pnThemeGetVar($name = null, $default = null)
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnThemeGetVar()', 'ThemeUtil::getVar()')), 'STRICT');

    return ThemeUtil::getVar($name, $default);
}

/**
 * pnThemeGetAllThemes
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
function pnThemeGetAllThemes($filter = PNTHEME_FILTER_ALL, $state = PNTHEME_STATE_ACTIVE, $type = PNTHEME_TYPE_ALL)
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnThemeGetAllThemes()', 'ThemeUtil::getAllThemes()')), 'STRICT');

    return ThemeUtil::getAllThemes($filter, $state, $type);
}

/**
 * load the language file for a theme
 *
 * @author Patrick Kellum
 * @return void
 */
function pnThemeLangLoad($script = 'global', $theme = null)
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnThemeLangLoad()', 'ThemeUtil::loadLanguage()')), 'STRICT');

    ThemeUtil::loadLanguage($script, $theme);
    return;
}

/**
 * pnThemeGetIDFromName
 *
 * get themeID given its name
 *
 * @author Mark West
 * @link http://www.markwest.me.uk
 * @param 'theme' the name of the theme
 * @return int theme ID
 */
function pnThemeGetIDFromName($theme)
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnThemeGetIDFromName()', 'ThemeUtil::getIDFromName()')), 'STRICT');

    return ThemeUtil::getIDFromName($theme);
}

/**
 * pnThemeGetInfo
 *
 * Returns information about a theme.
 *
 * @author Mark West
 * @param string $themeid Id of the theme
 * @return array the theme information
 **/
function pnThemeGetInfo($themeid)
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnThemeGetInfo()', 'ThemeUtil::getInfo()')), 'STRICT');

    return ThemeUtil::getInfo($themeid);
}

/**
 * gets the themes table
 *
 * small wrapper function to avoid duplicate sql
 * @access private
 * @return array modules table
*/
function pnThemeGetThemesTable()
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnThemeGetThemesTable()', 'ThemeUtil::getThemesTable()')), 'STRICT');

    return ThemeUtil::getThemesTable();
}
