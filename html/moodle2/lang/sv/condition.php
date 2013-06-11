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
 * Strings for component 'condition', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   condition
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcompletions'] = 'Lägg till {no} villkor för aktivitet i formuläret';
$string['addgrades'] = 'Lägg till {no} villkor för betyg/omdömen i formuläret';
$string['availabilityconditions'] = 'Begränsa tillgänglighet';
$string['availablefrom'] = 'Tillgänglig fr o m';
$string['availablefrom_help'] = 'Tillgänglighetsdatum anger när kursdeltagaren kan komma åt aktiviteten. Skillnaden mellan denna inställning och aktivitetens vanliga tillgänglighetsinställningar är att denna inställning helt förhindrar tillgång till aktiviteten, medan de vanliga inställningarna låter kursdeltagaren gå in och titta på aktiviteten.';
$string['availableuntil'] = 'Tillgänglig t o m';
$string['badavailabledates'] = 'Ogiltiga datum. Om du anger både start- och stopdatum, ska startdatumet ligga före stoppdatumet.';
$string['completion_complete'] = 'måste vara markerad som fullföljd';
$string['completioncondition'] = 'Villkor för fullflöljande av villkor';
$string['completioncondition_help'] = 'Denna inställning avgör det/de villkor som som ska uppfyllas för att kursdeltagare ska komma åt aktiviteten.
Observera att Aktivitetsmarkering först måst aktiveras i kursens inställningar innan dessa villkor kan anges.
Multipla villkor kan anges, och om så görs måste alla dessa vara uppfyllda innan aktiviteten kan genomföras.';
$string['completion_fail'] = 'ska vara genomförd och <strong>underkänd</strong>';
$string['completion_incomplete'] = 'behöver inte vara markerad som fullföljd';
$string['completion_pass'] = 'måste vara fullföljd och godkänd';
$string['configenableavailability'] = 'När denna är aktiverad kan du ange villkor (ex vis datum, resultat eller fullföljande) som styr åtkomsten till aktiviteten.';
$string['contains'] = 'innehåller';
$string['doesnotcontain'] = 'innehåller inte';
$string['enableavailability'] = 'Aktivera villkorad tillgänglighet';
$string['endswith'] = 'slutar med';
$string['grade_atleast'] = 'måste vara åtminstone';
$string['gradecondition'] = 'Villkor för betyg/omdöme';
$string['gradecondition_help'] = 'Denna inställning avgör vilket resultat som måste uppnås för att kursdeltagaren ska komma åt aktiviteten. Flera olika villkor kan sättas om så önskas, och då kommer kursdeltagaren åt aktiviteten först då samtliga villkor är uppfyllda.';
$string['gradeitembutnolimits'] = 'Du måste ange en övre eller undre gräns, eller både och.';
$string['gradesmustbenumeric'] = 'Lägsta och högsta betyg måste vara numeriskt (eller tomt).';
$string['grade_upto'] = 'och mindre än';
$string['groupingnoaccess'] = 'Du tillhör inte en grupp som har tillgång till detta avsnitt.';
$string['isempty'] = 'är tom';
$string['isequalto'] = 'är lika med';
$string['none'] = '(none)';
$string['notavailableyet'] = 'Inte tillgänglig ännu';
$string['requires_completion_0'] = 'Bara tillgänglig innan aktiviteten <strong>{$a}</strong> är genomförd.';
$string['requires_completion_1'] = 'Ej tillgänglig innan aktiviteten  <strong>{$a}</strong> är markerad som genomförd.';
$string['requires_completion_2'] = 'Ej tillgänglig innan aktiviteten <strong>{$a}</strong> är genomförd och godkänd.';
$string['requires_completion_3'] = 'Bara tillgänglig om aktiviteten <strong>{$a}</strong> är genomförd och underkänd.';
$string['requires_date'] = 'Tillgänglig fr o m {$a}';
$string['requires_date_before'] = 'Tillgänglig t o m {$a}';
$string['requires_date_both'] = 'Tillgänglig fr o m {$a->from} t o m
{$a->until}. ';
$string['requires_date_both_single_day'] = 'Tillgänglig på {$a}.';
$string['requires_grade_any'] = 'Bara tillgänglig då du har ett resultat för <strong>{$a}</strong>.';
$string['requires_grade_max'] = 'Bara tillgänglig när du har uppnått tillräckligt resultat i <strong>{$a}</strong>.';
$string['requires_grade_min'] = 'Bara tillgänglig när du har uppnått begärt resultat i <strong>{$a}</strong>.';
$string['requires_grade_range'] = 'Bara tillgänglig när du har uppnått ett specifikt resultat i <strong>{$a}</strong>.';
$string['showavailability'] = 'Innan aktiviteten är tillgänglig';
$string['showavailability_hide'] = 'Dölj denna aktivitet helt och hållet';
$string['showavailabilitysection'] = 'Innan avsnittet kan nås';
$string['showavailabilitysection_hide'] = 'Dölj avsnittet helt';
$string['showavailability_show'] = 'Visa aktiviteten grå-tonad, med information om villkor för åtkomst.';
$string['startswith'] = 'inleds med';
$string['userrestriction_hidden'] = 'Begränsad tillgång (helt dold, gömd, inget meddelande): ‘{$a}’';
$string['userrestriction_visible'] = 'Begränsad tillgång: ‘{$a}’';
