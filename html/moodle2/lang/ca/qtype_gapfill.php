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
 * Strings for component 'qtype_gapfill', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_gapfill
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['answerdisplay'] = 'Mostra les respostes';
$string['answerdisplay_help'] = 'Dragdrop mostra una llista de paraules que es poden arrossegar als buits; gapfill mostra buits que no tenen opcions de tria, en canvi hi ha la possiblitat de tenir en desplegables una llista tancada de respostes correctes (i també incorrectes) en cada camp buit.';
$string['casesensitive'] = 'Sensible a les majúscules';
$string['casesensitive_help'] = 'Si es marca, i la resposta prevista fos <i>GAT</i>, la resposta <i>gat</i> es consideraria incorrecta';
$string['delimitchars'] = 'Caracters delimitadors';
$string['delimitchars_help'] = 'Canvia els caràcters utilitzats com a delimitadors del camp de resposta, que inicialment són [ ]. Sól ser útil quan les respostes podrien tenir al contingut algun d\'aquests caràcters.';
$string['disableregex'] = 'Desactiva l\'anàlisi per expressions regulars';
$string['disableregex_help'] = 'Desactiva l\'anàlisi de les respostes per expressions regulars i analitza per una comparació directa entre les cadenes. Esdevé útil quan, per exemple, hi ha preguntes amb format html on els angles delimitadors (&lt; i &gt;) s\'hagin de considerar com a signes matemàtics i on símbols com * s\'han d\'interpretar literalment, no com a expressions regulars.';
$string['displaydragdrop'] = 'arrossega i deixa caure';
$string['displaydropdown'] = 'llista de selecció';
$string['displaygapfill'] = 'escriu al buit';
$string['duplicatepartialcredit'] = 'no es considera del tot acabada, perquè hi ha respostes duplicades';
$string['gapfill'] = 'buit per emplenar';
$string['moreoptions'] = 'Més opcions.';
$string['noduplicates'] = 'Sense duplicats';
$string['noduplicates_help'] = 'Quan es marca, cada resposta ha de ser única, útil
quan cada camp té operadors |. Per exemple, si es pregunta de quin metall estan fetes les medalles olímpiques i cada camp dels tres de resposta té [Or | Plata | Bronze] com a possiblitat. i l\'estudiant escriu or en tots tres camps només el primer obtindrà puntuació i les altres dues respostes no es tindran en consideració. Es descarten les respostes duplicades en atorgar la puntuació.';
$string['pleaseenterananswer'] = 'Si us plau, escriviu una resposta.';
$string['pluginname'] = 'Pregunta de buits per emplenar';
$string['pluginnameadding'] = 'Addició d\'una pregunta amb buit per emplenar';
$string['pluginnameediting'] = 'Edició d\'una pregunta de buit';
$string['pluginname_help'] = 'Indiqueu les paraules que s\'han de completar entre claudàtors, per exemple, Vet aquí un [gat], vet aquí un [gos], aquest conte ja s\'ha fos. Si s\'acceptés gos o ca, llavors escriviu [gos | ca].
Els modes de llista de selecció i d\'arrossegat permeten tenir llistes de respostes barregades, on a més del les que s\'han de donar com a resposta, hi pot haver opcions trampa.';
$string['pluginnamesummary'] = 'Una pregunta de buits. Té menys possibilitats que una pregunta de buits estàndard (Cloze), però també és més senzilla de preparar perquè es prepara amb una sintaxi més simple.';
$string['questionsmissing'] = 'Encara no hi ha cap buit al text de la pregunta';
$string['wronganswers'] = 'Respostes trampa.';
$string['wronganswers_help'] = 'Llista de paraules incorrectes com a resposta destinades a disfressar les respostes correctes. Els mots es separen per comes, i la llista només s\'utilitza en els modes de resposta de llista de selecció i d\'arrossegat.';
$string['yougotnrightcount'] = 'Fins ara, hi ha {$a->num} buits correctament emplenats.';
