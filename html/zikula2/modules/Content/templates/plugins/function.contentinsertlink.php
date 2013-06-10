<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */

function smarty_function_contentinsertlink($params, $view)
{
    $dom = ZLanguage::getModuleDomain('Content');
    $pageId = $params['pageId'];
    $contentAreaIndex = $params['contentAreaIndex'];
    $position = isset($params['position']) ? $params['position'] : 0;
    $url = ModUtil::url('Content', 'admin', 'newContent',
            array('pid' => $pageId,
            'cai' => $contentAreaIndex,
            'position' => $position));
    $url = DataUtil::formatForDisplay($url);
    $html = "<a href=\"$url\" class=\"content-action\">" . __("Add new content here", $dom) . "</a>";

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $html);
    } else {
        return $html;
    }
}

