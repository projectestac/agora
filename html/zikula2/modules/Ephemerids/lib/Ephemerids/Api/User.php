<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 355 2009-11-11 13:10:50Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Ephemerids
 */
class Ephemerids_Api_User extends Zikula_AbstractApi {

    /**
     * Get all ephemerids
     * @author Mark West
     * @return mixed array of items, or false on failure
     */
    public function getall($args) {

        // Optional arguments
        if (!isset($args['startnum']) || !is_numeric($args['startnum'])) {
            $args['startnum'] = 1;
        }
        if (!isset($args['numitems']) || !is_numeric($args['numitems'])) {
            $args['numitems'] = -1;
        }
        if (!isset($args['ignoreml']) || !is_bool($args['ignoreml'])) {
            $args['ignoreml'] = false;
        }
        if (!isset($args['language'])) {
            $args['language'] = null;
        }
        if (!isset($args['order'])) {
            $args['order'] = 'eid';
        }

        $items = array();

        if (!SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_READ)) {
            return $items;
        }

        // define the permission filter to apply
        $permFilter = array(array('component_left' => 'Ephemerids',
                'instance_right' => 'eid',
                'level' => ACCESS_READ));

        // define where clause for ML filtering
        $where = '';
        if (System::getVar('multilingual') == 1 && !$args['ignoreml'] && isset($args['language'])) {
            $pntable = DBUtil::getTables();
            $columns = $pntable['ephem_column'];
            $where = "($columns[language]='" . DataUtil::formatForStore($args['language']) . "' OR $columns[language]='')";
        }

        // get the objects from the db
        $items = DBUtil::selectObjectArray('ephem', $where, $args['order'], $args['startnum'] - 1, $args['numitems'], '', $permFilter);

        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load any ephemerids.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Get a specific ephemerid
     * @author Mark West
     * @param $args['eid'] id of example item to get
     * @return mixed item array, or false on failure
     */
    public function get($args) {

        if (!isset($args['eid']) || !is_numeric($args['eid'])) {
            return LogUtil::registerArgsError();
        }

        // define the permission filter to apply
        $permFilter = array(array('component_left' => 'Ephemerids',
                'instance_right' => 'eid',
                'level' => ACCESS_READ));


        return DBUtil::selectObjectByID('ephem', $args['eid'], 'eid', '', $permFilter);
    }

    /**
     * utility function to count the number of items held by this module
     * @author Mark West
     * @return integer number of items held by this module
     */
    public function countitems() {
        return DBUtil::selectObjectCount('ephem', '');
    }

    /**
     * get all items for today
     *
     * @author Mark West
     * @return mixed array of items, or false on failure
     */
    public function gettoday() {

        $items = array();

        if (!SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_READ)) {
            return $items;
        }

        // get todays date
        $today = getdate();
        $eday = $today['mday'];
        $emonth = $today['mon'];

        // Get database setup
        $pntable = DBUtil::getTables();
        $columns = $pntable['ephem_column'];

        // init where clause vars
        $whereargs = array();

        // filter by language?
        if (System::getVar('multilingual') == 1) {
            $whereargs[] = "($columns[language]='' OR $columns[language]='" . DataUtil::formatForStore(ZLanguage::getLanguageCode()) . "')";
        }
        $whereargs[] = "$columns[did]='" . DataUtil::formatForStore($eday) . "'";
        $whereargs[] = "$columns[mid]='" . DataUtil::formatForStore($emonth) . "'";

        $where = 'WHERE ' . implode(' AND ', $whereargs);

        // define the permission filter to apply
        $permFilter = array(array('component_left' => 'Ephemerids',
                'instance_right' => 'eid',
                'level' => ACCESS_READ));

        // get the objects from the db
        $items = DBUtil::selectObjectArray('ephem', $where, 'eid', -1, -1, '', $permFilter);
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load any ephemerids.'));
        }

        // Return the items
        return $items;
    }

}