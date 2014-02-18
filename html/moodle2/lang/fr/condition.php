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
 * Strings for component 'condition', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   condition
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcompletions'] = 'Ajouter au formulaire {no} conditions d\'activité';
$string['addgrades'] = 'Ajouter {no} conditions de note';
$string['adduserfields'] = 'Ajouter au formulaire {no} champs pour conditions';
$string['availabilityconditions'] = 'Restreindre la disponibilité';
$string['availablefrom'] = 'Disponible dès le';
$string['availablefrom_help'] = 'Les dates d\'accès dès le/jusqu\'au déterminent la période durant laquelle les participants peuvent accéder à l\'activité via un lien sur la page du cours.

La différence entre ces dates et les dates de disponibilité indiquées dans les réglages de l\'activité est que les dates de disponibilité permettent de voir la description de l\'activité, tandis que les dates d\'accès empêchent totalement l\'accès à l\'activité.';
$string['availableuntil'] = 'Disponible jusqu\'au';
$string['badavailabledates'] = 'Dates non valables. Si vous définissez les deux dates, assurez-vous que la date de début de disponibilité soit antérieure à celle de fin.';
$string['badgradelimits'] = 'Si vous définissez une limite supérieure et une limite inférieure, la limite supérieure doit être plus grande que la limite inférieure.';
$string['completion_complete'] = 'doit être marqué comme terminé';
$string['completioncondition'] = 'Condition de fin d\'activité';
$string['completioncondition_help'] = 'Ce réglage détermine les conditions sur l\'achèvement d\'autres activités pour que l\'activité soit rendue disponible. Le suivi d\'achèvement des activités doit bien entendu être activé avant qu\'une telle condition puisse être fixée.

Plusieurs conditions d\'achèvement peuvent être spécifiées. Dans ce cas, l\'activité sera rendue disponible lorsque toutes les conditions d\'achèvement d\'activité seront remplies.';
$string['completionconditionsection'] = 'Condition d\'achèvement d\'activité';
$string['completionconditionsection_help'] = 'Ce réglage détermine les conditions d\'achèvement d\'activité devant être remplies pour accéder à la section. Le suivi d\'achèvement doit d\'abord être activé avant de pouvoir ajouter des conditions d\'achèvement.

Plusieurs conditions d\'achèvement peuvent être ajoutées si désiré. Dans ce cas, l\'accès à la section ne sera permis que si toutes les conditions sont remplies.';
$string['completion_fail'] = 'doit être terminé avec une note d\'échec';
$string['completion_incomplete'] = 'ne doit pas être marqué comme terminé';
$string['completion_pass'] = 'doit être terminé avec une note de réussite';
$string['configenableavailability'] = 'Permet de définir des conditions (basées sur la date, une note ou la fin d\'une activité) qui déterminent si une activité ou une ressource est disponible.';
$string['contains'] = 'contient';
$string['doesnotcontain'] = 'ne contient pas';
$string['enableavailability'] = 'Activer la disponibilité conditionnelle';
$string['endswith'] = 'se termine par';
$string['fielddeclaredmultipletimes'] = 'Vous ne pouvez pas déclarer le même champ plus d\'une fois par activité.';
$string['grade_atleast'] = 'doit être supérieur à';
$string['gradecondition'] = 'Condition de note';
$string['gradecondition_help'] = 'Ce réglage détermine les conditions sur les notes pour que l\'activité soit rendue disponible.

Plusieurs conditions sur les notes peuvent être spécifiées. Dans ce cas, l\'activité sera rendue disponible lorsque toutes les conditions seront remplies.';
$string['gradeconditionsection'] = 'Condition de note';
$string['gradeconditionsection_help'] = 'Ce réglage détermine les conditions sur les notes à obtenir pour accéder à la section.

Plusieurs conditions de note peuvent être ajoutées si désiré. Dans ce cas, l\'accès à la section ne sera permis que si toutes les conditions sont remplies.';
$string['gradeitembutnolimits'] = 'Veuillez saisir une limite supérieure ou une limite inférieure, ou les deux.';
$string['gradelimitsbutnoitem'] = 'Vous devez sélectionner un élément d\'évaluation.';
$string['gradesmustbenumeric'] = 'Les notes maximales et minimales doivent être des nombres (ou vides).';
$string['grade_upto'] = 'et inférieur à';
$string['groupingnoaccess'] = 'Vous ne faites actuellement partie d\'aucun groupe ayant accès à cette section.';
$string['isempty'] = 'est vide';
$string['isequalto'] = 'est égal à';
$string['isnotempty'] = 'n\'est pas vide';
$string['none'] = '(aucune)';
$string['notavailableyet'] = 'Pas encore disponible';
$string['requires_completion_0'] = 'Non disponible tant que l\'activité <strong>{$a}</strong> n\'est pas terminée.';
$string['requires_completion_1'] = 'Non disponible avant que l\'activité <strong>{$a}</strong> soit marquée comme terminée.';
$string['requires_completion_2'] = 'Non disponible avant que l\'activité <strong>{$a}</strong> soit terminée et réussie.';
$string['requires_completion_3'] = 'Non disponible tant que l\'activité <strong>{$a}</strong> est terminée et non réussie.';
$string['requires_date'] = 'Disponible dès le {$a}.';
$string['requires_date_before'] = 'Disponible jusqu\'au {$a}.';
$string['requires_date_both'] = 'Disponible du {$a->from} au {$a->until}.';
$string['requires_date_both_single_day'] = 'Disponible le {$a}';
$string['requires_grade_any'] = 'Non disponible avant que vous receviez une note pour <strong>{$a}</strong>.';
$string['requires_grade_max'] = 'Non disponible tant que vous n\'obtenez pas une note adéquate dans <strong>{$a}</strong>.';
$string['requires_grade_min'] = 'Non disponible avant que vous obteniez une note requise dans <strong>{$a}</strong>.';
$string['requires_grade_range'] = 'Non disponible tant que vous n\'obtenez pas une note spécifique dans <strong>{$a}</strong>.';
$string['requires_user_field_contains'] = 'Non disponible à moins que votre <strong>{$a->field}</strong> ne contienne <strong>{$a->value}</strong>.';
$string['requires_user_field_doesnotcontain'] = 'Non disponible si votre <strong>{$a->field}</strong> contient <strong>{$a->value}</strong>.';
$string['requires_user_field_endswith'] = 'Non disponible à moins que votre <strong>{$a->field}</strong> ne se termine par <strong>{$a->value}</strong>.';
$string['requires_user_field_isempty'] = 'Non disponible à moins que votre <strong>{$a->field}</strong> ne soit vide.';
$string['requires_user_field_isequalto'] = 'Non disponible à moins que votre <strong>{$a->field}</strong> ne soit égal à <strong>{$a->value}</strong>.';
$string['requires_user_field_isnotempty'] = 'Non disponible si votre <strong>{$a->field}</strong> est vide</strong>.';
$string['requires_user_field_startswith'] = 'Non disponible à moins que votre <strong>{$a->field}</strong> ne se commence par <strong>{$a->value}</strong>.';
$string['showavailability'] = 'Avant que l\'activité soit disponible';
$string['showavailability_hide'] = 'Cacher complètement l\'activité';
$string['showavailabilitysection'] = 'Avant de pouvoir accéder à la section';
$string['showavailabilitysection_hide'] = 'Cacher complètement la section';
$string['showavailabilitysection_show'] = 'Griser la section, en indiquant les informations sur la restriction';
$string['showavailability_show'] = 'Afficher l\'activité en gris, avec une information sur la restriction';
$string['startswith'] = 'commence par';
$string['userfield'] = 'Champ utilisateur';
$string['userfield_help'] = 'Vous pouvez restreindre l\'accès en fonction de n\'importe quel champ du profil utilisateur.';
$string['userrestriction_hidden'] = 'Restreinte (cachée complètement, pas de message) : « {$a} »';
$string['userrestriction_visible'] = 'Restreinte : « {$a} »';
