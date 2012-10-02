<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 9 2008-11-05 21:42:16Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Referers
 */

/**
 * init module
 */
function Referers_init()
{
    $dom = ZLanguage::getModuleDomain('Referers');
    if (!DBUtil::createTable('referer')) {
        return false;
    }

    // Set module variables
    pnModSetVar('Referers', 'itemsperpage', 25);
    pnModSetVar('Referers', 'httpref', 0);
    pnModSetVar('Referers', 'httprefmax', 1000);
    
    // create the system init hook
    if (!pnModRegisterHook('zikula', 'systeminit', 'API', 'Referers', 'user', 'collect')) {
        return LogUtil::registerError(__('unable to create system init hook', $dom));
    }
    pnModAPIFunc('Modules', 'admin', 'enablehooks', array('callermodname' => 'zikula', 'hookmodname' => 'Referers'));
    LogUtil::registerStatus(__('Referers have been enabled, you can change this in the hook settings (Administration -> Modules -> System hooks) by deactivating the Referers systeminit hook for Zikula itself', $dom));

    return true;

}

/**
 * upgrade module
 */
function Referers_upgrade($oldversion)
{
    $dom = ZLanguage::getModuleDomain('Referers');
    if (!DBUtil::changeTable('referer')) {
        return false;
    }

    // Upgrade dependent on old version number
    switch($oldversion) {
        case 1.2:
            return Referers_upgrade(1.3);
            break;
        case 1.3:
            pnModSetVar('Referers', 'itemsperpage', 25);
            pnModSetVar('Referers', 'httpref', pnConfigGetVar('httpref'));
            pnConfigDelVar('httpref');
            pnModSetVar('Referers', 'httprefmax', pnConfigGetVar('httprefmax'));
            pnConfigDelVar('httprefmax');
            return Referers_upgrade(2.0);
        case 2.0:
            if (!pnModRegisterHook('zikula', 'systeminit', 'API', 'Referers', 'user', 'collect')) {
                return LogUtil::registerError(__('unable to create system init hook', $dom));
            }
            pnModAPIFunc('Modules', 'admin', 'enablehooks', array('callermodname' => 'zikula', 'hookmodname' => 'Referers'));
            LogUtil::registerStatus(__('Referers have been enabled, you can change this in the hook settings (Administration -> Modules -> System hooks) by deactivating the Referers systeminit hook for Zikula itself', $dom));
            return Referers_upgrade(2.1);
        case 2.1:
        
            break;
    }
    return true;
}

/**
 * delete module
 */
function Referers_delete()
{
    $dom = ZLanguage::getModuleDomain('Referers');
    if (!DBUtil::dropTable('referer')) {
        return false;
    }

    if (!pnModUnregisterHook('zikula', 'systeminit', 'API', 'Referers', 'user', 'collect')) {
        return LogUtil::registerError(__('unable to delete system init hook', $dom));
    }

    // Delete module variables
    pnModDelVar('Referers');

    return true;
}
