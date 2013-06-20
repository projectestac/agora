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
 * Strings for component 'rating', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   rating
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aggregateavg'] = 'Gemiddelde van de beoordelingen';
$string['aggregatecount'] = 'Aantal beoordelingen';
$string['aggregatemax'] = 'Maximum beoordeling';
$string['aggregatemin'] = 'Minimumbeoordeling';
$string['aggregatenone'] = 'Geen beoordelingen';
$string['aggregatesum'] = 'Som van beoordelingen';
$string['aggregatetype'] = 'Aggregatieype';
$string['aggregatetype_help'] = 'Het aggregatietype bepaalt hoe beoordelingen gecombineerd worden om tot het uiteindelijke cijfer in het cijferboek te komen.

* Gemiddelde van de beoordelingen - Het gemiddelde van alle beoordelingen
* Het aantal beoordelingen - Het aantal beoordeelde items wordt het eindcijfer. Merk op dat het totaal aantal niet hoger kan zijn dan het maximumcijfer voor de activiteit.
* Maximum - De hoogst behaalde beoordeling wordt het eindcijfer.
* Minimum - De laagst behaalde beoordeling wordt het eindcijfer.

Indien "Geen beoordelingen" is geselecteerd, dan zal de activiteit niet in het cijferboek verschijnen.';
$string['allowratings'] = 'Toelaten dat items beoordeeld worden?';
$string['allratingsforitem'] = 'Alle ingestuurde beoordelingen';
$string['capabilitychecknotavailable'] = 'Controle mogelijkheid niet beschikbaar tot de activiteit bewaard is';
$string['couldnotdeleteratings'] = 'Dit kan niet verwijderd worden omdat het al beoordeeld is';
$string['norate'] = 'Beoordelen van items niet toegelaten!';
$string['noratings'] = 'Geen beoordelingen ingestuurd';
$string['noviewanyrate'] = 'Je kan alleen de resultaten bekijken voor items die jij gemaakt hebt';
$string['noviewrate'] = 'Je hebt het recht niet om beoordelingen van items te bekijken';
$string['rate'] = 'Beoordeel';
$string['ratepermissiondenied'] = 'Je hebt het recht niet om dit item te beoordelen';
$string['rating'] = 'Beoordeling';
$string['ratinginvalid'] = 'Beoordeling niet geldig';
$string['ratings'] = 'Beoordelingen';
$string['ratingtime'] = 'Beperk beoordelingen tot items met een datum in dit bereik:';
$string['rolewarning'] = 'Rollen met het recht om te beoordelen';
$string['rolewarning_help'] = 'Om beoordelingen te kunnen insturen hebben gebruikers de mogelijkheid moodle/rating:rate nodig en soms module specifieke mogelijkheden. Gebruikers met de volgende rollen zouden moeten kunnen items beoordelen. De lijst met rollen kan aangepast worden via de rechten link in het instellingen blok.';
