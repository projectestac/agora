<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pndudapi.php 90 2010-01-25 08:31:41Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Profile
 */

/**
 * Register a dynamic user data field
 *
 * @author Mateo Tibaquira
 * @param  string  $args['modname']         responsible module of the new field
 * @param  string  $args['label']           label for the new account property
 * @param  string  $args['attribute_name']  name of the attribute to use inside the user's data
 * @param  string  $args['dtype']           dud type to create {normal, mandatory, noneditable}
 * @param  array   $args['validationinfo']  validation info for the new field with the following fields:
 *                   'required'    => {0: no, 1: mandatory}
 *                   'viewby'      => viewable by {0: Everyone, 1: Registered users only, 2: Admins only}
 *                   'displaytype' => {0: text box, 1: textarea, 2: checkbox, 3: radio, 4: select, 5: date, 7: multi checkbox}
 *                   'listoptions' => options for the new field
 *                   'note'        => note to show in edit mode
 *                   and any other required data
 * @return true on success or false on failure
 */
function Profile_dudapi_register($args)
{
    if (!isset($args['modname']) || empty($args['modname'])
     || !isset($args['label']) || empty($args['label'])
     || !isset($args['attribute_name']) || empty($args['attribute_name'])
     || !isset($args['dtype']) || empty($args['dtype'])
     || !isset($args['displaytype']) || !is_numeric($args['displaytype']) || (int)$args['displaytype'] < 0
     || !isset($args['validationinfo']) || empty($args['validationinfo']) || !is_array($args['validationinfo'])) {
        return LogUtil::registerArgsError();
    }

    // Security check
    if (!SecurityUtil::checkPermission('Profile::item', "$args[label]::", ACCESS_ADD)) {
        return LogUtil::registerPermissionError();
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    if (!pnModGetIDFromName($args['modname'])) {
        return LogUtil::registerError(__f('Error! Could not find the specified module (%s).', DataUtil::formatForDisplay($args['modname']), $dom));
    }

    // parses the DUD type
    $dtypes = array(-1 => 'noneditable', 0 => 'mandatory', 2 => 'normal');
    if (!in_array($args['dtype'], $dtypes)) {
        return LogUtil::registerError(__f("Error! Invalid '%s' passed.", 'dtype', $dom));
    }

    // Clean the label
    $permsep = pnConfigGetVar('shorturlsseparator', '-');
    $args['label'] = str_replace($permsep, '', DataUtil::formatPermalink($args['label']));
    $args['label'] = str_replace('-', '', DataUtil::formatPermalink($args['label']));

    // Check if the label or attribute name already exists
    $item = pnModAPIFunc('Profile', 'user', 'get', array('proplabel' => $args['label']));
    if ($item) {
        return LogUtil::registerError(__("Error! There is already an personal info item with the label '%s'.", DataUtil::formatForDisplay($args['label']), $dom));
    }
    $item = pnModAPIFunc('Profile', 'user', 'get', array('propattribute' => $args['attribute_name']));
    if ($item) {
        return LogUtil::registerError(__("Error! There is already an personal info item with the attribute name '%s'.", DataUtil::formatForDisplay($args['attribute_name']), $dom));
    }

    // Determine the new weight
    $weightlimits = pnModAPIFunc('Profile', 'user', 'getweightlimits');
    $weight = $weightlimits['max'] + 1;

    // insert the new field
    $obj = array();
    $obj['prop_label']          = $args['label'];
    $obj['prop_attribute_name'] = $args['attribute_name'];
    $obj['prop_dtype']          = array_search($args['dtype'], $dtypes);
    $obj['prop_modname']        = $args['modname'];
    $obj['prop_weight']         = $weight;
    $obj['prop_validation']     = serialize($args['validationinfo']);

    $obj = DBUtil::insertObject($obj, 'user_property', 'prop_id');

    // Check for an error with the database
    if (!$obj) {
        return LogUtil::registerError(__('Error! Could not create the new personal info item.', $dom));
    }

    // Let any hooks know that we have created a new item.
    pnModCallHooks('item', 'create', $obj['prop_id'], array('module' => 'Profile'));

    // Return the id of the newly created item to the calling process
    return $obj['prop_id'];
}

/**
 * Unregister a specific Dynamic user data item
 *
 * @author Mateo Tibaquira
 * @param  integer  $args['propid']         id of property to unregister
 * @param  string   $args['proplabel']      label of property to unregister
 * @param  string   $args['propattribute']   of property to unregister
 * @return true on success or false on failure
 */
function Profile_dudapi_unregister($args)
{
    // Argument check
    if (!isset($args['propid']) && !isset($args['proplabel']) && !isset($args['propattribute'])) {
        return LogUtil::registerArgsError();
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    // Get item with where clause
    if (isset($args['propid'])) {
        $item = DBUtil::selectObjectByID('user_property', (int)$args['propid'], 'prop_id');
    } elseif (isset($args['proplabel'])) {
        $item = DBUtil::selectObjectByID('user_property', $args['proplabel'], 'prop_label');
    } else {
        $item = DBUtil::selectObjectByID('user_property', $args['propattribute'], 'prop_attribute_name');
    }

    // Check for no rows found, and if so return
    if (!$item) {
        return false;
    }

    // Security check
    if (!SecurityUtil::checkPermission('Profile::', "$item[prop_label]::$item[prop_id]", ACCESS_DELETE)) {
        return false;
    }

    // delete the property data aka attributes
    $pntables       = pnDBGetTables();
    $objattr_column = $pntables['objectdata_attributes_column'];

    $delwhere = "WHERE $objattr_column[attribute_name] = '" . DataUtil::formatForStore($item['prop_attribute_name']) . "'
                   AND $objattr_column[object_type] = 'users'";

    $res = DBUtil::deleteWhere('objectdata_attributes', $delwhere);
    if (!$res) {
        return LogUtil::registerError(__('Error! Could not delete the personal info item.', $dom));
    }

    // delete the property
    $res = DBUtil::deleteObjectByID('user_property', $item['prop_id'], 'prop_id');
    if (!$res) {
        return LogUtil::registerError(__('Error! Could not delete the personal info item.', $dom));
    }

    // Let any hooks know that we have deleted an item.
    pnModCallHooks('item', 'delete', $item['prop_id'], array('module' => 'Profile'));

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * Update users data
 *
 * @author Mateo Tibaquira
 * @param  string   $args['field']      serialized 'prop_validation' field of the DUD
 * @param  array    $args['item']       array with the DUD information
 * @param  string   $args['newfield']   serialized new 'prop_validation' field of the DUD
 * @param  array    $args['newitem']    array with the new DUD information
 * @param  string   $args['uservalue']  current user value
 * @return string   updated user value if there were id changes in the listoptions
 */
function Profile_dudapi_updatedata($args)
{
    if (!isset($args['uservalue']) || empty($args['uservalue'])) {
        return '';
    }
    $uservalue = $args['uservalue'];

    if ((!isset($args['field']) || empty($args['field']))
     && (!isset($args['item']) || empty($args['item']))) {
        return $uservalue;
    }

    // get both option arrays
    $oldoptions = Profile_dudapi_getoptions($args);
    $params = array(
        'field' => isset($args['newfield']) ? $args['newfield'] : null,
        'item'  => isset($args['newitem'])  ? $args['newitem']  : null
    );
    $newoptions = Profile_dudapi_getoptions($params);
    unset($params);
    unset($args);

    // get the old value(s) 
    $value = $uservalue;
    if (is_array($uservalue)) {
        $value = array();
        foreach ($uservalue as $v) {
            // paranoic check
            if (empty($v)) {
                $value[] = $v;
                continue;
            }
            $value[] = isset($oldoptions[$v]) ? $oldoptions[$v] : $v;
        }
    } elseif (!empty($value) && isset($oldoptions[$value])) {
        $value = !empty($oldoptions[$value]) ? $oldoptions[$value] : $value;
    }

    // do not touch it if we do not get values
    if (empty($value)) {
        return $uservalue;
    }

    // flip the new options to have the new values as indexes
    // this required to have different labels in the listoptions
    $newoptions = array_flip($newoptions);

    $newvalue = '';
    if ($value) {
        $newvalue = array();
        foreach ($value as $v) {
            // paranoic check
            if (empty($v)) {
                $value[] = $v;
                continue;
            }
            $newvalue[] = isset($newoptions[$v]) ? $newoptions[$v] : $v;
        }
    } elseif (isset($newoptions[$value])) {
        $newvalue = !empty($newoptions[$value]) ? $newoptions[$value] : $value;
    }

    // return the updated item
    return $newvalue;
}

/**
 * Get the options of a DUD field
 *
 * @author Mateo Tibaquira
 * @param  string   $args['field']      serialized 'prop_validation' field of the DUD
 * @param  array    $args['item']       array with the DUD information
 * @return array    indexed id => label for the DUD field
 */
function Profile_dudapi_getoptions($args)
{
    if ((!isset($args['field']) || empty($args['field']))
     && (!isset($args['item']) || empty($args['item']))) {
        return array();
    }

    if (isset($args['field'])) {
        $args['field'] = @unserialize($args['field']);
        $args['item'] = array();
        foreach ($args['field'] as $k => $v) {
            $args['item']["prop_$k"] = $v;
        }
    }

    $item = $args['item'];
    unset($args);

    $dom = ZLanguage::getModuleDomain('Profile');

    $options = array();
    switch ($item['prop_displaytype'])
    {
        case 3: // RADIO
            // extract the options
            $list = array_splice(explode('@@', $item['prop_listoptions']), 1);

            // translate them if needed
            foreach ($list as $id => $value) {
                $value = explode('@', $value);
                $id    = isset($value[1]) ? $value[1] : $id;
                $options[$id] = !empty($value[0]) ? __($value[0], $dom) : '';
            }
            break;

        case 4: // SELECT
            $list = explode('@@', $item['prop_listoptions']);
            $list = array_splice($list, 1);

            // translate them if needed
            foreach ($list as $id => $value) {
                $value = explode('@', $value);
                $id    = isset($value[1]) ? $value[1] : $id;
                $options[$id] = !empty($value[0]) ? __($value[0], $dom) : '';
            }
            break;

        case 5: // DATE
        case 6: // EXTDATE (deprecated)
            $options = $item['prop_listoptions'];

            // validate the option against core and %strftime options
            $coreformats = array('datelong', 'datebrief', 'datestring', 'datestring2', 'datetimebrief', 'datetimelong', 'timebrief', 'timelong');
            if (empty($options) || !in_array($options, $coreformats)) {
                // check if it's a custom format and translate it
                if (!empty($options) && strpos($options, '%') !== false) {
                    $options = __($options, $dom);
                } else {
                    //! This is from the core domain (datebrief)
                    $options = __('%b %d, %Y');
                }
            }
            break;

        case 7: // MULTICHECKBOX
            $combos = explode(';', $item['prop_listoptions']);
            $combos = array_filter($combos);

            foreach ($combos as $combo) {
                list($id, $value) = explode(',', $combo);
                $options[$id] = !empty($value) ? __($value, $dom) : '';
            }
            break;
    }

    return $options;
}
