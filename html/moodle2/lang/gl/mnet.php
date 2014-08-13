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
 * Strings for component 'mnet', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutyourhost'] = 'Acerca do seu servidor';
$string['accesslevel'] = 'Nivel de acceso';
$string['addhost'] = 'Engadir servidor';
$string['addnewhost'] = 'Engadir un novo servidor';
$string['addtoacl'] = 'Engadir ao control de acceso';
$string['allow'] = 'Permitir';
$string['authfail_nosessionexists'] = 'Erro na autorización: A sesión mnet non existe.';
$string['authfail_sessiontimedout'] = 'Erro na autorización: A sesión mnet acabou.';
$string['authfail_usermismatch'] = 'Erro na autorización: O usuario non coincide.';
$string['authmnetdisabled'] = 'O <em>plugin de autenticación</em> da rede de Moodle está <strong>desactivado</strong>.';
$string['badcert'] = 'Este certificado non é válido.';
$string['couldnotgetcert'] = 'Non se encontrou ningún certificado en <br />{$a}. <br />Talvez o servidor non funcione ou estea mal configurado.';
$string['couldnotmatchcert'] = 'Isto non coincide co certificado actualmente publicado polo servidor web.';
$string['courses'] = 'cursos';
$string['courseson'] = 'cursos en';
$string['currentkey'] = 'Chave pública actual';
$string['current_transport'] = 'Transporte actual';
$string['databaseerror'] = 'Non foi posible escribir os detalles na base de datos.';
$string['deleteaserver'] = 'Eliminando un servidor';
$string['deletekeycheck'] = 'Está realmente certo de que desexa eliminar esta chave?';
$string['deleteoutoftime'] = 'A súa xanela de 60 segundos para eliminar esta chave caducou. Comece de novo.';
$string['deleteuserrecord'] = 'SSO ACL: eliminar rexistro do usuario \'{$a}[0]\' de {$a}[1].';
$string['deletewrongkeyvalue'] = 'Ocorreu un erro. Se non estaba a tentar eliminar a chave SSL do seu servidor, é posible que fose suxeito dun ataque malicioso. Non se executou ningunha acción.';
$string['deny'] = 'Denegar';
$string['description'] = 'Descrición';
$string['duplicate_usernames'] = 'Erramos en crear un índice nas columnas "mnethostid" e "username" na súa táboa de usuarios.<br />Isto pode acontecer cando ten <a href="{$a}" target="_blank">nomes de usuarios duplicados na súa táboa de usuarios</a>.<br />A súa autorización aínda debería completarse con éxito. Prema na ligazón de arriba e logo aparecerá este problema nunha nova xanela en instrucións de arranxo. Vostede pode atendelo ao final da actualización.<br />';
$string['enabled_for_all'] = '(Este servizo foi activado para todos os servidores).';
$string['enterausername'] = 'Introduza un nome de usuario ou unha lista de nomes separados por vírgulas.';
$string['expired'] = 'Esta chave caduca o';
$string['expires'] = 'Válida até';
$string['expireyourkey'] = 'Eliminar esta chave';
$string['expireyourkeyexplain'] = 'Moodle alterna automaticamente as chaves cada 28 días (por defecto) mais ten a opción de adiantar <em>manualmente</em> a caducidade desta chave en calquera momento. Isto é útil se cre que a chave está en perigo. A substitución xérase entón inmediatamente de xeito automático.<br />Con todo, a eliminación da chave imposibilitará a súa comunicación con outros Moodles mentres non contacte manualmente con cada administrador e lles forneza a nova chave.';
$string['failedaclwrite'] = 'Houbo un fallo ao escribir á lista de control de acceso MNET o usuario \'{$a}\'.';
$string['forbidden-function'] = 'Esa función non foi activada para RPC.';
$string['forbidden-transport'] = 'O método de transporte que está a tentar utilizar non está permitido.';
$string['forcesavechanges'] = 'Forzar a gravación das modificacións';
$string['helpnetworksettings'] = 'Configurar comunicación inter-Moodle';
$string['hidelocal'] = 'Ocultar usuarios locais';
$string['hideremote'] = 'Ocultar usuarios remotos';
$string['host'] = 'servidor';
$string['hostcoursenotfound'] = 'Servidor ou curso non encontrado';
$string['hostdeleted'] = 'Aceptar - Servidor eliminado';
$string['hostexists'] = 'Xa hai un rexistro para ese servidor e implementación de Moodle co ID {$a}.<br />Prema en <em>Continuar</em> para editar ese rexistro.';
$string['hostname'] = 'Nome do servidor';
$string['hostnamehelp'] = 'O nome do dominio plenamente cualificado do servidor remoto, como por exemplo: www.example.com';
$string['hostnotconfiguredforsso'] = 'Este hub de Moodle remoto non está configurado para inicios de sesión remotos.';
$string['hostsettings'] = 'Configuración do servidor';
$string['http_self_signed_help'] = 'Permitir conexións utilizando un certificado DIY SSL auto-asinado no servidor remoto.';
$string['https_self_signed_help'] = 'Permitir conexións utilizando un DIY SSL auto-asinado en PHP no servidor remoto sobre http.';
$string['https_verified_help'] = 'Permitir conexións utilizando un certificado SSL verificado no servidor remoto.';
$string['http_verified_help'] = 'Permitir conexións utilizando un certificado SSL verificado en PHP no servidor remoto, sobre http (non https).';
$string['id'] = 'ID';
$string['idhelp'] = 'Este valor atribúese automaticamente e non se pode mudar';
$string['invalidaccessparam'] = 'Parámetro de acceso non válido.';
$string['invalidactionparam'] = 'Parámetro de acción non válido.';
$string['invalidhost'] = 'Forneza un identificador de servidor válido';
$string['invalidpubkey'] = 'A chave non é unha SSL válida.';
$string['invalidurl'] = 'Parámetro URL non válido.';
$string['ipaddress'] = 'Enderezo IP';
$string['is_in_range'] = 'O enderezo IP  <code>{$a}</code>  constitúe un servidor de confianza válido.';
$string['ispublished'] = '{$a} Moodle activou este servizo para ti.';
$string['issubscribed'] = '{$a} Moodle estase subscribindo a este servizo do seu servidor.';
$string['keydeleted'] = 'A súa chave eliminouse e substituíuse con éxito.';
$string['keymismatch'] = 'A chave pública que posúe para este servidor é diferente da publicada neste momento.';
$string['last_connect_time'] = 'Última conexión';
$string['last_connect_time_help'] = 'O tempo que permaneceu conectado a este servidor.';
$string['last_transport_help'] = 'O transporte que utilizou para a última conexión a este servidor.';
$string['loginlinkmnetuser'] = '<br/>Se é un usuario remoto da rede Moodle e pode <a href="{$a}">confirmar o seu enderezo de correo electrónico aquí</a>, pode ser redirixido á súa páxina de inicio de sesión.<br />';
$string['logs'] = 'logs';
$string['mnet'] = 'Rede Moodle';
$string['mnet_concatenate_strings'] = 'Concatenar (até) 3 cadeas e devolver o resultado';
$string['mnetdisabled'] = 'A rede de Moodle está <strong>desactivada</strong>.';
$string['mnetlog'] = 'Logs';
$string['mnetpeers'] = 'Compañeiros';
$string['mnetservices'] = 'Servizos';
$string['mnet_session_prohibited'] = 'Os usuarios do seu servidor doméstico non teñen permiso neste momento para moverse a {$a}.';
$string['mnetsettings'] = 'Configuración da rede Moodle';
$string['moodle_home_help'] = 'O camiño da páxina principal de Moodle no servidor remoto, como por exemplo: /moodle/.';
$string['net'] = 'Rede';
$string['networksettings'] = 'Configuración da rede';
$string['never'] = 'Nunca';
$string['noaclentries'] = 'Non hai entradas na lista de control de acceso SSO';
$string['nocurl'] = 'A biblioteca PHP Curl non está instalada';
$string['nolocaluser'] = 'Non existe ningún rexistro local para usuario remoto.';
$string['nomodifyacl'] = 'Non ten permiso para modificar a lista de control de acceso MNET.';
$string['nonmatchingcert'] = 'O asunto do certificado <br /><em>{$a}[0]</em><br />non coincide co servidor de que procede:<br /><em>{$a}[1]</em>.';
$string['nopubkey'] = 'Houbo un problema durante o proceso de recuperación da chave pública.<br />Talvez o servidor non acepte a rede de Moodle ou a chave non sexa válida.';
$string['nosite'] = 'Non foi posible encontrar curso a nivel do sitio';
$string['nosuchfile'] = 'O ficheiro/función {$a} non existe.';
$string['nosuchfunction'] = 'Incapaz de localizar a función, ou función prohibida para RPC.';
$string['nosuchmodule'] = 'Ou hai algún erro no enderezo da función ou non foi posible encontrala. Use o formato mod/modulename/lib/functionname.';
$string['nosuchpublickey'] = 'Incapaz de obter a chave pública para a verificación da sinatura.';
$string['nosuchservice'] = 'O servizo RPC non está a funcionar neste servidor.';
$string['nosuchtransport'] = 'Non existe transporte con ese ID.';
$string['notBASE64'] = 'Esta cadea non está en formato Base64 Encoded. Non pode ser unha chave válida.';
$string['not_in_range'] = 'O enderezo IP  <code>{$a}</code>  non constitúe un servidor de confianza válido.';
$string['notPEM'] = 'Esta chave non está en formato PEM. Non vai funcionar.';
$string['notpermittedtojump'] = 'Non ten permiso para comezar unha sesión remota desde este hub de Moodle.';
$string['notpermittedtoland'] = 'Non ten permiso para comezar unha sesión remota.';
$string['off'] = 'Desactivado';
$string['on'] = 'Activado';
$string['permittedtransports'] = 'Transportes permitidos';
$string['phperror'] = 'Un erro interno de PHP impediu efectuar o seu pedido.';
$string['postrequired'] = 'A función eliminada require un pedido POST.';
$string['promiscuous'] = 'Promiscuo';
$string['publickey'] = 'Chave pública';
$string['publickey_help'] = 'Esta chave pública obtense automaticamente do servidor remoto.';
$string['publish'] = 'Publicar';
$string['reallydeleteserver'] = 'Está certo/a de que desexa eliminar o servidor';
$string['receivedwarnings'] = 'Recibíronse os seguintes avisos';
$string['recordnoexists'] = 'Ese rexistro non existe.';
$string['reenableserver'] = 'Non - Seleccione esta opción para volver activar este servidor.';
$string['registerallhosts'] = 'Rexistrar todos os servidores (<em>modo Hub</em>)';
$string['registerallhostsexplain'] = 'Os usuarios poden optar por rexistrar todos os servidores que tenten conectarse automaticamente con eles.
Isto significa que na lista de servidores aparecerá o rexistro de calquera sitio Moodle que se conecte con eles e solicite a súa chave pública.<br />Abaixo proporciónase a posibilidade de configurar servizos para \'Todos os servidores\'. Os servizos aí activados pódense fornecer a calquera servidor Moodle escollido indiscriminadamente.';
$string['remotecourses'] = 'Cursos remotos';
$string['remotehost'] = 'Hub remoto';
$string['remotehosts'] = 'Servidores remotos';
$string['requiresopenssl'] = 'A rede require a extensión OpenSSL';
$string['restore'] = 'Restaurar';
$string['reviewhostdetails'] = 'Revisar detalles do servidor';
$string['reviewhostservices'] = 'Revisar servizos do servidor';
$string['RPC_HTTP_PLAINTEXT'] = 'HTTP descifrado';
$string['RPC_HTTP_SELF_SIGNED'] = 'HTTP (auto-asinado)';
$string['RPC_HTTPS_SELF_SIGNED'] = 'HTTPS (auto-asinado)';
$string['RPC_HTTPS_VERIFIED'] = 'HTTPS (asinado)';
$string['RPC_HTTP_VERIFIED'] = 'HTTP (asinado)';
$string['selectaccesslevel'] = 'Seleccione un nivel de acceso da lista.';
$string['selectahost'] = 'Seleccione un servidor Moodle remoto.';
$string['serviceswepublish'] = 'Servizos que publicamos para {$a}.';
$string['serviceswesubscribeto'] = 'Servizos en {$a} aos que nos subscribimos.';
$string['settings'] = 'Configuración';
$string['showlocal'] = 'Mostrar usuarios locais';
$string['showremote'] = 'Mostrar usuarios remotos';
$string['ssl_acl_allow'] = 'SSO ACL: Permitir usuario {$a}[0] de {$a}[1]';
$string['ssl_acl_deny'] = 'SSO ACL: Denegar usuario {$a}[0] de {$a}[1]';
$string['ssoaccesscontrol'] = 'Control de acceso SSO';
$string['ssoacldescr'] = 'Use esta páxina para garantir/denegar o acceso a determinados usuarios de servidores remotos de rede Moodle. Isto é funcional cando se ofrecen servizos SSO a usuarios remotos. Para controlar a capacidade dos seus usuarios <em>locais</em> para se moveren a outros servidores de rede Moodle, use o sistema de papeis para lles garantir a capacidade <em>mnetcanroam</em>.';
$string['ssoaclneeds'] = 'Para que esta opción funcione, a rede de Moodle ten que estar activa, así como o seu plugin de autenticación, cos usuarios engadidos automaticamente tamén activos.';
$string['strict'] = 'Estrito';
$string['subscribe'] = 'Subscribirse';
$string['system'] = 'Sistema';
$string['testtrustedhosts'] = 'Probe un enderezo';
$string['testtrustedhostsexplain'] = 'Introduza un enderezo IP para ver se é un servidor de confianza.';
$string['transport_help'] = 'Estas opcións son recíprocas, o que quere dicir que só pode forzar un servidor remoto a utilizar unha certificación SSL asinada se o seu servidor tamén ten unha.';
$string['trustedhosts'] = 'servidores XML-RPC';
$string['trustedhostsexplain'] = '<p>O mecanismo dos servidores de confianza permite que determinadas máquinas executen chamadas vía XML-RPC a calquera parte da API do Moodle. Isto está dispoñible para que os scripts controlen o comportamento de Moodle. Activalo pode ser unha opción perigosa. Se ten dúbidas, déixeo desactivado.</p>
<p>Isto <strong>non</strong> é necesario para a rede de Moodle.</p>
<p>Para activalo, introduza unha lista de enderezos IP ou redes, unha en cada liña.
Algúns exemplos:</p>O seu servidor local:<br />127.0.0.1<br />O seu servidor local (con bloqueo de rede):<br />127.0.0.1/32<br />Só o servidor co enderezo IP 192.168.0.7:<br />192.168.0.7/32<br />Calquera servidor con enderezo IP entre 192.168.0.1 e 192.168.0.255:<br />192.168.0.0/24<br />Calquera servidor:<br />192.168.0.0/0<br />Obviamente o último exemplo <strong>non</strong> é unha configuración recomendada.';
$string['unknownerror'] = 'Ocorreu un erro descoñecido durante a negociación.';
$string['usercannotchangepassword'] = 'Non pode mudar aquí o seu contrasinal, pois é un usuario remoto.';
$string['userchangepasswordlink'] = '<br /> Talvez poida mudar o seu contrasinal no seu fornecedor <a href="{$a->wwwroot}/login/change_password.php">{$a->description}</a>.';
$string['usersareonline'] = 'Aviso: {$a} usuarios deste servidor teñen neste momento a sesión iniciada no seu sitio.';
$string['validated_by'] = 'Está validado pola rede:  <code>{$a}</code>';
$string['verifysignature-error'] = 'Fallou a verificación da sinatura. Ocorreu un erro.';
$string['verifysignature-invalid'] = 'Fallou a verificación da sinatura. Parece que estes datos non foron asinados por vostede.';
$string['version'] = 'versión';
$string['warning'] = 'Aviso';
$string['wrong-ip'] = 'O seu enderezo IP non coincide co enderezo que consta no noso rexistro.';
$string['xmlrpc-missing'] = 'Debe ter XML-RPC instalado na súa construción PHP para poder usar esta característica';
$string['yourhost'] = 'O seu servidor';
$string['yourpeers'] = 'Os seus compañeiros';
