// **************************************************
// iw_main module
// This module contains some functions and complements (javascripts, images,
// configuration parameters...) that are used in the Intraweb modules. The most for modules that
// are associated with the Intraweb project needs this module to run. This module have a navigation
// system through the site files.
//
// It works in Zikula 1.x versions.
//
// @autor: Albert Pérez Monfort (aperezm@xtec.cat)
// @autor: Robert Barrera
// @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
//
// This module is part of Intraweb project (http://phobos.xtec.cat/intraweb)
//
// **************************************************

//************************
// Module features
//************************
- The main mission of this module is to connect all the Intraweb modules. The Intraweb modules needs have dependence on this module 
- Through this module it is possible configure parameters that are commons in all the Intraweb modules.
- The module have a navigator system thought the site's files that allow the management of the files without using FTP.
- The module include two blocks. The block iwnews and the block iwflagged. The block iwnews made possible to inform user about the new entries in private messages, forums, forms... that have not seen yet. The block iwflagged link all the entries in private messages, forums, forms... that the user have marked with a flag that denotes information that needs special attention. The module can manage a cron system that is able to send emails to users with its content (it needs the module Mailer activated and correctly configured).
- The site files can be situated out of the publish directory in the server. It make the access to these files more secure.
- It is possible to define public folder where the files can be downloaded, even if them are out of the publish directory. With the file file.php you can access to these files easily.

//************************
// Module installation
//************************
Locate the files of the modules iw_main in the modules directory, install and active it following the usual methods used in Zikula modules.

Remember that the follow permission is necessary:

group  iw_main           ::     read

to make possible users access to this module.

Locate the files file.php, iwcron.php and iwcron1.php in the root site directory.
