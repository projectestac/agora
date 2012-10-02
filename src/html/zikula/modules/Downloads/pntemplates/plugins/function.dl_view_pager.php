<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  Non GUI User Functions
 *
 * @package      Downloads
 * @version      2.0
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
// -----------------------------------------------------------------------------------

/**
 * downloadpager plugin
 * creates a pager
 *
 * @author       Landseer
 * @author       Lindbergh
 * @version      1.0
 *@param $params['total'] int total number files
 *@param $params['cid'] int cat id
 *@param $params['start'] int start value
 *
 */
function smarty_function_dl_view_pager($params, &$smarty) 
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    extract($params); 
	unset($params);

    if(empty($total)  || empty($start) || empty($cid) || empty($cclause) || empty($sortby)) 
	{
		$smarty->trigger_error(pnVarPrepForDisplay(__('Error! Could not do what you wanted. Please check your input.', $dom)), e_error);
	} 

	if(!pnModAPILoad('Downloads', 'admin')) 
	{
		$smarty->trigger_error("loading adminapi failed", e_error);
	} 
        
    $itemsperpage = pnModGetVar('downloads', 'perpage');	
    
 	$count = 1;
    $next = $start + $itemsperpage;
    $previous = $start - $itemsperpage;
    $pager = '';
    if($total > $itemsperpage) 
	{
        // more topcs than we want to see
        $pager = "<div>";
        for($x = 0; $x < $total; $x++) {
            if(($previous >= 0) and ($count == 1)) 
			{
                $pager .=  "<a href=\"". pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'view', array( 'cid'=>$cid, 'start' => $previous,'sortby'=> $sortby,'cclause'=> $cclause)))."\"><img border=\"0\" src=\"modules/Downloads/pnimages/user/back.png\"  alt=\"PAGER\" /></a>";
            }
            if(!($x % $itemsperpage)) 
			{
                if($x > 0) 
				{
                    //$pager .= " | ";
                }
                if($x == $start) 
				{
                    $pager .=  "| $count\n";
    
                } else {
                    if ( (($count%10)==0) // link if page is multiple of 10 
                    || ($count==1) // link first page 
                    || (($x > ($start-6*$itemsperpage)) //link -5 and +5 pages 
                    &&($x < ($start+6*$itemsperpage))) ) 
					{
                        $pager .=  " | <a href=\"".pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'view', array('cid'=>$cid,'start'=>$x,'sortby'=> $sortby,'cclause'=> $cclause)))."\">$count</a>\n";
                    }
                }
                $count++;
            }
        }
        if($next < $total) {
            $pager .=  " | <a href=\"".pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'view', array('cid'=>$cid,'start'=>$next,'sortby'=> $sortby,'cclause'=> $cclause)))."\"><img border=\"0\" src=\"modules/Downloads/pnimages/user/forward.png\"  alt=\"PAGER\" /></a>";
        }
    
        $pager .= "</div>";
    }
    return $pager;
}

?>