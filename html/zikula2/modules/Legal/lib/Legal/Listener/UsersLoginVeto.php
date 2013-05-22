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
 * Provides listeners (handlers) for several events, including 'get.pendingcontent', and 'users.login.veto'.
 *
 * Simple listeners for the Users module can be added here. For more complex listeners/handlers, a separate
 * purpose-built class can be created.
 */
class Legal_Listener_UsersLoginVeto
{
    /**
     * Vetos (denies) a login attempt, and forces the user to accept policies.
     *
     * This handler is triggered by the 'user.login.veto' event.  It vetos (denies) a
     * login attempt if the users's Legal record is flagged to force the user to accept
     * one or more legal agreements.
     *
     * @param Zikula_Event $event The event that triggered this handler.
     *
     * @return void
     */
    public static function acceptPoliciesListener(Zikula_Event $event)
    {
        $domain = ZLanguage::getModuleDomain(Legal_Constant::MODNAME);

        $termsOfUseActive               = ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_TERMS_ACTIVE, false);
        $privacyPolicyActive            = ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_PRIVACY_ACTIVE, false);
        $agePolicyActive                = (ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_MINIMUM_AGE, 0) > 0);
        $cancellationRightPolicyActive  = ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_ACTIVE, false);
        $tradeConditionsActive          = ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_TRADECONDITIONS_ACTIVE, false);

        if ($termsOfUseActive || $privacyPolicyActive || $agePolicyActive || $cancellationRightPolicyActive || $tradeConditionsActive) {
            $userObj = $event->getSubject();

            if (isset($userObj) && ($userObj['uid'] > 2)) {
                if ($termsOfUseActive) {
                    $termsOfUseAcceptedDateTimeStr = UserUtil::getVar(Legal_Constant::ATTRIBUTE_TERMSOFUSE_ACCEPTED, $userObj['uid'], false);
                    $termsOfUseAccepted = isset($termsOfUseAcceptedDateTimeStr) && !empty($termsOfUseAcceptedDateTimeStr);
                } else {
                    $termsOfUseAccepted = true;
                }

                if ($privacyPolicyActive) {
                    $privacyPolicyAcceptedDateTimeStr = UserUtil::getVar(Legal_Constant::ATTRIBUTE_PRIVACYPOLICY_ACCEPTED, $userObj['uid'], false);
                    $privacyPolicyAccepted = isset($privacyPolicyAcceptedDateTimeStr) && !empty($privacyPolicyAcceptedDateTimeStr);
                } else {
                    $privacyPolicyAccepted = true;
                }

                if ($agePolicyActive) {
                    $agePolicyAcceptedDateTimeStr = UserUtil::getVar(Legal_Constant::ATTRIBUTE_AGEPOLICY_CONFIRMED, $userObj['uid'], false);
                    $agePolicyAccepted = isset($agePolicyAcceptedDateTimeStr) && !empty($agePolicyAcceptedDateTimeStr);
                } else {
                    $agePolicyAccepted = true;
                }

                if ($cancellationRightPolicyActive) {
                    $cancellationRightPolicyAcceptedDateTimeStr = UserUtil::getVar(Legal_Constant::ATTRIBUTE_CANCELLATIONRIGHTPOLICY_ACCEPTED, $userObj['uid'], false);
                    $cancellationRightPolicyAccepted = isset($cancellationRightPolicyAcceptedDateTimeStr) && !empty($cancellationRightPolicyAcceptedDateTimeStr);
                } else {
                    $cancellationRightPolicyAccepted = true;
                }

                if ($tradeConditionsActive) {
                    $tradeConditionsAcceptedDateTimeStr = UserUtil::getVar(Legal_Constant::ATTRIBUTE_TRADECONDITIONS_ACCEPTED, $userObj['uid'], false);
                    $tradeConditionsAccepted = isset($tradeConditionsAcceptedDateTimeStr) && !empty($tradeConditionsAcceptedDateTimeStr);
                } else {
                    $tradeConditionsAccepted = true;
                }

                if (!$termsOfUseAccepted || !$privacyPolicyAccepted || !$agePolicyAccepted || !$cancellationRightPolicyAccepted || !$tradeConditionsAccepted) {
                    $event->stop();
                    $event->data['redirect_func']  = array(
                            'modname'   => Legal_Constant::MODNAME,
                            'type'      => 'user',
                            'func'      => 'acceptPolicies',
                            'args'      => array(
                                'login'     => true,
                            ),
                            'session'   => array(
                                'var'       => 'Legal_Controller_User_acceptPolicies',
                                'namespace' => Legal_Constant::MODNAME,
                            )
                        );
                    LogUtil::registerError(__('Your log-in request was not completed. You must review and confirm your acceptance of one or more site policies prior to logging in.', $domain));
                }
            }
        }
    }
}
