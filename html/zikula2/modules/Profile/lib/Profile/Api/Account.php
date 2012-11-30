<?php
/**
 * Copyright Zikula Foundation 2009 - Profile module for Zikula
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/GPLv3 (or at your option, any later version).
 * @package Profile
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * The Account API provides links for modules on the "user account page"; this class provides them for the Profile module.
 */
class Profile_Api_Account extends Zikula_AbstractApi
{

    /**
     * Return an array of items to show in the "user account page".
     * 
     * Parameters passed in the $args array:
     * -------------------------------------
     * string uname The user name of the user for whom links should be returned; optional, defaults to the current user.
     * 
     * @param array $args All parameters passed to this function.
     *
     * @return   array   array of items, or false on failure
     */
    public function getall($args)
    {

        $items = array();

        // do not show the account links if Profile is not the Profile manager
        $profilemodule = System::getVar('profilemodule', '');
        if ($profilemodule != 'Profile') {
            return $items;
        }

        $uname = isset($args['uname']) ? $args['uname'] : null;
        if (!$uname && UserUtil::isLoggedIn()) {
            $uname = UserUtil::getVar('uname');
        }

        // Create an array of links to return
        if (!empty($uname)) {
            $uid = UserUtil::getIdFromName($uname);
            $items['0'] = array('url'     => ModUtil::url('Profile', 'user', 'view', array('uid' => $uid)),
                    'module'  => 'Profile',
                    //! account panel link
                    'title'   => $this->__('Personal info'),
                    'icon'    => 'admin.png');

            if (SecurityUtil::checkPermission('Profile:Members:', '::', ACCESS_READ)) {
                $items['1'] = array('url'     => ModUtil::url('Profile', 'user', 'viewmembers'),
                        'module'  => 'Profile',
                        'title'   => $this->__('Registered users list'),
                        'icon'    => 'members.png');
            }
        }

        // Return the items
        return $items;
    }
}