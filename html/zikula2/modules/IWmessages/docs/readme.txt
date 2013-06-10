// **************************************************
// Installation of the IWmessages module
//
// With this module users can send private messages to other users or groups of users. The messages
// can include attached files. The module has different options that make possible to define what groups are
// allowed to send messages with attached files and what groups can send messages to all the
// members of different groups or to everybody.
// 
// This module works in 1.1.1 Zikula version.
//
// @autor: Richard Tirtadji  (rtirtadji@hotmail.com) & Albert Pérez Monfort (aperezm@xtec.cat)
// @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
//
// This module is part of the Intraweb project (http://phobos.xtec.cat/intraweb)
// To run this module you need to have the IWmain module installed at least in the version 1.2.
//
// **************************************************

//************************
// Files structure
//************************
This module needs the IWmain module installed at least in the version 1.2, so you must install or upgrade it if you don't have it. The IWmain module contains the general libraries and functions used in Intraweb modules.

The attached files must be updated to the server, so a folder with written permissions is required. This folder can be out of the public html pages and it is possible to define exactly where it is situated from the module options.

//************************
// Module installation
//************************
Locate the files of the modules IWmain and IWmessages into the modules directory, install and active them following the usual methods used in PostNuke modules:

	- Regenerate modules list
	- Initialize modules or upgrade IWmain
	- Active modules

//************************
// Module configuration
//************************
After the module installation it is necessary to define what groups are allowed to send messages to full groups and who can attach files in the messages.
