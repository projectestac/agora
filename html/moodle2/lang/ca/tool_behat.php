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
 * Strings for component 'tool_behat', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_behat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aim'] = 'Aquesta eina d\'administració ajuda els desenvolupadors i creadors de proves a crear els fitxers .feature que descriuen les funcionalitats de Moodle i a executar-ho de forma automàtica.';
$string['allavailablesteps'] = 'Totes les definicions de passos disponibles';
$string['giveninfo'] = 'Donat. Processos per configurar l\'entorn.';
$string['infoheading'] = 'Informació';
$string['installinfo'] = 'Llegeix {$a} per la instal·lació i la informació de les proves d\'execució.';
$string['moreinfoin'] = 'Més informació en {$a}';
$string['newstepsinfo'] = 'Llegeix {$a} per obtindre informació sobre com afegir noves definicions de passos.';
$string['newtestsinfo'] = 'Llegeix {$a} per obtindre informació sobre com escriure proves noves';
$string['nostepsdefinitions'] = 'No hi ha definicions de passos que utilitzin aquests filtres.';
$string['pluginname'] = 'Proves d\'acceptació';
$string['runclitool'] = 'Per llistar les definicions dels passos cal que executeu l\'eina de terminal Behat per crear la carpeta  $CFG->behat_dataroot. Aneu al directori arrel del Moodle i executeu «{$a}»';
$string['stepsdefinitionscomponent'] = 'Àrea';
$string['stepsdefinitionscontains'] = 'Conté';
$string['stepsdefinitionsfilters'] = 'Definicions de passos';
$string['stepsdefinitionstype'] = 'Tipus';
$string['theninfo'] = 'Llavors. Comprovacions per assegurar que els resultats són els esperats.';
$string['unknownexceptioninfo'] = 'Hi ha hagut un problema amb Selenium o amb el navegador. Intenteu actualitzar Selenium a la darrera versió. Error:';
$string['viewsteps'] = 'Filtre';
$string['wheninfo'] = 'Quan. Accions que provoquen un esdeveniment';
$string['wrongbehatsetup'] = 'Alguna cosa funciona malament amb la configuració de «behat», comproveu:
<ul> <li>Heu executat "php admin/tool/behat/cli/init.php" des de la vostre carpeta de root al servidor moodle</li>
<li>El fitxer .../bin/behat té permís d\'execució.</li></ul>';
