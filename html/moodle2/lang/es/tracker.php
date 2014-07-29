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
 * Strings for component 'tracker', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   tracker
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['modulename_help'] = 'La actividad Rastreador (Tracker) permite rastrear boletos (tickets) para ayuda, reporte de errores (bugs) o también actividades rastreables en un curso.

La actividad permite crear un formato de rastreo con elementos de atributos de una lista de elementos configurables. Algunos elementos pueden compartirse a nivel de sitio para re-utilizarse en otros rastreadores.

El boleto (o tarea) puede asignarse para que lo trabaje otro usuario.

El boleto rastreado es un boleto con estado, que manda las notificaciones del cambio de estado a cualquier seguidor que haya habilitado las notificaciones. Un usuario puede elegir cuales cambios de estado rastrea él usualmente.

Los boletos pueden encadenarse en sus dependencias, de forma que sea fácil seguir la secuencia de causa/consecuencia del boleto.

Se rastrea la historia de los cambios para cada boleto.

El rastreador de boletos puede cascadearse localmente, o a través de MNET, permitiendo al mánager de boletos enviar un boleto a un colector de boletos remoto (de mayor nivel).

Los rastreadores ahora pueden estar encadenados de forma que el boleto pueda moverse entre rastreadores.';
