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
 * Strings for component 'enrol_ldap', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'A atribuir o papel "{$a->role_shortname}" ao utilizador "{$a->user_username}" na disciplina "{$a->course_shortname}" (identificador da disciplina {$a->course_id})';
$string['assignrolefailed'] = 'A atribuição do papel "{$a->role_shortname}" ao utilizador "{$a->user_username}" na disciplina "{$a->course_shortname}" (identificados da disciplina {$a->course_id})';
$string['autocreate'] = '<p>As disciplinas podem ser criadas automaticamente caso sejam detetadas inscrições em disciplinas que não existem no Moodle</p><p>Se estiver a usar a criação automática de disciplinas recomenda-se que sejam removidas as capacidades: moodle/course:changeidnumber, moodle/course:changeshortname, moodle/course:changefullname and moodle/course:changesummary, dos papéis mais importantes para evitar alterações dos campos das disciplinas referidos nestas permissões (ID number, shortname, fullname and summary).</p>';
$string['autocreate_key'] = 'Criação automática';
$string['autocreation_settings'] = 'Configurações para criação automática de disciplinas';
$string['bind_dn'] = 'Se desejar indique neste campo um nome de utilizador de <em>bind</em> para pesquisar utilizadores. Ex: cn=ldapuser,ou=public,o=org';
$string['bind_dn_key'] = 'DN do utilizador de <em>bind</em>';
$string['bind_pw'] = 'Senha do utilizador de <em>bind</em>';
$string['bind_pw_key'] = 'Senha';
$string['bind_settings'] = 'Configurações de <em>bind</em>';
$string['cannotcreatecourse'] = 'Não foi possível criar a disciplina porque falta informação no registo LDAP!';
$string['category'] = 'Categoria a atribuir às disciplinas criadas automaticamente.';
$string['category_key'] = 'Categoria';
$string['contexts'] = 'Contextos LDAP';
$string['couldnotfinduser'] = 'O utilizador "{$a}" não foi encontrado - Ignorar';
$string['course_fullname'] = 'Opcional: Atributo LDAP que fornece o nome completo da disciplina.';
$string['course_fullname_key'] = 'Nome completo da disciplina';
$string['course_idnumber'] = 'Atributo LDAP que fornece o identificador da disciplina. Ex: "cn" or "uid".';
$string['course_idnumber_key'] = 'Identificador da disciplina';
$string['coursenotexistskip'] = 'A disciplina "{$a}" não existe e a criação automática de disciplinas está desligada -- Ignorar';
$string['course_search_sub'] = 'Procurar pertenças a grupos em subcontextos.';
$string['course_search_sub_key'] = 'Procurar em subcontextos';
$string['course_settings'] = 'Configurações de inscrições em disciplinas';
$string['course_shortname'] = 'Opcional: Atributo LDAP que fornece o nome curto da disciplina.';
$string['course_shortname_key'] = 'Nome curto da disciplina';
$string['course_summary'] = 'Opcional: Atributo LDAP que fornece o sumário da disciplina.';
$string['course_summary_key'] = 'Sumário';
$string['createcourseextid'] = 'CRIAR Utilizador inscrito numa disciplina que não existe: "{$a->courseextid}"';
$string['createnotcourseextid'] = 'Utilizador inscrito numa disciplina que não existe: "{$a->courseextid}"';
$string['creatingcourse'] = 'A criar a disciplina "{$a}" ...';
$string['duplicateshortname'] = 'A criação da disciplina falhou. Duplique o nome curto. A disciplina com o número ID \'{$a->idnumber}\' será ignorada.';
$string['editlock'] = 'Bloquear valor';
$string['emptyenrolment'] = 'Não existem utilizadores com o papel "{$a->role_shortname}" na disciplina "{$a->course_shortname}"';
$string['enrolname'] = 'LDAP';
$string['enroluser'] = 'Inscrever o utilizador "{$a->user_username}" na disciplina "{$a->course_shortname}" (identificador da disciplina {$a->course_id})';
$string['enroluserenable'] = 'A inscrição do utilizador "{$a->user_username}" na disciplina "{$a->course_shortname}" foi realizada com sucesso (identificador da disciplina {$a->course_id})';
$string['explodegroupusertypenotsupported'] = 'A função ldap_explode_group() não permite o tipo de utilizador indicado: {$a}';
$string['extcourseidinvalid'] = 'O identificador externo da disciplina é inválido!';
$string['extremovedsuspend'] = 'A inscrição do utilizador "{$a->user_username}" na disciplina "{$a->course_shortname}" (identificador da disciplina {$a->course_id}) foi removida';
$string['extremovedsuspendnoroles'] = 'A inscrição e papéis do utilizador "{$a->user_username}" na disciplina "{$a->course_shortname}" (identificador da disciplina {$a->course_id}) foram removidos';
$string['extremovedunenrol'] = 'Remover inscrição do utilizador "{$a->user_username}" da disciplina "{$a->course_shortname}" (identificador da disciplina {$a->course_id})';
$string['failed'] = 'Falhou!';
$string['general_options'] = 'Opções gerais';
$string['group_memberofattribute'] = 'Nome do atributo que determina os grupos aos quais pertence um utilizador ou um grupo. Ex: memberOf, groupMembership, etc.';
$string['group_memberofattribute_key'] = 'Atributo <strong>Member of</strong>';
$string['host_url'] = 'Esta configuração permite definir o URL do servidor LDAP. Ex: ldap://ldap.myorg.com/ ou ldaps://ldap.myorg.com/';
$string['host_url_key'] = 'URL do servidor';
$string['idnumber_attribute'] = 'Se o <em>membership</em> do grupo contém DN\'s, indique o mesmo atributo que usou para o mapeamento do <strong>ID Number</strong> do utilizador nas configurações da autenticação LDAP.';
$string['idnumber_attribute_key'] = 'Atributo <strong>ID number</strong>';
$string['ldap_encoding'] = 'Esta configuração permite definir a codificação usada pelo servidor LDAP. Provavelmente será utf-8. Os sistemas MS AD v2 normalmente usam a codificação predefinida na plataforma (cp1252, cp1250, etc.)';
$string['ldap_encoding_key'] = 'Codificação LDAP';
$string['ldap:manage'] = 'Gerir instâncias de inscrições LDAP';
$string['memberattribute'] = 'Atributo <strong>LDAP member</strong>';
$string['memberattribute_isdn'] = 'Se o membership do grupo contém DNs é necessário indicar aqui esses valores. Em caso afirmativo, é obrigatório preencher as restantes configurações desta secção.';
$string['memberattribute_isdn_key'] = 'O atributo "Member" usa dn';
$string['nested_groups'] = 'Selecionar o valor "Sim" se se pretender utilizar grupos de grupos ou "Não" caso contrário.';
$string['nested_groups_key'] = 'Grupos de grupos';
$string['nested_groups_settings'] = 'Configurações de grupos de grupos';
$string['nosuchrole'] = 'O papel "{$a}" não existe';
$string['objectclass'] = 'objectClass a usar na pesquisas de disciplinas. Nomalmente "group" ou "posixGroup".';
$string['objectclass_key'] = 'Object class';
$string['ok'] = 'OK!';
$string['opt_deref'] = 'Se o membership dos grupos contiver DN\'s indique como são manipulados os <em>aliases</em> na pesquisa. Selecione um dos seguintes valores: "Não" (LDAP_DEREF_NEVER) ou "Sim" (LDAP_DEREF_ALWAYS).';
$string['opt_deref_key'] = 'Desreferenciar <em>aliases</em>';
$string['phpldap_noextension'] = '<em>Este módulo de inscrição não pode ser usado porque a extensão LDAP do PHP não está instalada ou não está ativada.</em>';
$string['pluginname'] = 'Inscrições LDAP';
$string['pluginname_desc'] = '<p>Este módulo de inscrição permite utilizar um servidor LDAP para gerir as inscrições. É necessário que a árvore LDAP possua grupos que representem as disciplinas e que cada um desses grupos/disciplinas tenham elementos que correspondam aos alunos.</p><p>É necessário que as disciplinas estejam definidas como grupos no LDAP, em que cada grupo tem um campo (<strong>member</strong> ou <strong>memberUid</strong>) que identifica univocamente cada utilizador.</p><p>Para poder usar inscrições LDAP os seus utilizadores têm que ter um <strong>idnumber</strong> válido. Os grupos LDAP têm que ter esse <strong>idnumber</strong> com campo de membro para que os utilizadores sejam inscritos na disciplina. Normalmente não surgem problemas se estiver a ser usada autenticação LDAP.</p><p>As inscrições de um utilizador serão atualizadas quando este inicia uma sessão. É possível correr um script que atualize todas as inscrições em simultâneo: <strong>enrol/ldap/cli/sync.php</strong>.</p><p>Este módulo também pode ser configurado para criar novas disciplinas sempre que forem criados novos grupos no LDAP.</p>';
$string['pluginnotenabled'] = 'O módulo não está ativo!';
$string['role_mapping'] = '<p>Para cada papel que quiser mapear do LDAP terá que indicar a lista de contextos onde as disciplinas de cada papel estão localizadas. Separa cada contexto com ";".</p><p>É também necessário especificar o atributo que o servidor LDAP usa para guardar a informação de pertença a um grupo.Normalmente "member" ou "memberUid"</p>';
$string['role_mapping_attribute'] = 'Atributo do membro LDAP para {$a}';
$string['role_mapping_context'] = 'Contextos LDAP para $a}';
$string['role_mapping_key'] = 'Mapeamento de papéis do LDAP';
$string['roles'] = 'Mapeamento de papéis';
$string['server_settings'] = 'Configurações do servidor LDAP';
$string['synccourserole'] = 'A sincronizar a disciplina "{$a->idnumber}" para o papel "{$a->role_shortname}"';
$string['template'] = 'Opcional: as configurações das disciplinas criadas automaticamente podem ser copiadas a partir de uma disciplina que já existe no Moodle.';
$string['template_key'] = 'Modelo';
$string['unassignrole'] = 'A retirar o papel "{$a->role_shortname}" ao utilizador "{$a->user_username}" na disciplina "{$a->course_shortname}" (identificador da disciplina {$a->course_id})';
$string['unassignrolefailed'] = 'Falha ao retirar o papel "{$a->role_shortname}" ao utilizador "{$a->user_username}" na disciplina "{$a->course_shortname}" (identificador da disciplina {$a->course_id})';
$string['unassignroleid'] = 'A retirar o papel com identificador "{$a->role_id}" do utilizador com identificador "{$a->user_id}"';
$string['updatelocal'] = 'Atualizar dados locais';
$string['user_attribute'] = 'Se o membership de grupo contiver DN\'s indique o atributo usado para nomear/procurar utilizadores. Se estiver a usar autenticação LDAP este atributo deve ser o mesmo indicado no mapeamento do campo <strong>ID Number</strong> no módulo de autenticação LDAP';
$string['user_attribute_key'] = 'Atributo <strong>ID number</strong>';
$string['user_contexts'] = 'Se o membership de grupo contiver DNs indique os contextos onde estão localizados os utilizadores. Os contextos devem ser separados por ";". Ex: ou=users,o=org; ou=others,o=org';
$string['user_contexts_key'] = 'Contextos';
$string['user_search_sub'] = 'Se o membership de grupo contiver DN\'s indique se a pesquisa de utilizadores é feita também nos subcontextos.';
$string['user_search_sub_key'] = 'Pesquisar em subcontextos';
$string['user_settings'] = 'Configuração de procura de utilizadores';
$string['user_type'] = 'Se o <em>membership</em> de grupo contiver DN\'s indique a forma como os utilizadores são armazenados no LDAP.';
$string['user_type_key'] = 'Tipo de utilizador';
$string['version'] = 'Versão do protocolo LDAP que o servidor está a correr.';
$string['version_key'] = 'Versão';
