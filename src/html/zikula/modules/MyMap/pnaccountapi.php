<?php
/**
 * @package      MyMap
 * @version      $Id: pnaccountapi.php 90 2008-08-24 09:05:08Z quan $
 * @author       Florian Schieï¿œl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2008
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 
/**
 * Return an array of items to show in the your account panel
 *
 * @return   array   
 */
function MyMap_accountapi_getall($args)
{
    $dom = ZLanguage::getModuleDomain('MyMap');
    // Create an array of links to return
    pnModLangLoad('MyMap');
    $items = array(array('url'     => pnModURL('MyMap', 'user','main'),
                         'title'   => __('My maps and routes', $dom),
                         'icon'    => 'button.gif'));
    // Return the items
    return $items;
}
