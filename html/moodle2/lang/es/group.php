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
 * Strings for component 'group', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   group
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addedby'] = 'Agregado por {$a}';
$string['addgroup'] = 'Agregar usuarios al grupo';
$string['addgroupstogrouping'] = 'Agregar grupos al agrupamiento';
$string['addgroupstogroupings'] = 'Agregar/quitar grupos';
$string['adduserstogroup'] = 'Agregar/quitar usuarios';
$string['allocateby'] = 'Asignar miembros';
$string['anygrouping'] = '[Cualquier agrupamiento]';
$string['autocreategroups'] = 'Crear grupos automáticamente';
$string['backtogroupings'] = 'Regresar a agrupamientos';
$string['backtogroups'] = 'Regresar a los grupos';
$string['badnamingscheme'] = 'Debe contener exactamente un carácter \'@\' o \'#\'';
$string['byfirstname'] = 'Alfabéticamente por nombre y apellido';
$string['byidnumber'] = 'Alfabéticamente por número de ID';
$string['bylastname'] = 'Alfabéticamente por apellido y nombre';
$string['createautomaticgrouping'] = 'Crear agrupamiento automático';
$string['creategroup'] = 'Crear grupo';
$string['creategrouping'] = 'Crear agrupamiento';
$string['creategroupinselectedgrouping'] = 'Crear grupo en agrupamiento';
$string['createingrouping'] = 'Agrupación de grupos creados automáticamente';
$string['createorphangroup'] = 'Crear un grupo huérfano';
$string['databaseupgradegroups'] = 'La versión de grupos es ahora {$a}';
$string['defaultgrouping'] = 'Agrupamiento por defecto';
$string['defaultgroupingname'] = 'Agrupamiento';
$string['defaultgroupname'] = 'Grupo';
$string['deleteallgroupings'] = 'Eliminar todos los agrupamientos';
$string['deleteallgroups'] = 'Eliminar todos los grupos';
$string['deletegroupconfirm'] = '¿Está seguro de que desea eliminar el grupo \'{$a}\'?';
$string['deletegrouping'] = 'Eliminar agrupamiento';
$string['deletegroupingconfirm'] = '¿Está seguro de que desea eliminar el conjunto \'{$a}\'? (Los grupos no se eliminarán).';
$string['deletegroupsconfirm'] = '¿Está seguro de que quiere eliminar a los grupos siguientes?';
$string['deleteselectedgroup'] = 'Eliminar grupo seleccionado';
$string['editgroupingsettings'] = 'Editar ajustes de agrupamiento';
$string['editgroupsettings'] = 'Editar ajustes de grupo';
$string['enrolmentkey'] = 'Clave de matriculación';
$string['enrolmentkey_help'] = 'Una clave de acceso permite que el acceso al curso esté limitado sólo a aquellos que conocen la clave. Si se especifica una clave de acceso grupal, entonces dicha clave no sólo permitirá a los usuarios entrar al curso, sino que los hará miembros del grupo.';
$string['erroraddremoveuser'] = 'Error al agregar/quitar al usuario {$a} del grupo';
$string['erroreditgroup'] = 'Error al crear o actualizar el grupo {$a}';
$string['erroreditgrouping'] = 'Error al crear o actualizar el agrupamiento {$a}';
$string['errorinvalidgroup'] = 'Error, grupo {$a} no válido';
$string['errorremovenotpermitted'] = 'Usted no tiene permiso para remover al miembro del grupo {$a} que fue añadido automáticamente';
$string['errorselectone'] = 'Por favor, seleccione un solo grupo antes de elegir esta opción';
$string['errorselectsome'] = 'Por favor, seleccione uno o más grupos antes de elegir esta opción';
$string['evenallocation'] = 'Nota: Para conservar constante la asignación de usuarios, el número real de miembros por grupo difiere del número que usted ha especificado.';
$string['event_group_created'] = 'Grupo creado';
$string['event_group_deleted'] = 'Grupo eliminado';
$string['event_grouping_created'] = 'Grupo creado';
$string['event_grouping_deleted'] = 'Grupo eliminado';
$string['event_grouping_updated'] = 'Grupo actualizado';
$string['event_group_member_added'] = 'Miembro del grupo añadido';
$string['event_group_member_removed'] = 'Miembro del grupo eliminado';
$string['event_group_updated'] = 'Grupo actualizado';
$string['existingmembers'] = 'Miembros existentes: {$a}';
$string['filtergroups'] = 'Filtrar grupos por:';
$string['group'] = 'Grupo';
$string['groupaddedsuccesfully'] = 'Grupo {$a} agregado con éxito';
$string['groupaddedtogroupingsuccesfully'] = 'El grupo {$a->groupname} se añadió al agrupamiento {$a->groupingname} con éxito';
$string['groupby'] = 'Basado en creación automática';
$string['groupdescription'] = 'Descripción del grupo';
$string['groupinfo'] = 'Información sobre el grupo seleccionado';
$string['groupinfomembers'] = 'Información sobre los miembros seleccionados';
$string['groupinfopeople'] = 'Información sobre las personas seleccionadas';
$string['grouping'] = 'Agrupamiento';
$string['groupingaddedsuccesfully'] = 'Agrupamiento {$a} añadido con éxito';
$string['groupingdescription'] = 'Descripción del agrupamiento';
$string['grouping_help'] = 'Un agrupamiento es un conjunto de grupos dentro de un curso. Si se selecciona un agrupamiento, los usuarios asignados a los grupos dentro del agrupamiento podrán trabajar juntos.';
$string['groupingname'] = 'Nombre del agrupamiento';
$string['groupingnameexists'] = 'El nombre de agrupamiento {$a} ya existe en este curso. Por favor, elija otro.';
$string['groupings'] = 'Agrupamientos';
$string['groupingsection'] = 'Acceso agrupamientos';
$string['groupingsection_help'] = 'Un agrupamiento es una colección de grupos dentro de un curso. Si aquí se selecciona un agrupamiento, solamente los estudiantes asignados a grupos incluídos en este agrupamiento tendrán acceso a la sección.';
$string['groupingsonly'] = 'Sólo agrupamientos';
$string['groupmember'] = 'Miembro del Grupo';
$string['groupmemberdesc'] = 'Rol estándar de un miembro de grupo.';
$string['groupmembers'] = 'Miembros del grupo';
$string['groupmembersonly'] = 'Sólo disponible para miembros del agrupamiento';
$string['groupmembersonlyerror'] = 'Lo sentimos, debe ser miembro de al menos un grupo que sea usado en esta actividad.';
$string['groupmembersonly_help'] = 'Si se marca la casilla, la actividad (o recurso) únicamente estará disponible para los estudiantes asignados a los grupos dentro del agrupamiento seleccionado.';
$string['groupmemberssee'] = 'Ver los integrantes del grupo';
$string['groupmembersselected'] = 'Miembros del grupo seleccionado';
$string['groupmode'] = 'Modo de grupo';
$string['groupmodeforce'] = 'Forzar el modo de grupo';
$string['groupmodeforce_help'] = 'Si se fuerza el modo grupo, entonces el modo de grupo en el curso se aplica a todas las actividades del curso. En ese caso se pasan por alto los ajustes del modo de grupo.';
$string['groupmode_help'] = '<p>El modo grupo puede ser de alguno de estos tres niveles:
   <ul>
      <li>Sin grupos - No hay grupos, todos son parte de una gran comunidad.</li>
      <li>Grupos separados - Cada estudiante sólo puede ver su propio grupo; los demás son invisibles</li>
      <li>Grupos visibles - Cada estudiante trabaja dentro de su grupo, pero también puede ver a los otros grupos</li>
   </ul>
</p>

<p>El modo grupo puede ser definido a dos niveles:</p>

<dl>
   <dt><b>1. Nivel Curso</b></dt>
   <dd>El modo grupal definido a nivel de curso viene por defecto para todas las actividades definidas dentro del curso<br /><br /></dd>
   <dt><b>2. Nivel Actividad</b></dt>
   <dd>Toda actividad que soporte grupos puede definir su propio modo de agrupación. Si el curso está configurado como  "<a href="help.php?module=moodle&file=groupmodeforce.html">forzar modo de grupo</a>" entonces no se tendrá en cuenta la configuración de cada actividad.</dd>
</dl>';
$string['groupmy'] = 'Mi grupo';
$string['groupname'] = 'Nombre del grupo';
$string['groupnameexists'] = 'El nombre de grupo \'{$a}\' ya existe en este curso; por favor, elija otro.';
$string['groupnotamember'] = 'Lo sentimos, usted no es miembro de ese grupo';
$string['groups'] = 'Grupos';
$string['groupscount'] = 'Grupos ({$a})';
$string['groupsettingsheader'] = 'Grupos';
$string['groupsgroupings'] = 'Grupos &amp; agrupamientos';
$string['groupsinselectedgrouping'] = 'Grupos en:';
$string['groupsnone'] = 'No hay grupos';
$string['groupsonly'] = 'Sólo grupos';
$string['groupspreview'] = 'Visualización previa de grupos';
$string['groupsseparate'] = 'Grupos separados';
$string['groupsvisible'] = 'Grupos visibles';
$string['grouptemplate'] = 'Grupo @';
$string['hidepicture'] = 'Ocultar imagen';
$string['importgroups'] = 'Importar grupos';
$string['importgroups_help'] = 'Los grupos pueden ser importados mediante un archivo de texto. El formato del archivo debe como sigue:

* Cada línea del archivo contiene un registro
* Cada registro es una serie de datos separados por comas
* El primer registro contiene una lista de nombres de campos que definen el formato del resto del archivo
* Es obligatorio el campo de grupo
* Son opcionales los campos descripción, clave de matriculación, fotografía, fotografiá oculta';
$string['javascriptrequired'] = 'Esta página requiere que Javascript esté activado.';
$string['members'] = 'Miembros por grupo';
$string['membersofselectedgroup'] = 'Miembros de:';
$string['namingscheme'] = 'Esquema de denominación';
$string['namingscheme_help'] = 'El símbolo arroba (@) puede usarse para crear grupos con nombres que contienen letras. Por ejemplo, Grupo @ puede generar grupos denominados Grupo A, Grupo B, Grupo C, etc.

El símbolo almohadilla (#) puede usarse para crear grupos con nombres que contienen letras. Por ejemplo, Grupo # puede generar grupos denominados Grupo 1, Grupo 2, Grupo 3, etc.';
$string['newgrouping'] = 'Nueva agrupación';
$string['newpicture'] = 'Nueva imagen';
$string['newpicture_help'] = '<P>Usted puede subir una imagen desde su ordenador al servidor, y esta imagen se
utilizará en varios lugares para identificarlo.
<P>Por este motivo, las mejores imágenes son las de estilo identificación, aunque
puede utilizar la imagen que desee.
<P>La imagen debe ser formato JPG o PNG (lo que significa que el nombre de la imagen
terminará en .jpg o en .png) y debe tener un tamaño de 100 x 100 píxeles o más.
<P>Puede colocar una imagen utilizando uno de estos cuatro métodos:

<OL>
<LI>Utilizando una cámara digital, es muy sencillo, dado que sus fotos seguramente
ya estarán en el formato correcto en su ordenador.
<LI>Utilizando un "scanner" para digitalizar una fotografía impresa. Asegúrese de
guardar la imagen en formato JPG o PNG.
<LI>Si usted es una artista, puede dibujar una imagen utilizando algún programa de diseño.
<LI>También puede conseguir una imagen que lo identifique en la red.
<A TARGET=google HREF="http://images.google.com/">http://images.google.com</A>
es un excelente lugar para buscar imágenes. Una vez encontrada, coloque el cursor
sobre ella y pulsando el botón derecho del ratón elija la opción "Guardar imagen como".
(Diferentes ordenadores pueden variar en este procedimiento)
</OL>

<P>Para subir la imagen, haga clic en el botón "Examinar" en esta página y seleccione
la imagen en su disco duro.
<P>IMPORTANTE: Asegúrese de no subir una imagen que exceda el tamaño
máximo permitido, en bites, pues no se cargará.
<P>Luego haga clic en "Actualizar información personal" en la parte inferior de la página; si la imagen
es mayor a 100 x 100 píxeles se cortará.
<P>Cuando acabe de cambiar su imagen es posible que no vea el cambio; si eso sucede
actualice la página (oprimiendo F5 o el botón actualizar).';
$string['noallocation'] = 'No asignación';
$string['nogrouping'] = 'No agrupar';
$string['nogroups'] = 'Aún no se han formado grupos en este curso';
$string['nogroupsassigned'] = 'No hay grupos asignados';
$string['nopermissionforcreation'] = 'No se puede crear el grupo "{$a}": usted no dispone de los permisos requeridos';
$string['nosmallgroups'] = 'Evitar el último grupo pequeño';
$string['notingrouping'] = '[Fuera de un agrupamiento]';
$string['nousersinrole'] = 'No existen usuarios disponibles en el rol seleccionado';
$string['number'] = 'Número de grupos o miembros por grupo';
$string['numgroups'] = 'Número de grupos';
$string['nummembers'] = 'Miembros por grupo';
$string['overview'] = 'Visión general';
$string['potentialmembers'] = 'Miembros potenciales: {$a}';
$string['potentialmembs'] = 'Miembros potenciales';
$string['printerfriendly'] = 'Mostrar en formato para imprimir';
$string['random'] = 'al azar';
$string['removefromgroup'] = 'Eliminar al usuario del grupo {$a}
';
$string['removefromgroupconfirm'] = '¿Realmente desea eliminar al usuario "{$a->user}" del grupo "{$a->group}"?
';
$string['removegroupfromselectedgrouping'] = 'Eliminar grupo del agrupamiento seleccionado';
$string['removegroupingsmembers'] = 'Quitar todos los grupos de los agrupamientos';
$string['removegroupsmembers'] = 'Quitar todos los miembros de los grupos';
$string['removeselectedusers'] = 'Eliminar usuarios seleccionados';
$string['selectfromrole'] = 'Seleccionar los miembros con rol';
$string['showgroupsingrouping'] = 'Mostrar grupos del conjunto';
$string['showmembersforgroup'] = 'Mostrar miembros del grupo';
$string['toomanygroups'] = 'Usuarios insuficientes para formar este número de grupos (sólo hay {$a} usuarios en el rol seleccionado).';
$string['usercount'] = 'Número de usuarios';
$string['usercounttotal'] = 'Número de usuarios ({$a})';
$string['usergroupmembership'] = 'Afiliación del usuario seleccionado:';
