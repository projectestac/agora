<?php

function smarty_function_contentcontenttypeselector($params, $view)
{
    return $view->registerPlugin('Content_Form_Plugin_TypeSelector', $params);
}
