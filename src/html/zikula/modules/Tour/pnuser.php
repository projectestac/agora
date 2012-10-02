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
 * Main user function, simply returnt he tour index page.
 * @author Simon Birtwistle
 * @return string HTML string
 */
function Tour_user_main() {
    return Tour_user_display();
}

/**
 * Display a tour page
 * @author Simon Birtwistle
 * @return string HTML string
 */
function Tour_user_display() {
    $page = FormUtil::getPassedValue('page', 'home', 'GET');

    if ($page == 'extensions') {
        $content = pnModFunc('Tour', 'user', 'extensions');
    } else {
        $render = pnRender::getInstance('Tour');
        $lang = ZLanguage::transformFS(ZLanguage::getLanguageCode());
        $lang = ZLanguage::transformFS(ZLanguage::getLanguageCode());
        if ($render->template_exists($lang.'/tour_user_display_'.$page.'.htm')) {
            $content = $render->fetch($lang.'/tour_user_display_'.$page.'.htm');
        } else {
            $content = $render->fetch('en/tour_user_display_'.$page.'.htm');
        }
    }

    return $content;
}

/**
 * Cycle through all installed modules looking for available module tours
 * @author Simon Birtwistle
 * @return string HTML string
 */
function Tour_user_extensions() {
    $modules = pnModGetAllMods();
    $modpages = array();
    foreach ($modules as $mod) {
        if (file_exists('modules/'.$mod['directory'].'/pndocs/tour_page1.htm')) {
            $modpages[] = $mod['name'];
        }
    }
    $themes = pnThemeGetAllThemes();
    $themepages = array();
    foreach ($themes as $theme) {
        if (file_exists('themes/'.$theme['directory'].'/pndocs/tour_page1.htm')) {
            $themepages[] = $theme['name'];
        }
    }

    $render = pnRender::getInstance('Tour');
    $render->assign('modpages', $modpages);
    $render->assign('themepages', $themepages);
    $lang = ZLanguage::transformFS(ZLanguage::getLanguageCode());
    if ($render->template_exists($lang.'/tour_user_extensions.htm')) {
        $content = $render->fetch($lang.'/tour_user_extensions.htm');
    } else {
        $content = $render->fetch('en/tour_user_extensions.htm');
    }

    return $content;
}

/**
 * Display a tour page from an installed extension, or the distribution's tour page
 * @author Simon Birtwistle
 * @return string HTML string
 */
function Tour_user_exttour() {
    $page = FormUtil::getPassedValue('page', '1', 'GET');
    $ext = FormUtil::getPassedValue('ext', '', 'GET');
    $exttype = FormUtil::getPassedValue('exttype', 'module', 'GET');

    $dom = ZLanguage::getModuleDomain('Tour');

    switch ($exttype) {
        case 'distro':
            $directory = 'docs/distribution';
            break;
        case 'module':
            $id = pnModGetIDFromName($ext);
            if (!$id) {
                LogUtil::registerError(__f('Unknown module %s in Tour_user_exttour.', $ext, $dom));
                pnRedirect(pnModURL('Tour', 'user', 'main'));
            }
            $info = pnModGetInfo($id);
            $directory = 'modules/'.$info['directory'].'/pndocs';
            break;
        case 'theme':
            $id = pnThemeGetIDFromName($ext);
            if (!$id) {
                LogUtil::registerError(__f('Unknown theme %s in Tour_user_exttour.', $ext, $dom));
                pnRedirect(pnModURL('Tour', 'user', 'main'));
            }
            $info = pnThemeGetInfo($id);
            $directory = $info['directory'].'/pndocs';
            break;
    }

    $lang = ZLanguage::transformFS(ZLanguage::getLanguageCode());
    $files = array($directory.'/'.$lang.'/tour_page'.$page.'.htm', $directory.'/tour_page'.$page.'.htm');

    $exists = false;
    foreach ($files as $file) {
        $file = DataUtil::formatForOS($file);
        $file = getcwd().'/'.$file;
        if (file_exists($file)) {
            $exists = true;
            break;
        }
    }

    if (!$exists) {
        LogUtil::registerError(__('Tour file does not exist!', $dom));
        return pnRedirect(pnModURL('Tour', 'user', 'extensions', $dom));
    }

    $render = pnRender::getInstance('Tour');
    return $render->fetch('tour_user_menu.htm').$render->fetch('file://'.$file);
}
