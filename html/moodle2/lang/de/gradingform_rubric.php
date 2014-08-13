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
 * Strings for component 'gradingform_rubric', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   gradingform_rubric
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcriterion'] = 'Kriterium hinzufügen';
$string['alwaysshowdefinition'] = 'Nutzer/innen erlauben, eine Vorschau auf die im Modul benutzte Rubrik zu bekommen (andernfalls wird die Rubrik erst nach der Bewertung sichtbar)';
$string['backtoediting'] = 'Zurück zum Bearbeiten';
$string['confirmdeletecriterion'] = 'Wollen Sie dieses Kriterium wirklich löchen?';
$string['confirmdeletelevel'] = 'Möchten Sie dieses Level wirklich löschen?';
$string['criterionaddlevel'] = 'Level hinzufügen';
$string['criteriondelete'] = 'Kriterium löschen';
$string['criterionempty'] = 'Zum Bearbeiten des Kriteriums anklicken';
$string['criterionmovedown'] = 'Nach unten verschieben';
$string['criterionmoveup'] = 'Nach oben verschieben';
$string['definerubric'] = 'Rubric definieren';
$string['description'] = 'Beschreibung';
$string['enableremarks'] = 'Erläuterungen zu jedem Kriterium für Bewerter/in zulassen';
$string['err_mintwolevels'] = 'Ein Kriterium benötigt zumindest zwei Werte';
$string['err_nocriteria'] = 'Rubrics benötigen mindestens ein Kriterium';
$string['err_nodefinition'] = 'Die Leveldefinition darf nicht leer bleiben';
$string['err_nodescription'] = 'Die Kriterienbeschreibung darf nicht leer bleiben';
$string['err_scoreformat'] = 'Die Punkte für jedes Level müssen eine positive Zahl sein.';
$string['err_totalscore'] = 'Höchstzahl an erreichbaren Punkten muss größer als Null sein';
$string['gradingof'] = '{$a} werden bewertet';
$string['leveldelete'] = 'Level löschen';
$string['levelempty'] = 'Klicken um Level zu bearbeiten';
$string['name'] = 'Name';
$string['needregrademessage'] = 'Die Rubric-Definition wurde geändert nachdem ein Teilnehmer bewertet wurde. Teilnehmer sehen diese Bewertung solange nicht bis Sie die Rubric geprüft und die Bewertung aktualisiert haben.';
$string['pluginname'] = 'Rubric';
$string['previewrubric'] = 'Rubrik-Vorschau';
$string['regrademessage1'] = 'Sie ändern eine Rubric, die bereits zur Bewertung verwendet wurde. Existierende Bewertungen müssen nun noch einmal durchgesehen werden. Bis dahin werden diese Bewertungen für Teilnehmende verborgen.';
$string['regrademessage5'] = 'Sie nehmen wesentliche Änderungen an der Rubric vor. Die Rubric wurde bereits für Bewertugen genutzt. Der Wert im Bewertungsbereich bleibt unverändert. Die Rubric wird für Teilnehmende jedoch verborgen, bis Sie die Bewertungen geprüft haben.';
$string['regradeoption0'] = 'Nicht für Neubewertung markieren';
$string['regradeoption1'] = 'Für Neubewertung markieren';
$string['restoredfromdraft'] = 'Anmerkung: Der letzte Versuch zur Bewertung dieses Nutzers wurde nicht richtig gespeichert und nur als Entwurf hinterlegt. Mit dem Abbrechen Button unten können Sie diese Änderungen berabeiten.';
$string['rubric'] = 'Rubric';
$string['rubricmapping'] = 'Regeln der Zuordnung von Punkten zu Bewertungen';
$string['rubricmappingexplained'] = 'Der geringst mögliche Punktwert für diese Rubric ist. <b>{$a->minscore} Punkte </b> und wird der niedrgsten Bewertung (Null falls keine eigene Skala verwendet wird) zugewiesen.
Der Höchstwert <b>{$a->maxscore} Punkte</b> wird der Höchstbewertung zugeordnet. <br />Dazwischen liegende Werte werden der jeweils am nächsten liegenden Bewerung zugeordnet.<br />
Wenn eine Skala statt Punktwerten genutzt wird erfolgt die Zuordnung entsprechend.';
$string['rubricnotcompleted'] = 'Bitte tragen sie bei jedem Kriterium einen Wert ein';
$string['rubricoptions'] = 'Rubric-Optionen';
$string['rubricstatus'] = 'Derzeitiger Rubric-Status';
$string['save'] = 'Speichern';
$string['saverubric'] = 'Rubrics speichern und fertig machen';
$string['saverubricdraft'] = 'Als Entwurf speichern';
$string['scorepostfix'] = '{$a} Punkte';
$string['showdescriptionstudent'] = 'Rubric-Beschreibung zu Bewertungen anzeigen';
$string['showdescriptionteacher'] = 'Rubric-Beschreibung zur Evaluation anzeigen';
$string['showremarksstudent'] = 'Bemerkungen zu Bewertungen anzeigen';
$string['showscorestudent'] = 'Punkte für jedes Level bei Bewertung anzeigen';
$string['showscoreteacher'] = 'Punkte für jedes Level zur Evaluation anzeigen';
$string['sortlevelsasc'] = 'Sortierfolge für Level:';
$string['sortlevelsasc0'] = 'Absteigend (Punkte)';
$string['sortlevelsasc1'] = 'Aufsteigend (Punkte)';
