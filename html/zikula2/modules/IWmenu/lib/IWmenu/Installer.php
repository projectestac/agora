<?php

class IWmenu_Installer extends Zikula_AbstractInstaller {

    /**
     * Initialise the IWmenu module creating module tables and module vars
     * @author Albert Perez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function Install() {
        // Checks if module IWmain is installed. If not returns error
        $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] != 3) {
            return LogUtil::registerError($this->__('Module IWmain is needed. You have to install the IWmain module previously to install it.'));
        }

        // Check if the version needed is correct
        $versionNeeded = '3.0.0';
        if (!ModUtil::func('IWmain', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
            return false;
        }

        // Create module table
        if (!DBUtil::createTable('IWmenu'))
            return false;

        //Create indexes
        $pntable = DBUtil::getTables();
        $c = $pntable['IWmenu_column'];
        if (!DBUtil::createIndex($c['id_parent'], 'IWmenu', 'id_parent'))
            return false;

        //Create module vars
        ModUtil::setVar('IWmenu', 'height', 26); // Default height
        ModUtil::setVar('IWmenu', 'width', 200); // Default width
        ModUtil::setVar('IWmenu', 'imagedir', "menu"); // Default directori of menu images
        // checks if module vhmenu exists. If it exists import module vhmenu tables
        $modid = ModUtil::getIdFromName('IWmenu');
        $modinfo = ModUtil::getInfo($modid);
        if ($modinfo['state'] == 3) {
            // get the objects from the db
            ModUtil::load('IWvhmenu', 'user');
            $items = DBUtil::selectObjectArray('IWvhmenu');
            if ($items) {
                foreach ($items as $item) {
                    $groups = str_replace('|0', '', $item['groups']);
                    $groups = substr($groups, 1, strlen($groups));
                    $itemArray = array('text' => $item['text'],
                        'url' => $item['url'],
                        'icon' => '',
                        'id_parent' => $item['id_parent'],
                        'groups' => $groups,
                        'active' => $item['active'],
                        'target' => $item['target'],
                        'descriu' => $item['descriu']);

                    DBUtil::insertObject($itemArray, 'IWmenu', 'mid');
                }
            }
        }
        return true;
    }

    /**
     * Delete the IWmenu module
     * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function Uninstall() {
        // Delete module table
        DBUtil::dropTable('IWmenu');

        //Delete module vars
        ModUtil::delVar('IWmenu', 'height');
        ModUtil::delVar('IWmenu', 'width');
        ModUtil::delVar('IWmenu', 'imagedir');

        //Deletion successfull
        return true;
    }

    /**
     * Update the IWmenu module
     * @author Albert Perez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function upgrade($oldversion) {
        DBUtil::changeTable('IWmenu');
        switch ($oldversion) {
            case '1.0': //upgrade from old versions in Agora
            case '3.0.0':
                // add language features
                // get current lang code
                $currentLang = ZLanguage::getLanguageCode();
                // get current items
                $items = DBUtil::selectObjectArray('IWmenu', '', '');
                // get installed languages
                $languages = ZLanguage::getInstalledLanguages();
                // update items with languages array
                $table = DBUtil::getTables();
                $c = $table['IWmenu_column'];
                foreach ($items as $item) {
                    $langArray = array();
                    $langText = '';
                    foreach ($languages as $lang) {
                        $langArray[$lang] = ($lang == $currentLang) ? $item['text'] : '';
                    }
                    $langText = serialize($langArray);
                    // update text value with the serialised array
                    $i = array('text' => $langText);
                    $where = "$c[mid] = $item[mid]";
                    DBUtil::updateObject($i, 'IWmenu', $where);
                }
            case '3.0.1':
                // add language features for url fields
                // get current lang code
                $currentLang = ZLanguage::getLanguageCode();
                // get current items
                $items = DBUtil::selectObjectArray('IWmenu', '', '');
                // get installed languages
                $languages = ZLanguage::getInstalledLanguages();
                // update items with languages array
                $table = DBUtil::getTables();
                $c = $table['IWmenu_column'];
                foreach ($items as $item) {
                    $langArray = array();
                    $langText = '';
                    foreach ($languages as $lang) {
                        $langArray[$lang] = ($lang == $currentLang) ? $item['url'] : '';
                    }
                    $langText = serialize($langArray);
                    // update text value with the serialised array
                    $i = array('url' => $langText);
                    $where = "$c[mid] = $item[mid]";
                    DBUtil::updateObject($i, 'IWmenu', $where);
                }

            case '3.0.2': // future version
        }
        return true;
    }

}