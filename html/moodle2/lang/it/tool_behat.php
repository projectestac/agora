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
 * Strings for component 'tool_behat', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_behat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aim'] = 'Tool amministrativo per aiutare sviluppatori e tester a creare file .feature che descrivono le funzionalità di Moodle. I file potranno essere eseguiti automaticamente.';
$string['allavailablesteps'] = 'Tutte le definizioni disponibili degli step';
$string['giveninfo'] = 'Fornito. Procedure per impostare l\'ambiente';
$string['infoheading'] = 'Informazioni';
$string['installinfo'] = 'Per ulteriori informazioni sull\'installazione e lo svolgimento di test: {$a}';
$string['moreinfoin'] = 'Per maggiori informazioni: {$a}';
$string['newstepsinfo'] = 'Per ulteriori informazioni su come aggiungere definizioni di step: {$a}';
$string['newtestsinfo'] = 'Per per ulteriori informazioni su come preparare test: {$a}';
$string['nostepsdefinitions'] = 'Non sono presenti definizioni di step corrispondenti al filtro';
$string['pluginname'] = 'Test di accettazione';
$string['runclitool'] = 'Per elencare le definizioni di passi è necessario creare la cartella $CFG->behat_dataroot eseguendo il tool CLI Behat. Per farlo, è possibile andare nella cartella radice di Moodle ed eseguire "{$a}"';
$string['stepsdefinitionscomponent'] = 'Area';
$string['stepsdefinitionscontains'] = 'Contiene';
$string['stepsdefinitionsfilters'] = 'Definizione step';
$string['stepsdefinitionstype'] = 'Tipo';
$string['theninfo'] = 'Poi. Verifiche per assicurarsi che i risultati ottenuti siano quelli attesi.';
$string['unknownexceptioninfo'] = 'Si è verificato un errore in Selenium o nel browser. Per favore accertati di usare la versione più recente di Selenium: Errore:';
$string['viewsteps'] = 'Filtro';
$string['wheninfo'] = 'Quando. Azioni che generano un evento';
$string['wrongbehatsetup'] = 'Il setup bheat presenta dei problemi. E\' necessario accertarsi che:<ul>
<li>sia possibile eseguire il comando   possibile eseguire il comando "php admin/tool/behat/cli/init.php" dalla cartella radice di Moodle</li>
<li>il file vendor/bin/behat abbia i permessi per essere eseguito </li></ul>';
