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
 * Strings for component 'install', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   install
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['admindirerror'] = 'De admin-map die je opgeeft is niet juist';
$string['admindirname'] = 'Admin-map';
$string['admindirsetting'] = 'Enkele webhosts gebruiken /admin als speciale URL  om je toegang te geven tot een controlepaneel of iets dergelijks. Jammer genoeg geeft dit conflicten met de standaardmap voor de Moodle-beheerpagina\'s. Je kunt dit toch aan het werk krijgen door de adminmap van jouw installatie te hernoemen en deze nieuwe mapnaam hier te zetten. Bijvoorbeeld <br /> <br /><b>moodleadmin</b><br /> <br />. Dit zal alle beheerlinks in Moodle aanpassen.';
$string['admindirsettinghead'] = 'Admin-map instellen..';
$string['admindirsettingsub'] = 'Enkele webhosts gebruiken /admin als een speciale url om een controle paneel of iets dergelijks te openen. Dat kan jammer genoeg conflict geven met de standaardlocatie van de Moodle admin pagina\'s. Je kunt dit in orde brengen door de adminmap van Moodle hier te hernoemen en die nieuwe naam hier te zetten, bijvoorbeeld <br /><br /><b>moodleadmin</b><br /><br  />Dit zal de links naar de adminmap in Moodle herstellen.';
$string['availablelangs'] = 'Beschikbare taalpakketten';
$string['caution'] = 'Opgelet';
$string['chooselanguage'] = 'Kies een taal';
$string['chooselanguagehead'] = 'Kies een taal';
$string['chooselanguagesub'] = 'Kies een taal voor de installatie. Deze taal zal ook als standaardtaal voor de site gebruikt worden, maar die instelling kun je later nog wijzigen.';
$string['cliadminpassword'] = 'Nieuw beheerderswachtwoord';
$string['cliadminusername'] = 'Gebruikersnaam voor de beheerdersaccount';
$string['clialreadyconfigured'] = 'Bestand config.php bestaat al, maak aub gebruik van admin/cli/install_database.php indien je deze site wenst te installeren.';
$string['clialreadyinstalled'] = 'Bestand config.php bestaat al. Gebruik admin/cil/upgrade.php om je site te upgraden.';
$string['cliinstallfinished'] = 'Installatie met succes beëindigd.';
$string['cliinstallheader'] = 'Moodle {$a} command line installatieprogramma';
$string['climustagreelicense'] = 'In niet interactieve modus moet je akkoord gaan met de licentievoorwaarden door de --agree-license optie op te geven.';
$string['clitablesexist'] = 'Databanktabellen bestaan al, cli-installatie kan niet verder gaan.';
$string['compatibilitysettings'] = 'Bezig met je PHP-instellingen te controleren ...';
$string['compatibilitysettingshead'] = 'Bezig met je PHP-instellingen te controleren ...';
$string['compatibilitysettingssub'] = 'Om Moodle goed te laten werken, moet je server slagen voor al deze testen.';
$string['configfilenotwritten'] = 'Het installatiescript kon het bestand config.php met jouw gekozen instellingen niet automatisch aanmaken.  Kopieer de volgende code in een bestand dat je config.php noemt en plaats dat in de rootmap van Moodle.';
$string['configfilewritten'] = 'Het maken van config.php is gelukt';
$string['configurationcomplete'] = 'De configuratie is volledig';
$string['configurationcompletehead'] = 'Configuratie klaar';
$string['configurationcompletesub'] = 'Moodle probeerde je configuratie te bewaren in een bestand in de root van je installatie.';
$string['database'] = 'Databank';
$string['databasehead'] = 'Databankinstellingen';
$string['databasehost'] = 'Databank host:';
$string['databasename'] = 'Datanbanknaam:';
$string['databasepass'] = 'Databank wachtwoord:';
$string['databaseport'] = 'Databank poort';
$string['databasesocket'] = 'Unix socket';
$string['databasetypehead'] = 'Kies databankdriver';
$string['databasetypesub'] = 'Moodle ondersteunt verschillende types databankservers. Contacteer je serverbeheerder als je niet weet welk type je moet gebruiken.';
$string['databaseuser'] = 'Databank gebruikersnaam:';
$string['dataroot'] = 'Gegevensmap';
$string['datarooterror'] = 'De \'data-map\' die je opgaf kon niet gevonden of gemaakt worden. Verbeter ofwel het pad of maak die map manueel.';
$string['datarootpermission'] = 'Toestemming datamappen';
$string['datarootpublicerror'] = 'De data-map die je geeft is rechtstreeks toegankelijk vanaf het internet. Je moet een andere map kiezen.';
$string['dbconnectionerror'] = 'We konden geen verbinding maken met de databank die je opgegeven hebt. Controleer je databankinstellingen';
$string['dbcreationerror'] = 'Probleem met het opbouwen van de databank. De databanknaam kon niet aangemaakt worden met de gegevens die je opgegeven hebt';
$string['dbhost'] = 'Hostserver';
$string['dbpass'] = 'Wachtwoord';
$string['dbport'] = 'Poort';
$string['dbprefix'] = 'Tabelvoorvoegsel';
$string['dbtype'] = 'Type';
$string['directorysettings'] = '<p>Bevestig de verschillende lokaties voor deze Moodle-installatie.</p>

<p><b>Webadres:</b>
Geef hier het volledige webadres op langswaar je toegang tot Moodle geeft. Als je website vanaf verschillende URL\'s toegankelijk is, kies dan diegene die je leerlingen zullen gebruiken. Voeg achteraan het adres geen schuine streep toe.</p>

<p><b>Moodle-map</b>
Geef het volledige fysieke pad van het besturingssysteem naar diezelfde lokatie. Let op dat je hoofdletters en kleine letters juist zet.</p>

<p><b>Data-map:</b>
Je moet een plaats voorzien waar Moodle geüploade bestanden kan plaatsen. Deze map moet leesbaar EN BESCHRIJFBAAR zijn door de webserver (meestal gebruiker \'nobody\' of \'apache\'), maar ze mag niet rechtstreeks leesbaar zijn vanaf het internet.</p>';
$string['directorysettingshead'] = 'Bevestig de locaties voor dese Moodle-installatie';
$string['directorysettingssub'] = '<b>Webadres:</b>
Geef hier het volledig webadres (URL) langswaar moodle zall bekeken worden. Als je website via verschillende URL\'s toegankelijk is, kies dan diegene die je leerlingen normaal zullen gebruiken. Opgelet, geen schuine streep achteraan.
<br />
<br />
<b>Moodle installatiemap:</b>
Geef het volledige pad naar deze installatie. Zorg er voor dat je hoofdletters/kleine letters respecteert.
<br />
<br />
<b>Datamap:</b>
Je hebt een plaats nodig waar Moodle bestanden kan opslaat. Deze map moet leesbaar EN BESCHRIJFBAAR zijn door de webserver (meestal gebruikersnaam nobody, apache of www-data), maar mag niet rechtstreeks toegankelijk zijn via het web.';
$string['dirroot'] = 'Moodle-map';
$string['dirrooterror'] = 'De instelling voor \'Moodle-map\' was niet juist - we kunnen daar geen Moodle-installatie vinden. Onderstaande waarde is gereset.';
$string['download'] = 'Download';
$string['downloadlanguagebutton'] = 'Download het "{$a}" taalpakket';
$string['downloadlanguagehead'] = 'Download taalpakket';
$string['downloadlanguagenotneeded'] = 'Je kunt het installatieproces verder laten lopen met het standaard taalpakket, "{$a}".';
$string['downloadlanguagesub'] = 'Je kun nu een taalpakket downloaden en de installatie in die taal verder zetten.<br /><br />Als je dit taalpakket niet kunt downloaden, dan zal de installatie in het Engels verder gaan. (Als de installatie is voltooid, krijg je terug de mogelijkheid om nieuwe taalpakketten te downloaden en te installeren)';
$string['doyouagree'] = 'Ben je akkoord? (ja/nee):';
$string['environmenthead'] = 'Omgeving controleren ...';
$string['environmentsub'] = 'We controleren nu of de versies van verschillende componenten van je server voldoen aan de systeemvereisten van Moodle';
$string['environmentsub2'] = 'Elke Moodleversie vraagt een minimale PHP-versie en een aantal vereiste PHP-extenties.
De volledige installatie-omgeving wordt gecontroleerd voor elke installatie en upgrade. Contacteer je server beheerder als je niet weet hoe je de juiste PHP-versie moet installeren of PHP-extenties moet inschakelen.';
$string['errorsinenvironment'] = 'Fouten in je omgeving!';
$string['fail'] = 'Mislukt';
$string['fileuploads'] = 'Bestanden uploaden';
$string['fileuploadserror'] = 'Dit moet ingeschakeld zijn';
$string['fileuploadshelp'] = '<p>Het lijkt er op dat het uploaden van bestanden uitgeschakeld is op jouw server.</p>
<p>Moodle kan verder geïnstalleerd worden, maar zonder deze mogelijkheid zul je geen cursusmateriaal of afbeeldingen voor de profielen van je gebruikers kunnen uploaden.</p>
<p>Om het uploaden van bestanden in te schakelen moet je (of je systeembeheerder) php.ini op je systeem bewerken en volgende instelling wijzigen:
<b>file_uploads</b> op \'1\' zetten.</p>';
$string['inputdatadirectory'] = 'Data map:';
$string['inputwebadress'] = 'Web adres:';
$string['inputwebdirectory'] = 'Moodle map:';
$string['installation'] = 'Installatie';
$string['langdownloaderror'] = 'De taal "{$a}" kon niet worden gedownload. Het installatieproces gaat verder in het Engels.';
$string['langdownloadok'] = 'De taal "{$a}" is met succes geïnstalleerd. Het installatieproces zal in deze taal verder gaan.';
$string['magicquotesruntime'] = 'Magic Quotes runtime';
$string['magicquotesruntimeerror'] = 'Dit moet uitgeschakeld zijn';
$string['magicquotesruntimehelp'] = '<p>Magic Quotes runtime moet uitgeschakeld zijn om Moodle goed te laten functioneren.</p>
<p>Normaal staat het af als standaardinstelling ... zie de instelling <b>magic_quotes_runtime</b> in je php.ini-bestand.</p>
<p>Als je geen toegang hebt tot php.ini, dan kun je proberen om onderstaande lijn in een bestand te zetten dat je .htaccess noemt en dat dan in je Moodle-map plaatsen: <blockquote><div>php_value magic_quotes_runtime Off</div></blockquote></p>';
$string['memorylimit'] = 'Geheugenlimiet';
$string['memorylimiterror'] = 'De PHP-geheugenlimiet staat eerder laag ingesteld ...  je zou hierdoor later problemen kunnen krijgen.';
$string['memorylimithelp'] = '<p>De PHP-geheugenlimiet van je server is ingesteld op {$a}.</p>
<p>Hierdoor kan Moodle geheugenproblemen krijgen, vooral als je veel modules installeert en/of veel gebruikers hebt.</p>

<p>We raden je aan PHP met een hogere geheugenlimiet te configureren indien mogelijk, bijvoorbeeld 40Mb. Er zijn verschillende mogelijkheden om dat te doen. Je kunt proberen:
<ol>
<li>Indien je kunt PHP hercompileren met <i>--enable-memory-limit</i>.
Hierdoor kan Moodle zelf zijn geheugenlimiet instellen.
<li>Als je toegang hebt tot het php.ini-bestand, kun je de <b>memory_limit</b>-instelling veranderen naar bv 40Mb. Als je geen toegang hebt kun je je systeembeheerder vragen dit voor je te wijzigen.</li>
<li>Op sommige PHP-servers kun je een .htaccess-bestand maken in de Moodle-map met volgende lijn: <p><blockquote>php_value memory_limit 40M</blockquote></p>
<p>Opgelet: op sommige servers zal dit verhinderen dat <b>alle</b> PHP-bestanden uitgevoerd worden. (je zult foutmeldingen zien wanneer je naar php-pagina\'s kijkt) Je zult dan het .htaccess-bestand moeten verwijderen.</li>
</ol>';
$string['mssqlextensionisnotpresentinphp'] = 'PHP is niet juist geconfigureerd met de MSSQL-extentie en kan niet communiceren met SQL*Server. Controleer je php.ini-bestand of hercompileer PHP';
$string['mysqliextensionisnotpresentinphp'] = 'PHP is niet goed geconfigureerd - het kan niet communiceren met MySQL. Controleer je php.ini bestand of hercompileer PHP. De MySQLi-extentie is niet beschikbaar voor PHP 4.';
$string['nativemariadb'] = 'MariaDB (native/mariadb)';
$string['nativemariadbhelp'] = 'Je moet nu de databank configureren. De databank zou kunnen automatisch aangemaakt worden als de opgegeven databankgebruiker de juiste rechten heeft. De gebruikersnaam en wachtwoord moeten al bestaan. het tabelprefix is optioneel.  Deze driver is niet compatibel met de verouderde MyISAM engine.';
$string['nativemssql'] = 'SQL*Server FreeTDS (native/mssql)';
$string['nativemssqlhelp'] = 'Nu moet je de databank waar de meeste gegevens van Moodle bewaard worden gaan configureren. Deze databank moet al gemaakt zijn en je moet een gebruikersnaam en wachtwoord hebben om er toegang toe te krijgen. Een tabelprefix is verplicht.';
$string['nativemysqli'] = 'Improved MySQL (native/mysqli)';
$string['nativemysqlihelp'] = 'Nu moet je de databank configureren waar de meeste Moodlegegevens bewaard zullen worden.
De databank kan aangemaakt worden als de databankgebruiker en wachtwoord bestaat en de juiste rechten heeft.
Een tabelvoorvoegsel is optioneel.';
$string['nativeoci'] = 'Oracle(native/oci)';
$string['nativeocihelp'] = 'Nu moet je de databank waar de meeste gegevens van Moodle bewaard worden gaan configureren. Deze databank moet al gemaakt zijn en je moet een gebruikersnaam en wachtwoord hebben om er toegang toe te krijgen. Een tabelprefix is verplicht.';
$string['nativepgsql'] = 'PostgreSQL (native/pgsql)';
$string['nativepgsqlhelp'] = 'Nu moet je de databank configureren waar de meeste Moodlegegevens bewaard zullen worden.
Deze databank moet al aangemaakt zijn en er moet een gebruikersnaam en wachtwoord aangemaakt zijn met rechten om de databank te gebruiken.
Een tabelvoorvoegsel is optioneel.';
$string['nativesqlsrv'] = 'SQL*Server Microsoft (native/sqlsrv)';
$string['nativesqlsrvhelp'] = 'Nu moet je de databank waar de meeste gegevens van Moodle bewaard worden gaan configureren. Deze databank moet al gemaakt zijn en je moet een gebruikersnaam en wachtwoord hebben om er toegang toe te krijgen. Een tabelprefix is verplicht.';
$string['nativesqlsrvnodriver'] = 'Microsoft Drivers voor SQL Server voor PHP zijn niet geïnstalleerd of niet goed geconfigureerd.';
$string['nativesqlsrvnonwindows'] = 'Microsoft Drivers voor SQL Server voor PHP bestaan alleen voor het Windows OS';
$string['ociextensionisnotpresentinphp'] = 'PHP is niet juist geconfigureerd met de OCI8-extentie en kan niet communiceren met Oracle. Controleer je php.ini-bestand of hercompileer PHP.';
$string['pass'] = 'OK';
$string['paths'] = 'Paden';
$string['pathserrcreatedataroot'] = 'Datamap ({$a->dataroot}) kan niet aangemaakt worden door het installatiescript';
$string['pathshead'] = 'Bevestig paden';
$string['pathsrodataroot'] = 'De dataroot map is niet beschrijfbaar.';
$string['pathsroparentdataroot'] = 'De bovenliggende map ({$a->parent}) is niet beschrijfbaar. De datamap ({$a->dataroot}) kan niet aangemaakt worden door het installatiescript';
$string['pathssubadmindir'] = 'Sommige webhosts gebruiken /admin als een speciale url om toegang tot bijvoorbeeld een controlepaneel te krijgen. Dit kan conflicten veroorzaken met de standaardlocatie van de Moodle admin scripts. Je kunt dit oplossen door de admin map van Moodle te hernoemen en de nieuwe naam hier te zetten. Bijvoorbeeld <em>moodleadmin</em>. Dat zal de admin links in Moodle herstellen.';
$string['pathssubdataroot'] = 'Je hebt een plaats nodig waar Moodle geüploade bestanden kan bewaren. Deze map moet leesbaar en BESCHRIJFBAAR zijn door de webserver gebruiker (gewoonlijk \'nobody\', \'apache\' of www-data\') en mag niet rechtstreeks toegankelijk zijn vanaf het internet.';
$string['pathssubdirroot'] = 'Volledig pad naar de Moodle-installatie.';
$string['pathssubwwwroot'] = 'Volledig webadres waarlangs de toegang naar Moodle zal gebeuren. Het is niet mogelijk toegang tot Moodle te krijgen via meerdere adressen. Als je site meerdere publieke adressen heeft, dan zul je permanente verwijzingen moeten opzetten voor al die adressen, behalve voor wat je hier invult. Als je site zowel van het internet als van een intranet toegankelijk is, zet dat het internetadres hier en wijzig je DNS-instellingen zodanig dat intranetgebruikers dit publieke adres ook gebruiken.
Als het adres niet juist is, wijzig dan de URL in je browser om de installatie met een andere waarde te starten.';
$string['pathsunsecuredataroot'] = 'De plaats van de datamap is niet veilig.';
$string['pathswrongadmindir'] = 'De adminmap bestaat niet';
$string['pgsqlextensionisnotpresentinphp'] = 'PHP is niet juist geïnstalleerd met de PGSQL-extentie en kan niet communiceren met PostgreSQL. Controleer je php.ini-bestand of hercompileer PHP.';
$string['phpextension'] = '{$a} PHP-extentie';
$string['phpversion'] = 'PHP-versie';
$string['phpversionhelp'] = '<p>Moodle heeft minstens PHP-versie 4.3.0 of 5.1.0 nodig (5.0.x heeft veel bekende problemen).</p> <p>De huidige versie op je server is {$a}</p>
<p>Je moet PHP upgraden of verhuizen naar een host met een nieuwere versie van PHP!<br />(Als je 5.0.x draait, kun je ook downgraden naar versie 4.4.x)</p>';
$string['releasenoteslink'] = 'Informatie over deze Moodleversie kun je vinden in de Release Notes op {$a}';
$string['safemode'] = 'Safe Mode';
$string['safemodeerror'] = 'Moodle kan bestanden niet juist behandelen met safe mode ingeschakeld';
$string['safemodehelp'] = '<p>Moodle zal heel wat problemen vertonen met safe mode ingeschakeld, waaronder bijvoorbeeld het niet kunnen aanmaken van nieuwe bestanden.</p>
<p>Safe mode is gewoonlijk alleen maar ingeschakeld bij paranoïde webhosts, je zult dus best op zoek gaan naar een nieuwe webhost voor je Moodlesite.</p>
<p>Je kunt proberen verder te gaan met de installatie als je dat wil, maar verwacht je wat verder door aan heel wat problemen.</p>';
$string['sessionautostart'] = 'Session Auto Start';
$string['sessionautostarterror'] = 'Dit moet uitgeschakeld zijn';
$string['sessionautostarthelp'] = '<p>Moodle heeft session support nodig en zal zonder niet werken.</p>
<p>Sessies kunnen ingeschakeld worden in het php.ini-bestand ... zoek naar de session.auto_start parameter.</p>';
$string['sqliteextensionisnotpresentinphp'] = 'PHP is niet juist geconfigureerd met de SQLite extentie. Controleer je php.ini-bestand of hercompileer PHP.';
$string['upgradingqtypeplugin'] = 'Upgraden vraagtype plugin';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'Je krijgt deze pagina te zien omdat je met succes het <strong>{$a->packname} {$a->packversion}</strong> packet op je computer gezet en gestart hebt. Proficiat!';
$string['welcomep30'] = 'Deze uitgave van <strong>{$a->installername}</strong> bevat de software die nodig is om een omgeving te creëren waarin <strong>Moodle</strong> zal werken, namelijk:';
$string['welcomep40'] = 'Dit pakket bevat ook <strong>Moodle {$a->moodlerelease} ({$a->moodleversion})</strong>.';
$string['welcomep50'] = 'Het gebruik van alle programma\'s in dit pakket wordt geregeld door hun respectievelijke licenties. Het complete <strong>{$a->installername}</strong> pakket is
<a href="http://www.opensource.org/docs/definition_plain.html">open source</a> en wordt verdeeld onder de <a href="http://www.gnu.org/copyleft/gpl.html">GPL</a> licentie.';
$string['welcomep60'] = 'De volgende pagina\'s leiden je door een aantal makkelijk te volgen stappen om <strong>Moodle</strong> te installeren op je computer. Je kunt de standaardinstellingen overnemen of, optionneel, ze aanpassen aan je noden.';
$string['welcomep70'] = 'Klik op de "volgende"-knop om verder te gaan met de installatie van <strong>Moodle</strong>';
$string['wwwroot'] = 'Web adres';
$string['wwwrooterror'] = 'Het webadres lijkt niet geldig te zijn - deze Moodle-installatie is blijkbaar niet op die plaats.
Onderstaande waarde is opnieuw ingesteld.';
