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
 * Strings for component 'tool_dbtransfer', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clidriverlist'] = 'Controladors de bases de dades disponibles per a la migració';
$string['cliheading'] = 'Migració de la base de dades.  Assegureu-vos que ningú està accedint al servidor durant la migració.';
$string['climigrationnotice'] = 'La migració de la base de dades està en marxa. Espereu fins que la migració s\'hagi completat i l\'administrador del servidor actualitzi la configuració i elimini el fitxer  $CFG->dataroot/climaintenance.html';
$string['convertinglogdisplay'] = 'S\'estan convertint les accions de visualització del registre';
$string['dbexport'] = 'Exportació de la base de dades';
$string['dbtransfer'] = 'Migració de la base de dades';
$string['enablemaintenance'] = 'Habilita el mode de manteniment';
$string['enablemaintenance_help'] = 'Aquesta opció habilita el mode de manteniment durant i després de la migració de la base de dades. Això impedeix l\'accés de tots els usuaris fins que es completi la migració. Teniu en compte que l\'administrador ha d\'eliminar manualment el fitxer $CFG->dataroot/climaintenance.html  després d\'actualitzar els paràmetres del config.php per reprendre el funcionament normal.';
$string['exportdata'] = 'Exporta dades';
$string['notargetconectexception'] = 'Disculpeu. No es pot connectar amb la base de dades.';
$string['options'] = 'Opcions';
$string['pluginname'] = 'Transferència base de dades';
$string['targetdatabase'] = 'Base de dades de destinació';
$string['targetdatabasenotempty'] = 'La base de dades de destinació no pot contenir taules amb el prefix que especifiqueu.';
$string['transferdata'] = 'Transfereix dades';
$string['transferdbintro'] = 'Aquest guió transferirà el contingut sencer de la base de dades a un altre servidor de bases de dades.';
$string['transferdbtoserver'] = 'Transfereix la base de dades de Moodle a un altre servidor.';
$string['transferringdbto'] = 'S\'està transferint la base de dades {$a->dbtypefrom} a la base de dades "{$a->dbname}" de tipus {$a->dbtype} en el servidor "{$a->dbhost}"';
