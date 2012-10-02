<?php

/**
 * Open a connection to the administration database
 *
 * @return Connection handler
 */
function opendb() {
    global $agora;
    require_once('../config/env-config.php');
    if (!$con = mysql_connect($agora['admin']['host'].':'.$agora['admin']['port'], $agora['admin']['username'], $agora['admin']['userpwd']))
        return false;
    if (!mysql_select_db($agora['admin']['database'], $con))
        return false;
    return $con;
}

if (!$con = opendb())
    die('connection failed');

// change default_theme name in module_vars table
$sql = "update z_module_vars set pn_value='" . 's:8:"IWportal";' . "' WHERE pn_name='Default_Theme'";

if (!$result = mysql_query($sql, $con)) {
    die('Error: ' .  $sql);
}

// change theme name in themes table
$sql = "update z_themes set pn_name='IWportal',pn_directory='IWportal' WHERE pn_name='iw_xtec2'";

if (!$result = mysql_query($sql, $con)) {
    die('Error: ' .  $sql);
}

// remove theme iw_xtec_2
$sql = "delete from z_themes where pn_directory='iw_xtec_2'";

if (!$result = mysql_query($sql, $con)) {
    die('Error: ' .  $sql);
}

// change agoraPortal name to Agoraportal in module table
$sql = "update z_modules set pn_name='Agoraportal',pn_directory='Agoraportal',pn_displayname='Agoraportal',pn_url='Agoraportal',pn_securityschema='" . 'a:1:{s:13:"Agoraportal::";s:2:"::";}' . "' WHERE pn_name='agoraPortal'";

if (!$result = mysql_query($sql, $con)) {
    die('Error: ' .  $sql);
}

// set module legal as disabled
$sql = "update z_modules set pn_state=2 WHERE pn_name='legal'";

if (!$result = mysql_query($sql, $con)) {
    die('Error: ' .  $sql);
}

// change agoraPortal name to Agoraportal in module vars table
$sql = "update z_module_vars set pn_modname='Agoraportal' WHERE pn_modname='agoraPortal'";

if (!$result = mysql_query($sql, $con)) {
    die('Error: ' .  $sql);
}

// change Agoraportal blocks names in blocks table
$sql = "update z_blocks set pn_bkey='AgoraMenu' WHERE pn_bkey='agoraMenu'";

if (!$result = mysql_query($sql, $con)) {
    die('Error: ' .  $sql);
}

$sql = "update z_blocks set pn_bkey='AgoraQuestion' WHERE pn_bkey='agoraQuestion'";

if (!$result = mysql_query($sql, $con)) {
    die('Error: ' .  $sql);
}

// change module name in permissions component
$sql = "update z_group_perms set pn_component='Agoraportal::' WHERE pn_component='agoraPortal::'";

if (!$result = mysql_query($sql, $con)) {
    die('Error: ' .  $sql);
}

// launch zikula upgrader
header('location:upgrade.php');