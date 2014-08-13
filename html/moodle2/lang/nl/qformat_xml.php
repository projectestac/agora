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
 * Strings for component 'qformat_xml', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   qformat_xml
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['invalidxml'] = 'Ongeldig XML-bestand - Verwacht een string (gebruik CDATA?)';
$string['pluginname'] = 'Moodle XML opmaak';
$string['pluginname_help'] = 'Dit is een Moodle-specifiek formaat voor het importeren en exporteren van vragen.';
$string['truefalseimporterror'] = '<b>Waarschuwing</b>: De waar/niet waar vraag  \'{$a->questiontext}\' kon niet correct geïmporteerd worden. Het was niet duidelijk of het juiste antwoord waar of niet waar is. De vraag is geïmporteerd en er is verondersteld dat het juiste antwoord \'{$a->answer}\' is. Als dit niet correct is, dan zul je de vraag moeten bewerken.';
$string['unsupportedexport'] = 'Vraagtype {$a} wordt niet ondersteund door XML-export';
$string['xmlimportnoname'] = 'Er ontbreekt een vraagnaam in het XML-bestand';
$string['xmlimportnoquestion'] = 'Er ontbreekt een vraagtekst in het XML-bestand';
$string['xmltypeunsupported'] = 'Vraagtype {$a} is niet ondersteund door XML import';
