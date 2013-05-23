<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Mark West <mark@zikula.org>
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage News
 */

class News_Block_Stories extends Zikula_Controller_AbstractBlock
{
    /**
     * initialise block
     *
     * @author       The Zikula Development Team
     */
    public function init()
    {
        SecurityUtil::registerPermissionSchema('Storiesblock::', 'Block ID::');
    }

    /**
     * get information on block
     *
     * @author       The Zikula Development Team
     * @return       array       The block information
     */
    public function info()
    {
        return array('module'          => 'News',
                'text_type'       => $this->__('Article titles'),
                'text_type_long'  => $this->__('Display article titles'),
                'allow_multiple'  => true,
                'form_content'    => false,
                'form_refresh'    => false,
                'show_preview'    => true,
                'admin_tableless' => true);
    }

    /**
     * display block
     *
     * @author       The Zikula Development Team
     * @param        array       $blockinfo     a blockinfo structure
     * @return       output      the rendered bock
     */
    public function display($blockinfo)
    {
        // security check
        if (!SecurityUtil::checkPermission('Storiesblock::', $blockinfo['bid'].'::', ACCESS_OVERVIEW)) {
            return;
        }

        // Break out options from our content field
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // Defaults
        if (!isset($vars['storiestype'])) {
            $vars['storiestype'] = 2;
        }
        if (!isset($vars['limit'])) {
            $vars['limit'] = 10;
        }

        // work out the paraemters for the api all
        $apiargs = array();
        switch ($vars['storiestype'])
        {
            case 1:
            // non index page articles
                $apiargs['displayonindex'] = 0;
                break;
            case 3:
            // index page articles
                $apiargs['displayonindex'] = 1;
                break;
            // all - doesn't need displayonindex
        }

        $apiargs['numitems'] = $vars['limit'];
        $apiargs['status'] = News_Api_User::STATUS_PUBLISHED;
        $apiargs['ignorecats'] = true;

        if (isset($vars['category']) && !empty($vars['category'])) {
            $cat = CategoryUtil::getCategoryByID($vars['category']);
            $categories = CategoryUtil::getCategoriesByPath($cat['path'], '', 'path');
            $catstofilter = array();
            foreach ($categories as $category) {
                $catstofilter[] = $category['id'];
            }
            $apiargs['category'] = array('Main' => $catstofilter);
        }
        $apiargs['filterbydate'] = true;

        // call the api
        $items = ModUtil::apiFunc('News', 'user', 'getall', $apiargs);

        // check for an empty return
        if (empty($items)) {
            return;
        }

        // create the output object
        $this->view->setCaching(false);

        // loop through the items
        $storiesoutput = array();
        foreach ($items as $item) {
            $storyreadperm = false;
            if (SecurityUtil::checkPermission('News::', "$item[cr_uid]::$item[sid]", ACCESS_READ)) {
                $storyreadperm = true;
            }

            $this->view->assign('readperm', $storyreadperm);
            $this->view->assign($item);
            $storiesoutput[] = $this->view->fetch('block/stories_row.tpl', $item['sid'], null, false, false);
        }

        // assign the results
        $this->view->assign('stories', $storiesoutput);

        $blockinfo['content'] = $this->view->fetch('block/stories.tpl');

        return BlockUtil::themeBlock($blockinfo);
    }

    /**
     * modify block settings
     *
     * @author       The Zikula Development Team
     * @param        array       $blockinfo     a blockinfo structure
     * @return       output      the bock form
     */
    public function modify($blockinfo)
    {
        // Break out options from our content field
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // Defaults
        if (empty($vars['storiestype'])) {
            $vars['storiestype'] = 2;
        }
        if (empty($vars['limit'])) {
            $vars['limit'] = 10;
        }
        if (empty($vars['category'])) {
            $vars['category'] = null;
        }

        // Create output object
        $this->view->setCaching(false);

        $mainCat = CategoryRegistryUtil::getRegisteredModuleCategory('News', 'news', 'Main', 30); // 30 == /__SYSTEM__/Modules/Global
        $this->view->assign('mainCategory', $mainCat);
        $this->view->assign('category', $vars['category']);
        $this->view->assign(ModUtil::getVar('News'));

        // assign the block vars
        $this->view->assign($vars);

        $this->view->assign('dom');

        // Return the output that has been generated by this function
        return $this->view->fetch('block/stories_modify.tpl');
    }

    /**
     * update block settings
     *
     * @author       The Zikula Development Team
     * @param        array       $blockinfo     a blockinfo structure
     * @return       $blockinfo  the modified blockinfo structure
     */
    public function update($blockinfo)
    {
        // Get current content
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // alter the corresponding variable
        $vars['storiestype'] = FormUtil::getPassedValue('storiestype', null, 'POST');
        $vars['category']    = FormUtil::getPassedValue('category', null, 'POST');
        $vars['limit']       = (int)FormUtil::getPassedValue('limit', null, 'POST');

        // write back the new contents
        $blockinfo['content'] = BlockUtil::varsToContent($vars);

        // clear the block cache
        $this->view->clear_cache('block/stories.tpl');

        return $blockinfo;
    }
}