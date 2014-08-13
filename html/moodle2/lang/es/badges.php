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
 * Strings for component 'badges', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   badges
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Acciones';
$string['activate'] = 'Habilitar acceso';
$string['activatesuccess'] = 'El acceso a las insignias fue activado con éxito.';
$string['addbadgecriteria'] = 'Añadir criterios para las insignias';
$string['addcourse'] = 'Añadir cursos';
$string['addcourse_help'] = 'Seleccionar todos los cursos que deben agregarse a este requisito para la insignia. Mantener pulsada la tecla CTRL para seleccionar varios elementos.';
$string['addcriteria'] = 'Añadir criterio';
$string['addcriteriatext'] = 'Para comenzar a añadir criterios, por favor seleccione una de las opciones del menú desplegable.';
$string['addtobackpack'] = 'Añadir a la mochila';
$string['adminonly'] = 'Esta página está restringida a los administradores del sitio';
$string['after'] = 'después de la fecha de su expedición.';
$string['aggregationmethod'] = 'Método de agregación';
$string['all'] = 'Todas';
$string['allmethod'] = 'Todas las condiciones seleccionadas se cumplen';
$string['allmethodactivity'] = 'Todas las actividades seleccionadas están finalizadas';
$string['allmethodcourseset'] = 'Todos los cursos seleccionados están finalizados';
$string['allmethodmanual'] = 'Todos los roles seleccionados otorgan la insignia';
$string['allmethodprofile'] = 'Todos los campos de perfil seleccionados han sido cumplimentados';
$string['allowcoursebadges'] = 'Habilitar insignias del curso';
$string['allowcoursebadges_desc'] = 'Permitir crear y otrogar insignias en el contexto del curso';
$string['allowexternalbackpack'] = 'Habilitar la conexión a mochilas externas';
$string['allowexternalbackpack_desc'] = 'Permitir a los usuarios configurar conexiones y mostrar insignias de las mochilas de sus proveedores externos.

Nota: Se recomienda dejar esta opción desactivada si no se puede acceder al sitio web desde Internet (por ejemplo, debido al firewall).';
$string['any'] = 'Cualquiera';
$string['anymethod'] = 'Cualquiera de las condiciones se cumple';
$string['anymethodactivity'] = 'Cualquiera de las actividades seleccionada está finalizada';
$string['anymethodcourseset'] = 'Cualquiera de los cursos seleccionados está finalizado';
$string['anymethodmanual'] = 'Cualquiera de los roles seleccionados otorga la insignia';
$string['anymethodprofile'] = 'Cualquiera de los campos de perfil seleccionados ha sido cumplimentado';
$string['attachment'] = 'Adjuntar insignia al mensaje';
$string['attachment_help'] = 'Si se selecciona, se adjuntará una insignia al correo electrónico que se podrá descargar';
$string['award'] = 'Otorgar insignia';
$string['awardedtoyou'] = 'Emitida para mi';
$string['awardoncron'] = 'El acceso a las insignias se activó con éxito. Muchos usuarios pueden ganar simultáneamente esta insignia. Para garantizar el funcionamiento del sitio, esta acción llevará un cierto tiempo de proceso.';
$string['awards'] = 'Destinatarios';
$string['backpackavailability'] = 'Verificación externa de la insignia';
$string['backpackavailability_help'] = 'Para que los receptores de insignias puedan demostrar que han ganado insignias emitidas por usted, un servicio de mochila externo debe poder acceder a su sitio y verificar las insignias emitidas desde aquí.

Su sitio no aparece que sea accesible en este momento, lo que significa que las insignias que ya haya emitido o que se emitan en el futuro no se podrán verificar.

## ¿Por qué me sale este mensaje?

Puede ser que el firewall impida el acceso de usuarios externos a la red, que el sitio esté protegido con contraseña, o que se esté ejecutando el sitio en un equipo que no está disponible en Internet (por ejemplo, una máquina de desarrollo local).

## ¿Es un problema?

Debe solucionar este problema en cada sitio en producción donde vaya a emitir insignias, de lo contrario los destinatarios no serán capaces de probar que han ganado las insignias emitidas por usted

Si su sitio no está activo puede crear y suministrar insignias de prueba, siempre y cuando el sitio sea accesible antes de activarse.

## ¿Qué pasa si no puedo dar acceso público completo a mi sitio?

La única URL necesaria para la verificación es [su-sitio-url]/badges/assertion.php, por lo que si usted puede modificar el firewall para permitir el acceso externo a ese archivo, la verificación de las  insignias seguirá funcionando.';
$string['backpackbadges'] = 'Usted tiene {$a->totalbadges} insignias que se muestran desde {$a->totalcollections} colecciones. <a href="mybackpack.php">Cambiar la configuración de la mochila</a> .';
$string['backpackconnection'] = 'Conexión a la mochila';
$string['backpackconnection_help'] = 'Esta página le permite configurar la conexión a un proveedor externo de mochilas. Conectarse a una mochila le permite mostrar insignias externas dentro de este sitio y subir las insignias ganadas aquí a su mochila.

Actualmente, sólo <a href="http://backpack.openbadges.org">Mochila OpenBadges Mozilla</a> es compatible. Es necesario inscribirse para tener un servicio de mochila antes de tratar de configurar la conexión a la mochila en esta página.';
$string['backpackdetails'] = 'Configuración de la mochila';
$string['backpackemail'] = 'Dirección de correo electrónico';
$string['backpackemail_help'] = 'La dirección de correo electrónico asociada a su mochila. Mientras está conectado, las insignias obtenidas en este sitio se asociarán con esta dirección de correo electrónico.';
$string['backpackimport'] = 'Ajustes de importación de insignias';
$string['backpackimport_help'] = 'Después de establecerse una conexión correcta a la mochila, las insignias de su mochila pueden verse en la página "Mis Badges"  y en su página de perfil.

En esta área, puede seleccionar las colecciones de insignias de su mochila que quiera mostrar  en su perfil.';
$string['badgedetails'] = 'Detalles de la insignia';
$string['badgeimage'] = 'Imagen';
$string['badgeimage_help'] = 'Esta es una imagen que se utilizará cuando se emite esta insignia.

Para agregar una nueva imagen, busque y seleccione una imagen (en formato JPG o PNG) y luego haga clic en "Guardar cambios". La imagen se recorta y cambia de tamaño para ajustarse a los requisitos de la imagen de la insignia.';
$string['badgeprivacysetting'] = 'Configuración de privacidad de la insignia';
$string['badgeprivacysetting_help'] = 'Las insignias que usted gane se pueden mostrar en su página de perfil de cuenta. Este ajuste le permite mostrar automáticamente las insignias reciéntemente ganadas.

Puede controlar la configuración de privacidad de las insignias individuales en la página "Mis insignias".';
$string['badgeprivacysetting_str'] = 'Mostrar automáticamente en mi página de perfil las insignias que he ganado';
$string['badgesalt'] = 'Salado hash para la dirección de correo electrónica del destinatario';
$string['badgesalt_desc'] = 'Usar un \'hash\' permite que los servicios de mochila confirmen el origen de la insignia sin tener que mostrar su dirección de correo electrónico. Este ajuste debe utilizar solo números y letras.

Observación: Con fines de verificación de los receptores, evite cambiar este ajuste una vez que comience la emisión de insignias';
$string['badgesdisabled'] = 'Las insignias no están habilitados en este sitio.';
$string['badgesearned'] = 'Número de insignias conseguidas: {$a}';
$string['badgesettings'] = 'Configuración de las insignias';
$string['badgestatus_0'] = 'No disponible para los usuarios';
$string['badgestatus_1'] = 'Disponible para los usuarios';
$string['badgestatus_2'] = 'No disponible para los usuarios';
$string['badgestatus_3'] = 'Disponible para los usuarios';
$string['badgestatus_4'] = 'Archivado';
$string['badgestoearn'] = 'Número de insignias disponibles: {$a}';
$string['badgesview'] = 'Insignias de curso';
$string['badgeurl'] = 'Enlace a la insignia emitida';
$string['bawards'] = 'Destinatarios ({$a})';
$string['bcriteria'] = 'Criterio';
$string['bdetails'] = 'Editar detalles';
$string['bmessage'] = 'Mensajes';
$string['boverview'] = 'Visión global';
$string['bydate'] = 'finalizado antes de';
$string['clearsettings'] = 'Eliminar ajustes';
$string['completioninfo'] = 'Esta insignia fue emitida al finalizar:';
$string['completionnotenabled'] = 'La finalización del curso no está habilitada en este curso, por lo que no puede incluirse en los criterios de la insignia. La finalización del curso puede habilitarse en la configuración del curso.';
$string['configenablebadges'] = 'Si se habilita, esta característica le permitira crear insignias y otorgarlas a los usuarios del sitio.';
$string['configuremessage'] = 'Mensaje de la insignia';
$string['connect'] = 'Conectar';
$string['connected'] = 'Conectado';
$string['connecting'] = 'Conectando....';
$string['contact'] = 'Contacto';
$string['contact_help'] = 'Una dirección de correo electrónico asociada al emisor de la insignia.';
$string['copyof'] = 'Copia de {$a}';
$string['coursebadges'] = 'Insignias';
$string['coursebadgesdisabled'] = 'Las insignias de curso no están habilitadas en este sitio.';
$string['coursecompletion'] = 'Los estudiantes deben finalizar este curso.';
$string['create'] = 'Nueva insignia';
$string['createbutton'] = 'Crear insignia';
$string['creatorbody'] = '<p> {$a->user} ha completado todos los requisitos de la insignia y ha sido galardonado con esta insignia. Ver insignias emitidas en {$a->link} </p>';
$string['creatorsubject'] = '¡\'{$a}\' ha sido galardonado!';
$string['criteria_0'] = 'Esta insignia se concede cuando...';
$string['criteria_1'] = 'Finalización de la actividad';
$string['criteria_1_help'] = 'Permite que una insignia se conceda a los usuarios en base a la realización de un conjunto de actividades dentro de un curso.';
$string['criteria_2'] = 'Concesión manual por rol';
$string['criteria_2_help'] = 'Permite que una insignia se conceda a los usuarios de forma manual por los usuarios que tienen un rol particular en el sitio o en el curso.';
$string['criteria_3'] = 'Participación social';
$string['criteria_3_help'] = 'Social';
$string['criteria_4'] = 'Finalización del curso';
$string['criteria_4_help'] = 'Permite que una insignia se conceda a los usuarios que hayan completado el curso. Este criterio puede tener parámetros adicionales como una calificación mínima y la fecha de finalización del curso.';
$string['criteria_5'] = 'Finalización de una serie de cursos';
$string['criteria_5_help'] = 'Permite que una insignia se conceda a los usuarios que han completado una serie de cursos. Cada curso puede tener parámetros adicionales como una calificación mínima y la fecha de finalización del curso.';
$string['criteria_6'] = 'Cumplimentación del perfil';
$string['criteria_6_help'] = 'Permite que una insignia se conceda a los usuarios que han cumplimentado ciertos campos en su perfil personal.  Puede elegir entre los campos de perfil personalizados y los campos de perfil predeterminados.';
$string['criteriacreated'] = 'Criterio de insignia creado correctamente';
$string['criteriadeleted'] = 'Criterio de insignia eliminado correctamente';
$string['criteria_descr'] = 'Los estudiantes son galardonados con esta insignia cuando han cumplido el siguiente requisito:';
$string['criteria_descr_0'] = 'A los estudiantes se les concede esta insignia cuando finalizan <strong>{$a}</strong> de los requisitos enumerados.';
$string['criteria_descr_1'] = '<strong>{$a}</strong> de las siguientes actividades se han finalizado:';
$string['criteria_descr_2'] = 'Esta insignia debe ser otorgada por los usuarios con <strong>{$a}</strong> de los siguientes roles:';
$string['criteria_descr_4'] = 'Los usuarios deben finalizar el curso';
$string['criteria_descr_5'] = '<strong>{$a}</strong> de los siguientes cursos han sido finalizados:';
$string['criteria_descr_6'] = '<strong>{$a}</strong> de los siguientes campos de perfil de usuario han sido cumplimentados:';
$string['criteria_descr_bydate'] = 'antes de <em>{$a}</em>';
$string['criteria_descr_grade'] = 'con calificación mínima de <em>{$a}</em>';
$string['criteria_descr_short0'] = 'Finalizados <strong>{$a}</strong> de:';
$string['criteria_descr_short1'] = 'Finalizados <strong>{$a}</strong> de:';
$string['criteria_descr_short2'] = 'Otorgados <strong>{$a}</strong> de:';
$string['criteria_descr_short4'] = 'Finalice el curso';
$string['criteria_descr_short5'] = 'Finalizados <strong>{$a}</strong> de:';
$string['criteria_descr_short6'] = 'Finalizados <strong>{$a}</strong> de:';
$string['criteria_descr_single_1'] = 'La siguiente actividad no se ha finalizado:';
$string['criteria_descr_single_2'] = 'Esta insignia debe ser otorgada por un usuario con el siguiente rol:';
$string['criteria_descr_single_4'] = 'Los usuarios deben finalizar el curso';
$string['criteria_descr_single_5'] = 'Finalizar los siguientes cursos:';
$string['criteria_descr_single_6'] = 'Los asiguientes campos de perfil de usuario deben cumplimentarse:';
$string['criteria_descr_single_short1'] = 'Finalizado:';
$string['criteria_descr_single_short2'] = 'Otorgado por:';
$string['criteria_descr_single_short4'] = 'Finalizar el curso';
$string['criteria_descr_single_short5'] = 'Finalizado:';
$string['criteria_descr_single_short6'] = 'Finalizado:';
$string['criteriasummary'] = 'Resumen de criterios';
$string['criteriaupdated'] = 'Criterio de insignia actualizado correctamente';
$string['criterror'] = 'Incidencias con parámetros actuales';
$string['criterror_help'] = 'Este conjunto de campos muestra todos los parámetros que inicialmente se añadieron a los requisitos de la insignia, pero que ya no están disponibles. Se recomienda que estos parámetros se desactiven para asegurarse de que los estudiantes puedan obtener esta insignia en el futuro.';
$string['currentimage'] = 'Imagen actual';
$string['currentstatus'] = 'Estado actual:';
$string['dateawarded'] = 'Fecha de la emisión';
$string['dateearned'] = 'Fecha: {$a}';
$string['day'] = 'Día(s)';
$string['deactivate'] = 'Deshabilitar acceso';
$string['deactivatesuccess'] = 'El acceso a las insignias se ha desactivado con éxito.';
$string['defaultissuercontact'] = 'Datos de contacto del emisor de la insignia por defecto';
$string['defaultissuercontact_desc'] = 'Una dirección de correo electrónico asociada al emisor de la insignia.';
$string['defaultissuername'] = 'Nombre del emisor de la insignia por defecto';
$string['defaultissuername_desc'] = 'Nombre del agente o autoridad emisora';
$string['delbadge'] = 'Borrar insignia';
$string['delconfirm'] = '¿Está seguro de que quieres eliminar la insignia \'{$a}\'?';
$string['delcritconfirm'] = '¿Estás seguro de que quiere eliminar este criterio?';
$string['delparamconfirm'] = '¿Estás seguro de que quiere eliminar este parámetro?';
$string['description'] = 'Descripción';
$string['disconnect'] = 'Desconectar';
$string['donotaward'] = 'En este momento, esta insignia no está activa, por lo que no se puede conceder a los usuarios. Si usted desea otorgar esta insignia, ponga su estado en activo.';
$string['editsettings'] = 'Editar configuración';
$string['enablebadges'] = 'Habilitar insignias';
$string['error:backpackdatainvalid'] = 'Los datos devueltos por la mochila no son válidos.';
$string['error:backpackemailnotfound'] = 'La dirección de correo \'{$a}\' no está asociada a una mochila. Es necesario <a href="http://backpack.openbadges.org">crear una mochila</a> para esa cuenta o iniciar sesión con otra dirección de correo electrónico.';
$string['error:backpackloginfailed'] = 'No puede estar conectado a una mochila externa por la siguiente razón: {$a}';
$string['error:backpacknotavailable'] = 'Su sitio no es accesible a través de Internet, por lo que cualquier insignia emitida en este sitio no puede ser verificada por los servicios de mochila externos';
$string['error:backpackproblem'] = 'Hay un problema al conectar a su proveedor de servicios de mochila. Por favor, inténtelo de nuevo más tarde.';
$string['error:badjson'] = 'El intento de conexión devolvió datos no válidos.';
$string['error:cannotact'] = 'No se puede activar la insignia.';
$string['error:cannotawardbadge'] = 'No se puede conceder la insignia a un usuario.';
$string['error:clone'] = 'No se puede clonar la insignia';
$string['error:connectionunknownreason'] = 'La conexión no tuvo éxito, pero no se conoce el motivo.';
$string['error:duplicatename'] = 'Una insignia con ese nombre ya existe en el sistema.';
$string['error:externalbadgedoesntexist'] = 'Insignia no encontrada';
$string['error:guestuseraccess'] = 'Usted está empleando un acceso de invitado. Para poder ver las insignias necesita entrar con su cuenta de usuario.';
$string['error:invalidbadgeurl'] = 'Formato de URL del emisor de la insignia no válido';
$string['error:invalidcriteriatype'] = 'Tipo de criterio no válido';
$string['error:invalidexpiredate'] = 'La fecha de expiración deberá ser una fecha futura';
$string['error:invalidexpireperiod'] = 'El periodo de expiración no puede ser negativo o igual a cero';
$string['error:noactivities'] = 'No hay actividades con criterios de finalización habilitados en este curso';
$string['error:noassertion'] = 'No hay confirmación por parte de Persona. Es posible que haya cerrado el cuadro de diálogo antes de completar el proceso de inicio de sesión.';
$string['error:nocourses'] = 'La finalización del curso no está habilitada en ninguno de los cursos de este sitio, por lo que ninguno se mostrará. Puede habilitar la finalización del curso en la configuración del curso.';
$string['error:nogroups'] = '<p> No hay colecciones públicas de insignias disponibles en su mochila. </p><p> Sólo se muestran las colecciones públicas, <a href="http://backpack.openbadges.org">visite la mochila</a> para crear algunas colecciones públicas. </p>';
$string['error:nopermissiontoview'] = 'No tiene permisos para ver los destinatarios de la insignia';
$string['error:nosuchbadge'] = 'La insignia con id {$a} no existe.';
$string['error:nosuchcourse'] = 'Advertencia: Este curso ya no está disponible.';
$string['error:nosuchfield'] = 'Advertencia: este campo de perfil de usuario ya no está disponible.';
$string['error:nosuchmod'] = 'Advertencia: Esta actividad ya no está disponible.';
$string['error:nosuchrole'] = 'Advertencia: Este rol ya no está disponible.';
$string['error:nosuchuser'] = 'El usuario con esta dirección de correo electrónico no tiene una cuenta con el proveedor de mochila actual';
$string['error:notifycoursedate'] = 'Advertencia: Las insignias asociadas con la finalización del curso y con la finalización de actividades no se emitirán hasta la fecha de inicio del curso.';
$string['error:parameter'] = 'Advertencia: Al menos un parámetro debe seleccionarse para asegurar el flujo de trabjo correcto para la entrega de la insignia.';
$string['error:personaneedsjs'] = 'En este momento se requiere Javascript para conectarse a su mochila. Si puede, active JavaScript y recargue la página.';
$string['error:requesterror'] = 'La solicitud de conexión ha fallado (código de error {$a}).';
$string['error:requesttimeout'] = 'Terminó el tiempo de solicitud de conexión antes de que esta se pudiera llevar a cabo.';
$string['error:save'] = 'No se puede guardar la insignia';
$string['error:userdeleted'] = '{$a->user} (Este usuario ya no existe en {$a->site})';
$string['evidence'] = 'Evidencia';
$string['existingrecipients'] = 'Destinatarios de insignias existentes';
$string['expired'] = 'Expirada';
$string['expiredate'] = 'Esta insignia expira en {$a}.';
$string['expireddate'] = 'Esta insignia expira en {$a}.';
$string['expireperiod'] = 'Esta insignia expira {$a} días después de haber sido expedida.';
$string['expireperiodh'] = 'Esta insignia expira {$a} horas después de haber sido expedida.';
$string['expireperiodm'] = 'Esta insignia expira {$a} minutos después de haber sido expedida.';
$string['expireperiods'] = 'Esta insignia expira {$a} segundos después de haber sido expedida.';
$string['expirydate'] = 'Fecha de expiración';
$string['expirydate_help'] = 'Opcionalmente, las insignias pueden caducar en una fecha determinada, o en una fecha calculada a partir de la fecha en que se entregó al usuario.';
$string['externalbadges'] = 'Mis insignias de otros sitios web';
$string['externalbadges_help'] = 'En esta área se muestran las insignias de la mochila externa.';
$string['externalbadgesp'] = 'Insignias de otros sitios web';
$string['externalconnectto'] = 'Para mostrar las insignias externas necesita <a href="{$a}">conectarse a una mochila</a> .';
$string['fixed'] = 'Fecha fija';
$string['hidden'] = 'Oculto';
$string['hiddenbadge'] = 'Por desgracia, el propietario de la insignia no ha publicado esta información.';
$string['issuancedetails'] = 'Caducidad de la insignia';
$string['issuedbadge'] = 'Información de la insignia emitida';
$string['issuerdetails'] = 'Detalles del emisor';
$string['issuername'] = 'Nombre del emisor';
$string['issuername_help'] = 'Nombre del agente o autoridad emisora';
$string['issuerurl'] = 'URL del emisor';
$string['localbadges'] = 'Mis insignias del sitio web {$a}';
$string['localbadgesh'] = 'Mis insignias de este sitio web';
$string['localbadgesh_help'] = 'Todas los insignias conseguidas en este sitio web por finalizar cursos, actividades de los cursos y otros requisitos.

Aquí puede gestionar sus insignias haciéndolas públicas o privadas en su página de perfil.

Puede descargar todas sus insignias o cada una por separado y guardarlas en su ordenador. Las insignias descargadas pueden añadirse a su servicio de mochila externo.';
$string['localbadgesp'] = 'Insignias de {$a}:';
$string['localconnectto'] = 'Para compartir estas insignias fuera de este sitio web es necesario <a href="{$a}">conectarse a una mochila</a> .';
$string['makeprivate'] = 'hacer privado';
$string['makepublic'] = 'Hacer público';
$string['managebadges'] = 'Gestionar insignias';
$string['message'] = 'Cuerpo del mensaje';
$string['messagebody'] = '<p> ¡Se le ha otorgado una insignia "% badgename%"! </p>
<p> Puede encontrar más información sobre esta insignia en %badgelink%. </p>
<p> Si no encuentra la insignia adjunta a este correo electrónico, puede gestionarla y descargarla de la página {$a}. </p>';
$string['messagesubject'] = '¡Felicitaciones, acaba de ganar una insignia!';
$string['method'] = 'Este criterio se cumple cuando...';
$string['mingrade'] = 'Calificación mínima requerida';
$string['month'] = 'Mes(es)';
$string['mybackpack'] = 'Configuración de Mi mochila';
$string['mybadges'] = 'Mis insignias';
$string['never'] = 'Nunca';
$string['newbadge'] = 'Añadir una nueva insignia';
$string['newimage'] = 'Nueva imagen';
$string['noawards'] = 'Esta insignia aún no se ha ganado.';
$string['nobackpack'] = 'No hay servicio de mochila conectada a esta cuenta. <br/>';
$string['nobackpackbadges'] = 'No hay insignias en la colección que ha seleccionado. <a href="mybackpack.php">Añadir más colecciones</a>';
$string['nobackpackcollections'] = 'No se ha seleccionado una colección de insignias. <a href="mybackpack.php">Añadir colección</a>.';
$string['nobadges'] = 'No hay insignias disponibles';
$string['nocriteria'] = 'Los criterios para esta insignia no se han establecido todavía.';
$string['noexpiry'] = 'Esta insignia no tiene fecha de expiración.';
$string['noparamstoadd'] = 'No hay parámetros adicionales disponibles para añadir a este requerimieto de la insignia.';
$string['notacceptedrole'] = 'Su rol asignado actualmente no es uno de los roles que pueden emitir manualmente esta insignia. <br/>
Si quiere ver los usuarios que ya han ganado esta insignia, puede visitar la página {$a}.';
$string['notconnected'] = 'No conectado';
$string['nothingtoadd'] = 'No existen criterios disponibles para añadir.';
$string['notification'] = 'Notificar al creador de la insignia';
$string['notification_help'] = 'Este ajuste gestiona las notificaciones enviadas a un creador de insignias para hacerles saber que la insignia ha sido emitida.

Las siguientes opciones están disponibles:

* **NUNCA** - No enviar notificaciones.

* **SIEMPRE** - Enviar una notificación cada vez que se concede esta insignia.

* **DIARIAMENTE** - Enviar notificaciones una vez al día.

* **SEMANALMENTE** - Enviar notificaciones una vez a la semana.

*** MENSUALMENTE** - Enviar notificaciones una vez al mes.';
$string['notifydaily'] = 'Dirariamente';
$string['notifyevery'] = 'Siempre';
$string['notifymonthly'] = 'Mensualmente';
$string['notifyweekly'] = 'Semanalmente';
$string['numawards'] = 'Esta insignia ha sido emitida para <a href="{$a->link}">{$a->count}</a> usuario(s).';
$string['numawardstat'] = 'Esta insignia ha sido emitida para {$a} usuario (s).';
$string['overallcrit'] = 'de los criterios seleccionados se cumple.';
$string['personaconnection'] = 'Inicie sesión con su dirección de email';
$string['personaconnection_help'] = 'Persona es un sistema para su identificación en la web, usando una dirección de correo electrónico de su propiedad. La mochila de Open Badges utiliza Persona como sistema de inicio de sesión, por lo que para conectarse a una mochila necesita una cuenta de Persona. Para obtener más información acerca de Persona visite <a href="https://login.persona.org/about">https://login.persona.org/about</a> .';
$string['potentialrecipients'] = 'Potenciales destinatarios de la insignia';
$string['recipientdetails'] = 'Detalles del destinatario';
$string['recipientidentificationproblem'] = 'No se puede encontrar un destinatario de esta insignia entre los usuarios existentes.';
$string['recipients'] = 'Destinatarios de la insignia';
$string['recipientvalidationproblem'] = 'El usuario actual no puede verificarse como receptor de esta insignia.';
$string['relative'] = 'Fecha relativa';
$string['requiredcourse'] = 'Al menos un curso debe ser añadido al grupo de criterios de curso';
$string['reviewbadge'] = 'Cambios en el acceso insignia';
$string['reviewconfirm'] = '<p> Con esto, hará que su insignia sea visible para los usuarios y les permita empezar a ganarla</p>

<p> Es posible que algunos usuarios ya cumplan los criterios de esta insignia y que se les entregue inmediatamente después de que la haya activado. </p>

<p> Una vez que la insignia haya sido emitida será <strong>bloqueada</strong> - ciertos ajustes incluyendo los criterios y los ajustes de caducidad ya no se podrán modificar. </p>

<p> ¿Está seguro de que desea permitir el acceso a la insignia \'{$a}\'? </p>';
$string['save'] = 'Guardar';
$string['searchname'] = 'Buscar por nombre';
$string['selectaward'] = 'Por favor, seleccione el rol que le gustaría usar para otorgar esta insignia:';
$string['selectgroup_end'] = 'Sólo se muestran las colecciones públicas, <a href="http://backpack.openbadges.org">visite su mochila</a> para crear más colecciones públicas.';
$string['selectgroup_start'] = 'Seleccione las colecciones de la mochila que se mostrarán en este sitio:';
$string['selecting'] = 'Con insignias seleccionadas ...';
$string['setup'] = 'Configurar conexión';
$string['signinwithyouremail'] = 'Inicie sesión con su dirección de email';
$string['sitebadges'] = 'Insignias del sitio';
$string['sitebadges_help'] = 'Las insignias del sitio sólo pueden ser otorgadas a los usuarios de las actividades relacionadas con el sitio. Estos incluyen completar una serie de cursos o partes de los perfiles de usuario. Las insignias del sitio también pueden ser emitidas manualmente por un usuario para otro.

La insignias para las actividades relacionadas con los cursos deben ser creados a nivel de curso. Las insignias de curso se pueden encontrar en Administración >  Insignias';
$string['status'] = 'Estado de la insignia';
$string['status_help'] = 'El estado de una insignia determina su comportamiento en el sistema:

* ** DISPONIBLE ** - Significa que esta insignia puede ser ganada por los usuarios. Mientras que una insignia está disponible para los usuarios, los criterios no pueden ser modificados.

* ** NO DISPONIBLE ** - Significa que esta insignia no está disponible para los usuarios y no se puede ganar o emitir manualmente. Si dicha insignia no ha sido emitida antes, los criterios pueden cambiarse.

Una vez que una insignia ha sido emitida por lo menos para un usuario, pasa automáticamente a **BLOQUEADA**.  Los usuarios pueden ontener insignias bloqueadas,  pero sus criterios ya no se pueden cambiar. Si necesita modificar detalles o criterios de una insignia bloqueada, puede duplicar esta insignia y hacer todos los cambios necesarios.

* ¿Por qué bloqueamos insignias? *

Para asegurarnos de que todos los usuarios tengan los mismos requisitos para ganar una insignia. En este momento, no es posible revocar insignias. Si permitimos que los requisitos de las insignias se puedan modificar en cualquier momento, lo más probable es que al final usuarios que tienen la misma insignia hayan tenido que satisfacer requisitos completamente diferentes.';
$string['statusmessage_0'] = 'Esta insignia no está en este momento disponible para los usuarios. Habilite el acceso si desea que los usuarios puedan ganar esta insignia.';
$string['statusmessage_1'] = 'Esta insignia está en este momento disponible para los usuarios. Deshabilite el acceso para hacer cualquier cambio.';
$string['statusmessage_2'] = 'Esta insignia no está en este momento disponible para los usuarios, y los criterios están bloqueados. Habilite el acceso si desea que los usuarios puedan ganar esta insignia.';
$string['statusmessage_3'] = 'Esta insignia está en este momento disponible para los usuarios y sus criterios están bloqueados';
$string['statusmessage_4'] = 'Esta insignia está en este momento archivada';
$string['subject'] = 'Asunto del mensaje';
$string['variablesubstitution'] = 'Sustitución de variables en los mensajes.';
$string['variablesubstitution_help'] = 'En un mensaje de insignia, ciertas variables se pueden insertar en el asunto y/o en el cuerpo del mensaje para que puedan ser sustituidas por valores reales cuando se envía el mensaje. Las variables deben insertarse en el el texto tal y como se muestra a continuación. Se pueden utilizar las siguientes variables:

%badgename%
: será reemplazado por el nombre completo de la insignia.

%username%
: será reemplazado por el nombre completo del destinatario.

%badgelink%
: será reemplazado por el URL pública con información sobre la insignia emitida.';
$string['viewbadge'] = 'Ver insignia emitida';
$string['visible'] = 'Visible';
$string['warnexpired'] = '(¡Esta insignia ha expirado!)';
$string['year'] = 'Año(s)';
