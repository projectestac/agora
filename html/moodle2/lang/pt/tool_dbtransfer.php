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
 * Strings for component 'tool_dbtransfer', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clidriverlist'] = 'Módulos de base de dados disponíveis para migração';
$string['cliheading'] = 'Migração da base de dados - assegures-se que ninguém está a aceder ao servidor durante a migração';
$string['climigrationnotice'] = 'Migração de base de dados em curso, espere por favor que a migração termine, o administrador atualize as configurações e apague o ficheiro $CFG->dataroot/climaintenance.html';
$string['convertinglogdisplay'] = 'A converter as ações do';
$string['dbexport'] = 'Exportação da base de dados';
$string['dbtransfer'] = 'Migração da base de dados';
$string['enablemaintenance'] = 'Ativar modo de manutenção';
$string['enablemaintenance_help'] = 'Esta opção ativa o modo de manutenção durante e depois da migração da base de dados, prevenindo o acesso dos utilizadores até a migração estar completa. Por favor note que o administrador tem que apagar manualmente o ficheiro $CFG->dataroot/climaintenance.html depois de atualizar as configurações em config.php para o funcionamento voltar ao normal';
$string['exportdata'] = 'Exportar dados';
$string['notargetconectexception'] = 'Não é possível ligar à base de dados.';
$string['options'] = 'Opções';
$string['pluginname'] = 'Transferir da base de dados';
$string['targetdatabase'] = 'Base de dados alvo';
$string['targetdatabasenotempty'] = 'A base de dados alvo não pode conter nenhuma tabela com o prefixo definido';
$string['transferdata'] = 'Transferir dados';
$string['transferdbintro'] = 'Este script irá transferir todo o conteúdo desta base de dados para outro servidor. É usado para migrar dados para um tipo diferente de base de dados.';
$string['transferdbtoserver'] = 'Transferir a base de dados Moodle para outro servidor';
$string['transferringdbto'] = 'A transferir esta base de dados {$a->dbtypefrom} para a base de dados {$a->dbtype} {$a->dbname} em {$a->dbhost}';
