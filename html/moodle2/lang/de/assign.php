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
 * Strings for component 'assign', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Sie haben Aufgaben, die Ihre Bearbeitung erfordern.';
$string['addsubmission'] = 'Abgabe hinzufügen';
$string['allowsubmissions'] = 'Nutzer/innen erlauben, für diese Aufgabe weiter Lösungen abzugeben';
$string['allowsubmissionsanddescriptionfromdatesummary'] = 'Die Aufgabendetails und die Lösungsabgabe stehen zur Verfügung ab <strong>{$a}</strong>';
$string['allowsubmissionsfromdate'] = 'Abgabebeginn';
$string['allowsubmissionsfromdate_help'] = 'Wenn diese Option aktiviert ist, können Lösungen nicht vor diesem Zeitpunkt abgegeben werden. Wenn diese Option deaktiviert ist, ist die Abgabe sofort möglich.';
$string['allowsubmissionsfromdatesummary'] = 'Abgabe möglich ab <strong>{$a}</strong>';
$string['allowsubmissionsshort'] = 'Abgabeänderung erlauben';
$string['alwaysshowdescription'] = 'Beschreibung immer anzeigen';
$string['alwaysshowdescription_help'] = 'Wenn diese Option deaktiviert ist, wird die Aufgabenbeschreibung für Teilnehmer/innen nur während des Abgabezeitraums angezeigt.';
$string['applytoteam'] = 'Bewertungen und Feedback der gesamten Gruppe zuweisen.';
$string['assign:addinstance'] = 'Aufgabe hinzufügen';
$string['assign:exportownsubmission'] = 'Eigene Abgabe exportieren';
$string['assignfeedback'] = 'Feedback Plugin';
$string['assignfeedbackpluginname'] = 'Feedback Plugin';
$string['assign:grade'] = 'Aufgabe bewerten';
$string['assign:grantextension'] = 'Erweiterung zulassen';
$string['assignmentisdue'] = 'Der Abgabetermin ist vorbei';
$string['assignmentmail'] = '{$a->grader} hat Ihnen ein Feedback zur Ihrer Aufgabenlösung für  \'{$a->assignment}\' bereitgestellt. Mit dem folgenden Link können Sie direkt darauf zugreifen: {$a->url}';
$string['assignmentmailhtml'] = '{$a->grader} hat Ihnen ein Feedback zur Ihrer Aufgabenlösung für \'<i>{$a->assignment}</i>\' bereitgestellt.<br /><br /> Mit dem folgenden Link können Sie direkt darauf zugreifen: <a href="{$a->url}">Link zu Ihrer Lösung und zum Feedback</a>.';
$string['assignmentmailsmall'] = '{$a->grader} hat Ihnen ein Feedback zur Ihrer Aufgabenlösung für  \'{$a->assignment}\' bereitgestellt. Mit dem folgenden Link können Sie direkt darauf zugreifen: {$a->url}';
$string['assignmentname'] = 'Name der Aufgabe';
$string['assignmentplugins'] = 'Aufgabentypen';
$string['assignmentsperpage'] = 'Aufgaben pro Seite';
$string['assign:revealidentities'] = 'Teilnehmeridentität anzeigen';
$string['assignsubmission'] = 'Abgabetyp';
$string['assignsubmissionpluginname'] = 'Abgabetyp';
$string['assign:submit'] = 'Aufgabe abgeben';
$string['assign:view'] = 'Aufgabe ansehen';
$string['availability'] = 'Verfügbarkeit';
$string['backtoassignment'] = 'Zurück zur Aufgabe';
$string['batchoperationconfirmgrantextension'] = 'Terminverlängerung für die ausgewählten Abgaben gewähren?';
$string['batchoperationconfirmlock'] = 'Ausgewählte Abgaben sperren?';
$string['batchoperationconfirmreverttodraft'] = 'Ausgewählte Abgaben in den Entwurfsmodus zurücksetzen?';
$string['batchoperationconfirmunlock'] = 'Ausgewählte Abgaben freigeben?';
$string['batchoperationlock'] = 'Abgaben sperren';
$string['batchoperationreverttodraft'] = 'Abgaben in den Entwurfsmodus zurücksetzen';
$string['batchoperationsdescription'] = 'Mit Auswahl...';
$string['batchoperationunlock'] = 'Abgaben freigeben';
$string['blindmarking'] = 'Anonyme Bewertung';
$string['blindmarking_help'] = 'Die anonyme Bewertung verbirgt den Teilnehmernamen während der Bewertung. Die Einstelloption wird geblockt, sobald die erste Bewertung vorgenommen wurde.';
$string['changegradewarning'] = 'In dieser Aufgabe sind bereits Lösungen bewertet worden. Bei einer Änderung der Bewertungsskala sind Neuberechnungen der Bewertungen erforderlich. Sie müssen ggfs. die Neuberechnung gesondert starten.';
$string['choosegradingaction'] = 'Bewertungsvorgang';
$string['chooseoperation'] = 'Operation wählen';
$string['comment'] = 'Kommentar';
$string['completionsubmit'] = 'Teilnehmer/in muss Lösung eingereicht haben, um Aktivität abzuschließen';
$string['configshowrecentsubmissions'] = 'Alle können Mitteilungen zur Aufgabenabgabe im Aktivitätenbericht sehen';
$string['confirmbatchgradingoperation'] = 'Möchten Sie für {$a->count} Nutzer/innen die Operation {$a->operation} ausführen?';
$string['confirmsubmission'] = 'Wenn Sie nun Ihre Lösung zur Bewertung einreichen, können Sie keine Änderungen mehr vornehmen. Sind Sie sich sicher?';
$string['conversionexception'] = 'Die Aufgabe konnte nicht konvertiert werden. {$a}';
$string['couldnotconvertgrade'] = 'Die Aufgabenbewertung für \'{$a}\' konnte nicht konvertiert werden.';
$string['couldnotconvertsubmission'] = 'Die Aufgabenabgabe für \'{$a}\' konnte nicht konvertiert werden.';
$string['couldnotcreatecoursemodule'] = 'Das Kursmodul konnte nicht angelegt werden.';
$string['couldnotcreatenewassignmentinstance'] = 'Die neue Aufgabeninstanz konnte nicht angelegt werden.';
$string['couldnotfindassignmenttoupgrade'] = 'Die alte Aufgabeninstanz konnte nicht gefunden werden, um sie zu aktualisieren.';
$string['currentgrade'] = 'Aktuelle Bewertung';
$string['cutoffdate'] = 'Letzter Abgabetermin';
$string['cutoffdatefromdatevalidation'] = 'Der letzte Abgabetermin muss nach dem Abgabestart liegen.';
$string['cutoffdate_help'] = 'Diese Funktion sperrt die Abgabe von Lösungen ab diesem Termin, sofern keine Terminverlängerung gewährt wird.';
$string['cutoffdatevalidation'] = 'Der letzte Abgabetermin muss nach der erstmöglichen Abgabe liegen.';
$string['defaultplugins'] = 'Standardmäßige Aufgabeneinstellungen';
$string['defaultplugins_help'] = 'Diese Einstellungen legen Vorgaben für alle neuen Aufgaben fest.';
$string['defaultteam'] = 'Standard-Gruppe';
$string['deleteallsubmissions'] = 'Alle Abgaben löschen';
$string['deletepluginareyousure'] = 'Möchten Sie das Plugin \'{$a}\' wirklich löschen?';
$string['deletepluginareyousuremessage'] = 'Sie sind dabei, das Plugin \'{$a}\' vollständig zu löschen. Dieser Vorgang löscht gleichzeitig alle Einträge aus der Datenbank, die mit dem Plugin zusammenhängen. Sind Sie sicher, dass der Vorgang fortgesetzt werden soll?';
$string['deletingplugin'] = 'Plugin \'{$a}\' wird gelöscht';
$string['description'] = 'Beschreibung';
$string['downloadall'] = 'Alle Abgaben herunterladen';
$string['duedate'] = 'Abgabetermin';
$string['duedate_help'] = 'Zum Abgabetermin wird die Aufgabe fällig. Wenn spätere Abgaben erlaubt sind, wird jede nach diesem Datum eingereichte Abgabe als verspätet markiert. Um eine Abgabe nach einem bestimmten Verspätungsdatum  zu verhindern kann ein endgültiges Abgabedatum gesetzt werden.';
$string['duedateno'] = 'Kein Abgabetermin';
$string['duedatereached'] = 'Der Abgabetermin für diese Aufgabe ist vorbei.';
$string['duedatevalidation'] = 'Der Abgabetermin muss später als der Abgabebeginn sein';
$string['editaction'] = 'Aktivitäten...';
$string['editingstatus'] = 'Bearbeitungsstatus';
$string['editsubmission'] = 'Meine Lösung bearbeiten';
$string['enabled'] = 'Aktiviert';
$string['errornosubmissions'] = 'Keine Abgaben zum Herunterladen verfügbar';
$string['errorquickgradingvsadvancedgrading'] = 'Die Aufgabe verwendet das erweiterte Bewertungsschema. Daher werden diese Bewertungen nun nicht abgespeichert.';
$string['errorrecordmodified'] = 'Bevor Sie die Seite aufgerufen haben, hat jemand anders einen oder mehrere Daten geändert. Daher werden Ihre Einträge nun nicht gespeichert.';
$string['extensionduedate'] = 'Erweiterung des Abgabdatums';
$string['extensionnotafterduedate'] = 'Das erweiterte Abgabedatum muss nach dem (normalen) Abgabedatum liegen.';
$string['extensionnotafterfromdate'] = 'Das erweiterte Abgabedatum muss nach Abgabedatum liegen.';
$string['feedback'] = 'Feedback';
$string['feedbackavailablehtml'] = '{$a->username} hat Ihnen ein Feedback zur Ihrer Aufgabenlösung für \'<i>{$a->assignment}</i>\' bereitgestellt.<br /><br /> Mit dem folgenden Link können Sie direkt darauf zugreifen: <a href="{$a->url}">Link zu Ihrer Lösung und zum Feedback</a>.';
$string['feedbackavailablesmall'] = '{$a->username} hat Ihnen für Ihre Lösung bei \'{$a->assignment} ein Feedback gegeben.';
$string['feedbackavailabletext'] = '{$a->username} hat Ihnen ein Feedback zur Ihrer Aufgabenlösung für  \'{$a->assignment}\' bereitgestellt. Mit dem folgenden Link können Sie direkt darauf zugreifen: {$a->url}';
$string['feedbackplugin'] = 'Feedback Plugin';
$string['feedbackpluginforgradebook'] = 'Plugin zur Übertragung von Feedback in den Bewertungsbereich';
$string['feedbackpluginforgradebook_help'] = 'Nur eine Bewertung kann in den Bewertungsbereich des Kurses übertragen werden.';
$string['feedbackplugins'] = 'Feedback Plugins';
$string['feedbacksettings'] = 'Feedback';
$string['filesubmissions'] = 'Dateiabgaben';
$string['filter'] = 'Filter';
$string['filternone'] = 'Kein Filter';
$string['filterrequiregrading'] = 'Bewertung notwendig';
$string['filtersubmitted'] = 'Abgegeben';
$string['gradeabovemaximum'] = 'Bewertung muss kleiner oder gleich {$a} sein.';
$string['gradebelowzero'] = 'Bewertung muss größer oder gleich Null sein.';
$string['graded'] = 'Bewertet';
$string['gradedby'] = 'Bewertet von';
$string['gradedon'] = 'Bewertet am';
$string['gradelocked'] = 'Diese Bewertung ist gesperrt oder wurde im Bewertungsbereich überschrieben.';
$string['gradeoutof'] = 'Bewertung (max. {$a})';
$string['gradeoutofhelp'] = 'Bewertung';
$string['gradeoutofhelp_help'] = 'Geben Sie hier die Bewertung für die Aufgabenlösung ein. Es können Dezimalwerte eingetragen werden.';
$string['gradersubmissionupdatedhtml'] = '{$a->username} hat die Aufgabe <i>\'{$a->assignment}\'</i> bearbeitet und am {$a->timeupdated} hochgeladen. <br /><br />
Die Abgabe ist <br /><a href="{$a->url}">auf der Website verfügbar</a>.';
$string['gradersubmissionupdatedsmall'] = '{$a->username} hat die eingereichte Lösung zur Aufgabe \'{$a->assignment}\' neu bearbeitet.';
$string['gradersubmissionupdatedtext'] = '{$a->username} hat die Aufgabe \'{$a->assignment}\' bearbeitet und am {$a->timeupdated} hochgeladen.

Die Abgabe ist auf der Website verfügbar
{$a->url}';
$string['gradestudent'] = 'Bewertung für Teilnehmer/in: (id={$a->id}, Name={$a->fullname}).';
$string['gradeuser'] = 'Bewertung {$a}';
$string['grading'] = 'Wird bewertet';
$string['gradingmethodpreview'] = 'Bewertungskriterium';
$string['gradingoptions'] = 'Optionen';
$string['gradingstatus'] = 'Bewertungsstatus';
$string['gradingstudentprogress'] = 'Teilnehmer/in {$a->index} von {$a->count} wird bewertet';
$string['gradingsummary'] = 'Bewertungsüberblick';
$string['grantextension'] = 'Erweiterung zulassen';
$string['grantextensionforusers'] = 'Erweiterung für {$a} Teillnehmer/innen zulassen';
$string['hiddenuser'] = 'Teilnehmer/in';
$string['hideshow'] = 'Verbergen/Anzeigen';
$string['instructionfiles'] = 'Anleitungsdateien';
$string['invalidfloatforgrade'] = 'Die eingegebene Bewertung \'{$a}\' scheint nicht korrekt zu sein. Bitte prüfen Sie die Eingabe.';
$string['invalidgradeforscale'] = 'Die eingegebene Bewertung ist bei der gewählten Bewertungsskala nicht vorgesehen.';
$string['lastmodifiedgrade'] = 'Zuletzt geändert (Bewertung)';
$string['lastmodifiedsubmission'] = 'Zuletzt geändert (Abgabe)';
$string['latesubmissions'] = 'Verspätete Abgaben';
$string['latesubmissionsaccepted'] = 'Nur Teilnehmer/innen für die das Abgabedatum erweitert wurde, können noch Lösungen abgeben.';
$string['locksubmissionforstudent'] = 'Weitere Abgaben verhindern von {$a->fullname} (id={$a->id})';
$string['locksubmissions'] = 'Abgabe sperren';
$string['manageassignfeedbackplugins'] = 'Plugins für Aufgabenfeedback verwalten';
$string['manageassignsubmissionplugins'] = 'Plugins für Aufgabenabgabe verwalten';
$string['maxgrade'] = 'Bestwertung';
$string['messageprovider:assign_notification'] = 'Mitteilung zur Aufgabe';
$string['modulename'] = 'Aufgabe';
$string['modulename_help'] = 'Stellen Sie für die Teilnehmer/innen Ihres Kurses Aufgaben bereit, die diese online oder offline bearbeiten. Die Lösung kann online als Texteingabe oder Dateiabgabe erfolgen. Geben Sie konstruktiv Feedback und bewerten Sie die Lösung.

Bewertungsmöglichkeiten:
- mit vorgegebener oder selbst erstellter Bewertungsskala
- durch Text-Feedback
- mit Dateianhang (z.B. Musterlösung oder korrigierte Lösung)
- Bewertung mit mehreren Kriterien.';
$string['modulenameplural'] = 'Aufgaben';
$string['mysubmission'] = 'Meine Lösung:';
$string['newsubmissions'] = 'Aufgaben abgegeben';
$string['nofiles'] = 'Keine Dateien.';
$string['nograde'] = 'Keine Bewertung.';
$string['nolatesubmissions'] = 'Spätere Abgaben sind nicht zugelassen.';
$string['nomoresubmissionsaccepted'] = 'Weitere Abgaben sind nicht zugelassen.';
$string['noonlinesubmissions'] = 'Diese Aufgabe benötigt keine Online-Abgabe';
$string['nosavebutnext'] = 'Weiter';
$string['nosubmission'] = 'Für diese Aufgabe wurde nichts abgegeben';
$string['nosubmissionsacceptedafter'] = 'Weitere Abgaben sind nicht zugelassen nach';
$string['notgraded'] = 'Nicht bewertet';
$string['notgradedyet'] = 'Noch nicht bewertet';
$string['notifications'] = 'Mitteilungen';
$string['notsubmittedyet'] = 'Noch nichts abgegeben';
$string['nousersselected'] = 'Niemand ausgewählt';
$string['numberofdraftsubmissions'] = 'Entwürfe';
$string['numberofparticipants'] = 'Teilnehmer/innen';
$string['numberofsubmissionsneedgrading'] = 'Bewertung erwartet';
$string['numberofsubmittedassignments'] = 'Abgegeben';
$string['numberofteams'] = 'Gruppen';
$string['offline'] = 'Keine Online-Abgabe notwendig';
$string['open'] = 'Offen';
$string['outlinegrade'] = 'Bewertung: {$a}';
$string['overdue'] = '<font color="red">Abgabezeit überschritten seit: {$a}</font>';
$string['page-mod-assign-view'] = 'Aufgabenhauptseite';
$string['page-mod-assign-x'] = 'Jede Aufgabenseite';
$string['participant'] = 'Teilnehmer/innen';
$string['pluginadministration'] = 'Aufgaben-Administration';
$string['pluginname'] = 'Aufgabe';
$string['preventsubmissions'] = 'Verhindert die Abgabe von Lösungen für diese Aufgabe durch Teilnehmer/innen';
$string['preventsubmissionsshort'] = 'Abgabeänderung verhindern';
$string['previous'] = 'Zurück';
$string['quickgrading'] = 'Schnellbewertung';
$string['quickgradingchangessaved'] = 'Die Änderungen in der Bewertung wurden gesichert';
$string['quickgrading_help'] = 'Die Schnellbewertung ermöglicht Ihnen direkt in der Übersichtstabelle Bewertungen vorzunehmen. Diese Möglichkeit steht nicht bei erweiterten Bewertungen (Rubrics) zur Verfügung.';
$string['quickgradingresult'] = 'Schnellbewertung';
$string['recordid'] = 'ID';
$string['requireallteammemberssubmit'] = 'Erfordert eine Abgabebestätigung durch alle Gruppenmitglieder';
$string['requireallteammemberssubmit_help'] = 'Wenn die Option aktiviert ist, müssen alle Gruppenmitglieder die eingereichte Lösung bestätigen, bevor eine Abgabe als abgegeben markiert wird.';
$string['requiresubmissionstatement'] = 'Erklärung zur Eigenständigkeit muss bestätigt werden';
$string['requiresubmissionstatementassignment'] = 'Erklärung zur Eigenständigkeit muss bestätigt werden';
$string['requiresubmissionstatementassignment_help'] = 'Diese Option legt fest, dass die Erklärung zur Eigenständigkeit bei der Abgabe von Lösungen bestätigt werden muss.';
$string['requiresubmissionstatement_help'] = 'Diese Option legt fest, dass die Erklärung zur Eigenständigkeit bei der Abgabe von Lösungen in allen Kursen der Website bestätigt werden muss. Wenn die Option nicht aktiviert ist, kann für jede einzelne Aufgabe festgelegt werden, ob diese Erklärung verlangt wird.';
$string['revealidentities'] = 'Identität der Teilnehmenden verbergen';
$string['revealidentitiesconfirm'] = 'Sind Sie sicher, dass die Identität der Teilnehmenden für diese Aufgabe aufgedeckt werden soll? Die Einstellung kann nicht zurückgesetzt werden. Wenn die Identität der Teilnehmenden aufgedeckt wurde, werden die Bewertungen in der Bewertungsübersicht angezeigt.';
$string['reverttodraft'] = 'Abgabe in den Entwurfsmodus zurücksetzen';
$string['reverttodraftforstudent'] = 'Den Status der Lösung auf Entwurf zurücksetzen für (id={$a->id}, fullname={$a->fullname}). Danach ist eine Bearbeitung wieder möglich.';
$string['reverttodraftshort'] = 'Abgabe in den Entwurfsmodus zurücksetzen';
$string['reviewed'] = 'Nachgeprüft';
$string['saveallquickgradingchanges'] = 'Bewertungsänderungen sichern';
$string['savechanges'] = 'Änderungen sichern';
$string['savenext'] = 'Sichern und weiter';
$string['scale'] = 'Skala';
$string['selectlink'] = 'Auswählen...';
$string['selectuser'] = '{$a} auswählen';
$string['sendlatenotifications'] = 'Bewerter/innen über verspätete Abgaben von Lösungen informieren.';
$string['sendlatenotifications_help'] = 'Mit der Aktivierung werden die Bewerter (meist die Trainer/innen) benachrichtigt wenn eine Lösung verspätet abgegeben wird. Die Zustellung der Benachrichtigung ist individuell einstellbar.';
$string['sendnotifications'] = 'Mitteilungen an bewertende Personen senden';
$string['sendnotifications_help'] = 'Mit der Aktivierung werden die Bewerter (meist die Trainer/innen) benachrichtigt wenn eine Lösung zeitgerecht oder verspätet abgegeben wird. Die Zustellung der Benachrichtigung ist individuell einstellbar.';
$string['sendsubmissionreceipts'] = 'Abgabebestätigung an Teilnehmer/innen versenden';
$string['sendsubmissionreceipts_help'] = 'Diese Option aktiviert Abgabestätigungen, die für eingereichte Aufgabenlösungen an die Teilnehmer/innen versandt werden.';
$string['settings'] = 'Aufgabeneinstellungen';
$string['showrecentsubmissions'] = 'Neue Abgaben anzeigen';
$string['submission'] = 'Abgabe';
$string['submissiondrafts'] = 'Abgabetaste muss gedrückt werden';
$string['submissiondrafts_help'] = 'Diese Option ermöglicht es Teilnehmer/innen, die Lösung zu einer Aufgabe zunächst als Entwurf zu hinterlegen und sie später noch einmal zu überarbeiten. Erst mit der Bestätigung der Lösung als abgeschlossen werden die Trainer/innen aufgefordert, die Lösung zu bewerten.';
$string['submissioneditable'] = 'Teilnehmer/innen können eingereichte Lösung bearbeiten';
$string['submissionempty'] = 'Es wurde nichts eingereicht.';
$string['submissionnoteditable'] = 'Teilnehmer/innen können eingereichte Lösung nicht bearbeiten';
$string['submissionnotready'] = 'Diese Aufgabe ist nicht zur Abgabe fertig';
$string['submissionplugins'] = 'Plugins zur Abgabe';
$string['submissionreceipthtml'] = 'Sie haben eine Lösung zur Aufgabe \'<i>{$a->assignment}</i>\' abgegeben.<br /><br /> Den Bewertungsstatus für die Aufgabe können Sie <a href="{$a->url}">hier</a> einsehen.';
$string['submissionreceipts'] = 'Abgabebestätigungen versenden';
$string['submissionreceiptsmall'] = 'Sie haben eine Lösung für {$a->assignment} abgegeben.';
$string['submissionreceipttext'] = 'Sie haben eine Lösung für \'{$a->assignment}\' abgegeben.

Sie können den Bewertungsstatus für die Aufgabe dort einsehen:

   {$a->url}';
$string['submissions'] = 'Abgegebene Aufgaben';
$string['submissionsclosed'] = 'Abgabe beendet';
$string['submissionsettings'] = 'Abgabeeinstellungen';
$string['submissionslocked'] = 'Bei dieser Aufgabe können derzeit keine Lösungen abgeben werden.';
$string['submissionslockedshort'] = 'Abgabeänderungen sind nicht erlaubt';
$string['submissionsnotgraded'] = 'Nicht bewertete Abgaben: {$a}';
$string['submissionstatement'] = 'Erklärung zur Eigenständigkeit';
$string['submissionstatementacceptedlog'] = 'Erklärung zur Eigenständigkeit wurde akzeptiert von {$a}';
$string['submissionstatementdefault'] = 'Diese Arbeit ist meine persönliche Leistung. Sofern ich irgendwo fremde Quellen verwendet habe, sind diese Stellen entsprechend gekennzeichnet.';
$string['submissionstatement_help'] = 'Erklärung zur Eigenständigkeit';
$string['submissionstatus'] = 'Abgabestatus';
$string['submissionstatus_'] = 'Keine Abgabe';
$string['submissionstatus_draft'] = 'Entwurf (nicht abgegeben)';
$string['submissionstatusheading'] = 'Abgabestatus';
$string['submissionstatus_marked'] = 'Bewertet';
$string['submissionstatus_new'] = 'Neue Abgabe';
$string['submissionstatus_submitted'] = 'Zur Bewertung abgegeben';
$string['submissionteam'] = 'Gruppe';
$string['submitaction'] = 'Abgeben';
$string['submitassignment'] = 'Aufgabe abgeben';
$string['submitassignment_help'] = 'Sobald diese Aufgabe abgegeben wird, sind keine weiteren Änderungen mehr möglich';
$string['submitted'] = 'Abgegeben';
$string['submittedearly'] = 'Aufgabe wurde {$a} vor dem Termin abgegeben';
$string['submittedlate'] = 'Aufgabe wurde {$a} verspätet abgegeben';
$string['submittedlateshort'] = '{$a} später';
$string['teamsubmission'] = 'Teilnehmer/innen arbeiten in Gruppen';
$string['teamsubmissiongroupingid'] = 'Bildung von Gruppen';
$string['teamsubmissiongroupingid_help'] = 'Diese Gruppierung wird für die Gruppen zur Bearbeitung der Aufgabe genutzt. Wird keine Gruppierung ausgewählt, werden die vorhandenen Gruppen verwendet.';
$string['teamsubmission_help'] = 'Mit der Aktivierung werden die Teilnehmer/innen in ihren Gruppen der Aufgabe zugeordnet. Eine Gruppenlösung steht allen Gruppenmitgliedern zur Verfügung. Änderungen können von allen eingesehen werden.';
$string['teamsubmissionstatus'] = 'Gruppenabgabestatus';
$string['textinstructions'] = 'Aufgabenstellung';
$string['timemodified'] = 'Zuletzt geändert';
$string['timeremaining'] = 'Verbleibende Zeit';
$string['unlocksubmissionforstudent'] = 'Abgabe für Teilnehmer/in erlauben: (id={$a->id}, Name={$a->fullname})';
$string['unlocksubmissions'] = 'Abgabe freigeben';
$string['updategrade'] = 'Bewertung aktualisieren';
$string['updatetable'] = 'Sichern und Tabelle aktualisieren';
$string['upgradenotimplemented'] = 'Upgrade nicht implementiert für Plugin ({$a->type} {$a->subtype})';
$string['userextensiondate'] = 'Erweiterung der Abgabe möglich bis: {$a}';
$string['usergrade'] = 'Nutzerbewertung';
$string['userswhoneedtosubmit'] = 'Nutzer/innen, die noch nicht abgegeben haben: {$a}';
$string['viewfeedback'] = 'Feedback anzeigen';
$string['viewfeedbackforuser'] = 'Feedback anzeigen für: {$a}';
$string['viewfull'] = 'Vollständige Anzeige';
$string['viewfullgradingpage'] = 'Die komplette Bewertungsseite öffnen, um ein Feedback zu erstellen.';
$string['viewgradebook'] = 'Bewertungen anzeigen';
$string['viewgrading'] = 'Alle Abgaben anzeigen und bewerten';
$string['viewgradingformforstudent'] = 'Bewertungsseite für Teilnehmer/in: (id={$a->id}, fullname={$a->fullname}) anzeigen.';
$string['viewownsubmissionform'] = 'Seite mit meinen eigenen Lösungen für Aufgaben anzeigen.';
$string['viewownsubmissionstatus'] = 'Eigene Statusseite zur Abgabe anzeigen';
$string['viewrevealidentitiesconfirm'] = 'Bestätigungsseite mit Teilnehmernamen anzeigen';
$string['viewsubmission'] = 'Abgabe anzeigen';
$string['viewsubmissionforuser'] = 'Abgabe von {$a} anzeigen';
$string['viewsubmissiongradingtable'] = 'Bewertungsübersicht zur Abgabe anzeigen';
$string['viewsummary'] = 'Zusammenfassung anzeigen';
