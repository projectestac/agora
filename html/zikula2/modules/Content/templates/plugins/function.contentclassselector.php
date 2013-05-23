<?php


function smarty_function_contentclassselector($params, $view)
{
    return $view->registerPlugin('Content_Form_Plugin_ClassSelector', $params);
}
