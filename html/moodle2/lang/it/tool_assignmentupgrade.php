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
 * Strings for component 'tool_assignmentupgrade', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_assignmentupgrade
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['areyousure'] = 'Sei sicuro?';
$string['areyousuremessage'] = 'Sei sicuro di voler aggiornare il compito "{$a->name}"?';
$string['assignmentid'] = 'ID compito';
$string['assignmentnotfound'] = 'Non è stato possibile trovare il compito (id={$a})';
$string['assignmentsperpage'] = 'Compiti per pagina';
$string['assignmenttype'] = 'Tipo di compito';
$string['backtoindex'] = 'Torna all\'indice';
$string['batchoperations'] = 'Operazioni batch';
$string['batchupgrade'] = 'Aggiorna gruppo di compiti';
$string['confirmbatchupgrade'] = 'Conferma aggiornamento compiti batch';
$string['conversioncomplete'] = 'Compito convertito';
$string['conversionfailed'] = 'La conversione del compito non è riuscita. Log della conversione: <br />{$a}';
$string['listnotupgraded'] = 'Elenca compiti da aggiornare';
$string['listnotupgraded_desc'] = 'E\' anche possibile aggiornare i compiti singolarmente';
$string['noassignmentsselected'] = 'Nessun compito selezionato';
$string['noassignmentstoupgrade'] = 'Non ci sono compiti da aggiornare';
$string['notsupported'] = '';
$string['notupgradedintro'] = 'In questa pagina sono elencati i compiti creati con una versione precedente di Moodle e che non sono stati aggiornati al nuovo modulo compito presente in Moodle 2.3. Non tutti i compiti possono essere aggiornati, ad esempio i compiti creati con tipi di compito personalizzati necessitano dell\'aggiornamento del tipo personalizzato per poter essere aggiornati.';
$string['notupgradedtitle'] = 'Compiti non aggiornati';
$string['pluginname'] = 'Assistente per l\'aggiornamento dei compiti';
$string['select'] = 'Seleziona';
$string['submissions'] = 'Consegne';
$string['supported'] = 'Aggiorna';
$string['unknown'] = 'Sconosciuto';
$string['updatetable'] = 'Aggiorna tabella';
$string['upgradable'] = 'Aggiornabile';
$string['upgradeall'] = 'Aggiorna tutti i compiti';
$string['upgradeallconfirm'] = 'Aggiornare tutti i compiti?';
$string['upgradeassignmentfailed'] = 'Risultato: aggiornamento non riuscito. Log dell\'aggiornamento: <br/><div class="tool_assignmentupgrade_upgradelog">{$a->log}</div>';
$string['upgradeassignmentsuccess'] = 'Risultato: aggiornamento avvenuto con successo';
$string['upgradeassignmentsummary'] = 'Aggiornamento compito: {$a->name} (Corso: {$a->shortname})';
$string['upgradeprogress'] = 'Aggiornamento compito {$a->current} di {$a->total}';
$string['upgradeselected'] = 'Aggiorna i compiti selezionati';
$string['upgradeselectedcount'] = 'Aggiornare i {$a} compiti selezionati?';
$string['upgradesingle'] = 'Aggiorna compito singolarmente';
$string['viewcourse'] = 'Visualizza il corso con i compiti convertiti';
