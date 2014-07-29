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
 * Strings for component 'assignfeedback_offline', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_offline
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmimport'] = 'Conferma importazione valutazioni';
$string['default'] = 'Abilitato per default';
$string['default_help'] = 'Consente di abilitare per default il foglio di valutazione offline per i compiti di nuova creazione';
$string['downloadgrades'] = 'Scarica il foglio di valutazione offline';
$string['enabled'] = 'Foglio di valutazione offline';
$string['enabled_help'] = 'I docenti potranno scaricare e caricare fogli di valutazione offline dei compiti degli studenti';
$string['feedbackupdate'] = 'Imposta a "{$a->text}" il campo "{$a->field}" per lo studente "{$a->student}"';
$string['gradelockedingradebook'] = 'La valutazione di {$a} è stata bloccata nel registro del valutatore';
$string['graderecentlymodified'] = 'La valutazione di {$a} è stata modificata in Moodle più recentemente rispetto al foglio di valutazione offline';
$string['gradesfile'] = 'Foglio di valutazione offline (formato csv)';
$string['gradesfile_help'] = 'Il foglio di valutazione offline contenente le valutazioni aggiornate. Il file deve essere in formato csv, deve essere stato preventivamente scaricato da questo compito e deve contenere le colonne con la valutazione e l\'identificativo di ciascuno studente. La codifica del file deve essere UTF-8.';
$string['gradeupdate'] = 'Imposta a {$a->grade} la valutazione dello studente {$a->student}';
$string['ignoremodified'] = 'Consenti la modifica di record che sono stati aggiornati più recentemente n Moodle rispetto al foglio di valutazione offline';
$string['ignoremodified_help'] = 'Il Foglio di valutazione offline contiene le valutazioni aggiornate alla data dello scaricamento da Moodle. Se le valutazioni vengono modificate in Moodle dopo lo scaricamento, per default Moodle impedirà la modifica di queste valutazioni all\'atto dell\'importazione del foglio di valutazione offline. Questa impostazione disabilita il controllo delle date di aggiornamento. Da notare che in presenza di più valutatori, ciascuno potrà sovrascrivere le valutazioni degli altri.';
$string['importgrades'] = 'Conferma modifiche nel foglio di valutazione offline';
$string['invalidgradeimport'] = 'Moodle non è riuscito a leggere il foglio di valutazione offline. Prima di riprovare, accertati che il foglio sia stato salvato nel formato comma separated value (.csv).';
$string['nochanges'] = 'Non sono state trovate valutazioni aggiornate nel foglio di valutazione offline';
$string['offlinegradingworksheet'] = 'Valutazioni';
$string['pluginname'] = 'Foglio di valutazione offline';
$string['processgrades'] = 'Importa valutazioni';
$string['skiprecord'] = 'Salta record';
$string['updatedgrades'] = 'Sono stati aggiornati {$a} feedback e valutazioni';
$string['updaterecord'] = 'Aggiorna record';
$string['uploadgrades'] = 'Carica foglio di valutazione offline';
