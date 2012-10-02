<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnaccountapi.php 27365 2009-11-02 18:30:56Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Mark West
 * @package Zikula_System_Modules
 * @subpackage Theme
 */

/**
 * Return an array of items to show in the your account panel
 *
 * @return   array   indexed array of items
 */
function Theme_accountapi_getall($args)
{
    $items = array();

    // check if theme switching is allowed
    if (pnConfigGetVar('theme_change')) {
        // create an array of links to return
        $items['0'] = array('url' => pnModURL('Theme', 'user'),
                            'module' => 'core',
                            'set' => 'icons/large',
                            'title' => __('Theme switcher'),
                            'icon' => 'package_graphics.gif');
    }

    // Return the items
    return $items;
}
