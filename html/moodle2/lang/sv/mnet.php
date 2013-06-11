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
 * Strings for component 'mnet', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutyourhost'] = 'Om Din server';
$string['accesslevel'] = 'Nivå av tillgänglighet';
$string['addhost'] = 'Lägg till värd';
$string['addnewhost'] = 'Lägg till en ny värd';
$string['addtoacl'] = 'Lägg till till tillgänglighetskontroll';
$string['allhosts'] = 'Alla värdar';
$string['allhosts_no_options'] = 'Det finns inga tillgängliga alternativ när man visar ett flertal värdar';
$string['allow'] = 'Tillåt';
$string['applicationtype'] = 'Typ av applikation';
$string['authfail_nosessionexists'] = 'Auktorisation misslyckades: mnet-sessionen  finns inte.';
$string['authfail_sessiontimedout'] = 'Auktorisation misslyckades: tiden för mnet-sessionen har gått ut.';
$string['authfail_usermismatch'] = 'Auktorisation misslyckades: användaren matchar inte.';
$string['authmnetdisabled'] = 'Plugin-programmet för autenticeringen i MNet är <strong>avaktiverat</strong>.';
$string['badcert'] = 'Det här är inte ett giltigt certifikat';
$string['certdetails'] = 'Detaljer om Cert';
$string['configmnet'] = 'Mnet tillåter kommunikation med andra servrar och tjänster för denna server.';
$string['couldnotgetcert'] = 'Det gick inte att hitta något certifikat på <br />{$a}<br />Värden kan vara onåbar eller felaktigt konfigurerad.';
$string['couldnotmatchcert'] = 'Det här matchar inte det certifikat som f.n. är publicerat av webbservern.';
$string['courses'] = 'Kurser';
$string['courseson'] = 'Kurser på';
$string['currentkey'] = 'Aktuell publik nyckel';
$string['current_transport'] = 'Aktuell transport';
$string['databaseerror'] = 'Det gick inte att skriva detaljer till databasen';
$string['deleteaserver'] = 'Tar bort en server';
$string['deletedhostinfo'] = 'Denna värd har tagits bort. Om du vill återställa den, ställ den borttagna statusen tillbaka till "Nej".';
$string['deletedhosts'] = 'Borttagna värdar: {$a}';
$string['deletehost'] = 'Ta bort värd';
$string['deletekeycheck'] = 'Är Du helt säker på att Du vill ta bort den här nyckeln?';
$string['deleteoutoftime'] = 'Tiden för Ditt 60-sekunders fönster för att ta bort den här nyckeln har gått ut. Var snäll och börja om igen.';
$string['deleteuserrecord'] = 'SSO ACL: ta bort post för användare \'{$a->user}\' från {$a->host}.';
$string['deletewrongkeyvalue'] = 'Det har uppstått ett fel. Om Du inte höll på att försöka ta bort Din servers SSL-nyckel så är det möjligt att Du har blivit utsatt för en illasinnad attack. Ingen åtgärd har vidtagits.';
$string['deny'] = 'Avslå';
$string['description'] = 'Beskrivning';
$string['duplicate_usernames'] = 'Vi misslyckades med att skapa ett index över kolumnerna "mnethostid" och "username" i Din användartabell.<br />Detta kan inträffa när Du har <a href="{$a}" target="_blank">dubbletter av användarnamn i Din användartabell</a>.<br />Din uppgradering bör ändå fullföljas  framgångsrikt. Klicka på länken ovan så kommer instruktioner om hur Du åtgärdar detta problem att visas i ett nytt fönster. Du kan ta itu med det i slutet av uppgraderingen.<br />';
$string['enabled_for_all'] = '(Den här tjänsten har aktiverats för alla värdar)';
$string['enterausername'] = 'Var snäll och mata in ett användarnamn, eller en lista över användarnamn separerade med komman.';
$string['error7020'] = 'Det felet inträffar normalt sett fjärrwebbplatsen har skapat en registrering för dig med felaktig wwwroot, t.ex. http://dinwebbplats.com istället för http://www.dinwebbplats.com. Du bör då kontakta administratören av fjärrwebbplatsen med din wwwroot (så som den har angivits i config.php) och be henne/honom uppdatera registreringen hos din värd.';
$string['error7022'] = 'Det meddelande som du skickade till fjärrwebbplatsen krypterades korrekt med signerades inte. Detta var mycket oväntat; du bör förmodligen rapportera en bug om detta uppträder (glöm inte att lämna så mycket information som möjligt om den aktuella versionen av Moodle osv).';
$string['error7023'] = 'Fjärrwebbplatsen har försökt att avläsa ditt krypterade meddelande med alla de nycklar som den har registrerat angående din webbplats. Ingen av nycklarna har fungerat. Du kanske kan ordna till detta genom att manuellt redigera nycklarna hos fjärrwebbplatsen. Det är osannolikt att detta ska hända om det inte är så att du inte har kommunicerat med webbplatsen på några månader.';
$string['error7024'] = 'Du skickar ett okrypterat meddelande till den avlägsna webbplatsen med den accepterar inte okrypterad kommunikation från din webbplats. Detta är mycket oväntat; du borde antagligen rapportera en bug om detta inträffar. (lämna så mycket information som möjligt om den aktuella versionen av Moodle osv).';
$string['error7026'] = 'Den nyckel som du har signerat ditt meddelande med skiljer sig ifrån den nyckel som fjärrvärden har registrerat på en fil för din server. Dessutom så har fjärvärden försökt att hämta din aktuella nyckel men misslyckats med detta. Var snäll och skriv in nyckeln manuellt hos fjärrvärden och försök igen.';
$string['error709'] = 'Fjärrwebbplatsen har misslyckats med att få en SSL-nyckel från dig.';
$string['expired'] = 'Giltighetstiden för den här nyckeln gick ut';
$string['expires'] = 'Giltig t.o.m.';
$string['expireyourkey'] = 'Ta bort den här nyckeln';
$string['expireyourkeyexplain'] = 'Moodle roterar Dina nycklar automatiskt var 28:e dag (som förvald standardinställning) men Du har alternativet att <em>manuellt</em> låta tiden för den här nyckeln löpa ut. En ersättande nyckel kommer omedelbart att skapas.<br />Om Du tar bort den här nyckeln så blir det omöjligt för andra instanser av Moodle att kommunicera med Dig fram till dess Du manuellt kontaktar varje administratör och ger dem tillgång till Din nya nyckel.';
$string['exportfields'] = 'Fält att exportera';
$string['failedaclwrite'] = 'Det gick inte att skriva till listan för kontroll av MNET-tillgänglighet för den här användaren.';
$string['forbidden-function'] = 'Den funktionen har inte aktiverats för RPC.';
$string['forbidden-transport'] = 'Den transportmetod som Du försöker använda är inte tillåten.';
$string['forcesavechanges'] = 'Tvinga fram sparande av ändringar';
$string['helpnetworksettings'] = 'Konfigurera MNET kommunikation';
$string['hidelocal'] = 'Dölj lokala användare';
$string['hideremote'] = 'Dölj fjärranvändare';
$string['host'] = 'värd';
$string['hostcoursenotfound'] = 'Det gick inte att hitta värd eller kurs';
$string['hostdeleted'] = 'Värden har tagits bort';
$string['hostexists'] = 'Det finns redan en post för den där värden med det värdnamnet (det kan tas bort)<a href= "{$a}"> Klicka här </a> för att redigera den posten.';
$string['hostlist'] = 'Lista över nätverkande värdar';
$string['hostname'] = 'Värdnamn';
$string['hostnamehelp'] = 'Det fullt kvalificerade domännamnet för fjärrvärden. t.ex. www.exempel.se';
$string['hostnotconfiguredforsso'] = 'Den här servern är inte konfigurerad för fjärr-inloggning.';
$string['hostsettings'] = 'Inställningar för värd';
$string['http_self_signed_help'] = 'Tillåt anslutningar genom att använda ett självsignerat DIY SSL-certifikat på fjärrvärden.';
$string['https_self_signed_help'] = 'Tillåt anslutningar som använder ett själv-signerat DIY SSL i PHP hos fjärrvärden via http.';
$string['https_verified_help'] = 'Tillåt anslutningar som använder ett verifierat SSL-certifikat hos fjärrvärden.';
$string['http_verified_help'] = 'Tillåt anslutningar som använder ett verifierat SSL-certifikat i PHP hos fjärrvärden, men via http (inte https).';
$string['id'] = 'ID';
$string['idhelp'] = 'Det här värdet är tilldelat automatiskt och det går inte att ändra.';
$string['importfields'] = 'Fält att importera';
$string['inspect'] = 'Inspektera';
$string['installnosuchfunction'] = 'Kodningsfel! Någonting försöker att installera en mnet xmlrpc funktion ({$a->method}) från en fil ({$a->file}) och den går inte att hitta!';
$string['installnosuchmethod'] = 'Kodningsfel! Någonting försöker att installera en mnet xmlrpc funktion ({$a->method}) på en klass ({$a->class}) och den går inte att hitta!';
$string['installreflectionclasserror'] = 'Kodningsfel! MNet introspektion misslyckades för metoden \'{$a->method}\' i klassen \'{$a->class}\'. Det ursprungliga felmeddelandet, om det är till hjälp, är: \'{$a->error}\'';
$string['installreflectionfunctionerror'] = 'Kodningsfel! MNet introspektion misslyckades för metoden \'{$a->method}\' i filen \'{$a->file}\'. Det ursprungliga felmeddelandet, om det är till hjälp, är: \'{$a->error}\'';
$string['invalidaccessparam'] = 'Ogiltig parameter för tillgänglighet';
$string['invalidactionparam'] = 'Ogiltig parameter för åtgärd';
$string['invalidhost'] = 'Du måste ange en giltig identifierare för värd.';
$string['invalidpubkey'] = 'Nyckeln är inte en giltig SSL-nyckel. ({$a})';
$string['invalidurl'] = 'Ogiltig parameter för URL';
$string['ipaddress'] = 'IP-adress';
$string['is_in_range'] = 'IP-adressen  <code>{$a}</code>  representerar en giltig tillförlitlig värd.';
$string['ispublished'] = '{$a} har aktiverat den här tjänsten för Dig.';
$string['issubscribed'] = ' {$a} prenumererar på den här tjänsten hos Din värd.';
$string['keydeleted'] = 'Din nyckel har framgångsrikt tagits bort och ersatts.';
$string['keymismatch'] = 'Den publika nyckel som Du innehar skiljer sig från den publika nyckel som den f.n. publicerar. Den aktuella publicerade nyckeln är:';
$string['last_connect_time'] = 'Senast tidpunkt för anslutning';
$string['last_connect_time_help'] = 'Det senaste tillfället som Du kontaktade den här värden.';
$string['last_transport_help'] = 'Den transport som Du använde för den senaste anslutningen till den här värden.';
$string['leavedefault'] = 'Använd de förvalda standardinställningarna istället';
$string['listservices'] = 'Lista tjänster';
$string['loginlinkmnetuser'] = '<br />Om Du är en MNET fjärranvändare <a href="{$a}">bekräfta Din e-postadress här</a> Du blir omdirigerad till Din sida för inloggning.';
$string['logs'] = 'Loggar';
$string['managemnetpeers'] = 'Administrera jämbördiga (peers)';
$string['method'] = 'Metod';
$string['methodhelp'] = 'Metodhjälp för {$a}';
$string['methodsavailableonhost'] = 'Metoder som är tillgängliga på {$a}';
$string['methodsavailableonhostinservice'] = 'Metoder som är tillgängliga för {$a->service} på {$a->host}';
$string['methodsignature'] = 'Metodsignatur för {$a}';
$string['mnet'] = 'MNet';
$string['mnet_concatenate_strings'] = 'Konkatenera (upp til) 3 strängar och returnera resultatet.';
$string['mnetdisabled'] = 'MNet är <strong>avaktiverat</strong>.';
$string['mnetidprovider'] = 'Leverantör av ID för MNet';
$string['mnetidprovidermsg'] = 'Du bör kunna logga in hos din {$a} leverantör.';
$string['mnetidprovidernotfound'] = 'Tyvärr, men ingen ytterligare information kunde hittas.';
$string['mnetlog'] = 'Loggar';
$string['mnetpeers'] = '\'Peers\' jämbördiga partners';
$string['mnetservices'] = 'Tjänster';
$string['mnet_session_prohibited'] = 'Användare från Din hemserver har f.n. inte tillstånd att navigera vidare till {$a}.';
$string['mnetsettings'] = 'MNET inställningar';
$string['moodle_home_help'] = 'Sökvägen till ingångssidan (hem/första) för MNet-applikationen hos fjärrvärden, t.ex. /moodle/.';
$string['name'] = 'Namn';
$string['net'] = 'Nätverkande';
$string['networksettings'] = 'Inställningar för nätverkande';
$string['never'] = 'Aldrig';
$string['noaclentries'] = 'Inga tillägg till listan över kontroll av SSO-tillgänglighet.';
$string['noaddressforhost'] = 'Det gick tyvärr inte att tolka värdnamnet ({$a})';
$string['nocurl'] = 'PHP Curl-biblioteket är inte installerat.';
$string['nolocaluser'] = 'Det finns ingen lokal post för fjärranvändaren och det gick inte att skapa någon eftersom den här värden inte skapar användare automatiskt. Var snäll och kontakta Din administratör!';
$string['nomodifyacl'] = 'Du har inte tillstånd att modifiera listan för kontroll av MNET-tillgänglighet.';
$string['nonmatchingcert'] = 'Ämnet för certifikatet: <br /><em>{$a->subject}</em><br /> matchar inte värden som det kom från:<br /><em>{$a->host}</em>.';
$string['nopubkey'] = 'Det uppstod ett problem i samband med att den publika nyckeln skulle hämtas.<br />Det kan hända att värden inte tillåter MNET eller nyckeln är ogiltig.';
$string['nosite'] = 'Det gick inte att hitta en kurs på webbplatsnivå';
$string['nosuchfile'] = 'Filen/funktionen {$a} finns inte.';
$string['nosuchfunction'] = 'Det gick inte att lokalisera funktionen eller också var funktionen blockerad för RPC.';
$string['nosuchmodule'] = 'Funktionen var feladresserad och det gick inte att lokalisera den. Var snäll och använd formatet mod/modulename/lib/functionname';
$string['nosuchpublickey'] = 'Det gick inte att få tillgång till en publik nyckel för verifiering av signatur.';
$string['nosuchservice'] = 'Tjansten RPC körs inte på den här värden.';
$string['nosuchtransport'] = 'Det finns inga transporter med det ID:t';
$string['notBASE64'] = 'Den här strängen är inte i formatet Base64. Det kan inte vara en giltig nyckel.';
$string['notenoughidpinfo'] = 'Din leverantör av identiteter ger Dig tyvärr inte tillräckligt med information för att skapa eller uppdatera Ditt konto lokalt.';
$string['not_in_range'] = 'IP-adressen  <code>{$a}</code>  representerar inte en giltig tillförlitlig värd.';
$string['notinxmlrpcserver'] = 'Försök att få tillgång till fjärrklienten för MNet, inte under körning av XMLRPC server.';
$string['notmoodleapplication'] = 'OBS! Detta är inte en Moodle-applikation så en del av metoderna för inspektion kanske inte kommer att fungera som de ska.';
$string['notPEM'] = 'Den här nyckeln är inte i PEM-format. Den kommer inte att fungera.';
$string['notpermittedtojump'] = 'Du har inte tillstånd att inleda en fjärrsession från den här Moodle-hubben.';
$string['notpermittedtoland'] = 'Du har inte tillstånd att inleda en fjärrsession.';
$string['off'] = 'Av';
$string['on'] = 'På';
$string['options'] = 'Alternativ';
$string['peerprofilefielddesc'] = 'Här kan Du överskrida de globala inställningarna angående vilka profilfält som ska sändas och importeras när nya användare ska skapas.';
$string['permittedtransports'] = 'Tillåtna transporter';
$string['phperror'] = 'Ett internt PHP-fel förhindrade Din förfrågan från att fullföljas.';
$string['position'] = 'Position';
$string['postrequired'] = 'Funktionen \'ta bort\' kräver en POST-förfrågan.';
$string['profileexportfields'] = 'Fält att sända';
$string['profilefields'] = 'Profilfält';
$string['profileimportfields'] = 'Fält att importera';
$string['promiscuous'] = 'Promiskuös';
$string['publickey'] = 'Publik nyckel';
$string['publickey_help'] = 'Den publika nyckeln hämtas automatiskt från fjärrservern.';
$string['publish'] = 'Publicera';
$string['reallydeleteserver'] = 'Är Du säker på att Du vill ta bort servern';
$string['receivedwarnings'] = 'De följande varningarna mottogs';
$string['recordnoexists'] = 'Posten existerar inte';
$string['reenableserver'] = 'Nej - välj det här alternativet för att återaktivera den här servern.';
$string['registerallhosts'] = 'Registrera alla värdar (<em>Hub mode</em>)';
$string['registerallhostsexplain'] = 'Du kan välja att registrera alla värdar som försöker att ansluta sig till Dig automatiskt. Det innebär att för vilken MNet-sajt som än ansluter till Dig och efterfrågar Din publika nyckel kommer en post att visas i Din lista över värdar. <br />Du har alternativet här nedan att konfigurera tjänster för \'Alla värdar\' och genom att aktivera några tjänster där kommer Du att kunna tillhandahålla tjänster till vilken Moodle-server som helst utan restriktioner.';
$string['registerhostsoff'] = 'Registrering av alla värdar är f n <b>av</b>';
$string['registerhostson'] = 'Registrering av alla värdar är f n <b>på</b>';
$string['remotecourses'] = 'Fjärrkurser';
$string['remotehost'] = 'Fjärrvärd';
$string['remotehosts'] = 'Fjärrvärdar';
$string['remoteuserinfo'] = 'Fjärr- {$a->remotetype} användare - profil hämtad från <a href="{$a->remoteurl}">{$a->remotename}</a>';
$string['requiresopenssl'] = 'Nätverkande kräver ett tillägg (extension) för OpenSSL.';
$string['restore'] = 'Återställ';
$string['returnvalue'] = 'Returvärde';
$string['reviewhostdetails'] = 'Kontrollera detaljer angående värd';
$string['reviewhostservices'] = 'Granska tjänster hos värd';
$string['RPC_HTTP_PLAINTEXT'] = 'HTTP okrypterad';
$string['RPC_HTTP_SELF_SIGNED'] = 'HTTP (själv-signerad)';
$string['RPC_HTTPS_SELF_SIGNED'] = 'HTTPS (själv-signerad)';
$string['RPC_HTTPS_VERIFIED'] = 'HTTPS (signerad)';
$string['RPC_HTTP_VERIFIED'] = 'HTTP (signerad)';
$string['selectaccesslevel'] = 'Var snäll och välj en nivå för tillgänglighet från listan.';
$string['selectahost'] = 'Var snäll och välj en fjärrvärd för Moodle.';
$string['service'] = 'Namn på tjänst';
$string['serviceid'] = 'ID för tjänst';
$string['servicesavailableonhost'] = 'Tjänster som är tillgängliga på {$a}';
$string['serviceswepublish'] = 'Tjänster som vi publicerar till {$a}';
$string['serviceswesubscribeto'] = 'Tjänster hos {$a} som vi abonnerar på.';
$string['settings'] = 'Inställningar';
$string['showlocal'] = 'Visa lokala användare';
$string['showremote'] = 'Visa fjärranvändare';
$string['ssl_acl_allow'] = 'SSO ACL: Tillåt användare {$a->user} från {$a->host}';
$string['ssl_acl_deny'] = 'SSO ACL: Avvisa användare {$a->user} från {$a-host}';
$string['ssoaccesscontrol'] = 'Kontroll av tillgänglighet av SSO';
$string['ssoacldescr'] = 'Använd den här sidan för att medge/avslå tillgång för specifika användare från fjärrvärdar i MNet. Det här är funktionellt när Du erbjuder SSO-tjänster till fjärranvändare. För att kontrollera Dina <em>lokala</em> användares kapacitet att navigera vidare till andra värdar i MNet så kan Du använda systemet för roller till att medge dem kapaciteten  <em>mnetlogintoremote</em>.';
$string['ssoaclneeds'] = 'För att Du ska kunna använda denna  funktionalitet så måste Du aktivera nätverk för Moodle plus att plugin-programmet för autenticering via ett nätverk för Moodle ska vara aktiverat.';
$string['strict'] = 'Strikt';
$string['subscribe'] = 'Prenumerera';
$string['system'] = 'System';
$string['testclient'] = 'Testklient för MNet';
$string['testtrustedhosts'] = 'Testa en adress';
$string['testtrustedhostsexplain'] = 'Mata in en IP-adress för att kontrollera om det är en tillförlitlig värd.';
$string['theypublish'] = 'De publicerar';
$string['theysubscribe'] = 'De prenumererar';
$string['transport_help'] = 'De här alternativen är reciproka (ömsesidiga) så Du kan bara tvinga en fjärrvärd att använda ett signerat SSL-certifikat om Din egen server också har ett signerat SSL-certifikat';
$string['trustedhosts'] = 'XML-RPC värdar';
$string['trustedhostsexplain'] = '<p>Mekanismen för tillförlitliga värdar tillåter specifika maskiner att genomföra anrop via XML-RPC till valfri del av API för Moodle. Detta är tillgängligt för skript som kan kontrollera Moodles beteende och det kan vara mycket risktfyllt att aktivera detta alternativ. Om Du är tveksam, använd inte alternativet</p><p>Det är <strong>inte</strong> nödvändigt för användning av MNet.</p><p>För att aktivera alternativet så ska Du mata in en lista över IP-adresser, en på varje rad. Några exempel: </p> Din \'localhost\': <br />127.0.0.1<br /> Din \'localhost\'(med ett block för nätverk):<br />127.0.0.1/32<br />Endast värden med IP-adressen 192.168.0.7:<br />192.168.0.7/32<br />Vilken värd som helst med en IP-adress mellan 192.168.0.1 och 192.168.0.255:<br />192.168.0.0/24<br />Vilken värd som helst:<br />192.168.0.0/0<br />Det senaste exemplet rekommenderas givetvis <strong>inte</strong> som konfiguration.';
$string['turnitoff'] = 'Avaktivera av det';
$string['turniton'] = 'Aktivera det';
$string['type'] = 'Typ';
$string['unknown'] = 'Okänd';
$string['unknownerror'] = 'Ett okänt fel uppstod under förhandlingarna.';
$string['usercannotchangepassword'] = 'Du kan inte ändra Ditt lösenord här eftersom Du är en fjärranvändare.';
$string['userchangepasswordlink'] = '<br /> Du kanske kan ändra Ditt lösenord hos Din<a href="{$a->wwwroot}/login/change_password.php">{$a->description}</a> tillhandahållare.';
$string['usernotfullysetup'] = 'Ditt användarkonto är inte komplett. Du behöver gå<a href="{$a}"> tillbaka till Din leverantör</a> och försäkra Dig om att Din profil är komplett där. Du kanske måste logga ut och in igen för att det här ska fungera.';
$string['usersareonline'] = 'Varning! {$a} användare från den servern är   just nu inloggade på Din webbplats.';
$string['validated_by'] = 'Den är validerad genom nätverket:  <code>{$a}</code>';
$string['verifysignature-error'] = 'Verifikationen av signaturen misslyckades.  Det uppstod ett fel.';
$string['verifysignature-invalid'] = 'Verifikationen av signaturen misslyckades. Det verkat som den här nyttolasten inte hade signerats av Dig.';
$string['version'] = 'Version';
$string['warning'] = 'Varning';
$string['wrong-ip'] = 'Din IP-adress matchar inte den adress som vi har i våra register.';
$string['xmlrpc-missing'] = 'Du måste ha XML-RPC installerad i Din instans av PHP för att kunna använda den här egenskapen.';
$string['yourhost'] = 'Din värd';
$string['yourpeers'] = 'Dina \'peers\' - jämbördiga partners';
