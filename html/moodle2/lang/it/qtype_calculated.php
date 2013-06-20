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
 * Strings for component 'qtype_calculated', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_calculated
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additem'] = 'Aggiungi elemento';
$string['addmoreanswerblanks'] = 'Aggiungi un altro spazio risposta.';
$string['addmoreunitblanks'] = 'Spazi per altre {$a} unità';
$string['addsets'] = 'Aggiungi set';
$string['answerhdr'] = 'Risposta';
$string['answerstoleranceparam'] = 'Parametri di tolleranza risposte';
$string['answerwithtolerance'] = '{$a->answer} (±{$a->tolerance} {$a->tolerancetype})';
$string['anyvalue'] = 'Qualsiasi valore';
$string['atleastoneanswer'] = 'E\' necessario fornire almeno una risposta.';
$string['atleastonerealdataset'] = 'Nel testo della domanda ci dovrebbe essere almeno un dataset reale.';
$string['atleastonewildcard'] = 'Nel testo della domanda ci dovrebbe essere almeno una formula per caratteri jolly';
$string['calcdistribution'] = 'Distribuzione';
$string['calclength'] = 'Decimali';
$string['calcmax'] = 'Massimo';
$string['calcmin'] = 'Minimo';
$string['choosedatasetproperties'] = 'Scegli proprietà del dataset caratteri jolly';
$string['choosedatasetproperties_help'] = 'Un dataset è un insieme di dati utilizzati al posto di un carattere jolly.
E\' possibile creare un dataset "privato" per una data domanda, oppure una dataset condiviso che può essere impiegato in tutte le domande di una categoria.';
$string['correctanswerformula'] = 'Formula della risposta corretta';
$string['correctanswershows'] = 'Visualizza risposta corretta';
$string['correctanswershowsformat'] = 'Formato';
$string['correctfeedback'] = 'Per ogni risposta corretta';
$string['dataitemdefined'] = 'è disponibile con {$a} valori numerici già definiti';
$string['datasetrole'] = 'I caratteri jolly <strong>{x..}</strong> saranno sostituiti da un valore numerico preso dal proprio dataset';
$string['decimals'] = 'con {$a}';
$string['deleteitem'] = 'Elimina elemento';
$string['deletelastitem'] = 'Elimina ultimo elemento';
$string['distributionoption'] = 'Seleziona opzione di distribuzione';
$string['editdatasets'] = 'Modifica i dataset di caratteri jolly';
$string['editdatasets_help'] = 'I valori dei caratteri jolly possono essere creati inserendo un numero in ogni campo corrispondente e cliccando sul pulsante Aggiungi. Per generare automaticamente 10 o più valori, scegliere il numero di valori prima di cliccare su Aggiungi. Una distribuzione Uniform significa che ogni valore tra i limiti ha uguale probabilità di essere generato; una distribuzione Loguniform significa che valori verso il limite più basso sono più probabili.';
$string['existingcategory1'] = 'userà un dataset preesistente condiviso';
$string['existingcategory2'] = 'un file da un insieme esistente di file usati anche da altre domande in questa categoria';
$string['existingcategory3'] = 'un link da un insieme esistente di link usati anche da altre domande in questa categoria';
$string['forceregeneration'] = 'forza rigenerazione';
$string['forceregenerationall'] = 'forza rigenerazione di tutti i caratteri jolly';
$string['forceregenerationshared'] = 'forza rigenerazione dei soli caratteri jolly non condivisi';
$string['functiontakesatleasttwo'] = 'La funzione {$a} deve avere almeno due argomenti';
$string['functiontakesnoargs'] = 'La funzione {$a} non necessita di nessun argomento';
$string['functiontakesonearg'] = 'La funzione {$a} può avere solo un argomento';
$string['functiontakesoneortwoargs'] = 'La funzione {$a} può avere solo uno o due  argomenti';
$string['functiontakestwoargs'] = 'La funzione {$a} può avere solo due argomenti';
$string['generatevalue'] = 'Genera un nuovo valore compreso tra';
$string['getnextnow'] = 'Prendi un nuovo \'Elemento da aggiungere\'';
$string['hexanotallowed'] = 'Il formato esadecimale del valore {$a->value} del dataset <strong>{$a->name}</strong> non è consentito';
$string['illegalformulasyntax'] = 'La sintassi della formula che inizia per \'{$a}\' non è consentita';
$string['incorrectfeedback'] = 'Per ogni risposta errata';
$string['itemno'] = 'Elemento {$a}';
$string['itemscount'] = 'Numero<br/>Elementi';
$string['itemtoadd'] = 'Elemento da aggiungere';
$string['keptcategory1'] = 'userà lo stesso dataset preesistente  condiviso di prima';
$string['keptcategory2'] = 'un file dall\'insieme di file riutilizzabili della stessa categoria';
$string['keptcategory3'] = 'un link dall\'insieme di link riutilizzabili della stessa categoria';
$string['keptlocal1'] = 'userà lo stesso dataset privato di prima';
$string['keptlocal2'] = 'un file dall\'insieme privato di file della stessa domanda di prima';
$string['keptlocal3'] = 'un link dall\'insieme privato di link della stessa domanda di prima';
$string['lengthoption'] = 'Seleziona opzione lunghezza';
$string['loguniform'] = 'Loguniform';
$string['loguniformbit'] = 'cifre, da una distribuzione loguniform.';
$string['makecopynextpage'] = 'Pagina successiva (nuova domanda)';
$string['mandatoryhdr'] = 'Carattere jolly obbligatorio nelle risposte';
$string['max'] = 'Max';
$string['min'] = 'Min';
$string['minmax'] = 'Intervallo di valori';
$string['missingformula'] = 'Formula mancante';
$string['missingname'] = 'Nome della domanda mancantre';
$string['missingquestiontext'] = 'Testo della somanda mancante';
$string['mustbenumeric'] = 'Deve essere inserito un numero.';
$string['mustenteraformulaorstar'] = 'Devi inserire una formula oppure \'*\'.';
$string['mustnotbenumeric'] = 'Questo non può essere un numero.';
$string['newcategory1'] = 'userà un nuovo dataset condiviso';
$string['newcategory2'] = 'un file da un nuovo insieme di file che possono anche essere usati da altre domande in questa categoria';
$string['newcategory3'] = 'un link da un nuovo insieme di link che possono anche essere usati da altre domande in questa categoria';
$string['newlocal1'] = 'userà un nuovo dataset privato';
$string['newlocal2'] = 'un file da un nuovo insieme di file che saranno usati solo da questa domanda';
$string['newlocal3'] = 'un link da un nuovo insieme di link che saranno usati solo da questa domanda';
$string['newsetwildcardvalues'] = 'nuovo set di caratteri jolly';
$string['nextitemtoadd'] = 'Prossimo \'Item da aggiungere\'';
$string['nextpage'] = 'Pagina successiva';
$string['nocoherencequestionsdatyasetcategory'] = 'Per la domanda {$a->qid}, la categoria {$a->qcat} non è identica al carattere jolly condiviso {$a->name} categoria {$a->sharedcat}. Modifica la domanda.';
$string['nocommaallowed'] = 'La , non può essere usata, usa il . come in 0.013 oppure in 1.3e-2';
$string['nodataset'] = 'niente - non è un carattere jolly';
$string['nosharedwildcard'] = 'Nessun carattere jolly condiviso in questa categoria';
$string['notvalidnumber'] = 'Il valore del carattere jollu non è un numero valido';
$string['oneanswertrueansweroutsidelimits'] = 'Almeno una risposta corretta è al di fuori dei limiti dei valori veri.<br />Modifica l\'impostazione della tolleranza delle risposte con Parametri avanzati';
$string['param'] = 'Parametro {<strong>{$a}</strong>}';
$string['partiallycorrectfeedback'] = 'Per ogni risposta parzialmente corretta';
$string['pluginname'] = 'Calcolata';
$string['pluginnameadding'] = 'Creazione domanda calcolata';
$string['pluginnameediting'] = 'Modifica domanda calcolata';
$string['pluginname_help'] = 'Le domande \'calcolate\' offrono un modo per creare singole domande numeriche tramite l\'uso di caratteri jolly che vengono sostituiti da valori reali durante la somministrazione del quiz. Ad esempio, la domanda "Quale è l\'area di un rettangolo di lunghezza {l} e larghezza {w}?" avrà come risposta corretta la formula  "{l}*{w}" (dove * è il segno di moltiplicazione).';
$string['pluginnamesummary'] = 'Le domande Calcolate sono simili alla domande Numeriche dove però i numeri utilizzati sono scelti a caso durante lo svolgimento del quiz.';
$string['possiblehdr'] = 'Possibili caratteri jolly solo nel testo della domanda';
$string['questiondatasets'] = 'Dataset domanda';
$string['questiondatasets_help'] = 'Dataset di domanda di caratteri jolly che saranno utilizzati in ogni domanda individuale';
$string['questionstoredname'] = 'Nome memorizzato della domanda';
$string['replacewithrandom'] = 'Sostituisci con un valore casuale';
$string['reuseifpossible'] = 'riutilizza valore precedente, se disponibile';
$string['setno'] = 'Set {$a}';
$string['setwildcardvalues'] = 'set di valori jolly';
$string['sharedwildcard'] = 'Carattere jolly condiviso {<strong>{$a}</strong>}';
$string['sharedwildcardname'] = 'Carattere jolly condiviso';
$string['sharedwildcards'] = 'Caratteri jolly condivisi';
$string['showitems'] = 'Visualizza';
$string['significantfigures'] = 'con {$a}';
$string['significantfiguresformat'] = 'cifre significative';
$string['synchronize'] = 'Sincronizza i dati dei dataset condivisi con altre domande dei quiz';
$string['synchronizeno'] = 'Non sincronizzare';
$string['synchronizeyes'] = 'Sincronizza';
$string['synchronizeyesdisplay'] = 'Sincronizza e visualizza il nome del dataset condiviso come prefisso al nome della domanda';
$string['tolerance'] = 'Tolleranza &plusmn;';
$string['trueanswerinsidelimits'] = 'Risposta corretta: {$a->correct} dentro i limiti del valore vero {$a->true}';
$string['trueansweroutsidelimits'] = '<span class="error">ERRORE Risposta corretta: {$a->correct} fuori dai limiti del valore vero {$a->true}</span>';
$string['uniform'] = 'Uniform';
$string['uniformbit'] = 'decimali, da una distribuzione uniforme';
$string['unsupportedformulafunction'] = 'la funzione {$a} non è supportata';
$string['updatecategory'] = 'Aggiorna la categoria';
$string['updatedatasetparam'] = 'Aggiorna i parametri del dataset';
$string['updatetolerancesparam'] = 'Aggiorna il parametro di tolleranza della risposta';
$string['updatewildcardvalues'] = 'Aggiorna i valori dei caratteri jolly';
$string['useadvance'] = 'Usa il pulsante Avanti per vedere gli errori';
$string['usedinquestion'] = 'Usato nella domanda';
$string['wildcard'] = 'Carattere jolly {<strong>{$a}</strong>}';
$string['wildcardparam'] = 'Parametri caratteri jolly utilizzati per generare i valori';
$string['wildcardrole'] = 'I caratteri jolly <strong>{x..}</strong> saranno sostituiti da un valore numerico preso dai valori generati';
$string['wildcards'] = 'Caratteri jolly {a}...{z}';
$string['wildcardvalues'] = 'Valori caratteri jolly';
$string['wildcardvaluesgenerated'] = 'Valori caratteri jolly generati';
$string['youmustaddatleastoneitem'] = 'È necessario aggiungere almeno un dataset prima di poter salvare questa domanda.';
$string['youmustaddatleastonevalue'] = 'È necessario aggiungere almeno un set di caratteri jolly prima di poter salvare questa domanda.';
$string['youmustenteramultiplierhere'] = 'Deve essere inserito un moltiplicatore.';
$string['zerosignificantfiguresnotallowed'] = 'la risposta corretta non può avere zero cifre significative!';
