<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuser.php 27323 2009-11-01 08:09:23Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage legal
 */

/**
 * Legal Module main user function
 * @author Michael M. Wechsler
 * @author Xiaoyu Huang
 * @return string HTML output string
 */
function legal_user_main()
{
    // Security check
    if (!SecurityUtil::checkPermission('legal::', '::', ACCESS_OVERVIEW)) {
        return LogUtil::registerPermissionError();
    }

    // Create output object
    $pnRender = & pnRender::getInstance('legal');

    return $pnRender->fetch('legal_user_main.htm');
}

/**
 * Display Terms of Use
 * @author Michael M. Wechsler
 * @author Xiaoyu Huang
 * @return string HTML output string
 */
function legal_user_termsofuse()
{
    $dom = ZLanguage::getModuleDomain('legal');
    // Security check
    if (!SecurityUtil::checkPermission('legal::termsofuse', '::', ACCESS_OVERVIEW)) {
        return LogUtil::registerPermissionError();
    }

    // check the option is active
    if (!pnModGetVar('legal', 'termsofuse')) {
        return LogUtil::registerError(__("'Terms of use' not activated.", $dom));
    }

    // Create output object
    $pnRender = & pnRender::getInstance('legal');

    // get the current users language
    $lang = ZLanguage::transformFS(ZLanguage::getLanguageCode());

    // work out the template path
    if ($pnRender->template_exists($lang.'/legal_user_termsofuse.htm')) {
        $template = $lang.'/legal_user_termsofuse.htm';
    } else {
        $template = 'en/legal_user_termsofuse.htm';
    }

    // check out if the contents are cached.
    // If this is the case, we do not need to make DB queries.
    if ($pnRender->is_cached($template)) {
       return $pnRender->fetch($template);
    }

    return $pnRender->fetch($template);
}

/**
 * Display Privacy Policy
 * @author Michael M. Wechsler
 * @author Xiaoyu Huang
 * @return string HTML output string
 */
function legal_user_privacy()
{
    $dom = ZLanguage::getModuleDomain('legal');
    // Security check
    if (!SecurityUtil::checkPermission('legal::privacy', '::', ACCESS_OVERVIEW)) {
        return LogUtil::registerPermissionError();
    }

    // check the option is active
    if (!pnModGetVar('legal', 'privacypolicy')) {
        return LogUtil::registerError(__("'Privacy policy' not activated.", $dom));
    }

    // Create output object
    $pnRender = & pnRender::getInstance('legal');

    // get the current users language
    $lang = ZLanguage::transformFS(ZLanguage::getLanguageCode());

    // work out the template path
    if ($pnRender->template_exists($lang.'/legal_user_privacy.htm')) {
        $template = $lang.'/legal_user_privacy.htm';
    } else {
        $template = 'en/legal_user_privacy.htm';
    }

    // check out if the contents are cached.
    // If this is the case, we do not need to make DB queries.
    if ($pnRender->is_cached($template)) {
       return $pnRender->fetch($template);
    }

    return $pnRender->fetch($template);
}

/**
 * Display Accessibility statement
 * @author Mark West
 * @return string HTML output string
 */
function legal_user_accessibilitystatement()
{
    // Security check
    if (!SecurityUtil::checkPermission('legal::accessibilitystatement', '::', ACCESS_OVERVIEW)) {
        return LogUtil::registerPermissionError();
    }

    // check the option is active
    if (!pnModGetVar('legal', 'accessibilitystatement')) {
        return LogUtil::registerError(__("'Accessibility statement' not activated.", $dom));
    }

    // Create output object
    $pnRender = & pnRender::getInstance('legal');

    // get the current users language
    $lang = ZLanguage::transformFS(ZLanguage::getLanguageCode());

    // work out the template path
    if ($pnRender->template_exists($lang.'/legal_user_accessibilitystatement.htm')) {
        $template = $lang.'/legal_user_accessibilitystatement.htm';
    } else {
        $template = 'en/legal_user_accessibilitystatement.htm';
    }

    // check out if the contents are cached.
    // If this is the case, we do not need to make DB queries.
    if ($pnRender->is_cached($template)) {
       return $pnRender->fetch($template);
    }

    return $pnRender->fetch($template);
}
