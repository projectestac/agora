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
 * Strings for component 'feedback', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   feedback
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['add_item'] = 'Adicionar questão';
$string['add_items'] = 'Adicionar questão';
$string['add_pagebreak'] = 'Adicionar quebra de página';
$string['adjustment'] = 'Ajustamento';
$string['after_submit'] = 'Após submissão de resposta';
$string['allowfullanonymous'] = 'Permitir resposta anónima';
$string['analysis'] = 'Análise';
$string['anonymous'] = 'Anónimo';
$string['anonymous_edit'] = 'Guardar nomes dos utilizadores';
$string['anonymous_entries'] = 'Respostas anónimas';
$string['anonymous_user'] = 'Utilizador anónimo';
$string['append_new_items'] = 'Acrescentar novos itens';
$string['autonumbering'] = 'Numeração automática';
$string['autonumbering_help'] = 'Ativa ou desativa a numeração automática das questões';
$string['average'] = 'Média';
$string['bold'] = 'Negrito';
$string['cancel_moving'] = 'Cancelar mover';
$string['cannotmapfeedback'] = 'Ocorreu um problema na base de dados e não foi possível associar o inquérito à disciplina';
$string['cannotsavetempl'] = 'Não é permitido gravar modelos';
$string['cannotunmap'] = 'Ocorreu um problema na base de dados e não foi possível remover a associação do inquérito à disciplina';
$string['captcha'] = 'Captcha';
$string['captchanotset'] = 'O Captcha não foi configurado';
$string['check'] = 'Escolha múltipla - múltiplas respostas';
$string['checkbox'] = 'Escolha múltipla - são permitidas múltiplas respostas (caixas de verificação)';
$string['check_values'] = 'Respostas possíveis';
$string['choosefile'] = 'Selecionar ficheiro';
$string['chosen_feedback_response'] = 'resposta do inquérito escolhida';
$string['completed'] = 'concluído';
$string['completed_feedbacks'] = 'Respostas submetidas';
$string['complete_the_form'] = 'Responder às questões';
$string['completionsubmit'] = 'Ver como concluído se o inquérito tiver sido submetido';
$string['configallowfullanonymous'] = 'Se selecionar "sim" o inquérito pode ser concluído por utilizadores não autenticados. Apenas é aplicável a inquéritos na página de entrada.';
$string['confirmdeleteentry'] = 'Tem a certeza que deseja apagar esta resposta?';
$string['confirmdeleteitem'] = 'Tem a certeza que deseja apagar este item?';
$string['confirmdeletetemplate'] = 'Tem a certeza que deseja apagar este modelo?';
$string['confirmusetemplate'] = 'Tem a certeza que deseja aplicar este modelo?';
$string['continue_the_form'] = 'Continuar o inquérito';
$string['count_of_nums'] = 'Contagem de números';
$string['courseid'] = 'identificador da disciplina';
$string['creating_templates'] = 'Gravar estas questões como um novo modelo';
$string['delete_entry'] = 'Apagar resposta';
$string['delete_item'] = 'Apagar questão';
$string['delete_old_items'] = 'Apagar itens antigos';
$string['delete_template'] = 'Apagar modelo';
$string['delete_templates'] = 'Apagar modelo…';
$string['depending'] = 'Dependências';
$string['depending_help'] = 'Esta opção permite que uma questão  só seja exibida se tiver sido dada uma determinada resposta a uma questão prévia.<br />
<strong>Siga os passos seguintes para criar uma dependência:</strong><br />
<ol>
<li>Crie uma pergunta que condicionará a exibição de outras perguntas.</li>
<li>Adicione uma quebra de página (as questões dependentes não podem ocupar a mesma página).</li>
<li>Adicione as perguntas cuja exibição depende da resposta à pergunta anterior.<br />
<li>Selecione a pergunta na lista "Dependência de" e indique o valor necessário na caixa de texto "Resposta requerida".</li>
</ol>
<strong>Por exemplo:</strong>
<ol>
<li>Questão: Tem um carro? R: sim/não</li>
<li>Quebra de página</li>
<li>Questão: De que cor é o seu carro?<br />
(esta questão depende da resposta à primeira questão ser "sim")</li>
<li>Questão: Porque não tem um carro?<br />
(esta questão depende da resposta à primeira questão ser "não")</li>
<li> ... outros itens</li>
</ol>';
$string['dependitem'] = 'Dependência de';
$string['dependvalue'] = 'Resposta requerida';
$string['description'] = 'Descrição';
$string['do_not_analyse_empty_submits'] = 'Não analisar respostas em branco';
$string['dropdown'] = 'Escolha múltipla - resposta única (menu de seleção)';
$string['dropdownlist'] = 'Escolha múltipla - resposta única (menu de seleção)';
$string['dropdownrated'] = 'Menu de seleção (c/escala)';
$string['dropdown_values'] = 'Respostas';
$string['drop_feedback'] = 'Apagar desta disciplina';
$string['edit_item'] = 'Editar questão';
$string['edit_items'] = 'Editar questões';
$string['emailnotification'] = 'Enviar notificações por e-mail';
$string['email_notification'] = 'Ativar notificação de submissões';
$string['emailnotification_help'] = 'Se ativar esta configuração os professores serão notificados por e-mail sempre que houver novas submissões de inquéritos.';
$string['emailteachermail'] = 'O utilizador {$a->username} respondeu ao inquérito:
\'{$a->feedback}\'

Pode visuazilar as suas respostas em:
{$a->url}';
$string['emailteachermailhtml'] = 'O utilizador {$a->username} respondeu ao inquérito:
<i>{$a->feedback}</i><br /><br />
Pode visuazilar as suas respostas em:
<a href="{$a->url}">{$a->url}</a>';
$string['entries_saved'] = 'As suas respostas foram gravadas. Obrigado';
$string['export_questions'] = 'Exportar questões';
$string['export_to_excel'] = 'Exportar para ficheiro Excel';
$string['feedback:addinstance'] = 'Adicionar um novo pedido de opiniões';
$string['feedbackclose'] = 'Data de encerramento';
$string['feedbackcloses'] = 'Inquérito termina';
$string['feedback:complete'] = 'Concluir um inquérito';
$string['feedback:createprivatetemplate'] = 'Criar modelo privado';
$string['feedback:createpublictemplate'] = 'Criar modelo público';
$string['feedback:deletesubmissions'] = 'Apagar submissões concluídas';
$string['feedback:deletetemplate'] = 'Apagar modelo';
$string['feedback:edititems'] = 'Editar perguntas';
$string['feedback_is_not_for_anonymous'] = 'o inquérito não permite respostas anónimas';
$string['feedback_is_not_open'] = 'O inquérito não está aberto';
$string['feedback:mapcourse'] = 'Associar inquéritos globais a disciplinas';
$string['feedbackopen'] = 'Data de abertura';
$string['feedbackopens'] = 'Inquérito inicia';
$string['feedback_options'] = 'Opções do inquérito';
$string['feedback:receivemail'] = 'Receber notificações por e-mail';
$string['feedback:view'] = 'Ver um inquérito';
$string['feedback:viewanalysepage'] = 'Ver a página de análise após a submissão';
$string['feedback:viewreports'] = 'Ver relatórios';
$string['file'] = 'Ficheiro';
$string['filter_by_course'] = 'Filtrar por disciplina';
$string['handling_error'] = 'Ocorreu um erro no processamento do módulo de ação do inquérito';
$string['hide_no_select_option'] = 'Esconder opção \'Não respondido';
$string['horizontal'] = 'horizontal';
$string['importfromthisfile'] = 'Importar deste ficheiro';
$string['import_questions'] = 'Importar questões';
$string['import_successfully'] = 'A importação foi concluída com sucesso';
$string['info'] = 'Informação de sistema';
$string['infotype'] = 'Tipo de informação';
$string['insufficient_responses'] = 'respostas insuficientes';
$string['insufficient_responses_for_this_group'] = 'As respostas deste grupo são insuficientes';
$string['insufficient_responses_help'] = 'As respostas deste grupo são insuficientes

Para que o inquérito se mantenha anónimo são necessárias pelo menos duas respostas.';
$string['item_label'] = 'Identificador';
$string['item_name'] = 'Questão';
$string['items_are_required'] = 'As questões assinaladas com asterisco são de resposta obrigatória.';
$string['label'] = 'Separador';
$string['line_values'] = 'Escala';
$string['mapcourse'] = 'Associar o inquérito a disciplinas';
$string['mapcourse_help'] = 'Por predefinição, os inquéritos criados na sua página de entrada estão disponíveis em todo o site e aparecerão em todas as disciplinas que utilizem o bloco <b>Inquérito</b>. Pode forçar a apresentação dos inquéritos tornando o bloco inquérito como bloco persistente ou limitar as disciplinas em que inquérito aparece fazendo a sua associação a disciplinas específicas.';
$string['mapcourseinfo'] = 'Este é um inquérito global que está disponível em todas as disciplinas através do bloco <b>Inquérito</b>. É possível definir em que disciplinas o formulário deve aparecer se se fizer a respetiva associação.';
$string['mapcoursenone'] = 'Como não foi efetuada nenhuma associação o inquérito estará disponível em todas as disciplinas.';
$string['mapcourses'] = 'Associar o inquérito a disciplina';
$string['mapcourses_help'] = 'Após realizar a pesquisa e seleção das disciplinas, é possível associá-las a este inquérito. Podem ser selecionadas várias disciplinas em simultâneo pressionando a tecla CTRL (APPLE no caso de computadores deste fabricante), ao mesmo tempo que são selecionadas as disciplinas pretendidas. Em qualquer momento pode remover a associação de uma disciplina a um inquérito.';
$string['mappedcourses'] = 'Disciplinas associadas';
$string['max_args_exceeded'] = 'Apenas podem ser processados 6 argumentos. Demasiados argumentos para';
$string['maximal'] = 'máximo(a)';
$string['messageprovider:message'] = 'Lembretes do inquérito';
$string['messageprovider:submission'] = 'Notificações do inquérito';
$string['mode'] = 'Modo';
$string['modulename'] = 'Inquérito';
$string['modulename_help'] = 'O módulo <b>Inquérito</b> permite a criação de inquéritos configuráveis.';
$string['modulenameplural'] = 'Inquérito';
$string['movedown_item'] = 'Mover esta questão para baixo';
$string['move_here'] = 'Mover para aqui';
$string['move_item'] = 'Mover esta questão';
$string['moveup_item'] = 'Mover esta questão para cima';
$string['multichoice'] = 'Escolha múltipla';
$string['multichoicerated'] = 'Escolha múltipla (c/escala)';
$string['multichoicetype'] = 'Tipo de escolha múltipla';
$string['multichoice_values'] = 'Opções de escolha múltipla';
$string['multiplesubmit'] = 'Submissões repetidas';
$string['multiple_submit'] = 'Submissões repetidas';
$string['multiplesubmit_help'] = 'Se ativar esta opção, os utilizadores poderão responder a inquéritos anónimos um número ilimitado de vezes.';
$string['name'] = 'Nome';
$string['name_required'] = 'O preenchimento do nome é obrigatório';
$string['next_page'] = 'Página seguinte';
$string['no_handler'] = 'Não existe ação designada para';
$string['no_itemlabel'] = 'Sem identificador';
$string['no_itemname'] = 'O item não tem nome';
$string['no_items_available_yet'] = 'Ainda não foram configuradas questões';
$string['non_anonymous'] = 'O nome do utilizador será registado e apresentado com as respostas';
$string['non_anonymous_entries'] = 'Respostas não anónimas';
$string['non_respondents_students'] = 'Alunos que não responderam';
$string['notavailable'] = 'este inquérito não se encontra disponível';
$string['not_completed_yet'] = 'Incompletos';
$string['no_templates_available_yet'] = 'Ainda não existem modelos disponíveis';
$string['not_selected'] = 'Não respondido';
$string['not_started'] = 'por iniciar';
$string['numeric'] = 'Resposta numérica';
$string['numeric_range_from'] = 'Valor mínimo';
$string['numeric_range_to'] = 'Valor máximo';
$string['of'] = 'de';
$string['oldvaluespreserved'] = 'Todas as questões antigas e os seus valores serão preservadas';
$string['oldvalueswillbedeleted'] = 'As questões atuais e as respostas de todos os utilizadores serão apagadas';
$string['only_one_captcha_allowed'] = 'Apenas é permitido inserir um CAPTCHA em cada inquérito';
$string['overview'] = 'Visão geral';
$string['page'] = 'Página';
$string['page_after_submit'] = 'Mensagem a apresentar';
$string['pagebreak'] = 'Quebra de página';
$string['page-mod-feedback-x'] = 'Qualquer página do módulo de pedido de opinião';
$string['parameters_missing'] = 'Faltam parâmetros a';
$string['picture'] = 'Imagem';
$string['picture_file_list'] = 'Lista de imagens';
$string['picture_values'] = 'Escolha uma ou mais <br />imagens da lista:';
$string['pluginadministration'] = 'Administração do inquérito';
$string['pluginname'] = 'Inquérito';
$string['position'] = 'Posição';
$string['preview'] = 'Pré-visualizar';
$string['preview_help'] = 'No modo de pré-visualização é possível alterar a ordem das questões.';
$string['previous_page'] = 'Página anterior';
$string['public'] = 'Público';
$string['question'] = 'Questão';
$string['questions'] = 'Questões';
$string['radio'] = 'Escolha múltipla - resposta única';
$string['radiobutton'] = 'Escolha Múltipla - resposta única (botões de rádio)';
$string['radiobutton_rated'] = 'Botões de rádio (c/escala)';
$string['radiorated'] = 'Botões de rádio (c/escala)';
$string['radio_values'] = 'Respostas';
$string['ready_feedbacks'] = 'Inquéritos prontos';
$string['relateditemsdeleted'] = 'Todas as respostas dos utilizadores a esta questão também serão apagadas';
$string['required'] = 'Resposta obrigatória';
$string['resetting_data'] = 'Apagar todas as respostas do inquérito';
$string['resetting_feedbacks'] = 'Reiniciar inquéritos';
$string['response_nr'] = 'Número da resposta';
$string['responses'] = 'Respostas';
$string['responsetime'] = 'Dia/Hora de resposta';
$string['save_as_new_item'] = 'Gravar como nova questão';
$string['save_as_new_template'] = 'Gravar como novo modelo';
$string['save_entries'] = 'Submeter respostas';
$string['save_item'] = 'Gravar';
$string['saving_failed'] = 'Erro ao gravar';
$string['saving_failed_because_missing_or_false_values'] = 'Ocorreu um erro ao gravar devido a valores em falta ou incoerentes';
$string['search_course'] = 'Procurar disciplina';
$string['searchcourses'] = 'Procurar disciplinas';
$string['searchcourses_help'] = 'Procurar pelo código ou nome da(s) disciplina(s) que deseja associar a este inquérito.';
$string['selected_dump'] = 'Os índices selecionados da variável <b>$SESSION</b> são apresentados na lista seguinte:';
$string['send'] = 'Enviar';
$string['send_message'] = 'Enviar mensagem';
$string['separator_decimal'] = ',';
$string['separator_thousand'] = '.';
$string['show_all'] = 'Mostrar todos';
$string['show_analysepage_after_submit'] = 'Mostrar página de análise após submissão';
$string['show_entries'] = 'Respostas';
$string['show_entry'] = 'Mostrar resposta';
$string['show_nonrespondents'] = 'Utilizadores que não responderam';
$string['site_after_submit'] = 'Site após submissão';
$string['sort_by_course'] = 'Ordenar por disciplina';
$string['start'] = 'Iniciar';
$string['started'] = 'iniciado';
$string['stop'] = 'Fim';
$string['subject'] = 'Assunto';
$string['switch_group'] = 'Mudar grupo';
$string['switch_item_to_not_required'] = 'Mudar para: resposta não é obrigatória';
$string['switch_item_to_required'] = 'Mudar para: resposta é obrigatória';
$string['template'] = 'Modelo';
$string['templates'] = 'Modelos';
$string['template_saved'] = 'O modelo foi gravado';
$string['textarea'] = 'Resposta de texto longo';
$string['textarea_height'] = 'Número de linhas';
$string['textarea_width'] = 'Largura';
$string['textfield'] = 'Resposta de texto curto';
$string['textfield_maxlength'] = 'Limite de carateres';
$string['textfield_size'] = 'Largura do campo de resposta';
$string['there_are_no_settings_for_recaptcha'] = 'O Captcha não foi configurado';
$string['this_feedback_is_already_submitted'] = 'Já completou esta atividade';
$string['timeclose'] = 'Data de encerramento';
$string['timeclose_help'] = 'É possível especificar um intervalo de tempo durante o qual o inquérito é disponibilizado aos alunos. Se a caixa de verificação não estiver ativa, não há qualquer limite de tempo definido.';
$string['timeopen'] = 'Data de abertura';
$string['timeopen_help'] = 'É possível especificar um intervalo de tempo durante o qual o inquérito está disponível para os alunos. Se a caixa de verificação não estiver ativa, o questionário estará sempre disponível.';
$string['typemissing'] = 'não foi indicado o valor "tipo"';
$string['update_item'] = 'Gravar alterações';
$string['url_for_continue'] = 'URL após botão \'Continuar';
$string['url_for_continue_button'] = 'URL após botão \'Continuar';
$string['url_for_continue_help'] = 'Por predefinição, após a submissão de um inquérito, o utilizador é direcionado para a página de entrada da disciplina. Se especificar aqui um URL o utilizador será, em alternativa, direcionado para este.';
$string['use_one_line_for_each_value'] = '<br />Introduza cada opção de resposta numa linha diferente!';
$string['use_this_template'] = 'Usar este modelo';
$string['using_templates'] = 'Usar um modelo';
$string['vertical'] = 'vertical';
$string['viewcompleted'] = 'inquéritos concluídos';
$string['viewcompleted_help'] = 'É possível consultar os inquéritos concluídos pesquisando por disciplina e/ou questão.
As respostas podem ser exportadas para ficheiro Excel.';
