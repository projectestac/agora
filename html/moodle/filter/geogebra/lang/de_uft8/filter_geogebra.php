<?php
/*
 * GeoGebra Moodle filter
 * Copyright (C) 2009 Sara Arjona, Florian Sonner
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
 
$string['geogebra_settings'] = 'GeoGebra Filter Einstellungen';
$string['geogebra_settings_desc'] = 'Achtung: Diese Einstellungen beeinflussen ALLE Kurse und Seiten! Durch diese Einstellungen kann sich also die Funktion und die Darstellung schon bestehender GeoGebra Dateien ändern. Die Größe eines einzelnen Applets lässt sich aber, wie in der Filter-Dokumentation beschrieben, ändern.';

$string['geogebra_defaultwidth'] = 'Standard Breite des Applets in px';
$string['geogebra_defaultheight'] = 'Standard Höhe des Applets in px';

$string['geogebra_jar'] = 'URL zu geogebra.jar';
$string['geogebra_jar_desc'] = 'Sie können entweder eine eigene URL in das untere Textfeld eingeben, oder auf einen der Links klicken um eine vordefinierte URL zu benutzen (empfohlen):';

$string['geogebra_use'] = 'Benutze';
$string['geogebra_local'] = 'von diesem Webserver';
$string['geogebra_external'] = 'von GeoGebra.org';
$string['geogebra_latest'] = 'letzten Release von GeoGebra.org';

$string['geogebra_params'] = 'Applet Parameter';
$string['geogebra_params_desc'] = 'Geben Sie einen Applet Parameter im Format name=wert ein. Zum Beispiel: enableRightClick=false. Benutzen Sie pro Parameter eine neue Zeile. Der filename Parameter wird automatisch definiert.

<p>Für eine komplette Liste mit allen Applet Parametern müssen Sie die offizielle Dokumentation auf <a href=http://www.geogebra.org>GeoGebra.org</a> lesen.
Im folgenden ist eine unvollständige Liste mit oft benutzten Parametern:</p>

<ul>
<li>bgcolor=#FFFFFF (Hintergrundfarbe - #FFFFFF ist weiß)</li>
<li>borderColor=#FFFFFF</li>
<li>enableRightClick=false</li>
<li>enableLabelDrags=false</li>
<li>enableShiftDragZoom=false</li>
<li>showMenuBar=true</li>
<li>showToolBar=true</li>
<li>showToolBarHelp=true</li>
<li>showAlgebraInput=true</li>
<li>showResetIcon=true</li>
<li>language=de (de steht für Deutsch - Sie können natürlich auch andere Codes benutzen wie bspw. fr, it, es, sl, zh etc.)</li>
<li>country=at (at steht für Österreich - dieser Parameter ist nur für lokale Unterschiede in einer Sprache bedeutsam)</li>
</ul>';';