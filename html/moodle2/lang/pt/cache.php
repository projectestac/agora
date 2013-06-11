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
 * Strings for component 'cache', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Ações';
$string['addinstance'] = 'Adicionar instância';
$string['addstore'] = 'Adicionar unidade de armazenamento {$a}';
$string['addstoresuccess'] = 'Adicionada com sucesso uma nova unidade de armazenamento de {$a}';
$string['area'] = 'Área';
$string['cacheadmin'] = 'Administração da cache';
$string['cacheconfig'] = 'Configuração';
$string['cachedef_databasemeta'] = 'Meta-informação da base de dados';
$string['cachedef_eventinvalidation'] = 'Invalidação de evento';
$string['cachedef_htmlpurifier'] = 'Purificador HTML - conteúdo limpo';
$string['cachedef_locking'] = 'Bloqueio';
$string['cachedef_questiondata'] = 'Definições da pergunta';
$string['cachedef_string'] = 'Cache do pacote linguístico';
$string['cachelock_file_default'] = 'Bloqueio de ficheiro predefinido';
$string['cachestores'] = 'Unidades de armazenamento de cache';
$string['caching'] = 'Cache';
$string['component'] = 'Componente';
$string['confirmstoredeletion'] = 'Confirmar a remoção da unidade de armazenamento';
$string['default_application'] = 'Unidade de armazenamento predefinida da aplicação';
$string['defaultmappings'] = 'Unidades de armazenamento usadas na ausência de mapeamento';
$string['defaultmappings_help'] = 'Estas são as unidades de armazenamento predefinidas que serão usadas se não mapear uma ou mais unidades de armazenamento para a definição da cache.';
$string['default_request'] = 'Unidade de armazenamento predefinida dos pedidos';
$string['default_session'] = 'Unidade de armazenamento predefinida da sessão';
$string['defaultstoreactions'] = 'As unidades de armazenamento predefinidas não podem ser alteradas';
$string['definition'] = 'Definição';
$string['definitionsummaries'] = 'Definições de cache conhecidas';
$string['delete'] = 'Eliminar';
$string['deletestore'] = 'Eliminar unidade de armazenamento';
$string['deletestoreconfirmation'] = 'Tem a certeza que pretende eliminar a unidade de armazenamento "{$a}"?';
$string['deletestorehasmappings'] = 'Não pode eliminar esta unidade de armazenamento pois contém mapeamentos. Por favor, elimine todos os mapeamentos antes de eliminar a unidade de armazenamento';
$string['deletestoresuccess'] = 'A unidade de armazenamento de cache foi eliminada com sucesso';
$string['editdefinitionmappings'] = 'Definição {$a} do mapeamento da unidade de armazenamento';
$string['editmappings'] = 'Editar mapeamentos';
$string['editstore'] = 'Editar unidade de armazenamento';
$string['editstoresuccess'] = 'A unidade de armazenamento de cache foi editada com sucesso.';
$string['ex_configcannotsave'] = 'Não é possível guardar as configurações da cache em ficheiro';
$string['ex_nodefaultlock'] = 'Não é possível encontrar uma instância de bloqueio predefinida.';
$string['ex_unabletolock'] = 'Não é possível adquirir um bloqueio para a cache.';
$string['ex_unmetstorerequirements'] = 'De momento, não pode utilizar esta unidade de armazenamento. Por favor, consulte a documentação para determinar os seus requisitos.';
$string['gethit'] = 'Get - Hit';
$string['getmiss'] = 'Get - Miss';
$string['invalidplugin'] = 'Módulo inválido';
$string['invalidstore'] = 'A unidade de armazenamento de cache fornecida é inválida';
$string['lockdefault'] = 'Predefinido';
$string['lockmethod'] = 'Método de bloqueio';
$string['lockmethod_help'] = 'Este é o método utilizado quando é requerido um bloqueio para esta unidade de armazenamento';
$string['lockname'] = 'Nome';
$string['locksummary'] = 'Resumo das instâncias de bloqueio da cache';
$string['lockuses'] = 'Utilizações';
$string['mappingdefault'] = '(predefinido)';
$string['mappingfinal'] = 'Unidade de armazenamento final';
$string['mappingprimary'] = 'Unidade de armazenamento primária';
$string['mappings'] = 'Mapeamento da unidade de armazenamento';
$string['mode'] = 'Modo';
$string['mode_1'] = 'Aplicação';
$string['mode_2'] = 'Sessão';
$string['mode_4'] = 'Pedido';
$string['modes'] = 'Modos';
$string['nativelocking'] = 'Este módulo gere o seu próprio bloqueio.';
$string['none'] = 'Nenhum';
$string['plugin'] = 'Módulo';
$string['pluginsummaries'] = 'Cache de unidades de armazenamento instaladas';
$string['purge'] = 'Apagar';
$string['purgestoresuccess'] = 'A unidade de armazenamento requerida foi apagada com sucesso.';
$string['requestcount'] = 'Testar com {$a} pedidos';
$string['rescandefinitions'] = 'Reexaminar definições';
$string['result'] = 'Resultado';
$string['set'] = 'Configurar';
$string['storeconfiguration'] = 'Configuração da unidade de armazenamento';
$string['store_default_application'] = 'Ficheiro predefinido da unidade de armazenamento para caches da aplicação';
$string['store_default_request'] = 'Unidade de armazenamento estática predefinida para cache dos pedidos';
$string['store_default_session'] = 'Sessão de unidade de armazenamento predefinida para cache da sessão';
$string['storename'] = 'Nome da unidade de armazenamento';
$string['storenamealreadyused'] = 'Tem de selecionar um nome único para esta unidade de armazenamento';
$string['storename_help'] = 'Esta opção define o nome da unidade de armazenamento. É utilizado para identificar a unidade de armazenamento associada ao sistema, podendo apenas conter letras minúsculas (a-z), letras maiúsculas (A-Z), números (0-9), travessões (-), traços inferiores (_) e espaços. Esta combinação também tem de ser única. Se tentar utilizar um nome que já foi utilizado, receberá uma notificação de erro.';
$string['storenameinvalid'] = 'Nome da unidade de armazenamento inválido. Só pode usar letras minúsculas (a-z), letras maiúsculas (A-Z), números (0-9), travessões (-), traços inferiores (_) e espaços.';
$string['storenotready'] = 'A unidade de armazenamento de cache não está pronta';
$string['storeperformance'] = 'Relatório de desempenho da unidade de armazenamento da cache - {$a} pedidos únicos por operação.';
$string['storeready'] = 'Pronta';
$string['storerequiresattention'] = 'Requer atenção.';
$string['storerequiresattention_help'] = 'Esta instância de armazenamento não está pronta para ser usada, mas contém mapeamentos. Se corrigir este problema irá melhorar o desempenho do seu sistema. Por favor, verifique se o backend da unidade de armazenamento está pronta para ser usada e que todos os requisitos PHP são cumpridos.';
$string['storeresults_application'] = 'Pedidos da unidade de armazenamento quando usados como  cache da aplicação.';
$string['storeresults_request'] = 'Pedidos da unidade de armazenamento quando usados como cache de pedidos.';
$string['storeresults_session'] = 'Pedidos da unidade de armazenamento quando usados como cache da sessão.';
$string['stores'] = 'Unidades de armazenamento';
$string['storesummaries'] = 'Instâncias da unidade de armazenamento configuradas';
$string['supports'] = 'Suporta';
$string['supports_dataguarantee'] = 'data guarantee';
$string['supports_keyawareness'] = 'key awareness';
$string['supports_multipleidentifiers'] = 'Identificadores múltiplos';
$string['supports_nativelocking'] = 'bloqueio';
$string['supports_nativettl'] = 'ttl';
$string['tested'] = 'Testado';
$string['testperformance'] = 'Teste de desempenho';
$string['unsupportedmode'] = 'Modo não suportado';
$string['untestable'] = 'Não é possível testar';
