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
 * Strings for component 'portfolio_mahara', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_mahara
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['enableleap2a'] = 'Ativar suporte para portefólio Leap2A (requer Mahara 1.3 ou superior)';
$string['err_invalidhost'] = 'O servidor da Rede Moodle indicado é inválido';
$string['err_invalidhost_help'] = 'Esta módulo está incorretamente configurado pois está a apontar para um servidor da Rede Moodle inválido ou que não existe. O funcionamento deste módulo baseia-se nos pares da Rede Moodle com  SSO IDP publicados, SSO_SP subscritos e portefólios subscritos <b>e</b> published.';
$string['err_networkingoff'] = 'A Rede Moodle está desativada';
$string['err_networkingoff_help'] = 'O MNet está completamente desativo. Ative-o antes de tentar configurar este módulo. Todas as instâncias deste módulo foram programadas para não ficarem visíveis até que isso seja corrigido - precisará de configurá-los para visíveis novamente de forma manual. Não poderá usá-las até realizar essa ação.';
$string['err_nomnetauth'] = 'O módulo de autenticação Rede Moodle está desativado';
$string['err_nomnetauth_help'] = 'Este serviço apenas pode funcionar se o módulo de autenticação Rede Moodle estiver ativo';
$string['err_nomnethosts'] = 'Depende da Rede Moodle';
$string['err_nomnethosts_help'] = 'O funcionamento deste módulo baseia-se nos pares da Rede Moodle com SSO IDP publicados, SSO SP subscritos, serviços de portefólio publicados <b>e</b> subscritos. Depende também do módulo de autenticação Rede Moodle. Enquanto estas condições não estiverem todas satisfeitas as instâncias deste módulo permanecerão ocultas, sendo depois necessário torná-las visíveis manualmente.';
$string['failedtojump'] = 'Não foi possível estabelecer ligação com o servidor externo';
$string['failedtoping'] = 'Não foi possível estabelecer ligação com o servidor externo: {$a}';
$string['mnethost'] = 'Servidor da Rede Moodle';
$string['mnet_nofile'] = 'Não foi encontrado o ficheiro no objeto de transferência (erro invulgar)';
$string['mnet_nofilecontents'] = 'Foi encontrado o objeto de transferência, mas não foi possível aceder ao seu conteúdo (erro invulgar): {$a}';
$string['mnet_noid'] = 'Não foi possível encontrar o registo de transferência referente a este token';
$string['mnet_notoken'] = 'Não foi possível encontrar o token correspondente a esta transferência';
$string['mnet_wronghost'] = 'O servidor indicado para esta transferência é token é inválido';
$string['pf_description'] = 'Permitir aos utilizadores o envio de conteúdo Moodle para este servidor.<br />Subscrever <b>e</b> publicar este serviço para permitir a utilizadores autenticados no site o envio de conteúdos para {$a}<br /><ul><li><em>Dependência</em>: É obrigatória a <strong>publicação</strong> do serviço de SSO (Identify Provider) para {$a}.</li><li><em>Dependência</em>: É obrigatória a <strong>subscrição</strong> do serviço SSO (Service Provider) em {$a}</li><li><em>Dependência</em>: É obrigatória a ativação do módulo de autenticação Rede Moodle.</li></ul><br />';
$string['pf_name'] = 'Serviços portefólio';
$string['pluginname'] = 'ePortefólio Mahara';
$string['senddisallowed'] = 'Não é possível transferir ficheiros para o site Mahara neste momento';
$string['url'] = 'URL';
