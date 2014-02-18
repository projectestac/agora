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
 * Strings for component 'qtype_ddmarker', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_ddmarker
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addmoreitems'] = 'Leerfelder für {no} weitere Markierungen';
$string['alttext'] = 'Alternativer Text';
$string['answer'] = 'Antwort';
$string['bgimage'] = 'Hintergrundbild';
$string['clearwrongparts'] = 'Bewege falsch gesetzte Markierungen zu ihrem Ausgangsplatz unter dem Bild';
$string['confirmimagetargetconversion'] = 'Sie sind dabei, die obige "Image target" Fragen zu "Drag and Drop Markierung" Fragen umzuwandeln';
$string['convertingimagetargetquestion'] = 'Frage "{$a->name}" umgewandelt';
$string['coords'] = 'Koordinaten';
$string['correctansweris'] = 'Die richtige Antwort lautet: {$a}';
$string['draggableimage'] = 'Ziehbares Bild';
$string['draggableitem'] = 'Ziehbares Objekt';
$string['draggableitemheader'] = 'Ziehbares Objekt {$a}';
$string['draggableitemtype'] = 'Art';
$string['draggableword'] = 'Ziehbarer Text';
$string['dropbackground'] = 'Hintergrundbild, auf das die Markierungen gezogen werden';
$string['dropzone'] = 'Ablegebereich {$a}';
$string['dropzoneheader'] = 'Ablegebereiche';
$string['followingarewrong'] = 'Die folgenden Markierungen wurden in den falschen Bereich gesetzt: {$a}.';
$string['followingarewrongandhighlighted'] = 'Die folgenden Markierungen wurden falsch gesetzt: {$a}. Hervorgehobene Markierungen werden nun an den richtigen Platzierungen gezeigt. <br />Klicken Sie auf die Markierung, um den erlaubten Bereich zu sehen.';
$string['formerror_nobgimage'] = 'Sie müssen ein Hintergrundbild für die "Drag and Drop"-Fläche wählen.';
$string['formerror_noitemselected'] = 'Sie haben einen Ablegebereich festgelegt, aber keine Markierung ausgewählt, welche in den Bereich gezogen werden muss.';
$string['formerror_nosemicolons'] = 'Ihre Koordinaten-Zeichenkette enthält keine \';\'. Ihre Koordinaten für ein(en) {$a->shape} müssen als {$a->coordstring} ausgedrückt werden.';
$string['formerror_onlysometagsallowed'] = 'Nur "{$a}" Tags sind in der Beschreibung für eine Markierung erlaubt.';
$string['formerror_onlyusewholepositivenumbers'] = 'Bitte nutzen Sie nur positive ganze Zahlen, um x,y Koordinaten und/oder die Höhe und Breite zu beschreiben. Ihre Koordinaten für ein(en) {$a->shape} müssen als {$a->coordstring} ausgedrückt werden.';
$string['formerror_polygonmusthaveatleastthreepoints'] = 'Für ein Polygon müssen sie mindestens drei Punkte angeben. Ihre Koordinaten für ein(en) {$a->shape} müssen als {$a->coordstring} ausgedrückt werden';
$string['formerror_shapeoutsideboundsofbgimage'] = 'Die Form, die Sie erstellt haben, liegt nicht auf dem Hintergrundbild';
$string['formerror_toomanysemicolons'] = 'Ihre Koordinaten-Zeichenkette enthält zu viele Strichpunkte. Ihre Koordinaten für ein(en) {$a->shape} müssen als {$a->coordstring} ausgedrückt werden';
$string['formerror_unrecognisedwidthheightpart'] = 'Die Breite und Höhe, die Sie angegeben haben, kann nicht erkannt werden. Ihre Koordinaten für ein(en) {$a->shape} müssen als {$a->coordstring} ausgedrückt werden';
$string['formerror_unrecognisedxypart'] = 'Die x,y Koordinaten, die Sie angegeben haben, können nicht erkannt werden. Ihre Koordinaten für ein(en) {$a->shape} müssen als {$a->coordstring} ausgedrückt werden';
$string['imagetargetconverter'] = 'Wandle "Image target" Frage in "Drag and Drop Markierungn" Fragen um';
$string['infinite'] = 'Unendlich';
$string['listitemconfirmcategory'] = 'Sie sind dabei, alle "Image target" Fragen in der Kategorie "{$a->name}" ({$a->qcount} Fragen) umzuwandeln';
$string['listitemconfirmcontext'] = 'Sie sind dabei, alle "Image target" Fragen im Kontext "{$a->name}" ({$a->qcount} Fragen) umzuwandeln';
$string['listitemconfirmquestion'] = 'Sie sind dabei, die Frage "{$a->name}" umzuwandeln';
$string['listitemlistallcategory'] = 'Wähle alle "Image target" Fragen in der Kategorie "{$a->name}" ({$a->qcount} Fragen)';
$string['listitemlistallcontext'] = 'Wähle alle "Image target" Fragen im Kontext "{$a->name}" ({$a->qcount} Fragen)';
$string['listitemlistallquestion'] = 'Wähle Frage "{$a->name}"';
$string['listitemprocessingcategory'] = 'Wandle alle "Image target" Fragen in der Kategorie "{$a->name}" ({$a->qcount} Fragen) um';
$string['listitemprocessingcontext'] = 'Wandle alle "Image target" Fragen im Kontext "{$a->name}" ({$a->qcount} Fragen) um';
$string['listitemprocessingquestion'] = 'Frage "{$a->name}" umgewandelt';
$string['marker'] = 'Markierung';
$string['marker_n'] = 'Markierung {no}';
$string['markers'] = 'Markierungen';
$string['nolabel'] = 'Kein Beschriftungstext';
$string['noquestionsfound'] = 'Keine Fragen zum Umwandeln gefunden.';
$string['pleasedragatleastonemarker'] = 'Ihre Antwort ist nicht komplett. Sie müssen mindestens eine Markierung auf dem Bild platzieren.';
$string['pluginname'] = '"Drag and Drop" Markierungen';
$string['pluginnameadding'] = 'Füge "Drag and Drop" Markierungen hinzu';
$string['pluginnameediting'] = 'Bearbeite "Drag and Drop" Markierungen';
$string['pluginname_help'] = 'Wählen Sie ein Hintergrundbild. Geben Sie Beschriftungstexte für Markierungen ein und legen Sie die Ablagebereiche auf dem Hintergrundbild fest, auf welche die Markierungen gezogen werden müssen.';
$string['pluginnamesummary'] = 'Markierungen werden per "Drag and Drop" auf ein Hintergrundbild gezogen.';
$string['previewarea'] = 'Vorschaubereich -';
$string['previewareaheader'] = 'Vorschau';
$string['previewareamessage'] = 'Wählen Sie ein Hintergrundbild, geben Sie Beschriftungstexte für die Markierungen ein und legen Sie die Ablagebereiche auf dem Hintergrundbild fest, auf welche die Markierungen gezogen werden müssen.';
$string['refresh'] = 'Vorschau aktualisieren';
$string['shape'] = 'Form';
$string['shape_circle'] = 'Kreis';
$string['shape_circle_coords'] = 'x,y;r (wobei x,y die x und y Koordinaten der Mitte des Kreises sind und r der Radius ist)';
$string['shape_circle_lowercase'] = 'Kreis';
$string['shape_polygon'] = 'Polygon';
$string['shape_polygon_coords'] = 'x1,y1;x2,y2;x3,y3;x4,y4... (wobei x1,y1 die x und y Koordinaten für den ersten Punkt, x2,y2 die x und y Koordinaten für den zweiten Punkt, etc. sind. Die Koordinaten für den ersten Punkt müssen Sie nicht wiederholen, um das Polygon zu schließen)';
$string['shape_polygon_lowercase'] = 'Polygon';
$string['shape_rectangle'] = 'Rechteck';
$string['shape_rectangle_coords'] = 'x,y;b,h (wobei x,y die xy Koordinaten des linken oberen Ecks des Rechtecks sind und b und h die Breite und Höhe.)';
$string['shape_rectangle_lowercase'] = 'Rechteck';
$string['showmisplaced'] = 'Kennezeichnen Sie die Ablegebereiche auf welche nicht die richtige Markierung gelegt wurde.';
$string['shuffleimages'] = 'Ziehbare Objekte bei jedem Versuch zufällig anordnen';
$string['stateincorrectlyplaced'] = 'Zeige, welche Markierungen falsch plaziert wurden.';
$string['summariseplace'] = '{$a->no}. {$a->text}';
$string['summariseplaceno'] = 'Ablegebereich {$a}';
$string['ytop'] = 'Oben';
