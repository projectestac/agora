<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @version $Id: pnaccountapi.php 671 2010-03-17 08:27:30Z herr.vorragend $
 * @license See license.txt
 */

/**
* Return an array of items to show in the your account panel
*
* @return   array
*/
function EZComments_accountapi_getall($args)
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    $useAccountPage = pnModGetVar('EZComments', 'useaccountpage', '1');
    if ($useAccountPage) {
        // Create an array of links to return
        $items = array();
        $items['1'] = array('url'   => pnModURL('EZComments', 'user', 'main'),
                            'title' => __('Manage my comments', $dom),
                            'icon'  => 'mycommentsbutton.gif',
                            'set'   => null);
    }

    // Return the items
    return $items;
}
