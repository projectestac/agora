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
 * Strings for component 'tool_xmldb', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_xmldb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actual'] = 'Actual';
$string['aftertable'] = 'Tabel resultaat:';
$string['back'] = 'Terug';
$string['backtomainview'] = 'Terug naar Hoofd';
$string['cannotuseidfield'] = 'Kan het "id"-veld niet invullen: dit is een autonummeringskolom';
$string['change'] = 'Wijzig';
$string['charincorrectlength'] = 'Foute lengte voor char veld';
$string['checkbigints'] = 'Controleer integers';
$string['check_bigints'] = 'Zoek foute DB integers';
$string['checkdefaults'] = 'Controleer standaardwaarden';
$string['check_defaults'] = 'Zoek naar onconsistente standaardwaarden';
$string['checkforeignkeys'] = 'Controleer foreign keys';
$string['check_foreign_keys'] = 'Zoek foreign key schendingen';
$string['checkindexes'] = 'Controleer indexen';
$string['check_indexes'] = 'Zoek ontbrekende DB indexen';
$string['checkoraclesemantics'] = 'Controleer semantics';
$string['check_oracle_semantics'] = 'Controleer op semantics met de foute lengte';
$string['completelogbelow'] = '(complete log van zoeken onderaan)';
$string['confirmcheckbigints'] = 'Deze functie zal zoeken naar <a href="http://tracker.moodle.org/browse/MDL-11038"> mogelijk foute integer velden op je Moodle server, en hierbij automatisch de nodige SQL-statements genereren (maar niet uitvoeren!) om alle integer velden in je DB juist te zetten. Eens gegenereerd kun je die statements kopiëren en veilig uitvoeren in je favoriete SQL-interface<br /><br />
Het is ten zeerste aangeraden de laatst beschikbare (+ versie) Moodleversie te gebruiken voor je zoekt naar foute integers.<br /><br />
Deze functie schrijft niets weg in de databank (enkel lezen), en kan dus veilig uitgevoerd worden op elk moment.';
$string['confirmcheckdefaults'] = 'Deze functie zoekt naar inconsistente standaardwaarden in je Moodleserver. De SQL-statements, nodig om de standaardwaarden juist te definiëren, worden daarbij gegenereerd (maar niet uitgevoerd!).<br /><br />
Als die gegenereerd zijn, kun je ze uitvoeren in je favoriete SQL-interface (vergeet niet je databank te back-uppen voor je dat doet).<br /><br />
Het is ten zeerste aangeraden om de laatste beschikbare +-versie van je Moodleversie te gebruiken voor je gaatzoeken naar inconsistente standaardwaarden.<br /><br />
Deze actie leest alleen je databank en kan dus altijd veilig uitgevoerd worden.';
$string['confirmcheckforeignkeys'] = 'Deze functie zoekt naar mogelijke schendingen van foreign keys, gedefinieerd in de install.xml-definities. (Moodle genereert op dit ogenblik geen foreign key beperkingen in de databank - hierdoor kan er ongeldige data voorkomen.)<br /><br />
Je kunt best de laatste Moodleversie gebruiken (+-versie) die voor jouw Moodle (1.8, 1.9, 2.x ...) beschikbaar is voor je op zoek gaat naar ontbrekende indexen.<br /><br />
Deze functie wijzigt niets aan de databank (enkel lezen). Je kunt dit dus op elk moment veilig uitvoeren.';
$string['confirmcheckindexes'] = 'Deze functie zal zoeken naar mogelijk ontbrekende indexen op je Moodle server, en hierbij automatisch de nodige SQL-statements genereren (maar niet uitvoeren!) om alles up to date te houden. Eens gegenereerd kun je die statements kopiëren en veilig uitvoeren in je favoriete SQL-interface<br /><br />
Het is ten zeerste aangeraden de laatst beschikbare (+ versie) Moodleversie te gebruiken voor je zoekt naar ontbrekende indexen.<br /><br />
Deze functie schrijft niets weg in de databank (enkel lezen), en kan dus veilig uitgevoerd worden op elk moment.';
$string['confirmcheckoraclesemantics'] = 'Deze functie zal zoeken naar  <a href="http://tracker.moodle.org/browse/MDL-29322">Oracle varchar2 kolommen die BYTE semantics gebruiken</a> op je Moodle server, en hierbij automatisch de nodige SQL-statements genereren (maar niet uitvoeren!) om alle kolommen te converteren neer CHAR semantics (beter voor cross-db compatibiliteit en een grotere maximumlengte voor de inhoud)<br /><br />. Eens gegenereerd kun je die statements kopiëren en veilig uitvoeren in je favoriete SQL-interface (vergeet niet om eerst een back-up te nemen)<br /><br />
Het is ten zeerste aangeraden de laatst beschikbare (+ versie) Moodleversie te gebruiken voor je zoekt naar BYTE semantics.<br /><br />
Deze functie schrijft niets weg in de databank (enkel lezen), en kan dus veilig uitgevoerd worden op elk moment.';
$string['confirmdeletefield'] = 'Ben je zeker dat je dit veld wil verwijderen:';
$string['confirmdeleteindex'] = 'Ben je zeker dat je deze index wil verwijderen:';
$string['confirmdeletekey'] = 'Ben je zeker dat je deze sleutel wil verwijderen:';
$string['confirmdeletetable'] = 'Ben je zeker dat je deze tabel wil verwijderen:';
$string['confirmdeletexmlfile'] = 'Ben je zeker dat je dit bestand wil verwijderen:';
$string['confirmrevertchanges'] = 'Ben je er zeker van dat je de wijzigingen ongedaan wil maken?';
$string['create'] = 'Maak';
$string['createtable'] = 'Maak tabel:';
$string['defaultincorrect'] = 'Foute standaard';
$string['delete'] = 'Verwijder';
$string['delete_field'] = 'Verwijder veld';
$string['delete_index'] = 'Verwijder index';
$string['delete_key'] = 'Verwijder sleutel';
$string['delete_table'] = 'Verwijder tabel';
$string['delete_xml_file'] = 'Verwijder XML-bestand';
$string['doc'] = 'Doc';
$string['docindex'] = 'Documentatie-index:';
$string['documentationintro'] = 'Deze documentatie is automatisch gegenereerd uit de XMLDB-definitie. Ze is alleen beschikbaar in het Engels';
$string['down'] = 'Omlaag';
$string['duplicate'] = 'Dupliceer';
$string['duplicatefieldname'] = 'Er bestaat al een veld met die naam';
$string['duplicatefieldsused'] = 'Duplicaatvelden gebruikt';
$string['duplicateindexname'] = 'Dubbele indexnaam';
$string['duplicatekeyname'] = 'Er bestaat al een sleutel met die naam';
$string['duplicatetablename'] = 'Er bestaat al een tabel met die naam';
$string['edit'] = 'Bewerk';
$string['edit_field'] = 'Bewerk veld';
$string['edit_field_save'] = 'Bewaar veld';
$string['edit_index'] = 'Bewerk index';
$string['edit_index_save'] = 'Bewaar index';
$string['edit_key'] = 'Bewerk sleutel';
$string['edit_key_save'] = 'Bewaar sleutel';
$string['edit_table'] = 'Bewerk tabel';
$string['edit_table_save'] = 'Bewaar tabel';
$string['edit_xml_file'] = 'Bewerk XML-bestand';
$string['enumvaluesincorrect'] = 'Foute waarden voor enum veld';
$string['expected'] = 'Verwacht';
$string['extensionrequired'] = 'Sorry - the PHP-extentie \'{$a}\' is vereist voor deze actie. Installeer de extentie als je deze functie wil gebruiken.';
$string['field'] = 'Veld';
$string['fieldnameempty'] = 'Naam veld leeg';
$string['fields'] = 'Velden';
$string['fieldsnotintable'] = 'Veld bestaat niet in tabel';
$string['fieldsusedinindex'] = 'Dit veld wordt gebruikt als index';
$string['fieldsusedinkey'] = 'Dit veld wordt als sleutel gebruikt.';
$string['filemodifiedoutfromeditor'] = 'Waarschuwing: het bestand is lokaal gewijzigd met de XMLDB Editor. Bewaren zal locale wijzigingen overschrijven';
$string['filenotwriteable'] = 'Bestand niet beschrijfbaar';
$string['fkviolationdetails'] = 'Foreign key {$a->keyname} op tabel {$a->tablename} is geschonden door {$a->numviolations} van {$a->numrows} rijen.';
$string['float2numbernote'] = 'Opmerking: hoewel "float"-velden volledig ondersteund worden door XMLDB, is het aanbevolen om in de plaats daarvan te migreren naar "number"-velden';
$string['floatincorrectdecimals'] = 'Fout aantal decimalen voor float veld';
$string['floatincorrectlength'] = 'Foute lengte voor float veld';
$string['generate_all_documentation'] = 'Alle documentatie';
$string['generate_documentation'] = 'Documentatie';
$string['gotolastused'] = 'Laatst gebruikte bestand';
$string['incorrectfieldname'] = 'Foute naam';
$string['incorrectindexname'] = 'Foute indexnaam';
$string['incorrectkeyname'] = 'Onjuiste sleutelnaam';
$string['incorrecttablename'] = 'Foute tabelnaam';
$string['index'] = 'Index';
$string['indexes'] = 'Indexen';
$string['indexnameempty'] = 'Lege indexnaam';
$string['integerincorrectlength'] = 'Foute lengte voor integer veld';
$string['key'] = 'Sleutel';
$string['keynameempty'] = 'De sleutel kan niet leeg zijn';
$string['keys'] = 'Sleutels';
$string['listreservedwords'] = 'Lijst van gereserveerde woorden<br /> (gebruikt om <a href="http://docs.moodle.org/en/XMLDB_reserved_words" target="_blank">XMLDB_reserved_words</a> up to date te houden)';
$string['load'] = 'Laden';
$string['main_view'] = 'Hoofdscherm';
$string['masterprimaryuniqueordernomatch'] = 'De velden in je foreign key moeten in dezelfde volgorde opgelijst worden als ze staan in de UNIQUE KEY in de gerefereerde tabel.';
$string['missing'] = 'Ontbrekend';
$string['missingindexes'] = 'Ontbrekende indexen gevonden';
$string['mustselectonefield'] = 'Je moet één veld selecteren om de gerelateerde acties te kunnen zien!';
$string['mustselectoneindex'] = 'Je moet één index selecteren om de gerelateerde acties te kunnen zien!';
$string['mustselectonekey'] = 'Je moet één sleutel selecteren om de gerelateerde acties te kunnen zien!';
$string['newfield'] = 'Nieuw veld';
$string['newindex'] = 'Nieuwe index';
$string['newkey'] = 'Nieuwe sleutel';
$string['newtable'] = 'Nieuwe tabel';
$string['newtablefrommysql'] = 'Nieuwe tabel van MySQL';
$string['new_table_from_mysql'] = 'Nieuwe tabel van MySQL';
$string['nofieldsspecified'] = 'Geen velden opgegeven';
$string['nomasterprimaryuniquefound'] = 'De kolom(men) waarnaar jouw foreign key refereert moet inbegrepen zijn in een primary key of een unique key in de gerefereerde tabel. Merk op, het is niet goed genoeg als de kolom een unieke index is.';
$string['nomissingindexesfound'] = 'Er zijn geen ontbrekende indexen gevonden, er moet niets aan je databank gewijzigd worden.';
$string['noreffieldsspecified'] = 'Geen referentievelden opgegeven';
$string['noreftablespecified'] = 'Opgegeven referentietabel niet gevonden';
$string['noviolatedforeignkeysfound'] = 'Geen foute foreign keys gevonden';
$string['nowrongdefaultsfound'] = 'Er werden geen inconsistente standaardwaarden gevonden; Je databank is in orde.';
$string['nowrongintsfound'] = 'Geen foute integers gevonden - er is verder geen actie nodig.';
$string['nowrongoraclesemanticsfound'] = 'Geen Oracle-kolommen met BYTE semantics gevonden. Je databank is in orde.';
$string['numberincorrectdecimals'] = 'Fout aantal decimalen voor numeriek veld';
$string['numberincorrectlength'] = 'Foute lengte voor numeriek veld';
$string['pendingchanges'] = 'Opmerking: je hebt wijzigingen aan dit bestand aangebracht. Ze kunnen elk moment opgeslagen worden.';
$string['pendingchangescannotbesaved'] = 'Er zijn wijzigingen in dit bestand, maar ze kunnen niet bewaard worden! Controleer dat de webserver schrijfrechten heeft, zowel op de map als op het bestand install.xml ';
$string['pendingchangescannotbesavedreload'] = 'Er zijn wijzigingen in dit bestand, maar ze kunnen niet bewaard worden! Controleer dat de webserver schrijfrechten heeft, zowel op de map als op het bestand install.xml. Herlaad dan deze pagina en je zou de wijzigingen moeten kunnen bewaren.';
$string['pluginname'] = 'XMLDB editor';
$string['primarykeyonlyallownotnullfields'] = 'Primaire sleutel kan niet nul zijn';
$string['reserved'] = 'Gereserveerd';
$string['reservedwords'] = 'Gereserveerde woorden';
$string['revert'] = 'Maak ongedaan';
$string['revert_changes'] = 'Maak wijzigingen ongedaan';
$string['save'] = 'Bewaar';
$string['searchresults'] = 'Zoekresultaten';
$string['selectaction'] = 'Kies actie:';
$string['selectdb'] = 'Kies databank:';
$string['selectfieldkeyindex'] = 'Selecteer veld/sleutel/index:';
$string['selectonecommand'] = 'Kies één actie uit de lijst om de PHP-code zien';
$string['selectonefieldkeyindex'] = 'Selecteer één veld/sleutel/index uit de lijst op de PHP-code te zien';
$string['selecttable'] = 'Selecteer tabel:';
$string['table'] = 'Tabel';
$string['tablenameempty'] = 'De tabelnaam kan niet leeg zijn';
$string['tables'] = 'Tabellen';
$string['unload'] = 'Laad niet';
$string['up'] = 'Omhoog';
$string['view'] = 'Bekijk';
$string['viewedited'] = 'Bekijk bewerkt';
$string['vieworiginal'] = 'Bekijk origineel';
$string['viewphpcode'] = 'Bekijk PHP code';
$string['view_reserved_words'] = 'Bekijk gereserveerde woorden';
$string['viewsqlcode'] = 'Bekijk SQL code';
$string['view_structure_php'] = 'Bekijk PHP-structuur';
$string['view_structure_sql'] = 'Bekijk SQL-struktuur';
$string['view_table_php'] = 'Bekijk tabel PHP';
$string['view_table_sql'] = 'Bekijk tabel SQL';
$string['viewxml'] = 'XML';
$string['violatedforeignkeys'] = 'Geschonden foreign keys';
$string['violatedforeignkeysfound'] = 'Geschonden foreign keys gevonden';
$string['violations'] = 'Schendingen';
$string['wrong'] = 'Fout';
$string['wrongdefaults'] = 'Verkeerde standaardwaarden gevonden';
$string['wrongints'] = 'Foute integers gevonden';
$string['wronglengthforenum'] = 'Lengte van enum veld fout';
$string['wrongnumberofreffields'] = 'Fout aantal referentievelden';
$string['wrongoraclesemantics'] = 'Verkeerde Oracle BYTE semantiek gevonden';
$string['wrongreservedwords'] = 'Gebruikte gereserveerde woorden<br />(merk op dat tabelnamen niet belangrijk zijn als je *CFG->prefix gebruikt)';
$string['yesmissingindexesfound'] = 'Er zijn ontbrekende indexen gevonden in je databank. Hier vind je de details en de nodige SQL-statements om uit te voeren in je favoriete SQL interface om de indexen aan te maken. <br /><br />Nadat je dit gedaan hebt, is het ten zeerste aangeraden deze functie nogmaals te laten lopen om te controleren of er niet meer ontbrekende indexen gevonden kunnen worden.';
$string['yeswrongdefaultsfound'] = 'Er zijn inconsistenties gevonden in je databank. Hier zijn de juiste standaardwaarden en de nodige SQL-expressies om uit te voeren in je favoriete SQL-interface om ze allemaal te herstellen (vergeet niet je databank te back-uppen voor je dddat doet).<br /><br />
Daarna is het ten zeerste aangeraden om dit script nogmaals te laten lopen om te zoeken naar meer inconsistenties.';
$string['yeswrongintsfound'] = 'Er zijn foute integers gevonden in je databank. Hier vind je de details en de nodige SQL-statements om uit te voeren in je favoriete SQL interface ze te herstellen. <br /><br />Nadat je dit gedaan hebt, is het ten zeerste aangeraden deze functie nogmaals te laten lopen om te controleren of er niet meer foute integers gevonden kunnen worden.';
$string['yeswrongoraclesemanticsfound'] = 'Er zijn Oracle kolommen die BYTE semantics gebruiken gevonden in je databank. Hier zijn de details en de nodige SQL om uit te voeren met je favoriete SQL interface om ze allemaal te herstellen. <br /><br />Nadat je dit gedaan hebt, kun je dit best nog eens uitvoeren om te controleren of er niet meer foute semantics gevonden kunnen worden.';
