<?php

/*
 * This file contains extra functions for Agora and XTECBlocs services
 */

function is_xtecadmin() {
    
    global $current_user;
    
    if ($current_user->user_login == 'xtecadmin') {
        return true;
    } else {
        return false;
    }
}
