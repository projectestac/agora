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
 * Strings for component 'blog', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   blog
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addnewentry'] = 'Ajouter un article';
$string['addnewexternalblog'] = 'Inscrire un blog externe';
$string['assocdescription'] = 'Si vous écrivez au sujet d\'un cours et/ou d\'une activité, sélectionnez-les ici.';
$string['associated'] = '{$a} associé';
$string['associatewithcourse'] = 'Blog sur le cours {$a->coursename}';
$string['associatewithmodule'] = 'Blog sur {$a->modtype} : {$a->modname}';
$string['association'] = 'Association';
$string['associations'] = 'Associations';
$string['associationunviewable'] = 'Cet article ne peut pas être consulté par d\'autres personnes avant qu\'un cours n\'y soit associé ou que le champ « Publier pour » ne soit modifié';
$string['autotags'] = 'Ajouter ces tags';
$string['autotags_help'] = 'Saisir un ou plusieurs tags locaux (séparés par des virgules) que vous désirez ajouter automatiquement à chacun des articles de blog copié d\'un blog externe vers votre blog local.';
$string['backupblogshelp'] = 'Ce réglage active la sauvegarde des blogs dans les sauvegardes automatiques du site';
$string['blockexternalstitle'] = 'Blogs externes';
$string['blocktitle'] = 'Titre du bloc des tags';
$string['blog'] = 'Blog';
$string['blogaboutthis'] = 'Blog sur {$a->type}';
$string['blogaboutthiscourse'] = 'Ajouter un article sur ce cours';
$string['blogaboutthismodule'] = 'Ajouter un article sur {$a}';
$string['blogadministration'] = 'Administration blog';
$string['blogdeleteconfirm'] = 'Supprimer cet article ?';
$string['blogdisable'] = 'Les blogs sont désactivés !';
$string['blogentries'] = 'Articles de blog';
$string['blogentriesabout'] = 'Articles de blog sur {$a}';
$string['blogentriesbygroupaboutcourse'] = 'Articles de blog sur {$a->course} de {$a->group}';
$string['blogentriesbygroupaboutmodule'] = 'Articles de blog sur {$a->mod} de {$a->group}';
$string['blogentriesbyuseraboutcourse'] = 'Articles de blog sur {$a->course} de {$a->user}';
$string['blogentriesbyuseraboutmodule'] = 'Articles de blog sur {$a->mod} de {$a->user}';
$string['blogentrybyuser'] = 'Articles de blog de {$a}';
$string['blogpreferences'] = 'Préférences de blog';
$string['blogs'] = 'Blogs';
$string['blogscourse'] = 'Blogs de cours';
$string['blogssite'] = 'Blogs du site';
$string['blogtags'] = 'Tags de blogs';
$string['cannotviewcourseblog'] = 'Vous n\'avez pas les droits d\'accès requis pour voir les blogs de ce cours';
$string['cannotviewcourseorgroupblog'] = 'Vous n\'avez pas les droits d\'accès requis pour voir les blogs de ce groupe ou de ce cours';
$string['cannotviewsiteblog'] = 'Vous n\'avez pas les droits d\'accès requis pour voir tous les blogs du site';
$string['cannotviewuserblog'] = 'Vous n\'avez pas les permissions requis pour voir les blogs des utilisateurs';
$string['configexternalblogcrontime'] = 'Fréquence à laquelle Moodle vérifie s\'il y a de nouveaux articles sur les blogs externes.';
$string['configmaxexternalblogsperuser'] = 'Le nombre maximal de blogs externes que chaque utilisateur peut lier à son blog Moodle.';
$string['configuseblogassociations'] = 'Active l\'association d\'articles de blog à des cours et des modules de cours.';
$string['configuseexternalblogs'] = 'Permet aux utilisateurs d\'indiquer des flux de blogs externes. Moodle vérifie régulièrement si de nouveaux articles sont publiés sur ces blogs et copie ces articles dans le blog de l\'utilisateur.';
$string['courseblog'] = 'Blog de cours : {$a}';
$string['courseblogdisable'] = 'Les blogs de cours ne sont pas activés';
$string['courseblogs'] = 'Les utilisateurs ne peuvent voir que les articles des blogs d\'utilisateurs inscrits aux mêmes cours qu\'eux';
$string['deleteblogassociations'] = 'Supprimer les associations de blog';
$string['deleteblogassociations_help'] = 'En cochant cette case, vous retirez les associations entre articles de blog et ce cours ou toute activité ou ressource. Les articles de blog ne seront pas supprimés.';
$string['deleteexternalblog'] = 'Désinscrire ce blog externe';
$string['deleteotagswarn'] = 'Voulez-vous vraiment retirer les tags sélectionnés de tous les articles de blog et les supprimer du système ?';
$string['description'] = 'Description';
$string['description_help'] = 'Saisir une phrase ou deux résumant le contenu de votre blog externe. Si aucune description n\'est fournie, la description publiée sur votre blog externe sera utilisée.';
$string['donothaveblog'] = 'Désolé, vous n\'avez pas votre propre blog.';
$string['editentry'] = 'Modifier un article de blog';
$string['editexternalblog'] = 'Modifier un blog externe';
$string['emptybody'] = 'Le texte d\'un article de blog ne peut pas être vide';
$string['emptyrssfeed'] = 'L\'URL indiquée ne pointe pas vers un flux RSS valide';
$string['emptytitle'] = 'Le titre d\'un article de blog ne peut pas être vide';
$string['emptyurl'] = 'Vous devez indiquer l\'URL d\'un flux RSS valide';
$string['entrybody'] = 'Corps de l\'article du blog';
$string['entrybodyonlydesc'] = 'Description de l\'article';
$string['entryerrornotyours'] = 'Cet article n\'est pas vôtre';
$string['entrysaved'] = 'L\'article a été enregistré';
$string['entrytitle'] = 'Titre de l\'article';
$string['evententryadded'] = 'Un article de blog a été ajouté.';
$string['evententrydeleted'] = 'Un article de blog a été supprimé.';
$string['evententryupdated'] = 'Article du blog mis à jour';
$string['externalblogcrontime'] = 'Planification du cron de blog externe';
$string['externalblogdeleteconfirm'] = 'Désinscrire ce blog externe ?';
$string['externalblogdeleted'] = 'Blog externe désinscrit';
$string['externalblogs'] = 'Blogs externes';
$string['feedisinvalid'] = 'Ce flux n\'est pas valide';
$string['feedisvalid'] = 'Ce flux est valide';
$string['filterblogsby'] = 'Filtrer les articles par...';
$string['filtertags'] = 'Filtre de tags';
$string['filtertags_help'] = 'Cette fonctionnalité vous permet de filtrer les articles à publier. Si vous indiquez ici des tags (séparés par des virgules), seuls les articles comportant ces tags seront copiés de votre blog externe.';
$string['groupblog'] = 'Blog de groupe : {$a}';
$string['groupblogdisable'] = 'Le blog de groupe n\'est pas activé';
$string['groupblogentries'] = 'Articles de blog du groupe {$a->groupname} associés à {$a->coursename}';
$string['groupblogs'] = 'Les utilisateurs ne peuvent voir que les articles des blogs d\'utilisateurs dans les mêmes groupes qu\'eux';
$string['incorrectblogfilter'] = 'Type de filtre de blog incorrect';
$string['intro'] = 'Ce flux RSS a été généré automatiquement à partir d\'un ou plusieurs blogs.';
$string['invalidgroupid'] = 'Identifiant de groupe non valide';
$string['invalidurl'] = 'Cette URL n\'est pas atteignable';
$string['linktooriginalentry'] = 'Lien vers l\'article original';
$string['maxexternalblogsperuser'] = 'Nombre maximal de blogs externes par utilisateur';
$string['name'] = 'Nom';
$string['name_help'] = 'Saisir un nom descriptif pour votre blog externe. Si aucun nom n\'est fourni, le nom de votre blog externe sera utilisé.';
$string['noentriesyet'] = 'Aucun article visible ici';
$string['noguestpost'] = 'Les visiteurs anonymes ne peuvent pas écrire dans le blog !';
$string['nopermissionstodeleteentry'] = 'Vous n\'avez pas les droits d\'accès requis pour supprimer cet article de blog';
$string['norighttodeletetag'] = 'Vous n\'êtes pas autorisé à supprimer ce tag : {$a}';
$string['nosuchentry'] = 'Aucun tel article de blog';
$string['notallowedtoedit'] = 'Vous n\'êtes pas autorisé à modifier cet article';
$string['numberofentries'] = 'Articles : {$a}';
$string['numberoftags'] = 'Nombre de tags à afficher';
$string['page-blog-edit'] = 'Pages de modification de blog';
$string['page-blog-index'] = 'Pages de listes de blog';
$string['page-blog-x'] = 'Toutes les pages de blog';
$string['pagesize'] = 'Nombre d\'articles par page';
$string['permalink'] = 'Permalien';
$string['personalblogs'] = 'Les utilisateurs ne peuvent voir que les articles de leur propre blog';
$string['preferences'] = 'Préférences';
$string['publishto'] = 'Publier pour';
$string['publishtocourse'] = 'Les participants à un de vos cours';
$string['publishtocourseassoc'] = 'Les participants au cours associé';
$string['publishtocourseassocparam'] = 'Participants à {$a}';
$string['publishtogroup'] = 'Les utilisateurs appartenant à un même groupe que vous';
$string['publishtogroupassoc'] = 'Les membres de votre groupe dans le cours associé';
$string['publishtogroupassocparam'] = 'Les membres de votre groupe dans {$a}';
$string['publishto_help'] = 'Il y a trois options :

* Vous-même (brouillon) : seul vous et les administrateurs pourront voir cet article
* Tout le monde sur le site : tous les utilisateurs enregistrés sur ce site pourront voir cet article
* Tout le monde : n\'importe qui pourra voir cet article, y compris des visiteurs anonymes';
$string['publishtonoone'] = 'Vous-même (brouillon)';
$string['publishtosite'] = 'Tout le monde sur ce site';
$string['publishtoworld'] = 'Tout le monde (grand public)';
$string['readfirst'] = 'Veuillez avant tout lire ceci';
$string['relatedblogentries'] = 'Articles de blogs en lien';
$string['retrievedfrom'] = 'Importé depuis';
$string['rssfeed'] = 'Flux RSS de blog';
$string['searchterm'] = 'Recherche : {$a}';
$string['settingsupdatederror'] = 'Une erreur est survenue. Les préférences de blog n\'ont pas été enregistrées';
$string['siteblog'] = 'Blog de site : {$a}';
$string['siteblogdisable'] = 'Le blog du site n\'est pas activé';
$string['siteblogs'] = 'Tous les utilisateurs du site peuvent voir les articles de tous les blogs';
$string['tagdatelastused'] = 'Date de la dernière utilisation du tag';
$string['tagparam'] = 'Tag : {$a}';
$string['tags'] = 'Tags';
$string['tagsort'] = 'Trier l\'affichage des tags par';
$string['tagtext'] = 'Texte du tag';
$string['timefetched'] = 'Date de la dernière synchronisation';
$string['timewithin'] = 'Afficher les tags utilisés depuis';
$string['updateentrywithid'] = 'Modification de l\'article';
$string['url'] = 'URL du flux RSS';
$string['url_help'] = 'Saisir l\'URL du flux RSS de votre blog externe.';
$string['useblogassociations'] = 'Activer les associations de blog';
$string['useexternalblogs'] = 'Activer les blogs externes';
$string['userblog'] = 'Blog d\'utilisateur : {$a}';
$string['userblogentries'] = 'Articles de blog de {$a}';
$string['valid'] = 'Valide';
$string['viewallblogentries'] = 'Tous les articles au sujet de ce {$a}';
$string['viewallmodentries'] = 'Voir tous les articles sur ce {$a->type}';
$string['viewallmyentries'] = 'Voir tous mes articles';
$string['viewblogentries'] = 'Articles au sujet de ce {$a->type}';
$string['viewblogsfor'] = 'Afficher tous les articles pour...';
$string['viewcourseblogs'] = 'Afficher tous les articles de ce cours';
$string['viewentriesbyuseraboutcourse'] = 'Voir les articles sur ce cours, de {$a}';
$string['viewgroupblogs'] = 'Afficher les articles du groupe...';
$string['viewgroupentries'] = 'Articles du groupe';
$string['viewmodblogs'] = 'Afficher les articles du module...';
$string['viewmodentries'] = 'Articles du module';
$string['viewmyentries'] = 'Mes articles';
$string['viewmyentriesaboutcourse'] = 'Voir mes articles sur ce cours';
$string['viewmyentriesaboutmodule'] = 'Voir mes articles sur {$a}';
$string['viewsiteentries'] = 'Afficher tous les articles';
$string['viewuserentries'] = 'Afficher tous les articles de {$a}';
$string['worldblogs'] = 'Le grand public peut lire les articles de blog marqués comme accessibles à tout le monde';
$string['wrongpostid'] = 'Identifiant de l\'article de blog incorrect';
