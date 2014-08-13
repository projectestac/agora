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
 * Strings for component 'assignfeedback_offline', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_offline
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmimport'] = 'Bekräfta import av betyg';
$string['default'] = 'Aktiverat som standard';
$string['default_help'] = 'Om aktiverad så kommer betygsättning offline med arbetsblad aktiveras som standard för alla nya inlämningsuppgifter.';
$string['downloadgrades'] = 'Ladda ner arbetsblad för betygsättning';
$string['enabled'] = 'Arbetsblad för betygsättning offline';
$string['enabled_help'] = 'Om aktiverad så kommer läraren att kunna ladda ned och upp ett arbetsblad med elevbetyg när inlämningarna betygsätts.';
$string['feedbackupdate'] = 'Sätt fält "{$a->field}" för "{$a->student}" till "{$a->text}"';
$string['gradelockedingradebook'] = 'Betyget har låsts i betygskatalogen för {$a}';
$string['graderecentlymodified'] = 'Betyget har ändrats i Moodle mer nyligen än i arbetsbladet för betygsättning för {$a}';
$string['gradesfile'] = 'Arbetsblad för betygsättning (csv-format)';
$string['gradesfile_help'] = 'Arbetsblad för betygsättning med ändrade betyg. Den här filen måste vara en csv-fil som laddats ned från den här uppgiften och måste innehålla kolumner för elevbetyg samt identifierare. Teckenkodningen för filen måste vara "UTF-8"';
$string['gradeupdate'] = 'Sätt betyg för {$a->student} till {$a->grade}';
$string['ignoremodified'] = 'Tillåt uppdatering av poster som ändrats senare i Moodle än i kalkylbladet.';
$string['ignoremodified_help'] = 'När arbetsbladet för betygsättning laddas ned från Moodle så innehåller den senast modifierat-datum för varje betyg. Om någon av betygen uppdaterats i Moodle mer nyligen än arbetsbladet laddats ned så kommer Moodle, som standard, att vägra skriva över den uppdaterade informationen när betygen importeras. Genom att välja den här optionen så kommer Moodle inaktivera säkerhetskontrollen, något som skulle kunna innebära att multipla betygsättare skriver över varandras betyg.';
$string['importgrades'] = 'Bekräfta ändringar i arbetsbladet för betygsättning';
$string['invalidgradeimport'] = 'Moodle kunde inte läsa det uppladdade arbetsbladet. Kontrollera att det sparas i kommaseparerat format (.csv) och försök igen.';
$string['nochanges'] = 'Inga ändrade betyg funna i det uppladdade arbetsbladet';
$string['offlinegradingworksheet'] = 'Betyg';
$string['pluginname'] = 'Arbetsblad för betygsättning offline';
$string['processgrades'] = 'Importera betyg';
$string['skiprecord'] = 'Hoppa över post';
$string['updatedgrades'] = 'Uppdaterade {$a} betyg och återkoppling';
$string['updaterecord'] = 'Uppdatera post';
$string['uploadgrades'] = 'Ladda upp arbetsblad för betygsättning';
