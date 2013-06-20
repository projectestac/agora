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
 * Strings for component 'auth_cas', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_cas
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesCAS'] = 'Utilizadores CAS';
$string['accesNOCAS'] = 'outros utilizadores';
$string['auth_cas_auth_user_create'] = 'Criar utilizadores externamente';
$string['auth_cas_baseuri'] = 'URL do servidor (vazio se não houver baseUri)<br />Por exemplo, se o servidor CAS responder a servidor.dominio.pt/CAS/ então<br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = 'URI base';
$string['auth_cas_broken_password'] = 'Não pode prosseguir sem modificar a sua senha. No entanto não existe nenhuma página disponível para o fazer. Contacte por favor o Administrador do Moodle.';
$string['auth_cas_cantconnect'] = 'A parte LDAP do módulo CAS não consegue ligar ao servidor: {$a}';
$string['auth_cas_casversion'] = 'Versão do protocolo CAS';
$string['auth_cas_certificate_check'] = 'Definir como "Sim" se se pretender validar o certificado do servidor.';
$string['auth_cas_certificate_check_key'] = 'Validação de servidor';
$string['auth_cas_certificate_path'] = 'Caminho para o ficheiro da cadeia CA (formato PEM) para validação de certificado do servidor';
$string['auth_cas_certificate_path_empty'] = 'Se ativar a validação de servidor terá que indicar o caminho para o certificado';
$string['auth_cas_certificate_path_key'] = 'Caminho para o certificado';
$string['auth_cas_changepasswordurl'] = 'URL para modificação da senha';
$string['auth_cas_create_user'] = 'Ative esta configuração se pretender inserir utilizadores autenticados com CAS na base de dados do Moodle. Se esta configuração estiver desativada, apenas os utilizadores que já existirem na base de dados do Moodle terão acesso ao site.';
$string['auth_cas_create_user_key'] = 'Criar utilizador';
$string['auth_casdescription'] = 'Este método utiliza um servidor CAS (Central Authentication Service) para autenticar utilizadores num ambiente SSO (Single Sign On). Também poderá utilizar a autenticação simples LDAP. Se o nome de utilizador e senha forem validados pelo servidor CAS, o Moodle criará um novo utilizador na sua base de dados, aproveitando os atributos do utilizador do LDAP se necessário. Em acesso futuros do mesmo utilizador apenas o nome de utilizador e senha serão verificados.';
$string['auth_cas_enabled'] = 'Ative esta configuração se pretender utilizar autenticação CAS';
$string['auth_cas_hostname'] = 'Nome do servidor CAS <br />Exemplo: servidor.dominio.pt';
$string['auth_cas_hostname_key'] = 'Nome do servidor';
$string['auth_cas_invalidcaslogin'] = 'Não foi possível validar os seus dados de acesso.';
$string['auth_cas_language'] = 'Idioma selecionado';
$string['auth_cas_language_key'] = 'Idioma';
$string['auth_cas_logincas'] = 'Acesso por ligação segura';
$string['auth_cas_logoutcas'] = 'Ative esta configuração se pretender terminar sessão CAS quando termina sessão Moodle';
$string['auth_cas_logoutcas_key'] = 'Terminar sessão CAS';
$string['auth_cas_logout_return_url'] = 'Forneça o URL para onde os utilizadores autenticados via CAS devem ser redirecionados depois sair. <br /> Se deixar este campo por preencher, os utilizadores serão redirecionados para a localização para onde o Moodle redireciona os utilizadores';
$string['auth_cas_logout_return_url_key'] = 'URL alternativo para redirecionamento depois de sair';
$string['auth_cas_multiauth'] = 'Ative esta configuração se pretender ter autenticações adicionais (CAS e outras)';
$string['auth_cas_multiauth_key'] = 'Autenticações adicionais';
$string['auth_casnotinstalled'] = 'Não pode utilizar o método de autenticação CAS porque o módulo LDAP do PHP não está instalado.';
$string['auth_cas_port'] = 'Porta do servidor CAS';
$string['auth_cas_port_key'] = 'Porta';
$string['auth_cas_proxycas'] = 'Selecione o valor "Sim" se pretender usar CAS no modo proxy';
$string['auth_cas_proxycas_key'] = 'Modo proxy';
$string['auth_cas_server_settings'] = 'Configuração do servidor CAS';
$string['auth_cas_text'] = 'Ligação segura';
$string['auth_cas_use_cas'] = 'Usar CAS';
$string['auth_cas_version'] = 'Versão do protocolo CAS a usar';
$string['CASform'] = 'Escolha do método de autenticação';
$string['noldapserver'] = 'Não existem servidores LDAP configurados para CAS! A sincronização está desativa..';
$string['pluginname'] = 'Servidor CAS (SSO)';
