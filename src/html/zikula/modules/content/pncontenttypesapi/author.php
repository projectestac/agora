<?php
/**
 * Content author plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: author.php 356 2010-01-04 14:43:31Z herr.vorragend $
 * @license See license.txt
 */

class content_contenttypesapi_authorPlugin extends contentTypeBase
{
    var $uid;

    function getModule()
    {
        return 'content';
    }
    function getName()
    {
        return 'author';
    }
    function getTitle()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Author Infobox', $dom);
    }
    function getDescription()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Various information about the author of the page.', $dom);
    }
    function isTranslatable()
    {
        return false;
    }

    function loadData($data)
    {
        $this->uid = $data['uid'];
    }

    function display()
    {
        $render = & pnRender::getInstance('content', false);
        $render->assign('uid', DataUtil::formatForDisplayHTML($this->uid));
        $render->assign('contentId', $this->contentId);
        return $render->fetch('contenttype/author_view.html');
    }

    function displayEditing()
    {
        return "<h3>" . pnUserGetVar('uname', $this->uid) . "</h3>";
    }

    function getDefaultData()
    {
        return array('uid' => '1');
    }

    function getSearchableText()
    {
        return html_entity_decode(strip_tags(pnUserGetVar($this->uid, 'uname')));
    }
}

function content_contenttypesapi_author($args)
{
    return new content_contenttypesapi_authorPlugin();
}

