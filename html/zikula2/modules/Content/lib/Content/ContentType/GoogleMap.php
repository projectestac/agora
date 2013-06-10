<?php
/**
 * Content google map plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */

class Content_ContentType_GoogleMap extends Content_AbstractContentType
{
    protected $longitude;
    protected $latitude;
    protected $zoom;
    protected $height;
    protected $text;
    protected $infotext;
    protected $streetviewcontrol;
    protected $directionslink;

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

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getInfotext()
    {
        return $this->infotext;
    }

    public function setInfotext($infotext)
    {
        $this->infotext = $infotext;
    }

    public function getStreetviewcontrol()
    {
        return $this->streetviewcontrol;
    }

    public function setStreetviewcontrol($streetviewcontrol)
    {
        $this->streetviewcontrol = $streetviewcontrol;
    }

    public function getDirectionslink()
    {
        return $this->directionslink;
    }

    public function setDirectionslink($directionslink)
    {
        $this->directionslink = $directionslink;
    }

    function getTitle()
    {
        return $this->__('Google map');
    }
    function getDescription()
    {
        return $this->__('Display Google map position.');
    }
    function getAdminInfo()
    {
        return $this->__('A Google maps API key is not needed any more in the new version 3 of the Javascript API.');
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
        $this->height = $data['height'];
        $this->text = $data['text'];
        $this->infotext = $data['infotext'];
        $this->streetviewcontrol = $data['streetviewcontrol'];
        $this->directionslink = $data['directionslink'];
    }
    function display()
    {
        $this->view->assign('longitude', $this->longitude);
        $this->view->assign('latitude', $this->latitude);
        $this->view->assign('zoom', $this->zoom);
        $this->view->assign('height', $this->height);
        $this->view->assign('text', $this->text);
        $this->view->assign('infotext', $this->infotext);
        $this->view->assign('streetviewcontrol', $this->streetviewcontrol);
        $this->view->assign('directionslink', $this->directionslink);
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
            'longitude' => '12.36185073852539',
            'latitude' => '55.8756960390043',
            'zoom' => 5,
            'height' => '400',
            'text' => '',
            'infotext' => '',
            'streetviewcontrol' => false,
            'directionslink' => false);
    }
    function startEditing()
    {
        $this->view->assign('language', ZLanguage::getLanguageCode());
        $this->view->assign('longitude', $this->longitude);
        $this->view->assign('latitude', $this->latitude);
        $this->view->assign('zoom', $this->zoom);
    }
    function getSearchableText()
    {
        return html_entity_decode(strip_tags($this->text));
    }
}