<?PHP // $Id: auth_ldap.php,v 1.2 2010/03/22 19:07:39 andreabix Exp $ 
      // auth_ldap.php - created with Moodle 2.0 dev (Build: 20100322) (2010031900)


$string['auth_ldap_ad_create_req'] = 'Non è stato creato l\'account in Active Directory. Controllare di avere tutti i requisiti per poterlo fare (connessione LDAPS, utente di bind con privilegi adeguati, eccetera)';
$string['auth_ldap_attrcreators'] = 'Lista di gruppi o contesti i cui membri sono autorizzati a creare attributi. Separa gruppi multipli con\';\'. Ad esempio \'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_attrcreators_key'] = 'Creatori di attributi';
$string['auth_ldap_auth_user_create_key'] = 'Creare utenti esternamente';
$string['auth_ldap_bind_dn'] = 'Se desideri usare un utente Bind per cercare gli utenti, specificalo qui. Ad esempio \'cn=ldapuser,ou=public,o=org\'';
$string['auth_ldap_bind_dn_key'] = 'Distinguished Name';
$string['auth_ldap_bind_pw'] = 'Password per utente Bind.';
$string['auth_ldap_bind_pw_key'] = 'Password';
$string['auth_ldap_bind_settings'] = 'Impostazioni Bind';
$string['auth_ldap_changepasswordurl_key'] = 'URL per cambiare password';
$string['auth_ldap_contexts'] = 'Lista dei contesti in cui sono presenti gli utenti. Separare  contesti differenti con il \';\'. Ad esempio: \'ou=users,o=org; ou=others,o=org\'';
$string['auth_ldap_contexts_key'] = 'Contesti';
$string['auth_ldap_create_context'] = 'Se attivi la creazione degli utenti con conferma via e-mail, specifica il contesto dove gli utenti vengono creati. Questo contesto deve essere diverso da quello di altri utenti per prevenire problemi di sicurezza. Non è necessario aggiungere questo contesto alla variabile ldap_context, Moodle cercherà  gli utenti di questo contesto automaticamente.
.<br /><b>Nota!</b> Devi modificare la funzione auth_user_create() nel file auth/ldap/lib.php per far funzionare la creazione degli utenti.';
$string['auth_ldap_create_context_key'] = 'Contesto per i nuovi utenti';
$string['auth_ldap_create_error'] = 'Si è verificato un errore durante la creazione dell\'utente in LDAP.';
$string['auth_ldap_creators'] = 'Lista di gruppi o contesti i cui membri sono autorizzati a creare nuovi corsi. Separa i gruppi multipli con \';\'. Ad esempio \'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_creators_key'] = 'Creatori';
$string['auth_ldap_expiration_desc'] = 'Seleziona No per disabilitare il controllo delle password scadute o la lettura della data di scadenza delle password da LDAP';
$string['auth_ldap_expiration_key'] = 'Scadenza';
$string['auth_ldap_expiration_warning_desc'] = 'Numero di giorni che precedono l\'invio dell\'avviso di password scaduta.';
$string['auth_ldap_expiration_warning_key'] = 'Avviso di scadenza';
$string['auth_ldap_expireattr_desc'] = 'Opzionale: modifica l\'attributo ldap che stabilisce la data di scadenza della password';
$string['auth_ldap_expireattr_key'] = 'Attributo di scadenza';
$string['auth_ldap_graceattr_desc'] = 'Opzionale: esclude l\'attributo gracelogin';
$string['auth_ldap_gracelogin_key'] = 'Attributo Grace login';
$string['auth_ldap_gracelogins_desc'] = 'Abilita il supporto del gracelogin di LDAP. Dopo che  la password è scaduta l\'utente può accedere finché il contatore gracelogin non è a 0. Abilitando questa impostazione, se la password è scaduta viene mostrato il messaggio di grace login.';
$string['auth_ldap_gracelogins_key'] = 'Grace login';
$string['auth_ldap_groupecreators'] = 'Lista di gruppi o contesti i cui membri sono autorizzati a creare gruppi. Separa i gruppi multipli con \';\'. Ad esempio \'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_groupecreators_key'] = 'Creatori di gruppi';
$string['auth_ldap_host_url'] = 'URL del server LDAP, ad esempio \'ldap://ldap.myorg.com/\' oppure \'ldaps://ldap.myorg.com/\'';
$string['auth_ldap_host_url_key'] = 'URL dell\'host';
$string['auth_ldap_ldap_encoding'] = 'La codifica usata dal server LDAP, .molto probabilmente utf-8. MS AD v2 usa la codifica default della piattaforma, come cp1252, cp1250, ecc.';
$string['auth_ldap_ldap_encoding_key'] = 'Codifica LDAP';
$string['auth_ldap_login_settings'] = 'Impostazioni login';
$string['auth_ldap_memberattribute'] = 'Opzionale: modifica l\'attributo user member nel caso gli utenti appartengano ad un gruppo. Normalmente \'member\'';
$string['auth_ldap_memberattribute_isdn'] = 'Opzionale: modifica la gestione dei valori dell\'attributo member, 0 o 1';
$string['auth_ldap_memberattribute_isdn_key'] = 'L\'attributo member usa \"dn\"';
$string['auth_ldap_memberattribute_key'] = 'Attributo member';
$string['auth_ldap_no_mbstring'] = 'Per creare utenti in Active Directory  è necessaria l\'estensione mbstring';
$string['auth_ldap_noconnect'] = 'Il modulo LDAP non può collegarsi al server: $a';
$string['auth_ldap_noconnect_all'] = 'Il modulo LDAP non si può collegarsi a nessun server: $a';
$string['auth_ldap_noextension'] = 'Attenzione: sembra che non sia presente  il modulo PHP LDAP . Assicurarti che sia installato ed abilitato.';
$string['auth_ldap_objectclass'] = 'Opzionale: il filtro utilizzato per la ricerca dei nomi utente. Ad esempio objectClass=posixAccount. L\'impostazione a objectClass=* restituirà  tutti gli oggetti da LDAP.';
$string['auth_ldap_objectclass_key'] = 'Object class';
$string['auth_ldap_opt_deref'] = 'Determina il modo con cui vengono trattati gli alias durante una ricerca. Selezionare uno dei seguenti valori:<br/>
\"No\" (LDAP_DEREF_NEVER) <br/>
\"Si\" (LDAP_DEREF_ALWAYS)';
$string['auth_ldap_opt_deref_key'] = 'Dereference aliases';
$string['auth_ldap_passtype'] = 'Specificare il formato delle password nuove o modificate nel server LDAP.';
$string['auth_ldap_passtype_key'] = 'Formato password';
$string['auth_ldap_passwdexpire_settings'] = 'Impostazione scadenza password LDAP';
$string['auth_ldap_preventpassindb'] = 'Selezionare Si per evitare il salvataggio delle password nel database di Moodle.';
$string['auth_ldap_preventpassindb_key'] = 'Nascondere password';
$string['auth_ldap_search_sub'] = 'Cerca gli utenti anche nei sotto-contesti.';
$string['auth_ldap_search_sub_key'] = 'Cerca nei sotto-contesti';
$string['auth_ldap_server_settings'] = 'Impostazioni server LDAP';
$string['auth_ldap_unsupportedusertype'] = 'auth: ldap user_create() non supporta il tipo utente selezionato: \"$a\" (..per ora)';
$string['auth_ldap_update_userinfo'] = 'Aggiorna le informazioni utente (nome, cognome, indirizzo...) da LDAP a Moodle. Specifica le impostazioni di \"Data mapping\" come le volete. Guarda /auth/ldap/attr_mappings.php per le informazioni su mapping';
$string['auth_ldap_user_attribute'] = 'L\'attributo usato per cercare gli utenti. Di norma \'cn\'.';
$string['auth_ldap_user_attribute_key'] = 'Attributo utente';
$string['auth_ldap_user_exists'] = 'Lo username LDAP è già esistente.';
$string['auth_ldap_user_settings'] = 'Impostazioni ricerca utente';
$string['auth_ldap_user_type'] = 'Seleziona il modo in cui gli utenti vengono archiviati su LDAP. Questa impostazione determina anche il funzionamento della scadenza della password, del grace login e della creazione dell\'utente.';
$string['auth_ldap_user_type_key'] = 'Tipo utente';
$string['auth_ldap_usertypeundefined'] = 'config.user_type non definito o la funzione ldap_expirationtime2unix non sopporta il tipo selezionato!';
$string['auth_ldap_usertypeundefined2'] = 'config.user_type non definito o la funzione ldap_unix2expirationtime non sopporta il tipo selezionato!';
$string['auth_ldap_version'] = 'La versione del protocollo LDAP utilizzata dal tuo server.';
$string['auth_ldap_version_key'] = 'Versione';
$string['auth_ldapdescription'] = 'Questo plugin fornisce l\'autenticazione tramite un server LDAP esterno.
Se il nome utente e la password forniti sono validi, Moodle crea un nuovo utente nel proprio database. Il plugin può leggere gli attributi dell\'utente da LDAP e popolare i campi necessari a Moodle. Ai login successivi verranno verificati solo il nome utente e la password.';
$string['auth_ldapextrafields'] = 'Questi campi sono opzionali. Potete scegliere di riempire alcuni campi dell\'utente in Moodle con i dati provenienti dai <b>campi LDAP</b> qui specificati. <p>Se lasciate questi campi vuoti, non verrà  trasferito niente dal LDAP e verranno usati i dati default di Moodle.</p><p>In entrambi i casi, gli utenti possono modificare tutti questi campi dopo essersi loggati.</p>';
$string['auth_ldapnotinstalled'] = 'L\'autenticazione LDAP non può essere usata. Il modulo PHP LDAP non è installato.';
$string['auth_ldaptitle'] = 'Server LDAP';
$string['auth_ntlmsso'] = 'NTLM SSO';
$string['auth_ntlmsso_enabled'] = 'Impostare a SI per provare il Single Sign On con il dominio NTLM. <strong>Nota:</strong> per funzionare, questo richiede impostazioni aggiuntive sul webserver, vedere <a href=\"http://docs.moodle.org/en/NTLM_authentication\">http://docs.moodle.org/en/NTLM_authentication</a>';
$string['auth_ntlmsso_enabled_key'] = 'Abilita';
$string['auth_ntlmsso_ie_fastpath'] = 'Impostate a Si per abilitare l\'NTLM SSO fast path. (Evita alcuni passaggi ma lavora solamente con Internet Explorer)';
$string['auth_ntlmsso_ie_fastpath_key'] = 'MS IE fast path?';
$string['auth_ntlmsso_subnet'] = 'Se impostato, l\'SSO sarà consentito solamente dai client appartenenti alla subnet. Formato: xxx.xxx.xxx.xxx/bitmask';
$string['auth_ntlmsso_subnet_key'] = 'Sotto-rete';
$string['ntlmsso_attempting'] = 'Esecuzione di Single Sign On via NTLM ...';
$string['ntlmsso_failed'] = 'Auto-login fallito. Provare la normale pagina di login ...';
$string['ntlmsso_isdisabled'] = 'Il SSO via NTLM non è abilitato';

?>
