<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package     Zikula_System_Modules
 * @subpackage  pnRender
 */

 /**
  * initialise the pnRender module
  *
  * This function initializes pnRender settings.
  *
  * @author       Joerg Napp
  * @return       boolean true on success, false otherwise.
  */
function pnRender_init()
{
    // now the main initialisation
    pnModSetVar('pnRender', 'compile_check',  true);
    pnModSetVar('pnRender', 'force_compile',  false);
    pnModSetVar('pnRender', 'cache',          false);
    pnModSetVar('pnRender', 'expose_template',false);
    pnModSetVar('pnRender', 'lifetime',       3600);

    // Initialisation successful
    return true;
}

/**
 * upgrade the pnRender module from an old version
 *
 * This function must consider all the released versions of the module!
 * If the upgrade fails at some point, it returns the last upgraded version.
 *
 * @author       Joerg Napp
 * @param        string   $oldVersion   version number string to upgrade from
 * @return       mixed    true on success, last valid version string or false if fails
 */
function pnRender_upgrade($oldversion)
{
    return true;
}

/**
 * delete the pnRender module
 *
 * This function deletes pnRender settings.
 * (Not sure if that should ever happen!)
 *
 * @author       Joerg Napp
 * @return       boolean true on success, false otherwise.
 */
function pnRender_delete()
{
    // delete all module vars
    pnModDelVar('pnRender');

    // Deletion successful
    return true;
}
