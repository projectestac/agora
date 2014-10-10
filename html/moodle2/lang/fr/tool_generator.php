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
 * Strings for component 'tool_generator', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_generator
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bigfile'] = 'Gros fichier {$a}';
$string['courseexplanation'] = 'Cet outil crée des cours de test standardisés qui contiennent de nombreuses sections, activités et fichiers.

Ces cours permettent de fournir une mesure standardisée pour vérifier la fiabilité et la performance des divers composants système (comme la sauvegarde et la restauration).

Ces tests sont importants, car il y peut y avoir de nombreux cas d\'utilisation réels (par exemple des cours avec plus de 1000 activités) où le système ne fonctionne pas correctement.

Les cours créés au moyen de cet outil peuvent occuper une place importante en base de données et sur le disque (des dizaines de gigaoctets). Pour récupérer cette place, vous devrez supprimer les cours (et attendre la fin de diverses étapes de nettoyage).

**N\'utilisez pas cet outil sur un système en production**. Ne l\'utilisez que sur un serveur de développement.
Pour éviter une utilisation accidentelle, cette fonctionnalité est désactivée, à moins que le niveau de débogage ne soit réglé sur DEVELOPER).';
$string['coursesize_0'] = 'XS (~10 Ko ; créé en ~1 seconde)';
$string['coursesize_1'] = 'S (~10 Mo ; créé en ~30 secondes)';
$string['coursesize_2'] = 'M (~100 Mo ; créé en ~5 minutes)';
$string['coursesize_3'] = 'L (~1 Go ; créé en ~1 heure)';
$string['coursesize_4'] = 'XL (~10 Go ; créé en ~4 heures)';
$string['coursesize_5'] = 'XXL (~20 Go ; créé en ~8 heures)';
$string['coursewithoutusers'] = 'Le cours sélectionné n\'a pas d\'utilisateur';
$string['createcourse'] = 'Créer un cours';
$string['createtestplan'] = 'Créer un plan de test';
$string['creating'] = 'Création d\'un cours';
$string['done'] = 'terminé ({$a}s)';
$string['downloadtestplan'] = 'Télécharger un plan de test';
$string['downloadusersfile'] = 'Télécharger un fichier d\'utilisateurs';
$string['error_nocourses'] = 'Il n\'y pas de cours pour générer le plan de test';
$string['error_noforumdiscussions'] = 'Le cours sélectionné ne contient pas de discussion de forum';
$string['error_noforuminstances'] = 'Le cours sélectionné ne contient pas de forum';
$string['error_noforumreplies'] = 'Le cours sélectionné ne contient pas de réponses à des discussions de forum';
$string['error_nonexistingcourse'] = 'Le cours indiqué n\'existe pas';
$string['error_nopageinstances'] = 'Le cours sélectionné ne contient pas de pages';
$string['error_notdebugging'] = 'Non disponible sur ce serveur, car le niveau de débogage n\'est pas défini sur DEVELOPER';
$string['error_nouserspassword'] = 'Vous devez définir $CFG->tool_generator_users_password dans le fichier config.php, afin de pouvoir générer le plan de test';
$string['firstname'] = 'Utilisateur de cours test';
$string['fullname'] = 'Cours de test : {$a->size}';
$string['maketestcourse'] = 'Créer des cours de test';
$string['maketestplan'] = 'Créer un plan de test JMeter';
$string['notenoughusers'] = 'Le cours sélectionné ne contient pas assez d\'utilisateurs';
$string['pluginname'] = 'Générateur de données pour développement';
$string['progress_checkaccounts'] = 'Vérification des comptes utilisateurs ({$a})';
$string['progress_coursecompleted'] = 'Cours achevés ({$a}s)';
$string['progress_createaccounts'] = 'Création de comptes utilisateurs ({$a->from} - {$a->to})';
$string['progress_createassignments'] = 'Création des devoirs ({$a})';
$string['progress_createbigfiles'] = 'Création de gros fichiers ({$a})';
$string['progress_createcourse'] = 'Création du cours {$a}';
$string['progress_createforum'] = 'Création de forum ({$a} messages)';
$string['progress_createpages'] = 'Création de pages ({$a})';
$string['progress_createsmallfiles'] = 'Création de petits fichiers ({$a})';
$string['progress_enrol'] = 'Inscription d\'utilisateurs dans un cours ({$a})';
$string['progress_sitecompleted'] = 'Site achevé ({$a}s)';
$string['shortsize_0'] = 'XS';
$string['shortsize_1'] = 'S';
$string['shortsize_2'] = 'M';
$string['shortsize_3'] = 'L';
$string['shortsize_4'] = 'XL';
$string['shortsize_5'] = 'XXL';
$string['sitesize_0'] = 'XS (~10 Mo ; 3 cours, création en ~30 s)';
$string['sitesize_1'] = 'S (~50 Mo ; 8 cours, création en ~2 min)';
$string['sitesize_2'] = 'M (~200 Mo ; 73 cours, création en ~10 min)';
$string['sitesize_3'] = 'L (~1.5 Go ; 277 cours, création en ~1.5 h)';
$string['sitesize_4'] = 'XL (~10 Go ; 1065 cours, création en ~5 h)';
$string['sitesize_5'] = 'XXL (~20 Go ; 4177 cours, création in ~10 h)';
$string['size'] = 'Taille du cours';
$string['smallfiles'] = 'Petits fichiers';
$string['targetcourse'] = 'Cours cible du test';
$string['testplanexplanation'] = 'Cet outil crée un plan de test JMeter, ainsi que le fichier d\'authentification utilisateur.

Le plan de test est conçu pour fonctionner avec {$a}, qui rend plus simple le déroulement du plan de test dans un environnement Moodle spécifique, récolte les informations des tests et compare les résultats. Vous devrez donc le télécharger et utiliser son script test_runner.sh ou suivre les instructions d\'installation et d\'utilisation.

Vous devez également définir un mot de passe pour les utilisateurs de cours dans le fichier config.php (p. ex. $CFG->tool_generator_users_password = \'moodle\';). Il n\'y a pas de valeur par défaut pour ce mot de passe, afin d\'éviter l\'utilisation involontaire de l\'outil. Vous devez aussi utiliser l\'option de mise à jour des mots de passe si vous utilisateurs de cours ont d\'autres mots de passe ou s\'ils ont été générés par tool_generator, mais sans définir une valeur pour $CFG->tool_generator_users_password.

Il est partie intégrante de tool_generator, et fonctionne donc bien avec les générateurs de cours et de site. Il peut également être utilisé avec tous les cours qui contiennent au moins :

* assez d\'utilisateurs inscrits (dépend de la taille du plan de test que vous sélectionnez) avec le mot de passe défini à \'moodle\',
* une instance de module page, et
* une instance de module forum avec au moins une discussion et une réponse.

Vous devez réfléchir à la capacité de vos serveurs si vous lancez un plan de test de grande taille, car la charge générée par JMeter peut être particulièrement importante. La période de phase de lancement a été ajustée selon le nombre d\'utilisateurs afin d\'éviter ce genre de problème, mais la charge est malgré tout énorme.

**Ne lancez jamais un plan de test sur un système en production**. Cette fonctionnalité ne fait que créer les fichiers nécessités par JMeter, et il n\'est donc pas dangereux en lui-même. Cependant vous ne devez **JAMAIS** lancer ce plan de test sur un site en production.';
$string['testplansize_0'] = 'XS ({$a->users} utilisateurs, {$a->loops} boucles et durée de la phase de lancement de {$a->rampup})';
$string['testplansize_1'] = 'S ({$a->users} utilisateurs, {$a->loops} boucles et durée de la phase de lancement de {$a->rampup})';
$string['testplansize_2'] = 'M ({$a->users} utilisateurs, {$a->loops} boucles et durée de la phase de lancement de {$a->rampup})';
$string['testplansize_3'] = 'L ({$a->users} utilisateurs, {$a->loops} boucles et durée de la phase de lancement de {$a->rampup})';
$string['testplansize_4'] = 'XL ({$a->users} utilisateurs, {$a->loops} boucles et durée de la phase de lancement de {$a->rampup})';
$string['testplansize_5'] = 'XXL ({$a->users} utilisateurs, {$a->loops} boucles et durée de la phase de lancement de {$a->rampup})';
$string['updateuserspassword'] = 'Modifier le mot de passe des utilisateurs';
$string['updateuserspassword_help'] = 'JMeter nécessite de se connecter en tant qu\'utilisateur de cours. Vous pouvez définir le mot de passe des utilisateurs avec la variable $CFG->tool_generator_users_password dans config.php. Ce réglage définit le mot de passe des utilisateurs de cours à la valeur de $CFG->tool_generator_users_password. Cela peut être utile si vous utilisez des cours qui n\'ont pas été générés par tool_generator ou si $CFG->tool_generator_users_password n\'a pas été défini lors de la création des cours de test.';
