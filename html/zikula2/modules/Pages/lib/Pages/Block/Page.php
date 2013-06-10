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
 * A pages list block.
 */
class Pages_Block_Page extends Zikula_Controller_AbstractBlock
{
    /**
     * Initialise block.
     *
     * @return void
     */
    public function init()
    {
        // Security
        SecurityUtil::registerPermissionSchema('Pages:pageblock:', 'Block title::');
    }

    /**
     * get information on block
     *
     * @return array The block information
     */
    public function info()
    {
        return array(
            'module'          => 'Pages',
            'text_type'       => $this->__('Show page'),
            'text_type_long'  => $this->__('Show a page in a block'),
            'allow_multiple'  => true,
            'form_content'    => false,
            'form_refresh'    => false,
            'show_preview'    => true,
            'admin_tableless' => true
        );
    }

    /**
     * Display block.
     *
     * @param array $blockinfo A blockinfo structure.
     *
     * @return string|void The rendered block.
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
     *
     * @param array $blockinfo a blockinfo structure
     *
     * @return output the bock form
     */
    public function modify($blockinfo)
    {
        // create the output object
        $this->view->setCaching(false);

        // Get current content and assign it
        $vars = BlockUtil::varsFromContent($blockinfo['content']);
        $this->view->assign($vars);

        // Get all pages and assign them
        $pages = ModUtil::apiFunc('Pages', 'user', 'getall');
        $this->view->assign('pages', $pages);

        return $this->view->fetch('block/pageblock_modify.tpl');
    }

    /**
     * update block settings
     *
     * @param array $blockinfo A blockinfo structure.
     *
     * @return array The modified blockinfo structure.
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