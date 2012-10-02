<?php
/**
 * Content RSS plugin
 *
 * @copyright (C) 2007, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: rss.php 356 2010-01-04 14:43:31Z herr.vorragend $
 * @license See license.txt
 */

//if (class_exists('SimplePie')) {
//    Loader::requireOnce('includes/classes/SimplePie/simplepie.inc');
//}

require_once 'includes/classes/SimplePie/simplepie.inc';

class content_contenttypesapi_RSSPlugin extends contentTypeBase
{
    var $url;
    var $includeContent;
    var $refreshTime;
    var $maxNoOfItems;

    function getModule()
    {
        return 'content';
    }
    function getName()
    {
        return 'rss';
    }
    function getTitle()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('RSS feed', $dom);
    }
    function getDescription()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Display list of items in an RSS feed.', $dom);
    }

    function loadData($data)
    {
        $this->url = $data['url'];
        $this->includeContent = $data['includeContent'];
        $this->refreshTime = $data['refreshTime'];
        $this->maxNoOfItems = $data['maxNoOfItems'];
    }

    function display()
    {
        $this->feed = new SimplePie($this->url, pnConfigGetVar('temp'), $this->refreshTime * 60);

        $items = $this->feed->get_items();

        $itemsData = array();
        foreach ($items as $item) {
            if (count($itemsData) < $this->maxNoOfItems) {
                $itemsData[] = array('title' => $this->decode($item->get_title()), 'description' => $this->decode($item->get_description()), 'permalink' => $item->get_permalink());
            }
        }
        $this->feedData = array('title' => $this->decode($this->feed->get_title()), 'description' => $this->decode($this->feed->get_description()), 'permalink' => $this->feed->get_permalink(), 'items' => $itemsData);

        $render = & pnRender::getInstance('content', false);
        $render->assign('feed', $this->feedData);
        $render->assign('includeContent', $this->includeContent);

        return $render->fetch('contenttype/rss_view.html');
    }

    function displayEditing()
    {
        return "<input value=\"" . DataUtil::formatForDisplay($this->url) . "\" style=\"width: 30em\" readonly=readonly/>";
    }

    function getDefaultData()
    {
        return array('url' => '', 'includeContent' => false, 'refreshTime' => 60, 'maxNoOfItems' => 10);
    }

    function decode($s)
    {
        return mb_convert_encoding($s, mb_detect_encoding($s), $this->feed->get_encoding());
    }
}

function content_contenttypesapi_RSS($args)
{
    return new content_contenttypesapi_RSSPlugin($args['data']);
}

