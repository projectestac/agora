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
 * Strings for component 'chat', language 'eu', branch 'MOODLE_26_STABLE'
 *
 * @package   chat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Laster duzu txata';
$string['ajax'] = 'Ajax erabiltzen duen bertsioa';
$string['autoscroll'] = 'Korritze automatikoa';
$string['beep'] = 'Abisua';
$string['bubble'] = 'Burbuila';
$string['cantlogin'] = 'Ezin da sartu txat-gelan!!!';
$string['chat:addinstance'] = 'Gehitu beste txat-gela bat';
$string['chat:chat'] = 'Sartu txat-gelara';
$string['chat:deletelog'] = 'Txataren agerraldiak ezabatu';
$string['chat:exportparticipatedsession'] = 'Esportatu zeuk parte hartutako txat-saioak';
$string['chat:exportsession'] = 'Esportatu edozein txat-saio';
$string['chatintro'] = 'Deskribapena';
$string['chatname'] = 'Txat-gela honen izena';
$string['chat:readlog'] = 'Txataren agerraldiak irakurri';
$string['chatreport'] = 'Txat-saioetako txostenak';
$string['chat:talk'] = 'Txatean hitz egin';
$string['chattime'] = 'Hurrengo txat-saioaren ordua';
$string['compact'] = 'Trinkoa';
$string['composemessage'] = 'Idatzi mezua';
$string['configmethod'] = 'Txataren ohiko metodoan erabiltzaileek aldiro konektatzen dute zerbitzariarekin eguneraketak egiteko. Ez du konfiguraziorik behar eta edonon funtzionatzen du baina zerbitzaria gainkarga dezake gelan erabiltzaile asko aldi berean ari badira. \'Daemon\'a erabiltzeak (bigarren mailako egikaritza-prozesu independentea)Unixerako sheell (komando-interpretaria) sarbidea eskatzen du, baina txat-giro arinago eta lorgarriagoa ematen du.';
$string['confignormalupdatemode'] = 'HTTP 1.1ren <em>Keep-Alive</em> ezaugarria erabilita zerbitzatzen dira normalean txat-gelaren eguneraketak baina zerbitzariarentzat nahikoa gogorra da lan hau. Erabiltzaileei eguneraketak bidaltzeko metodo aurreratuagoa da <em>Stream</em> estrategia erabiltzea. <em>Stream</em> erabilita eskalamendu hobea lortzen da (chatd metodoaren antzekoa da) baina agian zure zerbitzariak ez du onartuko aukera hau.';
$string['configoldping'] = 'Jarduerarik gabe zenbat denbora (segundutan) igarota pentsatu behar da erabiltzaileak utzi egin duela?';
$string['configrefreshroom'] = 'Zenbat segunduro eguneratu behar da txataren orria? Balore baxuak elkarrizketa arinagoa ahalbidetuko du baina zerbitzariarentzat karga handia izan daiteke gelan lagun asko dagoenean.';
$string['configrefreshuserlist'] = 'Zenbat segunduro eguneratu behar da txatean dauden erabiltzaileen zerrenda?';
$string['configserverhost'] = 'Zerbitzariaren \'daemnon\'a (egikaritza prozesu independentea) dagoen ordenagailuaren \'Hostame\'a (etxekoaren izena)';
$string['configserverip'] = '\'hostame\'aren (etxekoaren izena) baliokidea den IP zenbakizko helbidea';
$string['configservermax'] = 'Gehinenezko erabiltzaile kopurua';
$string['configserverport'] = 'Zerbitzariaren \'daemon\'ak erabiltzen duen portua';
$string['coursetheme'] = 'Ikastaroaren itxura';
$string['currentchats'] = 'Txat-txostenak martxan jarri';
$string['currentusers'] = 'Oraingo erabiltzaileak';
$string['deletesession'] = 'Ezabatu txosten hau';
$string['deletesessionsure'] = 'Ziur al zaude txosten hau ezabatu nahi duzula?';
$string['donotusechattime'] = 'Ez argitaratu txat-saioetarako orduak';
$string['enterchat'] = 'Sakatu hemen txat-gelara sartzeko';
$string['entermessage'] = 'Idatzi zure mezua';
$string['errornousers'] = 'Ezin topatu erabiltzailerik!';
$string['explaingeneralconfig'] = 'Ezarpen hauek <strong>beti</strong> daude indarrean';
$string['explainmethoddaemon'] = 'Egokitzapen hauek chat_method -en "Daemon txat zerbitzaria" aukeratu baduzu <strong>bakarrik</strong> daude indarrean';
$string['explainmethodnormal'] = 'Egokitzapen hauek chat_method -en "Metodo arrunta" aukeratu baduzu <strong>bakarrik</strong> daude indarrean';
$string['generalconfig'] = 'Ezarpen orokorrak';
$string['idle'] = 'Abian jarri gabe';
$string['inputarea'] = 'Input gunea';
$string['invalidid'] = 'Ezin da aurkitu txat-gela hori!';
$string['list_all_sessions'] = 'Saio guztien zerrenda.';
$string['list_complete_sessions'] = 'Saio osatu berrien zerrenda.';
$string['listing_all_sessions'] = 'Saio guztiak zerrendatzen.';
$string['messagebeepseveryone'] = '{$a}-(e)k dio: Aizue! Hemen nago!';
$string['messagebeepsyou'] = '{$a}-(e)k dio: Aizu! Hemen nago!';
$string['messageenter'] = '{$a} oraintxe sartu da gelan';
$string['messageexit'] = '{$a} irten egin da gelatik';
$string['messages'] = 'Mezuak';
$string['messageyoubeep'] = 'Zure soinua: {$a}';
$string['method'] = 'Txat metodoa';
$string['methodajax'] = 'Ajax metodoa';
$string['methoddaemon'] = 'Txat zerbitzariaren \'daemon\'a';
$string['methodnormal'] = 'Metodo arrunta';
$string['modulename'] = 'Txat-gela';
$string['modulename_help'] = 'Txat moduluak parte hartzaileak testu bidez denbora errealean eztabaida sinkronoak egitea ahalbidetzen du.

Txata behin erabiltzeko aktibitatea izan daiteke edo hainbat alditan errepika daiteke (egunero ordu berean, astero,...). Txat-saioak gordeta gelditzen dira eta partaide guztiek ikusteko edo baimenak dituztenek soilik ikusteko moduan konfigura daiteke.

Txatak bereziki erabilgarriak dira aurrez aurreko talde-bilerak egin ezin direnean, hala nola

* Online ikastaroetan parte hartzen duten ikasleen artean esperientziak trukatzeko, kokapen geografiko ezberdinetan daudenean.
* Aldi batez bertaratu ezin den ikasle bat irakaslearekin hitz egiteko besteen maila harrapatzeko.
* Praktiketan dauden ikasleek euren artean eta irakaslearekin euren esperientziak eztabaidatzeko.
* Gaztetxoenek etxetik txata erabiltzeko, sare sozialen mundura sarbide kontrolatu (monitorizatu) bat egiteko.
* Kokapen geografiko ezberdinean dagoen hizlari gonbidatu batekin galde-erantzun saio bat egiteko.
* Ikasleei azterketak prestatzen laguntzeko saioak egiteko, non irakasleak edo beste ikasle batzuk adibide galderak planteatuko dituzten';
$string['modulenameplural'] = 'Txat-gelak';
$string['neverdeletemessages'] = 'Ez ezabatu mezuak';
$string['nextsession'] = 'Programatutako hurrengo txat-saioa';
$string['nochat'] = 'Ez dago txatik';
$string['no_complete_sessions_found'] = 'Ez da aurkitu osatutako saiorik';
$string['noguests'] = 'Txat-gela honetan ezin bisitariak sartu';
$string['nomessages'] = 'Ez dago mezurik oraindik';
$string['nopermissiontoseethechatlog'] = 'Ez duzu txat-en agerraldiak ikusteko baimenik.';
$string['normalkeepalive'] = 'KeepAlive';
$string['normalstream'] = 'Stream';
$string['noscheduledsession'] = 'Ez dago programatuta txat-saiorik';
$string['notallowenter'] = 'Zuk ez duzu txat-gela honetan sartzeko baimenik.';
$string['notlogged'] = 'Ez duzu saioa hasi!';
$string['oldping'] = 'Itxaroteko epea deskonektatu';
$string['page-mod-chat-x'] = 'Txat moduluaren edozein orri';
$string['pastchats'] = 'Izandako txat-saioak';
$string['pluginadministration'] = 'Txat-kudeaketa';
$string['pluginname'] = 'Txat-gela';
$string['refreshroom'] = 'Gela freskatu';
$string['refreshuserlist'] = 'Erabiltzaileen zerrenda freskatu';
$string['removemessages'] = 'Mezu guztiak ezabatu';
$string['repeatdaily'] = 'Egunero ordu berean';
$string['repeatnone'] = 'Ez errepikatu - zehaztutako ordua bakarrik argitaratu';
$string['repeattimes'] = 'Errepikatu/argitaratu saioen denbora';
$string['repeatweekly'] = 'Astero ordu berean';
$string['saidto'] = 'zera dio';
$string['savemessages'] = 'Izan diren txat-saioak gorde';
$string['seesession'] = 'Ikusi saio honetako txostena';
$string['send'] = 'Bidali';
$string['sending'] = 'Bidaltzen';
$string['serverhost'] = 'Zerbitzariaren izena';
$string['serverip'] = 'Zerbitzariaren IPa';
$string['servermax'] = 'Gehienezko erabiltzaileak';
$string['serverport'] = 'Zerbitzariaren portua';
$string['sessions'] = 'Txat-saioetako txostenak';
$string['sessionstart'] = 'Txat-saioa gutxi barru hasiko da: {$a}';
$string['strftimemessage'] = '%H:%M';
$string['studentseereports'] = 'Denek ikus ditzakete izandako saioetako txostenak';
$string['studentseereports_help'] = 'EZ aukeratuz gero, mod/chat:readlog gaitasunean baimena duten erabiltzaileek baino ezingo dituzte txat-agerraldiak ikusi';
$string['talk'] = 'Hitz egin';
$string['updatemethod'] = 'Metodoa eguneratu';
$string['updaterate'] = 'Eguneratu kalifikazioa:';
$string['userlist'] = 'Erabiltzaile-zerrenda';
$string['usingchat'] = 'Txata erabili';
$string['usingchat_help'] = 'Txatean ondorengo baliabideak erabil ditzakegu modu atseginean hitz egiteko.</p>

*Aurpegierak</b></dt>
<dd>Aurpegiera guztiak automatikoki bihurtuko dira grafiko deskriptiboago.  Adibidez: :-) = <img src="pix/s/smiley.gif"> </dd>

*Estekak</b></dt>
Internet helbideak automatikoki bihurtuko dira esteka.</dd>

*Emozioak</b></dt>
Lerro bat "/me" edo ":" -rekin has dezakezu emozio bat erakusteko. Adibidez, Ana baduzu izena eta ": irribartsu dago"  idazten baduzu, denek ikusiko dute "Ana irribartsu dago"</dd>

*Beeps-ak</b></dt>
Beste pertsona bati txistua bidali ahal diozu izenaren ondoko "beep" estekan sakatuta. Txateko beste pertsona bati abisua emateko erabil dezakegu eta gu han gaudela ohartarazteko. Txat-saioko  partaide guztiei ere egin ahal diezu beep-a "beep all" idatzita.</dd>

*HTML</b></dt>
Zure testuan HTML lengoaia erabil dezakezu irudiak txertatzeko, soinuak eragiteko edo testuari formatua emateko, beste aukeren artean.</dd>

';
$string['viewreport'] = 'Izan diren txat-saioak ikusi';
