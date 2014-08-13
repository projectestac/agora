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
 * Strings for component 'tool_generator', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_generator
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bigfile'] = 'File grandi {$a}';
$string['courseexplanation'] = 'Il tool crea un corso di test con diverse sezioni, attività e file.

E\' utile per fornire una misura standard per verificare l\'affidabilità e le prestazioni di diverse componenti del sistema (ad esempio backup e ripristino).

Il test è importante poiché in molti casi reali (ad esempio corsi con più di 1000 attività) il sistema può presentare problemi.

I corsi creati dal tool possono occupare un notevole spazio nel database e nel filesystem (decine di gigabyte). Sarà necessario eliminare i corsi ed attendere le attività di pulizia periodiche prima di liberare lo spazio utilizzato.

**Non utilizzare il tool su un sistema in produzione**. Usare solo in sistemi di sviluppo.
(Per evitare usi accidentali, il tool è abilitato solo se il debugging è impostato a DEVELOPER.)';
$string['coursesize_0'] = 'XS (~10KB; creazione in ~1 secondo)';
$string['coursesize_1'] = 'S (~10MB; creazione in ~30 secondi)';
$string['coursesize_2'] = 'M (~100MB; creazione in ~5 minuti)';
$string['coursesize_3'] = 'L (~1GB; creazione in ~1 ora)';
$string['coursesize_4'] = 'XL (~10GB; creazione in ~4 ore)';
$string['coursesize_5'] = 'XXL (~20GB; creazione in ~8 ore)';
$string['coursewithoutusers'] = 'Il corso selezionato è privo di utenti';
$string['createcourse'] = 'Crea corso';
$string['createtestplan'] = 'Crea test plan';
$string['creating'] = 'Creazione corso';
$string['done'] = 'eseguito ({$a}s)';
$string['downloadtestplan'] = 'Scarica test plan';
$string['downloadusersfile'] = 'Scarica file utenti';
$string['error_nocourses'] = 'Non ci sono corsi per generare il test plan';
$string['error_noforumdiscussions'] = 'Il corso selezionato non contiene discussioni forum';
$string['error_noforuminstances'] = 'Il corso selezionato non contiene istanze del modulo forum';
$string['error_noforumreplies'] = 'Il corso selezionato non contiene interventi forum';
$string['error_nonexistingcourse'] = 'Il corso specificato non esiste';
$string['error_nopageinstances'] = 'Il corso selezionato non contiene istanze del modulo pagina';
$string['error_notdebugging'] = 'Non disponibile su questo server poiché il debugging non è impostato a DEVELOPER.';
$string['error_nouserspassword'] = 'Per generare un test plan è necessario impostare $CFG->tool_generator_users_password nel file config.php';
$string['firstname'] = 'Test utente corso';
$string['fullname'] = 'Corso di test: {$a->size}';
$string['maketestcourse'] = 'Crea corso di test';
$string['maketestplan'] = 'Crea test plan JMeter';
$string['notenoughusers'] = 'Il corso selezionato non ha un numero sufficiente di utenti';
$string['pluginname'] = 'Generatore di dati per sviluppo';
$string['progress_checkaccounts'] = 'Verifica account utente ({$a})';
$string['progress_coursecompleted'] = 'Corso completato ({$a}s)';
$string['progress_createaccounts'] = 'Creazione account utente ({$a->from} - {$a->to})';
$string['progress_createbigfiles'] = 'Creazione file grandi ({$a})';
$string['progress_createcourse'] = 'Creazione corso {$a}';
$string['progress_createforum'] = 'Creazione forum ({$a} posts)';
$string['progress_createpages'] = 'Creazione pagine ({$a})';
$string['progress_createsmallfiles'] = 'Creazione file piccoli ({$a})';
$string['progress_enrol'] = 'Iscrizione utenti ai corsi ({$a})';
$string['progress_sitecompleted'] = 'Sito completato ({$a}s)';
$string['shortsize_0'] = 'XS';
$string['shortsize_1'] = 'S';
$string['shortsize_2'] = 'M';
$string['shortsize_3'] = 'L';
$string['shortsize_4'] = 'XL';
$string['shortsize_5'] = 'XXL';
$string['sitesize_0'] = 'XS (~10MB; 3 corsi, creazione in ~30 secondi)';
$string['sitesize_1'] = 'S (~50MB; 8 corsi, creazione in ~2 minuti)';
$string['sitesize_2'] = 'M (~200MB; 73 corsi, creazione in ~10 minuti)';
$string['sitesize_3'] = 'L (~1\'5GB; 277 corsi, creazione in ~1\'5 ore)';
$string['sitesize_4'] = 'XL (~10GB; 1065 corsi, creazione in ~5 ore)';
$string['sitesize_5'] = 'XXL (~20GB; 4177 corsi, creazione in ~10 ore)';
$string['size'] = 'Dimensione del corso';
$string['smallfiles'] = 'File piccoli';
$string['targetcourse'] = 'Test corso obiettivo';
$string['testplanexplanation'] = 'Il tool crea un file di test plan JMeter assieme ad un file con le credenziali utente.

Il test plan è disegnato per lavorare con {$a}, rendendo più semplice eseguire il test plan in uno specifico ambiente Moodle, raccogliere informazioni sull\'elaborazione e confrontare i risultati. E\' necessario scaricare il test plan ed eseguirlo tramite lo script test_runner.sh oppure seguire le istruzioni di installazione ed utilizzo.

E\' necessario impostare una password per gli utenti del corso nel file config.php (ad esempio $CFG->tool_generator_users_password = \'moodle\';). Non sono previsti default per la password per evitare usi fraudolenti del tool. E\' anche necessario aggiornare l\'opzione password se gli utenti del corso hanno password diverse oppure le password sono state generate senza aver prima impostato il valore in $CFG->tool_generator_users_password.

Il tool fa parte di tool_generator, quindi lavora bene con i corsi prodotti dai generatori di corsi e di siti. Può anche essere usato con altri corsi che abbiamo le seguenti caratteristiche:

* un numero sufficiente di utenti (in funzione del test plan scelto) con password impostata a \'moodle\'
* un\'istanza di modulo pagina
* un\'istanza di modulo forum con almeno una discussione ed un intervento

E\' bene valutare le possibilità del server prima di eseguire un test plan JMeter di grandi dimensioni poiché il carico generato può essere molto elevato. Il periodo di ramp up può essere ottimizzato in base al numero di thread (utenti) per ridurre il problema ma il carico rimarrà comunque molto elevato.

**Non eseguire il test plan su un sistema in produzione**. Il tool è innocuo e genera solamente file da usare con JMeter ma non eseguire **MAI** un test plan su sistemi in produzione.';
$string['testplansize_0'] = 'XS ({$a->users} utenti, {$a->loops} loop e {$a->rampup} rampup period)';
$string['testplansize_1'] = 'S ({$a->users} utenti, {$a->loops} loop e {$a->rampup} rampup period)';
$string['testplansize_2'] = 'M ({$a->users} utenti, {$a->loops} loop e {$a->rampup} rampup period)';
$string['testplansize_3'] = 'L ({$a->users} utenti, {$a->loops} loop e {$a->rampup} rampup period)';
$string['testplansize_4'] = 'XL ({$a->users} utenti, {$a->loops} loop e {$a->rampup} rampup period)';
$string['testplansize_5'] = 'XXL ({$a->users} utenti, {$a->loops} loop e {$a->rampup} rampup period)';
$string['updateuserspassword'] = 'Aggiorna password utenti del corso';
$string['updateuserspassword_help'] = 'JMeter deve autenticarsi come utente del corso. E\' possibile impostare la password degli utenti impostando $CFG->tool_generator_users_password nel file config.php. L\'impostazione aggiorna la password degli utenti del corso al valore impostato in $CFG->tool_generator_users_password. Può essere utile nel caso si utilizzi un corso non generato da tool_generator o nel caso in cui il corso di test sia stato creato prima di impostare $CFG->tool_generator_users_password.';
