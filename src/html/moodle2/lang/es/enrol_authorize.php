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
 * Strings for component 'enrol_authorize', language 'es', branch 'MOODLE_23_STABLE'
 *
 * @package   enrol_authorize
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminacceptccs'] = '¿Qué tarjetas de crédito se aceptan?';
$string['adminaccepts'] = 'Seleccione los métodos de pago y sus tipos';
$string['adminauthorizeccapture'] = 'Ajustes Revisar Orden y Auto-Capturar';
$string['adminauthorizeemail'] = 'Ajustes Enviar Email';
$string['adminauthorizesettings'] = 'Ajustes cuenta Authorize.net Merchant';
$string['adminauthorizewide'] = 'Ajustes generales';
$string['adminconfighttps'] = 'Por favor, asegúrese de que tiene "<a href="{$a->url}">el loginhttps ON</a>" para usar este \'plugin\'<br />en Admin >> Variables >> Seguridad >> Seguridad HTTP.';
$string['adminconfighttpsgo'] = 'Vaya a la <a href="{$a->url}">página segura</a> para configurar este \'plugin\'.';
$string['admincronsetup'] = 'El script de mantenimiento cron.php no ha sido ejecutado durante al menos 24 horas. <br />El cron debe estar habilitado si quiere usar la característica de captura programada.<br /><b>Active adecuadamente el</b> \'Authorize.net plugin\' y <b>setup cron</b>; o bien el <b>uncheck an_review</b> de nuevo.<br />Si desactiva la captura programada, las transacciones serán canceladas a menos que las revise dentro de los próximos 30 días.<br />Compruebe<b>an_review</b> y escriba <b>\'0\' en el campo an_capture_day</b> <br />si desea aceptar o denegar  <b>manualmente</b> los pagos en los próximos 30 días.';
$string['adminemailexpiredsort'] = 'Cuando el número de órdenes a expirar pendientes se envían a los profesores por email, ¿cuál es importante?';
$string['adminemailexpiredsortcount'] = 'Número de órdenes';
$string['adminemailexpiredsortsum'] = 'Cantidad total';
$string['adminemailexpsetting'] = '(0=deshabilitar envío de email, por defecto=2, máx.=5)<br />(Ajustes de captura manual para enviar email: cron=habilitado, an_review=marcado, an_capture_day=0, an_emailexpired=1-5)';
$string['adminhelpcapturetitle'] = 'Día de captura programada';
$string['adminhelpreviewtitle'] = 'Revisión de orden';
$string['adminneworder'] = 'Estimado Administrador,

Ha recibido una nueva orden pendiente:

ID Orden: {$a->orderid}
ID Transacción: {$a->transid}
Usuario: {$a->user}
Curso: {$a->course}
Cantidad: {$a->amount}

¿HABILITADA CAPTURA PROGRAMADA?: {$a->acstatus}

Si está habilitada la captura programada, la tarjeta de crédito será capturada en {$a->captureon}
y el usuario podrá matricularse en el curso; en caso contrario, expirará en on {$a->expireon} y no podrá ser capturada después de ese día.

Asimismo, usted puede aceptar o rechazar el pago para matricular al estudiante inmediatamente siguiendo este enlace:
{$a->url}';
$string['adminnewordersubject'] = '{$a->course}: Nueva Orden Pendiente({$a->orderid})';
$string['adminpendingorders'] = 'Ha deshabilitado la captura programada.<br />Un total de {$a->count} transacciones con estatus de AN_STATUS_AUTH serán canceladas a menos que lo marque.<br />Para aceptar o rechazar pagos, vaya a la página <a href=\'{$a->url}\'>Gestión de pagos</a>.';
$string['adminteachermanagepay'] = 'Los profesores pueden gestionar los pagos del curso.';
$string['allpendingorders'] = 'Todas las órdenes pendientes';
$string['amount'] = 'Cantidad';
$string['anauthcode'] = 'Obtener authcode';
$string['anauthcodedesc'] = 'Si la tarjeta de crédito de un usuario no pueden ser capturada directamente en Internet, obtener el código de autorización a través del teléfono del banco del cliente.';
$string['anavs'] = 'Sistema de verificación de direcciones';
$string['ancaptureday'] = 'Día de captura';
$string['anemailexpired'] = 'Notificación de expiración';
$string['anemailexpiredteacher'] = 'Notificación de expiración - Profesor';
$string['anlogin'] = 'Authorize.net: Usuario';
$string['anpassword'] = 'Authorize.net: Contraseña';
$string['anreferer'] = 'Escriba aquí la referencia URL en el caso de que usted la ajuste en su cuenta authorize.net, que enviará una cabecera "Referer: URL" en la petición web.';
$string['anreview'] = 'Revisar';
$string['anreviewdesc'] = 'Revise la orden antes de procesar la tarjeta de crédito.';
$string['antestmode'] = 'Modo test';
$string['antrankey'] = 'Authorize.net: Clave de transacción';
$string['approvedreview'] = 'Revisión aprobada';
$string['authcaptured'] = 'Autorizado / Capturado';
$string['authcode'] = 'Código de autorización';
$string['authorize:config'] = 'Configurar inscripciones desde Authorize.Net';
$string['authorizedpendingcapture'] = 'Autorizado / Pendiente de Captura';
$string['authorizeerror'] = 'Error Authorize.net: {$a}';
$string['authorize:manage'] = 'Gestionar usuarios matriculados';
$string['authorize:managepayments'] = 'Gestionar pagos';
$string['authorize:unenrol'] = 'Dar de baja usuarios del curso';
$string['authorize:unenrolself'] = 'Darse de baja del curso';
$string['authorize:uploadcsv'] = 'Subir archivo CSV';
$string['avsa'] = 'La dirección (calle) es correcta, pero el código postal no';
$string['avsb'] = 'Falta información sobre la dirección';
$string['avse'] = 'Error del sistema de verificación de la dirección';
$string['avsg'] = 'Banco emisor de tarjetas no de U.S.';
$string['avsn'] = 'No coinciden la dirección (calle) ni el código postal';
$string['avsp'] = 'Sistema de verificación de direcciones no aplicable';
$string['avsr'] = 'Reintentar - Sistema no disponible o fuera de tiempo';
$string['avsresult'] = 'Resultado AVS: {$a}';
$string['avss'] = 'Servicio no prestado por el proveedor';
$string['avsu'] = 'Información sobre dirección no disponible';
$string['avsw'] = 'El código postal de 9 dígitos coincide, pero la dirección (calle) no';
$string['avsx'] = 'La dirección (calle) y el código postal de 9 dígitos son correctos';
$string['avsy'] = 'La dirección (calle) y el código postal de 5 dígitos son correctos';
$string['avsz'] = 'El código postal de 5 dígitos es correcto, pero la dirección (calle) no';
$string['canbecredit'] = 'Puede reembolsarse hasta {$a->upto}';
$string['cancelled'] = 'Cancelado';
$string['capture'] = 'Captura';
$string['capturedpendingsettle'] = 'Liquidación Capturada / Pendiente';
$string['capturedsettled'] = 'Capturado / Liquidado';
$string['captureyes'] = 'La tarjeta de crédito será capturada y el estudiante será matriculado en el curso. ¿Está seguro?';
$string['cccity'] = 'Ciudad';
$string['ccexpire'] = 'Fecha de expiración';
$string['ccexpired'] = 'La tarjeta de crédito ha expirado';
$string['ccinvalid'] = 'Número de tarjeta no válido';
$string['cclastfour'] = 'Cuatro últimos CC';
$string['ccno'] = 'Número de la tarjeta de crédito';
$string['ccstate'] = 'Estado';
$string['cctype'] = 'Tipo de la tarjeta de crédito';
$string['ccvv'] = 'Verificación de la tarjeta CV2';
$string['ccvvhelp'] = 'Mire el reverso de la tarjeta (3 últimos dígitos)';
$string['choosemethod'] = 'Si conoce la clave de matriculación en el curso, escríbala;<br />en caso contrario, necesitará pagar para acceder al curso.';
$string['chooseone'] = 'Rellene uno o ambos de los siguientes dos campos';
$string['cost'] = 'Coste';
$string['costdefaultdesc'] = '<strong>En los ajustes del curso, escriba -1</strong> en el campo de costo para usar dicho costo por defecto.';
$string['currency'] = 'Moneda';
$string['cutofftime'] = 'Tiempo de corte';
$string['cutofftimedesc'] = 'Hora de cierre de transacciones. ¿Cuando se reoge  la última transacción  para su tramitación?.';
$string['dataentered'] = 'Datos introducidos';
$string['delete'] = 'Destruir';
$string['description'] = 'El módulo Authorize.net le permite ajustar cursos de pago vía proveedores CC. Si el costo de cualquier curso es cero, no se pedirá a los estudiantes que paguen. Existe un costo del sitio que usted ajusta aquí por defecto para todo el sitio y además un ajuste por curso que puede efectuar para cada curso individualmente. El costo del curso pasa por alto el costo del sitio.';
$string['echeckabacode'] = 'Número ABA Banco';
$string['echeckaccnum'] = 'Número de Cuenta Banco';
$string['echeckacctype'] = 'Tipo de Cuenta Banco';
$string['echeckbankname'] = 'Nombre del Banco';
$string['echeckbusinesschecking'] = 'Cheque de Negocios';
$string['echeckchecking'] = 'Cheque';
$string['echeckfirslasttname'] = 'Propietario Cuenta Banco';
$string['echecksavings'] = 'Descuentos';
$string['enrolenddate'] = 'Fecha final';
$string['enrolenddaterror'] = 'La fecha de final de matriculación no puede ser anterior a la fecha de comienzo';
$string['enrolname'] = 'Puerto de paso para pagos Authorize.net';
$string['enrolperiod'] = 'Periodo de matriculación';
$string['enrolstartdate'] = 'Fecha inicial';
$string['expired'] = 'Caducado';
$string['expiremonth'] = 'Mes de caducidad';
$string['expireyear'] = 'Año de caducidad';
$string['firstnameoncard'] = 'Nombre en la tarjeta';
$string['haveauthcode'] = 'Ya dispongo de un código de autorización';
$string['howmuch'] = '¿Cuánto?';
$string['httpsrequired'] = 'Lamentamos comunicarle que su solicitud no puede procesarse en este momento. La configuración de este sitio no se ha podido realizar correctamente.
<br /><br />
Por favor, no escriba su número de tarjeta de crédito a menos que vea un candado amarillo en la parte inferior del navegador. Ello significa transferidos entre cliente y servidor son encriptados, con el fin de proteger la información durante la transacción entre dos ordenadores y que el número de su tarjeta no puede ser capturado en internet.';
$string['invalidaba'] = 'Número ABA no válido';
$string['invalidaccnum'] = 'Número de cuenta no válido';
$string['invalidacctype'] = 'Tipo de cuenta no válido';
$string['isbusinesschecking'] = '¿Es comprobación de negocio?';
$string['lastnameoncard'] = 'Apellido en la tarjeta';
$string['logindesc'] = 'Puede seleccionar la opción <a href="{$a->url}">loginhttps</a> en la sección Variables/Seguridad.
<br /><br />
Si la selecciona, Moodle usará una conexión https segura únicamente en la página de acceso y pago.';
$string['logininfo'] = 'Debido a precauciones de seguridad, no se muestran el nombre de usuario, la contraseña ni la clave de transacción. No es preciso entrar de nuevo si usted ha configurado estos campos con anterioridad. Puede ver un texto en verde a la izquierda de la caja si algún campo está ya configurado. Si accede a estos campos por vez primera, es necesario el nombre de usuario (*) y usted deberá escribir <strong>o bien</strong> la clave de transacción (#1) <strong>o bien</strong> la contraseña (#2) en la casilla adecuada. Le recomendamos que escriba la clave de transacción debido a razones de seguridad. Si desea eliminar la contraseña actual, marque la casilla correspondiente.';
$string['methodcc'] = 'Tarjeta de crédito';
$string['methodccdesc'] = 'Seleccione más abajo la tarjeta de crédito y los tipos aceptados';
$string['methodecheck'] = 'eCheque (ACH)';
$string['methodecheckdesc'] = 'Seleccione más abajo el eCheck y los tipos aceptados';
$string['missingaba'] = 'Falta número ABA';
$string['missingaddress'] = 'Falta la dirección';
$string['missingbankname'] = 'Falta nombre de banco';
$string['missingcc'] = 'Falta el número de tarjeta de crédito';
$string['missingccauthcode'] = 'Falta código de autorización';
$string['missingccexpiremonth'] = 'Falta el mes de caducidad';
$string['missingccexpireyear'] = 'Falta el año de caducidad';
$string['missingcctype'] = 'Falta el tipo de tarjeta de crédito';
$string['missingcvv'] = 'Falta el número de verificación';
$string['missingzip'] = 'Falta el código postal';
$string['mypaymentsonly'] = 'Mostrar sólo mis pagos';
$string['nameoncard'] = 'Nombre que figura en la tarjeta';
$string['new'] = 'Nuevo';
$string['nocost'] = 'No hay ningún sobrecoste asociado a la inscripción en este curso a través de Authorize.Net';
$string['noreturns'] = '¡No devolución!';
$string['notsettled'] = 'No liquidado';
$string['orderdetails'] = 'Detalles de la orden';
$string['orderid'] = 'Orden ID';
$string['paymentmanagement'] = 'Gestión del pago';
$string['paymentmethod'] = 'Método de pago';
$string['paymentpending'] = 'El pago de este curso está pendiente con este número de orden {$a->orderid}. Vea <a href=\'{$a->url}\'>Detalles de la orden</a>.';
$string['pendingecheckemail'] = 'Estimado gestor,

En este momento hay {$a->count} echeques pendientes y usted debe subir un archivo csv para obtener los usuarios matriculados.

Haga clic en el enlace de abajo y lea el fichero de ayuda en la página:
{$a->url}';
$string['pendingechecksubject'] = '{$a->course}: eCheques pendientes({$a->count})';
$string['pendingordersemail'] = 'Estimado administrador,

{$a->pending} transacciones expirarán a menos que usted acepte el pago dentro de los próximos {$a->days} días.

Éste es un mensaje de advertencia, debido a que usted no ha habilitado la captura programada, lo que significa que tiene que aceptar o rechazar los pagos manualmente.

Para aceptar o rechazar pagos pendientes, vaya a:
{$a->url}

Para habilitar la captura programada (lo que significa que usted no recibirá en el futuro ningún email de advertencia), vaya a:

{$a->enrolurl}';
$string['pendingordersemailteacher'] = 'Estimado profesor,

{$a->pending} transacciones por un costo de {$a->currency} {$a->sumcost} para el curso "{$a->course}"
expirarán a menos que usted acepte el pago dentro de los próximos {$a->days} días.

Usted tiene que aceptar o rechazar los pagos manualmente debido a que el administrador no tiene habilitada la captura programada.

{$a->url}';
$string['pendingorderssubject'] = 'ATENCIÓN: {$a->course}, {$a->pending} orden(es) expirarán en {$a->days} día(s).';
$string['pluginname'] = 'Autorizar';
$string['reason11'] = 'Se ha enviado una transacción duplicada';
$string['reason13'] = 'La ID del login del proveedor no es válida o la cuenta está inactiva.';
$string['reason16'] = 'La transacción no se ha encontrado.';
$string['reason17'] = 'El proveedor no acepta este tipo de tarjeta de crédito.';
$string['reason245'] = 'Este tipo de eCheque no se admite cuando se usa el formulario de pago hospedado en la puerta de pago.';
$string['reason246'] = 'No se admite este tipo de eCheque';
$string['reason27'] = 'La transacción ha resultado en una discrepancia AVS. La dirección no se corresponde con la dirección de facturación del propietario de la tarjeta.';
$string['reason28'] = 'El proveedor no acepta este tipo de tarjeta de crédito.';
$string['reason30'] = 'La configuración con el procesador no es válida. Contacte con el proveedor de servicios mercantiles.';
$string['reason39'] = 'El código suministrado de moneda no es válido, no admitido, no aceptado por este proveedor o no dispone de tasa de cambio.';
$string['reason43'] = 'El proveedor ha sido incorrectamente ajustado al procesador. Contacte con su proveedor de servicios mercantiles.';
$string['reason44'] = 'La transacción ha sido rechazada. Error en el filtro de código de la tarjeta.';
$string['reason45'] = 'La transacción ha sido rechazada. Error en el filtro de código de la tarjeta / AVS.';
$string['reason47'] = 'La cantidad solicitada para liquidación no puede ser mayor que la cantidad original autorizada.';
$string['reason5'] = 'Se requiere una cantidad válida.';
$string['reason50'] = 'Esta transacción está esperando su liquidación y no puede ser reembolsada.';
$string['reason51'] = 'La suma de todos los créditos contra esta transacción es mayor que la cantidad de la transacción original.';
$string['reason54'] = 'La transacción referenciada no cumple los criterios para emitir un crédito.';
$string['reason55'] = 'La suma de los créditos contra la transacción referenciada excedería la cantidad de débito original.';
$string['reason56'] = 'Este proveedor acepta sólo transacciones mediante eCheque (ACH); no se aceptan transaciones mediante tarjeta de crédito.';
$string['refund'] = 'Reembolso';
$string['refunded'] = 'Reembolsado';
$string['returns'] = 'Devoluciones';
$string['reviewfailed'] = 'Revisión fallida';
$string['reviewnotify'] = 'Su pago será revisado. En unos días recibirá un email de su profesor.';
$string['sendpaymentbutton'] = 'Enviar pago';
$string['settled'] = 'Liquidado';
$string['settlementdate'] = 'Fecha de liquidación';
$string['shopper'] = 'Comprador';
$string['status'] = 'Permitir la matrícula Autorize.net';
$string['subvoidyes'] = 'La transacción reembolsada {$a->transid} será cancelada y se traspasará {$a->amount} a su cuenta. ¿Está seguro?';
$string['tested'] = 'Probado';
$string['testmode'] = '[MODO TEST]';
$string['testwarning'] = 'Captura/Cancelación/Crédito parece funcionar en modo prueba, pero no se ha actualizado o insertado ningún registro en la base de datos.';
$string['transid'] = 'ID de transacción';
$string['underreview'] = 'En revisión';
$string['unenrolselfconfirm'] = '¿Realmente desea darse de baja del curso "{$a}"?';
$string['unenrolstudent'] = '¿Dar de baja al estudiante?';
$string['uploadcsv'] = 'Suboir archivo CSV';
$string['usingccmethod'] = 'Matricularse usando <a href="{$a->url}"><strong>Tarjeta de crédito</strong></a>';
$string['usingecheckmethod'] = 'Matricularse usando <a href="{$a->url}"><strong>eCheque</strong></a>';
$string['verifyaccount'] = 'Verifique su cuenta mercantil authorize.net';
$string['verifyaccountresult'] = '<b>Resultado de la verificación:</b> {$a}';
$string['void'] = 'Cancelación';
$string['voidyes'] = 'La transacción será cancelada. ¿Está seguro?';
$string['welcometocoursesemail'] = 'Estimado {$a->name},

Gracias por enviar su pago. Usted está matriculado en los siguientes cursos:

{$a->courses}

Puede ver los detalles de su pago o editar su perfil:

{$a->paymenturl}
{$a->profileurl}';
$string['youcantdo'] = 'No puede realizar esta acción: {$a->action}';
$string['zipcode'] = 'Código postal';
