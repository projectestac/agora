<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @license See license.txt
 */

/**
 * Smarty modifier to return the status of comment based on the 
 * numeric status value
 * 
 * Example
 * 
 *   {$MyVar|commentstatus}
 * 
 * 
 * @author  Mark West
 * @since        14 July 2006
 * @param array    $string     the contents to transform
 * @return string   the modified output
 */
function smarty_modifier_commentstatus($string)
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    switch ($string) {
        case '0':
            return strtolower(__('Approved', $dom));
        case '1':
            return strtolower(__('Pending', $dom));
        case '2':
            return strtolower(__('Rejected', $dom));
        case '-1':
        default:
            return;
    }
}
