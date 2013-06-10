<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
function smarty_function_catpath($params, Zikula_View $view)
{
    $dom = ZLanguage::getModuleDomain('Weblinks');

    if (!isset($params['cid']) || !is_numeric($params['cid'])) {
        return LogUtil::registerArgsError();
    }

    if (!isset($params['linkmyself']) || !is_numeric($params['linkmyself'])) {
        $params['linkmyself'] = 0;
    }

    if (!isset($params['links']) || !is_numeric($params['links'])) {
        $params['links'] = 0;
    }

    if (!isset($params['start']) || !is_numeric($params['start'])) {
        $params['start'] = 0;
    }
    $em = ServiceUtil::getService('doctrine.entitymanager');
    $cat = $em->find('Weblinks_Entity_Category', $params['cid']);

    if ($params['linkmyself']) {
        $cpath = "<a href=\"" . DataUtil::formatForDisplay(ModUtil::url('Weblinks', 'user', 'category', array('cid' => $params['cid']))) . "\"> " . DataUtil::formatForDisplay($cat->getTitle()) . " </a>";
    } else {
        $cpath = DataUtil::formatForDisplay($cat->getTitle());
    }

    for ($v = $cat->getParent_id(); $v != 0; $v = $scat['parent_id']) {
        $scat = $em->find('Weblinks_Entity_Category', $v);

        if ($params['links']) {
            $cpath = "<a href=\"" . DataUtil::formatForDisplay(ModUtil::url('Weblinks', 'user', 'category', array('cid' => $scat->getCat_id()))) . "\"> " . DataUtil::formatForDisplay($scat->getTitle()) . "</a> / $cpath";
        } else {
            $cpath = DataUtil::formatForDisplay($scat->getTitle()) . " / $cpath";
        }
    }

    if ($params['start']) {
        $cpath = "<a href=\"" . DataUtil::formatForDisplay(ModUtil::url('Weblinks', 'user', 'main')) . "\">" . DataUtil::formatForDisplay(__('Start', $dom)) . "</a> / $cpath";
    }

    return $cpath;
}