<?PHP // $Id: report_security.php,v 1.12 2010/02/19 18:42:17 andreabix Exp $ 
      // report_security.php - created with Moodle 2.0 dev (Build: 20100212) (2010020701)


$string['check_configrw_details'] = '<p>Si raccomanda di modificare i permessi del file config.php subito dopo l\'installazione per evitare che il file possa essere modificato da processi del web server.
Questa impostazione non innalza significativamente la sicurezza del vostro sito, tuttavia riduce e limita i pericoli provenienti dai più comuni exploit.</p>';
$string['check_configrw_name'] = 'File config.php modificabile';
$string['check_configrw_ok'] = 'Il file config.php non è modificabile da script PHP.';
$string['check_configrw_warning'] = 'Il file config.php può essere modificato da script PHP.';
$string['check_cookiesecure_details'] = '<p>Se abilitate la comunicazione https, si raccomanda anche di abilitare i cookie sicuri. Si raccomanda di configurare anche l\'indirizzamento permanente da http ad https.</p>';
$string['check_cookiesecure_error'] = 'Per favore abilitate i cookie sicuri';
$string['check_cookiesecure_name'] = 'Cookie sicuri';
$string['check_cookiesecure_ok'] = 'Cookie sicuri abilitati.';
$string['check_courserole_anything'] = 'Il privilegio \"Modificare qualsiasi cosa\" non deve essere consentito in questo <a href=\"$a\">contesto</a>.';
$string['check_courserole_details'] = '<p>In ciascun corso può essere impostato il Ruolo di default per le iscrizioni spontanee. Accertatevi che tale ruolo non possegga privilegi tali da permettergli di compromettere la sicurezza del sito.</p>
<p>Il solo Ruolo origine supportato per il Ruolo di default nei corsi è <em>Studente</em>.</p>';
$string['check_courserole_error'] = 'I Ruolo di default nei corsi non è  definito in modo corretto!';
$string['check_courserole_name'] = 'Ruoli di default dei corsi';
$string['check_courserole_notyet'] = 'E\' stato utilizzato solamente il Ruolo di default per gli utenti nei corsi (globale).';
$string['check_courserole_ok'] = 'Definizione del Ruolo di default per gli utenti nei corsi OK.';
$string['check_courserole_risky'] = 'Sono stati rilevati privilegi rischiosi in questo <a href=\"$a\">contesto</a>.';
$string['check_courserole_riskylegacy'] = 'Sono stati rilevati Ruoli origine rischiosi in <a href=\"$a->url\">$a->shortname</a>.';
$string['check_defaultcourserole_anything'] = 'Il privilegio \"Modificare qualsiasi cosa\" non deve essere dato in questo <a href=\"$a\">contesto</a>.';
$string['check_defaultcourserole_details'] = '<p>Il Ruolo di default per gli utenti nei corsi definisce il ruolo di default in un corso dove gli utenti si possono iscrivere spontaneamente. Accertatevi che tale ruolo non possegga privilegi tali da permettergli di compromettere la sicurezza del sito.</p>
<p>Il solo Ruolo origine supportato per il ruolo di default nei corsi è <em>Studente</em>.</p>';
$string['check_defaultcourserole_error'] = 'Il Ruolo di default per gli utenti nei corsi, \"$a\", non è definito in modo corretto!';
$string['check_defaultcourserole_legacy'] = 'E\' stato individuato un Ruolo origine non supportato.';
$string['check_defaultcourserole_name'] = 'Ruolo di default per gli utenti nei corsi (globale)';
$string['check_defaultcourserole_notset'] = 'Il Ruolo di default default per gli utenti nei corsi (globale) non è impostato.';
$string['check_defaultcourserole_ok'] = 'Definizione del Ruolo di default per gli utenti nei corsi (globale) OK.';
$string['check_defaultcourserole_risky'] = 'Sono stati rilevati privilegi rischiosi in questo <a href=\"$a\">contesto</a>.';
$string['check_defaultuserrole_details'] = '<p>A tutti gli utenti autenticati vengono conferiti i privilegi del Ruolo di default per tutti gli utenti. Accertatevi che tale ruolo non possegga privilegi tali da permettergli di compromettere la sicurezza del sito.</p>
<p>Il solo Ruolo origine supportato per il Ruolo di default per tutti gli utenti è <em>Utente autenticato</em>.</p>';
$string['check_defaultuserrole_error'] = 'Il Ruolo di default per tutti gli utenti, \"$a\", non è definito in modo corretto!';
$string['check_defaultuserrole_name'] = 'Ruolo di default per tutti gli utenti';
$string['check_defaultuserrole_notset'] = 'Il ruolo di default non è impostato.';
$string['check_defaultuserrole_ok'] = 'Definizione del Ruolo di default per tutti gli utenti OK.';
$string['check_displayerrors_details'] = '<p>Si consiglia vivamente di non abilitare l\'impostazione PHP <code>display_errors</code> nei server in produzione in quanto i messaggi di errore potrebbero fornire informazioni delicate sul vostro server.</p>';
$string['check_displayerrors_error'] = 'La visualizzazione degli errori PHP è abilitata. Si raccomanda di disabilitarla.';
$string['check_displayerrors_name'] = 'Visualizzazione errori PHP';
$string['check_displayerrors_ok'] = 'La visualizzazione degli errori PHP è disabilitata.';
$string['check_emailchangeconfirmation_details'] = '<p>Si raccomanda di rendere necessaria la conferma dell\'email quando un utente cambia l\'email nel proprio profilo. Se la conferma viene disabilitata, gli spammer potrebbero desiderare di entrare nel vostro server con lo scopo di utilizzarlo per l\'invio di posta indesiderata.</p>';
$string['check_emailchangeconfirmation_error'] = 'Gli utenti possono inserire qualsiasi indirizzo di email.';
$string['check_emailchangeconfirmation_info'] = 'Gli utenti possono usare indirizzi email provenienti esclusivamente dai domini consentiti.';
$string['check_emailchangeconfirmation_name'] = 'Conferma del cambio email';
$string['check_emailchangeconfirmation_ok'] = 'Conferma del cambio dell\'email nel profilo degli utenti';
$string['check_embed_details'] = '<p>L\'inserimento incondizionato di oggetti nelle pagine è molto pericoloso. Un qualsiasi utente autenticato potrebbe lanciare un attacco XSS contro altri utenti dello stesso server. Questa impostazione deve essere disabilitata nei server in produzione.</p>';
$string['check_embed_error'] = 'L\'inserimento incondizionato di oggetti nelle pagine è abilitato. Questo rappresenta uno dei maggiori rischi per la sicurezza dei server.';
$string['check_embed_name'] = 'Consenti tag EMBED e OBJECT';
$string['check_embed_ok'] = 'L\'inserimento incondizionato di oggetti nelle pagine non è consentito.';
$string['check_frontpagerole_details'] = '<p>Il Ruolo di default per la pagina home viene attribuito a tutti gli utenti autenticati per permettergli di partecipare alle attività presenti nella Pagina home. Accertatevi che tale ruolo non possegga privilegi tali da  permettergli di compromettere la sicurezza del sito.</p>
<p>Si raccomanda di creare un ruolo apposito per questo scopo, evitando di utilizzare Ruoli origine.</p>';
$string['check_frontpagerole_error'] = 'Il Ruolo di default per la pagina home, \"$a\", non è definito in modo corretto!';
$string['check_frontpagerole_name'] = 'Ruolo di default per la pagina home';
$string['check_frontpagerole_notset'] = 'Il Ruolo di default per la pagina home non è impostato.';
$string['check_frontpagerole_ok'] = 'Definizione del Ruolo di default per la pagina home OK.';
$string['check_globals_details'] = '<p>L\'impostazione Register globals è considerata una delle più pericolose. Dovete impostare <code>register_globals=off</code> nella configurazione del PHP. Potete impostare register_globals nel file <code>php.ini</code>, nella configurazione di Apache oppure nel file <code>.htaccess</code>.</p>';
$string['check_globals_error'] = 'L\'impostazione Register globals DEVE essere disabilitata. Per favore modificate l\'impostazione immediatamente!';
$string['check_globals_name'] = 'Register globals';
$string['check_globals_ok'] = 'L\'impostazione Register globals è disabilitata';
$string['check_google_details'] = '<p>L\'impostazione Aperto a Google consente ai motori di ricerca di accedere ai corsi come ospite. E\' perfettamente inutile consentire l\'accesso come ospite ai motori di ricerca se l\'accesso come ospite è disabilitato.</p>';
$string['check_google_error'] = 'L\'accesso come ospite per i motori di ricerca è abilitato e l\'accesso come ospite al sito èdisabilitato.';
$string['check_google_info'] = 'I motori di ricerca possono entrare nel sito come ospiti.';
$string['check_google_name'] = 'Aperto a Google';
$string['check_google_ok'] = 'L\'accesso come ospite per i motori di ricerca è disabilitato.';
$string['check_guestrole_details'] = '<p>Il Ruolo ospite è utilizzato per gli ospiti: agli utenti non autenticati può essere consentito un accesso temporaneo come ospite. Accertatevi che il ruolo ospite non possegga privilegi tali da permettergli di compromettere la sicurezza del sito.</p>
<p>Il solo Ruolo origine supportato per il ruolo di ospite è <em>Ospite</em>.</p>';
$string['check_guestrole_error'] = 'Il Ruolo di default per gli ospiti, \"$a\", non è definito in modo corretto.';
$string['check_guestrole_name'] = 'Ruolo per gli ospiti';
$string['check_guestrole_notset'] = 'Il Ruolo per gli ospiti non è impostato.';
$string['check_guestrole_ok'] = 'Definizione del Ruolo per gli ospiti OK.';
$string['check_mediafilterswf_details'] = '<p>L\'inserimento automatico di file swf è molto pericoloso. Un qualsiasi utente autenticato potrebbe lanciare un attacco XSS contro altri utenti nello stesso server. Questa impostazione deve essere disabilitata nei server in produzione.</p>';
$string['check_mediafilterswf_error'] = 'Il filtro Plugin multimediali per file .swf è abilitato - impostazione molto pericolosa su qualsiasi server.';
$string['check_mediafilterswf_name'] = 'Abilitazione filtro .swf';
$string['check_mediafilterswf_ok'] = 'Il filtro Plugin multimediali per file .swf è disabilitato.';
$string['check_noauth_details'] = '<p>La plugin <em>Senza autenticazione</em> non è stata pensata per l\'uso su siti in produzione. Per favore disabilitatela a meno che questo non sia un sito di sviluppo.</p>';
$string['check_noauth_error'] = 'La plugin Senza autenticazione non deve essere usata su siti in produzione';
$string['check_noauth_name'] = 'Senza autenticazione';
$string['check_noauth_ok'] = 'La plugin Senza autenticazione è disabilitata';
$string['check_openprofiles_details'] = '<p>I profili utente accessibili senza login potrebbero essere utilizzati dagli spammer. Si raccomanda di abilitare <code>Imponi il login per i profil</code> oppure <code>Imponi il login</code>.</p>';
$string['check_openprofiles_error'] = 'Chiunque può accedere ai profili utente senza autenticarsi.';
$string['check_openprofiles_name'] = 'Profili utente accessibili senza login';
$string['check_openprofiles_ok'] = 'Per accedere ai profili utente è necessario autenticarsi.';
$string['check_passwordpolicy_details'] = '<p>Si raccomanda di attivare le regole per le password: le password facili vengono indovinate molto spesso e sono il modo più semplice per entrare nei sistemi senza essere autorizzati. Tuttavia, fate attenzione a non attivare regole password troppo complicate, altrimenti rischiate che i vostri utenti non siano in grado di ricordarle senza scriverle.</p>';
$string['check_passwordpolicy_error'] = 'Le regole per le password non sono attive.';
$string['check_passwordpolicy_name'] = 'Regole password';
$string['check_passwordpolicy_ok'] = 'Le regole per le password sono attive.';
$string['check_passwordsaltmain_details'] = '<p>Si raccomanda fortemente di impostare il password salt per minimizzare il rischio di furto di password.</p>
<p>Per impostare il password salt aggiungere la seguente linea al file config.php:</p>
<code>\$CFG->passwordsaltmain = \'stringa_molto_lunga_di_caratteri_casuali#@6&*1\';</code>
<p>La stringa di caratteri casuali deve contenere lettere, numeri ed altri caratteri. Si consiglia una stringa di almeno 40 caratteri.</p>
<p>Per maggiori informazioni su come cambiare il salt: <a href=\"$a\" target=\"_blank\">password salting</a>. Una volta impostato il salt, non eliminatelo altrimenti  gli utenti non saranno più in grado di autenticarsi.</p>';
$string['check_passwordsaltmain_name'] = 'Password salt';
$string['check_passwordsaltmain_ok'] = 'Password salt OK';
$string['check_passwordsaltmain_warning'] = 'Il password salt non è stato impostato';
$string['check_passwordsaltmain_weak'] = 'Il password salt è debole';
$string['check_riskadmin_detailsok'] = '<p>Per favore verificate il seguente elenco di amministratori:<br/>$a</p>';
$string['check_riskadmin_detailswarning'] = '<p>Per favore verificate il seguente elenco di amministratori:<br/>$a->admins</p>
<p>Si raccomanda di assegnare il ruolo di amministratore solamente nel contesto di sito. I seguenti utenti hanno l\'assegnazione del ruolo amministratore non supportata:<br/>$a->unsupported</p>';
$string['check_riskadmin_name'] = 'Amministratori';
$string['check_riskadmin_ok'] = 'Sono stati individuati $a amministratore(i) del server.';
$string['check_riskadmin_unassign'] = 'Controllare l\'attribuzione di ruolo <a href=\"$a->url\">$a->fullname ($a->email)';
$string['check_riskadmin_warning'] = 'Sono stati individuati $a->admincount amministratori del server e $a->unsupcount assegnazioni non supportate del ruolo amministratore.';
$string['check_riskbackup_details_overriddenroles'] = '<p>Queste modifiche ai ruoli danno agli utenti il privilegio di effettuare backup con dati utente. Accertati che tale privilegio sia realmente necessario.</p>$a';
$string['check_riskbackup_details_systemroles'] = '<p>I ruoli sotto elencati hanno il privilegio di eseguire backup con dati utente. Accertati che il privilegio sia realmente necessario.</p>$a';
$string['check_riskbackup_details_users'] = '<p>Come conseguenza dei privilegi assegnati ai ruoli sopra elencati, i seguenti account dispongono del privilegio di effettuare backup con dati utente. Accertati che (a) siano utenti affidabili e che (b) le loro credenziali siano protette con password forti.</p>$a';
$string['check_riskbackup_detailsok'] = 'Nessun ruolo possiede il privilegio di eseguire backup con dati utente. Ciononostante, gli amministratori con il privilegio \"doanything\" potrebbero riuscire comunque ad effettuare backup con dati utente.';
$string['check_riskbackup_editoverride'] = '<a href=\"$a->url\">$a->name in $a->contextname</a>';
$string['check_riskbackup_editrole'] = '<a href=\"$a->url\">$a->name</a>';
$string['check_riskbackup_name'] = 'Backup di dati utente';
$string['check_riskbackup_ok'] = 'Non ci sono ruoli con il privilegio di eseguire backup di dati utente';
$string['check_riskbackup_unassign'] = '<a href=\"$a->url\">$a->fullname ($a->email) in $a->contextname</a>';
$string['check_riskbackup_warning'] = 'Sono stati individuati $a->rolecount ruoli,$a->overridecount modifiche ai ruoli e $a->usercount utenti con il privilegio di eseguire backup di dati utente';
$string['check_riskxss_details'] = '<p>RISK_XSS indica privilegi che devono essere dati solamente ad utenti affidabili.</p>
<p>Per favore verificate la seguente lista di utenti e accertatevi che tutti gli utenti elencati meritano la vostra fiducia:<br/>$a</p>';
$string['check_riskxss_name'] = 'Utenti affidabili per XSS';
$string['check_riskxss_warning'] = 'RISK_XSS - individuati $a utenti che devono essere affidabili.';
$string['check_unsecuredataroot_details'] = '<p>Il folder dataroot non deve essere accessibile via web. La cosa migliore è creare il foder dataroot al di fuori dello spazio web.</p>
<p>Se spostate il folder dataroot, ricordate di modificare l\'impostazione <code>\$CFG->dataroot</code> nel file config.php.</p>';
$string['check_unsecuredataroot_error'] = 'Il vostro folder dataroot <code>$a</code> è in un posto sbagliato ed è esposta pubblicamente sul web!';
$string['check_unsecuredataroot_name'] = 'Dataroot non sicura';
$string['check_unsecuredataroot_ok'] = 'La Dataroot non deve essere accessibile via web.';
$string['check_unsecuredataroot_warning'] = 'Il vostro folder dataroot <code>$a</code> è in un posto sbagliato e potrebbe anche essere esposta pubblicamente sul web!';
$string['configuration'] = 'Configurazione';
$string['description'] = 'Descrizione';
$string['details'] = 'Dettagli';
$string['issue'] = 'Problema';
$string['reportsecurity'] = 'Sicurezza';
$string['security:view'] = 'Visualizzare il Report sulla sicurezza';
$string['status'] = 'Stato';
$string['statuscritical'] = 'Critico';
$string['statusinfo'] = 'Info';
$string['statusok'] = 'OK';
$string['statusserious'] = 'Serio';
$string['statuswarning'] = 'Attenzione';
$string['timewarning'] = 'L\'elaborazione può richiedere molto tempo, vi preghiamo di attendere...';

?>
