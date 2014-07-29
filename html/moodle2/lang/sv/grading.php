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
 * Strings for component 'grading', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   grading
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activemethodinfo'] = '\'{$a->method}\' är vald som den aktiva betygsmetoden för \'{$a->area}\' området';
$string['activemethodinfonone'] = 'Ingen avancerad betygssättningsmetod är vald för området \'{$a->area}\'. Enkel betygssättning kommer att användas.';
$string['changeactivemethod'] = 'Ändra betygssättningsmetod till';
$string['clicktoclose'] = 'klicka för att välja';
$string['exc_gradingformelement'] = 'Kunde inte instansiera betygsformulärselement';
$string['gradingformunavailable'] = 'Notera: formuläret för avancerad betygssättning är för närvarande inte klart. Enkel betygssättningsmetod kommer att användas tills formuläret har giltig status.';
$string['gradingmanagement'] = 'Avancerad betygssättning';
$string['gradingmanagementtitle'] = 'Avancerad betygssättning: {$a->component} ({$a->area})';
$string['gradingmethod'] = 'Betygssättningsmetod';
$string['gradingmethod_help'] = 'Välj den avancerade betygssättningsmetod som ska användas för att beräkna betyget. För att avaktivera avancerad betygssättning och gå tillbaka till den förinställda betygssättningen, välj "Enkel betygssättning".';
$string['gradingmethodnone'] = 'Enkel betygssättning';
$string['gradingmethods'] = 'Betygssättningsmetoder';
$string['manageactionclone'] = 'Skapa nytt betygssättningsformulär från mall';
$string['manageactiondelete'] = 'Radera det formulär som nu är definierat';
$string['manageactiondeleteconfirm'] = 'Du kommer att radera betygsformuläret \'{$a->formname}\' och all associerad information från \'{$a->component} ({$a->area})\'. Säkerställ att du förstår följande konsekvenser:

 * Denna operation kan inte ångras eller återställas. * Du kan byta till en annan betygssättningsmetod inklusive \'Enkel direkt betygssättning\' utan att radera detta formulär. * All information om hur betygsformulären fylls kommer att förloras. * De beräknade resultaten av betyg sparade i betygsboken kommer inte att påverkas. Däremot kommer förklaringen till hur de beräknades inte att vara tillgänglig. * Denna operation påverkar inte eventuella kopior av detta formulär i andra aktiviteter.';
$string['manageactiondeletedone'] = 'Formuläret raderades.';
$string['manageactionedit'] = 'Ändra definition för nuvarande formulär';
$string['manageactionnew'] = 'Definiera nytt betygsformulär från grunden';
$string['manageactionshare'] = 'Publisera formuläret som en ny mall';
$string['manageactionshareconfirm'] = 'Du kommer att spara en kopia av betygssättningsformuläret \'{$a}\' som en ny publik mall. Andra användare på din webbplats kommer kunna skapa nya betygssättningsformulär i sina aktiviteter från denna mall.';
$string['manageactionsharedone'] = 'Formuläret sparades som en mall.';
$string['noitemid'] = 'Betygssättning är inte möjligt. Den betygssatta delen existerar inte.';
$string['nosharedformfound'] = 'Ingen mall hittades';
$string['searchownforms'] = 'inkludera mina egna formulär';
$string['searchtemplate'] = 'Sök betygssättningsfomulär';
$string['searchtemplate_help'] = 'Du kan här söka efter ett betygssättningsfomulär och använda det som mall för nya formulär. Skriv de ord som borde finnas någonstans i formulärets namn, beskrivning eller i formulärtexten. För att söka efter en fras omge hela frågan med dubbla citationstecken.

Som förval kommer endast de formulär som  sparats som delade mallar att inkluderas i sökresultatet. Du kan även inkludera alla dina egna betygssättningsformulär i sökresultatet. På detta sätt kan du enkelt återanvända dina betygssättningsformulär utan att dela dem. Endast formulär som markerats \'Klar för användning\' kan återanvändas på detta sätt.';
$string['statusdraft'] = 'Utkast';
$string['statusready'] = 'Klar för användning';
$string['templatedelete'] = 'Radera';
$string['templatedeleteconfirm'] = 'Du kommer att radera den delade mallen \'{$a}\'. Radering av en mall påverkar inte existerande formulär som skapades från den.';
$string['templateedit'] = 'Ändra';
$string['templatepick'] = 'Använd denna mall';
$string['templatepickconfirm'] = 'Vill du använda betygssättningsformuläret \'{$a->formname}\' som mall för det nya betygssättningsformuläret i \'{$a->component} ({$a->area})\'?';
$string['templatepickownform'] = 'Använd detta formulär som en mall';
$string['templatesource'] = 'Plats: {$a->component} ({$a->area})';
$string['templatetypeown'] = 'Eget formulär';
$string['templatetypeshared'] = 'Delad mall';
