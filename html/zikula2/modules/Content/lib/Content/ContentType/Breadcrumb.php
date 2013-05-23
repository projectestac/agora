<?php

/**
 * Content BreadCrumb Plugin
 *
 * @copyright (C) 2010, Sven Strickroth, TU Clausthal
 * @link http://code.zikula.org/content
 * @license See license.txt
 */
class Content_ContentType_Breadcrumb extends Content_AbstractContentType
{

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

    function display()
    {
        $path = array();
        $pageid = $this->getPageId();
        while ($pageid > 0) {
            $page = ModUtil::apiFunc('Content', 'Page', 'getPage', array(
                        'id' => $pageid,
                        'includeContent' => false,
                        'translate' => false));
            array_unshift($path, $page);
            $pageid = $page['parentPageId'];
        }

        $this->view->assign('thispage', $this->getPageId());
        $this->view->assign('path', $path);

        return $this->view->fetch($this->getTemplate());
    }

    function displayEditing()
    {
        return '';
    }

    function getDefaultData()
    {
        return array();
    }

}