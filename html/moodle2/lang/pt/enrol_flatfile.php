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
 * Strings for component 'enrol_flatfile', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_flatfile
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['filelockedmail'] = 'O script cron não conseguiu apagar do servidor o ficheiro de texto ({$a}) que está a ser utilizado na gestão de inscrições. O problema deverá estar relacionado com as permissões desse ficheiro. Enquanto esta questão não for resolvida, o ficheiro será processado consecutivamente por não ter sido removido durante o processamento.';
$string['filelockedmailsubject'] = 'Erro importante: Ficheiro de inscrições';
$string['location'] = 'Localização do ficheiro';
$string['mailadmin'] = 'Notificar administradores por e-mail';
$string['mailstudents'] = 'Notificar alunos por e-mail';
$string['mailteachers'] = 'Notificar professores por e-mail';
$string['mapping'] = 'Mapeamento do ficheiro de texto';
$string['messageprovider:flatfile_enrolment'] = 'Marcar ficheiro de inscrição';
$string['pluginname'] = 'Ficheiro de texto (CSV)';
$string['pluginname_desc'] = 'Este módulo de inscrição verifica continuamente a existência de um ficheiro com informação de inscrições e fará o seu processamento sempre que encontrar esse ficheiro na localização indicada na configuração do módulo.
O conteúdo deste ficheiro é constituído por linhas, cada uma com 4 ou 6 campos, separados por vírgulas:
<br /><br />
operation, role, idnumber (utilizador), idnumber(disciplina) [, starttime, endtime]
<br /><br />em que:
<br />- operation = admite os valores add ou del
<br />- role = admite os valores student ou teacher ou teacheredit
<br />- idnumber (utilizador) = campo "idnumber" da tabela de utilizadores, não usar o campo "id"
<br />- idnumber (disciplina) = campo "idnumber" da tabela de disciplinas, não usar o campo "id"
<br />- starttime = início da inscrição (contado em segundos desde 1-1-1970 - Unix timestamp) - opcional
<br />- endtime =  fim da inscrição (contado em segundos desde 1-1-1970 - Unix timestamp) - opcional
<br /><br />
Exemplo:
<br />
<br />add, student, 5, CF101
<br />add, teacher, 6, CF101
<br />add, teacheredit, 7, CF101
<br />del, student, 8, CF101
<br />del, student, 17, CF101
<br />add, student, 21, CF101, 1091115000, 1091215000';
