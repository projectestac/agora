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
 * Strings for component 'enrol', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actenrolshhdr'] = 'Conectores disponibles de matriculación en el curso';
$string['addinstance'] = 'Añadir método';
$string['ajaxnext25'] = 'Siguientes 25...';
$string['ajaxoneuserfound'] = '1 usuario encontrado';
$string['ajaxxusersfound'] = '{$a} usuarios encontrados';
$string['assignnotpermitted'] = 'No tiene permiso o no puede asignar roles en este curso';
$string['bulkuseroperation'] = 'Operación de usuario masiva';
$string['configenrolplugins'] = 'Por favor, seleccione todos los conectores requeridos y colóquelos en orden adecuado.';
$string['custominstancename'] = 'Personalizar nombre';
$string['defaultenrol'] = 'Añadir ejemplo a cursos nuevos';
$string['defaultenrol_desc'] = 'Es posible añadir esta extensión, por defecto, a todos los cursos nuevos.';
$string['deleteinstanceconfirm'] = 'Está a punto de eliminar el método de matriculación "{$a->name}". Todos los  {$a->users} usuarios actualmente matriculados con este método serán dados de baja y cualquier información suya relativa a sus cursos, como las calificaciones, pertenencia a grupos o suscripción a foros será eliminada.

¿Está seguro que quiere continuar?';
$string['deleteinstanceconfirmself'] = '¿Estás seguro de que quieres eliminar el elemento "{$a->name}" que le da acceso a este curso? Es posible que usted luego no pueda acceder a este curso si continúa.';
$string['deleteinstancenousersconfirm'] = 'Está a punto de eliminar el método de matriculación "{$a->name}". ¿Está seguro que quiere continuar?';
$string['disableinstanceconfirmself'] = '¿Estás seguro de que quieres eliminar el elemento "{$a->name}" que le da acceso a este curso? Es posible que usted luego no pueda acceder a este curso si continúa.';
$string['durationdays'] = '{$a} días';
$string['editenrolment'] = 'Editar matricula';
$string['enrol'] = 'Matricular';
$string['enrolcandidates'] = 'Usuarios no matriculados';
$string['enrolcandidatesmatching'] = 'Emparejar usuarios no matriculados';
$string['enrolcohort'] = 'Matricular cohorte';
$string['enrolcohortusers'] = 'Matricular usuarios';
$string['enrollednewusers'] = 'Nuevos usuarios {$a} matriculados con éxito';
$string['enrolledusers'] = 'Usuarios matriculados';
$string['enrolledusersmatching'] = 'Emparejar usuarios matriculados';
$string['enrolme'] = 'Matricularme en este curso';
$string['enrolmentinstances'] = 'Métodos de matriculación';
$string['enrolmentnew'] = 'Nueva matriculación en {$a}';
$string['enrolmentnewuser'] = '{$a->user} se ha matriculado en el curso "{$a->course}"';
$string['enrolmentoptions'] = 'Opciones de matriculación';
$string['enrolments'] = 'Matriculaciones';
$string['enrolnotpermitted'] = 'No tiene permiso o no puede realizar matriculaciones en este curso';
$string['enrolperiod'] = 'Período de vigencia de la matrícula';
$string['enroltimecreated'] = 'Matrícula creada';
$string['enroltimeend'] = 'Matrículación finalizada';
$string['enroltimestart'] = 'Matriculación iniciada';
$string['enrolusage'] = 'Ejemplos / matriculaciones';
$string['enrolusers'] = 'Matricular usuarios';
$string['errajaxfailedenrol'] = 'No se ha podido matricular al usuario';
$string['errajaxsearch'] = 'Error al buscar usuarios';
$string['erroreditenrolment'] = 'Se produjo un error al intentar modificar una matrícula de usuario';
$string['errorenrolcohort'] = 'Error al crear ejemplo de matriculación sync de cohorte en este curso.';
$string['errorenrolcohortusers'] = 'Error al matricular a los miembros de la cohorte en este curso.';
$string['errorthresholdlow'] = 'El umbral para la notificación debe ser al menos 1 día.';
$string['errorwithbulkoperation'] = 'Se produjo un error mientras se procesaban sus cambios de matriculación masivos';
$string['eventuserenrolmentcreated'] = 'Usuario matriculado en curso';
$string['eventuserenrolmentdeleted'] = 'Usuario matriculado en curso';
$string['eventuserenrolmentupdated'] = 'Usuario matriculado en curso';
$string['expirynotify'] = 'Notificar antes de que la matrícula expire';
$string['expirynotifyall'] = 'Persona que matricula y usuario matriculado';
$string['expirynotifyenroller'] = 'Persona que matricula solamente';
$string['expirynotify_help'] = 'Este parámetro determina cuándo se envían los avisos de que la matricula expira.';
$string['expirynotifyhour'] = 'Hora de envío de los avisos de que la matrícula expira';
$string['expirythreshold'] = 'Umbral para la notificación';
$string['expirythreshold_help'] = '¿Cuánto tiempo antes de la expiración deben ser notificados los usuarios?';
$string['extremovedaction'] = 'Acción de desmatriculación externa';
$string['extremovedaction_help'] = 'Seleccione una acción para llevar a cabo cuando la matriculación de los usuarios desaparece de la fuente de matriculación externa. Tenga en cuenta que algunos datos y ajustes de los usuarios son purgados desde el curso durante la desmatriculación del curso.';
$string['extremovedkeep'] = 'Mantener matriculado al usuario';
$string['extremovedsuspend'] = 'Deshabilitar la matriculación en el curso';
$string['extremovedsuspendnoroles'] = 'Deshabilitar la matriculación en el curso y eliminar los roles';
$string['extremovedunenrol'] = 'Dar de baja al usuario del curso';
$string['finishenrollingusers'] = 'Finalizar matriculación de usuarios';
$string['instanceeditselfwarning'] = 'Advertencia:';
$string['instanceeditselfwarningtext'] = 'Usted está inscrito en este curso a través de este método de matriculación, los cambios pueden afectar a su acceso a este curso.';
$string['invalidenrolinstance'] = 'Ejemplo de matriculación no válido';
$string['invalidrole'] = 'Rol no válido';
$string['manageenrols'] = 'Gestionar plugins de matriculación';
$string['manageinstance'] = 'Gestionar';
$string['migratetomanual'] = 'Migrar a matriculaciones manuales';
$string['nochange'] = 'Sin cambios';
$string['noexistingparticipants'] = 'No existen participantes';
$string['noguestaccess'] = 'Los invitados no pueden acceder a este curso, por favor intente identificarse.';
$string['none'] = 'Ninguno';
$string['notenrollable'] = 'No se puede matricular en este curso.';
$string['notenrolledusers'] = 'Otros usuarios';
$string['otheruserdesc'] = 'Los siguientes usuarios no están matriculados en este curso pero tienen roles (heredados o asignados en el curso).';
$string['participationactive'] = 'Activo';
$string['participationstatus'] = 'Estatus';
$string['participationsuspended'] = 'Suspendido';
$string['periodend'] = 'hasta {$a}';
$string['periodnone'] = 'matriculado {$a}';
$string['periodstart'] = 'desde {$a}';
$string['periodstartend'] = 'desde {$a->start} hasta {$a->end}';
$string['recovergrades'] = 'Es posible recuperar las calificaciones de usuario antiguas';
$string['rolefromcategory'] = '{$a->role} (Heredado de la categoría de curso)';
$string['rolefrommetacourse'] = '{$a->role} (Heredado del curso padre)';
$string['rolefromsystem'] = '{$a->role} (Asignado a nivel de sitio)';
$string['rolefromthiscourse'] = '{$a->role} (Asignado en este curso)';
$string['startdatetoday'] = 'Hoy';
$string['synced'] = 'Sincronizado';
$string['testsettings'] = 'Configuración del test';
$string['testsettingsheading'] = 'Configuración del test de matriculación - {$a}';
$string['totalenrolledusers'] = '{$a} usuarios matriculados';
$string['totalotherusers'] = '{$a} otros usuarios';
$string['unassignnotpermitted'] = 'No tiene permiso para retirar roles en este curso';
$string['unenrol'] = 'Dar de baja';
$string['unenrolconfirm'] = '¿Realmente desea dar de baja al usuario "{$a->user}" del curso "{$a->course}"?';
$string['unenrolme'] = 'Darme de baja en {$a}';
$string['unenrolnotpermitted'] = 'No dispone de permiso o no puede dar de baja a este usuario de este curso.';
$string['unenrolroleusers'] = 'Dar de baja a usuarios';
$string['uninstallmigrating'] = 'Migrando {$a} matrículas';
$string['unknowajaxaction'] = 'Se ha solicitado una acción desconocida';
$string['unlimitedduration'] = 'Sin límite';
$string['usersearch'] = 'Buscar';
$string['withselectedusers'] = 'Con los usuarios seleccionados';
