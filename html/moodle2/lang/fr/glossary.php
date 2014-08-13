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
 * Strings for component 'glossary', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   glossary
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcomment'] = 'Ajouter un commentaire';
$string['addentry'] = 'Ajouter un nouvel article';
$string['addingcomment'] = 'Ajout d\'un commentaire';
$string['alias'] = 'Terme associé';
$string['aliases'] = 'Termes associés';
$string['aliases_help'] = '<!-- Version: $Id$ -->


<p>À chaque article d\'un glossaire peut être associée une liste de termes associés ou de mots clefs.</p>

<p><b>Saisissez chacun des termes sur une nouvelle ligne</b> (et non séparés par des virgules).</p>

<p>Ces termes associés peuvent être utilisés comme autant de façons de retrouver l\'article. Par exemple, si vous utilisez le filtre de liens automatiques, ces termes seront utilisés tout comme le nom principal du concept lors de la création de liens automatiques.</p>';
$string['allcategories'] = 'Toutes les catégories';
$string['allentries'] = 'Tout';
$string['allowcomments'] = 'Autoriser les commentaires';
$string['allowcomments_help'] = 'Si ce réglage est activé, tous les utilisateurs ayant l\'autorisation de créer des commentaires pourront en ajouter aux articles des glossaires.';
$string['allowduplicatedentries'] = 'Autoriser les doublons';
$string['allowduplicatedentries_help'] = 'Si ce réglage est activé, il sera possible d\'avoir plusieurs articles pour le même nom de concept.';
$string['allowprintview'] = 'Autoriser l\'affichage pour impression';
$string['allowprintview_help'] = 'Cette option permet d\'autoriser l\'affichage pour les participants d\'un lien vers une version du glossaire prête pour l\'impression. Ce lien est toujours disponible pour les enseignants.';
$string['andmorenewentries'] = 'et {$a} nouveaux articles.';
$string['answer'] = 'Réponse';
$string['approvaldisplayformat'] = 'Format d\'affichage pour l\'approbation';
$string['approvaldisplayformat_help'] = 'Format d\'affichage à utiliser pour l\'approbation des articles de glossaires';
$string['approve'] = 'Approuver';
$string['areaattachment'] = 'Annexes';
$string['areaentry'] = 'Définitions';
$string['areyousuredelete'] = 'Voulez-vous vraiment supprimer cet article :';
$string['areyousuredeletecomment'] = 'Voulez-vous vraiment supprimer ce commentaire ?';
$string['areyousureexport'] = 'Voulez-vous vraiment exporter cet article vers';
$string['ascending'] = 'ascendant';
$string['attachment'] = 'Annexe';
$string['attachment_help'] = '<!-- Version: $Id$ -->


<p>Il vous est possible de joindre <strong>un</strong> fichier présent sur votre ordinateur à n\'importe quel article d\'un glossaire. Ce fichier est déposé sur le serveur et stocké avec votre article.</p>

<p>Ceci s\'avère particulièrement utile lorsque vous souhaitez partager une image ou un document avec les autres participants du cours.</p>

<p>Ce fichier peut être de n\'importe quel type. Il est cependant fortement recommandé que son nom utilise la convention des 3 lettres d\'extension utilisée sur Internet, par exemple « <strong>.doc</strong> » pour un document Word, « <strong>.jpg</strong> » ou « <strong>.png</strong> » pour une image, « <strong>.zip</strong> » pour un fichier compressé, etc. Cela facilitera le téléchargement et l\'ouverture de ce document dans le navigateur des utilisateurs.</p>

<p>Si vous modifiez une entrée et y joignez un nouveau fichier, ce dernier remplacera tout autre fichier précédemment déposé.</p>

<p>Si vous modifiez un message posté avec un fichier joint et laissez cette zone vide, le fichier joint précédemment déposé sera conservé.</p>';
$string['author'] = 'auteur';
$string['authorview'] = 'Consulter par auteur';
$string['back'] = 'Précédent';
$string['cantinsertcat'] = 'Impossible d\'insérer la catégorie';
$string['cantinsertrec'] = 'Impossible d\'insérer l\'enregistrement';
$string['cantinsertrel'] = 'Impossible d\'insérer le lien catégorie-article';
$string['casesensitive'] = 'Article sensible à la casse';
$string['casesensitive_help'] = 'Ce réglage détermine si une correspondance exacte de la casse (lettres capitales et minuscules) est nécessaire lors de la liaison automatique de ces articles.';
$string['cat'] = 'catégorie';
$string['categories'] = 'Catégories';
$string['category'] = 'Catégorie';
$string['categorydeleted'] = 'Catégorie supprimée';
$string['categoryview'] = 'Consulter par catégorie';
$string['changeto'] = 'modifier à {$a}';
$string['cnfallowcomments'] = 'Définit si un glossaire accepte par défaut les commentaires sur les articles';
$string['cnfallowdupentries'] = 'Définit si un glossaire accepte par défaut les doublons';
$string['cnfapprovalstatus'] = 'Définit le statut d\'approbation d\'un article proposé par un étudiant';
$string['cnfcasesensitive'] = 'Définit si un article doit par défaut correspondre exactement au texte cible (casse des caractères), quand il est lié';
$string['cnfdefaulthook'] = 'Définit la sélection à afficher par défaut lors du premier affichage du glossaire';
$string['cnfdefaultmode'] = 'Définit le cadre à afficher par défaut lors du premier affichage du glossaire';
$string['cnffullmatch'] = 'Définit si un article doit par défaut correspondre mot pour mot au texte cible, quand il est lié';
$string['cnflinkentry'] = 'Définit si un article est par défaut automatiquement lié';
$string['cnflinkglossaries'] = 'Définit si un glossaire doit par défaut être lié';
$string['cnfrelatedview'] = 'Définit le format d\'affichage utilisé pour les fenêtres surgissantes lors du clic sur les liens automatiques et l\'affichage des articles';
$string['cnfshowgroup'] = 'Indique si une coupure entre les groupes doit être affichée ou non';
$string['cnfsortkey'] = 'Définit la clef de tri par défaut';
$string['cnfsortorder'] = 'Définit l\'ordre de tri par défaut';
$string['cnfstudentcanpost'] = 'Définit si les étudiants peuvent par défaut proposer des articles dans un glossaire';
$string['comment'] = 'Commentaire';
$string['commentdeleted'] = 'Le commentaire a été effacé.';
$string['comments'] = 'Commentaires';
$string['commentson'] = 'Commentaires activés';
$string['commentupdated'] = 'Le commentaire a été modifié.';
$string['completionentries'] = 'L\'étudiant doit créer des articles :';
$string['completionentriesgroup'] = 'Requiert des articles';
$string['concept'] = 'Concept';
$string['concepts'] = 'Concepts';
$string['configenablerssfeeds'] = 'Activation de l\'option des flux RSS pour tous les glossaires. Il est en outre nécessaire d\'activer manuellement les flux RSS dans les réglages de chaque glossaire.';
$string['current'] = 'Tri actuellement {$a}';
$string['currentglossary'] = 'Glossaire actuel';
$string['date'] = 'date';
$string['dateview'] = 'Consulter par date';
$string['defaultapproval'] = 'Approbation par défaut';
$string['defaultapproval_help'] = '<!-- Version: $Id$ -->


<p>Ce réglage permet à l\'enseignant de définir ce qui se passe lorsque de nouveaux articles sont proposés par les étudiants. Les nouveaux articles peuvent être automatiquement ajoutées au glossaire, ou alors seulement après approbation par l\'enseignant.</p>';
$string['defaulthook'] = 'Sélection affichée par défaut';
$string['defaultmode'] = 'Mode d\'affichage par défaut';
$string['defaultsortkey'] = 'Clef de tri par défaut';
$string['defaultsortorder'] = 'Ordre de tri par défaut';
$string['definition'] = 'Définition';
$string['definitions'] = 'Définitions';
$string['deleteentry'] = 'Supprimer l\'article';
$string['deletenotenrolled'] = 'Supprimer les articles des utilisateurs non inscrits';
$string['deletingcomment'] = 'Suppression du commentaire';
$string['deletingnoneemptycategory'] = 'La suppression de cette catégorie ne supprimera pas les articles qu\'elle contient. Ceux-ci seront marquées comme sans catégorie.';
$string['descending'] = 'descendant';
$string['destination'] = 'Destination des articles importés';
$string['destination_help'] = '<!-- Version: $Id$ -->


<p>Vous pouvez indiquez à quel endroit doivent être placés les articles importés :</p>

<ul>

<li><strong>Glossaire actuel :</strong> ajoutera les articles importés au glossaire ouvert actuellement ;</li>

<li><strong>Nouveau glossaire :</strong> créera un nouveau glossaire à partir des informations trouvées dans le fichier sélectionné et y insérera les nouveaux articles.</li>

</ul>';
$string['disapprove'] = 'Retirer l\'approbation';
$string['displayformat'] = 'Format d\'affichage';
$string['displayformatcontinuous'] = 'Continu sans auteur';
$string['displayformatdefault'] = 'Par défaut identique au format d\'affichage';
$string['displayformatdictionary'] = 'Simple, style dictionnaire';
$string['displayformatencyclopedia'] = 'Encyclopédie';
$string['displayformatentrylist'] = 'Liste d\'articles';
$string['displayformatfaq'] = 'FAQ';
$string['displayformatfullwithauthor'] = 'Complet avec auteur';
$string['displayformatfullwithoutauthor'] = 'Complet sans auteur';
$string['displayformat_help'] = 'Il existe 7 formats d\'affichages :

* Simple, style dictionnaire : ressemble à un dictionnaire avec des articles séparés. Les auteurs ne sont pas affichés. Les annexes sont proposées sous forme de liens.
* Continu sans auteur : les articles sont affichés les unes après les autres, sans autre séparateur que l\'icône d\'édition.
* Complet avec auteur : un affichage ressemblant à celui des forums, avec les informations sur l\'auteur. Les annexes sont proposées sous forme de liens.
* Complet sans auteur : un affichage ressemblant à celui des forums, sans les informations sur l\'auteur. Les annexes sont proposées sous forme de liens.
* Encyclopédie : identique au format « Complet avec auteur », mais les images en annexe sont affichées en ligne.
* Liste d\'articles : une liste des concepts, sous forme de liens.
* FAQ : utile pour l\'affichage de Foires Aux Questions. Les mots « Question » et « Réponse » sont affichés automatiquement en regard du concept, respectivement de la définition.';
$string['displayformats'] = 'Formats d\'affichage';
$string['displayformatssetup'] = 'Réglages des formats d\'affichage';
$string['duplicatecategory'] = 'Doublon de catégorie';
$string['duplicateentry'] = 'Doublon';
$string['editalways'] = 'Toujours autoriser la modification';
$string['editalways_help'] = '<!-- $Id$ -->


<p>Cette option vous permet de décider si les étudiants peuvent modifier leurs articles n\'importe quand.</p>

<p>Vous pouvez choisir :</p>

<ul>

<li><b>Oui :</b> les articles sont toujours modifiables ;</li>

<li><b>Non :</b> les articles sont modifiables lors de périodes définies.</li>

</ul>';
$string['editcategories'] = 'Modifier les catégories';
$string['editentry'] = 'Modifier l\'article';
$string['editingcomment'] = 'Modification commentaire';
$string['entbypage'] = 'Articles affichés sur une page';
$string['entries'] = 'Articles';
$string['entrieswithoutcategory'] = 'Articles sans catégorie';
$string['entry'] = 'Article';
$string['entryalreadyexist'] = 'Cet article existe déjà';
$string['entryapproved'] = 'Cet article a été approuvé';
$string['entrydeleted'] = 'Article supprimé';
$string['entryexported'] = 'Article exporté avec succès';
$string['entryishidden'] = '(Cet article est actuellement masqué)';
$string['entryleveldefaultsettings'] = 'Réglages par défaut des articles';
$string['entrysaved'] = 'Cet article a été enregistré';
$string['entryupdated'] = 'Cet article a été mis à jour';
$string['entryusedynalink'] = 'Article lié automatiquement';
$string['entryusedynalink_help'] = '<!-- Version: $Id$ -->


<p>Lorsque cette case est cochée, l\'expression définie dans cet article est liée automatiquement lorsque le terme apparaît dans les textes du même cours, y compris dans les messages des forums, les ressources internes, les résumés hebdomadaires ou thématiques, etc.</p>

<p>Si lors de l\'écriture d\'un texte (par exemple dans un forum) vous ne voulez pas qu\'un terme défini dans le glossaire soit lié, vous devrez entourer le texte en question des codes &lt;nolink&gt; et &lt;/nolink&gt;.</p>

<p>Pour que cette fonction soit opérationnelle il est nécessaire de l\'activer également au niveau du glossaire.</p>';
$string['errcannoteditothers'] = 'Il n\'est pas permis de modifier les articles d\'autres utilisateurs.';
$string['errconceptalreadyexists'] = 'Ce concept existe déjà dans le glossaire. Les doublons ne sont pas permis dans ce glossaire.';
$string['errdeltimeexpired'] = 'Vous ne pouvez pas supprimer ceci. Le délai est échu !';
$string['erredittimeexpired'] = 'La durée de modification de cet article est échue.';
$string['errorparsingxml'] = 'Des erreurs sont survenues lors de l\'analyse du fichier. Veuillez vérifier que sa syntaxe XML est valide.';
$string['explainaddentry'] = 'Ajout d\'un article au glossaire actuel.<br />Les champs concept et définition doivent obligatoirement être remplis.';
$string['explainall'] = 'Afficher TOUS les articles sur une page';
$string['explainalphabet'] = 'Consultez le glossaire à l\'aide de cet index';
$string['explainexport'] = 'Presser le bouton ci-dessous pour exporter les articles du glossaire.<br />Vous pourrez importer ce fichier à votre convenance dans ce cours ou un autre.<br />Veuillez remarquer que les annexes (par exemple les images) et les auteurs ne sont pas exportés.';
$string['explainimport'] = '<p>Vous devez indiquer le fichier à importer et sélectionner vos options.</p><p>Lancez votre requête et contrôlez les résultats.</p>';
$string['explainspecial'] = 'Afficher les articles ne commençant pas par une lettre';
$string['exportedentry'] = 'Article exporté';
$string['exportentries'] = 'Exporter des articles';
$string['exportentriestoxml'] = 'Exporter des articles vers un ficher XML';
$string['exportfile'] = 'Exporter les articles vers un fichier';
$string['exportglossary'] = 'Exporter le glossaire';
$string['exporttomainglossary'] = 'Exporter vers le glossaire principal';
$string['filetoimport'] = 'Fichier à importer';
$string['filetoimport_help'] = 'Choisissez sur votre ordinateur le fichier XML contenant les articles de glossaire à importer.';
$string['fillfields'] = 'Les champs concept et définition sont obligatoires.';
$string['filtername'] = 'Liens automatiques des glossaires';
$string['fullmatch'] = 'Correspondance mot pour mot';
$string['fullmatch_help'] = '<!-- $Id$ -->


<p>Si la liaison automatique des articles est activée, l\'activation de cette option aura pour résultat que seuls seront liés les articles correspondant mot pour mot au texte de la page.</p>

<p>Par exemple, un article dénommé « terre » ne créera pas de lien dans le mot « terrestre ».</p>';
$string['glossary:addinstance'] = 'Ajouter un glossaire';
$string['glossary:approve'] = 'Approuver ou retirer l\'approbation d\'articles';
$string['glossary:comment'] = 'Ajouter des commentaires';
$string['glossary:export'] = 'Exporter des articles';
$string['glossary:exportentry'] = 'Exporter un unique article';
$string['glossary:exportownentry'] = 'Exporter un de ses propres articles';
$string['glossary:import'] = 'Importer des articles';
$string['glossaryleveldefaultsettings'] = 'Réglages par défaut des glossaires';
$string['glossary:managecategories'] = 'Gérer les catégories';
$string['glossary:managecomments'] = 'Gérer les commentaires';
$string['glossary:manageentries'] = 'Gérer les articles';
$string['glossary:rate'] = 'Évaluer les articles';
$string['glossarytype'] = 'Type de glossaire';
$string['glossarytype_help'] = '<!-- Version: $Id$ -->


<p>Le module Glossaire permet d\'exporter des articles de n\'importe quel glossaire secondaire vers le glossaire principal d\'un cours. Si vous désirez profiter de cette fonctionnalité, vous devez indiquer quel est le glossaire principal.</p>

<p>Attention ! Il ne peut y avoir qu\'un seul glossaire principal par cours.</p>

<p>Avant Moodle 1.7, seuls les enseignants peuvaient modifier un glossaire principal. À partir de la version 1.7 de Moodle, si vous voulez contrôler qui a le droit de modifier un glossaire (y compris le glossaire principal), vous devez utiliser le mécanisme de dérogation aux rôles.</p>';
$string['glossary:view'] = 'Voir les glossaires';
$string['glossary:viewallratings'] = 'Voir toutes les évaluations brutes données par des participants';
$string['glossary:viewanyrating'] = 'Voir toutes les évaluations globales';
$string['glossary:viewrating'] = 'Voir sa propre évaluation globale reçue';
$string['glossary:write'] = 'Créer des articles';
$string['guestnoedit'] = 'Les visiteurs anonymes ne sont pas autorisés à modifier les glossaires';
$string['importcategories'] = 'Importer les catégories';
$string['importedcategories'] = 'Catégories importées';
$string['importedentries'] = 'Articles importés';
$string['importentries'] = 'Importer des articles';
$string['importentriesfromxml'] = 'Importer des articles d\'un fichier XML';
$string['includegroupbreaks'] = 'Inclure les séparations entre groupes';
$string['isglobal'] = 'Glossaire global';
$string['isglobal_help'] = 'Les articles d\'un glossaire global sont utilisés dans tout le site pour la création automatique des liens, et pas seulement dans le cours auquel il appartient. Seuls les administrateurs peuvent définir un glossaire comme étant global.';
$string['letter'] = 'lettre';
$string['linkcategory'] = 'Lier automatiquement cette catégorie';
$string['linkcategory_help'] = '<!-- Version: $Id$ -->


<p>Vous pouvez indiquer si vous voulez lier automatiquement ou non les catégories.</p>

<p>Attention ! Les catégories ne sont liées que lorsque le texte correspond exactement (casse des caractères et mot pour mot).</p>';
$string['linking'] = 'Liaison automatique';
$string['mainglossary'] = 'Glossaire principal';
$string['maxtimehaspassed'] = 'Désolé ! la durée maximale allouée pour la modification de ce commentaire ({$a}) est échue.';
$string['modulename'] = 'Glossaire';
$string['modulename_help'] = 'Le module d\'activité glossaire permet aux participants de créer et de gérer une liste de définitions, comme un dictionnaire, ou de collecter et organiser des ressources ou des informations.

L\'enseignant peut permettre de joindre des fichiers aux articles de glossaire. Les images jointes sont affichées dans l\'article. Les articles peuvent être recherchés ou consultés alphabétiquement ou par catégorie, date ou auteur. Les articles peuvent être approuvés par défaut ou nécessiter une approbation manuelle par l\'enseignant avant d\'être consultables par les autres participants.

Si le filtre de liens automatiques des glossaires est activé, les articles des glossaires seront automatiquement liés lorsque les expressions définies apparaissent dans le cours.

L\'enseignant peut autoriser les commentaires sur les articles. Ceux-ci peuvent également être évalués par les enseignants ou les participants (évaluation par les pairs). Les évaluations sont combinées et la note finale résultante est enregistrée dans le carnet de notes.

Les glossaires ont de nombreux emplois, par exemple :

* une banque de termes techniques construite de façon collaborative
* un annuaire dans lequel les participants ajoutent leur nom et se présentent
* une ressource de trucs et astuces utiles sur un sujet particulier
* une zone de partage de vidéos, d\'images ou de sons
* une ressource permettant la révision de faits à mémoriser';
$string['modulenameplural'] = 'Glossaires';
$string['newentries'] = 'Nouveaux articles du glossaire';
$string['newglossary'] = 'Nouveau glossaire';
$string['newglossarycreated'] = 'Nouveau glossaire créé.';
$string['newglossaryentries'] = 'Nouveaux articles du glossaire :';
$string['nocomment'] = 'Aucun commentaire trouvé';
$string['nocomments'] = '(Aucun commentaire trouvé sur cet article)';
$string['noconceptfound'] = 'Aucun concept, ni définition trouvés.';
$string['noentries'] = 'Aucun article trouvé dans cette section';
$string['noentry'] = 'Aucune article trouvé.';
$string['nopermissiontodelcomment'] = 'Vous ne pouvez pas supprimer les commentaires d\'autres participants';
$string['nopermissiontodelinglossary'] = 'Vous ne pouvez pas ajouter de commentaires dans ce glossaire';
$string['nopermissiontoviewresult'] = 'Vous ne pouvez voir que les résultats de vos propres articles';
$string['notapproved'] = 'Article de glossaire non encore approuvé.';
$string['notcategorised'] = 'Sans catégorie';
$string['numberofentries'] = 'Nombre d\'articles';
$string['onebyline'] = '(une par ligne)';
$string['page-mod-glossary-edit'] = 'Page d\'ajout et de modification d\'article de glossaire';
$string['page-mod-glossary-view'] = 'Page d\'affichage d\'article de glossaire';
$string['page-mod-glossary-x'] = 'Toute page du module glossaire';
$string['pluginadministration'] = 'Administration du glossaire';
$string['pluginname'] = 'Glossaire';
$string['popupformat'] = 'Format des fenêtres surgissantes';
$string['print'] = 'Imprimer';
$string['printerfriendly'] = 'Version pour impression';
$string['printviewnotallowed'] = 'L\'affichage pour impression n\'est pas autorisé';
$string['question'] = 'Question';
$string['rejectedentries'] = 'Articles rejetés';
$string['rejectionrpt'] = 'Rapport de rejet';
$string['resetglossaries'] = 'Supprimer les articles depuis le';
$string['resetglossariesall'] = 'Supprimer les articles de tous les glossaires';
$string['rssarticles'] = 'Nombres d\'articles RSS récents';
$string['rssarticles_help'] = '<p>Cette option vous permet de fixer le nombre d\'articles récents à inclure dans le flux RSS.</p>

<p>Un nombre entre 5 et 20 est adéquat pour la plupart des glossaires. Si le glossaire est très actif, il est souhaitable d\'augmenter ce nombre.</p>';
$string['rsssubscriberss'] = 'Affichage du flux RSS des concepts du glossaire « {$a} »';
$string['rsstype'] = 'Flux RSS de cette activité';
$string['rsstype_help'] = '<p>Cette option vous permet d\'activer le flux RSS de ce glossaire.</p>

<p>Vous pouvez choisir entre deux types de flux RSS :

<ul>

<li><strong>Avec auteur :</strong> le flux généré comprendra le nom de l\'auteur de chaque article du glossaire.</li>

<li><strong>Sans auteur :</strong> le flux généré ne comprendra pas le nom de l\'auteur des articles.</li>

</ul>';
$string['searchindefinition'] = 'Rechercher dans les définitions aussi';
$string['secondaryglossary'] = 'Glossaire secondaire';
$string['showall'] = 'Afficher le lien « Tout »';
$string['showall_help'] = '<!-- $Id$ -->


<p>Vous pouvez personnaliser la façon de consulter un glossaire. La consultation et la recherche sont toujours disponibles, mais vous pouvez définir trois options supplémentaires :</p>

<p><strong>Afficher le lien « Spécial »</strong> permet ou non la consultation directe des articles commençant par un caractère spécial comme @, #, etc.</p>

<p><strong>Afficher l\'alphabet</strong> permet ou non la consultation directe des articles par ordre alphabétique.</p>

<p><strong>Afficher le lien « Tout »</strong> permet ou non la consultation des tous les articles.</p>';
$string['showalphabet'] = 'Afficher les liens de l\'alphabet';
$string['showalphabet_help'] = '<!-- $Id$ -->


<p>Vous pouvez personnaliser la façon de consulter un glossaire. La consultation et la recherche sont toujours disponibles, mais vous pouvez définir trois options supplémentaires :</p>

<p><strong>Afficher le lien « Spécial »</strong> permet ou non la consultation directe des articles commençant par un caractère spécial comme @, #, etc.</p>

<p><strong>Afficher l\'alphabet</strong> permet ou non la consultation directe des articles par ordre alphabétique.</p>

<p><strong>Afficher le lien « Tout »</strong> permet ou non la consultation des tous les articles.</p>';
$string['showspecial'] = 'Afficher le lien « Spécial »';
$string['showspecial_help'] = '<!-- $Id$ -->


<p>Vous pouvez personnaliser la façon de consulter un glossaire. La consultation et la recherche sont toujours disponibles, mais vous pouvez définir trois options supplémentaires :</p>

<p><strong>Afficher le lien « Spécial »</strong> permet ou non la consultation directe des articles commençant par un caractère spécial comme @, #, etc.</p>

<p><strong>Afficher l\'alphabet</strong> permet ou non la consultation directe des articles par ordre alphabétique.</p>

<p><strong>Afficher le lien « Tout »</strong> permet ou non la consultation des tous les articles.</p>';
$string['sortby'] = 'Trier par';
$string['sortbycreation'] = 'Par date de création';
$string['sortbylastupdate'] = 'Par date de modification';
$string['sortchronogically'] = 'Trier chronologiquement';
$string['special'] = 'Spécial';
$string['standardview'] = 'Consulter alphabétiquement';
$string['studentcanpost'] = 'Les étudiants peuvent ajouter des articles';
$string['totalentries'] = 'Nombre total d\'articles';
$string['usedynalink'] = 'Activer les liens automatiques';
$string['usedynalink_help'] = '<!-- Version: $Id$ -->


<p>Quand cette option est activée, les concepts ou expressions définis dans ce glossaire sont liés automatiquement quand ils apparaissent dans les textes du même cours, y compris dans les messages des forums, les ressources internes, les résumés hebdomadaires ou thématiques, etc.</p>

<p>L\'activation de cette option ne suffit pas. Il faut encore explicitement activer la liaison pour chacun des articles du glossaire pour lesquels cela est désiré.</p>

<p>Si lors de l\'écriture d\'un texte (par exemple dans un forum) vous ne voulez pas qu\'un terme défini dans le glossaire soit lié, vous devrez entourer le texte en question des codes &lt;nolink&gt; et &lt;/nolink&gt;.</p>

<p>Il est à remarquer que les noms des catégories sont aussi liés.</p>';
$string['waitingapproval'] = 'En attente d\'approbation';
$string['warningstudentcapost'] = '(n\'est valable que si le glossaire n\'est pas principal)';
$string['withauthor'] = 'Concepts avec auteur';
$string['withoutauthor'] = 'Concepts sans auteur';
$string['writtenby'] = 'par';
$string['youarenottheauthor'] = 'vous n\'êtes pas l\'auteur de ce commentaire. Vous ne pouvez donc pas le modifier.';
