<?php

/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pninit.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Noteboard
 */
class IWmyrole_Installer extends Zikula_AbstractInstaller {

    /**
     * Initialise the IWmyrole module creating module vars
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function install() {
        // Checks if module IWmain is installed. If not returns error
        $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] != 3) {
            return LogUtil::registerError($this->__('Module IWmain is required. You have to install the IWmain module previously to install it.'));
        }

        // Check if the version needed is correct
        $versionNeeded = '3.0.0';
        if (!ModUtil::func('IWmain', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
            return false;
        }

        // Name of the initial group
        $name = "changingRole";

        // The API function is called.
        $check = ModUtil::apiFunc('Groups', 'admin', 'getgidbyname', array('name' => $name));

        if ($check != false) {
            // Group already exists
            // LogUtil::registerError (_GROUPS_ALREADYEXISTS);
            $gid = $check;
        } else {
            // Falta mirar si existeix
            $gid = ModUtil::apiFunc('Groups', 'admin', 'create', array('name' => $name,
                        'gtype' => 0,
                        'state' => 0,
                        'nbumax' => 0,
                        'description' => $this->__('Initial group of users that can change the role')));
            // Success
        }

        // The return value of the function is checked here
        if ($gid != false) {
            $this->setVar('rolegroup', $gid);
            // Gets the first sequence number of permissions list
            $pos = DBUtil::selectFieldMax('group_perms', 'sequence', 'MIN');
            // SET MODULE AND BLOCK PERMISSIONS
            // insert permission myrole:: :: administration in second place
            ModUtil::apiFunc('permissions', 'admin', 'create', array('realm' => 0,
                'id' => $gid,
                'component' => 'IWmyrole::',
                'instance' => '::',
                'level' => '800',
                'insseq' => $pos + 1));
        }

        $this->setVar('groupsNotChangeable', '');

        //Initialation successfull
        return true;
    }

    /**
     * Delete the iwmyrole module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function uninstall() {
        //Deletion successfull
        // Esborrar el permís IWmyrole
        $pntables = DBUtil::getTables();
        $column = $pntables['group_perms_column'];

        $where = "WHERE $column[component] LIKE 'IWmyrole%' AND $column[gid] = " . ModUtil::getVar('IWmyrole', 'rolegroup');
        $result = DBUtil::DeleteWhere('group_perms', $where);

        $this->delVar('rolegroup')
                ->delVar('groupsNotChangeable');

        return true;
    }

    /**
     * Update the IWmyrole module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Jaume Fernàndez Valiente (jfern343@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function upgrade($oldversion) {
        if (!ModUtil::hasVar('IWmyrole', 'groupsNotChangeable')) {
            $this->setVar('groupsNotChangeable', '');
        }

        return true;
    }

}