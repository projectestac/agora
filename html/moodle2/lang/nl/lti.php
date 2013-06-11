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
 * Strings for component 'lti', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   lti
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accept'] = 'Aanvaard';
$string['accept_grades'] = 'Aanvaard cijfers van de tool';
$string['accept_grades_admin'] = 'Aanvaard cijfers van de tool';
$string['accept_grades_admin_help'] = 'Specifieer of de tool provider cijfers die geassocieerd zijn met instanties van deze tool mag toevoegen, updaten, lezen, en verwijderen.

Sommige tool providers ondersteunen de mogelijkheid om cijfers terug te rapporteren aan Moodle op basis van acties ondernomen binnen de tool, waardoor een meer integrale ervaring wordt gecreëerd.';
$string['accept_grades_help'] = 'Specifieer of de tool provider cijfers die geassocieerd zijn met enkel deze externe instantie van de tool mag toevoegen, updaten, lezen, en verwijderen.

Sommige tool providers ondersteunen de mogelijkheid om cijfers terug te rapporteren aan Moodle op basis van acties ondernomen binnen de tool, waardoor een meer integrale ervaring wordt gecreëerd.';
$string['action'] = 'Actie';
$string['active'] = 'Actief';
$string['activity'] = 'Activiteit';
$string['addnewapp'] = 'Schakel de externe applicatie in';
$string['addserver'] = 'Voeg een vertrouwde server toe';
$string['addtype'] = 'Voeg externe tool configuratie toe';
$string['allow'] = 'Sta toe';
$string['allowinstructorcustom'] = 'Sta leraren toe om eigen parameters toe te voegen';
$string['allowsetting'] = 'Sta de tool toe om 8K aan instellingen in Moodle te bewaren';
$string['always'] = 'Altijd';
$string['automatic'] = 'Automatisch, gebaseerd op de Launch URL';
$string['baseurl'] = 'Basis URL';
$string['basiclti'] = 'LTI';
$string['basicltiactivities'] = 'LTI activiteiten';
$string['basiclti_base_string'] = 'LTI OAuth Base String';
$string['basiclti_endpoint'] = 'LTI Launch Endpoint';
$string['basicltifieldset'] = 'Aangepast voorbeeld veldset';
$string['basiclti_in_new_window'] = 'Je activiteit heeft een nieuw venster geopend';
$string['basicltiintro'] = 'Activiteitsbeschrijving';
$string['basicltiname'] = 'Naam activiteit';
$string['basiclti_parameters'] = 'LTI startparameters';
$string['basicltisettings'] = 'Basis Learning Tool Interoperability instellingen';
$string['cannot_delete'] = 'Je mag deze tool configuratie niet verwijderen.';
$string['cannot_edit'] = 'Je mag deze toolconfiguratie niet bewerken.';
$string['comment'] = 'Opmerking';
$string['configpassword'] = 'Standaard externe tool wachtwoord';
$string['configpreferheight'] = 'Standaard voorkeurshoogte';
$string['configpreferwidget'] = 'Schakel widget in als standaard lancering';
$string['configpreferwidth'] = 'Standaard voorkeursbreedte';
$string['configresourceurl'] = 'Standaard bron URL';
$string['configtoolurl'] = 'Standaard externe tool URL';
$string['configtypes'] = 'LTI applicaties inschakelen';
$string['courseid'] = 'Cursus ID nummer';
$string['coursemisconf'] = 'Cursus is slecht geconfigureerd';
$string['course_tool_types'] = 'Cursus tooltypes';
$string['createdon'] = 'Gemaakt op';
$string['curllibrarymissing'] = 'PHP Curl moet geïnstalleerd zijn om LTI te kunnen gebruiken';
$string['custom'] = 'Eigen parameters';
$string['custom_config'] = 'Eigen tool configuratie gebruiken';
$string['custom_help'] = 'Aangepaste parameters zijn instellingen gebruikt door de tool provider. Een aangepaste parameter kan bijvoorbeeld worden gebruikt om een specifieke bron van de provider te tonen.

Het is veilig om dit veld ongewijzigd te laten tenzij op vraag van de tool provider.';
$string['custominstr'] = 'Aangepaste parameters';
$string['debuglaunch'] = 'Debug optie';
$string['debuglaunchoff'] = 'Normale lancering';
$string['debuglaunchon'] = 'Debug lancering';
$string['default'] = 'Standaard';
$string['default_launch_container'] = 'Standaard lanceringscontainer';
$string['default_launch_container_help'] = 'De lanceringscontainer beïnvloedt de opmaak van de tool wanneer die wordt gelanceerd vanuit de cursus. Sommige lanceringscontainers gunnen meer ruimte op het scherm aan de tool, andere geven een meer geïntegreerd beeld binnen de Moodle omgeving.

* **Standaard** - Gebruik de lanceringscontainer die wordt gespecifieerd in de tool configuratie.
* **Embed** - De tool wordt getoond binnen het bestaande Moodle venster, op een gelijkaardige manier als de meeste andere activiteitstypes.
* **Embed, zonder blokken** - De tool wordt getoond binnen het bestaande Moodle venster, met enkel de navigatie bediening bovenaan de pagina.
* **Nieuw venster** - De tool opent in een nieuw venster, en neemt de volledige ruimte in. Afhankelijk van de browser zal het openen in een nieuwe tab of in een pop-upvenster. De kans bestaat dat browsers het openen van een nieuw venster zullen verhinderen.';
$string['delegate'] = 'Delegeer aan leraar';
$string['delete'] = 'Verwijder';
$string['delete_confirmation'] = 'Ben je zeker dat je deze externe tool configuratie wil verwijderen?';
$string['deletetype'] = 'Verwijder de externe tool configuratie';
$string['display_description'] = 'Toon de activiteitsbeschrijving bij lancering';
$string['display_description_help'] = 'Indien geselecteerd, dan zal de activiteitsbeschrijving (hierboven vermeld) getoond worden boven de hoofdinhoud van de tool provider.

De beschrijving kan worden gebruikt om aanvullende instructies te geven aan diegenen die de tool lanceren, maar dit is geen vereiste.

De beschrijving wordt nooit getoond wanneer de lanceringscontainer van de tool opent in een nieuw venster.';
$string['display_name'] = 'Toon de activiteitsnaam bij lancering';
$string['display_name_help'] = 'Indien geselecteerd, dan zal de activiteitsnaam (hierboven vermeld) getoond worden boven de hoofdinhoud van de tool provider.

Het is mogelijk dat ook de tool provider  de titel toont. Deze optie laat toe te vermijden dat de activiteitstitel twee keer wordt getoond

De titel wordt nooit getoond wanneer de lanceringscontainer van de tool opent in een nieuw venster.';
$string['domain_mismatch'] = 'Het domein van de URL van lancering komt niet overeen met de tool configuratie.';
$string['donot'] = 'Verstuur dit niet';
$string['donotaccept'] = 'Aanvaard dit niet';
$string['donotallow'] = 'Sta dit niet toe';
$string['edittype'] = 'Bewerk de externe tool configuratie';
$string['embed'] = 'Embed';
$string['embed_no_blocks'] = 'Embed, zonder blokken';
$string['enableemailnotification'] = 'Verstuur e-mails met meldingen';
$string['enableemailnotification_help'] = 'Indien ingeschakeld, zullen de studenten een e-mailmelding ontvangen wanneer hun tool opdrachten beoordeeld werden.';
$string['errormisconfig'] = 'Fout geconfigureerde tool. Vraag uw Moodle beheerder om de configuratie van de tool te wijzigen.';
$string['extensions'] = 'LTI extensie services';
$string['external_tool_type'] = 'Externe tool type';
$string['external_tool_type_help'] = 'De configuratie van een tool heeft als hoofddoel het opzetten van een veilig communicatiekanaal tussen Moodle en de tool provider. Het biedt ook de mogelijkheid tot het instellen van standaardconfiguraties of van aanvullende services die door de tool worden geleverd.

* **Automatisch, gebaseerd op de URL van lancering** - Dit is in bijna alle gevallen de meest aangewezen instelling. Moodle zal de meest geschikte tool configuratie selecteren, gebaseerd op de URL van lancering. Tools die geconfigureerd werden zowel door een administrator als binnen deze cursus zullen worden gebruikt. Wanneer de URL van lancering gespecifieerd is, zal Moodle feedback geven of het deze herkent ja of nee. Indien Moodle de URL van lancering niet herkent, zul je de details van de tool configuratie manueel moeten invoeren.
* **Een specifiek tool type** - Door te kiezen voor een specifiek tooltype, dwing je Moodle om deze tool configuratie te gebruiken bij communicatie met de externe tool provider. Indien de URL van lancering niet lijkt te horen bij de tool provider, zal een waarschuwing verschijnen. In sommige gevallen is het niet nodig om een URL van lancering in te geven wanneer je een specifiek tool type opgeeft (wanneer de lancering zich niet richt tot een bepaalde bron binnen de tool provider).

* **Aangepaste configuratie** - Om de aangepaste tool configuratie enkel in deze instantie in te stellen, open Geadvanceerde opties, en geef de consumer key en de shared secret zelf in; misschien ontvang je deze na navraag bij de tool provider.
Niet alle tools vereisen een consumer key en een shared secret; in dit geval kun je de velden open laten.

###Bewerken van tool type

Er zijn drie icoontjes beschikbaar in de externe tool type dropdown lijst:

* **Toevoegen** - Maak een tool configuratie aan op cursus niveau. Alle externe tool instanties in deze cursus kunnen de tool configuratie gebruiken.
* **Bewerken** - Selecteer een tool type op cursus niveau in de dropdown, en klik dan op dit icoontje. De details van de tool configuratie kunnen worden bewerkt.
* **Verwijderen** - Verwijder het geselecteerde tool type op cursus niveau.';
$string['external_tool_types'] = 'Externe tool types';
$string['failedtoconnect'] = 'Moodle was niet in staat om te communiceren met het "{$a}" systeem';
$string['filter_basiclti_configlink'] = 'Configureer je favoriete sites en hun wachtwoorden';
$string['filter_basiclti_password'] = 'Wachtwoord is verplicht';
$string['filterconfig'] = 'LTI administratie';
$string['filtername'] = 'LTI';
$string['fixexistingconf'] = 'Gebruik een bestaande configuratie voor een fout geconfigureerde instantie';
$string['fixnew'] = 'Nieuwe configuratie';
$string['fixnewconf'] = 'Definieer een nieuwe configuratie voor de fout geconfigureerde instantie';
$string['fixold'] = 'Gebruik bestaande';
$string['forced_help'] = 'Deze instelling werd opgelegd in een tool configuratie op niveau van de cursus of de site. Je kunt dit niet veranderen vanuit deze interface.';
$string['force_ssl'] = 'Dwing SSL af';
$string['force_ssl_help'] = 'Door de keuze voor deze optie wordt  het gebruik van SSL verplicht bij alle lanceringen naar deze tool provider.

Bijkomend zullen ook alle web service verzoeken van de tool provider gebruik maken van SSL.

Indien je voor deze optie kiest, ga dan eerst na of de Moodle site en de tool provider SSL ondersteunen.';
$string['global_tool_types'] = 'Tool types op server niveau';
$string['grading'] = 'Cijferlijst routing';
$string['icon_url'] = 'URL icoontje';
$string['icon_url_help'] = 'Deze icoon-URL maakt het mogelijk om het icoontje dat deze activiteit aanduidt in de cursuslijst te wijzigen. In plaats van gebruik te maken van het standaard LTI icoon, kan een icoontje worden gespecifieerd dat het type activiteit aanduidt.';
$string['id'] = 'id';
$string['invalidid'] = 'LTI ID was foutief';
$string['launch_in_moodle'] = 'Tool voor lancering in Moodle';
$string['launchinpopup'] = 'Container voor lancering';
$string['launch_in_popup'] = 'Tool voor lancering in een pop-up';
$string['launchinpopup_help'] = 'De container voor lancering beïnvloedt de wijze waarop de tool wordt getoond wanneer de lancering vanuit de cursus gebeurt. Sommige containers voor lancering bieden meer ruimte aan de tool op het scherm, andere zorgen voor een meer geïntegreerd geheel in de Moodle omgeving.

* **Standaard** - Gebruik de container voor lancering die gespecificeerd staat in de tool configuratie.
* **Embed** - De tool wordt getoond binnen het open Moodle venster, zoals bij de meeste andere activiteitstypes gebeurt.
* **Embed, zonder blokken** - De tool wordt getoond binnen het open Moodle venster, met enkel de navigatie bediening bovenaan de pagina.
* **Nieuw venster** - De tool opent in een nieuw venster, waar het alle beschikbare ruimte inneemt.
Afhankelijk van de browser zal het openen in een nieuwe tab of in een pop-up venster. Het is mogelijk dat de browser het openen van een nieuw venster verhindert.';
$string['launchoptions'] = 'Opties voor lancering';
$string['launch_url'] = 'URL voor lancering';
$string['launch_url_help'] = 'De URL van lancering geeft het webadres aan van de externe tool, en kan ook bijkomende informatie bevatten, zoals de te tonen bron. Als je niet zeker bent welke URL van lancering je moet invoeren, contacteer dan de tool provider voor meer informatie.

Indien je een specifiek tool type hebt gekozen, kan het onnodig zijn om een URL van lancering in te geven. Dit is meestal het geval wanneer de tool link enkel wordt gebruikt voor lancering in het systeem van de tool provider, en niet gaat naar een specifieke bron.';
$string['lti'] = 'LTI';
$string['lti:addcoursetool'] = 'Waardering LTI activiteiten';
$string['lti:addinstance'] = 'Voeg een nieuwe LTI-activiteit toe';
$string['lti_administration'] = 'LTI administratie';
$string['lti_errormsg'] = 'De tool zond de volgende foutmelding terug: "{$a}"';
$string['lti:grade'] = 'Waardering LTI activiteiten';
$string['lti_launch_error'] = 'Er is een fout opgetreden bij de lancering van de externe tool:';
$string['lti_launch_error_tool_request'] = 'Indien je een verzoek wil richten aan een beheerder om de tool configuratie te vervolledigen, klik <a href="{$a->admin_request_url}" target="_top">hier</a>.';
$string['lti_launch_error_unsigned_help'] = '<p>Deze fout is waarschijnlijk het resultaat van een ontbrekende consumentensleutel en gedeeld geheim voor de tool provider.
</p><p>
Indien je een consumentensleutel en een gedeeld geheim hebt, kun je deze invoeren wanneer je de externe tool instantie bewerkt (zorg ervoor dat de geadvanceerde opties zichtbaar zijn).<br />
Een andere mogelijkheid is om <a href="{$a->course_tool_editor}">hier</a> een tool provider configuratie op cursus niveau aan te maken.
</p>';
$string['lti:manage'] = 'Bewerk LTI activiteiten';
$string['lti:requesttooladd'] = 'Dien bij de beheerder een tool in voor configuratie.';
$string['lti_tool_request_added'] = 'Het verzoek tot tool configuratie werd succesvol ingediend. Het is misschien nodig om een beheerder  te contacteren om de toolconfiguratie te voltooien.';
$string['lti_tool_request_existing'] = 'Een tool configuratie voor het tool domein werd al eerder ingediend.';
$string['lti:view'] = 'Bekijk LTI activiteiten';
$string['main_admin'] = 'Algemene hulp';
$string['main_admin_help'] = 'Externe tools laten Moodle gebruikers toe om probleemloos om te gaan met leermiddelen die gehost worden op afstand.  Via een speciaal lanceringsprotocol zal de externe tool toegang hebben tot bepaalde algemene informatie over de gebruiker die de tool lanceert. Bijvoorbeeld de naam van de instelling, cursus ID, gebruikers ID, en andere informatie zoals de naam of het e-mailadres van de gebruiker.

De tool types op deze pagina worden in drie categorieën onderverdeeld:

* **Actief** - Deze tool providers werden goedgekeurd en ingesteld door de beheerder. Ze kunnen gebruikt worden vanuit elke cursus in deze Moodle instantie.
Indien een consumentensleutel en gedeeld geheim worden ingevoerd, ontstaat er een vertrouwensrelatie tussen deze Moodle instantie en de externe tool, en wordt er een veilig communicatiekanaal voorzien.
* **In behandeling** - Deze tool providers werden aangebracht via een package invoer, maar werden nog niet geconfigureerd door de beheerder.
Leraars kunnen toch gebruik maken van de tools van deze providers indien ze in het bezit zijn van een consumentensleuten en gedeeld geheim, of indien deze niet worden vereist.
* **Afgekeurd** - Deze zijn gevlagd als tool providers die de beheerder niet wenst beschikbaar te maken voor de volledige Moodle instantie. Leraars kunnen toch gebruik maken van de tools van deze providers indien ze in het bezit zijn van een consumentensleuten en gedeeld geheim, of indien deze niet worden vereist.';
$string['miscellaneous'] = 'Divers';
$string['misconfiguredtools'] = 'Er werden fout geconfigureerde tool instanties aangetroffen';
$string['missingparameterserror'] = 'Deze pagina is fout geconfigureerd: "{$a}"';
$string['module_class_type'] = 'Moodle module type';
$string['modulename'] = 'Externe tool';
$string['modulename_help'] = 'De externe tool-activiteitsmodule maakt het voor leerlingen mogelijk om te interageren met bronnen en activiteiten op andere websites. Een externe tool kan bijvoorbeeld toegang geven tot een nieuw activiteitstype of leermateriaal van een uitgever.

Om een externe toolactiviteit te maken, is een tool provider nodig die LTI (Learning Tools Interoperability) ondersteunt. Een leraar kan een externe tool-activiteit maken of er één gebruiken die door de site beheerder gemaakt is.

Externe tool-activiteiten verschillen van URL-bronnen op verschillende manieren:

*Externe tools zijn contextbewust - ze hebben toegang tot informatie over wie de tool gestart heeft, zoals instituut, cursus en naam
* Externe tools ondersteunen lezen, aanpassen en verwijderen van cijfers die aan de activiteit gelinkt zijn
* Externe tool configuraties maken een vertrouwensrelatie tussen jouw site en de tool provider, waardoor een beveiligde communicatie tussen de twee mogelijk is';
$string['modulenameplural'] = 'Basis LTIs';
$string['modulenamepluralformatted'] = 'LTI instanties';
$string['never'] = 'Nooit';
$string['new_window'] = 'Nieuw venster';
$string['noattempts'] = 'Er werden geen pogingen ondernomen op deze tool instantie.';
$string['no_lti_configured'] = 'Er zijn geen actieve externe tools geconfigureerd.';
$string['no_lti_pending'] = 'Er zijn geen externe tools in behandeling.';
$string['no_lti_rejected'] = 'Er zijn geen externe tools verworpen.';
$string['noltis'] = 'Er zijn geen LTI instanties.';
$string['noservers'] = 'Er werden geen servers aangetroffen.';
$string['notypes'] = 'Er zijn op dit ogenblik geen LTI tools ingesteld in Moodle. Klik op de installatie link hierboven om er toe te voegen.';
$string['noviewusers'] = 'Er werden geen gebruikers aangetroffen die toestemming hebben om deze tool te gebruiken.';
$string['optionalsettings'] = 'Optionele instellingen';
$string['organization'] = 'Details van de organisatie';
$string['organizationdescr'] = 'Beschrijving van de organisatie';
$string['organizationid'] = 'ID van de organisatie';
$string['organizationid_help'] = 'Een unieke identificatie voor deze Moodle instantie. Gewoonlijk wordt de DNS naam van de organisatie gebruikt.

Indien je dit veld leeg laat, zal  de hostnaam van de Moodle site worden gebruikt als standaardwaarde.';
$string['organizationurl'] = 'Organisatie URL';
$string['organizationurl_help'] = 'De basis URL van deze Moodle instantie.

Indien je dit veld leeg laat, zal een standaardwaarde worden gebruikt gebaseerd op de configuratie van de site.';
$string['pagesize'] = 'Inzendingen getoond per pagina';
$string['password'] = 'Gedeeld geheim';
$string['password_admin'] = 'Gedeeld geheim';
$string['password_admin_help'] = 'Het gedeeld geheim kan beschouwd worden als een paswoord dat de toegang tot de tool authenticeert. Het moet samen met de consumentensleutel door de tool provider worden verstrekt.

Voor tools die geen beveiligde communicatie met Moodle vereisen en die geen bijkomende diensten verstrekken (zoals rapportering van cijfers) heb je vermoedelijk geen gedeeld geheim nodig.';
$string['password_help'] = 'Voor vooraf geconfigureerde tools is het niet nodig om hier een gedeeld geheim in te voeren, want dit zal al zijn voorzien als onderdeel van het configuratie proces.

Dit veld moet worden ingevuld indien een link wordt gemaakt met een tool provider die nog niet geconfigureerd is. Indien de tool provider meer dan één keer zal gebruikt worden in deze cursus, dan is het een goed idee om een tool configuratie op cursus niveau toe te voegen.

Het gedeeld geheim kan beschouwd worden als een paswoord dat de toegang tot de tool authenticeert. Het moet samen met de consumentensleutel door de tool provider worden verstrekt.

Voor tools die geen beveiligde communicatie met Moodle vereisen en die geen bijkomende diensten verstrekken (zoals rapportering van cijfers) heb je vermoedelijk geen gedeeld geheim nodig.';
$string['pending'] = 'In behandeling';
$string['pluginadministration'] = 'LTI-beheer';
$string['pluginname'] = 'LTI';
$string['preferheight'] = 'Voorkeurhoogte';
$string['preferwidget'] = 'Verkies lancering van widget';
$string['preferwidth'] = 'Voorkeurbreedte';
$string['press_to_submit'] = 'Druk om deze activiteit te starten';
$string['privacy'] = 'Privacy';
$string['quickgrade'] = 'Snel beoordelen toestaan';
$string['quickgrade_help'] = 'Indien ingeschakeld kunnen meerdere tools beoordeeld worden op één pagina. Voeg cijfers en commentaren toe en klik dan op de "Bewaar al mijn feedback"-knop om alle wijzigingen voor die pagina te bewaren.';
$string['redirect'] = 'Je zult binnen enkele seconden doorverwezen worden. Indien niet, klik dan op de knop.';
$string['reject'] = 'Verwerp';
$string['rejected'] = 'Verworpen';
$string['resource'] = 'Bron';
$string['resourcekey'] = 'Consumentensleutel';
$string['resourcekey_admin'] = 'Consumentensleutel';
$string['resourcekey_admin_help'] = 'De consumentensleutel kan beschouwd worden als een gebruikersnaam die de toegang tot een tool authenticeert. Een tool provider kan deze gebruiken om de Moodle site van waaruit de gebruikers de tool lanceren, uniek te identificeren.

De consumentensleutel moet door de tool provider worden verstrekt. De methode om een consumentensleutel te bekomen verschilt naargelang de tool provider. Het kan een automatisch proces zijn, of het kan een dialoog met de tool provider vereisen.

Voor tools die geen beveiligde communicatie met Moodle vereisen en die geen bijkomende diensten verstrekken (zoals rapportering van cijfers) heb je waarschijnlijk geen consumentensleutel nodig.';
$string['resourcekey_help'] = 'Voor vooraf geconfigureerde tools is het niet nodig om hier een consumentensleutel in te voeren, want deze zal al zijn voorzien als onderdeel van het configuratie proces.

Dit veld moet worden ingevuld indien een link wordt gemaakt met een tool provider die nog niet geconfigureerd is. Indien de tool provider meer dan één keer zal gebruikt worden in deze cursus, dan is het een goed idee om een tool configuratie op cursus niveau toe te voegen.

De consumentensleutel kan beschouwd worden als een gebruikersnaam die de toegang tot een tool authenticeert. Een tool provider kan deze gebruiken om de Moodle site van waaruit de gebruikers de tool lanceren, uniek te identificeren.

De consumentensleutel moet door de tool provider worden verstrekt. De methode om een consumentensleutel te bekomen verschilt naargelang de tool provider. Het kan een automatisch proces zijn, of het kan een dialoog met de tool provider vereisen.

Voor tools die geen beveiligde communicatie met Moodle vereisen en die geen bijkomende diensten verstrekken (zoals rapportering van cijfers) heb je waarschijnlijk geen consumentensleutel nodig.';
$string['resourceurl'] = 'Bron-URL';
$string['return_to_course'] = 'Klik op <a href="{$a->link}" target="_top">hier</a> om terug naar de cursus te keren.';
$string['saveallfeedback'] = 'Bewaar al mijn feedback';
$string['secure_icon_url'] = 'URL voor beveiligd icoontje';
$string['secure_icon_url_help'] = 'Zoals het icoonURL, maar gebruikt als de gebruiker veilg Moodle bezoekt via SSL. Hoofdbedoeling hiervan is om te verhinderen dat de browser de gebruiker waarschuwt dat de onderliggende pagina via SSL opgevraagd is, maar een onbeveiligde afbeelding opvraagt.';
$string['secure_launch_url'] = 'URL voor beveiligde lancering';
$string['secure_launch_url_help'] = 'Gelijkaardig aan Lanceer URL, maar gebruikt in plaats van lanceer url als hoge beveiliging vereist is. Moodle zal de beveilgde lanceer url gebruiken in plaats van de gewone lanceer url als de site via SSL aangesproken wordt of als de tool configuratie is ingesteld om altijd SSL te gebruiken.

Je kunt ook in de lanceer url een https-adres plaatsen om lanceren via SSL te forceren. Dit veld mag dan leeg gelaten worden.';
$string['send'] = 'Verstuurd';
$string['setupoptions'] = 'Instellingsopties';
$string['share_email'] = 'Deel de e-mail van de starter met de tool';
$string['share_email_admin'] = 'Deel de e-mail van de starter met de tool';
$string['share_email_admin_help'] = 'Geef op of het e-mailadres van de gebruiker die de tool start gedeeld zal worden met de tool-provider.
De tool-provider heeft misschien het e-mailadres van de starter nodig om gebruikers met dezelfde naam te onderscheiden of om ze e-mails te sturen, gebaseerd op acties binnnen de tool.';
$string['share_email_help'] = 'Geef op of het e-mailadres van de gebruiker die de tool start gedeeld zal worden met de tool-provider.
De tool-provider heeft misschien het e-mailadres van de starter nodig om gebruikers met dezelfde naam te onderscheiden of om ze e-mails te sturen, gebaseerd op acties binnnen de tool.

Merk op dat deze instelling overschreven kan worden in de tool-configuratie';
$string['share_name'] = 'Deel de naam van de starter met de tool';
$string['share_name_admin'] = 'Deel de naam van de starter met de tool';
$string['share_name_admin_help'] = 'Geef op of de volledig naam van de gebruiker die de tool start moet gedeeld worden met de tool-provider.
De tool-provider heeft misschien de naam nodig om betekenisvolle informatie te tonen binnen de tool.';
$string['share_name_help'] = 'Geef op of de volledig naam van de gebruiker die de tool start moet gedeeld worden met de tool-provider.
De tool-provider heeft misschien de naam nodig om betekenisvolle informatie te tonen binnen de tool.

Merk op dat deze instelling overschreven kan worden in de tool-configuratie';
$string['share_roster'] = 'Geef de tool toegang tot de deelnemerslijst van de cursus';
$string['share_roster_admin'] = 'De tool heeft toegang tot de deelnemerslijst van de cursus';
$string['share_roster_admin_help'] = 'Geef op of de tool de gebruikerslijs kan opvragen van gebruikers die aangemeld zijn in cursussen vanwaar dit tooltype wordt gestart.';
$string['share_roster_help'] = 'Geef op of de tool de gebruikerslijs kan opvragen van gebruikers die aangemeld zijn in cursussen vanwaar dit tooltype wordt gestart.

Merk op dat deze instelling overschreven kan worden in de tool-configuratie';
$string['show_in_course'] = 'Toon tool-type wanneer je een toolinstantie aanmaakt';
$string['show_in_course_help'] = 'Indien geselecteerd zal de configuratie van deze tool getoond worden in het "Externe tool type" rolmenu wanneer leraars externe tools configureren in cursussen.

In de meeste gevallen moet deze optie niet geselecteerd worden. Leraren kunnen de toolconfiguratie gebruiken, gebaseerd op de start-URL die overeenkomt met een Tool basis-URL. Dit is de aangeraden methode.

De enige reden waarom deze optie zou gekozen moeten worden, is wanneer de tool gebruikt wordt voor single sign on. Bijvoorbeeld, als elke start de gebruiker alleen maar naar een landingspagina brengt in plaats van naar een specifieke bron.';
$string['size'] = 'Parameters afmetingen';
$string['submission'] = 'Inzending';
$string['toggle_debug_data'] = 'Debug-data aan-/uitschakelen';
$string['tool_config_not_found'] = 'Tool-configuratie niet gevonden voor deze URL';
$string['tool_settings'] = 'Tool instellingen';
$string['toolsetup'] = 'Configuratie externe tool';
$string['toolurl'] = 'Tool basis URL';
$string['toolurl_help'] = 'De basis-URL van de tool wordt gebruikt om de juiste tool start URL\'s te koppelen aan de juiste tool configuratie. Het voorvoegsel http(s) in de URL is optioneel.

Bijkomend wordt de basis URL gebruikt als start URL als er geen start URL is opgegeven in de configuratie van de externe tool

<table>
    <thead>
        <tr>
            <td>
                <b>Basis URL</b>
            </td>
            <td>
                <b>Gekoppeld met</b>
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                tool.com
            </td>
            <td>
                tool.com, tool.com/quizzes, tool.com/quizzes/quiz.php?id=10, www.tool.com/quizzes
            </td>
        </tr>
        <tr>
            <td>
                www.tool.com/quizzes
            </td>
            <td>
                tool.com/quizzes, tool.com/quizzes/take.php?id=10, www.tool.com/quizzes
            </td>
        </tr>
        <tr>
            <td>
                quiz.tool.com
            </td>
            <td>
                quiz.tool.com, quiz.tool.com/take.php?id=10
            </td>
        </tr>
    </tbody>
</table>

Als er twee verschillende tool-configuraties voor hetzelfde domein zijn, dan zal de best passende gebruikt worden.';
$string['typename'] = 'Tool-naam';
$string['typename_help'] = 'De tool-naam wordt gebruikt om de tool-provider te identificeren binnen Moodle. De gegeven naam zal zichtbaar zijn voor leraren wanneer ze externe tool toevoegen aan cursussen.';
$string['types'] = 'Types';
$string['update'] = 'Update';
$string['using_tool_configuration'] = 'Tool configuratie gebruiken:';
$string['validurl'] = 'Een geldige URL moet beginnen met http(s):';
$string['viewsubmissions'] = 'Bekijk inzendingen en beoordelingsscherm';
