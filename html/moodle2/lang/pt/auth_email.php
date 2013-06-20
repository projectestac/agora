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
 * Strings for component 'auth_email', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_emaildescription'] = 'O Autoregisto com confirmação por e-mail permite ao utilizador criar a sua própria conta através do botão \'Criar nova conta\' na página de entrada. Em seguida é enviado ao utilizador um e-mail de confirmação contendo um link seguro para uma página que permite ao utilizador confirmar a sua conta. Após esta confirmação, em futuros acessos deste utilizador, apenas será verificado se os dados de acesso (nome de utilizador e senha) coincidem com os existentes na base de dados do Moodle.
<br/><br/>Nota: Para além de ativar o módulo, deve ainda selecionar Autoregisto com confirmação por e-mail na configuração Autoregisto na página Gerir Autenticação';
$string['auth_emailnoemail'] = 'Não foi possível enviar um e-mail para o endereço especificado.';
$string['auth_emailrecaptcha'] = 'Esta configuração adiciona um elemento de confirmação visual/áudio à página de autoregisto. Esta funcionalidade protege o site de spammers e contribui para uma boa causa. <br />Consulte a página http://recaptcha.net/learnmore.html para mais informações. <br /><em>A extensão cURL do PHP é necessária para o funcionamento desta opção.</em>';
$string['auth_emailrecaptcha_key'] = 'Ativar a utilização de reCAPTCHA';
$string['auth_emailsettings'] = 'Configurações';
$string['pluginname'] = 'Autoregisto com confirmação por e-mail';
