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
 * Strings for component 'tool_unittest', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   tool_unittest
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addconfigprefix'] = 'Ajouter le préfixe au fichier de configuration';
$string['all'] = 'TOUT';
$string['codecoverageanalysis'] = 'Effectuer une analyse de couverture de code.';
$string['codecoveragecompletereport'] = '(afficher le rapport complet de couverture de code)';
$string['codecoveragedisabled'] = 'Impossible d\'activer la couverture de code sur ce serveur (l\'extension xdebug est manquante).';
$string['codecoveragelatestdetails'] = '(le {$a->date}, pour {$a->files} files, {$a->percentage} couvert)';
$string['codecoveragelatestreport'] = 'Afficher le dernier rapport complet de couverture de code';
$string['confignonwritable'] = 'Le fichier <i>config.php</i> n\'est pas accessible en écriture par le serveur web. Veuillez modifier ses permissions ou le modifier à partir d\'un compte adéquat, en ajoutant la ligne suivante avant la balise php terminale : <br />$CFG->unittestprefix = \'tst_\' // Change tst_ to a prefix of your choice, different from $CFG->prefix';
$string['coveredlines'] = 'Lignes couvertes';
$string['coveredpercentage'] = 'Couverture totale de code';
$string['dbtest'] = 'Test fonctionnels de la base de données';
$string['deletingnoninsertedrecord'] = 'Tentative de suppression d\'un enregistrement n\'ayant pas été inséré par ces tests unitaires (id {$a->id} dans la table {$a->table}).';
$string['deletingnoninsertedrecords'] = 'Tentative de suppression d\'enregistrements n\'ayant pas été insérés par ces tests unitaires (de la table {$a->table}).';
$string['droptesttables'] = 'Supprimer les tables de tests';
$string['exception'] = 'Exception';
$string['executablelines'] = 'Lignes exécutables';
$string['fail'] = 'Échec';
$string['ignorefile'] = 'Ignorer les tests de ce fichier';
$string['ignorethisfile'] = 'Relancer les tests unitaires en ignorant ce fichier de test.';
$string['installtesttables'] = 'Installer les tables de tests';
$string['moodleunittests'] = 'Tests unitaires Moodle : {$a}';
$string['notice'] = 'Remarque';
$string['onlytest'] = 'Ne lancer que les tests unitaires de';
$string['othertestpages'] = 'Autres pages de test';
$string['pass'] = 'Succès';
$string['pathdoesnotexist'] = 'Le chemin « {$a} » n\'existe pas.';
$string['pluginname'] = 'Tests unitaires';
$string['prefix'] = 'Préfixe des tables de tests unitaires';
$string['prefixnotset'] = 'Le préfixe des tables de tests unitaires n\'est pas renseigné. Veuillez remplir et envoyer ce formulaire pour l\'ajouter à votre fichier config.php.';
$string['reinstalltesttables'] = 'Réinstaller les tables de tests';
$string['retest'] = 'Relancer les tests';
$string['retestonlythisfile'] = 'Relancer uniquement ce fichier de test.';
$string['runall'] = 'Lancer les tests de tous les fichiers de test.';
$string['runat'] = 'Lancer à {$a}.';
$string['runonlyfile'] = 'Ne lancer que les tests de ce fichier';
$string['runonlyfolder'] = 'Ne lancer que les tests de ce dossier';
$string['runtests'] = 'Lancer les tests';
$string['rununittests'] = 'Lancer les tests unitaires';
$string['showpasses'] = 'Afficher les tests réussis en plus des échecs.';
$string['showsearch'] = 'Afficher la recherche des fichiers de test.';
$string['skip'] = 'Sauter';
$string['stacktrace'] = 'Trace de la pile :';
$string['summary'] = '{$a->run}/{$a->total} tests terminés : <strong>{$a->passes}</strong> tests passés, <strong>{$a->fails}</strong> échecs et <strong>{$a->exceptions}</strong> exceptions.';
$string['tablesnotsetup'] = 'Les tables de tests unitaires ne sont pas présentes. Voulez-vous les créer maintenant ?.';
$string['testdboperations'] = 'Test des opérations sur la base de données';
$string['testtablescsvfileunwritable'] = 'Le fichier CSV des tables de test n\'est pas accessible en écriture ({$a->filename})';
$string['testtablesneedupgrade'] = 'Les tables de tests de la base de données doivent être mises à jour. Voulez-vous effectuer maintenant la mise à jour ?';
$string['testtablesok'] = 'Les tables de tests ont été installées correctement dans la base de données.';
$string['thorough'] = 'Lancer un test exhaustif (peut être lent).';
$string['timetakes'] = 'Durée des tests : {$a}.';
$string['totallines'] = 'Total des lignes';
$string['uncaughtexception'] = 'Exception non traitée [{$a->getMessage()}] dans [{$a->getFile()}:{$a->getLine()}] : TESTS INTERROMPUS.';
$string['uncoveredlines'] = 'Lignes non couvertes';
$string['unittest:execute'] = 'Lancer les tests unitaires';
$string['unittestprefixsetting'] = 'Préfixe des tests unitaires : <strong>{$a->unittestprefix}</strong> (veuillez modifier le fichier <i>config.php</i> pour changer ce préfixe).';
$string['unittests'] = 'Tests unitaires';
$string['updatingnoninsertedrecord'] = 'Tentative de modification d\'un enregistrement n\'ayant pas été inséré par ces tests unitaires (id {$a->id} dans la table {$a->table}).';
$string['version'] = 'Utilise <a href="http://sourceforge.net/projects/simpletest/">SimpleTest</a> version {$a}.';
