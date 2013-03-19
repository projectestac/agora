<?php

class IWdocmanager_Api_User extends Zikula_AbstractApi {

    // get user links
    public function getlinks($args) {
        $categoryId = FormUtil::getPassedValue('categoryId', isset($args['categoryId']) ? $args['categoryId'] : 0, 'GET');
        $links = array();
        if (SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            $links[] = array('url' => ModUtil::url($this->name, 'user', 'viewDocs'), 'text' => $this->__('View documents'), 'class' => 'z-icon-es-view');
        }
        $categories = ModUtil::Func($this->name, 'user', 'getUserCategories', array('accessType' => 'add'));

        if (!empty($categories)) {
            // check if user can access to this category
            if (!ModUtil::func($this->name, 'user', 'canAccessCategory', array('categoryId' => $categoryId,
                        'accessType' => 'add',
                    )))
                $categoryId = '';
            $links[] = array('url' => ModUtil::url($this->name, 'user', 'newDoc', array('categoryId' => $categoryId)), 'text' => $this->__('New document'), 'class' => 'z-icon-es-new');
        }
        if (SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url($this->name, 'admin', 'main'), 'text' => $this->__('Administrate'), 'class' => 'z-icon-es-config');
        }

        // return output
        return $links;
    }

    public function getAllCategories($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $table = DBUtil::getTables();
        $c = $table['IWdocmanager_categories_column'];

        $where = (isset($args['parentId']) && $args['parentId'] > 0) ? "$c[parentId]=$args[parentId]" : "$c[parentId] = 0";

        $orderby = "$c[categoryName]";
        $items = DBUtil::selectObjectArray('IWdocmanager_categories', $where, $orderby, '-1', '-1', 'categoryId');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    public function getCategory($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if (!isset($args['categoryId']) || !is_numeric($args['categoryId'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = DBUtil::selectObjectByID('IWdocmanager_categories', $args['categoryId'], 'categoryId');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($item === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $item;
    }

    public function haveSubcategories($args) {
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $table = DBUtil::getTables();
        $c = $table['IWdocmanager_categories_column'];

        $where = "$c[parentId]=$args[parentId]";

        $number = DBUtil::selectObjectCount('IWdocmanager_categories', $where);

        return $number;
    }

    public function createDoc($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // check if user can access to this category
        $canAccess = ModUtil::func($this->name, 'user', 'canAccessCategory', array('categoryId' => $categoryId,
                    'accessType' => 'add',
                ));
        if (!$canAccess) {
            return LogUtil::registerError($this->__('You can not add documents to this category'));
        }

        $validated = (SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADD)) ? 1 : 0;

        $item = array('documentName' => $args['documentName'],
            'categoryId' => $args['categoryId'],
            'documentLink' => $args['documentLink'],
            'version' => $args['version'],
            'authorName' => $args['authorName'],
            'description' => $args['description'],
            'validated' => $validated,
            'fileOriginalName' => $args['fileOriginalName'],
            'versionFrom' => $args['versionFrom'],
        );

        if (!DBUtil::insertObject($item, 'IWdocmanager', 'documentId')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Return the id of the newly created item to the calling process
        return $item['documentId'];
    }

    public function updateDoc($args) {

        // get document
        $document = ModUtil::apiFunc($this->name, 'user', 'getDocument', array('documentId' => $args['documentId']));
        if (!$document) {
            return LogUtil::registerError($this->__('Document not found.'));
        }

        // the documents only can be edited by people with EDIT_ACCESS to the module or by creators during the time defined in the module configuration
        if (!SecurityUtil::checkPermission('IWdocmanager::', "$document[categoryId]::", ACCESS_EDIT) && ($document['validated'] == 1 || UserUtil::getVar('uid') != $document['cr_uid'] || DateUtil::makeTimestamp($document['cr_date']) + $this->getVar('editTime') * 30 < time())) {
            return LogUtil::registerPermissionError();
        }

        $table = DBUtil::getTables();
        $c = $table['IWdocmanager_column'];

        $where = "$c[documentId] = $args[documentId]";

        if (!DBUtil::updateObject($args['item'], 'IWdocmanager', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return true;
    }

    public function getAllDocuments($args) {
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $categoriesString = '';
        $uid = (UserUtil::isLoggedIn()) ? UserUtil::getVar('uid') : -1;

        $table = DBUtil::getTables();
        $c = $table['IWdocmanager_column'];

        foreach ($args['categories'] as $category) {
            $categoriesString .= "$c[categoryId] = $category OR ";
        }

        $categoriesString = substr($categoriesString, 0, -4);

        $editor = (SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_EDIT)) ? " OR 1=1" : '';

        $where = ($categoriesString != '') ? '(' . $categoriesString . ") AND ($c[validated] = 1 OR $c[cr_uid]=$uid $editor) AND $c[versioned] <= 0" : "($c[validated] = 1 OR $c[cr_uid] = $uid $editor) AND $c[versioned] <= 0";

        $orderby = '';

        $items = DBUtil::selectObjectArray('IWdocmanager', $where, $orderby, '-1', '-1', 'documentId');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    public function countDocuments($args) {
        $table = DBUtil::getTables();
        $c = $table['IWdocmanager_column'];

        $where = "$c[categoryId] = $args[categoryId] AND $c[validated] = 1 AND $c[versioned] <= 0";
        $number = DBUtil::selectObjectCount('IWdocmanager', $where);

        $where = "$c[categoryId] = $args[categoryId] AND $c[validated] = 0 AND $c[versioned] <= 0";
        $number1 = DBUtil::selectObjectCount('IWdocmanager', $where);

        $c = $table['IWdocmanager_categories_column'];

        $where = "$c[categoryId] = $args[categoryId]";

        $item = array('nDocuments' => $number,
            'nDocumentsNV' => $number1
        );

        DBUtil::updateObject($item, 'IWdocmanager_categories', $where);

        return true;
    }

    public function setFileName($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        $table = DBUtil::getTables();
        $c = $table['IWdocmanager_column'];

        $uid = UserUtil::getVar('uid');

        $validated = (SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADD)) ? 1 : 0;

        $where = "$c[documentId] = $args[documentId] AND $c[cr_uid] = $uid AND $c[validated] = $validated";

        $item = array('fileName' => $args['fileName']);

        if (!DBUtil::updateObject($item, 'IWdocmanager', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    public function setAsVersioned($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        $table = DBUtil::getTables();
        $c = $table['IWdocmanager_column'];

        $uid = UserUtil::getVar('uid');

        $where = "$c[documentId] = $args[documentId]";

        // if the versions of the document is not validated set the versioned field in negative
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADD))
            $args['versioned'] = $args['versioned'] * -1;

        $item = array('versioned' => $args['versioned']);

        if (!DBUtil::updateObject($item, 'IWdocmanager', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    public function getDocument($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if (!isset($args['documentId']) || !is_numeric($args['documentId'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = DBUtil::selectObjectByID('IWdocmanager', $args['documentId'], 'documentId');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($item === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // check that user can access the category of the document
        if (!ModUtil::func($this->name, 'user', 'canAccessCategory', array('categoryId' => $item['categoryId'],
                    'accessType' => 'read',
                ))) {
            return false;
        }

        // check that the document is active
        if ($item['validated'] != 1 && !SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_EDIT) && ($item['cr_uid'] != UserUtil::getVar('uid'))) {
            return false;
        }

        // Return the items
        return $item;
    }

    public function countClick($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $document = ModUtil::apiFunc($this->name, 'user', 'getDocument', array('documentId' => $args['documentId']));

        // check if user can access to this category
        $canAccess = ModUtil::func($this->name, 'user', 'canAccessCategory', array('categoryId' => $document['categoryId'],
                    'accessType' => 'read',
                ));
        if (!$canAccess) {
            return LogUtil::registerError($this->__('You can not add documents to this category'));
        }

        $table = DBUtil::getTables();
        $c = $table['IWdocmanager_column'];

        $where = "$c[documentId] = $args[documentId]";

        $item = array('nClicks' => $document['nClicks'] + 1);

        if (!DBUtil::updateObject($item, 'IWdocmanager', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    public function validateDocument($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_EDIT)) {
            return LogUtil::registerPermissionError();
        }

        $table = DBUtil::getTables();
        $c = $table['IWdocmanager_column'];

        $where = "$c[documentId] = $args[documentId]";

        $item = array('validated' => 1);

        if (!DBUtil::updateObject($item, 'IWdocmanager', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        $negative = $args['documentId'] * -1;

        $where = "$c[versioned] = $negative";

        $item = array('versioned' => $args['documentId']);

        if (!DBUtil::updateObject($item, 'IWdocmanager', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return true;
    }

    public function deleteDocument($args) {
        // get document
        $document = ModUtil::apiFunc($this->name, 'user', 'getDocument', array('documentId' => $args['documentId']));
        if (!$document) {
            return LogUtil::registerError($this->__('Document not found.'));
        }

        // the documents only can be deleted by people with DELETE_ACCESS to the module or by creators during the time defined in the module configuration
        if (!SecurityUtil::checkPermission('IWdocmanager::', "$document[categoryId]::", ACCESS_DELETE) && ($document['validated'] == 1 || UserUtil::getVar('uid') != $document['cr_uid'] || DateUtil::makeTimestamp($document['cr_date']) + $this->getVar('deleteTime') * 30 < time())) {
            return LogUtil::registerPermissionError();
        }

        if (!DBUtil::deleteObjectByID('IWdocmanager', $args['documentId'], 'documentId')) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    public function getDocumentVersions($args) {
        // get document
        $document = ModUtil::apiFunc($this->name, 'user', 'getDocument', array('documentId' => $args['documentId']));
        if (!$document) {
            return LogUtil::registerError($this->__('Document not found.'));
        }

        // check if user can access to this category
        $canAccess = ModUtil::func($this->name, 'user', 'canAccessCategory', array('categoryId' => $document['categoryId'],
                    'accessType' => 'read',
                ));
        if (!$canAccess) {
            return LogUtil::registerError($this->__('You can not add documents to this category'));
        }

        $versionsIds = explode('$$', substr($document['versionFrom'], 1, -1));

        $table = DBUtil::getTables();
        $c = $table['IWdocmanager_column'];

        $where = '';
        foreach ($versionsIds as $id) {
            $where .= "$c[documentId]=$id OR ";
        }

        $where = substr($where, 0, strlen($where) - 4);

        $uid = (UserUtil::isLoggedIn()) ? UserUtil::getVar('uid') : -1;

        $editor = (SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_EDIT)) ? " OR 1=1" : '';

        $where = '(' . $where . ") AND ($c[validated] = 1 OR $c[cr_uid]=$uid $editor)";

        $orderby = "$c[documentId]";

        $items = DBUtil::selectObjectArray('IWdocmanager', $where, $orderby, '-1', '-1', 'documentId');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        return $items;
    }

}