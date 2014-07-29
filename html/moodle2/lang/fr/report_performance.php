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
 * Strings for component 'report_performance', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   report_performance
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_backup'] = 'Sauvegarde automatique';
$string['check_backup_comment_disable'] = 'La performance peut être détériorée durant le processus de sauvegarde. Si les sauvegardes automatiques sont activées, elles devraient être planifiées en dehors des heures de pointe.';
$string['check_backup_comment_enable'] = 'La performance peut être détériorée durant le processus de sauvegarde. Elles doivent être planifiées en dehors des heures de pointe.';
$string['check_backup_details'] = 'L\'activation des sauvegardes automatiques créera des archives de tous les cours de ce site à l\'heure que vous indiquez.<p>Durant cette opération, des ressources serveur supplémentaires seront utilisées, qui pourraient affecter négativement la performance.</p>';
$string['check_cachejs_comment_disable'] = 'Si ce réglage est activé, la performance de chargement des pages est améliorée.';
$string['check_cachejs_comment_enable'] = 'Si ce réglage est désactivé, les pages pourraient se charger lentement.';
$string['check_cachejs_details'] = 'La mise en cache et la compression du Javascript améliore substantiellement le temps de chargement des pages. Elles sont fortement recommandées pour des sites en production.';
$string['check_debugmsg_comment_developer'] = 'Si le réglage est placé sur autre chose que Développeur, la performance sera légèrement meilleure.';
$string['check_debugmsg_comment_nodeveloper'] = 'Si le réglage est placé sur Développeur, la performance sera légèrement moins bonne.';
$string['check_debugmsg_details'] = 'Il ne sert généralement à rien de régler le niveau à Développeur, à moins que vous ne soyez un développeur. Dans ce cas, c\'est alors chaudement recommandé.<p>Une fois le message d\'erreur obtenu, copié et collé quelque part, il est fortement recommandé de remettre le débogage sur Aucun. Les messages de débogage peuvent donner des indices à un éventuel pirate sur la configuration de votre site et peuvent en outre affecter négativement la performance.</p>';
$string['check_enablestats_comment_disable'] = 'La performance peut être affectée par le traitement des statistiques. Si les statistiques sont activées, leurs réglages doivent être choisis avec soin.';
$string['check_enablestats_comment_enable'] = 'La performance peut être affectée par le traitement des statistiques. Les réglages de statistique doivent être choisis avec soin.';
$string['check_enablestats_details'] = 'L\'activation de ce réglage aura pour effet le traitement des historiques et la récolte de statistiques. Suivant la quantité de trafic sur votre site, ceci peut prendre du temps.<p>Durant cette opération, des ressources serveur supplémentaires seront utilisées, qui pourraient affecter négativement la performance.</p>';
$string['check_themedesignermode_comment_disable'] = 'Si ce réglage est activé, les images et feuilles de style ne seront pas mises en cache, et la performance sera dégradée de manière sensible.';
$string['check_themedesignermode_comment_enable'] = 'Si ce réglage est désactivé, les images et feuilles de style sont mise ne cache, et la performance sera améliorée de manière sensible.';
$string['check_themedesignermode_details'] = 'Ce réglage est souvent la cause de sites Moodle lents.<p>En moyenne, un site Moodle avec le mode concepteur de thème activé consomme au moins deux fois plus de temps CPU.</p>';
$string['comments'] = 'Commentaires';
$string['disabled'] = 'Désactivé';
$string['edit'] = 'Modifier';
$string['enabled'] = 'Activé';
$string['issue'] = 'Problème';
$string['morehelp'] = 'plus d\'aide';
$string['performancereportdesc'] = 'Ce rapport liste les problèmes pouvant affecter la performance du site {$a}';
$string['performance:view'] = 'Consulter le rapport de performance';
$string['pluginname'] = 'Panorama de performance';
$string['value'] = 'Valeur';
