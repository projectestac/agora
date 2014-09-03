<?php

mtrace("Executing OAuth cron...","\n");
mtrace("Deleting expired tokens...","\n");

$time = time();
$DB->delete_records_select('oauth_access_tokens','expires < :time', array('time'=>$time));
$DB->delete_records_select('oauth_authorization_codes','expires < :time', array('time'=>$time));
$DB->delete_records_select('oauth_refresh_tokens','expires < :time', array('time'=>$time));


mtrace("OAuth cron done.","\n");