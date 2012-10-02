<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.title.php 27863 2009-12-12 20:13:20Z jusuff $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to generate the title for the page
 *
 * available parameters:
 *  - assign     if set, the title will be assigned to this variable
 *  - separator  if set, the title elements will be seperated using this string
 *               (optional: default '::')
 *  - noslogan   if set, the slogan will not be appended
 *  - nositename if set, the sitename will not be appended
 *
 * Example
 * <!--[title]-->
 *
 * <!--[title separator='/']-->
 *
 * @author       Mark West
 * @since        29/03/04
 * @see          function.title.php::smarty_function_title()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the title
 */
function smarty_function_title($params, &$smarty)
{
    if (!isset($params['separator'])) {
        $separator = ' :: ';
    } else {
        $separator = " $params[separator] ";
    }

    $slogan = '';
    if (!isset($params['noslogan'])) {
        $slogan = PageUtil::getVar('description');
        if(preg_match("/^_[A-Z0-9_-]+$/", $slogan) && strpos($slogan,'::') === false && defined($slogan)) {
            $slogan = constant($slogan);
        }
        $slogan = (strpos($slogan,'::') === false && defined($slogan)) ? constant($slogan): $slogan;
    }

    $sitename = '';
    if (!isset($params['nositename'])) {
        $sitename = pnConfigGetVar('sitename');
        if(preg_match("/^_[A-Z0-9_-]+$/", $sitename) && strpos($sitename,'::') === false && defined($sitename)) {
            $sitename = constant($sitename);
        }
    }

    // init vars
    $title = '';
    $titleargs = array();

    // default for standard page output
    $pagetitle = PageUtil::getVar('title');
    if ($pagetitle) {
        if (is_array($pagetitle)) {
            $titleargs = $pagetitle;
        } else {
            $titleargs[] = $pagetitle;
        }
    } elseif (isset($GLOBALS['info']) && is_array($GLOBALS['info'])) {
        // article page output
        $titleargs[] = $GLOBALS['info']['title'];
    }

    // append sitename and/or slogan
    if (!empty($sitename)) {
        $titleargs[] = $sitename;
    }
    if (!empty($slogan)) {
        $titleargs[] = $slogan;
    }

    // strip tags from the title
    $title = strip_tags(implode($separator, $titleargs));

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $title);
    } else {
        return $title;
    }
}
