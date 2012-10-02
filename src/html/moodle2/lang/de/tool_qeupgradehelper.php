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
 * Strings for component 'tool_qeupgradehelper', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   tool_qeupgradehelper
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Aktion';
$string['alreadydone'] = 'Es wurde alles konvertiert';
$string['areyousure'] = 'Sind Sie sicher?';
$string['areyousuremessage'] = 'Wollen Sie mit dem Upgrade aller {$a->numtoconvert} Versuche im Test \'{$a->name}\' im Kurs {$a->shortname} fortfahren?';
$string['areyousureresetmessage'] = 'Test \'{$a->name}\' im Kurs {$a->shortname} hat {$a->totalattempts} Versuche.  {$a->convertedattempts} Versuche werden vom alten System aktualisiert. Davon können {$a->resettableattempts} später zurückgesetzt werden. Wollen Sie nun fortfahren?';
$string['attemptstoconvert'] = 'Versuche, die konvertiert werden müssen';
$string['backtoindex'] = 'Zurück zur Hauptseite';
$string['conversioncomplete'] = 'Konvertierung beendet';
$string['convertattempts'] = 'Versuche konvertieren';
$string['convertedattempts'] = 'Konvertierte Versuche';
$string['convertquiz'] = 'Versuche werden konvertiert...';
$string['cronenabled'] = 'Cron aktiviert';
$string['croninstructions'] = 'Sie können den Cron-Job damit beauftragen das Update automatisch nach und nach durchzuführen. Mit jeder Ausführung ds Cron-Jobs wird dann ein weiterer Teilschritt der Testfragenversuchskonvertierung durchgeführt bis die festgelegte Zeitgrenze erreicht ist. Dieser Prozess hat Vorrang vor anderen Cron-job Aufgaben bis das Update für alle Testfragenversuche abgeschlossen ist.';
$string['cronprocesingtime'] = 'Prozesslaufzeit für jeden Cron-Job';
$string['cronsetup'] = 'Cron konfigurieren';
$string['cronsetup_desc'] = 'Sie können die Cron-Einstellungen automatisch anpassen, um das Upgrade der Testversuche abzuschließen.';
$string['cronstarthour'] = 'Beginn';
$string['cronstophour'] = 'Ende';
$string['extracttestcase'] = 'Testfall extrahieren';
$string['extracttestcase_desc'] = 'Beispieldaten aus der Datenbank für Unit-Test des Updates verwenden.';
$string['gotoindex'] = 'Zurück zur Liste der Tests, die upgedatet werden können';
$string['gotoquizreport'] = 'Zum Bericht für diesen Test: Prüfung des Updates';
$string['gotoresetlink'] = 'Zur Liste der Tests, die zurückgesetzt werden können';
$string['includedintheupgrade'] = 'In Update einfügen?';
$string['invalidquizid'] = 'Ungültige Test-ID. Entweder existiert der Test nicht oder es gibt keine Versuche zum Konvertieren.';
$string['listpreupgrade'] = 'Tests und Versuche auflisten';
$string['listpreupgrade_desc'] = 'Zeigt einen Bericht über alle Tests und die darin gemachten Testversuche von Teilnehmern. Damit erhalten Sie eine Vorstellung vom Umfang des Updates.';
$string['listpreupgradeintro'] = 'Dies ist die Zahl der Testversuche, die bei einem Update der Seite bearbeitet werden müssen. Einige zehntausend Testversuche sind kein Problem. Liegt die Zahl jedoch deutlich darüber müssen Sie mit einer längeren Updatedauer rechnen.';
$string['listtodo'] = 'Tests auflisten, die noch aktualisiert werden';
$string['listtodo_desc'] = 'Zeigt einen Bericht über alle Tests im Moodle-System, deren Testversuche noch für die neue Testfragenengine aktualisiert werden müssen.';
$string['listtodointro'] = 'Übersicht über alle Tests mit Testversuchsdaten, die noch konvertiert werden müssen. Mit dem Link können Sie die Konvertierung der Testversuche starten.';
$string['listupgraded'] = 'Bereits aktualisierte Tests auflisten, die zurückgesetzt werden können';
$string['listupgraded_desc'] = 'Zeigt einen Bericht über alle Tests deren Testversuche upgedatet wurden, wo alte Testversuche zu finden sind, um sie zurückzusetzen und das Update erneut auszuführen.';
$string['listupgradedintro'] = 'Übersicht über alle Tests, deren Testversuche upgedatet wurden, bei denen aber alte Testdaten zurückzusetzen sind, um das Update erneut auszuführen.';
$string['noquizattempts'] = 'In Ihrem System gibt es keine Testversuche.';
$string['nothingupgradedyet'] = 'Keine aktualisierten Versuche zum Zurücksetzen';
$string['notupgradedsiterequired'] = 'Dieses Script kann nur arbeiten, bevor die Website aktualisiert wurde';
$string['numberofattempts'] = 'Zahl der Testversuche';
$string['oldsitedetected'] = 'Die Seite wurde noch nicht aktualisiert, um die neue Testfragenengine einzubinden.';
$string['outof'] = '{$a->some} von {$a->total}';
$string['pluginname'] = 'Testfragen-Update';
$string['pretendupgrade'] = 'Führen Sie einen Testdurchlauf für das Update der Testversuche durch';
$string['pretendupgrade_desc'] = 'Das Update führt folgende Dinge durch: Existierende Daten der Datenbank laden; umwandeln; umgewandelte Daten in Datenbank schreiben. Der Test prüft die ersten beiden Schritte.';
$string['questionsessions'] = 'Fragensessions';
$string['quizid'] = 'Test-ID';
$string['quizupgrade'] = 'Testupgradestatus';
$string['quizzesthatcanbereset'] = 'Die folgenden Tests haben konvertierte Versuche, die zurückgesetzt werden können.';
$string['quizzestobeupgraded'] = 'Alle Tests mit Versuchen';
$string['quizzeswithunconverted'] = 'Die folgenden Tests haben Versuche, die konvertiert werden müssen.';
$string['resetcomplete'] = 'Vollständig zurücksetzen';
$string['resetquiz'] = 'Versuche zurücksetzen...';
$string['resettingquizattempts'] = 'Testversuche werden zurückgesetzt';
$string['resettingquizattemptsprogress'] = 'Versuch {$a->done} / {$a->outof} wird zurückgesetzt';
$string['upgradedsitedetected'] = 'Vermutlich wurde diese Seite upgedatet, um die neue Testfragenengine einzubinden.';
$string['upgradedsiterequired'] = 'Das Skript kann erst ausgelöst werden nachdem das Moodle-System upgedatet wurde.';
$string['upgradingquizattempts'] = 'Update der Versuche für Test \'{$a->name}\' im Kurs {$a->shortname}';
$string['veryoldattemtps'] = 'Ihre Website enthält {$a} sehr alte Testversuche, die seit Moodle 1.4/1.5 nicht aktualisiert wurden. Diese Testversuche müssen zunächst \'in Ordnung\' gebracht werden, bevor das Upgrade fortgesetzt wird. Das dauert eine Weile.';
