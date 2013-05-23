<?php

/**
 * Gets all the items created in the menu
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id_parent
 * @return:	And array with the items information
 */
class IWvhmenu_Api_Admin extends Zikula_AbstractApi {

    public function getall($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        extract($args);

        // Needed arguments.
        if (isset($id_parent)) {
            $id = $id_parent;
        }
        (!isset($id)) ? $id_parent = 0 : $id_parent = $id;

        if (isset($active)) {
            $active = " AND active=$active ";
        } else {
            $active = "";
        }

        $table = DBUtil::getTables();
        $c = $table['IWvhmenu_column'];
        if ($id_parent == '-1') {
            $where = "$active";
        } else {
            $where = "$c[id_parent]=$id_parent $active";
        }
        $orderby = "$c[iorder]";

        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWvhmenu', $where, $orderby, '-1', '-1', 'mid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Create a new menu item
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   array with the values that have to be created
     * @return:	The identity of the record created
     */
    public function create($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        extract($args);

        // Optional arguments.
        if (!isset($args['descriu'])) {
            $descriu = '';
        }

        // Needed arguments.
        if (!isset($args['text'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = array('text' => $args['text'],
            'url' => $args['url'],
            'bg_image' => $args['bg_image'],
            'height' => $args['height'],
            'width' => $args['width'],
            'id_parent' => $args['id_parent'],
            'groups' => $args['groups'],
            'active' => $args['active'],
            'target' => $args['target'],
            'descriu' => $args['descriu'],
            'grafic' => $args['grafic'],
            'image1' => $args['image1'],
            'image2' => $args['image2']);

        if (!DBUtil::insertObject($item, 'IWvhmenu', 'mid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Return the id of the newly created item to the calling process
        return $item['mid'];
    }

    /**
     * Create a new submenu item
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   array with the values that have to be created
     * @return:	The identity of the record created
     */
    public function create_sub($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        extract($args);

        // Optional arguments.
        if (!isset($args['descriu'])) {
            $descriu = '';
        }


        // Needed arguments.
        if (!isset($args['text']) || !isset($args['mid'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = array('mid' => $args['mid'],
            'text' => $args['text'],
            'url' => $args['url'],
            'bg_image' => $args['bg_image'],
            'height' => $args['height'],
            'width' => $args['width'],
            'id_parent' => $args['id_parent'],
            'groups' => $args['groups'],
            'active' => $args['active'],
            'target' => $args['target'],
            'descriu' => $args['descriu'],
            'grafic' => $args['grafic'],
            'image1' => $args['image1'],
            'image2' => $args['image2']);

        if (!DBUtil::insertObject($item, 'IWvhmenu', 'mid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Return the id of the newly created item to the calling process
        return $item['mid'];
    }

    /**
     * Gets a menu item
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:		id of the item to get
     * @return:		An array with the item information
     */
    public function get($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Needed arguments.
        if (!isset($args['mid'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        // get the objects from the db
        $items = DBUtil::selectObjectByID('IWvhmenu', $args['mid'], 'mid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Delete a menu item and all the submenus items associated with it
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the item to delete
     * @return:	True if success
     */
    public function delete($args) {

        $submenusId = FormUtil::getPassedValue('submenusId', isset($args['submenusId']) ? $args['submenusId'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Needed arguments.
        if (!isset($submenusId)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $submenusId_array = explode(',', $submenusId);

        foreach ($submenusId_array as $mid) {
            //Cridem la funciÃ³ get que retorna les dades
            $item = ModUtil::apiFunc('IWvhmenu', 'admin', 'get', array('mid' => $mid));
            if (!$item) {
                return LogUtil::registerError($this->__('No such item found.'));
            }

            // Delete the item and check the return value for error
            if (!DBUtil::deleteObjectByID('IWvhmenu', $mid, 'mid')) {
                return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
            }
        }
        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Update a menu item
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the item to update
     * @return:	True if success
     */
    public function update($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        extract($args);

        // Needed arguments.
        if (!isset($args['mid']) || !isset($text)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //Cridem la funciÃ³ get que retorna les dades
        $item = ModUtil::apiFunc('IWvhmenu', 'admin', 'get', array('mid' => $mid));
        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        $items = array('text' => $args['text'],
            'url' => $args['url'],
            'bg_image' => $args['bg_image'],
            'height' => $args['height'],
            'width' => $args['width'],
            'active' => $args['active'],
            'target' => $args['target'],
            'descriu' => $args['descriu'],
            'grafic' => $args['grafic'],
            'image1' => $args['image1'],
            'image2' => $args['image2']);

        $table = & DBUtil::getTables();

        $c = $table['IWvhmenu_column'];
        $where = "$c[mid]=$mid";

        if (!DBUtil::updateObject($items, 'IWvhmenu', $where, 'mid')) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }


        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Change the position of a menu item
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the item to move and new position
     * @return:	True if success
     */
    public function put_order($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        extract($args);

        // Needed arguments.
        if (!isset($args['mid']) || !isset($iorder)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //Cridem la funciÃ³ get que retorna les dades
        $item = ModUtil::apiFunc('IWvhmenu', 'admin', 'get', array('mid' => $mid));
        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        $items = array('iorder' => $args['iorder']);

        $table = & DBUtil::getTables();

        $c = $table['IWvhmenu_column'];
        $where = "$c[mid]=$mid";

        if (!DBUtil::updateObject($items, 'IWvhmenu', $where, 'mid')) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Delete the access of a group to a menu or submenu
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the item to move and the group to delete
     * @return:	True if success
     */
    public function modify_grup($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        extract($args);

        // Needed arguments.
        if (!isset($args['mid']) || !isset($groups)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //Cridem la funciÃ³ get que retorna les dades
        $item = ModUtil::apiFunc('IWvhmenu', 'admin', 'get', array('mid' => $mid));
        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        $items = array('groups' => $args['groups']);

        $table = & DBUtil::getTables();

        $c = $table['IWvhmenu_column'];
        $where = "$c[mid]=$mid";

        if (!DBUtil::updateObject($items, 'IWvhmenu', $where, 'mid')) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Change the level of a menu item
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the item to move
     * @return:	True if success
     */
    public function move_level($args) {

        // Get parameters
        $id_parent = FormUtil::getPassedValue('id_parent', isset($args['id_parent']) ? $args['id_parent'] : null, 'POST');
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Needed arguments.
        if (!isset($mid) || !isset($id_parent)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //Cridem la funciÃ³ get que retorna les dades
        $item = ModUtil::apiFunc('IWvhmenu', 'admin', 'get', array('mid' => $mid));
        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        $items = array('iorder' => '0',
            'id_parent' => $id_parent);

        $table = & DBUtil::getTables();

        $c = $table['IWvhmenu_column'];
        $where = "$c[mid]=$mid";

        if (!DBUtil::updateObject($items, 'IWvhmenu', $where, 'mid')) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        // Let the calling process know that we have finished successfully
        return true;
    }

    
        public function getlinks($args) {
        $links = array();
        if (SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('IWvhmenu', 'admin', 'newItem', array('m' => 'n')), 'text' => $this->__('Add a new option to the menu'), 'id' => 'iwvhmenu_newitem', 'class' => 'z-icon-es-new');
            $links[] = array('url' => ModUtil::url('IWvhmenu', 'admin', 'main'), 'text' => $this->__('Show the options'), 'id' => 'iwvhmenu_main', 'class' => 'z-icon-es-view');
            $links[] = array('url' => ModUtil::url('IWvhmenu', 'admin', 'conf'), 'text' => $this->__('Configure the module'), 'id' => 'iwvhmenu_conf', 'class' => 'z-icon-es-config');
        }

        return $links;
    }
    
    
}