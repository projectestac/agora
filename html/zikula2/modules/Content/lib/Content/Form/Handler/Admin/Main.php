<?php

class Content_Form_Handler_Admin_Main extends Zikula_Form_AbstractHandler
{
    public function __construct($args)
    {
        $this->args = $args;
    }

    public function initialize(Zikula_Form_View $view)
    {
        if (!SecurityUtil::checkPermission('Content:page:', '::', ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden(LogUtil::getErrorMsgPermission());
        }

        // Include categories only when 2nd category enabled in settings
        $pages = ModUtil::apiFunc('Content', 'Page', 'getPages', array(
            'editing' => true,
            'filter' => array(
                'checkActive' => false,
                'expandedPageIds' => SessionUtil::getVar('contentExpandedPageIds', array())),
            'enableEscape' => true,
            'translate' => false,
            'includeLanguages' => true,
            'includeCategories' => ($this->getVar('categoryUsage') < 3),
            'orderBy' => 'setLeft'));
        if ($pages === false) {
            return $this->view->registerError(null);
        }

        // Get categories names if enabled
        if ($this->getVar('$categoryUsage') < 4) {
            $lang = ZLanguage::getLanguageCode();
            $categories = array();
            foreach ($pages as $page) {
                $cat = CategoryUtil::getCategoryByID($page['categoryId']);
                $categories[$page['id']] = array();
                $categories[$page['id']][] = isset($cat['display_name'][$lang]) ? $cat['display_name'][$lang] : $cat['name'];
                if (isset($page['categories']) && is_array($page['categories'])) {
                    foreach ($page['categories'] as $pageCat) {
                        $cat = CategoryUtil::getCategoryByID($pageCat['categoryId']);
                        $categories[$page['id']][] = isset($cat['display_name'][$lang]) ? $cat['display_name'][$lang] : $cat['name'];
                    }
                }
            }
            $this->view->assign('categories', $categories);
        }

        PageUtil::setVar('title', $this->__('Page list and content structure'));
        $csssrc = ThemeUtil::getModuleStylesheet('admin', 'admin.css');
        PageUtil::addVar('stylesheet', $csssrc);

        $this->view->assign('pages', $pages);
        $this->view->assign('multilingual', ModUtil::getVar(ModUtil::CONFIG_MODULE, 'multilingual'));
        $this->view->assign('enableVersioning', $this->getVar('enableVersioning'));
        $this->view->assign('language', ZLanguage::getLanguageCode());
        Content_Util::contentAddAccess($this->view, null);

        return true;
    }

    public function handleCommand(Zikula_Form_View $view, &$args)
    {
        $url = ModUtil::url('Content', 'admin', 'main');

        if ($args['commandName'] == 'editPage') {
            $url = ModUtil::url('Content', 'admin', 'editPage', array('pid' => $args['commandArgument']));
        } else if ($args['commandName'] == 'newSubPage') {
            $url = ModUtil::url('Content', 'admin', 'newPage', array('pid' => $args['commandArgument'], 'loc' => 'sub'));
        } else if ($args['commandName'] == 'newPage') {
            $url = ModUtil::url('Content', 'admin', 'newPage', array('pid' => $args['commandArgument']));
        } else if ($args['commandName'] == 'clonePage') {
            $url = ModUtil::url('Content', 'admin', 'clonepage', array('pid' => $args['commandArgument']));
        } else if ($args['commandName'] == 'pageDrop') {
            $srcId = FormUtil::getPassedValue('contentTocDragSrcId', null, 'POST');
            $dstId = FormUtil::getPassedValue('contentTocDragDstId', null, 'POST');
            list ($dummy, $srcId) = explode('_', $srcId);
            list ($dummy, $dstId) = explode('_', $dstId);

            $ok = ModUtil::apiFunc('Content', 'Page', 'pageDrop', array('srcId' => $srcId, 'dstId' => $dstId));
            if (!$ok) {
                return $this->view->registerError(null);
            }
        } else if ($args['commandName'] == 'decIndent') {
            $pageId = (int) $args['commandArgument'];
            $ok = ModUtil::apiFunc('Content', 'Page', 'decreaseIndent', array('pageId' => $pageId));
            if (!$ok) {
                return $this->view->registerError(null);
            }
        } else if ($args['commandName'] == 'incIndent') {
            $pageId = (int) $args['commandArgument'];
            $ok = ModUtil::apiFunc('Content', 'Page', 'increaseIndent', array('pageId' => $pageId));
            if (!$ok) {
                return $this->view->registerError(null);
            }
        } else if ($args['commandName'] == 'deletePage') {
            $pageId = (int) $args['commandArgument'];
            $ok = ModUtil::apiFunc('Content', 'Page', 'deletePage', array('pageId' => $pageId));
            if ($ok === false) {
                return $this->view->registerError(null);
            }
        } else if ($args['commandName'] == 'history') {
            $pageId = (int) $args['commandArgument'];
            $url = ModUtil::url('Content', 'admin', 'history', array('pid' => $pageId));
        } else if ($args['commandName'] == 'sortPagesBelowByTitle') {
            $pageId = (int)$args['commandArgument'];
            $ok = ModUtil::apiFunc('Content', 'Page', 'orderPages', array('pageId' => $pageId));
            if ($ok === false) {
                return $this->view->registerError(null);
            }
        } else if ($args['commandName'] == 'toggleExpand') {
            $pageId = FormUtil::getPassedValue('contentTogglePageId', null, 'POST');
            Content_Util::contentMainEditExpandToggle($pageId);
        } else if ($args['commandName'] == 'expandAll') {
            Content_Util::contentMainEditExpandAll();
        } else if ($args['commandName'] == 'expandAllBelow') {
            Content_Util::contentMainEditExpandAll($args['commandArgument']);
        } else if ($args['commandName'] == 'collapseAll') {
            Content_Util::contentMainEditCollapseAll();
        } else if ($args['commandName'] == 'collapseAllBelow') {
            Content_Util::contentMainEditCollapseAll($args['commandArgument']);
        }
        $this->view->redirect($url);
        return true;
    }
}
