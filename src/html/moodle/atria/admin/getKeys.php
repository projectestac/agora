<?php

require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once($CFG->dirroot.'/atria/atria.php');

require_login();

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
    $client = new SoapClient($CFG->atriaWSUrl, array('trace' => true, 'cache_wsdl' => 0, 'stream_context'=> $context));
    //************** ORIGINAL
    /*
    //atria da problemas, pasamos a dummy
    $client = new SoapClient($CFG->atriaWSUrl, array('trace' => true, 'cache_wsdl' => 0));
     */
    //************** FI

    $strHeaderComponent = '<WSAuthHeader xmlns:h="http://www.atria.cat/_layouts/Renacimiento/WebServices" xmlns="http://www.atria.cat/_layouts/Renacimiento/WebServices" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><Username>'.$CFG->atriaUsername.'</Username><Password>'.$CFG->atriaPassword.'</Password></WSAuthHeader>';

    $objVar = new SoapVar($strHeaderComponent, XSD_ANYXML, null, null, null);
    $objHeader = new SoapHeader('http://www.atria.cat/_layouts/Renacimiento/WebServices', 'WSAuthHeader', $objVar);

    // More than one header can be provided in this array.
    $client->__setSoapHeaders(array($objHeader));
    //$params = array($CFG->atriaEmpresa . '+' . $CFG->center . '+' . $CFG->atriaEvaType, $id);
    $keys = $client->GetCentreDOIArray(array('sCodiEntitat' => $CFG->atriaEmpresa . '+' . $CFG->center . '+' . $CFG->atriaEvaType, 'sCodCentre' => $CFG->center));
    
    //ATRIA ************ MODIFICAT - To avoid warning messages when $keys->GetCentreDOIArrayResult is empty 
    //2011.06.20 @sarjona 
    if (isset($keys->GetCentreDOIArrayResult)){
        foreach($keys->GetCentreDOIArrayResult->UserDoi as $entry) {
                if (strlen($entry->CodUserExt) <= 10){
                    $pwd = isset($entry->Pwd)?$entry->Pwd:'';
                    execute_sql("DELETE FROM ".$CFG->prefix."rcommon_user_credentials WHERE isbn = '".addslashes($entry->Doi)."' AND euserid = '".  addslashes($entry->CodUserExt)."'", false);
                    execute_sql("INSERT INTO ".$CFG->prefix."rcommon_user_credentials (euserid,isbn,credentials, timecreated, timemodified) VALUES ('".  addslashes($entry->CodUserExt)."','".addslashes($entry->Doi)."','".addslashes($pwd)."',".time().", ".time().")", false);
                }
        }
    }
    //************ ORIGINAL
    /*
    foreach($keys->GetCentreDOIArrayResult->UserDoi as $entry) {
            execute_sql("DELETE FROM ".$CFG->prefix."rcommon_user_credentials WHERE credentials = '".addslashes($entry->Pwd)."' AND isbn = '".addslashes($entry->Doi)."' AND euserid = '".  addslashes($entry->CodUserExt)."'", false);
            execute_sql("INSERT INTO ".$CFG->prefix."rcommon_user_credentials (euserid,isbn,credentials, timecreated, timemodified) VALUES ('".  addslashes($entry->CodUserExt)."','".addslashes($entry->Doi)."','".addslashes($entry->Pwd)."',".time().", ".time().")", false);
    }
     */    
    //************ FI        
    
if(!$site = get_site()) {
	redirect($CFG->wwwroot.'/'.$CFG->admin.'/index.php');
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
admin_externalpage_setup('marsupialget_credentials');
admin_externalpage_print_header();
//**************** ORIGINAL
/*print_header("$site->shortname: $stratria: $pagetitle", $stratria, $navigation,
			 '', '', true, $prefsbutton, user_login_string($site));*/
//**************** FI

//key synchronization
echo '<br />
	<div>
		<h2 class="headingblock header ">'.get_string('atriaadmin', 'atria').'</h2>
		<ul class="unlist">
			<li>
				<div class="coursebox clearfix">
					<div class="info" style="float:none;">
						<div class="name">
							<p>'.get_string('atriaallsyncok', 'atria').'</p>
						</div>
					</div>
					<div class="summary"></div>
				</div>
			</li>
		</ul>
	</div>';

//ATRIA *************** MODIFICAT - To show as admin option
//sarjona @2011.09.15
admin_externalpage_print_footer();
//*************** ORIGINAL
//print_footer();
//*************** FI 

?>
