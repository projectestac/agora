<?php
class Content_Form_Handler_Admin_TranslateContent extends Zikula_Form_AbstractHandler
{
    var $contentId;
    var $pageId;
    var $language;
    var $backref;

    public function __construct($args)
    {
        $this->args = $args;
    }

    public function initialize(Zikula_Form_View $view)
    {
        $this->contentId = (int)FormUtil::getPassedValue('cid', isset($this->args['cid']) ? $this->args['cid'] : -1);
        $this->language = ZLanguage::getLanguageCode();

        $content = ModUtil::apiFunc('Content', 'Content', 'getContent',
                                array('id' => $this->contentId,
                                      'language' => $this->language,
                                      'translate' => false));
        if ($content === false) {
            return $this->view->registerError(null);
        }

        $this->contentType = ModUtil::apiFunc('Content', 'Content', 'getContentType', $content);
        if ($this->contentType === false) {
            return $this->view->registerError(null);
        }
        $this->pageId = $content['pageId'];

        if (!SecurityUtil::checkPermission('Content:page:', $this->pageId . '::', ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden(LogUtil::getErrorMsgPermission());
        }

        $page = ModUtil::apiFunc('Content', 'Page', 'getPage',
                             array('id' => $this->pageId,
                                   'includeContent' => false,
                                   'filter' => array('checkActive' => false)));
        if ($page === false) {
            return $this->view->registerError(null);
        }

        if ($this->language == $page['language']) {
            return $this->view->registerError(LogUtil::registerError($this->__f('Sorry, you cannot translate an item to the same language as it\'s default language ("%1$s"). Change the current site language ("%2$s") to some other language on the <a href="%3$s">localisation settings</a> page.<br /> Another way is to add, for instance, <strong>&amp;lang=de</strong> to the url for changing the current site language to German and after that the item can be translated to German.', array($page['language'], $this->language, ModUtil::url('Settings', 'admin', 'multilingual')))));
        }

        $translationInfo = ModUtil::apiFunc('Content', 'Content', 'getTranslationInfo', array('contentId' => $this->contentId));
        if ($translationInfo === false) {
            return $this->view->registerError(null);
        }

        PageUtil::setVar('title', $this->__("Translate content item") . ' : ' . $page['title']);

        $templates = $this->contentType['plugin']->getTranslationTemplates();
        $this->view->assign('translationtemplates', $templates);
        $this->view->assign('page', $page);
        $this->view->assign('data', $content['data']);
        $this->view->assign('isTranslatable', $content['isTranslatable']);
        $this->view->assign('translated', isset($content['translated']) ? $content['translated'] : array());
        $this->view->assign('translationInfo', $translationInfo);
        $this->view->assign('translationStep', $this->contentId);
        $this->view->assign('language', $this->language);
        $this->view->assign('contentType', $this->contentType);
        Content_Util::contentAddAccess($this->view, $this->pageId);

        if (!$this->view->isPostBack() && FormUtil::getPassedValue('back', 0)) {
            $this->backref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        }
        if ($this->backref != null) {
            $returnUrl = $this->backref;
        } else {
            $returnUrl = ModUtil::url('Content', 'admin', 'editpage', array('pid' => $this->pageId));
        }
        ModUtil::apiFunc('PageLock', 'user', 'pageLock', array('lockName' => "contentTranslateContent{$this->contentId}", 'returnUrl' => $returnUrl));

        return true;
    }

    public function handleCommand(Zikula_Form_View $view, &$args)
    {
        $url = null;

        $translationInfo = ModUtil::apiFunc('Content', 'Content', 'getTranslationInfo', array('contentId' => $this->contentId));
        if ($translationInfo === false) {
            return $this->view->registerError(null);
        }

        if ($args['commandName'] == 'next' || $args['commandName'] == 'prev' || $args['commandName'] == 'quit' || $args['commandName'] == null /* Auto postback */) {
            if (!$this->view->isValid()) {
                return false;
            }
            $contentData = $this->view->getValues();

            $ok = ModUtil::apiFunc('Content', 'Content', 'updateTranslation', array('translated' => $contentData['translated'], 'contentId' => $this->contentId, 'language' => $this->language));
            if ($ok === false) {
                return $this->view->registerError(null);
            }
            if ($args['commandName'] == null) {
                $url = ModUtil::url('Content', 'admin', 'translatecontent', array('cid' => $contentData['translationStep']));
            } else if ($args['commandName'] == 'next' && $translationInfo['nextContentId'] != null) {
                $url = ModUtil::url('Content', 'admin', 'translatecontent', array('cid' => $translationInfo['nextContentId']));
            } else if ($args['commandName'] == 'prev' && $translationInfo['prevContentId'] == null) {
                $url = ModUtil::url('Content', 'admin', 'translatepage', array('pid' => $this->pageId));
            } else if ($args['commandName'] == 'prev' && $translationInfo['prevContentId'] != null) {
                $url = ModUtil::url('Content', 'admin', 'translatecontent', array('cid' => $translationInfo['prevContentId']));
            }
        } else if ($args['commandName'] == 'skip') {
            if ($translationInfo['nextContentId'] != null) {
                $url = ModUtil::url('Content', 'admin', 'translatecontent', array('cid' => $translationInfo['nextContentId']));
            }
        } else if ($args['commandName'] == 'delete') {
            $ok = ModUtil::apiFunc('Content', 'Content', 'deleteTranslation', array('contentId' => $this->contentId, 'language' => $this->language));
            if ($ok === false)
                return $this->view->registerError(null);
        }

        if ($url == null) {
            $url = $this->backref;
        }
        if (empty($url)) {
            $url = ModUtil::url('Content', 'admin', 'editpage', array('pid' => $this->pageId));
        }
        ModUtil::apiFunc('PageLock', 'user', 'releaseLock', array('lockName' => "contentTranslateContent{$this->contentId}"));

        return $this->view->redirect($url);
    }
}
