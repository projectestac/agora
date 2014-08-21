<?php

/**
 * Content flickr plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */
require_once 'modules/Content/lib/vendor/phpFlickr-3.1/phpFlickr.php';

class Content_ContentType_Flickr extends Content_AbstractContentType
{

    protected $userName;
    protected $tags;
    protected $photoCount;

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getPhotoCount()
    {
        return $this->photoCount;
    }

    public function setPhotoCount($photoCount)
    {
        $this->photoCount = $photoCount;
    }

    function getTitle()
    {
        return $this->__('Photos from Flickr.com');
    }

    function getDescription()
    {
        return $this->__('Display thumbnails from specific Flickr user or tags.');
    }

    function getAdminInfo()
    {
        return $this->__('If your want to add Flickr photos to your content then you need a Flickr API key. You can get this from <a href="http://www.flickr.com/api">flickr.com</a>.');
    }

    function isActive()
    {
        $apiKey = ModUtil::getVar('Content', 'flickrApiKey');
        if (!empty($apiKey)) {
            return true;
        }
        return false;
    }

    function loadData(&$data)
    {
        $this->userName = $data['userName'];
        $this->tags = $data['tags'];
        $this->photoCount = $data['photoCount'];
    }

    function display()
    {
        $flickr = new phpFlickr(ModUtil::getVar('Content', 'flickrApiKey'));
        $flickr->enableCache("fs", System::getVar('temp'));

        // Find the NSID of the username
        $person = $flickr->people_findByUsername($this->userName);

        // Get the photos
        //$photos = $flickr->people_getPublicPhotos($person['id'], NULL, $this->photoCount);
        $photos = $flickr->photos_search(array(
                    'user_id' => $person['id'],
                    'tags' => $this->tags,
                    'per_page' => $this->photoCount));

        $photoData = array();
        foreach ((array)$photos['photo'] as $photo) {
            $photoData[] = array(
                'title' => DataUtil::formatForDisplayHTML($this->decode($photo['title'])),
                'src' => $flickr->buildPhotoURL($photo, "Square"),
                'url' => "http://www.flickr.com/photos/$photo[owner]/$photo[id]");
        }

        $this->view->assign('photos', $photoData);

        return $this->view->fetch($this->getTemplate());
    }

    function displayEditing()
    {
        return $this->__f('Flickr photos from user %1$s associated with tags %2$s', array($this->userName, $this->tags));
    }

    function getDefaultData()
    {
        return array('userName' => '', 'tags' => '', 'photoCount' => 8);
    }

    function startEditing()
    {
        $this->view->assign('flickrApiKey', ModUtil::getVar('Content', 'flickrApiKey'));
    }

    function decode($s)
    {
        return mb_convert_encoding($s, mb_detect_encoding($s), 'UTF-8');
    }

}