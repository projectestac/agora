// **************************************************
// Installation of the iw_vhmenu module
//
// This module allows administrators to create a vertical or horizontal dynamic menu that can change
// for different users, so the menu items can be adapted for particular groups of users. Some module 
// features are:
//		- Administrators can create as many menu items as are necessary in a tree structure 
//		- It is possible to choose the groups that can see the items in the menu
//		- The menu can be disposed vertically or horizontally
//		- The menu have a lot of configurable options, so you can adapt to your needs
//		- The menu can show icons in the items
//		- Menu items can composed by rollover images
//		- It is easy to change menu structure moving the items in different levels of the menu
//		  tree or changing their position into a level
//		- It is possible to choose where the links are opened: in top or into the webbox (it is
//		  necessary to have the iw_webbox module installed)
// 
// This module works in 0.8 PN version.
//
// @autor: Albert Pérez Monfort (aperezm@xtec.cat)
// @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
//
// This module is part of Intraweb project (http://phobos.xtec.cat/intraweb)
// To run this module you need to have the iw_main module installed at least in the version 0.2.
//
// **************************************************

//************************
// Files structure
//************************
This module needs the iw_main module installed at least in the version 0.2, so you must to install or upgrade it if you don't have it. The iw_main module contains the general libraries and functions used in Intraweb modules.

You have to copy the file function.iwvhmenu.php into the directory system/Theme/plugins.

//************************
// Module installation
//************************
Locate the files of the modules iw_main and iw_vhmenu in the modules directory, install and active them following the usual methods used in PostNuke modules:

	- Regenerate modules list
	- Initialize modules or upgrade iw_main
	- Active modules

//************************
// Module configuration
//************************
This module needs the plugin iwvhmenu which have to be called from all the theme's templates. It is necessary to add the tag <!--[iwvhmenu]--> in some place of each template file (only main templates).

After this you can begin to create menu items. For each menu item you can choose what groups can see it and where the link is open: in the top or into the webbox (in case you have the module iw_webbox installed).
