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
 * Strings for component 'message_email', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowusermailcharset'] = 'Permet que l\'usuari seleccioni el joc de caràcters';
$string['configallowusermailcharset'] = 'Si habiliteu aquesta opció, cada usuari podrà especificar un joc de caràcters per al seu correu.';
$string['configmailnewline'] = 'Caràcter de final de línia utilitzat en els missatges de correu. El RFC 822bis exigeix CRLF. Alguns servidors de correu fan la conversió automàtica de LF a CRLF, però altres servidors fan una conversió incorrecta de CRLF a CRCRLF i altres rebutgen els correus que portin només LF (p. ex. qmail). Proveu a canviar aquest paràmetre si teniu problemes amb correus no lliurats o finals de línia duplicats.';
$string['confignoreplyaddress'] = 'Alguns missatges de correu són tramesos en nom d\'un usuari (p. ex. els missatges dels fòrums). L\'adreça de correu que especifiqueu aquí s\'utilitzarà com a remitent ("From") quan no es vol que el destinatari pugui respondre directament el missatge (p. ex. quan el remitent ha triat ocultar la seva adreça).';
$string['configsitemailcharset'] = 'Tots els correus que generi aquest servidor s\'enviaran en el joc de caràcters que especifiqueu aquí. De totes maneres, cada usuari podrà triar el joc de caràcters dels seus correus si habiliteu el paràmetre següent.';
$string['configsmtphosts'] = 'Doneu el nom d\'un o més servidors SMTP locals que Moodle pugui usar per enviar correu (p. ex. \'mail.a.com\' o \'mail.a.com;mail.b.com\'). Per especificar un port que sigui el port per defecte (que no sigui el port 25), podeu utilitzar la sintaxi [server]:[port] (ex. \'mail.a.com:587\' ). Si el deixeu en blanc, Moodle utilitzarà el mètode per defecte del PHP per enviar correu.';
$string['configsmtpmaxbulk'] = 'Nombre màxim de missatges enviats per sessió SMTP. L\'agrupament de missatges pot fer més ràpids els enviaments. Valors inferiors a 1 imposen la creació d\'una nova sessió SMTP per a cada correu.';
$string['configsmtpsecure'] = 'Si el servidor SMTP requereix d\'una connexió segura, especifiqueu el tipus de protocol correcte.';
$string['configsmtpuser'] = 'Si heu especificat a dalt un servidor SMTP, i aquest servidor requereix autenticació, introduïu aquí el nom d\'usuari i la contrasenya.';
$string['email'] = 'Enviar notificacions per correu electrònic a';
$string['ifemailleftempty'] = 'Deixa buit per a enviar notificacions a {$a}';
$string['mailnewline'] = 'Caràcters de final de línia en el correu';
$string['none'] = 'Cap';
$string['noreplyaddress'] = 'Adreça per a no rebre respostes';
$string['pluginname'] = 'Correu electrònic';
$string['sitemailcharset'] = 'Joc de caràcters';
$string['smtphosts'] = 'Servidors SMTP';
$string['smtpmaxbulk'] = 'Límit de sessió de SMTP';
$string['smtppass'] = 'Contrasenya SMTP';
$string['smtpsecure'] = 'Seguretat SMTP';
$string['smtpuser'] = 'Nom d\'usuari SMTP';
