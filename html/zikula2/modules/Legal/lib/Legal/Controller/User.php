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
 * Module controller for user-related operations.
 */
class Legal_Controller_User extends Zikula_AbstractController
{

    /**
     * Legal Module main user function.
     *
     * Redirects to the Terms of Use legal document.
     *
     * @return void
     */
    public function main()
    {
        $url = $this->getVar(Legal_Constant::MODVAR_TERMS_URL, '');
        if (empty($url)) {
            $url = ModUtil::url($this->name, 'user', 'termsOfUse');
        }
        $this->redirect($url);
    }

    /**
     * Render and display the specified legal document, or redirect to the specified custom URL if it exists.
     *
     * If a custom URL for the legal document exists, as specified by the module variable identified by $customUrlKey, then
     * this function will redirect the user to that URL.
     *
     * If no custom URL exists, then this function will render and return the appropriate template for the legal document, as
     * specified by $documentName. If the legal document
     *
     * @param string $documentName      The "name" of the document, as specified by the names of the user and text template
     *                                      files in the format 'legal_user_documentname.tpl' and 'legal_text_documentname.tpl'.
     * @param string $accessInstanceKey The string used in the instance_right part of the permission access key for this document.
     * @param string $activeFlagKey     The string used to name the module variable that indicates whether this legal document is
     *                                      active or not; typically this is a constant from {@link Legal_Constant}, such as
     *                                      {@link Legal_Constant::MODVAR_LEGALNOTICE_ACTIVE}.
     * @param string $customUrlKey      The string used to name the module variable that contains a custom static URL for the
     *                                      legal document; typically this is a constant from {@link Legal_Constant}, such as
     *                                      {@link Legal_Constant::MODVAR_TERMS_URL}.
     *
     * @return string HTML output string
     *
     * @throws Zikula_Exception_Forbidden Thrown if the user does not have the appropriate access level for the function.
     */
    private function renderDocument($documentName, $accessInstanceKey, $activeFlagKey, $customUrlKey)
    {
        // Security check
        if (!SecurityUtil::checkPermission($this->name . '::' . $accessInstanceKey, '::', ACCESS_OVERVIEW)) {
            throw new Zikula_Exception_Forbidden();
        }

        if (!$this->getVar($activeFlagKey)) {
            return $this->view->fetch('legal_user_policynotactive.tpl');
        } else {
            $customUrl = $this->getVar($customUrlKey, '');
            if (empty($customUrl)) {
                // work out the template path
                $template = "legal_user_{$documentName}.tpl";

                // get the current users language
                $languageCode = ZLanguage::transformFS(ZLanguage::getLanguageCode());

                if (!$this->view->template_exists("{$languageCode}/legal_text_{$documentName}.tpl")) {
                    $languageCode = 'en';
                }

                return $this->view->assign('languageCode', $languageCode)
                        ->fetch($template);
            } else {
                $this->redirect($customUrl);
            }
        }
    }

    /**
     * Display Legal notice.
     *
     * @return string HTML output string
     *
     * @throws Zikula_Exception_Forbidden Thrown if the user does not have the appropriate access level for the function.
     */
    public function legalNotice()
    {
        return $this->renderDocument('legalnotice', 'legalnotice', Legal_Constant::MODVAR_LEGALNOTICE_ACTIVE, Legal_Constant::MODVAR_LEGALNOTICE_URL);
    }

    /**
     * Display Terms of Use
     *
     * @return string HTML output string
     *
     * @throws Zikula_Exception_Forbidden Thrown if the user does not have the appropriate access level for the function.
     */
    public function termsofuse()
    {
        return $this->renderDocument('termsofuse', 'termsofuse', Legal_Constant::MODVAR_TERMS_ACTIVE, Legal_Constant::MODVAR_TERMS_URL);
    }

    /**
     * Display Privacy Policy.
     *
     * Redirects to {@link privacyPolicy()}.
     *
     * @deprecated Since 1.6.1
     *
     * @return void
     */
    public function privacy()
    {
        $this->redirect(ModUtil::url($this->name, 'user', 'privacyPolicy'));
    }

    /**
     * Display Privacy Policy
     *
     * @return string HTML output string
     *
     * @throws Zikula_Exception_Forbidden Thrown if the user does not have the appropriate access level for the function.
     */
    public function privacyPolicy()
    {
        return $this->renderDocument('privacypolicy', 'privacypolicy', Legal_Constant::MODVAR_PRIVACY_ACTIVE, Legal_Constant::MODVAR_PRIVACY_URL);
    }

    /**
     * Display Accessibility statement
     *
     * @return string HTML output string
     *
     * @throws Zikula_Exception_Forbidden Thrown if the user does not have the appropriate access level for the function.
     */
    public function accessibilitystatement()
    {
        return $this->renderDocument('accessibilitystatement', 'accessibilitystatement', Legal_Constant::MODVAR_ACCESSIBILITY_ACTIVE, Legal_Constant::MODVAR_ACCESSIBILITY_URL);
    }

    /**
     * Display Cancellation right policy
     *
     * @return string HTML output string
     *
     * @throws Zikula_Exception_Forbidden Thrown if the user does not have the appropriate access level for the function.
     */
    public function cancellationRightPolicy()
    {
        return $this->renderDocument('cancellationrightpolicy', 'cancellationrightpolicy', Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_ACTIVE, Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_URL);
    }

    /**
     * Display Trade conditions
     *
     * @return string HTML output string
     *
     * @throws Zikula_Exception_Forbidden Thrown if the user does not have the appropriate access level for the function.
     */
    public function tradeConditions()
    {
        return $this->renderDocument('tradeconditions', 'tradeconditions', Legal_Constant::MODVAR_TRADECONDITIONS_ACTIVE, Legal_Constant::MODVAR_TRADECONDITIONS_URL);
    }

    /**
     * Allow the user to accept active terms of use and/or privacy policy.
     *
     * This function is currently used by the Legal module's handler for the users.login.veto event.
     *
     * @return string The rendered output from the template.
     *
     * @throws Zikula_Exception_Forbidden Thrown if the user is not logged in and the acceptance attempt is not a result of a login attempt.
     *
     * @throws Zikula_Exception_Fatal Thrown if the user is already logged in and the acceptance attempt is a result of a login attempt;
     *      also thrown in cases where expected data is not present or not in an expected form;
     *      also thrown if the call to this function is not the result of a POST operation or a GET operation.
     */
    public function acceptPolicies()
    {
        // Retrieve and delete any session variables being sent in by the log-in process before we give the function a chance to
        // throw an exception. We need to make sure no sensitive data is left dangling in the session variables.
        $sessionVars = $this->request->getSession()->get('Legal_Controller_User_acceptPolicies', null, $this->name);
        $this->request->getSession()->del('Legal_Controller_User_acceptPolicies', $this->name);

        $processed = false;
        $helper = new Legal_Helper_AcceptPolicies();

        if ($this->request->isPost()) {
            $this->checkCsrfToken();

            $isLogin = isset($sessionVars) && !empty($sessionVars);

            if (!$isLogin && !UserUtil::isLoggedIn()) {
                throw new Zikula_Exception_Forbidden();
            } elseif ($isLogin && UserUtil::isLoggedIn()) {
                throw new Zikula_Exception_Fatal();
            }

            $policiesUid = $this->request->getPost()->get('acceptedpolicies_uid', false);
            $acceptedPolicies = array(
                'termsOfUse'                => $this->request->getPost()->get('acceptedpolicies_termsofuse', false),
                'privacyPolicy'             => $this->request->getPost()->get('acceptedpolicies_privacypolicy', false),
                'agePolicy'                 => $this->request->getPost()->get('acceptedpolicies_agepolicy', false),
                'cancellationRightPolicy'   => $this->request->getPost()->get('acceptedpolicies_cancellationrightpolicy', false),
                'tradeConditions'           => $this->request->getPost()->get('acceptedpolicies_tradeconditions', false)
            );

            if (!isset($policiesUid) || empty($policiesUid) || !is_numeric($policiesUid)) {
                throw new Zikula_Exception_Fatal();
            }

            $activePolicies = $helper->getActivePolicies();
            $originalAcceptedPolicies = $helper->getAcceptedPolicies($policiesUid);

            $fieldErrors = array();

            if ($activePolicies['termsOfUse'] && !$originalAcceptedPolicies['termsOfUse'] && !$acceptedPolicies['termsOfUse']) {
                $fieldErrors['termsofuse'] = $this->__('You must accept this site\'s Terms of Use in order to proceed.');
            }

            if ($activePolicies['privacyPolicy'] && !$originalAcceptedPolicies['privacyPolicy'] && !$acceptedPolicies['privacyPolicy']) {
                $fieldErrors['privacypolicy'] = $this->__('You must accept this site\'s Privacy Policy in order to proceed.');
            }

            if ($activePolicies['agePolicy'] && !$originalAcceptedPolicies['agePolicy'] && !$acceptedPolicies['agePolicy']) {
                $fieldErrors['agepolicy'] = $this->__f('In order to log in, you must confirm that you meet the requirements of this site\'s Minimum Age Policy. If you are not %1$s years of age or older, and you do not have a parent\'s permission to use this site, then please ask your parent to contact a site administrator.', array(ModUtil::getVar('Legal', Legal_Constant::MODVAR_MINIMUM_AGE, 0)));
            }

            if ($activePolicies['cancellationRightPolicy'] && !$originalAcceptedPolicies['cancellationRightPolicy'] && !$acceptedPolicies['cancellationRightPolicy']) {
                $fieldErrors['cancellationrightpolicy'] = $this->__('You must accept our cancellation right policy in order to proceed.');
            }

            if ($activePolicies['tradeConditions'] && !$originalAcceptedPolicies['tradeConditions'] && !$acceptedPolicies['tradeConditions']) {
                $fieldErrors['tradeconditions'] = $this->__('You must accept our general terms and conditions of trade in order to proceed.');
            }

            if (empty($fieldErrors)) {
                $now = new DateTime('now', new DateTimeZone('UTC'));
                $nowStr = $now->format(DateTime::ISO8601);

                if ($activePolicies['termsOfUse'] && $acceptedPolicies['termsOfUse']) {
                    $termsOfUseProcessed = UserUtil::setVar(Legal_Constant::ATTRIBUTE_TERMSOFUSE_ACCEPTED, $nowStr, $policiesUid);
                } else {
                    $termsOfUseProcessed = !$activePolicies['termsOfUse'] || $originalAcceptedPolicies['termsOfUse'];
                }

                if ($activePolicies['privacyPolicy'] && $acceptedPolicies['privacyPolicy']) {
                    $privacyPolicyProcessed = UserUtil::setVar(Legal_Constant::ATTRIBUTE_PRIVACYPOLICY_ACCEPTED, $nowStr, $policiesUid);
                } else {
                    $privacyPolicyProcessed = !$activePolicies['privacyPolicy'] || $originalAcceptedPolicies['privacyPolicy'];
                }

                if ($activePolicies['agePolicy'] && $acceptedPolicies['agePolicy']) {
                    $agePolicyProcessed = UserUtil::setVar(Legal_Constant::ATTRIBUTE_AGEPOLICY_CONFIRMED, $nowStr, $policiesUid);
                } else {
                    $agePolicyProcessed = !$activePolicies['agePolicy'] || $originalAcceptedPolicies['agePolicy'];
                }

                if ($activePolicies['cancellationRightPolicy'] && $acceptedPolicies['cancellationRightPolicy']) {
                    $cancellationRightPolicyProcessed = UserUtil::setVar(Legal_Constant::ATTRIBUTE_CANCELLATIONRIGHTPOLICY_ACCEPTED, $nowStr, $policiesUid);
                } else {
                    $cancellationRightPolicyProcessed = !$activePolicies['cancellationRightPolicy'] || $originalAcceptedPolicies['cancellationRightPolicy'];
                }

                if ($activePolicies['tradeConditions'] && $acceptedPolicies['tradeConditions']) {
                    $tradeConditionsProcessed = UserUtil::setVar(Legal_Constant::ATTRIBUTE_TRADECONDITIONS_ACCEPTED, $nowStr, $policiesUid);
                } else {
                    $tradeConditionsProcessed = !$activePolicies['tradeConditions'] || $originalAcceptedPolicies['tradeConditions'];
                }

                $processed = $termsOfUseProcessed && $privacyPolicyProcessed && $agePolicyProcessed && $cancellationRightPolicyProcessed && $tradeConditionsProcessed;
            }

            if ($processed) {
                if ($isLogin) {
                    $loginArgs = $this->request->getSession()->get('Users_Controller_User_login', array(), 'Zikula_Users');
                    $loginArgs['authentication_method'] = $sessionVars['authentication_method'];
                    $loginArgs['authentication_info']   = $sessionVars['authentication_info'];
                    $loginArgs['rememberme']            = $sessionVars['rememberme'];
                    return ModUtil::func('Users', 'user', 'login', $loginArgs);
                } else {
                    $this->redirect(System::getHomepageUrl());
                }
            }
        } elseif ($this->request->isGet()) {
            $isLogin = $this->request->getGet()->get('login', false);
            $fieldErrors = array();
        } else {
            throw new Zikula_Exception_Forbidden();
        }

        // If we are coming here from the login process, then there are certain things that must have been
        // send along in the session variable. If not, then error.
        if ($isLogin && (!isset($sessionVars['user_obj']) || !is_array($sessionVars['user_obj'])
                || !isset($sessionVars['authentication_info']) || !is_array($sessionVars['authentication_info'])
                || !isset($sessionVars['authentication_method']) || !is_array($sessionVars['authentication_method']))
                ) {
            throw new Zikula_Exception_Fatal();
        }

        if ($isLogin) {
            $policiesUid = $sessionVars['user_obj']['uid'];
        } else {
            $policiesUid = UserUtil::getVar('uid');
        }

        if (!$policiesUid || empty($policiesUid)) {
            throw new Zikula_Exception_Fatal();
        }

        if ($isLogin) {
            // Pass along the session vars to updateAcceptance. We didn't want to just keep them in the session variable
            // Legal_Controller_User_acceptPolicies because if we hit an exception or got redirected, then the data
            // would have been orphaned, and it contains some sensitive information.
            SessionUtil::requireSession();
            $this->request->getSession()->set('Legal_Controller_User_acceptPolicies', $sessionVars, $this->name);
        }

        $templateVars = array(
            'login'                     => $isLogin,
            'policiesUid'               => $policiesUid,
            'activePolicies'            => $helper->getActivePolicies(),
            'acceptedPolicies'          => isset($acceptedPolicies) ? $acceptedPolicies : $helper->getAcceptedPolicies($policiesUid),
            'originalAcceptedPolicies'  => isset($originalAcceptedPolicies) ? $originalAcceptedPolicies : $helper->getAcceptedPolicies($policiesUid),
            'fieldErrors'               => $fieldErrors,
        );

        return $this->view->assign($templateVars)
                ->fetch('legal_user_acceptpolicies.tpl');
    }
}