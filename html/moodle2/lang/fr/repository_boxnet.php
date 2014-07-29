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
 * Strings for component 'repository_boxnet', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   repository_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'Clef API';
$string['apiv1migration_message_content'] = 'Au cours de la mise à jour à Moodle 2.6, 2.5.3 ou 2.4.7, le plugin de dépôt Box a été désactivé. Pour le réactiver, veuillez le reconfigurer suivant la procédure décrite dans la documentation {$a->docsurl}.';
$string['apiv1migration_message_small'] = 'Le plugin a été désactivé, car il nécessite une configuration suivant la procédure décrite dans la documentation de migration APIv1 de Box.';
$string['apiv1migration_message_subject'] = 'Information importante concernant le plugin de dépôt Box';
$string['boxnet:view'] = 'Consulter un dépôt Box';
$string['cannotcreatereference'] = 'Impossible de créer une référence. Les permissions sont insuffisantes pour partager le fichier sur Box.';
$string['clientid'] = 'ID client';
$string['clientsecret'] = 'Secret client';
$string['configplugin'] = 'Configuration Box';
$string['filesourceinfo'] = 'Box ({$a->fullname}) : {$a->filename}';
$string['information'] = 'Obtenir un ID client et un secret pour votre Moodle sur la <a href="http://www.box.net/developers/services">page développeur de Box</a>.';
$string['invalidpassword'] = 'Mot de passe non valide';
$string['migrationadvised'] = 'Il semble que vous avez utilisé Box avec la version 1 de l\'API. Avez-vous lancé l\'<a href="{$a}">outil de migration</a> pour convertir les anciennes références ?';
$string['migrationinfo'] = '<p>Au cours de la migration à la nouvelle API fournie par Box, les références de vos fichiers ont été modifiées. Malheureusement, le système de référence n\'est pas compatible avec la version 2 de cette API. Elle doivent donc être téléchargées et converties en fichiers réels.</p>
<p>Veuillez également prendre note que la migration peut durer <strong>extrêmement longtemps</strong>, suivant le nombre de références et la taille des fichiers utilisés.</p>
<p>Vous pouvez lancer l\'utilitaire de migration en cliquant sur le bouton ci-dessous, ou lancer le script en ligne de commande : repository/boxnet/cli/migrationv1.php.</p>
<p>Des détails sont disponibles <a href="{$a->docsurl}">ici</a>.</p>';
$string['migrationtool'] = 'Outil de migration Box APIv1';
$string['nullfilelist'] = 'Il n\'y a aucun fichier dans ce dépôt';
$string['password'] = 'Mot de passe';
$string['pluginname'] = 'Box';
$string['pluginname_help'] = 'Dépôt sur Box';
$string['runthemigrationnow'] = 'Lancer l\'outil de migration maintenant';
$string['saved'] = 'Données Box enregistrées';
$string['shareurl'] = 'Partager l\'URL';
$string['username'] = 'Nom d\'utilisateur Box';
$string['warninghttps'] = 'Pour que le dépôt fonctionne, Box requiert que votre site web utilise HTTPS.';
