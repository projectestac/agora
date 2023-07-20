<?php
/**
 * Copyright (c) 2001-2012 Zikula Foundation
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license http://www.gnu.org/licenses/lgpl-3.0.html GNU/LGPLv3 (or at your option any later version).
 * @package Legal
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Administrator-initiated actions for the Legal module.
 */
class Legal_Controller_Admin extends Zikula_AbstractController
{
    /**
     * The main administration entry point.
     *
     * Redirects to the {@link modifyConfig()} function.
     *
     * @return void
     */
    public function main()
    {
        $this->redirect(ModUtil::url($this->name, 'admin', 'modifyConfig'));
    }

    /**
     * Modify configuration.
     *
     * Modify the configuration parameters of the module.
     *
     * @return string The rendered output of the modifyconfig template.
     *
     * @throws Zikula_Exception_Forbidden Thrown if the user does not have the appropriate access level for the function.
     */
    public function modifyconfig()
    {
        // Security check
        if (!SecurityUtil::checkPermission('legal::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // get all groups
        $groups = ModUtil::apiFunc('Groups', 'user', 'getall');

        // add dummy group "all groups" on top
        array_unshift($groups, array('gid' => 0, 'name' => $this->__('All users')));

        // add dummy group "no groups" on top
        array_unshift($groups, array('gid' => -1, 'name' => $this->__('No groups')));

        // Assign all the module vars
        return $this->view->assign(ModUtil::getVar('legal'))
            ->assign('groups', $groups)
            ->fetch('legal_admin_modifyconfig.tpl');
    }

    /**
     * Update the configuration.
     *
     * Save the results of modifying the configuration parameters of the module. Redirects to the module's main page
     * when completed.
     *
     * @return void
     *
     * @throws Zikula_Exception_Forbidden Thrown if the user does not have the appropriate access level for the function.
     */
    public function updateconfig()
    {
        // Security check
        if (!SecurityUtil::checkPermission($this->name . '::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Confirm the forms authorisation key
        $this->checkCsrfToken();

        // set our module variables
        $legalNoticeActive = $this->request->getPost()->get(Legal_Constant::MODVAR_LEGALNOTICE_ACTIVE, true);
        $this->setVar(Legal_Constant::MODVAR_LEGALNOTICE_ACTIVE, $legalNoticeActive);

        $termsOfUseActive = $this->request->getPost()->get(Legal_Constant::MODVAR_TERMS_ACTIVE, false);
        $this->setVar(Legal_Constant::MODVAR_TERMS_ACTIVE, $termsOfUseActive);

        $privacyPolicyActive = $this->request->getPost()->get(Legal_Constant::MODVAR_PRIVACY_ACTIVE, false);
        $this->setVar(Legal_Constant::MODVAR_PRIVACY_ACTIVE, $privacyPolicyActive);

        $accessibilityStmtActive = $this->request->getPost()->get(Legal_Constant::MODVAR_ACCESSIBILITY_ACTIVE, false);
        $this->setVar(Legal_Constant::MODVAR_ACCESSIBILITY_ACTIVE, $accessibilityStmtActive);

        $tradeConditionsActive = $this->request->getPost()->get(Legal_Constant::MODVAR_TRADECONDITIONS_ACTIVE, false);
        $this->setVar(Legal_Constant::MODVAR_TRADECONDITIONS_ACTIVE, $tradeConditionsActive);

        $cancellationRightPolicyActive = $this->request->getPost()->get(Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_ACTIVE, false);
        $this->setVar(Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_ACTIVE, $cancellationRightPolicyActive);


        $legalNoticeUrl = $this->request->getPost()->get(Legal_Constant::MODVAR_LEGALNOTICE_URL, '');
        $this->setVar(Legal_Constant::MODVAR_LEGALNOTICE_URL, $legalNoticeUrl);

        $termsOfUseUrl = $this->request->getPost()->get(Legal_Constant::MODVAR_TERMS_URL, '');
        $this->setVar(Legal_Constant::MODVAR_TERMS_URL, $termsOfUseUrl);

        $privacyPolicyUrl = $this->request->getPost()->get(Legal_Constant::MODVAR_PRIVACY_URL, '');
        $this->setVar(Legal_Constant::MODVAR_PRIVACY_URL, $privacyPolicyUrl);

        $accessibilityStmtUrl = $this->request->getPost()->get(Legal_Constant::MODVAR_ACCESSIBILITY_URL, '');
        $this->setVar(Legal_Constant::MODVAR_ACCESSIBILITY_URL, $accessibilityStmtUrl);

        $tradeConditionsUrl = $this->request->getPost()->get(Legal_Constant::MODVAR_TRADECONDITIONS_URL, '');
        $this->setVar(Legal_Constant::MODVAR_TRADECONDITIONS_URL, $tradeConditionsUrl);

        $cancellationRightPolicyUrl = $this->request->getPost()->get(Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_URL, '');
        $this->setVar(Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_URL, $cancellationRightPolicyUrl);


        $minimumAge = $this->request->getPost()->get(Legal_Constant::MODVAR_MINIMUM_AGE, 0);
        $this->setVar(Legal_Constant::MODVAR_MINIMUM_AGE, $minimumAge);

        $resetagreement = $this->request->getPost()->get('resetagreement', -1);
        if ($resetagreement != -1) {
            ModUtil::apiFunc($this->name, 'admin', 'resetagreement', array('gid' => $resetagreement));
        }

        // the module configuration has been updated successfuly
        $this->registerStatus($this->__('Done! Saved module configuration.'));

        // This function generated no output, and so now it is complete we redirect
        // the user to an appropriate page for them to carry on their work
        $this->redirect(ModUtil::url($this->name, 'admin', 'main'));
    }
}