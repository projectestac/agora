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
 * Strings for component 'auth_pam', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_pam
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_pamdescription'] = 'Cette méthode utilise PAM pour accéder aux noms d\'utilisateurs natifs sur ce serveur. Pour utiliser ce module, vous devrez installer le logiciel <a href="http://www.math.ohio-state.edu/~ccunning/pam_auth/">PHP4 PAM Authentication</a>.';
$string['auth_passwordisexpired'] = 'Votre mot de passe est échu. Voulez-vous le changer maintenant ?';
$string['auth_passwordwillexpire'] = 'Votre mot de passe arrivera à échéance dans {$a} jours. Voulez-vous changer votre mot de passe maintenant ?';
$string['pluginname'] = 'PAM (Modules d\'authentification installables)';
