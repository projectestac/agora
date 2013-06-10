<?php
class Content_Form_Handler_Admin_TranslatePage extends Zikula_Form_AbstractHandler
{
    var $pageId;    // the current page to translate
    var $language;  // the current active language
    var $backref;

    public function initialize(Zikula_Form_View $view)
    {
        $this->pageId = (int) FormUtil::getPassedValue('pid', -1);
        $this->language = ZLanguage::getLanguageCode();

        if (!SecurityUtil::checkPermission('Content:page:', $this->pageId . '::', ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden(LogUtil::getErrorMsgPermission());
        }

        $page = ModUtil::apiFunc('Content', 'Page', 'getPage', array('id' => $this->pageId, 'includeContent' => false, 'filter' => array('checkActive' => false), 'translate' => false));
        if ($page === false) {
            return $this->view->registerError(null);
        }

        // if trying to translate a page into the same language report error and redirect to page list
        if (!strcmp($this->language, $page['language'])) {
            return $this->view->registerError(LogUtil::registerError(
                $this->__f('Sorry, you cannot translate an item to the same language as it\'s default language ("%1$s"). Change the current site language ("%2$s") to some other language on the <a href="%3$s">localisation settings</a> page.<br /> Another way is to add, for instance, <strong>&amp;lang=de</strong> to the url for changing the current site language to German and after that the item can be translated to German.', array($page['language'], $this->language, ModUtil::url('Settings', 'admin', 'multilingual'))),
                null,
                ModUtil::url('Content', 'admin', 'main')));
        }

        PageUtil::setVar('title', $this->__("Translate page") . ' : ' . $page['title']);

        $this->view->assign('page', $page);
        $this->view->assign('translated', $page['translated']);
        $this->view->assign('language', $this->language);
        Content_Util::contentAddAccess($this->view, $this->pageId);

        if (!$this->view->isPostBack() && FormUtil::getPassedValue('back',0)) {
            $this->backref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        }

        if ($this->backref != null) {
            $returnUrl = $this->backref;
        } else {
            $returnUrl = ModUtil::url('Content', 'admin', 'editPage', array('pid' => $this->pageId));
        }
        ModUtil::apiFunc('PageLock', 'user', 'pageLock',
                     array('lockName' => "contentTranslatePage{$this->pageId}",
                           'returnUrl' => $returnUrl));

        return true;
    }

    public function handleCommand(Zikula_Form_View $view, &$args)
    {
        $url = null;

        $translationInfo = ModUtil::apiFunc('Content', 'Content', 'getTranslationInfo', array('pageId' => $this->pageId));
        if ($translationInfo === false) {
            return $this->view->registerError(null);
        }

        if ($args['commandName'] == 'next' || $args['commandName'] == 'quit') {
            if (!$this->view->isValid()) {
                return false;
            }

            $pageData = $this->view->getValues();

            $ok = ModUtil::apiFunc('Content', 'Page', 'updateTranslation',
                               array('translated' => $pageData['translated'],
                                     'pageId' => $this->pageId,
                                     'language' => $this->language));
            if ($ok === false) {
                return $this->view->registerError(null);
            }

            if ($args['commandName'] == 'next' && $translationInfo['nextContentId'] != null) {
                $url = ModUtil::url('Content', 'admin', 'translateContent', array('cid' => $translationInfo['nextContentId']));
            }
        } else if ($args['commandName'] == 'skip') {
            if ($translationInfo['nextContentId'] != null) {
              $url = ModUtil::url('Content', 'admin', 'translateContent', array('cid' => $translationInfo['nextContentId']));
            }
        } else if ($args['commandName'] == 'delete') {
            $ok = ModUtil::apiFunc('Content', 'Page', 'deleteTranslation',
                               array('pageId' => $this->pageId,
                                     'language' => $this->language));
            if ($ok === false) {
                return $this->view->registerError(null);
            }
        }

        if ($url == null) {
            $url = $this->backref;
        }
        if (empty($url)) {
            $url = ModUtil::url('Content', 'admin', 'editPage', array('pid' => $this->pageId));
        }
        ModUtil::apiFunc('PageLock', 'user', 'releaseLock',
                   array('lockName' => "contentTranslatePage{$this->pageId}"));

        return $this->view->redirect($url);
    }
}

