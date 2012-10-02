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
 * Strings for component 'portfolio', language 'es', branch 'MOODLE_23_STABLE'
 *
 * @package   portfolio
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activeexport'] = 'Resolver exportación activa';
$string['activeportfolios'] = 'Portafolios disponibles';
$string['addalltoportfolio'] = 'Exportar todo al portafolios';
$string['addnewportfolio'] = 'Agregar un nuevo portafolio';
$string['addtoportfolio'] = 'Exportar al portafolios';
$string['alreadyalt'] = 'Ya exportando: por favor, haga clic aquí para resolver esta transferencia';
$string['availableformats'] = 'Formatos de exportación disponibles';
$string['callercouldnotpackage'] = 'Error en el empaquetado de los datos para exportar: el error original fue {$a}';
$string['cannotsetvisible'] = 'No se puede establecer este a visible - el plugin ha sido completamente deshabilitado debido a una mala configuración.';
$string['commonportfoliosettings'] = 'Configuración común del portafolios';
$string['configexport'] = 'Configurar datos exportados';
$string['configplugin'] = 'Configurar plugin de portafolios';
$string['configure'] = 'Configurar';
$string['confirmcancel'] = '¿Está seguro de que desea candelar esta exportación?';
$string['confirmexport'] = 'Por favor, confirme esta exportación';
$string['confirmsummary'] = 'Resumen de su exportación';
$string['continuetoportfolio'] = 'Continuar con el portafolios';
$string['deleteportfolio'] = 'Eliminar ejemplo de portafolios';
$string['destination'] = 'Destino';
$string['disabled'] = 'Lo sentimos, pero las exportaciones de portafolios están deshabilitadas en este sitio';
$string['disabledinstance'] = 'Deshabilitado';
$string['displayarea'] = 'Área de exportación';
$string['displayexpiry'] = 'Tiempo de expiración de la transferencia';
$string['displayinfo'] = 'Información sobre la exportación';
$string['dontwait'] = 'No esperar';
$string['enabled'] = 'Portafolios disponibles';
$string['enableddesc'] = 'Esta opción permite a los administradores configurar sistemas remotos para que los usuarios exporten contenidos a ellos';
$string['err_uniquename'] = 'El nombre del portafolios debe ser único (por plugin)';
$string['exportalreadyfinished'] = 'Se ha completado la exportación del portafolios';
$string['exportalreadyfinisheddesc'] = 'Se ha completado la exportación del portafolios';
$string['exportcomplete'] = 'Se ha completado la exportación del portafolios';
$string['exportedpreviously'] = 'Exportaciones previas';
$string['exportexpired'] = 'La exportación del portafolios ha expirado';
$string['exporting'] = 'Exportando al portafolios';
$string['exportingcontentfrom'] = 'Exportando contenido de {$a}';
$string['exportingcontentto'] = 'Exportando contenido a {$a}';
$string['exportqueued'] = 'La exportación del portafolios ha sido colocada en cola con éxito para su transferencia';
$string['exportqueuedforced'] = 'La exportación del portafolios ha sido colocada en cola con éxito para su transferencia (el sistema remoto ha forzado las transferencias en cola)';
$string['failedtopackage'] = 'No se han encontrado archivos que empaquetar';
$string['failedtosendpackage'] = 'Error al enviar los datos al sistema de portafolios seleccionado: el error original fue {$a}';
$string['filedenied'] = 'Acceso denegado a este archivo';
$string['filenotfound'] = 'Archivo no encontrado';
$string['fileoutputnotsupported'] = 'Reescribir la salida del archivo no se admite para este formato';
$string['format_document'] = 'Documento';
$string['format_file'] = 'Archivo';
$string['format_image'] = 'Imagen';
$string['format_leap2a'] = 'Formato de portafolios Leap2A';
$string['format_mbkp'] = 'Formato de copia de seguridad de Moodle';
$string['format_pdf'] = 'PDF';
$string['format_plainhtml'] = 'HTML';
$string['format_presentation'] = 'Presentación';
$string['format_richhtml'] = 'HTML con adjuntos';
$string['format_spreadsheet'] = 'Hoja de cálculo';
$string['format_text'] = 'Texto plano';
$string['format_video'] = 'Video';
$string['hidden'] = 'Oculto';
$string['highdbsizethreshold'] = 'Dbsize de transferencia alta';
$string['highdbsizethresholddesc'] = 'Número de registros en la base de datos por encima del cual se consiederará que la transferencia ocupa demasiado tiempo';
$string['highfilesizethreshold'] = 'Tamaño de archivo de transferencia alto';
$string['insanesubject'] = 'Algunos ejemplos de portafolios deshabilitados automáticamente';
$string['instancedeleted'] = 'Portafolios eliminado con éxito';
$string['instanceismisconfigured'] = 'El ejemplo de portafolios está mal configurado y se ha pasado por alto. El error fue: {$a}';
$string['instancenotdelete'] = 'Fallo al eliminar el portafolios';
$string['instancenotsaved'] = 'Fallo al guardar el portafolios';
$string['instancesaved'] = 'Postafolios guardado con éxito';
$string['invalidaddformat'] = 'Formato de agregación no válido pasado a portfolio_add_button. ({$a}) Debe ser uno de PORTFOLIO_ADD_XXX';
$string['invalidbuttonproperty'] = 'No se ha podido encontrar esa propiedad ({$a}) del portfolio_button';
$string['invalidconfigproperty'] = 'No se ha podido encontrar esa propiedad de la configuración ({$a->property} de {$a->class})';
$string['invalidexportproperty'] = 'No se ha podido encontrar esa propiedad de exportación en la configuración ({$a->property} de {$a->class})';
$string['invalidfileareaargs'] = 'Argumentos de área de archivo no válidos pasados a set_file_and_format_data - deben contener contextid, component, filearea y itemid';
$string['invalidformat'] = 'Algo está exportando un formato no válido, {$a}';
$string['invalidinstance'] = 'No se ha podido encontrar ese ejemplo de portafolios';
$string['invalidproperty'] = 'No se pudo encontrar esta propiedad
({$a->property} de {$a->class})';
$string['invalidtempid'] = 'ID de exportación no válida: tal vez haya expirado';
$string['leap2a_emptyselection'] = 'Valor necesario no seleccionado';
$string['leap2a_invalidentryid'] = 'Usted ha intentado acceder a una entrada con un ID que no existe ({$a})';
$string['logs'] = 'Transferir registros';
$string['logsummary'] = 'Transferencias anteriores exitosas';
$string['manageportfolios'] = 'Gestionar portafolios';
$string['manageyourportfolios'] = 'Gestionar sus portafolios';
$string['moderatefilesizethreshold'] = 'Moderar transferencia de tamaño de archivo';
$string['noavailableplugins'] = 'Disculpe, pero no hay portafolios disponibles para ser exportados';
$string['noinstanceyet'] = 'No se ha seleccionado';
$string['nologs'] = 'No hay registros para mostrar!';
$string['nopermissions'] = 'Lo sentimos, pero no tiene los permisos necesarios para exportar archivos de esta zona';
$string['notexportable'] = 'Lo sentimos, pero el tipo de contenido que está tratando de exportar no es exportable';
$string['notimplemented'] = 'Lo sentimos, pero está tratando de exportar contenido en un formato que aún no está implementado ({$a})';
$string['notyetselected'] = 'Aún no seleccionado';
$string['notyours'] = 'Usted está tratando de reanudar una exportación de un portafolios que no le pertenece.';
$string['off'] = 'Habilitado, pero oculto';
$string['on'] = 'Activado y visible';
$string['plugin'] = 'Plugin Portafolio';
$string['portfolio'] = 'Portafolio';
$string['portfolios'] = 'Portafolios';
$string['queuesummary'] = 'Transferencias actualmente en cola';
$string['returntowhereyouwere'] = 'Retornar a lugar anterior';
$string['save'] = 'Guardar';
$string['selectedformat'] = 'Elegir el formato de exportación';
$string['selectplugin'] = 'Seleccione el destino';
$string['sure'] = '¿Confirma que desea eliminar "{$a} \'? Esta acción no se podrá deshacer.';
$string['transfertime'] = 'Tiempo de transferencia';
$string['unknownplugin'] = 'Desconocido (probablemente haya sido eliminado por el administrador)';
$string['wait'] = 'Espere';
