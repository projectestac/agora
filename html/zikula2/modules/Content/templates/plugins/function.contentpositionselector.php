<?php

function smarty_function_contentpositionselector($params, $view)
{
    return $view->registerPlugin('Content_Form_Plugin_PositionSelector', $params);
}
