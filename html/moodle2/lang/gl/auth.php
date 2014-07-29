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
 * Strings for component 'auth', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   auth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actauthhdr'] = 'Hai engadidos de autenticación dispoñíbeis';
$string['alternatelogin'] = 'Se introduce aquí un URL, empregarase como páxina de acceso ao sitio. A páxina debería conter un formulario cuxa propiedad de acción estea estabelecida a <strong>«{$a}»</strong> e devolva os campos <strong>nome de usuario</strong> e <strong>contrasinal</strong>.<br />Teña tino e non introduza un URL incorrecto xa pode bloquear o sitio.<br />Deixe este axuste en branco para empregar a páxina de acceso predeterminada.';
$string['alternateloginurl'] = 'URL de acceso alternativo';
$string['auth_changepasswordhelp'] = 'Axuda para cambiar o contrasinal';
$string['auth_changepasswordhelp_expl'] = 'Presenta axuda aos usuarios que perderon o seu contrasinal {$a}. Esta opción pode presentarse ademais de ou no canto do <strong>URL para cambiar o contrasinal</strong> ou como un cambio de contrasinal interno de Moodle.';
$string['auth_changepasswordurl'] = 'URL para cambiar o contrasinal';
$string['auth_changepasswordurl_expl'] = 'Especifique o URL ao que remitir aos usuarios que perderon o seu contrasinal {$a}. Seleccione <strong>Non</strong> na páxina <strong>Empregar a páxina estándar de cambio de contrasinal</strong>.';
$string['auth_changingemailaddress'] = 'Vostede solicitou un cambio de enderezo de correo  desde {$a->oldemail} cara {$a->newemail}. Por razóns de seguranza, témoslle enviada unha mensaxe por correo ao novo enderezo para confirmar que é vostede o titular. O seu novo enderezo será actualizado unha vez que abra a ligazón que lle enviamos nesa mensaxe.';
$string['auth_common_settings'] = 'Configuración común';
$string['auth_data_mapping'] = 'Asignación de datos';
$string['authenticationoptions'] = 'Opcións de autenticación';
$string['auth_fieldlock'] = 'Bloquear o valor';
$string['auth_fieldlock_expl'] = '<p><b>Bloquear o valor:</b> Se se activa, os usuarios e administradores de Moodle non poderán editar directamente o campo. Empregue esta opción se manten estes datos nun sistema de autenticación externo. </p>';
$string['auth_fieldlocks'] = 'Bloquear os campos de usuario';
$string['auth_fieldlocks_help'] = '<p>Vostede pode bloquear os campos de datos dos usuarios, isto é útil en sitios onde eses datos son mantidos por administradores de forma manual, editando os rexistros dos usuarios ou enviándoos mediante a utilidade «Enviar usuarios». Se vostede bloquea campos requiridos por Moodle, asegúrese de que fornece eses datos ao crear as contas dos usuarios; doutro modo as contas non serán utilizábeis.</p><p>Considere fixar este axuste de bloqueo en «Desbloqueado se está baleiro», para evitar este problema.</p>';
$string['authinstructions'] = 'Deixe isto en branco para que as instrucións de acceso predeterminadas sexan presentadas na páxina de acceso. Se desexa fornecer instrucións de acceso personalizadas, escríbaas aquí.';
$string['auth_invalidnewemailkey'] = 'Erro: Si está tentando confirmar un cambio de enderezo de correo. debe ter cometido un error ao copiar o URL que lle enviamos por correo. Copie a ligazón e tenteo de novo.';
$string['auth_multiplehosts'] = 'Pode especificar múltiplos servidores (p.ex. servidor1.com;servidor2.com;servidor3.com) ou (p.ex. xxx.xxx.xxx.xxx;xxx.xxx.xxx.xxx)';
$string['auth_outofnewemailupdateattempts'] = 'Fixo máis intentos dos permitidos para actualizar e seu enderezo de correo. A súa solicitude de actualización foi cancelada.';
$string['auth_passwordisexpired'] = 'O seu contrasinal caducou. Quere cambiar agora o seu contrasinal?';
$string['auth_passwordwillexpire'] = 'O seu contrasinal caduca en {$a} días. Quere cambiar agora o seu contrasinal?';
$string['auth_remove_delete'] = 'Eliminación interna completa';
$string['auth_remove_keep'] = 'Manter a interna';
$string['auth_remove_suspend'] = 'Suspender a interna';
$string['auth_remove_user'] = 'Especifique que facer cunha conta de usuario interna durante a sincronización masiva cando o usuario foi retirado da orixe externa. Só os usuarios suspendidos son revividos automaticamente se reaparecen nunha orixe externa.';
$string['auth_remove_user_key'] = 'O usuario externo foi retirado';
$string['auth_sync_script'] = 'Script de sincronización de cron';
$string['auth_updatelocal'] = 'Actualización local (de datos)';
$string['auth_updatelocal_expl'] = '<p><b>Actualización local (de datos):</b> Se está activado, o campo debe ser actualizado (con autenticación externa) cada vez que o usuario accede ou se produce unha sincronización de usuarios. Os campos a actualizar localmente deberían ser bloqueados.</p>';
$string['auth_updateremote'] = 'Actualización externa (de datos)';
$string['auth_updateremote_expl'] = '<p><b>Actualización externa (de datos):</b> Se está activada, cando se actualice o rexistro do usuario actualizarase a autenticación externa. Os campos deberían estar desbloqueados para poder editalos.</p>';
$string['auth_updateremote_ldap'] = '<p><b>Nota:</b> a actualización de datos LDAP externos require que vostede estabeleza os valores «binddn» e «bindpw» a un usuario con privilexios de edición de todos os rexistros de usuario. Polo momento, isto non preserva os atributos multi-valor, e eliminará os valores extra durante a actualización. </p>';
$string['auth_user_create'] = 'Activar a creación de usuarios';
$string['auth_user_creation'] = 'Os novos usuarios (anónimos) poden crear contas de usuario sobre a orixe externa de autenticación e confirmar mediante correo. Se activa isto, lémbrese de configurar as opcións do módulo específico para a creación de usuario.';
$string['auth_usernameexists'] = 'O nome de usuario seleccionado xa existe. Escolla outro.';
$string['auto_add_remote_users'] = 'Engadir automaticamente usuarios remotos';
$string['changepassword'] = 'URL para cambiar o contrasinal';
$string['changepasswordhelp'] = 'Aquí pode especificar onde poden os seus usuarios recuperar ou cambiar o seu nome de usuario/contrasinal se o esqueceron. Para elo, aparecerá un botón na páxina de acceso. Se deixa isto en branco, non se amosará este botón.';
$string['chooseauthmethod'] = 'Escolla un método de autenticación';
$string['chooseauthmethod_help'] = 'Este axuste determina o método de autenticación empregado cando o usuario accede. Só debe escoller a activación do engadido de autenticación, senón o usuario xa non poderá acceder. Para bloquear o acceso de usuarios seleccione «Sen acceso»';
$string['createpassword'] = 'Xerar o contrasinal e notificar ao usuario';
$string['createpasswordifneeded'] = 'Crear un contrasinal se for preciso';
$string['emailchangecancel'] = 'Cancelar o cambio de correo';
$string['emailchangepending'] = 'Cambio pendente. Abra a ligazón enviada a {$a->preference_newemail}.';
$string['emailnowexists'] = 'O enderezo de correo que tentou asignar ao seu perfil foi asignado a outra persoa. A súa solicitude de cambio queda cancelada, mais pode tentalo con outro enderezo.';
$string['emailupdate'] = 'Actualización do enderezo de correo';
$string['emailupdatemessage'] = 'Estimado(a) {$a->fullname},

Solicitou un cambio do seu enderezo de correo na súa conta de {$a->site}. Abra a seguinte ligazón no seu navegador para confirmar este cambio.

{$a->url}';
$string['emailupdatesuccess'] = 'O enderezo de correo do usuario <em>{$a->fullname}</em> foi actualizado satisfactoriamente a <em>{$a->email}</em>.';
$string['emailupdatetitle'] = 'Confirmación da actualización de correo en {$a->site}';
$string['enterthenumbersyouhear'] = 'Introduza os números que escoite';
$string['enterthewordsabove'] = 'Introduza as palabras de enriba';
$string['errormaxconsecutiveidentchars'] = 'Os contrasinais deben ter como máximo {$a} caracteres consecutivos idénticos.';
$string['errorminpassworddigits'] = 'Os contrasinais deben ter polo menos {$a} díxito(s).';
$string['errorminpasswordlength'] = 'Os contrasinais deben ter polo menos unha lonxitude de {$a} caracteres.';
$string['errorminpasswordlower'] = 'Os contrasinais deben ter polo menos {$a} letra(s) minúscula(s).';
$string['errorminpasswordnonalphanum'] = 'Os contrasinais deben ter polo menos {$a} caracteres non alfanuméricos.';
$string['errorminpasswordupper'] = 'Os contrasinais deben ter polo menos {$a} letra(s) maiúscula(s).';
$string['errorpasswordupdate'] = 'Produciuse un erro ao actualizar o contrasnal. O contrasinal non cambiou';
$string['event_user_loggedin'] = 'O usuario iniciou sesión';
$string['eventuserloggedinas'] = 'O usuario accedeu como outro usuario';
$string['forcechangepassword'] = 'Forzar o cambio de contrasinal';
$string['forcechangepasswordfirst_help'] = 'Forzar que os usuarios cambien o contrasinal a primeira vez que accedan a Moodle.';
$string['forcechangepassword_help'] = 'Forzar que os usuarios cambien o contrasinal a próxima vez que accedan a Moodle.';
$string['forgottenpassword'] = 'Se escribe aquí un URL, empregarase como páxina de recuperación do contrasinal perdido para este sitio. Isto está pensado para sitios nos que os contrasinais adminístranse totalmente fora de Moodle. Déixeo en branco para empregar a recuperación predeterminada do contrasinal.';
$string['forgottenpasswordurl'] = 'URL de contrasinal esquecido';
$string['getanaudiocaptcha'] = 'Obter un CAPTCHA de son';
$string['getanimagecaptcha'] = 'Obter un CAPTCHA de imaxe';
$string['getanothercaptcha'] = 'Obter outro CAPTCHA';
$string['guestloginbutton'] = 'Botón de acceso para convidados';
$string['incorrectpleasetryagain'] = 'Incorrecto. Ténteo de novo.';
$string['infilefield'] = 'Campo requirido no ficheiro';
$string['informminpassworddigits'] = 'cando menos {$a} díxito(s)';
$string['informminpasswordlength'] = 'cando menos {$a} carácter(es)';
$string['informminpasswordlower'] = 'cando menos {$a} letra(s) minúscula(s)';
$string['informminpasswordnonalphanum'] = 'cando menos {$a} caráter(es) non alfanuméricos';
$string['informminpasswordupper'] = 'cando menos {$a} letra(s) maiúscula(s)';
$string['informpasswordpolicy'] = 'O contrasinal debería ter {$a}';
$string['instructions'] = 'Instrucións';
$string['internal'] = 'Interno';
$string['locked'] = 'Bloqueado';
$string['md5'] = 'Cifrado (hash) MD5';
$string['nopasswordchange'] = 'Non é posíbel cambiar o contrasinal';
$string['nopasswordchangeforced'] = 'Vostede non pode continuar sen cambiar o seu contrasinal, porén, non se dispón unha páxina para cambiala. Póñase en contacto con seu administrador de Moodle.';
$string['noprofileedit'] = 'Non é posíbel editar o perfil';
$string['ntlmsso_attempting'] = 'Tentando Single Sign On mediante NTLM...';
$string['ntlmsso_failed'] = 'Non foi posíbel acceder automaticamente, tenteo na páxina de acceso normal...';
$string['ntlmsso_isdisabled'] = 'NTLM SSO está desactivado';
$string['passwordhandling'] = 'Xestión do campo do contrasinal';
$string['plaintext'] = 'Texto simple';
$string['pluginnotenabled'] = 'o engadido de autenticación «{$a}» non está activado.';
$string['pluginnotinstalled'] = 'o engadido de autenticación «{$a}» non está instalado.';
$string['potentialidps'] = 'Acceda empregando a súa conte en:';
$string['recaptcha'] = 'reCAPTCHA';
$string['recaptcha_help'] = 'O CAPTCHA empregase para impedir abusos de programas automáticos. Simplemente escriba as palabras na caixa, en orde e separadas por un espazo.

Se non está seguro de que palabras son, pode conseguir outro CAPTCHA, ou un CAPTCHA de son.';
$string['recaptcha_link'] = 'auth/email';
$string['selfregistration'] = 'Autorexistro';
$string['selfregistration_help'] = 'Se se selecciona un engadido de autenticación como o autorexistro baseado en correo, entón permíteselles aos potenciais usuarios rexistrarse e crear contas. Isto resulta na posibilidade de que os «spammers» creen contas para poder empregar as mensaxes no foro, artigos de blog, etc como lixo. Para evitar este risco, o autorexistro debe ser desactivado ou limitado axustándoo en  <em>Dominios de correo permitidos</em>';
$string['sha1'] = 'Cifrado (hash) SHA-1';
$string['showguestlogin'] = 'Pode agochar ou amosar o botón de acceso para convidados na páxina de acceso.';
$string['stdchangepassword'] = 'Empregar a páxina estándar para o cambio de contrasinal';
$string['stdchangepassword_expl'] = 'Se o sistema externo de autenticación permite cambios de contrasinal en Moodle, cambie isto a «Si». Este axuste substitúe o «URL para cambiar o contrasinal».';
$string['stdchangepassword_explldap'] = 'NOTA: recomendase que empregue LDAP sobre un túnel cifrado SSL (ldaps://) se o servidor LDAP é remoto.';
$string['suspended'] = 'Conta suspendida';
$string['suspended_help'] = 'As contas de usuario suspendidas non poden acceder ou empregar os servizos web, e todas as mensaxes saíntes desbotaranse.';
$string['testsettings'] = 'Proba das configuracións';
$string['testsettingsheading'] = 'Proba da configuración da autenticación - {$a}';
$string['unlocked'] = 'Desbloqueado';
$string['unlockedifempty'] = 'Desbloqueado se está baleiro';
$string['update_never'] = 'Nunca';
$string['update_oncreate'] = 'Ao crearse';
$string['update_onlogin'] = 'En cada acceso';
$string['update_onupdate'] = 'Ao actualizar';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() non admite o tipo de usuario seleccionado: usertype: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() non admite o tipo de usuario seleccionado (...aínda)';
