<?php
/**
 * Copyright Pages Team 2012
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package Pages
 * @link https://github.com/zikula-modules/Pages
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * This class provides a handler to modify or create a page.
 */
class Pages_Handler_Modify extends Zikula_Form_AbstractHandler
{
    /**
     * Page.
     *
     * When set this handler is in edit mode.
     *
     * @var Pages_ContentType_Page
     */
    private $_page;

    /**
     * Initialise the form handler
     *
     * @param Zikula_Form_View $view Reference to Form render object.
     *
     * @return boolean
     *
     * @throws Zikula_Exception_Forbidden If the current user does not have adequate permissions to perform this function.
     */
    function initialize(Zikula_Form_View $view)
    {
        $pageid   = FormUtil::getPassedValue('pageid', isset($args['pageid']) ? $args['pageid'] : null, 'GET');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
        // At this stage we check to see if we have been passed $objectid
        if (!empty($objectid)) {
            $pageid = $objectid;
        }

        // Get the page
        $this->_page = new Pages_ContentType_Page();
        if (empty($pageid)) {
            $this->_page->create();
        } else {
            $this->_page->find(array('pageid' => $pageid));
        }
        $item = $this->_page->toArray();
        if ($item === false) {
            return LogUtil::registerError($this->__('No such page found.'), 404);
        }

        if (!SecurityUtil::checkPermission('Pages::', $item['title'] . '::' . $pageid, ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden(LogUtil::getErrorMsgPermission());
        }

        if ($this->getVar('enablecategorization', true)) {
            // load and assign registred categories
            $categories  = CategoryRegistryUtil::getRegisteredModuleCategories('Pages', 'Pages', 'id');
            $view->assign('registries', $categories);
        }

        // assign the item to the template
        $view->assign($item);
        $view->assign('page', $this->_page->get());


        // now we've got this far let's lock the page for editing
        $params = array(
            'lockName' => "Pagespage{$pageid}",
            'returnUrl' => ModUtil::url('Pages', 'admin', 'view')
        );
        ModUtil::apiFunc('PageLock', 'user', 'pageLock', $params);

        return true;
    }

    /**
     * Handle form submission.
     *
     * @param Zikula_Form_View $view  Reference to Form render object.
     * @param array            &$args Arguments of the command.
     *
     * @return boolean|void
     */
    function handleCommand(Zikula_Form_View $view, &$args)
    {
        if ($args['commandName'] == 'cancel') {
            $url = ModUtil::url($this->name, 'admin', 'view');
            return $view->redirect($url);
        } else if ($args['commandName'] == 'remove') {
            $this->_page->remove();
            $url = ModUtil::url($this->name, 'admin', 'view');
            return $view->redirect($url);
        }

        // check for valid form
        if (!$view->isValid()) {
            return LogUtil::registerError('Validation failed!');
        }

        // load form values
        $data = $view->getValues();

        $data['pageid'] = $this->_page->getid();
        $ok = $this->_page->set($data);
        if (!$ok) {
            return LogUtil::registerError('Page save failed!');
        }
        $data['pageid'] = $this->_page->getid(); //this line is needed for new pages

        $validators = $this->notifyHooks(
            new Zikula_ValidationHook('pages.ui_hooks.pages.validate_edit', new Zikula_Hook_ValidationProviders())
        )->getValidators();
        if ($validators->hasErrors()) {
            return LogUtil::registerError('Hook validation failed!');
        }

        // Success
        LogUtil::registerStatus($this->__('Done! Page updated.'));
        $url = new Zikula_ModUrl(
            'Pages',
            'user',
            'display',
            ZLanguage::getLanguageCode(),
            array('pageid' => $data['pageid'])
        );
        $this->notifyHooks(new Zikula_ProcessHook('pages.ui_hooks.pages.process_edit', $data['pageid'], $url));


        // now release the page lock
        ModUtil::apiFunc('PageLock', 'user', 'releaseLock', array('lockName' => "Pagespage{$data['pageid']}"));

        $returnUrl = ModUtil::url('Pages', 'user', 'display', array('pageid' => $data['pageid']));

        return System::redirect($returnUrl);
    }

}
