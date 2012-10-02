<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.pnvarcensor.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Smarty modifier to remove censored words
 *
 * This modifier examines the contents of the passed variable for words which
 * are deemed offensive or otherwise not allowed to be displayed. These words
 * are replaced with asterix marks to show that words have been removed.
 *
 * This modifier tries to be intelligent in its attempt to remove censored
 * words whilst not censoring words on the censor list that happen to be
 * embedded in a larger word.
 *
 * This modifier uses the information provided in the configuration setting
 * 'CensorList' as the basis of the words that it censors. It also looks for
 * commonly derivations of the words used to try to avoid censoring. The system
 * is also case-insensitive.
 *
 * Care should be taken to consider the effect of censorship, and if it should
 * be applied to all information that is passed in by the user or if it should
 * only be used in specific cases.
 *
 * This modifier is to be removed in future versions, as pnVarCensor is being moved
 * to be a transform hook.
 *
 * Example
 *
 *   <!--[$MyVar|pnvarcensor]-->
 *
 *
 * @author       Joerg Napp
 * @since        16. Sept. 2003
 * @param        array    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_pnvarcensor($string)
{
    return pnVarCensor($string);
}