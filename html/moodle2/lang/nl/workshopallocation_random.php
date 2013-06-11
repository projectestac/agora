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
 * Strings for component 'workshopallocation_random', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   workshopallocation_random
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addselfassessment'] = 'Voeg zelfevaluaties toe';
$string['allocationaddeddetail'] = 'Je hebt een nieuwe evaluatie te doen: <strong>{$a->reviewername}</strong> evalueert <strong>{$a->authorname}</strong>';
$string['allocationdeallocategraded'] = 'Het verwijderen van de toewijzing van de evaluatie met cijfers is mislukt: beoordeler <strong>{$a->reviewername}</strong>, auteur van de inzending: <strong>{$a->authorname}</strong>';
$string['allocationreuseddetail'] = 'Hergebruikte beoordeling : <strong>{$a->reviewername}</strong> behouden als beoordeler van <strong>{$a->authorname}</strong>';
$string['allocationsettings'] = 'Toewijzingsinstellingen';
$string['assessmentdeleteddetail'] = 'Evaluatie niet meer toegewezen: <strong>{$a->reviewername}</strong> is niet meer de beoordeler van <strong>{$a->authorname}</strong>';
$string['assesswosubmission'] = 'Deelnemers kunnen evalueren zonder zelf iets toegevoegd te hebben';
$string['confignumofreviews'] = 'Standaard aantal inzendingen om willekeurig toe te wijzen';
$string['excludesamegroup'] = 'Voorkom nakijken door peers van dezelfde groep';
$string['noallocationtoadd'] = 'Geen toewijzingen om toe te voegen';
$string['nogroupusers'] = '<p>Waarschuwing: als de workshop in \'zichtbare groepen\'-modus of \'gescheiden groepen\'-modus is, dan MOETEN gebruikers minstens van 1 groep lid zijn om peer-beoordelingen toegewezen te krijgen. Gebruiker die geen lid zijn van een groep, kunnen nog wel nieuwe zelfbeoordelingen krijgen of bestaande beoordelingen kunnen verwijderd worden.</p><p>Deze gebruikers zitten op dit ogenblik niet in een groep: {$a}</p>';
$string['numofdeallocatedassessment'] = 'Toewijzing van {$a} evaluatie(s) ongedaan gemaakt';
$string['numofrandomlyallocatedsubmissions'] = 'Willekeurig toewijzen van {$a} inzendingen';
$string['numofreviews'] = 'Aantal beoordelingen';
$string['numofselfallocatedsubmissions'] = 'Zelf-toewijzing van {$a} inzending(en)';
$string['numperauthor'] = 'per inzending';
$string['numperreviewer'] = 'per beoordeler';
$string['pluginname'] = 'Willekeurige toewijzing';
$string['randomallocationdone'] = 'Willekeurige toewijzing klaar';
$string['removecurrentallocations'] = 'Verwijder huidige toewijzingen';
$string['resultnomorepeers'] = 'Geen peers meer beschikbaar';
$string['resultnomorepeersingroup'] = 'Geen peers meer beschikbaar in deze gescheiden groep';
$string['resultnotenoughpeers'] = 'Niet genoeg peers beschikbaar';
$string['resultnumperauthor'] = 'Aan het proberen {$a} beoodelingen per auteur toe te wijzen';
$string['resultnumperreviewer'] = 'Aan het proberen {$a} beoodelingen per beoordeler toe te wijzen';
$string['stats'] = 'Huidige toewijzingsstatistieken';
