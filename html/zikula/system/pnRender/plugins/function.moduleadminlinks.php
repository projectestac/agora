<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.moduleadminlinks.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display admin links for a module
 *
 * Example
 * <!--[moduleadminlinks modname=Example start="[" end="]" seperator="|" class="z-menuitem-title"]-->
 *
 * @author       Mark West
 * @since        15/02/06
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $modname     module name to display links for
 * @param        string      $start       start string (optional)
 * @param        string      $end         end string (optional)
 * @param        string      $seperator   link seperator (optional)
 * @param        string      $class       CSS class (optional)
 * @return       string      a formatted string containing navigation for the module admin panel
 */
function smarty_function_moduleadminlinks($params, &$smarty)
{
    // set some defaults
    $start     = isset($params['start'])    ? $params['start']    : '[';
    $end       = isset($params['end'])      ? $params['end']      : ']';
    $seperator = isset($params['seperator'])? $params['seperator']: '|';
    $class     = isset($params['class'])    ? $params['class']    : 'z-menuitem-title';
    
    $modname = $params['modname'];
    unset ($params['modname']);
    
    if (!isset($modname) || !pnModAvailable($modname)) {
        $modname = pnModGetName();
    }

    // check our module name
    if (!pnModAvailable($modname)) {
        $smarty->trigger_error('moduleadminlinks: '.__f("Error! The '%s' module is not available.", DataUtil::formatForDisplay($modname)));
        return false;
    }

    // get the links from the module API
    $links = pnModAPIFunc($modname, 'admin', 'getlinks', $params);

    // establish some useful count vars
    $linkcount = count($links);

    $adminlinks = "<span class=\"$class\">$start ";
    foreach ($links as $key => $link) {
        $id = '';
        if (isset($link['id'])) {
            $id = 'id="' . $link['id'] . '"';
        }
        if (!isset($link['title'])) {
            $link['title'] = $link['text'];
        }
        if (isset($link['disabled']) && $link['disabled'] == true) {
            $adminlinks .= "<span $id>" . '<a class="z-disabledadminlink" title="' . DataUtil::formatForDisplay($link['title']) . '">' . DataUtil::formatForDisplay($link['text']) . '</a> ';
        } else {
            $adminlinks .= "<span $id><a href=\"" . DataUtil::formatForDisplay($link['url']) . '" title="' . DataUtil::formatForDisplay($link['title']) . '">' . DataUtil::formatForDisplay($link['text']) . '</a> ';
        }
        if ($key == $linkcount-1) {
            $adminlinks .= '</span>';
            continue;
        }
        // linebreak
        if (isset($link['linebreak']) && $link['linebreak'] == true) {
            $adminlinks .= "</span>\n ";
            $adminlinks .= "$end</span><br /><span class=\"$class\">$start ";
        } else {
            $adminlinks .= "$seperator</span>\n ";
        }
    }
    $adminlinks .= "$end</span>\n";

    return $adminlinks;
}
