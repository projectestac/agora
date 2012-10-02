<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_mnet_auto_add_remote_users'] = 'Se escolher \"SIM\", será criado automaticamente um registo de utilizador local sempre que um utilizador remoto entrar pela primeira vez.';
$string['auth_mnet_roamin'] = 'Os utilizadores de este sítio podem navegar no seu sítio.';
$string['auth_mnet_roamout'] = 'Os seus utilizadores podem navegar para estes outros servidores';
$string['auth_mnet_rpc_negotiation_timeout'] = 'O tempo em segundos para autenticação sobre o transporte XMLRPC.';
$string['auth_mnetdescription'] = 'Os utilizadores são autenticados de acordo com a rede de confiança estabelecida na sua configuração da Rede Moodle.';
$string['auth_mnettitle'] = 'Autenticação na Rede Moodle';
$string['auto_add_remote_users'] = 'Adicionar automaticamente utilizadores remotos';
$string['rpc_negotiation_timeout'] = 'Expirou o tempo de negociação RPC';
$string['sso_idp_description'] = 'Publicas este serviço para permitir ao utilizador navegar para o $a site Moodle sem ter que voltar a fazer login.
<ul><li><em> Dependência </em>: Tem também que <strong> subscrever </strong> para o serviço SSO (Fornecedor de Serviço) em $a. </li></ul><br /> Subscreva este serviço para permitir que utilizadores autenticados de $a acedam ao site sem ter que fazer novo login. 
<ul><li><em> Dependência </em>: Também que <strong> publicar </strong> o serviço SSO (Fornecedor de Serviço) $a. </li></ul><br />.';
$string['sso_idp_name'] = 'SSO (Fornecedor de Identidade)';
$string['sso_mnet_login_refused'] = 'Nome de utilizador $a[0] não é permitido para entrar a partir $a[1]';
$string['sso_sp_description'] = 'Publicar este serviço para permitir que utilizadores autenticados de $a acedam ao site sem ter que fazer novo login.
<ul><li><em> Dependência </em>: tem também que <strong> subscrever </strong> o serviço SSO (Fornecedor de Identidade) em $a. </li></ul><br /> Subscreva este serviço para permitir que os utilizadores navegar para o $a site Moodle sem ter que fazer novo login.
<ul><li><em> Dependência </em>: Também que <strong> publicar </strong> o serviço SSO (Fornecedor de Identidade) $a. </li></ul><br />.';
$string['sso_sp_name'] = 'SSO (Fornecedor de SErviço)';