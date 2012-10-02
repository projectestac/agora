<?php
/**
 * Zikula Application Framework
 *
 * @link http://www.zikula.org
 * @version $Id: Loader.class.php 22543 2007-07-31 12:50:09Z rgasch $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Simon Birtwistle simon@itbegins.co.uk
 * @package Zikula_Docs
 * @subpackage Tour
 */

/**
 * Get the sub links for the first time tour
 * @author Simon Birtwistle
 * @return string HTML string
 */
function Tour_userapi_getsublinks($args) {
    if (!SecurityUtil::checkPermission('Tour::', '::', ACCESS_READ)) {
        return array();
    }

    $dom = ZLanguage::getModuleDomain('Tour');

    $ext = FormUtil::getPassedValue('ext', isset($args['ext']) ? $args['ext'] : null, 'GET');
    // Generate links for module tutorial pages.
    if (!empty($ext)) {
        return pnModAPIFunc('Tour', 'user', 'getextlinks');
    }
    
    $page = FormUtil::getPassedValue('page', isset($args['page']) ? $args['page'] : null, 'GET');
    $links = array();
    switch ($page) {
        case 'firsttime':
        case 'firsttimemodules':
        case 'firsttimeblocks':
        case 'firsttimethemes':
            $links[] = array('url' => pnModURL('Tour', 'user', 'display', array ('page' => 'firsttime')), 'text' => __('Start', $dom));
            $links[] = array('url' => pnModURL('Tour', 'user', 'display', array ('page' => 'firsttimethemes')), 'text' => __('Themes', $dom));
            $links[] = array('url' => pnModURL('Tour', 'user', 'display', array ('page' => 'firsttimemodules')), 'text' => __('Modules', $dom));
            $links[] = array('url' => pnModURL('Tour', 'user', 'display', array ('page' => 'firsttimeblocks')), 'text' => __('Blocks', $dom));
            break;
    }
    return $links;
}

/**
 * Get an extensions' page links.
 * @author Simon Birtwistle
 * @return string HTML string
 */
function Tour_userapi_getextlinks($args) {
    $ext = FormUtil::getPassedValue('ext', isset($args['ext']) ? $args['ext'] : null, 'GET');
    $exttype = FormUtil::getPassedValue('exttype', isset($args['exttype']) ? $args['exttype'] : 'module', 'GET');

    $dom = ZLanguage::getModuleDomain('Tour');

    switch ($exttype) {
        case 'distro':
            $directory = 'docs/distribution';
            break;
        case 'module':
            $id = pnModGetIDFromName($ext);
            if (!$id) {
                LogUtil::registerError(__f('Unknown module %s in Tour_userapi_getsublinks.', $ext, $dom));
                pnRedirect(pnModURL('Tour', 'user', 'main'));
            }
            $info = pnModGetInfo($id);
            $directory = 'modules/'.$info['directory'].'/pndocs/';
            break;
        case 'theme':
            $id = pnThemeGetIDFromName($ext);
            if (!$id) {
                LogUtil::registerError(__f('Unknown theme %s in Tour_userapi_getsublinks.', $ext, $dom));
                pnRedirect(pnModURL('Tour', 'user', 'main'));
            }
            $info = pnThemeGetInfo($id);
            $directory = $info['directory'].'/pndocs/';
            break;
    }
    
    $directory = DataUtil::formatForOS($directory);
    $files = array();
    if ($handle = opendir($directory)) {
        while (false !== ($filename = readdir($handle))) {
            $files[] = $filename;
        }
        closedir($handle);
    }
    
    $files = preg_grep("/tour_page[0-9]\.htm.*/", $files);
    $links = array();
    foreach ($files as $file) {
        $pageno = str_replace(array('tour_page', '.htm', '.html'), '', $file);
        $links[] = array('url' => pnModURL('Tour', 'user', 'exttour', array ('page' => $pageno, 'ext' => $ext, 'exttype' => $exttype)), 'text' => __f('Page %s', $pageno, $dom));
    }
    return $links;
}
