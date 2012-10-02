<?php

function smarty_function_pngetallusers ($params, &$smarty)
{
    $assign  = isset($params['assign'])  ? $params['assign']   : null;
    
    $result  = pnModAPIFunc('users', 'user', 'getall');
    $users   = array();
	 foreach ($result as $userTemp){
	 
	 	$users[] = array('text' => $userTemp['uname'], 'value' => $userTemp['uid']);
	 }	
    if ($assign) {
        $smarty->assign($assign, $users);
    } else {
        return $users;
    }
}
