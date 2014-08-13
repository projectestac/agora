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
 * Strings for component 'message_email', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowattachments'] = 'Anhänge erlauben';
$string['allowusermailcharset'] = 'Zeichensatz für E-Mails wählbar';
$string['configallowattachments'] = 'Mit der Aktivierung dieser Einstellung wird ermöglicht, dass Dateianhänge bei E-Mail-Benachrichtigungen verschiedener Aktivitäten (z.B. Auszeichnungen) mit versandt werden.';
$string['configallowusermailcharset'] = 'Wenn diese Option aktiviert ist, darf der Zeichensatz für E-Mails selbst festgelegt werden.';
$string['configemailonlyfromnoreplyaddress'] = 'Wenn diese Option aktiviert ist, werden alle E-Mails mit einem Nicht-Antworten-Absender versandt. Diese Einstellung umgeht die Anti-Spoofing-Steuerung mehrerer externer E-Mail-Systeme, die die E-Mails von Moodle zurückgewiesen.';
$string['configmailnewline'] = 'Zeichen für Zeilenschaltung in E-Mails. CRLF ist gemäß RFC 822bis notwendig. Einige Mailserver wandeln LF automatisch in CRLF um, andere konvertieren CRLF falsch in CRCRLF und wieder andere weisen Mails mit reinem LF zurück (z.B. qmail). Probieren Sie unterschiedliche Einstellungen aus, falls Probleme mit dem Mailversand auftreten oder doppelte Zeilenschaltungen angezeigt werden.';
$string['confignoreplyaddress'] = 'Tragen Sie hier die E-Mail-Adresse ein, die als Absender beim Versand von Nachrichten (z.B. aus Foren) genutzt werden soll, wenn die E-Mail-Adresse des Absenders nicht für Rückantworten genutzt werden kann.';
$string['configsitemailcharset'] = 'Diese Option legt fest, dass alle E-Mails aus dieser Website mit dem standardmäßigen Zeichensatz versendet werden.';
$string['configsmtphosts'] = 'Tragen Sie einen oder mehrere lokale SMTP-Server mit vollem Namen ein, die für den E-Mail-Versand benutzt werden sollen (z.B. \'mailserver.de\' oder \'eins.mailserver.de;zwei.mailserver.de\'). Falls Ihr Server einen Nicht-Standard-Port benutzt (also nicht Port 25), verwenden Sie zur Eingabe die Syntax [server]:[port] (z.B. mailserver.de:587). Wenn das Feld frei bleibt, wird die Standardmethode von PHP zum Senden von E-Mails verwendet.';
$string['configsmtpmaxbulk'] = 'Maximale Anzahl von Nachrichten pro SMTP-Session. Die Gruppierung von Mitteilungen sollte den Versand von E-mails beschleunigen. Mit Werten kleiner als 2 wird für jede E-Mail eine neue SMTP-Session gestartet.';
$string['configsmtpsecure'] = 'Wenn der SMTP-Server eine sichere Verbindung verlangt, geben Sie hier das richtige Protokoll an.';
$string['configsmtpuser'] = 'Sofern Sie einen SMTP-Server angegeben haben und der Server Zugangsdaten erfordert, dann geben Sie hier Anmeldenamen und Kennwort an.';
$string['email'] = 'E-Mail-Mitteilung senden an';
$string['emailonlyfromnoreplyaddress'] = 'E-Mails mit Nicht-Antworten-Absender versenden?';
$string['ifemailleftempty'] = 'Leer lassen, um Mail an die Adresse {$a} senden zu lassen.';
$string['mailnewline'] = 'Festlegung für Zeilenschaltung in E-Mails';
$string['none'] = 'Keine';
$string['noreplyaddress'] = '"Nicht-Antworten" Adresse';
$string['pluginname'] = 'E-Mail';
$string['sitemailcharset'] = 'E-Mail-Zeichensatz';
$string['smtphosts'] = 'SMTP-Server';
$string['smtpmaxbulk'] = 'SMTP-Massenversand';
$string['smtppass'] = 'SMTP-Kennwort';
$string['smtpsecure'] = 'SMTP-Sicherheit';
$string['smtpuser'] = 'SMTP-Anmeldename';
