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
 * Strings for component 'cachestore_mongodb', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_mongodb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database'] = 'Base de Dados';
$string['database_help'] = 'Nome da Base de Dados a utilizar';
$string['extendedmode'] = 'Usar chaves alargadas';
$string['extendedmode_help'] = 'Se ativado, serão usados conjuntos de chaves completos quando se trabalha com o plugin. Isto não é usado internamente, mas permite pesquisar e investigar manualmente o plugin MongoDB, se assim pretender. Ativar isto irá adicionar uma pequena sobrecarga, o que só deve ser feito se for de facto necessário.';
$string['password'] = 'Senha';
$string['password_help'] = 'Senha do utilizador a ser usada para a ligação';
$string['pluginname'] = 'MongoDB';
$string['replicaset'] = 'Conjunto de réplicas';
$string['replicaset_help'] = 'O nome do conjunto de réplicas definido para se conectar. Se este nome for atribuído, o master será determinado utilizando o comando de dados ismaster nas seeds, para que a driver possa parar de ligar a um servidor que nem sequer foi listado.';
$string['server'] = 'Servidor';
$string['server_help'] = 'Esta é a string de conexão para o servidor que pretende utilizar. Podem ser especificados múltiplos servidores ao serpará-los por vírgulas.';
$string['testserver'] = 'Servidor de teste';
$string['testserver_desc'] = 'Esta é a string de conexão para o servidor de teste que pretende utilizar. Os servidores de teste são inteiramente opcionais. Ao especificar um servidor de teste é possível correr unidades de teste de PHP para este armazenamento, bem como testes de desempenho.';
$string['username'] = 'Nome de utilizador';
$string['username_help'] = 'Nome de utilizador a usar quando se estabelecer uma ligação.';
$string['usesafe'] = 'Utilização segura';
$string['usesafe_help'] = 'Se ativada, a opção de utilização segura será usada para inserir, obter e remover operações. Se tiver especificado um conjunto de replicas, isto será forçado de qualquer forma.';
$string['usesafevalue'] = 'Utilização de valores seguros';
$string['usesafevalue_help'] = 'Pode optar por fornecer um valor específico para utilização segura. Isto vai determinar o número de servidores que as operçãoes devem completar antes serem consideradas completas.';
