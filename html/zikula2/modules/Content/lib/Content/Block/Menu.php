<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */

class Content_Block_Menu extends Zikula_Controller_AbstractBlock
{
    public function init()
    {
        // Security
        SecurityUtil::registerPermissionSchema('Content:menublock:', 'Block title::');
    }

    public function info()
    {
        return array('module'          => 'Content',
                'text_type'       => $this->__('Content menu'),
                'text_type_long'  => $this->__('Content menu block'),
                'allow_multiple'  => true,
                'form_content'    => false,
                'form_refresh'    => false,
                'show_preview'    => true,
                'admin_tableless' => true);
    }

    public function display($blockinfo)
    {
        // security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content:menublock:', "$blockinfo[title]::", ACCESS_READ), LogUtil::getErrorMsgPermission());

        // Break out options from our content field
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // --- Setting of the Defaults
        if (!isset($vars['usecaching'])) {
            $vars['usecaching'] = false;
        }
        if (!isset($vars['root'])) {
            $vars['root'] = 0;
        }

        $this->view->setCacheId($blockinfo['bid']);
        $this->view->setCaching($vars['usecaching']);

        if (!$vars['usecaching'] || ($vars['usecaching'] && !$this->view->is_cached('block/menu.tpl'))) {
            $options = array('orderBy' => 'setLeft', 'makeTree' => true, 'filter' => array());
            if ($vars['root'] > 0) {
                $options['filter']['superParentId'] = $vars['root'];
            }
            // checkInMenu, checkActive is done implicitely
            $options['filter']['checkInMenu'] = true;
            $pages = ModUtil::apiFunc('Content', 'Page', 'getPages', $options);
            if ($pages === false) {
                return false;
            }
            $this->view->assign('subPages', $pages);
        }
        $blockinfo['content'] = $this->view->fetch('block/menu.tpl');
        return BlockUtil::themeBlock($blockinfo);
    }

    public function modify($blockinfo)
    {
        $vars = BlockUtil::varsFromContent($blockinfo['content']);
        if (!isset($vars['usecaching'])) {
            $vars['usecaching'] = false;
        }

        $this->view->assign($vars);

        $pages = ModUtil::apiFunc('Content', 'Page', 'getPages', array('makeTree' => false, 'orderBy' => 'setLeft', 'includeContent' => false, 'enableEscape' => false));
        $pidItems = array();
        $pidItems[] = array('text' => $this->__('All pages'), 'value' => "0");

        foreach ($pages as $page) {
            $pidItems[] = array('text' => str_repeat('+', $page['level']) . " " . $page['title'], 'value' => $page['id']);
        }
        $this->view->assign('pidItems', $pidItems);
        return $this->view->fetch('block/menu_modify.tpl');
    }

    public function update($blockinfo)
    {
        $vars = BlockUtil::varsFromContent($blockinfo['content']);
        $vars['root'] = FormUtil::getPassedValue('root', 0, 'POST');
        $vars['usecaching'] = (bool)FormUtil::getPassedValue('usecaching', false, 'POST');
        $blockinfo['content'] = BlockUtil::varsToContent($vars);

        // clear the block cache
        $this->view->clear_cache('block/menu.tpl');
        return $blockinfo;
    }
}