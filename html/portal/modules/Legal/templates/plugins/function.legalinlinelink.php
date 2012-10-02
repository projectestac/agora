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
 * Smarty function to display a single inline user link of a specific policy for the Legal module.
 *
 * Example
 * {legalinlinelink policytype='termsofuse'}
 *
 * Tag Parameters:
 *      policyType  The unique string identifier of the policy typw whose inline link is to be returned; required.
 *      target      The target for the generated link, such as "_blank" to open the policy in a new window; optional, default is blank (same effect as "_self").
 *      assign      The name of the template variable to which the output is assiged, if provided; optional, if not specified the output is sent to the template.
 *
 * Templates used:
 *      legal_function_legalinlinelink_notfound.tpl
 *      legal_function_legalinlinelink_legalnotice.tpl
 *      legal_function_legalinlinelink_termsofuse.tpl
 *      legal_function_legalinlinelink_privacypolicy.tpl
 *      legal_function_legalinlinelink_tradeconditions.tpl
 *      legal_function_legalinlinelink_cancellationrightpolicy.tpl
 *      legal_function_legalinlinelink_accessibilitystatement.tpl
 *
 * Template Parameters Exported:
 *      $target  The target for the generated link, such as "_blank" to open the policy in a new window; optional, default is blank (same effect as "_self").
 *      (assign) If an assign tag parameter is specified, then a template variable a name equal to the value of the assign parameter is exported, containing the rendered output; optional, default is to return the output to the template.
 *
 * @param array       $params All parameters passed to this function from the template.
 * @param Zikula_View &$view  Reference to the Zikula view object, a subclass of Smarty.
 *
 * @return string The rendered template output for the specified policy type.
 */
function smarty_function_legalinlinelink($params, Zikula_View &$view)
{
    if (!isset($params['policyType'])) {
        $template = 'plugins/legal_function_legalinlinelink_notfound.tpl';
    } else {
        $params['policyType'] = strtolower($params['policyType']);
        $template = 'plugins/legal_function_legalinlinelink_' . $params['policyType'] . '.tpl';

        if (!$view->template_exists($template)) {
            $template = 'plugins/legal_function_legalinlinelink_notfound.tpl';
        }
    }

    $templateVars = array(
        'target' => isset($params['target']) ? $params['target'] : ''
    );

    $view->assign($templateVars);

    if (isset($params['assign']) && !empty($params['assign'])) {
        $view->assign($params['assign'], $view->fetch($template));
    } else {
        return $view->fetch($template);
    }
}
