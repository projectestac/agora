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
 * Strings for component 'qbehaviour_deferredcbm', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   qbehaviour_deferredcbm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accuracy'] = 'Precisão';
$string['accuracyandbonus'] = 'Precisão + Bónus';
$string['assumingcertainty'] = 'Não selecionou um grau de certeza. Grau assumido: {$a}.';
$string['averagecbmmark'] = 'Nota média ABGC';
$string['basemark'] = 'Nota base {$a}';
$string['breakdownbycertainty'] = 'Decompor por grau de certeza';
$string['cbmbonus'] = 'Bónus ABGC (avaliação com base no grau de certeza)';
$string['cbmgradeexplanation'] = 'Para avaliação com base no grau de certeza,  a nota acima é mostrada em função do valor máximo para C=1 (totalmente correto).';
$string['cbmgrades'] = 'Notas ABGC';
$string['cbmgrades_help'] = 'Na Avaliação com Base no Grau de Certeza (ABCG) ter todas as questões corretas com C=1 (grau de certeza reduzido) equivale a uma pontuação de 100%. As notas podem ser tão altas quanto 300% se todas as questões estiverem corretas com C=3 (grau de certeza elevado). Equívocos (ou seja, respostas erradas dadas com elevado grau de certeza) diminuem muito mais as notas do que quando se reconhece que as respostas erradas foram dadas com reduzido grau de certeza. Isto poderá até resultar em notas globais negativas.

**Precisão** significa';
$string['cbmmark'] = 'Nota da ABGC {$a}';
$string['certainty'] = 'Certeza';
$string['certainty1'] = 'C=1 (Grau de certeza Reduzido: <67%)';
$string['certainty-1'] = 'Não faço ideia';
$string['certainty2'] = 'C=2 (Grau de certeza Médio: >67%)';
$string['certainty3'] = 'C=3 (Grau de certeza Elevado: >80%)';
$string['certainty_help'] = 'A Avaliação com Base no Grau de Certeza (ABGC) requer que indique o quão certa acha que a sua resposta está. Os níveis disponíveis são:

Grau de certeza | C=1 (Reduzido) | C=2 (Médio) | C=3 (Elevado)
------------------- | ------------ | --------- | ----------------
Nota se correto | 1 | 2 | 3
Nota se errado | 0 | -2 | -6
Probabilidade | <67% | 67-80% | >80%

As respostas sem certeza obterão melhores notas se for reconhecido um grau reduzido de certeza. Por exemplo, se houver mais do que 1 em 3 hipóteses de a resposta estar errada, deverá ser indicado C=1 e evitar o risco de ter uma nota negativa.';
$string['certaintyshort1'] = 'C=1';
$string['certaintyshort-1'] = 'Não faço ideia';
$string['certaintyshort2'] = 'C=2';
$string['certaintyshort3'] = 'C=3';
$string['dontknow'] = 'Não faço ideia';
$string['foransweredquestions'] = 'Resultados de apenas {$a} perguntas respondidas';
$string['forentirequiz'] = 'Resultados de todo o Teste ({$a} questões)';
$string['howcertainareyou'] = 'Grau de certeza{$a->help}: {$a->choices}';
$string['judgementok'] = 'Ok';
$string['judgementsummary'] = 'Respostas: {$a->responses}. Precisão: {$a->fraction}. (Intervalo ideal {$a->idealrangelow} para {$a->idealrangehigh}). Usou este grau de certeza: {$a->judgement}';
$string['noquestions'] = 'Sem respostas';
$string['overconfident'] = 'excesso de confiança';
$string['pluginname'] = 'Feedback diferido com ABGC';
$string['slightlyoverconfident'] = 'um pouco de confiança a mais';
$string['slightlyunderconfident'] = 'um pouco de confiança a menos';
$string['underconfident'] = 'sub-confiante';
