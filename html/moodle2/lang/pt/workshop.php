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
 * Strings for component 'workshop', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   workshop
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aggregategrades'] = 'Recalcular notas';
$string['aggregation'] = 'Método de avaliação';
$string['allocate'] = 'Atribuir trabalhos para avaliação';
$string['allocatedetails'] = 'esperados: {$a->expected}<br />submetidos: {$a->submitted}<br />para atribuir: {$a->allocate}';
$string['allocation'] = 'Atribuição de trabalhos';
$string['allocationconfigured'] = 'Atribuição de trabalhos configurada';
$string['allocationdone'] = 'Atribuição de trabalhos realizada com sucesso';
$string['allocationerror'] = 'Erro na atribuição de trabalhos';
$string['allsubmissions'] = 'Todos os trabalhos submetidos';
$string['alreadygraded'] = 'Já avaliado';
$string['areaconclusion'] = 'Texto de conclusão';
$string['areainstructauthors'] = 'Instruções para o envio dos trabalhos';
$string['areainstructreviewers'] = 'Instruções para avaliação';
$string['areaoverallfeedbackattachment'] = 'Anexos de feedback global';
$string['areaoverallfeedbackcontent'] = 'Textos de feedback global';
$string['areasubmissionattachment'] = 'Anexos do trabalho';
$string['areasubmissioncontent'] = 'Textos do trabalho';
$string['assess'] = 'Avaliar';
$string['assessedexample'] = 'Exemplo de trabalho avaliado';
$string['assessedsubmission'] = 'Trabalho avaliado';
$string['assessingexample'] = 'A avaliar exemplo de trabalho';
$string['assessingsubmission'] = 'A avaliar trabalho';
$string['assessment'] = 'Avaliação';
$string['assessmentby'] = 'por <a href="{$a->url}">{$a->name}</a>';
$string['assessmentbyfullname'] = 'Avaliado por {$a}';
$string['assessmentbyyourself'] = 'Avaliação do próprio';
$string['assessmentdeleted'] = 'Atribuição de avaliação cancelada';
$string['assessmentend'] = 'Data limite das avaliações';
$string['assessmentendbeforestart'] = 'O prazo para a avaliação não pode ser especificado antes da data de abertura para avaliação';
$string['assessmentenddatetime'] = 'Data limite da avaliação: {$a->daydatetime} ({$a->distanceday})';
$string['assessmentendevent'] = '{$a} (Prazo de avaliação)';
$string['assessmentform'] = 'Grelha de avaliação';
$string['assessmentofsubmission'] = '<a href="{$a->assessmenturl}">Avaliação</a> de <a href="{$a->submissionurl}">{$a->submissiontitle}</a>';
$string['assessmentreference'] = 'Avaliação de referência';
$string['assessmentreferenceconflict'] = 'Não é possível avaliar um trabalho exemplo para o qual deu um trabalho de referência.';
$string['assessmentreferenceneeded'] = 'Tem que avaliar este exemplo de trabalho para fornecer uma avaliação de referência. Clique em Continuar para avaliar o trabalho.';
$string['assessmentsettings'] = 'Configuração da avaliação';
$string['assessmentstart'] = 'Iniciar avaliações em';
$string['assessmentstartdatetime'] = 'Avaliações iniciam em  {$a->daydatetime} ({$a->distanceday})';
$string['assessmentstartevent'] = '{$a} (abre para avaliação)';
$string['assessmentweight'] = 'Peso da avaliação';
$string['assignedassessments'] = 'Trabalhos que lhe foram atribuídos para avaliação';
$string['assignedassessmentsnone'] = 'Não tem trabalhos atribuídos para avaliar';
$string['backtoeditform'] = 'Voltar ao formulário de edição';
$string['byfullname'] = 'por <a href="{$a->url}">{$a->name}</a>';
$string['calculategradinggrades'] = 'Calcular notas das avaliações';
$string['calculategradinggradesdetails'] = 'esperados: {$a->expected}<br />calculados: {$a->calculated}';
$string['calculatesubmissiongrades'] = 'Calcular notas dos trabalhos';
$string['calculatesubmissiongradesdetails'] = 'esperados: {$a->expected}<br />calculados: {$a->calculated}';
$string['chooseuser'] = 'Escolher utilizador…';
$string['clearaggregatedgrades'] = 'Apagar todas as notas calculadas';
$string['clearaggregatedgradesconfirm'] = 'Tem certeza que quer apagar notas calculadas para os trabalhos e avaliações?';
$string['clearaggregatedgrades_help'] = 'As notas calculadas para os trabalhos e avaliações serão apagadas. Pode recalcular estas notas novamente na fase de avaliação.';
$string['clearassessments'] = 'Limpar avaliações';
$string['clearassessmentsconfirm'] = 'Tem a certeza que pretende apagar todas notas das avaliações? Não consegurá reverter esta ação por si próprio pois os avaliadores terão de reavaliar os trabalhos alocados.';
$string['clearassessments_help'] = 'As notas calculadas para os trabalhos e avaliações serão apagadas. As informações introduzidas nas grelhas de avaliação serão guardadas, mas todos os avaliadores devem abrir a grelha de avaliação e submeter a mesma novamente para que as notas sejam calculadas de novo.';
$string['conclusion'] = 'Conclusão';
$string['conclusion_help'] = 'Conclusão é um texto apresentado aos participantes no final da atividade.';
$string['configexamplesmode'] = 'Modelo predefinido de avaliação';
$string['configgrade'] = 'Nota máxima para o trabalho, por predefinição';
$string['configgradedecimals'] = 'Número de casas decimais a exibir nas avaliações, por predefinição';
$string['configgradinggrade'] = 'Nota máxima para a avaliação, por predefinição';
$string['configmaxbytes'] = 'Tamanho máximo dos ficheiros submetidos em todos os workshops do site, por predefinição (sujeito aos limites da disciplina e outras configurações locais)';
$string['configstrategy'] = 'Tipo de grelha de avaliação, por predefinição';
$string['createsubmission'] = 'Comece a preparar a sua submissão';
$string['daysago'] = 'há {$a} dias';
$string['daysleft'] = 'restam {$a} dias';
$string['daystoday'] = 'hoje';
$string['daystomorrow'] = 'amanhã';
$string['daysyesterday'] = 'ontem';
$string['deadlinesignored'] = 'As restrições de prazo não se aplicam a si';
$string['editassessmentform'] = 'Editar grelha de avaliação';
$string['editassessmentformstrategy'] = 'Editar grelha de avaliação ({$a})';
$string['editingassessmentform'] = 'A editar grelha de avaliação';
$string['editingsubmission'] = 'A editar trabalho';
$string['editsubmission'] = 'Editar trabalho';
$string['err_multiplesubmissions'] = 'Enquanto editava esta grelha, outra versão do trabalho foi guardada. Não são permitidas submissões múltiplas por utilizador.';
$string['err_removegrademappings'] = 'Não foi possível apagar alocações de avaliação não utilizadas';
$string['evaluategradeswait'] = 'Por favor aguarde até que as avaliações sejam avaliadas e as notas calculadas.';
$string['evaluation'] = 'Avaliação dos avaliadores';
$string['evaluationmethod'] = 'Método de avaliação dos avaliadores';
$string['evaluationmethod_help'] = 'O método de avaliação determina como a nota de avaliação é calculada. Pode recalcular as notas várias vezes, usando diferentes configurações, até estar satisfeito com o resultado.';
$string['evaluationsettings'] = 'Definições da classificação de avaliação';
$string['event_assessable_uploaded'] = 'Foi feito o upload de uma submissão.';
$string['example'] = 'Trabalho exemplo';
$string['exampleadd'] = 'Adicionar trabalho exemplo';
$string['exampleassess'] = 'Avaliar trabalho exemplo';
$string['exampleassessments'] = 'Trabalhos exemplo para avaliar';
$string['exampleassesstask'] = 'Avaliar trabalhos exemplo';
$string['exampleassesstaskdetails'] = 'esperado: {$a->expected}<br />avaliado: {$a->assessed}';
$string['examplecomparing'] = 'A comparar avaliações de trabalho exemplo';
$string['exampledelete'] = 'Apagar exemplo';
$string['exampledeleteconfirm'] = 'Tem certeza de que deseja apagar o trabalho exemplo ? Clique no botão Continuar para apagar o trabalho.';
$string['exampleedit'] = 'Editar exemplo';
$string['exampleediting'] = 'A editar exemplo';
$string['exampleneedassessed'] = 'Tem que avaliar todos os trabalhos exemplo primeiro';
$string['exampleneedsubmission'] = 'Tem que enviar o seu trabalho e avaliar todos os trabalhos exemplo primeiro';
$string['examplesbeforeassessment'] = 'Ficam disponíveis após o aluno submeter o trabalho e devem ser avaliados antes da avaliação dos pares.';
$string['examplesbeforesubmission'] = 'Devem ser avaliados antes de o aluno enviar o seu trabalho';
$string['examplesmode'] = 'Avaliação dos trabalhos exemplo';
$string['examplesubmissions'] = 'Trabalhos exemplo';
$string['examplesvoluntary'] = 'Avaliação dos trabalhos exemplo é opcional';
$string['feedbackauthor'] = 'Comentário para o autor do trabalho';
$string['feedbackauthorattachment'] = 'Anexo';
$string['feedbackby'] = 'Feedback por {$a}';
$string['feedbackreviewer'] = 'Comentário para o avaliador';
$string['feedbacksettings'] = 'Feedback';
$string['formataggregatedgrade'] = '{$a->grade}';
$string['formataggregatedgradeover'] = '<del>{$a->grade}</del><br /><ins>{$a->over}</ins>';
$string['formatpeergrade'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span>';
$string['formatpeergradeover'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span>';
$string['formatpeergradeoverweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span> @ <span class="weight">{$a->weight}</span>';
$string['formatpeergradeweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span> @ <span class="weight">{$a->weight}</span>';
$string['givengrades'] = 'Notas atribuídas';
$string['gradecalculated'] = 'Nota do trabalho';
$string['gradedecimals'] = 'Casas decimais nas notas';
$string['gradegivento'] = '&gt;';
$string['gradeinfo'] = 'Nota: {$a->received} em {$a->max}';
$string['gradeitemassessment'] = '{$a->workshopname} (avaliação)';
$string['gradeitemsubmission'] = '{$a->workshopname} (trabalho)';
$string['gradeover'] = 'Substituir nota do trabalho';
$string['gradereceivedfrom'] = '&lt;';
$string['gradesreport'] = 'Relatório de notas do workshop';
$string['gradinggrade'] = 'Nota máxima da avaliação';
$string['gradinggradecalculated'] = 'Nota da avaliação';
$string['gradinggrade_help'] = 'Esta configuração específica a nota máxima que se pode obter na avaliação dos trabalhos dos pares.';
$string['gradinggradeof'] = 'Nota da avaliação (em {$a})';
$string['gradinggradeover'] = 'Substituir nota da avaliação';
$string['gradingsettings'] = 'Configurações de avaliação';
$string['groupnoallowed'] = 'Não tem permissões para aceder a nenhum grupo neste workshop';
$string['iamsure'] = 'Sim, tenho a certeza';
$string['info'] = 'Informação';
$string['instructauthors'] = 'Instruções para envio do trabalho';
$string['instructreviewers'] = 'Instruções para a avaliação';
$string['introduction'] = 'Descrição';
$string['latesubmissions'] = 'Submissões após data limite';
$string['latesubmissionsallowed'] = 'O envio de trabalhos após data limite é permitido';
$string['latesubmissions_desc'] = 'Permitir a submissão de trabalhos após a data limite especificada';
$string['latesubmissions_help'] = 'Se ativar esta opção, o aluno pode enviar os seus trabalhos após a data limite ou durante a fase de avaliação. Trabalhos submetidos tardiamente, não podem ser editados.';
$string['maxbytes'] = 'Tamanho máximo do anexo da submissão';
$string['modulename'] = 'Workshop';
$string['modulename_help'] = 'A atividade Workshop permite inserir, analisar e avaliar o trabalho dos alunos pelos seus colegas.

Os alunos podem submeter qualquer conteúdo como documentos excel e word ou escrever o texto diretamente no editor do Moodle.

Os trabalhos são avaliados através de uma grelha de avaliação com vários critérios definidos pelo professor.  O professor pode disponibilizar trabalhos exemplo e uma avaliação de referência para que os alunos possam praticar o processo de avaliação e compreender a grelha de avaliação. Os alunos têm a oportunidade de avaliar um ou mais trabalhos dos seus colegas. Os autores dos trabalhos atribuidos para avaliação e os respetivos avaliadores pode ser mantidos anónimos.

Os alunos obtêm duas notas no workshop - uma pelo seu trabalho e outra pela avaliação que fez ao colega. Ambas as notas são registadas no relatório de avaliação da disciplina.';
$string['modulename_link'] = 'mod/workshop/view';
$string['modulenameplural'] = 'Workshops';
$string['mysubmission'] = 'O meu trabalho';
$string['nattachments'] = 'Número máximo de anexos ao trabalho';
$string['noexamples'] = 'Ainda não existem trabalhos exemplo neste workshop';
$string['noexamplesformready'] = 'Deve configurar a grelha de avaliação antes de inserir trabalhos exemplo';
$string['nogradeyet'] = 'Ainda não tem nota';
$string['nosubmissionfound'] = 'Não foi encontrado nenhum trabalho submetidos por este utilizador';
$string['nosubmissions'] = 'Ainda não foram submetidos trabalhos neste workshop';
$string['notassessed'] = 'Ainda não foi avaliado';
$string['nothingtoreview'] = 'Nada para avaliar';
$string['notoverridden'] = 'Não substituir';
$string['noworkshops'] = 'Não existem workshops nesta disciplina';
$string['noyoursubmission'] = 'Ainda não submeteu o seu trabalho';
$string['nullgrade'] = '-';
$string['overallfeedback'] = 'Feedback global';
$string['overallfeedbackfiles'] = 'Número máximo de anexos de feedback global';
$string['overallfeedbackmaxbytes'] = 'Tamanho máximo dos anexos de feedback global';
$string['overallfeedbackmode'] = 'Modo de feedback global';
$string['overallfeedbackmode_0'] = 'Inativo';
$string['overallfeedbackmode_1'] = 'Ativo e opcional';
$string['overallfeedbackmode_2'] = 'Ativo e obrigatório';
$string['overallfeedbackmode_help'] = 'Se ativar esta opção, um campo de texto é exibido no rodapé do formulário de avaliação para os avaliadores colocarem a avaliação global da submissão ou para adicionarem algum esclarecimento relacionado com a mesma.';
$string['page-mod-workshop-x'] = 'Qualquer página do Workshop';
$string['participant'] = 'Participante';
$string['participantrevierof'] = 'Participante é avaliador de';
$string['participantreviewedby'] = 'Participante é avaliado por';
$string['phaseassessment'] = 'Fase de avaliação';
$string['phaseclosed'] = 'Fechado';
$string['phaseevaluation'] = 'Fase de cálculo da avaliação';
$string['phasesetup'] = 'Fase de configuração';
$string['phasesoverlap'] = 'A fase de apresentação e a fase de avaliação não podem se sobrepor';
$string['phasesubmission'] = 'Fase de envio dos trabalhos';
$string['pluginadministration'] = 'Administração do workshop';
$string['pluginname'] = 'Workshop';
$string['prepareexamples'] = 'Preparar trabalhos exemplo';
$string['previewassessmentform'] = 'Pré-visualizar';
$string['publishedsubmissions'] = 'Trabalhos publicados';
$string['publishsubmission'] = 'Publicar trabalho';
$string['publishsubmission_help'] = 'Os trabalhos publicados ficam disponíveis para todos após o fecho do workshop';
$string['reassess'] = 'Reavaliar';
$string['receivedgrades'] = 'Notas obtidas';
$string['recentassessments'] = 'Avaliações submetidas:';
$string['recentsubmissions'] = 'Trabalhos submetidos:';
$string['saveandclose'] = 'Gravar e fechar';
$string['saveandcontinue'] = 'Gravar e continuar edição';
$string['saveandpreview'] = 'Gravar e pré-visualizar';
$string['saveandshownext'] = 'Guardar e mostrar próximo';
$string['selfassessmentdisabled'] = 'Autoavaliação desativada';
$string['showingperpage'] = 'A mostrar {$a} items por página';
$string['showingperpagechange'] = 'Alterar ...';
$string['someuserswosubmission'] = 'Há pelo menos um aluno que ainda não submeteu o seu trabalho';
$string['sortasc'] = 'Ordem ascendente';
$string['sortdesc'] = 'Ordem descendente';
$string['strategy'] = 'Tipo de grelha de avaliação';
$string['strategyhaschanged'] = 'Desde que iniciou a edição, o tipo de grelha de avaliação foi alterado.';
$string['strategy_help'] = 'O tipo de grelha de avaliação determina a configuração do formulário usado pelo professor e aluno para avaliar os trabalhos. Existem quatro opções:

* Nota quantitativa - O avaliador atribui uma nota quantitativa a cada critério de avaliação definido, sendo possível juntar um comentário com justificação.
* Escolha múltipla - O avaliador seleciona a opção que melhor traduz a sua avaliação para cada critério de avaliação definido.
* Escolha dupla - O avaliador seleciona uma entre duas opções (Sim/Não, em geral) relativas à avaliação de um determinado aspeto, sendo possível juntar um comentário com justificação.
* Comentários - O avaliador comenta qualitativamente cada aspeto a avaliar previsto, sem que tal se traduza numa nota.';
$string['submission'] = 'Trabalho';
$string['submissionattachment'] = 'Anexo';
$string['submissionby'] = 'Submetido por {$a}';
$string['submissioncontent'] = 'Conteúdo submetido';
$string['submissionend'] = 'Data limite das submissões';
$string['submissionendbeforestart'] = 'O prazo limite de submissão não pode ser configurado para antes da data de abertura';
$string['submissionenddatetime'] = 'Data limite para envio do trabalho: {$a->daydatetime} ({$a->distanceday})';
$string['submissionendevent'] = '{$a} (prazo para as submissões)';
$string['submissionendswitch'] = 'Avançar para fase seguinte após data limite das submissões';
$string['submissionendswitch_help'] = 'Se tiver definido uma data limite de submissão e ativar esta opção, o workshop avançará automaticamente para a fase de avaliação após a data limite das submissões.

Se ativar esta opção, é recomendável que também ative e configure o método de atribuição automática. Se os trabalhos não estiverem atribuidos na data limite de submissão, o workshop passará à fase seguinte mas não poderá ser realizada qualquer avaliação pelos alunos pois não têm trabalhos atribuidos.';
$string['submissiongrade'] = 'Nota máxima do trabalho';
$string['submissiongrade_help'] = 'Esta configuração específica a nota máxima que pode ser atribuída ao trabalho submetido';
$string['submissiongradeof'] = 'Nota do trabalho (em {$a})';
$string['submissionsettings'] = 'Configurações de envio';
$string['submissionstart'] = 'Iniciar submissões em';
$string['submissionstartdatetime'] = 'Submissões permitidas a partir de  {$a->daydatetime} ({$a->distanceday})';
$string['submissionstartevent'] = '{$a} (abre para submissões)';
$string['submissiontitle'] = 'Titulo';
$string['subplugintype_workshopallocation'] = 'Método para atribuir trabalho para avaliação';
$string['subplugintype_workshopallocation_plural'] = 'Métodos para atribuir trabalho para avaliação';
$string['subplugintype_workshopeval'] = 'Método para atribuir nota a avaliações';
$string['subplugintype_workshopeval_plural'] = 'Métodos para atribuir nota a avaliações';
$string['subplugintype_workshopform'] = 'Estratégia de avaliação';
$string['subplugintype_workshopform_plural'] = 'Estratégias de avaliação';
$string['switchingphase'] = 'A alterar fase';
$string['switchphase'] = 'Alterar fase';
$string['switchphase10info'] = 'Está prestes a alterar o workshop para a fase de <strong>Configuração</strong>. Nesta fase, os utilizadores não podem editar os seus trabalhos nem as suas avaliações a outros trabalhos. Os professores poderão utilizar esta fase para alterar as configurações do workshop e alterar o tipo de grelha de avaliação dos trabalhos.';
$string['switchphase20info'] = 'Está prestes a alterar o workshop para a fase de <strong>Envio dos trabalhos</strong>. Os alunos podem submeter os seus trabalhos durante esta fase. Os professores podem atribuir os trabalhos para avaliação pelos pares.';
$string['switchphase30auto'] = 'O Workshop passará automaticamente para a fase de avaliação após {$a->daydatetime} ({$a->distanceday})';
$string['switchphase30info'] = 'Está prestes a alterar o workshop para a fase de <strong>Avaliação</strong>. Nesta fase, os avaliadores podem fazer a sua apreciação dos trabalhos cuja avaliação que lhes foi atribuída (dentro das datas permitidas, se definidas).';
$string['switchphase40info'] = 'Está prestes a alterar o workshop para a fase de <strong> Cálculo da Avaliação</strong>. Nesta fase, os alunos não podem editar os seus trabalhos nem as suas avaliações dos outros trabalhos. Os professores podem usar as ferramentas de avaliação para calcular as notas finais e inserir comentários ao trabalho dos avaliadores.';
$string['switchphase50info'] = 'Está prestes a encerrar o workshop. As notas calculadas serão exibidas no relatório de avaliação. Os alunos podem ver os seus trabalhos e respectivas avaliações.';
$string['taskassesspeers'] = 'Avaliar trabalhos dos colegas';
$string['taskassesspeersdetails'] = 'total: {$a->total}<br />pendente: {$a->todo}';
$string['taskassessself'] = 'Autoavaliação';
$string['taskconclusion'] = 'Permitir que a atividade seja assinalada como concluída';
$string['taskinstructauthors'] = 'Inserir instruções para os trabalhos';
$string['taskinstructreviewers'] = 'Inserir instruções para a avaliação';
$string['taskintro'] = 'Definir a descrição do workshop';
$string['tasksubmit'] = 'Submeter trabalho';
$string['toolbox'] = 'Caixa de ferramentas do Workshop';
$string['undersetup'] = 'O workshop está neste momento a ser configurado. Aguarde até que passe para a fase seguinte';
$string['useexamples'] = 'Requer avaliação de exemplos';
$string['useexamples_desc'] = 'Os alunos podem consultar trabalhos exemplo e praticar a avaliação';
$string['useexamples_help'] = 'Se ativar esta opção, os alunos podem tentar avaliar um ou mais trabalhos exemplo e comparar a sua avaliação com uma avaliação de referência. A nota não é tida em conta na avaliação final.';
$string['usepeerassessment'] = 'Requer avaliação entre pares';
$string['usepeerassessment_desc'] = 'Os alunos podem avaliar o trabalho de outros alunos';
$string['usepeerassessment_help'] = 'Se ativar esta opção, são atribuídos a um utilizador trabalhos de outros utilizadores para avaliar. O avaliador receberá uma nota pela sua avaliação para além da nota do seu próprio trabalho.';
$string['userdatecreated'] = 'Enviado em <span>{$a}</span>';
$string['userdatemodified'] = 'Modificado em <span>{$a}</span>';
$string['userplan'] = 'Planificação do workshop';
$string['userplan_help'] = 'A planificação do workshop mostra todas as fases da atividade e a lista de tarefas para cada fase. A fase atual é assinalada e a conclusão de cada tarefa é indicada com um visto.';
$string['useselfassessment'] = 'Permitir autoavaliação';
$string['useselfassessment_desc'] = 'Os alunos podem avaliar o seu próprio trabalho';
$string['useselfassessment_help'] = 'Se ativar esta opção, pode ser atribuída a um aluno a avaliação do seu próprio trabalho e receberá uma nota pela sua avaliação para além da nota do seu trabalho.';
$string['weightinfo'] = 'Peso: {$a}';
$string['withoutsubmission'] = 'Avaliador sem trabalho submetido';
$string['workshop:addinstance'] = 'Adicionar novo Workshop';
$string['workshop:allocate'] = 'Atribuir trabalhos para avaliação';
$string['workshop:editdimensions'] = 'Editar grelhas de avaliação';
$string['workshop:ignoredeadlines'] = 'Ignorar restrições de prazo';
$string['workshop:manageexamples'] = 'Gerir trabalhos exemplo';
$string['workshopname'] = 'Nome do workshop';
$string['workshop:overridegrades'] = 'Substituir nota calculada';
$string['workshop:peerassess'] = 'Avaliação entre pares';
$string['workshop:publishsubmissions'] = 'Publicar trabalhos';
$string['workshop:submit'] = 'Submeter';
$string['workshop:switchphase'] = 'Alterar fase';
$string['workshop:view'] = 'Ver workshop';
$string['workshop:viewallassessments'] = 'Ver todas as avaliações';
$string['workshop:viewallsubmissions'] = 'Ver todos os trabalhos';
$string['workshop:viewauthornames'] = 'Ver nomes dos autores';
$string['workshop:viewauthorpublished'] = 'Ver autores dos trabalhos submetidos';
$string['workshopviewed'] = 'Workshop visualizado';
$string['workshop:viewpublishedsubmissions'] = 'Ver trabalhos publicados';
$string['workshop:viewreviewernames'] = 'Ver nomes dos avaliadores';
$string['yourassessment'] = 'A sua avaliação';
$string['yourgrades'] = 'As suas notas';
$string['yoursubmission'] = 'O seu trabalho';
