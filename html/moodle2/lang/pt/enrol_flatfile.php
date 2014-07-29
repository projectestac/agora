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
 * Strings for component 'enrol_flatfile', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_flatfile
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['encoding'] = 'Codificação do ficheiro';
$string['expiredaction'] = 'Ação de expiração de inscrição';
$string['expiredaction_help'] = 'Selecione a ação a ser executada quando a inscrição do utilizador expira. Por favor, note que alguns dados e configurações do utilizador são removidos da disciplina durante o processo de desinscrição.';
$string['filelockedmail'] = 'O script cron não conseguiu apagar do servidor o ficheiro de texto ({$a}) que está a ser utilizado na gestão de inscrições. O problema deverá estar relacionado com as permissões desse ficheiro. Enquanto esta questão não for resolvida, o ficheiro será processado consecutivamente por não ter sido removido durante o processamento.';
$string['filelockedmailsubject'] = 'Erro importante: Ficheiro de inscrições';
$string['flatfile:manage'] = 'Gerir inscrições do utilizador manualmente';
$string['flatfile:unenrol'] = 'Desinscrever utilizadores da disciplina manualmente.';
$string['location'] = 'Localização do ficheiro';
$string['location_desc'] = 'Especifique o caminho completo para o ficheiro de inscrição. O ficheiro é automaticamente apagado após o processamento.';
$string['mapping'] = 'Mapeamento do ficheiro de texto do papel';
$string['messageprovider:flatfile_enrolment'] = 'Marcar ficheiro de inscrição';
$string['notifyadmin'] = 'Notificar administrador';
$string['notifyenrolled'] = 'Notificar utilizadores inscritos';
$string['notifyenroller'] = 'Notificar utilizadores responsáveis pelas inscrições';
$string['pluginname'] = 'Ficheiro de texto (CSV)';
$string['pluginname_desc'] = 'Este módulo de inscrição verifica continuamente a existência de um ficheiro com informação de inscrições e fará o seu processamento sempre que encontrar esse ficheiro na localização indicada na configuração do módulo.

O conteúdo deste ficheiro é constituído por linhas, cada uma com 4 ou 6 campos, separados por vírgulas:

operation, role, idnumber (utilizador), idnumber(disciplina) [, starttime, endtime]

em que:
*operation = admite os valores \'add\' ou \'del\';
*role = admite os valores \'student\', \'teacher\' ou \'teacheredit\';
*idnumber (utilizador) = campo "idnumber" da tabela de utilizadores, não usar o campo "id";
*idnumber (disciplina) = campo "idnumber" da tabela de disciplinas, não usar o campo "id";
*starttime = início da inscrição (em segundos e a partir de uma época) - opcional;
*endtime =  fim da inscrição (em segundos e a partir de uma época) - opcional.

Poderá assemelhar-se a algo como:
<pre class="informationbox">
   add, student, 5, CF101
   add, teacher, 6, CF101
   add, teacheredit, 7, CF101
   del, student, 8, CF101
   del, student, 17, CF101
   add, student, 21, CF101, 1091115000, 1091215000
</pre>';
