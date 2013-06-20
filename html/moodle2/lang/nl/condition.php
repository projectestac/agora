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
 * Strings for component 'condition', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   condition
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcompletions'] = 'Voeg {no} activiteitsvoorwaarden toe aan formulier';
$string['addgrades'] = 'Voeg {no} cijfervoorwaarden toe aan formulier';
$string['adduserfields'] = 'Voeg {no} gebruikersveldvoorwaarden aan het formulier';
$string['availabilityconditions'] = 'Beperk toegang';
$string['availablefrom'] = 'Toegankelijk vanaf';
$string['availablefrom_help'] = 'Toegang van/tot datums bepalen wanneer leerlingen toegang tot de activiteit hebben via een link op de cursuspagina.

Het verschil tussen toegang van/tot datums en de beschikbaarheidsinstelling voor de activiteit is dat buiten de van/tot datums toegang volledig verhinderd wordt, terwijl tijdens de beschikbaarheid de leerlingen de activiteitsbeschrijving kunnen zien.';
$string['availableuntil'] = 'Toegankelijk tot';
$string['badavailabledates'] = 'Ongeldige data. Als je beide data instelt, dan moet de \'Toegankelijk vanaf\'-datum voor de \'Toegankelijk tot\'-datum zijn.';
$string['badgradelimits'] = 'Als je zowel een boven als een onderlimiet instelt, dan moet de bovenlimiet groter zijn dan de onderlimiet.';
$string['completion_complete'] = 'moet als voltooid gemarkeerd worden';
$string['completioncondition'] = 'Voorwaarde voltooide activiteit';
$string['completioncondition_help'] = 'Deze instelling bepaalt of er bepaalde delen van de cursus voltooid moeten zijn voor toegang tot deze activiteit mogelijk wordt. Merk op dat het opvolgen van voltooien eerst moet ingeschakeld zijn.

Meerdere voorwaarden voor voltooide activiteiten kunnen ingesteld worden indien gewenst. In dat geval zal de toegang tot de activiteit slecht mogelijk worden als aan alle voorwaarden voldaan is.';
$string['completionconditionsection'] = 'Voorwaarde voltooien activiteit';
$string['completionconditionsection_help'] = 'Deze instelling bepaalt alle voorwaarden waaraan moeten voldaan worden om de activiteit als voltooid te kunnen beschouwen en naar de volgende sectie over te kunnen gaan. Merk op dat het volgen van activiteitsvoltooing moet ingeschakeld zijn voor er een voorwaarde kan ingesteld worden.

Er kunnen, indien gewenst, meerdere voorwaarden voor het voltooien van de activiteit ingesteld worden. Indien dit gedaan wordt, dan zal toegang tot de sectie enkel toegestaan worden als aan ALLE voltooingsvoorwaarden is voldaan.';
$string['completion_fail'] = 'moet voltooid zijn en een onvoldoende behaald';
$string['completion_incomplete'] = 'moet niet als voltooid gemarkeerd worden';
$string['completion_pass'] = 'moet voltooid zijn en een voldoende behaald';
$string['configenableavailability'] = 'Wanneer dit ingeschakeld is, dan kun je voorwaarden instellen (gebaseerd op datum, cijfer of voltooid) die controleren wanneer toegang tot een activiteit of bron mogelijk is.';
$string['contains'] = 'bevat';
$string['doesnotcontain'] = 'bevat niet';
$string['enableavailability'] = 'Voorwaardelijke toegang inschakelen';
$string['endswith'] = 'eindigt op';
$string['fielddeclaredmultipletimes'] = 'Je kunt hetzelfde veld maar één keer per activiteit declareren';
$string['grade_atleast'] = 'minstens';
$string['gradecondition'] = 'Cijfervoorwaarde';
$string['gradecondition_help'] = 'Deze instelling bepaalt of er aan bepaalde cijfervoorwaarden moet voldaan worden voor toegang tot deze activiteit mogelijk wordt.

Meerdere cijfervoorwaarden kunnen ingesteld worden indien gewenst. In dat geval zal toegang tot de activiteit slecht mogelijk worden als aan alle cijfervoorwaarden voldaan is.';
$string['gradeconditionsection'] = 'Cijfervoorwaarde';
$string['gradeconditionsection_help'] = 'Deze instelling bepaalt of er aan een cijfervoorwaarde moet voldaan worden om toegang te hebben tot deze sectie.

Meerdere cijfercondities kunnen ingesteld worden indien gewenst. Als je dat doet, dan zal  een leerling slechts toegang krijgen tot de volgende sectie als aan ALLE cijfervoorwaarden is voldaan.';
$string['gradeitembutnolimits'] = 'Je moet een bovenlimiet, een onderlimiet of beide ingeven.';
$string['gradelimitsbutnoitem'] = 'Je moet een beoordelingsitem ingeven.';
$string['gradesmustbenumeric'] = 'De minimum- en maximumcijfers moeten numeriek zijn (of leeg)';
$string['grade_upto'] = 'en minder dan';
$string['groupingnoaccess'] = 'Je behoort nu niet tot een groep die toegang heeft tot deze sectie.';
$string['isempty'] = 'is leeg';
$string['isequalto'] = 'gelijk aan';
$string['isnotempty'] = 'is niet leeg';
$string['none'] = '(geen)';
$string['notavailableyet'] = 'Nog niet beschikbaar';
$string['requires_completion_0'] = 'Niet beschikbaar tenzij de activiteit  <strong>{$a}</strong> niet voltooid is.';
$string['requires_completion_1'] = 'Niet beschikbaar tot de activiteit <strong>{$a}</strong> als voltooid is gemarkeerd.';
$string['requires_completion_2'] = 'Niet beschikbaar tot de activiteit <strong>{$a}</strong> voltooid is en de leerling geslaagd is.';
$string['requires_completion_3'] = 'Niet beschikbaar tot de activiteit <strong>{$a}</strong> voltooid is en de leerling niet geslaagd is.';
$string['requires_date'] = 'Beschikbaar van {$a}';
$string['requires_date_before'] = 'Beschikbaar tot {$a}';
$string['requires_date_both'] = 'Beschikbaar van {$a->from} tot {$a->until}.';
$string['requires_date_both_single_day'] = 'Beschikbaar op {$a}.';
$string['requires_grade_any'] = 'Enkel beschikbaar wanneer je een cijfer voor <strong>{$a}</strong> behaald hebt.';
$string['requires_grade_max'] = 'Enkel beschikbaar wanneer je cijfer voor <strong>{$a}</strong> te laag is.';
$string['requires_grade_min'] = 'Enkel beschikbaar wanneer je minstens een bepaald cijfer voor <strong>{$a}</strong> behaald hebt.';
$string['requires_grade_range'] = 'Enkel beschikbaar wanneer je een bepaald cijfer voor <strong>{$a}</strong> behaald hebt.';
$string['requires_user_field_contains'] = 'Niet beschikbaar tenzij je <strong>{$a->field}</strong> , <strong>{$a->value}</strong> bevat.';
$string['requires_user_field_doesnotcontain'] = 'Niet beschikbaar als je <strong>{$a->field}</strong> , <strong>{$a->value}</strong> bevat.';
$string['requires_user_field_endswith'] = 'Niet beschikbaar tenzij je <strong>{$a->field}</strong> eindigt met <strong>{$a->value}</strong>.';
$string['requires_user_field_isempty'] = 'Niet beschikbaar tenzij je <strong>{$a->field}</strong> leeg is.';
$string['requires_user_field_isequalto'] = 'Niet beschikbaar tenzij je <strong>{$a->field}</strong> gelijk is aan <strong>{$a->value}</strong>.';
$string['requires_user_field_isnotempty'] = 'Niet beschikbaar als je <strong>{$a->field}</strong> leeg is.';
$string['requires_user_field_startswith'] = 'Niet beschikbaar tenzij je <strong>{$a->field}</strong> begint met <strong>{$a->value}</strong>.';
$string['showavailability'] = 'Voor toegang tot de activiteit mogelijk is';
$string['showavailability_hide'] = 'Verberg de activiteit volledig';
$string['showavailabilitysection'] = 'Voor er toegang gegeven wordt tot de sectie';
$string['showavailabilitysection_hide'] = 'Verberg sectie volledig';
$string['showavailabilitysection_show'] = 'Toon sectie in het lichtgrijs, met de restrictie-informatie';
$string['showavailability_show'] = 'Toon de activiteit in het grijs, met beperkingsinformatie';
$string['startswith'] = 'begint met';
$string['userfield'] = 'Gebruikersveld';
$string['userfield_help'] = 'Je kunt toegang beperken op basis van gelijk welk veld van het gebruikersprofiel.';
$string['userrestriction_hidden'] = 'Deze activiteit is beperkt (volledig verborgen, geen boodschap):  &lsquo;{$a}&rsquo;';
$string['userrestriction_visible'] = 'Deze activiteit is beperkt : &lsquo;{$a}&rsquo;';
