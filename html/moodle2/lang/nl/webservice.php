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
 * Strings for component 'webservice', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   webservice
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessexception'] = 'Uitzondering toegangscontrole';
$string['actwebserviceshhdr'] = 'Actieve web service protocols';
$string['addaservice'] = 'Voeg service toe';
$string['addcapabilitytousers'] = 'Controleer gebruikersmogelijkheden';
$string['addcapabilitytousersdescription'] = 'Om webservices te kunnen gebruiken hebben gebruikers twee mogelijkheden  nodig:
\'/webservice:createtoken\'  en een mogelijkheid die overeenkomt met de webservice protocols
(\'webservice/rest:use\', \'webservice/soap:use\', ...).
Om dit op te zetten maak je een  nieuwe "Webservice" systeemrol met de juiste mogelijkheden. Wijs deze systeemrol dan toe aan de webservicegebruiker.';
$string['addfunction'] = 'Functie toevoegen';
$string['addfunctionhelp'] = 'Kies de functie om aan de service toe te voegen.';
$string['addfunctions'] = 'Functies toevoegen';
$string['addfunctionsdescription'] = 'Kies de vereiste functies voor de nieuwe service.';
$string['addrequiredcapability'] = 'Toewijzen/verwijderen van de vereiste mogelijkheid';
$string['addservice'] = 'Nieuw service toevoegen: {$a->name} (id: {$a->id})';
$string['addservicefunction'] = 'Voeg functies toe aan service "{$a}"';
$string['allusers'] = 'Alle gebruikers';
$string['amftestclient'] = 'AMF testclient';
$string['apiexplorer'] = 'API explorer';
$string['apiexplorernotavalaible'] = 'API explorer nog niet beschikbaar';
$string['arguments'] = 'Argumenten';
$string['authmethod'] = 'Authenticatiemethode';
$string['cannotcreatetoken'] = 'Geen rechten om een webservice token aan te maken voor service {$a}.';
$string['cannotgetcoursecontents'] = 'Can cursusinhoud niet ophalen';
$string['checkusercapability'] = 'Controleer gebruikersmogelijkheden';
$string['checkusercapabilitydescription'] = 'Om webservices te kunnen gebruiken jeeft een gebruiker de mogelijkheid  nodig die overeenkomt met de webservice protocols
(\'webservice/rest:use\', \'webservice/soap:use\', ...).
Om dit op te zetten maak je een nieuwe "Webservice" systeemrol met de juiste mogelijkheden. Wijs deze systeemrol dan toe aan de webservicegebruiker.';
$string['configwebserviceplugins'] = 'Voor veiligheidsredenen worden alleen protocols die in gebruik zijn ingeschakeld.';
$string['context'] = 'Context';
$string['createservicedescription'] = 'Een service is een set met webservicefuncties. Je kunt een gebruiker toestaan een nieuwe service te gebruiken. Controleer de \'Inschakelen\' en \'Geauthoriseerde gebruikers\'-opties op de <strong>Voeg Service toe</strong>-pagina. Kies \'Geen vereiste mogelijlkheid\'. ';
$string['createserviceforusersdescription'] = 'Een service is een set met webservicefuncties. Je kunt een gebruiker toestaan een nieuwe service te gebruiken. Controleer de \'Inschakelen\' en \'Geauthoriseerde gebruikers\'-opties op de <strong>Voeg Service toe</strong>-pagina. Kies \'Geen vereiste mogelijlkheid\'. ';
$string['createtoken'] = 'Maak token';
$string['createtokenforuser'] = 'Maak een token voor een gebruiker';
$string['createtokenforuserdescription'] = 'Maak een token voor de webservice gebruiker';
$string['createuser'] = 'Maak een specifieke gebruiker';
$string['createuserdescription'] = 'Je moet een specifieke webservicegebruiker maken die het systeem representeert dat Moodle controleert.';
$string['criteriaerror'] = 'Ontbrekende rechten om te zoeken op een criterium.';
$string['default'] = 'Standaard naar "{$a}"';
$string['deleteaservice'] = 'Verwijder service';
$string['deleteservice'] = 'Verwijder de service: {$a->name} (id: {$a->id})';
$string['deleteserviceconfirm'] = 'Een service verwijderen zal ook alle tokens, gerelateerd aan deze service verwijderen. Wil je echt de externe service "{$a}" verwijderen?';
$string['deletetokenconfirm'] = 'Wil je echt dit webservice token voor <strong>{$a->user}</strong> verwijderen op de service <strong>{$a->service}</strong>?';
$string['disabledwarning'] = 'Alle webserviceprotocols zijn uitgeschakeld. De "Webservices inschakelen"-instelling kan gevonden worden in Geavanceerde mogelijkheden.';
$string['doc'] = 'Documentatie';
$string['docaccessrefused'] = 'Je hebt het recht niet om de documentatie voor dit token te bekijken';
$string['documentation'] = 'webservice documentatie';
$string['downloadfiles'] = 'Kan bestanden downloaden';
$string['downloadfiles_help'] = 'Indien ingeschakeld kan elke gebruiker bestanden downloaden met zijn beveiligingssleutel. Natuurlijk zijn ze beperkt tot de bestanden die ze mogen downloaden van de site.';
$string['editaservice'] = 'Bewerk service';
$string['editservice'] = 'Bewerk de service: {$a->name} (id: {$a->id}) ';
$string['enabled'] = 'Ingeschakeld';
$string['enabledocumentation'] = 'Ontwikkelaarsdocumentatie inschakelen';
$string['enabledocumentationdescription'] = 'Er is gedetailleerde web service documentatie beschikbaar voor de ingeschakelde protocols';
$string['enablemobilewsoverview'] = 'Ga naar {$a->manageservicelink} beheer pagina, controleer de "{$a->enablemobileservice}" instelling en bewaar. Alles zal voor jou ingesteld worden en alle site gebruikers zullen de officiële Moodle app kunnen gebruiken. Huidige status: {$a->wsmobilestatus}';
$string['enableprotocols'] = 'Protocols inschakelen';
$string['enableprotocolsdescription'] = 'Er moet minstens één protocol ingeschakeld zijn. Om veiligheidsredenen schakel je best enkel die protocols in die je gebruikt.';
$string['enablews'] = 'Webservices inschakelen';
$string['enablewsdescription'] = 'Webservices moeten ingeschakeld zijn in Geavanceerde mogelijkheden.';
$string['entertoken'] = 'Geef een beveiligingssleutel/token';
$string['error'] = 'Fout: {$a}';
$string['errorcatcontextnotvalid'] = 'Je kunt geen functies uitvoeren in de categorie context (categorieID: {$a->catid}). De context foutcode was: {$a->message}';
$string['errorcodes'] = 'Foutboodschap';
$string['errorcoursecontextnotvalid'] = 'Je kunt geen functies uitvoeren in de cursuscontext (courseID: {$a->courseID}). De context foutcode was: {$a->message}';
$string['errorinvalidparam'] = 'De param "{$a}" is ongeldig';
$string['errornotemptydefaultparamarray'] = 'De webservice beschrijvingsparameter met als naam \'{$a}\' is een enkele of meervoudige structuur. De standaard kan enkel een lege array zijn. Controleer je webservice beschrijving.';
$string['erroroptionalparamarray'] = 'De webservice beschrijvingsparameter met als naam \'{$a}\' is een enkele of meervoudige structuur. Dit kan niet ingesteld worden als VALUE_OPTIONAL. Controleer de webservice beschrijving.';
$string['event_webservice_function_called'] = 'Webservice-functie aangeroepen';
$string['event_webservice_login_failed'] = 'Webservice login mislukt';
$string['event_webservice_service_created'] = 'Webservice service gemaakt';
$string['event_webservice_service_updated'] = 'Webservice service aangepast';
$string['event_webservice_service_user_added'] = 'Webservice service gebruiker toegevoegd';
$string['event_webservice_service_user_removed'] = 'Webservice service gebruiker verwijderd';
$string['event_webservice_token_created'] = 'Webservice token gemaakt';
$string['event_webservice_token_sent'] = 'Webservice token verstuurd';
$string['execute'] = 'Voer uit';
$string['executewarnign'] = 'WAARSCHUWING: als je op uitvoeren drukt, dan zal je databank aangepast worden en die wijzigingen kunnen niet automatisch ongedaan gemaakt worden!';
$string['externalservice'] = 'Externe service';
$string['externalservicefunctions'] = 'Functies externe service';
$string['externalservices'] = 'Externe services';
$string['externalserviceusers'] = 'Gebruikers externe service';
$string['failedtolog'] = 'Logging mislukt';
$string['filenameexist'] = 'Bestandsnaam bestaat al: {$a}';
$string['forbiddenwsuser'] = 'Kan geen token aanmaken voor een onbevestigde, verwijderde, geschorste of gastgebruiker.';
$string['function'] = 'Functie';
$string['functions'] = 'Functies';
$string['generalstructure'] = 'Algemene structuur';
$string['information'] = 'Informatie';
$string['installexistingserviceshortnameerror'] = 'Een webservice met de korte naam "{$a}" bestaat al. Kan geen andere webservice installeren/updaten met deze korte naam.';
$string['installserviceshortnameerror'] = 'Codefout: de korte naam van de service {$a} zou enkel cijfers, letters, underscore of liggend streepje mogen bevatten.';
$string['invalidextparam'] = 'Ongeldige externe api parameter: {$a}';
$string['invalidextresponse'] = 'Ongeldig extern api antwoord: {$a}';
$string['invalidiptoken'] = 'Ongeldig token - jouw IP wordt niet ondersteund';
$string['invalidtimedtoken'] = 'Ongeldig token - token verlopen';
$string['invalidtoken'] = 'Ongeldig token - token niet gevonden';
$string['iprestriction'] = 'IP beperking';
$string['iprestriction_help'] = 'De gebruiker zal de webservice moeten aanspreken vanaf de IP\'s in de lijst (door komma\'s gescheiden).';
$string['key'] = 'Sleutel';
$string['keyshelp'] = 'De sleutels die gebruikt worden om jouw Moodle account aan te spreken vanaf externe applicaties.';
$string['manageprotocols'] = 'Beheer protocols';
$string['managetokens'] = 'Beheer tokens';
$string['missingcaps'] = 'Ontbrekende mogelijkheden';
$string['missingcaps_help'] = 'Lijst van vereiste mogelijkheden voor de service die de geselecteerde gebruiker niet heeft. Ontbrekende mogelijkheden moeten toegevoegd worden aan de rol van de gebruiker om de service te kunnen gebruiken.';
$string['missingpassword'] = 'Wachtwoord ontbreekt';
$string['missingrequiredcapability'] = 'De mogelijkheid {$a} is vereist.';
$string['missingusername'] = 'Gebruikersnaam ontbreekt';
$string['missingversionfile'] = 'Codefout: version.php ontbreekt voor component {$a}';
$string['mobilewsdisabled'] = 'Uitgeschakeld';
$string['mobilewsenabled'] = 'Ingeschakeld';
$string['nocapabilitytouseparameter'] = 'De gebruiker heeft de vereiste mogelijkheid niet om parameter {$a} te gebruiken.';
$string['nofunctions'] = 'Deze service heeft geen functies.';
$string['norequiredcapability'] = 'Geen vereiste mogelijkheid';
$string['notoken'] = 'De tokenlijst is leeg';
$string['onesystemcontrolling'] = 'Een extern systeem toestaan Moodle te controleren';
$string['onesystemcontrollingdescription'] = 'Onderstaande stappen helpen je om de Moodle webservice te configureren voor een systeem dat interageert met Moodle controleert (vb een leerlinginformatiesysteem). Deze stappen helpen je om de aangeraden tokenauthenticatiemethode (met beveiligingssleutels) te configureren.';
$string['operation'] = 'Operatie';
$string['optional'] = 'Optioneel';
$string['passwordisexpired'] = 'Wachtwoord is verlopen';
$string['phpparam'] = 'XML-RPC (PHP-structuur)';
$string['phpresponse'] = 'XML-RPC (PHP-structuur)';
$string['postrestparam'] = 'PHP-code voor REST (POST request)';
$string['potusers'] = 'Niet-geauthoriseerde gebruikers';
$string['potusersmatching'] = 'Overeenkomstige niet-geauthoriseerde gebruikers';
$string['print'] = 'Druk alles af';
$string['protocol'] = 'Protocol';
$string['removefunction'] = 'Verwijder';
$string['removefunctionconfirm'] = 'Wil je echt de functie "{$a->function}"  van service "{$a->service}" verwijderen?';
$string['requireauthentication'] = 'Deze methode vereist authenticatie met xxx rechten.';
$string['required'] = 'Vereist';
$string['requiredcapability'] = 'Vereiste mogelijkheid';
$string['requiredcapability_help'] = 'Indien ingesteld kunnen enkel gebruikers met de vereiste mogelijkheid de service gebruiken.';
$string['requiredcaps'] = 'Vereiste mogelijkheden';
$string['resettokenconfirm'] = 'Wil je echt de webservice sleutel voor <strong>{$a->user}</strong> op de service <strong>{$a->service}</strong> recetten?';
$string['resettokenconfirmsimple'] = 'Wil je echt deze sleutel resetten? Alle bewaarde links waarin de oude sleutel zit zullen niet meer werken.';
$string['response'] = 'Antwoord';
$string['restcode'] = 'REST';
$string['restexception'] = 'REST';
$string['restoredaccountresetpassword'] = 'De teruggezette account moet eerst zijn wachtwoord opnieuw instellen voor die een token kan krijgen.';
$string['restparam'] = 'REST (POST parameters)';
$string['restrictedusers'] = 'Enkel geauthoriseerde gebruikers';
$string['restrictedusers_help'] = 'Deze instelling bepaalt of alle gebruikers met het recht om een webservice token te maken een token kunnen maken via hun veiligheidssleutelpagina of enkel geauthoriseerde gebruikers dat kunnen.';
$string['securitykey'] = 'Veiligheidssleutel (token)';
$string['securitykeys'] = 'Veiligheidssleutels';
$string['selectauthorisedusers'] = 'Geselecteerde geauthoriseerde gebruikers';
$string['selectedcapability'] = 'Geselecteerd';
$string['selectedcapabilitydoesntexit'] = 'De vereiste mogelijkheid ({$a}) die nu ingesteld is, bestaat niet meer. Wijzig dit en bewaar de wijzigingen';
$string['selectservice'] = 'Selecteer een service';
$string['selectspecificuser'] = 'Selecteer een bepaalde gebruiker';
$string['selectspecificuserdescription'] = 'Voeg de webservices gebruikers toe aan de lijst met geautoriseerde gebruikers.';
$string['service'] = 'Service';
$string['servicehelpexplanation'] = 'Een service is een functieset. Een service kan toegankelijk zijn voor alle gebruiker of slechts voor enkele bepaalde gebruikers.';
$string['servicename'] = 'Servicenaam';
$string['servicenotavailable'] = 'Webservices is niet beschikbaar (het bestaat niet of is uitgeschakeld)';
$string['servicesbuiltin'] = 'Ingebouwde service';
$string['servicescustom'] = 'Aangepaste services';
$string['serviceusers'] = 'Geauthoriseerde gebruikers';
$string['serviceusersettings'] = 'Gebruikersinstellingen';
$string['serviceusersmatching'] = 'Overenkomstige geauthoriseerde gebruikers';
$string['serviceuserssettings'] = 'Instellingen wijzigen voor de geauthoriseerde gebruikers';
$string['simpleauthlog'] = 'Eenvoudige authenticatielogin';
$string['step'] = 'Stap';
$string['supplyinfo'] = 'Meer details';
$string['testauserwithtestclientdescription'] = 'Simuleer externe toegand tot de service door de webservice test client te gebruiken. Voor je dat kunt doen, moet je aanmelden met de gebruiker die de "moodle/webservice:createtoken"-mogelijkheid heeft en moet je zijn veiligheidssleutel (token) van zijn "Mijn Moodle"-blok halen. Je zult dit token gebruiken in de testclient. In de testclient kies je ook een ingeschakeld protocol met tokenauthenticatie. <strong>Waarschuwing: de functies die je test WORDEN UITGEVOERD voor deze gebruiker. Wees voorzichtig wat je kiest om te testen!!!</strong>';
$string['testclient'] = 'Webservice testclient';
$string['testclientdescription'] = '* De webservice testclient <strong>voert de functies ECHT uit</strong>. Test geen functies die je niet ken.<br />* Alle bestaande webservice functies zijn nog niet geïmplementeerd in de testclient<br />* Om te controleren of een gebruiker geen toegang heeft tot sommige functies, kun je sommige functies testen die je niet toestaat. <br />* Om duidelijlke foutmeldingen te krijgen kun debugging inschakelen naar {$a->mode} in {$a->atag}<br />* Ga naar {$a->amfatag}.';
$string['testwithtestclient'] = 'Test de service';
$string['testwithtestclientdescription'] = 'Simuleer externe toegang tot de service met de webservice testclient. Gebruik een ingeschakeld protocol met tokenauthenticatie.<strong>Waarschuwing: de functies die je test ZULLEN UITGEVOERD WORDEN. Wees voorzichtig met wat je kiest om te testen</strong>';
$string['token'] = 'Token';
$string['tokenauthlog'] = 'Tokenauthenticatie';
$string['tokencreatedbyadmin'] = 'Kan enkel door de beheerder gereset worden (*)';
$string['tokencreator'] = 'Aanmaker';
$string['unknownoptionkey'] = 'Onbekende optiesleutel ({$a})';
$string['unnamedstringparam'] = 'Een stringparameter heeft geen naam.';
$string['updateusersettings'] = 'Update';
$string['uploadfiles'] = 'Kan bestanden uploaden';
$string['uploadfiles_help'] = 'Indien ingeschakeld kan een gebruiker bestanden uplaoden met zijn beveiligingssleutels naar de eigen privé bestanden zone of naar de klad zone. Gebruikersquota gelden.';
$string['userasclients'] = 'Gebruikers als clients met token';
$string['userasclientsdescription'] = 'Volgende stappen helpen je met het configureren van Moodle webservices voor gebruikers als clients. Deze stappen helpen je ook om de aangeraden token authenticatiemethode  (met veiligheidssleutesl)  te configureren. Als je webservices zo gebruikt, dan zal de gebruiker zijn teken genereren van zijn Mijn profielpagina.';
$string['usermissingcaps'] = 'Ontbrekende mogelijkheden: {$a}';
$string['usernameorid'] = 'Gebruikersnaam / gebruikersID';
$string['usernameorid_help'] = 'Geef een gebruikersnaam of gebruikersID';
$string['usernameoridnousererror'] = 'Er werden geen gebruikers gevonden met deze gebruikersnaam / gebruikersID';
$string['usernameoridoccurenceerror'] = 'Meer dan één gebruiker is gevonden met deze gebruikersnaam. Geef de gebruikersID';
$string['usernotallowed'] = 'De gebruiker heeft geen rechten voor deze service. Eerst moet je deze gebruiker recht geven op de {$a} toegelaten gebruikers beheer pagina';
$string['usersettingssaved'] = 'Gebruikersingstellingen bewaard';
$string['validuntil'] = 'Geldig tot';
$string['validuntil_help'] = 'Indien ingesteld zal de service voor deze gebruiker uitgeschakeld worden na deze datum';
$string['webservice'] = 'Webservice';
$string['webservices'] = 'Webservices';
$string['webservicesoverview'] = 'Overzicht';
$string['webservicetokens'] = 'Webservice tokens';
$string['wrongusernamepassword'] = 'Verkeerde gebruikersnaam of wachtwoord';
$string['wsaccessuserdeleted'] = 'Geweigerde webservicetoegang voor verwijderde gebruikersnaam: {$a}';
$string['wsaccessuserexpired'] = 'Geweigerde webservicetoegang voor gebruikersnaam met vervallen wachtwoord: {$a}';
$string['wsaccessusernologin'] = 'Geweigerde webservicetoegang voor geen loging authenticatie gebruikersnaam: {$a}';
$string['wsaccessusersuspended'] = 'Geweigerde webservicetoegang voor geschorste gebruikersnaam: {$a}';
$string['wsaccessuserunconfirmed'] = 'Geweigerde webservicetoegang voor onbevestigde gebruikersnaam: {$a}';
$string['wsclientdoc'] = 'Moodle webservice documentatie';
$string['wsdocapi'] = 'API-documentatie';
$string['wsdocumentation'] = 'Webservice documentatie';
$string['wsdocumentationdisable'] = 'Webservice documentatie is uitgeschakeld';
$string['wsdocumentationintro'] = 'Om een client aan te maken raden we aan om {$a->doclink} te lezen.';
$string['wsdocumentationlogin'] = 'of geef je webservice gebruikersnaam en wachtwoord:';
$string['wspassword'] = 'Webservice wachtwoord';
$string['wsusername'] = 'Webservice gebruikersnaam';
