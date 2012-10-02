<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnform.php 82 2010-01-09 09:23:00Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Profile
 */

/**
 * display the dynadata section of the register form
 *
 * @author Mateo Tibaquira
 * @return string HTML string
 */
function Profile_form_edit($args)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    // can't use this function directly
    if (pnModGetName() == 'Profile') {
        return LogUtil::registerError(__("Error! You cannot access form functions directly.", $dom), null, pnModURL('Profile'));
    }

    // The API function is called.
    $items = pnModAPIFunc('Profile', 'user', 'getallactive', array('get' => 'editable'));

    // The return value of the function is checked here
    if ($items == false) {
        return '';
    }

    // check if there's a user to edit
    // or uses uid=1 to pull the default values from the annonymous user
    $userid   = isset($args['userid']) ? $args['userid'] : 1;
    $dynadata = isset($args['dynadata']) ? $args['dynadata'] : FormUtil::getPassedValue('dynadata', array());

    // merge this temporary dynadata and the errors into the items array
    foreach ($items as $prop_label => $item) {
        foreach ($dynadata as $propname => $propdata) {
            if ($item['prop_attribute_name'] == $propname) {
                $items[$prop_label]['temp_propdata'] = $propdata;
            }
        }
    }

    // Create output object
    $render = & pnRender::getInstance('Profile', false, null, true);

    // Assign the items to the template
    $render->assign('duditems', $items);

    $render->assign('userid', $userid);

    // Return the dynamic data section
    return $render->fetch('profile_form_edit.htm');
}

/**
 * display the dynadata section of the search form
 *
 * @author Mateo Tibaquira
 * @return string HTML string
 */
function Profile_form_search($args)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    // can't use this function directly
    if (pnModGetName() == 'Profile') {
        return LogUtil::registerError(__("Error! You cannot access form functions directly.", $dom), null, pnModURL('Profile'));
    }

    // The API function is called.
    $items = pnModAPIFunc('Profile', 'user', 'getallactive');

    // The return value of the function is checked here
    if ($items == false) {
        return '';
    }

    // unset the avatar and timezone fields
    if (isset($items['avatar'])) {
        unset($items['avatar']);
    }
    if (isset($items['tzoffset'])) {
        unset($items['tzoffset']);
    }

    // reset the 'required' flags
    foreach (array_keys($items) as $k) {
        $items[$k]['prop_required'] = false;
    }

    // Create output object
    $render = & pnRender::getInstance('Profile', false);

    // Assign the items to the template
    $render->assign('duditems', $items);

    $render->assign('userid', 1);

    // Return the dynamic data section
    return $render->fetch('profile_form_edit.htm');
}

/**
 * fills a z-datatable body with the passed dynadata
 *
 * @author Mateo Tibaquira
 * @return string HTML string
 */
function Profile_form_display($args)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    // can't use this function directly
    if (pnModGetName() == 'Profile') {
        return LogUtil::registerError(__("Error! You cannot access form functions directly.", $dom), null, pnModURL('Profile'));
    }

    // The API function is called.
    $items = pnModAPIFunc('Profile', 'user', 'getallactive');

    // The return value of the function is checked here
    if ($items == false) {
        return '';
    }

    $userinfo = isset($args['userinfo']) ? $args['userinfo'] : array();

    // Create output object
    $render = & pnRender::getInstance('Profile', false);

    // Assign the items to the template
    $render->assign('duditems', $items);

    $render->assign('userinfo', $userinfo);

    // Return the dynamic data rows
    return $render->fetch('profile_form_display.htm');
}
