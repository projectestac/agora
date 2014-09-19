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
 * Strings for component 'portfolio_boxnet', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apiv1migration_message_content'] = 'El connector Box portfolio s\'ha deshabilitat com a part de la recent actualització de Moodle a la versió 2.6. Per rehabilitar-lo us cal reconfigurar-lo com es descriu a la documentació  {$a->docsurl}.';
$string['apiv1migration_message_small'] = 'El connector s\'ha deshabilitat ja que cal configurar-lo com es descriu en la documentació de la migració Box APIv1.';
$string['apiv1migration_message_subject'] = 'Informació important sobre el connector Box portfolio';
$string['clientid'] = 'ID del client';
$string['clientsecret'] = 'Clau secreta del client';
$string['existingfolder'] = 'Carpeta existent on posar el/s fitxer/s';
$string['folderclash'] = 'La carpeta que voleu crear ja existeix';
$string['foldercreatefailed'] = 'No s\'ha pogut crear la vostra carpeta de destinació a Box';
$string['folderlistfailed'] = 'No s\'ha pogut recuperar una llista de carpetes de Box';
$string['missinghttps'] = 'Cal HTTPS';
$string['missinghttps_help'] = 'Box sols treballa amb webs amb HTTPS habilitat';
$string['missingoauthkeys'] = 'S\'ha perdut la ID del client i la contrasenya secreta';
$string['missingoauthkeys_help'] = 'No estan configurats al connector la ID del client ni la contrasenya secreta. Podeu obtenir-ne una des la pàgina de desenvolupament de Box.';
$string['newfolder'] = 'Nova carpeta on posar el/s fitxer/s';
$string['noauthtoken'] = 'No s\'ha pogut recuperar un testimoni d\'autenticació per a utilitzar-lo en aquesta sessió';
$string['notarget'] = 'Heu d\'especificar una carpeta de destinació existent o una de nova';
$string['noticket'] = 'No s\'ha pogut recuperar un tiquet de Box per a iniciar la sessió d\'autenticació';
$string['password'] = 'La vostra contrasenya de Box (no és guardarà)';
$string['pluginname'] = 'Box';
$string['sendfailed'] = 'No s\'ha pogut enviar el contingut a Box: {$a}';
$string['setupinfo'] = 'Instruccions de configuració';
$string['setupinfodetails'] = 'Per a obtenir una ID de client API, entreu en Box i visiteu la <a href="{$a->servicesurl}">pàgina de desenvolupament Box</a>. Seguiu «Create new application» i creeu una nova aplicació per al vostre lloc Moodle. La ID del client i la contrasenya secreta es mostren en la secció «OAuth2 parameters» del formulari d\'edició de l\'aplicació. Podeu proporcionar de forma opcional  informació sobre el vostre lloc web Moodle';
$string['sharedfolder'] = 'Compartit';
$string['sharefile'] = 'Voleu compartir aquest fitxer?';
$string['sharefolder'] = 'Voleu compartir aquesta nova carpeta?';
$string['targetfolder'] = 'Carpeta de destinació';
$string['tobecreated'] = 'Per crear';
$string['username'] = 'El vostre nom d\'usuari a Box (no es desarà)';
$string['warninghttps'] = 'Cal que el vostre lloc web utilitzi HTTPS per tal que el portafoli funcioni.';
