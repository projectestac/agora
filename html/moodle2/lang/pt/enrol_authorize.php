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
 * Strings for component 'enrol_authorize', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_authorize
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminacceptccs'] = 'Que tipos de cartões de crédito são aceites?';
$string['adminaccepts'] = 'Selecione os métodos de pagamento permitidos e os tipos correspondentes';
$string['adminauthorizeccapture'] = 'Configuração de alterações de pedidos e agendamento de capturas';
$string['adminauthorizeemail'] = 'Configurações de envio de e-mail';
$string['adminauthorizesettings'] = 'Configurações da conta de cliente Authorize.net';
$string['adminauthorizewide'] = 'Configurações gerais';
$string['adminconfighttps'] = 'Verifique se ativou "<a href="$a->url">  loginhttps</a>" para usar este módulo. Esta configuração está em Administração - Variáveis - Segurança - Segurança HTTP';
$string['adminconfighttpsgo'] = 'Consulte a <a href="{$a->url}">página segura</a> para configurar este módulo.';
$string['admincronsetup'] = 'O script de manutenção cron.php não é executado há mais de 24 horas.<br /> O cron tem que estar ativo se quiser utilizar a opção de captação programada.<br /><strong>Ative o módulo</strong> "Authorize.net" e <strong>configure o cron</strong> de forma adequada; ou <strong>desative a opção an_review</strong> novamente.<br />Se desativar a captação programada as transações serão canceladas, a menos que as reveja no prazo de 30 dias.<br />Ative a opção <strong>an_review</strong> e introduza "0" (zero) no campo <strong>an_capture_day</strong><br />para aceitar/negar os pagamentos a 30 dias de forma manual.';
$string['adminemailexpiredsort'] = 'Quando o número de pedidos pendentes a expirar são enviados por e-mail aos professores qual é o mais importante?';
$string['adminemailexpiredsortcount'] = 'Número dos pedidos';
$string['adminemailexpiredsortsum'] = 'Valor total';
$string['adminemailexpsetting'] = '(0=desativar envio de e-mail, predefinido=2, max=5)<br />(Definições de captação manual para envios de e-mail: cron=ativo, an_review=assinalado, an_capture_day=0, an_emailexpired=1-5)';
$string['adminhelpcapturetitle'] = 'Data agendada para captura';
$string['adminhelpreviewtitle'] = 'Revisão de pedidos';
$string['adminneworder'] = 'Caro Administrador,

Recebeu um novo pedido que está pendente:

ID do Pedido: $a->orderid
ID da Transação : $a->transid
Utilizador: $a->user
Disciplina: $a->course
Valor: $a->amount

CAPTAÇÃO PROGRAMADA ACTIVA?: {$a->acstatus}

Se a captação programada estiver ativa o cartão de crédito será captado em {$a->captureon}, após o que o aluno será inscrito na disciplina.
Caso contrário, o pedido expirará em {$a->expireon}, não podendo ser captado depois deste dia.

Pode optar por aceitar/negar o pagamento para inscrever o aluno, imediatamente, seguindo este link:
{$a->url}';
$string['adminnewordersubject'] = 'Disciplina {$a->course}: Novo pedido pendente; {$a->orderid}';
$string['adminpendingorders'] = 'Desativou a opção de captação programada.<br />Um total de {$a->count} transações com estatuto de "Captação Autorizada/Pendente" será cancelado, a não ser que as reveja.<br />Para aceitar/negar pagamentos consulte a página <a href="$a->url">Gestão de Pagamentos</a>.';
$string['adminteachermanagepay'] = 'Os professores podem gerir os pagamentos da disciplina.';
$string['allpendingorders'] = 'Todos os pedidos pendentes';
$string['amount'] = 'Valor';
$string['anauthcode'] = 'Obter código de autenticação';
$string['anauthcodedesc'] = 'Se o cartão de crédito de um utilizador não puder ser validade diretamente através da Internet, então é necessário obter um código de autorização através de contacto telefónico com o banco.';
$string['anavs'] = 'Address Verification System';
$string['anavsdesc'] = 'Verifique esta questão se tiver ativado "Address Verification System (AVS) na sua conta em Authorize.Net. Neste caso são obrigatórios campos como Rua, Distrito, País e Código Postal quando o utilizador preenche o formulário de pagamento.';
$string['ancaptureday'] = 'Dia de captação';
$string['ancapturedaydesc'] = 'Obtenha o cartão de crédito automaticamente a não ser que um professor ou administrador altere o pedido dentro de um intervalo predefinido de dias. O CRON DEVE ESTAR EM FUNCIONAMENTO.<br />(zero dias significa que não será feita captação automática e indica que o professor ou administrador alteram os pedidos manualmente. A transação será cancelada se desativar esta opção ou se a alterar em 30 dias.)';
$string['anemailexpired'] = 'Notificação de expiração';
$string['anemailexpireddesc'] = 'Esta opção é útil para captação manual. Os administradores são notificados antecipadamente da data de expiração de pedidos pendentes. Este intervalo de dias pode ser especificado.';
$string['anemailexpiredteacher'] = 'Notificação de expiração - Professor';
$string['anemailexpiredteacherdesc'] = 'Se a captação manual estiver ativa (ver acima) e os professores puderem gerir pagamentos, então também serão notificados das pedidos pendentes a expirar. Será enviado um e-mail a cada professor da disciplina com indicação do número de pedidos pendentes a expirar.';
$string['anlogin'] = 'Authorize.net: Nome de utilizador';
$string['anpassword'] = 'Authorize.net: senha';
$string['anreferer'] = 'Referer';
$string['anrefererdesc'] = 'Indique o URL do referer se tiver configurado esta opção na sua conta de cliente em Authorize.Net. Se este campo estiver preenchido, será incluída uma linha "Referer: URL" no pedido web.';
$string['anreview'] = 'Rever';
$string['anreviewdesc'] = 'Rever pedido antes de processar o cartão de crédito.';
$string['antestmode'] = 'Modo de teste';
$string['antestmodedesc'] = 'Realizar transações apenas em modo de teste (não haverá levantamentos de dinheiro)';
$string['antrankey'] = 'Authorize.Net: Chave de transação';
$string['approvedreview'] = 'Revisão aprovada';
$string['authcaptured'] = 'Autorizado / Captado';
$string['authcode'] = 'Código de autorização';
$string['authorize:config'] = 'Configurar instâncias de inscrição Authorize.Net';
$string['authorizedpendingcapture'] = 'Captação autorizada / pendente';
$string['authorizeerror'] = 'Erro Authorize.Net: {$a}';
$string['authorize:manage'] = 'Gerir utilizadores inscritos';
$string['authorize:managepayments'] = 'Gerir Pagamentos';
$string['authorize:unenrol'] = 'Remover inscrições da disciplina';
$string['authorize:unenrolself'] = 'Remover a sua própria inscrição da disciplina';
$string['authorize:uploadcsv'] = 'Enviar ficheiro CSV';
$string['avsa'] = 'A morada (rua) corresponde, mas o código-postal não';
$string['avsb'] = 'Não foi fornecida a morada';
$string['avse'] = 'Erro do sistema Address Verification System';
$string['avsg'] = 'O banco emissor do cartão não é dos E.U.A.';
$string['avsn'] = 'A morada (rua) e o código-postal não correspondem';
$string['avsp'] = 'O sistema Addres Verification System não é aplicável';
$string['avsr'] = 'Tente novamente - o sistema está indisponível ou demorou muito tempo a responder';
$string['avsresult'] = 'Resultado AVS: {$a}';
$string['avss'] = 'Serviço não suportado pelo emissor';
$string['avsu'] = 'A morada não está disponível';
$string['avsw'] = 'O código-postal de 9 dígitos corresponde, mas a morada (rua) não';
$string['avsx'] = 'A morada (rua) e o código-postal de 9 dígitos correspondem';
$string['avsy'] = 'A morada (rua) e o código-postal de 5 dígitos correspondem';
$string['avsz'] = 'O código-postal de 5 dígitos corresponde, mas a morada (rua) não';
$string['canbecredit'] = 'Pode ser reembolsado até {$a->upto}';
$string['cancelled'] = 'Cancelado';
$string['capture'] = 'Captar';
$string['capturedpendingsettle'] = 'Captado / Autorização pendente';
$string['capturedsettled'] = 'Captado / Autorizado';
$string['captureyes'] = 'O cartão de crédito será captado e o aluno será inscrito na disciplina. Tem a certeza?';
$string['cccity'] = 'Cidade';
$string['ccexpire'] = 'Data de validade';
$string['ccexpired'] = 'O cartão de crédito expirou';
$string['ccinvalid'] = 'Número de cartão inválido';
$string['cclastfour'] = 'Últimos 4 dígitos do cartão de crédito';
$string['ccno'] = 'Número do cartão de crédito';
$string['ccstate'] = 'Distrito';
$string['cctype'] = 'Tipo de cartão de crédito';
$string['ccvv'] = 'Verificação de cartão';
$string['ccvvhelp'] = 'Veja a parte de trás do cartão (3 últimos dígitos)';
$string['choosemethod'] = 'Se conhece a senha de inscrição da disciplina, introduza-a; caso contrário terá que pagar para fazer a sua inscrição.';
$string['chooseone'] = 'Preencha um dos campos seguintes (ou ambos). A senha não é mostrada.';
$string['cost'] = 'Preço';
$string['costdefaultdesc'] = '<strong>Nas configurações da disciplina, introduza -1</strong> para usar o preço predefinido no campo de "Preço" da disciplina.';
$string['currency'] = 'Moeda';
$string['cutofftime'] = 'Interrupção na transação.';
$string['cutofftimedesc'] = 'Tempo de interrupção da transação. Quando a última transação for processada?';
$string['dataentered'] = 'Dados inseridos';
$string['delete'] = 'Destruir';
$string['description'] = 'O módulo Authorize.Net permite a configuração de pagamentos para acesso às disciplinas através serviços de pagamento online. Existem duas formas de configurar o preço de uma disciplina:<br /> (1) um valor predefinido a aplicar em todo o site. <br />(2) um valor individual, definido na configuração da disciplina.<br /> Este último valor tem prioridade sobre o primeiro.';
$string['echeckabacode'] = 'Identificação ABA do banco';
$string['echeckaccnum'] = 'Número da conta bancária';
$string['echeckacctype'] = 'Tipo de conta bancária';
$string['echeckbankname'] = 'Nome do banco';
$string['echeckbusinesschecking'] = 'A verificar a transação';
$string['echeckchecking'] = 'A verificar';
$string['echeckfirslasttname'] = 'Titular da conta';
$string['echecksavings'] = 'Poupanças';
$string['enrolenddate'] = 'Data de fim';
$string['enrolenddaterror'] = 'A data de fim de inscrição não pode ser anterior à data de início';
$string['enrolname'] = 'Portal de pagamento Authorize.net';
$string['enrolperiod'] = 'Duração da inscrição';
$string['enrolstartdate'] = 'Data de início';
$string['expired'] = 'Expirou';
$string['expiremonth'] = 'Mês de expiração';
$string['expireyear'] = 'Ano de expiração';
$string['firstnameoncard'] = 'Primeiro nome no cartão';
$string['haveauthcode'] = 'Já tenho um código de autorização';
$string['howmuch'] = 'Qual o preço?';
$string['httpsrequired'] = 'Lamentamos informá-lo de que não foi possível processar neste momento o seu pedido. Não foi possível configurar este site corretamente.<br /><br />Não deve indicar o número do cartão do crédito a menos que veja um cadeado amarelo na parte de baixo da janela do browser. Este símbolo significa que a página protege toda a informação transferida entre o cliente e o servidor impedindo que informação sensível, como o número de cartão de crédito, seja interceptado na Internet.';
$string['invalidaba'] = 'A identificação ABA não é válida';
$string['invalidaccnum'] = 'O número da conta bancária não é válido';
$string['invalidacctype'] = 'O tipo de conta bancária não é válido';
$string['isbusinesschecking'] = 'É verificação de negócio?';
$string['lastnameoncard'] = 'Último nome no cartão';
$string['logindesc'] = 'Esta opção tem que estar ativa. <br /><br />Certifique-se de que ativou a opção <a href="{$a->url}">loginhttps</a> em Administração » Variáveis » Segurança.<br /><br />A ativação desta opção fará com que o Moodle utilize o protocolo de ligação segura https para autenticar todas as páginas de pagamento.';
$string['logininfo'] = 'Ao configurar a sua conta Authorize.Net o nome de utilizador é obrigatório e deve indicar a chave de transação <strong>OU</strong> a senha no campo respetivo. Por questões de segurança, é recomendado que se introduza a chave de transação.';
$string['messageprovider:authorize_enrolment'] = 'Mensagens de inscrição Authorize.Net';
$string['methodcc'] = 'Cartão de crédito';
$string['methodccdesc'] = 'Selecione abaixo os cartões de crédito e tipos aceites';
$string['methodecheck'] = '(eCheck) (ACH)';
$string['methodecheckdesc'] = 'Selecione abaixo eCheck e tipos aceites';
$string['missingaba'] = 'Identificação ABA em falta';
$string['missingaddress'] = 'Morada em falta';
$string['missingbankname'] = 'Nome do banco em falta';
$string['missingcc'] = 'Número do cartão de crédito em falta';
$string['missingccauthcode'] = 'Código de autorização em falta';
$string['missingccexpiremonth'] = 'Mês de expiração em falta';
$string['missingccexpireyear'] = 'Ano de expiração em falta';
$string['missingcctype'] = 'Tipo do cartão em falta';
$string['missingcvv'] = 'Número de verificação em falta';
$string['missingzip'] = 'Código postal em falta';
$string['mypaymentsonly'] = 'Mostrar apenas os meus pagamentos';
$string['nameoncard'] = 'Nome no cartão';
$string['new'] = 'Novo';
$string['nocost'] = 'A inscrição nesta disciplina através de Authorize.Net é gratuita!';
$string['noreturns'] = 'Não são feitos reembolsos!';
$string['notsettled'] = 'Não estabelecida';
$string['orderdetails'] = 'Detalhe do pedido';
$string['orderid'] = 'Identificação do pedido';
$string['paymentmanagement'] = 'Gestão de pagamentos';
$string['paymentmethod'] = 'Método de pagamento';
$string['paymentpending'] = 'O pagamento para esta disciplina está pendente com o número de pedido {$a->orderid}. Consulte o <a href="{$a->url}">detalhe do pedido</a>.';
$string['pendingecheckemail'] = 'Caro(a) gestor(a),

Existem {$a->count} echecks pendentes e é necessário submeter um ficheiro CSV para inscrever os utilizadores.

Clique na hiperligação e leia o ficheiro de ajuda disponível em {$a->url}';
$string['pendingechecksubject'] = 'Disciplina: {$a->course}:  {$a->count} eChecks pendentes';
$string['pendingordersemail'] = 'Caro(a) administrador(a),

{$a->pending} transações relativas à disciplina "$a->course" estão prester a expirar, a menos que aceite os pagamentos nos próximos {$a->days} dias.

Esta mensagem de aviso foi enviada porque não ativou a captação programada.
Tal significa que terá que aceitar ou recusar os pagamentos manualmente.

Para aceitar/recusar pagamentos pendentes consulte a página {$a->url}

Pode ativar a captação programada e deixar de receber e-mails de aviso na página {$a->enrolurl}';
$string['pendingordersemailteacher'] = 'Caro(a) professora(a),

A disciplina {$a->course} tem neste momento {$a->pending} transações à espera de aprovação, num valor total de {$a->currency} {$a->sumcost}.
Estes pedidos serão cancelados em breve se estes pagamentos não forem aceites nos próximos {$a->days} dias.

Estes pagamentos terão que ser aceites/recusados manualmente porque o administrador não ativou a captação programada.

{$a->url}';
$string['pendingorderssubject'] = 'AVISO: Os $a->pending pedido(s) pendente(s) da disciplinas {$a->course} expirará(ão) dentro de {$a->days} dia(s).';
$string['pluginname'] = 'Authorize.Net';
$string['reason11'] = 'Foi submetida uma transação em duplicado.';
$string['reason13'] = 'A identificação da conta de cliente é inválida ou a conta não está ativa.';
$string['reason16'] = 'A transação não foi encontrada';
$string['reason17'] = 'O fornecedor do serviço não aceita este tipo de cartão de crédito.';
$string['reason245'] = 'Este tipo de eCheck não é permitido quando se usa o formulário de pagamento disponível no portal de pagamento.';
$string['reason246'] = 'Este tipo de eCheck não é permitido';
$string['reason27'] = 'A transação resultou numa discordância AVS. A morada introduzida não corresponde à morada de faturação do titular do cartão.';
$string['reason28'] = 'O fornecedor do serviço não aceita este tipo de cartão de crédito.';
$string['reason30'] = 'A configuração com o processador não é válida. Contacte o fornecedor do serviço.';
$string['reason39'] = 'O código da moeda fornecido não é válido, não é aceite, não é permitido nesta transação ou não tem taxa de câmbio associada.';
$string['reason43'] = 'O fornecedor do serviço não foi corretamente configurado no processador. Contacte o fornecedor do serviço para obter mais informações.';
$string['reason44'] = 'Esta transação foi recusada. Erro na verificação do código do cartão!';
$string['reason45'] = 'Esta transação foi recusada. Erro na verificação dos códigos do cartão / AVS!';
$string['reason47'] = 'O valor pedido para a transação não pode ser superior ao valor originalmente autorizado.';
$string['reason5'] = 'É obrigatória a introdução de um valor válido.';
$string['reason50'] = 'Esta transação está à espera de ser processada e não permite reembolsos.';
$string['reason51'] = 'A soma de todos os créditos associados a esta transação é superior ao valor original da transação.';
$string['reason54'] = 'A transação refereda não reúne os critérios necessários para a emissão de um crédito.';
$string['reason55'] = 'A soma de todos os créditos associados à transação referida excederia o valor originalmente debitado.';
$string['reason56'] = 'Este fornecedor de serviço aceita apenas transações eCheck (ACH). Não são aceites transações com cartão de crédito.';
$string['refund'] = 'Reembolso';
$string['refunded'] = 'Reembolsado';
$string['returns'] = 'Devoluções';
$string['reviewfailed'] = 'A revisão falhou';
$string['reviewnotify'] = 'O seu pagamento vai ser revisto. Deverá receber um e-mail do seu professor dentro de alguns dias.';
$string['sendpaymentbutton'] = 'Enviar pagamento';
$string['settled'] = 'Transação processada';
$string['settlementdate'] = 'Data de processamento da transação';
$string['shopper'] = 'Comprador';
$string['status'] = 'Autorizar inscrições através de Authorize.Net';
$string['subvoidyes'] = 'A transação reembolsada {$a->transid} será cancelada originando um crédito de {$a->amount} na sua conta. Tem a certeza?';
$string['tested'] = 'Testado';
$string['testmode'] = '[MODO DE TESTE]';
$string['testwarning'] = 'As operações de captação/esvaziamento/reembolso parecem estar a funcionar em modo de teste, mas não houve atualizações nem criação de novos registos na base de dados.';
$string['transid'] = 'Identificador da transação';
$string['underreview'] = 'Em revisão';
$string['unenrolselfconfirm'] = 'Tem a certeza de que quer remover a sua inscrição da disciplina "{$a}"?';
$string['unenrolstudent'] = 'Anular inscrição do aluno?';
$string['uploadcsv'] = 'Enviar ficheiro CSV';
$string['usingccmethod'] = 'Inscrever utilizando <a href="{$a->url}"><strong>Cartão de Crédito</strong></a>';
$string['usingecheckmethod'] = 'Inscrever utilizando <a href="{$a->url}"><strong>eCheck</strong></a>';
$string['verifyaccount'] = 'Verifique a sua conta de cliente em Authorize.Net';
$string['verifyaccountresult'] = '<b>Resultado da verificação:</b> {$a}';
$string['void'] = 'Vazio';
$string['voidyes'] = 'A transação será cancelada. Tem a certeza?';
$string['welcometocoursesemail'] = 'Caro(a) {$a->name},

Agradecemos os pagamentos efetuados. Inscreveu-se nas seguintes disciplinas:

{$a->courses}

Pode editar o seu perfil em:
{$a>profileurl}

Pode ver o detalhe dos seus pagamentos em:
{$a->paymenturl}';
$string['youcantdo'] = 'Não pode efetuar esta ação: {$a->action}';
$string['zipcode'] = 'Código Postal';
