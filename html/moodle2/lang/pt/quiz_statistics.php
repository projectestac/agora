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
 * Strings for component 'quiz_statistics', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   quiz_statistics
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actualresponse'] = 'Resposta atual';
$string['allattempts'] = 'todas as tentativas';
$string['allattemptsavg'] = 'Nota média de todas as tentativas';
$string['allattemptscount'] = 'Número de tentativas terminadas e avaliadas';
$string['analysisofresponses'] = 'Análise de respostas';
$string['analysisofresponsesfor'] = 'Análise de respostas para {$a}.';
$string['attempts'] = 'Tentativas';
$string['attemptsall'] = 'todas as tentativas';
$string['attemptsfirst'] = 'primeira tentativa';
$string['backtoquizreport'] = 'Voltar à página principal do relatório de estatísticas.';
$string['calculatefrom'] = 'Calcular estatísticas a partir de';
$string['cic'] = 'Coeficiente de consistência interna (para {$a})';
$string['completestatsfilename'] = 'completestats';
$string['count'] = 'Contagem';
$string['coursename'] = 'Nome da disciplina';
$string['detailedanalysis'] = 'Análise mais detalhada das respostas a esta pergunta';
$string['discrimination_index'] = 'Índice de Discriminação';
$string['discriminative_efficiency'] = 'Eficiência discriminante';
$string['downloadeverything'] = 'Descarregar relatórios completos como  {$a->formatsmenu} {$a->downloadbutton}';
$string['duration'] = 'Aberto para';
$string['effective_weight'] = 'Peso efetivo';
$string['errordeleting'] = 'Erro ao apagar registos antigos {$a}';
$string['erroritemappearsmorethanoncewithdifferentweight'] = 'A pergunta ({$a}) aparece mais uma vez com pesos diferentes em diferentes posições do teste. Isto não é suportado pelo relatório de estatísticas e poderá comprometer a fiabilidade das estatísticas para esta pergunta.';
$string['errormedian'] = 'Ocorreu um erro ao calcular a mediana';
$string['errorpowerquestions'] = 'Ocorreu um erro ao procurar os dados para calcular a variância das notas da pergunta';
$string['errorpowers'] = 'Ocorreu um erro ao procurar os dados para calcular a variância das notas do teste';
$string['errorrandom'] = 'Ocorreu um erro ao obter dados dos sub itens';
$string['errorratio'] = 'Ocorreu um erro no rácio (em {$a})';
$string['errorstatisticsquestions'] = 'Ocorreu um erro ao procurar os dados para calcular as estatísticas para as notas das perguntas';
$string['facility'] = 'Índice de Facilidade';
$string['firstattempts'] = 'primeiras tentativas';
$string['firstattemptsavg'] = 'Nota média das primeiras tentativas';
$string['firstattemptscount'] = 'Número de primeiras tentativas terminadas e avaliadas';
$string['frequency'] = 'Frequência';
$string['highestattempts'] = 'nota mais alta';
$string['highestattemptsavg'] = 'nota média das notas mais altas';
$string['intended_weight'] = 'Peso pretendido';
$string['kurtosis'] = 'Kurtosis da distribuição da pontuação (para {$a})';
$string['lastattempts'] = 'última tentativa';
$string['lastattemptsavg'] = 'nota média das últimas tentativas';
$string['lastcalculated'] = 'Foram realizadas {$a->count} tentativas desde a último cálculo há {$a->lastcalculated}.';
$string['median'] = 'Mediana da Nota (para {$a})';
$string['modelresponse'] = 'Modelo de resposta';
$string['negcovar'] = 'Covariância negativa da nota com a nota total da tentativa';
$string['negcovar_help'] = 'A nota desta questão para esse conjunto de tentativas no teste varia de forma oposta à nota global da tentativa. Isto significa que a nota global da tentativa tende a estar abaixo da média quando a nota para esta pergunta está acima da média e vice-versa.

A nossa equação para o peso efetivo da pergunta não pode ser calculada neste caso. Os cálculos do peso efetivo para as outras perguntas deste teste são o peso efetivo para estas perguntas se for atribuído às perguntas assinaladas com covariância negativa uma nota máxima de zero.

Se editar um teste e atribuir a essas perguntas com covariância negativa a nota máxima de zero, então o peso efetivo dessas perguntas será zero e o peso real efetivo de outras perguntas será como o calculado agora.';
$string['nostudentsingroup'] = 'Ainda não existem alunos neste grupo';
$string['optiongrade'] = 'Crédito parcial';
$string['partofquestion'] = 'Parte da pergunta';
$string['pluginname'] = 'Estatísticas';
$string['position'] = 'Posição';
$string['positions'] = 'Posição(ões)';
$string['questioninformation'] = 'Informação da pergunta';
$string['questionname'] = 'Nome da pergunta';
$string['questionnumber'] = 'P#';
$string['questionstatistics'] = 'Estatísticas da pergunta';
$string['questionstatsfilename'] = 'questionstats';
$string['questiontype'] = 'Tipo de pergunta';
$string['quizinformation'] = 'Informação do teste';
$string['quizname'] = 'Nome do teste';
$string['quizoverallstatistics'] = 'Estatísticas globais do teste';
$string['quizstructureanalysis'] = 'Análise da estrutura do teste';
$string['random_guess_score'] = 'Pontuação de resposta aleatória';
$string['recalculatenow'] = 'Reavaliar agora';
$string['reportsettings'] = 'Configurações de cálculo das estatísticas';
$string['response'] = 'Resposta';
$string['skewness'] = 'Skewness da distribuição da pontuação (para {$a})';
$string['standarddeviation'] = 'Desvio Padrão (para {$a})';
$string['standarddeviationq'] = 'Desvio Padrão';
$string['standarderror'] = 'Erro standard (para {$a})';
$string['statistics'] = 'Estatísticas';
$string['statistics:componentname'] = 'Relatório de Estatísticas do teste';
$string['statisticsreport'] = 'Relatório de estatísticas';
$string['statisticsreportgraph'] = 'Estatística para as posições da pergunta';
$string['statistics:view'] = 'Ver relatório de estatísticas';
$string['statsfor'] = 'Estatísticas do teste (para {$a})';
