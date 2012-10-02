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
 * Strings for component 'qformat_xml', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   qformat_xml
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['invalidxml'] = 'Ungültige XML-Datei - String erwartet (CDATA wenden?)';
$string['pluginname'] = 'Moodle-XML-Format';
$string['pluginname_help'] = 'Dies ist ein moodle-spezifisches Format für den Import und Export von Fragen.';
$string['truefalseimporterror'] = '<b>Warnung</b>: Die Wahr/Falsch-Frage \'{$a->questiontext}\' konnte nicht richtig importiert werden, da nicht klar war, ob die richtige Antwort "wahr" oder "falsch" ist. Die Frage wurde unter der Annahme importiert, dass die Antwort \'{$a->answer}\' gewünscht wird. Sollte dieses nicht korrekt sein so müssen Sie die Frage entsprechend überarbeiten.';
$string['unsupportedexport'] = 'Der Fragetyp {$a} wird im XML-Export nicht unterstützt';
$string['xmlimportnoname'] = 'Fehlender Fragename in der XML-Datei';
$string['xmlimportnoquestion'] = 'Fehlender Fragetext in der XML-Datei';
$string['xmltypeunsupported'] = 'Fragetyp \'{$a}\' wird beim XML-Import nicht unterstützt';
