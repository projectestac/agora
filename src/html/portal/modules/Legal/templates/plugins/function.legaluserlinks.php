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
 * Smarty function to display user links for the Legal module.
 *
 * Example
 * {legaluserlinks start='[' end=']' seperator='|' class='z-menuitem-title'}
 *
 * Template used:
 *      legal_function_legaluserlinks.tpl
 *
 * Template Parameters:
 *      string $params['start']     DEPRECATED, modify the template instead; The string to display before all of the links; optional; default '['.
 *      string $params['end']       DEPRECATED, modify the template instead; The string to display between each of the links; optional; default '|'.
 *      string $params['separator'] DEPRECATED, modify the template instead; The string to display before all of the links; optional; default ']'.
 *      string $params['class']     DEPRECATED, modify the template instead; The string to display before all of the links; optional; default 'z-menuitem-title'.
 *
 * @param array       $params All parameters passed to this function from the template.
 * @param Zikula_View &$view  Reference to the Zikula view object, a subclass of Smarty.
 *
 * @return string The rendered legal_function_legaluserlinks.tpl template.
 */
function smarty_function_legaluserlinks($params, &$view)
{
    $dom = ZLanguage::getModuleDomain(Legal_Constant::MODNAME);
    $policies = array();
    if (ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_LEGALNOTICE_ACTIVE, false)) {
        $url = ModUtil::url(Legal_Constant::MODNAME, 'user', 'legalNotice');
        $customUrl = ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_LEGALNOTICE_URL, '');
        if (!empty($customUrl)) {
            $url = $customUrl;
        }
        $policies['legalNotice'] = array('title' => __('Legal notice', $dom), 'url' => $url);
    }
    if (ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_TERMS_ACTIVE, false)) {
        $url = ModUtil::url(Legal_Constant::MODNAME, 'user', 'termsOfUse');
        $customUrl = ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_TERMS_URL, '');
        if (!empty($customUrl)) {
            $url = $customUrl;
        }
        $policies['termsOfUse'] = array('title' => __('Terms of use', $dom), 'url' => $url);
    }
    if (ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_PRIVACY_ACTIVE, false)) {
        $url = ModUtil::url(Legal_Constant::MODNAME, 'user', 'privacyPolicy');
        $customUrl = ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_PRIVACY_URL, '');
        if (!empty($customUrl)) {
            $url = $customUrl;
        }
        $policies['privacyPolicy'] = array('title' => __('Privacy policy', $dom), 'url' => $url);
    }
    if (ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_TRADECONDITIONS_ACTIVE, false)) {
        $url = ModUtil::url(Legal_Constant::MODNAME, 'user', 'tradeConditions');
        $customUrl = ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_TRADECONDITIONS_URL, '');
        if (!empty($customUrl)) {
            $url = $customUrl;
        }
        $policies['tradeConditions'] = array('title' => __('Trade conditions', $dom), 'url' => $url);
    }
    if (ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_ACTIVE, false)) {
        $url = ModUtil::url(Legal_Constant::MODNAME, 'user', 'cancellationRightPolicy');
        $customUrl = ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_URL, '');
        if (!empty($customUrl)) {
            $url = $customUrl;
        }
        $policies['cancellationRightPolicy'] = array('title' => __('Cancellation right', $dom), 'url' => $url);
    }
    if (ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_ACCESSIBILITY_ACTIVE, false)) {
        $url = ModUtil::url(Legal_Constant::MODNAME, 'user', 'accessibilityStatement');
        $customUrl = ModUtil::getVar(Legal_Constant::MODNAME, Legal_Constant::MODVAR_PRIVACY_URL, '');
        if (!empty($customUrl)) {
            $url = $customUrl;
        }
        $policies['accessibilityStatement'] = array('title' => __('Accessibility statement', $dom), 'url' => $url);
    }

    $templateVariables = array(
        'policies'  => $policies,
        'domain'    => $dom,
        'start'     => isset($params['start'])     ? $params['start']     : '',
        'end'       => isset($params['end'])       ? $params['end']       : '',
        'seperator' => isset($params['seperator']) ? $params['seperator'] : '',
        'class'     => isset($params['class'])     ? $params['class']     : '',
    );

    return $view->assign($templateVariables)
            ->fetch('plugins/legal_function_legaluserlinks.tpl');
}
