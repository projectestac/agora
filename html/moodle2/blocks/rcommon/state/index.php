<?php

    require_once('../../../config.php');
    require_once($CFG->libdir.'/adminlib.php');
    require_login();
    admin_externalpage_setup('marsupialstate');
    echo $OUTPUT->header();

    $connection_error = "";
    //If it's necessary, check Atria connectivity

    //Number of users with credentials in the total
    $total_users = get_users(false, '', true);

    $with_credentials = $DB->get_record_sql ('SELECT DISTINCT count(u.id) AS with_credentials FROM {user} u WHERE u.id IN (SELECT uc.euserid FROM {rcommon_user_credentials} uc GROUP BY uc.euserid)');
    $with_credentials = $with_credentials->with_credentials;

    $a = new StdClass;
    $a->total_users = $total_users;
    $a->with_credentials = $with_credentials;

    //Publishers and books
    $publisher_books = $DB->get_records_sql('SELECT p.id, p.name, p.username, p.password, p.urlwsbookstructure as url, count(b.id) AS books FROM {rcommon_publisher} p LEFT JOIN {rcommon_books} b ON p.id=b.publisherid GROUP BY p.id, p.name, p.username, p.password, p.urlwsbookstructure ORDER BY p.name');

    //Print javascript
    // MARSUPIAL *********** MODIFICAT -> Get the yui lib js version moodle 2.x, and check if is version 2.4
    // 2012.12.1 @abertranb
    $add_variable_str_moodle_24 = "";
    $add_end_variable_str_moodle_24 = "";
//    if ($CFG->version < '2012120301.06') {
    if ($CFG->branch < 24) {
        $PAGE->requires->yui2_lib(array('json','connection', 'dom-event'));
    } else { //not required in version 2.4
        $add_variable_str_moodle_24 = '
        	YUI().use(\'yui2-json\', \'yui2-connection\', \'yui2-event\', function(Y) {
            var YAHOO = Y.YUI2;';
        $add_end_variable_str_moodle_24 =  '});';
    }

    // *********** ORIGINAL
    //require_js(array('yui_dom-event', 'yui_connection', 'yui_json'));
    // ********** FI

    echo '	<script type="text/javascript">
                            var callback = {  success: function(o) {
								document.getElementById("loading_small").style.visibility = "hidden";
								document.getElementById("publishers_list").innerHTML = o.responseText;
								},
                                failure: function(o) {
                                	document.getElementById("loading_small").style.visibility = "hidden";
                                },
                                argument: []
                           	};

                            function check_publishers() {
                                '.$add_variable_str_moodle_24.'
                                    document.getElementById("loading_small").style.visibility = "visible";
                                    YAHOO.util.Connect.asyncRequest("POST","'.$CFG->wwwroot.'/blocks/rcommon/state/check_publishers.php",callback);
                                 '.$add_end_variable_str_moodle_24.'
                            }
              </script>';

    //Print information
    echo '<h2 class="headingblock header ">'.get_string('marsupialstats','block_rcommon').'</h2>';
    echo '<div class="box generalbox generalboxcontent">';

    echo '<p><b>'.get_string('user_credentials', 'block_rcommon').'</b><br/>'.get_string('users_proportion', 'block_rcommon', $a).'. <br /><a href="print_users.php">'.get_string('show_users', 'block_rcommon').'</a></p><br/>';

    echo '<p><b>'.get_string('publishers', 'block_rcommon').'</b>';

    if($publisher_books){
            echo '<a name="publishers"></a>
            <br/>'.get_string('publishers_and_books', 'block_rcommon').'
            <br/>
            <div id="publishers_list"><ul>';
            foreach ($publisher_books as $publisher){
                    echo '<li>'.$publisher->name.' ('.$publisher->books.')</li>';
            }
            echo '</div></ul>';
            echo '<a href="#publishers" onClick="javascript:check_publishers()">'.get_string('check_publishers', 'block_rcommon').'</a> <span style="font-size:small">('.get_string('wait_please', 'block_rcommon').')</span> <img id="loading_small" style="visibility:hidden" src="'.$OUTPUT->pix_url('i/loading_small').'" alt="loading_small" />';

    }else{
            echo '<br/>'.get_string('no_publishers', 'block_rcommon');
    }

    echo '</p></div>';

    echo $OUTPUT->footer();
