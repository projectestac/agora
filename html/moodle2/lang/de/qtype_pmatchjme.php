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
 * Strings for component 'qtype_pmatchjme', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_pmatchjme
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowanothertry'] = 'Einen weiteren Versuch erlauben';
$string['answeringoptions'] = 'Einstellungen für den Java Molecular Editor';
$string['atomcount'] = 'Feedback über Anzahl der Atome';
$string['autoez'] = 'Automatische Erstellung von SMILES mit E,Z Stereochemie ("autoez")';
$string['enablejava'] = 'Konnte Java Molecular Editor nicht laden. Sie haben keine funktionierende Java Laufzeitumgebung in Ihrem Browser. Sie brauchen diese, um die Frage zu beantworten.';
$string['enablejavaandjavascript'] = 'Lade JME Editor... Wenn diese Nachricht nicht durch den JME Editor ersetzt wird, funktioniert JavaScript und/oder die Java Laufzeitumgebung in Ihrem Browser nicht richtig.';
$string['firstcorrectanswermustbestraightmatch'] = 'Die erste richtige Antwort muss direkt zu einer SMILES Zeichenkette ohne Wild Cards, beispielsweise match(SMILESEXPRESSION), abgleichbar sein.';
$string['firstcorrectanswermustnotrequireatomcountfeedback'] = 'Die erste richtige Antwort darf kein Feedback über die Anzahl der Atome beinhalten';
$string['nostereo'] = 'Stereochemie nicht beachten beim Erzeugen von SMILES ("nostereo")';
$string['pluginname'] = 'Musterabgleich mit Java Molecular Editor';
$string['pluginnameadding'] = '"Musterabgleich mit Java Molecular Editor" Frage hinzufügen';
$string['pluginnameediting'] = '"Musterabgleich mit Java Molecular Editor" Frage bearbeiten';
$string['pluginname_help'] = 'Als Antwort auf eine Frage (welche auch ein Bild sein kann) benutzt der Antwortende den Java Molecular Editor, um eine molekulare Struktur zu beschreiben. Es darf mehrere mögliche Antworten geben, welche unterschiedlich gewertet werden.';
$string['pluginnamesummary'] = 'Ermöglicht es, Moleküle mit dem Java Molecular Editor zu zeichnen, welche nach dem Abgleich mit mehreren Muster-Antworten (beschrieben durch die OU Musterabgleichs-Syntax) unterschiedlich bewertet werden können.';
$string['smiles_aromatic_c'] = 'Aromatische Kohlenstoffatome';
$string['smiles_br'] = 'Bromatome';
$string['smiles_c'] = 'Aliphatische Kohlenstoffatome';
$string['smiles_cl'] = 'Chloratome';
$string['smilescorrectcount'] = 'Sie haben die richtige molekulare Formel, aber nicht die richtige Struktur';
$string['smiles_doublebond'] = 'Doppelbindungen';
$string['smilesequal'] = 'Sie haben die korrekte Anzahl von {$a}.';
$string['smiles_f'] = 'Fluoratome';
$string['smiles_i'] = 'Jodatome';
$string['smiles_n'] = 'Stickstoffatome';
$string['smiles_o'] = 'Sauerstoffatome';
$string['smiles_s'] = 'Schwefelatome';
$string['smilestoofew'] = 'Sie haben zuwenig {$a}.';
$string['smilestoomany'] = 'Sie haben zuviel {$a}.';
$string['smiles_triplebond'] = 'Dreifachbindungen';
