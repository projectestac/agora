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
 * Strings for component 'simplecertificate', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   simplecertificate
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['awardedto'] = 'Otorgado a';
$string['cantdeleteissue'] = 'Error al eliminar certificados emitidos';
$string['certificateimage'] = 'Archivo de imagen de certificado';
$string['certificateimage_help'] = 'Esta es la imagen que se utilizará en el certificado';
$string['certificatename'] = 'Nombre de certificado';
$string['certificatename_help'] = 'Nombre de certificado';
$string['certificatetext'] = 'Texto del certificado';
$string['certificatetext_help'] = 'Este es el texto que se usará en el certificado; algunas palabras especiales se remplazarán con variables como el nombre del curso, el nombre del estudiante, la calificación ...
Estas son:

{USERNAME} -> Nombre completo del usuario
{COURSENAME} -> Nombre completo del curso (o un nombre del curso alternativo definido)
{GRADE} -> Calificación con formato
{DATE} -> Fecha con formato
{OUTCOME} -> Competencias
{HOURS} -> Horas definidas en el curso
{TEACHERS} -> Lista de profesores
{IDNUMBER} -> Númerto ID del usuario
{FIRSTNAME} -> Nomnre del usuario
{LASTNAME} -> Apellidos del usuario
{EMAIL} -> E-mail  del usuario
{ICQ} -> ICQ  del usuario
{SKYPE} -> Skype  del usuario
{YAHOO} -> Yahoo del usuario
{AIM} -> AIM  del usuario
{MSN} -> MSN del usuario
{PHONE1} -> 1er número de telefóno del usuario
{PHONE2} -> 2o número de telefóno del usuario
{INSTITUTION} -> Institución del usuario
{DEPARTMENT} -> Departamento del usuario
{ADDRESS} -> Dirección del usuario
{CITY} -> Población del usuario
{COUNTRY} -> País del usuario
{URL} -> Página web del usuario
{PROFILE_xxxx} -> Campos personalizados del perfil de usuario

Para usar campos personalizados debe utilizar el prefijo "PROFILE", por ejemplo: si ha creado un campo personalizado con el nombre corto "cumpleaños", el texto a utilizar en el certificado debe ser {PROFILE_CUMPLEAÑOS]

El texto puede usar HTML básico, tipos de letra (fonts) básicos, tablas, pero évite cualquier definición de posición.';
$string['certificatetextx'] = 'Posición horizontal del texto del certificado';
$string['certificatetexty'] = 'Posición vertical del texto del certificado';
$string['certificateverification'] = 'Verificación del certificado';
$string['certlifetime'] = 'Mantener los certificados emitidos durante: (en meses)';
$string['certlifetime_help'] = 'Especifica el periodo de tiempo durante el que desea mantener los certificados emitidos. Los certificados emitidos de antigüedad mayor a la especificada se borrarán automáticamente.';
$string['code'] = 'Código';
$string['codex'] = 'Posición horizontal del código QR';
$string['codey'] = 'Posición vertical del código QR';
$string['completiondate'] = 'Finalización del curso';
$string['coursegrade'] = 'Calificación del curso';
$string['coursename'] = 'Nombre alternativo del curso';
$string['coursename_help'] = 'Nombre alternativo del curso';
$string['coursetimereq'] = 'Minutos requeridos en el curso';
$string['coursetimereq_help'] = 'Introduzca aquí el mínimo total de tiempo, en minutos, que un estudiante debe haber estado conectado en el curso antes de que pueda recibir el certificado.';
$string['datefmt'] = 'Formato de fecha';
$string['datefmt_help'] = 'Elija un formato de fecha PHP válido (http://www.php.net/manual/en/function.strftime.php). O déjelo vacío para usar el formato del idioma elegido por el usuario';
$string['defaultcertificatetextx'] = 'Posición horizontal por defecto del texto';
$string['defaultcertificatetexty'] = 'Posición vertical por defecto del texto';
$string['defaultcodex'] = 'Posición horizontal por defecto del código QR';
$string['defaultcodey'] = 'Posición vertical por defecto del código QR';
$string['defaultheight'] = 'Altura por defecto';
$string['defaultwidth'] = 'Anchura por defecto';
$string['deletissuedcertificates'] = 'Eliminar certificados emitidos';
$string['delivery'] = 'Entrega';
$string['delivery_help'] = 'Elija aquí cómo quiere que sus estudiantes obtengan su certificado:
Abrir en Navegador: Abre el certificado en una ventana nueva del navegador de Internet.
Forzar descarga: Abre la ventana del navegador para descargar un archivo.
Certificado poe email: Al elegir esta opción se envía el certificado al estudiante mediante un anexo de un mensaje de Email.

Después de que un usuario haya recibido su certificado, si pulsa sobre el enlace del certificado dentro de la página del curso, verá la fecha en que recibió dicho certificado y podrá verlo de nuevo.';
$string['designoptions'] = 'Opciones de diseño';
$string['download'] = 'Forzar descarga';
$string['emailcertificate'] = 'Email (¡También debe seleccionar guardar!)';
$string['emailfrom'] = 'Nombre del remitente del email';
$string['emailfrom_help'] = 'Nombre alternativo del formulario email';
$string['emailothers'] = 'Email otros';
$string['emailothers_help'] = 'Introduzaca aquí las direcciones Email, separadas por comas, de quienes deben ser avisados con un email cada vez que un estudiante reciba un certificado.';
$string['emailstudenttext'] = 'Se adjunta el certificado de {$a->course}.';
$string['emailteachermail'] = '{$a->student} ha recibido su certificado: \'{$a->certificate}\' del curso {$a->course}.

Puede verlo aquí: {$a->url}';
$string['emailteachermailhtml'] = '{$a->student} ha recibido su certificado: \'<i>{$a->certificate}\' del curso {$a->course}\'</i>.

Puede verlo aquí: <a href="{$a->url}">Certificate Report</a>.';
$string['emailteachers'] = 'Email de los profesores';
$string['emailteachers_help'] = 'Si se habilita, los profesores serán avisados con un email cada vez que un estudiante reciba un certificado.';
$string['enablesecondpage'] = 'Habilitar página del reverso del certificado';
$string['enablesecondpage_help'] = 'Habilita la edición de la página de reverso del Certificado; si estuviera deshabilitada, sólamente se imprimiría el código QR en la página del reverso (si el código QR está habilitado).';
$string['filenotfound'] = 'Archivo no encontrado: {$a}';
$string['getcertificate'] = 'Obtener certificado';
$string['grade'] = 'Calificación';
$string['gradefmt'] = 'Formato de la calificación';
$string['gradefmt_help'] = 'Hay tres formatos disponibles si decide imprimir una calificación en el certificado:

Calificación en Porcentaje: Imprime la calificación como un porcentaje.
Calificación en Puntos: Imprime el valor en puntos de la calificación.
Calificación en Letra: Imprime la calificación de porcentaje como una letra.';
$string['gradeletter'] = 'Calificación en letra';
$string['gradepercent'] = 'Calificación en porcentaje';
$string['gradepoints'] = 'Calificación en puntos';
$string['height'] = 'Altura del certificado';
$string['hours'] = 'horas';
$string['intro'] = 'Introducción';
$string['invalidcode'] = 'Código de certificado no válido';
$string['issued'] = 'Emitido';
$string['issueddate'] = 'Fecha de emisión';
$string['issueoptions'] = 'Opciones de emisión';
$string['keywords'] = 'certificado, curso, PDF, Moodle';
$string['modulename'] = 'Certificado simple';
$string['modulenameplural'] = 'Certificados simples';
$string['neverdeleteoption'] = 'No eliminar nunca';
$string['nocertificatesissued'] = 'No hay certificados emitidos';
$string['openbrowser'] = 'Abrir en una nueva ventana';
$string['opendownload'] = 'Pulse en el botón inferior para guardar su certificado en su ordenador.';
$string['openemail'] = 'Pulse en el botón inferior y su certificado se le enviará como un archivo adjunto a un correo electrónico.';
$string['openwindow'] = 'Pulse en el botón inferior para abrir su certificado en una nueva ventana del navegador.';
$string['pluginadministration'] = 'Administración del certificado';
$string['pluginname'] = 'Certificado simple';
$string['printdate'] = 'Fecha de impresión';
$string['printdate_help'] = 'Esta es la fecha que se va a imprimir, si ha decidido imprimir una fecha. Si se selecciona la fecha de la finalización del curso, pero el estudiante no ha completado el curso, se imprimirá la fecha de recepción. También puede imprimir la fecha en función de cuándo se haya calificado una actividad. Si se emite un certificado antes de que se haya calificado la actividad, se imprimirá la fecha de recepción.';
$string['printgrade'] = 'Imprimir calificación';
$string['printgrade_help'] = 'Puede elegir cualquiera de los elementos de calificación del curso disponibles en el libro de calificaciones para imprimirla en el certificado como calificación obtenida por el usuario. Los elementos de calificación se enumeran en el orden en el que aparecen en el libro de calificaciones. Elija el formato de la nota a continuación.';
$string['printoutcome'] = 'Imprimir competencia';
$string['printoutcome_help'] = 'Puede elegir cualquier competencia del curso para imprimir en el certificado el nombre de dicha competencia y los resultados obtenidos por el usuario. Un ejemplo sería: Competencia en Tarea: Apto.';
$string['qrcodeposition'] = 'Posición del código QR en el Certificado';
$string['qrcodeposition_help'] = 'Estas son las coodenadas XY (en milímetros) del código QR del certificado.';
$string['receiveddate'] = 'Fecha de recepción';
$string['report'] = 'Informe';
$string['secondimage'] = 'Archivo de imagen del reverso del certificado';
$string['secondimage_help'] = 'Esta es la imagen que se usará en el reverso del certificado';
$string['secondpageoptions'] = 'Página del reverso del certificado';
$string['secondpagetext'] = 'Texto del reverso del certificado';
$string['secondpagex'] = 'Posición horizontal del texto del reverso del certificado';
$string['secondpagey'] = 'Posición vertical del texto del reverso del certificado';
$string['secondtextposition'] = 'Posición del texto del reverso del certificado';
$string['secondtextposition_help'] = 'Estas son las coordenadas XY (en milímetros) del texto de la página de reverso del certificado';
$string['size'] = 'Tamaño del Certificado';
$string['size_help'] = 'Estos son el Ancho y Alto del certificado en milímetros. El tamaño por defecto es A4 apaisado (297 * 210 mm).';
$string['summaryofattempts'] = 'Resumen de certificados recibidos anteriormente';
$string['textposition'] = 'Posición del texto del certificado';
$string['textposition_help'] = 'Estas son las coordenadas XY (en milímetros) del texto del certificado';
$string['userdateformat'] = 'Formato de fecha del idioma del usuario';
$string['variablesoptions'] = 'Otras Opciones';
$string['verifycertificate'] = 'Verificar certificado';
$string['viewcertificateviews'] = 'Ver {$a} certificados emitidos';
$string['width'] = 'Anchura del certificado';
