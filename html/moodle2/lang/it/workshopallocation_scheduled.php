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
 * Strings for component 'workshopallocation_scheduled', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   workshopallocation_scheduled
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['currentstatus'] = 'Stato attuale';
$string['currentstatusexecution'] = 'Stato';
$string['currentstatusexecution1'] = 'Eseguito il {$a->datetime}';
$string['currentstatusexecution2'] = 'Da eseguire di nuovo il {$a->datetime}';
$string['currentstatusexecution3'] = 'Da eseguire il {$a->datetime}';
$string['currentstatusexecution4'] = 'In attesa di essere eseguito';
$string['currentstatusnext'] = 'Prossima elaborazione';
$string['currentstatusnext_help'] = 'In alcune circostanze la distribuzione viene pianificata per essere elaborata nuovamente anche se già svolta. Ad esempio, può succedere quando la data di fine consegne viene spostata in avanti.';
$string['currentstatusreset'] = 'Reset';
$string['currentstatusreset_help'] = 'Reimposta lo stato corrente. Tutte le informazioni sulla elaborazione già effettuata saranno eliminate e la distribuzione sarà rielaborata (se abilitata sopra).';
$string['currentstatusresetinfo'] = 'Seleziona la casella e salva il form per resettare il risultato della elaborazione';
$string['currentstatusresult'] = 'Risultati dell\'ultima elaborazione';
$string['enablescheduled'] = 'Abilita distribuzione pianificata';
$string['enablescheduledinfo'] = 'Distribuisce automaticamente le consegne dopo la fine della fase di consegna';
$string['pluginname'] = 'Distribuzione pianificata';
$string['randomallocationsettings'] = 'Impostazioni distribuzione';
$string['randomallocationsettings_help'] = 'I parametri per la distribuzione casuali possono essere impostati qui. Tali parametri saranno usati dal plugin distribuzione casuale per distribuire le consegne.';
$string['resultdisabled'] = 'Distribuzione pianificata disabilitata';
$string['resultenabled'] = 'Distribuzione pianificata disabilitata';
$string['resultexecuted'] = 'Riucita';
$string['resultfailed'] = 'Non è stato possibile distribuire automaticamente le consegne';
$string['resultfailedconfig'] = 'Distribuzione pianificata configurata erroneamente';
$string['resultfaileddeadline'] = 'Nel workshop non è stata impostata la data di fine consegne';
$string['resultfailedphase'] = 'Il workshop non si trova nella fase di consegna';
$string['resultvoid'] = 'Non sono state distribuite consegne';
$string['resultvoiddeadline'] = 'La data di fine cosegne non è stata ancora superata';
$string['resultvoidexecuted'] = 'La distribuzione è già stata elaborata';
$string['scheduledallocationsettings'] = 'Impostazioni distribuzione pianificata';
$string['scheduledallocationsettings_help'] = 'Consente la distribuzione delle consegne con il metodo di distribuzione pianificata dopo la data di fine della fase di consegna. La data di fine consegne si trova nelle impostazioni del workshop.

Per la distribuzione, internamente viene utilizzato il metodo di distribuzione casuale con i parametri qui impostati. In altre parole la distribuzione pianificata è analoga alla distribuzione casuale generata dal docente dopo la data di fine consegne, usando i parametri impostati sotto.

Da notare che la distribuzione pianificata non viene eseguita se passi manualmente alla fase di valutazione prima della data di fine consegne. In questo caso sarà necessario distribuire le consegne manualmente. La distribuzione pianificata è particolarmente utile se usata in combinazione con il passaggio di fase automatico.';
$string['setup'] = 'Imposta distribuzione pianificata';
