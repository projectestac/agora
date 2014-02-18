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
 * Strings for component 'mnet', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutyourhost'] = 'Informação do servidor';
$string['accesslevel'] = 'Nível de acesso';
$string['addhost'] = 'Adicionar servidor';
$string['addnewhost'] = 'Adicionar um novo servidor';
$string['addtoacl'] = 'Adicionar a controlo de acessos';
$string['allhosts'] = 'Todos os servidores';
$string['allhosts_no_options'] = 'Não há opções disponíveis quando são visualizados vários servidores';
$string['allow'] = 'Permitir';
$string['applicationtype'] = 'Tipo da aplicação';
$string['authfail_nosessionexists'] = 'A autorização falhou: a sessão mnet não existe.';
$string['authfail_sessiontimedout'] = 'A autorização falhou: o tempo da sessão mnet expirou.';
$string['authfail_usermismatch'] = 'A autorização falhou: o utilizador não foi reconhecido.';
$string['authmnetdisabled'] = 'O módulo de autenticação da rede Moodle está <strong>desativado</strong>.';
$string['badcert'] = 'Este certificado não é válido.';
$string['certdetails'] = 'Detalhe do certificado';
$string['configmnet'] = 'A Rede Moodle permite a comunicação entre este servidor e outros servidores e serviços.';
$string['couldnotgetcert'] = 'Não foi encontrado nenhum certificado em <br />{$a}. <br /> O servidor pode estar inacessível ou configurado incorretamente.';
$string['couldnotmatchcert'] = 'Isto não coincide com o certificado atualmente publicado pelo servidor web.';
$string['courses'] = 'disciplinas';
$string['courseson'] = 'disciplinas em';
$string['currentkey'] = 'Chave pública atual';
$string['current_transport'] = 'Transporte atual';
$string['databaseerror'] = 'Não foi possível escrever os detalhes na base de dados.';
$string['deleteaserver'] = 'A eliminar um servidor';
$string['deletedhostinfo'] = 'O servidor foi apagado. De deseja voltar atrás, altere o estado da eliminação para \'Não\'.';
$string['deletedhosts'] = 'Servidores apagados: {$a}';
$string['deletehost'] = 'Eliminar servidor';
$string['deletekeycheck'] = 'Tem a certeza absoluta de que quer apagar esta chave?';
$string['deleteoutoftime'] = 'O intervalo disponível de 60 segundos para apagar esta chave expirou. Reinicie o processo.';
$string['deleteuserrecord'] = 'SSO ACL: apagar registo do utilizador "{$a->user}" de "{$a->host}".';
$string['deletewrongkeyvalue'] = 'Ocorreu um erro. Caso não esteja a tentar eliminar a chave SSL do seu servidor, é possível que esteja a ser alvo de um ataque malicioso. Não foram desencadeadas quaisquer ações.';
$string['deny'] = 'Negar';
$string['description'] = 'Descrição';
$string['duplicate_usernames'] = 'Não foi possível criar um índice nas colunas "mnethostid" e "username" na tabela de utilizadores. <br />Tal pode acontecer quando existem <a href="{$a}" target="_blank"> nomes de utilizadores duplicados nesta tabela.</a>. <br /> A atualização deve, ainda assim, ser concluída com sucesso. Clique na hiperligação acima para receber instruções para a resolução deste problema, numa nova janela. Recomendamos que se ocupe disse apenas depois de concluída a atualização. <br />';
$string['enabled_for_all'] = '(Este serviço foi ativado para todos os servidores).';
$string['enterausername'] = 'Introduza um nome de utilizador, ou uma lista de nomes do utilizador, separados por vírgulas.';
$string['error7020'] = 'Este erro ocorre normalmente quando o site externo criou um registo para o seu site com o wwwroot errado; por exemplo, http://oseusite.com em vez de http://www.oseusite.com. Contacte o administrador do site externo, com o wwwroot correto (está definido em config.php) e peça-lhe para atualizar o registo do seu site.';
$string['error7022'] = 'A mensagem que enviou para o site remoto está devidamente encriptada, mas não está assinada, o que é muito surpreendente. É recomendável que submeta uma informação de bug se tal voltar a acontecer (com o máximo de informação possível sobre as versões Moodle em questão, etc.)';
$string['error7023'] = 'O site externo tentou descodificar a sua mensagem recorrendo a todas as chaves que tem registadas para o seu site. Todas elas falharam. Pode tentar resolver este problema, redefinindo as chaves com o site remoto, manualmente. Este problema não deve acontecer excepto se esteve sem comunicar com o site externo durante alguns meses.';
$string['error7024'] = 'Enviou uma mensagem não encriptada para o site remoto, mas este não aceita mensagens não encriptadas do seu site, o que é surpreendente. É recomendável que submeta uma informação de bug se tal voltar a acontecer (com o máximo de informação possível sobre as versões Moodle em questão, etc.)';
$string['error7026'] = 'A chave utilizada para assinar a sua mensagem é diferente da chave que o servidor remoto tem registada para o seu site. Além disso, o servidor remoto tentou obter a sua chave atual e não conseguiu. Redefina as chaves com o servidor remoto, manualmente, e tente de novo.';
$string['error709'] = 'O site externo falhou na tentativa de obter uma chave SSL do seu site.';
$string['expired'] = 'Esta chave expirou em';
$string['expires'] = 'Válida até';
$string['expireyourkey'] = 'Eliminar esta chave';
$string['expireyourkeyexplain'] = 'O Moodle muda as suas chaves automaticamente a cada 28 dias, mas é possível alterar esta chave <em>manualmente</em> em qualquer altura. Esta funcionalidade deve ser utilizada se houver suspeitas de que a chave em utilização foi comprometida. Será imediatamente gerada uma chave substituta. A eliminação ou alteração da chave impedirá qualquer outro site Moodle de comunicar com este até que cada um dos administradores dos outros servidores tenham acesso à nova chave.';
$string['exportfields'] = 'Campos a exportar';
$string['failedaclwrite'] = 'Não foi possível escrever na lista de controlo de acessos da Rede Moodle para o utilizador "{$a}"';
$string['findlogin'] = 'Encontrar conta de utilizador';
$string['forbidden-function'] = 'Essa função não foi ativada para RPC.';
$string['forbidden-transport'] = 'O método de transporte que está a usar não é permitido.';
$string['forcesavechanges'] = 'Forçar a gravação de alterações';
$string['helpnetworksettings'] = 'Configurar comunicação na Rede Moodle';
$string['hidelocal'] = 'Ocultar utilizadores locais';
$string['hideremote'] = 'Ocultar utilizadores externos';
$string['host'] = 'servidor';
$string['hostcoursenotfound'] = 'O servidor ou disciplina não foi encontrado';
$string['hostdeleted'] = 'Ok - foi eliminado o servidor';
$string['hostexists'] = 'Já existe um registo de um servidor com o nome indicado (o registo pode ser apagado). <a href="{$a}">Clique aqui</a> para alterar o registo.';
$string['hostlist'] = 'Lista de servidores ligados em rede';
$string['hostname'] = 'Nome do servidor';
$string['hostnamehelp'] = 'O nome completo e qualificado do domínio do servidor remoto. Exemplo: www.exemplo.org';
$string['hostnotconfiguredforsso'] = 'Este hub remoto do Moodle não está configurado para autenticação remota.';
$string['hostsettings'] = 'Configurações do servidor';
$string['http_self_signed_help'] = 'Permitir ligações usando um certificado auto-assinado DIY SSL no servidor remoto.';
$string['https_self_signed_help'] = 'Permitir ligações usando DIY SSL auto-assinado, no PHP no servidor remoto sobre http.';
$string['https_verified_help'] = 'Permitir ligações usando um certificado SSL verificado no servidor remoto.';
$string['http_verified_help'] = 'Permitir ligações usando um certificado SSL verificado no PHP no servidor remoto, mas sobre http (não https).';
$string['id'] = 'ID';
$string['idhelp'] = 'Este valor é automaticamente atribuído e não pode ser alterado.';
$string['importfields'] = 'Campos a importar';
$string['inspect'] = 'Analisar';
$string['installnosuchfunction'] = 'Erro no código fonte! Houve uma tentativa de instalar uma função mnet xmlrpc ({$a->method}) a partir de um ficheiro ({$a->file}) e não foi possível encontrar a função!';
$string['installnosuchmethod'] = 'Erro no código fonte! Houve uma tentativa de instalar um método mnet xmlrpc ({$a->method}) numa classe ({$a->class}) e não foi possível encontrar o método!';
$string['installreflectionclasserror'] = 'Erro no código fonte! A introspeção na Rede Moodle falhou no método "{$a->method}" da classe  {$a->class}. A mensagem de erro é: " {$a->error} "';
$string['installreflectionfunctionerror'] = 'Erro no código fonte! A introspeção na Rede Moodle falhou para a função {$a->method} no ficheiro {$a->file}. A mensagem de erro é: " {$a->error} "';
$string['invalidaccessparam'] = 'Parâmetro de acesso inválido.';
$string['invalidactionparam'] = 'Parâmetro de ação inválido.';
$string['invalidhost'] = 'Tem de fornecer um identificador de servidor válido';
$string['invalidpubkey'] = 'Esta chave não é uma chave SSL válida: {$a}';
$string['invalidurl'] = 'Parâmetro inválido de URL.';
$string['ipaddress'] = 'Endereço IP';
$string['is_in_range'] = 'O endereço de IP <code>{$a}</code> representa um servidor válido de confiança.';
$string['ispublished'] = 'O Moodle {$a} disponibiliza este serviço.';
$string['issubscribed'] = 'O Moodle {$a} está a subscrever este serviço neste servidor.';
$string['keydeleted'] = 'A sua chave foi eliminada e substituída com sucesso.';
$string['keymismatch'] = 'A chave pública utilizada neste servidor para o servidor indicado é diferente daquela que esse servidor publica atualmente. A chave disponibilizada pelo servidor atualmente é:';
$string['last_connect_time'] = 'Hora da última ligação';
$string['last_connect_time_help'] = 'Hora da última ligação a este servidor.';
$string['last_transport_help'] = 'Transporte utilizado na última ligação a este servidor.';
$string['leavedefault'] = 'Usar as configurações predefinidas';
$string['listservices'] = 'Listar serviços';
$string['loginlinkmnetuser'] = 'Se é um utilizador externo da Rede Moodle e pode <a href="{$a}">confirmar o seu e-mail</a>, então poderá ser redirecionado para a sua página de autenticação.<br />';
$string['logs'] = 'registos de atividade';
$string['managemnetpeers'] = 'Gerir pares';
$string['method'] = 'Método';
$string['methodhelp'] = 'Ajuda para método em {$a}';
$string['methodsavailableonhost'] = 'Métodos disponíveis em {$a}';
$string['methodsavailableonhostinservice'] = 'Métodos disponíveis para {$a->service} em {$a->host}';
$string['methodsignature'] = 'Assinatura do método para {$a}';
$string['mnet'] = 'Rede Moodle';
$string['mnet_concatenate_strings'] = 'Concatenar (até) 3 strings e devolver o resultado';
$string['mnetdisabled'] = 'A Rede Moodle está <strong>desativada</strong>.';
$string['mnetidprovider'] = 'Fornecedor de identidade para a rede Moodle';
$string['mnetidproviderdesc'] = 'Pode utilizar esta funcionalidade para obter um link para iniciar sessão. Para isso, deverá indicar o e-mail que corresponda aos dados de acesso que utilizou para fazer login.';
$string['mnetidprovidermsg'] = 'Deverá poder autenticar-se no seu fornecedor {$a}.';
$string['mnetidprovidernotfound'] = 'Não foi possível encontrar mais informação.';
$string['mnetlog'] = 'Registos de atividade';
$string['mnetpeers'] = 'Pares';
$string['mnetservices'] = 'Serviços';
$string['mnet_session_prohibited'] = 'Utilizadores do seu servidor doméstico não têm permissão para navegar para $a.';
$string['mnetsettings'] = 'Definições da rede Moodle';
$string['moodle_home_help'] = 'O caminho para a página principal do Moodle no servidor externo. Exemplo: /moodle/';
$string['name'] = 'Nome';
$string['net'] = 'Rede';
$string['networksettings'] = 'Definições da rede';
$string['never'] = 'Nunca';
$string['noaclentries'] = 'Não há entradas na lista de acesso de controlo SSO';
$string['noaddressforhost'] = 'Não foi possível resolver o nome do servidor "{$a}" !';
$string['nocurl'] = 'A extensão cURL do PHP não está instalada';
$string['nolocaluser'] = 'Não existe registo locel para este utilizador externo e este servidor não tem permissões para criar utilizadores. Contacte o administrador!';
$string['nomodifyacl'] = 'Não tem permissão para alterar a lista de controlo de acessos da Rede Moodle.';
$string['nonmatchingcert'] = 'Assunto do certificado: <br /><em>{$a->subject}</em><br /> não coincide com o servidor de origem:<br /><em>{$a->host}</em>.';
$string['nopubkey'] = 'Ocorreu um problema na recuperação da chave pública. <br />Talvez o servidor não permita o acesso da Rede Moodle ou a chave seja inválida.';
$string['nosite'] = 'Não foi possível encontrar disciplinas ao nível do site';
$string['nosuchfile'] = 'O ficheiro/função {$a} não existe.';
$string['nosuchfunction'] = 'Não é possível encontrar a função, ou a função é proibida para RPC.';
$string['nosuchmodule'] = 'A função foi chamada de forma incorreta e não pôde ser localizada.
Use o formato mod/modulename/lib/functionname.';
$string['nosuchpublickey'] = 'Não é possível obter a chave pública para verificação de assinatura.';
$string['nosuchservice'] = 'O serviço RPC não está a correr neste servidor.';
$string['nosuchtransport'] = 'Não existe nenhum transporte com esse ID.';
$string['notBASE64'] = 'Esta string não está com formato de codificação Base64. Não pode ser uma chave válida.';
$string['notenoughidpinfo'] = 'O seu fornecedor de identidade não está a fornecer informação suficiente para que seja possível criar a sua conta localmente.';
$string['not_in_range'] = 'O endereço de IP &nbsp;<code>$a</code>&nbsp; não representa um servidor válido de confiança.';
$string['notinxmlrpcserver'] = 'Tentar aceder ao cliente externo da Rede Moodle, mas não durante a execução XMLRPC do servidor';
$string['notmoodleapplication'] = 'AVISO: Esta não é uma aplicação Moodle, pelo que alguns métodos de inspeção podem não funcionar corretamente.';
$string['notPEM'] = 'Esta chave não pode ser utilizada porque não está em formato PEM.';
$string['notpermittedtojump'] = 'Não tem permissão para começar uma sessão remota a partir deste hub Moodle.';
$string['notpermittedtojumpas'] = 'Não pode começar uma sessão remota enquanto estiver autenticado como outro utilizador.';
$string['notpermittedtoland'] = 'Não tem permissão para começar uma sessão remota.';
$string['off'] = 'Desligado';
$string['on'] = 'Ligado';
$string['options'] = 'Opções';
$string['peerprofilefielddesc'] = 'Esta configuração permite substituir as configurações globais existentes sobre os campos a enviar e a importar quando novos utilizadores são criados';
$string['permittedtransports'] = 'Transportes permitidos';
$string['phperror'] = 'Um erro interno do PHP impediu a satisfação do seu pedido.';
$string['position'] = 'Posição';
$string['postrequired'] = 'A função de apagar requer um pedido POST.';
$string['profileexportfields'] = 'Campos a enviar';
$string['profilefielddesc'] = 'Esta configuração permite definir a lista de campos do perfil que são enviados e recebidos através da Rede Moodle quando as contas de utilizador são criadas ou atualizadas. Além disso, é possível sobrepor esta configuração individualmente para cada par da Rede Moodle. De notar que os campos seguintes são sempre enviados e não são opcionais: {$a}';
$string['profilefields'] = 'Campos do perfil';
$string['profileimportfields'] = 'Campos a importar';
$string['promiscuous'] = 'Promíscuo';
$string['publickey'] = 'Chave pública';
$string['publickey_help'] = 'A chave pública é obtida automaticamente a partir do servidor remoto.';
$string['publickeyrequired'] = 'Deve inserir uma chave pública';
$string['publish'] = 'Publicar';
$string['reallydeleteserver'] = 'Tem a certeza de que quer eliminar o servidor';
$string['receivedwarnings'] = 'Foram recebidos os seguintes avisos';
$string['recordnoexists'] = 'O registo não existe.';
$string['reenableserver'] = 'Não – Selecione esta opção para reativar este servidor.';
$string['registerallhosts'] = 'Registar todos os servidores (modo promíscuo).';
$string['registerallhostsexplain'] = 'É possível registar automaticamente todos os servidores que tentam ligar-se ao site.
Isto significa que será criado um novo registo na lista de servidores por cada site Moodle que se ligar ao site e solicite a chave pública.
<br /> É possível configurar na tabela seguinte serviços para "Todos os servidores" passando a fornecer serviços a qualquer servidor Moodle.';
$string['registerhostsoff'] = 'Registar todos os servidor está <b>Desligado</b>';
$string['registerhostson'] = 'Registar todos os servidor está <b>Ligado</b>';
$string['remotecourses'] = 'Disciplinas externo';
$string['remotehost'] = 'Servidor externo';
$string['remotehosts'] = 'Servidores externos';
$string['remoteuserinfo'] = 'Utilizador externo {$a->remotetype} - perfil obtido a partir de <a href="{$a->remoteurl}">{$a->remotename}</a>';
$string['requiresopenssl'] = 'A rede requer a instalação da extensão OpenSSL do PHP';
$string['restore'] = 'Restaurar';
$string['returnvalue'] = 'Valor de retorno';
$string['reviewhostdetails'] = 'Rever detalhes do servidor';
$string['reviewhostservices'] = 'Rever serviços do servidor';
$string['RPC_HTTP_PLAINTEXT'] = 'HTTP não encriptado';
$string['RPC_HTTP_SELF_SIGNED'] = 'HTTP (auto-assinado)';
$string['RPC_HTTPS_SELF_SIGNED'] = 'HTTPS (auto-assinado)';
$string['RPC_HTTPS_VERIFIED'] = 'HTTPS (assinado)';
$string['RPC_HTTP_VERIFIED'] = 'HTTP (assinado)';
$string['selectaccesslevel'] = 'Selecione um nível de acesso na lista.';
$string['selectahost'] = 'Selecione um servidor Moodle remoto.';
$string['service'] = 'Nome do serviço';
$string['serviceid'] = 'Identificador do serviço';
$string['servicesavailableonhost'] = 'Serviços disponíveis em {$a}';
$string['serviceswepublish'] = 'Serviços publicados para {$a}.';
$string['serviceswesubscribeto'] = 'Serviços {$a} subscritos por este servidor.';
$string['settings'] = 'Configurações';
$string['showlocal'] = 'Mostrar utilizadores locais';
$string['showremote'] = 'Mostrar utilizadores externos';
$string['ssl_acl_allow'] = 'SSO ACL: Permitir utilizador \'{$a->user}\' de \'{$a->host}\'';
$string['ssl_acl_deny'] = 'SSO ACL: Recusar utilizador \'{$a->user}\' de \'{$a->host}\'';
$string['ssoaccesscontrol'] = 'Controlo de acessos SSO';
$string['ssoacldescr'] = 'Esta página permite configurar o acesso de utilizadores específicos provenientes de servidores externos pertencentes à Rede Moodle. Esta configuração é importante quando são  disponibilizados serviços de SSO a utilizadores externos.É possível configurar a capacidade dos utilizadores <em>locais</em> deste site navegarem para outros servidores da rede Moodle utilizando o sistema de papéis para lhes dar a capacidade <em>mnetlogintoremote</em>.';
$string['ssoaclneeds'] = 'Para que esta opção funcione, tem de ter a Rede Moodle ativa, além do módulo de autenticação rede Moodle, com a opção de adicionar utilizadores automaticamente ligada.';
$string['strict'] = 'Rigoroso';
$string['subscribe'] = 'Subscrever';
$string['system'] = 'Sistema';
$string['testclient'] = 'Cliente de teste da Rede Moodle';
$string['testtrustedhosts'] = 'Testar um endereço';
$string['testtrustedhostsexplain'] = 'Introduza um endereço de IP para verificar se se trata de um servidor de confiança.';
$string['theypublish'] = 'Eles publicam';
$string['theysubscribe'] = 'Eles subscrevem';
$string['transport_help'] = 'Estas opções são recíprocas, de modo que só lhe é possível forçar um servidor remoto a usar um certificado SSL assinado, se o seu servidor também o utilizar.';
$string['trustedhosts'] = 'Servidores XML-RPC';
$string['trustedhostsexplain'] = '<p> O mecanismo de servidores de confiança permite que determinadas máquinas executem chamadas através de XML-RPC para qualquer parte da API do Moodle.
Esta opção está disponível para que scripts controlem o comportamento de Moodle e pode ser muito perigoso ativá-la. Se tem dúvidas, mantenha-a desativada.</p>
Esta opção<strong> não</strong> é necessária para o funcionamento da rede Moodle.</p>
<p>Para a ativar, introduza uma lista de endereços ou redes IP, uma em cada linha.
Alguns exemplos: :</p>localhost: :<br />127.0.0.1<br /> localhost (com um bloco de rede)):<br />127.0.0.1/32<br />
Só o servidor com endereço IP 192.168.0.7:<br />192.168.0.7/32<br />
Qualquer servidor com um endereço de IP entre 192.168.0.1 e 192.168.0.255:<br />192.168.0.0/24<br />
Qualquer servidor: <br />192.168.0.0/0<br />
Obviamente, o último exemplo <strong>não</strong> é uma configuração recomendada.';
$string['turnitoff'] = 'Desligar';
$string['turniton'] = 'Ligar';
$string['type'] = 'Tipo';
$string['unknown'] = 'Desconhecido(a)';
$string['unknownerror'] = 'Ocorreu um erro desconhecido durante a negociação.';
$string['usercannotchangepassword'] = 'Não pode alterar a sua senha por ser um utilizador externo.';
$string['userchangepasswordlink'] = '<br />Poderá alterar a sua senha junto do seu <a href="{$a->wwwroot}/login/change_password.php">{$a->description}</a> fornecedor.';
$string['usernotfullysetup'] = 'A sua conta de utilizador está incompleta. Consulte a página do seu <a href="{$a}">fornecedor</a> e certifique-se de que o seu perfil está completo. Pode ser preciso reiniciar a sua sessão para que as alterações tenham efeito.';
$string['usersareonline'] = 'Aviso: {$a} utilizadores desse servidor estão neste momento ligados ao seu site.';
$string['validated_by'] = 'Validado pela rede: <code>{$a}</code>';
$string['verifysignature-error'] = 'A verificação da assinatura falhou. Ocorreu um erro.';
$string['verifysignature-invalid'] = 'A verificação da assinatura falhou.
Este pacote de dados não parece ter a sua assinatura.';
$string['version'] = 'versão';
$string['warning'] = 'Aviso';
$string['wrong-ip'] = 'O seu endereço de IP não coincide com o endereço registado.';
$string['xmlrpc-missing'] = 'A extensão XML-RPC do PHP tem que estar instalada para poder usar esta funcionalidade.';
$string['yourhost'] = 'O seu servidor';
$string['yourpeers'] = 'Os seus pares';
