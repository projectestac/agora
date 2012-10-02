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


function smarty_function_iw_themepath($params, &$smarty) {
	
    extract($params);
    unset($params);

    $filepath = pnGetBaseURL()."filetheme.php?fileName=$file&amp;type=$type&amp;theme=$theme";
 
	return $filepath;

}
