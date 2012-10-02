<?PHP // $Id$ 
      // enrol_ldap.php - created with Moodle 1.8 Beta + (2007021400)


$string['description'] = '<p>Sie können einen LDAP-Server nutzen, um die Anmeldung von Teilnehmer/innen in Kursen zu verwalten.</p>
<p>Es wird angenommen, dass der LDAP-Baum Gruppen enthält, die zu Kursen gehören und dass jede/r der Gruppen/Kurse Einträge von Teilnehmer/innen hat.</p>
<p>Es wird angenommen, dass Kurse als Gruppen in LDAP definiert sind und jede Gruppe mehrere Mitgliedsfelder hat
(<em>member</em> oder <em>memberUid</em>), die eine eindeutige Identifizierung des/der Nutzer/in ermöglichen.</p>
<p>Um LDAP als Kurs-Anmeldeverfahren zu verwenden, <strong>muss</strong>
jeder Nutzer eine gültige ID-Nummer besitzen. Die LDAP-Gruppen müssen diese ID-Nummer in den Mitgliedsfeldern aufweisen, um den/die Nutzer/in als Teilnehmer/in in den Kurs einzuschreiben.
Dies funktioniert normalerweise sehr gut, wenn Sie LDAP auch zur Nutzerauthentifizierung nutzen.</p>
<p>Kursanmeldungen werden aktualisiert, wenn der Nutzer sich in Moodle einloggt. Sie können auch ein Skript nutzen, um Kursanmeldungen zu synchronisieren. Moodle liefert ein solches Skript:
<em>enrol/ldap/enrol_ldap_sync.php</em>.</p>
<p>Sie können das LDAP-Anmeldeverfahren auch so konfigurieren, dass automatisch neue Kurse angelegt werden, wenn neue Gruppen in LDAP eingerichtet werden.</p>';
$string['enrol_ldap_autocreate'] = 'Kurse können automatisch in Moodle angelegt werden, wenn es in LDAP Anmeldungen zu einem Kurs gibt, der in Moodle noch nicht existiert.';
$string['enrol_ldap_autocreation_settings'] = 'Einstellungen für automatisiertes Anlegen von Kursen';
$string['enrol_ldap_bind_dn'] = 'Wenn Sie einen sog. bind-user für die LDAP-Suche nach Nutzer/innen verwenden wollen, geben Sie diesen  hier an, z.B. \'cn=ldapuser,ou=public,o=org\'.';
$string['enrol_ldap_bind_pw'] = 'Kennwort für den bind-user';
$string['enrol_ldap_category'] = 'Kursbereich für automatisch angelegte Kurse';
$string['enrol_ldap_contexts'] = 'LDAP Kontexte';
$string['enrol_ldap_course_fullname'] = 'Optional: LDAP-Feld für vollständigen Kursnamen';
$string['enrol_ldap_course_idnumber'] = 'Bezeichner zur eindeutigen Identifizierung in LDAP, normalerweise <em>cn</em> oder <em>uid</em>. Es wird empfohlen, den Wert zu sperren, wenn Sie Kurse automatisiert anlegen wollen.';
$string['enrol_ldap_course_settings'] = 'Einstellungen für Kurse';
$string['enrol_ldap_course_shortname'] = 'Optional: LDAP-Feld für die Kurzbezeichnung des Kurses';
$string['enrol_ldap_course_summary'] = 'Optional: LDAP-Feld für die Beschreibung des Kurses';
$string['enrol_ldap_editlock'] = 'Sperrwert';
$string['enrol_ldap_general_options'] = 'Allgemeine Einstellungen';
$string['enrol_ldap_host_url'] = 'URL des LDAP-Servers, z.B. \'ldap://ldap.myorg.com/\'
oder \'ldaps://ldap.myorg.com/\'';
$string['enrol_ldap_memberattribute'] = 'LDAP Member Attribut';
$string['enrol_ldap_objectclass'] = 'objectClass für Kurssuche in LDAP, normalerweise \'posixGroup\'.';
$string['enrol_ldap_roles'] = 'Rollenabbildung';
$string['enrol_ldap_search_sub'] = 'Suche Gruppenmitgliedschaften in Unterumgebungen.';
$string['enrol_ldap_server_settings'] = 'Einstellungen für LDAP-Server';
$string['enrol_ldap_student_contexts'] = 'Liste der Umgebungen, in denen sich Gruppen mit Teilnehmer/innen befinden. Mehrere Umgebungen werden durch Semikolon getrennt: \'ou=courses,o=org; ou=others,o=org\'';
$string['enrol_ldap_student_memberattribute'] = 'LDAP-Attribut, das kennzeichnet, dass ein/e Nutzer/in zu einer Gruppe gehört (eingeschrieben ist), normalerweise \'member\' oder memberUid\'.';
$string['enrol_ldap_student_settings'] = 'Einstellungen für Teilnehmer/innen';
$string['enrol_ldap_teacher_contexts'] = 'Liste der Umgebungen, in denen sich Gruppen mit Trainer/innen befinden. Mehrere Umgebungen werden durch Semikolon getrennt: \'ou=courses,o=org; ou=others,o=org\'';
$string['enrol_ldap_teacher_memberattribute'] = 'LDAP-Attribut, das kennzeichnet, dass ein/e Nutzer/in zu einer Gruppe gehört (eingeschrieben ist), normalerweise \'member\' oder memberUid\'.';
$string['enrol_ldap_teacher_settings'] = 'Einstellungen für Trainer/innen';
$string['enrol_ldap_template'] = 'Optional: Automatisch angelegte Kurse können ihre Kurseinstellungen aus einer Kursvorlage kopieren. Tragen Sie hier die Kurzbezeichnung dieser Kursvorlage ein.';
$string['enrol_ldap_updatelocal'] = 'Lokale Daten aktualisieren';
$string['enrol_ldap_version'] = 'Version des LDAP-Protokolls auf Ihrem Server';
$string['enrolname'] = 'LDAP';

?>
