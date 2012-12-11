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
 * Strings for component 'portfolio_flickr', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_flickr
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'Clef API';
$string['contenttype'] = 'Types de contenu';
$string['err_noapikey'] = 'Pas de clef API';
$string['err_noapikey_help'] = 'Il n\'y a pas de clef API configurée pour ce plugin.Vous pouvez en obtenir une sur la page des services Flickr.';
$string['hidefrompublicsearches'] = 'Cacher ces images des recherches publiques ?';
$string['isfamily'] = 'Visible pour la famille';
$string['isfriend'] = 'Visible pour les amis';
$string['ispublic'] = 'Public (visible pour tout le monde)';
$string['moderate'] = 'Modéré';
$string['noauthtoken'] = 'Impossible de récupérer un jeton d\'authentification à utiliser dans cette session';
$string['other'] = 'Oeuvre, illustration, CGI ou autres images non-photographiques';
$string['photo'] = 'Photos';
$string['pluginname'] = 'Flickr';
$string['restricted'] = 'Diffusion restreinte';
$string['safe'] = 'Sûr';
$string['safetylevel'] = 'Niveau de sécurité';
$string['screenshot'] = 'Copies d\'écran';
$string['set'] = 'Fixer';
$string['setupinfo'] = 'Instructions';
$string['setupinfodetails'] = 'Pour obtenir une clef API et une chaîne secrète, connectez-vous sur Flickr et <a href="{$a->applyurl}">demandez une nouvelle clef</a>. Une fois la clef et la chaîne secrète générées pour vous, suivez le lien « Edit auth flow for this app ». Sélectionnez l\'option « Web Application »pour l\'option « App type ». Dans le champ « Callback URL », indiquez la valeur :<br /><code>{$a->callbackurl}</code><br />Vous pouvez aussi indiquer une description de votre site Moodle et un logo. Ces valeurs peuvent aussi être renseignées plus tard sur <a href="{$a->keysurl}">la page</a> mentionnant vos applications Flickr.';
$string['sharedsecret'] = 'Chaîne secrète';
$string['title'] = 'Titre';
$string['uploadfailed'] = 'Échec du dépôt des images vers flickr.com : {$a}';
