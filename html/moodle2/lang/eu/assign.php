<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'assign', language 'eu', branch 'MOODLE_26_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Zain dituzu hainbat zeregin';
$string['addattempt'] = 'Baimendu beste saiakera bat';
$string['addnewattempt'] = 'Gehitu beste saiakera bat';
$string['addnewattemptfromprevious'] = 'Gehitu aurreko bidalketan oinarritutako saiakera bat';
$string['addnewattemptfromprevious_help'] = 'Honek kopiatuko ditu aurreko bidalketaren edukiak bidalketa berri batera, horren gainean lan egin dezazun.';
$string['addnewattempt_help'] = 'Honek bidalketa huts bat sortuko du, horren gainean lan egin dezazun.';
$string['addsubmission'] = 'Gehitu bidalketa';
$string['allocatedmarker'] = 'Esleitutako kalifikatzailea';
$string['allocatedmarker_help'] = 'Bidalketa honi esleitutako kalifikatzailea';
$string['allowsubmissions'] = 'Erabiltzaileari utzi bidalketak egiten jarraitzea';
$string['allowsubmissionsanddescriptionfromdatesummary'] = 'Zereginaren nondik norakoak eta bidalketarako formularioa eskuragarri izango dituzu <strong>{$a}</strong>-tik aurrera';
$string['allowsubmissionsfromdate'] = 'Baimendu bidalketak hemendik:';
$string['allowsubmissionsfromdate_help'] = 'Aukera hau gaitzen bada, ikasleek ezingo dute bidalketa egin data hau baino lehen. Ez bada gaitzen, ikasleek bidalketa egin ahal izango dute oraintxe bertan.';
$string['allowsubmissionsfromdatesummary'] = 'Zeregin honetan bidalketak onartuko dira <strong>{$a}</strong>-tik aurrera';
$string['allowsubmissionsshort'] = 'Baimendu aldaketak bidalketan';
$string['alwaysshowdescription'] = 'Deskribapena beti erakutsi';
$string['alwaysshowdescription_help'] = 'Ezgaitzen bada, ikasleek bakarrik ikusiko dute zereginaren deskripzioa "Baimendu bidalketak hemendik" aukeran markatutako egunetik aurrera.';
$string['applytoteam'] = 'Kalifikazioak eta feedbackak talde osoari aplikatu';
$string['assign:addinstance'] = 'Gehitu beste zeregin bat';
$string['assign:exportownsubmission'] = 'Esportatu norberaren bidalketa';
$string['assignfeedback'] = 'Feedbackaren plugina';
$string['assignfeedbackpluginname'] = 'Feedbackaren plugina';
$string['assign:grade'] = 'Kalifikatu zeregina';
$string['assign:grantextension'] = 'Eman epearen luzapena';
$string['assign:manageallocations'] = 'Bidalketa honi esleitutako kalifikatzaileak kudeatu';
$string['assign:managegrades'] = 'Berrikusi eta erakutsi kalifikazioa';
$string['assignmentisdue'] = 'Epea bukatu da';
$string['assignmentmail'] = '{$a->grader}-k feedbacka bidali du zure \'{$a->assignment}\' zereginaren bidalketarako.

Zure zereginaren bidalketaren eranskin gisa ikus dezakezu:

 {$a->url}';
$string['assignmentmailhtml'] = '<p>{$a->grader}-(e)k feedbacka bidali du zure \'<i>{$a->assignment}</i>\' zereginaren bidalketarako.</p>
<p>Zure <a href="{$a->url}">zereginaren bidalketaren eranskin gisa ikus dezakezu</a>.</p>';
$string['assignmentmailsmall'] = '{$a->grader}-k feedbacka bidali du zure \'{$a->assignment}\' zereginaren bidalketarako. Zure zereginaren bidalketaren eranskin gisa ikus dezakezu.';
$string['assignmentname'] = 'Zereginaren izena';
$string['assignmentplugins'] = 'Zereginaren pluginak';
$string['assignmentsperpage'] = 'Zereginak orriko';
$string['assign:releasegrades'] = 'Erakutsi kalifikazioak';
$string['assign:revealidentities'] = 'Ezagutarazi ikasleen identitatea';
$string['assign:reviewgrades'] = 'Berrikusi kalifikazioak';
$string['assignsubmission'] = 'Bidalketaren plugina';
$string['assignsubmissionpluginname'] = 'Bidalketaren plugina';
$string['assign:submit'] = 'Bidali zeregina';
$string['assign:view'] = 'Zeregina ikusi';
$string['attemptheading'] = '{$a->attemptnumber} saiakera: {$a->submissionsummary}';
$string['attempthistory'] = 'Aurreko saiakerak';
$string['attemptnumber'] = 'Saiakera-kopurua';
$string['attemptreopenmethod'] = 'Saiakerak berriro ireki dira';
$string['attemptreopenmethod_help'] = 'Ikasleen bidalketa-saiakerak nola berrirekitzen diren zehazten du. Aukera hauek
daude: <ul><li>Inoiz ez - Ikaslearen bidalketa ezin da berrireki.</li><li>Eskuz - Irasleek ikaslearen bidalketa berrireki ahal izango dute.</li><li>Automatikoki gainditu arte - Ikaslearen bidalketa automatikoki berrirekiko da ikasleak lortu arte zeregin hau gainditzeko moduko kalifikazio bat. Horretarako, zeregin honen elementua kalifikazio liburuan erabiliko da (Kategoria eta elementuak atalekoa).</li></ul>';
$string['attemptreopenmethod_manual'] = 'Eskuz';
$string['attemptreopenmethod_none'] = 'Inoiz ere ez';
$string['attemptreopenmethod_untilpass'] = 'Automatikoki gainditu arte';
$string['attemptsettings'] = 'Saiakeren ezarpenak';
$string['availability'] = 'Eskuragarritasuna';
$string['backtoassignment'] = 'Itzuli zereginera';
$string['batchoperationconfirmaddattempt'] = 'Aukeratutako bidalketen kasuan saiakera gehiagorik onartu?';
$string['batchoperationconfirmgrantextension'] = 'Epea luzatu aukeratutako bidalketa guztietan?';
$string['batchoperationconfirmlock'] = 'Blokeatu aukeratutako bidalketa guztiak?';
$string['batchoperationconfirmreverttodraft'] = 'Bidalketak zirriborro egoerara itzuli?';
$string['batchoperationconfirmsetmarkingallocation'] = 'Aukeratutako bidalketa guztiei esleitutako kalifikatzailea ezarri nahi diezu?';
$string['batchoperationconfirmsetmarkingworkflowstate'] = 'Aukeratutako bidalketa guztiei lan-fluxu egoera ezarri nahi diezu?';
$string['batchoperationconfirmunlock'] = 'Desblokeatu nahi dituzu aukeratutako bidalketa guztiak?';
$string['batchoperationlock'] = 'blokeatu bidalketak';
$string['batchoperationreverttodraft'] = 'itzuli bidalketak zirriborrora';
$string['batchoperationsdescription'] = 'Aukeratutakoekin...';
$string['batchoperationunlock'] = 'desblokeatu bidalketak';
$string['batchsetallocatedmarker'] = 'Aukeratutako {$a} erabiltzaileri kalifikatzailea esleitu zaie.';
$string['batchsetmarkingworkflowstateforusers'] = 'Aukeratutako {$a} erabiltzaileri lan-fluxu egoera esleitu zaie.';
$string['blindmarking'] = 'Kalifikazio itsua';
$string['blindmarking_help'] = 'Kalifikazio itsuak ikasleen identitatea ezkutatzen die kalifikatzaileei. Kalifikazio itsuaren ezarpenak blokeatuko dira bidalketa edo kalifikazio bat eginez gero.';
$string['changegradewarning'] = 'Zeregin honetan kalifikatutako bidalketak daude eta kalifikazioa aldatuz gero, orain arte egindako kalifikazioak ez dira birkalkulatuko automatikoki. Bidalketa guztiak birkalifikatu beharko dituzu kalifikazioa aldatu nahi baduzu.';
$string['choosegradingaction'] = 'Kalifikazio-ekintza';
$string['choosemarker'] = 'Aukeratu...';
$string['chooseoperation'] = 'Aukeratu eragiketa';
$string['comment'] = 'Iruzkina';
$string['completionsubmit'] = 'Ikasleak bidalketa egin behar du jarduera honetan osatutzat emateko';
$string['configshowrecentsubmissions'] = 'Duela gutxiko aktibitatearen txostenetan guztiek ikus ditzakete bidalketen jakinarazpenak';
$string['confirmbatchgradingoperation'] = 'Ziur al zaude {$a->operation} nahi duzula {$a->count} ikaslerentzat?';
$string['confirmsubmission'] = 'Ziur al zaude zure lana bidali nahi duzula kalifikatzeko? Ezin izango duzu aldaketarik egin.';
$string['conversionexception'] = 'Zeregina ezin izan da bihurtu. Salbuespena hau izan da: {$a}.';
$string['couldnotconvertgrade'] = 'Ezin izan da bihurtu zereginaren kalifikazioa {$a} erabiltzailearentzat.';
$string['couldnotconvertsubmission'] = 'Ezin izan da bihurtu zereginaren bidalketa {$a} erabiltzailearentzat.';
$string['couldnotcreatecoursemodule'] = 'Ezin izan da ikastaroaren modulua sortu.';
$string['couldnotcreatenewassignmentinstance'] = 'Ezin izan da sortu zeregin berria.';
$string['couldnotfindassignmenttoupgrade'] = 'Ez da aurkitu zeregin zaharra bertsio-berritzeko.';
$string['currentattempt'] = 'Hau da {$a} saiakera.';
$string['currentattemptof'] = 'Hau {$a->attemptnumber}. saiakera da ( {$a->maxattempts} saiakera onartzen dira ).';
$string['currentgrade'] = 'Oraingo kalifikazioa kalifikazio-liburuan';
$string['cutoffdate'] = 'Itxiera-data';
$string['cutoffdatefromdatevalidation'] = 'Itxiera-datak bidalketaren irekiera-data baino beranduago izan behar du.';
$string['cutoffdate_help'] = 'Aukera hau gaituta badago, zereginak ez du onartuko bidalketarik data hau baino beranduago, luzapenik ematen ez bada, behintzat.';
$string['cutoffdatevalidation'] = 'Itxiera-data ezin da izan entregatze-data baino lehenago.';
$string['defaultsettings'] = 'Berezko zereginaren ezarpenak';
$string['defaultsettings_help'] = 'Ezarpen hauek zeregin berri guztietarako berezko baloreak definitzen dituzte';
$string['defaultteam'] = 'Berezko taldea';
$string['deleteallsubmissions'] = 'Ezabatu bidalketa guztiak';
$string['description'] = 'Deskribapena';
$string['downloadall'] = 'Jaitsi bidalketa guztiak';
$string['duedate'] = 'Entregatze-data';
$string['duedate_help'] = 'Hau zereginaren entregatze-epea da. Bidalketak onartuko dira data hau baino beranduago, baina bidalketa atzeratuen seinalea jarriko zaio. Ezarri zereginaren itxiera-data bidalketak saihesteko.';
$string['duedateno'] = 'Entregatze-datarik ez';
$string['duedatereached'] = 'Zeregin hau bidaltzeko epea amaitu da';
$string['duedatevalidation'] = 'Entregatze-datak irekitze-data baino beranduago izan behar du.';
$string['editaction'] = 'Ekintzak...';
$string['editattemptfeedback'] = '{$a} saiakeraren kalifikazioa eta feedbacka editatu.';
$string['editingpreviousfeedbackwarning'] = 'Saiakera zahar baten feedbacka editatzen ari zara. Saiakera hau {$a->totalattempts}-tik {$a->attemptnumber}.a da.';
$string['editingstatus'] = 'Editatzen egoera';
$string['editsubmission'] = 'Editatu bidalketa';
$string['editsubmission_help'] = 'Zure bidalketan aldaketak egin';
$string['enabled'] = 'Gaituta';
$string['errornosubmissions'] = 'Ez dago jaisteko bidalketarik';
$string['errorquickgradingvsadvancedgrading'] = 'Kalifikazioak ez dira gorde zeregin honek kalifikazio aurreratua erabiltzen duelako';
$string['errorrecordmodified'] = 'Kalifikazioak ez dira gorde norbaitek aldatu duelako erregistro bat edo gehiago zuk orria kargatu ondoren.';
$string['event_all_submissions_downloaded'] = 'Bidalketa guztiak jaisten ari dira.';
$string['event_assessable_submitted'] = 'Bidalketa ondo bidali da.';
$string['event_extension_granted'] = 'Luzapen bat baimendu da.';
$string['event_identities_revealed'] = 'Identitateak ezagutuarazi dira.';
$string['event_marker_updated'] = 'Esleitutako kalifikatzailea eguneratu da.';
$string['event_statement_accepted'] = 'Erabiltzaileak bidalketa-sententzia onartu du.';
$string['event_submission_duplicated'] = 'Erabiltzaileak bere bidalketa bikoiztu du.';
$string['event_submission_graded'] = 'Bidalketa kalifikatu da.';
$string['event_submission_locked'] = 'Bidalketa erabiltzaile batentzat blokeatu da.';
$string['event_submission_status_updated'] = 'Bidalketaren egoera eguneratu da.';
$string['event_submission_unlocked'] = 'Bidalketa erabiltzaile batentzat desblokeatu da.';
$string['event_submission_updated'] = 'Erabiltzaileak bere bidalketa gorde du.';
$string['event_workflow_state_updated'] = 'Lan-fluxu egoera eguneratu da.';
$string['extensionduedate'] = 'Luzapenaren entregatze-data';
$string['extensionnotafterduedate'] = 'Luzapenaren datak entregatze-data baino beranduago izan behar du';
$string['extensionnotafterfromdate'] = 'Luzapenaren datak bidaltzeko hasiera-data baino beranduago izan behar du';
$string['feedback'] = 'Feedbacka';
$string['feedbackavailablehtml'] = '{$a->username}-(e)k feedbacka bidali du zure zereginaren bidalketarako: \'<i>{$a->assignment}</i>\'<br /><br /> Ikusi dezakezu <a href="{$a->url}"> zereginaren bidalketara atxikituta</a>.';
$string['feedbackavailablesmall'] = '{$a->username}-(e)k feedbacka bidali du {$a->assignment} zereginerako';
$string['feedbackavailabletext'] = '{$a->username}-(e)k feedbacka bidali du zure \'{$a->assignment}\' zereginaren bidalketarako.

Zure zereginaren bidalketaren eranskin gisa ikus dezakezu:

{$a->url}';
$string['feedbackplugin'] = 'Feedbackaren plugina';
$string['feedbackpluginforgradebook'] = 'Feedbackaren plugin honek iruzkinak bidaliko ditu kalifikazio-liburura';
$string['feedbackpluginforgradebook_help'] = 'Feedbackaren plugin bakar batek bidali ditzake feedbackak kalifikazio-liburura.';
$string['feedbackplugins'] = 'Feedbackaren pluginak';
$string['feedbacksettings'] = 'Feedbackaren ezarpenak';
$string['feedbacktypes'] = 'Feedback-motak';
$string['filesubmissions'] = 'Fitxategi-bidalketak';
$string['filter'] = 'Iragazkia';
$string['filternone'] = 'Iragazkirik ez';
$string['filterrequiregrading'] = 'Kalifikazioa behar du';
$string['filtersubmitted'] = 'Bidalita';
$string['gradeabovemaximum'] = 'Kalifikazioak {$a} baino txikiagoa edo berdina izan behar du.';
$string['gradebelowzero'] = 'Kalifikazioak 0 edo handiagoa izan behar du.';
$string['gradecanbechanged'] = 'Kalifikazioa alda daiteke';
$string['graded'] = 'Kalifikatua';
$string['gradedby'] = 'Nork kalifikatua';
$string['gradedon'] = 'Noiz kalifikatua';
$string['gradelocked'] = 'Kalifikazio hau blokeatu edo aldatu da kalifikazio-liburuan.';
$string['gradeoutof'] = 'Kalifikazioa ({$a}-(e)ra arte)';
$string['gradeoutofhelp'] = 'Kalifikazioa';
$string['gradeoutofhelp_help'] = 'Idatzi hemen ikasleak egindako bidalketaren kalifikazioa. Hamartarrak ere sar ditzakezu.';
$string['gradersubmissionupdatedhtml'] = '{$a->username}(e)k bidalketa eguneratu du ondorengo zereginean: <i>\'{$a->assignment}\'</i><br/><br/>
Web-gune honetan ikusgai: <a href="{$a->url}"></a>.';
$string['gradersubmissionupdatedsmall'] = '{$a->username}(e)k bidalketa eguneratu du  zeregin honetan: {$a->assignment}.';
$string['gradersubmissionupdatedtext'] = '{$a->username}(e)k bidalketa eguneratu du zeregin honetan: \'{$a->assignment}\'  {$a->timeupdated} orduan

Hemen ikusgai:

{$a->url}';
$string['gradestudent'] = 'Kalifikatu ikaslea: (id={$a->id}, izen osoa={$a->fullname}).';
$string['gradeuser'] = '{$a} kalifikazioa';
$string['grading'] = 'Kalifikazioa';
$string['gradingchangessaved'] = 'Kalifikazioaren aldaketak gorde dira';
$string['gradingmethodpreview'] = 'Kalifikazio-irizpidea';
$string['gradingoptions'] = 'Aukerak';
$string['gradingstatus'] = 'Kalifikazioaren egoera';
$string['gradingstudent'] = 'Ikaslea kalifikatzen';
$string['gradingsummary'] = 'Kalifikazioen laburpena';
$string['grantextension'] = 'Eman epearen luzapena';
$string['grantextensionforusers'] = 'Eman epearen luzapena {$a} ikasleei';
$string['groupsubmissionsettings'] = 'Taldeko bidalketen ezarpenak';
$string['hiddenuser'] = 'Partaidea';
$string['hideshow'] = 'Ezkutatu/Erakutsi';
$string['instructionfiles'] = 'Argibideen fitxategiak';
$string['invalidfloatforgrade'] = 'Ezin izan da ulertu emandako kalifikazioa: {$a}';
$string['invalidgradeforscale'] = 'Kalifikazioak ez du balio oraingo eskalarako';
$string['lastmodifiedgrade'] = 'Azken aldaketa (kalifikazioa)';
$string['lastmodifiedsubmission'] = 'Azken aldaketa (bidalketa)';
$string['latesubmissions'] = 'Epez kanpoko bidalketak';
$string['latesubmissionsaccepted'] = 'Bakarrik epearen luzapena jaso duten ikasleek egin ditzakete bidalketak';
$string['locksubmissionforstudent'] = 'Ez utzi bidalketa berririk ikasle hauentzat: (id={$a->id}, izen osoa={$a->fullname}).';
$string['locksubmissions'] = 'Blokeatu bidalketak';
$string['manageassignfeedbackplugins'] = 'Kudeatu zereginaren feedback-pluginak';
$string['manageassignsubmissionplugins'] = 'Kudeatu zereginetarako bidalketa-plugina';
$string['marker'] = 'Kalifikatzailea';
$string['markerfilter'] = 'Kalifikatzaile iragazkia';
$string['markingallocation'] = 'Erabili kalifikazio-esleipena.';
$string['markingallocation_help'] = 'Kalifikazio lan-fluxuarekin batera gaituz gero, ikasle konkretuei kalifikatzaileak eslei dakizkieke.';
$string['markingworkflow'] = 'Erabili kalifikazio lan-fluxua';
$string['markingworkflow_help'] = 'Gaituz gero, kalifikazioak lan-fluxu egoera ezberdinetatik igaroko dira ikasleei erakutsi baino lehen. Honek kalifikazio erronda anitzak egiteko eta ikasle guztiei aldi berean kalifikazioak erakusteko aukera ematen du.';
$string['markingworkflowstate'] = 'Kalifikazio lan-fluxuaren egoera';
$string['markingworkflowstate_help'] = 'Balizko lan-fluxu batek hurrengo egoerak izan ditzake (baimenen arabera):

* Kalifikatu gabe - kalifikatzailea oraindik ez da lanean hasi.
* Kalifikatzen - kalifikatzailea lanean hasi da baina oraindik ez du bukatu.
* Kalifikazioa osatua - kalifikatzaileak lana bukatu du baina oraindik ikuskatu/zuzentzera sartuko da.
* Berrikusten - irakaslea kalifikazioaren kalitatearen ikuskapena egiten ari da.
* Ikusgai jartzeko prest - irakasleak onespena eman du baina ikasleari oraindik ez zaio kalifikazioa erakutsi.
* Ikusgai - ikasleak kalifikazio eta feedback-a ikusi ditzake';
$string['markingworkflowstateinmarking'] = 'Kalifikatzen';
$string['markingworkflowstateinreview'] = 'Berrikusten';
$string['markingworkflowstatenotmarked'] = 'Kalifikatu gabe';
$string['markingworkflowstatereadyforrelease'] = 'Ikusgai jartzeko prest';
$string['markingworkflowstatereadyforreview'] = 'Kalifikazioa osatua';
$string['markingworkflowstatereleased'] = 'Ikusgai';
$string['maxattempts'] = 'Saiakera kopuru maximoa';
$string['maxattempts_help'] = 'Ikasle batek egin dezaken saiakera kopuru maximoa. Saiakera-kopuru hau egin ondoren, ezin izango dira berrireki ikaslearen bidalketak.';
$string['maxgrade'] = 'Gehieneko kalifikazioa';
$string['messageprovider:assign_notification'] = 'Zereginaren jakinarazpenak';
$string['modulename'] = 'Zeregina';
$string['modulename_help'] = 'Zeregin jarduera moduluaren bidez irakasleak komunikatu ditzake atazak, jaso ditzake ikasleen lanak eta eman ditzake kalifikazioak eta feedbackak.

Ikasleek eduki digitalak bidal ditzakete (fitxategiak), testu-dokumentuak kalkulu orriak, irudiak, audio-klipak edo bideo-klipak. Halaber, ikasleek zeregina egiteko garaian, idatz dezakete testu bat zuzenean testu-editorean. Zereginaren beste erabilera posible bat da \'mundu errealeko\' ataza bat ikasleei gogoraraztea, adibidez, arte-lan bat edo eduki digitalik eskatzen ez duen edozein lan. Ikasleek lana bidal dezakete banaka edo talde baten izenean.

Irakasleek, zereginak orrazterakoan, feedbackak eta iruzkinak jar ditzakete, fitxategiak igo ditzakete, adibidez: ikasleen dokumentuak oharrekin, dokumentu berriak iruzkinekin edo hitzezko feedbacka duten audioak.

Zereginak kalifikatzeko erabil daitezke zenbakiak, eskalak edo errubrikak bezalako mekanismo aurreratuak. Azken kalifikazioak kalifikazio-liburuan gordetzen dira.';
$string['modulenameplural'] = 'Zereginak';
$string['moreusers'] = '{$a} gehiago...';
$string['mysubmission'] = 'Nire bidalketa:';
$string['newsubmissions'] = 'Zereginak bidalita';
$string['noattempt'] = 'Saiaketarik ez';
$string['nofiles'] = 'Fitxategirik ez.';
$string['nograde'] = 'Kalifikaziorik ez.';
$string['nolatesubmissions'] = 'Ez onartu epez kanpoko bidalketarik';
$string['nomoresubmissionsaccepted'] = 'Ez da onartzen bidalketa gehiago';
$string['noonlinesubmissions'] = 'Zeregin honek ez du ezer on-line aurkezteko eskatzen';
$string['nosavebutnext'] = 'Hurrengoa';
$string['nosubmission'] = 'Ez dago bildalketarik zeregin honetan';
$string['nosubmissionsacceptedafter'] = 'Ez da ondoren bidalketa gehiago onartzen';
$string['notgraded'] = 'Kalifikatu gabea';
$string['notgradedyet'] = 'Oraindik notarik jarri gabe';
$string['notifications'] = 'Jakinarazpenak';
$string['notsubmittedyet'] = 'Oraindik bidali gabe';
$string['nousersselected'] = 'Ez da erabiltzailerik aukeratu';
$string['numberofdraftsubmissions'] = 'Zirriborroak';
$string['numberofparticipants'] = 'Partaideak';
$string['numberofsubmissionsneedgrading'] = 'Kalifikatu beharrekoak';
$string['numberofsubmittedassignments'] = 'Bidalita';
$string['numberofteams'] = 'Taldeak';
$string['offline'] = 'Ez du on-line bidalketarik eskatzen';
$string['open'] = 'Zabalik';
$string['outlinegrade'] = 'Kalifikazioa: {$a}';
$string['outof'] = '{$a->current}.a {$a->total}-tik';
$string['overdue'] = '<font color="red">Zeregina bidaltzeko epea amaitu da orain dela {$a}</font>';
$string['page-mod-assign-view'] = 'Zereginaren edozein orri';
$string['page-mod-assign-x'] = 'Zereginaren edozein orri';
$string['participant'] = 'Partaidea';
$string['pluginadministration'] = 'Zereginaren kudeaketa';
$string['pluginname'] = 'Zeregina';
$string['preventsubmissions'] = 'Ez utzi erabiltzaileari bidalketa berriak egiten zeregin honetan.';
$string['preventsubmissionsshort'] = 'Debekatu bidalketan aldaketak egitea';
$string['previous'] = 'Aurrekoa';
$string['quickgrading'] = 'Kalifikazio azkarra';
$string['quickgradingchangessaved'] = 'Kalifikazio aldaketak gorde dira';
$string['quickgrading_help'] = 'Kalifikazio azkarraren bidez, kalifikazioak (eta helburuak) jar  ditzakezu zuzenean bidalketa-taulan. Kalifikazio azkarra ez da bateragarria kalifikazio aurreratuarekin eta ez da komenigarria erabiltzea kalifikatzaile bat baino gehiago dagoenean.';
$string['quickgradingresult'] = 'Kalifikazio azkarra';
$string['recordid'] = 'Identifikatzailea';
$string['requireallteammemberssubmit'] = 'Taldekide guztiek bidalketa egin behar dute';
$string['requireallteammemberssubmit_help'] = 'Aukera hau gaitzen bada, taldekide guztiek klikatu behar dute bidalketa-botoia bidalketa amaitutzat emateko. Ezgaitzen bada, bidalketa egina egongo da taldekide bakar batek bidalketa egin bezain laster.';
$string['requiresubmissionstatement'] = 'Behartu ikasleak bidalketa-sententzia onartzera';
$string['requiresubmissionstatement_help'] = 'Behartu ikasleak bidalketa-sententzia onartzera zeregin honen bidalketa guztietan.';
$string['revealidentities'] = 'Ezagutarazi ikasleen identitatea';
$string['revealidentitiesconfirm'] = 'Ziur al zaude ikasleen identitatea jakinarazi nahi duzula zeregin honetan? Eragiketa hau ezin da desegin. Behin identitateak jakinarazi direla, kalifikazioa bidaliko dira kalifikazio liburura.';
$string['reverttodraft'] = 'Itzuli bidalketa zirriborro-egoerara.';
$string['reverttodraftforstudent'] = 'Itzuli ikasle honen bidalketa zirriborro-egoerara: (id={$a->id}, izen osoa={$a->fullname}).';
$string['reverttodraftshort'] = 'Itzuli bidalketa zirriborrora';
$string['reviewed'] = 'Berrikusia';
$string['saveallquickgradingchanges'] = 'Gorde kalifikazio azkar guztietako aldaketak';
$string['savechanges'] = 'Aldaketak gorde';
$string['savegradingresult'] = 'Kalifikazioa';
$string['savenext'] = 'Gorde eta erakutsi hurrengoa';
$string['scale'] = 'Eskala';
$string['selectedusers'] = 'Aukeratutako erabiltzaileak';
$string['selectlink'] = 'Aukeratu...';
$string['selectuser'] = 'Aukeratu {$a}';
$string['sendlatenotifications'] = 'Eman kalifikatzaileei epez kanpoko bidalketen berri';
$string['sendlatenotifications_help'] = 'Aukera hau gaituta badago, kalifikatzaileek (normalean irakasleak) mezu bat jasotzen dute ikasleek bidalketa bat berandu egiten duten bakoitzean. Mezularitza-metodoak konfiguratuta daude horretarako.';
$string['sendnotifications'] = 'Eman kalifikatzaileei bidalketen berri';
$string['sendnotifications_help'] = 'Aukera hau gaituta badago, kalifikatzaileek (normalean irakasleak) mezu bat jasotzen dute ikasleek bidalketa bat egiten duten bakoitzean, nahiz garaiz edo berandu bidali. Mezularitza-metodoak konfiguratuta daude horretarako.';
$string['sendstudentnotifications'] = 'Jakinarazi ikasleei';
$string['sendstudentnotifications_help'] = 'Gaituz gero, ikasleek eguneratutako kalifikazio edo feedbackaren berri ematen duen mezua jasoko du.';
$string['sendsubmissionreceipts'] = 'Bidali ikasleei bidalketa jaso izanaren agiria';
$string['sendsubmissionreceipts_help'] = 'Aukera honek bidalketa jaso izanaren agiriak gaituko ditu ikasleentzat. Ikasleek jasoko dute jakinarazpen bat zeregin bat bidaltzen duten bakoitzean';
$string['setmarkerallocationforlog'] = 'Kalifikazio-esleipena ezarri: (id={$a->id}, izen osoa={$a->fullname}, kalifikatzailea={$a->marker}).';
$string['setmarkingallocation'] = 'Ezarri esleitutako kalifikatzailea';
$string['setmarkingworkflowstate'] = 'Ezarri kalifikazio lan-fluxuaren egoera';
$string['setmarkingworkflowstateforlog'] = 'Kalifikazio lan-fluxuaren egoera:  (id={$a->id}, izen osoa={$a->fullname}, egoera={$a->state}).';
$string['settings'] = 'Zereginaren ezarpenak';
$string['showrecentsubmissions'] = 'Azken bidalketak erakutsi';
$string['status'] = 'Egoera';
$string['submission'] = 'Bidalketa';
$string['submissioncopiedhtml'] = '<p>\'<i>{$a->assignment}</i>\' zereginerako aurreko bidalketaren kopia bat egin duzu</i>\'.</p>
<p>Zure <a href="{$a->url}">zeregin bidalketaren</a> egoera ikus dezakezu.</p>';
$string['submissioncopiedsmall'] = '{$a->assignment} zereginerako zure aurreko bidalketa kopiatu duzu';
$string['submissioncopiedtext'] = '\'{$a->assignment}\' zereginerako zure aurreko bidalketa kopiatu duzu

Zure zeregin bidalketaren egoera hemen ikus dezakezu:

   {$a->url}';
$string['submissiondrafts'] = 'Behartu ikasleak "bidali" botoiari sakatzera';
$string['submissiondrafts_help'] = 'Aukera hau gaituta badago, ikasleek Bidali botoia klikatu behar dute bidalketa amaitutzat emateko. Mekanismo honi esker, ikasleek zirriborro moduko bidalketa bat izan dezakete sisteman. Aukera hau "Ez" egoeratik "Bai" egoerara aldatzen bada eta dagoeneko ikasleen bidalketak badaude, amaitutako bidalketatzat hartuko dira.';
$string['submissioneditable'] = 'Ikasleak bere bidalketa edita dezake';
$string['submissionempty'] = 'Ez da ezer bidali';
$string['submissionnotcopiedinvalidstatus'] = 'Bidalketa ez da kopiatu, berrireki ondoren editatu delako.';
$string['submissionnoteditable'] = 'Ikasleak ezin du editatu bidalketa hau';
$string['submissionnotready'] = 'Zeregin hau ez dago bidaltzeko prest:';
$string['submissionplugins'] = 'Bidalketa-pluginak';
$string['submissionreceipthtml'] = '<p>\'<i>{$a->assignment}</i>\' zereginari erantzun diozu.</p>
<p>Zure <a href="{$a->url}">lanaren egoera</a> ikus dezakezu.</p>';
$string['submissionreceipts'] = 'Bidali bidalketa jaso izanaren agiria';
$string['submissionreceiptsmall'] = 'Bidalketa egin duzu zeregin honetan:  {$a->assignment}';
$string['submissionreceipttext'] = '\'{$a->assignment}\' zereginari erantzun diozu.

Zure lanaren egoera hemen ikus dezakezu:

 {$a->url}';
$string['submissions'] = 'Bidalketak';
$string['submissionsclosed'] = 'Bidalketa itxita';
$string['submissionsettings'] = 'Bidalketaren ezarpenak';
$string['submissionslocked'] = 'Zeregin honek ez du bidalketarik onartzen';
$string['submissionslockedshort'] = 'Ez dago baimenduta bidalketan aldaketak egitea';
$string['submissionsnotgraded'] = 'Kalifikatu gabeko bidalketak: {$a}';
$string['submissionstatement'] = 'Bidalketa-sententzia';
$string['submissionstatementacceptedlog'] = '{$a} erabiltzaileak bidalketa-sententzia onartu du';
$string['submissionstatementdefault'] = 'Zeregin hau nik egindako lana da, eta besteen ekarpenak baditu, egilearen aitorpena egin dut lanean bertan.';
$string['submissionstatement_help'] = 'Zereginaren bidalketaren berreste-sententzia';
$string['submissionstatus'] = 'Bidalketaren egoera';
$string['submissionstatus_'] = 'Ez dago bidalketarik';
$string['submissionstatus_draft'] = 'Zirriborroa (bidali gabea)';
$string['submissionstatusheading'] = 'Bidalketen egoera';
$string['submissionstatus_marked'] = 'Kalifikatua';
$string['submissionstatus_new'] = 'Bidalketa berria';
$string['submissionstatus_reopened'] = 'Berrirekita';
$string['submissionstatus_submitted'] = 'Kalifikatzeko bidalia';
$string['submissionsummary'] = '{$a->status}. Azken aldaketa {$a->timemodified}-n';
$string['submissionteam'] = 'Taldea';
$string['submissiontypes'] = 'Bidalketa-motak';
$string['submitaction'] = 'Bidali';
$string['submitassignment'] = 'Bidali zeregina';
$string['submitassignment_help'] = 'Behin zeregina bidalita, ezin izango duzu aldaketarik egin.';
$string['submitted'] = 'Bidalita';
$string['submittedearly'] = 'Bidalketagaraiz bidali zen: {$a}';
$string['submittedlate'] = 'Zeregina berandu bidali zen: {$a}';
$string['submittedlateshort'] = '{$a} beranduago';
$string['subplugintype_assignfeedback'] = 'Feedback plugina';
$string['subplugintype_assignfeedback_plural'] = 'Feedback pluginak';
$string['subplugintype_assignsubmission'] = 'Bidalketa-plugina';
$string['subplugintype_assignsubmission_plural'] = 'Bidalketa-pluginak';
$string['teamsubmission'] = 'Ikasleek taldeka bidaliko dute';
$string['teamsubmissiongroupingid'] = 'Ikasle-taldeen taldekatzea';
$string['teamsubmissiongroupingid_help'] = 'Zereginak taldekatze hau erabiliko du ikasle-taldeak aurkitzeko. Gaitzen ez bada, lehenetsitako taldekatzea erabiliko da.';
$string['teamsubmission_help'] = 'Aukera hau gaitzen bada, ikasleak banatuko dira lehenetsitako taldekatzearen arabera edo taldekatze jakin baten arabera. Taldearen izenean bidalketa bat egingo da eta taldekide guziek ikusiko dute beste taldekideek egindako aldaketak.';
$string['teamsubmissionstatus'] = 'Taldearen bidalketa-egoera';
$string['textinstructions'] = 'Zereginerako argibideak';
$string['timemodified'] = 'Azken aldaketa';
$string['timeremaining'] = 'Geratzen den denbora';
$string['unlimitedattempts'] = 'Mugarik gabea';
$string['unlimitedattemptsallowed'] = 'Mugarik gabeko saiakera-kopurua onartzen da.';
$string['unlocksubmissionforstudent'] = 'Onartu bidalketak ikasle honi: (id={$a->id}, izen osoa={$a->fullname}).';
$string['unlocksubmissions'] = 'Desblokeatu bidalketak';
$string['updategrade'] = 'Eguneratu kalifikazioa';
$string['updatetable'] = 'Gorde eta eguneratu taula';
$string['upgradenotimplemented'] = 'Ez da garatu bertsio-berritzea ({$a->type} {$a->subtype}) pluginarentzat';
$string['userextensiondate'] = 'Epearen luzapena eman da {$a} arte';
$string['usergrade'] = 'Erabiltzailearen kalifikazioa';
$string['userswhoneedtosubmit'] = 'Bidalketa egin behar duten erabiltzaileak: {$a}';
$string['validmarkingworkflowstates'] = 'Lan-fluxu egoera zuzena';
$string['viewbatchmarkingallocation'] = 'Ikusi kalifikazio-esleipen orri sorta';
$string['viewbatchsetmarkingworkflowstate'] = 'Ikusi lan-fluxu egoeraren orri sorta';
$string['viewfeedback'] = 'Ikusi feedbacka';
$string['viewfeedbackforuser'] = 'Ikusi erabiltzaile honentzako feedbacka: {$a}';
$string['viewfull'] = 'Ikusi guztia';
$string['viewfullgradingpage'] = 'Joan kalifikazio guztien orrira feedbacka emateko';
$string['viewgradebook'] = 'Ikusi kalifikazio-liburua';
$string['viewgrading'] = 'Ikusi/Kalifikatu bidalketa guztiak';
$string['viewgradingformforstudent'] = 'Ikusi ikasle honen kalifikazio-orria: (id={$a->id}, izen osoa={$a->fullname}).';
$string['viewownsubmissionform'] = 'Ikusi norberaren zereginen bidalketa-orria.';
$string['viewownsubmissionstatus'] = 'Ikusi norberaren zereginen bidalketa-orria.';
$string['viewrevealidentitiesconfirm'] = 'Ikusi ikasleen identitatea ezagutarazteko berrespen-orria.';
$string['viewsubmission'] = 'Ikusi bidalketa';
$string['viewsubmissionforuser'] = 'Ikusi ikasle honen erabiltzailea: {$a}';
$string['viewsubmissiongradingtable'] = 'Ikusi bidalketen kalifikazio-orria.';
$string['viewsummary'] = 'Ikusi laburpena';
$string['workflowfilter'] = 'Lan-fluxu iragazkia';
