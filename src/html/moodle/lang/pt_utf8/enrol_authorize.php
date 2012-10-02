<?PHP // $Id: enrol_authorize.php,v 1.8 2008/04/03 07:19:19 skodak Exp $ 
      // enrol_authorize.php - created with Moodle 1.9 Beta 4 (2007101506)


$string['adminacceptccs'] = 'Que tipos de cartões de crédito serão aceites?';
$string['adminaccepts'] = 'Selecione métodos de pagamento permitidos e os seus tipos';
$string['adminauthcode'] = 'Se um cartão de crédito de um utilizador não for (capturado) directamente na Internet,obter autorização do código pelo telefone através do banco do cliente.';
$string['adminauthorizeccapture'] = 'Revisão da ordem e Definições da captação programada (Scheduled)';
$string['adminauthorizeemail'] = 'Definições de envio de Email';
$string['adminauthorizesettings'] = 'Definições Authorize.net';
$string['adminauthorizewide'] = 'Definições Site-Wide';
$string['adminavs'] = 'Seleccione se tem activado o Address Verification System (AVS) na sua conta authorize.net. Irá pedir dados sobre o endereço, como Rua, Estado, País quando o utilizador preencher o formulário de pagamento';
$string['adminconfighttps'] = 'Verifique ter \"<a href=\"$a->url\"> ligado loginhttps</a>\" para usar este plugin<br /> em Administração >> Variáveis>> Segurança >> Segurança HTTP';
$string['adminconfighttpsgo'] = 'Visite <a href=\"$a->url\">página segura</a> para configurar este plugin.';
$string['admincronsetup'] = 'O script de manutenção cron.php não tem sido executado pelo menos nas últimas 24 Horas.<br /> O cron tem que estar activo se quiser utilizar a característica de captação programada (scheduled-capture).<br /><strong>Activar</strong> \'Authorize.net plugin\' e <strong>setup cron</strong> apropriadamente; ou <strong>desactive an_review</strong> novamente.<br />Se desactivar a captação programada, as transacções serão canceladas a menos que as tenha revisto no prazo de 30 dias.<br />Verifique <strong>an_review</strong> e insira \'0\' no campo <strong>an_capture_day</strong><br />se quiser aceitar/negar os pagamentos a 30 dias manualmente.';
$string['adminemailexpired'] = 'Isto é útil para \'Captação Manual\'. Os Administradores são notificados <b>$a</b> dias previamente antes de expirarem os pedidos pendentes.';
$string['adminemailexpiredsort'] = 'Quando o número de pedido pendentes a expirar são enviados para os professores via email, quais são os importantes?';
$string['adminemailexpiredsortcount'] = 'Número dos pedidos';
$string['adminemailexpiredsortsum'] = 'Total das quantidades';
$string['adminemailexpiredteacher'] = 'Se activar a Captação Manual (ver acima) e os professores puderem controlar os pagamentos, o professor pode ser notificado sobre as ordens pendentes a expirar. Será enviado um email para cada professor de disciplina a dizer quantas ordens pendentes estão a expirar.';
$string['adminemailexpsetting'] = '(0=desactivar envio de email, por omissão=2, max=5)<br />(Definições de Captação Manual para envios de email: cron=activo, an_review=verificado, an_capture_day=0, an_emailexpired=1-5)';
$string['adminhelpcapturetitle'] = 'Dia de captação programada';
$string['adminhelpreviewtitle'] = 'Revisão dos pedidos';
$string['adminneworder'] = 'Exmº Sr. Administrador,

Recebeu um novo pedido pendente:

ID do Pedido: $a->orderid
ID da Transacção : $a->transid
Utilizador: $a->user
Disciplina: $a->course
Quantidade: $a->amount

CAPTAÇÃO PROGRAMADA ACTIVA?: $a->acstatus

Se a captação programada estiver activa o cartão de crédito será captado em $a->captureon
e então o Aluno será inscrito na Disciplina, caso contrário expirará em $a->expireon e não poderá ser captado depois deste dia.

Também poderá aceitar/negar o pagamento para inscrever o aluno imediatamente seguindo este link:
$a->url';
$string['adminnewordersubject'] = '$a->course: Novo pedido pendente ($a->orderid)';
$string['adminpendingorders'] = 'Desactivou a característica de captação programada.<br />O total $a->count de transacções com estatuto de \'Captação Autorizada/Pendente\' será cancelado a menos que active isto.<br />Para aceitar/negar pagamentos vá à página <a href=\'$a->url\'>Controlo de Pagamentos</a>.';
$string['adminreview'] = 'Rever pedido antes de processar o cartão de crédito.';
$string['adminteachermanagepay'] = 'Os professores podem controlar os pagamentos da Disciplina.';
$string['allpendingorders'] = 'Todas as ordens pendentes';
$string['amount'] = 'Quantidade';
$string['anlogin'] = 'Authorize.net: Nome de utilizador';
$string['anpassword'] = 'Authorize.net: Senha';
$string['anreferer'] = 'Defina o URL referente se tiver configurado isto na sua conta authorize.net. Isto enviará uma linha \"Referente: URL\" incluida no seu pedido web.';
$string['antestmode'] = 'Corra as transacções apenas em modo de teste (não será despejado dinheiro)';
$string['antrankey'] = 'Authorize.net: Chave de Transacção';
$string['approvedreview'] = 'Revisão aprovada';
$string['authcaptured'] = 'Autorizado / Captado';
$string['authcode'] = 'Código de autorização';
$string['authorize:managepayments'] = 'Controlar Pagamentos';
$string['authorize:uploadcsv'] = '(Upload/carregar) ficheiro CSV';
$string['authorizedpendingcapture'] = 'Autorizado / Captação Pendente';
$string['avsa'] = 'Endereço (Rua) igual, Código Postal não';
$string['avsb'] = 'Informação do Endereço não fornecida';
$string['avse'] = 'Erro de Sistema ao verificar Endereço';
$string['avsg'] = 'Não é um Cartão emitido por um banco dos E.U.A.';
$string['avsn'] = 'Não é igual nem o Endereço (Rua) nem o Código Postal';
$string['avsp'] = 'Sistema de verificação de Endereço não aplicável';
$string['avsr'] = 'Tente outra vez - Sistema indisponível ou timed out';
$string['avsresult'] = '<b>Resultado AVS:</b> $a';
$string['avss'] = 'Serviço não suportado pelo editor';
$string['avsu'] = 'Informação do endereço indisponível';
$string['avsw'] = 'Código Postal de 9 digitos igual, o endereço (Rua) não';
$string['avsx'] = 'O endereço (Rua) e Código Postal de 9 digitos igual';
$string['avsy'] = 'O endereço (Rua) e Código Postal de 5 digitos igual';
$string['avsz'] = 'Código Postal de 5 digitos igual, o endereço (Rua) não';
$string['canbecredit'] = 'Pode ser reembolsado para $a->upto';
$string['cancelled'] = 'Cancelado';
$string['capture'] = 'Captação';
$string['capturedpendingsettle'] = 'Captado / Estabelecimento Pendente';
$string['capturedsettled'] = 'Captado / Estabelecido';
$string['captureyes'] = 'O cartão de crédito será captado e o aluno será inscrito na Disciplina. Tem a certeza?';
$string['ccexpire'] = 'Data de expiração';
$string['ccexpired'] = 'O cartão de crédito expirou';
$string['ccinvalid'] = 'Número de cartão inválido';
$string['cclastfour'] = 'Últimos 4 do cartão de crédito';
$string['ccno'] = 'Número do cartão de crédito';
$string['cctype'] = 'Tipo de cartão de crédito';
$string['ccvv'] = 'Verificação de cartão';
$string['ccvvhelp'] = 'Olhe para a parte de trás do cartão (3 ultimos digitos)';
$string['choosemethod'] = 'Se sabe a chave de acesso à Disciplina, por favor insira-a; caso contrário terá que pagar esta Disciplina';
$string['chooseone'] = 'Preencha um ou ambos dos campos seguintes';
$string['costdefaultdesc'] = '<strong>Nas configurações da disciplina, introduza -1</strong> para usar o custo por defeito.';
$string['cutofftime'] = 'Interrupção na transacção. Quando foi a última transacção estabelecida?';
$string['delete'] = 'Destruir';
$string['description'] = 'O módulo Authorize.net permite-lhe definir Disciplinas pagas através de fornecedores CC. Se o custo para qualquer Disciplina for zero, não serão pedidos pagamentos aos alunos para entrar. Duas formas de definir custos (1) um custo Site-Wide por defeito para todo o site (2) uma definição na Disciplina que poderá ser ajustada para cada Disciplina individualmente. O custo do curso cancela o custo por defeito.<br /><br /><b>Nota: </b> se incorporar uma chave do inscrição nas definições da Disciplina, então os alunos terão também a opção de registo através de uma chave. Isto é útil caso queira ter alunos pagantes e outros não-pagantes.';
$string['echeckabacode'] = 'Número de Banco ABA';
$string['echeckaccnum'] = 'Número de conta de Banco';
$string['echeckacctype'] = 'Tipo de conta de Banco';
$string['echeckbankname'] = 'Nome do Banco';
$string['echeckbusinesschecking'] = '(Confirmação de Negócio)';
$string['echeckchecking'] = '(Confirmando/ A Confirmar)';
$string['echeckfirslasttname'] = 'Dono da conta de Banco';
$string['echecksavings'] = 'Poupanças';
$string['enrolname'] = 'Gateway de Pagamento Authorize.net';
$string['expired'] = 'Expirou';
$string['haveauthcode'] = 'Já tenho um código de autorização';
$string['howmuch'] = 'Quanto?';
$string['httpsrequired'] = 'Lamentamos informá-lo mas o seu pedido não pode ser processado agora. A configuração do site não pode ser ajustado correctamente.<br /><br />Por favor não insira o número do cartão do crédito a menos que veja um cadeado amarelo no browser. Se o símbolo aparecer, significa que a página encripta todos os dados emitidos entre o cliente e o servidor. Então a transacção da informação entre os dois computadores é protegida, pelo que o seu número do cartão de crédito não será capturado na Internet.';
$string['invalidaba'] = 'Número ABA inválido';
$string['invalidaccnum'] = 'Número de conta inválido';
$string['invalidacctype'] = 'Tipo de conta inválido';
$string['isbusinesschecking'] = 'Tem verificação de negócio?';
$string['logindesc'] = 'Esta opção tem que estar ON. <br /><br />Certifique-se que colocou <a href=\"$a->url\">loginhttps ON</a> in Admin >> Variables >> Security.<br /><br />Colocando isto ON fará com que o Moodle utilize o protocolo de ligação segura https para o login e páginas de pagamento.';
$string['logininfo'] = 'Não se mostram o nome de utilizador, senha e chaves de transacção devido a questões de segurança. Não será necessário introduzir de novo estes campos se estes já foram configurados anteriormente. Deverá ver um texto a verde á esquerda da (caixa de texto) se certos campos já foram configurados. Se introduz estes campos pela primeira vez, o nome do Login(*) é obrigatório e <strong> também </strong> deve introduzir a chave de transacção(#1)  <strong> ou </strong> a password(#2) na caixa de texto apropriada. Recomendamos que introduza a chave de transacção devido a precauções de questões de segurança. Se quiser apagar a password actual, (coloque um viste na checkbox).';
$string['methodcc'] = 'Cartão de crédito';
$string['methodecheck'] = '(eCheck)(ACH)';
$string['missingaba'] = 'Número ABA em falta';
$string['missingaddress'] = 'Falta Endereço';
$string['missingbankname'] = 'Nome do Banco em falta';
$string['missingcc'] = 'Falta Número do Cartão de Crédito';
$string['missingccauthcode'] = 'Código de autorização em falta';
$string['missingccexpire'] = 'Falta Data de expiração';
$string['missingcctype'] = 'Falta Tipo do Cartão de Crédito';
$string['missingcvv'] = 'Falta Verificação';
$string['missingzip'] = 'Falta Código Postal';
$string['mypaymentsonly'] = 'Mostrar apenas os meus pagamentos';
$string['nameoncard'] = 'Nome no Cartão';
$string['new'] = 'Novo';
$string['noreturns'] = 'Sem retorno!';
$string['notsettled'] = 'Não estabelecida';
$string['orderdetails'] = 'Detalhes do pedido';
$string['orderid'] = 'ID Pedido';
$string['paymentmanagement'] = 'Controlo de Pagamentos';
$string['paymentmethod'] = 'Método de pagamento';
$string['paymentpending'] = 'O seu pagamento está pendente para esta Disciplina com o número de pedido $a->orderid. Veja <a href=\'$a->url\'>Detalhes de pedido</a>.';
$string['pendingecheckemail'] = 'Estimado (responsável/administrador/etc..)
Existem echecks $a->count pendentes e é necessário fazer o upload para um ficheiro CSV para obter os utilizadores inscritos.';
$string['pendingechecksubject'] = '$a->course: eChecks pendentes ($a->count)';
$string['pendingordersemail'] = 'Exmº Sr. Administrador,

$a->pending transacções para a Disciplina \"$a->course\" expirarão a menos que aceite os pagamentos a $a->days dias.

Esta é uma mensagem de aviso, porque não activou a captação programada. 
Isto quer dizer que terá que aceitar ou negar os pagamentos manualmente.

Para aceitar/negar pagamentos pendentes vá a:
$a->url

Para activar a captação programa, para não receber mais emails de aviso, vá a:

$a->enrolurl';
$string['pendingordersemailteacher'] = 'Exmº Sr. Professor,

$a->pending transacções custaram $a->currency $a->sumcost para a Disciplina \"$a->course\"
expirará a menos que aceite pagamentos a $a->days dias.

Terá que aceitar ou negar pagamentos manualmente porque o administrador não activou a captação programada.

$a->url';
$string['pendingorderssubject'] = 'AVISO: $a->course, $a->pending pedido(s) expirarão em $a->days dia(s).';
$string['reason11'] = 'Uma transacção duplicada foi submetida';
$string['reason13'] = 'O ID de login do comerciante é inválido ou a conta está inactiva';
$string['reason16'] = 'A transacção não foi encontrada';
$string['reason17'] = 'O comerciante não aceita este tipo de cartão de crédito.';
$string['reason245'] = '(Este tipo de eCheck não é permitido quando usar o formulário de pagamento)';
$string['reason246'] = 'Este tipo de eCheck não é permitido';
$string['reason27'] = 'A transacção resultou numa má combinação AVS. O endereço fornecido não é igual ao enderço da factura do possuidor do cartão.';
$string['reason28'] = 'O comerciante não aceita este tipo de cartão de crédito.';
$string['reason30'] = 'A configuração com o processador é inválida. Contacte o fornecedor do serviço comercial.';
$string['reason39'] = 'O código da moeda fornecido é inválido, não suportado, não permitido para este comércio ou não tem uma taxa de câmbio.';
$string['reason43'] = 'O comerciante foi incorretamente definido processador. Contacte o fornecedor do serviço comercial.';
$string['reason44'] = 'Esta transacção foi declinada. Erro no filtro de códigos do cartão!';
$string['reason45'] = 'Esta transacção foi declinada. Erro no filtro de códigos do cartão / AVS!';
$string['reason47'] = 'O valor pedido para o estabelecimento não pode ser maior que o valor originalmente autorizado.';
$string['reason5'] = 'Requerido um valor válido.';
$string['reason50'] = 'Esta transacção está à espera de ser estabelecida e não pode ser reembolsada.';
$string['reason51'] = 'A soma de todos os créditos desta transacção é maior que o valor original da transacção.';
$string['reason54'] = 'A transacção referida não reúne os critérios para emitir um crédito.';
$string['reason55'] = 'A soma de todos os créditos desta transacção excederá o valor originalmente debitado.';
$string['reason56'] = 'Este estabelecimento aceita apenas transacções eCheck(ACH); Transacções de cartão de crédito não são aceites.';
$string['refund'] = 'Reembolso';
$string['refunded'] = 'Reembolsado';
$string['returns'] = 'Retornos';
$string['reviewday'] = 'Captar o cartão de crédito automaticamente a não ser que um professor ou administrador revejam o pedido em <b>$a</b> dias. O CRON TEM QUE ESTAR ACTIVO.<br />(0 dias significa que irá desactivar a captação programada, significando que o professor ou administrador irão rever o pedido manualmente. A transacção será cancelada se desactivar a captação programada a não ser que a reveja em 30 dias).';
$string['reviewfailed'] = 'Revisão falhada';
$string['reviewnotify'] = 'O seu pagamento vai ser revisto. Aguarde um email dentro de alguns dias do seu professor.';
$string['sendpaymentbutton'] = 'Enviar pagamento';
$string['settled'] = 'Estabelecido';
$string['settlementdate'] = 'Data de estabelecimento';
$string['shopper'] = 'Comprador';
$string['subvoidyes'] = 'Transacção reembolsada $a->transid será cancelada e ser-lhe-á criado um crédito $a->amount na sua conta. Tem a certeza?';
$string['tested'] = 'Testado';
$string['testmode'] = 'Modo de Teste';
$string['testwarning'] = 'A captação/vácuo/crédito parecem estar a funcionar em modo de teste, mas nenhum registo foi actualizado ou inserido na base de dados.';
$string['transid'] = 'ID da Transacção';
$string['underreview'] = '(Em revisão/A rever)';
$string['unenrolstudent'] = 'Desinscrever Aluno?';
$string['uploadcsv'] = '(Upload/a carregar) ficheiro CSV';
$string['usingccmethod'] = 'Inscrever através de <a href=\"$a->url\"><strong>Cartão de Crédito</strong></a>';
$string['usingecheckmethod'] = 'Inscrever através de <a href=\"$a->url\"><strong>eCheck</strong></a>';
$string['verifyaccount'] = 'Verificar a sua conta no auhorize.net';
$string['verifyaccountresult'] = 'Resultado da verificação: $a';
$string['void'] = 'Vácuo';
$string['voidyes'] = 'A transacção será cancelada. Tem a certeza?';
$string['welcometocoursesemail'] = 'Caro aluno,
Obrigado pelo pagamento, Você increveu-se nas seguintes disciplinas:

$a->courses

Pode edutar o seu perfil em:
$a->profileurl

Pode ver os detalhes do seu pagamento em:
$a->paymenturl';
$string['youcantdo'] = 'Não pode efectuar esta acção: $a->action';
$string['zipcode'] = 'Código ZIP';

?>
