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
 * Strings for component 'portfolio_mahara', language 'ca', branch 'MOODLE_23_STABLE'
 *
 * @package   portfolio_mahara
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['enableleap2a'] = 'Habilita l\'ús de Leap2A al portafolis (requereix la versió de Mahara 1.3 o superior)';
$string['err_invalidhost'] = 'Servidor MNet incorrecte';
$string['err_invalidhost_help'] = 'Aquest connector està mal configurat ja que apunta a un servidor MNet incorrecte (o eliminat). Aquest connector es basa en una xarxa Moodle d\'iguals amb un IDP SSO publicat, SSO_SP subscrit, i un portafolis subscrit <b>i</b> publicat.';
$string['err_networkingoff'] = 'MNet està desactivat';
$string['err_networkingoff_help'] = 'MNet està totalment desactivat. Si us plau, activeu-lo abans de configurar aquest connector. Qualsevol instància d\'aquest connector s\'ha definit com a no visible fins que estigui activat. L\'haureu de definir com a visible de nou manualment. Fins aleshores no es podrà utilitzar.';
$string['err_nomnetauth'] = 'El connector d\'autenticació MNet està desactivat';
$string['err_nomnetauth_help'] = 'El connector d\'autenticació MNet està desactivat, però es requereix per a aquest servei';
$string['err_nomnethosts'] = 'Depén de MNet';
$string['err_nomnethosts_help'] = 'Aquest connector es basa en un MNet d\'iguals amb SSO IDP publicat, SSO SP subscrit, serveis del portfoli publicats <b>i</b> subscrits igual que el connector d\'autenticació MNet. Qualsevol instància d\'aquest connector s\'ha ocultat fins que aquestes condicions es compleixen. Aleshores s\'haurà d\'establir a visible de nou manualment.';
$string['failedtojump'] = 'No s\'ha pogut establir connexió amb el servidor remot';
$string['failedtoping'] = 'No s\'ha pogut establir connexió amb el servidor remot: {a}';
$string['mnethost'] = 'Servidor MNet';
$string['mnet_nofile'] = 'No s\'ha pogut trobar el fitxer en l\'objecte de tranferència (error desconegut)';
$string['mnet_nofilecontents'] = 'S\'ha trobat el fitxer en l\'objecte de transferència, però no s\'ha pogut obtenir el contingut (error desconegut: {$a})';
$string['mnet_noid'] = 'No s\'ha pogut trobar el registre de la transferència corresponent a aquest testimoni';
$string['mnet_notoken'] = 'No s\'ha pogut trobar el testimoni corresponent a aquesta  transferència';
$string['mnet_wronghost'] = 'El servidor remot no correspon al registre de tranferència d\'aquest token';
$string['pf_description'] = 'Permet els usuaris inserir contingut de Moodle en aquest servidor<br />Subscriviu <b>i</b> publiqueu aquest servei per permetre els usuaris autenticats del vostre lloc d\'inserir contingut en {$a}<br /><ul><li><em>Dependència</em>: heu de <strong>publicar</strong> també el servei SSO (Proveïdor d\'identitats) per a {$a}.</li><li><em>Dependència</em>: heu de <strong>subscriure</strong> també el servei SSO (Proveïdor de servei) en {$a}</li><li><em>Dependència</em>: heu d\'activar també el connector d\'autenticació MNet.</li></ul></br />';
$string['pf_name'] = 'Serveis de portafolis';
$string['pluginname'] = 'Portafolis electrònic Mahara';
$string['senddisallowed'] = 'No es poden transferir fitxers a Mahara en aquest moment';
$string['url'] = 'URL';
