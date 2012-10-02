<?php
if (strpos($_SERVER['PHP_SELF'], 'online.php')) {
  die ("You can't access directly to this block");
}

/**
 * initialise block
 *
 * @author		Albert P�rez Monfort (intraweb)
 */
function iw_webbox_webboxblock_init()
{
    // Security
    pnSecAddSchema('iw_webbox:webboxBlock:', 'Block title::');
}

/**
 * get information on block
 *
 * @author       Albert P�rez Monfort (intraweb@xtec.cat)
 * @return       array       The block information
 */
function iw_webbox_webboxblock_info()
{
    // Values
    return array('text_type' => 'Webbox',
			    'func_edit' => 'webbox_edit',
			    'func_update' => 'webbox_update',
				'module' => 'iw_webbox',
				'text_type_long' => 'Contenidor de pàgines web',
				'allow_multiple' => true,
				'form_content' => false,
				'form_refresh' => false,
				'show_preview' => true);
}

/**
 * update block settings
 *
 * @author       Albert P�rez Monfort (intraweb@xtec.cat)
 * @param        array       $blockinfo     a blockinfo structure
 * @return       $blockinfo  the modified blockinfo structure
 */
function webbox_update($row)
{
    $vars['weburlvalue'] = FormUtil::getPassedValue('weburlvalue', -1, 'POST');
    $vars['widthvalue'] = FormUtil::getPassedValue('widthvalue', -1, 'POST');
    $vars['heightvalue'] = FormUtil::getPassedValue('heightvalue', -1, 'POST');
    $vars['titlevalue'] = FormUtil::getPassedValue('titlevalue', -1, 'POST');
    $vars['notunregvalue'] = FormUtil::getPassedValue('notunregvalue', -1, 'POST');
    $vars['scrollvalue'] = FormUtil::getPassedValue('scrollvalue', -1, 'POST');

    $row['content'] = pnBlockVarsToContent($vars);
    return $row;
}

/*
function feeds_displayfeedblock_update($blockinfo)
{
    $vars['feedid'] = FormUtil::getPassedValue('feedid', 1, 'POST');
    $vars['numitems'] = FormUtil::getPassedValue('numitems', 0, 'POST');
    $vars['displayimage'] = FormUtil::getPassedValue('displayimage', -1, 'POST');

    $blockinfo['content'] = pnBlockVarsToContent($vars);

    return $blockinfo;
}
*/

/**
 * modify block settings
 *
 * @author       Albert P�rez Monfort (intraweb@xtec.cat)
 * @param        array       $blockinfo     a blockinfo structure
 * @return       output		the block form
 */
function webbox_edit($row)
{
    // Get current content
    $vars = pnBlockVarsFromContent($row['content']);

    if (!empty($vars['weburlvalue'])) {
        $iw_webbox['weburlvalue'] = $vars['weburlvalue'];
		$iw_webbox['widthvalue'] = $vars['widthvalue'];
		$iw_webbox['heightvalue'] = $vars['heightvalue'];
		$iw_webbox['titlevalue'] = $vars['titlevalue'];
		$iw_webbox['scrollvalue'] = $vars['scrollvalue'];
		$iw_webbox['notunregvalue'] = $vars['notunregvalue'];
    } else {
        $iw_webbox['weburlvalue'] = 'http://';
		$iw_webbox['widthvalue'] = '100';
		$iw_webbox['heightvalue'] = '600';
		$iw_webbox['titlevalue'] = '';
		$iw_webbox['scrollvalue'] = '1';
		$iw_webbox['notunregvalue'] = '';
    }

	$pnRender = pnRender::getInstance('iw_webbox');

	$pnRender->assign($iw_webbox);
	
    // get the block output from the template
    $blockinfo['content'] = $pnRender->fetch('iw_webbox_block_edit.htm');

    // return the rendered block
    return pnBlockThemeBlock($blockinfo);
}

/**
 * display block
 *
 * @author       Albert P�rez Monfort (intraweb@xtec.cat)
 * @param        array       $blockinfo     a blockinfo structure
 * @return       output      the rendered bock
 */
function iw_webbox_webboxblock_display($row)
{
	
    // Get current content
    $vars = pnBlockVarsFromContent($row['content']);
	
    // Security check
    if (!SecurityUtil::checkPermission('iw_webbox:webboxBlock:', $row['title']."::", ACCESS_READ)) {
        return false;
    }
	
	if($vars['titlevalue']==1 && $vars['widthvalue']>98){$vars['widthvalue']=98;}
	if($vars['scrollvalue']==1){$vars['scrolls']='auto';}else{$vars['scrolls']='no';}

	if(($vars['notunregvalue']==1 && !pnUserLoggedIn()) || $vars['notunregvalue']=='-1'){
		if($vars['widthvalue']!=0){
			$output='<p><iframe src="'.$vars['weburlvalue'].'" width='.$vars['widthvalue'].'% height='.$vars['heightvalue'].' scrolling='.$scrolls.' frameborder=0></iframe></p>';
			
			
			if ($vars['titlevalue']=='1'){
				$row['title']='';
			}
			
			// Create output object
			$pnRender = pnRender::getInstance('iw_webbox', false);
			
			// assign the block vars
			$pnRender->assign($vars);
			
			if(($vars['notunregvalue']==1 && !pnUserLoggedIn()) || $vars['notunregvalue']=='-1'){
			   // Populate block info and pass to theme
				$row['content'] = $pnRender->fetch('iw_webbox_block_display.htm');
				return pnBlockThemeBlock($row);
			}
		}
	}
	return false;
}
