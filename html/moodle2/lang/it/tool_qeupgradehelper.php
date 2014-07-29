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
 * Strings for component 'tool_qeupgradehelper', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_qeupgradehelper
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Azione';
$string['alreadydone'] = 'La conversione è già stata completata';
$string['areyousure'] = 'Sei sicuro?';
$string['areyousuremessage'] = 'Desdideri procedere con l\'aggiornamento di tutti i {$a->numtoconvert} tentativi del quiz \'{$a->name}\' nel corso {$a->shortname}?';
$string['areyousureresetmessage'] = 'Il quiz \'{$a->name}\' nel corso {$a->shortname} contiene {$a->totalattempts} tentativi, dei quali {$a->convertedattempts} sono stati aggiornati dal sistema precedente. Di questi, {$a->resettableattempts} possono essere resettati ed essere per essere convertiti di nuovo in seguito. Vuoi procedere?';
$string['attemptstoconvert'] = 'Tentativi che devono essere convertiti';
$string['backtoindex'] = 'Torna alla pagina principale';
$string['conversioncomplete'] = 'Conversione completata';
$string['convertattempts'] = 'Converti tentativi';
$string['convertedattempts'] = 'Tentativi convertiti';
$string['convertquiz'] = 'Conversione tentativi...';
$string['cronenabled'] = 'Cron abilitato';
$string['croninstructions'] = 'E\' possibile configurare il cron affinché completi automaticamente l\'aggiornamento a seguito di un aggiornamento parziale. Il cron girerà durante l\'intervallo temporale impostato (in funzione dell\'ora locale). Ad ogni esecuzione del cron verranno elaborati i tentativi fino al raggiungimento del limite temporale, dopo il quale l\'elaborazione si fermerà. Se l\'upgrade a 2.1 è stato già completato, le impostazioni del cron non avranno effetto.';
$string['cronprocesingtime'] = 'Tempo di elaborazione per ogni esecuzione del cron';
$string['cronsetup'] = 'Configura cron';
$string['cronsetup_desc'] = 'E\' possibile configurare il cron affinché completi automaticamente l\'aggiornamento dei tentativi dei quiz';
$string['cronstarthour'] = 'Ora di inizio';
$string['cronstophour'] = 'Ora di fine';
$string['extracttestcase'] = 'Estrai test case';
$string['extracttestcase_desc'] = 'Utilizza dati di esempio presi dal database utili per creare unit test da usare per sperimentare l\'aggiornamento.';
$string['gotoindex'] = 'Torna all\'elenco dei quiz aggiornabili';
$string['gotoquizreport'] = 'Vai al report del quiz e verifica l\'aggiornamento';
$string['gotoresetlink'] = 'Vai all\'elenco dei quiz resettabili';
$string['includedintheupgrade'] = 'Incluso nel l\'aggiornamento?';
$string['invalidquizid'] = 'Id quiz non valido. Il quiz non esiste oppure non contiene tentativi da convertire.';
$string['listpreupgrade'] = 'Elenca quiz e tentativi';
$string['listpreupgrade_desc'] = 'Visualizza un report di tutti i quiz presenti sul sistema ed i tentativi che hanno. Il report fornisce una idea della dimensione dell\'upgrade da effettuare.';
$string['listpreupgradeintro'] = 'Questo è il numero di tentativi che devono essere elaborati per aggiornare il sito. Qualche decina di migliaia di tentativi non rappresentano un problema. Se i tentativi sono molti di più, allora dovrai pensare al tempo necessario per l\'aggiornamento.';
$string['listtodo'] = 'Elenca quiz da aggiornare';
$string['listtodo_desc'] = 'Visualizza un report di tutti i quiz presenti sul sistema (se presenti) che hanno tentativi da aggiornare al nuovo motore delle domande';
$string['listtodointro'] = 'Questi sono tutti i quiz che contengono tentativo che devono ancora essere convertiti. Puoi convertirli facendo click sul link.';
$string['listupgraded'] = 'Elenca i quiz aggiornati che è possibile resetttare';
$string['listupgraded_desc'] = 'Visualizza un report con tutti i quiz presenti nel sistema i cui tentativi sono stati aggiornati e dove i dati precedenti sono ancora presenti, consentendone il reset e la ripetizione dell\'aggiornamento.';
$string['listupgradedintro'] = 'Questi sono tutti i quiz i cui tentativi sono stati aggiornati ma che contengono ancora i dati esistenti prima dell\'aggiornamento. E\' possibile resettare questi quiz ed effettuare di nuovo l\'aggiornamento.';
$string['noquizattempts'] = 'Nel tuo sito non ci sono quiz con tentativi!';
$string['nothingupgradedyet'] = 'Non ci sono tentativi aggiornati da resettare';
$string['notupgradedsiterequired'] = 'Questo script funziona solo prima dell\'aggiornamento del sito';
$string['numberofattempts'] = 'Numero di tentativi quiz';
$string['oldsitedetected'] = 'Questo sito non risulta essere stato aggiornato per utilizzare il nuovo motore delle domande.';
$string['outof'] = '{$a->some} su {$a->total}';
$string['pluginname'] = 'Assistente per l\'aggiornamento del motore delle domande';
$string['pretendupgrade'] = 'Esegui un dry-run dell\'aggiornamento tentativi';
$string['pretendupgrade_desc'] = 'L\'aggiornamento svolge tre funzioni: legge i dati presenti dal database, li converte; scrive i dati convertiti nel database. Questo script eseguirà una prova delle prime due funzioni.';
$string['questionsessions'] = 'Sessioni domanda';
$string['quizid'] = 'ID quiz';
$string['quizupgrade'] = 'Stato aggiornamento quiz';
$string['quizzesthatcanbereset'] = 'I quiz seguenti hanno tentativi convertiti che puoi voler resettare';
$string['quizzestobeupgraded'] = 'Tutti i quiz con tentativi';
$string['quizzeswithunconverted'] = 'I seguenti quiz contengono tentativi da convertire';
$string['resetcomplete'] = 'Reset completato';
$string['resetquiz'] = 'Reset tentativi...';
$string['resettingquizattempts'] = 'Reset tentativi quiz in corso';
$string['resettingquizattemptsprogress'] = 'Reset tentativo {$a->done} / {$a->outof}';
$string['upgradedsitedetected'] = 'Questo sito risulta essere stato aggiornato per utilizzare il nuovo motore delle domande.';
$string['upgradedsiterequired'] = 'Questo script funziona solo se il sito è stato aggiornato.';
$string['upgradingquizattempts'] = 'Aggiornamento tentativi quiz \'{$a->name}\' nel corso {$a->shortname}';
$string['veryoldattemtps'] = 'Il sito ha {$a} tentativi di quiz che non sono stati completamente aggiornati durante la migrazione da Moodle 1.4 a Moodle 1.5. Questi tentativi devono essere gestiti prima di eseguire l\'aggiornamento. E\' importante valutare il tempo necessario.';
