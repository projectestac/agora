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

class News_Block_Big extends Zikula_Controller_AbstractBlock
{
    /**
     * initialise block
     *
     * @author       The Zikula Development Team
     */
    public function init()
    {
        SecurityUtil::registerPermissionSchema('Bigblock::', 'Block ID::');
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
                'text_type'      => $this->__('Most-read article'),
                'text_type_long' => $this->__('Today\'s most-read article'),
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
        if (!SecurityUtil::checkPermission('Bigblock::', "$blockinfo[bid]::", ACCESS_READ)) {
            return;
        }

        // get todays date
        $today = getdate();
        $day = $today['mday'];
        if ($day < 10) {
            $day = "0$day";
        }
        $month = $today['mon'];
        if ($month < 10) {
            $month = "0$month";
        }
        $year = $today['year'];
        $tdate = "$year-$month-$day";

        // call the API
        $articles = ModUtil::apiFunc('News', 'user', 'getall', array(
                    'tdate' => $tdate,
                    'displayonindex' => 1,
                    'order' => 'counter',
                    'status' => News_Api_User::STATUS_PUBLISHED,
                    'numitems' => 1));

        if (empty($articles)) {
            return;
        } else {
            $info = ModUtil::apiFunc('News', 'user', 'getArticleInfo', $row = $articles[0]);
            if (SecurityUtil::checkPermission('News::', "$info[cr_uid]::$info[sid]", ACCESS_OVERVIEW)) {
                $links = ModUtil::apiFunc('News', 'user', 'getArticleLinks', $info);
                $preformat = ModUtil::apiFunc('News', 'user', 'getArticlePreformat', array('info' => $info, 'links' => $links));
            } else {
                return;
            }
        }

        if (empty($blockinfo['title'])) {
            $blockinfo['title'] = $this->__('Today\'s most-read article');
        }

        $this->view->assign(array('info' => $info,
                'links' => $links,
                'preformat' => $preformat));

        $blockinfo['content'] = $this->view->fetch('block/big.tpl');

        return BlockUtil::themeBlock($blockinfo);
    }
}