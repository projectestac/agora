<?php

/**
 * Content BreadCrumb Plugin
 *
 * @copyright (C) 2010 - 2011, Sven Strickroth <email@cs-ware.de>
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */
class Content_ContentType_Breadcrumb extends Content_AbstractContentType
{
    protected $includeSelf;
    protected $translateTitles;
    protected $useGraphics;

    public function getIncludeSelf()
    {
        return $this->includeSelf;
    }
    public function setIncludeSelf($includeSelf)
    {
        $this->includeSelf = $includeSelf;
    }

    public function getTranslateTitles()
    {
        return $this->translateTitles;
    }
    public function setTranslateTitles($translateTitles)
    {
        $this->translateTitles = $translateTitles;
    }

    public function getUseGraphics()
    {
        return $this->useGraphics;
    }
    public function setUseGraphics($useGraphics)
    {
        $this->useGraphics = $useGraphics;
    }

    function getTitle()
    {
        return $this->__('BreadCrumb');
    }

    function getDescription()
    {
        return $this->__('Show breadcrumbs for hierarchical pages');
    }

    function isTranslatable()
    {
        return false;
    }

    function loadData(&$data)
    {
        if (isset($data['includeSelf'])) {
            $this->includeSelf = (bool) $data['includeSelf'];
        } else {
            $this->includeSelf = true;
        }
        if (isset($data['translateTitles'])) {
            $this->translateTitles = (bool) $data['translateTitles'];
        } else {
            $this->translateTitles = true;
        }
        if (isset($data['useGraphics'])) {
            $this->useGraphics = (bool) $data['useGraphics'];
        } else {
            $this->useGraphics = false;
        }
    }

    function display()
    {
        $path = array();
        $pageid = $this->getPageId();
        while ($pageid > 0) {
            $page = ModUtil::apiFunc('Content', 'Page', 'getPage', array(
                        'id' => $pageid,
                        'includeContent' => false,
                        'translate' => $this->translateTitles));
            if (!isset($this->includeSelf) || $this->includeSelf || $pageid != $this->getPageId()) {
                array_unshift($path, $page);
            }
            $pageid = $page['parentPageId'];
        }

        $this->view->assign('thispage', $this->getPageId());
        $this->view->assign('path', $path);
        $this->view->assign('useGraphics', $this->useGraphics);

        return $this->view->fetch($this->getTemplate());
    }

    function displayEditing()
    {
        return '';
    }

    function getDefaultData()
    {
        return array('includeSelf' => true, 
            'translateTitles' => true, 
            'useGraphics' => false);
    }

}