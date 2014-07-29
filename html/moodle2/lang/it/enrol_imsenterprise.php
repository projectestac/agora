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
 * Strings for component 'enrol_imsenterprise', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_imsenterprise
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aftersaving...'] = 'Dopo aver salvato le impostazioni, puoi';
$string['allowunenrol'] = 'I dati IMS possono <strong>disiscrivere</strong> gli studenti/docenti';
$string['allowunenrol_desc'] = 'Consente di rimuovere le iscrizione dai corsi quando se specificato nel file IMS Enterprise';
$string['basicsettings'] = 'Impostazioni di base';
$string['coursesettings'] = 'Opzioni del corso';
$string['createnewcategories'] = 'Crea nuove categorie (nascoste) di corsi se non presenti in Moodle';
$string['createnewcategories_desc'] = 'Se l\'elemento <org><orgunit> è presente nel file, il contenuto dell\'elemento sarà utilizzato per categorizzare i corsi da creare. La categorizzazione vale solo per i corsi nuovi, quelli già esistenti non saranno categorizzati nuovamente.

Se non sono presenti categorie con il nome contenuto nell\'elemento, saranno create nuove categorie nascoste.';
$string['createnewcourses'] = 'Crea nuovi corsi (nascosti) se non presenti in Moodle';
$string['createnewcourses_desc'] = 'L\'impostazione consente la creazione di nuovi corsi se nel file IMS Enterprise sono presenti corsi non ancora creati in Moodle. Tutti i nuovi corsi creati saranno nascosti.';
$string['createnewusers'] = 'Crea nuovi account per gli utenti non presenti in Moodle';
$string['createnewusers_desc'] = 'I dati di iscrizione IMS Enterprise definiscono insiemi di utenti e consentono di creare account per gli utenti non presenti nel database di Moodle.

Gli utenti vengono cercati prima tramite il codice identificativo poi in base allo username. Le password non vengono importate, pertanto si suggerisce di affiancare l\'iscrizione con un plugin di autenticazione.';
$string['cronfrequency'] = 'Frequenza di attivazione';
$string['deleteusers'] = 'Elimina gli account se è specificato nei dati IMS';
$string['deleteusers_desc'] = 'L\'impostazione consente l\'eliminazione di account utente se specificato nel file IMS (recstatus deve essere impostato a 3, che significa eliminazione di un account). Per default l\'account non viene fisicamente eliminato dalla tabella degli utenti di Moodle ma solo contrassegnato come eliminato.';
$string['doitnow'] = 'esegui un\'importazione IMS Enterprise immediatamente';
$string['emptyattribute'] = 'Lascia vuoto';
$string['filelockedmail'] = 'Il processo cron non riesce ad eliminare il file ({$a}) usato per le iscrizioni IMS Enterprise. L\'errore in genre indica che i permessi non sono corretti. Controllare e impostare correttamente i permessi per consentire a Moodle di eliminare il file, che altrimenti verrà elaborato ripetutamente.';
$string['filelockedmailsubject'] = 'Errore grave: File di iscrizione';
$string['fixcasepersonalnames'] = 'Cambia i nomi propri in Maiuscolo/minuscolo';
$string['fixcaseusernames'] = 'Cambia gli username in minuscolo';
$string['ignore'] = 'Ignora';
$string['importimsfile'] = 'Importa file IMS Enterprise';
$string['imsrolesdescription'] = 'Le specifiche "IMS Enterprise" comprendono 8 tipi di ruoli. Scegli come vuoi mapparli in Moodle, includendo anche quelli che dovranno essere tralasciati.';
$string['location'] = 'Percorso del file';
$string['logtolocation'] = 'Percorso del file di log (lasciare bianco per nessun log)';
$string['mailadmins'] = 'Avvisa l\'amministratore per email';
$string['mailusers'] = 'Avvisa gli utenti per email';
$string['messageprovider:imsenterprise_enrolment'] = 'Messaggi di iscrizione IMS Enterprise';
$string['miscsettings'] = 'Miscellanea';
$string['pluginname'] = 'File IMS Enterprise';
$string['pluginname_desc'] = 'Il plugin di iscrizione IMS Enterprise controlla ripetutamente la presenza di un file di testo in un dato percorso. Il file deve seguire le specifiche IMS Enterprise e contenere gli elementi XML relativi a persone, gruppi e appartenenza. ';
$string['processphoto'] = 'Aggiungi una foto al profilo';
$string['processphotowarning'] = 'ATTENZIONE: lavorare un\'immagine potrebbe aggravare il lavoro del server. Si raccomanda di NON attivare questa opzione se è previsto un elevato numero di utenti.';
$string['restricttarget'] = 'Elabora i dati solo se destinati al sistema specificato';
$string['restricttarget_desc'] = 'Un file di dati IMS Enterprise può essere usato per i diversi LMS e i diversi sistemi presenti nelle organizzazioni. E\' possibile indicare per quale sistema è destinato il file fornendone il nome nel tag <target> presente all\'interno del tag <properties>.

In generale non è necessario fornire questo valore, lasciandolo vuoto Moodle elaborerà comunque il file. In alternativa, è possibile specificare il nome esatto all\'interno del tag <target>.';
$string['roles'] = 'Ruoli';
$string['settingfullname'] = 'Tag di descrizione IMS per il titolo del corso';
$string['settingfullnamedescription'] = 'Il titolo del corso è un capo obbligatorio, è necessario definire il tag di descrizione nel file IMS Enterprise';
$string['settingshortname'] = 'Tag di descrizione IMS per il titolo abbreviato del corso';
$string['settingshortnamedescription'] = 'Il titolo abbreviato del corso è un capo obbligatorio, è necessario definire il tag di descrizione nel file IMS Enterprise';
$string['settingsummary'] = 'Tag di descrizione IMS per la descrizione del corso';
$string['settingsummarydescription'] = 'Il campo è opzionale, è possibile non utilizzarlo selezionando \'Lascia vuoto\'';
$string['sourcedidfallback'] = 'Utilizza il campo &quot;sourcedid&quot; come userid di una persona se il campo &quot;userid&quot; non è presente';
$string['sourcedidfallback_desc'] = 'Nei file IMS  il campo <sourcedid> rappresenta il codice ID permanente della persona in uso nel sistema da dove provengono i dati.
Il campo <userid> è un campo separato che contiene il codice ID usato dagli utenti per autenticarsi. Spesso i due valori coincidono, in altri casi no.

Alcuni student information system non forniscono il campo <userid>, nel qual caso è opportuno abilitare questa impostazione per usare <sourcedid> come userid di Moodle.';
$string['truncatecoursecodes'] = 'Tronca i codici dei corsi a questa lunghezza';
$string['truncatecoursecodes_desc'] = 'In alcuni casi si potrebbe desiderare di troncare ad una certa lunghezza i codici corso prima di elaborarli. E\' possibile specificare il numero di caratteri da utilizzare prima del troncamento. Lasciando il campo in bianco i codici corso non saranno troncati.';
$string['usecapitafix'] = 'Seleziona questa opzione se usi "Capita" (il formato XML generato da questo sistema è impreciso)';
$string['usecapitafix_desc'] = 'Lo student data system di Capita produce un XML con delle imprecisioni. Se usi Capita, è bene abilitare questa impostazione.';
$string['usersettings'] = 'Opzioni utente';
$string['zeroisnotruncation'] = '0 indica nessun troncamento';
