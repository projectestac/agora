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
 * Strings for component 'enrol_ldap', language 'eu', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = '\'{$a->role_shortname}\' rola esleitzen \'{$a->user_username}\' erabiltzaileari \'{$a->course_shortname}\'  ikastaroan (id {$a->course_id})';
$string['assignrolefailed'] = 'Kale egin du \'{$a->role_shortname}\' rola esleitzean \'{$a->user_username}\' erabiltzaileari \'{$a->course_shortname}\' ikastaroan (id {$a->course_id})';
$string['autocreate'] = 'Era automatikoan sor daitezke ikastaroak oraindik ere Moodlen existitzen ez den ikastaro batean matrikulazioak badaude.';
$string['autocreate_key'] = 'Sortu automatikoki';
$string['autocreation_settings'] = 'Ikastaroak era automatikoak sortzeko zehaztasunak';
$string['bind_dn'] = 'Erabiltzaileak bilatzeko \'bin-user\' erabili nahi baduzu, zehaztu hemen. Horrelako zerbait \'cn=ldapuser,ou=public,o=org\'';
$string['bind_pw'] = '\'Bind-user\'rentzako pasahitza';
$string['bind_pw_key'] = 'Pasahitza';
$string['category'] = 'Era automatikoan sortutako ikastaroetarako kategoria';
$string['category_key'] = 'Kategoria';
$string['contexts'] = 'LDAP kontestuak';
$string['course_fullname'] = 'Aukerakoa: LDAP eremua zeinetatik lortuko den izen osoa.';
$string['course_fullname_key'] = 'Izen osoa';
$string['course_idnumber'] = 'Identikatzaile bakarraren mapa LADPn, ohikoena <em>cn</em> edo <em>uid</em>. Balorea blokeatzea gomendatzen da ikastaroa sortzeko era automatikoa erabiltzen ari bada.';
$string['course_idnumber_key'] = 'ID zenbakia';
$string['course_search_sub_key'] = 'Bilatu azpitestuinguruak';
$string['course_settings'] = 'Ikastaroan matrikulatzeko ezarpenak';
$string['course_shortname'] = 'Aukerakoa:  LDAP eremua zeinetatik lortuko den izen laburra.';
$string['course_shortname_key'] = 'Izen laburra';
$string['course_summary'] = 'Aukerakoa:  LDAP eremua zeinetatik lortuko den laburpena.';
$string['course_summary_key'] = 'Laburpena';
$string['editlock'] = 'Balorea blokeatu';
$string['enrolname'] = 'LDAP';
$string['enroluser'] = 'Matrikulatu \'{$a->user_username}\' erabiltzailea \'{$a->course_shortname}\' ikastaroan (id {$a->course_id})';
$string['extremovedunenrol'] = 'Desmatrikulatu \'{$a->user_username}\' erabiltzailea \'{$a->course_shortname}\' ikastarotik (id {$a->course_id})';
$string['failed'] = 'Kale egin du!';
$string['general_options'] = 'Aukera orokorrak';
$string['host_url'] = 'Zehaztu LDAP hosta URL formatuan, adib. \'ldap://ldap.myorg.com/\'
edo \'ldaps://ldap.myorg.com/\'';
$string['host_url_key'] = 'Ostalariaren URLa';
$string['idnumber_attribute_key'] = 'Atributuaren ID zenbakia';
$string['ldap_encoding_key'] = 'LDAP kodifikazioa';
$string['ldap:manage'] = 'Kudeatu LDAP matrikulaziorako instantziak';
$string['memberattribute'] = 'LDAP kide-ezaugarria';
$string['nested_groups'] = 'Habiaratutako taldeak (adib. taldeen taldeak) matrikulaziorako?';
$string['nested_groups_key'] = 'Habiaratutako taldeak';
$string['nested_groups_settings'] = 'Habiaratutako taldeen ezarpenak';
$string['objectclass'] = 'Ikastaroak bilatzeko erabilitako objectClass. Ohikoena \'posixGroup\'.';
$string['objectclass_key'] = 'Objektu-mota';
$string['ok'] = 'ONDO!';
$string['pluginname'] = 'LDAP matrikulak';
$string['pluginname_desc'] = '<p>LDAP zerbitzaria erabil dezakezu matrikulazioak kontrolatzeko. Suposatu egiten da zure LDAP arbolak ikastaroetarako taldeak dituztela eta hauetako talde edo ikastaro bakoitzak ikasleei erreferentzia egiten dieten matrikulazio-sarrerak dituztela.</p><p>Suposatu egiten da ikastaroak talde bezala daudela definituta LDAPn, talde bakoitzak erabiltzailearen identifikazio bakarra duten hainbat matrikulazio-eremu dituelarik (<em>member</em> edo <em>memberUid</em>).</p><p>LDAP matrikulazioa erabiltzeko, erabiltzaileek balio duen \'idnumber\'eremua izan <strong>behar</strong>dute. LDAP taldeek \'idnumber\' hori izan behar dute erabiltzaile-eremuetan erabiltzailea ikastaro batean matrikulatu ahal izateko. Ondo funtzionatuko du dagoeneko LDAP Autentifikazioa erabiltzen baduzu.</p><p>Matrikulazioak eguneratu egingo dira erabiltzailea idenfikatzen denean. Kontsulta ezazu <em>enrol/ldap/enrol_ldap_sync.php</em>.</p>
<p>Plugin hau LDAPn talde berriak agertzen direnean ikastaro berriak era automatikoan sortzeko ere zehaztu ahal da.</p>';
$string['pluginnotenabled'] = 'Plugina ez dago gaituta!';
$string['roles'] = 'Rolen mapa';
$string['server_settings'] = 'LDAP zerbitzariaren ezarpenak';
$string['template'] = 'Aukerakoa: era automatikoan sortutako ikastaroak ikastaro-txantiloi batetik kopia ditzakete beren zehaztasunak.';
$string['template_key'] = 'Itxura';
$string['updatelocal'] = 'Datu lokalak eguneratu';
$string['user_attribute_key'] = 'Atributuaren ID zenbakia';
$string['user_contexts_key'] = 'Testuinguruak';
$string['user_search_sub_key'] = 'Bilatu azpitestuinguruak';
$string['user_type_key'] = 'Erabiltzaile-mota';
$string['version'] = 'Zerbitzariak erabiltzen duen LDAP protokoloaren bertsioa';
$string['version_key'] = 'Bertsioa';
