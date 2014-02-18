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
 * Strings for component 'plugin', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   plugin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Ações';
$string['availability'] = 'Disponibilidade';
$string['checkforupdates'] = 'Verificar atualizações disponíveis';
$string['checkforupdateslast'] = 'Última verificação em {$a}';
$string['displayname'] = 'Nome do módulo';
$string['err_response_curl'] = 'Não é possível descarregar dados de atualizações disponíveis - erro cURL inesperado.';
$string['err_response_format_version'] = 'Versão inesperada do formato de resposta. Por favor, verifique novamente se existem atualizações disponíveis.';
$string['err_response_http_code'] = 'Não é possível descarregar dados de atualizações disponíveis - código de resposta HTTP inesperado.';
$string['filterall'] = 'Mostrar tudo';
$string['filtercontribonly'] = 'Mostrar apenas add-ons';
$string['filtercontribonlyactive'] = 'A mostrar apenas add-ons';
$string['filterupdatesonly'] = 'Mostrar apenas o que está disponível para atualizar';
$string['filterupdatesonlyactive'] = 'A mostrar apenas o que está disponível para atualizar';
$string['moodleversion'] = 'Moodle {$a}';
$string['nonehighlighted'] = 'Nenhuns módulos necessitam da sua atenção durante esta atualização';
$string['nonehighlightedinfo'] = 'Exibir a lista de todos os módulos instalados de todas as formas';
$string['noneinstalled'] = 'Não foram instalados módulos desse tipo';
$string['notdownloadable'] = 'Não é possível descarregar o pacote';
$string['notdownloadable_help'] = 'O pacote ZIP com a atualização não pode ser descarregado automaticamente. Por favor, consulte a página de documentação para obter mais ajuda.';
$string['notes'] = 'Notas';
$string['notwritable'] = 'Os ficheiros do módulo não permitem escrita';
$string['notwritable_help'] = 'Ativou as atualizações automáticas de módulos através do navegador e está disponível uma atualização para este módulo. No entanto, os ficheiros do módulo não permitem a escrita pelo servidor web, por isso a atualização não pode ser instalada automaticamente.

Configure os atributos da pasta do módulo e de todo o seu conteúdo para que permita a escrita e possa instalar automaticamente a atualização disponível.';
$string['numdisabled'] = 'Desativado: {$a}';
$string['numextension'] = 'Módulos: {$a}';
$string['numtotal'] = 'Instalado: {$a}';
$string['numupdatable'] = 'Atualizações disponíveis: {$a}';
$string['otherplugin'] = '{$a->component}';
$string['otherpluginversion'] = '{$a->component} ({$a->version})';
$string['pluginchecknotice'] = 'Esta página exibe módulos que podem exigir a sua atenção durante a atualização. Os itens destacados incluem novos módulos que estão prestes a ser instalados, os módulos atualizados que estão prestes a ser melhorados e todos os módulos em falta. Os módulos com contributos também estão destacados.
É recomendado que verifique se existem versões mais recentes do módulo e atualize o seu código-fonte antes de continuar com esta atualização do Moodle';
$string['plugindisable'] = 'Desativar';
$string['plugindisabled'] = 'Desativado';
$string['pluginenable'] = 'Ativar';
$string['pluginenabled'] = 'Ativado';
$string['requiredby'] = 'Pedido por: {$a}';
$string['requires'] = 'Requer';
$string['rootdir'] = 'Diretorio';
$string['settings'] = 'Configurações';
$string['showall'] = 'Atualizar e mostrar todos os módulos';
$string['somehighlighted'] = 'Número de módulos que deve ter atenção durante esta atualização: {$a}';
$string['somehighlightedinfo'] = 'Mostrar a lista completa dos módulos instalados';
$string['somehighlightedonly'] = 'Mostrar apenas módulos que precisam da sua atenção';
$string['source'] = 'Fonte';
$string['sourceext'] = 'Módulo';
$string['sourcestd'] = 'Standard';
$string['status'] = 'Estado';
$string['status_delete'] = 'Para apagar';
$string['status_downgrade'] = 'A versão mais recente já foi instalada!';
$string['status_missing'] = 'Em falta no disco';
$string['status_new'] = 'Pronto para ser instalado';
$string['status_nodb'] = 'Não existe base de dados';
$string['status_upgrade'] = 'A ser atualizado';
$string['status_uptodate'] = 'Atualizado';
$string['systemname'] = 'Identificador';
$string['type_auth'] = 'Método de autenticação';
$string['type_auth_plural'] = 'Métodos de autenticação';
$string['type_block'] = 'Bloco';
$string['type_block_plural'] = 'Blocos';
$string['type_cachelock'] = 'Gestor de bloqueio da cache';
$string['type_cachelock_plural'] = 'Gestores de bloqueio da cache';
$string['type_cachestore'] = 'Unidade de armazenamento da cache';
$string['type_cachestore_plural'] = 'Unidades de armazenamento da cache';
$string['type_coursereport'] = 'Relatório da disciplina';
$string['type_coursereport_plural'] = 'Relatórios da disciplina';
$string['type_editor'] = 'Editor';
$string['type_editor_plural'] = 'Editores';
$string['type_enrol'] = 'Método de inscrição';
$string['type_enrol_plural'] = 'Métodos de inscrição';
$string['type_filter'] = 'Filtro';
$string['type_filter_plural'] = 'Filtros de texto';
$string['type_format'] = 'Formato da disciplina';
$string['type_format_plural'] = 'Formatos da disciplina';
$string['type_gradeexport'] = 'Método de exportação de notas';
$string['type_gradeexport_plural'] = 'Métodos de exportação de notas';
$string['type_gradeimport'] = 'Método de importação de notas';
$string['type_gradeimport_plural'] = 'Métodos de importação de notas';
$string['type_gradereport'] = 'Relatório da pauta';
$string['type_gradereport_plural'] = 'Relatórios da pauta';
$string['type_gradingform'] = 'Método de avaliação avançada';
$string['type_gradingform_plural'] = 'Métodos de avaliação avançada';
$string['type_local'] = 'Módulo local';
$string['type_local_plural'] = 'Módulos locais';
$string['type_message'] = 'Destino de mensagens';
$string['type_message_plural'] = 'Destinos de mensagens';
$string['type_mnetservice'] = 'MNet service';
$string['type_mnetservice_plural'] = 'MNet services';
$string['type_mod'] = 'Módulo de atividade';
$string['type_mod_plural'] = 'Módulos de atividade';
$string['type_plagiarism'] = 'Módulo de prevenção de plágio';
$string['type_plagiarism_plural'] = 'Módulos de prevenção de plágio';
$string['type_portfolio'] = 'Portefólio';
$string['type_portfolio_plural'] = 'Portefólios';
$string['type_profilefield'] = 'Tipo de campo do perfil';
$string['type_profilefield_plural'] = 'Tipos de campos do perfil';
$string['type_qbehaviour'] = 'Comportamento da pergunta';
$string['type_qbehaviour_plural'] = 'Comportamentos das perguntas';
$string['type_qformat'] = 'Formato de importação/exportação de perguntas';
$string['type_qformat_plural'] = 'Formatos de importação/exportação de perguntas';
$string['type_qtype'] = 'Tipo de pergunta';
$string['type_qtype_plural'] = 'Tipos de perguntas';
$string['type_report'] = 'Relatório do site';
$string['type_report_plural'] = 'Relatórios';
$string['type_repository'] = 'Repositório';
$string['type_repository_plural'] = 'Repositórios';
$string['type_theme'] = 'Tema';
$string['type_theme_plural'] = 'Temas';
$string['type_tool'] = 'Ferramenta do admin';
$string['type_tool_plural'] = 'Ferramentas de administração';
$string['type_webservice'] = 'Protocolo Webservice';
$string['type_webservice_plural'] = 'Protocolos Webservice';
$string['uninstall'] = 'Desinstalar';
$string['updateavailable'] = 'Existe uma nova versão {$a} disponível!';
$string['updateavailable_moreinfo'] = 'Mais info…';
$string['updateavailable_release'] = 'Lançamento {$a}';
$string['updatepluginconfirm'] = 'Confirmação da atualização do módulo';
$string['updatepluginconfirmexternal'] = 'Aparentemente, a versão atual do módulo foi obtida através do sistema de gestão de verificação do código-fonte ({$a}). Se instalar esta atualização, não será possível obter atualizações de módulos do sistema de gestão do código fonte. Certifique-se que pretende mesmo atualizar o módulo antes de continuar.';
$string['updatepluginconfirminfo'] = 'Está prestes a instalar uma nova versão do módulo <strong>{$a->name}</strong>. Um pacote ZIP com a versão {$a->version} do módulo será descarregada de <a href="{$a->url}">{$a->url}</a> e extraída para a sua instalação Moodle para a atualizar.';
$string['updatepluginconfirmwarning'] = 'Por favor, note que o Moodle não fará uma cópia de segurança da sua base de dados antes da atualização. Recomendamos que faça uma cópia completa de segurança instantânea, para evitar que eventuais bugs do novo código tornem o seu site indisponível ou até corromper a sua base de dados. Prossiga por sua conta e risco.';
$string['version'] = 'Versão';
$string['versiondb'] = 'Versão atual';
$string['versiondisk'] = 'Nova versão';
