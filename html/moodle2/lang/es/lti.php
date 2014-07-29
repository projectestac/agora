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
 * Strings for component 'lti', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   lti
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accept'] = 'Aceptar';
$string['accept_grades'] = 'Aceptar calificaciones desde la herramienta';
$string['accept_grades_admin'] = 'Aceptar calificaciones desde la herramienta';
$string['action'] = 'Acción';
$string['active'] = 'Activar';
$string['activity'] = 'Actividad';
$string['addnewapp'] = 'Habilitar aplicación externa';
$string['addserver'] = 'Añadir un nuevo servidor de confianza';
$string['addtype'] = 'Añadir configuración de la herramienta externa';
$string['allow'] = 'Permitir';
$string['allowinstructorcustom'] = 'Permitir a los instructores añadir parámetros personalizados';
$string['always'] = 'Siempre';
$string['automatic'] = 'Automático, basado en la URL de inicio';
$string['baseurl'] = 'URL Base';
$string['basiclti'] = 'LTI';
$string['basicltiactivities'] = 'Actividades LTI';
$string['basiclti_in_new_window'] = 'Su actividad se ha abierto en una nueva ventana';
$string['basicltiintro'] = 'Descripción de la actividad';
$string['basicltiname'] = 'Nombre de la actividad';
$string['basiclti_parameters'] = 'Parámetros de inicio LTI';
$string['comment'] = 'Comentario';
$string['configpassword'] = 'Contraseña de Herramienta Externa por defecto';
$string['configpreferheight'] = 'Altura preferida por defecto';
$string['configpreferwidget'] = 'Ajuste';
$string['configpreferwidth'] = 'Anchura predeterminada';
$string['configresourceurl'] = 'URL del recurso por defecto';
$string['configtoolurl'] = 'URL de la Herramienta Externa por defecto';
$string['configtypes'] = 'Habilitar aplicaciones LTI';
$string['courseid'] = 'Número ID del Curso';
$string['coursemisconf'] = 'El curso está mal configurado';
$string['course_tool_types'] = 'Tipos de herramientas del curso';
$string['createdon'] = 'Creado el';
$string['curllibrarymissing'] = 'La biblioteca PHP Curl debe estar instalada para usar LTI';
$string['custom'] = 'Parámetros personalizados';
$string['custom_config'] = 'Utilizando la herramienta de configuración personalizada.';
$string['custom_help'] = 'Los parámetros personalizados son ajustes utilizados por el proveedor de la herramienta. Por ejemplo, un parámetro personalizado puede ser utilizado para mostrar un recurso específico.

Es seguro dejar este campo sin cambios, salvo indicación del proveedor de la herramienta.';
$string['custominstr'] = 'Parámetros personalizados';
$string['debuglaunch'] = 'Opción de depuración';
$string['debuglaunchoff'] = 'Inicio normal';
$string['debuglaunchon'] = 'Depurar el inicio';
$string['default'] = 'Defecto';
$string['default_launch_container'] = 'Contenedor de inicio por defecto';
$string['delegate'] = 'Delegar al Profesor';
$string['delete'] = 'Borrar';
$string['delete_confirmation'] = '¿Está seguro que quiere eliminar esta configuración de la herramienta externa?';
$string['deletetype'] = 'Eliminar configuración de la herramienta externa';
$string['display_description'] = 'Mostrar la descripción de la actividad cuando se inicia';
$string['display_name'] = 'Nombre para mostrar la actividad cuando se inicia';
$string['donot'] = 'No envíe';
$string['donotaccept'] = 'No acepte';
$string['donotallow'] = 'No permita que';
$string['edittype'] = 'Editar la configuración de la herramienta externa';
$string['embed'] = 'Incrustar';
$string['embed_no_blocks'] = 'Incrustar, sin bloques';
$string['enableemailnotification'] = 'Enviar emails de aviso';
$string['enableemailnotification_help'] = 'Si se activa, los estudiantes recibirán notificación por correo electrónico cuando sus entregas sean calificadas.';
$string['errormisconfig'] = 'Herramienta mal configurada. Por favor, consulte a su administrador de Moodle cómo configurar la herramienta.';
$string['extensions'] = 'Servicios de la extensión LTI';
$string['external_tool_type'] = 'Tipo de herramienta externa';
$string['external_tool_type_help'] = 'El propósito principal de una "configuración de herramientas" es establecer un canal de comunicación seguro entre Moodle y el proveedor de la herramienta También proporciona una oportunidad para establecer configuraciones por defecto e instalar servicios adicionales proporcionados por la herramienta.

* **Automático, basada en Launch URL** - Esta configuración debería ser empleada en la mayoría de los casos. Moodle elegirá la configuración de la utilidad más apropiada      basada en Launch URL. Se usarán herramientas configurada tanto por el administrador como desde el propio curso.
Cuando se especifica Launch URL, Moodle dará información sobre si la reconoce o no. Si Moodle no reconociera Launch URL, entonces deberíaponer los detalles de configuración de la herramienta manualmente.

* **Un tipo específico de herramienta** - Al seleccionar un tipo específico de herramienta, usted puede forzar a Moodle a que emplee esa configuración de herramienta cuando se comunique con el proveedor de la herramienta externa. Si pareciera que la Launch URL no pertenece al proveedor de la herramienta, aparecerá una advertencia. En algunos casos no es necesario proporcionar un Launch URL al emplear un tipo de herramienta específico (si no está invocando un recurso particular dentro del proveedor de la herramienta).

* **Configuración a la medida** - Para ajustar la configuración a la medida solamente en esta instancia, mostrar Opciones Avanzadas, y proporcione usted mismo la clave privada y la clave pública. Si no tiene clave privada y clave pública, puede solicitarlas al proveedor de la herramienta. No todas las herramientas requieren una clave privada y una clave pública; en estos casos los campos pueden dejarse en blanco.

### Edición del Tipo de Herramienta.

Existen tres íconos disponibles en la lista desplegable de Herramienta:

* **Añadir** - Crea una configuración de herramienta a nivel de curso. Todas las instancias de la herramienta externa en este curso pueden emplear esta configuración de herramienta.

* **Editar** - Selecciona un tipo de herramienta a nivel de curso a partir de una lista desplegable y eligiendo después este ícono. Los detalles de la configuración de la herramienta pueden editarse.

* **Borrar** - Elimina el tipo de herramienta del curso seleccionado.';
$string['external_tool_types'] = 'Tipos de herramientas externas';
$string['failedtoconnect'] = 'Moodle fue incapaz de comunicarse con el sistema "{$a}"';
$string['filter_basiclti_configlink'] = 'Configure sus sitios preferidos y sus contraseñas';
$string['filter_basiclti_password'] = 'La contraseña es obligatoria';
$string['filterconfig'] = 'Administración LTI';
$string['filtername'] = 'LTI';
$string['fixexistingconf'] = 'Utilice una configuración existente para la instancia mal configurada';
$string['fixnew'] = 'Nueva configuración';
$string['fixnewconf'] = 'Defina una nueva configuración para la instancia mal configurada';
$string['fixold'] = 'Usar existente';
$string['forced_help'] = 'Este ajuste ha sido configurado a nivel curso o sitio. Es posible que no pueda modificarlo desde esta interfaz.';
$string['force_ssl'] = 'Forzar SSL';
$string['force_ssl_help'] = 'Seleccionando esta opción fuerza a usar SSL en todos los lanzamientos a este proveedor de herramientas.

Además, todas las solicitudes de servicios Web desde el proveedor de la herramienta utilizarán SSL.

Si se utiliza esta opción, asegúrese de que su sitio Moodle y el proveedor de herramientas son compatibles con SSL';
$string['global_tool_types'] = 'Tipos de herramientas globales';
$string['grading'] = 'Rutas de calificación';
$string['icon_url'] = 'URL de icono';
$string['icon_url_help'] = 'La URL de icono permite modificar el icono que se muestra en la lista de cursos para esta actividad. En vez del icono LTI se puede especificar un icono adecuado al tipo de actividad.';
$string['id'] = 'id';
$string['invalidid'] = 'ID de LTI incorrecta';
$string['launch_in_moodle'] = 'Iniciar la herramienta en Moodle';
$string['launchinpopup'] = 'Iniciar el contenedor';
$string['launch_in_popup'] = 'Iniciar la herramienta en ventana emergente (pop-up)';
$string['launchinpopup_help'] = 'El contenedor que inicia la herramienta afecta al modo de visualización en el curso. Algunos contenedores proporcionan más espacio en pantalla y otros proporcionan una apariencia más integrada en Moodle.

**Por defecto** Utiliza el contenedor especificado en la configuración de la herramienta.
**Incrustado** Se muestra en la ventana de Moodle, de forma similar al resto de actividades.
**Incrustado sin bloques** Se muestra en la ventana de Moodle, mostrando sólo los controles de navegación al principio de la página.
**Nueva ventana** Se muestra en ventana nueva usando todo el espacio disponible.
Dependiendo del navegador se abrirá en nueva pestaña o en ventana emergente. Es posible que algunos navegadores o programas bloqueen la apertura en nueva ventana.';
$string['launchoptions'] = 'Opciones de inicio';
$string['launch_url'] = 'URL de inicio';
$string['launch_url_help'] = 'La URL de inicio indica la dirección web de la Herramienta Externa y puede contener información adicional. Si no está seguro que ruta introducir, por favor consulte al proveedor de la misma para más información.

Si ha seleccionado un tipo de herramienta específico, puede no ser necesario especificar una URL de inicio. Si el enlace se utiliza sólo para poner en marcha el sistema del proveedor y no para ir a un recurso específico, es probable que esto sea así.';
$string['lti'] = 'LTI';
$string['lti:addcoursetool'] = 'Calificar actividades LTI';
$string['lti:addinstance'] = 'Añadir una nueva actividad LTI';
$string['lti_administration'] = 'Administración de LTI';
$string['lti_errormsg'] = 'La herramienta devolvió el siguiente mensaje de error: "{$a}"';
$string['lti:grade'] = 'Calificar actividades LTI';
$string['lti_launch_error'] = 'Ha ocurrido un error al iniciar la herramienta externa:';
$string['lti_launch_error_tool_request'] = '<p> Para solicitar al administrador que complete la configuración de la herramienta, pulse <a href="{$a->admin_request_url}" target="_top">aquí</a>. </p>';
$string['lti:manage'] = 'Editar actividades LTI';
$string['lti:requesttooladd'] = 'Proporcionar una herramienta de configuración a los administradores';
$string['lti_tool_request_added'] = 'Solicitud de configuración de la herramienta enviada de forma correcta. Puede que tenga que contactar con el administrador del sitio para completar la configuración.';
$string['lti_tool_request_existing'] = 'La configuración para el dominio de la herramienta ya ha sido enviada.';
$string['lti:view'] = 'Ver actividades LTI';
$string['main_admin'] = 'Ayuda general';
$string['main_admin_help'] = 'Las herramientas externas permiten a los usuarios de Moodle interactuar directamente con recursos educativos alojados en servidores externos.

Mediante un protocolo especial de inicio la herramienta externa tendrá acceso a alguna información general del usuario que la inicia, como por ejemplo, el nombre de la institución, el id del curso y otras informaciones como el nombre de usuario o la dirección de correo.

Los tipos de herramienta se clasifican en tres categorías:

**Activo** Estos proveedores de herramientas han sido aprobados y configurados por el administrador. Pueden ser utilizados en todos los cursos de la plataforma Moodle. Si se dispone de clave de usuario y clave compartida, se establecerá una comunicación segura entre el sitio Moodle y la herramienta externa.

**Pendiente** Estos proveedores no han sido configurados por el administrador. Los docentes podrán usar herramientas de ese proveedor si disponen de una clave de usuario y clave compartida o si no se requieren.

**Rechazado** Estos proveedores están marcados como no disponibles en el sitio Moodle. Los docentes podrán usar herramientas de ese proveedor si disponen de una clave de usuario y clave compartida o si no se requieren.';
$string['miscellaneous'] = '';
$string['misconfiguredtools'] = 'Se detectaron instancias de herramientas mal configuradas';
$string['missingparameterserror'] = 'La página está mal configurada: "{$a}"';
$string['module_class_type'] = 'Tipo de módulo Moodle';
$string['modulename'] = 'Herramienta Externa';
$string['modulename_help'] = 'El módulo de actividad de herramienta externa les permiten a los estudiantes interactuar con recursos educativos y actividades alojadas en otros sitios de internet. Por ejemplo, una herramienta externa podría proporcionar acceso a un nuevo tipo de actividad o de materiales educativos de una editorial.

Para crear una actividad de herramienta externa se requiere un provedor de herramienta que soporte  LTI (Learning Tools Interoperability = Interoperatividad de Herramientas de Aprendizaje). Un maestro puede crear una actividad de herramienta externa o hacer uso de una herramienta configurada por el administrador del sitio.

Las herramientas externas difieren se los recursos URL en varias formas:

* Las herramientas externas están conscientes del contexto, por ejemplo: tienen acceso a información acerca del usuario que invocó la herramienta, como por ejemplo sa institución, curso y nombre

* Las herramientas externas soportan leer, actualizar y borrar calificaciones asociadas con la instancia de la actividad

* Las configuraciones de la herramienta externa crean una relación de confianza entre su sitio Moodle y el provedor de la herramienta, permitiendo la comunicación segura entre ambos';
$string['modulenameplural'] = 'basicltis';
$string['modulenamepluralformatted'] = 'Instancias LTI';
$string['never'] = 'Nunca';
$string['new_window'] = 'Nueva ventana';
$string['pagesize'] = 'Entregas mostradas por página';
$string['rejected'] = 'Rechazado';
$string['resource'] = 'Recurso';
$string['resourcekey'] = 'Clave de cliente';
$string['resourcekey_admin'] = 'Clave de cliente';
$string['send'] = 'Enviar';
$string['setupoptions'] = 'Opciones de configuración';
$string['share_email'] = 'Compartir el e-mail del usuario con la herramienta';
$string['share_email_admin'] = 'Compartir el e-mail del usuario con la herramienta';
$string['share_name'] = 'Compartir el nombre del usuario con la herramienta';
$string['share_name_admin'] = 'Compartir el nombre del usuario con la herramienta';
$string['size'] = 'Parámetros de tamaño';
$string['submission'] = 'Entrega';
$string['submissions'] = 'Envíos';
$string['tool_settings'] = 'Ajustes de la herramienta';
$string['viewsubmissions'] = 'Ver entregas y pantalla de calificaciones';
