<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */

/**
 * Content needle
 * @param $args['nid'] needle id
 * @return array()
 */
function content_needleapi_content($args)
{
    $dom = ZLanguage::getModuleDomain('Content');
    // Get arguments from argument array
    $nid = $args['nid'];
    unset($args);

    // cache the results
    static $cache;
    if (!isset($cache)) {
        $cache = array();
    }

    if (!empty($nid)) {
        if (!isset($cache[$nid])) {
            // not in cache array
            if (ModUtil::available('Content')) {

                $contentpage = ModUtil::apiFunc('Content', 'Page', 'getPage', array('id' => $nid, 'includeContent' => false));
                if ($contentpage != false) {
                    $cache[$nid] = '<a href="' . DataUtil::formatForDisplay(ModUtil::url('Content', 'user', 'view', array('pid' => $nid))) . '" title="' . DataUtil::formatForDisplay($contentpage['title']) . '">' . DataUtil::formatForDisplay($contentpage['title']) . '</a>';
                } else {
                    $cache[$nid] = '<em>' . DataUtil::formatForDisplay(__('Unknown id', $dom)) . '</em>';
                }
            } else {
                $cache[$nid] = '<em>' . DataUtil::formatForDisplay(__('Content not available', $dom)) . '</em>';
            }
        }
        $result = $cache[$nid];
    } else {
        $result = '<em>' . DataUtil::formatForDisplay(__('No needle id', $dom)) . '</em>';
    }
    return $result;

}
