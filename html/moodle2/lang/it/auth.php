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
 * Strings for component 'auth', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   auth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actauthhdr'] = 'Plugin di autenticazione disponibili';
$string['alternatelogin'] = 'Specificando un URL come Pagina di login sostitutiva, Moodle la utilizzerà al posto della pagina di login standard. La Pagina di login sostitutiva deve contenere un form con la "action property" impostata a <strong>\'{$a}\'</strong> e deve contenere i campi <strong>username</strong> e <strong>password</strong>.<br/> Fai attenzione a non inserire URL errati  perché ti chiuderai  fuori dal sito. <br/>
Non compilare questo campo se preferisci utilizzare la pagina di login standard.';
$string['alternateloginurl'] = 'URL pagina di login sostitutiva';
$string['auth_changepasswordhelp'] = 'Aiuto cambiamento password';
$string['auth_changepasswordhelp_expl'] = 'Visualizza come recuperare la propria  {$a} password a coloro  che l\'hanno dimenticata. L\'aiuto verrà  visualizzato da solo o in sostituzione dell <strong>Pagina cambiamento password</strong> del sistema di cambiamento password interno di Moodle.';
$string['auth_changepasswordurl'] = 'Pagina cambiamento password';
$string['auth_changepasswordurl_expl'] = 'Indicare l\'URL in cui indirizzare gli utenti che hanno perso la loro {$a} password. Impostare <strong>Utilizza la pagina standard per il cambio della password</strong> a <strong>No</strong>';
$string['auth_changingemailaddress'] = 'Hai richiesto il cambio di indirizzo email da {$a->oldemail} a {$a->newemail}. Per motivi di sicurezza ti stiamo inviando un messaggio al nuovo indirizzo per avere conferma che ti appartenga realmente. Il tuo indirizzo email sarà aggiornato appena cliccherai sul link presente nel messaggio.';
$string['auth_common_settings'] = 'Impostazioni tipiche';
$string['auth_data_mapping'] = 'Mappatura dei dati';
$string['authenticationoptions'] = 'Opzioni di autenticazione';
$string['auth_fieldlock'] = 'Campi bloccati nel profilo utente';
$string['auth_fieldlock_expl'] = '<p><b>Blocca valore:</b>Se abilitato, impedirà  agli utenti e agli amministratori di Moodle di modificare il campo direttamente. Utilizzare questa opzione se si sta gestendo questi dati in un sistema di autenticazione esterno.</p>';
$string['auth_fieldlocks'] = 'Campi bloccati nel profilo utente';
$string['auth_fieldlocks_help'] = '<p>È possibile bloccare uno o più campi del profilo utente. La funzione può risultare particolarmente utile in quei siti dove i dati dei profili utente sono gestiti a mano dagli amministratori, i quali possono modificare i record degli utenti oppure caricarli utilizzando la funzione \'Importa utenti\'.</p><p>Se si bloccano campi che Moodle considera obbligatori, accertarsi di fornire tali dati durante la creazione di account, altrimenti gli account incompleti non saranno utilizzabili.</p><p>Per evitare questo problema, è possibile utilizzare l\'opzione \'Libero se vuoto\'.</p>';
$string['authinstructions'] = 'In questo campo è possibile inserire istruzioni per il login specifiche per i vostri utenti. Lasciando vuoto il campo verranno visualizzate le istruzioni di default.';
$string['auth_invalidnewemailkey'] = 'Errore: se stai cercando di confermare un cambio di indirizzo email, puoi aver fatto un errore nel copiare il link che ti abbiamo inviato per email. Prova ancora, copiando correttamente l\'indirizzo.';
$string['auth_multiplehosts'] = 'Possono essere elencati più macchine remote (es. host1.com;host2.com;host3.com)';
$string['auth_outofnewemailupdateattempts'] = 'Hai superato i tentativi permessi per modificare il tuo indirizzo email. La richiesta di modifica è stata annullata.';
$string['auth_passwordisexpired'] = 'La password è scaduta. Vuoi cambiarla adesso?';
$string['auth_passwordwillexpire'] = 'La password scadrà tra {$a} giorni. Vuoi cambiarla adesso?';
$string['auth_remove_delete'] = 'Cancella interna';
$string['auth_remove_keep'] = 'Mantieni interna';
$string['auth_remove_suspend'] = 'Sospendi interna';
$string['auth_remove_user'] = 'Specifica cosa fare con gli account di utenti interni durante la sincronizzazione in massa quando gli utenti sono stati rimossi dalla fonte esterna. Solo gli utenti sospesi sono automaticamente riattivati se riappaiono nella fonte esterna.';
$string['auth_remove_user_key'] = 'Utente esterno rimosso';
$string['auth_sync_script'] = 'Sincronizzazione tramite Cron';
$string['auth_updatelocal'] = 'Aggiorna dati interni';
$string['auth_updatelocal_expl'] = '<p><b>Aggiorna dati interni:</b> Se abilitato, il campo sarà  aggiornato (dall\'autenticazione esterna) tutte le volte che l\'utente accede o c\'è una sincronizzazione utente. I campi impostati per l\'aggiornamento locale devono essere bloccati.</p>';
$string['auth_updateremote'] = 'Aggiorna dati esterni';
$string['auth_updateremote_expl'] = '<p><b>Aggiorna dati esterni:</b> Se abilitato, l\'autenticazione esterna sarà  aggiornata quando i dati dell\'utente sono aggiornati. I campi devono essere sboccati per consentirne la modifica.</p>';
$string['auth_updateremote_ldap'] = '<p><b>Nota:</b> Aggiornando i dati esterni LDAP è richiesta l\'impostazione di binddn e di bindpw a un utente di bind con privilegi di modifica per tutti i dati degli utenti. Questo attualmente non preserva gli attributi multivalore, e rimuoverà  i valori aggiuntivi durante l\'aggiornamento.</p>';
$string['auth_user_create'] = 'Abilita creazione utente';
$string['auth_user_creation'] = 'I nuovi utenti (anonimi) possono iscriversi alla sorgente di autenticazione esterna e confermare tramite email. Se abiliti questo, ricorda anche di configurare le opzioni specifiche del modulo per la creazione degli utenti';
$string['auth_usernameexists'] = 'Il nome utente scelto è già  utilizzato. Sceglierne uno nuovo.';
$string['auto_add_remote_users'] = 'Aggiungi automaticamente gli utenti remoti';
$string['changepassword'] = 'Cambia URL delle password';
$string['changepasswordhelp'] = 'L\'indirizzo della pagina dove gli utenti possono recarsi per cambiare o recuperare la propria password. L\'indirizzo sarà raggiungibile tramite un pulsante presente nella pagina di login e nel profilo utente. Se l\'indirizzo viene lasciato vuoto, il pulsante non verrà  visualizzato.';
$string['chooseauthmethod'] = 'Metodo di autenticazione';
$string['chooseauthmethod_help'] = 'L\'impostazione consente la scelta del  metodo di autenticazione associato all\'utente. E\' necessario scegliere solamente plugin di autenticazione abilitati, altrimenti l\'utente non sarà in grado di autenticarsi. Per impedire l\'autenticazione, scegliere "Account disabilitato".';
$string['createpassword'] = 'Genera la password e informa l\'utente';
$string['createpasswordifneeded'] = 'Genera le password se necessario';
$string['emailchangecancel'] = 'Annulla cambio email';
$string['emailchangepending'] = 'Cambio email in corso. Clicca sul link presente nel messaggio che ti è stato inviato a {$a->preference_newemail}.';
$string['emailnowexists'] = 'L\'indirizzo email che hai cercato di assegnare al tuo profilo è stato, nel frattempo, assegnato a qualcun altro, dal momento della tua richiesta. La richiesta di modifica email è stata quindi annullata, ma puoi provare ancora con un indirizzo email differente.';
$string['emailupdate'] = 'Modifica indirizzo email';
$string['emailupdatemessage'] = 'Gentile {$a->fullname},

hai richiesto la modifica dell\'indirizzo email del tuo account sul sito {$a->site}. Per confermare la richiesta, apri il link seguente con il browser:

{$a->url}';
$string['emailupdatesuccess'] = 'L\'indirizzo email dell\'utente <em>{$a->fullname}</em> è stato modificato in <em>{$a->email}</em>.';
$string['emailupdatetitle'] = 'Conferma del cambio di email su {$a->site}';
$string['enterthenumbersyouhear'] = 'Inserisci i numeri che senti';
$string['enterthewordsabove'] = 'Inserisci le parole sovrastanti';
$string['errormaxconsecutiveidentchars'] = 'La password può contenere un massimo di {$a} caratteri identici consecutivi.';
$string['errorminpassworddigits'] = 'La password deve contenere almeno {$a} numeri.';
$string['errorminpasswordlength'] = 'La password deve essere lunga almeno {$a} caratteri.';
$string['errorminpasswordlower'] = 'La password deve contenere almeno {$a} lettere minuscole.';
$string['errorminpasswordnonalphanum'] = 'La password deve contenere almeno {$a} caratteri non alfanumerici (punteggiatura, trattini, eccetera).';
$string['errorminpasswordupper'] = 'La password deve contenere almeno {$a} lettere maiuscole.';
$string['errorpasswordupdate'] = 'Si è verificato un errore durante l\'aggiornamento della password, la password non è stata modificata';
$string['event_user_loggedin'] = 'Autenticato utente';
$string['eventuserloggedinas'] = 'Autenticato utente come altro utente';
$string['forcechangepassword'] = 'Obbliga il cambiamento della password';
$string['forcechangepasswordfirst_help'] = 'Obbliga gli utenti a cambiare la password al primo accesso a Moodle.';
$string['forcechangepassword_help'] = 'Obbliga gli utenti a cambiare la password al prossimo accesso a Moodle.';
$string['forgottenpassword'] = 'E\' possibile inserire un URL che sarà usato come pagina di recupero delle password. L\'impostazione è particolarmente utile per quei siti dove le password sono gestite esternamente a Moodle. Non inserendo un URL sarà usata la pagina di default per il recupero delle password.';
$string['forgottenpasswordurl'] = 'URL pagina recupero password';
$string['getanaudiocaptcha'] = 'Chiedi un audio CAPTCHA';
$string['getanimagecaptcha'] = 'Chiedi un\'immagine CAPTCHA';
$string['getanothercaptcha'] = 'Chiedi un altro CAPTCHA';
$string['guestloginbutton'] = 'Pulsante login ospite';
$string['incorrectpleasetryagain'] = 'Sbagliato. Prova ancora.';
$string['infilefield'] = 'Il campo è presente nel file';
$string['informminpassworddigits'] = 'contenere almeno {$a} numero(i)';
$string['informminpasswordlength'] = 'almeno {$a} caratteri';
$string['informminpasswordlower'] = 'contenere almeno {$a} lettera(e) minuscola(e)';
$string['informminpasswordnonalphanum'] = 'contenere almeno {$a} carattere(i)  non alfanumerico(i)';
$string['informminpasswordupper'] = 'contenere almeno {$a} lettera(e) maiuscola(e)';
$string['informpasswordpolicy'] = 'La password deve essere lunga {$a}';
$string['instructions'] = 'Istruzioni';
$string['internal'] = 'Interna';
$string['locked'] = 'Bloccato';
$string['md5'] = 'Hash MD5';
$string['nopasswordchange'] = 'La password non può essere modificata';
$string['nopasswordchangeforced'] = 'Non puoi proseguire senza modificare la tua password, ma non c\'è una pagina per cambiarla. Contatta il tuo amministratore Moodle.';
$string['noprofileedit'] = 'I profili non possono essere modificati';
$string['ntlmsso_attempting'] = 'Esecuzione Single Sign On via NTLM ...';
$string['ntlmsso_failed'] = 'Auto-login fallito. Prova com la pagina di login standard...';
$string['ntlmsso_isdisabled'] = 'L\'SSO via NTLM non è abilitato';
$string['passwordhandling'] = 'Gestione del campo password';
$string['plaintext'] = 'Testo semplice';
$string['pluginnotenabled'] = 'Il plugin \'{$a}\' per l\'autenticazione non è abilitato.';
$string['pluginnotinstalled'] = 'Il plugin \'{$a}\' per l\'autenticazione non è installato.';
$string['potentialidps'] = 'Autenticati su:';
$string['recaptcha'] = 'reCAPTCHA';
$string['recaptcha_help'] = '<h2>Descrizione</h2>
<p>Un CAPTCHA è un programma che capisce se l\'utente è una persona o un computer. I CAPTCHA sono usati da molti siti web per impedire abusi da parte dei "bots", programmi automatici scritti di solito per generare spam. Nessun programma software è in grado, infatti, di leggere come un essere umano un testo distorto, per cui i bots non possono navigare nei siti protetti dai CAPTCHA.</p>

<h2>Instruzioni</h2>
<p>Inserire nell\'apposito box le parole che appaiono, nello stesso ordine e separate da uno spazio. Questo aiuta a impedire che programmi automatici abusino di questo servizio.</p>

<p>Se non si è sicuri dell\'interpretazione delle parole, si può provare con le più probabili oppure cliccare sul link "Chiedi un altro CAPTCHA". </p>

<p>Chi ha problemi di vista può cliccare sul link "Chiedi un audio CAPTCHA" per sentire un insieme di cifre che possono essere inserite invece del testo distorto.</p>';
$string['selfregistration'] = 'Auto creazione account';
$string['selfregistration_help'] = 'Impostando un plugin per l\'auto creazione di account, come ad esempio il plugin per la creazione di account via email, qualsiasi visitatore del sito potrà crearsi un account. Tale funzione espone il sito al rischio che spammer possano creare account per inviare post indesiderati attraverso forum, blog od altre funzioni. Per evitare questo rischio è bene disabilitare l\' Auto creazione di account  oppure limitarla attraverso l\'impostazione <em>Domini di posta autorizzati</em> oppure ancora attivando il reCAPTCHA.';
$string['sha1'] = 'Hash SHA-1';
$string['showguestlogin'] = 'E\' possibile visualizzare o nascondere  il pulsante \'login come ospite\' nella pagina di login standard';
$string['stdchangepassword'] = 'Utilizzare la pagina standard per il cambiamento della password?';
$string['stdchangepassword_expl'] = 'Se il sistema di autenticazione esterna consente il cambiamento delle password attraverso Moodle, cambiate questo su Si. Questa impostazione esclude l\'URL per cambiare la password.';
$string['stdchangepassword_explldap'] = 'Nota: Si raccomanda di utilizzare LDAP su una connessione criptata con SSL (ldaps://) se il server è remoto.';
$string['suspended'] = 'Account sospeso';
$string['suspended_help'] = 'Gli account sospesi non possono autenticarsi, non possono usare i web service e non ricevono messaggi.';
$string['testsettings'] = 'Test impostazioni';
$string['testsettingsheading'] = 'Test impostazioni di autenticazione - {$a}';
$string['unlocked'] = 'Libero';
$string['unlockedifempty'] = 'Libero se vuoto';
$string['update_never'] = 'Mai';
$string['update_oncreate'] = 'Solo al primo accesso';
$string['update_onlogin'] = 'Ad ogni accesso';
$string['update_onupdate'] = 'In caso di modifica';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate()non supporta il tipo di utente selezionato: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_activate()ancora non supporta il tipo di utente selezionato';
