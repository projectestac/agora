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
 * Strings for component 'message_email', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowusermailcharset'] = 'Permitirlle ao usuario cambiar o conxunto de caracteres';
$string['configallowusermailcharset'] = 'Activando isto, todos os usuarios do sitio poderán especificar o seu propio conxunto de caracteres para o correo.';
$string['configmailnewline'] = 'Caracteres de liña nova empregados nas mensaxes de correo. Conforme coa RFC 822bis CRLF é necesario; algúns servidores fan unha conversión automática desde LF a CRLF, en tanto que outros fan unha conversión incorrecta de CRLF a CRCRLF e, para rematar, outros rexeitan os correos con LF baleiro(caso de qmail, p.ex.). Tente modificar este axuste se ten problemas con correos sen entregar ou con liñas novas dobres.';
$string['confignoreplyaddress'] = 'As veces os correos son enviados polo usuario (p.ex. mensaxes a un foro). O enderezo de correo especificado aquí empregarase como enderezo «De» naqueles casos nos que os destinatarios non poidan contestar directamente ao usuario (p.ex. cando un usuario escolle manter agochado o seu enderezo).';
$string['configsitemailcharset'] = 'Todos os correos xerados polo seu sitio enviaranse no conxunto de caracteres que especifique aquí. En calquera caso, cada usuario individual poderá axustar esta opción se está activada o seguinte axuste.';
$string['configsmtphosts'] = 'Escriba o nome completo dun ou máis servidores SMTP locais que Moodle debe empregar para enviar correo (p.ex. «mail.a.com» ou «mail.a.com;mail.b.com»). Para especificar un porto non predeterminado (que non sexa o porto 25), pode empregar a sintaxe [servidor]:[porto] («mail.a.com:587» p.ex.). Para conexións seguras, con SSL adoita empregarse o porto 465, e con TLS o porto 587, especifique o protocolo de seguranza a seguir se é preciso. Se deixa este campo en branco, Moodle empregará o método predeterminado de PHP para enviar correo.';
$string['configsmtpmaxbulk'] = 'Número máximo de mensaxes enviados por sesión SMTP. A agrupación de mensaxes pode axilizar o envío de correos. Valores inferiores a 2 forzan a creación dunha nova sesión SMTP para cada correo.';
$string['configsmtpsecure'] = 'Se o servidor SMTP require conexión segura, especifique o tipo correcto de protocolo.';
$string['configsmtpuser'] = 'Se antes especificou un servidor SMTP, e o servidor require autenticación, escriba aquí o nome de usuario e o contrasinal.';
$string['email'] = 'Enviar notificacións por correo a';
$string['ifemailleftempty'] = 'Deixar baleiro para enviar notificacións a {$a}';
$string['mailnewline'] = 'Caracteres de liña nova no correo';
$string['none'] = 'Ningún';
$string['noreplyaddress'] = 'Enderezo de «no-reply» (sen resposta)';
$string['pluginname'] = 'Correo';
$string['sitemailcharset'] = 'Conxunto de caracteres';
$string['smtphosts'] = 'Servidores SMTP';
$string['smtpmaxbulk'] = 'Límite de sesión SMTP';
$string['smtppass'] = 'Contrasinal SMTP';
$string['smtpsecure'] = 'Seguranza SMTP';
$string['smtpuser'] = 'Nome de usuario SMTP';
