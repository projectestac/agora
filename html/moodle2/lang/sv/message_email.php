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
 * Strings for component 'message_email', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowusermailcharset'] = 'Tillåt användare att välja teckenuppsättning';
$string['configallowusermailcharset'] = 'Om Du aktiverar detta så kommer varje deltagare på den här webbplatsen att kunna ange sin egen teckenuppsättning för e-post.';
$string['configmailnewline'] = 'De tecken för ny rad som används i e-postmeddelanden. CRLF krävs i enlighet med RFC 822bis, en del e-postservrar konverterar automatiskt från LF till CRLF,  andra e-postservrar gör en felaktig konvertering från CRLF till CRCRLF, medan åter andra avvisar e-post med bara LF (t.ex. qmail). Försök att ändra denna inställning om du får problem med icke levererade e-postmeddelanden eller dubbla radmatningar.';
$string['confignoreplyaddress'] = 'E-postmeddelanden skickas ibland på uppdrag av en användare (t.ex. ett inlägg i ett forum). Den e-postadress som Du anger här kommer att användas som "Från" adress i de fall då mottagarna inte ska kunna svara direkt till användaren (t.ex. då användaren väljer att inte uppge sin e-postadress):';
$string['configsitemailcharset'] = 'Alla e-postmeddelanden som skapas av Din webbplats kommer att sändas med den teckenuppsättning som Du anger här. Varje enskild användare kommer att kunna ändra detta om Du aktiverar nästa inställning.';
$string['configsmtphosts'] = 'Ange fullständigt namn på en eller flera lokala SMTP-servrar som Moodle skall använda för att sända e-post (t.ex. \'mail.a.com\' eller \'mail.a.com;mail.b.com\'). För att ange en icke-standardport (t ex en annan än port 25) så kan Du använda syntaxen [server]:[port] (t ex \'mail.a.com:537\'. Om Du lämnar det tomt, kommer Moodle att använda standardmetoden för PHP att skicka e-post.';
$string['configsmtpmaxbulk'] = 'Maximalt antal meddelanden som kan skickas per SMTP session. Att gruppera meddelanden kan höja hastigheten på utskickningen av e-post. Värden som är lägre än 2 framtvingar skapandet av en ny SMTP-session för varje e-postmeddelande.';
$string['configsmtpuser'] = 'Om Du har angivit en SMTP-server ovan, och servern kräver autenticering, så ska Du skriva in användarnamn och lösenord här.';
$string['email'] = 'Skicka meddelande via e-post till ';
$string['mailnewline'] = 'Tecken för ny rad i e-post';
$string['noreplyaddress'] = 'Adress för inget-svar';
$string['pluginname'] = 'E-post';
$string['sitemailcharset'] = 'Teckenuppsättning';
$string['smtphosts'] = 'SMTP-värdar';
$string['smtpmaxbulk'] = 'Begränsning för SMTP session';
$string['smtppass'] = 'Lösenord för SMTP';
$string['smtpuser'] = 'Användarnamn för SMTP';
