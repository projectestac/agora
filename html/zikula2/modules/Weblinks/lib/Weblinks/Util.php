<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
class Weblinks_Util
{
    /**
     * Provide the default modVar values
     * 
     * @return array 
     */
    public static function getDefaults()
    {
        return array('perpage' => 25,
            'newlinks' => 10,
            'bestlinks' => 10,
            'linksresults' => 10,
            'linksinblock' => 10,
            'popular' => 500,
            'mostpoplinkspercentrigger' => 0,
            'mostpoplinks' => 25,
            'featurebox' => 1,
            'targetblank' => 0,
            'doubleurl' => 0,
            'unregbroken' => 0,
            'blockunregmodify' => 0,
            'links_anonaddlinklock' => 0,
            'thumber' => 0,
            'thumbersize' => 'XL',
            'showPendingContent' => 1,
            );
    }
    
    /**
     * Scan an array of categories or links and return only those items
     *   that pass the permissions test at level declared
     * 
     * @param array $inboundArray
     * @param integer $level (Core Constant)
     * @return array 
     */
    public static function checkCategoryPermissions(array $inboundArray, $level = ACCESS_OVERVIEW)
    {
        $outboundArray = array();
        foreach ($inboundArray as $key => $entity) {
            if (isset($entity['category'])) {
                // array holds Links
                $instanceLeft = $entity['category']['title'];
                $instanceRight = $entity['category']['cat_id'];
            } else {
                // array holds categories
                $instanceLeft = $entity['title'];
                $instanceRight = $entity['cat_id'];
            }
            if (!SecurityUtil::checkPermission('Weblinks::Category', "$instanceLeft::$instanceRight", $level)){
                continue;
            }
            $outboundArray[$key] = $entity;
        }
        return $outboundArray;
    }
    
    /**
     * This is not used (yet) in v3.0.0 but left as a future opportunity...
     * 
     * Scan an array of links and return only those items that pass
     *   the permissions test at level declared
     * 
     * @param array $inboundArray
     * @param integer $level (Core Constant)
     * @return array 
     */
    public static function checkLinkPermissions(array $inboundArray, $level = ACCESS_OVERVIEW)
    {
        $outboundArray = array();
        foreach ($inboundArray as $key => $entity) {
            if (!SecurityUtil::checkPermission('Weblinks::Link', "::$entity[lid]", $level)) {
                continue;
            }
            $outboundArray[$key] = $entity;
        }
        return $outboundArray;
    }
    
    /**
     * Validate one link
     * @param array $link
     * @return type 
     */
    public static function validateLink($link)
    {
        if ($link['url'] == 'http://' || $link['url'] == '') {
            $fp = false;
        } else {
            $vurl = parse_url($link['url']);
            if (isset($vurl['host'])) {
                $fp = fsockopen($vurl['host'], 80, $errno, $errstr, 15);
            } else {
                $fp = false;
            }
        }
        return $fp;
    }

}