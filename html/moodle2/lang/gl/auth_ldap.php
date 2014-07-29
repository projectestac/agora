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
 * Strings for component 'auth_ldap', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_ldap_ad_create_req'] = 'Non é posíbel crear a nova conta no Active Directory. Asegúrese de que cumpre todos os requisitos (conexión LDAPS, «bind user» con dereitos apropiados, etc.)';
$string['auth_ldap_attrcreators'] = 'Lista de grupos ou contextos cuxos membros están autorizados para crear atributos. Separe os grupos con «,». Por exemplo: «cn=profesores,ou=persoal,o=amiñaorg»';
$string['auth_ldap_attrcreators_key'] = 'Creadores de atributos';
$string['auth_ldap_auth_user_create_key'] = 'Crear usuarios externos';
$string['auth_ldap_bind_dn'] = 'Se quere empregar «bind-user» para buscar usuarios, especifíqueo aquí. Algo como «cn=usuarioldap,ou=public,o=org»';
$string['auth_ldap_bind_dn_key'] = 'Nome distintivo';
$string['auth_ldap_bind_pw'] = 'Contrasinal para bind-user.';
$string['auth_ldap_bind_pw_key'] = 'Contrasinal';
$string['auth_ldap_bind_settings'] = 'Configuración de «Bind»';
$string['auth_ldap_changepasswordurl_key'] = 'URL de cambio de contrasinal';
$string['auth_ldap_contexts'] = 'Lista de contextos onde están localizados os usuarios. Separe contextos diferentes con «;». Por exemplo: «ou=usuarios,o=org; ou=outros,o=org»';
$string['auth_ldap_contexts_key'] = 'Contextos';
$string['auth_ldap_create_context'] = 'Se activa a creación de usuario con confirmación por medio de correo, especifique o contexto no que se crean os usuarios. Este contexto debe ser diferente doutros usuarios para previr problemas de seguranza. Non é necesario engadir este contexto a ldap_context-variable, Moodle buscará automaticamente os usuarios deste contexto.<br /><b>Nota:</b> Ten que modificar o método user_create() no ficheiro auth/ldap/auth.php para facer o traballo de creación de usuarios';
$string['auth_ldap_create_context_key'] = 'Contextos para novos usuarios';
$string['auth_ldap_create_error'] = 'Produciuse un erro ao crear o usuario en LDAP';
$string['auth_ldap_creators'] = 'Lista de grupos ou contextos cuxos membros están autorizados para crear cursos novos. Separe os grupos con «,». Por exemplo: «cn=profesores,ou=persoal,o=amiñaorg»';
$string['auth_ldap_creators_key'] = 'Creadores';
$string['auth_ldapdescription'] = 'Este método fornece autenticación contra un servidor LDAP externo.
                                  Se o nome de usuario e contrasinal son correctos, Moodle crea unha nova entrada para o usuario
                                  na súa base de datos. Este módulo pode ler atributos de usuario desde LDAP e encher
                                  os campos requiridos en Moodle. Para os accesos sucesivos só se comproba o usuario
                                  e o contrasinal.';
$string['auth_ldap_expiration_desc'] = 'Seleccione «Non» para desactivar a comprobación de caducidade do contrasinal, ou «LDAP» para ler o tempo de caducidade do contrasinal directamente de LDAP.';
$string['auth_ldap_expiration_key'] = 'Caducidade';
$string['auth_ldap_expiration_warning_desc'] = 'Número de días antes de se presente o aviso de caducidade do contrasinal.';
$string['auth_ldap_expiration_warning_key'] = 'Aviso de caducidade';
$string['auth_ldap_expireattr_desc'] = 'Opcional: anula  atributo ldap que almacena o tempo de caducidade do contrasinal';
$string['auth_ldap_expireattr_key'] = 'Atributo de caducidade';
$string['auth_ldapextrafields'] = 'Estes campos son opcionais. Pode escoller encher algúns campos de usuario en Moodle con información desde os <strong>campos LDAP</strong> que especifique aquí. <p>Se deixa estes campos en branco, entón non se transferirá nada desde LDAP e empregaraanse os predeterminados en Moodle.</p><p>En ambos casos, os usuarios poderán editar todos estes campos despois de acceder.</p>';
$string['auth_ldap_graceattr_desc'] = 'Opcional: anula o atributo «gracelogin» acceso libre)';
$string['auth_ldap_gracelogin_key'] = 'Atributo de acceso libre';
$string['auth_ldap_gracelogins_desc'] = 'Activar a  compatibilidade de acceso libre LDAP. Unha vez que caducou o contrasinal, o usuario pode acceder ata que a conta de acceso libre chega a 0 (cero). De activarse este axuste presentarase unha mensaxe de acceso libre no caso de que o contrasinal teña caducado.';
$string['auth_ldap_gracelogins_key'] = 'Accesos libres';
$string['auth_ldap_groupecreators'] = 'Lista de grupos ou contextos cuxos membros están autorizados para crear grupos. Separe os grupos con «,». Por exemplo: «cn=profesores,ou=persoal,o=amiñaorg»';
$string['auth_ldap_groupecreators_key'] = 'Creadores de grupo';
$string['auth_ldap_host_url'] = 'Especificar o enderezo/máquina LDAP en forma de URL como «ldap://ldap.amiñaorg.com/» ou «ldaps://ldap.amiñaorg.com/\' Separe multiples servidores con «;» para ter compatibilidade coa conmutación por erro.';
$string['auth_ldap_host_url_key'] = 'URL da máquina';
$string['auth_ldap_ldap_encoding'] = 'Especifique a codificación empregada polo servidor LDAP. Probabelmente utf-8, MS AD v2 emprega a codificación predeterminada da plataformacomo cp1252, cp1250, etc.';
$string['auth_ldap_ldap_encoding_key'] = 'Codificación LDAP';
$string['auth_ldap_login_settings'] = 'Configuración do acceso';
$string['auth_ldap_memberattribute'] = 'Opcional: anula o atributo membro do usuario, cando os usuarios pertencen a un grupo. Normalmente «membro»';
$string['auth_ldap_memberattribute_isdn'] = 'Opcional: anula o manexo de valores de atributos dos membros, pode ser 0 ou 1';
$string['auth_ldap_memberattribute_isdn_key'] = 'O atributo de membro emprega dn';
$string['auth_ldap_memberattribute_key'] = 'Atributo de membro';
$string['auth_ldap_noconnect'] = 'O módulo LDAP non pode conectarse co servidor: {$a}';
$string['auth_ldap_noconnect_all'] = 'O módulo LDAP non pode conectarse con ningún dos servidores: {$a}';
$string['auth_ldap_noextension'] = '<em>Semella que o módulo PHP LDAP non esta presente. Asegúrese de que está instalado e activado se quere empregar este engadido para autenticación.</em>';
$string['auth_ldap_no_mbstring'] = 'Necesita a extensión mbstring para crear usuarios no Active Directory.';
$string['auth_ldapnotinstalled'] = 'Non é posíbel empregar a autenticación LDAP. Non está instalado o módulo PHP LDAP.';
$string['auth_ldap_objectclass'] = 'Opcional: anula objectClass usada para nomear/buscar usuarios en ldap_user_type. Normalmente non necesitará cambiar isto.';
$string['auth_ldap_objectclass_key'] = 'Clase de obxecto';
$string['auth_ldap_opt_deref'] = 'Determina como se manexan os alias durante a busca. Seleccione un dos seguintes valores: «Non» (LDAP_DEREF_NEVER) ou «Si» (LDAP_DEREF_ALWAYS)';
$string['auth_ldap_opt_deref_key'] = 'Des-referenciar os alias';
$string['auth_ldap_passtype'] = 'Especifique o formato dos contrasinais novos ou cambiados no servidor LDAP';
$string['auth_ldap_passtype_key'] = 'Formato do contrasinal';
$string['auth_ldap_passwdexpire_settings'] = 'Configuración da caducidade do contrasinal LDAP.';
$string['auth_ldap_preventpassindb'] = 'Seleccione «Si» para impedir que os contrasinais se almacenen na base de datos de Moodle.';
$string['auth_ldap_preventpassindb_key'] = 'Agochar os contrasinais';
$string['auth_ldap_search_sub'] = 'Buscar usuarios por subcontextos';
$string['auth_ldap_search_sub_key'] = 'Buscar subcontextos';
$string['auth_ldap_server_settings'] = 'Configuración do servidor de LDAP';
$string['auth_ldap_unsupportedusertype'] = 'auth: ldap user_create() non admite o tipo de usuario seleccionado: usertype: {$a}';
$string['auth_ldap_update_userinfo'] = 'Actualizar a información del usuario (nome, apelido, enderezo...) desde LDAP a Moodle. Especifique a configuración de «Asignación de datos» se for preciso.';
$string['auth_ldap_user_attribute'] = 'Opcional: anula o atributo usado para nomeaar/buscar usuarios. Normalmente «cn».';
$string['auth_ldap_user_attribute_key'] = 'Atributo de usuario';
$string['auth_ldap_user_exists'] = 'Xa existe este nome de usuario LDAP';
$string['auth_ldap_user_settings'] = 'Configuración de buscas do usuario';
$string['auth_ldap_user_type'] = 'Seleccione como se almacenarán os usuarios en LDAP. Este axuste tamén especifica como funcionarán a data límite do acceso, os accesos libres e a creación de usuarios.';
$string['auth_ldap_user_type_key'] = 'Tipo de usuario';
$string['auth_ldap_usertypeundefined'] = 'config.user_type non está definido ou a función ldap_expirationtime2unix non admite o tipo seleccionado.';
$string['auth_ldap_usertypeundefined2'] = 'config.user_type non está definido ou a función ldap_unixi2expirationtime non admite o tipo seleccionado.';
$string['auth_ldap_version'] = 'A versión do protocolo LDAP que está a empregar o seu servidor.';
$string['auth_ldap_version_key'] = 'Versión';
$string['auth_ntlmsso'] = 'NTLM SSO';
$string['auth_ntlmsso_enabled'] = 'Seleccione «Si» para tentar Single Sign On co dominio NTLM. <strong>Nota:</strong> isto require unha configuración adicional no servidor web para traballar; vexa <a href="http://docs.moodle.org/en/NTLM_authentication">http://docs.moodle.org/en/NTLM_authentication</a>';
$string['auth_ntlmsso_enabled_key'] = 'Activar';
$string['auth_ntlmsso_ie_fastpath'] = 'Seleccione «Si» para activar a ruta NTLM SSO rápida (saltase algúns pasos e só traballa se o navegador é o MS Internet Explorer).';
$string['auth_ntlmsso_ie_fastpath_attempt'] = 'Intentar NTLM con todos os navegadores';
$string['auth_ntlmsso_ie_fastpath_key'] = 'Ruta rápida a MS IE?';
$string['auth_ntlmsso_ie_fastpath_yesattempt'] = 'Si, tentar NTLM con outros navegadores';
$string['auth_ntlmsso_ie_fastpath_yesform'] = 'Si, todos os outros navegadores usan o formato para acceso estándar';
$string['auth_ntlmsso_maybeinvalidformat'] = 'Non foi posíbel extraer o nome de usuario da cabeceira REMOTE_USER (USUARIO_REMOTO). É correcto o formato configurado?';
$string['auth_ntlmsso_missing_username'] = 'É necesario que especifique polo menos %username% no formato de nome de usuario remoto';
$string['auth_ntlmsso_remoteuserformat'] = 'Se escolleu «NTLM» no «Tipo de autenticación», Pode especificar aquí o formato de nome de usuario remoto. Se o deixa baleiro, usarase o formato de DOMAINusername (nomedeusuarioDODOMINIO). Pode usar o substituíbel opcional <b>%domain%</b> para especificar onde aparece o nome do dominio, e o substituíbel obrigatorio <b>%username%</b> para especificar onde aparece o nome de usuario. <br /><br />Algúns dos formatos usados frecuentemente son <tt>%domain%%username%</tt> (predeterminado en MS Windows), <tt>%domain%/%username%</tt>, <tt>%domain%+%username%</tt> e simplemente <tt>%username%</tt> (se non houber a parte do dominio).';
$string['auth_ntlmsso_remoteuserformat_key'] = 'Formato de nome de usuario remoto';
$string['auth_ntlmsso_subnet'] = 'Se estabelece esta opción, só se tentará o SSO con clientes desta subrede. Formato: xxx.xxx.xxx.xxx/máscara. Separe varias subredes con «,» (coma).';
$string['auth_ntlmsso_subnet_key'] = 'Subrede';
$string['auth_ntlmsso_type'] = 'O método de autenticación configurado no servidor web para autenticar aos usuarios (en caso de dúbida, escolla NTLM)';
$string['auth_ntlmsso_type_key'] = 'Tipo de autenticación';
$string['connectingldap'] = 'Conectando co servidor LDAP...';
$string['creatingtemptable'] = 'Creando a táboa temporal {$a}';
$string['didntfindexpiretime'] = 'password_expire() non atopou a data de caducidade.';
$string['didntgetusersfromldap'] = 'Non foi posíbel obter usuarios desde LDAP. -- erro? -- saíndo';
$string['gotcountrecordsfromldap'] = 'Obtivéronse {$a} rexistros desde LDAP';
$string['morethanoneuser'] = 'Estraño! Atopouse máis dun rexistro de usuario en ldap. Empregarase só o primeiro.';
$string['needbcmath'] = 'Necesita a extensión BCMath para usar accesos libres con Active';
$string['needmbstring'] = 'Necesita a extensión mbstring para cambiar contrasinais no Active Directory.';
$string['nodnforusername'] = 'Produciuse un erro en user_update_password(). Non DN para: {$a->username}';
$string['noemail'] = 'Tentouse enviar un correo mais non foi posíbel.';
$string['notcalledfromserver'] = 'Non se debe chamar desde o servidor web.';
$string['noupdatestobedone'] = 'Non hay actualizacións dispoñíbeis';
$string['nouserentriestoremove'] = 'Non hai entradas de usuario para seren retiradas';
$string['nouserentriestorevive'] = 'Non hai entradas de usuario para seren recuperadas';
$string['nouserstobeadded'] = 'Non hai usuarios que engadir';
$string['ntlmsso_attempting'] = 'Tentando Single Sign On mediante NTLM...';
$string['ntlmsso_failed'] = 'Non foi posíbel acceder automaticamente, tenteo na páxina de acceso normal...';
$string['ntlmsso_isdisabled'] = 'NTLM SSO está desactivado';
$string['ntlmsso_unknowntype'] = 'Tipo ntlmsso descoñecido';
$string['pagedresultsnotsupp'] = 'LDAP enviou resultados non admitidos (sexa que a súa versión PHP non é compatíbel ou que teña configurado Moodle para usar a versión 2 do protocolo LDAP)';
$string['pagesize'] = 'Asegúrese de que este valor sexa menor ao límite configurado polo resultado do seu servidor LDAP (o número máximo de entradas que poden retornarse nunha soa solicitude)';
$string['pagesize_key'] = 'Tamaño da páxina';
$string['pluginname'] = 'Servidor LDAP';
$string['pluginnotenabled'] = 'Engadido non activado';
$string['renamingnotallowed'] = 'O renomeado de usuarios non está activado en LDAP';
$string['rootdseerror'] = 'Produciuse un erro ao consultar rootDSE para Active Directory';
$string['start_tls'] = 'Usar o servizo LDAP regular (porto 389) con cifrado TLS';
$string['start_tls_key'] = 'Usar TLS';
$string['updatepasserror'] = 'Produciuse un erro en user_update_password{}. Código de erro: {$a->errno}. Cadea de erro: {$a->errstring}';
$string['updatepasserrorexpire'] = 'Produciuse un erro en user_update_password{} ao ler a caducidade do contrasinal.  Código de erro: {$a->errno}. Cadea do erro: {$a->errstring}';
$string['updatepasserrorexpiregrace'] = 'Produciuse un erro en user_update_password{} ao modificar a caducidade e/ou os accesos libres.  Código de erro: {$a->errno}. Cadea do erro: {$a->errstring}';
$string['updateremfail'] = 'Produciuse un erro ao actualizar o rexistro LDAP. Código de erro: {$a->errno}; Cadea do erro: {$a->errstring}<br/>Chave ({$a->key}) - anterior valor de moodle: «{$a->ouvalue}» novo valor: «{$a->nuvalue}»';
$string['updateremfailamb'] = 'Non foi posíbel actualizar LDAP co campo ambiguo {$a->key}; anterior valor de moodle: «{$a->ouvalue}», novo valor: «{$a->nuvalue}»';
$string['updateusernotfound'] = 'Non foi posíbel atopar o usuario ao actualizar externamente. Detalles: base da busca: «{$a->userdn}»; filtro de busca: «(objectClass=*)»; atributos da busca: {$a->attribs}';
$string['useracctctrlerror'] = 'Produciuse un erro ao obter userAccountControl para {$a}';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() non admite o tipo de usuario seleccionado: usertype: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() non admite o tipo de usuario seleccionado: usertype: {$a}';
$string['userentriestoadd'] = 'Entradas de usuario que engadir: {$a}';
$string['userentriestoremove'] = 'Entradas de usuario que retirar: {$a}';
$string['userentriestorevive'] = 'Entradas de usuario que recuperar: {$a}';
$string['userentriestoupdate'] = 'Entradas de usuario que actualizar: {$a}';
$string['usernotfound'] = 'Non foi atopado o usuario en LDAP';
