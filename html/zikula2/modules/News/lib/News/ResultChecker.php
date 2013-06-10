<?php

/**
 * Internal callback class used to check permissions to each News item
 * @author Jorn Wildt
 */
class News_ResultChecker
{
    protected $enablecategorization;
    protected $enablecategorybasedpermissions;

    function __construct($enablecategorization, $enablecategorybasedpermissions)
    {
        $this->enablecategorization = $enablecategorization;
        $this->enablecategorybasedpermissions = $enablecategorybasedpermissions;
    }
    // This method is called by DBUtil::selectObjectArrayFilter() for each and every search result.
    // A return value of true means "keep result" - false means "discard".
    function checkResult(&$item)
    {
        $ok = (SecurityUtil::checkPermission('News::', "$item[cr_uid]::$item[sid]", ACCESS_OVERVIEW));
        if ($this->enablecategorization && $this->enablecategorybasedpermissions) {
            ObjectUtil::expandObjectWithCategories($item, 'news', 'sid');
            $ok = $ok && CategoryUtil::hasCategoryAccess($item['__CATEGORIES__'], 'News');
        }
        return $ok;
    }
}