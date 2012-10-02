<?PHP // $Id: auth_shibboleth.php,v 1.1 2009/06/11 16:35:19 andreabix Exp $ 
      // auth_shibboleth.php - created with Moodle 2.0 dev (Build: 20090603) (2009060200)

$string['auth_shib_auth_method'] = 'Nome del metodo di autenticazione';
$string['auth_shib_auth_method_description'] = 'Inserite un nome familiare ai vostri utenti per identificare il metodo di autenticazione Shibboleth. Un nome adatto potrebbe essere il nome della vostra federazione Shibboleth, ad esempio <tt>SWITCHaai Login</tt> oppure <tt>InCommon Login</tt>.';
$string['auth_shib_changepasswordurl'] = 'URL per cambiare password';
$string['auth_shib_convert_data'] = 'API per la modifica dei dati';
$string['auth_shib_convert_data_description'] = 'Puoi usare queste API per modificare ulteriormente i dati forniti da Shibboleth. Per maggiori informazioni, leggi <a href=\"../auth/shibboleth/README.txt\" target=\"_blank\">README</a>';
$string['auth_shib_convert_data_warning'] = 'Il file non esiste o non è leggibile dal processo del webserver!';
$string['auth_shib_idp_list'] = 'Identity Provider';
$string['auth_shib_idp_list_description'] = 'Inserite un elenco di Identity Provider entityID tra cui l\'utente potrà scegliere nella pagina di login.<br />Su ogni riga dovrà essere presente una coppia separata da virgole composta da entityID dell\'IdP (verifica il medatadata file di Shibboleth) e dal Nome dell\'IdP (il nome comparirà nel menù a discesa).<br />E\' possibile aggiungere un terzo parametro opzionale dove specificare la posizione del session initiator di Shibboleth utile nel caso in cui l\'installazione di Moodle faccia parte di una multi fedrazione.';
$string['auth_shib_instructions'] = 'Utilizzare <a href=\"$a\">Shibboleth login</a> per avere accesso tramite Shibboleth, se la vostra istituzione lo supporta<br />Altrimenti, utilizzare il modulo di login normale qui mostrato.';
$string['auth_shib_instructions_help'] = 'Qui dovreste fornire istruzioni su Shibbolet per i vostri utenti. Verranno mostrate nella pagina di login nella sezione delle istruzioni.
Dovrebbe includere un collegamento a \"<b>$a</b>\"  in modo che gli utenti Shibboleth possano effettuare facilmente il login.';
$string['auth_shib_integrated_wayf'] = 'Servizio Moodle WAYF';
$string['auth_shib_integrated_wayf_description'] = 'E\' possibile consentire a Moodle di usare i propri servizi WAYF al posto di qulli configurati per Shibboleth. In questo caso Moodle visualizzerà un menù a discesa dove l\'utente potrà scegliere la pagina di login.';
$string['auth_shib_logout_return_url'] = 'Logout return URL alternativa';
$string['auth_shib_logout_return_url_description'] = 'Inserite l\'URL dove gli utenti Shibboleth saranno indirizzati dopo il logout.<br />Se l\'URL non viene inserita, allora gli utenti saranno indirizzati alla URL dove Moodle indirizza gli utenti.';
$string['auth_shib_logout_url'] = 'Shibboleth Service Provider logout handler URL';
$string['auth_shib_logout_url_description'] = 'Inserite l\'URL del logout handler del Service Provider Shibboleth. In genere l\'URL è <tt>/Shibboleth.sso/Logout</tt>';
$string['auth_shib_no_organizations_warning'] = 'Se vuoi usare il servizio integrato WAYF, devi fornire una lista di elementi separati da virgola comprendenti Identity Provider entityIDs, i loro nomi e eventualmente un iniziatore di sessione.';
$string['auth_shib_only'] = 'Solo Shibboleth';
$string['auth_shib_only_description'] = 'Selezionate questa opzione se desiderate forzare l\'autenticazione Shibboleth.';
$string['auth_shib_username_description'] = 'Nome';
$string['auth_shibboleth_contact_administrator'] = 'In caso non sei associato con alcuna delle organizzazioni fornite e hai bisogno di accedere a un corso su questo server, contatta';
$string['auth_shibboleth_errormsg'] = 'Seleziona l\'organizzazione di cui sei membro!';
$string['auth_shibboleth_login'] = 'Login Shibboleth';
$string['auth_shibboleth_login_long'] = 'Login a Moodle via Shibboleth';
$string['auth_shibboleth_manual_login'] = 'Login manuale';
$string['auth_shibboleth_select_member'] = 'Sono un membro di ...';
$string['auth_shibboleth_select_organization'] = 'Per l\'autenticazione via Shibboleth, seleziona la tua organizzazione dalla lista drop down:';
$string['auth_shibbolethdescription'] = 'Utilizzando questo metodo gli utenti vengono creati e autenticati utilizzando<a href=\"http://shibboleth.internet2.edu/\" target=\"_blank\">Shibboleth</a>';
$string['auth_shibbolethtitle'] = 'Shibboleth';
$string['shib_no_attributes_error'] = 'Sembra che dobbiate essere autenticati da Shibboleth ma Moodle non ha ricevuto gli attributi dell\'utente. Vi preghiamo di controllare che il vostro Identity Provider rilasci gli attributi necessari ($a) al Service Provider dove funziona Moodle o informate il webmaster di questo server.';
$string['shib_not_all_attributes_error'] = 'Moodle richiede alcuni attributi Shibboleth che, nel vostro caso, non sono presenti. Gli attributi sono: $a<br />Vi preghiamo di contattare il webmaster di questo server o il vostro Identity Provider.';
$string['shib_not_set_up_error'] = 'L\'autenticazione Shibboleth non sembra essere impostata correttamente perché nessuna variabile Shibboleth è presente in questa pagina. Si prega di consultare il file <a href=\"README.txt\">README</a> per ulteriori istruzioni sulla configurazione della autenticazione Shibbleth o contattare il webmaster di questa installazione di Moodle.';

?>
