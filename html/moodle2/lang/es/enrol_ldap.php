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
 * Strings for component 'enrol_ldap', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Asignando rol \'{$a->role_shortname}\' al usuario \'{$a->user_username}\' en el curso {$a->course_shortname}\' (id {$a->course_id})';
$string['assignrolefailed'] = 'Fallo al asignarr el rol \'{$a->role_shortname}\' al usuario \'{$a->user_username}\' en el curso {$a->course_shortname}\' (id {$a->course_id})';
$string['autocreate'] = '<p>Los cursos pueden crearse automáticamente si existen matriculaciones en un curso que aún no existe en Moodle.</p><p>Si va a utilizar la creación automática de curso, se recomienda que quite las siguientes capacidades:
moodle/course:changeidnumber,
moodle/course:changeshortname,
moodle/course:changefullname.
moodle/course: changesummary,
de los roles pertinentes para evitar modificaciones en los cuatro campos especificados a continuación:
Número ID - Nombre corto - Nombre completo - Resumen</p>';
$string['autocreate_key'] = 'Creación automática';
$string['autocreation_settings'] = 'Ajustes para la creación automática de cursos';
$string['bind_dn'] = 'Si desea usar \'bind-user\' para buscar usuarios, especifíquelo aquí. Algo como \'cn=ldapuser,ou=public,o=org\'';
$string['bind_dn_key'] = 'Enlazar nombre completo del usuario';
$string['bind_pw'] = 'Contraseña para \'bind-user\'.';
$string['bind_pw_key'] = 'Contraseña';
$string['bind_settings'] = 'Enlazar configuración';
$string['cannotcreatecourse'] = 'No se puede crear el curso: faltan datos necesarios del registro LDAP';
$string['category'] = 'Categoría para cursos auto-creados.';
$string['category_key'] = 'Categoría';
$string['contexts'] = 'Contextos LDAP';
$string['couldnotfinduser'] = 'No se pudo encontrar el usuario \'{$a}\', se pasa por alto';
$string['course_fullname'] = 'Opcional: campo LDAP del que conseguir el nombre completo.';
$string['course_fullname_key'] = 'Nombre completo';
$string['course_idnumber'] = 'Mapa del identificador único en LDAP, normalmente  <em>cn</em> or <em>uid</em>. Se recomienda bloquear el valor si se está utilizando la creación automática del curso.';
$string['course_idnumber_key'] = 'Número ID';
$string['coursenotexistskip'] = 'El curso \'{$a} no existe y la creación automática esta deshabilitada; se pasa por alto';
$string['course_search_sub'] = 'Buscar pertenencia a grupos en subcontextos';
$string['course_search_sub_key'] = 'Buscar subcontextos';
$string['course_settings'] = 'Ajustes de matriculación de Curso';
$string['course_shortname'] = 'Opcional: campo LDAP del que conseguir el nombre corto.';
$string['course_shortname_key'] = 'Nombre corto';
$string['course_summary'] = 'Opcional: campo LDAP del que conseguir el sumario.';
$string['course_summary_key'] = 'Resumen';
$string['createcourseextid'] = 'CREAR usuario matriculado en un curso inexistente \'{$a->courseextid}\'';
$string['createnotcourseextid'] = 'Usuario matriculado en un curso inexistente \'{$a->courseextid}\'';
$string['creatingcourse'] = 'Creando curso \'{$a}\'...';
$string['editlock'] = 'Bloquear valor';
$string['emptyenrolment'] = 'Matriculación vacía para el rol \'{$a->role_shortname}\' en el curso \'{$a->course_shortname}\'';
$string['enrolname'] = 'LDAP';
$string['enroluser'] = 'Matricular al usuario \'{$a->user_username}\' en el curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['enroluserenable'] = 'Matriculación habilitada para el usuario \'{$a->user_username}\' en el curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['explodegroupusertypenotsupported'] = 'ldap_explode_group() no soporta el tipo de usuario seleccionado: {$a}';
$string['extcourseidinvalid'] = 'La id del curso externo no es válido';
$string['extremovedsuspend'] = 'Matriculación habilitada para el usuario \'{$a->user_username}\' en el curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['extremovedsuspendnoroles'] = 'Matriculación deshabilitada y roles eliminados para el usuario \'{$a->user_username}\' en el curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['extremovedunenrol'] = 'Dar de baja el usuario \'{$a->user_username}\' del curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['failed'] = 'Error';
$string['general_options'] = 'Opciones generales';
$string['group_memberofattribute'] = 'Nombre del atributo que especifica a qué grupos pertenece un determinado usuario o grupo (por ejemplo, memberOf, groupMembership, etc)';
$string['group_memberofattribute_key'] = 'Atributo \'Miembro de\'';
$string['host_url'] = 'Especifique el host LDAP en formato URL, e.g.,  \'ldap://ldap.myorg.com/\'
or \'ldaps://ldap.myorg.com/\'';
$string['host_url_key'] = 'URL del servidor';
$string['idnumber_attribute'] = 'Si la pertenencia a grupo contiene \'nombres distinguidos\', especifique el mismo atributo que ha usado para el mapeo del \'Número ID\' del usuario, en la configuración de identificación LDAP';
$string['idnumber_attribute_key'] = 'Número ID del atributo';
$string['ldap_encoding'] = 'Indique la codificación utilizada por el servidor LDAP. Lo más probable es que sea utf-8;  MS AD v2 utiliza  codificaciones predeterminadas de la plataforma como cp1252, cp1250, etc';
$string['ldap_encoding_key'] = 'Codificación LDAP';
$string['ldap:manage'] = 'Gestionar ejemplos de matriculación LDAP';
$string['memberattribute'] = 'Atributo de miembro LDAP';
$string['memberattribute_isdn'] = 'Si la pertenencia a grupo contiene \'nombres distinguidos\'  necesita especificarlo aquí. Si es así, también necesita configurar el resto de parámetros de esta sección.';
$string['memberattribute_isdn_key'] = 'El atributo de miembro usa dn';
$string['nested_groups'] = '¿Desea usar grupos anidados (i.e., grupos de grupos) para la matriculación?';
$string['nested_groups_key'] = 'Grupos anidados';
$string['nested_groups_settings'] = 'Configuración de grupos anidados';
$string['nosuchrole'] = 'No existe ese rol: \'{$a}\'';
$string['objectclass'] = 'objectClass usada para buscar cursos. Normalmente
\'posixGroup\'.';
$string['objectclass_key'] = 'Clase del objeto';
$string['ok'] = 'Ok';
$string['opt_deref'] = 'Los alias son enlaces simbólicos a otros archivos, incluyendo aquellos almacenados en repositorios externos. En algunos casos, Moodle no puede restaurarlos - por ejemplo cuando se restaura una copia de seguridad en otro sitio o cuando el archivo al que se hace referencia no existe.';
$string['opt_deref_key'] = 'Alias referenciados';
$string['phpldap_noextension'] = '<em>El módulo PHP LDAP no parecen estar presente. Por favor, asegúrese de que está instalado y habilitado si desea utilizar este módulo de matriculación.</em>';
$string['pluginname'] = 'Inscripciones LDAP';
$string['pluginname_desc'] = '<p>Usted puede utilizar un servidor LDAP para coltrolar sus matriculaciones. Se asume que su árbol LDAP contiene grupos que apuntan a los cursos y que cada uno de esos grupos o cursos contienen entradas de matriculación que hacen referencia a los estudiantes.</p>
<p>Se asume que los cursos están definidos como grupos en LDAP, de modo que cada grupo tiene múltiples campos de pertenencia  (<em>member</em> o <em>memberUid</em>) que contienen una identificación única del usuario.</p>
<p>Para usar la matriculación LDAP, los usuarios <strong>deben</strong> tener un campo \'idnumber\' válido. Los grupos LDAP deben contener ese \'idnumber\' en los campos de pertenencia para que un usuario pueda matricularse en un curso. Esto normalmente funcionará bien si usted ya está usando la identificación LDAP.</p>
<p>Las matriculaciones se actualizarán cuando el usuario se identifique. Consulte en <em>enrol/ldap/enrol_ldap_sync.php</em>.</p>
<p>Esta extensión  puede también ajustarse para crear nuevos cursos de forma automática cuando aparecen nuevos grupos en LDAP.</p>';
$string['pluginnotenabled'] = 'El plugin no está habilitado';
$string['role_mapping'] = 'Para cada rol que desee asignar a partir de LDAP, debe especificar la lista de contextos donde se localizan los grupos del curso con este rol. Separe los diferentes contextos con punto y coma \';\'.

También es necesario especificar el atributo que su servidor LDAP utiliza para mantener los miembros de un grupo. Por lo general, \'member\' o \'memberUid\'';
$string['role_mapping_attribute'] = 'Atributo de miembro LDAP para {$a}';
$string['role_mapping_context'] = 'Contextos LDAP para {$a}';
$string['role_mapping_key'] = 'Mapa de roles de LDAP';
$string['roles'] = 'Mapeo de roles';
$string['server_settings'] = 'Configuración del Servidor LDAP';
$string['synccourserole'] = '== Sincronizando curso \'{$a->idnumber}\' para el rol\'{$a->role_shortname}\'';
$string['template'] = 'Opcional: los cursos auto-creados pueden copiar sus ajustes a partir de un curso-plantilla.';
$string['template_key'] = 'Plantilla';
$string['unassignrole'] = 'Quitando la asignación al rol  \'{$a->role_shortname}\' al usuario \'{$a->user_username}\' en el curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['unassignrolefailed'] = 'Fallo al quitar la asignación al rol \'{$a->role_shortname}\' al usuario \'{$a->user_username}\' en el curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['unassignroleid'] = 'Quitando la asignación al rol con id  \'{$a->role_id}\' al usuario con id \'{$a->user_id}\'';
$string['updatelocal'] = 'Actualizar datos locales';
$string['user_attribute'] = 'Si la pertenencia a grupo contiene \'nombres distinguidos\', especifique el atributo utilizado para nombrar/buscar a los usuarios. Si está utilizando la identificación LDAP, este valor debe coincidir con el atributo especificado en el \'número ID\' en la extensión de identificación LDAP';
$string['user_attribute_key'] = 'ID de atributo de número';
$string['user_contexts'] = 'Si la pertenencia a grupo contiene \'nombres distinguido\' especifique la lista de los contextos en los que se encuentran los usuarios. Separe los diferentes contextos con coma \',\'.
Por ejemplo: \'ou=users,o=org; ou=others,o=org\'';
$string['user_contexts_key'] = 'Contextos';
$string['user_search_sub'] = 'Si la pertenencia a grupo contiene \'nombres distinguidos\', especifique si la búsqueda de los usuarios se realiza también en subcontextos';
$string['user_search_sub_key'] = 'Buscar subcontextos';
$string['user_settings'] = 'Configuración de búsqueda de usuario';
$string['user_type'] = 'Si la pertenencia al grupo contiene los nombres particulares, especifique cómo se almacenan los usuarios en LDAP';
$string['user_type_key'] = 'Tipo de usuario';
$string['version'] = 'Versión del protocolo LDAP usado por el servidor.';
$string['version_key'] = 'Versión';
