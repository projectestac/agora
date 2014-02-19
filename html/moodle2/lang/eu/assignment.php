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
 * Strings for component 'assignment', language 'eu', branch 'MOODLE_24_STABLE'
 *
 * @package   assignment
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Zain dituzu hainbat zeregin';
$string['addsubmission'] = 'Gehitu bidalketa';
$string['allowdeleting'] = 'Ezabatzen utzi';
$string['allowdeleting_help'] = 'Aukera hau gaituz gero, ikasleek igotako fitxategiak kalifikatu aurreko edozein momentutan ezabatu ahalko dituzte.';
$string['allowmaxfiles'] = 'Igotzeko gehienezko fitxategi-kopurua';
$string['allowmaxfiles_help'] = 'Partaide bakoitzak gehienez igo ditzakeen fitxategien kopurua. Kopuru hau ez zaie ikasleei erakusten. Mesedez, idatz ezazu zereginaren deskribapenean benetan eskatu nahi dituzun fitxategien kopurua.';
$string['allownotes'] = 'Baimendu oharrak';
$string['allownotes_help'] = 'Gaituz gero, ikasleek oharrak gehitu ahal dituzte testu-eremu batean, on-line zeregin batean bezalaxe.';
$string['allowresubmit'] = 'Berbidalketa baimendu';
$string['allowresubmit_help'] = '<p>Besterik adierazi ezean, ikasleek ezin dituzte zereginak berbidali irakasleak
nota jarri eta gero.</p>
<p>Aukera hau aktibatzen baduzu, ikasleek nota jaso eta gero zereginak berbidali
ahal izango dituzte (zuk nota berria jartzeko). Ikasleak joan-etorriko prozesu
batean lana hobetzera bultzatu nahi badituzu erabilgarria izan daiteke hau.</p>
<p>Aukera honek, jakina, ez du zerikusirik lineaz kanpoko zereginekin.</p>';
$string['alreadygraded'] = 'Zure zeregina dagoeneko kalifikatu egin da eta berbidalketa ez dago gaituta';
$string['assignment:addinstance'] = 'Gehitu beste zeregin bat';
$string['assignmentdetails'] = 'Zereginaren xehetasunak';
$string['assignment:exportownsubmission'] = 'Norberaren bidalketa esportatu ';
$string['assignment:exportsubmission'] = 'Esportatu bidalketa';
$string['assignment:grade'] = 'Zeregina kalifikatu';
$string['assignmentmail'] = '{$a->teacher}(e)k erantzun egin dio zure bidalketari ondorengo zereginean: \'{$a->assignment}\'.

Egin zenuen bidalketarekin batera ikus dezakezu erantzuna: {$a->url}';
$string['assignmentmailhtml'] = '{$a->teacher}(e)k erantzun egin dio zure bidalketari ondorengo zereginean: \'<i>{$a->assignment}</i>\'<br /><br/>

Egin zenuen <a href="{$a->url}">bidalketarekin batera ikus dezakezu erantzuna</a>.';
$string['assignmentmailsmall'] = '{$a->teacher}(e)k erantzun egin dio zure bidalketari ondorengo zereginean: \'<i>{$a->assignment}\'

Zure bidalketarekin batera ikus dezakezu erantzuna.';
$string['assignmentname'] = 'Zereginaren izena';
$string['assignmentsubmission'] = 'Zereginaren bidalketak';
$string['assignment:submit'] = 'Bidali zeregina';
$string['assignmenttype'] = 'Zeregin-mota';
$string['assignment:view'] = 'Zeregina ikusi';
$string['availabledate'] = 'Noiztik aurrera eskuragarri';
$string['cannotdeletefiles'] = 'Errorea gertatu da eta fitxategiak ezin dira ezabatu';
$string['cannotviewassignment'] = 'Ein duzu zeregin hau ikusi';
$string['changegradewarning'] = 'Zeregin honetan badago kalifikatutako bidalketarik, berbidalketak ez ditu automatikoki kalifikazioak berriro kalkulatzen. Badiren bidalketen kalifikazioak berriro kalkulatu behar dituzu, nahi duzun kalifikazioa aldatu ahal izateko.';
$string['closedassignment'] = 'Zeregin hau itxita dago, amaitu da bidalketak gehitzeko epea.';
$string['comment'] = 'Iruzkina';
$string['commentinline'] = 'Lerro arteko iruzkina';
$string['commentinline_help'] = '<p>Aukera hau gaituta dagoenean, ikasleak bidalitako testua automatikoki kopiatuko da irakasleak kalifikazioa eta iruzkina egiteko erabiltzen duen testu-eremuan. Aukera honek on lineko ebaluazioa errazten du (kolore ezberdinak erabiliz, agian) edo jatorrizko testuaren lerro arteko iruzkinak egiten utziz.</p>';
$string['configitemstocount'] = 'Ikasleek on-line eginkizunetako bidalketetan kontuan hartu behar diren itemen izaera';
$string['configmaxbytes'] = 'Guneko eginkizun guztietarako berezko gehienezko tamaina (ikastaroaren mugen eta zerbitzariaren beste aldagai batzuen araberakoa)';
$string['configshowrecentsubmissions'] = 'Duela gutxiko aktibitatearen txostenetan guztiek ikus ditzakete bidalketen jakinarazpenak';
$string['confirmdeletefile'] = 'Erabat ziur al zaude fitxategi hau ezabatu egin nahi duzula?<br /><strong>{$a}</strong>';
$string['coursemisconf'] = 'Ikastaroa ez dago ondo konfiguratuta';
$string['currentgrade'] = 'Oraingo kalifikazioa kalifikazio-liburuan';
$string['deleteallsubmissions'] = 'Bidalketa guztiak ezabatu';
$string['deletefilefailed'] = 'Ezin izan da fitxategia ezabatu';
$string['description'] = 'Deskribapena';
$string['downloadall'] = 'Zeregin guztiak zip gisa jaitsi';
$string['draft'] = 'Zirriborroa';
$string['due'] = 'Zeregina egin gabe';
$string['duedate'] = 'Entregatze-data';
$string['duedateno'] = 'Entregatze-datarik ez';
$string['early'] = '{$a} lehenago';
$string['editmysubmission'] = 'Editatu neure bidalketa';
$string['editthesefiles'] = 'Editatu fitxategi hauek';
$string['editthisfile'] = 'Eguneratu fitxategi hau';
$string['emailstudents'] = 'E-mail bidezko jakinarazpenak ikasleei';
$string['emailteachermail'] = '{$a->username}(e)k bidalketa eguneratu du ondorengo zereginean: \'{$a->assignment}\'.

Hemen ikusgai:
{$a->url}';
$string['emailteachermailhtml'] = '{$a->username}(e)k bidalketa eguneratu du ondorengo zereginean: <i>\'{$a->assignment}\'</i><br/><br/>
Web-gune honetan ikusgai: <a href="{$a->url}"></a>.';
$string['emailteachers'] = 'Abisuak bidali tutoreei e-postaz';
$string['emailteachers_help'] = '<p>Aktibatzen bada, ikasleek zeregina gaineratu eta eguneratzen dutenean, irakasleek abisua jasoko dute mezu labur baten bidez.</p>

<p>Abisua bidalketa jakin bat kalifikatzeko baimena duten irakasleek bakarrik jasoko dute. Horrela, bada, ikastaroak talde ezberdinak baditu, adibidez, talde bateko irakasleek ez dute beste talde bateko ikasleen inguruko informaziorik jasoko.</p>

<p>Jakina, inoiz ez da mezurik bidaliko zereginak lineaz kanpokoa bada, ikasleek horrelakoetan ez dutelako bidalketarik egingo.</p>';
$string['emptysubmission'] = 'Ez duzu ezer bidali oraindik';
$string['enablenotification'] = 'Jakinarazpena e-postaz bidali';
$string['enablenotification_help'] = '<p>Aukera hau gaituz gero, ikasleei e-posta bidez jakinaraziko zaie beren zereginari kalifikazioa eta iruzkinak ezarri zaizkiola.</p>

<p>Zure aukera hau gorde egingo da eta kalifikatu behar dituzun gainerako zeregin guztietan aplikatuko da.</p>';
$string['errornosubmissions'] = 'Ez dago jaisteko bidalketarik';
$string['existingfiledeleted'] = 'Fitxategia ezabatuta: {$a}';
$string['failedupdatefeedback'] = 'Bidalketen erantzunaren eguneraketak huts egin du hurrengo erabiltzailearentzat: {$a}';
$string['feedback'] = 'Feedbacka';
$string['feedbackfromteacher'] = '{$a}(r)en feedbacka';
$string['feedbackupdated'] = 'Bidalketen erantzuna {$a} pertsonarentzat eguneratu da';
$string['finalize'] = 'Debekatu bidalketak eguneratzea';
$string['finalizeerror'] = 'Errorea gertatu da eta bidalketa ezin izan da amaitu';
$string['futureaassignment'] = 'Zeregin hau ez dago jada eskuragarri.';
$string['graded'] = 'Kalifikatua';
$string['guestnosubmit'] = 'Barkatu, bisitariek ezin dute eginkizunik bidali. Zure erantzuna bidali ahal izateko, zure datuak bidali behar dituzu edo erregistratu.';
$string['guestnoupload'] = 'Barkatu, bisitariek ezin dute ezer igo.';
$string['helpoffline'] = '<p>Hau baliagarria da eginkizuna Moodle-tik kanpo, interneteko guneren batean edota aurrez aurre egiten denean.</p><p>Ikasleek eginkizunaren deskribapena ikus dezakete baina ezin dute inolako fitxategirik igo zerbitzarira. Kalifikazioek normal funtzionatzen dute eta ikasleek izandako kalifikazioaren inguruko jakinarazpenak jasoko dituzte.</p>';
$string['helponline'] = '<p>Eginkizun-mota honetan erabiltzaileek testu bat editatu beharko dute ohiko edizio-tresnak erabilita. Irakasleek on-line kalifikatu ahal izango dituzte eta baita iruzkinak edota aldaketak gaineratu ere.</p><p>(Moodle-ren aurreko bertsioak ezagutzen badituzu, Egunerokoa moduluak egiten zuen gauza bera egiten du eginkizun-mota honek)</p>';
$string['helpupload'] = '<p>Zeregin mota honek edozein motatako fitxategi bat edo gehiago igotzeko aukera ematen dio partaide bakoitzari.</p>
<p> Word dokumentua, irudia, web konprimitua edo bidaltzeko eskatzen zaien beste edozein fitxategi izan daiteke.</p>
<p>Zeuk ere edozein motatako hainbat erantzun-fitxategi igo dezakezu.</p>';
$string['helpuploadsingle'] = '<p>Eginkizun-mota honetan partaideek edozein motatako fitxategi bakarra igo beharko dute.</p><p>Word-en egindako dokumentua, irudia, web gune konprimitua izan daiteke edo bidaltzeko esaten zaien beste edozer.</p>';
$string['hideintro'] = 'Deskribapena eskura dagoen data baino lehen ezkutatu';
$string['hideintro_help'] = '<p>Aukera hau gaituz gero, zereginaren deskribapena ezkutuan egongo da zeregina egiteko hasiera-data izan arte.</p>';
$string['invalidassignment'] = 'Zeregina ez da zuzena';
$string['invalidfileandsubmissionid'] = 'Fitxategia edo bidalketaren IDa falta da';
$string['invalidid'] = 'Zereginaren IDa ez da zuzena';
$string['invalidsubmissionid'] = 'Bidalketaren IDa ez da zuzena';
$string['invalidtype'] = 'Zeregin-mota ez da zuzena';
$string['invaliduserid'] = 'Erabiltzailearen IDak ez du balio';
$string['itemstocount'] = 'Zenbakia';
$string['lastgrade'] = 'Azken kalifikazioa';
$string['late'] = '{$a} beranduago';
$string['maximumgrade'] = 'Gehienezko kalifikazioa';
$string['maximumsize'] = 'Gehienezko tamaina';
$string['maxpublishstate'] = 'Gehieneko ikusgarritasuna blog-sarrerarentzat amaiera-data baino lehen';
$string['messageprovider:assignment_updates'] = 'Zereginen jakinarazpenak (2.2)';
$string['modulename'] = 'Zeregina (2.2)';
$string['modulename_help'] = 'Zereginaren bitartez irakasleak on-line edo off-line egin daitekeen lan bat zehaz dezake eta hori kalifikatu egin ahal da.';
$string['modulenameplural'] = 'Zereginak (2.2)';
$string['newsubmissions'] = 'Zereginak bidalita';
$string['noassignments'] = 'Ez dago zereginik oraindik';
$string['noattempts'] = 'Inor ez da saiatu zeregin honetan oraindik';
$string['noblogs'] = 'Ez duzu blog-sarrerarik bidaltzeko!';
$string['nofiles'] = 'Ez da fitxategirik bidali';
$string['nofilesyet'] = 'Oraindik ez da fitxategirik bidali';
$string['nomoresubmissions'] = 'Ez da onartzen bestelako bidalketarik';
$string['norequiregrading'] = 'Ez dago kalifikatu beharreko zereginik';
$string['nosubmisson'] = 'Ez da zereginik bidali';
$string['notavailableyet'] = 'Barkatu, zeregin hau dagoeneko ez dago eskuragarri.<br />Zereginaren instrukzioak hemen erakutsiko dira beherago agertzen den datan.';
$string['notes'] = 'Oharrak';
$string['notesempty'] = 'Ez dago sarrerarik';
$string['notesupdateerror'] = 'Errorea oharrak eguneratzean';
$string['notgradedyet'] = 'Oraindik notarik jarri gabe';
$string['notsubmittedyet'] = 'Oraindik bidali gabe';
$string['onceassignmentsent'] = 'Behin zeregina kalifikatzeko bidalita, ezin izango duzu ezabatu ezta fitxategirik erantsi ere.';
$string['operation'] = 'Eragiketa';
$string['optionalsettings'] = 'Aukerako ezarpenak';
$string['overwritewarning'] = 'Kontuz: berriz igotzeak zure oraingo bidalketa ORDEZKATUKO du';
$string['page-mod-assignment-submissions'] = 'Zeregin moduluaren bidalketa-orria';
$string['page-mod-assignment-view'] = 'Zeregin moduluaren hasiera-orria';
$string['page-mod-assignment-x'] = 'Zereginaren edozein orri';
$string['pagesize'] = 'Erakutsi beharreko bidalketa-kopurua orri bakoitzeko';
$string['pluginadministration'] = 'Zereginaren kudeaketa';
$string['pluginname'] = 'Zeregina (2.2)';
$string['popupinnewwindow'] = 'Zabaldu popup leihoan';
$string['preventlate'] = 'Debekatu epez kanpoko bidalketak';
$string['quickgrade'] = 'Utzi kalifikazio azkarrak jartzen';
$string['quickgrade_help'] = '<p>Aukera honek orri bakarrean hainbat zeregin oso bizkor kalifikatzea ahalbidetzen du.</p>

<p>Iruzkinak egin eta kalifikazioak ipinitakoan, Gorde botoia sakatu behar duzu egindako aldaketa guztiak batera gordetzeko.</p>

<p>Orriaren eskuin aldeko botoiek berdin funtzionatuko dute espazio gehiago behar izanez gero. Kalifikazio arinerako aukera hau gorde egingo da eta ikastaro guztietako zeregin guztietan erabiliko da.</p>';
$string['requiregrading'] = 'Kalifikazioa behar du';
$string['responsefiles'] = 'Erantzun-fitxategiak';
$string['reviewed'] = 'Berrikusia';
$string['saveallfeedback'] = 'Nire zuzenketa guztiak gorde';
$string['selectblog'] = 'Aukertu zein blog-sarrera bidali nahi duzun';
$string['sendformarking'] = 'Kalifikatzeko bidali';
$string['showrecentsubmissions'] = 'Azken bidalketak erakutsi';
$string['submission'] = 'Bidalketa';
$string['submissiondraft'] = 'Bidalketaren zirriborroa';
$string['submissionfeedback'] = 'Bidalketari erantzuna';
$string['submissions'] = 'Bidalketak';
$string['submissionsaved'] = 'Aldaketak gordeta';
$string['submissionsnotgraded'] = '{$a} bidalketa kalifikatu gabe';
$string['submitassignment'] = 'Zure zeregina formulario hau erabiliz bidali ezazu';
$string['submitedformarking'] = 'Zeregina bidalita dago berrikusteko eta ezin da eguneratu';
$string['submitformarking'] = 'Zeregina bidali kalifikatzeko';
$string['submitted'] = 'Bidalita';
$string['submittedfiles'] = 'Fitxategiak bidalita';
$string['subplugintype_assignment'] = 'Zeregin-mota';
$string['subplugintype_assignment_plural'] = 'Zeregin-motak';
$string['trackdrafts'] = 'Markatzeko bidalketa gaituta';
$string['trackdrafts_help'] = '<p>"Markatzeko bidali" botoiak aukera ematen die erabiltzaileei kalifikatzaileei zeregin bateko lanarekin bukatu dutela adierazteko. Kalifikatzaileek berriz ere zeregina proiektu egoerara itzultzea aukera dezakete (lan handiagoa eskatzen badu, adibidez).</p>';
$string['typeblog'] = 'Blo-mezua';
$string['typeoffline'] = 'Lineaz kanpoko zereginak';
$string['typeonline'] = 'On-line testua';
$string['typeupload'] = 'Fitxategien igoera aurreratua';
$string['typeuploadsingle'] = 'Fitxategi bakarra igo';
$string['unfinalize'] = 'Itzuli zirriborrora';
$string['unfinalizeerror'] = 'Errorea gertatu da eta bidalketa ezin da zirriborrora itzuli';
$string['upgradenotification'] = 'Jarduera hau zeregin modulu zaharrarekin eginda dago.';
$string['uploadafile'] = 'Igo fitxategia';
$string['uploadbadname'] = 'Fitxategi izen honek karaktere bereziak ditu eta ezin izan da igo';
$string['uploadedfiles'] = 'Igotako fitxategiak';
$string['uploaderror'] = 'Errorea gertatu da fitxategia zerbitzarian gordetzean';
$string['uploadfailnoupdate'] = 'Fitxategia behar bezala igo da, baina ezin izan da zure bidalketa eguneratu!';
$string['uploadfiles'] = 'Igo fitxategiak';
$string['uploadfiletoobig'] = 'Barkatu, fitxategi hori handiegia da (muga {$a} byte dira)';
$string['uploadnofilefound'] = 'Ez da fitxategirik aurkitu - ziur baten bat aukeratu duzula igotzeko?';
$string['uploadnotregistered'] = '\'{$a}\' ondo igo da, baina bidalketa ez da erregistratu!';
$string['uploadsuccess'] = '\'{$a}\' ondo igo da';
$string['usermisconf'] = 'Erabiltzailea ez dago ondo konfiguratuta';
$string['usernosubmit'] = 'Barkatu, baina ez duzu zereginik bidaltzeko baimenik.';
$string['viewassignmentupgradetool'] = 'Ikusi zeregina eguneratzeko tresna';
$string['viewfeedback'] = 'Zereginen kalifikazioak eta erantzunak ikusi';
$string['viewmysubmission'] = 'Ikusi nire bidalketa';
$string['viewsubmissions'] = 'Bidalitako {$a} zeregin ikusi';
$string['yoursubmission'] = 'Zure bidalketa';
