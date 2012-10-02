// **************************************************
// Installation of the iw_noteboard module
//
// This module makes possible to send to specific groups of users short informations that can include
// attached files or links to websites. It is possible to define the role that different groups have 
// when their members use the note board. 
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

The attached files must to be updated to the server, so a folder with written permissions is required. This folder can be out of the public html pages and it is possible to define exactly where it is situated from the module options.

//************************
// Module installation
//************************
Locate the files of the modules iw_main and iw_noteboard into the modules directory, install and active them following the usual methods used in PostNuke modules:

	- Regenerate modules list
	- Initialize modules or upgrade iw_main
	- Active modules

//************************
// Module configuration
//************************
After the module installation it is necessary to define the groups' roles using the module configuration panel. There are a lot of configurable possibilities.
