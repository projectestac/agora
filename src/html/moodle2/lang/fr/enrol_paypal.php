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
 * Strings for component 'enrol_paypal', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   enrol_paypal
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Attribuer rôle';
$string['businessemail'] = 'Courriel professionnel PayPal';
$string['businessemail_desc'] = 'L\'adresse de courriel de votre compte professionnel PayPal';
$string['cost'] = 'Coût d\'inscription';
$string['costerror'] = 'Le coût d\'inscription n\'est pas un nombre';
$string['costorkey'] = 'Veuillez choisir l\'une des méthodes d\'inscription suivantes.';
$string['currency'] = 'Devise';
$string['defaultrole'] = 'Attribution de rôle par défaut';
$string['defaultrole_desc'] = 'Sélectionner le rôle à attribuer aux utilisateurs s\'inscrivant par PayPal';
$string['enrolenddate'] = 'Date de fin';
$string['enrolenddate_help'] = 'Si ce réglage est activé, les utilisateurs seront inscrits jusqu\'à cette date seulement.';
$string['enrolenddaterror'] = 'La date de fin d\'inscription ne peut pas être antérieure à la date de début';
$string['enrolperiod'] = 'Durée d\'inscription';
$string['enrolperiod_desc'] = 'Durée par défaut de la période d\'inscription (en secondes). Si 0 est indiqué, la durée sera illimitée par défaut.';
$string['enrolperiod_help'] = 'Temps durant lequel l\'inscription est valable, à compter de l\'inscription de l\'utilisateur. Si l\'option est désactivée, la durée est illimitée.';
$string['enrolstartdate'] = 'Date de début';
$string['enrolstartdate_help'] = 'Si ce réglage est activé, les utilisateurs seront inscrits à partir de cette date seulement.';
$string['mailadmins'] = 'Notifier les administrateurs';
$string['mailstudents'] = 'Notifier les étudiants';
$string['mailteachers'] = 'Notifier les enseignants';
$string['messageprovider:paypal_enrolment'] = 'Messages de l\'inscription PayPal';
$string['nocost'] = 'Aucun prix n\'est défini pour s\'inscrire à ce cours !';
$string['paypalaccepted'] = 'Paiements par PayPal acceptés';
$string['paypal:config'] = 'Configurer les instances d\'inscription PayPal';
$string['paypal:manage'] = 'Gérer les utilisateurs inscrits';
$string['paypal:unenrol'] = 'Désinscrire des utilisateurs d\'un cours';
$string['paypal:unenrolself'] = 'Se désinscrire d\'un cours';
$string['pluginname'] = 'PayPal';
$string['pluginname_desc'] = 'Le module PayPal permet de mettre sur pied des cours payants. Si le prix d\'un cours est zéro, l\'entrée du cours est libre. Il est possible de définir un prix par défaut pour tous les cours du site, ainsi qu\'un prix pour chaque cours. Le prix défini dans un cours a priorité sur le prix par défaut.';
$string['sendpaymentbutton'] = 'Envoyer un paiement avec PayPal';
$string['status'] = 'Permettre les inscriptions PayPal';
$string['status_desc'] = 'Permettre par défaut aux utilisateurs d\'utiliser PayPal pour s\'inscrire à un cours';
$string['unenrolselfconfirm'] = 'Voulez-vous vraiment vous désinscrire du cours « {$a} »?';
