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
 * Strings for component 'enrol_ldap', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Rolle \'{$a->role_shortname}\' an Nutzer/in \'{$a->user_username}\' im Kurs \'{$a->course_shortname}\' (ID {$a->course_id}) zuweisen';
$string['assignrolefailed'] = 'Fehler beim Zuweisen der Rolle \'{$a->role_shortname}\' an Nutzer/in \'{$a->user_username}\' im Kurs \'{$a->course_shortname}\' (ID {$a->course_id})';
$string['autocreate'] = '<p>Kurse können automatisch in Moodle angelegt werden, wenn es in LDAP Anmeldungen zu einem Kurs gibt, der in Moodle noch nicht existiert.</p><p>Wenn Sie die automatische Kurserstellung nutzen, wird empfohlen, die folgenden Fähigkeiten aus den relevanten Rollen zu entfernen: moodle/course:changeidnumber, moodle/course:changeshortname, moodle/course:changefullname and moodle/course:changesummary.</p>';
$string['autocreate_key'] = 'Automatisches Erstellen';
$string['autocreation_settings'] = 'Einstellungen für automatisch angelegte Kurse';
$string['autoupdate_settings'] = 'Einstellungen für automatisch aktualisierte Kurse';
$string['autoupdate_settings_desc'] = '<p>Wählen Sie Felder, die bei der Synchronisierung aktualisiert werden sollen (enrol/ldap/cli/sync.php)</p><p>Sobald mindestens ein Feld gewählt, wird die Aktualisierung durchgeführt.';
$string['bind_dn'] = 'Wenn Sie einen sog. bind-user für die LDAP-Suche nach Nutzer/innen verwenden wollen, geben Sie diesen  hier an, z.B. \'cn=ldapuser,ou=public,o=org\'.';
$string['bind_dn_key'] = 'Anmeldename des Bind Users';
$string['bind_pw'] = 'Kennwort für den Bind-User';
$string['bind_pw_key'] = 'Kennwort';
$string['bind_settings'] = 'Bind-Einstellungen';
$string['cannotcreatecourse'] = 'Kurs kann nicht angelegt werden: Notwendige Daten fehlen im LDAP-Datensatz!';
$string['cannotupdatecourse'] = 'Kurs kann nicht aktualisiert werden: Notwendige Daten fehlen im LDAP-Datensatz! Kurs-ID \'{$a->idnumber}\'';
$string['cannotupdatecourse_duplicateshortname'] = 'Kurs kann nicht aktualisiert werden: Doppelter kurzer Kursname! Der Kurs mit der Kurs-ID \'{$a->idnumber}\' wird übersprungen...';
$string['category'] = 'Kursbereich für automatisch angelegte Kurse';
$string['category_key'] = 'Kategorie';
$string['contexts'] = 'LDAP Kontexte';
$string['couldnotfinduser'] = 'Nutzer \'{$a}\' konnte nicht gefunden werden, überspringen';
$string['course_fullname'] = 'Optional: LDAP-Feld für vollständigen Kursnamen';
$string['course_fullname_key'] = 'Vollständiger Name';
$string['course_fullname_updateonsync'] = 'Vollständigen Kursnamen bei der Synchronisierung aktualisieren';
$string['course_fullname_updateonsync_key'] = 'Vollständigen Kursnamen aktualisieren';
$string['course_idnumber'] = 'Bezeichner zur eindeutigen Identifizierung in LDAP, normalerweise <em>cn</em> oder <em>uid</em>. Es wird empfohlen, den Wert zu sperren, wenn Sie Kurse automatisiert anlegen wollen.';
$string['course_idnumber_key'] = 'ID-Nummer';
$string['coursenotexistskip'] = 'Der Kurs \'{$a}\' existiert nicht und die Autocreation ist deaktiviert, überspringen';
$string['course_search_sub'] = 'Gruppenzugehörigkeiten in Subkontexten suchen';
$string['course_search_sub_key'] = 'Subkontexte';
$string['course_settings'] = 'Einstellungen für Kurse';
$string['course_shortname'] = 'Optional: LDAP-Feld für die Kurzbezeichnung des Kurses';
$string['course_shortname_key'] = 'Kurzname';
$string['course_shortname_updateonsync'] = 'Kurzen Kursnamen bei der Synchronisierung aktualisieren';
$string['course_shortname_updateonsync_key'] = 'Kurzen Kursnamen aktualisieren';
$string['course_summary'] = 'Optional: LDAP-Feld für die Beschreibung des Kurses';
$string['course_summary_key'] = 'Zusammenfassung';
$string['course_summary_updateonsync'] = 'Beschreibung bei der Synchronisierung aktualisieren';
$string['course_summary_updateonsync_key'] = 'Beschreibung aktualisieren';
$string['courseupdated'] = 'Kurs mit der Kurs-ID \'{$a->idnumber}\' wurde erfolgreich aktualisiert.';
$string['courseupdateskipped'] = 'Kurs mit der Kurs-ID \'{$a->idnumber}\' braucht keine Aktualisierung und wird übersprungen...';
$string['createcourseextid'] = 'CREATE Nutzer sollte in einen nicht bestehenden Kurs eingetragen werden \'{$a->courseextid}';
$string['createnotcourseextid'] = 'Nutzereinschreibung in einen nichtvorhandenen Kurs \'{$a->courseextid}\'';
$string['creatingcourse'] = 'Kurs \'{$a}\' wird erstellt...';
$string['duplicateshortname'] = 'Anlegen des Kurses fehlgeschlagen. Doppelter kurzer Kursname! Kurs mit der Kurs-ID \'{$a->idnumber}\' wird übersprungen...';
$string['editlock'] = 'Sperrwert';
$string['emptyenrolment'] = 'Leere Einschreibung der Rolle \'{$a->role_shortname}\' in den Kurs \'{$a->course_shortname}\'';
$string['enrolname'] = 'LDAP';
$string['enroluser'] = '\'{$a->user_username}\' in den Kurs \'{$a->course_shortname}\' (ID {$a->course_id}) einschreiben';
$string['enroluserenable'] = 'Aktivierte Einschreibung von Nutzer/in \'{$a->user_username}\' in den Kurs \'{$a->course_shortname}\' (ID {$a->course_id})';
$string['explodegroupusertypenotsupported'] = 'ldap_explode_group() unterstützt nicht den ausgewählten Nutzertyp: {$a}';
$string['extcourseidinvalid'] = 'Ungültige externe Kurs-ID! ';
$string['extremovedsuspend'] = 'Deaktivierte Einschreibung von Nutzer/in \'{$a->user_username}\' in den Kurs \'{$a->course_shortname}\' (ID {$a->course_id})';
$string['extremovedsuspendnoroles'] = 'Deaktivierte Einschreibung und entfernte Rollen von Nutzer/in \'{$a->user_username}\' in den Kurs \'{$a->course_shortname}\' (ID {$a->course_id})';
$string['extremovedunenrol'] = 'Nutzer/in \'{$a->user_username}\' aus dem Kurs \'{$a->course_shortname}\' (id {$a->course_id}) abmelden';
$string['failed'] = 'Fehlgeschlagen!';
$string['general_options'] = 'Grundeinstellungen';
$string['group_memberofattribute'] = 'Name des Attribut, das die Zugehörigkeit eines Nutzers zu einer Gruppe festlegt (z. B. memberOf, groupMembership, etc)';
$string['group_memberofattribute_key'] = 'Attribut \'Member of\'';
$string['host_url'] = 'URL des LDAP-Servers, z.B. \'ldap://ldap.meinserver.de\' oder \'ldaps://ldap. meinserver.de\'';
$string['host_url_key'] = 'Host-URL';
$string['idnumber_attribute'] = 'Wenn die Gruppenzugehörigkeit bevorzugte Namen enthält, geben Sie hier das gleiche Attribut ein, das Sie für die Zuordnung der \'ID-Nummer\' in den Einstellungen zur LDAP-Authentifizierung angegeben haben.';
$string['idnumber_attribute_key'] = 'ID-Nummer';
$string['ldap_encoding'] = 'Geben Sie die Codierung an, die der LDAP-Server benutzt. Üblich ist utf-8, aber Microsoft AD v2 nutzt standardmäßig cp1252, cp1250, usw.';
$string['ldap_encoding_key'] = 'LDAP-Codierung';
$string['ldap:manage'] = 'LDAP-Einschreibevorgänge verwalten';
$string['memberattribute'] = 'LDAP-Mitgliedsattribut';
$string['memberattribute_isdn'] = 'Wenn die Gruppenzugehörigkeit bevorzugte Namen enthält, müssen Sie dies hier angeben und auch alle nachfolgenden Einstellungen dieses Abschnitts vornehmen ';
$string['memberattribute_isdn_key'] = 'Mitgliedsattribut ist dn';
$string['nested_groups'] = 'Möchten Sie enthaltene Gruppen (Gruppen innerhalb von Gruppen) für die Einschreibung benutzen?';
$string['nested_groups_key'] = 'Enthaltene Gruppen';
$string['nested_groups_settings'] = 'Einstellungen für enthaltene Gruppen';
$string['nosuchrole'] = 'Diese Rolle ist nicht vorhanden: \'{$a}\'';
$string['objectclass'] = 'objectClass für Kurssuche in LDAP, normalerweise \'posixGroup\'.';
$string['objectclass_key'] = 'ObjectClass';
$string['ok'] = 'OK';
$string['opt_deref'] = 'Wenn die Gruppenzugehörigkeit bevorzugte Namen enthält, legen Sie fest, wie Aliases bei der Suche behandelt werden. Wählen Sie einen der folgenden Werte aus: \'Nein\' (LDAP_DEREF_NEVER) oder \'Ja\' (LDAP_DEREF_ALWAYS)';
$string['opt_deref_key'] = 'Aliases auflösen';
$string['phpldap_noextension'] = 'Die PHP-Extension LDAP scheint nicht vorhanden zu sein. Bitte stellen Sie sicher, dass sie installiert und aktiviert ist, wenn Sie dieses Einschreibungsplugin benutzen möchten.';
$string['pluginname'] = 'LDAP-Einschreibung';
$string['pluginname_desc'] = '<p>Sie können einen LDAP-Server nutzen, um die Kurseinschreibung von Teilnehmer/innen zu verwalten. Dafür muss der LDAP-Baum Gruppen und Mitgliedschaften enthalten, die auf Kurse und Kursrollen übertragen werden.</p>
<p>Es wird vorausgesetzt, dass Kurse als Gruppen in LDAP definiert sind und jede Gruppe mehrere Mitgliedsfelder hat
(<em>member</em> oder <em>memberUid</em>), die eine eindeutige Identifizierung des/der Nutzer/in ermöglichen.</p>
<p>Um LDAP als Kurs-Anmeldeverfahren zu verwenden, <strong>muss</strong>
jeder Nutzer eine gültige ID-Nummer besitzen. Die LDAP-Gruppen müssen diese ID-Nummer in den Mitgliedsfeldern aufweisen, um den/die Nutzer/in als Teilnehmer/in in den Kurs einzuschreiben.
Dies funktioniert normalerweise sehr gut, wenn Sie LDAP auch zur Nutzerauthentifizierung nutzen.</p>
<p>Kursanmeldungen werden aktualisiert, wenn der Nutzer sich in Moodle einloggt. Sie können auch ein Skript nutzen, um Kursanmeldungen zu synchronisieren. Moodle liefert ein solches Skript:
<em>enrol/ldap/enrol_ldap_sync.php</em>.</p>
<p>Sie können das LDAP-Anmeldeverfahren auch so konfigurieren, dass automatisch neue Kurse angelegt werden, wenn neue Gruppen in LDAP eingerichtet werden.</p>';
$string['pluginnotenabled'] = 'Plugin nicht aktiviert!';
$string['role_mapping'] = '<p>Für jede Rolle, die Sie über LDAP zuweisen möchten, müssen Sie eine Kontextliste angeben, in der die Kursrollen festgelegt sind. Trennen Sie unterschiedliche Kontexte mit einem Semikolon \';\'.</p><p>Zusätzlich müssen Sie das Attribut Ihres LDAP-Servers festlegen, das für Gruppenmitglieder benutzt wird (normalerweise \'member\' or \'memberUid\')</p>';
$string['role_mapping_attribute'] = 'LDAP Member Attribut für {$a}';
$string['role_mapping_context'] = 'LDAP Kontexte für {$a}';
$string['role_mapping_key'] = 'Rollen über LDAP zuweisen';
$string['roles'] = 'Rollenabbildung';
$string['server_settings'] = 'Einstellungen für LDAP-Server';
$string['synccourserole'] = '== Synching Kurs \'{$a->idnumber}\' für Rolle \'{$a->role_shortname}\'';
$string['template'] = 'Optional: Automatisch angelegte Kurse können ihre Kurseinstellungen aus einer Kursvorlage kopieren. Tragen Sie hier die Kurzbezeichnung dieser Kursvorlage ein.';
$string['template_key'] = 'Vorlage';
$string['unassignrole'] = 'Rollenzuordnung \'{$a->role_shortname}\' für Nutzer \'{$a->user_username}\' im Kurs \'{$a->course_shortname}\' (id {$a->course_id}) aufheben';
$string['unassignrolefailed'] = 'Rollenaufhebung  \'{$a->role_shortname}\' für Nutzer \'{$a->user_username}\' im Kurs \'{$a->course_shortname}\' (id {$a->course_id}) gescheitert';
$string['unassignroleid'] = 'Rolle \'{$a->role_id}\' für Nutzer id \'{$a->user_id}\' aufheben';
$string['updatelocal'] = 'Lokale Daten aktualisieren';
$string['user_attribute'] = 'Wenn die Gruppenzugehörigkeit bevorzugte Namen enthält, legen Sie das Attribut fest, um Nutzer/innen zu benennen bzw. zu suchen. Falls Sie die LDAP-Authentifikation nutzen, sollte dieser Wert zum dort angegebenen Attribut \'ID-Nummer\' passen.';
$string['user_attribute_key'] = 'ID-Nummer';
$string['user_contexts'] = 'Wenn die Gruppenzugehörigkeit bevorzugte Namen enthält, legen Sie die Kontexte fest, wo Nutzer gefunden werden sollen. Trennen Sie unterschiedliche Kontexte mit einem Semikolon \';\' wie z.B.  \'ou=users,o=org; ou=others,o=org\'';
$string['user_contexts_key'] = 'Kontexte';
$string['user_search_sub'] = 'Wenn die Gruppenzugehörigkeit bevorzugte Namen enthält, legen Sie die Nutzersuche in Subkontexten gesondert fest';
$string['user_search_sub_key'] = 'Subkontexte';
$string['user_settings'] = 'Nutzersuche (user lookup)';
$string['user_type'] = 'Wenn die Gruppenzugehörigkeit bevorzugte Namen enthält, legen Sie fest, wie Nutzer/innen in LDAP gespeichert werden';
$string['user_type_key'] = 'Nutzertyp';
$string['version'] = 'Version des LDAP-Protokolls auf Ihrem Server';
$string['version_key'] = 'Version';
