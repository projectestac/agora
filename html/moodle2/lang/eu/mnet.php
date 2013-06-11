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
 * Strings for component 'mnet', language 'eu', branch 'MOODLE_24_STABLE'
 *
 * @package   mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutyourhost'] = 'Zure zerbitzariari buruz';
$string['accesslevel'] = 'Sarbide-maila';
$string['addhost'] = 'Gehitu ostalaria';
$string['addnewhost'] = 'Gehitu ostalari berria';
$string['addtoacl'] = 'Gehitzeko sarbide-kontrola';
$string['allhosts'] = 'Ostalari guztiak';
$string['allhosts_no_options'] = 'Ez dago beste aukerarik eskura ostalari bat baino gehiago dagoenean';
$string['allow'] = 'Baimendu';
$string['applicationtype'] = 'Aplikazio-mota';
$string['authfail_nosessionexists'] = 'Autorizazioak kale egin du: mnet saioa ez da existitzen.';
$string['authfail_sessiontimedout'] = 'Autorizazioak kale egin du: mnet saioak denbora-muga gainditu du.';
$string['authfail_usermismatch'] = 'Autorizazioak kale egin du: erabiltzailea ez dator bat bietan.';
$string['authmnetdisabled'] = 'Moodle Sareko Autentifikazio-plugina <strong>desgaituta</strong>.';
$string['badcert'] = 'Ziurtagiri honek ez du balio.';
$string['certdetails'] = 'Ziurtagiriaren xehetasunak';
$string['configmnet'] = 'Moodle sareari esker zerbitzari hau beste zerbitzari edo zerbitzuekin komunika daiteke.';
$string['couldnotgetcert'] = 'Ez da ziurtagiria aurkitu hemen: <br />{$a}. <br /> Ostalaria erori egin da edo ezarpenak gaizki.';
$string['couldnotmatchcert'] = 'Hau ez dator bat web zerbitzariak une honetan argitaratutako ziurtagiriarekin.';
$string['courses'] = 'ikastaroak';
$string['courseson'] = 'Ikastaro aktiboak';
$string['currentkey'] = 'Oraingo giltza publikoa';
$string['current_transport'] = 'Oraingo garraioa';
$string['databaseerror'] = 'Ezin izan dira xehetasunak idatzi datu-basean';
$string['deleteaserver'] = 'Zerbitzaria ezabatzen';
$string['deletedhosts'] = 'Ezabatutako ostalariak: {$a}';
$string['deletehost'] = 'Ezabatu ostalaria';
$string['deletekeycheck'] = 'Ziur al zaude gako hau ezabatu nahi duzula?';
$string['deleteoutoftime'] = 'Giltza hau ezabatzeko 60 segunduko leihoa iraungi da. Mesedez, hasi berriz.';
$string['deleteuserrecord'] = 'SSO ACL: \'{$a}[0]\' erabiltzailearen erregistroa ezabatu {$a}[1]-tik.';
$string['deletewrongkeyvalue'] = 'Errorea gertatu da. Zure zerbitzariko SSL giltza ezabatzeko asmorik ez bazenuen, litekeena da eraso maltzurren bat egin nahi izatea. Ez da ekintzarik burutu.';
$string['deny'] = 'Ukatu';
$string['description'] = 'Deskribapena';
$string['enabled_for_all'] = '(Zerbitzu hau ostalari guztietarako gaitu da).';
$string['enterausername'] = 'Mesedez,  idatzi erabiltzaile-izena, edo erabiltzaile-izenen zerrenda bat komaz bereizita.';
$string['error709'] = 'Urrutiko guneak ezin izan du SSL giltza lortu zuretzat.';
$string['expired'] = 'Gako hau ondoko datan iraungi zen:';
$string['expires'] = 'Noiz arte indarrean';
$string['expireyourkey'] = 'Ezabatu giltza hau';
$string['exportfields'] = 'Esportatzeko eremuak';
$string['findlogin'] = 'Aurkitu sarbidea';
$string['forbidden-function'] = 'Funtzio hori ez da RPCrako gaitu.';
$string['forbidden-transport'] = 'Erabiltzen saiatzen ari zaren garraio-modua ez dago baimenduta.';
$string['forcesavechanges'] = 'Behartu aldaketak gordetzera';
$string['helpnetworksettings'] = 'Moodle Sarearen komunikazioa konfiguratu';
$string['hidelocal'] = 'Ezkutatu erabiltzaile lokalak';
$string['hideremote'] = 'Ezkutatu urrutiko erabiltzaileak';
$string['host'] = 'ostalaria';
$string['hostcoursenotfound'] = 'Ez dira ostalaria edo ikastaroa aurkitu';
$string['hostdeleted'] = 'Ostalaria ezabatuta';
$string['hostlist'] = 'Sarean dauden ostalarien zerrenda';
$string['hostname'] = 'Ostalariaren izena';
$string['hostnamehelp'] = 'Urrutiko ostalariaren domeinuaren izen osoa, adibidez, www.adibidea.com';
$string['hostnotconfiguredforsso'] = 'Zerbitzari hau ez dago konfiguratuta saioa urrutitik hasteko.';
$string['hostsettings'] = 'Ostalariaren ezarpenak';
$string['http_self_signed_help'] = 'Konexioak baimendu DIY SSL ziurtagiri sinatua erabiliz urrutiko ostalarian.';
$string['https_verified_help'] = 'Konexioak baimendu SSL ziurtagiri egiaztatua erabiliz urrutiko ostalarian.';
$string['http_verified_help'] = 'Konexioak baimendu PHPn SSL ziurtagiri egiaztatua erabiliz urrutiko ostalarian, http-ren gainean izan ezik (ez https).';
$string['id'] = 'ID';
$string['idhelp'] = 'Balore hau automatikoki esleitzen da eta ezin da aldatu';
$string['importfields'] = 'Inportatzeko eremuak';
$string['inspect'] = 'Ikuskatu';
$string['invalidaccessparam'] = 'Sarbide-parametroak ez du balio.';
$string['invalidactionparam'] = 'Ekintza-parametroak ez du balio.';
$string['invalidhost'] = 'Zure ostalari-identifikatzaileak baliagarria izan behar du';
$string['invalidpubkey'] = 'Giltza ez da SSL giltza baliagarria. ({$a})';
$string['invalidurl'] = 'URL parametroak ez du balio.';
$string['ipaddress'] = 'IP helbidea';
$string['ispublished'] = '{$a}-k zerbitzu hau gaitu du zuretzat.';
$string['issubscribed'] = '{$a} zerbitzu honetara harpidetzen ari da zure ostalarian.';
$string['keydeleted'] = 'Zure giltza ondo ezabatu eta ordezkatu da.';
$string['last_connect_time'] = 'Azken konexioa';
$string['last_connect_time_help'] = 'Ostalari honetara konektatu zaren azken aldia.';
$string['last_transport_help'] = 'Ostalari honetara azkenengo aldian konektatzeko erabilitako garraioa.';
$string['leavedefault'] = 'Erabili horren ordez berezko ezarpenak';
$string['listservices'] = 'Zerbitzuen zerrenda';
$string['loginlinkmnetuser'] = '<br />Moodle Sarearen urrutiko erabiltzailea bazara eta <a href="{$a}">posta-helbidea hemen egiaztatu ahal baduzu</a>, saioaren hasierako orrira joateko moduan izango zara.<br/>';
$string['logs'] = 'agerraldiak';
$string['managemnetpeers'] = 'Berdinak kudeatu';
$string['method'] = 'Metodoa';
$string['methodhelp'] = '{$a}-rako metodoaren laguntza';
$string['methodsavailableonhost'] = 'Eskura dauden metodoak hemen: {$a}';
$string['methodsavailableonhostinservice'] = '{$a->service} -rako eskura dauden metodoak {$a->host} ostalarian';
$string['mnet'] = 'Moodle Sarea';
$string['mnetdisabled'] = 'Moodle Sarea <strong>desgaituta</strong> dago.';
$string['mnetidprovider'] = 'Moodle  Sarearen ID hornitzailea';
$string['mnetidprovidernotfound'] = 'Barkatu, ezin izan da informazio gehiago aurkitu.';
$string['mnetlog'] = 'Agerraldiak';
$string['mnetpeers'] = 'Berdinak';
$string['mnetservices'] = 'Zerbitzuak';
$string['mnetsettings'] = 'Moodle Sarearen ezarpenak';
$string['name'] = 'Izena';
$string['net'] = 'Sarea';
$string['networksettings'] = 'Sarearen ezarpenak';
$string['never'] = 'Inoiz ez';
$string['noaclentries'] = 'Ez dago sarrerarik SSO sarbidearen kontrol-zerrendan';
$string['noaddressforhost'] = 'Barkatu, baina ({$a}) ostalariaren izena ezin izan da ebatzi.';
$string['nocurl'] = 'PHP cURL liburutegia ez dago instalatuta';
$string['nolocaluser'] = 'Ez da erregistro lokalik existitzen urrutiko erabiltzailearentzat.';
$string['nomodifyacl'] = 'Ez duzu MNET sarbiderako kontrol-zerrenda aldatzeko baimenik.';
$string['nosite'] = 'Ezin izan da ikastarorik aurkitu gunearen mailan';
$string['nosuchfile'] = '{$a} fitxategia/funtzioa ez da existitzen.';
$string['nosuchservice'] = 'RPC zerbitzua ez dabil ostalari honetan.';
$string['nosuchtransport'] = 'Ez dago ID hori duen garraiorik.';
$string['notmoodleapplication'] = 'KONTUZ: hau ez da Moodle aplikazioa, eta horregatik metodo batzuk ez ibiltzea gerta daiteke.';
$string['notPEM'] = 'Giltza hau ez dago PEM formatuan. Ez du funtzionatuko.';
$string['notpermittedtojump'] = 'Ez duzu urrutiko saioa hasteko baimenik Moodle zerbitzari honetatik.';
$string['notpermittedtoland'] = 'Ez duzu urrutiko saioa hasteko baimenik.';
$string['off'] = 'Off';
$string['on'] = 'On';
$string['options'] = 'Aukerak';
$string['permittedtransports'] = 'Baimendutako garraioak';
$string['position'] = 'Kokalekua';
$string['profileexportfields'] = 'Bidaltzeko eremuak';
$string['profilefields'] = 'Profil-eremuak';
$string['profileimportfields'] = 'Inportatzeko eremuak';
$string['promiscuous'] = 'Promiskuoa';
$string['publickey'] = 'Giltza publikoa';
$string['publickey_help'] = 'Giltza publikoa automatikoki lortzen da urrutiko zerbitzaritik.';
$string['publish'] = 'Argitaratu';
$string['reallydeleteserver'] = 'Ziur al zaude zerbitzari hau ezabatu nahi duzula?';
$string['receivedwarnings'] = 'Ondoko abisuak jaso dira';
$string['recordnoexists'] = 'Erregistroa ez da existitzen.';
$string['registerallhosts'] = 'Erregistratu ostalari guztiak (modu nahasian)';
$string['registerhostsoff'] = 'Ostalari guztien erregistroa une honetan <b>itzalita</b> dago';
$string['registerhostson'] = 'Ostalari guztien erregistroa une honetan <b>piztuta</b> dago';
$string['remotecourses'] = 'Urrutiko ikastaroak';
$string['remotehost'] = 'Urrutiko ostalaria';
$string['remotehosts'] = 'Urrutiko ostalariak';
$string['requiresopenssl'] = 'Sareak OpenSSL luzapena behar du';
$string['restore'] = 'Berreskuratu';
$string['reviewhostdetails'] = 'Berrikusi ostalariaren xehetasunak';
$string['reviewhostservices'] = 'Berrikusi ostalariaren zerbitzuak';
$string['RPC_HTTP_PLAINTEXT'] = 'HTTP enkriptatu gabea';
$string['RPC_HTTP_SELF_SIGNED'] = 'HTTP (auto-sinatua)';
$string['RPC_HTTPS_SELF_SIGNED'] = 'HTTPS (auto-sinatua)';
$string['RPC_HTTPS_VERIFIED'] = 'HTTPS (sinatua)';
$string['RPC_HTTP_VERIFIED'] = 'HTTP (sinatua)';
$string['selectaccesslevel'] = 'Mesedez, aukeratu sarbide-maila bat zerrnda honetatik';
$string['selectahost'] = 'Mesedez, aukera ezau urrutiko ostalari bat.';
$string['service'] = 'Zerbitzuaren izena';
$string['serviceid'] = 'Zerbitzuaren IDa';
$string['servicesavailableonhost'] = 'Eskura dauden zerbitzuak hemen: {$a}';
$string['settings'] = 'Ezarpenak';
$string['showlocal'] = 'Erakutsi erabiltzaile lokalak';
$string['showremote'] = 'Erakutsi urrutiko erabiltzaileak';
$string['ssl_acl_allow'] = 'SSO ACL: {$a}[0] erabiltzailea baimendu {$a}[1]-tik';
$string['ssl_acl_deny'] = 'SSO ACL: {$a}[0] erabiltzailea ukatu {$a}[1]-tik';
$string['ssoaccesscontrol'] = 'SSO sarbide-kontrola';
$string['strict'] = 'Zorrotza';
$string['subscribe'] = 'Harpidetu';
$string['system'] = 'Sistema';
$string['testclient'] = 'Moodle Sarerako proba-bezeroa';
$string['testtrustedhosts'] = 'Testatu helbide bat';
$string['testtrustedhostsexplain'] = 'Idatz ezazu IP helbide bat konfidantzazko ostalaria den ziurtatzeko';
$string['theypublish'] = 'Haiek argitaratu';
$string['theysubscribe'] = 'Haiek harpidetu';
$string['trustedhosts'] = 'XML-RPC ostalariak';
$string['turnitoff'] = 'Itzali';
$string['turniton'] = 'Piztu';
$string['type'] = 'Mota';
$string['unknown'] = 'Ezezaguna';
$string['unknownerror'] = 'Errore ezezaguna gertatu da negoziazioan zehar.';
$string['usercannotchangepassword'] = 'Ezin duzu pasahitza hemen aldatu urrutiko erabiltzailea baitzara.';
$string['verifysignature-error'] = 'Kale egin du sinadura egiaztatzean. Errorea gertatu da.';
$string['verifysignature-invalid'] = 'Kale egin du sinadura egiaztatzean. Badirudi ez duzula zeuk sinatu.';
$string['version'] = 'Bertsioa';
$string['warning'] = 'Kontuz!';
$string['wrong-ip'] = 'Zure IP helbidea ez dator bat erregistratuta dugunarekin.';
$string['yourhost'] = 'Zure ostalaria';
$string['yourpeers'] = 'Zure berdinak';
