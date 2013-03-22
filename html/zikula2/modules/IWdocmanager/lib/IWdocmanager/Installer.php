<?php

/**
 * Copyright Zikula Foundation 2009 - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv2.1 (or at your option, any later version).
 * @package Multisites
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */
class IWdocmanager_Installer extends Zikula_AbstractInstaller {

    public function install() {
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        // Checks if module IWmain is installed. If not returns error
        if (!ModUtil::available('IWmain')) {
            return LogUtil::registerError(__('Module IWmain is required. You have to install the IWmain module previously to install it.'));
        }

        // Check if the version needed is correct
        $versionNeeded = '3.0.0';
        if (!ModUtil::func('IWmain', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
            return false;
        }

        if (!DBUtil::createTable('IWdocmanager'))
            return false;
        if (!DBUtil::createTable('IWdocmanager_categories'))
            return false;

        //Create indexes
        $table = DBUtil::getTables();
        $c = $table['IWdocmanager_column'];
        DBUtil::createIndex($c['author'], 'IWdocmanager', 'author');
        DBUtil::createIndex($c['categoryId'], 'IWdocmanager', 'categoryId');

        //Create module vars
        $this->setVar('documentsFolder', 'documents')
                ->setVar('notifyMail', '')
                ->setVar('editTime', '45')
                ->setVar('deleteTime', '20');

        return true;
    }

    /**
     * uninstall the IWdocmanager module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function uninstall() {
        // Delete module table
        DBUtil::dropTable('IWdocmanager');
        DBUtil::dropTable('IWdocmanager_categories');

        //Delete module vars
        $this->delVar('documentsFolder')
                ->delVar('notifyMail')
                ->delVar('editTime')
                ->delVar('deleteTime');
        //Deletion successfull
        return true;
    }

    /**
     * Update the IWdocmanager module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function upgrade($oldversion) {
        $table = DBUtil::getTables();
        switch ($oldversion) {
            case '0.0.1';
                // used in agora module upgrade in order to calc the number of document in each category
                $categories = DBUtil::selectObjectArray('IWdocmanager_categories', '', '', '-1', '-1', 'categoryId');
                foreach ($categories as $category) {
                    ModUtil::func($this->name, 'user', 'countDocuments', array('categoryId' => $category['categoryId']));
                }
            case '1.0.0':
            // future versions
        }
        return true;
    }

}
