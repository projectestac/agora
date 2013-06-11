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
 * Strings for component 'backup', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   backup
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autoactivedescription'] = 'E\' possibile scegliere come impostare i backup automatici. Selezionando \'Manuale\' i backup automatici saranno eseguiti esclusivamente tramite lo script CLI di backup che può essere eseguito manualmente oppure tramite il cron.';
$string['autoactivedisabled'] = 'Disabilitato';
$string['autoactiveenabled'] = 'Abilitato';
$string['autoactivemanual'] = 'Manuale';
$string['automatedbackupschedule'] = 'Schedula';
$string['automatedbackupschedulehelp'] = 'Scegli in quali giorni della settimana effettuare i backup automatici.';
$string['automatedbackupsinactive'] = 'I backup automatici non sono stati abilitati dall\'amministratore del sito.';
$string['automatedbackupstatus'] = 'Stato backup automatico';
$string['automatedsettings'] = 'Impostazioni backup automatici';
$string['automatedsetup'] = 'Impostazioni backup automatico';
$string['automatedstorage'] = 'Archivio backup automatici ';
$string['automatedstoragehelp'] = 'La posizione di memorizzazione dei backup automatici';
$string['backupactivity'] = 'Backup attività: {$a}';
$string['backupcourse'] = 'Backup corso: {$a}';
$string['backupcoursedetails'] = 'Dettagli corso';
$string['backupcoursesection'] = 'Sezione: {$a}';
$string['backupcoursesections'] = 'Sezioni corso';
$string['backupdate'] = 'Data backup';
$string['backupdetails'] = 'Dettagli backup';
$string['backupdetailsnonstandardinfo'] = 'Il file selezionato non è un file di backup Moodle standard. Il processo di ripristino tenterà di convertire il file di backup al formato standard per poi ripristinarlo. ';
$string['backupformat'] = 'Formato';
$string['backupformatimscc1'] = 'MS Common Cartridge 1.0';
$string['backupformatimscc11'] = 'MS Common Cartridge 1.1';
$string['backupformatmoodle1'] = 'Moodle 1';
$string['backupformatmoodle2'] = 'Moodle 2';
$string['backupformatunknown'] = 'Formato sconosciuto';
$string['backupmode'] = 'Modalità';
$string['backupmode10'] = 'Generale';
$string['backupmode20'] = 'importa';
$string['backupmode30'] = 'Hub';
$string['backupmode40'] = 'Stesso sito';
$string['backupmode50'] = 'Automatizzato';
$string['backupmode60'] = 'Convertito';
$string['backupsection'] = 'Backup sezione corso: {$a}';
$string['backupsettings'] = 'Impostazioni backup';
$string['backupsitedetails'] = 'Dettagli sito';
$string['backupstage16action'] = 'Prosegui';
$string['backupstage1action'] = 'Avanti';
$string['backupstage2action'] = 'Avanti';
$string['backupstage4action'] = 'Esegui backup';
$string['backupstage8action'] = 'Prosegui';
$string['backuptype'] = 'Tipo';
$string['backuptypeactivity'] = 'Attività';
$string['backuptypecourse'] = 'Corso';
$string['backuptypesection'] = 'Sezione';
$string['backupversion'] = 'Versione backup';
$string['cannotfindassignablerole'] = 'Il ruolo {$a} presente nel file di backup non può essere mappato su nessuno dei ruoli che sei autorizzato ad assegnare.';
$string['choosefilefromactivitybackup'] = 'Area backup attività';
$string['choosefilefromactivitybackup_help'] = 'Se si effettua un backup delle attività con le impostazioni di default, i file di backup saranno salvati qui';
$string['choosefilefromautomatedbackup'] = 'Backup automatici';
$string['choosefilefromautomatedbackup_help'] = 'Contiene i backup generati automaticamente';
$string['choosefilefromcoursebackup'] = 'Area backup corso';
$string['choosefilefromcoursebackup_help'] = 'I backup dei corsi eseguiti con le impostazioni di default sono memorizzati nell\'area di backup del corso';
$string['choosefilefromuserbackup'] = 'Area backup personali';
$string['choosefilefromuserbackup_help'] = 'I backup dei corsi eseguiti con l\'opzione "Rendi anonimi i dati utente" sono memorizzati nei file personali';
$string['configgeneralactivities'] = 'Imposta il default per l\'inclusione delle attività nei backup.';
$string['configgeneralanonymize'] = 'Imposta il default per rendere anonime le informazioni degli utenti nei backup.';
$string['configgeneralblocks'] = 'Imposta il default per l\'inclusione dei blocchi nei backup.';
$string['configgeneralcomments'] = 'Imposta il default per l\'inclusione dei commenti nei backup.';
$string['configgeneralfilters'] = 'Imposta il default per l\'inclusione dei filtri nei backup.';
$string['configgeneralhistories'] = 'Imposta il default per l\'inclusione della storia degli utenti nei backup.';
$string['configgenerallogs'] = 'Imposta il default per l\'inclusione dei log nei backup.';
$string['configgeneralroleassignments'] = 'Imposta il default per l\'inclusione delle assegnazioni di ruolo nei backup.';
$string['configgeneralusers'] = 'Imposta il default per l\'inclusione degli utenti nei backup.';
$string['configgeneraluserscompletion'] = 'Imposta il default per l\'inclusione delle informazioni di xompletamento nei backup.';
$string['configloglifetime'] = 'Imposta la finestra temporale di conservazione dei log di backup. I log antecedenti la finestra temporale saranno eliminati automaticamente. Si suggerisce di impostare un valore basso, la quantità di informazioni dei logo può essere molto grande.';
$string['confirmcancel'] = 'Annulla backup';
$string['confirmcancelno'] = 'Continua';
$string['confirmcancelquestion'] = 'Sei sicuro di voler annullare? Le informazioni inserite saranno perdute.';
$string['confirmcancelyes'] = 'Annulla';
$string['confirmnewcoursecontinue'] = 'Avviso: nuovo corso';
$string['confirmnewcoursecontinuequestion'] = 'Il processo di ripristino creerà un nuovo corso nascosto. Per interrompere il processo, fare click su annulla. Non chiudere il browser durante il processo di ripristino.';
$string['coursecategory'] = 'Categoria dove ripristinare il corso';
$string['courseid'] = 'ID Originale';
$string['coursesettings'] = 'Impostazioni corso';
$string['coursetitle'] = 'Titolo';
$string['currentstage1'] = 'Impostazioni iniziali';
$string['currentstage16'] = 'Fine';
$string['currentstage2'] = 'Impostazione struttura';
$string['currentstage4'] = 'Revisione e conferma';
$string['currentstage8'] = 'Esecuzione backup';
$string['dependenciesenforced'] = 'Le impostazioni sono state cambiate a causa di dipendenze non soddisfatte.';
$string['enterasearch'] = 'Inserisci una ricerca';
$string['error_block_for_module_not_found'] = 'E\' stata trovata una istanza di blocco orfana (id: {$a->bid}) nel corso (id: {$a->mid}). Questo blocco non sarà incluso nel backup.';
$string['error_course_module_not_found'] = 'E\' stato trovato un modulo orfano (id: {$a}) nel corso. Questo modulo non sarà incluso nel backup.';
$string['errorfilenamemustbezip'] = 'Il nome del file inserito deve essere un file ZIP e deve avere l\'estensione .mbz.';
$string['errorfilenamerequired'] = 'Devi inserire un nome valido per il file di backup. ';
$string['errorinvalidformat'] = 'Formato backup sconosciuto';
$string['errorinvalidformatinfo'] = 'Il file selezionato non è un file di backup Moodle valido e non può essere ripristinato.';
$string['errorminbackup20version'] = 'Questo file di backup è stato creato con una versione di sviluppo del backup di Moodle ({$a->backup}). La versione minima dalla quale è possibile ripristinare è la {$a->min}.';
$string['errorrestorefrontpage'] = 'Non è consentito ripristinare sovrascrivendo l\'home page';
$string['executionsuccess'] = 'Il file di backup è stato creato correttamente. ';
$string['filealiasesrestorefailures'] = 'Errori nel ripristino di alias';
$string['filealiasesrestorefailures_help'] = 'Gli alias sono link simbolici a file, tra cui i file memorizzarti in repository esterni. In alcuni casi Moodle non può ripristinarli, ad esempio nel caso in cui si tenti di ripristinare backup provenienti da altri sito oppure quando il file collegato non esiste.

Per maggiori informazioni sugli errori consultare il log di ripristino.';
$string['filealiasesrestorefailuresinfo'] = 'Non è stato possibile ripristinare alcuni alias presenti nel file di backup. L\'elenco che segue presenta le sorgenti dei file ai quali si riferivano gli alias nel sito di origine.';
$string['filename'] = 'Nome file';
$string['filereferencesincluded'] = 'Il backup contiene file collegati a contenuti esterni. I file collegati non funzioneranno in altri siti.';
$string['filereferencesnotsamesite'] = 'Il backup proviene da un altro sito, i file collegati non possono essere ripristinati';
$string['filereferencessamesite'] = 'Il backup proviene dallo stesso sito, i file collegati possono essere ripristinati';
$string['generalactivities'] = 'Includi attività';
$string['generalanonymize'] = 'Rendi anonime le informazioni';
$string['generalbackdefaults'] = 'Impostazioni di default';
$string['generalblocks'] = 'Includi blocchi';
$string['generalcomments'] = 'Inclusi commenti';
$string['generalfilters'] = 'Includi filtri';
$string['generalgradehistories'] = 'Includi storie';
$string['generalhistories'] = 'Includi storia';
$string['generallogs'] = 'Includi log';
$string['generalroleassignments'] = 'Includi assegnazioni di ruolo';
$string['generalsettings'] = 'Impostazioni generali del backup';
$string['generalusers'] = 'Includi utenti';
$string['generaluserscompletion'] = 'Includi completamento dell\'utente';
$string['importbackupstage16action'] = 'Prosegui';
$string['importbackupstage1action'] = 'Avanti';
$string['importbackupstage2action'] = 'Avanti';
$string['importbackupstage4action'] = 'Esegui importazione';
$string['importbackupstage8action'] = 'Prosegui';
$string['importcurrentstage0'] = 'Scelta corso';
$string['importcurrentstage1'] = 'Impostazioni iniziali';
$string['importcurrentstage16'] = 'Fine';
$string['importcurrentstage2'] = 'Impostazioni schema';
$string['importcurrentstage4'] = 'Verifica e conferma';
$string['importcurrentstage8'] = 'Esegui importazione';
$string['importfile'] = 'Importa un file di backup';
$string['importsuccess'] = 'Importazione completata. Fai click sul pulsante Continua per ritornare al corso.';
$string['includeactivities'] = 'Includi:';
$string['includeditems'] = 'Elementi inclusi:';
$string['includefilereferences'] = 'File collegati a contenuti esterni';
$string['includesection'] = 'Sezione {$a}';
$string['includeuserinfo'] = 'Dati utente';
$string['locked'] = 'Bloccato';
$string['lockedbyconfig'] = 'Le impostazioni sono bloccate dalle impostazioni di default';
$string['lockedbyhierarchy'] = 'Bloccato da dipendenze';
$string['lockedbypermission'] = 'Non hai i privilegi necessari per cambiare questa impostazione';
$string['loglifetime'] = 'Conserva i log per';
$string['managefiles'] = 'Gestisci file di backup';
$string['missingfilesinpool'] = 'Alcuni file non sono stati salvati nel backup e non sarà possibile ripristinarli.';
$string['moodleversion'] = 'Versione Moodle';
$string['morecoursesearchresults'] = 'Sono stati trovati più di {$a} corsi. Vengono visualizzati i primi {$a} risultati';
$string['moreresults'] = 'La ricerca ha prodotto troppi risultati. Prova a restringere la ricerca.';
$string['nomatchingcourses'] = 'Non ci sono corsi da visualizzare';
$string['norestoreoptions'] = 'Non ci sono categorie né corsi dove ripristinare.';
$string['originalwwwroot'] = 'URL del backup';
$string['previousstage'] = 'Indietro';
$string['qcategory2coursefallback'] = 'La categoria di domande "{$a->name}", presente nel backup e proveniente contesto della categoria system/course, sarà ripristinata nel contesto del corso.';
$string['qcategorycannotberestored'] = 'Il ripristino non può creare la categoria di domande "{$a->name}"';
$string['question2coursefallback'] = 'La categoria di domande "{$a->name}", presente nel backup e proveniente contesto della categoria system/course, sarà ripristinata nel contesto del corso.';
$string['questionegorycannotberestored'] = 'Il ripristino non può creare le domande "{$a->name}"';
$string['restoreactivity'] = 'Ripristina attività';
$string['restorecourse'] = 'Ripristina corso';
$string['restorecoursesettings'] = 'Impostazioni corso';
$string['restoreexecutionsuccess'] = 'Il corso è stato ripristinato correttamente, fai click sul pulsante Prosegui per vedere il corso.';
$string['restorefileweremissing'] = 'Alcuni file non sono stati ripristinati poiché non erano presenti nel backup.';
$string['restorenewcoursefullname'] = 'Nuovo titolo del corso';
$string['restorenewcourseshortname'] = 'Nuovo titolo abbreviato del corso';
$string['restorenewcoursestartdate'] = 'Nuova data di inizio';
$string['restorerolemappings'] = 'Ripristina mappatura ruoli';
$string['restorerootsettings'] = 'Impostazioni ripristino';
$string['restoresection'] = 'Sezione ripristino';
$string['restorestage1'] = 'Conferma';
$string['restorestage16'] = 'Revisione';
$string['restorestage16action'] = 'Esegui ripristino';
$string['restorestage1action'] = 'Avanti';
$string['restorestage2'] = 'Destinazione';
$string['restorestage2action'] = 'Avanti';
$string['restorestage32'] = 'Esecuzione';
$string['restorestage32action'] = 'Prosegui';
$string['restorestage4'] = 'Impostazioni';
$string['restorestage4action'] = 'Avanti';
$string['restorestage64'] = 'Fine';
$string['restorestage64action'] = 'Prosegui';
$string['restorestage8'] = 'Schema';
$string['restorestage8action'] = 'Avanti';
$string['restoretarget'] = 'Destinazione del ripristino';
$string['restoretocourse'] = 'Ripristina nel corso:';
$string['restoretocurrentcourse'] = 'Ripristino in questo corso';
$string['restoretocurrentcourseadding'] = 'Aggiungi il contenuto del backup a questo corso';
$string['restoretocurrentcoursedeleting'] = 'Elimina il contenuto di questo corso e poi ripristina';
$string['restoretoexistingcourse'] = 'Ripristino in un corso esistente';
$string['restoretoexistingcourseadding'] = 'Aggiungi il backup nel corso esistente';
$string['restoretoexistingcoursedeleting'] = 'Elimina il contenuto del corso esistente e poi ripristina';
$string['restoretonewcourse'] = 'Ripristino in un corso nuovo';
$string['restoringcourse'] = 'Ripristino in esecuzione';
$string['restoringcourseshortname'] = 'ripristino in corso';
$string['rootenrolmanual'] = 'Ripristina come iscrizioni manuali';
$string['rootsettingactivities'] = 'Includi attività';
$string['rootsettinganonymize'] = 'Rendi anonimi i dati utente';
$string['rootsettingblocks'] = 'Includi blocchi';
$string['rootsettingcalendarevents'] = 'Includi eventi del calendario';
$string['rootsettingcomments'] = 'Includi commenti';
$string['rootsettingfilters'] = 'Includi filtri';
$string['rootsettinggradehistories'] = 'Includi storico valutazioni';
$string['rootsettingimscc1'] = 'Converti a IMS Common Cartridge 1.0';
$string['rootsettingimscc11'] = 'Converti a IMS Common Cartridge 1.1';
$string['rootsettinglogs'] = 'Includi log del corso';
$string['rootsettingroleassignments'] = 'Includi assegnazioni di ruolo';
$string['rootsettings'] = 'Impostazioni backup';
$string['rootsettingusers'] = 'Includi utenti iscritti';
$string['rootsettinguserscompletion'] = 'Includi dati completamento utente';
$string['sectionactivities'] = 'Attività';
$string['sectioninc'] = 'Inclusi nel backup (senza dati utente)';
$string['sectionincanduser'] = 'Inclusi nel backup con i dati utente)';
$string['selectacategory'] = 'Scegli una categoria';
$string['selectacourse'] = 'Scegli un corso';
$string['setting_course_fullname'] = 'Titolo del corso';
$string['setting_course_shortname'] = 'Titolo abbreviato del corso';
$string['setting_course_startdate'] = 'Data di inizio del corso';
$string['setting_keep_groups_and_groupings'] = 'Mantieni gruppi e raggruppamenti esistenti';
$string['setting_keep_roles_and_enrolments'] = 'Mantieni ruoli ed iscrizioni esistenti';
$string['setting_overwriteconf'] = 'Sovrascrivi la configurazione del corso';
$string['skiphidden'] = 'Salta i corsi nascosti';
$string['skiphiddenhelp'] = 'Consente di escludere dal backup i corsi nascosti';
$string['skipmodifdays'] = 'Salta i corsi non modificati per';
$string['skipmodifdayshelp'] = 'Consente di escludere dal backup i corsi non modificati per un dato numero di giorni.';
$string['skipmodifprev'] = 'Salta i corsi non modificati dall\'ultimo backup';
$string['skipmodifprevhelp'] = 'Consente di escludere dal backup i corsi non modificati dalla data del backup più recente';
$string['storagecourseandexternal'] = 'Area backup del corso e una cartella specifica';
$string['storagecourseonly'] = 'Area backup del corso';
$string['storageexternalonly'] = 'Una cartella specifica, dove salvare i backup automatici';
$string['totalcategorysearchresults'] = 'Totale categorie: {$a}';
$string['totalcoursesearchresults'] = 'Totale corsi: {$a}';
