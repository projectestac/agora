<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */

function smarty_function_contenteditthis($params, $view)
{
    $dom = ZLanguage::getModuleDomain('Content');
    $data = $params['data'];
    $type = $params['type'];
    $access = $params['access'];

    if (!$access['pageEditAllowed']) {
        return '';
    }
    $editmode = SessionUtil::getVar('ContentEditMode');
    $vars = $view->get_template_vars();
    if ($vars['preview']) {
        return '';
    }

    $html = '';

    if ($type == 'page') {
        // Unused ...
        $html = '<div class="content-editthis">';
        $url = DataUtil::formatForDisplay(ModUtil::url('Content', 'admin', 'editPage', array('pid' => $data['id'], 'back' => 1)));
        $translateurl = DataUtil::formatForDisplay(ModUtil::url('Content', 'admin', 'translatePage', array('pid' => $data['id'], 'back' => 1)));
        $html .= "<a href=\"$url\">" .  __("Edit this page", $dom) . "</a>";
        if ($vars['multilingual'] == 1) {
            $html .= "| <a href=\"$translateurl\">". __("Translate this page", $dom) ."</a>";
        }
        $html .= '</div>';
    } elseif ($type == 'content' && $editmode) {
        $html = '<div class="content-editthis">';
        $url = DataUtil::formatForDisplay(ModUtil::url('Content', 'admin', 'editContent', array('cid' => $data['id'], 'back' => 1)));
        $translateurl = DataUtil::formatForDisplay(ModUtil::url('Content', 'admin', 'translateContent', array('cid' => $data['id'], 'back' => 1)));
        $edittext = __f('Edit this: %1$s [ID%2$s]', array($data['title'], $data['id']), $dom);
        $html .= "<a href=\"$url\" title=\"" . __("Click to edit this content item", $dom) . "\">" . $edittext . "</a> ";
        if ($vars['multilingual'] == 1) {
            $html .= "<a href=\"$translateurl\">". __("Translate", $dom) ."</a>";
        }
        $html .= '</div>';
    }

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $html);
    } else {
        return $html;
    }
}
