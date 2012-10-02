<?php

// This file keeps track of upgrades to the advices block.
//
// Sometimes, changes between versions involve alterations to database 
// structures and other major things that may break installations.
//
// The upgrade function in this file will attempt to perform all the necessary 
// actions to upgrade your older installation to current version.
//
// If there's something it cannot do by itself, it will inform you what you 
// need to do.
//
// The commands here will all be database-neutral, using the functions defined 
// in lib/ddllib.php

function xmldb_block_advices_upgrade ($oldversion=0) {

    global $CFG, $THEME, $db;

    $result = true;

    return $result;
}
