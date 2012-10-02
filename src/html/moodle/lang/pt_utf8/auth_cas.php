<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['CASform'] = 'Escolha de autenticação';
$string['accesCAS'] = 'Utilizadores CAS';
$string['accesNOCAS'] = 'outros utilizadores';
$string['auth_cas_auth_user_create'] = 'Criar utilizadores externamente';
$string['auth_cas_baseuri'] = 'URL do servidor (nada se não houver baseUri)<br />Por exemplo, se o servidor CAS responder a servidor.dominio.pt/CAS/ então<br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = 'URL base';
$string['auth_cas_broken_password'] = 'Não pode prosseguir sem modificar a sua senha, no entanto não existe nenhuma página disponível para o fazer. Contacte por favor o Administrador do Moodle.';
$string['auth_cas_cantconnect'] = 'A parte LDAP do módulo CAS não consegue ligar ao servidor.';
$string['auth_cas_casversion'] = 'Versão';
$string['auth_cas_changepasswordurl'] = 'URL para modificar senha\'';
$string['auth_cas_create_user'] = 'Active isto se pretender inserir utilizadores com autenticação CAS na Base de Dados do Moodle. Senão apenas utilizadores que já existam na Base de Dados Moodle poderão autenticar-se.';
$string['auth_cas_create_user_key'] = 'Criar utilizador';
$string['auth_cas_enabled'] = 'Active se quiser utilizar autenticação CAS';
$string['auth_cas_hostname'] = 'Nome do servidor CAS <br />Exemplo: servidor.dominio.pt';
$string['auth_cas_hostname_key'] = 'Nome do servidor';
$string['auth_cas_invalidcaslogin'] = 'Desculpe, a sua entrada falhou - não pode ser autorizado';
$string['auth_cas_language'] = 'Linguagem escolhida';
$string['auth_cas_language_key'] = 'Língua';
$string['auth_cas_logincas'] = 'Ligação de acesso segura';
$string['auth_cas_logoutcas'] = 'Mude isto para \'sim\', se quiser sair do sistema CAS quando sair do Moodle.';
$string['auth_cas_logoutcas_key'] = 'Saída do CAS';
$string['auth_cas_multiauth'] = 'Mude isto para \'sim\', se quiser usar multi-autenticação (CAS + outro método de autenticação)';
$string['auth_cas_multiauth_key'] = 'Multi-autenticação';
$string['auth_cas_port'] = 'Porta do servidor CAS';
$string['auth_cas_port_key'] = 'Porta';
$string['auth_cas_proxycas'] = 'Mude isto para \'sim\', se usar CAS no modo proxy';
$string['auth_cas_proxycas_key'] = 'Modo proxy';
$string['auth_cas_server_settings'] = 'Configuração do servidor CAS';
$string['auth_cas_text'] = 'Ligação segura';
$string['auth_cas_use_cas'] = 'Usar CAS';
$string['auth_cas_version'] = 'Versão do CAS';
$string['auth_casdescription'] = 'Este método utiliza um servidor CAS (Central Authentication Service) para autenticar utilizadores num ambiente SSO (Single Sign On). Também poderá utilizar a autenticação simples LDAP. Se o nome de utilizador e senha forem válidos para o CAS, o Moodle cria uma entrada de novo utilizador na sua Base de Dados, aproveitando os atributos do utilizador do LDAP se necessário. Nas próximas entradas apenas o nome de utilizador e senha serão verificados';
$string['auth_casnotinstalled'] = 'Não pode usar autenticação CAS. O módulo PHP LDAP não está instalado.';
$string['auth_castitle'] = 'Utilize um servidor CAS (SSO)';