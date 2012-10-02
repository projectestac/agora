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
 * Strings for component 'portfolio_mahara', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   portfolio_mahara
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['enableleap2a'] = 'Leap2a Portfoliounterstützung aktivieren (erfordert Mahara 1.3 oder höher)';
$string['err_invalidhost'] = 'Ungültiger MNet Host';
$string['err_invalidhost_help'] = 'Das Plugin ist falsch konfiguriert und versucht zu einem ungültigen oder gelöschten MNet-Host zu verbinden. Das Plugin basiert auf Moodle Networking Peers. SSO_IDP ist veröffentlicht und SSO_SP ist abonniert. Portfolio ist abonniert <b>und</b> veröffentlicht.';
$string['err_networkingoff'] = 'MNet ist ausgeschaltet';
$string['err_networkingoff_help'] = 'MNet ist ausgeschaltet. Aktivieren Sie MNet, bevor Sie das Plugin konfigurieren. Alle Instanzen dieses Plugins sind unsichtbar, solange die Einstellung nicht korrigiert wurde. Die Instanzen müssen anschließend manuell sichtbar geschaltet werden, um sie nutzen zu können.';
$string['err_nomnetauth'] = 'MNet Authentifizierungs-Plugin ist deaktiviert';
$string['err_nomnetauth_help'] = 'MNet Authentifizierungs-Plugin ist deaktiviert. Es wird für diesen Service jedoch benötigt';
$string['err_nomnethosts'] = 'Basiert auf MNet';
$string['err_nomnethosts_help'] = 'Das Plugin basiert auf MNet Peers mit veröffentlichten SSO IDP. SSO SP und  Portfolio gezeichnet<b> und </b> veröffentlicht sowie dem MNet Authentifizierungsplugin. Jede Instanz des Plugins wird auf unsichtbar gesetzt, bis dies geschehen ist. Die Einstellung sichtbar/verfügbar muss manuell vorgenommen werden. Erst dann kann das Plugin genutzt werden.';
$string['failedtojump'] = 'Die Kommunikation mit dem externen Server konnte nicht gestartet werden.';
$string['failedtoping'] = 'Die Kommunikation mit dem externen Server ({$a}) konnte nicht gestartet werden.';
$string['mnethost'] = 'MNet Host';
$string['mnet_nofile'] = 'Datei zum Transfer konnte nicht gefunden werden.';
$string['mnet_nofilecontents'] = 'Datei im Transferobjekt gefunden, Fehler aufgetreten: {$a}';
$string['mnet_noid'] = 'Zu diesem Token wurde kein passender Transferdatensatz gefunden';
$string['mnet_notoken'] = 'Zu diesem Transfer wurde kein passendes Token gefunden';
$string['mnet_wronghost'] = 'Der Remote Host konnte zu diesem Token keinen Transferdatensatz zuordnen';
$string['pf_description'] = 'Erlaubt Nutzern Moodle-Inhalte an diesen Host zu übertragen <br />Bestätigen Sie diesen Service, damit authentifizierte Nutzer/innen Ihrer Site Inhalte übertragen können nach {$a}<br /><em>Bedingungen</em>: </br><ul><li>Sie müssen zusätzlich den SSO (Identify Provider)Service für {$a} <strong>bekanntgeben</strong>.</li><li>Sie müssen zusätzlich den SSO (Identify Provider)Service für {$a} <strong>eintragen</strong>.</li>
<li>Sie müssen die mnet Authentifizierung aktivieren.</li></ul><br />';
$string['pf_name'] = 'Portfolio-Dienste';
$string['pluginname'] = 'Mahara ePortfolio';
$string['senddisallowed'] = 'Sie können zu diesem Zeitpunkt keine Daten zu Mahara übertragen';
$string['url'] = 'URL';
