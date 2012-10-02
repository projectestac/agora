<?php

require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once($CFG->dirroot.'/atria/atria.php');

require_login();

if(!$site = get_site()) {
	redirect($CFG->wwwroot.'/'.$CFG->admin.'/index.php');
}

if(!isadmin()) { exit; }
    //XTEC *************** MODIFICAT - To void problems with HTTPS connection
    //sarjona @2011.10.26
    $fileName = $agora['server']['ca_bundle'];

    $context = stream_context_create(
                    array(
                            'SSL' => array(
                                    'allow_self_signed' => FALSE,
                                    'verify_peer' => TRUE,
                                    'cafile' => $fileName,
                                    'capture_peer_cert' => TRUE
                            )
                    )
            );
    $client = new SoapClient($CFG->atriaWSUrlPublisher, array('trace' => true, 'cache_wsdl' => 0, 'stream_context'=> $context));    
    //************** ORIGINAL
    /*
    //atria da problemas, pasamos a dummy
    $client = new SoapClient($CFG->atriaWSUrlPublisher, array('trace' => true, 'cache_wsdl' => 0));
     */
    //************** FI
    $strHeaderComponent = '<WSAuthHeader xmlns:h="http://www.atria.cat/_layouts/Renacimiento/WebServices" xmlns="http://www.atria.cat/_layouts/Renacimiento/WebServices" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><Username>'.$CFG->atriaUsername.'</Username><Password>'.$CFG->atriaPassword.'</Password></WSAuthHeader>';

    $objVar = new SoapVar($strHeaderComponent, XSD_ANYXML, null, null, null);
    $objHeader = new SoapHeader('http://www.atria.cat/_layouts/Renacimiento/WebServices', 'WSAuthHeader', $objVar);

    // More than one header can be provided in this array.
    $client->__setSoapHeaders(array($objHeader));

    //$params = array($CFG->atriaEmpresa . '+' . $CFG->center . '+' . $CFG->atriaEvaType, $id);
    $data = $client->GetPublisherData(array('sCodiEntitat' => $CFG->atriaEmpresa . '+' . $CFG->center . '+' . $CFG->atriaEvaType, 'sCodiCentre' => $CFG->center));

    $names = array();
    foreach($data->GetPublisherDataResult->ArrayOfAnyType as $publisher) {
                if(is_object($publisher) && isset($publisher->anyType))
                    $publisher = $publisher->anyType;
		$name = $publisher[0];
		$wsbookstructure = $publisher[1];
		$wsauthorization = $publisher[2];
		$user = $publisher[3];
		$pass = $publisher[4];

		$provider = get_record_sql('SELECT * FROM '.$CFG->prefix.'rcommon_publisher WHERE name = \''.addslashes($name).'\'');

                if($provider) {
			execute_sql('UPDATE '.$CFG->prefix.'rcommon_publisher SET username = \''.addslashes($user).'\', urlwsauthentication = \''.addslashes($wsauthorization).'\', urlwsbookstructure = \''.addslashes($wsbookstructure).'\', password = \''.addslashes($pass).'\', timecreated = '.time().', timemodified = '.time().' WHERE name = \''.addslashes($name).'\'', false);
		} else {
			execute_sql("INSERT INTO ".$CFG->prefix."rcommon_publisher (name, urlwsauthentication,urlwsbookstructure, username, password, timecreated, timemodified) VALUES ('".  addslashes($name)."','".addslashes($wsauthorization)."','".addslashes($wsbookstructure)."','".addslashes($user)."','".addslashes($pass)."',".time().", ".time().")", false);
		}
		$names[] = $name;
    }

$pagetitle = get_string('atriasync', 'atria');

$stratria = get_string('atria', 'atria');
$navlinks = array();
$navlinks[] = array('name' => $stratria,
					'link' =>'#',
					'type' => 'misc');

$prefsbutton = "";
// Print title and header
$navigation = build_navigation($navlinks);

//ATRIA *************** MODIFICAT - To show as admin option
//sarjona @2011.09.15
require_once($CFG->libdir.'/adminlib.php');
admin_externalpage_setup('marsupialupdate_publisher');
admin_externalpage_print_header();
//************** ORIGINAL
/*print_header("$site->shortname: $stratria: $pagetitle", $stratria, $navigation,
			 '', '', true, $prefsbutton, user_login_string($site));
*/
//************** FI

//key synchronization
echo '<center><br />
	<div>
		<h2 class="headingblock header ">'.get_string('atriaadmin', 'atria').'</h2>
		<ul class="unlist">
			<li>
				<div class="coursebox clearfix">
					<div class="info" style="float:none;">
						<div class="name">
							<center><p>'.get_string('atriapublishersyncok', 'atria').'</p>
							<p><b>'.get_string('atriaproviderslist', 'atria').'</b></p>
							<p>
							';
foreach($names as $name) {
    echo '<div>'.$name.'</div>';
}
echo '
							</p>
							</center>
						</div>
					</div>
					<div class="summary"></div>
				</div>
			</li>
		</ul>
	</div>
	</center>
	';

//ATRIA *************** MODIFICAT - To show as admin option
//sarjona @2011.09.15
admin_externalpage_print_footer();
//*************** ORIGINAL
//print_footer();
//*************** FI

?>
