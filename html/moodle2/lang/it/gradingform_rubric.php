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
 * Strings for component 'gradingform_rubric', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   gradingform_rubric
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcriterion'] = 'Aggiungi criterio';
$string['alwaysshowdefinition'] = 'Gli utenti potranno visualizzare un\'anteprima del rubric in uso  (altrimenti il rubric sarà visibile solo dopo la valutazione)';
$string['backtoediting'] = 'Torna alla modifica';
$string['confirmdeletecriterion'] = 'Sei sicuro di eliminare questo criterio?';
$string['confirmdeletelevel'] = 'Sei sicuro di eliminare questo livello?';
$string['criterionaddlevel'] = 'Aggiungi livello';
$string['criteriondelete'] = 'Elimina criterio';
$string['criterionempty'] = 'Click per modificare il criterio';
$string['criterionmovedown'] = 'Sposta in basso';
$string['criterionmoveup'] = 'Sposta in alto';
$string['definerubric'] = 'Impostazione rubric';
$string['description'] = 'Descrizione';
$string['enableremarks'] = 'Consenti al valutatore di aggiungere commenti testuali ai criteri';
$string['err_mintwolevels'] = 'Ciascun criterio deve avere almeno due livelli';
$string['err_nocriteria'] = 'Il rubric deve contenere almeno un criterio';
$string['err_nodefinition'] = 'La definizione del livello non può essere lasciata in bianco';
$string['err_nodescription'] = 'La descrizione del criterio non può essere lasciata in bianco';
$string['err_scoreformat'] = 'I punteggi per ciascun livello devono essere numeri non negativi';
$string['err_totalscore'] = 'Il punteggio massimo possibile del rubric deve essere maggiore di zero.';
$string['gradingof'] = 'Valutazione di {$a}';
$string['leveldelete'] = 'Elimina livello';
$string['levelempty'] = 'Click per modificare il livello';
$string['name'] = 'Nome';
$string['needregrademessage'] = 'La definizione del rubric è stata cambiata dopo la valutazione di questo studente. Lo studente non potrà visualizzare questo rubric finché non controllerai il rubric e aggiornerai la valutazione';
$string['pluginname'] = 'Rubric';
$string['previewrubric'] = 'Anteprima rubric';
$string['regrademessage1'] = 'Stai per salvare modifiche ad un rubric che è già stato utilizzato per valutare. E\' necessario indicare quali valutazioni debbano essere riviste.Il rubrica non sarà visualizzabile dagli studenti finché non verranno nuovamente valutati.';
$string['regrademessage5'] = 'Stai per salvare modifiche significative ad un rubric che è già stato utilizzato per valutare. I valori presenti nel registro valutatore non saranno modificati, ma il rubric non sarà visualizzabile dagli studenti finché non verranno nuovamente valutati.';
$string['regradeoption0'] = 'Da non valutare nuovamente';
$string['regradeoption1'] = 'Da valutare nuovamente';
$string['restoredfromdraft'] = 'NOTA: l\'ultimo tentativo di valutare questa persona non è stato salvato correttamente e sono quindi state ripristinate le valutazioni in bozza. Se vuoi annullare questi cambiamenti usa il pulsante "Annulla" qui sotto.';
$string['rubric'] = 'Rubric';
$string['rubricmapping'] = 'Regole di conversione del punteggio in valutazione';
$string['rubricmappingexplained'] = 'Il punteggio minimo di questo rubric è b>{$a->minscore} points</b> e sarà convertito nel voto minimo disponibile per questo modulo (pari a zero a meno di usare una scala).
Il punteggio massimo <b>{$a->maxscore} points</b> sarà convertito nel voto massimo.<br />I punteggi intermedi saranno pure convertiti ed arrotondati al voto più vicino.<br />
Se si utilizza una scala al posto di un voto, il punteggio sarà convertito nell\'elemento corrispondente della scala considerando la scala come una sequenza di valori interi consecutivi.';
$string['rubricnotcompleted'] = 'Per favore seleziona qualcosa per ciascun criterio';
$string['rubricoptions'] = 'Opzioni rubric';
$string['rubricstatus'] = 'Stato del rubric';
$string['save'] = 'Salva';
$string['saverubric'] = 'Salva il rubric e rendilo disponibile';
$string['saverubricdraft'] = 'Salva come bozza';
$string['scorepostfix'] = '{$a} punti';
$string['showdescriptionstudent'] = 'Visualizza la descrizione del rubric a coloro che riceveranno la valutazione';
$string['showdescriptionteacher'] = 'Visualizza la descrizione del rubric durante la valutazione';
$string['showremarksstudent'] = 'Visualizza i commenti a coloro che riceveranno la valutazione';
$string['showscorestudent'] = 'Visualizza il punteggio per ciascun livello a coloro che saranno valutati';
$string['showscoreteacher'] = 'Visualizza il punteggio per ciascun livello durante la valutazione';
$string['sortlevelsasc'] = 'Ordinamento dei livelli:';
$string['sortlevelsasc0'] = 'Decrescente per punteggio';
$string['sortlevelsasc1'] = 'Crescente per punteggio';
