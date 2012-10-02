<?PHP // $Id$ 
      // enrol_authorize.php - created with Moodle 1.9.3+ (Build: 20081126) (2007101532)


$string['adminacceptccs'] = '¿Qué tarjetas de crédito se aceptan?';
$string['adminaccepts'] = 'Seleccione los métodos de pago y sus tipos';
$string['adminauthcode'] = 'Si la tarjeta de crédito de un usuario no puede ser capturada directamente en internet, obtenga el código de autorización por teléfono del banco del cliente.';
$string['adminauthorizeccapture'] = 'Ajustes Revisar Orden y Auto-Capturar';
$string['adminauthorizeemail'] = 'Ajustes Enviar Email';
$string['adminauthorizesettings'] = 'Ajustes Authorize.net';
$string['adminauthorizewide'] = 'Ajustes Todo el Sitio';
$string['adminavs'] = 'Compruebe esto si tiene activado el Sistema de Verificación de Direcciones (AVS, Address Verification System) en su cuenta authorize.net. Este sistema requiere campos de dirección tales como calle, estado, país y código postal cuando el usuario rellena el formulario de pago.';
$string['adminconfighttps'] = 'Por favor, asegúrese de que tiene \"<a href=\"$a->url\">el loginhttps ON</a>\" para usar este \'plugin\'<br />en Admin >> Variables >> Seguridad >> Seguridad HTTP.';
$string['adminconfighttpsgo'] = 'Vaya a la <a href=\"$a->url\">página segura</a> para configurar este \'plugin\'.';
$string['admincronsetup'] = 'El script de mantenimiento cron.php no ha sido ejecutado durante al menos 24 horas. <br />El cron debe estar habilitado si quiere usar la característica de captura programada.<br /><b>Active adecuadamente el</b> \'Authorize.net plugin\' y <b>setup cron</b>; o bien el <b>uncheck an_review</b> de nuevo.<br />Si desactiva la captura programada, las transacciones serán canceladas a menos que las revise dentro de los próximos 30 días.<br />Compruebe<b>an_review</b> y escriba <b>\'0\' en el campo an_capture_day</b> <br />si desea aceptar o denegar  <b>manualmente</b> los pagos en los próximos 30 días.';
$string['adminemailexpired'] = 'Enviar un email de advertencia a los administradores <b>$a</b> días';
$string['adminemailexpiredsort'] = 'Cuando el número de órdenes a expirar pendientes se envían a los profesores por email, ¿cuál es importante?';
$string['adminemailexpiredsortcount'] = 'El número de órdenes';
$string['adminemailexpiredsortsum'] = 'La cantidad total';
$string['adminemailexpiredteacher'] = 'Si usted ha habilitado la captura manual (ver más arriba) y los profesores pueden manejar los pagos, se puede también notificar al profesor las órdenes pendientes a expirar. Se enviará un email a los profesores de cada curso informándoles de cuántas órdenes están pendientes de expiración.';
$string['adminemailexpsetting'] = '(0=deshabilitar envío de email, por defecto=2, máx.=5)<br />(Ajustes de captura manual para enviar email: cron=habilitado, an_review=marcado, an_capture_day=0, an_emailexpired=1-5)';
$string['adminhelpcapturetitle'] = 'Día de captura programada';
$string['adminhelpreviewtitle'] = 'Revisión de orden';
$string['adminneworder'] = 'Estimado Administrador,

Ha recibido una nueva orden pendiente:

ID Orden: $a->orderid
ID Transacción: $a->transid
Usuario: $a->user
Curso: $a->course
Cantidad: $a->amount

¿HABILITADA CAPTURA PROGRAMADA?: $a->acstatus

Si está habilitada la captura programada, la tarjeta de crédito será capturada en $a->captureon
y el estudiante podrá matricularse en el curso; en caso contrario, expirará en on $a->expireon y no podrá ser capturada después de ese día.

Asimismo, usted puede aceptar o rechazar el pago para matricular al estudiante inmediatamente siguiendo este enlace:
$a->url';
$string['adminnewordersubject'] = '$a->course: Nueva Orden Pendiente($a->orderid)';
$string['adminpendingorders'] = 'Ha deshabilitado la captura programada.<br />Un total de $a->count transacciones con estatus de AN_STATUS_AUTH serán canceladas a menos que lo marque.<br />Para aceptar o rechazar pagos, vaya a la página <a href=\'$a->url\'>Gestión de pagos</a>.';
$string['adminreview'] = 'Revisar el orden antes de capturar la tarjeta de crédito.';
$string['adminteachermanagepay'] = 'Los profesores pueden gestionar los pagos del curso.';
$string['allpendingorders'] = 'Todas las órdenes pendientes';
$string['amount'] = 'Cantidad';
$string['anlogin'] = 'Authorize.net: Usuario';
$string['anpassword'] = 'Authorize.net: Contraseña (no requerida)';
$string['anreferer'] = 'Escriba aquí la referencia URL en el caso de que usted la ajuste en su cuenta authorize.net, que enviará una cabecera \"Referer: URL\" en la petición web.';
$string['antestmode'] = 'Ejecutar transacciones sólo en modo test (no se girará dinero)';
$string['antrankey'] = 'Authorize.net: Clave de transacción';
$string['approvedreview'] = 'Revisión aprobada';
$string['authcaptured'] = 'Autorizado / Capturado';
$string['authcode'] = 'Código de autorización';
$string['authorize:managepayments'] = 'Gestionar pagos';
$string['authorize:uploadcsv'] = 'Subir archivo CSV';
$string['authorizedpendingcapture'] = 'Autorizado / Pendiente de Captura';
$string['authorizeerror'] = 'Error Authorize.net: $a';
$string['avsa'] = 'La dirección (calle) es correcta, pero el código postal no';
$string['avsb'] = 'Falta información sobre la dirección';
$string['avse'] = 'Error del sistema de verificación de la dirección';
$string['avsg'] = 'Banco emisor de tarjetas no de U.S.';
$string['avsn'] = 'No coinciden la dirección (calle) ni el código postal';
$string['avsp'] = 'Sistema de verificación de direcciones no aplicable';
$string['avsr'] = 'Reintentar - Sistema no disponible o fuera de tiempo';
$string['avsresult'] = 'Resultado AVS:';
$string['avss'] = 'Servicio no prestado por el proveedor';
$string['avsu'] = 'Información sobre dirección no disponible';
$string['avsw'] = 'El código postal de 9 dígitos coincide, pero la dirección (calle) no';
$string['avsx'] = 'La dirección (calle) y el código postal de 9 dígitos son correctos';
$string['avsy'] = 'La dirección (calle) y el código postal de 5 dígitos son correctos';
$string['avsz'] = 'El código postal de 5 dígitos es correcto, pero la dirección (calle) no';
$string['canbecredit'] = 'Puede reembolsarse hasta $a->upto';
$string['cancelled'] = 'Cancelado';
$string['capture'] = 'Captura';
$string['capturedpendingsettle'] = 'Liquidación Capturada / Pendiente';
$string['capturedsettled'] = 'Capturado / Liquidado';
$string['captureyes'] = 'La tarjeta de crédito será capturada y el estudiante será matriculado en el curso. ¿Está seguro?';
$string['ccexpire'] = 'Fecha de expiración';
$string['ccexpired'] = 'La tarjeta de crédito ha expirado';
$string['ccinvalid'] = 'Número de tarjeta no válido';
$string['cclastfour'] = 'Cuatro últimos CC';
$string['ccno'] = 'Número de la tarjeta de crédito';
$string['cctype'] = 'Tipo de la tarjeta de crédito';
$string['ccvv'] = 'CV2';
$string['ccvvhelp'] = 'Mire el reverso de la tarjeta (3 últimos dígitos)';
$string['choosemethod'] = 'Si conoce la clave de matriculación en el curso, escríbala; en caso contrario, necesitará pagar para acceder al curso.';
$string['chooseone'] = 'Rellene uno o ambos de los siguientes dos campos';
$string['costdefaultdesc'] = '<strong>En los ajustes del curso, escriba -1</strong> en el campo de costo para usar dicho costo por defecto.';
$string['cutofftime'] = 'Tiempo límite para la transacción. ¿Cuándo será captada la última transacción para liquidación?';
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
$string['enrolname'] = 'Puerta de tarjeta de crédito Authorize.net:';
$string['expired'] = 'Caducado';
$string['haveauthcode'] = 'Ya dispongo de un código de autorización';
$string['howmuch'] = '¿Cuánto?';
$string['httpsrequired'] = 'Lamentamos comunicarle que su solicitud no puede procesarse en este momento. La configuración de este sitio no se ha podido realizar correctamente.
<br /><br />
Por favor, no escriba su número de tarjeta de crédito a menos que vea un candado amarillo en la parte inferior del navegador. Ello significa transferidos entre cliente y servidor son encriptados, con el fin de proteger la información durante la transacción entre dos ordenadores y que el número de su tarjeta no puede ser capturado en internet.';
$string['invalidaba'] = 'Número ABA no válido';
$string['invalidaccnum'] = 'Número de cuenta no válido';
$string['invalidacctype'] = 'Tipo de cuenta no válido';
$string['isbusinesschecking'] = '¿Es comprobación de negocio?';
$string['logindesc'] = 'Puede seleccionar la opción <a href=\"$a->url\">loginhttps</a> en la sección Variables/Seguridad.
<br /><br />
Si la selecciona, Moodle usará una conexión https segura únicamente en la página de acceso y pago.';
$string['logininfo'] = 'Debido a precauciones de seguridad, no se muestran el nombre de usuario, la contraseña ni la clave de transacción. No es preciso entrar de nuevo si usted ha configurado estos campos con anterioridad. Puede ver un texto en verde a la izquierda de la caja si algún campo está ya configurado. Si accede a estos campos por vez primera, es necesario el nombre de usuario (*) y usted deberá escribir <strong>o bien</strong> la clave de transacción (#1) <strong>o bien</strong> la contraseña (#2) en la casilla adecuada. Le recomendamos que escriba la clave de transacción debido a razones de seguridad. Si desea eliminar la contraseña actual, marque la casilla correspondiente.';
$string['methodcc'] = 'Tarjeta de crédito';
$string['methodecheck'] = 'eCheque (ACH)';
$string['missingaba'] = 'Falta número ABA';
$string['missingaddress'] = 'Falta la dirección';
$string['missingbankname'] = 'Falta nombre de banco';
$string['missingcc'] = 'Falta el número de tarjeta de crédito';
$string['missingccauthcode'] = 'Falta código de autorización';
$string['missingccexpire'] = 'Falta la fecha de caducidad';
$string['missingcctype'] = 'Falta el tipo de tarjeta de crédito';
$string['missingcvv'] = 'Falta el número de verificación';
$string['missingzip'] = 'Falta el código postal';
$string['mypaymentsonly'] = 'Mostrar sólo mis pagos';
$string['nameoncard'] = 'Nombre que figura en la tarjeta';
$string['new'] = 'Nuevo';
$string['noreturns'] = '¡No devolución!';
$string['notsettled'] = 'No liquidado';
$string['orderdetails'] = 'Detalles de la orden';
$string['orderid'] = 'ID Orden';
$string['paymentmanagement'] = 'Gestión del pago';
$string['paymentmethod'] = 'Método de pago';
$string['paymentpending'] = 'El pago de este curso está pendiente con este número de orden $a->orderid. Vea <a href=\'$a->url\'>Detalles de la orden</a>.';
$string['pendingecheckemail'] = 'Estimado gestor,

En este momento hay $a->count echeques pendientes y usted debe subir un archivo csv para obtener los usuarios matriculados.

Haga clic en el enlace de abajo y lea el fichero de ayuda en la página:
$a->url';
$string['pendingechecksubject'] = '$a->course: eCheques pendientes($a->count)';
$string['pendingordersemail'] = 'Estimado administrador,

$a->pending transacciones expirarán a menos que usted acepte el pago dentro de los próximos $a->days días.

Éste es un mensaje de advertencia, debido a que usted no ha habilitado la captura programada, lo que significa que tiene que aceptar o rechazar los pagos manualmente.

Para aceptar o rechazar pagos pendientes, vaya a:
$a->url

Para habilitar la captura programada (lo que significa que usted no recibirá en el futuro ningún email de advertencia), vaya a:

$a->enrolurl';
$string['pendingordersemailteacher'] = 'Estimado profesor,

$a->pending transacciones por un costo de $a->currency $a->sumcost para el curso \"$a->course\"
expirarán a menos que usted acepte el pago dentro de los próximos $a->days días.

Usted tiene que aceptar o rechazar los pagos manualmente debido a que el administrador no tiene habilitada la captura programada.

$a->url';
$string['pendingorderssubject'] = 'ATENCIÓN: $a->course, $a->pending orden(es) expirarán en $a->days día(s).';
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
$string['reviewday'] = 'Capturar la tarjeta de crédito automáticamente a menos que un profesor o administrador revise la orden antes de <b>$a</b>días. EL CRON DEBE ESTAR ACTIVADO.<br />(0 días significa que se desactivará la auto-captura, y que el profesor o administrador revisarán la orden manualmente. La transacción será cancelada si usted desactiva la auto-captura, o si no la revisa antes de 30 días).';
$string['reviewfailed'] = 'Revisión fallida';
$string['reviewnotify'] = 'Su pago será revisado. En unos días recibirá un email de su profesor.';
$string['sendpaymentbutton'] = 'Enviar pago';
$string['settled'] = 'Liquidado';
$string['settlementdate'] = 'Fecha de liquidación';
$string['shopper'] = 'Comprador';
$string['subvoidyes'] = 'La transacción reembolsada $a->transid será cancelada y se traspasará $a->amount a su cuenta. ¿Está seguro?';
$string['tested'] = 'Probado';
$string['testmode'] = '[MODO TEST]';
$string['testwarning'] = 'Captura/Cancelación/Crédito parece funcionar en modo prueba, pero no se ha actualizado o insertado ningún registro en la base de datos.';
$string['transid'] = 'ID Transacción';
$string['underreview'] = 'En revisión';
$string['unenrolstudent'] = '¿Dar de baja al estudiante?';
$string['uploadcsv'] = 'Suboir archivo CSV';
$string['usingccmethod'] = 'Matricularse usando <a href=\"$a->url\"><strong>Tarjeta de crédito</strong></a>';
$string['usingecheckmethod'] = 'Matricularse usando <a href=\"$a->url\"><strong>eCheque</strong></a>';
$string['verifyaccount'] = 'Verifique su cuenta mercantil authorize.net';
$string['verifyaccountresult'] = 'Resultado de la verificación: $a';
$string['void'] = 'Cancelación';
$string['voidyes'] = 'La transacción será cancelada. ¿Está seguro?';
$string['welcometocoursesemail'] = 'Estimado estudiante,

Gracias por enviar su pago. Está matriculado en los siguientes cursos:';
$string['youcantdo'] = 'No puede realizar esta acción: $a->action';
$string['zipcode'] = 'Código postal';

?>
