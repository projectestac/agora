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
 * Strings for component 'enrol_mnet', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['error_multiplehost'] = 'Já existe uma instância do módulo de inscrição Mnet neste servidor. Apenas é possível ter uma instância por servidor e/ou uma instância para "Todos os servidores"';
$string['instancename'] = 'Nome do método de inscrição';
$string['instancename_help'] = 'Se assim o desejar pode renomear esta instância do método de inscrição MNet.Se este campo ficar vazio, será utilizado o nome predefinido (contém o nome do servidor externo e o papel atribuído aos seus utilizadores).';
$string['mnet_enrol_description'] = 'Publicar este serviço de modo a permitir que os administradores do servidor {$a} inscrevam os seus alunos nas disciplinas existentes no Moodle.
<br /><ul><li><em>Dependência</em>: Também tem de <strong>publicar</strong> o serviço SSO (Fornecedor de Serviço) para {$a}.</li><li><em>Dependência</em>: Também tem de <strong>subscrever</strong>
o serviço SSO (Fornecedor de Identidade) em {$a}. </li></ul><br />Subscreva este serviço para poder inscrever os seus alunos nas disciplinas existentes em {$a}.<br /><ul><li><em>Dependência</em>: Também tem de <strong>subscrever</strong> o serviço SSO (Fornecedor de Serviço) em {$a}.</li><li><em>Dependência</em>: Também tem de <strong>publicar</strong> o serviço SSO (Fornecedor de Identidade) para {$a}.</li></ul><br />';
$string['mnet_enrol_name'] = 'Serviço de inscrição externa';
$string['pluginname'] = 'Inscrições através da Rede Moodle';
$string['pluginname_desc'] = 'Este módulo permite que utilizadores (externos) registados na Rede Moodle possam inscrever os seus utilizadores nas disciplinas existentes neste Moodle.';
$string['remotesubscriber'] = 'Servidor externo';
$string['remotesubscriber_help'] = 'Selecione "Todos os servidores" para disponibilizar esta disciplina a todos os pares da Rede Moodle que utilizem o serviço de inscrições externas. Em alternativa, defina apenas um servidor se quiser disponibilizar a disciplina apenas aos utilizadores desse servidor.';
$string['remotesubscribersall'] = 'Todos os servidores';
$string['roleforremoteusers'] = 'Papel para os seus utilizadores';
$string['roleforremoteusers_help'] = 'Papel que será atribuído aos utilizadores que forem inscritos por servidores externos.';
