<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnaccountapi.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */

/**
 * Give access to personal configuration from their account panel
 *
 * @return   array
 */
function Files_accountapi_getall($args)
{
    $dom = ZLanguage::getModuleDomain('Files');
    if (!SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADD)) {
        return false;
    }
    // create an array of links to return
    $items = array(array('url'     => pnModURL('Files', 'user','main'),
                         'title'   => __('File Manager', $dom),
                         'icon'    => 'user.gif'));
    // Return the items
    return $items;
}
