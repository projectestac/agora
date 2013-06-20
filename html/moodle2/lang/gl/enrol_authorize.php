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
 * Strings for component 'enrol_authorize', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_authorize
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminacceptccs'] = 'Que tipos de tarxetas de crédito se aceptarán?';
$string['adminaccepts'] = 'Seleccione os métodos de pagamento e os seus tipos';
$string['adminauthorizeccapture'] = 'Configuración de revisión de pedimentos e planificación de calendario';
$string['adminauthorizeemail'] = 'Configuración de envío de correo';
$string['adminauthorizesettings'] = 'Configuación da conta comercial Authorize.Net';
$string['adminauthorizewide'] = 'Configuración xeral';
$string['adminconfighttps'] = 'Confirme que ten o "<a href="{$a->url}">acceso https activado</a>" para usar este complemento<br />en Administración >> Variábeis >> Seguranza >> Seguranza HTTP.';
$string['adminconfighttpsgo'] = 'Vexa a <a href="{$a->url}">páxina segura</a> para configurar este complemento.';
$string['admincronsetup'] = 'O script de mantemento cron.php non se executou cando menos nas últimas 24 horas.<br />O cron debe activarse se quere a funcionalidade de planificar o calendario.<br /><b>Activar</b>o \'complemento Authorize.Net\' e <b>definir o cron</b> adecuadamente; ou <b>deseleccionar an_review</b> outra vez.<br />Se desactiva a planificación do calendario, as transaccións cancelaranse a non ser que as revise antes de 30 días.<br />Comprobe<b>an_review</b> e introduza <b>\'0\' para o campo an_capture_day</b><br />se quere aceptar/denegar <b>manualmente</b> pagamentos dentro de 30 días.';
$string['adminemailexpiredsort'] = 'Cando o número de solicitudes pendentes se lles envían aos profesores vía correo, cal é a importante?';
$string['adminemailexpiredsortcount'] = 'Conta de solicitudes';
$string['adminemailexpiredsortsum'] = 'Contía total';
$string['adminemailexpsetting'] = '(0=desactivar o envío de correo, predeterminado=2, máx=5)<br />(Configuración manual de captura para envíar correo: cron=activado, an_review=seleccionado, an_capture_day=0, an_emailexpired=1-5)';
$string['adminhelpcapturetitle'] = 'Día de planificación de calendario';
$string['adminhelpreviewtitle'] = 'Revisión de solicitude';
$string['adminneworder'] = 'Prezado administrador,

  Acaba de recibir unha nova solicitude pendente:

   ID da solicitude: {$a->orderid}
   ID da solicitude: {$a->transid}
   Usuario: {$a->user}
   Curso: {$a->course}
   Contía: {$a->amount}

   ESTÁ ACTIVADA A PLANIFICACIÓN DO CALENDARIO?: {$a->acstatus}

  Se a planificación do calendario está activa, a tarxeta de crédito recollerase en {$a->captureon}
  e así o usuario matricularase no curso; caso contrario, anularase
  en {$a->expireon} e non se recollerá despois deste día.

  Tamén pode aceptar/denegar o pagamento para matricular o estudante inmediatamente seguindo a seguinte ligazón:
  {$a->url}';
$string['adminnewordersubject'] = '{$a->course}: Nova solicitude pendente: {$a->orderid}';
$string['adminpendingorders'] = 'Ten desactivada a funcionalidade de planificación de calendario.<br />O total {$a->count} de transaccións co estado de \'recollida Autorizada/Pendente\' anularase de non ser que as comprobe.<br />Para aceptar/denegar pagamentos, vaia á páxina <a href=\'{$a->url}\'>Xestión de pagamentos</a>.';
$string['adminteachermanagepay'] = 'Os profesores poden xestionar o pagamentos do curso.';
$string['allpendingorders'] = 'Todas as solicitudes pendentes';
$string['amount'] = 'Contía';
$string['anauthcode'] = 'Obter código de autenticación';
$string['anauthcodedesc'] = 'Se non se pode recoller unha tarxeta de crédito do usuario na Internet directamente, obtéñase un código de autorización por teléfono do banco do cliente.';
$string['anavs'] = 'Sistema de comprobación de enderezo';
$string['anavsdesc'] = 'Marque isto se ten activado o sistema de comprobación de enderezo (AVS, polas súas siglas en inglés) na súa conta comercial de Authorize.Net. Solicitaránselle campos de enderezo como vía, provincia, país e zip cando o usuario cubra o formulario de pagamento.';
$string['ancaptureday'] = 'Día de recollida';
$string['ancapturedaydesc'] = 'Recoller a tarxeta de crédito automaticamente a non ser que un profesor ou administrador revise a solicitude dentro duns días especificados. O CRON DEBE ESTAR ACTIVADO.<br />(0 días significa que se desactivará a planificación de calendario, tamén significa que un profesor ou admin revisa a solicitude manualmente. A transacción cancelarase se desactiva a planificación de calendario ou a non ser que vostede a revise dentro de 30 días)';
$string['anemailexpired'] = 'Notificación de expiración';
$string['anemailexpireddesc'] = 'Isto é práctico para \'planificación-manual\'. Os administradores reciben notificación sobre o número de días antes de que as solicitudes pendentes expiren.';
$string['anemailexpiredteacher'] = 'Notificación de expiración - Profesor';
$string['anemailexpiredteacherdesc'] = 'De ter activada a planificación-manual (véxase arriba) e se os profesores poden xestionar os pagamentos, tamén poden recibir notificacións sobre expiración de solicitudes pendentes. Con isto, enviaráselles un correo a cada un dos profesores do curso sobre a cantidade de solicitudes pendentes que expiran.';
$string['anlogin'] = 'Authorize.Net: Nome de acceso';
$string['anpassword'] = 'Authorize.Net: Contrasinal';
$string['anreferer'] = 'Referencia';
$string['anrefererdesc'] = 'Define a referencia URL se a ten estabelecida na súa conta comercial de Authorize.Net. Enviará unha liña "Referer: URL" incorporada na solicitude web.';
$string['anreview'] = 'Revisar';
$string['anreviewdesc'] = 'Revisar a solicitude antes de procesar a tarxeta de crédito.';
$string['antestmode'] = 'Modo de proba';
$string['antestmodedesc'] = 'Executar transaccións en modo de proba que só permite lectura (non se recadrá ningún diñeiro)';
$string['antrankey'] = 'Authorize.Net: Clave de transacción';
$string['approvedreview'] = 'Revisión aprobada';
$string['authcaptured'] = 'Autorizada / Recollida';
$string['authcode'] = 'Código de autorización';
$string['authorize:config'] = 'Configurar as instancias de matriculación Authorize.Net';
$string['authorizedpendingcapture'] = 'Recollida Autorizada / Pendente';
$string['authorizeerror'] = 'Erro en Authorize.Net: {$a}';
$string['authorize:manage'] = 'Xestionar os usuarios matriculados';
$string['authorize:managepayments'] = 'Xestionar os pagamentos';
$string['authorize:unenrol'] = 'Desmatricular usuarios inscritos';
$string['authorize:unenrolself'] = 'Desmatricularse un mesmo do curso';
$string['authorize:uploadcsv'] = 'Subir ficheiro CSV';
$string['avsa'] = 'O enderezo (a vía) coincide, o código postal non';
$string['avsb'] = 'Non se forneceu información de enderezo';
$string['avse'] = 'Produciuse un erro no sistema de comprobación de enderezos';
$string['avsg'] = 'Banco emisor da tarxeta non é norteamericano';
$string['avsn'] = 'Non coincide o enderezo (vía) nin o código postal';
$string['avsp'] = 'Non é aplicábel o sistema de comprobación de enderezos';
$string['avsr'] = 'Volver tentar - o sistema non está dispoñíbel ou esgotou o tempo';
$string['avsresult'] = 'Resultado do AVS: {$a}';
$string['avss'] = 'O servizo non é compatíbel co emisor';
$string['avsu'] = 'A información de enderezo non está dispoñíbel';
$string['avsw'] = 'O código postal dixital de 9 díxitos coincide, o enderezo (vía) non';
$string['avsx'] = 'O enderezo (vía) e o código postal de 9 díxitos coinciden';
$string['avsy'] = 'O enderezo (vía) e o código postal de 5 díxitos coinciden';
$string['avsz'] = 'O código postal de 5 díxitos coincide, o enderezo (vía) non';
$string['canbecredit'] = 'Pode devolverse a {$a->upto}';
$string['cancelled'] = 'Cancelado';
$string['capture'] = 'Recollido';
$string['capturedpendingsettle'] = 'Liquidación Recollida / Pendente';
$string['capturedsettled'] = 'Recollido / Asento';
$string['captureyes'] = 'A tarxeta de crédito recollerase e o estudante matricularase no curso. Quere confirmalo?';
$string['cccity'] = 'Cidade';
$string['ccexpire'] = 'Data de expiración';
$string['ccexpired'] = 'A tarxeta de crédito xa expirou';
$string['ccinvalid'] = 'Número de tarxeta incorrecto';
$string['cclastfour'] = 'CC para os últimos catro';
$string['ccno'] = 'Número de tarxeta de crédito';
$string['ccstate'] = 'Estado';
$string['cctype'] = 'Tipo de tarxeta de crédito';
$string['ccvv'] = 'Comprobación da tarxeta';
$string['ccvvhelp'] = 'Mire na parte de atrás da tarxeta (últimos 3 díxitos)';
$string['choosemethod'] = 'Se coñece a clave de matriculación do curso, introdúzaa a seguir;<br />En caso contrario terá que aboar este curso.';
$string['chooseone'] = 'Cubra un ou ambos os dous seguintes campos. O contrasinal non se amosará.';
$string['cost'] = 'Custo';
$string['costdefaultdesc'] = '<strong>Na configuración, introduza -1</strong> para usar o custo predeterminado no campo de custo do curso.';
$string['currency'] = 'Moeda';
$string['cutofftime'] = 'Hora de corte';
$string['cutofftimedesc'] = 'Hora de corte de transacción. Cando se colla a última transacción para facer a liquidación?';
$string['dataentered'] = 'Datos introducidos';
$string['delete'] = 'Destruír';
$string['description'] = 'O módulo Authorize.Net permítelle estabelecer o pagamento de cursos vía fornecedores de pasarela de pagamento. Hai dúas posibilidades de estabelecer o custo do curso (1) un custo transversal no sitio como predeterminado para todo o sitio ou (2) a opción de estabelecer unha diferente para cada curso individualmente. O custo do curso sobrescribe o custo do sitio.';
$string['echeckabacode'] = 'Número de Banco ABA';
$string['echeckaccnum'] = 'Número de conta bancaria';
$string['echeckacctype'] = 'Tipo de conta bancaria';
$string['echeckbankname'] = 'Nome do banco';
$string['echeckbusinesschecking'] = 'Cheque comercial';
$string['echeckchecking'] = 'Comprobación';
$string['echeckfirslasttname'] = 'Propietario de conta bancaria';
$string['echecksavings'] = 'Aforro';
$string['enrolenddate'] = 'Válido ata';
$string['enrolenddaterror'] = 'A data final de validez non pode ser anterior á data inicial';
$string['enrolname'] = 'Pasarela de pagamentos Authorize.Net';
$string['enrolperiod'] = 'Duración da matriculación';
$string['enrolstartdate'] = 'Data de inicio';
$string['expired'] = 'Caducada';
$string['expiremonth'] = 'Mes de expiración';
$string['expireyear'] = 'Ano de expiración';
$string['firstnameoncard'] = 'Nome propio na tarxeta';
$string['haveauthcode'] = 'Xa teño un código de autorización';
$string['howmuch'] = 'Canto?';
$string['httpsrequired'] = 'Pregamos desculpas ao ter que informalo de que a súa solicitude non se pode procesar agora. A configuración deste sitio podería non estar correctamente feita. <br /><br />Por favor, non introduza o seu número de tarxeta de crédito a non ser que vexa un candado amarelo na parte inferior do navegador. Se o símbolo aparece, significa que a páxina cifra todos os datos enviados entre cliente e servidor. Deste modo, a información intercambiada durante a transacción entre os dous computadores está protexida, co fin de que o seu número de tarxeta de crédito non poida ser recollido na Internet.';
$string['invalidaba'] = 'Número ABA incorrecto';
$string['invalidaccnum'] = 'Número de conta incorrecto';
$string['invalidacctype'] = 'Tipo de conta incorrecto';
$string['isbusinesschecking'] = 'É unha conta de cheques empresarial?';
$string['lastnameoncard'] = 'Apelidos na tarxeta';
$string['logindesc'] = 'Esta opción debe estar activa.<br /><br />Asegúrese de que <a href="{$a->url}">acceso https está activo</a> en Administración >> Variábeis >> Seguranza.<br /><br />Ao estar isto activo, Moodle usa unha conexión segura https soamente para o acceso e as páxinas de pagamento.';
$string['logininfo'] = 'Ao configurar a conta Authorize.Net, solicítase o nome de acceso e debe introducir <strong>ben</strong> a clave de transacción <strong>ou</strong> o contrasinal na caixa apropiada. Recomendámoslle que introduza a clave de transacción debido a precaucións de seguranza.';
$string['messageprovider:authorize_enrolment'] = 'Mensaxes de matriculación Authorize.Net';
$string['methodcc'] = 'Tarxeta de crédito';
$string['methodccdesc'] = 'Seleccione a tarxeta de crédito e acepte os tipos a seguir';
$string['methodecheck'] = 'eCheck (ACH)';
$string['methodecheckdesc'] = 'Seleccione eCheck e acepte os tipos a seguir';
$string['missingaba'] = 'Falta do número ABA';
$string['missingaddress'] = 'Falta o enderezo';
$string['missingbankname'] = 'Falta o nome do banco';
$string['missingcc'] = 'Falta o número da tarxeta';
$string['missingccauthcode'] = 'Falta o código de autorización';
$string['missingccexpiremonth'] = 'Falta o mes de expiración';
$string['missingccexpireyear'] = 'Falta o ano de expiración';
$string['missingcctype'] = 'Falta o tipo de tarxeta';
$string['missingcvv'] = 'Falta o número de comprobación';
$string['missingzip'] = 'Falta o código postal';
$string['mypaymentsonly'] = 'Amosar soamente os meus pagamentos';
$string['nameoncard'] = 'Nome na tarxeta';
$string['new'] = 'Nova';
$string['nocost'] = 'Non hai custo asociado coa matriculación neste curso vía Authorize.Net!';
$string['noreturns'] = 'Sen devolucións!';
$string['notsettled'] = 'Non liquidado';
$string['orderdetails'] = 'Detalles da solicitude';
$string['orderid'] = 'IDSolicitude';
$string['paymentmanagement'] = 'Xestión de pagamentos';
$string['paymentmethod'] = 'Método de pagamento';
$string['paymentpending'] = 'O seu pagamento está pendente para este curso con este número de orde {$a->orderid}. Vexa os <a href=\'{$a->url}\'>Detalles da solicitude</a>.';
$string['pendingecheckemail'] = 'Prezado xestor,

Hai {$a->count} echecks pendentes agora e ten que subir un ficheiro csv para ter os usuarios matriculados.

Prema na ligazón e lea o ficheiro de axuda na páxina que se ve:
{$a->url}';
$string['pendingechecksubject'] = '{$a->course}: eChecks pendentes ({$a->count})';
$string['pendingordersemail'] = 'Prezado administrador,

{$a->pending} transaccións do curso "{$a->course}" expirarán a non ser que acepte o pagamento antes de $a{->days} día.

Esta é unha mensaxe de aviso, porque non activou a planificación de calendario.
Iso significa que ten que aceptar ou denegar pagamentos manualmente.

Para aceptar/denegar os pagamentos pendentes vaia a:
{$a->url}

Para activar a planificación de calendario, o que significa que xa non recibirá ningún correo de aviso máis, vaia a:

{$a->enrolurl}';
$string['pendingordersemailteacher'] = 'Prezado profesor,

{$a->pending} transaccións cun custo de {$a->currency} {$a->sumcost} do curso "{$a->course}"
expirarán a non ser que acepte o pagamento antes de {$a->days} días.

Ten que aceptar ou denegar pagamentos manualmente porque o administrador non activou a planificación de calendario.

{$a->url}';
$string['pendingorderssubject'] = 'COIDADO: No curso {$a->course}, {$a->pending} solicitude(s) expirarán antes de {$a->days} día(s).';
$string['pluginname'] = 'Authorize.Net';
$string['reason11'] = 'Unha transacción duplicada non se enviou.';
$string['reason13'] = 'O ID de acceso da entidade non é correcto ou a conta non está activa.';
$string['reason16'] = 'Non se atopou a transacción.';
$string['reason17'] = 'A entidade non acepta este tipo de tarxeta de crédito.';
$string['reason245'] = 'Este tipo de eCheck non se admite ao usar a pasarela de pagamentos aloxada no formulario de pagamento.';
$string['reason246'] = 'Non se admite este tipo de eCheck.';
$string['reason27'] = 'A transacción indica que o AVS non coincide. O enderezo fornecido non coincide co enderezo de facturación ou o propietario da tarxeta.';
$string['reason28'] = 'A entidade non acepta este tipo de tarxeta de crédito.';
$string['reason30'] = 'A configuración co procesador non é correcta. Chame á entidade fornecedora do servizo.';
$string['reason39'] = 'O código de moeda fornecido ou ben non é correcto, non é compatíbel ou esta entidade non o admite ou non ten unha taxa de troco.';
$string['reason43'] = 'O procesador configurou incorrectamente a entidade. Chame á súa entidade fornecedora do servizo.';
$string['reason44'] = 'Declinouse esta transacción. Produciuse un erro no filtro do código da tarxeta!';
$string['reason45'] = 'Declinouse esta transacción. Produciuse un erro no filtro código / AVS da tarxeta!';
$string['reason47'] = 'A contía solicitada para liquidación non pode ser maior que a contía orixinal autorizada.';
$string['reason5'] = 'É necesaria unha contía.';
$string['reason50'] = 'Esta transacción está pendente de liquidación e non se pode devolver.';
$string['reason51'] = 'A suma de todos os créditos contra esta transacción é maior que a contía da transacción orixinal.';
$string['reason54'] = 'A transacción referenciada non atopa os criterios para a emisión do crédito.';
$string['reason55'] = 'A suma de créditos contra a transacción referenciada podería exceder a contía de débito orixinal.';
$string['reason56'] = 'Esta entidade soamente acepta transaccións eCheck (ACH); non se aceptan transaccións de tarxeta de crédito.';
$string['refund'] = 'Devolución';
$string['refunded'] = 'Devolto';
$string['returns'] = 'Devolve';
$string['reviewfailed'] = 'Fallou a revisión';
$string['reviewnotify'] = 'O seu pagamento revisarase. Agarde por un correo do seu profesor dentro duns poucos días.';
$string['sendpaymentbutton'] = 'Enviar pagamento';
$string['settled'] = 'Liquidado';
$string['settlementdate'] = 'Data de liquidación';
$string['shopper'] = 'Comprador';
$string['status'] = 'Permitir as matriculacións Authorize.Net';
$string['subvoidyes'] = 'A transacción devolta ({$a->transid}) vaise cancelar e isto provocará a diminunición de crédito {$a->amount} na súa conta. Quere confirmalo?';
$string['tested'] = 'Probado';
$string['testmode'] = '[MODO DE PROBA]';
$string['testwarning'] = 'A recollida/anulación/devolución parece funcionar no modo de proba pero non se actualizou nin inseriu ningún rexistro na base de datos.';
$string['transid'] = 'IDTransacción';
$string['underreview'] = 'En revisión';
$string['unenrolselfconfirm'] = 'Confirma que quere desmatricularse deste curso "{$a}"?';
$string['unenrolstudent'] = 'Desmatricular o estudante?';
$string['uploadcsv'] = 'Subir un ficheiro CSV';
$string['usingccmethod'] = 'Matricularse usando <a href="{$a->url}"><strong>Tarxeta de crédito</strong></a>';
$string['usingecheckmethod'] = 'Matricularse usando <a href="{$a->url}"><strong>eCheck</strong></a>';
$string['verifyaccount'] = 'Comprobando a súa conta da entidade Authorize.Net';
$string['verifyaccountresult'] = '<b>Resultado da comprobación:</b> {$a}';
$string['void'] = 'Anular';
$string['voidyes'] = 'A transacción cancelarase. Quere confirmalo?';
$string['welcometocoursesemail'] = 'Prezado/a {$a->name},

Grazas polo seu pagamento. Matriculouse nestes cursos:

{$a->courses}

Pode ver os detalles do seu pagamento ou editar o seu perfil:
 {$a->paymenturl}
 {$a->profileurl}';
$string['youcantdo'] = 'Non pode facer a seguinte acción: {$a->action}';
$string['zipcode'] = 'Código zip';
