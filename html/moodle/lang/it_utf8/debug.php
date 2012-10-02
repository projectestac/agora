<?PHP // $Id: debug.php,v 1.6 2010/02/25 11:58:19 andreabix Exp $ 
      // debug.php - created with Moodle 2.0 dev (Build: 20100222) (2010021900)


$string['authpluginnotfound'] = 'La plugin di autenticazione $a non è stata trovata';
$string['blocknotexist'] = 'Il blocco $a non esiste';
$string['cannotbenull'] = '$a non può essere null!';
$string['cannotdowngrade'] = 'Non è possibile eseguire il downgrade del plugin $a->plugin dalla versione $a->oldversion alal versione $a->newversion.';
$string['cannotfindadmin'] = 'Non è stato possibile trovare un amministratore!';
$string['cannotinitpage'] = 'Non è possibile inizializzare completamente la pagina: $a->name non valida $a->id id';
$string['cannotsetuptable'] = 'Il setup delle tabelle $a non è andato a buon fine!';
$string['codingerror'] = 'E\' stato rilevato un errore di programmazione, deve essere sistemato da un programmatore: $a';
$string['configmoodle'] = 'Moodle non è ancora stato configurato. E\' necessario editare il file config.php';
$string['erroroccur'] = 'Si è verificato un errore durante lo svolgimento di questo processo';
$string['fixsetting'] = 'Per favore aggiustate le impostazioni nel file config.php:<p>La vostra impostazione:</p> <p>\$CFG->dirroot = \'$a->current\';</p> <p>dovrebbe essere:</p> <p>\$CFG->dirroot = \'$a->found\';</p>';
$string['invalidarraysize'] = 'La dimensione degli array è errata nei parametri di $a';
$string['invalideventdata'] = 'E\' stato inviato un eventdata non corretto: $a';
$string['invalidparameter'] = 'E\' stato rilevato un parametro non valido, il processo non può proseguire.';
$string['invalidresponse'] = 'E\' stata individuata una riposta non valida, l\'attività non può proseguire.';
$string['missingconfigversion'] = 'La tabella di configurazione non contiene la versione, non è possibile continuare.';
$string['modulenotexist'] = 'Il modulo $a non esiste';
$string['morethanonerecordinfetch'] = 'Nella fetch() è stato trovato più di un record!';
$string['mustbeoveride'] = 'Il metodo astratto $a deve essere overridden';
$string['noactivityname'] = 'L\'oggetto pagina è derivato da age_generic_activity ma non ha definito \$this->activityname';
$string['noadminrole'] = 'Non è stato possibile trovare il ruolo amministratore';
$string['noblocks'] = 'Non ci sono blocchi installati!';
$string['nocate'] = 'Non ci sono categorie!';
$string['nomodules'] = 'Non sono stati trovati moduli!';
$string['nopageclass'] = 'E\' stato importato $a ma non sono state trovate page class';
$string['noreports'] = 'Non ci sono report accessibili';
$string['notables'] = 'Non ci sono tabelle!';
$string['phpvaroff'] = 'La variabile PHP \'$a->name\' dovrebbe essere impostata ad Off - $a->link';
$string['phpvaron'] = 'La variabile PHP \'$a->name\' non è impostata ad On - $a->link';
$string['sessionmissing'] = 'L\'oggetto $a manca dalla sessione';
$string['sqlrelyonobsoletetable'] = 'Questo SQL fa affidamento su tabelle obsolete: $a!. Il tuo codice deve essere sistemato da uno sviluppatore.';
$string['withoutversion'] = 'Il file version.php principale è mancante, illeggibile o rovinato.';
$string['xmlizeunavailable'] = 'Le funzioni xmlize non sono disponibili';
$string['siteisnotdefined'] = 'Il sito non è definito!'; // ORPHANED

?>
