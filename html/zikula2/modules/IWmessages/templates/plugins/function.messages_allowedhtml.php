<?php
function smarty_function_messages_allowedhtml($params, &$smarty)
{
    $AllowableHTML = System::getVar('AllowableHTML');
    $allowedhtml = '';
    foreach ($AllowableHTML as $key => $access) {
        if ($access > 0) {
            $allowedhtml .= '&lt;' . htmlspecialchars($key) . '&gt; ';
        }
    }

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $allowedhtml);
    } else {
        return $allowedhtml;
    }
}