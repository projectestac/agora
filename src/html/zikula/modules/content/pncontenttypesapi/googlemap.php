<?php
/**
 * Content google map plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: googlemap.php 356 2010-01-04 14:43:31Z herr.vorragend $
 * @license See license.txt
 */

class content_contenttypesapi_googlemapPlugin extends contentTypeBase
{
    var $longitude;
    var $latitude;
    var $zoom;
    var $text;

    function getModule()
    {
        return 'content';
    }
    function getName()
    {
        return 'googlemap';
    }
    function getTitle()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Google map', $dom);
    }
    function getDescription()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Display Google map position.', $dom);
    }
    function getAdminInfo()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('If you want to add Google maps to your content then you need a Google maps API key. You can get this from <a href="http://www.google.com/apis/maps/signup.html">google.com</a>.', $dom);
    }
    function isTranslatable()
    {
        return true;
    }

    function isActive()
    {
        $apiKey = pnModGetVar('content', 'googlemapApiKey');
        if (!empty($apiKey))
            return true;
        return false;
    }

    function loadData($data)
    {
        $this->longitude = $data['longitude'];
        $this->latitude = $data['latitude'];
        $this->zoom = $data['zoom'];
        $this->text = $data['text'];
    }

    function display()
    {
        $scripts = array('javascript/ajax/prototype.js', 'modules/content/pnjavascript/googlemap.js');
        PageUtil::addVar('javascript', $scripts);

        $render = & pnRender::getInstance('content', false);
        $render->assign('longitude', $this->longitude);
        $render->assign('latitude', $this->latitude);
        $render->assign('zoom', $this->zoom);
        $render->assign('text', DataUtil::formatForDisplayHTML($this->text));
        $render->assign('googlemapApiKey', DataUtil::formatForDisplayHTML(pnModGetVar('content', 'googlemapApiKey')));
        $render->assign('contentId', $this->contentId);

        return $render->fetch('contenttype/googlemap_view.html');
    }

    function displayEditing()
    {
        return DataUtil::formatForDisplay($this->text);
    }

    function getDefaultData()
    {
        return array('longitude' => '12.36185073852539', 'latitude' => '55.8756960390043', 'zoom' => 4, 'text' => '');
    }

    function startEditing(&$render)
    {
        $scripts = array('javascript/ajax/prototype.js', 'modules/content/pnjavascript/googlemap.js');
        PageUtil::addVar('javascript', $scripts);
        $render->assign('googlemapApiKey', pnModGetVar('content', 'googlemapApiKey'));
    }

    function getSearchableText()
    {
        return html_entity_decode(strip_tags($this->text));
    }
}

function content_contenttypesapi_googlemap($args)
{
    return new content_contenttypesapi_googlemapPlugin($args['data']);
}

