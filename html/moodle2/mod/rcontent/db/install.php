<?php  //$Id: upgrade.php,v 1.13.2.3 2008/08/01 04:30:45 piers Exp $

// This file keeps track of upgrades to 
// the scorm module
//
// Sometimes, changes between versions involve
// alterations to database structures and other
// major things that may break installations.
//
// The upgrade function in this file will attempt
// to perform all the necessary actions to upgrade
// your older installtion to the current version.
//
// If there's something it cannot do itself, it
// will tell you what you need to do.
//
// The commands in here will all be database-neutral,
// using the functions defined in lib/ddllib.php

function xmldb_rcontent_install($oldversion=0) {

    global $CFG;

    if (is_file("$CFG->dataroot/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl")){
        if (!unlink("$CFG->dataroot/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl")){
            return false;
        }       
    }    
    return true;
}

?>