<?php

function smarty_function_contentlayoutselector($params, $view)
{
    return $view->registerPlugin('Content_Form_Plugin_LayoutSelector', $params);
}
