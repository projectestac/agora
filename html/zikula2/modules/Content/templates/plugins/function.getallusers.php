<?php

function smarty_function_getallusers ($params, $view)
{
    $assign  = isset($params['assign'])  ? $params['assign']   : null;

    $result  = ModUtil::apiFunc('users', 'user', 'getall');
    $users   = array();
    foreach ($result as $userTemp){

        $users[] = array('text' => $userTemp['uname'], 'value' => $userTemp['uid']);
    }
    if ($assign) {
        $view->assign($assign, $users);
    } else {
        return $users;
    }
}
