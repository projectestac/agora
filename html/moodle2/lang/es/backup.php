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
 * Strings for component 'backup', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   backup
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autoactivedescription'] = 'Escoja si desea o no hacer copias de seguridad automáticas. Si selecciona el modo manual las copias de seguridad automáticas sólo serán posibles mediante el "script" CLI. También se pueden hacer manualmente mediante la línea de comandos o a través del cron.';
$string['autoactivedisabled'] = 'Desactivado';
$string['autoactiveenabled'] = 'Activado';
$string['autoactivemanual'] = 'Manual';
$string['automatedbackupschedule'] = 'Programación';
$string['automatedbackupschedulehelp'] = 'Decida en qué días de la semana se realizarán las copias de seguridad automatizadas';
$string['automatedbackupsinactive'] = 'Las copias de seguridad programadas han sido habilitadas por el administrador del sitio';
$string['automatedbackupstatus'] = 'Estado de la Copia de Seguridad programada';
$string['automatedsettings'] = 'Configuración de la copia de seguridad automática.';
$string['automatedsetup'] = 'Copia de seguridad programada';
$string['automatedstorage'] = 'Almacén de copias de seguridad automáticas';
$string['automatedstoragehelp'] = 'Elija la ubicación donde desea almacenar las copias de seguridad automáticas';
$string['backupactivity'] = 'Copia de seguridad actividad: {$a}';
$string['backupcourse'] = 'Copia de seguridad curso: {$a}';
$string['backupcoursedetails'] = 'Detalles del curso';
$string['backupcoursesection'] = 'Sección: {$a}';
$string['backupcoursesections'] = 'Secciones del curso';
$string['backupdate'] = 'Fecha realización';
$string['backupdetails'] = 'Detalles de la copia de seguridad';
$string['backupdetailsnonstandardinfo'] = 'El archivo seleccionado no es un archivo de copia de seguridad estándar de Moodle. El proceso de restauración intentará convertir el archivo de copia de seguridad en el formato estándar y luego restaurarlo.';
$string['backupformat'] = 'Formato';
$string['backupformatimscc1'] = 'IMS Common Cartridge 1.0';
$string['backupformatimscc11'] = 'IMS Common Cartridge 1.0';
$string['backupformatmoodle1'] = 'Moodle 1';
$string['backupformatmoodle2'] = 'Moodle 2';
$string['backupformatunknown'] = 'Formato desconocido';
$string['backuplog'] = 'Información técnica y advertencias';
$string['backupmode'] = 'Modo';
$string['backupmode10'] = 'General';
$string['backupmode20'] = 'Importar';
$string['backupmode30'] = 'Central de cursos';
$string['backupmode40'] = 'Mismo sitio';
$string['backupmode50'] = 'Automatizado';
$string['backupmode60'] = 'Convertido';
$string['backupsection'] = 'Copia de seguridad sección de curso: Copia de seguridad curso: {$a}';
$string['backupsettings'] = 'Copia de seguridad de parámetros de configuración';
$string['backupsitedetails'] = 'Detalles del sitio';
$string['backupstage16action'] = 'Continuar';
$string['backupstage1action'] = 'Siguiente';
$string['backupstage2action'] = 'Siguiente';
$string['backupstage4action'] = 'Ejecutar copia de seguridad';
$string['backupstage8action'] = 'Continuar';
$string['backuptype'] = 'Tipo';
$string['backuptypeactivity'] = 'Actividad';
$string['backuptypecourse'] = 'Curso';
$string['backuptypesection'] = 'Sección';
$string['backupversion'] = 'Copia de seguridad versión';
$string['cannotfindassignablerole'] = 'El rol {$a} en el archivo de copia de seguridad no se puede mapear a ninguno de los roles que usted puede asignar.';
$string['choosefilefromactivitybackup'] = 'Zona de actividad de la copia de seguridad';
$string['choosefilefromactivitybackup_help'] = 'Cuando se realiza una copia de seguridad de las actividades utilizando los valores preestablecidos, los archivos de la copia se guardan aquí.';
$string['choosefilefromautomatedbackup'] = 'Copias de seguridad automáticas';
$string['choosefilefromautomatedbackup_help'] = 'Contiene las copias de seguridad automáticas';
$string['choosefilefromcoursebackup'] = 'Zona de copia de seguridad de curso';
$string['choosefilefromcoursebackup_help'] = 'Cuando se realiza una copia de seguridad de un curso utilizando los valores preestablecidos, los archivos de la copia se guardan aquí.';
$string['choosefilefromuserbackup'] = 'Zona de copia de seguridad privada de usuario';
$string['choosefilefromuserbackup_help'] = 'Cuando la copia de seguridad de los cursos tiene marcada la opción "Hacer anónima la información de usuario", los archivos de copia de seguridad se guardan aquí';
$string['configgeneralactivities'] = 'Ajusta los valores por defecto para incluir actividades en una copia de seguridad.';
$string['configgeneralanonymize'] = 'Si se activa, toda la información relativa a los usuarios será anónima por defecto.';
$string['configgeneralbadges'] = 'Establece el valor por defecto para incluir las insignias en la copia de seguridad.';
$string['configgeneralblocks'] = 'Ajusta los valores por defecto para incluir bloques en la copia de seguridad.';
$string['configgeneralcomments'] = 'Ajusta los valores por defecto para incluir comentarios en la copia de seguridad.';
$string['configgeneralfilters'] = 'Ajusta los valores por defecto para incluir filtros en la copia de seguridad.';
$string['configgeneralhistories'] = 'Ajusta los valores por defecto para incluir el historial del usuario dentro de una copia de seguridad.';
$string['configgenerallogs'] = 'Si se activa, se incluirán por defecto registros en las copias de seguridad.';
$string['configgeneralquestionbank'] = 'Si se habilita, el banco de preguntas se incluirá en las copias de seguridad de forma predeterminada. NOTA: la desactivación de esta opción desactivará la copia de seguridad de las actividades que utilizan el banco de preguntas, como es el caso del cuestionario.';
$string['configgeneralroleassignments'] = 'Si se habilita, los roles asignados por defecto serán también copiados.';
$string['configgeneralusers'] = 'Ajusta los valores por defecto para incluir a los usuarios en las copias de seguridad.';
$string['configgeneraluserscompletion'] = 'Si se activa, la información del grado de avance de los usuarios se incluirá por defecto en las copias de seguridad.';
$string['configloglifetime'] = 'Especifica el periodo de tiempo durante el que desea mantener la información de los registros de copia de seguridad. Los registros más antiguos que el establecido se borrarán automáticamente. Se recomienda mantener este valor lo más bajo posible, ya que el volumen de la información sobre las  copias de seguridad puede llegar a se muy grande.';
$string['confirmcancel'] = 'Cancelar copia de seguridad';
$string['confirmcancelno'] = 'Permanecer';
$string['confirmcancelquestion'] = '¿Está seguro de que desea cancelar?
Cualquier información que haya introducido se perderá.';
$string['confirmcancelyes'] = 'Cancelar';
$string['confirmnewcoursecontinue'] = 'Alerta de curso nuevo';
$string['confirmnewcoursecontinuequestion'] = 'Se creará un curso temporal (oculto) en el proceso de restauración de cursos. Para cancelar la restauración pulse en Cancelar. No cierre el navegador mientras se restaura.';
$string['coursecategory'] = 'Categoría en la que se restaurará el curso';
$string['courseid'] = 'ID original';
$string['coursesettings'] = 'Ajustes del curso';
$string['coursetitle'] = 'Título';
$string['currentstage1'] = 'Ajustes iniciales';
$string['currentstage16'] = 'Completar';
$string['currentstage2'] = 'Ajustes del esquema';
$string['currentstage4'] = 'Confirmación y revisión';
$string['currentstage8'] = 'Ejecutar copia de seguridad';
$string['enterasearch'] = 'Introduzca un criterio de búsqueda';
$string['error_block_for_module_not_found'] = 'Encontrada instancia de bloque huérfano (id: {$a->bid}) para el módulo del curso (id: {$a->mid}) Este bloque no se copiará';
$string['error_course_module_not_found'] = 'Encontrado módulo de curso huérfano (id: {$a}). Este modulo no se copiará';
$string['errorfilenamemustbezip'] = 'El nombre que se introduzca debe ser un archivo ZIP y con la extensión MBZ';
$string['errorfilenamerequired'] = 'Debe introducir un nombre de archivo válido para esta copia de seguridad';
$string['errorinvalidformat'] = 'Formato de backup desconocido';
$string['errorinvalidformatinfo'] = 'El archivo seleccionado no es un archivo de copia de seguridad de Moodle válido y no puede ser restaurado.';
$string['errorminbackup20version'] = 'Este archivo de copia de seguridad ha sido creado con una versión de desarrollo de copia de seguridad de Moodle ({$a->backup}) y se requiere al menos la versión {$a->min}. Por lo tanto, no puede ser restaurado.';
$string['errorrestorefrontpage'] = 'No está permitido restaurar en la página principal.';
$string['errortgznozlib'] = 'El archivo seleccionado está en el nuevo formato de copia de seguridad y no puede restaurarse porque la extensión de PHP zlib no está disponible en el sistema.';
$string['executionsuccess'] = 'El archivo de copia de seguridad se creó con éxito';
$string['filealiasesrestorefailures'] = 'Fallos en la restauración de alias';
$string['filealiasesrestorefailures_help'] = 'Los alias son enlaces simbólicos a otros archivos, incluyendo aquellos almacenados en repositorios externos. En algunos casos, Moodle no puede restaurarlos - por ejemplo cuando se restaura una copia de seguridad en otro sitio o cuando el archivo al que se hace referencia no existe.';
$string['filealiasesrestorefailuresinfo'] = 'Algunos alias incluidos en el archivo de copia de seguridad no pudieron restaurarse. La lista siguiente contiene su localización esperada y el archivo origen al que se estaban refiriendo en el sitio original.';
$string['filename'] = 'Nombre de archivo';
$string['filereferencesincluded'] = 'Las referencias de archivo a contenidos externos incluidos en el paquete de copia de seguridad, no funcionarán en otros sitios.';
$string['filereferencesnotsamesite'] = 'La copia de seguridad es de otro sitio, las referencias de archivo no se puede restaurar';
$string['filereferencessamesite'] = 'La copia de seguridad es de este sitio, las referencias de archivo se puede restaurar';
$string['generalactivities'] = 'Incluir actividades';
$string['generalanonymize'] = 'Información anónima';
$string['generalbackdefaults'] = 'Configuración por defecto de la copia de seguridad';
$string['generalbadges'] = 'Incluir insignias';
$string['generalblocks'] = 'Incluir bloques';
$string['generalcomments'] = 'Incluir comentarios';
$string['generalfilters'] = 'Incluir filtros';
$string['generalgradehistories'] = 'Incluir historiales';
$string['generalhistories'] = 'Incluir historiales';
$string['generallogs'] = 'Incluir archivos de \'log"';
$string['generalquestionbank'] = 'Incluir banco de preguntas';
$string['generalroleassignments'] = 'Incluir asignaciones de rol';
$string['generalsettings'] = 'Parámetros generales de la copia de seguridad';
$string['generalusers'] = 'Incluir usuarios';
$string['generaluserscompletion'] = 'Incluir información del grado de avance del usuario';
$string['hidetypes'] = 'Ocultar tipo de opciones';
$string['importbackupstage16action'] = 'Continuar';
$string['importbackupstage1action'] = 'Siguiente';
$string['importbackupstage2action'] = 'Siguiente';
$string['importbackupstage4action'] = 'Realizar la importación';
$string['importbackupstage8action'] = 'Continuar';
$string['importcurrentstage0'] = 'Selección de cursos';
$string['importcurrentstage1'] = 'Configuración inicial';
$string['importcurrentstage16'] = 'Completo';
$string['importcurrentstage2'] = 'Configuración del esquema';
$string['importcurrentstage4'] = 'Confirmación y revisión';
$string['importcurrentstage8'] = 'Realizar la importación';
$string['importfile'] = 'Importar un archivo de copia de seguridad';
$string['importgeneralmaxresults'] = 'Número máximo de cursos listados para importación';
$string['importgeneralmaxresults_desc'] = 'Controla el número de cursos que son listados durante el primer paso del proceso de importación';
$string['importgeneralsettings'] = 'Ajustes por defecto de importación';
$string['importsuccess'] = 'Importación completada. Pulse para volver al curso.';
$string['includeactivities'] = 'Incluido:';
$string['includeditems'] = 'Elementos incluidos:';
$string['includefilereferences'] = 'Referencias de archivo a contenidos externos';
$string['includesection'] = 'Sección {$a}';
$string['includeuserinfo'] = 'Datos de usuario';
$string['locked'] = 'Bloqueado';
$string['lockedbyconfig'] = 'Este ajuste ha sido bloqueado por la configuración predeterminada de la copia de seguridad';
$string['lockedbyhierarchy'] = 'Bloqueado por las dependencias';
$string['lockedbypermission'] = 'Usted no tiene permisos suficientes para cambiar esta configuración';
$string['loglifetime'] = 'Mantener los registro durante';
$string['managefiles'] = 'Gestionar archivos de copia de seguridad';
$string['missingfilesinpool'] = 'Algunos archivos no pudieron guardarse al hacer la copia de seguridad. No será posible restaurarlos.';
$string['module'] = 'Módulo';
$string['moodleversion'] = 'Versión de Moodle';
$string['morecoursesearchresults'] = 'Más de {$a} cursos encontrados, mostrando los primeros {$a} resultados';
$string['moreresults'] = 'Hay demasiados resultados, escriba una búsqueda más específica.';
$string['nomatchingcourses'] = 'No hay cursos para mostrar';
$string['norestoreoptions'] = 'No hay categorías o cursos que pueda restaurar';
$string['originalwwwroot'] = 'URL de la copia de seguridad';
$string['preparingdata'] = 'Preparando datos';
$string['preparingui'] = 'Preparando para visualizar página';
$string['previousstage'] = 'Anterior';
$string['qcategory2coursefallback'] = 'La categoría de preguntas "{$a->name", originalmente el contexto de caegoría sistema/curso, serán creadas en el contexto curso al ser restauradas.';
$string['qcategorycannotberestored'] = 'La categoría de preguntas "{$a-> name}" no puede ser creada por restauración';
$string['question2coursefallback'] = 'La categoría de preguntas "{$a->name}", originalmente en la categoría de contesto sistema/curso dentro del archivo de copia de seguridad, se creará en el contexto del curso al ser restaurada';
$string['questionegorycannotberestored'] = 'Las preguntas "{$a->name}" no pueden crearse por restauración';
$string['restoreactivity'] = 'Actividad de la restauración';
$string['restorecourse'] = 'Restaurar curso';
$string['restorecoursesettings'] = 'Configuración del curso';
$string['restoreexecutionsuccess'] = 'Se ha restaurado el curso con éxito. Si pulsa en el botón \'Continuar\' podrá ver el curso que ha restaurado.';
$string['restorefileweremissing'] = 'Algunos archivos no pudieron restaurarse debido a que faltaban en la copia de seguridad.';
$string['restorenewcoursefullname'] = 'Nombre del nuevo curso';
$string['restorenewcourseshortname'] = 'Nombre corto del nuevo curso';
$string['restorenewcoursestartdate'] = 'Nueva fecha de inicio';
$string['restorerolemappings'] = 'Restaurar mapeos de rol';
$string['restorerootsettings'] = 'Restaurar ajustes';
$string['restoresection'] = 'Restaurar sección';
$string['restorestage1'] = 'Confirmar';
$string['restorestage16'] = 'Revisar';
$string['restorestage16action'] = 'Ejecutar restauración';
$string['restorestage1action'] = 'Siguiente';
$string['restorestage2'] = 'Destino';
$string['restorestage2action'] = 'Siguiente';
$string['restorestage32'] = 'Proceso';
$string['restorestage32action'] = 'Continuar';
$string['restorestage4'] = 'Ajustes';
$string['restorestage4action'] = 'Siguiente';
$string['restorestage64'] = 'Completar';
$string['restorestage64action'] = 'Continuar';
$string['restorestage8'] = 'Esquema';
$string['restorestage8action'] = 'Siguiente';
$string['restoretarget'] = 'Destino de la restauración';
$string['restoretocourse'] = 'Restaurar al curso:';
$string['restoretocurrentcourse'] = 'Restaurar en este curso';
$string['restoretocurrentcourseadding'] = 'Fusionar la copia de seguridad con este curso';
$string['restoretocurrentcoursedeleting'] = 'Borrar el contenido del curso actual y después restaurar';
$string['restoretoexistingcourse'] = 'Restaurar en un curso existente';
$string['restoretoexistingcourseadding'] = 'Fusionar la copia de seguridad del curso con el curso existente';
$string['restoretoexistingcoursedeleting'] = 'Borrar el contenidodel curso actual y después restaurar';
$string['restoretonewcourse'] = 'Restaurar como curso nuevo';
$string['restoringcourse'] = 'Restauración del curso iniciada';
$string['restoringcourseshortname'] = 'restaurando';
$string['rootenrolmanual'] = 'Restaurar como matriculaciones manuales';
$string['rootsettingactivities'] = 'Incluir actividades';
$string['rootsettinganonymize'] = 'Hacer anónima la información de usuario';
$string['rootsettingbadges'] = 'Incluir insignias';
$string['rootsettingblocks'] = 'Incluir bloques';
$string['rootsettingcalendarevents'] = 'Incluir eventos del calendario';
$string['rootsettingcomments'] = 'Incluir comentarios';
$string['rootsettingfilters'] = 'Incluir filtros';
$string['rootsettinggradehistories'] = 'Incluir historial de calificaciones';
$string['rootsettingimscc1'] = 'Convertir a IMS Common Cartridge 1.0';
$string['rootsettingimscc11'] = 'Convertir a IMS Common Cartridge 1.1';
$string['rootsettinglogs'] = 'Incluir archivos "log" de cursos';
$string['rootsettingquestionbank'] = 'Incluir banco de preguntas';
$string['rootsettingroleassignments'] = 'Incluir asignaciones de rol de usuario';
$string['rootsettings'] = 'Configuración de la copia de seguridad';
$string['rootsettingusers'] = 'Incluir usuarios matriculados';
$string['rootsettinguserscompletion'] = 'Incluir detalles del grado de avance del usuario';
$string['sectionactivities'] = 'Actividades';
$string['sectioninc'] = 'Incluido en la copia de seguridad (sin información de usuario)';
$string['sectionincanduser'] = 'Incluido en la copia de seguridad junto con la información del usuario';
$string['selectacategory'] = 'Seleccione una categoría';
$string['selectacourse'] = 'Seleccione un curso';
$string['setting_course_fullname'] = 'Nombre del curso';
$string['setting_course_shortname'] = 'Nombre corto del curso';
$string['setting_course_startdate'] = 'Inicio del curso';
$string['setting_keep_groups_and_groupings'] = 'Mantener los grupos y las agrupaciones actuales';
$string['setting_keep_roles_and_enrolments'] = 'Mantener los roles y matriculaciones actuales';
$string['setting_overwriteconf'] = 'Sobreescribir la configuración del curso';
$string['showtypes'] = 'Mostrar tipo de opciones';
$string['skiphidden'] = 'Pasar por alto cursos ocultos';
$string['skiphiddenhelp'] = 'Elija si desea o no pasar por alto cursos ocultos';
$string['skipmodifdays'] = 'Pasar por alto cursos no modificados desde';
$string['skipmodifdayshelp'] = 'Seleccione para pasar por alto cursos que no han sido modificados desde un número de días';
$string['skipmodifprev'] = 'Pasar por alto cursos no modificados desde copia de seguridad anterior';
$string['skipmodifprevhelp'] = 'Elija si desea o no pasar por alto cursos que no han sido modificados desde la copia de seguridad anterior';
$string['storagecourseandexternal'] = 'Área de ficheros de copia de seguridad y carpeta específica';
$string['storagecourseonly'] = 'Área de archivos de copia de seguridad';
$string['storageexternalonly'] = 'Especifique directorio para las copias de seguridad automáticas';
$string['title'] = 'Título';
$string['totalcategorysearchresults'] = 'Total de categorías: {$a}';
$string['totalcoursesearchresults'] = 'Cursos totales: {$a}';
$string['unnamedsection'] = 'Sección sin nombre';
$string['userinfo'] = 'Información de usuario';
