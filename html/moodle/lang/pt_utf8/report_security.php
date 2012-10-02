<?PHP  // $Id: report_security.php,v 1.2 2010/08/12 13:04:52 avilela Exp $


//NOTE TO TRANSLATORS: please do not translate yet, we are going to finalise this file sometime in January and backport to 1.9.x ;-)

$string['configuration'] = 'Configuração';
$string['details'] = 'Detalhes';
$string['description'] = 'Descrição';
$string['issue'] = 'Assunto';
$string['reportsecurity'] = 'Verificação de segurança';
$string['security:view'] = 'Ver relatório de segurança';
$string['status'] = 'Estado';
$string['statuscritical'] = 'Crítico';
$string['statusinfo'] = 'Informação';
$string['statusok'] = 'OK';
$string['statusserious'] = 'Grave';
$string['statuswarning'] = 'Aviso';
$string['timewarning'] = 'O processamento da informação pode demorar muito tempo, por favor seja paciente...';

$string['check_configrw_name'] = '<code>Config.php</code> permite escrita';
$string['check_configrw_ok'] = 'O ficheiro <code>config.php</code> não pode ser alterado por scripts PHP.';
$string['check_configrw_warning'] = 'Scripts PHP podem alterar o ficheiro <b>config.php</b>.';

$string['check_cookiesecure_details'] = '<p>If you enable https communication it is recommended that you also enable secure cookies. You should also add permanent redirection from http to https.</p>';
$string['check_cookiesecure_error'] = 'Please enable secure cookies';
$string['check_cookiesecure_name'] = 'Secure cookies';
$string['check_cookiesecure_ok'] = 'Secure cookies enabled.';

$string['check_courserole_anything'] = 'The \"doanything\" capability must not be allowed in this <a href=\"$a\">context</a>.';
$string['check_courserole_error'] = 'Incorrectly defined default course roles detected!';
$string['check_courserole_riskylegacy'] = 'Risky legacy type detected in <a href=\"$a->url\">$a->shortname</a>.';
$string['check_courserole_name'] = 'Papéis por omissão (disciplinas)';
$string['check_courserole_notyet'] = 'Usar apenas o papel por omissão na disciplina.';
$string['check_courserole_ok'] = 'Default course role definitions is OK.';
$string['check_courserole_risky'] = 'Risky capabilities detected in <a href=\"$a\">context</a>.';

$string['check_defaultcourserole_anything'] = 'The \"doanything\" capability must not be allowed in this <a href=\"$a\">context</a>.';
$string['check_defaultcourserole_error'] = 'Incorrectly defined default course role \"$a\" detected!';
$string['check_defaultcourserole_legacy'] = 'Risky legacy type detected.';
$string['check_defaultcourserole_name'] = 'Papel nas disciplinas (global)';
$string['check_defaultcourserole_notset'] = 'Default role is not set.';
$string['check_defaultcourserole_ok'] = 'A definição do papel por omissão está correcta.';
$string['check_defaultcourserole_risky'] = 'Risky capabilities detected in <a href=\"$a\">context</a>.';

$string['check_defaultuserrole_error'] = 'The default user role \"$a\" is incorrectly defined!';
$string['check_defaultuserrole_name'] = 'Papel por omissão';
$string['check_defaultuserrole_notset'] = 'O papel por omissão para todos os utilizadores não está definido.';
$string['check_defaultuserrole_ok'] = 'O papel por omissão para todos os utilizadores não está correcto.';

$string['check_displayerrors_details'] = '<p>Não é aconselhável activar o parâmetro <em>display_errors</em> na configuração do PHP em plataformas em produção porque algumas mensagens de erro podem revelar informação sensíveis sobre o servidor.</p>';
$string['check_displayerrors_error'] = 'O parâmetro <b>display_errors</b> de configuração do PHP está activo. É aconselhável que esteja desactivado.';
$string['check_displayerrors_name'] = 'Apresentação de erros de PHP';
$string['check_displayerrors_ok'] = 'A apresentação de erros de PHP está desactivada.';

$string['check_emailchangeconfirmation_error'] = 'Users may enter any email address.';
$string['check_emailchangeconfirmation_info'] = 'Users may enter email addresses from allowed domains only.';
$string['check_emailchangeconfirmation_name'] = 'Mudança de email';
$string['check_emailchangeconfirmation_ok'] = 'Confirmação de mudança de email no perfil de utilizador.';

$string['check_embed_details'] = '<p>A utilização indiscrimnada de objectos é perigosa porque permite a qualquer utilizador registado lançar um ataque XSS contra outros utilizadores do servidor. Esta configuração deve estar desactiva em plataforma em produção.</p>';
$string['check_embed_error'] = 'Unlimited object embedding enabled - this is very dangerous for the majority of servers.';
$string['check_embed_name'] = 'Permitir EMBED e OBJECT';
$string['check_embed_ok'] = 'A utilização ilimitada de objectos não é permitida.';

$string['check_frontpagerole_error'] = 'Incorrectly defined frontpage role \"$a\" detected!';
$string['check_frontpagerole_name'] = 'Papel na página de entrada';
$string['check_frontpagerole_notset'] = 'O papel na página de entrada não está definido.';
$string['check_frontpagerole_ok'] = 'O papel na página de entrada está definido correctamente.';

$string['check_globals_details'] = '<p>O parâmetro <b>Register globals</b> é considerado muito inseguro em termos de configuração do PHP.</p> A configuração do PHP para este parâmetro deve ser <p><code>register_globals=off</code>. Esta definição é feita no ficheiro <code>php.ini</code>, na configuração do Apache/IIS ou no ficheiro <code>.htaccess</code>.</p>';
$string['check_globals_error'] = 'Register globals MUST be disabled. Please fix the server PHP settings immediately!';
$string['check_globals_name'] = 'Parâmetro <b>Register globals</b>';
$string['check_globals_ok'] = 'O parâmetro <b>Register globals</b> está desactivado.';

$string['check_google_details'] = '<p>O parâmetro <code>Aberto ao Google</code> permite aos motores de busca consultar o conteúdo das disciplinas que permitam o acesso a convidados. Se não for permitido o acesso de convidados a nenhuma disciplina, não faz sentido activar este parâmetro.</p>';
$string['check_google_error'] = 'Search engine access is allowed but guest access is disabled.';
$string['check_google_info'] = 'Search engines may enter as guests.';
$string['check_google_name'] = 'Aberto ao Google';
$string['check_google_ok'] = 'O acesso aos motores de busca não está activo.';

$string['check_guestrole_error'] = 'The guest role \"$a\" is incorrectly defined!';
$string['check_guestrole_name'] = 'Papel <b>Convidado</b>';
$string['check_guestrole_notset'] = 'O papel <b>Convidado</b> não está definido.';
$string['check_guestrole_ok'] = 'O papel <b>Convidado</b> está definido correctamente.';

$string['check_mediafilterswf_details'] = '<p>A utilização indiscrimnada de objectos é perigosa porque permite a qualquer utilizador registado lançar um ataque XSS contra outros utilizadores do servidor. Esta configuração deve estar desactiva em plataforma em produção.</p>';
$string['check_mediafilterswf_error'] = 'Flash media filter is enabled - this is very dangerous for the majority of servers.';
$string['check_mediafilterswf_name'] = 'Filtro de conteúdos .swf activo';
$string['check_mediafilterswf_ok'] = 'Filtro de conteúdos Flash não está activo.';

$string['check_noauth_details'] = '<p>O plugin de autenticação <em>Sem autenticação</em> não deve ser utilizado em plataformas em produção. Desactive-o se esta plataforma estiver em produção.</p>';
$string['check_noauth_error'] = 'The No authentication plugin cannot be used on production sites.';
$string['check_noauth_name'] = 'Plug-in <b>Sem autenticação</b>';
$string['check_noauth_ok'] = 'O plug-in <b>Sem autenticação</b> está desactivado.';

$string['check_openprofiles_details'] = '<p>Se os perfis de utilizadores forem públicos podem ser utilizados de forma abusiva por <i>spammers</i>. É aconselhável que se active o parâmetro <code>Forçar utilizadores a autenticar-se antes de consultarem perfis de outros utilizadores</code> ou o parâmetro <code>Forçar os utilizaores a autenticar-se</code>.</p>';
$string['check_openprofiles_error'] = 'Anyone can may view user profiles without logging in.';
$string['check_openprofiles_name'] = 'Perfis de utilizador públicos';
$string['check_openprofiles_ok'] = 'É necessário iniciar sessão antes de ver os perfis dos utilizadores.';

$string['check_passwordpolicy_details'] = '<p>É aconselhável que a política de palavras-chave esteja activa porque a tentativa de adivinhar palavras-chave é uma das formas mais fáceis de se conseguir aceder inevidamente aos sites.
Contudo, não devem ser definidos critérios demasiado rígidos, que torne aos utilizadores a memorização das palavras-chave demasiado difícil.</p>';
$string['check_passwordpolicy_error'] = 'A política de palavras-chave não está definida.';
$string['check_passwordpolicy_name'] = 'Política de palavras-chave';
$string['check_passwordpolicy_ok'] = 'A política de palavras-chave está activa.';

$string['check_passwordsaltmain_name'] = '<b>Salt</b> da palavra-chave';
$string['check_passwordsaltmain_warning'] = 'Não foi definido um <b>salt</b> para as palavras-chave';
$string['check_passwordsaltmain_ok'] = 'O <b>salt</b> das palavras-chave é seguro';
$string['check_passwordsaltmain_weak'] = 'O <b>salt</b> das palavras-chave é fraco';
$string['check_riskadmin_name'] = 'Administradores';
$string['check_riskadmin_ok'] = 'Foram encontrados $a administradores de sistema.';
$string['check_riskadmin_unassign'] = '<a href=\"$a->url\">$a->fullname ($a->email) review role assignment</a>';
$string['check_riskadmin_warning'] = 'Found $a->admincount server administrators and $a->unsupcount unsupported admin role assignments.';
$string['check_riskadmin_name'] = 'Administradores';

$string['check_riskbackup_name'] = 'Backup de utilizadores';
$string['check_riskbackup_warning'] = 'Foram encontrados $a->rolecount papéis, $a->overridecount substituições e $a->usercount utilizadores com a permissão para fazerem backups de utilizadores.';
$string['check_riskbackup_details_overriddenroles'] = '<p>These active overrides give users the ability to include user data in backups. Please make sure this permission is necessary.</p> $a';
$string['check_riskbackup_editrole'] = '<a href=\"$a->url\">$a->name</a>';
$string['check_riskbackup_editoverride'] = '<a href=\"$a->url\">$a->name in $a->contextname</a>';
$string['check_riskbackup_unassign'] = '<a href=\"$a->url\">$a->fullname ($a->email) in $a->contextname</a>';
$string['check_riskbackup_ok'] = 'No roles explicitly allow backup of user data';
$string['check_riskbackup_detailsok'] = 'No roles explicitly allow backup of user data.  However, note that admins with the \"doanything\" capability are still likely to be able to do this.';

$string['check_riskxss_name'] = 'Utilizadores de confiança XSS';
$string['check_riskxss_warning'] = 'Risco de XSS - foram encontrados $a utilizadores que têm que ser definidos como de confiança.';

$string['check_unsecuredataroot_details'] = '<p>A pasta <b>dataroot</b> não pode estar acessível a partir da web. A melhor forma de garantir que esta pasta não está acessível é colocá-la fora da pasta web pública.</p>
<p>Se mover esta pasta, é necessário actualizar a definição <code>\$CFG->dataroot</code> no ficheiro <code>config.php</code> para o novo valor.</p>';
$string['check_unsecuredataroot_error'] = 'Your dataroot directory <code>$a</code> is in the wrong location and is exposed to the web!';
$string['check_unsecuredataroot_name'] = 'Pasta <b>dataroot</b> insegura';
$string['check_unsecuredataroot_ok'] = 'A pasta <b>dataroot</b> não pode estar acessível a partir da web.';
$string['check_unsecuredataroot_warning'] = 'Your dataroot directory <code>$a</code> is in the wrong location and might be exposed to the web.';

$string['check_passwordsaltmain_details'] = '<p>A definição de um <i>salt</i> para as palavras-chave reduz bastante a probabilidade de roubos de palavras-chave.</p>
<p>Para definir um <i>salt</i> para as palavras-chave adicione a segunte linha ao ficheiro <code>config.php</code>:</p>
<code>\$CFG->passwordsaltmain = \'coloque aqui uma longa sequência aleatória de catacteres\';</code>
<p>A sequência aleatória de caracteres deve ter pelo menos 40 caracteres e misturar letras, números e outros caracteres.</p>
<p>Para mais informações sobre este assunto consulte o link <a href=\"$a\" target=\"_blank\">Documentação sobre o <i>salt</i> de palavras-chave</a>. Depois de definido, NÃO apague o <i>salt</i> porque se o fizer não conseguirá entrar no site!</p>';
$string['check_emailchangeconfirmation_details'] = '<p>É aconselhável o envio de um email de confirmação quando os utilizadores mudam o email no seu perfil. Se este parâmetro estiver desactivado, <i>spammers</i> podem tentar sabotar o servidor para enviar <i>spam</i>.</p>
<p>Existe ainda a possibilidade de se bloquear o campo <b>Email</b> no perfil dos utilizadores através dos plugins de autenticação, mas essa possibilidade não é explorada aqui.</p>';
$string['check_configrw_details'] = '<p>É aconselhável que as permissões do ficheiro <code>config.php</code> sejam definidas de forma a que o ficheiro apenas possa ser alterado pelo servidor web.
Note que esta alteração não melhora muito a segurança do servidor, mas permite dificultar algumas sabotagens mais comuns.</p>';
$string['check_riskxss_details'] = '<p>RISK_XSS define as permissões mais perigosas e que apenas utilizadores de confiança devem possuir.</p>
<p>Verifique a seguinte lista de utilizadores e certifique-se de que são todos de confiança:</p><p>$a</p>';
$string['check_riskadmin_detailsok'] = '<p>Verifique a seguinte lista de adminsitradores do sistema:</p>$a';
$string['check_riskadmin_detailswarning'] = '<p>Verifique a seguinte lista de adminsitradores do sistema:</p>$a->admins
<p>É aconselhável que o papel de administrator apenas seja atribuído no contexto do sistema. Os seguintes utilizadores têm o papel de administrador (<i>unsupported</i>) noutros contextos:</p>$a->unsupported';
$string['check_riskbackup_details_systemroles'] = '<p>Os utilizadores com os seguintes papéis de sistema permitem neste momento que esses utilizadores incluam informação dos utilizadores nas cópias de segurança das disciplinas. Verifique se essa permissão é realmente necessária:</p> $a';
$string['check_riskbackup_details_users'] = '<p>Devido aos papéis referidos acima ou por causa de substiuições locais, as seguintes contas de utilizador têm permissão para fazer cópias de segurança das disciplinas contendo informação dos utilizadores inscritos nessas disciplinas. Certifique-se de que são utilizadores de confiança e que têm palavras-chave fortes.:</p> $a';
$string['check_defaultuserrole_details'] = '<p>A todos os utilizadores com sessão activa são atribuídas permissões do papel de utilizador por omissão. Verifique que não existem permissões perigosas neste papel.</p>
<p>O único papel <i>legacy</i> que suporta o papel por omissão é <em>Utilizador autenticado</em>. A permissão <em>course view</em> não deve estar activa para este papel.</p>';
$string['check_guestrole_details'] = '<p>O papel de convidado é usado para convidados, utilizadores sem sessão activa ou convidados temporários com acesso a disciplinas. Certifique-se de que este papel não possui permissões perigosas.</p>
<p>O único papel <i>legacy</i> que suporta o papel de convidado é <em>Convidado</em>.</p>';
$string['check_frontpagerole_details'] = '<p>O papel por omissão na página de entrada é dado a todos os utilizadores registados nas actividades desta página. Certifique-se de que este papel não possui permissões perigosas.</p>
<p>É aconselhável  que um papel específico seja criado com este propósito e não deve ser usado um papel <i>legacy</i> como base.</p>';
$string['check_defaultcourserole_details'] = '<p>Normalmente o papel Aluno é o papel atribuído por omissão aos utilizadores no contexto da disciplina. Certifique-se de que este papel não possui permissões perigosas.</p>
<p>O único papel <i>legacy</i> que suporta o papel por omissão é <em>Aluno</em>.</p>';
$string['check_courserole_details'] = '<p>Cada disciplina tem um papel por omissão definido para as inscrições. Certifique-se de que este papel não possui permissões perigosas.</p>
<p>O único papel <i>legacy</i> que suporta o papel por omissão é <em>Aluno</em>.</p>';

?>
