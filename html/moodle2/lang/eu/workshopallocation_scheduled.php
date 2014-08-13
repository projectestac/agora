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
 * Strings for component 'workshopallocation_scheduled', language 'eu', branch 'MOODLE_26_STABLE'
 *
 * @package   workshopallocation_scheduled
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['currentstatus'] = 'Oraingo egoera';
$string['currentstatusexecution'] = 'Egoera';
$string['currentstatusexecution1'] = 'Exekuzio denbora: {$a->datetime}';
$string['currentstatusexecution2'] = 'Berriz exekutatzeko data: {$a->datetime}';
$string['currentstatusexecution3'] = 'Exekutatzeko data: {$a->datetime}';
$string['currentstatusexecution4'] = 'Exekuzioaren zain';
$string['currentstatusnext'] = 'Hurrengo exekuzioa';
$string['currentstatusnext_help'] = 'Batzuetan esleipena automatikoki berriz exekutatzeko programatzen da aurretik exekutatu bada ere. Hau bidalketak egiteko epea luzatu izanagatik gertatu daiteke, adibidez.';
$string['currentstatusreset'] = 'Berrabiarazi';
$string['currentstatusreset_help'] = 'Aukera hau markaturik formulario gordez gero oraingo egoera berrabiaraziko da. Aurreko exekuzioaren inguruko informazio guztia ezabatuko da esleipena berriz exekutatzeko (goian gaituz gero).';
$string['currentstatusresetinfo'] = 'Exekuzioaren emaitza berrabiarazteko aukera markatu eta formularioa gorde.';
$string['currentstatusresult'] = 'Duela gutxiko exekuzioaren emaitza';
$string['enablescheduled'] = 'Gaitu esleipen automatikoa.';
$string['enablescheduledinfo'] = 'Bidalketak automatikoki esleitu bidalketa-aldia amaitzean';
$string['pluginname'] = 'Esleipen automatikoa';
$string['randomallocationsettings'] = 'Esleipenaren ezarpenak';
$string['randomallocationsettings_help'] = 'Hemen ausazko esleipenerako parametroak aukeratzen dira. Esleipen automatikorako gehigarriak parametro hauek oraingo bidalketen esleipenerako erabiliko ditu.';
$string['resultdisabled'] = 'Esleipen automatikoa desgaituta';
$string['resultenabled'] = 'Esleipen automatikoa gaituta';
$string['resultexecuted'] = 'Ondo';
$string['resultfailed'] = 'Ezin dira bidalketak automatikoki esleitu';
$string['resultfailedconfig'] = 'Esleipen automatikoa gaizki konfiguraturik dago';
$string['resultfaileddeadline'] = 'Tailerrak ez du bidalketetarako azken eguna zehazturik.';
$string['resultfailedphase'] = 'Tailerra ez dago bidalketa-aldian';
$string['resultvoid'] = 'Ez dago esleitutako bidalketarik';
$string['resultvoiddeadline'] = 'Ez da bidalketa-aldiko epea oraindik amaitu.';
$string['resultvoidexecuted'] = 'Esleipena exekutatu da jada.';
$string['scheduledallocationsettings'] = 'Esleipen automatikoaren ezarpenak';
$string['scheduledallocationsettings_help'] = 'Esleipen automatikoa gaituz gero honek bidalketa-aldia bukatzean bidalketak ebaluatzeko automatikoki esleituko ditu. Aldiaren bukaera tailerraren ezarpenen "Bidalketen bukaera" atalean zehaztu daiteke.

Ausazko esleipena formulario honetan zehaztutako parametroen arabera exekutatzen da. Honek esan nahi du, beraz, esleipen automatikoak irakasleak bidalketa aldia bukatzean ausazko esleipena beheko ezarpenak erabiliz egingo balu bezala funtzionatzen duela.

Kontuan izan esleipen automatikoa *ez* dela exekutatzen irakasleak eskuz tailerraren aldia bidalketak egiteko epea amaitu baino lehen ebaluazio-aldira aldatzen badu. Kasu horretan irakasleak esleipena bere kabuz egin beharko du. Esleipen automatikoa bereziki erabilgarria da aldia automatikoki aldatzeko funtzioarekin batera erabiltzen denean.';
$string['setup'] = 'Esleipen automatikoa prestatu';
