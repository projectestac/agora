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
 * Strings for component 'assignment', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   assignment
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Existem trabalhos que requerem a sua atenção';
$string['addsubmission'] = 'Submeter trabalho';
$string['allowdeleting'] = 'Permitir apagar';
$string['allowdeleting_help'] = 'Se ativar esta opção, os participantes poderão apagar os ficheiros enviados a qualquer momento, antes de os submeter à avaliação.';
$string['allowmaxfiles'] = 'Número máximo de ficheiros enviados';
$string['allowmaxfiles_help'] = 'É o número máximo de ficheiros que cada utilizador poderá enviar.
Como este número não é apresentado aos alunos sugere-se que o mencione na descrição do trabalho.';
$string['allownotes'] = 'Permitir anotações';
$string['allownotes_help'] = 'Se ativar esta opção, os participantes poderão inserir anotações numa área de texto, à semelhança do trabalho de edição de texto.
Esta área de texto pode ser usada para entrar em contacto com a pessoa que avalia o trabalho, para descrever o progresso do trabalho, ou qualquer outra atividade escrita.';
$string['allowresubmit'] = 'Permitir reenviar';
$string['allowresubmit_help'] = 'Se ativar esta opção, os alunos podem resubmeter os
trabalhos depois de terem sido avaliados (para que o professor os possa reavaliar).';
$string['alreadygraded'] = 'O seu trabalho já foi avaliado, pelo que não o pode enviar novamente.';
$string['assignment:addinstance'] = 'Adicionar um novo trabalho';
$string['assignmentdetails'] = 'Detalhes do trabalho';
$string['assignment:exportownsubmission'] = 'Exportar o próprio trabalho';
$string['assignment:exportsubmission'] = 'Exportar trabalho';
$string['assignment:grade'] = 'Avaliar trabalho';
$string['assignmentmail'] = '{$a->teacher}  comentou o trabalho que submeteu em
\'{$a->assignment}\'

Pode ver o comentário junto do trabalho submetido:

    {$a->url}';
$string['assignmentmailhtml'] = '{$a->teacher} comentou o  trabalho que submeteu em
\'<i>{$a->assignment}</i>\'<br /><br />.
Pode ver o comentário junto do <a href="{$a->url}">trabalho submetido</a>.';
$string['assignmentmailsmall'] = '{$a->teacher} inseriu feedback sobre o seu trabalho \'{$a->assignment}\' Pode visualizá-lo no local de submissão do trabalho';
$string['assignmentname'] = 'Nome do trabalho';
$string['assignmentsubmission'] = 'Trabalhos enviados';
$string['assignment:submit'] = 'Enviar trabalho';
$string['assignmenttype'] = 'Tipo de trabalho';
$string['assignment:view'] = 'Ver trabalho';
$string['availabledate'] = 'Data de início';
$string['cannotdeletefiles'] = 'Ocorreu um erro e não foi possível apagar os ficheiros.';
$string['cannotviewassignment'] = 'Não pode visualizar este trabalho';
$string['changegradewarning'] = 'Esta atividade já tem trabalhos avaliados e mudar a nota não alterará as notas já submetidas. Deve avaliar novamente todos os trabalhos já submetidos se pretende alterar as suas notas.';
$string['closedassignment'] = 'Este trabalho está encerrado, pois o prazo de submissão já terminou.';
$string['comment'] = 'Comentário';
$string['commentinline'] = 'Comentar no próprio texto';
$string['commentinline_help'] = 'Se ativar esta opção, o texto enviado originalmente será copiado para o campo de comentários no momento da avaliação, tornando-se mais fácil comentar o trabalho (talvez usando uma cor diferente) ou editar o texto original.</p>';
$string['configitemstocount'] = 'Natureza dos itens a ter em conta nos trabalhos de edição de texto submetidos pelos alunos.';
$string['configmaxbytes'] = 'Tamanho máximo predefinido de todos os trabalhos enviados (sujeito aos limites da disciplina e outras configurações locais)';
$string['configshowrecentsubmissions'] = 'Todos podem ver as notificações de ficheiros enviados nos relatórios de atividade recente.';
$string['confirmdeletefile'] = 'Tem a certeza que pretende apagar este ficheiro? <br /><strong>{$a}</strong>';
$string['coursemisconf'] = 'A disciplina está mal configurada';
$string['currentgrade'] = 'Nota atual no relatório de avaliação';
$string['deleteallsubmissions'] = 'Apagar todos os ficheiros enviados';
$string['deletefilefailed'] = 'Não foi possível apagar o ficheiro.';
$string['description'] = 'Descrição';
$string['downloadall'] = 'Descarregar todos os trabalhos em ficheiro zip';
$string['draft'] = 'Rascunho';
$string['due'] = 'Data limite de entrega do trabalho';
$string['duedate'] = 'Data limite de entrega';
$string['duedateno'] = 'Sem data limite';
$string['early'] = '{$a} antecipado';
$string['editmysubmission'] = 'Editar o meu envio';
$string['editthesefiles'] = 'Editar ficheiros';
$string['editthisfile'] = 'Atualizar este ficheiro';
$string['emailstudents'] = 'Enviar e-mail de alerta aos alunos';
$string['emailteachermail'] = '{$a->username} atualizou o trabalho enviado para \'{$a->assignment}\'

Está disponível aqui:

{$a->url}';
$string['emailteachermailhtml'] = '{$a->username} atualizou o trabalho enviado para <i>\'{$a->assignment}\'</i><br /><br /> Está <a href="{$a->url}">disponível aqui</a>';
$string['emailteachers'] = 'Enviar e-mail de alerta aos professores';
$string['emailteachers_help'] = 'Se ativar esta opção, os professores serão notificados cada vez que os alunos adicionarem ou modificarem um trabalho.

Apenas os professores que possam avaliar o trabalho em questão serão notificados. Por exemplo, se a disciplina estiver configurada com grupos separados, então os professores pertencentes a um grupo em particular não receberão notificações relativamente a alterações feitas por alunos de outros grupos.';
$string['emptysubmission'] = 'Ainda não submeteu nenhum trabalho';
$string['enablenotification'] = 'Enviar e-mails de aviso';
$string['enablenotification_help'] = 'Se ativado, os alunos serão notificados quando os seus trabalhos são classificados.';
$string['errornosubmissions'] = 'Não há trabalhos submetidos para descarregar';
$string['existingfiledeleted'] = 'O seguinte ficheiro foi apagado: {$a}';
$string['failedupdatefeedback'] = 'Ocorreu um erro na atualização dos comentários do trabalho do utilizador {$a}';
$string['feedback'] = 'Os seus comentários';
$string['feedbackfromteacher'] = 'Comentários de {$a}';
$string['feedbackupdated'] = 'Foram atualizados os comentários aos trabalhos de {$a} pessoas';
$string['finalize'] = 'Não se aceitam mais submissões';
$string['finalizeerror'] = 'Ocorreu um erro e não foi possível completar a sua submissão';
$string['futureaassignment'] = 'Este trabalho ainda não está disponível.';
$string['graded'] = 'Avaliado';
$string['guestnosubmit'] = 'Lamentamos, mas os visitantes não podem enviar um trabalho. Tem que se autenticar ou registar para poder enviar um trabalho';
$string['guestnoupload'] = 'Pedimos desculpas, mas os visitantes não podem enviar ficheiros';
$string['helpoffline'] = '<p>É útil para trabalhos executados fora do Moodle cuja avaliação se pretende registar na disciplina. Pode ser outra atividade na web ou presencial.</p><p>Os alunos podem ver uma descrição do trabalho, mas não podem enviar ficheiros ou outro conteúdo. A avaliação é realizada da mesma forma e os alunos serão notificados da sua avaliação.</p>';
$string['helponline'] = '<p>Este tipo de trabalho requer que os utilizadores escrevam um texto, utilizando o editor de texto do Moodle. Os professores poderão durante a avaliação adicionar comentários no texto ou fazer alterações ao mesmo.</p>';
$string['helpupload'] = '<p>Este tipo de trabalho permite que os alunos enviem um ou vários ficheiros de qualquer tipo. Os ficheiros podem ser documentos , imagens, um site Web num ficheiro zip ou qualquer outro conteúdo que pretende que estes enviem.</p>
<p>Este tipo de trabalho também lhe permite enviar vários ficheiros de resposta à submissão do aluno. É permitido enviar ficheiros de resposta antes do aluno submeter o que pode ser usado para dar a cada participante um ficheiro diferente para trabalhar.</p>
<p>Os participantes podem introduzir notas parar descrever os ficheiros enviados, fazer um ponto de situação, ou prestar qualquer outra informação.</p>
<p>Este tipo de trabalho deverá ser assinalado como concluído pelo participante. Pode rever o estado atual em qualquer momento sendo que os trabalhos não concluídos serão identificados como Rascunho. Pode reverter o estado de qualquer trabalho ainda não avaliado, de concluído para rascunho.</p>';
$string['helpuploadsingle'] = '<p>Este tipo de trabalho permite a cada participante enviar um único ficheiro, de qualquer tipo.</p> <p>O ficheiro pode ser um documento, uma imagem, um site Web num ficheiro zip ou qualquer outro conteúdo que pretende que enviem.</p>';
$string['hideintro'] = 'Ocultar a descrição antes da data de início';
$string['hideintro_help'] = '<!-- $Id$ -->


<p>Se ativo, a descrição do trabalho será escondida antes da data de início do trabalho.</p>';
$string['invalidassignment'] = 'trabalho incorreto';
$string['invalidfileandsubmissionid'] = 'Falta o ficheiro ou o ID';
$string['invalidid'] = 'o ID do trabalho está incorreto';
$string['invalidsubmissionid'] = 'O ID é inválido';
$string['invalidtype'] = 'o tipo de trabalho está incorreto';
$string['invaliduserid'] = 'ID do utilizador inválido';
$string['itemstocount'] = 'Número';
$string['lastgrade'] = 'Última avaliação';
$string['late'] = '{$a} atrasado';
$string['maximumgrade'] = 'Nota máxima';
$string['maximumsize'] = 'Tamanho máximo';
$string['maxpublishstate'] = 'Tempo máximo de visibilidade da entrada do blogue antes da data limite';
$string['messageprovider:assignment_updates'] = 'Notificações de trabalhos (2.2)';
$string['modulename'] = 'Trabalho (2.2)';
$string['modulename_help'] = 'Os trabalhos permitem ao professor especificar uma tarefa online ou offline que pode ser avaliada posteriormente.';
$string['modulenameplural'] = 'Trabalhos (2.2)';
$string['newsubmissions'] = 'Trabalhos enviados';
$string['noassignments'] = 'Ainda não foram enviados trabalhos';
$string['noattempts'] = 'Não foi realizada nenhuma tentativa de resposta a este trabalho';
$string['noblogs'] = 'Não tem nenhuma entrada de blogue para submeter!';
$string['nofiles'] = 'Não foi enviado nenhum ficheiro';
$string['nofilesyet'] = 'Ainda não foram enviados ficheiros';
$string['nomoresubmissions'] = 'Não são permitidos mais envios.';
$string['norequiregrading'] = 'Não existem trabalhos para avaliar';
$string['nosubmisson'] = 'Não foram submetidos trabalhos';
$string['notavailableyet'] = 'Este trabalho ainda não está disponível.<br />As instruções do trabalho serão disponibilizadas na data indicada abaixo.';
$string['notes'] = 'Anotações';
$string['notesempty'] = 'Sem anotações';
$string['notesupdateerror'] = 'Erro na atualização das anotações';
$string['notgradedyet'] = 'Ainda não está avaliado';
$string['notsubmittedyet'] = 'Ainda não foi submetido';
$string['onceassignmentsent'] = 'Uma vez concluído o trabalho o mesmo será submetido a avaliação e não poderá apagar nem juntar mais ficheiros. Quer continuar?';
$string['operation'] = 'Operação';
$string['optionalsettings'] = 'Configurações opcionais';
$string['overwritewarning'] = 'Atenção: enviar de novo um ficheiro substituirá o seu envio anterior.';
$string['page-mod-assignment-submissions'] = 'Página de submissão do Trabalho';
$string['page-mod-assignment-view'] = 'Página principal do Trabalho';
$string['page-mod-assignment-x'] = 'Qualquer página do Trabalho';
$string['pagesize'] = 'Número de submissões por página';
$string['pluginadministration'] = 'Administração do trabalho';
$string['pluginname'] = 'Trabalho (2.2)';
$string['popupinnewwindow'] = 'Abrir numa janela pop-up';
$string['preventlate'] = 'Impedir envios fora do prazo';
$string['quickgrade'] = 'Permitir avaliação rápida';
$string['quickgrade_help'] = 'Se ativar esta opção, poderá avaliar vários trabalhos na mesma página. Modifique notas e comentários e use o botão "Submeter todas as alterações" no fim da página para guardar todas as suas modificações de uma só vez.';
$string['requiregrading'] = 'Requerem avaliação';
$string['responsefiles'] = 'Ficheiros de resposta';
$string['reviewed'] = 'Revisto';
$string['saveallfeedback'] = 'Submeter todas as alterações';
$string['selectblog'] = 'Selecione a entrada de blogue que deseja submeter';
$string['sendformarking'] = 'Concluir trabalho';
$string['showrecentsubmissions'] = 'Mostrar ficheiros enviados recentemente';
$string['submission'] = 'Trabalho';
$string['submissiondraft'] = 'Rascunho do trabalho';
$string['submissionfeedback'] = 'Comentários ao trabalho';
$string['submissions'] = 'Trabalhos enviados';
$string['submissionsaved'] = 'As suas alterações foram gravadas';
$string['submissionsnotgraded'] = '{$a} trabalhos não avaliados';
$string['submitassignment'] = 'Envie o seu trabalho usando este formulário';
$string['submitedformarking'] = 'O trabalho já foi concluído e não pode ser atualizado.';
$string['submitformarking'] = 'Submeter à avaliação final';
$string['submitted'] = 'Enviados';
$string['submittedfiles'] = 'Ficheiros enviados';
$string['subplugintype_assignment'] = 'Tipo de trabalho';
$string['subplugintype_assignment_plural'] = 'Tipos de trabalho';
$string['trackdrafts'] = 'Ativar botão "Concluir trabalho"';
$string['trackdrafts_help'] = 'O botão "Concluir trabalho" permite aos alunos indicar ao professor que terminaram o trabalho. O professor pode optar por reverter o trabalho para rascunho (se, por exemplo, requer melhorias).';
$string['typeblog'] = 'Mensagem de Blogue';
$string['typeoffline'] = 'Trabalho off-line';
$string['typeonline'] = 'Edição de texto';
$string['typeupload'] = 'Envio avançado de ficheiros';
$string['typeuploadsingle'] = 'Envio de um único ficheiro';
$string['unfinalize'] = 'Reverter para rascunho';
$string['unfinalizeerror'] = 'Ocorreu um erro e não foi possível reverter o trabalho  para rascunho';
$string['unfinalize_help'] = 'Ao reverter para rascunho, permite que o aluno  possa atualizar o seu trabalho.';
$string['unsupportedsubplugin'] = 'O Trabalho do tipo \'{$a}\' não é suportado de momento. Poderá aguardar até que este tipo de Trabalho fique disponível, ou então elimine o Trabalho.';
$string['upgradenotification'] = 'Esta atividade está baseada no antigo módulo de trabalhos';
$string['uploadafile'] = 'Enviar ficheiro';
$string['uploadbadname'] = 'O nome deste ficheiro contem carateres estranhos e não pode ser enviado.';
$string['uploadedfiles'] = 'ficheiros enviados';
$string['uploaderror'] = 'Ocorreu um erro na gravação do ficheiro no servidor';
$string['uploadfailnoupdate'] = 'O ficheiro foi corretamente submetido, mas não foi possível atualizar o seu trabalho!';
$string['uploadfiles'] = 'Enviar ficheiros';
$string['uploadfiletoobig'] = 'Lamentamos, mas este ficheiro é muito grande (o limite é de {$a} bytes)';
$string['uploadnofilefound'] = 'Não foi encontrado nenhum ficheiro - tem a certeza que selecionou algum para enviar?';
$string['uploadnotregistered'] = '\'{$a}\' foi enviado com sucesso mas o envio não ficou registado!';
$string['uploadsuccess'] = '\'{$a}\' enviado com sucesso!';
$string['usermisconf'] = 'O utilizador está mal configurado';
$string['usernosubmit'] = 'Não tem permissões para submeter um trabalho';
$string['viewassignmentupgradetool'] = 'Ver a ferramenta de atualização de trabalhos';
$string['viewfeedback'] = 'Ver a nota e comentários ao seu trabalho';
$string['viewmysubmission'] = 'Ver o meu ficheiro';
$string['viewsubmissions'] = 'Ver {$a} trabalho(s) enviado(s)';
$string['yoursubmission'] = 'O seu envio';
