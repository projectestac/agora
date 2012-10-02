<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Mark West
 * @package Zikula_System_Modules
 * @subpackage Theme
 */

/**
 * initialise the theme module
 *
 * This function is only ever called once during the lifetime of a particular
 * module instance.
 * This function MUST exist in the pninit file for a module
 *
 * @author       Mark West
 * @return       bool       true on success, false otherwise
 */
function theme_init()
{
    // create the table
    if (!DBUtil::createTable('themes')) {
        return false;
    }

    // detect all themes on install
    pnModAPILoad('Theme', 'admin', true);
    pnModAPIFunc('Theme', 'admin', 'regenerate');

    // define defaults for module vars
    pnModSetVar('Theme', 'modulesnocache', '');
    pnModSetVar('Theme', 'enablecache', false);
    pnModSetVar('Theme', 'compile_check', true);
    pnModSetVar('Theme', 'cache_lifetime', 3600);
    pnModSetVar('Theme', 'force_compile', false);
    pnModSetVar('Theme', 'trimwhitespace', false);
    pnModSetVar('Theme', 'makelinks', false);
    pnModSetVar('Theme', 'maxsizeforlinks', 30);
    pnModSetVar('Theme', 'itemsperpage', 25);

    pnModSetVar('Theme', 'cssjscombine', false);
    pnModSetVar('Theme', 'cssjscompress', false);
    pnModSetVar('Theme', 'cssjsminify', false);
    pnModSetVar('Theme', 'cssjscombine_lifetime', 3600);

    // Initialisation successful
    return true;
}

/**
 * upgrade the theme module from an old version
 *
 * This function must consider all the released versions of the module!
 * If the upgrade fails at some point, it returns the last upgraded version.
 *
 * @author       Mark West
 * @param        string   $oldVersion   version number string to upgrade from
 * @return       mixed    true on success, last valid version string or false if fails
 */
function theme_upgrade($oldversion)
{
    // update the table
    if (!DBUtil::changeTable('themes')) {
        return false;
    }

    switch ($oldversion)
    {
        case '3.1':
            pnModSetVar('Theme', 'cssjscombine', false);
            pnModSetVar('Theme', 'cssjscompress', false);
            pnModSetVar('Theme', 'cssjsminify', false);
            pnModSetVar('Theme', 'cssjscombine_lifetime', 3600);

        case '3.3':
            // future upgrade routines
    }

    // Update successful
    return true;
}

/**
 * delete the theme module
 *
 * This function is only ever called once during the lifetime of a particular
 * module instance
 * This function MUST exist in the pninit file for a module
 *
 * Since the theme module should never be deleted we'all always return false here
 * @author       Mark West
 * @return       bool       false
 */
function theme_delete()
{
    // drop the table
    if (!DBUtil::dropTable('themes')) {
        return false;
    }

    // delete all module variables
    pnModDelVar('Theme');

    // Deletion not allowed
    return false;
}
