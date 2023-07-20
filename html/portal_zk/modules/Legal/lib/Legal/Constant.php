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
 * Module-wide constants for the Legal module.
 *
 * NOTE: Do not define anything other than constants in this class!
 */
class Legal_Constant
{
    /**
     * The official internal module name.
     *
     * @var string
     */
    const MODNAME = 'Legal';

    /**
     * The module variable name indicating that the legal notice is active.
     *
     * @var string
     */
    const MODVAR_LEGALNOTICE_ACTIVE = 'legalNoticeActive';

    /**
     * The module variable name indicating that the terms of use is active.
     *
     * @var string
     */
    const MODVAR_TERMS_ACTIVE = 'termsOfUseActive';

    /**
     * The module variable name indicating that the privacy policy is active.
     *
     * @var string
     */
    const MODVAR_PRIVACY_ACTIVE = 'privacyPolicyActive';

    /**
     * The module variable name indicating that the accessibility statement is active.
     *
     * @var string
     */
    const MODVAR_ACCESSIBILITY_ACTIVE = 'accessibilityStatementActive';

    /**
     * The module variable name indicating that the trade conditions page is active.
     *
     * @var string
     */
    const MODVAR_TRADECONDITIONS_ACTIVE = 'tradeConditionsActive';

    /**
     * The module variable name indicating that the cancellation right policy page is active.
     *
     * @var string
     */
    const MODVAR_CANCELLATIONRIGHTPOLICY_ACTIVE = 'cancellationRightPolicyActive';

    /**
     * The module variable name storing an optional url for the legal notice.
     *
     * @var string
     */
    const MODVAR_LEGALNOTICE_URL = 'legalNoticeUrl';

    /**
     * The module variable name storing an optional url for the terms of use.
     *
     * @var string
     */
    const MODVAR_TERMS_URL = 'termsOfUseUrl';

    /**
     * The module variable name storing an optional url for the privacy policy.
     *
     * @var string
     */
    const MODVAR_PRIVACY_URL = 'privacyPolicyUrl';

    /**
     * The module variable name storing an optional url for the accessibility guidelines.
     *
     * @var string
     */
    const MODVAR_ACCESSIBILITY_URL = 'accessibilityStatementUrl';

    /**
     * The module variable name storing an optional url for the trade conditions.
     *
     * @var string
     */
    const MODVAR_TRADECONDITIONS_URL = 'tradeConditionsUrl';

    /**
     * The module variable name storing an optional url for the cancellation right policy.
     *
     * @var string
     */
    const MODVAR_CANCELLATIONRIGHTPOLICY_URL = 'cancellationRightPolicyUrl';

    /**
     * The module variable containing the minimum age.
     *
     * @var string
     */
    const MODVAR_MINIMUM_AGE = 'minimumAge';

    /**
     * Users account record attribute key for terms of use acceptance
     *
     * @var string
     */
    const ATTRIBUTE_TERMSOFUSE_ACCEPTED = '_Legal_termsOfUseAccepted';

    /**
     * Users account record attribute key for terms of use acceptance
     *
     * @var string
     */
    const ATTRIBUTE_PRIVACYPOLICY_ACCEPTED = '_Legal_privacyPolicyAccepted';

    /**
     * Users account record attribute key for age policy confirmation.
     *
     * @var string
     */
    const ATTRIBUTE_AGEPOLICY_CONFIRMED = '_Legal_agePolicyConfirmed';

    /**
     * Users account record attribute key for cancellation right policy acceptance.
     *
     * @var string
     */
    const ATTRIBUTE_CANCELLATIONRIGHTPOLICY_ACCEPTED = '_Legal_cancellationRightPolicyConfirmed';

    /**
     * Users account record attribute key for trade conditions acceptance.
     *
     * @var string
     */
    const ATTRIBUTE_TRADECONDITIONS_ACCEPTED = '_Legal_tradeConditionsConfirmed';
}
