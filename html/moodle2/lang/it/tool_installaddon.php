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
 * Strings for component 'tool_installaddon', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_installaddon
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acknowledgement'] = 'Accettazione';
$string['acknowledgementmust'] = 'Devi accettare le condizioni';
$string['acknowledgementtext'] = 'Sono consapevole che è mia responsabilità disporre di backup completi del sito effettuati prima di installare plugin. Accetto e comprendo che i plugin (ivi inclusi quelli provenienti da siti non ufficiali) possono contenere problemi di sicurezza, rendere il sito non funzionante nonché provocare la perdita o diffusione di dati.';
$string['featuredisabled'] = 'L\'installazione di plugin è disabilitata';
$string['installaddon'] = 'Installa plugin!';
$string['installaddons'] = 'Installazione plugin';
$string['installexception'] = 'Oops... Si è verificato un errore durante l\'installazione del plugin. E\' possibile attivare la modalità di debug per individuare meglio la causa dell\'errore.';
$string['installfromrepo'] = 'Installazione dal Moodle plugins directory';
$string['installfromrepo_help'] = 'Sarai reindirizzato sul Moodle plugins directory per cercare il plugin da installare. Per facilitare l\'installazione del plugin, verranno anche trasmessi Il nome del sito, l\'URL e la versione di Moodle utilizzata.';
$string['installfromzip'] = 'Installazione plugin da file ZIP';
$string['installfromzipfile'] = 'Pacchetto ZIP';
$string['installfromzipfile_help'] = 'Il pacchetto ZIP del plugin deve contenere solo una cartella con il nome del plugin. Il pacchetto ZIP sarà estratto nella cartella di destinazione designata dal tipo di plugin. I pacchetti scaricati tramite Moodle plugins directory hanno questo formato.';
$string['installfromzip_help'] = 'Oltre alla installazione tramite Moodle plugins directory, è anche possibile installare manualmente plugin tramite caricamento di un pacchetto ZIP. Il pacchetto ZIP deve avere la stessa struttura dei pacchetti disponibili sul Moodle plugins directory.';
$string['installfromziprootdir'] = 'Rinomina cartella radice';
$string['installfromziprootdir_help'] = 'Alcuni pacchetti ZIP, come ad esempio i pacchetti generati da Github, possono contenere un nome errato per la cartella radice. Se necessario, tramite questo campo è possibile rinominare la cartella radice.';
$string['installfromzipsubmit'] = 'Installazione plugin da file ZIP';
$string['installfromziptype'] = 'Tipo plugin';
$string['installfromziptype_help'] = 'Scegliere il tipo di plugin che si intende installare. La scelta di un tipo errato impedirà il corretto completamento della procedura di installazione.';
$string['permcheck'] = 'E\' necessario accertarsi che la cartella radice del tipo di plugin sia scrivibile dal processo web server';
$string['permcheckerror'] = 'Si è verificato un errore durante il controllo dei permessi di scrittura';
$string['permcheckprogress'] = 'Verifica permessi di scrittura in corso...';
$string['permcheckresultno'] = 'La cartella <em>{$a->path}</em> del tipo di plugin scelto non è scrivibile';
$string['permcheckresultyes'] = 'La cartella <em>{$a->path}</em> del tipo di plugin scelto è scrivibile';
$string['pluginname'] = 'Installazione plugin';
$string['remoterequestalreadyinstalled'] = 'E\' stato richiesto di installare il plugin {$a->name} ({$a->component}) versione {$a->version} dal Moodle plugins directory. Il plugin tuttavia risulta <strong>già installato</strong>.';
$string['remoterequestconfirm'] = 'E\' stato richiesto di installare il plugin {$a->name} ({$a->component}) versione {$a->version} dal Moodle plugins directory. Se si decide di proseguire, il pacchetto ZIP contenente il plugin verrà prima scaricato per essere verificato, senza essere installato.';
$string['remoterequestinvalid'] = 'E\' stato richiesto di installare un plugin dal Moodle plugins directory. Sfortunatamente la richiesta non è valida e il plugin non può essere installato';
$string['remoterequestpermcheck'] = 'E\' stato richiesto di installare il plugin {$a->name} ({$a->component}) versione {$a->version} dal Moodle plugins directory. La cartella di destinazione <strong>{$a->typepath}</strong> del tipo di plugin <strong>non è scrivibile</strong>. E\' necessario dare al processo web server i permessi di scrittura sulla cartella, dopodiché sarà possibile premere il pulsante "continua" per ripetere i controlli.';
$string['remoterequestpluginfoexception'] = 'Oops... Si è verificato un errore durante la richiesta di informazioni sul plugin {$a->name} ({$a->component}) versione {$a->version}. L\'installazione del plugin non può proseguire. E\' possibile attivare la modalità di debug per individuare meglio la causa dell\'errore.';
$string['validation'] = 'Verifica pacchetto plugin';
$string['validationmsg_componentmatch'] = 'Nome plugin';
$string['validationmsg_componentmismatchname'] = 'Discrepanza sul nome del plugin';
$string['validationmsg_componentmismatchname_help'] = 'Alcuni pacchetti ZIP, come ad esempio i pacchetti generati da Github, possono contenere nomi errati della cartella radice. E\' necessario correggere il nome della cartella radice rendendolo coincidente con il nome dichiarato del plugin.';
$string['validationmsg_componentmismatchname_info'] = 'Il plugin dichiara il nome di \'{$a}\', ma questo nome non coincide con il nome della cartella radice';
$string['validationmsg_componentmismatchtype'] = 'Discrepanza sul tipo di plugin';
$string['validationmsg_componentmismatchtype_info'] = 'Hai selezionato il tipo  \'{$a->expected}\' ma il plugin dichiara di essere di tipo \'{$a->found}\'.';
$string['validationmsg_filenotexists'] = 'I file estratti non sono stati trovati';
$string['validationmsg_filesnumber'] = 'Nel pacchetto non è presente un numero sufficiente di file';
$string['validationmsg_filestatus'] = 'Non è possibile estrarre tutti i file';
$string['validationmsg_filestatus_info'] = 'Il tentativo di estrarre il file {$a->file} ha generato l\'errore \'{$a->status}\'.';
$string['validationmsglevel_debug'] = 'Debug';
$string['validationmsglevel_error'] = 'Errore';
$string['validationmsglevel_info'] = 'OK';
$string['validationmsglevel_warning'] = 'Attenzione';
$string['validationmsg_maturity'] = 'Maturity level dichiarato';
$string['validationmsg_maturity_help'] = 'Il plugin può dichiarare il proprio maturity level. Se il maintainer ritiene il plugin stabile, il maturity level sarà MATURITY_STABLE. Tutti gli altri maturity level dichiarati (ad esempio, alpha o beta)  saranno considerati non stabili e sarà visualizzato un avviso.';
$string['validationmsg_missingexpectedlangenfile'] = 'Discrepanza sul nome del file della lingua ingelse';
$string['validationmsg_missingexpectedlangenfile_info'] = 'Il plugin deve fornire il file {$a} per la lingua inglese.';
$string['validationmsg_missinglangenfile'] = 'Non è stato trovato il file di lingua inglese';
$string['validationmsg_missinglangenfolder'] = 'La cartella della lingua inglese non è presente';
$string['validationmsg_missingversion'] = 'Il plugin non dichiara la propria versione';
$string['validationmsg_missingversionphp'] = 'Il file version.php non è stato trovato';
$string['validationmsg_multiplelangenfiles'] = 'Sono stati trovati più file della lingua inglese.';
$string['validationmsg_onedir'] = 'Il pacchetto ZIP ha una struttura non valida.';
$string['validationmsg_onedir_help'] = 'Il pacchetto ZIP deve contenere solo una cartella radice con il codice del plugin. Il nome della cartella radice deve coincidere con il nome del plugin.';
$string['validationmsg_pathwritable'] = 'Verifica permessi scrittura';
$string['validationmsg_pluginversion'] = 'Versione plugin';
$string['validationmsg_release'] = 'Release plugin';
$string['validationmsg_requiresmoodle'] = 'Versione Moodle richiesta';
$string['validationmsg_rootdir'] = 'Nome del plugin da installare';
$string['validationmsg_rootdir_help'] = 'Il nome della cartella radice contenuta nel pacchetto ZIP costituisce il nome del plugin da installare. Se il nome è errato, prima di installare il plugin è possibile rinominare il nome della cartella radice all\'interno del pacchetto .';
$string['validationmsg_rootdirinvalid'] = 'Nome del plugin non valido';
$string['validationmsg_rootdirinvalid_help'] = 'Il nome della cartella radice contenuta nel pacchetto ZIP viola i requisiti sintattici formali. Alcuni pacchetti ZIP, come ad esempio i pacchetti generati da Github, possono contenere nomi errati della cartella radice. E\' necessario correggere il nome della cartella radice rendendolo coincidente con il nome del plugin.';
$string['validationmsg_targetexists'] = 'La cartella di destinazione è già esistente';
$string['validationmsg_targetexists_help'] = 'La cartella dove installare in plugin non deve esistere.';
$string['validationmsg_unknowntype'] = 'Tipo plugin sconosciuto';
$string['validationresult0'] = 'La verifica è fallita!';
$string['validationresult0_help'] = 'Sono stati rilevati problemi gravi. Installare il plugin non è sicuro. Per maggiori informazioni controllare il log dei messaggi della verifica';
$string['validationresult1'] = 'Verifica completata correttamente!';
$string['validationresult1_help'] = 'Il plugin è stato verificato e non sono stati rilevati problemi gravi.';
$string['validationresultinfo'] = 'Info';
$string['validationresultmsg'] = 'Messaggio';
$string['validationresultstatus'] = 'Stato';
