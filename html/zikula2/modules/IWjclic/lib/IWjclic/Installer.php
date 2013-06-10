<?php

/**
 * Initialise the IWjclic module creating module tables and module vars
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
class IWjclic_Installer extends Zikula_AbstractInstaller {

    public function install() {
        // Checks if module IWmain is installed. If not returns error
        $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] != 3) {
            return LogUtil::registerError($this->__('IWmain module must be installed. Install it to install this module.'));
        }

        // Check if the version needed is correct
        $versionNeeded = '3.0';
        if (!ModUtil::func('IWmain', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
            return false;
        }

        // Create module tables
        if (!DBUtil::createTable('IWjclic'))
            return false;
        if (!DBUtil::createTable('IWjclic_activities'))
            return false;
        if (!DBUtil::createTable('IWjclic_groups'))
            return false;
        if (!DBUtil::createTable('IWjclic_sessions'))
            return false;
        if (!DBUtil::createTable('IWjclic_users'))
            return false;
        if (!DBUtil::createTable('IWjclic_settings'))
            return false;

        //Create indexes
        $tables = DBUtil::getTables();
        $c = $tables['IWjclic_column'];
        if (!DBUtil::createIndex($c['user'], 'IWjclic', 'user'))
            return false;

        $c = $tables['IWjclic_activities_column'];
        if (!DBUtil::createIndex($c['session_id'], 'IWjclic_activities', 'session_id'))
            return false;

        $c = $tables['IWjclic_groups_column'];
        if (!DBUtil::createIndex($c['jid'], 'IWjclic_groups', 'jid'))
            return false;

        $c = $tables['IWjclic_sessions_column'];
        if (!DBUtil::createIndex($c['jclicid'], 'IWjclic_sessions', 'jclicid'))
            return false;
        if (!DBUtil::createIndex($c['session_id'], 'IWjclic_sessions', 'session_id'))
            return false;
        if (!DBUtil::createIndex($c['user_id'], 'IWjclic_sessions', 'user_id'))
            return false;

        $c = $tables['IWjclic_settings_column'];
        if (!DBUtil::createIndex($c['setting_key'], 'IWjclic_settings', 'setting_key'))
            return false;

        $c = $tables['IWjclic_users_column'];
        if (!DBUtil::createIndex($c['jid'], 'IWjclic_users', 'jid'))
            return false;

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv,
                    'less' => ModUtil::getVar('iw_myrole', 'rolegroup')));

        $groupsProAssign = '$';

        foreach ($groups as $group) {
            $groupsProAssign .= '$' . $group['id'] . '$';
        }

        //Set module vars
        ModUtil::setVar('IWjclic', 'timeLap', '5');
        ModUtil::setVar('IWjclic', 'jclicJarBase', 'http://clic.xtec.cat/dist/jclic');
        ModUtil::setVar('IWjclic', 'jclicUpdatedFiles', 'jclic');
        ModUtil::setVar('IWjclic', 'groupsProAssign', $groupsProAssign);

        //Insert default values in settings table
        $items = array(array('key' => 'ALLOW_CREATE_GROUPS',
                'value' => 'false'),
            array('key' => 'ALLOW_CREATE_USERS',
                'value' => 'false'),
            array('key' => 'SHOW_GROUP_LIST',
                'value' => 'false'),
            array('key' => 'SHOW_USER_LIST',
                'value' => 'false'),
            array('key' => 'USER_TABLES',
                'value' => 'true'),
            array('key' => 'TIME_LAP',
                'value' => '10'));

        foreach ($items as $item) {
            $itemsToInsert = array('setting_key' => $item['key'],
                'setting_value' => $item['value']);
            if (!DBUtil::insertObject($itemsToInsert, 'IWjclic_settings', 'jsid')) {
                return false;
            }
        }

        //Successfull
        return true;
    }

    /**
     * Delete the IWjclic module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function uninstall() {
        // Delete module table
        DBUtil::dropTable('IWjclic');
        DBUtil::dropTable('IWjclic_activities');
        DBUtil::dropTable('IWjclic_groups');
        DBUtil::dropTable('IWjclic_sessions');
        DBUtil::dropTable('IWjclic_users');
        DBUtil::dropTable('IWjclic_settings');

        //Delete module vars
        ModUtil::delVar('IWjclic', 'timeLap');
        ModUtil::delVar('IWjclic', 'jclicJarBase');
        ModUtil::delVar('IWjclic', 'jclicUpdatedFiles');
        ModUtil::delVar('IWjclic', 'groupsProAssign');

        //Deletion successfull
        return true;
    }

    public function upgrade($oldversion) {
        if ($oldversion < 1.1) {
            if (!DBUtil::changeTable('IWjclic'))
                return false;
            if (!DBUtil::changeTable('IWjclic_activities'))
                return false;
            if (!DBUtil::changeTable('IWjclic_groups'))
                return false;
            if (!DBUtil::changeTable('IWjclic_sessions'))
                return false;
            if (!DBUtil::changeTable('IWjclic_users'))
                return false;
            if (!DBUtil::changeTable('IWjclic_settings'))
                return false;

            //Create indexes
            $tables = DBUtil::getTables();
            $c = $tables['IWjclic_column'];
            if (!DBUtil::createIndex($c['user'], 'IWjclic', 'user'))
                return false;

            $c = $tables['IWjclic_activities_column'];
            if (!DBUtil::createIndex($c['session_id'], 'IWjclic_activities', 'session_id'))
                return false;

            $c = $tables['IWjclic_groups_column'];
            if (!DBUtil::createIndex($c['jid'], 'IWjclic_groups', 'jid'))
                return false;

            $c = $tables['IWjclic_sessions_column'];
            if (!DBUtil::createIndex($c['jclicid'], 'IWjclic_sessions', 'jclicid'))
                return false;
            if (!DBUtil::createIndex($c['session_id'], 'IWjclic_sessions', 'session_id'))
                return false;
            if (!DBUtil::createIndex($c['user_id'], 'IWjclic_sessions', 'user_id'))
                return false;

            $c = $tables['IWjclic_settings_column'];
            if (!DBUtil::createIndex($c['setting_key'], 'IWjclic_settings', 'setting_key'))
                return false;

            $c = $tables['IWjclic_users_column'];
            if (!DBUtil::createIndex($c['jid'], 'IWjclic_users', 'jid'))
                return false;
        }

        // Update successful
        return true;
    }

}