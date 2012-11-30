<?php
class IWwebbox_Api_User extends Zikula_AbstractApi
{
    /**
     * Return all the references that have been created
     *
     * @param    int     $args['starnum']    (optional) first item to return
     * @param    int     $args['numitems']   (optional) number if items to return
     * @return   array   array of items, or false on failure
     */
    public function getall($args) {
        $items = array();

        // Security check
        if (!SecurityUtil::checkPermission('IWwebbox::', '::', ACCESS_ADMIN)) {
            return $items;
        }

        // Optional arguments.
        if (!isset($args['startnum']) || !is_numeric($args['startnum'])) {
            $args['startnum'] = 1;
        }

        if (!isset($args['numitems']) || !is_numeric($args['numitems'])) {
            $args['numitems'] = -1;
        }

        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWwebbox', '', 'ref', $args['startnum'] - 1, $args['numitems'], '', '', '');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError(__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Return a reference depending on this ID
     *
     * @param    int     $args['pid']    Id of the reference that have to be returned
     * @return   array   array of items, or false on failure
     */
    public function get($args) {
        if (!isset($args['pid']) || !is_numeric($args['pid'])) {
            return LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.'));
        }

        return DBUtil::selectObjectByID('IWwebbox', $args['pid'], 'pid', '', '');
    }

    /**
     * Return a reference depending on this reference name
     *
     * @param    int     $args['ref']    Id of the reference that have to be returned
     * @return   array   array of items, or false on failure
     */
    public function getref($args) {
        if (!isset($args['ref'])) {
            return LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.'));
        }

        return DBUtil::selectObjectByID('IWwebbox', $args['ref'], 'ref', '', '');
    }
}