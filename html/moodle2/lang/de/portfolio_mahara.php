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
 * Strings for component 'portfolio_mahara', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   portfolio_mahara
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['enableleap2a'] = 'Support für Leap2A Portfolio aktivieren (erfordert Mahara 1.3 oder höher)';
$string['err_invalidhost'] = 'Ungültiger MNet-Host';
$string['err_invalidhost_help'] = 'Das Plugin ist falsch konfiguriert und versucht zu einem ungültigen (oder gelöschten) MNet-Host zu verbinden. Das Plugin basiert auf MNet-Peers, wobei SSO_IDP veröffentlicht, SSO_SP abonniert und Portfolio abonniert <b>und</b> veröffentlicht sein müssen.';
$string['err_networkingoff'] = 'MNet ist ausgeschaltet';
$string['err_networkingoff_help'] = 'MNet ist ausgeschaltet. Aktivieren Sie MNet, bevor Sie das Plugin konfigurieren. Alle Instanzen dieses Plugins sind unsichtbar, solange die Einstellung nicht korrigiert wurde. Die Instanzen müssen anschließend manuell sichtbar geschaltet werden, um sie nutzen zu können.';
$string['err_nomnetauth'] = 'Plugin zur MNet-Authentifizierung ist deaktiviert';
$string['err_nomnetauth_help'] = 'Plugin zur MNet-Authentifizierung ist deaktiviert. Es wird für diesen Service jedoch benötigt';
$string['err_nomnethosts'] = 'Basiert auf MNet';
$string['err_nomnethosts_help'] = 'Das Plugin basiert auf MNet Peers mit veröffentlichten SSO IDP. SSO SP und  Portfolio gezeichnet<b> und </b> veröffentlicht sowie dem MNet Authentifizierungsplugin. Jede Instanz des Plugins wird auf unsichtbar gesetzt, bis dies geschehen ist. Die Einstellung sichtbar/verfügbar muss manuell vorgenommen werden. Erst dann kann das Plugin genutzt werden.';
$string['failedtojump'] = 'Die Kommunikation mit dem externen Server konnte nicht gestartet werden.';
$string['failedtoping'] = 'Die Kommunikation mit dem externen Server ({$a}) konnte nicht gestartet werden.';
$string['mnethost'] = 'MNet-Host';
$string['mnet_nofile'] = 'Datei zum Transfer konnte nicht gefunden werden.';
$string['mnet_nofilecontents'] = 'Datei im Transferobjekt gefunden, Fehler aufgetreten: {$a}';
$string['mnet_noid'] = 'Kein passender Transfer-Datensatz zu diesem Token gefunden';
$string['mnet_notoken'] = 'Kein passendes Token zu diesem Transfer gefunden';
$string['mnet_wronghost'] = 'Der Remote-Host passt nicht zum Transfer-Datensatz für dieses Token';
$string['pf_description'] = 'Abonnieren <b>und</b> veröffentlichen Sie diesen Dienst, damit Ihre Nutzer/innen vorhandene Inhalte von Moodle nach {$a} übertragen können.<br /><ul>
<li><em>Voraussetzung</em>: Sie müssen den SSO-Dienst (Identify Provider) für {$a} <strong>veröffentlichen</strong>.</li>
<li><em>Voraussetzung</em>: Sie müssen den SSO-Dienst (Service Provider) von {$a} <strong>abonnieren</strong>.</li>
<li><em>Voraussetzung</em>: Sie müssen die MNet-Authentifizierung aktivieren.</li></ul>';
$string['pf_name'] = 'Portfolio-Service';
$string['pluginname'] = 'Mahara ePortfolio';
$string['senddisallowed'] = 'Sie können momentan keine Daten zu Mahara übertragen';
$string['url'] = 'URL';
