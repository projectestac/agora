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

$string['geogebra_settings'] = 'Configuraci&oacute; del filtre GeoGebra';
$string['geogebra_settings_desc'] = 'Aquesta configuraci&oacute; afecta a tots els cursos i p&agrave;gines de Moodle. 
Modificar aquesta configuraci&oacute; pot canviar l\'aparen&ccedil;a o funcionalitat d\'alguns dels arxius de GeoGebra. L\'amplada (<i>width</i>) i l\'al&ccedil;ada (<i>height</i>) per defecte (que figuren a continuaci&oacute;) s\'utilitzen sempre en carregar arxius de GeoGebra carregats com a fitxers adjunts.
<br>
<br>
Consulteu la <a href=\"../filter/geogebra/moodleGeoGebraFilter_Use.pdf\">documentaci&oacute; d\'aquest filtre</a> per veure com canviar l\'amplada i l\'al&ccedil;ada a cadascun dels recursos i activitats mitjan&ccedil;ant el format següent de la pròpia URL del fitxer:
<br>
<br>
<i>.../myFileName.ggb?w=#&h=#, per exemple:</i>
<ul>
<li> .../myFileName.ggb?w=1000 (agafa l\'al&ccedil;ada per defecte)</li>
<li> .../myFileName.ggb?h=200 (agafa l\'amplada per defecte)</li>
<li> .../myFileName.ggb?w=200&h=800</li>
</ul>';

$string['geogebra_defaultwidth'] = 'Amplada per defecte dels applets en px';
$string['geogebra_defaultheight'] = 'Al&ccedil;ada per defecte dels applets en px';

$string['geogebra_jar'] = 'URL del fitxer geogebra.jar';
$string['geogebra_jar_desc'] = 'En aquest camp podeu introduir un URL personalitzat o fer clic a un dels enlla&ccedil;os següents (recomanat): ';
$string['geogebra_use'] = 'Utilitza';
$string['geogebra_local'] = 'des d\'aquest servidor web';
$string['geogebra_external'] = 'des de GeoGebra.org';
$string['geogebra_latest'] = 'la darrera versi&oacute; de GeoGebra.org';

$string['geogebra_params'] = 'Par&agrave;metres de l\'applet';
$string['geogebra_params_desc'] = 'Introdu&iuml;u els par&agrave;metres de la miniaplicaci&oacute; o <i>applet</i> de GeoGebra en el format nom = valor (per exemple, enableRightClick = false). Cada par&agrave;metre ha d\'estar en una fila nova. Aquests par&agrave;metres afecten a tots els cursos i p&agrave;gines.

<p>Per consultar la llista completa dels par&agrave;metres de l\' applet visita la documentaci&oacute; oficial a <a href=http://www.geogebra.org>GeoGebra.org</a>.
La següent &eacute;s una llista incompleta dels par&agrave;metres m&eacute;s comuns:</p>

<ul>
<li>bgcolor=#FFFFFF (background color; #FFFFFF &eacute;s blanc)</li>
<li>borderColor=#FFFFFF</li>
<li>enableRightClick=false</li>
<li>enableLabelDrags=false</li>
<li>enableShiftDragZoom=false</li>
<li>showMenuBar=true</li>
<li>showToolBar=true</li>
<li>showToolBarHelp=true</li>
<li>showAlgebraInput=true</li>
<li>showResetIcon=true</li>
<li>language=ca (ca &eacute;s Catal&agrave;; es poden utilitzar altres: es, en, fr, it, de, sl, zh etc.)</li>
</ul>';