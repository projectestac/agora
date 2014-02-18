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
 * Strings for component 'enrol_mnet', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['error_multiplehost'] = 'Xa existe algunha instancia do engadido MNet para matriculación neste servidor. Soamente se permite unha instancia por servidor e/ou unha instancia para «Todos os servidores».';
$string['instancename'] = 'Nome do método de matriculación';
$string['instancename_help'] = 'Podes renomear opcionalmente esta instancia do método de matriculación MNet. Se deixa este campo baleiro, utilizarase o nome predeterminado da instancia, que contén o nome do servidor remoto e o rol asignado para os seus usuarios.';
$string['mnet_enrol_description'] = 'Publicar este servizo para permitirlles aos administradores de {$a} inscribir os seus alumnos en cursos creados no seu servidor.<br/><ul>
<li><em>Dependencia</em>: Tamén debe <strong>subscribirse</strong> ao servizo SSO (servizo fornecedor de identidade) en {$a}.</li>
<li><em>Dependencia</em>: Tamén debe <strong>publicar</strong> o servizo SSO (servizo fornecedor de identidade) en {$a}.</li></ul><br/>Subscribirse a este servizo para poder matricular os seus alumnos nos cursos en {$a}.<br/><ul><li>
<em>Dependencia</em>: Tamén debe <strong>publicar</strong> o servizo SSO (servizo fornecedor) en {$a}.</li>
<li><em>Dependencia</em>: Tamén debe <strong>subscribirse</strong> ao servizo SSO (fornecedor de identidade) en {$a}.</li></ul><br/>';
$string['mnet_enrol_name'] = 'Inscrición da conexión Moodle';
$string['pluginname'] = 'Matriculacións MNet remotas';
$string['pluginname_desc'] = 'Permitir que o servidor remoto MNet matricules os seus usuarios nos cursos.';
$string['remotesubscriber'] = 'Servidor remoto';
$string['remotesubscriber_help'] = 'Seleccione «Todos os servidores» para abrir este curso a todos os pares MNet aos que estamos a ofrecer a matriculación remota. Ou escolla un só servidor para facer este curso dispoñíbel só para os seus usuarios.';
$string['remotesubscribersall'] = 'Todos os servidores';
$string['roleforremoteusers'] = 'Rol para os seus usuarios';
$string['roleforremoteusers_help'] = 'Que rol obterán os usuarios remotos do servidor seleccionado.';
