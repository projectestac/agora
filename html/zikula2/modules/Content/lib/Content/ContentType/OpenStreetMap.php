<?php
/**
 * Content google map plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */

class Content_ContentType_OpenStreetMap extends Content_AbstractContentType
{
    protected $longitude;
    protected $latitude;
    protected $zoom;
    protected $text;
    protected $height;

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getZoom()
    {
        return $this->zoom;
    }

    public function setZoom($zoom)
    {
        $this->zoom = $zoom;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    function getTitle()
    {
        return $this->__('OpenStreetMap map');
    }
    function getDescription()
    {
        return $this->__('Display OpenStreetMap map position.');
    }
    function getAdminInfo()
    {
        return $this->__('If you want to add OpenStreetMap maps to your content you don\'t need an API key.');
    }
    function isTranslatable()
    {
        return true;
    }
    function isActive()
    {
        return true;
    }
    function loadData(&$data)
    {
        $this->longitude = $data['longitude'];
        $this->latitude = $data['latitude'];
        $this->zoom = $data['zoom'];
        $this->text = $data['text'];
        $this->height = $data['height'];
    }
    function display()
    {
        $scripts = array(
            'javascript/ajax/proto_scriptaculous.combined.min.js',
            'http://www.openlayers.org/api/OpenLayers.js',
            'http://www.openstreetmap.org/openlayers/OpenStreetMap.js',
            'modules/Content/javascript/openstreetmap.js');
        PageUtil::addVar('javascript', $scripts);

        $this->view->assign('latitude', $this->latitude);
        $this->view->assign('longitude', $this->longitude);
        $this->view->assign('zoom', $this->zoom);
        $this->view->assign('height', $this->height);
        $this->view->assign('text', DataUtil::formatForDisplayHTML($this->text));
        $this->view->assign('contentId', $this->contentId);
        $this->view->assign('language', ZLanguage::getLanguageCode());

        return $this->view->fetch($this->getTemplate());
    }
    function displayEditing()
    {
        return DataUtil::formatForDisplay($this->text);
    }
    function getDefaultData()
    {
        return array(
            'latitude' => '52.518611',
            'longitude' => '13.408056',
            'zoom' => 5,
            'text' => '',
            'height' => 300);
    }
    function startEditing()
    {
        $scripts = array(
            'javascript/ajax/proto_scriptaculous.combined.min.js',
            'http://www.openlayers.org/api/OpenLayers.js',
            'http://www.openstreetmap.org/openlayers/OpenStreetMap.js',
            'modules/Content/javascript/openstreetmap.js');
        PageUtil::addVar('javascript', $scripts);
    }
    function getSearchableText()
    {
        return html_entity_decode(strip_tags($this->text));
    }
}