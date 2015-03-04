<?php

/**
 * @package      IWmain
 * @version      3.0
 * @author	 Albert Pérez Monfort
 * @link         http://phobos.xtec.cat/intraweb
 * @copyright    Copyright (C) 2009
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * Give access to personal configuration from their account panel
 *
 * @return   array   
 */
class IWusers_Api_Account extends Zikula_AbstractApi {

    public function getAll($args) {
        // Create an array of links to return
        $items = array();
        if (!ModUtil::getVar('IWusers', 'usersCanManageName') == 1 &&
                !ModUtil::getVar('IWusers', 'allowUserChangeAvatar') == 1 &&
                !ModUtil::getVar('IWusers', 'allowUserSetTheirSex') == 1 &&
                !ModUtil::getVar('IWusers', 'allowUserDescribeTheirSelves') == 1)
            return false;
        $items['1'] = array('url' => ModUtil::url('IWusers', 'user', 'profile'),
            'module' => 'IWusers',
            'title' => $this->__('Perfil'),
            'icon' => 'profile.png');
        // Return the items
        return $items;
    }

}