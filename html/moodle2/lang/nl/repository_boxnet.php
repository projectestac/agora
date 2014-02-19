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
 * Strings for component 'repository_boxnet', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   repository_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'API-sleutel';
$string['apiv1migration_message_small'] = 'Deze plugin is uitgeschakeld omdat configuratie zoals beschreven in de Box.net Apiv1 migratie vereist is.';
$string['apiv1migration_message_subject'] = 'Belangrijke informatie over de Box.net plugin voor opslagruimte.';
$string['boxnet:view'] = 'Bekijk box.net opslagruimte';
$string['callbackurl'] = 'Redirect URL';
$string['callbackurltext'] = '1. Bezoek de  <a href="http://www.box.net/developers/services">box.net developers site</a> opnieuw.
2. Zorg ervoor dat je de redirect-URL van deze box.net service op {$a}  zet';
$string['callbackwarning'] = '1. Haal een  <a href="http://www.box.net/developers/services">box.net API</a> van box.net voor deze Moodle site.
2. Zet de  box.net API-sleuter hier, klik dan bewaren en kom terug naar deze pagina. Je zult zien dat Moodle een redirect-URL gegenereerd heeft.
3. Bewerk je box.net details op de box.net website en zet daar de  redirect-URL.';
$string['cannotcreatereference'] = 'Kan geen referentie maken, niet genoeg rechten om het bestand te delen op Box.net';
$string['clientid'] = 'Client ID';
$string['clientsecret'] = 'Client geheim';
$string['configplugin'] = 'Box.net-instellingen';
$string['filesourceinfo'] = 'Box.net ({$a->fullname}): {$a->filename}';
$string['information'] = 'Haal een <a href="http://www.box.net/developers/service">Box.net API Key</a> voor je Moodle site.';
$string['invalidpassword'] = 'Ongeldig wachtwoord';
$string['migrationadvised'] = 'Je gebruikte blijkbaar Box.net met de API-versie 1. Heb je de <a href="{$a}">migration tool</a> laten lopen om de oude verwijzingen om te zetten naar de nieuwe API?';
$string['migrationinfo'] = '<p>Als deel van  de migratie naar de nieuwe API van Box.net, moeten de referenties naar je bestanden worden geconverteerd. Jammer genoeg is het referentiesysteem niet compbatibel met versie 2 van de API. We gaan de bestanden dus moeten downloaden en hen converteren naar echte bestanden.</p>
<p>Let op: de conversie kan een heel lange tijd in beslag nemen, afhankelijk van hoeveel referenties je gebruikt en hoe groot die bestanden zijn</p>
<p>Je kunt de migratietool starten door op onderstaande knop te klikken of door het CLI-script te starten op repository/boxnet/cli/migrationv1.php.</p>
<p>Meer info via <a href="{$a->docsurl}">deze link</a>.</p>';
$string['migrationtool'] = 'Box.net APIv1 migratietool';
$string['nullfilelist'] = 'Er zijn geen bestanden in deze opslagruimte';
$string['password'] = 'Jouw wachtwoord:';
$string['pluginname'] = 'Box.net';
$string['pluginname_help'] = 'Opslagruimte voor box.net';
$string['runthemigrationnow'] = 'Start nu de migratietool';
$string['saved'] = 'Box.net-gegevens bewaard.';
$string['shareurl'] = 'Deel URL';
$string['username'] = 'Box.net-account';
$string['warninghttps'] = 'Om de Box.net opslagruimte te laten werken moet je site HTTPS gebruiken.';
