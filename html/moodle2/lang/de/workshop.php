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
 * Strings for component 'workshop', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   workshop
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesscontrol'] = 'Zugriffssteuerung';
$string['aggregategrades'] = 'Bewertungen neu berechnen';
$string['aggregation'] = 'Punkteberechnung';
$string['allocate'] = 'Einreichungen zuordnen';
$string['allocatedetails'] = 'erwartet: {$a->expected}<br />eingereicht: {$a->submitted}<br />zuzuordnen: {$a->allocate}';
$string['allocation'] = 'Einreichungen zuordnen';
$string['allocationconfigured'] = 'Zuordnung konfiguriert';
$string['allocationdone'] = 'Zuordnung erledigt';
$string['allocationerror'] = 'Zuordnungsfehler';
$string['allsubmissions'] = 'Alle Einreichungen ({$a})';
$string['alreadygraded'] = 'Bereits bewertet';
$string['areainstructauthors'] = 'Anleitung zum Einreichen';
$string['areainstructreviewers'] = 'Anleitung zum Beurteilen';
$string['areasubmissionattachment'] = 'Dateianhänge zur Einreichung';
$string['areasubmissioncontent'] = 'Einreichungstexte';
$string['assess'] = 'Beurteilen';
$string['assessedexample'] = 'Beurteilte Beispieleinreichung';
$string['assessedsubmission'] = 'Beurteilte Einreichung';
$string['assessingexample'] = 'Beispieleinreichung beurteilen';
$string['assessingsubmission'] = 'Einreichung beurteilen';
$string['assessment'] = 'Beurteilen';
$string['assessmentby'] = 'von <a href="{$a->url}">{$a->name}</a>';
$string['assessmentbyfullname'] = 'Beurteilt von {$a}';
$string['assessmentbyyourself'] = 'Selbstbeurteilung';
$string['assessmentdeleted'] = 'Beurteilung freigeben';
$string['assessmentend'] = 'Abgabetermin der Beurteilungen';
$string['assessmentendbeforestart'] = 'Der Abgabetermin der Beurteilungen kann nicht vor dem Beginn des Beurteilungszeitraums liegen.';
$string['assessmentenddatetime'] = 'Abgabetermin der Beurteilungen:  {$a->daydatetime} ({$a->distanceday})';
$string['assessmentendevent'] = '{$a} (Abgabetermin der Beurteilungen)';
$string['assessmentform'] = 'Beurteilungsbogen';
$string['assessmentofsubmission'] = '<a href="{$a->assessmenturl}">Beurteilung</a> von <a href="{$a->submissionurl}">{$a->submissiontitle}</a>';
$string['assessmentreference'] = 'Beispielbeurteilung';
$string['assessmentreferenceconflict'] = 'Es ist nicht möglich eine Beispiellösung zu bewerten, die man selbst referenziert hat.';
$string['assessmentreferenceneeded'] = 'Bevor Sie die eigentlich Beurteilung vornehmen können, müssen Sie diese Beispieleinreichung betrachten. Um die Einreichung zu bewerten, klicken Sie bitte auf den \'weiter\'-Button.';
$string['assessmentsettings'] = 'Beurteilungseinstellungen';
$string['assessmentstart'] = 'Start der Beurteilungen';
$string['assessmentstartdatetime'] = 'Für Beurteilungen geöffnet vom {$a->daydatetime} ({$a->distanceday})';
$string['assessmentstartevent'] = '{$a} (Start der Beurteilungen)';
$string['assessmentweight'] = 'Gewichtung Beurteilung';
$string['assignedassessments'] = 'Zugeordnete Einreichungen zu Beurteilung';
$string['assignedassessmentsnone'] = 'Sie haben keine zugeordneten Einreichungen zu beurteilen';
$string['backtoeditform'] = 'Zurück zur Einstellungsseite';
$string['byfullname'] = 'von <a href="{$a->url}">{$a->name}</a>';
$string['calculategradinggrades'] = 'Punkte für das Beurteilen berechnen';
$string['calculategradinggradesdetails'] = 'erwartet: {$a->expected}<br />errechnet: {$a->calculated}';
$string['calculatesubmissiongrades'] = 'Punkte für das Einreichen berechnen';
$string['calculatesubmissiongradesdetails'] = 'erwartet: {$a->expected}<br />berechnet: {$a->calculated}';
$string['chooseuser'] = 'Nutzer/in auswählen';
$string['clearaggregatedgrades'] = 'Lösche alle errechneten Punkte';
$string['clearaggregatedgradesconfirm'] = 'Sind Sie sich sicher, dass Sie alle berechneten Punkte  für die Einreichung und die Beurteilung löschen wollen?';
$string['clearaggregatedgrades_help'] = 'Die errechneten Punkte für die Einreichung und die Beurteilungen werden zurückgesetzt. Sie können diese Punkte in der Bewertungsphase von Grund auf neu berechnen.';
$string['clearassessments'] = 'Lösche die Bewertungen';
$string['clearassessmentsconfirm'] = 'Sind Sie sich sicher, dass Sie alle Punkte aus der Bewertung löschen wollen? Sie sind nicht in der Lage, diesen Vorgang rückgängig zu machen. Die Beurteilenden müssen die Einreichungen erneut beurteilen.';
$string['clearassessments_help'] = 'Die berechneten Bewertungen für Einreichungen und  Beurteilungen werden zurückgesetzt. Die Information in den ausgefüllten Beurteilungsformularen bleiben erhalten. Alle Bewerter müssen jedoch das Formular noch einmal aufrufen und wieder speichern, damit die Bewertungen neu errechnet werden. ';
$string['configexamplesmode'] = 'Standardmodus für Beispieleinreichungen in Workshops';
$string['configgrade'] = 'Standardwert max. Einreichungspunktzahl in Workshops';
$string['configgradedecimals'] = 'Standardanzahl von Nachkommastellen bei der Anzeige von Punkten.';
$string['configgradinggrade'] = 'Standardwert für max. Bewertungspunktzahl';
$string['configmaxbytes'] = 'Standardwert für die Größe von Dateianhängen an Einreichungen für alle Workshops dieser Website (Kurseinstellungen und andere lokale Einstellungen gelten weiter)';
$string['configstrategy'] = 'Standardwert für Beurteilungsart';
$string['createsubmission'] = 'Einreichen';
$string['daysago'] = 'vor {$a} Tagen';
$string['daysleft'] = '{$a} Tage verbleibend';
$string['daystoday'] = 'heute';
$string['daystomorrow'] = 'morgen';
$string['daysyesterday'] = 'gestern';
$string['deadlinesignored'] = 'Die Zeitvorgaben treffen auf Sie nicht zu';
$string['editassessmentform'] = 'Beurteilungsbogen bearbeiten';
$string['editassessmentformstrategy'] = 'Bearbeite Beurteilungsbogen ({$a})';
$string['editingassessmentform'] = 'Beurteilungsbogen bearbeiten';
$string['editingsubmission'] = 'Einreichung bearbeiten';
$string['editsubmission'] = 'Abgegebene Einreichung bearbeiten';
$string['err_multiplesubmissions'] = 'Während der Bearbeitung des Formulars wurde eine neue Einreichung abgegeben. Mehrere Einreichungen je Nutzer sind jedoch nicht erlaubt.  ';
$string['err_removegrademappings'] = 'Es ist nicht möglich die nicht verwendeten Punktetabellen zu löschen';
$string['evaluategradeswait'] = 'Bitte warten Sie bis die Beurteilungen bewertet und die Punkte berechnet sind.';
$string['evaluation'] = 'Bewertung';
$string['evaluationmethod'] = 'Bewertungsmethode';
$string['evaluationmethod_help'] = 'Das Auswertungsverfahren bestimmt, wie die Punkte für die Beurteilung berechnet wird. Im Augenblick gibt es nur eine Option: Vergleich mit der besten Bewertung ';
$string['example'] = 'Beispieleinreichung';
$string['exampleadd'] = 'Beispieleinreichung hinzufügen';
$string['exampleassess'] = 'Beurteilen einer Beispieleinreichung';
$string['exampleassessments'] = 'Beispieleinreichung zu beurteilen';
$string['exampleassesstask'] = 'Beurteilungsbeispiel';
$string['exampleassesstaskdetails'] = 'erwartet: {$a->expected}<br />beurteilt: {$a->assessed}';
$string['examplecomparing'] = 'Vergleich der Beurteilungen für die Musterlösung';
$string['exampledelete'] = 'Beispieleinreichung löschen';
$string['exampledeleteconfirm'] = 'Sind Sie sicher, dass Sie das folgende Beispieleinreichung löschen wollen? Ein Klick auf die Taste \'Weiter\' löscht die Einreichung.';
$string['exampleedit'] = 'Beispieleinreichung ändern';
$string['exampleediting'] = 'Beispieleinreichung wird geändert';
$string['exampleneedassessed'] = 'Sie haben zuerst alle Beispieleinreichungen zu beurteilen';
$string['exampleneedsubmission'] = 'Sie haben zu erst Ihre Einreichung vorzunehmen und alle Beispieleinreichungen zu beurteilen';
$string['examplesbeforeassessment'] = 'Die Beispieleinreichungen stehen nach Ihrer Einreichung zur Verfügung. Bevor Sie andere Einreichungen beurteilen können, müssen Sie die Beispieleinreichung beurteilen.';
$string['examplesbeforesubmission'] = 'Beispieleinreichungen müssen vor der eigenen Einreichung beurteilt werden';
$string['examplesmode'] = 'Modus Verfahren Beispieleinreichung';
$string['examplesubmissions'] = 'Musterlösungen';
$string['examplesvoluntary'] = 'Die Beurteilung der Beispieleinreichung ist freiwillig';
$string['feedbackauthor'] = 'Rückmeldung an den / die Autor/in';
$string['feedbackby'] = 'Beurteilung von {$a}';
$string['feedbackreviewer'] = 'Rückmeldung an den/die Beurteiler/in';
$string['formataggregatedgrade'] = '{$a->grade}';
$string['formataggregatedgradeover'] = '<del>{$a->grade}</del><br /><ins>{$a->over}</ins>';
$string['formatpeergrade'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span>';
$string['formatpeergradeover'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span>';
$string['formatpeergradeoverweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span> @ <span class="weight">{$a->weight}</span>';
$string['formatpeergradeweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span> @ <span class="weight">{$a->weight}</span>';
$string['givengrades'] = 'Erhaltene Punkte';
$string['gradecalculated'] = 'Berechnete Punkte für Einreichung';
$string['gradedecimals'] = 'Dezimalstellen bei Punkten';
$string['gradegivento'] = '&gt;';
$string['gradeinfo'] = 'Punkte: {$a->received} von {$a->max}';
$string['gradeitemassessment'] = '{$a->workshopname} (beurteilen)';
$string['gradeitemsubmission'] = '{$a->workshopname} (einreichen)';
$string['gradeover'] = 'Einreichungspunkte überschreiben';
$string['gradereceivedfrom'] = '&lt;';
$string['gradesreport'] = 'Punktebericht Workshop';
$string['gradinggrade'] = 'Beurteilungspunkte';
$string['gradinggradecalculated'] = 'Berechnete Beurteilungspunkte';
$string['gradinggrade_help'] = 'Diese Einstellung gibt an, wie viele Punkte maximal für die Einreichung vergeben werden.';
$string['gradinggradeof'] = 'Beurteilungspunkte (von {$a})';
$string['gradinggradeover'] = 'Beurteilungspunkte überschreiben';
$string['gradingsettings'] = 'Punkteeinstellungen';
$string['groupnoallowed'] = 'Sie können keiner Gruppe in diesem Workshop beitreten.';
$string['iamsure'] = 'Ja, ich bin mir sicher';
$string['info'] = 'Info';
$string['instructauthors'] = 'Anweisungen für das Einreichen';
$string['instructreviewers'] = 'Anweisungen für das Beurteilen';
$string['introduction'] = 'Einführung';
$string['latesubmissions'] = 'Verspätete Einreichungen';
$string['latesubmissionsallowed'] = 'Verspätete Einreichungen sind zugelassen';
$string['latesubmissions_desc'] = 'Erlaube verspätete Einreichungen';
$string['latesubmissions_help'] = 'Mit dieser Funktion kann eine Einreichung auch nach dem festgelegten Abgabezeitpunkt noch abgegeben werden. Diese können danach jedoch nicht mehr bearbeitet werden. ';
$string['maxbytes'] = 'Max. Dateigröße';
$string['modulename'] = 'Workshop';
$string['modulename_help'] = 'Der Workshop ist ein besonderer mehrstufiger Aufgabentyp:

Teilnehmer/innen
- bewerten individuell Musterlösungen für eine Aufgabe.
- erstellen eigene Aufgabenlösungen.
- nehmen Selbstbewertung vor.
- erhalten Feedback von anderen Teilnehmer/innen.

Zur Bewertung können verschiedene Kriterien hinterlegt werden.

Hinweis: Es müssen nicht alle Schritte aktiviert werden.';
$string['modulenameplural'] = 'Workshops';
$string['mysubmission'] = 'Meine Einreichung';
$string['nattachments'] = 'Maximale Anzahl von Dateianhängen beim Einreichen';
$string['noexamples'] = 'Es gibt in diesem Workshop keine Beispiele';
$string['noexamplesformready'] = 'Sie müssen zuerst den Beurteilungsbogen erstellen, bevor Sie eine Beispieleinreichung bearbeiten können';
$string['nogradeyet'] = 'Bisher keine Punkte';
$string['nosubmissionfound'] = 'Für diese/n Nutzer/in wurde keine Einreichung gefunden';
$string['nosubmissions'] = 'Bisher gibt es in diesem Workshop keine Einreichungen';
$string['notassessed'] = 'Bisher nicht beurteilt';
$string['nothingtoreview'] = 'Nichts zu beurteilen';
$string['notoverridden'] = 'Nicht überschrieben';
$string['noworkshops'] = 'Es gibt keine Workshops in diesem Kurs';
$string['noyoursubmission'] = 'Sie haben bisher Ihre Einreichung nicht übermittelt';
$string['nullgrade'] = '-';
$string['page-mod-workshop-x'] = 'Jede Workshop-Seite';
$string['participant'] = 'Teilnehmer/in';
$string['participantrevierof'] = 'Teilnehmer/in ist Beurteiler/in von';
$string['participantreviewedby'] = 'Teilnehmer/in wird beurteilt von';
$string['phaseassessment'] = 'Beurteilungsphase';
$string['phaseclosed'] = 'Geschlossen';
$string['phaseevaluation'] = 'Bewertungsphase';
$string['phasesetup'] = 'Vorbereitungsphase';
$string['phasesoverlap'] = 'Die Einreichungsphase und die Bewertungsphase dürfen sich nicht überlappen.';
$string['phasesubmission'] = 'Einreichungsphase';
$string['pluginadministration'] = 'Workshop-Administration';
$string['pluginname'] = 'Workshop';
$string['prepareexamples'] = 'Beispieleinreichungen erstellen';
$string['previewassessmentform'] = 'Vorschau';
$string['publishedsubmissions'] = 'Veröffentlichte Einreichungen';
$string['publishsubmission'] = 'Einreichung veröffentlichen';
$string['publishsubmission_help'] = 'Wenn der Workshop beendet ist, werden die Einreichungen den anderen Teilnehmenden veröffentlicht.';
$string['reassess'] = 'Erneut beurteilen';
$string['receivedgrades'] = 'Punkte erhalten';
$string['recentassessments'] = 'Workshop-Beurteilungen';
$string['recentsubmissions'] = 'Workshop-Einreichungen';
$string['saveandclose'] = 'Speichern und schließen';
$string['saveandcontinue'] = 'Speichern und weiter bearbeiten';
$string['saveandpreview'] = 'Speichern und Vorschau';
$string['selfassessmentdisabled'] = 'Selbstbeurteilung deaktiviert';
$string['showingperpage'] = '{$a} Einträge pro Seite';
$string['showingperpagechange'] = 'Ändern...';
$string['someuserswosubmission'] = 'Mindestens ein/e Teilnehmer/in hat Ihre Einreichung noch nicht vorgenommen';
$string['sortasc'] = 'Aufwärts sortieren';
$string['sortdesc'] = 'Abwärts sortieren';
$string['strategy'] = 'Punktestrategie';
$string['strategyhaschanged'] = 'Die Punktestrategie des Workshops würde seit dem Beginn der Änderungen geändert.';
$string['strategy_help'] = 'Die Bewertungsstrategie das verwendete Bewertungsformular und die Bewertungsmethode der Einreichungen. Es gibt vier Optionen:

* Akkumulative Bewertung: Kommentare und Bewertungen für vordefinierte Aspekte
* Kommentare: Es gibt nur Kommentare zu vordefinierten Aspekten, jedoch keine Bewertungen
* Anzahl der Fehler: Kommentare und Ja/Nein Bewertungen zu vordefinierten Aussagen
* Rubriken: Verschiedene Level zu vordefinierten Aspekten';
$string['submission'] = 'Einreichung';
$string['submissionattachment'] = 'Dateianhang';
$string['submissionby'] = 'Eingereicht von {$a}';
$string['submissioncontent'] = 'Einreichungsinhalt';
$string['submissionend'] = 'Abgabetermin für Einreichungen';
$string['submissionendbeforestart'] = 'Der Abgabetermin für Einreichungen kann nicht vor dem Beginn der Einreichung liegen';
$string['submissionenddatetime'] = 'Abgabetermin für Einreichungen: {$a->daydatetime} ({$a->distanceday})';
$string['submissionendevent'] = '{$a} (Abgabetermin für Einreichungen)';
$string['submissionendswitch'] = 'Zur nächsten Phase nach dem Abgabetermin für Einreichungen wechseln';
$string['submissionendswitch_help'] = 'Wenn diese Option aktiviert und ein Abgabetermin für Einreichungen festgelegt sind, wechselt der Workshop automatisch in die Beurteilungsphase.

Wenn diese Option aktiviert ist, sollte außerdem die \'Methode zur Einreichungszuteilung\' konfiguriert sein. Wenn die Einreichungen nicht zugewiesen sind, kann keine Beurteilung stattfinden, außer dass der Workshop sich selber in der Beurteilungsphase befindet.';
$string['submissiongrade'] = 'Punkte für Einreichung';
$string['submissiongrade_help'] = 'Diese Einstellung gibt an, wie viele Punkte maximal für eine Einreichung erhalten werden können.';
$string['submissiongradeof'] = 'Punkte für Einreichungen (of {$a})';
$string['submissionsettings'] = 'Einstellungen Einreichungen';
$string['submissionstart'] = 'Start für Einreichungen';
$string['submissionstartdatetime'] = 'Einreichungen sind ab {$a->daydatetime} ({$a->distanceday}) möglich';
$string['submissionstartevent'] = '{$a} (Start für Einreichungen)';
$string['submissiontitle'] = 'Titel';
$string['subplugintype_workshopallocation'] = 'Methode zur Einreichungszuteilung';
$string['subplugintype_workshopallocation_plural'] = 'Methoden zur Einreichungszuteilung';
$string['subplugintype_workshopeval'] = 'Bewertungsmethode';
$string['subplugintype_workshopeval_plural'] = 'Methode zur Bewertungsüberprüfung';
$string['subplugintype_workshopform'] = 'Punktestrategie';
$string['subplugintype_workshopform_plural'] = 'Bewertungsstrategien';
$string['switchingphase'] = 'Wechseln der Phase';
$string['switchphase'] = 'Phase wechseln';
$string['switchphase10info'] = 'Sie sind dabei in die <strong>Vorbereitungsphase</strong> des Workshops zu wechseln. In dieser Phase können Teilnehmende ihre Einreichungen oder Beurteilungen nicht bearbeiten. Trainer/innen können diese Phase dazu nutzen, um Workshop-Einstellungen, die Bewertungsstrategie oder Beurteilungsbögen zu ändern.';
$string['switchphase20info'] = 'Sie sind dabei in die <strong>Einreichungsphase</strong> des Workshops zu wechseln. In dieser Phase können Teilnehmende ihre Einreichungen innerhalb des ggf. definierten Zeitfensters übermitteln. Trainer/innen ordnen anschließend die Einreichungen den Beurteilenden zu.';
$string['switchphase30auto'] = 'Der Workshop wechselt nach {$a->daydatetime} ({$a->distanceday}) automatisch in die Beurteilungsphase.';
$string['switchphase30info'] = 'Sie sind dabei in die <strong>Beurteilungsphase</strong> des Workshops zu wechseln. In dieser Phase können Teilnehmende innerhalb des ggf. definierten Zeitfensters Beurteilungen zu den zugeordneten Einreichungen erstellen oder bearbeiten.';
$string['switchphase40info'] = 'Sie sind dabei in die <strong>Bewertungsphase</strong> des Workshops zu wechseln. In dieser Phase können Teilnehmende ihre Einreichungen oder Beurteilungen nicht bearbeiten. Trainer/innen nutzen die Bewertungswerkzeuge um die abschließende Bewertung vorzunehmen und Rückmeldungen an die Beurteiler zu geben.';
$string['switchphase50info'] = 'Sie sind dabei den Workshop zu beenden. Die errechneten Bewertungen werden in das Notenbuch übernommen. Teilnehmende können ihre Einreichungen, ihre Beurteilungen und Bewertungen aufrufen.';
$string['taskassesspeers'] = 'Andere Teilnehmende bewerten';
$string['taskassesspeersdetails'] = 'gesamt: {$a->total}<br />ausstehend: {$a->todo}';
$string['taskassessself'] = 'Selbstbeurteilung';
$string['taskinstructauthors'] = 'Auftrag für das Einreichen verfassen';
$string['taskinstructreviewers'] = 'Auftrag für das Beurteilen verfassen';
$string['taskintro'] = 'Workshop-Einführung verfassen';
$string['tasksubmit'] = 'Übermitteln Sie Ihre Einreichung';
$string['toolbox'] = 'Workshop-Hilfsmittel';
$string['undersetup'] = 'Der Workshop wird gerade aktualisiert. Bitte warten Sie, bis die nächste Phase freigegeben wurde.';
$string['useexamples'] = 'Beispieleinreichungen benutzen';
$string['useexamples_desc'] = 'Beispieleinreichungen sind für Praxiserfahrungen im beurteilen sinnvoll';
$string['useexamples_help'] = 'Mit dieser Funktion können Teilnehmende eine oder mehrere Musterlösungen selber bewerten und ihre Bewertung mit der Referenzbewertung des Trainers abgleichen. Die Bewertung wird bei der Gesamtbewertung des Workshops nicht berücksichtigt. ';
$string['usepeerassessment'] = 'Gegenseitiges Beurteilen benutzen';
$string['usepeerassessment_desc'] = 'Teilnehmer/innen beurteilen Einreichungen von anderen';
$string['usepeerassessment_help'] = 'Mit dieser Funktion erhält der Teilnehmende  Lösungen anderer Teilnehmender zur Bewertung. Er/sie erhält dafür ebenfalls eine Bewertung, die der Bewertung für die eigene Lösung zugerechnet wird. ';
$string['userdatecreated'] = 'eingereicht am <span>{$a}</span>';
$string['userdatemodified'] = 'geändert am <span>{$a}</span>';
$string['userplan'] = 'Workshop-Navigator';
$string['userplan_help'] = 'Der Workshop-Navigator zeigt alle Phasen und einzelne Schritte in den Phasen an. Die aktuelle Phase ist farblich gekennzeichnet und erledigte Schritte sind mit einem Haken gekennzeichnet.';
$string['useselfassessment'] = 'Selbstbeurteilung benutzen';
$string['useselfassessment_desc'] = 'Teilnehmer/innen können ihre eigene Einreichung beurteilen';
$string['useselfassessment_help'] = 'Mit der Funktion kann einem Nutzer auch seine eigene Einreichung zur Bewertung zugewiesen werden. Er erhält dann dafür eine Bewertung, die der externen Bewertung der Einreichung hinzuaddiert wird. ';
$string['weightinfo'] = 'Gewichtung: {$a}';
$string['withoutsubmission'] = 'Beurteiler ohne eigene Einreichung';
$string['workshop:addinstance'] = 'Neuen Workshop hinzufügen';
$string['workshop:allocate'] = 'Beurteiler/innen zuordnen';
$string['workshop:editdimensions'] = 'Beurteilungsbögen bearbeiten';
$string['workshopfeatures'] = 'Workshop-Funktionen';
$string['workshop:ignoredeadlines'] = 'Zeitvorgaben ignorieren';
$string['workshop:manageexamples'] = 'Beispieleinreichung organisieren';
$string['workshopname'] = 'Workshop-Titel';
$string['workshop:overridegrades'] = 'Berechnete Punkte überschreiben';
$string['workshop:peerassess'] = 'Gegenseitiges Beurteilen';
$string['workshop:publishsubmissions'] = 'Einreichungen veröffentlichen';
$string['workshop:submit'] = 'Absenden';
$string['workshop:switchphase'] = 'Phase wechseln';
$string['workshop:view'] = 'Workshop anzeigen';
$string['workshop:viewallassessments'] = 'Alle Beurteilungen betrachten';
$string['workshop:viewallsubmissions'] = 'Alle Einreichungen betrachten';
$string['workshop:viewauthornames'] = 'Autorennamen betrachten';
$string['workshop:viewauthorpublished'] = 'Autor/innen von veröffentlichten Beiträgen ansehen';
$string['workshop:viewpublishedsubmissions'] = 'Veröffentlichte Einreichungen betrachten';
$string['workshop:viewreviewernames'] = 'Beurteilernamen anzeigen';
$string['yourassessment'] = 'Ihre Einreichung';
$string['yoursubmission'] = 'Ihre Einreichung';
