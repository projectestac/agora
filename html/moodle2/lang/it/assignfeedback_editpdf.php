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
 * Strings for component 'assignfeedback_editpdf', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_editpdf
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtoquicklist'] = 'Aggiungi alla quicklist';
$string['annotationcolour'] = 'Colore annotazione';
$string['black'] = 'Nero';
$string['blue'] = 'Blu';
$string['cannotopenpdf'] = 'Non è possibile aprire il file PDF. Il file può essere corrotto o in un formato non supportato.';
$string['clear'] = 'Pulisci';
$string['colourpicker'] = 'Tavolozza colori';
$string['command'] = 'Comando:';
$string['comment'] = 'Commenti';
$string['commentcolour'] = 'Colore commento';
$string['commentcontextmenu'] = 'Menu contestuale commenti';
$string['couldnotsavepage'] = 'Non è stato possibile salvare la pagina {$a}';
$string['currentstamp'] = 'Timbro';
$string['deleteannotation'] = 'Elimina annotazione';
$string['deletecomment'] = 'Elimina commento';
$string['deletefeedback'] = 'Elimina feedback PDF';
$string['downloadablefilename'] = 'feedback.pdf';
$string['downloadfeedback'] = 'Scarica feedback PDF';
$string['editpdf'] = 'Annotazione PDF';
$string['editpdf_help'] = 'Consente di annotare con il browser le consegne degli studenti e di generare un file PDF scaricabile.';
$string['enabled'] = 'Annotazione PDF';
$string['enabled_help'] = 'I docenti potranno annotare file PDF durante la valutazione dei compiti, aggiungendo commenti, segni e timbri sulla consegna degli studenti. Per annotare non sono necessari software aggiuntivi, è sufficiente il browser.';
$string['errorgenerateimage'] = 'Si è verificato un errore durante la generazione dell\'immagine con ghostscript, informazioni di debug: {$a}';
$string['filter'] = 'Filtra commenti...';
$string['generatefeedback'] = 'Genera feedback PDF';
$string['generatingpdf'] = 'Generazione PDF in corso...';
$string['gotopage'] = 'Vai a pagina';
$string['green'] = 'Verde';
$string['gspath'] = 'Percorso per ghostscript';
$string['gspath_help'] = 'In ambienti Linux in genere il percorso è \'/usr/bin/gs\'.
In ambienti Windows il percorso può essere \'c:gsbingswin32c.exe\'. (accertarsi che non ci siano spazi bianchi nel percorso - se necessario copiare i file \'gswin32c.exe\' e \'gsdll32.dll\' in una cartella dove non sono presenti spazi bianchi nel percorso)';
$string['highlight'] = 'Evidenziato';
$string['jsrequired'] = 'Per annotare documenti PDF è necessario javascript. Per favore abilitare javascript nel browser per usare questa funzionalità.';
$string['launcheditor'] = 'Lancio dell\'editor PDF';
$string['line'] = 'Linea';
$string['loadingeditor'] = 'Caricamento editor PDF';
$string['navigatenext'] = 'Pagina successiva';
$string['navigateprevious'] = 'Pagina precedente';
$string['output'] = 'Output:';
$string['oval'] = 'Ovale';
$string['pagenumber'] = 'Pagina {$a}';
$string['pagexofy'] = 'Pagina {$a->page} di {$a->total}';
$string['pen'] = 'Penna';
$string['pluginname'] = 'Annotazione PDF';
$string['rectangle'] = 'Rettangolo';
$string['red'] = 'Rosso';
$string['result'] = 'Risultato:';
$string['searchcomments'] = 'Cerca commenti';
$string['select'] = 'Seleziona';
$string['stamp'] = 'Timbro';
$string['stamppicker'] = 'Tavolozza timbri';
$string['stamps'] = 'Timbri';
$string['stampsdesc'] = 'I timbri devono essere file di immagini (dimensione consigliata 40x40). E\' possibile usare le immagini come timbri per annotare PDF.';
$string['test_doesnotexist'] = 'Il percorso ghostscript punta ad un file inesistente';
$string['test_empty'] = 'Il percorso ghostscript è vuoto - per favore inserire il percorso corretto';
$string['testgs'] = 'Percorso ghostscript';
$string['test_isdir'] = 'Il percorso ghostscript punta ad una cartella, per favore includere il programma ghostscript nel percorso indicato';
$string['test_notestfile'] = 'Il test PDF è mancante';
$string['test_notexecutable'] = 'Il percorso ghostscript punta ad un file non eseguibile';
$string['test_ok'] = 'Il percorso ghostscript sembra OK - verifica se sotto è visibile un messaggio nell\'immagine sottostante.';
$string['tool'] = 'Strumento';
$string['toolbarbutton'] = '{$a->tool} {$a->shortcut}';
$string['unsavedchanges'] = 'Modifiche non salvate';
$string['viewfeedbackonline'] = 'Visualizza pdf annotato...';
$string['white'] = 'Bianco';
$string['yellow'] = 'Giallo';
$string['zlibnotavailable'] = 'L\'estensione PHP "zlib" non è disponibile. La funzionalità annotazione PDF dipende da questa estensione PHO sarà disabilitata finché l\'estensione zlib non sarà installata e abilitata';
