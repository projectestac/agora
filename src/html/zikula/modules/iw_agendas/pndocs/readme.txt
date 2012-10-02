// **************************************************
// Installation of the iw_agendas module
//
// This module allow to use personal and shared agendas. The fields in the shared agendas are configurable.
// The agendas can include attached files. It is possible to define the role that different users or groups have 
// when their members access an agenda. 
// 
// This module works in 0.8 PN version.
//
// @autor: Albert Pérez Monfort
// @autor: Toni Ginard Lladó
// @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
//
// This module is part of Intraweb project (http://phobos.xtec.cat/intraweb)
// To run this module you need to have the iw_main module installed at least in the version 0.3.
//
// **************************************************

//************************
// Files structure
//************************
This module needs the iw_main module installed at least in the version 0.3, so you must to install or upgrade it if you don't have it. The iw_main module contains the general libraries and functions used in Intraweb modules.

The attached files must to be updated to the server, so a folder with written permissions is required. This folder can be out of the public html pages and it is possible to define exactly where it is situated from the module options.

//************************
// Module installation
//************************
Locate the files of the modules iw_main and iw_agendas into the modules directory, install and active them following the usual methods used in PostNuke modules:

	- Regenerate modules list
	- Initialize modules or upgrade iw_main
	- Active modules

//************************
// Module configuration
//************************
After the module installation it is necessary to define the colours for the calendar periods and the holidays.
