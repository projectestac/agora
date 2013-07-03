<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnadmin.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */
class IWdocmanager_Controller_User extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * Give access to the administrator main page
     * @author:    Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:    The form for general configuration values of the Intraweb modules
     */
    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs'));
    }

    public function viewDocs($args) {
        $categoryId = FormUtil::getPassedValue('categoryId', isset($args['categoryId']) ? $args['categoryId'] : 0, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $directoriroot = ModUtil::getVar('IWmain', 'documentRoot');
        $documentsFolder = $this->getVar('documentsFolder');

        $categories = ModUtil::Func($this->name, 'user', 'getUserCategories', array('accessType' => 'read'));

        if ($categoryId > 0) {
            $documentsContent = ModUtil::func($this->name, 'user', 'getDocumentsContent', array('categoryId' => $categoryId));
        } else {
            $documentsContent = '';
        }

        return $this->view->assign('documentsContent', $documentsContent)
                        ->assign('categories', $categories)
                        ->assign('categoryId', $categoryId)
                        ->fetch('IWdocmanager_user_viewDocs.tpl');
    }

    public function getDocumentsContent($args) {
        $categoryId = FormUtil::getPassedValue('categoryId', isset($args['categoryId']) ? $args['categoryId'] : 0, 'POST');

        // check if user can access to this category
        $canAccess = ModUtil::func($this->name, 'user', 'canAccessCategory', array('categoryId' => $categoryId,
                    'accessType' => 'read',
                ));
        if (!$canAccess) {
            LogUtil::registerError($this->__('You can not add documents to this category'));
            return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs'));
        }
        // check if user can access to this category
        $canAdd = ModUtil::func($this->name, 'user', 'canAccessCategory', array('categoryId' => $categoryId,
                    'accessType' => 'add'));

        $categoriesArray = ($categoryId > 0) ? array($categoryId) : array();

        $documents = ModUtil::apiFunc($this->name, 'user', 'getAllDocuments', array('categories' => $categoriesArray));

        $usersList = '';
        $users = array();
        $canEdit = false;
        $canDelete = false;

        $canEditCategory = (SecurityUtil::checkPermission('IWdocmanager::', "$categoryId::", ACCESS_EDIT)) ? true : false;
        $canDeleteCategory = (SecurityUtil::checkPermission('IWdocmanager::', "$categoryId::", ACCESS_DELETE)) ? true : false;

        foreach ($documents as $document) {
            $extensionIcon['icon'] = '';
            if ($document['fileName'] != '') {
                $extension = FileUtil::getExtension($document['fileName']);
                $extensionIcon = ($extension != '') ? ModUtil::func('IWmain', 'user', 'getMimetype', array('extension' => $extension)) : '';
            }
            $documents[$document['documentId']]['extension'] = $extensionIcon['icon'];
            if ($document['authorName'] == '') {
                $usersList .= $document['cr_uid'] . '$$';
            }
            $documents[$document['documentId']]['canEdit'] = false;
            $documents[$document['documentId']]['canDelete'] = false;
            if ($canEditCategory || ($document['validated'] == 0 && UserUtil::getVar('uid') == $document['cr_uid'] && DateUtil::makeTimestamp($document['cr_date']) + $this->getVar('editTime') * 30 > time())) {
                $documents[$document['documentId']]['canEdit'] = true;
                $canEdit = true; // in order to show edit icon in legend
            }

            if ($canDeleteCategory || ($document['validated'] == 0 && UserUtil::getVar('uid') == $document['cr_uid'] && DateUtil::makeTimestamp($document['cr_date']) + $this->getVar('deleteTime') * 30 > time())) {
                $documents[$document['documentId']]['canDelete'] = true;
                $canDelete = true; // in order to show delete icon in legend
            }

            $documents[$document['documentId']]['filesize'] = ModUtil::func($this->name, 'user', 'getReadableFileSize', array('filesize' => $document['filesize']));
        }

        if ($usersList != '') {
            // get all users information
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv,
                        'info' => 'ncc',
                        'list' => $usersList));
        }

        return $this->view->assign('documents', $documents)
                        ->assign('canAdd', $canAdd)
                        ->assign('users', $users)
                        ->assign('canEdit', $canEdit)
                        ->assign('canDelete', $canDelete)
                        ->fetch('IWdocmanager_user_viewDocsContent.tpl');
    }

    public function newDoc($args) {
        $categoryId = FormUtil::getPassedValue('categoryId', isset($args['categoryId']) ? $args['categoryId'] : 0, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $document = array('documentId' => 0,
            'newVersion' => 0,
            'documentName' => '',
            'description' => '',
            'version' => '',
            'authorName' => '',
            'documentLink' => '',
        );

        $categories = ModUtil::Func($this->name, 'user', 'getUserCategories', array('accessType' => 'add'));

        $extensions = str_replace('|', ', ', ModUtil::getVar('IWmain', 'extensions'));

        return $this->view->assign('document', $document)
                        ->assign('function', 'createDoc')
                        ->assign('extensions', $extensions)
                        ->assign('categories', $categories)
                        ->assign('categoryId', $categoryId)
                        ->assign('newVersion', 0)
                        ->fetch('IWdocmanager_user_addEditDoc.tpl');
    }

    public function getUserCategories($args) {
        $parentId = FormUtil::getPassedValue('parentId', isset($args['parentId']) ? $args['parentId'] : 0, 'POST');
        $desc = FormUtil::getPassedValue('desc', isset($args['desc']) ? $args['desc'] : '', 'POST');
        $descLinks = FormUtil::getPassedValue('descLinks', isset($args['descLinks']) ? $args['descLinks'] : '', 'POST');
        $level = FormUtil::getPassedValue('level', isset($args['level']) ? $args['level'] : 0, 'POST');
        $accessType = FormUtil::getPassedValue('accessType', isset($args['accessType']) ? $args['accessType'] : 'read', 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $userGroupsArray = array();

        $uid = UserUtil::getVar('uid');

        //get all the groups of the user
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userGroups = ModUtil::func('IWmain', 'user', 'getAllUserGroups', array('uid' => $uid,
                    'sv' => $sv));

        if ($userGroups) {
            foreach ($userGroups as $group) {
                $userGroupsArray[] = $group['id'];
            }
        }

        $categoryData = array();
        $categories = ModUtil::apiFunc($this->name, 'user', 'getAllCategories', array('parentId' => $parentId));

        foreach ($categories as $category) {

            $groups = ($accessType == 'read') ? unserialize($category['groups']) : unserialize($category['groupsAdd']);

            if ((count(array_intersect($userGroupsArray, $groups)) > 0) || (UserUtil::isLoggedIn() && in_array(0, $groups)) || (in_array(-1, $groups) && !UserUtil::isLoggedIn()) || SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_EDIT)) {
                $categoryData[$category['categoryId']] = array('categoryId' => $category['categoryId'],
                    'categoryPath' => $desc . $category['categoryName'],
                    'categoryPathLinks' => $descLinks . $category['categoryName'],
                    'categoryName' => $category['categoryName'],
                    'padding' => $level * 20 . 'px',
                    'description' => $category['description'],
                    'nDocuments' => $category['nDocuments'],
                    'nDocumentsNV' => $category['nDocumentsNV'],
                );

                // Add the options
                $categoryinitData = ModUtil::func($this->name, 'user', 'getUserCategories', array('parentId' => $category['categoryId'],
                            'desc' => $desc . $category['categoryName'] . '/',
                            'descLinks' => $descLinks . '<a href="' . ModUtil::url($this->name, 'user', 'viewDocs', array('categoryId' => $category['categoryId'])) . '">' . $category['categoryName'] . '</a> / ',
                            'level' => $level + 1,
                            'accessType' => $accessType,
                        ));

                if (!empty($categoryinitData)) { // If the menu has items, save them
                    foreach ($categoryinitData as $item) // This foreach converts an n-dimension array in a 1-dimension array, suitable for the template
                        $categoryData[$item['categoryId']] = $item;
                }
            }
        }

        return $categoryData;
    }

    public function createDoc($args) {
        $documentName = FormUtil::getPassedValue('documentName', isset($args['documentName']) ? $args['documentName'] : null, 'POST');
        $categoryId = FormUtil::getPassedValue('categoryId', isset($args['categoryId']) ? $args['categoryId'] : 0, 'POST');
        $documentFile = FormUtil::getPassedValue('documentFile', isset($args['documentFile']) ? $args['documentFile'] : null, 'FILES');
        $documentLink = FormUtil::getPassedValue('documentLink', isset($args['documentLink']) ? $args['documentLink'] : null, 'POST');
        $version = FormUtil::getPassedValue('version', isset($args['version']) ? $args['version'] : null, 'POST');
        $authorName = FormUtil::getPassedValue('authorName', isset($args['authorName']) ? $args['authorName'] : null, 'POST');
        $description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
        $documentId = FormUtil::getPassedValue('documentId', isset($args['documentId']) ? $args['documentId'] : 0, 'POST'); // in case it is a new version
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        // check if user can access to this category
        $canAccess = ModUtil::func($this->name, 'user', 'canAccessCategory', array('categoryId' => $categoryId,
                    'accessType' => 'add'));
        if (!$canAccess) {
            LogUtil::registerError($this->__('You can not add documents to this category'));
            return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs'));
        }

        $versionFrom = '';
        $filesize = '';

        if ($documentId > 0) {
            // get document
            $document = ModUtil::apiFunc($this->name, 'user', 'getDocument', array('documentId' => $documentId));
            if (!$document) {
                return LogUtil::registerError($this->__('Document not found.'));
            }
            $versionFrom = $document['versionFrom'] . '$' . $documentId . '$';
            // protectionn. Only validated and not versioned documents can be versioned
            if ($document['validated'] == 0 || $document['versioned'] > 0) {
                LogUtil::registerError($this->__('It is not possible to create a version of this document.'));
                return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs', array('categoryId' => $document['categoryId'])));
            }
        }

        if ($documentFile['name'] != '') {
            // check if the document have the correct extension
            $allowedExtensionsText = ModUtil::getVar('IWmain', 'extensions');
            $allowed_extensions = explode('|', $allowedExtensionsText);
            $extension = FileUtil::getExtension($documentFile['name']);
            if (!in_array($extension, $allowed_extensions)) {
                LogUtil::registerError($this->__('The document have not the correct extension.'));
                return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs'));
            }
            $documentLink = '';
            $filesize = $documentFile['size'];
        }

        $documentLink = (substr($documentLink, 0, 4) != 'http' && $documentLink != '') ? 'http://' . $documentLink : $documentLink;

        $created = ModUtil::apiFunc($this->name, 'user', 'createDoc', array('documentName' => $documentName,
                    'categoryId' => $categoryId,
                    'documentLink' => $documentLink,
                    'version' => $version,
                    'authorName' => $authorName,
                    'description' => $description,
                    'fileOriginalName' => DataUtil::formatPermalink(str_replace('.' . $extension, '', $documentFile['name'])) . '.' . $extension, // remove extension before formatPermalink and then at it again
                    'versionFrom' => $versionFrom,
                    'filesize' => $filesize,
                ));

        if (!$created) {
            LogUtil::registerError($this->__('Error: uploading document'));
            return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs'));
        }

        // update the attached file to the server
        if ($documentFile['name'] != '') {
            $folder = $this->getVar('documentsFolder');
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $update = ModUtil::func('IWmain', 'user', 'updateFile', array('sv' => $sv,
                        'folder' => $folder,
                        'file' => $documentFile,
                        'fileName' => $created . '.' . $extension,
                    ));
            // the function returns the error string if the update fails and and empty string if success
            if ($update['msg'] != '') {
                LogUtil::registerError($update['msg'] . ' ' . $this->__('An error has occurred in the attachment of the file. The document not has been send.'));
            } else {
                // set document name in data base
                ModUtil::apiFunc($this->name, 'user', 'setFileName', array('documentId' => $created,
                    'fileName' => $created . '.' . $extension,
                ));
            }
        }

        // set original document as versioned only if the document is set as validated (ACCESS_ADD permissions)
        if ($documentId > 0) {
            ModUtil::apiFunc($this->name, 'user', 'setAsVersioned', array('documentId' => $documentId,
                'versioned' => $created,
            ));
        }

        // upload the number of documents in category
        ModUtil::apiFunc($this->name, 'user', 'countDocuments', array('categoryId' => $categoryId));

        $returnMsg = $this->__('The document has been uploaded successfuly');

        $returnMsg .= (SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADD)) ? "." : $this->__(' and it is pending of validation');

        LogUtil::registerStatus($returnMsg);

        // informs via email about the document creation
        if ($this->getVar('notifyMail') != '') {
            $subject = $this->__f('A new document has been created by %s', UserUtil::getVar('uname'));
            $body = $this->__f('A new document <strong>%1$s</strong> has been received. It has been created by %2$s. Please check the documents list and proceed to validate it, if necessary.', array($documentName, UserUtil::getVar('uname')));
            $sendMessageArgs = array(
                'fromname' => UserUtil::getVar('uname'),
                'fromaddress' => UserUtil::getVar('email'),
                'toname' => 'IWdocmanager',
                'toaddress' => $this->getVar('notifyMail'),
                'replytoname' => 'noReply',
                'replytoaddress' => 'no-reply@server.dom',
                'subject' => $subject,
                'body' => $body,
            );
        }

        return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs', array('categoryId' => $categoryId)));
    }

    public function editDocument($args) {
        $documentId = FormUtil::getPassedValue('documentId', isset($args['documentId']) ? $args['documentId'] : 0, 'GET');
        $newVersion = FormUtil::getPassedValue('newVersion', isset($args['newVersion']) ? $args['newVersion'] : 0, 'GET');

        // get document
        $document = ModUtil::apiFunc($this->name, 'user', 'getDocument', array('documentId' => $documentId));
        if (!$document) {
            return LogUtil::registerError($this->__('Document not found.'));
        }

        if ($newVersion == 0) {
            // the documents only can be edited by people with EDIT_ACCESS to the module or by creators during the time defined in the module configuration
            if (!SecurityUtil::checkPermission('IWdocmanager::', "$document[categoryId]::", ACCESS_EDIT) && ($document['validated'] == 1 || UserUtil::getVar('uid') != $document['cr_uid'] || DateUtil::makeTimestamp($document['cr_date']) + $this->getVar('editTime') * 30 < time())) {
                return LogUtil::registerPermissionError();
            }
        } else {
            // check if user can access to this category
            $canAccess = ModUtil::func($this->name, 'user', 'canAccessCategory', array('categoryId' => $document['categoryId'],
                        'accessType' => 'add'));
            if (!$canAccess) {
                LogUtil::registerError($this->__('You can not add documents to this category'));
                return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs'));
            }

            // protectionn. Only validated and not versioned documents can be versioned
            if ($document['validated'] == 0 || $document['versioned'] > 0) {
                LogUtil::registerError($this->__('It is not possible to create a version of this document.'));
                return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs'));
            }
        }

        $categories = ModUtil::Func($this->name, 'user', 'getUserCategories', array('accessType' => 'add'));

        $extensions = str_replace('|', ', ', ModUtil::getVar('IWmain', 'extensions'));

        $function = ($newVersion) ? 'createDoc' : 'updateDoc';

        return $this->view->assign('document', $document)
                        ->assign('function', $function)
                        ->assign('extensions', $extensions)
                        ->assign('categories', $categories)
                        ->assign('categoryId', $document['categoryId'])
                        ->assign('newVersion', $newVersion)
                        ->fetch('IWdocmanager_user_addEditDoc.tpl');
    }

    public function updateDoc($args) {
        $documentId = FormUtil::getPassedValue('documentId', isset($args['documentId']) ? $args['documentId'] : 0, 'POST');
        $documentName = FormUtil::getPassedValue('documentName', isset($args['documentName']) ? $args['documentName'] : null, 'POST');
        $categoryId = FormUtil::getPassedValue('categoryId', isset($args['categoryId']) ? $args['categoryId'] : 0, 'POST');
        $documentLink = FormUtil::getPassedValue('documentLink', isset($args['documentLink']) ? $args['documentLink'] : null, 'POST');
        $version = FormUtil::getPassedValue('version', isset($args['version']) ? $args['version'] : null, 'POST');
        $authorName = FormUtil::getPassedValue('authorName', isset($args['authorName']) ? $args['authorName'] : null, 'POST');
        $description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
        $newVersion = FormUtil::getPassedValue('newVersion', isset($args['newVersion']) ? $args['newVersion'] : 0, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        // get document
        $document = ModUtil::apiFunc($this->name, 'user', 'getDocument', array('documentId' => $documentId));
        if (!$document) {
            LogUtil::registerError($this->__('Document not found.'));
            return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs'));
        }

        // the documents only can be edited by people with EDIT_ACCESS to the module or by creators during the time defined in the module configuration
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_EDIT) && ($document['validated'] == 1 || UserUtil::getVar('uid') != $document['cr_uid'] || DateUtil::makeTimestamp($document['cr_date']) + $this->getVar('editTime') * 30 < time())) {
            return LogUtil::registerPermissionError();
        }

        $edited = ModUtil::apiFunc($this->name, 'user', 'updateDoc', array('documentId' => $documentId,
                    'item' => array('documentName' => $documentName,
                        'categoryId' => $categoryId,
                        'documentLink' => $documentLink,
                        'version' => $version,
                        'authorName' => $authorName,
                        'description' => $description,
                        )));

        if (!$edited) {
            LogUtil::registerError($this->__('Error: editing document'));
            return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs', array('categoryId' => $categoryId)));
        }

        LogUtil::registerStatus($this->__('The document has been edited successfully'));

        return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs', array('categoryId' => $categoryId)));
    }

    public function canAccessCategory($args) {
        $categoryId = FormUtil::getPassedValue('categoryId', isset($args['categoryId']) ? $args['categoryId'] : 0, 'POST');
        $accessType = FormUtil::getPassedValue('accessType', isset($args['accessType']) ? $args['accessType'] : 'read', 'POST');

        $userCategories = ModUtil::func($this->name, 'user', 'getUserCategories', array('accessType' => $accessType));

        if (array_key_exists($categoryId, $userCategories)) {
            return true;
        }

        return false;
    }

    public function downloadDocument($args) {
        $documentId = FormUtil::getPassedValue('documentId', isset($args['documentId']) ? $args['documentId'] : 0, 'GET');

        // get document
        $document = ModUtil::apiFunc($this->name, 'user', 'getDocument', array('documentId' => $documentId));
        if (!$document) {
            return LogUtil::registerError($this->__('Document not found.'));
        }

        // check if user can access to this category
        $canAccess = ModUtil::func($this->name, 'user', 'canAccessCategory', array('categoryId' => $document['categoryId'],
                    'accessType' => 'read',
                ));

        if (!$canAccess) {
            return LogUtil::registerError($this->__('You can not access to this document.'));
        }

        // download the document
        $documentPath = ModUtil::getVar('IWmain', 'documentRoot') . '/' . $this->getVar('documentsFolder') . '/' . $document['fileName'];
        if (!file_exists($documentPath)) {
            return LogUtil::registerError($this->__('Document not found.'));
        }

        // get file size
        $fileSize = filesize($documentPath);

        // Get file extension
        $fileExtension = FileUtil::getExtension($documentPath);

        $ctypeArray = ModUtil::func('IWmain', 'user', 'getMimetype', array('extension' => $fileExtension));
        $ctype = $ctypeArray['type'];

        //Begin writing headers
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        //Use the switch-generated Content-Type
        header("Content-Type: $ctype");
        //Force the download
        $header = "Content-Disposition: attachment; filename=" . $document['fileOriginalName'] . ";";
        header($header);
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . $fileSize);
        @readfile($documentPath);

        // count click on document record
        ModUtil::apiFunc($this->name, 'user', 'countClick', array('documentId' => $documentId));

        return true;
    }

    public function viewDocumentVersions($args) {
        $documentId = FormUtil::getPassedValue('documentId', isset($args['documentId']) ? $args['documentId'] : 0, 'GET');

        // get document
        $documentOrigin = ModUtil::apiFunc($this->name, 'user', 'getDocument', array('documentId' => $documentId));
        if (!$documentOrigin) {
            LogUtil::registerError($this->__('Document not found.'));
            return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs'));
        }

        $documentOrigin['extension'] = FileUtil::getExtension($documentOrigin['fileName']);
        $documentOrigin['filesize'] = ModUtil::func($this->name, 'user', 'getReadableFileSize', array('filesize' => $documentOrigin['filesize']));

        $categoryId = $documentOrigin['categoryId'];

        // check if user can access to this category
        $canAccess = ModUtil::func($this->name, 'user', 'canAccessCategory', array('categoryId' => $categoryId,
                    'accessType' => 'read',
                ));

        if (!$canAccess) {
            LogUtil::registerError($this->__('You can not access to this document.'));
            return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs'));
        }

        // versions
        $documents = ModUtil::apiFunc($this->name, 'user', 'getDocumentVersions', array('documentId' => $documentId));

        if (!$documents) {
            LogUtil::registerError($this->__('This document have not versions.'));
            return System::redirect(ModUtil::url($this->name, 'user', 'viewDocs', array('categoryId' => $categoryId)));
        }

        $usersList = $documentOrigin['cr_uid'] . '$$';
        $users = array();
        $canEdit = false;
        $canDelete = false;
        $canAdd = false;

        $canEditCategory = (SecurityUtil::checkPermission('IWdocmanager::', "$categoryId::", ACCESS_EDIT)) ? true : false;
        $canDeleteCategory = (SecurityUtil::checkPermission('IWdocmanager::', "$categoryId::", ACCESS_DELETE)) ? true : false;

        foreach ($documents as $document) {
            $extensionIcon['icon'] = '';
            if ($document['fileName'] != '') {
                $extension = FileUtil::getExtension($document['fileName']);
                $extensionIcon = ($extension != '') ? ModUtil::func('IWmain', 'user', 'getMimetype', array('extension' => $extension)) : '';
            }
            $documents[$document['documentId']]['extension'] = $extensionIcon['icon'];
            if ($document['authorName'] == '') {
                $usersList .= $document['cr_uid'] . '$$';
            }
            $documents[$document['documentId']]['canEdit'] = false;
            $documents[$document['documentId']]['canDelete'] = false;
            if ($canEditCategory || ($document['validated'] == 0 && UserUtil::getVar('uid') == $document['cr_uid'] && DateUtil::makeTimestamp($document['cr_date']) + $this->getVar('editTime') * 30 > time())) {
                $documents[$document['documentId']]['canEdit'] = true;
                $canEdit = true; // in order to show edit icon in legend
            }

            if ($canDeleteCategory || ($document['validated'] == 0 && UserUtil::getVar('uid') == $document['cr_uid'] && DateUtil::makeTimestamp($document['cr_date']) + $this->getVar('deleteTime') * 30 > time())) {
                $documents[$document['documentId']]['canDelete'] = true;
                $canDelete = true; // in order to show delete icon in legend
            }

            $documents[$document['documentId']]['filesize'] = ModUtil::func($this->name, 'user', 'getReadableFileSize', array('filesize' => $document['filesize']));
        }

        if ($usersList != '') {
            // get all users information
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv,
                        'info' => 'ncc',
                        'list' => $usersList));
        }

        return $this->view->assign('documentOrigin', $documentOrigin)
                        ->assign('documents', $documents)
                        ->assign('canAdd', $canAdd)
                        ->assign('users', $users)
                        ->assign('canEdit', $canEdit)
                        ->assign('canDelete', $canDelete)
                        ->assign('versionsVision', 1)
                        ->fetch('IWdocmanager_user_viewDocumentVersions.tpl');
    }

    public function getReadableFileSize($args) {
        $filesize = FormUtil::getPassedValue('filesize', isset($args['filesize']) ? $args['filesize'] : '', 'GET');
        if ($filesize != '') {
            if ($filesize > 1024) {
                $bytes = round($filesize / 1024, 2) . ' Kb';
            } elseif ($filesize > 1024 * 1024) {
                $bytes = round($filesize / 1024 / 1024, 2) . ' Mb';
            } else {
                $bytes = $filesize . ' b';
            }
        } else {
            $bytes = '---';
        }
        return $bytes;
    }

}