<?PHP // $Id: xmldb.php,v 1.14 2010/02/09 10:35:41 koenr Exp $ 
      // xmldb.php - created with Moodle 1.9.7+ (Build: 20100208) (2007101571.04)


$string['aftertable'] = 'Tabel resultaat:';
$string['back'] = 'Terug';
$string['backtomainview'] = 'Terug naar Hoofd';
$string['binaryincorrectlength'] = 'Foute lengte voor binair veld';
$string['butis'] = 'maar is';
$string['cannotuseidfield'] = 'Kan het \"id\"-veld niet invullen: dit is een autonummeringskolom';
$string['change'] = 'Wijzig';
$string['charincorrectlength'] = 'Foute lengte voor char veld';
$string['check_bigints'] = 'Zoek foute DB integers';
$string['check_defaults'] = 'Zoek naar onconsistente standaardwaarden';
$string['check_indexes'] = 'Zoek ontbrekende DB indexen';
$string['checkbigints'] = 'Controleer Bigints';
$string['checkdefaults'] = 'Controleer standaardwaarden';
$string['checkindexes'] = 'Controleer indexen';
$string['completelogbelow'] = '(complete log van zoeken onderaan)';
$string['confirmcheckbigints'] = 'Deze functie zal zoeken naar <a href=\"http://tracker.moodle.org/browse/MDL-11038\"> mogelijk foute integer velden op je Moodle server, en hierbij automatisch de nodige SQL-statements genereren (maar niet uitvoeren!) om alle integer velden in je DB juist te zetten. Eens gegenereerd kun je die statements kopiëren en veilig uitvoeren in je favoriete SQL-interface<br /><br />
Het is ten zeerste aangeraden de laatst beschikbare (+ versie) Moodleversie te gebruiken voor je zoekt naar foute integers.<br /><br />
Deze functie schrijft niets weg in de databank (enkel lezen), en kan dus veilig uitgevoerd worden op elk moment.';
$string['confirmcheckdefaults'] = 'Deze functie zoekt naar inconsistente standaardwaarden in je Moodleserver. De SQL-statements, nodig om de standaardwaarden juist te definiëren, worden daarbij gegenereerd (maar niet uitgevoerd!).<br /><br />
Als die gegenereerd zijn, kun je ze uitvoeren in je favoriete SQL-interface (vergeet niet je databank te backuppen voor je dat doet).<br /><br />
Het is ten zeerste aangeraden om de laatste beschikbare +-versie van je Moodleversie te gebruiken voor je gaatzoeken naar inconsistente standaardwaarden.<br /><br />
Deze actie leest alleen je databank en kan dus altijd veilig uitgevoerd worden.';
$string['confirmcheckindexes'] = 'Deze functie zal zoeken naar mogelijk ontbrekende indexen op je Moodle server, en hierbij automatisch de nodige SQL-statements genereren (maar niet uitvoeren!) om alles up to date te houden. Eens gegenereerd kun je die statements kopiëren en veilig uitvoeren in je favoriete SQL-interface<br /><br />
Het is ten zeerste aangeraden de laatst beschikbare (+ versie) Moodleversie te gebruiken voor je zoekt naar ontbrekende indexen.<br /><br />
Deze functie schrijft niets weg in de databank (enkel lezen), en kan dus veilig uitgevoerd worden op elk moment.';
$string['confirmdeletefield'] = 'Ben je zeker dat je dit veld wil verwijderen:';
$string['confirmdeleteindex'] = 'Ben je zeker dat je deze index wil verwijderen:';
$string['confirmdeletekey'] = 'Ben je zeker dat je deze sleutel wil verwijderen:';
$string['confirmdeletesentence'] = 'Ben je zeker dat je deze zin wil verwijderen:';
$string['confirmdeletestatement'] = 'Ben je zeker dat je deze stelling en al deze zinnen wil verwijderen:';
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
$string['delete_sentence'] = 'Verwijder zin';
$string['delete_statement'] = 'Verwijder stelling';
$string['delete_table'] = 'Verwijder tabel';
$string['delete_xml_file'] = 'Verwijder XML-bestand';
$string['down'] = 'Omlaag';
$string['duplicate'] = 'Dupliceer';
$string['duplicatefieldname'] = 'Er bestaat al een veld met die naam';
$string['edit'] = 'Bewerk';
$string['edit_field'] = 'Bewerk veld';
$string['edit_index'] = 'Bewerk index';
$string['edit_key'] = 'Bewerk sleutel';
$string['edit_sentence'] = 'Bewerk zin';
$string['edit_statement'] = 'Bewerk stelling';
$string['edit_table'] = 'Bewerk tabel';
$string['edit_xml_file'] = 'Bewerk XML-bestand';
$string['enumvaluesincorrect'] = 'Foute waarden voor enum veld';
$string['field'] = 'Veld';
$string['fieldnameempty'] = 'Naam veld leeg';
$string['fields'] = 'Velden';
$string['filenotwriteable'] = 'Bestand niet beschrijfbaar';
$string['floatincorrectdecimals'] = 'Fout aantal decimalen voor float veld';
$string['floatincorrectlength'] = 'Foute lengte voor float veld';
$string['gotolastused'] = 'Laatst gebruikte bestand';
$string['incorrectfieldname'] = 'Foute naam';
$string['index'] = 'Index';
$string['indexes'] = 'Indexen';
$string['integerincorrectlength'] = 'Foute lengte voor integer veld';
$string['key'] = 'Sleutel';
$string['keys'] = 'Sleutels';
$string['listreservedwords'] = 'Lijst van gereserveerde woorden<br /> (gebruikt om <a href=\"http://docs.moodle.org/en/XMLDB_reserved_words\" target=\"_blank\">XMLDB_reserved_words</a> up to date te houden)';
$string['load'] = 'Laden';
$string['main_view'] = 'Hoofdscherm';
$string['missing'] = 'Ontbrekend';
$string['missingfieldsinsentence'] = 'Ontbrekende bestanden in zin';
$string['missingindexes'] = 'Ontbrekende indexen gevonden';
$string['missingvaluesinsentence'] = 'Ontbrekende waarden in zin';
$string['mustselectonefield'] = 'Je moet één veld selecteren om de gerelateerde acties te kunnen zien!';
$string['mustselectoneindex'] = 'Je moet één index selecteren om de gerelateerde acties te kunnen zien!';
$string['mustselectonekey'] = 'Je moet één sleutel selecteren om de gerelateerde acties te kunnen zien!';
$string['mysqlextracheckbigints'] = 'Onder MySQL zoekt dit ook naar foute bigints en genereert de vereiste SQL om uit te voeren om ze allen te herstellen';
$string['new_statement'] = 'Nieuwe stelling';
$string['new_table_from_mysql'] = 'Nieuwe tabel van MySQL';
$string['newfield'] = 'Nieuw veld';
$string['newindex'] = 'Nieuwe index';
$string['newkey'] = 'Nieuwe sleutel';
$string['newsentence'] = 'Nieuwe zin';
$string['newstatement'] = 'Nieuwe stelling';
$string['newtable'] = 'Nieuwe tabel';
$string['newtablefrommysql'] = 'Nieuwe tabel van MySQL';
$string['nomissingindexesfound'] = 'Er zijn geen ontbrekende indexen gevonden, er moet niets aan je databank gewijzigd worden.';
$string['nowrongdefaultsfound'] = 'Er werden geen inconsistente standaardwaarden gevonden; Je databank is in orde.';
$string['nowrongintsfound'] = 'Geen foute integers gevonden - er is verder geen actie nodig.';
$string['numberincorrectdecimals'] = 'Fout aantal deximalen voor numeriek veld';
$string['numberincorrectlength'] = 'Foute lengte voor numeriek veld';
$string['reserved'] = 'Gereserveerd';
$string['reservedwords'] = 'Gereserveerde woorden';
$string['revert'] = 'Maak ongedaan';
$string['revert_changes'] = 'Maak wijzigingen ongedaan';
$string['save'] = 'Bewaar';
$string['searchresults'] = 'Zoekresultaten';
$string['selectaction'] = 'Kies actie';
$string['selectdb'] = 'Kies databank';
$string['selectfieldkeyindex'] = 'Selecteer veld/sleutel/index:';
$string['selectonecommand'] = 'Kies één actie uit de lijst om de PHP-code zien';
$string['selectonefieldkeyindex'] = 'Selecteer één veld/sleutel/index uit de lijst op de PHP-code te zien';
$string['selecttable'] = 'Selecteer tabel:';
$string['sentences'] = 'Zinnen';
$string['shouldbe'] = 'zou moeten zijn';
$string['statements'] = 'Stellingen';
$string['statementtable'] = 'Stellingentabel:';
$string['statementtype'] = 'Stellingtype:';
$string['table'] = 'Tabel';
$string['tables'] = 'Tabellen';
$string['test'] = 'Test';
$string['textincorrectlength'] = 'Foute lengte voor tekstveld';
$string['unload'] = 'Laad niet';
$string['up'] = 'Omhoog';
$string['view'] = 'Bekijk';
$string['view_reserved_words'] = 'Bekijk gereserveerde woorden';
$string['view_structure_php'] = 'Bekijk PHP-structuur';
$string['view_structure_sql'] = 'Bekijk SQL-struktuur';
$string['view_table_php'] = 'Bekijk tabel PHP';
$string['view_table_sql'] = 'Bekijk tabel SQL';
$string['viewedited'] = 'Bekijk bewerkt';
$string['vieworiginal'] = 'Bekijk origineel';
$string['viewphpcode'] = 'Bekijk PHP code';
$string['viewsqlcode'] = 'Bekijk SQL code';
$string['wrong'] = 'Fout';
$string['wrongdefaults'] = 'Verkeerde standaardwaarden gevonden';
$string['wrongints'] = 'Foute integers gevonden';
$string['wronglengthforenum'] = 'Lengte van enum veld fout';
$string['wrongnumberoffieldsorvalues'] = 'Fout aantal velden of waarden in zin';
$string['wrongreservedwords'] = 'Gebruikte gereserveerde woorden<br />(merk op dat tabelnamen niet belangrijk zijn als je *CFG->prefix gebruikt)';
$string['yesmissingindexesfound'] = 'Er zijn ontbrekende indexen gevonden in je databank. Hier vind je de details en de nodige SQL-statements om uit te voeren in je favoriete SQL interface om de indexen aan te maken. <br /><br />Nadat je dit gedaan hebt, is het ten zeerste aangeraden deze functie nogmaals te laten lopen om te controleren of er niet meer ontbrekende indexen gevonden kunnen worden.';
$string['yeswrongdefaultsfound'] = 'Er zijn inconsistenties gevonden in je databank. Hier zijn de juiste standaardwaarden en de nodige SQL-expressies om uit te voeren in je favoriete SQL-interface om ze allemaal te herstellen (vergeet niet je databank te backuppen voor je dddat doet).<br /><br />
Daarna is het ten zeerste aangeraden om dit script nogmaals te laten lopen om te zoeken naar meer inconsistenties.';
$string['yeswrongintsfound'] = 'Er zijn foute integers gevonden in je databank. Hier vind je de details en de nodige SQL-statements om uit te voeren in je favoriete SQL interface ze te herstellen. <br /><br />Nadat je dit gedaan hebt, is het ten zeerste aangeraden deze functie nogmaals te laten lopen om te controleren of er niet meer foute integers gevonden kunnen worden.';
$string['actual'] = 'Actueel'; // ORPHANED
$string['check_foreign_keys'] = 'Zoek foreign key schendingen'; // ORPHANED
$string['checkforeignkeys'] = 'Controleer foreign keys'; // ORPHANED
$string['confirmcheckforeignkeys'] = 'Deze functie zoekt naar mogelijke schendingen van foreign keys, gedefinieerd in de install.xml-definities. (Moodle genereert op dit ogenblik geen foreign key beperkingen in de databank - hierdoor kan er ongeldige data voorkomen.)<br /><br />
Je kunt best de laatste Moodleversie gebruiken (+-versie) die voor jouw Moodle 51.8, 1.9, 2.x ...) beschikbaar is voor je op zoek gaat naar ontbrekende indexen.<br /><br />
Deze functie wijzigt niets aan de databank (enkel lezen). Je kunt dit dus op elk moment veilig uitvoeren.'; // ORPHANED
$string['doc'] = 'Doc'; // ORPHANED
$string['duplicatekeyname'] = 'Er bestaat al een sleutel met die naam'; // ORPHANED
$string['expected'] = 'Verwacht'; // ORPHANED
$string['extensionrequired'] = 'Sorry - the PHP-extentie \'$a\' is vereist voor deze actie. Installeer de extentie als je deze functie wil gebruiken.'; // ORPHANED
$string['fieldsusedinkey'] = 'Dit veld wordt als sleutel gebruikt.'; // ORPHANED
$string['fkviolationdetails'] = 'Foreign key $a->keyname op tabel $a->tablename is geschonden door $a->numviolations van $a->numrows rijen.'; // ORPHANED
$string['generate_documentation'] = 'Documentatie'; // ORPHANED
$string['noviolatedforeignkeysfound'] = 'Geen foute foreign keys gevonden'; // ORPHANED
$string['violatedforeignkeys'] = 'Geschonden foreign keys'; // ORPHANED
$string['violatedforeignkeysfound'] = 'Geschonden foreign keys gevonden'; // ORPHANED
$string['violations'] = 'Schendingen'; // ORPHANED

?>
