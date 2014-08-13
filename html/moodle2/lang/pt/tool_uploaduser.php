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
 * Strings for component 'tool_uploaduser', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_uploaduser
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = 'Permitir apagar';
$string['allowrenames'] = 'Pemitir renomear';
$string['allowsuspends'] = 'Permitir suspender e ativar contas';
$string['csvdelimiter'] = 'Delimitador CSV';
$string['defaultvalues'] = 'Valores predefinidos';
$string['deleteerrors'] = 'Apagar erros';
$string['encoding'] = 'Codificação';
$string['errormnetadd'] = 'Não é possível adicionar utilizadores remotos';
$string['errors'] = 'Erros';
$string['nochanges'] = 'Sem alterações';
$string['pluginname'] = 'Carregar utilizador';
$string['renameerrors'] = 'Renomear erros';
$string['requiredtemplate'] = 'Necessário. Pode usar a sintaxe modelo aqui (%l = lastname, %f = firstname, %u = username). Consulte a ajuda para mais detalhes e exemplos.';
$string['rowpreviewnum'] = 'Pré-visualizar linhas';
$string['uploadpicture_baduserfield'] = 'O atributo do utilizador não é válido. Por favor, tente novamente.';
$string['uploadpicture_cannotmovezip'] = 'Não é possível mover o arquivo zip para o diretório temporário.';
$string['uploadpicture_cannotprocessdir'] = 'Não pode processar arquivos descompactados.';
$string['uploadpicture_cannotsave'] = 'Não é possível guardar imagens para o utilizador {$a}. Verifique o ficheiro da imagem original.';
$string['uploadpicture_cannotunzip'] = 'Não pode descompactar ficheiros de imagens.';
$string['uploadpicture_invalidfilename'] = 'O ficheiro da imagem {$a} tem carateres inválidos em seu nome. Saltar.';
$string['uploadpicture_overwrite'] = 'Substituir as imagens existentes dos utilizadores?';
$string['uploadpictures'] = 'Carregar imagens de utilizadores';
$string['uploadpictures_help'] = 'As imagens dos utilizadores podem ser carregadas como um arquivo zip ou um ficheiro de imagem.Os ficheiros de imagem devem ser nomeados com extensão, por exemplo, user1234.jpg para um utilizador com o nome de utilizador user1234.';
$string['uploadpicture_userfield'] = 'Informação do utilizador que identifica a imagem:';
$string['uploadpicture_usernotfound'] = 'Utilizador com \'{$a->userfield}\' valor de \'{$a->uservalue}\' não existe. A saltar.';
$string['uploadpicture_userskipped'] = 'Passar utilizador {$a} (já tem imagem).';
$string['uploadpicture_userupdated'] = 'Imagem atualizada para o utilizador {$a}.';
$string['uploadusers'] = 'Carregar utilizadores';
$string['uploadusers_help'] = 'Os utilizadores podem ser carregados (e opcionalmente inscritos nas disciplinas) por ficheiro de texto. O formato do ficheiro deve ser o seguinte:

* Cada linha do ficheiro contem um registo
* Cada registo é uma linha com dados separados por vírgulas (ou outro delimitador)
* A primeira linha contem uma lusta dos nomes dos campos definindo assim o formato do ficheiro.
* Os nomes dos campos obrigatórios são username, password, firstname, lastname, email';
$string['uploaduserspreview'] = 'Pré-visualizar utilizadores carregados';
$string['uploadusersresult'] = 'Resultados dos utilizadores carregados';
$string['uploaduser:uploaduserpictures'] = 'Fazer upload de imagens de utilizador';
$string['useraccountupdated'] = 'Utilizador atualizado';
$string['useraccountuptodate'] = 'Sem alterações';
$string['userdeleted'] = 'Utilizador apagados';
$string['userrenamed'] = 'Utilizador renomeados';
$string['userscreated'] = 'Utilizadores criados';
$string['usersdeleted'] = 'Utilizadores apagados';
$string['usersrenamed'] = 'Utilizadores renomeados';
$string['usersskipped'] = 'Utilizadores ignorados';
$string['usersupdated'] = 'Utilizadores atualizados';
$string['usersweakpassword'] = 'Utilizadores com senha fraca';
$string['uubulk'] = 'Selecione para executar operações de utilizador em massa';
$string['uubulkall'] = 'Todos os utilizadores';
$string['uubulknew'] = 'Novos utilizadores';
$string['uubulkupdated'] = 'Utilizadores atualizados';
$string['uucsvline'] = 'Linha CSV';
$string['uulegacy1role'] = '(Aluno original) tipoN=1';
$string['uulegacy2role'] = '(Professor original) tipoN=2';
$string['uulegacy3role'] = '(Professor-não-editor original) tipoN=3';
$string['uunoemailduplicates'] = 'Impedir e-mail duplicados';
$string['uuoptype'] = 'Tipo de carregamento';
$string['uuoptype_addinc'] = 'Adicionar todos,inserir número à frente do nome de utilizador';
$string['uuoptype_addnew'] = 'Adicionar apenas novos, ignorar existentes';
$string['uuoptype_addupdate'] = 'Adicionar novos e atualizar existentes';
$string['uuoptype_update'] = 'Atualizar apenas os existentes';
$string['uupasswordcron'] = 'Gerada no cron';
$string['uupasswordnew'] = 'Nova senha';
$string['uupasswordold'] = 'Senha atual';
$string['uustandardusernames'] = 'Uniformizar nomes de utilizador';
$string['uuupdateall'] = 'Substituir pelo ficheiro e predefinidos';
$string['uuupdatefromfile'] = 'Substituir pelo ficheiro';
$string['uuupdatemissing'] = 'Preencher o que está em falta com o ficheiro e predefinições';
$string['uuupdatetype'] = 'Detalhes do utilizador existente';
$string['uuusernametemplate'] = 'Modelo do nome de utilizador';
