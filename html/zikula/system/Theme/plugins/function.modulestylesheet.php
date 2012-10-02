<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.modulestylesheet.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to provide easy access to a stylesheet
 *
 * This function provides an easy way to include a stylesheet. The function will add the stylesheet
 * file to the 'stylesheet' pagevar by default
 *
 * This plugin is obsolete since Zikula 1.1.0. The stylesheets are loaded automatically whenever a module
 * or block is loaded. We keep this file for the sake of backwards compatibility so that themes do not break.
 *
 * @author       Mark West
 * @author       J�rg Napp
 * @since        12. Feb. 2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      The tag
 */
function smarty_function_modulestylesheet($params, &$smarty)
{
    // do nothing unless we are admin
    if (SecurityUtil::checkPermission('::', '::', ACCESS_ADMIN)) {
        PageUtil::addVar('javascript', 'javascript/ajax/prototype.js');
        PageUtil::addVar('rawtext', '<script type="text/javascript">/* <![CDATA[ */ Event.observe(window, "load", function() { alert("'.__('You can safely remove the modulestylesheet plugin from your theme. It is obsolete since Zikula 1.1.0. The adding of stylesheet files has been automated and does not need user interference. This note is shown to Administrators only.').'");}); /* ]]> */</script>');
    }
    return;
}
