<?php // $Id: mysql.php,v 1.33 2006/10/26 22:39:14 stronk7 Exp $

// THIS FILE IS DEPRECATED!  PLEASE DO NOT MAKE CHANGES TO IT!
//
// IT IS USED ONLY FOR UPGRADES FROM BEFORE MOODLE 1.7, ALL 
// LATER CHANGES SHOULD USE upgrade.php IN THIS DIRECTORY.

function rscorm_upgrade($oldversion) {
/// This function does anything necessary to upgrade
/// older versions to match current functionality
    global $CFG;
    if ($oldversion < 2004033000) {
        table_column("rscorm", "", "auto", "TINYINT", "1", "UNSIGNED", "0", "NOT NULL", "summary"); 
    }
    if ($oldversion < 2004040900) {
        table_column("rscorm_sco_users", "", "cmi_core_score_raw", "FLOAT", "3", "", "0", "NOT NULL", "cmi_core_session_time");
    }
    if ($oldversion < 2004061800) {
        table_column("rscorm", "", "popup", "VARCHAR", "255", "", "", "NOT NULL", "auto");
        table_column("rscorm", "reference", "reference", "VARCHAR", "255", "", "", "NOT NULL");
    }
    if ($oldversion < 2004070800) {
        table_column("rscorm_scoes", "", "datafromlms", "TEXT", "", "", "", "NOT NULL", "title");
        modify_database("", "ALTER TABLE `{$CFG->prefix}rscorm_sco_users` DROP `cmi_launch_data`;");
    }
    if ($oldversion < 2004071700) {
        table_column("rscorm_scoes", "", "manifest", "VARCHAR", "255", "", "", "NOT NULL", "scorm");
        table_column("rscorm_scoes", "", "organization", "VARCHAR", "255", "", "", "NOT NULL", "manifest");
    }
    if ($oldversion < 2004071900) {
        table_column("rscorm", "", "maxgrade", "FLOAT", "3", "", "0", "NOT NULL", "reference");
        table_column("rscorm", "", "grademethod", "TINYINT", "2", "", "0", "NOT NULL", "maxgrade");
    }

    if ($oldversion < 2004111200) {
        execute_sql("ALTER TABLE {$CFG->prefix}scorm DROP INDEX course;",false);
        execute_sql("ALTER TABLE {$CFG->prefix}rscorm_scoes DROP INDEX scorm;",false);
        execute_sql("ALTER TABLE {$CFG->prefix}rscorm_sco_users DROP INDEX scormid;",false);
        execute_sql("ALTER TABLE {$CFG->prefix}rscorm_sco_users DROP INDEX userid;",false);
        execute_sql("ALTER TABLE {$CFG->prefix}rscorm_sco_users DROP INDEX scoid;",false);

        modify_database('','ALTER TABLE prefix_scorm ADD INDEX course (course);');
        modify_database('','ALTER TABLE prefix_scorm_scoes ADD INDEX scorm (scorm);');
        modify_database('','ALTER TABLE prefix_scorm_sco_users ADD INDEX scormid (scormid);');
        modify_database('','ALTER TABLE prefix_scorm_sco_users ADD INDEX userid (userid);');
        modify_database('','ALTER TABLE prefix_scorm_sco_users ADD INDEX scoid (scoid);');
    }
    
    if ($oldversion < 2005031300) {
        table_column("rscorm_scoes", "", "prerequisites", "VARCHAR", "200", "", "", "NOT NULL", "title");
        table_column("rscorm_scoes", "", "maxtimeallowed", "VARCHAR", "13", "", "", "NOT NULL", "prerequisites");
        table_column("rscorm_scoes", "", "timelimitaction", "VARCHAR", "19", "", "", "NOT NULL", "maxtimeallowed");
        table_column("rscorm_scoes", "", "masteryscore", "VARCHAR", "200", "", "", "NOT NULL", "datafromlms");

        $oldscoes = get_records_select("rscorm_scoes","1","id ASC");
        table_column("rscorm_scoes", "type", "scormtype", "VARCHAR", "5", "", "", "NOT NULL");
        if(!empty($oldscoes)) {
            foreach ($oldscoes as $sco) {
                $sco->scormtype = $sco->type;
                unset($sco->type);
                update_record("rscorm_scoes",$sco);
            }
        }

        execute_sql("CREATE TABLE {$CFG->prefix}rscorm_scoes_track (
                        id int(10) unsigned NOT NULL auto_increment,
                        userid int(10) unsigned NOT NULL default '0',
                        scormid int(10) NOT NULL default '0',
                        scoid int(10) unsigned NOT NULL default '0',
                        element varchar(255) NOT NULL default '',
                        value longtext NOT NULL default '',
                        PRIMARY KEY  (userid, scormid, scoid, element),
                        UNIQUE (userid, scormid, scoid, element),
                        KEY userdata (userid, scormid, scoid),
                        KEY id (id)
                    ) TYPE=MyISAM;",false); 
    
        $oldtrackingdata = get_records_select("rscorm_sco_users","1","id ASC");
        $oldelements = array ('cmi_core_lesson_location',
                              'cmi_core_lesson_status',
                              'cmi_core_exit',
                              'cmi_core_total_time',
                              'cmi_core_score_raw',
                              'cmi_suspend_data');

        if(!empty($oldtrackingdata)) {
            foreach ($oldtrackingdata as $oldtrack) {
                $newtrack = '';
                $newtrack->userid = $oldtrack->userid;
                $newtrack->scormid = $oldtrack->scormid;
                $newtrack->scoid = $oldtrack->scoid;

                foreach ( $oldelements as $element) {
                    $newtrack->element = $element;
                    $newtrack->value = $oldtrack->$element;
                    if ($newtrack->value == NULL) {
                        $newtrack->value = '';
                    }
                    insert_record("rscorm_scoes_track",$newtrack,false);
                }
            }
        }

        modify_database('',"DROP TABLE prefix_scorm_sco_users");
        modify_database('',"INSERT INTO prefix_log_display (module, action, mtable, field) VALUES ('rscorm', 'review', 'resource', 'name')");
    }
    
    if ($oldversion < 2005040200) {
        execute_sql('ALTER TABLE `'.$CFG->prefix.'scorm` DROP `popup`');    // Old field
    }

    if ($oldversion < 2005040400) {
       table_column("rscorm_scoes", "", "parameters", "VARCHAR", "255", "", "", "NOT NULL", "launch");
    }
    
    if ($oldversion < 2005040700) {
        execute_sql("ALTER TABLE {$CFG->prefix}rscorm_scoes_track DROP PRIMARY KEY;");
        execute_sql("ALTER TABLE {$CFG->prefix}rscorm_scoes_track DROP KEY userdata;");
        execute_sql("ALTER TABLE {$CFG->prefix}rscorm_scoes_track DROP INDEX userid");
        modify_database('','ALTER TABLE prefix_scorm_scoes_track ADD UNIQUE track (userid,scormid,scoid,element);');
        modify_database('','ALTER TABLE prefix_scorm_scoes_track ADD PRIMARY KEY id (id);');
        modify_database('','ALTER TABLE prefix_scorm_scoes_track ADD INDEX scormid (scormid);');
        modify_database('','ALTER TABLE prefix_scorm_scoes_track ADD INDEX userid (userid);');
        modify_database('','ALTER TABLE prefix_scorm_scoes_track ADD INDEX scoid (scoid);');
        modify_database('','ALTER TABLE prefix_scorm_scoes_track ADD INDEX element (element);');
        execute_sql("ALTER TABLE {$CFG->prefix}rscorm_scoes_track DROP INDEX id;");
        table_column("rscorm_scoes", "timelimitaction", "timelimitaction", "VARCHAR", "19", "", "", "NOT NULL");
        table_column("rscorm_scoes", "scormtype", "scormtype", "VARCHAR", "5", "", "", "NOT NULL");
    }
    
    if ($oldversion < 2005041500) {
        if ($scorms = get_records_select("rscorm","1","id ASC")) {
            foreach ($scorms as $scorm) {
                if (strlen($scorm->datadir) == 14) {
                    $basedir = $CFG->dataroot.'/'.$scorm->course;
                    $scormdir = '/moddata/rscorm';
                    rename($basedir.$scormdir.$scorm->datadir,$basedir.$scormdir.'/'.$scorm->id);
                }
            }
        }
        execute_sql('ALTER TABLE `'.$CFG->prefix.'scorm` DROP `datadir`');    // Old field
    }

    if ($oldversion < 2005041600) {
       table_column("rscorm", "", "version", "VARCHAR", "9", "", "SCORM_1.2", "NOT NULL", "reference");
    }

    if ($oldversion < 2005042700) {
        $trackingdata = get_records_select("rscorm_scoes_track","1","id ASC");
        if (!empty($trackingdata)) {
            $oldelements = array ('cmi_core_lesson_location',
                                  'cmi_core_lesson_status',
                                  'cmi_core_exit',
                                  'cmi_core_total_time',
                                  'cmi_core_score_raw',
                                  'cmi_suspend_data');
            $newelements = array ('cmi.core.lesson_location',
                                  'cmi.core.lesson_status',
                                  'cmi.core.exit',
                                  'cmi.core.total_time',
                                  'cmi.core.score.raw',
                                  'cmi.suspend_data');
            foreach ($trackingdata as $track) {
                if (($pos = array_search($track->element,$oldelements)) !== false) {
                    $track->element = $newelements[$pos];
                    update_record('rscorm_scoes_track',$track);
                }
            }
        }
    }

    if ($oldversion < 2005042800) {
       table_column("rscorm", "", "browsemode", "TINYINT", "2", "", "1", "NOT NULL", "summary");
    }

    if ($oldversion < 2005050800) {
       table_column("rscorm", "", "width", "INT", "10", "", "800", "NOT NULL", "auto");
       table_column("rscorm", "", "height", "INT", "10", "", "600", "NOT NULL", "width");
    }

    if ($oldversion < 2005052200) {
       table_column("rscorm_scoes_track", "", "timemodified", "INT", "10", "UNSIGNED", "0", "NOT NULL", "value");
    }
    
    if ($oldversion < 2005052700) {
       table_column("rscorm", "", "popup", "TINYINT", "1", "UNSIGNED", "0", "NOT NULL", "auto");
    }
    
    if ($oldversion < 2005070600) {
        table_column("rscorm", "", "hidetoc", "TINYINT", "1", "UNSIGNED", "0", "NOT NULL", "browsemode"); 
        $scorms = get_records_select("rscorm","1","id ASC");
        table_column("rscorm", "browsemode", "hidebrowse", "TINYINT", "1", "UNSIGNED", "0", "NOT NULL", "");
        if (!empty($scorms)) {
            foreach($scorms as $scorm) {
                if ($scorm->browsemode = 1) {
                    $scorm->hidebrowse = 0;
                } else {
                    $scorm->hidebrowse = 1;
                }
                update_record('rscorm',$scorm);
            }
        }
    }

    if ($oldversion < 2005092500) {
        table_column("rscorm", "", "hidenav", "TINYINT", "1", "UNSIGNED", "0", "NOT NULL", "hidetoc"); 
        table_column("rscorm", "", "options", "VARCHAR", "255", "", "", "NOT NULL","popup");
    }

    if ($oldversion < 2005092600) {
        table_column("rscorm_scoes_track", "", "attempt", "INT", "10", "UNSIGNED", "1", "NOT NULL", "scoid"); 
        execute_sql("ALTER TABLE {$CFG->prefix}rscorm_scoes_track DROP INDEX track");
        modify_database('','ALTER TABLE prefix_scorm_scoes_track ADD UNIQUE track (userid,scormid,scoid,attempt,element);');
    }

    if ($oldversion < 2005102800) {
        table_column("rscorm", "", "maxattempt", "INT", "10", "UNSIGNED", "1", "NOT NULL", "maxgrade"); 
    }

    if ($oldversion < 2006021400) {    //some people have this werid key - see bug 4742
        execute_sql("ALTER TABLE {$CFG->prefix}rscorm_scoes_track DROP INDEX elemeny;",false);  // do it silently
        execute_sql("ALTER TABLE {$CFG->prefix}rscorm_scoes_track ADD INDEX element(element(255));",false);
    }

    if ($oldversion < 2006102600) {
        table_column("rscorm", "", "skipview", "TINYINT", "1", "UNSIGNED", "1", "NOT NULL", "launch"); 
    }

    if ($oldversion < 2006102702) {   /// A month in advance!
        execute_sql("DELETE FROM {$CFG->prefix}log_display WHERE module = 'rscorm' AND action = 'review' AND mtable = 'resource' AND field = 'name';", false);  // MDL-6516
        execute_sql("INSERT INTO {$CFG->prefix}log_display (module, action, mtable, field) VALUES ('rscorm', 'review', 'rscorm', 'name');", false);
    }

    //////  DO NOT ADD NEW THINGS HERE!!  USE upgrade.php and the lib/ddllib.php functions.

    return true;
}
?>
