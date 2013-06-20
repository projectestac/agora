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
 * Strings for component 'tool_xmldb', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_xmldb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actual'] = 'Faktisk';
$string['aftertable'] = 'Efter tabell:';
$string['back'] = 'Tillbaka';
$string['backtomainview'] = 'Tillbaka till huvud';
$string['cannotuseidfield'] = 'Det går inte att infoga \'id\'-fältet. Det är en autonumerisk kolumn.';
$string['change'] = 'ändra';
$string['charincorrectlength'] = 'Felaktig längd på  fält av typen tecken';
$string['checkbigints'] = 'Kontrollera stora heltal (BigInts)';
$string['check_bigints'] = 'Leta efter felaktiga heltal för DB';
$string['checkdefaults'] = 'Kontrollera standardvärden';
$string['check_defaults'] = 'Leta efter standardvärden som inte verkar passa in i sammanhanget';
$string['checkforeignkeys'] = 'Leta efter främmande nycklar';
$string['check_foreign_keys'] = 'Leta efter felanvändningar av  främmande nycklar';
$string['checkindexes'] = 'Kontrollera index';
$string['check_indexes'] = 'Leta efter  index för DB som saknas';
$string['completelogbelow'] = '(se den kompletta loggen för sökningen här nedan)';
$string['confirmcheckbigints'] = 'Den här funktionaliteten kommer att söka efter <a href="http://tracker.moodle.org/browse/MDL-11038"> potentiellt felaktiga fält för heltal (integer) </a> på Din Moodle-server som automatiskt genererar (men inte utför!) de nödvändiga SQL-satser (statements) som innehåller alla de korrekt definierade heltalen (integers) i Din DB. <br /><br />När de väl har genererats kan Du kopiera sådana satser säkert och utföra dem genom det gränssnitt för SQL som Du trivs bäst med (glöm inte att säkerhetskopiera Dina data innan Du gör det).<br /><br />Vi rekommenderar starkt att Du kör den senaste  tillgängliga versionen av Moodle innan du utför sökningen av felaktiga heltal (integers).<br /><br />Den här funktionaliteten utför inga åtgärder i förhållande till databasen (den bara läser den) så Du kan använda den när Du vill på ett säkert sätt.';
$string['confirmcheckindexes'] = 'Den här funktionaliteten kommer att söka efter potentiellt felaktiga index på Din Moodle-server, som automatiskt genererar (men inte utför!) de SQL-satser (statements) som är nödvändiga för att allt ska bevaras uppdaterat. <br /><br />När de väl har genererats kan Du kopiera sådana satser säkert och utföra dem genom det gränssnitt för SQL som Du trivs bäst med (glöm inte att säkerhetskopiera Dina data innan Du gör det).<br /><br />Vi rekommenderar starkt att Du kör den senaste tillgängliga versionen av Moodle innan du utför sökningen index som saknas.<br /><br />Den här funktionaliteten utför inga åtgärder i förhållande till databasen (den bara läser den) så Du kan använda den när Du vill på ett säkert sätt.';
$string['confirmdeletefield'] = 'Är Du helt säker på att Du vill ta bort fältet:';
$string['confirmdeleteindex'] = 'Är Du helt säker på att Du vill ta bort indexet:';
$string['confirmdeletekey'] = 'Är Du helt säker på att Du vill ta bort nyckeln:';
$string['confirmdeletetable'] = 'Är Du helt säker på att Du vill ta bort tabellen:';
$string['confirmdeletexmlfile'] = 'Är Du helt säker på att Du vill ta bort filen:';
$string['confirmrevertchanges'] = 'Är Du helt säker på att Du vill återställa ändringar som har genomförts under perioden:';
$string['create'] = 'Skapa';
$string['createtable'] = 'Skapa tabell';
$string['defaultincorrect'] = 'Felaktig standardinställning';
$string['delete'] = 'Ta bort';
$string['delete_field'] = 'Ta bort fält';
$string['delete_index'] = 'Ta bort index';
$string['delete_key'] = 'Ta bort nyckel';
$string['delete_table'] = 'Ta bort tabell';
$string['delete_xml_file'] = 'Ta bort XML-fil';
$string['doc'] = 'Dok';
$string['docindex'] = 'Index över dokumentation';
$string['down'] = 'Ner';
$string['duplicate'] = 'Dubblera';
$string['duplicatefieldname'] = 'Det finns redan ett fält med det namnet';
$string['duplicatekeyname'] = 'Det finns en befintlig nyckel med det där namnet';
$string['edit'] = 'Redigera';
$string['edit_field'] = 'Redigera fält';
$string['edit_field_save'] = 'Spara fält';
$string['edit_index'] = 'Redigera index';
$string['edit_index_save'] = 'Spara index';
$string['edit_key'] = 'Redigera nyckel';
$string['edit_key_save'] = 'Spara nyckel';
$string['edit_table'] = 'Redigera tabell';
$string['edit_table_save'] = 'Spara tabell';
$string['edit_xml_file'] = 'Redigera XML-fil';
$string['enumvaluesincorrect'] = 'Felaktiga värden för fält av typ \'enum\'';
$string['expected'] = 'Förväntad';
$string['field'] = 'Fält';
$string['fieldnameempty'] = 'Namnfältet är tomt';
$string['fields'] = 'Fält';
$string['fieldsnotintable'] = 'Det finns inget sådant fält i tabellen';
$string['fieldsusedinkey'] = 'Fältet används som nyckel';
$string['filenotwriteable'] = 'Det går inte att skriva till fältet';
$string['fkviolationdetails'] = 'Den främmande nyckeln {$a->keyname} till tabellen {$a->tablename} har felanvänts  {$a->numviolations} av  {$a->numrows} rader.';
$string['floatincorrectdecimals'] = 'Felaktigt antal decimaler för fält av typen \'flyttal\'.';
$string['floatincorrectlength'] = 'Felaktig längd för fält av typen \'flyttal\'';
$string['generate_all_documentation'] = 'All dokumentation';
$string['generate_documentation'] = 'Dokumentation';
$string['gotolastused'] = 'Gå till den senast använda filen';
$string['incorrectfieldname'] = 'Felaktigt namn';
$string['index'] = 'Index';
$string['indexes'] = 'Index';
$string['integerincorrectlength'] = 'Felaktig längd för fält av typen \'heltal\'';
$string['key'] = 'Nyckel';
$string['keys'] = 'Nycklar';
$string['listreservedwords'] = 'Lista över reserverade ord<br/>(används för att hålla dem <a href="http://docs.moodle.org/en/XMLDB_reserved_words" target="_blank">XMLDB_reserverade_ord</a> uppdaterade)';
$string['load'] = 'Ladda';
$string['main_view'] = 'Huvudvy';
$string['missing'] = 'Saknas';
$string['missingindexes'] = 'De saknade indexen har återfunnits';
$string['mustselectonefield'] = 'Du måste välja ett fält för att se de åtgärder som berör fält.';
$string['mustselectoneindex'] = 'Du måste välja ett index för att se de åtgärder som berör index.';
$string['mustselectonekey'] = 'Du måste välja en nyckel för att se de åtgärder som berör nycklar.';
$string['newfield'] = 'Nytt fält';
$string['newindex'] = 'Nytt index';
$string['newkey'] = 'Ny nyckel';
$string['newtable'] = 'Ny tabell';
$string['newtablefrommysql'] = 'Ny tabell från MySQL';
$string['new_table_from_mysql'] = 'Ny tabell från MySQL';
$string['nomissingindexesfound'] = 'Det gick inte att hitta några saknade index så Du behöver inte göra något mer med Din databas.';
$string['noviolatedforeignkeysfound'] = 'Det fanns inga främmande nycklar som har felanvänts';
$string['nowrongintsfound'] = 'Det gick inte att hitta några felaktiga heltal  (integers) så Du behöver inte göra något mer med Din databas.';
$string['numberincorrectdecimals'] = 'Felaktigt antal decimaler för fält av typen \'tal\'.';
$string['numberincorrectlength'] = 'Felaktig längd på fält av typen tal';
$string['pendingchanges'] = 'OBS! Du har gjort ändringar i den här filen. Det går att spara dem när som helst. ';
$string['pluginname'] = 'Redigerare för XMLDB';
$string['reserved'] = 'Reserverad';
$string['reservedwords'] = 'Reserverade ord';
$string['revert'] = 'Återställ';
$string['revert_changes'] = 'Återställ ändringar';
$string['save'] = 'Spara';
$string['searchresults'] = 'Sök Resultat';
$string['selectaction'] = 'Välj åtgärd:';
$string['selectdb'] = 'Välj databas:';
$string['selectfieldkeyindex'] = 'Välj fält/nyckel/index:';
$string['selectonecommand'] = 'Var snäll och välj en åtgärd från listan för att visa PHP-koden.';
$string['selectonefieldkeyindex'] = 'Var snäll och välj ett/en fält/nyckel/index från listan för att se PHP-koden.';
$string['selecttable'] = 'Välj tabell:';
$string['table'] = 'Tabell';
$string['tables'] = 'Tabeller';
$string['unload'] = 'Avladda';
$string['up'] = 'Upp';
$string['view'] = 'Visa';
$string['viewedited'] = 'Visa redigerad';
$string['vieworiginal'] = 'Visa ursprunglig';
$string['viewphpcode'] = 'Visa PHP-kod';
$string['view_reserved_words'] = 'Visa reserverade ord';
$string['viewsqlcode'] = 'Visa SQL-kod';
$string['view_structure_php'] = 'Visa PHP-struktur';
$string['view_structure_sql'] = 'Visa SQL-struktur';
$string['view_table_php'] = 'Visa tabell för PHP';
$string['view_table_sql'] = 'Visa tabell för SQL';
$string['viewxml'] = 'XML';
$string['violatedforeignkeys'] = 'Främmande nycklar som har felanvänts';
$string['violatedforeignkeysfound'] = 'Det finns felanvändning av främmande nycklar';
$string['violations'] = 'Exempel på felanvändning';
$string['wrong'] = 'Fel';
$string['wrongints'] = 'Felaktiga heltal (integers) har hittats';
$string['wronglengthforenum'] = 'Felaktig längd för fält av typen \'enum\'';
$string['wrongreservedwords'] = 'De reseverade ord som används f.n.<br />(lägg märke till att tabellnamn inte är viktiga om $CFG-prefix är i bruk).';
$string['yesmissingindexesfound'] = 'En del saknade index återfanns i Din databas. Här hittar Du detaljerad information om dem och även de SQL-satser som är nödvändiga (och som du kan utföra med hjälp av det gränssnitt för SQL som Du föredrar) i och för att skapa dem (de saknade indexen). Glöm inte att säkerhetskopiera Dina data innan Du gör detta.  <br /><br />Efter det att Du har gjort det så rekommenderar vi starkt att Du använder den här funktionen igen för att kontrollera att det inte saknas ännu fler index.';
$string['yeswrongintsfound'] = 'En del felaktiga heltal återfanns i Din databas. Här hittar Du detaljerad information om dem och även de SQL-satser som är nödvändiga (och som du kan utföra med hjälp av det gränssnitt för SQL som Du föredrar) i och för att skapa dem (de saknade indexen). löm inte att säkerhetskopiera Dina data innan Du gör detta.<br /><br />Efter det att Du har gjort det så rekommenderar vi starkt att Du använder den här funktionen igen för att kontrollera att det inte finns ännu fler felaktiga heltal (integers).';
