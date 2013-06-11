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
 * Strings for component 'dbtransfer', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkingsourcetables'] = 'Comprobando a estrutura da táboa orixe';
$string['copyingtable'] = 'Copiando a táboa {$a}';
$string['copyingtables'] = 'Copiando o contido da táboa';
$string['creatingtargettables'] = 'Creando as táboas na base de datos de destino';
$string['dbexport'] = 'Exportar a base de datos';
$string['dbtransfer'] = 'Transferir a base de datos';
$string['differenttableexception'] = 'A estrutura da táboa {$a} non coincide.';
$string['done'] = 'Feito';
$string['exportschemaexception'] = 'A estrutura da base de datos actual non coincide con todos os ficheiros install.xml. <br /> {$a}';
$string['importschemaexception'] = 'A estrutura da base de datos actual non coincide con todos os ficheiros install.xml. <br /> {$a}';
$string['importversionmismatchexception'] = 'A versión actual {$a->currentver} non coincide coa versión exportada {$a->schemaver}.';
$string['malformedxmlexception'] = 'Atopouse XML mal construído, non é posíbel continuar.';
$string['unknowntableexception'] = 'Atopouse a táboa descoñecida {$a} no ficheiro de exportación.';
