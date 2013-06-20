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
 * Strings for component 'enrol_database', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_database
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database:unenrol'] = 'Desinscrever utilizadores suspensos';
$string['dbencoding'] = 'Codificação da base de dados';
$string['dbhost'] = 'Servidor de base de dados';
$string['dbhost_desc'] = 'Esta configuração define o endereço IP ou o nome do servidor de base de dados externo.';
$string['dbname'] = 'Nome da base de dados';
$string['dbpass'] = 'Senha de acesso à base de dados';
$string['dbsetupsql'] = 'Comando de configuração da base de dados';
$string['dbsetupsql_desc'] = 'Através desta configuração é possível definir um comando SQL para configurações específicas da base de dados. É usado frequentemente para definir a codificação usada na comunicação. Exemplo para MySQL e PostgreSQL: <em>SET NAMES "utf8"</em>';
$string['dbsybasequoting'] = 'Usar estilo sybase para fazer escaping de plicas';
$string['dbsybasequoting_desc'] = 'Esta configuração é necessária para bases de dados Oracle, MS SQL e outras. Não deve ser usada em bases de dados MySQL.';
$string['dbtype'] = '<em>Driver</em> da base de dados';
$string['dbtype_desc'] = 'Esta configuração define o nome do <em>driver</em> da base de dados ADOdb correspondente ao motor de base de dados externo.';
$string['dbuser'] = 'Utilizador de acesso à base de dados';
$string['debugdb'] = 'Debug do ADOdb';
$string['debugdb_desc'] = 'Se esta configuração for ativada, será feita a análise da ligação do ADOdb à base de dados externa. Esta funcionalidade deve ser utilizada quando surge uma página em branco durante o processo de login. Esta configuração não deve ser usada em sites em produção!';
$string['defaultcategory'] = 'Categoria predefinida para as novas disciplinas criadas';
$string['defaultcategory_desc'] = 'Categoria predefinida para disciplinas criadas autonomamente. Este valor é usado quando tiver especificada uma categoria.';
$string['defaultrole'] = 'Papel predefinido';
$string['defaultrole_desc'] = 'Papel que será atribuído se não houver nenhum definido na tabela externa.';
$string['ignorehiddencourses'] = 'Ignorar disciplinas ocultas';
$string['ignorehiddencourses_desc'] = 'Se esta configuração estiver ativa os utilizadores não serão inscritos em disciplinas que não estiverem disponíveis para alunos.';
$string['localcategoryfield'] = 'Campo da categoria local';
$string['localcoursefield'] = 'Nome do campo "Disciplina" na tabela do Moodle';
$string['localrolefield'] = 'Nome do campo "Papel" na tabela do Moodle';
$string['localuserfield'] = 'Nome do campo "Utilizador" na tabela do Moodle';
$string['newcoursecategory'] = 'Nome do campo "Identificador de categoria de novas disciplinas" na tabela do Moodle';
$string['newcoursefullname'] = 'Nome do campo "Nome completo de nova disciplina" na tabela do Moodle';
$string['newcourseidnumber'] = 'Nome do campo "Identificador de nova disciplina" na tabela do Moodle';
$string['newcourseshortname'] = 'Nome do campo "Nome curto de nova disciplina" na tabela do Moodle';
$string['newcoursetable'] = 'Nome da tabela externa de novas disciplinas';
$string['newcoursetable_desc'] = 'Nome da tabela que contém as disciplinas que devem ser criadas automaticamente. Se este campo estiver vazio, quer dizer que não serão criadas disciplinas.';
$string['pluginname'] = 'Base de dados externa';
$string['pluginname_desc'] = 'Este módulo de inscrição permite a utilização de bases de dados externas (de praticamente qualquer tipo) para gerir inscrições. É obrigatório que a base de dados externa contenha pelo menos os campos identificador de disciplina e identificador de utilizador. Estes campos serão sincronizados com os campos definidos localmente.';
$string['remotecoursefield'] = 'Nome do campo "Disciplina" na tabela externa';
$string['remotecoursefield_desc'] = 'Nome do campo na tabela externa que é usado na sincronização com a tabela de disciplinas do Moodle.';
$string['remoteenroltable'] = 'Nome da tabela externa de inscrições';
$string['remoteenroltable_desc'] = 'Nome da tabela externa que contém as inscrições dos utilizadores. Se este campo estiver vazio as inscrições dos utilizadores não serão sincronizadas,';
$string['remoterolefield'] = 'Nome do campo "Papel" na tabela externa';
$string['remoterolefield_desc'] = 'Nome do campo na tabela externa que é usado na sincronização com a tabela de papéis do Moodle.';
$string['remoteuserfield'] = 'Nome do campo "Utilizador" na tabela externa';
$string['remoteuserfield_desc'] = 'Nome do campo na tabela externa que é usado na sincronização com a tabela de utilizadores do Moodle.';
$string['settingsheaderdb'] = 'Ligação à base de dados externa';
$string['settingsheaderlocal'] = 'Mapeamento local de campos';
$string['settingsheadernewcourses'] = 'Criação de novas disciplinas';
$string['settingsheaderremote'] = 'Sincronização externa de inscrições';
$string['templatecourse'] = 'Modelo para novas disciplinas';
$string['templatecourse_desc'] = 'Opcional: as configurações das disciplinas criadas autonomamente poder ser copiadas de uma outra disciplina já existente. Indique neste campo o nome curto da disciplina a usar como modelo.';
