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
 * Strings for component 'badges', language 'eu', branch 'MOODLE_26_STABLE'
 *
 * @package   badges
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Ekintzak';
$string['activate'] = 'Gaitu sarbidea';
$string['activatesuccess'] = 'Dominetarako sarbidea ondo gaitu da.';
$string['addbadgecriteria'] = 'Gehitu dominarako irizpidea';
$string['addcourse'] = 'Gehitu ikastaroak';
$string['addcourse_help'] = 'Aukeratu dominarako baldintza honetara gehitu beharreko ikastaro guztiak. Sakatu CTRL teklari elementu bat baino gehiago aukeratzeko.';
$string['addcriteria'] = 'Gehitu irizpidea';
$string['addcriteriatext'] = 'Irizpideak gehitzen hasteko, mesedez egin aukera zabaltzen den menutik';
$string['addtobackpack'] = 'Gehitu motxilara';
$string['adminonly'] = 'Orri hau gunearen kudeatzaileentzat da bakarrik';
$string['after'] = 'emate-dataren ondoren.';
$string['aggregationmethod'] = 'Agregazio-metodoa';
$string['all'] = 'Guztiak';
$string['allmethod'] = 'Aukeratutako baldintza guztiak osatuta daude';
$string['allmethodactivity'] = 'Aukeratutako jarduera guztiak osatuta daude';
$string['allmethodcourseset'] = 'Aukeratutako ikastaro guztiak osatuta daude';
$string['allmethodmanual'] = 'Aukeratutako rol guztiek ematen dute domina.';
$string['allmethodprofile'] = 'Aukeratutako profileko eremu guztiak osatu dira';
$string['allowcoursebadges'] = 'Gaitu ikastaroko dominak';
$string['allowcoursebadges_desc'] = 'Baimena eman dominak sortu eta emateko ikastaro-testuinguruan.';
$string['allowexternalbackpack'] = 'Gaitu kanpoko motxiletarako konexioa';
$string['allowexternalbackpack_desc'] = 'Utzi erabiltzaileei konexioak konfiguratzen eta euren konponko hornitzaileen motxiletako dominak erakusten.

Oharra: gomendagarria da aukera hau desaktibatuta izatea gunera internetetik sartzerik ez badago (adibidez, firewall-a dela-eta)';
$string['any'] = 'Edozein';
$string['anymethod'] = 'Edozein baldintza betetzen da';
$string['anymethodactivity'] = 'Aukeratutako edozein jarduera osatu da';
$string['anymethodcourseset'] = 'Aukeratutako edozein ikastaro osatu da';
$string['anymethodmanual'] = 'Aukeratutako edozein rolek ematen du domina';
$string['anymethodprofile'] = 'Aukeratutako edozein profil-eremu osatu da';
$string['attachment'] = 'Erantsi domina mezuari';
$string['attachment_help'] = 'Gaituta, e-postari domina erantsiko zaio jaisteko moduan. (Eranskinek gaituta egon behar dute hemen aukera hau erabiltzeko: Gunearen kudeaketa > Pluginak > Irteerako mezuak > E-posta)';
$string['award'] = 'Eman domina';
$string['awardedtoyou'] = 'Niri emandakoa';
$string['awardoncron'] = 'Dominetarako sarbidea egoki gaitu da. Erabiltzaile askok irabaz dezakete aldi berean domina hau. Gunea behar bezala ibiltzeko, ekintza hau prozesatzeko denbora-tartetxo bat beharko da.';
$string['awards'] = 'Jasotzaileak';
$string['backpackavailability'] = 'Dominaren kanpoko egiaztapena';
$string['backpackavailability_help'] = 'Domina-jasotzaileek zeuk emandako dominak irabazi dituztela egiaztatu ahal izateko, kanpoko motxila-zerbitzuak zure gunerako sarbidea izan behar du eta hartara bertatik emandako dominak egiaztatu.

Ez dirudi une honetan zure gunea eskaragarri dagoenik eta beraz orain arte emandako edo hemendik aurrera emandako dominak ezin izango dira egiaztatu.

**Zer dela-eta mezu hau?**

Izan daiteke firewall-ak saretik kanpoko erabiltzaileei sartzen ez uztea, gunea pasahitzez babestetua egotea edo gunea interneten eskuragarri ez dagoen ekipo batean aritzea (adibidez, makina batean lokalean).

**Arazoa al da?**

Dominak emango dituen produkzioan dagoen gune bakoitzean konpondu behar duzu arazoa; bestela, jasotzaileek ezin izango dute egiaztatu zuk emandako dominak irabazi dituztela.

Zure gunea ez badago aktiboa probako dominak sortu eta eman ditzakezu beti ere aktibatu aurretik gunea eskuragarri badago.

**Zer gertatzen da ezin badut nire gunerako erabateko sarbide publikoa eman?**

Egiaztatzeko beharrezko den URL bakarra [zure-gunearen-urla]/badges/assertion.php, da eta  fitxategi horretarako kanpoko sarbidea baimentzeko firewall-a aldatu ahal baduzu, dominek egiaztapenak funtzionatu egingo du.';
$string['backpackbadges'] = '{$a->totalbadges} domina duzu {$a->totalcollections} bildumatatik erakutsiak. <a href="mybackpack.php">Aldatu motxilaren ezarpenak</a>.';
$string['backpackconnection'] = 'Motxilarako konexioa';
$string['backpackconnection_help'] = 'Orri honek kanpoko motxila-hornitzaile baterako konexioa konfiguratzeko aukera ematen dizu. Motxila batera konektatzeak kanpoko dominak gune honetan erakusteko aukera ematen dizu eta bertan irabazitako dominak zeure motxilara igotzea.

Une honetan, <a href="http://backpack.openbadges.org">OpenBadges Mozilla Motxila</a> baino ez da bateragarria. Izena eman behar da orri honetan motxilarako konexioa konfiguratzen saiatzen hasi aurretik motxila-zerbitzua izateko.';
$string['backpackdetails'] = 'Motxilaren ezarpenak';
$string['backpackemail'] = 'E-posta helbidea';
$string['backpackemail_help'] = 'Zure motxilarekin lotutako e-posta helbidea. Konektatuta zauden bitartean, gune honetan irabazitako dominak e-posta helbide honekin lotuko dira.';
$string['backpackimport'] = 'Domina inportatzeko ezarpenak';
$string['backpackimport_help'] = 'Motxilarako konexio egokia ezarri ondoren, zure motxilako dominak "Nire Dominak" orrian eta zure profil-orrian ikusi ahal izango dira.

Atal honetan, zure profilean erakutsi nahi dituzun motxilako domina-bildumak aukera ditzakezu.';
$string['badgedetails'] = 'Dominaren xehetasunak';
$string['badgeimage'] = 'Irudia';
$string['badgeimage_help'] = 'Hau da domina hau ematean erabiliko den irudia.

Irudi berria gehitzeko, bilatu eta aukeratu irudia (JPG edo PNG formatuan) eta ondoren sakatu "Aldaketak gorde" botoiari. Irudiaren tamaina aldatu egingo da dominiaren irudiaren baldintzetara egokitzeko.';
$string['badgeprivacysetting'] = 'Dominen pribatutasun-ezarpenak';
$string['badgeprivacysetting_help'] = 'Irabazten dituzun dominak zure kontuaren profil-orrian erakutsi ahal dira. Ezarpen honek irabazitako azken dominak automatikoki erakusteko aukera ematen dizu.

"Nire Dominak" orrian kontrola ditzakezu banakako dominen pribatutasunaren ezapenak.';
$string['badgeprivacysetting_str'] = 'Erakutsi automatikoki nire profil-orrian irabazi ditudan dominak.';
$string['badgesalt'] = 'Eraldaketa jasotzailearen e-posta helbidea nahasteko';
$string['badgesalt_desc'] = 'Nahasketa erabilita motxila-zerbitzuek dominaren jatorriaren berri izan dezakete horren e-posta helbidea erakutsi gabe. Ezarpen honek zenbakiak eta hizkiak baino ez ditu erabili behar.

Oharra: jasotzaileak egiaztatzeko, ez aldatu ezarpen hau behin dominak ematen hasita.';
$string['badgesdisabled'] = 'Dominak ez daude gaituta gune honetan';
$string['badgesearned'] = 'Lortutako domina-kopurua: {$a}';
$string['badgesettings'] = 'Dominen ezarpenak';
$string['badgestatus_0'] = 'Ez dago eskura erabiltzaileentzat';
$string['badgestatus_1'] = 'Eskura erabiltzaileentzat';
$string['badgestatus_2'] = 'Ez dago eskura erabiltzaileentzat';
$string['badgestatus_3'] = 'Eskura erabiltzaileentzat';
$string['badgestatus_4'] = 'Artxibatua';
$string['badgestoearn'] = 'Eskura daitekeen domina-kopurua: {$a}';
$string['badgesview'] = 'Ikastaroko dominak';
$string['badgeurl'] = 'Emandako dominarako esteka';
$string['bawards'] = 'Jasotzaileak: ({$a})';
$string['bcriteria'] = 'Irizpidea';
$string['bdetails'] = 'Editatu zehaztasunak';
$string['bmessage'] = 'Mezua';
$string['boverview'] = 'Ikuspegi globala';
$string['bydate'] = 'noizko osatua:';
$string['clearsettings'] = 'Garbitu ezarpenak';
$string['completioninfo'] = 'Domina hau ondorengo hau bukatuta eman zen:';
$string['completionnotenabled'] = 'Ikastaro-osaketa ez dago gaituta ikastaro honetarako eta, beraz, ezin da dominarako irizpideetan erabili. Ikastaroaren ezarpenetan gaitu daiteke ikataro-osaketa.';
$string['configenablebadges'] = 'Gaituta, funtzio honek dominak sortu eta guneko erabiltzaileei emateko aukera emango dizu.';
$string['configuremessage'] = 'Dominaren mezua';
$string['connect'] = 'Konektatu';
$string['connected'] = 'Konektatuta';
$string['connecting'] = 'Konektatzen...';
$string['contact'] = 'Kontaktua';
$string['contact_help'] = 'E-posta helbide bat lotu da domina-emailearekin';
$string['copyof'] = '{$a}-ren kopia';
$string['coursebadges'] = 'Dominak';
$string['coursebadgesdisabled'] = 'Ikastaroko dominak ez daude gaituta gune honetan.';
$string['coursecompletion'] = 'Erabiltzaileek ikastaro hau osatu behar dute';
$string['create'] = 'Domina berria';
$string['createbutton'] = 'Sortu domina';
$string['creatorbody'] = '<p>{$a->user}-(e)k dominarako baldintzak bete ditu eta domina hau lortu du. Ikusi emandako dominak hemen: {$a->link} </p>';
$string['creatorsubject'] = '\'{$a}\' -(e)k domina lortu du!';
$string['criteria_0'] = 'Domina hau honela lortzen da:';
$string['criteria_1'] = 'Jarduera-osaketa';
$string['criteria_1_help'] = 'Ikastaro batean hainbat jarduera eginda erabiltzaileei domina emateko aukera eskaintzen du.';
$string['criteria_2'] = 'Eskuz ematea rolaren arabera';
$string['criteria_2_help'] = 'Gunean edo ikastaroan rol jakin bat dutenek erabiltzaileei domina eskuz emateko aukera eskaintzen du.';
$string['criteria_3'] = 'Partaidetza soziala';
$string['criteria_3_help'] = 'Soziala';
$string['criteria_4'] = 'Ikastaro-osaketa';
$string['criteria_4_help'] = 'Ikastaroa osatu duten erabiltzaileei domina emateko aukera eskaintzen du. Bestelako parametroak gehi dakizkioke irizpide honi, besteak beste, gutxienek okalifikazioa edo ikataroa bukatzeko data.';
$string['criteria_5'] = 'Ikastaro-multzoa osatzea';
$string['criteria_5_help'] = 'Ikastaro-multzo bat osatu duten erabiltzaileei domina emateko aukera eskaintzen du. Ikastaro bakoitzak bestelako parametroak izan ditzake, besteak beste, gutxienek okalifikazioa edo ikataroa bukatzeko data.';
$string['criteria_6'] = 'Osatu profila';
$string['criteria_6_help'] = 'Norberaren profileko hainbat eremu bete dituzten erabiltzaileei domina emateko aukera eskaintzen du. Pertsonalizatutako eta berezko eremuen artean aukera dezakezu.';
$string['criteriacreated'] = 'Dominarako irizpidea egoki sortuta';
$string['criteriadeleted'] = 'Dominarako irizpidea egoki ezabatuta';
$string['criteria_descr'] = 'Ondorengo baldintza betetzen dutenean emango zaie ikasleei domina hau:';
$string['criteria_descr_0'] = 'Erabiltzaileei domina hau zerrendako <strong>{$a}</strong> baldintza betetzean emango zaie.';
$string['criteria_descr_1'] = 'Ondorengo jardueretatik <strong>{$a}</strong> osatu dira:';
$string['criteria_descr_2'] = 'Domina hau ondorengo roletatik <strong>{$a}</strong> dituzten erabiltzaileek eman behar dute:';
$string['criteria_descr_4'] = 'Erabiltzaileek ikastaroa osatu behar dute';
$string['criteria_descr_5'] = 'Ondorengo ikastaroetatik <strong>{$a}</strong> osatu dira:';
$string['criteria_descr_6'] = 'Ondorengo erabiltzailearen profile-eremuetatik <strong>{$a}</strong> bete dira:';
$string['criteria_descr_bydate'] = '<em>{$a}</em> baino lehenago';
$string['criteria_descr_grade'] = '<em>{$a}</em> gutxieneko kalfikazioarekin';
$string['criteria_descr_short0'] = '<strong>{$a}</strong> bukatuta hauetatik:';
$string['criteria_descr_short1'] = '<strong>{$a}</strong> bukatuta hauetatik:';
$string['criteria_descr_short2'] = '<strong>{$a}</strong> emanda hauetatik:';
$string['criteria_descr_short4'] = 'Osatu ikastaroa';
$string['criteria_descr_short5'] = '<strong>{$a}</strong> bukatuta hauetatik:';
$string['criteria_descr_short6'] = '<strong>{$a}</strong> bukatuta hauetatik:';
$string['criteria_descr_single_1'] = 'Ondoko jarduera osatu behar da:';
$string['criteria_descr_single_2'] = 'Ondorengo rola duen erabiltzaileak eman behar du domina hau:';
$string['criteria_descr_single_4'] = 'Erabiltzaileek ikastaroa osatu behar dute';
$string['criteria_descr_single_5'] = 'Ondoko ikastaroa osatu behar da:';
$string['criteria_descr_single_6'] = 'Ondorengo erabiltzailearen profil-eremuak bete behar dira:';
$string['criteria_descr_single_short1'] = 'Osatuta:';
$string['criteria_descr_single_short2'] = 'Nork emana:';
$string['criteria_descr_single_short4'] = 'Osatu ikastaroa';
$string['criteria_descr_single_short5'] = 'Osatuta:';
$string['criteria_descr_single_short6'] = 'Osatuta:';
$string['criteriasummary'] = 'Irizpide-multzoa';
$string['criteriaupdated'] = 'Dominarako irizpidea egoki eguneratuta';
$string['criterror'] = 'Oraingo parametroekiko arazoak';
$string['criterror_help'] = 'Eremu-multzo honek erakusten du hasiera batean dominarako gehitu ziren baldintza guztiak baina dagoeneko eskura ez daudenak. Gomendagarria da parametro hauek desaktibatzea aurrerantzean ikasleek domina hau eskura dezaketela ziurtatzeko.';
$string['currentimage'] = 'Oraingo irudia:';
$string['currentstatus'] = 'Oraingo egoera:';
$string['dateawarded'] = 'Emate-data';
$string['dateearned'] = 'Data: {$a}';
$string['day'] = 'Egun';
$string['deactivate'] = 'Desgaitu sarbidea';
$string['deactivatesuccess'] = 'Dominetarako sarbidea ondo desgaitu da.';
$string['defaultissuercontact'] = 'Berezko domina-emailearekin kontaktuan jartzeko xehetasunak';
$string['defaultissuercontact_desc'] = 'E-posta helbide bat lotu da domina-emailearekin';
$string['defaultissuername'] = 'Berezko domina-emailearen izena';
$string['defaultissuername_desc'] = 'Ematen duen erakundearen izena.';
$string['delbadge'] = 'Ezabatu domina';
$string['delconfirm'] = 'Ziur al zaude \'{$a}\' domina ezabatu nahi duzula?';
$string['delcritconfirm'] = 'Ziur al zaude irizpide hau ezabatu egin nahi duzula?';
$string['delparamconfirm'] = 'Ziur al zaude parametro hau ezabatu nahi duzula?';
$string['description'] = 'Deskribapena';
$string['disconnect'] = 'Deskonektatuta';
$string['donotaward'] = 'Une honetan domina hau ez dago aktibatuta eta beraz, ezin zaie erabiltzaileei eman. Domina hau eman nahi baduzu, aktiba ezazu.';
$string['editsettings'] = 'Editatu ezarpenak';
$string['enablebadges'] = 'Gaitu dominak';
$string['error:backpackdatainvalid'] = 'Matxilak itzulitako datuak ez dira egokiak.';
$string['error:backpackemailnotfound'] = '\'{$a}\' e-posta ez dago inongo motxilarekin lotuta. <a href="http://backpack.openbadges.org"> motxila bat sortu behar duzu</a> e-posta horretarako edo saioa beste e-posta helbide batekin hasi.';
$string['error:backpackloginfailed'] = 'Ezin zara kanpoko motxila batera konektatu ondorengo arrazoia dela-eta: {$a}';
$string['error:backpacknotavailable'] = 'Zure gunea ez dago internet bidez eskuragarri eta, beraz, gune honetan emandako edozein domina kanpoko motxila-zerbitzuek ezin izango dute egiaztatu.';
$string['error:backpackproblem'] = 'Arazo bat dago zure motxila-zerbitzu hornitzailearekin konektatzeko. Mesedez, saiatu berriz geroxeago.';
$string['error:badjson'] = 'Konexio-saiakerak balio ez duten datuak eman ditu.';
$string['error:cannotact'] = 'Ezin da domina aktibatu.';
$string['error:cannotawardbadge'] = 'Ezin zaio domina erabiltzaile bati eman.';
$string['error:clone'] = 'Ezin da domina klonatu.';
$string['error:connectionunknownreason'] = 'Konexioa ez da egoki burutu, baina arrazoia ez dakigu.';
$string['error:duplicatename'] = 'Badago aldez aurretik izen hori duen domina sisteman.';
$string['error:externalbadgedoesntexist'] = 'Ez da domina aurkitu.';
$string['error:guestuseraccess'] = 'Bisitari gisa sartu zara. Dominak ikusteko erabiltzaile-kontua erabilita sartu behar duzu.';
$string['error:invalidbadgeurl'] = 'Domina emalearen URL formatua ez da egokia.';
$string['error:invalidcriteriatype'] = 'Irizpide-mota desegokia';
$string['error:invalidexpiredate'] = '';
$string['error:invalidexpireperiod'] = 'Iraungitze data ezin da negatiboa edo 0 izan.';
$string['error:noactivities'] = 'Ikastaro honetan ez dago osaketa-irizpideak gaituta dituen jarduerarik.';
$string['error:noassertion'] = 'Pertsonak ez du egiaztatu. Agian elkarrizketa-lauki itxi egingo zenuen saioa-hasteko prozesua osatu baino lehen.';
$string['error:nocourses'] = 'Ikastaro-osaketa ez dago gaituta gune honetako inongo ikastarotan, beraz ezin da bat ere erakutsi. Ikastaro-osaketa gaitu egin behar da ikastaroaren ezarpenetan.';
$string['error:nogroups'] = '<p>Zure motxilan ez dago domina-bilduma publikorik eskuragarri. </p>
<p>Bilduma publikoak bakarrik erakusten dira, <a href="http://backpack.openbadges.org">bisitatu zure motxila</a> hainbat bilduma publiko sortzeko.</p>';
$string['error:nopermissiontoview'] = 'Ez duzu baimenik domina-jasotzaileak ikusteko';
$string['error:nosuchbadge'] = 'Ez dago {$a} id-a duen dominarik.';
$string['error:nosuchcourse'] = 'Kontuz: ikastaro hau ez dago eskura.';
$string['error:nosuchfield'] = 'Kontuz: erabiltzaileran profil-eremu hau ez dago eskura.';
$string['error:nosuchmod'] = 'Kontuz: jarduera hau ez dago eskura.';
$string['error:nosuchrole'] = 'Kontuz: rol hau ez dago eskura.';
$string['error:nosuchuser'] = 'E-posta helbide hau duen erabiltzaileak ez du oraingo motxila-hornitzailearekin konturik.';
$string['error:notifycoursedate'] = 'Kontuz: Ikastaro-osaketa eta jarduera-osaketarekin lotutako dominak ez dira ikastaroa hasi arte emango.';
$string['error:parameter'] = 'Kontuz: gutxinez parametro bat aukeratu behar da domina emateko lan-ildoa ziurtatzeko.';
$string['error:personaneedsjs'] = 'Une honetan Javascript-a behar da zure motxilarekin kontektatzeko. Ahal baduzu, aktibatu javascript-a eta kargatu berriz orria.';
$string['error:requesterror'] = 'Konexio-eskariak huts egin du (errore-kodea {$a}).';
$string['error:requesttimeout'] = 'Konexio-eskaera tartea agortu egin da konexio burutu baino lehen.';
$string['error:save'] = 'Ezin da domina gorde.';
$string['error:userdeleted'] = '{$a->user} (Erabiltzaile hau ez dago dagoeneko {$a->site} -n)';
$string['evidence'] = 'Ebidentzia';
$string['existingrecipients'] = 'Existitzen diren domina-jasotzaileak';
$string['expired'] = 'Iraungita';
$string['expiredate'] = 'Domina {$a}-n iraungitzen da.';
$string['expireddate'] = 'Domina {$a}-n iraungitzen da.';
$string['expireperiod'] = 'Domina, eman eta  {$a} egunetara iraungitzen da.';
$string['expireperiodh'] = 'Domina, eman eta  {$a} ordutara iraungitzen da.';
$string['expireperiodm'] = 'Domina, eman eta  {$a} minututara iraungitzen da.';
$string['expireperiods'] = 'Domina, eman eta  {$a} segundutara iraungitzen da.';
$string['expirydate'] = 'Epemugaren data';
$string['expirydate_help'] = 'Aukeran, dominak data jakin batean iraungi daitezke, edo erabiltzaileari eman eta handik tarte jakin batera.';
$string['externalbadges'] = 'Nire dominak beste web-gune batzuetan';
$string['externalbadges_help'] = 'Eremu honetan kanpoko motxilako dominak erakusten dira.';
$string['externalbadgesp'] = 'Beste web-gune batzuetako dominak:';
$string['externalconnectto'] = 'Kanpoko dominak erakusteko <a href="{$a}"> motxila batekin konektatu behar duzu</a>';
$string['fixed'] = 'Data zehatza';
$string['hidden'] = 'Ezkutuan';
$string['hiddenbadge'] = 'Tamalez, dominaren jabeak ez du informazio hau argitaratu.';
$string['issuancedetails'] = 'Dominaren iraungitzea';
$string['issuedbadge'] = 'Emandako dominaren informazioa';
$string['issuerdetails'] = 'Emailearen xehetasunak';
$string['issuername'] = 'Emailearen izena';
$string['issuername_help'] = 'Ematen duen erakundearen izena.';
$string['issuerurl'] = 'Emailearen URLa';
$string['localbadges'] = 'Nire dominak {$a} web-gunean';
$string['localbadgesh'] = 'Nire dominak web-gune honetan';
$string['localbadgesh_help'] = 'Ikastaroak edo ikastaroetako jarduerak bukatzeagatik edota beste baldintza batzuk betetzeagatik web-gune honetan lortutako domina guztiak.

Hemen kude ditzakezu zure dominak zure profil-orrian publiko edo pribatu eginez.

Zure domina guztiak batera edo banaka deskarga ditzakegu eta zure ordenagailuan gorde. Deskargatutako dominak zure kanpoko motxila-zerbitzura gehi daitezke.';
$string['localbadgesp'] = 'Hemengo dominak: {$a}:';
$string['localconnectto'] = 'Domina hauek web-gune honetatik kanpo konpartitzeko <a href="{$a}">motxila batera konektatu behar duzu</a>.';
$string['makeprivate'] = 'Pribatu egin';
$string['makepublic'] = 'Publiko egin';
$string['managebadges'] = 'Kudeatu dominak';
$string['message'] = 'Mezuren gurputza';
$string['messagebody'] = '<p>"%badgename%" domina lortu duzu!</p>
<p>Domina honi buruzko informazio gehiago %badgelink%-n lortu ahal da.</p>
<p>Domina {$a}-tik deskarga eta kudea dezakezu.</p>';
$string['messagesubject'] = 'Zorionak! Domina bat irabazi duzu!';
$string['method'] = 'Irizpidea honela beteko da:';
$string['mingrade'] = 'Eskatutako gutxieneko kalifikazioa';
$string['month'] = 'Hilabete';
$string['mybackpack'] = 'Nire motxilaren ezarpenak';
$string['mybadges'] = 'Nire dominak';
$string['never'] = 'Inoiz ez';
$string['newbadge'] = 'Gehitu beste domina bat';
$string['newimage'] = 'Irudi berria';
$string['noawards'] = 'Domina hau ez da oraindik irabazi.';
$string['nobackpack'] = 'Ez dago kontu honekin lotutako motxila-zerbitzurik.<br/>';
$string['nobackpackbadges'] = 'Ez dago dominarik aukeratu dituzun bildumetan. <a href="mybackpack.php">Gehitu bilduma gehiago</a>.';
$string['nobackpackcollections'] = 'Ez da domina-bildumarik aukeratu. <a href="mybackpack.php">Gehitu bilduman</a>.';
$string['nobadges'] = 'Ez dago dominarik eskura.';
$string['nocriteria'] = 'Oraindik ez da ezarri domina honetarako irizpiderik.';
$string['noexpiry'] = 'Domina honek ez du iragungitze-datarik.';
$string['noparamstoadd'] = 'Ez dago bestelako parametrorik dominaren baldintzetara gehitzeko.';
$string['notacceptedrole'] = 'Une honetan esleituta duzun rola ez da eskuz domina hau eman dezakeenetako bat.<br/>
Dagoeneko domina hau irabazi duten erabiltzaileak ikusi nahi badituzu, joan orri honetara {$a}';
$string['notconnected'] = 'Konektatu gabe';
$string['nothingtoadd'] = 'Ez dago gehitzeko bestelako irizpiderik.';
$string['notification'] = 'Jakinarazi dominaren sortzaileari';
$string['notification_help'] = 'Ezarpen honek kudeatzen ditu domina bat eman dela jakinarazteko domina-sortzaileari bidalitako jakinarazpenak.

Ondoren aukerak erabili ahal dira:

* **INOIZ EZ** – Ez bidali jakinarazpenik.

* **ALDIORO** – Bidali jakinarazpena domina ematen den bakoitzean.

* **EGUNERO** – Bidali jakinarazpena egunean behin.

* **ASTERO** – Bidali jakinarazpena astean behin.

* **HILERO** – Bidali jakinarazpena hilean behin.';
$string['notifydaily'] = 'Egunero';
$string['notifyevery'] = 'Bakoitzean';
$string['notifymonthly'] = 'Hilabetero';
$string['notifyweekly'] = 'Astero';
$string['numawards'] = 'Domina hau <a href="{$a->link}">{$a->count}</a> erabiltzaileri eman zaie.';
$string['numawardstat'] = 'Domina hau {$a} erabiltzaileri eman zaie.';
$string['overallcrit'] = 'aukeratutako irizpideetatik bete da.';
$string['personaconnection'] = 'Saioa zure e-postarekin hasi';
$string['personaconnection_help'] = 'Pertsona zeure e-posta helbidea erabilita zeure burua web-ean identifikatzeko sistema da. Open Badges motxilak Pertsona erabiltzen du saioa hasteko eta beraz motxilarekin kontektatzeko Pertsonaren kontua behar duzu. Pertsonari buruzko informazio gehiago lortzeko jo hona:<a href="https://login.persona.org/about">https://login.persona.org/about</a>.';
$string['potentialrecipients'] = 'Balizko domina-jasotzaileak';
$string['recipientdetails'] = 'Jasotzailearen zehaztasunak';
$string['recipientidentificationproblem'] = 'Ezin da domina honetarako jasotzailerik aurkitu dauden erabiltzaileen artean.';
$string['recipients'] = 'Domina-jasotzaileak';
$string['recipientvalidationproblem'] = 'Une honetako erabiltzailea ezin da egiaztatu domina honen jasotzaile gisa.';
$string['relative'] = 'Data erlatiboa';
$string['requiredcourse'] = 'Gutxienez ikastaro bat gehitu behar da ikastaro-irizpide multzora.';
$string['reviewbadge'] = 'Dominarako sarbiderako aldaketak';
$string['reviewconfirm'] = '<p> hau eginda, erabiltzaileek zure domina ikusi ahal izango dute eta irabazten hasteko moduan izango dira.</p>

<p> Zenbait erabiltzailek dagoeneko beteta izango dituzte, agian, domina irabazteko irizpideak eta aktibatu orduko eman egingo zaie. </p>

<p> Domina lehenengoz eman orduko <strong>blokeatu</strong> egingo da - hainbat ezarpen, irizpideak eta iraungitze ezarpenak barne, ezin izango dira aldatu. </p>

<p> Ziur al zaude \'{$a}\' dominarako sarbidea baimendu nahi duzula? </p>';
$string['save'] = 'Gorde';
$string['searchname'] = 'BIlatu izenaren arabera';
$string['selectaward'] = 'Mesedez, aukeratu zein rol erabili nahi duzun domina hau emateko:';
$string['selectgroup_end'] = 'Bilduma publikoak bakarrik erakusten dira, <a href="http://backpack.openbadges.org">bisita ezazu zure motxila</a> bilduma publiko gehiago sortzeko.';
$string['selectgroup_start'] = 'Aukeratu gune honetan erakutsiko diren motxilako bildumak:';
$string['selecting'] = 'Aukeratutako dominekin...';
$string['setup'] = 'Konfiguratu konexioa';
$string['signinwithyouremail'] = 'Hasi saioa zure e-posta helbidearekin';
$string['sitebadges'] = 'Guneko dominak';
$string['sitebadges_help'] = 'Guneko dominak gunearekin lotutako jarduerak egin dituzten erabiltzaileei eman ahal zaizkie bakarrik. Jarduera horien artean daude hainbat ikastaro osatzea edo erabiltzaile-profileko hainbat eremu betetzea. Guneko dominak eskuz ere eman ahal dizkio erabiltzaile batek beste bati.

Ikastaroekin lotutako jardueretarako dominak ikastaro testuinguruan sortu behar dira. Hemen aurki daitezke ikastaroko dominak: Kudeaketa >  Dominak';
$string['status'] = 'Dominen egoera';
$string['status_help'] = 'Domina baten egoerak zehazten du horren jokaera sisteman:

* ** ERABILGARRI ** - Erabiltzaileek domina irabaz dezaketela adierazten du. Domina erabilgarri dagoen bitartean ezin da horren irizpiderik aldatu.

* ** EZ ERABILGARRI ** - Domina hau ez dago erabiltzaileen eskra eta beraz ezin dute irabazi eta ezin da eskuz eman. Domina hori behin ere eman ez bada, irizpideak alda daitezke.

Domina bat gutxienez behin eman bada, automatikoki pasako da **BLOKEATUTA** egoerara. Erabiltzaileek lor ditzakete blokeatutako dominak baina horien irizpideak ezin dira aldatu. Blokeatutako domina baten zehaztasunak edo irizpideak aldatu behar badituzu, bikoiztu egin dezakezu domina eta beha diren aldaketa guztiak egin.

* Zertarako blokeatzen ditugu dominak? *

Domina bat irabazteko erabiltzaile guztiek baldintza berberak dituztela ziurtatzeko. Une honetan ezin da dominarik kendu. Dominen baldintzak edonoiz aldatzen uzten badugu, oso litekeena da azkenean domina bera duten erabiltzaileek baldintza erabat ezberdinak beteta lortu izana.';
$string['statusmessage_0'] = 'Domina hau ez dago une honetan erabiltzaileek erabiltzeko moduan. Gaitu sarbidea erabiltzaileek domina hau irabazi ahal izatea nahi baduzu.';
$string['statusmessage_1'] = 'Domina hau une honetan erabiltzaileek erabiltzeko moduan dago. Ezgaitu sarbidea edozein aldaketa egiteko.';
$string['statusmessage_2'] = 'Domina hau ez dago une hontan erabiltzaileek erabiltzeko moduan eta irizpideak blokeatuta daude. Gaitu sarbidea erabiltzaileek domina hau irabazi ahal izatea nahi baduzu.';
$string['statusmessage_3'] = 'Domina hau une honetan erabiltzaileek erabiltzeko moduan dago eta irizpideak blokeatuta daude.';
$string['statusmessage_4'] = 'Domina hau une honetan artxibatuta dago.';
$string['subject'] = 'Mezuaren gaia';
$string['variablesubstitution'] = 'Aldagaien aldaketa mezuetan.';
$string['variablesubstitution_help'] = 'Domina-mezu batean, hainbat aldagai txerta daitezke gaian edota mezuan eta hartara benetako baloreekin aldatu mezua bidaltzean. Aldagaiak ondoren adierazten den bezala txertatu behar dira testuan. Se pueden utilizar las siguientes variables:

%badgename%
: honen ordez dominaren izen osoa agertuko da.

%username%
: jasotzailearen izen osoa agertuko da honen ordez.

%badgelink%
: emandako dominaren inguruko informazioa duen URL publikoa agertuko da honen ordez.';
$string['viewbadge'] = 'Ikusi emandako domina';
$string['visible'] = 'Ikusgarria';
$string['warnexpired'] = '(Domina hau iraungita dago!)';
$string['year'] = 'Urte';
