<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 105 2010-02-05 17:08:33Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Profile
 * @author Mark West
*/

/**
 * Initialise the dynamic user data  module
 *
 * @author Mark West
 * @return bool true on success or false on failure
 */
function Profile_init()
{
    if (!DBUtil::createTable('user_property')) {
        return false;
    }

    pnModSetVar('Profile', 'memberslistitemsperpage', 20);
    pnModSetVar('Profile', 'onlinemembersitemsperpage', 20);
    pnModSetVar('Profile', 'recentmembersitemsperpage', 10);
    pnModSetVar('Profile', 'filterunverified', 1);
    
    pnModSetVar('Profile', 'dudtextdisplaytags', 0);

    // create the default data for the module
    Profile_defaultdata();

    // Initialisation successful
    return true;
}

/**
 * Upgrade the dynamic user data module from an old version
 * This function can be called multiple times
 * @author Mark West
 * @param int $oldversion version to upgrade from
 * @return bool true on success or false on failure
 */
function Profile_upgrade($oldversion)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    // in mysql 5 strict mode we need to set any null values before changing the table
    $table = DBUtil::getLimitedTableName('user_property');
    DBUtil::executeSQL("UPDATE {$table} SET pn_prop_validation = '' WHERE pn_prop_validation IS NULL");

    if (version_compare($oldversion, '1.0', '<')) {
        if (!DBUtil::changeTable('user_property')) {
            return $oldversion;
        }
    }

    switch ($oldversion)
    {
        case '0.8':
            // fix the data types of any existing properties
            DBUtil::executeSQL("UPDATE {$table} SET pn_prop_dtype = '1' WHERE pn_prop_dtype = '0'");

        case '1.1':
            pnModSetVar('Profile', 'memberslistitemsperpage',   pnModGetVar('Members_List', 'memberslistitemsperpage', 20));
            pnModSetVar('Profile', 'onlinemembersitemsperpage', pnModGetVar('Members_List', 'onlinemembersitemsperpage', 20));
            pnModSetVar('Profile', 'recentmembersitemsperpage', pnModGetVar('Members_List', 'recentmembersitemsperpage', 10));
            pnModSetVar('Profile', 'filterunverified',          pnModGetVar('Members_List', 'filterunverified', 1));
            pnModDelVar('Members_List');

            // upgrade blocks table to migrate Members_List blocks to Profile
            $btable = DBUtil::getLimitedTablename('blocks');
            $oldModuleID = pnModGetIDFromName('Members_List');
            $newModuleID = pnModGetIDFromName('Profile');
            DBUtil::executeSQL("UPDATE {$btable} SET pn_mid = '{$newModuleID}' WHERE pn_mid = '{$oldModuleID}'");

        case '1.2':
            // dependencies do not work during upgrade yet so we check it manually
            $usersmod = pnModGetInfo(pnModGetIDFromName('Users'));
            if (version_compare($usersmod['version'], '1.9', '<=')) {
                LogUtil::registerError(__("Error! The 'Users' module must be upgraded to version 1.10 before you can upgrade the 'Profile' module.", $dom));
                return '1.2';
            }

        case '1.3':
            pnModSetVar('Profile', 'dudtextdisplaytags', 0);

        case '1.4':
            // remove definitely the user_data table
            // its contents has been moved to attributes
            // during the upgrade of the Users module in Zk 1.2
            if (!DBUtil::dropTable('user_data')) {
                return '1.4';
            }

            if (!DBUtil::changeTable('user_property')) {
                return '1.4';
            }

            // re-update the old DUDs
            // this array maps old DUDs to new attributes
            $mappingarray = array('_UREALNAME'      => 'realname',
                                  '_UFAKEMAIL'      => 'publicemail',
                                  '_YOURHOMEPAGE'   => 'url',
                                  '_TIMEZONEOFFSET' => 'tzoffset',
                                  '_YOURAVATAR'     => 'avatar',
                                  '_YLOCATION'      => 'city',
                                  '_YICQ'           => 'icq',
                                  '_YAIM'           => 'aim',
                                  '_YYIM'           => 'yim',
                                  '_YMSNM'          => 'msnm',
                                  '_YOCCUPATION'    => 'occupation',
                                  '_SIGNATURE'      => 'signature',
                                  '_EXTRAINFO'      => 'extrainfo',
                                  '_YINTERESTS'     => 'interests');

            // load the user properties into an assoc array with prop_label as key
            $userprops = DBUtil::selectObjectArray('user_property', '', '', -1, -1, 'prop_label');
            $existing  = DBUtil::selectFieldArray('objectdata_attributes', 'attribute_name', "oba_object_type = 'users'", '', true);

            $newprops = array();
            // expand the old DUDs with the new attribute names
            foreach ($userprops as $prop_label => $userprop)
            {
                if (in_array($prop_label, array('_PASSWORD', '_UREALEMAIL'))) {
                    // delete these props as they are not needed any longer
                    DBUtil::deleteObjectByID('user_property', $userprop['prop_id'], 'prop_id');
                    // and then
                    continue;
                }

                if (array_key_exists($prop_label, $mappingarray)) {
                    // old DUD found
                    $userprop['prop_attribute_name'] = $mappingarray[$prop_label];

                } elseif (empty($userprop['prop_attribute_name']) || !in_array($userprop['prop_attribute_name'], $existing)) {
                    // seems to be user defined, dont touch it
                    $userprop['prop_attribute_name'] = $prop_label;
                }

                // set the types to 'Normal'
                $userprop['prop_dtype'] = 1;
                $newprops[] = $userprop;
            }
            unset($userprops);
            unset($existing);

            // store updated properties
            DBUtil::updateObjectArray($newprops, 'user_property', 'prop_id');

            // clean some modvars
            pnModDelVar('Profile', 'itemsperpage');
            pnModDelVar('Profile', 'itemsperrow');
            pnModDelVar('Profile', 'displaygraphics');

            // set the active fields to display in the registration form
            pnModAPILoad('Profile', 'user', true);
            $items = pnModAPIFunc('Profile', 'user', 'getallactive', array('get' => 'editable', 'index' => 'prop_id'));
            pnModSetVar('Profile', 'dudregshow', array_keys($items));
            unset($items);

            // update the users' data to ids
            pnModAPILoad('Profile', 'dud', true);
            // updates the radio (3) and select (4) attribute names and data
            $loop = array(3, 4);
            foreach ($loop as $displaytype) {
                // extract the listoptions of the properties
                $where       = 'pn_prop_validation LIKE \'%s:11:"displaytype";s:1:"'.$displaytype.'"%\'';
                $userprops   = DBUtil::selectFieldArray('user_property', 'prop_validation', $where, '', false, 'prop_attribute_name');

                foreach (array_keys($userprops) as $k) {
                    $userprops[$k] = pnModAPIFunc('Profile', 'dud', 'getoptions', array('field' => $userprops[$k]));
                    $userprops[$k] = array_flip($userprops[$k]);
                }

                $where       = implode("', '", array_keys($userprops));
                $where       = "oba_object_type = 'users' AND oba_attribute_name IN ('$where')";
                $userdata    = DBUtil::selectObjectArray('objectdata_attributes', $where, 'id', -1, -1, '', null, null, array('id', 'value', 'attribute_name'));

                foreach (array_keys($userdata) as $k)
                {
                    $v = $userdata[$k]['value'];
                    $a = $userdata[$k]['attribute_name'];

                    switch ($displaytype)
                    {
                        case 3: // RADIO
                            $userdata[$k]['value'] = isset($userprops[$a][$v]) ? $userprops[$a][$v] : $v;
                            break;

                        case 4: // SELECT
                            $v = @unserialize($v);
                            $newvalues = array();
                            foreach ($v as $value) {
                                $newvalues[] = isset($userprops[$a][$value]) ? $userprops[$a][$value] : $value;
                            }
                            $userdata[$k]['value'] = serialize($newvalues);
                            break;
                    }
                }
                DBUtil::updateObjectArray($userdata, 'objectdata_attributes', 'id');
            }

        case '1.4.1':
            // checkpoint to deprecate the extdate field (6)
            $tables = pnDBGetTables();
            $sql    = "UPDATE $tables[user_property] SET pn_prop_validation = REPLACE(pn_prop_validation, '\"displaytype\";s:1:\"6\"', '\"displaytype\";s:1:\"5\"') WHERE pn_prop_validation LIKE '%s:11:\"displaytype\";s:1:\"6\"%'";
            if (!DBUtil::executeSQL($sql)) {
                LogUtil::registerError(__('Error! Could not update table.', $dom));
                return '1.4.1';
            }

        case '1.5':
        case '1.5.1':
        case '1.5.2':
            // future upgrade routines
    }

    // Update successful
    return true;
}

/**
 * Delete the dynamic user data module
 *
 * @author Mark West
 * @return bool true on success or false on failure
 */
function Profile_delete()
{
    if (!DBUtil::dropTable('user_property')) {
        return false;
    }

    // Delete any module variables
    pnModDelVar('Profile');

    // Deletion successful
    return true;
}

/**
 * create the default data for the users module
 *
 * This function is only ever called once during the lifetime of a particular
 * module instance
 *
 */
function Profile_defaultdata()
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
    pnModSetVar('Profile', 'dudregshow', array(1, 3, 4, 10, 11));
}
