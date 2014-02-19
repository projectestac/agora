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
 * Strings for component 'webservice', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   webservice
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcapabilitytousers'] = 'Kontrollera användares förmågor';
$string['addcapabilitytousersdescription'] = 'Användare bör ha två förmågor - webservice:createtoken och en förmåga som matchar protokollet som används, till exempel webservice/rest:use, webservice/soap:use. För att åstadkomma detta, skapa en roll för webbtjänster med den lämpliga förmågan tillåten och tilldela den till användaren för webbtjänster som en systemroll.';
$string['addfunction'] = 'Lägg till funktion';
$string['addfunctionhelp'] = 'Välj funktion som skall läggas till tjänsten.';
$string['addfunctions'] = 'Lägg till funktioner';
$string['addfunctionsdescription'] = 'Välj nödvändiga funktioner för den nyskapade tjänsten.';
$string['addrequiredcapability'] = 'Tilldela/ta bort nödvändig kapacitet';
$string['addservice'] = 'Lägg till en ny tjänst: {$a->name} (ID: {$a->id})';
$string['addservicefunction'] = 'Lägg till funktioner till tjänsten "{$a}"';
$string['allusers'] = 'Alla användare';
$string['amftestclient'] = 'AMF testklient';
$string['apiexplorer'] = 'API explorer';
$string['apiexplorernotavalaible'] = 'API explorer finns inte ännu.';
$string['arguments'] = 'Argument';
$string['authmethod'] = 'Autentiseringsmetod';
$string['cannotgetcoursecontents'] = 'Kan inte hämta kursens innehåll';
$string['checkusercapability'] = 'Kontrollera användarförmåga';
$string['configwebserviceplugins'] = 'Av säkerhetsskäl bör endast protokoll som är i bruk aktiveras.';
$string['context'] = 'Sammanhang';
$string['createservicedescription'] = 'En tjänst är en uppsättning webbtjänstfunktioner. Du kommer tillåta användaren att komma åt en ny tjänst. På sidan <strong>Lägg till tjänst</strong> kryssa i alternativen \'Aktivera\' och \'Auktoriserade användare\'. Välj \'Ingen förmåga krävs\'.';
$string['createserviceforusersdescription'] = 'En tjänst är en uppsättning webbtjänstfunktioner. Du kommer tillåta användare att komma åt en ny tjänst. På sidan <strong>Lägg till tjänst</strong> kryssa i alternativen \'Aktivera\' och \'Auktoriserade användare\'. Välj \'Ingen förmåga krävs\'.';
$string['createtoken'] = 'Skapa token';
$string['createtokenforuser'] = 'Skapa en token för en användare';
$string['createtokenforuserdescription'] = 'Skapa en token för webbtjänstanvändaren.';
$string['createuser'] = 'Skapa en specifik användare';
$string['criteriaerror'] = 'Saknade behörighet att söka på ett kriterium.';
$string['default'] = 'Standard till "{$a}"';
$string['deleteaservice'] = 'Ta bort tjänsten';
$string['deleteservice'] = 'Ta bort tjänsten: {$a->name} (ID: {$a->id})';
$string['deleteserviceconfirm'] = 'Vid borttagning av en tjänst kommer alla token som är relaterade till tjänsten att tas bort. Vill du verkligen ta bort extern tjänst "{$a}"?';
$string['deletetokenconfirm'] = 'Vill du verkligen ta bort denna webbtjänst token för <strong>{$a->user}</strong> för tjänsten <strong>{$a->service}?</strong>';
$string['disabledwarning'] = 'Alla webbtjänst protokoll är inaktiverade. "Aktivera webbtjänster" inställningen finns under Avancerade funktioner.';
$string['doc'] = 'Dokumentation';
$string['docaccessrefused'] = 'Du får inte se dokumentationen för denna token';
$string['documentation'] = 'webbtjänst dokumentation';
$string['downloadfiles'] = 'Kan ladda ner filer';
$string['editaservice'] = 'Redigera tjänsten';
$string['editservice'] = 'Redigera tjänsten: {$a->name} (ID: {$a->id})';
$string['enabled'] = 'Aktiverad';
$string['enabledocumentation'] = 'Aktivera utvecklardokumentation';
$string['enabledocumentationdescription'] = 'Detaljerad dokumentation för webbtjänster är tillgänglig för aktiverade protokoll.';
$string['enableprotocols'] = 'Aktivera protokoll';
$string['enableprotocolsdescription'] = 'Åtminstone ett protokoll bör aktiveras. Av säkerhetsskäl bör endast protokoll som skall användas aktiveras.';
$string['enablews'] = 'Aktivera webbtjänster';
$string['enablewsdescription'] = 'Webbtjänster måste aktiveras i Avancerade funktioner.';
$string['entertoken'] = 'Ange en säkerhetsnyckel/token:';
$string['error'] = 'Fel: {$a}';
$string['errorcodes'] = 'Felmeddelande';
$string['invalidiptoken'] = 'Ogiltig token - ditt IP stöds inte';
$string['invalidtimedtoken'] = 'Ogiltig token - den har utgått';
$string['invalidtoken'] = 'Ogiltig token - token hittades inte';
$string['key'] = 'Nyckel/Kod';
$string['managetokens'] = 'Hantera token';
$string['missingrequiredcapability'] = 'Förmågan {$a} krävs.';
$string['norequiredcapability'] = 'Ingen förmåga krävs';
$string['notoken'] = 'Tokenlistan är tom';
$string['phpparam'] = 'XML-RPC (PHP struktur)';
$string['phpresponse'] = 'XML-RPC (PHP struktur)';
$string['postrestparam'] = 'PHP-kod för REST (POST-begäran)';
$string['potusers'] = 'Inte auktoriserade användare';
$string['potusersmatching'] = 'Icke auktoriserade användare som matchar';
$string['print'] = 'Skriv ut allt';
$string['protocol'] = 'Protokoll';
$string['removefunction'] = 'Ta bort';
$string['requireauthentication'] = 'Denna metod kräver autentisering med xxx behörighet.';
$string['required'] = 'Krävs';
$string['requiredcapability'] = 'Förmåga som krävs';
$string['requiredcapability_help'] = 'Om aktiverad kan endast användare med den förmåga som krävs komma åt tjänsten.';
$string['response'] = 'Svar';
$string['restcode'] = 'REST';
$string['restexception'] = 'REST';
$string['restparam'] = 'REST (POST parametrar)';
$string['restrictedusers'] = 'Behöriga användare endast';
$string['securitykey'] = 'Säkerhetsnyckel (token)';
$string['securitykeys'] = 'Säkerhetsnycklar';
$string['selectauthorisedusers'] = 'Välj behöriga användare';
$string['selectedcapability'] = 'Vald';
$string['selectedcapabilitydoesntexit'] = 'Den för närvarande inställda förmåga som krävs ({$a}) existerar inte längre. Var god ändra den och spara ändringarna.';
$string['selectservice'] = 'Välj en tjänst';
$string['selectspecificuser'] = 'Välj en specifik användare';
$string['selectspecificuserdescription'] = 'Lägg till webbtjänstanvändaren som en behörig användare.';
$string['service'] = 'Tjänsten';
$string['servicehelpexplanation'] = 'En tjänst är en uppsättning funktioner. En tjänst kan nås av alla användare eller bara specificerade användare.';
$string['servicename'] = 'Tjänstens namn';
$string['servicenotavailable'] = 'Webbtjänst är inte tillgänglig (den finns inte eller är avaktiverad)';
$string['servicesbuiltin'] = 'Inbyggda tjänster';
$string['servicescustom'] = 'Anpassade tjänster';
$string['serviceusers'] = 'Behöriga användare';
$string['serviceusersettings'] = 'Användarinställningar';
$string['serviceusersmatching'] = 'Behöriga användare som matchar';
$string['serviceuserssettings'] = 'Ändra inställningar för behöriga användare';
$string['simpleauthlog'] = 'Enkel autentiseringsinloggning';
$string['step'] = 'Steg';
$string['supplyinfo'] = 'Mer detaljer';
$string['testclient'] = 'Webbtjänst testklient';
$string['testwithtestclient'] = 'Testa tjänsten';
$string['token'] = 'Token';
$string['tokenauthlog'] = 'Token autentisering';
$string['tokencreatedbyadmin'] = 'Kan endast återställas av Administratören (*)';
$string['tokencreator'] = 'Skapare';
$string['userasclients'] = 'Användare som klienter med token';
$string['webservicetokens'] = 'Webbtjänst token';
