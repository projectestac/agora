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
 * Strings for component 'enrol_authorize', language 'eu', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_authorize
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminacceptccs'] = 'Zer kreditu-txartel onartuko da?';
$string['adminaccepts'] = 'Onartutako ordainketa-metodoak aukeratu';
$string['adminauthorizeccapture'] = 'Eskariaren errebisioaren ezarpenak';
$string['adminauthorizeemail'] = 'E-postaren bidalketen ezarpenak';
$string['adminauthorizesettings'] = 'Authorize.net merkataritza-kontuaren ezarpenak';
$string['adminauthorizewide'] = 'Ezarpen orokorrak';
$string['adminconfighttps'] = 'Mesedez ziurtatu "<a href="{$a->url}"> loginhttps-a ON</a>" duzula plugin hau<br />in Kudeaketa >> Ezapenak >> Segurtasuna>> HTTP segurtasun-ean erabiltzeko.';
$string['adminconfighttpsgo'] = 'Zoaz <a href="{$a->url}">orri segurura</a> plugin hau konfiguratzeko.';
$string['admincronsetup'] = 'Cron.php mantenurako scripta ez da aktibatu gutxienez azken 24 ordutan. <br />Cron aktibatu behar da scheduled-capture delakoa erabili nahi baduzu.<br /><b>Aktibatu</b> \'Authorize.net plugin\' eta <b>cron</b> ondo ezarri; edo <b>ez aukeratu eta berriz errebisatu</b>.<br />Scheduled-capture delakoa aktibatzen ez baduzu, transakzioak ez dira onartuko 30 eguneko epean errebisatzen ez badituzu.<br />Aukeratu <b>an_review</b> eta idatzi <b>\'0\' an_capture_day</b> eremuan br /><b>eskuz</b> ordainketak 30 eguneko epean onartu/gaitzetsi nahi badituzu.';
$string['adminemailexpiredsort'] = 'Irakasleari ordainketa-muga epea gainditzear dagoela e-mailez ohartarazten zaionean, zein da garrantzitsua?';
$string['adminemailexpiredsortcount'] = 'Ordainketa pendienteak';
$string['adminemailexpiredsortsum'] = 'Kopuruak orotara';
$string['adminemailexpsetting'] = '(0=e-maila bidaltzea desaktibatu, lehenetsia=2, gehienez=5)<br />(Eskuku kobrantzaren ezarpenak e-maila bidaltzeko: cron=aktibatuta, an_review=hautaturik, an_capture_day=0, an_emailexpired=1-5)';
$string['adminhelpcapturetitle'] = 'Aurreikusitako kobrantza-eguna';
$string['adminhelpreviewtitle'] = 'Ordainketen errebisioa';
$string['adminneworder'] = 'Kudeatzaile agurgarri hori:

  Egiteko dagoen ordainketa pendiente batez informatzen zaizu:

   Ordainketaren IDa: {$a->orderid}
   Eragiketaren IDa: {$a->transid}
   Erabiltzailea: {$a->user}
   Ikastaroa: {$a->course}
   Kopurua: {$a->amount}

   Aurreikusitako kobrantza aktibatuta?: {$a->acstatus}

  Aurreikusitako kobrantza aktibatuta balego kreditu txartela honetan ordainketa agiria emango litzateke: {$a->captureon}
  eta ikaslea ikastaroan matrikulatuko da, bestela epea {$a->expireon} egunean amaitu eta ezingo da kobratu egun horren ondoren.

  Nahi izangez gero, ikaslea momentuan matrikulatzeko, ordainketa berehala onartu edo gaitzes dezakezu esteka honen bitartez:
  {$a->url}';
$string['adminnewordersubject'] = '{$a->course}: Ordainketa pendiente ({$a->orderid})';
$string['adminpendingorders'] = 'Aurreikusitako kobrantza desaktibatu duzu.<br />Guztira {$a->count} eragiketa \'Onartuta/Kobrantzaren zain\' ezabatuko dira aukera hau egiten ez baduzu.<br />Ordainketak onartu edo gaitzesteko <a href=\'{$a->url}\'>Ordainketen Kudeaketa</a> orrira joan.';
$string['adminteachermanagepay'] = 'Irakasleek ikastaroaren ordainketa kudea dezakete.';
$string['allpendingorders'] = 'Burutu gabeko agindu guztiak';
$string['amount'] = 'Kopurua';
$string['anauthcode'] = 'Lortu matrikulazio-kodea';
$string['anavs'] = 'Helbideak egiaztatzeko sistema';
$string['anemailexpired'] = 'Iraungitze-jakinarazpena';
$string['anemailexpiredteacher'] = 'Iraungitze-jakinarazpena - Irakaslea';
$string['anlogin'] = 'Authorize.Net: Erabiltzaile-izena';
$string['anpassword'] = 'Authorize.Net: Pasahitza';
$string['anreferer'] = 'Erreferentzia';
$string['anreview'] = 'Berrikusi';
$string['anreviewdesc'] = 'Berrikusi agindua kreditu-txartela prozesatu aurretik.';
$string['antestmode'] = 'Test modua';
$string['antrankey'] = 'Authorize.Net: Eragiketa-kodea';
$string['approvedreview'] = 'Berrikusketa onartuta';
$string['authcaptured'] = 'Baimendua / Eragiketa egina';
$string['authcode'] = 'Baimen-kodea';
$string['authorize:config'] = 'Authorize.Net matrikulazio-instantziak konfiguratu';
$string['authorizedpendingcapture'] = 'Baimendua / Eragiketa egiten ari da';
$string['authorizeerror'] = 'Authorize.net errorea: {$a}';
$string['authorize:manage'] = 'Matrikulatutako erabiltzaileak kudeatu';
$string['authorize:managepayments'] = 'Ordainketak kudeatu';
$string['authorize:unenrol'] = 'Desmatrikulatu erabiltzaileak ikastarotik';
$string['authorize:unenrolself'] = 'Norbera ikastararotik desmatrikulatu';
$string['authorize:uploadcsv'] = 'CVS fitxategia igo';
$string['avsa'] = 'Helbidea (kalea) egokia da, baina posta-kodea ez';
$string['avsb'] = 'Helbidearen informazioa falta da';
$string['avse'] = 'Helbideak egiaztatzeko sistemaren errorea';
$string['avsg'] = 'Banketxeak ez du EEBBetako txartelik onartzen';
$string['avsn'] = 'Helbidea (kalea) eta posta-kodea ez dira egokiak';
$string['avsp'] = 'Helbideak egiaztatzeko sistema ezin da erabili';
$string['avsr'] = 'Berriz saiatu - Sistema ez da eskuragarria edo denbora-epea gainditu da';
$string['avsresult'] = 'AVS emaitza: {$a}';
$string['avss'] = 'Hartzaileak ez du zerbitzua onartzen';
$string['avsu'] = 'Helbidearen informazioa ezin da eskuratu';
$string['avsw'] = '9 digituko posta-kodea egokia da, helbidea (kalea) ez';
$string['avsx'] = 'Helbidea (kalea) eta 9 digituko posta-kodea egokiak dira';
$string['avsy'] = 'Helbidea (kalea) eta 5 digituko posta-kodea egokiak dira';
$string['avsz'] = '5 digituko posta-kodea egokia da, helbidea (kalea) ez';
$string['canbecredit'] = 'Hona itzuli ahal da: {$a->upto}';
$string['cancelled'] = 'Indargabetua';
$string['capture'] = 'Hartu';
$string['capturedpendingsettle'] = 'Eragiketa egina / Onarpenaren zain';
$string['capturedsettled'] = 'Eragiketa egina / Onartua';
$string['captureyes'] = 'Kreditu-txartelaren kargu eragiketa ezarri eta ikaslea ikastaroan matrikulatuko da. Seguru al zaude?';
$string['cccity'] = 'Hiria';
$string['ccexpire'] = 'Amaitze-data';
$string['ccexpired'] = 'Kreditu-txartela iraungita';
$string['ccinvalid'] = 'Txartel zenbaki baliogabea';
$string['cclastfour'] = 'Kreditu txartelaren azken laurak';
$string['ccno'] = 'Kreditu-txartelaren zenbakia';
$string['ccstate'] = 'Estatua';
$string['cctype'] = 'Kreditu-txartel mota';
$string['ccvv'] = 'Txartelaren onespena';
$string['ccvvhelp'] = 'Txartelaren atzealdean begiratu (azken hiru zifrak)';
$string['choosemethod'] = 'Ikastaroko matrikulazio-kodea baldin badakizu sar ezazu, mesedez; bestela, ikastaroarengatik ordaindu beharko duzu.';
$string['chooseone'] = 'Ondorengo bi eremuotako bat edo biak bete. Pasahitza ez da erakusten.';
$string['cost'] = 'Kostua';
$string['costdefaultdesc'] = '<strong>Ikastaroaren ezarpenetan -1 sartu</strong> salneurriaren eremuan lehenetsitako salneurri hau ezartzeko.';
$string['currency'] = 'Moneta';
$string['cutofftime'] = 'Eragiketa indargabetzeko denbora-epea.';
$string['dataentered'] = 'Datuak sartuta';
$string['delete'] = 'Deuseztatu';
$string['description'] = 'Authorize.net moduluak ikastaroak CC hornitzaileen bidez ordaintzea ahalbidetzen dizu.  Ikastaro baten kostea zero bada, ikasleei ez zaie sartzeko ordainketarik eskatuko.  Bi modu daude ikastaroaren kostea zehazteko (1) gune osorako lehenetsitako kostea edo (2) ikastaroko ezarpena ikastaro bakoitzaren kostea zehaz dezakeena. Ikastaroaren kostea lehenesten da gunearen kostearekiko.<br /><br /><b>Oharra:</b> Ikastaroan matrikulazio-kodea ezartzen baduzu ikasleek pasahitza erabiliz matrikulatzeko aukera izango dute. Hori bereziki erabilgarria da ikastaro berean ordaintzen duten ikasleak eta ordaintzen ez dutenak batera izanez gero.';
$string['echeckabacode'] = 'Bankuko ABA zenbakia';
$string['echeckaccnum'] = 'Bankuko kontu-zenbakia';
$string['echeckacctype'] = 'Bankuko kontu-mota';
$string['echeckbankname'] = 'Bankuaren izena';
$string['echeckbusinesschecking'] = 'Business Checking';
$string['echeckchecking'] = 'Checking';
$string['echeckfirslasttname'] = 'Bankuko kontuaren jabea';
$string['echecksavings'] = 'Aurrezkiak';
$string['enrolenddate'] = 'Amaiera-data';
$string['enrolenddaterror'] = 'Matrikulatzeko amaiera-data ezin da izan hasiera-data baino lehenagokoa';
$string['enrolname'] = 'Authorize.net ordaintzeko bidea';
$string['enrolperiod'] = 'Matrikulazioaren iraupena';
$string['enrolstartdate'] = 'Hasiera-data';
$string['expired'] = 'Iraungita';
$string['expiremonth'] = 'Iraungitze-hilabetea';
$string['expireyear'] = 'Iraungitze-urtea';
$string['firstnameoncard'] = 'Txartelean dagoen deitura';
$string['haveauthcode'] = 'Badut baimen-kodea';
$string['howmuch'] = 'Zenbat?';
$string['httpsrequired'] = 'Sentitzen dugu, baina zure eragiketa ezin da orain prozesatu. Gune honen konfigurazioa ezin izan da egokiro ezarri.<br /><br />Mesedez, zure txartel-zenbakia ez sartu nabigatzailearen behealdean kandatu horia ikusten ez duzun bitartean. Ikurra agertuz gero, guneak bezero eta zerbitzariaren arteko informazio oro enkriptatzen duela esan nahi du. Horrela eragiketa egiten ari den bitartean bi ordenadoreen arteko informazioa babestuta dago, zure kreditu-txartelaren zenbakia interneten inork lapur ez dezan.';
$string['invalidaba'] = 'ABA zenbaki desegokia';
$string['invalidaccnum'] = 'Kontu-zenbaki desegokia';
$string['invalidacctype'] = 'Kontu mota desegokia';
$string['logindesc'] = 'Aukera honek aktibatuta egon behar du. <br /><br />Mesedez,  Admin >> Aldagaiak >> Segurtasuna menuan <a href="{$a->url}">loginhttps ON</a> ezarri duzula ziurtatu.<br /><br />Aukera hori aktibatzeak Moodle login eta ordainketetarako https konexio segurupean funtzionatzea ekarriko du.';
$string['logininfo'] = 'Segurtasuna dela-eta ez dira erakusten erabiltzaile-izena, pasahitza eta eragiketa-klabea. Ez duzu berriz sartu behar eremu hauek aldez aurretik konfiguratu badituzu. Testu bat berde ikusiko duzu kaxaren ezkerreko aldean eremuren bat dagoeneko konfiguratuta badago. Lehenengo aldiz sartu bazara eremu hauetara beharrezkoa da erabiltzaile-izena (*) eta <strong>nahiz</strong> eragiketa-klabea (#1)<strong>nahiz</strong> pasahitza (#2) idatzi beharko duzu dagoen laukitxoan. Segurtasuna dela-eta eragiketa-klabea idazteko gomendatzen dizugu. Oraingo pasahitza ezabatu nahi baduzu, markatu dagokion laukitxoa.';
$string['methodcc'] = 'Kreditu-txartela';
$string['methodccdesc'] = 'Aukeratu beherago kreditu-txartela eta onartutako motak';
$string['methodecheck'] = 'eCheck (ACH)';
$string['missingaba'] = 'ABA zenbakia falta da';
$string['missingaddress'] = 'Helbidea falta da';
$string['missingbankname'] = 'Bankuaren izena falta da';
$string['missingcc'] = 'Kreditu-txartelaren zenbakia falta da';
$string['missingccauthcode'] = 'Baimen-kodea falta da';
$string['missingccexpiremonth'] = 'Iraungitze-hilabetea falta da';
$string['missingccexpireyear'] = 'Iraungitze-urtea falta da';
$string['missingcctype'] = 'Txartel mota falta';
$string['missingcvv'] = 'Berrespen-zenbakia falta da';
$string['missingzip'] = 'Posta-kodea falta da';
$string['mypaymentsonly'] = 'Nire ordainketak bakarrik erakutsi';
$string['nameoncard'] = 'Txartelean dagoen izena';
$string['new'] = 'Berria';
$string['noreturns'] = 'Erantzunik ez!';
$string['notsettled'] = 'Onespenik ez';
$string['orderdetails'] = 'Eragiketaren zehaztapenak';
$string['orderid'] = 'Eragiketaren IDa';
$string['paymentmanagement'] = 'Ordainketaren kudeaketa';
$string['paymentmethod'] = 'Ordainketa-metodoa';
$string['paymentpending'] = 'Ikastaro honetako zure ordainketa onesteko dago zenbaki honekin: {$a->orderid}.  Ikusi <a href=\'{$a->url}\'>Ordainketaren zehaztasunak</a>.';
$string['pendingecheckemail'] = 'Kudeatzaile agurgarria,

Une honetan {$a->count} echeck daude pendiente eta cvs fitxategi bat igo behar duzu matrikulatutako erabiltzaileak lortzeko.

Sakatu beheko esteka eta irakurri laguntza-fitxategia orri honetan:
{$a->url}';
$string['pendingechecksubject'] = '{$a->course}: falta diren eTxekeak ({$a->count})';
$string['pendingordersemail'] = 'Kudeatzaile agurgarri hori:

{$a->pending} eragiketa pendienteak "{$a->course}" ikastarokoak amaituko dira ordainketa {$a->days} egunetan onartzen ez baduzu.

Mezu hau abisua da, onarpen automatikoa ezarri ez duzulako.
Hori dela eta, ordainketak eskuz onartu edo gaitzetsi behar dituzu.

Ordainketa pendienteak onartu edo gaitzesteko hona jo:
{$a->url}

Onarpen automatikoa ezartzeko, hau da, berriro abisu-mezurik ez jasotzeko, hona jo:

{$a->enrolurl}';
$string['pendingordersemailteacher'] = 'Irakasle agurgarri hori:

{$a->pending} eragiketak {$a->currency} kantitatearengatik {$a->sumcost} "{$a->course}" ikastaroan
amaituko dira ordainketa {$a->days} egunetan onartzen ez baduzu.

Ordainketak eskuz onartu edo gaitzetsi behar dituzu kudeatzaileak onarpen automatikoa ezarri ez duelako.

{$a->url}';
$string['pendingorderssubject'] = 'KONTUZ: {$a->course}, {$a->pending} ordainketa pendienteak {$a->days} egunetan amaituko dira.';
$string['pluginname'] = 'Authorize.Net';
$string['reason11'] = 'Eragiketa bikoiztua bidali da.';
$string['reason13'] = 'Merkatari login IDa baliogabea da edo kontua ez dago indarrean.';
$string['reason16'] = 'Eragiketa ez da aurkitu.';
$string['reason17'] = 'Kreditu-txartela mota hau ez da onartzen.';
$string['reason245'] = 'eCheck mota hau ez da onartzen ordainketa era honetan.';
$string['reason246'] = 'eCheck mota hau ez da onartzen.';
$string['reason27'] = 'Eragiketaren AVSa desegokia izan da. Emandako helbidea ez dator bat txartel jabearen kargu-helbidearekin.';
$string['reason28'] = 'Ez da txartel mota hau onartzen.';
$string['reason30'] = 'Prozesatzailearekiko konfigurazioa baliogabea da. Merkatari Zerbitzuaren Hornitzaileari deitu.';
$string['reason39'] = 'Adierazitako kodea baliogabea, ez onartua, ez baimendua da, edo ez du trukerik onartzen.';
$string['reason43'] = 'Merkataria gaizki ezarri da prozesatzailean. Merkatari Zerbitzuaren Hornitzaileari deitu.';
$string['reason44'] = 'Eragiketa gaitzetsi da. Txartel kodearen iragazpen akatsa!';
$string['reason45'] = 'Eragiketa gaitzetsi da. Txartel kode / AVS iragazpen akatsa!';
$string['reason47'] = 'Adierazitako kopuruak ez luke baimendutakoa baino handiagoa izan beharko.';
$string['reason5'] = 'Kopuru egokia behar da.';
$string['reason50'] = 'Eragiketa hau onarpenaren zain dago eta ezin da itzuli.';
$string['reason51'] = 'Txartel honen kontrako kredituen kopurua eragiketarena baino handiagoa da.';
$string['reason54'] = 'Erreferentziazko eragiketa ez dator bat kreditua lortzeko irizpideekin.';
$string['reason55'] = 'Txartel honen kontrako kredituen kopuruak zorraren kopuru orijinala gainditzen du.';
$string['reason56'] = 'eCheck (ACH) eragiketak baino ez dira onartzen; kreditu-txartelen bidezko eragiketak ez dira onartzen.';
$string['refund'] = 'Itzuli';
$string['refunded'] = 'Itzulia';
$string['returns'] = 'Itzuliak';
$string['reviewfailed'] = 'Ezin izan da berrikusketa egin';
$string['reviewnotify'] = 'Zure ordainketa errebisatuko da. Zure irakasleak e-maila bidaliko dizu egun gutxi barru.';
$string['sendpaymentbutton'] = 'Ordainketa bidali';
$string['settled'] = 'Adostua';
$string['settlementdate'] = 'Adostasun-data';
$string['shopper'] = 'Eroslea';
$string['status'] = 'Baimendu Autorize.Net bidezko matrikulazioak';
$string['subvoidyes'] = 'Itzulitako eragiketa {$a->transid} indargabetu eta kopuru honen kargua: {$a->amount} zure kontutik pasako da. Ziur al zaude?';
$string['tested'] = 'Saiatua';
$string['testmode'] = '[SAIAKERA MODUA]';
$string['testwarning'] = 'Kaptura/Indargabetze/Kredituak test moduan funtzionatzen dutela dirudi, baina ez da datu-basean erregistrorik eguneratu edo sartu.';
$string['transid'] = 'Eragiketaren IDa';
$string['underreview'] = 'Berrikusten';
$string['unenrolselfconfirm'] = 'Ziur al zaude "{$a}" ikastarotik desmatrikulatu nahi duzula?';
$string['unenrolstudent'] = 'Ikaslea desmatrikulatu?';
$string['uploadcsv'] = 'CVS fitxategia igo';
$string['usingccmethod'] = 'Matrikulatu <a href="{$a->url}"><strong>kreditu-txartela</strong></a> erabiliz';
$string['usingecheckmethod'] = 'Matrikulatu <a href="{$a->url}"><strong>eCheck</strong></a> erabiliz';
$string['verifyaccount'] = 'Konprobatu zure authorize.net merkatari-kontua';
$string['verifyaccountresult'] = 'Konprobazioaren emaitza: {$a}';
$string['void'] = 'Indargabetu';
$string['voidyes'] = 'Eragiketa indargabetuko da. Seguru al zaude?';
$string['welcometocoursesemail'] = 'Ikasle agurgarri hori:

Eskerrik asko zure ordainketagatik. Ikastaro hauetan matrikulatu zara:

{$a->courses}

Zure profila edita dezakezu:
 {$a->profileurl}

Zure ordainketaren zehaztasunak ikus ditzakezu:
 {$a->paymenturl}';
$string['youcantdo'] = 'Ezin duzu hau egin: {$a->action}';
$string['zipcode'] = 'Zip kodea';
