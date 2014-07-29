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
 * Strings for component 'auth_shibboleth', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_shibboleth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_shib_auth_method'] = 'Namn på metoden för autenticering';
$string['auth_shibbolethdescription'] = 'Genom att använda den här metoden kan Du ansluta till en befintlig Shibboleth-server för att kontrollera och skapa nya konton.';
$string['auth_shibboleth_errormsg'] = 'Var snäll och markera vilken organisation du tillhör!';
$string['auth_shibboleth_login'] = 'Logga in med Shibboleth';
$string['auth_shibboleth_login_long'] = 'Logga in på Moodle med Shibboleth';
$string['auth_shibboleth_manual_login'] = 'Logga in manuellt';
$string['auth_shibboleth_select_member'] = 'Jag är medlem av...';
$string['auth_shibboleth_select_organization'] = 'För autenticering med Shibboleth, var snäll och markera i nedrullningamenyn den organisation du tillhör:';
$string['auth_shib_changepasswordurl'] = 'URL  till sida för att ändra lösenord';
$string['auth_shib_convert_data'] = 'API för modifiering av data';
$string['auth_shib_convert_data_description'] = 'Du kan använda denna API för fortsatt modifiering av data som kommer via Shibboleth. Läs <a href="../auth/shibboleth/README.txt" target="_blank">README</a> för vidare instruktioner.';
$string['auth_shib_convert_data_warning'] = 'Filen finns inte eller så kan den inte läsas av webbserver-processen.';
$string['auth_shib_idp_list'] = 'Leverantörer av identiteter';
$string['auth_shib_instructions'] = 'Använd <a href="{$a}">logga in med Shibboleth</a>
 för att få tillgång via Shibboleth om Din institution stödjer det.<br />Annars får Du använda det vanliga formuläret(som visas här) för att logga in';
$string['auth_shib_instructions_help'] = 'Här bör Du tillhandahålla instruktioner för hur man använder Shibboleth. Detta kommer att visas på sektionen för instruktioner på sidan för att logga in. Detta bör innehålla en länk till "<b>{$a}</b>" så att Shibboleth-användare kan logga in på ett enkelt sätt. Om Du lämnar detta tomt så kommer standardinstruktioner (som inte är Shibboleth-specifika) att användas.';
$string['auth_shib_integrated_wayf'] = 'Moodle WAYF Service';
$string['auth_shib_logout_return_url'] = 'Alternativ retur-URL för utloggning';
$string['auth_shib_no_organizations_warning'] = 'Om du vill använda den integrerade WAYF-tjänsten så måste du tillhandahålla en kommaseparerad lista över Identity Provider entityIDs, deras namn och alternativt en initierare för sessioner.';
$string['auth_shib_only'] = 'Endast Shibboleth';
$string['auth_shib_only_description'] = 'Markera det här alternativet om Du vill aktivera autenticering med Shibboleth.';
$string['auth_shib_username_description'] = 'Namnet på den webbserver miljövariabel för Shibboleth som ska användas som användarnamn för Moodle.';
$string['pluginname'] = 'Shibboleth';
$string['shib_no_attributes_error'] = 'Du verkar vara autenticerad via Shibboleth men Moodle fick inga data om egenskaper för användare: Var snäll och kontrollera att den som tillhandahåller Din identitet vidarebefordrar de nödvändiga egenskaperna ({$a}) till den som står för de tjänster (Services) som Moodle körs på eller informera webmaster på den här servern.';
$string['shib_not_all_attributes_error'] = 'Moodle behöver vissa Shibboleth-egenskaper som inte får att påträffa för Din Del. Egenskaperna är:{$a}<br />Var snäll och kontakta webmaster på den här servern eller den som tillhandahåller de tjänster som Moodle körs på.';
$string['shib_not_set_up_error'] = 'Autenticering via Shibboleth verkar inte att fungera  korrekt. Var snäll och konsultera <a href="README.txt">README</a> för vidare instruktioner om hur man sätter upp autenticering via Shibboleth.';
