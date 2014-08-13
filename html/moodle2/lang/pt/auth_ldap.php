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
 * Strings for component 'auth_ldap', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_ldap_ad_create_req'] = 'Não é possível criar a nova conta de utilizador na Ative Directory. Verifique se o sistema cumpre todos os requisitos necessários para esta ligação funcionar (ligação LDAPS, bind user com as permissões necessárias, etc.)';
$string['auth_ldap_attrcreators'] = 'Lista de grupos ou contextos cujos membros estão autorizados a criar atributos. Os nomes dos grupos devem ser separados por ";". Ex: cn=teachers,ou=staff,o=myorg';
$string['auth_ldap_attrcreators_key'] = 'Criadores de atributos';
$string['auth_ldap_auth_user_create_key'] = 'Criar utilizadores externamente';
$string['auth_ldap_bind_dn'] = 'Insira aqui a designação da conta de bind se pretender utilizá-la para procurar utilizadores. Ex: cn=ldapuser,ou=public,o=org';
$string['auth_ldap_bind_dn_key'] = 'Nome específico';
$string['auth_ldap_bind_pw'] = 'Senha para a conta de bind.';
$string['auth_ldap_bind_pw_key'] = 'Senha';
$string['auth_ldap_bind_settings'] = 'Configuração do bind';
$string['auth_ldap_changepasswordurl_key'] = 'URL de mudança de senha';
$string['auth_ldap_contexts'] = 'Lista dos contextos onde estão os utilizadores. Os nomes dos contextos devem ser separados por ";". Ex: ou=users,o=org; ou=others,o=org';
$string['auth_ldap_contexts_key'] = 'Contextos';
$string['auth_ldap_create_context'] = 'Se permitir a criação de utilizadores com confirmação por e-mail especifique o contexto em que estes utilizadores são criados. Este contexto deverá ser diferente do de outros utilizadores por medidas de segurança. Não é necessário adicionar este contexto à variável ldap_context, pois o Moodle irá, automaticamente, procurar os utilizadores associados a este contexto.<br /><b>Nota!</i> É necessário alterar o método user_create() no ficheiro auth/ldap/auth.php para que a criação de utilizadores funcione';
$string['auth_ldap_create_context_key'] = 'Contexto para novos utilizadores';
$string['auth_ldap_create_error'] = 'Erro ao criar utilizador no LDAP.';
$string['auth_ldap_creators'] = 'Lista de grupos ou contextos cujos membros estão autorizados a criar novas disciplinas. Os nomes dos grupos devem ser separados por ";". Ex: cn=teachers,ou=staff,o=myorg';
$string['auth_ldap_creators_key'] = 'Criadores';
$string['auth_ldapdescription'] = 'Este método permite realizar autenticação num servidor LDAP externo.<br />Se o nome de utilizador e senha indicados forem válidos o Moodle criará uma nova conta de utilizador na sua base de dados. Este módulo consegue aceder aos atributos dos utilizadores no servidor LDAP e preencher os campos no perfil Moodle. Em acessos futuros apenas o nome de utilizador e senha serão verificados.';
$string['auth_ldap_expiration_desc'] = 'Selecione "Não" para desativar a verificação de expiração das senhas e para evitar que o servidor LDAP leia o valor do parâmetro passwordexpiration diretamente do LDAP';
$string['auth_ldap_expiration_key'] = 'Expiração';
$string['auth_ldap_expiration_warning_desc'] = 'Número de dias de antecedência com que deve ser enviado o aviso de expiração da senha.';
$string['auth_ldap_expiration_warning_key'] = 'Aviso de expiração';
$string['auth_ldap_expireattr_desc'] = 'Opcional: esta configuração tem prioridade sobre o atributo LDAP que armazena a data de expiração da senha';
$string['auth_ldap_expireattr_key'] = 'Atributo de expiração';
$string['auth_ldapextrafields'] = 'Estes campos são opcionais. É possível configurar o Moodle para que vá buscar informação aos atributos dos utilizadores no servidor LDAP.<p>Se os campos a mapear estiverem em branco, não será transferida informação do LDAP para o Moodle e serão usados os valores predefinidos no Moodle.</p><p>Em qualquer caso os utilizadores poderão alterar os seus dados de perfil depois de acederem ao Moodle.</p>';
$string['auth_ldap_graceattr_desc'] = 'Opcional: Esta configuração tem prioridade sobre o atributo de tolerância de entrada';
$string['auth_ldap_gracelogin_key'] = 'Atributo de tolerância de entrada';
$string['auth_ldap_gracelogins_desc'] = 'Ativar a tolerância de entradas do LDAP. Depois de a senha de um utilizador ter expirado, este poderá aceder ao site enquanto a contagem for maior que zero. Ao ativar esta configuração é apresentada uma mensagem se a senha já tiver expirado.';
$string['auth_ldap_gracelogins_key'] = 'Tolerância de entradas';
$string['auth_ldap_groupecreators'] = 'Lista de grupos ou contextos cujos membros estão autorizados a criar grupo. Os nomes dos grupos devem ser separados por ";". Ex: cn=teachers,ou=staff,o=myorg';
$string['auth_ldap_groupecreators_key'] = 'Criadores de grupo';
$string['auth_ldap_host_url'] = 'Especificar o servidor LDAP na forma de um URL completo. Ex: ldap://ldap.myorg.com/ ou ldaps://ldap.myorg.com/';
$string['auth_ldap_host_url_key'] = 'URL do servidor';
$string['auth_ldap_ldap_encoding'] = 'Especificar a codificação usada pelo servidor LDAP. Muito provavelmente utf-8. No caso de ser um servidor MS ADv2 é usada a codificação predefinida na plataforma, por exemplo, cp1252, cp1250, etc.';
$string['auth_ldap_ldap_encoding_key'] = 'Codificação do LDAP';
$string['auth_ldap_login_settings'] = 'Configuração dos dados de acesso';
$string['auth_ldap_memberattribute'] = 'Opcional: Esta configuração tem prioridade sobre o atributo "member" quando os utilizadores pertencem a um grupo. Um valor habitual é "member"';
$string['auth_ldap_memberattribute_isdn'] = 'Opcional: Esta configuração tem prioridade sobre os valores do atributo "member" (0 ou 1)';
$string['auth_ldap_memberattribute_isdn_key'] = 'Atributos dos membros usam dn';
$string['auth_ldap_memberattribute_key'] = 'Atributo do membro';
$string['auth_ldap_noconnect'] = 'O módulo LDAP não conseguiu ligar ao servidor {$a}';
$string['auth_ldap_noconnect_all'] = 'O módulo LDAP não conseguiu ligar aos servidores {$a}';
$string['auth_ldap_noextension'] = '<em>O módulo LDAP do PHP não está instalado. Para poder utilizar este módulo de autenticação este módulo tem que estar instalado e ativado.</em>';
$string['auth_ldap_no_mbstring'] = 'A extensão mbstring do PHP tem que estar instalado no servidor para seja possível criar utilizadores na Ative Directory.';
$string['auth_ldapnotinstalled'] = 'A autenticação por LDAP não pode ser utilizada porque a extensão LDAP do PHP não está instalada.';
$string['auth_ldap_objectclass'] = 'Opcional: Esta configuração tem prioridade sobre o atributo objectClass usado para nomear/pesquisar utilizadores no ldap_user_type. Normalmente não é necessário alterar esta opção.';
$string['auth_ldap_objectclass_key'] = 'Classe de objeto';
$string['auth_ldap_opt_deref'] = 'Esta configuração define como os <i>aliases</i> são processados durante a pesquisa. Selecione um dos seguintes valores:"Não" (LDAP_DEREF_NEVER) ou "Sim" (LDAP_DEREF_ALWAYS)';
$string['auth_ldap_opt_deref_key'] = 'Desreferenciar <i>aliases</i>';
$string['auth_ldap_passtype'] = 'Esta configuração define o formato das senhas que são criadas ou alteradas no servidor LDAP.';
$string['auth_ldap_passtype_key'] = 'Formato da senha';
$string['auth_ldap_passwdexpire_settings'] = 'Configuração de expiração das senhas do LDAP';
$string['auth_ldap_preventpassindb'] = 'Selecione o valor "Sim" para evitar que as senhas sejam armazenadas na base de dados do Moodle.';
$string['auth_ldap_preventpassindb_key'] = 'Ocultar senhas';
$string['auth_ldap_search_sub'] = 'Procurar utilizadores em subcontextos.';
$string['auth_ldap_search_sub_key'] = 'Pesquisar em subcontextos';
$string['auth_ldap_server_settings'] = 'Configurações do servidor LDAP';
$string['auth_ldap_unsupportedusertype'] = 'user_create() não permite o usertype: {$a}';
$string['auth_ldap_update_userinfo'] = 'Atualizar a informação de utilizador (firstname, lastname, address..) a partir do servidor LDAP para o Moodle. Defina as configurações na secção "Mapeamento de dados" de acordo com o pretendido.';
$string['auth_ldap_user_attribute'] = 'Opcional: Esta configuração tem prioridade sobre o atributo usado para nomear/pesquisar utilizadores. Um valor habitual é cn';
$string['auth_ldap_user_attribute_key'] = 'Atributo do utilizador';
$string['auth_ldap_user_exists'] = 'O nome de utilizador já existe no servidor LDAP.';
$string['auth_ldap_user_settings'] = 'Configuração da pesquisa de utilizadores';
$string['auth_ldap_user_type'] = 'Defina como os utilizadores devem ser armazenados no servidor LDAP. Esta configuração também define como devem funcionar as seguintes operações: expiração de senha, tolerância de entradas e criação de utilizadores.';
$string['auth_ldap_user_type_key'] = 'Tipo de utilizador';
$string['auth_ldap_usertypeundefined'] = 'O parâmetro config.user_type não está definido ou a função ldap_expirationtime2unix não aceita o tipo selecionado!';
$string['auth_ldap_usertypeundefined2'] = 'O parâmetro config.user_type não está definido ou a função ldap_unixi2expirationtime não aceita o tipo selecionado!';
$string['auth_ldap_version'] = 'Indique a versão do protocolo LDAP que o servidor está a usar.';
$string['auth_ldap_version_key'] = 'Versão';
$string['auth_ntlmsso'] = 'NTLM SSO';
$string['auth_ntlmsso_enabled'] = 'Selecione o valor "Sim" para tentar SSO com o domínio NTLM. <strong>Nota:</strong> Para colocar em funcionamento esta opção é necessário alterar a configuração habitual do servidor web. Consulte a página <a href="http://docs.moodle.org/en/NTLM_authentication">http://docs.moodle.org/en/NTLM_authentication</a> para mais informações';
$string['auth_ntlmsso_enabled_key'] = 'Ativar';
$string['auth_ntlmsso_ie_fastpath'] = 'Selecione o valor "Sim" para ativar o atalho NTLM SSO (algumas fases são ignoradas e só funciona se o browser do utilizador for o MS Internet Explorer).';
$string['auth_ntlmsso_ie_fastpath_attempt'] = 'Tentativa NTLM com todos os navegadores';
$string['auth_ntlmsso_ie_fastpath_key'] = 'Atalho para o IE da MS?';
$string['auth_ntlmsso_ie_fastpath_yesattempt'] = 'Sim, tentar NTLM com outros navegadores';
$string['auth_ntlmsso_ie_fastpath_yesform'] = 'Sim, todos os outros navegadores usam um formulário de login padrão';
$string['auth_ntlmsso_maybeinvalidformat'] = 'Não foi possível extrair o nome de utilizador a partir do cabeçalho do UTILIZADOR_REMOTO. O formato está configurado corretamente?';
$string['auth_ntlmsso_missing_username'] = 'Tem de especificar pelo menos o %nome de utilizador% no formato nome de utilizador remoto';
$string['auth_ntlmsso_remoteuserformat'] = 'Se escolheu \'NTLM\' em \'Tipo de autenticação\', pode especificar aqui o formato do nome do utilizador remoto. Se este campo ficar por preencher, será utilizado o formato DOMAINusername padrão. Pode utilizar a expressão especial opcional <b>%domain%</b> para especificar onde o nome do domínio aparece, e a expressão especial obrigatória <b>%username%</b> para especificar onde o nome de utilizador aparece. <br /><br /> Alguns formatos utilizados são <tt>%domain%%username%</tt> (MS Windows default), <tt>%domain%/%username%</tt>, <tt>%domain%+%username%</tt> and just <tt>%username%</tt> (se não existe nenhuma parte do domínio).';
$string['auth_ntlmsso_remoteuserformat_key'] = 'Nome de utilizador em formato remoto';
$string['auth_ntlmsso_subnet'] = 'Se esta configuração estiver selecionada só serão feitas tentativas de ligação SSO em clientes nesta subrede. Ex: xxx.xxx.xxx.xxx/bitmask';
$string['auth_ntlmsso_subnet_key'] = 'Subrede';
$string['auth_ntlmsso_type'] = 'Método de autenticação configurado no servidor web para autenticar os utilizadores (se não tiver a certeza desta informação, escolha NTLM)';
$string['auth_ntlmsso_type_key'] = 'Tipo de autenticação';
$string['connectingldap'] = 'A ligar ao servidor LDAP…';
$string['creatingtemptable'] = 'A criar tabela temporária {$a}';
$string['didntfindexpiretime'] = 'password_expire() não conseguiu encontrar intervalo de expiração';
$string['didntgetusersfromldap'] = 'Não foram encontrados utilizadores no servidor LDAP -- erro? -- a terminar operação';
$string['gotcountrecordsfromldap'] = 'Foram encontrados {$a} registos no LDAP';
$string['morethanoneuser'] = 'ATENÇÃO! Foram encontrados mais do que um utilizador no LDAP. Será utilizado o primeiro.';
$string['needbcmath'] = 'Para utilizar a tolerância de entradas na Ative Directory é preciso instalar e ativar a extensão BCMath do PHP';
$string['needmbstring'] = 'Para alterar senhas na Ative Directory é preciso instalar e ativar a extensão mbstring do PHP';
$string['nodnforusername'] = 'Ocorreu um erro na função user_update_password(). Não existe DN para: {$a->username}';
$string['noemail'] = 'Ocorreu um erro ao tentar enviar o e-mail';
$string['notcalledfromserver'] = 'Não deve ser invocado pelo servidor web!';
$string['noupdatestobedone'] = 'Não existem atualização a fazer';
$string['nouserentriestoremove'] = 'Não existem registos de utilizador a apagar';
$string['nouserentriestorevive'] = 'Não existem registos de utilizador a reativar';
$string['nouserstobeadded'] = 'Não existem utilizadores a criar';
$string['ntlmsso_attempting'] = 'A tentar SSO através de NTLM…';
$string['ntlmsso_failed'] = 'A autenticação automátiva falhou, tente a página de entrada normal…';
$string['ntlmsso_isdisabled'] = 'SSO NTLM não se está ativado.';
$string['ntlmsso_unknowntype'] = 'Tipo de ntlmsso desconhecido!';
$string['pagedresultsnotsupp'] = 'A página de resultados LDAP não é suportada (ou a sua versão do PHP não tem suporte ou configurou o Moodle para usar a versão do protocolo LDAP 2)';
$string['pagesize'] = 'Certifique-se este valor é menor do que o tamanho limite do conjunto de resultados do seu servidor LDAP (número máximo de entradas que podem ser devolvidas numa única consulta)';
$string['pagesize_key'] = 'Tamanho da página';
$string['pluginname'] = 'Servidor LDAP';
$string['pluginnotenabled'] = 'O módulo não está ativo!';
$string['renamingnotallowed'] = 'Não é permitida a alteração do nome dos utilizadores no servidor LDAP';
$string['rootdseerror'] = 'Erro ao comunicar com rootDSE para Ative Directory';
$string['start_tls'] = 'Usar o serviço LDAP normal (porta 389) com encriptação TLS';
$string['start_tls_key'] = 'Usar TLS';
$string['updatepasserror'] = 'Erro na função user_update_password() com código  {$a->errno} e mensagem " {$a->errstring} "';
$string['updatepasserrorexpire'] = 'Erro na função user_update_password() ao ler o intervalo de expiração da senha. Código do erro: {$a->errno}; Mensagem do erro: {$a->errstring}';
$string['updatepasserrorexpiregrace'] = 'Erro na função user_update_password() ao modificar os parâmetros expirationtime e/ou gracelogins. Código do erro: {$a->errno}; Mensagem do erro: {$a->errstring}';
$string['updateremfail'] = 'Erro ao atualizar registo LDAP. Código do erro: {$a->errno}; Mensagem do erro: {$a->errstring}<br/>Key ({$a->key}) - valor moodle antigo: "{$a->ouvalue}" novo valor: "{$a->nuvalue}"';
$string['updateremfailamb'] = 'Falha ao atualizar LDAP com campo ambíguo {$a->key}; valor moodle antigo: "{$a->ouvalue}", novo valor: "{$a->nuvalue}"';
$string['updateusernotfound'] = 'Não foi possível encontrar o utilizador ao pesquisar externamente. Detalhes: base da pesquisa: "{$a->userdn}"; filtro da pesquisa: "(objectClass=*)"; atributos da pesquisa: {$a->attribs}';
$string['useracctctrlerror'] = 'Erro ao tentar obter userAccountControl para {$a}';
$string['user_activatenotsupportusertype'] = 'A função user_activate() não aceita o usertype: {$a}';
$string['user_disablenotsupportusertype'] = 'A função user_disable() não aceita o usertype: {$a}';
$string['userentriestoadd'] = 'Registos de utilizador a adicionar: {$a}';
$string['userentriestoremove'] = 'Registos de utilizador a apagar: {$a}';
$string['userentriestorevive'] = 'Registos de utilizador a reativar: {$a}';
$string['userentriestoupdate'] = 'Registos de utilizador a atualizar: {$a}';
$string['usernotfound'] = 'O utilizador não foi encontrado no LDAP';
