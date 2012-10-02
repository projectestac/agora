<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id:  $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Erik Spaan <erik@erikspaan.nl>
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage News
 */

/**
 * Return an array of items to show in the your account panel
 *
 * @return   array   
 */
function News_accountapi_getall($args)
{
    $dom = ZLanguage::getModuleDomain('News');

    $items = array();

    $uname = (isset($args['uname'])) ? $args['uname'] : pnUserGetVar('uname');
    // does this user exist?
    if(pnUserGetIDFromName($uname)==false) {
        // user does not exist
        return $items;
    }

    // Create an array of links to return
    if (SecurityUtil::checkPermission('News::', '::', ACCESS_COMMENT)) {
        $items[] = array('url'     => pnModURL('News', 'user', 'new'),
                         'module'  => 'News',
                         'title'   => __('Submit an article', $dom),
                         'icon'    => 'news_add.gif');

/* If users can save draft articles and the viewdraft function is implemented, this can be enabled
        $items[] = array('url'     => pnModURL('News', 'user', 'viewdraft'),
                         'module'  => 'News',
                         'title'   => __('View personal draft articles', $dom),
                         'icon'    => 'news_draft.gif');
*/                         

    }

    // Return the items
    return $items;
}

