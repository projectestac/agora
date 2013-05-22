<?php
/**
 * Content RSS plugin
 *
 * @copyright (C) 2007, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */
class Content_ContentType_Rss extends Content_AbstractContentType
{
    protected $url;
    protected $includeContent;
    protected $refreshTime;
    protected $maxNoOfItems;

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getIncludeContent()
    {
        return $this->includeContent;
    }

    public function setIncludeContent($includeContent)
    {
        $this->includeContent = $includeContent;
    }

    public function getRefreshTime()
    {
        return $this->refreshTime;
    }

    public function setRefreshTime($refreshTime)
    {
        $this->refreshTime = $refreshTime;
    }

    public function getMaxNoOfItems()
    {
        return $this->maxNoOfItems;
    }

    public function setMaxNoOfItems($maxNoOfItems)
    {
        $this->maxNoOfItems = $maxNoOfItems;
    }

    function getTitle()
    {
        return $this->__('RSS feed');
    }
    function getDescription()
    {
        return $this->__('Display list of items in an RSS feed. Needs the ZFeed system plugin.');
    }
    function isActive()
    {
        // check for the availability of the ZFeed systemplugin that provides SimplePie
        if (PluginUtil::isAvailable(PluginUtil::getServiceId('SystemPlugin_ZFeed_Plugin'))) {
            return true;
        }
        return false;
    }
    function loadData(&$data)
    {
        $this->url = $data['url'];
        $this->includeContent = $data['includeContent'];
        $this->refreshTime = $data['refreshTime'];
        $this->maxNoOfItems = $data['maxNoOfItems'];
    }
    function display()
    {
        // call ZFeed that provides SimplePie
        $this->feed = new ZFeed($this->url, System::getVar('temp'), $this->refreshTime * 60);
        $items = $this->feed->get_items();
        //$items = $this->feed->get_items(0, $this->maxNoOfItems);
        
        $itemsData = array();
        foreach ($items as $item) {
            if (count($itemsData) < $this->maxNoOfItems) {
                $itemsData[] = array(
                    'title' => $this->decode($item->get_title()),
                    'description' => $this->decode($item->get_description()),
                    'permalink' => $item->get_permalink());
            }
        }
        $this->feedData = array(
            'title' => $this->decode($this->feed->get_title()),
            'description' => $this->decode($this->feed->get_description()),
            'permalink' => $this->feed->get_permalink(),
            'items' => $itemsData);

        $this->view->assign('feed', $this->feedData);
        $this->view->assign('includeContent', $this->includeContent);

        return $this->view->fetch($this->getTemplate());
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