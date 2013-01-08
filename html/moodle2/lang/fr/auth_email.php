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
 * Strings for component 'auth_email', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_emaildescription'] = '<p>L\'auto-enregistrement par courriel permet aux utilisateurs de se créer leur propre compte en cliquant sur un bouton « Créer un compte » sur la page d\'accueil. L\'utilisateur reçoit par courriel un message de confirmation contenant un lien sécurisé vers une page où il peut confirmer son compte. Les connexions suivantes ne vérifient que les nom d\'utilisateur et mot de passe précédemment enregistrés dans la base de données de Moodle.</p><p>Remarque : pour utiliser cette méthode de création de compte, en plus d\'activer ce plugin, il faut également sélectionner l\'option « Auto-enregistrement par courriel » dans le menu déroulant spécifiant l\'auto-enregistrement sur la page « Gestion de l\'authentification.»</p>';
$string['auth_emailnoemail'] = 'La tentative de vous envoyer un courriel a échoué !';
$string['auth_emailrecaptcha'] = 'Ajoute une confirmation visuelle ou audio aux éléments du formulaire de la page d\'enregistrement pour les utilisateurs s\'enregistrant eux-mêmes avec confirmation par courriel. Ceci permet de protéger votre site contre les spammeurs et contribue en même temps à une cause valable. Voir http://www.google.com/recaptcha/learnmore pour plus de détails.<br /><em>L\'extension cURL de PHP est requise.</em>';
$string['auth_emailrecaptcha_key'] = 'Activer reCAPTCHA';
$string['auth_emailsettings'] = 'Réglages';
$string['pluginname'] = 'Auto-enregistrement par courriel';
