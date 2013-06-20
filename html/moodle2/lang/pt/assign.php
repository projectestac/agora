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
 * Strings for component 'assign', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Existem trabalhos que requerem a sua atenção';
$string['addsubmission'] = 'Enviar trabalho';
$string['allowsubmissions'] = 'Permitir ao utilizador enviar este trabalho.';
$string['allowsubmissionsanddescriptionfromdatesummary'] = 'O enunciado do trabalho apenas estará disponível a partir de <strong>{$a}</strong>';
$string['allowsubmissionsfromdate'] = 'Aceitar trabalhos a partir de';
$string['allowsubmissionsfromdate_help'] = 'Se ativar esta opção, os alunos não podem submeter os seus trabalhos antes desta data. Se não, podem começar a submeter os trabalhos a partir de agora.';
$string['allowsubmissionsfromdatesummary'] = 'Pode submeter o trabalho a partir de <strong>{$a}</strong>';
$string['allowsubmissionsshort'] = 'Permitir atualizar o trabalho (desbloquear)';
$string['alwaysshowdescription'] = 'Mostrar sempre a descrição';
$string['alwaysshowdescription_help'] = 'Se selecionar não, os alunos só podem ver a descrição do trabalho após a data "Aceitar trabalhos a partir de".';
$string['applytoteam'] = 'Atribuir notas e comentários a todo o grupo';
$string['assign:addinstance'] = 'Adicionar novo trabalho';
$string['assign:exportownsubmission'] = 'Exportar o próprio trabalho';
$string['assignfeedback'] = 'Módulo de feedback';
$string['assignfeedbackpluginname'] = 'Módulo de feedback';
$string['assign:grade'] = 'Avaliar trabalho';
$string['assign:grantextension'] = 'Prolongar o prazo';
$string['assignmentisdue'] = 'Terminou o prazo para submeter o trabalho';
$string['assignmentmail'] = '{$a->grader}  submeteu feedback ao trabalho
que submeteu em \'{$a->assignment}\'

Pode ver o feedback em:

    {$a->url}';
$string['assignmentmailhtml'] = '{$a->grader} submeteu feedback ao  trabalho
que submeteu em \'<i>{$a->assignment}</i>\'<br /><br />.
Pode ver o feedback no <a href="{$a->url}">trabalho submetido</a>.';
$string['assignmentmailsmall'] = '{$a->grader} submeteu feedback
ao trabalho que submeteu em \'{$a->assignment}\' Pode consultar o feedback na área do trabalho.';
$string['assignmentname'] = 'Nome do trabalho';
$string['assignmentplugins'] = 'Trabalho';
$string['assignmentsperpage'] = 'Nº de trabalhos por página';
$string['assign:revealidentities'] = 'Revelar a identidade dos alunos';
$string['assignsubmission'] = 'Módulo de submissão';
$string['assignsubmissionpluginname'] = 'Módulo de submissão';
$string['assign:submit'] = 'Submeter trabalho';
$string['assign:view'] = 'Ver trabalho';
$string['availability'] = 'Disponibilidade';
$string['backtoassignment'] = 'Voltar ao trabalho';
$string['batchoperationconfirmgrantextension'] = 'Prolongar o prazo para todas as submissões selecionadas?';
$string['batchoperationconfirmlock'] = 'Bloquear todos os trabalhos selecionados?';
$string['batchoperationconfirmreverttodraft'] = 'Reverter os trabalhos selecionados para trabalho em curso?';
$string['batchoperationconfirmunlock'] = 'Desbloquear  todos os trabalhos selecionados?';
$string['batchoperationlock'] = 'bloquear trabalhos';
$string['batchoperationreverttodraft'] = 'reverter trabalhos para trabalho em curso';
$string['batchoperationsdescription'] = 'Executar a ação no(s) trabalho(s) selecionado(s)';
$string['batchoperationunlock'] = 'desbloquear trabalhos';
$string['blindmarking'] = 'Avaliação anónima';
$string['blindmarking_help'] = 'A avaliação anónima oculta a identidade dos alunos. A opção avaliação anónima ficará bloqueada assim que for realizada uma submissão ou atribuição de nota neste trabalho.';
$string['changegradewarning'] = 'Esta atividade já tem trabalhos avaliados e mudar a nota não alterará as notas já submetidas. Deve avaliar novamente todos os trabalhos já submetidos se pretende alterar as suas notas.';
$string['choosegradingaction'] = 'Ação de avaliação';
$string['chooseoperation'] = 'Selecione a operação';
$string['comment'] = 'Comentário';
$string['completionsubmit'] = 'O aluno tem de submeter o trabalho para completar esta atividade';
$string['configshowrecentsubmissions'] = 'Todos podem ver as notificações de trabalhos submetidos nos relatórios de atividade recente.';
$string['confirmbatchgradingoperation'] = 'Tem a certeza que deseja {$a->operation} para {$a->count} alunos?';
$string['confirmsubmission'] = 'Tem a certeza que quer submeter o seu trabalho a avaliação? Não poderá realizar mais alterações.';
$string['conversionexception'] = 'Não foi possível converter o trabalho. A exceção foi: {$a}.';
$string['couldnotconvertgrade'] = 'Não foi possível converter a nota do trabalho do aluno {$a}.';
$string['couldnotconvertsubmission'] = 'Não foi possível converter o trabalho submetido pelo aluno {$a}.';
$string['couldnotcreatecoursemodule'] = 'Não foi possível criar o módulo da disciplina.';
$string['couldnotcreatenewassignmentinstance'] = 'Não foi possível criar uma nova instância do trabalho.';
$string['couldnotfindassignmenttoupgrade'] = 'Não foi possível encontrar antigas instância do trabalho para atualizar.';
$string['currentgrade'] = 'Nota atual na pauta';
$string['cutoffdate'] = 'Data de fecho';
$string['cutoffdatefromdatevalidation'] = 'A data de fecho deve ser posterior à data definida para iniciar a aceitação de trabalhos.';
$string['cutoffdate_help'] = 'Se ativar esta opção, o trabalho não aceitará submissões após esta data, exceto se definir um prolongamento do prazo.';
$string['cutoffdatevalidation'] = 'A data de fecho deve ser posterior à data limite.';
$string['defaultplugins'] = 'Configurações predefinidas do trabalho';
$string['defaultplugins_help'] = 'Estas configurações definem as opções predefinidas para os trabalhos que criar futuramente.';
$string['defaultteam'] = 'Grupo predefinido';
$string['deleteallsubmissions'] = 'Apagar todas as submissões';
$string['deletepluginareyousure'] = 'Apagar o módulo trabalho {$a}: tem a certeza?';
$string['deletepluginareyousuremessage'] = 'Está prestes a apagar completamente o módulo do trabalho {$a}. Isto irá apagar todos os dados da base de dados relativos a este módulo. Tem a certeza que deseja continuar?';
$string['deletingplugin'] = 'A apagar o módulo {$a}.';
$string['description'] = 'Descrição';
$string['downloadall'] = 'Descarregar todos os trabalhos';
$string['duedate'] = 'Data limite para submeter trabalhos';
$string['duedate_help'] = 'Data limite definida para a entrega de trabalhos. Continua a ser possível submeter trabalhos após esta data, apesar de lhes ser atribuído o estado "submetido com atraso". Para impedir submissões após uma determinada data defina uma data de fecho.';
$string['duedateno'] = 'Sem data limite';
$string['duedatereached'] = 'A data limite de submissão deste trabalho já foi ultrapassada.';
$string['duedatevalidation'] = 'A data limite deve ser após a data de ínico do trabalho.';
$string['editaction'] = 'Ações…';
$string['editingstatus'] = 'Editar o estado';
$string['editsubmission'] = 'Atualizar o trabalho';
$string['enabled'] = 'Ativo';
$string['errornosubmissions'] = 'Não há trabalhos submetidos para descarregar';
$string['errorquickgradingvsadvancedgrading'] = 'As notas não foram guardadas porque este trabalho está a usar um método de avaliação avançado.';
$string['errorrecordmodified'] = 'As notas não foram guardadas porque alguém alterou um ou mais registos desde o momento em que acedeu à página.';
$string['extensionduedate'] = 'Prolongamento da data limite';
$string['extensionnotafterduedate'] = 'A data de prolongamento deve ser posterior à data limite';
$string['extensionnotafterfromdate'] = 'A data de prolongamento deve ser posterior à data definida para iniciar a aceitação de trabalhos';
$string['feedback'] = 'Feedback';
$string['feedbackavailablehtml'] = '{$a->username} submeteu feedback ao trabalho que submeteu em \'<i>{$a->assignment}</i>\'<br /><br />
Pode consultar o feedback na área do <a href="{$a->url}">trabalho</a>.';
$string['feedbackavailablesmall'] = '{$a->username} submeteu feedback ao trabalho {$a->assignment}';
$string['feedbackavailabletext'] = '{$a->username} submeteu feedback ao trabalho que submeteu em \'{$a->assignment}\'

Pode consultar o feedback em:
    {$a->url}';
$string['feedbackplugin'] = 'Módulo de feedback';
$string['feedbackpluginforgradebook'] = 'Módulo de feedback que irá inserir os comentários na pauta';
$string['feedbackpluginforgradebook_help'] = 'Apenas um módulo de feedback do trabalho pode enviar feedback para a pauta.';
$string['feedbackplugins'] = 'Módulos de feedback';
$string['feedbacksettings'] = 'Configurações do feedback do avaliador';
$string['filesubmissions'] = 'Submissões de ficheiros';
$string['filter'] = 'Filtro';
$string['filternone'] = 'Sem filtro';
$string['filterrequiregrading'] = 'Trabalhos por avaliar';
$string['filtersubmitted'] = 'Trabalhos submetidos';
$string['gradeabovemaximum'] = 'A nota deve ser menor ou igual a {$a}.';
$string['gradebelowzero'] = 'A nota deve ser maior ou igual a 0.';
$string['graded'] = 'Avaliado';
$string['gradedby'] = 'Avaliado por';
$string['gradedon'] = 'Avaliado em';
$string['gradeoutof'] = 'Nota (de 0 a {$a})';
$string['gradeoutofhelp'] = 'Avaliação';
$string['gradeoutofhelp_help'] = 'Insira a nota do trabalho do aluno aqui. Pode incluir casas decimais.';
$string['gradersubmissionupdatedhtml'] = '{$a->username} atualizou o trabalho em <i>\'{$a->assignment}\'  na seguinte data/hora: {$a->timeupdated}</i><br /><br />
Está <a href="{$a->url}">disponível no Moodle</a>.';
$string['gradersubmissionupdatedsmall'] = '{$a->username} atualizou o seu trabalho em {$a->assignment}.';
$string['gradersubmissionupdatedtext'] = '{$a->username} atualizou o seu trabalho em  \'{$a->assignment}\' na seguinte data/hora: {$a->timeupdated}
Está disponível aqui:

    {$a->url}';
$string['gradestudent'] = 'Avaliação do aluno: (id={$a->id}, nome completo={$a->fullname}).';
$string['gradeuser'] = 'Avaliar {$a}';
$string['grading'] = 'A avaliar';
$string['gradingmethodpreview'] = 'Critérios de avaliação';
$string['gradingoptions'] = 'Configurar tabela de trabalhos e avaliação';
$string['gradingstatus'] = 'Estado da avaliação';
$string['gradingstudentprogress'] = 'A avaliar aluno {$a->index} de {$a->count}';
$string['gradingsummary'] = 'Estado da atividade';
$string['grantextension'] = 'Prolongar prazo';
$string['grantextensionforusers'] = 'Prolongar prazo a {$a} alunos';
$string['hiddenuser'] = 'Participante';
$string['hideshow'] = 'Mostrar/Esconder';
$string['instructionfiles'] = 'Ficheiros de instruções';
$string['invalidfloatforgrade'] = 'A avaliação submetida não é perceptivel: {$a}';
$string['invalidgradeforscale'] = 'A avaliação atríbuida não é válida para a escala em uso';
$string['lastmodifiedgrade'] = 'Última atualização (avaliação)';
$string['lastmodifiedsubmission'] = 'Última atualização (submissão)';
$string['latesubmissions'] = 'Submissões com atraso';
$string['latesubmissionsaccepted'] = 'Apenas os alunos a quem foi concedido um prolongamento do prazo podem ainda submeter o trabalho';
$string['locksubmissionforstudent'] = 'Impedir novas submissões para o aluno: (id={$a->id}, nome completo={$a->fullname}).';
$string['locksubmissions'] = 'Bloquear trabalhos';
$string['manageassignfeedbackplugins'] = 'Gerir módulos de feedback do trabalho';
$string['manageassignsubmissionplugins'] = 'Gerir módulos de submissão do trabalho';
$string['maxgrade'] = 'Nota Máxima';
$string['messageprovider:assign_notification'] = 'Notificações dos trabalhos';
$string['modulename'] = 'Trabalho';
$string['modulename_help'] = 'A atividade Trabalho permite ao professor definir tarefas ou disponibilizar o enunciado de um trabalho, recolher submissões dos alunos e rever, avaliar e dar feedback.

Os alunos podem submeter ficheiros, tais como documentos word, folhas de cálculo, imagens, sons e vídeos. Em alternativa, ou como complemento, o trabalho pode incluir a submissão de um texto usando o editor de texto da plataforma. Esta atividade pode também servir para lembrar os alunos de atividades presenciais, como exames ou trabalhos, não sendo neste caso necessário submeter nenhum ficheiro ou texto. Os alunos podem submeter o trabalho individualmente ou em grupo.

Ao avaliar os trabalhos, os professores podem inserir comentários de feedback e submeter ficheiros, nomeadamente o ficheiro de trabalho do aluno com comentários ou um ficheiro de áudio com o feedbback. Os trabalhos podem ser avaliados utilizando uma escala numérica, uma escala personalizada ou um critério avançado de avaliação, como as grelhas qualitativas. As notas dos alunos são registadas na pauta da disciplina.';
$string['modulename_link'] = 'mod/assignment/view';
$string['modulenameplural'] = 'Trabalhos';
$string['mysubmission'] = 'Meu trabalho:';
$string['newsubmissions'] = 'Trabalhos submetidos';
$string['nofiles'] = 'Não foi submetido nenhum ficheiro';
$string['nograde'] = 'Sem avaliação';
$string['nolatesubmissions'] = 'Não se aceitam submissões atrasadas.';
$string['nomoresubmissionsaccepted'] = 'Não se aceitam mais submissões.';
$string['noonlinesubmissions'] = 'Este trabalho não requer que submeta nada online.';
$string['nosavebutnext'] = 'Próximo';
$string['nosubmission'] = 'Ainda não foi submetido nada neste trabalho';
$string['nosubmissionsacceptedafter'] = 'Não se aceitam submissões depois de';
$string['notgraded'] = 'Sem avaliação';
$string['notgradedyet'] = 'Ainda não foi avaliado';
$string['notifications'] = 'Notificações';
$string['notsubmittedyet'] = 'Ainda não foi submetido';
$string['nousersselected'] = 'Sem alunos selecionados';
$string['numberofdraftsubmissions'] = 'Número de trabalhos em curso';
$string['numberofparticipants'] = 'Número de alunos';
$string['numberofsubmissionsneedgrading'] = 'Requerem avaliação';
$string['numberofsubmittedassignments'] = 'Número de trabalhos submetidos';
$string['numberofteams'] = 'Grupos';
$string['offline'] = 'Não é necessário submeter nada online';
$string['open'] = 'Abrir';
$string['outlinegrade'] = 'Avaliação: {$a}';
$string['overdue'] = '<font color="red">Trabalho atrasado em: {$a}</font>';
$string['page-mod-assign-view'] = 'Página principal e de submissão do trabalho';
$string['page-mod-assign-x'] = 'Qualquer página do trabalho';
$string['participant'] = 'Participante';
$string['pluginadministration'] = 'Administração do trabalho';
$string['pluginname'] = 'Trabalho';
$string['preventsubmissions'] = 'Impedir novas submissões do aluno a este trabalho (bloquear)';
$string['preventsubmissionsshort'] = 'Impedir novas submissões (bloquear)';
$string['previous'] = 'Anterior';
$string['quickgrading'] = 'Avaliação rápida';
$string['quickgradingchangessaved'] = 'As atualizações das notas foram guardadas';
$string['quickgrading_help'] = 'A avaliação rápida permite que atribua as notas diretamente na tabela de trabalhos e avaliação. Não funciona nos métodos de avaliação avançados nem é recomendada quando existem mais que um professor a avaliar.';
$string['quickgradingresult'] = 'Avaliação rápida';
$string['recordid'] = 'Número de identificação';
$string['requireallteammemberssubmit'] = 'Todos os membros do grupo têm de submeter o trabalho';
$string['requireallteammemberssubmit_help'] = 'Se ativar esta opção, todos os membros do grupo de alunos devem clicar no botão Submeter para que o trabalho do grupo seja considerado submetido. Se não ativar esta opção, o trabalho do grupo será considerado submetido assim que um dos membros clicar no botão Submeter.';
$string['requiresubmissionstatement'] = 'Os alunos têm de aceitar a declaração de submissão';
$string['requiresubmissionstatementassignment'] = 'Os alunos têm de aceitar a declaração de submissão';
$string['requiresubmissionstatementassignment_help'] = 'Os alunos têm de aceitar a declaração de submissão para todas as submissões deste trabalho';
$string['requiresubmissionstatement_help'] = 'Se ativar esta opção, os alunos têm de aceitar a declaração de submissão para todas as submissões de trabalho nesta instalação do Moodle. Se não ativar esta opção, a declaração de submissão pode ser ativada ou desativada nas configurações de cada trabalho.';
$string['revealidentities'] = 'Revelar as identidades dos alunos';
$string['revealidentitiesconfirm'] = 'Tem a certeza que pretende revelar as identidades dos alunos para este trabalho? Esta operação é irreversível. Uma vez reveladas as identidades dos alunos, as notas serão disponibilizadas na pauta.';
$string['reverttodraft'] = 'Reverter para trabalho em curso';
$string['reverttodraftforstudent'] = 'Reverter para trabalho em curso o trabalho do aluno: (id={$a->id}, fullname={$a->fullname}).';
$string['reverttodraftshort'] = 'Reverter para trabalho em curso';
$string['reviewed'] = 'Revisto';
$string['saveallquickgradingchanges'] = 'Gravar todas as alterações da avaliação rápida';
$string['savechanges'] = 'Guardar alterações';
$string['savenext'] = 'Guardar e mostrar próximo';
$string['scale'] = 'Escala';
$string['selectlink'] = 'Selecionar…';
$string['selectuser'] = 'Selecione {$a}';
$string['sendlatenotifications'] = 'Notificar submissões atrasadas aos avaliadores';
$string['sendlatenotifications_help'] = 'Se ativar esta opção, os avaliadores (habitualmente os professores) receberão uma mensagem quando um aluno submete um trabalho atrasado. Os métodos das mensagens são configuráveis.';
$string['sendnotifications'] = 'Notificar submissões aos avaliadores';
$string['sendnotifications_help'] = 'Se ativo,os avaliadores (normalmente os professores) receberão uma mensagem sempre que um aluno submete um trabalho, antes, durante ou fora do prazo do trabalho. Os métodos das mensagens são configuráveis.';
$string['sendsubmissionreceipts'] = 'Notificar submissão do trabalho ao aluno';
$string['sendsubmissionreceipts_help'] = 'Se ativo os alunos receberão notificações de submissão do trabalho. Receberão uma notificação sempre que submeterem um trabalho.';
$string['settings'] = 'Configurações do trabalho';
$string['showrecentsubmissions'] = 'Mostrar submissões recentes';
$string['submission'] = 'Trabalho';
$string['submissiondrafts'] = 'Ativar botão “Submeter o trabalho”';
$string['submissiondrafts_help'] = 'Se ativar esta opção, os alunos necessitam de clicar no botão Submeter para declarar o seu envio como o trabalho final. Isto permite que os alunos possam manter o trabalho em curso no sistema até o finalizarem. Se esta opção for modificada de "Não" para "Sim" após alguns alunos já terem submetido o seu trabalho, este será considerado final.';
$string['submissioneditable'] = 'Os alunos podem editar esta submissão';
$string['submissionempty'] = 'Nenhum trabalho submetido';
$string['submissionnoteditable'] = 'O aluno não pode editar esta submissão';
$string['submissionnotready'] = 'Este trabalho não está pronto para ser submetido:';
$string['submissionplugins'] = 'Módulos de submissão';
$string['submissionreceipthtml'] = 'Submeteu um trabalho em \'<i>{$a->assignment}</i>\'<br /><br />
Pode ver o estado do seu <a href="{$a->url}">trabalho</a>.';
$string['submissionreceipts'] = 'Enviar notificações de submissão';
$string['submissionreceiptsmall'] = 'Submeteu o seu trabalho em {$a->assignment}';
$string['submissionreceipttext'] = 'Submeteu um trabalho em \'{$a->assignment}\'

Pode ver o estado do seu trabalho em:

    {$a->url}';
$string['submissions'] = 'Trabalhos enviados';
$string['submissionsclosed'] = 'Submissões encerradas';
$string['submissionsettings'] = 'Configurações da submissão do trabalho';
$string['submissionslocked'] = 'Este trabalho não está a aceitar submissões';
$string['submissionslockedshort'] = 'Não é permitido alterar os trabalhos';
$string['submissionsnotgraded'] = '{$a} trabalhos não avaliados';
$string['submissionstatement'] = 'Declaração de submissão';
$string['submissionstatementacceptedlog'] = 'Declaração de submissão aceite pelo utilizador {$a}';
$string['submissionstatementdefault'] = 'Este trabalho é de minha autoria, exceto nos casos em que faço referência a trabalhos de outros autores.';
$string['submissionstatement_help'] = 'Declaração de confirmação da submissão de trabalho';
$string['submissionstatus'] = 'Estado da submissão';
$string['submissionstatus_'] = 'Não submetido';
$string['submissionstatus_draft'] = 'Em curso (não submetido)';
$string['submissionstatusheading'] = 'Estado do trabalho';
$string['submissionstatus_marked'] = 'Avaliado';
$string['submissionstatus_new'] = 'Nova submissão';
$string['submissionstatus_submitted'] = 'Submetido para avaliação';
$string['submissionteam'] = 'Grupo';
$string['submitaction'] = 'Enviar';
$string['submitassignment'] = 'Submeter o trabalho';
$string['submitassignment_help'] = 'Assim que submeter o seu trabalho deixará de poder atualizar o mesmo.';
$string['submitted'] = 'Enviados';
$string['submittedearly'] = 'O trabalho  {$a}  foi submetido antes do prazo';
$string['submittedlate'] = 'O trabalho foi submetido {$a} após o prazo';
$string['submittedlateshort'] = '{$a} atrasado';
$string['teamsubmission'] = 'Os alunos submetem em grupos';
$string['teamsubmissiongroupingid'] = 'Agrupamento para grupos de alunos';
$string['teamsubmissiongroupingid_help'] = 'Este é o agrupamento que o trabalho utilizará para encontrar grupos para os grupos de alunos. Se não configurar esta opção, será utilizada a configuração predefinida de grupos.';
$string['teamsubmission_help'] = 'Se ativar esta opção os alunos serão divididos em grupos de acordo com o conjunto predefinido de grupos ou de um agrupamento específico. Uma submissão de grupo será partilhada entre todos os membros do grupo e todos verão as alterações realizadas à submissão pelos outros membros.';
$string['teamsubmissionstatus'] = 'Estado de submissão do grupo';
$string['textinstructions'] = 'Instruções do trabalho';
$string['timemodified'] = 'Última alteração';
$string['timeremaining'] = 'Tempo restante';
$string['unlocksubmissionforstudent'] = 'Permitir submissões ao aluno: (id={$a->id}, fullname={$a->fullname}).';
$string['unlocksubmissions'] = 'Desbloquear trabalhos';
$string['updategrade'] = 'Atualizar nota';
$string['updatetable'] = 'Guardar e atualizar tabela';
$string['upgradenotimplemented'] = 'Atualização não implementada no módulo ({$a->type} {$a->subtype})';
$string['userextensiondate'] = 'Prazo prolongado até: {$a}';
$string['usergrade'] = 'Nota do Utilizador';
$string['userswhoneedtosubmit'] = 'Utilizadores que têm de submeter: {$a}';
$string['viewfeedback'] = 'Ver feedback';
$string['viewfeedbackforuser'] = 'Ver feedback para o aluno: {$a}';
$string['viewfull'] = 'Ver tudo';
$string['viewfullgradingpage'] = 'Abrir a página de avaliações para submeter feedback';
$string['viewgradebook'] = 'Ver pauta';
$string['viewgrading'] = 'Ver / avaliar trabalhos';
$string['viewgradingformforstudent'] = 'Ver página de avaliação do aluno: (id={$a->id}, fullname={$a->fullname}).';
$string['viewownsubmissionform'] = 'Ver o seu trabalho.';
$string['viewownsubmissionstatus'] = 'Ver o estado do seu trabalho';
$string['viewrevealidentitiesconfirm'] = 'Ver a página de confirmação para revelar as identidades dos alunos.';
$string['viewsubmission'] = 'Ver trabalho';
$string['viewsubmissionforuser'] = 'Ver trabalho do utilizador: {$a}';
$string['viewsubmissiongradingtable'] = 'Ver tabela de trabalhos e avaliação.';
$string['viewsummary'] = 'Ver sumário';
