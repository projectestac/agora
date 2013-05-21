<?php
	//Només per fixar preferencies dels centres
	
	$CFG->isagora = 1;
	//$CFG->iseoi = false;  /* Param moved to database */
	$CFG->isportal = false;
	$CFG->center = array_key_exists('clientCode', $school_info)?$school_info['clientCode']:$school_info['id_moodle'];
        // The following line calculates correctly the diskPercent (to upload files will be disabled when diskPercent >= 100)
	$CFG->diskPercent = array_key_exists('diskPercent_moodle', $school_info)?$school_info['diskPercent_moodle']:0;
        
	//Preconfiguration setting
	$CFG->alternateloginurl='';
	$CFG->mymoodleredirect=0;
        $CFG->enablestats = 0;
	//$CFG->loginhttps=0;  /* Database param, to change if there is some problem */

	//Authentication
	$CFG->recaptchapublickey='6LcgQgsAAAAAAMZKqiYEDAhniHIY0hXC-MMVM6Rs';
	$CFG->recaptchaprivatekey='6LcgQgsAAAAAAMAOLB0yfxPACo0e60sKD5ksV_hP';

	//Mail
	$CFG->smtpmaxbulk = 20;
	//$CFG->noreplyaddress = "noreply@agora.xtec.cat";
	$CFG->digestmailtime = '01';
	$CFG->mailheader = '[Àgora]';

	//Cleanup
	$CFG->disablegradehistory = 1;
	$CFG->loglifetime = 365;

	//Rules
	$CFG->forceloginforprofiles = 1;
	$CFG->opentogoogle = 0;

	//Ajax & Javascript
	$CFG->enableajax = 1;
	$CFG->disablecourseajax = 0;

	//Backups
	$CFG->disablescheduledbackups = 0;

	//Session information
	$CFG->dbsessions=false;
	$CFG->sessiontimeout=3600;
        //$CFG->sessioncookie = $CFG->center;

        //$CFG->enable_hour_restrictions = 1;   /* Set in database */
        // This param (hour_restrictions) can be serialized. This is useful for setting it in database
        // Values for days: 0 = sunday, 1 = monday, ..., 6 = saturday
        $CFG->hour_restrictions = array(array('start' => '9:00', 'end' => '13:59', 'days' => '1|2|3|4|5'),
                                        array('start' => '15:00', 'end' => '16:59', 'days' => '1|2|3|4|5'));

        
	//Mail information
	//$CFG->apligestmail = 1;  		/* Database param, to change if there is some problem */
	//$CFG->apligestlog = 0;		/* Database param, to change if there is some problem */
	//$CFG->apligestlogdebug = 0;		/* Database param, to change if there is some problem */
	$CFG->apligestlogpath = $CFG->dataroot.'/1/backupdata/log/mailsender.log';
	$CFG->apligestenv = $agora['server']['enviroment'];
	$CFG->apligestaplic = 'AGORA';
   
	// Àtria-marsupial information
	//$CFG->center = '08929684';
	$CFG->atriaUsername = $agora['atria']['username'];
	$CFG->atriaPassword = $agora['atria']['password'];
	$CFG->atriaEmpresa = $CFG->atriaUsername;
	$CFG->atriaEvaType = $agora['atria']['evatype'];

	///////////////////////////
	////dades preproduccio
	//$CFG->atriaWSUrl = 'http://212.92.50.138/_layouts/Renacimiento/WebServices/WS_IdentEVA.wsdl';
	//$CFG->atriaWSUrlPublisher = 'http://212.92.50.138/_layouts/Renacimiento/WebServices/WS_PublisherData.wsdl';
	//$CFG->atriaFormUrl = 'http://212.92.50.138/_layouts/Renacimiento/LoginPageExt.aspx';

	/////////////////////////
	//dades produccio
	$CFG->atriaWSUrl = 'https://www.atria.cat/_layouts/Renacimiento/WebServices/WS_IdentEVA.wsdl';
	$CFG->atriaWSUrlPublisher = 'https://www.atria.cat/_layouts/Renacimiento/WebServices/WS_PublisherData.wsdl';
	$CFG->atriaFormUrl = 'https://www.atria.cat/_layouts/Renacimiento/LoginPageExt.aspx';

	//$CFG->atriaWSUrl = 'http://www.atria.cat/_layouts/Renacimiento/WebServices/WS_IdentEVA.wsdl';
	//$CFG->atriaWSUrlPublisher = 'http://www.atria.cat/_layouts/Renacimiento/WebServices/WS_PublisherDatax.wsdl';
	//$CFG->atriaFormUrl = 'http://www.atria.cat/_layouts/Renacimiento/LoginPageExt.aspx';
        
        $CFG->useatria = false;
        $CFG->noreplyaddress = 'noreply@agora.xtec.cat';