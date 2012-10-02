<?PHP // $Id$ 
      // install.php - created with Moodle 1.9.7+ (Build: 20100208) (2007101571.04)


$string['admindirerror'] = 'De admin-map die je opgeeft is niet juist';
$string['admindirname'] = 'Admin-map';
$string['admindirsetting'] = 'Enkele webhosts gebruiken /admin als speciale URL  om je toegang te geven tot een controlepaneel of iets dergelijks. Jammer genoeg geeft dit conflicten met de standaardmap voor de Moodle-beheerpagina\'s. Je kunt dit toch aan het werk krijgen door de adminmap van jouw installatie te hernoemen en deze nieuwe mapnaam hier te zetten. Bijvoorbeeld <br /> <br /><b>moodleadmin</b><br /> <br />. Dit zal alle beheerlinks in Moodle aanpassen.';
$string['admindirsettinghead'] = 'Admin-map instellen..';
$string['admindirsettingsub'] = 'Enkele webhosts gebruiken /admin als een speciale url om een controle paneel of iets dergelijks te openen. Dat kan jammer genoeg conflict geven met de standaardlocatie van de Moodle admin pagina\'s. Je kunt dit in orde brengen door de adminmap van Moodle hier te hernoemen en die nieuwe naam hier te zetten, bijvoorbeeld <br /><br /><b>moodleadmin</b><br /><br  />Dit zal de links naar de adminmap in Moodle herstellen.';
$string['caution'] = 'Opgelet';
$string['chooselanguage'] = 'Kies een taal';
$string['chooselanguagehead'] = 'Kies een taal';
$string['chooselanguagesub'] = 'De taalinstelling die je hier kiest is enkel voor het installatieproces. In één van de volgende schermen zul je de standaardtaal voor de site kunnen kiezen. Bebruikers kunnen als je dat wil, zelf bepalen met welke taal ze werken.';
$string['compatibilitysettings'] = 'Bezig met je PHP-instellingen te controleren ...';
$string['compatibilitysettingshead'] = 'Bezig met je PHP-instellingen te controleren ...';
$string['compatibilitysettingssub'] = 'Om Moodle goed te laten werken, moet je server slagen voor al deze testen.';
$string['configfilenotwritten'] = 'Het installatiescript kon het bestand config.php met jouw gekozen instellingen niet automatisch aanmaken.  Kopieer de volgende code in een bestand dat je config.php noemt en plaats dat in de rootmap van Moodle.';
$string['configfilewritten'] = 'Het maken van config.php is gelukt';
$string['configurationcomplete'] = 'De configuratie is volledig';
$string['configurationcompletehead'] = 'Configuratie klaar';
$string['configurationcompletesub'] = 'Moodle probeerde je configuratie te bewaren in een bestand in de root van je installatie.';
$string['database'] = 'Databank';
$string['databasecreationsettings'] = 'Nu moet je de databank configureren waar de meeste gegevens van Moodle bewaard zullen worden. Deze databank zal automatisch gecreëerd worden door de Moodle4Windows installatietechnologie met de onderstaande instellingen.<br />
<br /> <br />
<b>Type:</b> vastgezet op \"mysql\" door de installatie.<br />
<b>Host:</b> vastgezet op \"localhost\" door de installatie.<br />
<b>Naam:</b> naam voor de databank, bijvoorbeeld moodle<br />
<b>Gebruiker:</b> vastgezet op \"root\" door de installatie.<br />
<b>Wachtwoord:</b> jouw wachtwoord voor de databank.<br />
<b>Tabelvoorvoegsel:</b> optionneel voorvoegsel om de naam van alle tabellen mee te beginnen.';
$string['databasecreationsettingshead'] = 'Nu moet je de databankinstellingen configureren. In deze databank zullen de meeste gegevens van Moodle opgeslagen worden. De databank zal automatisch gemaakt worden door het installatiescript met volgende instellingen.';
$string['databasecreationsettingssub'] = '<b>Type:</b> \"mysql\" gekozen door het installatiescript<br />
<b>Host:</b> \"localhost\" gekozen door het installatiescript<br />
<b>Naam:</b> database naam, bv moodle<br />
<b>Gebruiker:</b> \"root\" gekozen door het installatiescript<br />
<b>Wachtwoord:</b> het wachtwoord van jouw databank<br />
<b>Tabelvoorvoegsel:</b> een voorvoegsel dat je wil gebruiken voor alle tabelnamen.';
$string['databasesettings'] = 'Nu moet je de databank voor de gegevens van Moodle configureren. Deze databank zou je al aangemaakt moeten hebben, samen met een gebruikersnaam en wachtwoord voor toegang tot die databank.<br />
<br /> <br />
<b>Type:</b> mysql of postgres7<br />
<b>Host Server:</b> bv localhost of db.isp.com<br />
<b>Naam:</b> databanknaam, bv moodle<br />
<b>Gebruiker: de gebruikersnaam voor je databank<br />
<b>Wachtwoord:</b> het wachtwoord voor je databank<br />
<b>Tabelvoorvoegsel:</b> een voorvoegsel dat je wil gebruiken voor alle tabelnamen';
$string['databasesettingshead'] = 'Nu moet je de databank waarin Moodle geïnstalleerd zal worden, configureren. Deze databank moet al aangemaakt zijn en je hebt een gebruikersnaam en wachtwoord ervan nodig om Moodle toegang te geven.';
$string['databasesettingssub'] = '<b>Type:</b> mysql of postgres7<br />
<b>Host:</b> vb localhost of db.isp.com<br />
<b>Naam:</b> database naam, vb moodle<br />
<b>Gebruiker:</b> de gebruikersnaam voor jouw database<br />
<b>Wachtwoord:</b> het wachtwoord voor je databank<br />
<b>Tabelvoorvoegsel:</b> een voorvoegsel dat je wil gebruiken voor alle tabelnamen';
$string['databasesettingssub_mssql'] = '<b>Type:</b> SQL*Server (geen UTF-8)<b><font color=\"red\">Experimenteel! (niet voor gebruik op productiemachine)</font></b><br />
<b>Host:</b> vb localhost of db.isp.com<br />
<b>Naam:</b> database naam, vb moodle<br />
<b>Gebruiker:</b> de gebruikersnaam voor jouw database<br />
<b>Wachtwoord:</b> het wachtwoord voor je databank<br />
<b>Tabelvoorvoegsel:</b>voorvoegsel voor alle tabelnamen (verplicht)';
$string['databasesettingssub_mssql_n'] = '<b>Type:</b> SQL*Server (UTF-8 ingeschakeld)<br />
<b>Host:</b> vb localhost of db.isp.com<br />
<b>Naam:</b> database naam, vb moodle<br />
<b>Gebruiker:</b> de gebruikersnaam voor jouw database<br />
<b>Wachtwoord:</b> het wachtwoord voor je databank<br />
<b>Tabelvoorvoegsel:</b>voorvoegsel voor alle tabelnamen (verplicht)';
$string['databasesettingssub_mysql'] = '<b>Type:</b> MYSQL<br />
<b>Host:</b> vb localhost of db.isp.com<br />
<b>Naam:</b> database naam, vb moodle<br />
<b>Gebruiker:</b> de gebruikersnaam voor jouw database<br />
<b>Wachtwoord:</b> het wachtwoord voor je databank<br />
<b>Tabelvoorvoegsel:</b>een voorvoegsel dat je wil gebruiken voor alle tabelnamen (optioneel)';
$string['databasesettingssub_mysqli'] = '<b>Type:</b> Improved MySQL<br />
<b>Host:</b> vb localhost of db.isp.com<br />
<b>Naam:</b> databank naam, vb moodle<br />
<b>Gebruiker:</b> Gebruikersnaam van jouw databank<br />
<b>Wachtwoord:</b> Wachtwoord voor jouw databank<br />
<b>Tabelvoorvoegsel:</b> voorvoegsel voor alle tabelnamen (optioneel)';
$string['databasesettingssub_oci8po'] = '<b>Type:</b> Oracle<br />
<b>Host:</b>niet gebruikt - moet leeggelaten worden<br />
<b>Naam:</b> database naam of de tnsnames.ora connection<br />
<b>Gebruiker:</b> de gebruikersnaam voor jouw database<br />
<b>Wachtwoord:</b> het wachtwoord voor je databank<br />
<b>Tabelvoorvoegsel:</b>voorvoegsel voor alle tabelnamen (verplicht, 2 tekens maximum)';
$string['databasesettingssub_odbc_mssql'] = '<b>Type:</b> SQL*Server (over ODBC)<br />
<b><font color=\"red\">Experimental! (not for use in production)</font></b><br />
<b>Host:</b>De naam van de DSN die je geeft in het ODBC controlescherm<br />
<b>Naam:</b> database naam vb Moodle<br />
<b>Gebruiker:</b> de gebruikersnaam voor jouw database<br />
<b>Wachtwoord:</b> het wachtwoord voor je databank<br />
<b>Tabelvoorvoegsel:</b>voorvoegsel voor alle tabelnamen (verplicht)';
$string['databasesettingssub_postgres7'] = '<b>Type:</b> PostgreSQL<br />
<b>Host:</b> vb localhost of db.isp.com<br />
<b>Naam:</b> database naam vb Moodle<br />
<b>Gebruiker:</b> de gebruikersnaam voor jouw database<br />
<b>Wachtwoord:</b> het wachtwoord voor je databank<br />
<b>Tabelvoorvoegsel:</b>voorvoegsel voor alle tabelnamen (verplicht)';
$string['databasesettingswillbecreated'] = '<b>Opmerking:</b> het installatieprogramma zal proberen een databank te maken als die nog niet bestaat.';
$string['dataroot'] = 'Gegevens';
$string['datarooterror'] = 'De \'data-map\' die je opgaf kon niet gevonden of gemaakt worden. Verbeter ofwel het pad of maak die map manueel.';
$string['datarootpublicerror'] = 'De data-map die je geeft is rechtstreeks toegankelijk vanaf het internet. Je moet een andere map kiezen.';
$string['dbconnectionerror'] = 'We konden geen verbinding maken met de databank die je opgegeven hebt. Controleer je databankinstellingen';
$string['dbcreationerror'] = 'Probleem met het opbouwen van de databank. De databanknaam kon niet aangemaakt worden met de gegevens die je opgegeven hebt';
$string['dbhost'] = 'Hostserver';
$string['dbpass'] = 'Wachtwoord';
$string['dbprefix'] = 'Tabelvoorvoegsel';
$string['dbtype'] = 'Type';
$string['dbwrongencoding'] = 'De gekozen databank loopt niet onder Unicode (UTF8), maar onder een ongeschikte encodering ($a). Je kunt beter een Unicode (UTF8) databank gebruiken. Als je wil, kun je deze test overslaan door hieronder op \"Negeer DB-encodingtest\" te klikken, maar je zou hierdoor wel problemen kunnen krijgen.';
$string['dbwronghostserver'] = 'Je moet de \"Host\" regels volgen zoals hierboven uitgelegd';
$string['dbwrongnlslang'] = 'De NLS_LANG omgevingsvariable van je webserver moet de AL32UTF8 tekenset gebruiken. Zie ook je PHP documentatie over hoe OCI8 correct te configureren.';
$string['dbwrongprefix'] = 'Je moet de \"Tabel voorvoegselregels\" volgen zoals hierboven beschreven';
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
$string['downloadlanguagebutton'] = 'Download het \"$a\" taalpakket';
$string['downloadlanguagehead'] = 'Download taalpakket';
$string['downloadlanguagenotneeded'] = 'Je kunt het installatieproces verder laten lopen met het standaard taalpakket, \"$a\".';
$string['downloadlanguagesub'] = 'Je kun nu een taalpakket downloaden en de installatie in die taal verder zetten.<br /><br />Als je dit taalpakket niet kunt downloaden, dan zal de installatie in het Engels verder gaan. (Als de installatie is afgewerkt, krijg je terug de mogelijkheid om nieuwe taalpakketten te downloaden en te installeren)';
$string['environmenthead'] = 'Omgeving controleren ...';
$string['environmentsub'] = 'We controleren nu of de versies van verschillende componenten van je server voldoen aan de systeemvereisten van Moodle';
$string['fail'] = 'Mislukt';
$string['fileuploads'] = 'Bestanden uploaden';
$string['fileuploadserror'] = 'Dit moet ingeschakeld zijn';
$string['fileuploadshelp'] = '<p>Het lijkt er op dat het uploaden van bestanden uitgeschakeld is op jouw server.</p>
<p>Moodle kan verder geïnstalleerd worden, maar zonder deze mogelijkheid zul je geen cursusmateriaal of afbeeldingen voor de profielen van je gebruikers kunnen uploaden.</p>
<p>Om het uploaden van bestanden in te schakelen moet je (of je systeembeheerder) php.ini op je systeem bewerken en volgende instelling wijzigen:
<b>file_uploads</b> op \'1\' zetten.</p>';
$string['gdversion'] = 'GD-versie';
$string['gdversionerror'] = 'De GD-bibliotheek moet geïnstalleerd zijn om afbeeldingen te kunnen maken en verwerken';
$string['gdversionhelp'] = '<p>Blijkbaar is GD niet geïnstalleerd op je server.</p>
<p>PHP heeft de GD-bibliotheek nodig om afbeeldingen te kunnen maken (zoals de grafieken van de logbestanden) en te verwerken (zoals de profielbestanden van de gebruikers). Moodle zal werken zonder GD - alleen deze mogelijkheden zullen het niet doen.</p>
<p>Om GD toe te voegen aan PHP op een Unixmachine moet je PHP compileren met de --with-gd parameter.</p>
<p>Onder Windows kun je gewoonlijk php.ini bewerken en de commentaartekens voor de lijn met php_gd2.dll verwijderen.</p>';
$string['globalsquotes'] = 'Inveilige behandeling van globals';
$string['globalsquoteserror'] = 'Zet je PHP instellingen juist: schakel register_globals uit en/of schakel magic_quotes_gpc in';
$string['globalsquoteshelp'] = '<p>De combinatie van uitgeschakelde Magic Quotes GPC en ingeschakelde Register Globals tegelijk wordt sterk afgeraden.</p>

<p>De aanbevolen instelling is<b>magic_quotes_gpc = On</b> en <b>register_globals = Off</b> in je php.ini</p>

<p>Als je geen toegang hebt tot php.ini, dan kun je misschien volgende lijn toevoegen in het bestand .htaccess in je Moodlemap:
<blockquote>php_value magic_quotes_gpc On</blockquote>
<blockquote>php_value register_globals Off</blockquote>
</p>';
$string['installation'] = 'Installatie';
$string['langdownloaderror'] = 'De taal \"$a\" is jammer genoeg niet geïnstalleerd. Het installatieproces gaat verder in het Engels.';
$string['langdownloadok'] = 'De taal \"$a\" is met succes geïnstalleerd. Het installatieproces zal in deze taal verder gaan.';
$string['magicquotesruntime'] = 'Magic Quotes runtime';
$string['magicquotesruntimeerror'] = 'Dit moet uitgeschakeld zijn';
$string['magicquotesruntimehelp'] = '<p>Magic Quotes runtime moet uitgeschakeld zijn om Moodle goed te laten functioneren.</p>
<p>Normaal staat het af als standaardinstelling ... zie de instelling <b>magic_quotes_runtime</b> in je php.ini-bestand.</p>
<p>Als je geen toegang hebt tot php.ini, dan kun je proberen om onderstaande lijn in een bestand te zetten dat je .htaccess noemt en dat dan in je Moodle-map plaatsen: <blockquote>php_value magic_quotes_runtime Off</blockquote></p>';
$string['memorylimit'] = 'Geheugenlimiet';
$string['memorylimiterror'] = 'De PHP-geheugenlimiet staat eerder laag ingesteld ...  je zou hierdoor later problemen kunnen krijgen.';
$string['memorylimithelp'] = '<p>De PHP-geheugenlimiet van je server is ingesteld op $a.</p>
<p>Hierdoor kan Moodle geheugenproblemen krijgen, vooral als je veel modules installeert en/of veel gebruikers hebt.</p>

<p>We raden je aan PHP met een hogere geheugenlimiet te configureren indien mogelijk, bijvoorbeeld 40Mb. Er zijn verschillende mogelijkheden om dat te doen. Je kunt proberen:
<ol>
<li>Indien je kunt PHP hercompileren met <i>--enable-memory-limit</i>.
Hierdoor kan Moodle zelf zijn geheugenlimiet instellen.
<li>Als je toegang hebt tot het php.ini-bestand, kun je de <b>memory_limit</b>-instelling veranderen naar bv 40Mb. Als je geen toegang hebt kun je je systeembeheerder vragen dit voor je te wijzigen.</li>
<li>Op sommige PHP-servers kun je een .htaccess-bestand maken in de Moodle-map met volgende lijn: <p><blockquote>php_value memory_limit 40M</blockquote></p>
<p>Opgelet: op sommige servers zal dit verhinderen dat <b>alle</b> PHP-bestanden uitgevoerd worden. (je zult foutmeldingen zien wanneer je naar php-pagina\'s kijkt) Je zult dan het .htaccess-bestand moeten verwijderen.</li>
</ol>';
$string['mssql'] = 'SQL*Server (mssql)';
$string['mssql_n'] = 'SQL*Server met UTF-8 ingeschakeld (mssql_n)';
$string['mssqlextensionisnotpresentinphp'] = 'PHP is niet juist geconfigureerd met de MSSQL-extentie en kan niet communiceren met SQL*Server. Controleer je php.ini-bestand of hercompileer PHP';
$string['mysql'] = 'MySQL (mysql)';
$string['mysqlextensionisnotpresentinphp'] = 'PHP is niet goed geconfigureerd met de MySQL-extentie om met MySQL te communiceren. Controleer je php.ini-bestand of hercompileer PHP.';
$string['mysqli'] = 'Improved MySQL (mysqli)';
$string['mysqliextensionisnotpresentinphp'] = 'PHP is niet goed geconfigureerd - het kan niet communiceren met MySQL. Controleer je php.ini bestand of hercompileer PHP. De MySQLi-extentie is niet beschikbaar voor PHP 4.';
$string['oci8po'] = 'Oracle (oci8po)';
$string['ociextensionisnotpresentinphp'] = 'PHP is niet juist geconfigureerd met de OCI8-extentie en kan niet communiceren met Oracle. Controleer je php.ini-bestand of hercompileer PHP.';
$string['odbc_mssql'] = 'SQL*Server over ODBC (odbc_mssql)';
$string['odbcextensionisnotpresentinphp'] = 'PHP is niet juist geïnstalleerd met de ODBC-extentie en kan niet communiceren met SQL*Server. Controleer je php.ini-bestand of hercompileer PHP.';
$string['pass'] = 'OK';
$string['pgsqlextensionisnotpresentinphp'] = 'PHP is niet juist geïnstalleerd met de PGSQL-extentie en kan niet communiceren met PostgreSQL. Controleer je php.ini-bestand of hercompileer PHP.';
$string['phpversion'] = 'PHP-versie';
$string['phpversionerror'] = 'PHP-versie moet minstens 4.1.0 zijn';
$string['phpversionhelp'] = '<p>Moodle heeft minstens PHP-versie 4.3.0 of 5.1.0 nodig (5.0.x heeft veel bekende problemen).</p> <p>De huidige versie op je server is $a</p>
<p>Je moet PHP upgraden of verhuizen naar een host met een nieuwere versie van PHP!<br />(Als je 5.0.x draait, kun je ook downgraden naar versie 4.4.x)</p>';
$string['postgres7'] = 'PostgreSQL (postgres 7)';
$string['postgresqlwarning'] = '<strong>Opmerking:</strong> Als je connectieproblemen ondervindt, kun je proberen het host serverveld in te stellen als volgt:
host=\'postgresql_host\' port=\'5432\' dbname=\'postgresql_database_name\' user=\'postgresql_user\' password=\'postgresql_user_password\'
en de Database, User en Password velden leeg laten. Meer informatie vind je op <a href=\"http://docs.moodle.org/nl/Installing_Postgres_for_PHP\">Moodle Docs</a>';
$string['safemode'] = 'Safe Mode';
$string['safemodeerror'] = 'Moodle kan bestanden niet juist behandelen met safe mode ingeschakeld';
$string['safemodehelp'] = '<p>Moodle zal heel wat problemen vertonen met safe mode ingeschakeld, waaronder bijvoorbeeld het niet kunnen aanmaken van nieuwe bestanden.</p>
<p>Safe mode is gewoonlijk alleen maar ingeschakeld bij paranoïde webhosts, je zult dus best op zoek gaan naar een nieuwe webhost voor je Moodlesite.</p>
<p>Je kunt proberen verder te gaan met de installatie als je dat wil, maar verwacht je wat verder door aan heel wat problemen.</p>';
$string['sessionautostart'] = 'Session Auto Start';
$string['sessionautostarterror'] = 'Dit moet uitgeschakeld zijn';
$string['sessionautostarthelp'] = '<p>Moodle heeft session support nodig en zal zonder niet werken.</p>
<p>Sessies kunnen ingeschakeld worden in het php.ini-bestand ... zoek naar de session.auto_start parameter.</p>';
$string['skipdbencodingtest'] = 'Negeer DB-encodingtest';
$string['welcomep10'] = '$a->installername ($a->installerversion)';
$string['welcomep20'] = 'Je krijgt deze pagina te zien omdat je met succes het <strong>$a->packname $a->packversion</strong> packet op je computer gezet en gestart hebt. Proficiat!';
$string['welcomep30'] = 'Deze uitgave van <strong>$a->installername</strong> bevat de software die nodig is om een omgeving te creëren waarin <strong>Moodle</strong> zal werken, namelijk:';
$string['welcomep40'] = 'Dit pakket bevat ook <strong>Moodle $a->moodlerelease ($a->moodleversion)</strong>.';
$string['welcomep50'] = 'Het gebruik van alle programma\'s in dit pakket wordt geregeld door hun respectievelijke licenties. Het complete <strong>$a->installername</strong> pakket is
<a href=\"http://www.opensource.org/docs/definition_plain.html\">open source</a> en wordt verdeeld onder de <a href=\"http://www.gnu.org/copyleft/gpl.html\">GPL</a> licentie.';
$string['welcomep60'] = 'De volgende pagina\'s leiden je door een aantal makkelijk te volgen stappen om <strong>Moodle</strong> te installeren op je computer. Je kunt de standaardinstellingen overnemen of, optionneel, ze aanpassen aan je noden.';
$string['welcomep70'] = 'Klik op de \"volgende\"-knop om verder te gaan met de installatie van <strong>Moodle</strong>';
$string['wwwroot'] = 'Web adres';
$string['wwwrooterror'] = 'Het webadres lijkt niet geldig te zijn - deze Moodle-installatie is blijkbaar niet op die plaats.';
$string['aborting'] = 'Installatie afbreken'; // ORPHANED
$string['adminemail'] = 'Email:'; // ORPHANED
$string['adminfirstname'] = 'Voornaam:'; // ORPHANED
$string['admininfo'] = 'Gegevens beheerder'; // ORPHANED
$string['adminlastname'] = 'Achternaam:'; // ORPHANED
$string['adminpassword'] = 'Wachtwoord:'; // ORPHANED
$string['adminusername'] = 'Gebruikersnaam:'; // ORPHANED
$string['askcontinue'] = 'Verdergaan (ja/nee):'; // ORPHANED
$string['availabledbtypes'] = 'Beschikbare databank types'; // ORPHANED
$string['availablelangs'] = 'Lijst met beschikbare talen'; // ORPHANED
$string['cannotconnecttodb'] = 'Kan niet verbinden met db'; // ORPHANED
$string['checkingphpsettings'] = 'Controleren PHP instellingen'; // ORPHANED
$string['configfilecreated'] = 'Configuratiebestand aangemaakt'; // ORPHANED
$string['configfiledoesnotexist'] = 'Configuratiebestand bestaat niet'; // ORPHANED
$string['configurationfileexist'] = 'Configuratiebestand bestaat al!'; // ORPHANED
$string['creatingconfigfile'] = 'Aanmaken configuratiebestand ...'; // ORPHANED
$string['databasecreationsettingssub2'] = '<b>Type:</b> ingesteld als \"mysqli\" door het installatiescript<br />
<b>Host:</b> ingesteld als \"localhost\"  door het installatiescript<br />
<b>Naam:</b> database naam, bv moodle<br />
<b>Gebruiker:</b> ingesteld als \"root\"  door het installatiescript<br />
<b>Wachtwoord:</b> het wachtwoord van jouw databank<br />
<b>Tabelvoorvoegsel:</b> een voorvoegsel dat je wil gebruiken voor alle tabelnamen.'; // ORPHANED
$string['databasehead'] = 'Databankinstellingen'; // ORPHANED
$string['databasehost'] = 'Databank host:'; // ORPHANED
$string['databasename'] = 'Datanbanknaam:'; // ORPHANED
$string['databasepass'] = 'Databank wachtwoord:'; // ORPHANED
$string['databasesettingsformoodle'] = 'Databankinstellingen voor Moodle'; // ORPHANED
$string['databasesocket'] = 'Unix socket'; // ORPHANED
$string['databasetype'] = 'Databanktype:'; // ORPHANED
$string['databasetypehead'] = 'Kies databankdriver'; // ORPHANED
$string['databasetypesub'] = 'Moodle ondersteunt verschillende types databankservers. Contacteer je serverbeheerder als je niet weet welk type je moet gebruiken.'; // ORPHANED
$string['databaseuser'] = 'Databank gebruikersnaam:'; // ORPHANED
$string['disagreelicense'] = 'Upgrade wordt gestopt omdat je niet akkoord gaat met de GPL!'; // ORPHANED
$string['downloadlanguagepack'] = 'Wil je het taalpakket nu downloaden (ja/nee):'; // ORPHANED
$string['downloadsuccess'] = 'Taalpakket met succes gedownload'; // ORPHANED
$string['doyouagree'] = 'Ben je akkoord? (ja/nee):'; // ORPHANED
$string['environmentsub2'] = 'Elke Moodleversie vraagt een minimum PHP-versie en een aantal vereiste PHP-extenties.
De volledige installatie-omgeving wordt gecontroleerd voor elke installatie en upgrade. Contacteer je server beheerder als je niet weet hoe je de juiste PHP-versie moet installeren of PHP-extenties moet inschakelen.'; // ORPHANED
$string['errorsinenvironment'] = 'Fouten in je omgeving!'; // ORPHANED
$string['inputdatadirectory'] = 'Data map:'; // ORPHANED
$string['inputwebadress'] = 'Web adres:'; // ORPHANED
$string['inputwebdirectory'] = 'Moodle map:'; // ORPHANED
$string['installationiscomplete'] = 'Installatie is klaar!'; // ORPHANED
$string['invalidargumenthelp'] = 'Fout: Invalid argument(s)
Syntax: \$ php cliupgrade.php OPTIONS
Gebruik de --help optie om meer hulp te krijgen.'; // ORPHANED
$string['invalidemail'] = 'Ongeldig e-mailadres'; // ORPHANED
$string['invalidhost'] = 'Ongeldige host'; // ORPHANED
$string['invalidint'] = 'Fout: waarde is geen integer'; // ORPHANED
$string['invalidintrange'] = 'Fout: waarde is valt buiten het geldig bereik'; // ORPHANED
$string['invalidpath'] = 'Ongeldig pad'; // ORPHANED
$string['invalidsetelement'] = 'Fout: de gegeven waarde staat niet bij de voorgestelde opties'; // ORPHANED
$string['invalidtextvalue'] = 'Ongeldige tekstwaarde'; // ORPHANED
$string['invalidurl'] = 'Ongeldige url'; // ORPHANED
$string['invalidvalueforlanguage'] = 'Ongeldige waarde voor de --lang optie. Typ --help voor meer uitleg'; // ORPHANED
$string['invalidyesno'] = 'Fout: waarde is geen geldig ja/nee-argument'; // ORPHANED
$string['locationanddirectories'] = 'Locatie en mappen'; // ORPHANED
$string['nativemysqli'] = 'Improved MySQL (native/mysqli)'; // ORPHANED
$string['nativemysqlihelp'] = 'Nu moet je de databank configureren waar de meeste Moodlegegevens bewaard zullen worden.
De databank kan aangemaakt worden als de databankgebruiker en wachtwoord bestaat en de juiste rechten heeft.
Een tabelvoorvoegsel is optioneel.'; // ORPHANED
$string['nativeoci'] = 'Oracle(native/oci)'; // ORPHANED
$string['nativepgsql'] = 'PostgreSQL (native/pgsql)'; // ORPHANED
$string['nativepgsqlhelp'] = 'Nu moet je de databank configureren waar de meeste Moodlegegevens bewaard zullen worden.
Deze databank moet al aangemaakt zijn en er moet een gebruikersnaam en wachtwoord aangemaakt zijn met rechten om de databank te gebruiken. 
Een tabelvoorvoegsel is optioneel.'; // ORPHANED
$string['paths'] = 'Paden'; // ORPHANED
$string['pathserrcreatedataroot'] = 'Datamap ($a->dataroot) kan niet aangemaakt worden door het installatiescript'; // ORPHANED
$string['pathshead'] = 'Bevestig paden'; // ORPHANED
$string['pathsrodataroot'] = 'De dataroot map is niet beschrijfbaar.'; // ORPHANED
$string['pathsroparentdataroot'] = 'De bovenliggende map ($a->parent) is niet beschrijfbaar. De datamap ($a->dataroot) kan niet aangemaakt worden door het installatiescript'; // ORPHANED
$string['pathssubadmindir'] = 'Sommige webhosts gebruiken /admin als een speciale url om toegang tot bijvoorbeeld een controlepaneel te krijgen. Dit kan conflicten veroorzaken met de standaardlocatie van de Moodle admin scripts. Je kunt dit oplossen door de admin map van Moodle te hernoemen en de nieuwe naam hier te zetten. Bijvoorbeeld <em>moodleadmin</em>. Dat zal de admin links in Moodle herstellen.'; // ORPHANED
$string['pathssubdataroot'] = 'Je hebt een plaats nodig waar Moodle geüploade bestanden kan bewaren. Deze map moet leesbaar en BESCHRIJFBAAR zijn door de webserver gebruiker (gewoonlijk \'nobody\', \'apache\' of www-data\') en mag niet rechtstreeks toegankelijk zijn vanaf het internet.'; // ORPHANED
$string['pathssubdirroot'] = 'Volledig pad naar de Moodle-installatie. Wijzig dit alleen als je symbolische links moet gebruiken.'; // ORPHANED
$string['pathssubwwwroot'] = 'Volledig webadres waarlangs de toegang naar Moodle zal gebeuren. Het is niet mogelijk toegang tot Moodle te krijgen via meerdere adressen. Als je site meerdere publieke adressen heeft, dan zul je permanente verwijzingen moeten opzetten voor al die adressen, behalve voor wat je hier invult. Als je site zowel van het internet als van een intranet toegankelijk is, zet dat het internetadres hier en wijzig je DNS-instellingen zodanig dat intranetgebruikers dit publieke adres ook gebruiken.'; // ORPHANED
$string['pathsunsecuredataroot'] = 'De plaats van de datamap is niet veilig.'; // ORPHANED
$string['pathswrongadmindir'] = 'De adminmap bestaat niet'; // ORPHANED
$string['pathswrongdirroot'] = 'Foute Moodle root locatie'; // ORPHANED
$string['pdosqlite3'] = 'SQLite 3 (PDO) <b><strong class=\"errormsg\">Experimenteel! (niet voor productie-omgeving)</strong></b>'; // ORPHANED
$string['php52versionerror'] = 'PHP versie moet minstens 5.2.4 zijn'; // ORPHANED
$string['php52versionhelp'] = '<p>Moodle vereist minstens PHP versie 5.2.4.</p>
<p>Op dit moment heb je versie $a geïnstalleerd</p>
<p>Je moet PHP upgraden of verhuizen naar een host met een nieuwere PHP-versie!</p>'; // ORPHANED
$string['phpextension'] = '$a PHP-extentie'; // ORPHANED
$string['releasenoteslink'] = 'Informatie over deze Moodleversie kun je vinden in de Release Notes op $a'; // ORPHANED
$string['selectlanguage'] = 'Taal kiezen voor installatie'; // ORPHANED
$string['sitefullname'] = 'Volledige naam voor de site:'; // ORPHANED
$string['siteinfo'] = 'Details voor de site:'; // ORPHANED
$string['sitenewsitems'] = 'Nieuwsitems:'; // ORPHANED
$string['siteshortname'] = 'Verkorte naam voor de site:'; // ORPHANED
$string['sitesummary'] = 'Site samenvatting:'; // ORPHANED
$string['sqliteextensionisnotpresentinphp'] = 'PHP is niet juist geconfigureerd met de SQLite extentie. Controleer je php.ini-bestand of hercompileer PHP.'; // ORPHANED
$string['tableprefix'] = 'Tabelvoorvoegsel:'; // ORPHANED
$string['upgradingactivitymodule'] = 'Upgraden module'; // ORPHANED
$string['upgradingbackupdb'] = 'Upgraden backup databank'; // ORPHANED
$string['upgradingblocksdb'] = 'Upgraden blok databank'; // ORPHANED
$string['upgradingblocksplugin'] = 'Upgraden blok plugin'; // ORPHANED
$string['upgradingcompleted'] = 'Upgraden klaar'; // ORPHANED
$string['upgradingcourseformatplugin'] = 'Upgraden cursus format plugin'; // ORPHANED
$string['upgradingenrolplugin'] = 'Upgraden aanmeldingsplugin'; // ORPHANED
$string['upgradinggradeexportplugin'] = 'Upgraden cijfer export plugin'; // ORPHANED
$string['upgradinggradeimportplugin'] = 'Upgraden cijfer import plugin'; // ORPHANED
$string['upgradinggradereportplugin'] = 'Upgraden cijferrapport plugin'; // ORPHANED
$string['upgradinglocaldb'] = 'Upgraden locale databank'; // ORPHANED
$string['upgradingmessageoutputpluggin'] = 'Upgraden berichtensysteem plugin'; // ORPHANED
$string['upgradingqtypeplugin'] = 'Upgraden vraagtype plugin'; // ORPHANED
$string['upgradingrpcfunctions'] = 'Upgraden RPC functies'; // ORPHANED
$string['usagehelp'] = 'Samenvatting:
\$php cliupgrad.php OPTIES

OPTIES
--lang Geldige geïnstalleerde taal voor installatie. Standaard is Engels (en)
--webaddr URL voor de Moodle site
--moodledir Fysiek pad van de Moodle web map
--datadir Fysiek pad van de Moodle data map (mag niet zichtbaar zijn vanaf het internet)
--dbtype Databank type. Standaard is mysql
--dbhost Databank host. Standaard is localhost
--dbname Naam databank. Standaard is moodle
--dbuser Databank gebruikersnaam. Standaard is leeg
--dbpass Databank wachtwoord. Standaard is leeg
--prefix Tabelvoorvoegsel voor bovenstaande databanktabellen. Standaard is mdl
--verbose 0 geen informatie, 1 samenvatting (standaaard), 2 gedetailleerde informatie
--interactivelevel 0 Niet interactief, 1 half interactief (standaard), 2 interactief
--aggreelicense Ja(standaard) of Nee
--confirmrelease Ja(standaard) of Nee
--sitefullname Volledige naam voor de site. Standaard is Moodle Site (VERANDER DIT)
--siteshortname Verkorte naam voor de site. Standaard is moodle
--sitesummary Samenvatting voor de site. Standaard is leeg
--adminfirstname Voornaam van de beheerder. Standaard is Admin
--adminlastname Achternaam van de beheerder. Standaard is Gebruiker
--adminusername Gebruikersnaam van de beheerder. Standaard is admin
--adminpassword Wachtwoord van de beheerder. Standaard is admin
--adminemail Emailadres van de beheerder. Standaard is root@localhost
--help Toon deze informatie

Gebruik:
\$php cliupgrade.php --lang=nl
--webaddr=http://www.voorbeeld.com --moodledir=/var/www/html/moodle --datadir=/var/moodledata --dbtype=mysql --dbhost=localhost --dbname=moodle --dbuser=root --prefix=mdl --agreelicense=yes --confirmrelease=yes --sitefullname=\"Voorbeeld Moodle Site\" --siteshortname=moodle --sitesummary=siteforme --adminfirstname=Admin --adminlastname=User --adminusername=admin --adminpassword=admin --adminemail=admin@voorbeeld.com --verbose=1 --interactivelevel=2'; // ORPHANED
$string['versionerror'] = 'Onderbroken door de gebruiker wegens versiefout'; // ORPHANED
$string['welcometext'] = 'Welcome bij de Moodle command line installer'; // ORPHANED
$string['writetoconfigfilefaild'] = 'Fout: schrijven naar config.php-bestand mislukt'; // ORPHANED
$string['yourchoice'] = 'Jouw keuze:'; // ORPHANED
$string['databasesettingssub_sqlite3_pdo'] = '<b>Type:</b> SQLite 3 (PDO) <b><strong class=\"errormsg\">Experimenteel! (niet voor productieomgeving)</strong></b><br />
<b>Host:</b> pad naar de map waar het databankbestand bewaard zal worden (gebruik volledig pad); gebruik localhost of laat leeg om de datamap van Moodle te gebruiken<br />
<b>Naam:</b> databank naam, vb moodle (optioneel)<br />
<b>Gebruiker:</b> de gebruikersnaam voor jouw databank (optioneel)<br />
<b>Wachtwoord:</b> het wachtwoord voor jouw databank (optioneel)<br />
<b>Tabelvoorvoegsel:</b> optioneel voorvoegsel voor alle tabelnamen<br />
De naam van de databank zal bepaald worden door de gebruikersnaam, databanknaam en het wachtwoord dat je net ingegeven hebt.'; // ORPHANED
$string['sqlite3_pdo'] = 'SQLite 3 (PDO) <b><strong class=\"errormsg\">Experimenteel! (niet gebruiken in productieomgeving)</strong></b>'; // ORPHANED
$string['unsafedirname'] = 'Fout: onveilige tekens in de mapnaam. Geldige tekens zijn a-zA-Z0-9_-'; // ORPHANED

?>
