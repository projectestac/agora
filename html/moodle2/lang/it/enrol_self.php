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
 * Strings for component 'enrol_self', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_self
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['canntenrol'] = 'Iscrizione disabilitata o non attiva';
$string['cohortnonmemberinfo'] = 'Possono iscriversi spontaneamente solo gli appartenenti al gruppo globale \'{$a}\'';
$string['cohortonly'] = 'Gruppo globale';
$string['cohortonly_help'] = 'L\'iscrizione spontanea può essere limitata agli  appartenenti ad un determinato gruppo globale. Da notare che modificare questa impostazione non altera le iscrizioni già esistenti.';
$string['customwelcomemessage'] = 'Messaggio di benvenuto personalizzato';
$string['customwelcomemessage_help'] = 'E\' possibile inserire un messaggio personalizzato di benvenuto, sia in formato testo semplice sia in formato Moodle, dove includere tag HTML e tag multi lingua.

E\' anche possibile utilizzare i seguenti segnaposto:

* Titolo del corso {$a->coursename} * Link al profilo dell\'utente {$a->profileurl}';
$string['defaultrole'] = 'Ruolo di default';
$string['defaultrole_desc'] = 'Il ruolo di default da assegnare in caso di iscrizioni spontanee.';
$string['enrolenddate'] = 'Data di fine';
$string['enrolenddate_help'] = 'Gli utenti potranno iscriversi solo entro la data impostata.';
$string['enrolenddaterror'] = 'La data di fine delle iscrizioni non può essere antecedente la data di inizio';
$string['enrolme'] = 'Iscrivimi';
$string['enrolperiod'] = 'Durata dell\'iscrizione';
$string['enrolperiod_desc'] = 'La durata di default dell\'iscrizione. Impostarla a zero per una durata di default dell\'iscrizione senza limite.';
$string['enrolperiod_help'] = 'La durata di default  dell\'iscrizione, a partire dalla data di iscrizione dell\'utente. Disabilitare l\'impostazione per una durata di default dell\'iscrizione senza limite.';
$string['enrolstartdate'] = 'Data di inizio';
$string['enrolstartdate_help'] = 'Consente l\'iscrizione degli utenti solo a partire dalla data impostata.';
$string['expiredaction'] = 'Azione alla scadenza dell\'iscrizione';
$string['expiredaction_help'] = 'L\'azione da compiere quando scade l\'iscrizione di un partecipante. Da notare che alcuni dati verranno eliminati per effetto della disiscrizione.';
$string['expirymessageenrolledbody'] = 'Gentile {$a->user},

ti informiamo che la tua iscrizione al corso \'{$a->course}\' scadrà il {$a->timeend}.

Se hai bisogno di assistenza, per favore contatta {$a->enroller}.';
$string['expirymessageenrolledsubject'] = 'Notifica scadenza iscrizione spontanea';
$string['expirymessageenrollerbody'] = 'L\'iscrizione spontanea al corso \'{$a->course}\'  scadrà entro {$a->threshold} per i seguenti utenti:

{$a->users}

Per prorogare l\'iscrizione, recati su $a->extendurl}';
$string['expirymessageenrollersubject'] = 'Notifica scadenza iscrizione spontanea';
$string['groupkey'] = 'Utilizza chiavi di iscrizione ai gruppi';
$string['groupkey_desc'] = 'Utilizza per default le chiavi di iscrizione ai gruppi';
$string['groupkey_help'] = 'Oltre alla chiave di accesso al corso, è possibile usare chiavi di iscrizione ai gruppi per regolare sia l\'accesso al corso sia l\'inserimento automatico dell\'utente in un gruppo.

Nota: per usare una chiave di iscrizione al gruppo è necessario specificare sia la chiave di accesso al corso sia la chiave di iscrizione al gruppo.';
$string['longtimenosee'] = 'Disiscrivi utenti non attivi dopo';
$string['longtimenosee_help'] = 'Consente di disiscvievre automaticamente quegli utenti che non abbiamo svolto attività per il numero di giorni impostato.';
$string['maxenrolled'] = 'Numero max. di iscrizioni';
$string['maxenrolled_help'] = 'Il numero massimo di utenti che potranno iscriversi al corso. Usare 0 per non avere limiti.';
$string['maxenrolledreached'] = 'E\' stato già raggiunto il numero massimo di iscrizioni.';
$string['messageprovider:expiry_notification'] = 'Notifica scadenza iscrizione spontanea';
$string['newenrols'] = 'Consenti nuove iscrizioni';
$string['newenrols_desc'] = 'Per default gli utenti possono iscriversi ai corsi spontaneamente';
$string['newenrols_help'] = 'L\'impostazione stabilisce se un utente può iscriversi spontaneamente al corso.';
$string['nopassword'] = 'Non è necessaria una chiave di iscrizione';
$string['password'] = 'Chiave di iscrizione';
$string['password_help'] = 'Una chiave di accesso consente di regolare l\'iscrizione al corso consentendola ai soli utenti che ne sono in possesso.

Lasciando il campo vuoto, qualsiasi utente autenticato potrà iscriversi spontaneamente al corso.

Se viene specificata una chiave, agli utenti verrà chiesto di inserirla per perfezionare l\'iscrizione. La chiave verrà chiesta solo al primo accesso al corso.';
$string['passwordinvalid'] = 'Chiave errata, per favore riprova';
$string['passwordinvalidhint'] = 'La chiave di accesso è errata, per favore riprova.<br /> (Suggerimento: la chiave comincia con \'{$a}\')';
$string['pluginname'] = 'Iscrizione spontanea';
$string['pluginname_desc'] = 'L\'iscrizione spontanea consente agli utenti di decidere a quali corsi iscriversi. E\' possibile regolare le iscrizioni spontanee tramite chiavi di accesso. L\'iscrizione spontanea per funzionare ha bisogno del plugin Iscrizioni manuali, che deve essere abilitato nel medesimo corso. ';
$string['requirepassword'] = 'Chiave di accesso obbligatoria';
$string['requirepassword_desc'] = 'Rende obbligatoria la chiave di accesso nei nuovi corsi ed evita l\'eliminazione di chiavi d\'accesso già esistenti.';
$string['role'] = 'Ruolo assegnato per default';
$string['self:config'] = 'Configurare istanze plugin Iscrizione spontanea';
$string['self:manage'] = 'Gestire utenti iscritti';
$string['self:unenrol'] = 'Disiscrivere utenti dai corsi';
$string['self:unenrolself'] = 'Disiscriversi dai corsi';
$string['sendcoursewelcomemessage'] = 'Invia messaggio di benvenuto al corso';
$string['sendcoursewelcomemessage_help'] = 'Se abilitato, gli utenti che si iscrivono spontaneamente in un corso riceveranno per email un messaggio di benvenuto.';
$string['showhint'] = 'Visualizza suggerimento';
$string['showhint_desc'] = 'Visualizza la prima lettera della chiave d\'accesso.';
$string['status'] = 'Abilita iscrizioni già esistenti.';
$string['status_desc'] = 'Abilita il metodo di iscrizione spontanea ai corsi.';
$string['status_help'] = 'Disabilitando l\'impostazione, tutte le iscrizioni spontanee saranno sospese e non saranno consentite nuove iscrizioni.';
$string['unenrol'] = 'Cancella iscrizione utente';
$string['unenrolselfconfirm'] = 'Sei certo di volerti disiscrivere dal corso "{$a}"?';
$string['unenroluser'] = 'Sei certo di rimuovere l\'iscrizione di "{$a->user}" dal corso "{$a->course}"?';
$string['usepasswordpolicy'] = 'Utilizza regole password';
$string['usepasswordpolicy_desc'] = 'Le chiavi d\'accesso dovranno seguire le regole password.';
$string['welcometocourse'] = 'Benvenuto(a) in {$a}';
$string['welcometocoursetext'] = 'Benvenuto(a) in {$a->coursename}!

Se non lo hai già fatto, dovresti aggiornare la pagina del tuo profilo personale in modo da consentirci di conoscerti meglio:

{$a->profileurl}';
