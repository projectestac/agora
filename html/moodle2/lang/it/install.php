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
 * Strings for component 'install', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   install
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['admindirerror'] = 'La cartella Admin specificata non è corretta';
$string['admindirname'] = 'Cartella Admin';
$string['admindirsetting'] = 'Alcuni web host utilizzano la cartella /admin come URL di accesso a pannelli di controllo o altre funzioni particolari. Tuttavia questo nome coincide con il nome della cartella che Moodle utilizza per i propri file di amministrazione. Per evitare conflitti, è possibile specificare un nome alternativo per la cartella admin di Moodle. Ad esempio:<p><b>moodleadmin</b></p>
Tutti i link che puntano ai file di amministrazione di Moodle terranno conto di questa variazione.';
$string['admindirsettinghead'] = 'Impostazione della cartella Admin...';
$string['admindirsettingsub'] = 'Alcuni web host utilizzano la cartella /admin come URL di accesso a pannelli di controllo o altre funzioni particolari. Tuttavia questo nome coincide con il nome della cartella che Moodle utilizza per i propri file di amministrazione. Per evitare conflitti, è possibile specificare un nome alternativo per la cartella admin di Moodle. Ad esempio:<p><b>moodleadmin</b></p>
Tutti i link che puntano ai file di amministrazione di Moodle terranno conto di questa variazione.';
$string['availablelangs'] = 'Elenco delle lingue disponibili:';
$string['caution'] = 'Attenzione';
$string['chooselanguage'] = 'Scegli la lingua';
$string['chooselanguagehead'] = 'Scegli la lingua';
$string['chooselanguagesub'] = 'Scegli la lingua da usare durante l\'installazione. La lingua usata nel sito e dagli utenti potrà essere modificata in seguito.';
$string['cliadminpassword'] = 'Password per l\'amministratore';
$string['cliadminusername'] = 'Username account amministratore';
$string['clialreadyconfigured'] = 'Il file config.php esiste già, per favore utilizza admin/cli/install_database.php se desideri installare questo sito.';
$string['clialreadyinstalled'] = 'Il file config.php è già presente, se desideri aggiornare il sito per favore utilizza admin/cli/upgrade.php.';
$string['cliinstallfinished'] = 'L\'installazione è stata completata correttamente';
$string['cliinstallheader'] = 'Programma di installazione Moodle {$a} via linea di comando';
$string['climustagreelicense'] = 'In modalità linea di comando devi accettare la licenza specificando il parametro --agree-license';
$string['clitablesexist'] = 'Le tabelle del database sono già presenti, l\'installazione via linea di comando non può proseguire.';
$string['compatibilitysettings'] = 'Verifica impostazioni PHP...';
$string['compatibilitysettingshead'] = 'Verifica impostazioni PHP...';
$string['compatibilitysettingssub'] = 'Il vostro server deve superare tutti i seguenti test per consentire il corretto funzionamento di Moodle';
$string['configfilenotwritten'] = 'Lo script di installazione non è in grado di creare il file config.php con le  vostre impostazioni, probabilmente perché la cartella di Moodle non ha permessi di scrittura. È possibile copiare manualmente il codice seguente in un file chiamato config.php nella cartella principale di Moodle.';
$string['configfilewritten'] = 'config.php creato correttamente';
$string['configurationcomplete'] = 'Configurazione completata';
$string['configurationcompletehead'] = 'Configurazione completata';
$string['configurationcompletesub'] = 'Moodle ha tentato di salvare la configurazione in un file nella cartella  principale della vostra installazione.';
$string['database'] = 'Database';
$string['databasecreationsettings'] = 'Specificate le impostazioni del Database dove Moodle memorizzerà larga parte dei dati. Il Database sarà configurato automaticamente in accordo alle specifiche fornite.<br /><br /><br />
<b>Tipo:</b> impostato a "mysql" dallo script di installazione<br />
<b>Host:</b> impostato a "localhost" dallo script di installazione<br />
<b>Nome:</b> nome del Database, ad esempio "moodle"<br />
<b>Utente:</b> impostato a "root" dallo script di installazione<br />
<b>Password:</b> la password per l\'accesso al Database<br />
<b>Prefisso tabelle:</b> prefisso opzionale da usare per i nomi delle tabelle';
$string['databasecreationsettingshead'] = 'Specificate le impostazioni del Database dove Moodle memorizzerà larga parte dei dati. Il Database sarà configurato automaticamente in accordo alle specifiche fornite.';
$string['databasecreationsettingssub'] = '<b>Tipo:</b> impostato a "mysql" dallo script di installazione<br />
<b>Host:</b> impostato a "localhost" dallo script di installazione<br />
<b>Nome:</b> nome del Database, ad esempio "moodle"<br />
<b>Utente:</b> impostato a "root" dallo script di installazione<br />
<b>Password:</b> la password per l\'accesso al Database<br />
<b>Prefisso tabelle:</b> prefisso opzionale da usare per i nomi delle tabelle';
$string['databasecreationsettingssub2'] = '<b>Tipo:</b> impostato a "mysqli" dallo script di installazione<br />
<b>Host:</b> impostato a "localhost" dallo script di installazione<br />
<b>Nome:</b> nome del Database, ad esempio "moodle"<br />
<b>Utente:</b> impostato a "root" dallo script di installazione<br />
<b>Password:</b> la password per l\'accesso al Database<br />
<b>Prefisso tabelle:</b> prefisso opzionale da usare per i nomi delle tabelle';
$string['databasehead'] = 'Impostazioni database';
$string['databasehost'] = 'Database host:';
$string['databasename'] = 'Nome del Database';
$string['databasepass'] = 'Password Database';
$string['databasesettings'] = 'Specificate le impostazioni del Database dove Moodle memorizzerà larga parte dei dati. Il Database deve già esistere e dovete disporre di username e password per accedervi.<br />
<b>Tipo:</b> mysql o postgres7<br/>
<b>Host:</b> es. localhost o db.isp.com<br />
<b>Nome:</b> il nome del Database, ad esempio "moodle"<br/>
<b>Utente:</b> utente del Database<br/>
<b>Password:</b> password dell\'utente<br/>
<b>Prefisso tabelle:</b> prefisso opzionale da usare per i nomi delle tabelle';
$string['databasesettingshead'] = 'Specificate le impostazioni del Database dove Moodle memorizzerà larga parte dei dati. Il Database deve già esistere e dovete disporre di username e password per accedervi.';
$string['databasesettingssub'] = '<b>Tipo:</b> mysql o postgres7<br/>
<b>Host:</b> es. localhost o db.isp.com<br />
<b>Nome:</b> il nome del Database, ad esempio "moodle"<br/>
<b>Utente:</b> utente del Database<br/>
<b>Password:</b> password dell\'utente<br/>
<b>Prefisso tabelle:</b> prefisso opzionale da usare per i nomi delle tabelle';
$string['databasesettingssub_mssql'] = '<b>Tipo:</b> SQL*Server (non UTF-8) <strong class="errormsg">Ancora in sperimentazione! (da non usare su siti in produzione)</strong></b><br/>
<b>Host:</b> es. localhost o db.isp.com<br />
<b>Nome:</b> il nome del Database, ad esempio "moodle"<br/>
<b>Utente:</b> utente del Database<br/>
<b>Password:</b>password dell\'utente<br/>
<b>Prefisso tabelle:</b>prefisso obbligatorio da usare per i nomi delle tabelle';
$string['databasesettingssub_mssql_n'] = '<b>Tipo:</b> SQL*Server (UTF-8 enabled) <br/>
<b>Host:</b> es. localhost o db.isp.com<br />
<b>Nome:</b> il nome del Database, ad esempio "moodle"<br/>
<b>Utente:</b> utente del Database<br/>
<b>Password:</b> password dell\'utente<br/>
<b>Prefisso tabelle:</b> prefisso obbligatorio  da usare per i nomi delle tabelle';
$string['databasesettingssub_mysql'] = '<b>Tipo:</b> MySQL<br/>
<b>Host:</b> es. localhost o db.isp.com<br />
<b>Nome:</b> il nome del Database, ad esempio "moodle"<br/>
<b>Utente:</b> utente del Database<br/>
<b>Password:</b> password dell\'utente<br/>
<b>Prefisso tabelle:</b> prefisso opzionale da usare per i nomi delle tabelle';
$string['databasesettingssub_mysqli'] = '<b>Tipo:</b> MySQL Improved<br/>
<b>Host:</b> es. localhost o db.isp.com<br />
<b>Nome:</b> il nome del Database, ad esempio "moodle"<br/>
<b>Utente:</b> utente del Database<br/>
<b>Password:</b> password dell\'utente<br/>
<b>Prefisso tabelle:</b> prefisso opzionale da usare per i nomi delle tabelle';
$string['databasesettingssub_oci8po'] = '<b>Tipo:</b> Oracle<br/>
<b>Host:</b> da non usare, lasciare vuoto<br />
<b>Nome:</b>i l nome della connessione  tnsnames.ora<br/>
<b>Utente:</b> utente del Database<br/>
<b>Password:</b> password dell\'utente<br/>
<b>Prefisso tabelle:</b> prefisso da usare per i nomi delle tabelle (obbligatorio, max. 2 caratteri)';
$string['databasesettingssub_odbc_mssql'] = '<b>Tipo:</b> SQL*Server (via ODBC) <strong class="errormsg">Ancora in sperimentazione! (da non usare su siti in produzione)</strong></b><br/>
<b>Host:</b> es. localhost o db.isp.com<br />
<b>Nome:</b> il nome del Database, ad esempio "moodle"<br/>
<b>Utente:</b> utente del Database<br/>
<b>Password:</b> password dell\'utente<br/>
<b>Prefisso tabelle:</b> prefisso obbligatorio da usare per i nomi delle tabelle';
$string['databasesettingssub_postgres7'] = '<b>Tipo:</b> PostgreSQL<br/>
<b>Host:</b> es. localhost o db.isp.com<br />
<b>Nome:</b> il nome del Database, ad esempio "moodle"<br/>
<b>Utente:</b> utente del Database<br/>
<b>Password:</b> password dell\'utente<br/>
<b>Prefisso tabelle:</b> prefisso obbligatorio da usare per i nomi delle tabelle';
$string['databasesettingswillbecreated'] = '<b>Attenzione:</b> se il Database specificato non esiste, lo script di installazione tenterà di crearlo.';
$string['databasesocket'] = 'Unix socket';
$string['databasetypehead'] = 'Scegli un database driver';
$string['databasetypesub'] = 'Moodle supporta molti tipi di database. Se non sapete quale usare, contattate l\'  amministratore del vostro server.';
$string['databaseuser'] = 'Utente del Database';
$string['dataroot'] = 'Cartella dei dati';
$string['datarooterror'] = 'La \'cartella dei dati\' specificata non è stata trovata né è stato possibile crearla. Modifica il percorso oppure creala manualmente.';
$string['datarootpermission'] = 'Permessi cartella dei dati';
$string['datarootpublicerror'] = 'La \'cartella dei dati\' specificata è accessibile direttamente via web. Devi specificare una cartella alternativa.';
$string['dbconnectionerror'] = 'Non è possibile connettersi al Database. Verificate le impostazioni che avete fornito.';
$string['dbcreationerror'] = 'Errore nella creazione del Database. Non è possibile creare un Database usando le impostazioni fornite.';
$string['dbhost'] = 'Host server';
$string['dbpass'] = 'Password';
$string['dbport'] = 'Porta';
$string['dbprefix'] = 'Prefisso tabelle';
$string['dbtype'] = 'Tipo';
$string['dbwrongencoding'] = 'Il Database selezionato utilizza un codifica sconsigliata ({$a}). E\' preferibile utilizzare un Database che utilizzi una codifica Unicode (UTF-8). Potete saltare questo test slezionando "Salta il test dell\'encoding del Database", tuttavia potreste riscontrare problemi in seguito.';
$string['dbwronghostserver'] = 'E\' necessario attenersi alle indicazioni relative all\'"Host" come sopra indicato.';
$string['dbwrongnlslang'] = 'La variabile di ambiente NLS_LANG nel tuo web server deve utilizzare il set di caratteri AL32UTF8. Nella documentazione del PHP trovate le informazioni per configurare OCI8 correttamente.';
$string['dbwrongprefix'] = 'E\' necessario attenersi alle indicazioni relative al "Prefisso tabelle" come sopra indicato.';
$string['directorysettings'] = '<p>Verifica e conferma la correttezza degli indirizzi web e dei percorsi assoluti di installazione.</p>

<p><b>Indirizzo web:</b> Specifica l\'indirizzo web per raggiungere la tua installazione Moodle. Se l\'installazione è raggiungibile da più di una URL, allora specifica la URL che sarà utilizzata dagli studenti senza aggiungete uno slash al termine della URL.</p>
<p><b>Cartella di Moodle:</b> Specifica il percorso assoluto della cartella dove stai installando Moodle. Accertati che il nome della cartella tenga conto di eventuali lettere maiuscole o minuscole.</p>
<p><b>Cartella dati:</b> E\' la cartella dove Moodle inserirà i file caricati dagli utenti. Il web server (in genere \'nobody\' o \'apache\') DEVE avere i permessi di lettura e di scrittura su questa cartella. In aggiunta, la cartella dei dati non deve essere direttamente accessibile via web. L\'installer cercherà di creare questo folder se non esiste,</p>';
$string['directorysettingshead'] = 'Verificate e confermate la correttezza degli indirizzi web e dei percorsi assoluti di installazione';
$string['directorysettingssub'] = '<b>Indirizzo web:</b>
Specifica l\'indirizzo web per raggiungere la tua installazione Moodle. Se l\'installazione è raggiungibile da più di una URL, allora specifica la URL che sarà utilizzata dagli studenti senza aggiungere uno slash al termine della URL.
<br/>
<br/>
<b>Cartella di Moodle</b> Specifica il percorso assoluto della cartella dove stai installando Moodle. Accertati che il nome della cartella tenga conto di eventuali lettere maiuscole o minuscole.
<br/>
<br/>
<b>Cartella dati:</b> E\' la cartella dove Moodle inserirà i file caricati dagli utenti. Il web server (in genere \'nobody\' o \'apache\') DEVE avere i permessi di lettura e di scrittura su questa cartella. In aggiunta, la cartella dei dati non deve essere direttamente accessibile via web. L\'installer cercherà di creare questo folder se non esiste,';
$string['dirroot'] = 'Cartella di Moodle';
$string['dirrooterror'] = 'L\'impostazione \'Cartella di Moodle\' sembra essere errata - non è possibile trovare l\'installazione di Moodle nel percorso specificato. Il valore riportato sotto  è stato resettato.';
$string['download'] = 'Download';
$string['downloadlanguagebutton'] = 'Scarica il language pack "{$a}";';
$string['downloadlanguagehead'] = 'Scarica language pack';
$string['downloadlanguagenotneeded'] = 'È possibile continuare l\'installazione utilizzando il language pack "{$a}" di default.';
$string['downloadlanguagesub'] = 'Se lo desiderate, potete scaricare un Language pack e continuare l\'installazione con la lingua scaricata.<br /><br />Se lo scaricamento del Language pack non andrà a buon fine, l\'installazione proseguirà in lingua Inglese. (Una volta completata l\'installazione, avrete comunque la possibilità di scaricare ed installare ulteriori Language pack)';
$string['doyouagree'] = 'Siete d\'accordo ? (si/no)';
$string['environmenthead'] = 'Verifica del vostro ambiente...';
$string['environmentsub'] = 'Stiamo verificando che i vari componenti del vostro sistema soddisfino i requisiti necessari.';
$string['environmentsub2'] = 'Ciascuna release di Moodle prevede come requisito minimo una data versione del PHP ed una serie di estensioni. Prima di una installazione o di un aggiornamento viene eseguita la verifica dei requisiti minimi. Se non sai come installare nuove versioni del PHP o le sue estensioni, contatta l\'amministratore del tuo server.';
$string['errorsinenvironment'] = 'Ci sono problemi nel vostro ambiente';
$string['fail'] = 'Test non superato';
$string['fileuploads'] = 'Caricamento file';
$string['fileuploadserror'] = 'Deve essere impostato a on';
$string['fileuploadshelp'] = '<p>Sul server il caricamento dei file sembra essere disabilitato.</p>

<p>Moodle può essere installato, ma senza questa funzionalità non sarà possibile  caricare file nei corsi o modificare le immagini degli utenti..</p>

<p>Per abilitare il caricamento dei file devi modificare il file php.ini sul tuo server impostando <b>file_uploads</b> a \'1\'.</p>';
$string['gdversion'] = 'Versione GD';
$string['gdversionerror'] = 'La libreria GD deve essere presente per poter elaborare e creare immagini';
$string['gdversionhelp'] = '<p>Sul server non sembra sia installata la libreria GD.</p>

<p>GD è una libreria utilizzata dal PHP  che permettere a Moodle di elaborare le immagini (come le immagini dei profili utente) e creare nuove immagini (come i grafici dei log). Moodle può funzionare senza libreria GD - ma queste funzionalità non saranno disponibili.</p>

<p>Per aggiungere il supporto GD al PHP su sistemi operativi Unix/Linux, compila il PHP utilizzando l\'opzione --with-gd.</p>

<p>Su Windows di norma è possibile modificare il file php.ini e togliere il commento dalla linea che contiene php_gd2.dll.</p>';
$string['globalsquotes'] = 'Gestione non sicura delle globals';
$string['globalsquoteserror'] = 'Correggere le impostazioni PHP: disabilitare register_globals e/o abilitare magic_quotes_gpc';
$string['globalsquoteshelp'] = '<p>La combinazione magic quotes GPC disabilitata e register globals abilitata è sconsigliata.</p>

<p>L\'impostazione consigliata per il file php.ini è: <b>magic_quotes_gpc = On</b> e <b>register_globals = Off</b>

<p>Qualora non si abbia accesso al file php.ini, è possibile  aggiungere le seguenti linee in un file .htaccess da salvare nella Cartella di Moodle:</p>
<blockquote><div>php_value magic_quotes_gpc On</div></blockquote>
<blockquote><div>php_value register_globals Off</div></blockquote>';
$string['inputdatadirectory'] = 'Cartella dei dati:';
$string['inputwebadress'] = 'Indirizzo Web:';
$string['inputwebdirectory'] = 'Cartella di Moodle:';
$string['installation'] = 'Installazione';
$string['langdownloaderror'] = 'Purtroppo non è stato possibile scaricare la lingua "{$a}". L\'installazione proseguirà in lingua Inglese.';
$string['langdownloadok'] = 'La lingua "{$a}" è stata installata. L\'installazione proseguirà in questa lingua.';
$string['magicquotesruntime'] = 'Magic Quotes Run Time';
$string['magicquotesruntimeerror'] = 'Dovrebbe essere impostata ad off';
$string['magicquotesruntimehelp'] = '<p>L\'opzione magic quotes run time deve essere impostata a off affinché Moodle possa funzionare correttamente.</p>

<p>Normalmente per questa variabile l\'impostazione di default è off, ma è bene controllare la variabile
<b>magic_quotes_runtime</b> nel file php.ini.</p>

<p>Qualora non si abbia accesso al file php.ini, puoi aggiungere le seguenti linee in un file .htaccess da salvare nella Cartella di Moodle:</p> <blockquote>php_value magic_quotes_runtime Off</blockquote>';
$string['memorylimit'] = 'Memory Limit';
$string['memorylimiterror'] = 'Il limite di memoria del PHP è impostato a un valore troppo basso ... potrebbero verificarsi problemi in futuro.';
$string['memorylimithelp'] = '<p>Il limite di memoria assegnata al PHP attualmente è {$a}.</p>

<p>Tale limite potrà causare problemi nel funzionamento di Moodle, specialmente se usi molti moduli di attività con molti utenti.</p>

<p>Ti raccomandiamo di impostare il PHP con un limite più alto se possibile, ad esempio 40M.
Ci sono diversi modi che puoi provare:
<ol>
<li>Se possibile, ricompila il PHP con l\'opzione <i>--enable-memory-limit</i>.
Questo consentirà a Moodle di impostare in autonomia il limite di memoria.</li>
<li>Se hai accesso al file php.ini, è possibile modificare la variabile <b>memory_limit</b> a un valore più alto, ad esempio 40M. Se non hai accesso, potete chiedere al vostro amministratore di sistema di farlo.</li>
<li>Su alcuni server con il PHP è possibile creare un file .htaccess nella cartella di Moodle contenente questa linea:
<blockquote>php_value memory_limit 40M</blockquote>
<p>Tuttavia, su alcuni server la direttiva potrebbe impedire  a <b>tutte</b> le pagine PHP di funzionare (apapriranno degli erorri durante la visualizzazione delle pagine), in tal caso dovrai rimuovere il file .htaccess.</li></ol>';
$string['mssql'] = 'SQL*Server (mssql)';
$string['mssqlextensionisnotpresentinphp'] = 'Il PHP non è stato configurato correttamente con l\'estensione MSSQL e non può comunicare con SQL*Server. Controllate il vostro php.ini o ricompilate il PHP.';
$string['mssql_n'] = 'SQL*Server con supporto UTF-8 (mssql_n)';
$string['mysql'] = 'MySQL (mysql)';
$string['mysqlextensionisnotpresentinphp'] = 'Il PHP non è stato configurato correttamente con l\'estensione MySQL e non può comunicare con MySQL. Controllate il vostro php.ini o ricompilate il PHP.';
$string['mysqli'] = 'MySQL Improved (mysqli)';
$string['mysqliextensionisnotpresentinphp'] = 'Il PHP non è stato configurato correttamente con l\'estensione MySQLi e non può comunicare con MySQL. Controllate il vostro php.ini o ricompilate il PHP. Il PHP 4 non ha estensioni per MySQLi.';
$string['nativemssql'] = 'SQL*Server FreeTDS (native/mssql)';
$string['nativemssqlhelp'] = 'Devi ora configurare il database dove Moodle memorizzerà la maggior parte dei dati. Il database con l\'utente e la password d\'accesso devono già essere stati creati. Il prefisso delle tabelle è obbligatorio.';
$string['nativemysqli'] = 'Improved MySQL (native/mysqli)';
$string['nativemysqlihelp'] = 'Specificate le impostazioni del Database dove Moodle memorizzerà larga parte dei dati. Il Database deve già esistere e dovete disporre di username e password per accedervi. Il Prefisso delle tabelle è opzionale.';
$string['nativeoci'] = 'Oracle (native/oci)';
$string['nativeocihelp'] = 'Devi ora configurare il database dove Moodle memorizzerà la maggior parte dei dati. Il database con l\'utente e la password d\'accesso devono già essere stati creati. Il prefisso delle tabelle è obbligatorio.';
$string['nativepgsql'] = 'PostgreSQL (native/pgsql)';
$string['nativepgsqlhelp'] = 'Specificate le impostazioni del Database dove Moodle memorizzerà larga parte dei dati. Il Database deve già esistere e dovete disporre di username e password per accedervi. Il Prefisso delle tabelle è obbligatorio.';
$string['nativesqlsrv'] = 'SQL*Server Microsoft (native/sqlsrv)';
$string['nativesqlsrvhelp'] = 'Devi ora configurare il database dove Moodle memorizzerà la maggior parte dei dati. Il database con l\'utente e la password d\'accesso devono già essere stati creati. Il prefisso delle tabelle è obbligatorio.';
$string['nativesqlsrvnodriver'] = 'I driver PHP Microsoft per SQL Server non sono installati o non sono configurati correttamente.';
$string['nativesqlsrvnonwindows'] = 'I driver PHP Microsoft per SQL Server sono disponibili solamente nei sistemi operativi Windows.';
$string['oci8po'] = 'Oracle (oci8po)';
$string['ociextensionisnotpresentinphp'] = 'Il PHP non è stato configurato correttamente con l\'estensione OCI8 e non può comunicare con Oracle. Controllate il vostro php.ini o ricompilate il PHP.';
$string['odbcextensionisnotpresentinphp'] = 'Il PHP non è stato configurato correttamente con l\'estensione ODBC e non può comunicare con SQL*Server. Controllate il vostro php.ini o ricompilate il PHP.';
$string['odbc_mssql'] = 'SQL*Server via ODBC (odbc_mssql)';
$string['pass'] = 'Test superato';
$string['paths'] = 'Percorsi';
$string['pathserrcreatedataroot'] = 'Lo script di installazione non ha potuto creare la Cartella dei dati ({$a->dataroot}).';
$string['pathshead'] = 'Conferma percorsi';
$string['pathsrodataroot'] = 'La Cartella dei dati non è scrivibile.';
$string['pathsroparentdataroot'] = 'La cartella superiore ({$a->parent}) non è scrivibile. Lo script di installazione non può creare la Cartella dei dati ({$a->dataroot}).';
$string['pathssubadmindir'] = 'Alcuni web host utilizzano la cartella /admin come URL di accesso a pannelli di controllo od altre funzioni particolari. Tuttavia questo nome coincide con il nome della cartella che Moodle utilizza per i propri file di amministrazione. Per evitare conflitti, è possibile specificare un nome alternativo per la cartella Admin di Moodle. Ad esempio:<p><b>moodleadmin</b></p>
Tutti i link che puntano ai file di amministrazione di Moodle terranno conto di questa variazione.';
$string['pathssubdataroot'] = 'E\' necessario specificare una cartella dove Moodle inserirà i file caricati dagli utenti. Il web server (in genere \'nobody\' o \'apache\') DEVE avere i permessi di lettura e di scrittura su questa cartella. In aggiunta, la cartella dei dati NON DEVE essere direttamente accessibile via web. Se la Cartella dei dati non esiste, lo script di installazione tenterà di crearla.';
$string['pathssubdirroot'] = 'Percorso assoluto della cartella di installazione di Moodle.';
$string['pathssubwwwroot'] = 'Indirizzo web per accedere a Moodle. Non è possibile accedere alla stessa installazione Moodle usando più di un indirizzi web. Se il tuo sito usa più indirizzi web, devi configurare dei re-indirizzamenti permanenti per tutti gli altri indirizzi.
Se il tuo sito è raggiungibile sia dalla Internet che dalla Intranet, allora usa l\'indirizzo Internet pubblico ed imposta il DNS in modo che anche gli utenti della Intranet possano accedere usando l\'indirizzo pubblico.
Se l\'indirizzo è errato per favore correggilo nella barra degli indirizzi del browser per avviare nuovamente l\'installazione.';
$string['pathsunsecuredataroot'] = 'La posizione della Cartella dei dati non è sicura';
$string['pathswrongadmindir'] = 'La cartella Admin non esiste';
$string['pgsqlextensionisnotpresentinphp'] = 'Il PHP non è stato configurato correttamente con l\'estensione PGSQL e non può comunicare con PostgreSQL. Controllate il vostro php.ini o ricompilate il PHP.';
$string['phpextension'] = '{$a} estensioni PHP';
$string['phpversion'] = 'Versione PHP';
$string['phpversionhelp'] = '<p>Moodle necessita come minimo della versione 4.3.0 o 5.1.0 del PHP. (La versione 5.0.x soffre di problemi ben conosciuti)</p>
<p>La versione installata nel vostro sistema è la {$a}</p>
<p>Dovete aggiornare la versione del PHP oppure spostarsi su un host che abbia una versione più aggiornata del PHP!<br>
(Se avete la 5.0.x, potete fare il downgrade alla versione 4.4.x)</p>';
$string['postgres7'] = 'PostgreSQL (postgres7)';
$string['releasenoteslink'] = 'Per informazioni su questa versione di Moodle, fai riferimento alle Note di Rilascio su {$a}';
$string['safemode'] = 'Safe mode';
$string['safemodeerror'] = 'Moodle può avere problemi con il safe mode impostato a on';
$string['safemodehelp'] = '<p>Moodle può avere diversi problemi con safe mode impostato ad on, tra cui l\'impossibilità  di creare nuovi file.</p>

<p>Safe modedi solito  è abilitato su paranoici web server pubblici, se è cosi l\'unica soluzione è trovare un nuovo web server per il tuo sito Moodle.</p>

<p>È possibile continuare l\'installazione se si vuole, ma aspettati una serie di problemi in seguito.</p>';
$string['sessionautostart'] = 'Session Auto Start';
$string['sessionautostarterror'] = 'Dovrebbe essere impostata ad off';
$string['sessionautostarthelp'] = '<p>Moodle richiede il supporto delle sessioni e non funziona senza.</p>
<p>Le sessioni possono essere abilitate nel file php.ini ... cerca il parametro session.auto_start.</p>';
$string['skipdbencodingtest'] = 'Salta il test della codifica del Database';
$string['sqliteextensionisnotpresentinphp'] = 'Il PHP non è stato configurato correttamente con l\'estensione SQLite extension. Controllate il vostro php.ini o ricompilate il PHP.';
$string['upgradingqtypeplugin'] = 'Aggiornamento plugin tipi di domande';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'Se vedi questa pagina hai installato correttamente e lanciato il pacchetto <strong>{$a->packname} {$a->packversion}</strong>. Complimenti!';
$string['welcomep30'] = 'La release di <strong>{$a->installername}</strong> include l\'applicazione per creare l\'ambiente necessario a far girare <strong>Moodle</strong>:';
$string['welcomep40'] = 'Il pacchetto include anche <strong>Moodle {$a->moodlerelease} ({$a->moodleversion})</strong>.';
$string['welcomep50'] = 'L\'utilizzo delle applicazioni incluse in questo pacchetto è regolato dalle rispettive licenze. L\'intero pacchetto <strong>{$a->installername}</strong> è <a href="http://www.opensource.org/docs/definition_plain.html">open source</a> ed è distribuito in accordo alla licenza <a href="http://www.gnu.org/copyleft/gpl.html">GPL</a>.';
$string['welcomep60'] = 'Le prossime pagine ti guideranno attraverso semplici passi per installare e configurare <strong>Moodle</strong> nel tuo computer. Puoi utilizzare le impostazioni di default oppure modificarle per adeguarle alle tue esigenze.';
$string['welcomep70'] = 'Fate click sul pulsante "Avanti" per continuare l\'installazione di <strong>Moodle</strong>.';
$string['wwwroot'] = 'Indirizzo web';
$string['wwwrooterror'] = 'L\'indirizzo web sembra non essere valido - questa installazione di Moodle non sembra trovarsi dove indicato. L\'indirizzo è stato reimpostato';
