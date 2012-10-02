<?php
if(!function_exists('isadmin')) {
    require_once('../config.php');
    require_once($CFG->dirroot.'/course/lib.php');
}


//global function 'atriaSync' (repara in atria lingo)
//it accepts 2 optional parameters
//if you pass urlRetorn, this function will throw a form to
//atria in case of the user is not recognized in the platform
//and will return to returnUrl when the operation finish.
//if you pass also a id, the function will synchronize the provided id
//instead of the current user id.
function atriaSync($urlRetorn='', $id = '', $isbn = '', $course = '') {
    global $USER, $CFG;
    if($id != '') {
	$userid = $id;
    } else {
	$userid = $USER->id;
    }
    //TODO: capability nova
    if(isteacher($course, $id)) {
	$rol  = 'profe';
    } else {
	$rol = 'alumne';
    }

    $keys = getCredentials($userid);
    if($keys == "empty") {
        if($rol != 'alumne' && $isbn != '') {
            echo '<script>document.location.href="'.$CFG->wwwroot.'/atria/atriaFormInsert.php?id='.$userid.'&url='.  base64_encode($urlRetorn).'&isbn='.$isbn.'";</script>';
            exit;
        }
        return;
    }
    if(count($keys) < 1 || $keys == "") {
	if($rol != 'alumne' && $isbn != '' && $keys == "") {
            echo '<script>document.location.href="'.$CFG->wwwroot.'/atria/atriaFormInsert.php?id='.$userid.'&url='.  base64_encode($urlRetorn).'&isbn='.$isbn.'";</script>';
            exit;
	} else if($urlRetorn != '') {
	    echo '<script>document.location.href="'.$CFG->wwwroot.'/atria/atriaForm.php?id='.$userid.'&url='.  base64_encode($urlRetorn).'";</script>';
	    exit;
	}
    } else {
	//hay que insertar las claves
        $inserirManual = 1;
	foreach($keys as $key) {
	    $doi = $key[0];
	    $pass = $key[1];

            if($doi == $isbn) {
                $inserirManual = 0;
            }

	    //delete previous (buggy?) entry
	    execute_sql("DELETE FROM ".$CFG->prefix."rcommon_user_credentials WHERE isbn = '".addslashes($doi)."' AND euserid = '".  addslashes($userid)."'", false);
	    execute_sql("INSERT INTO ".$CFG->prefix."rcommon_user_credentials (euserid,isbn,credentials, timecreated, timemodified) VALUES ('".  addslashes($userid)."','".addslashes($doi)."','".addslashes($pass)."',".time().", ".time().")", false);
	}
        if($inserirManual == 1 && $rol != 'alumne' && !empty($isbn)) {
            echo '<script>document.location.href="'.$CFG->wwwroot.'/atria/atriaFormInsert.php?id='.$userid.'&url='.  base64_encode($urlRetorn).'&isbn='.$isbn.'";</script>';
            exit;
        }
    }
}

//due to connection problems with atria pre-production servers, this function is
//not completly tested, and it works for the moment with a "test" values
//directly written into the code.
//In theory, it should work only by removing this dummy data
function getCredentials($id) {
    global $CFG, $agora;
    
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
    $client = new SoapClient($CFG->atriaWSUrl, array('trace' => true, 'cache_wsdl' => 0));
     */
    //************** FI
    
    
    $strHeaderComponent = '<WSAuthHeader xmlns:h="http://www.atria.cat/_layouts/Renacimiento/WebServices" xmlns="http://www.atria.cat/_layouts/Renacimiento/WebServices" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><Username>'.$CFG->atriaUsername.'</Username><Password>'.$CFG->atriaPassword.'</Password></WSAuthHeader>';

    $objVar = new SoapVar($strHeaderComponent, XSD_ANYXML, null, null, null);
    $objHeader = new SoapHeader('http://www.atria.cat/_layouts/Renacimiento/WebServices', 'WSAuthHeader', $objVar);

    // More than one header can be provided in this array.
    $client->__setSoapHeaders(array($objHeader));
    //$params = array($CFG->atriaEmpresa . '+' . $CFG->center . '+' . $CFG->atriaEvaType, $id);
    try {
        $keys = $client->GetUserDOIArray(array('sCodiEntitat' => $CFG->atriaEmpresa . '+' . $CFG->center . '+' . $CFG->atriaEvaType, 'sCodiUserExt' => $id));
	$return = array();
        $loops = 0;
        if(!isset($keys->GetUserDOIArrayResult->UserDoi)) {
            return "empty";
        }
	if(!is_array($keys->GetUserDOIArrayResult->UserDoi)) {
	    $entry = $keys->GetUserDOIArrayResult->UserDoi;
	    $loops = 1;
            if(!isset ($entry->Pwd)) {
                $entry->Pwd = '';
            }
	    $return[] = array($entry->Doi,$entry->Pwd,$entry->CodUserExt);
	} else {
	    foreach($keys->GetUserDOIArrayResult->UserDoi as $entry) {
		$loops++;
                if(!isset ($entry->Pwd)) {
                    $entry->Pwd = '';
                }
		$return[] = array($entry->Doi,$entry->Pwd,$entry->CodUserExt);
	    }
	}

        if($loops == 0) {
            $return = "";
        }
    } catch (Exception $e) {        
        return array();
    }
    return $return;
}

?>
