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
 * @package    local
 * @subpackage oauth
 * @copyright  2014 onwards Pau Ferrer Ocaña
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../config.php');
require_once('lib.php');

$clientid = required_param('client_id', PARAM_RAW);
$responsetype = required_param('response_type', PARAM_RAW);
$scope = optional_param('scope', false, PARAM_TEXT);
$url = $CFG->wwwroot.'/local/oauth/login.php?client_id='.$clientid.'&response_type='.$responsetype;

if ($scope) {
    $url .= '&scope='.$scope;
}

$PAGE->set_url($CFG->wwwroot.'/local/oauth/login.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('login');

if (isloggedin() and !isguestuser()) {
    // include our OAuth2 Server object
    $server = oauth_get_server();

    $request = OAuth2\Request::createFromGlobals();
    $response = new OAuth2\Response();

    if (!$server->validateAuthorizeRequest($request, $response)) {
        $response->send();
        die();
    }

    $isauthorized = get_authorization_from_form($url, $clientid, $scope);

    if ($isauthorized) {
        add_to_log(SITEID, 'oauth', 'login', 'local/oauth/login.php', $scope. ' authorized', 0, $USER->id);
    } else {
        add_to_log(SITEID, 'oauth', 'login', 'local/oauth/login.php', $scope. ' unauthorized', 0, $USER->id);
    }

    // print the authorization code if the user has authorized your client
    $server->handleAuthorizeRequest($request, $response, $isauthorized, $USER->id);
    $response->send();
} else {
    $SESSION->wantsurl = $url;
    redirect(new moodle_url('/login/index.php'));
}
