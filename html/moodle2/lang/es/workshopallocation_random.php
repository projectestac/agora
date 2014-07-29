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
 * Strings for component 'workshopallocation_random', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   workshopallocation_random
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addselfassessment'] = 'Agregar autoevaluaciones';
$string['allocationaddeddetail'] = 'Nueva evaluación a realizar: <strong>{$a->reviewername}</strong> es revisor de <strong>{$a->authorname}</strong>';
$string['allocationdeallocategraded'] = 'Nueva evaluación a realizar: <strong>{$a->reviewername}</strong> es revisor de <strong>{$a->authorname}</strong>';
$string['allocationreuseddetail'] = 'Evaluación reutilizada: <strong>{$a->reviewername}</strong> mantenida como revisor de <strong>{$a->authorname}</strong>';
$string['allocationsettings'] = 'Ajustes de asignación';
$string['assessmentdeleteddetail'] = 'Evaluación desasignada: <strong>{$a->reviewername}</strong> ya no es revisor de <strong>{$a->authorname}</strong>';
$string['assesswosubmission'] = 'Los participantes pueden evaluar sin haber enviado nada';
$string['confignumofreviews'] = 'Número por defecto de envíos para ser asignado al azar';
$string['excludesamegroup'] = 'Impedir revisiones por pares del mismo grupo';
$string['noallocationtoadd'] = 'No hay asignaciones que agregar';
$string['nogroupusers'] = '<p>Advertencia: Si el taller está en el modo de  \'grupos visibles\' o en modo de  \'grupos separados\' , entonces, los usuarios DEBEN DE SER miembros de cuando menos un grupo para poder tener evaluación por pares que les sean asignados por esta herramienta. Los usuarios que no estén agrupados, todavía podrán tener nuevas auto-evaluaciones o que se les remuevan evaluaciones existentes.</p> <p>Estos usuarios actualmente no están en un grupo: {$a}</p>';
$string['numofdeallocatedassessment'] = 'Desasignando {$a} evaluación(es)';
$string['numofrandomlyallocatedsubmissions'] = 'Asignación aleatorio de {$a} entregas';
$string['numofreviews'] = 'Número de evaluaciones';
$string['numofselfallocatedsubmissions'] = 'Auto-asignando {$a} envíos(s)';
$string['numperauthor'] = 'por envío';
$string['numperreviewer'] = 'por revisor';
$string['pluginname'] = 'Asignación aleatoria';
$string['randomallocationdone'] = 'Asignación aleatoria realizada';
$string['removecurrentallocations'] = 'Eliminar asignaciones actuales';
$string['resultnomorepeers'] = 'No hay más pares disponibles';
$string['resultnomorepeersingroup'] = 'No hay más pares disponibles en este grupo separado';
$string['resultnotenoughpeers'] = 'No hay suficientes pares disponibles';
$string['resultnumperauthor'] = 'Tratando de asignar {$a} revisión(es) por autor';
$string['resultnumperreviewer'] = 'Tratando de asignar {$a} revisión(es) por revisor';
$string['stats'] = 'Estadísticas de la asignación actual';
