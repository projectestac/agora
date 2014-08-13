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
 * Strings for component 'auth_shibboleth', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_shibboleth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_shib_auth_method'] = 'Naam authenticatiemethode';
$string['auth_shib_auth_method_description'] = 'Geef een naam voor de Shibboleth authenticatiemethode die bekend is voor je gebruikers. Dit zou de naam van je Shibboleth federatie kunnen zijn, vb. <tt>SWITCHaai Login</tt> of <tt>InCommon Login</tt> of gelijkaardig:';
$string['auth_shibbolethdescription'] = 'Door deze methode te gebruiken kun je verbinding maken met een bestaande Shibboleth server om gebruikers te controleren en nieuwe aan te maken';
$string['auth_shibboleth_errormsg'] = 'Kies de organisatie waarvan je lid bent';
$string['auth_shibboleth_login'] = 'Shibboleth aanmelding';
$string['auth_shibboleth_login_long'] = 'Inloggen bij Moodle via Shibboleth';
$string['auth_shibboleth_manual_login'] = 'Manueel inloggen';
$string['auth_shibboleth_select_member'] = 'Ik ben lid van ...';
$string['auth_shibboleth_select_organization'] = 'Kies om the authenticeren via Shibboleth je organisatie uit het rolmenu.';
$string['auth_shib_changepasswordurl'] = 'URL om wachtwoord te wijzigen';
$string['auth_shib_contact_administrator'] = 'Als je niet geassocieerd bent met de opgegeven organisaties en je hebt toegang nodig tot cursussen op deze server, neem dan contact op met de <a href="mailto:{$a}">Moodle beheerder</a>.';
$string['auth_shib_convert_data'] = 'Data wijzigings-API';
$string['auth_shib_convert_data_description'] = 'Je kunt deze API gebruiken om de gegevens die Shibboleth geeft verder aan te passen. Lees <a href="../auth/shibboleth/README.txt" target="_blank">README</a> voor verder instructies.';
$string['auth_shib_convert_data_warning'] = 'Het bestand bestaat niet of is niet leesbaar voor het webserverproces!';
$string['auth_shib_idp_list'] = 'Identiteitsproviders';
$string['auth_shib_idp_list_description'] = 'Geef een lijst met Provider entityID\'s om een gebruiker een loginpagina te laten kiezen.<br /> Op elke lijn moet er een kommagescheiden tuple komen voor entityID van de IdP (zie Shibboleth metadatabestand) en Name of IdP zoals het getoond zal worden in het rolmenu.<br />Als optionele derde parameter kun je de locatie van een Shibboleth sessie initiator geven die gebruikt zal worden in het geval dat jouw Moodleinstallatie deel is van een multifederatie setup.';
$string['auth_shib_instructions'] = 'Gebruik de <a href="{$a}">Shibboleth login</a> om toegang te krijgen via Shibboleth als je instituut dat ondersteund.<br />Gebruik anders het gewone loginformulier.';
$string['auth_shib_instructions_help'] = 'Hier zou je aangepaste instructies moeten geven om je gebruikers Shibboleth uit te leggen. Die instructies zullen getoond worden op de login-pagina in het gedeelte voor instructies. Er zou een link naar "<b>{$a}</b>" moeten instaan, zodat gebruikers gemakkelijk kunnen inloggen. Als je dit blanco laat, dan zullen de standaardinstructies getoond worden (niet specifiek voor Shibboleth).';
$string['auth_shib_integrated_wayf'] = 'Moodle WAYF Service';
$string['auth_shib_integrated_wayf_description'] = 'Als je dit inschakeld zal Moodle zijn eigen WAYF service gebruiken in plaats van degene die vor Shibboleth geconfigureerd is. Moodle zal een rolmenu tonen op deze alternatieve loginpagina waar de gebruiker zijn identiteitsprovider kan kiezen.';
$string['auth_shib_logout_return_url'] = 'Alternatieve URL om naar terug te keren bij afmelden';
$string['auth_shib_logout_return_url_description'] = 'Geef de URL waarnaar Shibboleth-gebruikers zullen gebracht worden bij afmelden.<br/>Indien niet ingevuld zullen gebruikers naar de locatie gebracht worden waarnaar Moodle ze brengt.';
$string['auth_shib_logout_url'] = 'Shibollet Service Provider URL voor afmelden';
$string['auth_shib_logout_url_description'] = 'Geef de URL aan de Shibboleth Service Provider voor afmelden. Dit is typisch <tt>Shibboleth.sso/Logout</tt>';
$string['auth_shib_no_organizations_warning'] = 'Als je wil gebruik maken van de geïntegreerde WAYF-service, moet je eerst een door komma\'s gescheiden lijst met IDentity Provider entityID\'s, hun numen en optionneel een sessie-initiator.';
$string['auth_shib_only'] = 'Uitsluitend Shibboleth';
$string['auth_shib_only_description'] = 'Vink deze optie af als een Shibboleth-authenticatie opgelegd wordt.';
$string['auth_shib_username_description'] = 'Naam van de variable uit de Shibboleth webserveromgeving die als Moodle gebruikersnaam zal gebruikt worden';
$string['pluginname'] = 'Shibboleth';
$string['shib_invalid_account_error'] = 'Je bent blijkbaar via Shibboleth geauthenticeerd, maar Moodle heeft geen geldige account voor jouw gebruikersnaam. Je account bestaat misschien niet of is geschorst.';
$string['shib_no_attributes_error'] = 'Het lijkt er op dat je door Shibboleth geautenticeerd bent, maar Moodle kon geen gebruikersinformatie vinden. Controleer of je identiteitsprovider de nodige informatie ({$a}) vrijgeeft aan de serviceprovider waarvan Moodle gebruik maakt of waarschuw de webmaster van die server.';
$string['shib_not_all_attributes_error'] = 'Moodle heeft verschillende Shibboleth attributen nodig die in jouw geval niet aanwezig zijn. De attributen zijn: {$a}<br />Contacteer aub de webmaster van deze server of je identiteitsprovidor';
$string['shib_not_set_up_error'] = 'Shibboleth authenticatie lijkt niet juist geïnstalleerd te zijn. Raadpleeg het <a href="README.txt">README</a>-bestand voor meer informatie over hoe je Shibboleht authenticatie installeert.';
