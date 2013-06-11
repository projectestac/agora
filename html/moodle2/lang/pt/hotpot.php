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
 * Strings for component 'hotpot', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   hotpot
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = 'Abandonado(s)';
$string['activitygrade'] = 'Nota da atividade';
$string['added'] = 'Adicionado';
$string['addquizchain'] = 'Adicionar cadeia de testes';
$string['addquizchain_help'] = 'Devem ser adicionados todos os testes em cadeia?

**Não**
: Apenas um teste será adicionado à disciplina

**Sim**
: Se o ficheiro de origem é **ficheiro de teste**, é tratado como o início de uma cadeia de testes e todos os testes da cadeia são adicionados à disciplina com as mesmas configurações. Cada teste na cadeia deve ter uma ligação para o ficheiro seguinte na cadeia.

Se o ficheiro de origem é uma **pasta**, todos os testes na pasta são adicionados à disciplina para formar uma cadeia de testes com configurações idênticas.

Se o ficheiro de origem é um **ficheiro de unidade**, como um ficheiro Hot Potatoes ou index.html, os testes do ficheiro serão adicionados à disciplina curso como uma cadeia de cadeia de testes com configurações idênticas.';
$string['allowreview'] = 'Permitir revisão';
$string['allowreview_help'] = 'Se ativar esta opção, os alunos podem rever as suas tentativas de resposta após o teste fechar';
$string['analysisreport'] = 'Análise de item';
$string['attemptlimit'] = 'Limite da tentativa';
$string['attemptlimit_help'] = 'O máximo de tentativas que um aluno pode realizar num teste HotPotatoes';
$string['attemptnumber'] = 'Número da tentativa';
$string['attempts'] = 'Tentativas';
$string['attemptscore'] = 'Nota da tentativa';
$string['attemptsunlimited'] = 'Tentativas ilimitadas';
$string['average'] = 'Média';
$string['averagescore'] = 'Nota média';
$string['cacherecords'] = 'Cache de registos';
$string['checks'] = 'Verificações';
$string['checksomeboxes'] = 'Verifique as caixas';
$string['clearcache'] = 'Limpar cache HotPot';
$string['cleardetails'] = 'Limpar detalhes HotPot';
$string['clearedcache'] = 'A cache HotPot foi limpa';
$string['cleareddetails'] = 'Os detalhes HotPot foram limpos';
$string['clickreporting'] = 'Ativar relatório de cliques';
$string['clickreporting_help'] = 'Se ativar esta opção, um registo separado é mantido cada vez que uma "dica", "pista" ou o botão "verificar" é clicado. Isso permite que o professor tenha um relatório detalhado dos acontecimentos do teste a cada clique. Caso contrário, é apenas mantido um registo por tentativa.';
$string['clicktrailreport'] = 'Relatório de cliques';
$string['closed'] = 'A atividade já fechou';
$string['clues'] = 'Pistas';
$string['completed'] = 'Completo';
$string['configenablecache'] = 'Manter uma cache de testes HotPot pode acelerar drasticamente a entrega dos testes aos alunos.';
$string['configenablecron'] = 'Especifique as horas no seu fuso horário em que o script cron pode correr';
$string['configenablemymoodle'] = 'Estas configurações controlam se o HotPOt é listado na página do Moodle ou não';
$string['configenableobfuscate'] = 'Ofuscando o código javascript para inserir players de mídia torna mais difícil determinar o nome do arquivo de mídia e adivinhar o que o arquivo contém.';
$string['configenableswf'] = 'Permitir incorporar ficheiros SWF nas atividades HotPot. Se ativo, esta definição substitui filter_mediaplugin_enable_swf.';
$string['configfile'] = 'Ficheiro de configuração';
$string['configframeheight'] = 'Quando um teste é exibido dentro de uma janela, este valor é a altura (em pixels) do topo superior, que contém a barra de navegação Moodle.';
$string['configlocation'] = 'Ficheiro de configuração local';
$string['configlockframe'] = 'Se esta configuração está ativa, então a janela de navegação fica bloqueada para que não seja possível redimensioná-la, ajustá-la ou ver as bordas.';
$string['configmaxeventlength'] = 'Se um HotPot tem especificado uma data de início e de fecho, e a diferença é superior ao número de dias especificado nesta opção, então dois eventos separados são adicionados ao bloco Calendário. Para períodos mais curtos, ou quando apenas é configurado um dia, é adicionado apenas um evento no calendário. Se não configurado nenhum período de tempo nenhum evento será adicionado.';
$string['configstoredetails'] = 'Se esta configuração estiver ativa, então os detalhes XML das tentativas nos HotPot serão guardados na tabela hotpot_details. Isto permite visualizar as tentativas para serem reclassificadas no futuro de forma a refletir as mudanças no sistema de pontuação nos testes HotPot. No entanto, ativar esta opção em um local ocupado fará com que a tabela hotpot_details possa crescer muito rapidamente.';
$string['confirmdeleteattempts'] = 'Tem a certeza que deseja apagar estas tentativas?';
$string['confirmstop'] = 'Tem a certeza que deseja sair desta página?';
$string['correct'] = 'Correto';
$string['couldnotinsertsubmissionform'] = 'Não foi possível inserir o formulário de submissão';
$string['delay1'] = 'Intervalo 1';
$string['delay1_help'] = 'Intervalo mínimo entre a primeira e segunda tentativa';
$string['delay1summary'] = 'Intervalo de tempo entre a primeira tentativa e segunda';
$string['delay2'] = 'Intervalo 2';
$string['delay2_help'] = 'Intervalo mínimo entre tentativas após a segunda tentativa.';
$string['delay2summary'] = 'Intervalo de tempo entre as tentativas posteriores';
$string['delay3'] = 'Intervalo 3';
$string['delay3afterok'] = 'Após o aluno clicar no botão OK';
$string['delay3disable'] = 'Não continuar automaticamente';
$string['delay3_help'] = 'A configuração especifica o intervalo de tempo entre terminar a tentativa e voltar ao controlo do Moodle.

**Usar tempo específico (em segundos)**
: o controlo voltará ao Moodle após o número especificado de segundos.

**Usar configurações do ficheiro de origem/modelo**
: o controlo voltará ao Moodle após o número de segundos especificados no ficheiro de origem ou nos ficheiros modelo para este formato.

**Após o aluno clicar no botão OK**
: o controlo voltará ao Moodle após o aluno clicar no botão OK no teste.

**Não continuar automaticamente**
: o controlo não voltará ao Moodle após terminar o teste. O aluno poderá navegar para fora da página do teste.

As notas obtidas no teste são reportadas sempre ao moodle após o aluno sair ou completar o teste, independentemente desta configuração.';
$string['delay3specific'] = 'Usar tempo específico (em segundos)';
$string['delay3summary'] = 'Tempo de intervalo no final do teste';
$string['delay3template'] = 'Usar configurações do ficheiro de origem/modelo';
$string['deleteattempts'] = 'Apagar tentativas';
$string['detailsrecords'] = 'Registos dos detalhes HotPot';
$string['d_index'] = 'índice de discriminação';
$string['duration'] = 'Duração';
$string['enablecache'] = 'Ativar cache HotPot';
$string['enablecron'] = 'Ativar cron HotPot';
$string['enablemymoodle'] = 'Mostrar HotPots na Minha página principal';
$string['enableobfuscate'] = 'Ativar ofuscação de código do player de mídia';
$string['enableswf'] = 'Permitir a incorporação de ficheiros SWF em atividades Hotpot';
$string['entry_attempts'] = 'Tentativas';
$string['entrycm'] = 'Atividade anterior';
$string['entrycmcourse'] = 'Atividade anterior nesta disciplina';
$string['entrycm_help'] = 'Esta configuração define uma atividade que o aluno tem de realizar e a sua nota mínima para que possa realizar a sua tentativa ao teste.

O professor pode selecionar uma atividade específica ou selecionar uma opção das seguintes:

* Atividade anterior nesta disciplina
* Atividade anterior neste tópico
* Teste HotPot anterior nesta disciplina
* Teste HotPot seguinte neste tópico';
$string['entrycmsection'] = 'Atividade anterior neste tópico da disciplina';
$string['entrycompletionwarning'] = 'Antes de iniciar esta atividade, deve entrar em {$a}.';
$string['entry_dates'] = 'Datas';
$string['entrygrade'] = 'Atividade anterior avaliada';
$string['entrygradewarning'] = 'Não pode iniciar esta atividade sem ter atingido a nota de {$a->entrygrade}% em {$a->entryactivity}. Atualmente, a sua nota para esta atividade é de {$a->usergrade}%';
$string['entry_grading'] = 'Avaliação';
$string['entryhotpotcourse'] = 'Teste HotPot anterior nesta disciplina';
$string['entryhotpotsection'] = 'Teste HotPot anterior neste tópico da disciplina';
$string['entryoptions'] = 'Opções da página de entrada';
$string['entryoptions_help'] = 'As caixas de verificação ativam ou desativam as opções da página de entrada dos testes HotPot.

**Nome da unidade como título**
: se ativo, o nome da unidade será exibido como o título da página de entrada.

**Avaliação**
: se ativo, a informação sobre as notas do teste serão exibidas na página de entrada.

**Datas**
: se ativo, as datas de abertura e fecho do teste serão exibidas na página de entrada.

**Tentativas**
: se ativo, será exibida na página de entrada uma tabela com a listagem das tentativas anteriores do aluno ao teste HotPot. As tentativas que podem ser resumidas possuem um botão de resumo na coluna da direita.';
$string['entrypage'] = 'Mostrar página de entrada';
$string['entrypagehdr'] = 'Página de entrada';
$string['entrypage_help'] = 'Deve ser apresentado aos alunos uma página inicial antes destes iniciarem uma atividade HotPot?

**Sim**
: os alunos visualizam a página de entrada antes de iniciarem o teste. Os conteúdos são determinados pelas opções da página de entrada.

**Não**
: os alunos não visualizam a página de entrada, e iniciam a atividade HotPot de imediato.

Uma página de entrada é sempre apresentada ao professor, de forma a exibir os relatórios e possibilidade de editar as páginas do teste';
$string['entrytext'] = 'Texto da página de entrada';
$string['entry_title'] = 'Nome da unidade como título';
$string['exit_areyouok'] = 'Olá, ainda está ai?';
$string['exit_attemptscore'] = 'A sua nota para a tentativa foi de  {$a}';
$string['exitcm'] = 'Próxima atividade';
$string['exitcmcourse'] = 'Atividade seguinte nesta disciplina';
$string['exitcm_help'] = 'Esta configuração define a atividade a realizar após o teste estar completo.

O professor pode selecionar uma atividade específica ou selecionar uma opção das seguintes:

* Atividade seguinte nesta disciplina
* Atividade seguinte neste tópico
* Próximo Teste HotPot nesta disciplina
* Próximo Teste HotPot neste tópico

Se existirem outras opções de saída desativadas, o aluno vai direto para a próxima atividade. Caso contrário, será exibida uma ligação para a atividade seguinte, quando estiverem prontos.';
$string['exitcmsection'] = 'Atividade seguinte neste tópico';
$string['exit_course'] = 'Disciplina';
$string['exit_course_text'] = 'Voltar à página principal da disciplina';
$string['exit_encouragement'] = 'Encorajamento';
$string['exit_excellent'] = 'Excelente!';
$string['exit_feedback'] = 'Feedback na página de saída';
$string['exit_feedback_help'] = 'Estas opções ativam ou desativam a exibição de feedback após terminar o teste HotPot.

**Nome da unidade como título**
: se ativo, o nome da unidade será exibido como o título da página de saída.

**Encorajamento**
: se ativo, são exibidas algumas mensagens para encorajar os alunos na página de saída. As mensagens dependem da nota obtida:
: **&gt; 90%**: Excelente!
: **&gt; 60%**: Muito bom
: **&gt; 0%**: Boa tentativa
: **= 0%**: Voçê está bem?

**Exibir nota da tentativa**
: se ativo, a nota da tentativa completa será exibida na página de saída.

**Unit grade**
: if checked the HotPot grade will be displayed on the exit page.

In addition, if the unit grading method is highest a message to tell the user if the most recent attempt was equal to or better than their previous will be displayed.';
$string['exit_goodtry'] = '';
$string['exit_grades'] = 'Notas';
$string['exit_grades_text'] = 'Veja as suas notas até ao momento na disciplina';
$string['exithotpotcourse'] = 'Próximo Teste HotPot nesta disciplina';
$string['exit_hotpotgrade'] = 'A sua nota para esta atividade é de {$a}';
$string['exit_hotpotgrade_average'] = 'A sua nota média para esta atividade até ao momento é de {$a}';
$string['exit_hotpotgrade_highest'] = 'A sua nota mais alta nesta atividade até ao momento é de {$a}';
$string['exit_hotpotgrade_highest_equal'] = 'Igualou a sua melhor nota nesta atividade!';
$string['exit_hotpotgrade_highest_previous'] = 'A sua nota anterior mais alta nesta atividade foi {$a}';
$string['exit_hotpotgrade_highest_zero'] = 'Ainda não obteve uma nota superior a  {$a} nesta atividade';
$string['exithotpotsection'] = 'Próximo Teste HotPot neste tópico';
$string['exit_index'] = 'Índice';
$string['exit_index_text'] = 'Ir para o índice de atividades';
$string['exit_links'] = 'Sair da página de ligações';
$string['exit_links_help'] = 'Estas opções ativam ou desativam a exibição de ligações na página de saída do teste HotPot.

**Tentar novamente**
: Se forem permitidas múltiplas tentativas neste HotPot e o aluno ainda possuir algumas, é exibida uma ligação para que tente de novo

**Índice**
: se ativo, é exibida a ligação para o índice da atividade.

**Disciplina**
: se ativo, é exibida a ligação para a disciplina.

**Relatório de avaliação**
: se ativo, é exibida a ligação para a pauta da disciplina.';
$string['exit_next'] = 'Próximo';
$string['exit_next_text'] = 'Tentar a próxima atividade';
$string['exit_noscore'] = 'Completou com sucesso esta atividade!';
$string['exitoptions'] = 'Opções de saída';
$string['exitpage'] = 'Mostrar página de saída';
$string['exitpagehdr'] = 'Página de saída';
$string['exitpage_help'] = 'Mostrar uma página de saída após o teste HotPot estar concluído?

**Sim**
: é exibida uma página de saída aos alunos quando o teste HotPot está concluído. O conteúdo da página de saída é determinado pelas configurações da página de saída.

**Não**
: não é exibida uma página de saída aos alunos. Em vez disso, seguem imediatamente para a próxima atividade ou retornam à página da disciplina.';
$string['exit_retry'] = 'Tentar novamente';
$string['exit_retry_text'] = 'Tentar de novo esta atividade';
$string['exittext'] = 'Texto da página de saída';
$string['exit_welldone'] = 'Boa!';
$string['exit_whatnext_0'] = 'O que gostaria de fazer a seguir?';
$string['exit_whatnext_1'] = 'Escolha…';
$string['exit_whatnext_default'] = 'Escolha um dos seguintes:';
$string['feedbackdiscuss'] = 'Discutir o teste num fórum';
$string['feedbackformmail'] = 'Formulário para comentário(s)';
$string['feedbackmoodleforum'] = 'Fórum Moodle';
$string['feedbackmoodlemessaging'] = 'Mensagens Moodle';
$string['feedbacknone'] = 'Sem comentários';
$string['feedbacksendmessage'] = 'Enviar mensagem ao professor';
$string['feedbackwebpage'] = 'Página web';
$string['firstattempt'] = 'Primeira tentativa';
$string['forceplugins'] = 'Forçar módulos de conteúdo multimédia';
$string['forceplugins_help'] = 'Se ativar esta opção, os media-players compatíveis com o Moodle reproduzem ficheiros AVI, MPEG, MPG, mp3 mov e wmv. Caso contrário, o Moodle não irá alterar as configurações dos media players no teste.';
$string['frameheight'] = 'Altura da janela';
$string['giveup'] = 'Desistir';
$string['grademethod'] = 'Método de avaliação';
$string['grademethod_help'] = 'Esta configuração define como é calculada a nota final do teste.

**Nota mais alta**
: a nota final é a nota mais alta obtida em todas as tentativas.

**Média**
: a nota final é a nota média de todas as tentativas.

**Primeira tentativa**
: a nota final será a da primeira tentativa ao teste.

**Última tentativa**
: a nota final será a da tentativa mais recente ao teste.';
$string['gradeweighting'] = 'Ponderação da nota';
$string['gradeweighting_help'] = 'As notas deste teste serão recalculadas para uma escala numérica no relatório de avaliação.';
$string['highestscore'] = 'Nota mais alta';
$string['hints'] = 'Ajudas';
$string['hotpot:attempt'] = 'Tentar realizar um teste';
$string['hotpot:deleteallattempts'] = 'Apagar tentativas dos utilizadores';
$string['hotpot:deletemyattempts'] = 'Apagar a sua tentativa';
$string['hotpot:ignoretimelimits'] = 'Ignorar os limites de tempo da atividade';
$string['hotpot:manage'] = 'Alterar as configurações da atividade HotPot';
$string['hotpotname'] = 'Nome da atividade';
$string['hotpot:preview'] = 'Pré-visualizar atividade HotPot';
$string['hotpot:reviewallattempts'] = 'Ver tentativas dos utilizadores';
$string['hotpot:reviewmyattempts'] = 'Ver as suas tentativas';
$string['hotpot:view'] = 'Usar teste';
$string['ignored'] = 'Ignorado(a)';
$string['inprogress'] = 'Em execução';
$string['isgreaterthan'] = 'é maior do que';
$string['islessthan'] = 'é menor do que';
$string['lastaccess'] = 'Último acesso';
$string['lastattempt'] = 'Última tentativa';
$string['lockframe'] = 'Bloquear janela';
$string['maxeventlength'] = 'Número máximo de dias do evento no calendário';
$string['mediafilter_hotpot'] = 'Filtro HotPot conteúdo multimédia';
$string['mediafilter_moodle'] = 'Filtros standard conteúdo multimédia';
$string['migratingfiles'] = 'A migrar ficheiros do teste Hot Potatoes';
$string['missingsourcetype'] = 'Está em falta o ficheiro de origem HotPot';
$string['modulename'] = 'Teste Hot Potatoes';
$string['modulenameplural'] = 'Testes Hot Potatoes';
$string['nameadd'] = 'Nome';
$string['nameadd_help'] = 'O nome poderá ser um texto específico inserido pelo professor ou criado automaticamente.

**A partir do ficheiro de origem**
: o nome é extraído do ficheiro origem.

**Usar nome do ficheiro de origem**
: o nome do ficheiro é usado como nome da atividade.

**Usar caminho do ficheiro de origem**
: o caminho do ficheiro de origem será usado como o nome. Todos os traços do nome serão substituídos por espaços.

**Texto específico**
: o texto específico inserido pelo professor será usado como o nome.';
$string['nameedit'] = 'Nome';
$string['nameedit_help'] = 'O texto específico que é exibido aos alunos';
$string['navigation'] = 'Navegação';
$string['navigation_embed'] = 'Página incorporada';
$string['navigation_frame'] = 'Frame de navegação Moodle';
$string['navigation_give_up'] = 'Apenas um botão de "Desistir"';
$string['navigation_help'] = 'Esta configuração determina a forma de navegação do teste:

* Barra de navegação do Moodle - A barra de navegação do Moode é exibida na mesma janela que o teste, no topo da página
* Frame de navegação Moodle - A barra de navegação do Moodle é exibida num frame separado no topo da atividade
* IFRAME embebida - A barra de navegação do Moodle é exibida na mesma janela do teste, sendo o mesmo incorporado num IFRAME
* Botões de teste Hot Potatoes - O teste será exibido com os botões de navegação, se houverem alguns definidos no teste
* Apenas um botão de "Desistir" - O teste será exibido com um único botão "Desistir" presente na parte superior da página
* Sem navegação - O teste será exibido sem os botões de navegação e quando todas as questões foram respondidas corretamente, dependendo da opção definida em "Mostrar próximo teste?" o aluno retorna à página da disciplina ou segue para o próximo teste';
$string['navigation_moodle'] = 'Navegação standard Moodle (superior e lateral)';
$string['navigation_none'] = 'Sem navegação';
$string['navigation_original'] = 'Original navigation aids';
$string['navigation_topbar'] = 'Barra de navegação apenas no topo (sem barras laterais)';
$string['noactivity'] = 'Sem atividade';
$string['nohotpots'] = 'Não foram encontrados HotPots';
$string['nomoreattempts'] = 'Não possui mais tentativas de resolução do teste';
$string['noresponses'] = 'Não foi encontrada informação sobre perguntas e respostas individuais';
$string['noreview'] = 'Não possui permissões para ver os detalhes da tentativa.';
$string['noreviewafterclose'] = 'O teste encontra-se fechado. Já não pode visualizar os detalhes da tentativa do teste.';
$string['noreviewbeforeclose'] = 'Não possui permissões para ver os detalhes da tentativa até {$a}.';
$string['nosourcefilesettings'] = 'Falta informação do ficheiro de origem HotPot';
$string['notavailable'] = 'A atividade já não se encontra disponível.';
$string['outputformat'] = 'Formato de saída';
$string['outputformat_best'] = 'Mais adequado';
$string['outputformat_help'] = 'O formato de saída especifica como o conteúdo será exibido ao aluno.

Os tipos de formatos disponíveis dependem do tipo de ficheiro de origem. Alguns ficheiros possuem apenas um tipo de formato de saída, enquanto outros possuem vários.

A configuração "Mais adequado" irá exibir o tipo de formato mais adequado ao navegador do aluno.';
$string['outputformat_hp_6_jcloze_html'] = 'JCloze HP6 html: Standard';
$string['outputformat_hp_6_jcloze_xml_anctscan'] = 'JCloze from HP6 xml: ANCT-Scan';
$string['outputformat_hp_6_jcloze_xml_dropdown'] = 'JCloze from HP6 xml: Rottmeier DropDown';
$string['outputformat_hp_6_jcloze_xml_findit_a'] = 'JCloze from HP6 xml: Rottmeier FindIt (a)';
$string['outputformat_hp_6_jcloze_xml_findit_b'] = 'JCloze from HP6 xml: Rottmeier FindIt (b)';
$string['outputformat_hp_6_jcloze_xml_jgloss'] = 'JCloze from HP6 xml: Rottmeier JGloss';
$string['outputformat_hp_6_jcloze_xml_v6'] = 'JCloze from HP6 xml: Standard';
$string['outputformat_hp_6_jcross_html'] = 'JCross HP6 html';
$string['outputformat_hp_6_jcross_xml_v6'] = 'JCross from HP6 xml';
$string['outputformat_hp_6_jmatch_html'] = 'JMatch from html';
$string['outputformat_hp_6_jmatch_xml_flashcard'] = 'JMatch from HP6 xml: Flashcard';
$string['outputformat_hp_6_jmatch_xml_jmemori'] = 'JMatch from HP6 xml: Rottmeier JMemori';
$string['outputformat_hp_6_jmatch_xml_v6'] = 'JMatch from HP6 xml: Standard';
$string['outputformat_hp_6_jmatch_xml_v6_plus'] = 'JMatch from HP6 xml: Drag and Drop';
$string['outputformat_hp_6_jmix_html'] = 'JMix from HP6 html';
$string['outputformat_hp_6_jmix_xml_v6'] = 'JMix from HP6 xml: Standard';
$string['outputformat_hp_6_jmix_xml_v6_plus'] = 'JMix from HP6 xml: Drag and Drop';
$string['outputformat_hp_6_jmix_xml_v6_plus_keypress'] = 'JMix from HP6 xml: Drag and Drop with key press';
$string['outputformat_hp_6_jquiz_html'] = 'JQuiz HP6 html';
$string['outputformat_hp_6_jquiz_xml_v6'] = 'JQuiz from HP6 xml: Standard';
$string['outputformat_hp_6_jquiz_xml_v6_autoadvance'] = 'JQuiz from HP6 xml: Auto-advance';
$string['outputformat_hp_6_jquiz_xml_v6_exam'] = 'JQuiz from HP6 xml: Exam';
$string['outputformat_hp_6_rhubarb_html'] = 'WebRhubarb (v6) from html';
$string['outputformat_hp_6_rhubarb_xml'] = 'WebRhubarb (v6) from xml';
$string['outputformat_hp_6_sequitur_html'] = 'WebSequitur (v6) from html';
$string['outputformat_hp_6_sequitur_html_incremental'] = 'WebSequitur (v6) from html, incremental scoring';
$string['outputformat_hp_6_sequitur_xml'] = 'WebSequitur (v6) from xml';
$string['outputformat_hp_6_sequitur_xml_incremental'] = 'WebSequitur (v6) from xml, incremental scoring';
$string['overviewreport'] = 'Vista global';
$string['penalties'] = 'Penalizações';
$string['percent'] = 'Percentagem';
$string['pluginadministration'] = 'Administração HotPot';
$string['pluginname'] = 'Teste Hot Potatoes';
$string['pressoktocontinue'] = 'Prima OK para continuar, ou Cancelar para ficar na página atual.';
$string['questionshort'] = 'Q-{$a}';
$string['quizname_help'] = 'texto de ajuda para o nome do teste';
$string['quizzes'] = 'Testes';
$string['removegradeitem'] = 'Apagar nota';
$string['removegradeitem_help'] = 'O item da nota desta atividade deve ser apagado?

**Não**
: o item para a nota desta atividade no relatório de avaliação não deve ser apagado

**Sim**
: se a nota máxima ou a ponderação da nota para este teste estiver definida como zero, o item de avaliação para esta atividade será apagado do relatório de avaliação';
$string['responsesreport'] = 'Respostas';
$string['score'] = 'Avaliação';
$string['scoresreport'] = 'Avaliações';
$string['selectattempts'] = 'Selecionar tentativas';
$string['showerrormessage'] = 'Erro HotPot: {$a}';
$string['sourcefile'] = 'Nome do ficheiro de origem';
$string['sourcefile_help'] = 'Esta configuração define se o ficheiro que contém o conteúdo é exibido aos alunos.

Por norma, o ficheiro de origem foi criado fora do Moodle, e em seguida carregado para a plataforma
Pode ser um ficheiro HTML, ou outro tipo de ficheiro criado com softwares de autor, como o HoTPotatoes ou Qedoc.

O ficheiro de origem pode ser especificado como uma pasta ou um URL com o início http:// ou https://

Para conteúdos Qedoc, o ficheiro de origem deve ser o url de um teste Qedoc que foi carregado para o servidor Qedoc.

* Por exemplo, http://www.qedoc.net/library/ABCDE_123.zip
* Para informações sobre como carregar módulos Qedoc ver: [Qedoc documentation: Uploading_modules](http://www.qedoc.org/en/index.php?title=Uploading_modules)';
$string['sourcefilenotfound'] = 'O ficheiro de origem não foi encontrado (ou está vazio): {$a}';
$string['status'] = 'Estado';
$string['stopbutton'] = 'Mostrar botão de Parar';
$string['stopbutton_help'] = 'Se ativo, o botão de parar é exibido no teste.

Se o aluno clicar neste botão, os resultados até ao momento são enviados para o Moodle e o estado da tentativa passar para abandonada.

O texto que será exibido no botão de parar pode ser uma das frases pré-definidas a partir dos pacotes linguísticos do Moodle, ou especificada pelo professor.';
$string['stopbutton_langpack'] = 'A partir do pacote linguístico';
$string['stopbutton_specific'] = 'Texto específico';
$string['stoptext'] = 'Texto de botão de parar';
$string['storedetails'] = 'Guardar os detalhes de XML das tentativas do teste Hotpot';
$string['studentfeedback'] = 'Comentário(s) do(s) aluno(s)';
$string['studentfeedback_help'] = 'Se ativar esta opção, será exibido um link para uma janela pop-up de feedback sempre que o aluno clica no botão "Verificar". A janela de feedback permite aos alunos enviar comentários para o professor através de 4 formas:

* Página web (é necessário inserir o URL da página, como por exemplo http://myserver.com/feedbackform.html)
* Formulário para comentário(s) (é necessário inserir o URL do script, como por exemplo  http://myserver.com/cgi-bin/formmail.pl)
* Fórum Moodle - É exibido o fórum da disciplina
* Mensagens Moodle - É exibida a janela de mensagens instantâneas. Se a disciplina tiver vários professores, o aluno tem de selecionar um professor antes de aparecer a janela de mensagem .';
$string['submits'] = 'Submissões';
$string['textsourcefile'] = 'A partir do ficheiro de origem';
$string['textsourcefilename'] = 'Utilizar nome de ficheiro';
$string['textsourcefilepath'] = 'Utilizar caminho para o ficheiro';
$string['textsourcequiz'] = 'Obter a partir do teste';
$string['textsourcespecific'] = 'Texto específico';
$string['timeclose'] = 'Disponível até';
$string['timedout'] = 'Expirou o tempo';
$string['timelimit'] = 'Tempo limite';
$string['timelimitexpired'] = 'O tempo limite para esta tentativa terminou';
$string['timelimit_help'] = 'Esta configuração especifica a duração máxima de uma única tentativa.

** Usar as configurações do ficheiro/modelo de origem **
: o tempo limite será extraído do ficheiro de origem ou dos ficheiros modelos para este formato de saída

**Usar tempo definido**
: O limite de tempo especificado na página de configurações HotPot será utilizado como o limite de tempo para uma tentativa de responder ao teste. Essa configuração substitui os definidos no ficheiro de origem, de configuração ou ficheiros modelo para esse formato de saída.

**Desativar**
: Não é configurado limite de tempo para as tentativas neste teste.

Note que se uma tentativa for retomada, o tempo continua a contar de onde a tentativa foi parada anteriormente.';
$string['timelimitspecific'] = 'Usar tempo definido';
$string['timelimitsummary'] = 'Tempo limite para uma tentativa';
$string['timelimittemplate'] = 'Usar as configurações do ficheiro/modelo de origem';
$string['timeopen'] = 'Disponível a partir de';
$string['timeopenclose'] = 'Datas de abertura e fecho';
$string['timeopenclose_help'] = 'Pode especificar o intervalo de datas nas quais o teste está aberto para a realização de tentativas. Antes da data de abertura, e após a data de fecho, o teste estará indisponível.';
$string['title'] = 'Título';
$string['title_help'] = 'Esta configuração especifica o título a ser exibido na página web.

** Nome da atividade HotPot **
: O nome desta atividade HotPot será exibido como o título da página web.

**Obter do ficheiro de origem**
: O título, se houver, definido no ficheiro de fonte será usado como o título da página web.

**Usar nome do ficheiro de origem**
: O nome do arquivo fonte, excluindo os nomes de pastas, será usado como o título da página web.

**Usar caminho do ficheiro de origem**
: O caminho do arquivo de origem, incluindo os nomes de pastas, será usado como o título da página web.';
$string['unitname_help'] = 'texto de ajuda para o nome';
$string['updated'] = 'Atualizado';
$string['usefilters'] = 'Usar filtros';
$string['usefilters_help'] = 'Se ativo, o conteúdo irá passar através dos filtros do Moodle antes de ser enviado para o navegador.';
$string['useglossary'] = 'Usar glossário';
$string['useglossary_help'] = '"Se ativo, o conteúdo passa através do filtro do  Glossário Auto ligação antes de ser enviado para o navegador.

Note que esta definição substitui a configuração de administração  para ativar ou desativar o filtro do Glossário.';
$string['usemediafilter'] = 'Usar filtro conteúdo multimédia';
$string['usemediafilter_help'] = 'Esta configuração define quando é usado o filtro conteúdo multimédia.

**Nunca**
: o conteúdo não passa pelo filtro conteúdo multimédia.

**Filtros conteúdo multimédia standard do Moodle**
: o conteúdo irá passar pelos filtros conteúdo multimédia. Estes filtros procuram por links para sons e ficheiros de vídeo de filme, e convertem-nos para players adequados.

**Filtro conteúdo multimédia HotPot**
:o conteúdo será transmitido através de filtros que detectam links, imagens, sons e filmes a serem especificados usando uma notação de colchetes.

A notação de colchetes tem a seguinte sintaxe:
<code>[url player width height options]</code>

**url**
: o url absoluto ou relativo do ficheiro multimédia

**player** (opcional)
: nome do player. O valor predefinido é "moodle". A versão standard do HotPot inclui os seguintes players:
: **dew**: an mp3 player
: **dyer**: mp3 player by Bernard Dyer
: **hbs**: mp3 player from Half-Baked Software
: **image**: insert an image into the web page
: **link**: insert a link to another web page

**largura** (opcional)
: largura do player

**altura** (optional)
: altura do player. Se ficar em branco terá o mesmo valor definido para a largura.

**opções** (opcional)
: lista de opções para o player separadas por ponto e virgula. Cada opção pode ter um link para on/off ou um par de valores.
: **nome=valor
: **nome="valor com espaços"';
$string['utilitiesindex'] = 'HotPot Utilities index';
$string['viewreports'] = 'Ver relatórios de {$a} utilizador(s)';
$string['views'] = 'Vistas';
$string['weighting'] = 'Ponderar';
$string['wrong'] = 'Errado';
$string['zeroduration'] = 'Sem duração';
$string['zeroscore'] = 'Nota de 0';
