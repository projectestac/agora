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
 * Strings for component 'auth', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   auth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actauthhdr'] = 'Connectors d\'autenticació actius';
$string['alternatelogin'] = 'Si introduïu un URL aquí, s\'utilitzarà com a pàgina d\'entrada d\'aquest lloc. Aquesta pàgina hauria de contenir un formulari, amb la propietat \'action\' igual a <strong>{$a}</strong> i que retornés els camps <strong>username</strong> i <strong>password</strong>.<br />Tingueu cura de no escriure un URL incorrecte, ja que podríeu impedir l\'entrada dels usuaris en aquest lloc.<br />Si deixeu en blanc aquest paràmetre s\'utilitzarà la pàgina d\'entrada per defecte.';
$string['alternateloginurl'] = 'URL d\'entrada alternatiu';
$string['auth_changepasswordhelp'] = 'Ajuda de canvi de contrasenya';
$string['auth_changepasswordhelp_expl'] = 'Mostra l\'ajuda de canvi de contrasenya als usuaris que hagin oblidat la contrasenya {$a}. Aquest ajuda es visualitzarà en lloc de o a més a més de l\'<strong>URL de canvi de contrasenya</strong> o el canvi de contrasenya intern de Moodle.';
$string['auth_changepasswordurl'] = 'URL de canvi de contrasenya';
$string['auth_changepasswordurl_expl'] = 'Especifiqueu l\'URL on cal enviar els usuaris que hagin oblidat la contrasenya {$a}. Trieu <strong>No</strong> en <strong>Utilitza la pàgina estàndard de canvi de contrasenya</strong>.';
$string['auth_changingemailaddress'] = 'Heu sol·licitat un canvi d\'adreça de correu. Adreça actual: {$a->oldemail}. Adreça nova: {$a->newemail}. Per a més seguretat us enviarem un missatge de correu a l\'adreça nova, de manera que puguem confirmar que us pertany. El canvi d\'adreça de correu només es farà efectiu si seguiu l\'enllaç que figura en aquell missatge.';
$string['auth_common_settings'] = 'Paràmetres comuns';
$string['auth_data_mapping'] = 'Mapatge de dades';
$string['authenticationoptions'] = 'Opcions d\'autenticació';
$string['auth_fieldlock'] = 'Bloca valor';
$string['auth_fieldlock_expl'] = '<p><b>Bloca valor:</b> si l\'habiliteu, impedirà que els usuaris i administradors de Moodle editin el camp directament. Utilitzeu aquesta opció quan aquestes es mantinguin en un sistema d\'autenticació extern.';
$string['auth_fieldlocks'] = 'Bloca camps d\'usuari';
$string['auth_fieldlocks_help'] = '<p>Podeu blocar els camps de dades d\'usuari. Això és útil en llocs on els administradors mantenen manualment les dades dels usuaris tot editant els registres d\'usuari o per mitjà de l\'opció de càrrega d\'usuaris. Si bloqueu camps requerits per Moodle, assegureu-vos que aquestes dades s\'introdueixen en crear els comptes d\'usuari, o en cas contrari no es podran utilitzar els comptes.</p><p>Considereu la possibilitat d\'utilitzar el mode \'Desblocat si està buit\' per evitar aquest problema.</p>';
$string['authinstructions'] = 'Aquí podeu posar instruccions per als vostres usuaris, per tal que sàpiguen quin nom d\'usuari i quina contrasenya han d\'utilitzar. El text apareixerà a la pàgina d\'entrada. Si el deixeu en blanc no hi haurà instruccions.';
$string['auth_invalidnewemailkey'] = 'Error: si esteu intentant confirmar un canvi d\'adreça de correu, probablement heu copiat malament l\'enllaç que havíeu rebut. Copieu l\'enllaç complet i torneu a intentar-ho.';
$string['auth_multiplehosts'] = 'Podeu especificar diversos ordinadors (p. e. host1.com; host2.com; host3.com)';
$string['auth_outofnewemailupdateattempts'] = 'Heu esgotat els intents d\'actualització de la vostra adreça de correu electrònic. La vostra sol·licitud s\'ha cancel·lat.';
$string['auth_passwordisexpired'] = 'La vostra contrasenya ha caducat. Voleu canviar-la ara?';
$string['auth_passwordwillexpire'] = 'La vostra contrasenya caducarà aviat ({$a} dies). Voleu canviar-la ara?';
$string['auth_remove_delete'] = 'Suprimeix el compte intern';
$string['auth_remove_keep'] = 'Manté el compte intern';
$string['auth_remove_suspend'] = 'Suspèn el compte intern';
$string['auth_remove_user'] = 'Especifiqueu què cal fer amb els comptes d\'usuari interns durant la sincronització en massa, quan l\'usuari ha estat suprimit en la font externa. Només els usuaris suspesos es restauren automàticament si reapareixen a la font externa.';
$string['auth_remove_user_key'] = 'Usuari extern suprimit';
$string['auth_sync_script'] = 'Script de sincronització del cron';
$string['auth_updatelocal'] = 'Actualitza dades locals';
$string['auth_updatelocal_expl'] = '<p><b>Actualitza dades locals:</b> si habiliteu aquesta opció, el camp s\'actualitzarà (amb les dades externes d\'autenticació) cada vegada que l\'usuari entri o quan es faci una sincronització d\'usuaris. Els camps definits per actualitzar-se localment haurien d\'estar blocats.</p>';
$string['auth_updateremote'] = 'Actualitza dades externes';
$string['auth_updateremote_expl'] = '<p>Actualitza dades externes:</b> si habiliteu aquesta opció, les dades externes d\'autenticació s\'actualitzaran quan s\'actualitzi el registre de l\'usuari. Els camps s\'haurien de desblocar per permetre l\'edició.</p>';
$string['auth_updateremote_ldap'] = '<p><b>Nota:</b> actualitzar dades LDAP externes requreix definir binddn i dindpw amb un bind-user que tingui privilegis d\'edició en tots els registres d\'usuari. Actualment no preserva valors múltiples en els atributs i suprimeix els valors extra quan es fa l\'actualització.</p>';
$string['auth_user_create'] = 'Habilita la creació d\'usuaris';
$string['auth_user_creation'] = 'Els nous usuaris (anònims) poden crear comptes d\'usuari en la font d\'autenticació externa i confirmar-los via correu electrònic. Si habiliteu aquesta opció, recordeu de configurar també opcions específiques del mòdul per a la creació d\'usuaris.';
$string['auth_usernameexists'] = 'El nom d\'usuari elegit ja existeix. Sisplau trieu-ne un altre.';
$string['auto_add_remote_users'] = 'Afegeix automàticament usuaris remots';
$string['changepassword'] = 'URL de canvi de contrasenya';
$string['changepasswordhelp'] = 'Aquí podeu especificar una adreça en la qual els usuaris puguin recuperar o canviar la seua contrasenya si se n\'han oblidat. Aquesta opció apareixerà en forma de botó a la pàgina d\'entrada. Si la deixeu en blanc no apareixerà el botó.';
$string['chooseauthmethod'] = 'Trieu un mètode d\'autenticació:';
$string['chooseauthmethod_help'] = 'Aquest paràmetre determina el mètode d\'autenticació utilitzat quan l\'usuari s\'identifica. Només s\'haurien d\'escollir els mòduls d\'autenticació habilitats, altrament l\'usuari no podrà identificar-se més. Per tal d\'evitar que un usuari s\'identifiqui, escolliu "Sense identificació".';
$string['createpasswordifneeded'] = 'Crea la contrasenya si cal';
$string['emailchangecancel'] = 'Cancel·la el canvi de correu';
$string['emailchangepending'] = 'Canvi pendent. Obriu l\'enllaç que us hem enviat a l\'adreça {$a->preference_newemail}.';
$string['emailnowexists'] = 'L\'adreça de correu que heu intentat vincular al vostre perfil ha estat assignada a un altre compte des que vau fer la sol·licitud de canvi de correu. Per tant s\'ha cancel·lat aquesta sol·licitud. Podeu tornar a intentar-ho amb una altra adreça.';
$string['emailupdate'] = 'Actualització de l\'adreça de correu';
$string['emailupdatemessage'] = '{$a->fullname},

Heu sol·licitat el canvi d\'adreça de correu electrònic del vostre compte d\'usuari en {$a->site}. Obriu si us plau l\'enllaç següent amb el vostre navegador per confirmar el canvi:

{$a->url}';
$string['emailupdatesuccess'] = 'L\'adreça de correu electrònic de l\'usuari <em>{$a->fullname}</em> ha estat actualitzada i ara és <em>{$a->email}</em>.';
$string['emailupdatetitle'] = 'Confirmació d\'actualització d\'adreça de correu en {$a->site}';
$string['enterthenumbersyouhear'] = 'Introduïu els nombres que sentiu';
$string['enterthewordsabove'] = 'Introduïu les paraules de dalt';
$string['errormaxconsecutiveidentchars'] = 'La contrasenya ha de contenir almenys {$a} caràcters consecutius.';
$string['errorminpassworddigits'] = 'La contrasenya ha de contenir almenys {$a} dígit/s.';
$string['errorminpasswordlength'] = 'La longitud mínima de la contrasenya són {$a} caràcters.';
$string['errorminpasswordlower'] = 'La contrasenya ha de contenir almenys {$a} minúscula/es.';
$string['errorminpasswordnonalphanum'] = 'La contrasenya ha de contenir almenys {$a} caràcter/s no alfanumèric/s.';
$string['errorminpasswordupper'] = 'La contrasenya ha de contenir almenys {$a} majúscula/es.';
$string['errorpasswordupdate'] = 'No s\'ha pogut canviar la contrasenya. S\'ha produït un error.';
$string['forcechangepassword'] = 'Imposa canvi de contrasenya';
$string['forcechangepasswordfirst_help'] = 'Obliga els usuaris a canviar la contrasenya la pròxima vegada que entrien en Moodle.';
$string['forcechangepassword_help'] = 'Obliga els usuaris a canviar la contrasenya la pròxima vegada que entrien en Moodle.';
$string['forgottenpassword'] = 'Si introduïu un URL aquí, s\'utilitzarà com a pàgina de recuperació de contrasenyes d\'aquest lloc. Aquest paràmetre està pensat per als casos en què les contrasenyes es gestionen totalment fora de Moodle. Deixeu el camp en blanc per a utilitzar el mecanisme per defecte de recuperació de contrasenyes.';
$string['forgottenpasswordurl'] = 'URL de recuperació de contrasenyes';
$string['getanaudiocaptcha'] = 'Obté un àudio CAPTCHA';
$string['getanimagecaptcha'] = 'Obté una imatge CAPTCHA';
$string['getanothercaptcha'] = 'Obté un altre CAPTCHA';
$string['guestloginbutton'] = 'Botó d\'entrada de visitants';
$string['incorrectpleasetryagain'] = 'Incorrecte. Torneu a intentar-ho.';
$string['infilefield'] = 'Camp requerit en el fitxer';
$string['informminpassworddigits'] = 'com a mínim {$a} dígit(s)';
$string['informminpasswordlength'] = 'com a mínim {$a} caràcters';
$string['informminpasswordlower'] = 'com a mínim {$a} minúscula/es';
$string['informminpasswordnonalphanum'] = 'com a mínim {$a} caràcter(s) no alfanumèric(s)';
$string['informminpasswordupper'] = 'com a mínim {$a} lletra/es majúscula/es';
$string['informpasswordpolicy'] = 'La contrasenya ha de tenir {$a}';
$string['instructions'] = 'Instruccions';
$string['internal'] = 'Intern';
$string['locked'] = 'Blocat';
$string['md5'] = 'Resum MD5';
$string['nopasswordchange'] = 'No es pot canviar la contrasenya';
$string['nopasswordchangeforced'] = 'No podeu continuar sense canviar la contrasenya, però no està disponible cap pàgina on pugueu canviar la contrasenya. Si us plau contacteu amb l\'administració del vostre Moodle.';
$string['noprofileedit'] = 'El perfil no es pot editar';
$string['ntlmsso_attempting'] = 'S\'està intentant l\'autenticació única a través de NTLM...';
$string['ntlmsso_failed'] = 'L\'entrada automàtica ha fallat. S\'intentarà l\'entrada per la pàgina normal...';
$string['ntlmsso_isdisabled'] = 'L\'autenticació única per NTLM està inhabilitada';
$string['passwordhandling'] = 'Gestió del camp de contrasenya';
$string['plaintext'] = 'Text net';
$string['pluginnotenabled'] = 'El connector d\'autenticació \'{$a}\' no està habilitat.';
$string['pluginnotinstalled'] = 'El connector d\'autenticació \'{$a}\' no està instal·lat.';
$string['potentialidps'] = 'Us identifiqueu usualment en algun altre lloc abans d\'arribar a aquí?<br />Escolliu-lo de la llista següent per identificar-vos al vostre lloc usual:';
$string['recaptcha'] = 'reCAPTCHA';
$string['recaptcha_help'] = 'El CAPTCHA s\'usa per evitar l\'abús dels programes automàtics. Simplement introduïu les paraules al requadre, en ordre i separades per un espai.

Si no sabeu segur quines paraules són, podeu provar un altre CAPTCHA o bé un CAPTCHA sonor.';
$string['selfregistration'] = 'Autoregistre';
$string['selfregistration_help'] = 'Si seleccioneu un connector d\'autenticació, per exemple l\'autoregistre basat en correu electrònic, usuaris potencials es podran inscriure i crear comptes. Això fa possible que s\'enviï brossa a fòrums, bitàcoles, etc. Per evitar aquest perill, inhabiliteu l\'autoregistre o limiteu-lo mitjançant el paràmetre <em>Dominis de correu permesos</em>';
$string['sha1'] = 'Resum SHA-1';
$string['showguestlogin'] = 'Podeu ocultar o mostrar el botó d\'entrada com a visitant a la pàgina d\'entrada.';
$string['stdchangepassword'] = 'Utilitza la pàgina estàndard de canvi de contrasenya';
$string['stdchangepassword_expl'] = 'Si el sistema extern d\'autenticació permet canvis de contrasenya per mitjà de Moodle, commuteu aquest paràmetre a Sí. Aquest paràmetre substitueix l\'"URL per a canvi de contrasenya".';
$string['stdchangepassword_explldap'] = 'NOTA: s\'aconsella que utilitzeu LDAP sobre un túnel xifrat SSL (ldaps://) si el servidor LDAP és remot.';
$string['suspended'] = 'Compte invalidat';
$string['suspended_help'] = 'Els comptes invalidats no poden entrar al Moodle o utilitzar serveis web, i qualsevol missatge de sortida se\'ls rebutjarà.';
$string['unlocked'] = 'Desblocat';
$string['unlockedifempty'] = 'Desblocat si està buit';
$string['update_never'] = 'Mai';
$string['update_oncreate'] = 'En crear';
$string['update_onlogin'] = 'En cada entrada';
$string['update_onupdate'] = 'En actualitzar';
$string['user_activatenotsupportusertype'] = 'auth: l\'user_activate() de l\'ldap no suporta el tipus d\'usuari seleccionat: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: l\'user_disable() de l\'ldap no suporta el tipus d\'usuari seleccionat (..encara)';
