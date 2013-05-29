<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
function smarty_function_countsublinks($params, Zikula_View $view)
{
    if (!isset($params['cid']) || !is_numeric($params['cid'])) {
        return LogUtil::registerArgsError();
    }
    
    return countLinksByCategoryRecursive($params['cid']);
}

function countLinksByCategoryRecursive($category)
{
    $count = 0;
    $em = ServiceUtil::getService('doctrine.entitymanager');
    // is category a parent?
    $children = $em->getRepository('Weblinks_Entity_Category')->findBy(array('parent_id' => $category));
    if (isset($children)) {
        foreach ($children as $child) {
            $count += countLinksByCategoryRecursive($child->getCat_id());
        }
    }
    // count the links in the category
    $count += $em->getRepository('Weblinks_Entity_Link')->getCount(Weblinks_Entity_Link::ACTIVE, ">=", $category);
    return $count;
}