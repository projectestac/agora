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
 * Strings for component 'tool_generator', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_generator
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bigfile'] = 'Fitxer gran {$a}';
$string['courseexplanation'] = 'Aquesta eina crea cursos de prova estàndard que inclouen moltes seccions, activitats i fitxers.

Està destinat a proporcionar una mesura estandarditzada per a comprovar la fiabilitat i el rendiment de diversos components del sistema (per exemple, les còpies de seguretat i la restauració).

Aquesta prova és important perquè hi ha hagut prèviament molts casos en què, davant de casos d\'ús reals (p. ex. un curs amb 1.000 activitats), el sistema no ha funcionat.

Els cursos creats amb aquesta funció poden ocupar un gran espai de bases de dades i d\'emmagatzematge (desenes de gigabytes). Necessitareu eliminar els cursos (i esperar diversos cicles de neteja) per alliberar de nou aquest espai.

**No feu servir aquesta funció en un sistema que s\'estigui utilitzant amb usuaris.** Utilitzeu-ls només en un servidor de desenvolupament. (Per a evitar l\'ús accidental, aquesta funció està inhabilitada si no heu seleccionat també el nivell de depuració DESENVOLUPADOR.)';
$string['coursesize_0'] = 'XS (~10KB; creat en ~1 segon)';
$string['coursesize_1'] = 'S (~10MB; creat en ~30 segons)';
$string['coursesize_2'] = 'M (~100MB; creat en ~5 minuts)';
$string['coursesize_3'] = 'L (~1GB; creat en ~1 hora)';
$string['coursesize_4'] = 'XL (~10GB; creat en ~4 hores)';
$string['coursesize_5'] = 'XXL (~20GB; creat en ~8 hores)';
$string['coursewithoutusers'] = 'El curs seleccionat no té usuaris';
$string['createcourse'] = 'Crea curs';
$string['createtestplan'] = 'Crea pla de prova';
$string['creating'] = 'S\'està creant el curs';
$string['done'] = 'fet ({$a}s)';
$string['downloadtestplan'] = 'Baixa el pla de prova';
$string['downloadusersfile'] = 'Baixa el fitxer d\'usuaris';
$string['error_nocourses'] = 'No hi ha cursos per a generar el pla de prova';
$string['error_noforumdiscussions'] = 'El curs seleccionat no conté debats de fòrums';
$string['error_noforuminstances'] = 'El curs seleccionat no conté instàncies del mòdul fòrum';
$string['error_noforumreplies'] = 'El curs seleccionat no conté respostes en fòrums';
$string['error_nonexistingcourse'] = 'El curs especificat no existeix';
$string['error_nopageinstances'] = 'El curs seleccionat no conté instàncies del modul de pàgina';
$string['error_notdebugging'] = 'No està disponible en aquest servidor perquè la depuració no està establerta com a DESENVOLUPADOR';
$string['error_nouserspassword'] = 'Heu de definir $CFG->tool_generator_users_password en config.php per a generar el pla de prova';
$string['firstname'] = 'Usuari del curs de prova';
$string['fullname'] = 'Curs de prova: {$a->size}';
$string['maketestcourse'] = 'Proveu el curs de prova';
$string['maketestplan'] = 'Proveu el pla de prova JMeter';
$string['notenoughusers'] = 'El curs seleccionat no té prou usuaris';
$string['pluginname'] = 'Generador de dades de desenvolupament';
$string['progress_checkaccounts'] = 'S\'estan comprovant els comptes d\'usuari ({$a})';
$string['progress_coursecompleted'] = 'Curs completat ({$a}s)';
$string['progress_createaccounts'] = 'S\'estan creant els comptes d\'usuari ({$a->from} - {$a->to})';
$string['progress_createpages'] = 'S\'estan creant pàgines ({$a})';
$string['progress_createsmallfiles'] = 'S\'estan creant arxius petits ({$a})';
$string['shortsize_0'] = 'XS';
$string['shortsize_1'] = 'S';
$string['shortsize_2'] = 'M';
$string['shortsize_3'] = 'L';
$string['shortsize_4'] = 'XL';
$string['shortsize_5'] = 'XXL';
$string['size'] = 'Mida del curs';
$string['smallfiles'] = 'Arxius petits';
