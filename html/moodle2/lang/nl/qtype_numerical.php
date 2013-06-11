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
 * Strings for component 'qtype_numerical', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_numerical
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acceptederror'] = 'Aanvaardbare afwijking';
$string['addmoreanswerblanks'] = 'Lege lijnen voor {no} meer antwoorden';
$string['addmoreunitblanks'] = 'Lege ruimten voor {no} meer units';
$string['answercolon'] = 'Antwoord:';
$string['answermustbenumberorstar'] = 'Het antwoord moet een getal zijn, bijvoorbeeld 1,234 of 3e8 of * .';
$string['answerno'] = 'Antwoord {$a}';
$string['decfractionofquestiongrade'] = 'als een deel (0-1) van het cijfer voor de vraag';
$string['decfractionofresponsegrade'] = 'als een deel (0-1) van het antwoordcijfer';
$string['decimalformat'] = 'decimalen';
$string['editableunittext'] = 'het tekst invoerelement';
$string['errornomultiplier'] = 'Je moet een vermenigvuldigingsfactor voor deze unit opgeven.';
$string['errorrepeatedunit'] = 'Je kunt geen twee units met dezelfde naam hebben.';
$string['geometric'] = 'Geometrisch';
$string['invalidnumber'] = 'Je moet een geldig nummer ingeven.';
$string['invalidnumbernounit'] = 'Je moet een geldig getal invoegen. Voeg geen eenheid toe aan je antwoord.';
$string['invalidnumericanswer'] = 'Een van de antwoorden die je ingaf was geen geldig getal.';
$string['invalidnumerictolerance'] = 'Eén van de toleranties die je ingegeven hebt was geen geldig cijfer.';
$string['leftexample'] = 'links, bijvoorbeeld $1.00 of €1,00';
$string['manynumerical'] = 'Eenheden zijn optioneel. Als er een eenheid wordt ingegeven, dan wordt dat gebruikt om het antwoord tot eenheid 1 te converteren voor de beoordeling.';
$string['multiplier'] = 'Vermenigvuldigtal';
$string['nominal'] = 'Nominaal';
$string['noneditableunittext'] = 'Geen bewerkbare tekst van eenheid 1';
$string['nonvalidcharactersinnumber'] = 'Ongeldige tekens in getal';
$string['notenoughanswers'] = 'Je moet minstens één antwoord ingeven.';
$string['nounitdisplay'] = 'Eenheid wordt niet beoordeeld';
$string['numericalmultiplier'] = 'Vermenigvuldigtal';
$string['numericalmultiplier_help'] = 'Het vermenigvuldigtal is de factor waarmee het juiste numerieke antwoord vermenigvuldigd zal worden.

De eerste eenheid (eenheid 1) heeft een standaard vermenigvuldigtal 1. Dus als het juiste numerieke antwoord 5500 is en je hebt W als eenheid bij eenheid 1 die 1 als standaard vermenigvuldigtal heeft, dan is het juiste antwoord 5500 W.

Als je de eenheid kW toevoegt met vermenigvuldigtal 0,001, dan zal dit 5,5 kW als juist antwoord toevoegen. Dit betekent dat de antwoorden 5500 W en 5,5 kW beide als juist gerekend worden.

Merk op dat de fouttolerantie ook mee vermenigvuldigd wordt. Een fouttolerantie van 100 W zou dan een fouttolerantie van 0,1 kW worden.';
$string['oneunitshown'] = 'Eenheid 1 wordt automatisch in het antwoordvak getoond.';
$string['onlynumerical'] = 'Eenheden worden helemaal niet gebruikt. Enkel de numerieke waarde wordt beoordeeld.';
$string['pleaseenterananswer'] = 'Geef een antwoord';
$string['pleaseenteranswerwithoutthousandssep'] = 'Geef je antwoord zonder scheidingsteken voor de duizendtallen ({$a}).';
$string['pluginname'] = 'Numeriek';
$string['pluginnameadding'] = 'Numerieke vraag toevoegen';
$string['pluginnameediting'] = 'Numerieke vraag bewerken';
$string['pluginname_help'] = 'Vanuit het perspectief van de leerling lijkt een numerieke vraag hetzelfde als een kort antwoordvraag. Het verschil is dat numerieke vragen een foutentolerantie kunnen hebben. Dit maakt het mogelijk om een reeks antwoorden als juist antwoord te laten beoordelen. Als het juiste antwoord bijvoorbeeld 10 is met een foutenmarge van 2, dan zal elk getal tussen 8 en 12 juist gerekend worden.';
$string['pluginnamesummary'] = 'Maakt het mogelijk een numeriek antwoord te laten geven, zelfs met eenheden en toleranties. Dat antwoord kan beoordeeld worden met verschillende modelantwoorden,';
$string['relative'] = 'Relatief';
$string['rightexample'] = 'rechts, bijvoorbeeld 1,00cm of 1,00km';
$string['selectunit'] = 'Kies een eenheid';
$string['selectunits'] = 'Kies eenheden';
$string['studentunitanswer'] = 'Eenheden worden ingegeven';
$string['tolerancetype'] = 'Tolerantietype';
$string['unit'] = 'Eenheid';
$string['unitappliedpenalty'] = 'In dit cijfer zit een strafpunt van {$a} omdat de eenheid fout is.';
$string['unitchoice'] = 'een meerkeuze selectie';
$string['unitedit'] = 'Bewerk eenheid';
$string['unitgraded'] = 'De eenheid moet gegeven worden en zal beoordeeld worden.';
$string['unithandling'] = 'Behandeling van eenheden';
$string['unithdr'] = 'Unit {$a}';
$string['unitincorrect'] = 'Je hebt de juiste eenheid niet gegeven';
$string['unitmandatory'] = 'Verplicht';
$string['unitmandatory_help'] = '* Het antwoord wordt beoordeeld met de geschreven eenheid.

* Het strafpunt voor de eenheid wordt toegepast als het veld voor de eenheid leeg is.';
$string['unitnotselected'] = 'Je moet een eenheid selecteren.';
$string['unitonerequired'] = 'Je moet minstens één eenheid selecteren';
$string['unitoptional'] = 'Optionele eenheid';
$string['unitoptional_help'] = '* Als het eenheidsveld niet leeg is, dan wordt het antwoord beoordeeld met de gegeven eenheid.

* Als de eenheid fout geschreven is of onbekend, dan zal het antwoord als fout beschouwd worden;';
$string['unitpenalty'] = 'Strafpunt voor de eenheid';
$string['unitpenalty_help'] = 'Dit strafpunt wordt toegepast als

* de foute eenheidsnaam is ingegeven in het veld voor de eenheid, of
* als er een eenheid is ingegeven in het veld voor de waarde';
$string['unitposition'] = 'Waar eenheden staan';
$string['unitselect'] = 'een rolmenu';
$string['validnumberformats'] = 'Geldige getalopmaak';
$string['validnumberformats_help'] = '* gewone getallen 13500.67, 13 500.67, 13500,67 of 13 500,67

* als je een scheidingsteken voor duizendtallen gebruikt, moet je altijd een . gebruiken voor de decimalen, zoals in 13,500.67 : 13,500.

* voor exponenten zoals 1.350067 * 10<sup>4</sup>, gebruik je 1.350067 E4 : 1.350067 E04';
$string['validnumbers'] = '13500.67, 13 500.67, 13,500.67, 13500,67, 13 500,67, 1.350067 E4 of 1.350067 E04';
