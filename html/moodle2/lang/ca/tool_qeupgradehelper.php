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
 * Strings for component 'tool_qeupgradehelper', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_qeupgradehelper
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Acció';
$string['alreadydone'] = 'Tot ha sigut convertit';
$string['areyousure'] = 'Esteu segur?';
$string['areyousuremessage'] = 'Voleu procedir amb l\'actualització  de totes les {$a->numtoconvert} respostes dels qüestionaris  \'{$a->name}\' al curs {$a->shortname}?';
$string['areyousureresetmessage'] = 'El qüestionari \'{$a->name}\' al curs {$a->shortname} té {$a->totalattempts} respostes, de les quals {$a->convertedattempts} han sigut actualitzades  des del vell sistema. D\'aquestes, {$a->resettableattempts} poden ser reconfigurades, per ser reconvertides després. Voleu procedir amb la reconversió?';
$string['attemptstoconvert'] = 'Respostes que requereixen conversió';
$string['backtoindex'] = 'Torna a la pàgina principal';
$string['conversioncomplete'] = 'Conversió completada';
$string['convertattempts'] = 'Converteix els respostes';
$string['convertedattempts'] = 'Respostes convertits';
$string['convertquiz'] = 'S\'estan convertint respostes...';
$string['cronenabled'] = 'Cron habilitat';
$string['croninstructions'] = 'Podeu habilitar cron per completar de forma automàtica l\'actualització després d\'una actualització parcial. Cron  s\'executarà les hores que establiu cada dia ( seguint l\'hora local del servidor). Cada vegada que cron s\'execute, processarà un nombre de respostes fins l\'hora programada, llavors s\'aturarà i esperarà la següent execució de cron. Fins i tot si vostè ha configurat cron, no farà res fins que detecti  que l\'actualització principal de 2,1 s\'ha completat.';
$string['cronprocesingtime'] = 'Temps de processat cada vegada que s\'executa cron';
$string['cronsetup'] = 'Configura cron';
$string['cronsetup_desc'] = 'Podeu configurar cron per completar l\'actualització de les dades de les respostes dels qüestionaris de forma automàtica.';
$string['cronstarthour'] = 'Hora d\'inici';
$string['cronstophour'] = 'Hora d\'aturada';
$string['extracttestcase'] = 'Extrau cas de prova';
$string['extracttestcase_desc'] = 'Utilitzeu dades d\'exemple de la base de dades per ajudar a crear unitats de prova que puguin ser utilitzades per provar l\'actualització.';
$string['gotoindex'] = 'Torna a la llista de qüestionaris que poden ser actualitzats';
$string['gotoquizreport'] = 'Ves als informes d\'aquest qüestionari per comprovar l\'actualització';
$string['gotoresetlink'] = 'Ves a la llista de qüestionaris que poden ser reconfigurats';
$string['includedintheupgrade'] = 'Inclosa en l\'actualització ?';
$string['invalidquizid'] = 'ID no vàlida de qüestionari. O bé el qüestionari no existeix o no té respostes per convertir.';
$string['listpreupgrade'] = 'Llista els qüestionaris i les respostes';
$string['listpreupgrade_desc'] = 'Això mostrarà un informe de tots els qüestionaris del sistema i quantes respostes ha tingut. Això us donarà una idea de l\'abast de l\'actualització a fer.';
$string['listpreupgradeintro'] = 'Hi ha un nombre de respostes de qüestionaris que cal que siguin processats quan actualitzeu el lloc. Algunes desenes de milers no es cap problema. Molt més enllà d\'això i caldrà que penseu en el temps que necessitareu per fer l\'actualització.';
$string['listtodo'] = 'Llista els qüestionaris que encara cal actualitzar';
$string['listtodo_desc'] = 'Això mostrarà un informe de tots els qüestionaris del sistema (si en hi ha) que tenen respostes que encara cal actualitzar al nou enginy qüestionari.';
$string['listtodointro'] = 'Això són tots els qüestionaris amb respostes que encara han de ser convertides. Podeu convertir les respostes prement l\'enllaç.';
$string['listupgraded'] = 'Llista els qüestionaris actualitzats que poder ser reconfigurats';
$string['listupgraded_desc'] = 'Això mostrarà un informe de tots els qüestionaris del sistema les respostes dels quals han sigut actualitzats, i on les dades velles estan encara presents per això l\'actualització ha de ser reconfigurada i refeta.';
$string['listupgradedintro'] = 'Això són tots els qüestionaris del sistema les respostes dels quals han sigut actualitzats, i on les dades velles estan encara presents per això  han de ser reconfigurats i refets.';
$string['noquizattempts'] = 'El vostre lloc no té cap resposta de qüestionari!';
$string['nothingupgradedyet'] = 'No hi ha respostes actualitzades per reconfigurar';
$string['notupgradedsiterequired'] = 'Aquest script sols pot treballar abans que el lloc sigui actualitzat.';
$string['numberofattempts'] = 'Nombre de respostes de qüestionaris';
$string['oldsitedetected'] = 'Sembla que el vostre lloc no ha sigut actualitzat per incloure el enginy qüestionari.';
$string['outof'] = '{$a->some} de {$a->total}';
$string['pluginname'] = 'Ajuda en l\'actualització de l\'enginy qüestionari';
$string['pretendupgrade'] = 'Fes un assaig d\'actualització de les respostes';
$string['pretendupgrade_desc'] = 'L\'actualització té tres nivells: carregar les dades existents de la base de dades; transformar-les ; llavors escriu les dades transformades en la nova base de dades.
El script provarà les dues primeres parts del procés.';
$string['questionsessions'] = 'Sessions de preguntes';
$string['quizid'] = 'ID del qüestionari';
$string['quizupgrade'] = 'Estat d\'actualització del qüestionari';
$string['quizzesthatcanbereset'] = 'Els qüestionaris següents tenen respostes convertides que podeu  reconfigurar.';
$string['quizzestobeupgraded'] = 'Tots els qüestionaris amb les respostes';
$string['quizzeswithunconverted'] = 'Els següents qüestionaris tenen respostes que necessiten ser convertides';
$string['resetcomplete'] = 'Reconfiguració completada';
$string['resetquiz'] = 'S\'estan reconfigurant les respostes...';
$string['resettingquizattempts'] = 'S\'estan reconfigurant les respostes del qüestionari';
$string['resettingquizattemptsprogress'] = 'S\'estan reconfigurant les respostes {$a->done} / {$a->outof}';
$string['upgradedsitedetected'] = 'Aquest sembla un lloc que ha sigut actualitzat per incloure el enginy qüestionari.';
$string['upgradedsiterequired'] = 'Aquest script sols pot treballar després que el lloc hagi sigut actualitzat.';
$string['upgradingquizattempts'] = 'S\'estan actualitzant les respostes del qüestionari \'{$a->name}\' al curs {$a->shortname}';
$string['veryoldattemtps'] = 'El vostre lloc té {$a} respostes de qüestionari que no han sigut completament actualitzat durant l\'actualització de versió des de Moodle 1.4 a Moodle 1.5. Aquestes respostes es tractaran abans de l\'actualització principal. Cal tenir en compte el temps addicional necessari per fer això.';
