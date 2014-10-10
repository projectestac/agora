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
 * Strings for component 'tool_generator', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_generator
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bigfile'] = 'Ficheiros grandes {$a}';
$string['courseexplanation'] = 'Esta ferramenta cria testes-padrão da disciplina que incluem muitas secções, atividades e ficheiros.

Com isto pretende-se fornecer uma medida-padrão para verificar o nível de fiabilidade e desempenho de vários componentes do sistema (tais como efetuar e restaurar cópias de segurança).

Este teste é importante na medida em que já houve casos em que o sistema não funcionou (p. ex. numa disciplina com 1000 atividades).

As disciplinas criadas com base nesta funcionalidade podem ocupar muito espaço da base de dados e do sistema de ficheiros (dezenas de gigabytes). Terá de eliminar as disciplinas (e aguardar que sejam executados vários processos de limpeza) para libertar esse espaço novamente.

**Não use esta funcionalidade em produção. Use apenas num servidor de desenvolvimento.

(Para evitar um uso acidental, esta funcionalidade encontra-se desativada, a não ser que tenha selecionado também o nível PROGRAMADOR em Mensagem de erro.)';
$string['coursesize_0'] = 'XS (aprox. 10KB; criada em aprox. 1 segundos)';
$string['coursesize_1'] = 'S (aprox. 10MB; criada em aprox. 30 segundos)';
$string['coursesize_2'] = 'M (aprox. 10MB; criada em aprox. 5 minutos)';
$string['coursesize_3'] = 'L (aprox. 1GB; criada em aprox. 1 hora)';
$string['coursesize_4'] = 'XL (aprox. 10GB; criada em aprox. 4 horas)';
$string['coursesize_5'] = 'XXL (aprox. 20GB; criada em aprox. 8 horas)';
$string['coursewithoutusers'] = 'A disciplina selecionada não tem utilizadores';
$string['createcourse'] = 'Criar disciplina';
$string['createtestplan'] = 'Criar plano de teste';
$string['creating'] = 'A criar disciplina';
$string['done'] = 'completo ({$a}s)';
$string['downloadtestplan'] = 'Fazer o download do plano de teste';
$string['downloadusersfile'] = 'Fazer o download do ficheiro de utilizadores';
$string['error_nocourses'] = 'Não há disciplinas para gerar o plano de teste';
$string['error_noforumdiscussions'] = 'A disciplina selecionada não contém fóruns de discussão';
$string['error_noforuminstances'] = 'A disciplina selecionada não contém instâncias do módulo Fórum';
$string['error_noforumreplies'] = 'A disciplina selecionada não contém respostas do fórum';
$string['error_nonexistingcourse'] = 'A disciplina especificada não existe';
$string['error_nopageinstances'] = 'A disciplina selecionada não contém instâncias do módulo Página';
$string['error_notdebugging'] = 'Não disponível no servidor porque a depuração não está definido para o Programador';
$string['error_nouserspassword'] = 'Tem de definir $CFG->tool_generator_users_password em \'config.php\' para gerar o plano de teste';
$string['firstname'] = 'Utilizador da disciplina de Teste';
$string['fullname'] = 'Testar disciplina: {$a->size}';
$string['maketestcourse'] = 'Criar disciplina de Teste';
$string['maketestplan'] = 'Criar plano de teste JMeter';
$string['notenoughusers'] = 'A disciplina selecionada não contém utilizadores suficientes';
$string['pluginname'] = 'Gerador de dados de desenvolvimento';
$string['progress_checkaccounts'] = 'A verificar as contas de utilizador ({$a})';
$string['progress_coursecompleted'] = 'Disciplina concluída ({$a}s)';
$string['progress_createaccounts'] = 'A criar contas de utilizador ({$a->from} - {$a->to})';
$string['progress_createassignments'] = 'A criar Trabalhos ({$a})';
$string['progress_createbigfiles'] = 'A criar ficheiros grandes ({$a})';
$string['progress_createcourse'] = 'A criar disciplina {$a}';
$string['progress_createforum'] = 'A criar fórum ({$a} tópicos)';
$string['progress_createpages'] = 'A criar páginas ({$a})';
$string['progress_createsmallfiles'] = 'A criar ficheiros pequenos ({$a})';
$string['progress_enrol'] = 'A inscrever utilizadores na disciplina ({$a})';
$string['progress_sitecompleted'] = 'Site concluído ({$a}s)';
$string['shortsize_0'] = 'XS';
$string['shortsize_1'] = 'S';
$string['shortsize_2'] = 'M';
$string['shortsize_3'] = 'L';
$string['shortsize_4'] = 'XL';
$string['shortsize_5'] = 'XXL';
$string['sitesize_0'] = 'XS (aprox. 10MB; 3 disciplinas, criadas em aprox. 30 segundos)';
$string['sitesize_1'] = 'S (aprox. 50MB; 8 disciplinas, criadas em aprox. 2 minutos)';
$string['sitesize_2'] = 'M (aprox. 200MB; 73 disciplinas, criadas em aprox. 10 minutos)';
$string['sitesize_3'] = 'L (aprox. 1\'5GB; 227 disciplinas, criadas em aprox. 1\'5 horas)';
$string['sitesize_4'] = 'XL (aprox. 10GB; 1065 disciplinas, criadas em aprox. 5 horas)';
$string['sitesize_5'] = 'XXL (aprox. 20GB; 4177 disciplinas, criadas em aprox. 10 horas)';
$string['size'] = 'Tamanho da disciplina';
$string['smallfiles'] = 'Ficheiros pequenos';
$string['targetcourse'] = 'Disciplina alvo de teste';
$string['testplanexplanation'] = 'Esta ferramenta cria um ficheiro JMeter de plano de teste juntamente com o ficheiro de credenciais do utilizador.

Este plano de teste é concebido para funcionar em conjunto com {$a}, o que facilita a execução do plano de teste num ambiente Moodle em específico, reúne informação sobre os procedimentos e compara os resultados. Por isso, é necessário fazer o download e usar o script \'test_runner.sh\' ou acompanhar a instalação e instruções de uso.

É necessário definir uma senha para os utilizadores da disciplina em \'config.php\' (p. ex. $CFG->tool_generator_users_password = \'moodle\';). Não existe nenhum valor predefinido para esta senha para impedir utilizações não intencionais da ferramenta. É necessário usar a opção de atualização de senhas no caso de os utilizadores da sua disciplina terem outra senha ou caso as senhas tenham sido geradas pelo \'tool_generator\' sem definir um valor $CFG->tool_generator_users_password.

Isto faz parte do \'tool_generator\' e por isso funciona corretamente com as disciplinas geradas pelo gerador de sites e disciplinas. Também pode ser utilizado com qualquer disciplina que contenha, pelo menos:

*Suficientes utilizadores inscritos (depende do tamanho do plano de teste que selecionou) com a senha redefinida para \'moodle\';

*Uma instância do módulo Página;

*Uma instância do módulo Fórum com, pelo menos, um tópico e uma resposta.

Deve considerar a capacidade dos seus servidores durante a execução de grandes planos de teste, pois a quantidade de carga gerada pelo JMeter pode ser especialmente grande. O período de ramp-up foi ajustado de acordo com o número de segmentos (utilizadores) para reduzir este tipo de problemas, mas a carga é ainda é muito grande.

** Não execute o plano de teste num servidor de produção**. Esta funcionalidade apenas cria ficheiros para o JMeter, o que por si só não causa nenhum perigo, mas **NUNCA** deverá executar este plano de teste num servidor de desenvolvimento.';
$string['testplansize_0'] = 'XS ({$a->users} utilizadores, {$a->loops}';
$string['testplansize_1'] = 'S ({$a->users} utilizadores, {$a->loops} loops e {$a->rampup} período de ramp-up)';
$string['testplansize_2'] = 'M ({$a->users} utilizadores, {$a->loops} loops e {$a->rampup} período de ramp-up)';
$string['testplansize_3'] = 'L ({$a->users} utilizadores, {$a->loops} loops e {$a->rampup} período de ramp-up)';
$string['testplansize_4'] = 'XL ({$a->users} utilizadores, {$a->loops} loops e {$a->rampup} período de ramp-up)';
$string['testplansize_5'] = 'XXL ({$a->users} utilizadores, {$a->loops} loops e {$a->rampup} período de ramp-up)';
$string['updateuserspassword'] = 'Atualize a senha dos utilizadores da disciplina';
$string['updateuserspassword_help'] = 'JMeter precisa de entrar como os utilizadores da disciplina, you can set the users password using $CFG->tool_generator_users_password in config.php; this setting updates the course user\'s password according to $CFG->tool_generator_users_password. It can be useful in case you are using a course not generated by tool_generator or $CFG->tool_generator_users_password was not set when you created the test courses.';
