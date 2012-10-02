<?php
/**
 * Counts the number of sub-items where a user can access
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) & Toni Ginard Lladó (aginard@xtec.cat)
 * @params:	$id_parent:	id of the parent item
 * @return:	the number of items
*/
function NumberSubitems($id_parent)
{
	$uid = pnUserGetVar('uid');
	if(!isset($uid)){
		$uid = '-1';
	}

	$getAllSubMenuItems = pnModApiFunc('iw_vhmenu','user','getAllSubMenuItems',array('id_parent' => $id_parent));

	$num_items = 0;

	// Count items allowed to access
	foreach($getAllSubMenuItems as $item) {
		$groups_vector = explode("$", $item['groups']);
		foreach ($groups_vector as $group) {
			if ($group != '') {
				$gids = explode("|", $group);
				if($uid != '-1'){
					$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
					$isMember = pnModFunc('iw_main', 'user', 'isMember', array('uid' => $uid,
													'gid' => $gids[0],
													'sgid' => $gids[1],
													'sv' => $sv));
				}
				if ($isMember || ($gids[0] == '-1' && $uid == '-1') ) {
					$num_items++;
					break;
				}
			}
		}
	}

	return $num_items;
}

/**
 * Builds the sub-items of a menu item. It can only be called from the smarty function below.
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) & Toni Ginard Lladó (aginard@xtec.cat)
 * @params:	$id_parent:	id of the parent item
 *         	$item:		position of the element. Takes the form 1_2_3
 *		$menu:		string containing the definition of the menu
 * @return:	$menu if all is OK false if an error ocurred
*/
function show_subelems($id_parent, $items, $menu)
{
	$uid = pnUserGetVar('uid');
	if(!isset($uid)){
		$uid = '-1';
	}

	$getAllSubMenuItems = pnModApiFunc('iw_vhmenu','user','getAllSubMenuItems',array('id_parent' => $id_parent));

	// Get image folder
	$image_folder = pnModGetVar('iw_vhmenu', 'imagedir');

	// Filter n-level items active to get only authorized items
	// Array $menu_items contains all the menú items and $num_items the number of first-level items
	foreach($getAllSubMenuItems as $item) {
		$groups_vector = explode("$", $item['groups']);
		foreach ($groups_vector as $group) {
			if ($group != '') {
				$gids = explode("|", $group);
				if($uid != '-1'){
					$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
					$isMember = pnModFunc('iw_main', 'user', 'isMember', array('uid' => $uid,
													'gid' => $gids[0],
													'sgid' => $gids[1],
													'sv' => $sv));
				}
				if ($isMember || ($gids[0] == '-1' && $uid == '-1') ) {
					// Put target in detic_portal if available and selected
					if($item['target'] == 2 && pnModAvailable('iw_webbox')){
						$item['url'] = str_replace('?','**',$item['url']);
						$item['url'] = str_replace('&','*',$item['url']);
						$item['url'] = 'index.php?module=iw_webbox&url='.$item['url'];
					}
					if($item['grafic'] && file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_vhmenu','imagedir').'/'.$item['image1']) && file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_vhmenu','imagedir').'/'.$item['image2']) && $image1 != '' & $image2 =! ''){
						$text_menu = 'rollover:'."index.php?module=iw_vhmenu&func=getFile&fileName=$image_folder/$item[image1]".':'."index.php?module=iw_vhmenu&func=getFile&fileName=$image_folder/$item[image2]";
					}else{
						$text_menu = $item['text'];
					}					
					$num_subitems = NumberSubitems($item['mid']);
					$image = ($item['bg_image'] != '' && file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_vhmenu','imagedir').'/'.$item['bg_image'])) ? "index.php?module=iw_vhmenu&func=getFile&fileName=$image_folder/$item[bg_image]": '';
					$menu_items[] = array('mid' => $item['mid'], 'text' => $text_menu, 'url' => $item['url'], 'bg_image' => $image, 'num_subitems' => $num_subitems, 'height' => $item['height'], 'width' => $item['width']);
					$num_items++;
					break;
				}
			}
		}
	}

	// Builds all levels sub-items with a recursive call
	for ($i = 1; $i < ($num_items+1); $i++) {
		$menu .= "\nMenu".$items."_".$i."=new Array(\"".$menu_items[$i - 1]['text']."\", \"".$menu_items[$i - 1]['url']."\", \"".$menu_items[$i-1]['bg_image']."\", ".$menu_items[$i - 1]['num_subitems'].", ".$menu_items[$i - 1]['height'].", ".$menu_items[$i - 1]['width'].");";
		if (($menu = show_subelems ($menu_items[$i - 1]['mid'], $items."_".$i, $menu)) == false) {
			return false;
		}
	}

	return $menu;
}

/**
 * Builds a javascript menu using module iw_vhmenu. Call this plug-in from the theme (<!--[iwvhmenu]-->)
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) & Toni Ginard Lladó (aginard@xtec.cat)
 * @return:	Javascript menu
*/
function smarty_function_iwvhmenu($params, &$smarty)
{
	extract($params);
	unset($params);

	// Check is module iwvhmenu is available
	if (!pnModAvailable('iw_vhmenu')){
		return;
	}

	$uid = pnUserGetVar('uid');

	if(!isset($uid)){
		$uid = '-1';
	}

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists', array('name' => 'userMenu',
										'module' => 'iw_vhmenu',
										'uid' => $uid,
										'sv' => $sv));

	if($exists){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		return pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $uid,
									'name' => 'userMenu',
									'module' => 'iw_vhmenu',
									'sv' => $sv,
									'nult' => true));
	}

	$getAllMenuItems = pnModApiFunc('iw_vhmenu','user','getAllMenuItems');

	// Get image folder
	$image_folder = pnModGetVar('iw_vhmenu', 'imagedir');

	// Filter first-level items active to get only authorized elements
	// Array $menu_items contains all the menú elements and $num_items the number of first-level items
	foreach ($getAllMenuItems as $item) {
		$groups_vector = explode("$", $item['groups']);
		foreach ($groups_vector as $group) {
			if ($group != '') {
				$gids = explode("|", $group);
				if($uid != '-1'){
					$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
					$isMember = pnModFunc('iw_main', 'user', 'isMember', array('uid' => $uid,
													'gid' => $gids[0],
													'sgid' => $gids[1],
													'sv' => $sv));
				}
				if ($isMember || ($gids[0] == '-1' && $uid == '-1') ) {
					// Put target in detic_portal if available and selected
					if($item['target'] == 2 && pnModAvailable('iw_webbox')){
						$item['url'] = str_replace('?','**',$item['url']);
						$item['url'] = str_replace('&','*',$item['url']);
						$item['url'] = 'index.php?module=iw_webbox&url='.$item['url'];
					}
					$num_subitems = NumberSubitems($item['mid']);
					if($item['grafic'] && file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.$image_folder.'/'.$item['image1']) && file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.$image_folder.'/'.$item['image2']) && $item['image1'] != '' && $item['image2'] != ''){
						$text_menu = 'rollover:'."index.php?module=iw_vhmenu&func=getFile&fileName=$image_folder/$item[image1]".':'."index.php?module=iw_vhmenu&func=getFile&fileName=$image_folder/$item[image2]";
					}else{
						$text_menu = $item['text'];
					}
					$image = ($item['bg_image'] != '' && file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_vhmenu','imagedir').'/'.$item['bg_image'])) ? "index.php?module=iw_vhmenu&func=getFile&fileName=$image_folder/$item[bg_image]": '';
					$menu_items[] = array('mid' => $item['mid'], 'text' => $text_menu, 'url' => $item['url'], 'bg_image' => $image, 'num_subitems' => $num_subitems, 'height' => $item['height'], 'width' => $item['width']);

					$num_items++;
					break;
				}
			}
		}
	}
	
	$NoOffFirstLineMenus = $num_items;

	// Configuration data get from table module_vars
	$LowBgColor = pnModGetVar('iw_vhmenu', 'LowBgColor');
	$LowSubBgColor = pnModGetVar('iw_vhmenu', 'LowSubBgColor');
	$HighBgColor = pnModGetVar('iw_vhmenu', 'HighBgColor');
	$HighSubBgColor = pnModGetVar('iw_vhmenu', 'HighSubBgColor');
	$FontLowColor = pnModGetVar('iw_vhmenu', 'FontLowColor');
	$FontSubLowColor = pnModGetVar('iw_vhmenu', 'FontSubLowColor');
	$FontHighColor = pnModGetVar('iw_vhmenu', 'FontHighColor');
	$FontSubHighColor = pnModGetVar('iw_vhmenu', 'FontSubHighColor');
	$BorderColor = pnModGetVar('iw_vhmenu', 'BorderColor');
	$BorderSubColor = pnModGetVar('iw_vhmenu', 'BorderSubColor');
	$BorderWidth = pnModGetVar('iw_vhmenu', 'BorderWidth');
	$BorderBtwnElmnts = pnModGetVar('iw_vhmenu', 'BorderBtwnElmnts');
	$FontFamily = pnModGetVar('iw_vhmenu', 'FontFamily');
	$FontSize = pnModGetVar('iw_vhmenu', 'FontSize');
	$FontBold = pnModGetVar('iw_vhmenu', 'FontBold');
	$FontItalic = pnModGetVar('iw_vhmenu', 'FontItalic');
	$MenuTextCentered = pnModGetVar('iw_vhmenu', 'MenuTextCentered');
	$MenuCentered = pnModGetVar('iw_vhmenu', 'MenuCentered');
	$MenuVerticalCentered = pnModGetVar('iw_vhmenu', 'MenuVerticalCentered');
	$ChildOverlap = pnModGetVar('iw_vhmenu', 'ChildOverlap');
	$ChildVerticalOverlap = pnModGetVar('iw_vhmenu', 'ChildVerticalOverlap');
	$StartTop = pnModGetVar('iw_vhmenu', 'StartTop');
	$StartLeft = pnModGetVar('iw_vhmenu', 'StartLeft');
	$VerCorrect = pnModGetVar('iw_vhmenu', 'VerCorrect');
	$HorCorrect = pnModGetVar('iw_vhmenu', 'HorCorrect');
	$LeftPaddng = pnModGetVar('iw_vhmenu', 'LeftPaddng');
	$TopPaddng = pnModGetVar('iw_vhmenu', 'TopPaddng');
	$FirstLineHorizontal = pnModGetVar('iw_vhmenu', 'FirstLineHorizontal');
	$MenuFramesVertical = pnModGetVar('iw_vhmenu', 'MenuFramesVertical');
	$DissapearDelay = pnModGetVar('iw_vhmenu', 'DissapearDelay');
	$TakeOverBgColor = pnModGetVar('iw_vhmenu', 'TakeOverBgColor');
	$FirstLineFrame = pnModGetVar('iw_vhmenu', 'FirstLineFrame');
	$SecLineFrame = pnModGetVar('iw_vhmenu', 'SecLineFrame');
	$DocTargetFrame = pnModGetVar('iw_vhmenu', 'DocTargetFrame');
	$TargetLoc = pnModGetVar('iw_vhmenu', 'TargetLoc');
	$HideTop = pnModGetVar('iw_vhmenu', 'HideTop');
	$MenuWrap = pnModGetVar('iw_vhmenu', 'MenuWrap');
	$RightToLeft = pnModGetVar('iw_vhmenu', 'RightToLeft');
	$UnfoldsOnClick = pnModGetVar('iw_vhmenu', 'UnfoldsOnClick');
	$WebMasterCheck = pnModGetVar('iw_vhmenu', 'WebMasterCheck');
	$ShowArrow = pnModGetVar('iw_vhmenu', 'ShowArrow');
	$KeepHilite = pnModGetVar('iw_vhmenu', 'KeepHilite');

	// Data vars for javascript
	$menu = "<script type=\"text/javascript\">
		// HV Menu by Ger Versluis (http://www.burmees.nl/)
		// Submitted to Dynamic Drive (http://www.dynamicdrive.com)
		// Visit http://www.dynamicdrive.com for this script and more
		function Go(){ return; }
		var NoOffFirstLineMenus=$NoOffFirstLineMenus;		// Number of first level items
		var LowBgColor='$LowBgColor';						// Background color when mouse is not over
		var LowSubBgColor='$LowSubBgColor';					// Background color when mouse is not over on subs
		var HighBgColor='$HighBgColor';						// Background color when mouse is over
		var HighSubBgColor='$HighSubBgColor';				// Background color when mouse is over on subs
		var FontLowColor='$FontLowColor';					// Font color when mouse is not over
		var FontSubLowColor='$FontSubLowColor';				// Font color subs when mouse is not over
		var FontHighColor='$FontHighColor';					// Font color when mouse is over
		var FontSubHighColor='$FontSubHighColor';			// Font color subs when mouse is over
		var BorderColor='$BorderColor';						// Border color
		var BorderSubColor='$BorderSubColor';				// Border color for subs
		var BorderWidth=$BorderWidth;						// Border width
		var BorderBtwnElmnts=$BorderBtwnElmnts;				// Border between elements 1 or 0
		var FontFamily='$FontFamily';						// Font family menu items
		var FontSize=$FontSize;								// Font size menu items
		var FontBold=$FontBold;								// Bold menu items 1 or 0
		var FontItalic=$FontItalic;							// Italic menu items 1 or 0
		var MenuTextCentered='$MenuTextCentered';			// Item text position 'left', 'center' or 'right'
		var MenuCentered='$MenuCentered';					// Menu horizontal position 'left', 'center' or 'right'
		var MenuVerticalCentered='$MenuVerticalCentered';	// Menu vertical position 'top', 'middle','bottom' or static
		var ChildOverlap=$ChildOverlap;						// horizontal overlap child/ parent
		var ChildVerticalOverlap=$ChildVerticalOverlap;		// vertical overlap child/ parent
		var StartTop=$StartTop;								// Menu offset x coordinate
		var StartLeft=$StartLeft;							// Menu offset y coordinate
		var VerCorrect=$VerCorrect;							// Multiple frames y correction
		var HorCorrect=$HorCorrect;							// Multiple frames x correction
		var LeftPaddng=$LeftPaddng;							// Left padding
		var TopPaddng=$TopPaddng;							// Top padding
		var FirstLineHorizontal=$FirstLineHorizontal;		// SET TO 1 FOR HORIZONTAL MENU, 0 FOR VERTICAL
		var MenuFramesVertical=$MenuFramesVertical;			// Frames in cols or rows 1 or 0
		var DissapearDelay=$DissapearDelay;					// delay before menu folds in
		var TakeOverBgColor=$TakeOverBgColor;				// Menu frame takes over background color subitem frame
		var FirstLineFrame='$FirstLineFrame';				// Frame where first level appears
		var SecLineFrame='$SecLineFrame';					// Frame where sub levels appear
		var DocTargetFrame='$DocTargetFrame';				// Frame where target documents appear
		var TargetLoc='$TargetLoc';							// span id for relative positioning
		var HideTop=$HideTop;								// Hide first level when loading new document 1 or 0
		var MenuWrap=$MenuWrap;								// enables/ disables menu wrap 1 or 0
		var RightToLeft=$RightToLeft;						// enables/ disables right to left unfold 1 or 0
		var UnfoldsOnClick=$UnfoldsOnClick;					// Level 1 unfolds onclick/ onmouseover
		var WebMasterCheck=$WebMasterCheck;					// menu tree checking on or off 1 or 0
		var ShowArrow=$ShowArrow;							// Uses arrow gifs when 1
		var KeepHilite=$KeepHilite;							// Keep selected path highligthed
		var Arrws=['modules/iw_vhmenu/pnimages/tri.gif',5,10,'modules/iw_vhmenu/pnimages/tridown.gif',10,5,'modules/iw_vhmenu/pnimages/trileft.gif',5,10];	// Arrow source, width and height
		
		function BeforeStart(){return}
		function AfterBuild(){return}
		function BeforeFirstOpen(){return}
		function AfterCloseAll(){return}";

	for ($i = 1; $i < ($num_items+1); $i++) {
		$menu .= "\nMenu".$i."=new Array(\"".$menu_items[$i-1]['text']."\", \"".$menu_items[$i-1]['url']."\", \"".$menu_items[$i-1]['bg_image']."\", ".$menu_items[$i-1]['num_subitems'].", ".$menu_items[$i-1]['height'].", ".$menu_items[$i-1]['width'].");";
		if (($menu = show_subelems ($menu_items[$i-1]['mid'], $i, $menu)) == false) {
			return false;
		}
	}

	// Put call to javascript functions
	$menu .= "\n</script>\n<script type=\"text/javascript\" src=\"modules/iw_vhmenu/javascript/menu_com.js\"></script>\n";

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => $uid,
								'name' => 'userMenu',
								'module' => 'iw_vhmenu',
								'sv' => $sv,
								'value' => $menu,
								'lifetime' => '600'));
	return $menu;
}
