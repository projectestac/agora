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
 * Strings for component 'role', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   role
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addinganewrole'] = 'Aggiungi un ruolo';
$string['addingrolebycopying'] = 'Aggiungi un ruolo basato su {$a}';
$string['addrole'] = 'Aggiungi un ruolo';
$string['advancedoverride'] = 'Modifica avanzata ruolo';
$string['allow'] = 'Consenti';
$string['allowassign'] = 'Autorizzati ad assegnare ruoli';
$string['allowed'] = 'Consentito';
$string['allowoverride'] = 'Autorizzati a modificare ruoli';
$string['allowroletoassign'] = 'Consenti agli utenti con il ruolo {$a->fromrole} di assegnare il ruolo {$a->targetrole}';
$string['allowroletooverride'] = 'Consenti agli utenti con il ruolo {$a->fromrole} di modificare il ruolo {$a->targetrole}';
$string['allowroletoswitch'] = 'Consenti agli utenti con il ruolo {$a->fromrole} di cambiare il ruolo in {$a->targetrole}';
$string['allowswitch'] = 'Autorizzati a cambiare ruolo';
$string['allsiteusers'] = 'Tutti gli utenti del sito';
$string['archetype'] = 'Ruolo archetipo';
$string['archetypecoursecreator'] = 'ARCHETIPO: Creatore di corsi';
$string['archetypeeditingteacher'] = 'ARCHETIPO: Docente (editor)';
$string['archetypefrontpage'] = 'ARCHETIPO: Utente autenticato nella home page';
$string['archetypeguest'] = 'ARCHETIPO: Ospite';
$string['archetype_help'] = 'Il ruolo archetipo determina i privilegi quando si effettua il reset di un ruolo e quando vengono aggiunti privilegi ad un ruolo durante gli aggiornamenti del sito.';
$string['archetypemanager'] = 'ARCHETIPO: Manager';
$string['archetypestudent'] = 'ARCHETIPO: Studente';
$string['archetypeteacher'] = 'ARCHETIPO: Docente (non editor)';
$string['archetypeuser'] = 'ARCHETIPO: Utente autenticato';
$string['assignanotherrole'] = 'Assegna un altro ruolo';
$string['assignedroles'] = 'Ruoli assegnati';
$string['assignerror'] = 'Errore nell\'assegnazione del ruolo {$a->role} all\'utente {$a->user}.';
$string['assignglobalroles'] = 'Ruoli globali';
$string['assignmentcontext'] = 'Contesto di assegnazione';
$string['assignmentoptions'] = 'Opzioni di assegnazione';
$string['assignrole'] = 'Assegna ruolo';
$string['assignrolenameincontext'] = 'Assegna ruolo \'{$a->role}\' in {$a->context}';
$string['assignroles'] = 'Ruoli';
$string['assignroles_help'] = 'Assegnando un ruolo ad un utente in uno dato contesto, l\'utente riceverà tutti i privilegi previsti dal ruolo nel contesto di assegnazione ed in tutti i contesti sottostanti.
Ad esempio, assegnando ad un utente il ruolo studente in un corso, l\'utente avrà tale ruolo nel corso, in tutti  blocchi ed in tutte le attività appartenenti al medesimo corso.';
$string['assignrolesin'] = 'Assegna ruoli nel contesto \'{$a}\'';
$string['assignrolesrelativetothisuser'] = 'Assegna ruoli relativi a questo utente';
$string['backtoallroles'] = 'Torna all\'elenco di tutti i ruoli';
$string['backup:anonymise'] = 'Rendere anonimi i dati utente nei backup';
$string['backup:backupactivity'] = 'Eseguire backup di attività';
$string['backup:backupcourse'] = 'Eseguire backup di corsi';
$string['backup:backupsection'] = 'Eseguire backup di sezioni';
$string['backup:backuptargethub'] = 'Eseguire backup per hub';
$string['backup:backuptargetimport'] = 'Eseguire backup per importare';
$string['backup:configure'] = 'Configurare opzioni di backup';
$string['backup:downloadfile'] = 'Scaricare file dalle aree di backup';
$string['backup:userinfo'] = 'Eseguire backup dei dati utente';
$string['block:edit'] = 'Modificare le impostazioni dei blocco';
$string['block:view'] = 'Visualizza blocco';
$string['blog:associatecourse'] = 'Associare interventi blog ai corsi';
$string['blog:associatemodule'] = 'Associare interventi blog ai moduli di attività';
$string['blog:create'] = 'Creare nuovi interventi nei blog';
$string['blog:manageentries'] = 'Modificare e gestire interventi nei blog';
$string['blog:manageexternal'] = 'Modificare e gestire blog esterni';
$string['blog:manageofficialtags'] = 'Gestire tag ufficiali';
$string['blog:managepersonaltags'] = 'Gestire tag personali';
$string['blog:search'] = 'Modificare e gestire interventi nei blog';
$string['blog:view'] = 'Visualizzare interventi nei blog';
$string['blog:viewdrafts'] = 'Visualizzare le bozze degli interventi dei blog';
$string['calendar:manageentries'] = 'Gestire qualsiasi evento nel calendario';
$string['calendar:managegroupentries'] = 'Gestire eventi di gruppo nel calendario';
$string['calendar:manageownentries'] = 'Gestire eventi personali nel calendario';
$string['capabilities'] = 'Privilegi';
$string['capability'] = 'Privilegio';
$string['category:create'] = 'Creare categorie';
$string['category:delete'] = 'Eliminare categorie';
$string['category:manage'] = 'Gestire categorie';
$string['category:update'] = 'Modificare categorie';
$string['category:viewhiddencategories'] = 'Visualizzare categorie nascoste';
$string['category:visibility'] = 'Visualizzare categorie nascoste';
$string['checkglobalpermissions'] = 'Verifica autorizzazioni';
$string['checkpermissions'] = 'Verifica autorizzazioni';
$string['checkpermissionsin'] = 'Verifica autorizzazioni nel contesto \'{$a}\'';
$string['checksystempermissionsfor'] = 'Verifica delle autorizzazioni di sistema per {$a->fullname}';
$string['checkuserspermissionshere'] = 'Verifica delle autorizzazioni per {$a->fullname} in questo {$a->contextlevel}';
$string['chooseroletoassign'] = 'Scegli il ruolo da assegnare';
$string['cohort:assign'] = 'Aggiungere e rimuovere membri dei gruppi globali';
$string['cohort:manage'] = 'Creare, eliminare e spostare gruppi globali';
$string['cohort:view'] = 'Visualizzare gruppi globali del sito';
$string['comment:delete'] = 'Eliminare commenti';
$string['comment:post'] = 'Scrivere commenti';
$string['comment:view'] = 'Leggere commenti';
$string['community:add'] = 'Usare il Blocco community per cercare corsi negli hub';
$string['community:download'] = 'Scaricare un corso dal Blocco community';
$string['confirmaddadmin'] = 'Sei sicuro di aggiungere l\'utente <strong>{$a}</strong> tra gli amministratori del sito?';
$string['confirmdeladmin'] = 'Sei sicuro di togliere l\'utente <strong>{$a}</strong> dagli amministratori del sito?';
$string['confirmroleprevent'] = 'Sei sicuro di rimuovere il ruolo <strong>{$a->role}</strong> dall\'elenco dei ruoli che possiedono il privilegio {$a->cap} nel contesto {$a->context}?';
$string['confirmroleunprohibit'] = 'Sei sicuro di rimuovere il ruolo <strong>{$a->role}</strong> dall\'elenco dei ruoli che non possiedono il privilegio {$a->cap} nel contesto {$a->context}?';
$string['confirmunassign'] = 'Sei sicuro di togliere questo ruolo all\'utente?';
$string['confirmunassignno'] = 'Annulla';
$string['confirmunassigntitle'] = 'Conferma cambiamento di ruolo';
$string['confirmunassignyes'] = 'Rimuovi';
$string['context'] = 'Contesto';
$string['course:activityvisibility'] = 'Nascondere/visualizzare attività';
$string['course:bulkmessaging'] = 'Inviare un messaggio a più persone';
$string['course:changecategory'] = 'Cambiare la categoria del corso';
$string['course:changefullname'] = 'Cambiare il titolo del corso';
$string['course:changeidnumber'] = 'Cambiare il codice identificativo del corso';
$string['course:changeshortname'] = 'Cambiare il titolo abbreviato del corso';
$string['course:changesummary'] = 'Cambiare l\'introduzione del corso';
$string['course:create'] = 'Creare corsi';
$string['course:delete'] = 'Eliminare corsi';
$string['course:enrolconfig'] = 'Configurare istanze di plugin di iscrizione nei corsi';
$string['course:enrolreview'] = 'Rivedere le iscrizioni al corso';
$string['course:ignorefilesizelimits'] = 'Usare file di dimensioni maggiori dei limiti impostati';
$string['course:isincompletionreports'] = 'Comparire nei report di completamento';
$string['course:manageactivities'] = 'Gestire attività';
$string['course:managefiles'] = 'Gestire file';
$string['course:managegrades'] = 'Gestire valutazioni';
$string['course:managegroups'] = 'Gestire gruppi';
$string['course:managescales'] = 'Gestire scale di valutazione';
$string['course:markcomplete'] = 'Approvare manualmente il completamento del corso';
$string['course:movesections'] = 'Sposta sezioni';
$string['course:publish'] = 'Pubblicare corsi nell\'hub';
$string['course:request'] = 'Richiedere corsi';
$string['course:reset'] = 'Reset del corso';
$string['course:sectionvisibility'] = 'Gestire visibilità delle sezioni';
$string['course:setcurrentsection'] = 'Impostare sezione attiva';
$string['course:update'] = 'Modificare impostazioni del corso';
$string['course:useremail'] = 'Abilitare/disabilitare indirizzi email';
$string['course:view'] = 'Visualizzare corsi senza parteciparvi';
$string['course:viewcoursegrades'] = 'Visualizzare valutazioni del corso';
$string['course:viewhiddenactivities'] = 'Visualizzare attività nascoste';
$string['course:viewhiddencourses'] = 'Visualizzare corsi nascosti';
$string['course:viewhiddensections'] = 'Visualizzare sezioni nascoste';
$string['course:viewhiddenuserfields'] = 'Visualizzare campi utente nascosti';
$string['course:viewparticipants'] = 'Visualizzare partecipanti';
$string['course:viewscales'] = 'Visualizzare scale valutazione';
$string['course:visibility'] = 'Nascondere/visualizzare corsi';
$string['createrolebycopying'] = 'Aggiungi un ruolo basato su {$a}';
$string['createthisrole'] = 'Crea questo ruolo';
$string['currentcontext'] = 'Contesto attuale';
$string['currentrole'] = 'Ruolo';
$string['customroledescription'] = 'Descrizione personalizzata';
$string['customroledescription_help'] = 'Le descrizioni dei ruoli standard vengono automaticamente localizzate se la descrizione personalizzata è vuota.';
$string['customrolename'] = 'Nome personalizzato';
$string['customrolename_help'] = 'I nomi dei ruoli standard vengono automaticamente localizzati se il nome  personalizzato è vuoto.';
$string['defaultrole'] = 'Ruolo di default';
$string['defaultx'] = 'Default: {$a}';
$string['defineroles'] = 'Gestione ruoli';
$string['deletecourseoverrides'] = 'Cancellare tutte le modifiche di ruolo nel corso';
$string['deletelocalroles'] = 'Cancellare tutte le assegnazioni locali di ruolo';
$string['deleterolesure'] = '<p> Sei sicuro di voler cancellare "{$a->name} ({$a->shortname})"?</p><p>Attualmente questo ruolo è assegnato a {$a->count} utenti.</p>';
$string['deletexrole'] = 'Elimina il ruolo {$a}';
$string['duplicaterole'] = 'Duplica ruolo';
$string['duplicaterolesure'] = 'Sei sicuro di voler duplicare il ruolo  "<b>{$a->name} ({$a->shortname})</b>"?</p>';
$string['editingrolex'] = 'Modifica del ruolo \'{$a}\'';
$string['editrole'] = 'Modificare ruolo';
$string['editxrole'] = 'Modifica il ruolo {$a}';
$string['errorbadrolename'] = 'Nome ruolo non corretto';
$string['errorbadroleshortname'] = 'Nome abbreviato del ruolo non corretto';
$string['errorexistsrolename'] = 'Nome ruolo già esistente';
$string['errorexistsroleshortname'] = 'Nome ruolo già esistente';
$string['existingadmins'] = 'Amministratori del sito esistenti';
$string['existingusers'] = '{$a} utenti esistenti';
$string['explanation'] = 'Spiegazione';
$string['extusers'] = 'Utenti esistenti';
$string['extusersmatching'] = 'Utenti esistenti che corrispondono a \'{$a}\'';
$string['filter:manage'] = 'Gestire impostazioni locali dei filtri';
$string['frontpageuser'] = 'Utente autenticato nella pagina home';
$string['frontpageuserdescription'] = 'Tutti gli utenti autenticati nel corso home page.';
$string['globalrole'] = 'Ruolo globale';
$string['globalroleswarning'] = 'ATTENZIONE! Qualsiasi ruolo assegnato agli utenti in questa pagina, sarà un ruolo globale, ossia valido in tutto il sito, inclusa la pagina home, le categorie di corsi ed i corsi.';
$string['gotoassignroles'] = 'Vai alla assegnazione di ruoli per questo {$a->contextlevel}';
$string['gotoassignsystemroles'] = 'Vai alla assegnazione di ruoli di sistema';
$string['grade:edit'] = 'Modificare valutazioni';
$string['grade:export'] = 'Esportare valutazioni';
$string['grade:hide'] = 'Nascondere/visualizzare valutazioni o elementi';
$string['grade:import'] = 'Importare valuatzioni';
$string['grade:lock'] = 'Bloccare valutazioni o elementi';
$string['grade:manage'] = 'Gestire elementi di valutazione';
$string['grade:managegradingforms'] = 'Gestire metodi di valutazione avanzati';
$string['grade:manageletters'] = 'Gestire valutazioni letterali';
$string['grade:manageoutcomes'] = 'Gestire obiettivi di valutazione';
$string['grade:managesharedforms'] = 'Gestire modelli di valutazione avanzata';
$string['grade:override'] = 'Modificare valutazioni';
$string['grade:sharegradingforms'] = 'Condividere modelli di valutazione avanzata';
$string['grade:unlock'] = 'Sbloccare valutazioni o elementi';
$string['grade:view'] = 'Visualizzare proprie valutazioni';
$string['grade:viewall'] = 'Visualizzare valutazioni di altri utenti';
$string['grade:viewhidden'] = 'Visualizzare valutazioni nascoste per proprietario';
$string['hidden'] = 'Ruolo nascosto';
$string['highlightedcellsshowdefault'] = 'I privilegi evidenziati nella tabella sottostante sono i privilegi di default per il ruolo archetipo selezionato sopra.';
$string['highlightedcellsshowinherit'] = 'Le caselle evidenziate nella tabella sottostante indicano i privilegi ereditati (se presenti). Ad eccezione dei privilegi che desideri modificare, tutti gli altri privilegi dovrebbero essere lasciati a Eredita.';
$string['inactiveformorethan'] = 'non attivo per più di {$a->timeperiod}';
$string['ingroup'] = 'nel gruppo "{$a->group}"';
$string['inherit'] = 'Eredita';
$string['legacy:admin'] = 'RUOLO ORIGINE: Amministratore';
$string['legacy:coursecreator'] = 'RUOLO ORIGINE: Creatore corsi';
$string['legacy:editingteacher'] = 'RUOLO ORIGINE: Docente (editor)';
$string['legacy:guest'] = 'RUOLO ORIGINE: Ospite';
$string['legacy:student'] = 'RUOLO ORIGINE: Studente';
$string['legacy:teacher'] = 'RUOLO ORIGINE: Docente (non editor)';
$string['legacytype'] = 'Tipo di ruolo origine';
$string['legacy:user'] = 'RUOLO ORIGINE: Utente registrato';
$string['listallroles'] = 'Elenco di tutti i ruoli';
$string['localroles'] = 'Ruoli locali';
$string['mainadmin'] = 'Amministratore primario';
$string['mainadminset'] = 'Imposta amministratore primario';
$string['manageadmins'] = 'Gestione amministratori del sito';
$string['manager'] = 'Manager';
$string['managerdescription'] = 'I manager possono accedere ai corsi e modificarli ma in genere non vi partecipano.';
$string['manageroles'] = 'Gestione ruoli';
$string['maybeassignedin'] = 'Contesti dove questo ruolo può essere assegnato';
$string['morethan'] = 'Più di {$a}';
$string['multipleroles'] = 'Ruoli multipli';
$string['my:configsyspages'] = 'Configurare modelli di pagina My home a livello di sistema';
$string['my:manageblocks'] = 'Gestire blocchi nella pagina My home';
$string['neededroles'] = 'Ruoli autorizzati';
$string['nocapabilitiesincontext'] = 'Nessun privilegio disponibile in questo contesto';
$string['noneinthisx'] = 'Non c\'è nulla in questo {$a}';
$string['noneinthisxmatching'] = 'Non ci sono utenti corrispondenti alla ricerca \'{$a->search}\' in questo {$a->contexttype}';
$string['noroleassignments'] = 'Questo utente non ha nessun ruolo in questo sito.';
$string['noroles'] = 'Nessun ruolo';
$string['notabletoassignroleshere'] = 'In questo contesto non ci sono ruoli da assegnare';
$string['notabletooverrideroleshere'] = 'Qui non sei autorizzato a modificare i privilegi di nessun ruolo';
$string['notes:manage'] = 'Gestire note';
$string['notes:view'] = 'Visualizzare note';
$string['notset'] = 'Non impostato';
$string['overrideanotherrole'] = 'Modifica un altro ruolo';
$string['overridecontext'] = 'Modifica un contesto';
$string['overridepermissions'] = 'Modifica autorizzazioni';
$string['overridepermissionsforrole'] = 'Modifica autorizzazioni per il ruolo \'{$a->role}\' nel contesto {$a->context}';
$string['overridepermissions_help'] = '<p>
Le modifiche dei ruoli consentono di alterare i privilegi in un determinato contesto in base ad esigenze specifiche.</p>

<p>
Ad esempio, se si desidera che in un dato forum gli studenti non abbiano il privilegio di "iniziare nuove discussioni", è possibile modificare il ruolo nel contesto dell\'attività forum negando tale privilegio al ruolo Studente.
</p>

<p>
Le modifiche dei ruoli possono anche essere usate per concedere alcuni privilegi extra in aree del proprio sito o dei propri corsi: ad esempio si potrebbe desiderare che gli Studenti possano valutare i compiti di altri studenti.
</p>

<p>
L\'interfaccia per la modifica dei ruoli è simile a quella per la definizione dei ruoli ma vengono visualizzati solo i privilegi rilevanti per il contesto di riferimento. L\'interfaccia visualizza anche l\'impostazione che avrebbe il privilegio in assenza di modifiche (ossia con la impostazione  ad "Eredita").
</p>

<p>
Vedi anche
<a href="help.php?file=roles.html">Ruoli</a>,
<a href="help.php?file=contexts.html">Contesti</a>,
<a href="help.php?file=assignroles.html">Assegnazione di ruoli</a> e
<a href="help.php?file=permissions.html">Privilegi</a>.
</p>';
$string['overridepermissionsin'] = 'Modifica autorizzazioni nel contesto \'{$a}\'';
$string['overrideroles'] = 'Modifica ruoli';
$string['overriderolesin'] = 'Modifica ruoli in {$a}';
$string['overrides'] = 'Modifiche';
$string['overridesbycontext'] = 'Modifiche (per contesto)';
$string['permission'] = 'Autorizzazione';
$string['permission_help'] = 'I privilegi hanno 4 opzioni disponibili:

* Non impostato
* Consenti - Il privilegio è concesso
* Previeni - Il privilegio viene revocato, anche se già concesso in un contesto più alto
* Nega - Il privilegio non è concesso e non è possibile annullare l\'impostazione in contesti più bassi';
$string['permissions'] = 'Autorizzazioni';
$string['permissionsforuser'] = 'Autorizzazioni per l\'utente {$a}';
$string['permissionsincontext'] = 'Autorizzazioni per {$a}';
$string['portfolio:export'] = 'Esportare in un portfolio';
$string['potentialusers'] = '{$a} utenti potenziale';
$string['potusers'] = 'Utenti potenziali';
$string['potusersmatching'] = 'Utenti potenziali che corrispondono a \'{$a}\'';
$string['prevent'] = 'Previeni';
$string['prohibit'] = 'Nega';
$string['prohibitedroles'] = 'Non autorizzati';
$string['question:add'] = 'Aggiungere domande';
$string['question:config'] = 'Configurare tipi di domande';
$string['question:editall'] = 'Modificare qualsiasi domanda';
$string['question:editmine'] = 'Modificare solo le proprie domande';
$string['question:flag'] = 'Spuntare le domande mentre si sta rispondendo';
$string['question:managecategory'] = 'Gestire categorie di domande';
$string['question:moveall'] = 'Spostare qualsiasi domanda';
$string['question:movemine'] = 'Spostare solo le proprie domande';
$string['question:useall'] = 'Utilizzare qualsiasi domanda';
$string['question:usemine'] = 'Utilizzare solo le proprie domande';
$string['question:viewall'] = 'Visualizzare tutte le domande';
$string['question:viewmine'] = 'Visualizzare solo le proprie domande';
$string['rating:rate'] = 'Valutare elementi';
$string['rating:view'] = 'Visualizzare voti totali ricevuti';
$string['rating:viewall'] = 'Visualizzare voti grezzi dati da ciascuno';
$string['rating:viewany'] = 'Visualizzare voti totali ricevuti da ciascuno';
$string['resetrole'] = 'Ripristina il default';
$string['resetrolenolegacy'] = 'Annulla le autorizzazioni';
$string['resetrolesure'] = 'Sei sicuro di ripristinare i default del ruolo "{$a->name} ({$a->shortname})"?<p></p>I default saranno presi dai privilegi del tipo di ruolo origine selezionato ({$a->legacytype}).';
$string['resetrolesurenolegacy'] = 'Sei sicuro di voler azzerare tutte le autorizzazioni definite in questo ruolo  "<b>{$a->name} ({$a->shortname})</b>"?';
$string['restore:configure'] = 'Configurare opzioni di ripristino';
$string['restore:createuser'] = 'Creare utenti durante il ripristino';
$string['restore:restoreactivity'] = 'Ripristinare attività';
$string['restore:restorecourse'] = 'Ripristinare corsi';
$string['restore:restoresection'] = 'Ripristinare sezioni';
$string['restore:restoretargethub'] = 'Ripristinare da file contrassegnati come hub';
$string['restore:restoretargetimport'] = 'Ripristinare da file contrassegnati  per l\'importazione';
$string['restore:rolldates'] = 'Posticipare date di attività durante il ripristino';
$string['restore:uploadfile'] = 'Caricare file dalle aree di backup';
$string['restore:userinfo'] = 'Ripristinare dati utente';
$string['restore:viewautomatedfilearea'] = 'Ripristinare corsi da backup automatici';
$string['risks'] = 'Rischi';
$string['roleallowheader'] = 'Autorizza ruolo:';
$string['roleallowinfo'] = 'Scegli un ruolo da aggiungere all\'elenco dei ruoli autorizzati nel contesto {$a->context}, privilegio {$a->cap}:';
$string['role:assign'] = 'Assegnare ruoli agli utenti';
$string['roleassignments'] = 'Assegnazioni di ruolo';
$string['roledefinitions'] = 'Definizioni dei ruoli';
$string['rolefullname'] = 'Nome';
$string['roleincontext'] = '{$a->role} in {$a->context}';
$string['role:manage'] = 'Creare e gestire ruoli';
$string['role:override'] = 'Modificare autorizzazioni di altri utenti';
$string['roleprohibitheader'] = 'Ruolo da non autorizzare';
$string['roleprohibitinfo'] = 'Scegli un ruolo da aggiungere all\'elenco dei ruoli non autorizzati nel contesto {$a->context}, privilegio {$a->cap}:';
$string['role:review'] = 'Rivedere privilegi di altri utenti';
$string['roles'] = 'Ruoli';
$string['role:safeoverride'] = 'Modificare autorizzazioni sicure di altri utenti';
$string['roleselect'] = 'Seleziona ruolo';
$string['rolesforuser'] = 'Ruoli dell\'utente {$a}';
$string['roles_help'] = 'Un Ruolo è un insieme di privilegi definito a livello di sito. Il ruolo può essere assegnato agli utenti in specifici contesti.';
$string['roleshortname'] = 'Nome abbreviato';
$string['roleshortname_help'] = 'Il nome abbreviato del ruolo è un identificativo di base dove sono consentiti solo caratteri alfanumerici ASCII. Non cambiare i nomi abbreviati dei ruoli standard.';
$string['role:switchroles'] = 'Utilizzare altri ruoli';
$string['roletoassign'] = 'Ruolo da assegnare';
$string['roletooverride'] = 'Ruolo da modificare';
$string['safeoverridenotice'] = 'Nota: I privilegi con rischi più alti sono bloccati perché si ha solo il permesso di modificare i privilegi sicuri.';
$string['selectanotheruser'] = 'Seleziona un altro utente';
$string['selectauser'] = 'Seleziona un utente';
$string['selectrole'] = 'Scegli un ruolo';
$string['showallroles'] = 'Visualizza tutti i ruoli';
$string['showthisuserspermissions'] = 'Visualizza le autorizzazioni di questo utente';
$string['site:accessallgroups'] = 'Accedere a qualsiasi gruppo';
$string['siteadministrators'] = 'Amministratori del sito';
$string['site:approvecourse'] = 'Approvare creazione di corsi';
$string['site:backup'] = 'Effettuare backup corsi';
$string['site:config'] = 'Cambiare configurazione del sito';
$string['site:doanything'] = 'Modificare qualsiasi cosa';
$string['site:doclinks'] = 'Visualizza link a documenti esterni';
$string['site:import'] = 'Importare altri corsi in un corso';
$string['site:manageblocks'] = 'Gestire blocchi nelle pagine';
$string['site:mnetloginfromremote'] = 'Effettuare login da un Moodle remoto';
$string['site:mnetlogintoremote'] = 'Roaming verso un\'applicazione remota tramite MNet';
$string['site:readallmessages'] = 'Leggere qualsiasi messaggio sul sito';
$string['site:restore'] = 'Ripristinare corsi';
$string['site:sendmessage'] = 'Mandare messaggi a ogni utente';
$string['site:trustcontent'] = 'Fidarsi dei contenuti inviati';
$string['site:uploadusers'] = 'Caricare nuovi utenti da file';
$string['site:viewfullnames'] = 'Visualizzare sempre nome e cognome degli utenti';
$string['site:viewparticipants'] = 'Visualizzare i partecipanti';
$string['site:viewreports'] = 'Visualizzare i report';
$string['site:viewuseridentity'] = 'Visulizzare negli elenchi di utenti l\'identità completa delle persone';
$string['tag:create'] = 'Creare nuovi tag';
$string['tag:edit'] = 'Modificare tag esistenti';
$string['tag:editblocks'] = 'Modificare blocchi nelle pagine dei tag';
$string['tag:flag'] = 'Segnala tag inappropriato';
$string['tag:manage'] = 'Gestire qualsiasi tag';
$string['thisusersroles'] = 'Ruoli assegnati all\'utente';
$string['unassignarole'] = 'Togli il ruolo {$a}';
$string['unassignconfirm'] = 'Sei sicuro di togliere il ruolo "{$a->role}" all\'utente "{$a->user}"?';
$string['unassignerror'] = 'Errore nella rimozione del ruolo {$a->role} all\'utente {$a->user}.';
$string['user:changeownpassword'] = 'Cambiare propria password';
$string['user:create'] = 'Creare utenti';
$string['user:delete'] = 'Eliminare utenti';
$string['user:editmessageprofile'] = 'Modificare il profilo messaging degli utenti';
$string['user:editownmessageprofile'] = 'Modificare il proprio profilo del messaging';
$string['user:editownprofile'] = 'Modificare il proprio profilo utente';
$string['user:editprofile'] = 'Modificare profili utente';
$string['user:ignoreuserquota'] = 'Ignora la quota dell\'utente';
$string['user:loginas'] = 'Eseguire login come altri utenti';
$string['user:manageblocks'] = 'Gestire blocchi nel profilo di altri utenti';
$string['user:manageownblocks'] = 'Gestire blocchi nel proprio profilo';
$string['user:manageownfiles'] = 'Gestire file personali';
$string['user:managesyspages'] = 'Configurare il layout di default per la parte pubblica del profilo utente';
$string['user:readuserblogs'] = 'Vedere blog di qualsiasi utente';
$string['user:readuserposts'] = 'Vedere i messaggi di tutti gli utenti';
$string['usersfrom'] = 'Utenti da {$a}';
$string['usersfrommatching'] = 'Utenti da {$a->contextname} corrispondenti alla ricerca \'{$a->search}\'';
$string['usersinthisx'] = 'Utenti in questo {$a}';
$string['usersinthisxmatching'] = 'Utenti in questo {$a->contexttype} che corrispondono alla ricerca di \'{$a->search}\'';
$string['userswithrole'] = 'Tutti gli utenti con un ruolo';
$string['userswiththisrole'] = 'Utenti col ruolo';
$string['user:update'] = 'Aggiornare i profili utente';
$string['user:viewalldetails'] = 'Visualizzare il profilo completo degli utenti';
$string['user:viewdetails'] = 'Visualizzare i profili utente';
$string['user:viewhiddendetails'] = 'Visualizzare campi nascosti nei profili utenti';
$string['user:viewuseractivitiesreport'] = 'Visualizzare i report delle attività degli utenti';
$string['user:viewusergrades'] = 'Visualizzare le valutazioni degli utenti';
$string['useshowadvancedtochange'] = 'Per modificare, utilizza \'Visualizza impostazioni avanzate\'';
$string['viewingdefinitionofrolex'] = 'Visualizzazione della definizione del ruolo \'{$a}\'';
$string['viewrole'] = 'Visualizzazione dettagliata del ruolo';
$string['webservice:createmobiletoken'] = 'Crea un web service per l\'accesso mobile';
$string['webservice:createtoken'] = 'Creare token web service';
$string['whydoesuserhavecap'] = 'Come mai {$a->fullname} ha il privilegio {$a->capability} nel contesto {$a->context}?';
$string['whydoesusernothavecap'] = 'Come mai {$a->fullname} non ha il privilegio {$a->capability} nel contesto {$a->context}?';
$string['xroleassignments'] = 'Ruoli assegnati a {$a}';
$string['xuserswiththerole'] = 'Utenti con il ruolo "<b>{$a->role}</b>"';
