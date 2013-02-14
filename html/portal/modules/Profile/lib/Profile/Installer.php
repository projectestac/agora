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
 * Profile module installer.
 */
class Profile_Installer extends Zikula_AbstractInstaller
{
    /**
     * Provides an array containing default values for module variables (settings).
     *
     * @return array An array indexed by variable name containing the default values for those variables.
     */
    protected function getDefaultModVars()
    {
        return array(
            'memberslistitemsperpage'   => 20,
            'onlinemembersitemsperpage' => 20,
            'recentmembersitemsperpage' => 10,
            'filterunverified'          => 1,
        );
    }

    /**
     * Initialise the dynamic user data  module.
     *
     * @return boolean True on success or false on failure.
     */
    public function install()
    {
        if (!DBUtil::createTable('user_property')) {
            return false;
        }

        $this->setVars($this->getDefaultModVars());

        // create the default data for the module
        $this->defaultdata();
        EventUtil::registerPersistentEventHandlerClass($this->name, 'Profile_Listener_UsersUiHandler');

        // Initialisation successful
        return true;
    }

    /**
     * Upgrade the dynamic user data module from an old version.
     * 
     * @param string $oldversion The version from which the upgrade is beginning (the currently installed version); this should be compatible 
     *                              with {@link version_compare()}.
     * 
     * @return boolean True on success or false on failure.
     */
    public function upgrade($oldversion)
    {
        switch ($oldversion)
        {
            case '1.5.2':
                // 1.5.2 -> 1.6.0
                EventUtil::registerPersistentEventHandlerClass($this->name, 'Profile_Listener_UsersUiHandler');
                $connection = Doctrine_Manager::getInstance()->getConnection('default');
                $sqlStatements = array();
                // N.B. statements generated with PHPMyAdmin
                $sqlStatements[] = 'RENAME TABLE ' . DBUtil::getLimitedTablename('user_property') . " TO user_property";
                $sqlStatements[] = "ALTER TABLE `user_property` CHANGE  `pn_prop_id`  `id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
CHANGE  `pn_prop_label`  `label` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE  `pn_prop_dtype`  `dtype` INT( 11 ) NOT NULL DEFAULT  '0',
CHANGE  `pn_prop_modname`  `modname` VARCHAR( 64 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE  `pn_prop_weight`  `weight` INT( 11 ) NOT NULL DEFAULT  '0',
CHANGE  `pn_prop_validation`  `validation` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
CHANGE  `pn_prop_attribute_name`  `attributename` VARCHAR( 80 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL";
                foreach ($sqlStatements as $sql) {
                    $stmt = $connection->prepare($sql);
                    try {
                        $stmt->execute();
                    } catch (Exception $e) {
                    }   
                }
                
            case '1.6.0':
            case '1.6.1':
                // 1.6.0 -> X.X.X when appropriate.
        }

        $modVars = $this->getVars();
        $defaultModVars = $this->getDefaultModVars();

        // Remove modvars no longer in the default set.
        foreach ($modVars as $modVar => $value) {
            if (!array_key_exists($modVar, $defaultModVars)) {
                $this->delVar($modVar);
            }
        }

        // Add vars defined in the default set, but missing from the current set.
        foreach ($defaultModVars as $modVar => $value) {
            if (!array_key_exists($modVar, $modVars)) {
                $this->setVar($modVar, $value);
            }
        }

        // Update successful
        return true;
    }

    /**
     * Delete the dynamic user data module.
     *
     * @return boolean True on success or false on failure.
     */
    public function uninstall()
    {
        if (!DBUtil::dropTable('user_property')) {
            return false;
        }

        // Delete any module variables
        $this->delVars();

        // Deletion successful
        return true;
    }

    /**
     * Create the default data for the users module.
     *
     * @return void
     */
    protected function defaultdata()
    {
        // Make assumption that if were upgrading from 76x to 1.x
        // that user properties already exist and abort inserts.
        if (isset($_SESSION['_PNUpgrader']['_PNUpgradeFrom76x'])) {
            return;
        }

        // _UREALNAME
        $record = array();
        $record['prop_label']          = no__('_UREALNAME');
        $record['prop_dtype']          = '1';
        $record['prop_weight']         = '1';
        $record['prop_validation']     = serialize(array('required' => 0, 'viewby' => 0, 'displaytype' => 0, 'listoptions' => '', 'note' => ''));
        $record['prop_attribute_name'] = 'realname';

        DBUtil::insertObject($record, 'user_property', 'prop_id');

        // _UFAKEMAIL
        $record = array();
        $record['prop_label']          = no__('_UFAKEMAIL');
        $record['prop_dtype']          = '1';
        $record['prop_weight']         = '2';
        $record['prop_validation']     = serialize(array('required' => 0, 'viewby' => 0, 'displaytype' => 0, 'listoptions' => '', 'note' => ''));
        $record['prop_attribute_name'] = 'publicemail';

        DBUtil::insertObject($record, 'user_property', 'prop_id');

        // _YOURHOMEPAGE
        $record = array();
        $record['prop_label']          = no__('_YOURHOMEPAGE');
        $record['prop_dtype']          = '1';
        $record['prop_weight']         = '3';
        $record['prop_validation']     = serialize(array('required' => 0, 'viewby' => 0, 'displaytype' => 0, 'listoptions' => '', 'note' => ''));
        $record['prop_attribute_name'] = 'url';

        DBUtil::insertObject($record, 'user_property', 'prop_id');

        // _TIMEZONEOFFSET
        $record = array();
        $record['prop_label']          = no__('_TIMEZONEOFFSET');
        $record['prop_dtype']          = '1';
        $record['prop_weight']         = '4';
        $record['prop_validation']     = serialize(array('required' => 0, 'viewby' => 0, 'displaytype' => 4, 'listoptions' => '', 'note' => ''));
        $record['prop_attribute_name'] = 'tzoffset';

        DBUtil::insertObject($record, 'user_property', 'prop_id');

        // _YOURAVATAR
        $record = array();
        $record['prop_label']          = no__('_YOURAVATAR');
        $record['prop_dtype']          = '1';
        $record['prop_weight']         = '5';
        $record['prop_validation']     = serialize(array('required' => 0, 'viewby' => 0, 'displaytype' => 4, 'listoptions' => '', 'note' => ''));
        $record['prop_attribute_name'] = 'avatar';

        DBUtil::insertObject($record, 'user_property', 'prop_id');

        // _YICQ
        $record = array();
        $record['prop_label']          = no__('_YICQ');
        $record['prop_dtype']          = '1';
        $record['prop_weight']         = '6';
        $record['prop_validation']     = serialize(array('required' => 0, 'viewby' => 0, 'displaytype' => 0, 'listoptions' => '', 'note' => ''));
        $record['prop_attribute_name'] = 'icq';

        DBUtil::insertObject($record, 'user_property', 'prop_id');

        // _YAIM
        $record = array();
        $record['prop_label']          = no__('_YAIM');
        $record['prop_dtype']          = '1';
        $record['prop_weight']         = '7';
        $record['prop_validation']     = serialize(array('required' => 0, 'viewby' => 0, 'displaytype' => 0, 'listoptions' => '', 'note' => ''));
        $record['prop_attribute_name'] = 'aim';

        DBUtil::insertObject($record, 'user_property', 'prop_id');

        // _YYIM
        $record = array();
        $record['prop_label']          = no__('_YYIM');
        $record['prop_dtype']          = '1';
        $record['prop_weight']         = '8';
        $record['prop_validation']     = serialize(array('required' => 0, 'viewby' => 0, 'displaytype' => 0, 'listoptions' => '', 'note' => ''));
        $record['prop_attribute_name'] = 'yim';

        DBUtil::insertObject($record, 'user_property', 'prop_id');

        // _YMSNM
        $record = array();
        $record['prop_label']          = no__('_YMSNM');
        $record['prop_dtype']          = '1';
        $record['prop_weight']         = '9';
        $record['prop_validation']     = serialize(array('required' => 0, 'viewby' => 0, 'displaytype' => 0, 'listoptions' => '', 'note' => ''));
        $record['prop_attribute_name'] = 'msnm';

        DBUtil::insertObject($record, 'user_property', 'prop_id');

        // _YLOCATION
        $record = array();
        $record['prop_label']          = no__('_YLOCATION');
        $record['prop_dtype']          = '1';
        $record['prop_weight']         = '10';
        $record['prop_validation']     = serialize(array('required' => 0, 'viewby' => 0, 'displaytype' => 0, 'listoptions' => '', 'note' => ''));
        $record['prop_attribute_name'] = 'city';

        DBUtil::insertObject($record, 'user_property', 'prop_id');

        // _YOCCUPATION
        $record = array();
        $record['prop_label']          = no__('_YOCCUPATION');
        $record['prop_dtype']          = '1';
        $record['prop_weight']         = '11';
        $record['prop_validation']     = serialize(array('required' => 0, 'viewby' => 0, 'displaytype' => 0, 'listoptions' => '', 'note' => ''));
        $record['prop_attribute_name'] = 'occupation';

        DBUtil::insertObject($record, 'user_property', 'prop_id');

        // _SIGNATURE
        $record = array();
        $record['prop_label']          = no__('_SIGNATURE');
        $record['prop_dtype']          = '1';
        $record['prop_weight']         = '12';
        $record['prop_validation']     = serialize(array('required' => 0, 'viewby' => 0, 'displaytype' => 1, 'listoptions' => '', 'note' => ''));
        $record['prop_attribute_name'] = 'signature';

        DBUtil::insertObject($record, 'user_property', 'prop_id');

        // _EXTRAINFO
        $record = array();
        $record['prop_label']          = no__('_EXTRAINFO');
        $record['prop_dtype']          = '1';
        $record['prop_weight']         = '13';
        $record['prop_validation']     = serialize(array('required' => 0, 'viewby' => 0, 'displaytype' => 1, 'listoptions' => '', 'note' => ''));
        $record['prop_attribute_name'] = 'extrainfo';

        DBUtil::insertObject($record, 'user_property', 'prop_id');

        // _YINTERESTS
        $record = array();
        $record['prop_label']          = no__('_YINTERESTS');
        $record['prop_dtype']          = '1';
        $record['prop_weight']         = '14';
        $record['prop_validation']     = serialize(array('required' => 0, 'viewby' => 0, 'displaytype' => 1, 'listoptions' => '', 'note' => ''));
        $record['prop_attribute_name'] = 'interests';

        DBUtil::insertObject($record, 'user_property', 'prop_id');

        // set realname, homepage, timezone offset, location and ocupation
        // to be shown in the registration form by default
        $this->setVar('dudregshow', array(1, 3, 4, 10, 11));
    }
}