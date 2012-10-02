<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnajax.php 90 2010-01-25 08:31:41Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Profile
*/

/**
 * change the weight of a profile item
 *
 * @author Mark West
 * @param blockorder array of sorted properties (value = prop_id)
 * @return mixed true or Ajax error
 */
function Profile_ajax_changeprofileweight()
{
    $dom = ZLanguage::getModuleDomain('Profile');

    if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_ADMIN)) {
        AjaxUtil::error(__('Sorry! You do not have authorisation for this module.', $dom));
    }

    if (!SecurityUtil::confirmAuthKey()) {
        AjaxUtil::error(__("Invalid authorisation key ('authkey'). This is probably either because you pressed the 'Back' button to return to a page which does not allow that, or else because the page's authorisation key expired due to prolonged inactivity. Please refresh the page and try again.", $dom));
    }

    $profilelist = FormUtil::getPassedValue('profilelist');
    $startnum    = FormUtil::getPassedValue('startnum');

    if ($startnum < 0) {
        AjaxUtil::error(__f("Error! Invalid '%s' passed.", 'startnum', $dom));
    }

    // update the items with the new weights
    $items = array();
    $weight = $startnum + 1;
    foreach ($profilelist as $prop_id)
    {
        if (empty($prop_id)) {
            continue;
        }

        $items[] = array('prop_id' => $prop_id,
                         'prop_weight' => $weight);
        $weight++;
    }

    // update the db
    $res = DBUtil::updateObjectArray($items, 'user_property', 'prop_id');

    if (!$res) {
        AjaxUtil::error(__('Error! Could not save your changes.', $dom));
    }

    return array('result' => true);
}

/**
 * change the status of a profile item
 *
 * @author Mateo Tibaquira
 * @param  dudid id of the property to update
 * @param  oldstatus to activate or deactivate the item
 * @return mixed true or Ajax error
 */
function Profile_ajax_changeprofilestatus()
{
    $dom = ZLanguage::getModuleDomain('Profile');

    if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_ADMIN)) {
        AjaxUtil::error(__('Sorry! You do not have authorisation for this module.', $dom));
    }
/*
    if (!SecurityUtil::confirmAuthKey()) {
        AjaxUtil::error(__("Invalid authorisation key ('authkey'). This is probably either because you pressed the 'Back' button to return to a page which does not allow that, or else because the page's authorisation key expired due to prolonged inactivity. Please refresh the page and try again.", $dom));
    }
*/
    $prop_id   = FormUtil::getPassedValue('dudid');
    $oldstatus = (bool)FormUtil::getPassedValue('oldstatus');

    if (!$prop_id) {
        return array('result' => false);
    }

    // update the item status
    $func = ($oldstatus ? 'deactivate' : 'activate');

    $res = pnModAPIFunc('Profile', 'admin', $func, array('dudid' => $prop_id));

    if (!$res) {
        AjaxUtil::error(__('Error! Could not save your changes.', $dom));
    }

    return array('result' => true,
                 'dudid' => $prop_id,
                 'newstatus' => !$oldstatus);
}

/**
 * get a profile section for an user
 *
 * @author Mateo Tibaquira
 * @param  uid   id of the user to query
 * @param  name  name of the section to retrieve
 * @param  args  [optional] arguments to the API
 * @return array output or Ajax error
 */
function Profile_ajax_profilesection()
{
    $dom = ZLanguage::getModuleDomain('Profile');

    if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_READ)) {
        AjaxUtil::error(__('Sorry! You do not have authorisation for this module.', $dom));
    }

    $uid  = FormUtil::getPassedValue('uid');
    $name = FormUtil::getPassedValue('name');
    $args = FormUtil::getPassedValue('args');

    if (empty($uid) || !is_numeric($uid) || empty($name)) {
        return array('result' => false);
    }
    if (empty($args) || !is_array($args)) {
        $args = array();
    }

    // update the item status
    $section = pnModAPIFunc('Profile', 'section', $name, array_merge($args, array('uid' => $uid)));

    if (!$section) {
        AjaxUtil::error(__('Error! Could not load the section.', $dom));
    }

    // build the output
    $render = & pnRender::getInstance('Profile', false, null, true);

    // check the tmeplate existance
    $template = "sections/profile_section_{$name}.htm";

    if (!$render->template_exists($template)) {
        return array('result' => false);
    }

    // assign and render the output
    $render->assign('section', $section);

    return array('result' => $render->fetch($template, $uid),
                 'name'   => $name,
                 'uid'    => $uid);
}
