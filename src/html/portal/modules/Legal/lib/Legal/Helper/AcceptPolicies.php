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
 * Helper class to process acceptance of policies.
 */
class Legal_Helper_AcceptPolicies
{
    /**
     * The module name.
     *
     * @var string
     */
    protected $name;

    /**
     * Construct a new instance of the helper, setting the $name attribute to the module name.
     */
    public function __construct() {
        $this->name = Legal_Constant::MODNAME;
    }

    /**
     * Retrieves flags indicating which policies are active.
     *
     * @return array An array containing flags indicating whether each policy is active or not.
     */
    public function getActivePolicies()
    {
        $termsOfUseActive               = ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_TERMS_ACTIVE, false);
        $privacyPolicyActive            = ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_PRIVACY_ACTIVE, false);
        $agePolicyActive                = (ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_MINIMUM_AGE, 0) != 0);
        $cancellationRightPolicyActive  = ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_ACTIVE, false);
        $tradeConditionsActive          = ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_TRADECONDITIONS_ACTIVE, false);

        return array(
            'termsOfUse'                => $termsOfUseActive,
            'privacyPolicy'             => $privacyPolicyActive,
            'agePolicy'                 => $agePolicyActive,
            'cancellationRightPolicy'   => $cancellationRightPolicyActive,
            'tradeConditions'           => $tradeConditionsActive
        );
    }

    /**
     * Helper method to determine acceptance / confirmation states for current user.
     *
     * @param numeric $uid            A valid uid.
     * @param boolean $isRegistration Whether we are in registration process or not.
     * @param string  $modVarName     Name of modvar storing desired state.
     *
     * @return boolean Fetched acceptance / confirmation state.
     */
    private function determineAcceptanceState($uid, $isRegistration, $modVarName)
    {
        $acceptanceState = false;

        if (!is_null($uid) && !empty($uid) && is_numeric($uid) && ($uid > 0)) {
            if ($uid > 2) {
                $acceptanceState = UserUtil::getVar($modVarName, $uid, false, $isRegistration);
            } else {
                // The special users (uid == 2 for admin, and uid == 1 for guest) have always accepted all policies.
                $now = new DateTime('now', new DateTimeZone('UTC'));
                $nowStr = $now->format(DateTime::ISO8601);
                $acceptanceState = $nowStr;
            }
        }

        return $acceptanceState;
    }

    /**
     * Retrieves flags indicating which policies the user with the given uid has already accepted.
     *
     * @param numeric $uid A valid uid.
     *
     * @return array An array containing flags indicating whether each policy has been accepted by the user or not.
     */
    public function getAcceptedPolicies($uid = null)
    {
        if (!is_null($uid)) {
            $isRegistration = UserUtil::isRegistration($uid);
        } else {
            $isRegistration = false;
        }

        $termsOfUseAcceptedDateStr              = $this->determineAcceptanceState($uid, $isRegistration, Legal_Constant::ATTRIBUTE_TERMSOFUSE_ACCEPTED);
        $privacyPolicyAcceptedDateStr           = $this->determineAcceptanceState($uid, $isRegistration, Legal_Constant::ATTRIBUTE_PRIVACYPOLICY_ACCEPTED);
        $agePolicyConfirmedDateStr              = $this->determineAcceptanceState($uid, $isRegistration, Legal_Constant::ATTRIBUTE_AGEPOLICY_CONFIRMED);
        $cancellationRightPolicyAcceptedDateStr = $this->determineAcceptanceState($uid, $isRegistration, Legal_Constant::ATTRIBUTE_CANCELLATIONRIGHTPOLICY_ACCEPTED);
        $tradeConditionsAcceptedDateStr         = $this->determineAcceptanceState($uid, $isRegistration, Legal_Constant::ATTRIBUTE_TRADECONDITIONS_ACCEPTED);

        $termsOfUseAcceptedDate                 = $termsOfUseAcceptedDateStr                ? new DateTime($termsOfUseAcceptedDateStr)              : false;
        $privacyPolicyAcceptedDate              = $privacyPolicyAcceptedDateStr             ? new DateTime($privacyPolicyAcceptedDateStr)           : false;
        $agePolicyConfirmedDate                 = $agePolicyConfirmedDateStr                ? new DateTime($agePolicyConfirmedDateStr)              : false;
        $cancellationRightPolicyAcceptedDate    = $cancellationRightPolicyAcceptedDateStr   ? new DateTime($cancellationRightPolicyAcceptedDateStr) : false;
        $tradeConditionsAcceptedDate            = $tradeConditionsAcceptedDateStr           ? new DateTime($tradeConditionsAcceptedDateStr)         : false;

        $now = new DateTime();

        $termsOfUseAccepted                 = $termsOfUseAcceptedDate               ? ($termsOfUseAcceptedDate <= $now)                 : false;
        $privacyPolicyAccepted              = $privacyPolicyAcceptedDate            ? ($privacyPolicyAcceptedDate <= $now)              : false;
        $agePolicyConfirmed                 = $agePolicyConfirmedDate               ? ($agePolicyConfirmedDate <= $now)                 : false;
        $cancellationRightPolicyAccepted    = $cancellationRightPolicyAcceptedDate  ? ($cancellationRightPolicyAcceptedDate <= $now)    : false;
        $tradeConditionsAccepted            = $tradeConditionsAcceptedDate          ? ($tradeConditionsAcceptedDate <= $now)            : false;

        return array(
            'termsOfUse'                => $termsOfUseAccepted,
            'privacyPolicy'             => $privacyPolicyAccepted,
            'agePolicy'                 => $agePolicyConfirmed,
            'cancellationRightPolicy'   => $cancellationRightPolicyAccepted,
            'tradeConditions'           => $tradeConditionsAccepted
        );
    }

    /**
     * Determine whether the current user can view the acceptance/confirmation status of certain policies.
     *
     * If the current user is the subject user, then the user can always see his status for each policy. If the current user is not the
     * same as the subject user, then the current user can only see the status if he has ACCESS_MODERATE access for the policy.
     *
     * @param numeric $uid The uid of the subject account record (not the current user, but the subject user); optional.
     *
     * @return array An array containing flags indicating whether the current user is permitted to view the specified policy.
     */
    public function getViewablePolicies($uid = null)
    {
        $currentUid = UserUtil::getVar('uid');
        $isCurrentUser = (!is_null($uid) && ($uid == $currentUid));

        return array(
            'termsOfUse'                => $isCurrentUser ? true : SecurityUtil::checkPermission($this->name . '::termsofuse', '::', ACCESS_MODERATE),
            'privacyPolicy'             => $isCurrentUser ? true : SecurityUtil::checkPermission($this->name . '::privacypolicy', '::', ACCESS_MODERATE),
            'agePolicy'                 => $isCurrentUser ? true : SecurityUtil::checkPermission($this->name . '::agepolicy', '::', ACCESS_MODERATE),
            'cancellationRightPolicy'   => $isCurrentUser ? true : SecurityUtil::checkPermission($this->name . '::cancellationrightpolicy', '::', ACCESS_MODERATE),
            'tradeConditions'           => $isCurrentUser ? true : SecurityUtil::checkPermission($this->name . '::tradeconditions', '::', ACCESS_MODERATE)
        );
    }

    /**
     * Determine whether the current user can edit the acceptance/confirmation status of certain policies.
     *
     * The current user can only edit the status if he has ACCESS_EDIT access for the policy, whether he is the subject user or not. The ability to edit
     * status for login and new registrations is handled differently, and does not count on the output of this function.
     *
     * @return array An array containing flags indicating whether the current user is permitted to edit the specified policy.
     */
    public function getEditablePolicies()
    {
        return array(
            'termsOfUse'                => SecurityUtil::checkPermission($this->name . '::termsofuse', '::', ACCESS_EDIT),
            'privacyPolicy'             => SecurityUtil::checkPermission($this->name . '::privacypolicy', '::', ACCESS_EDIT),
            'agePolicy'                 => SecurityUtil::checkPermission($this->name . '::agepolicy', '::', ACCESS_EDIT),
            'cancellationRightPolicy'   => SecurityUtil::checkPermission($this->name . '::cancellationrightpolicy', '::', ACCESS_EDIT),
            'tradeConditions'           => SecurityUtil::checkPermission($this->name . '::tradeconditions', '::', ACCESS_EDIT)
        );
    }
}
