<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */


function smarty_block_contentFormFrame($params, $content, $view)
{
    $result = $view->registerPlugin('Zikula_Form_Plugin_ValidationSummary', $params);
    $result .= $view->registerBlock('Content_Form_Plugin_FormFrame', $params, $content);

    return $result;
}
