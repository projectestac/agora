<?php
/**
 * Content directory plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: directory.php 385 2010-01-08 13:22:39Z herr.vorragend $
 * @license See license.txt
 */

class content_contenttypesapi_directoryPlugin extends contentTypeBase
{
    var $pid;
    var $includeHeading;
    var $includeSubpage;

    function getModule()
    {
        return 'content';
    }
    function getName()
    {
        return 'directory';
    }
    function getTitle()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Table of contents', $dom);
    }
    function getDescription()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __("A table of contents of headings and subpages (build from this module's pages).", $dom);
    }

    function isTranslatable()
    {
        return false;
    }

    function loadData($data)
    {
        $this->pid = $data['pid'];
        $this->includeHeading = (bool) $data['includeHeading'];
        $this->includeSubpage = (bool) $data['includeSubpage'];
    }

    function display()
    {
        $work = pnSessionGetVar('directory_yournotthefirst', false);
        if ($work)
            return '';
        pnSessionSetVar('directory_yournotthefirst', true);
        $options = array('makeTree' => true);
        $options['orderBy'] = 'setLeft';
        if ($this->includeSubpage && $this->pid != 0) {
            $options['filter']['superParentId'] = $this->pid;
        } elseif (!$this->includeSubpage && $this->pid == 0) {
            $pntable = pnDBGetTables();
            $pageColumn = $pntable['content_page_column'];
            $options['filter']['where'] = "$pageColumn[level] = 0";
        } elseif (!$this->includeSubpage && $this->pid != 0)
            $options['filter']['pageId'] = $this->pid;

        if ($this->includeHeading)
            $options['includeContent'] = true;
        $pages = pnModAPIFunc('content', 'page', 'getPages', $options);
        if (!$work)
            pnSessionDelVar('directory_yournotthefirst');

        if ($this->pid == 0) {
            $directory = array();
            foreach (array_keys($pages) as $page) {
                $directory['directory'][] = $this->_genDirectoryRecursive($pages[$page]);
            }
        } else {
            $directory = $this->_genDirectoryRecursive($pages[0]);
        }

        $render = & pnRender::getInstance('content', false);
        $render->assign('directory', $directory);
        $render->assign('contentId', $this->contentId);
        return $render->fetch('contenttype/directory_view.html');
    }

    function _genDirectoryRecursive(&$pages)
    {
        $directory = array();
        $pageurl = pnModUrl('content', 'user', 'view', array('pid' => $pages['id']));
        if ($pages['content']) {
            foreach (array_keys($pages['content']) as $area) {
                foreach (array_keys($pages['content'][$area]) as $id) {
                    $plugin = &$pages['content'][$area][$id];
                    if ($plugin['plugin']->getModule() == 'content' && $plugin['plugin']->getName() == 'heading') {
                        $directory[] = array('title' => $plugin['data']['text'], 'url' => $pageurl . "#heading_" . $plugin['id']);
                    }
                }
            }
        }

        if ($pages['subPages']) {
            foreach (array_keys($pages['subPages']) as $id) {
                $directory[] = $this->_genDirectoryRecursive($pages['subPages'][$id]);
            }
        }

        return array('title' => $pages['title'], 'url' => $pageurl, 'directory' => $directory);
    }

    function displayEditing()
    {
        $dom = ZLanguage::getModuleDomain('content');
        $page = pnModAPIFunc('content', 'page', 'getPage', array('id' => $this->pid, 'includeContent' => false, 'translate' => false));
        return "<h3>" . __f('Table of contents of %1$s', array("title" => $page['title']), $dom) . "</h3>";
    }

    function getDefaultData()
    {
        return array('pid' => $this->pageId, 'includeHeading' => true, 'includeSubpage' => false);

    }

    function startEditing(&$render)
    {
        $dom = ZLanguage::getModuleDomain('content');
        $pages = pnModAPIFunc('content', 'page', 'getPages', array('makeTree' => false, 'orderBy' => 'setLeft', 'includeContent' => false, 'enableEscape' => false));

        $pidItems = array();
        $pidItems[] = array('text' => __('All pages', $dom), 'value' => "0");
        foreach ($pages as $page) {
            $pidItems[] = array('text' => str_repeat('+', $page['level']) . " " . $page['title'], 'value' => $page['id']);
        }

        $render->assign('pidItems', $pidItems);
    }

    function getSearchableText()
    {
        return;
    }
}

function content_contenttypesapi_directory($args)
{
    return new content_contenttypesapi_directoryPlugin();
}