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
 * Strings for component 'enrol_mnet', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   enrol_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['error_multiplehost'] = 'Des instances du plugin d\'inscription MNet existes déjà pour ce serveur. Une seule instance par serveur et/ou une pour tous les serveurs est autorisée.';
$string['instancename'] = 'Nom de la méthode d\'inscription';
$string['instancename_help'] = 'Vous pouvez renommer cette instance du plugin d\'inscription MNet. Si le champ n\'est pas renseigné, le nom par défaut sera utilisé. Ce nom comprend le nom du serveur distant et le rôle attribué à ses utilisateurs.';
$string['mnet_enrol_description'] = 'En publiant ce service, vous autorisez les administrateurs de {$a} à inscrire leurs étudiants à des cours sur votre Moodle.<br />
<ul>
<li><em>Dépendance</em> : vous devez également <strong>vous abonner</strong> au service SSO (fournisseur d\'identité) de {$a}.</li>
<li><em>Dépendance</em> : vous devez également <strong>publier</strong> le service SSO (fournisseur de service) pour {$a}.</li>
</ul><br />
En vous abonnant à ce service, vous pourrez inscrire vos étudiants aux cours sur {$a}.<br />
<ul>
<li><em>Dépendance</em> : vous devez également <strong>publier</strong> le service SSO (fournisseur d\'identité) pour {$a}.</li>
<li><em>Dépendance</em> : vous devez également <strong>vous abonner</strong> au service SSO (fournisseur de service) de {$a}.</li>
</ul><br />';
$string['mnet_enrol_name'] = 'Service d\'inscription à distance';
$string['pluginname'] = 'Inscriptions MNet';
$string['pluginname_desc'] = 'Permet à un serveur MNet distant d\'inscrire ses utilisateurs dans nos cours.';
$string['remotesubscriber'] = 'Serveur distant';
$string['remotesubscriber_help'] = 'Sélectionnez « Tous les serveurs » pour ouvrir ce cours à tous les serveurs MNet auxquels nous offrons le service d\'inscription à distance. Alternativement, un seul serveur peut être sélectionné pour ne donner accès à ce cours qu\'à ses utilisateurs.';
$string['remotesubscribersall'] = 'Tous les serveurs';
$string['roleforremoteusers'] = 'Rôles pour utilisateurs distants';
$string['roleforremoteusers_help'] = 'Le rôle qui sera attribué aux utilisateurs provenant du serveur sélectionné';
