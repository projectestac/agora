<?php

function smarty_function_contentmoduleselector($params, $view)
{
    return $view->registerPlugin('Content_Form_Plugin_ModuleSelector', $params);
}
