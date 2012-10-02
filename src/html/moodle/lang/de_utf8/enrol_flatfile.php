<?PHP // $Id$ 
      // enrol_flatfile.php - created with Moodle 1.6.3 (2006050530)


$string['description'] = 'Dieses Kurs-Anmeldeverfahren nutzt eine speziell formatierte Textdatei, die in einem von Ihnen angegebenen Verzeichnis abgelegt ist. Die Datei muss vier oder sechs Felder pro Zeile haben, die Felder sind durch Komma getrennt. Die Zeilen haben folgende Struktur:
<pre>
* operation, role, idnumber(user), idnumber(course) [, starttime, endtime]
mit:
* operation = add | del
* role = student | teacher | teacheredit
* idnumber(user) = Nutzer-ID-Nummer (aus der Tabelle \'user\')
* idnumber(course) = Kurs-ID-Nummer (aus der Tabelle \'course\')
* starttime = start time (in Sekunden seit epoch) - optional
* endtime = end time (in Sekunden seit epoch) - optional
</pre>

Die Datei kann z.B. so aussehen:
<pre>
add, student, 5, CF101
add, teacher, 6, CF101
add, teacheredit, 7, CF101
del, student, 8, CF101
del, student, 17, CF101
add, student, 21, CF101, 1091115000, 1091215000
</pre>';
$string['enrolname'] = 'Textdatei';
$string['filelockedmail'] = 'Die Textdatei ($a), die für dieses Kurs-Anmeldeverfahren genutzt wurde, kann nicht durch den Cron-Prozess gelöscht werden. Dies ist meist der Fall, wenn die Dateizugriffsrechte nicht richtig gesetzt sind. Bitte ändern Sie die Zugriffsrechte so, dass Moodle die Datei löschen kann. Andernfalls wird die Datei mit jedem Cron-Prozess wieder ausgeführt.';
$string['filelockedmailsubject'] = 'Schwerwiegender Fehler:  Datei für Kursanmeldung';
$string['location'] = 'Angabe des Verzeichnisses, in dem die Datei abgelegt ist';
$string['mailadmin'] = 'Administrator/in  per E-Mail benachrichtigen';
$string['mailusers'] = 'Teilnehmer/innen per E-Mail benachrichtigen';

?>
