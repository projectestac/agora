<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.quicktags.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 * @deprecated
 */

/**
 * Smarty function to display the jsquicktags pseudo visual editor
 *
 * The quick tags template tag MUST appear after the textarea in the template
 *
 * Available parameters:
 *   - id:        CSS ID of the control to act on
 *   - assign:    If set, the results are assigned to the corresponding variable instead of printed out
 *
 * Example
 *	<div class="z-formrow">
 *	    <label for="pages_content"><!--[pnml name="_CONTENT"]--></label>
 *      <textarea id="pages_content" name="section[content]" rows="10" cols="50"></textarea>
 *      <!--[quicktags id=pages_content]-->
 *  </div> *
 * @author       Mark West
 * @since        24/04/2006
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the page breaker markup
 * @deprecated
 */
function smarty_function_quicktags($params, &$smarty)
{
    return;
}
