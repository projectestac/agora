<?php
	
    require_once('../../../config.php');
    require_once($CFG->libdir.'/adminlib.php');

    admin_externalpage_setup('marsupialstate');
    // MARSUPIAL *********** MODIFICAT -> Require JS Moodle 2.x
    // 2012.10.22 @abertranb
    if ($CFG->branch < 24) { //In version 2.4 is not needed
        $PAGE->requires->yui2_lib('tabview');
        $PAGE->requires->yui2_lib('datatable');
    }
    // ********** ORIGINAL
    //require_js(array('yui_yahoo', 'yui_event', 'yui_element', 'yui_tabview', 'yui_dom-event'));
    // ********** FI
// MARSUPIAL ************ MODIFICAT -> Deprecated code in Moodle 2.x
// 2012.11.17 @abertranb
    echo $OUTPUT->header();
// ************ MODIFICAT
    //admin_externalpage_print_header();
// ************ FI
        
    //Get contents
    //$without_credentials = get_records_sql ('SELECT id, firstname, lastname FROM (SELECT id, firstname, lastname FROM '.$CFG->prefix.'user WHERE confirmed=1 AND deleted=0 AND username<>\'guest\' MINUS SELECT cr.euserid, u.firstname, u.lastname FROM '.$CFG->prefix.'rcommon_user_credentials cr, '.$CFG->prefix.'user u WHERE u.id = cr.euserid ) ORDER BY firstname');
    $without_credentials = $DB->get_records_sql ('SELECT id, firstname, lastname, username FROM '.$CFG->prefix.'user 
                                            WHERE confirmed=1 AND deleted=0 AND username <> \'guest\' AND id NOT IN
                                            (SELECT u.id    FROM '.$CFG->prefix.'rcommon_user_credentials cr, '.$CFG->prefix.'user u WHERE u.id = cr.euserid)
                                            ORDER BY firstname');
    $without_credentials_content = '';
    $without_credentials_count = 0;
    if ($without_credentials) {
        $without_credentials_count = count($without_credentials);
        $without_credentials_content = ($without_credentials) ? '<ul>' : '';
        foreach ($without_credentials as $user){
                $without_credentials_content .= '<li><a href="../keyManager.php?action=manage&username='.$user->username.'" >'.$user->firstname.' '.$user->lastname.'</a></li>';
        }
    $without_credentials_content .= '</ul>';
    }

    $with_credentials = $DB->get_records_sql ('SELECT u.id AS userid, COUNT(DISTINCT cr.id) AS books, u.firstname, u.lastname, u.username FROM '.$CFG->prefix.'user u, '.$CFG->prefix.'rcommon_user_credentials cr WHERE u.id=cr.euserid GROUP BY u.id, u.firstname, u.lastname, u.username ORDER BY u.firstname');
    $with_credentials_content = '';
    $with_credentials_count = 0;
    if ($with_credentials){
        $with_credentials_count = count($with_credentials);
            $with_credentials_content .= '<ul>';
            foreach ($with_credentials as $user){
                    $with_credentials_content .= '<li><a href="../keyManager.php?action=manage&username='.$user->username.'" >'.$user->firstname.' '.$user->lastname.'</a> ('.$user->books.' '.get_string('books', 'block_rcommon').') </li>';				
            }
            $with_credentials_content .= '</ul>';
    }
	
    echo '<h2 class="headingblock header ">'.get_string('marsupialstats','block_rcommon').' - '.get_string('user_credentials', 'block_rcommon').'</h2>';

    echo '<div style="text-align:right; margin:10px 0px"><a href="index.php">'.get_string('back_to_stats', 'block_rcommon').'</a></div>';
    //Data in tabs
  
    $yui_code = '<div id="marsupial_tabs" class="yui-navset">
                            <ul id="marsupial_tab_heading" class="yui-nav">
                                    <li class="selected"><a href="#tab1"><em>'.get_string('without_credentials', 'block_rcommon').' ('.$without_credentials_count.')</em></a></li>
                                    <li><a href="#tab2"><em>'.get_string('with_credentials', 'block_rcommon').' ('.$with_credentials_count.')</em></a></li>
                            </ul>            
                            <div class="yui-content">
                                    <div>'.$without_credentials_content.'</div>
                                    <div>'.$with_credentials_content.'</div>
                            </div>
                    </div>
                    <script type="text/javascript">
					//<![CDATA[ ';
        //Check if version is under 2.4 Moodle            
        if ($CFG->branch < 24) { 
            $yui_code .= '//document.body.className += " yui-skin-sam";
                                (function(){
            var marsupial_tab_heading = document.getElementById("marsupial_tab_heading");
            marsupial_tab_heading.style.display = "";
        
            new YAHOO.widget.TabView("marsupial_tabs");
            })();';
        } else {
            $yui_code .= '
                YUI().use("yui2-tabview", function(Y) {
                    var marsupial_tab_heading = document.getElementById("marsupial_tab_heading");
                    marsupial_tab_heading.style.display = "";
                    new Y.YUI2.widget.TabView("marsupial_tabs");
                });';
        }                                          
        $yui_code .= '//]]
		</script>';

    echo $yui_code;
    
    echo $OUTPUT->footer();
    