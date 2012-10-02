<?php
/**
 * Zikula Application Framework
 *
 * @link http://www.zikula.org
 * @version $Id: Loader.class.php 22543 2007-07-31 12:50:09Z rgasch $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Simon Birtwistle simon@itbegins.co.uk
 * @package Zikula_Docs
 * @subpackage Tour
 */

/**
 * Smarty function to display a sublinks for a tour menu item
 *
 */
 function smarty_function_sublinks($params, &$smarty) {
    if (!isset($params['page'])) {
        $params['page'] = '';
    }
    if (!isset($start)) {
        $start = '[';
    }
    if (!isset($end)) {
        $end = ']';
    }
    if (!isset($seperator)) {
        $seperator = '|';
    }
    if (!isset($class)) {
        $class = 'pn-menuitem-title';
    }
 
    $links = pnModAPIFunc('Tour', 'user', 'getsublinks', array('page' => $params['page']));
    $linkcount = count($links);
    $linktext = '';

    if ($linkcount != 0) {
        $linktext = "<span class=\"$class\">$start ";
        foreach ($links as $key => $link) {
            $id = '';
            if (isset($link['id'])) {
                $id = 'id="' . $link['id'] . '"';
            }
            if (!isset($link['title'])) {
                $link['title'] = $link['text'];
            }
            if (isset($link['disabled']) && $link['disabled'] == true) {
                $linktext .= "<span $id>" . '<a class="pn-disabledadminlink" title="' . DataUtil::formatForDisplay($link['title']) . '">' . DataUtil::formatForDisplay($link['text']) . '</a> ';
            } else {
                $linktext .= "<span $id><a href=\"" . DataUtil::formatForDisplay($link['url']) . '" title="' . DataUtil::formatForDisplay($link['title']) . '">' . DataUtil::formatForDisplay($link['text']) . '</a> ';
            }
            if ($key == $linkcount-1) {
                $linktext .= '</span>';
                continue;
            }
            // linebreak
            if (isset($link['linebreak']) && $link['linebreak'] == true) {
                $linktext .= "</span>\n ";
                $linktext .= "$end</span><br /><span class=\"$class\">$start ";
            } else {
                $linktext .= "$seperator</span>\n ";
            }
        }
        $linktext .= "$end</span>\n";
    }
    
    return $linktext;
}