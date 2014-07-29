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
 * Strings for component 'enrol_self', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_self
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cohortnonmemberinfo'] = 'Sólo los miembros de la cohorte \'{$a}\' pueden auto-matricularse.';
$string['cohortonly'] = 'Sólo para los miembros de la cohorte';
$string['cohortonly_help'] = 'La auto-matrícula puede ser restringida a los miembros de una cohorte específica. Cambiar esta configuración no tiene ningún efecto sobre las inscripciones ya existentes.';
$string['customwelcomemessage'] = 'Mensaje personalizado de bienvenida';
$string['customwelcomemessage_help'] = 'Puede añadir un mensaje de bienvenida personalizado con texto plano o en auto-formato Moodle, incluidas las etiquetas HTML y multi-lang.

Los siguientes marcadores pueden incluirse en el mensaje:

* Nombre del Curso {$a->coursename}
* Enlace a la página de perfil del usuario {$a->profileurl}';
$string['defaultrole'] = 'Asignación de rol por defecto';
$string['defaultrole_desc'] = 'Seleccione el rol que debe asignarse a los usuarios con auto-matriculación';
$string['enrolenddate'] = 'Fecha límite';
$string['enrolenddate_help'] = 'Si está habilitado, los usuarios pueden matricularse a si mismos solo hasta esta fecha ';
$string['enrolenddaterror'] = 'La fecha final de matriculación no puede ser anterior a la fecha inicial';
$string['enrolme'] = 'Matricularme';
$string['enrolperiod'] = 'Duración de la matrícula';
$string['enrolperiod_desc'] = 'Periodo de tiempo por defecto en el que la matricula es válida. Si se establece a cero, la matricula durará de forma ilimitada por defecto';
$string['enrolperiod_help'] = 'Periodo de tiempo en el que la matrícula será válida, a partir del momento en que el usuario se matricula a si mismo. Si está desactivado, la duración de la matrícula será ilimitado.';
$string['enrolstartdate'] = 'Fecha de inicio';
$string['enrolstartdate_help'] = 'Si está habilitado, los usuarios solo pueden matricularse a partir de este día.';
$string['expiredaction'] = 'Acción al expirar la matriculación';
$string['expiredaction_help'] = 'Seleccione la acción a llevar a cabo cuando la matriculación del usuario expire. Tenga en cuenta que hay información y datos de configuración relativos al usuario que serán eliminados en el proceso de baja.';
$string['expirymessageenrolledbody'] = 'Apreciado {$a->user},

Este es un aviso de que su matriculación en el curso \'{$a->course}\' está próximo a expirar en {$a->timeend}.

Si necesita ayuda, por favor contacte con {$a->enroller}.';
$string['expirymessageenrolledsubject'] = 'Notificación de expiración del periodo de auto-matrícula';
$string['expirymessageenrollerbody'] = 'La auto-matriculación en el curso \'{$a->course}\' finalizará dentro del próximo {$a->threshold} para los siguientes usuarios:

{$a->users}

Para extender su inscripción, vaya a {$a->extendurl}';
$string['expirymessageenrollersubject'] = 'Notificación de expiración del periodo de auto-matrícula';
$string['groupkey'] = 'Clave de matriculación del grupo de usuarios';
$string['groupkey_desc'] = 'Por defecto, utilice claves de matriculación de grupo.';
$string['groupkey_help'] = '<p>Además de restringir el acceso al curso a sólo aquellos que conocen la clave, el uso de una clave de acceso de grupo significa que los usuarios se agregan automáticamente al grupo cuando se inscriben en el curso. </p>
<p>Para utilizar una clave de acceso de grupo, se debe especificar que se precisa clave en la configuración de los cursos, y también en la configuración del grupo.</p>';
$string['longtimenosee'] = 'Dar de baja los inactivos después de';
$string['longtimenosee_help'] = 'Si los usuarios no acceden a un curso durante mucho tiempo, entonces se les da de baja automáticamente. Este parámetro especifica este plazo de tiempo.';
$string['maxenrolled'] = 'Número máximo de usuarios matriculados';
$string['maxenrolled_help'] = 'Especifique el número máximo de usuarios que pueden auto-matricularse.El 0 significa sin límite.';
$string['maxenrolledreached'] = 'Se alcanzó el número máximo de usuarios permitidos para auto-matriculación.';
$string['messageprovider:expiry_notification'] = 'Notificaciones de expiración del periodo de auto-matrícula';
$string['newenrols'] = 'Permitir nuevas matriculaciones';
$string['newenrols_desc'] = 'Permitir a los usuarios la auto matricula en nuevos cursos de forma predeterminada.';
$string['newenrols_help'] = 'Este ajuste determina si un usuario puede inscribirse en el curso.';
$string['nopassword'] = 'No se requiere clave de matriculación';
$string['password'] = 'Clave de matriculación';
$string['password_help'] = '<p>Una clave permite que el acceso al curso esté limitado sólo a aquellos que la conocen.</p>
<p>Si el campo se deja en blanco, cualquier usuario podrá matricularse en el curso.</p>
<p>Si se especifica una clave de acceso, cualquier usuario que intenta matricularse en el curso deberá proporcionarla y sólo se le pedirá UNA VEZ, en el momento en que se matricula.</p>
<p>Si considera cambiar esta clave en cualquier momento dentro o fuera del periodo de matrícula no afectará a los usuarios ya inscritos.</p>';
$string['passwordinvalid'] = 'Contraseña de acceso incorrecta, pruebe de nuevo';
$string['passwordinvalidhint'] = 'La contraseña de matriculación es incorrecta. Por favor, inténtelo de nuevo<br />
(Una pista: comienza con \'{$a}\')';
$string['pluginname'] = 'Auto-matriculación';
$string['pluginname_desc'] = '<p>La extensión para matrícula libre permite a los usuarios elegir los cursos en los que quieren participar.</p>
<p>Los cursos pueden estar protegidos por una contraseña de acceso.</p>
<p> Internamente, la matriculación se realiza a través de la extensión para la matriculación manual, que debe estar habilitada en el mismo curso.</p>';
$string['requirepassword'] = 'Se precisa clave de matriculación';
$string['requirepassword_desc'] = 'Se precisa clave de matriculación en nuevos cursos y se evita la eliminación de la clave de matriculación de los cursos existentes.';
$string['role'] = 'Rol asignado por defecto';
$string['self:config'] = 'Configure la auto-matriculación';
$string['self:manage'] = 'Gestionar usuarios matriculados';
$string['self:unenrol'] = 'Dar de baja usuarios del curso';
$string['self:unenrolself'] = 'Darse de baja del curso';
$string['sendcoursewelcomemessage'] = 'Enviar mensaje de bienvenida al curso';
$string['sendcoursewelcomemessage_help'] = 'Si esta opción está activada, los usuarios recibirán un mensaje de bienvenida por email cuando se automatriculen en un curso.';
$string['showhint'] = 'Mostrar pista';
$string['showhint_desc'] = 'Mostrar la primera letra de la contraseña de acceso de invitados.';
$string['status'] = 'Habilitar las auto-matriculaciones existentes';
$string['status_desc'] = 'Habilita el metodo de auto-matriculación para los cursos nuevos.';
$string['status_help'] = 'Si se encuentra deshabilitado, todas las auto-matriculaciones existentes se suspenden y los nuevos usuarios no se pueden inscribir.';
$string['unenrol'] = 'Dar de baja usuario';
$string['unenrolselfconfirm'] = '¿Está seguro que quiere darse de baja del curso "{$a}"?';
$string['unenroluser'] = '¿Realmente desea dar de baja la matrícula de "{$a->user} del curso "{$a->course}"?';
$string['usepasswordpolicy'] = 'Utilice la directiva de contraseñas';
$string['usepasswordpolicy_desc'] = 'Utilice la directiva de contraseñas estándar para las claves de matriculación.';
$string['welcometocourse'] = 'Bienvenido a {$a}';
$string['welcometocoursetext'] = 'Bienvenido a {$a->coursename}

Lo primero que debe hacer es actualizar su información personal: así podremos saber algo más sobre usted.
No olvide colocar su foto u otra imagen que lo identifique.

  {$a->profileurl}';
