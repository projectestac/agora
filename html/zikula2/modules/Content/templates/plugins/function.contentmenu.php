<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */

function smarty_function_contentmenu($params, $view)
{
    $pages = $params['pages'];
    $html = smarty_function_contentmenurec($pages);

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $html);
    } else {
        return $html;
    }
}

function smarty_function_contentmenurec(&$pages)
{
    $html = '';

    if (count($pages) > 0) {
        $html .= '<ul>';
        foreach ($pages as $page) {
            $html .= '<li>';
            $url = ModUtil::url('Content', 'user', 'view',
            array('pid' => $page['id']));
            $url = DataUtil::formatForDisplay($url);
            $html .= "<a href=\"$url\">$page[title]</a>";
            $html .= smarty_function_contentmenurec($page['subPages']);
            $html .= '</li>';
        }
        $html .= '</ul>';
    }

    return $html;
}