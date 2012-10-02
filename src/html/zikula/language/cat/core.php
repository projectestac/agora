<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: core.php 26873 2009-10-10 06:08:30Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

// date and time defines
define('_DATE','Date');
define('_DATEBRIEF','%b %d, %Y');
define('_DATELONG','%A, %B %d, %Y');
define('_DATESTRING','%A, %B %d @ %H:%M:%S');
define('_DATESTRING2', '%A, %B %d');
define('_DATETIMEBRIEF','%b %d, %Y - %I:%M %p');
define('_DATETIMELONG','%A, %B %d, %Y - %I:%M %p');
define('_DATEINPUT', '%Y-%m-%d'); // Dateformat for input fields (parsable - do not try other formats!)
define('_DATETIMEINPUT', '%Y-%m-%d %H:%M'); // Date+time format for input fields (parsable - do not try other formats!)
define('_DATEFIRSTWEEKDAY', 0); // 0 = Sunday, 1 Monday and so on
define('_DAY_OF_WEEK_LONG','Sunday Monday Tuesday Wednesday Thursday Friday Saturday');
define('_DAY_OF_WEEK_SHORT','Sun Mon Tue Wed Thu Fri Sat');
define('_MONTH_LONG','January February March April May June July August September October November December');
define('_MONTH_SHORT','Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec');
define('_TIME', 'Time');
define('_TIMEBRIEF','%I:%M %p');
define('_TIMELONG','%T %p');
define('_TIMEFORMAT', 12);  // use 12/24 depending on country
define('_SECOND', 'second');
define('_SECONDS', 'seconds');
define('_MINUTE', 'minute');
define('_MINUTES', 'minutes');
define('_DAY', 'day');
define('_DAYS', 'days');
define('_WEEK', 'week');
define('_WEEKS', 'weeks');
define('_MONTH', 'month');
define('_MONTHS', 'months');
define('_YEAR', 'year');
define('_YEARS', 'years');
define('_NOTAVALIDCATEGORY', 'Invalid category');
define('_NOTAVALIDDATE', 'Invalid date');
define('_NOTAVALIDINT', 'Invalid integer');
define('_NOTAVALIDNUMBER', 'Invalid number');
define('_NOTAVALIDEMAIL', 'Invalid e-mail');
define('_NOTAVALIDURL', 'Invalid URL');

// time zone defines
define('_TIMEZONES','GMT-12 GMT-11 HST GMT-9:30 AKST PST MST CST EST AST GMT-3:30 GMT-3 GMT-2 GMT-1 GMT CET EET GMT+3 GMT+3:30 GMT+4 GMT+4:30 GMT+5 GMT+5:30 GMT+5:45 GMT+6 GMT+6:30 GMT+7 AWST ACDT JST ACST AEST GMT+11 GMT+11:30 GMT+12 GMT+12:45 GMT+13 GMT+14');
define('_TZOFFSETS','-12 -11 -10 -9.5 -9 -8 -7 -6 -5 -4 -3.5 -3 -2 -1 0 1 2 3 3.5 4 4.5 5 5.5 5.75 6 6.5 7 8 9 9.5 10 10.5 11 11.5 12 12.75 13 14');

// locale defines
define('_CHARSET','ISO-8859-1');
define('_LOCALE','en_US');
define('_LOCALEWIN', 'eng');
define('_ERROR_LOCALENOTSET', 'Could not set locale: %locale%');
define('_PERMLINK_LOCALESEARCH', 'ÀÁÂÃÅàáâãåÒÓÔÕØòóôõøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛùúûÿÑñ');
define('_PERMLINK_LOCALEREPLACE', 'AAAAAaaaaaOOOOOoooooEEEEeeeeCcIIIIiiiiUUUuuuyNn');
define('_ALPHABET', 'A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z');

// common footer defines
define('_CMSHOMELINK', '<a href="http://www.zikula.org">Zikula</a>');
define('_XHTMLVALIDATORLINK', '<a href="http://validator.w3.org/check?uri=referer">XHTML</a>');
define('_CSSVALIDATORLINK', '<a href="http://jigsaw.w3.org/css-validator/">CSS</a>');
define('_ISPOWEREDBY', 'is powered by');

// common words
define('_ZIKULA', 'Zikula');
define('_ALL','All');
define('_AND','and');
define('_BY','by');
define('_DOWN','Down');
define('_FOR', 'for');
define('_NO','No');
define('_NO_SHORT','N');
define('_OF','of');
define('_OK','OK');
define('_ON','on');
define('_OR', 'or');
define('_TO','To');
define('_UP','Up');
define('_URL', 'URL');
define('_YES','Yes');
define('_YES_SHORT','Y');

// on/off states
define('_ONOFF_ON','On');
define('_ONOFF_OFF', 'Off');
define('_OFF_UC','OFF');
define('_ON_UC','ON');

// standard permissions levels
define('_ACCESS_ADD','Add');
define('_ACCESS_ADMIN','Admin');
define('_ACCESS_COMMENT','Comment');
define('_ACCESS_DELETE','Delete');
define('_ACCESS_EDIT','Edit');
define('_ACCESS_MODERATE','Moderate');
define('_ACCESS_NONE','None');
define('_ACCESS_OVERVIEW','Overview');
define('_ACCESS_READ','Read');

// extended (pnobjlib) permission levels
define('_PN_TEXT_PERMISSION_BASIC_PRIVATE', 'Private');
define('_PN_TEXT_PERMISSION_BASIC_GROUP', 'Group');
define('_PN_TEXT_PERMISSION_BASIC_PUBLIC', 'Public');
define('_PN_TEXT_PERMISSION_BASIC_USER', 'User');
define('_PN_TEXT_PERMISSION_LEVEL_NONE', 'None');
define('_PN_TEXT_PERMISSION_LEVEL_READ', 'Read');
define('_PN_TEXT_PERMISSION_LEVEL_WRITE', 'Write');
define('_PN_TEXT_NOAUTH_NONE', 'You don\'t have Access rights for this module.');
define('_PN_TEXT_NOAUTH_OVERVIEW', 'You don\'t have Overview rights for this module.');
define('_PN_TEXT_NOAUTH_READ',  'You don\'t have Read rights for this module.');
define('_PN_TEXT_NOAUTH_COMMENT', 'You don\'t have Comment rights for this module');
define('_PN_TEXT_NOAUTH_MODERATION', 'You don\'t have Moderation rights for this module');
define('_PN_TEXT_NOAUTH_EDIT', 'You don\'t have Edit rights for this module');
define('_PN_TEXT_NOAUTH_ADD', 'You don\'t have Add rights for this module');
define('_PN_TEXT_NOAUTH_DELETE', 'You don\'t have Delete rights for this module');
define('_PN_TEXT_NOAUTH_ADMIN', 'You don\'t have Admin rights for this module');

// common actions & results
define('_ACTIONS', 'Actions');
define('_ACTION', 'Action');
define('_ACTIVATE','Activate');
define('_ACTIVE','Active');
define('_ACTIVATED', 'Activated');
define('_ADD','Add');
define('_BACK', 'Back');
define('_CANCEL', 'Cancel');
define('_CLEAR', 'Clear');
define('_CLOSE', 'Close');
define('_CONFIRM', 'Confirm');
define('_CONTINUE', 'Continue');
define('_COMMIT', 'Update');
define('_COPY', 'Copy');
define('_CREATE', 'Create');
define('_DEACTIVATE','Deactivate');
define('_DEACTIVATED', 'Deactivated');
define('_DEFAULT', 'Default');
define('_DEFAULTS', 'Defaults');
define('_DELETE','Delete');
define('_DETAILS', 'Details');
define('_EDIT','Edit');
define('_FILTER', 'Filter');
define('_FORWARD', 'Forward');
define('_HELP', 'Help');
define('_HELPPAGE', 'Help Page');
define('_MESSAGESYOUMIGHTSEE', 'Messages You Might See');
define('_CONFIRMATIONPROMPT', 'Confirmation Prompt');
define('_IGNORE','Ignore');
define('_INACTIVE','Inactive');
define('_LOGIN','Log in');
define('_LOGIN_FLC','Log In');
define('_LOGOUT','Log out');
define('_MODIFY','Modify');
define('_MOVE', 'Move');
define('_NEW','New');
define('_NEXT', 'Next');
define('_OPEN', 'Open');
define('_PREVIOUS', 'Previous');
define('_REMOVE', 'Remove');
define('_RESET', 'Reset');
define('_SAVE', 'Save');
define('_SEARCH', 'Search');
define('_STATE','State');
define('_SUBMIT','Submit');
define('_UPDATE', 'Update');
define('_VIEW', 'View');

//common module names
define('_COMMENTS', 'Comments');
define('_DOWNLOADS', 'Downloads');
define('_SUBMITNEWS', 'Submit Article');
define('_USERSMANAGER', 'Users Manager');
define('_WEB_LINKS', 'Web Links');

//common module fields
define('_PROPERTIES', 'Properties');
define('_CONTENT', 'Content');
define('_DESCRIPTION', 'Description');
define('_EMAIL' ,'E-mail address');
define('_ID', 'Internal ID');
define('_LANGUAGE', 'Language');
define('_META', 'Meta data');
define('_META_FLC', 'Meta Data');
define('_NAME', 'Name');
define('_OPTIONAL', 'Optional');
define('_OPTIONS', 'Options');
define('_PASSWORD', 'Password');
define('_REQUIRED', 'Required');
define('_TITLE', 'Title');
define('_USERID', 'User ID');
define('_USERNAME' ,'User Name');
define('_USERNAME_FLC', 'User name');
define('_VALUE', 'Value');
define('_LINKSPERPAGE', 'Links per page');

// permalinks system
define('_PERMALINK', 'Permalink');
define('_PERMALINKS', 'PermaLinks');
define('_PERMALINKTITLE', 'PermaLink URL title');
define('_PERMALINKTITLEBLANK', '(Blank = auto-generate)');
define('_PURGEPERMALINKS', 'Purge PermaLinks');
define('_PURGEPERMALINKSSUCCESFUL', 'Purging of the pemalinks was successful');
define('_PURGEPERMALINKSFAILED', 'Purging of the pemalinks has failed');
define('_ADDCATEGORYTITLETOPERMALINK', 'Add category title to PermaLink');

// member descriptors
define('_GUEST','anonymous user');
define('_GUEST0','anonymous users');
define('_GUESTS','anonymous users');
define('_MEMBER','registered user');
define('_MEMBER0','registered users');
define('_MEMBERS','registered users');

// member states
define('_ONLINE','online');
define('_OFFLINE','offline');

// common zikula terms
define('_BLOCK' ,'Block');
define('_BLOCKS' ,'Blocks');
define('_CUSTOMARGS', 'Custom Arguments');
define('_FUNCTIONTYPE', 'Function type');
define('_FUNCTIONTYPES', 'Function type(s)');
define('_FUNCTION', 'Function');
define('_FUNCTIONS', 'Functions');
define('_HOOK', 'Hook');
define('_HOOKS', 'Hooks');
define('_LEGACY', 'Legacy');
define('_MODULE', 'Module');
define('_MODULES', 'Modules');
define('_PARAMETERS', 'Parameters');
define('_PLUGIN', 'Plugin');
define('_PLUGINS', 'Plugins');
define('_PROFILE', 'Personal Info');
define('_TEMPLATE', 'Template');
define('_TEMPLATES', 'Templates');
define('_THEME', 'Theme');
define('_THEMES', 'Themes');

// other common terms
define('_DIRECTORY', 'Directory');
define('_POWEREDBY', 'Powered by');
define('_VERSION', 'Version');
define('_COPYRIGHT', 'Copyright');
define('_VALIDXHTML', 'Valid XHTML');
define('_VALIDCSS', 'Valid CSS');
define('_MOREINFOHERE_LC', 'more info here');
define('_MOREINFOHERE_UC', 'More info here');
define('_PERMITTEDHTMLTAGSREMINDER', 'Permitted HTML tags:');
define('_PERMITTEDHTMLTAGSSHORTREMINDER', 'HTML permitted');
define('_PUNC_PERIOD', '.');
define('_PUNC_COLON', ':');
define('_PUNC_SEMICOLON', ';');
define('_PUNC_QUESTIONMARK', '?');
define('_PUNC_OPENPARENTHESIS','(');
define('_PUNC_CLOSEPARENTHESIS', ')');
define('_PUNC_OPENDOUBLEQUOTE', '"');
define('_PUNC_CLOSEDOUBLEQUOTE', '"');
define('_PUNC_OPENSINGLEQUOTE', '\'');
define('_PUNC_CLOSESINGLEQUOTE', '\'');


// module system
define('_BADAUTHKEY', 'Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.');
define('_CANCELDELETE', 'Cancel item deletion.');
define('_CANCELEDIT', 'Cancel item edits.');
define('_CONFIGUPDATED', 'Done! Module configuration updated.');
define('_CONFIGUPDATEFAILED', 'Error! Could not update module configuration.');
define('_CONFIRMDELETE', 'Confirm deletion?');
define('_CONFIRMDELETEITEM', 'Really delete %i%?');
define('_CREATEDBY', 'Created by %username%');
define('_CREATEDBYON', 'Created by %username% on %date%');
define('_CREATEDON', 'Created on %date%');
define('_CREATEITEM', 'Create %i%');
define('_CREATEFAILED','Error! Creation attempt failed.');
define('_CREATEINDEXFAILED', 'Error! Index creation failed.');
define('_CREATEITEMSUCCEDED','Done! %i% created.');
define('_CREATESUCCEDED','Done! Item created.');
define('_CREATETABLEFAILED','Error! Sorry! Table creation failed.');
define('_DELETEITEM', 'Delete %i%');
define('_DELETEFAILED','Error! Sorry! Deletion attempt failed.');
define('_DELETEITEMSUCCEDED','Done! %i% deleted.');
define('_DELETESUCCEDED','Done! Item deleted.');
define('_DELETETABLEFAILED','Error! Table deletion failed.');
define('_DROPCOLUMNFAILED', 'Error! Column deletion failed.');
define('_DROPINDEXFAILED', 'Error! Index deletion failed.');
define('_FAILEDTOLOADMODULE', 'Error! Could not load <strong>%m%<strong> module.');
define('_FAILEDTOLOADMODULEATFUNC', 'Error! Could not load <strong>%m%</strong> module (at function: <strong>%f%</strong>).');
define('_GETFAILED', 'Error! Could not load items.');
define('_GETITEMSFAILED', 'Error! Could not load %i%.');
define('_GENERALSETTINGS', 'General Settings');
define('_LOADAPIFAILED', 'Error! Could not load module API.');
define('_LOADFAILED','Error! Could not load module.');
define('_MODARGSERROR','Error! Could not do what you wanted. Please check your input.');
define('_MODIFYCONFIG', 'Settings');
define('_MODIFYCONFIGITEM', '%1% Settings');
define('_MODIFYITEM', 'Edit %i%');
define('_MODULENOAUTH', 'Sorry! No authorization to access this module.');
define('_MODULENODIRECTACCESS', 'Sorry! This module cannot be accessed directly.');
define('_MODULENOTAVAILABLE', 'Sorry! The <strong>%m%</strong> module is not available.');
define('_MODULERETURNED', 'In <strong>%m%</strong> module, <strong>%f%</strong> function returned.');
define('_MUSTBENUMERIC', 'The \'%s%\' setting must be numeric.');
define('_NEWITEM', 'Create %i%');
define('_NOITEMSFOUND', 'No items found.');
define('_NOFOUND', 'No %i% found.');
define('_NOSUCHITEM', 'No such item found.');
define('_NOSUCHITEMFOUND', 'No such %i% found.');
define('_REGISTERFAILED', 'Error! Failed to register hook.');
define('_RENAMECOLUMNFAILED', 'Error! Column rename failed.');
define('_RENAMETABLEFAILED', 'Error! Table rename failed.');
define('_SEARCHITEMS', 'Search for %i%');
define('_SEARCHRESULTSFOUND', '%x% result(s) found.');
define('_SEARCHRESULTSNOITEMSFOUND', 'No %i% found.');
define('_TEMPLATENOTAVAILABLE', 'In %m% module, cannot find template %t%');
define('_TRANSACTIONFAILED', 'Transaction failed ... Rollback!');
define('_UNABLETOLOADCLASS', 'Error! Unable to load class [%s%]');
define('_UNABLETOLOADMODULECLASS', 'Error! Unable to load module class [%s%] for module [%m%]');
define('_UNABLETOLOADMODULEARRAYCLASS', 'Error! Unable to load module array class [%s%] for module [%m%]');
define('_UNKNOWNFUNC', 'Error! Unknown function call:');
define('_UNKNOWNUSER', 'unknown user');
define('_UNREGISTERFAILED', 'Error! Could not deregister hook.');
define('_UPDATEITEM', 'Update %i%');
define('_UPDATECONFIG', 'Update Configuration');
define('_UPDATEDBY', 'Last updated by %username%');
define('_UPDATEDBYON', 'Last updated by %username% on %date%');
define('_UPDATEDON', 'Updated on %date%');
define('_UPDATEFAILED','Error! Update attempt failed.');
define('_UPDATETABLEFAILED','Error! Table update failed.');
define('_UPDATEITEMSUCCEDED','Done! %i% updated.');
define('_UPDATESUCCEDED','Done! Item updated.');
define('_VIEWCONFIG', 'View Configuration');
define('_VIEWITEMS', '%i% List');

// Central administration define
define('_ADMINMENU','Admin Interface');

// defines for the pager plugin
define('_FIRSTPAGE', 'First');
define('_FIRSTPAGE_TITLE', 'First Page');
define('_ITEMSPERPAGE', 'Items per page');
define('_PREVIOUSPAGE', 'Previous');
define('_PREVIOUSPAGE_TITLE', 'Previous Page');
define('_LASTPAGE', 'Last');
define('_LASTPAGE_TITLE', 'Last Page');
define('_NEXTPAGE', 'Next');
define('_NEXTPAGE_TITLE', 'Next Page');
define('_NONEXTPAGE', 'No further pages');
define('_NOPREVIOUSPAGE', 'No previous pages');
define('_PAGE', 'Page');
define('_PERPAGE', '%i% per page');
define('_TOTAL', 'Total');

// WorkflowUtil
define('_WF_STATEERROR', 'Workflow State Error');

// Form utilities
define('_PNFORM_MANDATORYERROR', 'An entry in this field is mandatory.');
define('_PNFORM_MANDATORYSELECTERROR', 'A selection here is mandatory.');
define('_PNFORM_MAXLENGTHERROR', 'Input text no longer than %s characters.');
define('_PNFORM_SELECTDATE', 'Select date');
define('_PNFORM_RANGEERROR', 'The value is not in the acceptable range.');
define('_PNFORM_RANGEMINERROR', 'The value must be %i% or more.');
define('_PNFORM_RANGEMAXERROR', 'The value must be %i% or less.');
define('_PNFORM_UPLOADERROR', 'Error uploading file.');

// categories system
define('_ALLCATEGORIES', 'All');
define('_CATEGORY', 'Category');
define('_CATEGORY_LC', 'category');
define('_CATEGORIES', 'Categories');
define('_CATEGORIESMAPPINGS', 'Multi-Category Mappings');
define('_CATEGORIESMAPPINGSCOUNT', 'Number of Multi-Category Mappings');
define('_CHOOSECATEGORY', 'Choose Category');
define('_CHOOSEMODULE', 'Choose Module');
define('_CHOOSETABLE', 'Choose Table');
define('_CHOOSEONE', 'Choose One');
define('_ENABLECATEGORIZATION', 'Enable categorization');
define('_NOASSIGNEDCATEGORIES', 'No assigned categories');
define('_MODULECATEGORY', 'Module Category');
define('_MODULECATEGORY_LC', 'module category');
define('_MODULECATEGORIES', 'Module Categories');
define('_CATEGORIZATION', 'Categorization');

// attributes system
define('_ATTRIBUTE', 'Attribute');
define('_ATTRIBUTES', 'Attributes');
define('_ATTRIBUTE_NEW', 'New attribute');
define('_ENABLEATTRIBUTION', 'Enable attribution');

// 'templates' for error message
define('_ERROR_ADMIN', '%message% in %func% at line %line% in file %file%.');

// userlinks plugin
define('_YOURACCOUNT', 'Account Panel');
define('_CREATEACCOUNT', 'Register new account');

// onlune plugin
define('_CURRENTLYONLINE', 'Currently there are %numguests% %gueststext% and %numusers% %userstext% online.');

// user welcome plugin
define('_WELCOMEUSER', 'Welcome %username%');

// login/logout procedure
define('_UNABLETOSAVELOGINDATE', 'Error! Sorry! Unable to save login date.');
define('_LOGOUTFORCED', 'You have been logged out by an administrator. Please log in again.');
define('_REMEMBERME', 'Remember me');

// jscalendar
define('_DATE_SELECTOR', 'Date selector');

// mailer
define('_ERROR_SENDINGMAIL', 'An error occured while sending an email');
define('_ERROR_SENDINGMAIL_ADMINLOG', 'An error occured while sending an email from %fromname% (%fromaddress%) to %toname% (%toaddress%) with subject \'%subject\': %errorinfo%');
define('_ERROR_UNKNOWNMAILERERROR', 'unknown mailer error');

// module vars
define('_ERROR_NONULLVALUEALLOWED', 'Module variables with NULL-value are not allowed (%modname%/%varname%)');

// site disabled template
define('_THISSITEDISABLED', 'This site has been disabled');
define('_ADMINLOGINREQUIRED', 'Admin login required to proceed');
define('_ADMINLOGIN', 'Administrator Login');

// exit functionality
define('_EXITINSTALLERROR', 'Install Error:');
define('_EXITHANDLER', 'Exit-Handler: ');
define('_EXITSTACKTRACE', 'Stack Trace:');
