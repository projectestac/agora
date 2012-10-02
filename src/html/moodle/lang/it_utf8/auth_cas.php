<?PHP // $Id: auth_cas.php,v 1.1 2009/06/11 16:35:18 andreabix Exp $ 
      // auth_cas.php - created with Moodle 2.0 dev (Build: 20090603) (2009060200)


$string['CASform'] = 'Scelta autenticazione';
$string['accesCAS'] = 'Utenti CAS';
$string['accesNOCAS'] = 'altri utenti';
$string['actauthhdr'] = 'Plugin di autenticazione installate';
$string['alternatelogin'] = 'Se specificate una URL come Pagina di login sostitutiva, Moodle la utilizzerà al posto della pagina di login standard. La pagina di login sostitutiva deve contenere un form con la \"action property\" impostata a <strong>\'$a\'</strong> e deve contenere i campi <strong>username</strong> e <strong>password</strong>.<br/> Fate attenzione a non inserire un URL errato  perché potreste \"chiudervi fuori\" dal sito. <br/>
Non compilate questo campo se preferite utilizzare la pagina di login standard.';
$string['alternateloginurl'] = 'URL pagina sostitutiva per il login';
$string['auth_cas_auth_user_create'] = 'Creare utenti esternamente';
$string['auth_cas_baseuri'] = 'URI del server (lasciare vuoto se non è definito baseURI)<br/>Per esempio, se il server CAS risponde a host.dominio.it/CAS/ <br/>allora, utilizzare: cas_baseuri=CAS/';
$string['auth_cas_baseuri_key'] = 'Base URI';
$string['auth_cas_broken_password'] = 'Non puoi proseguire senza modificare la tua password, ma non c\'è una pagina per cambiarla. Contatta il tuo amministratore Moodle.';
$string['auth_cas_cantconnect'] = 'La parte LDAP del modulo CAS non può connettersi al server: $a';
$string['auth_cas_casversion'] = 'Versione';
$string['auth_cas_changepasswordurl'] = 'URL per cambiare la password';
$string['auth_cas_create_user'] = 'Attivate questa opzione se desiderate inserire utenti autenticati CAS nel database di Moodle. Se non lo fate, solo gli utenti esistenti nel database di Moodle potranno effettuare il login.';
$string['auth_cas_create_user_key'] = 'Creare utente';
$string['auth_cas_enabled'] = 'Da attivare se si intende utilizzare l\'autenticazione CAS (Central Authentication Service).';
$string['auth_cas_hostname'] = 'Nome host del server CAS<br/>Per esempio: host.dominio.it';
$string['auth_cas_hostname_key'] = 'Nome host';
$string['auth_cas_invalidcaslogin'] = 'Spiacente, il login è fallito - Potreste non essere autorizzati ad accedere';
$string['auth_cas_language'] = 'Lingua selezionata';
$string['auth_cas_language_key'] = 'Lingua';
$string['auth_cas_logincas'] = 'Accesso con connessione sicura';
$string['auth_cas_logoutcas'] = 'Impostare a SI se si vuole fare logout da CAS quando ci si disconnette da Moodle';
$string['auth_cas_logoutcas_key'] = 'Logout da CAS';
$string['auth_cas_multiauth'] = 'Impostare a SI se si vuole una multi-autenticazione (CAS + un\'altra autenticazione)';
$string['auth_cas_multiauth_key'] = 'Multi-autenticazione';
$string['auth_cas_port'] = 'Porta del server CAS';
$string['auth_cas_port_key'] = 'Porta';
$string['auth_cas_proxycas'] = 'Impostare a SI se si usa CAS in modalità proxy';
$string['auth_cas_proxycas_key'] = 'Modalità proxy';
$string['auth_cas_server_settings'] = 'Configurazione del server CAS (Central Authentication Service)';
$string['auth_cas_text'] = 'Connessione sicura';
$string['auth_cas_use_cas'] = 'Usare CAS';
$string['auth_cas_version'] = 'Versione CAS';
$string['auth_casdescription'] = 'Questo metodo utilizza un server CAS (Central Authentication Service) per autenticare utenti in ambiente SSO (Single Sign On environment).
Potete anche utilizzare una semplice autenticazione LDAP. Se username e password fornite sono ritenute valide per CAS, Moodle creerà una nuova istanza nel suo database, prelevando gli attributi dell\'utente da LDAP, se necessario.
Nei login successivi, verranno controllati solamente username e password.';
$string['auth_casnotinstalled'] = 'L\'autenticazione CAS non può essere usata. Il modulo PHP LDAP non è installato.';
$string['auth_castitle'] = 'Server CAS (SSO)';

?>
