<?PHP // $Id: debug.php,v 1.15 2010/03/19 09:37:20 krause Exp $ 
      // debug.php - created with Moodle 2.0 dev (Build: 20100220) (2010021900)


$string['authpluginnotfound'] = 'Plugin $a zur Authentifierung nicht gefunden';
$string['blocknotexist'] = 'Der Block $a existiert nicht!';
$string['cannotbenull'] = '$a darf nicht Null sein!';
$string['cannotdowngrade'] = 'Ein Downgrade von $a->oldversion nach $a->newversion ist nicht möglich.';
$string['cannotfindadmin'] = 'Es konnte kein Admin-Nutzer gefunden werden!';
$string['cannotinitpage'] = 'Die Seite konnte nicht vollständig initialisiert werden. Ungültige $a->name ID $a->id';
$string['cannotsetuptable'] = '$a Tabellen konnten nicht erfolgreich erstellt werden!';
$string['codingerror'] = 'Fehler in der Kodierung gefunden, den nur ein Programmierer korrigieren kann: $a';
$string['configmoodle'] = 'Moodle ist bisher noch nicht konfiguriert. Sie müssen zuerst die Datei config.php bearbeiten.';
$string['erroroccur'] = 'Ein Fehler ist während des Vorgangs aufgetreten.';
$string['fixsetting'] = 'Bitte korrigieren Sie die Einstellungen in der Datei config.php: <p>Aktuell vorhanden: </p> <p>&#36;CFG->dirroot = \"$a->current\";</p> <p>aber das sollte geändert werden in: </p> <p>&#36;CFG->dirroot = \"$a->found\"</p>';
$string['invalidarraysize'] = 'Falsche Feldgröße bei den Einstellungen von $a';
$string['invalideventdata'] = 'Falscher Kalendereintrag übermittelt: $a';
$string['invalidparameter'] = 'Die Ausführung wird abgebrochen, weil ein ungültiger Parameterwert gefunden wurde.';
$string['invalidresponse'] = 'Die Ausführung wird abgebrochen, weil ein ungültiger Rückgabewert gefunden wurde.';
$string['missingconfigversion'] = 'Der Vorgang wird abgebrochen, weil die Konfigurationstabelle keine Versionsangabe beinhaltet.';
$string['modulenotexist'] = 'Modul $a existiert nicht';
$string['morethanonerecordinfetch'] = 'Mehr als einen Datensatz in  fetch() gefunden!';
$string['mustbeoveride'] = 'Die Methode $a muss außer Kraft gesetzt werden.';
$string['noactivityname'] = 'Seitenobjekt von page_generic_activity legte keine \$this->activityname Bezeichung fest.';
$string['noadminrole'] = 'Es konnte keine Admin-Rolle gefunden werden';
$string['noblocks'] = 'Keine Blocks installiert!';
$string['nocate'] = 'Keine Kursbereiche!';
$string['nomodules'] = 'Keine Module gefunden!';
$string['nopageclass'] = 'Importierte $a, fand aber keine page classes.';
$string['noreports'] = 'Kein Zugriff auf Berichte';
$string['notables'] = 'Keine Tabellen!';
$string['phpvaroff'] = 'Die PHP Server Variable \'$a->name\' sollte auf  Off - $a->link gesetzt werden.';
$string['phpvaron'] = 'Die PHP Server Variable \'$a->name\' sollte auf  On - $a->link gesetzt werden.';
$string['sessionmissing'] = '$a Objekt fehlt für Session';
$string['sqlrelyonobsoletetable'] = 'Dieses SQL beinhaltet fehlerhafte Tabellen: $a! Ein Entwickler muss Ihren Code korrigieren.';
$string['withoutversion'] = 'Im Hauptverzeichnis ist version.php nicht lesbar oder nicht vorhanden.';
$string['xmlizeunavailable'] = 'xmlize-Funktionen sind nicht verfügbar.';
$string['cannotcreateadminuser'] = 'Schwerer Fehler: Der Datensatz für den Admin-Nutzer konnte nicht angelegt werden!'; // ORPHANED
$string['cannotsetupsite'] = 'Schwerwiegender Fehler: Die Website konnte nicht eingerichtet werden!'; // ORPHANED
$string['cannotupdaterelease'] = 'Fehler: Die Release-Version der Datenbank konnte nicht aktualisiert werden!'; // ORPHANED
$string['cannotupdateversion'] = 'Die Aktualisierung ist fehlgeschlagen! In der Konfigurationstabelle konnte die Version nicht aktualisiert werden.'; // ORPHANED
$string['cannotupgradecapabilities'] = 'Es sind Schwierigkeiten bei der Aktualisierung der Kernregeln für das Rollensystem aufgetreten.'; // ORPHANED
$string['cannotupgradedbcustom'] = 'Anpassung der Einträge in der lokalen Datenbank beim Upgrade konnte nicht durchgeführt werden. (Versionseintrag in config-Tabelle)'; // ORPHANED
$string['dbnotinsert'] = 'Datenbankfehler - \"$a\" konnte nicht eingefügt werden.'; // ORPHANED
$string['dbnotsetup'] = 'Fehler: Die Datenbank wurde nicht erfolgreich angelegt.'; // ORPHANED
$string['dbnotsupport'] = 'Fehler: Ihre Datenbank ($a) wird nicht vollständig von Moodle unterstützt. Eventuell ist die install.xml nicht verfügbar. Kontrollieren Sie das Verzeichnis lib/db.'; // ORPHANED
$string['dbnotupdate'] = 'Datenbankfehler - \"$a\" konnte nicht aktualisiert werden.'; // ORPHANED
$string['doesnotworkwitholdversion'] = 'Dieses Script arbeitet nicht mit dieser alten Version von Moodle.'; // ORPHANED
$string['noblockbase'] = 'Die Klasse block_base ist nicht definiert oder eine Datei für /blocks/moodleblock.class.php  kann nicht gefunden werden.'; // ORPHANED
$string['nocaps'] = 'Fehler: keine Fähigkeiten definiert!'; // ORPHANED
$string['siteisnotdefined'] = 'Site ist nicht festgelegt!'; // ORPHANED
$string['upgradefail'] = 'Aktualisierung fehlgeschlagen!'; // ORPHANED
$string['prefixcannotbeempty'] = 'Der Prefix für die Tabellen \"$a[0]\" der Ziel-DB ($a[1]) kann nicht leer sein.'; // ORPHANED
$string['prefixlimit'] = 'Die Länge des Tabellen-Prefix \"$a\" für Oracle Datenbanken darf höchstens 2cc sein.'; // ORPHANED

?>
