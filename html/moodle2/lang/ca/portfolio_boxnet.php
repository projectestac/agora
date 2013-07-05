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
 * Strings for component 'portfolio_boxnet', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'Clau API';
$string['err_noapikey'] = 'Sense clau API';
$string['err_noapikey_help'] = 'No hi ha una clau API configurada per a aquest connector. Podeu obtenir-ne una en la pàgina de desenvolupament d\'OpenBox.';
$string['existingfolder'] = 'Carpeta existent on posar el/s fitxer/s';
$string['folderclash'] = 'La carpeta que voleu crear ja existeix';
$string['foldercreatefailed'] = 'No s\'ha pogut crear la carpeta de destinació en box.net';
$string['folderlistfailed'] = 'No s\'ha pogut recuperar una llista de carpetes de box.net';
$string['newfolder'] = 'Nova carpeta on posar el/s fitxer/s';
$string['noauthtoken'] = 'No s\'ha pogut recuperar un testimoni d\'autenticació per a utilitzar-lo en aquesta sessió';
$string['notarget'] = 'Heu d\'especificar una carpeta de destinació existent o una de nova';
$string['noticket'] = 'No s\'ha pogut recuperar un tiquet de box.net per a iniciar la sessió d\'autenticació';
$string['password'] = 'La vostra contrasenya de box.net (no és guardarà)';
$string['pluginname'] = 'Box.net';
$string['sendfailed'] = 'No s\'ha pogut enviar el contingut a box.net: {$a}';
$string['setupinfo'] = 'Instruccions de configuració';
$string['setupinfodetails'] = 'Per a obtenir una clau API, entreu en Box.net i visiteu la <a href="{$a->servicesurl}">pàgina de desenvolupament OpenBox</a>. A \'Developer Tools\', accediu a \'Create new application\' i creeu una nova aplicació per al vostre lloc Moodle. La clau API es mostra a la secció \'Backend parameters\' al formulari d\'edició de l\'aplicació. En aquest formulari, empleneu el camp \'Redirect URL\' amb:<br /><code>{$a->callbackurl}</code><br />Si ho desitgeu, també podeu donar-hi més informació sobre el vostre lloc Moodle. Aquests valors es poden modificar més tard a la pàgina \'View my applications\'.';
$string['sharedfolder'] = 'Compartit';
$string['sharefile'] = 'Voleu compartir aquest fitxer?';
$string['sharefolder'] = 'Voleu compartir aquesta nova carpeta?';
$string['targetfolder'] = 'Carpeta de destinació';
$string['tobecreated'] = 'Per crear';
$string['username'] = 'El vostre nom d\'usuari a box.net (no es guardarà)';
