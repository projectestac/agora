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
 * Strings for component 'auth', language 'eu', branch 'MOODLE_26_STABLE'
 *
 * @package   auth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actauthhdr'] = 'Eskura dauden autentifikazio-pluginak';
$string['alternatelogin'] = 'Hemen URL bat sartuz gero, gune honetarako sarbide gisa erabiliko da. Orriak formularioa eduki beharko luke, ekintza <strong>\'{$a}\'</strong> ezaugarrian ezarrita duena eta eremu hauek itzultzen dituena: <strong>erabiltzaile-izena</strong> eta <strong>pasahitza</strong>.<br />URL desegokia ez sartzen saia zaitez, hori egiteak gunetik kanpo utziko baitzaitu.<br />Lehenetsitako sarbidea erabiltzeko zuriz utzi, mesedez.';
$string['alternateloginurl'] = 'Aukerazko sarbiderako URLa';
$string['auth_changepasswordhelp'] = 'Pasahitza aldatzeko laguntza';
$string['auth_changepasswordhelp_expl'] = '{$a} pasahitza galdu duten erabiltzaileei laguntza erakusten die. Aukera hau erantsi daiteke edo <strong>Pasahitza aldaketaren URLa</strong>ren ordez erakutsi edo Moodle-ren barne pasahitza-aldaketa moduan azaldu.';
$string['auth_changepasswordurl'] = 'Pasahitza aldatzeko URLa';
$string['auth_changepasswordurl_expl'] = 'Beren {$a} pasahitza galdu duten erabiltzaileak zein URL helbidera bidaliko dituzun zehaztu.  <strong>Pasahitz aldaketa orri estandar erabili</strong> orrian <strong>Ez</strong> aukeratu.';
$string['auth_changingemailaddress'] = 'E-posta helbidea {$a->oldemail}-tik {$a->newemail}-ra aldatzeko eskaera egin duzu. Segurtasunagatik, e-posta mezua ari gara bidaltzen helbide berrira benetan zurea dela ziurtatzeko. Mezu honetan bidali dizugun URL-a ireki bezain pronto eguneratuko da e-posta helbidea.';
$string['auth_common_settings'] = 'Ezarpen komunak';
$string['auth_data_mapping'] = 'Datuen mapa';
$string['authenticationoptions'] = 'Autentifikazio-aukerak';
$string['auth_fieldlock'] = 'Balorea bloketau';
$string['auth_fieldlock_expl'] = '<p><b>Balorea blokeatu:</b> Ezarriz gero, Moodle-ko erabiltzaile eta kudeatzaileek ezingo dute eremua zuzenean editatu. Aukeratu hau hautatu datu horiek kanpoko autentifikazio-sisteman badituzu. </p>';
$string['auth_fieldlocks'] = 'Erabiltzaile-eremuak blokeatu';
$string['auth_fieldlocks_help'] = '<p>Erabiltzaileen datu-eremuak blokea ditzakezu, kudeatzaileek datuok eskuz mantentzen dituzten guneetan bereziki erabilgarria gertatzen dena, erabiltzaileen erregistroak editatuz edo \'Erabiltzaileak igo\' aplikazioaren bidez. Moodle-k behar dituen eremuak blokeatzen badituzu, erabiltzaile-kontuak sortzean datu horiek ematen dituzula ziurtatu &emdash; bestela, kontuak ezingo dira erabili.</p><p>Pentsa ezazu ea \'Hutsik egotekotan desblokeatu\' aukera aktibatu behar duzun arazo hori ebitatzeko.</p>';
$string['authinstructions'] = 'Hemen zure erabiltzaileentzat argibideak eman ditzakezu, erabili behar duten erabiltzaile-izena eta pasahitza zein diren jakin dezaten. Hemen sartutako testua saio-hasiera pantailan agertuko da. Zurian uzten baduzu, ez da argibiderik emango.';
$string['auth_invalidnewemailkey'] = 'Errorea: e-posta helbidea aldatzea baieztatu nahian ari bazara, nahastu egingo zinen zure e-postara bidali dugun URL-a kopiatzean. Mesedez, kopiatu helbidea eta saiatu berriz.';
$string['auth_multiplehosts'] = 'Ostalari anitzak zehaz daitezke (ad. ostalari1.com;ostalari2.com;ostalari3.com) edo (edo a. xxx.xxx.xxx.xxx;xxx.xxx.xxx.xxx)';
$string['auth_outofnewemailupdateattempts'] = 'Zure e-posta helbidea eguneratzeko baimenduta dauden saiakerak agortuko dituzu. Bertan behera utzi da zure eguneratzeko eskaria.';
$string['auth_passwordisexpired'] = 'Zure pasahitza iraungita dago. Pasahitza orain aldatu nahi al duzu?';
$string['auth_passwordwillexpire'] = 'Zure pasahitza {$a} egun barru iraungiko da. Pasahitza orain aldatu nahi al duzu?';
$string['auth_remove_delete'] = 'Osorik ezabatu';
$string['auth_remove_keep'] = 'Barruan gorde';
$string['auth_remove_suspend'] = 'Barruan eten';
$string['auth_remove_user_key'] = 'Kanpoko erabiltzailea ezabatuta';
$string['auth_sync_script'] = 'Cron-a sinkronizatzeko script-a';
$string['auth_updatelocal'] = 'Datu lokalak eguneratu';
$string['auth_updatelocal_expl'] = '<p><b>Datu lokalak eguneratu:</b> Aktibatuta badago, eremua eguneratu behar da (kanpoko autentikazioz) erabiltzailea sartu edo erabiltzaileen sinkronizazioa gertatzen den bakoitzean. Modu lokalean eguneratu beharreko eremuak blokeatu beharko lirateke.</p>';
$string['auth_updateremote'] = 'Kanpoko datuak eguneratu';
$string['auth_updateremote_expl'] = '<p><b>Kanpoko datuak eguneratu:</b> Aktibatuta badago, kanpoko eguneratu egingo da erabiltzailearen erregistroa eguneratzen denean. eremuak editatu ahal izateko besblokeatuta egon behar dira.</p>';
$string['auth_updateremote_ldap'] = '<p><b>Oharra:</b> LDAP kanpoko datuen eguneratzeak \'binddn\' eta \'bindpw\' baloreak ezartzeko eskatzen du erabiltzaile-erregistro guztien edizio-baimena duen erabiltzaile batentzat. Oraingoz, honek ez ditu balio anitzeko atributuak babesten, eta soberako baloreak ezabatuko ditu eguneratzean zehar. </p>';
$string['auth_user_create'] = 'Erabiltzaileen sorrera ahalbidetu';
$string['auth_user_creation'] = 'Erabiltzaile anonimo berriek erabiltzaile-kontuak autentifikazioko kanpo kodearen gainean sor ditzakete eta e-mailez baieztatu. Hau indarrean jartzen baduzu, erabiltzaileen sorrerarako moduluaren aukerak ere ezarri behar dituzula gogoratu.';
$string['auth_usernameexists'] = 'Aukeratutako erabiltzailearen izena honez gero badago. Beste bat aukeratu, mesedez.';
$string['auto_add_remote_users'] = 'Gehitu automatikoki urrutiko erabiltzaileak';
$string['changepassword'] = 'Pasahitza aldatzeko URLa';
$string['changepasswordhelp'] = 'Hemen zure erabiltzaileek erabiltzaile-izena edo pasahitza aldatzeko, edo ahaztekotan berreskuratzeko, erabil dezaketen helbide bat zehaztu ahal duzu.  Hau erabiltzaileei saio-hasierako pantailan eta erabiltzaile-orrian botoi gisa aurkeztuko zaie. Zurian uzten baduzu ez zaie botoirik aurkeztuko.';
$string['chooseauthmethod'] = 'Autentifikazio-metodoa aukeratu';
$string['chooseauthmethod_help'] = '<p align="center"><b>Autentifikazio-metodoa aldatu</b></p>

<p>Menu honetan erabiltzaile jakin baten autentifikazio-metodoa alda dezakezu.</p>

<p>Mesedez, kontuz ibili, ezarpen hori gunean definitutako autentifikazio-metodoen eta erabiltzen ari diren ezarpenen mendekoa baita.</p>

<p>Aldaketa okerren bat egiten baduzu, erabiltzailea ezingo da zerbitzarira sartu; kontua erabat ezabatzea ere gerta daiteke. Beraz, aukera hau zer egiten ari zaren ondo badakizu bakarrik erabili.</p>';
$string['createpassword'] = 'Sortu pasahitza eta jakinarazi erabiltzaileari';
$string['createpasswordifneeded'] = 'Pasahitza sortu, beharrezkoa bada.';
$string['emailchangecancel'] = 'Utzi e-postaren aldaketa';
$string['emailchangepending'] = 'Egin gabeko aldaketa. Ireki bidalitako esteka hemen {$a->preference_newemail}.';
$string['emailnowexists'] = 'Zure profilari ezarri nahi diozun e-posta helbidea beste erabiltzaile bat ezarri zaio zuk eskari egin zenuenetik. E-posta helbidea aldatzeko eskaera bertan behera geratu da, beraz; baina, nahi izanez gero beste e-posta helbide batekin egin dezakezu eskaera berria.';
$string['emailupdate'] = 'Eguneratu e-posta helbidea';
$string['emailupdatemessage'] = '{$a->fullname} agurgarria,

Zure erabiltzaile kontuko e-posta helbidea aldatzeko eskaria egin duzu {$a->site}-n. Mesedez, ireki ondorengo URL-a zure nabigatzailean aldaketa baieztatzeko.

{$a->url}';
$string['emailupdatesuccess'] = '<em>{$a->fullname}</em> erabiltzailearean e-posta helbidea ondo eguneratu da honetara: <em>{$a->email}</em>';
$string['emailupdatetitle'] = 'e-postaren eguneratzeko baieztapena hemen: {$a->site}';
$string['enterthenumbersyouhear'] = 'Idatzi entzuten dituzun zenbakiak';
$string['enterthewordsabove'] = 'Idatzi goiko hitzak';
$string['errormaxconsecutiveidentchars'] = 'Pasahitzak gehienez {$a} karaktere berdin izan behar ditu elkarren segidan.';
$string['errorminpassworddigits'] = 'Pasahitzak gutxienez {$a} zenbaki izan behar ditu.';
$string['errorminpasswordlength'] = 'Pasahitzak gutxienez {$a} karaktere izan behar ditu.';
$string['errorminpasswordlower'] = 'Pasahitzak gutxienez {$a} letra xehe izan behar ditu.';
$string['errorminpasswordnonalphanum'] = 'Pasahitzak gutxienez {$a} karaktere ez alfa-numeriko izan behar ditu.';
$string['errorminpasswordupper'] = 'Pasahitzak gutxienez {$a} letra larri izan behar ditu.';
$string['errorpasswordupdate'] = 'Errorea pasahitza eguneratzean, pasahitza ez da aldatu';
$string['event_user_loggedin'] = 'Erabiltzailea hemen sartu da:';
$string['eventuserloggedinas'] = 'Erabiltzailea beste erabiltzaile bat bezala sartu da';
$string['forcechangepassword'] = 'Pasahitz aldaketa behartu';
$string['forcechangepasswordfirst_help'] = 'Erabiltzaileak Moodle-n sartzen diren lehenengoan pasahitza aldatzera behartu.';
$string['forcechangepassword_help'] = 'Erabiltzaileak Moodle-n sartzen diren hurrengoan pasahitza aldatzera behartu.';
$string['forgottenpassword'] = 'Hemen URL bat idatziz gero, gune honetan galdu diren pasahitzak berreskuratzeko orri gisa erabiliko da. Aukera hau pentsatuta dago pasahitzak Moodle-tik kanpo kudeatzen diren guneetarako. Utz ezazu zuriz pasahitza berreskuratzeko lehenetsitako orria erabiltzeko.';
$string['forgottenpasswordurl'] = 'Ahaztutako pasahitzetarako URLa';
$string['getanaudiocaptcha'] = 'CAPTCHA audio bat lortu';
$string['getanimagecaptcha'] = 'CAPTCHA irudi bat lortu';
$string['getanothercaptcha'] = 'Beste CAPTCHA bat lortu';
$string['guestloginbutton'] = 'Bisitariek saioa hasteko botoia';
$string['incorrectpleasetryagain'] = 'Ez da zuzena. Mesedez, saiatu berriz.';
$string['infilefield'] = 'Fitxategiko eremu beharrezkoa';
$string['informminpassworddigits'] = 'gutxienez {$a} digitu';
$string['informminpasswordlength'] = 'gutxienez {$a} karaktere';
$string['informminpasswordlower'] = 'gutxienez {$a} letra xehe';
$string['informminpasswordnonalphanum'] = 'gutxienez {$a} karaktere ez alfa-numeriko';
$string['informminpasswordupper'] = 'gutxienez {$a} letra larri';
$string['informpasswordpolicy'] = 'Pasahitzak {$a} izan behar du';
$string['instructions'] = 'Argibideak';
$string['internal'] = 'Barrukoa';
$string['locked'] = 'Blokeatuta';
$string['md5'] = 'MD5 enkriptazioa';
$string['nopasswordchange'] = 'Ezin da pasahitza aldatu';
$string['nopasswordchangeforced'] = 'Ezin duzu aurrera egin pasahitza aldatu gabe, baina ez dago aldatzeko inongo orririk. Mesedez, jarri harremanetan zure Moodle Kudeatzailearekin.';
$string['noprofileedit'] = 'Ezin da profila editatu';
$string['ntlmsso_attempting'] = 'Single Sign On saiatzen NTLM bidez...';
$string['ntlmsso_failed'] = 'Kale egin du saio-hasiera automatikoak, jo normal sartzeko orrira...';
$string['ntlmsso_isdisabled'] = 'NTLM SSO desgaituta dago.';
$string['passwordhandling'] = 'Pasahitz eremuaren kudeaketa';
$string['plaintext'] = 'Testu arrunta';
$string['pluginnotenabled'] = '\'{$a}\' autentifikazio-plugina ez dago gaituta';
$string['pluginnotinstalled'] = '\'{$a}\' autentifikazio-plugina ez dago instalatuta';
$string['potentialidps'] = 'Hasi saioa beste kontu bat erabiliz:';
$string['recaptcha'] = 'reCAPTCHA';
$string['recaptcha_help'] = 'CAPTCHA programa automaten gehiegikeria ekideteko da. Besterik gabe, idatzi hitzak kutxatxeoan, ordenean eta tarte bat utzita.

Ez bazaude ziur zein hitz diren, beste CAPTCHA bat eska dezkaezu edo audio CAPTCHA bat.';
$string['selfregistration'] = 'Auto-erregistroa';
$string['selfregistration_help'] = 'Autentifikazio-plugin bat, e-posta bidezko auto-erregistroa adibidez, aukeratzen bada aukera ematen die ustezko erabiltzaileei beren buruak erregistratu eta kontuak sortzeko. Horrela, spam sortzaileek kontuak sor ditzakete eta foroetako mezuak, blog sarrerak, e.a. spamerako erabili. Arrisku horri aurre egiteko, auto-erregistroa desgaitu edo mugatu egin behar da <em> Gaitutako e-posta domeinuak </em> ezarpena erabilita.';
$string['sha1'] = 'SHA-1 hash';
$string['showguestlogin'] = 'Bisitariek saioa hasteko botoia erakuts edo ezkuta dezakezu saioa hasteko pantailan.';
$string['stdchangepassword'] = 'Pasahitza aldatzeko orri estandarra erabili.';
$string['stdchangepassword_expl'] = 'Kanpoko autentifikazio-sistemak Moodle-n pasahitz aldaketa ahalbidetzen badu,  aukera ezazu BAI. Ezarpen honek \'Pasahitza aldatzeko URLa\' gainditzen du.';
$string['stdchangepassword_explldap'] = 'OHARRA: LDAP SSL enkripzio-tunel baten gainean erabiltzea aholkatzen da (ldaps://) LDAP zerbitzaria urrutikoa bada.';
$string['suspended'] = 'Etendako kontua';
$string['unlocked'] = 'Desblokeatuta';
$string['unlockedifempty'] = 'Desblokeatua hutsik badago';
$string['update_never'] = 'Inoiz ez';
$string['update_oncreate'] = 'Sortzean';
$string['update_onlogin'] = 'Sarrera bakoitzean';
$string['update_onupdate'] = 'Eguneratzean';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate()-k ez du onartzen aukeratutako erabiltzaile-mota: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable()-k ez du onartzen aukeratutako erabiltzaile-mota (..oraingoz)';
