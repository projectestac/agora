<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */

function smarty_function_contentpageheading($params, $view) 
{
    $html = '<div class="content-page-heading"><h2>' . ($params['header']) . "</h2>\n";

    if (array_key_exists('subheader', $params)) {
        if (isset($params['noescape']) && $params['noescape']) {
            $html .= "<h3>".$params['subheader']."</h3>\n";
        } else {
            $html .= "<h3>".DataUtil::formatForDisplay($params['subheader'])."</h3>\n";
        }
    }
    $html .= "</div>\n";

    if (array_key_exists('assign', $params)) {
        $view->assign($params['assign'], $html);
    } else {
        return $html;
    }
}
