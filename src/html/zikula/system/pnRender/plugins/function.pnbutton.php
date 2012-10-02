<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnbutton.php 27578 2009-11-14 13:50:08Z jusuff $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display an image form submission button
 *
 * BEWARE: Internt Explorer 6.x does NOT work especially well with <button> tags!
 *
 * available parameters:
 *  - assign      if set, the button will be assigned to this variable
 *  - type        if set, the type of button that will be generated (default: submit)
 *  - mode        if set, the type of HTML element to be used (default: <button>). Values = [button|input]
 *  - name        if set, the name of button that will be generated (default: value of 'type' parameter)
 *  - value       if set, the value of button that will be generated
 *  - id          if set, the ID of button
 *  - class       if set, the class of button
 *  - src         image source name
 *  - set         image set name
 *  - alt         if set, the constant that will be used for the alt attribute
 *  - title       if set, the constant that will be used for the title attribute
 *  - constants   if false then both alt and title will be assumed to be the final strings not constants
 *
 * @author   Mark West
 * @since    17th Nov. 2005
 * @param    array    $params     All attributes passed to this function from the template
 * @param    object   $smarty     Reference to the Smarty object
 * @return   string   the version string
 */
function smarty_function_pnbutton($params, &$smarty)
{
    // we're going to make use of pnimg for path searching
    require_once $smarty->_get_plugin_filepath('function', 'pnimg');

    if (!isset($params['src'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('smarty_function_pnbutton', 'src')));
        return false;
    }
    if (!isset($params['set'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('smarty_function_pnbutton', 'set')));
        return false;
    }
    $type = isset($params['type'])    ? $params['type'] : 'submit';
    $mode = isset($params['mode'])    ? $params['mode'] : 'button';
    if (isset($params['name'])) {
        $name = ' name="'.DataUtil::formatForDisplay($params['name']).'"';
    } else {
        $name = ' name="'.DataUtil::formatForDisplay($type).'"';
    }
    if (isset($params['value'])) {
        $value = ' value="'.DataUtil::formatForDisplay($params['value']).'"';
    } else {
        $value = '';
    }
    if (isset($params['id'])) {
        $id = ' id="'.DataUtil::formatForDisplay($params['id']).'"';
    } else {
        $id = '';
    }
    if (isset($params['class'])) {
        $class = ' class="'.DataUtil::formatForDisplay($params['class']).'"';
    } else {
        $class = '';
    }

    $title = (isset($params['title']) ? (defined($params['title']) ? constant($params['title']) : $params['title']) : '');
    $alt = (isset($params['alt']) ? (defined($params['alt']) ? constant($params['alt']) : $params['alt']) : '');

    // call the pnimg plugin and work out the src from the assigned template vars
    smarty_function_pnimg(array('assign' => 'buttonsrc', 'src' => $params['src'], 'set' => $params['set'], 'modname' => 'core'), $smarty);
    $imgvars = $smarty->get_template_vars('buttonsrc');
    $imgsrc = $imgvars['src'];

    // form the button html
    if ($mode == 'button') {
        $return = '<button'.$id.$class.' type="'.DataUtil::formatForDisplay($type).'"'.$name.$value.' title="'.DataUtil::formatForDisplay($title).'"><img src="'.DataUtil::formatForDisplay($imgsrc).'" alt="'.DataUtil::formatForDisplay($alt).'" /></button>';
    } else {
        $return = '<input'.$id.$class.' type="image"'.$name.$value.' title="'.DataUtil::formatForDisplay($title).'" src="'.DataUtil::formatForDisplay($imgsrc).'" alt="'.DataUtil::formatForDisplay($alt).'" />';
    }

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $return);
    } else {
        return $return;
    }
}
