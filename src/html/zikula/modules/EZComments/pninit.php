<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @version $Id: pninit.php 690 2010-05-12 16:08:51Z herr.vorragend $
 * @license See license.txt
 */

/**
 * initialise the EZComments module
 *
 * This function initializes the module to be used. it creates tables,
 * registers hooks,...
 *
 * @return boolean true on success, false otherwise.
 */
function EZComments_init()
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    // create main table
    if (!DBUtil::createTable('EZComments')) {
        return false;
    }

    // register Hook
    if (!pnModRegisterHook('item', 'display', 'GUI', 'EZComments', 'user', 'view')) {
        return LogUtil::registerError(__('Error creating hook.', $dom));
    }

    // register  delete Hook (Timo)
    // TODO: Check the Hook's name!
    if (!pnModRegisterHook('item', 'delete', 'API', 'EZComments', 'admin', 'deletebyitem')) {
        return LogUtil::registerError(__('Error creating hook.', $dom));
    }

    // register the module delete hook
    if (!pnModRegisterHook('module', 'remove', 'API', 'EZComments', 'admin', 'deletemodule')) {
        return LogUtil::registerError(__('Error creating hook.', $dom));
    }

    // Misc
    pnModSetVar('EZComments', 'template', 'Standard');
    pnModSetVar('EZComments', 'css', 'style.css');
    pnModSetVar('EZComments', 'anonusersinfo', false);
    pnModSetVar('EZComments', 'anonusersrequirename', false);
    pnModSetVar('EZComments', 'logip', false);
    pnModSetVar('EZComments', 'itemsperpage', 25);
    pnModSetVar('EZComments', 'enablepager', false);
    pnModSetVar('EZComments', 'commentsperpage', 25);
    pnModSetVar('EZComments', 'migrated', array('dummy' => true));
    pnModSetVar('EZComments', 'useaccountpage', '1');
    // Notification
    pnModSetVar('EZComments', 'MailToAdmin', false);
    pnModSetVar('EZComments', 'moderationmail', false);
    // Moderation
    pnModSetVar('EZComments', 'moderation', 0);
    pnModSetVar('EZComments', 'alwaysmoderate', false);
    pnModSetVar('EZComments', 'dontmoderateifcommented', false);
    pnModSetVar('EZComments', 'modlinkcount', 2);
    pnModSetVar('EZComments', 'modlist', '');
    // Blacklisting
    pnModSetVar('EZComments', 'blacklinkcount', 5);
    pnModSetVar('EZComments', 'blacklist', '');
    pnModSetVar('EZComments', 'proxyblacklist', false);
    pnModSetVar('EZComments', 'modifyowntime', 6);
    // Akismet
    pnModSetVar('EZComments', 'akismet', false);
    pnMoDSetVar('EZComments', 'akismetstatus', 1);
    // Feeds
    pnModSetVar('EZComments', 'feedtype', 'rss');
    pnModSetVar('EZComments', 'feedcount', 10);

    // Initialisation successful
    return true;
}

/**
 * upgrade the EZComments module from an old version
 *
 * This function upgrades the module to be used. It updates tables,
 * registers hooks,...
 *
 * @return boolean true on success, false otherwise.
 */
function EZComments_upgrade($oldversion)
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    if (!DBUtil::changeTable('EZComments')) {
        return LogUtil::registerError(__('Error updating the table.', $dom));
    }

    switch ($oldversion)
    {
        case '1.2':
            pnModSetVar('EZComments', 'enablepager', false);
            pnModSetVar('EZComments', 'commentsperpage', '25');

        case '1.3':
            pnModSetVar('EZComments', 'blacklinkcount', 5);
            pnModSetVar('EZComments', 'akismet', false);

        case '1.4':
            pnModSetVar('EZComments', 'anonusersrequirename', false);
            pnMoDSetVar('EZComments', 'akismetstatus', 1);

        case '1.5':
            if (!DBUtil::changeTable('EZComments')) {
                return '1.5';
            }
            pnModSetVar('EZComments', 'template', 'Standard');
            pnModSetVar('EZComments', 'modifyowntime', 6);
            pnModSetVar('EZComments', 'useaccountpage', '1');

        case '1.6':
        case '1.61':
        case '1.62':
            pnModSetVar('EZComments', 'migrated', array('dummy' => true));
            pnModSetVar('EZComments', 'css', 'style.css');

        case '2.0.0':
            // future upgrade routines
            break;
    }

    return true;
}

/**
 * delete the EZComments module from an old version
 *
 * This function deletes the module to be used. It deletes tables,
 * registers hooks,...
 *
 * @return boolean true on success, false otherwise.
 */
function EZComments_delete()
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    if (!pnModUnregisterHook('item', 'display', 'GUI', 'EZComments', 'user', 'view')) {
        return LogUtil::registerError(__('Error deleting hook.', $dom));
    }

    if (!pnModUnregisterHook('item', 'delete', 'API', 'EZComments', 'admin', 'deletebyitem')) {
        return LogUtil::registerError(__('Error deleting hook.', $dom));
    }

    if (!pnModUnregisterHook('module', 'remove', 'API', 'EZComments', 'admin', 'deletemodule')) {
        return LogUtil::registerError(__('Error deleting hook.', $dom));
    }

    // drop main table
    if (!DBUtil::dropTable('EZComments')) {
        return false;
    }

    // delete all module vars for the ezcomments module
    pnModDelVar('EZComments');

    // Deletion successful
    return true;
}
