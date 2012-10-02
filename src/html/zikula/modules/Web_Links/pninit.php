<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: pninit.php 62 2009-01-28 17:12:37Z Petzi-Juist $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
 * init web_links module
 */
function web_links_init()
{
    // Create tables

    // creating categories table
    if (!DBUtil::createTable('links_categories')) {
        return false;
    }

    // creating links table
    if (!DBUtil::createTable('links_links')) {
        return false;
    }

    // creating modrequest table
    if (!DBUtil::createTable('links_modrequest')) {
        return false;
    }

    // creating newlink table
    if (!DBUtil::createTable('links_newlink')) {
        return false;
    }

    // web_links settings
    pnModSetVar('Web_Links', 'perpage', 10);
    pnModSetVar('Web_Links', 'toplinkspercentrigger', 0);
    pnModSetVar('Web_Links', 'toplinks', 25);
    pnModSetVar('Web_Links', 'mostpoplinkspercentrigger', 0);
    pnModSetVar('Web_Links', 'mostpoplinks', 25);
    pnModSetVar('Web_Links', 'featurebox', 1);
    pnModSetVar('Web_Links', 'blockunregmodify', 0);
    pnModSetVar('Web_Links', 'popular', 500);
    pnModSetVar('Web_Links', 'newlinks', 10);
    pnModSetVar('Web_Links', 'bestlinks', 10);
    pnModSetVar('Web_Links', 'linksresults', 10);
    pnModSetVar('Web_Links', 'links_anonaddlinklock', 1);
    pnModSetVar('Web_Links', 'targetblank', 0);
    pnModSetVar('Web_Links', 'linksinblock', 10);

    // Initialisation successful
    return true;

}

/**
 * upgrade
 */
function web_links_upgrade($oldversion)
{
    // Get database information
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $prefix = pnConfigGetVar('prefix');

    switch($oldversion) {
        case '1.0':



    pnModSetVar('Web_Links', 'perpage', 10);
    pnModSetVar('Web_Links', 'toplinkspercentrigger', 0);
    pnModSetVar('Web_Links', 'toplinks', 25);
    pnModSetVar('Web_Links', 'mostpoplinkspercentrigger', 0);
    pnModSetVar('Web_Links', 'mostpoplinks', 25);
    pnModSetVar('Web_Links', 'featurebox', 1);
    pnModSetVar('Web_Links', 'blockunregmodify', 0);
    pnModSetVar('Web_Links', 'popular', 500);
    pnModSetVar('Web_Links', 'newlinks', 10);
    pnModSetVar('Web_Links', 'bestlinks', 10);
    pnModSetVar('Web_Links', 'linksresults', 10);
    pnModSetVar('Web_Links', 'links_anonaddlinklock', 1);
    pnModSetVar('Web_Links', 'targetblank', 0);
    pnModSetVar('Web_Links', 'linksinblock', 10);

           break;
    }
    // Upgrade successful
    return true;
}

/**
 * delete the web_links module
 */
function web_links_delete()
{
    // Delete tables

    if (!DBUtil::dropTable('links_categories')) {
        return false;
    }

    if (!DBUtil::dropTable('links_links')) {
        return false;
    }

    if (!DBUtil::dropTable('links_modrequest')) {
        return false;
    }

    if (!DBUtil::dropTable('links_newlink')) {
        return false;
    }

    // remove module vars
    pnModDelVar('Web_Links');

    // Deletion successful
    return true;
}