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
 * Strings for component 'tool_uploaduser', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_uploaduser
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = 'Consenti eliminazione utenti';
$string['allowrenames'] = 'Consenti la modifica degli username';
$string['allowsuspends'] = 'Consente la sospensione e riattivazione di account.';
$string['csvdelimiter'] = 'Delimitatore CSV';
$string['defaultvalues'] = 'Valori di default';
$string['deleteerrors'] = 'Elimina errori';
$string['encoding'] = 'Codifica';
$string['errors'] = 'Errori';
$string['nochanges'] = 'Nessuna modifica';
$string['pluginname'] = 'Caricamento utenti';
$string['renameerrors'] = 'Errori nel cambiamento del nome';
$string['requiredtemplate'] = 'Obbligatorio. Si può usare il modello di sintassi (%l = lastname, %f = firstname, %u = username).';
$string['rowpreviewnum'] = 'Righe di anteprima';
$string['uploadpicture_baduserfield'] = 'L\'attributo utente specificato non è valido. Provare ancora.';
$string['uploadpicture_cannotmovezip'] = 'Un file zip non può essere spostato in una cartella temporanea.';
$string['uploadpicture_cannotprocessdir'] = 'Non è stato possibile elaborare il file zip decompresso.';
$string['uploadpicture_cannotsave'] = 'Non è stato possibile salvare l\'immagine dell\'utente {$a}. Controllate le caratteristiche dell\'immagine.';
$string['uploadpicture_cannotunzip'] = 'Non è possibile decomprimere il file zip contenente le immagini.';
$string['uploadpicture_invalidfilename'] = 'Il file immagine {$a} ha caratteri non validi nel nome. Saltato.';
$string['uploadpicture_overwrite'] = 'Sovrascrivere le immagini utente già esistenti?';
$string['uploadpictures'] = 'Importa immagini utenti';
$string['uploadpictures_help'] = '<p>Le foto degli tenti possono essere caricate come file zip di immagini. I file immagini devono essere chiamati <i>attributo-utente-scelto.estensione</i>. Per esempio, se l\'attributo utente scelto per la corrispondenza delle foto è lo username e lo username è user1234, allora il file si chiamerà user1234.jpg.</p>

<p>I tipi immagini supportati sono gif, jpg, e png.</p>

<p>Nei nomi dei file immagine è indifferente l\'uso di maiuscole o minuscole.</p>';
$string['uploadpicture_userfield'] = 'Identificativo utente da utilizzare per far corrispondere le immagini';
$string['uploadpicture_usernotfound'] = 'Utente con un valore di \'{$a->uservalue}\' per \'{$a->userfield}\' non esiste. Saltato.';
$string['uploadpicture_userskipped'] = 'Saltato utente {$a} (ha già un\'immagine).';
$string['uploadpicture_userupdated'] = 'Immagine per l\'utente {$a} caricata.';
$string['uploadusers'] = 'Importa utenti';
$string['uploadusers_help'] = 'E\' possibile caricare utenti (ed iscriverli ai corsi) tramite file di testo. Il formato del file deve avere le seguenti caratteristiche:

* Ogni riga del file contiene un record
* Il record è una serie di dati separati da virgole o altri delimitatori
La prima riga del file è speciale e contiene le intestazioni con i nomi dei campi e definisce il formato del resto del file
* I campi obbligatori sono username, password, firstname,  lastname, email';
$string['uploaduserspreview'] = 'Anteprima importazione utenti';
$string['uploadusersresult'] = 'Risultati importazione utenti';
$string['useraccountupdated'] = 'Utente aggiornato';
$string['useraccountuptodate'] = 'Utente aggiornato';
$string['userdeleted'] = 'Utente Eliminato';
$string['userrenamed'] = 'Utente rinominato';
$string['userscreated'] = 'Utenti creati';
$string['usersdeleted'] = 'Utenti eliminati';
$string['usersrenamed'] = 'Utenti rinominati';
$string['usersskipped'] = 'Utenti saltati';
$string['usersupdated'] = 'Utenti aggiornati';
$string['usersweakpassword'] = 'Utenti con password debole';
$string['uubulk'] = 'Preseleziona per azioni su elenchi';
$string['uubulkall'] = 'Tutti gli utenti';
$string['uubulknew'] = 'Nuovi utenti';
$string['uubulkupdated'] = 'Utenti modificati';
$string['uucsvline'] = 'Riga CSV';
$string['uulegacy1role'] = '(Ruolo studente originale) typeN=1';
$string['uulegacy2role'] = '(Ruolo docente originale) typeN=2';
$string['uulegacy3role'] = '(Ruolo docente non-editor originale) typeN=3';
$string['uunoemailduplicates'] = 'Evita le email duplicate';
$string['uuoptype'] = 'Modalità importazione';
$string['uuoptype_addinc'] = 'Crea tutti gli utenti, aggiungendo un numero agli username ove necessario';
$string['uuoptype_addnew'] = 'Crea solamente i nuovi utenti, ignora gli utenti già esistenti';
$string['uuoptype_addupdate'] = 'Crea i nuovi utenti ed aggiorna gli utenti già esistenti';
$string['uuoptype_update'] = 'Aggiorna solamente gli utenti già esistenti';
$string['uupasswordcron'] = 'Generato tramite cron';
$string['uupasswordnew'] = 'Password per i nuovi utenti';
$string['uupasswordold'] = 'Password per gli utenti già esistenti';
$string['uustandardusernames'] = 'Standardizza gli username';
$string['uuupdateall'] = 'Utilizza i valori contenuti nel file ed i valori di default';
$string['uuupdatefromfile'] = 'Utilizza i valori contenuti nel file';
$string['uuupdatemissing'] = 'Utilizza i valori contenuti nel file ed i valori di default se i campi sono vuoti';
$string['uuupdatetype'] = 'Impostazione campi del profilo utente';
$string['uuusernametemplate'] = 'Modello per gli username';
