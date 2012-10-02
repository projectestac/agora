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
 * AJAX query and response functions.
 */
class Profile_Controller_Ajax extends Zikula_Controller_AbstractAjax
{
    /**
     * Change the weight of a profile item.
     * 
     * Parameters passed in via POST, or via GET:
     * ------------------------------------------
     * array   profilelist An array of dud item ids for which the weight should be changed.
     * numeric startnum    The desired weight of the first item in the list minus 1 (e.g., if the weight of the first item should be 3 then startnum contains 2)
     *
     * @return mixed An AJAX result array containing a result equal to true, or an Ajax error.
     */
    public function changeprofileweight()
    {
        $this->checkAjaxToken();

        if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden($this->__('Sorry! You do not have authorisation for this module.'));
        }

        $profilelist = $this->request->getPost()->get('profilelist', $this->request->getGet()->get('profilelist', null));
        $startnum    = $this->request->getPost()->get('startnum', $this->request->getGet()->get('startnum', null));

        if ($startnum < 0) {
            AjaxUtil::error($this->__f("Error! Invalid '%s' passed.", 'startnum'));
        }

        // update the items with the new weights
        $items = array();
        $weight = $startnum + 1;
        parse_str($profilelist);
        foreach ($profilelist as $prop_id) {
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
            throw new Zikula_Exception_Fatal($this->__('Error! Could not save your changes.'));
        }

        return new Zikula_Response_Ajax(array('result' => true));
    }

    /**
     * Change the status of a profile item.
     *
     * Parameters passed in via POST, or via GET:
     * ------------------------------------------
     * numeric dudid     Id of the property to update.
     * boolean oldstatus True to activate or false to deactivate the item.
     * 
     * @return mixed An AJAX result array containing a result equal to true along with the dud id and new status, or an Ajax error.
     */
    public function changeprofilestatus()
    {
        $this->checkAjaxToken();

        if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden($this->__('Sorry! You do not have authorisation for this module.'));
        }

        $prop_id   = $this->request->getPost()->get('dudid', $this->request->getGet()->get('dudid', null));
        $oldstatus = (bool)$this->request->getPost()->get('oldstatus', $this->request->getGet()->get('oldstatus', null));

        if (!$prop_id) {
            return array('result' => false);
        }

        // update the item status
        $func = ($oldstatus ? 'deactivate' : 'activate');

        $res = ModUtil::apiFunc('Profile', 'admin', $func, array('dudid' => $prop_id));

        if (!$res) {
            throw new Zikula_Exception_Fatal($this->__('Error! Could not save your changes.'));
        }

        return new Zikula_Response_Ajax(array('result' => true,
                                              'dudid' => $prop_id,
                                              'newstatus' => !$oldstatus));

    }

    /**
     * Get a profile section for a user.
     *
     * Parameters passed in via POST, or via GET:
     * ------------------------------------------
     * numeric uid  Id of the user to query.
     * string  name Name of the section to retrieve.
     * array   args Optional arguments to the API.
     * 
     * @return mixed An AJAX result array containing a result equal to the rendered output along with the section name and uid, or an Ajax error.
     */
    public function profilesection()
    {
        $this->checkAjaxToken();

        if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden($this->__('Sorry! You do not have authorisation for this module.'));
        }

        $uid  = $this->request->getPost()->get('uid', $this->request->getGet()->get('uid', null));
        $name = $this->request->getPost()->get('name', $this->request->getGet()->get('name', null));
        $args = $this->request->getPost()->get('args', $this->request->getGet()->get('args', null));

        if (empty($uid) || !is_numeric($uid) || empty($name)) {
            return array('result' => false);
        }
        if (empty($args) || !is_array($args)) {
            $args = array();
        }

        // update the item status
        $section = ModUtil::apiFunc('Profile', 'section', $name, array_merge($args, array('uid' => $uid)));

        if (!$section) {
            throw new Zikula_Exception_Fatal($this->__('Error! Could not load the section.'));
        }

        // build the output
        $this->view->setCaching(false)->add_core_data();

        // check the tmeplate existance
        $template = "sections/profile_section_{$name}.tpl";

        if (!$this->view->template_exists($template)) {
            return array('result' => false);
        }

        // assign and render the output
        $this->view->assign('section', $section);

        return new Zikula_Response_Ajax(array('result' => $this->view->fetch($template, $uid),
                                              'name'   => $name,
                                              'uid'    => $uid));
    }
}
