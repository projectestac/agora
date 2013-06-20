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
 * Strings for component 'repository_picasa', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   repository_picasa
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clientid'] = 'Client ID';
$string['configplugin'] = 'Picasa opslagruimte configuratie';
$string['oauth2upgrade_message_content'] = 'Als deel van de upgrade naar Moodle 2.3, is de Picasa portfolioplugin uitgeschakeld. Om deze opnieuw in te schakelen, moet je site eerst geregistreerd worden bij Google, zoals beschreven in de documentatie op {$a->docsurl}, zodat je een client ID en geheim kan verkrijgen. De client ID en geheim kan gebruikt worden om alle Google Docs en Picasa-plugins te configureren.';
$string['oauth2upgrade_message_small'] = 'Deze plugin is uitgeschakeld, omdat die geconfigureerd moet worden zoals beschreven in de Google OAuth 2.0 setup.';
$string['oauth2upgrade_message_subject'] = 'Belangrijke informatie over de Picasa opslagruimte plugin';
$string['oauthinfo'] = '<p>Om deze plugin te kunnen gebruiken, moet je je site registreren bij Google, zoals beschreven in de documentatie op <a href="{$a->docsurl}">Google OAuth 2.0 setup</a>.</p><p>Als deel van het registratieproces, zul je volgende URL\'s als \'Authorized Redirect URL\'s moeten ingeven:</p><p>{$a->callbackurl}</p>Als je geregistreerd bent, dan krijg je een clientID en geheim, die gebruikt kunnen worden om alle Google Docs en Picasa plugins te configureren.';
$string['picasa:view'] = 'Bekijk Picasa opslagruimte';
$string['pluginname'] = 'Picasa Webalbum';
$string['secret'] = 'Geheim';
