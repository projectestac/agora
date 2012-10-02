<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 335 2009-11-09 06:52:03Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Recommend_Us
 */

/**
 * Initialise the Recommend_Us module
 *
 * @author Jim McDonald
 * @return true if init success, false otherwise
 */
function Recommend_Us_init()
{
    $dom = ZLanguage::getModuleDomain('Recommend_Us');
    // Set up module variables

    // Set up module hooks
    if (!pnModRegisterHook('item', 'display', 'GUI', 'Recommend_Us', 'user', 'display')) {
        return LogUtil::registerError (__('Error! Failed to register hook.', $dom));
    }

    // Initialisation successful
    return true;
}

/**
 * Upgrade the Recommend_Us module from an old version
 *
 * @author Jim McDonald
 * @return true if upgrade success, false otherwise
 */
function Recommend_Us_upgrade($oldversion)
{
    $dom = ZLanguage::getModuleDomain('Recommend_Us');
    // Upgrade dependent on old version number
    switch($oldversion) {
        case '1.0':
            // Carry out other upgrades
                if (!pnModRegisterHook('item', 'display', 'GUI', 'Recommend_Us', 'user', 'display')) {
                    LogUtil::registerError (__('Error! Failed to register hook.', $dom));
                    return '1.0';
                }
    }
    return true;
}

/**
 * delete the Recommend_Us module
 *
 * @author Jim McDonald
 * @return true if delete success, false otherwise
 */
function Recommend_Us_delete()
{
    $dom = ZLanguage::getModuleDomain('Recommend_Us');
    // Remove module hooks
    if (!pnModUnregisterHook('item', 'display', 'GUI', 'Recommend_Us', 'user', 'display')) {
        return LogUtil::registerError (__('Error! Could not deregister hook.', $dom));
    }

    // Delete module variables
    pnModDelVar('Recommend_Us');

    // Deletion successful
    return true;
}
