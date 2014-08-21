<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */
class Content_Block_SubPages extends Zikula_Controller_AbstractBlock
{

    public function init()
    {
        // Security
        SecurityUtil::registerPermissionSchema('Content:SubPagesBlock:', 'Block title::');
    }

    public function info()
    {
        return array('module'          => 'Content',
                     'text_type'       => $this->__('Content subpages of current page'),
                     'text_type_long'  => $this->__('Content subpages of the current page in a block'),
                     'allow_multiple'  => true,
                     'form_content'    => false,
                     'form_refresh'    => false,
                     'show_preview'    => true,
                     'admin_tableless' => true);
    }

    public function display($blockinfo)
    {
        // security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content:SubPagesBlock:', "$blockinfo[title]::", ACCESS_READ), LogUtil::getErrorMsgPermission());

        // Break out options from our content field
        $vars = BlockUtil::varsFromContent($blockinfo['content']);
        // --- Setting of the Defaults
        if (!isset($vars['usecaching'])) {
            $vars['usecaching'] = false;
        }
		if (!isset($vars['checkinmenu'])) {
			$vars['checkinmenu'] = true;
		}

        // decode the query string (works with and without shorturls)
        System::queryStringDecode();
        $query['module'] = isset($_REQUEST['module']) ? $_REQUEST['module'] : 'notcontent';
        $query['func'] = isset($_REQUEST['func']) ? $_REQUEST['func'] : 'notview';
        $query['pid'] = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : 0;

        $this->view->setCacheId($blockinfo['bid']);
        $this->view->setCaching($vars['usecaching']);

        if (!$vars['usecaching'] || ($vars['usecaching'] && !$this->view->is_cached('block/subpages.tpl'))) {
            $modinfo = ModUtil::getInfoFromName('content');	
            if ((strtolower($query['module']) == $modinfo['url']) && (strtolower($query['func']) == 'view') && ($query['pid'] > 0)) {
                $options = array(
                    'orderBy' => 'setLeft',
                    'makeTree' => true,
                    'includeContent' => false,
                    'enableEscape' => false,
                    'filter' => array()
                );
                // checkInMenu, checkActive is done implicitely
                $options['filter']['checkInMenu'] = $vars['checkinmenu'];
                $options['filter']['parentId'] = $query['pid'];
                $pages = ModUtil::apiFunc('Content', 'Page', 'getPages', $options);
                if ($pages === false) {
                    return false;
                }
            } else {
                $pages = null;
            }
            $this->view->assign('subPages', $pages);
        }
        $blockinfo['content'] = $this->view->fetch('block/subpages.tpl');
        return BlockUtil::themeBlock($blockinfo);
    }

    public function modify($blockinfo)
    {
        $vars = BlockUtil::varsFromContent($blockinfo['content']);
        if (!isset($vars['usecaching'])) {
            $vars['usecaching'] = false;
        }
        if (!isset($vars['checkinmenu'])) {
            $vars['checkinmenu'] = true;
        }
        $this->view->assign($vars);
        return $this->view->fetch('block/subpages_modify.tpl');
    }

    function update($blockinfo)
    {
        $vars = BlockUtil::varsFromContent($blockinfo['content']);
        $vars['usecaching'] = (bool)FormUtil::getPassedValue('usecaching', false, 'POST');
		$vars['checkinmenu'] = (bool)FormUtil::getPassedValue('checkinmenu', true, 'POST');
        $blockinfo['content'] = BlockUtil::varsToContent($vars);

        // clear the block cache
        $this->view->clear_cache('block/subpages.tpl');

        return $blockinfo;
    }
}
