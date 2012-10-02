<?php

    require_once('../../../config.php');
    require_once($CFG->libdir.'/adminlib.php');
	
    admin_externalpage_setup('marsupialstate');
    admin_externalpage_print_header();

    //If it's necessary, check Atria connectivity
    if (!isset($CFG->useatria) || $CFG->useatria){
            $connection_error = "";
// MARSUPIAL ************ AFEGIT -> Added proxy option
// 2012.08.30 @mmartinez
            $options = array('trace' => 1, 'cache_wsdl' => 0);
            if ($CFG->proxytype == 'HTTP' && !empty($CFG->proxyhost)){
            	$options['proxy_host'] = $CFG->proxyhost;
            	if (!empty($CFG->proxyport)){
            		$options['proxy_port'] = $CFG->proxyport;
            	}
            	if (!empty($CFG->proxyuser)){
            		$options['proxy_login'] = $CFG->proxyuser;
            	}
            	if (!empty($CFG->proxypassword)){
            		$options['proxy_password'] = $CFG->proxypassword;
            	}
            }
// ************* FI
// MARSUPIAL *********** MODIFICAT -> Added proxy option
// 2012.08.30 @mmartinez
            $client = new SoapClient($CFG->atriaWSUrlPublisher, $options);
// *********** ORIGINAL
			//$client = new SoapClient($CFG->atriaWSUrlPublisher, array('trace' => true, 'cache_wsdl' => 0));
// ************* FI
            $strHeaderComponent = '<WSAuthHeader xmlns:h="http://www.atria.cat/_layouts/Renacimiento/WebServices" xmlns="http://www.atria.cat/_layouts/Renacimiento/WebServices" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><Username>'.$CFG->atriaUsername.'</Username><Password>'.$CFG->atriaPassword.'</Password></WSAuthHeader>';
            $objVar = new SoapVar($strHeaderComponent, XSD_ANYXML, null, null, null);
            $objHeader = new SoapHeader('http://www.atria.cat/_layouts/Renacimiento/WebServices', 'WSAuthHeader', $objVar);
            $client->__setSoapHeaders(array($objHeader));
            try{
                    $data = $client->GetPublisherData(array('sCodiEntitat' => $CFG->atriaEmpresa . '+' . $CFG->center . '+' . $CFG->atriaEvaType, 'sCodiCentre' => $CFG->center));
            }catch (Exception $e) {
                    $connection_error = $e->faultstring;
            }		
    }


    //Number of users with credentials in the total
    $total_users = get_users(false, '', true);

    $with_credentials = get_record_sql ('SELECT DISTINCT count(u.id) AS with_credentials FROM '.$CFG->prefix.'user u WHERE u.id IN (SELECT uc.euserid FROM '.$CFG->prefix.'rcommon_user_credentials uc GROUP BY uc.euserid)');
    $with_credentials = $with_credentials->with_credentials;

    $a = new StdClass;
    $a->total_users = $total_users;
    $a->with_credentials = $with_credentials;

    //Publishers and books
    $publisher_books = get_records_sql('SELECT p.id, p.name, p.username, p.password, p.urlwsbookstructure as url, count(b.id) AS books FROM '.$CFG->prefix.'rcommon_publisher p LEFT JOIN '.$CFG->prefix.'rcommon_books b ON p.id=b.publisherid GROUP BY p.id, p.name, p.username, p.password, p.urlwsbookstructure ORDER BY p.name');

    //Print javascript
    require_js(array('yui_dom-event', 'yui_connection', 'yui_json'));
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
                                    document.getElementById("loading_small").style.visibility = "visible"; 
                                    YAHOO.util.Connect.asyncRequest("POST","'.$CFG->wwwroot.'/blocks/rcommon/state/check_publishers.php",callback);
                            }
                    </script>';

    //Print information
    echo '<h2 class="headingblock header ">'.get_string('marsupialstats','blocks/rcommon').'</h2>';
    echo '<div class="box generalbox generalboxcontent">';

    if (!isset($CFG->useatria) || $CFG->useatria){
            echo '<p><b>'.get_string('atria_connection', 'blocks/rcommon').'</b><br/>';
            if ($connection_error == '') {
                    echo '<img src="'.$CFG->pixpath.'/t/go.gif" alt="ok" /><span style="color:green"> '.get_string('atria_connection_ok', 'blocks/rcommon').'</span>';
            } else {
                    echo '<img src="'.$CFG->pixpath.'/t/stop.gif" alt="ok" /><span style="color:red"> '.get_string('atria_connection_ko', 'blocks/rcommon').
                            '<br/><span style="font-size:small">'.$connection_error.'</span></span>'.
                            '<br/><br/><span style="font-size:small">'.get_string('atria_error_information', 'blocks/rcommon').'</span>';
                    echo '<br><a href="'.$CFG->wwwroot.'/atria/getKeys.php" >'.get_string('marsupialusersync','blocks/rcommon').'</a>'; 
            }
            echo '</p><br/>';
    }

    echo '<p><b>'.get_string('user_credentials', 'blocks/rcommon').'</b><br/>'.get_string('users_proportion', 'blocks/rcommon', $a).'. <br /><a href="print_users.php">'.get_string('show_users', 'blocks/rcommon').'</a></p><br/>';

    echo '<p><b>'.get_string('publishers', 'blocks/rcommon').'</b>';

    if($publisher_books){
            echo '<br/>'.get_string('publishers_and_books', 'blocks/rcommon').'
            <br/>
            <div id="publishers_list"><ul>';	
            foreach ($publisher_books as $publisher){
                    echo '<li>'.$publisher->name.' ('.$publisher->books.')</li>';
            }
            echo '</div></ul>';
            echo '<a name="publishers" href="#publishers" onClick="javascript:check_publishers()">'.get_string('check_publishers', 'blocks/rcommon').'</a> <span style="font-size:small">('.get_string('wait_please', 'blocks/rcommon').')</span> <img id="loading_small" style="visibility:hidden" src="'.$CFG->pixpath.'/i/loading_small.gif" alt="loading_small" />';

    }else{
            echo '<br/>'.get_string('no_publishers', 'blocks/rcommon');
    }

    echo '</p></div>';
	
	
	
    
