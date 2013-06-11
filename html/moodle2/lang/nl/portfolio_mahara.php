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
 * Strings for component 'portfolio_mahara', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_mahara
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['enableleap2a'] = 'Leap2a Portfolio-ondersteuning inschakelen (Mahara 1.3 of hoger vereist)';
$string['err_invalidhost'] = 'Ongeldige MNet host';
$string['err_invalidhost_help'] = 'Deze plugin is fout geconfigureerd en verwijst naar een ongeldige (of verwijderde) MNET host. Deze plugin werkt met Moodle Networking servers met SSO IDP gepubliceerd, SSO_SP en portfolio ingeschreven <b>en</b> gepubliceerd.';
$string['err_networkingoff'] = 'MNetis volledig uitgeschakeld. Schakel dit in voor je deze plugin probeert te configureren. Alle instanties van deze plugin zijn op onzichtbaar gezet tot dit is hersteld - je zult ze manueel terug zichtbaar moeten zetten. Ze kunnen niet gebruikt worden tot dit gebeurd is.';
$string['err_networkingoff_help'] = 'MNet is uitgeschakeld. Schakel het in voor je deze plugin probeert te configureren. Alle instanties van deze plugin zijn op niet zichtbaar gezet tot dit is opgelost - je zult ze manueel terug zichtbaar moeten zetten. Ze kunnen niet gebruikt worden tot dit gebeurd is.';
$string['err_nomnetauth'] = 'De MNet authentictieplugin is uitgeschakeld';
$string['err_nomnetauth_help'] = 'De MNet authenticatieplugin is uitgeschakeld, maar is vereist voor deze service';
$string['err_nomnethosts'] = 'Steunt op MNet';
$string['err_nomnethosts_help'] = 'Deze plugin steunt op Moodle Netwerk peers met SSO IDP gepubliceerd, SSO SP ingeschreven, portfolio services gepubliceerd  <b>en</b> ingeschreven en ook op de MNet authenticatieplugin. Alle instanties van deze plugin zijn op niet zichtbaar gezet tot aan deze voorwaarden voldaan is. Ze moeten dan manueel terug op zichtbaar gezet worden.';
$string['failedtojump'] = 'Het starten van de communicatie met de andere server is mislukt';
$string['failedtoping'] = 'Het starten van de communicatie met server {$a} is mislukt';
$string['mnethost'] = 'MNet host';
$string['mnet_nofile'] = 'Kon geen bestand vinden in het transfer object.';
$string['mnet_nofilecontents'] = 'Bestand in tranfer object gevonden, maar kon de inhoud niet ophalen: {$a}';
$string['mnet_noid'] = 'Kon het overeenkomstige transfer record voor dit token niet vinden';
$string['mnet_notoken'] = 'Kon geen token vinden dat overeenkomt met deze transfer';
$string['mnet_wronghost'] = 'De andere server kwam niet overeen met het transfer record voor dit token';
$string['pf_description'] = 'Laat gebruikers toe Moodle-inhoud naar deze server te sturen<br />Schrijf in op deze service om geauthenticeerde gebruikers van jouw site toe te laten om inhoud te sturen naar {$a}<br /><ul><li><em>Noodzakelijk</em>: je moet ook de SSO (Identiteitsprovider) service <strong>publiceren</strong> aan {$a} </li><li><em>Noodzakelijk</em>: je moet <strong>inschrijven</strong> op de SSO (Service provider) service op {$a}</li><li><em>Noodzakelijk</em>: je moet de MNet authenticatieplugin inschakelen</li></ul><br />';
$string['pf_name'] = 'Portfolio diensten';
$string['pluginname'] = 'Mahara ePortfolio';
$string['senddisallowed'] = 'Je kunt nu geen bestanden naar Mahara overzetten';
$string['url'] = 'URL';
