<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
class Weblinks_Block_LastWeblinks extends Zikula_Controller_AbstractBlock
{

    /**
     * initialise block
     */
    public function init()
    {
        // Security
        SecurityUtil::registerPermissionSchema('WeblinksBlock::', 'Block title::');
    }

    /**
     * get information on block
     */
    public function info()
    {


        // Values
        return array('text_type' => 'lastweblinks',
            'module' => $this->__('Weblinks'),
            'text_type_long' => $this->__('Latest Weblinks'),
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
        if (!SecurityUtil::checkPermission('WeblinksBlock::', "$blockinfo[title]::", ACCESS_READ)) {
            return;
        }

        // check if the module is available
        if (!ModUtil::available('Weblinks')) {
            return;
        }

        // Break out options from our content field
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // Defaults
        if (!isset($vars['limit'])) {
            $vars['limit'] = 5;
        }


        //  Check if the block is cached
        if ($this->view->is_cached('block/lastweblinks.tpl')) {
            $blockinfo['content'] = $this->view->fetch('block/lastweblinks.tpl');
            return BlockUtil::themeBlock($blockinfo);
        }

        $this->view->assign('weblinks', $this->entityManager->getRepository('Weblinks_Entity_Link')->getLinks(Weblinks_Entity_Link::ACTIVE, ">=", 0, 'date', 'DESC', $vars['limit']));

        // Populate block info and pass to theme
        $blockinfo['content'] = $this->view->fetch('block/lastweblinks.tpl');

        return BlockUtil::themeBlock($blockinfo);
    }

    /**
     * modify block settings
     */
    public function modify($blockinfo)
    {
        // Get current content
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // Defaults
        if (empty($vars['limit'])) {
            $vars['limit'] = 5;
        }

        // assign the block vars
        $this->view->assign($vars);

        // Return output
        return $this->view->fetch('block/weblinks_modify.tpl');
    }

    /**
     * update block settings
     */
    public function update($blockinfo)
    {
        // Get current content
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // alter the corresponding variable
        $vars['limit'] = (int)FormUtil::getPassedValue('limit', 5, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('WeblinksBlock::', "$blockinfo[title]::", ACCESS_ADMIN)) {
            return false;
        }

        // write back the new contents
        $blockinfo['content'] = BlockUtil::varsToContent($vars);

        // clear the block cache
        $this->view->clear_cache('block/lastweblinks.tpl');

        return $blockinfo;
    }

}