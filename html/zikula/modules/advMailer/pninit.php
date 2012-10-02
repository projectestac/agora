<?php

/**
 * Zikula Application Framework
 *
 * @package	XTEC advMailer
 * @author	Francesc Bassas i Bullich
 * @license	GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
 * initialise the module
 *
 * @author Francesc Bassas i Bullich
 * @return bool true on success, false otherwise
 */
function advMailer_init()
{
    // @aginard: get environment info from html/config/env-config.php file, so
    // it's automatically filled with proper value
    global $agora;
    $environment = $agora['server']['enviroment'];

    // Set default module variables
    pnModSetVar('advMailer', 'enabled', 1);
    pnModSetVar('advMailer', 'idApp', 'AGORA');
    pnModSetVar('advMailer', 'replyAddress', pnConfigGetVar('adminmail'));
    pnModSetVar('advMailer', 'sender', 'educacio');
    pnModSetVar('advMailer', 'environment',  $environment);
    pnModSetVar('advMailer', 'contenttype', 2);
    pnModSetVar('advMailer', 'log', 0);
    pnModSetVar('advMailer', 'debug', 0);
	pnModSetVar('advMailer', 'logpath', '');
    
    // Initialisation successful
    return true;
}

/**
 * delete the module
 *
 * @author  Francesc Bassas i Bullich
 * @return  bool true if successful, false otherwise
 */
function advMailer_delete()
{
    // Delete all module variables
    pnModDelVar('advMailer');

    // Deletion successful
    return true;
}
