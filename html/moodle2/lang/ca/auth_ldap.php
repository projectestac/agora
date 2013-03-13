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
 * Strings for component 'auth_ldap', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_ldap_ad_create_req'] = 'No s\'ha pogut crear el nou compte en el Directori Actiu. Assegureu-vos que compliu tots els requeriments necessaris perquè això funcioni (connexió LDAPS, bind-user amb els drets adequats, etc.)';
$string['auth_ldap_attrcreators'] = 'Llista de grups o contextos als membres dels quals se\'ls permet crear atributs. Separeu els grups amb \';\'. Generalment serà una cosa així: \'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_attrcreators_key'] = 'Creadors d\'atributs';
$string['auth_ldap_auth_user_create_key'] = 'Crea usuaris externament';
$string['auth_ldap_bind_dn'] = 'Si voleu utilitzar el bind-user per cercar usuaris, especifiqueu-ho aquí. Per exemple \'cn=ldapuser,ou=public,o=org\'';
$string['auth_ldap_bind_dn_key'] = 'Nom distingit';
$string['auth_ldap_bind_pw'] = 'Contrasenya del bind-user.';
$string['auth_ldap_bind_pw_key'] = 'Contrasenya';
$string['auth_ldap_bind_settings'] = 'Paràmetres de vinculació';
$string['auth_ldap_changepasswordurl_key'] = 'URL de canvi de contrasenya';
$string['auth_ldap_contexts'] = 'Llista de contextos en què estan ubicats els usuaris. Separeu els contextos amb \';\'. Per exemple: \'ou=users,o=org; ou=others,o=org\'';
$string['auth_ldap_contexts_key'] = 'Contextos';
$string['auth_ldap_create_context'] = 'Si activeu la creació d\'usuaris mitjançant confirmació per correu electrònic, especifiqueu en quin context s\'han de crear els usuaris. Aquest context ha de ser diferent del d\'altres usuaris per tal de prevenir problemes de seguretat. No cal afegir aquest context a ldap_context-variable. Moodle cercarà els usuaris en aquest context automàticament.';
$string['auth_ldap_create_context_key'] = 'Context per a nous usuaris';
$string['auth_ldap_create_error'] = 'S\'ha produït un error en crear l\'usuari mitjançant LDAP.';
$string['auth_ldap_creators'] = 'Llista de grups als membres dels quals els és permès  crear nous cursos. Separeu els grups amb \';\'. Generalment una cosa semblant a \'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_creators_key'] = 'Creadors';
$string['auth_ldapdescription'] = 'Aquest mètode proporciona autenticació contra un servidor LDAP extern.

Si un nom d\'usuari i una contrasenya són vàlids, Moodle crea una entrada per a un nou usuari a la seva base de dades. Aquest mòdul pot llegir atributs de l\'usuari del LDAP i omplir els camps corresponents de Moodle. En connexions successives només es comproven el nom d\'usuari i la contrasenya.';
$string['auth_ldap_expiration_desc'] = 'Seleccioneu \'No\' per inhabilitar la comprovació de contrasenyes vençudes o \'LDAP\' per consultar la data de venciment de la contrasenya directament a l\'LDAP.';
$string['auth_ldap_expiration_key'] = 'Venciment';
$string['auth_ldap_expiration_warning_desc'] = 'Nombre de dies abans que surti l\'avís de venciment de la contrasenya.';
$string['auth_ldap_expiration_warning_key'] = 'Avís de venciment';
$string['auth_ldap_expireattr_desc'] = 'Opcional: substitueix l\'atribut de l\'LDAP que emmagatzema la data de venciment de la contrasenya (passwordExpirationTime)';
$string['auth_ldap_expireattr_key'] = 'Atribut de venciment';
$string['auth_ldapextrafields'] = 'Aquests camps són opcionals. Podeu triar d\'omplir alguns camps d\'usuari de Moodle amb informació dels <b>camps LDAP</b> especificats aquí. <p>Si els deixeu en blanc, aleshores s\'utilitzaran valors per defecte.<p>En tot cas, l\'usuari podrà editar tots aquests camps quan es connecti.';
$string['auth_ldap_graceattr_desc'] = 'Opcional: susbstitueix l\'atribut gracelogin';
$string['auth_ldap_gracelogin_key'] = 'Atribut de gràcia';
$string['auth_ldap_gracelogins_desc'] = 'Fa que funcioni el gracelogin de LDAP. Després que hagi vençut la contrasenya, l\'usuari pot seguir entrant fins que el compte del gracelogin és 0. Si habiliteu aquest paràmetre es visualitzarà un missatge d\'avís quan venci la contrasenya.';
$string['auth_ldap_gracelogins_key'] = 'Període de gràcia';
$string['auth_ldap_groupecreators'] = 'Llista de grups o contextos als membres dels quals se\'ls permet crear grups. Separeu els grups amb \';\'. Generalment serà una cosa així: \'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_groupecreators_key'] = 'Creadors de grups';
$string['auth_ldap_host_url'] = 'Especifiqueu l\'ordinador central LDAP en format URL, per exemple \'ldap://ldap.myorg.com/\' o \'ldaps://ldap.myorg.com/\'';
$string['auth_ldap_host_url_key'] = 'URL del servidor';
$string['auth_ldap_ldap_encoding'] = 'Especifiqueu la codificació utilitzada pel servidor LDAP. Molt probablement UTF-8. MS AD v2 utilitza la codificació per defecte del sistema operatiu: cp1252, cp1250, etc.';
$string['auth_ldap_ldap_encoding_key'] = 'Codificació LDAP';
$string['auth_ldap_login_settings'] = 'Paràmetres d\'entrada';
$string['auth_ldap_memberattribute'] = 'Opcional: anul·la l\'atribut de membre de l\'usuari si l\'usuari pertany a un grup. Generalment \'membre\'.';
$string['auth_ldap_memberattribute_isdn'] = 'Opcional: anul·la la gestió de valors d\'atribut de membre. Pot ser 0 o 1.';
$string['auth_ldap_memberattribute_isdn_key'] = 'L\'atribut de membre utilitza dn';
$string['auth_ldap_memberattribute_key'] = 'Atribut de membre';
$string['auth_ldap_noconnect'] = 'El mòdul LDAP no s\'ha pogut connectar al servidor: {$a}';
$string['auth_ldap_noconnect_all'] = 'El mòdul LDAP no s\'ha pogut connectar a cap servidor: {$a}';
$string['auth_ldap_noextension'] = '<em>El mòdul PHP LDAP no sembla que sigui present. Si us plau assegureu-vos que està instal·lat i habilitat si voleu utilitzar aquest connector d\'autenticació. </em>';
$string['auth_ldap_no_mbstring'] = 'Per a crear usuaris en el Directori Actiu necessiteu l\'extensió mbstring.';
$string['auth_ldapnotinstalled'] = 'No es pot utilitzar l\'autenticació LDAP. El mòdul PHP LDAP no està instal·lat.';
$string['auth_ldap_objectclass'] = 'Filtre utilitzat per nomenar/cercar usuaris. Generalment es defineix quelcom semblant a objectClass=posixAccount. Per defecte objectClass=*, que retorna tots els objectes de LDAP.';
$string['auth_ldap_objectclass_key'] = 'Classe objecte';
$string['auth_ldap_opt_deref'] = 'Determina com es manegen els àlies en les cerques. Seleccioneu un dels valors següents: "No" (LDAP_DEREF_NEVER) o "Sí" (LDAP_DEREF_ALWAYS)';
$string['auth_ldap_opt_deref_key'] = 'Desreferencia àlies';
$string['auth_ldap_passtype'] = 'Especifiqueu el format per a les contrasenyes noves, o modificades, en el servidor LDAP.';
$string['auth_ldap_passtype_key'] = 'Format de contrasenyes';
$string['auth_ldap_passwdexpire_settings'] = 'Paràmetres LDAP de venciment de contrasenyes';
$string['auth_ldap_preventpassindb'] = 'Seleccioneu \'sí\' per impedir que les contrasenyes s\'emmagatzemin en la base de dades de Moodle.';
$string['auth_ldap_preventpassindb_key'] = 'Oculta contrasenyes';
$string['auth_ldap_search_sub'] = 'Poseu el valor <> 0 si voleu cercar els usuaris en subcontextos.';
$string['auth_ldap_search_sub_key'] = 'Cerca subcontextos';
$string['auth_ldap_server_settings'] = 'Paràmetres del servidor LDAP';
$string['auth_ldap_unsupportedusertype'] = 'auth: ldap user_create() no és ara per ara compatible amb el tipus d\'usuari seleccionat:{$a}';
$string['auth_ldap_update_userinfo'] = 'Actualitzeu la informació dels usuaris (nom, cognoms, adreça...) d\'LDAP a Moodle. Especifiqueu els paràmetres de "Mapatge de dades" segons les vostres necessitats.';
$string['auth_ldap_user_attribute'] = 'Opcional: substitueix l\'atribut utilitzat per anomenar/cercar usuaris. Generalment \'cn\'.';
$string['auth_ldap_user_attribute_key'] = 'Atribut d\'usuari';
$string['auth_ldap_user_exists'] = 'Aquest nom d\'usuari LDAP ja existeix.';
$string['auth_ldap_user_settings'] = 'Paràmetres de consulta d\'usuaris';
$string['auth_ldap_user_type'] = 'Seleccioneu com s\'emmagatzemen els usuaris en LDAP. Aquest paràmetre també especifica com funcionarà el venciment de les contrasenyes, el període de gràcia i la creació d\'usuaris.';
$string['auth_ldap_user_type_key'] = 'Tipus d\'usuari';
$string['auth_ldap_usertypeundefined'] = 'config.user_type no està definit, o la funció ldap_expirationtime2unix no és compatible amb el tipus seleccionat!';
$string['auth_ldap_usertypeundefined2'] = 'config.user_type no està definit, o la funció ldap_unixi2expirationtime no és compatible amb el tipus seleccionat!';
$string['auth_ldap_version'] = 'La versió del protocol LDAP que està utilitzant el servidor.';
$string['auth_ldap_version_key'] = 'Versió';
$string['auth_ntlmsso'] = 'Autenticació única per NTLM';
$string['auth_ntlmsso_enabled'] = 'Si l\'habiliteu s\'intentarà l\'autenticació única dins del domini NTLM. <strong>Nota:</strong> per a funcionar requereix configuració addicional del servidor web. Vg. <a href="http://docs.moodle.org/en/NTLM_authentication">http://docs.moodle.org/en/NTLM_authentication</a>';
$string['auth_ntlmsso_enabled_key'] = 'Habilita';
$string['auth_ntlmsso_ie_fastpath'] = 'Habiliteu aquesta opció per activar el camí ràpid NTLM SSO ( obviareu certs passos i sols treballarà si el client és MS Internet Explorer).';
$string['auth_ntlmsso_ie_fastpath_key'] = 'Camí ràpid MS IE ?';
$string['auth_ntlmsso_maybeinvalidformat'] = 'No ha estat possible extreure el nom d\'usuari de la capçalera REMOTE_USER. És correcte el format configurat?';
$string['auth_ntlmsso_missing_username'] = 'Heu d\'especificar almenys l\'%username% en el format de nom d\'usuari remot';
$string['auth_ntlmsso_remoteuserformat'] = 'Si heu escollit «NTLM» en el «Tipus d\'autencaticació», podeu especificar aquí el format del nom d\'usuari remot. Si deixeu aquest camp buit, s\'utilitzarà el format per defecte DOMAINusername. Podeu utilitzar el text variable optatiu <b>%domain%</b> per especificar on apareix el nom de domini, i l\'obligatori <b>%username%</b> per especificar on apareix el nom d\'usuari.<br /><br />Alguns formats molt utilitzats són <tt>%domain%%username%</tt> (per defecte en MS Windows), <tt>%domain%/%username%</tt>, <tt>%domain%+%username%</tt> i simplement <tt>%username%</tt> (si no hi ha la part de domini).';
$string['auth_ntlmsso_remoteuserformat_key'] = 'Format del nom d\'usuari remot';
$string['auth_ntlmsso_subnet'] = 'Si la definiu, només s\'intentarà l\'autenticació única amb els clients que estiguin dins d\'aquesta subxarxa. Format: xxx.xxx.xxx.xxx/màscara. Múltiples subxarxes separades per  \',\' (coma).';
$string['auth_ntlmsso_subnet_key'] = 'Subxarxa';
$string['auth_ntlmsso_type'] = 'El mètode d\'autenticació configurat al servidor web per autenticar els usuaris ( en cas de dubte escolliu NTLM).';
$string['auth_ntlmsso_type_key'] = 'Tipus d\'autenticació';
$string['connectingldap'] = 'Connectant al Servidor LDAP';
$string['creatingtemptable'] = 'S\'està creant una taula temporal {$a}';
$string['didntfindexpiretime'] = 'password_expire() no ha pogut trobar el temps de caducitat';
$string['didntgetusersfromldap'] = 'Encara no hi usuaris LDAP -- error ? -- S\'està sortint.';
$string['gotcountrecordsfromldap'] = 'S\'han trobat {$a} registres de LDAP';
$string['morethanoneuser'] = 'Que estrany! Més d\'un registre d\'usuari en LDAP. Sols s\'usa el primer.';
$string['needbcmath'] = 'Us cal l\'extensió BCMath per utilitzar l\'entrada amb el directori actiu.';
$string['needmbstring'] = 'Us cal l\'extensió mbstring per canviar contrasenyes al directori actiu.';
$string['nodnforusername'] = 'Error en user_update_password(). No hi ha nom únic per: {$a->username}';
$string['noemail'] = 'No ha estat possible enviar-vos un correu electrònic.';
$string['notcalledfromserver'] = 'No ha de ser cridat des del servidor web!';
$string['noupdatestobedone'] = 'No hi ha actualitzacions';
$string['nouserentriestoremove'] = 'No hi ha entrades a suprimir ';
$string['nouserentriestorevive'] = 'No hi ha entrades per restaurar';
$string['nouserstobeadded'] = 'No hi ha usuaris per afegir';
$string['ntlmsso_attempting'] = 'S\'està intentant l\'autenticació única a través de NTLM...';
$string['ntlmsso_failed'] = 'L\'entrada automàtica ha fallat. S\'intentarà l\'entrada per la pàgina normal...';
$string['ntlmsso_isdisabled'] = 'L\'autenticació única per NTLM està inhabilitada';
$string['ntlmsso_unknowntype'] = 'Tipus ntlmsso desconegut!';
$string['pagedresultsnotsupp'] = 'La paginació de resultats de LDAP no funciona (la versió de PHP no ho permet o no teniu Moodle configurat per a utilitzar la versió el protocol LDAP versió 2)';
$string['pagesize'] = 'Assegureu-vos que aquest valor és menor que el límit de mida de conjunt de resultats del servidor LDAP (el nombre màxim d\'entrades que poden ser retornades en una consulta)';
$string['pagesize_key'] = 'Mida de la pàgina';
$string['pluginname'] = 'Servidor LDAP';
$string['pluginnotenabled'] = 'Connector no habilitat!';
$string['renamingnotallowed'] = 'No està permés en LDAP canviar el nom a l\'usuari';
$string['rootdseerror'] = 'Error de consulta rootDSE per al directori actiu.';
$string['updatepasserror'] = 'Error en user_update_password(). Codi d\'error: {$a->errno}; Cadena d\'error: {$a->errstring}';
$string['updatepasserrorexpire'] = 'Error en user_update_password() quan es llegia el temps d\'expiració de la contrasenya. Codi d\'error: {$a->errno}; Cadena d\'error: {$a->errstring}';
$string['updatepasserrorexpiregrace'] = 'Error en user_update_password() quan s\'estava modificant el temps d\'expiració i/o el nom d\'usuari. Codi d\'error: {$a->errno}; Cadena d\'error: {$a->errstring}';
$string['updateremfail'] = 'Error actualitzant una dada LDAP. Codi d\'error: {$a->errno}; Cadena d\'error: {$a->errstring}<br/>Clau ({$a->key}) - valor antic de moodle: \'{$a->ouvalue}\' valor nou: \'{$a->nuvalue}\'';
$string['updateremfailamb'] = 'Errada a l\'actualitzar LDAP amb un camp ambigu {$a->key}; valor de moodle anterior: \'{$a->ouvalue}\', valor nou: \'{$a->nuvalue}\'';
$string['updateusernotfound'] = 'No s\'ha pogut trobar l\'usuari mentres s\'actualitzava externament. Detalls: cerca a la base: \'{$a->userdn}\'; filtre de cerca: \'(objectClass=*)\'; atributs de cerca: {$a->attribs}';
$string['useracctctrlerror'] = 'Error mentre s\'estava obtenint userAccountControl per a {$a}';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() no suporta el tipus d\'usuari seleccionat: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() no suporta el tipus d\'usuari seleccionat: {$a}';
$string['userentriestoadd'] = 'Entrades de l\'usuari a afegir: {$a}';
$string['userentriestoremove'] = 'Entrades de l\'usuari a suprimir: {$a}';
$string['userentriestorevive'] = 'Entrades de l\'usuari a recuperar: {$a}';
$string['userentriestoupdate'] = 'Entrades de l\'usuari a actualitzar: {$a}';
$string['usernotfound'] = 'No s\'ha trobat l\'usuari  en LDAP';
