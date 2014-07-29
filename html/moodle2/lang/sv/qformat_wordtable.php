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
 * Strings for component 'qformat_wordtable', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   qformat_wordtable
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cannotopentempfile'] = 'Kan inte öppna den temporära filen <b>{$a}</b>';
$string['cannotwritetotempfile'] = 'Kan inte skriva till den temporära filen <b>{$a}</b>';
$string['conversionfailed'] = 'Frågeimporten misslyckades.';
$string['conversionsucceeded'] = 'Frågeimporten <b>lyckades</b>, <br>klicka på<b>\'Stöng\'</b> knappen för att fortsätta.';
$string['conversionsucceeded2'] = 'Frågeimporten <b>lyckades</b>, <br>
klicka \'fortsätt\' knappen för att fortsätta.';
$string['curlerror'] = 'cURL misslyckades: Wordfilen konverterades inte till XML. Nätverks/brandväggs problem?';
$string['curlunavailable'] = 'Du behöver cURL biblioteket installerat i PHP för att importera den här Word filen. Kontakta din systemadministratör.';
$string['docxnotsupported'] = 'Filer i Word 2007 formatet stöds ej: <b>{$a}</b>';
$string['htmldocnotsupported'] = 'Felaktigt Wordformat: var god använd
 <i>Arkiv>Spara som...</i> för att spara <b>{$a}</b> i ursprungligt Wordformat och importera igen';
$string['htmlnotsupported'] = 'Filer i HTML formatet stöds ej: <b>{$a}</b>';
$string['noquestions'] = 'Ingen fråga att exportera';
$string['pluginname'] = 'Microsoft Word tabellformat (Wordtabell)';
$string['pluginname_help'] = 'Detta är en front-end för att konvertera Microsoft Word 2003 binärt format till Moodle fråge XML-format. Importera och konvertera Moodle fråge XML-format till en förbättrad XHTML-format för att exportera till ett format lämpligt för redigering i Microsoft Word.';
$string['preview_question_not_found'] = 'Frågan som skulle förhandsgranskas kunde inte hittas, namn / kurs ID: {$a}';
$string['registration'] = 'Registrering';
$string['registration_administration'] = 'Moodle2Word administration';
$string['registrationcomplete'] = 'Registreringen lyckades, Word import är nu tillgängligt';
$string['registrationincomplete'] = 'Registreringen misslyckades, Word import är inte tillgängligt.';
$string['registrationinfo'] = '<p> Du måste registrera Moodle2Word för att möjliggöra import av Word-dokument. Du behöver inte registrera dig om du bara vill exportera frågor till Word-format. Registreringen är gratis och tillåter import av Word-filer som innehåller upp till 5 frågor. Men för att importera ett större antal frågor, måste du betala en årlig prenumeration. </p><p> Om du vill kan du låta din webbplats namn, land och webbadress läggas till den offentliga listan över webbplatser som använder Moodle2Word. </p>';
$string['registrationinfotitle'] = 'Moodle2Word registreringsinformation';
$string['registrationno'] = 'Nej, jag vill inte ta emot email';
$string['registrationpage'] = 'Omdirigerar till registreringssidan för att aktivera Wordimport';
$string['registrationpasswordsdonotmatch'] = 'Lösenorden matchar inte';
$string['registrationsend'] = 'Skicka registrerings information till www.moodle2word.net';
$string['registrationyes'] = 'Ja, vänligen meddela mig om viktiga frågor';
$string['stylesheetunavailable'] = 'XSLT <b>{$a}</b> är inte tillgänglig';
$string['tempfile'] = 'Temporär XML-fil: <b>{$a}</b>';
$string['templateunavailable'] = 'Word-kompatibel XHTML-mall <b>{$a}</b> är inte tillgänglig';
$string['transformationfailed'] = 'XSLT omformatering misslyckades <b>({$a})</b>';
$string['wordtable'] = 'Microsoft Word-tabell-format (wordtable)';
$string['wordtable_help'] = 'Detta är en front-end för att konvertera Microsoft Word 2003 binärt format till Moodle Fråga XML-format för import och konvertering av Moodle Fråga XML-format till en förbättrad XHTML format för export till ett format som lämpar sig för redigering i Microsoft.';
$string['xmlnotsupported'] = 'Filer i XML-format som inte stöds: <b>{$a}</b>';
$string['xsltunavailable'] = 'Du behöver XSLT biblioteket installeras i PHP för att spara den här Word-filen';
