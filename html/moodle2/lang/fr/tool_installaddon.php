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
 * Strings for component 'tool_installaddon', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_installaddon
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acknowledgement'] = 'Quittance';
$string['acknowledgementmust'] = 'Vous devez quittancer ceci';
$string['acknowledgementtext'] = 'Je suis conscient qu\'il est de ma responsabilité d\'effectuer une sauvegarde complète de ce site avant d\'installer des plugins tiers. J\'accepte et je suis conscient que des plugins tiers (en particulier ceux provenant de sources non officielles, mais pas uniquement) peuvent comporter des lacunes de sécurité, rendre ce site indisponible et causer des pertes ou fuites de données privées.';
$string['featuredisabled'] = 'L\'installeur de plugins tiers est désactivé sur ce site.';
$string['installaddon'] = 'Installer le plugin tiers !';
$string['installaddons'] = 'Installer des plugins tiers';
$string['installexception'] = 'Oups... Une erreur est survenue lors de l\'installation du plugin. Veuillez activer le mode de débogage pour en savoir plus sur cette erreur.';
$string['installfromrepo'] = 'Installer des plugins tiers du répertoire des plugins Moodle';
$string['installfromrepo_help'] = 'Vous allez être dirigé vers le répertoire de plugins Moodle pour la recherche et l\'installation d\'un plugin tiers. Veuillez prendre note que le nom complet de votre site, son URL et le numéro de version seront également transmis afin de vous simplifier le processus d\'installation.';
$string['installfromzip'] = 'Installer le plugin à partir d\'un fichier ZIP';
$string['installfromzipfile'] = 'Paquetage ZIP';
$string['installfromzipfile_help'] = 'Le paquetage ZIP doit contenir un seul dossier principal du même nom que le plugin. Le fichier ZIP sera décompressé à l\'emplacement adéquat en fonction du type de plugin. Les paquetages téléchargés à partir du répertoire de plugins Moodle sont dans ce format.';
$string['installfromzip_help'] = 'Au lieu d\'installer des plugins tiers à partir du répertoire de plugins Moodle, vous pouvez installer des plugins tiers à partir de paquetages ZIP déposés manuellement. De tels paquetages doivent avoir la même structure que ceux disponibles dans le répertoire des plugins Moodle.';
$string['installfromziprootdir'] = 'Renommer le dossier principal';
$string['installfromziprootdir_help'] = 'Certains paquetages ZIP, par exemple ceux qui sont générés par Github, peuvent comporter un nom de dossier principal incorrect. Vous pouvez renommer ce dossier en indiquant dans ce champ le nom correct.';
$string['installfromzipsubmit'] = 'Installer le plugin à partir d\'un fichier ZIP';
$string['installfromziptype'] = 'Type de plugin';
$string['installfromziptype_help'] = 'Veuillez choisir le type de plugin correspondant au plugin que vous voulez installer. La procédure d\'installation peut lamentablement échouer si un type incorrect est indiqué.';
$string['permcheck'] = 'Assurez-vous que l\'emplacement sur le serveur pour ce type de plugin est accessible en écriture par le serveur web.';
$string['permcheckerror'] = 'Erreur lors de la vérification de l\'autorisation d\'écriture';
$string['permcheckprogress'] = 'Vérification de l\'autorisation d\'écriture...';
$string['permcheckresultno'] = 'L\'emplacement pour le type de plugin <em>{$a->path}</em> n\'est pas accessible en écriture';
$string['permcheckresultyes'] = 'L\'emplacement pour le type de plugin <em>{$a->path}</em> est accessible en écriture';
$string['pluginname'] = 'Installeur de plugin tiers';
$string['remoterequestalreadyinstalled'] = 'Une demande d\'installation sur ce site du plugin tiers {$a->name} ({$a->component}), version {$a->version} du répertoire de plugins Moodle a été détectée. Ce plugin est <strong>déjà installé</strong> sur ce site.';
$string['remoterequestconfirm'] = 'Une demande d\'installation sur ce site du plugin tiers {$a->name} ({$a->component}), version {$a->version} du répertoire de plugins Moodle a été détectée. Si vous continuez, le paquetage ZIP de ce plugin sera téléchargé pour validation. Rien ne sera encore installé durant cette étape.';
$string['remoterequestinvalid'] = 'Une demande d\'installation d\'un plugin tiers du répertoire de plugins Moodle a été détectée. La requête n\'est cependant pas valide et le plugin ne peut donc pas être installé.';
$string['remoterequestpermcheck'] = 'Une demande d\'installation sur ce site du plugin {$a->name} ({$a->component}), version {$a->version} du répertoire de plugins Moodle a été détectée. L\'emplacement pour ce type de plugin <strong>{$a->typepath}</strong> sur le serveur n\'est toutefois <strong>pas accessible en écriture</strong>. Vous devez donner au serveur web l\'autorisation d\'accès en écriture à cet emplacement maintenant, puis cliquer sur le bouton continuer pour relancer la vérification.';
$string['remoterequestpluginfoexception'] = 'Oups... Une erreur est survenue lors de la tentative d\'obtention d\'informations sur le plugin tiers {$a->name} ({$a->component}), version {$a->version}. Le plugin ne peut pas être installé. Veuillez activer le mode de débogage pour en savoir plus sur cette erreur.';
$string['validation'] = 'Validation du paquetage du plugin tiers';
$string['validationmsg_componentmatch'] = 'Nom complet du composant';
$string['validationmsg_componentmismatchname'] = 'Incohérence du nom du plugin';
$string['validationmsg_componentmismatchname_help'] = 'Certains paquetages ZIP, par exemple ceux qui sont généré par Github, peuvent comporter un nom de dossier principal incorrect. Vous devez renommer ce dossier afin qu\'il corresponde au nom déclaré par le plugin tiers.';
$string['validationmsg_componentmismatchname_info'] = 'Ce plugin déclare que son nom est « {$a} », mais ce nom de correspond pas au nom du dossier principal.';
$string['validationmsg_componentmismatchtype'] = 'Incohérence du type du plugin';
$string['validationmsg_componentmismatchtype_info'] = 'Vous avez indiqué le type « {$a->expected} », alors que le plugin déclare que son type est « {$a->found} ».';
$string['validationmsg_filenotexists'] = 'Fichier extrait introuvable';
$string['validationmsg_filesnumber'] = 'Il n\'y a pas assez de fichiers dans le paquetage';
$string['validationmsg_filestatus'] = 'Impossible d\'extraire tous les fichiers';
$string['validationmsg_filestatus_info'] = 'La tentative d\'extraction du fichier {$a->file} a provoqué une erreur « {$a->status} ».';
$string['validationmsglevel_debug'] = 'Débogage';
$string['validationmsglevel_error'] = 'Erreur';
$string['validationmsglevel_info'] = 'OK';
$string['validationmsglevel_warning'] = 'Avertissement';
$string['validationmsg_maturity'] = 'Niveau de maturité déclaré';
$string['validationmsg_maturity_help'] = 'Ce plugin tiers peut déclarer son niveau de maturité. Si le mainteneur considère que son plugin est stable, le niveau de maturité déclaré sera MATURITY_STABLE. Les autres niveaux de maturité (par exemple alpha ou bêta) doivent être considérés comme instables et un avertissement est donné.';
$string['validationmsg_missingexpectedlangenfile'] = 'Incohérence du nom du fichier de langue anglaise';
$string['validationmsg_missingexpectedlangenfile_info'] = 'Le type de plugin tiers indiqué ne fournit pas le fichier de langue anglaise attendu {$a}.';
$string['validationmsg_missinglangenfile'] = 'Aucun fichier de langue anglaise trouvé';
$string['validationmsg_missinglangenfolder'] = 'Le dossier de langue anglaise est manquant';
$string['validationmsg_missingversion'] = 'Le plugin tiers ne déclare pas sa version';
$string['validationmsg_missingversionphp'] = 'Le fichier version.php est introuvable';
$string['validationmsg_multiplelangenfiles'] = 'Plusieurs fichiers de langue anglaises trouvés';
$string['validationmsg_onedir'] = 'Structure non valide du paquetage ZIP';
$string['validationmsg_onedir_help'] = 'Ce paquetage ZIP doit contenir un seul dossier principal, contenant le code source du plugin. Le nom de ce dossier principal doit correspondre au nom du plugin.';
$string['validationmsg_pathwritable'] = 'Vérification de l\'autorisation d\'écriture';
$string['validationmsg_pluginversion'] = 'Version du plugin';
$string['validationmsg_release'] = 'Détails de la version du plugin';
$string['validationmsg_requiresmoodle'] = 'Version de Moodle requise';
$string['validationmsg_rootdir'] = 'Nom du plugin à installer';
$string['validationmsg_rootdir_help'] = 'Le nom du dossier principal dans le paquetage ZIP est aussi le nom du plugin tiers à installer. Si ce nom n\'est pas correct, vous pouvez le modifier dans le fichier ZIP avant d\'installer le plugin.';
$string['validationmsg_rootdirinvalid'] = 'Nom du plugin tiers non valide';
$string['validationmsg_rootdirinvalid_help'] = 'Le nom du dossier principal dans le paquetage ZIP n\'est pas conforme à la syntaxe requise. Certains paquetages ZIP, par exemple ceux générés par Github, peuvent contenir un nom de dossier principal incorrect. Vous devez corriger ce nom afin qu\'il corresponde au nom du plugin tiers.';
$string['validationmsg_targetexists'] = 'L\'emplacement cible est déjà existant';
$string['validationmsg_targetexists_help'] = 'Le dossier dans lequel sera installé le plugin ne doit pas être déjà présent.';
$string['validationmsg_unknowntype'] = 'Type de plugin inconnu';
$string['validationresult0'] = 'Échec de validation !';
$string['validationresult0_help'] = 'Un problème sérieux a été détecté et il n\'est donc pas sûr d\'installer ce plugin tiers. Veuillez consulter l\'historique de validation pour plus de détails';
$string['validationresult1'] = 'Validation passée !';
$string['validationresult1_help'] = 'Le paquetage du plugin tiers a été validé et aucun problème sérieux n\'a été détecté.';
$string['validationresultinfo'] = 'Info';
$string['validationresultmsg'] = 'Message';
$string['validationresultstatus'] = 'Statut';
