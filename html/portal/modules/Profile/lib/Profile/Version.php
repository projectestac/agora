<?php
/**
 * Copyright Zikula Foundation 2011 - Profile module for Zikula
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package Profile
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Profile module version information and other metadata.
 */
class Profile_Version extends Zikula_AbstractVersion
{
    /**
     * Provides an array of standard Zikula Extension metadata.
     * 
     * @return array Zikula Extension metadata.
     */
    public function getMetaData()
    {
        return array(
            'displayname'   => $this->__('Profile'),
            'description'   => $this->__('Provides a personal account control panel for each registered user, an interface to administer the personal information items displayed within it, and a registered users list functionality. Works in close unison with the \'Users\' module.'),

            'url'           => $this->__('profile'),

            'version'       => '1.6.1',
            'core_min' => '1.3.0', // Fixed to 1.3.x range
            'core_max' => '1.3.99', // Fixed to 1.3.x range

            'capabilities'  => array(
                'profile'                   => array(
                    'version'       => '1.0'
                ),
            ),

            'securityschema'=> array(
                'Profile::'                 => '::',
                'Profile::view'             => '::',
                'Profile::item'             => 'DynamicUserData PropertyName::DynamicUserData PropertyID',
                'Profile:Members:'          => '::',
                'Profile:Members:recent'    => '::',
                'Profile:Members:online'    => '::'
            ),
        );
    }
}