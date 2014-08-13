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
 * Strings for component 'report_security', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   report_security
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_configrw_details'] = '<p>É recomendado que as permissões do ficheiro <strong>config.php</strong> sejam alteradas depois da instalação do Moodle para que este não possa ser posteriormente modificado pelo servidor web.
Note-se que esta medida não melhora significativamente a segurança do servidor, mas permite dificultar a exploração de algumas vulnerabilidades.</p>';
$string['check_configrw_name'] = 'Permissões de escrita do ficheiro <strong>config.php</strong>';
$string['check_configrw_ok'] = 'O ficheiro <strong>config.php</strong> não pode ser alterado por scripts PHP.';
$string['check_configrw_warning'] = 'O ficheiro <strong>config.php</strong> pode ser alterado por scripts PHP.';
$string['check_cookiesecure_details'] = '<p>Se a comunicação HTTPS for ativada a utilização de cookies seguras deve também ser ativada. Além disso, deve também ser configurado o redireccionamento permanente de HTTP para HTTPS.</p>';
$string['check_cookiesecure_error'] = 'A utilização de cookies seguras não está ativa.';
$string['check_cookiesecure_name'] = 'Cookies seguras';
$string['check_cookiesecure_ok'] = 'A utilização de cookies seguras está ativa.';
$string['check_defaultuserrole_details'] = '<p>As capacidades do papel predefinido são atribuídas a todos os utilizadores autenticados. Por isso, assegure-se que não são atribuídas capacidades com riscos a este papel.</p>
<p>O único papel retrocompatível (usado em versões anteriores do Moodle) que pode ser usado com o papel de utilizador predefinido é <strong>Utilizador autenticado</strong>. A permissão para ver disciplinas não deve ser concedida.</p>';
$string['check_defaultuserrole_error'] = 'O papel "{$a}", a atribuir automaticamente a todos os utilizadores autenticados, não está configurado corretamente!';
$string['check_defaultuserrole_name'] = 'Papel a atribuir a todos os utilizadores autenticados';
$string['check_defaultuserrole_notset'] = 'Não foi definido nenhum parpel para ser atribuído automaticamente a todos os utilizadores autenticados';
$string['check_defaultuserrole_ok'] = 'O papel a atribuir automaticamente a todos os utilizadores autenticados está configurado corretamente.';
$string['check_displayerrors_details'] = '<p>A ativação da configuração <strong>display_errors</strong> do PHP não é recomendada para sites em produção porque as mensagens de erro apresentadas podem revelar informações que ponham em causa a segurança do servidor. Esta configuração é definida no ficheiro <strong>php.ini</strong>.</p>';
$string['check_displayerrors_error'] = 'A configuração <strong>display_errors</strong> do PHP não deve estar ativa.';
$string['check_displayerrors_name'] = 'Apresentação de erros PHP';
$string['check_displayerrors_ok'] = 'A apresentação de erros PHP não está ativa.';
$string['check_emailchangeconfirmation_details'] = '<p>É recomendado que se envie um e-mail de confirmação aos utilizadores que mudam o endereço de e-mail registado no seu perfil. Se esta configuração estiver desativada, este facto pode ser utilizado para envio de spam.</p>
<p>Adicionalmente o campo <strong>E-mail</strong> pode ser bloqueado ao nível dos módulos de autenticação. Esta possibilidade não é considerada aqui.</p>';
$string['check_emailchangeconfirmation_error'] = 'Os utilizadores podem indicar qualquer endereço de e-mail, não sendo feita qualquer restrição ao nível de domínios permitidos/bloqueados.';
$string['check_emailchangeconfirmation_info'] = 'Os utilizadores apenas podem indicar endereços de e-mail que estejam na lista de domínios permitidos.';
$string['check_emailchangeconfirmation_name'] = 'Confirmação de mudança de e-mail';
$string['check_emailchangeconfirmation_ok'] = 'É enviado um e-mail de confirmação sempre que o utilizador altera o e-mail registado no seu perfil.';
$string['check_embed_details'] = '<p>A incorporação de objetos sem restrições levanta questões graves de segurança. Qualquer utilizador registado pode realizar um ataque XSS contra outros utilizadores. Esta configuração deve estar desativada em servidores de produção.</p>';
$string['check_embed_error'] = '<p>A configuração de incorporação de objetos sem restrições está ativa. Esta configuração levanta problemas de segurança graves na maioria dos servidores.</p>';
$string['check_embed_name'] = 'Permitir conteúdos incorporados e OBJECT';
$string['check_embed_ok'] = 'Conteúdos incorporados e OBJECT ilimitados';
$string['check_frontpagerole_details'] = '<p>O papel predefinido para a página de entrada é atribuídos a todos os utilizadores no contexto das atividades da página de entrada.  Por isso, não devem ser atribuídas permissões a este papel que ponham em risco o site.</p>
<p>É recomendado que se crie um papel especificamente para este contexto e que não seja usado nenhum dos papéis retrocompatíveis (usados por versões anteriores do Moodle).</p>';
$string['check_frontpagerole_error'] = 'O papel "{$a}", definido para a página de entrada, está configurado incorretamente!';
$string['check_frontpagerole_name'] = 'Papel para a página de entrada';
$string['check_frontpagerole_notset'] = 'Não foi definido nenhum papel para a página de entrada.';
$string['check_frontpagerole_ok'] = 'O papel definido para a página de entrada está configurado corretamente.';
$string['check_globals_details'] = '<p>A configuração <strong>Register globals</strong> do PHP é considerada muito insegura.</p>
<p>Deve ser definida a configuração <strong>register_globals=off</strong> no ficheiro de configuração do PHP. Este parâmetro é definido no ficheiro <strong>php.ini</strong>, na configuração do servidor web (Apache, IIS, etc.) ou no ficheiro <strong>.htaccess</strong>.</p>';
$string['check_globals_error'] = 'A configuração <code>Register globals</code> deve estar DESATIVADA. Deve alterar esta configuração imediatamente!';
$string['check_globals_name'] = 'Parâmetro <strong>Register globals</strong>';
$string['check_globals_ok'] = 'A configuração <strong>Register globals</strong> do PHP não deve estar ativa.';
$string['check_google_details'] = '<p>A configuração <strong>Permitir acesso Google</strong> disponibiliza aos motores de busca o acesso às disciplinas que dão acesso a visitantes. Não faz sentido ativar esta configuração se o site não permitir o acesso de visitantes.</p>';
$string['check_google_error'] = 'É permitido o acesso pelos motores de busca mas o acesso de visitantes não está ativo. Com esta configuração, os motores não terão acesso a nenhuma disciplina no site.';
$string['check_google_info'] = 'Os motores de busca podem aceder como visitantes.';
$string['check_google_name'] = 'Permitir acesso Google';
$string['check_google_ok'] = 'O acesso ao site por motores de busca não deve ativo.';
$string['check_guestrole_details'] = '<p>O papel de visitante é usado por visitantes, utilizadores sem sessão ativa e utilizadores com acesso temporário de visitante às disciplinas. Por isso, não devem ser atribuídas permissões a este papel que ponham em risco o site.</p>
<p>O único papel retrocompatível (usado em versões anteriores do Moodle) que pode ser usado com o papel de visitante é <strong>Visitante</strong>.</p>';
$string['check_guestrole_error'] = 'O papel de visitante "{$a}" está configurado incorretamente!';
$string['check_guestrole_name'] = 'Papel de visitante';
$string['check_guestrole_notset'] = 'Não foi definido nenhum papel de visitante.';
$string['check_guestrole_ok'] = 'O papel de visitante está configurado corretamente.';
$string['check_mediafilterswf_details'] = '<p>A incorporação automática de conteúdo SWF (Flash) levanta questões graves de segurança. Qualquer utilizador registado pode realizar um ataque XSS contra outros utilizadores. Esta configuração deve estar desativada em servidores de produção.</p>';
$string['check_mediafilterswf_error'] = 'O filtro de conteúdo Flash está ativo. Esta configuração levanta problemas de segurança graves na maioria dos servidores.';
$string['check_mediafilterswf_name'] = 'Filtro de conteúdos SWF (Flash)';
$string['check_mediafilterswf_ok'] = 'O filtro de conteúdo Flash não está ativo.';
$string['check_noauth_details'] = '<p>O módulo de autenticação <strong>Sem autenticação</strong> não deve ser usado em sites em produção. Desative esta configuração se não se tratar de um site em desenvolvimento.</p>';
$string['check_noauth_error'] = 'O módulo de autenticação <strong>Sem autenticação</strong> não deve ser usado em sites em produção.';
$string['check_noauth_name'] = 'Módulo de autenticação <strong>Sem autenticação</strong>';
$string['check_noauth_ok'] = 'O módulo de autenticação <strong>Sem autenticação</strong> não está ativo.';
$string['check_openprofiles_details'] = '<p>Os perfis de utilizador que permitem acesso público podem ser utilizados de forma abusiva por <em>spammers</em>. É recomendado ativar a configuração <code>Apenas utilizadores autenticados podem aceder a perfis de outros utilizadores</code> ou <code>Apenas utilizadores autenticados podem aceder ao site</code>.</p>';
$string['check_openprofiles_error'] = 'Os perfis dos utilizadores do Moodle podem ser consultados por utilizadores não autenticados.';
$string['check_openprofiles_name'] = 'Acesso aos perfis dos utilizadores';
$string['check_openprofiles_ok'] = 'Apenas utilizadores autenticados podem aceder aos perfis dos utilizadores do Moodle.';
$string['check_passwordpolicy_details'] = '<p>É recomendado que se definam regras para as senhas, uma vez que a descoberta de senhas por tentativa e erro é uma das técnicas mais utilizadas para aceder de forma não autorizada a contas de utilizador.
No entanto, não devem ser definidas regras demasiado exigentes, para que os utilizadores não tenham dificuldade em memorizar as suas senhas.</p>';
$string['check_passwordpolicy_error'] = 'Devem ser definidas regras para as palavras-chaves.';
$string['check_passwordpolicy_name'] = 'Regras para as senhas';
$string['check_passwordpolicy_ok'] = 'Estão definidas regras para as palavras-chaves.';
$string['check_riskadmin_detailsok'] = '<p>Verifique a lista de administradores do sistema:</p>{$a}';
$string['check_riskadmin_detailswarning'] = '<p>Verifique a lista de administradores do sistema:</p>{$a->admins}
<p>É recomendado que o papel de administrador apenas seja atribuído no contexto de sistema. Os seguintes utilizadores têm o papel de administrador  em outros contextos (não aconselhado):</p>{$a->unsupported}';
$string['check_riskadmin_name'] = 'Administradores do site';
$string['check_riskadmin_ok'] = 'Existe(m) {$a} administrador(es) de sistema.';
$string['check_riskadmin_unassign'] = '<a href="{$a->url}">{$a->fullname} ({$a->email}) verificar atribuição de papel</a>';
$string['check_riskadmin_warning'] = 'Existe(m) {$a->admincount} administrador(es) de sistema e {$a->unsupcount} atribuições de papel de administrador noutros contextos (não aconselhado).';
$string['check_riskbackup_detailsok'] = 'A configuração efetuada não permite que nenhum papel tenha permissão para incluir dados dos utilizadores nas cópias de segurança das disciplinas. Contudo, utilizadores que tenham o papel de administrador com a capacidade <strong>doanything</strong> poderão fazê-lo.';
$string['check_riskbackup_details_overriddenroles'] = '<p>Se esta configuração estiver ativa, os utilizadores poderão incluir os dados dos utilizadores nas cópias de segurança. Se esta permissão não for necessária deve ser desativada.</p> {$a}';
$string['check_riskbackup_details_systemroles'] = '<p>Os papéis indicados em seguida têm atualmente permissão para incluir informação dos utilizadores nas cópias de segurança.Se esta permissão não for necessária deve ser desativada.</p> {$a}';
$string['check_riskbackup_details_users'] = '<p>Devido aos papéis indicados acima ou por causa de redefinições locais, os utilizadores indicados de seguida têm permissão para incluir a informação dos utilizadores nas cópias de segurança das disciplinas. Por questões de privacidade deve ser garantido que (a) são utilizadores de confiança e (b) as suas contas estão protegidas por senhas robustas:</p> {$a}';
$string['check_riskbackup_editoverride'] = '<a href="{$a->url}">{$a->name} no contexto {$a->contextname}</a>';
$string['check_riskbackup_editrole'] = '<a href="{$a->url}">{$a->name}</a>';
$string['check_riskbackup_name'] = 'Cópias de segurança com dados dos utilizadores';
$string['check_riskbackup_ok'] = 'A configuração efetuada não permite que nenhum papel tenha permissão para incluir dados dos utilizadores nas cópias de segurança das disciplinas.';
$string['check_riskbackup_unassign'] = '<a href="{$a->url}">{$a->fullname} ({$a->email}) no contexto {$a->contextname}</a>';
$string['check_riskbackup_warning'] = 'Existe(m) {$a->rolecount} papéis, {$a->overridecount} redefinições e {$a->usercount} utilizadores com permissão para incluir dados dos utilizadores nas cópias de segurança das disciplinas.';
$string['check_riskxss_details'] = '<p>A indicação <strong>RISK_XSS</strong> evidencia as capacidades perigosas que levantam questões de segurança e que apenas devem ser disponibilizadas a utilizadores de confiança.</p>
<p>Lista de utilizadores com estas permissões:</p><p>{$a}</p>';
$string['check_riskxss_name'] = 'Utilizadores com permissões <strong>RISK_XSS</strong>';
$string['check_riskxss_warning'] = 'Existe(m) {$a} utilizador(es) com permissões <strong>RISK_XSS</strong>. Por questões de segurança é importante verificar que estes utilizadores são de confiança.';
$string['check_unsecuredataroot_details'] = '<p>Não deve ser possível aceder à pasta de dados através da web. É recomendado que esta pasta se situe fora da pasta de acesso web.</p>
<p>Se a localização desta pasta for alterada, então o parâmetro <strong>$CFG->dataroot</strong> no ficheiro de configuração <strong>config.php</strong> deve ser atualizado para o novo valor.</p>';
$string['check_unsecuredataroot_error'] = 'A pasta de dados está numa localização potencialmente insegura: <strong>{$a}</strong>!';
$string['check_unsecuredataroot_name'] = 'Segurança da pasta de dados';
$string['check_unsecuredataroot_ok'] = 'Não deve ser possível aceder à pasta de dados através da web.';
$string['check_unsecuredataroot_warning'] = 'Não deve ser possível aceder à pasta de dados através da web.';
$string['configuration'] = 'Configuração';
$string['description'] = 'Descrição';
$string['details'] = 'Detalhes';
$string['issue'] = 'Assunto';
$string['pluginname'] = 'Informação de segurança';
$string['security:view'] = 'Ver relatório de segurança';
$string['status'] = 'Estado';
$string['statuscritical'] = 'Crítico';
$string['statusinfo'] = 'Informação';
$string['statusok'] = 'OK';
$string['statusserious'] = 'Verificar';
$string['statuswarning'] = 'Aviso';
$string['timewarning'] = 'Em processamento, aguarde por favor…';
