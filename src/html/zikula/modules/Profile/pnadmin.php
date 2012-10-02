<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadmin.php 108 2010-02-08 06:39:56Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Profile
 * @author Mark West
 */

/**
 * The main administration function
 *
 * @return string HTML string
 */
function Profile_admin_main()
{
    // Security check
    if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    // Create output object
    $render = & pnRender::getInstance('Profile');

    // Return the output
    return $render->fetch('profile_admin_main.htm');;
}

/**
 * The Profile help page
 *
 * @return string HTML string
 */
function Profile_admin_help()
{
    // Security check
    if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    // Create output object
    $render = & pnRender::getInstance('Profile');

    // Return the output
    return $render->fetch('profile_admin_help.htm');;
}

/**
 * View all items held by this module
 * @author Mark West
 * @return string HTML string
 */
function Profile_admin_view()
{
    // Security check
    if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    // Get parameters from whatever input we need.
    $startnum = (int)FormUtil::getPassedValue('startnum', null, 'GET');
    $numitems = 20;

    // The user API function is called.
    $items = pnModAPIFunc('Profile', 'user', 'getall',
                          array('startnum' => $startnum,
                                'numitems' => $numitems));

    $count  = pnModAPIFunc('Profile', 'user', 'countitems');
    $authid = SecurityUtil::generateAuthKey();

    $x = 1;
    $duditems = array();
    foreach ($items as $item)
    {
        // display the proper icom and link to enable or disable the field
        switch (true)
        {
            // 0 <= DUD types can't be disabled
            case ($item['prop_dtype'] <= 0):
                $statusval = 1;
                $status = array('url' => '',
                                'image' => 'greenled.gif',  'title' => __('Required', $dom));
                break;

            case ($item['prop_weight'] <> 0):
                $statusval = 1;
                $status = array('url'   => pnModURL('Profile', 'admin', 'deactivate',
                                                    array('dudid'    => $item['prop_id'],
                                                          'weight'   => $item['prop_weight'],
                                                          'authid'   => $authid)),
                                'image' => 'greenled.gif',
                                'title' => __('Deactivate', $dom));
                break;

            default:
                $statusval = 0;
                $status = array('url'   => pnModURL('Profile', 'admin', 'activate',
                                                    array('dudid'    => $item['prop_id'],
                                                          'authid'   => $authid)),
                                'image' => 'redled.gif',
                                'title' => __('Activate', $dom));
        }

        // analizes the DUD type
        switch ($item['prop_dtype'])
        {
            case '-2': // non-editable field
                $data_type_text = __('Not editable field', $dom);
                break;

            case '-1': // Third party (non-editable)
                $data_type_text = __('Third-party (not editable)', $dom);
                break;

            case '0': // Third party (mandatory)
                $data_type_text = __('Third-party', $dom) . ($item['prop_required'] ? ', '.__('Required', $dom) : '');
                break;

            default:
            case '1': // Normal property
                $data_type_text = __('Normal', $dom) . ($item['prop_required'] ? ', '.__('Required', $dom) : '');
                break;

            case '2': // Third party (normal field)
                $data_type_text = __('Third-party', $dom) . ($item['prop_required'] ? ', '.__('Required', $dom) : '');
                break;
        }

        // Options for the item.
        $options = array();
        if (SecurityUtil::checkPermission('Profile::item', "$item[prop_label]::$item[prop_id]", ACCESS_EDIT))
        {
            $options[] = array('url' => pnModURL('Profile', 'admin', 'modify', array('dudid' => $item['prop_id'])),
                               'image' => 'xedit.gif',
                               'class' => '',
                               'title' => __('Edit', $dom));

            if ($item['prop_weight'] > 1) {
                $options[] = array('url' => pnModURL('Profile', 'admin', 'decrease_weight', array('dudid' => $item['prop_id'])),
                                   'image' => '2uparrow.gif',
                                   'class' => 'profile_up',
                                   'title' => __('Up', $dom));
            }

            if ($x < $count) {
                $options[] = array('url' => pnModURL('Profile', 'admin', 'increase_weight', array('dudid' => $item['prop_id'])),
                                   'image' => '2downarrow.gif',
                                   'class' => 'profile_down',
                                   'title' => __('Down', $dom));
            }

            if (SecurityUtil::checkPermission('Profile::item', "$item[prop_label]::$item[prop_id]", ACCESS_DELETE) && $item['prop_dtype'] > 0) {
                $options[] = array('url' => pnModURL('Profile', 'admin', 'delete', array('dudid' => $item['prop_id'])),
                                   'image' => '14_layer_deletelayer.gif',
                                   'class' => '',
                                   'title' => __('Delete', $dom));
            }
        }

        $item['status']    = $status;
        $item['statusval'] = $statusval;
        $item['options']   = $options;
        $item['dtype']     = $data_type_text;
        $duditems[] = $item;
        $x++;
    }

    // Create output object
    $render = & pnRender::getInstance('Profile', false);

    $render->assign('startnum', $startnum);
    $render->assign('duditems', $duditems);

    // assign the values for the smarty plugin to produce a pager in case of there
    // being many items to display.
    $render->assign('pager', array('numitems'     => $count,
                                   'itemsperpage' => $numitems));

    // Return the output that has been generated by this function
    return $render->fetch('profile_admin_view.htm');
}

/**
 * Add new dynamic user data item
 *
 * @author Mark West
 * @return string HTML string
 */
function Profile_admin_new()
{
    // Security check
    if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_ADD)) {
        return LogUtil::registerPermissionError();
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    // Create output object
    $render = & pnRender::getInstance('Profile', false);

    $render->assign('displaytypes',     array(0 => DataUtil::formatForDisplay(__('Text box', $dom)),
                                              1 => DataUtil::formatForDisplay(__('Text area', $dom)),
                                              2 => DataUtil::formatForDisplay(__('Checkbox', $dom)),
                                              3 => DataUtil::formatForDisplay(__('Radio button', $dom)),
                                              4 => DataUtil::formatForDisplay(__('Dropdown list', $dom)),
                                              5 => DataUtil::formatForDisplay(__('Date', $dom)),
                                              7 => DataUtil::formatForDisplay(__('Multiple checkbox set', $dom))));

    $render->assign('requiredoptions',  array(0 => DataUtil::formatForDisplay(__('No', $dom)),
                                              1 => DataUtil::formatForDisplay(__('Yes', $dom))));

    $render->assign('viewbyoptions',    array(0 => DataUtil::formatForDisplay(__('Everyone', $dom)),
                                              1 => DataUtil::formatForDisplay(__('Registered users only', $dom)),
                                              2 => DataUtil::formatForDisplay(__('Admins and account owner only', $dom)),
                                              3 => DataUtil::formatForDisplay(__('Admins only', $dom))));

    // Return the output that has been generated by this function
    return $render->fetch('profile_admin_new.htm');
}

/**
 * Function that executes the creation
 *
 * @author Mark West
 * @see Profile_admin_new()
 * @param string 'label' the name of the item to be created
 * @param string 'dtype' the data type of the item to be created
 * @return bool true if item created, false otherwise
 */
function Profile_admin_create($args)
{
    // Confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('Profile', 'admin', 'view'));
    }

    // Security check
    if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_ADD)) {
        return LogUtil::registerPermissionError();
    }

    // Get parameters from whatever input we need.
    $label       = isset($args['label'])         ? $args['label']         : FormUtil::getPassedValue('label', null, 'POST');
    $attrname    = isset($args['attributename']) ? $args['attributename'] : FormUtil::getPassedValue('attributename', null, 'POST');
    $required    = isset($args['required'])      ? $args['required']      : FormUtil::getPassedValue('required', null, 'POST');
    $viewby      = isset($args['viewby'])        ? $args['viewby']        : FormUtil::getPassedValue('viewby', null, 'POST');
    $displaytype = isset($args['displaytype'])   ? $args['displaytype']   : FormUtil::getPassedValue('displaytype', null, 'POST');
    $listoptions = isset($args['listoptions'])   ? $args['listoptions']   : FormUtil::getPassedValue('listoptions', null, 'POST');
    $note        = isset($args['note'])          ? $args['note']          : FormUtil::getPassedValue('note', null, 'POST');

    $dom = ZLanguage::getModuleDomain('Profile');

    $returnurl = pnModURL('Profile', 'admin', 'view');

    // Validates and check if empty or already existing...
    if (empty($label)) {
        return LogUtil::registerError(__("Error! The personal info item must have a label. An example of a recommended label is: '_MYDUDLABEL'.", $dom), null, $returnurl);
    }

    if (empty($attrname)) {
        return LogUtil::registerError(__("Error! The personal info item must have an attribute name. An example of an acceptable name is: 'mydudfield'.", $dom), null, $returnurl);
    }

    if (pnModAPIFunc('Profile', 'user', 'get', array('proplabel' => $label))) {
        return LogUtil::registerError(__('Error! There is already an personal info item label with this naming.', $dom), null, $returnurl);
    }

    if (pnModAPIFunc('Profile', 'user', 'get', array('propattribute' => $attrname))) {
        return LogUtil::registerError(__('Error! There is already an attribute name with this naming.', $dom), null, $returnurl);
    }

    $permalinkssep = pnConfigGetVar('shorturlsseparator');
    $filteredlabel = str_replace($permalinkssep, '', DataUtil::formatPermalink($label));
    if ($label != $filteredlabel) {
        LogUtil::registerStatus(__('Warning! The personal info item label has been accepted, but was filtered and altered to ensure it contains no special characters or spaces in its naming.', $dom), null, $returnurl);
    }

    // The API function is called.
    $dudid = pnModAPIFunc('Profile', 'admin', 'create',
                          array('label'          => $filteredlabel,
                                'attribute_name' => $attrname,
                                'required'       => $required,
                                'viewby'         => $viewby,
                                'dtype'          => 1,
                                'displaytype'    => $displaytype,
                                'listoptions'    => $listoptions,
                                'note'           => $note));

    // The return value of the function is checked here
    if ($dudid != false) {
        // Success
        LogUtil::registerStatus(__('Done! Created new personal info item.', $dom));
    }

    // This function generated no output
    return pnRedirect($returnurl);
}

/**
 * Modify a dynamic user data item
 * This is a standard function that is called whenever an administrator
 * wishes to modify a current module item
 * @author Mark West
 * @param int 'dudid' the id of the item to be modified
 * @param int 'objectid' generic object id maps to dudid if present
 * @return string HTML string
 */
function Profile_admin_modify($args)
{
    // Get parameters from whatever input we need.
    $dudid    = isset($args['dudid'])    ? (int)$args['dudid']    : (int)FormUtil::getPassedValue('dudid',    null, 'GET');
    $objectid = isset($args['objectid']) ? (int)$args['objectid'] : (int)FormUtil::getPassedValue('objectid', null, 'GET');

    // At this stage we check to see if we have been passed $objectid
    if (!empty($objectid)) {
        $dudid = $objectid;
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    // The user API function is called.
    $item = pnModAPIFunc('Profile', 'user', 'get', array('propid' => $dudid));

    if ($item == false) {
        return LogUtil::registerError(__('Error! No such personal info item found.', $dom), 404);
    }

    // Security check
    if (!SecurityUtil::checkPermission('Profile::item', "$item[prop_label]::$dudid", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }
    
    // backward check to remove any 1.4- forbidden char in listoptions
    $item['prop_listoptions'] = str_replace(Chr(10), '', str_replace(Chr(13), '', $item['prop_listoptions']));

    // Create output object
    $render = & pnRender::getInstance('Profile', false);

    // Add a hidden variable for the item id.
    $render->assign('dudid', $dudid);

    $render->assign('displaytypes',     array(0 => DataUtil::formatForDisplay(__('Text box', $dom)),
                                              1 => DataUtil::formatForDisplay(__('Text area', $dom)),
                                              2 => DataUtil::formatForDisplay(__('Checkbox', $dom)),
                                              3 => DataUtil::formatForDisplay(__('Radio button', $dom)),
                                              4 => DataUtil::formatForDisplay(__('Dropdown list', $dom)),
                                              5 => DataUtil::formatForDisplay(__('Date', $dom)),
                                              7 => DataUtil::formatForDisplay(__('Multiple checkbox set', $dom))));

    $render->assign('requiredoptions',  array(0 => DataUtil::formatForDisplay(__('No', $dom)),
                                              1 => DataUtil::formatForDisplay(__('Yes', $dom))));

    $render->assign('viewbyoptions',    array(0 => DataUtil::formatForDisplay(__('Everyone', $dom)),
                                              1 => DataUtil::formatForDisplay(__('Registered users only', $dom)),
                                              2 => DataUtil::formatForDisplay(__('Admins and account owner only', $dom)),
                                              3 => DataUtil::formatForDisplay(__('Admins only', $dom))));

    $item['prop_listoptions'] = str_replace("\n", '', $item['prop_listoptions']);

    $render->assign('item', $item);

    // Return the output that has been generated by this function
    return $render->fetch('profile_admin_modify.htm');
}

/**
 * Function that executes the update
 *
 * @author Mark West
 * @see ProfileModify()
 * @param int 'dudid' the id of the item to be updated
 * @param int 'objectid' generic object id maps to dudid if present
 * @param string 'label' the name of the item to be updated
 * @param string 'dtype' the data type of the item
 * @param int 'length' the lenght of item if dtype is string
 * @return bool true if update successful, false otherwise
 */
function Profile_admin_update($args)
{
    // Confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('Profile', 'admin', 'view'));
    }

    // Get parameters from whatever input we need.
    $dudid       = (int)FormUtil::getPassedValue('dudid',    (isset($args['dudid']) ? $args['dudid'] : null), 'POST');
    $objectid    = (int)FormUtil::getPassedValue('objectid', (isset($args['objectid']) ? $args['objectid'] : null), 'POST');
    $label       = FormUtil::getPassedValue('label',         (isset($args['label']) ? $args['label'] : null), 'POST');
    $required    = FormUtil::getPassedValue('required',      (isset($args['required']) ? $args['required'] : null), 'POST');
    $viewby      = FormUtil::getPassedValue('viewby',        (isset($args['viewby']) ? $args['viewby'] : null), 'POST');
    //$dtype       = FormUtil::getPassedValue('dtype',         (isset($args['dtype']) ? $args['dtype'] : null), 'POST');
    $displaytype = FormUtil::getPassedValue('displaytype',   (isset($args['displaytype']) ? $args['displaytype'] : null), 'POST');
    $listoptions = FormUtil::getPassedValue('listoptions',   (isset($args['listoptions']) ? $args['listoptions'] : null), 'POST');
    $note        = FormUtil::getPassedValue('note',          (isset($args['note']) ? $args['note'] : null), 'POST');

    // At this stage we check to see if we have been passed $objectid
    if (!empty($objectid)) {
        $dudid = $objectid;
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    // The return value of the function is checked here
    if (pnModAPIFunc('Profile', 'admin', 'update',
                    array('dudid'       => $dudid,
                          'required'    => $required,
                          'viewby'      => $viewby,
                          'label'       => $label,
                          'displaytype' => $displaytype,
                          'listoptions' => str_replace("\n", "", $listoptions),
                          'note'        => $note))) {
        // Success
        LogUtil::registerStatus(__('Done! Saved your changes.', $dom));
    }

    // This function generated no output
    return pnRedirect(pnModURL('Profile', 'admin', 'view'));
}

/**
 * delete item
 *
 * @author Mark West
 * @param int 'dudid' the id of the item to be deleted
 * @param int 'objectid' generic object id maps to dudid if present
 * @param bool 'confirmation' confirmation that this item can be deleted
 * @return mixed HTML string if no confirmation, true if delete successful, false otherwise
 */
function Profile_admin_delete($args)
{
    // Get parameters from whatever input we need.
    $dudid        =  (int)FormUtil::getPassedValue('dudid',        (isset($args['dudid']) ? $args['dudid'] : null), 'GETPOST');
    $objectid     =  (int)FormUtil::getPassedValue('objectid',     (isset($args['objectid']) ? $args['objectid'] : null), 'GETPOST');
    $confirmation = (bool)FormUtil::getPassedValue('confirmation', (isset($args['confirmation']) ? $args['confirmation'] : null), 'GETPOST');

    // At this stage we check to see if we have been passed $objectid
    if (!empty($objectid)) {
        $dudid = $objectid;
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    // The user API function is called.
    $item = pnModAPIFunc('Profile', 'user', 'get', array('propid' => $dudid));

    if ($item == false) {
        return LogUtil::registerError(__('Error! No such personal info item found.', $dom), 404);
    }

    // Security check
    if (!SecurityUtil::checkPermission('Profile::item', "$item[prop_label]::$dudid", ACCESS_DELETE)) {
        return LogUtil::registerPermissionError();
    }

    // Check for confirmation.
    if (empty($confirmation)) {
        // No confirmation yet - display a suitable form to obtain confirmation
        // of this action from the user

        // Create output object
        $render = & pnRender::getInstance('Profile', false);

        // Add hidden item id to form
        $render->assign('dudid', $dudid);

        // Return the output that has been generated by this function
        return $render->fetch('profile_admin_delete.htm');
    }

    // If we get here it means that the user has confirmed the action

    // Confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('Profile', 'admin', 'view'));
    }

    // The API function is called.
    if (pnModAPIFunc('Profile', 'admin', 'delete', array('dudid' => $dudid))) {
        // Success
        LogUtil::registerStatus(__('Done! Deleted the personal info item.', $dom));
    }

    // This function generated no output
    return pnRedirect(pnModURL('Profile', 'admin', 'view'));
}

/**
 * Increase weight
 *
 * @author Mark West
 * @param  int 'dudid' the id of the item to be updated
 * @return bool true if update successful, false otherwise
 */
function Profile_admin_increase_weight($args)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    $dudid = (int)FormUtil::getPassedValue('dudid', null, 'GET');

    $item = pnModAPIFunc('Profile', 'user', 'get', array('propid' => $dudid));

    if ($item == false) {
        return LogUtil::registerError(__('Error! No such personal info item found.', $dom), 404);
    }

    // Security check
    if (!SecurityUtil::checkPermission('Profile::item', "$item[prop_label]::$item[prop_id]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    $res = DBUtil::incrementObjectFieldByID('user_property', 'prop_weight', $dudid, 'prop_id');

    // The return value of the function is checked here
    if ($res) {
        // Success
        LogUtil::registerStatus(__('Done! Saved your changes.', $dom));
    }

    return pnRedirect(pnModURL('Profile', 'admin', 'view'));
}

/**
 * Decrease weight
 *
 * @author Mark West
 * @param  int 'dudid' the id of the item to be updated
 * @return bool true if update successful, false otherwise
 */
function Profile_admin_decrease_weight($var)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    $dudid = (int)FormUtil::getPassedValue('dudid', null, 'GET');

    $item = pnModAPIFunc('Profile', 'user', 'get', array('propid' => $dudid));

    if ($item == false) {
        return LogUtil::registerError(__('Error! No such personal info item found.', $dom), 404);
    }

    // Security check
    if (!SecurityUtil::checkPermission('Profile::item', "$item[prop_label]::$item[prop_id]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    if ($item['prop_weight'] <= 1) {
        return LogUtil::registerError(__('Error! You cannot decrease the weight of this account property.', $dom), 404);
    }

    $res = DBUtil::incrementObjectFieldByID('user_property', 'prop_weight', $dudid, 'prop_id', -1);

    // The return value of the function is checked here
    if ($res) {
        // Success
        LogUtil::registerStatus(__('Done! Saved your changes.', $dom));
    }

    return pnRedirect(pnModURL('Profile', 'admin', 'view'));
}

/**
 * Process item activation request
 * @author Mark West
 * @param int 'dudid' id of item activate
 * @return bool true if activation successful, false otherwise
 * @todo remove passing of weight parameter; can be got from API
 */
function Profile_admin_activate($args)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    // Get parameters from whatever input we need.
    $dudid  = (int)FormUtil::getPassedValue('dudid', (isset($args['dudid']) ? $args['dudid'] : null), 'GET');

    // The API function is called.
    if (pnModAPIFunc('Profile', 'admin', 'activate', array('dudid' => $dudid))) {
        // Success
        LogUtil::registerStatus(__('Done! Saved your changes.', $dom));
    }

    // This function generated no output
    return pnRedirect(pnModURL('Profile', 'admin', 'view'));
}

/**
 * Process item deactivation request
 * @author Mark West
 * @param int 'dudid' id of item deactivate
 * @param int 'weight' current weight of item
 * @return bool true if deactivation successful, false otherwise
 * @todo remove passing of weight parameter; can be got from API
 */
function Profile_admin_deactivate($args)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    // Get parameters from whatever input we need.
    $dudid  = (int)FormUtil::getPassedValue('dudid',  (isset($args['dudid']) ? $args['dudid'] : null), 'GET');

    // Confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('Profile', 'admin', 'view'));
    }

    // The API function is called.
    if (pnModAPIFunc('Profile', 'admin', 'deactivate', array('dudid' => $dudid))) {
        // Success
        LogUtil::registerStatus(__('Done! Saved your changes.', $dom));
    }

    // Let any other modules know that the modules configuration has been updated
    pnModCallHooks('module','updateconfig','Profile', array('module' => 'Profile'));

    // This function generated no output
    return pnRedirect(pnModURL('Profile', 'admin', 'view'));
}

/**
 * This is a standard function to modify the configuration parameters of the
 * module
 * @author Mark West
 * @return string HTML string
 */
function Profile_admin_modifyconfig()
{
    // Security check
    if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    $items = pnModAPIFunc('Profile', 'user', 'getallactive', array('get' => 'editable', 'index' => 'prop_id'));

    foreach ($items as $k => $item) {
        if ($item['prop_required']) {
            unset($items[$k]);
            continue;
        }
        $items[$k] = $item['prop_label'];
    }

    // Create output object
    // Appending the module configuration to template
    $render = & pnRender::getInstance('Profile', false, null, true);

    $render->assign('dudfields', $items);

    // Return the output that has been generated by this function
    return $render->fetch('profile_admin_modifyconfig.htm');
}

/**
 * Function that updates the module configuration
 *
 * @author Mark West
 * @see Profile_admin_modifyconfig()
 * @return bool true if update successful, false otherwise
 */
function Profile_admin_updateconfig()
{
    // Security check
    if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // Confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('Profile', 'admin', 'view'));
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    // Update module variables.
    $viewregdate = (bool)FormUtil::getPassedValue('viewregdate', 0, 'POST');
    pnModSetVar('Profile', 'viewregdate', $viewregdate);


    $memberslistitemsperpage = (int)FormUtil::getPassedValue('memberslistitemsperpage', 20, 'POST');
    pnModSetVar('Profile', 'memberslistitemsperpage', $memberslistitemsperpage);

    $onlinemembersitemsperpage = (int)FormUtil::getPassedValue('onlinemembersitemsperpage', 20, 'POST');
    pnModSetVar('Profile', 'onlinemembersitemsperpage', $onlinemembersitemsperpage);

    $recentmembersitemsperpage = (int)FormUtil::getPassedValue('recentmembersitemsperpage', 10, 'POST');
    pnModSetVar('Profile', 'recentmembersitemsperpage', $recentmembersitemsperpage);

    $filterunverified = (bool)FormUtil::getPassedValue('filterunverified', false, 'POST');
    pnModSetVar('Profile', 'filterunverified', $filterunverified);


    $dudtextdisplaytags = (bool)FormUtil::getPassedValue('dudtextdisplaytags', 0, 'POST');
    pnModSetVar('Profile', 'dudtextdisplaytags', $dudtextdisplaytags);


    $dudregshow = FormUtil::getPassedValue('dudregshow', array(), 'POST');
    pnModSetVar('Profile', 'dudregshow', $dudregshow);


    // Let any other modules know that the modules configuration has been updated
    pnModCallHooks('module', 'updateconfig', 'Profile', array('module' => 'Profile'));

    // the module configuration has been updated successfuly
    LogUtil::registerStatus(__('Done! Saved your settings changes.', $dom));

    // This function generated no output
    return pnRedirect(pnModURL('Profile', 'admin', 'view'));
}
