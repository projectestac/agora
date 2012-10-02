<?PHP // $Id$ 
      // enrol_database.php - created with Moodle 2.0 dev (Build: 20090109) (2009010801)


$string['autocreate'] = 'Kurse können automatisch angelegt werden, wenn es Anmeldungen zu einem Kurs gibt, der noch nicht in Moodle existiert.';
$string['autocreation_settings'] = 'Einstellungen für automatisiertes Anlegen von Kursen';
$string['category'] = 'Kursbereich für automatisch angelegte Kurse';
$string['course_fullname'] = 'Name des Feldes für den vollständigen Kursnamen';
$string['course_id'] = 'Feldname für die Kurs-ID-Nummer
<br/>Die Werte dieses Feldes werden mit dem Feld \"enrol_db_l_coursefield\" der Kurstabelle von Moodle abgeglichen.';
$string['course_shortname'] = 'Name des Feldes für die Kurzbezeichnung des Kurses';
$string['course_table'] = 'Name der externen Tabelle mit den Detailinformationen zum Kurs (Kurs-ID-Nummer, vollständiger Name, Kurzbezeichnung, etc.)';
$string['dbhost'] = 'Server IP Name oder Nummer';
$string['dbname'] = 'Datenbankname';
$string['dbpass'] = 'Serverpasswort';
$string['dbtable'] = 'Datenbanktabelle';
$string['dbtype'] = 'Datenbanktyp';
$string['dbuser'] = 'Servernutzer';
$string['defaultcourseroleid'] = 'Diese Rolle wird standardmäßig zugewiesen, falls keine Rolle ausgewählt. wird';
$string['description'] = 'Sie können eine externe Datenbank (fast jeder Art) verwenden, um die Anmeldung von Teilnehmer/innen in Kursen zu verwalten. Es wird vorausgesetzt, dass die Datenbank ein Feld für die Kurs-ID-Nummer und ein Feld für die Nutzer-ID-Nummer enthält. Diese Felder werden gegen die entsprechenden Felder in der (lokalen) Kurstabelle bzw. der (lokalen) Nutzertabelle von Moodle geprüft.';
$string['disableunenrol'] = 'Wenn Sie diese Einstellung aktivieren, werden Nutzer/innen ohne Datenbank-Bezug nicht ausgetragen, wenn sie bereits vorher mit dem externen Datenbank-Plugin eingeschrieben wurden.';
$string['enrol_database_autocreation_settings'] = 'Automatische Anlage neuer Kurse';
$string['enrolname'] = 'Externe Datenbank';
$string['general_options'] = 'Allgemeine Einstellungen';
$string['host'] = 'Name des Datenbank-Servers';
$string['ignorehiddencourse'] = 'Wenn diese Einstellung auf \"ja\" gesetzt ist, dann werden Nutzer/innen nicht in Kursen eingeschrieben, die für Teilnehmer/innen nicht verfügbar sind.';
$string['local_fields_mapping'] = 'Moodle-Datenbankfelder (lokal)';
$string['localcoursefield'] = 'Name des Feldes in der Kurstabelle (course) zum Abgleich mit der Remote-Datenbank (z.B. idnumber).';
$string['localrolefield'] = 'Name des Feldes in der Rollentabelle (roles) zum Abgleich mit der Remote-Datenbank (z.B. Kurzname).';
$string['localuserfield'] = 'Name des Feldes in der Nutzertabelle (user) zum Abgleich mit der Remote-Datenbank (z.B. idnumber).';
$string['name'] = 'Spezifische Datenbank, die verwendet werden soll';
$string['pass'] = 'Kennwort für Zugriff auf den Datenbank-Server';
$string['remote_fields_mapping'] = 'Datenbankfelder (extern)';
$string['remotecoursefield'] = 'Name des Feldes in der Remote-Tabelle zum Abgleich mit der Kurstabelle.';
$string['remoterolefield'] = 'Name des Feldes in der Remote-Tabelle zum Abgleich mit der Rollentabelle.';
$string['remoteuserfield'] = 'Name des Feldes in der Remote-Tabelle zum Abgleich mit der Nutzertabelle.';
$string['server_settings'] = 'Einstellungen für den externen Datenbank-Server';
$string['student_coursefield'] = 'Name des Feldes in der externen Tabelle für Teilnehmeranmeldungen, in dem die Kurs-ID-Nummer zu finden ist';
$string['student_l_userfield'] = 'Name des Feldes in der lokalen Nutzertabelle von Moodle, das zum Abgleich mit dem Nutzer-Datensatz in der externen Tabelle für Teilnehmeranmeldungen verwendet werden soll (z.B. idnumber)';
$string['student_r_userfield'] = 'Name des Feldes in der externen Tabelle für Teilnehmeranmeldungen, in dem die Nutzer-ID-Nummer zu finden ist';
$string['student_table'] = 'Name der externen Tabelle, in der Teilnehmeranmeldungen gespeichert werden';
$string['teacher_coursefield'] = 'Name des Feldes in der externen Tabelle für Trainereinträge, in dem die Kurs-ID-Nummer zu finden ist';
$string['teacher_l_userfield'] = 'Name des Feldes in der lokalen Nutzertabelle des Moodle-Systems, das zum Abgleich mit dem Nutzer-Datensatz in der externen Tabelle für Trainereinträge verwendet werden soll (z.B. idnumber)';
$string['teacher_r_userfield'] = 'Name des Feldes in der externen Tabelle für Traineranmeldungen, in dem die Nutzer-ID-Nummer zu finden ist';
$string['teacher_table'] = 'Name der externen Tabelle, in der Trainereinträge gespeichert werden';
$string['template'] = 'Optional: Automatisch angelegte Kurse können ihre Kurseinstellungen aus einer Kursvorlage kopieren.  übernehmen. Tragen Sie hier die Kurzbezeichnung dieser Kursvorlage ein.';
$string['type'] = 'Datenbank-Server-Typ';
$string['user'] = 'Nutzername für Zugriff auf den Datenbank-Server';
$string['local_coursefield'] = 'Name des Feldes in der lokalen Kurstabelle von Moodle, das zum Abgleich mit Einträgen in der externen Datenbank verwendet werden soll (z.B. idnumber)'; // ORPHANED

?>
