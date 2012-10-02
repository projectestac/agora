// **************************************************
// Installation of the IWmoodle module
// This module integrates the Moodle into PostNuke.
//  With it is possible:
//	- To show Moodle courses in Postnuke with some management basic possibilities as
//	   activation and deactivation of courses.
//          - To enrol PN users into Moodle automatically. If the PN users aren't in Moodle tables a pre-
//             inscription is made. In this case, when the users access to Moodle the first time the 
//             enrolment is automatically created.
//          - To single sing on to Moodle from PN.
// 
// It works in 0.8 PN version and it has been proved in 1.8.3 Moodle version.
//
// @autor: Albert Pérez Monfort (aperezm@xtec.cat)
// @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
//
// This module is part of Intraweb project (http://phobos.xtec.cat/intraweb)
// To run this module you should have the iw_main module installed.
//
// **************************************************

//************************
// Files structure
//************************
This module needs the iw_main module installed, so you must to install it if you don't have it. The iw_main module contains the general libraries and functions used in Intraweb modules.

You have to copy the file index_iw.php into the Moodle main directory. This file makes possible the single sing on.


//************************
// Module installation
//************************
Locate the files of the modules iw_main and IWmoodle in the modules directory, install and active them following the usual methods used in PostNuke modules.
Remember that the following permissions are necessary:

group	iw_main::	::	read
group	coursesblock::	::	read

to make possible users access to the module.


//************************
// PostNuke configuration
//************************
IWmoodle requests the Moodle tables, so it is necessary to configure the access to the Moodle database. You have to modify the file config/config.php and add the code written below:

// ----------------------------------------------------------------------
// The following define the access to Moodle database
// ----------------------------------------------------------------------
$PNConfig['DBInfo']['moodle']['dbtype'] = 'mysql';	// sample value
$PNConfig['DBInfo']['moodle']['dbhost'] = 'localhost';	// sample value
$PNConfig['DBInfo']['moodle']['dbuname'] = 'cm9vdA==';
$PNConfig['DBInfo']['moodle']['dbpass'] = '';
$PNConfig['DBInfo']['moodle']['dbname'] = 'moodle';	// sample value
$PNConfig['DBInfo']['moodle']['encoded'] = 1;
$PNConfig['DBInfo']['moodle']['pconnect']  = 0;

In the example there is the configuration that I'm using in my laptop for a local server.

After this you have to access to the module options through the administration page and fill all the fields in the form (image1). All the fields are important, so you have to fill all of them.


//************************
// Courses block activation
//************************
The method that users will use to access to Moodle is through the courses block, so you have to activate and locate it in your PostNuke website.

This block contains the links to the Moodle courses where the users can access and some information about them. The permission:

Group	coursesblock::		::	read

is needed.

If this permission is used for unregistered users it is assumed that they will access to Moodle as guests.


//************************
// Moodle configuration
//************************
Moodle needs to connect with PostNuke users table to get information about Moodle potential users. To do this possible proceed as it is explained below:

- Access to Moodle as Administrator.
- Activate the external database method in the authentications options. (image 2)
- Access to external database settings.
- Fill the form fields with the PostNuke database access information. You have an example in the image 3.
