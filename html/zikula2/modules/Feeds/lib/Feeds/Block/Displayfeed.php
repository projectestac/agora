<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html

 */
class Feeds_Block_Displayfeed extends Zikula_Controller_AbstractBlock
{

    /**
     * initialise block
     */
    public function init()
    {
        // Security
        SecurityUtil::registerPermissionSchema('Feeds:NewsFeed:', 'Block title::');
    }

    /**
     * get information on block
     */
    public function info()
    {
        return array('module' => 'Feeds',
            'text_type' => $this->__('Display feed'),
            'text_type_long' => $this->__('Show a feed item'),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true,
            'admin_tableless' => true);
    }

    /**
     * display block
     */
    public function display($blockinfo)
    {
        // Security check
        if (!SecurityUtil::checkPermission('Feeds:NewsFeed:', "$blockinfo[title]::", ACCESS_READ)) {
            return;
        }

        // Get variables from content block
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // Defaults
        if (empty($vars['feedid'])) {
            $vars['feedid'] = 1;
        }
        if (empty($vars['displayimage'])) {
            $vars['displayimage'] = 0;
        }
        if (empty($vars['displaydescription'])) {
            $vars['displaydescription'] = 0;
        }
        if (empty($vars['alternatelayout'])) {
            $vars['alternatelayout'] = 0;
        }

        // Get the feed item
        $item = ModUtil::apiFunc('Feeds', 'user', 'get', array('fid' => $vars['feedid']));

        if (!$item) {
            return;
        }

        //  Check if the block is cached
        if ($this->view->is_cached('block/displayfeed.tpl', $item['fid'])) {
            $blockinfo['content'] = $this->view->fetch('block/displayfeed.tpl', $item['fid']);
            return BlockUtil::themeBlock($blockinfo);
        }

        // Get the feed source
        $fullfeed = ModUtil::apiFunc('Feeds', 'user', 'getfeed', array('furl' => $item['url']));

        // Assign the item and feed
        $this->view->assign($item);
        $this->view->assign('feed', $fullfeed);

        // assign the block vars
        $this->view->assign($vars);

        // Populate block info and pass to theme
        $blockinfo['content'] = $this->view->fetch('block/displayfeed.tpl', $item['fid']);

        return BlockUtil::themeBlock($blockinfo);
    }

    /**
     * modify block settings
     */
    public function modify($blockinfo)
    {
        // Create output object
        $this->view->setCaching(false);

        // Get current content
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // Defaults
        if (empty($vars['feedid'])) {
            $vars['feedid'] = 1;
        }
        if (empty($vars['displayimage'])) {
            $vars['displayimage'] = 0;
        }
        if (empty($vars['displaydescription'])) {
            $vars['displaydescription'] = 0;
        }
        if (empty($vars['alternatelayout'])) {
            $vars['alternatelayout'] = 0;
        }
        if (empty($vars['numitems'])) {
            $vars['numitems'] = -1;
        }

        // The API function is called.  The arguments to the function are passed in
        // as their own arguments array
        $items = ModUtil::apiFunc('Feeds', 'user', 'getall');

        // create an array for feednames and id's for the template
        $allfeeds = array();
        foreach ($items as $item) {
            $allfeeds[$item['fid']] = $item['name'];
        }
        $this->view->assign('allfeeds', $allfeeds);

        // assign the block vars
        $this->view->assign($vars);

        // Return output
        return $this->view->fetch('block/displayfeed_modify.tpl');
    }

    /**
     * update block settings
     */
    public function update($blockinfo)
    {
        $vars = array();
        $vars['feedid'] = FormUtil::getPassedValue('feedid', 1, 'POST');
        $vars['numitems'] = FormUtil::getPassedValue('numitems', 0, 'POST');
        $vars['displayimage'] = FormUtil::getPassedValue('displayimage', -1, 'POST');
        $vars['displaydescription'] = FormUtil::getPassedValue('displaydescription', -1, 'POST');
        $vars['alternatelayout'] = FormUtil::getPassedValue('alternatelayout', -1, 'POST');

        $blockinfo['content'] = BlockUtil::varsToContent($vars);

        return $blockinfo;
    }

}