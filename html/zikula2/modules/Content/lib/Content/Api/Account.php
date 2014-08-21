<?php

/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */
class Content_Api_Account extends Zikula_AbstractApi
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
        if (UserUtil::getIdFromName($uname) == false) {
            // user does not exist
            return $items;
        }

        // Create an array of links to return
        if (SecurityUtil::checkPermission('Content::', '::', ACCESS_EDIT)) {
            $items[] = array('url' => ModUtil::url('Content', 'admin', 'newpage'),
                'module' => 'Content',
                'title'  => $this->__('Add a new page'),
                'icon'   => 'content_add.gif');
        }

        // Return the items
        return $items;
    }
}
