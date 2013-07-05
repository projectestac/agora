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
 * Strings for component 'cachestore_file', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_file
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autocreate'] = 'Crea directori automàticament';
$string['autocreate_help'] = 'Si s\'habilita, el directori especificat al camí es crearà de forma automàtica si no existeix.';
$string['path'] = 'Camí a la memòria cau';
$string['path_help'] = 'El directori que serà utilitzat per emmagatzemar fitxers per aquesta memòria cau. Si és deixa en blanc (per defecte) es crearà un directori de forma automàtica al directori de moodledata. Aquest pot utilitzar-se per dirigir el desat de fitxers cap a un directori en un disc de major rendiment (com un en memòria).';
$string['pluginname'] = 'Memòria cau de fitxers';
$string['prescan'] = 'Preescaneja el directori';
$string['prescan_help'] = 'Si s\'habilita, el directori s\'escaneja quan la memòria cau s\'utilitza per primera vegada per cercar fitxers. Això ajuda si teniu un sistema de fitxers lent i trobeu que les operacions de fitxers són un coll d\'ampolla.';
$string['singledirectory'] = 'Emmagatzema en un directori únic';
$string['singledirectory_help'] = 'Si s\'habilita, els fitxers (elements de la memòria cau) s\'emmagatzemaran  en un únic directori en lloc d\'estar dividits en diversos directoris.<br />
Habilitar açò accelerarà les interaccions dels fitxers, però a costa d\'un major risc de colpejar les limitacions del sistema de fitxers.<br /> És recomanable activar aquesta opció si només es compleix el següent: <br /> - Si es coneix que el nombre d\'elements de la memòria cau serà prou petit que no va a causar problemes en el sistema de fitxers que s\'està executant. <br />
 - Les dades que s\'emmagatzemen en memòria cau no són cares de generar. Si açò es compleix llavors escollir l\'opció per defecte és la millor opció per reduir el risc de problemes.';
