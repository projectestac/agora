<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id:  $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Erik Spaan <erik@erikspaan.nl>
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage News
 */

/*
 * get plugins with type / title
 *
 * @param   $args['id']     int     optional, show specific one or all otherwise
 * @return  array
 */
function News_mailzapi_getPlugins($args)
{
    $dom = ZLanguage::getModuleDomain('News');

    $plugins = array();
    // Add first plugin.. You can add more using more arrays
    $plugins[] = array(
        'pluginid'      => 1,   // internal id for this module
        'title'         => __('News publisher articles list', $dom),
        'description'   => __('Show a list of News publisher articles published since the last newsletter.', $dom),
        'module'        => 'News'
    );
    return $plugins;
}

/*
 * get content for plugins
 *
 * @param   $args['pluginid']       int         id number of plugin (internal id for this module, see getPlugins method)
 * @param   $args['params']         string      optional, show specific one or all otherwise
 * @param   $args['uid']            int         optional, user id for user specific content
 * @param   $args['contenttype']    string      h or t for html or text
 * @param   $args['last']           datetime    timestamp of last newsletter
 * @return  array
 */
function News_mailzapi_getContent($args)
{
    $dom = ZLanguage::getModuleDomain('News');

    switch($args['pluginid']) {
        case 1:
            //$uid = $args['uid'];
            // Get matching news stories published since last newsletter
            // No selection on categories made !!
            $items = pnModAPIFunc('News', 'user', 'getall',
                                  array('numitems'     => pnModGetVar('News', 'itemsperpage'),
                                        'status'       => 0,
                                        'from'         => DateUtil::getDatetime($args['last']),
                                        'filterbydate' => true));
            if ($items != false) {
                if ($args['contenttype'] == 't') {
                    $counter = 0;
                    $output.="\n";
                    foreach ($items as $item) {
                        $counter++;
                        $output .= $counter . '. ' . $item['title'] . " (" . __f('by %1$s on %2$s', array($item['contributor'], DateUtil::formatDatetime($item['from'],'datebrief')), $dom) . ")\n";
                    }
                } else {
                    $render = pnRender::getInstance('News');
                    $render->assign('readperm', SecurityUtil::checkPermission('News::', "::", ACCESS_READ));
                    $render->assign('articles', $items);
                    $output = $render->fetch('mailz_mailz_listarticles.htm');
                }
            } else {
                $output = __f('No News publisher articles since last newsletter on %s.', DateUtil::formatDatetime($args['last'],'datebrief'), $dom) . "\n";
            }
            return $output;
    }
    return '';
}

