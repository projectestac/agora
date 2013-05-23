<?php

class IWdocmanager_Controller_Ajax extends Zikula_Controller_AbstractAjax {

    public function addCategory($args) {
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $categoryId = $this->request->getPost()->get('categoryId', '');
        if (!$categoryId) {
            throw new Zikula_Exception_Fatal($this->__('no category id'));
        }

        $content = ModUtil::func($this->name, 'admin', 'addCategory', array('categoryId' => $categoryId));

        return new Zikula_Response_Ajax(array('categoryId' => $categoryId,
                    'content' => $content,
                ));
    }

    public function editCategory($args) {
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $categoryId = $this->request->getPost()->get('categoryId', '');
        if (!$categoryId) {
            throw new Zikula_Exception_Fatal($this->__('no category id'));
        }

        $content = ModUtil::func($this->name, 'admin', 'editCategory', array('categoryId' => $categoryId));

        return new Zikula_Response_Ajax(array('categoryId' => $categoryId,
                    'content' => $content,
                ));
    }

    public function deleteCategory($args) {
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $categoryId = $this->request->getPost()->get('categoryId', '');
        if (!$categoryId) {
            throw new Zikula_Exception_Fatal($this->__('no category id'));
        }

        $category = ModUtil::apiFunc($this->name, 'user', 'getCategory', array('categoryId' => $categoryId));

        // checks if the category have subcategories
        $have = ModUtil::apiFunc($this->name, 'user', 'haveSubcategories', array('parentId' => $categoryId));
        if ($have) {
            throw new Zikula_Exception_Fatal($this->__('It is not possible to remove this category because it have subcategories. First you have to delete all the subcategories'));
        }

        $deleted = ModUtil::apiFunc($this->name, 'admin', 'deleteCategory', array('categoryId' => $categoryId));
        if (!$deleted) {
            throw new Zikula_Exception_Fatal($this->__('Error deleting the category'));
        }

        return new Zikula_Response_Ajax(array('categoryId' => $categoryId,
                ));
    }

    public function createCategory($args) {
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $categoryId = $this->request->getPost()->get('categoryId', '');
        if (!$categoryId) {
            throw new Zikula_Exception_Fatal($this->__('no category id'));
        }

        $categoryName = $this->request->getPost()->get('categoryName', '');
        $description = $this->request->getPost()->get('description', '');
        $active = $this->request->getPost()->get('active', '');
        $groups = $this->request->getPost()->get('groups', '');
        $groupsAdd = $this->request->getPost()->get('groupsAdd', '');

        $groupsArray = explode('$$', substr($groups, 1, strlen($groups) - 2));
        $groupsAddArray = explode('$$', substr($groupsAdd, 1, strlen($groupsAdd) - 2));

        $groupsString = serialize($groupsArray);
        $groupsAddString = serialize($groupsAddArray);

        $created = ModUtil::apiFunc($this->name, 'admin', 'createCategory', array('categoryName' => $categoryName,
                    'description' => $description,
                    'groups' => $groupsString,
                    'groupsAdd' => $groupsAddString,
                    'active' => $active,
                    'parent' => $categoryId,
                ));

        if (!$created) {
            throw new Zikula_Exception_Fatal($this->__('Error creating the category'));
        }

        $content = ModUtil::Func($this->name, 'admin', 'viewCategoriesContent');

        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    public function updateCategory($args) {
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $categoryId = $this->request->getPost()->get('categoryId', '');
        if (!$categoryId) {
            throw new Zikula_Exception_Fatal($this->__('no category id'));
        }

        $categoryName = $this->request->getPost()->get('categoryName', '');
        $description = $this->request->getPost()->get('description', '');
        $active = $this->request->getPost()->get('active', '');
        $groups = $this->request->getPost()->get('groups', '');
        $groupsAdd = $this->request->getPost()->get('groupsAdd', '');

        $groupsArray = ($groups != '') ? explode('$$', substr($groups, 1, strlen($groups) - 2)) : array();
        $groupsAddArray = ($groupsAdd != '') ? explode('$$', substr($groupsAdd, 1, strlen($groupsAdd) - 2)) : array();

        $groupsString = serialize($groupsArray);
        $groupsAddString = serialize($groupsAddArray);

        $updated = ModUtil::apiFunc($this->name, 'admin', 'updateCategory', array('categoryId' => $categoryId,
                    'items' => array('categoryName' => $categoryName,
                        'description' => $description,
                        'groups' => $groupsString,
                        'groupsAdd' => $groupsAddString,
                        'active' => $active,
                        )));

        if (!$updated) {
            throw new Zikula_Exception_Fatal($this->__('Error updating the category'));
        }

        $content = ModUtil::Func($this->name, 'admin', 'viewCategoriesContent');

        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    public function openDocumentLink($args) {
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $documentId = $this->request->getPost()->get('documentId', '');
        if (!$documentId) {
            throw new Zikula_Exception_Fatal($this->__('no document id'));
        }

        // get document
        $document = ModUtil::apiFunc($this->name, 'user', 'getDocument', array('documentId' => $documentId));
        if (!$document) {
            throw new Zikula_Exception_Fatal($this->__('Document not found.'));
        }

        // check if user can access to this category
        $canAccess = ModUtil::func($this->name, 'user', 'canAccessCategory', array('categoryId' => $document['categoryId'],
                    'accessType' => 'read',
                ));

        if (!$canAccess) {
            throw new Zikula_Exception_Fatal($this->__('You can not access to this document.'));
        }

        // count click on document record
        ModUtil::apiFunc($this->name, 'user', 'countClick', array('documentId' => $documentId));

        $content = ModUtil::func($this->name, 'user', 'getDocumentsContent', array('categoryId' => $document['categoryId']));

        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    public function validateDocument($args) {
        $documentId = $this->request->getPost()->get('documentId', '');
        if (!$documentId) {
            throw new Zikula_Exception_Fatal($this->__('no document id'));
        }

        // get document
        $document = ModUtil::apiFunc($this->name, 'user', 'getDocument', array('documentId' => $documentId));
        if (!$document) {
            throw new Zikula_Exception_Fatal($this->__('Document not found.'));
        }
        
        if (!SecurityUtil::checkPermission('IWdocmanager::', "$document[categoryId]::", ACCESS_EDIT)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $validated = ModUtil::apiFunc($this->name, 'user', 'validateDocument', array('documentId' => $documentId));
        if (!$validated) {
            throw new Zikula_Exception_Fatal($this->__('Error! Validate document failed.'));
        }

        // upload the number of documents in category
        ModUtil::apiFunc($this->name, 'user', 'countDocuments', array('categoryId' => $document['categoryId']));

        $content = ModUtil::func($this->name, 'user', 'getDocumentsContent', array('categoryId' => $document['categoryId']));

        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    public function openDocument($args) {
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $documentId = $this->request->getPost()->get('documentId', '');
        if (!$documentId) {
            throw new Zikula_Exception_Fatal($this->__('no document id'));
        }

        ModUtil::func($this->name, 'user', 'downloadDocument', array('documentId' => $documentId));

        return new Zikula_Response_Ajax();
    }

    public function deleteDocument($args) {
        $documentId = $this->request->getPost()->get('documentId', '');
        if (!$documentId) {
            throw new Zikula_Exception_Fatal($this->__('no document id'));
        }

        // get document
        $document = ModUtil::apiFunc($this->name, 'user', 'getDocument', array('documentId' => $documentId));
        if (!$document) {
            throw new Zikula_Exception_Fatal($this->__('Document not found.'));
        }

        // the documents only can be deleted by people with EDIT_ACCESS to the module or by creators during the time defined in the module configuration
        if (!SecurityUtil::checkPermission('IWdocmanager::', "$document[categoryId]::", ACCESS_DELETE) && ($document['validated'] == 1 || UserUtil::getVar('uid') != $document['cr_uid'] || DateUtil::makeTimestamp($document['cr_date']) + $this->getVar('deleteTime') * 30 < time())) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $deleted = ModUtil::apiFunc($this->name, 'user', 'deleteDocument', array('documentId' => $documentId));
        if (!$deleted) {
            throw new Zikula_Exception_Fatal($this->__('Error! Delete document failed.'));
        }

        if ($document['fileName'] != '') {
            // download the document
            $documentPath = ModUtil::getVar('IWmain', 'documentRoot') . '/' . $this->getVar('documentsFolder') . '/' . $document['fileName'];
            // delete file form server
            if (file_exists($documentPath)) {
                unlink($documentPath);
            }
        }

        // upload the number of documents in category
        ModUtil::apiFunc($this->name, 'user', 'countDocuments', array('categoryId' => $document['categoryId']));

        $content = ModUtil::func($this->name, 'user', 'getDocumentsContent', array('categoryId' => $document['categoryId']));

        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    public function viewDocumentVersions($args) {
        $documentId = $this->request->getPost()->get('documentId', '');
        if (!$documentId) {
            throw new Zikula_Exception_Fatal($this->__('no document id'));
        }

        // get document
        $document = ModUtil::apiFunc($this->name, 'user', 'getDocument', array('documentId' => $documentId));
        if (!$document) {
            throw new Zikula_Exception_Fatal($this->__('Document not found.'));
        }

        // check if user can access to this category
        $canAccess = ModUtil::func($this->name, 'user', 'canAccessCategory', array('categoryId' => $document['categoryId'],
                    'accessType' => 'read',
                ));

        $content = ModUtil::func($this->name, 'user', 'viewDocumentVersions', array('documentId' => $documentId));

        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    public function viewDocuments($args) {
        $documentId = $this->request->getPost()->get('documentId', '');
        if (!$documentId) {
            throw new Zikula_Exception_Fatal($this->__('no document id'));
        }

        // get document
        $document = ModUtil::apiFunc($this->name, 'user', 'getDocument', array('documentId' => $documentId));
        if (!$document) {
            throw new Zikula_Exception_Fatal($this->__('Document not found.'));
        }

        // check if user can access to this category
        $canAccess = ModUtil::func($this->name, 'user', 'canAccessCategory', array('categoryId' => $document['categoryId'],
                    'accessType' => 'read',
                ));

        $content = ModUtil::func($this->name, 'user', 'getDocumentsContent', array('categoryId' => $document['categoryId']));
        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

}