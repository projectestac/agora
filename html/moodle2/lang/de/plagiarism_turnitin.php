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
 * Strings for component 'plagiarism_turnitin', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   plagiarism_turnitin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminlogin'] = 'Als Admin bei Turnitin anmelden';
$string['compareinstitution'] = 'Eingereichte Dateien mit anderen Dokumenten dieser Institution vergleichen
';
$string['compareinstitution_help'] = 'Diese Option ist nur nutzbar, wenn Sie ein eigenes Nutzerabonnement erworben haben. Stellen Sie die Option auf "Nein", wenn Sie nicht sicher sind.';
$string['compareinternet'] = 'Eingereichte Dateien mit Internetdokumenten vergleichen';
$string['compareinternet_help'] = 'Diese Option ermöglicht es, eingereichte Dateien mit Internetdokumenten zu vergleichen, die Turnitin aktuell indiziert hat.';
$string['comparejournals'] = 'Eingereichte Dateien mit Zeitschriften, Zeitschriften und Publikationen vergleichen';
$string['comparejournals_help'] = 'Diese Option ermöglicht es, eingereichte Dateien mit Zeitschriften, Zeitschriften und Publikationen zu vergleichen, die Turnitin aktuell indiziert hat.';
$string['comparestudents'] = 'Eingereichte Dateien mit Dokumenten anderer Teilnehmer/innen vergleichen';
$string['comparestudents_help'] = 'Diese Option ermöglicht es, eingereichte Dateien mit den eingereichten Dokumenten anderer Teilnehmer/innen zu vergleichen.';
$string['configdefault'] = 'Dies ist eine Voreinstellung für die Aufgabeneinstellungen. Diese Einstellung kann nur mit dem Recht \'plagiarism/turnitin:enableturnitin\' für einzelne Aufgaben geändert werden.';
$string['configusetiimodule'] = 'Turnitin-Übertragung aktivieren';
$string['defaultsdesc'] = 'Die folgenden Einstellungen wurden als Standardwerte bei der Aktivierung von Turnitin für diese Aktivität gesetzt.';
$string['defaultupdated'] = 'Turnitin-Voreinstellungen aktualisiert';
$string['draftsubmit'] = 'Zeitpunkt für die Dateiübertragung an Turnitin';
$string['excludebiblio'] = 'Literaturlisten ausschließen';
$string['excludebiblio_help'] = 'Literaturlisten können auch eingeschlossen bleiben und beim Betrachten des Ähnlichkeitsberichts ausgeblendet werden. Diese Einstellung kann mehr nicht geändert werden, sobald die erste Datei übertragen wurde.';
$string['excludematches'] = 'Kleine Übereinstimmungen ausschließen';
$string['excludematches_help'] = 'Sie können kleine Übereinstimmungen durch Prozent oder Wortanzahl auszuschließen. Wählen Sie bitte die gewünschte Art und geben Sie den Prozentsatz oder die Wortanzahl in das folgende Feld ein.';
$string['excludequoted'] = 'Zitiertes Material ausschließen';
$string['excludequoted_help'] = 'Zitiertes Material kann auch eingeschlossen bleiben und beim Betrachten des Ähnlichkeitsberichts ausgeblendet werden. Diese Einstellung kann mehr nicht geändert werden, sobald die erste Datei übertragen wurde.';
$string['file'] = 'Datei';
$string['filedeleted'] = 'Datei aus der Liste gelöscht';
$string['fileresubmitted'] = 'Datei in der Liste zur Wiedervorlage';
$string['module'] = 'Modul';
$string['name'] = 'Name';
$string['percentage'] = 'Prozent';
$string['pluginname'] = 'Turnitin Plagiatsuche';
$string['reportgen'] = 'Zeitpunkt für die Erstellung der Ähnlichkeitsberichte';
$string['reportgenduedate'] = 'Zum Abgabezeitpunkt';
$string['reportgen_help'] = 'Diese Option ermöglicht es, den Zeitpunkt für die Erstellung des Ähnlichkeitsberichts auszuwählen';
$string['reportgenimmediate'] = 'Sofort (erster Bericht ist endgültig)';
$string['reportgenimmediateoverwrite'] = 'Sofort (Berichte sind nicht endgültig)';
$string['resubmit'] = 'Wiedervorlage';
$string['savedconfigfailure'] = 'Fehler bei der Verbindung bzw. Authentifizierung zu Turnitin. Eventuell ist die Kombination von Account ID und  Secret Key falsch oder der Server kann nicht auf die API verbinden.';
$string['savedconfigsuccess'] = 'Turnitin-Einstellungen gespeichert und Trainerkonto erstellt';
$string['showstudentsreport'] = 'Ähnlichkeitsbericht für Teilnehmer/innen anzeigen';
$string['showstudentsreport_help'] = 'Der Ähnlichkeitsbericht enthält eine Aufschlüsselung, welche Teile der Vorlage plagiiert wurden und wo Turnitin diese Inhalte gefunden hat.';
$string['showstudentsscore'] = 'Ähnlichkeitswert für Teilnehmer/innen anzeigen';
$string['showstudentsscore_help'] = 'Der Ähnlichkeitswert ist der Prozentsatz, mit dem eine eingereichte Datei mit anderen Dokumenten übereinstimmt - eine hohe Punktzahl in der Regel schlecht!';
$string['showwhenclosed'] = 'Wenn die Aktivität beendet ist';
$string['similarity'] = 'Ähnlichkeit';
$string['status'] = 'Status';
$string['studentdisclosure'] = 'Teilnehmerhinweis';
$string['studentdisclosuredefault'] = 'Alle hochgeladenen Dateien werden zur Plagiatsuche an Turnitin.com übertragen.';
$string['studentdisclosure_help'] = 'Dieser Text wird allen Teilnehmer/innen bei der Dateiabgabe angezeigt.';
$string['submitondraft'] = 'Datei übertragen, sobald sie hochgeladen wurde';
$string['submitonfinal'] = 'Datei übertragen, sobald sie zur Prüfung hochgeladen wurde';
$string['teacherlogin'] = 'Als Trainer/in bei Turnitin anmelden';
$string['tii'] = 'Turnitin';
$string['tiiaccountid'] = 'Turnitin Account ID';
$string['tiiaccountid_help'] = 'Das ist Ihre Account ID, die Sie von Turnitin.com erhalten haben';
$string['tiiapi'] = 'Turnitin API';
$string['tiiapi_help'] = 'Das ist die Adresse der Turnitin API - in der Regel https://api.turnitin.com/api.asp';
$string['tiiconfigerror'] = 'Ein Konfigurationsfehler ist aufgetreten beim Versuch die Datei zu Tunitin zu senden';
$string['tiiemailprefix'] = 'Teilnehmer E-Mail-Prefix';
$string['tiiemailprefix_help'] = 'Sie müssen diese Einstellung wählen wenn Sie nicht wollen, dass Teilnehmer/innen sich auf der Turnitin Seite einloggen können und vollständige Berichte einsehen.';
$string['tiienablegrademark'] = 'Bewertung aktivieren (experimentell)';
$string['tiienablegrademark_help'] = 'Bewertung (grademark) ist ein optionales Feature in Turnitin. Es muß mit Turnitin separat vereinbart werden. Die Seiten mit den Einreichungen werden mit dieser Funktion langsamer geladen.';
$string['tiierror'] = 'Turnitin-Fehler';
$string['tiierror1007'] = 'Turnitin konnte die Datei nicht verarbeiten, weil sie zu groß ist.';
$string['tiierror1008'] = 'Fehler beim Versenden dieser Datei zu Turnitin';
$string['tiierror1009'] = 'Turnitin konnte die Datei nicht verarbeiten, weil der Dateityp nicht unterstützt wird. Gültige Dateitypen sind Microsoft Word, Adobe PDF, Postscript, Text, HTML, WordPerfect oder RTF.';
$string['tiierror1010'] = 'Turnitin konnte die Datei nicht verarbeiten, weil sie mindestens 100 Buchstaben (außer Leerzeichen oder Zeilenumbrüche) enthalten muss.';
$string['tiierror1011'] = 'Turnitin konnte die Datei nicht verarbeiten, weil  sie falsch formatiert ist und scheinbar Leerzeichen zwischen allen Buchstaben enthält.';
$string['tiierror1012'] = 'Turnitin konnte die Datei nicht verarbeiten, weil  ihre Größe die Grenzen von Turnitin überschreitet.';
$string['tiierror1013'] = 'Turnitin konnte die Datei nicht verarbeiten, weil  sie mehr als 20 Worte enthalten muss.';
$string['tiierror1020'] = 'Turnitin konnte die Datei nicht verarbeiten, weil  sie Buchstaben aus einem nicht unterstützen Zeichensatz enthält.';
$string['tiierror1023'] = 'Turnitin konnte diese PDF-Datei nicht verarbeiten. Stellen Sie sicher, dass die Datei nicht Kennwort-geschützt ist. Die Datei muss auswählbaren Text enthalten, gescannte Bilder können nicht ausgewertet werden.';
$string['tiierror1024'] = 'Turnitin konnte die Datei nicht verarbeiten. Die Datei entspricht nicht den Kriterien für ein Turnitin-gerechtes Dokument.
';
$string['tiierrorpaperfail'] = 'Turnitin konnte die Datei nicht verarbeiten';
$string['tiierrorpending'] = 'Datei zur Vorlage bei Turnitin';
$string['tiiexplain'] = 'Turnitin ist ein kommerzielles Produkt, und Sie müssen zur Nutzung ein kostenpflichtiges Abonnement bestellen. Weitere Informationen finden Sie unter <a href="http://docs.moodle.org/en/Turnitin_administration">http://docs.moodle.org/en/Turnitin_administration</a>';
$string['tiiexplainerrors'] = 'Die Seite führt alle Dateien auf, die an Turnitin zur Prüfung übergeben wurden in einen Fehler-Status aufweisen. Eine Liste der Fehlerstati finden Sie hier: <a href="http://docs.moodle.org/en/Turnitin_errors">docs.moodle.org/en/Turnitin_errors</a><br/>Wenn die Dateien zurückgesetzt werden, wird der Cron-Job versuchen die Dateien erneut an Turnitin zu übergeben.<br />Wenn die Dateien gelöscht werden, können sie nicht mehr von Turnitin geprüft werden. Es werden Trainern und Teilnehmern keine Fehler mehr angezeigt.';
$string['tiisecretkey'] = 'Turnitin Secret Key';
$string['tiisecretkey_help'] = 'Melden Sie sich bei Turnitin.com als Administrator der Website, um den Secret Key zu erhalten.';
$string['tiisenduseremail'] = 'Nutzer-E-Mail senden';
$string['tiisenduseremail_help'] = 'E-Mail an jeden Teilnehmer senden, der im Turnitin System angelegt wird mit einem Link zum Login und einem temporären Kennwort.';
$string['turnitin'] = 'Turnitin';
$string['turnitin_attemptcodes'] = 'Fehlercodes für die automatische Wiedervorlage';
$string['turnitin_attemptcodes_help'] = 'Fehlercodes, die Turnitin in der Regel akzeptiert für einen 2. Versuch (Änderungen dieses Feldes können eine erhebliche Serverlast verursachen)';
$string['turnitin_attempts'] = 'Anzahl der Wiederholungen';
$string['turnitin_attempts_help'] = 'Anzahl der Wiederholungen der Neueinreichung bei Turnitin. Der Wert \'1\' bedeutet es wird ein weiteres/zweites Mal versucht, die Daten einzureichen.';
$string['turnitindefaults'] = 'Turnitin-Voreinstellungen';
$string['turnitin:enable'] = 'Trainer/innen erlauben, Turnitin innerhalb eines Moduls zu aktivieren/deaktivieren';
$string['turnitinerrors'] = 'Turnitin-Fehler';
$string['turnitin_institutionnode'] = 'Institutionskonto aktivieren';
$string['turnitin:viewfullreport'] = 'Trainer/innen erlauben, den vollständigen Ähnlichkeitsbericht von Turnitin zu sehen';
$string['turnitin:viewsimilarityscore'] = 'Trainer/innen erlauben, den ermittelten Ähnlichkeitswert von Turnitin zu sehen';
$string['useturnitin'] = 'Turnitin aktivieren';
$string['wordcount'] = 'Wortanzahl';
