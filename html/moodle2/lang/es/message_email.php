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
 * Strings for component 'message_email', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowattachments'] = 'Permitir archivos adjuntos';
$string['allowusermailcharset'] = 'Permitir al usuario cambiar el conjunto de caracteres';
$string['configallowattachments'] = 'Al habilitar esta opción permitirá que se pueden enviar archivos adjuntos con los mensajes de correo electrónico generados por diversas funcionalidades dentro del sitio, como blogs, foros, o insignias';
$string['configallowusermailcharset'] = 'Si habilita esta opción, todos los usuarios del sitio podrán especificar su propio juego de caracteres para escribir emails.';
$string['configmailnewline'] = 'Caracteres de línea nueva usados en los mensajes de correo electrónico. CRLF es necesario de acuerdo RFC 822bis; algunos servidores realizan una conversión automática desde LF a CRLF, en tanto que otros realizan una conversión incorrecta de CRLF a CRCRLF y, finalmente, otros rechazarn los correos con LF vacío (qmail, por ejemplo). Intente modificar este ajuste si tiene problemas con correos sin entregar o con nuevas líneas dobles.';
$string['confignoreplyaddress'] = 'A veces los emails son enviados por el usuario (e.g., mensajes a un foro). La dirección email especificada aquí se usará como dirección "De" en aquellos casos en que los receptores no puedan replicar directamente al usuario (e.g., cuando un usuario elige mantener oculta su dirección).';
$string['configsitemailcharset'] = 'Todos los emails generados por su sitio se enviarán en el juego de caracteres que aquí se especifique. En cualquier caso, cada usuario individual podrá ajustar esta opción si está habilitado el siguiente ajuste.';
$string['configsmtphosts'] = 'Escriba el nombre completo de uno o más servidores SMTP locales que Moodle usará para enviar correo (e.g., \'mail.a.com\' o \'mail.a.com;mail.b.com\'). Si lo deja en blanco, Moodle usará el método PHP por defecto para enviar correo.';
$string['configsmtpmaxbulk'] = 'Número máximo de mensajes enviados por sesión SMTP. La agrupación de mensajes puede agilizar el envío de emails. Valores inferiores a 2 fuerzan la creación de una nueva sesión SMTP para cada email.';
$string['configsmtpsecure'] = 'Si el servidor SMTP requiere conexión segura, especifique el tipo correcto de protocolo.';
$string['configsmtpuser'] = 'Si antes ha especificado un servidor SMTP, y el servidor requiere identificación, escriba aquí el nombre de usuario y la contraseña.';
$string['email'] = 'Enviar notificaciones email a';
$string['ifemailleftempty'] = 'Dejar vacío para enviar avisos a {$a}';
$string['mailnewline'] = 'Caracteres de línea nueva en correo electrónico';
$string['none'] = 'Ninguno';
$string['noreplyaddress'] = 'Dirección \'no-reply\'';
$string['pluginname'] = 'Email';
$string['sitemailcharset'] = 'Conjunto de caracteres';
$string['smtphosts'] = 'Servidores SMTP';
$string['smtpmaxbulk'] = 'Límite de sesión SMTP';
$string['smtppass'] = 'Contraseña SMTP';
$string['smtpsecure'] = 'Seguridad SMTP';
$string['smtpuser'] = 'Nombre de usuario SMTP';
