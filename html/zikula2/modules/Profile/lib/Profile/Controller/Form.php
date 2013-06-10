<?php
/**
 * Copyright Zikula Foundation 2009 - Zikula Application Framework
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
 * UI operations related to the display of dynamically defined user attributes.
 */
class Profile_Controller_Form extends Zikula_AbstractController
{
    /**
     * Display the dynadata section of a form for editing user accounts or registering for a new account.
     * 
     * Parameters passed via the $args array, or via POST:
     * ---------------------------------------------------
     * integer userid   The user id of the user for which the form section is being rendered; optional; defaults to 1, which will result in the use of 
     *                      default values from the anonymous user.
     * array   dynadata The dynamic user data with which to populate the form section; if not specified in $args it can be retrieved from a GET, POST, 
     *                      REQUEST, COOKIE, or SESSION variable.
     * 
     * @param array $args All parameters passed to this function via an internal call.
     *
     * @return string The rendered template output.
     */
    public function edit($args)
    {
        // can't use this function directly
        if (ModUtil::getName() == 'Profile') {
            return LogUtil::registerError($this->__("Error! You cannot access form functions directly." ), null, ModUtil::url('Profile', 'user', 'viewmembers'));
        }

        // The API function is called.
        $items = ModUtil::apiFunc('Profile', 'user', 'getallactive', array('get' => 'editable'));

        // The return value of the function is checked here
        if ($items == false) {
            return '';
        }

        // check if there's a user to edit
        // or uses uid=1 to pull the default values from the annonymous user
        $userid   = isset($args['userid']) ? $args['userid'] : 1;
        $dynadata = isset($args['dynadata']) ? $args['dynadata'] : $this->request->getPost()->get('dynadata', array());

        // merge this temporary dynadata and the errors into the items array
        foreach ($items as $prop_label => $item) {
            foreach ($dynadata as $propname => $propdata) {
                if ($item['prop_attribute_name'] == $propname) {
                    $items[$prop_label]['temp_propdata'] = $propdata;
                }
            }
        }

        $this->view->setCaching(false)
                    ->add_core_data()
                    ->assign('duditems', $items)
                    ->assign('userid', $userid);

        // Return the dynamic data section
        return $this->view->fetch('profile_form_edit.tpl');
    }

    /**
     * Display the dynadata section of the search form.
     *
     * @return string The rendered template output.
     */
    public function search()
    {
        // can't use this function directly
        if (ModUtil::getName() == 'Profile') {
            return LogUtil::registerError($this->__("Error! You cannot access form functions directly." ), null, ModUtil::url('Profile', 'user', 'viewmembers'));
        }

        // The API function is called.
        $items = ModUtil::apiFunc('Profile', 'user', 'getallactive');

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

        $this->view->setCaching(false)
                    ->assign('duditems', $items)
                    ->assign('userid', 1);

        // Return the dynamic data section
        return $this->view->fetch('profile_form_edit.tpl');
    }

    /**
     * Fills a z-datatable body with the passed dynadata.
     * 
     * Parameters passed via the $args array:
     * --------------------------------------
     * array userinfo The dynadata with which to populate the data table.
     * 
     * @param array $args All parameters passed to this function via an internal call.
     *
     * @return string The rendered template output.
     */
    public function display($args)
    {
        // can't use this function directly
        if (ModUtil::getName() == 'Profile') {
            return LogUtil::registerError($this->__("Error! You cannot access form functions directly." ), null, ModUtil::url('Profile', 'user', 'viewmembers'));
        }

        // The API function is called.
        $items = ModUtil::apiFunc('Profile', 'user', 'getallactive');

        // The return value of the function is checked here
        if ($items == false) {
            return '';
        }

        $userinfo = isset($args['userinfo']) ? $args['userinfo'] : array();

        // Create output object
        $this->view->setCaching(false)
                ->assign('duditems', $items)
                ->assign('userinfo', $userinfo);

        // Return the dynamic data rows
        return $this->view->fetch('profile_form_display.tpl');
    }
}