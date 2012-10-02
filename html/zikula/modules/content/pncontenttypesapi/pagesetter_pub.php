<?php

class content_contenttypesapi_pagesetter_pubPlugin extends contentTypeBase
{
    var $tid;
    var $pid;
    var $tpl;

    function getModule()
    {
        return 'content';
    }
    function getName()
    {
        return 'pagesetter_pub';
    }
    function getTitle()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Pagesetter publication', $dom);
    }
    function getDescription()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Display a Pagesetter publication.', $dom);
    }
    function isTranslatable()
    {
        return false;
    }

    function loadData($data)
    {
        $this->tid = $data['tid'];
        $this->pid = $data['pid'];
        $this->tpl = $data['tpl'];
    }

    function display()
    {

        $tid = DataUtil::formatForDisplayHTML($this->tid);
        $pid = DataUtil::formatForDisplayHTML($this->pid);
        $tpl = DataUtil::formatForDisplayHTML($this->tpl);

        $url = pnModURL('pagesetter', 'user', 'view', array('tid' => $tid, 'pid' => $pid));
        $url = htmlspecialchars($url);

        // get the formatted publication
        $publication = pnModAPIFunc('pagesetter', 'user', 'getPubFormatted', array('tid' => $tid, 'pid' => $pid, 'format' => $tpl, 'useTransformHooks' => false,
            'coreExtra' => array('page' => 0, 'baseURL' => $url, 'format' => $tpl)));

        // render instance - assign publication
        $render = & pnRender::getInstance('content', false);
        $render->assign('publication', $publication);

        return $render->fetch('contenttype/pagesetter_pub_view.html');
    }

    function displayEditing()
    {
        $tid = DataUtil::formatForDisplayHTML($this->tid);
        $pid = DataUtil::formatForDisplayHTML($this->pid);
        $tpl = DataUtil::formatForDisplayHTML($this->tpl);

        $url = pnModURL('pagesetter', 'user', 'view', array('tid' => $tid, 'pid' => $pid));
        $url = htmlspecialchars($url);

        // get the formatted publication
        $publication = pnModAPIFunc('pagesetter', 'user', 'getPubFormatted', array('tid' => $tid, 'pid' => $pid, 'format' => $tpl, 'useTransformHooks' => false,
            'coreExtra' => array('page' => 0, 'baseURL' => $url, 'format' => $tpl)));

        // render instance - assign publication
        $render = & pnRender::getInstance('content', false);
        $render->assign('publication', $publication);

        return $render->fetch('contenttype/pagesetter_pub_view.html');

    }

    function getDefaultData()
    {
        // deault values
        return array('tid' => pnModGetVar('pagesetter', 'frontpagePubType'), 'pid' => '', 'tpl' => 'full');
    }
}

function content_contenttypesapi_pagesetter_pub($args)
{
    return new content_contenttypesapi_pagesetter_pubPlugin($args['data']);
}

?>
