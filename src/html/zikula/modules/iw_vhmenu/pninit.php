<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pninit.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Webbox
 */

/**
 * Initialise the iw_vhmenu module creating module tables and module vars
 * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_vhmenu_init()
{
	$dom=ZLanguage::getModuleDomain('iw_vhmenu');
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if($modinfo['state']!=3){
		return LogUtil::registerError (__('Module iw_main is needed. You have to install the iw_main module previously to install it.', $dom));
	}
	
	// Check if the version needed is correct
	$versionNeeded = '1.2';
	if(!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))){
		return false;
	}

	// Create module table
	if (!DBUtil::createTable('iw_vhmenu')) return false;

	//Create indexes
	$pntable = pnDBGetTables();
	$c = $pntable['iw_vhmenu_column'];
	if (!DBUtil::createIndex($c['id_parent'],'iw_vhmenu', 'id_parent')) return false;	
	
	//Create module vars
	pnModSetVar('iw_vhmenu', 'LowBgColor', '#D6DEE7');// Background color when mouse is not over
	pnModSetVar('iw_vhmenu', 'LowSubBgColor', '#D6DEE7');// Background color when mouse is not over on subs
	pnModSetVar('iw_vhmenu', 'HighBgColor', '#EFEDDE');// Background color when mouse is over
	pnModSetVar('iw_vhmenu', 'HighSubBgColor', '#EFEDDE');// Background color when mouse is over on subs
	pnModSetVar('iw_vhmenu', 'FontLowColor', '#000000');// Font color when mouse is not over
	pnModSetVar('iw_vhmenu', 'FontSubLowColor', '#000000');// Font color subs when mouse is not over
	pnModSetVar('iw_vhmenu', 'FontHighColor', '#000000');// Font color when mouse is over
	pnModSetVar('iw_vhmenu', 'FontSubHighColor', '#000000');// Font color subs when mouse is over
	pnModSetVar('iw_vhmenu', 'BorderColor', '#AA3701');// Border color
	pnModSetVar('iw_vhmenu', 'BorderSubColor', '#000000');// Border color for subs
	pnModSetVar('iw_vhmenu', 'BorderWidth', 1);// Border width
	pnModSetVar('iw_vhmenu', 'BorderBtwnElmnts', 1);// Border between elements 1 or 0
	pnModSetVar('iw_vhmenu', 'FontFamily','Tahoma, Verdana, Arial, Helvetica, sans-serif');// Font family menu items
	pnModSetVar('iw_vhmenu', 'FontSize',9);// Font size menu items
	pnModSetVar('iw_vhmenu', 'FontBold',0);// Bold menu items 1 or 0
	pnModSetVar('iw_vhmenu', 'FontItalic',0);// Italic menu items 1 or 0
	pnModSetVar('iw_vhmenu', 'MenuTextCentered','center');// Item text position 'left', 'center' or 'right'
	pnModSetVar('iw_vhmenu', 'MenuCentered', 'left');// Menu horizontal position 'left', 'center' or 'right'
	pnModSetVar('iw_vhmenu', 'MenuVerticalCentered', 'top');// Menu vertical position 'top', 'middle','bottom' or static
	pnModSetVar('iw_vhmenu', 'ChildOverlap', '0.1');// horizontal overlap child/ parent
	pnModSetVar('iw_vhmenu', 'ChildVerticalOverlap', '0.1');// vertical overlap child/ parent
	pnModSetVar('iw_vhmenu', 'StartTop', 71);// Menu offset x coordinate
	pnModSetVar('iw_vhmenu', 'StartLeft', 20);// Menu offset y coordinate
	pnModSetVar('iw_vhmenu', 'VerCorrect', 0);// Multiple frames y correction
	pnModSetVar('iw_vhmenu', 'HorCorrect', 0);// Multiple frames x correction
	pnModSetVar('iw_vhmenu', 'LeftPaddng', 3);// Left padding
	pnModSetVar('iw_vhmenu', 'TopPaddng', 2);// Top padding
	pnModSetVar('iw_vhmenu', 'FirstLineHorizontal', 1);// SET TO 1 FOR HORIZONTAL MENU, 0 FOR VERTICAL
	pnModSetVar('iw_vhmenu', 'MenuFramesVertical', 1);// Frames in cols or rows 1 or 0
	pnModSetVar('iw_vhmenu', 'DissapearDelay', 1000);// delay before menu folds in
	pnModSetVar('iw_vhmenu', 'TakeOverBgColor', 1);// Menu frame takes over background color subitem frame
	pnModSetVar('iw_vhmenu', 'FirstLineFrame', 'navig');// Frame where first level appears
	pnModSetVar('iw_vhmenu', 'SecLineFrame', 'space');// Frame where sub levels appear
	pnModSetVar('iw_vhmenu', 'DocTargetFrame', 'space');// Frame where target documents appear
	pnModSetVar('iw_vhmenu', 'TargetLoc', '');// span id for relative positioning
	pnModSetVar('iw_vhmenu', 'HideTop', 0);// Hide first level when loading new document 1 or 0
	pnModSetVar('iw_vhmenu', 'MenuWrap', 1);// enables/ disables menu wrap 1 or 0
	pnModSetVar('iw_vhmenu', 'RightToLeft', 0);// enables/ disables right to left unfold 1 or 0
	pnModSetVar('iw_vhmenu', 'UnfoldsOnClick', 0);// Level 1 unfolds onclick/ onmouseover
	pnModSetVar('iw_vhmenu', 'WebMasterCheck', 0);// menu tree checking on or off 1 or 0
	pnModSetVar('iw_vhmenu', 'ShowArrow',1);// Uses arrow gifs when 1
	pnModSetVar('iw_vhmenu', 'KeepHilite', 1);// Keep selected path highligthed
	pnModSetVar('iw_vhmenu', 'height', 24);// Default height
	pnModSetVar('iw_vhmenu', 'width', 120);// Default width
	pnModSetVar('iw_vhmenu', 'imagedir', "iwvhmenu");// Default directori of menu images

	return true;
}

/**
 * Delete the iw_vhmenu module
 * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_vhmenu_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_vhmenu');

	//Delete module vars
	pnModDelVar('iw_vhmenu', 'LowBgColor');
	pnModDelVar('iw_vhmenu', 'LowSubBgColor');
	pnModDelVar('iw_vhmenu', 'HighBgColor');
	pnModDelVar('iw_vhmenu', 'HighSubBgColor');
	pnModDelVar('iw_vhmenu', 'FontLowColor');
	pnModDelVar('iw_vhmenu', 'FontSubLowColor');
	pnModDelVar('iw_vhmenu', 'FontHighColor');
	pnModDelVar('iw_vhmenu', 'FontSubHighColor');
	pnModDelVar('iw_vhmenu', 'BorderColor');
	pnModDelVar('iw_vhmenu', 'BorderSubColor');
	pnModDelVar('iw_vhmenu', 'BorderWidth');
	pnModDelVar('iw_vhmenu', 'BorderBtwnElmnts');
	pnModDelVar('iw_vhmenu', 'FontFamily');
	pnModDelVar('iw_vhmenu', 'FontSize');
	pnModDelVar('iw_vhmenu', 'FontBold');
	pnModDelVar('iw_vhmenu', 'FontItalic');
	pnModDelVar('iw_vhmenu', 'MenuTextCentered');
	pnModDelVar('iw_vhmenu', 'MenuCentered');
	pnModDelVar('iw_vhmenu', 'MenuVerticalCentered');
	pnModDelVar('iw_vhmenu', 'ChildOverlap');
	pnModDelVar('iw_vhmenu', 'ChildVerticalOverlap');
	pnModDelVar('iw_vhmenu', 'StartTop');
	pnModDelVar('iw_vhmenu', 'StartLeft');
	pnModDelVar('iw_vhmenu', 'VerCorrect');
	pnModDelVar('iw_vhmenu', 'HorCorrect');
	pnModDelVar('iw_vhmenu', 'LeftPaddng');
	pnModDelVar('iw_vhmenu', 'TopPaddng');
	pnModDelVar('iw_vhmenu', 'FirstLineHorizontal');
	pnModDelVar('iw_vhmenu', 'MenuFramesVertical');
	pnModDelVar('iw_vhmenu', 'DissapearDelay');
	pnModDelVar('iw_vhmenu', 'TakeOverBgColor');
	pnModDelVar('iw_vhmenu', 'FirstLineFrame');
	pnModDelVar('iw_vhmenu', 'SecLineFrame');
	pnModDelVar('iw_vhmenu', 'DocTargetFrame');
	pnModDelVar('iw_vhmenu', 'TargetLoc');
	pnModDelVar('iw_vhmenu', 'HideTop');
	pnModDelVar('iw_vhmenu', 'MenuWrap');
	pnModDelVar('iw_vhmenu', 'RightToLeft');
	pnModDelVar('iw_vhmenu', 'UnfoldsOnClick');
	pnModDelVar('iw_vhmenu', 'WebMasterCheck');
	pnModDelVar('iw_vhmenu', 'ShowArrow');
	pnModDelVar('iw_vhmenu', 'KeepHilite');
	pnModDelVar('iw_vhmenu', 'height');
	pnModDelVar('iw_vhmenu', 'width');	
	pnModDelVar('iw_vhmenu', 'imagedir');

	//Deletion successfull
	return true;
}

/**
 * Update the iw_vhmenu module
 * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_vhmenu_upgrade($oldversion)
{
	if ($oldversion < 1.1) {
		if (!DBUtil::changeTable('iw_vhmenu')) return false;
		//Create indexes
		$pntable = pnDBGetTables();
		$c = $pntable['iw_vhmenu_column'];
		if (!DBUtil::createIndex($c['id_parent'],'iw_vhmenu', 'id_parent')) return false;
	}
	return true;
}
