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
 * Strings for component 'enrol_ldap', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autocreate'] = 'Kurser kan skapas automatiskt om det finns registreringar på en kurs som ännu inte finns i Moodle.';
$string['autocreation_settings'] = 'Inställningar för att skapa kurser automatiskt.';
$string['bind_dn'] = 'Om Du vill använda "bind"-användare för att söka användare så ska Du ange detta här. Någonting i stil med \'cn=ldapuser,ou=public,o=org\'';
$string['bind_pw'] = 'Lösenord för \'bind\'-användare';
$string['category'] = 'Kategorin för automatiskt skapade kurser';
$string['contexts'] = 'Sammanhang för LDAP';
$string['course_fullname'] = 'Valfritt: LDAP-fält för att hämta det kompletta namnet från';
$string['course_idnumber'] = 'Karta som visar var den unika identifieraren i LDAP finns, vanligtvis <em>cn</em> or <em>uid</em>. Du rekommenderas att låsa detta  värde om Du använder automatiskt skapande av kurser.';
$string['course_settings'] = 'Inställningar för registrering på kurser';
$string['course_shortname'] = 'Valfritt: LDAP-fält att hämta kortnamnet från.';
$string['course_summary'] = 'Valfritt: LDAP-fält att hämta sammanfattningen från.';
$string['editlock'] = 'Låsets värde';
$string['enrolname'] = 'LDAP';
$string['general_options'] = 'Allmänna alternativ';
$string['host_url'] = 'Ange LDAP-värden i URL-form som \'ldap://ldap.myorg.com/\'
eller \'ldaps://ldap.myorg.com/\'';
$string['memberattribute'] = 'Attribut för medlem i LDAP';
$string['objectclass'] = 'objectClass som används för att söka kurser. Vanligtvis \'posixGroup\'.';
$string['pluginname_desc'] = '<p>Du kan använda en LDAP-server för att styra Dina registreringar. Utgångspunkten är att Ditt LDAP-träd innehåller grupper som visar en karta till kurserna och att var och en av dessa grupper/kurser har kartor över medlemsdata som visar vägen till studenterna/eleverna/deltagarna/de lärande</p><p>Utgångspunkten är att kurser är definierade som grupper i LDAP där varje grupp har ett flertal fält för medlemsskap (<em>member</em> eller <em>memberUid</em>) som innehåller en unik identifiering av användaren.</p><p>För att använda LDAP-registrering <strong>måste</strong> Dina användare ha giltiga fält för ID-nummer. LDAP-grupperna måste ha detta ID-nummer i fältet för medlemmar för att man ska kunna registrera en användare på en kurs. Detta kommer i normalfallet att fungera bra om Du redan använder autenticering via LDAP.</p><p>Registreringarna kommer att uppdateras när användaren loggar in. Du kan också köra ett skript för att synkronisera registreringarna. Titta i <em>enrol/ldap/enrol_ldap_sync.php</em>.</p>
<p>Denna plugin kan också ställas in så att den automatiskt skapar nya kurser när det dyker upp nya grupper i LDAP.</p>';
$string['roles'] = 'Kartläggning av roller';
$string['server_settings'] = 'Inställningar för LDAP-server';
$string['template'] = 'Valfritt: automatiskt skapade kurser kan kopiera sina inställningar från en kursmall.';
$string['updatelocal'] = 'Uppdatera lokala data';
$string['version'] = 'Detta är den version av LDAP-protokollet som DIn server använder.';
