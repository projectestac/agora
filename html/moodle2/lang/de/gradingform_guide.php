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
 * Strings for component 'gradingform_guide', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   gradingform_guide
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcomment'] = 'Oft benutzten Kommentar hinzufügen';
$string['addcriterion'] = 'Kriterium hinzufügen';
$string['alwaysshowdefinition'] = 'Beschreibung für Teilnehmer/innen anzeigen';
$string['backtoediting'] = 'Zurück zum Bearbeiten';
$string['clicktocopy'] = 'Anklicken, um diesen Text in Kriterienfeedback zu kopieren.';
$string['clicktoedit'] = 'Zum Bearbeiten anklicken';
$string['clicktoeditname'] = 'Anklicken, um Kriterienbezeichnung zu ändern.';
$string['comments'] = 'Häufig verwendete Kommentare';
$string['commentsdelete'] = 'Kommentar löschen';
$string['commentsempty'] = 'Zum Bearbeiten anklicken';
$string['commentsmovedown'] = 'Nach unten';
$string['commentsmoveup'] = 'Nach oben';
$string['confirmdeletecriterion'] = 'Möchten Sie dieses Element wirklich löschen?';
$string['confirmdeletelevel'] = 'Möchten Sie dieses Level wirklich löschen?';
$string['criterion'] = 'Kriterium';
$string['criteriondelete'] = 'Kriterium löschen';
$string['criterionempty'] = 'Kriterium bearbeiten';
$string['criterionmovedown'] = 'Nach unten bewegen';
$string['criterionmoveup'] = 'Nach oben bewegen';
$string['criterionname'] = 'Kriteriumsname';
$string['definemarkingguide'] = 'Bewertungs-Richtlinie festlegen';
$string['description'] = 'Beschreibung';
$string['descriptionmarkers'] = 'Beschreibung für Bewerter/innen';
$string['descriptionstudents'] = 'Beschreibung für Teilnehmer/innen';
$string['err_maxscorenotnumeric'] = 'Der Eintrag für ein Kriterium Höchstpunktzahl muss eine Zahl sein.';
$string['err_nocomment'] = 'Kommentar darf nicht leer sein';
$string['err_nodescription'] = 'Beschreibung für Teilnehmer/innen darf nicht leer sein';
$string['err_nodescriptionmarkers'] = 'Das Beschreibungsfeld darf nicht leer bleiben.';
$string['err_nomaxscore'] = 'Der Eintrag für ein Kriterium Höchstpunktzahl darf nicht leer bleiben.';
$string['err_noshortname'] = 'Der Eintrag für einen Kriterienname darf nicht leer bleiben.';
$string['err_scoreinvalid'] = 'Der eingegebene Wert für {$a->crterianame} ist nicht gültig. Der Höchstwert ist: {$a->maxscore}.';
$string['gradingof'] = '{$a} Bewertung';
$string['guidemappingexplained'] = 'Hinweis: Die Bewertungsrichtlinie sieht eine Höchstbewertung mit <b>{$a->maxscore} Punkten </b> vor. Die Höchstbewertung in den Einstellungen der Aktivität ist abweichend mit {$a->modulegrade} festgelegt. Der Höchstwert der Punkte wird an die Festlegung in der Aktivität angepasst.
Dazwischen liegende Punktwerte werden gerundet und ggfs. dem nächstliegenden Punktwert zugewiesen werden.';
$string['guidenotcompleted'] = 'Geben Sie bitte einen gültigen Wert für jedes Kriterium ein.';
$string['guideoptions'] = 'Optionen für Bewertungs-Richtlinien';
$string['guidestatus'] = 'Derzeitiger Status';
$string['hidemarkerdesc'] = 'Beschreibung für Bewerter/innen verbergen';
$string['hidestudentdesc'] = 'Beschreibung für Teilnehmer/innen verbergen';
$string['maxscore'] = 'Höchstbewertung';
$string['name'] = 'Name';
$string['needregrademessage'] = 'Die Richtlinie für die Bewertung wurde geändert nachdem diese/r Teilnehmer/in bewertet wurde. Teilnehmer/innen werden die Einstellungen so lange nicht sehen bis Sie den Bewertungsbereich geprüft und die Bewertung aktualisiert haben.';
$string['pluginname'] = 'Bewertungsrichtlinie';
$string['previewmarkingguide'] = 'Vorschau für Bewertungsrichtlinie';
$string['regrademessage1'] = 'Sie nehmen nun Änderungen im Bewertungsschema vor. Dieses wurde bereits zuvor für die Bewertung von Teilnehmer/innen verwandt. Prüfen Sie bitte, ob die zuvor vorgenommenen Bewertungen angepasst werden müssen. Diese Bewertungen werden für Teilnehmer/innen unsichtbar gesetzt bis sie die Prüfung vorgenommen haben.';
$string['regrademessage5'] = 'Sie nehmen nun wesentliche Änderungen des Bewertungsschema vor, das bereits zuvor verwandt worden ist. Die Einträge im Kurs-Bewertungsbereich bleiben zunächst unverändert. Die Detailbewertungen der Aktivität werden für Teilnehmer/innen jedoch verborgen, bis Sie die Bewertungen überprüft und ggfs. bestätigt oder angepasst haben.';
$string['regradeoption0'] = 'Nicht zur Neubewertung markieren';
$string['regradeoption1'] = 'Für Neubewertung markieren';
$string['restoredfromdraft'] = 'Hinweis: Die letzte Bewerung für diese/n Nutzer/in wurde nicht richtig abgespeichert. Die Entwurfs-Bewertungen wurden daher wieder hergestellt. Mit dem \'Abbrechen\'-Button können Sie diese Änderung rückgängig machen.';
$string['save'] = 'Sichern';
$string['saveguide'] = 'Bewertungsrichtlinie speichern und aktivieren.';
$string['saveguidedraft'] = 'Als Entwurf sichern';
$string['score'] = 'Punkt';
$string['showmarkerdesc'] = 'Beschreibung für Kriterien anzeigen';
$string['showmarkspercriterionstudents'] = 'Bewertung je Kriterium Teilnehmer/innen anzeigen';
$string['showstudentdesc'] = 'Kriterienbeschreibung anzeigen';
