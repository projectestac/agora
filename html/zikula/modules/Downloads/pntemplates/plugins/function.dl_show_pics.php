<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  Non GUI User Functions
 *
 * @package      Downloads
 * @version      2.3.1
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
// -----------------------------------------------------------------------------------

/**
 * show sc
 *
 * @author       Lindbergh
 * @version      1.0
 *
 */
function smarty_function_dl_show_pics($params, &$smarty) 
{
    $dom = ZLanguage::getModuleDomain('Downloads');
   	extract($params);

    unset($params);

    $open = __('Preview: ', $dom);
    $alt = __('Screenshot', $dom);
    
	return '<a href="'. pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'getimage', array('img' => $sc))).'" rel="lightbox" title="'.$open . $title.'">'.'<img src="'. pnVarPrepForDisplay (pnModURL('Downloads', 'user', 'getimage', array('img' => $tn))).'"  '.$size.' alt="'.$alt.'" /></a>';
    
}

?>