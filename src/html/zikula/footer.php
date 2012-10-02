<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: footer.php 26303 2009-08-22 10:07:02Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

if (preg_match('/footer\.php/i', $_SERVER['PHP_SELF'])) {
    die ('You can\'t access this file directly...');
}

function footmsg()
{
    return;
}

function foot()
{
    if (function_exists('themefooter')) {
        themefooter();
    }

    $themeinfo = ThemeUtil::getInfo(ThemeUtil::getIDFromName(pnUserGetTheme()));

    if ($themeinfo['type'] == 3) {
        $GLOBALS['theme_engine']->themefooter();
    } elseif (!isset($GLOBALS['xanthia_theme']) && pnModLoad('Header_Footer')) {
        pnModFunc('Header_Footer', 'user', 'render');
    }
}

foot();
