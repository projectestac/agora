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
 * Strings for component 'local_amos', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   local_amos
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['about'] = '<p>AMOS è l\'acronimo di Automated Manipulation Of Strings. AMOS è un repository centralizzato di tutte le stringhe usate in Moodle e della loro storia. Con AMOS è possibile tenere traccia di tutte le stringhe in lingua Inglese aggiunte al core di Moodle, raccogliere le relative traduzioni, gestire le attività di traduzione e generare i language pack da distribuire tramite i server Moodle.</p>
<p>Per maggiori informazioni: <a href="http://docs.moodle.org/en/AMOS">Documentazione di AMOS</a>.</p>';
$string['amos'] = 'AMOS - tool per la traduzione di Moodle';
$string['amos:commit'] = 'Eseguire commit delle stringhe staged nel repository principale';
$string['amos:importfile'] = 'Importare stringhe da un file';
$string['amos:manage'] = 'Gestire il portale AMOS';
$string['amos:stage'] = 'Usare il tool per la traduzione AMOS e inserire stringhe nello stage';
$string['amos:stash'] = 'Conservare lo stage attuale in uno stash persistente';
$string['commitbutton'] = 'Commit';
$string['commitmessage'] = 'Messaggio di commit';
$string['commitstage'] = 'Eseguire il commit delle stringhe presenti nello stage';
$string['commitstage_help'] = 'Memorizza nel repository AMOS tutte le stringhe tradotte presenti nello stage. Ogni volta che viene effettuato un commit, vengono eseguiti un "prune" ed un "rebase" dello stage. Il commit veine effettuato solo sulle stringhe evidenziate in verde-. Dopo il commit lo stage viene ripulito.';
$string['committableall'] = 'tutte le lingue';
$string['committablenone'] = 'nessuna lingua consentita - per favore contatta il manager AMOS';
$string['componentsall'] = 'Tutti';
$string['componentsnone'] = 'Nessuno';
$string['componentsstandard'] = 'Standard';
$string['confirmaction'] = 'Non sarà possibile annullare l\'operazione. Sei sicuro ?';
$string['contribaccept'] = 'Accetta';
$string['contribactions'] = 'Azioni sui contributi alla traduzione';
$string['contribactions_help'] = 'In funzione dei tuoi privilegi, puoi compiere alcune delle seguenti azioni:

* Applica - copia il contributo alla traduzione nel tuo stage senza modificare il record del contributo*
* Assegna a me - diventi il responsabile della revisione e della integrazione del contributo alla traduzione
* Rinuncia - rinunci a rivedere ed integrare il contributo alla traduzione
* Inizia revisione - diventi il responsabile della revisione, imposta lo stato del contributo a "in revisione" e copia le stringhe nel tuo stage
* Accetta - il contributo alla traduzione è accettato
* Rifiuta - il contributo alla traduzione è rifiutato per le ragioni presenti nel commento

Colui che ha contribuito alla traduzione sarà informato via email circa lo stato del suo contributo.
';
$string['contribapply'] = 'Applica';
$string['contribassignee'] = 'Assegnatario';
$string['contribassigneenone'] = '-';
$string['contribassigntome'] = 'Assegna a me';
$string['contribauthor'] = 'Autore';
$string['contribclosedno'] = 'Nascondi contributi gestiti';
$string['contribclosedyes'] = 'Visualizza contributi gestiti';
$string['contribcomponents'] = 'Componenti';
$string['contribid'] = 'ID';
$string['contribincomingnone'] = 'Non sono presenti contributi';
$string['contribincomingsome'] = 'Contributi ricevuti: ({$a})';
$string['contriblanguage'] = 'Lingua';
$string['contribreject'] = 'Non accettare';
$string['contribresign'] = 'Rinuncia';
$string['contribstartreview'] = 'Inizia revisione';
$string['contribstatus'] = 'Stato';
$string['contribstatus0'] = 'Nuovo';
$string['contribstatus10'] = 'In revisione';
$string['contribstatus20'] = 'Non accettato';
$string['contribstatus30'] = 'Accettato';
$string['contribstatus_help'] = 'I contributi alla traduzione possono avere i seguenti stati:

* Nuovo - il contributo è stato inviato ma la revisione non è iniziata
* In revisione - il contributo è stato assegnato al maintainer del language pack ed inserito nello stage per revisione
* Non accettato - Il maintainer del language pack non ha accettato il contributo e con ogni probabilità ha lasciato un commento in proposito
* Accettato - Il maintainer del language pack ha accettato il contributo';
$string['contribstrings'] = 'Stringhe';
$string['contribstringseq'] = '{$a->orig} nuove';
$string['contribstringsnone'] = '{$a->orig} (tutte già tradotte nel language pack)';
$string['contribstringssome'] = '{$a->orig} (per {$a->same} esiste già una traduzione più recente)';
$string['contribsubject'] = 'Argomento';
$string['contribsubmittednone'] = 'Non ci sono contributi';
$string['contribsubmittedsome'] = 'I tuoi contributi ({$a})';
$string['contribtimemodified'] = 'Modificata';
$string['contributions'] = 'Contributi';
$string['diff'] = 'Confronta';
$string['diffmode'] = 'Metti le stringhe nello stage se';
$string['diffmode1'] = 'Le stringhe in inglese sono cambiate ma non sono cambiate le stringhe tradotte';
$string['diffmode2'] = 'Le stringhe in inglese non sono cambiate ma sono cambiate le stringhe tradotte';
$string['diffmode3'] = 'Sono cambiate le stringhe in inglese oppure le stringhe tradotte (ma non entrambe)';
$string['diffmode4'] = 'Sono cambiate sia le stringhe in inglese sia le stringhe tradotte';
$string['diffprogress'] = 'Confronto dei branch selezionati';
$string['diffprogressdone'] = 'Sono state trovate un totale di {$a} differenze';
$string['diffstrings'] = 'Confronta le stringhe di due branch';
$string['diffstrings_help'] = 'Permette di confrontare le stringhe di due branch. Se vengono torvate differenze tra i branch, entrambe le versioni saranno inserite nello stage. Puoi usare la funzione "Modifica stringhe nello stage" per effettuare le correzioni necessarie.';
$string['diffversions'] = 'Versioni';
$string['emailacceptbody'] = 'Il maintainer del language pack {$a->assignee} ha accettato il tuo contributo alla traduzione: #{$a->id} {$a->subject}';
$string['emailacceptsubject'] = '[Contributo AMOS] Accettato';
$string['emailcontributionbody'] = '{$a->author} ha inviato il contributo alla traduzione traduzione #{$a->id}: {$a->subject}. ';
$string['emailcontributionsubject'] = '[Contributo AMOS] E\' stato inviato un nuovo contributo alla traduzione';
$string['emailrejectbody'] = 'Il maintainer del language pack {$a->assignee} non ha accettato il tuo contributo alla traduzione: #{$a->id} {$a->subject}';
$string['emailrejectsubject'] = '[Contributo AMOS] Non accettato';
$string['emailreviewbody'] = 'Il maintainer del language pack {$a->assignee} ha iniziato la revisione del tuo contributo alla traduzione: #{$a->id} {$a->subject}';
$string['emailreviewsubject'] = '[Contributo AMOS] Revisione iniziata';
$string['err_exception'] = 'Errore: {$a}';
$string['err_invalidlangcode'] = 'Codice lingua non valido';
$string['err_parser'] = 'Errore di parsing: {$a}';
$string['filtercmp'] = 'Componenti';
$string['filtercmp_desc'] = 'Visualizza stringhe appartenenti a questi componenti';
$string['filterlng'] = 'Lingue';
$string['filterlng_desc'] = 'Visualizza traduzioni in queste lingue';
$string['filtermis'] = 'Filtri addizionali';
$string['filtermis_desc'] = 'Ulteriori condizioni per il filtraggio delle stringhe';
$string['filtermisfglo'] = 'solo stringhe greylisted';
$string['filtermisfhlp'] = 'solo stringhe di help';
$string['filtermisfmis'] = 'solo stringhe mancanti e obsolete';
$string['filtermisfstg'] = 'solo stringhe staged';
$string['filtermisfwog'] = 'senza stringhe greylisted';
$string['filtersid'] = 'Identificatore stringa';
$string['filtersid_desc'] = 'La chiave nell\'array delle stringhe';
$string['filtertxt'] = 'Sotto stringa';
$string['filtertxtcasesensitive'] = 'case-sensitive';
$string['filtertxt_desc'] = 'La stringa deve contenere questo testo';
$string['filtertxtregex'] = 'regex';
$string['filterver'] = 'Versioni';
$string['filterver_desc'] = 'Visualizza stringhe appartenenti a queste versioni di Moodle';
$string['found'] = 'Trovate: {$a->found} &nbsp;&nbsp;&nbsp; Mancanti: {$a->missing} ({$a->missingonpage})';
$string['foundinfo'] = 'Numero di stringhe trovate';
$string['foundinfo_help'] = 'Visualizza il numero totale di righe nella tabella del tool di traduzione, il numero di traduzioni mancanti e il numero di traduzioni mancanti nella pagina visualizzata.';
$string['gotofirst'] = 'vai alla prima pagina';
$string['gotoprevious'] = 'vai alla pagina precedente';
$string['greylisted'] = 'Stringhe greylisted';
$string['greylisted_help'] = 'Per ragionidi compatibilità, un language pack di Moodle può contenere stringhe non più utilizzate, che sono definite \'greylisted\'. Tali stringhe saranno eliminate dal language pack solo dopo la conferma che non sono effettivamente più utilizzate.

Se ti accorgi che una stringa greylisted è ancora utilizzata in Moodle per favore segnalacelo con un messaggio nel forum del corso "Translating Moodle". In alternativa puoi semplicemente ignorare le stringhe greylisted e risparmiare tempo evitando di tradurle.';
$string['greylistedwarning'] = 'la stringa è greylisted';
$string['importfile'] = 'importa stringhe tradotte da un file';
$string['importfile_help'] = 'Se disponi di stringhe tradotte offline, puoi caricarle nello stage usando questo form.

* Il file deve rispettare il formato delle stringhe Moodle. Per avere  esempi del formato puoi guardare il contenuto della cartella /lang/en della tua installazione Moodle.
* Il nome del file deve corrispondere al nome del file contenente le stringhe in lingua inglese `moodle.php`, `assignment.php` oppure `enrol_manual.php`).

Tutte le stringhe presenti nel file saranno inserite nello stage relativo alla versione e lingua indicate.';
$string['language'] = 'Lingua';
$string['languages'] = 'Lingue';
$string['languagesall'] = 'Tutte';
$string['languagesnone'] = 'Nessuna';
$string['log'] = 'Log';
$string['logfilterbranch'] = 'Versioni';
$string['logfiltercommithash'] = 'git hash';
$string['logfiltercommitmsg'] = 'Contenuto del messaggio di commit';
$string['logfiltercommits'] = 'Filtro commit';
$string['logfiltercommittedafter'] = 'Commit successivo al';
$string['logfiltercommittedbefore'] = 'Commit precedente al';
$string['logfiltercomponent'] = 'Componenti';
$string['logfilterlang'] = 'Lingue';
$string['logfiltershow'] = 'Visualizza commit filtrati e stringhe';
$string['logfiltersource'] = 'Sorgente';
$string['logfiltersourceamos'] = 'amos (tool web per la traduzione)';
$string['logfiltersourcecommitscript'] = 'commitscript (Script AMOS nel messaggio di commit)';
$string['logfiltersourcefixdrift'] = 'fixdrift (fixed AMOS-git drift)
';
$string['logfiltersourcegit'] = 'git (git mirror del codice sorgente di Moodle e pacchetti 1.x)
';
$string['logfiltersourcerevclean'] = 'revclean (processo di reverse clean-up)';
$string['logfilterstringid'] = 'Identificativo stringa';
$string['logfilterstrings'] = 'Filtro stringhe';
$string['logfilterusergrp'] = 'Committer';
$string['logfilterusergrpor'] = 'or';
$string['maintainers'] = 'Maintainer';
$string['markuptodate'] = 'Contrassegna la traduzione come aggiornata';
$string['markuptodate_help'] = 'AMOS ritiene che la stringa sia obsoleta in quanto la corrispondente stringa in lingua Inglese è stata modificata successivamente alla sua traduzione. Rivedi la traduzione, se è aggiornata, fai click sulla casella di spunta, altrimenti modificala.';
$string['merge'] = 'Merge';
$string['mergestrings'] = 'Esegue il merge delle stringhe provenienti da un altro branch';
$string['mergestrings_help'] = 'Trasferisce le stringhe non ancora tradotte dal branch sorgente al branch target e le mette nello stage. Lo strumento è utile per copiare stringhe tradotte per una versione nelle altre versioni. Solo i mantainer dei language pack possono usare questo strumento.';
$string['newlanguage'] = 'Nuova lingua';
$string['nodiffs'] = 'Non sono state trovate differenze';
$string['nofiletoimport'] = 'Per favore fornisci un file dal quale importare';
$string['nologsfound'] = 'Non è stata trovata nessuna stringa, per favore modifica le impostazioni dei filtri';
$string['nostringsfound'] = 'Non è stata trovata nessuna stringa';
$string['nostringsfoundonpage'] = 'Non è stata trovata nessuna stringa nella pagina {$a}';
$string['nostringtoimport'] = 'Nel file non sono state trovate stringhe valide. Accertati che il file sia formattato correttamente.';
$string['nothingtomerge'] = 'Il branch sorgente non contiene nessuna stringa mancante nel branch target. Non sarà eseguito nessun merge.';
$string['numofcommitsabovelimit'] = 'Sono stati trovati {$a->found} commit corrispondenti al filtro, utilizzando i {$a->limit} più recenti ';
$string['numofcommitsunderlimit'] = 'Sono stati trovati {$a->found} commit corrispondenti al filtro';
$string['numofmatchingstrings'] = 'Tra queste, {$a->strings} modifiche presenti in {$a->commits} commits corrispondono ai criteri di filtraggio.';
$string['outdatednotcommitted'] = 'Stringa obsoleta';
$string['outdatednotcommitted_help'] = 'AMOS ritiene che la stringa sia obsoleta in quanto la corrispondente stringa in lingua Inglese è stata modificata successivamente alla sua traduzione. Per favore rivedi la traduzione.';
$string['outdatednotcommittedwarning'] = 'obsoleta';
$string['ownstashactions'] = 'Azioni stash';
$string['ownstashactions_help'] = '* Applica - copia le stringhe tradotte dallo stash allo stage mantenendo lo stash inalterato. Se ci sono stringhe già presenti nello stage, saranno sostituite da quelle presenti nello stash.
* Pop - sposta le stringhe tradotte dallo stash allo stage eliminando lo stash (equivalente a Applica + Drop)
* Drop - elimina le stringhe presenti nello stash
* Invia - visualizza un form per l\'invio dello stash al maintainer ufficiale del language pack per revisione ed eventuale inclusione.';
$string['ownstashes'] = 'I tuoi stash';
$string['ownstashes_help'] = 'Elenco dei tuoi stash';
$string['ownstashesnone'] = 'Non sono stati trovati stash';
$string['permalink'] = 'permalink';
$string['placeholder'] = 'Segnaposto';
$string['placeholder_help'] = 'I segnaposto sono istruzioni speciali che possono comparire nelle stringhe,  come ade sempio `{$a}` or `{$a->something}`. I segnaposto saranno rimpiazzati da un valore dinamico al momento dell\'uso della stringa.

E\' importante copiare i segnaposto esattamente come nella stringa originale. Non vanno tradotti né va cambiata la direzione da sinistra a destra.';
$string['placeholderwarning'] = 'la stringa contiene un segnaposto';
$string['pluginclasscore'] = 'Core subsystem';
$string['pluginclassnonstandard'] = 'Plugin non-standard';
$string['pluginclassstandard'] = 'Plugin standard';
$string['pluginname'] = 'AMOS';
$string['presetcommitmessage'] = 'Contributo alla traduzione #{$a->id} di {$a->author}';
$string['presetcommitmessage2'] = 'E\' stato eseguito il merge delle stringhe mancanti dal branch {$a->source} al branch {$a->target}';
$string['presetcommitmessage3'] = 'Correzione delle differenze tra {$a->versiona} and {$a->versionb}';
$string['privileges'] = 'I tuoi privilegi';
$string['privilegesnone'] = 'Puoi accedere alla informazioni pubbliche in sola lettura.';
$string['requestactions'] = 'Azione';
$string['requestactions_help'] = '* Applica - copia le stringhe tradotte dalla pull request allo stage. Se ci sono stringhe già presenti nello stage, saranno sostituite da quelle presenti nello stash.
* Nascondi - nasconde la pull request';
$string['savefilter'] = 'Salva impostazioni del filtro';
$string['sourceversion'] = 'Versione sorgente';
$string['stage'] = 'Stage';
$string['stageactions'] = 'Azioni stage';
$string['stageactions_help'] = '* Modifica stringhe nello stage - modifica il filtraggio del tool per la traduzione in modo da visualizzare solo le stringhe presenti nello stage.
* Prune stringhe non-committable - rimuove dallo stage tutte le stringhe tradotte per le quali non sei autorizzato ad eseguire il commit.
* Rebase - rimuove dallo stage tutte le stringhe tradotte che non modificano le traduzioni già fatte o che sono precedenti a quelle presenti nel repository.
* Pulisci lo stage - rimuove dallo stage tutte le stringhe tradotte, che andranno perdute.';
$string['stageedit'] = 'Modifica stringhe nello stage';
$string['stagelang'] = 'Lingua';
$string['stageoriginal'] = 'Originale';
$string['stageprune'] = 'Elimina non-commitable';
$string['stagerebase'] = 'Rebase';
$string['stagestring'] = 'Stringa';
$string['stagestringsnocommit'] = 'Ci sono {$a->staged} stringhe staged';
$string['stagestringsnone'] = 'Non ci sono stringhe nello stage';
$string['stagestringssome'] = 'Sono presenti {$a->staged} stringhe nello stage, ed è possibile eseguire un commit di {$a->committable} di esse.';
$string['stagesubmit'] = 'Invia al maintainer';
$string['stagetranslation'] = 'Traduzione';
$string['stagetranslation_help'] = 'Visualizza le traduzioni inserite nello stage per le quali è possibile eseguire il commit. Il colore di sfondo della cella può avere i seguenti significati:

* Verde - hai aggiunto una stringa mancante e sei autorizzato ad eseguire il commit.
* Giallo - hai modificato una stringa e sei autorizzato ad eseguire il commit.
* Blu -  hai modificato una stringa o aggiunto una stringa mancante ma non sei autorizzato ad eseguire il commit dello stage nella lingua in uso.
* Senza colore - la traduzione presenti nello stage è uguale a quella già esistente e quindi il commit non verrà eseguito.';
$string['stageunstageall'] = 'Rimuovi tutto dallo stage';
$string['stashactions'] = 'Azioni stash';
$string['stashactions_help'] = 'Lo stash è uno snapshot dello stage attuale. Gli stash possono essere inviati al maintainer ufficiale del language pack per una loro eventuale inclusione nel language pack stesso.';
$string['stashapply'] = 'Applica';
$string['stashautosave'] = 'Stash backup salvati automaticamente';
$string['stashautosave_help'] = 'Questo stash contiene lo snapshot più recente del tuo stage. Ad esempio, puoi usarlo come backup nel caso di rimozione involontaria delle stringhe dallo stage. Puoi utilizzare \'Applica\' per copiare le stringhe dallo stash nello stage. (L\'azione sostituirà stringhe omologhe se presenti nello stage).';
$string['stashcomponents'] = '<span>Componenti:</span> {$a}';
$string['stashdrop'] = 'Drop';
$string['stashes'] = 'Stash';
$string['stashlanguages'] = '<span>Lingue:</span> {$a}';
$string['stashpop'] = 'Pop';
$string['stashpush'] = 'Push di tutte le stringhe staged in un nuovo stash';
$string['stashstrings'] = '<span>Numero di stringhe:</span> {$a}';
$string['stashsubmit'] = 'Invia al maintainer';
$string['stashsubmitdetails'] = 'Dettagli invio';
$string['stashsubmitmessage'] = 'Messaggio';
$string['stashsubmitsubject'] = 'Argomento';
$string['stashtitle'] = 'Titolo stash';
$string['stashtitledefault'] = 'WIP - {$a->time}';
$string['stringhistory'] = 'Storico';
$string['strings'] = 'Stringhe';
$string['submitting'] = 'Invio contributo';
$string['submitting_help'] = 'Permette di inviare le stringhe tradotte ai maintainer ufficiali del language pack, che potranno importare il tuo contribuito nel loro stage, rivederlo ed inserirlo nel language pack. Per favore inserisci un messaggio che descriva il tuo lavoro e i motivi per i quali ritieni di voler vedere il tuo contributo nel language pack';
$string['targetversion'] = 'Versione target';
$string['translatorlang'] = 'Lingua';
$string['translatorlang_help'] = 'Visualizza il codice della lingua da tradurre. Per visualizzare lo storico delle traduzioni, fai click su <strong>+-</strong>.';
$string['translatororiginal'] = 'Originale';
$string['translatororiginal_help'] = 'Visualizza la stringa originale in lingua Inglese. Al di sotto trovi un link per tradurla con Google Transaltor (solo se la lingua è supportata e se il tuo browser ha javascript abilitato). Inoltre puoi trovare anche altre  informazioni, ad esempio se la stringa contiene un placeholder.';
$string['translatorstring'] = 'Stringa';
$string['translatorstring_help'] = 'Visualizza il branch di Moodle (versione), l\'identificativo della stringa e il componente che utilizza la stringa stessa.';
$string['translatortool'] = 'Tool per la traduzione';
$string['translatortranslation'] = 'Traduzione';
$string['translatortranslation_help'] = 'Per modificare una stringa, fai click sulla cella. Al termine, fai click fuori dalla cella per inserire la stringa nello stage.  Il colore di sfondo della cella può avere i seguenti significati:

* Verde - la stringa è tradotta e sei autorizzato a modificare la ed eseguire il commit.
* Giallo - è possibile eseguire il commit della stringa ma la traduzione è obsoleta. La corrispondente stringa in lingua inglese è stata modificata dopo la traduzione.
* Rosso - la stringa non è tradotta  e sei autorizzato a modificare la ed eseguire il commit.
* Blu -  hai modificato la traduzione e la stringa è stat inserita nello stage. Non scordare di eseguire il commit prima di scollegarti!
* Senza colore - sebbene tu possa inserire la stringa tradotta nello stage, non sei autorizzato ad eseguire il commit nel language pack. Puoi solo esportare lo stage in un file.';
$string['typecontrib'] = 'Plugin non standard';
$string['typecore'] = 'Core subsystem';
$string['typestandard'] = 'Plugin standard';
$string['version'] = 'Versione';
