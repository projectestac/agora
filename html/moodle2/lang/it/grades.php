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
 * Strings for component 'grades', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   grades
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activities'] = 'Attività';
$string['addcategory'] = 'Aggiungi categoria';
$string['addcategoryerror'] = 'Non è stato possibile aggiungere la categoria';
$string['addexceptionerror'] = 'Si è verificato un errore aggiungendo un eccezione per userid:gradeitem';
$string['addfeedback'] = 'Aggiungi feedback';
$string['addgradeletter'] = 'Aggiungi graduatoria letterale';
$string['addidnumbers'] = 'Aggiungi codici identificativi';
$string['additem'] = 'Aggiungi elemento di valutazione';
$string['addoutcome'] = 'Aggiungi un obiettivo';
$string['addoutcomeitem'] = 'Aggiungi elemento raggiungimento obiettivo';
$string['addscale'] = 'Aggiungi una scala';
$string['aggregateextracreditmean'] = 'Voto medio (con crediti extra)';
$string['aggregatemax'] = 'Voto più alto';
$string['aggregatemean'] = 'Media dei voti';
$string['aggregatemedian'] = 'Mediana dei voti';
$string['aggregatemin'] = 'Voto più basso';
$string['aggregatemode'] = 'Moda dei voti';
$string['aggregateonlygraded'] = 'Aggrega solo i voti ricevuti';
$string['aggregateonlygraded_help'] = '<p>I voti non ancora ricevuti possono essere aggregati considerandoli come voto minimo oppure possono essere ignorati durante l\'aggregazione.</p>';
$string['aggregateoutcomes'] = 'Aggrega gli obiettivi';
$string['aggregateoutcomes_help'] = 'E\' possibile includere gli obiettivi nella aggregazione dei voti ma i totali calcolati potrebbero essere non congruenti.';
$string['aggregatesonly'] = 'Solo le colonne con l\'aggregazione di voti';
$string['aggregatesubcats'] = 'Aggrega includendo le sotto categorie';
$string['aggregatesubcats_help'] = '<p>Per default l\'aggregazione dei voti di una categoria include solamente gli elementi di primo livello. Con questa impostazione è possibile includere anche i voti presenti in tutte le sotto categorie, esclusi i totali parziali.</p>';
$string['aggregatesum'] = 'Somma dei voti';
$string['aggregateweightedmean'] = 'Media ponderale dei voti';
$string['aggregateweightedmean2'] = 'Media ponderale semplice dei voti';
$string['aggregation'] = 'Aggregazione dei voti';
$string['aggregationcoef'] = 'Coefficiente di aggregazione';
$string['aggregationcoefextra'] = 'Credito extra';
$string['aggregationcoefextra_help'] = '<h2>Per il tipo di aggregazione Somma dei voti</h2>
<p>Usando la strategia di aggregazione \'Somma dei voti\' è possibile usare un elemento di valutazione come Credito Extra della categoria. In pratica l\'elemento anziché essere aggregato sarà sommato al totale della categoria.il voto dell\'elemento al posto del voto massimo. Esempio:
<ul>
    <li>Intervallo di voti per l\'Elemento 1: 0-100</li>
    <li>Intervallo di voti per l\'Elemento 2: 0-75</li>
    <li>Per l\'Elemento 1 il checkbox "Credito Extra" è stato selezionato, mentre per l\'elemento 2 no.</li>
    <li>Entrambi gli elementi appartenegono alla Categoria 1, la cui strategia di aggregazione è "Somma dei voti.</li>
    <li>L\'intervallo dei voti della Categoria 1 è 0-75</li>
    <li>Uno studente riceve i voti 20 nell\'Elemento 1 e 70 nell\'Elemento 2</li>
    <li>Il totale ottenuto dallo studente nella Categoria 1 sarà  75/75 (20+70 = 90 tuttavia l\'Elemento 1 funge solamente come Credito Extra e di conseguenza porta il totale al Voto massimo)</li>
</ul>
<h2>Per il tipo di aggregazione Voto medio (con crediti extra)</h2>
<p>Con questo tipo di aggregazione impostando un valore maggiore di 0 in "Credito Extra", durante l\'aggregazione l\'elemento di valutazione sarà trattato come credito extra. Il valore impostato è il fattore moltiplicativo per il quale il voto ottenuto sarà moltiplicato prima di essere aggregato. L\'elemento di valutazione però non sarà tenuto in considerazione durante la divisione. Esempio:</p>

<ul>
    <li>Elemento 1: intervallo di voti 0-100 e "Credito Extra" pari a 2</li>
    <li>Elemento 2: intervallo di voti 0-100 e "Credito Extra" lasciato a 0.0000</li>
    <li>Elemento 2: intervallo di voti 0-100 e "Credito Extra" lasciato a 0.0000</li>
    <li>I tre elementi appartengono alla Categoria 1, la cui strategia di aggregazione è impostata a "Voto medio (con crediti extra)"</li>
    <li>Uno studente riceve i voti 20 nell\'Elemento 1, 40 nell\'elemento 2, on Item 2 e 70 nell\'elemento 3</li>
    <li>Il totale ottenuto dallo studente nella Categoria 1 sarà 95/100 poiché 20*2 + (40 + 70)/2 = 95</li>
</ul>';
$string['aggregationcoefextrasum'] = 'Credito extra';
$string['aggregationcoefextrasum_help'] = '<p>Usando la strategia di aggregazione \'Somma dei voti\' è possibile usare un elemento di valutazione come Credito Extra della categoria. In pratica l\'elemento anziché essere aggregato sarà sommato al totale della categoria.il voto dell\'elemento al posto del voto massimo. Esempio:
<ul>
    <li>Intervallo di voti per l\'Elemento 1: 0-100</li>
    <li>Intervallo di voti per l\'Elemento 2: 0-75</li>
    <li>Per l\'Elemento 1 il checkbox "Credito Extra" è stato selezionato, mentre per l\'elemento 2 no.</li>
    <li>Entrambi gli elementi appartenegono alla Categoria 1, la cui strategia di aggregazione è "Somma dei voti.</li>
    <li>L\'intervallo dei voti della Categoria 1 è 0-75</li>
    <li>Uno studente riceve i voti 20 nell\'Elemento 1 e 70 nell\'Elemento 2</li>
    <li>Il totale ottenuto dallo studente nella Categoria 1 sarà  75/75 (20+70 = 90 tuttavia l\'Elemento 1 funge solamente come Credito Extra e di conseguenza porta il totale al Voto massimo)</li>
</ul>';
$string['aggregationcoefextraweight'] = 'Peso credito extra';
$string['aggregationcoefextraweight_help'] = '<p>Impostando un valore maggiore di 0 in "Credito Extra", durante l\'aggregazione l\'elemento di valutazione sarà trattato come credito extra. Il valore impostato è il fattore moltiplicativo per il quale il voto ottenuto sarà moltiplicato prima di essere aggregato. L\'elemento di valutazione però non sarà tenuto in considerazione durante la divisione. Esempio:</p>

<ul>
    <li>Elemento 1: intervallo di voti 0-100 e "Credito Extra" pari a 2</li>
    <li>Elemento 2: intervallo di voti 0-100 e "Credito Extra" lasciato a 0.0000</li>
    <li>Elemento 2: intervallo di voti 0-100 e "Credito Extra" lasciato a 0.0000</li>
    <li>I tre elementi appartengono alla Categoria 1, la cui strategia di aggregazione è impostata a "Voto medio (con crediti extra)"</li>
    <li>Uno studente riceve i voti 20 nell\'Elemento 1, 40 nell\'elemento 2, on Item 2 e 70 nell\'elemento 3</li>
    <li>Il totale ottenuto dallo studente nella Categoria 1 sarà 95/100 poiché 20*2 + (40 + 70)/2 = 95</li>
</ul>';
$string['aggregationcoefweight'] = 'Peso dell\'elemento';
$string['aggregationcoefweight_help'] = '<p>Peso applicato ai voti durante l\'aggregazione.</p>';
$string['aggregation_help'] = 'La strategia di aggregazione da utilizzare per calcolare la valutazione complessiva per una data categoria.

* Media dei voti - La somma di tutti i voti divisa per il numero totale di voti.
* Media ponderale dei voti - Ad ogni voto può essere dato un peso che sarà utilizzato nel calcolo della media
* Media ponderale semplice dei voti - La differenza rispetto alla <em>Media ponderale dei voti</em> è che il peso per ogni elemento viene calcolato come <em>Voto massimo</em> - <em>Voto minimo</em>. Un compito da 100 punti ha peso 100, un compito da 10 punti ha peso 10.
* Voto medio (con credito extra) - Media aritmetica con una variante: è una strategia di aggregazione obsoleta e non più supportata ed è presente solo per compatibilità con versioni precedenti di moduli di attività.
* Mediana dei voti - La mediana è calcolata mettendo in ordine tutti i voti e selezionando quello che si trova a metà
* Voto più basso
* Voto più alto
* Moda dei voti - il voto ottenuto più frequentemente
* Somma dei voti - a somma di tutti i voti. Le scale di valutazione vengono ignorate.';
$string['aggregationposition'] = 'Posizione colonna aggregazione dei voti';
$string['aggregationposition_help'] = 'Consente di impostare la posizione della colonna contenente l\'aggregazione dei voti, all\'inizio oppure alla fine del registro valutatore.';
$string['aggregationsvisible'] = 'Tipi di aggregazione disponibili';
$string['aggregationsvisiblehelp'] = 'Selezionate tutti i tipi di aggregazione che saranno disponibili nel registro del valutatore. Per selezionarne più di una, fate click con il mouse tenendo premuto il tasto Ctrl.';
$string['allgrades'] = 'Valutazioni per categoria';
$string['allstudents'] = 'Tutti gli studenti';
$string['allusers'] = 'Tutti gli utenti';
$string['autosort'] = 'Ordina automaticamente';
$string['availableidnumbers'] = 'Codici identificativi disponibili';
$string['average'] = 'Media';
$string['averagesdecimalpoints'] = 'Decimali nelle media di colonna';
$string['averagesdecimalpoints_help'] = 'Imposta il numero di cifre decimali da usare nella visualizzazione delle medie di colonna. Selezioando Eredita, verrà utilizzato il numero di decimali già impostato per ciascuna colonna.';
$string['averagesdisplaytype'] = 'Visualizza le medie di colonna come';
$string['averagesdisplaytype_help'] = 'Imposta il tipo di visualizzazione delle media di colonna. Selezionando Eredita, verrà utilizzato il tipo di visualizzazione già impostata per ciascuna colonna.';
$string['backupwithoutgradebook'] = 'Il backup non contiene la configurazione del Registro del valutatore';
$string['badgrade'] = 'Il voto inserito non è valido';
$string['badlyformattedscale'] = 'Per favore inserisci un elenco separato da virgole (sono necessari almeno due elementi)';
$string['baduser'] = 'L\'utente fornito non è valido';
$string['bonuspoints'] = 'Punti bonus';
$string['bulkcheckboxes'] = 'Selezioni in blocco';
$string['calculatedgrade'] = 'Voto calcolato';
$string['calculation'] = 'Calcolo';
$string['calculationadd'] = 'Aggiungi calcolo';
$string['calculationedit'] = 'Modifica calcolo';
$string['calculation_help'] = 'Il calcolo delle valutazioni consente l\'aggregazione dei voti in base ad una formula. La formula deve iniziare con un segno uguale (=) e può usare i normali operatori matematici come max, min e sum. E\' anche possibile inserire ulteriori elementi di valutazione referenziandoli nella formula racchiudendo il loro codice identificativo tra doppie parentesi quadre.';
$string['calculationsaved'] = 'Calcolo salvato';
$string['calculationview'] = 'Visualizza calcolo';
$string['cannotaccessgroup'] = 'Spiacente, non è possibile accedere ai voti del gruppo selezionato.';
$string['categories'] = 'Categorie';
$string['categoriesanditems'] = 'Categorie ed elementi';
$string['categoriesedit'] = 'Modifica categorie ed elementi';
$string['category'] = 'Categoria';
$string['categoryedit'] = 'Modifica categoria';
$string['categoryname'] = 'Nome categoria';
$string['categorytotal'] = 'Totale categoria';
$string['categorytotalfull'] = 'Totale {$a->category}';
$string['categorytotalname'] = 'Nome del totale di categoria';
$string['changedefaults'] = 'Cambia default';
$string['changereportdefaults'] = 'Cambia default dei report';
$string['chooseaction'] = 'Scegli un\'azione ...';
$string['choosecategory'] = 'Scegli categoria';
$string['combo'] = 'Tab e menù a discesa';
$string['compact'] = 'Compatto';
$string['componentcontrolsvisibility'] = 'La visibilità di questo elemento di valutazione è regolata dalle impostazioni dell\'attività.';
$string['contract'] = 'Contrai categoria';
$string['controls'] = 'Controlli';
$string['courseavg'] = 'Media del corso';
$string['coursegradecategory'] = 'Valutazione di corso';
$string['coursegradedisplaytype'] = 'Tipo visualizzazione valutazioni del corso';
$string['coursegradedisplayupdated'] = 'Il tipo di visualizzazione delle valutazioni nei corsi';
$string['coursegradesettings'] = 'Impostazioni registro del corso';
$string['coursename'] = 'Titolo del corso';
$string['coursescales'] = 'Scale del corso';
$string['coursesettings'] = 'Impostazioni corso';
$string['coursesettingsexplanation'] = 'Le impostazioni del corso stabiliscono in quale modo apparirà ai partecipanti il registro del valutatore .';
$string['coursetotal'] = 'Totale corso';
$string['createcategory'] = 'Crea Categoria';
$string['createcategoryerror'] = 'Non si può creare una nuova categoria';
$string['creatinggradebooksettings'] = 'Impostazioni creazione registro valutatore';
$string['csv'] = 'CSV';
$string['currentparentaggregation'] = 'Aggregazione in uso nella categoria genitore';
$string['curveto'] = 'Trasforma in';
$string['decimalpoints'] = 'Cifre decimali';
$string['decimalpoints_help'] = 'Il numero di cifre decimali visualizzate nei voti. L\'impostazione non influenza come vengono effettuati i calcoli, per i quali si usa sempre una precisione a 5 cifre decimali.';
$string['default'] = 'Default';
$string['defaultprev'] = 'Default ({$a})';
$string['deletecategory'] = 'Elimina categoria';
$string['disablegradehistory'] = 'Disabilita storia valutazioni';
$string['disablegradehistory_help'] = 'Disabilita la registrazione storica delle modifiche nelle tabelle relative alle valutazioni. Questo può velocizzare un po\' il server e risparmiare spazio nel database.';
$string['displaylettergrade'] = 'Visualizza graduatoria letterale';
$string['displaypercent'] = 'Visualizza percentuali';
$string['displaypoints'] = 'Visualizza punteggi';
$string['displayweighted'] = 'Visualizza valutazioni pesate';
$string['dropdown'] = 'Menu a discesa';
$string['droplow'] = 'Scarta voti peggiori';
$string['droplowestvalue'] = 'Valore per scartare voti peggiori';
$string['droplow_help'] = 'Consente di scartare il numero specificato di voti più bassi.';
$string['dropped'] = 'Scartati';
$string['dropxlowest'] = 'Scarta le N più basse';
$string['dropxlowestwarning'] = 'Nota: Se si utilizza Scarta le N più basse, la valutazione assume che tutte gli elementi della corrispondente categoria hanno lo stesso valore per i punteggi. Se tali valori differiscono i risultati saranno imprevedibili';
$string['duplicatescale'] = 'Duplica scala';
$string['edit'] = 'Modifica';
$string['editcalculation'] = 'Modifica Calcolo';
$string['editcalculationverbose'] = 'Modifica calcolo per {$a->category} {$a->itemmodule} {$a->itemname}';
$string['editfeedback'] = 'Modifica feedback';
$string['editgrade'] = 'Modifica voto';
$string['editgradeletters'] = 'Modifica valutazioni letterali';
$string['editoutcome'] = 'Modifica obiettivo';
$string['editoutcomes'] = 'Modifica obiettivi';
$string['editscale'] = 'Modifica scala';
$string['edittree'] = 'Categorie ed elementi';
$string['editverbose'] = 'Modifica {$a->category} {$a->itemmodule} {$a->itemname}';
$string['enableajax'] = 'Abilita AJAX';
$string['enableajax_help'] = 'Abilita AJAX nel registro del valutatore, semplificando e accelerando le operazioni più comuni. E\' necessario che il browser dell\'utente supporti JavaScript.';
$string['enableoutcomes'] = 'Abilita obiettivi';
$string['enableoutcomes_help'] = 'Abilitando gli Obiettivi (in inglese Outcome, chiamati anche Competenze, Standard, Criteri) sarà possibile valutare il raggiungimento di obiettivi formativi tramite scale di valutazione qualitative. L\'abilitazione degli obiettivi rende possibile questo tipo di valutazione in qualsiasi corso.';
$string['encoding'] = 'Codifica';
$string['errorcalculationbroken'] = 'Possibile presenza di riferimento circolare o formula di calcolo errata.';
$string['errorcalculationnoequal'] = 'La formula deve iniziare col segno uguale (=1+2)';
$string['errorcalculationunknown'] = 'Formula non valida';
$string['errorgradevaluenonnumeric'] = 'E\' stato inserito un valore non numerico come voto più basso o più alto in';
$string['errornocalculationallowed'] = 'Questo elemento non consente l\'uso di calcoli';
$string['errornocategorisedid'] = 'Non è stato possibile ottenere un id senza categoria!';
$string['errornocourse'] = 'Non è stato possibile ottenere informazioni sul corso';
$string['errorreprintheadersnonnumeric'] = 'E\' stato ricevuto un valore non numerico per reprint-headers';
$string['errorsavegrade'] = 'Non è stato possibile salvare il voto.';
$string['errorsettinggrade'] = 'Errore durante il salvataggio della valutazione "{$a->itemname}" per l\'userid {$a->userid}';
$string['errorupdatinggradecategoryaggregateonlygraded'] = 'Errore durante l\'aggiornamento dell\'impostazione "Aggrega solo i voti ricevuti" nella categoria ID {$a->id}';
$string['errorupdatinggradecategoryaggregateoutcomes'] = 'Errore durante l\'aggiornamento dell\'impostazione "Aggrega gli obiettivi" nella categoria ID {$a->id}';
$string['errorupdatinggradecategoryaggregatesubcats'] = 'Errore durante l\'aggiornamento dell\'impostazione "Aggrega le sotto categorie" nella categoria ID {$a->id}';
$string['errorupdatinggradecategoryaggregation'] = 'Errore durante l\'aggiornamento del tipo di aggregazione nella categoria ID {$a->id}';
$string['errorupdatinggradeitemaggregationcoef'] = 'Errore durante l\'aggiornamento del coefficiente di aggregazione (peso o credito extra) nella categoria ID {$a->id}';
$string['excluded'] = 'Escluso';
$string['excluded_help'] = 'Il voto sarà escluso da tutte le aggregazioni.';
$string['expand'] = 'Espandi categoria';
$string['export'] = 'Esporta';
$string['exportalloutcomes'] = 'Esporta tutti gli obiettivi';
$string['exportfeedback'] = 'Includi feedback';
$string['exportonlyactive'] = 'Escludi iscrizioni sospese';
$string['exportonlyactive_help'] = 'Nell\'esportazione saranno esclusi gli studenti la cui iscrizione risulti sospesa.';
$string['exportplugins'] = 'Plugin esportazione';
$string['exportsettings'] = 'Impostazioni esportazione';
$string['exportto'] = 'Esporta in';
$string['extracreditvalue'] = 'Credito extra per {$a}';
$string['extracreditwarning'] = 'Nota: L\'impostazione Credito Extra per tutte gli elementi di una categoria di fatto rimuove gli stessi dal calcolo della valutazione, per cui non ci sarà  il punteggio totale.';
$string['feedback'] = 'Feedback';
$string['feedbackadd'] = 'Aggiungi feedback';
$string['feedbackedit'] = 'Modifica feedback';
$string['feedbackforgradeitems'] = 'Feedback per {$a}';
$string['feedback_help'] = 'Consente di aggiungere commenti al voto.';
$string['feedbacks'] = 'Feedback';
$string['feedbacksaved'] = 'Feedback salvato';
$string['feedbackview'] = 'Vedi feedback';
$string['finalgrade'] = 'Valutazione finale';
$string['finalgrade_help'] = 'La valutazione finale ricavata al termine di tutti i calcoli.';
$string['fixedstudents'] = 'Colonna studenti bloccata';
$string['fixedstudents_help'] = 'Blocca la posizione della colonna contenente i nomi degli studenti mentre si scorre orizzontalmente il registro del valutatore.';
$string['forceoff'] = 'Forza: Disattivo';
$string['forceon'] = 'Forza: Attivo';
$string['forelementtypes'] = 'per il {$a} selezionato';
$string['forstudents'] = 'Per studenti';
$string['full'] = 'Tutte le colonne';
$string['fullmode'] = 'Tutte le colonne';
$string['fullview'] = 'Vista completa';
$string['generalsettings'] = 'Impostazioni generali';
$string['grade'] = 'Valutazione';
$string['gradeadministration'] = 'Gestione valutazioni';
$string['gradeanalysis'] = 'Analisi delle valutazioni';
$string['gradebook'] = 'Registro Valutazioni';
$string['gradebookhiddenerror'] = 'Al momento il registro è impostato in modo da non visualizzare nessun elemento agli studenti.';
$string['gradebookhistories'] = 'Storico delle valutazioni';
$string['gradeboundary'] = 'Soglia per il livello';
$string['gradeboundary_help'] = 'Limite percentuale della valutazione al di sopra del quale verrà assegnato il corrispondente livello di graduatoria letterale.';
$string['gradecategories'] = 'Categorie valutazione';
$string['gradecategory'] = 'Categoria valutazione';
$string['gradecategoryonmodform'] = 'Categoria della valutazione';
$string['gradecategoryonmodform_help'] = 'Imposta la categoria del registro valutatore nella quale comparirà la valutazione dell\'attività.';
$string['gradecategorysettings'] = 'Impostazioni categorie';
$string['gradedisplay'] = 'Visualizzazione della valutazione';
$string['gradedisplaytype'] = 'Visualizza i voti come';
$string['gradedisplaytype_help'] = 'Imposta la modalità di visualizzazione nel registro valutatore e nella scheda individuale

Punteggio - i voti effettivi
Percentuale
Graduatoria letterale - lettere o parole che rappresentano un intervallo di valutazioni';
$string['gradedon'] = 'Valutato: {$a}';
$string['gradeexport'] = 'Esportazione valutazioni';
$string['gradeexportcustomprofilefields'] = 'Campi personalizzati da esportare con le valutazioni';
$string['gradeexportcustomprofilefields_desc'] = 'Imposta i campi personalizzati del profilo utente da includere quando si esportano le valutazioni. Inserire l\'elenco dei campi personalizzati separati da virgola.';
$string['gradeexportdecimalpoints'] = 'Cifre decimali da usare nelle esportazioni';
$string['gradeexportdecimalpoints_desc'] = 'Numero di cifre decimali da usare nelle esportazioni. Questa impostazione può essere modificata quando si configura l\'esportazione.';
$string['gradeexportdisplaytype'] = 'Esporta i voti come';
$string['gradeexportdisplaytype_desc'] = 'I voti possono essere esportati come punteggio, come percentuali (in riferimento alla valutazione minima e massima) o come graduatoria letterale (A, B, C, ecc.). Questa impostazione può essere modificata quando si configura l\'esportazione.';
$string['gradeexportuserprofilefields'] = 'Campi profilo utente da esportare con le valutazioni';
$string['gradeexportuserprofilefields_desc'] = 'Imposta i campi del profilo utente da includere quando si esportano le valutazioni. Inserire l\'elenco dei campi personalizzati separati da virgola.';
$string['gradeforstudent'] = '{$a->student}<br />{$a->item}{$a->feedback}';
$string['gradehelp'] = 'Help valutazioni';
$string['gradehistorylifetime'] = 'Durata storia valutazioni';
$string['gradehistorylifetime_help'] = 'Specifica per quanto tempo si vuole conservare la storia delle modifiche nelle tabelle relative alle valutazioni. Si raccomanda di definire un tempo più lungo possibile. Se si manifestano problemi di performance o si dispone di spazio limitato per il database, impostare un valore più basso.';
$string['gradeimport'] = 'Importazione valutazioni';
$string['gradeimportfailed'] = 'Errore durante l\'importazione delle valutazioni. Dettagli:';
$string['gradeitem'] = 'Elemento di valutazione';
$string['gradeitemaddusers'] = 'Escludi dalla valutazione';
$string['gradeitemadvanced'] = 'Impostazioni avanzate degli elementi di valutazione';
$string['gradeitemadvanced_help'] = 'Selezionare le proprietà degli elementi di valutazione che desiderate considerare come \'impostazioni avanzate\' nella schermata di modifica degli elementi stessi.';
$string['gradeitemislocked'] = 'Questa attività risulta bloccata nel registro del valutatore. Le modifiche apportate alle valutazioni di questa attività non saranno riportate nel registro del valutatore finché l\'attività non sarà sbloccata.';
$string['gradeitemlocked'] = 'Valutazione bloccata';
$string['gradeitemmembersselected'] = 'Esclusi dalle valutazioni';
$string['gradeitemnonmembers'] = 'Inclusi nelle valutazioni';
$string['gradeitemremovemembers'] = 'Includi nelle valutazioni';
$string['gradeitems'] = 'Elementi valutazione';
$string['gradeitemsettings'] = 'Impostazioni elementi';
$string['gradeitemsinc'] = 'Elementi valutazione da includere';
$string['gradeletter'] = 'Livello';
$string['gradeletter_help'] = '<p>Espressione alfanumerica che rappresenta un dato livello di valutazione.</p>';
$string['gradeletternote'] = 'Per eliminare una graduatoria letterale eliminare il contenuto di <br /> una delle tre aree di testo e salvare le modifiche.';
$string['gradeletters'] = 'Graduatoria letterale';
$string['gradelocked'] = 'La valutazione è bloccata';
$string['gradelong'] = '{$a->grade} / {$a->max}';
$string['grademax'] = 'Voto massimo';
$string['grademax_help'] = '<p>Scegliendo il Tipo di Valutazione \'Valore\', tramite questa impostazione è possibile impostare il Voto massimo. Il voto massimo di un elemento di valutazione basato su una attività si imposta nella pagina di modifica dell\'attività.</p>';
$string['grademin'] = 'Voto minimo';
$string['grademin_help'] = '<p>Scegliendo il Tipo di Valutazione \'Valore\', tramite questa impostazione è possibile impostare il Voto minimo.</p>';
$string['gradeoutcomeitem'] = 'Elemento raggiungimento obiettivo';
$string['gradeoutcomes'] = 'Obiettivi';
$string['gradeoutcomescourses'] = 'Obiettivi di corso';
$string['gradepass'] = 'Sufficienza';
$string['gradepass_help'] = 'Rappresenta il voto minimo necessario per considerare l\'attività come superata. Questo voto sarà utilizzato per il completamento delle attività è dei corsi. Nel registro valutatore il voto sarà visualizzato in rosso (non superato) o verde (superato)';
$string['gradepreferences'] = 'Preferenze valutazioni';
$string['gradepreferenceshelp'] = 'Help Preferenze nelle valutazioni';
$string['gradepublishing'] = 'Abilita pubblicazione';
$string['gradepublishing_help'] = 'Abilitando la pubblicazione è possibile importare ed esportare le valutazioni accedendo ad una URL, senza la necessità di eseguire il login nel sito. Le valutazioni pubblicate possono essere importate accedendo direttamente alla URL consentendo ad altri siti (ad esempio un altro sito Moodle) di importare le valutazioni da questo sito. Per default solo gli amministratori possono abilitare questa funzione: è bene informare adeguatamente i vostri utenti prima di conferigli i privilegi necessari alla pubblicazione delle valutazioni in quanto si corrono dei rischi se questa funzione viene usata in modo improprio (bookmark sharing e acceleratori download, restrizioni IP, ecc.).';
$string['gradereport'] = 'Report valutazioni';
$string['graderreport'] = 'Registro valutatore';
$string['grades'] = 'Valutazioni';
$string['gradesforuser'] = 'Voti di {$a->user}';
$string['gradesonly'] = 'Solo le colonne con i voti';
$string['gradessettings'] = 'Impostazioni generali';
$string['gradetype'] = 'Tipo valutazione';
$string['gradetype_help'] = '<p>Specifica il tipo di valutazione da usare: Nessuno (non è possibile dare un voto), Valore (consente l\'impostazione del Voto massimo e minimo), Scala (consente l\'uso di una scala di valutazione), Testo (consente solo l\'uso dei feedback). Solamente i tipi Valore e Scala possono essere aggregati. Il tipo di valutazione per un elemento basato su un\'attività si imposta nella pagina di modifica dell\'attività.</p>';
$string['gradeview'] = 'Vedi valutazione';
$string['gradeweighthelp'] = 'Help peso valutazioni';
$string['groupavg'] = 'Media di gruppo';
$string['hidden'] = 'Nascosto';
$string['hiddenasdate'] = 'Visualizza la data dei voti nascosti';
$string['hiddenasdate_help'] = 'Se l\'utente non è autorizzato a vedere i voti nascosti, tramite questa impostazione potrà comunque vedere la data in cui ha ricevuto il voto.';
$string['hidden_help'] = 'I voti saranno invisibili agli studenti. E\' anche possibile indicare una data dopo la quale gli studenti potranno visualizzare i voti.';
$string['hiddenuntil'] = 'Nascosto fino al';
$string['hiddenuntildate'] = 'Nascosto fino al: {$a}';
$string['hideadvanced'] = 'Nascondi opzioni avanzate';
$string['hideaverages'] = 'Nascondi medie di colonna';
$string['hidecalculations'] = 'Nascondi calcolatrice';
$string['hidecategory'] = 'Nascosta';
$string['hideeyecons'] = 'Nascondi icona visibilità';
$string['hidefeedback'] = 'Nascondi feedback';
$string['hideforcedsettings'] = 'Nascondi impostazioni forzate';
$string['hideforcedsettings_help'] = 'Le impostazioni forzate non saranno visualizzate nella interfaccia del registro valutatore';
$string['hidegroups'] = 'Nascondi gruppi';
$string['hidelocks'] = 'Nascondi icona blocca/sblocca';
$string['hidenooutcomes'] = 'Visualizza obiettivi';
$string['hidequickfeedback'] = 'Nascondi feedback rapido';
$string['hideranges'] = 'Nascondi intervalli';
$string['hidetotalifhiddenitems'] = 'Nasconde i totali se contengono elementi nascosti';
$string['hidetotalifhiddenitems_help'] = 'L\'impostazione determina come saranno visualizzati agli studenti i totali che aggregano voti nascosti, sostituiti con un meno (-) o visualizzati. Se  saranno visualizzati, il totale potrà aggregare i voti nascosti oppure no.

Se i voti nascosti non vengono aggregati, i totali visibili agli studenti potranno essere diversi dagli stessi totali visualizzati dai docenti poiché i docenti visualizzano tutti i voti, compresi quelli nascosti. Se i voti nascosti non vengono aggregati, gli studenti potrebbero essere in grado di ricavarli.';
$string['hidetotalshowexhiddenitems'] = 'Visualizza i totali escludendo gli elementi nascosti';
$string['hidetotalshowinchiddenitems'] = 'Visualizza i totali inclusivi di elementi nascosti';
$string['hideverbose'] = 'Nascondi {$a->category} {$a->itemmodule} {$a->itemname}';
$string['highgradeascending'] = 'Ordina per voti alti crescenti';
$string['highgradedescending'] = 'Ordinamento decrescente dei voti migliori';
$string['highgradeletter'] = 'Max';
$string['identifier'] = 'Identifica utente con';
$string['idnumbers'] = 'codici identificativi';
$string['ignore'] = 'Ignora';
$string['import'] = 'Importa';
$string['importcsv'] = 'Importazione CSV';
$string['importcustom'] = 'Importa come obiettivi di questo corso';
$string['importerror'] = 'Si è verificato un errore, questo script non è stato attivato con i giusti parametri.';
$string['importfailed'] = 'Importazione non riuscita';
$string['importfeedback'] = 'Importa feedback';
$string['importfile'] = 'Importa da file';
$string['importfilemissing'] = 'Nessun file è stato ricevuto, torna indietro sul form e assicurati di carica un file valido.';
$string['importfrom'] = 'Importa da';
$string['importoutcomenofile'] = 'Il file caricato è vuoto o difettoso. Verifica che sia un file valido. Il problema è stato rilevato alla riga {$a}, che non sembra avere lo stesso numero di colonne della prima riga (riga di testata) oppure il file importato manca della testata. Guarda un file esportato come esempio di file con una testata valida.';
$string['importoutcomes'] = 'Importa obiettivi';
$string['importoutcomes_help'] = 'Gli obiettivi possono essere importati via file csv con lo stesso formato dell\'esportazione.';
$string['importoutcomesuccess'] = 'Obiettivo importato "{$a->name}" con ID #{$a->id}';
$string['importplugins'] = 'Plugin Importazione';
$string['importpreview'] = 'Anteprima importazione';
$string['importsettings'] = 'Impostazioni importazione';
$string['importskippednomanagescale'] = 'Non hai il permesso di aggiungere una nuova scala, per cui l\'obiettivo "{$a}" è stato saltato dal momento che richiedeva la creazione di una nuova scala';
$string['importskippedoutcome'] = 'Un obiettivo con nome breve "{$a}" già esiste in questo contesto, e quindi il corrispondente nel file importato è stato saltato';
$string['importstandard'] = 'Importa come obiettivi standard';
$string['importsuccess'] = 'Importazione valutazioni effettuata';
$string['importxml'] = 'Importazione XML';
$string['includescalesinaggregation'] = 'Aggrega le scale';
$string['includescalesinaggregation_help'] = 'Le scale possono essere incluse nelle aggregazioni dei voti equiparandole a valori numerici. L\'impostazione influenza tutte le aggregazioni di voti. ATTENZIONE: la modifica di questa impostazione avvierà il ricalcolo di tutte le aggregazioni di voti.';
$string['incorrectcourseid'] = 'L\'ID del corso non è corretto';
$string['incorrectcustomscale'] = '(Scala personalizzata non corretta, per favore cambiatela.)';
$string['incorrectminmax'] = 'Il minimo deve essere inferiore al massimo';
$string['inherit'] = 'Eredita';
$string['intersectioninfo'] = 'Info Sudente/Voti';
$string['item'] = 'Elemento';
$string['iteminfo'] = 'Info elemento';
$string['iteminfo_help'] = 'Campo per inserire informazioni utili sull\'elemento di valutazione. Il testo inserito comparirà solo in questa pagina.';
$string['itemname'] = 'Nome elemento';
$string['itemnamehelp'] = 'Il nome di questo elemento, preso dal modulo.';
$string['items'] = 'Elementi';
$string['itemsedit'] = 'Modifica elemento valutazione';
$string['keephigh'] = 'Utilizza voti migliori';
$string['keephigh_help'] = 'Saranno utilizzato gli N voti migliori, dove N è il valore scelto.';
$string['keymanager'] = 'Gestore chiavi';
$string['lessthanmin'] = 'La valutazione inserita per {$a->itemname} per {$a->username} è inferiore al minimo consentito';
$string['letter'] = 'Graduatoria letterale';
$string['lettergrade'] = 'Graduatoria letterale';
$string['lettergradenonnumber'] = 'Il voto Basso e/o Alto non è numerico per';
$string['letterpercentage'] = 'Letterale (percentuale)';
$string['letterreal'] = 'Letterale (vera)';
$string['letters'] = 'Graduatoria letterale';
$string['linkedactivity'] = 'Attività collegata';
$string['linkedactivity_help'] = '<p>Indica l\'attività (o le attività) alla quale è collegato l\'obiettivo. Gli obiettivi sono utili per misurare le performance di uno studente in base a criteri diversi dal voto.</p>';
$string['linktoactivity'] = 'Collegamento all\'attività {$a->name}';
$string['lock'] = 'Blocca';
$string['locked'] = 'Bloccato';
$string['locked_help'] = 'Impedisce l\'aggiornamento automatico del voto da parte dell\'attività correlata.';
$string['locktime'] = 'Bloccato a partire da';
$string['locktimedate'] = 'Bloccata a partire da: {$a}';
$string['lockverbose'] = 'Blocca {$a->category} {$a->itemmodule} {$a->itemname}';
$string['lowest'] = 'Minimo';
$string['lowgradeletter'] = 'Min';
$string['manualitem'] = 'Elemento manuale';
$string['mapfrom'] = 'Mappa da';
$string['mappings'] = 'Mappatura degli elementi di valutazione';
$string['mapto'] = 'Mappa a';
$string['max'] = 'Massimo';
$string['maxgrade'] = 'Voto massimo';
$string['meanall'] = 'Tutti i voti, compresi i voti mancanti';
$string['meangraded'] = 'Solo i voti presenti nel registro';
$string['meanselection'] = 'Voti inclusi nel calcolo delle medie di colonna';
$string['meanselection_help'] = 'E\' possibile scegliere come calcolare le medie di colonna, includendo oppure escludendo i voti non ancora presenti nel registro del valutatore.';
$string['median'] = 'Mediana';
$string['min'] = 'Minimo';
$string['missingscale'] = 'Deve essere scelta la scala';
$string['mode'] = 'Moda';
$string['morethanmax'] = 'La valutazione immessa per {$a->itemname} for {$a->username} è superiore al massimo consentito';
$string['moveselectedto'] = 'Sposta gli elementi sezionanti in';
$string['movingelement'] = 'Spostamento {$a}';
$string['multfactor'] = 'Moltiplicatore';
$string['multfactor_help'] = '<p>Fattore di moltiplicazione dei voti di questo elemento. Il tetto è sempre il Voto massimo.</p>';
$string['multfactorvalue'] = 'Moltiplicatore per {$a}';
$string['mypreferences'] = 'Preferenze';
$string['myreportpreferences'] = 'Preferenze';
$string['navmethod'] = 'Modalità di navigazione';
$string['neverdeletehistory'] = 'Non eliminare mai la storia';
$string['newcategory'] = 'Nuova categoria';
$string['newitem'] = 'Nuovo elemento di valutazione';
$string['newoutcomeitem'] = 'Nuovo obiettivo';
$string['no'] = 'No';
$string['nocategories'] = 'Categorie di valutazione non possono essere aggiunte o trovate per questo corso';
$string['nocategoryname'] = 'Manca il nome categoria.';
$string['nocategoryview'] = 'Nessuna categoria utilizzabile per la visualizzazione';
$string['nocourses'] = 'Non ci sono ancora corsi';
$string['noforce'] = 'Non forzare';
$string['nogradeletters'] = 'Graduatoria letterale non impostata';
$string['nogradesreturned'] = 'Non è stata ottenuta alcuna valutazione';
$string['noidnumber'] = 'Nessun codice identificativo';
$string['nolettergrade'] = 'Nessuna valutazione letterale per';
$string['nomode'] = 'NA';
$string['nonnumericweight'] = 'Ricevuto un valore non numerico per';
$string['nonunlockableverbose'] = 'Questo voto non può essere sbloccata finché non sarà sbloccato l\'elemento {$a->itemname}.';
$string['nonweightedpct'] = '% non pesata';
$string['nooutcome'] = 'Nessun obiettivo';
$string['nooutcomes'] = 'Gli elementi obiettivo devono essere collegati ad obiettivi di corso, ma non ci sono obiettivi in questo corso. Volete aggiungerne uno?';
$string['nopublish'] = 'Non pubblicare';
$string['norolesdefined'] = 'Non ci sono ruoli definiti in Amministrazione > Valutazioni > Impostazioni Generali > Ruoli riportati nel registro';
$string['noscales'] = 'Gli obiettivi devono essere collegati ad una scala presente nel corso oppure ad una scala standard. Non ci sono scale disponibili, volete aggiungerne una?';
$string['noselectedcategories'] = 'nessuna categoria selezionata.';
$string['noselecteditems'] = 'nessun elemento selezionato.';
$string['notteachererror'] = 'È necessario essere docente per utilizzare questa caratteristica.';
$string['nousersloaded'] = 'Nessun utente caricato';
$string['numberofgrades'] = 'Numero di valutazioni';
$string['onascaleof'] = 'su una scala da {$a->grademin} a {$a->grademax}';
$string['operations'] = 'Operazioni';
$string['options'] = 'Opzioni';
$string['others'] = 'Altri';
$string['outcome'] = 'Obiettivo';
$string['outcomeassigntocourse'] = 'Assegna un altro obiettivo a questo corso';
$string['outcomecategory'] = 'Crea obiettivi nella categoria';
$string['outcomecategorynew'] = 'Nuova categoria';
$string['outcomeconfirmdelete'] = 'Sei sicuro di eliminare l\'obiettivo "{$a}"?';
$string['outcomecreate'] = 'Aggiungi un obiettivo';
$string['outcomedelete'] = 'Elimina obiettivo';
$string['outcomefullname'] = 'Nome';
$string['outcome_help'] = 'L\'obiettivo che questo elemento di valutazione rappresenta.';
$string['outcomeitem'] = 'Elemento obiettivo';
$string['outcomeitemsedit'] = 'Modifica elemento obiettivo';
$string['outcomereport'] = 'Scheda obiettivi';
$string['outcomes'] = 'Obiettivi';
$string['outcomescourse'] = 'Obiettivi in uso nel corso';
$string['outcomescoursecustom'] = 'Personalizzati (non rimuovere)';
$string['outcomescoursenotused'] = 'Standard non usati';
$string['outcomescourseused'] = 'Standard (non rimuovere)';
$string['outcomescustom'] = 'Obiettivi personalizzati';
$string['outcomeshortname'] = 'Nome abbreviato';
$string['outcomesstandard'] = 'Obiettivi standard';
$string['outcomesstandardavailable'] = 'Obiettivi standard disponibili';
$string['outcomestandard'] = 'Obiettivo standard';
$string['outcomestandard_help'] = '<p>E\' un obiettivo definito a livello di sito e disponibile in qualsiasi corso.</p>';
$string['overallaverage'] = 'Media generale';
$string['overridden'] = 'Sostituito';
$string['overridden_help'] = '<p>L\'opzione Sostituito evita che un voto possa essere aggiornato automaticamente. Spesso l\'opzione viene impostata internamente dal registro delle valutazioni, tuttavia in questa pagina è possibile selezionare o deselezionare l\'opzione secondo necessità.</p>';
$string['overriddennotice'] = 'La tua valutazione finale da questa attività è stata modificata manualmente.';
$string['overridesitedefaultgradedisplaytype'] = 'Sostituisci il default del sito';
$string['overridesitedefaultgradedisplaytype_help'] = 'Consente di impostare a livello di corso graduatorie letterali e limiti diversi dai valori di default del sito.';
$string['parentcategory'] = 'Categoria superiore';
$string['pctoftotalgrade'] = '% del voto finale';
$string['percent'] = 'Percentuale';
$string['percentage'] = 'Percentuale';
$string['percentageletter'] = 'Percentuale (letterale)';
$string['percentagereal'] = 'Percentuale (vera)';
$string['percentascending'] = 'Ordina per percentuale crescente';
$string['percentdescending'] = 'Ordina per percentuale decrescente';
$string['percentshort'] = '%';
$string['plusfactor'] = 'Incremento';
$string['plusfactor_help'] = '<p>Valore numerico che sarà sommato ai voti. La somma avviene dopo aver applicato il Moltiplicatore.</p>';
$string['plusfactorvalue'] = 'Incremento per {$a}';
$string['points'] = 'Punti';
$string['pointsascending'] = 'Ordina per punti crescenti';
$string['pointsdescending'] = 'Ordina per punti decrescenti';
$string['positionfirst'] = 'Prima colonna';
$string['positionlast'] = 'Ultima colonna';
$string['preferences'] = 'Preferenze';
$string['prefgeneral'] = 'Generale';
$string['prefletters'] = 'Graduatoria letterale e limiti';
$string['prefrows'] = 'Righe speciali';
$string['prefshow'] = 'Parametri di visualizzazione';
$string['previewrows'] = 'Righe anteprima';
$string['profilereport'] = 'Report nel profilo utente';
$string['profilereport_help'] = 'Il tipo di report da visualizzare nella pagina del profilo utente';
$string['publishing'] = 'Pubblicazione';
$string['quickfeedback'] = 'Feedback rapido';
$string['quickgrading'] = 'Valutazione rapida';
$string['quickgrading_help'] = '<p>La valutazione rapida aggiunge una casella di input di testo per ogni elemento presente nel registro delle valutazioni, consentendo di inserire più velocemente i voti. Cliccando sul pulsante Aggiorna tutte le modifiche saranno salvate contemporaneamente.</p>';
$string['range'] = 'Intervallo';
$string['rangedecimals'] = 'Cifre decimali intervallo';
$string['rangedecimals_help'] = 'Il numero di cifre decimali da usare per l\'intervallo';
$string['rangesdecimalpoints'] = 'Decimali negli intervalli';
$string['rangesdecimalpoints_help'] = 'Imposta il numero di cifre decimali da usare nella visualizzazione degli intervalli dei voti. L\'impostazione può essere modificata per ciascun elemento di valutazione.';
$string['rangesdisplaytype'] = 'Visualizza intervalli come';
$string['rangesdisplaytype_help'] = '<p>Specifica il tipo di visualizzazione degli intervalli dei voti. Scegliendo Eredita, verrà utilizzato il tipo di visualizzazione già impostato per ciascuna colonna.</p>';
$string['rank'] = 'Classifica';
$string['rawpct'] = '% grezza';
$string['real'] = 'Punteggio';
$string['realletter'] = 'Punteggio (letterale)';
$string['realpercentage'] = 'Punteggio (percentuale)';
$string['recovergradesdefault'] = 'Default per il recupero delle valutazioni';
$string['recovergradesdefault_help'] = 'Recupera le valutazioni precedenti quando un utente si iscrive nuovamente in un corso';
$string['regradeanyway'] = 'Rivaluta comunque';
$string['removeallcoursegrades'] = 'Elimina tutte le valutazioni';
$string['removeallcourseitems'] = 'Elimina tutti gli elementi e le categorie';
$string['report'] = 'Report';
$string['reportdefault'] = 'Report default ({$a})';
$string['reportplugins'] = 'Report plugin';
$string['reportsettings'] = 'Impostazioni report';
$string['reprintheaders'] = 'Ristampa intestazioni';
$string['respectingcurrentdata'] = 'configurazione corrente inalterata';
$string['rowpreviewnum'] = 'Righe di anteprima';
$string['savechanges'] = 'Salva modifiche';
$string['savepreferences'] = 'Salva preferenze';
$string['scaleconfirmdelete'] = 'Sei sicuro di eliminare la scala "{$a}"?';
$string['scaledpct'] = 'Scalatura %';
$string['seeallcoursegrades'] = 'Vai alle valutazioni del corso';
$string['select'] = 'Seleziona {$a}';
$string['selectalloroneuser'] = 'Visualizza';
$string['selectauser'] = 'Seleziona un utente';
$string['selectdestination'] = 'Scegli la destinazione di {$a}';
$string['separator'] = 'Separatore';
$string['sepcolon'] = 'due punti';
$string['sepcomma'] = 'Virgola';
$string['sepsemicolon'] = 'punto e virgola';
$string['septab'] = 'Tabulatore';
$string['setcategories'] = 'Imposta categorie';
$string['setcategorieserror'] = 'Bisogna definire le categorie prima di dare dei pesi alle stesse.';
$string['setgradeletters'] = 'Imposta graduatoria letterale';
$string['setpreferences'] = 'Imposta preferenze';
$string['setting'] = 'Impostazione';
$string['settings'] = 'Impostazioni';
$string['setweights'] = 'Imposta pesi';
$string['showactivityicons'] = 'Visualizza icone attività';
$string['showactivityicons_help'] = 'Visualizza, oltre al nome, anche l\'icona rappresentativa del modulo di attività.';
$string['showallhidden'] = 'Visualizza voti nascosti';
$string['showallstudents'] = 'Visualizza tutti gli studenti';
$string['showanalysisicon'] = 'Visualizza icona Analisi delle valutazioni';
$string['showanalysisicon_desc'] = 'Visualizza per default l\'icona Analisi delle valutazioni. Se il modulo di attività lo supporta, l\'icona Analisi delle valutazioni sarà un link ad una pagina con il dettaglio sulla valutazione e come è stata raggiunta.';
$string['showanalysisicon_help'] = 'Se il modulo di attività lo supporta, l\'icona Analisi delle valutazioni sarà un link ad una pagina con il dettaglio sulla valutazione e come è stata raggiunta.';
$string['showaverage'] = 'Visualizza media';
$string['showaverage_help'] = 'Se visualizzare o meno la colonna della media.
Gli studenti potrebbero essere in gradi di ricavare i voti degli altri studenti se le medie sono calcolate da una campione di pochi valori. Per motivi di performance le medie dipendenti da voti nascoste sono approssimate.';
$string['showaverages'] = 'Visualizza medie di colonna';
$string['showaverages_help'] = 'Visualizza le medie di colonna nel registro del valutatore.';
$string['showcalculations'] = 'Visualizza calcolatrice';
$string['showcalculations_help'] = 'Visualizza l\'icona della calcolatrice accanto agli elementi di valutazione ed alle  categorie. Tramite l\'icona calcolatrice è possibile accedere alle funzioni di calcolo personalizzato. Nel registro del valutatore le colonne che contengono calcoli personalizzati sono evidenziate tramite un icona di calcolatrice più grande presente nell\'intestazione della colonna.';
$string['showeyecons'] = 'Visualizza icona visibilità';
$string['showeyecons_help'] = 'Visualizza l\'icona visibilità accanto ad ogni voto. L\'icona visibilità consente di nascondere i voti attribuiti agli utenti.';
$string['showfeedback'] = 'Visualizza feedback';
$string['showfeedback_help'] = 'Se visualizzare o meno la colonna del feedback';
$string['showgrade'] = 'Visualizza voti';
$string['showgrade_help'] = 'Se visualizzare o meno la colonna dei voti';
$string['showgroups'] = 'Visualizza medie di gruppo';
$string['showhiddenitems'] = 'Visualizza voti nascosti';
$string['showhiddenitems_help'] = 'Specifica come visualizzare agli studenti gli elementi di valutazione nascosti

* Visualizza elementi con voti nascosti - i voti saranno nascosti ma il nome dell\'elemento di valutazione sarà visibile
* Solo elementi con voti nascosti a tempo -
Gli elementi di valutazione e i voti saranno invisibili fino alla data prefissata, trascorsa la quale diventeranno visibili
* Non visualizzare elementi con voti nascosti - I voti e gli elementi di valutazione non saranno visibili';
$string['showhiddenuntilonly'] = 'Solo i voti nascosti a tempo';
$string['showlettergrade'] = 'Visualizza graduatoria letterale';
$string['showlettergrade_help'] = 'Se visualizzare o meno la colonna della graduatoria letterale';
$string['showlocks'] = 'Visualizza icona blocca/sblocca';
$string['showlocks_help'] = 'Visualizza l\'icona blocca/sblocca accanto ad ogni voto.';
$string['shownohidden'] = 'Non visualizzare';
$string['shownooutcomes'] = 'Nascondi obiettivi';
$string['shownumberofgrades'] = 'Visualizza numero voti usati nelle medie';
$string['shownumberofgrades_help'] = 'Visualizza tra parentesi, accanto ad ogni media, il numero di voti utilizzati per calcolare la media stessa. Esempio: 45 (34).';
$string['showonlyactiveenrol'] = 'Visualizza solo iscrizioni attive';
$string['showonlyactiveenrol_help'] = 'Nel registro del valutatore saranno visualizzati solo gli utenti la cui iscrizione è attiva. Gli utenti con l\'iscrizione sospesa non saranno elencati.';
$string['showpercentage'] = 'Visualizza percentuale';
$string['showpercentage_help'] = 'Visualizza le valutazioni ricevute anche in percentuale.';
$string['showquickfeedback'] = 'Visualizza feedback rapido';
$string['showquickfeedback_help'] = 'Il feeback rapido aggiunge una casella di input di testo per ciascun elemento presente sul registro valutatore, consentendo di modificare più velocemente i feedback. Cliccando sul pulsante Aggiorna tutte le modiche saranno salvate contemporaneamente.';
$string['showrange'] = 'Visualizza intervallo';
$string['showrange_help'] = 'Se visualizzare o meno la colonna dell\'intervallo';
$string['showranges'] = 'Visualizza intervalli';
$string['showranges_help'] = 'Visualizza nel registro del valutatore una riga contenente gli intervalli ammessi per i voti (voto minimo e voto massimo).';
$string['showrank'] = 'Visualizza classifica';
$string['showrank_help'] = 'Visualizza la posizione in classifica dell\'utente rispetto al resto della classe.';
$string['showuserimage'] = 'Visualizza immagine utente';
$string['showuserimage_help'] = 'Visualizza l\'immagine del profilo utente assieme al nome nel registro del valutatore.';
$string['showverbose'] = 'Visualizza {$a->category} {$a->itemmodule} {$a->itemname}';
$string['showweight'] = 'Visualizza pesi';
$string['showweight_help'] = 'Imposta la visualizzazione della colonna dei pesi';
$string['simpleview'] = 'Vista semplificata';
$string['sitewide'] = 'Obiettivo standard';
$string['sort'] = 'ordina';
$string['sortasc'] = 'Elenca in ordine ascendente';
$string['sortbyfirstname'] = 'Ordina per nome';
$string['sortbylastname'] = 'Ordina per cognome';
$string['sortdesc'] = 'Elenca in ordine discendente';
$string['standarddeviation'] = 'Deviazione standard';
$string['stats'] = 'Statistiche';
$string['statslink'] = 'Stat.';
$string['student'] = 'Studente';
$string['studentsperpage'] = 'Studenti per pagina';
$string['studentsperpage_help'] = 'Numero di studenti da visualizzare per pagina nel registro del valutatore.';
$string['studentsperpagereduced'] = 'Il numero di studenti per pagina è stato ridotto da {$a->originalstudentsperpage} a {$a->studentsperpage}. Valuta se è il caso di aumentare l\'impostazione PHP max_input_vars di {$a->maxinputvars}.';
$string['subcategory'] = 'Categoria normale';
$string['submissions'] = 'Invii';
$string['submittedon'] = 'Sottomesso: {$a}';
$string['switchtofullview'] = 'Passa alla vista completa';
$string['switchtosimpleview'] = 'Passa alla vista semplificata';
$string['tabs'] = 'Tab';
$string['topcategory'] = 'Categoria Super';
$string['total'] = 'Totale';
$string['totalweight100'] = 'Il peso totale è uguale a 100';
$string['totalweightnot100'] = 'Il peso totale non è uguale a 100';
$string['turnfeedbackoff'] = 'Disattiva feedback';
$string['turnfeedbackon'] = 'Attiva feedback';
$string['typenone'] = 'Nessuno';
$string['typescale'] = 'Scala';
$string['typescale_help'] = 'Tramite questa impostazione è possibile scegliere la scala da utilizzare. La scala da associare ad un elemento di valutazione basato su una attività si sceglie nella pagina di modifica dell\'attività.';
$string['typetext'] = 'Testo';
$string['typevalue'] = 'Valore';
$string['uncategorised'] = 'Senza categoria';
$string['unchangedgrade'] = 'Valutazione non modificata';
$string['unenrolledusersinimport'] = 'Questa importazione includeva le seguenti valutazioni per utenti attualmente non iscritti in questo corso: {$a}';
$string['unlimitedgrades'] = 'Voti privi di limiti';
$string['unlimitedgrades_help'] = 'Per default i voti sono limitati dal valore massimo e minino dell\'elemento di valutazione. Abilitando questa impostazione sarà possibile rimuovere questi limiti ed usare voti superiori al 100% nel registro del valutatore. Si consiglia di abilitare questa impostazione quando il server è scarico, abilitandolo infatti tutti voti saranno ricalcolati provocando un notevole carico sul server.';
$string['unlock'] = 'Sblocca';
$string['unlockverbose'] = 'Sblocca {$a->category} {$a->itemmodule} {$a->itemname';
$string['unused'] = 'Non usato';
$string['updatedgradesonly'] = 'Esporta valutazioni nuove o aggiornate solo';
$string['uploadgrades'] = 'Importa valutazioni';
$string['useadvanced'] = 'Usa opzioni avanzate';
$string['usedcourses'] = 'Corsi usati';
$string['usedgradeitem'] = 'Elemento di valutazione usato';
$string['usenooutcome'] = 'Nessun obiettivo';
$string['usenoscale'] = 'Nessuna scala';
$string['usepercent'] = 'Usa percentuale';
$string['user'] = 'Utente';
$string['userenrolmentsuspended'] = 'Iscrizione utente sospesa';
$string['usergrade'] = 'Utente {$a->fullname} ({$a->useridnumber}) su elemento di valutazione {$a->gradeidnumber}';
$string['userid'] = 'ID utente';
$string['usermappingerror'] = 'Errore mappatura utente. Non è stato possibile trovare l\'utente con {$a->field} contenente "{$a->value}".';
$string['usermappingerrorcurrentgroup'] = 'L\'utente non fa parte del gruppo';
$string['usermappingerrorusernotfound'] = 'Errore mappatura utente. Non è stato possibile trovare l\'utente.';
$string['userpreferences'] = 'Preferenze utente';
$string['useweighted'] = 'Usa pesi';
$string['verbosescales'] = 'Scale verbose';
$string['viewbygroup'] = 'Gruppo';
$string['viewgrades'] = 'Visualizza valutazioni';
$string['warningexcludedsum'] = 'Attenzione: l\'esclusone di voti non è compatibile con il tipo di aggregazione Somma.';
$string['weight'] = 'Peso';
$string['weightcourse'] = 'Usa valutazioni pesate per il corso';
$string['weightedascending'] = 'Ordinamento crescente per % pesata';
$string['weighteddescending'] = 'Ordinamento decrescente per % pesata';
$string['weightedpct'] = '% pesata';
$string['weightedpctcontribution'] = 'Contributo alla % pesata';
$string['weightorextracredit'] = 'Pesi o punti extra';
$string['weights'] = 'Pesi';
$string['weightsedit'] = 'Modifica pesi e punti extra';
$string['weightuc'] = 'Peso';
$string['writinggradebookinfo'] = 'Scrittura delle impostazioni del registro';
$string['xml'] = 'XML';
$string['yes'] = 'Si';
$string['yourgrade'] = 'La tua valutazione';
