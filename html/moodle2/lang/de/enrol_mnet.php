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
 * Strings for component 'enrol_mnet', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['error_multiplehost'] = 'Es existieren mehrere MNet Einschreibungs Plugins für diesen Host. Nur eine Instanz für jeden Host und/oder \'Alle Hosts\'ist erlaubt.';
$string['instancename'] = 'Einschreibemethode';
$string['instancename_help'] = 'Sie haben die Möglichkeit, diese Instanz der MNet Einschreibemethode umzubenennen. Wenn das Feld leer bleibt, wird der Standardwert genutzt. Dieser enthält den Namen des externen Hosts und die dort zugewiesenen Rollenbezeichnungen für Nutzer. ';
$string['mnet_enrol_description'] = 'Veröffentlichen Sie diesen Dienst, um Administrator/innen von {$a} zu erlauben, deren Teilnehmer/innen in Kursen anzumelden, die Sie auf Ihrem Server erstellt haben.<br/>
<ul><li><em>Voraussetzung</em>: Sie müssen den SSO-Dienst (Service Provider) für {$a} <strong> veröffentlichen </strong>.</li>
<li><em>Voraussetzung</em>: Sie müssen auch den SSO-Dienst (Identity Provider) von {$a} <strong>abonnieren</strong>. </li></ul><br/>

Abonnieren Sie diesen Dienst, um die Teilnehmer/innen Ihres Moodles in Kursen auf {$a} anmelden zu können.<br/>
<ul><li><em>Voraussetzung</em>: Sie müssen den SSO-Dienst (Service Provider) von {$a} <strong>abonnieren</strong>. </li>
<li><em>Voraussetzung</em>: Sie müssen den SSO-Dienst (Identity Provider) für {$a} <strong> veröffentlichen</strong>.</li></ul><br/>';
$string['mnet_enrol_name'] = 'Service externe Einschreibung';
$string['pluginname'] = 'Externe MNet Einschreibungen ';
$string['pluginname_desc'] = 'Ermöglicht externen MNet Hosts ihre Nutzer auf diesem System in Kurse einzuschreiben.';
$string['remotesubscriber'] = 'Remote Host';
$string['remotesubscriber_help'] = 'Mit der Funktion \'Alle Hosts\' wird dieser Kurs für alle MNet Peers, denen die externe Einschreibung erlaubt ist, geöffnet. Wählen Sie statt dessennureinen bestimmten Host aus, haben nur dessen Nutzer Zugriff auf den Kurs.  ';
$string['remotesubscribersall'] = 'Alle Hosts';
$string['roleforremoteusers'] = 'Rolle im Kurs';
$string['roleforremoteusers_help'] = 'Welche Rolle der Remotenutzer aus dem gewählten Host erhält.';
