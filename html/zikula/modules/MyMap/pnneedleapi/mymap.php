<?php
/**
 * @package      MyMap
 * @version      $Id: mymap.php 90 2008-08-24 09:05:08Z quan $
 * @author       Florian Schieï¿œl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2008
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 
/**
 * MyMap needle
 *
 * @param $args['nid'] 	int	(needle id = picture id)
 * @return array()
 */
function MyMap_needleapi_mymap($args)
{
    $dom = ZLanguage::getModuleDomain('MyMap');
    // Get arguments from argument array
    $nid = (int)$args['nid'];
    
    // cache the results
    static $cache;
    if(!isset($cache)) {
        $cache = array();
    } 
    
    // load language
    pnModLangLoad('MyMap','user');
    
	// Now the main needle part    
    if(!empty($nid)) {
        if(!isset($cache[$nid])) {
            // not in cache array
            if(pnModAvailable('MyMap')) {
              	$result		= pnModAPIFunc('MyMap','user','getCodeForMap',array('id' => $nid));
              	if (!$result) $cache[$nid] = '<em>' . DataUtil::formatForDisplay(__('Map with given ID not found', $dom)) . '</em>';
              	else $cache[$nid] = $result;
            } 
			else {
                $cache[$nid] = '<em>' . DataUtil::formatForDisplay(_MYMAPNOTAVAILABLE) . '</em>';
            }
        }
        $result = $cache[$nid];
    } 
	else {
        $result = '<em>' . DataUtil::formatForDisplay(_MYMAPNONEEDLEID) . '</em>';
    }
    return $result;    
}
?>