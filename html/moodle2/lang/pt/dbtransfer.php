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
 * Strings for component 'dbtransfer', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkingsourcetables'] = 'A verificar estrutura da tabela de origem';
$string['copyingtable'] = 'A copiar tabela {$a}';
$string['copyingtables'] = 'A copiar o conteúdo da tabela';
$string['creatingtargettables'] = 'A criar as tabelas na base de dados de destino';
$string['dbexport'] = 'Exportação da base de dados';
$string['dbtransfer'] = 'Transferência da base de dados';
$string['differenttableexception'] = 'A estrutura da tabela {$a} não corresponde';
$string['done'] = 'Concluído(a)';
$string['exportschemaexception'] = 'A estrutura atual da base de dados não corresponde a todos os ficheiros install.xml. <br /> {$a}';
$string['importschemaexception'] = 'A estrutura atual da base de dados não corresponde a todos os ficheiros install.xml. <br /> {$a}';
$string['importversionmismatchexception'] = 'A versão atual {$a->currentver} não corresponde à versão exportada {$a->schemaver}.';
$string['malformedxmlexception'] = 'Foi encontrado um erro no XML, não é possível continuar.';
$string['unknowntableexception'] = 'Foi encontrada uma tabela desconhecida {$a} no ficheiro de exportação.';
