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
 * Strings for component 'checklist', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   checklist
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcomments'] = 'Kommentar hinzufügen';
$string['additem'] = 'Hinzufügen';
$string['additemalt'] = 'Ein neues Element in die Liste einfügen';
$string['additemhere'] = 'Ein neues Element nach diesem einfügen';
$string['addownitems'] = 'Eigene Elemente hinzufügen';
$string['addownitems-stop'] = 'Hinzufügen der eigenen Elemente beenden';
$string['allowmodulelinks'] = 'Modul-Links aktivieren';
$string['anygrade'] = 'Beliebig';
$string['autopopulate'] = 'Kursmodule in Fortschrittsliste anzeigen';
$string['autopopulate_help'] = 'Hiermit wird automatisch eine Liste der Arbeitsmaterialien und Aktivitäten des aktuellen Kurses zur Fortschrittsliste hinzugefügt.<br />
Nach Kursänderungen kann diese Liste aktualisiert werden, wenn Sie die \'Bearbeiten\'-Seite der Fortschrittsliste besuchen.<br />
Elemente der Liste können verborgen werden, indem Sie das danebenstehende \'Verbergen\'-Symbol anklicken.<br />
Wenn Sie die automatisch hinzugefügten Elemente wieder aus der Liste entfernen möchten, ändern Sie diese Einstellung auf \'Nein\' und klicken Sie auf \'Kurselemente entfernen\' auf der \'Bearbeiten\'-Seite.';
$string['autoupdate'] = 'Abhaken wenn Aktivitäten abgeschlossen sind';
$string['autoupdate_help'] = 'Mit dieser Einstellung können die Einträge in Ihrer Fortschrittsliste automatisch abgehakt werden wenn die zugehörige Aktivität im Kurs abgeschlossen wurde.<br />
\'Abschließen\' variiert dabei von der einen zur anderen Aktivität - ein Arbeitsmaterial \'ansehen\', einen Test oder eine Aufgabe \'einreichen\', in einem Forum eine Nachricht \'schreiben\' oder an einem Chat \'teilnehmen\' etc.<br />
Wenn die Abschlussverfolgung (Moodle 2.0) für eine Aktivität aktiviert ist, wird diese genutzt um die Aktivität in der Fortschrittsliste abzuhaken.<br />
Bei Detailfragen, wann genau eine Aktivität als \'abgeschlossen\' markiert wird, bitten Sie bitte Ihren Administrator in die Datei \'mod/checklist/autoupdate.php\' zu sehen.<br />
Hinweis: Es kann bis zu 60 Sekunden dauern bis die Aktivität in der Fortschrittsliste eines Teilnehmers abgehakt ist.';
$string['autoupdatenote'] = 'Der Eintrag für "Teilnehmer" wird automatisch abgehakt - auf "Nur Lehrer"-Fortschrittslisten werden keine automatischen Änderungen vorgenommen';
$string['autoupdatewarning_both'] = 'Auf dieser Fortschrittsliste sind Elemente, die automatisch abgehakt werden (wenn Teilnehmer die entsprechende Aktivität abschließen). Da dies aber eine \'Teilnehmer-Lehrer\'-Fortschrittsliste ist, wird der Fortschrittsbalken erst dann aktualisiert, wenn der Lehrer die Kennzeichnungen freigibt.';
$string['autoupdatewarning_student'] = 'Auf dieser Fortschrittsliste sind Elemente, die automatisch abgehakt werden (wenn Teilnehmer die entsprechende Aktivität abschließen).';
$string['autoupdatewarning_teacher'] = 'Das automatische Abhaken wurde für diese Fortschrittsliste aktiviert. Die Kennzeichnungen werden aber nicht angezeigt, es werden nur die Kennzeichnungen der Lehrer angezeigt.';
$string['calendardescription'] = 'Dieses Ereignis wurde zu Ihrer Fortschrittsliste hinzugefügt: {$a}';
$string['canceledititem'] = 'Abbrechen';
$string['changetextcolour'] = 'Nächste Textfarbe';
$string['checkeditemsdeleted'] = 'Ausgewählte Elemente gelöscht';
$string['checklist'] = 'Fortschrittsliste';
$string['checklist:addinstance'] = 'Neue Fortschrittsliste hinzufügen';
$string['checklistautoupdate'] = 'Fortschrittsliste soll automatisch aktualiert werden';
$string['checklist:edit'] = 'Erstellen und Bearbeiten von Fortschrittlisten';
$string['checklist:emailoncomplete'] = 'E-Mail bei Abschluss versenden';
$string['checklistfor'] = 'Lernfortschritt für';
$string['checklistintro'] = 'Einführung';
$string['checklist:preview'] = 'Vorschau Fortschrittliste';
$string['checklistsettings'] = 'Einstellungen';
$string['checklist:updatelocked'] = 'Gesperrte Kennzeichnungen aktualisieren';
$string['checklist:updateother'] = 'Aktualisieren der Teilnehmerkennzeichnung der Fortschrittslisten';
$string['checklist:updateown'] = 'Aktualisieren Ihrer Fortschrittlistenkennzeichnung';
$string['checklist:viewmenteereports'] = 'Fortschritt des Mentoren (nur-lesend) ansehen';
$string['checklist:viewreports'] = 'Teilnehmer-Fortschritt anschauen';
$string['checks'] = 'Kennzeichnungen';
$string['comments'] = 'Kommentare';
$string['completionpercent'] = 'Anteil der Elemente, die abgehakt sein müssen:';
$string['completionpercentgroup'] = 'Verpflichtendes Abhaken';
$string['configchecklistautoupdate'] = 'Bevor dies aktiviert werden kann, müssen Sie einige Änderungen im Moodle Core vornehmen, bitte lesen Sie dazu mod/checklist/README.txt';
$string['configshowcompletemymoodle'] = 'Wenn diese Einstellung deaktiviert wird, werden erledigte Fortschrittslisten auf der MyMoodle-Seite ausgeblendet';
$string['configshowmymoodle'] = 'Wenn diese Einstellung deaktiviert wird, werden Fortschrittslisten (und die Fortschrittsbalken) auf der MyMoodle-Seite ausgeblendet';
$string['confirmdeleteitem'] = 'Sind Sie sicher, dass dieses Fortschrittslisten-Element dauerthaft gelöscht werden soll?';
$string['deleteitem'] = 'Dieses Element löschen';
$string['duedatesoncalendar'] = 'Fälligkeiten zum Kalender hinzufügen';
$string['edit'] = 'Fortschrittsliste bearbeiten';
$string['editchecks'] = 'Kennzeichnungen bearbeiten';
$string['editdatesstart'] = 'Termine bearbeiten';
$string['editdatesstop'] = 'Termine bearbeiten beenden';
$string['edititem'] = 'Dieses Element bearbeiten';
$string['emailoncomplete'] = 'E-Mail versenden, wenn die Fortschrittsliste erledigt ist';
$string['emailoncompletebody'] = 'Nutzer/in {$a->user} hat die Fortschrittsliste \'{$a->checklist}\' im Kurs \'{$a->coursename}\' erledigt. Prüfen Sie die Fortschrittsliste hier:';
$string['emailoncompletebodyown'] = 'Sie haben die Fortschrittsliste \'{$a->checklist}\' im Kurs {$a->coursename}\' erledigt.
Prüfen Sie die Fortschrittsliste hier:';
$string['emailoncomplete_help'] = 'Sobald eine Fortschrittsliste erledigt ist, kann eine Benachrichtigung sowohl an Teilnehmer/innen, die sie abgeschlossen hat, als auch an alle Trainer/innen des Kurses, versendet werden.<br />
Der Administrator kann über die Berechtigung \'mod:checklist/emailoncomplete\' beeinflussen, wer die E-Mail erhält - standardmäßig sind das alle Trainer/innen mit und ohne Bearbeitungsrecht.';
$string['emailoncompletesubject'] = 'Benutzer {$a->user} hat die Fortschrittsliste \'{$a->checklist}\' erledigt';
$string['emailoncompletesubjectown'] = 'Sie haben die Fortschrittsliste \'{$a->checklist}\' erledigt.';
$string['export'] = 'Einträge exportieren';
$string['forceupdate'] = 'Kennzeichnungen für alle automatisch erstellten Einträge aktualisieren';
$string['gradetocomplete'] = 'Für den Abschluss nötige Bewertung:';
$string['guestsno'] = 'Sie haben keine Berechtigung, diese Fortschrittsliste anzusehen';
$string['headingitem'] = 'Dieses Element ist eine Überschrift - Sie wird kein Ankreuzfeld haben';
$string['import'] = 'Einträge importieren';
$string['importfile'] = 'Importdatei wählen';
$string['importfromcourse'] = 'Ganzer Kurs';
$string['importfromsection'] = 'Aktueller Abschnitt';
$string['indentitem'] = 'Element einrücken';
$string['itemcomplete'] = 'Erledigt';
$string['items'] = 'Elemente der Fortschrittsliste';
$string['linktomodule'] = 'Link zum Modul';
$string['lockteachermarks'] = 'Kennzeichnungen von Trainer/innen sperren';
$string['lockteachermarks_help'] = 'Wenn diese Einstellung aktiv ist, können Trainer/innen, sobald  einmal eine \'Ja\' Kennzeichnung vergeben wurde, diese nicht mehr ändern. Benutzer mit der Berechtigung \'mod/checklist:updatelocked\' können die Sperre übergeben und die Kennzeichnung trotzdem ändern.';
$string['lockteachermarkswarning'] = 'Hinweis: Sobald Sie diese Kennzeichnungen gespeichert haben, werden Sie \'Ja\' Kennzeichnungen nicht mehr ändern können';
$string['modulename'] = 'Fortschrittsliste';
$string['modulename_help'] = 'Die Fortschrittslistenaktivität erlaubt Trainer/innen, eine Fortschrittsliste (Todo- oder Aufgabenliste) für die Teilnehmer/innen zu erstellen, welche diese abarbeiten sollen.';
$string['modulenameplural'] = 'Fortschrittslisten';
$string['moveitemdown'] = 'Dieses Element nach unten verschieben';
$string['moveitemup'] = 'Dieses Element nach oben verschieben';
$string['noitems'] = 'Diese Fortschrittsliste enthält keine Elemente';
$string['optionalhide'] = 'Optionale Elemente ausblenden';
$string['optionalitem'] = 'Dieses Element ist optional';
$string['optionalshow'] = 'Optionale Elemente anzeigen';
$string['percentcomplete'] = 'Pflicht-Elemente';
$string['percentcompleteall'] = 'Alle Elemente';
$string['pluginadministration'] = 'Fortschrittslisten-Verwaltung';
$string['pluginname'] = 'Fortschrittsliste';
$string['preview'] = 'Vorschau';
$string['progress'] = 'Verlauf';
$string['removeauto'] = 'Kursmodul-Elemente entfernen';
$string['report'] = 'Teilnehmer Fortschritt anschauen';
$string['reporttablesummary'] = 'Die Tabelle zeigt alle Elemente auf der Fortschrittliste an, die jeder einzelne Teilnehmer abgeschlossen hat';
$string['requireditem'] = 'Dieses Element ist Pflicht - es muss erledigt werden';
$string['resetchecklistprogress'] = 'Fortschrittsliste und Benutzerelemente zurücksetzen';
$string['savechecks'] = 'Speichern';
$string['showcompletemymoodle'] = 'Erledigte Fortschrittslisten auf der MyMoodle Seite anzeigen';
$string['showfulldetails'] = 'Alle Details anzeigen';
$string['showmymoodle'] = 'Fortschrittslisten auf der MyMoodle Seite anzeigen';
$string['showprogressbars'] = 'Fortschrittsbalken anzeigen';
$string['teacheralongsidecheck'] = 'Teilnehmer/innen und Trainer/innen';
$string['teachercomments'] = 'Trainer/innen können Kommentare hinzufügen';
$string['teacherdate'] = 'Zeitpunkt, zu dem ein/e Trainer/in dieses Element zum letzten Mal aktualisiert hat';
$string['teacheredit'] = 'Aktualisiert von';
$string['teacherid'] = 'Trainer/in, der/die dieses Element zum letzten Mal aktualisiert hat';
$string['teachermarkno'] = 'Die Trainer/innen haben festgestellt, dass Sie dieses Element NICHT abgeschlossen haben.';
$string['teachermarkundecided'] = 'Die Trainer/innen haben dieses Element noch nicht bewertet';
$string['teachermarkyes'] = 'Trainer/innen tragen ein wenn Sie dieses Element erledigt haben';
$string['teachernoteditcheck'] = 'Nur Teilnehmer';
$string['teacheroverwritecheck'] = 'Nur Trainer/innen';
$string['theme'] = 'Design der Fortschrittsliste';
$string['toggledates'] = 'Termine tauschen';
$string['unindentitem'] = 'Element nicht mehr einrücken';
$string['updatecompletescore'] = 'Bewertungen speichern';
$string['updateitem'] = 'Aktualisieren';
$string['userdate'] = 'Zeitpunkt, zu dem der Teilnehmer dieses Element zum letzten Mal aktualisiert hat';
$string['useritemsallowed'] = 'Teilnehmer darf eigene Elemente hinzufügen';
$string['useritemsdeleted'] = 'Eigenes Element gelöscht';
$string['view'] = 'Fortschrittsliste ansehen';
$string['viewall'] = 'Alle Teilnehmer ansehen';
$string['viewallcancel'] = 'Abbrechen';
$string['viewallsave'] = 'Speichern';
$string['viewsinglereport'] = 'Fortschritt für diesen Benutzer ansehen';
$string['viewsingleupdate'] = 'Fortschritt für diesen Benutzer aktualisieren';
$string['yesnooverride'] = 'Ja, kann nicht übergehen';
$string['yesoverride'] = 'Ja, kann übergehen';
