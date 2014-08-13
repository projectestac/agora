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
 * Strings for component 'assignfeedback_editpdf', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_editpdf
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtoquicklist'] = 'Afegeix a la llista ràpida';
$string['annotationcolour'] = 'Color de l\'anotació';
$string['black'] = 'Negre';
$string['blue'] = 'Blau';
$string['cannotopenpdf'] = 'No es pot obrir el PDF. El fitxer pot estar corrupte o tindre un format no suportat.';
$string['clear'] = 'Suprimeix';
$string['colourpicker'] = 'Selector de color';
$string['command'] = 'Ordre:';
$string['comment'] = 'Comentaris';
$string['commentcolour'] = 'Color del comentari';
$string['commentcontextmenu'] = 'Menú contextual del comentari';
$string['couldnotsavepage'] = 'No es pot desar la pàgina {$a}';
$string['currentstamp'] = 'Segell';
$string['deleteannotation'] = 'Suprimeix l\'anotació';
$string['deletecomment'] = 'Suprimeix el comentari';
$string['deletefeedback'] = 'Suprimeix el PDF de realimentació';
$string['downloadablefilename'] = 'realimentació.pdf';
$string['downloadfeedback'] = 'Descarrega el PDF de realimentació';
$string['editpdf'] = 'Comenta PDF';
$string['editpdf_help'] = 'Comenta les trameses dels estudiants directament al navegador i crea un PDF editat i descarregable.';
$string['enabled'] = 'Comenta PDF';
$string['enabled_help'] = 'Si s\'habilita, el professorat podrà crear fitxers PDF amb anotacions quan qualifiqui les tasques. Això permet al professorat afegir comentaris, dibuixos i segells directament al damunt del treball dels estudiants. Les anotacions es fan al navegador i no es requereix instal·lar cap programari extra.';
$string['errorgenerateimage'] = 'Error mentre es generava una imatge amb ghostscript, informació de depuració : {$a}';
$string['filter'] = 'Filtra els comentaris ...';
$string['generatefeedback'] = 'Genera PDF de realimentació';
$string['generatingpdf'] = 'S\'està generant el PDF ...';
$string['gotopage'] = 'Ves a la pàgina';
$string['green'] = 'Verd';
$string['gspath'] = 'Camí al Ghostscript';
$string['gspath_help'] = 'En la majoria d\'instal·lacions de Linux pot trobar-se a  \'/usr/bin/gs\'. En Windows se sol trobar a  \'c:gsbingswin32c.exe\'  (comproveu que no hi ha espais en blanc al camí - si cal copieu els fitxers \'gswin32c.exe\' i \'gsdll32.dll\' en una nova carpeta sense espais en blanc al camí)';
$string['highlight'] = 'Ressalta';
$string['jsrequired'] = 'Cal JavaScript per fer anotacions en un PDF. Habiliteu JavaScript al vostre navegador per utilitzar aquesta característica.';
$string['launcheditor'] = 'Obre l\'editor PDF ...';
$string['line'] = 'Línia';
$string['loadingeditor'] = 'S\'esta carregant l\'editor PDF';
$string['navigatenext'] = 'Pàgina següent';
$string['navigateprevious'] = 'Pàgina anterior';
$string['output'] = 'Sortida:';
$string['oval'] = 'Oval';
$string['pagenumber'] = 'Pàgina {$a}';
$string['pagexofy'] = 'Pàgina {$a->page} de {$a->total}';
$string['pen'] = 'Bolígraf';
$string['pluginname'] = 'Comenta PDF';
$string['rectangle'] = 'Rectangle';
$string['red'] = 'Vermell';
$string['result'] = 'Resultat:';
$string['searchcomments'] = 'Cerca comentaris';
$string['select'] = 'Selecciona';
$string['stamp'] = 'Segell';
$string['stamppicker'] = 'Selector de segells';
$string['stamps'] = 'Segells';
$string['stampsdesc'] = 'Els segells han de ser fitxers d\'imatges (mida recomanada: 40x40). Aquestes imatges es poden utilitzar amb l\'eina segell per anotar els PDF.';
$string['test_doesnotexist'] = 'El camí de ghostscript apunta a un fitxer que no existeix.';
$string['test_empty'] = 'El camí de ghostscript és buit - Ompliu el camí correcte';
$string['testgs'] = 'Prova el camí de ghostscript';
$string['test_isdir'] = 'El camí de ghostscript apunta a una carpeta; afegiu el programa ghostscript al camí especificat.';
$string['test_notestfile'] = 'El PDF de prova s\'ha perdut';
$string['test_notexecutable'] = 'Ghostscript apunta a un fitxer que no és executable';
$string['test_ok'] = 'El camí de ghostscript sembla que és correcte - comproveu que podeu veure el missatge a la imatge del dessota.';
$string['tool'] = 'Eina';
$string['toolbarbutton'] = '{$a->tool} {$a->shortcut}';
$string['unsavedchanges'] = 'Canvis no desats';
$string['viewfeedbackonline'] = 'Mostra el PDF comentat...';
$string['white'] = 'Blanc';
$string['yellow'] = 'Groc';
$string['zlibnotavailable'] = 'L\'extensió «zlib» no està disponible. La característica d\'anotar PDF depèn d\'aquesta extensió i es deshabilitarà fins que zlib estigui instal·lat i habilitat.';
