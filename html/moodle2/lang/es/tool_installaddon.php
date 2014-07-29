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
 * Strings for component 'tool_installaddon', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_installaddon
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acknowledgement'] = 'Reconocimiento';
$string['acknowledgementmust'] = 'Usted debe reconocer esta advertencia';
$string['acknowledgementtext'] = 'Entiendo que es mi responsabilidad disponer de copias de seguridad completas de este sitio antes de instalar módulos externos (ad-ons). Acepto y entiendo que los módulos externos  (especialmente aquellos procedentes de fuentes no oficiales) pueden contener agujeros de seguridad, hacer que el sitio quede fuera de servicio, o provocar fugas de datos privados o la pérdida de los mismos.';
$string['featuredisabled'] = 'El instalador de módulos externos está desactivado en este sitio.';
$string['installaddon'] = '¡Instalale módulo externo!';
$string['installaddons'] = 'Instalar módulos externos';
$string['installexception'] = '¡Vaya!... Se produjo un error al intentar instalar el módulo externo. Active el modo de depuración para ver más detalles sobre el error.';
$string['installfromrepo'] = 'Instalar módulos externos desde el directorio de extensiones de Moodle';
$string['installfromrepo_help'] = 'Se le redirijirá al directorio de extensiones de Moodle para buscar e instalar el módulo externo, Tenga en cuenta que se enviará también el nombre completo, la URL y la versión de su sitio Moodle, para facilitarle la instalación.';
$string['installfromzip'] = 'Instalar módulo externo desde un archivo ZIP';
$string['installfromzipfile'] = 'Paquete ZIP';
$string['installfromzipfile_help'] = 'El paquete de extensión ZIP debe contener sólo un directorio, con el mismo nombre que la extensión. El archivo ZIP se desempaquetará en el lugar apropiado según el tipo de extensión. Si el paquete se ha descargado desde el directorio de extensiones de Moodle entonces tendrá esta estructura.';
$string['installfromzip_help'] = 'Una alternativa a la instalación de un módulo externo directamente desde el directorio de extensiones de Moodle es cargar un paquete ZIP con el módulo. El paquete ZIP debe tener la misma estructura que el paquete descargado en el directorio de extensiones de Moodle.';
$string['installfromziprootdir'] = 'Cambie el nombre del directorio raíz';
$string['installfromziprootdir_help'] = 'Algunos paquetes ZIP, como los generados por Github, pueden contener un nombre de directorio raíz incorrecto. Si es así, el nombre correcto se debe indicar aquí.';
$string['installfromzipsubmit'] = 'Instalar módulo externo desde archivo ZIP';
$string['installfromziptype'] = 'Tipo de extensión';
$string['installfromziptype_help'] = 'Seleccione el tipo correcto de plugin que va a instalar. Advertencia: El procedimiento de instalación puede fallar gravemente si se especifica un tipo de extensión incorrecto.';
$string['permcheck'] = 'Asegúrese de que los procesos del servidor web pueden escribir en la ubicación raíz de este tipo de extensiones.';
$string['permcheckerror'] = 'Error al comprobar los permisos de escritura';
$string['permcheckprogress'] = 'Comprobando los permisos de escritura...';
$string['pluginname'] = 'Instalador de módulos externos';
$string['remoterequestalreadyinstalled'] = 'Hay una solicitud para instalar en este sitio el módulo externo {$a->name} ({$a->component}) versión {$a->version} desde el directorio de extensiones de Moodle. Sin embargo, esta extensión<strong>ya está instalada</strong> en este sitio.';
$string['remoterequestconfirm'] = 'Hay una solicitud para instalar en este sitio el módulo externo {$a->name} ({$a->component}) versión {$a->version} desde el directorio de extensiones de Moodle. Sin embargo, esta extensión<strong>ya está instalada</strong> en este sitio.';
$string['remoterequestinvalid'] = 'Hay una solicitud para instalar en este sitio un módulo externo desde el directorio de extensiones de Moodle. Por desgracia, la solicitud no es válida, por lo que el módulo no se puede instalar.';
$string['remoterequestpermcheck'] = 'Hay una solicitud para instalar en este sitio el módulo externo {$a->name} ({$a->component}) versión {$a->version} desde el directorio de extensiones de Moodle. Sin embargo, <strong>no se puede escribir></strong>en el tipo de ubicación de la extensión <strong>{$a->typepath}</strong>. Debe dar acceso de escritura al usuario del servidor web en este tipo de ubicación de extensiones, después, pulse el botón de continuar pare repetir la comprobación...';
$string['remoterequestpluginfoexception'] = '¡Vaya! ... Se ha producido un error al intentar obtener información sobre el módulo externo {$a->name} ({$a->component}) versión {$a->version}. el módulo no se puede instalar. Active el modo de depuración para ver los detalles del error.';
$string['validation'] = 'Validación del paquete de módulo externo';
$string['validationmsg_componentmatch'] = 'Nombre completo del componente';
$string['validationmsg_componentmismatchname'] = 'Error en el nombre del módulo externo';
$string['validationmsg_componentmismatchname_help'] = 'Algunos paquetes ZIP, como los generados por Github, pueden contener un nombre de directorio raíz incorrecto. Es necesario corregir el nombre del directorio raíz para que coincida con el nombre oficial del módulo externo.';
$string['validationmsg_componentmismatchname_info'] = 'El módulo externo declara que su nombr es \'{$a} pero este no coincide con el nombre del directorio raíz.';
$string['validationmsg_componentmismatchtype'] = 'Error en el tipo de módulo externo';
$string['validationmsg_componentmismatchtype_info'] = 'Ha seleccionado el tipo \'{$a->expected}\' pero el módulo externo declara que es de tipo \'{$a->found}\'.';
$string['validationmsg_filenotexists'] = 'Archivo extraído no encontrado';
$string['validationmsg_filesnumber'] = 'No se han encontrado suficientes archivos en el paquete';
$string['validationmsg_filestatus'] = 'No es posible extraer los archivos';
$string['validationmsg_filestatus_info'] = 'Al intentar extraer el archivo {$a->file} se obtuvo un error \'{$a->status}\'.';
$string['validationmsglevel_debug'] = 'Depuración';
$string['validationmsglevel_error'] = 'Error';
$string['validationmsglevel_info'] = 'OK';
$string['validationmsglevel_warning'] = 'Advertencia';
$string['validationmsg_maturity'] = 'Nivel de madurez';
$string['validationmsg_maturity_help'] = 'El módulo externo puede declarar su nivel de madurez. Si el desarrollador considera que el módulo es estable, el nivel de madurez declarado leerá MATURITY_STABLE. El resto de los niveles de madurez (como alfa o beta) deben ser considerados inestables y se mostrará una advertencia.';
$string['validationmsg_missingexpectedlangenfile'] = 'Archivo de idioma Inglés perdido';
$string['validationmsg_missingexpectedlangenfile_info'] = 'Al tipo de módulo externo proporcionado le falta el archivo de idioma inglés esperado {$a}.';
$string['validationmsg_missinglangenfile'] = 'No se encuentra el archivo de idioma Inglés';
$string['validationmsg_missinglangenfolder'] = 'No se encuentra el directorio de idioma Inglés';
$string['validationmsg_missingversion'] = 'El módulo externo no declara su versión';
$string['validationmsg_missingversionphp'] = 'Archivo version.php no encontrado';
$string['validationmsg_multiplelangenfiles'] = 'Se han encontrado múltiples archivos de idioma Inglés';
$string['validationmsg_onedir'] = 'Estructura del paquete ZIP no válida.';
$string['validationmsg_onedir_help'] = 'El paquete ZIP debe contener sólo un directorio raíz que contiene el código del módulo externo. El nombre de ese directorio raíz debe coincidir con el nombre de la extensión.';
$string['validationmsg_pathwritable'] = 'Chequeo de permisos de escritura';
$string['validationmsg_pluginversion'] = 'Versión del módulo externo';
$string['validationmsg_release'] = 'Versión del módulo externo';
$string['validationmsg_requiresmoodle'] = 'Versión de Moodle requerida';
$string['validationmsg_rootdir'] = 'Nombre del módulo externo que se debe instalar';
$string['validationmsg_rootdir_help'] = 'El nombre del directorio raíz en el paquete ZIP indica el nombre del módulo externo que se instalará. Si el nombre no es correcto, es posible que desee cambiar el nombre del directorio raíz del paquete ZIP antes de instalar el módulo.';
$string['validationmsg_rootdirinvalid'] = 'Nombre del módulo externo no válido';
$string['validationmsg_rootdirinvalid_help'] = 'El nombre del directorio raíz en el paquete ZIP viola los requisitos formales de sintaxis. Algunos paquetes ZIP, como los generados por Github, pueden contener un nombre de directorio raíz incorrecto. Es necesario corregir el nombre del directorio raíz para que coincida con el nombre del módulo externo.';
$string['validationmsg_targetexists'] = 'La ubicación de destino ya existe';
$string['validationmsg_targetexists_help'] = 'El directorio donde se instalará el módulo externo aún no existe.';
$string['validationmsg_unknowntype'] = 'Tipo de extensión desconocido';
$string['validationresult0'] = '¡Errores durante la comprobación!';
$string['validationresult0_help'] = 'Se detectaron algunos problemas graves. No es seguro instalar el módulo externo. Revise los mensajes de registro de validación para obtener más detalles.';
$string['validationresult1'] = '¡Requisitos válidos!';
$string['validationresult1_help'] = 'El paquete del módulo externo ha sido validado y no se detectaron problemas graves.';
$string['validationresultinfo'] = 'Info';
$string['validationresultmsg'] = 'Mensaje';
$string['validationresultstatus'] = 'Estado';
