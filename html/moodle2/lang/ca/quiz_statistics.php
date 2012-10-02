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
 * Strings for component 'quiz_statistics', language 'ca', branch 'MOODLE_23_STABLE'
 *
 * @package   quiz_statistics
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actualresponse'] = 'Resposta real';
$string['allattempts'] = 'tots els intents';
$string['allattemptsavg'] = 'Qualificació mitjana de tots els intents';
$string['allattemptscount'] = 'Nombre total d\'intents qualificats complets';
$string['analysisofresponses'] = 'Anàlisi de les respostes';
$string['analysisofresponsesfor'] = 'Anàlisi de les respostes de {$a}.';
$string['attempts'] = 'Intents';
$string['attemptsall'] = 'tots els intents';
$string['attemptsfirst'] = 'primer intent';
$string['backtoquizreport'] = 'Torna a la pàgina principal de l\'informe d\'estadístiques.';
$string['calculatefrom'] = 'Calcula les estadístiques des de';
$string['cic'] = 'Coeficient de consistència interna (per {$a})';
$string['completestatsfilename'] = 'completestats';
$string['count'] = 'Comptador';
$string['coursename'] = 'Nom dels curs';
$string['detailedanalysis'] = 'Anàlisi més detallada de les respostes a aquesta pregunta';
$string['discrimination_index'] = 'Índex de discriminació';
$string['discriminative_efficiency'] = 'Eficiència discriminativa';
$string['downloadeverything'] = 'Baixa l\'informe complet com a';
$string['duration'] = 'Obert:';
$string['effective_weight'] = 'Pes efectiu';
$string['errordeleting'] = 'S\'ha produït un error mentre s\'esborraven {$a} registres antics.';
$string['erroritemappearsmorethanoncewithdifferentweight'] = 'La pregunta ({$a}) apareix diverses vegades amb diferents ponderacions en diferents llocs del qüestionari. L\'informe estadístic no ho permet i podria reduir la  fiabilitat de les estadístiques d\'aquesta pregunta.';
$string['errormedian'] = 'S\'ha produït un error en recuperar la mediana';
$string['errorpowerquestions'] = 'S\'ha produït un error en recuperar les dades per a calcular la variància de les qualificacions de la pregunta';
$string['errorpowers'] = 'Error en recuperar dades per calcular la variança de les qualificacions del qüestionari';
$string['errorrandom'] = 'Error agafant dades del subítem';
$string['errorratio'] = 'Raó d\'error (per {$a})';
$string['errorstatisticsquestions'] = 'Error en recuperar dades per calcular estadístiques de les puntuacions de les preguntes';
$string['facility'] = 'Índex de facilitat';
$string['firstattempts'] = 'primers intents';
$string['firstattemptsavg'] = 'Qualificació mitjana dels primers intents';
$string['firstattemptscount'] = 'Nombre de primers intents que ja han estat qualificats';
$string['frequency'] = 'Freqüència';
$string['intended_weight'] = 'Pes intencionat';
$string['kurtosis'] = 'Curtosi de la distribució de puntuacions (de {$a})';
$string['lastcalculated'] = 'S\'ha calculat fa {$a->lastcalculated}. Des d\'aleshores s\'han fet {$a->count} intents';
$string['median'] = 'Qualificació mediana';
$string['modelresponse'] = 'Resposta model';
$string['negcovar'] = 'Covariança negativa de la qualificació amb el total d\'intents qualificats';
$string['negcovar_help'] = 'La qualificació d\'aquesta pregunta en aquesta sèrie d\'intents del qüestionari varia en sentit contrari a la qualificació total de l\'intent. És a dir: la qualificació total d\'aquest intent tendeix a estar sota la mitjana mentre la qualificació de la pregunta està per damunt (o a l\'inrevés).

L\'equació per al càlcul de la ponderació efectiva de la pregunta no es pot aplicar en aquest cas. El càlcul de la ponderació efectiva de les altres preguntes del qüestionari s\'ha calculat considerant que les preguntes remarcades (amb covariància negativa) tenen com a valor màxim zero.

Si es modifiqués el qüestionari i es donés a aquestes preguntes amb covariància negativa un valor màxim de zero, aleshores la ponderació efectiva de la pregunta en aquests casos seria zero i, per a la resta de preguntes, el valor real de la ponderació efectiva de la pregunta seria aquest que s\'ha calculat ara.';
$string['nostudentsingroup'] = 'Encara no hi ha estudiants en aquest grup';
$string['optiongrade'] = 'Crèdit parcial';
$string['pluginname'] = 'Estadístiques';
$string['position'] = 'Posició';
$string['positions'] = 'Posició(ns)';
$string['questioninformation'] = 'Informació de la pregunta';
$string['questionname'] = 'Nom de la pregunta';
$string['questionnumber'] = 'P#';
$string['questionstatistics'] = 'Estadístiques de la pregunta';
$string['questionstatsfilename'] = 'questionstats';
$string['questiontype'] = 'Tipus de pregunta';
$string['quizinformation'] = 'Informació del qüestionari';
$string['quizname'] = 'Nom del qüestionari';
$string['quizoverallstatistics'] = 'Estadístiques generals del qüestionari';
$string['quizstructureanalysis'] = 'Anàlisi de l\'estructura del qüestionari';
$string['random_guess_score'] = 'Puntuació de la mostra aleatòria';
$string['recalculatenow'] = 'Recalcula ara';
$string['response'] = 'Resposta';
$string['skewness'] = 'Assimetria de la distribució de puntuacions (per {$a})';
$string['standarddeviation'] = 'Desviació estàndard';
$string['standarddeviationq'] = 'Desviació estàndard';
$string['standarderror'] = 'Error estàndard (per {$a})';
$string['statistics'] = 'Estadístiques';
$string['statistics:componentname'] = 'Informe d\'estadístiques del qüestionari';
$string['statisticsreport'] = 'Informe d\'estadístiques';
$string['statisticsreportgraph'] = 'Estadístiques per les posicions de les preguntes';
$string['statistics:view'] = 'Visualitza l\'informe d\'estadístiques';
$string['statsfor'] = 'Estadístiques del qüestionari (per {$a})';
