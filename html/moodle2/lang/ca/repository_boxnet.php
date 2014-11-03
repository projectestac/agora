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
 * Strings for component 'repository_boxnet', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   repository_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'Clau d\'API';
$string['apiv1migration_message_content'] = 'El connector de repositori Box s\'ha deshabiitat en les actualitzacions més recents de Moodle (2.6, 2.5.3, 2.4.7). Per tal de tornar-lo a habilitar cal que el reconfigureu com s\'explica a la documentació {$a->docsurl}.';
$string['apiv1migration_message_small'] = 'Aquest connector s\'ha deshabilitat perquè requereix configuració, tal i com es descriu a la documentació de la migració Box APIv1.';
$string['apiv1migration_message_subject'] = 'Informació important sobre el connector de repositori Box';
$string['boxnet:view'] = 'Mostra el repositori BOX';
$string['cannotcreatereference'] = 'No es pot crear una referencia, no teniu prou permisos per compartir el fitxer a Box.';
$string['clientid'] = 'ID de client';
$string['clientsecret'] = 'Clau secreta del client';
$string['configplugin'] = 'Configuració de Box';
$string['filesourceinfo'] = 'Box ({$a->fullname}): {$a->filename}';
$string['information'] = 'Obteniu un ID de client i una clau de la <a href="http://www.box.net/developers/services">pàgina de desenvolupadors de Box</a> per al vostre lloc Moodle.';
$string['invalidpassword'] = 'Contrasenya no vàlida';
$string['migrationadvised'] = 'Sembla que esteu utilitzant Box amb la versió 1 de l\'API. Heu executat <a href="{$a}">l\'eina de migració</a> per convertir les referencies antigues?';
$string['migrationinfo'] = '<p> Com a part de la migració a la nova API proporcionada per Box, cal migrar les vostres referències a fitxer. Per desgràcia, el sistema de referència no és compatible amb la versió 2 de l\'API, així que procedirem a descarregar-los i convertir-los en fitxers reals. </p>
<p>Tingueu en compte que la migració pot <strong>tardar molt de temps,</strong> depenent del nombre de referències que s\'utilitzin, i quina mida tinguin els vostres fitxers. </p>
<p>Podeu executar l\'eina de migració, clicant el botó de sota, o alternativament mitjançant l\'execució de la seqüència de comandaments de l\'script CLI: repositori/boxnet /cli /migrationv1.php. </p>
<p>Esbrineu més coses <a href="{$a->docsurl}">aquí</a>.</p>';
$string['migrationtool'] = 'Eina de migració APIv1 de Box';
$string['nullfilelist'] = 'No hi ha fitxers en aquest repositori';
$string['password'] = 'Contrasenya';
$string['pluginname'] = 'Box';
$string['pluginname_help'] = 'Repositori a Box';
$string['runthemigrationnow'] = 'Executeu ara l\'eina de migració';
$string['saved'] = 'S\'han desat les dades de Box';
$string['shareurl'] = 'Comparteix URL';
$string['username'] = 'Nom d\'usuari de Box';
$string['warninghttps'] = 'Box requereix que el vostre lloc web utilitzi HTTPS perquè funcioni el repositori.';
