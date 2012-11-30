<?php
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file: Frank Schummertz
// Purpose of file:  MultiHook needle API
// ----------------------------------------------------------------------

/**
 * News needle
 * @param $args['nid'] needle id
 * @return array()
 */
function News_needleapi_news($args)
{
    // Get arguments from argument array
    $nid = $args['nid'];
    unset($args);

    // cache the results
    static $cache;

    if (!isset($cache)) {
        $cache = array();
    }

    $dom = ZLanguage::getModuleDomain('News');

    if (!empty($nid)) {
        if (!isset($cache[$nid])) {
            // not in cache array

            $obj = ModUtil::apiFunc('News', 'user', 'get', array('sid' => $nid));

            if ($obj != false) {
                $url   = DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'display', array('sid' => $nid)));
                $title = DataUtil::formatForDisplay($obj['title']);
                $cache[$nid] = '<a href="' . $url . '" title="' . $title . '">' . $title . '</a>';
            } else {
                $cache[$nid] = '<em>' . __f("Error! Database contains no article with the title '%s'.", $nid, $dom) . '</em>';
            }
        }
        $result = $cache[$nid];
    } else {
        $result = '<em>' . __('Error! No needle ID provided.', $dom) . '</em>';
    }

    return $result;
}
