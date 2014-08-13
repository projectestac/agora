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
 * Strings for component 'install', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   install
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['admindirerror'] = 'Den katalog för administration som är angiven är felaktig';
$string['admindirname'] = 'Katalog/mapp för administration';
$string['admindirsetting'] = 'Ett litet fåtal webbvärdar (t ex hotell) använder /admin som en speciell URL som Du får tillgång till för att kunna använda en kontrollpanel e d. Tyvärr så stämmer detta inte så bra överens med standardplaceringen av Moodles sidor för administration. Du kan ordna till det genom att döpa om admin katalogen i Din installation och skriva in detta nya namn här. Till exempel: <br/> <br /><b>moodleadmin</b><br /> <br /> Detta kommer att rätta till länkarna till admin i Moodle';
$string['admindirsettinghead'] = 'Gör inställningar för katalogen admin...';
$string['admindirsettingsub'] = 'Ett litet fåtal webbvärdar använder /admin som en speciell URL som Du kan använda för att få tillgång till en kontrollpanel eller något dylikt. Detta stämmer tyvärr inte överens med standardplaceringen av Moodles admin-sidor. Du kan rätta till detta genom att byta namn på Din admin-katalog i samband med Din installation, och placera detta nya namn här. T ex <br /> <br /><b>moodleadmin</b><br /> <br /> Detta rättar till admin-länkarna i Moodle';
$string['availablelangs'] = 'Tillgängliga språkpaket';
$string['caution'] = 'Varning';
$string['chooselanguage'] = 'Välj ett språk';
$string['chooselanguagehead'] = 'Välj ett språk';
$string['chooselanguagesub'] = 'Var snäll och välj ett språk  för installationen. Du kommer att ha möjlighet att välja språk för webbplatsen och användarna på en senare skärm.';
$string['cliadminpassword'] = 'Nytt lösenord för användare med rättigheter som administratör';
$string['cliadminusername'] = 'Användarnamn för administratörskonto';
$string['clialreadyinstalled'] = 'Filen config.php finns redan, var snäll och använd admin/cli/upgrade.php om Du vill uppgradera Din webbplats.';
$string['cliinstallfinished'] = 'Installationen fullföljde framgångsrikt. ';
$string['cliinstallheader'] = 'Installationsprogram av typ kommandorad {$a} för Moodle ';
$string['climustagreelicense'] = 'I icke-interaktivt läge måste Du godkänna licens genom att ange -- alternativ för godkänner - licens';
$string['clitablesexist'] = 'Databastabellerna är redan på plats, cli-installationen kan inte fortsätta.';
$string['compatibilitysettings'] = 'Kontrollerar Dina PHP-inställningar...';
$string['compatibilitysettingshead'] = 'Kontrollerar Dina PHP-inställningar...';
$string['compatibilitysettingssub'] = 'Den server bör klara alla dessa test för att Moodle ska fungera friktionsfritt.';
$string['configfilenotwritten'] = 'Skriptet för installationen kunde inte automatiskt skapa en config.php som innehåller de inställningar som Du har valt. Var snäll och kopiera den följande koden till en fil med namnet config.php i Moodles "root"-katalog.';
$string['configfilewritten'] = 'config.php har skapats framgångsrikt';
$string['configurationcomplete'] = 'Konfigurationen är  genomförd';
$string['configurationcompletehead'] = 'Konfigurationen är  genomförd';
$string['configurationcompletesub'] = 'Moodle gjorde ett försök att spara Din konfiguration i en fil i roten (root) på Din installation av Moodle.';
$string['database'] = 'Databas';
$string['databasehead'] = 'Inställningar för databas';
$string['databasehost'] = 'Värd för databas';
$string['databasename'] = 'Namn på databas';
$string['databasepass'] = 'Lösenord för databas';
$string['databasesocket'] = 'Unix socket';
$string['databasetypehead'] = 'Välj drivrutin för databasen';
$string['databasetypesub'] = 'Moodle stödjer ett flertal typer av databasservrar. Var snäll och kontakta serveradministratören om Du inte vet vilken typ Du ska använda. ';
$string['databaseuser'] = 'Databasanvändare';
$string['dataroot'] = 'katalog för data';
$string['datarooterror'] = 'Den "katalog för data" som Du har angivit gick inte att hitta eller skapa. Du får antingen korrigera sökvägen eller skapa katalogen manuellt.';
$string['dbconnectionerror'] = 'Det gick inte att ansluta till den databas som Du har angivit. Var snäll och kontrollera inställningarna till Din databas.';
$string['dbcreationerror'] = 'Fel (error) när databasen skulle skapas. Det gick tyvärr inte att skapa det namn (och med de inställningar) på databasen som Du har angivit';
$string['dbhost'] = 'Värdserver';
$string['dbpass'] = 'Lösenord';
$string['dbprefix'] = 'Prefix för tabeller';
$string['dbtype'] = 'Typ';
$string['directorysettings'] = '<p>Var snäll och bekräfta placeringarna av denna installation av Moodle</p>
<p><b>Webbadress</b>
Ange den fullständiga adressen till Moodle. Om Din webbplats går att nå via flerfaldiga (ett antal olika) URL:er så bör Du välja den som är mest naturlig för Dina användare (studenter etc).
Ta inte inte med något avslutande vänsterlutat snedstreck "/".</p>

<p><b>Katalogen för Moodle</b>
Ange den fullständiga sökvägen till den här installationen. Kontrollera att det stämmer med sådant som är skiftlägeskänsligt (stor/liten bokstav).
</p>
<p><b>Katalogen för data</b>
Du behöver ett utrymme där Moodle kan spara uppladdade filer. Till denna katalog bör det finnas läs- OCH SKRIV-rättigheter för användaren av webbservern (vanligtvis \'nobody\' eller  \'apache\') men katalogen bör inte vara tillgänglig direkt via webben.';
$string['directorysettingshead'] = 'Var snäll och bekräfta placeringen av Din installation av Moodle.';
$string['directorysettingssub'] = '<b>Webbadress:</b>
Ange den fullständiga webbadressen till Moodle.
Om det går att nå Din via flerfaldiga URLer så ska Du välja den som det ligger närmast till hands för Dina studenter/elever/deltagare/lärande att använda. Ta inte med något högerlutat snedstreck.
<br />
<br />
<b>Katalogen för Moodle:</b>
Ange den fullständiga sökvägen till den här installationen. Se till att hänsyn tas till stor/liten bokstav.
<br />
<br />
<b>Katalogen för data:</b>
Du behöver en plats där Moodle kan lagra de filer som laddas upp till systemet. Denna katalog bör vara läs- och SKRIVBAR för användaren av webbservern (vanligen \'nobody\' eller \'apache\'), men denna katalog bör inte vara tillgänglig  direkt via webben.';
$string['dirroot'] = 'Katalogen för Moodle';
$string['dirrooterror'] = 'Inställningarna för "Katalogen för Moodle" tycks vara felaktiga - det går inte att hitta någon installation av Moodle där. Värdet här nedan har återställts.';
$string['download'] = 'Ladda ner';
$string['downloadlanguagebutton'] = 'Ladda ner språkpaketet "{$a}"';
$string['downloadlanguagehead'] = 'Ladda ner språkpaket';
$string['downloadlanguagenotneeded'] = 'Du kan fullfölja installationsprocessen samtidigt som Du använder standardpaketet för språk, "{$a}".';
$string['downloadlanguagesub'] = 'Du har nu möjligheten att ladda ner ett språkpaket och fortsätta installationen av det här språket.<br /><br />Om Du inte kan ladda ner språkpaketet så kommer installationen att fortsätta på engelska. Så snart installationen är klar så kan Du ladda ner och installera ytterligare språkpaket.';
$string['doyouagree'] = 'Accepterar Du? (ja/nej)';
$string['environmenthead'] = 'Undersöker Din miljö...';
$string['environmentsub'] = 'Vi kontrollerar om de olika komponenterna i Ditt system svarar upp mot systemkraven.';
$string['errorsinenvironment'] = 'Kontrollen av miljön misslyckades';
$string['fail'] = 'Misslyckas';
$string['fileuploads'] = 'Uppladdningar av filer';
$string['fileuploadserror'] = 'Detta bör vara aktiverat (on)';
$string['fileuploadshelp'] = '<p>Uppladdning av filer verkar vara avaktiverat på Din server.</p>
<p>Det kan fortfarande vara så att Moodle är installerat, men utan denna funktionalitet så kommer Du inte att kunna ladda upp kursfiler eller nya bilder till användarprofilerna. </p>
<p>För att aktivera uppladdning av filer så måste Du (eller Din systemadministratör) redigera den övergripande php.ini-filen på Ert system och ändra inställningen för <b>uppladdning av filer (file uploads)</b> till \'1\'.</p>';
$string['installation'] = 'Installation';
$string['langdownloaderror'] = 'Språket "{$a}" gick tyvärr inte att ladda ner. Installationen kommer att fullföljas på engelska.';
$string['langdownloadok'] = 'Språket "{$a}" installerades framgångsrikt. Installationen kommer att fullföljas på detta språk.';
$string['magicquotesruntime'] = 'körtid för \'Magiska citat\'';
$string['magicquotesruntimeerror'] = 'Det här bör vara \'off\'';
$string['magicquotesruntimehelp'] = '<p>Körtid för \'Magiska citat\' (Magic quotes runtime) bör vara inställt till \'off\' för att Moodle ska fungera korrekt</p>
<p>Som förvald standard är det normalt sett inställt till \'off\'... Kontrollera inställningen för \'Magic quotes runtime\' i Din php.ini-fil.</p>
<p>Om Du inte har tillgång till Din php.ini-fil så kanske Du kan lägga in följande rad i en fil som heter .htaccess i Din katalog för Moodle:<blockquote>php_value magic_quotes_runtime Off</blockquote>
</p>';
$string['memorylimit'] = 'Minnesbegränsning';
$string['memorylimiterror'] = 'Minnesbegränsningen för PHP på Din server är f n inställt till ett ganska lågt värde... Detta kan leda till problem senare.';
$string['memorylimithelp'] = '<p>Den aktuella minnesbegränsningen för PHP på Din server är  inställt till {$a}.</p>
<p>Detta kan förorsaka att Moodle får minnesproblem senare, särskilt om Du har aktiverat många moduler och/eller har många användare.</p>
<p>Vi rekommenderar att Du konfigurerar PHP med en högre begränsning, som t ex 16M. Det finns flera sätt att göra detta som Du kan pröva med:</p> <ol>
<li>Om Du har möjlighet till det så kan Du kompilera om PHP med<i>--enable-memory-limit </i>Detta gör det möjligt för Moodle att ställa in minnesbegränsningen själv. </li>
<li>Om Du har tillgång till Din php.ini-fil så kan Du ändra inställningen för <b>memory limit</b> till något i stil med 16M. Om Du inte har tillgång själv så kan Du kanske be Din systemadministratör att göra detta åt Dig.</li>
<li>På en del PHP-servrar kan Du skapa en .htaccess-fil i Moodle-katalogen som innehåller den här raden: <blockquote>php_value memory_limit 16M</blockquote>.<br />Detta kan dock på en del servrar leda till att <b>inga</b> PHP-sidor fungerar. (Du får Error-sidor istället för de riktiga) så då får Du ta bort .htaccess-filen.</li>
</ol>';
$string['mssqlextensionisnotpresentinphp'] = 'PHP har inte konfigurerats på rätt sätt med tillägget MSSQL. Därför kan det inte kommunicera med SQL*Server. Var snäll och kontrollera Din php.ini-fil eller kompilera om PHP.';
$string['mysqliextensionisnotpresentinphp'] = 'PHP har inte konfigurerats på ettt korrekt sätt i förhållande till MySQLi extensionen så att den kan kommunicera med PHP. Det finns ingen MySQLi extension för PHP4.';
$string['nativemssql'] = 'SQL*Server FreeTDS (native/mssql)';
$string['nativemssqlhelp'] = 'Nu måste Du konfigurera databasen där större delen av Moodles data kommer att lagras. Du måste först skapa databasen liksom ett användarnamn och ett lösenord för att få tillgång till den. Ett prefix för tabeller är obligatoriskt. ';
$string['nativemysqli'] = 'Förbättrad MySQL (native/mysqli)';
$string['nativemysqlihelp'] = 'Nu måste Du konfigurera databasen där större delen av Moodles data kommer att lagras. Du måste först skapa databasen liksom ett användarnamn och ett lösenord för att få tillgång till den. Ett prefix för tabeller är obligatoriskt. ';
$string['nativeoci'] = 'Oracle (native/oci)';
$string['nativeocihelp'] = 'Nu måste Du konfigurera databasen där större delen av Moodles data kommer att lagras. Du måste först skapa databasen liksom ett användarnamn och ett lösenord för att få tillgång till den. Ett prefix för tabeller är obligatoriskt. ';
$string['nativepgsql'] = 'PostgreSQL (native/pgsql)';
$string['nativepgsqlhelp'] = 'Nu måste Du konfigurera databasen där större delen av Moodles data kommer att lagras. Du måste först skapa databasen liksom ett användarnamn och ett lösenord för att få tillgång till den. Ett prefix för tabeller är obligatoriskt. ';
$string['nativesqlsrv'] = 'SQL*Server Microsoft (native/sqlsrv)';
$string['nativesqlsrvhelp'] = 'Nu måste Du konfigurera databasen där större delen av Moodles data kommer att lagras. Du måste först skapa databasen liksom ett användarnamn och ett lösenord för att få tillgång till den. Ett prefix för tabeller är obligatoriskt. ';
$string['ociextensionisnotpresentinphp'] = 'PHP har inte konfigurerats på rätt sätt med tillägget OCI8. Därför kan det inte kommunicera med Oracle. Var snäll och kontrollera Din php.ini-fil eller kompilera om PHP.';
$string['pass'] = 'Pass';
$string['paths'] = 'Vägar';
$string['pathserrcreatedataroot'] = 'Datakatalogen ({$a->dataroot}) går inte att skapa med hjälp av installeraren.';
$string['pathshead'] = 'Bekräfta vägar';
$string['pathsrodataroot'] = 'Det går inte att skriva till katalogen för dataroot';
$string['pathsroparentdataroot'] = 'Det går inte att skriva till föräldrakatalogen ({$a->parent}). Det går inte att installera datakatalogen ({$a->dataroot}) med hjälp av installeraren. ';
$string['pathssubdirroot'] = 'Full sökväg till installationen av moodle.';
$string['pathsunsecuredataroot'] = 'Placeringen av dataroot är inte säker';
$string['pathswrongadmindir'] = 'Katalogen för admin saknas';
$string['pgsqlextensionisnotpresentinphp'] = 'PHP har inte konfigurerats på rätt sätt med tillägget PGSQL. Därför kan det inte kommunicera med PostgreSQL. Var snäll och kontrollera Din php.ini-fil eller kompilera om PHP.';
$string['phpextension'] = '{$a} PHP tillägg';
$string['phpversion'] = 'PHP-version';
$string['phpversionhelp'] = '<p>Moodle kräver minst PHP 4.3.0 eller 5.1.0 (det finns ett antal kända problem med 5.0.x)</p>
<p>Du använder f n version {$a}</p>
<p>Du måste uppgradera PHP eller flytta till en värd som har en nyare version av PHP! Om Du har 5.0.x så bör Du nedgradera till 4.4.x.</p>';
$string['releasenoteslink'] = 'För information om den här versionen av Moodle, var snäll och se utgivningsnoteringarna vid {$a}';
$string['safemode'] = 'Säkert läge';
$string['safemodeerror'] = 'Moodle kan få problem om \'säkert läge\' (safe mode) är aktiverat';
$string['safemodehelp'] = '<p>Moodle kan få ett antal problem om \'säkert
läge\' är aktiverat. Systemet kommer t ex troligtvis inte att kunna skapa nya filer.</p>
<p>Säkert läge är normalt sett bara aktiverat hos mycket försiktiga webbvärdar(t ex webbhotell) så Du kanske helt enkelt måste hitta ett annat webbhotell för Din webbplats med Moodle.</p>
<p>Du kan försöka att fortsätta installationen om Du vill, men bli inte förvånad om det dyker upp ett och annat problem längre fram.</p>';
$string['sessionautostart'] = 'Automatisk start av session';
$string['sessionautostarterror'] = 'De här bör vara inställt till \'off\'.';
$string['sessionautostarthelp'] = '<p>Moodle kräver stöd för sessioner och kommer inte att fungera utan det.</p>
<p>Sessioner kan vara aktiverade i php.ini-filen... kontrollera parametern för session.auto_start. </p>';
$string['sqliteextensionisnotpresentinphp'] = 'PHP har inte konfigurerats korrekt med tillägget för SQLite. Var snäll och kontrollera Din php.ini-fil för att kompilera om PHP.';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'Du ser detta eftersom Du framgångsrikt har installerat och börjat använda språkpaketet <strong>{$a->packname} {$a->packversion}</strong> på Din dator. Gratulerar!';
$string['welcomep30'] = 'I den här versionen av <strong>{$a->installername}</strong> ingår de applikationer som kan skapa en miljö som <strong>Moodle</strong> kan fungera i, nämligen:';
$string['welcomep40'] = 'I paketet ingår även <strong>Moodle {$a->moodlerelease} ({$a->moodleversion})</strong>.';
$string['welcomep50'] = 'Användningen av alla applikationerna i det här paketet regleras av deras respektive licenser. Det kompletta paketet <strong>{$a->installername}</strong>  är <a href="http://www.opensource.org/docs/definition_plain.html">Öppen källkod </a> och distribueras
under <a href="http://www.gnu.org/copyleft/gpl.html">GPL</a> licensen.';
$string['welcomep60'] = 'De följande sidorna leder Dig genom några enkla steg för att konfigurera och installera <strong>Moodle</strong> på Din dator, Du kan acceptera standardinställningarna eller, alternativt, modifiera dem som det passar Dina egna behov.';
$string['welcomep70'] = 'Klicka på knappen "Nästa" här nedan för att fortsätta installationen av <strong>Moodle</strong>';
$string['wwwroot'] = 'Webbadress';
$string['wwwrooterror'] = 'Webbadressen verkar inte vara giltig - den här installationen av Moodle verkar inte att finnas där.
Värdet nedan har återställts.';
