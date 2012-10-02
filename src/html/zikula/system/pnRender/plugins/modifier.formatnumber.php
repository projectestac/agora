<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.formatnumber.php 27289 2009-10-31 09:47:14Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Example
 *
 *   <!--[$MyVar|formatnumber]-->
 *
 * @author       Drak
 * @param        array    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_formatNumber($string, $decimal_points=null)
{
    return DataUtil::formatNumber($string, $decimal_points);
}
