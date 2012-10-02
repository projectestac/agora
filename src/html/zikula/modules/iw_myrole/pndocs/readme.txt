// **************************************************
// Installation of the iw_noteboard module
//
// This module allow to administrators to change their groups in any moment recovering the initial
// groups wend necessary. With this module administrators can test new groups permissions easily. 
// 
// This module works in 1.x Zikula versions.
//
// @autor: Albert Pérez Monfort (aperezm@xtec.cat)
// @autor: Josep Ferràndiz Farré (jferran6@xtec.cat)
// @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
//
// This module is part of Intraweb project (http://phobos.xtec.cat/intraweb)
// To run this module you need to have the iw_main module installed at least in the version 1.0.
//
// **************************************************

//************************
// Files structure
//************************
This module needs the iw_main module installed at least in the version 1.0, so you must to install or upgrade it if you don't have it. The iw_main module contains the general libraries and functions used in Intraweb modules.

//************************
// Module installation
//************************
Locate the files of the modules iw_main and iw_myrole into the modules directory, install and active them following the usual methods used in Zikula modules:

	- Regenerate modules list
	- Initialize modules or upgrade iw_main
	- Active modules

//************************
// You need to know
//************************
This module needs a support group which members will be the users who will have the capacity of changes their groups. By default this group name is changingRoles.
