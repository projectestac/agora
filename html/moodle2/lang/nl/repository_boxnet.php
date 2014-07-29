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
 * Strings for component 'repository_boxnet', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   repository_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'API-sleutel';
$string['apiv1migration_message_content'] = 'Als deel van je recente Moodle-upgrade is de Box-plugin voor opslagruimte uitgeschakeld. Om die opnieuw in te schakelen, moet je die opnieuw configureren zoals beschreven in de documentatie {$a->docsurl}.';
$string['apiv1migration_message_small'] = 'Deze plugin is uitgeschakeld omdat configuratie zoals beschreven in de Box Apiv1 migratie vereist is.';
$string['apiv1migration_message_subject'] = 'Belangrijke informatie over de Box plugin voor opslagruimte.';
$string['boxnet:view'] = 'Bekijk Box opslagruimte';
$string['cannotcreatereference'] = 'Kan geen referentie maken, niet genoeg rechten om het bestand te delen op Box.';
$string['clientid'] = 'Client ID';
$string['clientsecret'] = 'Client geheim';
$string['configplugin'] = 'Box instellingen';
$string['filesourceinfo'] = 'Box ({$a->fullname}): {$a->filename}';
$string['information'] = 'Haal een Client ID en geheim van <a href="http://www.box.net/developers/service">Box ontwikkelaarspagina</a> voor je Moodle site.';
$string['invalidpassword'] = 'Ongeldig wachtwoord';
$string['migrationadvised'] = 'Je gebruikte blijkbaar Box met de API-versie 1. Heb je de <a href="{$a}">migration tool</a> laten lopen om de oude verwijzingen om te zetten naar de nieuwe API?';
$string['migrationinfo'] = '<p>Als deel van  de migratie naar de nieuwe API van Box, moeten de referenties naar je bestanden worden geconverteerd. Jammer genoeg is het referentiesysteem niet compbatibel met versie 2 van de API. We gaan de bestanden dus moeten downloaden en hen converteren naar echte bestanden.</p>
<p>Let op: de conversie kan een heel lange tijd in beslag nemen, afhankelijk van hoeveel referenties je gebruikt en hoe groot die bestanden zijn</p>
<p>Je kunt de migratietool starten door op onderstaande knop te klikken of door het CLI-script te starten op repository/boxnet/cli/migrationv1.php.</p>
<p>Meer info via <a href="{$a->docsurl}">deze link</a>.</p>';
$string['migrationtool'] = 'Box APIv1 migratietool';
$string['nullfilelist'] = 'Er zijn geen bestanden in deze opslagruimte';
$string['password'] = 'Jouw wachtwoord:';
$string['pluginname'] = 'Box';
$string['pluginname_help'] = 'Opslagruimte voor Box';
$string['runthemigrationnow'] = 'Start nu de migratietool';
$string['saved'] = 'Box-gegevens bewaard.';
$string['shareurl'] = 'Deel URL';
$string['username'] = 'Box gebruikersnaam';
$string['warninghttps'] = 'Om de Box opslagruimte te laten werken moet je site HTTPS gebruiken.';
