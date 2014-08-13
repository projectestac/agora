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
 * Strings for component 'install', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   install
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['admindirerror'] = 'Le dossier d\'administration spécifié est incorrect';
$string['admindirname'] = 'Dossier administration';
$string['admindirsetting'] = 'De rares hébergeurs web utilisent le dossier « /admin » comme URL spéciale vous permettant d\'accéder par exemple à un tableau de bord. Ceci entre en conflit avec l\'emplacement standard des pages d\'administration de Moodle. Vous pouvez corriger cela en renommant le dossier d\'administration de votre installation de Moodle, en inscrivant ici le nouveau nom, par exemple <br /><br /><b>moodleadmin</b>.<br /><br />Les liens vers l\'administration de Moodle seront ainsi corrigés.';
$string['admindirsettinghead'] = 'Réglage du dossier « admin »...';
$string['admindirsettingsub'] = 'De rares hébergeurs web utilisent le dossier « /admin » comme URL spéciale vous permettant d\'accéder par exemple à un tableau de bord. Ceci entre en conflit avec l\'emplacement standard des pages d\'administration de Moodle. Vous pouvez corriger cela en renommant le dossier d\'administration de votre installation de Moodle, en inscrivant ici le nouveau nom, par exemple <br /><br /><b>moodleadmin</b>.<br /><br />Les liens vers l\'administration de Moodle seront ainsi corrigés.';
$string['availablelangs'] = 'Paquetages de langue disponibles';
$string['caution'] = 'Attention';
$string['chooselanguage'] = 'Choisissez une langue';
$string['chooselanguagehead'] = 'Choisissez une langue';
$string['chooselanguagesub'] = 'Veuillez choisir la langue d\'installation. Cette langue sera utilisée comme langue par défaut du site, que vous pourrez modifier ultérieurement.';
$string['cliadminpassword'] = 'Nouveau mot de passe administrateur';
$string['cliadminusername'] = 'Nom d\'utilisateur du compte admin';
$string['clialreadyconfigured'] = 'Le fichier config.php existe déjà. Veuillez utiliser admin/cli/install_database.php pour installer Moodle sur ce site.';
$string['clialreadyinstalled'] = 'Le fichier config.php existe déjà. Veuillez utiliser admin/cli/install_database.php si vous désirez mettre à jour ce site Moodle.';
$string['cliinstallfinished'] = 'Installation terminée avec succès.';
$string['cliinstallheader'] = 'Programme d\'installation de Moodle {$a} en ligne de commande';
$string['climustagreelicense'] = 'En mode non interactif, vous devez vous déclarer d\'accord avec la licence en spécifiant l\'option --agree-license';
$string['clitablesexist'] = 'Les tables de la base de données sont déjà présentes. L\'installation en ligne de commande ne peut pas continuer.';
$string['compatibilitysettings'] = 'Vérification de votre configuration PHP...';
$string['compatibilitysettingshead'] = 'Vérification de votre configuration PHP...';
$string['compatibilitysettingssub'] = 'Votre serveur doit passer tous ces tests pour que Moodle fonctionne correctement.';
$string['configfilenotwritten'] = 'Le programme d\'installation n\'a pas pu créer automatiquement le fichier de configuration « config.php » contenant vos réglages, vraisemblablement parce que le dossier principal de Moodle n\'est pas accessible en écriture. Vous pouvez copier le code ci-dessous dans un fichier appelé « config.php », que vous placerez à l\'intérieur du dossier principal de Moodle (là où se trouve un fichier « config-dist.php »).';
$string['configfilewritten'] = 'Le fichier « config.php » a été créé correctement';
$string['configurationcomplete'] = 'Configuration terminée';
$string['configurationcompletehead'] = 'Configuration terminée';
$string['configurationcompletesub'] = 'Moodle a tenté d\'enregistrer votre configuration dans un fichier à la racine de votre installation de Moodle.';
$string['database'] = 'Base de données';
$string['databasehead'] = 'Réglages de la base de données';
$string['databasehost'] = 'Serveur de base de données';
$string['databasename'] = 'Nom de la base de données';
$string['databasepass'] = 'Mot de passe de la base de données';
$string['databaseport'] = 'Port de la base de données';
$string['databasesocket'] = 'Socket Unix';
$string['databasetypehead'] = 'Sélectionner un pilote de base de données';
$string['databasetypesub'] = 'Moodle supporte plusieurs types de serveurs de base de données. Veuillez contacter l\'administrateur du serveur si vous ne savez pas quel type utiliser.';
$string['databaseuser'] = 'Utilisateur de la base de données';
$string['dataroot'] = 'Dossier de données';
$string['datarooterror'] = 'Le dossier de données indiqué n\'a pas pu être trouvé ou créé. Veuillez corriger le chemin d\'accès ou créer manuellement le dossier.';
$string['datarootpermission'] = 'Droits d\'accès au dossier de données';
$string['datarootpublicerror'] = 'Le dossier de données que vous avez indiqué est directement accessible depuis le web. Vous devez utiliser un autre dossier.';
$string['dbconnectionerror'] = 'Moodle n\'a pas pu se connecter à la base de données indiquée. Veuillez vérifier les paramètres de votre base de données';
$string['dbcreationerror'] = 'Erreur lors de la création de la base de données. Impossible de créer la base de données avec les paramètres fournis';
$string['dbhost'] = 'Serveur hôte';
$string['dbpass'] = 'Mot de passe';
$string['dbport'] = 'Port';
$string['dbprefix'] = 'Préfixe des tables';
$string['dbtype'] = 'Type';
$string['directorysettings'] = '<p>Veuillez confirmer les emplacements de cette installation de Moodle.</p>
<p><b>Adresse web :</b> veuillez indiquer l\'adresse web complète par laquelle on accédera à Moodle. Si votre site web est accessible par plusieurs URLs, choisissez celle qui est la plus naturelle ou la plus évidente. Ne placez pas de barre oblique à la fin de l\'adresse.</p>
<p><b>Dossier Moodle :</b> veuillez spécifier le chemin d\'accès complet de cette installation de Moodle. Assurez-vous que la casse des caractères (majuscules/minuscules) est correcte.</p>
<p><b>Dossier de données :</b> Moodle a besoin d\'un emplacement où enregistrer les fichiers déposés sur le site. Le serveur web (utilisateur dénommé habituellement « www », « apache » ou « nobody ») doit avoir accès à ce dossier en lecture et EN ÉCRITURE. Toutefois ce dossier ne doit pas être accessible directement depuis le web. L\'installeur va tenter de créer ce dossier s\'il n\'existe pas.</p>';
$string['directorysettingshead'] = 'Veuillez confirmer les emplacements de cette installation de Moodle.';
$string['directorysettingssub'] = '<p><b>Adresse web :</b> veuillez indiquer l\'adresse web complète par laquelle on accédera à Moodle. Si votre site web est accessible par plusieurs URLs, choisissez celle qui est la plus naturelle ou la plus évidente. Ne placez pas de barre oblique à la fin de l\'adresse.</p>
<p><b>Dossier Moodle :</b> veuillez spécifier le chemin d\'accès complet de cette installation de Moodle. Assurez-vous que la casse des caractères (majuscules/minuscules) est correcte.</p>
<p><b>Dossier de données :</b> Moodle a besoin d\'un emplacement où enregistrer les fichiers déposés sur le site. Le serveur web (utilisateur dénommé habituellement « www », « apache » ou « nobody ») doit avoir accès à ce dossier en lecture et EN ÉCRITURE. Toutefois ce dossier ne doit pas être accessible directement depuis le web. L\'installeur va tenter de créer ce dossier s\'il n\'existe pas.</p>';
$string['dirroot'] = 'Dossier Moodle';
$string['dirrooterror'] = 'Le dossier Moodle semble incorrect : aucune installation de Moodle ne se trouve dans ce dossier. Le dossier indiqué ci-dessous est vraisemblablement correct.';
$string['download'] = 'Télécharger';
$string['downloadlanguagebutton'] = 'Télécharger le paquetage de langue « {$a} »';
$string['downloadlanguagehead'] = 'Téléchargement du paquetage de la langue d\'installation';
$string['downloadlanguagenotneeded'] = 'Vous pouvez continuer la procédure d\'installation avec la langue par défaut « {$a} ».';
$string['downloadlanguagesub'] = 'Vous avez maintenant la possibilité de télécharger le paquetage de la langue que vous avez sélectionnée afin de poursuivre l\'installation dans cette langue.<br /><br />Si le téléchargement ne peut avoir lieu, la procédure d\'installation continuera en anglais. Une fois l\'installation terminée, vous pourrez alors télécharger et installer d\'autres langues.';
$string['doyouagree'] = 'Étes-vous d\'accord ? (yes/no) :';
$string['environmenthead'] = 'Vérification de l\'environnement...';
$string['environmentsub'] = 'Les divers composants de votre système doivent satisfaire les exigences nécessaires à Moodle. Une vérification de votre environnement est en cours.';
$string['environmentsub2'] = 'Chaque version de Moodle nécessite une version minimale de certains composants PHP et des extensions de PHP obligatoires. Une vérification complète de l\'environnement est effectuée avec chaque installation et chaque mise à jour. Veuillez contacter l\'administrateur du serveur si vous ne savez pas comment installer une nouvelle version ou activer des extensions de PHP.';
$string['errorsinenvironment'] = 'Échec de la vérification de l\'environnement !';
$string['fail'] = 'Échec';
$string['fileuploads'] = 'Téléchargement des fichiers';
$string['fileuploadserror'] = 'Le téléchargement des fichiers sur le serveur doit être activé';
$string['fileuploadshelp'] = '<p>Le téléchargement des fichiers semble désactivé sur votre serveur.</p><p>Moodle peut être installé malgré tout, mais personne ne pourra déposer aucun fichier de cours, ni aucun avatar dans les profils utilisateurs.</p><p>Pour activer le téléchargement des fichiers sur votre serveur, vous (ou l\'administrateur du serveur) devez modifier le fichier « php.ini » du système en donnant au paramètre <b>file_uploads</b> la valeur 1.</p>';
$string['inputdatadirectory'] = 'Dossier de données :';
$string['inputwebadress'] = 'Adresse web :';
$string['inputwebdirectory'] = 'Dossier Moodle :';
$string['installation'] = 'Installation';
$string['langdownloaderror'] = 'La langue {$a} n\'a pas pu être téléchargée. La suite de l\'installation se déroulera en anglais. Vous pourrez télécharger et installer d\'autres langues à la fin de l\'installation';
$string['langdownloadok'] = 'La langue {$a} a été installée correctement. La suite de l\'installation se déroulera dans cette langue';
$string['magicquotesruntime'] = 'Magic Quotes Run Time';
$string['magicquotesruntimeerror'] = 'Ce réglage doit être désactivé';
$string['magicquotesruntimehelp'] = '<p>Le réglage « Magic quotes runtime » doit être désactivé pour que Moodle fonctionne correctement.</p><p>Il est normalement désactivé par défaut. Voyez le paramètre <b>magic_quotes_runtime</b> du fichier « php.ini » de votre serveur.</p><p>Si vous n\'avez pas accès à votre fichier « php.ini », vous pouvez créer dans le dossier principal de Moodle un fichier « .htaccess » contenant cette ligne :</p><blockquote><div>php_value magic_quotes_runtime Off</div></blockquote>';
$string['memorylimit'] = 'Limite de mémoire';
$string['memorylimiterror'] = 'La limite de mémoire de PHP est très basse. Vous risquez de rencontrer des problèmes ultérieurement.';
$string['memorylimithelp'] = '<p>La limite de mémoire de PHP sur votre serveur est actuellement de {$a}.</p>
<p>Cette valeur trop basse risque de générer des problèmes de manque de mémoire pour Moodle, notamment si vous utilisez beaucoup de modules et/ou si vous avez un grand nombre d\'utilisateurs.</p>
<p>Il est recommandé de configurer PHP avec une limite de mémoire aussi élevée que possible, par exemple 40 Mo. Vous pouvez obtenir cela de différentes façons :</p>
<ol>
<li>si vous en avez la possibilité, recompilez PHP avec l\'option <em>--enable-memory-limit</em>. Cela permettra à Moodle de fixer lui-même sa limite de mémoire ;</li>
<li>si vous avez accès à votre fichier « php.ini », vous pouvez attribuer au paramètre <b>memory_limit</b> une valeur comme 40M. Si vous n\'y avez pas accès, demandez à l\'administrateur de le faire pour vous ;</li>
<li>sur certains serveurs, vous pouvez créer dans le dossier principal de Moodle un fichier « .htaccess » contenant cette ligne :
<blockquote><div>php_value memory_limit 40M</div></blockquote>
<p>Cependant, sur certains serveurs, cela empêchera le fonctionnement correct de <b>tous</b> les fichiers PHP (vous verrez s\'afficher des erreurs lors de la consultation de pages). Dans ce cas, vous devrez supprimer le fichier « .htaccess ».</p></li>
</ol>';
$string['mssqlextensionisnotpresentinphp'] = 'La configuration de l\'extension MSSQL de PHP n\'a pas été effectuée correctement. De ce fait, PHP ne peut communiquer avec SQL*Server. Veuillez vérifier votre fichier « php.ini » ou recompiler PHP.';
$string['mysqliextensionisnotpresentinphp'] = 'La configuration de l\'extension MySQLi de PHP n\'a pas été effectuée correctement. De ce fait, PHP ne peut communiquer avec MySQL. Veuillez contrôler votre fichier « php.ini » ou recompiler PHP. L\'extension MySQLi n\'est pas disponible pour PHP 4.';
$string['nativemariadb'] = 'MariaDB (native/mariadb)';
$string['nativemariadbhelp'] = '<p>La base de données permet l\'enregistrement de la plupart des réglages et des données de Moodle. Elle doit être configurée ici.</p>
<p>Le nom de la base de données, son nom d\'utilisateur et son mot de passe sont des champs obligatoires ; le préfixe des tables est optionnel.</p>
<p>Si la base de données n\'existe pas encore et que l\'utilisateur indiqué a les droits d\'accès requis, Moodle tentera de créer une nouvelle base de données avec les permissions et réglages adéquats.</p>
<p>Ce pilote de base de données n\'est pas compatible avec le moteur MyISAM.</p>';
$string['nativemssql'] = 'SQL*Server FreeTDS (native/mssql)';
$string['nativemssqlhelp'] = 'Vous devez maintenant configurer la base de données où seront stockées les données de Moodle. Cette base de données doit être déjà créée, tout comme le nom d\'utilisateur et le mot de passe pour y accéder. Le préfixe des tables est obligatoire.';
$string['nativemysqli'] = 'MySQL amélioré (natif, mysqli)';
$string['nativemysqlihelp'] = '<p>La base de données permet l\'enregistrement de la plupart des réglages et des données de Moodle. Elle doit être configurée ici.</p>
<p>Le nom de la base de données, son nom d\'utilisateur et son mot de passe sont des champs obligatoires ; le préfixe des tables est optionnel.</p>
<p>Si la base de données n\'existe pas encore et que l\'utilisateur indiqué a les droits d\'accès requis, Moodle tentera de créer une nouvelle base de données avec les permissions et réglages adéquats.</p>';
$string['nativeoci'] = 'Oracle (natif, oci)';
$string['nativeocihelp'] = 'Vous devez maintenant configurer la base de données où seront stockées les données de Moodle. Cette base de données doit être déjà créée, tout comme le nom d\'utilisateur et le mot de passe pour y accéder. Le préfixe des tables est obligatoire.';
$string['nativepgsql'] = 'PostgreSQL (natif, pgsql)';
$string['nativepgsqlhelp'] = '<p>La base de données permet l\'enregistrement de la plupart des réglages et des données de Moodle. Elle doit être configurée ici.</p>
<p>Le nom de la base de données, son nom d\'utilisateur,  son mot de passe et le préfixe des tables sont des champs obligatoires.</p>
<p>Si la base de données n\'existe pas encore et que l\'utilisateur indiqué a les droits d\'accès requis, Moodle tentera de créer une nouvelle base de données avec les permissions et réglages adéquats.</p>';
$string['nativesqlsrv'] = 'SQL*Server Microsoft (native/sqlsrv)';
$string['nativesqlsrvhelp'] = 'Vous devez maintenant configurer la base de données où seront stockées les données de Moodle. Cette base de données doit être déjà créée, tout comme le nom d\'utilisateur et le mot de passe pour y accéder. Le préfixe des tables est obligatoire.';
$string['nativesqlsrvnodriver'] = 'Les pilotes Microsoft Drivers for SQL Server pour PHP ne sont pas installés ou ne sont pas configurés correctement.';
$string['nativesqlsrvnonwindows'] = 'Les pilotes Microsoft Drivers for SQL Server pour PHP ne sont disponibles que pour le système d’exploitation Windows.';
$string['ociextensionisnotpresentinphp'] = 'La configuration de l\'extension OCI8 de PHP n\'a pas été effectuée correctement. De ce fait, PHP ne peut communiquer avec Oracle. Veuillez contrôler votre fichier « php.ini » ou recompiler PHP.';
$string['pass'] = 'Réussi';
$string['paths'] = 'Chemins';
$string['pathserrcreatedataroot'] = 'Le dossier de données ({$a->dataroot}) ne peut pas être créé par l\'installeur.';
$string['pathshead'] = 'Confirmer les chemins d\'accès';
$string['pathsrodataroot'] = 'Le dossier de données n\'est pas accessible en écriture.';
$string['pathsroparentdataroot'] = 'Le dossier parent ({$a->parent}) n\'est pas accessible en écriture. Le dossier de données ({$a->dataroot}) ne peut pas être créé par l\'installeur.';
$string['pathssubadmindir'] = 'Quelques rares hébergeurs utilisent « /admin » comme URL spéciale pour l\'accès à un tableau de bord ou d\'autres fonctionnalités. Malheureusement ceci entre en conflit avec l\'emplacement standard des pages d\'administration de Moodle. Vous pouvez corriger ceci en renommant le dossier admin de votre installation Moodle et en plaçant le nouveau nom choisi dans ce champ. Par exemple, <em>moodleadmin</em>. Ceci modifiera tous les liens de l\'administration de Moodle.';
$string['pathssubdataroot'] = '<p>Un dossier dans lequel Moodle stockera tous les fichiers qui seront déposés par les utilisateurs.</p>
<p>Ce dossier doit être accessible en lecture et en écriture par le serveur web (dénomé « nobody » ou « apache » ou encore « www-data »).</p>
<p>Il ne doit pas être accessible directement via le web.</p>
<p>Si ce dossier n\'existe pas encore, Moodle tentera de le créer au cours du processus d\'installation.</p>';
$string['pathssubdirroot'] = '<p>Le chemin d\'accès complet au dossier contenant le code source de Moodle.</p>';
$string['pathssubwwwroot'] = '<p>L\'adresse web complète par laquelle on accédera à Moodle, i.e. l\'adresse que les utilisateurs saisiront dans la barre d\'adresse de leur navigateur pour accéder à Moodle.</p>
<p>Il n\'est pas possible d\'accéder à Moodle depuis plusieurs adresses web différentes. Si votre site web est accessible depuis plusieurs adresses, saisissez ici la plus simple d\'entre elles et définissez des redirections permanentes pour toutes les autres adresses.</p>
<p>Si votre site est accessible depuis internet et un réseau interne (un intranet), indiquez ici l\'adresse publique.</p>
<p>Si l\'adresse indiquée actuellement n\'est pas correcte,  veuillez modifier l\'URL dans la barre d\'adresse de votre navigateur et recommencer l\'installation.</p>';
$string['pathsunsecuredataroot'] = 'L\'emplacement du dossier de données n\'est pas sûr';
$string['pathswrongadmindir'] = 'Le dossier d\'administration n\'existe pas';
$string['pgsqlextensionisnotpresentinphp'] = 'La configuration de l\'extension PGSQL de PHP n\'a pas été effectuée correctement. De ce fait, PHP ne peut communiquer avec PostgreSQL. Veuillez contrôler votre fichier « php.ini » ou recompiler PHP.';
$string['phpextension'] = 'Extension PHP {$a}';
$string['phpversion'] = 'Version de PHP';
$string['phpversionhelp'] = '<p>Moodle nécessite au minimum la version 4.3.0 ou 5.1.0 (5.0.x a bon nombre de problèmes).</p><p>Vous utilisez actuellement la version {$a}.</p><p>Pour que Moodle fonctionne, vous devez mettre à jour PHP ou aller chez un hébergeur ayant une version récente de PHP.<br />(Si vous avez une version 5.0.x, vous pouvez aussi re-passer à la version 4.4.x)</p>';
$string['releasenoteslink'] = 'Pour des informations sur cette version de Moodle, veuillez lire les notes de version à {$a}';
$string['safemode'] = 'Safe Mode';
$string['safemodeerror'] = 'Moodle risque de rencontrer des problèmes lorsque le mode « safe mode » est activé';
$string['safemodehelp'] = '<p>Moodle risque de rencontrer un certain nombre de problèmes lorsque le « safe mode » est activé. Il est possible notamment qu\'il soit incapable de créer de nouveaux fichiers.</p><p>Ce mode n\'est habituellement activé que chez certains hébergeurs paranoïaques. Il vous faudra donc trouver un autre hébergeur pour votre site Moodle.</p><p>Vous pouvez continuer l\'installation de Moodle, mais attendez-vous à des problèmes.</p>';
$string['sessionautostart'] = 'Démarrage automatique des sessions';
$string['sessionautostarterror'] = 'Ce paramètre doit être désactivé';
$string['sessionautostarthelp'] = '<p>Moodle a besoin du support des sessions. il ne fonctionnera pas sans cela.</p><p>Les sessions peuvent être activées dans le fichier « php.ini » de votre serveur, en changeant la valeur du paramètre <b>session.auto_start</b>.</p>';
$string['sqliteextensionisnotpresentinphp'] = 'L\'extension SQLite de PHP n\'a pas été configurée correctement. Veuillez contrôler votre fichier php.ini ou recompiler PHP.';
$string['upgradingqtypeplugin'] = 'Mise à jour du plugin Type de question';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'Vous voyez cette page, car vous avez installé Moodle correctement et lancé le logiciel <b>{$a->packname} {$a->packversion}</b> sur votre ordinateur. Félicitations !';
$string['welcomep30'] = 'Cette version de <b>{$a->installername}</b> comprend des logiciels qui créent un environnement dans lequel <b>Moodle</b> va fonctionner, à savoir :';
$string['welcomep40'] = 'Ce paquet contient également <b>Moodle {$a->moodlerelease} ({$a->moodleversion})</b>.';
$string['welcomep50'] = 'L\'utilisation de tous les logiciels de ce paquet est soumis à l\'acceptation de leurs licences respectives. Le paquet <b>{$a->installername}</b> est un <a href="http://www.opensource.org/docs/definition_plain.html">logiciel libre</a>. Il est distribué sous licence <a href="http://www.gnu.org/copyleft/gpl.html">GPL</a>.';
$string['welcomep60'] = 'Les pages suivantes vous aideront pas à pas à configurer et mettre en place <b>Moodle</b> sur votre ordinateur. Il vous sera possible d\'accepter les réglages par défaut ou, facultativement, de les adapter à vos propres besoins.';
$string['welcomep70'] = 'Cliquer sur le bouton « Suivant » ci-dessous pour continuer l\'installation de <b>Moodle</b>.';
$string['wwwroot'] = 'Adresse web';
$string['wwwrooterror'] = 'L\'adresse web indiquée semble incorrecte : aucune installation de Moodle ne se trouve à cette adresse.';
