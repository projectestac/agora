<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 * @author N.Petkov, based on block menu.php
 */
class Content_Block_OnePage extends Zikula_Controller_AbstractBlock
{

    public function init()
    {
        // Security
        SecurityUtil::registerPermissionSchema('Content:OnePageBlock:', 'Block title::');
    }

    public function info()
    {
        return array('module'          => 'Content',
                     'text_type'       => $this->__('Content onepage'),
                     'text_type_long'  => $this->__('Content onepage block'),
                     'allow_multiple'  => true,
                     'form_content'    => false,
                     'form_refresh'    => false,
                     'show_preview'    => true,
                     'admin_tableless' => true);
    }

    public function display($blockinfo)
    {
        // security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content:OnePageBlock:', "$blockinfo[title]::", ACCESS_READ), LogUtil::getErrorMsgPermission());

        // Break out options from our content field
        $vars = BlockUtil::varsFromContent($blockinfo['content']);
        // --- Setting of the Defaults
        if (!isset($vars['page'])) {
            $vars['page'] = 0;
        }

        if ($vars['page'] > 0) {
            $blockinfo['content'] = ModUtil::func('Content', 'user', 'view', array('pid' => $vars['page']));
        } else {
            $blockinfo['content'] = $this->__('No page selected');
        }
        return BlockUtil::themeBlock($blockinfo);
    }

    public function modify($blockinfo)
    {
        $vars = BlockUtil::varsFromContent($blockinfo['content']);
        $this->view->assign($vars);

        $pages = ModUtil::apiFunc('Content', 'Page', 'getPages', array(
            'makeTree' => false,
            'orderBy' => 'setLeft',
            'includeContent' => false));
        $pidItems = array();
        $pidItems[] = array('text' => $this->__('Select a page'), 'value' => "0");

        foreach ($pages as $page) {
            $pidItems[] = array('text' => str_repeat('+', $page['level']) . " " . $page['title'], 'value' => $page['id']);
        }
        $this->view->assign('pidItems', $pidItems);

        return $this->view->fetch('block/onepage_modify.tpl');
    }

    function update($blockinfo)
    {
        $vars = BlockUtil::varsFromContent($blockinfo['content']);
        $vars['page'] = FormUtil::getPassedValue('page', 0, 'POST');

        $blockinfo['content'] = BlockUtil::varsToContent($vars);

        return $blockinfo;
    }
}