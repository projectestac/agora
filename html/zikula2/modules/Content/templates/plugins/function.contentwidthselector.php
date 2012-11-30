<?php

function smarty_function_contentwidthselector($params, $view)
{
    return $view->registerPlugin('Content_Form_Plugin_WidthSelector', $params);
}
