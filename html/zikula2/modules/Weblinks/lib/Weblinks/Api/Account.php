<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
class Weblinks_Api_Account extends Zikula_AbstractApi
{

    /**
     * Return an array of items to show in the your account panel
     *
     * @params string $args['uname'] the user name
     * 
     * @return mixed array of items, or false on failure
     */
    public function getall($args)
    {
        // the array that will hold the options
        $items = null;

        // show link for users only
        if (!UserUtil::isLoggedIn()) {
            // not logged in
            return $items;
        }

        $uname = (isset($args['uname'])) ? $args['uname'] : UserUtil::getVar('uname');
        // does this user exist?
        if (UserUtil::getIdFromName($uname) == false) {
            // user does not exist
            return $items;
        }

        // Create an array of links to return
        if (SecurityUtil::checkPermission('Weblinks::Link', '::', ACCESS_ADD)) {
            $items = array(array('url' => ModUtil::url('Weblinks', 'user', 'addlink'),
                    'module' => 'core',
                    'set' => 'icons/large',
                    'title' => $this->__('Add link'),
                    'icon' => 'folder_html.png'));
        }

        // Return the items
        return $items;
    }

}