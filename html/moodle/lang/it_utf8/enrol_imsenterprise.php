<?PHP // $Id: enrol_imsenterprise.php,v 1.1 2007/10/10 13:27:27 andreabix Exp $ 
      // enrol_imsenterprise.php - created with Moodle 1.9 Beta + (2007091702)
      // local modifications from http://moodle.chris.intranet


$string['aftersaving...'] = 'Dopo aver salvato le impostazioni, desideri';
$string['allowunenrol'] = 'Permettere all\'IMS data di <strong>disiscrivere</strong> gli studenti/docenti';
$string['basicsettings'] = 'Impostazioni di base';
$string['coursesettings'] = 'Opzioni del corso';
$string['createnewcategories'] = 'Creare nuove categorie (nascoste) di corsi se non presenti in Moodle';
$string['createnewcourses'] = 'Creare nuovi corsi (nascosti) se non presenti in Moodle';
$string['createnewusers'] = 'Creare nuovi account per gli utenti non ancora registrati in Moodle';
$string['cronfrequency'] = 'Frequenza di attivazione';
$string['deleteusers'] = 'Cancellare gli account quando è specificato nell\'IMS data';
$string['description'] = 'Questa funzione controllerà e attiverà ripetutamente un documento formattato nel percorso che viene specificato. Il documento deve rispettare le <a href=\'../help.php?module=enrol/imsenterprise&amp;file=formatoverview.html\'>specifiche IMS Enterprise</a> in modo da contenere gli elementi XML person (persona), gruppo (gruppi) e membership (appartenenza).';
$string['doitnow'] = 'Esegui un\'importazione \"IMS Enterprise\" adesso';
$string['enrolname'] = 'Documento \"IMS Enterprise\"';
$string['filelockedmail'] = 'Il documento di testo utilizzato per l\'iscrizione \"IMS Enterprise\" ($a) non può essere cancellato dal processo di cron. Di soliti significa che i suoi permessi sono sbagliati. Controllare e impostare correttamente i permessi in modo che Moodle possa cancellare il documento, altrimenti verrà attivato ripetutamente.';
$string['filelockedmailsubject'] = 'Errore importante: documento di iscrizione';
$string['fixcasepersonalnames'] = 'Cambia i nomi propri in Maiuscolo/minuscolo';
$string['fixcaseusernames'] = 'Cambia i nomi utenti in tutto miuscolo';
$string['imsrolesdescription'] = 'Le specifiche \"IMS Enterprise\" comprendono 8 tipi di ruoli distinti. Scegli come vuoi assegnarli in Moodle, inclusi quelli che dovranno essere ignorati.';
$string['location'] = 'Percorso del file';
$string['logtolocation'] = 'Percorso del file di log (lasciare bianco per nessun log)';
$string['mailadmins'] = 'Avvisa l\'amministratore per email';
$string['mailusers'] = 'Avvisa gli utenti per email';
$string['miscsettings'] = 'Miscellanea';
$string['processphoto'] = 'Aggiungi una foto al profilo';
$string['processphotowarning'] = 'ATTENZIONE: lavorare un\'immagine potrebbe aggravare il lavoro del server. Si raccomanda di NON attivare questa opzione se è previsto un elevato numero di utenti.';
$string['restricttarget'] = 'Lavora i dati solo se appartiene a questo destinatario';
$string['sourcedidfallback'] = 'Utilizza il campo &quot;sourcedid&quot; come userid di una persona se il campo &quot;userid&quot; non è presente';
$string['truncatecoursecodes'] = 'Ritaglia i codici dei corsi a questa lunghezza';
$string['usecapitafix'] = 'Seleziona questa opzione se usi &quot;Capita&quot; (il formato XML generato da questo programma contiene un errore)';
$string['usersettings'] = 'Opzioni utente';
$string['zeroisnotruncation'] = '0 indica nessun ritaglio';

?>
