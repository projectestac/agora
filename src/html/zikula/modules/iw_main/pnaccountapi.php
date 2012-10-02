<?php
/**
 * @package      iw_main
 * @version      1.1
 * @author	   Albert P�rez Monfort
 * @link         http://phobos.xtec.cat/intraweb
 * @copyright    Copyright (C) 2009
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 
/**
 * Give access to personal configuration from their account panel
 *
 * @return   array   
 */
function iw_main_accountapi_getall($args)
{
	$dom = ZLanguage::getModuleDomain('iw_main');
    // Create an array of links to return
    pnModLangLoad('iw_main');
    $items = array(array('url'     => pnModURL('iw_main', 'user','main'),
                         'title'   => __('Configure', $dom),
                         'icon'    => 'admin.gif'));
    // Return the items
    return $items;
}
