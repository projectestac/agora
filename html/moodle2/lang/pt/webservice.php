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
 * Strings for component 'webservice', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   webservice
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessexception'] = 'Exceção de controlo de acesso';
$string['actwebserviceshhdr'] = 'Protocolos de web services disponíveis';
$string['addaservice'] = 'Adicionar serviço';
$string['addcapabilitytousers'] = 'Verificar permissões dos utilizadores';
$string['addcapabilitytousersdescription'] = 'Os utilizadores devem ter duas capacidades - "webservice:createtoken" e uma capacidade correspondente aos protocolos usados (ex: webservice/rest:use, webservice/soap:use). Para fazer esta configuração é necessário criar um papel "web services" com as permissões necessárias e atribuir este papel, no contexto do site, ao utilizador que irá usar os web services.';
$string['addfunction'] = 'Adicionar função';
$string['addfunctionhelp'] = 'Selecionar função a adicionar ao serviço';
$string['addfunctions'] = 'Adicionar funções';
$string['addfunctionsdescription'] = 'Selecione as funções necessárias para o serviço criado.';
$string['addrequiredcapability'] = 'Atribuir/retirar a capacidade necessária';
$string['addservice'] = 'Adicionar um novo serviço: {$a->name} (id: {$a->id})';
$string['addservicefunction'] = 'Adicionar funções ao serviço "{$a}"';
$string['allusers'] = 'Todos os utilizadores';
$string['amftestclient'] = 'Cliente de teste AMF';
$string['apiexplorer'] = 'Explorador da API';
$string['apiexplorernotavalaible'] = 'O explorador da API ainda não está disponível.';
$string['arguments'] = 'Argumentos';
$string['authmethod'] = 'Método de autenticação';
$string['cannotcreatetoken'] = 'Não tem permissões para criar o serviço token para o serviço {$a}.';
$string['cannotgetcoursecontents'] = 'Não é possível obter os conteúdos das disciplinas';
$string['checkusercapability'] = 'Verificar permissões do utilizador';
$string['checkusercapabilitydescription'] = 'O utilizador deve ter as capacidades correspondentes aos protocolos que usar (Ex: webservice/rest:use, webservice/soap:use). Para fazer esta configuração é necessário criar um papel "web services" com as capacidades correspondentes aos protocolos e atribuir este papel, no contexto do site, ao utilizador que irá usar os web services.';
$string['configwebserviceplugins'] = 'Por questões de segurança apenas os protocolos em utilização devem estar ativos.';
$string['context'] = 'Contexto';
$string['createservicedescription'] = 'Um serviço é um conjunto de funções de web service. Será dada permissão ao utilizador para aceder a um novo serviço. Na página <strong>Adicionar serviço</strong> selecione as opções "Ativar" e "Utilizadores autorizados". Selecione "Não são necessárias permissões".';
$string['createserviceforusersdescription'] = 'Um serviço é um conjunto de funções de web service. Será dada permissão ao utilizador para aceder a um novo serviço. Na página <strong>Adicionar serviço</strong> selecione a opção "Ativar" e não selecione a opção "Utilizadores autorizados". Selecione "Não são necessárias permissões".';
$string['createtoken'] = 'Criar um token';
$string['createtokenforuser'] = 'Criar um token para um utilizador';
$string['createtokenforuserdescription'] = 'Criar um token para o utilizador de web services.';
$string['createuser'] = 'Criar um utilizador específico';
$string['createuserdescription'] = 'É necessária a existência de um utilizador de web services para representar o sistema que controla o Moodle.';
$string['criteriaerror'] = 'Faltam permissões para pesquisar sobre um critério.';
$string['default'] = 'Predefinido para "{$a}"';
$string['deleteaservice'] = 'Apagar serviço';
$string['deleteservice'] = 'Apagar o serviço: {$a->name} (id: {$a->id})';
$string['deleteserviceconfirm'] = 'Ao apagar um serviço os tokens relacionados com este serviço serão também apagados.  Tem a certeza de que quer apagar o serviço externo "{$a}"?';
$string['deletetokenconfirm'] = 'Tem a certeza de que quer apagar este token de web service para o utilizador <strong>{$a->user}</strong> no serviço <strong>{$a->service}</strong>?';
$string['disabledwarning'] = 'Todos os protocolos de web service estão desativados. A opção "Ativar web services" localiza-se na secção "Funcionalidades avançadas".';
$string['doc'] = 'Documentação';
$string['docaccessrefused'] = 'Não tem permissão para consultar a documentação deste token';
$string['documentation'] = 'documentação do web service';
$string['downloadfiles'] = 'Pode descarregar ficheiros';
$string['downloadfiles_help'] = 'Se ativar esta opção, qualquer utilizador pode descarregar ficheiros com chaves de segurança. É claro que eles estão restritos aos ficheiros que estão autorizados a descarregar no site.';
$string['editaservice'] = 'Alterar serviço';
$string['editservice'] = 'Alterar o serviço: {$a->name} (id: {$a->id})';
$string['enabled'] = 'Ativo(a)';
$string['enabledocumentation'] = 'Ativar documentação para programadores';
$string['enabledocumentationdescription'] = 'Existe documentação detalhada sobre todos os web services cujos protocolos estiverem ativos.';
$string['enablemobilewsoverview'] = 'Ir para a página de administração {$a->manageservicelink}, verifique a configuração "{$a->enablemobileservice}" e Guarde. Tudo vai ser configurado para si todos os utilizadores do site poderão usar a aplicação do Moodle. Estado atual: {$a->wsmobilestatus}';
$string['enableprotocols'] = 'Ativar protocolos';
$string['enableprotocolsdescription'] = 'Pelo menos um protocolo deve estar ativo. Por questões de segurança apenas protocolos em utilização devem estar ativos.';
$string['enablews'] = 'Ativar web services';
$string['enablewsdescription'] = 'Os web services devem ser ativados na secção "Funcionalidades avançadas".';
$string['entertoken'] = 'Indique uma chave/token de segurança:';
$string['error'] = 'Erro: {$a}';
$string['errorcatcontextnotvalid'] = 'Não pode executar funções no contexto de uma categoria (identificador da categoria: {$a->catid}). Mensagem do erro de contexto: {$a->message}';
$string['errorcodes'] = 'Mensagem de erro';
$string['errorcoursecontextnotvalid'] = 'Não pode executar funções no contexto de uma disciplina (identificador da disciplina: {$a->courseid}). Mensagem do erro de contexto: {$a->message}';
$string['errorinvalidparam'] = 'O parâmetro "{$a}" é inválido.';
$string['errornotemptydefaultparamarray'] = 'O parâmetro de descrição do web service designado por "{$a}" é uma estrutura individual ou múltipla. O valor predefinido tem que ser um array vazio. Consulte a descrição do web service.';
$string['erroroptionalparamarray'] = 'O parâmetro de descrição do web service designado por "{$a}" é uma estrutura indvidual ou múltipla. Não pode ser definido como VALUE_OPTIONAL. Consulte a descrição do web service.';
$string['execute'] = 'Executar';
$string['executewarnign'] = 'AVISO: Se carregar em "Executar" serão realizadas alterações irreversíveis na base de dados!';
$string['externalservice'] = 'Serviço externo';
$string['externalservicefunctions'] = 'Funções do serviço externo';
$string['externalservices'] = 'Serviços externos';
$string['externalserviceusers'] = 'Utilizadores dos serviços externos';
$string['failedtolog'] = 'Não foi possível fazer o registo em log';
$string['filenameexist'] = 'O nome do ficheiro já existe: {$a}';
$string['forbiddenwsuser'] = 'Não é possível criar um token para não confirmados, apagados, suspensos ou utilizadores visitantes.';
$string['function'] = 'Função';
$string['functions'] = 'Funções';
$string['generalstructure'] = 'Estrutura geral';
$string['information'] = 'Informação';
$string['installexistingserviceshortnameerror'] = 'Um web service com o nome curto "{$a}" já existe. Não é possível instalar / atualizar um serviço web diferente com este nome curto.';
$string['installserviceshortnameerror'] = 'Erro de codificação: o serviço com o nome curto "{$a}" deve conter apenas números, letras  e _-.';
$string['invalidextparam'] = 'Parâmetro inválido da API externa: {$a}';
$string['invalidextresponse'] = 'Resposta inválida da API externa: {$a}';
$string['invalidiptoken'] = 'Token inválido - o seu IP não está autorizado';
$string['invalidtimedtoken'] = 'Token inválido - a data do token expirou';
$string['invalidtoken'] = 'Token inválido - o token não foi encontrado';
$string['iprestriction'] = 'Restrição de IP';
$string['iprestriction_help'] = 'O utilizador terá que invocar o web service a partir de um dos endereços de IP da lista.';
$string['key'] = 'Chave';
$string['keyshelp'] = 'As chaves são usadas para aceder à sua conta Moodle a partir de aplicações externas.';
$string['manageprotocols'] = 'Gerir protocolos';
$string['managetokens'] = 'Gerir tokens';
$string['missingcaps'] = 'Permissões em falta';
$string['missingcaps_help'] = 'Lista de permissões necessárias para a utilização do web service que o utilizador não possui. As permissões em falta têm que ser adicionadas ao papel do utilizador para que este possa usar o serviço.';
$string['missingpassword'] = 'Não indicou a senha';
$string['missingrequiredcapability'] = 'É necessária a capacidade {$a}.';
$string['missingusername'] = 'Não indicou o nome de utilizador';
$string['missingversionfile'] = 'Erro de codificação: está em falta o ficheiro version.php no componente {$a}';
$string['mobilewsdisabled'] = 'Desativado';
$string['mobilewsenabled'] = 'Ativado';
$string['nofunctions'] = 'Não existem funções no serviço';
$string['norequiredcapability'] = 'Não é necessária nenhuma capacidade';
$string['notoken'] = 'A lista de tokens está vazia.';
$string['onesystemcontrolling'] = 'Um sistema a controlar o Moodle com um token';
$string['onesystemcontrollingdescription'] = 'Os passos seguintes mostram como configurar os web services para que um sistema possa controlar o Moodle. Estes passos também ajudam a configurar o método para autenticação dos tokens (chaves de segurança).';
$string['operation'] = 'Operação';
$string['optional'] = 'Opcional';
$string['passwordisexpired'] = 'A senha expirou';
$string['phpparam'] = 'XML-RPC (Estrutura PHP)';
$string['phpresponse'] = 'XML-RPC (Estrutura PHP)';
$string['postrestparam'] = 'Código PHP para REST (pedido POST)';
$string['potusers'] = 'Utilizadores não autorizados';
$string['potusersmatching'] = 'Utilizadores não autorizados com as seguintes caraterísticas';
$string['print'] = 'Imprimir todo(a)s';
$string['protocol'] = 'Protocolo';
$string['removefunction'] = 'Remover';
$string['removefunctionconfirm'] = 'Tem a certeza de que quer apagar a função "{$a->function}" do serviço "{$a->service}"?';
$string['requireauthentication'] = 'Este método requer autenticação com a permissão xxx.';
$string['required'] = 'Obrigatória';
$string['requiredcapability'] = 'Capacidade obrigatória';
$string['requiredcapability_help'] = 'Se esta configuração estiver selecionada, apenas os utilizadores que possuam a capacidade obrigatória poderão aceder ao serviço';
$string['requiredcaps'] = 'Permissões obrigatórias';
$string['resettokenconfirm'] = 'Tem a certeza de que quer reiniciar a chave deste web service para o utilizador <strong>{$a->user}</strong> no serviço <strong>{$a->service}</strong>?';
$string['resettokenconfirmsimple'] = 'Tem a certeza de que quer reiniciar esta chave? Todos os links que tiverem sido gravados com a chave antiga deixarão de funcionar.';
$string['response'] = 'Resposta';
$string['restcode'] = 'REST';
$string['restexception'] = 'REST';
$string['restoredaccountresetpassword'] = 'A conta restaurada necessita de uma nova senha antes de gerar um token.';
$string['restparam'] = 'REST (parâmetros POST)';
$string['restrictedusers'] = 'Apenas utilizadores autorizados';
$string['restrictedusers_help'] = 'Esta configuração define se todos os utilizadores que têm permissão para criar um token de web service podem gerar um token para este serviço através da sua página de chaves de segurança ou se essa funcionalidade apenas está disponível para utilizadores autorizados.';
$string['securitykey'] = 'Chave de segurança (token)';
$string['securitykeys'] = 'Chaves de segurança';
$string['selectauthorisedusers'] = 'Selecione os utilizadores autorizados';
$string['selectedcapability'] = 'Selecionados';
$string['selectedcapabilitydoesntexit'] = 'A capacidade "{$a}", atualmente definida como obrigatória, deixou de existir. Esta deve ser alterada e depois gravada a alteração.';
$string['selectservice'] = 'Selecionar um serviço';
$string['selectspecificuser'] = 'Selecionar um utilizador específico';
$string['selectspecificuserdescription'] = 'Adicione o utilizador dos web services como um utilizador autorizado.';
$string['service'] = 'Serviço';
$string['servicehelpexplanation'] = 'Um serviço é um conjunto de funções. Um serviço pode ser acedido por todos os utilizadores ou por apenas um conjunto limitado de utilizadores.';
$string['servicename'] = 'Nome do serviço';
$string['servicenotavailable'] = 'O web service não está disponível (não existe ou pode estar desativado)';
$string['servicesbuiltin'] = 'Serviços base';
$string['servicescustom'] = 'Serviços adicionais';
$string['serviceusers'] = 'Utilizadores autorizados';
$string['serviceusersettings'] = 'Configurações de utilizador';
$string['serviceusersmatching'] = 'Utilizadores autorizados com as seguintes caraterísticas';
$string['serviceuserssettings'] = 'Mudar as configurações dos utilizadores autorizados';
$string['simpleauthlog'] = 'Início de sessão simples';
$string['step'] = 'Passo';
$string['supplyinfo'] = 'Mais detalhes';
$string['testauserwithtestclientdescription'] = 'Simule o acesso externo ao serviço usando o cliente de teste dos web services. Antes disso, deve ser iniciada uma sessão com um utilizador que tenha a permissão "moodle/webservice:createtoken" e obtida a chave de segurança (token) através das configurações na secção "O meu perfil". Este token será usado pelo cliente de teste. No cliente de teste, selecione e ative, com o token de autenticação, um dos protocolos ativos. <strong>AVISO: Os testes devem ser criteriosamente escolhidos porque as funções invocadas no teste serão EFECTIVAMENTE realizadas por este utilizador no sistema.</strong>';
$string['testclient'] = 'Cliente de teste dos web services';
$string['testclientdescription'] = '* O cliente de teste dos web services <strong>EXECUTA EFECTIVAMENTE</strong> as funções. Não devem ser efetuados testes em funções que não se saiba o que fazem. <br/>* Nem todas as funções dos web services estão disponíveis no cliente de teste. <br/>* Para confirmar que um utilizador não pode aceder a algumas funções, podem ser testadas algumas funções para as quais não foram dadas permissões ao utilizador.<br/>* Para obter mensagens de erro mais detalhadas o nível de debug deve ser alterado para <strong>{$a->mode}</strong> em {$a->atag}<br/>* Aceder a {$a->amfatag}.';
$string['testwithtestclient'] = 'Testar o serviço';
$string['testwithtestclientdescription'] = 'Simule o acesso externo ao serviço usando o cliente de teste dos web services. Antes de o fazer, autentique-se com um utilizador com a capacidade moodle/webservice:createtoken e obtenha a chave de segurança (token) via as configurações do Meu perfil. Vai usar este token no cliente de testes. No cliente de teses, selecione também um protocolo com a autenticação token. <strong>AVISO: Os testes devem ser criteriosamente escolhidos porque as funções invocadas no teste serão EFECTIVAMENTE realizadas por este utilizador no sistema.</strong>';
$string['token'] = 'Token';
$string['tokenauthlog'] = 'Token de autenticação';
$string['tokencreatedbyadmin'] = 'Apenas pode ser reiniciado(a) pelo administrador (*)';
$string['tokencreator'] = 'Criador';
$string['unknownoptionkey'] = 'Opção da chave desconhecida ({$a})';
$string['unnamedstringparam'] = 'Um parâmetro da string está anónimo.';
$string['updateusersettings'] = 'Atualizar';
$string['userasclients'] = 'Utilizadores como clientes com token';
$string['userasclientsdescription'] = 'Os passos seguintes mostram como configurar os web services para utilizadores como clientes. Estes passos ajudam também na configuração do método de autenticação das chaves de segurança (tokens) recomendado. Neste caso, o utilizador gerará o seu token a partir da página "Chaves de segurança", disponível nas configurações da página "O meu perfil".';
$string['usermissingcaps'] = 'Capacidades em falta: {$a}';
$string['usernameorid'] = 'Nome de utilizador / id de utilizador';
$string['usernameorid_help'] = 'Insira um nome de utilizador ou id de utilizador';
$string['usernameoridnousererror'] = 'Não foram encontrados utilizadores com esse Nome de utilizador / id de utilizador';
$string['usernameoridoccurenceerror'] = 'Foi encontrado mais que um utilizador com esse nome de utilizador. Por favor insira o id do utilizador.';
$string['usernotallowed'] = 'O utilizador não tem permissão para usar este serviço. Para dar acesso a este utilizador, este deve ser adicionado à lista de utilizadores autorizados na página de administração de "{$a}".';
$string['usersettingssaved'] = 'As configurações do utilizador foram gravadas';
$string['validuntil'] = 'Válido(a) até';
$string['validuntil_help'] = 'Se esta configuração estiver definida, o utilizador ficará impossibilitado de usar este serviço a partir desta data.';
$string['webservice'] = 'Web service';
$string['webservices'] = 'Web services';
$string['webservicesoverview'] = 'Informação geral';
$string['webservicetokens'] = 'Tokens dos web services';
$string['wrongusernamepassword'] = 'Nome de utilizador ou senha inválidos';
$string['wsaccessuserdeleted'] = 'Foi recusado o acesso web service para o utilizador apagado: {$a}';
$string['wsaccessuserexpired'] = 'Foi recusado o acesso web service para o nome de utilizador com a senha expirada: {$a}';
$string['wsaccessusernologin'] = 'Foi recusado o acesso web service para utilizador sem autenticação: {$a}';
$string['wsaccessusersuspended'] = 'Foi recusado o acesso web service para o nome de utilizador suspenso: {$a}';
$string['wsaccessuserunconfirmed'] = 'Foi recusado o acesso web service para o nome de utilizador não confirmado: {$a}';
$string['wsclientdoc'] = 'Documentação do cliente de web services do Moodle';
$string['wsdocapi'] = 'Documentação API';
$string['wsdocumentation'] = 'Documentação dos web services';
$string['wsdocumentationdisable'] = 'A documentação dos web services não está ativa.';
$string['wsdocumentationintro'] = 'Antes de criar um cliente deve consultar a seguinte documentação {$a->doclink}';
$string['wsdocumentationlogin'] = 'ou insira os seus dados de acesso de web service';
$string['wspassword'] = 'Senha de web service';
$string['wsusername'] = 'Nome de utilizador de web service';
