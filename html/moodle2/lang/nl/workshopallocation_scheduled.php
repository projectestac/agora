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
 * Strings for component 'workshopallocation_scheduled', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   workshopallocation_scheduled
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['currentstatus'] = 'Huidige status';
$string['currentstatusexecution'] = 'Status';
$string['currentstatusexecution1'] = 'Uitgevoerd op {$a->datetime}';
$string['currentstatusexecution2'] = 'Moet opnieuw uitgevoerd worden op {$a->datetime}';
$string['currentstatusexecution3'] = 'Moet uitgevoerd worden op {$a->datetime}';
$string['currentstatusexecution4'] = 'Wachtend op uitvoering';
$string['currentstatusnext'] = 'Volgende uitvoering';
$string['currentstatusnext_help'] = 'In sommige gevallen wordt de toewijzing automatisch opnieuw uitgevoerd, zelfs wanneer de toewijzing al gebeurd was. Dit kan bijvoorbeeld gebeuren als de deadline voor afgeven later is geplaatst.';
$string['currentstatusreset'] = 'Terugzetten';
$string['currentstatusreset_help'] = 'Het bewaren van het formulier met dit selectievakje aangevinkt zorgt er voor dat de huidige status teruggezet wordt. Alle informatie over de vorige toewijzing wordt verwijderd, zodat de toewijzing opnieuw kan gebeuren (indien hierboven ingeschakeld).';
$string['currentstatusresetinfo'] = 'Zet het selectievinkje en bewaar het formulier om het toewijzen te resetten.';
$string['currentstatusresult'] = 'Recent resultaat toewijzing';
$string['enablescheduled'] = 'Schakel geplande toewijzing in';
$string['enablescheduledinfo'] = 'Wijs taken automatisch toe aan het einde van de instuurfase';
$string['pluginname'] = 'Geplande toewijzing';
$string['randomallocationsettings'] = 'Toewijzingsinstellingen';
$string['randomallocationsettings_help'] = 'Parameters voor de willekeurige toewijzingsmethode worden hier gedefinieerd. Ze zullen gebruikt worden door de willekeurige toewijzingsplugin voor de eigenlijke toewijzing van taken.';
$string['resultdisabled'] = 'Geplande toewijzing uitgeschakeld';
$string['resultenabled'] = 'Geplande toewijzing ingeschakeld';
$string['resultexecuted'] = 'Gelukt';
$string['resultfailed'] = 'Kon taken niet automatisch toewijzen';
$string['resultfailedconfig'] = 'Geplande toewijzing fout geconfigureerd';
$string['resultfaileddeadline'] = 'De deadline voor het insturen van taken is voor deze Workshop niet gedefinieerd';
$string['resultfailedphase'] = 'De Workshop is niet in de instuurfase';
$string['resultvoid'] = 'Er zijn geen taken toegewezen';
$string['resultvoiddeadline'] = 'Nog niet na instuurdeadline';
$string['resultvoidexecuted'] = 'De toewijzing is al uitgevoerd';
$string['scheduledallocationsettings'] = 'Instellingen geplande toewijzing';
$string['scheduledallocationsettings_help'] = 'Indien geplande toewijzing is ingeschakeld, zal deze methode automatisch taken voor beoordeling aan leerlingen toewijzen aan het einde van de inzendingsfase. Het einde van die fase kan ingesteld worden in de Workshop instelling \'Deadline voor insturen\'.

Intern wordt de willekeurige toewijzingsmethode uitgevoerd met de parameters die hier vooraf opgegeven worden. Dat betekent dat de geplande toewijzing hetzelfde werkt als wanneer de leraar die manueel zou uitvoeren op het einde van de inzendingsfase.

Merk op dat de geplande toewijzing *niet* wordt uitgevoerd als je manueel de workshop in de beoordelingsfase zet voor de deadline voor inzenden. In dat geval moet je zelf de toewijzing starten. De geplande toewijzing is vooral  nuttig wanneer je die samen gebruikt met het automatisch schakelen tussen fases.';
$string['setup'] = 'Geplande toewijzing instellen';
