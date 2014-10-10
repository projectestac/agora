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
 * Strings for component 'auth_ldap', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_ldap_ad_create_req'] = 'L\'account in Active Directory non è stato creato. Controllare di avere tutti i requisiti per poterlo fare (connessione LDAPS, utente bind con privilegi adeguati, eccetera)';
$string['auth_ldap_attrcreators'] = 'Elenco di gruppi o contesti i cui membri sono autorizzati a creare attributi. Separa gruppi diversi con\';\'. Ad esempio \'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_attrcreators_key'] = 'Creatori di attributi';
$string['auth_ldap_auth_user_create_key'] = 'Creare utenti esternamente';
$string['auth_ldap_bind_dn'] = 'Se desideri usare un utente Bind per cercare gli utenti, inseriscilo qui. Ad esempio \'cn=ldapuser,ou=public,o=org\'';
$string['auth_ldap_bind_dn_key'] = 'Distinguished name';
$string['auth_ldap_bind_pw'] = 'Password dell\'utente Bind.';
$string['auth_ldap_bind_pw_key'] = 'Password';
$string['auth_ldap_bind_settings'] = 'Impostazioni Bind';
$string['auth_ldap_changepasswordurl_key'] = 'URL cambio password';
$string['auth_ldap_contexts'] = 'L\'elenco dei contesti dove sono presenti gli utenti. Separare  contesti diversi con \';\'. Ad esempio: \'ou=users,o=org; ou=others,o=org\'';
$string['auth_ldap_contexts_key'] = 'Contesti';
$string['auth_ldap_create_context'] = 'Se abiliti la creazione degli utenti con conferma via e-mail, specifica il contesto dove verranno creati gli utenti. Questo contesto deve essere diverso da quello di altri utenti per prevenire problemi di sicurezza. Non è necessario aggiungere questo contesto alla variabile ldap_context, Moodle cercherà  gli utenti di questo contesto automaticamente.
.<br /><b>Nota!</b> Devi modificare la funzione auth_user_create() nel file auth/ldap/lib.php per far funzionare la creazione degli utenti.';
$string['auth_ldap_create_context_key'] = 'Contesto per i nuovi utenti';
$string['auth_ldap_create_error'] = 'Si è verificato un errore durante la creazione dell\'utente in LDAP.';
$string['auth_ldap_creators'] = 'Elenco di gruppi o contesti i cui membri sono autorizzati a creare nuovi corsi. Separa i diversi con \';\'. Ad esempio \'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_creators_key'] = 'Creatori';
$string['auth_ldapdescription'] = 'Il plugin cosnete l\'autenticazione tramite un server LDAP esterno.
Se il nome utente e la password forniti sono validi, Moodle crea un nuovo utente nel proprio database. Il plugin può leggere gli attributi dell\'utente da LDAP e popolare i campi desiderati in Moodle. Ai login successivi verranno verificati solo il nome utente e la password.';
$string['auth_ldap_expiration_desc'] = 'Seleziona No per disabilitare il controllo delle password scadute o la lettura della data di scadenza delle password da LDAP';
$string['auth_ldap_expiration_key'] = 'Scadenza';
$string['auth_ldap_expiration_warning_desc'] = 'Numero di giorni che precedono l\'invio dell\'avviso di password scaduta.';
$string['auth_ldap_expiration_warning_key'] = 'Avviso di scadenza';
$string['auth_ldap_expireattr_desc'] = 'Opzionale: modifica l\'attributo ldap che stabilisce la data di scadenza della password';
$string['auth_ldap_expireattr_key'] = 'Attributo di scadenza';
$string['auth_ldapextrafields'] = 'Questi campi sono opzionali. E\'  possibile scegliere di riempire alcuni campi dell\'utente in Moodle con i dati provenienti dai <b>campi LDAP</b> qui specificati. <p>Lasciando i campi vuoti, non verranno trasferiti dati da LDAP e verranno usati i dati di default di Moodle.</p><p>In entrambi i casi, gli utenti potranno modificare questi campi dopo essersi autenticati.</p>';
$string['auth_ldap_graceattr_desc'] = 'Opzionale: esclude l\'attributo gracelogin';
$string['auth_ldap_gracelogin_key'] = 'Attributo Grace login';
$string['auth_ldap_gracelogins_desc'] = 'Abilita il supporto del gracelogin di LDAP. Alla scadenza della password, l\'utente potrà autenticarsi finché il contatore gracelogin non sarà a 0. Abilitando questa impostazione, se la password è scaduta, viene visualizzato il messaggio di grace login.';
$string['auth_ldap_gracelogins_key'] = 'Grace login';
$string['auth_ldap_groupecreators'] = 'Elenco di gruppi o contesti i cui membri sono autorizzati a creare gruppi. Separa i gruppi multipli con \';\'. Ad esempio \'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_groupecreators_key'] = 'Creatori di gruppi';
$string['auth_ldap_host_url'] = 'URL del server LDAP, ad esempio \'ldap://ldap.myorg.com/\' oppure \'ldaps://ldap.myorg.com/\'';
$string['auth_ldap_host_url_key'] = 'URL dell\'host';
$string['auth_ldap_ldap_encoding'] = 'La codifica usata dal server LDAP, .molto probabilmente utf-8. MS AD v2 usa la codifica default della piattaforma, come cp1252, cp1250, ecc.';
$string['auth_ldap_ldap_encoding_key'] = 'Codifica LDAP';
$string['auth_ldap_login_settings'] = 'Impostazioni login';
$string['auth_ldap_memberattribute'] = 'Opzionale: modifica l\'attributo user member nel caso gli utenti appartengano ad un gruppo. Normalmente \'member\'';
$string['auth_ldap_memberattribute_isdn'] = 'Opzionale: modifica la gestione dei valori dell\'attributo member, 0 o 1';
$string['auth_ldap_memberattribute_isdn_key'] = 'L\'attributo member usa "dn"';
$string['auth_ldap_memberattribute_key'] = 'Attributo member';
$string['auth_ldap_noconnect'] = 'Il modulo LDAP non può collegarsi al server: {$a}';
$string['auth_ldap_noconnect_all'] = 'Il modulo LDAP non si può collegarsi a nessun server: {$a}';
$string['auth_ldap_noextension'] = '<em>Il modulo PHP LDAP non sembra essere presente. Per usare l\'autenticazione LDAP assicurarti che sia installato ed abilitato.</em>';
$string['auth_ldap_no_mbstring'] = 'Per creare utenti in Active Directory  è necessaria l\'estensione mbstring';
$string['auth_ldapnotinstalled'] = 'Non è possibile usare l\'autenticazione LDAP. Il modulo PHP LDAP non è installato.';
$string['auth_ldap_objectclass'] = 'Opzionale: il filtro utilizzato per la ricerca dei nomi utente. Ad esempio objectClass=posixAccount. L\'impostazione a objectClass=* restituirà  tutti gli oggetti da LDAP.';
$string['auth_ldap_objectclass_key'] = 'Object class';
$string['auth_ldap_opt_deref'] = 'Determina il modo con cui vengono trattati gli alias durante una ricerca. Selezionare uno dei seguenti valori:<br/>
"No" (LDAP_DEREF_NEVER) <br/>
"Si" (LDAP_DEREF_ALWAYS)';
$string['auth_ldap_opt_deref_key'] = 'Dereference aliases';
$string['auth_ldap_passtype'] = 'Specificare il formato delle password nuove o modificate nel server LDAP.';
$string['auth_ldap_passtype_key'] = 'Formato password';
$string['auth_ldap_passwdexpire_settings'] = 'Impostazione scadenza password LDAP';
$string['auth_ldap_preventpassindb'] = 'Selezionare Si per evitare il salvataggio delle password nel database di Moodle.';
$string['auth_ldap_preventpassindb_key'] = 'Nascondi password';
$string['auth_ldap_search_sub'] = 'Cerca gli utenti anche nei sotto-contesti.';
$string['auth_ldap_search_sub_key'] = 'Cerca nei sotto-contesti';
$string['auth_ldap_server_settings'] = 'Impostazioni server LDAP';
$string['auth_ldap_unsupportedusertype'] = 'auth: ldap user_create() non supporta il tipo utente selezionato: {$a}"';
$string['auth_ldap_update_userinfo'] = 'Aggiorna le informazioni utente (nome, cognome, indirizzo...) da LDAP a Moodle. Specifica le impostazioni di "Data mapping" come le volete. Guarda /auth/ldap/attr_mappings.php per le informazioni su mapping';
$string['auth_ldap_user_attribute'] = 'Opzionale: sovrascrive l\'attributo usato per cercare gli utenti. Di norma \'cn\'.';
$string['auth_ldap_user_attribute_key'] = 'Attributo utente';
$string['auth_ldap_user_exists'] = 'Lo username LDAP è già esistente.';
$string['auth_ldap_user_settings'] = 'Impostazioni ricerca utente';
$string['auth_ldap_user_type'] = 'La modalità con cui sono memorizzati gli utenti in LDAP. Questa impostazione determina anche il funzionamento della scadenza della password, del grace login e della creazione dell\'utente.';
$string['auth_ldap_user_type_key'] = 'Tipo utente';
$string['auth_ldap_usertypeundefined'] = 'config.user_type non definito o la funzione ldap_expirationtime2unix non supporta il tipo selezionato!';
$string['auth_ldap_usertypeundefined2'] = 'config.user_type non definito o la funzione ldap_unix2expirationtime non supporta il tipo selezionato!';
$string['auth_ldap_version'] = 'La versione del protocollo utilizzata dal server LDAP.';
$string['auth_ldap_version_key'] = 'Versione';
$string['auth_ntlmsso'] = 'NTLM SSO';
$string['auth_ntlmsso_enabled'] = 'Impostare a SI per provare il Single Sign On con il dominio NTLM. <strong>Nota:</strong> per funzionare, questo richiede impostazioni aggiuntive sul webserver, vedere <a href="http://docs.moodle.org/en/NTLM_authentication">http://docs.moodle.org/en/NTLM_authentication</a>';
$string['auth_ntlmsso_enabled_key'] = 'Abilita';
$string['auth_ntlmsso_ie_fastpath'] = 'Imposta a Si per abilitare NTLM SSO fast path. (Evita alcuni passaggi se il browser client è Internet Explorer)';
$string['auth_ntlmsso_ie_fastpath_attempt'] = 'Prova NTLM con qualsiasi browser';
$string['auth_ntlmsso_ie_fastpath_key'] = 'MS IE fast path?';
$string['auth_ntlmsso_ie_fastpath_yesattempt'] = 'Si, prova NTLM anche con gli altri browser';
$string['auth_ntlmsso_ie_fastpath_yesform'] = 'Si, gli altri browser useranno il login standard';
$string['auth_ntlmsso_maybeinvalidformat'] = 'Non è stato possibile estrarre lo username dall\'header REMOTE_USER. Verifica la correttezza del formato.';
$string['auth_ntlmsso_missing_username'] = 'Nel formato dello username remote devi specificare almeno %username%';
$string['auth_ntlmsso_remoteuserformat'] = 'Scegliendo come "Tipo di autenticazione\' \'NTLM\', è possibile specificare il formato dello username remoto. Lasciando il formato vuoto, verrà usato il formato DOMAINusername. E\' possibile usare il segnaposto opzionale <b>%domain%</b> per specificare dove appare il  dominio, e il segnaposto obbligatorio<b>%username%</b> per specificare dove compare lo username.<br /><br />Alcuni formati di uso frequente:
<tt>%domain%%username%</tt> (MS Windows default), <tt>%domain%/%username%</tt>, <tt>%domain%+%username%</tt> e <tt>%username%</tt> (in assenza di parte relativa al dominio).';
$string['auth_ntlmsso_remoteuserformat_key'] = 'Formato username remoto';
$string['auth_ntlmsso_subnet'] = 'L\'impostazione consente l\'SSO solo dai client appartenenti ad una subnet. Formato: xxx.xxx.xxx.xxx/bitmask. E\' possibile impostare più subnet separandole con \',\' (virgola).';
$string['auth_ntlmsso_subnet_key'] = 'Subnet';
$string['auth_ntlmsso_type'] = 'Il metodo di autenticazione configurato nel web server per autenticare gli utenti (se sei in dubbio scegli NTLM)';
$string['auth_ntlmsso_type_key'] = 'Tipo di autenticazione';
$string['connectingldap'] = 'Connessione al server LDAP...';
$string['creatingtemptable'] = 'Creazione tabella temporanea {$a}';
$string['didntfindexpiretime'] = 'password_expire() non ha trovato la data di scadenza.';
$string['didntgetusersfromldap'] = 'LDAP non ha restituito nessun acccount -- un errore ? --';
$string['gotcountrecordsfromldap'] = 'LDAP ha restituito {$a} record';
$string['morethanoneuser'] = 'Strano! LDAP ha restituito più account dello stesso utente. Verrà usato il primo.';
$string['needbcmath'] = 'Per usare il grace login con Active Directory occorre l\'estensione BCMath';
$string['needmbstring'] = 'Per cambiare password in Active Directory occorre l\'estensione mbstring.';
$string['nodnforusername'] = 'Si è verificato un errore in user_update_password(). Nessun DN per: {$a->username}';
$string['noemail'] = 'Fallito il tentativo di inviarti una email !';
$string['notcalledfromserver'] = 'Non dovrebbe essere chiamato dal server web!';
$string['noupdatestobedone'] = 'Nessun aggiornamento da effettuare';
$string['nouserentriestoremove'] = 'Nessun account utente da rimuovere';
$string['nouserentriestorevive'] = 'Nessun account utente da riattiavre';
$string['nouserstobeadded'] = 'Nessun dato utente da aggiungere';
$string['ntlmsso_attempting'] = 'Esecuzione di Single Sign On via NTLM ...';
$string['ntlmsso_failed'] = 'Auto-login fallito. Provare la normale pagina di login ...';
$string['ntlmsso_isdisabled'] = 'Il SSO via NTLM non è abilitato';
$string['ntlmsso_unknowntype'] = 'Tipo di ntlmsso sconosciuto!';
$string['pagedresultsnotsupp'] = 'I paged result LDAP non sono supportati (manca il supporto PHP oppure hai configurato Moodle per usare il protocollo LDAP versione 2)';
$string['pagesize'] = 'Accertati che il valore impostato sia minore della dimensione del result set (il numero massimo di record forniti con una singola query) del tuo serevr LDAP';
$string['pagesize_key'] = 'Page size';
$string['pluginname'] = 'Server LDAP';
$string['pluginnotenabled'] = 'Plugin non abilitato!';
$string['renamingnotallowed'] = 'In LDAP non è consentito di rinominare gli utenti';
$string['rootdseerror'] = 'Si è verificato un errore durante la query del rootDSE in Active Directory';
$string['start_tls'] = 'Utilizza la porta LDAP standard 389 con crittografia TLS';
$string['start_tls_key'] = 'Usa TLS';
$string['updatepasserror'] = 'Errore in user_update_password(). Error code: {$a->errno}; Error string: {$a->errstring}';
$string['updatepasserrorexpire'] = 'Errore in user_update_password() durante la lettura della data di scadenza della password. Error code: {$a->errno}; Error string: {$a->errstring}';
$string['updatepasserrorexpiregrace'] = 'Errore in user_update_password() durante la modifica di expirationtime e/o gracelogin. Error code: {$a->errno}; Error string: {$a->errstring}';
$string['updateremfail'] = 'Errore durante l\'aggiornamento del record LDAP. Error code: {$a->errno}; Error string: {$a->errstring}<br/>Key ({$a->key}) - valore moodle precedente: \'{$a->ouvalue}\' nuovo valore: \'{$a->nuvalue}\'';
$string['updateremfailamb'] = 'Errore durante l\'aggiornamento LDAP con il campo ambiguo {$a->key}; valore moodle precedente: \'{$a->ouvalue}\' nuovo valore: \'{$a->nuvalue}\'';
$string['updateusernotfound'] = 'L\'utente non è stato trovato durante l\'aggiornamento dei dati esterni. Dettagli: search base: \'{$a->userdn}\'; search filter: \'(objectClass=*)\'; search attributes: {$a->attribs}';
$string['useracctctrlerror'] = 'Errore durante la ricezione di userAccountControl per{$a}';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() non supporta il tipo di utente scelto: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() non supporta il tipo di utente scelto: {$a}';
$string['userentriestoadd'] = 'Account da aggiungere: {$a}';
$string['userentriestoremove'] = 'Account da rimuovere: {$a}';
$string['userentriestorevive'] = 'Account da riattivare: {$a}';
$string['userentriestoupdate'] = 'Account da aggiornare: {$a}';
$string['usernotfound'] = 'Account non trovato in LDAP';
