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
 * Strings for component 'report_performance', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   report_performance
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_backup'] = 'Còpia de seguretat automàtica';
$string['check_backup_comment_disable'] = 'El rendiment es pot veure afectat durant el procés de còpia de seguretat. Si s\'activa, les còpies de seguretat s\'han de programar en períodes de poca activitat.';
$string['check_backup_comment_enable'] = 'El rendiment es pot veure afectat durant el procés de còpia de seguretat. Les còpies de seguretat s\'haurien de programar en períodes de poca activitat.';
$string['check_backup_details'] = 'Si habiliteu còpies de seguretat automàtiques es crearan automàticament copies de tots els fitxers dels cursos en el moment que especifiqueu. <p>Durant aquest procés es consumiran més recursos de servidor i el rendiment es pot veure afectat.</p>';
$string['check_cachejs_comment_disable'] = 'Si ho habiliteu, es millorarà el rendiment de càrrega de pàgines.';
$string['check_cachejs_comment_enable'] = 'Si ho deshabiliteu, la càrrega de pàgines es pot veure alentida.';
$string['check_cachejs_details'] = 'L\'emmagatzematge Javascript en memòria cau i la compressió milloren el rendiment de carrega de pàgina. Es recomana encaridament en llocs en producció.';
$string['check_debugmsg_comment_developer'] = 'Si es configura un valor diferent de DESENVOLUPADOR, el rendiment pot veure\'s millorat lleugerament.';
$string['check_debugmsg_comment_nodeveloper'] = 'Si es configura com a DESENVOLUPADOR, el rendiment es pot veure lleugerament afectat.';
$string['check_debugmsg_details'] = 'Poques vegades és avantatjós establir el nivell desenvolupador llevat que sigueu un desenvolupador, en què es recomana expressament. <p>Un cop heu rebut el missatge d\'error, i copiat i pegat en alguna part ES RECOMANA FERMAMENT tornar a posar Depuració a desconnectat. Els missatges de depuració poden donar pistes a un hacker per configurar el vostre lloc i poden modificar el rendiment.</p>';
$string['check_enablestats_comment_disable'] = 'El processat de les estadístiques afecta el rendiment del lloc. Si habiliteu les estadístiques configureu-les amb precaució.';
$string['check_enablestats_comment_enable'] = 'El processat de les estadístiques afecta el rendiment del lloc. Configureu les estadístiques amb precaució.';
$string['check_enablestats_details'] = 'L\'habilitació d\'aquest paràmetre processarà registres amb el dimoni cron per recopilar estadístiques. Depenent del trafic del vostre lloc això pot durar un cert temps. <p>Durant aquest procés es consumiran més recursos del servidor i se\'n pot veure afectat el rendiment.</p>';
$string['check_themedesignermode_comment_disable'] = 'Si ho habiliteu, les imatges i fulls d\'estils no s\'emmagatzemaran en la memòria cau, el que resultarà en una disminució significativa del rendiment.';
$string['check_themedesignermode_comment_enable'] = 'Si ho deshabiliteu, les imatges i fulls d\'estils s\'emmagatzemaran en memòria cau, el que resultarà en un augment significatiu del rendiment.';
$string['check_themedesignermode_details'] = 'Això és sovint el motiu de que hi hagi llocs de Moodle lents. <p>De mitjana es podria consumir com a mínim dues vegades la quantitat de CPU per executar un lloc Moodle amb el mode de disseny de tema habilitat.</p>';
$string['comments'] = 'Comentaris';
$string['disabled'] = 'Deshabilitat';
$string['edit'] = 'Edita';
$string['enabled'] = 'Habilitat';
$string['issue'] = 'Característica';
$string['morehelp'] = 'més ajuda';
$string['performancereportdesc'] = 'Aquest informe enumera les característiques que poden afectar el rendiment del lloc {$a}';
$string['performance:view'] = 'Mostra l\'informe de rendiment';
$string['pluginname'] = 'Resum del rendiment';
$string['value'] = 'Valor';
