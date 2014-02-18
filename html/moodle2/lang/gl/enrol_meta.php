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
 * Strings for component 'enrol_meta', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_meta
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['meta:config'] = 'Configurar instancias de meta matriculación';
$string['meta:selectaslinked'] = 'Seleccionar curso como meta ligado';
$string['meta:unenrol'] = 'Desmatricular os usuarios suspensos';
$string['nosyncroleids'] = 'Roles que non están sincronizados';
$string['nosyncroleids_desc'] = 'De modo predeterminado, todas as tarefas de rol no nivel do curso están sincronizadas a partir de cursos pai a cursos fillo. Os roles que aquí están seleccionados non se incluirán no proceso de sincronización. Os roles dispoñíbeis para sincronización actualizaranse na vindeira execución do cron.';
$string['pluginname'] = 'Meta ligazón sobre curso';
$string['pluginname_desc'] = 'A metaligazón sobre curso do engadido de matriculación sincroniza as matriculacións e roles en dous cursos diferentes.';
$string['syncall'] = 'Sincronice todos os usuarios matriculados';
$string['syncall_desc'] = 'De estar activado, todos os usuarios matriculados están sincronizados mesmo cando non teñan ningún rol do curso pai, no caso de estar desactivado soamente os usuarios que teñen cando menos un rol sincronizado serán matriculados no curso fillo.';
