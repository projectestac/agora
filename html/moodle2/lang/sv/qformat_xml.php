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
 * Strings for component 'qformat_xml', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   qformat_xml
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['invalidxml'] = 'Ogiltig XML-fil - sträng förväntades (använd CDATA?)';
$string['pluginname'] = 'Moodle XML-format';
$string['pluginname_help'] = 'Detta är en Moodle-specifikt format för att importera och exportera frågor.';
$string['truefalseimporterror'] = '<b>Varning:</b> sant / falskt fråga \'{$a->questiontext}\' kunde inte importeras på rätt sätt. Det var inte klart om det rätta svaret är sant eller falskt. Frågan har importerats under förutsättning att svaret är "{$a->answer}". Om detta inte är korrekt, måste du redigera frågan.';
$string['unsupportedexport'] = 'Frågetyp {$a} stöds inte av XML-export';
$string['xmlimportnoname'] = 'Frågenamnet saknas i XML-filen';
$string['xmlimportnoquestion'] = 'Texten i frågan saknas i XML-filen';
$string['xmltypeunsupported'] = 'Frågetyp {$a} stöds inte av XML-import';
