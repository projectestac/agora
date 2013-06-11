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
 * Strings for component 'portfolio_boxnet', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'API-sleutel';
$string['err_noapikey'] = 'Geen API-sleutel';
$string['err_noapikey_help'] = 'Er is nog geen API-sleutel geconfigureerd voor deze plugint. Je kunt er één krijgen via de OpenBox development pagina';
$string['existingfolder'] = 'Bestaande map om bestand(en) in te zetten';
$string['folderclash'] = 'De map die je wou maken bestaat al!';
$string['foldercreatefailed'] = 'Het maken van je map op box.net is mislukt';
$string['folderlistfailed'] = 'Kon geen mappenlijst krijgen van box.net';
$string['newfolder'] = 'Nieuwe map om bestand(en) in te bewaren';
$string['noauthtoken'] = 'Kon geen authenticatie-token krijgen om tijdens deze sessie te gebruiken';
$string['notarget'] = 'Je moet ofwel een bestaande map kiezen of een nieuwe map maken om naar te uploaden';
$string['noticket'] = 'Kon geen ticket krijgen van box.net om de authenticatiesessie te beginnen';
$string['password'] = 'Je box.net wachtwoord (wordt niet bewaard)';
$string['pluginname'] = 'Box.net';
$string['sendfailed'] = 'Inhoud naar box.net sturen mislukt: {$a}';
$string['setupinfo'] = 'Installatie-instructies';
$string['setupinfodetails'] = 'Om een API-sleutel te verkrijgen, moet je inloggen bij box.net en hun <a href="{$a->servicesurl}">OpenBox development page</a> bezoeken.  In \'Developer Tools\', volg \'Create new application\' en maak een nieuwe applicatie voor jouw Moodle site. De API-sleutel wordt getoond in de \'Backend parameters\' sectie van het application edit formulier. In dat formulier vul je het \'Redirect URL\' veld in met:<br /><code>{$a->callbackurl}</code><br />Optioneel kun je ook meer informatie over je Moodle site geven. Deze gegevens kunnen later bewerkt worden via de \'View my applications\' pagina.';
$string['sharedfolder'] = 'Gedeeld';
$string['sharefile'] = 'Dit bestand delen?';
$string['sharefolder'] = 'Deze nieuwe map delen?';
$string['targetfolder'] = 'Doelmap';
$string['tobecreated'] = 'Aan te maken';
$string['username'] = 'Je box.net gebruikersnaam (wordt niet bewaard)';
