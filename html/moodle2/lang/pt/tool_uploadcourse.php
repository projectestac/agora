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
 * Strings for component 'tool_uploadcourse', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_uploadcourse
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = 'Permitir exclusões';
$string['allowdeletes_help'] = 'Se o campo de exclusão é aceite ou não.';
$string['allowrenames'] = 'Permitir renomeação';
$string['allowrenames_help'] = 'Se o campo de renomeação é aceite ou não.';
$string['allowresets'] = 'Permitir reiniciar';
$string['allowresets_help'] = 'Se o campo reiniciar é aceite ou não';
$string['cachedef_helper'] = 'Ajudante de caching';
$string['cannotdeletecoursenotexist'] = 'Não é possível eliminar uma disciplina que não existe';
$string['cannotgenerateshortnameupdatemode'] = 'Não é possível gerar um nome curto quando as atualizações são permitidas';
$string['cannotreadbackupfile'] = 'Não é possível ler o ficheiro da cópia de segurança';
$string['cannotrenamecoursenotexist'] = 'Não é possível renomear uma disciplina que não existe';
$string['cannotrenameidnumberconflict'] = 'Não é possível renomear a disciplina, o número ID está em conflito com uma disciplina existente';
$string['cannotrenameshortnamealreadyinuse'] = 'Não é possível renomear a disciplina, o nome curto já está em uso';
$string['cannotupdatefrontpage'] = 'É proibido modificar a página inicial';
$string['canonlyrenameinupdatemode'] = 'Só é possível renomear uma disciplina quando a atualização é permitida';
$string['canonlyresetcourseinupdatemode'] = 'Só é possível reiniciar uma disciplina no modo de atualização';
$string['couldnotresolvecatgorybyid'] = 'Não foi possível resolver a categoria por ID';
$string['couldnotresolvecatgorybyidnumber'] = 'Não foi possível resolver a categoria pelo número ID';
$string['couldnotresolvecatgorybypath'] = 'Não foi possível resolver a categoria pelo caminho';
$string['coursecreated'] = 'Disciplina criada';
$string['coursedeleted'] = 'Disciplina eliminada';
$string['coursedeletionnotallowed'] = 'Não é permitido eliminar disciplina';
$string['coursedoesnotexistandcreatenotallowed'] = 'A disciplina não existe e não é permitido criar disciplina';
$string['courseexistsanduploadnotallowed'] = 'A  disciplina existe e não é permitido atualizar';
$string['coursefile'] = 'Ficheiro';
$string['coursefile_help'] = 'O ficheiro tem de ser um ficheiro CSV.';
$string['courseidnumberincremented'] = 'Número ID da disciplina incrementado {$a->from} -> {$a->to}';
$string['courseprocess'] = 'Processo da disciplina';
$string['courserenamed'] = 'Disciplina renomeada';
$string['courserenamingnotallowed'] = 'Não é permitido renomear disciplina';
$string['coursereset'] = 'Disciplina reiniciada';
$string['courseresetnotallowed'] = 'Não é permitido reiniciar disciplina';
$string['courserestored'] = 'Disciplina restaurada';
$string['coursescreated'] = 'Disciplinas criadas: {$a}';
$string['coursesdeleted'] = 'Disciplinas eliminadas: {$a}';
$string['courseserrors'] = 'Erros das disciplinas: {$a}';
$string['courseshortnamegenerated'] = 'Nomes curtos de disciplinas gerados: {$a}';
$string['courseshortnameincremented'] = 'Nomes curtos de disciplinas incrementados {$a->from} -> {$a->to}';
$string['coursestotal'] = 'Total de disciplinas: {$a}';
$string['coursesupdated'] = 'Disciplina atualizada: {$a}';
$string['coursetemplatename'] = 'Restaurar a partir desta disciplina depois do upload';
$string['coursetemplatename_help'] = 'Introduza o nome curto de uma disciplina existente para usar como um modelo para a criação de todas as disciplinas';
$string['coursetorestorefromdoesnotexist'] = 'A disciplina a partir da qual pretende fazer o restauro não existe';
$string['courseupdated'] = 'Disciplina atualizada';
$string['createall'] = 'Criar todas e incrementar o nome curto, se necessário.';
$string['createnew'] = 'Criar apenas disciplinas novas, ignorar as existentes';
$string['createorupdate'] = 'Criar novas disciplinas ou atualizar as existentes';
$string['csvdelimiter'] = 'Delimitador de CSV';
$string['csvdelimiter_help'] = 'Delimitador de CSV do ficheiro CSV.';
$string['csvfileerror'] = 'Algo de errado se passa com o formato do ficheiro CSV. Por favor, verifique a correspondência entre o número de cabeçalhos e colunas, e que o delimitador e ficheiro de codificação estão corretos: {$a}';
$string['csvline'] = 'Linha';
$string['defaultvalues'] = 'Valores predefinidos da disciplina';
$string['encoding'] = 'Codificação';
$string['encoding_help'] = 'Codificação do ficheiro CSV.';
$string['errorwhiledeletingcourse'] = 'Erro ao eliminar a disciplina';
$string['errorwhilerestoringcourse'] = 'Erro ao restaurar a disciplina';
$string['generatedshortnamealreadyinuse'] = 'O nome curto gerado já está a ser usado';
$string['generatedshortnameinvalid'] = 'O nome curto gerado é inválido';
$string['id'] = 'ID';
$string['idnumberalreadyinuse'] = 'Número ID já em uso noutra disciplina';
$string['importoptions'] = 'Importar opções';
$string['invalidbackupfile'] = 'Ficheiro de cópia de segurança inválido';
$string['invalidcourseformat'] = 'Formato de disciplina inválido';
$string['invalidcsvfile'] = 'Entrada inválida de ficheiro CSV';
$string['invalidencoding'] = 'Codificação inválida';
$string['invalideupdatemode'] = 'O modo de atualização selecionado é inválido';
$string['invalidmode'] = 'O modo selecionado é inválido';
$string['invalidroles'] = 'Nomes de papel inválidos: {$a}';
$string['invalidshortname'] = 'Nome curto inválido';
$string['missingmandatoryfields'] = 'Valor em falta para campos obrigatórios: {$a}';
$string['missingshortnamenotemplate'] = 'Não foram definidos o nome curto e o modelo de nome curto em falta';
$string['mode'] = 'Modo de upload';
$string['mode_help'] = 'Esta opção especifica se as disciplinas podem ser criadas e/ou atualizadas.';
$string['nochanges'] = 'Sem alterações';
$string['pluginname'] = 'Upload de Disciplina';
$string['preview'] = 'Pré-visualização';
$string['reset'] = 'Reiniciar disciplina depois do upload';
$string['reset_help'] = 'Define se a disciplina é reiniciada depois de criada/atualizada';
$string['restoreafterimport'] = 'Reiniciar depois de importar';
$string['result'] = 'Resultado';
$string['rowpreviewnum'] = 'Pré-visualizar linhas';
$string['rowpreviewnum_help'] = 'Número de linhas do ficheiro CSV que será visualizado na página seguinte. Esta opção existe para limitar o tamanho da página seguinte.';
$string['shortnametemplate'] = 'Modelo para gerar um nome curto';
$string['shortnametemplate_help'] = 'O nome curto da disciplina é exibido na navegação. Pode usar a sintaxe modelo aqui (%f = fullname, %i = idnumber), ou introduzir um valor inicial que é incrementado.';
$string['templatefile'] = 'Reiniciar a partir deste ficheiro depois do upload';
$string['templatefile_help'] = 'Selecione um ficheiro para ser usado como modelo para a criação de todas as disciplinas.';
$string['unknownimportmode'] = 'Modo de importação desconhecido';
$string['updatemissing'] = 'Preencha os itens em falta a partir de dados e predefinições de CSV';
$string['updatemode'] = 'Modo de atualização';
$string['updatemodedoessettonothing'] = 'O modo de atualização não permite que nada seja atualizado';
$string['updatemode_help'] = 'Se permitir que as disciplinas sejam atualizadas, é necessário indicar com o que é que será feita a atualização das disciplinas';
$string['updateonly'] = 'Apenas atualizar disciplinas existentes';
$string['updatewithdataonly'] = 'Atualize apenas com dados CSV';
$string['updatewithdataordefaults'] = 'Atualize com dados e predefinições de CSV';
$string['uploadcourses'] = 'Fazer upload de disciplinas';
$string['uploadcourses_help'] = 'O upload das disciplinas pode ser feito via ficheiro de texto. O formato deste ficheiro deve estar de acordo com as seguintes indicações:

*Cada linha do ficheiro deve conter um registo;

*Cada registo consiste numa série de dados separados por vírgulas (ou outro tipo de delimitador);

*O primeiro registo deve conter uma lista de campos do tipo \'nome\' definindo o formato do resto do ficheiro;

*Os campos do tipo \'nome\' necessários são: nome curto, nome completo e categoria.';
$string['uploadcoursespreview'] = 'Pré-visualizar upload de disciplinas';
$string['uploadcoursesresult'] = 'Resultados do upload de disciplinas';
