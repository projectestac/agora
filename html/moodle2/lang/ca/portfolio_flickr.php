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
 * Strings for component 'portfolio_flickr', language 'ca', branch 'MOODLE_23_STABLE'
 *
 * @package   portfolio_flickr
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'Clau API';
$string['contenttype'] = 'Tipus de contingut';
$string['err_noapikey'] = 'Sense clau API';
$string['err_noapikey_help'] = 'No hi ha cap clau API configurada per a aquest connector. Podeu obtenir-ne una a la pàgina de serveis de Flickr';
$string['hidefrompublicsearches'] = 'Ocultar aquestes imatges de les cerques públiques?';
$string['isfamily'] = 'Visible per la família';
$string['isfriend'] = 'Visible pels amics';
$string['ispublic'] = 'Pública (qualsevol ho pot veure)';
$string['moderate'] = 'Moderat';
$string['noauthtoken'] = 'No s\'ha pogut trobar un testimoni d\'autenticació per a utilitzar-lo en aquesta sessió';
$string['other'] = 'Art, il·lustracions, CGI o altres imatges no fotogràfiques';
$string['photo'] = 'Fotografies';
$string['pluginname'] = 'Flickr.com';
$string['restricted'] = 'Restringit';
$string['safe'] = 'Segur';
$string['safetylevel'] = 'Nivell de seguretat';
$string['screenshot'] = 'Captures de pantalla';
$string['set'] = 'Conjunt';
$string['setupinfo'] = 'Instruccions de configuració';
$string['setupinfodetails'] = 'Per a obtenir una clau API i una contrasenya, entreu a Flickr i sol·liciteu una nova clau <a href="{$a->applyurl}">. Una vegada hagueu obtingut la clau i la contrasenya, aneu a l\'enllaç \'Edit auth flow for this app\' a la mateixa pàgina. En \'App Type\' seleccioneu \'Web Application\'. Empleneu el camp \'Callback URL\' amb el valor:<br /><code>{$a->callbackurl}</code><br />Si ho desitgeu, també podeu proporcionar la descripció i el logotip del vostre lloc Moodle. Aquests valors es poden definir més endavant en <a href="{$a->keysurl}"> la pàgina</ a> on es llisten les vostres aplicacions de Flickr.';
$string['sharedsecret'] = 'Contrasenya';
$string['title'] = 'Títol';
$string['uploadfailed'] = 'No s\'ha pogut penjar la imatge a flickr.com: {$a}';
