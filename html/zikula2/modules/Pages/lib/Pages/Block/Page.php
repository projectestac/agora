<?php
class Pages_Block_Page extends Zikula_Controller_AbstractBlock
{
    /**
     * initialise block
     */
    public function init()
    {
        // Security
        SecurityUtil::registerPermissionSchema('Pages:pageblock:', 'Block title::');
    }

    /**
     * get information on block
     */
    public function info()
    {
        return array('module'          => 'Pages',
                'text_type'       => $this->__('Show page'),
                'text_type_long'  => $this->__('Show a page in a block'),
                'allow_multiple'  => true,
                'form_content'    => false,
                'form_refresh'    => false,
                'show_preview'    => true,
                'admin_tableless' => true);
    }

    /**
     * display block
     */
    public function display($blockinfo)
    {
        // Security check
        if (!SecurityUtil::checkPermission('Pages:pageblock:', "$blockinfo[title]::", ACCESS_READ)) {
            return;
        }

        // Get variables from content block
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // return if no pid
        if (empty($vars['pid'])) {
            return;
        }

        // get the page
        $item = ModUtil::apiFunc('Pages', 'user', 'get', array('pageid' => $vars['pid']));

        // check for a valid item
        if (!$item) {
            return;
        }

        if (!SecurityUtil::checkPermission('Pages::', "{$item['title']}::{$item['pageid']}", ACCESS_READ)) {
            return;
        }

        // Create output object
        if (!isset($item['content'])) {
            return;
        }

        // create the output object
        $this->view->setCacheId($item['pageid']);

        // assign the item
        $this->view->assign($item);

        // Populate block info and pass to theme
        $blockinfo['content'] = $this->view->fetch('block/pageblock_display.tpl');
        return BlockUtil::themeBlock($blockinfo);
    }

    /**
     * modify block settings
     */
    public function modify($blockinfo)
    {
        // create the output object
        $this->view->setCaching(false);

        // Get current content
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // assign the block vars
        $this->view->assign($vars);

        // Return output
        return $this->view->fetch('block/pageblock_modify.tpl');
    }

    /**
     * update block settings
     */
    public function update($blockinfo)
    {
        // get current content
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // alter the corresponding variable
        $vars['pid'] = (int)FormUtil::getPassedValue('pid', null, 'POST');

        // write back the new contents
        $blockinfo['content'] = BlockUtil::varsToContent($vars);

        // clear the block cache
        $this->view->clear_cache('block/pageslist.tpl');

        return $blockinfo;
    }
}