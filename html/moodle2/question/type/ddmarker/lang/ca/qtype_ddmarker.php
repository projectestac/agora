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
 *
 * @package    qtype
 * @subpackage ddmarker
 * @copyright  2012 The Open University
 * @author     Jamie Pratt <me@jamiep.org>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['addmoreitems'] = 'Blancs per a {no} més marcadors';
$string['alttext'] = 'Text alternatiu';
$string['answer'] = 'Resposta';
$string['bgimage'] = 'Imatge de fons';
$string['confirmimagetargetconversion'] = 'Estàs apunt de convertir la pregunta de sota, basada en imatges, a una pregunta d\'arrossegar marcadors.';
$string['coords'] = 'Coordenades';
$string['convertingimagetargetquestion'] = 'Pregunta convertida "{$a->name}"';
$string['correctansweris'] = 'La resposta correcta és: {$a}';
$string['draggableimage'] = 'Imatge arrossegable';
$string['draggableitem'] = 'Ítem arrossegable';
$string['draggableitemheader'] = 'Ítem arrossegable {$a}';
$string['draggableitemtype'] = 'Text';
$string['draggableword'] = 'Text arrossegable';
$string['dropbackground'] = 'Imatge de fons per arrossegar-hi marcadors';
$string['dropzone'] = 'Zona de destí {$a}';
$string['dropzoneheader'] = 'Zones de destí';
$string['followingarewrong'] = 'Els marcadors següents s\'han col·locat al lloc incorrecte: {$a}.';
$string['followingarewrongandhighlighted'] = 'Els marcadros següents estan mal col·locats:  {$a}. El(s) marcador(s) destacats es mostren al lloc correcte .<br /> Fes clic al marcador per destacar l\'àrea permesa.';
$string['formerror_nobgimage'] = 'Has de triar una imatge de fons per fer servir a l\'àrea d\'arrossegar.';
$string['formerror_noitemselected'] = 'Has triat una zona de destí però no has triat cap marcador per arrossegar-hi';
$string['formerror_nosemicolons'] = 'No hi ha cap punt i coma a la cadena de coordenades. Les coordenades per al {$a->shape} s\'han d\'expressar - {$a->coordsstring}.';
$string['formerror_onlysometagsallowed'] = 'Només "{$a}" etiquetes estan permeses als marcadors';
$string['formerror_onlyusewholepositivenumbers'] = 'Si us plau, fes servir només nombres sencers positius per especificar les coordeandes x,y i/o l\'amplada i alçada de les formes. Les coordenades per al {$a->shape} s\'han d\'expressar - {$a->coordsstring}.';
$string['formerror_polygonmusthaveatleastthreepoints'] = 'Per fer una forma poligonal has d\'especificar almenys 3 punts. Les coordenades per al {$a->shape} s\'han d\'expressar - {$a->coordsstring}.';
$string['formerror_shapeoutsideboundsofbgimage'] = 'La forma que has definit surt dels límits de la imatge de fons';
$string['formerror_toomanysemicolons'] = 'Hi ha massa parts separades per punt i coma per a les coordenades que has definit. Les coordenades per al {$a->shape} s\'han d\'expressar - {$a->coordsstring}.';
$string['formerror_unrecognisedwidthheightpart'] = 'L\'amplada i l\'alçada que has especificat no són vàlides. Les coordenades per al {$a->shape} s\'han d\'expressar - {$a->coordsstring}.';
$string['formerror_unrecognisedxypart'] = 'Les coordenades x,y no són vàlides. Les coordenades per al {$a->shape} s\'han d\'expressar - {$a->coordsstring}.';
$string['imagetargetconverter'] = 'Converteix les preguntes basades en imatges a marcadors d\'arrossegar i deixar anar';
$string['infinite'] = 'Infinit';
$string['listitemconfirmcategory'] = 'About to convert all imagetarget questions in category "{$a->name}" (contains {$a->qcount} imagetarget questions)';
$string['listitemconfirmcontext'] = 'About to convert all imagetarget questions in context "{$a->name}" (contains {$a->qcount} imagetarget questions)';
$string['listitemconfirmquestion'] = 'About to convert question "{$a->name}"';
$string['listitemlistallcategory'] = 'Select all imagetarget questions in category "{$a->name}" (contains {$a->qcount} imagetarget questions)';
$string['listitemlistallcontext'] = 'Select all imagetarget questions in context "{$a->name}" (contains {$a->qcount} imagetarget questions)';
$string['listitemlistallquestion'] = 'Select question "{$a->name}"';
$string['listitemprocessingcategory'] = 'Converting all imagetarget questions in category "{$a->name}" (contains {$a->qcount} imagetarget questions)';
$string['listitemprocessingcontext'] = 'Converting all imagetarget questions in context "{$a->name}" (contains {$a->qcount} imagetarget questions)';
$string['listitemprocessingquestion'] = 'Converted question "{$a->name}"';
$string['marker'] = 'Marcador';
$string['marker_n'] = 'Marcador {no}';
$string['markers'] = 'Marcadors';
$string['nolabel'] = 'No hi ha text a l\'etiqueta';
$string['noquestionsfound'] = 'No s\'ha trobat cap pregunta per convertir.';
$string['pleasedragatleastonemarker'] = 'La resposta no està completa, almenys has de desplaçar un marcador sobre la imatge.';
$string['pluginname'] = 'Arrossega marcadors';
$string['pluginname_help'] = 'Selecciona una imatge de fons, afegeix text a les etiquetes pels marcadors i defineix les zones de destí sobre la imatge de fons on s\'hauran d\'arrossegar.';
$string['pluginname_link'] = 'question/type/ddmarker';
$string['pluginnameadding'] = 'S\'està afegint una pregunta d\'arrossegar i deixar anar marcadors';
$string['pluginnameediting'] = 'S\'està editant una pregunta d\'arrossegar i deixar anar marcadors';
$string['pluginnamesummary'] = 'Permet definir els marcadors que s\'hauràn d\'arrossegar sobre una imatge de fons.';
$string['previewarea'] = 'Àrea de previsualització -';
$string['previewareaheader'] = 'Previsualitza';
$string['previewareamessage'] = 'Selecciona una imatge de fons, afegeix text a les etiquetes pels marcadors i defineix les zones de destí sobre la imatge de fons on s\'hauran d\'arrossegar.';
$string['refresh'] = 'Refresca la previsualització';
$string['clearwrongparts'] = 'Mou els marcadors col·locats de forma incorrecta a la seva posicio inicial, a sota de la imatge';
$string['shape'] = 'Forma';
$string['shape_circle'] = 'Cercle';
$string['shape_circle_lowercase'] = 'cercle';
$string['shape_circle_coords'] = 'x,y;r (on x,y són les coordenades xy del centre del cercle i r és el radi)';
$string['shape_rectangle'] = 'Rectangle';
$string['shape_rectangle_lowercase'] = 'rectangle';
$string['shape_rectangle_coords'] = 'x,y;w,h (on x,y són les coordenades xy de la cantonada superior esquerra del rectangle i, w i h són l\'amplada i l\'alçada del rectancle)';
$string['shape_polygon'] = 'Polígon';
$string['shape_polygon_lowercase'] = 'polígon';
$string['shape_polygon_coords'] = 'x1,y1;x2,y2;x3,y3;x4,y4....(on x1, y1 són les coordenades x,y del primer vèrtex, x2, y2 són les coordenades x,y del segon, etc. No és necessari repetir les coordenades del primer vértex per tancar el polígon.)';
$string['showmisplaced'] = 'Destaca les zones de destí que no tenen el marcador correcte.';
$string['shuffleimages'] = 'Barreja els ítems que s\'hauran d\'arrossegar cada vegada que es faci un intent nou.';
$string['stateincorrectlyplaced'] = 'Manté els marcadors que s\'han col·locat de forma incorrecta';
$string['summariseplace'] = '{$a->no}. {$a->text}';
$string['summariseplaceno'] = 'Zona de destí {$a}';
$string['ytop'] = 'A dalt';
