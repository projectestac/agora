<?php

function smarty_function_contentpagepath($params, $view)
{
    if (!isset($params['pageId']))
        return $smarty->trigger_error('contentpagepath: pageId parameter required');

    $pageId = (int)$params['pageId'];
    $language = isset($params['language']) ? $params['language'] : null;

    $path = ModUtil::apiFunc('Content', 'Page', 'getPagePath',
            array('pageId' => $params['pageId']));
    if ($path === false)
        return $smarty->trigger_error(LogUtil::getErrorMessagesText());

    $result = "<span class=\"content-path\">";
    $first = true;
    foreach ($path as $page)
    {
        $result .= ($first ? '' : ' / ') . $page['title'];
        $first = false;
    }

    $result .= " [$pageId]";

    $info = '';
    if (!empty($language))
    {
        $info .= $language;
    }
    if (!empty($info))
        $result .= " ($info)";

    $result .= " </span>";

    if (array_key_exists('assign', $params))
        $view->assign($params['assign'], $result);
    else
        return $result;
}
