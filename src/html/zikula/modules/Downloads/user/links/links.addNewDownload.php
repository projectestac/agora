<?php
// -----------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file: user menu
 *
 * @package      Downloads
 * @version      2.2
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 //

$dom = ZLanguage::getModuleDomain('Downloads');
if (eregi(basename(__FILE__), $_SERVER['PHP_SELF'])) 
{
	die ("You can't access this file directly...");
}
pnModAPILoad('Downloads', 'user', true);
user_menu_add_option("user.php?op=addNewDownload", "".__('Add download', $dom)."", "modules/Downloads/pnimages/admin.gif");
?>