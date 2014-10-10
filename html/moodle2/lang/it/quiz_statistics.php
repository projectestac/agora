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
 * Strings for component 'quiz_statistics', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   quiz_statistics
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actualresponse'] = 'Risposte reali';
$string['allattempts'] = 'tutti i tentativi';
$string['allattemptsavg'] = 'Voto medio di tutti i tentativi';
$string['allattemptscount'] = 'Numero totale dei tentativi completi valutati';
$string['analysisofresponses'] = 'Analisi delle risposte';
$string['analysisofresponsesfor'] = 'Analisi delle risposte per {$a}';
$string['attempts'] = 'Tentativi';
$string['attemptsall'] = 'tutti i tentativi';
$string['attemptsfirst'] = 'primo tentativo';
$string['backtoquizreport'] = 'Torna alla pagina home delle statistiche';
$string['calculatefrom'] = 'Calcolo statistiche da';
$string['cic'] = 'Coefficiente di consistenza interna (per {$a})';
$string['completestatsfilename'] = 'completestats';
$string['count'] = 'Numero';
$string['coursename'] = 'Nome corso';
$string['detailedanalysis'] = 'Analisi più dettagliata delle risposte a questa domanda';
$string['discrimination_index'] = 'Indice di discriminazione';
$string['discriminative_efficiency'] = 'Efficienza discriminativa';
$string['downloadeverything'] = 'Download report completo come {$a->formatsmenu} {$a->downloadbutton}';
$string['duration'] = 'Aperto per';
$string['effective_weight'] = 'Peso effettivo';
$string['errordeleting'] = 'Si è verificato un errore durante l\'eliminazione di {$a} vecchi record.';
$string['erroritemappearsmorethanoncewithdifferentweight'] = 'La domanda ({$a}) è stata utilizzata più di una volta nello stesso test in diverse posizioni e con diversi pesi. Questa situazione al momento non è supportata dalla statistiche e potrebbe rendere i risultati non affidabili.';
$string['errormedian'] = 'Si è verificato un errore ricavando la mediana';
$string['errorpowerquestions'] = 'Si è verificato un errore ricavando i dati per il calcolo della varianza dei punteggi delle domande';
$string['errorpowers'] = 'Si è verificato un errore ricavando i dati per il calcolo della varianza dei punteggi dei quiz';
$string['errorrandom'] = 'Si è verificato un errore ricavando i dati del sotto elemento';
$string['errorratio'] = 'Quoziente d\'errore (per {$a})';
$string['errorstatisticsquestions'] = 'Si è verificato un errore ricavando i dati per il calcolo delle statistiche   dei punteggi delle domande';
$string['facility'] = 'Indice di abilità';
$string['firstattempts'] = 'primi tentativi';
$string['firstattemptsavg'] = 'Voto medio dei primi tentativi';
$string['firstattemptscount'] = 'Numero di primi tentativi completati e valutati';
$string['frequency'] = 'Frequenza';
$string['highestattempts'] = 'tentativo migliore';
$string['highestattemptsavg'] = 'Media delle valutazioni dei tentativi migliori';
$string['intended_weight'] = 'Peso previsto';
$string['kurtosis'] = 'Curtosi della distribuzione dei voti (per {$a})';
$string['lastattempts'] = 'ultimi tentativi';
$string['lastattemptsavg'] = 'Media delle valutazioni degli ultimi tentativi';
$string['lastcalculated'] = 'Calcolo più recente: {$a->lastcalculated} fa. Tentativi effettuati dopo il calcolo più recente: {$a->count}.';
$string['median'] = 'Mediana dei voti (per {$a})';
$string['modelresponse'] = 'Modello di risposta';
$string['negcovar'] = 'Covarianza negativa del voto rispetto al voto del tentativo complessivo';
$string['negcovar_help'] = 'Il voto di questa domanda relativo a questo insieme di tentativi varia in modo opposto rispetto al voto complessivo di tutti i tentativi. Questo significa che che il voto complessivo tende ad essere inferiore alla media quando il voto per questa domanda è superiore alla media e vice-versa.

In questo caso la nostra equazione per ricavare il peso ottimale della domanda non funziona. The calculations for effective question weight for other questions in this quiz are the effective question weight for these questions if the highlighted questions with a negative covariance are given a maximum grade of zero.

If you edit a quiz and give these question(s) with negative covariance a max grade of zero then the effective question weight of these questions will be zero and the real effective question weight of other questions will be as calculated now.';
$string['nostudentsingroup'] = 'In questo gruppo non ci sono studenti';
$string['optiongrade'] = 'Credito parziale';
$string['partofquestion'] = 'Parte di domanda';
$string['pluginname'] = 'Statisitche';
$string['position'] = 'Posizione';
$string['positions'] = 'Posizione/i';
$string['questioninformation'] = 'Informazioni domanda';
$string['questionname'] = 'Nome domanda';
$string['questionnumber'] = 'Q#';
$string['questionstatistics'] = 'Statistiche sulle domande';
$string['questionstatsfilename'] = 'questionstats';
$string['questiontype'] = 'Tipo di domanda';
$string['quizinformation'] = 'Informazioni quiz';
$string['quizname'] = 'Nome quiz';
$string['quizoverallstatistics'] = 'Statistiche complessive quiz';
$string['quizstructureanalysis'] = 'Analisi struttura quiz';
$string['random_guess_score'] = 'Indice delle risposte date a caso';
$string['recalculatenow'] = 'Ricalcola ora';
$string['reportsettings'] = 'Impostazioni di calcolo delle statistiche';
$string['response'] = 'Risposta data';
$string['skewness'] = 'Asimmetria della distribuzione dei voti (per {$a})';
$string['standarddeviation'] = 'Deviazione standard (per {$a})';
$string['standarddeviationq'] = 'Deviazione standard';
$string['standarderror'] = 'Errore standard (per {$a})';
$string['statistics'] = 'Statistiche';
$string['statistics:componentname'] = 'Statistiche quiz';
$string['statisticsreport'] = 'Report statistico';
$string['statisticsreportgraph'] = 'Statistiche sulla posizione delle domande';
$string['statistics:view'] = 'Visualizzare report statistici';
$string['statsfor'] = 'Statistiche quiz (per {$a})';
