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
 * Strings for component 'tool_bloglevelupgrade', language 'es', branch 'MOODLE_23_STABLE'
 *
 * @package   tool_bloglevelupgrade
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bloglevelupgradedescription'] = '<p>Este sitio ha sido recientemente actualizado a Moodle 2.0. </p>
<p>La visibilidad de los blog se ha simplificado en 2.0, pero su sitio sigue utilizando uno de los tipos de visibilidad antiguos.</p>
<p>Para preservar la visibilidad basada en el curso o en el grupo de las entradas de blog en este sitio debe ejecutar el script de actualización siguiente, lo que creará un foro de blog especial en cada curso cuyos usuarios inscritos hayan publicado entradas de blog, y copiará estas entradas en este foro especial.</p>
<p> Los blogs serán entonces totalmente desconectados a nivel de sitio. No se eliminarán entradas de blog en el proceso. </p>
<p>Puede ejecutar la secuencia de comandos visitando <a>href="{$a->}fixurl}"> la página de actualización del nivel de blog</a>. </p>';
$string['bloglevelupgradeinfo'] = '<p>La visibilidad de los blog se ha simplificado en 2.0, pero su sitio sigue utilizando uno de los tipos de visibilidad antiguos.</p>
<p>Para preservar la visibilidad basada en el curso o en el grupo de las entradas de blog en este sitio debe ejecutar el script de actualización siguiente, lo que creará un foro de blog especial en cada curso cuyos usuarios inscritos hayan publicado entradas de blog, y copiará estas entradas en este foro especial.</p>
<p> Los blogs serán entonces totalmente desconectados a nivel de sitio. No se eliminarán entradas de blog en el proceso. </p>';
$string['bloglevelupgradeprogress'] = 'Progreso de la conversión: {$a->userscount} usuarios revisados, {$a->blogcount} entradas convertidas.';
$string['pluginname'] = 'Actualizar visibilidad del blog';
