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
 * Strings for component 'qbehaviour_deferredcbm', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   qbehaviour_deferredcbm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accuracy'] = 'Accuratezza';
$string['accuracyandbonus'] = 'Accuratezza + Bonus';
$string['assumingcertainty'] = 'Non hai scelto il livello di confidenza. Si considererà: {$a}.';
$string['averagecbmmark'] = 'Punteggio CBM medio';
$string['basemark'] = 'Punteggio base {$a}';
$string['breakdownbycertainty'] = 'Ripartizione per confidenza';
$string['cbmbonus'] = 'CBM bonus';
$string['cbmgradeexplanation'] = 'Per CBM, la valutazione soprastante è relativa alla valutazione massima per risposte tutte corrette con C=1.';
$string['cbmgrades'] = 'Valutazioni CBM';
$string['cbmgrades_help'] = 'Con il Certainty Based Marking (CBM) rispondere correttamente alle domande con C=1 (poco sicuro) si ottiene una valutazione del 100%. le valutazioni possono arrivare al 300% se si risponde correttamente con C=3 (abbastanza sicuro).
Le risposte sbagliate con elevato livello di confidenza abbassano la valutazione più delle risposte sbagliate con basso livello di confidenza, cosa che può produrre valutazioni finali negative.

**Accuratezza** è la percentuale di risposte corrette senza la confidenza ma pesata sul punteggio massimo di ciascuna domanda. Distinguere correttamente le risposte più o meno corrette fornisce una valutazione più alta rispetto a scegliere lo stesso livello di confidenza per tutte le domande, cosa che si riflette nel **CBM Bonus**.  **Accuratezza** + **CBM Bonus** fornisce una misura della conoscenza più accurata rispetto a **Accuratezza**. Le risposte sbagliate con elevato livello di confidenza possono produrre bonus negativi, un richiamo a rivedere attentamente ciò che realmente si sa e cosa non si sa.';
$string['cbmmark'] = 'Punteggio CBM {$a}';
$string['certainty'] = 'Confidenza';
$string['certainty1'] = 'C=1 (Poco sicuro: <67%)';
$string['certainty-1'] = 'Nessuna idea';
$string['certainty2'] = 'C=2 (Medio: >67%)';
$string['certainty3'] = 'C=3 (Abbastanza sicuro: >80%)';
$string['certainty_help'] = 'La valutazione basata sul livello di confidenza richiede di specificare quanto si ritinga affidabile la propria risposta. I livelli disponibili sono:

Livello di confidenza | C=1 (Insicuro) | C=2 (Medio) | C=3 (Abbastanza sicuro)
------------------- | ------------ | --------- | ----------------
Punteggio se giusta | 1 | 2 | 3
Punteggio se sbagliata | 0 | -2 | -6
Probabilità se corretta | <67% | 67-80% | >80%

I punteggi migliori si ottengono riconoscendo poca confidenza. Ad esempio se si pensa di avere più di una probabilità su tre di essere in errore, si dovrebbe inserire C=1 per evitare il rischio di punteggi negativi.';
$string['certaintyshort1'] = 'C=1';
$string['certaintyshort-1'] = 'Nessuna idea';
$string['certaintyshort2'] = 'C=2';
$string['certaintyshort3'] = 'C=3';
$string['dontknow'] = 'Nessuna idea';
$string['foransweredquestions'] = 'Risultati per le sole {$a} risposte date';
$string['forentirequiz'] = 'Risultati per l\'intero quiz ({$a} domande)';
$string['howcertainareyou'] = 'Confidenza {$a->help}: {$a->choices}';
$string['judgementok'] = 'OK';
$string['judgementsummary'] = 'Risposte: {$a->responses}. Accuratezza: {$a->fraction}. (Intervallo ottimale da {$a->idealrangelow} a {$a->idealrangehigh}). Con questo livello di confidenza sei {$a->judgement}.';
$string['noquestions'] = 'Nessuna risposta';
$string['overconfident'] = 'troppo confidente';
$string['pluginname'] = 'Feedback differito con CBM';
$string['slightlyoverconfident'] = 'leggermente confidente';
$string['slightlyunderconfident'] = 'poco confidente';
$string['underconfident'] = 'per nulla confidente';
