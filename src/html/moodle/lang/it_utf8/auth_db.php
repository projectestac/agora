<?PHP // $Id: auth_db.php,v 1.1 2009/06/11 16:35:18 andreabix Exp $ 
      // auth.php - created with Moodle 2.0 dev (Build: 20090603) (2009060200)

$string['auth_dbcantconnect'] = 'Connessione non possibile al database specificato per l\'autenticazione ...';
$string['auth_dbchangepasswordurl_key'] = 'URL per cambiare password';
$string['auth_dbdebugauthdb'] = 'Debug ADOdb';
$string['auth_dbdebugauthdbhelp'] = 'Attiva il debug della connessione ADOdb al database esterno - da attivare quando si devono risolvere problemi di connessione durante i login. Da non attivare nei siti in produzione.';
$string['auth_dbdeleteuser'] = 'Cancellato utente $a[0] id $a[1]';
$string['auth_dbdeleteusererror'] = 'Errore nella cancellazione dell\'utente $a';
$string['auth_dbdescription'] = 'Questo metodo usa una tabella di un database esterno per controllare se lo username e la password inseriti siano validi.  Se l\'utente è nuovo, allora anche le informazioni degli altri campi saranno copiate in Moodle.';
$string['auth_dbextencoding'] = 'Codifica database esterno';
$string['auth_dbextencodinghelp'] = 'Codifica utilizzata nel database esterno';
$string['auth_dbextrafields'] = 'La compilazione di questi campi è facoltativa. Potete decidere di mappare i campi del profilo utente di Moodle con <b>i corrispondenti campi provenienti dal database esterno</b>.<p>Se non mappate  questi campi, saranno usati i valori di default.</p><p>Se i campi mappati non sono bloccati, gli utenti potranno modificarli accedeno al proprio profilo.</p>';
$string['auth_dbfieldpass'] = 'Nome del campo che contiene le password';
$string['auth_dbfieldpass_key'] = 'Campo password';
$string['auth_dbfielduser'] = 'Nome del campo che contiene gli username';
$string['auth_dbfielduser_key'] = 'Campo username';
$string['auth_dbhost'] = 'Il server che ospita il database';
$string['auth_dbhost_key'] = 'Host';
$string['auth_dbinsertuser'] = 'Inserito utente $a[0] id $a[1]';
$string['auth_dbinsertusererror'] = 'Errore nell\'inserimento dell\'utente $a';
$string['auth_dbname'] = 'Nome del database';
$string['auth_dbname_key'] = 'Nome DB';
$string['auth_dbpass'] = 'Password corrispondente al suddetto username';
$string['auth_dbpass_key'] = 'Password';
$string['auth_dbpasstype'] = '<p>Specifica il formato con cui sono memorizzate le password degli utenti nel Database esterno. Le password criptate  MD5 sono frequenti nei database degli utenti di molte applicazioni web, come ad esempio PostNuke.</p><p>Se desiderate che sia Moodle a gestire le password degli utenti, impostate il formato della password a \'interna\'. In questo caso tuttavia <i>diventa necessario</i> che l\'indirizzo di email degli utenti sia presente nel Database esterno. Inoltre è necessario eseguire con regolarità admin/cron.php e  auth/db/auth_db_sync_users.php per consentire a Moodle di inviare una password provvisoria a ciascun nuovo utente.</p>';
$string['auth_dbpasstype_key'] = 'Formato password';
$string['auth_dbreviveduser'] = 'Ripristinato utente $a[0] id $a[1]';
$string['auth_dbrevivedusererror'] = 'Errore nel ripristino dell\'utente $a';
$string['auth_dbsetupsql'] = 'Comando SQL per setup';
$string['auth_dbsetupsqlhelp'] = 'Comando SQL per setup speciali del database, utile ad esempio per definire la\'encoding della trasmissione dati - Esempio per MySQL e PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['auth_dbsuspenduser'] = 'Utente sospeso $a[0] id $a[1]';
$string['auth_dbsuspendusererror'] = 'Errore nella sospensione dell\'utente $a';
$string['auth_dbsybasequoting'] = 'Usare apostrofi sybase';
$string['auth_dbsybasequotinghelp'] = 'Utilizza l\'apostrofo singolo in stile Sybase come carattere di escape. E\' un requisito per Oracle, MS SQL e alcuni altri database. Da non usare per MySQL!';
$string['auth_dbtable'] = 'Nome della tabella nel database';
$string['auth_dbtable_key'] = 'Tabella';
$string['auth_dbtitle'] = 'Database esterno';
$string['auth_dbtype'] = 'Il tipo di database (leggi la <a href=\"../lib/adodb/readme.htm#drivers\">documentazione ADOdb</a> per i dettagli)';
$string['auth_dbtype_key'] = 'Database';
$string['auth_dbupdatinguser'] = 'Modifica utente $a[0] id $a[1]';
$string['auth_dbuser'] = 'Username con diritti di lettura nel database';
$string['auth_dbuser_key'] = 'Utente DB';
$string['auth_dbusernotexist'] = 'Non può essere modificato l\'utente non esistente: $a';
$string['auth_dbuserstoadd'] = 'Records di utente da aggiungere: $a';
$string['auth_dbuserstoremove'] = 'Records di utente da cancellare: $a';

?>
