<?PHP // $Id: mnet.php,v 1.8 2008/01/25 19:19:47 villate Exp $ 
      // mnet.php - created with Moodle 2.0 dev (2007101507)


$string['RPC_HTTPS_SELF_SIGNED'] = 'HTTPS (auto-assinado)';
$string['RPC_HTTPS_VERIFIED'] = 'HTTPS (assinado)';
$string['RPC_HTTP_PLAINTEXT'] = 'HTTP não encriptado';
$string['RPC_HTTP_SELF_SIGNED'] = 'HTTP (auto-assinado)';
$string['RPC_HTTP_VERIFIED'] = 'HTTP (assinado)';
$string['aboutyourhost'] = 'Acerca do Servidor';
$string['accesslevel'] = 'Nível de acesso';
$string['addhost'] = 'Adicionar servidor';
$string['addnewhost'] = 'Adicionar um novo servidor';
$string['addtoacl'] = 'Adicionar ao controlo de acessos';
$string['allow'] = 'Permitir';
$string['authfail_nosessionexists'] = 'Autorização falhada: a sessão do mnet não existe.';
$string['authfail_sessiontimedout'] = 'Autorização falhada: o tempo de carregamento da sessão do mnet terminou.';
$string['authfail_usermismatch'] = 'Autorização falhada: o utilizador não é o mesmo.';
$string['authmnetautoadddisabled'] = 'O plugin de autenticação da rede Moodle para auto-adicionar utilizadores está <strong>desligado</strong>.';
$string['authmnetdisabled'] = 'O plugin de autenticação da rede Moodle está <strong>desligado</strong>.';
$string['badcert'] = 'Este não é um certificado válido.';
$string['certdetails'] = 'Pormenores do certificado';
$string['couldnotgetcert'] = 'Nenhum certificado encontrado em <br />$a. <br /> O host pode estar em baixo ou configurado incorrectamente.';
$string['couldnotmatchcert'] = 'Isto não combina com o certificado publicado actualmente pelo servidor da Internet.';
$string['courses'] = 'Disciplinas';
$string['courseson'] = 'Disciplinas em';
$string['current_transport'] = 'Transporte actual';
$string['currentkey'] = 'Chave pública actual';
$string['databaseerror'] = 'Não foi possível escrever detalhes na base de dados';
$string['deleteaserver'] = 'A apagar um servidor';
$string['deletehost'] = 'Apagar servidor';
$string['deletekeycheck'] = 'Tem a certeza absoluta que quer apagar esta chave?';
$string['deleteoutoftime'] = 'A sua janela de 60 segundos para apagar a esta chave expirou. Por favor comece de novo.';
$string['deleteuserrecord'] = 'SSO ACL: apagar registro para o utilizador \'$a[0]\' de $a[1].';
$string['deletewrongkeyvalue'] = 'Um erro ocorreu. Se você não esta a tentar apagar a chave do SSL do seu servidor, é possível que esteja a ser sujeito a um ataque malicioso. Nenhuma acção foi tomada.';
$string['deny'] = 'Negar';
$string['description'] = 'Descrição';
$string['duplicate_usernames'] = 'Falhamos na criação de um índice nas colunas \"mnethostid\" e \"username\" na tabela utilizador. <br /> Isto pode acontecer quando tens <a href=\"$a\" target=\"_blank\"> nomes de utilizadores duplicados na tabela de utilizador .</a>. <br /> A actualização deve conseguir concluir com sucesso na mesma. Clique sobre o link acima, e instruções de como resolver este problema aparecerão numa nova janela. Pode aceder a isso no final da actualização. <br />';
$string['editenrolments'] = 'Inscrever';
$string['enabled_for_all'] = '(Este serviço foi ligado para todos os hosts).';
$string['enrolcourseenrol_desc'] = 'Inscrever/Cancelar inscrição de utilizadores desta disciplina usando Inscrições/Matriculas rede Moodle.
Note que utilizadores podem ter sido inscritos nesta disciplina através de outros métodos de inscrição se os hosts remotos os permitirem. 
Tais inscrições estão listadas sob <em> Outros utilizadores inscritos</em>';
$string['enrolcourses_desc'] = 'Disciplinas disponíveis para a inscrição remota por este host.';
$string['enrollingincourse'] = 'Inscrever na disciplina $a[0] no host $a[1]<br />';
$string['enrolments'] = 'Inscrições';
$string['enterausername'] = 'Por favor introduza um utilizador, ou uma lista de nomes do utilizador separados por vírgulas.';
$string['error7020'] = 'Este erro normalmente surge quando o servidor remoto tem criado para si um registo com o valor de wwwroot errado, por exemplo, http://o_seu_sítio.pt em vez de http://www.o_seu_sítio.pt. Deverá entrar em contacto com o adminstrador do sítio remoto, pedindo que actualize o registo para o seu servidor com o valor de wwwroot  (pode ser consultado em config.php no seu servidor).';
$string['error7022'] = 'A mensagem que enviou para o servidor remoto foi cifrada correctamente, mas não foi assinada. Isso é bastante inesperado; provavelmente deverá enviar um relatório de bug se isso acontecer (inclua no relatório toda a informação possível sobre a versão do Moodle em questão, etc).';
$string['error7023'] = 'O sítio remoto tentou descifrar a sua mensagem com todas as chaves que tem registadas para o seu servidor. Todas elas falharam. Poderá conseguir resolver o problema trocando novamente chaves com o sítio remoto em forma manual. Isto acontece raramente, a menos que não tenha tido comunicação com o sítio remoto durante alguns meses.';
$string['error7024'] = 'Enviou uma mensagem sem cifrar para o sítio remoto, mas o sítio remoto não aceita comunicações não cifradas desde o seu sítio. Isso é bastante inesperado; provavelmente deverá enviar um relatório de bug se isso acontecer (inclua no relatório toda a informação possível sobre a versão do Moodle em questão, etc).';
$string['error7026'] = 'A chave usada para assinar a sua mensagem difere da chave que o servidor remoto tem armazenada para o seu servidor. O servidor remoto ainda tentou obter a sua nova chave sem sucesso. Por favor troque novamente chaves com o sítio remoto em forma manual.';
$string['error709'] = 'O sítio remoto não conseguiu obter uma chave SSL do seu servidor.';
$string['expired'] = 'Esta chave expirou em';
$string['expires'] = 'Válido até';
$string['expireyourkey'] = 'Apagar esta chave';
$string['expireyourkeyexplain'] = 'Moodle varia automaticamente as suas chaves cada 28 dias (por defeito) mas você tem a opção para <em> manualmente </em> expirar esta chave a qualquer hora.
Isto somente será útil se acredita que esta chave foi comprometida.
Uma chave substituta vai ser gerada automaticamente.
Apagar esta chave, vai fazer com que seja impossível para outros utilizadores Moodle comunicar consigo, até que manualmente com cada um dos administradores e lhes forneça a sua nova chave.';
$string['failedaclwrite'] = 'Falhou a gravação da lista de controlo de acesso MNET para o utilizador \'$a\'.';
$string['forbidden-function'] = 'Essa função não foi ligada para o RPC.';
$string['forbidden-transport'] = 'O método de transporte que está a tentar usar não é permitido.';
$string['forcesavechanges'] = 'Forçar a gravação de alterações';
$string['helpnetworksettings'] = 'Configurar comunicação entre-Moodle(s)';
$string['hidelocal'] = 'Esconder utilizadores locais';
$string['hideremote'] = 'Esconder utilizadores remotos';
$string['host'] = 'servidor';
$string['hostcoursenotfound'] = 'Servidor ou disciplina não encontrada';
$string['hostdeleted'] = 'Ok - servidor apagado';
$string['hostexists'] = 'Um registro já existe para esse servidor e para a distribuição de Moodle com a identificação $a.< Br/> Clique sobre <em>Continuar</em> para editar esse registro.';
$string['hostname'] = 'Nome do Host';
$string['hostnamehelp'] = 'O nome completo qualificado do domínio do servidor remoto. Exemplo: www.examplo.org';
$string['hostnotconfiguredforsso'] = 'Este Hub Moodle não esta configurado para acesso remoto.';
$string['hostsettings'] = 'Configurações do host';
$string['http_self_signed_help'] = 'Permitir ligações usando um certificado auto-assinado do DIY SSL no servidor remoto.';
$string['http_verified_help'] = 'Permitir ligações usando um certificado SSL verificado no PHP no servidor remoto, mas sobre http (não https).';
$string['https_self_signed_help'] = 'Permitir ligações usando DIY SSL (auto-assinado/auto-atribuido) no PHP no servidor remoto sobre http.';
$string['https_verified_help'] = 'Permitir ligações usando um certificado SSL verificado no servidor remoto.';
$string['id'] = 'Identificador';
$string['idhelp'] = 'Este valor é atribuído automaticamente e não pode ser alterado.';
$string['illegalchar-host'] = 'O nome do seu servidor tem um caracter ilegal: $a';
$string['illegalchar-moodlehome'] = 'A localização do seu Moodle contém caracteres ilegais';
$string['invalidaccessparam'] = 'Parâmetro de acesso inválido.';
$string['invalidactionparam'] = 'Parâmetro de acção inválido.';
$string['invalidhost'] = 'Tem que fornecer um identificador de servidor válido';
$string['invalidpubkey'] = 'A chave não é uma chave SSL válida.';
$string['invalidurl'] = 'Parâmetro URL inválido';
$string['ipaddress'] = 'Enderesso IP';
$string['is_in_range'] = 'O endereço de IP &nbsp;<code>$a</code>&nbsp; representa um servidor válido de confiança.';
$string['ispublished'] = 'O Moodle $a activou este serviço para si.';
$string['issubscribed'] = 'O Moodle $a está a subscrever para este serviço no seu servidor.';
$string['keydeleted'] = 'A sua chave foi apagada com sucesso e substituída.';
$string['keymismatch'] = 'A chave pública que tem para este servidor é diferente da chave pública que o servidor está a publicar actualmente.';
$string['last_connect_time'] = 'Último tempo de ligação';
$string['last_connect_time_help'] = 'A data e hora da última vez em  que ligou para este servidor.';
$string['last_transport_help'] = 'O transporte que usou na última ligação a este servidor.';
$string['loginlinkmnetuser'] = '<br />Se for utilizador remoto da rede Moodle e poder <a href=\"$a\">confirmar aqui o seu endereço de correio</a>, poderá ser redireccionado para a sua página de entrada.<br />';
$string['logs'] = 'Registos';
$string['mnet'] = 'Rede Moodle';
$string['mnet_concatenate_strings'] = 'Concatena (até) 3 palavras e devolve o resultado.';
$string['mnet_session_prohibited'] = 'Os utilizadores do seu servidor principal não têm permissão para transmigrar para $a.';
$string['mnetdisabled'] = 'A rede Moodle está <strong>desligada</strong>.';
$string['mnetenrol'] = 'Inscrições';
$string['mnetlog'] = 'Registos';
$string['mnetpeers'] = 'Parceiros';
$string['mnetservices'] = 'Serviços';
$string['mnetsettings'] = 'Definições da rede Moodle';
$string['mnetthemes'] = 'Temas';
$string['moodle_home_help'] = 'O caminho para a página principal do Moodle no servidor remoto. Exemplo: /moodle/';
$string['moodleloc'] = 'Localização do Moodle';
$string['net'] = 'Rede Moodle';
$string['networksettings'] = 'Definições da rede';
$string['never'] = 'Nunca';
$string['noaclentries'] = 'Lista de controlo de acesso SSO vazia';
$string['nocurl'] = 'A livraria PHP Curl não está instalada';
$string['nohostid'] = 'Esta página requer um identificador de servidor, que deve ser um número inteiro.';
$string['noipmatch'] = 'O endereço da máquina remota: <br /><em>$a[0]</em><br /> não coincide com o que está registado:<br /><em>$a[1]</em>.';
$string['nolocaluser'] = 'Nenhum registo local existe para o utilizador remoto.';
$string['nomodifyacl'] = 'Não tem permissões para modificar a lista de controlo de acesso MNET.';
$string['nonmatchingcert'] = 'O sujeito do certificado: <br /><em>$a[0]</em><br />não coincide com o servidor de onde veio:<br /><em>$a[1]</em>.';
$string['nopubkey'] = 'Ocorreu um problema ao recuperar a chave pública. <br />Talvez o host não permita rede Moodle ou a chave é inválida.';
$string['nosite'] = '(Não foi possível encontrar a disciplina ao nível do sítio)';
$string['nosuchfile'] = 'O ficheiro/função $a não existe.';
$string['nosuchfunction'] = 'Incapaz de encontrar a função, ou a função é proibitiva para o RPC.';
$string['nosuchmodule'] = 'A função foi endereçada incorrectamente e não pode ser encontrada.
Por favor use o formato mod/nome-módulo/lib/nome-função.';
$string['nosuchpublickey'] = 'Incapaz de obter chave pública para verificação de assinatura.';
$string['nosuchservice'] = 'O serviço RPC não está a ser executado neste servidor.';
$string['nosuchtransport'] = 'Não existe transporte com esse ID.';
$string['notBASE64'] = 'Este texto não está codificado em Base 64. Não pode ser uma chave válida.';
$string['notPEM'] = 'Esta chave não está em formato PEM. Não irá funcionar.';
$string['not_in_range'] = 'O endereço de IP &nbsp;<code>$a</code>&nbsp; não representa um host válido de confiança.';
$string['notpermittedtojump'] = 'Não tem permissão para começar uma sessão remota deste Hub Moodle.';
$string['notpermittedtoland'] = 'Não tem permissão para iniciar uma sessão remota.';
$string['off'] = 'Desligado';
$string['on'] = 'Ligado';
$string['otherenrolledusers'] = 'Outros utilizadores inscritos';
$string['permittedtransports'] = 'Transportes permitidos';
$string['phperror'] = 'Um erro interno do PHP preveniu que o seu pedido fosse satisfeito.';
$string['postrequired'] = 'A função de apagar necessita um pedido POST.';
$string['promiscuous'] = 'Promíscuo';
$string['publickey'] = 'Chave pública';
$string['publickey_help'] = 'A chave pública é obtida automaticamente do servidor remoto.';
$string['publish'] = 'Publicar';
$string['reallydeleteserver'] = 'Tem a certeza que quer apagar o servidor.';
$string['receivedwarnings'] = 'Os seguintes avisos foram recebidos';
$string['recordnoexists'] = 'Registo não existente';
$string['reenableserver'] = 'Não – Seleccione esta opção para voltar a ligar este servidor';
$string['registerallhosts'] = 'Registar todos os servidores. (<em>modo Hub</em>)';
$string['registerallhostsexplain'] = 'Pode escolher registar automaticamente todos os servidores que tentarem ligar-se a si.
Isto significa que aparecerá um registo na sua lista de servidores para qualquer sítio do Moodle que se ligue a si e que peça a chave pública.
<br />Tem a opção abaixo para configurar serviços para \"todos os servidores\" e ao ligar alguns serviços lá, pode proporcionar indiscriminadamente serviços a qualquer servidor Moodle.';
$string['remotecourses'] = 'Disciplinas remotas';
$string['remoteenrolhosts_desc'] = 'Inscreve e anule a inscrição de utilizadores na sua instalação Moodle nos servidores Moodle que permitam que o faça através do plugin de inscrição na rede Moodle.';
$string['remotehost'] = 'Hub remoto';
$string['remotehosts'] = 'Servidores  remotos';
$string['remotemoodles'] = 'Moodles remotos';
$string['requiresopenssl'] = 'A rede Moodle requer a extensão OpennSSl';
$string['restore'] = 'Restaurar';
$string['reviewhostdetails'] = 'Rever detalhes do servidor';
$string['reviewhostservices'] = 'Rever Serviços do servidor';
$string['selectaccesslevel'] = 'Por favor, escolha um nível de acesso da lista.';
$string['selectahost'] = 'Por favor, escolha um servidor Moodle remoto.';
$string['serviceswepublish'] = 'Serviços que publicamos para $a';
$string['serviceswesubscribeto'] = 'Serviços em $a que nós subscrevemos.';
$string['settings'] = 'Definições';
$string['showlocal'] = 'Mostrar utilizadores locais';
$string['showremote'] = 'Mostrar utilizadores remotos';
$string['ssl_acl_allow'] = 'SSO ACL: permitir utlizador $a[0] de $a[1]';
$string['ssl_acl_deny'] = 'SSO ACL: negar utilizador $a[0] de $a[1]';
$string['ssoaccesscontrol'] = 'Controlo de acesso SSO';
$string['ssoacldescr'] = 'Use esta página para conceder/negar o acesso a utilizadores específicos dos servidores remotos da rede Moodle.
Isto é funcional quando estiver a oferecer serviços de SSO a utilizadores remotos.
Para controlar a habilidade de navegar dos utilizadores <em>locais</em> para outros aservidores na rede Moodle, use o sistema dos cargos para conceder-lhes a capacidade <em>mnetcanroam</em>.';
$string['ssoaclneeds'] = 'Para que esta funcionalidade funcione, tem que ter ligada a Rede Moodle, e o plugin de autenticação na rede Moodle activado com a opção de adicionar automaticamente utilizadores habilitada.';
$string['strict'] = 'Estrito';
$string['subscribe'] = 'Subscrever';
$string['system'] = 'Sistema';
$string['testtrustedhosts'] = 'Testar um endereço';
$string['testtrustedhostsexplain'] = 'Introduza um endereço de IP para verificar se é um servidor de confiança.';
$string['themesavederror'] = 'Surgiu um erro: A alteração do tema não foi gravada.';
$string['transport_help'] = 'Estas opções são recíprocas, para que possa só forçar a que um servidor remoto use um certificado SSL atribuído se o seu servidor também tiver um certificado SSL atribuído.';
$string['trustedhosts'] = 'Hosts XML-RPC';
$string['trustedhostsexplain'] = '<p>O mecanismo dos servidores de confiança permite que as máquinas específicas executem chamadas XML-RPC para qualquer parte da API do Moodle.
Isto está disponível para que os scripts controlem o comportamento do Moodle e pode ser uma opção muito perigosa a permitir. Se estiver em dúvida, mantenha-a desligada(off).< /p>
Isto<strong> não</strong> é necessário para a rede Moodle</p>
<p>Para a ligar, introduza uma lista de endereços IP ou redes, uma em cada linha.
Alguns exemplos: :</p>O teu (hosts/máquinas/anfitriões) local: :<br />127.0.0.1<br /> O teu host (com um bloco de rede)):<br />127.0.0.1/32<br />
Só o host com endereço IP 192.168.0.7:<br />192.168.0.7/32<br />
Qualquer hostcom um endereço de Ip entre 192.168.0.1 e 192.168.0.255:<br />192.168.0.0/24<br />
Qualquer host: <br />192.168.0.0/0<br />
Obviamente o último exemplo <strong>não</strong> é uma configuração recomendada.';
$string['unknownerror'] = 'Ocorreu um erro desconhecido durante a negociação.';
$string['usercannotchangepassword'] = 'Não pode modificar a sua senha aqui já que é um utilizador remoto.';
$string['userchangepasswordlink'] = '<br />Talvez tenha que alterar a sua senha no seu <a href=\"$a->wwwroot/login/change_password.php\">$a->description</a> fornecedor.';
$string['usersareonline'] = 'Aviso: $a utilizadores desse servidor estão ligados actualmente ao seu servidor.';
$string['validated_by'] = 'É validada pela rede: &nbsp;<code>$a</code>';
$string['verifysignature-error'] = 'A verificação de assinatura falhou. Ocorreu um erro.';
$string['verifysignature-invalid'] = 'A verificação da assinatura falhou. 
Parece que esta transacção não foi assinada por ti.';
$string['version'] = 'versão';
$string['warning'] = 'Aviso';
$string['wrong-ip'] = 'O seu endereço IP não coincide com o endereço que temos nos registos.';
$string['xmlrpc-missing'] = 'Tem que ter XML-RPC instalado na configuração do PHP para conseguir usar esta característica.';
$string['yourhost'] = 'O seu servidor';
$string['yourpeers'] = 'Os seus parceiros';

?>
