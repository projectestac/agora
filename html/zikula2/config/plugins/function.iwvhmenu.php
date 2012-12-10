<?php

/**
 * Counts the number of sub-items where a user can access
 * @author:     Albert P�rez Monfort (aperezm@xtec.cat) & Toni Ginard Llad� (aginard@xtec.cat)
 * @params:	$id_parent:	id of the parent item
 * @return:	the number of items
 */
function NumberSubitems($id_parent) {
    $uid = UserUtil::getVar('uid');
    if (!isset($uid)) {
        $uid = '-1';
    }

    $getAllSubMenuItems = ModUtil::apiFunc('IWvhmenu', 'user', 'getAllSubMenuItems', array('id_parent' => $id_parent));

    $num_items = 0;

    // Count items allowed to access
    foreach ($getAllSubMenuItems as $item) {
        $groups_vector = explode("$", $item['groups']);
        foreach ($groups_vector as $group) {
            if ($group != '') {
                $gids = explode("|", $group);
                if ($uid != '-1') {
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    $isMember = ModUtil::func('IWmain', 'user', 'isMember', array('uid' => $uid,
                                'gid' => $gids[0],
                                'sgid' => $gids[1],
                                'sv' => $sv));
                }
                if ($isMember || ($gids[0] == '-1' && $uid == '-1')) {
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
 * @author:     Albert P�rez Monfort (aperezm@xtec.cat) & Toni Ginard Llad� (aginard@xtec.cat)
 * @params:	$id_parent:	id of the parent item
 *         	$item:		position of the element. Takes the form 1_2_3
 * 		$menu:		string containing the definition of the menu
 * @return:	$menu if all is OK false if an error ocurred
 */
function show_subelems($id_parent, $items, $menu) {
    $uid = UserUtil::getVar('uid');
    if (!isset($uid)) {
        $uid = '-1';
    }

    $num_items = 0;

    $getAllSubMenuItems = ModUtil::apiFunc('IWvhmenu', 'user', 'getAllSubMenuItems', array('id_parent' => $id_parent));

    // Get image folder
    $image_folder = ModUtil::getVar('IWvhmenu', 'imagedir');

    // Filter n-level items active to get only authorized items
    // Array $menu_items contains all the men� items and $num_items the number of first-level items
    foreach ($getAllSubMenuItems as $item) {
        $groups_vector = explode("$", $item['groups']);
        foreach ($groups_vector as $group) {
            if ($group != '') {
                $gids = explode("|", $group);
                if ($uid != '-1') {
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    $isMember = ModUtil::func('IWmain', 'user', 'isMember', array('uid' => $uid,
                                'gid' => $gids[0],
                                'sgid' => $gids[1],
                                'sv' => $sv));
                }
                if ($isMember || ($gids[0] == '-1' && $uid == '-1')) {
                    // Put target in detic_portal if available and selected
                    if ($item['target'] == 2 && pnModAvailable('IWwebbox')) {
                        $item['url'] = str_replace('?', '**', $item['url']);
                        $item['url'] = str_replace('&', '*', $item['url']);
                        $item['url'] = 'index.php?module=IWwebbox&url=' . $item['url'];
                    }
                    if ($item['grafic'] && file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWvhmenu', 'imagedir') . '/' . $item['image1']) && file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWvhmenu', 'imagedir') . '/' . $item['image2']) && $image1 != '' & $image2 = !'') {
                        $text_menu = 'rollover:' . "index.php?module=IWvhmenu&func=getFile&fileName=$image_folder/$item[image1]" . ':' . "index.php?module=IWvhmenu&func=getFile&fileName=$image_folder/$item[image2]";
                    } else {
                        $text_menu = $item['text'];
                    }
                    $num_subitems = NumberSubitems($item['mid']);
                    $image = ($item['bg_image'] != '' && file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWvhmenu', 'imagedir') . '/' . $item['bg_image'])) ? "index.php?module=IWvhmenu&func=getFile&fileName=$image_folder/$item[bg_image]" : '';
                    $menu_items[] = array('mid' => $item['mid'], 'text' => $text_menu, 'url' => $item['url'], 'bg_image' => $image, 'num_subitems' => $num_subitems, 'height' => $item['height'], 'width' => $item['width']);
                    $num_items++;
                    break;
                }
            }
        }
    }

    // Builds all levels sub-items with a recursive call
    for ($i = 1; $i < ($num_items + 1); $i++) {
        $menu .= "\nMenu" . $items . "_" . $i . "=new Array(\"" . $menu_items[$i - 1]['text'] . "\", \"" . $menu_items[$i - 1]['url'] . "\", \"" . $menu_items[$i - 1]['bg_image'] . "\", " . $menu_items[$i - 1]['num_subitems'] . ", " . $menu_items[$i - 1]['height'] . ", " . $menu_items[$i - 1]['width'] . ");";
        if (($menu = show_subelems($menu_items[$i - 1]['mid'], $items . "_" . $i, $menu)) == false) {
            return false;
        }
    }

    return $menu;
}

/**
 * Builds a javascript menu using module IWvhmenu. Call this plug-in from the theme (<!--[iwvhmenu]-->)
 * @author:     Albert P�rez Monfort (aperezm@xtec.cat) & Toni Ginard Llad� (aginard@xtec.cat)
 * @return:	Javascript menu
 */
function smarty_function_iwvhmenu($params, &$smarty) {
    extract($params);
    unset($params);

    // Check is module iwvhmenu is available
    if (!ModUtil::available('IWvhmenu')) {
        return;
    }

    $uid = UserUtil::getVar('uid');

    if (!isset($uid)) {
        $uid = '-1';
    }

    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
    $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'userMenu',
                'module' => 'IWvhmenu',
                'uid' => $uid,
                'sv' => $sv));

    if ($exists) {
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        return ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                    'name' => 'userMenu',
                    'module' => 'IWvhmenu',
                    'sv' => $sv,
                    'nult' => true));
    }

    $num_items = 0;

    $getAllMenuItems = ModUtil::apiFunc('IWvhmenu', 'user', 'getAllMenuItems');

    // Get image folder
    $image_folder = ModUtil::getVar('IWvhmenu', 'imagedir');

    // Filter first-level items active to get only authorized elements
    // Array $menu_items contains all the men� elements and $num_items the number of first-level items
    foreach ($getAllMenuItems as $item) {
        $groups_vector = explode("$", $item['groups']);
        foreach ($groups_vector as $group) {
            if ($group != '') {
                $gids = explode("|", $group);
                if ($uid != '-1') {
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    $isMember = ModUtil::func('IWmain', 'user', 'isMember', array('uid' => $uid,
                                'gid' => $gids[0],
                                'sgid' => $gids[1],
                                'sv' => $sv));
                }
                if ($isMember || ($gids[0] == '-1' && $uid == '-1')) {
                    // Put target in detic_portal if available and selected
                    if ($item['target'] == 2 && pnModAvailable('IWwebbox')) {
                        $item['url'] = str_replace('?', '**', $item['url']);
                        $item['url'] = str_replace('&', '*', $item['url']);
                        $item['url'] = 'index.php?module=IWwebbox&url=' . $item['url'];
                    }
                    $num_subitems = NumberSubitems($item['mid']);
                    if ($item['grafic'] && file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . $image_folder . '/' . $item['image1']) && file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . $image_folder . '/' . $item['image2']) && $item['image1'] != '' && $item['image2'] != '') {
                        $text_menu = 'rollover:' . "index.php?module=IWvhmenu&func=getFile&fileName=$image_folder/$item[image1]" . ':' . "index.php?module=IWvhmenu&func=getFile&fileName=$image_folder/$item[image2]";
                    } else {
                        $text_menu = $item['text'];
                    }
                    $image = ($item['bg_image'] != '' && file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWvhmenu', 'imagedir') . '/' . $item['bg_image'])) ? "index.php?module=IWvhmenu&func=getFile&fileName=$image_folder/$item[bg_image]" : '';
                    $menu_items[] = array('mid' => $item['mid'], 'text' => $text_menu, 'url' => $item['url'], 'bg_image' => $image, 'num_subitems' => $num_subitems, 'height' => $item['height'], 'width' => $item['width']);

                    $num_items++;
                    break;
                }
            }
        }
    }

    $NoOffFirstLineMenus = $num_items;

    // Configuration data get from table module_vars
    $LowBgColor = ModUtil::getVar('IWvhmenu', 'LowBgColor');
    $LowSubBgColor = ModUtil::getVar('IWvhmenu', 'LowSubBgColor');
    $HighBgColor = ModUtil::getVar('IWvhmenu', 'HighBgColor');
    $HighSubBgColor = ModUtil::getVar('IWvhmenu', 'HighSubBgColor');
    $FontLowColor = ModUtil::getVar('IWvhmenu', 'FontLowColor');
    $FontSubLowColor = ModUtil::getVar('IWvhmenu', 'FontSubLowColor');
    $FontHighColor = ModUtil::getVar('IWvhmenu', 'FontHighColor');
    $FontSubHighColor = ModUtil::getVar('IWvhmenu', 'FontSubHighColor');
    $BorderColor = ModUtil::getVar('IWvhmenu', 'BorderColor');
    $BorderSubColor = ModUtil::getVar('IWvhmenu', 'BorderSubColor');
    $BorderWidth = ModUtil::getVar('IWvhmenu', 'BorderWidth');
    $BorderBtwnElmnts = ModUtil::getVar('IWvhmenu', 'BorderBtwnElmnts');
    $FontFamily = ModUtil::getVar('IWvhmenu', 'FontFamily');
    $FontSize = ModUtil::getVar('IWvhmenu', 'FontSize');
    $FontBold = ModUtil::getVar('IWvhmenu', 'FontBold');
    $FontItalic = ModUtil::getVar('IWvhmenu', 'FontItalic');
    $MenuTextCentered = ModUtil::getVar('IWvhmenu', 'MenuTextCentered');
    $MenuCentered = ModUtil::getVar('IWvhmenu', 'MenuCentered');
    $MenuVerticalCentered = ModUtil::getVar('IWvhmenu', 'MenuVerticalCentered');
    $ChildOverlap = ModUtil::getVar('IWvhmenu', 'ChildOverlap');
    $ChildVerticalOverlap = ModUtil::getVar('IWvhmenu', 'ChildVerticalOverlap');
    $StartTop = ModUtil::getVar('IWvhmenu', 'StartTop');
    $StartLeft = ModUtil::getVar('IWvhmenu', 'StartLeft');
    $VerCorrect = ModUtil::getVar('IWvhmenu', 'VerCorrect');
    $HorCorrect = ModUtil::getVar('IWvhmenu', 'HorCorrect');
    $LeftPaddng = ModUtil::getVar('IWvhmenu', 'LeftPaddng');
    $TopPaddng = ModUtil::getVar('IWvhmenu', 'TopPaddng');
    $FirstLineHorizontal = ModUtil::getVar('IWvhmenu', 'FirstLineHorizontal');
    $MenuFramesVertical = ModUtil::getVar('IWvhmenu', 'MenuFramesVertical');
    $DissapearDelay = ModUtil::getVar('IWvhmenu', 'DissapearDelay');
    $TakeOverBgColor = ModUtil::getVar('IWvhmenu', 'TakeOverBgColor');
    $FirstLineFrame = ModUtil::getVar('IWvhmenu', 'FirstLineFrame');
    $SecLineFrame = ModUtil::getVar('IWvhmenu', 'SecLineFrame');
    $DocTargetFrame = ModUtil::getVar('IWvhmenu', 'DocTargetFrame');
    $TargetLoc = ModUtil::getVar('IWvhmenu', 'TargetLoc');
    $HideTop = ModUtil::getVar('IWvhmenu', 'HideTop');
    $MenuWrap = ModUtil::getVar('IWvhmenu', 'MenuWrap');
    $RightToLeft = ModUtil::getVar('IWvhmenu', 'RightToLeft');
    $UnfoldsOnClick = ModUtil::getVar('IWvhmenu', 'UnfoldsOnClick');
    $WebMasterCheck = ModUtil::getVar('IWvhmenu', 'WebMasterCheck');
    $ShowArrow = ModUtil::getVar('IWvhmenu', 'ShowArrow');
    $KeepHilite = ModUtil::getVar('IWvhmenu', 'KeepHilite');

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
		var Arrws=['modules/IWvhmenu/pnimages/tri.gif',5,10,'modules/IWvhmenu/pnimages/tridown.gif',10,5,'modules/IWvhmenu/pnimages/trileft.gif',5,10];	// Arrow source, width and height
		
		function BeforeStart(){return}
		function AfterBuild(){return}
		function BeforeFirstOpen(){return}
		function AfterCloseAll(){return}";

    for ($i = 1; $i < ($num_items + 1); $i++) {
        $menu .= "\nMenu" . $i . "=new Array(\"" . $menu_items[$i - 1]['text'] . "\", \"" . $menu_items[$i - 1]['url'] . "\", \"" . $menu_items[$i - 1]['bg_image'] . "\", " . $menu_items[$i - 1]['num_subitems'] . ", " . $menu_items[$i - 1]['height'] . ", " . $menu_items[$i - 1]['width'] . ");";
        if (($menu = show_subelems($menu_items[$i - 1]['mid'], $i, $menu)) == false) {
            return false;
        }
    }

    // Put call to javascript functions
    $menu .= "\n</script>\n<script type=\"text/javascript\" src=\"modules/IWvhmenu/javascript/menu_com.js\"></script>\n";

    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
    ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
        'name' => 'userMenu',
        'module' => 'IWvhmenu',
        'sv' => $sv,
        'value' => $menu,
        'lifetime' => '600'));
    return $menu;
}
