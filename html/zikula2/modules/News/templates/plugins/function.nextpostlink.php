<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.nextpostlink.php 75 2009-02-24 04:51:52Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_3rdParty_Modules
 * @subpackage News
*/

/**
 * view plugin
 *
 * This file is a plugin for view, the Zikula implementation of Smarty
 *
 * @package Zikula_3rdParty_Modules
 * @subpackage News
 * @version $Id: function.nextpostlink.php 75 2009-02-24 04:51:52Z mateo $
 * @author The Zikula development team
 * @link http://www.zikula.org The Zikula Home Page
 * @copyright Copyright (C) 2002 by the Zikula Development Team
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * Smarty function to display a link to the next post
 *
 * Example
 * <!--[nextpostlink sid=$info.sid layout='%link% <span class="news_metanav">&raquo;</span>']-->
 *
 * @author Mark West
 * @since 20/10/03
 * @see function.nextpostlink.php::smarty_function_nextpostlink()
 * @param array $params All attributes passed to this function from the template
 * @param object &$smarty Reference to the Smarty object
 * @param integer $sid article id
 * @param string $layout HTML string in which to insert link
 * @return string the results of the module function
 */
function smarty_function_nextpostlink($params, &$smarty)
{
    if (!isset($params['sid'])) {
        // get the info template var
        $info = $smarty->get_template_vars('info');
        $params['sid'] = $info['sid'];
    }

    if (!isset($params['layout'])) {
        $params['layout'] = '%link% <span class="news_metanav">&raquo;</span>';
    }

    $article = ModUtil::apiFunc('News', 'user', 'getall',
                            array('query' => array(array('sid', '>', $params[sid])),
                                  'orderdir' => 'ASC',
                                  'numitems' => 1));

    if (!$article) {
        return;
    }

    $articlelink = '<a href="'.DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'display', array('sid' => $article[0]['sid']))).'">'.DataUtil::formatForDisplay($article[0]['title']).'</a>';
    $articlelink = str_replace('%link%', $articlelink, $params['layout']);

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $articlelink);
    } else {
        return $articlelink;
    }
}
