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
 * Strings for component 'ouwiki', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   ouwiki
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actionheading'] = 'Actions';
$string['addedbegins'] = '[Début du texte ajouté]';
$string['addedends'] = '[Fin du texte ajouté]';
$string['advice_diff'] = 'L\'ancienne version est montrée à gauche<span class=\'accesshide\'> sous le titre Ancienne version</span>,
où le texte supprimé est surligné. Le texte ajouté est indiqué dans la nouvelle version, à droite,<span class=\'accesshide\'> sous le titre Nouvelle version</span>.';
$string['advice_edit'] = '<p>Editez la page ci-dessous.</p>
<ul>
<li>Faites un lien vers une autre page en tapant son nom entre doubles parenthèses carrées : [[nom de la page]]. Le lien deviendra actif une fois vos modifications enregistrées..</li>
<li>Pour créer une nouvelle page, créez d\'abord un lien de cette façon. {$a}</li>
</ul>
</p>';
$string['advice_history'] = '<p>Le tableau ci-dessous affiche toutes les modifications apportées à <a href="{$a}">la page en cours</a>.</p>
<p>Vous pourvez voir les anciennes versions, ou voir ce qui a changé dans une version en particulier. Si vous désirez comparer deux versions, sélectionnez les cases à cocher correspondantes, puis cliquez sur Comparer les sélections.</p>';
$string['advice_missingpage'] = 'Un ou des liens existent vers cette page, mais elles n\'a pas encore été créée..';
$string['advice_missingpages'] = 'Des liens existent vers ces pages, mais elles n\'ont pas encore été créées.';
$string['advice_viewdeleted'] = 'Vous êtes en train de voir une version suppriméée de cette page.';
$string['advice_viewold'] = 'Vous visionnez actuellement une ancienne version de cette page.';
$string['advice_wikirecentchanges_changes'] = '<p>Le tableau ci-dessous liste toutes les modifications sur toutes les pages du wiki, par ordre chronologique inverse. La version le plus récente de chaque page est surlignée.</p>
<p>En utilisant les liens, vous pouvez voir une page telle qu\'elle était après une certaine modification, ou voir ce qui a été modifié à cet instant.</p>';
$string['advice_wikirecentchanges_changes_nohighlight'] = '<p>Le tableau ci-dessous liste toutes les modifications sur toutes les pages du wiki, par ordre chronologique inverse.</p>
<p>En utilisant les liens, vous pouvez voir une page telle qu\'elle était après une certaine modification, ou voir ce qui a été modifié à cet instant.</p>';
$string['advice_wikirecentchanges_pages'] = '<p>Ce tableau montre quand chaque page a été ajoutée au wiki, par ordre chronologique inverse.</p>';
$string['changebutton'] = 'Modifier';
$string['changedby'] = 'Modifiée par';
$string['changes'] = 'modifications';
$string['changesnav'] = 'Modifications';
$string['compare'] = 'Comparer';
$string['compareselected'] = 'Comparer les sélections';
$string['completionedits'] = 'L\'utilisateur doit effectuer des modifications :';
$string['completioneditsgroup'] = 'Exiger des modifications';
$string['completioneditshelp'] = 'des modifications sont requises pour complétion';
$string['completionpages'] = 'L\'utilisateur doit créer de nouvelles pages :';
$string['completionpagesgroup'] = 'Exiger de nouvelles pages';
$string['completionpageshelp'] = 'des nouvelles pages sont requises pour complétion';
$string['contributions'] = '<strong>{$a->pages}</strong> nouvelle page{$a->pagesplural}, <strong>{$a->changes}</strong> autre{$a->changesplural} modification{$a->changesplural}.';
$string['contributionsbyuser'] = 'Contributions par l\'utilisateur';
$string['contributionsgrouplabel'] = 'Groupe';
$string['countdowntext'] = 'Ce wiki ne permet que {$a} minutes pour chaque modification. Effectuez vos modifications, puis cliquez Enregistrer ou Annuler avant que le temps restant (à droite) atteigne zéro.';
$string['countdownurgent'] = 'Veuillez terminer ou annuler votre modification maintenant. Si vous n\'enregistrez pas vos modifications avant que le temps arrive à zéro, celles-ci seront enregistrées automatiquement.';
$string['createpage'] = 'Créer page';
$string['csvdownload'] = 'Télécharger au format tableur (UTF-8 .csv)';
$string['current'] = 'Actuelle';
$string['currentversion'] = 'Version actuelle';
$string['currentversionof'] = 'Version actuelle de';
$string['deletedbegins'] = '[Début du texte supprimé]';
$string['deletedends'] = '[Fin du texte supprimé]';
$string['deleteversionerror'] = 'Erreur de suppression de la version de la page';
$string['deleteversionerrorversion'] = 'Impossible de supprimer une version inexistante de la page';
$string['editbegin'] = 'Permettre l\'édition depuis';
$string['editend'] = 'Empêcher l\'édition depuis';
$string['editingpage'] = 'Page en cours d\'édition';
$string['editingsection'] = 'Section en cours d\'édition : {$a}';
$string['editpage'] = 'Editer page';
$string['editsection'] = 'Editer section';
$string['entirewiki'] = 'Wiki entier';
$string['excelcsvdownload'] = 'Télécharger au format compatible Excel (.csv)';
$string['feedalt'] = 'S\'abonner au flux Atom';
$string['feedchange'] = 'Modifié par {$a->name} (<a href=\'{$a->url}\'>voir modification</a>)';
$string['feeddescriptionchanges'] = 'Liste toutes les modifications apportées au wiki. Abonnez-vous à ce flux pour être informé des mises à jour du wiki.';
$string['feeddescriptionhistory'] = 'Liste toutes les modifications apportées à cette page du wiki. Abonnez-vous à ce flux pour être informé des modifications à cette page.';
$string['feeddescriptionpages'] = 'Liste toutes les nouvelles pages créées dans le wiki. Abonnez-vous à ce flux pour être informé des nouvelles pages créées sur ce wiki.';
$string['feeditemdescriptiondate'] = '{$a->main} à {$a->date}.';
$string['feeditemdescriptionnodate'] = '{$a->main}.';
$string['feednewpage'] = 'Créée par {$a->name}';
$string['feedsubscribe'] = 'Vous pouvez vous abonner à un flux contenant cette information : <a href=\'{$a->atom}\'>Atom</a> ou <a href=\'{$a->rss}\'>RSS</a>.';
$string['feedtitle'] = '{$a->course} wiki : {$a->name} - {$a->subtitle}';
$string['format_html'] = 'Visionner';
$string['format_rtf'] = 'Télécharger sous la forme d\'un fichier pour traitement de texte';
$string['format_template'] = 'Télécharger sous la forme d\'un fichier modèle pour wiki';
$string['frompage'] = 'de {$a}';
$string['frompages'] = 'de {$a}...';
$string['historycompareaccessibility'] = 'Sélectionner {$a->lastdate} {$a->createdtime}';
$string['historyfor'] = 'Historique pour';
$string['index'] = 'Index du wiki';
$string['lastchange'] = 'Dernière modification : {$a->date} / {$a->userlink}';
$string['linkedfrom'] = 'Pages contenant un lien vers celle-ci';
$string['linkedfromsingle'] = 'Page contenant un lien vers celle-ci';
$string['lockcancelled'] = 'Votre verrou d\'édition a été outrepassé et quelqu\'un d\'autre est actuellement en train de modifier cette page. Si vous désirez garder vos modifications, veuillez les sélectionner et les copier avant de cliquer sur Annuler, puis essayer à nouveau de modifier la page.';
$string['missingpages'] = 'Pages manquantes';
$string['modulename'] = 'OU wiki';
$string['modulenameplural'] = 'OU wikis';
$string['mustspecify2'] = 'Vous devez spécifier exactement deux versions &agrave; comparer.';
$string['newerversion'] = 'Nouvelle version';
$string['newpage'] = 'première version';
$string['next'] = 'Anciennes modifications';
$string['nextversion'] = 'Suivante : {$a}';
$string['nochanges'] = 'Utilisateurs n\'ayant fait aucune contribution';
$string['nojsbrowser'] = 'Toutes nos excuses, mais vous utilisez un navigateur Internet que nous ne supportons pas complètement.';
$string['nojsdisabled'] = 'JavaScript est désactivé dans les réglages de votre navigateur.';
$string['nojswarning'] = 'Ceci a pour effet que cette page peut être verrouillé pour vous que pendant {$a->minutes} minutes.Assurez-vous d\'avoir enregistré vos modifications avant {$a->deadline} (il est actuellement {$a->now}). Sinon, quelqu\'un d\'autre pourrait modifier la page et vos modifications pourraient être perdues.';
$string['nousersingroup'] = 'Le groupe sélectionné ne contient pas d\'utilisateurs.';
$string['olderversion'] = 'Ancienne version';
$string['oldversion'] = 'Ancienne version';
$string['onepageview'] = 'You can view all pages of this wiki at once for convenient printing or permanent reference.';
$string['orphanpages'] = 'Pages non liées';
$string['ouwiki:edit'] = 'Modifier les pages du wiki';
$string['ouwiki:overridelock'] = 'Outrepasser les pages verrouillées';
$string['ouwiki:view'] = 'Voir les wikis';
$string['ouwiki:viewallindividuals'] = 'Sous-wikis par utilisateur : voir tous';
$string['ouwiki:viewcontributions'] = 'Voir la liste des contributions organisée par utilisateur';
$string['ouwiki:viewgroupindividuals'] = 'Sous-wikis par utilisateur : voir même groupe';
$string['overridelock'] = 'Outrepasser le verrou';
$string['page'] = 'Page';
$string['pagedeletedinfo'] = 'Des versions supprimées sont visibles dans la liste ci-dessous. Celles-ci ne sont visibles qu\'aux utilisateurs ayant la permission de supprimer des versions. Les utilisateurs ordinaires ne les voient pas.';
$string['pagedoesnotexist'] = 'Cette page n\'existe pas encore dans le wiki.';
$string['pagelockeddetails'] = '{$a->name} a commencé &agrave; éditer cette page &agrave; {$a->lockedat}, et était toujours en train de l\'éditer &agrave; {$a->seenat}. Vous ne pouvez pas l\'éditer avant qu\'ils aient terminé.';
$string['pagelockeddetailsnojs'] = '{$a->name} ont commencé à éditer cette page à {$a->lockedat}. Ils ont jusqu\'à {$a->nojs} pour terminer. Vous ne pouvez pas éditer cette page avant qu\'ils aient terminé.';
$string['pagelockedoverride'] = 'Vous disposez d\'un accès spécial vous permettant d\'annuler leurs modifications en cours et de déverrouiller la page.
Si vous faites ceci, leurs modifications seront perdues !
Considérez cet avertissement avant de cliquer sur le bouton Outrepasser.';
$string['pagelockedtimeout'] = 'Leur temps d\'édition se termine à {$a}.';
$string['pagelockedtitle'] = 'Cette page est en cours d\'édition par quelqu\'un d\'autre.';
$string['preview'] = 'Aperçu';
$string['previewwarning'] = 'L\'aperçu suivant de vos pages n\'a pas encore été enregistré.
<strong>Si vous n\'enregistrez pas vos modifications, celles-ci seront perdues.</strong> Pour enregistrer, utilisez le bouton Enregistrer au bas de la page.';
$string['previous'] = 'Nouvelles modifications';
$string['previousversion'] = 'Précédente : {$a}';
$string['recentchanges'] = 'Dernières modifications';
$string['returntohistory'] = '(<a href=\'{$a}\'>Retour à l\'historique</a>.)';
$string['returntopage'] = 'Retourner à la page du wiki';
$string['returntoview'] = 'Voir la page en cours';
$string['revert'] = 'Revenir';
$string['reverterrorcapability'] = 'Vous n\'avez pas la permission de revenir à une version antérieure';
$string['reverterrorversion'] = 'Impossible de revenir à une version inexistante de la page';
$string['revertversion'] = 'Revenir';
$string['revertversionconfirm'] = '<p>Cette page sera retournée à l\'état dans lequelle elle était le {$a}, en annulant toutes les modifications faites depuis. Les modifications annulées seront toutefois toujours disponibles dans l\'historique de la page.</p><p>Etes-vous sûr de vouloir revenir à cette version de la page ?</p>';
$string['savedat'] = 'Enregistré sous {$a}';
$string['savedby'] = 'enregistrée par {$a}';
$string['savefailcontent'] = 'Votre version de la page est affichée ci-dessous afin que vous puissiez copier et coller vos ajouts et modificatios dans un autre programme. Si vous les enregistrez sur le wiki plus tard, faites attention à ne pas écraser le travail de quelqu\'un d\'autre.';
$string['savefaildesynch'] = 'Pendant que vous modifiiez cette page, quelqu\'un d\'autre a réussi à la modifier.
(Ceci peut se produire dans diverses situations, telles que si vous utilisez un navigateur Internet spécial ou si JavaScript est désactivé.) Vos modifications ne peuvent malheureusement pas être enregistrées pour l\'instant, car cela aurait pour effet d\'annuler celles de l\'autre utilisateur.';
$string['savefaillocked'] = 'Pendant que vous modifiiez cette page, quelqu\'un d\'autre en a obtenu le verrou.
(Ceci peut se produire dans diverses situations, telles que si vous utilisez un navigateur Internet spécial ou si JavaScript est désactivé.) Vos modifications ne peuvent malheureusement pas être enregistrées pour l\'instant.';
$string['savefailtitle'] = 'La page ne peut être enregistrée';
$string['savetemplate'] = 'Enregistrer le wiki comme un modèle';
$string['seedetails'] = 'historique global';
$string['startpage'] = 'Page de départ';
$string['startpagedoesnotexist'] = 'La page de départ du wiki n\'a pas encore été créée.';
$string['subwikis'] = 'Sous-wikis';
$string['subwikis_groups'] = 'Un wiki par groupe';
$string['subwikis_individual'] = 'Un wiki par utilisateur';
$string['subwikis_single'] = 'Un seul wiki par cours';
$string['system'] = 'le syst&agrave;me';
$string['tab_discuss'] = 'Discuster';
$string['tab_edit'] = 'Editer';
$string['tab_history'] = 'Historique';
$string['tab_index_alpha'] = 'Alphabétique';
$string['tab_index_changes'] = 'Toutes les modifications';
$string['tab_index_pages'] = 'Nouvelles pages';
$string['tab_index_tree'] = 'Structure';
$string['tab_view'] = 'Voir';
$string['template'] = 'Modèle';
$string['timelocked_after'] = 'Ce wiki est actuellement verrouillé et ne peut plus être édité.';
$string['timelocked_before'] = 'Ce wiki est actuellement verrouillé. Il peut être édité dès {$a}.';
$string['timeout'] = 'Temps d\'expiration pour édition';
$string['timeout_none'] = 'Pas d\'expiration';
$string['tryagain'] = 'Ré-essayer';
$string['undelete'] = 'Annuler la suppression';
$string['viewdeletedversionerrorcapability'] = 'Erreur d\'affichage de la version de la page';
$string['wikifor'] = 'Affichage du wiki de :';
$string['wikifullchanges'] = 'Voir la liste complète des modifications';
$string['wikirecentchanges'] = 'Modifications sur le wiki';
$string['wikirecentchanges_from'] = 'Modifications sur le wiki (page {$a})';
$string['wouldyouliketocreate'] = 'Voulez-vous la créer?';
