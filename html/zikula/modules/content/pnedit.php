<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: pnedit.php 378 2010-01-06 14:31:55Z herr.vorragend $
 * @license See license.txt
 */

Loader::requireOnce('modules/content/common.php');
Loader::requireOnce('includes/pnForm.php');

/*=[ Main page tree ]============================================================*/

class content_edit_mainHandler extends pnFormHandler
{
    function content_edit_mainHandler($args)
    {
        $this->args = $args;
    }

    function initialize(&$render)
    {
        $dom = ZLanguage::getModuleDomain('content');
        if (!contentHasPageEditAccess())
            return $render->pnFormRegisterError(LogUtil::registerPermissionError());

        $pages = pnModAPIFunc('content', 'page', 'getPages', array('editing' => true, 'filter' => array('checkActive' => false, 'expandedPageIds' => contentMainEditExpandGet()), 'enableEscape' => true, 'translate' => false, 'includeLanguages' => true,
            'orderBy' => 'setLeft'));
        if ($pages === false)
            return $render->pnFormRegisterError(null);

        PageUtil::setVar('title', __('Page list and content structure', $dom));
        $csssrc = ThemeUtil::getModuleStylesheet('admin', 'admin.css');
        PageUtil::addVar('stylesheet', $csssrc);

        $render->assign('pages', $pages);
        $render->assign('multilingual', pnModGetVar(PN_CONFIG_MODULE, 'multilingual'));
        contentAddAccess($render, null);

        return true;
    }

    function handleCommand(&$render, &$args)
    {
        $url = pnModUrl('content', 'edit', 'main');

        if ($args['commandName'] == 'edit') {
            $url = pnModUrl('content', 'edit', 'editpage', array('pid' => $args['commandArgument']));
        } else if ($args['commandName'] == 'newSubPage') {
            $url = pnModUrl('content', 'edit', 'newpage', array('pid' => $args['commandArgument'], 'loc' => 'sub'));
        } else if ($args['commandName'] == 'newPage') {
            $url = pnModUrl('content', 'edit', 'newpage', array('pid' => $args['commandArgument']));
        } else if ($args['commandName'] == 'drag') {
            $srcId = FormUtil::getPassedValue('contentTocDragSrcId', null, 'POST');
            $dstId = FormUtil::getPassedValue('contentTocDragDstId', null, 'POST');
            list ($dummy, $srcId) = explode('_', $srcId);
            list ($dummy, $dstId) = explode('_', $dstId);

            $ok = pnModAPIFunc('content', 'page', 'drag', array('srcId' => $srcId, 'dstId' => $dstId));
            if (!$ok)
                return $render->pnFormRegisterError(null);
        } else if ($args['commandName'] == 'decIndent') {
            // Decreasing indent is the same as dragging it onto parent page


            $srcId = (int) $args['commandArgument'];

            $page = pnModAPIFunc('content', 'page', 'getPage', array('id' => $srcId));
            if ($page === false)
                return $render->pnFormRegisterError(null);

            $dstId = (int) $page['parentPageId'];

            if ($dstId != 0) {
                $ok = pnModAPIFunc('content', 'page', 'drag', array('srcId' => $srcId, 'dstId' => $dstId));
                if (!$ok)
                    return $render->pnFormRegisterError(null);
            }
        } else if ($args['commandName'] == 'incIndent') {
            $pageId = (int) $args['commandArgument'];

            $ok = pnModAPIFunc('content', 'page', 'increaseIndent', array('pageId' => $pageId));
            if (!$ok)
                return $render->pnFormRegisterError(null);
        } else if ($args['commandName'] == 'deletePage') {
            $pageId = (int) $args['commandArgument'];

            $ok = pnModAPIFunc('content', 'page', 'deletePage', array('pageId' => $pageId));
            if ($ok === false)
                return $render->pnFormRegisterError(null);
        } else if ($args['commandName'] == 'history') {
            $pageId = (int) $args['commandArgument'];
            $url = pnModUrl('content', 'edit', 'history', array('pid' => $pageId));
        } else if ($args['commandName'] == 'toggleExpand') {
            $pageId = FormUtil::getPassedValue('contentTogglePageId', null, 'POST');
            contentMainEditExpandToggle($pageId);
        }

        $render->pnFormRedirect($url);
        return true;
    }
}

function content_edit_main($args)
{
    $render = FormUtil::newpnForm('content');
    return $render->pnFormExecute('content_edit_main.html', new content_edit_mainHandler($args));
}

/*=[ Create new page ]===========================================================*/

class content_edit_newPageHandler extends pnFormHandler
{
    var $pageId; // Parent or previous page ID or null for new top page
    var $location; // Create 'sub' page or next page (at same level)


    function content_edit_newPageHandler($args)
    {
        $this->args = $args;
    }

    function initialize(&$render)
    {
        $dom = ZLanguage::getModuleDomain('content');
        $this->pageId = FormUtil::getPassedValue('pid', isset($this->args['pid']) ? $this->args['pid'] : null);
        $this->location = FormUtil::getPassedValue('loc', isset($this->args['loc']) ? $this->args['loc'] : null);

        if (!contentHasPageCreateAccess())
            return $render->pnFormRegisterError(LogUtil::registerPermissionError());

        // Only allow subpages if edit access on parent page
        if (!contentHasPageEditAccess($this->pageId))
            return LogUtil::registerPermissionError();

        if ($this->pageId != null) {
            $page = pnModAPIFunc('content', 'page', 'getPage', array('id' => $this->pageId, 'includeContent' => false));
            if ($page === false)
                return $render->pnFormRegisterError(null);
        } else
            $page = null;

        $layouts = pnModAPIFunc('content', 'layout', 'getLayouts');
        if ($layouts === false)
            return $render->pnFormRegisterError(null);

        PageUtil::setVar('title', __('Add new page', $dom));

        $render->assign('layouts', $layouts);
        $render->assign('page', $page);
        $render->assign('location', $this->location);
        if ($this->location == 'sub')
            $render->assign('locationLabel', __('Located below:', $dom));
        else
            $render->assign('locationLabel', __('Located after:', $dom));
        contentAddAccess($render, $this->pageId);

        return true;
    }

    function handleCommand(&$render, &$args)
    {
        if (!contentHasPageCreateAccess())
            return $render->pnFormSetErrorMsg(__('Error! You have not been granted access to this page.', $dom));

        if ($args['commandName'] == 'create') {
            if (!$render->pnFormIsValid())
                return false;

            $pageData = $render->pnFormGetValues();

            $id = pnModAPIFunc('content', 'page', 'newPage', array('page' => $pageData, 'pageId' => $this->pageId, 'location' => $this->location));
            if ($id === false)
                return false;

            $url = pnModUrl('content', 'edit', 'editpage', array('pid' => $id));
        } else if ($args['commandName'] == 'cancel') {
            $id = null;
            $url = pnModUrl('content', 'edit', 'main');
        }

        return $render->pnFormRedirect($url);
    }
}

function content_edit_newpage($args)
{
    $render = FormUtil::newpnForm('content');
    return $render->pnFormExecute('content_edit_newpage.html', new content_edit_newPageHandler($args));
}

/*=[ Edit single page ]==========================================================*/

class content_edit_editPageHandler extends pnFormHandler
{
    var $pageId;
    var $backref;

    function content_edit_editPageHandler($args)
    {
        $this->args = $args;
    }

    function initialize(&$render)
    {
        $dom = ZLanguage::getModuleDomain('content');
        $this->pageId = (int) FormUtil::getPassedValue('pid', isset($this->args['pid']) ? $this->args['pid'] : -1);

        if (!contentHasPageEditAccess($this->pageId))
            return $render->pnFormRegisterError(LogUtil::registerPermissionError());

        $page = pnModAPIFunc('content', 'page', 'getPage', array('id' => $this->pageId, 'editing' => true, 'filter' => array('checkActive' => false), 'enableEscape' => false, 'translate' => false, 'includeContent' => true, 'includeCategories' => true));
        if ($page === false)
            return $render->pnFormRegisterError(null);

        // load the category registry util
        if (!Loader::loadClass('CategoryRegistryUtil'))
            pn_exit('Unable to load class [CategoryRegistryUtil] ...');
        $mainCategory = CategoryRegistryUtil::getRegisteredModuleCategory('Content', 'content_page', 'primary', 30); // 30 == /__SYSTEM__/Modules/Global


        $multilingual = pnModGetVar(PN_CONFIG_MODULE, 'multilingual');
        if ($page['language'] == ZLanguage::getLanguageCode())
            $multilingual = false;

        PageUtil::setVar('title', __("Edit page", $dom) . ' : ' . $page['title']);

        $layoutTemplate = 'layout/' . $page['layoutData']['name'] . '_edit.html';
        $render->assign('layoutTemplate', $layoutTemplate);
        $render->assign('mainCategory', $mainCategory);
        $render->assign('page', $page);
        $render->assign('multilingual', $multilingual);
        contentAddAccess($render, $this->pageId);

        if (!$render->pnFormIsPostBack() && FormUtil::getPassedValue('back', 0))
            $this->backref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;

        if ($this->backref != null)
            $returnUrl = $this->backref;
        else
            $returnUrl = pnModUrl('content', 'edit', 'main');
        pnModAPIFunc('PageLock', 'user', 'pageLock', array('lockName' => "contentPage{$this->pageId}", 'returnUrl' => $returnUrl));

        return true;
    }

    function handleCommand(&$render, &$args)
    {
        $dom = ZLanguage::getModuleDomain('content');
        $url = null;

        if ($args['commandName'] == 'save' || $args['commandName'] == 'saveAndView' || $args['commandName'] == 'translate') {
            if (!$render->pnFormIsValid())
                return false;

            $pageData = $render->pnFormGetValues();

            // fetch old data *before* updating
            $oldPageData = pnModAPIFunc('content', 'page', 'getPage', array('id' => $this->pageId, 'editing' => true, 'filter' => array('checkActive' => false), 'enableEscape' => false));
            if ($oldPageData === false)
                return $render->pnFormRegisterError(null);

            $ok = pnModAPIFunc('content', 'page', 'updatePage', array('page' => $pageData['page'], 'pageId' => $this->pageId));
            if ($ok === false)
                return $render->pnFormRegisterError(null);

            if ($args['commandName'] == 'translate')
                $url = pnModUrl('content', 'edit', 'translatepage', array('pid' => $this->pageId));
            else if ($args['commandName'] == 'saveAndView')
                $url = pnModUrl('content', 'user', 'view', array('pid' => $this->pageId));
            else if ($oldPageData['layout'] != $pageData['page']['layout']) {
                $url = pnModUrl('content', 'edit', 'editpage', array('pid' => $this->pageId));
                LogUtil::registerStatus(__('Layout changed', $dom));
            }
        } else if ($args['commandName'] == 'deleteContent') {
            $ok = pnModAPIFunc('content', 'content', 'deleteContent', array('contentId' => $args['commandArgument']));
            if ($ok === false)
                return $render->pnFormRegisterError(null);

            $url = pnModUrl('content', 'edit', 'editpage', array('pid' => $this->pageId));
        } else if ($args['commandName'] == 'deletePage') {
            $ok = pnModAPIFunc('content', 'page', 'deletePage', array('pageId' => $this->pageId));
            if ($ok === false)
                return $render->pnFormRegisterError(null);

            $url = pnModUrl('content', 'edit', 'main');
        } else if ($args['commandName'] == 'cancel') {
        }

        pnModAPIFunc('PageLock', 'user', 'releaseLock', array('lockName' => "contentPage{$this->pageId}"));

        if ($url == null)
            $url = $this->backref;
        if ($url == null)
            $url = pnModUrl('content', 'edit', 'main');
        return $render->pnFormRedirect($url);
    }
}

function content_edit_editpage($args)
{
    $render = FormUtil::newpnForm('content'); // get all config vars and assign them to the template
    return $render->pnFormExecute('content_edit_editpage.html', new content_edit_editPageHandler($args));
}

/*=[ New content element ]=======================================================*/

class content_edit_newContentHandler extends pnFormHandler
{
    // Set these three for new content in empty area (or always first position)
    var $pageId; // ID of page to insert content on
    var $contentAreaIndex; // Index of the content are where new content is to be inserted
    var $position; // Position of new content inside above area (insert at this position)


    // Set these two for content relatively positioned to exiting content
    var $contentId; // ID of content we are creating new item relative to
    var $above; // Position relative to $contentid (above=0 => below)


    function content_edit_newContentHandler($args)
    {
        $this->args = $args;
    }

    function initialize(&$render)
    {
        $dom = ZLanguage::getModuleDomain('content');
        $this->pageId = FormUtil::getPassedValue('pid', isset($this->args['pid']) ? $this->args['pid'] : null);
        $this->contentAreaIndex = FormUtil::getPassedValue('cai', isset($this->args['cai']) ? $this->args['cai'] : null);
        $this->position = FormUtil::getPassedValue('pos', isset($this->args['pos']) ? $this->args['pos'] : 0);
        $this->contentId = FormUtil::getPassedValue('cid', isset($this->args['cid']) ? $this->args['cid'] : null);
        $this->above = FormUtil::getPassedValue('above', isset($this->args['above']) ? $this->args['above'] : 0);

        if ($this->contentId != null) {
            $content = pnModAPIFunc('content', 'content', 'getContent', array('id' => $this->contentId));
            if ($content === false)
                return $render->pnFormRegisterError(null);

            $this->pageId = $content['pageId'];
            $this->contentAreaIndex = $content['areaIndex'];
            $this->position = ($this->above ? $content['position'] : $content['position'] + 1);
        }

        if (!contentHasPageEditAccess($this->pageId))
            return $render->pnFormRegisterError(LogUtil::registerPermissionError());

        if ($this->pageId == null)
            return $render->pnFormSetErrorMsg("Missing page ID (pid) in URL");

        if ($this->contentAreaIndex == null)
            return $render->pnFormSetErrorMsg("Missing content area index (cai) in URL");

        $page = pnModAPIFunc('content', 'page', 'getPage', array('id' => $this->pageId, 'checkActive' => false));
        if ($page === false)
            return $render->pnFormRegisterError(null);

        PageUtil::setVar('title', __("Add new content to page", $dom) . ' : ' . $page['title']);

        $render->assign('page', $page);
        $render->assign('htmlBody', 'content_edit_newcontent.html');
        contentAddAccess($render, $this->pageId);

        return true;
    }

    function handleCommand(&$render, &$args)
    {
        if ($args['commandName'] == 'create') {
            if (!$render->pnFormIsValid())
                return false;

            $contentData = $render->pnFormGetValues();
            list ($module, $type) = explode(':', $contentData['contentType']);
            $contentData['module'] = $module;
            $contentData['type'] = $type;
            unset($contentData['contentType']);
            $contentData['language'] = null;

            $id = pnModAPIFunc('content', 'content', 'newContent', array('content' => $contentData, 'pageId' => $this->pageId, 'contentAreaIndex' => $this->contentAreaIndex, 'position' => $this->position));
            if ($id === false)
                return $render->pnFormRegisterError(null);

            $url = pnModUrl('content', 'edit', 'editcontent', array('cid' => $id));
        } else if ($args['commandName'] == 'cancel') {
            $id = null;
            $url = pnModUrl('content', 'edit', 'editpage', array('pid' => $this->pageId));
        }

        return $render->pnFormRedirect($url);
    }
}

function content_edit_newcontent($args)
{
    $render = FormUtil::newpnForm('content');
    return $render->pnFormExecute('content_edit_newcontent.html', new content_edit_newContentHandler($args));
    //echo $render->pnFormExecute('content_blankpage.html', new content_edit_newContentHandler($args));
//return true;
}

/*=[ Edit single content item ]==================================================*/

class content_edit_editContentHandler extends pnFormHandler
{
    var $contentId;
    var $pageId;
    var $backref;

    function content_edit_editContentHandler($args)
    {
        $this->args = $args;
    }

    function initialize(&$render)
    {
        $dom = ZLanguage::getModuleDomain('content');
        $this->contentId = (int) FormUtil::getPassedValue('cid', isset($this->args['cid']) ? $this->args['cid'] : -1);

        $content = pnModAPIFunc('content', 'content', 'getContent', array('id' => $this->contentId, 'translate' => false));
        if ($content === false)
            return $render->pnFormRegisterError(null);

        $this->contentType = pnModAPIFunc('content', 'content', 'getContentType', $content);
        if ($this->contentType === false)
            return $render->pnFormRegisterError(null);

        $this->contentType['plugin']->startEditing($render);

        $this->pageId = $content['pageId'];

        if (!contentHasPageEditAccess($this->pageId))
            return $render->pnFormRegisterError(LogUtil::registerPermissionError());

        $page = pnModAPIFunc('content', 'page', 'getPage', array('id' => $this->pageId, 'includeContent' => false, 'checkActive' => false));
        if ($page === false)
            return $render->pnFormRegisterError(null);

        $multilingual = pnModGetVar(PN_CONFIG_MODULE, 'multilingual');
        if ($page['language'] == ZLanguage::getLanguageCode())
            $multilingual = false;

        PageUtil::setVar('title', __("Edit content item", $dom) . ' : ' . $page['title']);

        $template = 'file:' . getcwd() . "/modules/$content[module]/pntemplates/contenttype/" . $content['type'] . '_edit.html';
        $render->assign('contentTypeTemplate', $template);
        $render->assign('page', $page);
        $render->assign('content', $content);
        $render->assign('data', $content['data']);
        $render->assign('contentType', $this->contentType);
        $render->assign('multilingual', $multilingual);
        contentAddAccess($render, $this->pageId);

        if (!$render->pnFormIsPostBack() && FormUtil::getPassedValue('back', 0))
            $this->backref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;

        if ($this->backref != null)
            $returnUrl = $this->backref;
        else
            $returnUrl = pnModUrl('content', 'edit', 'editpage', array('pid' => $this->pageId));
        pnModAPIFunc('PageLock', 'user', 'pageLock', array('lockName' => "contentContent{$this->contentId}", 'returnUrl' => $returnUrl));

        return true;
    }

    function handleCommand(&$render, &$args)
    {
        $url = null;

        if ($args['commandName'] == 'save' || $args['commandName'] == 'translate') {
            if (!$render->pnFormIsValid())
                return false;
            $contentData = $render->pnFormGetValues();

            $message = null;
            if (!$this->contentType['plugin']->isValid($contentData['data'], $message)) {
                $errorPlugin = &$render->pnFormGetPluginById('error');
                $errorPlugin->message = $message;
                return false;
            }

            $this->contentType['plugin']->loadData($contentData['data']);

            $ok = pnModAPIFunc('content', 'content', 'updateContent', array('content' => $contentData + $contentData['content'], 'searchableText' => $this->contentType['plugin']->getSearchableText(), 'id' => $this->contentId));
            if ($ok === false)
                return $render->pnFormRegisterError(null);

            if ($args['commandName'] == 'translate')
                $url = pnModUrl('content', 'edit', 'translatecontent', array('cid' => $this->contentId, 'back' => 1));
        } else if ($args['commandName'] == 'delete') {
            $ok = pnModAPIFunc('content', 'content', 'deleteContent', array('contentId' => $this->contentId));
            if ($ok === false)
                return $render->pnFormRegisterError(null);
        } else if ($args['commandName'] == 'cancel') {
        }

        if ($url == null)
            $url = $this->backref;
        if (empty($url))
            $url = pnModUrl('content', 'edit', 'editpage', array('pid' => $this->pageId));

        pnModAPIFunc('PageLock', 'user', 'releaseLock', array('lockName' => "contentContent{$this->contentId}"));

        return $render->pnFormRedirect($url);
    }

    function handleSomethingChanged(&$render, &$args)
    {
        $contentData = $render->pnFormGetValues();
        $this->contentType['plugin']->handleSomethingChanged($render, $contentData['data']);
    }
}

function content_edit_editcontent($args)
{
    $render = FormUtil::newpnForm('content');
    return $render->pnFormExecute('content_edit_editcontent.html', new content_edit_editContentHandler($args));
}

/*=[ Translate page ]============================================================*/

class content_edit_translatePageHandler extends pnFormHandler
{
    var $pageId;
    var $language;
    var $backref;

    function initialize(&$render)
    {
        $dom = ZLanguage::getModuleDomain('content');
        $this->pageId = (int) FormUtil::getPassedValue('pid', -1);
        $this->language = ZLanguage::getLanguageCode();

        if (!contentHasPageEditAccess($this->pageId))
            return $render->pnFormRegisterError(LogUtil::registerPermissionError());

        $page = pnModAPIFunc('content', 'page', 'getPage', array('id' => $this->pageId, 'includeContent' => false, 'checkActive' => false, 'translate' => false));
        if ($page === false)
            return $render->pnFormRegisterError(null);

        if ($this->language == $page['language'])
            return $render->pnFormRegisterError(LogUtil::registerError(__("You should not translate item to same language as it's default language.", $dom)));

    PageUtil::setVar('title', __("Translate page", $dom) . ' : ' . $page['title']);

    $render->assign('page', $page);
    $render->assign('translated', $page['translated']);
    $render->assign('language', $this->language);
    contentAddAccess($render, $this->pageId);

    if (!$render->pnFormIsPostBack() && FormUtil::getPassedValue('back',0))
      $this->backref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;

    if ($this->backref != null)
      $returnUrl = $this->backref;
    else
      $returnUrl = pnModUrl('content', 'edit', 'editpage', array('pid' => $this->pageId));
    pnModAPIFunc('PageLock', 'user', 'pageLock',
                 array('lockName' => "contentTranslatePage{$this->pageId}",
                       'returnUrl' => $returnUrl));

    return true;
  }


  function handleCommand(&$render, &$args)
  {
    $url = null;

    $translationInfo = pnModAPIFunc('content', 'content', 'getTranslationInfo',
                                    array('pageId' => $this->pageId));
    if ($translationInfo === false)
      return $render->pnFormRegisterError(null);

    if ($args['commandName'] == 'next' || $args['commandName'] == 'quit')
    {
      if (!$render->pnFormIsValid())
        return false;

      $pageData = $render->pnFormGetValues();

      $ok = pnModAPIFunc('content', 'page', 'updateTranslation',
                         array('translated' => $pageData['translated'],
                               'pageId' => $this->pageId,
                               'language' => $this->language));
      if ($ok === false)
        return $render->pnFormRegisterError(null);

      if ($args['commandName'] == 'next' && $translationInfo['nextContentId'] != null)
      {
        $url = pnModUrl('content', 'edit', 'translatecontent', array('cid' => $translationInfo['nextContentId']));
      }
    }
    else if ($args['commandName'] == 'skip')
    {
      if ($translationInfo['nextContentId'] != null)
      {
        $url = pnModUrl('content', 'edit', 'translatecontent', array('cid' => $translationInfo['nextContentId']));
      }
    }
    else if ($args['commandName'] == 'delete')
    {
      $ok = pnModAPIFunc('content', 'page', 'deleteTranslation',
                         array('pageId' => $this->pageId,
                               'language' => $this->language));
      if ($ok === false)
        return $render->pnFormRegisterError(null);
    }

    if ($url == null)
      $url = $this->backref;
    if (empty($url))
      $url = pnModUrl('content', 'edit', 'editpage', array('pid' => $this->pageId));

    pnModAPIFunc('PageLock', 'user', 'releaseLock',
                 array('lockName' => "contentTranslatePage{$this->pageId}"));

    return $render->pnFormRedirect($url);
  }
}


function content_edit_translatepage($args)
{
  $render = FormUtil::newpnForm('content');
  return $render->pnFormExecute('content_edit_translatepage.html', new content_edit_translatePageHandler($args));
}


/*=[ Translate content item ]====================================================*/

class content_edit_translateContentHandler extends pnFormHandler
{
  var $contentId;
  var $pageId;
  var $language;
  var $backref;


  function content_edit_translateContentHandler($args)
  {
    $this->args = $args;
  }


  function initialize(&$render)
  {
    $this->contentId = (int)FormUtil::getPassedValue('cid', isset($this->args['cid']) ? $this->args['cid'] : -1);
    $this->language = ZLanguage::getLanguageCode();

    $content = pnModAPIFunc('content', 'content', 'getContent',
                            array('id' => $this->contentId,
                                  'language' => $this->language,
                                  'translate' => false));
    if ($content === false)
      return $render->pnFormRegisterError(null);

    $this->contentType = pnModAPIFunc('content', 'content', 'getContentType', $content);
    if ($this->contentType === false)
      return $render->pnFormRegisterError(null);

    $this->pageId = $content['pageId'];

    if (!contentHasPageEditAccess($this->pageId))
      return $render->pnFormRegisterError(LogUtil::registerPermissionError());

    $page = pnModAPIFunc('content', 'page', 'getPage',
                         array('id' => $this->pageId,
                               'includeContent' => false,
                               'checkActive' => false));
    if ($page === false)
      return $render->pnFormRegisterError(null);

    if ($this->language == $page['language'])
      return $render->pnFormRegisterError(LogUtil::registerError(__("You should not translate item to same language as it's default language.", $dom)))
        ;

        $translationInfo = pnModAPIFunc('content', 'content', 'getTranslationInfo', array('contentId' => $this->contentId));
        if ($translationInfo === false)
            return $render->pnFormRegisterError(null);

        PageUtil::setVar('title', __("Translate content item", $dom) . ' : ' . $page['title']);

        $templateOriginal = 'file:' . getcwd() . "/modules/$content[module]/pntemplates/contenttype/" . $content['type'] . '_translate_original.html';
        $templateNew = 'file:' . getcwd() . "/modules/$content[module]/pntemplates/contenttype/" . $content['type'] . '_translate_new.html';
        $render->assign('translateOriginalTemplate', $templateOriginal);
        $render->assign('translateNewTemplate', $templateNew);
        $render->assign('page', $page);
        $render->assign('data', $content['data']);
        $render->assign('isTranslatable', $content['isTranslatable']);
        $render->assign('translated', $content['translated']);
        $render->assign('translationInfo', $translationInfo);
        $render->assign('translationStep', $this->contentId);
        $render->assign('language', $this->language);
        $render->assign('contentType', $this->contentType);
        contentAddAccess($render, $this->pageId);

        if (!$render->pnFormIsPostBack() && FormUtil::getPassedValue('back', 0))
            $this->backref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;

        if ($this->backref != null)
            $returnUrl = $this->backref;
        else
            $returnUrl = pnModUrl('content', 'edit', 'editpage', array('pid' => $this->pageId));
        pnModAPIFunc('PageLock', 'user', 'pageLock', array('lockName' => "contentTranslateContent{$this->contentId}", 'returnUrl' => $returnUrl));

        return true;
    }

    function handleCommand(&$render, &$args)
    {
        $url = null;

        $translationInfo = pnModAPIFunc('content', 'content', 'getTranslationInfo', array('contentId' => $this->contentId));
        if ($translationInfo === false)
            return $render->pnFormRegisterError(null);

        if ($args['commandName'] == 'next' || $args['commandName'] == 'prev' || $args['commandName'] == 'quit' || $args['commandName'] == null /* Auto postback */)
    {
            if (!$render->pnFormIsValid())
                return false;

            $contentData = $render->pnFormGetValues();

            $ok = pnModAPIFunc('content', 'content', 'updateTranslation', array('translated' => $contentData['translated'], 'contentId' => $this->contentId, 'language' => $this->language));
            if ($ok === false)
                return $render->pnFormRegisterError(null);

            if ($args['commandName'] == null) {
                $url = pnModUrl('content', 'edit', 'translatecontent', array('cid' => $contentData['translationStep']));
            } else if ($args['commandName'] == 'next' && $translationInfo['nextContentId'] != null) {
                $url = pnModUrl('content', 'edit', 'translatecontent', array('cid' => $translationInfo['nextContentId']));
            } else if ($args['commandName'] == 'prev' && $translationInfo['prevContentId'] == null) {
                $url = pnModUrl('content', 'edit', 'translatepage', array('pid' => $this->pageId));
            } else if ($args['commandName'] == 'prev' && $translationInfo['prevContentId'] != null) {
                $url = pnModUrl('content', 'edit', 'translatecontent', array('cid' => $translationInfo['prevContentId']));
            }
        } else if ($args['commandName'] == 'skip') {
            if ($translationInfo['nextContentId'] != null) {
                $url = pnModUrl('content', 'edit', 'translatecontent', array('cid' => $translationInfo['nextContentId']));
            }
        } else if ($args['commandName'] == 'delete') {
            $ok = pnModAPIFunc('content', 'content', 'deleteTranslation', array('contentId' => $this->contentId, 'language' => $this->language));
            if ($ok === false)
                return $render->pnFormRegisterError(null);
        }

        if ($url == null)
            $url = $this->backref;
        if (empty($url))
            $url = pnModUrl('content', 'edit', 'editpage', array('pid' => $this->pageId));

        pnModAPIFunc('PageLock', 'user', 'releaseLock', array('lockName' => "contentTranslateContent{$this->contentId}"));

        return $render->pnFormRedirect($url);
    }
}

function content_edit_translatecontent($args)
{
    $render = FormUtil::newpnForm('content');
    return $render->pnFormExecute('content_edit_translatecontent.html', new content_edit_translateContentHandler($args));
}

/*=[ History ]===================================================================*/

class content_edit_historyContentHandler extends pnFormHandler
{
    var $pageId;
    var $backref;

    function content_edit_historyContentHandler($args)
    {
        $this->args = $args;
    }

    function initialize(&$render)
    {
        $dom = ZLanguage::getModuleDomain('content');

        $this->pageId = FormUtil::getPassedValue('pid', isset($this->args['pid']) ? $this->args['pid'] : null);

        if (!contentHasPageEditAccess($this->pageId))
            return $render->pnFormRegisterError(LogUtil::registerPermissionError());

        $page = pnModAPIFunc('content', 'page', 'getPage', array('id' => $this->pageId, 'editing' => false, 'filter' => array('checkActive' => false), 'enableEscape' => true, 'translate' => false, 'includeContent' => false, 'includeCategories' => false));
        if ($page === false)
            return $render->pnFormRegisterError(null);

        $versions = pnModAPIFunc('content', 'history', 'getPageVersions', array('pageId' => $this->pageId));
        if ($versions === false)
            return $render->pnFormRegisterError(null);

        $render->assign('page', $page);
        $render->assign('versions', $versions);
        contentAddAccess($render, $this->pageId);

        PageUtil::setVar('title', __("Page history", $dom) . ' : ' . $page['title']);

        if (!$render->pnFormIsPostBack() && FormUtil::getPassedValue('back', 0))
            $this->backref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;

        return true;
    }

    function handleCommand(&$render, &$args)
    {
        $url = null;

        if ($args['commandName'] == 'restore') {
            $ok = pnModAPIFunc('content', 'history', 'restoreVersion', array('id' => $args['commandArgument']));
            if ($ok === false)
                return $render->pnFormRegisterError(null);
        }

        if ($url == null)
            $url = $this->backref;
        if (empty($url))
            $url = pnModUrl('content', 'edit', 'editpage', array('pid' => $this->pageId));

        return $render->pnFormRedirect($url);
    }
}

function content_edit_history($args)
{
    $render = FormUtil::newpnForm('content');
    return $render->pnFormExecute('content_edit_history.html', new content_edit_historyContentHandler($args));
}
