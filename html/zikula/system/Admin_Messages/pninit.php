<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Admin_Messages
 */

/**
 * initialise the Admin module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 * @author Mark West
 * @return bool true if initialisation succcesful, false otherwise
 */
function Admin_Messages_init()
{
    if (!DBUtil::createTable('message')) {
        return false;
    }

    // Set a default value for a module variable
    pnModSetVar('Admin_Messages', 'itemsperpage', 25);
    pnModSetVar('Admin_Messages', 'allowsearchinactive', false);

    // create the default data for the modules module
    Admin_Messages_defaultdata();

    // Initialisation successful
    return true;
}

/**
 * upgrade the module from an old version
 *
 * This function must consider all the released versions of the module!
 * If the upgrade fails at some point, it returns the last upgraded version.
 *
 * @author       Mark West
 * @param        string   $oldVersion   version number string to upgrade from
 * @return       mixed    true on success, last valid version string or false if fails
 */
function Admin_Messages_upgrade($oldversion)
{
    // Upgrade dependent on old version number
    switch ($oldversion)
    {
        case '2.0':
        case '2.1':
            Admin_Messages_migrateLanguage();

        case '2.2':
            // future upgrade routines
    }

    // Update successful
    return true;
}

/**
 * delete the Admin module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 * @author Mark West
 * @return bool true if deletetion succcesful, false otherwise
 */
function Admin_Messages_delete()
{
    if (!DBUtil::dropTable('message')) {
        return false;
    }

    pnModDelVar('Admin_Messages');

    // Deletion successful
    return true;
}

/**
 * create the default data for the modules module
 *
 * This function is only ever called once during the lifetime of a particular
 * module instance
 *
 * @author       Mark West
 * @return       bool       false
 */
function Admin_Messages_defaultdata()
{
    $record = array();
    $record['title'] = __('This site is powered by Zikula!');
    $record['content'] = __('<p><a href="http://www.zikula.org">Zikula</a> is a content management system (CMS) and application framework. It is secure and stable, and is a good choice for sites with a large volume of traffic.</p><p>With Zikula:</p><ul><li>you can customise all aspects of the site\'s appearance through themes, with support for CSS style sheets, JavaScript, Flash and all other modern web development technologies;</li><li>you can mark content as being suitable for either a single language or for all languages, and can control all aspects of localisation and internationalisation of your site and pages;</li><li>you can be sure that your pages will display properly in all browsers, thanks to Zikula\'s full compliance with W3C HTML standards;</li><li>you get a standard application-programming interface (API) that lets you easily augment your site\'s functionality through modules, blocks and other extensions;</li><li>you can get help and support from the Zikula community of webmasters and developers at <a href="http://www.zikula.org">zikula.org</a>.</li></ul><p>Enjoy using Zikula!</p><p><strong>The Zikula team</strong></p><p><em>Note: Zikula is Free Open Source Software (FOSS) licensed under the GNU General Public License.</em></p>');
    $record['date'] = time();
    $record['expire'] = '0';
    $record['active'] = '1';
    $record['view'] = '1';
    $record['language'] = '';

    DBUtil::insertObject($record, 'message', 'mid');
}

function Admin_Messages_migrateLanguage()
{
    $obj = DBUtil::selectObjectArray('message');

    if (count($obj) == 0) {
        // nothing to do
        return;
    }

    foreach ($obj as $message)
    {
        if (empty($message['language'])) {
            continue;
        }
        $l2 = ZLanguage::translateLegacyCode($message['language']);
        if ($l2) {
            $message['language'] = $l2;
            DBUtil::updateObject($message, 'message', '', 'mid', true);
        }
    }

    return;
}
