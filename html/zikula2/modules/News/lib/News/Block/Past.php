<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: past.php 75 2009-02-24 04:51:52Z mateo $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Mark West <mark@zikula.org>
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage News
 */

class News_Block_Past extends Zikula_Controller_AbstractBlock
{
    /**
     * initialise block
     *
     * @author       The Zikula Development Team
     */
    public function init()
    {
        SecurityUtil::registerPermissionSchema('Pastblock::', 'Block ID::');
    }

    /**
     * get information on block
     *
     * @author       The Zikula Development Team
     * @return       array       The block information
     */
    public function info()
    {
        return array('module'         => 'News',
                'text_type'      => $this->__('Past articles'),
                'text_type_long' => $this->__('Display past articles'),
                'allow_multiple' => true,
                'form_content'   => false,
                'form_refresh'   => false,
                'show_preview'   => true);
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
        if (!SecurityUtil::checkPermission('Pastblock::', "$blockinfo[bid]::", ACCESS_READ)) {
            return;
        }

        // get the number of stories shown on the frontpage
        $storyhome = $this->getVar('storyhome', 10);

        // Break out options from our content field
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // Defaults
        if (empty($vars['limit'])) {
            $vars['limit'] = 10;
        }

        if ($this->getVar('enablecategorization')) {
            $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
        }
        // call the API
        $articles = ModUtil::apiFunc('News', 'user', 'getall', array(
                    'displayonindex' => 1,
                    'order' => 'from',
                    'status' => News_Api_User::STATUS_PUBLISHED,
                    'startnum' => $storyhome + 1,
                    'numitems' => $vars['limit'],
                    'catregistry' => isset($catregistry) ? $catregistry : null));

        if (($articles === false) || (empty($articles))) {
            return;
        }

        // loop round the return articles grouping by date
        $count        = 0;
        $news         = array();
        $newscumul    = array();
        $limitreached = false;
        foreach ($articles as $article)
        {
            $info  = ModUtil::apiFunc('News', 'user', 'getArticleInfo', $article);
            $links = ModUtil::apiFunc('News', 'user', 'getArticleLinks', $info);
            if (SecurityUtil::checkPermission('News::', "$info[cr_uid]::$info[sid]", ACCESS_READ)) {
                $preformat['title'] = "<a href=\"$links[fullarticle]\">$info[title]</a>";
            } else {
                $preformat['title'] = $info['title'];
            }

            $daydate = DateUtil::formatDatetime(strtotime($info['from']), '%Y-%m-%d');

            // Reset the time
            if (!isset($currentday)) {
                $currentday = $daydate;
            }

            // If it's a different date, save the cumul and continue
            if ($currentday != $daydate) {
                $news[$currentday] = $newscumul;
                $newscumul = array();
                $currentday = $daydate;
            }
            $newscumul[] = array('info'      => $info,
                    'links'     => $links,
                    'preformat' => $preformat);
        }

        if (!isset($news[$currentday])) {
            $news[$currentday] = $newscumul;
        }

        $this->view->assign('news', $news);

        if (empty($blockinfo['title'])) {
            //! default past block title
            $blockinfo['title'] = $this->__('Past articles');
        }

        $blockinfo['content'] = $this->view->fetch('block/past.tpl');

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
        if (empty($vars['limit'])) {
            $vars['limit'] = 10;
        }

        // As Admin output changes often, we do not want caching.
        $this->view->setCaching(false);

        // assign the approriate values
        $this->view->assign($vars);

        $this->view->assign('dom');

        // Return the output that has been generated by this function
        return $this->view->fetch('block/past_modify.tpl');
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
        $vars['limit'] = (int)FormUtil::getPassedValue('limit', null, 'POST');

        // write back the new contents
        $blockinfo['content'] = BlockUtil::varsToContent($vars);

        // clear the block cache
        $this->view->clear_cache('block/past.tpl');

        return $blockinfo;
    }
}