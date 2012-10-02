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
 * Strings for component 'workshopallocation_scheduled', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   workshopallocation_scheduled
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['currentstatus'] = 'Statut actuel';
$string['currentstatusexecution'] = 'Statut';
$string['currentstatusexecution1'] = 'Effectué le {$a->datetime}';
$string['currentstatusexecution2'] = 'À effectuer de nouveau le {$a->datetime}';
$string['currentstatusexecution3'] = 'À effectuer le {$a->datetime}';
$string['currentstatusexecution4'] = 'En attente d\'exécution';
$string['currentstatusnext'] = 'Prochaine exécution';
$string['currentstatusnext_help'] = 'Dans certains cas, l\'allocation est planifiée de façon à être effectuée automatiquement une nouvelle fois, même si elle a été déjà faite. Ceci peut se passer par exemple si le délai de remise des travaux a été prolongé.';
$string['currentstatusreset'] = 'Réinitialiser';
$string['currentstatusreset_help'] = 'L\'enregistrement de ce formulaire avec cette case cochée aura pour résultat la réinitialisation de l\'état actuel. Toutes les informations sur une exécution antérieure seront supprimées et l\'attribution sera effectuée à nouveau (si elle est activée ci-dessus).';
$string['currentstatusresetinfo'] = 'Cocher cette case et enregistrer le formulaire pour réinitialiser les résultats de l\'exécution';
$string['currentstatusresult'] = 'Résultat récent de l\'exécution';
$string['enablescheduled'] = 'Activer l\'attribution programmée';
$string['enablescheduledinfo'] = 'Attribuer automatiquement les travaux à la fin de la phase de remise';
$string['pluginname'] = 'Attribution programmée';
$string['randomallocationsettings'] = 'Réglages des attributions aléatoires';
$string['randomallocationsettings_help'] = 'Les paramètres pour la méthode d\'attribution aléatoire sont définis ici. Ils seront utilisés par le plugin d\'attribution aléatoire pour l\'attribution des travaux.';
$string['resultdisabled'] = 'Attribution programmée désactivée';
$string['resultenabled'] = 'Attribution programmée activée';
$string['resultexecuted'] = 'Succès';
$string['resultfailed'] = 'Impossible d\'attribuer automatiquement les travaux';
$string['resultfailedconfig'] = 'Attribution programmée mal configurée';
$string['resultfaileddeadline'] = 'Le délai de remise des travaux n\'est pas défini';
$string['resultfailedphase'] = 'L\'atelier n\'est pas dans la phase de remise';
$string['resultvoid'] = 'Aucun travail n\'a été attribué';
$string['resultvoiddeadline'] = 'Pas tout de suite après le délai de remise';
$string['resultvoidexecuted'] = 'L\'attribution a déjà été effectuée';
$string['scheduledallocationsettings'] = 'Réglages d\'attribution programmée';
$string['scheduledallocationsettings_help'] = 'Si ce réglage est activé, la méthode d\'attribution programmée attribuera des travaux à évaluer, au terme de la phase de remise. La fin de la phase peut être définie au moyen du réglage « Délai de remise » de l\'atelier.

À l\'interne, la méthode d\'attribution programmée est lancée avec les paramètre prédéfinis sur cette page. Cela signifie qu\'elle fonction de la même manière que si l\'enseignant avant lancé manuellement l\'allocation aléatoire au terme de la phase de remise des travaux avec les réglages ci-dessous.

Il est à noter que l\'attribution programmée ne sera pas lancée si vous passez manuellement l\'atelier à la phase d\'évaluation avant le délai fixé pour la fin de la phase de remise des travaux. Dans ce cas, l\'attribution doit être lancée manuellement. La méthode d\'attribution programmée est particulièrement utile lorsqu\'elle est couplée au passage automatique d\'une phase à l\'autre.';
$string['setup'] = 'Configurer l\'attribution programmée';
