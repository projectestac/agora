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
 * Strings for component 'message_email', language 'eu', branch 'MOODLE_26_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowattachments'] = 'Baimendu eranskinak';
$string['allowusermailcharset'] = 'Erabiltzaileari karakter-multzoa aldatzen utzi';
$string['configallowusermailcharset'] = 'Aukera hau aktibatuta, guneko erabiltzaile guztiek ezarri ahal izango dute bere karakter-multzoa mezu elektronikoak idazteko.';
$string['configmailnewline'] = 'E-posta mezuetan erabilitako karaktere berriak. RFC 822bis-en arabera, CRLF beharrezkoa da; zenbait zerbitzarik automatikoki bihurtzen dute LF-tik CRLF-ra, beste batzuk oker bihurtzen dute CRLF-tik CRCRLF-ra eta, azkenik, beste batzuk (qmail, kasu) LF hutsa duten mezuak baztertu egiten dituzte. Saiatu ezarpen hau aldatzen entregatu gabeko edo lerro bikoitz berriak dituzten mezuekin arazoak badituzu.';
$string['confignoreplyaddress'] = 'Batzuetan e-postak erabiltzaileak bidaltzen ditu (ad., foro bateko mezuak). E-posta helbidea "Norena" gisa azalduko da hartzaileek zuzenean erantzuteko posibilitatea ez duten kasuetan (ad., erabiltzaileak bere helbidea ezkutatu nahi duenean).';
$string['configsitemailcharset'] = 'Zure gunean sortutako e-posta guztiak hemen ezarritako karaktere-multzoak bidaliko dira. Dena dela, erabiltzaile bakoitzak zehaztu ahal izango du aukera hau ondorengo aukera gaituta badago.';
$string['configsmtphosts'] = 'Moodle-k posta-mezuak bidaltzeko erabiliko duen SMTP zerbitzari lokal bat edo gehiagoren izenak hemen idatzi (ad., \'mail.a.com\' edo \'mail.a.com;mail.b.com\'). Zuriz uzten baduzu, Moodle-k posta bidaltzeko lehenetsitako PHP metodoa erabiliko du.';
$string['configsmtpmaxbulk'] = 'SMPT saioko bidalitako gehienezko mezu-kopurua. Mezuak taldekatzeak arindu egin dezake e-posta bidalketa. 2tik bheerako baloreek e-posta bakoitzeko SMTP saio berria sortarazten dute.';
$string['configsmtpsecure'] = 'smtp zerbitzarian konexio segurua behar badu, ezarri protokolo-mota zuzena.';
$string['configsmtpuser'] = 'Lehenago SMTP zerbitzaria zehaztu baduzu, eta zerbitzariak autentifikazioa behar badu, erabiltzaile-izena eta pasahitza hemen idatzi.';
$string['email'] = 'Bidali e-posta bidezko jakinarazpenak hona';
$string['ifemailleftempty'] = 'Utzi hutsik jakinarazpenak hona bidaltzeko: {$a}';
$string['mailnewline'] = 'Lerro berriaren karaktereak e-postan';
$string['none'] = 'Bat ere ez';
$string['noreplyaddress'] = 'Ez-erantzun helbidea';
$string['pluginname'] = 'E-posta';
$string['sitemailcharset'] = 'Karaktere-multzoa';
$string['smtphosts'] = 'SMTP ostalariak';
$string['smtpmaxbulk'] = 'SMTP saiorako muga';
$string['smtppass'] = 'SMTP pasahitza';
$string['smtpsecure'] = 'SMTP segurtasuna';
$string['smtpuser'] = 'SMTP erabiltzaile-izena';
