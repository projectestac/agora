<?php

    require_once('../../../config.php');
    require_once($CFG->libdir.'/adminlib.php');
    require_login();
    admin_externalpage_setup('marsupialstate');
// MARSUPIAL ************ MODIFICAT -> Deprecated code in Moodle 2.x
// 2012.11.17 @abertranb
    echo $OUTPUT->header();
// ************ MODIFICAT    
    //admin_externalpage_print_header();
// ************ FI
    
    $connection_error = "";
    //If it's necessary, check Atria connectivity
// MARSUPIAL ************ ELIMINAT -> Deprecated code in Moodle 2.x
// 2013.01.29 @abertranb
 
//    	if (isset($CFG->useatria) && $CFG->useatria){
// ************ MODIFICAT    
    	//    if (!isset($CFG->useatria) || $CFG->useatria){
// ************ FI
    	   
// MARSUPIAL ************ AFEGIT -> Added proxy option
// 2012.08.30 @mmartinez
//             $options = array('trace' => 1, 'cache_wsdl' => 0);
//             if (isset($CFG->proxytype) && $CFG->proxytype == 'HTTP' && !empty($CFG->proxyhost)){
//             	$options['proxy_host'] = $CFG->proxyhost;
//             	if (!empty($CFG->proxyport)){
//             		$options['proxy_port'] = $CFG->proxyport;
//             	}
//             	if (!empty($CFG->proxyuser)){
//             		$options['proxy_login'] = $CFG->proxyuser;
//             	}
//             	if (!empty($CFG->proxypassword)){
//             		$options['proxy_password'] = $CFG->proxypassword;
//             	}
//             }
// ************* FI
// MARSUPIAL *********** MODIFICAT -> Added proxy option
// 2012.08.30 @mmartinez
//            $client = new SoapClient($CFG->atriaWSUrlPublisher, $options);
// *********** ORIGINAL
			//$client = new SoapClient($CFG->atriaWSUrlPublisher, array('trace' => true, 'cache_wsdl' => 0));
// ************* FI
//             $strHeaderComponent = '<WSAuthHeader xmlns:h="http://www.atria.cat/_layouts/Renacimiento/WebServices" xmlns="http://www.atria.cat/_layouts/Renacimiento/WebServices" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><Username>'.$CFG->atriaUsername.'</Username><Password>'.$CFG->atriaPassword.'</Password></WSAuthHeader>';
//             $objVar = new SoapVar($strHeaderComponent, XSD_ANYXML, null, null, null);
//             $objHeader = new SoapHeader('http://www.atria.cat/_layouts/Renacimiento/WebServices', 'WSAuthHeader', $objVar);
//             $client->__setSoapHeaders(array($objHeader));
//             try{
//                     $data = $client->GetPublisherData(array('sCodiEntitat' => $CFG->atriaEmpresa . '+' . $CFG->center . '+' . $CFG->atriaEvaType, 'sCodiCentre' => $CFG->center));
//             }catch (Exception $e) {
//                     $connection_error = $e->getMessage();
//             }		
//     }


    //Number of users with credentials in the total
    $total_users = get_users(false, '', true);

    $with_credentials = $DB->get_record_sql ('SELECT DISTINCT count(u.id) AS with_credentials FROM '.$CFG->prefix.'user u WHERE u.id IN (SELECT uc.euserid FROM '.$CFG->prefix.'rcommon_user_credentials uc GROUP BY uc.euserid)');
    $with_credentials = $with_credentials->with_credentials;

    $a = new StdClass;
    $a->total_users = $total_users;
    $a->with_credentials = $with_credentials;

    //Publishers and books
    $publisher_books = $DB->get_records_sql('SELECT p.id, p.name, p.username, p.password, p.urlwsbookstructure as url, count(b.id) AS books FROM '.$CFG->prefix.'rcommon_publisher p LEFT JOIN '.$CFG->prefix.'rcommon_books b ON p.id=b.publisherid GROUP BY p.id, p.name, p.username, p.password, p.urlwsbookstructure ORDER BY p.name');

    //Print javascript
    // MARSUPIAL *********** MODIFICAT -> Get the yui lib js version moodle 2.x, and check if is version 2.4
    // 2012.12.1 @abertranb
    $add_variable_str_moodle_24 = '';
    $add_end_variable_str_moodle_24 = '';
//    if ($CFG->version < '2012120301.06') {
    if ($CFG->branch < 24) {
        $PAGE->requires->yui2_lib(array('json','connection', 'dom-event'));
    } 
    else { //not required in version 2.4
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

// MARSUPIAL ************ ELIMINAT -> Deprecated code in Moodle 2.x
// 2013.01.29 @abertranb

//	    if (isset($CFG->useatria) && $CFG->useatria){
// ************ MODIFICAT
//    if (!isset($CFG->useatria) || $CFG->useatria){
// ************ FI
//            echo '<p><b>'.get_string('atria_connection', 'block_rcommon').'</b><br/>';
//           if ($connection_error == '') {
//                     echo '<img src="'.$OUTPUT->pix_url('go.gif').'" alt="ok" /><span style="color:green"> '.get_string('atria_connection_ok', 'block_rcommon').'</span>';
//             } else {
//                     echo '<img src="'.$OUTPUT->pix_url('stop.gif').'" alt="ok" /><span style="color:red"> '.get_string('atria_connection_ko', 'block_rcommon').
//                             '<br/><span style="font-size:small">'.$connection_error.'</span></span>'.
//                             '<br/><br/><span style="font-size:small">'.get_string('atria_error_information', 'block_rcommon').'</span>';
//                     echo '<br><a href="'.$CFG->wwwroot.'/atria/getKeys.php" >'.get_string('marsupialusersync','block_rcommon').'</a>'; 
//             }
//             echo '</p><br/>';
//     }
    // ************ FI
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
        
