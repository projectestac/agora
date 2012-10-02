<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnmanuallink.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to create  manual link.
 *
 * This function creates a manual link from some parameters.
 *
 * Available parameters:
 *   - manual:    name of manual file, manual.html if not set
 *   - chapter:   an anchor in the manual file to jump to
 *   - newwindow: opens the manual in a new window using javascript
 *   - width:     width of the window if newwindow is set, default 600
 *   - height:    height of the window if newwindow is set, default 400
 *   - title:     name of the new window if newwindow is set, default is modulename
 *   - class:     class for use in the <a> tag
 *   - assign:    if set, the results ( array('url', 'link') are assigned to the corresponding variable instead of printed out
 *
 * Example
 * <!--[pnmanuallink newwindow=1 width=400 height=300 title=rtfm ]-->
 *
 *
 * @author       Frank Schummertz
 * @since        04/26/2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the link or assign an array( 'url', 'link' ) if assign is set
 */

function smarty_function_pnmanuallink($params, &$smarty)
{
    $userlang= ZLanguage::transformFS(ZLanguage::getLanguageCode());
    $stdlang = pnConfigGetVar( 'language' );

    $title   = (isset($params['title']))   ? $params['title']               : 'Manual';
    $manual  = (isset($params['manual']))  ? $params['manual']              : 'manual.html';
    $chapter = (isset($params['chapter'])) ? '#'.$params['chapter']         : '';
    $class   = (isset($params['class']))   ? 'class="'.$params['class'].'"' : '';
    $width   = (isset($params['width']))   ? $params['width']               : 600;
    $height  = (isset($params['height']))  ? $params['height']              : 400;
    $modname = pnModGetName();

    $possibleplaces = array( "modules/$modname/pndocs/lang/$userlang/manual/$manual",
                             "modules/$modname/pndocs/lang/$stdlang/manual/$manual",
                             "modules/$modname/pndocs/lang/en/manual/$manual",
                             "modules/$modname/pndocs/lang/$userlang/$manual",
                             "modules/$modname/pndocs/lang/$stdlang/$manual",
                             "modules/$modname/pndocs/lang/en/$manual" );
    foreach( $possibleplaces as $possibleplace ) {
        if (file_exists($possibleplace)) {
            $url = $possibleplace.$chapter;
            break;
        }
    }
    if (isset($params['newwindow'])) {
        $link = "<a $class href='#' onclick=\"window.open( '" . DataUtil::formatForDisplay($url) . "' , '" . DataUtil::formatForDisplay($modname) . "', 'status=yes,scrollbars=yes,resizable=yes,width=$width,height=$height'); picwin.focus();\">" . DataUtil::formatForDisplayHTML($title) . "</a>";
    } else {
        $link = "<a $class href=\"" . DataUtil::formatForDisplay($url) . "\">" . DataUtil::formatForDisplayHTML($title) . "</a>";
    }

    if (isset($params['assign'])) {
        $ret = array( 'url' => $url, 'link' => $link );
        $smarty->assign( $params['assign'], $ret );
        return;
    } else {
        return $link;
    }

}
