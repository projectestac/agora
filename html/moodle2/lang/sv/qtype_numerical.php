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
 * Strings for component 'qtype_numerical', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_numerical
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acceptederror'] = 'Accepterat fel';
$string['addmoreanswerblanks'] = 'Tomma utrymmen för {no}  fler svar';
$string['addmoreunitblanks'] = 'Tomma utrymmen för {no} fler enheter';
$string['answercolon'] = 'Svar:';
$string['answererror'] = 'Fel';
$string['answermustbenumberorstar'] = 'Svaret måste vara ett tal, eller \'*\'.';
$string['answerno'] = 'Svar {$a}';
$string['decfractionofquestiongrade'] = 'som en del (0-1) av frågans poäng';
$string['decfractionofresponsegrade'] = 'som en del (0-1) av svarets poäng';
$string['decimalformat'] = 'decimaler';
$string['editableunittext'] = 'texinmatningselementet';
$string['errornomultiplier'] = 'Du måste ange en multiplikator för den här enheten.';
$string['errorrepeatedunit'] = 'Du kan inte ha två enheter med samma namn.';
$string['geometric'] = 'Geometrisk';
$string['invalidnumber'] = 'Du måste ange ett giltigt nummer.';
$string['invalidnumbernounit'] = 'Du måste ange ett giltigt nummer. Inkludera inte en enhet i ditt svar.';
$string['invalidnumericanswer'] = 'En av de svar du angav var inte ett giltigt nummer.';
$string['invalidnumerictolerance'] = 'En av toleranserna du angav var inte ett giltigt nummer.';
$string['leftexample'] = 'till vänster, till exempel $ 1,00 eller 1,00 £';
$string['manynumerical'] = 'Enheter är valfria. Om en enhet anges, används den för att konvertera svaret till enhet 1 före betygssättningen.';
$string['multiplier'] = 'Multiplikator';
$string['nominal'] = 'Nominellt';
$string['noneditableunittext'] = 'ICKE redigerbar text för enheten Nr1';
$string['nonvalidcharactersinnumber'] = 'Ogiltigt tecken i nummer';
$string['notenoughanswers'] = 'Du måste åtminstone mata in ett svar.';
$string['nounitdisplay'] = 'Ingen enhetsgradering';
$string['numericalmultiplier'] = 'Multiplikator';
$string['numericalmultiplier_help'] = 'Multiplikator är den faktor med vilken det korrekta numeriska svaret kommer att multipliceras.

Den första enheten (enhet 1) har en standard multiplikator på 1. Således om rätt numeriska svar är 5500 och du ställer W som enhet på enhet 1 som har 1 som standard multiplikator, är det rätta svaret 5500 W.

Om du lägger till enheten kW med en multiplikator på 0,001, kommer detta lägga till ett korrekt svar på 5,5 kW. Detta innebär att svaren 5500W eller 5,5 kW skulle anses som korrekt.

Observera att det accepterade felet också multipliceras, så en tillåten fel 100W skulle bli ett fel på 0.1kW.';
$string['oneunitshown'] = 'Enhet 1 visas automatiskt bredvid svarsrutan.';
$string['onlynumerical'] = 'Enheter används inte alls. Endast det numeriska värdet poängsätts.';
$string['pleaseenterananswer'] = 'Ange ett svar.';
$string['pleaseenteranswerwithoutthousandssep'] = 'Ange ditt svar utan att använda tusentalsavgränsare ({$a}).';
$string['pluginname'] = 'Numerisk';
$string['pluginnameadding'] = 'Lägga till en numerisk fråga';
$string['pluginnameediting'] = 'Redigera en numerisk fråga';
$string['pluginname_help'] = 'Från elevens perspektiv ser en numerisk fråga ut precis som en kort svar fråga. Skillnaden är att numeriska svar får ha ett godkänt fel. Detta möjliggör en fast antal svar att utvärderas som ett svar. Till exempel, om svaret är 10 med ett accepterat fel av 2, då kommer ett tal mellan 8 och 12 att accepteras som korrekt svar.';
$string['pluginnamesummary'] = 'Tillåter en numerisk svar, eventuellt med enhet, som är graderat genom att jämföra mot olika svarsmodeller , eventuellt med toleranser.';
$string['relative'] = 'Relativ';
$string['rightexample'] = 'till höger, till exempel 1.00cm eller 1.00km';
$string['selectunit'] = 'Välj en enhet';
$string['selectunits'] = 'Välj enheter';
$string['studentunitanswer'] = 'Enhet anges med';
$string['tolerancetype'] = 'Toleranstyp';
$string['unit'] = 'Enhet';
$string['unitappliedpenalty'] = 'Dessa poäng inkluderar ett poängavdrag på {$a} för felaktig enhet.';
$string['unitchoice'] = 'ett flervals val';
$string['unitedit'] = 'Redigera enhet';
$string['unitgraded'] = 'Enheten måste anges, och kommer att poängsättas.';
$string['unithandling'] = 'Enhets hantering';
$string['unitincorrect'] = 'Du angav inte rätt enhet.';
$string['unitmandatory'] = 'Obligatorisk';
$string['unitmandatory_help'] = '* Svaret bedöms enligt angiven enhet.
* Poängavdrag för felaktig enhet kommer att tillämpas om enhet är tomt';
$string['unitnotselected'] = 'Du måste välja en enhet.';
$string['unitonerequired'] = 'Du måste ange minst en enhet';
$string['unitoptional'] = 'Valfri enhet';
$string['unitoptional_help'] = '* Om fältet för enhet inte är tomt kommer svaret att poängsättas med denna enhet.

* Om enheten är dåligt skriven eller okänd, kommer svaret att betraktas som ogiltigt.';
$string['unitpenalty'] = 'Poängavdrag för enhet';
$string['unitpenalty_help'] = 'Poängavdraget tillämpas om

* fel enhetsnamn anges i enhetsangivningen, eller
* en enhet anges i ruta för värde';
$string['unitposition'] = 'Enhetsplacering';
$string['units'] = 'Enheter';
$string['unitselect'] = 'en nedrullningsmeny';
$string['unitx'] = 'Enhet {no}';
$string['validnumberformats'] = 'Giltiga talformat';
$string['validnumberformats_help'] = '* vanliga nummer 13500,67, 13 500,67, 13500,67 eller 13 500,67

* om du använder , kommatecken som tusentalsavgränsare sätt *alltid* decimalpunkten . som i 13,500.67: 13.500.

* för exponent form säg 1.350067 * 10 <sup>4</sup> använd 1,350067 E4: 1,350067 E04';
$string['validnumbers'] = '13500.67, 13 500.67, 13,500.67, 13500,67, 13 500,67, 1.350067 E4 eller 1.350067 E04';
$string['xmustbenumeric'] = '{$a} måste vara ett nummer.';
$string['xmustnotbenumeric'] = '{$a} får inte vara ett nummer.';
$string['youmustenteramultiplierhere'] = 'Du måste ange en multiplikator här';
