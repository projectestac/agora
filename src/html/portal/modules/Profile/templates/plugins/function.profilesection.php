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
 * Smarty function to display a section of the user profile.
 *
 * Example
 * {profilesection name='ezcomments'}
 *
 * Parameters passed in via the $params array:
 * -------------------------------------------
 * numeric uid  The user account id of the user for which this profile section should be displayed.
 * string  name Section name to render.
 * 
 * @param array  $params  All parameters passed to this section from the template.
 * @param object &$smarty Reference to the Smarty object.
 * 
 * @return string|boolean The rendered section; empty string if the section is not defined; false if error.
 */
function smarty_function_profilesection($params, &$smarty)
{
    // validation
    if (!isset($params['name']) || empty($params['name'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('profilesection', 'name')));
        return false;
    }
    if (!isset($params['uid']) || empty($params['uid'])) {
        $params['uid'] = $smarty->get_template_vars('uid');
        if (empty($params['uid'])) {
            $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('profilesection', 'uid')));
            return false;
        }
    }

    $params['name'] = strtolower($params['name']);

    // extract the items to list
    $section = ModUtil::apiFunc('Profile', 'section', $params['name'], $params);

    if ($section === false) {
        return '';
    }

    // build the output
    $render = Zikula_View::getInstance('Profile', false, null, true);

    // check the tmeplate existance
    $template = "sections/profile_section_{$params['name']}.tpl";

    if (!$render->template_exists($template)) {
        return '';
    }

    // assign and render the output
    $render->assign('section', $section);

    return $render->fetch($template, $params['uid']);
}
