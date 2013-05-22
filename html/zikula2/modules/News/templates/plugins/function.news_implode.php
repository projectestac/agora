<?php

function smarty_function_news_implode($args, &$smarty)
{
    $sep   = (!isset($args['seperator']) || empty($args['seperator'])) ? "," : $args['seperator'];
    $value = $args['value'];
    if (!is_array($value)) {
        $value = array(
            (string) $value);
    }
    $valueList = implode($sep, $value);

    if (isset($args['assign'])) {
        $smarty->assign($args['assign'], $valueList);
    } else {
        return $valueList;
    }
}
