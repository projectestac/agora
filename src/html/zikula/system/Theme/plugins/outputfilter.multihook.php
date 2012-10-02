<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Filters
 */

/**
 * Smarty outputfilter to add the invisible MultiHook divs just before the 
 * closing </body> tag. Security check is done in the MultiHook function called here
 *
 * @author    Frank Schummertz
 * @param     string
 * @param     Smarty
 */
function smarty_outputfilter_multihook($text, &$smarty)
{
    $mhhelper = pnModAPIFunc('MultiHook', 'theme', 'helper');
    $mhhelper = $mhhelper . '</body>';
    $text = str_replace('</body>', $mhhelper, $text);

    // return the modified source   
    return $text;
}
