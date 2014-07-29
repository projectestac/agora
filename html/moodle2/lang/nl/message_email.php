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
 * Strings for component 'message_email', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowattachments'] = 'Bijlagen toestaan';
$string['allowusermailcharset'] = 'Gebruikers mogen tekenset kiezen';
$string['configallowattachments'] = 'Door deze instelling in te schakelen sta je toe dat bestanden als bijlage verstuurd kunnen worden met e-mails die gegenereerd worden door allerlei functies op deze site, zoals badges.';
$string['configallowusermailcharset'] = 'Door dit in te schakelen, kan elke gebruiker van de site zijn eigen tekenset kiezen voor het e-mailen.';
$string['configemailonlyfromnoreplyaddress'] = 'Indien ingeschakeld zal alle e-mail verstuurd worden door een niet-beantwoorden adres te gebruiken als het "from" adres. Dit kan gebruikt worden om anti-spoofing controles in externe mailsystemen te verhinderen van e-mail te blokkeren.';
$string['configmailnewline'] = 'Karakters voor een nieuwe regel, gebruikt in e-mailberichten. CRLF is vereist volgens RFC 822bis. Sommige mailservers converteren automatisch LF naar CRLF, andere mailservers doen een foute conversie van CRLF naar CRCRLF. Nog andere servers verwerpen e-mails die alleen maar LF als regeleinde hebben (qmail bijvoorbeeld). Probeer deze instelling te wijzigen als je problemen hebt met onverstuurde e-mails of met dubbele nieuwe regels.';
$string['confignoreplyaddress'] = 'Soms verzendt Moodle e-mails voor een gebruiker (bijvoorbeeld bij forumberichten) Het e-mailadres dat je hier instelt wordt gebruikt als "From"-adres voor die gebruikers die ervoor gekozen hebben dat andere gebruikers niet rechtstreeks op hun mail mogen kunnen antwoorden (bijvoorbeeld wanneer een gebruiker zijn e-mailadres privé wil houden)';
$string['configsitemailcharset'] = 'Deze instelling bepaalt de standaard tekenset voor alle e-mail die door de site verstuurd wordt.';
$string['configsmtphosts'] = 'Geef de volledige naam van één of meer lokale SMTP-servers die Moodle moet gebruiken om mail te versturen (bijvoorbeeld: \'mail.a.com\' of \'mail.a.com;mail.b.com\'). Om een niet standaard poort op te geven (anders dan poort 25), kun je de notatie [server]:[poort] gebruiken (bijvoorbeeld mail.a.com:587).
Voor beveiligde verbindingen wordt gewoonlijk poort 465 gebruikt met SSL, poort 587 wordt gebruikt met TLS, specificeer het beveiligingsprotocol onderaan indien nodig. Als je dit veld leeg laat gebruikt Moodle de standaard PHP-methode voor het versturen van mail.';
$string['configsmtpmaxbulk'] = 'Maximaal aantal verstuurde berichten per SMTP-sessie. Het groeperen van berichten kan het versturen van e-mails versnellen. Een waarde kleiner dan 2 zal er voor zorgen dat er voor elke e-mail een nieuwe SMTP-sessie gestart wordt.';
$string['configsmtpsecure'] = 'Als de smtp-server beveiligde verbindingen vereist, specificeer dan het protocol type.';
$string['configsmtpuser'] = 'Als je hierboven een SMTP-server hebt ingevuld en deze server authenticatie nodig heeft, vul hier dan de gebruikersnaam en het wachtwoord in.';
$string['email'] = 'Stuur meldingen via e-mail naar';
$string['emailonlyfromnoreplyaddress'] = 'E-mail altijd verzenden vanaf niet-beantwoorden adres?';
$string['ifemailleftempty'] = 'Laat leeg om notificaties te sturen naar {$a}';
$string['mailnewline'] = 'Nieuwe regel karakters in e-mail';
$string['none'] = 'Geen';
$string['noreplyaddress'] = 'Geen antwoordadres';
$string['pluginname'] = 'E-mail';
$string['sitemailcharset'] = 'Tekenset';
$string['smtphosts'] = 'SMTP hosts';
$string['smtpmaxbulk'] = 'SMTP-sessie limiet';
$string['smtppass'] = 'SMTP wachtwoord';
$string['smtpsecure'] = 'SMTP beveiliging';
$string['smtpuser'] = 'SMTP gebruikersnaam';
