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
 * Strings for component 'report_security', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   report_security
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_configrw_details'] = '<p>We raden aan om de rechten op het bestand config.php te wijzigen na installatie, zodat het bestand niet door de webserver gewijzigd kan worden.
Merk op dat dit de veiligheid van de server niet enorm gaat verhogen, maar het kan inbraken vertragen of beperken.</p>';
$string['check_configrw_name'] = 'config.php beschrijfbaar';
$string['check_configrw_ok'] = 'config.php kan niet gewijzigd worden door PHP-scripts';
$string['check_configrw_warning'] = 'PHP-scripts kunnen config.php wijzigen';
$string['check_cookiesecure_details'] = '<p>Als je https inschakeld, dan kun je ook best secure cookies inschakelen. Je zou ook een permanente omleiding van http naar https moeten maken.</p>';
$string['check_cookiesecure_error'] = 'Schakel secure cookies in';
$string['check_cookiesecure_name'] = 'Secure cookies';
$string['check_cookiesecure_ok'] = 'Secure cookies ingeschakeld.';
$string['check_defaultuserrole_details'] = '<p>Alle aangemelde gebruikers krijgen de mogelijkheden van de standaard rol. Zorg er voor dat er geen gevaarlijke mogelijkheden toegelaten zijn in deze rol.</p>
<p>De enige ondersteunde rol voor de standaard gebruiker is de rol: <em>geauthenticeerde gebruiker</em>. De bekijk cursusmogelijkheid kan beter niet ingeschakeld zijn.</p>';
$string['check_defaultuserrole_error'] = 'Fout gedefinieerde standaard rol "{$a}" gedetecteerd!';
$string['check_defaultuserrole_name'] = 'Standaard rol voor alle gebruikers';
$string['check_defaultuserrole_notset'] = 'Standaardrol niet ingeschakeld';
$string['check_defaultuserrole_ok'] = 'Definitie van de standaard rol voor alle gebruikers is OK';
$string['check_displayerrors_details'] = '<p>Het inschakelen van de PHP-instelling <code>display_errors</code> wordt afgeraken op productiesites omdat een foutmelding gevoelige informatie over je server kan vrijgeven.';
$string['check_displayerrors_error'] = 'De PHP-instelling voor het tonen van fouten is ingeschakeld. Je kunt dit beter uitschakelen.';
$string['check_displayerrors_name'] = 'Tonen van PHP-fouten';
$string['check_displayerrors_ok'] = 'Tonen van PHP-fouten uitgeschakeld';
$string['check_emailchangeconfirmation_details'] = '<p>Er wordt aangeraden gebruikers hun e-mailadres te laten bevestigen wanneer ze dat wijzigen in hun profiel. Indien uitgeschakeld kunnen spammers proberen de server te misbruiken om spam te versturen.</p><p>Het e-mailveld kan ook geblokkeerd worden voor authenticatieplugins, deze mogelijkheid is hier niet overwogen.</p>';
$string['check_emailchangeconfirmation_error'] = 'Gebruikers kunnen gelijk welk e-mailadres ingeven';
$string['check_emailchangeconfirmation_info'] = 'Gebruikers kunnen alleen e-mailadressen gebruiken van toegelaten domeinen.';
$string['check_emailchangeconfirmation_name'] = 'Wijzig e-mailadres bevestiging';
$string['check_emailchangeconfirmation_ok'] = 'Bevestiging van de wijziging van het e-mailadres in het gebruikersprofiel.';
$string['check_embed_details'] = '<p>Het onbeperkt embedden van objecten is erg gevaarlijk - elke geregistreerde gebruiker kan een XSS-aanval starten tegen andere servergebruikers. Deze instelling moet uitgeschakeld worden op productieservers.</p>';
$string['check_embed_error'] = 'Onbeperkt embedden van objecten ingeschakeld - dit is erg gevaarlijk voor de meeste servers.';
$string['check_embed_name'] = 'EMBED en OBJECT toelaten';
$string['check_embed_ok'] = 'Onbeperkt embedden van objecten is niet toegelaten';
$string['check_frontpagerole_details'] = '<p>Alle geregistreerde gebruikers krijgen de standaardrol voor de startpagina voor activiteiten op die pagina.</p>
<p>Er wordt aangeraden een speciale rol hiervoor te maken en de standaard meegeleverde rollen niet te gebruiken.</p>';
$string['check_frontpagerole_error'] = 'Fout gedefinieerde starpaginarol "{$a}" gedetecteerd!';
$string['check_frontpagerole_name'] = 'Startpaginarol';
$string['check_frontpagerole_notset'] = 'Startpaginarol niet ingeschakeld';
$string['check_frontpagerole_ok'] = 'Startpaginarol roldefinitie OK';
$string['check_globals_details'] = '<p>Register globals wordt beschouwd als een heel gevaarlijke PHP-instelling.</p>
<p><code>register_globals=off</code> moet ingesteld worden in de PHP-configuratie. Deze instelling kan aangepast worden in <code>php.ini</code>, Apache/IIS-configuratie of een <code>.htaccess</code>-bestand.</p>';
$string['check_globals_error'] = 'Register globals MOETEN uitgeschakeld zijn. Herstel de PHP-instellingen van je server onmiddellijk!';
$string['check_globals_name'] = 'Register globals';
$string['check_globals_ok'] = 'Register globals zijn uitgeschakeld.';
$string['check_google_details'] = '<p>De instelling Open voor Google maakt het voor zoekrobots mogelijk cursussen te doorzoeken met de gastrol. Het is nutteloos deze instelling in te schakelen als aanmelden als gast niet toegelaten is.</p>';
$string['check_google_error'] = 'Gast-toegang voor zoekrobots toegelaten terwijl gast-toegang is uitgeschakeld.';
$string['check_google_info'] = 'Zoekrobots mogen binnen als gasten';
$string['check_google_name'] = 'Open voor Google';
$string['check_google_ok'] = 'Gast-toegang voor zoekrobots uitgeschakeld';
$string['check_guestrole_details'] = '<p>De gastrol wordt gebruikt voor gasten, niet aangemelde gebruikers en tijdelijke gasttoegang voor cursussen. Zorg er voor dat geen gevaarlijke mogelijkheden toegelaten zijn voor deze rol.</p>
<p>De enige ondersteunde rol voor dit type gebruiker is <em>Gast</em>.</p>';
$string['check_guestrole_error'] = 'Fout geconfigureerde gastrol "{$a}" gedetecteerd!';
$string['check_guestrole_name'] = 'Gast rol';
$string['check_guestrole_notset'] = 'Gast rol niet ingeschakeld';
$string['check_guestrole_ok'] = 'Gastrol definitie OK';
$string['check_mediafilterswf_details'] = '<p>Automatisch embedden van swf is heel gevaarlijk - elke geregistreerde gebruiker kan een XSS-aanval starten tegen andere servergebruikers. Schakel dit uit op productieservers.</p>';
$string['check_mediafilterswf_error'] = 'Flash mediafilter is ingeschakeld - dit is erg gevaarlijk voor de meeste servers';
$string['check_mediafilterswf_name'] = '.swf media filter ingeschakeld';
$string['check_mediafilterswf_ok'] = 'Flash mediafilter is niet ingeschakeld';
$string['check_noauth_details'] = '<p>De <em>Geen authenticatie</em>-plugin is niet bedoeld voor gebruik op productiesites. Schakel het uit tenzij dit een test-site voor ontwikkeling is.';
$string['check_noauth_error'] = 'De Geen authenticatie-plugin mag niet gebruikt worden op productie-sites.';
$string['check_noauth_name'] = 'Geen authenticatie';
$string['check_noauth_ok'] = 'Geen authenticatie-plugin is uitgeschakeld';
$string['check_openprofiles_details'] = '<p>Open gebruikersprofielen kunnen door spammers misbruikt worden. Aangeraden wordt om ofwel <code>Aanmelden verplicht voor gebruikersprofielen</code> ofwel <code>Aanmelden verplicht</code> in te schakelen.</p>';
$string['check_openprofiles_error'] = 'Iedereen kan gebruikersprofielen zien zonder aan te melden';
$string['check_openprofiles_name'] = 'Open gebruikersprofielen';
$string['check_openprofiles_ok'] = 'Aanmelden is vereist om gebruikersprofielen te kunnen zien';
$string['check_passwordpolicy_details'] = '<p>Aangeraden wordt om een wachtwoordsbeleid te voeren, omdat het raden van wachtwoorden dikwijls de gemakkelijkste manier is om onrechtmatig toegang te krijgen. Maak de vereisten echter niet te streng, omdat het resultaat daarvan kan zijn dat gebruikers hun wachtwoorden niet meer kunnen onthouden en ze vergeten of opschrijven.</p>';
$string['check_passwordpolicy_error'] = 'Wachtwoordbeleid niet ingesteld';
$string['check_passwordpolicy_name'] = 'Wachtwoordbeleid';
$string['check_passwordpolicy_ok'] = 'Wachtwoordbeleid ingeschakeld';
$string['check_passwordsaltmain_details'] = '<p>SHet instellen van een password salt vermindert het risico op het gestolen worden van wachtwoorden.</p>
<p>Om een password salt in te stellen, voeg je volgende lijn toe aan je  config.php file:</p>
<code>$CFG->passwordsaltmain = \'een willekeurig hele lange string met heel veel tekens\';</code>
<p>De willekeurige string moet een mengeling zijn van letters, cijfers en andere tekens en minstens 40 tekens wordt aangeraden.</p>
<p>Lees de <a href="{$a}" target="_blank">password salting documentatie</a> als je het password salt wil wijzigen. Eens ingesteld mag je je  password salt NIET verwijderen want anders kun je niet meer inloggen in je site!</p>';
$string['check_passwordsaltmain_name'] = 'Password salt';
$string['check_passwordsaltmain_ok'] = 'Password salt is goed';
$string['check_passwordsaltmain_warning'] = 'Geen password salt ingesteld';
$string['check_passwordsaltmain_weak'] = 'Password salt is zwak';
$string['check_riskadmin_detailsok'] = '<p>Controleer aub volgende lijst beheerders:</p>{$a}';
$string['check_riskadmin_detailswarning'] = '<p>Controleer onderstaande lijst beheerders::</p>{$a->admins}
<p>Aangeraden wordt om de beheerdersrol enkel toe te wijzen in de systeemcontext. Volgende gebruikers hebben een niet-ondersteunde beheerdersrol:</p>{$a->unsupported}';
$string['check_riskadmin_name'] = 'Beheerders';
$string['check_riskadmin_ok'] = '{$a} serverbeheerders gevonden';
$string['check_riskadmin_unassign'] = '<a href="{$a->url}">{$a->fullname} ({$a->email}) roltoewijzing nakijken</a>';
$string['check_riskadmin_warning'] = '{$a->admincount} beheerdersaccounts gevonden en {$a->unsupcount} niet-ondersteunde beheerdersrollen toegewezen.';
$string['check_riskbackup_detailsok'] = 'Er is geen enkele rol die toelaat om gebruikersgegevens in back-ups te zetten. Merk op dat beheerders met de "doe alles"-mogelijkheid dit wel nog kunnen.';
$string['check_riskbackup_details_overriddenroles'] = '<p>Dit instellen geeft gebruikers het recht om gebruikersgegevens in back-ups te zetten. Laat dit alleen toe als het echt nodig is.</p> {$a}';
$string['check_riskbackup_details_systemroles'] = '<p>Volgende systeemrollen kunnen gebruikersgegevens in de back-ups zetten. Laat dit alleen toe als het echt nodig is.</p> {$a}';
$string['check_riskbackup_details_users'] = '<b>Door de bovenstaande roloverschrijvingen kunnen volgende gebruikers back-ups maken met daaring privégegevens van alle gebruikers in hun cursus. Zorg ervoor dat ze te vertrouwen zijn en beschermd door sterke wachtwoorden:<p> {$a}';
$string['check_riskbackup_editoverride'] = '<a href="{$a->url}">{$a->name} in {$a->contextname}</a>';
$string['check_riskbackup_editrole'] = '<a href="{$a->url}">{$a->name}</a>';
$string['check_riskbackup_name'] = 'Back-up van gebruikersgegevens';
$string['check_riskbackup_ok'] = 'Er zijn geen rollen die expliciet het back-uppen van gebruikersgegevens toelaten';
$string['check_riskbackup_unassign'] = '<a href="{$a->url}">{$a->fullname} ({$a->email}) in {$a->contextname}</a>';
$string['check_riskbackup_warning'] = '{$a->rolecount} rollen gevonden, {$a->overridecount} overschijvingen en  {$a->usercount} gebruikers met de mogelijkheid gebruikersgegevens te back-uppen.';
$string['check_riskxss_details'] = '<p>RISK_XSS wijst alle gevaarlijk mogelijkheden aan die alleen vertrouwde gebruikers zouden mogen krijgen.</p>
<p>Controleer volgende gebruikerslijst en zorg er voor dat je ze volledig kunt vertrouwen op deze server.</p>{$a}';
$string['check_riskxss_name'] = 'XSS vertrouwde gebruikers';
$string['check_riskxss_warning'] = 'RISK_XSS vond {$a} vertrouwde gebruikers.';
$string['check_unsecuredataroot_details'] = '<p>De dataroot-map mag niet toegankelijk zijn vanaf het internet. De beste manier om er voor te zorgen dat deze map niet toegankelijk is, is ze aan te maken buiten de publieke web-map.</p>
<p>Als je de map verplaatst, dan moet je de <code>$CFG->dataroot</code>-instelling in <code>config.php</code> ook aanpassen.</p>';
$string['check_unsecuredataroot_error'] = 'Je dataroot-map <code>{$a}</code> staat op de verkeerde plaats en is toegankelijk vanaf het internet!';
$string['check_unsecuredataroot_name'] = 'Onveilige dataroot';
$string['check_unsecuredataroot_ok'] = 'De dataroot-map mag niet toegankelijk zijn vanaf het internet.';
$string['check_unsecuredataroot_warning'] = 'Je dataroot-map <code>{$a}</code> staat op de verkeerde plaats en kan toegankelijk zijn vanaf het internet!';
$string['configuration'] = 'Configuratie';
$string['description'] = 'Beschrijving';
$string['details'] = 'Details';
$string['issue'] = 'Probleem';
$string['pluginname'] = 'Veiligheidsoverzicht';
$string['security:view'] = 'Bekijk veiligheidsrapport';
$string['status'] = 'Status';
$string['statuscritical'] = 'Kritiek';
$string['statusinfo'] = 'Informatie';
$string['statusok'] = 'OK';
$string['statusserious'] = 'Ernstig';
$string['statuswarning'] = 'Waarschuwing';
$string['timewarning'] = 'Deze bewerking kan lang duren, wees geduldig.';
