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
 * Strings for component 'question', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   question
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Ação';
$string['addanotherhint'] = 'Adicionar outra ajuda';
$string['addcategory'] = 'Adicionar categoria';
$string['addmorechoiceblanks'] = 'Adicionar mais {no} campos de opções de resposta';
$string['adminreport'] = 'Relatório de possíveis problemas na sua base de dados de perguntas.';
$string['answer'] = 'Resposta';
$string['answers'] = 'Respostas';
$string['answersaved'] = 'Resposta guardada';
$string['attemptfinished'] = 'Tentativa terminada';
$string['attemptfinishedsubmitting'] = 'A submeter a tentativa terminada:';
$string['attemptoptions'] = 'Opções das tentativas';
$string['availableq'] = 'Disponível?';
$string['badbase'] = 'Má base antes de  **: {$a}**';
$string['behaviour'] = 'Comportamento';
$string['behaviourbeingused'] = 'comportamento em uso:  {$a}';
$string['broken'] = 'É um "link quebrado", aponta para um ficheiro que não existe.';
$string['byandon'] = 'por <em>{$a->user}</em> em <em>{$a->time}</em>';
$string['cannotcopybackup'] = 'Não foi possível copiar a cópia de segurança';
$string['cannotcreate'] = 'Não foi possível criar uma nova entrada na tabela question_attempts';
$string['cannotcreatepath'] = 'Não é possível criar o caminho: {$a}';
$string['cannotdeletebehaviourinuse'] = 'Não pode apagar o comportamento \'{$a}\'. Está a ser usado em tentativas de realização do teste.';
$string['cannotdeletecate'] = 'Não pode apagar a categoria porque encontra-se como predefinida para este contexto.';
$string['cannotdeleteneededbehaviour'] = 'Não pode apagar o comportamento da pergunta \'{$a}\'. Existem outros comportamentos instalados que dependem deste.';
$string['cannotdeleteqtypeinuse'] = 'Não pode apagar o tipo de pergunta \'{$a}\'. Existem perguntas deste tipo na base de dados de perguntas.';
$string['cannotdeleteqtypeneeded'] = 'Não pode apagar o tipo de pergunta {$a}. Existem outros tipos de perguntas que dependem deste.';
$string['cannotenable'] = 'O tipo de pergunta {$a} não pode ser criada diretamente.';
$string['cannotenablebehaviour'] = 'O comportamento da pergunta {$a} não pode ser usado diretamente. É para uso interno apenas.';
$string['cannotfindcate'] = 'Não foi possível encontrar registo da categoria';
$string['cannotfindquestionfile'] = 'Não foi possível encontrar o ficheiro da pergunta no zip';
$string['cannotgetdsfordependent'] = 'Não foi possível obter a série de dados para a questão! (question: {$a->id}, datasetitem: {$a->item})';
$string['cannotgetdsforquestion'] = 'Não foi possível obter a série de dados especificada para a questão calculada! (question: {$a})';
$string['cannothidequestion'] = 'Não é possível ocultar a pergunta';
$string['cannotimportformat'] = 'Desculpe mas esse formato ainda não se encontra implementado!';
$string['cannotinsertquestion'] = 'Não foi possível adicionar a nova pergunta!';
$string['cannotinsertquestioncatecontext'] = 'Não foi possível inserir a nova categoria {$a->cat} pois o id do contexto é inválido {$a->ctx}';
$string['cannotloadquestion'] = 'Não foi possível carregar a pergunta';
$string['cannotmovequestion'] = 'Não pode usar este script para mover perguntas que possuem ficheiros associados a partir de outras áreas.';
$string['cannotopenforwriting'] = 'Não é possível abrir para editar: {$a}';
$string['cannotpreview'] = 'Não pode pré-visualizar essas perguntas!';
$string['cannotread'] = 'Não é possível ler o ficheiro importado (ou está vazio)';
$string['cannotretrieveqcat'] = 'Não foi possível recuperar a categoria da pergunta';
$string['cannotunhidequestion'] = 'Ocorreu um erro ao mostrar a pergunta';
$string['cannotunzip'] = 'Não foi possível zipar o ficheiro';
$string['cannotwriteto'] = 'Não é possível editar perguntas exportadas para {$a}';
$string['category'] = 'Categoria';
$string['categorycurrent'] = 'Categoria atual';
$string['categorycurrentuse'] = 'Usar esta categoria';
$string['categorydoesnotexist'] = 'Esta categoria não existe';
$string['categoryinfo'] = 'Informação da categoria';
$string['categorymove'] = 'A categoria {$a->name} contém {$a->count} perguntas. (algumas podem ser antigas, estar escondidas ou em uso em outros testes). <br />Por favor escolha outra categoria de destino.';
$string['categorymoveto'] = 'Guardar na categoria';
$string['categorynamecantbeblank'] = 'O nome da categoria não pode estar em branco.';
$string['changeoptions'] = 'Alterar opções';
$string['changepublishstatuscat'] = '<a href="{$a->caturl}">A categoria "{$a->name}"</a> na disciplina "{$a->coursename}" mudará o seu estado de partilha de <strong>{$a->changefrom} para {$a->changeto}</strong>.';
$string['check'] = 'Submeter';
$string['chooseqtypetoadd'] = 'Escolha um tipo de pergunta para adicionar';
$string['clearwrongparts'] = 'Limpar respostas incorretas';
$string['clickflag'] = 'Marcar pergunta';
$string['clicktoflag'] = 'Marcar esta pergunta para referência futura';
$string['clicktounflag'] = 'Desmarcar esta pergunta';
$string['clickunflag'] = 'Remover marcação';
$string['closepreview'] = 'Fechar pré-visualização';
$string['combinedfeedback'] = 'Feedback Combinado';
$string['comment'] = 'Comentário';
$string['commented'] = 'Comentado: {$a}';
$string['commentormark'] = 'Comentar ou alterar avaliação';
$string['comments'] = 'Comentários';
$string['commentx'] = 'Comentário: {$a}';
$string['complete'] = 'Respondida';
$string['contexterror'] = 'Não deveria ter chegado a este ponto se não está a mover a categoria para outro contexto.';
$string['copy'] = 'Copiar de {$a} e alterar hiperligações.';
$string['correct'] = 'Correto';
$string['correctfeedback'] = 'Para qualquer resposta correta';
$string['correctfeedbackdefault'] = 'A sua resposta está correta.';
$string['created'] = 'Criado';
$string['createdby'] = 'Criado por';
$string['createdmodifiedheader'] = 'Criado / Atualizado pela última vez';
$string['createnewquestion'] = 'Criar uma nova pergunta…';
$string['cwrqpfs'] = 'Perguntas aleatórias, a partir de subcategorias.';
$string['cwrqpfsinfo'] = '<p>Durante a atualização para o Moodle 1.9, vamos separar as categorias das perguntas em diferentes contextos. O estado de partilha de algumas categorias de perguntas e suas perguntas terá de ser alterado. Isso será necessário nos casos em que uma ou mais perguntas \'aleatórias\' num teste se encontrem em diferentes  categorias partilhadas e não partilhadas (que é o caso neste site). Isso acontece quando uma pergunta aleatória é configurada para selecionar perguntas de subcategorias e algumas dessas subcategorias têm uma configuração de partilha diferente da configuração da categoria ascendente onde a pergunta aleatória foi criada.</p>
<p>Durante a atualização para o Moodle 1.9, o estado de partilha das seguintes categorias de onde são selecionadas perguntas aleatórias de categorias ascendentes, será alterado para o mesmo estado da categoria em que se encontra a pergunta que seleciona perguntas aleatórias. As perguntas afetadas continuarão a funcionar em todos os testes existentes, enquanto não sejam apagadas.</p>';
$string['cwrqpfsnoprob'] = 'Nenhuma categoria no seu site é afetada pela questão das perguntas aleatórias que selecionam perguntas de subcategorias com diferentes estados.';
$string['decimalplacesingrades'] = 'Notas decimais nas notas';
$string['defaultfor'] = 'Categoria predefinida de {$a}';
$string['defaultinfofor'] = 'A categoria predefinida para perguntas partilhadas no contexto \'{$a}';
$string['defaultmark'] = 'Nota predefinida';
$string['defaultmarkmustbepositive'] = 'A nota predefinida deve ser positiva.';
$string['deletecoursecategorywithquestions'] = 'Existem perguntas na base de dados de perguntas associadas a esta categoria da disciplina. Se continuar, elas serão apagadas. Poderá primeiro movê-las para outras categorias usando a base de dados de perguntas.';
$string['deletequestioncheck'] = 'Tem a certeza absoluta que deseja apagar {$a}?';
$string['deletequestionscheck'] = '<p>Tem a certeza absoluta de que deseja apagar as seguintes perguntas?</p><p>{$a}</p>';
$string['deletingbehaviour'] = 'A apagar o comportamento de pergunta {$a}';
$string['deletingqtype'] = 'A apagar o tipo de pergunta {$a}';
$string['didnotmatchanyanswer'] = '[Não corresponde nenhuma resposta]';
$string['disabled'] = 'Desativado';
$string['displayoptions'] = 'Opções de visualização';
$string['disterror'] = 'Esta distribuição {$a} causou problemas';
$string['donothing'] = 'Não copiar nem mover ficheiros, nem alterar hiperligações.';
$string['editcategories'] = 'Editar categorias';
$string['editcategories_help'] = 'Ao invés das perguntas serem apresentadas numa enorme lista podem ser agrupadas em categorias e subcategorias.

Cada categoria tem um contexto que determina onde as perguntas podem ser usadas:

* Contexto da atividade - As perguntas apenas estão disponíveis para a atividade em concreto
* Contexto da disciplina - As perguntas estão disponíveis em todas as atividades da disciplina
* Contexto da categoria da disciplina -  As perguntas estão disponíveis em todas as atividades da disciplina e das restantes disciplinas inseridas na mesma categoria
* Contexto do sistema - As perguntas estão disponíveis em todas as disciplinas e atividades da plataforma

As categorias são também usadas para a criação de perguntas aleatórias selecionadas a partir de uma determinada categoria.';
$string['editcategories_link'] = 'pergunta/categoria';
$string['editcategory'] = 'Editar categoria';
$string['editingcategory'] = 'A editar uma categoria';
$string['editingquestion'] = 'A editar pergunta';
$string['editquestion'] = 'Editar pergunta';
$string['editquestions'] = 'Editar perguntas';
$string['editthiscategory'] = 'Editar esta categoria';
$string['emptyxml'] = 'Erro desconhecido - imsmanifest.xml vazio';
$string['enabled'] = 'Ativado';
$string['erroraccessingcontext'] = 'Não é possível aceder ao contexto';
$string['errordeletingquestionsfromcategory'] = 'Erro ao apagar perguntas da categoria {$a}.';
$string['errorduringpost'] = 'Ocorreu um erro durante o pós-processamento!';
$string['errorduringpre'] = 'Ocorreu um erro durante o pré-processamento!';
$string['errorduringproc'] = 'Ocorreu um erro durante o processamento!';
$string['errorduringregrade'] = 'Não foi possível reclassificar a pergunta {$a->qid}, levando ao estado {$a->stateid}.';
$string['errorfilecannotbecopied'] = 'Erro: não é possível copiar o ficheiro {$a}.';
$string['errorfilecannotbemoved'] = 'Erro: não é possível mover o ficheiro {$a}.';
$string['errorfileschanged'] = 'Erro: os ficheiros com hiperligações às questões de origem mudaram desde a exibição do formulário.';
$string['errormanualgradeoutofrange'] = 'A nota {$a->grade} não se encontra entre 0 e {$a->maxgrade} para a pergunta {$a->name}. A avaliação e o feedback não foram guardados.';
$string['errormovingquestions'] = 'Erro ao mover perguntas com os ids  {$a}.';
$string['errorpostprocess'] = 'Ocorreu um erro durante o pós-processamento!';
$string['errorpreprocess'] = 'Ocorreu um erro durante o pré-processamento!';
$string['errorprocess'] = 'Ocorreu um erro durante o processamento!';
$string['errorprocessingresponses'] = 'Ocorreu um erro enquanto processava as suas respostas.';
$string['errorsavingcomment'] = 'Ocorreu um erro ao guardar o comentário da pergunta {$a->name} na base de dados.';
$string['errorsavingflags'] = 'Ocorreu um erro ao guardar a marcação';
$string['errorupdatingattempt'] = 'Ocorreu um erro ao atualizar a tentativa  {$a->id} na base de dados.';
$string['exportcategory'] = 'Exportar categoria';
$string['exportcategory_help'] = 'Esta configuração determina qual a categoria a partir da qual as perguntas serão exportadas.

Alguns formatos de importação, como o GIFT e Moodle XML, permitem guardar a categoria e o seu contexto sendo mais tarde possível recuperá-los no processo de importação (opcional). Se o desejar, deverá escolher as opções necessárias.';
$string['exporterror'] = 'Ocorreram erros durante a exportação!';
$string['exportfilename'] = 'perguntas';
$string['exportnameformat'] = '%Y%m%d-%H%M';
$string['exportquestions'] = 'Exportar perguntas para o ficheiro';
$string['exportquestions_help'] = 'Esta função permite a exportação de uma categoria completa (e qualquer subcategorias) de perguntas. Por favor note que, dependendo do formato de arquivo selecionado, alguns dados  e certos tipos de perguntas podem não ser exportados.';
$string['exportquestions_link'] = 'pergunta/exportar';
$string['feedback'] = 'Feedback';
$string['filecantmovefrom'] = 'Os ficheiros das perguntas não podem ser movidos porque não tem permissões para apagar ficheiros do local para onde deseja mover as perguntas.';
$string['filecantmoveto'] = 'Os ficheiros das perguntas não podem ser movidos porque não tem permissões para adicionar ficheiros no local para onde deseja mover as perguntas.';
$string['fileformat'] = 'Formato de ficheiro';
$string['filesareacourse'] = 'área de ficheiros da disciplina';
$string['filesareasite'] = 'área de ficheiros do site';
$string['filestomove'] = 'Mover / copiar ficheiros para {$a}?';
$string['fillincorrect'] = 'Preencha as respostas corretas';
$string['flagged'] = 'Marcadas';
$string['flagthisquestion'] = 'Marcar esta pergunta';
$string['formquestionnotinids'] = 'Formulário continha pergunta que não está nos ids das perguntas';
$string['fractionsnomax'] = 'Uma das respostas deve ter a pontuação de 100% para que seja possível obter a nota máxima para esta pergunta.';
$string['generalfeedback'] = 'Feedback geral';
$string['generalfeedback_help'] = 'O feedback geral é exibido ao aluno depois de ter concluído a pergunta. Ao contrário do feedback específico, que depende do tipo de pergunta e da resposta dada pelo aluno, o feedback geral exibido é igual para todos os alunos.

Pode usar o feedback geral para dar ao aluno uma explicação completa da resposta e links para informação relevante para a sua compreensão.';
$string['getcategoryfromfile'] = 'Obter categoria a partir de ficheiro';
$string['getcontextfromfile'] = 'Obter contexto a partir de ficheiro';
$string['hidden'] = 'Oculto';
$string['hintn'] = 'Ajuda {no}';
$string['hintnoptions'] = 'Opções da dica {no}';
$string['hinttext'] = 'Texto de ajuda';
$string['howquestionsbehave'] = 'Modo de comportamento das perguntas';
$string['howquestionsbehave_help'] = 'Os alunos podem interagir com as perguntas do teste de várias formas diferentes. Por exemplo, pode configurar o teste de forma a que os alunos insiram uma resposta em cada pergunta e só após submeterem todo o teste obterão a sua nota e/ou feedbacks. (modo feedback diferido). Em alternativa, pode desejar que os alunos obtenham feedback imediato consoante vão submetendo as respostas a cada pergunta, e se não acertarem de imediato, possam responder de novo (modo interativo com múltiplas tentativas).';
$string['ignorebroken'] = 'Ignorar ligações quebradas';
$string['importcategory'] = 'Importar categoria';
$string['importcategory_help'] = 'Esta configuração determina a categoria para a qual as perguntas serão importadas.

Alguns formatos de importação, como o GIFT e Moodle XML, permitem guardar as perguntas com suas categorias e contextos. Para usar esta opção certifique-se que assinala as opções necessárias. Se as categorias do ficheiros ainda não existirem serão criadas.';
$string['importerror'] = 'Ocorreu um erro durante o processo de importação';
$string['importerrorquestion'] = 'Erro ao importar pergunta';
$string['importfromcoursefiles'] = '…ou escolha um ficheiro da disciplina para importar.';
$string['importfromupload'] = 'Selecione um ficheiro…';
$string['importingquestions'] = 'A importar {$a} perguntas do ficheiro';
$string['importparseerror'] = 'Foram encontrados erro(s) ao analisar o ficheiro de importação, não sendo possível importar nenhuma pergunta. Para importar perguntas sem erros tente novamente alterando a configuração Parar em caso de erro para Não';
$string['importquestions'] = 'Importar perguntas a partir do ficheiro';
$string['importquestions_help'] = 'Esta função permite importar via ficheiro de texto uma variedade de formatos de perguntas. Note que o arquivo deverá usar a codificação UTF-8.';
$string['importquestions_link'] = 'pergunta/importar';
$string['importwrongfiletype'] = 'O tipo de ficheiro que selecionou ({$a->actualtype}) não corresponde ao tipo esperado neste formato de importação. ({$a->expectedtype}).';
$string['impossiblechar'] = 'Foi detetado um carácter como parêntesis, não compatível {$a}';
$string['includesubcategories'] = 'Mostrar também as perguntas das subcategorias';
$string['incorrect'] = 'Incorreto';
$string['incorrectfeedback'] = 'Para qualquer resposta incorreta';
$string['incorrectfeedbackdefault'] = 'A sua resposta está incorreta.';
$string['information'] = 'Informação';
$string['invalidanswer'] = 'Resposta incompleta';
$string['invalidarg'] = 'Sem argumentos válidos fornecidos ou configuração do servidor incorreta';
$string['invalidcategoryidforparent'] = 'Id da categoria ascendente inválido!';
$string['invalidcategoryidtomove'] = 'Id da categoria inválido para mover!';
$string['invalidconfirm'] = 'Confirmação incorreta';
$string['invalidcontextinhasanyquestions'] = 'Um contexto inválido foi passado a question_context_has_any_questions.';
$string['invalidgrade'] = 'As notas não correspondem às opções definidas - a pergunta foi ignorada';
$string['invalidpenalty'] = 'Penalização inválida';
$string['invalidwizardpage'] = 'Incorreto ou nenhuma página do assistente foi especificada';
$string['lastmodifiedby'] = 'Última modificação por';
$string['linkedfiledoesntexist'] = 'O ficheiro, convertido em hiperligação {$a}, não existe.';
$string['makechildof'] = 'Tornar subcategoria de \'{$a}';
$string['makecopy'] = 'Gravar como nova pergunta';
$string['maketoplevelitem'] = 'Tornar categoria de topo';
$string['manualgradeoutofrange'] = 'Esta nota está fora do intervalo válido.';
$string['manuallygraded'] = 'Avaliada manualmente {$a->mark} com o comentário: {$a->comment}';
$string['mark'] = 'Nota';
$string['markedoutof'] = 'Nota';
$string['markedoutofmax'] = 'Nota de {$a}';
$string['markoutofmax'] = 'Nota: {$a->mark} em {$a->max}';
$string['marks'] = 'Nota';
$string['matchgrades'] = 'Corresponder notas';
$string['matchgradeserror'] = 'Exibir erro se a nota não estiver na lista';
$string['matchgrades_help'] = 'As notas importadas devem corresponder a um dos valores válidos - 100, 90, 80, 75, 70, 66.666, 60, 50, 40, 33.333, 30, 25, 20, 16.666, 14.2857, 12.5, 11.111, 10, 5, 0 (incluindo valores negativos). Caso contrário, existem duas opções:

* Erro, caso a nota não esteja listada: Se a pergunta contiver alguma nota não listada será exibida uma mensagem de erro e a pergunta não será importada;

* Nota mais próxima, caso não esteja listada: Se a nota não corresponder a nenhuma valor da lista será alterada para o valor listado mais próximo.';
$string['matchgradesnearest'] = 'Nota mais próxima se não estiver na lista';
$string['missingcourseorcmid'] = 'É necessário introduzir o id da disciplina ou cmid para print_question.';
$string['missingcourseorcmidtolink'] = 'É necessário introduzir o id da disciplina ou cmid para get_question_edit_link.';
$string['missingimportantcode'] = 'Falta código importante no tipo de pergunta: {$a}';
$string['missingoption'] = 'Faltam as opções da pergunta de respostas embebidas {$a}';
$string['modified'] = 'Última atualização';
$string['move'] = 'Mover de {$a} e alterar hiperligações.';
$string['movecategory'] = 'Mover categoria';
$string['movedquestionsandcategories'] = 'Foram movidas as perguntas e categorias de {$a->oldplace} para {$a->newplace}.';
$string['movelinksonly'] = 'Alterar apenas o destino das hiperligações; não mover, nem copiar os ficheiros.';
$string['moveq'] = 'Mover pergunta(s)';
$string['moveqtoanothercontext'] = 'Mover pergunta para outro contexto.';
$string['moveto'] = 'Mover para >>';
$string['movingcategory'] = 'A mover categoria';
$string['movingcategoryandfiles'] = 'Tem a certeza que quer mover a categoria {$a->name} e todas as categorias descendentes para o contexto "{$a->contexto}"?<br /> Foram encontrados {$a->urlcount} ficheiros ligados a perguntas em {$a->fromareaname}; quer copiar ou mover esses ficheiros para {$a->toareaname}?';
$string['movingcategorynofiles'] = 'Tem a certeza que quer mover a categoria "{$a->name}" e todas as  categorias descendentes para o contexto de "{$a->contexto}"?';
$string['movingquestions'] = 'A mover perguntas e ficheiros';
$string['movingquestionsandfiles'] = 'Tem a certeza que quer mover a(s) pergunta(s) {$a->questions}} para o contexto de <strong>"{$a->tocontext}"</strong>?<br /> Foram encontrados {$a->urlcount} ficheiros ligados às perguntas em {$a->fromareaname}; quer copiar ou mover esses ficheiros para {$a->toareaname}?';
$string['movingquestionsnofiles'] = 'Tem a certeza que quer mover a(s) pergunta(s) {$a->questions}} para o contexto de <strong>"{$a->tocontext}"</strong>?<br />
<strong>Não há</strong> ficheiros ligados nessa(s) pergunta(s) em {$a->fromareaname}.';
$string['needtochoosecat'] = 'Tem de escolher uma categoria para mover esta pergunta ou carregue em \'cancelar\'.';
$string['nocate'] = 'Não existe a categoria {$a}!';
$string['nopermissionadd'] = 'Não tem autorização para adicionar perguntas aqui.';
$string['nopermissionmove'] = 'Não tem autorização para mover perguntas deste local. Deve guardar a pergunta nesta categoria ou como nova pergunta.';
$string['noprobs'] = 'Não foram encontrados problemas na base de dados das perguntas.';
$string['noquestions'] = 'Não foram encontradas perguntas para exportação. Certifique-se que selecionou uma categoria com perguntas.';
$string['noquestionsinfile'] = 'Não existem perguntas no ficheiro de importação';
$string['noresponse'] = 'Sem resposta';
$string['notanswered'] = 'Não respondido';
$string['notchanged'] = 'Não modificada desde a última tentativa';
$string['notenoughanswers'] = 'Esse tipo de pergunta exige pelo menos {$a} respostas';
$string['notenoughdatatoeditaquestion'] = 'Não foi especificado o tipo de pergunta, seu código e o da categoria.';
$string['notenoughdatatomovequestions'] = 'Tem que indicar os códigos das perguntas que deseja mover.';
$string['notflagged'] = 'Sem marcação';
$string['notgraded'] = 'Sem avaliação';
$string['notshown'] = 'Não mostrar';
$string['notyetanswered'] = 'Por responder';
$string['notyourpreview'] = 'Esta pré-visualização não lhe pertence';
$string['novirtualquestiontype'] = 'Não foi encontrada nenhuma pergunta virtual para o tipo de pergunta {$a}';
$string['numqas'] = 'Nº Tentativas';
$string['numquestions'] = 'Nº perguntas';
$string['numquestionsandhidden'] = '{$a->numquestions} (+{$a->numhidden} oculta(s))';
$string['options'] = 'Opções';
$string['orphanedquestionscategory'] = 'Perguntas guardades de categorias apagadas';
$string['orphanedquestionscategoryinfo'] = 'Ocasionalmente, em geral devido a bugs antigos do software, as perguntas podem permanecer na base de dados mesmo que a correspondente categoria tenha sido apagada. É claro que isto não deve acontecer, apenas aconteceu no passado. Esta categoria foi criada automaticamente, e as perguntas órfãs foram movidas para aqui para que as possa gerir. Note que, muito provavelmente, as imagens ou ficheiros multimédia usados nestas perguntas foram perdidos.';
$string['page-question-category'] = 'Página da categoria de pergunta';
$string['page-question-edit'] = 'Página de edição de pergunta';
$string['page-question-export'] = 'Página de exportação de perguntas';
$string['page-question-import'] = 'Página de importação de perguntas';
$string['page-question-x'] = 'Qualquer página da pergunta';
$string['parent'] = 'Ascendente';
$string['parentcategory'] = 'Categoria ascendente';
$string['parentcategory_help'] = 'A categoria ascendente é aquela em que a nova categoria será incluída como subcategoria. "Topo" significa que esta categoria não será subcategoria de nenhuma outra. Os contextos da categoria são mostrados a negrito. Deverá existir pelo menos uma categoria em cada contexto.';
$string['parentcategory_link'] = 'pergunta/categoria';
$string['parenthesisinproperclose'] = 'Os parênteses antes de ** não estão devidamente fechados em {$a}**';
$string['parenthesisinproperstart'] = 'Os parênteses antes de ** não estão devidamente abertos em {$a}**';
$string['parsingquestions'] = 'A ler perguntas do ficheiro importado.';
$string['partiallycorrect'] = 'Parcialmente correto';
$string['partiallycorrectfeedback'] = 'Para qualquer resposta parcialmente correta';
$string['partiallycorrectfeedbackdefault'] = 'A sua resposta está parcialmente correta.';
$string['penaltyfactor'] = 'Fator de penalização';
$string['penaltyfactor_help'] = 'Este campo determina a fração da nota obtida que será subtraída por cada resposta errada. Aplica-se unicamente nos testes que usem o modo adaptativo.

O fator de penalização poderá ser um número entre 0 e 1. Um fator de penalização de 1 quer dizer que o estudante deverá responder corretamente na primeira tentativa para receber qualquer cotação. Um fator de penalização de 0 implica que o estudante pode tentar quantas vezes quiser e ainda obter a cotação máxima.';
$string['penaltyforeachincorrecttry'] = 'Fator de penalização';
$string['penaltyforeachincorrecttry_help'] = 'Esta opção configura qual a penalização por cada resposta errada quando o teste se encontra definido no Modo Interativo com múltiplas tentativas ou "Modo Adaptável" e o aluno pode responder várias vezes até obter a resposta correta à pergunta.

A penalização é uma proporção da nota da pergunta, logo, se a pergunta vale 3 pontos, e o fator de penalização é de 0.3333333, então o aluno tem a nota 3 se acertar à primeira, 2 se acertar à segunda e 1 se apenas acertar à terceira.';
$string['permissionedit'] = 'Editar esta pergunta';
$string['permissionmove'] = 'Mover esta pergunta';
$string['permissionsaveasnew'] = 'Gravar como nova pergunta';
$string['permissionto'] = 'Tem permissão para:';
$string['previewquestion'] = 'Pré-visualizar pergunta';
$string['published'] = 'partilhada';
$string['qtypeveryshort'] = 'Tipo de pergunta';
$string['questionaffected'] = 'A <a href="{$a->qurl}">pergunta "{$a->name}" ({$a->qtype})</a> encontra-se nesta categoria, mas também está a ser usada no <a href="{$a->qurl}">teste "{$a->quizname}"</a> em outra disciplina "{$a->coursename}".';
$string['questionbank'] = 'Base de dados de perguntas';
$string['questionbehaviouradminsetting'] = 'Configurações do comportamento de pergunta';
$string['questionbehavioursdisabled'] = 'Comportamentos de pergunta a desativar';
$string['questionbehavioursdisabledexplained'] = 'Insira os comportamentos que deseja que não sejam selecionáveis, separados por vírgulas';
$string['questionbehavioursorder'] = 'Ordem dos comportamentos de pergunta';
$string['questionbehavioursorderexplained'] = 'Insira uma lista de comportamentos separados por vírgulas, pela ordem que deseja que apareçam no menu de seleção';
$string['questioncategory'] = 'Categoria de perguntas';
$string['questioncatsfor'] = 'Categorias de perguntas para \'{$a}';
$string['questiondoesnotexist'] = 'Esta pergunta não existe';
$string['questionidmismatch'] = 'Incoerência nos ids da Pergunta';
$string['questionname'] = 'Nome da pergunta';
$string['questionno'] = 'Pergunta {$a}';
$string['questionpreviewdefaults'] = 'Predefinições da pré-visualização da pergunta';
$string['questionpreviewdefaults_desc'] = 'Estas configurações predefinidas são usadas quando o utilizador pré-visualiza pela primeira vez uma pergunta na Base de dados de perguntas. Assim que o utilizador tiver pré-visualizado a pergunta, as suas preferências pessoais serão guardadas como preferências do utilizador.';
$string['questions'] = 'Perguntas';
$string['questionsaveerror'] = 'Ocorreram erros ao gravar a pergunta - ({$a})';
$string['questionsinuse'] = '(* Perguntas marcadas com asterisco estão ainda em uso em alguns testes. Essas perguntas não serão apagadas dos testes mas apenas da categoria.)';
$string['questionsmovedto'] = 'As perguntas que ainda se encontram em uso foram movidas para "{$a}" na categoria ascendente da disciplina.';
$string['questionsrescuedfrom'] = 'Perguntas guardadas do contexto {$a}.';
$string['questionsrescuedfrominfo'] = 'Estas perguntas (algumas das quais podem estar escondidas) foram guardadas quando o contexto {$a} foi apagado, pois ainda se encontravam em uso em alguns testes ou outras atividades.';
$string['questiontext'] = 'Texto da pergunta';
$string['questiontype'] = 'Tipo de pergunta';
$string['questionuse'] = 'Usar pergunta nesta atividade';
$string['questionvariant'] = 'Variante da pergunta';
$string['questionx'] = 'Pergunta {$a}';
$string['requiresgrading'] = 'Requer avaliação';
$string['responsehistory'] = 'Histórico da resposta';
$string['restart'] = 'Recomeçar';
$string['restartwiththeseoptions'] = 'Recomeçar com estas opções';
$string['reviewresponse'] = 'Rever respostas';
$string['rightanswer'] = 'Resposta correta';
$string['rightanswer_help'] = 'Resumo da resposta correta gerada automaticamente pelo Moodle. Pode desativar esta opção e optar por explicar a solução correta à pergunta no respetivo feedback geral.';
$string['save'] = 'Guardar';
$string['saved'] = 'Guardado: {$a}';
$string['saveflags'] = 'Guardar o estado das marcações';
$string['selectacategory'] = 'Selecione uma categoria:';
$string['selectaqtypefordescription'] = 'Selecione um tipo de pergunta para ver a sua descrição';
$string['selectcategoryabove'] = 'Selecione a categoria abaixo';
$string['selectquestionsforbulk'] = 'Selecione perguntas para ações em massa';
$string['settingsformultipletries'] = 'Múltiplas tentativas';
$string['shareincontext'] = 'Partilhar no contexto {$a}';
$string['showhidden'] = 'Mostrar também perguntas antigas';
$string['showmarkandmax'] = 'Mostrar nota e máxima';
$string['showmaxmarkonly'] = 'Mostrar apenas nota máxima';
$string['shown'] = 'Mostrar';
$string['shownumpartscorrect'] = 'Mostrar o número de respostas corretas';
$string['shownumpartscorrectwhenfinished'] = 'Mostrar o número de respostas corretas após a pergunta estar concluída';
$string['showquestiontext'] = 'Mostrar texto da pergunta na lista de perguntas';
$string['specificfeedback'] = 'Feedback específico';
$string['specificfeedback_help'] = 'Feedback correspondente à resposta que o aluno selecionou ou introduziu.';
$string['started'] = 'Iniciado';
$string['state'] = 'Estado';
$string['step'] = 'Passo';
$string['stoponerror'] = 'Parar se ocorrer um erro';
$string['stoponerror_help'] = 'Esta configuração determina se o processo de importação é interrompido quando um erro é detetado parando assim a importação, ou se as perguntas com erros são ignoradas sendo apenas importadas as válidas.';
$string['submissionoutofsequence'] = 'Acesso fora da sequência. Por favor, não clique no botão Retroceder enquanto trabalha nas perguntas do teste.';
$string['submissionoutofsequencefriendlymessage'] = 'Inseriu dados fora da sequência. Isto pode acontecer se usar os botões de Avançar e Retroceder do seu navegador; por favor não os use durante o teste. Também pode acontecer se clicar em algo enquanto uma página está a carregar. Clique em <strong>Continuar</strong>.';
$string['submit'] = 'Submeter';
$string['submitandfinish'] = 'Submeter e finalizar';
$string['submitted'] = 'Submetido: {$a}';
$string['technicalinfo'] = 'Informação técnica';
$string['technicalinfo_help'] = 'A Informação técnica é provavelmente apenas necessária para os programadores que trabalham no novo tipo de perguntas. Pode ser útil para descobrirem problemas com as perguntas.';
$string['technicalinfomaxfraction'] = 'Fração máxima: {$a}';
$string['technicalinfominfraction'] = 'Fração mínima: {$a}';
$string['technicalinfoquestionsummary'] = 'Resumo da pergunta: {$a}';
$string['technicalinforightsummary'] = 'Resumo da resposta correta: {$a}';
$string['technicalinfostate'] = 'Estado da pergunta: {$a}';
$string['tofilecategory'] = 'Gravar categoria em ficheiro';
$string['tofilecontext'] = 'Gravar contexto em ficheiro';
$string['uninstallbehaviour'] = 'Desinstalar este comportamento da pergunta.';
$string['uninstallqtype'] = 'Desinstalar este tipo de pergunta.';
$string['unknown'] = 'Desconhecido(a)';
$string['unknownbehaviour'] = 'Comportamento desconhecido: {$a}.';
$string['unknownorunhandledtype'] = 'Tipo de questão não prevista ou desconhecida: {$a}';
$string['unknownquestion'] = 'Pergunta desconhecida: {$a}.';
$string['unknownquestioncatregory'] = 'Categoria desconhecida: {$a}.';
$string['unknownquestiontype'] = 'Tipo de pergunta desconhecida: {$a}.';
$string['unknowntolerance'] = 'Tipo de tolerância desconhecida: {$a}.';
$string['unpublished'] = 'não-partilhada';
$string['updatedisplayoptions'] = 'Atualizar opções de visualização';
$string['upgradeproblemcategoryloop'] = 'Foram detetados problemas na atualização das categorias. Existe um erro na árvore de categorias. Os ids das categorias afetados são {$a}.';
$string['upgradeproblemcouldnotupdatecategory'] = 'Não foi possível atualizar a categoria de perguntas {$a->name} ({$a->id}).';
$string['upgradeproblemunknowncategory'] = 'Foram detetados problemas na atualização das categorias. A categoria {$a->id} tem como categoria ascendente {$a->parent}, que não existe. A categoria ascendente foi alterada para resolver o problema.';
$string['whethercorrect'] = 'Correta/incorreta';
$string['whethercorrect_help'] = 'A classificação na forma de texto \'Correto\', \'Parcialmente correto\' ou \'Incorreto\', ou a cor de realce que expressa a mesma informação.';
$string['withselected'] = 'Com os selecionados';
$string['wrongprefix'] = 'nameprefix {$a} formatado incorretamente';
$string['xoutofmax'] = '{$a->mark} em {$a->max}';
$string['yougotnright'] = 'Selecionou corretamente {$a->num}.';
$string['youmustselectaqtype'] = 'Tem de selecionar um tipo de pergunta';
$string['yourfileshoulddownload'] = 'O seu ficheiro deve iniciar a exportação brevemente. Se não, por favor <a href="{$a}">clique aqui</a>.';
