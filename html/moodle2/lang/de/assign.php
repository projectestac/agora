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
 * Strings for component 'assign', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Sie haben Aufgaben, die Ihre Bearbeitung erfordern.';
$string['addattempt'] = 'Eine weiteren Lösung zulassen';
$string['addnewattempt'] = 'Neue Lösung hinzufügen';
$string['addnewattemptfromprevious'] = 'Neuen Versuch auf Grundlage der vorherigen Lösung abgeben';
$string['addnewattemptfromprevious_help'] = 'Hiermit kopieren Sie den Inhalt Ihrer vorherigen Einreichungen, um eine neue Einreichung zu erstellen.';
$string['addnewattempt_help'] = 'Dies erzeugt eine neue leere Lösung, in der Sie arbeiten können.';
$string['addsubmission'] = 'Abgabe hinzufügen';
$string['allocatedmarker'] = 'Zugeordnete Markierung';
$string['allocatedmarker_help'] = 'Markierung, die zu dieser Lösung zugeordnet ist';
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
$string['assign:manageallocations'] = 'Markierungen verwalten, die zu dieser Lösung zugeordnet sind';
$string['assign:managegrades'] = 'Bewertungen überprüfen und veröffentlichen';
$string['assignmentisdue'] = 'Der Abgabetermin ist vorbei';
$string['assignmentmail'] = '{$a->grader} hat Ihnen ein Feedback zur Ihrer Aufgabenlösung für  \'{$a->assignment}\' bereitgestellt. Mit dem folgenden Link können Sie direkt darauf zugreifen: {$a->url}';
$string['assignmentmailhtml'] = '<p>{$a->grader} hat Ihnen ein Feedback zur Ihrer Aufgabenlösung für \'<i>{$a->assignment}</i>\' bereitgestellt.</p> <p>Mit dem folgenden Link können Sie direkt darauf zugreifen: <a href="{$a->url}">Link zu Ihrer Lösung und zum Feedback</a>.</p>';
$string['assignmentmailsmall'] = '{$a->grader} hat Ihnen ein Feedback zur Ihrer Aufgabenlösung für  \'{$a->assignment}\' bereitgestellt. Mit dem folgenden Link können Sie direkt darauf zugreifen: {$a->url}';
$string['assignmentname'] = 'Name der Aufgabe';
$string['assignmentplugins'] = 'Aufgabentypen';
$string['assignmentsperpage'] = 'Aufgaben pro Seite';
$string['assign:releasegrades'] = 'Bewertung veröffentlichen';
$string['assign:revealidentities'] = 'Teilnehmeridentität anzeigen';
$string['assign:reviewgrades'] = 'Bewertungen prüfen';
$string['assignsubmission'] = 'Abgabetyp';
$string['assignsubmissionpluginname'] = 'Abgabetyp';
$string['assign:submit'] = 'Aufgabe abgeben';
$string['assign:view'] = 'Aufgabe ansehen';
$string['attemptheading'] = 'Versuch {$a->attemptnumber}: {$a->submissionsummary}';
$string['attempthistory'] = 'Vorherige Lösungen';
$string['attemptnumber'] = 'Nummer der Lösung';
$string['attemptreopenmethod'] = 'Lösungen erneut bearbeitbar';
$string['attemptreopenmethod_help'] = 'Die Option legt fest, ob Teilnehmer/innen die eingereichten Lösungen erneut zum Bearbeiten öffnen dürfen. Mögliche Optionen sind: <ul><li>Nie - Die Lösung kann nicht erneut bearbeitet werden.</li><li>Manuell - Ein/e Trainer/in kann das erneute Bearbeiten zulassen.</li><li>Automatisch bis zur Bewertung - Die Lösung kann bis zur Bewertung (Eintrag in Bewertungen - Kategorien und Aspekte) erneut bearbeitet werden.</li></ul>';
$string['attemptreopenmethod_manual'] = 'Manuell';
$string['attemptreopenmethod_none'] = 'Nie';
$string['attemptreopenmethod_untilpass'] = 'Automatisch bis zur Bewertung';
$string['attemptsettings'] = 'Einstellungen für Lösungen';
$string['availability'] = 'Verfügbarkeit';
$string['backtoassignment'] = 'Zurück zur Aufgabe';
$string['batchoperationconfirmaddattempt'] = 'Einen weiteren Versuch  für ausgewählte Lösungen erlauben?';
$string['batchoperationconfirmgrantextension'] = 'Terminverlängerung für die ausgewählten Abgaben gewähren?';
$string['batchoperationconfirmlock'] = 'Ausgewählte Abgaben sperren?';
$string['batchoperationconfirmreverttodraft'] = 'Ausgewählte Abgaben in den Entwurfsmodus zurücksetzen?';
$string['batchoperationconfirmsetmarkingallocation'] = 'Bewerter-Zuordnung für alle ausgewählten Einreichungen setzen?';
$string['batchoperationconfirmsetmarkingworkflowstate'] = 'Bewertungsablaufstatus für alle ausgewählten Einreichungen setzen?';
$string['batchoperationconfirmunlock'] = 'Ausgewählte Abgaben freigeben?';
$string['batchoperationlock'] = 'Abgaben sperren';
$string['batchoperationreverttodraft'] = 'Abgaben in den Entwurfsmodus zurücksetzen';
$string['batchoperationsdescription'] = 'Mit Auswahl...';
$string['batchoperationunlock'] = 'Abgaben freigeben';
$string['batchsetallocatedmarker'] = 'Bewerter für {$a} ausgewählte Nutzer festlegen.';
$string['batchsetmarkingworkflowstateforusers'] = 'Bewertungsablaufstatus für {$a} ausgewählte Nutzer festlegen.';
$string['blindmarking'] = 'Anonyme Bewertung';
$string['blindmarking_help'] = 'Die anonyme Bewertung verbirgt den Teilnehmernamen während der Bewertung. Die Einstelloption wird geblockt, sobald die erste Bewertung vorgenommen wurde.';
$string['changegradewarning'] = 'In dieser Aufgabe sind bereits Lösungen bewertet worden. Bei einer Änderung der Bewertungsskala sind Neuberechnungen der Bewertungen erforderlich. Sie müssen ggfs. die Neuberechnung gesondert starten.';
$string['choosegradingaction'] = 'Bewertungsvorgang';
$string['choosemarker'] = 'Auwählen...';
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
$string['currentattempt'] = 'Dies ist Versuch {$a}';
$string['currentattemptof'] = 'Versuch {$a->attemptnumber} (mögliche Versuche {$a->maxattempts})';
$string['currentgrade'] = 'Aktuelle Bewertung';
$string['cutoffdate'] = 'Letzter Abgabetermin';
$string['cutoffdatefromdatevalidation'] = 'Der letzte Abgabetermin muss nach dem Abgabestart liegen.';
$string['cutoffdate_help'] = 'Diese Funktion sperrt die Abgabe von Lösungen ab diesem Termin, sofern keine Terminverlängerung gewährt wird.';
$string['cutoffdatevalidation'] = 'Der letzte Abgabetermin muss nach der erstmöglichen Abgabe liegen.';
$string['defaultsettings'] = 'Standardmäßige Aufgabeneinstellungen';
$string['defaultsettings_help'] = 'Diese Einstellungen legen Vorgaben für alle neuen Aufgaben fest.';
$string['defaultteam'] = 'Standard-Gruppe';
$string['deleteallsubmissions'] = 'Alle Abgaben löschen';
$string['description'] = 'Beschreibung';
$string['downloadall'] = 'Alle Abgaben herunterladen';
$string['duedate'] = 'Abgabetermin';
$string['duedate_help'] = 'Zum Abgabetermin wird die Aufgabe fällig. Wenn spätere Abgaben erlaubt sind, wird jede nach diesem Datum eingereichte Abgabe als verspätet markiert. Um eine Abgabe nach einem bestimmten Verspätungsdatum  zu verhindern kann ein endgültiges Abgabedatum gesetzt werden.';
$string['duedateno'] = 'Kein Abgabetermin';
$string['duedatereached'] = 'Der Abgabetermin für diese Aufgabe ist vorbei.';
$string['duedatevalidation'] = 'Der Abgabetermin muss später als der Abgabebeginn sein';
$string['editaction'] = 'Aktivitäten...';
$string['editattemptfeedback'] = 'Bewertung und Feedback für Versuch {$a} bearbeiten';
$string['editingpreviousfeedbackwarning'] = 'Sie bearbeiten das Feedback für einen vorherigen Versuch. Dies ist Versuch {$a->attemptnumber} von {$a->totalattempts}.';
$string['editingstatus'] = 'Bearbeitungsstatus';
$string['editsubmission'] = 'Lösung bearbeiten';
$string['editsubmission_help'] = 'Lösung ändern';
$string['enabled'] = 'Aktiviert';
$string['errornosubmissions'] = 'Keine Abgaben zum Herunterladen verfügbar';
$string['errorquickgradingvsadvancedgrading'] = 'Die Aufgabe verwendet das erweiterte Bewertungsschema. Daher werden diese Bewertungen nun nicht abgespeichert.';
$string['errorrecordmodified'] = 'Bevor Sie die Seite aufgerufen haben, hat jemand anders einen oder mehrere Daten geändert. Deswegen können Ihre Einträge nun nicht gesichert werden.';
$string['event_all_submissions_downloaded'] = 'Alle abgegebenen Lösungen wurden heruntergeladen.';
$string['event_assessable_submitted'] = 'Eine Lösung wurde abgegeben.';
$string['event_extension_granted'] = 'Eine Verlängerung wurde gewährt.';
$string['event_identities_revealed'] = 'Die Identitäten wurden aufgedeckt.';
$string['event_marker_updated'] = 'Die zugewiesene Markierung wurde aktualisiert.';
$string['event_statement_accepted'] = 'Nutzer/in hat die Abgabebedingung bestätigt.';
$string['event_submission_duplicated'] = 'Die Lösung wurde von Nutzer/in dupliziert';
$string['event_submission_graded'] = 'Die Lösung wurde bewertet.';
$string['event_submission_locked'] = 'Die Abgabe wurde für Nutzer/in gesperrt.';
$string['event_submission_status_updated'] = 'Der Abgabestatus wurde aktualisiert.';
$string['event_submission_unlocked'] = 'Die Abgabe wurde für Nutzer/in freigeschaltet.';
$string['event_submission_updated'] = 'Nutzer/in hat Lösung gesichert.';
$string['event_workflow_state_updated'] = 'Der Prozessstatus wurde aktualisiert.';
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
$string['feedbacktypes'] = 'Feedback-Typen';
$string['filesubmissions'] = 'Dateiabgaben';
$string['filter'] = 'Filter';
$string['filternone'] = 'Kein Filter';
$string['filterrequiregrading'] = 'Bewertung notwendig';
$string['filtersubmitted'] = 'Abgegeben';
$string['gradeabovemaximum'] = 'Bewertung muss kleiner oder gleich {$a} sein.';
$string['gradebelowzero'] = 'Bewertung muss größer oder gleich Null sein.';
$string['gradecanbechanged'] = 'Bewertung kann geändert werden';
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
$string['gradingchangessaved'] = 'Die geänderten Bewertungen wurden gespeichert.';
$string['gradingmethodpreview'] = 'Bewertungskriterium';
$string['gradingoptions'] = 'Optionen';
$string['gradingstatus'] = 'Bewertungsstatus';
$string['gradingstudent'] = 'Person wird bewertet';
$string['gradingsummary'] = 'Bewertungsüberblick';
$string['grantextension'] = 'Erweiterung zulassen';
$string['grantextensionforusers'] = 'Erweiterung für {$a} Teillnehmer/innen zulassen';
$string['groupsubmissionsettings'] = 'Einstellungen für Gruppeneinreichungen';
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
$string['marker'] = 'Markierung';
$string['markerfilter'] = 'Markierung filtern';
$string['markingallocation'] = 'Bewerter-Zuordnung verwenden';
$string['markingallocation_help'] = 'Nach der Aktivierung können einzelnen Nutzer/innen Bewerter zugewiesen werden. Dazu muss der Bewertungsablaufstatus aktiviert worden sein.';
$string['markingworkflow'] = 'Bewertungsworkflow verwenden';
$string['markingworkflow_help'] = 'Nach der Aktivierung werden für Bewertungen mehrere Schritte durchlaufen bevor Teilnehmende sie sehen. Damit können mehrere Bewertungsdurchläufe erfolgen bevor alle Bewertungen zugleich den Teilnehmenden sichtbar gemacht werden.';
$string['markingworkflowstate'] = 'Status des Bewertungsworkflows';
$string['markingworkflowstate_help'] = 'Die Liste der Workflowstati, die Sie auswählen können, wird durch die Berechtigungungen in der Aufgabe festgelegt. Es gibt folgende Stati:

* Nicht bewertet - Der Bewerter hat noch nicht begonnen
* In Bewertung - Die Bewertung hat begonnen, ist jedoch noch nicht abgeschlossen
* Bewertung vorläufig abgeschlossen - Der Bewerter hat die Bewertung vorgenommen, jedoch noch nicht freigegeben
* In der Zweitbewertung - die Bewertung wird nun von Zweitbewertern (Trainer) durchgesehen
* Fertig für Veröffentlichung - Der/die Trainer/in hat die abschließende Bewertung vorgenommen, wartet jedoch mit der Veröffentlichung.
* Veröffentlicht - Teilnehmer/innen sehen ihre Bewertungen und das Feedback';
$string['markingworkflowstateinmarking'] = 'In Bewertung';
$string['markingworkflowstateinreview'] = 'Wird überprüft';
$string['markingworkflowstatenotmarked'] = 'Unmarkiert';
$string['markingworkflowstatereadyforrelease'] = 'Fertig zur Freigabe';
$string['markingworkflowstatereadyforreview'] = 'Markierung abgeschlossen';
$string['markingworkflowstatereleased'] = 'Freigegeben';
$string['maxattempts'] = 'Maximal mögliche Versuche';
$string['maxattempts_help'] = 'Maximale Anzahl von Abgabeversuchen. Nach dieser Anzahl von Versuchen können Teilnehmer/innen ihre Abgabe nicht mehr neu öffnen oder ändern.';
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
$string['moreusers'] = 'Weitere {$a}...';
$string['mysubmission'] = 'Meine Lösung:';
$string['newsubmissions'] = 'Aufgaben abgegeben';
$string['noattempt'] = 'Kein Versuch';
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
$string['outof'] = '{$a->current} von {$a->total}';
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
$string['quickgradingchangessaved'] = 'Die Änderungen in der Bewertung wurden gespeichert';
$string['quickgrading_help'] = 'Die Schnellbewertung ermöglicht Ihnen direkt in der Übersichtstabelle Bewertungen vorzunehmen. Diese Möglichkeit steht nicht bei erweiterten Bewertungen (Rubrics) zur Verfügung.';
$string['quickgradingresult'] = 'Schnellbewertung';
$string['recordid'] = 'ID';
$string['requireallteammemberssubmit'] = 'Erfordert eine Abgabebestätigung durch alle Gruppenmitglieder';
$string['requireallteammemberssubmit_help'] = 'Wenn die Option aktiviert ist, müssen alle Gruppenmitglieder die eingereichte Lösung bestätigen, bevor eine Abgabe als abgegeben markiert wird.';
$string['requiresubmissionstatement'] = 'Erklärung zur Eigenständigkeit muss bestätigt werden';
$string['requiresubmissionstatement_help'] = 'Teilnehmer/innen müssen die Erklärung zur Eigenständigkeit bei Lösungen für diese Aufgabe abgeben.';
$string['revealidentities'] = 'Identität der Teilnehmenden verbergen';
$string['revealidentitiesconfirm'] = 'Sind Sie sicher, dass die Identität der Teilnehmenden für diese Aufgabe aufgedeckt werden soll? Die Einstellung kann nicht zurückgesetzt werden. Wenn die Identität der Teilnehmenden aufgedeckt wurde, werden die Bewertungen in der Bewertungsübersicht angezeigt.';
$string['reverttodraft'] = 'Abgabe in den Entwurfsmodus zurücksetzen';
$string['reverttodraftforstudent'] = 'Den Status der Lösung auf Entwurf zurücksetzen für (id={$a->id}, fullname={$a->fullname}). Danach ist eine Bearbeitung wieder möglich.';
$string['reverttodraftshort'] = 'Abgabe in den Entwurfsmodus zurücksetzen';
$string['reviewed'] = 'Nachgeprüft';
$string['saveallquickgradingchanges'] = 'Bewertungsänderungen sichern';
$string['savechanges'] = 'Änderungen sichern';
$string['savegradingresult'] = 'Bewertung';
$string['savenext'] = 'Sichern und weiter';
$string['scale'] = 'Skala';
$string['selectedusers'] = 'Ausgewählte Nutzer/innen';
$string['selectlink'] = 'Auswählen...';
$string['selectuser'] = '{$a} auswählen';
$string['sendlatenotifications'] = 'Bewerter/innen über verspätete Abgaben von Lösungen informieren.';
$string['sendlatenotifications_help'] = 'Mit der Aktivierung werden die Bewerter (meist die Trainer/innen) benachrichtigt wenn eine Lösung verspätet abgegeben wird. Die Zustellung der Benachrichtigung ist individuell einstellbar.';
$string['sendnotifications'] = 'Mitteilungen an bewertende Personen senden';
$string['sendnotifications_help'] = 'Mit der Aktivierung werden die Bewerter (meist die Trainer/innen) benachrichtigt wenn eine Lösung zeitgerecht oder verspätet abgegeben wird. Die Zustellung der Benachrichtigung ist individuell einstellbar.';
$string['sendstudentnotifications'] = 'Teilnehmer/innen benachrichtigen';
$string['sendstudentnotifications_help'] = 'Wenn aktiviert erhalten Teilnehmer/innen eine Benachrichtigung über aktualisierte Bewertungen oder Feedbacks.';
$string['sendsubmissionreceipts'] = 'Abgabebestätigung an Teilnehmer/innen versenden';
$string['sendsubmissionreceipts_help'] = 'Diese Option aktiviert Abgabestätigungen, die für eingereichte Aufgabenlösungen an die Teilnehmer/innen versandt werden.';
$string['setmarkerallocationforlog'] = 'Setzen Sie die Bewertungszuordnung auf: (id={$a->id}, Name={$a->fullname}, Bewerter={$a->marker}).';
$string['setmarkingallocation'] = 'Zugewiesene Bewerter/innen festlegen';
$string['setmarkingworkflowstate'] = 'Bewertungsworkflowstatus festlegen';
$string['setmarkingworkflowstateforlog'] = 'Statsu für Bewertungsablaufsetzen auf: (id={$a->id}, Name={$a->fullname}, Status={$a->state}).';
$string['settings'] = 'Aufgabeneinstellungen';
$string['showrecentsubmissions'] = 'Neue Abgaben anzeigen';
$string['status'] = 'Status';
$string['submission'] = 'Abgabe';
$string['submissioncopiedhtml'] = '<p>Sie haben eine Kopie der früheren Lösung für die Aufgabe \'<i>{$a->assignment} erstellt</i>\'</p><p>.
Sehen sehen hier den Status  <a href="{$a->url}"> für Ihre Aufgabenlösung</a>.</p>';
$string['submissioncopiedsmall'] = 'Sie haben Ihre bisherige Aufgabenlösung für {$a->assignment} kopiert.';
$string['submissioncopiedtext'] = 'Sie haben Ihre bisherige Aufgabenlösung für {$a->assignment} kopiert.

Sie können den Status der Aufgabenlösung sehen unter
    {$a->url}';
$string['submissiondrafts'] = 'Abgabetaste muss gedrückt werden';
$string['submissiondrafts_help'] = 'Diese Option ermöglicht es Teilnehmer/innen, die Lösung zu einer Aufgabe zunächst als Entwurf zu hinterlegen und sie später noch einmal zu überarbeiten. Erst mit der Bestätigung der Lösung als abgeschlossen werden die Trainer/innen aufgefordert, die Lösung zu bewerten.';
$string['submissioneditable'] = 'Teilnehmer/innen können eingereichte Lösung bearbeiten';
$string['submissionempty'] = 'Es wurde nichts eingereicht.';
$string['submissionnotcopiedinvalidstatus'] = 'Die Abgabe wurde nicht kopiert, weil sie seit dem Öffnen verändert wurde.';
$string['submissionnoteditable'] = 'Teilnehmer/innen können eingereichte Lösung nicht bearbeiten';
$string['submissionnotready'] = 'Diese Aufgabe ist nicht zur Abgabe fertig';
$string['submissionplugins'] = 'Plugins zur Abgabe';
$string['submissionreceipthtml'] = '<p>Sie haben eine Lösung zur Aufgabe \'<i>{$a->assignment}</i>\' abgegeben.</p><p> Den Bewertungsstatus für die Aufgabe können Sie <a href="{$a->url}">hier</a> einsehen.</p>';
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
$string['submissionstatus_reopened'] = 'Erneut geöffnet';
$string['submissionstatus_submitted'] = 'Zur Bewertung abgegeben';
$string['submissionsummary'] = '{$a->status}. Letzte Änderung {$a->timemodified}';
$string['submissionteam'] = 'Gruppe';
$string['submissiontypes'] = 'Abgabetypen';
$string['submitaction'] = 'Abgeben';
$string['submitassignment'] = 'Aufgabe abgeben';
$string['submitassignment_help'] = 'Sobald diese Aufgabe abgegeben wird, sind keine weiteren Änderungen mehr möglich';
$string['submitted'] = 'Abgegeben';
$string['submittedearly'] = 'Aufgabe wurde {$a} vor dem Termin abgegeben';
$string['submittedlate'] = 'Aufgabe wurde {$a} verspätet abgegeben';
$string['submittedlateshort'] = '{$a} später';
$string['subplugintype_assignfeedback'] = 'Feedback Plugin';
$string['subplugintype_assignfeedback_plural'] = 'Feedback Plugins';
$string['subplugintype_assignsubmission'] = 'Abgabe Plugin';
$string['subplugintype_assignsubmission_plural'] = 'Abgabe Plugins';
$string['teamsubmission'] = 'Teilnehmer/innen arbeiten in Gruppen';
$string['teamsubmissiongroupingid'] = 'Bildung von Gruppen';
$string['teamsubmissiongroupingid_help'] = 'Diese Gruppierung wird für die Gruppen zur Bearbeitung der Aufgabe genutzt. Wird keine Gruppierung ausgewählt, werden die vorhandenen Gruppen verwendet.';
$string['teamsubmission_help'] = 'Mit der Aktivierung werden die Teilnehmer/innen in ihren Gruppen der Aufgabe zugeordnet. Eine Gruppenlösung steht allen Gruppenmitgliedern zur Verfügung. Änderungen können von allen eingesehen werden.';
$string['teamsubmissionstatus'] = 'Gruppenabgabestatus';
$string['textinstructions'] = 'Aufgabenstellung';
$string['timemodified'] = 'Zuletzt geändert';
$string['timeremaining'] = 'Verbleibende Zeit';
$string['unlimitedattempts'] = 'Unbegrenzt';
$string['unlimitedattemptsallowed'] = 'Unbegrenzte Versuche erlaubt';
$string['unlocksubmissionforstudent'] = 'Abgabe für Teilnehmer/in erlauben: (id={$a->id}, Name={$a->fullname})';
$string['unlocksubmissions'] = 'Abgabe freigeben';
$string['updategrade'] = 'Bewertung aktualisieren';
$string['updatetable'] = 'Sichern und Tabelle aktualisieren';
$string['upgradenotimplemented'] = 'Upgrade nicht implementiert für Plugin ({$a->type} {$a->subtype})';
$string['userextensiondate'] = 'Erweiterung der Abgabe möglich bis: {$a}';
$string['usergrade'] = 'Nutzerbewertung';
$string['userswhoneedtosubmit'] = 'Nutzer/innen, die noch nicht abgegeben haben: {$a}';
$string['validmarkingworkflowstates'] = 'Gültige Stati für Bewertungsablauf';
$string['viewbatchmarkingallocation'] = 'Stapelverarbeitung für Bewerterzuordnung anzeigen.';
$string['viewbatchsetmarkingworkflowstate'] = 'Stapelverarbeitung für Bewertungsablaufstatus setzen.';
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
$string['workflowfilter'] = 'Ablauffilter';
