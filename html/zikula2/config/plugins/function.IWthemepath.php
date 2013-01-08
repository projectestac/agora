<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Themes
 */
function smarty_function_IWthemepath($params, &$smarty) {

    extract($params);
    unset($params);

    $myTheme = (isset($theme)) ? $theme : '';

    $filepath = System::getBaseUrl() . "filetheme.php?fileName=$file&amp;type=$type&amp;theme=$myTheme";

    return $filepath;
}