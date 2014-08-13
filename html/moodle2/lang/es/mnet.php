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
 * Strings for component 'mnet', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutyourhost'] = 'Acerca de su servidor';
$string['accesslevel'] = 'Nivel de acceso';
$string['addhost'] = 'Agregar servidor';
$string['addnewhost'] = 'Agregar un nuevo servidor';
$string['addtoacl'] = 'Agregar a Control de Acceso';
$string['allhosts'] = 'Todos los hosts';
$string['allhosts_no_options'] = 'No hay opciones disponibles cuando se ven múltiples hosts.';
$string['allow'] = 'Permitir';
$string['applicationtype'] = 'Tipo de aplicación';
$string['authfail_nosessionexists'] = 'Autorización fallida: la sesión mnet no existe.';
$string['authfail_sessiontimedout'] = 'Autorización fallida: la sesión mnet ha sobrepasado el límite de tiempo.';
$string['authfail_usermismatch'] = 'Autorización fallida: el usuario no concuerda.';
$string['authmnetdisabled'] = 'El conector (\'plugin\') de identificación está <strong>deshabilitado</strong>.';
$string['badcert'] = 'Este no es un certificado válido.';
$string['certdetails'] = 'Detalles del certificado';
$string['configmnet'] = 'La red Moodle permite la comunicación de este servidor con otros servidores o servicios.';
$string['couldnotgetcert'] = 'Ningún certificado fue encontrado en <br />{$a}. <br />El host puede estar caído o incorrectamente configurado.';
$string['couldnotmatchcert'] = 'Esto no concuerda con el certificado actualmente publicado por el servidor web.';
$string['courses'] = 'cursos';
$string['courseson'] = 'cursos activados';
$string['currentkey'] = 'Clave pública actual';
$string['current_transport'] = 'Transporte actual';
$string['databaseerror'] = 'No se pudieron escribir detalles en la base de datos.';
$string['deleteaserver'] = 'Eliminando un servidor';
$string['deletedhostinfo'] = 'Este host ha sido borrado.Si quiere deshacer el borrado, cambie el estado de borrado de nuevo a \'No\'.';
$string['deletedhosts'] = 'Hosts borrados: {$a}';
$string['deletehost'] = 'Eliminar host';
$string['deletekeycheck'] = '¿Está totalmente seguro que quiere eliminar esta clave?';
$string['deleteoutoftime'] = 'Su ventana de 60 segundos para eliminar esta clave ha expirado.Por favor comience de nuevo.';
$string['deleteuserrecord'] = 'SSO ACL: eliminar registro para el usuario \'{$a->user}\' de {$a->host}.';
$string['deletewrongkeyvalue'] = 'Un error ha ocurrido. Si usted no estaba intentando eliminar su clave SSL, entonces es posible que usted haya sido sujeto de un ataque malicioso. Ninguna acción ha sido tomada.';
$string['deny'] = 'Denegar';
$string['description'] = 'Descripción';
$string['duplicate_usernames'] = 'Hemos fallado en crear un índice en las columnas "mnethostid" y "username" en su tabla de usuarios.<br />Esto puede ocurrir cuando tiene <a href="{$a}" target="_blank">nombres de usuarios duplicados en su tabla de usuarios</a>.<br />Su actualización aún debería completarse exitosamente. Haga clic en el vínculo de arriba, y luego en instrucciones de arreglo este problema aparecerá en una nueva ventana. Usted puede atenderlo al final de la actualización.<br />';
$string['enabled_for_all'] = '(Este servicio ha sido habilitado para todos los hosts).';
$string['enterausername'] = 'Por favor entre un nombre de usuario, ó una lista de usuarios separados por comas.';
$string['error7020'] = 'Este error ocurre por lo general si el sitio remoto ha creado un registro con el wwwroot equivocado, por ejemplo http://yoursite.com en lugar de http://www.yoursite.com. Debería contactar con el administrador del sitio remoto con su wwwroot (tal como se especifica en config.php) pidiéndole que actualice el registro de su servidor.';
$string['error7022'] = 'El mensaje que ha enviado al sitio remoto ha sido adecuadamente encriptado, pero no firmado. Que ocurra esto es muy extraño, y usted probablemente debería informar sobre el error (proporcionando toda la información posible sobre la versión de de la aplicación, etc.)';
$string['error7023'] = 'El sitio remoto ha intentado desencriptar su mensaje con todas las claves que tiene registradas para su sitio, pero han fallado. Debería poder solucionar este problema introduciendo a mano las claves del sitio remoto. Es poco probable que esto ocurra a menos que no haya mantenido contacto con el sitio remoto durante varios meses.';
$string['error7024'] = 'Usted envía un mensaje no encriptado al sitio remoto, pero éste no acepta comunicación sin encriptar desde su sitio. Que ocurra esto es muy extraño, y usted probablemente debería informar sobre el error (proporcionando toda la información posible sobre la versión de la aplicación, etc.)';
$string['error7026'] = 'La clave con la que su mensaje ha sido firmado es distinta de la consta en el servidor remoto. Es más, el servidor ha intentado comprobar la clave y no lo ha conseguido. Intente introducir manualmente la clave y pruebe de nuevo.';
$string['error709'] = 'El sitio remoto no ha podido obtener una clave SSL para usted.';
$string['expired'] = 'Esta clave expiró el';
$string['expires'] = 'Válida hasta';
$string['expireyourkey'] = 'Eliminar esta clave';
$string['expireyourkeyexplain'] = 'Moodle automáticamente rota sus claves cada 28 días (por defecto) pero usted tiene la opción de <em>manualmente</em> hacer expirar esta clave en cualquier momento. Lo anterior sería útil únicamente si usted cree que esta clave ha sido comprometida (siendo utilizada por quien no debería). Un reemplazo será automáticamente generado.<br />Eliminando esta clave le hará imposible a otros Moodles comunicarse con usted, hasta que manualmente contacte cada administrador y les de la nueva clave.';
$string['exportfields'] = 'Campos a exportar';
$string['failedaclwrite'] = 'Se produjo un error al escribir a la lista de control de acceso MNET para el usuario \'{$a}\'.';
$string['findlogin'] = 'Encontrar acceso';
$string['forbidden-function'] = 'Esa función no ha sido abilitada para RPC.';
$string['forbidden-transport'] = 'El método de transporte que está intentando utilizar no es permitido.';
$string['forcesavechanges'] = 'Forzar guardar los cambios';
$string['helpnetworksettings'] = 'Configurar comunicación MNet';
$string['hidelocal'] = 'Ocultar usuarios locales';
$string['hideremote'] = 'Ocultar usuarios remotos';
$string['host'] = 'host';
$string['hostcoursenotfound'] = 'Host o curso no encontrado';
$string['hostdeleted'] = 'Host borrado';
$string['hostexists'] = 'Ya existe un registro para un host con ese nombre (puede ser eliminado). <a href="{$a}">Haga clic aquí</a>para editar ese registro.';
$string['hostlist'] = 'Lista de hosts en red';
$string['hostname'] = 'Nombre del host';
$string['hostnamehelp'] = 'El nombre completo del dominio del host remoto, por ejemplo www.ejemplo.com';
$string['hostnotconfiguredforsso'] = 'Este servidor no está configurado para acceso remoto.';
$string['hostsettings'] = 'Ajustes del host';
$string['http_self_signed_help'] = 'Permitir conexiones usando un certificado firmado DIY SSL en el host remoto.';
$string['https_self_signed_help'] = 'Permitir conexiones usando un DIY SSL firmado en PHP en el host remoto sobre http.';
$string['https_verified_help'] = 'Permitir conexiones usando un certificado verificado SSL en el host remoto.';
$string['http_verified_help'] = 'Permitir conexiones usando un certificado verificado SSL en PHP en el host remoto, excepto sobre http (no https).';
$string['id'] = 'ID';
$string['idhelp'] = 'Este valor es automáticamente asignado y no puede cambiarse';
$string['importfields'] = 'Campos a importar';
$string['inspect'] = 'Inspeccionar';
$string['installnosuchfunction'] = '¡Error de codificación! Alguien está intentando instalar una función mnet xmlrpc ({$a->method}) desde un archivo ({$a->file}) y no se puede encontrar!';
$string['installnosuchmethod'] = '¡Error de codificación! Alguien está intentando instalar un método mnet xmlrpc ({$a->method}) en una clase ({$a->file}) y no se puede encontrar!';
$string['installreflectionclasserror'] = '¡Error de codificación! La introspección MNet ha fallado para el método \'{$a->method}\' en la clase \'{$a->class}\'.  El mensaje original de error, por si sirviera de ayuda, es: \'{$a->error}\'';
$string['installreflectionfunctionerror'] = '¡Error de codificación! La introspección MNet ha fallado para la función \'{$a->method}\' en el archivo \'{$a->file}\'. El mensaje original de error, por si sirviera de ayuda, es: \'{$a->error}\'';
$string['invalidaccessparam'] = 'Parámetro de acceso no válido.';
$string['invalidactionparam'] = 'Parámetro de acción no válido.';
$string['invalidhost'] = 'Debe dar un identificador de host válido';
$string['invalidpubkey'] = 'La clave no es una clave SSL válida. ({$a})';
$string['invalidurl'] = 'Parámetro URL no válido.';
$string['ipaddress'] = 'Dirección IP';
$string['is_in_range'] = 'La dirección IP <code>{$a}</code>  representa un host de confianza válido.';
$string['ispublished'] = '{$a} ha habilitado este servicio para usted.';
$string['issubscribed'] = '{$a} se está suscribiendo a este servicio en su host.';
$string['keydeleted'] = 'Su clave ha sido exitosamente eliminada y reemplazada.';
$string['keymismatch'] = 'La clave pública que usted tiene para este host es diferente a la clave pública que está actualmente publicando. La clave publicada actualmente es:';
$string['last_connect_time'] = 'Última conexión';
$string['last_connect_time_help'] = 'La última vez que usted se conectó con este host.';
$string['last_transport_help'] = 'El transporte que ha usado para la última conexión con este host.';
$string['leavedefault'] = 'Usar en su lugar los ajustes por defecto';
$string['listservices'] = 'Listar servicios';
$string['loginlinkmnetuser'] = '<br/>Si usted es un usuario remoto de MNet y puede <a href="{$a}">confirmar su dirección de correo aquí</a>, puede ser redirigido a su página de entrada.<br />';
$string['logs'] = 'Registros';
$string['managemnetpeers'] = 'Gestionar pares';
$string['method'] = 'Método';
$string['methodhelp'] = 'Ayuda de método para {$a}';
$string['methodsavailableonhost'] = 'Métodos disponibles en {$a}
';
$string['methodsavailableonhostinservice'] = 'Métodos disponibles para {$a->service} en {$a->host}';
$string['methodsignature'] = 'Firma de método para {$a}';
$string['mnet'] = 'MNet';
$string['mnet_concatenate_strings'] = 'Concatenar (hasta) 3 cadenas de texto y retornar el resultado';
$string['mnetdisabled'] = 'MNet está <strong>deshabilitado</strong>.';
$string['mnetidprovider'] = 'Provisor de ID MNET';
$string['mnetidproviderdesc'] = 'Puede usar esta opción para recuperar un enlace en el que identificarse, en el caso de que proporcione la dirección email correcta que corresponda al nombre de usuario con el que trató de entrar.';
$string['mnetidprovidermsg'] = 'Usted debería poder identificarse a su proveedor {$a}.';
$string['mnetidprovidernotfound'] = 'Lo sentimos, no se ha podido encontrar más información.';
$string['mnetlog'] = 'Registros';
$string['mnetpeers'] = 'Iguales';
$string['mnetservices'] = 'Servicios';
$string['mnet_session_prohibited'] = 'Usuarios de su servidor inicial no tienen actualmente permitido divagar por {$a}.';
$string['mnetsettings'] = 'Ajustes de MNet';
$string['moodle_home_help'] = 'La ruta a la página de inicio de MNet en el host remoto, por ejemplo: /moodle/.';
$string['name'] = 'Nombre';
$string['net'] = 'Red';
$string['networksettings'] = 'Ajustes de red';
$string['never'] = 'Nunca';
$string['noaclentries'] = 'No hay entradas en la lista de control de acceso SSO';
$string['noaddressforhost'] = 'Lo sentimos, pero el nombre del host ({$a}) no se ha podido resolver.';
$string['nocurl'] = 'La librería Curl de PHP no está instalada';
$string['nolocaluser'] = 'Ningún registro local existe para el usuario remoto, y no puede crearse, puesto que este host no crea usuarios automáticamente. Por favor, contacte con su administrador.';
$string['nomodifyacl'] = 'Usted no tiene permitido modificar la lista de control de acceso MNET.';
$string['nonmatchingcert'] = 'El asunto del certificado: <br /><em>{$a->subject}</em><br />no concuerda con el host de donde provino:<br /><em>{$a->host}</em>.
';
$string['nopubkey'] = 'Hubo un problema obteniendo la clave pública.<br />Quizás el host no admite MNet o la clave no es válida.';
$string['nosite'] = 'No se pudo encontrar curso al nivel del sitio';
$string['nosuchfile'] = 'El archivo/función {$a} no existe.';
$string['nosuchfunction'] = 'No se pudo localizar la función, o función prohibida por RPC.';
$string['nosuchmodule'] = 'La ruta de la función fue dada incorrectamente y no pudo ser localizada. Por favor use el formato: mod/Nombre_Modulo/lib/Nombre_Funcion .';
$string['nosuchpublickey'] = 'Incapaz de obtener la clave pública para verificación de firma.';
$string['nosuchservice'] = 'El servicio RPC no está corriendo en este host.';
$string['nosuchtransport'] = 'No existe transporte con esa identificación.';
$string['notBASE64'] = 'Esta cadena de texto no está codificada en formato Base64. No puede ser una clave válida.';
$string['notenoughidpinfo'] = 'Su proveedor de identidad no nos está dando suficiente información para crear o actualizar localmente su cuenta. ¡Lo sentimos!';
$string['not_in_range'] = 'La dirección IP  <code>{$a}</code>  no representa un host de confianza válido.';
$string['notinxmlrpcserver'] = 'Intento de acceder al cliento remoto MNet, no ducante la ejecución del servidor XMLRPC';
$string['notmoodleapplication'] = 'ATENCIÓN: Esta no es una aplicación Moodle, por lo que algunos de los métodos de inspección pueden no funcionar adecuadamente.';
$string['notPEM'] = 'Esta clave no está en formato PEM. No funcionará.';
$string['notpermittedtojump'] = 'Usted no tiene permiso para iniciar una sesión remota desde este servidor Moodle.';
$string['notpermittedtojumpas'] = 'No puede empezar una sesión remota mientras está conectado como otro usuario.';
$string['notpermittedtoland'] = 'Usted no tiene permiso para iniciar una sesión remota.';
$string['off'] = 'apagado';
$string['on'] = 'encendido';
$string['options'] = 'Opciones';
$string['peerprofilefielddesc'] = 'Aquí se puede reemplazar la configuración global de los campos del perfil a enviar e importar cuando se crean usuarios nuevos';
$string['permittedtransports'] = 'Transportes permitidos';
$string['phperror'] = 'Un error interno de PHP previno que su operación hubiese sido llevada a cabo.';
$string['position'] = 'Posición';
$string['postrequired'] = 'La función de elminación requiere una operación POST.';
$string['profileexportfields'] = 'Campos a enviar';
$string['profilefielddesc'] = 'Aquí puede configurar la lista de campos del perfil que se envían y reciben de MNet cuando las cuentas de usuario se crean o se actualizan. También puede cambiarlo para cada elemento MNet individual. Tenga en cuenta que los siguientes campos se envían siempre y no son opcionales: {$a}';
$string['profilefields'] = 'Campos de perfil';
$string['profileimportfields'] = 'Campos a importar';
$string['promiscuous'] = 'Promiscuo';
$string['publickey'] = 'Clave pública';
$string['publickey_help'] = 'La clave pública es automáticamente obtenida desde el servidor remoto.';
$string['publickeyrequired'] = 'Debes proporcionar una clave pública';
$string['publish'] = 'Publicar';
$string['reallydeleteserver'] = '¿Está seguro que desea eliminar el servidor?';
$string['receivedwarnings'] = 'Se recibieron las siguientes advertencias';
$string['recordnoexists'] = 'El registro no existe.';
$string['reenableserver'] = 'No - seleccione esta opción para rehabilitar el servidor.';
$string['registerallhosts'] = 'Registrar todos los hosts (modo promiscuo)';
$string['registerallhostsexplain'] = 'Puede registrar todos los hosts que se intenten conectar con su sitio Moodle automáticamente. Esto implica que un registro aparecerá en su lista de host por cada sitio Moodle que se conecte con el suyo y pida su clave pública.<br />Tiene la opción de configurar el acceso para \'Todos los Hosts\' y posteriormente habilitar determinados servicios de acceso, también es posible proveer servicios a cualquier servidor Moodle indiscriminadamente.';
$string['registerhostsoff'] = 'El registro de todos los hosts está actualmente <b>desactivado</b>';
$string['registerhostson'] = 'El registro de todos los hosts está actualmente <b>activado</b>';
$string['remotecourses'] = 'Cursos remotos';
$string['remotehost'] = 'Host remoto';
$string['remotehosts'] = 'Hosts remotos';
$string['remoteuserinfo'] = 'Perfil remoto {$a->remotetype} de usuario obtenido de <a href="{$a->remoteurl}">{$a->remotename}</a>';
$string['requiresopenssl'] = 'El trabajo de red requiere la extensión OpenSSL';
$string['restore'] = 'Restaurar';
$string['returnvalue'] = 'Retornar valor';
$string['reviewhostdetails'] = 'Revisar detalles del host';
$string['reviewhostservices'] = 'Revisar servicios del host';
$string['RPC_HTTP_PLAINTEXT'] = 'HTTP no encriptado';
$string['RPC_HTTP_SELF_SIGNED'] = 'HTTP (auto-firmado)';
$string['RPC_HTTPS_SELF_SIGNED'] = 'HTTPS (auto-firmado)';
$string['RPC_HTTPS_VERIFIED'] = 'HTTPS (firmado)';
$string['RPC_HTTP_VERIFIED'] = 'HTTP (firmado)';
$string['selectaccesslevel'] = 'Por favor seleccione un nivel de acceso de la lista.';
$string['selectahost'] = 'Por favor seleccione un host Moodle remoto.';
$string['service'] = 'Nombre del servicio';
$string['serviceid'] = 'ID del servicio';
$string['servicesavailableonhost'] = 'Servicios disponibles en {$a}';
$string['serviceswepublish'] = 'Servicios que publicamos a {$a}.';
$string['serviceswesubscribeto'] = 'Servicios en {$a} a los que nos suscribimos.';
$string['settings'] = 'Ajustes';
$string['showlocal'] = 'Mostrar usuarios locales';
$string['showremote'] = 'Mostrar usuarios remotos';
$string['ssl_acl_allow'] = 'SSO ACL: Permitir al usuario {$a->user} de {$a->host}';
$string['ssl_acl_deny'] = 'SSO ACL: Denegar al usuario {$a->user} de {$a->host}';
$string['ssoaccesscontrol'] = 'Control de acceso SSO';
$string['ssoacldescr'] = 'Utilice esta página para conceder/denegar acceso a determinadaos usuarios de hosts MNet remotos. Funciona cuando ofrezca servicios SSO a usuarios remotos. Para controlar los permisos <em>locales</em> de sus usuarios paranavegar por otros hosts MNet, utilice el sistema de roles para concederles el permiso <em>mnetlogintoremote</em>.';
$string['ssoaclneeds'] = 'Para que esta funcionalidad trabaje adecuadamente, debe de tener la opción \'Networking\') activada, además de el conector (\'plugin\') de identificación MNet.';
$string['strict'] = 'Estricto';
$string['subscribe'] = 'Suscribir';
$string['system'] = 'Sistema';
$string['testclient'] = 'Cliente de prueba MNet';
$string['testtrustedhosts'] = 'Probar una dirección';
$string['testtrustedhostsexplain'] = 'Ingrese una dirección IP para ver si es un host de confianza.';
$string['theypublish'] = 'Ellos publican';
$string['theysubscribe'] = 'Ellos suscriben';
$string['transport_help'] = 'Estas opciones son recíprocas, de modo que usted solamente puede forzar a un servidor remoto a usar un certificado SSL firmado si su servidor tiene también un certificado SSL firmado.';
$string['trustedhosts'] = 'Hosts XML-RPC';
$string['trustedhostsexplain'] = '<p>El mecanismo de hosts de confianza permite que máquinas específicas ejecuten llamadas a través de XML-RPC a cualquier parte del API de Moodle. Esto está disponible para scripts para controlar el comportamiento de Moodle y puede ser una opción muy peligrosa para activar. Si se tienen dudas, mantenerlo desactivado.</p> <p><strong>Esto no es necesario para la Red de Trabajo Moodle(\'Moodle Networking\').</strong></p> <p>Para activarlo, ingrese una lista de direcciones IP o redes, una en cada línea. Algunos ejemplos:</p>Su host local:<br />127.0.0.1<br />Su host local (con un bloqueo de red):<br />127.0.0.1/32<br />Únicamente el host con dirección IP 192.168.0.7:<br />192.168.0.7/32<br />Cualquier host con una dirección IP entre 192.168.0.1 y 192.168.0.255:<br />192.168.0.0/24<br />Un host cualquiera:<br />192.168.0.0/0<br />Obviamente el último ejemplo <strong>no</strong> es una configuración recomendada.';
$string['turnitoff'] = 'Desconectarlo';
$string['turniton'] = 'Conectarlo';
$string['type'] = 'Tipo';
$string['unknown'] = 'Desconocido';
$string['unknownerror'] = 'Un error desconocido ocurrió durante la negociación.';
$string['usercannotchangepassword'] = 'No puede cambiar su contraseña aquí puesto que eres un usuario remoto.';
$string['userchangepasswordlink'] = '<br /> Puede cambiar su contraseña en su  proveedor <a href="{$a->wwwroot}/login/change_password.php">{$a->description}</a>.';
$string['usernotfullysetup'] = 'Su cuenta de usuario está incompleta. Necesita ir <a href="{$a}">de regreso a su proveedor</a> y asegurarse de que su perfil esté complete allí. Puede que necesite salir del sitio y volver a entrar para que tenga efecto.';
$string['usersareonline'] = 'Advertencia: {$a} usuarios de ese servidor están actualmente en su sitio.';
$string['validated_by'] = 'Es validado por la red:  <code>{$a}</code>';
$string['verifysignature-error'] = 'La verificación de firma falló. Un error ha ocurrido.';
$string['verifysignature-invalid'] = 'La verifivación de firma falló. Parece que esta carga no fue firmada por usted.';
$string['version'] = 'Versión';
$string['warning'] = 'Advertencia';
$string['wrong-ip'] = 'Su dirección IP no concuerda con la que tenemos registrada.';
$string['xmlrpc-missing'] = 'Debe tener XML-RPC instalado en su construcción PHP para poder usar esta característica.';
$string['yourhost'] = 'Su Host';
$string['yourpeers'] = 'Sus iguales';
