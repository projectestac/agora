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
 * Strings for component 'portfolio_boxnet', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apiv1migration_message_content'] = 'Au cours de la mise à jour à Moodle 2.6, le plugin de portfolio Box a été désactivé. Pour le réactiver, veuillez le reconfigurer suivant la procédure décrite dans la documentation {$a->docsurl}.';
$string['apiv1migration_message_small'] = 'Ce plugin a été désactivé, car il nécessite une configuration suivant la procédure décrite dans la documentation de migration APIv1 de Box.';
$string['apiv1migration_message_subject'] = 'Information importante concernant le plugin de portfolio Box';
$string['clientid'] = 'ID client';
$string['clientsecret'] = 'Secret client';
$string['existingfolder'] = 'Dossier existant dans lequel placer le(s) fichier(s)';
$string['folderclash'] = 'Le dossier dont vous avez demandé la création existe déjà !';
$string['foldercreatefailed'] = 'Échec de la création de votre dossier cible sur Box';
$string['folderlistfailed'] = 'Échec de la récupération de la liste des fichiers d\'un dossier sur Box';
$string['missinghttps'] = 'HTTPS requis';
$string['missinghttps_help'] = 'Box ne fonctionnera que sur un site web en HTTPS.';
$string['missingoauthkeys'] = 'ID et secret client manquants';
$string['missingoauthkeys_help'] = 'L\'ID client ou le secret ne sont pas configurés pour ce plugin. Vous pouvez obtenir ces données en visitant les pages développeur de Box.';
$string['newfolder'] = 'Nouveau dossier dans lequel placer le(s) fichier(s)';
$string['noauthtoken'] = 'Impossible de récupérer un jeton d\'authentification à utiliser dans cette session';
$string['notarget'] = 'Vous devez indiquer soit un dossier existant soit un dossier à créer vers lequel déposer les données';
$string['noticket'] = 'Impossible de récupérer un ticket sur Box pour initier la session d\'authentification';
$string['password'] = 'Votre mot de passe Box (ne sera pas enregistré)';
$string['pluginname'] = 'Box';
$string['sendfailed'] = 'Échec de l\'envoi de contenu vers Box : {$a}';
$string['setupinfo'] = 'Instructions';
$string['setupinfodetails'] = 'Pour obtenir un ID client et un secret, connectez-vous sur Box et rendez-vous sur la <a href="{$a->servicesurl}">page de développement de Box</a>. Suivez le lien « Create new application » et créez une nouvelle application pour votre site Moodle. L\'ID client et le secret sont affichés dans la section « OAuth2 parameters » du formulaire d\'édition de l\'application.
Vous pouvez aussi fournir optionnellement d\'autres informations au sujet de votre site Moodle.';
$string['sharedfolder'] = 'Partagé';
$string['sharefile'] = 'Partager ce fichier ?';
$string['sharefolder'] = 'Partager ce nouveau dossier ?';
$string['targetfolder'] = 'Dossier cible';
$string['tobecreated'] = 'À créer';
$string['username'] = 'Votre nom d\'utilisateur Box (ne sera pas enregistré)';
$string['warninghttps'] = 'Box requiert que votre site web utilise HTTPS pour son fonctionnement.';
