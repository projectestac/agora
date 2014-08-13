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
 * Strings for component 'cachestore_memcache', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_memcache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Memcache';
$string['prefix'] = 'Prefixo da chave';
$string['prefix_help'] = 'Este prefixo é usado para todos os nomes de chave no servidor memcache.

*Se só tiver uma instância Moodle a usar este servidor, pode deixar este valor configurado por predefinição.

*Devido às restrições de extensão da chave, é permitido um máximo de 5 caracteres.';
$string['prefixinvalid'] = 'Prefixo inválido. Pode usar apenas a-z A-Z 0-9-_.';
$string['servers'] = 'Servidores';
$string['servers_help'] = 'Isto define os servidores que devem ser utilizados por este adaptador de memcache. Os servidores devem ser definidos um por cada linha e constituídos por um endereço de servidor e, opcionalmente, uma porta e peso.
Se nenhuma porta for fornecida será utilizada a porta padrão (11211).

Por exemplo:<pre>
server.url.com
ipaddress:port
servername:port:weight
</pre>';
$string['sessionhandlerconflict'] = 'Aviso: uma instância de memcache ({$a}) foi configurada para usar o mesmo servidor de memcache que as sessões. Apagar o conteúdo de todas as caches fará com que também sejam apagadas as sessões.';
$string['testservers'] = 'Servidores de teste';
$string['testservers_desc'] = 'Os servidores de teste são usados para testes de unidade e testes de desempenho. É inteiramente opcional configurar servidores de teste. Os servidores devem ser definidos um por linha e constituídos por um endereço de servidor e, opcionalmente, uma porta e peso. Se nenhuma porta for fornecida será utilizada a porta predefinida (11211).';
