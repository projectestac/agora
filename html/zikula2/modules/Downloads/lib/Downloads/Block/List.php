<?php

/**
 * Downloads
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 */
class Downloads_Block_List extends Zikula_Controller_AbstractBlock
{

    /**
     * initialise block
     */
    public function init()
    {
        SecurityUtil::registerPermissionSchema('Downloads:listblock:', 'Block title::');
    }

    /**
     * get block information
     */
    public function info()
    {
        return array(
            'text_type' => 'Downloads',
            'module' => 'Downloads',
            'text_type_long' => $this->__('Downloads list Block'),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true);
    }

    /**
     * display block
     */
    public function display($blockinfo)
    {
        if (!SecurityUtil::checkPermission('Downloads:listblock:', "$blockinfo[title]::", ACCESS_OVERVIEW)) {
            return;
        }
        if (!ModUtil::available('Downloads')) {
            return;
        }
        // Get variables from content block
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // return if no category
        if (empty($vars['category'])) {
            return;
        }

        $downloads = ModUtil::apiFunc('Downloads', 'user', 'getall', array(
                    'category' => $vars['category'],
                    'limit' => $vars['limit'],
                    'orderby' => 'date',
                    'orderdir' => 'DESC',
                ));

        // create the output object
        $this->view->setCacheId('listblock' . '|' . $blockinfo['bid'] . "|" . $vars['category']);

        // assign the item
        $this->view->assign('downloads', $downloads);

        // Populate block info and pass to theme
        $blockinfo['content'] = $this->view->fetch('blocks/list.tpl');
        return BlockUtil::themeBlock($blockinfo);
    }

    /**
     * modify block settings
     */
    public function modify($blockinfo)
    {
        $vars = BlockUtil::varsFromContent($blockinfo['content']);
        // Defaults
        $vars['category'] = (!empty($vars['category'])) ? $vars['category'] : 1; // default to first available category
        $vars['limit'] = (!empty($vars['limit'])) ? $vars['limit'] : 10;

        $this->view->assign('catselectoptions', Downloads_Util::getCatSelectList(array(
                    'sel' => $vars['category'])));

        $this->view->assign('vars', $vars);

        return $this->view->fetch('blocks/list_modify.tpl');
    }

    /**
     * update block settings
     */
    public function update($blockinfo)
    {
        // Get current content
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // overwrite with new values
        $vars['category'] = $this->request->request->get('category', 1); // default to first available category
        $vars['limit'] = $this->request->request->get('limit', 10);

        $this->view->clear_cache('blocks/list.tpl');
        $blockinfo['content'] = BlockUtil::varsToContent($vars);

        return $blockinfo;
    }

}