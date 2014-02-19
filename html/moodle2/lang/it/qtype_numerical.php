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
 * Strings for component 'qtype_numerical', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_numerical
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acceptederror'] = 'Errore accettato';
$string['addmoreanswerblanks'] = 'Spazi per altre {no} risposte';
$string['addmoreunitblanks'] = 'Spazi per altre {no} unità';
$string['answercolon'] = 'Risposta:';
$string['answermustbenumberorstar'] = 'La risposta deve essere un numero, ad esempio -1.234 or 3e8, oppure \'*\'.';
$string['answerno'] = 'Risposta {$a}';
$string['decfractionofquestiongrade'] = 'come frazione decimale (0-1) della valutazione della domanda';
$string['decfractionofresponsegrade'] = 'come frazione decimale (0-1) del voto della  risposta';
$string['decimalformat'] = 'decimali';
$string['editableunittext'] = 'l\'elemento input testo';
$string['errornomultiplier'] = 'Devi specificare un moltiplicatore per questa unità.';
$string['errorrepeatedunit'] = 'Non puoi avere due unità con lo stesso nome.';
$string['geometric'] = 'Geometrico';
$string['invalidnumber'] = 'Devi inserire un numero valido.';
$string['invalidnumbernounit'] = 'Devi inserire un numero valido. Non aggiungere una unità nella risposta';
$string['invalidnumericanswer'] = 'Una delle risposte date non è un numero valido.';
$string['invalidnumerictolerance'] = 'Una delle tolleranze inserite non è un numero valido.';
$string['leftexample'] = 'a sinistra, ad esempio $1.00 o £1.00';
$string['manynumerical'] = 'Le unità sono opzionali. Se si inserisce un\'unità, verrà utilizzata per convertire la risposta data all\'Unità 1 prima della valutazione.';
$string['multiplier'] = 'Moltiplicatore';
$string['nominal'] = 'Nominale';
$string['noneditableunittext'] = 'Testo dell\'Unità 1 NON modificabile';
$string['nonvalidcharactersinnumber'] = 'Caratteri NON validi nel numero';
$string['notenoughanswers'] = 'Devi inserire almeno una risposta.';
$string['nounitdisplay'] = 'Senza valutazione unità';
$string['numericalmultiplier'] = 'Moltiplicatore';
$string['numericalmultiplier_help'] = 'Il moltiplicatore è il fattore per il quale la risposta numerica corretta verrà moltiplicata.

La prima unità (Unità 1) ha un moltiplicatore default pari a 1. Per cui se la risposta numerica corretta è 5500 e si è impostato W come unità nella Unità 1, che ha 1 come moltiplicatore default, la risposta corretta è 5500 W.

Se si aggiunge l\'unità kW con un moltiplicatore di 0,001, questo aggiungerà una risposta corretta di 5,5 kW. Questo significa che le risposte 5500W e 5,5kW saranno entrambi corrette.

Da notare che sarà anche moltiplicato l\'errore accettabile, così che un errore accettabile di 100W diventerà un errore di 0,1kW.';
$string['oneunitshown'] = 'L\'unità 1 è visualizzata automaticamente accanto alla casella della risposta.';
$string['onlynumerical'] = 'Le unità non vengono usate. Sarà valutato solo il valore numerico.';
$string['pleaseenterananswer'] = 'Per favore inserisci una risposta';
$string['pleaseenteranswerwithoutthousandssep'] = 'Per favore inserisci la tua risposta senza il separatore delle migliaia ({$a}).';
$string['pluginname'] = 'Numerica';
$string['pluginnameadding'] = 'Creazione domanda Numerica';
$string['pluginnameediting'] = 'Modifica domanda Numerica';
$string['pluginname_help'] = 'Dal punto di vista dello studente una domanda numerica appare come una domanda a risposta breve. La differenza è che le risposte numeriche possono avere un errore accettabile. Questo consente che un intero range di risposte possano essere valutate come una sola risposta. Per esempio, se la risposta è 10 con un errore accettabile di 2, ogni numero tra 8 e 12 sarà accettato come corretto.';
$string['pluginnamesummary'] = 'Consente l\'uso di risposte numeriche, possibilmente con unità, valutate rispetto a modelli di risposta, possibilmente con tolleranza.';
$string['relative'] = 'Relativo';
$string['rightexample'] = 'a destra, ad esempio  come 1.00cm or 1.00km';
$string['selectunit'] = 'Scegli una unità';
$string['selectunits'] = 'Seleziona unità';
$string['studentunitanswer'] = 'Le unità sono inserite usando';
$string['tolerancetype'] = 'Tipo di tolleranza';
$string['unit'] = 'Unità';
$string['unitappliedpenalty'] = 'Questi punteggi includono una penalità di {$a} per unità errata.';
$string['unitchoice'] = 'selezione a scelta multipla';
$string['unitedit'] = 'Modifica unità';
$string['unitgraded'] = 'Le unità devono essere date e saranno oggetto di valutazione';
$string['unithandling'] = 'Gestione unità';
$string['unithdr'] = 'Unità {$a}';
$string['unitincorrect'] = 'Non hai fornito l\'unità corretta.';
$string['unitmandatory'] = 'Obbligatorio';
$string['unitmandatory_help'] = '* La risposta sarà valutata in base all\'unità scritta

* La penalità sarà applicata se il campo per le unità rimane vuoto';
$string['unitnotselected'] = 'Devi selezionare una unità';
$string['unitonerequired'] = 'Devi selezionare almeno una unità';
$string['unitoptional'] = 'Unità opzionale';
$string['unitoptional_help'] = '* verrà utilizzata l\'unità specificata nel campo corrispondente

* se l\'unità non sarà riportata correttamente, o risulterà comunque sconosciuta, la risposta non sarà considerata valida';
$string['unitpenalty'] = 'Penalità per unità';
$string['unitpenalty_help'] = 'La penalità sarà applicata se

* un nome unità errato viene inserito nello spazio previsto per l\'unità oppure
 * un\'unità viene inserita nello spazio previsto per il valore';
$string['unitposition'] = 'Posizione unità';
$string['unitselect'] = 'menu a discesa';
$string['validnumberformats'] = 'Formati numerici validi';
$string['validnumberformats_help'] = '* numeri corretti: 13500.67 : 13 500.67 : 13500,67: 13 500,67

* se il language pack usa la virgola (,) come separatore di migliaia usa *sempre* il punto (.) come separatore decimale come in: 13,500.67 : 13,500.

* per i numeri con esponente del tipo: 1.350067 * 10<sup>4</sup>, usa la notazione  1.350067 E4 : 1.350067 E04';
$string['validnumbers'] = '13500.67, 13 500.67, 13,500.67, 13500,67, 13 500,67, 1.350067 E4 or 1.350067 E04';
