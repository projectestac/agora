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
 * Strings for component 'cache', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Ações';
$string['addinstance'] = 'Adicionar instância';
$string['addlocksuccess'] = 'Uma nova instância de bloqueio foi adicionada com sucesso.';
$string['addnewlockinstance'] = 'Adicionar uma nova instância de bloqueio';
$string['addstore'] = 'Adicionar unidade de armazenamento {$a}';
$string['addstoresuccess'] = 'Adicionada com sucesso uma nova unidade de armazenamento de {$a}';
$string['area'] = 'Área';
$string['cacheadmin'] = 'Administração da cache';
$string['cacheconfig'] = 'Configuração';
$string['cachedef_calendar_subscriptions'] = 'Subscrições do calendário';
$string['cachedef_config'] = 'Configurar definições';
$string['cachedef_coursecat'] = 'Listas de categorias de disciplina para um utilizador em particular';
$string['cachedef_coursecatrecords'] = 'Registos de categorias da disciplina';
$string['cachedef_coursecattree'] = 'Árvore de categorias de disciplina';
$string['cachedef_coursecontacts'] = 'Lista de contactos da disciplina';
$string['cachedef_coursemodinfo'] = 'Informação acumulada sobre módulos e secções para cada disciplina';
$string['cachedef_databasemeta'] = 'Meta-informação da base de dados';
$string['cachedef_eventinvalidation'] = 'Invalidação de evento';
$string['cachedef_externalbadges'] = 'Medalhas externas para um utilizador em particular';
$string['cachedef_gradecondition'] = 'Notas de utilizadores armazenadas em cache para avaliar a disponibilidade condicional';
$string['cachedef_groupdata'] = 'Informação de grupos da disciplina';
$string['cachedef_htmlpurifier'] = 'Purificador HTML - conteúdo limpo';
$string['cachedef_langmenu'] = 'Lista de idiomas disponíveis';
$string['cachedef_locking'] = 'Bloqueio';
$string['cachedef_navigation_expandcourse'] = 'Disciplinas expansíveis no bloco Navegação';
$string['cachedef_observers'] = 'Observadores de eventos';
$string['cachedef_plugin_manager'] = 'Plugin de gestão de informação';
$string['cachedef_questiondata'] = 'Definições da pergunta';
$string['cachedef_repositories'] = 'Dados de instância de repositórios';
$string['cachedef_string'] = 'Cache do pacote linguístico';
$string['cachedef_suspended_userids'] = 'Lista de utilizadores suspensos por curso';
$string['cachedef_userselections'] = 'Dados usados para fazer prevalecer as seleções do utilizador em todo o Moodle';
$string['cachedef_yuimodules'] = 'Definições do Módulo YUI';
$string['cachelock_file_default'] = 'Bloqueio de ficheiro predefinido';
$string['cachestores'] = 'Unidades de armazenamento de cache';
$string['caching'] = 'Cache';
$string['component'] = 'Componente';
$string['confirmlockdeletion'] = 'Confirmar eliminação de bloqueio';
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
$string['deletelock'] = 'Eliminar bloqueio';
$string['deletelockconfirmation'] = 'Tem a certeza de que pretende eliminar o bloqueio {$a}?';
$string['deletelockhasuses'] = 'Não pode eliminar esta instância de bloqueio porque a mesma está a ser usada por uma ou mais unidades de armazenamento.';
$string['deletelocksuccess'] = 'O bloqueio foi eliminado com sucesso.';
$string['deletestore'] = 'Eliminar unidade de armazenamento';
$string['deletestoreconfirmation'] = 'Tem a certeza que pretende eliminar a unidade de armazenamento "{$a}"?';
$string['deletestorehasmappings'] = 'Não pode eliminar esta unidade de armazenamento pois contém mapeamentos. Por favor, elimine todos os mapeamentos antes de eliminar a unidade de armazenamento';
$string['deletestoresuccess'] = 'A unidade de armazenamento de cache foi eliminada com sucesso';
$string['editdefinitionmappings'] = 'Definição {$a} do mapeamento da unidade de armazenamento';
$string['editdefinitionsharing'] = 'Editar definição de partilha para {$a}';
$string['editmappings'] = 'Editar mapeamentos';
$string['editsharing'] = 'Editar partilha';
$string['editstore'] = 'Editar unidade de armazenamento';
$string['editstoresuccess'] = 'A unidade de armazenamento de cache foi editada com sucesso.';
$string['ex_configcannotsave'] = 'Não é possível guardar as configurações da cache em ficheiro';
$string['ex_nodefaultlock'] = 'Não é possível encontrar uma instância de bloqueio predefinida.';
$string['ex_unabletolock'] = 'Não é possível adquirir um bloqueio para a cache.';
$string['ex_unmetstorerequirements'] = 'De momento, não pode utilizar esta unidade de armazenamento. Por favor, consulte a documentação para determinar os seus requisitos.';
$string['gethit'] = 'Get - Hit';
$string['getmiss'] = 'Get - Miss';
$string['inadequatestoreformapping'] = 'Esta unidade de armazenamento não cumpre com os requisitos para todas as definições. Às definições para as quais esta unidade de armazenamento se revela inadequada será atribuída a unidade original por predefinição em vez da unidade selecionada.';
$string['invalidlock'] = 'Bloqueio inválido';
$string['invalidplugin'] = 'Módulo inválido';
$string['invalidstore'] = 'A unidade de armazenamento de cache fornecida é inválida';
$string['lockdefault'] = 'Predefinido';
$string['lockingmeans'] = 'Mecanismo de bloqueio';
$string['lockmethod'] = 'Método de bloqueio';
$string['lockmethod_help'] = 'Este é o método utilizado quando é requerido um bloqueio para esta unidade de armazenamento';
$string['lockname'] = 'Nome';
$string['locknamedesc'] = 'O nome tem de ser único e apenas pode consistir nos caracteres: a-z A-Z_';
$string['locknamenotunique'] = 'O nome que selecionou não é único. Por favor, selecione um nome único.';
$string['locksummary'] = 'Resumo das instâncias de bloqueio da cache';
$string['locktype'] = 'Tipo';
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
$string['purgedefinitionsuccess'] = 'A definição requerida foi eliminada com sucesso.';
$string['purgestoresuccess'] = 'A unidade de armazenamento requerida foi apagada com sucesso.';
$string['requestcount'] = 'Testar com {$a} pedidos';
$string['rescandefinitions'] = 'Reexaminar definições';
$string['result'] = 'Resultado';
$string['set'] = 'Configurar';
$string['sharing'] = 'Partilha';
$string['sharing_all'] = 'Todos.';
$string['sharing_help'] = 'Isto permite-lhe determinar como os dados da cache podem ser partilhados se tiver uma instalação em cluster, ou se tiver múltiplos sites configurados com a mesma unidade de armazenamento e quiser partilhar os dados. Esta é uma configuração avançada, por favor assegure-se que compreende a sua finalidade antes de a alterar.';
$string['sharing_input'] = 'Chave personalizada (inserida abaixo)';
$string['sharingrequired'] = 'Deve selecionar pelo menos uma opção de partilha.';
$string['sharingselected_all'] = 'Todos.';
$string['sharingselected_input'] = 'Chave personalizada';
$string['sharingselected_siteid'] = 'Identificador do site';
$string['sharingselected_version'] = 'Versão';
$string['sharing_siteid'] = 'Sites com o mesmo número de identificação de site.';
$string['sharing_version'] = 'Sites a correr na mesma versão.';
$string['storeconfiguration'] = 'Configuração da unidade de armazenamento';
$string['store_default_application'] = 'Ficheiro predefinido da unidade de armazenamento para caches da aplicação';
$string['store_default_request'] = 'Unidade de armazenamento estática predefinida para cache dos pedidos';
$string['store_default_session'] = 'Sessão de unidade de armazenamento predefinida para cache da sessão';
$string['storename'] = 'Nome da unidade de armazenamento';
$string['storenamealreadyused'] = 'Tem de selecionar um nome único para esta unidade de armazenamento';
$string['storename_help'] = 'Isto define o nome da unidade de armazenamento. Este nome é usado para identificar a unidade de armazenamento no sistema e apenas pode consistir em a-z A-Z 0-9-_ e espaços. Também deve ser único. Se tentar usar um nome que já esteja a ser usado será notificado com uma mensagem de erro.';
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
$string['supports_searchable'] = 'a procurar por chave';
$string['tested'] = 'Testado';
$string['testperformance'] = 'Teste de desempenho';
$string['unsupportedmode'] = 'Modo não suportado';
$string['untestable'] = 'Não é possível testar';
$string['userinputsharingkey'] = 'Chave personalizada para partilhar';
$string['userinputsharingkey_help'] = 'Insira aqui a sua chave privada. Quando configurar outras unidades de armazenamento noutros sites com os quais pretende partilhar dados, certifique-se que define exatamente a mesma chave.';
