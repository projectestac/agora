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
 * Strings for component 'rating', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   rating
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aggregateavg'] = 'Betyg/omdömen i genomsnitt (medel)';
$string['aggregatecount'] = 'Räkning av betyg/omdömen';
$string['aggregatemax'] = 'Maximalt betyg/omdöme';
$string['aggregatemin'] = 'Minimalt betyg/omdöme';
$string['aggregatenone'] = 'Inga betyg/omdömen';
$string['aggregatesum'] = 'Sammanlagda betyg/omdömen';
$string['aggregatetype'] = 'Typ av aggregation';
$string['aggregatetype_help'] = 'Aggregationstypen (sammanställningstypen) bestämmer hur bedömningar/poäng samlas ihop till modulens betyg i Betygsrapporten.<BR>
* Betyg/omdömen i genomsnitt - Medelresultatet av alla satta poäng<BR>
* Räkning av betyg/omdömen - Antalet poängsatta inlägg blir det slutliga betyget (observera att detta inte kan överstiga aktivitetens inställda maximala betyg)<BR>
* Maximalt betyg/omdöme - Det högst poängsatta inlägget sätter slutbetyget<BR>
* Minimalt betyg/omdöme - Det lägst poängsatta inlägget sätter slutbetyget<BR>
* Sammanlagda betyg/omdömen - Summan av poängen för de bedömda inläggen (observera att detta inte kan överstiga aktivitetens inställda maximala betyg). <BR>
Om "Inga betyg/omdömen" är vald kommer inte aktiviteten att visas i Betygsrapporten.';
$string['allratingsforitem'] = 'Alla inskickade betyg/omdömen';
$string['capabilitychecknotavailable'] = 'Rolltillstånd kan inte visas innan aktiviteten sparats';
$string['couldnotdeleteratings'] = 'Tyvärr, det kan inte tas bort eftersom personer redan har betygsatt/gett omdömen om det.';
$string['noratings'] = 'Det finns inga inskickade betyg/omdömen';
$string['noviewanyrate'] = 'Du kan bara titta på resultaten för objekt som du har gjort';
$string['noviewrate'] = 'Du har inte förmågan att se betyg/omdömen för objekt';
$string['rate'] = 'Betygssätt/avge omdömen';
$string['ratepermissiondenied'] = 'Du har inte tillstånd att betygssätta/avge omdöme om det här ';
$string['rating'] = 'Betyg/omdöme';
$string['ratinginvalid'] = 'Betyget/omdömet är ogiltigt';
$string['ratings'] = 'Betyg/omdömen';
$string['ratingtime'] = 'Begränsa betygsättning till inlägg gjorda inom följande period:';
$string['rolewarning'] = 'Roller som har tillstånd att sätta betyg/avge omdömen';
$string['rolewarning_help'] = 'För att göra bedömning/betygssättning ska tillståndet moodle/rating:rate vara inställt, och eventuella modulspecifika inställningar. Användare med angivna roller ska kunna sätta betyg. Vilka roller som anges kan ändras under Tillstånd i menyn Inställningar.';
