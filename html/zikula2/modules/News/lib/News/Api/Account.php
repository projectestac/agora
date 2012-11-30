<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Erik Spaan <erik@erikspaan.nl>
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage News
 */

class News_Api_Account extends Zikula_AbstractApi
{
    /**
     * Return an array of items to show in the your account panel
     *
     * @return   array
     */
    public function getall($args)
    {
        $items = array();
        $uname = (isset($args['uname'])) ? $args['uname'] : UserUtil::getVar('uname');
        // does this user exist?
        if(UserUtil::getIdFromName($uname)==false) {
            // user does not exist
            return $items;
        }

        // Create an array of links to return
        if (SecurityUtil::checkPermission('News::', '::', ACCESS_COMMENT)) {
            $items[] = array('url'     => ModUtil::url('News', 'user', 'newitem'),
                    'module'  => 'News',
                    'title'   => $this->__('Submit an article'),
                    'icon'    => 'news_add.gif');

            /* If users can save draft articles and the viewdraft function is implemented, this can be enabled
        $items[] = array('url'     => ModUtil::url('News', 'user', 'viewdraft'),
                         'module'  => 'News',
                         'title'   => __('View personal draft articles', $dom),
                         'icon'    => 'news_draft.gif');
            */

        }

        // Return the items
        return $items;
    }

}