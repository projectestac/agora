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
 * Strings for component 'tool_qeupgradehelper', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_qeupgradehelper
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Ação';
$string['alreadydone'] = 'Já foi tudo convertido';
$string['areyousure'] = 'Tem a certeza?';
$string['areyousuremessage'] = 'Deseja continuar a atualizar todas as {$a->numtoconvert} tentativas do teste \'{$a->name}\' na disciplina {$a->shortname}?';
$string['areyousureresetmessage'] = 'O teste \'{$a->name}\' na disciplina {$a->shortname} tem {$a->totalattempts} tentativas, das quais {$a->convertedattempts} foram atualizadas a partir do velho sistema. Dessas, {$a->resettableattempts} podem ser redefinidos, para posterior reconversão. Deseja continuar?';
$string['attemptstoconvert'] = 'Tentativas que necessitam de conversão';
$string['backtoindex'] = 'Voltar à página principal';
$string['conversioncomplete'] = 'Conversão completa';
$string['convertattempts'] = 'Converter tentativas';
$string['convertedattempts'] = 'Tentativas convertidas';
$string['convertquiz'] = 'Converter tentativas…';
$string['cronenabled'] = 'Cron ativado';
$string['croninstructions'] = 'Pode ativar o cron para completar automaticamente a atualização a partir de uma atualização parcial. O Cron será executado no horário definido para aquele dia (de acordo com a hora do servidor local). Cada vez que o cron corre, irá processar uma série de tentativas até usar todo o tempo disponível, e irá parar quando correr o próximo cron. Mesmo que tenha configurado, este não irá fazer nada até detetar que todas as atualizações para a versão 2.1 estejam completas.';
$string['cronprocesingtime'] = 'Tempo de processamento que cada cron corre';
$string['cronsetup'] = 'Configurar cron';
$string['cronsetup_desc'] = 'Pode configurar o cron para concluir a atualização das tentativas ao teste automaticamente.';
$string['cronstarthour'] = 'Hora de início';
$string['cronstophour'] = 'Hora de fim';
$string['extracttestcase'] = 'Extrato de caso de teste';
$string['extracttestcase_desc'] = 'Use dados exemplos da base de dados para o ajudar a criar testes individuais que o podem ajudar a testar a atualização.';
$string['gotoindex'] = 'Voltar para a lista de testes a serem atualizados';
$string['gotoquizreport'] = 'Ir para os relatórios deste teste para verificar a atualização';
$string['gotoresetlink'] = 'Ir para a lista de testes que podem ser reiniciados';
$string['includedintheupgrade'] = 'Incluir na atualização?';
$string['invalidquizid'] = 'O id do teste e inválido. Ou o teste não existe ou não tem nada a converter.';
$string['listpreupgrade'] = 'Lista de testes e tentativas';
$string['listpreupgrade_desc'] = 'Esta opção irá mostrar um relatório de todos os testes no sistema e quantas tentativas eles têm. Isto lhe dará uma ideia da atualização que necessita de fazer.';
$string['listpreupgradeintro'] = 'Estes são os números das tentativas do teste que necessitarão de ser processadas quando atualizar o seu site. Até poucas dezenas de milhares não há problema. Muito além disso precisa de pensar sobre quanto tempo a atualização irá demorar.';
$string['listtodo'] = 'Lista de testes ainda por atualizar';
$string['listtodo_desc'] = 'Esta opção irá mostrar um relatório de todos os testes no sistema (se houver) que as tentativas ainda precisam de ser atualizadas para os novos tipos de perguntas.';
$string['listtodointro'] = 'Estes são todos os tetes com tentativas que ainda precisam de ser convertidos. Pode converter as tentativas clicando no link.';
$string['listupgraded'] = 'Lista dos testes já atualizados que podem ser reiniciados';
$string['listupgraded_desc'] = 'Esta opção irá mostrar um relatório de todos os testes no sistema cujas tentativas foram atualizadas, e onde os dados antigos ainda se encontram para poderem ser reiniciados e refeitos.';
$string['listupgradedintro'] = 'Estes são todos os testes que têm tentativas que foram atualizados, e onde os dados antigos ainda se mantêm, para que possam ser reiniciados, e a atualização refeita.';
$string['noquizattempts'] = 'O seu site não tem tentativas de realização de testes!';
$string['nothingupgradedyet'] = 'Não existem tentativas atualizadas que possam ser reiniciadas';
$string['notupgradedsiterequired'] = 'Este script só funcionava antes da atualização do site.';
$string['numberofattempts'] = 'Número de tentativas do teste';
$string['oldsitedetected'] = 'Este parece ser um site que ainda não foi atualizado para incluir o novo gestor de perguntas';
$string['outof'] = '{$a->some} num total de {$a->total}';
$string['pluginname'] = 'Ajudante de atualização de perguntas';
$string['pretendupgrade'] = 'Fazer um dry-run das tentativas atualizadas';
$string['pretendupgrade_desc'] = 'A atualização faz três coisas: Transfere os dados existentes da base de dados; transforma-os; e depois escreve os novos dados na BD. Este script testa as primeiras duas partes do processo.';
$string['questionsessions'] = 'Sessões das perguntas';
$string['quizid'] = 'Id do teste';
$string['quizupgrade'] = 'Estado da atualização do teste';
$string['quizzesthatcanbereset'] = 'Os testes seguintes atualizaram as tentativas e já pode reiniciá-los';
$string['quizzestobeupgraded'] = 'Todos os testes com tentativas';
$string['quizzeswithunconverted'] = 'Os testes seguintes possuem tentativas que necessitam de ser convertidas';
$string['resetcomplete'] = 'Reiniciação completa';
$string['resetquiz'] = 'A reiniciar tentativas…';
$string['resettingquizattempts'] = 'A reiniciar tentativas dos testes';
$string['resettingquizattemptsprogress'] = 'A reiniciar tentativa {$a->done} / {$a->outof}';
$string['upgradedsitedetected'] = 'Este parece ser um site que foi atualizado para incluir o novo atualizador de perguntas.';
$string['upgradedsiterequired'] = 'Este script apenas pode funcionar depois do site estar atualizado.';
$string['upgradingquizattempts'] = 'A atualizar as tentativas do teste \'{$a->name}\' na disciplina {$a->shortname}';
$string['veryoldattemtps'] = 'O seu site tem {$a} tentativas de testes que nunca foram completamente atualizadas durante a atualização do Moodle 1.4 para o Moodle 1.5. Estas tentativas serão tratadas antes da atualização principal. Tem de considerar o tempo extra necessário para esta ação.';
