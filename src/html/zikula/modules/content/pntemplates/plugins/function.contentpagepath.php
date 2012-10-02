<?php

function smarty_function_contentpagepath($params, &$smarty)
{
    if (!isset($params['pageId']))
    return $smarty->trigger_error('contentpagepath: pageId parameter required');

    $pageId = (int)$params['pageId'];
    $language = isset($params['language']) ? $params['language'] : null;

    $path = pnModAPIFunc('content', 'page', 'getPagePath',
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
    $smarty->assign($params['assign'], $result);
    else
    return $result;
}
