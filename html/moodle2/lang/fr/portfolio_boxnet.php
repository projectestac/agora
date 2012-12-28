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
 * Strings for component 'portfolio_boxnet', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'Clef API';
$string['err_noapikey'] = 'Pas de clef API';
$string['err_noapikey_help'] = 'Il n\'y a pas de clef API configurée pour ce plugin. Vous pouvez en obtenir une sur la page de développement OpenBox.';
$string['existingfolder'] = 'Dossier existant dans lequel placer le(s) fichier(s)';
$string['folderclash'] = 'Le dossier dont vous avez demandé la création existe déjà !';
$string['foldercreatefailed'] = 'Échec de la création de votre dossier cible sur box.net';
$string['folderlistfailed'] = 'Échec de la récupération de la liste des fichiers d\'un dossier sur box.net';
$string['newfolder'] = 'Nouveau dossier dans lequel placer le(s) fichier(s)';
$string['noauthtoken'] = 'Impossible de récupérer un jeton dauthentification à utiliser dans cette session';
$string['notarget'] = 'Vous devez indiquer soit un dossier existant soit un dossier à créer vers lequel déposer les données';
$string['noticket'] = 'Impossible de récupérer un ticket sur box.net pour initier la session d\'authentification';
$string['password'] = 'Votre mot de passe box.net (ne sera pas enregistré)';
$string['pluginname'] = 'Box.net';
$string['sendfailed'] = 'Échec de l\'envoi de contenu vers box.net : {$a}';
$string['setupinfo'] = 'Instructions';
$string['setupinfodetails'] = 'Pour obtenir une clef API connectez-vous sur Box.net et rendez-vous sur la <a href="{$a->servicesurl}">page de développement OpenBox</a>. Dans « Developer Tools », suivez le lien « Create new application » et créez une nouvelle application pour votre site Moodle. La clef API est affichée dans la section « Backend parameters » du formulaire d\'édition de l\'application. Dans ce formulaire, remplissez le champ « Redirect URL » ainsi :<br /><code>{$a->callbackurl}</code><br />Vous pouvez aussi  fournir d\'autres informations sur votre site Moodle. Ces valeurs peuvent aussi être renseignées plus tard sur la page « View my applications ».';
$string['sharedfolder'] = 'Partagé';
$string['sharefile'] = 'Partager ce fichier ?';
$string['sharefolder'] = 'Partager ce nouveau dossier ?';
$string['targetfolder'] = 'Dossier cible';
$string['tobecreated'] = 'À créer';
$string['username'] = 'Votre nom d\'utilisateur box.net (ne sera pas enregistré)';
