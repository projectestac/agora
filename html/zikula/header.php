<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: header.php 26303 2009-08-22 10:07:02Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

if (preg_match('/header\.php/i', $_SERVER['PHP_SELF'])) {
    die ('You can\'t access this file directly...');
}

function head()
{
    $themeinfo = ThemeUtil::getInfo(ThemeUtil::getIDFromName(pnUserGetTheme()));

    if ($themeinfo['type'] != 3 || $themeinfo['type'] != 2) {
        ob_start();
    }

    // call theme header
    if (function_exists('themeheader')) {
        themeheader();
    }
}

head();
