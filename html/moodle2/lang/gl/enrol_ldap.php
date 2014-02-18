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
 * Strings for component 'enrol_ldap', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Asignación de rol \'{$a->role_shortname}\' ao usuario/a \'{$a->user_username}\' no curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['autocreate'] = 'Os cursos poden ser creados automaticamente se hai
                                    inscricións para un curso que aínda non exista
                                    en Moodle.';
$string['autocreate_key'] = 'Creación automática';
$string['autocreation_settings'] = 'Configuración automática para creación de cursos';
$string['bind_dn'] = 'Se desexa utilizar Usuario de ligazón para buscar usuarios,
                                 especifíqueo aquí. Algo como
                                 cn=ldapusuarior,ou=público,o=org';
$string['bind_dn_key'] = 'Nome de usuario de conexión';
$string['bind_pw'] = 'Contrasinal para o usuario de ligazón.';
$string['bind_pw_key'] = 'Contrasinal';
$string['bind_settings'] = 'Configuración de conexión';
$string['cannotcreatecourse'] = 'Non foi posíbel crear o curso: faltan datos requiridos do rexistro LDAP!';
$string['category'] = 'Categoría para cursos creados automaticamente.';
$string['category_key'] = 'Categoría';
$string['contexts'] = 'Contextos LDAP';
$string['couldnotfinduser'] = 'Non foi posíbel atopar o usuario «{$a}», omitindo';
$string['course_fullname'] = 'Opcional: Campo LDAP de onde se colle o nome completo.';
$string['course_fullname_key'] = 'Nome completo';
$string['course_idnumber'] = 'Mapa para o único identificador no LDAP, normalmente
                                         <em>cn</em> ou <em>uid</em>. Recoméndase
                                         que bloquee o valor se está a utilizar
                                         a creación automática do curso.';
$string['course_idnumber_key'] = 'Número de ID';
$string['course_search_sub'] = 'Buscar membros do grupo desde subcontextos';
$string['course_search_sub_key'] = 'Buscar subcontextos';
$string['course_settings'] = 'Configuración de inscrición nos cursos';
$string['course_shortname'] = 'Opcional: Campo LDAP de onde se colle o nome curto.';
$string['course_shortname_key'] = 'Nome curto';
$string['course_summary'] = 'Opcional: Campo LDAP de onde se colle o resumo.';
$string['course_summary_key'] = 'Resumo';
$string['createcourseextid'] = 'CREAR o usuario matriculado no curso \'{$a->courseextid}\' que non existe';
$string['createnotcourseextid'] = 'O usuario está matriculado nun curso que non existe «{$a->courseextid}»';
$string['creatingcourse'] = 'Usuario matriculado no curso course \'{$a->courseextid}\' que non existe';
$string['editlock'] = 'Bloquear valor';
$string['emptyenrolment'] = 'Matriculación baleira do rol \'{$a->role_shortname}\' no curso \'{$a->course_shortname}\'';
$string['enrolname'] = 'LDAP';
$string['enroluser'] = 'Matricular usuario \'{$a->user_username}\' no curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['enroluserenable'] = 'Activada matriculación para o usuario \'{$a->user_username}\' no curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['explodegroupusertypenotsupported'] = 'ldap_explode_group() non permite o tipo de usuario seleccionado: {$a}';
$string['extcourseidinvalid'] = 'O id do curso externo non é correcto!';
$string['extremovedsuspend'] = 'Desactivada a matriculación do usuario \'{$a->user_username}\' no curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['extremovedsuspendnoroles'] = 'Desactivada a matriculación e retirados os roles do usuario \'{$a->user_username}\' no curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['extremovedunenrol'] = 'Desmatricular o usuario \'{$a->user_username}\' do curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['failed'] = 'Produciuse un fallo!';
$string['general_options'] = 'Opcións xerais';
$string['group_memberofattribute'] = 'Nome do atributo que especifica a que grupos pertence un determinado usuario ou grupo (i.e. memberOf, groupMembership, etc.)';
$string['group_memberofattribute_key'] = 'Atributo \'Membro de\'';
$string['host_url'] = 'Especificar o servidor LDAP en forma de URL como
                                  ldap://ldap.myorg.com/
                                  ou ldaps://ldap.myorg.com/';
$string['host_url_key'] = 'URL do equipo';
$string['idnumber_attribute'] = 'Se os membros do grupo teñen nomes distintos, especifique o mesmo atributo que usou para o mapeamento do «Número ID» do usuario na configuración de autenticación LDAP';
$string['idnumber_attribute_key'] = 'Atributo de número ID';
$string['ldap_encoding'] = 'Especifique a codificación utilizada no servidor LDAP. O máis probábel é que sexa utf-8, MS AD v2 utilice unha codificación da plataforma tal como cp1252, cp1250, etc.';
$string['ldap_encoding_key'] = 'Codificación LDAP';
$string['ldap:manage'] = 'Xestionar instancia de matriculación LDAP';
$string['memberattribute'] = 'Atributo de membro LDAP';
$string['memberattribute_isdn'] = 'Se o grupo de membros contén nomes distintos, faise necesario que o especifique aquí. Se o fai, tamén é necesario configurar a configuración restante desta sección';
$string['memberattribute_isdn_key'] = 'O atributo do membro utiliza dn';
$string['nested_groups'] = 'Quere utilizar grupos aniñados (grupos de grupos) para a matriculación?';
$string['nested_groups_key'] = 'Grupos aniñados';
$string['nested_groups_settings'] = 'Configuración de grupos aniñados';
$string['objectclass'] = 'objectClass utilizado para buscar cursos. Normalmente
                                     posixGroup.';
$string['objectclass_key'] = 'Clase de obxecto';
$string['ok'] = 'Aceptar!';
$string['opt_deref'] = 'Se os membros do grupo teñen nomes distintos, especifique como manexar os alias durante a busca. Seleccione un dos seguintes valores: \'Non\' (LDAP_DEREF_NEVER) ou \'Si\' (LDAP_DEREF_ALWAYS)';
$string['opt_deref_key'] = 'Alias dereferencia';
$string['phpldap_noextension'] = '<em>O módulo PHP LDAP non parece estar presente. Asegúrese de que está instalado e activado se quere usar este engadido de matriculación.</em>';
$string['pluginname'] = 'Matriculacións LDAP';
$string['pluginname_desc'] = '<p>Pode utilizar un servidor LDAP para controlar as súas inscricións.
                          É asumido que a súa árbore LDAP contén grupos que asignan os
                          cursos, e que cada un deses grupos/cursos terán
                          entradas de membros para asignar estudantes.</p>
                          <p>É asumido que os cursos son definidos como grupos en
                          LDAP, e que cada grupo ten múltiples campos de membros
                          (<em>membro</em> ou <em>membroUid</em>) que conteñen unha única
                          identificación de usuario.</p>
                          <p>Para utilizar a inscrición LDAP, os seus usuarios <strong>deben</strong>
                          ter un campo de número id válido. Os grupos LDAP deben ter
                          este número id nos campos de membro para que un usuario poida inscribirse
                          no curso.
                          Normalmente, isto funciona ben se xa está a utilizar a Autenticación LDAP
                          .</p>
                          <p>As inscricións serán actualizadas cando os usuarios inicien a sesión.
                           Tamén pode executar un script para manter as inscricións sincronizadas. Vexa en
                          <em>inscribir/ldap/inscrición_ldap_sync.php</em>.</p>
                          <p>Este plugin tamén pode ser definido para crear automaticamente novos
                          cursos ao aparecer grupos novos en LDAP.</p>';
$string['pluginnotenabled'] = 'Engadido non activado!';
$string['role_mapping'] = '<p>Por cada rol que queira asignar desde  LDAP, debe especificar a lista de contextos onde se atopan os grupos de roles do curso. Separe os contextos diferentes con «;».</p><p>Tamén necesita especificar o atributo que os seus servidores LDAP utilizan para conter os membros dun grupo. Adoita ser «membro» ou «Uidmembro»</p>';
$string['role_mapping_attribute'] = 'Atributo do membro LDAP para {$a}';
$string['role_mapping_context'] = 'Contextos LDAP para {$a}';
$string['role_mapping_key'] = 'Mapear roles de LDAP';
$string['roles'] = 'Asignación de papeis';
$string['server_settings'] = 'Configuración do servidor LDAP';
$string['synccourserole'] = '== Sincronización do curso «{$a->idnumber}» para o rol «{$a->role_shortname}»';
$string['template'] = 'Opcional: os cursos creados automaticamente poden copiar
                                  as súas configuracións dun modelo de curso.';
$string['template_key'] = 'Modelo';
$string['unassignrole'] = 'Retirarlle o rol «{$a->role_shortname}» ao usuario «{$a->user_username}» do curso «{$a->course_shortname}» (id {$a->course_id})';
$string['updatelocal'] = 'Actualizar datos locais';
$string['user_attribute'] = 'Se os membros do grupo teñen nomes distintos, especifique o atributo utilizado para nomear/buscar usuarios. Se está a usar autenticación LDAP, este valor debería coincidir co atributo especificado no mapeamento do «Número ID» do engadido de autenticación';
$string['user_contexts'] = 'Se os membros do grupo teñen nomes distintos, especifique a lista dos contextos nos que están situados os usuarios. Separe os diferentes contextos con «;». Por exemplo: «ou=users,o=org; ou=others,o=org»';
$string['user_contexts_key'] = 'Contextos';
$string['user_search_sub'] = 'Se os membros do grupo teñen nomes distintos, especifique se a busca de usuarios se fai en subcontextos tamén';
$string['user_search_sub_key'] = 'Buscar subcontextos';
$string['user_type'] = 'Se os membros do grupo teñen nomes distintos, especifique como se gardan os usuarios en LDAP';
$string['user_type_key'] = 'Tipo de usuario';
$string['version'] = 'A versión do protocolo LDAP que está a utilizar o seu servidor.';
$string['version_key'] = 'Versión';
