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
 * Strings for component 'enrol_ldap', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Assegnazione del ruolo \'{$a->role_shortname}\' all\'utente \'{$a->user_username}\' nel corso \'{$a->course_shortname}\' (id {$a->course_id})
';
$string['assignrolefailed'] = 'Errore nell\'assegnazione del ruolo \'{$a->role_shortname}\' all\'utente \'{$a->user_username}\' nel corso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['autocreate'] = '<p>I corsi possono essere creati automaticamente se in LDAP esistono iscrizioni ad un corso che non è presente in Moodle.</p><p>Se viene utilizzata la creazione automatica di corsi, si raccomanda di togliere i seguenti privilegi ai ruoli interessati, al fine di evitare modifiche indesiderate ai campi codice identificativo, titolo, titolo abbreviato e descrizione:
moodle/course:changeidnumber, moodle/course:changeshortname, moodle/course:changefullname moodle/course:changesummary.</p>';
$string['autocreate_key'] = 'Creazione automatica corsi';
$string['autocreation_settings'] = 'Impostazioni per la creazione automatica dei corsi';
$string['autoupdate_settings'] = 'Impostazioni aggiornamento automatico corsi';
$string['autoupdate_settings_desc'] = '<p>Selezionare il campi da aggiornare durante l\'elaborazione dello script di sincronizzazione (enrol/ldap/cli/sync.php).</p><p>L\'aggiornamento avrà luogo selezionando almeno un campo.</p>';
$string['bind_dn'] = 'Distinguished Name (dn) dell\'utente bind da utilizzare, ad esempio \'cn=ldapuser,ou=public,o=org\'';
$string['bind_dn_key'] = 'Distinguished name utente bind';
$string['bind_pw'] = 'Password per l\'utente bind';
$string['bind_pw_key'] = 'Password';
$string['bind_settings'] = 'Impostazioni bind';
$string['cannotcreatecourse'] = 'Non è possibile creare il corso: mancano dati obbligatori nel record LDAP!';
$string['cannotupdatecourse'] = 'Non è possibile aggiornare il corso: manca una dato obbligatorio nel record LDAP!
Codice identificativo del corso: \'{$a->idnumber}\'';
$string['cannotupdatecourse_duplicateshortname'] = 'Non è possibile aggiornare il corso: Titolo abbreviato duplicato. Il corso con codice identificativo \'{$a->idnumber}\' è stato saltato...';
$string['category'] = 'Categoria dove aggiungere i corsi creati automaticamente';
$string['category_key'] = 'Categoria';
$string['contexts'] = 'Contesti LDAP';
$string['couldnotfinduser'] = 'Non è stato possibile trovare l\'utente \'{$a}\', dati ignorati.';
$string['course_fullname'] = 'Opzionale: atributo LDAP che contiene il titolo del corso.';
$string['course_fullname_key'] = 'Titolo';
$string['course_fullname_updateonsync'] = 'Aggiorna il titolo tramite script di sincronizzazione';
$string['course_fullname_updateonsync_key'] = 'Aggiorna titolo';
$string['course_idnumber'] = 'Attributo LDAP che contiene il codice identificativo del corso, ad esmepio \'cn\' o \'uid\'.';
$string['course_idnumber_key'] = 'Codice identificativo';
$string['coursenotexistskip'] = 'Il corso \'{$a}\'  non esiste e la creazione automatica è disabilitata; dati ignorati.';
$string['course_search_sub'] = 'Cerca l\'appartenenza al gruppo anche nei sotto contesti.';
$string['course_search_sub_key'] = 'Cerca nei sotto contesti';
$string['course_settings'] = 'Impostazioni iscrizione corsi';
$string['course_shortname'] = 'Opzionale: attributo LDAP che contiene il titolo abbreviato del corso.';
$string['course_shortname_key'] = 'Titolo abbreviato';
$string['course_shortname_updateonsync'] = 'Aggiorna il titolo abbreviato tramite script di sincronizzazione';
$string['course_shortname_updateonsync_key'] = 'Aggiorna titolo abbreviato';
$string['course_summary'] = 'Opzionale: attributo LDAP che contiene la descrizione del corso.';
$string['course_summary_key'] = 'Descrizione';
$string['course_summary_updateonsync'] = 'Aggiorna la descrizione tramite script di sincronizzazione';
$string['course_summary_updateonsync_key'] = 'Aggiorna descrizione';
$string['courseupdated'] = 'Il corso con codice identificativo  \'{$a->idnumber}\' è stato aggiornato correttamente.';
$string['courseupdateskipped'] = 'Il corso con codice identificativo  \'{$a->idnumber}\' non richiede aggiornamento. Saltato...';
$string['createcourseextid'] = 'L\'utente CREATE è iscritto ad un corso che non esiste \'{$a->courseextid}\'';
$string['createnotcourseextid'] = 'L\'utente è iscritto ad un corso che non esiste \'{$a->courseextid}\'';
$string['creatingcourse'] = 'Creazione del corso \'{$a}\'...';
$string['duplicateshortname'] = 'La creazione del corso non è riuscita. Titolo abbreviato duplicato. Il corso con codice identificativo \'{$a->idnumber}\' è stato saltato...';
$string['editlock'] = 'Blocca valore';
$string['emptyenrolment'] = 'Iscrizione vuota per il ruolo Empty enrolment for role \'{$a->role_shortname}\' nel corso \'{$a->course_shortname}\'{$a->course_id})';
$string['enrolname'] = 'LDAP';
$string['enroluser'] = 'Iscrizione dell\'utente \'{$a->user_username}\' nel corso  \'{$a->course_shortname}\' (id {$a->course_id})';
$string['enroluserenable'] = 'Abilitazione dell\'iscrizione dell\'utente \'{$a->user_username}\' nel corso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['explodegroupusertypenotsupported'] = 'La funzione ldap_explode_group() non supporta il tipo di utente scelto: {$a}';
$string['extcourseidinvalid'] = 'L\'id esterna del corso non è valida!';
$string['extremovedsuspend'] = 'Iscrizione disabilitata per l\'utente {$a->user_username}\' nel corso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['extremovedsuspendnoroles'] = 'Iscrizione disabilitata e ruolo rimosso per l\'utente {$a->user_username}\' nel corso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['extremovedunenrol'] = 'Disiscrizione utente \'{$a->user_username}\' dal corso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['failed'] = 'Errore!';
$string['general_options'] = 'Opzioni generali';
$string['group_memberofattribute'] = 'Nome dell\'attributo che specifica i gruppi di appartenenza degli utenti, ad esempio memberOf, groupMembership, eccetera. ';
$string['group_memberofattribute_key'] = 'Attributo \'Member of\'';
$string['host_url'] = 'URL dell\'Host LDAP (es. \'ldap://ldap.miosito.com/\' oppure \'ldaps://ldap.miosito.com/\')';
$string['host_url_key'] = 'Host URL';
$string['idnumber_attribute'] = 'Se l\'appartenenza al gruppo contiene distinguised name, specificare lo stesso attributo configurato nella mappatura dati del plugin di autenticazione LDAP';
$string['idnumber_attribute_key'] = 'Attributo Codice identificativo';
$string['ldap_encoding'] = 'Indicare la codifica utilizzata da LDAP. Spesso la codifica è UTF-8, MS AD usa codifiche di default come cp1252, cp1250, eccetera.';
$string['ldap_encoding_key'] = 'Codifica LDAP';
$string['ldap:manage'] = 'Gestire istanze iscrizione LDAP';
$string['memberattribute'] = 'Identificativo univoco  LDAP degli utenti';
$string['memberattribute_isdn'] = 'Se l\'appartenenza al gruppo contiene distinguised name, specificarlo qui e configurare anche le altre impostazioni di questa sezione.';
$string['memberattribute_isdn_key'] = 'L\'attributo member usa dn';
$string['nested_groups'] = 'Per l\'iscrizione desideri utilizzare gruppi nidificati (gruppi di gruppi)?';
$string['nested_groups_key'] = 'Gruppi nidificati';
$string['nested_groups_settings'] = 'Impostazioni gruppi nidificati';
$string['nosuchrole'] = 'Questo ruolo non esiste: \'{$a}\'';
$string['objectclass'] = 'L\'objectClass LDAP utilizzata per cercare i corsi, ad esempio \'group\' o \'posixGroup\'.';
$string['objectclass_key'] = 'Object class';
$string['ok'] = 'OK!';
$string['opt_deref'] = 'Se l\'appartenenza al gruppo contiene distinguised name, specificare come gestire gli alias durante la ricerca. E\' possibile selezionar euno dei seguenti valori: \'No\' (LDAP_DEREF_NEVER) oppure \'Si\' (LDAP_DEREF_ALWAYS)';
$string['opt_deref_key'] = 'Dereference alias';
$string['phpldap_noextension'] = '<em>Il modulo PHP LDAP non sembra essere presente. Per usare questo plugin per favore accertati che il modulo sia installato ed abilitato.</em>';
$string['pluginname'] = 'Iscrizioni LDAP';
$string['pluginname_desc'] = '<p>E\' possibile usare un server LDAP per gestire le iscrizioni ai corsi. Per funzionare l\'albero LDAP deve contenere i gruppi corrispondenti ai corsi e all\'interno di ciascun gruppo devono essere elencati gli utenti da iscrivere.</p>
<p>All\'interno dei gruppi LDAP, ciascuno dei quali rappresenta un corso,  gli utenti da iscrivere saranno elencati tramite un campo contenente l\'identificativo univoco dell\'utente (es. <em>member</em> o <em>memberUid</em>).</p>
<p>Per poter utilizzare le iscrizioni LDAP gli utenti <strong>devono</strong>
avere un campo \'idnumber\' valido. I gruppi LDAP devono avere questo idnumber nei campi <em>member</em> per gli utenti da iscrivere.</p>
<p>Questo metodo di iscrizione ai corsi darà i migliori risultati se utilizzato in abbinamento all\'autenticazione LDAP.</p>
<p>Le iscrizioni ai corsi in Moodle verranno aggiornate durante l\'autenticazione degli utenti. E\' anche possibile eseguire  uno script per tenere le iscrizioni ai corsi sincronizzate tra Moodle e LDAP. Maggiori informazioni in
<em>enrol/ldap/cli/enrol_ldap_sync.php</em>.</p>
<p>Questo plugin può anche creare  automaticamente nuovi corsi in presenza di nuovi gruppi in LDAP.</p>';
$string['pluginnotenabled'] = 'Il plugin non è abilitato!';
$string['role_mapping'] = '<p>Per ciascun ruolo che desideri assegnare tramite LDAP, devi specificare l\'elenco dei contesti dove si trovano i gruppi di corsi. Puoi separare contesti diversi con \';\'.</p><p>Devi anche specificare l\'attributo LDAP contenente i membri del gruppo, ad esempio \'member\' oppure \'memberUid\'</p>';
$string['role_mapping_attribute'] = 'Attributo LDAP member per {$a}';
$string['role_mapping_context'] = 'Contesti LDAP per {$a}';
$string['role_mapping_key'] = 'Mappa ruoli da LDAP';
$string['roles'] = 'Mappatura ruoli';
$string['server_settings'] = 'Impostazioni server LDAP';
$string['synccourserole'] = '== Sincronizzazione del corso \'{$a->idnumber}\' per il ruolo \'{$a->role_shortname}\'';
$string['template'] = 'Opzionale: i corsi creati automaticamente possono ereditare le impostazioni da un corso modello. Inserisci qui il titolo del corso da usare come modello.';
$string['template_key'] = 'Modello';
$string['unassignrole'] = 'Rimozione del ruolo {$a->role_shortname}\' dell\'utente user \'{$a->user_username}\' nel corso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['unassignrolefailed'] = 'Errore nella rimozione del ruolo {$a->role_shortname}\' dell\'utente user \'{$a->user_username}\' nel corso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['unassignroleid'] = 'Rimozione del ruolo id \'{$a->role_id}\' dello user id \'{$a->user_id}\'';
$string['updatelocal'] = 'Aggiorna dati locali';
$string['user_attribute'] = 'Se l\'appartenenza al gruppo contiene "distinguished names", specificare l\'attributo utilizzato per nominare/cercare l\'utente. Se è configurata anche anche l\'autenticazione LDAP, questo valore deve corrispondere all\'attributo \'Codice identificativo\' configurato nella mappatura dati del plugin di autenticazione LDAP';
$string['user_attribute_key'] = 'Attributo ID Number';
$string['user_contexts'] = 'Se l\'appartenenza al gruppo contiene distinguised name, specificare l\'elenco dei contesti dove si trovano gli utenti. Separare contesti diversi con \';\'. Ad esempio: \'ou=users,o=org; ou=others,o=org\'';
$string['user_contexts_key'] = 'Contesti';
$string['user_search_sub'] = 'Se l\'appartenenza al gruppo contiene distinguised name, specificare se ricercare gli utenti anche nei sotto contesti.';
$string['user_search_sub_key'] = 'Cerca nei sottocontesti';
$string['user_settings'] = 'Impostazioni ricerca utente';
$string['user_type'] = 'Se l\'appartenenza al gruppo contiene distinguised name, specificare come sono memorizzati gli utenti in LDAP.';
$string['user_type_key'] = 'Tipo utente';
$string['version'] = 'Versione del protocollo LDAP da utilizzare';
$string['version_key'] = 'Versione';
