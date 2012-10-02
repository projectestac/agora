<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuser.php 27504 2009-11-10 11:42:32Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Header_Footer
 */

/**
 * The main header_footer user function
 * @author Mark West
 * @return HTML String
 */
function Header_Footer_user_main()
{
    return LogUtil::registerError(__('Sorry! This module is not designed or is not currently configured to be accessed in the way you attempted.'), 403);
}

/**
 * The render header_footer user function
 * @author Mark West
 * @return true is OK
 */
function Header_Footer_user_render()
{
    global $themesarein;

    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $pnRender = & pnRender::getInstance('Header_Footer', false);

    // get the current theme
    $thistheme = pnUserGetTheme();

    // register page vars output filter
    $pnRender->load_filter('output','pagevars');

    // register short urls output filter if requried
    if (pnConfigGetVar('shorturls')) {
        $pnRender->load_filter('output','shorturls');
    }

    // register trim whitespace output filter if requried
    if (pnModGetVar('Theme', 'trimwhitespace')) {
        $pnRender->load_filter('output','trimwhitespace');
    }

    // get the output from the module (and themeheader/footer)
    $maincontent = ob_get_contents();
    ob_end_clean();
    //strip the main content of the closing head and opening
    // body tag - this allows the main template to be a properly
    // formed html file (a little hacky but hey..it's for
    // legacy themes.....
    $maincontent = str_replace('</head>', '', $maincontent);
    $maincontent = str_replace('<body>', '', $maincontent);
    $pnRender->assign_by_ref('maincontent', $maincontent);

    $baseuri = pnGetBaseURI();
    // assign the theme paths
    $pnRender->assign('themepath', "$baseuri/{$themesarein}themes/$thistheme");
    $pnRender->assign('stylepath', "$baseuri/{$themesarein}themes/$thistheme/style");
    $pnRender->assign('imagepath', "$baseuri/{$themesarein}themes/$thistheme/images");

    // identify and assign the page type
    $pagetype = 'module';
    $type   = FormUtil::getPassedValue('type', null, 'GETPOST');
    if ((stristr($_SERVER['PHP_SELF'], 'admin.php') || strtolower($type) == 'admin')) {
        $pagetype = 'admin';
    } else if (empty($name) && empty($module)) {
        $pagetype = 'home';
    }
    $pnRender->assign('pagetype', $pagetype);

    // display the output
    if ($pnRender->template_exists($template = 'header_footer_page_'.pnModGetName().'.htm')) {
        $pnRender->display($template);
    } else {
        $pnRender->display('header_footer_page.htm');
    }
    return true;
}
